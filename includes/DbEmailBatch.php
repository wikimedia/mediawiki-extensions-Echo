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

		if ( $validEvents ) {
			$dbr = MWEchoDbFactory::getDB( DB_SLAVE );

			$conds = array(
				'eeb_user_id' => $this->mUser->getId(),
				'event_id = eeb_event_id',
				'event_type' => $validEvents
			);

			if ( $this->lastEvent ) {
				$conds[] = 'eeb_event_id <= ' . intval( $this->lastEvent );
			}

			$res = $dbr->select(
				array( 'echo_email_batch', 'echo_event' ),
				array( '*' ),
				$conds,
				__METHOD__,
				array( 'ORDER BY' => 'eeb_event_priority, eeb_event_id', 'LIMIT' => self::$displaySize + 1 )
			);

			foreach( $res as $row ) {
				$events[$row->eeb_id] = $row;
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
	 */
	public static function actuallyAddToQueue( $userId, $eventId, $priority ) {
		if ( !$userId || !$eventId ) {
			return;
		}

		$dbw = MWEchoDbFactory::getDB( DB_MASTER );
		$dbw->insert(
			'echo_email_batch',
			array(
				'eeb_user_id' => $userId,
				'eeb_event_id' => $eventId,
				'eeb_event_priority' => $priority
			),
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
