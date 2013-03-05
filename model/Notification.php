<?php

class EchoNotification {

	/**
	 * @var User
	 */
	protected $user;

	/**
	 * @var EchoEvent
	 */
	protected $event;

	/**
	 * @var string
	 */
	protected $timestamp;

	/**
	 * @var string
	 */
	protected $readTimestamp;

	/**
	 * Do not use this constructor.
	 */
	protected function __construct() {}

	/**
	 * Creates an EchoNotification object based on event and user
	 * @param $info array The following keys are required:
	 * - 'event' The EchoEvent being notified about.
	 * - 'user' The User being notified.
	 * @throws MWException
	 * @return EchoNotification
	 */
	public static function create( array $info ) {
		$obj = new EchoNotification();
		static $validFields = array( 'event', 'user' );

		$obj->timestamp = wfTimestampNow();

		foreach ( $validFields as $field ) {
			if ( isset( $info[$field] ) ) {
				$obj->$field = $info[$field];
			} else {
				throw new MWException( "Field $field is required" );
			}
		}

		if ( !$obj->user instanceof User && !$obj->user instanceof StubObject ) {
			throw new MWException( 'Invalid user parameter, expected: User/StubObject object' );
		}

		if ( !$obj->event instanceof EchoEvent ) {
			throw new MWException( 'Invalid event parameter, expected: EchoEvent object' );
		}

		$obj->insert();

		return $obj;
	}

	/**
	 * Adds this new notification object to the backend storage.
	 */
	protected function insert() {
		global $wgEchoBackend;

		$row = array(
			'notification_event' => $this->event->getId(),
			'notification_user' => $this->user->getId(),
			'notification_timestamp' => $this->timestamp,
			'notification_read_timestamp' => $this->readTimestamp,
		);

		$wgEchoBackend->createNotification( $row );
	}

	/**
	 * Getter method
	 * @return EchoEvent The event for this notification
	 */
	public function getEvent() {
		return $this->event;
	}

	/**
	 * Getter method
	 * @return User The recipient of this notification
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * Getter method
	 * @return string Notification creation timestamp
	 */
	public function getTimestamp() {
		return $this->timestamp;
	}

	/**
	 * Getter method
	 * @return string|null Notification read timestamp
	 */
	public function getReadTimestamp() {
		return $this->readTimestamp;
	}
}
