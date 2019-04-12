<?php

class EchoNotificationJob extends Job {

	public function __construct( $title, $params ) {
		parent::__construct( 'EchoNotificationJob', $title, $params );
	}

	public function run() {
		$eventMapper = new EchoEventMapper();
		$event = $eventMapper->fetchById( $this->params['eventId'], true );
		EchoNotificationController::notify( $event, false );

		return true;
	}
}
