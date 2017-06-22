<?php

class EchoNotificationJob extends Job {
	function __construct( $title, $params ) {
		parent::__construct( 'EchoNotificationJob', $title, $params );
		$this->event = $params['event'];
	}

	function run() {
		// back compat for jobs still in queue, new jobs
		// masterPos is always set. remove after deploy.
		if ( isset( $this->params['masterPos'] ) ) {
			$masterPos = $this->params['masterPos'];
		} else {
			$masterPos = $this->getMasterPosition();
		}

		MWEchoDbFactory::newFromDefault()->waitFor( $masterPos );
		EchoNotificationController::notify( $this->event, false );

		return true;
	}

	/**
	 * back compat detects masterPos from prior job params
	 *
	 * @return array
	 */
	function getMasterPosition() {
		$masterPos = [
			'wikiDb' => false,
			'echoDb' => false,
		];
		if ( !empty( $this->params['mainDbMasterPos'] ) ) {
			$masterPos['wikiDb'] = $this->params['mainDbMasterPos'];
		}
		if ( !empty( $this->params['echoDbMasterPos'] ) ) {
			$masterPos['echoDb'] = $this->params['echoDbMasterPos'];
		}

		return $masterPos;
	}
}
