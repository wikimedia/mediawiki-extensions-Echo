<?php

class EchoMentionInSummaryPresentationModel extends EchoEventPresentationModel {

	public function getIconType() {
		return 'mention';
	}

	public function canRender() {
		return (bool)$this->event->getTitle();
	}

	public function getHeaderMessage() {
		$msg = $this->getMessageWithAgent( 'notification-header-mention-summary' );
		$msg->params( $this->getViewingUserForGender() );
		$msg->params( $this->getTruncatedTitleText( $this->event->getTitle() ) );

		return $msg;
	}

	public function getBodyMessage() {
		if ( $this->userCan( Revision::DELETED_COMMENT ) ) {
			$revision = $this->event->getRevision();
			$summary = $revision->getComment();
			$summary = Linker::formatComment( $summary );
			$summary = Sanitizer::stripAllTags( $summary );

			$msg = $this->msg( 'notification-body-mention' )
				->plaintextParams( $summary );
			return $msg;
		} else {
			return false;
		}
	}

	public function getPrimaryLink() {
		return [
			'url' => $this->getDiffURL(),
			'label' => $this->msg( 'notification-link-text-view-changes', $this->getViewingUserForGender() )->text(),
		];
	}

	public function getSecondaryLinks() {
		return [ $this->getAgentLink() ];
	}

	protected function getSubjectMessageKey() {
		return 'notification-mention-email-subject';
	}

	private function getDiffURL() {
		$title = $this->event->getTitle();

		return $title->getLocalURL( [
			'oldid' => 'prev',
			'diff' => $this->event->getExtraParam( 'revid' )
		] );
	}
}
