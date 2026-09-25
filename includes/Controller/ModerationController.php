<?php

namespace MediaWiki\Extension\Notifications\Controller;

use MediaWiki\Extension\Notifications\Services;

/**
 * This class represents the controller for moderating notifications
 *
 * @deprecated since 1.47, use EventController instead
 */
class ModerationController {

	/**
	 * Moderate or unmoderate events
	 *
	 * @deprecated since 1.47, use {@link EventController::toggleHiddenState()} instead
	 * @param int[] $eventIds
	 * @param bool $moderate Whether to moderate or unmoderate the events
	 */
	public static function moderate( array $eventIds, $moderate ) {
		Services::getInstance()->getEventController()->toggleHiddenState( $eventIds, (bool)$moderate );
	}
}
