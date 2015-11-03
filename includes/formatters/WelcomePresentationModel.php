<?php

class EchoWelcomePresentationModel extends EchoEventPresentationModel {

	public function getIconType() {
		return 'site';
	}

	public function getPrimaryLink() {
		return false;
	}
}
