<?php

class EchoNotification extends EchoAbstractEntity {

	/**
	 * @var User
	 */
	protected $user;

	/**
	 * @var EchoEvent
	 */
	protected $event;

	/**
	 * The target page object for the notification if there is one. Null means
	 * the information has not been loaded.
	 *
	 * @var EchoTargetPage[]|null
	 */
	protected $targetPages;

	/**
	 * @var string
	 */
	protected $timestamp;

	/**
	 * @var string
	 */
	protected $readTimestamp;

	/**
	 * Determine whether this is a bundle base.  Default is 1,
	 * which means it's a bundle base
	 * @var int
	 */
	protected $bundleBase = 1;

	/**
	 * The hash used to determine if a set of event could be bundled
	 * @var string
	 */
	protected $bundleHash = '';

	/**
	 * The hash used to bundle events to display
	 * @var string
	 */
	protected $bundleDisplayHash = '';

	/**
	 * Do not use this constructor.
	 */
	protected function __construct() {
	}

	/**
	 * Creates an EchoNotification object based on event and user
	 * @param $info array The following keys are required:
	 * - 'event' The EchoEvent being notified about.
	 * - 'user' The User being notified.
	 * @throws MWException
	 * @return EchoNotification
	 */
	public static function create( array $info ) {
		$obj = new EchoNotification();
		static $validFields = array( 'event', 'user' );

		foreach ( $validFields as $field ) {
			if ( isset( $info[$field] ) ) {
				$obj->$field = $info[$field];
			} else {
				throw new MWException( "Field $field is required" );
			}
		}

		if ( !$obj->user instanceof User && !$obj->user instanceof StubObject ) {
			throw new MWException( 'Invalid user parameter, expected: User/StubObject object' );
		}

		if ( !$obj->event instanceof EchoEvent ) {
			throw new MWException( 'Invalid event parameter, expected: EchoEvent object' );
		}

		// Notification timestamp should be the same as event timestamp
		$obj->timestamp = $obj->event->getTimestamp();
		// Safe fallback
		if ( !$obj->timestamp ) {
			$obj->timestamp = wfTimestampNow();
		}

		// @Todo - Database insert logic should not be inside the model
		$obj->insert();

		return $obj;
	}

	/**
	 * Adds this new notification object to the backend storage.
	 */
	protected function insert() {
		global $wgEchoNotifications;

		$notifMapper = new EchoNotificationMapper();

		// Get the bundle key for this event if web bundling is enabled
		$bundleKey = '';
		if ( !empty( $wgEchoNotifications[$this->event->getType()]['bundle']['web'] ) ) {
			Hooks::run( 'EchoGetBundleRules', array( $this->event, &$bundleKey ) );
		}

		// The list of event ids to be removed from echo_target_page,
		// this is mainly for bundled notifications when an event is
		// no longer the bundle base
		$eventIds = array();
		if ( $bundleKey ) {
			$hash = md5( $bundleKey );
			$this->bundleHash = $hash;
			$lastNotif = $notifMapper->fetchNewestByUserBundleHash( $this->user, $hash );

			// Use a new display hash if:
			// 1. there was no last bundle notification
			// 2. last bundle notification with the same hash was read
			if ( $lastNotif && !$lastNotif->getReadTimestamp() ) {
				$this->bundleDisplayHash = $lastNotif->getBundleDisplayHash();
				$lastEvent = $lastNotif->getEvent();
				if ( $lastEvent ) {
					$eventIds[] = $lastEvent->getId();
				}
			} else {
				$this->bundleDisplayHash = md5( $bundleKey . '-display-hash-' . wfTimestampNow() );
			}
		}

		// Create a target page object if specified by event
		$event = $this->event;
		$user = $this->user;
		$targetPages = self::resolveTargetPages( $event->getExtraParam( 'target-page' ) );
		if ( $targetPages ) {
			$notifMapper->attachListener( 'insert', 'add-target-page', function () use ( $event, $user, $eventIds, $targetPages ) {
				$targetMapper = new EchoTargetPageMapper();
				if ( $eventIds ) {
					$targetMapper->deleteByUserEvents( $user, $eventIds );
				}
				foreach ( $targetPages as $title ) {
					$targetPage = EchoTargetPage::create( $user, $title, $event );
					if ( $targetPage ) {
						$targetMapper->insert( $targetPage );
					}
				}
			} );
		}

		$notifUser = MWEchoNotifUser::newFromUser( $user );
		$section = $this->event->getSection();

		// Add listener to refresh notification count upon insert
		$notifMapper->attachListener( 'insert', 'refresh-notif-count',
			function () use ( $notifUser, $section ) {
				$notifUser->resetNotificationCount( DB_MASTER );
			}
		);

		$notifMapper->insert( $this );

		if ( $event->getType() === 'edit-user-talk' ) {
			$notifUser->flagCacheWithNewTalkNotification();
		}
		Hooks::run( 'EchoCreateNotificationComplete', array( $this ) );
	}

	/**
	 * @param int[]|int|false $targetPageIds
	 * @return Title[]
	 */
	protected static function resolveTargetPages( $targetPageIds ) {
		if ( !$targetPageIds ) {
			return array();
		}
		if ( !is_array( $targetPageIds ) ) {
			$targetPageIds = array( $targetPageIds );
		}
		$result = array();
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
	 * Load a notification record from std class
	 * @param stdClass
	 * @param EchoTargetPage[]|null An array of EchoTargetPage instances, or null if not loaded.
	 * @return EchoNotification
	 */
	public static function newFromRow( $row, $targetPages = null ) {
		$notification = new EchoNotification();

		if ( property_exists( $row, 'event_type' ) ) {
			$notification->event = EchoEvent::newFromRow( $row );
		} else {
			$notification->event = EchoEvent::newFromID( $row->notification_event );
		}

		$notification->targetPages = $targetPages;
		$notification->user = User::newFromId( $row->notification_user );
		// Notification timestamp should never be empty
		$notification->timestamp = wfTimestamp( TS_MW, $row->notification_timestamp );
		// Only convert to MW format if it is not empty, otherwise
		// wfTimestamp would use current timestamp for empty cases
		if ( $row->notification_read_timestamp ) {
			$notification->readTimestamp = wfTimestamp( TS_MW, $row->notification_read_timestamp );
		}
		$notification->bundleBase = $row->notification_bundle_base;
		$notification->bundleHash = $row->notification_bundle_hash;
		$notification->bundleDisplayHash = $row->notification_bundle_display_hash;

		return $notification;
	}

	/**
	 * Convert object property to database row array
	 * @return array
	 */
	public function toDbArray() {
		return array(
			'notification_event' => $this->event->getId(),
			'notification_user' => $this->user->getId(),
			'notification_timestamp' => $this->timestamp,
			'notification_read_timestamp' => $this->readTimestamp,
			'notification_bundle_base' => $this->bundleBase,
			'notification_bundle_hash' => $this->bundleHash,
			'notification_bundle_display_hash' => $this->bundleDisplayHash
		);
	}

	/**
	 * Getter method
	 * @return EchoEvent The event for this notification
	 */
	public function getEvent() {
		return $this->event;
	}

	/**
	 * Getter method
	 * @return User The recipient of this notification
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * Getter method
	 * @return string Notification creation timestamp
	 */
	public function getTimestamp() {
		return $this->timestamp;
	}

	/**
	 * Getter method
	 * @return string|null Notification read timestamp
	 */
	public function getReadTimestamp() {
		return $this->readTimestamp;
	}

	/**
	 * Getter method
	 * @return int Notification bundle base
	 */
	public function getBundleBase() {
		return $this->bundleBase;
	}

	/**
	 * Getter method
	 * @return string|null Notification bundle hash
	 */
	public function getBundleHash() {
		return $this->bundleHash;
	}

	/**
	 * Getter method
	 * @return string|null Notification bundle display hash
	 */
	public function getBundleDisplayHash() {
		return $this->bundleDisplayHash;
	}

	/**
	 * Getter method.  Returns an array of EchoTargetPages, or null if they have
	 * not been loaded.
	 *
	 * @return EchoTargetPage[]|null
	 */
	public function getTargetPages() {
		return $this->targetPages;
	}
}
