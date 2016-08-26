<?php

/**
 * Database mapper for EchoEvent model, which is an immutable class, there should
 * not be any update to it
 */
class EchoEventMapper extends EchoAbstractMapper {

	/**
	 * Insert an event record
	 *
	 * @param EchoEvent
	 * @return int|bool
	 */
	public function insert( EchoEvent $event ) {
		$dbw = $this->dbFactory->getEchoDb( DB_MASTER );

		$id = $dbw->nextSequenceValue( 'echo_event_id' );

		$row = $event->toDbArray();
		if ( $id ) {
			$row['event_id'] = $id;
		}

		$res = $dbw->insert( 'echo_event', $row, __METHOD__ );

		if ( $res ) {
			if ( !$id ) {
				$id = $dbw->insertId();
			}

			return $id;
		} else {
			return false;
		}
	}

	/**
	 * Create an EchoEvent by id
	 *
	 * @param int
	 * @param boolean
	 * @return EchoEvent|bool false if it wouldn't load/unserialize
	 * @throws MWException
	 */
	public function fetchById( $id, $fromMaster = false ) {
		$db = $fromMaster ? $this->dbFactory->getEchoDb( DB_MASTER ) : $this->dbFactory->getEchoDb( DB_SLAVE );

		$row = $db->selectRow( 'echo_event', '*', array( 'event_id' => $id ), __METHOD__ );

		if ( !$row && !$fromMaster ) {
			return $this->fetchById( $id, true );
		} elseif ( !$row ) {
			throw new MWException( "No EchoEvent found with ID: $id" );
		}

		return EchoEvent::newFromRow( $row );
	}

	/**
	 * @param int[] $eventIds
	 * @param bool $deleted
	 * @return bool|ResultWrapper
	 */
	public function toggleDeleted( $eventIds, $deleted ) {
		$dbw = $this->dbFactory->getEchoDb( DB_MASTER );

		$selectDeleted = $deleted ? 0 : 1;
		$setDeleted = $deleted ? 1 : 0;
		$res = $dbw->update(
			'echo_event',
			array(
				'event_deleted' => $setDeleted,
			),
			array(
				'event_deleted' => $selectDeleted,
				'event_id' => $eventIds,
			),
			__METHOD__
		);

		return $res;
	}

	/**
	 * Fetch events associated with a page
	 *
	 * @param int $pageId
	 * @return EchoEvent[] Events
	 */
	public function fetchByPage( $pageId ) {
		$events = array();

		$dbr = $this->dbFactory->getEchoDb( DB_SLAVE );
		$res = $dbr->select(
			array( 'echo_event', 'echo_target_page' ),
			array( '*' ),
			array(
				'etp_page' => $pageId
			),
			__METHOD__,
			array( 'GROUP BY' => 'etp_event' ),
			array( 'echo_target_page' => array( 'JOIN', 'event_id=etp_event' ) )
		);
		if ( $res ) {
			foreach ( $res as $row ) {
				$events[] = EchoEvent::newFromRow( $row );
			}
		}

		return $events;
	}

	/**
	 * Fetch event IDs associated with a page
	 *
	 * @param int $pageId
	 * @return int[] Event IDs
	 */
	public function fetchIdsByPage( $pageId ) {
		$events = $this->fetchByPage( $pageId );
		$eventIds = array_map(
			function ( EchoEvent $event ) {
				return $event->getId();
			},
			$events
		);
		return $eventIds;
	}

	/**
	 * Fetch events unread by a user and associated with a page
	 *
	 * @param User $user
	 * @param int $pageId
	 * @return EchoEvent[]
	 */
	public function fetchUnreadByUserAndPage( User $user, $pageId ) {
		$dbr = $this->dbFactory->getEchoDb( DB_SLAVE );

		$res = $dbr->select(
			array( 'echo_target_page', 'echo_event', 'echo_notification' ),
			'*',
			array(
				'etp_user' => $user->getId(),
				'etp_page' => $pageId,
				'event_deleted' => 0,
				'notification_read_timestamp' => null,
			),
			__METHOD__,
			null,
			array(
				'echo_event' => array( 'INNER JOIN', 'etp_event=event_id' ),
				'echo_notification' => array( 'INNER JOIN', array( 'notification_event=etp_event', 'notification_user=etp_user' ) ),
			)
		);

		$data = array();
		foreach ( $res as $row ) {
			$data[] = EchoEvent::newFromRow( $row );
		}

		return $data;
	}

}
