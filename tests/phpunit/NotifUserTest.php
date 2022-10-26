<?php

use MediaWiki\MediaWikiServices;
use MediaWiki\User\UserOptionsLookup;

/**
 * @covers \MWEchoNotifUser
 * @group Echo
 */
class MWEchoNotifUserTest extends MediaWikiIntegrationTestCase {

	/**
	 * @var WANObjectCache
	 */
	private $cache;

	protected function setUp(): void {
		parent::setUp();
		$this->cache = new WANObjectCache( [
			'cache' => MediaWikiServices::getInstance()->getMainObjectStash(),
		] );
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
		$this->assertInstanceOf( MWEchoNotifUser::class, $notifUser );
	}

	public function testGetEmailFormat() {
		$userOptionsLookup = $this->getServiceContainer()->getUserOptionsLookup();
		$user = User::newFromId( 2 );
		$notifUser = MWEchoNotifUser::newFromUser( $user );

		$this->setMwGlobals( 'wgAllowHTMLEmail', true );
		$this->assertEquals( $notifUser->getEmailFormat(),
			$userOptionsLookup->getOption( $user, 'echo-email-format' ) );
		$this->setMwGlobals( 'wgAllowHTMLEmail', false );
		$this->assertEquals( $notifUser->getEmailFormat(), EchoEmailFormat::PLAIN_TEXT );
	}

	public function testMarkRead() {
		$notifUser = new MWEchoNotifUser(
			User::newFromId( 2 ),
			$this->cache,
			$this->mockEchoUserNotificationGateway( [ 'markRead' => true ] ),
			$this->mockEchoNotificationMapper(),
			$this->createMock( EchoTargetPageMapper::class ),
			$this->createNoOpMock( UserOptionsLookup::class ),
			$this->getServiceContainer()->getUserFactory(),
			$this->getServiceContainer()->getReadOnlyMode()
		);
		$this->assertFalse( $notifUser->markRead( [] ) );
		$this->assertTrue( $notifUser->markRead( [ 1 ] ) );

		$notifUser = new MWEchoNotifUser(
			User::newFromId( 2 ),
			$this->cache,
			$this->mockEchoUserNotificationGateway( [ 'markRead' => false ] ),
			$this->mockEchoNotificationMapper(),
			$this->createMock( EchoTargetPageMapper::class ),
			$this->createNoOpMock( UserOptionsLookup::class ),
			$this->getServiceContainer()->getUserFactory(),
			$this->getServiceContainer()->getReadOnlyMode()
		);
		$this->assertFalse( $notifUser->markRead( [] ) );
		$this->assertFalse( $notifUser->markRead( [ 1 ] ) );
	}

	public function testMarkAllRead() {
		// Successful mark as read & non empty fetch
		$notifUser = new MWEchoNotifUser(
			User::newFromId( 2 ),
			$this->cache,
			$this->mockEchoUserNotificationGateway( [ 'markRead' => true ] ),
			$this->mockEchoNotificationMapper( [ $this->mockEchoNotification() ] ),
			$this->createMock( EchoTargetPageMapper::class ),
			$this->createNoOpMock( UserOptionsLookup::class ),
			$this->getServiceContainer()->getUserFactory(),
			$this->getServiceContainer()->getReadOnlyMode()
		);
		$this->assertTrue( $notifUser->markAllRead() );

		// Unsuccessful mark as read & non empty fetch
		$notifUser = new MWEchoNotifUser(
			User::newFromId( 2 ),
			$this->cache,
			$this->mockEchoUserNotificationGateway( [ 'markRead' => false ] ),
			$this->mockEchoNotificationMapper( [ $this->mockEchoNotification() ] ),
			$this->createMock( EchoTargetPageMapper::class ),
			$this->createNoOpMock( UserOptionsLookup::class ),
			$this->getServiceContainer()->getUserFactory(),
			$this->getServiceContainer()->getReadOnlyMode()
		);
		$this->assertFalse( $notifUser->markAllRead() );

		// Successful mark as read & empty fetch
		$notifUser = new MWEchoNotifUser(
			User::newFromId( 2 ),
			$this->cache,
			$this->mockEchoUserNotificationGateway( [ 'markRead' => true ] ),
			$this->mockEchoNotificationMapper(),
			$this->createMock( EchoTargetPageMapper::class ),
			$this->createNoOpMock( UserOptionsLookup::class ),
			$this->getServiceContainer()->getUserFactory(),
			$this->getServiceContainer()->getReadOnlyMode()
		);
		$this->assertFalse( $notifUser->markAllRead() );

		// Unsuccessful mark as read & empty fetch
		$notifUser = new MWEchoNotifUser(
			User::newFromId( 2 ),
			$this->cache,
			$this->mockEchoUserNotificationGateway( [ 'markRead' => false ] ),
			$this->mockEchoNotificationMapper(),
			$this->createMock( EchoTargetPageMapper::class ),
			$this->createNoOpMock( UserOptionsLookup::class ),
			$this->getServiceContainer()->getUserFactory(),
			$this->getServiceContainer()->getReadOnlyMode()
		);
		$this->assertFalse( $notifUser->markAllRead() );
	}

	public function mockEchoUserNotificationGateway( array $dbResult = [] ) {
		$dbResult += [
			'markRead' => true
		];
		$gateway = $this->createMock( EchoUserNotificationGateway::class );
		$gateway->method( 'markRead' )
			->willReturn( $dbResult['markRead'] );
		$gateway->method( 'getDB' )
			->willReturn( $this->createMock( IDatabase::class ) );

		return $gateway;
	}

	public function mockEchoNotificationMapper( array $result = [] ) {
		$mapper = $this->createMock( EchoNotificationMapper::class );
		$mapper->method( 'fetchUnreadByUser' )
			->willReturn( $result );

		return $mapper;
	}

	protected function mockEchoNotification() {
		$notification = $this->createMock( EchoNotification::class );
		$notification->method( 'getEvent' )
			->willReturn( $this->mockEchoEvent() );

		return $notification;
	}

	protected function mockEchoEvent() {
		$event = $this->createMock( EchoEvent::class );
		$event->method( 'getId' )
			->willReturn( 1 );

		return $event;
	}

	protected function newNotifUser() {
		return new MWEchoNotifUser(
			User::newFromId( 2 ),
			$this->cache,
			$this->mockEchoUserNotificationGateway(),
			$this->mockEchoNotificationMapper(),
			$this->createMock( EchoTargetPageMapper::class ),
			$this->createNoOpMock( UserOptionsLookup::class ),
			$this->getServiceContainer()->getUserFactory(),
			$this->getServiceContainer()->getReadOnlyMode()
		);
	}
}
