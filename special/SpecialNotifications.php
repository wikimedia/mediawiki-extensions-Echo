<?php

class SpecialNotifications extends SpecialPage {
	public function __construct() {
		parent::__construct( 'Notifications' );
	}

	public function execute( $par ) {
		$this->setHeaders();

		$out = $this->getOutput();
		$out->setPageTitle( $this->msg( 'echo-specialpage' )->text() );
		$out->addModules( array( 'ext.echo.special' ) );

		$user = $this->getUser();
		if ( $user->isAnon() ) {
			$out->addWikiMsg( 'echo-anon' );
			return;
		}

		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->select(
			array( 'echo_notification', 'echo_event' ),
			'*',
			array(
				'notification_user' => $user->getID(),
			),
			__METHOD__,
			array(
				'ORDER BY' => 'notification_timestamp DESC',
				'LIMIT' => 50,
			),
			array(
				'echo_event' => array( 'left join', 'notification_event=event_id' ),
			)
		);

		if ( !$res->numRows() ) {
			$out->addWikiMsg( 'echo-none' );
			return;
		}

		$html = '';
		foreach ( $res as $row ) {
			$event = EchoEvent::newFromRow( $row );
			$class = 'mw-echo-notification';

			$formatted = EchoNotificationController::formatNotification( $event, $user, 'html' );

			if ( $row->notification_read_timestamp === null ) {
				$class .= ' mw-echo-unread';
			}

			$eventType = htmlspecialchars( $event->getType() );
			$html .= "\t<li class=\"$class\" data-notification-type=\"$eventType\">$formatted</li>\n";
		}

		$html = "<ul>\n$html\n</ul>\n";

		$out->addHTML( $html );
	}
}
