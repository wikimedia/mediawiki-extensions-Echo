<?php

/**
 * Database mapper for EchoNotification model
 */
class EchoNotificationMapper extends EchoAbstractMapper {

	/**
	 * Insert a notification record
	 * @param EchoNotification
	 * @return null
	 */
	public function insert( EchoNotification $notification ) {
		$dbw = $this->dbFactory->getEchoDb( DB_MASTER );

		$fname = __METHOD__;
		$row = $notification->toDbArray();
		$listeners = $this->getMethodListeners( __FUNCTION__ );

		$dbw->onTransactionIdle( function() use ( $dbw, $row, $fname, $listeners ) {
			$dbw->startAtomic( $fname );
			// reset the bundle base if this notification has a display hash
			// the result of this operation is that all previous notifications
			// with the same display hash are set to non-base because new record
			// is becoming the bundle base
			if ( $row['notification_bundle_display_hash'] ) {
				$dbw->update(
					'echo_notification',
					array( 'notification_bundle_base' => 0 ),
					array(
						'notification_user' => $row['notification_user'],
						'notification_bundle_display_hash' => $row['notification_bundle_display_hash'],
						'notification_bundle_base' => 1
					),
					$fname
				);
			}

			$row['notification_timestamp'] = $dbw->timestamp( $row['notification_timestamp'] );
			$res = $dbw->insert( 'echo_notification', $row, $fname );
			$dbw->endAtomic( $fname );

			if ( $res ) {
				foreach ( $listeners as $listener ) {
					call_user_func( $listener );
				}
			}
		} );
	}

	/**
	 * Extract the offset used for notification list
	 * @param $continue String Used for offset
	 * @throws MWException
	 * @return int[]
	 */
	protected function extractQueryOffset( $continue ) {
		$offset = array (
			'timestamp' => 0,
			'offset' => 0,
		);
		if ( $continue ) {
			$values = explode( '|', $continue, 3 );
			if ( count( $values ) !== 2 ) {
				throw new MWException( 'Invalid continue param: ' . $continue );
			}
			$offset['timestamp'] = (int)$values[0];
			$offset['offset'] = (int)$values[1];
		}

		return $offset;
	}

	/**
	 * Get unread notifications by user in the amount specified by limit. Based on existing
	 * requirements, we just need x amount ( 100 ) unread notifications to show on the
	 * overlay, so we don't need offset and ordering, we have an index to retrieve unread
	 * notifications but it's not optimized for ordering
	 * @param User $user
	 * @param int $limit
	 * @param string[] $eventTypes
	 * @return EchoNotification[]
	 */
	public function fetchUnreadByUser( User $user, $limit, array $eventTypes = array() ) {
		$data = array();

		if ( !$eventTypes ) {
			return $data;
		}

		$dbr = $this->dbFactory->getEchoDb( DB_SLAVE );
		$res = $dbr->select(
			array( 'echo_notification', 'echo_event' ),
			'*',
			array(
				'notification_user' => $user->getID(),
				'event_type' => $eventTypes,
				'notification_bundle_base' => 1,
				'notification_read_timestamp' => NULL
			),
			__METHOD__,
			array(
				'LIMIT' => $limit,
			),
			array(
				'echo_event' => array( 'LEFT JOIN', 'notification_event=event_id' ),
			)
		);
		if ( $res ) {
			foreach ( $res as $row ) {
				$data[$row->event_id] = EchoNotification::newFromRow( $row );
			}
		}
		return $data;
	}

	/**
	 * Get Notification by user in batch along with limit, offset etc
	 * @param User the user to get notifications for
	 * @param int The maximum number of notifications to return
	 * @param string Used for offset
	 * @param array Event types to load
	 * @return EchoNotification[]
	 */
	public function fetchByUser( User $user, $limit, $continue, array $eventTypes = array() ) {
		$dbr = $this->dbFactory->getEchoDb( DB_SLAVE );

		if ( !$eventTypes ) {
			return array();
		}

		// There is a problem with querying by event type, if a user has only one or none
		// flow notification and huge amount other notications, the lookup of only flow
		// notification will result in a slow query.  Luckily users won't have that many
		// notifications.  We should have some cron job to remove old notifications so
		// the notification volume is in a reasonable amount for such case.  The other option
		// is to denormalize notification table with event_type and lookup index.
		//
		// Look for notifications with base = 1
		$conds = array(
			'notification_user' => $user->getID(),
			'event_type' => $eventTypes,
			'notification_bundle_base' => 1
		);

		$offset = $this->extractQueryOffset( $continue );

		// Start points are specified
		if ( $offset['timestamp'] && $offset['offset'] ) {
			$ts = $dbr->addQuotes( $dbr->timestamp( $offset['timestamp'] ) );
			// The offset and timestamp are those of the first notification we want to return
			$conds[] = "notification_timestamp < $ts OR ( notification_timestamp = $ts AND notification_event <= " . $offset['offset'] . " )";
		}

		$res = $dbr->select(
			array( 'echo_notification', 'echo_event', 'echo_target_page' ),
			'*',
			$conds,
			__METHOD__,
			array(
				'ORDER BY' => 'notification_timestamp DESC, notification_event DESC',
				'LIMIT' => $limit,
			),
			array(
				'echo_event' => array( 'LEFT JOIN', 'notification_event=event_id' ),
				'echo_target_page' => array( 'LEFT JOIN', array( 'notification_event=etp_event', 'notification_user=etp_user' ) ),
			)
		);

		$data = array();

		if ( $res ) {
			foreach ( $res as $row ) {
				$data[$row->event_id] = EchoNotification::newFromRow( $row );
			}
		}
		return $data;
	}

	/**
	 * Get the last notification in a set of bundle-able notifications by a bundle hash
	 * @param User
	 * @param string The hash used to identify a set of bundle-able notifications
	 * @return EchoNotification|bool
	 */
	public function fetchNewestByUserBundleHash( User $user, $bundleHash ) {
		$dbr = $this->dbFactory->getEchoDb( DB_SLAVE );

		$row = $dbr->selectRow(
			array( 'echo_notification', 'echo_event' ),
			array( '*' ),
			array(
				'notification_user' => $user->getId(),
				'notification_bundle_hash' => $bundleHash
			),
			__METHOD__,
			array( 'ORDER BY' => 'notification_timestamp DESC', 'LIMIT' => 1 ),
			array(
				'echo_event' => array( 'LEFT JOIN', 'notification_event=event_id' ),
			)
		);
		if ( $row ) {
			return EchoNotification::newFromRow( $row );
		} else {
			return false;
		}
	}

	/**
	 * Fetch a notification by user in the specified offset.  The caller should
	 * know that passing a big number for offset is NOT going to work
	 * @param User $user
	 * @param int $offset
	 * @return EchoNotification|bool
	 */
	public function fetchByUserOffset( User $user, $offset ) {
		$dbr = $this->dbFactory->getEchoDb( DB_SLAVE );
		$row = $dbr->selectRow(
			array( 'echo_notification', 'echo_event' ),
			array( '*' ),
			array(
				'notification_user' => $user->getId(),
				'notification_bundle_base' => 1
			),
			__METHOD__,
			array(
				'ORDER BY' => 'notification_timestamp DESC, notification_event DESC',
				'OFFSET' => $offset,
				'LIMIT' => 1
			),
			array(
				'echo_event' => array( 'LEFT JOIN', 'notification_event=event_id' ),
			)
		);

		if ( $row ) {
			return EchoNotification::newFromRow( $row );
		} else {
			return false;
		}
	}

	/**
	 * Batch delete notifications by user and eventId offset
	 * @param User $user
	 * @param int $eventId
	 * @return boolean
	 */
	public function deleteByUserEventOffset( User $user, $eventId ) {
		$dbw = $this->dbFactory->getEchoDb( DB_MASTER );
		$res = $dbw->delete(
			'echo_notification',
			array(
				'notification_user' => $user->getId(),
				'notification_event < ' . (int)$eventId
			),
			__METHOD__
		);
		return $res;
	}

}
