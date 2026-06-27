<?php

namespace MediaWiki\Extension\Notifications\Test\Integration;

use MediaWiki\Permissions\UltimateAuthority;
use MediaWiki\Revision\SlotRecord;
use MediaWiki\Storage\EditResult;
use MediaWiki\Storage\PageUpdateCauses;
use MediaWiki\User\UserIdentity;
use MediaWikiIntegrationTestCase;
use TestUser;

/**
 * Test whether 'reverted' notifications are sent for rollbacks, undos, and manual reverts.
 *
 * Also test the behavior of notifications that are suppressed when reverting: summary mentions and page links.
 *
 * @covers \MediaWiki\Extension\Notifications\MediaWikiEventIngress\PageEventIngress
 * @group Database
 */
class RevertedEventIntegrationTest extends MediaWikiIntegrationTestCase {

	/**
	 * @return \MediaWiki\Revision\RevisionRecord[]
	 */
	private function commonRevertSetup(): array {
		$this->clearHook( 'BeforeEchoEventInsert' );
		$this->overrideConfigValue( 'EchoUseJobQueue', false );

		$this->overrideConfigValue( 'EchoMaxMentionsInEditSummary', 10 );

		$userA = new TestUser( 'A' );
		$userB = new TestUser( 'B' );
		$userC = new TestUser( 'C' );

		$userOptionsManager = $this->getServiceContainer()->getUserOptionsManager();
		$userOptionsManager->setOption( $userB->getUser(), 'echo-subscriptions-web-reverted', true );
		$userOptionsManager->saveOptions( $userB->getUser() );
		$userOptionsManager->setOption( $userC->getUser(), 'echo-subscriptions-web-article-linked', true );
		$userOptionsManager->setOption( $userC->getUser(), 'echo-subscriptions-web-mention-summary', true );
		$userOptionsManager->saveOptions( $userC->getUser() );

		// Create page for testing page-linked notifications
		$statusC = $this->editPage(
			'Other page',
			'Edit C',
			performer: $userC->getUser()
		);
		$this->assertStatusGood( $statusC );

		// Create a test page, sending a page-linked and mention-summary notifications
		$pageTitle = 'Test page';
		$statusA = $this->editPage(
			$pageTitle,
			'[[Other page]]',
			summary: "Hello [[User:{$userC->getUser()->getName()}]]",
			performer: $userA->getUser()
		);
		$this->assertStatusGood( $statusA );

		// Verify that a notification was generated
		$this->assertNotificationCount( $userC->getUser(), 'page-linked', 1 );
		$this->assertNotificationCount( $userC->getUser(), 'mention-summary', 1 );

		$statusB = $this->editPage(
			$pageTitle,
			'Edit B',
			performer: $userB->getUser()
		);
		$this->assertStatusGood( $statusB );

		return [ $statusA->getNewRevision(), $statusB->getNewRevision(), $statusC->getNewRevision() ];
	}

	private function assertNotificationCount( UserIdentity $user, string $type, int $expectedCount ): void {
		$this->newSelectQueryBuilder()
			->select( 'COUNT(*)' )
			->from( 'echo_event' )
			->join( 'echo_notification', null, 'event_id=notification_event' )
			->where( [ 'event_type' => $type ] )
			->where( [ 'notification_user' => $user->getId() ] )
			->assertFieldValue( (string)$expectedCount );
	}

	public function testRollback() {
		[ $revA, $revB, $revC ] = $this->commonRevertSetup();

		$status = $this->getServiceContainer()->getRollbackPageFactory()
			->newRollbackPage( $revA->getPage(), new UltimateAuthority( $revA->getUser() ), $revB->getUser() )
			->rollback();
		$this->assertStatusGood( $status );

		// Verify that a notification was generated
		$this->assertNotificationCount( $revB->getUser(), 'reverted', 1 );
		// BUG: We generate an extra 'page-linked' notification here, but we shouldn't (T148949)
		$this->assertNotificationCount( $revC->getUser(), 'page-linked', 2 );
		$this->assertNotificationCount( $revC->getUser(), 'mention-summary', 1 );
	}

	public function testUndo() {
		[ $revA, $revB, $revC ] = $this->commonRevertSetup();

		$pageUpdater = $this->getServiceContainer()->getPageUpdaterFactory()
			->newPageUpdater( $revA->getPage(), $revA->getUser() );
		$pageUpdater
			->setContent( SlotRecord::MAIN, $revA->getContent( SlotRecord::MAIN ) )
			->setOriginalRevisionId( $revA->getId() )
			->setCause( PageUpdateCauses::CAUSE_UNDO )
			->markAsRevert(
				EditResult::REVERT_UNDO,
				$revB->getId(),
				$revA->getId()
			)
			->saveRevision( '' );
		$this->assertStatusGood( $pageUpdater->getStatus() );

		// Verify that a notification was generated
		$this->assertNotificationCount( $revB->getUser(), 'reverted', 1 );
		// Verify that no other notifications were generated (1 was already generated in setup)
		$this->assertNotificationCount( $revC->getUser(), 'page-linked', 1 );
		$this->assertNotificationCount( $revC->getUser(), 'mention-summary', 1 );
	}

	public function testManualRevert() {
		[ $revA, $revB, $revC ] = $this->commonRevertSetup();

		$status = $this->editPage(
			$revA->getPage(),
			$revA->getContent( SlotRecord::MAIN ),
			performer: $revA->getUser()
		);
		$this->assertStatusGood( $status );

		// Verify that a notification was NOT generated (see T154637, T153570)
		$this->assertNotificationCount( $revB->getUser(), 'reverted', 0 );
		// Verify that no other notifications were generated (1 was already generated in setup)
		// This works even though we don't generate a revert notification
		$this->assertNotificationCount( $revC->getUser(), 'page-linked', 1 );
		$this->assertNotificationCount( $revC->getUser(), 'mention-summary', 1 );
	}

}
