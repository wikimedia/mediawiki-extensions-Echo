<?php

/**
 * Immutable class to represent an event.
 * In Echo nomenclature, an event is a single occurrence.
 * A user's subscriptions determine what Notifications they receive.
 */
class EchoEvent {
	protected $id = null;
	protected $type = null;
	protected $variant = null;
	/**
	 * @var User
	 */
	protected $agent = null;

	/**
	 * @var Title
	 */
	protected $title = null;
	protected $extra = null;
	protected $timestamp = null;

	/**
	 * You should not call the constructor.
	 * Instead use one of the factory functions:
	 * EchoEvent::create        To create a new event
	 * EchoEvent::newFromRow    To create an event object from a row object
	 * EchoEvent::newFromID     To create an event object from the database given its ID
	 */
	protected function __construct() {
	}

	## Save just as the ID
	function __sleep() {
		if ( !$this->id ) {
			throw new MWException( "Unable to serialize an uninitialized EchoEvent" );
		}
		return array( 'id' );
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
		$obj = new EchoEvent;
		static $validFields = array( 'type', 'variant', 'agent', 'title', 'extra' );

		if ( empty( $info['type'] ) ) {
			throw new MWException( "'type' parameter is mandatory" );
		}

		global $wgEchoEnabledEvents;

		static $runHook = true;
		// this hook should only be executed once to gather valid echo events
		if ( $runHook ) {
			// allow extensions to define their own event
			wfRunHooks( 'BeforeCreateEchoEvent', array( &$wgEchoEnabledEvents ) );
			$runHook = false;
		}
		if (
			$wgEchoEnabledEvents !== false &&
			!in_array( $info['type'], $wgEchoEnabledEvents )
		) {
			return false;
		}

		$obj->id = false;
		$obj->timestamp = wfTimestampNow();

		foreach ( $validFields as $field ) {
			if ( isset( $info[$field] ) ) {
				$obj->$field = $info[$field];
			}
		}

		if ( $obj->title && !$obj->title instanceof Title ) {
			throw new MWException( "Invalid title parameter" );
		}

		if ( $obj->agent && !
		( $obj->agent instanceof User ||
			$obj->agent instanceof StubObject )
		) {
			throw new MWException( "Invalid user parameter" );
		}

		$obj->insert();
		EchoNotificationController::notify( $obj );

		return $obj;
	}

	/**
	 * Inserts the object into the database.
	 */
	protected function insert() {
		$dbw = wfGetDB( DB_MASTER );

		if ( $this->id ) {
			throw new MWException( "Attempt to insert() an existing event" );
		}

		$this->id = $dbw->nextSequenceValue( 'echo_event_id' );

		$row = array(
			'event_id' => $this->id,
			'event_timestamp' => $dbw->timestamp( $this->timestamp ),
			'event_type' => $this->type,
			'event_variant' => $this->variant,
		);

		if ( is_array( $this->extra ) || is_object( $this->extra ) ) {
			$row['event_extra'] = serialize( $this->extra );
		} elseif ( is_null( $this->extra ) ) {
			$row['event_extra'] = null;
		} else {
			$row['event_extra'] = serialize( array( $this->extra ) );
		}

		if ( $this->agent ) {
			if ( $this->agent->isAnon() ) {
				$row['event_agent_ip'] = $this->agent->getName();
			} else {
				$row['event_agent_id'] = $this->agent->getId();
			}
		}

		if ( $this->title ) {
			$row['event_page_namespace'] = $this->title->getNamespace();
			$row['event_page_title'] = $this->title->getDBkey();
		}

		$dbw->insert( 'echo_event', $row, __METHOD__ );

		if ( !$this->id ) {
			$this->id = $dbw->insertId();
		}
	}

	/**
	 * Loads data from the provided $row into this object.
	 *
	 * @param $row Database row object from echo_event
	 */
	public function loadFromRow( $row ) {
		$this->id = $row->event_id;
		$this->timestamp = $row->event_timestamp;
		$this->type = $row->event_type;
		$this->variant = $row->event_variant;
		$this->extra = $row->event_extra ? unserialize( $row->event_extra ) : null;

		if ( $row->event_agent_id ) {
			$this->agent = User::newFromID( $row->event_agent_id );
		} elseif ( $row->event_agent_ip ) {
			$this->agent = User::newFromName( $row->event_agent_ip, false );
		}

		if ( $row->event_page_title !== null ) {
			$this->title = Title::makeTitleSafe(
				$row->event_page_namespace,
				$row->event_page_title
			);
		}
	}

	/**
	 * Loads data from the database into this object, given the event ID.
	 * @param $id int Event ID
	 * @param $fromMaster bool
	 * @throws MWException
	 */
	public function loadFromID( $id, $fromMaster = false ) {
		$db = wfGetDB( $fromMaster ? DB_MASTER : DB_SLAVE );

		$row = $db->selectRow( 'echo_event', '*', array( 'event_id' => $id ), __METHOD__ );

		if ( !$row && !$fromMaster ) {
			$this->loadFromID( $id, true );
		} elseif ( !$row ) {
			throw new MWException( "No EchoEvent found with ID: $id" );
		}

		$this->loadFromRow( $row );
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

	## Accessors
	public function getId() {
		return $this->id;
	}

	public function getTimestamp() {
		return $this->timestamp;
	}

	public function getType() {
		return $this->type;
	}

	public function getVariant() {
		return $this->variant;
	}

	public function getExtra() {
		return $this->extra;
	}

	public function getAgent() {
		return $this->agent;
	}

	/**
	 * @return Title
	 */
	public function getTitle() {
		return $this->title;
	}
}
