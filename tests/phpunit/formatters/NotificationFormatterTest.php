<?php

/**
 * @group Echo
 */
class EchoNotificationFormatterTest extends MediaWikiTestCase {

	protected function setUp() {
		parent::setUp();
		$user = new User();
		$user->setName( 'Notification-formatter-test' );
		$user->addToDatabase();
		$this->setMwGlobals( 'wgUser', $user );
	}

	protected function format( EchoEvent $event, $format, $user = false, $type = 'web' ) {
		if ( $user === false ) {
			$user = User::newFromName( 'Notification-formatter-test' );
		}

		// Notification users can not be anonymous, use a fake user id
		return EchoNotificationController::formatNotification( $event, $user, $format, $type );
	}

	protected function mockEvent( $type, array $extra = array(), Revision $rev = null, User $agent = null ) {
		$methods = get_class_methods( 'EchoEvent' );
		$methods = array_diff( $methods, array( 'userCan', 'getLinkMessage', 'getLinkDestination' ) );

		$event = $this->getMockBuilder( 'EchoEvent' )
			->disableOriginalConstructor()
			->setMethods( $methods )
			->getMock();
		$event->expects( $this->any() )
			->method( 'getType' )
			->will( $this->returnValue( $type ) );
		$event->expects( $this->any() )
			->method( 'getExtra' )
			->will( $this->returnValue( $extra ) );
		if ( $agent !== null ) {
			$event->expects( $this->any() )
				->method( 'getAgent' )
				->will( $this->returnValue( $agent ) );
		}
		if ( $rev !== null ) {
			$event->expects( $this->any() )
				->method( 'getRevision' )
				->will( $this->returnValue( $rev ) );
		}

		return $event;
	}

	/**
	 * @dataProvider provideGetIconUrl
	 */
	public function testGetIconUrl( $global, $icon, $dir, $expected, $exception = null ) {
		$this->setMwGlobals( array(
			'wgEchoNotificationIcons' => $global,
			'wgExtensionAssetsPath' => 'http://example.org'
		) );

		if ( $exception ) {
			$this->setExpectedException( $exception );
		}

		$url = EchoNotificationFormatter::getIconUrl( $icon, $dir );
		$this->assertEquals( $expected, $url );
	}

	public static function provideGetIconUrl() {
		$standard = array(
			'foo' => array(
				'path' => 'foo.png',
			),
			'bar' => array(
				'path' => array(
					'ltr' => 'bar.png'
				),
			),
			'baz' => array(
				'path' => array(
					'ltr' => 'baz-ltr.png',
					'rtl' => 'baz-rtl.png',
				),
			),
			'site' => array(
				'url' => false,
			),
			'placeholder' => array(
				'path' => 'placeholder.png',
			),
		);
		$tests = array(
			// Standard, no ltr/rtl
			array( $standard, 'foo', 'ltr', 'http://example.org/foo.png' ),
			array( $standard, 'foo', 'rtl', 'http://example.org/foo.png' ),
			// Only ltr configured (bad!)
			array( $standard, 'bar', 'ltr', 'http://example.org/bar.png' ),
			array( $standard, 'bar', 'rtl', '', 'UnexpectedValueException' ),
			// Different for ltr/rtl
			array( $standard, 'baz', 'ltr', 'http://example.org/baz-ltr.png' ),
			array( $standard, 'baz', 'rtl', 'http://example.org/baz-rtl.png' ),
			// Not registered
			array( $standard, 'invalid', 'ltr', '', 'InvalidArgumentException' ),
			// No url set, fallback to placeholder
			array( $standard, 'site', 'ltr', 'http://example.org/placeholder.png' ),
		);

		// Set the 'url', and it doesn't fallback anymore
		$standard['site']['url'] = 'http://example.com/site.png';
		$tests[] = array( $standard, 'site', 'ltr', 'http://example.com/site.png' );

		return $tests;
	}
}
