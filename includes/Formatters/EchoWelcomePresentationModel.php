<?php

namespace MediaWiki\Extension\Notifications\Formatters;

use MediaWiki\Title\Title;

class EchoWelcomePresentationModel extends EchoEventPresentationModel {

	/** @inheritDoc */
	public function getIconType() {
		return 'site';
	}

	/** @inheritDoc */
	public function getPrimaryLink() {
		$msg = $this->msg( 'notification-welcome-link' );
		if ( $msg->isDisabled() ) {
			return false;
		}

		$title = Title::newFromText( $msg->plain() );
		if ( !$title ) {
			return false;
		}

		return [
			'url' => $title->getFullURL(),
			'label' => $this->msg( 'notification-welcome-linktext' )->text(),
		];
	}
}
