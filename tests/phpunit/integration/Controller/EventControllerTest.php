<?php

namespace MediaWiki\Extension\Notifications\Test\Integration\Controller;

use MediaWiki\Extension\Notifications\Model\Event;
use MediaWiki\Extension\Notifications\NotifUser;
use MediaWiki\Extension\Notifications\Services;
use MediaWiki\User\UserIdentity;
use MediaWikiIntegrationTestCase;

/**
 * @covers \MediaWiki\Extension\Notifications\Controller\EventController
 * @group Echo
 * @group Database
 */
class EventControllerTest extends MediaWikiIntegrationTestCase {

	private function createEvent( UserIdentity $user ): int {
		$event = Event::create( [ 'type' => 'welcome', 'agent' => $user ] );
		return $event->getId();
	}

	private function assertEventDeletedState( int $eventId, bool $expected ): void {
		$this->newSelectQueryBuilder()
			->select( 'event_deleted' )
			->from( 'echo_event' )
			->where( [ 'event_id' => $eventId ] )
			->assertFieldValue( $expected ? '1' : '0' );
	}

	public function testToggleHiddenState(): void {
		// NotifUser::getLocalNotificationCount caches and we don't need to test caching here
		$this->setMainCache( CACHE_NONE );

		$firstUser = $this->getMutableTestUser()->getUserIdentity();
		$secondUser = $this->getMutableTestUser()->getUserIdentity();
		$firstEventId = $this->createEvent( $firstUser );
		$secondEventId = $this->createEvent( $secondUser );

		$this->assertSame(
			1,
			NotifUser::newFromUser( $firstUser )->getLocalNotificationCount(),
			'First test user should start with one notification'
		);
		$this->assertSame(
			1,
			NotifUser::newFromUser( $secondUser )->getLocalNotificationCount(),
			'Second test user should start with one notification'
		);

		$eventController = Services::getInstance()->getEventController();
		$eventController->toggleHiddenState( [ $firstEventId ], true );

		$this->assertEventDeletedState( $firstEventId, true );
		$this->assertEventDeletedState( $secondEventId, false );
		$this->assertSame(
			0,
			NotifUser::newFromUser( $firstUser )->getLocalNotificationCount(),
			'First test user should have their notification hidden'
		);
		$this->assertSame(
			1,
			NotifUser::newFromUser( $secondUser )->getLocalNotificationCount(),
			'Second test user should keep their notification'
		);

		$eventController->toggleHiddenState( [ $firstEventId ], false );

		$this->assertEventDeletedState( $firstEventId, false );
		$this->assertSame(
			1,
			NotifUser::newFromUser( $firstUser )->getLocalNotificationCount(),
			'Showing the event again should also show the notification'
		);
	}

	public function testDelete(): void {
		// NotifUser::getLocalNotificationCount caches and we don't need to test caching here
		$this->setMainCache( CACHE_NONE );

		$firstUser = $this->getMutableTestUser()->getUserIdentity();
		$secondUser = $this->getMutableTestUser()->getUserIdentity();
		$firstEventId = $this->createEvent( $firstUser );
		$secondEventId = $this->createEvent( $secondUser );

		$this->assertSame(
			1,
			NotifUser::newFromUser( $firstUser )->getLocalNotificationCount(),
			'First test user should start with one notification'
		);

		Services::getInstance()->getEventController()->delete( [ $firstEventId ] );

		$this->newSelectQueryBuilder()
			->select( 'event_id' )
			->from( 'echo_event' )
			->assertFieldValue( $secondEventId );
		$this->newSelectQueryBuilder()
			->select( 'notification_event' )
			->from( 'echo_notification' )
			->assertFieldValue( $secondEventId );
		$this->assertSame(
			0,
			NotifUser::newFromUser( $firstUser )->getLocalNotificationCount(),
			'First test user should have no notifications after the event is deleted'
		);
		$this->assertSame(
			1,
			NotifUser::newFromUser( $secondUser )->getLocalNotificationCount(),
			'Second test user should keep their notification'
		);
	}

	public function testToggleHiddenStateForEventWithoutNotifications(): void {
		$eventId = $this->createEvent( $this->getTestUser()->getUserIdentity() );
		$this->getDb()->newDeleteQueryBuilder()
			->deleteFrom( 'echo_notification' )
			->where( [ 'notification_event' => $eventId ] )
			->caller( __METHOD__ )
			->execute();

		Services::getInstance()->getEventController()->toggleHiddenState( [ $eventId ], true );

		$this->assertEventDeletedState( $eventId, true );
	}
}
