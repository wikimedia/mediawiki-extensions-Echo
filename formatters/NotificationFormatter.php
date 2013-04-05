<?php

/**
 * Abstract class for constructing a notification message, this class includes
 * only the most generic formatting functionality as it may be extended by
 * notification formatters for other extensions with unique content or
 * requirements.
 */
abstract class EchoNotificationFormatter {

	/**
	 * List of valid output format
	 * @var array
	 */
	protected $validOutputFormats = array( 'text', 'flyout', 'html', 'email' );

	/**
	 * Current output format, default is 'text'
	 * @var string
	 */
	protected $outputFormat = 'text';

	/**
	 * List of parameters for constructing messages
	 * @var array
	 */
	protected $parameters;

	/**
	 * List of parameters that must exist in $this->$parameters
	 */
	protected $requiredParameters = array();

	/**
	 * Creates an instance of the given class with the given parameters.
	 * @param $parameters array Associative array of parameters
	 * @throws MWException
	 */
	public function __construct( array $parameters ) {
		$this->parameters = $parameters;

		$missingParameters = array_diff( $this->requiredParameters, array_keys( $parameters ) );

		if ( $missingParameters ) {
			throw new MWException(
				"Missing required parameters for " .
					get_class( $this ) . ":" .
					implode( " ", $missingParameters )
			);
		}
	}

	/**
	 * Shows a notification in human-readable format.
	 * @param $event EchoEvent being notified about.
	 * @param $user User being notified.
	 * @param $type string The notification type (e.g. notify, email)
	 * @return Mixed; depends on output format
	 * @see EchoNotificationFormatter::setOutputFormat
	 */
	public abstract function format( $event, $user, $type );

	/**
	 * Set the output format that the notification will be displayed in.
	 * @param $format string A valid output format (by default, 'text', 'html', and 'email' are allowed)
	 * @throws MWException
	 */
	public function setOutputFormat( $format ) {
		if ( !in_array( $format, $this->validOutputFormats, true ) ) {
			throw new MWException( "Invalid output format $format" );
		}

		$this->outputFormat = $format;
	}

	/**
	 * Create an EchoNotificationFormatter from the supplied parameters.
	 * @param $parameters array Associative array.
	 * Select the class of formatter to use with the 'class' field.
	 * For other parameters, see the appropriate class' constructor.
	 * @throws MWException
	 * @return EchoNotificationFormatter object.
	 */
	public static function factory( $parameters ) {
		$class = null;
		if ( isset( $parameters['formatter-class'] ) ) {
			$class = $parameters['formatter-class'];
		}

		// Default to basic formatter
		if ( !$class || !class_exists( $class ) ) {
			$class = 'EchoBasicFormatter';
		}

		return new $class( $parameters );
	}

	/**
	 * Returns a link to a title, or the title itself.
	 * @param $title Title object
	 * @return string Text suitable for output format
	 */
	protected function formatTitle( $title ) {
		return $title->getPrefixedText();
	}

	/**
	 * Formats a timestamp (in a human-readable format if supported by
	 * MediaWiki)
	 * @param $ts string Timestamp in some format compatible with wfTimestamp()
	 * @return string Type description
	 */
	protected function formatTimestamp( $ts ) {
		$timestamp = new MWTimestamp( $ts );
		$ts = $timestamp->getHumanTimestamp();

		if ( $this->outputFormat === 'html' || $this->outputFormat === 'flyout' ) {
			return Xml::element( 'div', array( 'class' => 'mw-echo-timestamp' ), $ts );
		} else {
			return $ts;
		}
	}

	/**
	 * Formats an edit summary
	 * TODO: implement parsed option for notifications archive page (where we can use all the html)
	 * @param $event EchoEvent that the notification is for.
	 * @param $user User to format the notification for.
	 * @return string The edit summary (or empty string)
	 */
	protected function formatSummary( $event, $user ) {
		$eventData = $event->getExtra();
		if ( !isset( $eventData['revid'] ) ) {
			return '';
		}
		$revision = Revision::newFromId( $eventData['revid'] );
		if ( $revision ) {
			$summary = $revision->getComment( Revision::FOR_THIS_USER, $user );

			if ( $this->outputFormat === 'html' || $this->outputFormat === 'flyout' ) {
				if ( $this->outputFormat === 'html' ) {
					// Parse the edit summary
					$summary = Linker::formatComment( $summary, $revision->getTitle() );
				} else {
					// Strip wikitext from the edit summary and manually convert autocomments
					$summary = FeedItem::stripComment( $summary );
					$summary = trim( htmlspecialchars( $summary ) );
					// Convert section titles to proper HTML
					preg_match( "!(.*)/\*\s*(.*?)\s*\*/(.*)!", $summary, $matches );
					if ( $matches ) {
						$section = $matches[2];
						if ( $matches[3] ) {
							// Add a colon after the section name
							$section .= wfMessage( 'colon-separator' )->inContentLanguage()->escaped();
						}
						$summary = $matches[1] . "<span class='autocomment'>" . $section . "</span>" . $matches[3];
					}
				}
				if ( $summary ) {
					$summary = wfMessage( 'echo-quotation-marks', $summary )->inContentLanguage()->plain();
					$summary = Xml::tags( 'span', array( 'class' => 'comment' ), $summary );
					$summary = Xml::tags( 'div', array( 'class' => 'mw-echo-summary' ), $summary );
				}
			}

			return $summary;
		}
		return '';
	}

}
