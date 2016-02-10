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
		$preview = $this->event->getExtraParam( 'preview' );
		return $preview ? $this->msg( 'notification-body-emailuser' )->plaintextParams( $preview ) : false;
	}
}
