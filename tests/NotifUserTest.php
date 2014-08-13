<?php

/**
 * @group Echo
 */
class MWEchoNotifUserTest extends MediaWikiTestCase {

	protected function setUp() {
		parent::setUp();
		$this->setMwGlobals( 'wgMemc', new HashBagOStuff() );
	}

	public function testNewFromUser() {
		$exception = false;
		try {
			MWEchoNotifUser::newFromUser( User::newFromId( 0 ) );
		} catch ( Exception $e ) {
			$exception = true;
			$this->assertEquals( "User must be logged in to view notification!",
				$e->getMessage() );
		}
		$this->assertTrue( $exception, "Got exception" );

		$notifUser = MWEchoNotifUser::newFromUser( User::newFromId( 2 ) );
		$this->assertInstanceOf( 'MWEchoNotifUser', $notifUser );
	}

	public function testFlagCacheWithNewTalkNotification() {
		global $wgMemc;

		$notifUser = MWEchoNotifUser::newFromUser( User::newFromId( 2 ) );

		$notifUser->flagCacheWithNewTalkNotification();
		$this->assertEquals( '1', $wgMemc->get( $notifUser->getTalkNotificationCacheKey() ) );
	}

	public function testFlagCacheWithNoTalkNotification() {
		global $wgMemc;

		$notifUser = MWEchoNotifUser::newFromUser( User::newFromId( 2 ) );

		$notifUser->flagCacheWithNoTalkNotification();
		$this->assertEquals( '0', $wgMemc->get( $notifUser->getTalkNotificationCacheKey() ) );
	}

	public function testNotifCountHasReachedMax() {
		global $wgEchoMaxNotificationCount;

		$notifUser = MWEchoNotifUser::newFromUser( User::newFromId( 2 ) );

		if ( $notifUser->getNotificationCount() > $wgEchoMaxNotificationCount ) {
			$this->assertTrue( $notifUser->notifCountHasReachedMax() );
		} else {
			$this->assertFalse( $notifUser->notifCountHasReachedMax() );
		}
	}

	public function testClearTalkNotification() {
		global $wgMemc;

		$notifUser = MWEchoNotifUser::newFromUser( User::newFromId( 2 ) );

		$notifUser->flagCacheWithNewTalkNotification();

		$hasMax = $notifUser->notifCountHasReachedMax();

		$notifUser->clearTalkNotification();
		if ( $hasMax ) {
			$this->assertEquals( '1', $wgMemc->get( $notifUser->getTalkNotificationCacheKey() ) );
		} else {
			$this->assertEquals( '0', $wgMemc->get( $notifUser->getTalkNotificationCacheKey() ) );
		}
	}

	public function testGetEmailFormat() {
		global $wgAllowHTMLEmail;

		$format = $wgAllowHTMLEmail;

		$user = User::newFromId( 2 );
		$notifUser = MWEchoNotifUser::newFromUser( $user );

		$this->setMwGlobals( 'wgAllowHTMLEmail', true );
		$this->assertEquals( $notifUser->getEmailFormat(), $user->getOption( 'echo-email-format' ) );
		$this->setMwGlobals( 'wgAllowHTMLEmail', false );
		$this->assertEquals( $notifUser->getEmailFormat(), EchoHooks::EMAIL_FORMAT_PLAIN_TEXT );

		$this->setMwGlobals( 'wgAllowHTMLEmail', $format );
	}

	public function testMarkRead() {
		global $wgMemc;
		$notifUser = new MWEchoNotifUser(
			User::newFromId( 2 ),
			$wgMemc,
			$this->mockEchoUserNotificationGateway( array( 'markRead' => true ) ),
			$this->mockEchoNotificationMapper()
		);
		$this->assertFalse( $notifUser->markRead( array() ) );
		$this->assertTrue( $notifUser->markRead( array( 1 ) ) );

		$notifUser = new MWEchoNotifUser(
			User::newFromId( 2 ),
			$wgMemc,
			$this->mockEchoUserNotificationGateway( array( 'markRead' => false ) ),
			$this->mockEchoNotificationMapper()
		);
		$this->assertFalse( $notifUser->markRead( array() ) );
		$this->assertFalse( $notifUser->markRead( array( 1 ) ) );
	}

	public function testMarkAllRead() {
		global $wgMemc;

		// Successful mark as read & non empty fetch
		$notifUser = new MWEchoNotifUser(
			User::newFromId( 2 ),
			$wgMemc,
			$this->mockEchoUserNotificationGateway( array( 'markRead' => true ) ),
			$this->mockEchoNotificationMapper( array( $this->mockEchoNotification() ) )
		);
		$this->assertTrue( $notifUser->markAllRead() );

		// Unsuccessful mark as read & non empty fetch
		$notifUser = new MWEchoNotifUser(
			User::newFromId( 2 ),
			$wgMemc,
			$this->mockEchoUserNotificationGateway( array( 'markRead' => false ) ),
			$this->mockEchoNotificationMapper( array( $this->mockEchoNotification() ) )
		);
		$this->assertFalse( $notifUser->markAllRead() );

		// Successful mark as read & empty fetch
		$notifUser = new MWEchoNotifUser(
			User::newFromId( 2 ),
			$wgMemc,
			$this->mockEchoUserNotificationGateway( array( 'markRead' => true ) ),
			$this->mockEchoNotificationMapper()
		);
		$this->assertFalse( $notifUser->markAllRead() );

		// Unsuccessful mark as read & empty fetch
		$notifUser = new MWEchoNotifUser(
			User::newFromId( 2 ),
			$wgMemc,
			$this->mockEchoUserNotificationGateway( array( 'markRead' => false ) ),
			$this->mockEchoNotificationMapper()
		);
		$this->assertFalse( $notifUser->markAllRead() );
	}

	public function mockEchoUserNotificationGateway( array $dbResult = array() ) {
		$dbResult += array(
			'markRead' => true
		);
		$gateway = $this->getMockBuilder( 'EchoUserNotificationGateway' )
			->disableOriginalConstructor()
			->getMock();
		$gateway->expects( $this->any() )
			->method( 'markRead' )
			->will( $this->returnValue( $dbResult['markRead'] ) );
		return $gateway;
	}

	public function mockEchoNotificationMapper( array $result = array() ) {
		$mapper = $this->getMockBuilder( 'EchoNotificationMapper' )
			->disableOriginalConstructor()
			->getMock();
		$mapper->expects( $this->any() )
			->method( 'fetchUnreadByUser' )
			->will( $this->returnValue( $result ) );
		return $mapper;
	}

	protected function mockEchoNotification() {
		$notification = $this->getMockBuilder( 'EchoNotification' )
			->disableOriginalConstructor()
			->getMock();
		$notification->expects( $this->any() )
			->method( 'getEvent' )
			->will( $this->returnValue( $this->mockEchoEvent() ) );
		return $notification;
	}

	protected function mockEchoEvent() {
		$event = $this->getMockBuilder( 'EchoEvent' )
			->disableOriginalConstructor()
			->getMock();
		$event->expects( $this->any() )
			->method( 'getId' )
			->will( $this->returnValue( 1 ) );
		return $event;
	}
}
