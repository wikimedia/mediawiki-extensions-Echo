<?php

/**
 * Formatter for 'user-rights' notifications
 */
class EchoUserRightsFormatter extends EchoBasicFormatter {

	/**
	 * @param $event EchoEvent
	 * @param $param string
	 * @param $message Message
	 * @param $user User
	 */
	protected function processParam( $event, $param, $message, $user ) {
		$extra = $event->getExtra();
		switch ( $param ) {
			// List of user rights that are granted or revoked
			case 'user-rights-list':
				$lang = $this->getLanguage();

				$list = array();

				foreach ( array( 'add', 'remove' ) as $action ) {
					if ( isset( $extra[$action] ) && $extra[$action] ) {

						// Get the localized group names, bug 55338
						$groups = array();
						foreach ( $extra[$action] as $group ) {
							$msg = $this->getMessage( 'group-' . $group );
							$groups[] = $msg->isBlank() ? $group : $msg->escaped();
						}

						// Messages that can be used here:
						// * notification-user-rights-add
						// * notification-user-rights-remove
						$list[] = $this->getMessage( 'notification-user-rights-' . $action )
							->params( $lang->commaList( $groups ), count( $groups ) )
							->escaped();
					}
				}
				$message->params( $lang->semicolonList( $list ) );
				break;

			default:
				parent::processParam( $event, $param, $message, $user );
				break;
		}
	}

	/**
	 * Helper function for getLink()
	 *
	 * @param EchoEvent $event
	 * @param User $user The user receiving the notification
	 * @param String $destination The destination type for the link
	 * @return Array including target and query parameters
	 */
	protected function getLinkParams( $event, $user, $destination ) {
		$target = null;
		$query = array();
		// Set up link parameters based on the destination (or pass to parent)
		switch ( $destination ) {
			case 'user-rights-list':
				$target = SpecialPage::getTitleFor( 'Listgrouprights' );
				break;
			default:
				return parent::getLinkParams( $event, $user, $destination );
		}

		return array( $target, $query );
	}
}

