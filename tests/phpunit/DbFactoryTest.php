<?php

namespace MediaWiki\Extension\Notifications\Test;

use MediaWiki\Extension\Notifications\DbFactory;
use MediaWikiIntegrationTestCase;
use Wikimedia\Rdbms\IDatabase;

/**
 * @covers \MediaWiki\Extension\Notifications\DbFactory
 * @group Database
 */
class DbFactoryTest extends MediaWikiIntegrationTestCase {

	public function testNewFromDefault() {
		$db = DbFactory::newFromDefault();
		$this->assertInstanceOf( DbFactory::class, $db );

		return $db;
	}

	/**
	 * @depends testNewFromDefault
	 */
	public function testGetEchoDb( DbFactory $db ) {
		$this->assertInstanceOf( IDatabase::class, $db->getEchoDb( DB_PRIMARY ) );
		$this->assertInstanceOf( IDatabase::class, $db->getEchoDb( DB_REPLICA ) );
	}

}
