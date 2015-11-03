<?php

/**
 * Database mapper for EchoTargetPage model
 */
class EchoTargetPageMapper extends EchoAbstractMapper {

	/**
	 * List of db fields used to construct an EchoTargetPage model
	 * @var string[]
	 */
	protected static $fields = array(
		'etp_user',
		'etp_page',
		'etp_event'
	);

	/**
	 * Fetch EchoTargetPage instances by user & page_id.  The resulting
	 * array is indexed by the event id. Each entry contains an array
	 * of EchoTargetPage instances.
	 *
	 * @param User $user
	 * @param int|int[] $pageId One or more page ids to fetch target pages of
	 * @return EchoTargetPage[][]|boolean
	 */
	public function fetchByUserPageId( User $user, $pageId ) {
		$dbr = $this->dbFactory->getEchoDb( DB_SLAVE );

		$res = $dbr->select(
			array( 'echo_target_page', 'echo_event' ),
			array_merge( self::$fields, array( 'event_type' ) ),
			array(
				'etp_user' => $user->getId(),
				'etp_page' => $pageId
			),
			__METHOD__,
			array(),
			array( 'echo_event' => array( 'JOIN', 'etp_event=event_id' ) )
		);
		if ( $res ) {
			$targetPages = array();
			foreach ( $res as $row ) {
				$targetPages[$row->etp_event][] = EchoTargetPage::newFromRow( $row );
			}

			return $targetPages;
		} else {
			return false;
		}
	}

	/**
	 * Insert an EchoTargetPage instance into the database
	 *
	 * @param EchoTargetPage $targetPage
	 * @return boolean
	 */
	public function insert( EchoTargetPage $targetPage ) {
		$dbw = $this->dbFactory->getEchoDb( DB_MASTER );

		$row = $targetPage->toDbArray();

		$res = $dbw->insert( 'echo_target_page', $row, __METHOD__ );

		return $res;
	}

	/**
	 * Delete an EchoTargetPage instance from the database
	 *
	 * @param EchoTargetPage
	 * @return boolean
	 */
	public function delete( EchoTargetPage $targetPage ) {
		$dbw = $this->dbFactory->getEchoDb( DB_MASTER );

		$res = $dbw->delete(
			'echo_target_page',
			array(
				'etp_user' => $targetPage->getUser()->getId(),
				'etp_page' => $targetPage->getPageId(),
				'etp_event' => $targetPage->getEventId()
			),
			__METHOD__
		);

		return $res;
	}

	/**
	 * Delete multiple EchoTargetPage records by user & set of event_id
	 *
	 * @param User $user
	 * @param int[] $eventIds
	 * @return boolean
	 */
	public function deleteByUserEvents( User $user, array $eventIds ) {
		if ( !$eventIds ) {
			return true;
		}

		$dbw = $this->dbFactory->getEchoDb( DB_MASTER );

		$res = $dbw->delete(
			'echo_target_page',
			array(
				'etp_user' => $user->getId(),
				'etp_event' => $eventIds
			),
			__METHOD__
		);

		return $res;
	}

	/**
	 * Delete multiple EchoTargetPage records by user & event_id offset
	 *
	 * @param User $user
	 * @param int $eventId
	 * @return boolean
	 */
	public function deleteByUserEventOffset( User $user, $eventId ) {
		$dbw = $this->dbFactory->getEchoDb( DB_MASTER );

		$res = $dbw->delete(
			'echo_target_page',
			array(
				'etp_user' => $user->getId(),
				'etp_event < ' . (int)$eventId
			),
			__METHOD__
		);

		return $res;
	}

	/**
	 * Delete multiple EchoTargetPage records by user
	 *
	 * @param User $user
	 * @return boolean
	 */
	public function deleteByUser( User $user ) {
		$dbw = $this->dbFactory->getEchoDb( DB_MASTER );

		$res = $dbw->delete(
			'echo_target_page',
			array(
				'etp_user' => $user->getId()
			),
			__METHOD__
		);

		return $res;
	}

}
