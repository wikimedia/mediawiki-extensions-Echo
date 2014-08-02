<?php

/**
 * An object that manages attributes of echo notifications: category, elegibility,
 * group, section etc.
 */
class EchoAttributeManager {

	/**
	 * @var array
	 */
	protected $notifications;

	/**
	 * @var array
	 */
	protected $categories;

	/**
	 * An array of EchoAttributeManager instance created from global variables
	 * @param EchoAttributeManager[]
	 */
	protected static $globalVarInstance = array();

	/**
	 * @param array notification attributes
	 * @param array notification categories
	 */
	public function __construct( array $notifications, array $categories ) {
		// Extensions can define their own notifications and categories
		$this->notifications = $notifications;
		$this->categories = $categories;
	}

	/**
	 * Create an instance from global variables
	 * @return EchoAttributeManager
	 */
	public static function newFromGlobalVars() {
		global $wgEchoNotifications, $wgEchoNotificationCategories;

		// Unit test may alter the global data for test purpose
		if ( defined( 'MW_PHPUNIT_TEST' ) && MW_PHPUNIT_TEST ) {
			return new self( $wgEchoNotifications, $wgEchoNotificationCategories );
		}
		// A job queue job may run against different wikis, the singleton
		// instance should be a per wiki singleton
		$wikiId = wfWikiId();
		if ( !isset( self::$globalVarInstance[$wikiId] ) ) {
			self::$globalVarInstance[$wikiId] = new self(
				$wgEchoNotifications,
				$wgEchoNotificationCategories
			);
		}
		return self::$globalVarInstance[$wikiId];
	}

	/**
	 * Get the user-locators related to the provided event type
	 *
	 * @param string $type
	 * @return array
	 */
	public function getUserLocators( $type ) {
		if ( isset( $this->notifications[$type]['user-locators'] ) ) {
			return (array)$this->notifications[$type]['user-locators'];
		} else {
			wfDebugLog( 'Echo', __METHOD__ . ": No user-locators configured for $type" );
			return array();
		}
	}

	/**
	 * Get the enabled events for a user, which excludes user-dismissed events
	 * from the general enabled events
	 * @param User
	 * @param string web/email
	 * @return string[]
	 */
	public function getUserEnabledEvents( User $user, $outputFormat ) {
		$eventTypesToLoad = $this->notifications;
		foreach ( $eventTypesToLoad as $eventType => $eventData ) {
			$category = $this->getNotificationCategory( $eventType );
			// Make sure the user is eligible to recieve this type of notification
			if ( !$this->getCategoryEligibility( $user, $category ) ) {
				unset( $eventTypesToLoad[$eventType] );
			}
			if ( !$user->getOption( 'echo-subscriptions-' . $outputFormat . '-' . $category ) ) {
				unset( $eventTypesToLoad[$eventType] );
			}
		}
		$eventTypes = array_keys( $eventTypesToLoad );

		return $eventTypes;
	}

	/**
	 * Get alert notification event.  Notifications without a section attributes
	 * default to section alert
	 * @return array
	 */
	public function getEvents() {
		return array_keys( $this->notifications );
	}

	/**
	 * See if a user is eligible to recieve a certain type of notification
	 * (based on user groups, not user preferences)
	 *
	 * @param User
	 * @param string A notification category defined in $wgEchoNotificationCategories
	 * @return boolean
	 */
	public function getCategoryEligibility( $user, $category ) {
		$usersGroups = $user->getGroups();
		if ( isset( $this->categories[$category]['usergroups'] ) ) {
			$allowedGroups = $this->categories[$category]['usergroups'];
			if ( !array_intersect( $usersGroups, $allowedGroups ) ) {
				return false;
			}
		}
		return true;
	}

	/**
	 * Get the priority for a specific notification type
	 *
	 * @param string A notification type defined in $wgEchoNotifications
	 * @return integer From 1 to 10 (10 is default)
	 */
	public function getNotificationPriority( $notificationType ) {
		$category = $this->getNotificationCategory( $notificationType );
		return $this->getCategoryPriority( $category );
	}

	/**
	 * Get the priority for a notification category
	 *
	 * @param string A notification category defined in $wgEchoNotificationCategories
	 * @return integer From 1 to 10 (10 is default)
	 */
	public function getCategoryPriority( $category ) {
		if ( isset( $this->categories[$category]['priority'] ) ) {
			$priority = $this->categories[$category]['priority'];
			if ( $priority >= 1 && $priority <= 10 ) {
				return $priority;
			}
		}
		return 10;
	}

	/**
	 * Get the notification category for a notification type
	 *
	 * @param string A notification type defined in $wgEchoNotifications
	 * @return string The name of the notification category or 'other' if no
	 *     category is explicitly assigned.
	 */
	public function getNotificationCategory( $notificationType ) {
		if ( isset( $this->notifications[$notificationType]['category'] ) ) {
			$category = $this->notifications[$notificationType]['category'];
			if ( isset( $this->categories[$category] ) ) {
				return $category;
			}
		}
		return 'other';
	}
}
