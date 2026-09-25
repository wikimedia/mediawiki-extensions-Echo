<?php

namespace MediaWiki\Extension\Notifications\Test\Unit\Mapper;

use MediaWiki\Extension\Notifications\Mapper\EventMapper;
use MediaWikiUnitTestCase;
use Wikimedia\Rdbms\IConnectionProvider;

/**
 * @covers \MediaWiki\Extension\Notifications\Mapper\EventMapper
 */
class EventMapperTest extends MediaWikiUnitTestCase {

	public function testDeleteEventsForNoEvents(): void {
		$eventMapper = new EventMapper( $this->createNoOpMock( IConnectionProvider::class ) );
		$eventMapper->deleteEvents( [] );
	}
}
