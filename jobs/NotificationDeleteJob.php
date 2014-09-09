<?php

/**
 * This job is created when sending notifications to the target users.  The purpose
 * of this job is to delete older notifications when the number of notifications a
 * user has is more than $wgEchoMaxUpdateCount, it does not make sense to have tons
 * of notifications in the history while users wouldn't bother to click 'load more'
 * like 100 times to see them. What we gain from this is we could run expensive
 * queries otherwise that would requires adding index and data denormalization.
 */
class EchoNotificationDeleteJob extends Job {

	/**
	 * UserIds to be processed
	 * @var int[]
	 */
	protected $userIds = array();

	/**
	 * @var MWEchoDbFactory
	 */
	protected $dbFactory;

	/**
	 * @param Title
	 * @param array
	 */
	function __construct( $title, $params ) {
		parent::__construct( __CLASS__, $title, $params );
		$this->userIds = $params['userIds'];
		$this->dbFactory = MWEchoDbFactory::newFromDefault();
	}

	/**
	 * Run the job of finding & deleting older notifications
	 */
	function run() {
		global $wgEchoMaxUpdateCount;

		$updateCount  = 0;
		$dbw = $this->dbFactory->getEchoDb( DB_MASTER );
		$notifMapper  = new EchoNotificationMapper();
		$targetMapper = new EchoTargetPageMapper();

		foreach ( $this->userIds as $userId ) {
			$user = User::newFromId( $userId );
			$notif = $notifMapper->fetchByUserOffset( $user, $wgEchoMaxUpdateCount );
			if ( $notif ) {
				$dbw->startAtomic( __METHOD__ );
				$res = $notifMapper->deleteByUserEventOffset(
					$user, $notif->getEvent()->getId()
				);
				if ( $res ) {
					$res = $targetMapper->deleteByUserEventOffset(
						$user, $notif->getEvent()->getId()
					);
				}
				$dbw->endAtomic( __METHOD__ );
				if ( $res ) {
					$updateCount++;
					$notifUser = MWEchoNotifUser::newFromUser( $user );
					$notifUser->resetNotificationCount( DB_MASTER );
				}
				// Wait for slave if we are doing a lot of updates
				if ( $updateCount > 10 ) {
					$this->dbFactory->waitForSlaves();
					$updateCount = 0;
				}
			}
		}
		return true;
	}

}
