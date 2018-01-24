<?php

/**
 * @covers EchoNotificationController
 */
class NotificationControllerTest extends MediaWikiTestCase {

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
				function () {
					return [ 123 => 123 ];
				}
			],

			[
				'evaluates multiple locators',
				// expected result
				[ [ 123 ], [ 456 ] ],
				// event user locator config
				[
					function () {
						return [ 123 => 123 ];
					},
					function () {
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
					[ 'EchoUserLocator::locateFromEventExtra', [ 'other-user' ] ],
				],
				// additional setup
				function ( $test, $event ) {
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

		$event = $this->getMockBuilder( 'EchoEvent' )
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
		$test = $this;
		$callback = function ( $event, $firstOption, $secondOption ) use ( $test ) {
			$test->assertInstanceOf( 'EchoEvent', $event );
			$test->assertEquals( 'first', $firstOption );
			$test->assertEquals( 'second', $secondOption );

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
				[ null, 'foo', User::newFromId( 123 ), new stdClass, 456 ],
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
					EchoAttributeManager::ATTR_LOCATORS => function () use ( $users ) {
						return $users;
					},
				],
			],
		] );

		$event = $this->getMockBuilder( 'EchoEvent' )
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
		$event = $this->getMockBuilder( 'EchoEvent' )
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
				// type-specific
				[
					'foo' => [
						'notify-type-availability' => [ 'email' => true ],
					],
				],
			],

			[
				'Overrides `all` configuration with event type configuration',
				// expected result
				[ 'web' ],
				// event type
				'foo',
				// default notification types configuration
				[ 'web' => true, 'email' => true ],
				// type-specific
				[
					'foo' => [
						'notify-type-availability' => [ 'email' => false ],
					],
					'bar' => [
						'notify-type-availability' => [ 'sms' => true ],
					],
				],
			],

			[
				'Uses all configuration when notify-type-availability not set at all',
				// expected result
				[ 'web', 'email' ],
				// event type
				'baz',
				// default notification types configuration
				[ 'web' => true, 'email' => true ],
				// type-specific
				[
					'baz' => [],
				],
			]
		];
	}

	/**
	 * @dataProvider getEventNotifyTypesProvider
	 */
	public function testGetEventNotifyTypes( $message, $expect, $type, array $defaultNotifyTypeAvailability, array $notifications ) {
		$this->setMwGlobals( [
			'wgDefaultNotifyTypeAvailability' => $defaultNotifyTypeAvailability,
			'wgEchoNotifications' => $notifications,
		] );
		$result = EchoNotificationController::getEventNotifyTypes( $type );
		$this->assertEquals( $expect, $result, $message );
	}
}
