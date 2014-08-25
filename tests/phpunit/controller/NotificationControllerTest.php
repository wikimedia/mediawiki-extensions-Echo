<?php

class NotificationControllerTest extends MediaWikiTestCase {

	public function evaluateUserLocatorsProvider() {
		return array(
			array(
				'With no options no users are notified',
				// expected result
				array(),
				// event user locator config
				array(),
			),

			array(
				'Does not error when given non-existant user-locator',
				// expected result
				array(),
				// event user locator config
				array( 'not-callable' ),
			),

			array(
				'Calls selected locator and returns result',
				// expected result
				array( array( 123 ) ),
				// event user locator config
				function() { return array( 123 => 123 ); }
			),

			array(
				'evaluates multiple locators',
				// expected result
				array( array( 123 ), array( 456 ) ),
				// event user locator config
				array(
					function() { return array( 123 => 123 ); },
					function() { return array( 456 => 456 ); },
				),
			),

			array(
				'Passes parameters to locateFromEventExtra in expected manner',
				// expected result
				array( array( 123 ) ),
				// event user locator config
				array(
					array( 'EchoUserLocator::locateFromEventExtra', array( 'other-user' ) ),
				),
				// additional setup
				function( $test, $event ) {
					$event->expects( $test->any() )
						->method( 'getExtraParam' )
						->with( 'other-user' )
						->will( $test->returnValue( 123 ) );
				}
			),
		);
	}

	/**
	 * @dataProvider evaluateUserLocatorsProvider
	 */
	public function testEvaluateUserLocators( $message, $expect, $locatorConfigForEventType, $setup = null ) {
		$this->setMwGlobals( array(
			'wgEchoNotifications' => array(
				'unit-test' => array(
					'user-locators' => $locatorConfigForEventType
				),
			),
		) );

		$event = $this->getMockBuilder( 'EchoEvent' )
			->disableOriginalConstructor()
			->getMock();
		$event->expects( $this->any() )
			->method( 'getType' )
			->will( $this->returnValue( 'unit-test' ) );

		if ( $setup !== null ) {
			$setup( $this, $event );
		}

		$result = EchoNotificationController::evaluateUserLocators( $event );
		$this->assertEquals( $expect, array_map( 'array_keys', $result ), $message );
	}

	public function testEvaluateUserLocatorPassesParameters() {
		$test = $this;
		$callback = function( $event, $firstOption, $secondOption ) use( $test ) {
			$test->assertInstanceOf( 'EchoEvent', $event );
			$test->assertEquals( 'first', $firstOption );
			$test->assertEquals( 'second', $secondOption );

			return array();
		};

		self::testEvaluateUserLocators(
			__FUNCTION__,
			array( array() ),
			array( array( $callback, 'first', 'second' ) )
		);
	}

	public function getUsersToNotifyForEventProvider() {
		return array(
			array(
				'Filters anonymous users',
				// expected result
				array(),
				// users returned from locator
				array( User::newFromName( '4.5.6.7', false ) ),
			),

			array(
				'Filters duplicate users',
				// expected result
				array( 123 ),
				// users returned from locator
				array( User::newFromId( 123 ), User::newFromId( 123 ) ),
			),

			array(
				'Filters non-user objects',
				// expected result
				array( 123 ),
				// users returned from locator
				array( null, 'foo', User::newFromId( 123 ), new stdClass, 456 ),
			),
		);
	}

	/**
	 * @dataProvider getUsersToNotifyForEventProvider
	 */
	public function testGetUsersToNotifyForEvent(
		$message,
		$expect,
		$users
	) {
		$this->setMwGlobals( array(
			'wgEchoNotifications' => array(
				'unit-test' => array(
					'user-locators' => function() use( $users ) { return $users; },
				),
			),
		) );

		$event = $this->getMockBuilder( 'EchoEvent' )
			->disableOriginalConstructor()
			->getMock();
		$event->expects( $this->any() )
			->method( 'getType' )
			->will( $this->returnValue( 'unit-test' ) );

		$result = EchoNotificationController::getUsersToNotifyForEvent( $event );
		$ids = array();
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
		return array(
			array(
				'Selects the `all` configuration by default',
				// expected result
				array( 'web' ),
				// event type
				'bar',
				// default notification types configuration
				array(
					'all' => array( 'web' => true ),
					'foo' => array( 'email' => true ),
				),
			),

			array(
				'Overrides `all` configuration with event type configuration',
				// expected result
				array( 'web' ),
				// event type
				'foo',
				// default notification types configuration
				array(
					'all' => array( 'web' => true, 'email' => true ),
					'foo' => array( 'email' => false ),
					'bar' => array( 'sms' => true ),
				),
			),
		);
	}

	/**
	 * @dataProvider getEventNotifyTypesProvider
	 */
	public function testGetEventNotifyTypes( $message, $expect, $type, array $notificationTypes ) {
		$this->setMwGlobals( array(
			'wgEchoDefaultNotificationTypes' => $notificationTypes,
		) );
		$result = EchoNotificationController::getEventNotifyTypes( $type );
		$this->assertEquals( $expect, $result, $message );
	}
}
