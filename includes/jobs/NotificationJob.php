<?php

use MediaWiki\Extension\Notifications\Controller\NotificationController;

class EchoNotificationJob extends Job {

	public function __construct( Title $title, array $params ) {
		$command = isset( $params['jobReleaseTimestamp'] ) ? 'DelayedEchoNotificationJob' : 'EchoNotificationJob';
		parent::__construct( $command, $title, $params );
	}

	public function run() {
		$eventMapper = new EchoEventMapper();
		$event = $eventMapper->fetchById( $this->params['eventId'], true );
		NotificationController::notify( $event, false );

		return true;
	}
}
