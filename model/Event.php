<?php

/**
 * Immutable class to represent an event.
 * In Echo nomenclature, an event is a single occurrence.
 */
class EchoEvent {
	protected $type = null;
	protected $id = null;
	protected $variant = null;
	/**
	 * @var User
	 */
	protected $agent = null;

	/**
	 * Loaded dynamically on request
	 *
	 * @var Title
	 */
	protected $title = null;
	protected $pageId = null;

	/**
	 * Loaded dynamically on request
	 *
	 * @var Revision
	 */
	protected $revision = null;

	protected $extra = array();

	/**
	 * Notification timestamp
	 * @var string
	 */
	protected $timestamp = null;

	/**
	 * A hash used to bundle a set of events, events that can be
	 * grouped for a user has the same bundle hash
	 * @var string
	 */
	protected $bundleHash;

	/**
	 * You should not call the constructor.
	 * Instead use one of the factory functions:
	 * EchoEvent::create        To create a new event
	 * EchoEvent::newFromRow    To create an event object from a row object
	 * EchoEvent::newFromID     To create an event object from the database given its ID
	 */
	protected function __construct() {}

	## Save the id and timestamp
	function __sleep() {
		if ( !$this->id ) {
			throw new MWException( "Unable to serialize an uninitialized EchoEvent" );
		}
		return array( 'id', 'timestamp' );
	}

	function __wakeup() {
		$this->loadFromID( $this->id );
	}

	function __toString() {
		return "EchoEvent(id={$this->id}; type={$this->type})";
	}

	/**
	 * Creates an EchoEvent object
	 * @param $info array Named arguments:
	 * type (required): The event type;
	 * variant: A variant of the type;
	 * agent: The user who caused the event;
	 * title: The page on which the event was triggered;
	 * extra: Event-specific extra information (e.g. post content)
	 *
	 * @throws MWException
	 * @return EchoEvent
	 */
	public static function create( $info = array() ) {
		global $wgEchoNotifications;

		// Do not create event and notifications if write access is locked
		if ( wfReadOnly() ) {
			throw new ReadOnlyError();
		}

		$obj = new EchoEvent;
		static $validFields = array( 'type', 'variant', 'agent', 'title', 'extra' );

		if ( empty( $info['type'] ) ) {
			throw new MWException( "'type' parameter is mandatory" );
		}

		if ( !isset( $wgEchoNotifications[$info['type']] ) ) {
			return false;
		}

		$obj->id = false;
		$obj->timestamp = wfTimestampNow();

		foreach ( $validFields as $field ) {
			if ( isset( $info[$field] ) ) {
				$obj->$field = $info[$field];
			}
		}

		if ( $obj->title ) {
			if ( !$obj->title instanceof Title ) {
				throw new MWException( 'Invalid title parameter' );
			}
			$pageId = $obj->title->getArticleId();
			if ( $pageId ) {
				$obj->pageId = $pageId;
			} else {
				$obj->extra['page_title'] = $obj->title->getDBKey();
				$obj->extra['page_namespace'] = $obj->title->getNamespace();
			}
		}

		if ( $obj->agent && !
		( $obj->agent instanceof User ||
			$obj->agent instanceof StubObject )
		) {
			throw new MWException( "Invalid user parameter" );
		}

		$obj->insert();

		global $wgEchoUseJobQueue;

		EchoNotificationController::notify( $obj, $wgEchoUseJobQueue  );

		return $obj;
	}

	/**
	 * Check whether the echo event is an enabled event
	 * @return bool
	 */
	public function isEnabledEvent() {
		global $wgEchoNotifications;
		if ( isset( $wgEchoNotifications[$this->getType()] ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Inserts the object into the database.
	 */
	protected function insert() {
		global $wgEchoBackend;

		if ( $this->id ) {
			throw new MWException( "Attempt to insert() an existing event" );
		}

		$row = array(
			'event_type' => $this->type,
			'event_variant' => $this->variant,
		);

		if ( $this->agent ) {
			if ( $this->agent->isAnon() ) {
				$row['event_agent_ip'] = $this->agent->getName();
			} else {
				$row['event_agent_id'] = $this->agent->getId();
			}
		}

		if ( $this->pageId ) {
			$row['event_page_id'] = $this->pageId;
		}

		$row['event_extra'] = $this->serializeExtra();

		$this->id = $wgEchoBackend->createEvent( $row );
	}

	/**
	 * Loads data from the provided $row into this object.
	 *
	 * @param $row Database row object from echo_event
	 */
	public function loadFromRow( $row ) {
		$this->id = $row->event_id;
		$this->type = $row->event_type;

		// If the object is loaded from __sleep(), timestamp should be already set
		if ( !$this->timestamp ) {
			if ( isset( $row->notification_timestamp ) ) {
				$this->timestamp = $row->notification_timestamp;
			} else {
				$this->timestamp = wfTimestampNow();
			}
		}

		$this->variant = $row->event_variant;
		$this->extra = $row->event_extra ? unserialize( $row->event_extra ) : array();
		$this->pageId = $row->event_page_id;

		if ( $row->event_agent_id ) {
			$this->agent = User::newFromID( $row->event_agent_id );
		} elseif ( $row->event_agent_ip ) {
			$this->agent = User::newFromName( $row->event_agent_ip, false );
		}

		if ( $row->event_page_id !== null ) {
			$this->title = Title::newFromId( $row->event_page_id );
		} elseif ( isset( $this->extra['page_title'], $this->extra['page_namespace'] ) ) {
			$this->title = Title::makeTitleSafe(
				$this->extra['page_namespace'],
				$this->extra['page_title']
			);
		}
	}

	/**
	 * Loads data from the database into this object, given the event ID.
	 * @param $id int Event ID
	 * @param $fromMaster bool
	 */
	public function loadFromID( $id, $fromMaster = false ) {
		global $wgEchoBackend;

		$this->loadFromRow( $wgEchoBackend->loadEvent( $id, $fromMaster ) );
	}

	/**
	 * Creates an EchoEvent from a row object
	 *
	 * @param $row Database row object from echo_event
	 * @return EchoEvent object.
	 */
	public static function newFromRow( $row ) {
		$obj = new EchoEvent();
		$obj->loadFromRow( $row );
		return $obj;
	}

	/**
	 * Creates an EchoEvent from the database by ID
	 *
	 * @param $id int Event ID
	 * @return EchoEvent
	 */
	public static function newFromID( $id ) {
		$obj = new EchoEvent();
		$obj->loadFromID( $id );
		return $obj;
	}

	/**
	 * Update extra data
	 */
	public function updateExtra( $extra ) {
		global $wgEchoBackend;

		$this->extra = $extra;
		if ( $this->id && $this->extra ) {
			$wgEchoBackend->updateEventExtra( $this );
		}
	}

	/**
	 * Serialize the extra data for event
	 * @return string
	 */
	public function serializeExtra() {
		if ( is_array( $this->extra ) || is_object( $this->extra ) ) {
			$extra = serialize( $this->extra );
		} elseif ( is_null( $this->extra ) ) {
			$extra = null;
		} else {
			$extra = serialize( array( $this->extra ) );
		}

		return $extra;
	}

	/**
	 * Check if the event is dismissable for the given distribution type
	 *
	 * @param $distribution notification distribution web/email
	 * @return bool
	 */
	public function isDismissable( $distribution ) {
		global $wgEchoNotificationCategories;

		$category = $this->getCategory();
		if ( isset( $wgEchoNotificationCategories[$category]['no-dismiss'] ) ) {
			$noDismiss = $wgEchoNotificationCategories[$category]['no-dismiss'];
		} else {
			$noDismiss = array();
		}
		if ( !in_array( $distribution, $noDismiss ) && !in_array( 'all' , $noDismiss ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Determine if the current user is allowed to view a particular
	 * field of this revision, if it's marked as deleted.  When no
	 * revision is attached always returns true.
	 *
	 * @param $field Integer:one of Revision::DELETED_TEXT,
	 *                              Revision::DELETED_COMMENT,
	 *                              Revision::DELETED_USER
	 * @param $user User object to check, or null to use $wgUser
	 * @return Boolean
	 */
	public function userCan( $field, User $user = null ) {
		$revision = $this->getRevision();
		if ( $revision ) {
			return $revision->userCan( $field, $user );
		} else {
			return true;
		}
	}

	## Accessors
	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getTimestamp() {
		return $this->timestamp;
	}

	/**
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @return string
	 */
	public function getVariant() {
		return $this->variant;
	}

	/**
	 * @return array|null
	 */
	public function getExtra() {
		return $this->extra;
	}

	public function getExtraParam( $key, $default = null ) {
		return isset( $this->extra[$key] ) ? $this->extra[$key] : $default;
	}

	/**
	 * @return User
	 */
	public function getAgent() {
		return $this->agent;
	}

	/**
	 * @return Title|null
	 */
	public function getTitle() {
		if ( $this->title ) {
			return $this->title;
		} elseif ( $this->pageId ) {
			return $this->title = Title::newFromId( $this->pageId );
		} elseif ( isset( $this->extra['page_title'], $this->extra['page_namespace'] ) ) {
			return $this->title = Title::newFromText(
				$this->extra['page_title'],
				$this->extra['page_namespace']
			);
		}
		return null;
	}

	/**
	 * @return Revision|null
	 */
	public function getRevision() {
		if ( $this->revision ) {
			return $this->revision;
		} elseif ( isset( $this->extra['revid'] ) ) {
			return $this->revision = Revision::newFromId( $this->extra['revid'] );
		}
		return null;
	}

	/**
	 * Get the category of the event type
	 * @return string
	 */
	public function getCategory() {
		return EchoNotificationController::getNotificationCategory( $this->type );
	}

	/**
	 * Get the message key of the primary or secondary link for a notification type.
	 *
	 * @param $rank String 'primary' or 'secondary'
	 * @return String i18n message key
	 */
	public function getLinkMessage( $rank ) {
		global $wgEchoNotifications;
		if ( isset( $wgEchoNotifications[$this->getType()][$rank.'-link']['message'] ) ) {
			return $wgEchoNotifications[$this->getType()][$rank.'-link']['message'];
		}
		return '';
	}

	/**
	 * Get the link destination of the primary or secondary link for a notification type.
	 *
	 * @param $rank String 'primary' or 'secondary'
	 * @return String The link destination, e.g. 'agent'
	 */
	public function getLinkDestination( $rank ) {
		global $wgEchoNotifications;
		if ( isset( $wgEchoNotifications[$this->getType()][$rank.'-link']['destination'] ) ) {
			return $wgEchoNotifications[$this->getType()][$rank.'-link']['destination'];
		}
		return '';
	}

	/**
	 * @return string
	 */
	public function getBundleHash() {
		return $this->bundleHash;
	}

	/**
	 * @param $hash string
	 */
	public function setBundleHash( $hash ) {
		$this->bundleHash = $hash;
	}
}
