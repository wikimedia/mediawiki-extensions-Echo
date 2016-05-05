<?php

/**
 * Entity that represents a notification target user
 */
class MWEchoNotifUser {

	/**
	 * Notification target user
	 * @var User
	 */
	private $mUser;

	/**
	 * Object cache
	 * @var BagOStuff
	 */
	private $cache;

	/**
	 * Database access gateway
	 * @var EchoUserNotificationGateway
	 */
	private $userNotifGateway;

	/**
	 * Notification mapper
	 * @var EchoNotificationMapper
	 */
	private $notifMapper;

	/**
	 * Target page mapper
	 * @var EchoTargetPageMapper
	 */
	private $targetPageMapper;

	/**
	 * @var EchoForeignNotifications
	 */
	private $foreignNotifications = null;

	/**
	 * @var array
	 */
	private $cached;

	// The max notification count shown in badge

	// The max number shown in bundled message, eg, <user> and 99+ others <action>.
	// This is really a totally separate thing, and could be its own constant.

	// WARNING: If you change this, you should also change all references in the
	// i18n messages (100 and 99) in all repositories using Echo.
	const MAX_BADGE_COUNT = 99;

	/**
	 * Usually client code doesn't need to initialize the object directly
	 * because it could be obtained from factory method newFromUser()
	 * @param User $user
	 * @param BagOStuff $cache
	 * @param EchoUserNotificationGateway $userNotifGateway
	 * @param EchoNotificationMapper $notifMapper
	 * @param EchoTargetPageMapper $targetPageMapper
	 */
	public function __construct(
		User $user,
		BagOStuff $cache,
		EchoUserNotificationGateway $userNotifGateway,
		EchoNotificationMapper $notifMapper,
		EchoTargetPageMapper $targetPageMapper
	) {
		$this->mUser = $user;
		$this->userNotifGateway = $userNotifGateway;
		$this->cache = $cache;
		$this->notifMapper = $notifMapper;
		$this->targetPageMapper = $targetPageMapper;
	}

	/**
	 * Factory method
	 * @param $user User
	 * @throws MWException
	 * @return MWEchoNotifUser
	 */
	public static function newFromUser( User $user ) {
		if ( $user->isAnon() ) {
			throw new MWException( 'User must be logged in to view notification!' );
		}

		return new MWEchoNotifUser(
			$user,
			ObjectCache::getMainStashInstance(),
			new EchoUserNotificationGateway( $user, MWEchoDbFactory::newFromDefault() ),
			new EchoNotificationMapper(),
			new EchoTargetPageMapper()
		);
	}

	/**
	 * Clear talk page notification when users visit their talk pages.  This
	 * only resets if the notification count is less than max notification
	 * count. If the user has 99+ notifications, decrementing 1 bundled talk
	 * page notification would not really affect the count
	 */
	public function clearTalkNotification() {
		// There is no new talk notification
		if ( $this->cache->get( $this->getTalkNotificationCacheKey() ) === '0' ) {
			return;
		}

		// Do nothing if the count display meets the max 99+
		if ( $this->notifCountHasReachedMax() ) {
			return;
		}

		// Mark the talk page notification as read
		$this->markRead(
			$this->userNotifGateway->getUnreadNotifications(
				'edit-user-talk'
			)
		);

		$this->flagCacheWithNoTalkNotification();
	}

	/**
	 * Flag the cache with new talk notification
	 */
	public function flagCacheWithNewTalkNotification() {
		$this->cache->set( $this->getTalkNotificationCacheKey(), '1', 86400 );
	}

	/**
	 * Flag the cache with no talk notification
	 */
	public function flagCacheWithNoTalkNotification() {
		$this->cache->set( $this->getTalkNotificationCacheKey(), '0', 86400 );
	}

	/**
	 * Memcache key for talk notification
	 */
	public function getTalkNotificationCacheKey() {
		global $wgEchoConfig;

		return wfMemcKey( 'echo-new-talk-notification', $this->mUser->getId(), $wgEchoConfig['version'] );
	}

	/**
	 * Check if the user has more notification count than max count display
	 * @return bool
	 */
	public function notifCountHasReachedMax() {
		if ( $this->getLocalNotificationCount() >= self::MAX_BADGE_COUNT ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Get message count for this user.
	 *
	 * @param boolean $cached Set to false to bypass the cache. (Optional. Defaults to true)
	 * @param int $dbSource Use master or slave database to pull count (Optional. Defaults to DB_SLAVE)
	 * @return int
	 */
	public function getMessageCount( $cached = true, $dbSource = DB_SLAVE ) {
		return $this->getNotificationCount( $cached, $dbSource, EchoAttributeManager::MESSAGE );
	}

	/**
	 * Get alert count for this user.
	 *
	 * @param boolean $cached Set to false to bypass the cache. (Optional. Defaults to true)
	 * @param int $dbSource Use master or slave database to pull count (Optional. Defaults to DB_SLAVE)
	 * @return int
	 */
	public function getAlertCount( $cached = true, $dbSource = DB_SLAVE ) {
		return $this->getNotificationCount( $cached, $dbSource, EchoAttributeManager::ALERT );
	}

	public function getLocalNotificationCount( $cached = true, $dbSource = DB_SLAVE, $section = EchoAttributeManager::ALL ) {
		return $this->getNotificationCount( $cached, $dbSource, $section, false );
	}

	/**
	 * Retrieves number of unread notifications that a user has, would return
	 * MWEchoNotifUser::MAX_BADGE_COUNT + 1 at most
	 *
	 * @param boolean $cached Set to false to bypass the cache. (Optional. Defaults to true)
	 * @param int $dbSource Use master or slave database to pull count (Optional. Defaults to DB_SLAVE)
	 * @param string $section Notification section
	 * @param bool|string $global Whether to include foreign notifications. If set to 'preference', uses the user's preference.
	 * @return int
	 */
	public function getNotificationCount( $cached = true, $dbSource = DB_SLAVE, $section = EchoAttributeManager::ALL, $global = 'preference' ) {
		if ( $this->mUser->isAnon() ) {
			return 0;
		}

		if ( $global === 'preference' ) {
			$global = $this->getForeignNotifications()->isEnabledByUser();
		}

		$memcKey = $this->getMemcKey( 'echo-notification-count' . ( $section === EchoAttributeManager::ALL ? '' : ( '-' . $section ) ), $global );
		if ( $cached ) {
			$data = $this->getFromCache( $memcKey );
			if ( $data !== false && $data !== null ) {
				return (int)$data;
			}
		}

		$attributeManager = EchoAttributeManager::newFromGlobalVars();
		if ( $section === EchoAttributeManager::ALL ) {
			$eventTypesToLoad = $attributeManager->getUserEnabledEvents( $this->mUser, 'web' );
		} else {
			$eventTypesToLoad = $attributeManager->getUserEnabledEventsbySections( $this->mUser, 'web', array( $section ) );
		}

		$count = (int) $this->userNotifGateway->getCappedNotificationCount( $dbSource, $eventTypesToLoad, MWEchoNotifUser::MAX_BADGE_COUNT + 1 );

		if ( $global ) {
			$count += $this->getForeignNotifications()->getCount( $section );
		}

		$this->setInCache( $memcKey, $count, 86400 );
		return $count;
	}

	/**
	 * Get the unread timestamp of the latest alert
	 *
	 * @param boolean $cached Set to false to bypass the cache. (Optional. Defaults to true)
	 * @param int $dbSource Use master or slave database to pull count (Optional. Defaults to DB_SLAVE)
	 * @return bool|MWTimestamp
	 */
	public function getLastUnreadAlertTime( $cached = true, $dbSource = DB_SLAVE ) {
		return $this->getLastUnreadNotificationTime( $cached, $dbSource, EchoAttributeManager::ALERT );
	}

	/**
	 * Get the unread timestamp of the latest message
	 *
	 * @param boolean $cached Set to false to bypass the cache. (Optional. Defaults to true)
	 * @param int $dbSource Use master or slave database to pull count (Optional. Defaults to DB_SLAVE)
	 * @return bool|MWTimestamp
	 */
	public function getLastUnreadMessageTime( $cached = true, $dbSource = DB_SLAVE ) {
		return $this->getLastUnreadNotificationTime( $cached, $dbSource, EchoAttributeManager::MESSAGE );
	}

	/**
	 * Returns the timestamp of the last unread notification.
	 *
	 * @param boolean $cached Set to false to bypass the cache. (Optional. Defaults to true)
	 * @param int $dbSource Use master or slave database to pull count (Optional. Defaults to DB_SLAVE)
	 * @param string $section Notification section
	 * @param bool|string $global Whether to include foreign notifications. If set to 'preference', uses the user's preference.
	 * @return bool|MWTimestamp Timestamp of last notification, or false if there is none
	 */
	public function getLastUnreadNotificationTime( $cached = true, $dbSource = DB_SLAVE, $section = EchoAttributeManager::ALL, $global = 'preference' ) {
		if ( $this->mUser->isAnon() ) {
			return false;
		}

		if ( $global === 'preference' ) {
			$global = $this->getForeignNotifications()->isEnabledByUser();
		}

		$memcKey = $this->getMemcKey( 'echo-notification-timestamp' . ( $section === EchoAttributeManager::ALL ? '' : ( '-' . $section ) ), $global );

		// read from cache, if allowed
		if ( $cached ) {
			$timestamp = $this->getFromCache( $memcKey );
			if ( $timestamp === -1 ) {
				// -1 means the user has no notifications
				return false;
			} elseif ( $timestamp !== false ) {
				return new MWTimestamp( $timestamp );
			}
			// else cache miss
		}

		$timestamp = false;

		// Get timestamp of most recent local notification, if there is one
		$attributeManager = EchoAttributeManager::newFromGlobalVars();
		if ( $section === EchoAttributeManager::ALL ) {
			$eventTypesToLoad = $attributeManager->getUserEnabledEvents( $this->mUser, 'web' );
		} else {
			$eventTypesToLoad = $attributeManager->getUserEnabledEventsbySections( $this->mUser, 'web', array( $section ) );
		}
		$notifications = $this->notifMapper->fetchUnreadByUser( $this->mUser, 1, null, $eventTypesToLoad, $dbSource );
		if ( $notifications ) {
			$notification = reset( $notifications );
			$timestamp = new MWTimestamp( $notification->getTimestamp() );
		}

		// Use timestamp of most recent foreign notification, if it's more recent
		if ( $global ) {
			$foreignTime = $this->getForeignNotifications()->getTimestamp( $section );
			if (
				$foreignTime !== false &&
				// $foreignTime < $timestamp = invert 0
				// $foreignTime > $timestamp = invert 1
				( $timestamp === false || $foreignTime->diff( $timestamp )->invert === 1 )
			) {
				$timestamp = $foreignTime;
			}
		}

		if ( $timestamp === false ) {
			// No notifications, so no timestamp
			$returnValue = false;
			$cacheValue = -1;
		} else {
			$returnValue = $timestamp;
			$cacheValue = $timestamp->getTimestamp( TS_MW );
		}

		$this->setInCache( $memcKey, $cacheValue, 86400 );
		return $returnValue;
	}

	/**
	 * Mark one or more notifications read for a user.
	 * @param $eventIds Array of event IDs to mark read
	 * @return boolean
	 */
	public function markRead( $eventIds ) {
		$eventIds = array_filter( (array)$eventIds, 'is_numeric' );
		if ( !$eventIds || wfReadOnly() ) {
			return false;
		}

		$res = $this->userNotifGateway->markRead( $eventIds );
		if ( $res ) {
			// Delete records from echo_target_page
			$this->targetPageMapper->deleteByUserEvents( $this->mUser, $eventIds );
			// Update notification count in cache
			$this->resetNotificationCount( DB_MASTER );

			// After this 'mark read', is there any unread edit-user-talk
			// remaining?  If not, we should clear the newtalk flag.
			if ( $this->mUser->getNewtalk() ) {
				$unreadEditUserTalk = $this->notifMapper->fetchUnreadByUser( $this->mUser, 1, null, array( 'edit-user-talk' ), DB_MASTER );
				if ( count( $unreadEditUserTalk ) === 0 ) {
					$this->mUser->setNewtalk( false );
				}
			}
		}

		return $res;
	}

	/**
	 * Mark one or more notifications unread for a user.
	 * @param $eventIds Array of event IDs to mark unread
	 * @return boolean
	 */
	public function markUnRead( $eventIds ) {
		$eventIds = array_filter( (array)$eventIds, 'is_numeric' );
		if ( !$eventIds || wfReadOnly() ) {
			return false;
		}

		$res = $this->userNotifGateway->markUnRead( $eventIds );
		if ( $res ) {
			// Update notification count in cache
			$this->resetNotificationCount( DB_MASTER );

			// After this 'mark unread', is there any unread edit-user-talk?
			// If so, we should add the edit-user-talk flag
			if ( !$this->mUser->getNewtalk() ) {
				$unreadEditUserTalk = $this->notifMapper->fetchUnreadByUser( $this->mUser, 1, null, array( 'edit-user-talk' ), DB_MASTER );
				if ( count( $unreadEditUserTalk ) > 0 ) {
					$this->mUser->setNewtalk( true );
				}
			}
		}

		return $res;
	}

	/**
	 * Attempt to mark all or sections of notifications as read, this only
	 * updates up to $wgEchoMaxUpdateCount records per request, see more
	 * detail about this in Echo.php, the other reason is that mediawiki
	 * database interface doesn't support updateJoin() that would update
	 * across multiple tables, we would visit this later
	 *
	 * @param string[] $sections
	 * @return boolean
	 */
	public function markAllRead( array $sections = array( EchoAttributeManager::ALL ) ) {
		if ( wfReadOnly() ) {
			return false;
		}

		global $wgEchoMaxUpdateCount;

		// Mark all sections as read if this is the case
		if ( in_array( EchoAttributeManager::ALL, $sections ) ) {
			$sections = EchoAttributeManager::$sections;
		}

		$attributeManager = EchoAttributeManager::newFromGlobalVars();
		$eventTypes = $attributeManager->getUserEnabledEventsbySections( $this->mUser, 'web', $sections );

		$notifs = $this->notifMapper->fetchUnreadByUser( $this->mUser, $wgEchoMaxUpdateCount, null, $eventTypes );

		$eventIds = array_filter(
			array_map( function ( EchoNotification $notif ) {
				// This should not happen at all, but use 0 in
				// such case so to keep the code running
				if ( $notif->getEvent() ) {
					return $notif->getEvent()->getId();
				} else {
					return 0;
				}
			}, $notifs )
		);

		$res = $this->markRead( $eventIds );
		if ( $res ) {
			// Delete records from echo_target_page
			$this->targetPageMapper->deleteByUserEvents( $this->mUser, $eventIds );
			if ( count( $notifs ) < $wgEchoMaxUpdateCount ) {
				$this->flagCacheWithNoTalkNotification();
			}
		}

		return $res;
	}

	/**
	 * Recalculates the number of notifications that a user has.
	 * @param $dbSource int use master or slave database to pull count
	 */
	public function resetNotificationCount( $dbSource = DB_SLAVE ) {
		// Reset alert and message counts, and store them for later
		$alertCount = $this->getNotificationCount( false, $dbSource, EchoAttributeManager::ALERT, false );
		$msgCount = $this->getNotificationCount( false, $dbSource, EchoAttributeManager::MESSAGE, false );
		// For performance, compute the ALL count by adding alerts and messages
		$allCount = $alertCount + $msgCount;

		// For performance, compute the global counts by adding foreign counts to the above
		$globalAlertCount = $alertCount + $this->getForeignNotifications()->getCount( EchoAttributeManager::ALERT );
		$globalMsgCount = $msgCount + $this->getForeignNotifications()->getCount( EchoAttributeManager::MESSAGE );
		$globalAllCount = $globalAlertCount + $globalMsgCount;

		// When notification counts need to be updated, the last notification may have changed,
		// so we also need to recompute the cached timestamp values.
		$alertUnread = $this->getLastUnreadNotificationTime( false, $dbSource, EchoAttributeManager::ALERT, false );
		$msgUnread = $this->getLastUnreadNotificationTime( false, $dbSource, EchoAttributeManager::MESSAGE, false );
		// For performance, compute the ALL count as the highest of these two
		$allUnread = $alertUnread !== false &&
			( $msgUnread === false || $alertUnread->diff( $msgUnread )->invert === 1 ) ?
			$alertUnread : $msgUnread;

		// For performance, compute the global timestamps as max( localTimestamp, foreignTimestamp )
		$foreignAlertUnread = $this->getForeignNotifications()->getTimestamp( EchoAttributeManager::ALERT );
		$globalAlertUnread = $alertUnread !== false &&
			( $foreignAlertUnread === false || $alertUnread->diff( $foreignAlertUnread )->invert === 1 ) ?
			$alertUnread : $foreignAlertUnread;
		$foreignMsgUnread = $this->getForeignNotifications()->getTimestamp( EchoAttributeManager::MESSAGE );
		$globalMsgUnread = $msgUnread !== false &&
			( $foreignMsgUnread === false || $msgUnread->diff( $foreignMsgUnread )->invert === 1 ) ?
			$msgUnread : $foreignMsgUnread;
		$globalAllUnread = $globalAlertUnread !== false &&
			( $globalMsgUnread === false || $globalAlertUnread->diff( $globalMsgUnread )->invert === 1 ) ?
			$globalAlertUnread : $globalMsgUnread;

		// Write computed values to cache
		$this->setInCache( $this->getMemcKey( 'echo-notification-count' ), $allCount, 86400 );
		$this->setInCache( $this->getGlobalMemcKey( 'echo-notification-count-alert' ), $globalAlertCount, 86400 );
		$this->setInCache( $this->getGlobalMemcKey( 'echo-notification-count-message' ), $globalMsgCount, 86400 );
		$this->setInCache( $this->getGlobalMemcKey( 'echo-notification-count' ), $globalAllCount, 86400 );
		$this->setInCache( $this->getMemcKey( 'echo-notification-timestamp' ), $allUnread === false ? -1 : $allUnread->getTimestamp( TS_MW ), 86400 );
		$this->setInCache( $this->getGlobalMemcKey( 'echo-notification-timestamp-alert' ), $globalAlertUnread === false ? -1 : $globalAlertUnread->getTimestamp( TS_MW ), 86400 );
		$this->setInCache( $this->getGlobalMemcKey( 'echo-notification-timestamp-message' ), $globalMsgUnread === false ? -1 : $globalMsgUnread->getTimestamp( TS_MW ), 86400 );
		$this->setInCache( $this->getGlobalMemcKey( 'echo-notification-timestamp' ), $globalAllUnread === false ? -1 : $globalAllUnread->getTimestamp( TS_MW ), 86400 );

		// Invalidate the user's cache
		$user = $this->mUser;
		$user->invalidateCache();

		// Schedule an update to the echo_unread_wikis table
		DeferredUpdates::addCallableUpdate( function () use ( $user, $alertCount, $alertUnread, $msgCount, $msgUnread ) {
			$uw = EchoUnreadWikis::newFromUser( $user );
			if ( $uw ) {
				$uw->updateCount( wfWikiID(), $alertCount, $alertUnread, $msgCount, $msgUnread );
			}
		} );
	}

	/**
	 * Get the user's email notification format
	 * @return string
	 */
	public function getEmailFormat() {
		global $wgAllowHTMLEmail;

		if ( $wgAllowHTMLEmail ) {
			return $this->mUser->getOption( 'echo-email-format' );
		} else {
			return EchoHooks::EMAIL_FORMAT_PLAIN_TEXT;
		}
	}

	/**
	 * Get a cache entry from the cache, using a preloaded instance cache.
	 * @param  string|false $memcKey Cache key returned by getMemcKey()
	 * @return mixed Cache value
	 */
	protected function getFromCache( $memcKey ) {
		// getMemcKey() can return false
		if ( $memcKey === false ) {
			return false;
		}

		// Populate the instance cache
		if ( $this->cached === null ) {
			$keys = $this->preloadKeys();
			$this->cached = $this->cache->getMulti( $keys );
			// also keep track of cache values that couldn't be found (getMulti
			// omits them...)
			$this->cached += array_fill_keys( $keys, false );
		}

		if ( isset( $this->cached[$memcKey] ) ) {
			return $this->cached[$memcKey];
		}

		return $this->cache->get( $memcKey );
	}

	/**
	 * Set a cache entry both in the cache and in the instance cache.
	 * Use this to write to keys that were loaded with getFromCache().
	 * @param string|false $memcKey Cache key returned by getMemcKey()
	 * @param mixed $value Cache value to set
	 * @param int $expiry Expiry, see BagOStuff::set()
	 */
	protected function setInCache( $memcKey, $value, $expiry ) {
		// getMemcKey() can return false
		if ( $memcKey === false ) {
			return;
		}

		// Update the instance cache if it's already been populated
		if ( $this->cached !== null ) {
			$this->cached[$memcKey] = $value;
		}

		$this->cache->set( $memcKey, $value, $expiry );
	}

	/**
	 * Array of memcached keys to load at once.
	 *
	 * @return array
	 */
	protected function preloadKeys() {
		$keys = array(
			'echo-notification-timestamp',
			'echo-notification-timestamp-' . EchoAttributeManager::MESSAGE,
			'echo-notification-timestamp-' . EchoAttributeManager::ALERT,
			'echo-notification-count',
			'echo-notification-count-' . EchoAttributeManager::MESSAGE,
			'echo-notification-count-' . EchoAttributeManager::ALERT,
		);

		return array_merge(
			array_map( array( $this, 'getMemcKey' ), $keys ),
			array_map( array( $this, 'getGlobalMemcKey' ), $keys )
		);
	}

	/**
	 * Build a memcached key.
	 * @param string $key Key, typically prefixed with echo-notification-
	 * @param bool $global If true, return a global memc key; if false, return one local to this wiki
	 * @return string|false Memcached key, or false if one could not be generated
	 */
	protected function getMemcKey( $key, $global = false ) {
		global $wgEchoConfig;
		if ( !$global ) {
			return wfMemcKey( $key, $this->mUser->getId(), $wgEchoConfig['version'] );
		}

		$lookup = CentralIdLookup::factory();
		$globalId = $lookup->centralIdFromLocalUser( $this->mUser, CentralIdLookup::AUDIENCE_RAW );
		if ( !$globalId ) {
			return false;
		}
		return wfGlobalCacheKey( $key, $globalId, $wgEchoConfig['version'] );

	}

	protected function getGlobalMemcKey( $key ) {
		return $this->getMemcKey( $key, true );
	}

	/**
	 * Lazy-construct an EchoForeignNotifications instance. This instance is force-enabled, so it
	 * returns information about cross-wiki notifications even if the user has them disabled.
	 * @return EchoForeignNotifications
	 */
	protected function getForeignNotifications() {
		if ( !$this->foreignNotifications ) {
			$this->foreignNotifications = new EchoForeignNotifications( $this->mUser, true );
		}
		return $this->foreignNotifications;
	}
}
