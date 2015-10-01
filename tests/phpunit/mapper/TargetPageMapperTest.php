<?php

class EchoTargetPageMapperTest extends MediaWikiTestCase {

	public function testFetchByUserPageId() {
		$targetMapper = new EchoTargetPageMapper( $this->mockMWEchoDbFactory( array( 'select' => false ) ) );
		$res = $targetMapper->fetchByUserPageId( User::newFromId( 1 ), 1 );
		$this->assertFalse( $res );

		$dbResult = array(
			(object)array(
				'etp_user' => 1,
				'etp_page' => 2,
				'etp_event' => 3
			),
			(object)array(
				'etp_user' => 1,
				'etp_page' => 2,
				'etp_event' => 7,
			)
		);
		$targetMapper = new EchoTargetPageMapper( $this->mockMWEchoDbFactory( array( 'select' => $dbResult ) ) );
		$res = $targetMapper->fetchByUserPageId( User::newFromId( 1 ), 2 );
		$this->assertTrue( is_array( $res ) );
		$this->assertCount( 2, $res );
		foreach ( $res as $targetPages ) {
			$this->assertTrue( is_array( $targetPages ) );
			$this->assertCount( 1, $targetPages );
			$this->assertInstanceOf( 'EchoTargetPage', reset( $targetPages ) );
		}
	}

	public function provideDataTestInsert() {
		return array(
			array(
				'successful insert with next sequence = 1',
				array( 'nextSequenceValue' => 1, 'insert' => true, 'insertId' => 2 ),
				1
			),
			array(
				'successful insert with insert id = 2',
				array( 'nextSequenceValue' => null, 'insert' => true, 'insertId' => 2 ),
				2
			),
			array(
				'unsuccessful insert',
				array( 'nextSequenceValue' => null, 'insert' => false, 'insertId' => 2 ),
				false
			),
		);
	}

	/**
	 * @dataProvider provideDataTestInsert
	 */
	public function testInsert( $message, $dbResult, $result ) {
		$target = $this->mockEchoTargetPage();
		$targetMapper = new EchoTargetPageMapper( $this->mockMWEchoDbFactory( $dbResult ) );
		$this->assertEquals( $result, $targetMapper->insert( $target ), $message );
	}

	public function testDelete() {
		$dbResult = array( 'delete' => true );
		$targetMapper = new EchoTargetPageMapper( $this->mockMWEchoDbFactory( $dbResult ) );
		$this->assertTrue( $targetMapper->delete( $this->mockEchoTargetPage() ) );

		$dbResult = array( 'delete' => false );
		$targetMapper = new EchoTargetPageMapper( $this->mockMWEchoDbFactory( $dbResult ) );
		$this->assertFalse( $targetMapper->delete( $this->mockEchoTargetPage() ) );
	}

	public function provideDataTestDeleteByUserEvents() {
		return array(
			array( true, array( 1 ), true ),
			array( false, array( 1 ), false ),
			array( true, array(), true ),
			array( false, array(), true ),
		);
	}

	/**
	 * @dataProvider provideDataTestDeleteByUserEvents
	 */
	public function testDeleteByUserEvents( $deleteResult, $eventIds, $result ) {
		$dbResult = array( 'delete' => $deleteResult );
		$targetMapper = new EchoTargetPageMapper( $this->mockMWEchoDbFactory( $dbResult ) );
		$this->assertSame( $targetMapper->deleteByUserEvents( User::newFromId( 1 ), $eventIds ), $result );
	}

	public function testDeleteByUser() {
		$dbResult = array( 'delete' => true );
		$targetMapper = new EchoTargetPageMapper( $this->mockMWEchoDbFactory( $dbResult ) );
		$this->assertSame( $targetMapper->deleteByUser( User::newFromId( 1 ) ), true );

		$dbResult = array( 'delete' => false );
		$targetMapper = new EchoTargetPageMapper( $this->mockMWEchoDbFactory( $dbResult ) );
		$this->assertSame( $targetMapper->deleteByUser( User::newFromId( 1 ) ), false );
	}

	public function testDeleteByUserEventOffset() {
		$dbResult = array( 'delete' => true );
		$targetMapper = new EchoTargetPageMapper( $this->mockMWEchoDbFactory( $dbResult ) );
		$this->assertSame( $targetMapper->deleteByUserEventOffset( User::newFromId( 1 ), 500 ), true );

		$dbResult = array( 'delete' => false );
		$targetMapper = new EchoTargetPageMapper( $this->mockMWEchoDbFactory( $dbResult ) );
		$this->assertSame( $targetMapper->deleteByUserEventOffset( User::newFromId( 1 ), 500 ), false );
	}

	/**
	 * Mock object of EchoTargetPage
	 */
	protected function mockEchoTargetPage() {
		$target = $this->getMockBuilder( 'EchoTargetPage' )
			->disableOriginalConstructor()
			->getMock();
		$target->expects( $this->any() )
			->method( 'toDbArray' )
			->will( $this->returnValue( array() ) );
		$target->expects( $this->any() )
			->method( 'getUser' )
			->will( $this->returnValue( User::newFromId( 1 ) ) );
		$target->expects( $this->any() )
			->method( 'getPageId' )
			->will( $this->returnValue( 2 ) );
		$target->expects( $this->any() )
			->method( 'getEventId' )
			->will( $this->returnValue( 3 ) );

		return $target;
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
			'nextSequenceValue' => '',
			'insert' => '',
			'insertId' => '',
			'select' => '',
			'delete' => ''
		);
		$db = $this->getMockBuilder( 'DatabaseMysql' )
			->disableOriginalConstructor()
			->getMock();
		$db->expects( $this->any() )
			->method( 'nextSequenceValue' )
			->will( $this->returnValue( $dbResult['nextSequenceValue'] ) );
		$db->expects( $this->any() )
			->method( 'insert' )
			->will( $this->returnValue( $dbResult['insert'] ) );
		$db->expects( $this->any() )
			->method( 'insertId' )
			->will( $this->returnValue( $dbResult['insertId'] ) );
		$db->expects( $this->any() )
			->method( 'select' )
			->will( $this->returnValue( $dbResult['select'] ) );
		$db->expects( $this->any() )
			->method( 'delete' )
			->will( $this->returnValue( $dbResult['delete'] ) );

		return $db;
	}

}
