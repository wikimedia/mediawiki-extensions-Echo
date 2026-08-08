<?php

namespace MediaWiki\Extension\Notifications\Test;

use MediaWiki\Extension\Notifications\DbDomains;
use MediaWiki\Extension\Notifications\UnreadWikis;
use MediaWiki\MainConfigNames;
use MediaWiki\Utils\MWTimestamp;
use MediaWikiIntegrationTestCase;

/**
 * Tests for unread wiki database access
 *
 * @group Database
 * @covers \MediaWiki\Extension\Notifications\UnreadWikis
 */
class UnreadWikisTest extends MediaWikiIntegrationTestCase {
	use EchoSchemaOverridesTrait;

	protected function setUp(): void {
		parent::setUp();
		// Make the shared virtual domain "configured"; it resolves to the
		// local test database.
		$this->overrideConfigValue( MainConfigNames::VirtualDomainsMapping, [
			DbDomains::VIRTUAL_SHARED_DOMAIN => [ 'db' => false ],
		] );
	}

	public function testUpdateCount() {
		$unread = new UnreadWikis( 1 );
		$unread->updateCount(
			'foobar',
			2,
			new MWTimestamp( '20220322222222' ),
			3,
			new MWTimestamp( '20220322222223' )
		);
		$this->assertSame(
			[
				'foobar' => [
					'alert' => [ 'count' => '2', 'ts' => '20220322222222' ],
					'message' => [ 'count' => '3', 'ts' => '20220322222223' ],
				],
			],
			$unread->getUnreadCounts()
		);
	}

	public function testUpdateCountFalse() {
		$unread = new UnreadWikis( 1 );
		$unread->updateCount(
			'foobar',
			3,
			false,
			4,
			false
		);
		$this->assertSame(
			[
				'foobar' => [
					'alert' => [ 'count' => '3', 'ts' => '00000000000000' ],
					'message' => [ 'count' => '4', 'ts' => '00000000000000' ],
				],
			],
			$unread->getUnreadCounts()
		);
	}

	public function testNotConfigured() {
		$this->overrideConfigValue( MainConfigNames::VirtualDomainsMapping, [] );
		$unread = new UnreadWikis( 1 );
		$unread->updateCount( 'foobar', 2, false, 3, false );
		$this->assertSame( [], $unread->getUnreadCounts() );
	}
}
