<?php

class EchoEmailFormatterTest extends MediaWikiTestCase {

	private $emailSingle;

	public function setUp() {
		parent::setUp();

		global $wgEchoNotifications;

		$event = $this->mockEvent( 'edit-user-talk' );
		$event->expects( $this->any() )
			->method( 'getTitle' )
			->will( $this->returnValue( Title::newMainPage() ) );

		$formatter = EchoNotificationFormatter::factory( $wgEchoNotifications[$event->getType()] );
		$formatter->setOutputFormat( 'email' );

		$this->emailSingle = new EchoEmailSingle( $formatter, $event, User::newFromId( 2 ) );
	}

	public function testEmailFormatter() {
		$pattern = '/%%(.*?)%%/is';

		$textFormatter = new EchoTextEmailFormatter( $this->emailSingle );
		$this->assertRegExp( $pattern, $this->emailSingle->getTextTemplate() );
		$this->assertEquals( 0, preg_match ( $pattern, $textFormatter->formatEmail() ) );

		$htmlFormatter = new EchoHTMLEmailFormatter( $this->emailSingle );
		$this->assertRegExp( $pattern, $this->emailSingle->getHTMLTemplate() );
		$this->assertEquals( 0, preg_match ( $pattern, $htmlFormatter->formatEmail() ) );
	}

	public function testBuildAction() {
		$this->assertEquals( 0, preg_match ( '/<a /i', $this->emailSingle->buildAction( 'text' ) ) );
		$this->assertRegExp( '/<a /i', $this->emailSingle->buildAction( 'html' ) );
	}

	protected function mockEvent( $type ) {
		$methods = get_class_methods( 'EchoEvent' );
		$methods = array_diff( $methods, array( 'userCan', 'getLinkMessage', 'getLinkDestination' ) );

		$event = $this->getMockBuilder( 'EchoEvent' )
			->disableOriginalConstructor()
			->setMethods( $methods )
			->getMock();
		$event->expects( $this->any() )
			->method( 'getType' )
			->will( $this->returnValue( $type ) );
		return $event;
	}

}
