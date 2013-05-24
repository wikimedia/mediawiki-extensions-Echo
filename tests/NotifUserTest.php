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

}
