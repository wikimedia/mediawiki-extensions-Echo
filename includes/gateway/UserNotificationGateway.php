<?php

/**
 * Database gateway which handles direct database interaction with the
 * echo_notification & echo_event for a user, that wouldn't require
 * loading data into models
 */
class EchoUserNotificationGateway {

	/**
	 * @var MWEchoDbFactory
	 */
	protected $dbFactory;

	/**
	 * @var User
	 */
	protected $user;

	/**
	 * The tables for this gateway.
	 *
	 * @var string
	 */
	protected static $eventTable = 'echo_event';

	/**
	 * The tables for this gateway.
	 *
	 * @var string
	 */
	protected static $notificationTable = 'echo_notification';

	/**
	 * @param User $user
	 * @param MWEchoDbFactory $dbFactory
	 */
	public function __construct( User $user, MWEchoDbFactory $dbFactory ) {
		$this->user = $user;
		$this->dbFactory = $dbFactory;
	}

	/**
	 * Mark notifications as read
	 * @param array $eventIDs
	 * @return bool Returns true when data has been updated in DB, false on
	 *   failure, or when there was nothing to update
	 */
	public function markRead( array $eventIDs ) {
		if ( !$eventIDs ) {
			return false;
		}

		$dbw = $this->dbFactory->getEchoDb( DB_MASTER );
		if ( $dbw->isReadOnly() ) {
			return false;
		}

		return $dbw->update(
			self::$notificationTable,
			[ 'notification_read_timestamp' => $dbw->timestamp( wfTimestampNow() ) ],
			[
				'notification_user' => $this->user->getId(),
				'notification_event' => $eventIDs,
				'notification_read_timestamp' => null,
			],
			__METHOD__
		);
	}

	/**
	 * Mark notifications as unread
	 * @param array $eventIDs
	 * @return bool Returns true when data has been updated in DB, false on
	 *   failure, or when there was nothing to update
	 */
	public function markUnRead( array $eventIDs ) {
		if ( !$eventIDs ) {
			return false;
		}

		$dbw = $this->dbFactory->getEchoDb( DB_MASTER );

		return $dbw->update(
			self::$notificationTable,
			[ 'notification_read_timestamp' => null ],
			[
				'notification_user' => $this->user->getId(),
				'notification_event' => $eventIDs,
				'notification_read_timestamp IS NOT NULL'
			],
			__METHOD__
		);
	}

	/**
	 * Mark all notification as read, use MWEchoNotifUer::markAllRead() instead
	 * @deprecated may need this when running in a job or revive this when we
	 * have updateJoin()
	 */
	public function markAllRead() {
		$dbw = $this->dbFactory->getEchoDb( DB_MASTER );

		return $dbw->update(
			self::$notificationTable,
			[ 'notification_read_timestamp' => $dbw->timestamp( wfTimestampNow() ) ],
			[
				'notification_user' => $this->user->getId(),
				'notification_read_timestamp' => null,
			],
			__METHOD__
		);
	}

	/**
	 * Get notification count for the types specified
	 * @param int $dbSource use master or slave storage to pull count
	 * @param array $eventTypesToLoad event types to retrieve
	 * @param int $cap Max count
	 * @return int
	 */
	public function getCappedNotificationCount( $dbSource, array $eventTypesToLoad = [], $cap = MWEchoNotifUser::MAX_BADGE_COUNT ) {
		// double check
		if ( !in_array( $dbSource, [ DB_REPLICA, DB_MASTER ] ) ) {
			$dbSource = DB_REPLICA;
		}

		if ( !$eventTypesToLoad ) {
			return 0;
		}

		$db = $this->dbFactory->getEchoDb( $dbSource );
		return $db->selectRowCount(
			[
				self::$notificationTable,
				self::$eventTable
			],
			[ '1' ],
			[
				'notification_user' => $this->user->getId(),
				'notification_read_timestamp' => null,
				'event_deleted' => 0,
				'event_type' => $eventTypesToLoad,
			],
			__METHOD__,
			[ 'LIMIT' => $cap ],
			[
				'echo_event' => [ 'LEFT JOIN', 'notification_event=event_id' ],
			]
		);
	}

	/**
	 * IMPORTANT: should only call this function if the number of unread notification
	 * is reasonable, for example, unread notification count is less than the max
	 * display defined in MWEchoNotifUser::MAX_BADGE_COUNT
	 * @param string $type
	 * @return int[]
	 */
	public function getUnreadNotifications( $type ) {
		$dbr = $this->dbFactory->getEchoDb( DB_REPLICA );
		$res = $dbr->select(
			[
				self::$notificationTable,
				self::$eventTable
			],
			[ 'notification_event' ],
			[
				'notification_user' => $this->user->getId(),
				'notification_read_timestamp' => null,
				'event_deleted' => 0,
				'event_type' => $type,
				'notification_event = event_id'
			],
			__METHOD__
		);

		$eventIds = [];
		if ( $res ) {
			foreach ( $res as $row ) {
				$eventIds[$row->notification_event] = $row->notification_event;
			}
		}

		return $eventIds;
	}

}
