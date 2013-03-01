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
		global $wgEchoConfig, $wgEchoEventDetails;

		$notif = EchoNotification::create( array( 'user' => $user, 'event' => $event ) );

		// Attempt event logging if Echo schema is enabled
		if ( $wgEchoConfig['eventlogging']['Echo']['enabled'] ) {
			$event  = $notif->getEvent();
			$sender = $event->getAgent();
			$user   = $notif->getUser();

			if ( isset( $wgEchoEventDetails[$event->getType()]['group'] ) ) {
				$group = $wgEchoEventDetails[$event->getType()]['group'];
			} else {
				$group = 'neutral';
			}

			$data = array (
				'version' => $wgEchoConfig['version'],
				'eventId' => $event->getId(),
				'notificationType' => $event->getType(),
				'notificationGroup' => $group,
				'sender' => (string)( $sender->isAnon() ? $sender->getName() : $sender->getId() ),
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
		// See if the user wants to receive emails for this type of event
		if ( $user->getOption( 'echo-email-notifications' . $event->getType() ) ) {
			global $wgEchoEnableEmailBatch, $wgEchoEventDetails, $wgPasswordSender, $wgPasswordSenderName;
	
			// batched email notification
			if ( $wgEchoEnableEmailBatch && $user->getOption( 'echo-email-frequency' ) > 0 ) {
				// default priority is 10
				$priority = 10;
				if ( isset( $wgEchoEventDetails[$event->getType()]['priority'] ) ) {
					$priority = $wgEchoEventDetails[$event->getType()]['priority'];
				}
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
