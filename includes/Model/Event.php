<?php

namespace MediaWiki\Extension\Notifications\Model;

use Exception;
use InvalidArgumentException;
use MediaWiki\Extension\Notifications\Bundleable;
use MediaWiki\Extension\Notifications\Controller\NotificationController;
use MediaWiki\Extension\Notifications\DbFactory;
use MediaWiki\Extension\Notifications\Hooks\HookRunner;
use MediaWiki\Extension\Notifications\Mapper\EventMapper;
use MediaWiki\Extension\Notifications\Mapper\TargetPageMapper;
use MediaWiki\Extension\Notifications\Services;
use MediaWiki\Logger\LoggerFactory;
use MediaWiki\MediaWikiServices;
use MediaWiki\Notification\RecipientSet;
use MediaWiki\Page\PageIdentity;
use MediaWiki\Revision\RevisionRecord;
use MediaWiki\Title\Title;
use MediaWiki\User\ActorStore;
use MediaWiki\User\User;
use MediaWiki\User\UserIdentity;
use stdClass;
use Wikimedia\IPUtils;
use Wikimedia\NonSerializable\NonSerializableTrait;
use Wikimedia\NormalizedException\NormalizedException;
use Wikimedia\Rdbms\IDBAccessObject;

/**
 * Immutable class to represent an event.
 * In Echo nomenclature, an event is a single occurrence.
 */
class Event extends AbstractEntity implements Bundleable {

	// We only use PHP serialization for event_extra arrays, but not for whole Event objects.
	// Disallow using it to prevent mistakes.
	use NonSerializableTrait;

	/**
	 * Index in the `extra` array that defines a list of recipients stored as an array of user_ids
	 */
	public const RECIPIENTS_IDX = 'recipients';

	/** @var string|null */
	protected $type = null;
	/** @var int|null|false */
	protected $id = null;
	/**
	 * @var User|null
	 */
	protected $agent = null;

	/**
	 * Loaded dynamically on request
	 *
	 * @var Title|null
	 */
	protected $title = null;
	/** @var int|null */
	protected $pageId = null;

	/**
	 * Loaded dynamically on request
	 *
	 * @var RevisionRecord|null
	 */
	protected $revision = null;

	/** @var array */
	protected $extra = [];

	/**
	 * Notification timestamp
	 * @var string|null
	 */
	protected $timestamp = null;

	/**
	 * A hash used to bundle a set of events, events that can be
	 * grouped for a user has the same bundle hash
	 * @var string|null
	 */
	protected $bundleHash;

	/**
	 * Other events bundled with this one
	 *
	 * @var Event[]|null
	 */
	protected $bundledEvents;

	/**
	 * Deletion flag
	 *
	 * @var int
	 */
	protected $deleted = 0;

	/** For use in tests */
	public static bool $alwaysInsert = false;

	/**
	 * You should not call the constructor.
	 * Instead, use one of the factory functions:
	 * Event::create        To create a new event
	 * Event::newFromRow    To create an event object from a row object
	 * Event::newFromID     To create an event object from the database given its ID
	 */
	protected function __construct() {
	}

	public function __toString() {
		return "Event(id={$this->id}; type={$this->type})";
	}

	/**
	 * Creates an Event object
	 * @param array $info Named arguments:
	 * @param ?RecipientSet $recipients optional, list of recipients
	 * type (required): The event type;
	 * agent: The user who caused the event (UserIdentity);
	 * title: The page on which the event was triggered (PageIdentity);
	 * extra: Event-specific extra information (e.g. post content, delay time, root job params).
	 *
	 * Delayed jobs extra params:
	 * delay: Amount of time in seconds for the notification to be delayed
	 *
	 * Job deduplication extra params:
	 * rootJobSignature: The sha1 signature of the job
	 * rootJobTimestamp: The timestamp when the job gets submitted
	 *
	 * For example to enqueue a new `example` root job or make a parent job
	 * no-op when submitting a new notification you need to pass this extra params:
	 *
	 * [ 'extra' => Job::newRootJobParams('example') ]
	 *
	 * @return Event|false False if aborted via hook or Echo DB is read-only
	 */
	public static function create( $info = [], ?RecipientSet $recipients = null ) {
		global $wgEchoNotifications;

		if ( $recipients !== null ) {
			$mergedRecipients = [];
			if ( isset( $info['extra'][ self::RECIPIENTS_IDX ] ) ) {
				$mergedRecipients = $info['extra'][ self::RECIPIENTS_IDX ];
			}
			foreach ( $recipients as $recipient ) {
				$mergedRecipients[] = $recipient->getId();
			}
			$info['extra'][ self::RECIPIENTS_IDX ] = array_unique( $mergedRecipients );
		}

		$services = MediaWikiServices::getInstance();
		// Do not create event and notifications if write access is locked
		if ( $services->getReadOnlyMode()->isReadOnly()
			|| DbFactory::newFromDefault()->getEchoDb( DB_PRIMARY )->isReadOnly()
		) {
			return false;
		}

		if ( empty( $info['type'] ) ) {
			throw new InvalidArgumentException( "'type' parameter is mandatory" );
		}

		if ( !isset( $wgEchoNotifications[$info['type']] ) ) {
			return false;
		}

		$obj = new self();
		$obj->id = false;
		$obj->type = $info['type'];
		$obj->extra = $info['extra'] ?? [];
		if ( isset( $info['agent'] ) ) {
			try {
				$obj->setAgent( $info['agent'] );
			} catch ( NormalizedException $e ) {
				// TODO: when no errors are logged in production, remove this and let the exception happen
				LoggerFactory::getInstance( 'Echo' )->error(
					$e->getNormalizedMessage(),
					[ 'exception' => $e ] + $e->getMessageContext()
				);
				return false;
			}
		}
		if ( isset( $info['title'] ) ) {
			// This may modify $obj->extra as well
			$obj->setTitle( $info['title'] );
		}
		$obj->timestamp = $info['timestamp'] ?? wfTimestampNow();

		// If the extra size is more than 50000 bytes, that means there is
		// probably a problem with the design of this notification type.
		// There might be data loss if the size exceeds the DB column size of
		// event_extra.
		if ( strlen( $obj->serializeExtra() ) > 50000 ) {
			wfDebugLog( __CLASS__, __FUNCTION__ . ': event extra data is too huge for ' . $info['type'] );

			return false;
		}

		$hookRunner = new HookRunner( $services->getHookContainer() );
		if ( !$hookRunner->onBeforeEchoEventInsert( $obj ) ) {
			return false;
		}

		// @Todo - Database insert logic should not be inside the model
		if ( self::$alwaysInsert ) {
			$obj->insert();
		}

		global $wgEchoUseJobQueue;

		NotificationController::notify( $obj, $wgEchoUseJobQueue );

		return $obj;
	}

	/**
	 * Convert the object's database property to array
	 * @return array
	 */
	public function toDbArray() {
		$data = [
			'event_type' => $this->type,
			'event_deleted' => $this->deleted,
			'event_extra' => $this->serializeExtra()
		];
		if ( $this->id ) {
			$data['event_id'] = $this->id;
		}
		if ( $this->agent ) {
			if ( !$this->agent->isRegistered() ) {
				$data['event_agent_ip'] = $this->agent->getName();
			} else {
				$data['event_agent_id'] = $this->agent->getId();
			}
		}

		if ( $this->pageId ) {
			$data['event_page_id'] = $this->pageId;
		} elseif ( $this->title ) {
			$pageId = $this->title->getArticleID();
			// Don't need any special handling for title with no id
			// as they are already stored in extra data array
			if ( $pageId ) {
				$data['event_page_id'] = $pageId;
			}
		}

		return $data;
	}

	/**
	 * Creates an Event from an array. The array should be output from ::toDbArray().
	 *
	 * @param array $data
	 * @return self
	 */
	public static function newFromArray( $data ) {
		$obj = new self();
		if ( isset( $data['event_id'] ) ) {
			$obj->id = $data['event_id'];
		}
		$obj->type = $data['event_type'];
		$obj->extra = $data['event_extra'] ? self::deserializeExtra( $data['event_extra'] ) : [];
		if ( isset( $data['event_page_id'] ) ) {
			$obj->pageId = $data['event_page_id'];
		}
		$obj->deleted = $data['event_deleted'];

		if ( $data['event_agent_id'] ?? 0 ) {
			$obj->agent = User::newFromId( $data['event_agent_id'] );
		} elseif ( isset( $data['event_agent_ip'] ) ) {
			$obj->agent = User::newFromName( $data['event_agent_ip'], false );
		}

		return $obj;
	}

	/**
	 * Check whether the echo event is an enabled event
	 */
	public function isEnabledEvent(): bool {
		global $wgEchoNotifications;
		return isset( $wgEchoNotifications[$this->getType()] );
	}

	/**
	 * Insert this event into the database if it hasn't been yet, and return its id.
	 * Subsequent calls on this instance will not cause repeated insertion
	 * and will always return the same id.
	 * @return int
	 */
	public function acquireId() {
		if ( !$this->id ) {
			$this->insert();
		}
		return $this->id;
	}

	/**
	 * Inserts the object into the database.
	 */
	protected function insert() {
		$eventMapper = new EventMapper();
		$this->id = $eventMapper->insert( $this );

		$targetPages = self::resolveTargetPages( $this->getExtraParam( 'target-page' ) );
		if ( $targetPages ) {
			$targetMapper = new TargetPageMapper();
			foreach ( $targetPages as $title ) {
				$targetPage = TargetPage::create( $title, $this );
				if ( $targetPage ) {
					$targetMapper->insert( $targetPage );
				}
			}
		}

		$services = MediaWikiServices::getInstance();
		$hookRunner = new HookRunner( $services->getHookContainer() );
		$hookRunner->onEventInsertComplete( $this );

		$stats = $services->getStatsFactory()->withComponent( 'Echo' );
		$type = $this->getType();
		// TODO remove copyToStatsdAt once new dashboards are created, T359347
		$stats->getCounter( 'event_all' )
			->setLabel( 'event_type', $type )
			->copyToStatsdAt( [ 'echo.event.all', "echo.event.$type" ] )
			->increment();
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
			// Try primary database if there is no match
			if ( !$title ) {
				$title = Title::newFromID( $targetPageId, IDBAccessObject::READ_LATEST );
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
		$this->id = (int)$row->event_id;
		$this->type = $row->event_type;

		if ( !$this->timestamp ) {
			if ( isset( $row->notification_timestamp ) ) {
				$this->timestamp = wfTimestamp( TS_MW, $row->notification_timestamp );
			} else {
				$this->timestamp = wfTimestampNow();
			}
		}
		try {
			$this->extra = $row->event_extra ? self::deserializeExtra( $row->event_extra ) : [];
		} catch ( Exception ) {
			// T73489: unserializing can fail for old notifications
			LoggerFactory::getInstance( 'Echo' )->warning(
				'Failed to unserialize event {id}',
				[
					'id' => $row->event_id
				]
			);
			return false;
		}
		array_walk_recursive(
			$this->extra,
			static function ( $value, $key ) use ( $row ) {
				if ( $value instanceof \__PHP_Incomplete_Class ) {
					// T388725: figure out what is causing those __PHP_Incomplete_Class instances
					LoggerFactory::getInstance( 'Echo' )->warning(
						'Unserializing of extra data partially failed for event {id} of type {type}',
						[
							'id' => $row->event_id,
							'type' => $row->event_type,
							'unserializable_data' => $row->event_extra,
							'key' => $key,
							'created_class' => var_export( $value, true ),
						]
					);
				}
			}
		);

		$this->pageId = $row->event_page_id;
		$this->deleted = $row->event_deleted;

		if ( $row->event_agent_id ) {
			$this->agent = User::newFromId( (int)$row->event_agent_id );
		} elseif ( $row->event_agent_ip ) {
			// Due to an oversight, non-existing users could be inserted as IPs.
			// This wouldn't cause problems if there wasn't the limit of 39 bytes for
			// the database field, leading to silent truncation of long user names.
			// Ignoring such entries and setting the agent to null could cause
			// exceptions in presentation models, hence we accept the name if it's
			// definitely not been truncated, otherwise return a fallback user.
			if ( IPUtils::isValid( $row->event_agent_ip )
				|| strlen( $row->event_agent_ip ) < 39
			) {
				$this->agent = User::newFromName( $row->event_agent_ip, false );
			} else {
				$this->agent = User::newFromName( ActorStore::UNKNOWN_USER_NAME, false );
			}
		}

		// Lazy load the title from getTitle() so that we can do a batch-load
		if (
			isset( $this->extra['page_title'] ) && isset( $this->extra['page_namespace'] )
			&& !$row->event_page_id
		) {
			$this->title = Title::makeTitleSafe(
				$this->extra['page_namespace'],
				$this->extra['page_title']
			);
		}
		if ( $row->event_page_id ) {
			$titleCache = Services::getInstance()->getTitleLocalCache();
			$titleCache->add( (int)$row->event_page_id );
		}
		if ( isset( $this->extra['revid'] ) && $this->extra['revid'] ) {
			$revisionCache = Services::getInstance()->getRevisionLocalCache();
			$revisionCache->add( $this->extra['revid'] );
		}

		return true;
	}

	/**
	 * Loads data from the database into this object, given the event ID.
	 * @param int $id Event ID
	 * @param bool $fromPrimary
	 * @return bool Whether it loaded successfully
	 */
	public function loadFromID( $id, $fromPrimary = false ) {
		$eventMapper = new EventMapper();
		$event = $eventMapper->fetchById( $id, $fromPrimary );
		if ( !$event ) {
			return false;
		}

		// Copy over the attribute
		$this->id = $event->id;
		$this->type = $event->type;
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
	 * Creates an Event from a row object
	 *
	 * @param stdClass $row row object from echo_event
	 * @return Event|false
	 */
	public static function newFromRow( $row ) {
		$obj = new Event();
		return $obj->loadFromRow( $row )
			? $obj
			: false;
	}

	/**
	 * Creates an Event from the database by ID
	 *
	 * @param int $id Event ID
	 * @return Event|false
	 */
	public static function newFromID( $id ) {
		$obj = new Event();
		return $obj->loadFromID( $id )
			? $obj
			: false;
	}

	/**
	 * Since 1.45 Echo stores `extra` as JSON, to be backwards compatible we still support
	 * deserialization in both formats - JSON, and the legacy php unserialize
	 *
	 * @param string $serialized
	 * @return array
	 */
	private static function deserializeExtra( string $serialized ) {
		if ( str_starts_with( $serialized, '{' ) || str_starts_with( $serialized, '[' ) ) {
			$codec = MediaWikiServices::getInstance()->getJsonCodec();
			return $codec->deserialize( $serialized );
		}
		return $serialized ? unserialize( $serialized ) : [];
	}

	/**
	 * Serialize the extra data for event
	 * @return string|null
	 */
	private function serializeExtra() {
		if ( $this->extra === null ) {
			return null;
		}
		$extra = $this->extra;
		if ( !is_array( $extra ) && !is_object( $extra ) ) {
			$extra = [ $extra ];
		}
		return MediaWikiServices::getInstance()->getJsonCodec()->serialize( $extra );
	}

	/**
	 * Determine if the current user is allowed to view a particular
	 * field of this revision, if it's marked as deleted.  When no
	 * revision is attached always returns true.
	 *
	 * @param int $field One of RevisionRecord::DELETED_TEXT,
	 *                              RevisionRecord::DELETED_COMMENT,
	 *                              RevisionRecord::DELETED_USER
	 * @param User $user User object to check
	 * @return bool
	 */
	public function userCan( $field, User $user ) {
		$revision = $this->getRevision();
		// User is handled specially
		if ( $field === RevisionRecord::DELETED_USER ) {
			$agent = $this->getAgent();
			if ( !$agent ) {
				// No user associated, so they can see it.
				return true;
			}

			if (
				$revision
				&& $agent->getName() === $revision->getUser( RevisionRecord::RAW )->getName()
			) {
				// If the agent and the revision user are the same, use rev_deleted
				return $revision->audienceCan( $field, RevisionRecord::FOR_THIS_USER, $user );
			} else {
				// Use User::isHidden()
				$permManager = MediaWikiServices::getInstance()->getPermissionManager();
				return $permManager->userHasAnyRight( $user, 'viewsuppressed', 'hideuser' )
					|| !$agent->isHidden();
			}
		} elseif ( $revision ) {
			// A revision is set, use rev_deleted
			return $revision->audienceCan( $field, RevisionRecord::FOR_THIS_USER, $user );
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
	 * @return array
	 */
	public function getExtra() {
		return $this->extra;
	}

	/**
	 * @param string $key
	 * @param mixed|null $default
	 * @return mixed|null
	 */
	public function getExtraParam( $key, $default = null ) {
		return $this->extra[$key] ?? $default;
	}

	/**
	 * @return User|null
	 */
	public function getAgent() {
		return $this->agent;
	}

	/**
	 * Check whether this event allows its agent to be notified.
	 *
	 * Notifying the agent is only allowed if the event's type allows it, or if the event extra
	 * explicitly specifies 'notifyAgent' => true.
	 *
	 * @return bool
	 */
	public function canNotifyAgent() {
		global $wgEchoNotifications;
		$allowedInConfig = $wgEchoNotifications[$this->getType()]['canNotifyAgent'] ?? false;
		$allowedInExtra = $this->getExtraParam( 'notifyAgent', false );
		return $allowedInConfig || $allowedInExtra;
	}

	/**
	 * @param bool $fromPrimary
	 * @return null|Title
	 */
	public function getTitle( $fromPrimary = false ) {
		if ( $this->title ) {
			return $this->title;
		}
		if ( $this->pageId ) {
			$titleCache = Services::getInstance()->getTitleLocalCache();
			$title = $titleCache->get( $this->pageId );
			if ( $title ) {
				$this->title = $title;
				return $this->title;
			}
			$this->title = Title::newFromID( $this->pageId, $fromPrimary ? IDBAccessObject::READ_LATEST : 0 );
			if ( $this->title ) {
				return $this->title;
			}
		}
		if ( isset( $this->extra['page_title'] ) && isset( $this->extra['page_namespace'] ) ) {
			$this->title = Title::makeTitleSafe(
				$this->extra['page_namespace'],
				$this->extra['page_title']
			);
			return $this->title;
		}
		return null;
	}

	/**
	 * @return int|null
	 */
	public function getPageId(): ?int {
		return $this->pageId;
	}

	/**
	 * @return RevisionRecord|null
	 */
	public function getRevision() {
		if ( $this->revision ) {
			return $this->revision;
		}

		if ( isset( $this->extra['revid'] ) ) {
			$revisionCache = Services::getInstance()->getRevisionLocalCache();
			$revision = $revisionCache->get( $this->extra['revid'] );
			if ( $revision ) {
				$this->revision = $revision;
				return $this->revision;
			}

			$store = MediaWikiServices::getInstance()->getRevisionStore();
			$this->revision = $store->getRevisionById( $this->extra['revid'] );
			return $this->revision;
		}

		return null;
	}

	/**
	 * Get the category of the event type
	 * @return string
	 */
	public function getCategory() {
		return Services::getInstance()->getAttributeManager()->getNotificationCategory( $this->type );
	}

	/**
	 * Get the section of the event type
	 * @return string
	 */
	public function getSection() {
		return Services::getInstance()->getAttributeManager()->getNotificationSection( $this->type );
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

	/**
	 * @param string|null $type
	 */
	public function setType( $type ) {
		$this->type = $type;
	}

	public function setAgent( UserIdentity $agentIdent ) {
		if ( !$agentIdent->isRegistered() && !IPUtils::isValid( $agentIdent->getName() ) ) {
			throw new NormalizedException(
				'Invalid IP agent: {username} for event type {event_type}',
				[
					'username' => $agentIdent->getName(),
					'event_type' => $this->type,
				]
			);
		}

		$services = MediaWikiServices::getInstance();
		$this->agent = $services->getUserFactory()->newFromUserIdentity( $agentIdent );
	}

	public function setTitle( PageIdentity $page ) {
		$services = MediaWikiServices::getInstance();
		$this->title = $services->getTitleFactory()->newFromPageIdentity( $page );

		// Use Title::getArticleId() instead of PageIdentity::getId() in order to allow special pages
		// as the target titles. This is used by e.g. AbuseFilter and GrowthExperiments.
		// TODO: Should that be disallowed?
		$pageId = $this->title->getArticleId();
		if ( $pageId ) {
			$this->pageId = $pageId;
		} else {
			$this->extra['page_title'] = $this->title->getDBkey();
			$this->extra['page_namespace'] = $this->title->getNamespace();
		}
	}

	/**
	 * @param string $name
	 * @param mixed $value
	 */
	public function setExtra( $name, $value ) {
		$this->extra[$name] = $value;
	}

	/**
	 * Get the message key of the primary or secondary link for a notification type.
	 *
	 * @param string $rank 'primary' or 'secondary'
	 * @return string i18n message key
	 */
	public function getLinkMessage( $rank ) {
		global $wgEchoNotifications;
		$type = $this->getType();
		return $wgEchoNotifications[$type][$rank . '-link']['message'] ?? '';
	}

	/**
	 * Get the link destination of the primary or secondary link for a notification type.
	 *
	 * @param string $rank 'primary' or 'secondary'
	 * @return string The link destination, e.g. 'agent'
	 */
	public function getLinkDestination( $rank ) {
		global $wgEchoNotifications;
		$type = $this->getType();
		return $wgEchoNotifications[$type][$rank . '-link']['destination'] ?? '';
	}

	/**
	 * @return string|null
	 */
	public function getBundleHash() {
		return $this->bundleHash;
	}

	/**
	 * @param string|null $hash
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

	public function setBundledEvents( array $events ) {
		$this->bundledEvents = $events;
	}

	public function getBundledEvents(): ?array {
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
	public function setBundledElements( array $bundleables ) {
		$this->setBundledEvents( $bundleables );
	}

	/**
	 * @inheritDoc
	 */
	public function getSortingKey() {
		return $this->getTimestamp();
	}

	/**
	 * Return the list of fields that should be selected to create
	 * a new event with Event::newFromRow
	 * @return string[]
	 */
	public static function selectFields() {
		return [
			'event_id',
			'event_type',
			'event_agent_id',
			'event_agent_ip',
			'event_extra',
			'event_page_id',
			'event_deleted',
		];
	}

}

class_alias( Event::class, 'EchoEvent' );
