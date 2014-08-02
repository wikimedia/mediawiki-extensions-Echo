<?php

class NotificationControllerTest extends MediaWikiTestCase {

	public function getUsersToNotifyForEventProvider() {
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
				array( 123 ),
				// event user locator config
				function() { return array( 123 => 123 ); }
			),

			array(
				'merges results of multiple locators',
				// expected result
				array( 123, 456 ),
				// event user locator config
				array(
					function() { return array( 123 => 123 ); },
					function() { return array( 456 => 456 ); },
				),
			),

		);
	}

	/**
	 * @dataProvider getUsersToNotifyForEventProvider
	 */
	public function testGetUsersToNotifyForEvent( $message, $expect, $locatorConfigForEventType ) {
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

		$users = EchoNotificationController::getUsersToNotifyForEvent( $event );
		$this->assertEquals( $expect, array_keys( $users ), $message );
	}
}
