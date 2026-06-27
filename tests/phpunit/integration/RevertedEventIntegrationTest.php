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

		$userA = new TestUser( 'A' );
		$userB = new TestUser( 'B' );

		$userOptionsManager = $this->getServiceContainer()->getUserOptionsManager();
		$userOptionsManager->setOption( $userB->getUser(), 'echo-subscriptions-web-reverted', true );
		$userOptionsManager->saveOptions( $userB->getUser() );

		$pageTitle = 'Test page';
		$statusA = $this->editPage(
			$pageTitle,
			'Edit A',
			performer: $userA->getUser()
		);
		$this->assertStatusGood( $statusA );

		$statusB = $this->editPage(
			$pageTitle,
			'Edit B',
			performer: $userB->getUser()
		);
		$this->assertStatusGood( $statusB );

		return [ $statusA->getNewRevision(), $statusB->getNewRevision() ];
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
		[ $revA, $revB ] = $this->commonRevertSetup();

		$status = $this->getServiceContainer()->getRollbackPageFactory()
			->newRollbackPage( $revA->getPage(), new UltimateAuthority( $revA->getUser() ), $revB->getUser() )
			->rollback();
		$this->assertStatusGood( $status );

		// Verify that a notification was generated
		$this->assertNotificationCount( $revB->getUser(), 'reverted', 1 );
	}

	public function testUndo() {
		[ $revA, $revB ] = $this->commonRevertSetup();

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
	}

	public function testManualRevert() {
		[ $revA, $revB ] = $this->commonRevertSetup();

		$status = $this->editPage(
			$revA->getPage(),
			$revA->getContent( SlotRecord::MAIN ),
			performer: $revA->getUser()
		);
		$this->assertStatusGood( $status );

		// Verify that a notification was NOT generated (see T154637, T153570)
		$this->assertNotificationCount( $revB->getUser(), 'reverted', 0 );
	}

}
