<?php

use Wikimedia\Rdbms\IDatabase;

/**
 * @covers \EchoUserNotificationGateway
 */
class EchoUserNotificationGatewayTest extends MediaWikiUnitTestCase {

	public function testMarkRead() {
		// no event ids to mark
		$gateway = new EchoUserNotificationGateway(
			$this->mockUser(),
			$this->mockMWEchoDbFactory(),
			$this->mockConfig()
		);
		$this->assertFalse( $gateway->markRead( [] ) );

		// successful update
		$gateway = new EchoUserNotificationGateway(
			$this->mockUser(),
			$this->mockMWEchoDbFactory( [ 'update' => true ] ),
			$this->mockConfig()
		);
		$this->assertTrue( $gateway->markRead( [ 2 ] ) );

		// unsuccessful update
		$gateway = new EchoUserNotificationGateway(
			$this->mockUser(),
			$this->mockMWEchoDbFactory( [ 'update' => false ] ),
			$this->mockConfig()
		);
		$this->assertFalse( $gateway->markRead( [ 2 ] ) );
	}

	public function testMarkAllRead() {
		// successful update
		$gateway = new EchoUserNotificationGateway(
			$this->mockUser(),
			$this->mockMWEchoDbFactory( [ 'update' => true ] ),
			$this->mockConfig()
		);
		$this->assertTrue( $gateway->markAllRead( [ 2 ] ) );

		// null update
		$gateway = new EchoUserNotificationGateway(
			$this->mockUser(),
			$this->mockMWEchoDbFactory( [ 'update' => false ] ),
			$this->mockConfig()
		);
		$this->assertTrue( $gateway->markAllRead( [ 2 ] ) );
	}

	public function testGetNotificationCount() {
		// unsuccessful select
		$gateway = new EchoUserNotificationGateway(
			$this->mockUser(),
			$this->mockMWEchoDbFactory( [ 'selectRowCount' => 0 ] ),
			$this->mockConfig()
		);
		$this->assertSame( 0, $gateway->getCappedNotificationCount( DB_REPLICA, [ 'event_one' ] ) );

		// successful select of alert
		$gateway = new EchoUserNotificationGateway(
			$this->mockUser(),
			$this->mockMWEchoDbFactory( [ 'selectRowCount' => 2 ] ),
			$this->mockConfig()
		);
		$this->assertSame( 2, $gateway->getCappedNotificationCount( DB_REPLICA, [ 'event_one', 'event_two' ] ) );

		// there is event, should return 0
		$gateway = new EchoUserNotificationGateway(
			$this->mockUser(),
			$this->mockMWEchoDbFactory( [ 'selectRowCount' => 2 ] ),
			$this->mockConfig()
		);
		$this->assertSame( 0, $gateway->getCappedNotificationCount( DB_REPLICA, [] ) );

		// successful select
		$gateway = new EchoUserNotificationGateway(
			$this->mockUser(),
			$this->mockMWEchoDbFactory( [ 'selectRowCount' => 3 ] ),
			$this->mockConfig()
		);
		$this->assertSame( 3, $gateway->getCappedNotificationCount( DB_REPLICA, [ 'event_one' ] ) );
	}

	public function testGetUnreadNotifications() {
		$gateway = new EchoUserNotificationGateway(
			$this->mockUser(),
			$this->mockMWEchoDbFactory( [ 'select' => false ] ),
			$this->mockConfig()
		);
		$this->assertEmpty( $gateway->getUnreadNotifications( 'user_talk' ) );

		$dbResult = [
			(object)[ 'notification_event' => 1 ],
			(object)[ 'notification_event' => 2 ],
			(object)[ 'notification_event' => 3 ],
		];
		$gateway = new EchoUserNotificationGateway(
			$this->mockUser(),
			$this->mockMWEchoDbFactory( [ 'select' => $dbResult ] ),
			$this->mockConfig()
		);
		$res = $gateway->getUnreadNotifications( 'user_talk' );
		$this->assertEquals( $res, [ 1 => 1, 2 => 2, 3 => 3 ] );
	}

	/**
	 * Mock object of User
	 * @return User
	 */
	protected function mockUser() {
		$user = $this->getMockBuilder( User::class )
			->disableOriginalConstructor()
			->getMock();
		$user->expects( $this->any() )
			->method( 'getID' )
			->will( $this->returnValue( 1 ) );

		return $user;
	}

	/**
	 * Mock object of MWEchoDbFactory
	 * @param array $dbResult
	 * @return MWEchoDbFactory
	 */
	protected function mockMWEchoDbFactory( array $dbResult = [] ) {
		$dbFactory = $this->getMockBuilder( MWEchoDbFactory::class )
			->disableOriginalConstructor()
			->getMock();
		$dbFactory->expects( $this->any() )
			->method( 'getEchoDb' )
			->will( $this->returnValue( $this->mockDb( $dbResult ) ) );

		return $dbFactory;
	}

	protected function mockConfig() {
		return new HashConfig( [
			'UpdateRowsPerQuery' => 500,
		] );
	}

	/**
	 * Returns a mock database object
	 * @param array $dbResult
	 * @return \Wikimedia\Rdbms\IDatabase
	 */
	protected function mockDb( array $dbResult = [] ) {
		$dbResult += [
			'update' => '',
			'select' => '',
			'selectRow' => '',
			'selectRowCount' => '',
		];
		$db = $this->createMock( IDatabase::class );
		$db->expects( $this->any() )
			->method( 'update' )
			->will( $this->returnValue( $dbResult['update'] ) );
		$db->expects( $this->any() )
			->method( 'select' )
			->will( $this->returnValue( $dbResult['select'] ) );
		$db->expects( $this->any() )
			->method( 'selectRow' )
			->will( $this->returnValue( $dbResult['selectRow'] ) );
		$db->expects( $this->any() )
			->method( 'selectRowCount' )
			->will( $this->returnValue( $dbResult['selectRowCount'] ) );

		return $db;
	}

}
