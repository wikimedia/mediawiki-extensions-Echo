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
	 * Notification section constant
	 */
	const ALERT = 'alert';
	const MESSAGE = 'message';
	const ALL = 'all';

	/**
	 * Notifications are broken down to two sections, default is alert
	 * @var array
	 */
	public static $sections = array(
		self::ALERT,
		self::MESSAGE
	);

	/**
	 * Names for keys in $wgEchoNotifications notification config
	 */
	const ATTR_LOCATORS = 'user-locators';
	const ATTR_FILTERS = 'user-filters';

	/**
	 * An EchoAttributeManager instance created from global variables
	 * @param EchoAttributeManager
	 */
	protected static $globalVarInstance = null;

	/**
	 * @param array $notifications notification attributes
	 * @param array $categories notification categories
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

		if ( self::$globalVarInstance === null ) {
			self::$globalVarInstance = new self(
				$wgEchoNotifications,
				$wgEchoNotificationCategories
			);
		}

		return self::$globalVarInstance;
	}

	/**
	 * Get the user-locators|user-filters related to the provided event type
	 *
	 * @param string $type
	 * @param string $locator Either self::ATTR_LOCATORS or self::ATTR_FILTERS
	 * @return array
	 */
	public function getUserCallable( $type, $locator = self::ATTR_LOCATORS ) {
		if ( isset( $this->notifications[$type][$locator] ) ) {
			return (array)$this->notifications[$type][$locator];
		} else {
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
	 * Get the uesr enabled events for the specified sections
	 * @param User
	 * @param string
	 * @param string[]
	 * @return string[]
	 */
	public function getUserEnabledEventsbySections( User $user, $outputFormat, array $sections ) {
		$events = array();
		foreach ( $sections as $section ) {
			$events = array_merge(
				$events,
				call_user_func(
					array( $this, 'get' . ucfirst( $section ) . 'Events' )
				)
			);
		}

		return array_intersect(
			$this->getUserEnabledEvents( $user, $outputFormat ),
			$events
		);
	}

	/**
	 * Get alert notification event.  Notifications without a section attributes
	 * default to section alert
	 * @return array
	 */
	public function getAlertEvents() {
		$events = array();
		foreach ( $this->notifications as $event => $attribs ) {
			if (
				!isset( $attribs['section'] )
				|| !in_array( $attribs['section'], self::$sections )
				|| $attribs['section'] === 'alert'
			) {
				$events[] = $event;
			}
		}

		return $events;
	}

	/**
	 * Get message notification event
	 * @return array
	 */
	public function getMessageEvents() {
		$events = array();
		foreach ( $this->notifications as $event => $attribs ) {
			if (
				isset( $attribs['section'] )
				&& $attribs['section'] === 'message'
			) {
				$events[] = $event;
			}
		}

		return $events;
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

	/**
	 * Get notification section for a notification type
	 * @todo add a unit test case
	 * @param string $notificationType
	 * @return string
	 */
	public function getNotificationSection( $notificationType ) {
		if ( isset( $this->notifications[$notificationType]['section'] ) ) {
			return $this->notifications[$notificationType]['section'];
		}

		return 'alert';
	}

}
