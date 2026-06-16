<?php

namespace MediaWiki\Extension\Notifications\Test;

use MediaWiki\Block\DatabaseBlock;
use MediaWiki\Extension\Notifications\Hooks as EchoHooks;
use MediaWiki\Extension\Notifications\Services;
use MediaWiki\MainConfigNames;
use MediaWiki\Notification\NotificationService;
use MediaWiki\Notification\RecipientSet;
use MediaWiki\Notification\Types\WikiNotification;
use MediaWiki\Page\PageIdentity;
use MediaWiki\User\User;
use MediaWiki\User\UserIdentity;
use MediaWikiIntegrationTestCase;

/**
 * @covers \MediaWiki\Extension\Notifications\Hooks
 */
class EchoHooksTest extends MediaWikiIntegrationTestCase {
	public function testOnUserGetDefaultOptions() {
		$this->overrideConfigValues( [
			'EchoNotificationCategories' => [
				'emailuser' => [
					'priority' => 9,
					'tooltip' => 'echo-pref-tooltip-emailuser',
				],
				'mention' => [
					'priority' => 4,
					'tooltip' => 'echo-pref-tooltip-mention',
				],
				'system' => [
					'priority' => 9,
					'no-dismiss' => [
						'all',
					],
				],
				'some-custom-category' => [
					'priority' => 9001,
				],
			],
			MainConfigNames::AllowHTMLEmail => true,
		] );

		$defaults = [
			'something' => 'unrelated',
			// T174220: don't overwrite defaults set elsewhere
			'echo-subscriptions-web-mention' => false,
		];
		$hooks = $this->getHooks();
		$hooks->onUserGetDefaultOptions( $defaults );
		self::assertEquals(
			[
				'something' => 'unrelated',
				'echo-email-format' => 'html',
				'echo-subscriptions-email-mention' => false,
				'echo-subscriptions-web-mention' => false,
				'echo-subscriptions-email-emailuser' => false,
				'echo-subscriptions-web-emailuser' => true,
				'echo-subscriptions-email-system' => true,
				'echo-subscriptions-web-system' => true,
				'echo-subscriptions-email-some-custom-category' => false,
				'echo-subscriptions-web-some-custom-category' => true,
			],
			$defaults
		);
	}

	public function testForBlockNotificationsWhenBlockNotificationsDisabled(): void {
		$this->overrideConfigValue( 'EchoBlockNotifications', false );

		$this->commonOnBlockIpCompleteForNoNotification(
			$this->createMock( DatabaseBlock::class ),
			$this->createMock( User::class ),
			null
		);
		$this->commonOnUnblockUserCompleteForNoNotification(
			$this->createMock( DatabaseBlock::class ),
			$this->createMock( User::class )
		);
	}

	public function testBlockNotificationsWhenTargetIsNotRegistered(): void {
		$this->overrideConfigValue( 'EchoBlockNotifications', true );

		$block = $this->createMock( DatabaseBlock::class );
		$block->method( 'getTargetUserIdentity' )
			->willReturn( null );

		$this->commonOnBlockIpCompleteForNoNotification( $block, $this->createMock( User::class ), null );
		$this->commonOnUnblockUserCompleteForNoNotification( $block, $this->createMock( User::class ) );
	}

	public function testBlockNotificationsWhenTargetIsPerformer(): void {
		$this->overrideConfigValue( 'EchoBlockNotifications', true );

		$performer = $this->createMock( User::class );
		$performer->method( 'equals' )
			->willReturnCallback( static function ( $other ) use ( $performer ) {
				return $performer->getName() === $other->getName();
			} );
		$performer->method( 'isRegistered' )
			->willReturn( true );

		$block = $this->createMock( DatabaseBlock::class );
		$block->method( 'getTargetUserIdentity' )
			->willReturn( $performer );

		$this->commonOnBlockIpCompleteForNoNotification( $block, $performer, null );
		$this->commonOnUnblockUserCompleteForNoNotification( $block, $performer );
	}

	private function commonOnBlockIpCompleteForNoNotification(
		DatabaseBlock $block,
		User $user,
		?DatabaseBlock $priorBlock
	): void {
		$notificationService = $this->createMock( NotificationService::class );
		$notificationService->expects( $this->never() )
			->method( 'notify' );
		$this->setService( 'NotificationService', $notificationService );

		$this->getHooks()->onBlockIpComplete( $block, $user, $priorBlock );
	}

	private function commonOnUnblockUserCompleteForNoNotification(
		DatabaseBlock $block,
		User $user
	): void {
		$notificationService = $this->createMock( NotificationService::class );
		$notificationService->expects( $this->never() )
			->method( 'notify' );
		$this->setService( 'NotificationService', $notificationService );

		$this->getHooks()->onUnblockUserComplete( $block, $user );
	}

	public function testUnblockUserCompleteWhenNotificationCreated(): void {
		$this->overrideConfigValue( 'EchoBlockNotifications', true );

		$performer = $this->createMock( User::class );
		$performer->method( 'isRegistered' )
			->willReturn( true );
		$recipient = $this->createMock( User::class );
		$recipient->method( 'isRegistered' )
			->willReturn( true );
		$recipient->method( 'getUserPage' )
			->willReturn( $this->createMock( PageIdentity::class ) );

		$block = $this->createMock( DatabaseBlock::class );
		$block->method( 'getTargetUserIdentity' )
			->willReturn( $recipient );

		$this->commonAssertNotifyCall( $recipient, $performer, 'user-unblocked' );

		$this->getHooks()->onUnblockUserComplete( $block, $performer );
	}

	/** @dataProvider provideBlockIpCompleteWhenNotificationCreated */
	public function testBlockIpCompleteWhenNotificationCreated( bool $priorBlockSet ): void {
		$this->overrideConfigValue( 'EchoBlockNotifications', true );

		$performer = $this->createMock( User::class );
		$performer->method( 'isRegistered' )
			->willReturn( true );
		$recipient = $this->createMock( User::class );
		$recipient->method( 'isRegistered' )
			->willReturn( true );
		$recipient->method( 'getUserPage' )
			->willReturn( $this->createMock( PageIdentity::class ) );

		$block = $this->createMock( DatabaseBlock::class );
		$block->method( 'getTargetUserIdentity' )
			->willReturn( $recipient );

		$this->commonAssertNotifyCall( $recipient, $performer, 'user-blocked' );

		$this->getHooks()->onBlockIpComplete(
			$block,
			$performer,
			$priorBlockSet ? $this->createMock( DatabaseBlock::class ) : null
		);
	}

	public static function provideBlockIpCompleteWhenNotificationCreated(): array {
		return [
			'Prior block is set' => [ true ],
			'Prior block is not set' => [ false ],
		];
	}

	private function commonAssertNotifyCall( User $recipient, UserIdentity $performer, string $expectedType ): void {
		$notificationService = $this->createMock( NotificationService::class );
		$notificationService->expects( $this->once() )
			->method( 'notify' )
			->willReturnCallback( function (
				WikiNotification $actualNotification,
				RecipientSet $actualRecipientSet
			) use ( $recipient, $performer, $expectedType ): void {
				$this->assertSame( $recipient->getUserPage(), $actualNotification->getTitle() );
				$this->assertSame( $performer, $actualNotification->getAgent() );
				$this->assertSame( $expectedType, $actualNotification->getType() );
				$this->assertArrayEquals( [ $recipient ], $actualRecipientSet->getRecipients() );
			} );
		$this->setService( 'NotificationService', $notificationService );
	}

	public function getHooks(): EchoHooks {
		$services = $this->getServiceContainer();
		return new EchoHooks(
			$services->getAuthManager(),
			$services->getCentralIdLookup(),
			$services->getMainConfig(),
			Services::wrap( $services )->getAttributeManager(),
			$services->getHookContainer(),
			$services->getContentLanguage(),
			$services->getLinkRenderer(),
			$services->getNamespaceInfo(),
			$services->getNotificationService(),
			$services->getPermissionManager(),
			$services->getStatsFactory(),
			$services->getTalkPageNotificationManager(),
			$services->getUserEditTracker(),
			$services->getUserFactory(),
			$services->getUserOptionsManager(),
			null,
		);
	}
}
