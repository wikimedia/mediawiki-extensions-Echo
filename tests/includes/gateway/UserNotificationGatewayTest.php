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
		global $wgEchoNotificationCategories;
		$previous = $wgEchoNotificationCategories;

		// Alter the category group so the user is always elegible to
		// view some notification types.
		foreach ( $wgEchoNotificationCategories as &$value ) {
			$value['usergroups'] = array( 'echo_group' );
		}
		unset( $value );

		// successful select
		$gateway = new EchoUserNotificationGateway( $this->mockUser(), $this->mockMWEchoDbFactory( array( 'select' => false ) ) );
		$this->assertEquals( 0, $gateway->getNotificationCount( DB_SLAVE ) );

		// successful select
		$gateway = new EchoUserNotificationGateway( $this->mockUser(), $this->mockMWEchoDbFactory( array( 'select' => array( 1, 2, 3 ) ) ) );
		$this->assertEquals( 3, $gateway->getNotificationCount( DB_SLAVE ) );

		// Alter the category group so the user is not elegible to
		// view any notification types.
		foreach ( $wgEchoNotificationCategories as &$value ) {
			$value['usergroups'] = array( 'sysop' );
		}
		unset( $value );

		$gateway = new EchoUserNotificationGateway( $this->mockUser(), $this->mockMWEchoDbFactory( array( 'select' => array( 1, 2, 3 ) ) ) );
		$this->assertEquals( 0, $gateway->getNotificationCount( DB_SLAVE ) );

		$wgEchoNotificationCategories = $previous;
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
	protected function mockUser() {
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
			->will( $this->returnValue( array( 'echo_group' ) ) );
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
			->method( 'numRows' )
			->will( $this->returnValue( count( $dbResult['select'] ) ) );
		return $db;
	}

}
