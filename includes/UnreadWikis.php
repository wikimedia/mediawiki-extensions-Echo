<?php

/**
 * Manages what wikis a user has unread notifications on
 */
class EchoUnreadWikis {
	/**
	 * @var string
	 */
	const DEFAULT_TS = '00000000000000';

	/**
	 * @var int
	 */
	private $id;

	/**
	 * @var MWEchoDbFactory
	 */
	private $dbFactory;

	/**
	 * @param int $id Central user id
	 */
	public function __construct( $id ) {
		$this->id = $id;
		$this->dbFactory = MWEchoDbFactory::newFromDefault();
	}

	/**
	 * Use the user id provided by the CentralIdLookup
	 *
	 * @param User $user
	 * @return EchoUnreadWikis|bool
	 */
	public static function newFromUser( User $user ) {
		$lookup = CentralIdLookup::factory();
		$id = $lookup->centralIdFromLocalUser( $user, CentralIdLookup::AUDIENCE_RAW );
		if ( !$id ) {
			return false;
		}

		return new self( $id );
	}

	/**
	 * @param int $index DB_* constant
	 * @return bool|DatabaseBase
	 */
	private function getDB( $index ) {
		return $this->dbFactory->getSharedDb( $index );
	}

	/**
	 * @return array Note that also wikis with 0 notifications and/or messages may be included
	 */
	public function getUnreadCounts() {
		$dbr = $this->getDB( DB_SLAVE );
		if ( $dbr === false ) {
			return array();
		}

		$rows = $dbr->select(
			'echo_unread_wikis',
			array(
				'euw_wiki',
				'euw_alerts', 'euw_alerts_ts',
				'euw_messages', 'euw_messages_ts',
			),
			array( 'euw_user' => $this->id ),
			__METHOD__
		);

		$wikis = array();
		foreach ( $rows as $row ) {
			$wikis[$row->euw_wiki] = array(
				EchoAttributeManager::ALERT => array(
					'count' => $row->euw_alerts,
					'ts' => $row->euw_alerts_ts,
				),
				EchoAttributeManager::MESSAGE => array(
					'count' => $row->euw_messages,
					'ts' => $row->euw_messages_ts,
				),
			);
		}

		return $wikis;
	}

	/**
	 * @param string $wiki
	 * @param int $alertCount
	 * @param MWTimestamp|bool $alertTime
	 * @param int $msgCount
	 * @param MWTimestamp|bool $msgTime
	 */
	public function updateCount( $wiki, $alertCount, $alertTime, $msgCount, $msgTime ) {
		$dbw = $this->getDB( DB_MASTER );
		if ( $dbw === false ) {
			return;
		}

		if ( $alertCount || $msgCount ) {
			$values = array(
				'euw_alerts' => $alertCount,
				'euw_alerts_ts' => $alertCount
					? $alertTime->getTimestamp( TS_MW )
					: static::DEFAULT_TS,
				'euw_messages' => $msgCount,
				'euw_messages_ts' => $msgCount
					? $msgTime->getTimestamp( TS_MW )
					: static::DEFAULT_TS,
			);
			$dbw->upsert(
				'echo_unread_wikis',
				array(
					'euw_user' => $this->id,
					'euw_wiki' => $wiki,
				) + $values,
				array( 'euw_user', 'euw_wiki' ),
				$values,
				__METHOD__
			);
		} else {
			// Even if there are no unread notifications, don't delete the row!
			// That (empty) row helps us tell the difference between "has had
			// notifications but all have been seen" (0 count, non-0 timestamp)
			// and "has never had a notifications before" (row with 0 count and
			// 000 timestamp or no row at all)
		}
	}
}
