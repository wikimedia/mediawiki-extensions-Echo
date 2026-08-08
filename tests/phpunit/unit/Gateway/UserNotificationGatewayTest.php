<?php

namespace MediaWiki\Extension\Notifications\Test\Unit;

use MediaWiki\Config\HashConfig;
use MediaWiki\Extension\Notifications\Gateway\UserNotificationGateway;
use MediaWiki\MainConfigNames;
use MediaWiki\User\User;
use MediaWikiUnitTestCase;
use Wikimedia\Rdbms\FakeResultWrapper;
use Wikimedia\Rdbms\IConnectionProvider;
use Wikimedia\Rdbms\IDatabase;
use Wikimedia\Rdbms\SelectQueryBuilder;
use Wikimedia\Rdbms\UpdateQueryBuilder;

/**
 * @covers \MediaWiki\Extension\Notifications\Gateway\UserNotificationGateway
 */
class UserNotificationGatewayTest extends MediaWikiUnitTestCase {

	public function testMarkRead() {
		// no event ids to mark
		$gateway = new UserNotificationGateway(
			$this->mockUser(),
			$this->mockDbProvider(),
			$this->mockConfig()
		);
		$this->assertFalse( $gateway->markRead( [] ) );

		// successful update
		$gateway = new UserNotificationGateway(
			$this->mockUser(),
			$this->mockDbProvider( [ 'update' => true ] ),
			$this->mockConfig()
		);
		$this->assertTrue( $gateway->markRead( [ 2 ] ) );

		// unsuccessful update
		$gateway = new UserNotificationGateway(
			$this->mockUser(),
			$this->mockDbProvider( [ 'update' => false ] ),
			$this->mockConfig()
		);
		$this->assertFalse( $gateway->markRead( [ 2 ] ) );
	}

	public function testMarkAllRead() {
		// successful update
		$gateway = new UserNotificationGateway(
			$this->mockUser(),
			$this->mockDbProvider( [ 'update' => true ] ),
			$this->mockConfig()
		);
		$this->assertTrue( $gateway->markAllRead( [ 2 ] ) );

		// null update
		$gateway = new UserNotificationGateway(
			$this->mockUser(),
			$this->mockDbProvider( [ 'update' => false ] ),
			$this->mockConfig()
		);
		$this->assertTrue( $gateway->markAllRead( [ 2 ] ) );
	}

	public function testGetNotificationCount() {
		// unsuccessful select
		$gateway = new UserNotificationGateway(
			$this->mockUser(),
			$this->mockDbProvider( [ 'selectRowCount' => 0 ] ),
			$this->mockConfig()
		);
		$this->assertSame( 0, $gateway->getCappedNotificationCount( DB_REPLICA, [ 'event_one' ] ) );

		// successful select of alert
		$gateway = new UserNotificationGateway(
			$this->mockUser(),
			$this->mockDbProvider( [ 'selectRowCount' => 2 ] ),
			$this->mockConfig()
		);
		$this->assertSame( 2, $gateway->getCappedNotificationCount( DB_REPLICA, [ 'event_one', 'event_two' ] ) );

		// there is event, should return 0
		$gateway = new UserNotificationGateway(
			$this->mockUser(),
			$this->mockDbProvider( [ 'selectRowCount' => 2 ] ),
			$this->mockConfig()
		);
		$this->assertSame( 0, $gateway->getCappedNotificationCount( DB_REPLICA, [] ) );

		// successful select
		$gateway = new UserNotificationGateway(
			$this->mockUser(),
			$this->mockDbProvider( [ 'selectRowCount' => 3 ] ),
			$this->mockConfig()
		);
		$this->assertSame( 3, $gateway->getCappedNotificationCount( DB_REPLICA, [ 'event_one' ] ) );
	}

	public function testGetUnreadNotifications() {
		$dbResult = [
			(object)[ 'notification_event' => 1 ],
			(object)[ 'notification_event' => 2 ],
			(object)[ 'notification_event' => 3 ],
		];
		$gateway = new UserNotificationGateway(
			$this->mockUser(),
			$this->mockDbProvider( [ 'select' => $dbResult ] ),
			$this->mockConfig()
		);
		$res = $gateway->getUnreadNotifications( 'user_talk' );
		$this->assertEquals( [ 1 => 1, 2 => 2, 3 => 3 ], $res );
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
	 * Mock object of IConnectionProvider
	 * @param array $dbResult
	 * @return IConnectionProvider
	 */
	protected function mockDbProvider( array $dbResult = [] ) {
		$db = $this->mockDb( $dbResult );
		$dbProvider = $this->createMock( IConnectionProvider::class );
		$dbProvider->method( 'getPrimaryDatabase' )
			->willReturn( $db );
		$dbProvider->method( 'getReplicaDatabase' )
			->willReturn( $db );

		return $dbProvider;
	}

	protected function mockConfig() {
		return new HashConfig( [
			MainConfigNames::UpdateRowsPerQuery => 500,
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
			'select' => [],
			'selectRow' => '',
			'selectRowCount' => 0,
		];
		$db = $this->createMock( IDatabase::class );
		$db->method( 'affectedRows' )
			->willReturn( $dbResult['update'] ? 1 : 0 );
		$db->method( 'update' )
			->willReturn( $dbResult['update'] );
		$db->method( 'select' )
			->willReturn( new FakeResultWrapper( $dbResult['select'] ) );
		$db->method( 'selectRow' )
			->willReturn( $dbResult['selectRow'] );
		$db->method( 'selectRowCount' )
			->willReturn( $dbResult['selectRowCount'] );
		$db->method( 'newUpdateQueryBuilder' )
			->willReturnCallback( static function () use ( $db ) {
				return new UpdateQueryBuilder( $db );
			} );
		$db->method( 'newSelectQueryBuilder' )
			->willReturnCallback( static function () use ( $db ) {
				return new SelectQueryBuilder( $db );
			} );

		return $db;
	}

}
