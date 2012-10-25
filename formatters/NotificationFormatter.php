<?php

abstract class EchoNotificationFormatter {
	static $formatterClasses = array(
		'basic' => 'EchoBasicFormatter',
		'edit' => 'EchoEditFormatter',
		'comment' => 'EchoCommentFormatter',
		'welcome' => 'EchoBasicFormatter',
	);
	protected $validOutputFormats = array( 'text', 'html', 'email' );
	protected $outputFormat = 'text';
	protected $requiredParameters = array();

	/**
	 * Creates an instance of the given class with the given parameters.
	 *
	 * @param $parameters array Associative array of parameters
	 * @throws MWException
	 */
	public function __construct( $parameters ) {
		$this->parameters = $parameters;

		$missingParameters =
			array_diff( $this->requiredParameters, array_keys( $parameters ) );

		if ( count( $missingParameters ) ) {
			throw new MWException(
				"Missing required parameters for " .
					get_class( $this ) . ":" .
					implode( " ", $missingParameters )
			);
		}
	}

	/**
	 * Shows a notification in human-readable format.
	 *
	 * @param $event EchoEvent being notified about.
	 * @param $user User being notified.
	 * @param $type string The notification type (e.g. notify, email)
	 * @return Mixed; depends on output format
	 * @see EchoNotificationFormatter::setOutputFormat
	 */
	public abstract function format( $event, $user, $type );

	/**
	 * Set the output format that the notification will be displayed in.
	 *
	 * @param $format string A valid output format (by default, 'text' and 'html' are allowed)
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
	 * Select the class of formatter to use with the 'type' or 'class' field.
	 * For other parameters, see the appropriate class' constructor.
	 * @throws MWException
	 * @return EchoNotificationFormatter object.
	 */
	public static function factory( $parameters ) {
		$class = null;
		if ( isset( $parameters['type'] ) ) {
			$type = $parameters['type'];
			if ( isset( self::$formatterClasses[$type] ) ) {
				$class = self::$formatterClasses[$type];
			}
		} elseif ( isset( $parameters['class'] ) ) {
			$class = $parameters['class'];
		}

		if ( !$class || !class_exists( $class ) ) {
			throw new MWException( "No valid class ($class) or type ($type) specified for " . __METHOD__ );
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
	 * Returns a user link in the appropriate format.
	 *
	 * @param $user User object.
	 * @return string Text suitable for output format.
	 */
	protected function formatUser( $user ) {
		if ( $this->outputFormat === 'html' ) {
			return Linker::userLink( $user->getId(), $user->getName() );
		} else {
			return $user->getName();
		}
	}

	/**
	 * Formats a timestamp (in a human-readable format if supported by
	 *  MediaWiki)
	 *
	 * @param $ts Timestamp in some format compatible with wfTimestamp()
	 * @param $user User to format for. false to detect
	 * @return string Type description
	 */
	protected function formatTimestamp( $ts, $user ) {
		$languageCode = $user->getOption( 'language' );
		$language = Language::factory( $languageCode );

		if ( MWInit::methodExists( 'Language', 'prettyTimestamp' ) ) {
			$ts = $language->prettyTimestamp( $ts, false, $user );
		} else {
			$ts = $language->userTimeAndDate( $ts, $user );
		}

		return Xml::element( 'span', array( 'class' => 'mw-echo-timestamp' ), $ts );
	}
}
