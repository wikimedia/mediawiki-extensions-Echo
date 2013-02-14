<?php

/**
 * Base backend class for accessing and saving echo notification data,
 * this class should only provide all the necessary interfaces and
 * implementation should be provided in each child class
 */
abstract class MWEchoBackend {

	private static $cache = array();

	/**
	 * Factory to initialize a backend class
	 * @param $backend string
	 * @return MWEchoBackend
	 * @throws MWException
	 */
	public static function factory( $backend ) {
		$backend = strval( $backend );

		$className = 'MW' . $backend . 'EchoBackend';

		if ( !class_exists( $className ) ) {
			throw new MWException( "$backend backend is not supported" );
		}

		if ( !isset( self::$cache[$backend] ) ) {
			self::$cache[$backend] = new $className();
		}

		return self::$cache[$backend];
	}

	/**
	 * Get the enabled events for a user, which excludes user-dismissed events
	 * from the general enabled events
	 * @return array
	 */
	protected function getUserEnabledEvents( $user, $outputFormat ) {
		$eventTypesToLoad = EchoEvent::gatherValidEchoEvents();
		foreach ( $eventTypesToLoad as $key => $eventType ) {
			// Make sure the user is eligible to recieve this type of notification
			if ( !EchoNotificationController::getNotificationEligibility( $user, $eventType ) ) {
				unset( $eventTypesToLoad[$key] );
			}
			if ( !$user->getOption( 'echo-' . $outputFormat . '-notifications' . $eventType ) ) {
				unset( $eventTypesToLoad[$key] );
			}
		}

		return $eventTypesToLoad;
	}

	/**
	 * Create a new notification
	 * @param $row array
	 */
	abstract public function createNotification( $row );

	/**
	 * Load notifications based on the parameters
	 * @param $user User the user to get notifications for
	 * @param $unread bool true to get only unread notifications
	 * @param $limit int The maximum number of notifications to return
	 * @param $timestamp int The timestamp to start from
	 * @param $offset int The notification event id to start from
	 * @return array
	 */
	abstract public function loadNotifications( $user, $unread, $limit, $timestamp, $offset );

	/**
	 * Create an Echo event
	 * @param $row array
	 * @return int
	 */
	abstract public function createEvent( $row );

	/**
	 * Load an Echo event
	 * @param $id int
	 * @param $fromMaster bool
	 */
	abstract public function loadEvent( $id, $fromMaster );

	/**
	 * Update the extra data for an Echo event
	 * @param $event EchoEvent
	 */
	abstract public function updateEventExtra( $event );

	/**
	 * Create an Echo subscription
	 * @param $conds array
	 * @param $rows array
	 */
	abstract public function createSubscription( $conds, $rows );

	/**
	 * Load an Echo subscription
	 * @param $conds array
	 * @return ResultWrapper
	 */
	abstract public function loadSubscription( $conds );

	/**
	 * Mark notifications as read for a user
	 * @param $user User
	 * @param $eventIDs array
	 */
	abstract public function markRead( $user, $eventIDs );

	/**
	 * Retrieves number of unread notifications that a user has.
	 * @param $user User object to check notifications for
	 * @param $dbSource string use master or slave storage to pull count
	 * @return ResultWrapper|bool
	 */
	abstract public function getNotificationCount( $user, $dbSource );

}
