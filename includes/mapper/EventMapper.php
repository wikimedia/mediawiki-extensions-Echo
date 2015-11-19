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
	 * @return EchoEvent
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
	 * Get a list of echo events identified by user and bundle hash
	 *
	 * @param $user User
	 * @param $bundleHash string the bundle hash
	 * @param $type string distribution type
	 * @param $order string 'ASC'/'DESC'
	 * @param $limit int
	 * @return EchoEvent[]
	 */
	public function fetchByUserBundleHash( User $user, $bundleHash, $type = 'web', $order = 'DESC', $limit = 250 ) {
		$dbr = $this->dbFactory->getEchoDb( DB_SLAVE );

		// We only display 99+ if the number is over 100, we can do limit 250, this should
		// be sufficient to return 99 distinct group iterators, avoid select count( distinct )
		// for the following reason:
		// 1. it will not scale for large volume data
		// 2. notification may have random grouping iterator
		// 3. agent may be anonymous, can't do distinct over two columns: event_agent_id and event_agent_ip
		if ( $type == 'web' ) {
			$res = $dbr->select(
				array( 'echo_notification', 'echo_event' ),
				array( 'event_agent_id', 'event_agent_ip', 'event_extra',
					'event_id', 'event_page_id', 'event_type', 'event_variant',
					'notification_timestamp' ),
				array(
					'notification_event=event_id',
					'notification_user' => $user->getId(),
					'notification_bundle_base' => 0,
					'notification_bundle_display_hash' => $bundleHash
				),
				__METHOD__,
				array( 'ORDER BY' => 'notification_timestamp ' . $order, 'LIMIT' => $limit )
			);
		// this would be email for now
		} else {
			$res = $dbr->select(
				array( 'echo_email_batch', 'echo_event' ),
				array( 'event_agent_id', 'event_agent_ip', 'event_extra',
					'event_id', 'event_page_id', 'event_type', 'event_variant' ),
				array(
					'eeb_event_id=event_id',
					'eeb_user_id' => $user->getId(),
					'eeb_event_hash' => $bundleHash
				),
				__METHOD__,
				array( 'ORDER BY' => 'eeb_event_id ' . $order, 'LIMIT' => $limit )
			);
		}

		$data = array();
		foreach ( $res as $row ) {
			$data[] = EchoEvent::newFromRow( $row );
		}

		return $data;
	}

}
