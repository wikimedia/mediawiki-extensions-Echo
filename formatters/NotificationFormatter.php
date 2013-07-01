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
	 * @param $format string A valid output format (by default, 'text', 'html', 'flyout', and 'email' are allowed)
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
	 * Formats a timestamp in a human-readable format
	 * @param $ts string Timestamp in some format compatible with wfTimestamp()
	 * @return string Human-readable timestamp
	 */
	protected function formatTimestamp( $ts ) {
		$timestamp = new MWTimestamp( $ts );
		$ts = $timestamp->getHumanTimestamp();
		return $ts;
	}

	/**
	 * Formats a revision comment (i.e. edit summary)
	 * @param EchoEvent $event The event that the notification is for.
	 * @param User $user The user to format the notification for.
	 * @return String The revision comment (or empty string)
	 */
	protected function formatRevisionComment( $event, $user ) {
		$revision = $event->getRevision();
		if ( $revision === null ) {
			return '';
		} elseif( !$event->userCan( Revision::DELETED_COMMENT, $user ) ) {
			return wfMessage( 'rev-deleted-comment' )->text();
		} else {
			$comment = $revision->getComment( Revision::FOR_THIS_USER, $user );
			if ( $this->outputFormat === 'html' || $this->outputFormat === 'flyout' ) {
				if ( $this->outputFormat === 'html' ) {
					// Parse the revision comment
					$comment = Linker::formatComment( $comment, $revision->getTitle() );
				} else {
					$comment = $this->customFormatRevisionComment( $comment );
				}
				if ( $comment ) {
					// No quotation marks for now, but this might need to be reverted.
					// $comment = wfMessage( 'echo-quotation-marks', $comment )->inContentLanguage()->plain();
					$comment = Xml::tags( 'span', array( 'class' => 'comment' ), $comment );
					$comment = Xml::tags( 'div', array( 'class' => 'mw-echo-edit-summary' ), $comment );
				}
			}
			return $comment;
		}
	}

	/**
	 * Formats a revision comment (i.e. edit summary) for use in the flyout (and
	 * possibly HTML email). This is a helper function for formatRevisionComment.
	 * @param String $comment The raw revision comment
	 * @return String The formatted revision comment (or empty string)
	 */
	private function customFormatRevisionComment( $comment ) {
		// Strip wikitext from the revision comment and manually convert autocomments.
		// This bypasses the creation of the arrow section links (→) and turns
		// any other links into plain text.
		$comment = FeedItem::stripComment( $comment );
		$comment = trim( htmlspecialchars( $comment ) );
		// Convert autocomments (e.g. section titles) from raw form
		// Example input: '/* Foobar */ My changes'
		// Output: '<span class='autocomment'>Foobar:</span> My changes'
		preg_match( "!(.*)/\*\s*(.*?)\s*\*/(.*)!", $comment, $matches );
		if ( $matches ) {
			$section = $matches[2];
			if ( $matches[3] ) {
				// Add a colon after the section name
				$section .= wfMessage( 'colon-separator' )->inContentLanguage()->escaped();
			}
			// Add standard span tag for autocomment
			$comment = $matches[1] . "<span class='autocomment'>" . $section . "</span>" . $matches[3];
		}
		return $comment;
	}

}
