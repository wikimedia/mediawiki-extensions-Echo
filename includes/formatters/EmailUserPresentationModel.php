<?php

class EchoEmailUserPresentationModel extends EchoEventPresentationModel {

	public function getIconType() {
		return 'site';
	}

	public function getPrimaryLink() {
		return false;
	}

	public function getSecondaryLinks() {
		return array( $this->getAgentLink() );
	}
}
