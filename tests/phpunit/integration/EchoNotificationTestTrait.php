<?php

namespace MediaWiki\Extension\Notifications\Test\Integration;

use MediaWiki\User\UserIdentity;
use MediaWikiIntegrationTestCase;

/**
 * Assertion helpers for Echo notification/event database counts.
 *
 * @extends MediaWikiIntegrationTestCase
 */
trait EchoNotificationTestTrait {

	/**
	 * Assert that an event of the given type exists exactly $expectedCount times.
	 *
	 * @param string $type Event type (e.g. 'page-linked', 'welcome')
	 * @param int $expectedCount Expected number of events
	 */
	public function assertEventCount( string $type, int $expectedCount ): void {
		$this->newSelectQueryBuilder()
			->select( 'COUNT(*)' )
			->from( 'echo_event' )
			->where( [ 'event_type' => $type ] )
			->assertFieldValue( (string)$expectedCount );
	}

	/**
	 * Assert that a user has exactly $expectedCount notifications of the given type.
	 *
	 * @param UserIdentity $user User to check
	 * @param string $type Notification type (e.g. 'page-linked', 'welcome')
	 * @param int $expectedCount Expected number of notifications
	 */
	public function assertNotificationCount( UserIdentity $user, string $type, int $expectedCount ): void {
		$this->newSelectQueryBuilder()
			->select( 'COUNT(*)' )
			->from( 'echo_event' )
			->join( 'echo_notification', null, 'event_id=notification_event' )
			->where( [ 'event_type' => $type ] )
			->where( [ 'notification_user' => $user->getId() ] )
			->assertFieldValue( (string)$expectedCount );
	}
}
