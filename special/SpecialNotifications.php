<?php

class SpecialNotifications extends SpecialPage {
	public function __construct() {
		parent::__construct('Notifications');
	}

	public function execute($par) {
		global $wgUser, $wgOut, $wgLang;

		$this->setHeaders();

		$wgOut->setPageTitle( wfMsg( 'echo-specialpage' ) );
		$wgOut->addModules( array('ext.echo.special') );

		if ( $wgUser->isAnon() ) {
			$wgOut->addWikiMsg( 'echo-anon' );
			return;
		}

		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->select(
			array( 'echo_notification', 'echo_event' ),
			'*',
			array(
				'notification_user' => $wgUser->getID(),
			),
			__METHOD__,
			array(
				'ORDER BY' => 'notification_timestamp DESC',
				'LIMIT' => 50,
			),
			array(
				'echo_event' => array('left join', 'notification_event=event_id'),
			)
		);

		$html = '';
		foreach( $res as $row ) {
			$event = EchoEvent::newFromRow( $row );
			$class = 'mw-echo-notification';

			$ts = $wgLang->timeanddate( $event->getTimestamp() );
			$formatted =  "<span class='mw-echo-timestamp'>$ts</span> ";
			$formatted .= EchoNotificationController::formatNotification( $event, $wgUser, 'html' );

			if ( $row->notification_read_timestamp === null ) {
				$class .= ' mw-echo-unread';
			}

			$html .= "\t<li class='$class'>$formatted</li>\n";
		}

		$html = "<ul>\n$html\n</ul>\n";

		$wgOut->addHTML( $html );
	}
}