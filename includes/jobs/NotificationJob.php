<?php

class EchoNotificationJob extends Job {
	private $eventId;

	function __construct( $title, $params ) {
		parent::__construct( 'EchoNotificationJob', $title, $params );
		$this->eventId = $params['eventId'];
	}

	function run() {
		MWEchoDbFactory::newFromDefault()->waitForSlaves();
		$event = EchoEvent::newFromID( $this->eventId );
		EchoNotificationController::notify( $event, false );

		return true;
	}
}
