<?php

/**
 * @group Echo
 */
class EchoEmailFormatterTest extends MediaWikiTestCase {

	private $emailSingle;
	private $emailDigest;

	protected function setUp() {
		parent::setUp();

		$this->setMwGlobals( 'wgAllowHTMLEmail', true );

		$event = $this->mockEvent( 'edit-user-talk' );
		$event->expects( $this->any() )
			->method( 'getTitle' )
			->will( $this->returnValue( Title::newMainPage() ) );

		$formatter = EchoNotificationFormatter::factory( $event->getType() );
		$formatter->setOutputFormat( 'email' );

		$user = User::newFromId( 1 );
		$user->setName( 'Test' );
		$user->setOption( 'echo-email-format', EchoHooks::EMAIL_FORMAT_HTML );

		$this->emailSingle = new EchoEmailSingle( $formatter, $event, $user );

		$content[$event->getCategory()][] = EchoNotificationController::formatNotification( $event, $user, 'email', 'emaildigest' );
		$this->emailDigest = new EchoEmailDigest( User::newFromId( 2 ), $content );
	}

	public function testEmailFormatter() {
		$pattern = '/%%(.*?)%%/is';

		// Single email mode
		$textFormatter = new EchoTextEmailFormatter( $this->emailSingle );
		$this->assertRegExp( $pattern, $this->emailSingle->getTextTemplate() );
		$this->assertEquals( 0, preg_match( $pattern, $textFormatter->formatEmail() ) );

		$htmlFormatter = new EchoHTMLEmailFormatter( $this->emailSingle );
		$this->assertRegExp( $pattern, $this->emailSingle->getHTMLTemplate() );
		$this->assertEquals( 0, preg_match( $pattern, $htmlFormatter->formatEmail() ) );

		// Digest email mode
		$textFormatter = new EchoTextEmailFormatter( $this->emailDigest );
		$this->assertRegExp( $pattern, $this->emailSingle->getTextTemplate() );
		$this->assertEquals( 0, preg_match( $pattern, $textFormatter->formatEmail() ) );

		$htmlFormatter = new EchoHTMLEmailFormatter( $this->emailDigest );
		$this->assertRegExp( $pattern, $this->emailSingle->getHTMLTemplate() );
		$this->assertEquals( 0, preg_match( $pattern, $htmlFormatter->formatEmail() ) );
	}

	public function testBuildAction() {
		$this->emailSingle->attachDecorator( new EchoTextEmailDecorator() );
		$this->assertEquals( 0, preg_match( '/<a /i', $this->emailSingle->buildAction() ) );

		$this->emailSingle->attachDecorator( new EchoHTMLEmailDecorator() );
		$this->assertRegExp( '/<a /i', $this->emailSingle->buildAction() );

		$this->emailDigest->attachDecorator( new EchoTextEmailDecorator() );
		$this->assertEquals( 0, preg_match( '/<a /i', $this->emailDigest->buildAction() ) );

		$this->emailDigest->attachDecorator( new EchoHTMLEmailDecorator() );
		$this->assertRegExp( '/<a /i', $this->emailDigest->buildAction() );
	}

	/**
	 * @param string $type
	 * @return PHPUnit_Framework_MockObject_MockObject|EchoEvent
	 */
	protected function mockEvent( $type ) {
		$methods = get_class_methods( 'EchoEvent' );
		$methods = array_diff( $methods, array( 'userCan', 'getLinkMessage', 'getLinkDestination' ) );

		$attribManager = EchoAttributeManager::newFromGlobalVars();
		$event = $this->getMockBuilder( 'EchoEvent' )
			->disableOriginalConstructor()
			->setMethods( $methods )
			->getMock();
		$event->expects( $this->any() )
			->method( 'getType' )
			->will( $this->returnValue( $type ) );
		$event->expects( $this->any() )
			->method( 'getCategory' )
			->will( $this->returnValue( $attribManager->getNotificationCategory( $type ) ) );

		return $event;
	}

}
