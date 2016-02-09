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

	public static function provider_editUserTalkEmail() {
		return array(
			array( '/Main_Page[^#]/', null ),
			array( '/Main_Page#Section_8/', 'Section 8' ),
		);
	}

	/**
	 * @dataProvider provider_editUserTalkEmail
	 */
	public function testEditUserTalkEmailNotificationLink( $pattern, $sectionTitle ) {
		$event = $this->mockEvent( 'edit-user-talk', array(
			'section-title' => $sectionTitle,
		) );
		$event->expects( $this->any() )
			->method( 'getTitle' )
			->will( $this->returnValue( Title::newMainPage() ) );
		$formatted = $this->format( $event, 'email' );
		if ( is_array( $formatted['body'] ) ) {
			$this->assertRegExp( $pattern, $formatted['body']['text'] );
			$this->assertRegExp( $pattern, $formatted['body']['html'] );
		} else {
			$this->assertRegExp( $pattern, $formatted['body'] );
		}

		# Reset the Title cache
		$mainPage = Title::newMainPage();
		$mainPage->setFragment( '' );
		# And assert it has been cleaned up
		$mainPageCached = Title::newMainPage();
		$this->assertEquals( '', $mainPageCached->getFragment() );
	}

	public function provider_formatterDoesntFail() {
		// Remove events from this array once they have specific tests for their formatting
		$untested = array(
			'welcome' => array(),
			'reverted' => array(
				'revid' => 42,
				'reverted-user-id' => 77,
				'reverted-revision-id' => 13,
				'method' => 'undo',
			),
			'page-linked' => array(
				'link-from-page-id' => 42,
			),
			'mention' => array(
				'content' => 'lorem ipsum dolar sit amet',
				'section-title' => 'Zombies',
				'revid' => 42,
				'mentionedusers' => array( 101 => 101 ),
			),
			'user-rights' => array(
				'user' => 187,
				'add' => array( 'aaa', 'bbb' ),
				'remove' => array( 'other' ),
			),
		);
		$formats = array( 'email', 'text' );
		$tests = array();
		$loggedUser = User::newFromName( 'Notification-formatter-test' );
		$anonUser = new User();

		foreach ( $untested as $type => $extra ) {
			foreach ( $formats as $format ) {
				// Run tests with blank extra data and with the provided extra data
				$tests[] = array( $format, $type, $extra, $loggedUser );
				$tests[] = array( $format, $type, array(), $anonUser );
			}
		}

		return $tests;
	}

	public static function provider_revisionSummary() {
		$sectionText = '(dummy comment)';

		// Test the 4 different events that reference the summary, although they should follow mostly
		// the same code they may use different classes extended from the EchoNotificationFormatter
		$tests = array();
		$events = array( 'edit-user-talk' );
		foreach ( $events as $eventType ) {
			$tests[] = array( $eventType, $sectionText, 0 );
			$tests[] = array( $eventType, $sectionText, Revision::DELETED_TEXT );
		}

		return $tests;
	}

	/**
	 * @dataProvider provider_revisionSummary
	 */
	public function testRevisionSummarySuppression( $eventType, $text, $deleted ) {
		// Revision needs a comment to attempt to format
		$event = $this->mockEvent(
			$eventType,
			array( 'section-title' => 'Test Title', 'section-text' => $text ),
			new Revision( compact( 'deleted' ) )
		);
		if ( $deleted === Revision::DELETED_TEXT ) {
			$this->assertNotContains( $text, $this->format( $event, 'htmlemail' ) );
		} else {
			$this->assertContains( $text, $this->format( $event, 'htmlemail' ) );
		}
	}

	public static function provider_revisionAgent() {
		$userText = '10.2.3.4';
		$suppressed = wfMessage( 'rev-deleted-user' )->text();

		$tests = array();
		$events = array( 'edit-user-talk', 'reverted', 'mention' );
		foreach ( $events as $eventType ) {
			$tests[] = array( $eventType, $userText, $userText, 0 );
			$tests[] = array( $eventType, $suppressed, $userText, Revision::DELETED_USER );
		}

		return $tests;
	}

	/**
	 * @dataProvider provider_revisionAgent
	 */
	public function testAgentSuppression( $eventType, $expect, $user_text, $deleted ) {
		$event = $this->mockEvent(
			$eventType,
			array(),
			new Revision( compact( 'user_text', 'deleted' ) )
		);

		$user = new User;
		$user->setName( $user_text );
		$event->expects( $this->any() )
			->method( 'getAgent' )
			->will( $this->returnValue( $user ) );

		$this->assertContains( $expect, $this->format( $event, 'text' ) );
	}

	public static function provider_sectionTitle() {
		$message = "some_section_title"; // underscores simplifies the test, since it will transform ' ' to '_'
		$suppressed = wfMessage( 'echo-rev-deleted-text-view' )->text();

		$tests = array();
		$events = array( 'mention' ); // currently only mention uses sectionTitle, but likely edit-user-talk will soon as well
		foreach ( $events as $eventType ) {
			$tests[] = array( $eventType, $message, $message, 0 );
			$tests[] = array( $eventType, $suppressed, $message, Revision::DELETED_TEXT );
		}

		return $tests;
	}

	/**
	 * @dataProvider provider_formatterDoesntFail
	 */
	public function testFormatterDoesntFail( $format, $type, array $extra, User $agent ) {
		$result = $this->format( $this->mockEvent( $type, $extra, null, $agent ), $format );

		// generic assertion, could do better
		if ( $format === 'email' ) {
			$this->assertInternalType( 'array', $result );
			$this->assertCount( 2, $result );
		} else {
			$this->assertInternalType( 'string', $result );
			$this->assertGreaterThan( 0, strlen( $result ) );
		}
	}

	/**
	 * @dataProvider provider_sectionTitle
	 */
	public function testMentionSubjectSectionTitleSuppression( $eventType, $expect, $sectionTitle, $deleted ) {
		$event = $this->mockEvent(
			$eventType,
			array( 'section-title' => $sectionTitle ),
			new Revision( compact( 'deleted' ) )
		);

		$this->assertContains( $expect, $this->format( $event, 'text' ) );
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
