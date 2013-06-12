<?php

/**
 * @Todo - Consider having $event/$user as class properties since the formatter is
 * always tied to these two entities, in this case, we won't have to pass it around
 * in all the internal method
 */
class EchoBasicFormatter extends EchoNotificationFormatter {

	/**
	 * Required parameters
	 * @param array
	 */
	protected $requiredParameters = array(
		'title-message',
		'title-params'
	);

	/**
	 * Notification title data for archive page
	 * @param array
	 */
	protected $title;

	/**
	 * Notification title data for flyout
	 * @param array
	 */
	protected $flyoutTitle;

	/**
	 * Notification title data for bundling ( flyout and archive page )
	 */
	protected $bundleTitle;

	/**
	 * @Todo Check if this varaible can be removed
	 */
	protected $content;

	/**
	 * Notification email data
	 * @param array
	 */
	protected $email;

	/**
	 * Notification icon for each type
	 * @param string
	 */
	protected $icon;

	/**
	 * Data for constructing bundle message, data in this array
	 * should be used in function processParams()
	 * @var array
	 */
	protected $bundleData = array (
		'use-bundle' => false
	);

	public function __construct( $params ) {
		parent::__construct( $params );

		// Title for archive page
		$this->title = array(
			'message' => $params['title-message'],
			'params' => $params['title-params']
		);

		// Set up default params if one is missing
		$params += $this->getDefaultParams();

		// Title for the flyout
		$this->flyoutTitle = array(
			'message' => $params['flyout-message'],
			'params' => $params['flyout-params']
		);

		// Bundle title for both archive page and flyout
		$this->bundleTitle = array(
			'message' => $params['bundle-message'],
			'params' => $params['bundle-params']
		);

		// Notification payload data, eg, summary
		$this->payload = $params['payload'];

		// Notification email subject and body
		$this->email = array(
			'subject' => array(
				'message' => $params['email-subject-message'],
				'params' => $params['email-subject-params']
			),
			'body' => array(
				'message' => $params['email-body-message'],
				'params' => $params['email-body-params']
			),
			'batch-body' => array(
				'message' => $params['email-body-batch-message'],
				'params' => $params['email-body-batch-params']
			),
			'batch-bundle-body' => array(
				'message' => $params['email-body-batch-bundle-message'],
				'params' => $params['email-body-batch-bundle-params']
			)
		);

		// Notification icon for the event type
		$this->icon = $params['icon'];
	}

	/**
	 * Internal function that returns notification default params
	 *
	 * @return array
	 */
	protected function getDefaultParams() {
		return array(
			'flyout-message' => $this->title['message'],
			'flyout-params' => $this->title['params'],
			'bundle-message' => '',
			'bundle-params' => array(),
			'payload' => array(),
			'email-subject-message' => 'echo-email-subject-default',
			'email-subject-params' => array(),
			'email-body-message' => 'echo-email-body-default',
			'email-body-params' => array( 'text-notification' ),
			'email-body-batch-message' => 'echo-email-batch-body-default',
			'email-body-batch-params' => array(),
			'email-body-batch-bundle-message' => '',
			'email-body-batch-bundle-params' => array(),
			'icon' => 'placeholder'
		);
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
		global $wgExtensionAssetsPath, $wgEchoNotificationIcons;

		// Use the bundle message if use-bundle is true and there is a bundle message
		$this->generateBundleData( $event, $user, $type );
		if ( $this->bundleData['use-bundle'] && isset( $this->bundleTitle['message'] ) ) {
			$this->title = $this->flyoutTitle = $this->bundleTitle;
		}

		if ( $this->outputFormat === 'email' ) {
			return $this->formatEmail( $event, $user, $type );
		}

		if ( $this->outputFormat === 'text' ) {
			return $this->formatNotificationTitle( $event, $user )->text();
		}

		$iconInfo = $wgEchoNotificationIcons[$this->icon];
		if ( isset( $iconInfo['url'] ) && $iconInfo['url'] ) {
			$iconUrl = $iconInfo['url'];
		} else {
			if ( !isset( $iconInfo['path'] ) || !$iconInfo['path'] ) {
				// Fallback in case icon is not configured; mainly intended for 'site'
				$iconInfo = $wgEchoNotificationIcons['placeholder'];
			}
			$iconUrl = "$wgExtensionAssetsPath/{$iconInfo['path']}";
		}

		// Assume html as the format for the notification
		$output = Html::element(
			'img',
			array(
				'class' => "mw-echo-icon",
				'src' => $iconUrl,
			)
		);

		// Add the hidden dismiss interface if the notification is dismissable
		/* Disabling dismiss interface until there is consensus on how it should be implemented
		if ( $event->isDismissable( 'web' ) ) {
			$output .= $this->formatDismissInterface( $event, $user );
		}
		*/

		// Build the notification title
		$content = Xml::tags(
			'div',
			array( 'class' => 'mw-echo-title' ),
			$this->formatNotificationTitle( $event, $user )->parse()
		) . "\n";

		// Build the notification payload
		$payload = '';
		foreach ( $this->payload as $payloadComponent ) {
			$payload .= $this->formatPayload( $payloadComponent, $event, $user );
		}

		if ( $payload !== '' ) {
			$content .= Xml::tags( 'div', array( 'class' => 'mw-echo-payload' ), $payload ) . "\n";
		}

		// Add footer (timestamp and secondary link)
		$content .= $this->formatFooter( $event, $user );

		// Add the primary link (hidden)
		if ( $this->outputFormat === 'flyout' ) {
			$content .= $this->getLink( $event, $user, 'primary' );
		}

		$output .= Xml::tags( 'div', array( 'class' => 'mw-echo-content' ), $content ) . "\n";

		// The state div is used to visually indicate read or unread status. This is
		// handled in a separate element than the notification element so that things
		// like the close box won't inherit the greyed out opacity (which can't be reset).
		$output = Xml::tags( 'div', array( 'class' => 'mw-echo-state' ), $output ) . "\n";

		return $output;
	}

	/**
	 * Format notification dismiss interface
	 *
	 * @param $event EchoEvent
	 * @param $user User
	 * @return string
	 */
	protected function formatDismissInterface( $event, $user ) {
		$userLanguage = $user->getOption( 'language' );

		$dismissTitle = wfMessage( 'echo-category-title-' . $event->getCategory() )
			->inLanguage( $userLanguage )
			->numParams( 1 )
			->text();
		$dismissMessage = wfMessage( 'echo-dismiss-message', $dismissTitle )
			->inLanguage( $userLanguage )
			->escaped();
		$dismiss = Xml::tags( 'div', array( 'class' => 'mw-echo-dismiss-message' ), $dismissMessage ) . "\n";
		$prefsMessage = wfMessage( 'echo-dismiss-prefs-message' )
			->inLanguage( $userLanguage )
			->escaped();
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
	 * @return array
	 */
	protected function formatEmail( $event, $user, $type ) {
		$subject = $this->formatFragment( $this->email['subject'], $event, $user )->text();

		$body = preg_replace( "/\n{3,}/", "\n\n", $this->formatFragment( $this->email['body'], $event, $user )->text() );

		if ( $this->bundleData['use-bundle'] && $this->email['batch-bundle-body'] ) {
			$bodyKey = $this->email['batch-bundle-body'];
		} else {
			$bodyKey = $this->email['batch-body'];
		}

		$batchBody = preg_replace( "/\n{3,}/", "\n\n", $this->formatFragment( $bodyKey, $event, $user )->text() );

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
				return $this->formatRevisionComment( $event, $user );
				break;
			case 'comment-text':
				return $this->formatCommentText( $event, $user );
				break;
			default:
				return '';
		}
	}

	/**
	 * Extract the comment left by a user on a talk page from the event.
	 * @param $event EchoEvent The event to format the comment of
	 * @param $user User The user to format content for
	 * @return string Up to the first 200 characters of the comment
	 */
	protected function formatCommentText( EchoEvent $event, $user ) {
		if ( !$event->userCan( Revision::DELETED_TEXT, $user ) ) {
			return wfMessage( 'echo-rev-deleted-text-view' )->text();
		}
		$extra = $event->getExtra();
		if ( !isset( $extra['content'] ) ) {
			return '';
		}
		$content = EchoDiscussionParser::stripHeader( $extra['content'] );
		$content = EchoDiscussionParser::stripSignature( $content );
		$content = EchoDiscussionParser::stripIndents( $content );
		return EchoDiscussionParser::getTextSnippet( $content, 200 );
	}

	/**
	 * Extract the subject anchor (linkable portion of the edited page) from
	 * the event.
	 *
	 * @param $event EchoEvent The event to format the subject anchor of
	 * @return string The anchor on page, or an empty string
	 */
	protected function formatSubjectAnchor( EchoEvent $event ) {
		global $wgParser, $wgUser;

		if ( !$event->userCan( Revision::DELETED_TEXT, $wgUser ) ) {
			return wfMessage( 'echo-rev-deleted-text-view' )->text();
		}
		$extra = $event->getExtra();
		if ( empty( $extra['section-title'] ) ) {
			return '';
		}

		// Strip out #, keeping # in the i18n message makes it look more clear
		return substr( $wgParser->guessLegacySectionNameFromWikiText( $extra['section-title'] ), 1 );
	}

	/**
	 * Build the footer for the notification (timestamp and secondary link)
	 * @param EchoEvent $event
	 * @param User $user The user to format the notification for.
	 * @return String HTML
	 */
	protected function formatFooter( $event, $user ) {
		global $wgLang;
		$timestamp = $this->formatTimestamp( $event->getTimestamp() );
		$notificationFooterContent = array();
		if ( $this->outputFormat === 'flyout' ) {
			$secondaryLink = $this->getLink( $event, $user, 'secondary' );
			if ( $secondaryLink ) {
				$notificationFooterContent[] = $timestamp;
				$notificationFooterContent[] = $secondaryLink;
				$footer = $wgLang->pipeList( $notificationFooterContent );
			}
		}
		if ( !$notificationFooterContent ) {
			$footer = $timestamp;
		}
		return Xml::tags( 'div', array( 'class' => 'mw-echo-notification-footer' ), $footer ) . "\n";
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
			$fragment = $props['fragment'];
		} else {
			$fragment = $this->formatSubjectAnchor( $event );
		}
		$title->setFragment( "#$fragment" );

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
			// plain text email in some mail client is messing with
			// ending punctuation in links, it is better to encode them
			$url = $title->getCanonicalURL( $param );
			// $url should contain all ascii characters now, it's safe to use substr()
			$lastChar = substr( $url, -1 );
			if ( $lastChar && !ctype_alnum( $lastChar ) ) {
				$lastChar = str_replace(
					array( '.', '-', '(', ';', '!', ':', ',' ),
					array( '%2E', '%2D', '%28', '%3B', '%21', '%3A', '%2C' ),
					$lastChar
				);
				$url = substr( $url, 0, -1 ) . $lastChar;
			}
			$message->params( $url );
		} else {
			$message->params( $title->getFullURL( $param ) );
		}
	}

	/**
	 * Get raw bundle data for an event so it can be manipulated
	 * @param $event EchoEvent
	 * @param $user User
	 * @param $type string Notification distribution type: web/email
	 * @return ResultWrapper|bool
	 */
	protected function getRawBundleData( $event, $user, $type ) {
		global $wgEchoBackend;

		// We should keep bundling for events as long as it has bundle
		// hash event for bundle-turned-off events as well, this is
		// mainly for historical data
		if ( !$event->getBundleHash() ) {
			return false;
		}

		return $wgEchoBackend->getRawBundleData( $user, $event->getBundleHash(), $type );
	}

	/**
	 * Construct the bundle data for an event, by default, the group iterator
	 * is agent, eg, by user A and x others. custom formatter can overwrite
	 * this function to use a differnt group iterator such as title, namespace
	 * @param $event EchoEvent
	 * @param $user User
	 * @param $type string Notification distribution type
	 */
	protected function generateBundleData( $event, $user, $type ) {
		global $wgEchoMaxNotificationCount;

		$data = $this->getRawBundleData( $event, $user, $type );

		if ( !$data ) {
			return;
		}

		$agents = array();
		$agent = $event->getAgent();
		if ( $agent ) {
			if ( $agent->isAnon() ) {
				$agents[$agent->getName()] = $agent->getName();
			} else {
				$agents[$agent->getId()] = $agent->getId();
			}
		} else {
			throw new MWException( "Agent is required for bundling notification!" );
		}

		// Initialize with 1 for the agent of current event
		$count = 1;
		foreach ( $data as $row ) {
			$key = $row->event_agent_id ? 'event_agent_id' : 'event_agent_ip';
			if ( !isset( $agents[$row->$key] ) ) {
				$agents[$row->$key] = $row->$key;
				$count++;
			}

			if ( $count > $wgEchoMaxNotificationCount + 1 ) {
				break;
			}
		}

		$this->bundleData['agent-other-count'] = $count - 1;
		if ( $count > 1 ) {
			$this->bundleData['use-bundle'] = true;
		}
	}

	/**
	 * @return array
	 */
	public function getBundleData() {
		return $this->bundleData;
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
	 * Get the URL for the primary or secondary link for an event
	 *
	 * @param EchoEvent $event
	 * @param User $user The user receiving the notification
	 * @param String $rank 'primary' or 'secondary' (default is 'primary')
	 * @param boolean $local True to return a local (relative) URL, false to
	 *     return a full URL (for email for example) (default is true)
	 * @param boolean $urlOnly True to return only the URL without the <a> tag,
	 *     false to return a full anchor link (default is false)
	 * @param String $style A style attribute to apply to the anchor, e.g.
	 *     'border: 1px solid green; text-decoration: none;' (optional)
	 * @return String URL for link, or HTML for anchor tag, or empty string
	 */
	protected function getLink( $event, $user, $rank = 'primary', $local = true, $urlOnly = false, $style = '' ) {
		$destination = $event->getLinkDestination( $rank );
		if ( !$destination ) {
			return '';
		}
		// Get link parameters based on the destination
		list( $target, $query ) = $this->getLinkParams( $event, $user, $destination );
		if ( !$target ) {
			return '';
		}
		if ( $urlOnly ) {
			if ( $local ) {
				return $target->getLinkURL( $query );
			} else {
				return $target->getCanonicalURL( $query );
			}
		} else {
			$message = wfMessage( $event->getLinkMessage( $rank ) )->text();
			$attribs = array( 'class' => "mw-echo-notification-{$rank}-link" );
			if ( $style ) {
				$attribs['style'] = $style;
			}
			$options = array();
			// If local is false, return an absolute url using HTTP protocol
			if ( !$local ) {
				$options[] = 'http';
			}
			return Linker::link( $target, $message, $attribs, $query, $options );
		}
	}

	/**
	 * Helper function for getLink()
	 *
	 * @param EchoEvent $event
	 * @param User $user The user receiving the notification
	 * @param String $destination The destination type for the link, e.g. 'agent'
	 * @return Array including target and query parameters
	 */
	protected function getLinkParams( $event, $user, $destination ) {
		$target = null;
		$query = array();
		// Set up link parameters based on the destination
		switch ( $destination ) {
			case 'agent':
				if ( $event->getAgent() ) {
					$target = $event->getAgent()->getUserPage();
				}
				break;
			case 'title':
				$target = $event->getTitle();
				break;
			case 'section':
				$target = $event->getTitle();
				if ( $target ) {
					$fragment = $this->formatSubjectAnchor( $event );
					if ( $fragment ) {
						$target->setFragment( "#$fragment" );
					}
				}
				break;
			case 'diff':
				$eventData = $event->getExtra();
				if ( isset( $eventData['revid'] ) && $event->getTitle() ) {
					$target = $event->getTitle();
					$query = array(
						'oldid' => $eventData['revid'],
						'diff' => 'prev',
					);
				}
				break;
		}
		return array( $target, $query );
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
			if ( !$event->getAgent() ) {
				$message->params( wfMessage( 'echo-no-agent' )->text() );
			} elseif ( !$event->userCan( Revision::DELETED_USER, $user ) ) {
				$message->params( wfMessage( 'rev-deleted-user' )->text() );
			} else {
				$message->params( $event->getAgent()->getName() );
			}
		// example: {7} others, {99+} others
		} elseif ( $param === 'agent-other-display') {
			global $wgEchoMaxNotificationCount;

			if ( $this->bundleData['agent-other-count'] > $wgEchoMaxNotificationCount ) {
				$message->params(
					wfMessage( 'echo-notification-count' )
					->inLanguage( $user->getOption( 'language' ) )
					->params( $wgEchoMaxNotificationCount )
					->text()
				);
			} else {
				$message->params( $this->bundleData['agent-other-count'] );
			}
		// the number used for plural support
		} elseif ( $param === 'agent-other-count') {
			$message->params( $this->bundleData['agent-other-count'] );
		} elseif ( $param === 'user' ) {
			$message->params( $user->getName() );
		} elseif ( $param === 'title' ) {
			if ( !$event->getTitle() ) {
				$message->params( wfMessage( 'echo-no-title' )->text() );
			} else {
				$message->params( $this->formatTitle( $event->getTitle() ) );
			}
		} elseif ( $param === 'titlelink' ) {
			$this->setTitleLink( $event, $message );
		} elseif ( $param === 'text-notification' ) {
			$oldOutputFormat = $this->outputFormat;
			$this->setOutputFormat( 'text' );
			// $type is ignored in this class
			$textNotification = $this->format( $event, $user, '' );
			$this->setOutputFormat( $oldOutputFormat );

			$message->params( $textNotification );
		} elseif ( $param === 'email-intro' ) {
			if ( $this->bundleData['use-bundle'] && isset( $this->email['batch-bundle-body']['message'] ) ) {
				$detail = array(
					'message' => $this->email['batch-bundle-body']['message'],
					'params' => $this->email['batch-bundle-body']['params']
				);
			} else {
				$detail = array(
					'message' => $this->email['batch-body']['message'],
					'params' => $this->email['batch-body']['params']
				);
			}
			$message->params( $this->formatFragment( $detail, $event, $user )->text() );
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
