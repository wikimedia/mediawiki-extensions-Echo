<?php

namespace MediaWiki\Extension\Notifications\Test\Integration\Mapper;

use MediaWiki\Extension\Notifications\Mapper\EventMapper;
use MediaWiki\Extension\Notifications\Model\Event;
use MediaWikiIntegrationTestCase;

/**
 * @group Database
 * @covers \MediaWiki\Extension\Notifications\Mapper\EventMapper
 */
class EventMapperWithFixedRowsTest extends MediaWikiIntegrationTestCase {

	private static array $events;
	private static int $firstTestPageId;
	private static int $secondTestPageId;

	public function addDBDataOnce(): void {
		$originalAlwaysInsert = Event::$alwaysInsert;

		try {
			Event::$alwaysInsert = true;

			$user = $this->getTestUser()->getUser();
			$this->overrideConfigValue( 'EchoUseJobQueue', false );

			// Create a notification that is not associated with any page
			$eventWithoutTitle = Event::create( [
				'type' => 'welcome',
				'agent' => $user,
			] );

			// Create a notification with a title
			$firstPage = $this->getExistingTestPage();
			$eventWithTitle = Event::create( [
				'type' => 'welcome',
				'agent' => $user,
				'title' => $firstPage->getTitle(),
			] );

			// Create a notification with a target-page
			$eventWithTargetPage = Event::create( [
				'type' => 'welcome',
				'agent' => $user,
				'extra' => [ 'target-page' => $firstPage->getId() ],
			] );

			// Create a notification with a different type
			$eventWithDifferentType = Event::create( [
				'type' => 'reverted',
				'title' => $firstPage->getTitle(),
				'agent' => $user,
				'timestamp' => '20230405060708',
			] );

			// Create a notification on a different page
			$secondPage = $this->getExistingTestPage();
			$eventWithDifferentPage = Event::create( [
				'type' => 'welcome',
				'agent' => $user,
				'title' => $secondPage->getTitle(),
			] );

			$this->runDeferredUpdates();

			static::$events = [
				'withoutTitle' => $eventWithoutTitle->getId(),
				'withTitle' => $eventWithTitle->getId(),
				'withTargetPage' => $eventWithTargetPage->getId(),
				'withDifferentType' => $eventWithDifferentType->getId(),
				'withDifferentPage' => $eventWithDifferentPage->getId(),
			];
			static::$firstTestPageId = $firstPage->getId();
			static::$secondTestPageId = $secondPage->getId();
		} finally {
			Event::$alwaysInsert = $originalAlwaysInsert;
		}
	}

	/** @dataProvider provideFetchIdsByPage */
	public function testFetchIdsByPage( $pageIdCallback, $expectedEventIdsCallback ): void {
		$eventMapper = new EventMapper();
		$this->assertEventIdsPresent(
			$expectedEventIdsCallback(),
			$eventMapper->fetchIdsByPage( $pageIdCallback() )
		);
	}

	public static function provideFetchIdsByPage(): array {
		return [
			'Lookup on first page' => [
				'pageIdCallback' => static fn () => static::$firstTestPageId,
				'expectedEventIdsCallback' => static fn () => [
					static::$events['withTitle'],
					static::$events['withDifferentType'],
					static::$events['withTargetPage'],
				],
			],
			'Lookup on second page' => [
				'pageIdCallback' => static fn () => static::$secondTestPageId,
				'expectedEventIdsCallback' => static fn () => [
					static::$events['withDifferentPage'],
				],
			],
			'Lookup on non-existent page' => [
				'pageIdCallback' => static fn () => 999999,
				'expectedEventIdsCallback' => static fn () => [],
			],
		];
	}

	/** @dataProvider provideFetchByPage */
	public function testFetchByPage( $pageIdCallback, $eventType, $expectedEventIdsCallback ): void {
		$eventMapper = new EventMapper();
		$actualEvents = $eventMapper->fetchByPage( $pageIdCallback(), $eventType );
		$this->assertEventIdsPresent(
			$expectedEventIdsCallback(),
			array_map( static fn ( $event ) => $event->getId(), $actualEvents )
		);
	}

	public static function provideFetchByPage(): array {
		return [
			'Lookup on first page with no type filter' => [
				'pageIdCallback' => static fn () => static::$firstTestPageId,
				'eventType' => null,
				'expectedEventIdsCallback' => static fn () => [
					static::$events['withTitle'],
					static::$events['withDifferentType'],
					static::$events['withTargetPage'],
				],
			],
			'Lookup on first page with type filter' => [
				'pageIdCallback' => static fn () => static::$firstTestPageId,
				'eventType' => 'welcome',
				'expectedEventIdsCallback' => static fn () => [
					static::$events['withTitle'],
					static::$events['withTargetPage'],
				],
			],
			'Lookup on first page with type filter that produces no events' => [
				'pageIdCallback' => static fn () => static::$firstTestPageId,
				'eventType' => 'emailuser',
				'expectedEventIdsCallback' => static fn () => [],
			],
			'Lookup on second page with no type filter' => [
				'pageIdCallback' => static fn () => static::$secondTestPageId,
				'eventType' => null,
				'expectedEventIdsCallback' => static fn () => [
					static::$events['withDifferentPage'],
				],
			],
			'Lookup on second page with type filter that produces no events' => [
				'pageIdCallback' => static fn () => static::$secondTestPageId,
				'eventType' => 'reverted',
				'expectedEventIdsCallback' => static fn () => [],
			],
			'Lookup on non-existent page no type filter' => [
				'pageIdCallback' => static fn () => 999999,
				'eventType' => null,
				'expectedEventIdsCallback' => static fn () => [],
			],
		];
	}

	private function assertEventIdsPresent( array $expectedEventIds, array $actualEventIds ): void {
		if ( $expectedEventIds === [] ) {
			$this->assertCount( 0, $actualEventIds, 'Expected no event IDs, but some were found' );
			return;
		}

		$this->assertArrayContains(
			$expectedEventIds,
			$actualEventIds,
			'Expected event IDs were not in the actual event IDs'
		);
		$eventIdsThatShouldNotBePresent = array_diff( array_values( static::$events ), $expectedEventIds );
		foreach ( $eventIdsThatShouldNotBePresent as $eventId ) {
			$this->assertNotContains(
				$eventId,
				$actualEventIds,
				"Event ID $eventId should not be present in the actual event IDs"
			);
		}
	}
}
