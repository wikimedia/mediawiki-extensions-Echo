<?php

/**
 * @Todo - Consider having $event/$user as class properties since the formatter is
 * always tied to these two entities, in this case, we won't have to pass it around
 * in all the internal method
 */
class EchoBasicFormatter extends EchoNotificationFormatter {
	protected $messageKey = false;
	protected $messageParams = false;
	protected $requiredParameters = array(
		'title-message',
		'title-params',
	);

	protected $title, $flyoutTitle, $content, $email, $icon;

	public function __construct( $params ) {
		parent::__construct( $params );

		$this->title = array();
		$this->flyoutTitle = array();
		if ( isset( $params['flyout-message'] ) && isset( $params['flyout-params'] ) ) {
			$this->flyoutTitle['message'] = $params['flyout-message'];
			$this->flyoutTitle['params'] = $params['flyout-params'];
		} else {
			$this->flyoutTitle['message'] = $params['title-message'];
			$this->flyoutTitle['params'] = $params['title-params'];
		}
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
		} else {
			$this->email['body'] = array(
				'message' => 'echo-email-body-default',
				'params' => array(
					'text-notification',
				),
			);
		}

		$this->email['batch-body'] = array();
		if ( isset( $params['email-body-batch-message'] ) ) {
			$this->email['batch-body']['message'] = $params['email-body-batch-message'];
			if ( isset( $params['email-body-batch-params'] ) ) {
				$this->email['batch-body']['params'] = $params['email-body-batch-params'];
			} else {
				$this->email['batch-body']['params'] = array();
			}
		} else {
			$this->email['batch-body'] = $this->email['body'];
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
	 * @param $type string The type of notification being distributed (e.g. email, web)
	 * @return array|string
	 */
	public function format( $event, $user, $type ) {
		global $wgEchoNotificationCategories;

		if ( $this->outputFormat === 'email' ) {
			return $this->formatEmail( $event, $user, $type );
		}

		if ( $this->outputFormat === 'text' ) {
			return $this->formatNotificationTitle( $event, $user )->text();
		}

		// Assume html as the format for the notification

		$output = '';

		// Add the notification icon
		if ( !$this->icon ) {
			$this->icon = 'placeholder';
		}
		$output = Xml::tags( 'div',
			array( 'class' => "mw-echo-icon mw-echo-icon-{$this->icon}" ),
			'&nbsp;'
		) . $output;

		// Add the hidden dismiss interface if the notification is dismissable
		$category = EchoNotificationController::getNotificationCategory( $event->type );
		if ( isset( $wgEchoNotificationCategories[$category]['no-dismiss'] ) ) {
			$noDismiss = $wgEchoNotificationCategories[$category]['no-dismiss'];
		} else {
			$noDismiss = array();
		}
		if ( !in_array( 'web', $noDismiss ) && !in_array( 'all' , $noDismiss ) ) {
			$output .= $this->formatDismissInterface( $event, $user );
		}

		// Build the notification title
		$title = $this->formatNotificationTitle( $event, $user )->parse();
		$content = Xml::tags( 'div', array( 'class' => 'mw-echo-title' ), $title ) . "\n";

		// Build the notification payload
		$payload = '';
		foreach ( $this->payload as $payloadComponent ) {
			$payload .= $this->formatPayload( $payloadComponent, $event, $user );
		}

		if ( $payload !== '' ) {
			$content .= Xml::tags( 'div', array( 'class' => 'mw-echo-payload' ), $payload ) . "\n";
		}

		// Add timestamp
		$content .= $this->formatTimestamp( $event->getTimestamp() );

		$output .= Xml::tags( 'div', array( 'class' => 'mw-echo-content' ), $content ) . "\n";

		// The state div is used to visually indicate read or unread status. This is
		// handled in a separate element than the notification element so that things
		// like the close box won't inherit the greyed out opacity (which can't be reset).
		$output = Xml::tags( 'div', array( 'class' => 'mw-echo-state' ), $output ) . "\n";

		return $output;
	}

	/**
	 * @param $event EchoEvent
	 * @param $user User
	 * @return string
	 */
	protected function formatDismissInterface( $event, $user ) {
		$dismissTitle = wfMessage( 'echo-dismiss-title-' . $event->type )
			->inLanguage( $user->getOption( 'language' ) )
			->escaped();
		$dismissMessage = wfMessage( 'echo-dismiss-message', $dismissTitle )
			->inLanguage( $user->getOption( 'language' ) )
			->text();
		$dismiss = Xml::tags( 'div', array( 'class' => 'mw-echo-dismiss-message' ), $dismissMessage ) . "\n";
		$prefsMessage = wfMessage( 'echo-dismiss-prefs-message' )
			->inLanguage( $user->getOption( 'language' ) )
			->text();
		$dismiss .= Xml::tags( 'div', array( 'class' => 'mw-echo-prefs-dismiss-message' ), $prefsMessage ) . "\n";
		$dismiss = Xml::tags( 'div', array( 'class' => 'mw-echo-dismiss', 'style' => 'display:none;' ), $dismiss ) . "\n";
		return $dismiss;
	}

	/**
	 * @param $event EchoEvent
	 * @param $user User
	 * @return string
	 */
	protected function formatNotificationTitle( $event, $user ) {
		if ( $this->outputFormat === 'flyout' ) {
			return $this->formatFragment( $this->flyoutTitle, $event, $user );
		} else {
			return $this->formatFragment( $this->title, $event, $user );
		}
	}

	/**
	 * @param $event EchoEvent
	 * @param $user User
	 * @param $type
	 * @return string
	 */
	protected function formatEmail( $event, $user, $type ) {
		$subject = $this->formatFragment( $this->email['subject'], $event, $user )->text();

		$body = preg_replace( "/\n{3,}/", "\n\n", $this->formatFragment( $this->email['body'], $event, $user )->text() );

		$batchBody = preg_replace( "/\n{3,}/", "\n\n", $this->formatFragment( $this->email['batch-body'], $event, $user )->text() );

		return array( 'subject' => $subject, 'body' => $body, 'batch-body' => $batchBody );
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
	 * Formats the payload of a notification, child method overwriting this method should
	 * always call this method in default case so they can use the payload defined in this
	 * function as well
	 * @param $payload string
	 * @param $event EchoEvent
	 * @param $user User
	 * @return string
	 */
	protected function formatPayload( $payload, $event, $user ) {
		switch ( $payload ) {
			case 'summary':
				return $this->formatSummary( $event, $user );
				break;
			case 'welcome':
				$details = array(
					'message' => 'notification-new-user-content',
					'params' => array( 'agent' )
				);
				return $this->formatFragment( $details, $event, $user )->parse();
				break;
			default:
				return '';
		}
	}

	/**
	 * Generate links based on output format and passed properties
	 * $event EchoEvent
	 * $message Message
	 * $props array
	 */
	protected function setTitleLink( $event, $message, $props = array() ) {
		if ( !$event->getTitle() ) {
			$message->params( wfMessage( 'echo-no-title' )->text() );
			return;
		}

		$title = $event->getTitle();

		$param = array();
		if ( isset( $props['param'] ) ) {
			$param = (array)$props['param'];
		}

		if ( isset( $props['fragment'] ) ) {
			$title->setFragment( '#' . $props['fragment'] );
		}

		if ( $this->outputFormat === 'html' || $this->outputFormat === 'flyout' ) {
			$class = array();
			if ( isset( $props['class'] ) ) {
				$class['class'] = $props['class'];
			}

			if ( isset( $props['linkText'] ) ) {
				$linkText = $props['linkText'];
			} else {
				$linkText = htmlspecialchars( $title->getPrefixedText() );
			}

			$message->rawParams( Linker::link( $title, $linkText, $class, $param ) );
		} elseif ( $this->outputFormat === 'email' ) {
			$message->params( $title->getCanonicalURL( $param ) );
		} else {
			$message->params( $title->getFullURL( $param ) );
		}
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
				->params( $wgEchoEmailFooterAddress, wfMessage( 'echo-email-batch-separator' )->text() )
				->text()
			);
		} else {
			throw new MWException( "Unrecognised parameter $param" );
		}
	}
}
