<?php

namespace MediaWiki\Extension\Notifications\Notifications;

use MediaWiki\Block\DatabaseBlock;
use MediaWiki\Notification\Types\WikiNotification;
use MediaWiki\User\User;
use MediaWiki\User\UserIdentity;

class UserBlockNotification extends WikiNotification {

	public static function newForBlock(
		User $recipient,
		UserIdentity $performer,
		DatabaseBlock $block,
		bool $wasReblock
	): self {
		return new self(
			'user-blocked',
			$recipient->getUserPage(),
			$performer,
			[
				'block-id' => $block->getId(),
				'target-user-id' => $recipient->getId(),
				'target-user-name' => $recipient->getName(),
				'expiry' => $block->getExpiry(),
				'indefinite' => $block->isIndefinite(),
				'sitewide' => $block->isSitewide(),
				'was-reblock' => $wasReblock,
			]
		);
	}

	public static function newForUnblock(
		User $recipient,
		UserIdentity $performer
	): self {
		return new self(
			'user-unblocked',
			$recipient->getUserPage(),
			$performer,
			[
				'target-user-id' => $recipient->getId(),
				'target-user-name' => $recipient->getName(),
			]
		);
	}
}
