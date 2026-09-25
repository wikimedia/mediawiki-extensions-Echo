<?php

namespace MediaWiki\Extension\Notifications\Test\Integration\Mapper;

use MediaWiki\Extension\Notifications\Mapper\EventMapper;
use MediaWiki\Extension\Notifications\Model\Event;
use MediaWiki\User\UserIdentity;
use MediaWikiIntegrationTestCase;

/**
 * @covers \MediaWiki\Extension\Notifications\Mapper\EventMapper
 * @group Database
 */
class EventMapperDatabaseTest extends MediaWikiIntegrationTestCase {

	private function createEvent( UserIdentity $user ): int {
		$event = Event::create( [ 'type' => 'welcome', 'agent' => $user ] );
		return $event->getId();
	}

	public function testDeleteEvents(): void {
		$user = $this->getTestSysop()->getUserIdentity();
		$firstEventId = $this->createEvent( $user );
		$secondEventId = $this->createEvent( $user );
		$thirdEventId = $this->createEvent( $user );

		$this->getDb()->newInsertQueryBuilder()
			->insertInto( 'echo_target_page' )
			->rows( [
				[ 'etp_page' => 1, 'etp_event' => $firstEventId ],
				[ 'etp_page' => 2, 'etp_event' => $secondEventId ],
				[ 'etp_page' => 3, 'etp_event' => $thirdEventId ],
			] )
			->caller( __METHOD__ )
			->execute();

		$eventMapper = new EventMapper( $this->getServiceContainer()->getConnectionProvider() );
		$eventMapper->deleteEvents( [ $thirdEventId ] );

		$this->newSelectQueryBuilder()
			->select( 'event_id' )
			->from( 'echo_event' )
			->assertFieldValues( [ (string)$firstEventId, (string)$secondEventId ] );
		$this->newSelectQueryBuilder()
			->select( 'etp_event' )
			->from( 'echo_target_page' )
			->assertFieldValues( [ (string)$firstEventId, (string)$secondEventId ] );

		$eventMapper->deleteEvents( [ $firstEventId, $secondEventId ] );

		$this->newSelectQueryBuilder()
			->select( 'event_id' )
			->from( 'echo_event' )
			->assertEmptyResult();
		$this->newSelectQueryBuilder()
			->select( 'etp_event' )
			->from( 'echo_target_page' )
			->assertEmptyResult();
	}
}
