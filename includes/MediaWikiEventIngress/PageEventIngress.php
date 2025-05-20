<?php

declare( strict_types = 1 );

namespace MediaWiki\Extension\Notifications\MediaWikiEventIngress;

use MediaWiki\DomainEvent\DomainEventIngress;
use MediaWiki\Extension\Notifications\DiscussionParser;
use MediaWiki\Extension\Notifications\Hooks as EchoHooks;
use MediaWiki\Extension\Notifications\Mapper\NotificationMapper;
use MediaWiki\Extension\Notifications\Model\Event;
use MediaWiki\Logger\LoggerFactory;
use MediaWiki\Page\Event\PageRevisionUpdatedEvent;
use MediaWiki\Page\Event\PageRevisionUpdatedListener;
use MediaWiki\Revision\RevisionStore;
use MediaWiki\Storage\EditResult;
use MediaWiki\User\UserEditTracker;
use MediaWiki\User\UserIdentity;

class PageEventIngress extends DomainEventIngress implements PageRevisionUpdatedListener {
	private RevisionStore $revisionStore;
	private UserEditTracker $userEditTracker;

	public function __construct(
		RevisionStore $revisionStore,
		UserEditTracker $userEditTracker
	) {
		$this->revisionStore = $revisionStore;
		$this->userEditTracker = $userEditTracker;
	}

	public function handlePageRevisionUpdatedEvent( PageRevisionUpdatedEvent $event ): void {
		$editResult = $event->getEditResult();

		if ( $editResult == null ) {
			return;
		}

		$isRevert = $event->isRevert();
		$revisionRecord = $event->getLatestRevisionAfter();

		/**
		 * Save the revert status for the LinksUpdateComplete hook
		 * TODO: Deprecate this when LinksUpdateComplete is migrated to it's corresponding
		 * Domain event
		 */
		EchoHooks::setRevertStatus( $isRevert, $revisionRecord );
		DiscussionParser::generateEventsForRevision( $revisionRecord, $isRevert );

		// If the user is not an IP and this is not a null edit,
		// test for them reaching a congratulatory threshold
		$title = $event->getPageRecordAfter();
		$userIdentity = $event->getAuthor();
		$thresholds = [ 1, 10, 100, 1000, 10000, 100000, 1000000, 10000000 ];
		if ( $userIdentity->isRegistered() ) {
			$thresholdCount = $this->getPredictedEditCount( $userIdentity );
			if ( in_array( $thresholdCount, $thresholds ) ) {
				$notificationMapper = new NotificationMapper();
				$notifications = $notificationMapper->fetchByUser( $userIdentity, 10, null, [ 'thank-you-edit' ] );
				/** @var Notification $notification */
				foreach ( $notifications as $notification ) {
					if ( $notification->getEvent()->getExtraParam( 'editCount' ) === $thresholdCount ) {
						LoggerFactory::getInstance( 'Echo' )->debug(
							'{user} (id: {id}) has already been thanked for their {count} edit',
							[
								'user' => $userIdentity->getName(),
								'id' => $userIdentity->getId(),
								'count' => $thresholdCount,
							]
						);
						return;
					}
				}

				Event::create( [
					'type' => 'thank-you-edit',
					'title' => $title,
					'agent' => $userIdentity,
					// Edit threshold notifications are sent to the agent
					'extra' => [
						'editCount' => $thresholdCount,
						'revid' => $revisionRecord->getId(),
					]
				] );
			}
		}
		// Handle the case of someone undoing an edit, either through the
		// 'undo' link in the article history or via the API.
		// Reverts through the 'rollback' link (EditResult::REVERT_ROLLBACK)
		// are handled in Hooks::onRollbackComplete().
		if ( $editResult->getRevertMethod() === EditResult::REVERT_UNDO ) {
			$undidRevId = $editResult->getUndidRevId();
			$undidRevision = $this->revisionStore->getRevisionById( $undidRevId );
			if ( $undidRevision && $undidRevision->getPage()->isSamePageAs( $title ) ) {
				$revertedUser = $undidRevision->getUser();
				// No notifications for anonymous users
				if ( $revertedUser && $revertedUser->getId() ) {
					Event::create( [
						'type' => 'reverted',
						'title' => $title,
						'extra' => [
							'revid' => $revisionRecord->getId(),
							'reverted-user-id' => $revertedUser->getId(),
							'reverted-revision-id' => $undidRevId,
							'method' => 'undo',
							'summary' => $revisionRecord->getComment()->text
						],
						'agent' => $userIdentity,
					] );
				}
			}
		}
	}

	/**
	 * Get the predicted edit count after a page save event
	 *
	 * @param UserIdentity $user
	 * @return int
	 */
	private function getPredictedEditCount( UserIdentity $user ) {
		$editCount = $this->userEditTracker->getUserEditCount( $user ) ?: 0;
		// When this code runs, the deferred update that increments the edit count
		// will still be pending.
		return $editCount + 1;
	}
}
