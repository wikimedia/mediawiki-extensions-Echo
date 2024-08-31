<?php

namespace MediaWiki\Extension\Notifications\Formatters;

use MediaWiki\Language\RawMessage;
use MediaWiki\MediaWikiServices;
use MediaWiki\Parser\Sanitizer;
use MediaWiki\Revision\RevisionRecord;

class EchoMentionInSummaryPresentationModel extends EchoEventPresentationModel {

	/** @inheritDoc */
	public function getIconType() {
		return 'mention';
	}

	/** @inheritDoc */
	public function canRender() {
		return (bool)$this->event->getTitle();
	}

	/** @inheritDoc */
	public function getHeaderMessage() {
		$msg = $this->getMessageWithAgent( 'notification-header-mention-summary' );
		$msg->params( $this->getViewingUserForGender() );
		$msg->params( $this->getTruncatedTitleText( $this->event->getTitle(), true ) );

		return $msg;
	}

	/** @inheritDoc */
	public function getBodyMessage() {
		$revision = $this->event->getRevision();
		if ( $revision && $revision->getComment() && $this->userCan( RevisionRecord::DELETED_COMMENT ) ) {
			$summary = $revision->getComment()->text;
			$summary = MediaWikiServices::getInstance()->getCommentFormatter()
				->format( $summary );
			$summary = Sanitizer::stripAllTags( $summary );

			$msg = new RawMessage( '$1' );
			$msg->plaintextParams( $summary );
			return $msg;
		} else {
			return false;
		}
	}

	/** @inheritDoc */
	public function getPrimaryLink() {
		return [
			'url' => $this->getDiffURL(),
			'label' => $this->msg( 'notification-link-text-view-changes', $this->getViewingUserForGender() )->text(),
		];
	}

	/** @inheritDoc */
	public function getSecondaryLinks() {
		return [ $this->getAgentLink() ];
	}

	/** @inheritDoc */
	protected function getSubjectMessageKey() {
		return 'notification-mention-email-subject';
	}

	private function getDiffURL(): string {
		return $this->event->getTitle()->getLocalURL( [
			'oldid' => 'prev',
			'diff' => $this->event->getExtraParam( 'revid' )
		] );
	}
}
