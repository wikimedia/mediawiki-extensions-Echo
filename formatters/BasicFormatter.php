<?php

class EchoBasicFormatter extends EchoNotificationFormatter {
	protected $messageKey = false;
	protected $messageParams = false;

	public function __construct( $params ) {
		if ( !isset($params['message-key']) || !isset($params['message-params']) ) {
			throw new MWException("message-key and message-params parameters are required for an EchoBasicFormatter");
		}

		$this->messageKey = $params['message-key'];
		$this->messageParams = $params['message-params'];
	}

	public function format( $event, $user, $type ) {
		$messageParams = array();

		$message = wfMessage( $this->messageKey );
		foreach( $this->messageParams as $param ) {
			$this->processParam( $event, $param, $message );
		}

		if ( $this->outputFormat == 'html' ) {
			return $message->parse();
		} else {
			return $message->text();
		}
	}

	protected function processParam( $event, $param, $message ) {
		if ( $param === 'agent' ) {
			// Actually converts to two parameters for gender support
			if ( ! $event->getAgent() ) {
				$message->params( '', wfMsg('echo-no-agent') );
			} else {
				$agent = $event->getAgent();
				$message->params( $agent->getName() );
				$message->rawParams( $this->formatUser($agent) );
			}
		} elseif ( $param === 'title' ) {
			if ( ! $event->getTitle() ) {
				$message->params( wfMsg('echo-no-title') );
			} else {
				$message->rawParams( $this->formatTitle( $event->getTitle() ) );
			}
		}
	}
}