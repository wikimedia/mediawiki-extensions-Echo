<?php

class EchoNotificationJob extends Job {
	function __construct( $title, $params ) {
		parent::__construct( 'EchoNotificationJob', $title, $params );
		$this->event = $params['event'];
	}

	function run() {
		EchoNotificationController::notify( $this->event, false );
		return true;
	}
}
