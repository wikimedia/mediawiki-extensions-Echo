<?php

class EchoNotificationJob extends Job {
	private $eventId;

	public function __construct( $title, $params ) {
		parent::__construct( 'EchoNotificationJob', $title, $params );
		$this->eventId = $params['eventId'];
	}

	public function run() {
		MWEchoDbFactory::newFromDefault()->waitForSlaves();
		$event = EchoEvent::newFromID( $this->eventId );
		EchoNotificationController::notify( $event, false );

		return true;
	}
}
