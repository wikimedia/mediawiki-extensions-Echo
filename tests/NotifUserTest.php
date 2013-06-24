<?php

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

}
