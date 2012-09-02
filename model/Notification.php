<?php

class EchoNotification {
	protected $id = false;
	protected $user = false;
	protected $event = false;
	protected $timestamp = false;
	protected $readTimestamp = null;

	/**
	 * Do not use this constructor.
	 */
	protected function __construct() {
	}

	/**
	 * Creates an EchoNotification object
	 * @param $info array Named arguments:
	 * event: (required) The EchoEvent being notified about.
	 * user: (required) The User being notified.
	 *
	 * @throws MWException
	 * @return EchoNotification
	 */
	public static function create( $info = array() ) {
		$obj = new EchoNotification;
		static $validFields = array( 'event', 'user' );

		$obj->timestamp = wfTimestampNow();

		foreach ( $validFields as $field ) {
			if ( isset( $info[$field] ) ) {
				$obj->$field = $info[$field];
			} else {
				throw new MWException( "Field $field is required" );
			}
		}

		if ( !$obj->user instanceof User &&
			!$obj->user instanceof StubObject
		) {
			throw new MWException( "Invalid user parameter: " . get_class( $obj->user ) );
		}

		if ( !$obj->event instanceof EchoEvent ) {
			throw new MWException( "Invalid event parameter" );
		}

		$obj->insert();

		return $obj;
	}

	/**
	 * Adds this new object to the database.
	 */
	protected function insert() {
		$dbw = wfGetDB( DB_MASTER );

		$row = array(
			'notification_event' => $this->event->getId(),
			'notification_user' => $this->user->getId(),
			'notification_timestamp' => $dbw->timestamp( $this->timestamp ),
			'notification_read_timestamp' => $this->readTimestamp,
		);

		$dbw->insert( 'echo_notification', $row, __METHOD__ );
	}
}
