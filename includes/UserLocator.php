<?php

class EchoUserLocator {
	/**
	 * Return all users watching the event title.
	 *
	 * The echo job queue must be enabled to prevent timeouts submitting to
	 * heavily watched pages when this is used.
	 *
	 * @param EchoEvent $event
	 * @return User[]
	 */
	public static function locateUsersWatchingTitle( EchoEvent $event ) {
		$title = $event->getTitle();
		if ( !$title ) {
			return array();
		}

		$dbr = wfGetDB( DB_SLAVE, 'watchlist' );
		$res = $dbr->select(
			array( 'watchlist' ),
			array( 'wl_user' ),
			array(
				'wl_namespace' => $title->getNamespace(),
				'wl_title' => $title->getDBkey(),
			),
			__METHOD__
		);

		$users = array();
		if ( $res ) {
			foreach ( $res as $row ) {
				$users[$row->wl_user] = User::newFromId( $row->wl_user );
			}
		}

		return $users;
	}

	/**
	 * If the event occured on the talk page of a registered
	 * user return that user.
	 *
	 * @param EchoEvent $event
	 * @return User[]
	 */
	public static function locateTalkPageOwner( EchoEvent $event ) {
		$title = $event->getTitle();
		if ( !$title || $title->getNamespace() !== NS_USER_TALK ) {
			return array();
		}

		$user = User::newFromName( $title->getDBkey() );
		if ( $user && !$user->isAnon() ) {
			return array( $user->getId() => $user );
		} else {
			return array();
		}
	}

	/**
	 * Return the event agent
	 *
	 * @param EchoEvent $event
	 * @return User[]
	 */
	public static function locateEventAgent( EchoEvent $event ) {
		$agent = $event->getAgent();
		if ( $agent && !$agent->isAnon() ) {
			return array( $agent->getId() => $agent );
		} else {
			return array();
		}
	}

	/**
	 * Return the user that created the first revision of the
	 * associated title.
	 *
	 * @param EchoEvent $evnet
	 * @return User[]
	 */
	public static function locateArticleCreator( EchoEvent $event ) {
		$agent = $event->getAgent();
		$title = $event->getTitle();

		if ( !$title || $title->getArticleID() <= 0 ) {
			return array();
		}
		// why?
		if ( !$agent ) {
			return array();
		}

		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->selectRow(
			array( 'revision' ),
			array( 'rev_user' ),
			array( 'rev_page' => $title->getArticleID() ),
			__METHOD__,
			array( 'LIMIT' => 1, 'ORDER BY' => 'rev_timestamp, rev_id' )
		);
		if ( !$res || !$res->rev_user ) {
			return array();
		}

		$user = User::newFromId( $res->rev_user );
		if ( $user ) {
			return array( $user->getId() => $user );
		} else {
			return array();
		}
	}

	/**
	 * Fetch user ids from the event extra data.  Requires additional
	 * parameter.  Example $wgEchoNotifications parameter:
	 *
	 *   'user-locator' => array( array( 'event-extra', 'mentions' ) ),
	 *
	 * The above will look in the 'mentions' parameter for a user id or
	 * array of user ids.  It will return all these users as notification
	 * targets.
	 *
	 * @param EchoEvent $event
	 * @param string[] $keys one or more keys to check for user ids
	 * @return User[]
	 */
	public static function locateFromEventExtra( EchoEvent $event, array $keys ) {
		$users = array();
		foreach ( $keys as $key ) {
			$userIds = $event->getExtraParam( $key );
			if ( !$userIds ) {
				continue;
			} elseif ( !is_array( $userIds ) ) {
				$userIds = array( $userIds );
			}
			foreach ( $userIds as $userId ) {
				// we shouldn't receive User instances, but allow
				// it for backward compatability
				if ( $userId instanceof User ) {
					if ( $userId->isAnon() ) {
						continue;
					}
					$user = $userId;
				} else {
					$user = User::newFromId( $userId );
				}
				$users[$user->getId()] = $user;
			}
		}

		return $users;
	}
}
