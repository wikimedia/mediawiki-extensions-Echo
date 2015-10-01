<?php

class EchoTargetPageTest extends MediaWikiTestCase {

	public function testCreate() {
		$this->assertNull(
			EchoTargetPage::create(
				User::newFromId( 0 ),
				$this->mockTitle( 1 ),
				$this->mockEchoEvent()
			)
		);

		$this->assertNull(
			EchoTargetPage::create(
				User::newFromId( 1 ),
				$this->mockTitle( 0 ),
				$this->mockEchoEvent()
			)
		);

		$this->assertNull(
			EchoTargetPage::create(
				User::newFromId( 0 ),
				$this->mockTitle( 0 ),
				$this->mockEchoEvent()
			)
		);

		$this->assertInstanceOf(
			'EchoTargetPage',
			EchoTargetPage::create(
				User::newFromId( 1 ),
				$this->mockTitle( 1 ),
				$this->mockEchoEvent()
			)
		);
	}

	public function testNewFromRow() {
		$row = (object)array(
			'etp_user' => 1,
			'etp_page' => 2,
			'etp_event' => 3
		);
		$obj = EchoTargetPage::newFromRow( $row );
		$this->assertInstanceOf( 'EchoTargetPage', $obj );

		return $obj;
	}

	/**
	 * @expectedException MWException
	 */
	public function testNewFromRowWithException() {
		$row = (object)array(
			'etp_page' => 2,
			'etp_event' => 3
		);
		$this->assertInstanceOf( 'EchoTargetPage', EchoTargetPage::newFromRow( $row ) );
	}

	/**
	 * @depends testNewFromRow
	 */
	public function testToDbArray( $obj ) {
		$row = $obj->toDbArray();
		$this->assertTrue( is_array( $row ) );
		$this->assertArrayHasKey( 'etp_user', $row );
		$this->assertArrayHasKey( 'etp_page', $row );
		$this->assertArrayHasKey( 'etp_event', $row );
	}

	/**
	 * Mock object of Title
	 */
	protected function mockTitle( $pageId ) {
		$event = $this->getMockBuilder( 'Title' )
			->disableOriginalConstructor()
			->getMock();
		$event->expects( $this->any() )
			->method( 'getArticleID' )
			->will( $this->returnValue( $pageId ) );

		return $event;
	}

	/**
	 * Mock object of EchoEvent
	 */
	protected function mockEchoEvent( $eventId = 1 ) {
		$event = $this->getMockBuilder( 'EchoEvent' )
			->disableOriginalConstructor()
			->getMock();
		$event->expects( $this->any() )
			->method( 'getId' )
			->will( $this->returnValue( $eventId ) );

		return $event;
	}

}
