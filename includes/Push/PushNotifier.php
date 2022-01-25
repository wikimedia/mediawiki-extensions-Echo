<?php

namespace EchoPush;

use EchoEvent;
use EchoServices;
use MediaWiki\MediaWikiServices;
use User;

class PushNotifier {

	/**
	 * Submits a notification derived from an Echo event to each push notifications service
	 * subscription found for a user, via a configured service handler implementation
	 * @param User $user
	 * @param EchoEvent $event
	 */
	public static function notifyWithPush( User $user, EchoEvent $event ): void {
		$attributeManager = EchoServices::getInstance()->getAttributeManager();
		$userEnabledEvents = $attributeManager->getUserEnabledEvents( $user, 'push' );
		if ( in_array( $event->getType(), $userEnabledEvents ) ) {
			MediaWikiServices::getInstance()->getJobQueueGroup()->push( self::createJob( $user, $event ) );
		}
	}

	/**
	 * @param User $user
	 * @param EchoEvent|null $event
	 * @return NotificationRequestJob
	 */
	private static function createJob( User $user, EchoEvent $event = null ): NotificationRequestJob {
		$centralId = Utils::getPushUserId( $user );
		$params = [ 'centralId' => $centralId ];
		// below params are only needed for debug logging (T255068)
		if ( $event !== null ) {
			$params['eventId'] = $event->getId();
			$params['eventType'] = $event->getType();
			if ( $event->getAgent() !== null ) {
				$params['agent'] = $event->getAgent()->getId();
			}
		}
		return new NotificationRequestJob( 'EchoPushNotificationRequest', $params );
	}

}
