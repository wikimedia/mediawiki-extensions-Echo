<?php
/**
 * This class represents the controller for notifications and includes functions
 * for dealing with notification categories.
 */
class EchoNotificationController {
	static protected $blacklist;
	static protected $userWhitelist;

	/**
	 * Format the notification count with Language::formatNum().  In addition, for large count,
	 * return abbreviated version, e.g. 99+
	 * @param $count int
	 * @return string - formatted number
	 */
	public static function formatNotificationCount( $count ) {
		global $wgLang, $wgEchoMaxNotificationCount;

		if ( $count > $wgEchoMaxNotificationCount ) {
			$count = wfMessage(
				'echo-notification-count',
				$wgLang->formatNum( $wgEchoMaxNotificationCount )
			)->escaped();
		} else {
			$count = $wgLang->formatNum( $count );
		}

		return $count;
	}

	/**
	 * Processes notifications for a newly-created EchoEvent
	 *
	 * @param $event EchoEvent to do notifications for
	 * @param $defer bool Defer to job queue
	 */
	public static function notify( $event, $defer = true ) {
		if ( $defer ) {
			// defer job insertion till end of request when all primary db transactions
			// have been committed
			DeferredUpdates::addCallableUpdate(
				function() use ( $event ) {
					global $wgEchoCluster;
					$params = array( 'event' => $event );
					if ( wfGetLB()->getServerCount() > 1 ) {
						$params['mainDbMasterPos'] = wfGetLB()->getMasterPos();
					}
					if ( $wgEchoCluster ) {
						$lb = wfGetLBFactory()->getExternalLB( $wgEchoCluster );
						if ( $lb->getServerCount() > 1 ) {
							$params['echoDbMasterPos'] = $lb->getMasterPos();
						}
					}

					$title = $event->getTitle() ? $event->getTitle() : Title::newMainPage();
					$job = new EchoNotificationJob( $title, $params );
					JobQueueGroup::singleton()->push( $job );
				}
			);
			return;
		}

		// Check if the event object has valid event type.  Events with invalid
		// event types left in the job queue should not be processed
		if ( !$event->isEnabledEvent() ) {
			return;
		}

		// Only send web notification for welcome event
		if ( $event->getType() == 'welcome' ) {
			self::doNotification( $event, $event->getAgent(), 'web' );
		} else {
			// Get the notification types for this event, eg, web/email
			global $wgEchoDefaultNotificationTypes;
			$notifyTypes = $wgEchoDefaultNotificationTypes['all'];
			if ( isset( $wgEchoDefaultNotificationTypes[$event->getType()] ) ) {
				$notifyTypes = array_merge( $notifyTypes, $wgEchoDefaultNotificationTypes[$event->getType()] );
			}
			$notifyTypes = array_keys( array_filter( $notifyTypes ) );

			$users = self::getUsersToNotifyForEvent( $event );

			$blacklisted = self::isBlacklisted( $event );
			foreach ( $users as $user ) {
				// Notification should not be sent to anonymous user
				if ( $user->isAnon() ) {
					continue;
				}
				if ( $blacklisted && !self::isWhitelistedByUser( $event, $user ) ) {
	 				continue;
				}

				wfRunHooks( 'EchoGetNotificationTypes', array( $user, $event, &$notifyTypes ) );

				foreach ( $notifyTypes as $type ) {
					self::doNotification( $event, $user, $type );
				}
			}
		}
	}

	/**
	 * Implements blacklist per active wiki expected to be initialized
	 * from InitializeSettings.php
	 *
	 * @param $event EchoEvent The event to test for exclusion via global blacklist
	 * @return boolean True when the event agent is in the global blacklist
	 */
	protected static function isBlacklisted( EchoEvent $event ) {
		if ( !$event->getAgent() ) {
			return false;
		}

		if ( self::$blacklist === null ) {
			global $wgEchoAgentBlacklist, $wgEchoOnWikiBlacklist,
			       $wgMemc;

			self::$blacklist = new EchoContainmentSet;
			self::$blacklist->addArray( $wgEchoAgentBlacklist );
			if ( $wgEchoOnWikiBlacklist !== null ) {
				self::$blacklist->addOnWiki(
					NS_MEDIAWIKI,
					$wgEchoOnWikiBlacklist,
					$wgMemc,
					wfMemcKey( "echo_on_wiki_blacklist")
				);
			}
		}

		return self::$blacklist->contains( $event->getAgent()->getName() );
	}

	/**
	 * Implements per-user whitelist sourced from a user wiki page
	 *
	 * @param $event EchoEvent The event to test for inclusion in whitelist
	 * @param $user User The user that owns the whitelist
	 * @return boolean True when the event agent is in the user whitelist
	 */
	protected static function isWhitelistedByUser( EchoEvent $event, User $user ) {
		global $wgEchoPerUserWhitelistFormat, $wgMemc;


		if ( $wgEchoPerUserWhitelistFormat === null || !$event->getAgent() ) {
			return false;
		}

		$userId = $user->getID();
		if ( $userId === 0 ) {
			return false; // anonymous user
		}

		if ( !isset( self::$userWhitelist[$userId] ) ) {
			self::$userWhitelist[$userId] = new EchoContainmentSet;
			self::$userWhitelist[$userId]->addOnWiki(
				NS_USER,
				sprintf( $wgEchoPerUserWhitelistFormat, $user->getName() ),
				$wgMemc,
				wfMemcKey( "echo_on_wiki_whitelist_" . $userId )
			);
		}

		return self::$userWhitelist[$userId]
			->contains( $event->getAgent()->getName() );
	}

	/**
	 * Processes a single notification for an EchoEvent
	 *
	 * @param $event EchoEvent to do a notification for.
	 * @param $user User object to notify.
	 * @param $type string The type of notification delivery to process, e.g. 'email'.
	 * @throws MWException
	 */
	public static function doNotification( $event, $user, $type ) {
		global $wgEchoNotifiers;

		if ( !isset( $wgEchoNotifiers[$type] ) ) {
			throw new MWException( "Invalid notification type $type" );
		}

		// Don't send any notification if Echo is disabled
		if ( EchoHooks::isEchoDisabled( $user ) ) {
			return;
		}

		call_user_func_array( $wgEchoNotifiers[$type], array( $user, $event ) );
	}

	/**
	 * Retrieves an array of User objects to be notified for an EchoEvent.
	 *
	 * @param EchoEvent $event
	 * @return array keys are user ids, values are User objects
	 */
	public static function getUsersToNotifyForEvent( EchoEvent $event ) {
		$type = $event->getType();
		// Key notifyList by user id to ensure there are no duplicated users
		$notifyList = array();
		$attributeManager = EchoAttributeManager::newFromGlobalVars();
		foreach ( $attributeManager->getUserLocators( $type ) as $callable ) {
			// locator options can be set per-event by using an array with
			// name as first parameter
			if ( is_array( $callable ) ) {
				$options = $callable;
				$callable = array_shift( $options );
			} else {
				$options = array();
			}
			if ( is_callable( $callable ) ) {
				$notifyList += call_user_func( $callable, $event, $options );
			} else {
				wfDebugLog( __CLASS__, __FUNCTION__ . ": Invalid user-locator returned for $type" );
			}
		}

		// hook for injecting more users.
		// @deprecated
		$users = array();
		wfRunHooks( 'EchoGetDefaultNotifiedUsers', array( $event, &$users ) );
		foreach ( $users as $user ) {
			$notifyList[$user->getId()] = $user;
		}

		// Don't notify the person who made the edit unless the event extra says to do so
		$extra = $event->getExtra();
		if ( ( !isset( $extra['notifyAgent'] ) || !$extra['notifyAgent'] ) && $event->getAgent() ) {
			unset( $notifyList[$event->getAgent()->getId()] );
		}

		return $notifyList;
	}

	/**
	 * Formats a notification
	 *
	 * @param $event EchoEvent that the notification is for.
	 * @param $user User to format the notification for.
	 * @param $format string The format to show the notification in: text, html, or email
	 * @param $type string The type of notification being distributed (e.g. email, web)
	 * @return string|array The formatted notification, or an array of subject
	 *     and body (for emails), or an error message
	 */
	public static function formatNotification( $event, $user, $format = 'text', $type = 'web' ) {
		global $wgEchoNotifications;

		$eventType = $event->getType();

		$res = '';
		if ( isset( $wgEchoNotifications[$eventType] ) ) {
			set_error_handler( array( __CLASS__, 'formatterErrorHandler' ), -1 );
			try {
				$params = $wgEchoNotifications[$eventType];
				$notifier = EchoNotificationFormatter::factory( $params );
				$notifier->setOutputFormat( $format );

				$res = $notifier->format( $event, $user, $type );
			} catch ( Exception $e ) {
				$meta = array(
					'id' => $event->getId(),
					'eventType' => $eventType,
					'format' => $format,
					'type' => $type,
					'user' => $user ? $user->getName() : 'no user',
				);
				wfDebugLog( __CLASS__, __FUNCTION__ . ": Error formatting " . FormatJson::encode( $meta ) );
				MWExceptionHandler::logException( $e );
			}
			restore_error_handler();
		}

		if ( $res ) {
			return $res;
		} else {
			return Xml::tags( 'span', array( 'class' => 'error' ),
				wfMessage( 'echo-error-no-formatter', $event->getType() )->escaped() );
		}
	}

	/**
	 * INTERNAL.  Must be public to be callable by the php error handling methods.
	 *
	 * Converts E_RECOVERABLE_ERROR, such as passing null to a method expecting
	 * a non-null object, into exceptions.
	 */
	public static function formatterErrorHandler( $errno, $errstr, $errfile, $errline ) {
		if ( $errno !== E_RECOVERABLE_ERROR ) {
			return false;
		}

		throw new CatchableFatalErrorException( $errno, $errstr, $errfile, $errline );
	}
}

class CatchableFatalErrorException extends MWException {
	public function __construct( $errno, $errstr, $errfile, $errline ) {
		parent::__construct( "Catchable fatal error: $errstr", $errno );
		// inherited protected variables from \Exception
		$this->file = $errfile;
		$this->line = $errline;
	}
}
