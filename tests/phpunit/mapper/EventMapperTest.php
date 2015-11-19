<?php

class EchoEventMapperTest extends MediaWikiTestCase {

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
		$event = $this->mockEchoEvent();
		$eventMapper = new EchoEventMapper( $this->mockMWEchoDbFactory( $dbResult ) );
		$this->assertEquals( $result, $eventMapper->insert( $event ), $message );
	}

	/**
	 * Successful fetchById()
	 */
	public function testSuccessfulFetchById() {
		$eventMapper = new EchoEventMapper(
			$this->mockMWEchoDbFactory(
				array(
					'selectRow' => (object)array(
						'event_id' => 1,
						'event_type' => 'test',
						'event_variant' => '',
						'event_extra' => '',
						'event_page_id' => '',
						'event_agent_id' => '',
						'event_agent_ip' => ''
					)
				)
			)
		);
		$res = $eventMapper->fetchById( 1 );
		$this->assertInstanceOf( 'EchoEvent', $res );
	}

	/**
	 * @expectedException MWException
	 */
	public function testUnsuccessfulFetchById() {
		$eventMapper = new EchoEventMapper(
			$this->mockMWEchoDbFactory(
				array(
					'selectRow' => false
				)
			)
		);
		$res = $eventMapper->fetchById( 1 );
		$this->assertInstanceOf( 'EchoEvent', $res );
	}

	public function testFetchByUserBundleHash() {
		// Successful select
		$dbResult = array(
			(object)array(
				'event_id' => 1,
				'event_type' => 'test',
				'event_variant' => '',
				'event_extra' => '',
				'event_page_id' => '',
				'event_agent_id' => '',
				'event_agent_ip' => ''
			),
			(object)array(
				'event_id' => 2,
				'event_type' => 'test2',
				'event_variant' => '',
				'event_extra' => '',
				'event_page_id' => '',
				'event_agent_id' => '',
				'event_agent_ip' => ''
			)
		);
		$eventMapper = new EchoEventMapper( $this->mockMWEchoDbFactory( array( 'select' => $dbResult ) ) );
		$res = $eventMapper->fetchByUserBundleHash( User::newFromId( 1 ), 'testhash', 'web', 'DESC', 250 );
		$this->assertTrue( is_array( $res ) );
		foreach ( $res as $row ) {
			$this->assertInstanceOf( 'EchoEvent', $row );
		}
	}

	/**
	 * Mock object of EchoEvent
	 */
	protected function mockEchoEvent() {
		$event = $this->getMockBuilder( 'EchoEvent' )
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
			'nextSequenceValue' => '',
			'insert' => '',
			'insertId' => '',
			'select' => '',
			'selectRow' => ''
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
			->method( 'selectRow' )
			->will( $this->returnValue( $dbResult['selectRow'] ) );

		return $db;
	}

}
