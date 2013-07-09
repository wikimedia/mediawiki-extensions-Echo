<?php

class EchoEmailFormatterTest extends MediaWikiTestCase {

	private $emailSingle;
	private $emailDigest;

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

		$content[$event->getCategory()][] = EchoNotificationController::formatNotification( $event, User::newFromId( 2 ), 'email', 'emaildigest' );
		$this->emailDigest = new EchoEmailDigest( User::newFromId( 2 ), $content );
	}

	public function testEmailFormatter() {
		$pattern = '/%%(.*?)%%/is';

		// Single email mode
		$textFormatter = new EchoTextEmailFormatter( $this->emailSingle );
		$this->assertRegExp( $pattern, $this->emailSingle->getTextTemplate() );
		$this->assertEquals( 0, preg_match ( $pattern, $textFormatter->formatEmail() ) );

		$htmlFormatter = new EchoHTMLEmailFormatter( $this->emailSingle );
		$this->assertRegExp( $pattern, $this->emailSingle->getHTMLTemplate() );
		$this->assertEquals( 0, preg_match ( $pattern, $htmlFormatter->formatEmail() ) );

		// Digest email mode
		$textFormatter = new EchoTextEmailFormatter( $this->emailDigest );
		$this->assertRegExp( $pattern, $this->emailSingle->getTextTemplate() );
		$this->assertEquals( 0, preg_match ( $pattern, $textFormatter->formatEmail() ) );

		$htmlFormatter = new EchoHTMLEmailFormatter( $this->emailDigest );
		$this->assertRegExp( $pattern, $this->emailSingle->getHTMLTemplate() );
		$this->assertEquals( 0, preg_match ( $pattern, $htmlFormatter->formatEmail() ) );
	}

	public function testBuildAction() {
		$this->emailSingle->attachDecorator( new EchoTextEmailDecorator() );
		$this->assertEquals( 0, preg_match ( '/<a /i', $this->emailSingle->buildAction() ) );

		$this->emailSingle->attachDecorator( new EchoHTMLEmailDecorator() );
		$this->assertRegExp( '/<a /i', $this->emailSingle->buildAction() );

		$this->emailDigest->attachDecorator( new EchoTextEmailDecorator() );
		$this->assertEquals( 0, preg_match ( '/<a /i', $this->emailDigest->buildAction() ) );

		$this->emailDigest->attachDecorator( new EchoHTMLEmailDecorator() );
		$this->assertRegExp( '/<a /i', $this->emailDigest->buildAction() );
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
		$event->expects( $this->any() )
			->method( 'getCategory' )
			->will( $this->returnValue( EchoNotificationController::getNotificationCategory( $type ) ) );
		return $event;
	}

}
