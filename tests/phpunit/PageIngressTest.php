<?php

namespace MediaWiki\Extension\Notifications\Test;

use MediaWiki\Extension\Notifications\Controller\EventController;
use MediaWiki\Extension\Notifications\Mapper\EventMapper;
use MediaWiki\Extension\Notifications\MediaWikiEventIngress\PageEventIngress;
use MediaWiki\Page\Event\PageDeletedEvent;
use MediaWiki\Page\ExistingPageRecord;
use MediaWiki\Revision\RevisionRecord;
use MediaWiki\Revision\RevisionStore;
use MediaWiki\Title\TitleFactory;
use MediaWiki\User\UserEditTracker;
use MediaWiki\User\UserFactory;
use MediaWiki\User\UserIdentityUtils;
use MediaWiki\User\UserIdentityValue;
use MediaWikiIntegrationTestCase;

class PageIngressTest extends MediaWikiIntegrationTestCase {

	/**
	 * @covers \MediaWiki\Extension\Notifications\MediaWikiEventIngress\PageEventIngress
	 */
	public function testDeletedPage() {
		$pageRecordBefore = $this->createMock( ExistingPageRecord::class );
		$pageRecordBefore->method( 'exists' )->willReturn( true );
		$latestRevisionBefore = $this->createMock( RevisionRecord::class );
		$user = new UserIdentityValue( 0, "User" );
		$event = new PageDeletedEvent(
			$pageRecordBefore,
			$latestRevisionBefore,
			$user,
			[], [], "", "", 1
		);

		$revisionStore = $this->createMock( RevisionStore::class );
		$userEditTracker = $this->createMock( UserEditTracker::class );
		$eventMapper = $this->createMock( EventMapper::class );
		$titleFactory = $this->createMock( TitleFactory::class );
		$userFactory = $this->createMock( UserFactory::class );

		$eventIdsForModeration = [ 1, 2, 3 ];
		$eventMapper->expects( $this->once() )
			->method( 'fetchIdsByPage' )
			->willReturn( $eventIdsForModeration );

		$eventController = $this->createMock( EventController::class );
		$eventController->expects( $this->once() )
			->method( 'toggleHiddenState' )
			->with( $eventIdsForModeration, true );

		$userIdentityUtils = $this->createNoOpMock( UserIdentityUtils::class );

		$pageEventIngress = new PageEventIngress(
			$revisionStore, $userEditTracker,
			$eventMapper, $userIdentityUtils,
			$titleFactory, $userFactory,
			$eventController
		);
		$pageEventIngress->handlePageDeletedEvent( $event );
	}
}
