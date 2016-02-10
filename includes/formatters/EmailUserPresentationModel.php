<?php

class EchoEmailUserPresentationModel extends EchoEventPresentationModel {

	public function getIconType() {
		return 'emailuser';
	}

	public function getPrimaryLink() {
		return false;
	}

	public function getSecondaryLinks() {
		return array( $this->getAgentLink() );
	}

	public function getBodyMessage() {
		$subject = $this->event->getExtraParam( 'subject' );
		return $subject ? $this->msg( 'notification-body-email-user' )->plaintextParams( $subject ) : false;
	}
}
