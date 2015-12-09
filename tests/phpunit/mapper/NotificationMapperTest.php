<?php

class EchoNotificationMapperTest extends MediaWikiTestCase {

	/**
	 * @todo write this test
	 */
	public function testInsert() {
		$this->assertTrue( true );
	}

	public function fetchUnreadByUser( User $user, $limit, array $eventTypes = array() ) {
		// Unsuccessful select
		$notifMapper = new EchoNotificationMapper( $this->mockMWEchoDbFactory( array( 'select' => false ) ) );
		$res = $notifMapper->fetchUnreadByUser( $this->mockUser(), 10, null, '' );
		$this->assertEmpty( $res );

		// Successful select
		$dbResult = array(
			(object)array(
				'event_id' => 1,
				'event_type' => 'test_event',
				'event_variant' => '',
				'event_extra' => '',
				'event_page_id' => '',
				'event_agent_id' => '',
				'event_agent_ip' => '',
				'notification_user' => 1,
				'notification_timestamp' => '20140615101010',
				'notification_read_timestamp' => '',
				'notification_bundle_base' => 1,
				'notification_bundle_hash' => 'testhash',
				'notification_bundle_display_hash' => 'testdisplayhash'
			)
		);
		$notifMapper = new EchoNotificationMapper( $this->mockMWEchoDbFactory( array( 'select' => $dbResult ) ) );
		$res = $notifMapper->fetchUnreadByUser( $this->mockUser(), 10, null, '', array() );
		$this->assertEmpty( $res );

		$notifMapper = new EchoNotificationMapper( $this->mockMWEchoDbFactory( array( 'select' => $dbResult ) ) );
		$res = $notifMapper->fetchUnreadByUser( $this->mockUser(), 10, null, '', array( 'test_event' ) );
		$this->assertTrue( is_array( $res ) );
		$this->assertGreaterThan( 0, count( $res ) );
		foreach ( $res as $row ) {
			$this->assertInstanceOf( 'EchoNotification', $row );
		}
	}

	public function testFetchByUser() {
		// Unsuccessful select
		$notifMapper = new EchoNotificationMapper( $this->mockMWEchoDbFactory( array( 'select' => false ) ) );
		$res = $notifMapper->fetchByUser( $this->mockUser(), 10, '' );
		$this->assertEmpty( $res );

		// Successful select
		$notifDbResult = array(
			(object)array(
				'event_id' => 1,
				'event_type' => 'test_event',
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

		$tpDbResult = array(
			(object)array(
				'etp_user' => 1, // userid
				'etp_page' => 7, // pageid
				'etp_event' => 1, // eventid
			),
		);

		$notifMapper = new EchoNotificationMapper( $this->mockMWEchoDbFactory( array( 'select' => $notifDbResult ) ) );
		$res = $notifMapper->fetchByUser( $this->mockUser(), 10, '', array() );
		$this->assertEmpty( $res );

		$notifMapper = new EchoNotificationMapper(
			$this->mockMWEchoDbFactory( array( 'select' => $notifDbResult ) ),
			new EchoTargetPageMapper(
				$this->mockMWEchoDbFactory( array( 'select' => $tpDbResult ) )
			)
		);
		$res = $notifMapper->fetchByUser( $this->mockUser(), 10, '', array( 'test_event' ) );
		$this->assertTrue( is_array( $res ) );
		$this->assertGreaterThan( 0, count( $res ) );
		foreach ( $res as $row ) {
			$this->assertInstanceOf( 'EchoNotification', $row );
		}

		$notifMapper = new EchoNotificationMapper( $this->mockMWEchoDbFactory( array() ) );
		$res = $notifMapper->fetchByUser( $this->mockUser(), 10, '' );
		$this->assertEmpty( $res );
	}

	public function testFetchNewestByUserBundleHash() {
		// Unsuccessful select
		$notifMapper = new EchoNotificationMapper( $this->mockMWEchoDbFactory( array( 'selectRow' => false ) ) );
		$res = $notifMapper->fetchNewestByUserBundleHash( User::newFromId( 1 ), 'testhash' );
		$this->assertFalse( $res );

		// Successful select
		$dbResult = (object)array(
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
		$notifMapper = new EchoNotificationMapper( $this->mockMWEchoDbFactory( array( 'selectRow' => $dbResult ) ) );
		$row = $notifMapper->fetchNewestByUserBundleHash( User::newFromId( 1 ), 'testdisplayhash' );
		$this->assertInstanceOf( 'EchoNotification', $row );
	}

	public function testFetchByUserOffset() {
		// Unsuccessful select
		$notifMapper = new EchoNotificationMapper( $this->mockMWEchoDbFactory( array( 'selectRow' => false ) ) );
		$res = $notifMapper->fetchByUserOffset( User::newFromId( 1 ), 500 );
		$this->assertFalse( $res );

		// Successful select
		$dbResult = (object)array(
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
		$notifMapper = new EchoNotificationMapper( $this->mockMWEchoDbFactory( array( 'selectRow' => $dbResult ) ) );
		$row = $notifMapper->fetchNewestByUserBundleHash( User::newFromId( 1 ), 500 );
		$this->assertInstanceOf( 'EchoNotification', $row );
	}

	public function testDeleteByUserEventOffset() {
		$dbResult = array( 'delete' => true );
		$notifMapper = new EchoNotificationMapper( $this->mockMWEchoDbFactory( $dbResult ) );
		$this->assertTrue( $notifMapper->deleteByUserEventOffset( User::newFromId( 1 ), 500 ) );

		$dbResult = array( 'delete' => false );
		$notifMapper = new EchoNotificationMapper( $this->mockMWEchoDbFactory( $dbResult ) );
		$this->assertFalse( $notifMapper->deleteByUserEventOffset( User::newFromId( 1 ), 500 ) );
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
			'selectRow' => '',
			'delete' => ''
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
			->method( 'delete' )
			->will( $this->returnValue( $dbResult['delete'] ) );
		$db->expects( $this->any() )
			->method( 'selectRow' )
			->will( $this->returnValue( $dbResult['selectRow'] ) );
		$db->expects( $this->any() )
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
