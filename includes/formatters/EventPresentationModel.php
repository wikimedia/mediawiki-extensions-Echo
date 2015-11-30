<?php

/**
 * Class that returns structured data based
 * on the provided event.
 */
// @todo: once PHP5.3 is no longer supported, this can implement JsonSerializable
abstract class EchoEventPresentationModel {

	/**
	 * @var EchoEvent
	 */
	protected $event;

	/**
	 * @var Language
	 */
	protected $language;

	/**
	 * @var string
	 */
	protected $type;

	/**
	 * @var User for permissions checking
	 */
	private $user;

	/**
	 * @var EchoEvent[]|null
	 */
	private $bundledEvents;

	/**
	 * @param EchoEvent $event
	 * @param Language|string $language
	 * @param User $user Only used for permissions checking and GENDER
	 */
	protected function __construct( EchoEvent $event, $language, User $user ) {
		$this->event = $event;
		$this->type = $event->getType();
		$this->language = wfGetLangObj( $language );
		$this->user = $user;
	}

	/**
	 * Convenience function to detect whether the event type
	 * has been updated to use the presentation model system
	 *
	 * @param string $type event type
	 * @return bool
	 */
	public static function supportsPresentationModel( $type ) {
		global $wgEchoNotifications;
		return isset( $wgEchoNotifications[$type]['presentation-model'] );
	}

	/**
	 * @param EchoEvent $event
	 * @param Language|string $language
	 * @param User $user
	 * @return EchoEventPresentationModel
	 */
	public static function factory( EchoEvent $event, $language, User $user ) {
		global $wgEchoNotifications;
		// @todo don't depend upon globals

		$class = $wgEchoNotifications[$event->getType()]['presentation-model'];
		return new $class( $event, $language, $user );
	}

	/**
	 * Equivalent to IContextSource::msg for the current
	 * language
	 *
	 * @return Message
	 */
	protected function msg( /* ,,, */ ) {
		/**
		 * @var Message $msg
		 */
		$msg = call_user_func_array( 'wfMessage', func_get_args() );
		$msg->inLanguage( $this->language );

		return $msg;
	}

	/**
	 * @return EchoEvent[]
	 */
	final protected function getBundledEvents() {
		if ( !$this->event->getBundleHash() ) {
			return array();
		}
		if ( $this->bundledEvents !== null ) {
			return $this->bundledEvents;
		}

		// FIXME: We really shouldn't be making db queries like this
		// in the presentation model
		$eventMapper = new EchoEventMapper();
		$this->bundledEvents = $eventMapper->fetchByUserBundleHash(
			$this->user,
			$this->event->getBundleHash()
			// default params: web, DESC, limit=250
		);

		return $this->bundledEvents;
	}

	/**
	 * This method returns true when there are bundled notifications, even if they are all
	 * in the same group according to getBundleGrouping(). For presentation purposes, you may
	 * want to check if getBundleCount( true, $yourCallback ) > 1 instead.
	 *
	 * @return bool Whether there are other notifications bundled with this one.
	 */
	final protected function isBundled() {
		return $this->getBundleCount() > 1;
	}

	/**
	 * Count the number of event groups in this bundle.
	 *
	 * By default, each event is in its own group, and this method returns the number of events.
	 * To group events differently, pass $groupCallback. For example, to group events with the
	 * same title together, use $callback = function ( $event ) { return $event->getTitle()->getPrefixedText(); }
	 *
	 * If $includeCurrent is false, all events in the same group as the current one will be ignored.
	 *
	 * @param bool $includeCurrent Include the current event (and its group)
	 * @param callable $groupCallback Callback that takes an EchoEvent and returns a grouping value
	 * @return int Number of bundled events or groups
	 */
	final protected function getBundleCount( $includeCurrent = true, $groupCallback = null ) {
		$events = array_merge( $this->getBundledEvents(), array( $this->event ) );
		if ( $groupCallback ) {
			if ( !is_callable( $groupCallback ) ) {
				// If we pass an invalid callback to array_map(), it'll just throw a warning
				// and return NULL, so $count ends up being 0 or -1. Instead of doing that,
				// throw an exception.
				throw new MWException( 'Invalid callback passed to getBundleCount' );
			}
			$events = array_unique( array_map( $groupCallback, $events ) );
		}
		$count = count( $events );

		if ( !$includeCurrent ) {
			$count--;
		}
		return $count;
	}

	/**
	 * Return the count of notifications bundled together.
	 *
	 * For parameters, see getBundleCount().
	 *
	 * @param bool $includeCurrent
	 * @param callable $groupCallback
	 * @return array ['number for display', 'number for PLURAL']
	 */
	final protected function getNotificationCountForOutput( $includeCurrent = true, $groupCallback = null ) {
		global $wgEchoMaxNotificationCount;
		$count = $this->getBundleCount( $includeCurrent, $groupCallback );
		if ( $count > $wgEchoMaxNotificationCount ) {
			return array(
				$this->msg( 'echo-notification-count' )->numParams( $wgEchoMaxNotificationCount )->text(),
				$wgEchoMaxNotificationCount
			);
		} else {
			return array(
				$this->language->formatNum( $count ),
				$count
			);
		}
	}

	/**
	 * @return string The symbolic icon name as defined in $wgEchoNotificationIcons
	 */
	abstract public function getIconType();

	/**
	 * @return string Timestamp the event occurred at
	 */
	final public function getTimestamp() {
		return $this->event->getTimestamp();
	}

	/**
	 * Helper for EchoEvent::userCan
	 *
	 * @param int $type Revision::DELETED_* constant
	 * @return bool
	 */
	final protected function userCan( $type ) {
		return $this->event->userCan( $type, $this->user );
	}

	/**
	 * @return array|bool ['wikitext to display', 'username for GENDER'], false if no agent
	 *
	 * We have to display wikitext so we can add CSS classes for revision deleted user.
	 * The goal of this function is for callers not to worry about whether
	 * the user is visible or not.
	 * @par Example:
	 * @code
	 * list( $formattedName, $genderName ) = $this->getAgentForOutput();
	 * $msg->params( $formattedName, $genderName );
	 * @endcode
	 */
	final protected function getAgentForOutput() {
		$agent = $this->event->getAgent();
		if ( !$agent ) {
			return false;
		}

		if ( $this->userCan( Revision::DELETED_USER ) ) {
			// Not deleted
			return array( $agent->getName(), $agent->getName() );
		} else {
			// Deleted/hidden
			$msg = $this->msg( 'rev-deleted-user' )->plain();
			// HACK: Pass an invalid username to GENDER to force the default
			return array( '<span class="history-deleted">' . $msg . '</span>', '[]' );
		}
	}

	/**
	 * Return a message with the given key and the agent's
	 * formatted name and name for GENDER as 1st and
	 * 2nd parameters.
	 * @param string $key
	 * @return Message
	 */
	final protected function getMessageWithAgent( $key ) {
		$msg = $this->msg( $key );
		list( $formattedName, $genderName ) = $this->getAgentForOutput();
		$msg->params( $formattedName, $genderName );
		return $msg;
	}

	/**
	 * Get the viewing user's name for usage in GENDER
	 *
	 * @return string
	 */
	final protected function getViewingUserForGender() {
		return $this->user->getName();
	}

	/**
	 * To be overridden by subclasses if they are unable to render the
	 * notification, for example when a page is deleted.
	 * If this function returns false, no other methods will be called
	 * on the object.
	 *
	 * @return bool
	 */
	public function canRender() {
		return true;
	}

	/**
	 * @return string Message key that will be used in getHeaderMessage
	 */
	protected function getHeaderMessageKey() {
		return "notification-header-{$this->type}";
	}

	/**
	 * Get a message object and add the performer's name as
	 * a parameter. It is expected that subclasses will override
	 * this.
	 *
	 * @return Message
	 */
	public function getHeaderMessage() {
		return $this->getMessageWithAgent( $this->getHeaderMessageKey() );
	}

	/**
	 * Get a message for the notification's body, false if it has no body
	 *
	 * @return bool|Message
	 */
	public function getBodyMessage() {
		return false;
	}

	/**
	 * Array of primary link details, with possibly-relative URL & label.
	 *
	 * @return array|bool Array of link data, or false for no link:
	 *                    ['url' => url, 'label' => link text (non-escaped)]
	 */
	abstract public function getPrimaryLink();

	/**
	 * Array of secondary link details, including possibly-relative URLs, label,
	 * description & icon name.
	 *
	 * @return array Array of links in the format of:
	 *               [['url' => url,
	 *                 'label' => link text (non-escaped),
	 *                 'description' => descriptive text (non-escaped),
	 *                 'icon' => symbolic icon name (or false if there is none),
	 *                 'prioritized' => true if the link should be outside the
	 *                                  action menu, false for inside)],
	 *                ...]
	 */
	public function getSecondaryLinks() {
		return array();
	}

	/**
	 * @return array
	 * @throws TimestampException
	 */
	public function jsonSerialize() {
		$body = $this->getBodyMessage();

		return array(
			'header' => $this->getHeaderMessage()->parse(),
			'body' => $body ? $body->parse() : '',
			'icon' => $this->getIconType(),
			'links' => array(
				'primary' => $this->getPrimaryLink() ?: array(),
				'secondary' => $this->getSecondaryLinks(),
			),
		);
	}
}
