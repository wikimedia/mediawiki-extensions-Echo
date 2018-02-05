<?php

use MediaWiki\Logger\LoggerFactory;

/**
 * Immutable class to represent an event.
 * In Echo nomenclature, an event is a single occurrence.
 */
class EchoEvent extends EchoAbstractEntity implements Bundleable {

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

	protected $extra = [];

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
	 * Other events bundled with this one
	 *
	 * @var EchoEvent[]
	 */
	protected $bundledEvents;

	/**
	 * Deletion flag
	 *
	 * @var int
	 */
	protected $deleted = 0;

	/**
	 * You should not call the constructor.
	 * Instead use one of the factory functions:
	 * EchoEvent::create        To create a new event
	 * EchoEvent::newFromRow    To create an event object from a row object
	 * EchoEvent::newFromID     To create an event object from the database given its ID
	 */
	protected function __construct() {
	}

	## Save the id and timestamp
	function __sleep() {
		if ( !$this->id ) {
			throw new MWException( "Unable to serialize an uninitialized EchoEvent" );
		}

		return [ 'id', 'timestamp' ];
	}

	function __wakeup() {
		$this->loadFromID( $this->id );
	}

	function __toString() {
		return "EchoEvent(id={$this->id}; type={$this->type})";
	}

	/**
	 * Creates an EchoEvent object
	 * @param array $info Named arguments:
	 * type (required): The event type;
	 * variant: A variant of the type;
	 * agent: The user who caused the event;
	 * title: The page on which the event was triggered;
	 * extra: Event-specific extra information (e.g. post content)
	 *
	 * @throws MWException
	 * @return EchoEvent|bool false if aborted via hook or Echo DB is read-only
	 */
	public static function create( $info = [] ) {
		global $wgEchoNotifications;

		// Do not create event and notifications if write access is locked
		if ( wfReadOnly()
			|| MWEchoDbFactory::newFromDefault()->getEchoDb( DB_MASTER )->isReadOnly()
		) {
			return false;
		}

		$obj = new EchoEvent;
		static $validFields = [ 'type', 'variant', 'agent', 'title', 'extra' ];

		if ( empty( $info['type'] ) ) {
			throw new MWException( "'type' parameter is mandatory" );
		}

		if ( !isset( $wgEchoNotifications[$info['type']] ) ) {
			return false;
		}

		$obj->id = false;
		if ( isset( $info['timestamp'] ) ) {
			$obj->timestamp = $info['timestamp'];
		} else {
			$obj->timestamp = wfTimestampNow();
		}

		foreach ( $validFields as $field ) {
			if ( isset( $info[$field] ) ) {
				$obj->$field = $info[$field];
			}
		}

		// If the extra size is more than 50000 bytes, that means there is
		// probably a problem with the design of this notification type.
		// There might be data loss if the size exceeds the DB column size of
		// event_extra.
		if ( strlen( $obj->serializeExtra() ) > 50000 ) {
			wfDebugLog( __CLASS__, __FUNCTION__ . ': event extra data is too huge for ' . $info['type'] );

			return false;
		}

		if ( $obj->title ) {
			if ( !$obj->title instanceof Title ) {
				throw new InvalidArgumentException( 'Invalid title parameter' );
			}
			$obj->setTitle( $obj->title );
		}

		if ( $obj->agent && ! $obj->agent instanceof User ) {
			throw new InvalidArgumentException( "Invalid user parameter" );
		}

		if ( !Hooks::run( 'BeforeEchoEventInsert', [ $obj ] ) ) {
			return false;
		}

		// @Todo - Database insert logic should not be inside the model
		$obj->insert();

		Hooks::run( 'EchoEventInsertComplete', [ $obj ] );

		global $wgEchoUseJobQueue;

		EchoNotificationController::notify( $obj, $wgEchoUseJobQueue );

		return $obj;
	}

	/**
	 * Convert the object's database property to array
	 * @return array
	 */
	public function toDbArray() {
		$data = [
			'event_type' => $this->type,
			'event_variant' => $this->variant,
			'event_deleted' => $this->deleted,
			'event_extra' => $this->serializeExtra()
		];
		if ( $this->id ) {
			$data['event_id'] = $this->id;
		}
		if ( $this->agent ) {
			if ( $this->agent->isAnon() ) {
				$data['event_agent_ip'] = $this->agent->getName();
			} else {
				$data['event_agent_id'] = $this->agent->getId();
			}
		}

		if ( $this->pageId ) {
			$data['event_page_id'] = $this->pageId;
		} elseif ( $this->title ) {
			$pageId = $this->title->getArticleId();
			// Don't need any special handling for title with no id
			// as they are already stored in extra data array
			if ( $pageId ) {
				$data['event_page_id'] = $pageId;
			}
		}

		return $data;
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
		$eventMapper = new EchoEventMapper();
		$this->id = $eventMapper->insert( $this );

		$targetPages = self::resolveTargetPages( $this->getExtraParam( 'target-page' ) );
		if ( $targetPages ) {
			$targetMapper = new EchoTargetPageMapper();
			foreach ( $targetPages as $title ) {
				$targetPage = EchoTargetPage::create( $title, $this );
				if ( $targetPage ) {
					$targetMapper->insert( $targetPage );
				}
			}
		}
	}

	/**
	 * @param int[]|int|false $targetPageIds
	 * @return Title[]
	 */
	protected static function resolveTargetPages( $targetPageIds ) {
		if ( !$targetPageIds ) {
			return [];
		}
		if ( !is_array( $targetPageIds ) ) {
			$targetPageIds = [ $targetPageIds ];
		}
		$result = [];
		foreach ( $targetPageIds as $targetPageId ) {
			// Make sure the target-page id is a valid id
			$title = Title::newFromID( $targetPageId );
			// Try master if there is no match
			if ( !$title ) {
				$title = Title::newFromID( $targetPageId, Title::GAID_FOR_UPDATE );
			}
			if ( $title ) {
				$result[] = $title;
			}
		}

		return $result;
	}

	/**
	 * Loads data from the provided $row into this object.
	 *
	 * @param stdClass $row row object from echo_event
	 * @return bool Whether loading was successful
	 */
	public function loadFromRow( $row ) {
		$this->id = $row->event_id;
		$this->type = $row->event_type;

		// If the object is loaded from __sleep(), timestamp should be already set
		if ( !$this->timestamp ) {
			if ( isset( $row->notification_timestamp ) ) {
				$this->timestamp = wfTimestamp( TS_MW, $row->notification_timestamp );
			} else {
				$this->timestamp = wfTimestampNow();
			}
		}

		$this->variant = $row->event_variant;
		try {
			$this->extra = $row->event_extra ? unserialize( $row->event_extra ) : [];
		} catch ( Exception $e ) {
			// T73489: unserializing can fail for old notifications
			LoggerFactory::getInstance( 'Echo' )->warning(
				'Failed to unserialize event {id}',
				[
					'id' => $row->event_id
				]
			);
			return false;
		}
		$this->pageId = $row->event_page_id;
		$this->deleted = $row->event_deleted;

		if ( $row->event_agent_id ) {
			$this->agent = User::newFromID( $row->event_agent_id );
		} elseif ( $row->event_agent_ip ) {
			$this->agent = User::newFromName( $row->event_agent_ip, false );
		}

		// Lazy load the title from getTitle() so that we can do a batch-load
		if (
			isset( $this->extra['page_title'], $this->extra['page_namespace'] )
			&& !$row->event_page_id
		) {
			$this->title = Title::makeTitleSafe(
				$this->extra['page_namespace'],
				$this->extra['page_title']
			);
		}
		if ( $row->event_page_id ) {
			$titleCache = EchoTitleLocalCache::create();
			$titleCache->add( $row->event_page_id );
		}
		if ( isset( $this->extra['revid'] ) && $this->extra['revid'] ) {
			$revisionCache = EchoRevisionLocalCache::create();
			$revisionCache->add( $this->extra['revid'] );
		}

		return true;
	}

	/**
	 * Loads data from the database into this object, given the event ID.
	 * @param int $id Event ID
	 * @param bool $fromMaster
	 * @return bool Whether it loaded successfully
	 */
	public function loadFromID( $id, $fromMaster = false ) {
		$eventMapper = new EchoEventMapper();
		$event = $eventMapper->fetchById( $id, $fromMaster );
		if ( !$event ) {
			return false;
		}

		// Copy over the attribute
		$this->id = $event->id;
		$this->type = $event->type;
		$this->variant = $event->variant;
		$this->extra = $event->extra;
		$this->pageId = $event->pageId;
		$this->agent = $event->agent;
		$this->title = $event->title;
		$this->deleted = $event->deleted;
		// Don't overwrite timestamp if it exists already
		if ( !$this->timestamp ) {
			$this->timestamp = $event->timestamp;
		}

		return true;
	}

	/**
	 * Creates an EchoEvent from a row object
	 *
	 * @param stdClass $row row object from echo_event
	 * @return EchoEvent|bool
	 */
	public static function newFromRow( $row ) {
		$obj = new EchoEvent();
		return $obj->loadFromRow( $row )
			? $obj
			: false;
	}

	/**
	 * Creates an EchoEvent from the database by ID
	 *
	 * @param int $id Event ID
	 * @return EchoEvent|bool
	 */
	public static function newFromID( $id ) {
		$obj = new EchoEvent();
		return $obj->loadFromID( $id )
			? $obj
			: false;
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
			$extra = serialize( [ $this->extra ] );
		}

		return $extra;
	}

	/**
	 * Check if the event is dismissable for the given distribution type
	 *
	 * @param string $distribution notification distribution web/email
	 * @return bool
	 */
	public function isDismissable( $distribution ) {
		global $wgEchoNotificationCategories;

		$category = $this->getCategory();
		if ( isset( $wgEchoNotificationCategories[$category]['no-dismiss'] ) ) {
			$noDismiss = $wgEchoNotificationCategories[$category]['no-dismiss'];
		} else {
			$noDismiss = [];
		}
		if ( !in_array( $distribution, $noDismiss ) && !in_array( 'all', $noDismiss ) ) {
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
	 * @param int $field One of Revision::DELETED_TEXT,
	 *                              Revision::DELETED_COMMENT,
	 *                              Revision::DELETED_USER
	 * @param User $user User object to check
	 * @return bool
	 */
	public function userCan( $field, User $user ) {
		$revision = $this->getRevision();
		// User is handled specially
		if ( $field === Revision::DELETED_USER ) {
			$agent = $this->getAgent();
			if ( !$agent ) {
				// No user associated, so they can see it.
				return true;
			} elseif ( $revision
				&& $agent->getName() === $revision->getUserText( Revision::RAW )
			) {
				// If the agent and the revision user are the same, use rev_deleted
				return $revision->userCan( $field, $user );
			} else {
				// Use User::isHidden()
				return $user->isAllowedAny( 'viewsuppressed', 'hideuser' ) || !$agent->isHidden();
			}
		} elseif ( $revision ) {
			// A revision is set, use rev_deleted
			return $revision->userCan( $field, $user );
		} else {
			// Not a user, and there is no associated revision, so the user can see it
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
	 * @return string|null
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
	 * @return User|null
	 */
	public function getAgent() {
		return $this->agent;
	}

	/**
	 * @param bool $fromMaster
	 * @return null|Title
	 */
	public function getTitle( $fromMaster = false ) {
		if ( $this->title ) {
			return $this->title;
		} elseif ( $this->pageId ) {
			$titleCache = EchoTitleLocalCache::create();
			$title = $titleCache->get( $this->pageId );
			if ( $title ) {
				$this->title = $title;
				return $this->title;
			}

			$this->title = Title::newFromID( $this->pageId, $fromMaster ? Title::GAID_FOR_UPDATE : 0 );
			return $this->title;
		} elseif ( isset( $this->extra['page_title'], $this->extra['page_namespace'] ) ) {
			$this->title = Title::makeTitleSafe(
				$this->extra['page_namespace'],
				$this->extra['page_title']
			);
			return $this->title;
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
			$revisionCache = EchoRevisionLocalCache::create();
			$revision = $revisionCache->get( $this->extra['revid'] );
			if ( $revision ) {
				$this->revision = $revision;
				return $this->revision;
			}

			$this->revision = Revision::newFromId( $this->extra['revid'] );
			return $this->revision;
		}

		return null;
	}

	/**
	 * Get the category of the event type
	 * @return string
	 */
	public function getCategory() {
		$attributeManager = EchoAttributeManager::newFromGlobalVars();

		return $attributeManager->getNotificationCategory( $this->type );
	}

	/**
	 * Get the section of the event type
	 * @return string
	 */
	public function getSection() {
		$attributeManager = EchoAttributeManager::newFromGlobalVars();

		return $attributeManager->getNotificationSection( $this->type );
	}

	/**
	 * Determine whether an event can use the job queue, or should be immediate
	 * @return bool
	 */
	public function getUseJobQueue() {
		global $wgEchoNotifications;
		if ( isset( $wgEchoNotifications[$this->type]['immediate'] ) ) {
			return !(bool)$wgEchoNotifications[$this->type]['immediate'];
		}

		return true;
	}

	public function setType( $type ) {
		$this->type = $type;
	}

	public function setVariant( $variant ) {
		$this->variant = $variant;
	}

	public function setAgent( User $agent ) {
		$this->agent = $agent;
	}

	public function setTitle( Title $title ) {
		$this->title = $title;
		$pageId = $title->getArticleID();
		if ( $pageId ) {
			$this->pageId = $pageId;
		} else {
			$this->extra['page_title'] = $title->getDBkey();
			$this->extra['page_namespace'] = $title->getNamespace();
		}
	}

	public function setExtra( $name, $value ) {
		$this->extra[$name] = $value;
	}

	/**
	 * Get the message key of the primary or secondary link for a notification type.
	 *
	 * @param String $rank 'primary' or 'secondary'
	 * @return String i18n message key
	 */
	public function getLinkMessage( $rank ) {
		global $wgEchoNotifications;
		$type = $this->getType();
		if ( isset( $wgEchoNotifications[$type][$rank . '-link']['message'] ) ) {
			return $wgEchoNotifications[$type][$rank . '-link']['message'];
		}

		return '';
	}

	/**
	 * Get the link destination of the primary or secondary link for a notification type.
	 *
	 * @param String $rank 'primary' or 'secondary'
	 * @return String The link destination, e.g. 'agent'
	 */
	public function getLinkDestination( $rank ) {
		global $wgEchoNotifications;
		$type = $this->getType();
		if ( isset( $wgEchoNotifications[$type][$rank . '-link']['destination'] ) ) {
			return $wgEchoNotifications[$type][$rank . '-link']['destination'];
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
	 * @param string $hash
	 */
	public function setBundleHash( $hash ) {
		$this->bundleHash = $hash;
	}

	/**
	 * @return bool
	 */
	public function isDeleted() {
		return $this->deleted === 1;
	}

	public function setBundledEvents( $events ) {
		$this->bundledEvents = $events;
	}

	public function getBundledEvents() {
		return $this->bundledEvents;
	}

	/**
	 * @inheritDoc
	 */
	public function canBeBundled() {
		return true;
	}

	/**
	 * @inheritDoc
	 */
	public function getBundlingKey() {
		return $this->getBundleHash();
	}

	/**
	 * @inheritDoc
	 */
	public function setBundledElements( $bundleables ) {
		$this->setBundledEvents( $bundleables );
	}

	/**
	 * @inheritDoc
	 */
	public function getSortingKey() {
		return $this->getTimestamp();
	}
}
