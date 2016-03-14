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
	 * The tables for this gateway
	 */
	protected static $eventTable = 'echo_event';
	protected static $notificationTable = 'echo_notification';

	/**
	 * @param User
	 * @param MWEchoDbFactory
	 */
	public function __construct( User $user, MWEchoDbFactory $dbFactory ) {
		$this->user = $user;
		$this->dbFactory = $dbFactory;
	}

	/**
	 * Mark notifications as read
	 * @param $eventIDs array
	 * @return boolean
	 */
	public function markRead( array $eventIDs ) {
		if ( !$eventIDs ) {
			return;
		}

		$dbw = $this->dbFactory->getEchoDb( DB_MASTER );

		return $dbw->update(
			self::$notificationTable,
			array( 'notification_read_timestamp' => $dbw->timestamp( wfTimestampNow() ) ),
			array(
				'notification_user' => $this->user->getId(),
				'notification_event' => $eventIDs,
				'notification_read_timestamp' => null,
			),
			__METHOD__
		);
	}

	/**
	 * Mark notifications as unread
	 * @param $eventIDs array
	 * @return boolean
	 */
	public function markUnRead( array $eventIDs ) {
		if ( !$eventIDs ) {
			return;
		}

		$dbw = $this->dbFactory->getEchoDb( DB_MASTER );

		return $dbw->update(
			self::$notificationTable,
			array( 'notification_read_timestamp' => null ),
			array(
				'notification_user' => $this->user->getId(),
				'notification_event' => $eventIDs,
				'notification_read_timestamp IS NOT NULL'
			),
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
			array( 'notification_read_timestamp' => $dbw->timestamp( wfTimestampNow() ) ),
			array(
				'notification_user' => $this->user->getId(),
				'notification_read_timestamp' => null,
				'notification_bundle_base' => 1,
			),
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
	public function getCappedNotificationCount( $dbSource, array $eventTypesToLoad = array(), $cap = MWEchoNotifUser::MAX_BADGE_COUNT ) {
		// double check
		if ( !in_array( $dbSource, array( DB_SLAVE, DB_MASTER ) ) ) {
			$dbSource = DB_SLAVE;
		}

		if ( !$eventTypesToLoad ) {
			return 0;
		}

		$db = $this->dbFactory->getEchoDb( $dbSource );
		return $db->selectRowCount(
			array(
				self::$notificationTable,
				self::$eventTable
			),
			array( '1' ),
			array(
				'notification_user' => $this->user->getId(),
				'notification_bundle_base' => 1,
				'notification_read_timestamp' => null,
				'event_type' => $eventTypesToLoad,
			),
			__METHOD__,
			array( 'LIMIT' => $cap ),
			array(
				'echo_event' => array( 'LEFT JOIN', 'notification_event=event_id' ),
			)
		);
	}

	/**
	 * IMPORTANT: should only call this function if the number of unread notification
	 * is reasonable, for example, unread notification count is less than the max
	 * display defined in MWEchoNotifUser::MAX_BADGE_COUNT
	 * @param string
	 * @return int[]
	 */
	public function getUnreadNotifications( $type ) {
		$dbr = $this->dbFactory->getEchoDb( DB_SLAVE );
		$res = $dbr->select(
			array(
				self::$notificationTable,
				self::$eventTable
			),
			array( 'notification_event' ),
			array(
				'notification_user' => $this->user->getId(),
				'notification_bundle_base' => 1,
				'notification_read_timestamp' => null,
				'event_type' => $type,
				'notification_event = event_id'
			),
			__METHOD__
		);

		$eventIds = array();
		if ( $res ) {
			foreach ( $res as $row ) {
				$eventIds[$row->notification_event] = $row->notification_event;
			}
		}

		return $eventIds;
	}

}
