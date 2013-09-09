<?php

class EchoNotificationJob extends Job {
	function __construct( $title, $params ) {
		parent::__construct( 'EchoNotificationJob', $title, $params );
		$this->event = $params['event'];
	}

	function run() {
		if ( !empty( $this->params['mainDbMasterPos'] ) ) {
			wfGetLB()->waitFor( $this->params['mainDbMasterPos'] );
		}
		if ( !empty( $this->params['echoDbMasterPos'] ) ) {
			global $wgEchoCluster;
			wfGetLBFactory()->getExternalLB( $wgEchoCluster )->waitFor( $this->params['echoDbMasterPos'] );
		}
		EchoNotificationController::notify( $this->event, false );
		return true;
	}
}
