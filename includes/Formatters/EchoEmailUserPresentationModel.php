<?php

namespace MediaWiki\Extension\Notifications\Formatters;

class EchoEmailUserPresentationModel extends EchoEventPresentationModel {

	/** @inheritDoc */
	public function getIconType() {
		return 'emailuser';
	}

	/** @inheritDoc */
	public function getPrimaryLink() {
		return false;
	}

	/** @inheritDoc */
	public function getSecondaryLinks() {
		return [ $this->getAgentLink() ];
	}

	/** @inheritDoc */
	public function getBodyMessage() {
		$preview = $this->event->getExtraParam( 'preview' );
		return $preview ? $this->msg( 'notification-body-emailuser' )->plaintextParams( $preview ) : false;
	}
}
