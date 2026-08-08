<?php

namespace MediaWiki\Extension\Notifications\Test\Integration;

use MediaWiki\Extension\Notifications\DbDomains;
use MediaWikiIntegrationTestCase;

/**
 * @covers \MediaWiki\Extension\Notifications\DbDomains
 */
class DbDomainsTest extends MediaWikiIntegrationTestCase {

	public static function provideOnRegistration() {
		yield 'defaults, nothing mapped' => [
			[],
			[],
			[],
		];
		yield 'legacy cluster' => [
			[ 'wgEchoCluster' => 'extension1' ],
			[],
			[ DbDomains::VIRTUAL_DOMAIN => [ 'cluster' => 'extension1', 'db' => false ] ],
		];
		yield 'legacy shared db without cluster' => [
			[ 'wgEchoSharedTrackingDB' => 'wikishared' ],
			[],
			[ DbDomains::VIRTUAL_SHARED_DOMAIN => [ 'db' => 'wikishared' ] ],
		];
		yield 'legacy shared db and cluster' => [
			[
				'wgEchoSharedTrackingDB' => 'wikishared',
				'wgEchoSharedTrackingCluster' => 'extension1',
			],
			[],
			[ DbDomains::VIRTUAL_SHARED_DOMAIN => [ 'db' => 'wikishared', 'cluster' => 'extension1' ] ],
		];
		yield 'explicit mapping wins over legacy settings' => [
			[
				'wgEchoCluster' => 'extension1',
				'wgEchoSharedTrackingDB' => 'wikishared',
			],
			[
				DbDomains::VIRTUAL_DOMAIN => [ 'cluster' => 'extension2', 'db' => false ],
				DbDomains::VIRTUAL_SHARED_DOMAIN => [ 'db' => 'echoshared' ],
			],
			[
				DbDomains::VIRTUAL_DOMAIN => [ 'cluster' => 'extension2', 'db' => false ],
				DbDomains::VIRTUAL_SHARED_DOMAIN => [ 'db' => 'echoshared' ],
			],
		];
	}

	/**
	 * @dataProvider provideOnRegistration
	 */
	public function testOnRegistration( array $legacyGlobals, array $mapping, array $expectedMapping ) {
		$this->setMwGlobals( $legacyGlobals + [
			'wgEchoCluster' => false,
			'wgEchoSharedTrackingDB' => false,
			'wgEchoSharedTrackingCluster' => false,
			'wgVirtualDomainsMapping' => $mapping,
		] );

		DbDomains::onRegistration();

		global $wgVirtualDomainsMapping;
		$this->assertSame( $expectedMapping, $wgVirtualDomainsMapping );
	}
}
