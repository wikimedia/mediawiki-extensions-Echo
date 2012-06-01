<?php

class EchoBasicFormatter extends EchoNotificationFormatter {
	protected $messageKey = false;
	protected $messageParams = false;

	public function __construct( $params ) {
		parent::__construct($params);
		if ( !isset($params['message-key']) || !isset($params['message-params']) ) {
			throw new MWException("message-key and message-params parameters are required for an EchoBasicFormatter");
		}

		$this->messageKey = $params['message-key'];
		$this->messageParams = $params['message-params'];
	}

	public function format( $event, $user, $type ) {
		$messageParams = array();

		if ( $this->outputFormat === 'email' ) {
			return $this->formatEmail( $event, $user, $type );
		}

		$message = wfMessage( $this->messageKey );
		$this->processParams( $event, $message, $user );

		if ( $this->outputFormat === 'html' ) {
			return $message->parse();
		} else {
			return $message->text();
		}
	}

	protected function formatEmail( $event, $user, $type ) {
		$params = $this->parameters;
		$language = $user->getOption('language');

		if ( isset($params['email-subject-message']) ) {
			$subjectMsg = wfMessage( $params['email-subject-message'] )
				->inLanguage($language);
			$this->processParams( $event, $subjectMsg, $user );
			$subject = $subjectMsg
				->text();
		} else {
			$subject = wfMessage('echo-email-subject-default')
					->inLanguage($language)
					->text();
		}

		if ( isset( $params['email-body-message']) ) {
			$bodyMsg = wfMessage( $params['email-body-message'] )
					->inLanguage($language);
			$this->processParams( $event, $bodyMsg, $user );
			$body = $bodyMsg
				->text();
		} else {
			$this->setOutputFormat('text');
			$textNotification = $this->format( $event, $user, $type );
			$this->setOutputFormat('email');
			$body = wfMessage('echo-email-body-default')
				->inLanguage($language)
				->params($textNotification)
				->text();
		}

		return array( 'subject' => $subject, 'body' => $body );
	}

	protected function processParams( $event, $message, $user ) {
		foreach( $this->messageParams as $param ) {
			$this->processParam( $event, $param, $message, $user );
		}
	}

	protected function processParam( $event, $param, $message, $user ) {
		if ( $param === 'agent' ) {
			// Actually converts to two parameters for gender support
			if ( ! $event->getAgent() ) {
				$message->params( '', wfMsg('echo-no-agent') );
			} else {
				$agent = $event->getAgent();
				$message->params( $agent->getName() );
				$message->rawParams( $this->formatUser($agent) );
			}
		} elseif ( $param === 'user' ) {
			$message->params( $user->getName() );
		} elseif ( $param === 'title' ) {
			if ( ! $event->getTitle() ) {
				$message->params( wfMsg('echo-no-title') );
			} else {
				$message->rawParams( $this->formatTitle( $event->getTitle() ) );
			}
		} else {
			throw new MWException( "Unrecognised parameter $param" );
		}
	}
}