<?php

namespace MediaWiki\Extension\Notifications\Test\Unit\Notifications;

use MediaWiki\Block\DatabaseBlock;
use MediaWiki\Extension\Notifications\Notifications\UserBlockNotification;
use MediaWiki\Page\PageIdentity;
use MediaWiki\User\User;
use MediaWiki\User\UserIdentity;
use MediaWikiUnitTestCase;

/**
 * @covers \MediaWiki\Extension\Notifications\Notifications\UserBlockNotification
 */
class UserBlockNotificationTest extends MediaWikiUnitTestCase {

	public function testNewForBlock(): void {
		$mockRecipient = $this->getMockRecipient();

		$mockPerformer = $this->createMock( UserIdentity::class );

		$mockBlock = $this->createMock( DatabaseBlock::class );
		$mockBlock->method( 'getId' )
			->willReturn( 123 );
		$mockBlock->method( 'getExpiry' )
			->willReturn( '20250605040302' );
		$mockBlock->method( 'isSitewide' )
			->willReturn( true );
		$mockBlock->method( 'isIndefinite' )
			->willReturn( true );

		$actualInstance = UserBlockNotification::newForBlock( $mockRecipient, $mockPerformer, $mockBlock, true );
		$this->assertNotificationHasExpectedProperties(
			$actualInstance,
			$mockRecipient,
			$mockPerformer,
			'user-blocked',
			[
				'block-id' => 123,
				'expiry' => '20250605040302',
				'indefinite' => true,
				'sitewide' => true,
				'was-reblock' => true,
			]
		);
	}

	public function testNewForUnblock(): void {
		$mockRecipient = $this->getMockRecipient();
		$mockPerformer = $this->createMock( UserIdentity::class );

		$actualInstance = UserBlockNotification::newForUnblock( $mockRecipient, $mockPerformer );
		$this->assertNotificationHasExpectedProperties(
			$actualInstance,
			$mockRecipient,
			$mockPerformer,
			'user-unblocked'
		);
	}

	private function getMockRecipient(): User {
		$mockRecipient = $this->createMock( User::class );
		$mockRecipient->method( 'getUserPage' )
			->willReturn( $this->createMock( PageIdentity::class ) );
		$mockRecipient->method( 'getId' )
			->willReturn( 1234 );
		$mockRecipient->method( 'getName' )
			->willReturn( 'Test' );
		return $mockRecipient;
	}

	private function assertNotificationHasExpectedProperties(
		UserBlockNotification $actualInstance,
		User $mockRecipient,
		UserIdentity $mockPerformer,
		string $expectedType,
		array $additionalExpectedProperties = []
	): void {
		$this->assertSame( $mockRecipient->getUserPage(), $actualInstance->getTitle() );
		$this->assertSame( $mockPerformer, $actualInstance->getAgent() );
		$this->assertSame( $expectedType, $actualInstance->getType() );
		$this->assertArrayEquals(
			array_merge( $additionalExpectedProperties, [
				'target-user-id' => $mockRecipient->getId(),
				'target-user-name' => $mockRecipient->getName(),
			] ),
			$actualInstance->getProperties(),
			false,
			true
		);
	}
}
