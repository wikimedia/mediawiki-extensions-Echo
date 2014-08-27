<?php
/**
 * This class represents the controller for notifications
 */
class EchoNotificationController {

	/**
	 * Echo event agent per wiki blacklist
	 *
	 * @var string[]
	 */
	static protected $blacklist;

	/**
	 * Echo event agent per user whitelist, this overwrites $blacklist
	 *
	 * @param string[]
	 */
	static protected $userWhitelist;

	/**
	 * Format the notification count with Language::formatNum().  In addition, for large count,
	 * return abbreviated version, e.g. 99+
	 *
	 * @param int $count
	 * @return string
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
	 * @param EchoEvent $event
	 * @param boolean $defer Defer to job queue or not
	 */
	public static function notify( $event, $defer = true ) {
		// Defer to job queue if defer to job queue is requested and
		// this event should use job queue
		if ( $defer && $event->getUseJobQueue() ) {
			// defer job insertion till end of request when all primary db transactions
			// have been committed
			DeferredUpdates::addCallableUpdate( function() use ( $event ) {
				// can't use self::, php 5.3 doesn't inherit class scope
				EchoNotificationController::enqueueEvent( $event );
			} );
			return;
		}

		// Check if the event object has valid event type.  Events with invalid
		// event types left in the job queue should not be processed
		if ( !$event->isEnabledEvent() ) {
			return;
		}

		$type = $event->getType();
		$notifyTypes = self::getEventNotifyTypes( $type );
		foreach ( self::getUsersToNotifyForEvent( $event ) as $user ) {
			$userNotifyTypes = $notifyTypes;
			wfRunHooks( 'EchoGetNotificationTypes', array( $user, $event, &$userNotifyTypes ) );

			// types such as web, email, etc
			foreach ( $userNotifyTypes as $type ) {
				self::doNotification( $event, $user, $type );
			}
		}
	}

	/**
	 * @param string $type Event type
	 * @return string[] List of notification types to send for
	 *  this event type
	 */
	public static function getEventNotifyTypes( $type ) {
		// Get the notification types for this event, eg, web/email
		global $wgEchoDefaultNotificationTypes;

		$notifyTypes = $wgEchoDefaultNotificationTypes['all'];
		if ( isset( $wgEchoDefaultNotificationTypes[$type] ) ) {
			$notifyTypes = array_merge(
				$notifyTypes,
				$wgEchoDefaultNotificationTypes[$type]
			);
		}

		return array_keys( array_filter( $notifyTypes ) );
	}

	/**
	 * Push $event onto the mediawiki job queue
	 *
	 * @param EchoEvent $event
	 */
	public static function enqueueEvent( EchoEvent $event ) {
		$job = new EchoNotificationJob(
			$event->getTitle() ?: Title::newMainPage(),
			array(
				'event' => $event,
				'masterPos' => MWEchoDbFactory::newFromDefault()
					->getMasterPosition(),
			)
		);
		JobQueueGroup::singleton()->push( $job );
	}


	/**
	 * Implements blacklist per active wiki expected to be initialized
	 * from InitializeSettings.php
	 *
	 * @param EchoEvent $event The event to test for exclusion via global blacklist
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
	 * @param EchoEvent $event The event to test for inclusion in whitelist
	 * @param User $user The user that owns the whitelist
	 * @return boolean True when the event agent is in the user whitelist
	 */
	public static function isWhitelistedByUser( EchoEvent $event, User $user ) {
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
	 * @param EchoEvent $event
	 * @param User $user The user to be notified.
	 * @param string $type The type of notification delivery to process, e.g. 'email'.
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
	 * Returns an array each element of which is the result of a
	 * user-locator attached to the event type.
	 *
	 * @param EchoEvent $event
	 * @return array
	 */
	public static function evaluateUserLocators( EchoEvent $event ) {
		$attributeManager = EchoAttributeManager::newFromGlobalVars();
		$type = $event->getType();
		$result = array();
		foreach ( $attributeManager->getUserLocators( $type ) as $callable ) {
			// locator options can be set per-event by using an array with
			// name as first parameter.
			if ( is_array( $callable ) ) {
				$options = $callable;
				$spliced = array_splice( $options, 0, 1, array( $event ) );
				$callable = reset( $spliced );
			} else {
				$options = array( $event );
			}
			if ( is_callable( $callable ) ) {
				$result[] = call_user_func_array( $callable, $options );
			} else {
				wfDebugLog( __CLASS__, __FUNCTION__ . ": Invalid user-locator returned for $type" );
			}
		}

		return $result;
	}

	/**
	 * Retrieves an array of User objects to be notified for an EchoEvent.
	 *
	 * @param EchoEvent $event
	 * @return Iterator values are User objects
	 */
	public static function getUsersToNotifyForEvent( EchoEvent $event ) {
		$notify = new EchoFilteredSequentialIterator;
		foreach ( self::evaluateUserLocators( $event ) as $users ) {
			$notify->add( $users );
		}

		// Hook for injecting more users.
		// @deprecated
		$users = array();
		wfRunHooks( 'EchoGetDefaultNotifiedUsers', array( $event, &$users ) );
		if ( $users ) {
			$notify->add( $users );
		}

		// Filter non-User, anon and duplicate users
		$seen = array();
		$notify->addFilter( function( $user ) use( &$seen ) {
			if ( !$user instanceof User ) {
				wfDebugLog( __METHOD__, 'Expected all User instances, received:' .
					( is_object( $user ) ? get_class( $user ) : gettype( $user ) )
				);
				return false;
			}
			if ( $user->isAnon() || isset( $seen[$user->getId()] ) ) {
				return false;
			}
			$seen[$user->getId()] = true;
			return true;
		} );

		// Don't notify the person who initiated the event unless the event extra says to do so
		$extra = $event->getExtra();
		if ( ( !isset( $extra['notifyAgent'] ) || !$extra['notifyAgent'] ) && $event->getAgent() ) {
			$agentId = $event->getAgent()->getId();
			$notify->addFilter( function( $user ) use( $agentId ) {
				return $user->getId() != $agentId;
			} );
		}

		// Apply per-wiki event blacklist and per-user whitelists
		// of that blacklist.
		if ( self::isBlacklisted( $event ) ) {
			$notify->addFilter( function( $user ) use( $event ) {
				// don't use self:: - PHP5.3 closures don't inherit class scope
				return EchoNotificationController::isWhitelistedByUser( $event, $user );
			} );
		}

		return $notify->getIterator();
	}

	/**
	 * Formats a notification
	 *
	 * @param EchoEvent $event The event for a notification.
	 * @param User $user The user to format the notification for.
	 * @param string $format The format to show the notification in: text, html, or email
	 * @param string $type The type of notification being distributed (e.g. email, web)
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

		throw new EchoCatchableFatalErrorException( $errno, $errstr, $errfile, $errline );
	}
}
