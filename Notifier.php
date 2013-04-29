<?php

// @todo Fill in
class EchoNotifier {
	/**
	 * Record an EchoNotification for an EchoEvent
	 * Currently used for web-based notifications.
	 *
	 * @param $user User to notify.
	 * @param $event EchoEvent to notify about.
	 */
	public static function notifyWithNotification( $user, $event ) {
		global $wgEchoConfig, $wgEchoNotifications;

		// Only create the notification if the user wants to recieve that type
		// of notification and they are eligible to recieve it. See bug 47664.
		$userWebNotifications = EchoNotificationController::getUserEnabledEvents( $user, 'web' );
		if ( !in_array( $event->getType(), $userWebNotifications ) ) {
			return;
		}

		EchoNotification::create( array( 'user' => $user, 'event' => $event ) );

		self::logEvent( $user, $event, 'web' );

		EchoNotificationController::resetNotificationCount( $user, DB_MASTER );
	}

	/**
	 * Store Event Logging data for web or email notifications
	 *
	 * @param $user User being notified.
	 * @param $event EchoEvent to log detail about.
	 * @param $deliveryMethod string containing either 'web' or 'email'
	 */
	public static function logEvent( $user, $event, $deliveryMethod ) {
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
		EchoHooks::logEvent( 'Echo', $data );
	}

	/**
	 * Send a Notification to a user by email
	 *
	 * @param $user User to notify.
	 * @param $event EchoEvent to notify about.
	 * @return bool
	 */
	public static function notifyWithEmail( $user, $event ) {
		if ( !$user->isEmailConfirmed() ) {
			// No valid email address
			return false;
		}

		// See if the user wants to receive emails for this category
		if ( $user->getOption( 'echo-subscriptions-email-' . $event->getCategory() ) ) {
			global $wgEchoEnableEmailBatch, $wgEchoNotifications, $wgNotificationSender, $wgNotificationSenderName, $wgNotificationReplyName, $wgEchoBundleEmailInterval;

			$priority = EchoNotificationController::getNotificationPriority( $event->getType() );

			$bundleString = $bundleHash = '';

			// We should have bundling for email digest as long as either web or email bundling is on, for example, talk page
			// email bundling is off, but if a user decides to receive email digest, we should bundle those messages
			if ( !empty( $wgEchoNotifications[$event->getType()]['bundle']['web'] ) || !empty( $wgEchoNotifications[$event->getType()]['bundle']['email'] ) ) {
				wfRunHooks( 'EchoGetBundleRules', array( $event, &$bundleString ) );
			}
			if ( $bundleString ) {
				$bundleHash = md5( $bundleString );
			}

			// email digest notification ( weekly or daily )
			if ( $wgEchoEnableEmailBatch && $user->getOption( 'echo-email-frequency' ) > 0 ) {
				// always create a unique event hash for those events don't support bundling
				// this is mainly for group by
				if ( !$bundleHash ) {
					$bundleHash = md5( $event->getType() . '-' . $event->getId() );
				}
				MWEchoEmailBatch::addToQueue( $user->getId(), $event->getId(), $priority, $bundleHash );
				return true;
			}
			// no email notification
			if ( $user->getOption( 'echo-email-frequency' ) < 0 ) {
				return false;
			}

			$addedToQueue = false;

			self::logEvent( $user, $event, 'email' );

			// only send bundle email if email bundling is on
			if ( $wgEchoBundleEmailInterval && $bundleHash && !empty( $wgEchoNotifications[$event->getType()]['bundle']['email'] ) ) {
				$bundler = MWEchoEmailBundler::newFromUserHash( $user, $bundleHash );
				if ( $bundler ) {
					$addedToQueue = $bundler->addToEmailBatch( $event->getId(), $priority );
				}
			}

			// send single notification if the email wasn't added to queue for bundling
			if ( !$addedToQueue ) {
				// instant email notification
				$toAddress = new MailAddress( $user );
				$fromAddress = new MailAddress( $wgNotificationSender, $wgNotificationSenderName );
				$replyAddress = new MailAddress( $wgNotificationSender, $wgNotificationReplyName );
				// Since we are sending a single email, should set the bundle hash to null
				// if it is set with a value from somewhere else
				$event->setBundleHash( null );
				$email = EchoNotificationController::formatNotification( $event, $user, 'email', 'email' );
				$subject = $email['subject'];
				$body = $email['body'];

				UserMailer::send( $toAddress, $fromAddress, $subject, $body, $replyAddress );
			}
		}

		return true;
	}
}
