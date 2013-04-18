<?php

/**
 * Handle user email batch ( daily/weekly ) for database storage
 */
class MWDbEchoEmailBatch extends MWEchoEmailBatch {

	/**
	 * Set the last event of this batch, this is a cutoff point for clearing
	 * processed/invalid events
	 *
	 * @return bool true if event exists false otherwise
	 */
	protected function setLastEvent() {
		$dbr = MWEchoDbFactory::getDB( DB_SLAVE );
		$res = $dbr->selectField(
			array( 'echo_email_batch' ),
			array( 'MAX( eeb_event_id )' ),
			array( 'eeb_user_id' => $this->mUser->getId() ),
			__METHOD__
		);

		if ( $res ) {
			$this->lastEvent = $res;
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Get the events queued for the current user
	 * @return array
	 */
	protected function getEvents() {
		global $wgEchoNotifications;

		$events = array();

		$validEvents = array_keys( $wgEchoNotifications );

		// Per the tech discussion in the design meeting (03/22/2013), since this is
		// processed by a cron job, it's okay to use GROUP BY over more complex
		// composite index, favor insert performance, storage space over read
		// performance in this case
		if ( $validEvents ) {
			$dbr = MWEchoDbFactory::getDB( DB_SLAVE );

			$conds = array(
				'eeb_user_id' => $this->mUser->getId(),
				'event_id = eeb_event_id',
				'event_type' => $validEvents
			);

			// See setLastEvent() for more detail for this variable
			if ( $this->lastEvent ) {
				$conds[] = 'eeb_event_id <= ' . intval( $this->lastEvent );
			}

			$res = $dbr->select(
				array( 'echo_email_batch', 'echo_event' ),
				array( '*' ),
				$conds,
				__METHOD__,
				array(
					'ORDER BY' => 'eeb_event_priority',
					'LIMIT' => self::$displaySize + 1,
					'GROUP BY' => 'eeb_event_hash'
				)
			);

			foreach ( $res as $row ) {
				// records in the queue inserted before email bundling code
				// have no hash, in this case, we just ignore them
				if ( $row->eeb_event_hash ) {
					$events[$row->eeb_id] = $row;
				}
			}
		}

		return $events;
	}

	/**
	 * Clear "processed" events in the queue, processed could be: email sent, invalid, users do not want to receive emails
	 */
	public function clearProcessedEvent() {
		$conds = array( 'eeb_user_id' => $this->mUser->getId() );

		// there is a processed cutoff point
		if ( $this->lastEvent ) {
			$conds[] = 'eeb_event_id <= ' . intval( $this->lastEvent );
		}

		$dbw = MWEchoDbFactory::getDB( DB_MASTER );
		$dbw->delete(
			'echo_email_batch',
			$conds,
			__METHOD__,
			array()
		);
	}

	/**
	 * Insert notification event into email queue
	 * @param $userId int
	 * @param $eventId int
	 * @param $priority int
	 * @param $hash string
	 */
	public static function actuallyAddToQueue( $userId, $eventId, $priority, $hash ) {
		if ( !$userId || !$eventId ) {
			return;
		}

		$dbw = MWEchoDbFactory::getDB( DB_MASTER );

		$row = array(
			'eeb_user_id' => $userId,
			'eeb_event_id' => $eventId,
			'eeb_event_priority' => $priority,
			'eeb_event_hash' => $hash
		);

		$id = $dbw->nextSequenceValue( 'echo_email_batch_eeb_id' );

		if ( $id ) {
			$row['eeb_id'] = $id;
		}

		$dbw->insert(
			'echo_email_batch',
			$row,
			__METHOD__,
			array( 'IGNORE' )
		);
	}

	/**
	 * Get a list of users to be notified for the batch
	 * @param $startUserId int
	 * @param $batchSize int
	 */
	public static function actuallyGetUsersToNotify( $startUserId, $batchSize ) {
		$dbr = MWEchoDbFactory::getDB( DB_SLAVE );
		$res = $dbr->select(
			array( 'echo_email_batch' ),
			array( 'eeb_user_id' ),
			array( 'eeb_user_id > ' . $startUserId  ),
			__METHOD__,
			array( 'ORDER BY' => 'eeb_user_id', 'LIMIT' => $batchSize )
		);

		return $res;
	}

}
