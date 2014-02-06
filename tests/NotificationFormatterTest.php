<?php

class EchoNotificationFormatterTest extends MediaWikiTestCase {

	public function setUp() {
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
	}

	public static function provider_editUserTalk() {
		return array(
			// if there is a section-title, the message should be '[[User:user_name|user_name]] left a message on
			// your talk page in '[[User talk:user_name#section_title|section_title]]'
			array( '/[[User talk:[^#]+#moar_cowbell|moar_cowbell]]/', 'moar_cowbell', 'text' ),
			array( '/#moar_cowbell/', 'moar_cowbell', 'html' ),
			array( '/#moar_cowbell/', 'moar_cowbell', 'flyout' ),
		);
	}

	/**
	 * @dataProvider provider_editUserTalk
	 */
	public function testEditUserTalkFlyoutSectionLinkFragment( $pattern, $sectionTitle, $format ) {
		// Required hack so parser doesnt turn the links into redlinks which contain no fragment
		global $wgUser;
		LinkCache::singleton()->addGoodLinkObj( 42, $wgUser->getTalkPage() );

		$event = $this->mockEvent( 'edit-user-talk', array(
			'section-title' => $sectionTitle,
		) );
		$this->assertRegExp( $pattern, $this->format( $event, $format ) );
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
		$formats = array( 'html', 'flyout', 'email', 'text' );
		$tests = array();
		foreach ( $untested as $type => $extra ) {
			foreach ( $formats as $format ) {
				// Run tests with blank extra data and with the provided extra data
				$tests[] = array( $format, $type, $extra );
				$tests[] = array( $format, $type, array() );
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
			$tests[] = array( $eventType, $sectionText, 0);
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
			$this->assertNotContains( $text, $this->format( $event, 'html' ) );
		} else {
			$this->assertContains( $text, $this->format( $event, 'html' ) );
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

		$this->assertContains( $expect, $this->format( $event, 'html' ) );
	}

	public static function provider_sectionTitle() {
		$message = "some_section_title"; // underscores simplifies the test, since it will transform ' ' to '_'
		$suppressed = wfMessage( 'echo-rev-deleted-text-view')->text();

		$tests = array();
		$events = array( 'mention' ); // currently only mention uses sectionTitle, but likely edit-user-talk will soon as well
		foreach ( $events as $eventType ) {
			$tests[] = array( $eventType, $message, $message, 0);
			$tests[] = array( $eventType, $suppressed, $message, Revision::DELETED_TEXT );
		}

		return $tests;
	}

	/**
	 * @dataProvider provider_formatterDoesntFail
	 */
	public function testFormatterDoesntFail( $format, $type, array $extra ) {
		$result = $this->format( $this->mockEvent( $type, $extra ), $format );

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

		$this->assertContains( $expect, $this->format( $event, 'html' ) );
	}

	protected function format( EchoEvent $event, $format, $user = false, $type = 'web' ) {
		global $wgEchoNotifications;

		if ( $user === false ) {
			$user = User::newFromName('Notification-formatter-test');
		}

		// Notification users can not be anonymous, use a fake user id
		return EchoNotificationController::formatNotification( $event, $user, $format, $type );
	}

	protected function mockEvent( $type, array $extra = array(), Revision $rev = null ) {
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
		if ( $rev !== null ) {
			$event->expects( $this->any() )
				->method( 'getRevision' )
				->will( $this->returnValue( $rev ) );
		}
		return $event;
	}
}
