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
	protected $agent = null;
	protected $title = null;
	protected $extra = null;
	protected $timestamp = null;

	/**
	 * You should not call the constructor.
	 * Instead use one of the factory functions:
	 * EchoEvent::create		To create a new event
	 * EchoEvent::loadFromRow	To load an event from a row object
	 * EchoEvent::loadFromID	To load an event from the database given its ID
	 */
	protected function __construct() {
	}

	/**
	 * Creates an EchoEvent object
	 * @param $info Named arguments:
	 * type (required): The event type;
	 * variant: A variant of the type;
	 * agent: The user who caused the event;
	 * title: The page on which the event was triggered;
	 * extra: Event-specific extra information (e.g. post content)
	 *
	 * @return The created EchoEvent.
	 */
	public static function create( $info = array() ) {
		$obj = new EchoEvent;
		static $validFields = array( 'type', 'variant', 'agent', 'title', 'extra' );

		if ( empty($info['type']) ) {
			throw new MWException( "'type' parameter is mandatory" );
		}

		$obj->id = false;
		$obj->timestamp = wfTimestampNow();

		foreach( $validFields as $field ) {
			if ( isset($info[$field]) ) {
				$obj->$field = $info[$field];
			}
		}

		if ( $obj->title && ! $obj->title instanceof Title ) {
			throw new MWException( "Invalid title parameter" );
		}

		if ( $obj->agent && !
			($obj->agent instanceof User ||
			$obj->agent instanceof StubObject)
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

		if ( is_array($this->extra) || is_object($this->extra) ) {
			$row['event_extra'] = serialize($this->extra);
		} elseif (is_null($this->extra) ) {
			$row['event_extra'] = null;
		} else {
			$row['event_extra'] = serialize( array($this->extra) );
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

		if ( ! $this->id ) {
			$this->id = $dbw->insertId();
		}
	}

	/**
	 * Loads an EchoEvent from a row object
	 *
	 * @param $row Database row object from echo_event
	 * @return EchoEvent object.
	 */
	public static function loadFromRow($row) {
		$obj = new EchoEvent;

		$obj->id = $row->event_id;
		$obj->timestamp = $row->event_timestamp;
		$obj->type = $row->event_type;
		$obj->variant = $row->event_variant;
		$obj->extra = $row->event_extra ? unserialize($row->event_extra) : null;

		if ( $row->event_agent_id ) {
			$obj->agent = User::newFromID( $row->event_agent_id );
		} elseif ( $row->event_agent_ip ) {
			$obj->agent = User::newFromName( $row->event_agent_ip, false );
		}

		if ( $row->event_page_title !== null ) {
			$obj->title = Title::makeTitleSafe(
				$row->event_page_namespace,
				$row->event_page_title
			);
		}

		return $obj;
	}

	/**
	 * Loads an EchoEvent from the database by ID
	 *
	 * @return EchoEvent object
	 */
	public static function loadFromID( $id ) {
		$dbr = wfGetDB( DB_SLAVE );

		$row = $dbr->selectRow( 'echo_event', '*', array('event_id' => $id), __METHOD__ );

		if ( ! $row ) {
			throw new MWException( "No EchoEvent found with ID: $id");
		}

		return self::loadFromRow( $row );
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

	public function getTitle() {
		return $this->title;
	}
}