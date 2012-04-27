<?php

// @todo Fill in
class EchoNotifier {
	/**
	 * Record an EchoNotification for an EchoEvent.
	 *
	 * @todo Implement.
	 * @param $user The User to notify.
	 * @param $event The EchoEvent to notify about.
	 */
	public static function notifyWithNotification( $user, $event ) {
		EchoNotification::create( array( 'user' => $user, 'event' => $event) );
	}

	/**
	 * Send a Notification to a user by email
	 *
	 * @todo Implement.
	 * @param $user The User to notify.
	 * @param $event The EchoEvent to notify about.
	 */
	public static function notifyWithEmail( $user, $event ) {
		// throw new MWException( "Not implemented" );
	}
}