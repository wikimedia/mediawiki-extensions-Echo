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
	protected $validOutputFormats = array( 'text', 'email', 'htmlemail' );

	/**
	 * List of valid distribution type
	 */
	protected $validDistributionType = array( 'web', 'email', 'emaildigest', 'emailsubject' );

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
	 * Creates an instance of the given class with the given parameters.
	 * @param $parameters array Associative array of parameters
	 * @throws MWException
	 */
	public function __construct( array $parameters ) {
		$this->parameters = $parameters;
	}

	/**
	 * Shows a notification in human-readable format.
	 * @param $event EchoEvent being notified about.
	 * @param $user User being notified.
	 * @param $type string The notification type (e.g. notify, email)
	 * @return Mixed; depends on output format
	 * @see EchoNotificationFormatter::setOutputFormat
	 */
	abstract public function format( $event, $user, $type );

	/**
	 * Set the output format that the notification will be displayed in.
	 * @param $format string A valid output format (by default, 'text', and 'email' are allowed)
	 * @throws InvalidArgumentException
	 */
	public function setOutputFormat( $format ) {
		if ( !in_array( $format, $this->validOutputFormats, true ) ) {
			throw new InvalidArgumentException( "Invalid output format $format" );
		}

		$this->outputFormat = $format;
	}

	public function setDistributionType( $type ) {
		if ( !in_array( $type, $this->validDistributionType, true ) ) {
			throw new InvalidArgumentException( "Invalid distribution type $type" );
		}

		$this->distributionType = $type;
	}

	/**
	 * Create an EchoNotificationFormatter for the given type.
	 * @param string $type
	 * Select the class of formatter to use with the 'formatter-class' field.
	 * For other parameters, see the appropriate class' constructor.
	 * @throws RuntimeException
	 * @return EchoNotificationFormatter object.
	 */
	public static function factory( $type ) {
		global $wgEchoNotifications;
		if ( !isset( $wgEchoNotifications[$type] ) ) {
			throw new InvalidArgumentException( "The notification type '$type' is not registered" );
		}

		$parameters = $wgEchoNotifications[$type];
		if ( isset( $parameters['formatter-class'] ) ) {
			$class = $parameters['formatter-class'];
		} else {
			$class = 'EchoBasicFormatter';
		}

		if ( !class_exists( $class ) ) {
			throw new RuntimeException( "Class $class does not exist" );
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
	 * @todo this shouldn't be static
	 * @param string $icon Name of icon as registered in BeforeCreateEchoEvent hook
	 * @param string $dir either 'ltr' or 'rtl'
	 * @return string
	 */
	public static function getIconUrl( $icon, $dir ) {
		global $wgEchoNotificationIcons, $wgExtensionAssetsPath;
		if ( !isset( $wgEchoNotificationIcons[$icon] ) ) {
			throw new InvalidArgumentException( "The $icon icon is not registered" );
		}

		$iconInfo = $wgEchoNotificationIcons[$icon];
		$needsPrefixing = true;

		// Now we need to check it has a valid url/path
		if ( isset( $iconInfo['url'] ) && $iconInfo['url'] ) {
			$iconUrl = $iconInfo['url'];
			$needsPrefixing = false;
		} elseif ( isset( $iconInfo['path'] ) && $iconInfo['path'] ) {
			$iconUrl = $iconInfo['path'];
		} else {
			// Fallback to hardcoded 'placeholder'. This is used if someone
			// doesn't configure the 'site' icon for example.
			$icon = 'placeholder';
			$iconUrl = $wgEchoNotificationIcons['placeholder']['path'];
		}

		// Might be an array with different icons for ltr/rtl
		if ( is_array( $iconUrl ) ) {
			if ( !isset( $iconUrl[$dir] ) ) {
				throw new UnexpectedValueException( "Icon type $icon doesn't have an icon for $dir directionality" );
			}

			$iconUrl = $iconUrl[$dir];
		}

		// And if it was a 'path', stick the assets path in front
		if ( $needsPrefixing ) {
			$iconUrl = "$wgExtensionAssetsPath/$iconUrl";
		}

		return $iconUrl;
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
