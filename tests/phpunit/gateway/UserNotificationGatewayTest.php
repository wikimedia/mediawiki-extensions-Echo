<?php

class EchoUserNotificationGatewayTest extends MediaWikiTestCase {

	public function testMarkRead() {
		// no event ids to mark
		$gateway = new EchoUserNotificationGateway( User::newFromId( 1 ), $this->mockMWEchoDbFactory() );
		$this->assertNull( $gateway->markRead( array() ) );

		// successful update
		$gateway = new EchoUserNotificationGateway( User::newFromId( 1 ), $this->mockMWEchoDbFactory( array( 'update' => true ) ) );
		$this->assertTrue( $gateway->markRead( array( 2 ) ) );

		// unsuccessful update
		$gateway = new EchoUserNotificationGateway( User::newFromId( 1 ), $this->mockMWEchoDbFactory( array( 'update' => false ) ) );
		$this->assertFalse( $gateway->markRead( array( 2 ) ) );
	}

	public function testMarkAllRead() {
		// successful update
		$gateway = new EchoUserNotificationGateway( User::newFromId( 1 ), $this->mockMWEchoDbFactory( array( 'update' => true ) ) );
		$this->assertTrue( $gateway->markAllRead( array( 2 ) ) );

		// unsuccessful update
		$gateway = new EchoUserNotificationGateway( User::newFromId( 1 ), $this->mockMWEchoDbFactory( array( 'update' => false ) ) );
		$this->assertFalse( $gateway->markAllRead( array( 2 ) ) );
	}

	public function testGetNotificationCount() {
		// unsuccessful select
		$gateway = new EchoUserNotificationGateway( $this->mockUser(), $this->mockMWEchoDbFactory( array( 'selectRowCount' => 0 ) ) );
		$this->assertEquals( 0, $gateway->getCappedNotificationCount( DB_SLAVE, array( 'event_one' ) ) );

		// successful select of alert
		$gateway = new EchoUserNotificationGateway( $this->mockUser(), $this->mockMWEchoDbFactory( array( 'selectRowCount' => 2 ) ) );
		$this->assertEquals( 2, $gateway->getCappedNotificationCount( DB_SLAVE, array( 'event_one', 'event_two' ) ) );

		// there is event, should return 0
		$gateway = new EchoUserNotificationGateway( $this->mockUser(), $this->mockMWEchoDbFactory( array( 'selectRowCount' => 2 ) ) );
		$this->assertEquals( 0, $gateway->getCappedNotificationCount( DB_SLAVE, array() ) );

		// successful select
		$gateway = new EchoUserNotificationGateway( $this->mockUser(), $this->mockMWEchoDbFactory( array( 'selectRowCount' => 3 ) ) );
		$this->assertEquals( 3, $gateway->getCappedNotificationCount( DB_SLAVE, array( 'event_one' ) ) );
	}

	public function testGetUnreadNotifications() {
		$gateway = new EchoUserNotificationGateway( $this->mockUser(), $this->mockMWEchoDbFactory( array( 'select' => false ) ) );
		$this->assertEmpty( $gateway->getUnreadNotifications( 'user_talk' ) );

		$dbResult = array(
			(object)array( 'notification_event' => 1 ),
			(object)array( 'notification_event' => 2 ),
			(object)array( 'notification_event' => 3 ),
		);
		$gateway = new EchoUserNotificationGateway( $this->mockUser(), $this->mockMWEchoDbFactory( array( 'select' => $dbResult ) ) );
		$res = $gateway->getUnreadNotifications( 'user_talk' );
		$this->assertEquals( $res, array( 1 => 1, 2 => 2, 3 => 3 ) );
	}

	/**
	 * Mock object of User
	 */
	protected function mockUser( $group = 'echo_group' ) {
		$user = $this->getMockBuilder( 'User' )
			->disableOriginalConstructor()
			->getMock();
		$user->expects( $this->any() )
			->method( 'getID' )
			->will( $this->returnValue( 1 ) );
		$user->expects( $this->any() )
			->method( 'getOption' )
			->will( $this->returnValue( true ) );
		$user->expects( $this->any() )
			->method( 'getGroups' )
			->will( $this->returnValue( array( $group ) ) );

		return $user;
	}

	/**
	 * Mock object of MWEchoDbFactory
	 */
	protected function mockMWEchoDbFactory( array $dbResult = array() ) {
		$dbFactory = $this->getMockBuilder( 'MWEchoDbFactory' )
			->disableOriginalConstructor()
			->getMock();
		$dbFactory->expects( $this->any() )
			->method( 'getEchoDb' )
			->will( $this->returnValue( $this->mockDb( $dbResult ) ) );

		return $dbFactory;
	}

	/**
	 * Mock object of DatabaseMysql ( DatabaseBase )
	 */
	protected function mockDb( array $dbResult = array() ) {
		$dbResult += array(
			'update' => '',
			'select' => '',
			'selectRow' => '',
			'selectRowCount' => '',
		);
		$db = $this->getMockBuilder( 'DatabaseMysql' )
			->disableOriginalConstructor()
			->getMock();
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
		$db->expects( $this->any() )
			->method( 'numRows' )
			->will( $this->returnValue( count( $dbResult['select'] ) ) );

		return $db;
	}

}
