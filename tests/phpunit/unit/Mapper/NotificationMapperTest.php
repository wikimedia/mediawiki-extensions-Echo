<?php

namespace MediaWiki\Extension\Notifications\Test\Unit\Mapper;

use MediaWiki\Extension\Notifications\Mapper\NotificationMapper;
use MediaWikiUnitTestCase;
use Wikimedia\Rdbms\IConnectionProvider;

/**
 * @covers \MediaWiki\Extension\Notifications\Mapper\NotificationMapper
 */
class NotificationMapperTest extends MediaWikiUnitTestCase {

	public function testDeleteByEventIdsForNoEvents(): void {
		$notifMapper = new NotificationMapper( $this->createNoOpMock( IConnectionProvider::class ) );
		$notifMapper->deleteByEventIds( [] );
	}
}
