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
	protected $validOutputFormats = array( 'text', 'flyout', 'html', 'email', 'htmlemail' );

	/**
	 * List of valid distribution type
	 */
	protected $validDistributionType = array( 'web', 'email', 'emaildigest' );

	/**
	 * Current output format, default is 'text'
	 * @var string
	 */
	protected $outputFormat = 'text';

	/**
	 * Distribution type, default is 'web'
	 * @var string
	 */
	protected $distributionType = 'web';

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

	public function setDistributionType( $type ) {
		if ( !in_array( $type, $this->validDistributionType, true ) ) {
			throw new Exception( "Invalid distribution type $type" );
		}

		$this->distributionType = $type;
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
	protected function formatTitle( Title $title ) {
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
	 * Returns a revision snippet
	 * @param EchoEvent $event The event that the notification is for.
	 * @param User $user The user to format the notification for.
	 * @return String The revision snippet (or empty string)
	 */
	public function getRevisionSnippet( $event, $user ) {
		$extra = $event->getExtra();
		if ( !isset( $extra['section-text'] ) || !$event->userCan( Revision::DELETED_TEXT, $user ) ) {
			return '';
		}

		$snippet = trim( $extra['section-text'] );

		return $snippet;
	}

}
