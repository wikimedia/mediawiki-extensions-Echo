<?php

namespace MediaWiki\Extension\Notifications\Test;

use MediaWiki\Content\ContentHandler;
use MediaWiki\Extension\Notifications\Model\Event;
use MediaWiki\Extension\Notifications\UserLocator;
use MediaWiki\Title\Title;
use MediaWiki\User\User;
use MediaWiki\User\UserIdentity;
use MediaWiki\User\UserIdentityValue;
use MediaWikiIntegrationTestCase;

/**
 * @group Database
 * @covers \MediaWiki\Extension\Notifications\UserLocator
 */
class UserLocatorTest extends MediaWikiIntegrationTestCase {

	public function testLocateUsersWatchingTitle() {
		$title = Title::makeTitleSafe( NS_USER_TALK, 'Something_something_something' );
		$key = $title->getDBkey();

		for ( $i = 1000; $i < 1050; ++$i ) {
			$rows[] = [
				'wl_user' => $i,
				'wl_namespace' => NS_USER_TALK,
				'wl_title' => $key,
			];
		}

		$this->getDb()->newInsertQueryBuilder()
			->insertInto( 'watchlist' )
			->rows( $rows )
			->caller( __METHOD__ )
			->execute();

		$event = $this->createMock( Event::class );
		$event->method( 'getTitle' )
			->willReturn( $title );

		$it = UserLocator::locateUsersWatchingTitle( $event, 10 );
		$this->assertCount( 50, $it );
		// @todo assert more than one query was issued
	}

	public static function locateTalkPageOwnerProvider() {
		return [
			[
				'Allows null event title',
				// expected user id's
				'empty',
				// event title
				null,
			],

			[
				'No users selected for non-user talk namespace',
				// expected user id's
				'empty',
				// event title
				Title::newMainPage(),
			],

			[
				'Selects user from NS_USER_TALK',
				// expected user id's
				'user',
			],
		];
	}

	/**
	 * @dataProvider locateTalkPageOwnerProvider
	 */
	public function testLocateTalkPageOwner( $message, $expectMode, ?Title $title = null ) {
		if ( $expectMode === 'user' ) {
			$user = $this->getTestUser()->getUser();
			$user->addToDatabase();
			$expect = [ $user->getId() ];
			$title = $user->getTalkPage();
		} else {
			$expect = [];
		}
		$event = $this->createMock( Event::class );
		$event->method( 'getTitle' )
			->willReturn( $title );

		$users = UserLocator::locateTalkPageOwner( $event );
		$this->assertEquals( $expect, array_keys( $users ), $message );
	}

	public static function locateArticleCreatorProvider() {
		return [
			[ 'Something' ],
		];
	}

	/**
	 * @dataProvider locateArticleCreatorProvider
	 */
	public function testLocateArticleCreator( $message ) {
		$user = $this->getTestUser()->getUser();
		$user->addToDatabase();
		$title = $user->getTalkPage();
		$this->getServiceContainer()->getWikiPageFactory()->newFromTitle( $title )->doUserEditContent(
			/* $content = */ ContentHandler::makeContent( 'content', $title ),
			/* $user = */ $user,
			/* $summary = */ 'summary'
		);

		$userFactory = $this->getServiceContainer()->getUserFactory();
		$event = $this->createMock( Event::class );
		$event->method( 'getTitle' )
			->willReturn( $title );
		$event->method( 'getAgent' )
			->willReturn( $userFactory->newFromId( 123 ) );

		$users = UserLocator::locateArticleCreator( $event );
		$this->assertEquals( [ $user->getId() ], array_keys( $users ), $message );
	}

	public function testDontSendPageLinkedNotificationsForPagesCreatedByBotUsers() {
		$botUser = $this->getTestUser( [ 'bot' ] )->getUser();
		$userFactory = $this->getServiceContainer()->getUserFactory();
		$botUser->addToDatabase();
		$this->editPage( 'TestBotCreatedPage', 'Test', '', NS_MAIN, $botUser );
		$this->editPage( 'SomeOtherPage', '[[TestBotCreatedPage]]' );
		$event = $this->createMock( Event::class );
		$event->method( 'getTitle' )
			->willReturn( Title::newFromText( 'TestBotCreatedPage' ) );
		$event->method( 'getAgent' )
			->willReturn( $userFactory->newFromId( 123 ) );
		$event->method( 'getType' )
			->willReturn( 'page-linked' );
		$this->assertEquals( [], UserLocator::locateArticleCreator( $event ) );

		$normalUser = $this->getTestUser()->getUser();
		$normalUser->addToDatabase();
		$this->editPage( 'NormalCreatedPage', 'Test', '', NS_MAIN, $normalUser );
		$this->editPage( 'AnotherPage', '[[NormalCreatedPage]]' );
		$event = $this->createMock( Event::class );
		$event->method( 'getTitle' )
			->willReturn( Title::newFromText( 'NormalCreatedPage' ) );
		$event->method( 'getAgent' )
			->willReturn( $userFactory->newFromId( 456 ) );
		$event->method( 'getType' )
			->willReturn( 'page-linked' );
		$this->assertEquals(
			$normalUser->getUser()->getId(),
			array_key_first( UserLocator::locateArticleCreator( $event ) )
		);
	}

	public static function locateEventAgentProvider() {
		return [
			[
				'Null event agent returns no users',
				// expected result user id's
				[],
				// event agent
				null,
			],

			[
				'Anonymous event agent returns no users',
				// expected result user id's
				[],
				// event agent
				UserIdentityValue::newAnonymous( '4.5.6.7' ),
			],

			[
				'Registed event agent returned as user',
				// expected result user id's
				[ 42 ],
				// event agent
				UserIdentityValue::newRegistered( 42, 'Dummy' ),
			],
		];
	}

	/**
	 * @dataProvider locateEventAgentProvider
	 */
	public function testLocateEventAgent( $message, $expect, ?UserIdentity $agent = null ) {
		$userFactory = $this->getServiceContainer()->getUserFactory();
		$event = $this->createMock( Event::class );
		$event->method( 'getAgent' )
			->willReturnCallback( static function () use ( $agent, $userFactory ): ?User {
				return $agent ? $userFactory->newFromUserIdentity( $agent ) : null;
			} );

		$users = UserLocator::locateEventAgent( $event );
		$this->assertEquals( $expect, array_keys( $users ), $message );
	}

	public static function locateFromEventExtraProvider() {
		return [
			[
				'Event without extra data returns empty result',
				// expected user list
				[],
				// event extra data
				[],
				// extra keys to get ids from
				[ 'foo' ],
			],

			[
				'Event with specified extra data returns expected result',
				// expected user list
				[ 123 ],
				// event extra data
				[ 'foo' => 123 ],
				// extra keys to get ids from
				[ 'foo' ],
			],

			[
				'Accepts User objects instead of user ids',
				// expected user list
				[ 123 ],
				// event extra data
				[ 'foo' => UserIdentityValue::newRegistered( 123, 'Dummy' ) ],
				// extra keys to get ids from
				[ 'foo' ],
			],

			[
				'Allows inner key to be array of ids',
				// expected user list
				[ 123, 321 ],
				// event extra data
				[ 'foo' => [ 123, 321 ] ],
				// extra keys to get ids from
				[ 'foo' ],
			],

			[
				'Empty inner array causes no error',
				// expected user list
				[],
				// event extra data
				[ 'foo' => [] ],
				// extra keys to get ids from
				[ 'foo' ],
			],

			[
				'Accepts User object at inner level',
				// expected user list
				[ 123 ],
				// event extra data
				[ 'foo' => [ UserIdentityValue::newRegistered( 123, 'Dummy' ) ] ],
				// extra keys to get ids from
				[ 'foo' ],
			],

			[
				'Null inner id falls back to the anonymous user',
				// expected user list (anonymous user, id 0)
				[ 0 ],
				// event extra data
				[ 'foo' => [ null ] ],
				// extra keys to get ids from
				[ 'foo' ],
			],

		];
	}

	/**
	 * @dataProvider locateFromEventExtraProvider
	 */
	public function testLocateFromEventExtra( $message, $expect, array $extra, array $keys ) {
		$userFactory = $this->getServiceContainer()->getUserFactory();
		$event = $this->createMock( Event::class );
		$event->method( 'getExtra' )
			->willReturn( $extra );
		$event->method( 'getExtraParam' )
			->willReturnCallback( static function ( $key, $default = null ) use ( $extra, $userFactory ) {
				$value = $extra[$key] ?? null;
				if ( is_array( $value ) ) {
					return array_map(
						static function ( $value ) use ( $userFactory ) {
							return $value instanceof UserIdentity
								? $userFactory->newFromUserIdentity( $value )
								: $value;
						},
						$value
					);
				} else {
					return $value instanceof UserIdentity
						? $userFactory->newFromUserIdentity( $value )
						: $value;
				}
			} );

		$users = UserLocator::locateFromEventExtra( $event, $keys );
		$this->assertEquals( $expect, array_keys( $users ), $message );
	}

}
