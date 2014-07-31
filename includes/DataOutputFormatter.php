<?php

/**
 * Utility class that formats a notification in the format specified
 */
class EchoDataOutputFormatter {

	/**
	 * Format a notification for a user in the format specified
	 *
	 * @param string|bool specifify output format, false to not format any notifications
	 * @param User|null the target user viewing the notification
	 * @return array
	 */
	public static function formatOutput( EchoNotification $notification, $format = false, User $user = null ) {
		$event = $notification->getEvent();
		// Default to notification user if user is not specified
		if ( !$user ) {
			$user = $notification->getUser();
		}

		if ( $notification->getBundleBase() && $notification->getBundleDisplayHash() ) {
			$event->setBundleHash( $notification->getBundleDisplayHash() );
		}

		$timestampMw = self::getUserLocalTime( $user, $notification->getTimestamp() );

		// Start creating date section header
		$now = wfTimestamp();
		$dateFormat = substr( $timestampMw, 0, 8 );
		if ( substr( self::getUserLocalTime( $user, $now ), 0, 8 ) === $dateFormat ) {
			// 'Today'
			$date = wfMessage( 'echo-date-today' )->escaped();
		} elseif ( substr( self::getUserLocalTime( $user, $now - 86400 ), 0, 8 ) === $dateFormat ) {
			// 'Yesterday'
			$date = wfMessage( 'echo-date-yesterday' )->escaped();
		} else {
			// 'May 10' or '10 May' (depending on user's date format preference)
			$lang = RequestContext::getMain()->getLanguage();
			$dateFormat = $lang->getDateFormatString( 'pretty', $user->getDatePreference() ?: 'default' );
			$date = $lang->sprintfDate( $dateFormat, $timestampMw );
		}
		// End creating date section header

		$output = array(
			'id' => $event->getId(),
			'type' => $event->getType(),
			'category' => $event->getCategory(),
			'timestamp' => array(
				// UTC timestamp in UNIX format used for loading more notification
				'utcunix' => wfTimestamp( TS_UNIX, $notification->getTimestamp() ),
				'unix' => self::getUserLocalTime( $user, $notification->getTimestamp(), TS_UNIX ),
				'mw' => $timestampMw,
				'date' => $date
			),
		);

		if ( $event->getVariant() ) {
			$output['variant'] = $event->getVariant();
		}

		if ( $event->getTitle() ) {
			$output['title'] = array(
				'full' => $event->getTitle()->getPrefixedText(),
				'namespace' => $event->getTitle()->getNSText(),
				'namespace-key' => $event->getTitle()->getNamespace(),
				'text' => $event->getTitle()->getText(),
			);
		}

		if ( $event->getAgent() ) {
			if ( $event->userCan( Revision::DELETED_USER, $user ) ) {
				$output['agent'] = array(
					'id' => $event->getAgent()->getId(),
					'name' => $event->getAgent()->getName(),
				);
			} else {
				$output['agent'] = array( 'userhidden' => '' );
			}
		}

		if ( $notification->getReadTimestamp() ) {
			$output['read'] = $notification->getReadTimestamp();
		}

		if ( $format ) {
			$output['*'] = EchoNotificationController::formatNotification( $event, $user, $format );
		}

		return $output;
	}

	/**
	 * Helper function for converting UTC timezone to a user's timezone
	 *
	 * @param User
	 * @param string
	 * @param int output format
	 *
	 * @return string
	 */
	public static function getUserLocalTime( User $user, $ts, $format = TS_MW ) {
		$timestamp = new MWTimestamp( $ts );
		$timestamp->offsetForUser( $user );
		return $timestamp->getTimestamp( $format );
	}

}
