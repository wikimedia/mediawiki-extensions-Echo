<?php

use Wikimedia\TestingAccessWrapper;

/**
 * @coversDefaultClass EchoNotificationController
 */
class NotificationControllerUnitTest extends MediaWikiUnitTestCase {

	/**
	 * @dataProvider PageLinkedTitleMutedByUserDataProvider
	 * @covers ::isPageLinkedTitleMutedByUser
	 * @param EchoEvent $echoEvent
	 * @param User $user
	 * @param bool $expected
	 */
	public function testIsPageLinkedTitleMutedByUser(
		EchoEvent $echoEvent, User $user, bool $expected ): void {
		$wrapper = TestingAccessWrapper::newFromClass( EchoNotificationController::class );
		$wrapper->mutedPageLinkedTitlesCache = $this->getMapCacheLruMock();
		$this->assertSame(
			$expected,
			$wrapper->isPageLinkedTitleMutedByUser( $echoEvent, $user )
		);
	}

	public function PageLinkedTitleMutedByUserDataProvider() :array {
		return [
			[
				$this->getMockEvent( 123 ),
				$this->getMockUser( [] ),
				false
			],
			[
				$this->getMockEvent( 123 ),
				$this->getMockUser( [ 123, 456, 789 ] ),
				true
			],
			[
				$this->getMockEvent( 456 ),
				$this->getMockUser( [ 489 ] ),
				false
			]

		];
	}

	private function getMockEvent( int $articleID ) {
		$event = $this->getMockBuilder( EchoEvent::class )
			->disableOriginalConstructor()
			->getMock();
		$event->method( 'getAgent' )
			->willReturn( $this->getMockUser() );
		$title = $this->getMockBuilder( Title::class )
			->disableOriginalConstructor()
			->getMock();
		$title->method( 'getArticleID' )
			->willReturn( $articleID );
		$event->method( 'getTitle' )
			->willReturn( $title );
		return $event;
	}

	private function getMockUser( $mutedTitlePreferences = [] ) {
		$user = $this->getMockBuilder( User::class )
			->disableOriginalConstructor()
			->getMock();
		$user->method( 'getId' )
			->willReturn( 456 );
		$user->method( 'getOption' )
			->willReturn( implode( "\n", $mutedTitlePreferences ) );
		return $user;
	}

	private function getMapCacheLruMock() {
		return $this->getMockBuilder( MapCacheLRU::class )
			->disableOriginalConstructor()
			->getMock();
	}

}
