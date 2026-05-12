<?php

namespace MediaWiki\Extension\Notifications\Formatters;

class EchoEditedOtherUsersJsPresentationModel extends EchoEventPresentationModel {

	/** @inheritDoc */
	public function canRender() {
		return (bool)$this->event->getTitle();
	}

	/** @inheritDoc */
	public function getIconType() {
		return 'edited-other-users-js';
	}

	/** @inheritDoc */
	public function getHeaderMessage() {
		$msg = parent::getHeaderMessage();
		$msg->plaintextParams( $this->getTruncatedTitleText( $this->event->getTitle() ) );
		return $msg;
	}

	/** @inheritDoc */
	public function getBodyMessage() {
		return $this->getRevisionCommentMessage();
	}

	/** @inheritDoc */
	public function getPrimaryLink() {
		$revId = $this->event->getExtraParam( 'revid' );
		return [
			'url' => $this->event->getTitle()->getFullURL( [
				'oldid' => 'prev',
				'diff' => $revId,
			] ),
			'label' => $this->msg( 'notification-link-text-view-edit' )->text(),
		];
	}

	/** @inheritDoc */
	public function getSecondaryLinks() {
		return [ $this->getAgentLink() ];
	}
}
