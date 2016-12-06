<?php

/**
 * @group Echo
 */
class MWEchoThankYouEditTest extends MediaWikiTestCase {

	protected function setUp() {
		parent::setUp();
	}

	public function testFirstEdit() {
		// setup
		$user = $this->getMutableTestUser()->getUser();
		$title = Title::newFromText( 'Help:MWEchoThankYouEditTest_testFirstEdit' );

		// action
		$this->edit( $title, $user, 'this is my first edit' );

		// assertions
		$notificationMapper = new EchoNotificationMapper();
		$notifications = $notificationMapper->fetchByUser( $user, 10, null, [ 'thank-you-edit' ] );
		$this->assertCount( 1, $notifications );

		/** @var EchoNotification $notification */
		$notification = reset( $notifications );
		$this->assertEquals( 1, $notification->getEvent()->getExtraParam( 'editCount', 'not found' ) );
	}

	public function testTenthEdit() {
		// setup
		$user = $this->getMutableTestUser()->getUser();
		$title = Title::newFromText( 'Help:MWEchoThankYouEditTest_testTenthEdit' );

		// action
		// we could fast-forward the edit-count to speed things up
		// but this is the only way to make sure duplicate notifications
		// are not generated
		for ( $i = 0; $i < 12; $i++ ) {
			$this->edit( $title, $user, "this is edit #$i" );
		}

		// assertions
		$notificationMapper = new EchoNotificationMapper();
		$notifications = $notificationMapper->fetchByUser( $user, 10, null, [ 'thank-you-edit' ] );
		$this->assertCount( 2, $notifications );

		/** @var EchoNotification $notification */
		$notification = reset( $notifications );
		$this->assertEquals( 10, $notification->getEvent()->getExtraParam( 'editCount', 'not found' ) );
	}

	private function edit( Title $title, User $user, $text ) {
		$page = WikiPage::factory( $title );
		$content = ContentHandler::makeContent( $text, $title );
		$page->doEditContent( $content, 'test', 0, false, $user );
	}
}
