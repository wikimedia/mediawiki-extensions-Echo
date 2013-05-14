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

		if ( !empty( $wgEchoConfig['eventlogging'][$schema]['enabled'] ) ) {
			efLogServerSideEvent( $schema, $wgEchoConfig['eventlogging'][$schema]['revision'], $data );
		}
	}

	/**
	 * Functions for logging the event for Schema:Echo
	 * @param $user User being notified.
	 * @param $event EchoEvent to log detail about.
	 * @param $deliveryMethod string containing either 'web' or 'email'
	 */
	public static function logSchemaEcho( $user, $event, $deliveryMethod ) {
		global $wgEchoConfig, $wgEchoNotifications;
		if ( !$wgEchoConfig['eventlogging']['Echo']['enabled'] ) {
			// Only attempt event logging if Echo schema is enabled
			return;
		}

		$agent = $event->getAgent();
		// Typically an event should always have an agent, but agent could be
		// null if the data is corrupted
		if ( $agent ) {
			$sender = $agent->isAnon() ? $agent->getName() : $agent->getId();
		} else {
			$sender = -1;
		}

		if ( isset( $wgEchoNotifications[$event->getType()]['group'] ) ) {
			$group = $wgEchoNotifications[$event->getType()]['group'];
		} else {
			$group = 'neutral';
		}
		$data = array (
			'version' => $wgEchoConfig['version'],
			'eventId' => $event->getId(),
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
		if( $deliveryMethod == 'email' ) {
			$data['deliveryMethod'] = 'email';
		} else {
			// whitelist valid delivery methods so it is always valid
			$data['deliveryMethod'] = 'web';
		}

		self::actuallyLogTheEvent( 'Echo', $data );
	}

	/**
	 * Functions for logging the event for Schema:EchoEmail
	 * @param $user User
	 * @param $emailDeliveryMode string
	 */
	public static function logSchemaEchoMail( $user, $emailDeliveryMode = 'single' ) {
		global $wgEchoConfig;

		if ( !$wgEchoConfig['eventlogging']['EchoMail']['enabled'] ) {
			// Only attempt event logging if EchoMail schema is enabled
			return;
		}

		$data = array (
			'version' => $wgEchoConfig['version'],
			'recipientUserId' => $user->getId(),
			'emailDeliveryMode' => $emailDeliveryMode
		);

		self::actuallyLogTheEvent( 'EchoMail', $data );
	}

}
