<?php

namespace MediaWiki\Extension\Notifications\Push;

use MediaWiki\Extension\Notifications\Services;
use MediaWiki\JobQueue\Job;

class NotificationRequestJob extends Job {

	/**
	 * @return bool success
	 */
	public function run(): bool {
		$centralId = $this->params['centralId'];
		$echoServices = Services::getInstance();
		$subscriptionManager = $echoServices->getPushSubscriptionManager();
		$subscriptions = $subscriptionManager->getSubscriptionsForUser( $centralId );
		if ( count( $subscriptions ) === 0 ) {
			return true;
		}
		$serviceClient = $echoServices->getPushNotificationServiceClient();
		$serviceClient->sendCheckEchoRequests( $subscriptions );
		return true;
	}

}
