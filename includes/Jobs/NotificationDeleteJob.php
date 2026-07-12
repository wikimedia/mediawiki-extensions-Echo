<?php

namespace MediaWiki\Extension\Notifications\Jobs;

use MediaWiki\Extension\Notifications\Mapper\NotificationMapper;
use MediaWiki\Extension\Notifications\NotifUser;
use MediaWiki\JobQueue\Job;
use MediaWiki\JobQueue\JobQueueGroup;
use MediaWiki\JobQueue\JobSpecification;
use MediaWiki\User\UserFactory;

/**
 * This job is created when sending notifications to the target users.  The purpose
 * of this job is to delete older notifications when the number of notifications a
 * user has is more than $wgEchoMaxUpdateCount and to delete notifications older than
 * $wgEchoMaxNotificationAge seconds ago.
 *
 * It does not make sense to have tons of notifications in the history while users
 * wouldn't bother to click 'load more' like 100 times to see them.
 * What we gain from this is we could run expensive queries otherwise that would
 * requires adding index and data denormalization.
 *
 * The initial job contains multiple users, which will in turn have individual jobs
 * queued for them.
 */
class NotificationDeleteJob extends Job {
	public function __construct(
		array $params,
		private readonly JobQueueGroup $jobQueueGroup,
		private readonly UserFactory $userFactory,
	) {
		parent::__construct( 'EchoNotificationDeleteJob', $params );
	}

	/**
	 * Run the job of finding & deleting older notifications
	 * @return true
	 */
	public function run() {
		global $wgEchoMaxUpdateCount, $wgEchoMaxNotificationAge;
		if ( count( $this->params['userIds'] ) > 1 ) {
			// If there are multiple users, queue a single job for each one
			$jobs = [];
			foreach ( $this->params['userIds'] as $userId ) {
				$jobs[] = new JobSpecification(
					'EchoNotificationDeleteJob',
					[ 'userIds' => [ $userId ] ]
				);
			}
			$this->jobQueueGroup->push( $jobs );

			return true;
		}

		$notifMapper = new NotificationMapper();

		// Back-compat for older jobs which used [ $userId => $userId ];
		$userId = array_first( $this->params['userIds'] );
		$user = $this->userFactory->newFromId( $userId );
		$notif = $notifMapper->fetchByUserOffset( $user, $wgEchoMaxUpdateCount );
		if ( $notif ) {
			$notifMapper->deleteByUserEventOffset(
				$user, $notif->getEvent()->getId()
			);
		}

		// Also delete old notifications
		$notifMapper->deleteByUserAndAge( $user, $wgEchoMaxNotificationAge );

		$notifUser = NotifUser::newFromUser( $user );
		$notifUser->resetNotificationCount();

		return true;
	}

}
