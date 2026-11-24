<?php

namespace MediaWiki\Extension\Notifications\Test\Integration\Mapper;

use MediaWiki\Extension\Notifications\EmailBatch;
use MediaWiki\Extension\Notifications\Mapper\NotificationMapper;
use MediaWiki\Extension\Notifications\Model\Event;
use MediaWiki\Extension\Notifications\Model\Notification;
use MediaWiki\Extension\Notifications\Test\Integration\EchoSchemaOverridesTrait;
use MediaWiki\MainConfigNames;
use MediaWiki\User\UserIdentity;
use MediaWiki\User\UserIdentityValue;
use MediaWikiIntegrationTestCase;

/**
 * @covers \MediaWiki\Extension\Notifications\Mapper\NotificationMapper
 * @group Database
 */
class NotificationMapperDatabaseTest extends MediaWikiIntegrationTestCase {
	use EchoSchemaOverridesTrait;

	/** @var int Allows using a unique ID for each {@link Event} returned by {@link self::makeEvent} */
	private static int $nextEventId = 10;

	public function testDeleteByUserAndAge() {
		$this->overrideConfigValue( MainConfigNames::UpdateRowsPerQuery, 2 );

		// Insert four notifications, one of which is recent
		$user = $this->getTestUser()->getUser();
		$firstNotification = new Notification( $user, $this->makeEvent( '20150607080901' ) );
		$firstNotification->insert();
		$secondNotification = new Notification( $user, $this->makeEvent( '20260607080903' ) );
		$secondNotification->insert();
		$thirdNotification = new Notification( $user, $this->makeEvent( '20150607080902' ) );
		$thirdNotification->insert();
		$fourthNotification = new Notification( $user, $this->makeEvent( '20160607080903' ) );
		$fourthNotification->insert();

		// Check the DB is correctly set up for the test
		$this->newSelectQueryBuilder()
			->select( 'notification_event' )
			->from( 'echo_notification' )
			->assertFieldValues( [
				(string)$firstNotification->getEvent()->getId(),
				(string)$secondNotification->getEvent()->getId(),
				(string)$thirdNotification->getEvent()->getId(),
				(string)$fourthNotification->getEvent()->getId(),
			] );

		// Run the code we are testing with a max age of 5 years (the default for the extension)
		$notifMapper = new NotificationMapper( $this->getServiceContainer()->getConnectionProvider() );
		$notifMapper->deleteByUserAndAge( $user, 157783680 );

		// Assert that the notification that was too new and the last notification was
		// not deleted (as we delete a max of 2 events)
		$this->newSelectQueryBuilder()
			->select( 'notification_event' )
			->from( 'echo_notification' )
			->assertFieldValues( [
				(string)$secondNotification->getEvent()->getId(),
				(string)$fourthNotification->getEvent()->getId(),
			] );
	}

	public function testDeleteByEventIds(): void {
		$user = $this->getTestUser()->getUser();
		$firstNotification = new Notification( $user, $this->makeEvent( '20260607080901' ) );
		$firstNotification->insert();
		EmailBatch::addToQueue( $user->getId(), $firstNotification->getEvent()->getId(), 10, '' );
		$secondNotification = new Notification( $user, $this->makeEvent( '20260607080902' ) );
		$secondNotification->insert();
		EmailBatch::addToQueue( $user->getId(), $secondNotification->getEvent()->getId(), 10, '' );
		$thirdNotification = new Notification( $user, $this->makeEvent( '20260607080903' ) );
		$thirdNotification->insert();
		EmailBatch::addToQueue( $user->getId(), $thirdNotification->getEvent()->getId(), 10, '' );

		$notifMapper = new NotificationMapper( $this->getServiceContainer()->getConnectionProvider() );
		$notifMapper->deleteByEventIds( [ $thirdNotification->getEvent()->getId() ] );

		$this->newSelectQueryBuilder()
			->select( 'notification_event' )
			->from( 'echo_notification' )
			->assertFieldValues( [
				(string)$firstNotification->getEvent()->getId(),
				(string)$secondNotification->getEvent()->getId(),
			] );
		$this->newSelectQueryBuilder()
			->select( 'eeb_event_id' )
			->from( 'echo_email_batch' )
			->assertFieldValues( [
				(string)$firstNotification->getEvent()->getId(),
				(string)$secondNotification->getEvent()->getId(),
			] );

		$notifMapper->deleteByEventIds( [
			$firstNotification->getEvent()->getId(),
			$secondNotification->getEvent()->getId(),
		] );

		$this->newSelectQueryBuilder()
			->select( 'notification_event' )
			->from( 'echo_notification' )
			->assertEmptyResult();
		$this->newSelectQueryBuilder()
			->select( 'eeb_event_id' )
			->from( 'echo_email_batch' )
			->assertEmptyResult();
	}

	public function testDeleteByUserEventOffset() {
		// Eight notifications before the offset make two full batches: the walk must not
		// stop early, nor need a trailing empty batch.
		$this->overrideConfigValue( MainConfigNames::UpdateRowsPerQuery, 4 );
		$user = new UserIdentityValue( 1, 'Notified' );
		$otherUser = new UserIdentityValue( 2, 'Other' );

		foreach ( range( 1, 9 ) as $eventId ) {
			$this->insertEvent( $eventId );
			$this->insertNotification( $user, $eventId );
		}
		// Events 1 and 4 are still referenced by a notification of another user,
		// event 7 by an email batch of another user.
		$this->insertNotification( $otherUser, 1 );
		$this->insertNotification( $otherUser, 4 );
		EmailBatch::addToQueue( $otherUser->getId(), 7, 10, '' );
		$this->getDb()->newInsertQueryBuilder()
			->insertInto( 'echo_target_page' )
			->rows( [
				[ 'etp_page' => 1, 'etp_event' => 1 ],
				[ 'etp_page' => 1, 'etp_event' => 2 ],
			] )
			->caller( __METHOD__ )
			->execute();

		$notifMapper = new NotificationMapper( $this->getServiceContainer()->getConnectionProvider() );
		$this->assertTrue( $notifMapper->deleteByUserEventOffset( $user, 9 ) );

		// The user's notifications before the offset are gone, the other user's are kept.
		$this->newSelectQueryBuilder()
			->select( [ 'notification_user', 'notification_event' ] )
			->from( 'echo_notification' )
			->assertResultSet( [
				[ '1', '9' ],
				[ '2', '1' ],
				[ '2', '4' ],
			] );
		// Events no longer referenced are deleted, with their target pages.
		$this->newSelectQueryBuilder()
			->select( 'event_id' )
			->from( 'echo_event' )
			->assertFieldValues( [ '1', '4', '7', '9' ] );
		$this->newSelectQueryBuilder()
			->select( 'etp_event' )
			->from( 'echo_target_page' )
			->assertFieldValue( '1' );
	}

	private function insertEvent( int $eventId ): void {
		$this->getDb()->newInsertQueryBuilder()
			->insertInto( 'echo_event' )
			->row( [ 'event_id' => $eventId, 'event_type' => 'welcome' ] )
			->caller( __METHOD__ )
			->execute();
	}

	private function insertNotification( UserIdentity $user, int $eventId ): void {
		$this->getDb()->newInsertQueryBuilder()
			->insertInto( 'echo_notification' )
			->row( [
				'notification_event' => $eventId,
				'notification_user' => $user->getId(),
				'notification_timestamp' => $this->getDb()->timestamp( '20260607080901' ),
				'notification_bundle_hash' => '',
			] )
			->caller( __METHOD__ )
			->execute();
	}

	private function makeEvent( string $timestamp ): Event {
		$agent = $this->getTestSysop()->getUser();
		return Event::newFromRow( (object)[
			'event_id' => static::$nextEventId++,
			'event_type' => 'welcome',
			'event_page_id' => 1,
			'event_deleted' => 0,
			'event_agent_id' => $agent->getId(),
			'event_extra' => '',
			'notification_timestamp' => $timestamp,
		] );
	}
}
