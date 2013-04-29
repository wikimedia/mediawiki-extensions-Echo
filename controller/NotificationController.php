<?php

class EchoNotificationController {
	/**
	 * Retrieves number of unread notifications that a user has, would return
	 * $wgEchoMaxNotificationCount + 1 at most
	 *
	 * @param $user User object to check notifications for
	 * @param $cached bool Set to false to bypass the cache.
	 * @param $dbSource string use master or slave database to pull count
	 * @return Integer: Number of unread notifications.
	 */
	public static function getNotificationCount( $user, $cached = true, $dbSource = DB_SLAVE ) {
		global $wgMemc, $wgEchoBackend, $wgEchoConfig;

		if ( $user->isAnon() ) {
			return 0;
		}

		$memcKey = wfMemcKey( 'echo-notification-count', $user->getId(), $wgEchoConfig['version'] );

		if ( $cached && $wgMemc->get( $memcKey ) !== false ) {
			return $wgMemc->get( $memcKey );
		}

		$count = $wgEchoBackend->getNotificationCount( $user, $dbSource );

		$wgMemc->set( $memcKey, $count, 86400 );

		return $count;
	}

	/**
	 * Get the enabled events for a user, which excludes user-dismissed events
	 * from the general enabled events
	 * @param $user User
	 * @param $outputFormat string
	 * @return array
	 */
	public static function getUserEnabledEvents( $user, $outputFormat ) {
		global $wgEchoNotifications;
		$eventTypesToLoad = $wgEchoNotifications;
		foreach ( $eventTypesToLoad as $eventType => $eventData ) {
			$category = self::getNotificationCategory( $eventType );
			// Make sure the user is eligible to recieve this type of notification
			if ( !self::getCategoryEligibility( $user, $category ) ) {
				unset( $eventTypesToLoad[$eventType] );
			}
			if ( !$user->getOption( 'echo-subscriptions-' . $outputFormat . '-' . $category ) ) {
				unset( $eventTypesToLoad[$eventType] );
			}
		}
		return array_keys( $eventTypesToLoad );
	}

	/**
	 * See if a user is eligible to recieve a certain type of notification
	 * (based on user groups, not user preferences)
	 *
	 * @param $user User object
	 * @param $notificationType string A notification type defined in $wgEchoNotifications
	 * @return boolean
	 */
	public static function getNotificationEligibility( $user, $notificationType ) {
		$category = self::getNotificationCategory( $notificationType );
		return self::getCategoryEligibility( $user, $category );
	}

	/**
	 * See if a user is eligible to recieve a certain type of notification
	 * (based on user groups, not user preferences)
	 *
	 * @param $user User object
	 * @param $category string A notification category defined in $wgEchoNotificationCategories
	 * @return boolean
	 */
	public static function getCategoryEligibility( $user, $category ) {
		global $wgEchoNotificationCategories;
		$usersGroups = $user->getGroups();
		if ( isset( $wgEchoNotificationCategories[$category]['usergroups'] ) ) {
			$allowedGroups = $wgEchoNotificationCategories[$category]['usergroups'];
			if ( !array_intersect( $usersGroups, $allowedGroups ) ) {
				return false;
			}
		}
		return true;
	}

	/**
	 * Get the priority for a specific notification type
	 *
	 * @param $notificationType string A notification type defined in $wgEchoNotifications
	 * @return integer From 1 to 10 (10 is default)
	 */
	public static function getNotificationPriority( $notificationType ) {
		$category = self::getNotificationCategory( $notificationType );
		return self::getCategoryPriority( $category );
	}

	/**
	 * Get the priority for a notification category
	 *
	 * @param $category string A notification category defined in $wgEchoNotificationCategories
	 * @return integer From 1 to 10 (10 is default)
	 */
	public static function getCategoryPriority( $category ) {
		global $wgEchoNotificationCategories;
		if ( isset( $wgEchoNotificationCategories[$category]['priority'] ) ) {
			$priority = $wgEchoNotificationCategories[$category]['priority'];
			if ( $priority >= 1 && $priority <= 10 ) {
				return $priority;
			}
		}
		return 10;
	}

	/**
	 * Get the notification category for a notification type
	 *
	 * @param $notificationType string A notification type defined in $wgEchoNotifications
	 * @return String The name of the notification category or 'other' if no
	 *     category is explicitly assigned.
	 */
	public static function getNotificationCategory( $notificationType ) {
		global $wgEchoNotifications, $wgEchoNotificationCategories;
		if ( isset( $wgEchoNotifications[$notificationType]['category'] ) ) {
			$category = $wgEchoNotifications[$notificationType]['category'];
			if ( isset( $wgEchoNotificationCategories[$category] ) ) {
				return $category;
			}
		}
		return 'other';
	}

	/**
	 * Retrieves formatted number of unread notifications that a user has.
	 *
	 * @param $user User object to check notifications for
	 * @param $cached bool Set to false to bypass the cache.
	 * @param $dbSource string use master or slave database to pull count
	 * @return String: Number of unread notifications.
	 */
	public static function getFormattedNotificationCount( $user, $cached = true, $dbSource = DB_SLAVE ) {
		return self::formatNotificationCount(
				self::getNotificationCount( $user, $cached, $dbSource )
			);
	}

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
	 * Mark one or more notifications read for a user.
	 *
	 * @param $user User object to mark items read for.
	 * @param $eventIDs Array of event IDs to mark read
	 */
	public static function markRead( $user, $eventIDs ) {
		global $wgEchoBackend;

		$eventIDs = array_filter( (array)$eventIDs, 'is_numeric' );
		if ( !$eventIDs ) {
			return;
		}
		$wgEchoBackend->markRead( $user, $eventIDs );
		self::resetNotificationCount( $user, DB_MASTER );
	}

	/**
	 * @param $user User to mark all notifications read for
	 * @return boolean
	 */
	public static function markAllRead( $user ) {
		global $wgEchoBackend, $wgEchoMaxNotificationCount;

		$notificationCount = self::getNotificationCount( $user );
		// Only update all the unread notifications if it isn't a huge number.
		// TODO: Implement batched jobs it's over the maximum.
		if ( $notificationCount <= $wgEchoMaxNotificationCount ) {
			$wgEchoBackend->markAllRead( $user );
			self::resetNotificationCount( $user, DB_MASTER );
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Recalculates the number of notifications that a user has.
	 *
	 * @param $user User object
	 * @param $dbSource string use master or slave database to pull count
	 */
	public static function resetNotificationCount( $user, $dbSource = DB_SLAVE ) {
		self::getNotificationCount( $user, false, $dbSource );
		$user->invalidateCache();
	}

	/**
	 * Processes notifications for a newly-created EchoEvent
	 *
	 * @param $event EchoEvent to do notifications for
	 * @param $defer bool Defer to job queue
	 */
	public static function notify( $event, $defer = true ) {
		if ( $defer ) {
			$title = $event->getTitle() ? $event->getTitle() : Title::newMainPage();

			$job = new EchoNotificationJob( $title, array( 'event' => $event ) );
			$job->insert();
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

			foreach ( $users as $user ) {
				// Notification should not be sent to anonymous user
				if ( $user->isAnon() ) {
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

		call_user_func_array( $wgEchoNotifiers[$type], array( $user, $event ) );
	}

	/**
	 * Retrieves an array of User objects to be notified for an EchoEvent.
	 *
	 * @param $event EchoEvent to retrieve users to be notified for.
	 * @return Array of User objects
	 */
	protected static function getUsersToNotifyForEvent( $event ) {
		$users = $notifyList = array();
		wfRunHooks( 'EchoGetDefaultNotifiedUsers', array( $event, &$users ) );
		// Make sure there is no duplicated users
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

		if ( isset( $wgEchoNotifications[$eventType] ) ) {
			$params = $wgEchoNotifications[$eventType];
			$notifier = EchoNotificationFormatter::factory( $params );
			$notifier->setOutputFormat( $format );

			return $notifier->format( $event, $user, $type );
		}

		return Xml::tags( 'span', array( 'class' => 'error' ),
			wfMessage( 'echo-error-no-formatter', $event->getType() )->escaped() );
	}
}
