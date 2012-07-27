<?php

abstract class EchoNotificationFormatter {
	static $formatterClasses = array(
		'basic' => 'EchoBasicFormatter',
		'edit' => 'EchoEditFormatter',
		'comment' => 'EchoCommentFormatter',
	);
	protected $validOutputFormats = array('text', 'html', 'email');
	protected $outputFormat = 'text';

	/**
	 * Creates an instance of the given class with the given parameters.
	 *
	 * @param $parameters Associative array of parameters
	 */
	public function __construct( $parameters ) {
		$this->parameters = $parameters;
	}

	/**
	 * Shows a notification in human-readable format.
	 *
	 * @param $event The event being notified about.
	 * @param $user The user being notified.
	 * @param $type The notification type (e.g. notify, email)
	 * @return Mixed; depends on output format
	 * @see EchoNotificationFormatter::setOutputFormat
	 */
	public abstract function format( $event, $user, $type );

	/**
	 * Set the output format that the notification will be displayed in.
	 *
	 * @param $format A valid output format (by default, 'text' and 'html' are allowed)
	 */
	public function setOutputFormat( $format ) {
		if ( ! in_array( $format, $this->validOutputFormats, true ) ) {
			throw new MWException( "Invalid output format $format" );
		}

		$this->outputFormat = $format;
	}

	/**
	 * Create an EchoNotificationFormatter from the supplied parameters.
	 * @param $parameters Associative array.
	 * Select the class of formatter to use with the 'type' or 'class' field.
	 * For other parameters, see the appropriate class' constructor.
	 * @return EchoNotificationFormatter object.
	 */
	public static function factory( $parameters ) {
		$class = null;
		if ( isset($parameters['type']) ) {
			$type = $parameters['type'];
			if ( isset(self::$formatterClasses[$type]) ) {
				$class = self::$formatterClasses[$type];
			}
		} elseif ( isset($parameters['class']) ) {
			$class = $parameters['class'];
		}

		if ( ! $class || !class_exists($class) ) {
			throw new MWException( "No valid class ($class) or type ($type) specified for ".__METHOD__);
		}

		return new $class( $parameters );
	}

	/**
	 * Returns a link to a title, or the title itself.
	 * @param $title Title object
	 * @return Text suitable for output format
	 */
	protected function formatTitle( $title ) {
		if ( $this->outputFormat === 'html' ) {
			return Linker::link( $title );
		} else {
			return $title;
		}
	}

	/**
	 * Returns a user link in the appropriate format.
	 *
	 * @param $user User object.
	 * @return Text suitable for output format.
	 */
	protected function formatUser( $user ) {
		if ( $this->outputFormat === 'html' ) {
			return Linker::userLink( $user->getId(), $user->getName() );
		} else {
			return $user->getName();
		}
	}
}