<?php

/**
 * Database backend for echo notification
 */
class MWDbEchoBackend extends MWEchoBackend {

	/**
	 * Database object
	 */
	private $dbr;
	private $dbw;

	protected function __construct() {
		$this->dbr = wfGetDB( DB_SLAVE );
		$this->dbw = wfGetDB( DB_MASTER );
	}

	/**
	 * @param $row array
	 */
	public function createNotification( $row ) {
		$row['notification_timestamp'] = $this->dbw->timestamp( $row['notification_timestamp'] );
		$this->dbw->insert( 'echo_notification', $row, __METHOD__ );
	}

	/**
	 * @param $user User the user to get notifications for
	 * @param $unread bool true to get only unread notifications
	 * @param $limit int The maximum number of notifications to return
	 * @param $timestamp int The timestamp to start from
	 * @param $offset int The notification event id to start from
	 * @param $outputFormat string The output format of the notifications (web,
	 *    email, etc.)
	 * @return array
	 */
	public function loadNotifications( $user, $unread, $limit, $timestamp, $offset, $outputFormat = 'web' ) {

		$eventTypesToLoad = $this->getUserEnabledEvents( $user, $outputFormat );
		if ( !$eventTypesToLoad ) {
			return array();
		}

		$conds = array(
			'notification_user' => $user->getID(),
			'event_type' => $eventTypesToLoad,
		);

		if ( $unread ) {
			$conds['notification_read_timestamp'] = null;
		}

		// start points are specified
		if ( $timestamp && $offset ) {
			$conds[] = 'notification_timestamp <= ' . $this->dbr->addQuotes( $this->dbr->timestamp( $timestamp ) );
			$conds[] = 'notification_event < ' . intval( $offset );
		}

		$res = $this->dbr->select(
			array( 'echo_notification', 'echo_event' ),
			'*',
			$conds,
			__METHOD__,
			array(
				// Todo: check if key ( user, timestamp ) is sufficient, if not,
				// we need to replace it with ( user, timestamp, event )
				'ORDER BY' => 'notification_timestamp DESC, notification_event DESC',
				'LIMIT' => $limit,
			),
			array(
				'echo_event' => array( 'LEFT JOIN', 'notification_event=event_id' ),
			)
		);

		return iterator_to_array( $res, false );
	}

	/**
	 * @param $row array
	 * @return int
	 */
	public function createEvent( $row ) {
		$id = $this->dbw->nextSequenceValue( 'echo_event_id' );

		$row['event_timestamp'] = $this->dbw->timestamp( $row['event_timestamp'] );

		$this->dbw->insert( 'echo_event', $row, __METHOD__ );

		if ( !$id ) {
			$id = $this->dbw->insertId();
		}

		return $id;
	}

	/**
	 * @param $id int
	 * @param $fromMaster bool
	 * @return ResultWrapper
	 * @throws MWException
	 */
	public function loadEvent( $id, $fromMaster = false ) {
		$db = $fromMaster ? $this->dbw : $this->dbr;

		$row = $db->selectRow( 'echo_event', '*', array( 'event_id' => $id ), __METHOD__ );

		if ( !$row && !$fromMaster ) {
			return $this->loadEvent( $id, true );
		} elseif ( !$row ) {
			throw new MWException( "No EchoEvent found with ID: $id" );
		}

		return $row;
	}

	/**
	 * @param $event EchoEvent
	 */
	public function updateEventExtra( $event ) {
		$this->dbw->update(
			'echo_event',
			array( 'event_extra' => $event->serializeExtra() ),
			array( 'event_id' => $event->getId() ),
			__METHOD__
		);
	}

	/**
	 * @param $conds array
	 * @param $rows array
	 */
	public function createSubscription( $conds, $rows ) {
		$this->dbw->begin();
		$this->dbw->delete( 'echo_subscription', $conds, __METHOD__ );

		if ( count( $rows ) ) {
			$this->dbw->insert( 'echo_subscription', $rows, __METHOD__ );
		}

		$this->dbw->commit();
	}

	/**
	 * @param $conds array
	 * @return ResultWrapper
	 */
	public function loadSubscription( $conds ) {
		$res = $this->dbr->select( 'echo_subscription', '*', $conds, __METHOD__, array( 'order by' => 'sub_user asc' ) );
		return $res;
	}

	/**
	 * @param $user User
	 * @param $eventIDs array
	 */
	public function markRead( $user, $eventIDs ) {
		if ( !$eventIDs ) {
			return;
		}
		$this->dbw->update(
			'echo_notification',
			array( 'notification_read_timestamp' => $this->dbw->timestamp( wfTimestampNow() ) ),
			array(
				'notification_user' => $user->getId(),
				'notification_event' => $eventIDs,
			),
			__METHOD__
		);
	}

	/**
	 * @param $user User object to check notifications for
	 * @param $dbSource string use master or slave storage to pull count
	 * @return ResultWrapper|bool
	 */
	public function getNotificationCount( $user, $dbSource ) {
		// double check
		if ( !in_array( $dbSource, array( DB_SLAVE, DB_MASTER ) ) ) {
			$dbSource = DB_SLAVE;
		}

		$eventTypesToLoad = $this->getUserEnabledEvents( $user, 'web' );

		if ( !$eventTypesToLoad ) {
			return false;
		}

		$db = wfGetDB( $dbSource );
		$res = $db->selectRow(
			array( 'echo_notification', 'echo_event' ),
			array( 'num' => 'COUNT(notification_event)' ),
			array(
				'notification_user' => $user->getId(),
				'notification_read_timestamp' => null,
				'event_type' => $eventTypesToLoad,
			),
			__METHOD__,
			array(),
			array(
				'echo_event' => array( 'LEFT JOIN', 'notification_event=event_id' ),
			)
		);

		return $res;
	}

}
