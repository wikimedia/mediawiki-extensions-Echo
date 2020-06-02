<?php

namespace EchoPush;

use CentralIdLookup;
use EchoEvent;
use JobQueueGroup;
use User;

class PushNotifier {

	/**
	 * Submits a notification derived from an Echo event to each push notifications service
	 * subscription found for a user, via a configured service handler implementation
	 * @param User $user
	 * @param EchoEvent $event
	 */
	public static function notifyWithPush( User $user, EchoEvent $event ): void {
		JobQueueGroup::singleton()->push( self::createJobForUser( $user ) );
	}

	/**
	 * @param User $user
	 * @return NotificationRequestJob
	 */
	private static function createJobForUser( User $user ): NotificationRequestJob {
		$centralId = CentralIdLookup::factory()->centralIdFromLocalUser( $user );
		$params = [ 'centralId' => $centralId ];
		return new NotificationRequestJob( 'EchoPushNotificationRequest', $params );
	}

}
