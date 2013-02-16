<?php

class EchoNotificationController {
	/**
	 * Retrieves number of unread notifications that a user has.
	 *
	 * @param $user User object to check notifications for
	 * @param $cached bool Set to false to bypass the cache.
	 * @param $dbSource string use master or slave database to pull count
	 * @return Integer: Number of unread notifications.
	 */
	public static function getNotificationCount( $user, $cached = true, $dbSource = DB_SLAVE ) {
		global $wgMemc, $wgEchoBackend;

		if ( $user->isAnon() ) {
			return 0;
		}

		$memcKey = wfMemcKey( 'echo-notification-count', $user->getId() );

		if ( $cached && $wgMemc->get( $memcKey ) !== false ) {
			return $wgMemc->get( $memcKey );
		}

		$res = $wgEchoBackend->getNotificationCount( $user, $dbSource );

		if ( $res ) {
			$count = $res->num;
		} else {
			$count = 0;
		}

		$wgMemc->set( $memcKey, $count, 86400 );

		return $count;
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
		$category = EchoNotificationController::getNotificationCategory( $notificationType );
		return EchoNotificationController::getCategoryEligibility( $user, $category );
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
		$category = $this->getNotificationCategory( $notificationType );
		return EchoNotificationController::getCategoryPriority( $category );
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
	 * Recalculates the number of notifications that a user has.
	 *
	 * @param $user User object
	 * @param $dbSource string use master or slave database to pull count
	 */
	public static function resetNotificationCount( $user, $dbSource = DB_SLAVE ) {
		self::getNotificationCount( $user, false, $dbSource );
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

		if ( $event->getType() == 'welcome' ) { // Welcome events should only be sent to the new user, no need for subscriptions.
			self::doNotification( $event, $event->getAgent(), 'web' );
		} else {
			$subscriptions = self::getSubscriptionsForEvent( $event );

			foreach ( $subscriptions as $subscription ) {
				$user = $subscription->getUser();
				$notifyTypes = $subscription->getNotificationTypes();

				$notifyTypes = array_keys( array_filter( $notifyTypes ) );

				wfRunHooks( 'EchoGetNotificationTypes', array( $subscription, $event, &$notifyTypes ) );

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
	 * Retrieves an array of EchoSubscription objects applicable to an EchoEvent.
	 *
	 * @param $event EchoEvent to retrieve EchoSubscriptions for.
	 * @return Array of EchoSubscription objects.
	 */
	protected static function getSubscriptionsForEvent( $event ) {
		global $wgEchoBackend;

		$conds = array( 'sub_event_type' => $event->getType() );

		if ( $event->getTitle() ) {
			$conds['sub_page_namespace'] = $event->getTitle()->getNamespace();
			$conds['sub_page_title'] = $event->getTitle()->getDBkey();
		}

		$res = $wgEchoBackend->loadSubscription( $conds );

		$subscriptions = array();
		$rowCollection = array();
		$lastUser = null;

		foreach ( $res as $row ) {
			if ( $lastUser && $row->sub_user != $lastUser ) {
				$subscriptions[$lastUser] = EchoSubscription::newFromRows( $rowCollection );
				$rowCollection = array();
			}

			$rowCollection[] = $row;
			$lastUser = $row->sub_user;
		}

		if ( count( $rowCollection ) ) {
			$subscriptions[$lastUser] = EchoSubscription::newFromRows( $rowCollection );
		}

		$users = array();
		wfRunHooks( 'EchoGetDefaultNotifiedUsers', array( $event, &$users ) );
		foreach ( $users as $u ) {
			if ( !isset( $subscriptions[$u->getId()] ) ) {
				$subscriptions[$u->getId()] = new EchoSubscription( $u, $event->getType(), $event->getTitle() );
			}
		}

		// Don't notify the person who made the edit unless the event extra says to do so, that's a bit silly.
		$extra = $event->getExtra();
		if ( ( !isset( $extra['notifyAgent'] ) || !$extra['notifyAgent'] ) && $event->getAgent() ) {
			unset( $subscriptions[$event->getAgent()->getId()] );
		}

		return $subscriptions;
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
