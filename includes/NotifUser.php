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
	 * Echo backend storage
	 * @var MWEchoBackend
	 */
	private $storage;

	/**
	 * Constructor for initialization
	 * @param $user User
	 */
	private function __construct( User $user ) {
		global $wgMemc, $wgEchoBackend;
		$this->mUser = $user;
		$this->storage = $wgEchoBackend;
		$this->cache = $wgMemc;
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
		return new MWEchoNotifUser( $user );
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
			$this->storage->getUnreadNotifications(
				$this->mUser,
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
		global $wgEchoMaxNotificationCount;

		if ( $this->getNotificationCount() > $wgEchoMaxNotificationCount ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Retrieves number of unread notifications that a user has, would return
	 * $wgEchoMaxNotificationCount + 1 at most
	 *
	 * @param $cached bool Set to false to bypass the cache.
	 * @param $dbSource string use master or slave database to pull count
	 * @return integer: Number of unread notifications.
	 */
	public function getNotificationCount( $cached = true, $dbSource = DB_SLAVE ) {
		global $wgEchoConfig;

		if ( $this->mUser->isAnon() ) {
			return 0;
		}

		$memcKey = wfMemcKey( 'echo-notification-count', $this->mUser->getId(), $wgEchoConfig['version'] );

		if ( $cached && $this->cache->get( $memcKey ) !== false ) {
			return (int)$this->cache->get( $memcKey );
		}

		$count = $this->storage->getNotificationCount( $this->mUser, $dbSource );

		$this->cache->set( $memcKey, $count, 86400 );

		return (int)$count;
	}

	/**
	 * Mark one or more notifications read for a user.
	 * @param $eventIds Array of event IDs to mark read
	 */
	public function markRead( $eventIds ) {
		$eventIds = array_filter( (array)$eventIds, 'is_numeric' );
		if ( !$eventIds || wfReadOnly() ) {
			return;
		}

		$this->storage->markRead( $this->mUser, $eventIds );
		$this->resetNotificationCount( DB_MASTER );
	}

	/**
	 * Attempt to mark all notifications as read
	 * @return boolean
	 */
	public function markAllRead() {
		if ( wfReadOnly() || $this->notifCountHasReachedMax() ) {
			return false;
		}

		// Only update all the unread notifications if it isn't a huge number.
		// TODO: Implement batched jobs it's over the maximum.
		$this->storage->markAllRead( $this->mUser );
		$this->resetNotificationCount( DB_MASTER );
		$this->flagCacheWithNoTalkNotification();
		return true;

	}

	/**
	 * Recalculates the number of notifications that a user has.
	 * @param $dbSource string use master or slave database to pull count
	 */
	public function resetNotificationCount( $dbSource = DB_SLAVE ) {
		$this->getNotificationCount( false, $dbSource );
		$this->mUser->invalidateCache();
	}

	/**
	 * Retrieves formatted number of unread notifications that a user has.
	 * @param $cached bool Set to false to bypass the cache.
	 * @param $dbSource string use master or slave database to pull count
	 * @return String: Number of unread notifications.
	 */
	public function getFormattedNotificationCount( $cached = true, $dbSource = DB_SLAVE ) {
		return EchoNotificationController::formatNotificationCount(
			$this->getNotificationCount( $cached, $dbSource )
		);
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

}
