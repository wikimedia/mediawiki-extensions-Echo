<?php

/**
 * Static class for handling all kinds of event logging
 */
class MWEchoEventLogging {

	/**
	 * This is the only function that interacts with EventLogging
	 * @param $schema string
	 * @param $data array
	 */
	public static function actuallyLogTheEvent( $schema, $data ) {
		global $wgEchoConfig;

		EventLogging::logEvent( $schema, $wgEchoConfig['eventlogging'][$schema]['revision'], $data );
	}

	/**
	 * Function for logging the event for Schema:Echo
	 * @param $user User being notified.
	 * @param $event EchoEvent to log detail about.
	 * @param $deliveryMethod string containing either 'web' or 'email'
	 */
	public static function logSchemaEcho( User $user, EchoEvent $event, $deliveryMethod ) {
		global $wgEchoConfig, $wgEchoNotifications;
		if ( !$wgEchoConfig['eventlogging']['Echo']['enabled'] ) {
			// Only attempt event logging if Echo schema is enabled
			return;
		}

		// Notifications under system category should have -1 as sender id
		if ( $event->getCategory() === 'system' ) {
			$sender = -1;
		} else {
			$agent = $event->getAgent();
			if ( $agent ) {
				$sender = $agent->isAnon() ? $agent->getName() : $agent->getId();
			} else {
				$sender = -1;
			}
		}

		if ( isset( $wgEchoNotifications[$event->getType()]['group'] ) ) {
			$group = $wgEchoNotifications[$event->getType()]['group'];
		} else {
			$group = 'neutral';
		}
		$data = array(
			'version' => $wgEchoConfig['version'],
			'eventId' => (int)$event->getId(),
			'notificationType' => $event->getType(),
			'notificationGroup' => $group,
			'sender' => (string)$sender,
			'recipientUserId' => $user->getId(),
			'recipientEditCount' => (int)$user->getEditCount()
		);
		// Add the source if it exists. (This is mostly for the Thanks extension.)
		$extra = $event->getExtra();
		if ( isset( $extra['source'] ) ) {
			$data['eventSource'] = (string)$extra['source'];
		}
		if ( $deliveryMethod == 'email' ) {
			$data['deliveryMethod'] = 'email';
		} else {
			// whitelist valid delivery methods so it is always valid
			$data['deliveryMethod'] = 'web';
		}
		// Add revision ID if it exists
		$rev = $event->getRevision();
		if ( $rev ) {
			$data['revisionId'] = $rev->getId();
		}

		self::actuallyLogTheEvent( 'Echo', $data );
	}

	/**
	 * Function for logging the event for Schema:EchoEmail
	 * @param $user User
	 * @param $emailDeliveryMode string
	 */
	public static function logSchemaEchoMail( User $user, $emailDeliveryMode = 'single' ) {
		global $wgEchoConfig;

		if ( !$wgEchoConfig['eventlogging']['EchoMail']['enabled'] ) {
			// Only attempt event logging if EchoMail schema is enabled
			return;
		}

		$data = array(
			'version' => $wgEchoConfig['version'],
			'recipientUserId' => $user->getId(),
			'emailDeliveryMode' => $emailDeliveryMode
		);

		self::actuallyLogTheEvent( 'EchoMail', $data );
	}

}
