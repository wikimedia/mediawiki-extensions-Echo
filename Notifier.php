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

		EchoNotification::create( array( 'user' => $user, 'event' => $event ) );

		// Attempt event logging if Echo schema is enabled
		if ( $wgEchoConfig['eventlogging']['Echo']['enabled'] ) {
			$agent = $event->getAgent();
			// Typically an event should always have an agent, but agent could be
			// null if the data is corrupted
			if ( $agent ) {
				$sender = $agent->isAnon() ? $agent->getName() : $agent->getId();
			} else {
				$sender = 0;
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
			EchoHooks::logEvent( 'Echo', $data );
		}

		EchoNotificationController::resetNotificationCount( $user, DB_MASTER );
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
		// See if the user wants to receive emails for this category of event
		if ( $user->getOption( 'echo-subscriptions-email-' . $event->getCategory() ) ) {
			global $wgEchoEnableEmailBatch, $wgPasswordSender, $wgPasswordSenderName;
	
			// batched email notification
			if ( $wgEchoEnableEmailBatch && $user->getOption( 'echo-email-frequency' ) > 0 ) {
				$priority = EchoNotificationController::getNotificationPriority( $event->getType() );
				MWEchoEmailBatch::addToQueue( $user->getId(), $event->getId(), $priority );
				return true;
			}
			// no email notification
			if ( $user->getOption( 'echo-email-frequency' ) < 0 ) {
				return false;
			}
	
			// instant email notification
			$adminAddress = new MailAddress( $wgPasswordSender, $wgPasswordSenderName );
			$address = new MailAddress( $user );
			$email = EchoNotificationController::formatNotification( $event, $user, 'email' );
			$subject = $email['subject'];
			$body = $email['body'];
	
			UserMailer::send( $address, $adminAddress, $subject, $body );
		}

		return true;
	}
}
