<?php

namespace MediaWiki\Extension\Notifications\Test\MediaWikiEventIngress;

use MediaWikiIntegrationTestCase;
use TestUser;

/**
 * @covers \MediaWiki\Extension\Notifications\MediaWikiEventIngress\PageEventIngress
 * @group Echo
 * @group Database
 */
class PageEventIngressTest extends MediaWikiIntegrationTestCase {

	protected function setUp(): void {
		parent::setUp();
		$this->clearHook( 'BeforeEchoEventInsert' );
		$this->overrideConfigValue( 'EchoUseJobQueue', false );
	}

	public function testEditByOtherUserOnUserJsPageCreatesEvent() {
		$owner = new TestUser( 'JsPageOwner' );
		$editor = new TestUser( 'JsPageEditor' );

		// Owner creates their own JS page (self-edit should not trigger a notification).
		$this->editPage(
			$owner->getUser()->getName() . '/common.js',
			'// initial',
			'',
			NS_USER,
			$owner->getUser()
		);

		// Different user edits the same page.
		$this->editPage(
			$owner->getUser()->getName() . '/common.js',
			'// modified',
			'',
			NS_USER,
			$editor->getUser()
		);

		$this->newSelectQueryBuilder()
			->select( 'COUNT(*)' )
			->from( 'echo_event' )
			->where( [ 'event_type' => 'edited-other-users-js' ] )
			->assertFieldValue( '1' );
	}

	public function testSelfEditOnUserJsPageDoesNotCreateEvent() {
		$owner = new TestUser( 'JsSelfEditor' );

		$this->editPage(
			$owner->getUser()->getName() . '/common.js',
			'// initial',
			'',
			NS_USER,
			$owner->getUser()
		);
		$this->editPage(
			$owner->getUser()->getName() . '/common.js',
			'// updated by owner',
			'',
			NS_USER,
			$owner->getUser()
		);

		$this->newSelectQueryBuilder()
			->select( 'COUNT(*)' )
			->from( 'echo_event' )
			->where( [ 'event_type' => 'edited-other-users-js' ] )
			->assertFieldValue( '0' );
	}

	public function testEditOnNonJsUserPageDoesNotCreateEvent() {
		$owner = new TestUser( 'NonJsPageOwner' );
		$editor = new TestUser( 'NonJsPageEditor' );

		$this->editPage(
			$owner->getUser()->getName() . '/Sandbox',
			'',
			'',
			NS_USER,
			$owner->getUser()
		);
		$this->editPage(
			$owner->getUser()->getName() . '/Sandbox',
			'edited',
			'',
			NS_USER,
			$editor->getUser()
		);

		$this->newSelectQueryBuilder()
			->select( 'COUNT(*)' )
			->from( 'echo_event' )
			->where( [ 'event_type' => 'edited-other-users-js' ] )
			->assertFieldValue( '0' );
	}

	public function testEditOnUserJsPageWithoutRegisteredOwnerDoesNotCreateEvent() {
		$editor = new TestUser( 'JsOrphanEditor' );

		// Root text 'NonExistentOwner' does not correspond to any registered user.
		$this->editPage(
			'NonExistentOwner/common.js',
			'// content',
			'',
			NS_USER,
			$editor->getUser()
		);

		$this->newSelectQueryBuilder()
			->select( 'COUNT(*)' )
			->from( 'echo_event' )
			->where( [ 'event_type' => 'edited-other-users-js' ] )
			->assertFieldValue( '0' );
	}
}
