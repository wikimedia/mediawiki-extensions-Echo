<?php

class EchoNotificationMapperTest extends MediaWikiTestCase {

	/**
	 * @todo write this test
	 */
	public function testInsert() {
		$this->assertTrue( true );
	}

	public function testFetchByUser() {
		global $wgEchoNotificationCategories;
		$previous = $wgEchoNotificationCategories;

		// Alter the category group so the user is always elegible to
		// view some notification types.
		foreach ( $wgEchoNotificationCategories as &$value ) {
			$value['usergroups'] = array( 'echo_group' );
		}
		unset( $value );

		// Unsuccessful select
		$notifMapper = new EchoNotificationMapper( $this->mockMWEchoDbFactory( array ( 'select' => false ) ) );
		$res = $notifMapper->fetchByUser( $this->mockUser(), 10, '' );
		$this->assertEmpty( $res );

		// Successful select
		$dbResult = array(
			(object)array (
				'event_id' => 1,
				'event_type' => 'test',
				'event_variant' => '',
				'event_extra' => '',
				'event_page_id' => '',
				'event_agent_id' => '',
				'event_agent_ip' => '',
				'notification_user' => 1,
				'notification_timestamp' => '20140615101010',
				'notification_read_timestamp' => '20140616101010',
				'notification_bundle_base' => 1,
				'notification_bundle_hash' => 'testhash',
				'notification_bundle_display_hash' => 'testdisplayhash'
			)
		);
		$notifMapper = new EchoNotificationMapper( $this->mockMWEchoDbFactory( array ( 'select' => $dbResult ) ) );
		$res = $notifMapper->fetchByUser( $this->mockUser(), 10, '' );
		$this->assertTrue( is_array( $res ) );
		foreach ( $res as $row ) {
			$this->assertInstanceOf( 'EchoNotification', $row  );
		}

		// Alter the category group so the user is not elegible to
		// view any notification types.
		foreach ( $wgEchoNotificationCategories as &$value ) {
			$value['usergroups'] = array( 'sysop' );
		}
		unset( $value );

		$notifMapper = new EchoNotificationMapper( $this->mockMWEchoDbFactory( array() ) );
		$res = $notifMapper->fetchByUser( $this->mockUser(), 10, '' );
		$this->assertEmpty( $res );

		// Restore the default setting
		$wgEchoNotificationCategories = $previous;
	}

	public function testFetchNewestByUserBundleHash() {
		// Unsuccessful select
		$notifMapper = new EchoNotificationMapper( $this->mockMWEchoDbFactory( array ( 'selectRow' => false ) ) );
		$res = $notifMapper->fetchNewestByUserBundleHash( User::newFromId( 1 ), 'testhash' );
		$this->assertFalse( $res );

		// Successful select
		$dbResult = (object)array (
			'event_id' => 1,
			'event_type' => 'test',
			'event_variant' => '',
			'event_extra' => '',
			'event_page_id' => '',
			'event_agent_id' => '',
			'event_agent_ip' => '',
			'notification_user' => 1,
			'notification_timestamp' => '20140615101010',
			'notification_read_timestamp' => '20140616101010',
			'notification_bundle_base' => 1,
			'notification_bundle_hash' => 'testhash',
			'notification_bundle_display_hash' => 'testdisplayhash'
		);
		$notifMapper = new EchoNotificationMapper( $this->mockMWEchoDbFactory( array ( 'selectRow' => $dbResult ) ) );
		$row = $notifMapper->fetchNewestByUserBundleHash( User::newFromId( 1 ), 'testdisplayhash' );
		$this->assertInstanceOf( 'EchoNotification', $row );
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
	 * Mock object of EchoNotification
	 */
	protected function mockEchoNotification() {
		$event = $this->getMockBuilder( 'EchoNotification' )
			->disableOriginalConstructor()
			->getMock();
		$event->expects( $this->any() )
			->method( 'toDbArray' )
			->will( $this->returnValue( array() ) );
		return $event;
	}

	/**
	 * Mock object of MWEchoDbFactory
	 */
	protected function mockMWEchoDbFactory( $dbResult ) {
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
	protected function mockDb( array $dbResult ) {
		$dbResult += array(
			'insert' => '',
			'select' => '',
			'selectRow' => ''
		);
		$db = $this->getMockBuilder( 'DatabaseMysql' )
			->disableOriginalConstructor()
			->getMock();
		$db->expects( $this->any() )
			->method( 'insert' )
			->will( $this->returnValue( $dbResult['insert'] ) );
		$db->expects( $this->any() )
			->method( 'select' )
			->will( $this->returnValue( $dbResult['select'] ) );
		$db->expects( $this->any() )
			->method( 'selectRow' )
			->will( $this->returnValue( $dbResult['selectRow'] ) );
		$db->expects ( $this->any() )
			->method( 'onTransactionIdle' )
			->will( new EchoExecuteFirstArgumentStub );

		return $db;
	}

}

class EchoExecuteFirstArgumentStub implements PHPUnit_Framework_MockObject_Stub {
	public function invoke( PHPUnit_Framework_MockObject_Invocation $invocation ) {
		if ( !$invocation instanceof PHPUnit_Framework_MockObject_Invocation_Static ) {
			throw new PHPUnit_Framework_Exception( 'wrong invocation type' );
		}
		if ( !$invocation->arguments ) {
			throw new PHPUnit_Framework_Exception( 'Method call must have an argument' );
		}
		return call_user_func( reset( $invocation->arguments ) );
	}
	
	public function toString() {
		return 'return result of call_user_func on first invocation argument';
	}
}
