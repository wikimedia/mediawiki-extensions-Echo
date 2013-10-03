<?php

/**
 * Base backend class for accessing and saving echo notification data,
 * this class should only provide all the necessary interfaces and
 * implementation should be provided in each child class
 */
abstract class MWEchoBackend {

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

		return new $className();
	}

	/**
	 * Extract the offset used for notification list
	 * @param $continue String Used for offset
	 * @param @return array
	 */
	protected function extractQueryOffset( $continue ) {
		$offset = array (
			'timestamp' => 0,
			'offset' => 0,
		);
		if ( $continue ) {
			$values = explode( '|', $continue, 3 );
			if ( count( $values ) !== 2 ) {
				throw new MWException( 'Invalid continue param: ' . $continue );
			}
			$offset['timestamp'] = (int)$values[0];
			$offset['offset'] = (int)$values[1];
		}

		return $offset;
	}

	/**
	 * Create a new notification
	 * @param $row array
	 */
	abstract public function createNotification( $row );

	/**
	 * Load notifications based on the parameters
	 * @param $user User the user to get notifications for
	 * @param $limit int The maximum number of notifications to return
	 * @param $continue string Used for offset
	 * @param $outputFormat string The output format of the notifications (web, email, etc.)
	 * @return array
	 */
	abstract public function loadNotifications( $user, $limit, $continue, $outputFormat = 'web' );

	/**
	 * Get the bundle data for user/hash
	 * @param $user User
	 * @param $bundleHash string The hash used to identify a set of bundle-able events
	 * @param $type string 'web'/'email'
	 * @param $order 'ASC'/'DESC' Sort the result in ascending/descending order
	 * @param $limit int the number of records to retrieve
	 * @return ResultWrapper|bool
	 */
	abstract public function getRawBundleData( $user, $bundleHash, $type = 'web', $order = 'DESC', $limit = 250 );

	/**
	 * Get the last bundle stat - read_timestamp & bundle_display_hash
	 * @param $user User
	 * @param $bundleHash string The hash used to identify a set of bundle-able events
	 * @return ResultWrapper|bool
	 */
	abstract public function getLastBundleStat( $user, $bundleHash );

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
	 * Mark notifications as read for a user
	 * @param $user User
	 * @param $eventIDs array
	 */
	abstract public function markRead( $user, $eventIDs );

	/**
	 * Mark all unread notifications as read for a user
	 * @param $user User
	 */
	abstract public function markAllRead( $user );

	/**
	 * Retrieves number of unread notifications that a user has.
	 * @param $user User object to check notifications for
	 * @param $dbSource string use master or slave storage to pull count
	 * @return int
	 */
	abstract public function getNotificationCount( $user, $dbSource );

	/**
	 * Get the event ids for corresponding unread notifications for an
	 * event type
	 * @param $user User object to check notification for
	 * @param $type string event type
	 * @return array
	 */
	abstract public function getUnreadNotifications( $user, $type );

}
