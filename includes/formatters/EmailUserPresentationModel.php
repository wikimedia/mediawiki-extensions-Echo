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
}
