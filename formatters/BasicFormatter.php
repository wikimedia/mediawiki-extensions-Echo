<?php

/**
 * @Todo - Consider having $event/$user as class properties since the formatter is
 * always tied to these two entities, in this case, we won't have to pass it around
 * in all the internal method
 * @Todo - Instance variable $distributionType has been added, the local distribution
 * type variable $type passed along all the protected/private method should be removed
 * from all formatters
 */
class EchoBasicFormatter extends EchoNotificationFormatter {

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
	 * The language to format a message, default language
	 * is the current language
	 * @param mixed Language code or Language object
	 */
	protected $language;

	/**
	 * Required parameters
	 * @param array
	 */
	protected $requiredParameters = array (
		'title-message'
	);

	/**
	 * Data for constructing bundle message, data in this array
	 * should be used in function processParams()
	 * @var array
	 */
	protected $bundleData = array (
		'use-bundle' => false,
		'raw-data-count' => 1
	);

	/**
	 * Max number of raw bundle data to query for each bundle event
	 */
	protected static $maxRawBundleData = 250;

	/**
	 * @param array
	 */
	public function __construct( $params ) {
		parent::__construct( $params );

		// Set up default params if any are missing
		$params = $this->setDefaultParams( $params );

		// Title for archive page
		$this->title = array(
			'message' => $params['title-message'],
			'params' => $params['title-params']
		);

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
	 * Internal function for setting notification default params
	 * @param $params array
	 * @return array
	 */
	protected function setDefaultParams( $params ) {
		$params += array(
			'title-params' => array(),
			'bundle-message' => '',
			'bundle-params' => array(),
			'payload' => array(),
			'email-subject-message' => 'echo-email-subject-default',
			'email-subject-params' => array(),
			'email-body-batch-message' => 'echo-email-batch-body-default',
			'email-body-batch-params' => array(),
			'email-body-batch-bundle-message' => '',
			'email-body-batch-bundle-params' => array(),
			'icon' => 'placeholder'
		);

		// default flyout-message to title-message if not defined
		$params += array ( 'flyout-message' => $params['title-message'],  'flyout-params' => $params['title-params'] );

		return $params;
	}

	/**
	 * Apply some custom change before formatting, child class overwriting this method
	 * should always invoke a call to the parent method unless child class wants to overwrite
	 * the default completely
	 *
	 * @param $event EchoEvent that the notification is for.
	 * @param $user User to format the notification for.
	 * @param $type string deprecated
	 */
	protected function applyChangeBeforeFormatting( EchoEvent $event, User $user, $type ) {
		// Use the bundle message if use-bundle is true and there is a bundle message
		$this->generateBundleData( $event, $user, $type );
		if ( $this->bundleData['use-bundle'] && $this->bundleTitle['message'] ) {
			$this->title = $this->flyoutTitle = $this->bundleTitle;
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
		global $wgExtensionAssetsPath, $wgEchoNotificationIcons, $wgLang;

		$this->setDistributionType( $type );
		$this->applyChangeBeforeFormatting( $event, $user, $type );

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
			if ( is_array( $iconInfo['path'] ) ) {
				$dir = $wgLang->getDir();
				if ( isset( $iconInfo['path'][$dir] ) ) {
					$path = $iconInfo['path'][$dir];
				} else {
					wfDebugLog( 'Echo', "The \"{$this->icon}\" icon does not have anything set for $dir direction." );
					$path = $wgEchoNotificationIcons['placeholder']['path']; // Fallback
				}
			} else {
				$path = $iconInfo['path'];
			}
			$iconUrl = "$wgExtensionAssetsPath/$path";
		}

		// Assume html as the format for the notification
		$output = Html::element(
			'img',
			array(
				'class' => "mw-echo-icon",
				'src' => $iconUrl,
			)
		);

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
	 * Create text version and/or html version for email notification
	 *
	 * @param $event EchoEvent
	 * @param $user User
	 * @param $type string deprecated
	 * @return array
	 */
	protected function formatEmail( $event, $user, $type ) {
		// Email should be always sent in user language
		$this->language = $user->getOption( 'language' );

		// Email digest
		if ( $this->distributionType === 'emaildigest' ) {
			return $this->formatEmailDigest( $event, $user );
		}

		// Echo single email
		$emailSingle = new EchoEmailSingle( $this, $event, $user );

		$textEmailFormatter = new EchoTextEmailFormatter( $emailSingle );
		$content = array(
			// Single email subject, there is no need to to escape it for either html
			// or text email since it's always treated as plain text by mail client
			'subject' => $this->formatFragment( $this->email['subject'], $event, $user )->text(),
			// Single email text body
			'body' => $textEmailFormatter->formatEmail(),
		);

		$format = MWEchoNotifUser::newFromUser( $user )->getEmailFormat();
		if ( $format == EchoHooks::EMAIL_FORMAT_HTML ) {
			$htmlEmailFormatter = new EchoHTMLEmailFormatter( $emailSingle );
			$outputFormat = $this->outputFormat;
			$this->setOutputFormat( 'htmlemail' );
			// Add single email html body if user prefers html format
			$content['body'] = array (
				'text' => $content['body'],
				'html' => $htmlEmailFormatter->formatEmail()
			);
			$this->setOutputFormat( $outputFormat );
		}

		return $content;
	}

	/**
	 * Format text and/or html verion of email digest fragment for this event
	 * @param $event EchoEvent
	 * @param $user User
	 * @return array
	 */
	protected function formatEmailDigest( $event, $user ) {
		if ( $this->bundleData['use-bundle'] && $this->email['batch-bundle-body'] ) {
			$key = $this->email['batch-bundle-body'];
		} else {
			$key = $this->email['batch-body'];
		}

		// Email digest text body
		$content = array( 'batch-body' => $this->formatFragment( $key, $event, $user )->text() );
		$format = MWEchoNotifUser::newFromUser( $user )->getEmailFormat();
		if ( $format == EchoHooks::EMAIL_FORMAT_HTML ) {
			$outputFormat = $this->outputFormat;
			$this->setOutputFormat( 'htmlemail' );
			$content['batch-body-html'] = $this->formatFragment( $key, $event, $user )->parse();
			$content['icon'] = $this->icon;
			$this->setOutputFormat( $outputFormat );
		}
		return $content;
	}

	/**
	 * Get Message object in the desired language, use this method instead
	 * of wfMessage() if a message would be used in either web or email
	 * @param $msgStr string message string
	 * @return Message
	 */
	public function getMessage( $msgStr ) {
		$message = wfMessage( $msgStr );
		if ( $this->language ) {
			$message->inLanguage( $this->language );
		}
		return $message;
	}

	/**
	 * Creates a notification fragment based on a message and parameters
	 *
	 * @param $details array An i18n message and parameters to pass to the message
	 * @param $event EchoEvent that the notification is for.
	 * @param $user User to format the notification for.
	 * @return Message
	 */
	public function formatFragment( $details, $event, $user ) {
		$message = $this->getMessage( $details['message'] );
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
				$revisionSnippet = $this->getRevisionSnippet( $event, $user );
				if ( $revisionSnippet ) {
					return Xml::tags(
						'div',
						array( 'class' => 'mw-echo-edit-summary' ),
						Xml::tags(
							'span', array( 'class' => 'comment' ),
							htmlspecialchars( $revisionSnippet )
						)
					);
				} else {
					return '';
				}
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
			return $this->getMessage( 'echo-rev-deleted-text-view' )->text();
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
			return $this->getMessage( 'echo-rev-deleted-text-view' )->text();
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

		// Default footer is timestamp
		$footer = $this->formatTimestamp( $event->getTimestamp() );
		$secondaryLink = $this->getLink( $event, $user, 'secondary' );
		if ( $secondaryLink ) {
			$footer = $wgLang->pipeList( array( $footer, $secondaryLink ) );
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
			$message->params( $this->getMessage( 'echo-no-title' )->text() );
			return;
		}

		if ( !isset( $props['fragment'] ) ) {
			$props['fragment'] = $this->formatSubjectAnchor( $event );
		}

		$link = $this->buildLinkParam( $event->getTitle(), $props );
		$message->params( $link );
	}

	/**
	 * Build a link, to be used as message parameter, based on output format and
	 * passed properties. Return value of this function can be used as parameter
	 * for Message::params()
	 * $title Title
	 * $props array
	 */
	protected function buildLinkParam( $title, $props = array() ) {
		$param = array();
		if ( isset( $props['param'] ) ) {
			$param = (array)$props['param'];
		}

		if ( isset( $props['fragment'] ) ) {
			$fragment = $props['fragment'];
			$title->setFragment( "#$fragment" );
		}

		if ( in_array( $this->outputFormat, array( 'html', 'flyout', 'htmlemail' ) ) ) {
			$attribs = array();
			if ( isset( $props['attribs'] ) ) {
				$attribs = (array)$props['attribs'];
			}

			if ( isset( $props['linkText'] ) ) {
				$linkText = $props['linkText'];
			} else {
				$linkText = htmlspecialchars( $title->getPrefixedText() );
			}

			$options = array();
			if ( $this->outputFormat === 'htmlemail' ) {
				$options = array( 'https' );
			}

			return array( Message::rawParam( Linker::link( $title, $linkText, $attribs, $param, $options ) ) );
		} elseif ( $this->outputFormat === 'email' ) {
			$url = $title->getFullURL( $param, false, PROTO_HTTPS );
			return $this->sanitizeEmailLink( $url );
		} else {
			return $title->getFullURL( $param );
		}
	}

	/**
	 * Plain text email in some mail client is misinterpreting the ending
	 * punctuation, this function would encode the last character
	 * @param $url string
	 * @param string
	 */
	public function sanitizeEmailLink( $url ) {
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
		return $url;
	}

	/**
	 * Get raw bundle data for an event so it can be manipulated
	 * @param $event EchoEvent
	 * @param $user User
	 * @param $type string deprecated
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

		$data = $wgEchoBackend->getRawBundleData( $user, $event->getBundleHash(), $this->distributionType, 'DESC', self::$maxRawBundleData );

		if ( $data ) {
			$this->bundleData['raw-data-count'] += $data->numRows();
			if ( $this->distributionType !== 'web' ) {
				$this->bundleData['raw-data-count']--;
			}
		}

		return $data;
	}

	/**
	 * Construct the bundle data for an event, by default, the group iterator
	 * is agent, eg, by user A and x others. custom formatter can overwrite
	 * this function to use a differnt group iterator such as title, namespace
	 * @param $event EchoEvent
	 * @param $user User
	 * @param $type string deprecated
	 * @throws MWException
	 */
	protected function generateBundleData( $event, $user, $type ) {
		global $wgEchoMaxNotificationCount;

		$data = $this->getRawBundleData( $event, $user, $type );

		// Default the last raw data to false, which means there is no
		// bundle data other than the base
		$this->bundleData['last-raw-data'] = false;

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
			$this->bundleData['last-raw-data'] = $row;
		}

		$this->bundleData['agent-other-count'] = $count - 1;
		if ( $count > 1 ) {
			$this->bundleData['use-bundle'] = true;
		}

		// If there is more raw data than we requested, that means we have not
		// retrieved the very last raw record, set the key back to null
		if ( $data->numRows() >= self::$maxRawBundleData ) {
			$this->bundleData['last-raw-data'] = null;
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
	 * Process a param that should be escaped
	 * @param $message Message
	 * @param $paramContent string
	 */
	protected function processParamEscaped( $message, $paramContent ) {
		// Plain text email does not need escape
		if ( $this->outputFormat !== 'email' ) {
			$paramContent = htmlspecialchars( $paramContent );
		}

		$message->rawParams( $paramContent );
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
	public function getLink( $event, $user, $rank = 'primary', $local = true, $urlOnly = false, $style = '' ) {
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
				return $target->getFullURL( $query, false, PROTO_HTTPS );
			}
		} else {
			$message = $this->getMessage( $event->getLinkMessage( $rank ) )->text();
			$attribs = array( 'class' => "mw-echo-notification-{$rank}-link" );
			if ( $style ) {
				$attribs['style'] = $style;
			}
			$options = array();
			// If local is false, return an absolute url using HTTP protocol
			if ( !$local ) {
				$options[] = 'https';
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
					// Explicitly set fragment to empty string for diff links, $title is
					// passed around by reference, it may end up using fragment set from
					// other parameters
					$target->setFragment( '#' );
					$query = array(
						'oldid' => 'prev',
						'diff' => $eventData['revid'],
					);

					if ( $event->getBundleHash() ) {
						// First try cache data from preivous query
						if ( isset( $this->bundleData['last-raw-data'] ) ) {
							$stat = $this->bundleData['last-raw-data'];
						// Then try to query the storage
						} else {
							global $wgEchoBackend;
							$stat = $wgEchoBackend->getRawBundleData( $user, $event->getBundleHash(), $this->distributionType, 'ASC', 1 );
							if ( $stat ) {
								$stat = $stat->current();
							}
						}

						if ( $stat ) {
							$extra = $stat->event_extra ? unserialize( $stat->event_extra ) : array();
							if ( isset( $extra['revid'] ) ) {
								$oldId = $target->getPreviousRevisionID( $extra['revid'] );
								// The diff engine doesn't provide a way to diff against a null revision.
								// In this case, just fall back old id to the first revision
								if ( !$oldId ) {
									$oldId = $extra['revid'];
								}
								if ( $oldId < $eventData['revid'] ) {
									$query['oldid'] = $oldId;
								}
							}
						}
					}
				}
				break;
		}
		return array( $target, $query );
	}

	/**
	 * Get the style for standard links in html email
	 * @return string
	 */
	public function getHTMLLinkStyle() {
		return 'text-decoration: none; color: #3A68B0;';
	}

	/**
	 * Helper function for processParams()
	 *
	 * @param $event EchoEvent
	 * @param $param string
	 * @param $message Message
	 * @param $user User
	 * @throws MWException
	 */
	protected function processParam( $event, $param, $message, $user ) {
		if ( $param === 'agent' ) {
			$agent = $event->getAgent();
			if ( !$agent ) {
				$message->params( $this->getMessage( 'echo-no-agent' )->text() );
			} elseif ( !$event->userCan( Revision::DELETED_USER, $user ) ) {
				$message->params( $this->getMessage( 'rev-deleted-user' )->text() );
			} else {
				if ( $this->outputFormat === 'htmlemail' ) {
					$message->rawParams(
						Linker::link(
							$agent->getUserPage(),
							$agent->getName(),
							array( 'style' => $this->getHTMLLinkStyle() ),
							array(),
							array( 'https' )
						)
					);
				} else {
					$message->params( $agent->getName() );
				}
			}
		// example: {7} others, {99+} others
		} elseif ( $param === 'agent-other-display' ) {
			global $wgEchoMaxNotificationCount;

			if ( $this->bundleData['agent-other-count'] > $wgEchoMaxNotificationCount ) {
				$message->params(
					$this->getMessage( 'echo-notification-count' )
					->numParams( $wgEchoMaxNotificationCount )
					->text()
				);
			} else {
				$message->numParams( $this->bundleData['agent-other-count'] );
			}
		// the number used for plural support
		} elseif ( $param === 'agent-other-count' ) {
			$message->params( $this->bundleData['agent-other-count'] );
		} elseif ( $param === 'user' ) {
			$message->params( $user->getName() );
		} elseif ( $param === 'title' ) {
			if ( !$event->getTitle() ) {
				$message->params( $this->getMessage( 'echo-no-title' )->text() );
			} else {
				if ( $this->outputFormat === 'htmlemail' ) {
					$props = array (
						'attribs' => array( 'style' => $this->getHTMLLinkStyle() )
					);
					$this->setTitleLink( $event, $message, $props );
				} else {
					$message->params( $this->formatTitle( $event->getTitle() ) );
				}
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
		} else {
			throw new MWException( "Unrecognised parameter $param" );
		}
	}

	/**
	 * Getter method
	 * @param $key string
	 * @return mixed
	 */
	public function getValue( $key ) {
		if ( !property_exists( $this, $key ) ) {
			throw new MWException( "Call to non-existing property $key in " . get_class( $this ) );
		}
		return $this->$key;
	}

}
