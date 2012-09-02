<?php

class EchoSubscription {
	private $user = null;
	private $event = null;
	private $title = null;
	private $notificationTypes = null;
	private $dirty = false;
	private $loaded = false;

	/**
	 * Main constructor
	 * Creates an EchoSubscription object representing the subscription by
	 * a user to an event (on a page if applicable).
	 *
	 * @param $user User object for the user whose subscription we're talking about.
	 * @param $event String identifier for the event type of interest. Max length is 63 chars.
	 * @param $title Title|null Optional Title of interest for events, if applicable.
	 * @throws MWException
	 */
	public function __construct( $user, $event, $title = null ) {
		if ( !( $user instanceof User || $user instanceof StubObject ) ) {
			throw new MWException( "Invalid user parameter" );
		}

		if ( $title && !$title instanceof Title ) {
			throw new MWException( "Invalid Title parameter" );
		}

		if ( !$event || !is_string( $event ) || strlen( $event ) > 63 ) {
			throw new MWException( "Invalid event parameter" );
		}

		$this->user = $user;
		$this->event = $event;
		$this->title = $title;
		$this->loaded = false;
		$this->dirty = null;
	}

	/**
	 * Load subscription data from pre-selected echo_subscription rows.
	 * Will throw an exception rather than reconfigure the object if
	 * the rows are not matched to this object's setup.
	 *
	 * @param $rows Array of row objects from echo_subscription table.
	 * @throws MWException
	 */
	public function loadFromRows( $rows ) {
		global $wgEchoDefaultNotificationTypes;
		$this->notificationTypes = $wgEchoDefaultNotificationTypes['all'];
		if ( isset( $wgEchoDefaultNotificationTypes[$this->event] ) ) {
			$this->notificationTypes = array_merge(
				$this->notificationTypes,
				$wgEchoDefaultNotificationTypes[$this->event]
			);
		}

		foreach ( $rows as $row ) {
			if ( $this->title ) {
				$correctNS = $this->title->getNamespace();
				$correctTitle = $this->title->getDBkey();
			} else {
				$correctNS = null;
				$correctTitle = '';
			}

			if (
				$row->sub_user != $this->user->getId() ||
				$row->sub_event_type != $this->event ||
				$row->sub_page_namespace != $correctNS ||
				$row->sub_page_title != $correctTitle
			) {
				throw new MWException( "Invalid parameter: mismatched rows" );
			}

			if ( $row->sub_enabled ) {
				$this->notificationTypes[$row->sub_notify_type] = true;
			} else {
				$this->notificationTypes[$row->sub_notify_type] = false;
			}
		}

		$this->loaded = true;
		$this->dirty = false;
	}

	/**
	 * Creates an EchoSubscription object for an array of echo_notification rows.
	 * Obviously, the rows must be from a single subscription
	 * (their user/event/title must match)
	 *
	 * @param $rows Array of row objects from echo_subscription table.
	 * @return EchoSubscription
	 */
	public static function newFromRows( $rows ) {
		$firstRow = $rows[0];

		$user = User::newFromId( $firstRow->sub_user );
		$event = $firstRow->sub_event_type;

		if (
			!is_null( $firstRow->sub_page_namespace ) &&
			!is_null( $firstRow->sub_page_title )
		) {
			$title = Title::makeTitleSafe(
				$firstRow->sub_page_namespace,
				$firstRow->sub_page_title
			);
		} else {
			$title = null;
		}

		$obj = new EchoSubscription( $user, $event, $title );

		$obj->loadFromRows( $rows );

		return $obj;
	}

	protected function getConds() {
		$conds = array(
			'sub_user' => $this->user->getId(),
			'sub_event_type' => $this->event,
		);

		if ( $this->title ) {
			$conds['sub_page_namespace'] = $this->title->getNamespace();
			$conds['sub_page_title'] = $this->title->getDBkey();
		}

		return $conds;
	}

	/**
	 * Loads data from the database
	 */
	protected function load() {
		if ( $this->loaded ) {
			return;
		}
		$dbr = wfGetDB( DB_SLAVE );

		$conds = $this->getConds();
		$res = $dbr->select( 'echo_subscription', '*', $conds, __METHOD__ );

		$this->loadFromRows( $res );
	}

	## ACCESSORS

	/**
	 * @return User
	 */
	public function getUser() {
		return $this->user;
	}

	public function getEventType() {
		return $this->event;
	}

	/**
	 * @return Title
	 */
	public function getTitle() {
		return $this->title;
	}

	public function getNotificationTypes() {
		$this->load();
		return $this->notificationTypes;
	}

	/**
	 * @param $type
	 * @return bool
	 */
	public function isNotificationEnabled( $type ) {
		$types = $this->getNotificationTypes();

		return !empty( $types[$type] );
	}

	public function enableNotification( $type ) {
		$this->load();
		$this->notificationTypes[$type] = true;
		$this->dirty = true;
	}

	public function disableNotification( $type ) {
		$this->load();
		$this->notificationTypes[$type] = false;
		$this->dirty = true;
	}

	public function save() {
		if ( !$this->dirty ) {
			return;
		}

		$conds = $this->getConds();

		$dbw = wfGetDB( DB_MASTER );
		$dbw->begin();
		$dbw->delete( 'echo_subscription', $conds, __METHOD__ );

		global $wgEchoDefaultNotificationTypes;
		if ( isset( $wgEchoDefaultNotificationTypes[$this->event] ) ) {
			$defaultState = array_merge(
				$wgEchoDefaultNotificationTypes['all'],
				$wgEchoDefaultNotificationTypes[$this->event]
			);
		} else {
			$defaultState = $wgEchoDefaultNotificationTypes['all'];
		}

		$rows = array();
		$allDefault = count( array_diff(
			array_keys( array_filter( $this->getNotificationTypes() ) ),
			array_keys( array_filter( $defaultState ) )
		) ) === 0;
		foreach ( $this->getNotificationTypes() as $type => $state ) {
			if ( !isset( $defaultState[$type] ) || $state != $defaultState[$type] || $allDefault ) {
				$rows[] = $conds + array(
					'sub_enabled' => $state,
					'sub_notify_type' => $type,
				);
			}
		}

		if ( count( $rows ) ) {
			$dbw->insert( 'echo_subscription', $rows, __METHOD__ );
		}

		$dbw->commit();
	}
}
