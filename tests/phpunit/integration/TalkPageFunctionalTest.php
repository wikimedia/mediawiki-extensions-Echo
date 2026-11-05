<?php

namespace MediaWiki\Extension\Notifications\Test\Integration;

use MediaWiki\Extension\Notifications\Mapper\NotificationMapper;
use MediaWiki\Extension\Notifications\Model\Event;
use MediaWiki\Extension\Notifications\Model\Notification;
use MediaWiki\Tests\Api\ApiTestCase;
use MediaWiki\User\UserIdentity;

/**
 * @group Echo
 * @group Database
 * @group medium
 */
class TalkPageFunctionalTest extends ApiTestCase {

	use EchoNotificationTestTrait;

	private function fetchLatestEditUserTalkNotification( UserIdentity $user ): Notification {
		$notificationMapper = new NotificationMapper();
		$notifications = $notificationMapper->fetchByUser( $user, 1, null, [ 'edit-user-talk' ] );
		return array_first( $notifications );
	}

	/**
	 * Creates and updates a user talk page a few times to ensure proper events are
	 * created.
	 * @covers \MediaWiki\Extension\Notifications\DiscussionParser
	 */
	public function testAddCommentsToTalkPage() {
		$editor = $this->getTestSysop()->getUser();
		$owner = $this->getTestUser()->getUser();
		$talkTitle = $owner->getUser()->getTalkPage();
		$talkPage = $this->getServiceContainer()->getWikiPageFactory()->newFromTitle( $talkTitle );

		$expectedMessageCount = 0;
		$this->assertNotificationCount( $owner, 'edit-user-talk', $expectedMessageCount );

		// Start a talkpage
		$expectedMessageCount++;
		$content = "== Section 8 ==\n\nblah blah ~~~~\n";
		$this->editPage(
			$talkPage,
			$content,
			'',
			NS_USER_TALK,
			$editor
		);

		// Ensure the proper event was created
		$this->assertNotificationCount( $owner, 'edit-user-talk', $expectedMessageCount );
		$notif = $this->fetchLatestEditUserTalkNotification( $owner );
		$this->assertEventSectionTitle( 'Section 8', $notif->getEvent() );

		// Add another message to the talk page
		$expectedMessageCount++;
		$content .= "More content ~~~~\n";
		$this->editPage(
			$talkPage,
			$content,
			'',
			NS_USER_TALK,
			$editor
		);

		// Ensure another event was created
		$this->assertNotificationCount( $owner, 'edit-user-talk', $expectedMessageCount );
		$notif = $this->fetchLatestEditUserTalkNotification( $owner );
		$this->assertEventSectionTitle( 'Section 8', $notif->getEvent() );

		// Add a new section and a message within it
		$expectedMessageCount++;
		$content .= "\n\n== EE ==\n\nhere we go with a new section ~~~~\n";
		$this->editPage(
			$talkPage,
			$content,
			'',
			NS_USER_TALK,
			$editor
		);

		// Ensure this event has the new section title
		$this->assertNotificationCount( $owner, 'edit-user-talk', $expectedMessageCount );
		$notif = $this->fetchLatestEditUserTalkNotification( $owner );
		$this->assertEventSectionTitle( 'EE', $notif->getEvent() );
	}

	protected function assertEventSectionTitle( $sectionTitle, Event $event ) {
		$this->assertEquals(
			$sectionTitle,
			$event->getExtraParam( 'section-title' ),
			'Detected section title must match'
		);
	}

}
