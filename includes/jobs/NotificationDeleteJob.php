<?php

/**
 * This job is created when sending notifications to the target users.  The purpose
 * of this job is to delete older notifications when the number of notifications a
 * user has is more than $wgEchoMaxUpdateCount, it does not make sense to have tons
 * of notifications in the history while users wouldn't bother to click 'load more'
 * like 100 times to see them. What we gain from this is we could run expensive
 * queries otherwise that would requires adding index and data denormalization.
 *
 * The initial job contains multiple users, which will in turn have individual jobs
 * queued for them.
 */
class EchoNotificationDeleteJob extends Job {

	/**
	 * UserIds to be processed
	 * @var int[]
	 */
	protected $userIds = [];

	/**
	 * @param Title $title
	 * @param array $params
	 */
	public function __construct( $title, $params ) {
		parent::__construct( __CLASS__, $title, $params );
		$this->userIds = $params['userIds'];
	}

	/**
	 * Run the job of finding & deleting older notifications
	 * @return true
	 */
	public function run() {
		global $wgEchoMaxUpdateCount;
		if ( count( $this->userIds ) > 1 ) {
			// If there are multiple users, queue a single job for each one
			$jobs = [];
			foreach ( $this->userIds as $userId ) {
				$jobs[] = new EchoNotificationDeleteJob( $this->title, [ 'userIds' => [ $userId ] ] );
			}
			JobQueueGroup::singleton()->push( $jobs );

			return true;
		}

		$notifMapper = new EchoNotificationMapper();
		$targetMapper = new EchoTargetPageMapper();

		// Back-compat for older jobs which used array( $userId => $userId );
		$userIds = array_values( $this->userIds );
		$userId = $userIds[0];
		$user = User::newFromId( $userId );
		$notif = $notifMapper->fetchByUserOffset( $user, $wgEchoMaxUpdateCount );
		if ( $notif ) {
			$res = $notifMapper->deleteByUserEventOffset(
				$user, $notif->getEvent()->getId()
			);
			if ( $res ) {
				$notifUser = MWEchoNotifUser::newFromUser( $user );
				$notifUser->resetNotificationCount( DB_MASTER );
			}
		}

		return true;
	}

}
