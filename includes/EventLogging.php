<?php

use MediaWiki\MediaWikiServices;
use MediaWiki\User\UserIdentity;

/**
 * Static class for handling all kinds of event logging
 *
 * TODO: consider making this a service with dependencies injected
 */
class MWEchoEventLogging {

	/** @var int[] */
	private static $revisionIds = [
		'Echo' => 7731316,
		'EchoMail' => 5467650,
		// Keep in sync with client-side revision
		// in extension.json
		'EchoInteraction' => 15823738
	];

	/**
	 * This is the only function that interacts with EventLogging
	 *
	 * Adds common fields, and logs if logging is enabled for the given $schema.
	 *
	 * @param string $schema
	 * @param array $data
	 */
	protected static function logEvent( $schema, array $data ) {
		global $wgEchoEventLoggingSchemas, $wgEchoEventLoggingVersion;

		$schemaConfig = $wgEchoEventLoggingSchemas[$schema];
		if ( !ExtensionRegistry::getInstance()->isLoaded( 'EventLogging' )
			|| !$schemaConfig['enabled']
		) {
			// If logging for this schema is disabled, it's a no-op.
			return;
		}

		$revision = self::$revisionIds[$schema];
		$data['version'] = $wgEchoEventLoggingVersion;

		EventLogging::logEvent( $schema, $revision, $data );
	}

	/**
	 * Function for logging the event for Schema:Echo
	 * @param UserIdentity $userIdentity User being notified.
	 * @param EchoEvent $event Event to log detail about.
	 * @param string $deliveryMethod 'web' or 'email'
	 */
	public static function logSchemaEcho(
		UserIdentity $userIdentity,
		EchoEvent $event,
		$deliveryMethod
	) {
		global $wgEchoNotifications;

		// Notifications under system category should have -1 as sender id
		if ( $event->getCategory() === 'system' ) {
			$sender = -1;
		} else {
			$agent = $event->getAgent();
			if ( $agent ) {
				$sender = $agent->getId() ?: $agent->getName();
			} else {
				$sender = -1;
			}
		}

		if ( isset( $wgEchoNotifications[$event->getType()]['group'] ) ) {
			$group = $wgEchoNotifications[$event->getType()]['group'];
		} else {
			$group = 'neutral';
		}
		$userEditCount = (int)MediaWikiServices::getInstance()
			->getUserEditTracker()
			->getUserEditCount( $userIdentity );
		$data = [
			'eventId' => (int)$event->getId(),
			'notificationType' => $event->getType(),
			'notificationGroup' => $group,
			'sender' => (string)$sender,
			'recipientUserId' => $userIdentity->getId(),
			'recipientEditCount' => $userEditCount,
		];
		// Add the source if it exists. (This is mostly for the Thanks extension.)
		$extra = $event->getExtra();
		if ( isset( $extra['source'] ) ) {
			$data['eventSource'] = (string)$extra['source'];
		}
		if ( $deliveryMethod === 'email' ) {
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

		self::logEvent( 'Echo', $data );
	}

	/**
	 * Function for logging the event for Schema:EchoEmail
	 * @param UserIdentity $userIdentity
	 * @param string $emailDeliveryMode 'single' (default), 'daily_digest', or 'weekly_digest'
	 */
	public static function logSchemaEchoMail( UserIdentity $userIdentity, $emailDeliveryMode = 'single' ) {
		$data = [
			'recipientUserId' => $userIdentity->getId(),
			'emailDeliveryMode' => $emailDeliveryMode
		];

		self::logEvent( 'EchoMail', $data );
	}

	/**
	 * @param UserIdentity $userIdentity
	 * @param string $skinName
	 */
	public static function logSpecialPageVisit( UserIdentity $userIdentity, $skinName ) {
		$userEditCount = (int)MediaWikiServices::getInstance()
			->getUserEditTracker()
			->getUserEditCount( $userIdentity );
		self::logEvent(
			'EchoInteraction',
			[
				'context' => 'archive',
				'action' => 'special-page-visit',
				'userId' => $userIdentity->getId(),
				'editCount' => $userEditCount,
				'notifWiki' => wfWikiID(),
				// Hack: Figure out if we are in the mobile skin
				'mobile' => $skinName === 'minerva',
			]
		);
	}

}
