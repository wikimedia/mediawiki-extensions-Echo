<?php

namespace MediaWiki\Extension\Notifications\Controller;

use MediaWiki\Deferred\DeferredUpdates;
use MediaWiki\Extension\Notifications\Mapper\EventMapper;
use MediaWiki\Extension\Notifications\Mapper\NotificationMapper;
use MediaWiki\Extension\Notifications\NotifUser;
use MediaWiki\User\UserFactory;
use Wikimedia\Rdbms\ILBFactory;

/**
 * This class represents the controller for events
 *
 * @since 1.47
 */
class EventController {

	public function __construct(
		private readonly EventMapper $eventMapper,
		private readonly NotificationMapper $notificationMapper,
		private readonly ILBFactory $lbFactory,
		private readonly UserFactory $userFactory,
	) {
	}

	/**
	 * Hide or show events by toggling their deletion state.
	 *
	 * Echo shows the events again when the page is undeleted. Therefore, this cannot
	 * be used to permanently hide events.
	 *
	 * @param int[] $eventIds
	 * @param bool $hidden Whether to hide or show the events
	 */
	public function toggleHiddenState( array $eventIds, bool $hidden ): void {
		if ( !$eventIds ) {
			return;
		}

		$affectedUserIds = $this->notificationMapper->fetchUsersWithNotificationsForEvents( $eventIds );
		$this->eventMapper->toggleDeleted( $eventIds, $hidden );

		$this->resetNotificationCountsAfterCommit( $affectedUserIds );
	}

	/**
	 * @param int[] $affectedUserIds
	 */
	private function resetNotificationCountsAfterCommit( array $affectedUserIds ): void {
		$fname = __METHOD__;
		DeferredUpdates::addCallableUpdate( function () use ( $affectedUserIds, $fname ) {
			// This update runs after the main transaction round commits.
			// Wait for the event changes to be propagated to replica DBs
			$this->lbFactory->waitForReplication( [ 'timeout' => 5 ] );
			$this->lbFactory->flushReplicaSnapshots( $fname );

			// Recompute the notification count for the users whose notifications have changed.
			foreach ( $affectedUserIds as $userId ) {
				$user = $this->userFactory->newFromId( $userId );
				NotifUser::newFromUser( $user )->resetNotificationCount();
			}
		} );
	}
}
