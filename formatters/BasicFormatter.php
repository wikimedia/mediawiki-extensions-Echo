<?php

class EchoBasicFormatter extends EchoNotificationFormatter {
	protected $messageKey = false;
	protected $messageParams = false;
	protected $requiredParameters = array(
		'title-message',
		'title-params',
	);
	protected $validPayloadComponents = array( 'summary', 'snippet', 'welcome' );

	protected $title, $content, $email, $icon;

	public function __construct( $params ) {
		parent::__construct( $params );

		$this->title = array();
		$this->title['message'] = $params['title-message'];
		$this->title['params'] = $params['title-params'];
		$this->payload = array();
		
		if ( isset( $params['payload'] ) ) {
			$this->payload = $params['payload'];
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
	 * Formats a notification
	 *
	 * @param $event EchoEvent that the notification is for.
	 * @param $user User to format the notification for.
	 * @param $type string The type of notification being distributed (e.g. email, notify)
	 * @return array|string
	 */
	public function format( $event, $user, $type ) {
		if ( $this->outputFormat === 'email' ) {
			return $this->formatEmail( $event, $user, $type );
		}

		if ( $this->outputFormat === 'text' ) {
			return $this->formatNotificationTitle( $event, $user )->text();
		}

		// Assume html as the format for the notification

		// Build the notification title
		$title = $this->formatNotificationTitle( $event, $user )->parse();
		$output = Xml::tags( 'div', array( 'class' => 'mw-echo-title' ), $title ) . "\n";

		// Build the notification content
		$content = '';
		foreach ( $this->payload as $payloadComponent ) {
			if ( in_array( $payloadComponent, $this->validPayloadComponents ) ) {
				switch ( $payloadComponent ) {
					case 'summary':
						$content .= $this->formatSummary( $event, $user );
						break;
					case 'snippet':
						// TODO: build this
						break;
					case 'welcome':
						$details = array(
							'message' => 'notification-new-user-content',
							'params' => array( 'agent' )
						);
						$content .= $this->formatFragment( $details, $event, $user )->parse();
						break;
				}
			} else {
				throw new MWException( "Unrecognised payload component $payloadComponent" );
			}
		}
		$output .= Xml::tags( 'div', array( 'class' => 'mw-echo-content' ), $content ) . "\n";

		// Add timestamp
		$output .= $this->formatTimestamp( $event->getTimestamp(), $user );

		// Add the notification icon
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

	protected function formatEmail( $event, $user, $type ) {
		$subject = $this->formatFragment( $this->email['subject'], $event, $user )->text();

		$body = $this->formatFragment( $this->email['body'], $event, $user )->text();

		return array( 'subject' => $subject, 'body' => $body );
	}

	/**
	 * Creates a notification fragment based on a message and parameters
	 *
	 * @param $details array An i18n message and parameters to pass to the message
	 * @param $event EchoEvent that the notification is for.
	 * @param $user User to format the notification for.
	 * @return string
	 */
	protected function formatFragment( $details, $event, $user ) {
		$message = wfMessage( $details['message'] )
			->inLanguage( $user->getOption( 'language' ) );

		$this->processParams( $details['params'], $event, $message, $user );

		return $message;
	}

	/**
	 * Convert the parameters into real values and pass them into the message
	 *
	 * @param $params array
	 * @param $event EchoEvent
	 * @param $message Message
	 * @param $user User
	 */
	protected function processParams( $params, $event, $message, $user ) {
		foreach ( $params as $param ) {
			$this->processParam( $event, $param, $message, $user );
		}
	}

	/**
	 * Helper function for processParams()
	 *
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
		} elseif ( $param === 'text-notification' ) {
			$oldOutputFormat = $this->outputFormat;
			$this->setOutputFormat( 'text' );
			// $type is ignored in this class
			$textNotification = $this->format( $event, $user, '' );
			$this->setOutputFormat( $oldOutputFormat );

			$message->params( $textNotification );
		} elseif ( $param === 'email-footer' ) {
			global $wgEchoEmailFooterAddress;
			$message->params(
				wfMessage( 'echo-email-footer-default' )
				->inLanguage( $user->getOption( 'language' ) )
				->params( $wgEchoEmailFooterAddress )
				->text()
			);
		} else {
			throw new MWException( "Unrecognised parameter $param" );
		}
	}
}
