<?php

/**
 * This class represents the controller for moderating notifications
 */
class EchoModerationController {

	/**
	 * Moderate or unmoderate events
	 *
	 * @param int[] $eventIds
	 * @param bool $moderate Whether to moderate or unmoderate the events
	 * @throws MWException
	 */
	public static function moderate( $eventIds, $moderate ) {
		if ( !$eventIds ) {
			return;
		}

		$eventMapper = new EchoEventMapper();
		$notificationMapper = new EchoNotificationMapper();

		$affectedUserIds = $notificationMapper->fetchUsersWithNotificationsForEvents( $eventIds );
		$eventMapper->toggleDeleted( $eventIds, $moderate );

		/**
		 * Recompute the notification count for the
		 * users whose notifications have been moderated.
		 */
		foreach ( $affectedUserIds as $userId ) {
			$user = User::newFromId( $userId );
			MWEchoNotifUser::newFromUser( $user )->resetNotificationCount( DB_MASTER );
		}
	}
}
