
<?php

class EchoNotificationFormatterTest extends MediaWikiTestCase {

	public static function provider_editUserTalkEmail() {
		return array(
			array( '/Main_Page#Section_8/', 'Section 8' ),
			array( '/Main_Page[^#]/', null ),
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
		$this->assertRegExp( $pattern, $formatted['body'] );
	}

	public static function provider_editUserTalk() {
		return array(
			array( '/[[User talk:[^#]+#moar_cowbell|talk page]]/', 'moar_cowbell', 'text' ),
			array( '/#moar_cowbell/', 'moar_cowbell', 'html' ),
			array( '/#moar_cowbell/', 'moar_cowbell', 'flyout' ),
		);
	}

	/**
	 * @dataProvider provider_editUserTalk
	 */
	public function testEditUserTalkFlyoutSectionLinkFragment( $pattern, $sectionTitle, $format ) {
		// Required hack so parser doesnt turn the links into redlinks which contain no fragment
		LinkCache::singleton()->addGoodLinkObj( 42, Title::newFromText( '127.0.0.1', NS_USER_TALK ) );

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
				'link-from-namespace' => 0,
				'link-from-title' => 'Karl Sims',
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

	/**
	 * @dataProvider provider_formatterDoesntFail
	 */
	public function testFormatterDoesntFail( $format, $type, array $extra ) {
		$result = $this->format( $this->mockEvent( $type, $extra ), $format );

		// generic assertion, could do better
		if ( $format === 'email' ) {
			$this->assertInternalType( 'array', $result );
			$this->assertCount( 3, $result );
		} else {
			$this->assertInternalType( 'string', $result );
			$this->assertGreaterThan( 0, strlen( $result ) );
		}
	}

	protected function format( EchoEvent $event, $format, $type = 'web', array $params = array() ) {
		global $wgEchoNotifications;

		$params += $wgEchoNotifications[ $event->getType() ];
		$formatter = EchoNotificationFormatter::factory( $params );
		$formatter->setOutputFormat( $format );

		return $formatter->format( $event, new User, $type );
	}

	protected function mockEvent( $type, array $extra = array(), Revision $rev = null ) {
		$event = $this->getMockBuilder( 'EchoEvent' )
			->disableOriginalConstructor()
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
