<?php

namespace MediaWiki\Extension\Notifications\Test\Unit\Controller;

use MediaWiki\Extension\Notifications\Controller\EventController;
use MediaWiki\Extension\Notifications\Mapper\EventMapper;
use MediaWiki\Extension\Notifications\Mapper\NotificationMapper;
use MediaWiki\User\UserFactory;
use MediaWikiUnitTestCase;
use Wikimedia\Rdbms\ILBFactory;

/**
 * @covers \MediaWiki\Extension\Notifications\Controller\EventController
 */
class EventControllerTest extends MediaWikiUnitTestCase {

	public function testToggleHiddenStateForNoEvents(): void {
		$eventController = new EventController(
			$this->createNoOpMock( EventMapper::class ),
			$this->createNoOpMock( NotificationMapper::class ),
			$this->createNoOpMock( ILBFactory::class ),
			$this->createNoOpMock( UserFactory::class )
		);
		$eventController->toggleHiddenState( [], true );
	}
}
