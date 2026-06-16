<?php

namespace MediaWiki\Extension\Notifications\Test\Integration\Formatters;

use MediaWiki\Extension\Notifications\Formatters\EchoEventPresentationModel;
use MediaWiki\Extension\Notifications\Formatters\EchoUserBlockStatusPresentationModel;
use MediaWiki\Extension\Notifications\Model\Event;
use MediaWiki\User\User;
use MediaWikiIntegrationTestCase;

/**
 * @covers \MediaWiki\Extension\Notifications\Formatters\EchoUserBlockStatusPresentationModel
 * @group Database
 */
class EchoUserBlockStatusPresentationModelTest extends MediaWikiIntegrationTestCase {

	private function makeBlockEvent(
		?User $agent,
		array $extra,
		string $eventType = 'user-blocked'
	): Event {
		$agentId = $agent ? $agent->getId() : 0;
		$agentIp = $agent ? null : '';

		return Event::newFromRow( (object)[
			'event_id' => 12,
			'event_type' => $eventType,
			'event_page_id' => 0,
			'event_deleted' => 0,
			'event_agent_id' => $agentId,
			'event_agent_ip' => $agentIp,
			'event_extra' => $this->getServiceContainer()->getJsonCodec()->serialize( $extra ),
		] );
	}

	private function createModel(
		Event $event,
		string $distributionType = 'web'
	): EchoUserBlockStatusPresentationModel {
		$model = EchoEventPresentationModel::factory(
			$event,
			$this->getServiceContainer()
				->getLanguageFactory()
				->getLanguage( 'qqx' ),
			$this->createMock( User::class ),
			$distributionType
		);

		$this->assertInstanceOf( EchoUserBlockStatusPresentationModel::class, $model );
		return $model;
	}

	public function testGetIconTypeReturnsBlock(): void {
		$model = $this->createModel( $this->makeBlockEvent( $this->createMock( User::class ), [] ) );
		$this->assertSame( 'block', $model->getIconType() );
	}

	/** @dataProvider provideHeaderMessageKeys */
	public function testGetHeaderMessage(
		string $eventType,
		array $extra,
		string $expectedKey
	): void {
		$model = $this->createModel( $this->makeBlockEvent( $this->createMock( User::class ), $extra, $eventType ) );
		$this->assertSame( $expectedKey, $model->getHeaderMessage()->getKey() );
	}

	public static function provideHeaderMessageKeys(): array {
		return [
			'Unblocked' => [
				'eventType' => 'user-unblocked',
				'extra' => [],
				'expectedKey' => 'notification-header-user-unblocked',
			],
			'Sitewide indefinite block' => [
				'eventType' => 'user-blocked',
				'extra' => [ 'sitewide' => true, 'indefinite' => true ],
				'expectedKey' => 'notification-header-user-blocked-sitewide-indefinite',
			],
			'Sitewide temporary block' => [
				'eventType' => 'user-blocked',
				'extra' => [ 'sitewide' => true, 'indefinite' => false ],
				'expectedKey' => 'notification-header-user-blocked-sitewide-temporary',
			],
			'Partial indefinite block' => [
				'eventType' => 'user-blocked',
				'extra' => [ 'sitewide' => false, 'indefinite' => true ],
				'expectedKey' => 'notification-header-user-blocked-partial-indefinite',
			],
			'Partial temporary block' => [
				'eventType' => 'user-blocked',
				'extra' => [ 'sitewide' => false, 'indefinite' => false ],
				'expectedKey' => 'notification-header-user-blocked-partial-temporary',
			],
		];
	}

	/** @dataProvider provideBodyMessageCases */
	public function testGetBodyMessage(
		string $eventType,
		array $extra,
		string $expectedKey,
		?string $expectedScopeKey
	): void {
		$model = $this->createModel( $this->makeBlockEvent( $this->createMock( User::class ), $extra, $eventType ) );
		$bodyMessage = $model->getBodyMessage();
		$this->assertSame( $expectedKey, $bodyMessage->getKey() );

		if ( $expectedScopeKey !== null ) {
			$this->assertStringContainsString( "($expectedScopeKey", $bodyMessage->text() );
		}
	}

	public static function provideBodyMessageCases(): array {
		return [
			'Unblock' => [
				'eventType' => 'user-unblocked',
				'extra' => [],
				'expectedKey' => 'notification-body-user-unblocked',
				'expectedScopeKey' => null,
			],
			'Indefinite sitewide block' => [
				'eventType' => 'user-blocked',
				'extra' => [ 'sitewide' => true, 'indefinite' => true ],
				'expectedKey' => 'notification-body-user-blocked-indefinite',
				'expectedScopeKey' => 'notification-body-user-blocked-scope-sitewide',
			],
			'Temporary non-sitewide block' => [
				'eventType' => 'user-blocked',
				'extra' => [ 'sitewide' => false, 'indefinite' => false, 'expiry' => '20300101000000' ],
				'expectedKey' => 'notification-body-user-blocked-expiring',
				'expectedScopeKey' => 'notification-body-user-blocked-scope-partial',
			],
			'Temporary non-sitewide block without expiry set' => [
				'eventType' => 'user-blocked',
				'extra' => [ 'sitewide' => false, 'indefinite' => false, 'expiry' => '' ],
				'expectedKey' => 'notification-body-user-blocked',
				'expectedScopeKey' => 'notification-body-user-blocked-scope-partial',
			],
		];
	}

	public function testPrimaryLinkUsesBlockListTargetFromExtra(): void {
		$model = $this->createModel( $this->makeBlockEvent(
			$this->createMock( User::class ),
			[ 'target-user-name' => 'BlockedTarget' ]
		) );

		$link = $model->getPrimaryLink();
		$this->assertSame( '(notification-link-text-user-blocked-blocklist)', $link['label'] );
		$this->assertStringContainsString( '/wiki/Special:BlockList/BlockedTarget', $link['url'] );
	}

	public function testPrimaryLinkUsesBlockListTargetFromTitleFallback(): void {
		$model = $this->createModel( $this->makeBlockEvent(
			$this->createMock( User::class ),
			[ 'page_namespace' => NS_USER, 'page_title' => 'FallbackTarget' ]
		) );

		$link = $model->getPrimaryLink();
		$this->assertSame( '(notification-link-text-user-blocked-blocklist)', $link['label'] );
		$this->assertStringContainsString( '/wiki/Special:BlockList/FallbackTarget', $link['url'] );
	}

	public function testPrimaryLinkFallsBackToBlockLogIfTargetCannotBeResolved(): void {
		$model = $this->createModel( $this->makeBlockEvent( $this->createMock( User::class ), [] ) );
		$link = $model->getPrimaryLink();

		$this->assertSame( '(notification-link-text-user-blocked-log)', $link['label'] );

		$parts = parse_url( $link['url'] );
		parse_str( $parts['query'] ?? '', $query );

		$this->assertSame( 'block', $query['type'] ?? null );
		$this->assertArrayNotHasKey( 'page', $query );
	}

	public function testPrimaryLinkForUnblockedAlwaysUsesBlockLog(): void {
		$model = $this->createModel( $this->makeBlockEvent(
			$this->createMock( User::class ),
			[ 'target-user-name' => 'BlockedTarget' ],
			'user-unblocked'
		) );

		$link = $model->getPrimaryLink();
		$this->assertSame( '(notification-link-text-user-blocked-log)', $link['label'] );
	}

	public function testSecondaryLinksIncludeAgentAndBlockLogForNormalEvents(): void {
		$user = $this->createMock( User::class );
		$agent = $this->getTestSysop()->getUser();

		$model = $this->createModel( $this->makeBlockEvent( $agent, [] ) );
		$links = $model->getSecondaryLinks();

		$this->assertCount( 2, $links );
		$this->assertSame( '(notification-link-text-user-blocked-log)', $links[1]['label'] );
	}

	public function testSecondaryLinksContainOnlyLogWhenNoAgentExists(): void {
		$model = $this->createModel( $this->makeBlockEvent( null, [] ) );
		$links = $model->getSecondaryLinks();

		$this->assertCount( 1, $links );
		$this->assertSame( '(notification-link-text-user-blocked-log)', $links[0]['label'] );
	}

	public function testBlockLogLinkIncludesPageFilterWhenEventHasTitle(): void {
		$model = $this->createModel( $this->makeBlockEvent(
			null,
			[ 'page_namespace' => NS_USER, 'page_title' => 'LogTarget' ]
		) );

		$links = $model->getSecondaryLinks();
		$parts = parse_url( $links[0]['url'] );
		parse_str( $parts['query'] ?? '', $query );

		$this->assertSame( 'block', $query['type'] ?? null );
		$this->assertSame( 'User:LogTarget', $query['page'] ?? null );
	}
}
