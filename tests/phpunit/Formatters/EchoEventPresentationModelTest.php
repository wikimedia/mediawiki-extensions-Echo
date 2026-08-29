<?php

namespace MediaWiki\Extension\Notifications\Test\Formatters;

use MediaWiki\Extension\Notifications\Formatters\EchoEventPresentationModel;
use MediaWiki\Extension\Notifications\Model\Event;
use MediaWiki\User\User;
use MediaWikiIntegrationTestCase;

/**
 * @covers \MediaWiki\Extension\Notifications\Formatters\EchoEventPresentationModel
 * @group Database
 */
class EchoEventPresentationModelTest extends MediaWikiIntegrationTestCase {

	/**
	 * Build an Event object without inserting into the Echo DB or triggering notifications.
	 */
	private function makeUserRightsEvent( User $agent, int $eventId ): Event {
		return Event::newFromRow( (object)[
			'event_id' => $eventId,
			'event_type' => 'user-rights',
			'event_page_id' => 0,
			'event_deleted' => 0,
			'event_agent_id' => $agent->getId(),
			'event_extra' => $this->getServiceContainer()->getJsonCodec()->serialize( [
				'add' => [ 'sysop' ],
				'remove' => [],
			] ),
			'event_timestamp' => wfTimestampNow(),
		] );
	}

	private function createModel( Event $event, User $viewingUser ): EchoEventPresentationModel {
		return EchoEventPresentationModel::factory(
			$event,
			$this->getServiceContainer()
				->getLanguageFactory()
				->getLanguage( 'qqx' ),
			$viewingUser,
			'email'
		);
	}

	public function testGetPrimaryLinkWithMarkAsRead_persistedEvent() {
		$user = $this->getTestUser()->getUser();
		$model = $this->createModel( $this->makeUserRightsEvent( $user, 12 ), $user );

		$link = $model->getPrimaryLinkWithMarkAsRead();

		$this->assertStringContainsString( 'markasread=12', $link['url'] );
	}

	/**
	 * An event that was never written to the database has no ID, so there is nothing to
	 * mark as read. The parameter should be left out rather than emitted with an empty value.
	 */
	public function testGetPrimaryLinkWithMarkAsRead_unpersistedEvent() {
		$user = $this->getTestUser()->getUser();
		$model = $this->createModel( $this->makeUserRightsEvent( $user, 0 ), $user );

		$link = $model->getPrimaryLinkWithMarkAsRead();

		$this->assertStringNotContainsString( 'markasread', $link['url'] );
	}

	public function testGetPrimaryLinkWithMarkAsRead_persistedBundle() {
		$user = $this->getTestUser()->getUser();
		$event = $this->makeUserRightsEvent( $user, 12 );
		$event->setBundledEvents( [
			$this->makeUserRightsEvent( $user, 13 ),
			$this->makeUserRightsEvent( $user, 14 ),
		] );
		$model = $this->createModel( $event, $user );

		$link = $model->getPrimaryLinkWithMarkAsRead();

		parse_str( parse_url( $link['url'], PHP_URL_QUERY ), $query );
		$this->assertSame( '12|13|14', $query['markasread'] );
	}

	/**
	 * Bundled events can be unpersisted too, in which case getBundledIds() returns a list
	 * of empty IDs. Those must not end up in the parameter either.
	 */
	public function testGetPrimaryLinkWithMarkAsRead_unpersistedBundle() {
		$user = $this->getTestUser()->getUser();
		$event = $this->makeUserRightsEvent( $user, 0 );
		$event->setBundledEvents( [
			$this->makeUserRightsEvent( $user, 0 ),
			$this->makeUserRightsEvent( $user, 0 ),
		] );
		$model = $this->createModel( $event, $user );

		$link = $model->getPrimaryLinkWithMarkAsRead();

		$this->assertStringNotContainsString( 'markasread', $link['url'] );
	}
}
