<?php

/**
 * Tests for the built in notification types
 *
 * @group Database
 */
class NotificationsTest extends MediaWikiTestCase {

	/** @var User $sysop */
	// @codingStandardsIgnoreStart
	var $sysop;
	// @codingStandardsIgnoreEnd

	protected function setUp() {
		parent::setUp();
		$this->sysop = User::newFromName( 'UTSysop' );
		$this->setMwGlobals( 'wgUser', $this->sysop );
	}

	/**
	 * Helper function to get a user's latest notification
	 * @param User $user
	 * @return EchoEvent
	 */
	public static function getLatestNotification( $user ) {
		$notifs = ApiEchoNotifications::getNotifications( $user );
		$index = array_keys( $notifs );

		return EchoEvent::newFromID( $notifs[$index[0]]['id'] );
	}

	/**
	 * @covers EchoHooks::onUserRights
	 */
	public function testUserRightsNotif() {
		$user = new User();
		$user->setName( 'Dummy' );
		$user->addToDatabase();

		$context = new DerivativeContext( RequestContext::getMain() );
		$context->setUser( $this->sysop );
		$ur = new UserrightsPage();
		$ur->setContext( $context );
		$ur->doSaveUserGroups( $user, [ 'sysop' ], [], 'reason' );
		$event = self::getLatestNotification( $user );
		$this->assertEquals( $event->getType(), 'user-rights' );
		$this->assertEquals( $this->sysop->getName(), $event->getAgent()->getName() );
		$extra = $event->getExtra();
		$this->assertArrayHasKey( 'add', $extra );
		$this->assertArrayEquals( [ 'sysop' ], $extra['add'] );
		$this->assertArrayEquals( [], $extra['remove'] );
	}

}
