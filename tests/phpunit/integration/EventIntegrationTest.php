<?php

use MediaWiki\Extension\Notifications\Mapper\EventMapper;
use MediaWiki\Extension\Notifications\Model\Event;
use MediaWiki\User\UserIdentityValue;

/**
 * @covers \MediaWiki\Extension\Notifications\Model\Event
 * @covers \MediaWiki\Extension\Notifications\Controller\NotificationController
 * @covers \MediaWiki\Extension\Notifications\Jobs\NotificationJob
 * @group Database
 */
class EventIntegrationTest extends MediaWikiIntegrationTestCase {

	public function testEventInsertionImmediate() {
		$this->clearHook( 'BeforeEchoEventInsert' );
		$this->overrideConfigValue( 'EchoUseJobQueue', false );

		$user = $this->getTestUser()->getUser();
		$event = Event::create( [
			'type' => 'welcome',
			'agent' => $user,
			'extra' => [ 'key' => 'value' ],
		] );
		$eventId = $event->getId();
		$this->assertNotFalse( $eventId );
		$this->assertSame( $eventId, $event->acquireId() );
		$this->newSelectQueryBuilder()
			->select( 'COUNT(*)' )
			->from( 'echo_event' )
			->where( [ 'event_type' => 'welcome' ] )
			->assertFieldValue( '1' );
	}

	public function testEventNotInserted() {
		$this->clearHook( 'BeforeEchoEventInsert' );
		$this->overrideConfigValue( 'EchoUseJobQueue', false );

		$event = Event::create( [
			'type' => 'welcome',
			// anons cannot be notified
			'agent' => UserIdentityValue::newAnonymous( '1.2.3.4' ),
			'extra' => [ 'key' => 'value' ],
		] );
		$this->assertFalse( $event->getId() );
		$this->newSelectQueryBuilder()
			->select( 'COUNT(*)' )
			->from( 'echo_event' )
			->where( [ 'event_type' => 'welcome' ] )
			->assertFieldValue( '0' );
	}

	public function testEventNotCreatedForUnknownUser() {
		$this->clearHook( 'BeforeEchoEventInsert' );
		$this->expectException( \Wikimedia\NormalizedException\NormalizedException::class );

		$event = Event::create( [
			'type' => 'welcome',
			'agent' => UserIdentityValue::newAnonymous( 'Anonymous user' ),
		] );
	}

	public function testEventInsertionDeferred() {
		$this->clearHook( 'BeforeEchoEventInsert' );
		$this->overrideConfigValue( 'EchoUseJobQueue', true );

		$testPage = $this->getNonexistingTestPage();
		$user = $this->getTestUser()->getUser();

		// Do first edit for the user to emit "thank-you-edit" event
		$status = $this->editPage( $testPage, 'Hello World!', 'Hello World!', NS_MAIN, $user );
		$this->assertStatusGood( $status );

		$this->runJobs( [ 'minJobs' => 1 ], [ 'type' => 'EchoNotificationJob' ] );

		$eventMapper = new EventMapper();
		$events = $eventMapper->fetchByPage( $testPage->getId() );
		$this->assertCount( 1, $events );
		[ $event ] = $events;
		$this->assertSame( 'thank-you-edit', $event->getType() );
		$this->assertTrue( $user->equals( $event->getAgent() ) );
	}

	public function testIsDeletedReflectsModerationAfterDbRoundTrip(): void {
		$this->clearHook( 'BeforeEchoEventInsert' );
		$this->overrideConfigValue( 'EchoUseJobQueue', false );

		$eventId = Event::create( [
			'type' => 'welcome',
			'agent' => $this->getTestUser()->getUser(),
		] )->getId();
		$eventMapper = new EventMapper();

		$this->assertFalse( $eventMapper->fetchById( $eventId, true )->isDeleted() );

		$eventMapper->toggleDeleted( [ $eventId ], true );
		$this->assertTrue( $eventMapper->fetchById( $eventId, true )->isDeleted() );
	}

}
