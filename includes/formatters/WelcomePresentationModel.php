<?php

class EchoWelcomePresentationModel extends EchoEventPresentationModel {

	public function getIconType() {
		return 'site';
	}

	public function getPrimaryLink() {
		$msg = $this->msg( 'notification-welcome-link' );
		if ( $msg->isDisabled() ) {
			return false;
		}

		$title = Title::newFromText( $msg->plain() );
		if ( !$title ) {
			return false;
		}

		return array(
			'url' => $title->getFullURL(),
			'label' => $this->msg( 'notification-welcome-linktext' )->text(),
		);
	}
}
