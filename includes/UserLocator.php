<?php

class EchoUserLocator {

	/**
	 * The echo job queue must be enabled to prevent timeouts submitting to
	 * heavily watched pages when this is used.
	 */
	public static function locateUsersWatchingTitle( EchoEvent $event, $batchSize = 500 ) {
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
}
