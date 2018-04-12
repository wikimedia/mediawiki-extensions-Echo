<?php
use MediaWiki\MediaWikiServices;

/**
 * @covers MWEchoNotifUser
 * @group Echo
 */
class MWEchoNotifUserTest extends MediaWikiTestCase {

	/**
	 * @var WANObjectCache
	 */
	private $cache;

	protected function setUp() {
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
		$this->assertInstanceOf( 'MWEchoNotifUser', $notifUser );
	}

	public function testFlagCacheWithNewTalkNotification() {
		$notifUser = $this->newNotifUser();

		$notifUser->flagCacheWithNewTalkNotification();
		$this->assertEquals( '1', $this->cache->get( $notifUser->getTalkNotificationCacheKey() ) );
	}

	public function testFlagCacheWithNoTalkNotification() {
		$notifUser = $this->newNotifUser();

		$notifUser->flagCacheWithNoTalkNotification();
		$this->assertEquals( '0', $this->cache->get( $notifUser->getTalkNotificationCacheKey() ) );
	}

	public function testNotifCountHasReachedMax() {
		$notifUser = $this->newNotifUser();

		if ( $notifUser->getLocalNotificationCount() > MWEchoNotifUser::MAX_BADGE_COUNT ) {
			$this->assertTrue( $notifUser->notifCountHasReachedMax() );
		} else {
			$this->assertFalse( $notifUser->notifCountHasReachedMax() );
		}
	}

	public function testClearTalkNotification() {
		$notifUser = $this->newNotifUser();

		$notifUser->flagCacheWithNewTalkNotification();

		$hasMax = $notifUser->notifCountHasReachedMax();

		$notifUser->clearTalkNotification();
		if ( $hasMax ) {
			$this->assertEquals( '1', $this->cache->get( $notifUser->getTalkNotificationCacheKey() ) );
		} else {
			$this->assertEquals( '0', $this->cache->get( $notifUser->getTalkNotificationCacheKey() ) );
		}
	}

	public function testGetEmailFormat() {
		$user = User::newFromId( 2 );
		$notifUser = MWEchoNotifUser::newFromUser( $user );

		$this->setMwGlobals( 'wgAllowHTMLEmail', true );
		$this->assertEquals( $notifUser->getEmailFormat(), $user->getOption( 'echo-email-format' ) );
		$this->setMwGlobals( 'wgAllowHTMLEmail', false );
		$this->assertEquals( $notifUser->getEmailFormat(), EchoEmailFormat::PLAIN_TEXT );
	}

	public function testMarkRead() {
		$notifUser = new MWEchoNotifUser(
			User::newFromId( 2 ),
			$this->cache,
			$this->mockEchoUserNotificationGateway( [ 'markRead' => true ] ),
			$this->mockEchoNotificationMapper(),
			$this->mockEchoTargetPageMapper()
		);
		$this->assertFalse( $notifUser->markRead( [] ) );
		$this->assertTrue( $notifUser->markRead( [ 1 ] ) );

		$notifUser = new MWEchoNotifUser(
			User::newFromId( 2 ),
			$this->cache,
			$this->mockEchoUserNotificationGateway( [ 'markRead' => false ] ),
			$this->mockEchoNotificationMapper(),
			$this->mockEchoTargetPageMapper()
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
			$this->mockEchoTargetPageMapper()
		);
		$this->assertTrue( $notifUser->markAllRead() );

		// Unsuccessful mark as read & non empty fetch
		$notifUser = new MWEchoNotifUser(
			User::newFromId( 2 ),
			$this->cache,
			$this->mockEchoUserNotificationGateway( [ 'markRead' => false ] ),
			$this->mockEchoNotificationMapper( [ $this->mockEchoNotification() ] ),
			$this->mockEchoTargetPageMapper()
		);
		$this->assertFalse( $notifUser->markAllRead() );

		// Successful mark as read & empty fetch
		$notifUser = new MWEchoNotifUser(
			User::newFromId( 2 ),
			$this->cache,
			$this->mockEchoUserNotificationGateway( [ 'markRead' => true ] ),
			$this->mockEchoNotificationMapper(),
			$this->mockEchoTargetPageMapper()
		);
		$this->assertFalse( $notifUser->markAllRead() );

		// Unsuccessful mark as read & empty fetch
		$notifUser = new MWEchoNotifUser(
			User::newFromId( 2 ),
			$this->cache,
			$this->mockEchoUserNotificationGateway( [ 'markRead' => false ] ),
			$this->mockEchoNotificationMapper(),
			$this->mockEchoTargetPageMapper()
		);
		$this->assertFalse( $notifUser->markAllRead() );
	}

	public function mockEchoUserNotificationGateway( array $dbResult = [] ) {
		$dbResult += [
			'markRead' => true
		];
		$gateway = $this->getMockBuilder( 'EchoUserNotificationGateway' )
			->disableOriginalConstructor()
			->getMock();
		$gateway->expects( $this->any() )
			->method( 'markRead' )
			->will( $this->returnValue( $dbResult['markRead'] ) );

		return $gateway;
	}

	public function mockEchoNotificationMapper( array $result = [] ) {
		$mapper = $this->getMockBuilder( 'EchoNotificationMapper' )
			->disableOriginalConstructor()
			->getMock();
		$mapper->expects( $this->any() )
			->method( 'fetchUnreadByUser' )
			->will( $this->returnValue( $result ) );

		return $mapper;
	}

	public function mockEchoTargetPageMapper() {
		return $this->getMockBuilder( EchoTargetPageMapper::class )
			->disableOriginalConstructor()
			->getMock();
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

	protected function newNotifUser() {
		return new MWEchoNotifUser(
			User::newFromId( 2 ),
			$this->cache,
			$this->mockEchoUserNotificationGateway(),
			$this->mockEchoNotificationMapper(),
			$this->mockEchoTargetPageMapper()
		);
	}
}
