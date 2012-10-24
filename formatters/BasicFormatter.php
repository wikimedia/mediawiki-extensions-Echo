<?php

class EchoBasicFormatter extends EchoNotificationFormatter {
	protected $messageKey = false;
	protected $messageParams = false;
	protected $requiredParameters = array(
		'title-message',
		'title-params',
	);

	protected $title, $content, $email, $icon;

	public function __construct( $params ) {
		parent::__construct( $params );

		$this->title = array();
		$this->title['message'] = $params['title-message'];
		$this->title['params'] = $params['title-params'];

		if ( isset( $params['content-message'] ) ) {
			$this->content = array();
			$this->content['message'] = $params['content-message'];

			if ( isset( $params['content-params'] ) ) {
				$this->content['params'] = $params['content-params'];
			} else {
				$this->content['params'] = array();
			}
		}

		$this->email = array();
		if ( isset( $params['email-subject-message'] ) ) {
			$this->email['subject'] = array();
			$this->email['subject']['message'] = $params['email-subject-message'];

			if ( isset( $params['email-subject-params'] ) ) {
				$this->email['subject']['params'] = $params['email-subject-params'];
			} else {
				$this->email['subject']['params'] = array();
			}
		} else {
			$this->email = array(
				'subject' => array(
					'message' => 'echo-email-subject-default',
					'params' => array(),
				),
				'body' => array(
					'message' => 'echo-email-body-default',
					'params' => array(
						'text-notification',
					),
				),
			);
		}

		if ( isset( $params['email-body-message'] ) ) {
			$this->email['body'] = array();
			$this->email['body']['message'] = $params['email-body-message'];

			if ( isset( $params['email-body-params'] ) ) {
				$this->email['body']['params'] = $params['email-body-params'];
			} else {
				$this->email['body']['params'] = array( 'text-notification' );
			}
		}

		if ( isset( $params['icon'] ) ) {
			$this->icon = $params['icon'];
		}
	}

	/**
	 * @param $event EchoEvent
	 * @param $user User
	 * @param $type string
	 * @return array|string
	 */
	public function format( $event, $user, $type ) {
		if ( $this->outputFormat === 'email' ) {
			return $this->formatEmail( $event, $user, $type );
		}

		if ( $this->outputFormat === 'text' ) {
			return $this->formatNotificationTitle( $event, $user )->text();
		}

		// Assume html
		$title = $this->formatNotificationTitle( $event, $user )->parse();
		$output = Xml::tags( 'div', array( 'class' => 'mw-echo-title' ), $title ) . "\n";
		if ( !is_null( $this->content ) ) {
			$content = $this->formatContent( $event, $user );
			$content .= ' ' . $this->formatTimestamp( $event->getTimestamp(), $user );
			$output .= Xml::tags( 'div', array( 'class' => 'mw-echo-content' ), $content ) . "\n";
		} else {
			$content = $this->formatTimestamp( $event->getTimestamp(), $user );
			$output .= Xml::tags( 'div', array( 'class' => 'mw-echo-content' ), $content ) . "\n";
		}

		if ( !is_null( $this->icon ) ) {
			$output = Xml::tags( 'div',
				array( 'class' => "mw-echo-icon mw-echo-icon-{$this->icon}" ),
				'&nbsp;'
			) . $output;
		}

		return $output;
	}

	protected function formatNotificationTitle( $event, $user ) {
		return $this->formatFragment( $this->title, $event, $user );
	}

	protected function formatContent( $event, $user ) {
		if ( is_null( $this->content ) ) {
			return '';
		}

		return $this->formatFragment( $this->content, $event, $user )->parse();
	}

	protected function formatFragment( $details, $event, $user ) {
		$message = wfMessage( $details['message'] )
			->inLanguage( $user->getOption( 'language' ) );

		$this->processParams( $details['params'], $event, $message, $user );

		return $message;
	}

	protected function formatEmail( $event, $user, $type ) {
		$subject = $this->formatFragment( $this->email['subject'], $event, $user )->text();

		$body = $this->formatFragment( $this->email['body'], $event, $user )->text();

		return array( 'subject' => $subject, 'body' => $body );
	}

	protected function processParams( $params, $event, $message, $user ) {
		foreach ( $params as $param ) {
			$this->processParam( $event, $param, $message, $user );
		}
	}

	/**
	 * @param $event EchoEvent
	 * @param $param
	 * @param $message Message
	 * @param $user User
	 * @throws MWException
	 */
	protected function processParam( $event, $param, $message, $user ) {
		if ( $param === 'agent' ) {
			// Actually converts to two parameters for gender support
			if ( !$event->getAgent() ) {
				$message->params( '', wfMessage( 'echo-no-agent' )->text() );
			} else {
				$agent = $event->getAgent();
				$message->params( $agent->getName() );
				$message->rawParams( $this->formatUser( $agent ) );
			}
		} elseif ( $param === 'user' ) {
			$message->params( $user->getName() );
		} elseif ( $param === 'title' ) {
			if ( !$event->getTitle() ) {
				$message->params( wfMessage( 'echo-no-title' )->text() );
			} else {
				$message->params( $this->formatTitle( $event->getTitle() ) );
			}
		} elseif ( $param == 'text-notification' ) {
			$oldOutputFormat = $this->outputFormat;
			$this->setOutputFormat( 'text' );
			// $type is ignored in this class
			$textNotification = $this->format( $event, $user, '' );
			$this->setOutputFormat( $oldOutputFormat );

			$message->params( $textNotification );
		} else {
			throw new MWException( "Unrecognised parameter $param" );
		}
	}
}
