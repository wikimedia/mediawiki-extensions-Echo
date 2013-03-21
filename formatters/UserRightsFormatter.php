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
				global $wgLang;

				$list = array();

				foreach ( array( 'add', 'remove' ) as $action ) {
					if ( $extra[$action] ) {
						// Messages that can be used here:
						// * notification-user-rights-add
						// * notification-user-rights-remove
						$list[] = wfMessage( 'notification-user-rights-' . $action )
							->params( $wgLang->commaList( $extra[$action] ), count( $extra[$action] ) )
							->escaped();
					}
				}
				$message->params( $wgLang->semicolonList( $list ) );
			break;

			default:
				parent::processParam( $event, $param, $message, $user );
			break;
		}
	}

}
