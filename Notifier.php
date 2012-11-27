<?php

// @todo Fill in
class EchoNotifier {
	/**
	 * Record an EchoNotification for an EchoEvent.
	 *
	 * @param $user User to notify.
	 * @param $event EchoEvent to notify about.
	 */
	public static function notifyWithNotification( $user, $event ) {
		EchoNotification::create( array( 'user' => $user, 'event' => $event ) );
		EchoNotificationController::resetNotificationCount( $user );
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

		return true;
	}
}
