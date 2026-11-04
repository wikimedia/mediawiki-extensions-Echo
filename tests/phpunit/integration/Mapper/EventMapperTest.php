<?php

namespace MediaWiki\Extension\Notifications\Test\Integration\Mapper;

use InvalidArgumentException;
use MediaWiki\Extension\Notifications\Mapper\EventMapper;
use MediaWiki\Extension\Notifications\Model\Event;
use MediaWikiIntegrationTestCase;
use Wikimedia\Rdbms\FakeResultWrapper;
use Wikimedia\Rdbms\IConnectionProvider;
use Wikimedia\Rdbms\IDatabase;
use Wikimedia\Rdbms\InsertQueryBuilder;
use Wikimedia\Rdbms\SelectQueryBuilder;

/**
 * @covers \MediaWiki\Extension\Notifications\Mapper\EventMapper
 */
class EventMapperTest extends MediaWikiIntegrationTestCase {

	public static function provideDataTestInsert() {
		return [
			[
				'successful insert with next sequence = 1',
				[ 'insert' => true, 'insertId' => 1 ],
				1,
			],
			[
				'successful insert with insert id = 2',
				[ 'insert' => true, 'insertId' => 2 ],
				2,
			],
		];
	}

	/**
	 * @dataProvider provideDataTestInsert
	 */
	public function testInsert( $message, $dbResult, $result ) {
		$event = $this->mockEvent();
		$eventMapper = new EventMapper( $this->mockDbProvider( $dbResult ) );
		$this->assertEquals( $result, $eventMapper->insert( $event ), $message );
	}

	/**
	 * Successful fetchById()
	 */
	public function testSuccessfulFetchById() {
		$eventMapper = new EventMapper(
			$this->mockDbProvider(
				[
					'selectRow' => (object)[
						'event_id' => 1,
						'event_type' => 'test',
						'event_extra' => '',
						'event_page_id' => '',
						'event_agent_id' => '',
						'event_agent_ip' => '',
						'event_deleted' => 0,
					],
				]
			)
		);
		$res = $eventMapper->fetchById( 1 );
		$this->assertInstanceOf( Event::class, $res );
	}

	public function testUnsuccessfulFetchById() {
		$eventMapper = new EventMapper(
			$this->mockDbProvider(
				[
					'selectRow' => false,
				]
			)
		);
		$this->expectException( InvalidArgumentException::class );
		$eventMapper->fetchById( 1 );
	}

	/**
	 * @return Event
	 */
	protected function mockEvent() {
		$event = $this->createMock( Event::class );
		$event->method( 'toDbArray' )
			->willReturn( [] );

		return $event;
	}

	/**
	 * @param array $dbResult
	 * @return IConnectionProvider
	 */
	protected function mockDbProvider( $dbResult ) {
		$db = $this->mockDb( $dbResult );
		$dbProvider = $this->createMock( IConnectionProvider::class );
		$dbProvider->method( 'getPrimaryDatabase' )
			->willReturn( $db );
		$dbProvider->method( 'getReplicaDatabase' )
			->willReturn( $db );

		return $dbProvider;
	}

	/**
	 * @param array $dbResult
	 * @return IDatabase
	 */
	protected function mockDb( array $dbResult ) {
		$dbResult += [
			'insert' => '',
			'insertId' => '',
			'select' => [],
			'selectRow' => '',
		];
		$db = $this->createMock( IDatabase::class );
		$db->method( 'insert' )
			->willReturn( $dbResult['insert'] );
		$db->method( 'insertId' )
			->willReturn( $dbResult['insertId'] );
		$db->method( 'select' )
			->willReturn( new FakeResultWrapper( $dbResult['select'] ) );
		$db->method( 'selectRow' )
			->willReturn( $dbResult['selectRow'] );
		$db->method( 'newInsertQueryBuilder' )
			->willReturnCallback( static function () use ( $db ) {
				return new InsertQueryBuilder( $db );
			} );
		$db->method( 'newSelectQueryBuilder' )
			->willReturnCallback( static function () use ( $db ) {
				return new SelectQueryBuilder( $db );
			} );

		return $db;
	}
}
