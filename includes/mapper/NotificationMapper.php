<?php

/**
 * Database mapper for EchoNotification model
 */
class EchoNotificationMapper extends EchoAbstractMapper {

	/**
	 * @var EchoTargetPageMapper
	 */
	protected $targetPageMapper;

	public function __construct(
		MWEchoDbFactory $dbFactory = null,
		EchoTargetPageMapper $targetPageMapper = null
	) {
		parent::__construct( $dbFactory );
		if ( $targetPageMapper === null ) {
			$targetPageMapper = new EchoTargetPageMapper( $this->dbFactory );
		}
		$this->targetPageMapper = $targetPageMapper;
	}

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

		$dbw->onTransactionIdle( function () use ( $dbw, $row, $fname, $listeners ) {
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
		$offset = array(
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
	 * Get unread notifications by user in the amount specified by limit order by
	 * notification timestamp in descending order.  We have an index to retrieve
	 * unread notifications but it's not optimized for ordering by timestamp.  The
	 * descending order is only allowed if we keep the notification in low volume,
	 * which is done via a deleteJob
	 * @param User $user
	 * @param int $limit
	 * @param string $continue Used for offset
	 * @param string[] $eventTypes
	 * @param int $dbSource Use master or slave database
	 * @return EchoNotification[]
	 */
	public function fetchUnreadByUser( User $user, $limit, $continue, array $eventTypes = array(), $dbSource = DB_SLAVE ) {
		return $this->fetchByUserInternal( $user, $limit, $continue, $eventTypes, array( 'notification_read_timestamp' => null ), $dbSource );
	}

	/**
	 * Get read notifications by user in the amount specified by limit order by
	 * notification timestamp in descending order.  We have an index to retrieve
	 * unread notifications but it's not optimized for ordering by timestamp.  The
	 * descending order is only allowed if we keep the notification in low volume,
	 * which is done via a deleteJob
	 * @param User $user
	 * @param int $limit
	 * @param string $continue Used for offset
	 * @param string[] $eventTypes
	 * @param int $dbSource Use master or slave database
	 * @return EchoNotification[]
	 */
	public function fetchReadByUser( User $user, $limit, $continue, array $eventTypes = array(), $dbSource = DB_SLAVE ) {
		return $this->fetchByUserInternal( $user, $limit, $continue, $eventTypes, array( 'notification_read_timestamp IS NOT NULL' ), $dbSource );
	}

	/**
	 * Get Notification by user in batch along with limit, offset etc
	 *
	 * @param User $user the user to get notifications for
	 * @param int $limit The maximum number of notifications to return
	 * @param string $continue Used for offset
	 * @param array $eventTypes Event types to load
	 * @param array $excludeEventIds Event id's to exclude.
	 * @return EchoNotification[]
	 */
	public function fetchByUser( User $user, $limit, $continue, array $eventTypes = array(), array $excludeEventIds = array() ) {
		$dbr = $this->dbFactory->getEchoDb( DB_SLAVE );

		$conds = array();
		if ( $excludeEventIds ) {
			$conds[] = 'event_id NOT IN ( ' . $dbr->makeList( $excludeEventIds ) . ' ) ';
		}

		return $this->fetchByUserInternal( $user, $limit, $continue, $eventTypes, $conds );
	}

	/**
	 * @param User $user the user to get notifications for
	 * @param int $limit The maximum number of notifications to return
	 * @param string $continue Used for offset
	 * @param array $eventTypes Event types to load
	 * @param array $conds Additional query conditions.
	 * @param int $dbSource Use master or slave database
	 * @return EchoNotification[]
	 */
	protected function fetchByUserInternal( User $user, $limit, $continue, array $eventTypes = array(), array $conds = array(), $dbSource = DB_SLAVE ) {
		$dbr = $this->dbFactory->getEchoDb( $dbSource );

		if ( !$eventTypes ) {
			return array();
		}

		// There is a problem with querying by event type, if a user has only one or none
		// flow notification and huge amount other notifications, the lookup of only flow
		// notification will result in a slow query.  Luckily users won't have that many
		// notifications.  We should have some cron job to remove old notifications so
		// the notification volume is in a reasonable amount for such case.  The other option
		// is to denormalize notification table with event_type and lookup index.
		// Look for notifications with base = 1
		$conds = array(
			'notification_user' => $user->getID(),
			'event_type' => $eventTypes,
			'notification_bundle_base' => 1
		) + $conds;

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

		// query failure of some sort
		if ( !$res ) {
			return array();
		}

		$events = array();
		foreach ( $res as $row ) {
			$events[$row->event_id] = $row;
		}

		// query returned no events
		if ( !$events ) {
			return array();
		}

		$targetPages = $this->targetPageMapper->fetchByUserPageId( $user, array_keys( $events ) );

		$data = array();
		foreach ( $events as $eventId => $row ) {
			try {
				if ( isset( $targetPages[$row->event_id] ) ) {
					$targets = $targetPages[$row->event_id];
				} else {
					$targets = null;
				}
				$data[$row->event_id] = EchoNotification::newFromRow( $row, $targets );
			} catch ( Exception $e ) {
				$id = isset( $row->event_id ) ? $row->event_id : 'unknown event';
				wfDebugLog( 'Echo', __METHOD__ . ": Failed initializing event: $id" );
				MWExceptionHandler::logException( $e );
			}
		}

		return $data;
	}

	/**
	 * Get the last notification in a set of bundle-able notifications by a bundle hash
	 * @param User $user
	 * @param string $bundleHash The hash used to identify a set of bundle-able notifications
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
	 * Create an EchoNotification by user and event ID.
	 *
	 * @param User $user
	 * @param int $eventID
	 * @return EchoNotification|bool
	 */
	public function fetchByUserEvent( User $user, $eventId ) {
		$dbr = $this->dbFactory->getEchoDb( DB_SLAVE );

		$row = $dbr->selectRow(
			array( 'echo_notification', 'echo_event' ),
			'*',
			array(
				'notification_user' => $user->getId(),
				'notification_event' => $eventId
			),
			 __METHOD__
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
