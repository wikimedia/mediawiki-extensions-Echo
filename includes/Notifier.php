<?php

// @todo Fill in
class EchoNotifier {
	/**
	 * Record an EchoNotification for an EchoEvent
	 * Currently used for web-based notifications.
	 *
	 * @param User $user User to notify.
	 * @param EchoEvent $event EchoEvent to notify about.
	 */
	public static function notifyWithNotification( $user, $event ) {
		// Only create the notification if the user wants to receive that type
		// of notification and they are eligible to receive it. See bug 47664.
		$attributeManager = EchoAttributeManager::newFromGlobalVars();
		$userWebNotifications = $attributeManager->getUserEnabledEvents( $user, 'web' );
		if ( !in_array( $event->getType(), $userWebNotifications ) ) {
			return;
		}

		EchoNotification::create( [ 'user' => $user, 'event' => $event ] );

		MWEchoEventLogging::logSchemaEcho( $user, $event, 'web' );
	}

	/**
	 * Send a Notification to a user by email
	 *
	 * @param User $user User to notify.
	 * @param EchoEvent $event EchoEvent to notify about.
	 * @return bool
	 */
	public static function notifyWithEmail( $user, $event ) {
		global $wgEnableEmail;

		if ( !$wgEnableEmail ) {
			return false;
		}
		// No valid email address or email notification
		if ( !$user->isEmailConfirmed() || $user->getOption( 'echo-email-frequency' ) < 0 ) {
			return false;
		}

		// Final check on whether to send email for this user & event
		if ( !Hooks::run( 'EchoAbortEmailNotification', [ $user, $event ] ) ) {
			return false;
		}

		$attributeManager = EchoAttributeManager::newFromGlobalVars();
		$userEmailNotifications = $attributeManager->getUserEnabledEvents( $user, 'email' );
		// See if the user wants to receive emails for this category or the user is eligible to receive this email
		if ( in_array( $event->getType(), $userEmailNotifications ) ) {
			global $wgEchoEnableEmailBatch, $wgEchoNotifications, $wgNotificationSender, $wgNotificationReplyName;

			$priority = $attributeManager->getNotificationPriority( $event->getType() );

			$bundleString = $bundleHash = '';

			// We should have bundling for email digest as long as either web or email bundling is on, for example, talk page
			// email bundling is off, but if a user decides to receive email digest, we should bundle those messages
			if ( !empty( $wgEchoNotifications[$event->getType()]['bundle']['web'] ) || !empty( $wgEchoNotifications[$event->getType()]['bundle']['email'] ) ) {
				Hooks::run( 'EchoGetBundleRules', [ $event, &$bundleString ] );
			}
			if ( $bundleString ) {
				$bundleHash = md5( $bundleString );
			}

			MWEchoEventLogging::logSchemaEcho( $user, $event, 'email' );

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

			// instant email notification
			$toAddress = MailAddress::newFromUser( $user );
			$fromAddress = new MailAddress( $wgNotificationSender, EchoHooks::getNotificationSenderName() );
			$replyAddress = new MailAddress( $wgNotificationSender, $wgNotificationReplyName );
			// Since we are sending a single email, should set the bundle hash to null
			// if it is set with a value from somewhere else
			$event->setBundleHash( null );
			$email = self::generateEmail( $event, $user );
			if ( !$email ) {
				return false;
			}
			$subject = $email['subject'];
			$body = $email['body'];
			$options = [ 'replyTo' => $replyAddress ];

			UserMailer::send( $toAddress, $fromAddress, $subject, $body, $options );
			MWEchoEventLogging::logSchemaEchoMail( $user, 'single' );
		}

		return true;
	}

	/**
	 * @param EchoEvent $event
	 * @param User $user
	 * @return bool|array An array of 'subject' and 'body', or false if things went wrong
	 */
	private static function generateEmail( EchoEvent $event, User $user ) {
		$emailFormat = MWEchoNotifUser::newFromUser( $user )->getEmailFormat();
		$lang = wfGetLangObj( $user->getOption( 'language' ) );
		$formatter = new EchoPlainTextEmailFormatter( $user, $lang );
		$content = $formatter->format( $event );
		if ( !$content ) {
			return false;
		}

		if ( $emailFormat === EchoEmailFormat::HTML ) {
			$htmlEmailFormatter = new EchoHtmlEmailFormatter( $user, $lang );
			$htmlContent = $htmlEmailFormatter->format( $event );
			$multipartBody = [
				'text' => $content['body'],
				'html' => $htmlContent['body']
			];
			$content['body'] = $multipartBody;
		}

		return $content;
	}
}
