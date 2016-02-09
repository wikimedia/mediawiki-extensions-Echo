<?php

/**
 * Utility class that formats a notification in the format specified
 */
class EchoDataOutputFormatter {

	/**
	 * @var array type => class
	 */
	protected static $formatters = array(
		'flyout' => 'EchoFlyoutFormatter',
		'model' => 'EchoModelFormatter',
		'special' => 'SpecialNotificationsFormatter',
		'html' => 'SpecialNotificationsFormatter',
	);

	/**
	 * Format a notification for a user in the format specified
	 *
	 * @param EchoNotification $notification
	 * @param string|bool $format specifify output format, false to not format any notifications
	 * @param User $user the target user viewing the notification
	 * @param Language $lang Language to format the notification in
	 * @return array|bool false if it could not be formatted
	 */
	public static function formatOutput( EchoNotification $notification, $format = false, User $user, Language $lang ) {
		$event = $notification->getEvent();
		$timestamp = $notification->getTimestamp();
		$utcTimestampUnix = wfTimestamp( TS_UNIX, $timestamp );
		$utcTimestampMW = wfTimestamp( TS_MW, $timestamp );

		if ( $notification->getBundleBase() && $notification->getBundleDisplayHash() ) {
			$event->setBundleHash( $notification->getBundleDisplayHash() );
		}

		$timestampMw = self::getUserLocalTime( $user, $timestamp );

		// Start creating date section header
		$now = wfTimestamp();
		$dateFormat = substr( $timestampMw, 0, 8 );
		$timeDiff = $now - $utcTimestampUnix;
		// Most notifications would be more than two days ago, check this
		// first instead of checking 'today' then 'yesterday'
		if ( $timeDiff > 172800 ) {
			$date = self::getDateHeader( $user, $timestampMw );
		// 'Today'
		} elseif ( substr( self::getUserLocalTime( $user, $now ), 0, 8 ) === $dateFormat ) {
			$date = wfMessage( 'echo-date-today' )->escaped();
		// 'Yesterday'
		} elseif ( substr( self::getUserLocalTime( $user, $now - 86400 ), 0, 8 ) === $dateFormat ) {
			$date = wfMessage( 'echo-date-yesterday' )->escaped();
		} else {
			$date = self::getDateHeader( $user, $timestampMw );
		}
		// End creating date section header

		$output = array(
			'id' => $event->getId(),
			'type' => $event->getType(),
			'category' => $event->getCategory(),
			'timestamp' => array(
				// UTC timestamp in UNIX format used for loading more notification
				'utcunix' => $utcTimestampUnix,
				'unix' => self::getUserLocalTime( $user, $timestamp, TS_UNIX ),
				'utcmw' => $utcTimestampMW,
				'mw' => $timestampMw,
				'date' => $date
			),
		);

		if ( $event->getVariant() ) {
			$output['variant'] = $event->getVariant();
		}

		$title = $event->getTitle();
		if ( $title ) {
			$output['title'] = array(
				'full' => $title->getPrefixedText(),
				'namespace' => $title->getNSText(),
				'namespace-key' => $title->getNamespace(),
				'text' => $title->getText(),
			);
		}

		$agent = $event->getAgent();
		if ( $agent ) {
			if ( $event->userCan( Revision::DELETED_USER, $user ) ) {
				$output['agent'] = array(
					'id' => $agent->getId(),
					'name' => $agent->getName(),
				);
			} else {
				$output['agent'] = array( 'userhidden' => '' );
			}
		}

		if ( $event->getRevision() ) {
			$output['revid'] = $event->getRevision()->getId();
		}

		if ( $notification->getReadTimestamp() ) {
			$output['read'] = $notification->getReadTimestamp();
		}

		// This is only meant for unread notifications, if a notification has a target
		// page, then it shouldn't be auto marked as read unless the user visits
		// the target page or a user marks it as read manually ( coming soon )
		$output['targetpages'] = array();
		if ( $notification->getTargetPages() ) {
			foreach ( $notification->getTargetPages() as $targetPage ) {
				$output['targetpages'][] = $targetPage->getPageId();
			}
		}

		if ( $format ) {
			$formatted = self::formatNotification( $event, $user, $format, $lang );
			if ( $formatted === false ) {
				// Can't display it, so mark it as read
				EchoDeferredMarkAsReadUpdate::add( $event, $user );
				return false;
			}
			$output['*'] = $formatted;
		}

		return $output;
	}

	/**
	 * @param EchoEvent $event
	 * @param User $user
	 * @param $format
	 * @param Language $lang
	 * @return string|bool false if it could not be formatted
	 */
	protected static function formatNotification( EchoEvent $event, User $user, $format, $lang ) {
		if ( isset( self::$formatters[$format] )
			&& EchoEventPresentationModel::supportsPresentationModel( $event->getType() )
		) {
			/** @var EchoEventFormatter $formatter */
			$formatter = new self::$formatters[$format]( $user, $lang );
			return $formatter->format( $event );
		} else {
			// Legacy b/c
			return EchoNotificationController::formatNotification( $event, $user, $format );
		}
	}

	/**
	 * Get the date header in user's format, 'May 10' or '10 May', depending
	 * on user's date format preference
	 * @param User $user
	 * @param string $timestampMw
	 * @return string
	 */
	protected static function getDateHeader( User $user, $timestampMw ) {
		$lang = RequestContext::getMain()->getLanguage();
		$dateFormat = $lang->getDateFormatString( 'pretty', $user->getDatePreference() ?: 'default' );

		return $lang->sprintfDate( $dateFormat, $timestampMw );
	}

	/**
	 * Helper function for converting UTC timezone to a user's timezone
	 *
	 * @param User
	 * @param string
	 * @param int $format output format
	 *
	 * @return string
	 */
	public static function getUserLocalTime( User $user, $ts, $format = TS_MW ) {
		$timestamp = new MWTimestamp( $ts );
		$timestamp->offsetForUser( $user );

		return $timestamp->getTimestamp( $format );
	}

}
