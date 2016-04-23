<?php

use MediaWiki\Logger\LoggerFactory;

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
	 * Returns the count passed in, or MWEchoNotifUser::MAX_BADGE_COUNT + 1,
	 * whichever is less.
	 *
	 * @param int $count
	 * @return int Notification count, with ceiling applied
	 */
	public static function getCappedNotificationCount( $count ) {
		if ( $count <= MWEchoNotifUser::MAX_BADGE_COUNT ) {
			return $count;
		} else {
			return MWEchoNotifUser::MAX_BADGE_COUNT + 1;
		}
	}

	/**
	* Format the notification count as a string.  This should only be used for an
	* isolated string count, e.g. as displayed in personal tools or returned by the API.
	*
	* If using it in sentence context, pass the value from getCappedNotificationCount
	* into a message and use PLURAL.  Example: notification-bundle-header-page-linked
	*
	* @param int count Notification count
	* @return string Formatted count, after applying cap then formatting to string
	*/
	public static function formatNotificationCount( $count ) {
		$cappedCount = self::getCappedNotificationCount( $count );

		return wfMessage( 'echo-badge-count' )->numParams( $cappedCount )->text();
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
			DeferredUpdates::addCallableUpdate( function () use ( $event ) {
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
		$userIds = array();
		$userIdsCount = 0;
		foreach ( self::getUsersToNotifyForEvent( $event ) as $user ) {
			$userIds[$user->getId()] = $user->getId();
			$userNotifyTypes = $notifyTypes;
			// Respect the enotifminoredits preference
			// @todo should this be checked somewhere else?
			if ( !$user->getOption( 'enotifminoredits' ) ) {
				$extra = $event->getExtra();
				if ( !empty( $extra['revid'] ) ) {
					$rev = Revision::newFromID( $extra['revid'], Revision::READ_LATEST );

					if ( $rev->isMinor() ) {
						$notifyTypes = array_diff( $notifyTypes, array( 'email' ) );
					}
				}
			}
			Hooks::run( 'EchoGetNotificationTypes', array( $user, $event, &$userNotifyTypes ) );

			// types such as web, email, etc
			foreach ( $userNotifyTypes as $type ) {
				self::doNotification( $event, $user, $type );
			}

			$userIdsCount++;
			// Process 1000 users per NotificationDeleteJob
			if ( $userIdsCount > 1000 ) {
				self::enqueueDeleteJob( $userIds, $event );
				$userIds = array();
				$userIdsCount = 0;
			}
		}

		// process the userIds left in the array
		if ( $userIds ) {
			self::enqueueDeleteJob( $userIds, $event );
		}
	}

	/**
	 * Schedule a job to check and delete older notifications
	 *
	 * @param int $userIds
	 * @param EchoEvent $event
	 */
	public static function enqueueDeleteJob( array $userIds, EchoEvent $event ) {
		// Do nothing if there is no user
		if ( !$userIds ) {
			return;
		}

		$job = new EchoNotificationDeleteJob(
			$event->getTitle() ?: Title::newMainPage(),
			array(
				'userIds' => $userIds
			)
		);
		JobQueueGroup::singleton()->push( $job );
	}

	/**
	 * Get the notify types for this event, eg, web/email
	 *
	 * @param string $eventType Event type
	 * @return string[] List of notify types that apply for
	 *  this event type
	 */
	public static function getEventNotifyTypes( $eventType ) {
		global $wgDefaultNotifyTypeAvailability,
			$wgEchoNotifications;

		$notifyTypes = array();

		$attributeManager = EchoAttributeManager::newFromGlobalVars();

		$category = $attributeManager->getNotificationCategory( $eventType );

		// If the category is displayed in preferences, we should go by that, rather
		// than overrides that are inconsistent with what the user saw in preferences.
		$isTypeSpecificConsidered = !$attributeManager->isCategoryDisplayedInPreferences(
			$category
		);

		$notifyTypes = $wgDefaultNotifyTypeAvailability;

		if ( $isTypeSpecificConsidered && isset( $wgEchoNotifications[$eventType]['notify-type-availability'] ) ) {
			$notifyTypes = array_merge(
				$notifyTypes,
				$wgEchoNotifications[$eventType]['notify-type-availability']
			);
		}

		// Category settings for availability are considered in EchoNotifier
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
			global $wgEchoAgentBlacklist, $wgEchoOnWikiBlacklist;

			self::$blacklist = new EchoContainmentSet;
			self::$blacklist->addArray( $wgEchoAgentBlacklist );
			if ( $wgEchoOnWikiBlacklist !== null ) {
				self::$blacklist->addOnWiki(
					NS_MEDIAWIKI,
					$wgEchoOnWikiBlacklist,
					ObjectCache::getLocalClusterInstance(),
					wfMemcKey( "echo_on_wiki_blacklist" )
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
		global $wgEchoPerUserWhitelistFormat;

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
				ObjectCache::getLocalClusterInstance(),
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

		// Don't send any notifications to anonymous users
		if ( $user->isAnon() ) {
			throw new MWException( "Cannot notify anonymous user: {$user->getName()}" );
		}

		call_user_func_array( $wgEchoNotifiers[$type], array( $user, $event ) );
	}

	/**
	 * Returns an array each element of which is the result of a
	 * user-locator|user-filters attached to the event type.
	 *
	 * @param EchoEvent $event
	 * @param string $locator Either EchoAttributeManager::ATTR_LOCATORS or EchoAttributeManager::ATTR_FILTERS
	 * @return array
	 */
	public static function evaluateUserCallable( EchoEvent $event, $locator = EchoAttributeManager::ATTR_LOCATORS ) {
		$attributeManager = EchoAttributeManager::newFromGlobalVars();
		$type = $event->getType();
		$result = array();
		foreach ( $attributeManager->getUserCallable( $type, $locator ) as $callable ) {
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
				wfDebugLog( __CLASS__, __FUNCTION__ . ": Invalid $locator returned for $type" );
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
		foreach ( self::evaluateUserCallable( $event, EchoAttributeManager::ATTR_LOCATORS ) as $users ) {
			$notify->add( $users );
		}

		// Hook for injecting more users.
		// @deprecated
		$users = array();
		Hooks::run( 'EchoGetDefaultNotifiedUsers', array( $event, &$users ) );
		if ( $users ) {
			$notify->add( $users );
		}

		// Exclude certain users
		foreach ( self::evaluateUserCallable( $event, EchoAttributeManager::ATTR_FILTERS ) as $users ) {
			// the result of the callback can be both an iterator or array
			$users = is_array( $users ) ? $users : iterator_to_array( $users );
			$notify->addFilter( function ( User $user ) use ( $users ) {
				// we need to check if $user is in $users, but they're not
				// guaranteed to be the same object, so I'll compare ids.
				$userId = $user->getId();
				$userIds = array_map( function ( User $user ) {
					return $user->getId();
				}, $users );
				return !in_array( $userId, $userIds );
			} );
		}

		// Filter non-User, anon and duplicate users
		$seen = array();
		$notify->addFilter( function ( $user ) use ( &$seen ) {
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
			$notify->addFilter( function ( $user ) use ( $agentId ) {
				return $user->getId() != $agentId;
			} );
		}

		// Apply per-wiki event blacklist and per-user whitelists
		// of that blacklist.
		if ( self::isBlacklisted( $event ) ) {
			$notify->addFilter( function ( $user ) use ( $event ) {
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
	public static function formatNotification( EchoEvent $event, User $user, $format = 'text', $type = 'web' ) {
		$eventType = $event->getType();

		$res = '';
		try {
			$formatter = EchoNotificationFormatter::factory( $eventType );
			$formatter->setOutputFormat( $format );
		} catch ( InvalidArgumentException $e ) {
			self::failFormatting( $event, $user );

			return '';
		}
		set_error_handler( array( __CLASS__, 'formatterErrorHandler' ), -1 );
		try {
			$res = $formatter->format( $event, $user, $type );
		} catch ( Exception $e ) {
			$context = array(
				'id' => $event->getId(),
				'eventType' => $eventType,
				'format' => $format,
				'type' => $type,
				'user' => $user ? $user->getName() : 'no user',
				'exceptionName' => get_class( $e ),
				'exceptionMessage' => $e->getMessage(),
			);
			LoggerFactory::getInstance( 'Echo' )->error( 'Error formatting notification', $context );
			MWExceptionHandler::logException( $e );
		}
		restore_error_handler();

		if ( $res === '' ) {
			self::failFormatting( $event, $user );
		}

		return $res;
	}

	/**
	 * Event has failed to format for the given user.  Mark it as read so
	 * we do not continue to notify them about this broken event.
	 *
	 * @param EchoEvent $event
	 * @param User $user
	 */
	protected static function failFormatting( EchoEvent $event, $user ) {
		// FIXME: The only issue is that the badge count won't be up to date
		// till you refresh the page.  Probably we could do this in the browser
		// so that if the formatting is empty and the notif is unread, put it
		// in the auto-mark-read APIs
		EchoDeferredMarkAsReadUpdate::add( $event, $user );
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
