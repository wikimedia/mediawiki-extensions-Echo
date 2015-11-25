<?php

/**
 * Manages what wikis a user has unread notifications on
 *
 */
class EchoUnreadWikis {

	const ALERT = 'alert';
	const MESSAGE = 'message';

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
	 * If CentralAuth is installed, use that. Otherwise
	 * assume they're using shared user tables.
	 *
	 * @param User $user
	 * @return EchoUnreadWikis|bool
	 */
	public static function newFromUser( User $user ) {
		if ( class_exists( 'CentralAuthUser' ) ) {
			// @todo don't be CA specific (see T111302/CentralIdLookup)
			$caUser = CentralAuthUser::getInstance( $user );
			if ( $caUser->isAttached() ) {
				return new self( $caUser->getId() );
			} else {
				return false;
			}
		}

		return new self( $user->getId() );
	}

	/**
	 * @param int $index DB_* constant
	 * @return bool|DatabaseBase
	 */
	private function getDB( $index ) {
		return $this->dbFactory->getSharedDb( $index );
	}

	/**
	 * @return array
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
			if ( !$row->euw_alerts && !$row->euw_messages ) {
				// This shouldn't happen, but lets be safe...
				continue;
			}
			$wikis[$row->euw_wiki] = array(
				self::ALERT => array(
					'count' => $row->euw_alerts,
					'ts' => $row->euw_alerts_ts,
				),
				self::MESSAGE => array(
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

		$defaultTS = '00000000000000';

		if ( $alertCount || $msgCount ) {
			$values = array(
				'euw_alerts' => $alertCount,
				'euw_alerts_ts' => $alertCount
					? $alertTime->getTimestamp( TS_MW )
					: $defaultTS,
				'euw_messages' => $msgCount,
				'euw_messages_ts' => $msgCount
					? $msgTime->getTimestamp( TS_MW )
					: $defaultTS,
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
			// No unread notifications, delete the row
			$dbw->delete(
				'echo_unread_wikis',
				array( 'euw_user' => $this->id, 'euw_wiki' => $wiki ),
				__METHOD__
			);
		}
	}
}
