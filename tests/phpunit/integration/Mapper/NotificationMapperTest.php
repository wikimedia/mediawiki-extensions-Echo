<?php

namespace MediaWiki\Extension\Notifications\Test\Integration\Mapper;

use MediaWiki\Extension\Notifications\Mapper\NotificationMapper;
use MediaWiki\Extension\Notifications\Model\Notification;
use MediaWiki\User\User;
use MediaWikiIntegrationTestCase;
use Wikimedia\Rdbms\FakeResultWrapper;
use Wikimedia\Rdbms\IConnectionProvider;
use Wikimedia\Rdbms\IDatabase;
use Wikimedia\Rdbms\SelectQueryBuilder;

/**
 * @covers \MediaWiki\Extension\Notifications\Mapper\NotificationMapper
 */
class NotificationMapperTest extends MediaWikiIntegrationTestCase {

	public function testFetchUnreadByUser() {
		$dbResult = [
			(object)[
				'event_id' => 1,
				'event_type' => 'test_event',
				'event_extra' => '',
				'event_page_id' => '',
				'event_agent_id' => '',
				'event_agent_ip' => '',
				'event_deleted' => 0,
				'notification_user' => 1,
				'notification_timestamp' => '20140615101010',
				'notification_read_timestamp' => null,
				'notification_bundle_hash' => 'testhash',
			],
		];
		$notifMapper = new NotificationMapper( $this->mockDbProvider( [ 'select' => $dbResult ] ) );
		$res = $notifMapper->fetchUnreadByUser( $this->mockUser(), 10, null );
		$this->assertSame( [], $res );

		$notifMapper = new NotificationMapper( $this->mockDbProvider( [ 'select' => $dbResult ] ) );
		$res = $notifMapper->fetchUnreadByUser( $this->mockUser(), 10, null, [ 'test_event' ] );
		$this->assertIsArray( $res );
		$this->assertNotEmpty( $res );
		foreach ( $res as $notif ) {
			$this->assertInstanceOf( Notification::class, $notif );
		}
	}

	public function testFetchByUser() {
		$notifDbResult = [
			(object)[
				'event_id' => 1,
				'event_type' => 'test_event',
				'event_extra' => '',
				'event_page_id' => '',
				'event_agent_id' => '',
				'event_agent_ip' => '',
				'event_deleted' => 0,
				'notification_user' => 1,
				'notification_timestamp' => '20140615101010',
				'notification_read_timestamp' => '20140616101010',
				'notification_bundle_hash' => 'testhash',
			],
		];

		$notifMapper = new NotificationMapper( $this->mockDbProvider( [ 'select' => $notifDbResult ] ) );
		$res = $notifMapper->fetchByUser( $this->mockUser(), 10, '', [] );
		$this->assertSame( [], $res );

		$notifMapper = new NotificationMapper(
			$this->mockDbProvider( [ 'select' => $notifDbResult ] )
		);
		$res = $notifMapper->fetchByUser( $this->mockUser(), 10, '', [ 'test_event' ] );
		$this->assertIsArray( $res );
		$this->assertNotEmpty( $res );
		foreach ( $res as $row ) {
			$this->assertInstanceOf( Notification::class, $row );
		}

		$notifMapper = new NotificationMapper( $this->mockDbProvider( [] ) );
		$res = $notifMapper->fetchByUser( $this->mockUser(), 10, '' );
		$this->assertSame( [], $res );
	}

	public function testFetchByUserOffset() {
		// Unsuccessful select
		$notifMapper = new NotificationMapper( $this->mockDbProvider( [ 'selectRow' => false ] ) );
		$userFactory = $this->getServiceContainer()->getUserFactory();
		$res = $notifMapper->fetchByUserOffset( $userFactory->newFromId( 1 ), 500 );
		$this->assertFalse( $res );

		// Successful select
		$dbResult = (object)[
			'event_id' => 1,
			'event_type' => 'test',
			'event_extra' => '',
			'event_page_id' => '',
			'event_agent_id' => '',
			'event_agent_ip' => '',
			'event_deleted' => 0,
			'notification_user' => 1,
			'notification_timestamp' => '20140615101010',
			'notification_read_timestamp' => '20140616101010',
			'notification_bundle_hash' => 'testhash',
		];
		$notifMapper = new NotificationMapper( $this->mockDbProvider( [ 'selectRow' => $dbResult ] ) );
		$row = $notifMapper->fetchByUserOffset( $userFactory->newFromId( 1 ), 500 );
		$this->assertInstanceOf( Notification::class, $row );
	}

	/**
	 * Mock object of User
	 * @return User
	 */
	protected function mockUser() {
		$user = $this->createMock( User::class );
		$user->method( 'getID' )
			->willReturn( 1 );

		return $user;
	}

	/**
	 * Mock object of Notification
	 * @return Notification
	 */
	protected function mockNotification() {
		$event = $this->createMock( Notification::class );
		$event->method( 'toDbArray' )
			->willReturn( [] );

		return $event;
	}

	/**
	 * Mock object of IConnectionProvider
	 *
	 * @param array|IDatabase $dbResultOrMockDb
	 *
	 * @return IConnectionProvider
	 */
	protected function mockDbProvider( $dbResultOrMockDb ) {
		$mockDb = is_array( $dbResultOrMockDb ) ? $this->mockDb( $dbResultOrMockDb ) : $dbResultOrMockDb;
		$dbProvider = $this->createMock( IConnectionProvider::class );
		$dbProvider->method( 'getPrimaryDatabase' )
			->willReturn( $mockDb );
		$dbProvider->method( 'getReplicaDatabase' )
			->willReturn( $mockDb );

		return $dbProvider;
	}

	/**
	 * Returns a mock database object
	 *
	 * @param array $dbResult
	 *
	 * @return IDatabase
	 */
	protected function mockDb( array $dbResult ) {
		$dbResult += [
			'insert' => '',
			'select' => [],
			'selectRow' => '',
			'delete' => '',
		];

		$db = $this->createMock( IDatabase::class );
		$db->method( 'insert' )
			->willReturn( $dbResult['insert'] );
		$db->method( 'select' )
			->willReturn( new FakeResultWrapper( $dbResult['select'] ) );
		$db->method( 'delete' )
			->willReturn( $dbResult['delete'] );
		$db->method( 'selectRow' )
			->willReturn( $dbResult['selectRow'] );
		$db->method( 'newSelectQueryBuilder' )
			->willReturnCallback( static function () use ( $db ) {
				return new SelectQueryBuilder( $db );
			} );

		return $db;
	}

}
