<?php

use MediaWiki\User\UserOptionsLookup;
use Wikimedia\TestingAccessWrapper;

/**
 * @covers \EchoNotificationController
 */
class NotificationControllerTest extends MediaWikiIntegrationTestCase {

	public function evaluateUserLocatorsProvider() {
		return [
			[
				'With no options no users are notified',
				// expected result
				[],
				// event user locator config
				[],
			],

			[
				'Does not error when given non-existant user-locator',
				// expected result
				[],
				// event user locator config
				[ 'not-callable' ],
			],

			[
				'Calls selected locator and returns result',
				// expected result
				[ [ 123 ] ],
				// event user locator config
				static function () {
					return [ 123 => 123 ];
				}
			],

			[
				'evaluates multiple locators',
				// expected result
				[ [ 123 ], [ 456 ] ],
				// event user locator config
				[
					static function () {
						return [ 123 => 123 ];
					},
					static function () {
						return [ 456 => 456 ];
					},
				],
			],

			[
				'Passes parameters to locateFromEventExtra in expected manner',
				// expected result
				[ [ 123 ] ],
				// event user locator config
				[
					[ [ EchoUserLocator::class, 'locateFromEventExtra' ], [ 'other-user' ] ],
				],
				// additional setup
				static function ( $test, $event ) {
					$event->expects( $test->any() )
						->method( 'getExtraParam' )
						->with( 'other-user' )
						->will( $test->returnValue( 123 ) );
				}
			],
		];
	}

	/**
	 * @dataProvider evaluateUserLocatorsProvider
	 */
	public function testEvaluateUserLocators( $message, $expect, $locatorConfigForEventType, $setup = null ) {
		$this->setMwGlobals( [
			'wgEchoNotifications' => [
				'unit-test' => [
					EchoAttributeManager::ATTR_LOCATORS => $locatorConfigForEventType
				],
			],
		] );

		$event = $this->getMockBuilder( EchoEvent::class )
			->disableOriginalConstructor()
			->getMock();
		$event->expects( $this->any() )
			->method( 'getType' )
			->will( $this->returnValue( 'unit-test' ) );

		if ( $setup !== null ) {
			$setup( $this, $event );
		}

		$result = EchoNotificationController::evaluateUserCallable( $event, EchoAttributeManager::ATTR_LOCATORS );
		$this->assertEquals( $expect, array_map( 'array_keys', $result ), $message );
	}

	public function testEvaluateUserLocatorPassesParameters() {
		$callback = function ( $event, $firstOption, $secondOption ) {
			$this->assertInstanceOf( EchoEvent::class, $event );
			$this->assertEquals( 'first', $firstOption );
			$this->assertEquals( 'second', $secondOption );

			return [];
		};

		self::testEvaluateUserLocators(
			__FUNCTION__,
			[ [] ],
			[ [ $callback, 'first', 'second' ] ]
		);
	}

	public function getUsersToNotifyForEventProvider() {
		return [
			[
				'Filters anonymous users',
				// expected result
				[],
				// users returned from locator
				[ User::newFromName( '4.5.6.7', false ) ],
			],

			[
				'Filters duplicate users',
				// expected result
				[ 123 ],
				// users returned from locator
				[ User::newFromId( 123 ), User::newFromId( 123 ) ],
			],

			[
				'Filters non-user objects',
				// expected result
				[ 123 ],
				// users returned from locator
				[ null, 'foo', User::newFromId( 123 ), (object)[], 456 ],
			],
		];
	}

	/**
	 * @dataProvider getUsersToNotifyForEventProvider
	 */
	public function testGetUsersToNotifyForEvent(
		$message,
		$expect,
		$users
	) {
		$this->setMwGlobals( [
			'wgEchoNotifications' => [
				'unit-test' => [
					EchoAttributeManager::ATTR_LOCATORS => static function () use ( $users ) {
						return $users;
					},
				],
			],
		] );

		$event = $this->getMockBuilder( EchoEvent::class )
			->disableOriginalConstructor()
			->getMock();
		$event->expects( $this->any() )
			->method( 'getType' )
			->will( $this->returnValue( 'unit-test' ) );

		$result = EchoNotificationController::getUsersToNotifyForEvent( $event );
		$ids = [];
		foreach ( $result as $user ) {
			$ids[] = $user->getId();
		}
		$this->assertEquals( $expect, $ids, $message );
	}

	public function testDoesNotDeliverDisabledEvent() {
		$event = $this->getMockBuilder( EchoEvent::class )
			->disableOriginalConstructor()
			->getMock();
		$event->expects( $this->any() )
			->method( 'isEnabledEvent' )
			->will( $this->returnValue( false ) );
		// Assume it would have to check the event type to
		// determine how to deliver
		$event->expects( $this->never() )
			->method( 'getType' );

		EchoNotificationController::notify( $event, false );
	}

	public static function getEventNotifyTypesProvider() {
		return [
			[
				'Selects the `all` configuration by default',
				// expected result
				[ 'web' ],
				// event type
				'bar',
				// default notification types configuration
				[ 'web' => true ],
				// per-category notification type availability
				[
					'f' => [ 'email' => true ]
				],
				// event types
				[
					'foo' => [
						'category' => 'f',
					],
					'bar' => [
						'category' => 'b',
					]
				],
			],

			[
				'Overrides `all` configuration with event category configuration',
				// expected result
				[ 'web' ],
				// event type
				'foo',
				// default notification types configuration
				[ 'web' => true, 'email' => true ],
				// per-category notification type availability
				[
					'f' => [ 'email' => false ],
					'b' => [ 'sms' => true ],
				],
				// event types
				[
					'foo' => [
						'category' => 'f',
					],
					'bar' => [
						'category' => 'b',
					],
				],
			]
		];
	}

	/**
	 * @dataProvider getEventNotifyTypesProvider
	 */
	public function testGetEventNotifyTypes(
		$message,
		$expect,
		$type,
		array $defaultNotifyTypeAvailability,
		array $notifyTypeAvailabilityByCategory,
		array $notifications
	) {
		$this->setMwGlobals( [
			'wgDefaultNotifyTypeAvailability' => $defaultNotifyTypeAvailability,
			'wgNotifyTypeAvailabilityByCategory' => $notifyTypeAvailabilityByCategory,
			'wgEchoNotifications' => $notifications,
			'wgEchoNotificationCategories' => array_fill_keys(
				array_keys( $notifyTypeAvailabilityByCategory ),
				[ 'priority' => 4 ]
			),
		] );
		$result = EchoNotificationController::getEventNotifyTypes( $type );
		$this->assertEquals( $expect, $result, $message );
	}

	public function testEnqueueEvent() {
		$event = $this->getMockBuilder( EchoEvent::class )
			->disableOriginalConstructor()
			->getMock();
		$event->expects( $this->any() )
			->method( 'getExtraParam' )
			->will( $this->returnValue( null ) );
		$event->expects( $this->exactly( 1 ) )
			->method( 'getTitle' )
			->will( $this->returnValue( Title::newFromText( 'test-title' ) ) );
		$event->expects( $this->exactly( 1 ) )
			->method( 'getId' )
			->will( $this->returnValue( 42 ) );
		EchoNotificationController::enqueueEvent( $event );
		$jobQueueGroup = $this->getServiceContainer()->getJobQueueGroup();
		$queues = $jobQueueGroup->getQueuesWithJobs();
		$this->assertCount( 1, $queues );
		$this->assertEquals( 'EchoNotificationJob', $queues[0] );
		$job = $jobQueueGroup->pop( 'EchoNotificationJob' );
		$this->assertEquals( 'Test-title', $job->params[ 'title' ] );
		$this->assertEquals( 42, $job->params[ 'eventId' ] );
	}

	public function testNotSupportedDelay() {
		$queueGroup = $this->getServiceContainer()->getJobQueueGroup();
		$this->assertCount( 0, $queueGroup->getQueuesWithJobs() );

		$event = $this->getMockBuilder( EchoEvent::class )
			->disableOriginalConstructor()
			->getMock();
		$event->expects( $this->any() )
			->method( 'getExtraParam' )
			->will( $this->returnValueMap(
				[
					[ 'delay', null, 120 ],
					[ 'rootJobSignature', null, 'test-signature' ],
					[ 'rootJobTimestamp', null,  wfTimestamp() ]
				]
			) );
		$event->expects( $this->exactly( 1 ) )
			->method( 'getTitle' )
			->will( $this->returnValue( Title::newFromText( 'test-title' ) ) );
		$event->expects( $this->any() )
			->method( 'getId' )
			->will( $this->returnValue( 42 ) );
		EchoNotificationController::enqueueEvent( $event );

		$this->assertCount( 0, $queueGroup->getQueuesWithJobs() );
	}

	public function testEventParams() {
		$rootJobTimestamp = wfTimestamp();
		MWTimestamp::setFakeTime( 0 );

		$event = $this->getMockBuilder( EchoEvent::class )
			->disableOriginalConstructor()
			->getMock();
		$event->expects( $this->any() )
			->method( 'getExtraParam' )
			->will( $this->returnValueMap(
				[
					[ 'delay', null, 10 ],
					[ 'rootJobSignature', null, 'test-signature' ],
					[ 'rootJobTimestamp', null,  $rootJobTimestamp ]
				]
			) );
		$event->expects( $this->exactly( 1 ) )
			->method( 'getId' )
			->will( $this->returnValue( 42 ) );

		$params = EchoNotificationController::getEventParams( $event );
		$expectedParams = [
			'eventId' => 42,
			'rootJobSignature' => 'test-signature',
			'rootJobTimestamp' => $rootJobTimestamp,
			'jobReleaseTimestamp' => 10
		];
		$this->assertArrayEquals( $expectedParams, $params );
	}

	/**
	 * @dataProvider PageLinkedTitleMutedByUserDataProvider
	 * @covers EchoNotificationController::isPageLinkedTitleMutedByUser
	 * @param Title $title
	 * @param User $user
	 * @param UserOptionsLookup $userOptionsLookup
	 * @param bool $expected
	 */
	public function testIsPageLinkedTitleMutedByUser(
		Title $title, User $user, UserOptionsLookup $userOptionsLookup, $expected ): void {
		$wrapper = TestingAccessWrapper::newFromClass( EchoNotificationController::class );
		$wrapper->mutedPageLinkedTitlesCache = $this->getMapCacheLruMock();
		$this->setService( 'UserOptionsLookup', $userOptionsLookup );
		$this->assertSame(
			$expected,
			$wrapper->isPageLinkedTitleMutedByUser( $title, $user )
		);
	}

	public function PageLinkedTitleMutedByUserDataProvider(): array {
		return [
			[
				$this->getMockTitle( 123 ),
				$this->getMockUser(),
				$this->getUserOptionsLookupMock( [] ),
				false
			],
			[
				$this->getMockTitle( 123 ),
				$this->getMockUser(),
				$this->getUserOptionsLookupMock( [ 123, 456, 789 ] ),
				true
			],
			[
				$this->getMockTitle( 456 ),
				$this->getMockUser(),
				$this->getUserOptionsLookupMock( [ 489 ] ),
				false
			]

		];
	}

	private function getMockTitle( int $articleID ) {
		$title = $this->getMockBuilder( Title::class )
			->disableOriginalConstructor()
			->getMock();
		$title->method( 'getArticleID' )
			->willReturn( $articleID );
		return $title;
	}

	private function getMockUser() {
		$user = $this->getMockBuilder( User::class )
			->disableOriginalConstructor()
			->getMock();
		$user->method( 'getId' )
			->willReturn( 456 );
		return $user;
	}

	private function getMapCacheLruMock() {
		return $this->getMockBuilder( MapCacheLRU::class )
			->disableOriginalConstructor()
			->getMock();
	}

	private function getUserOptionsLookupMock( $mutedTitlePreferences = [] ) {
		$userOptionsLookupMock = $this->createMock( UserOptionsLookup::class );
		$userOptionsLookupMock->method( 'getOption' )
			->willReturn( implode( "\n", $mutedTitlePreferences ) );
		return $userOptionsLookupMock;
	}
}
