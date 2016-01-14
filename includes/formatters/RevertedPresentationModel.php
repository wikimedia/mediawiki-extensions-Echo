<?php

class EchoRevertedPresentationModel extends EchoEventPresentationModel {

	public function getIconType() {
		return 'revert';
	}

	public function canRender() {
		return (bool)$this->event->getTitle();
	}

	public function getHeaderMessage() {
		$msg = parent::getHeaderMessage();
		$msg->params( $this->event->getTitle()->getPrefixedText() );
		$msg->params( $this->getNumberOfEdits() );
		return $msg;
	}

	public function getBodyMessage() {
		$summary = $this->event->getExtraParam( 'summary' );
		if ( !$this->isAutomaticSummary( $summary ) && $this->userCan( Revision::DELETED_COMMENT ) ) {
			$msg = $this->msg( "notification-body-{$this->type}" );
			$msg->params( $this->formatSummary( $summary ) );
			return $msg;
		} else {
			return false;
		}
	}

	private function formatSummary( $wikitext ) {
		$html = Linker::formatLinksInComment( Sanitizer::escapeHtmlAllowEntities( $wikitext ) );
		return EchoDiscussionParser::getTextSnippet(
			$html,
			$this->language,
			30
		);
	}

	public function getPrimaryLink() {
		$url = $this->event->getTitle()->getLocalURL( array(
			'oldid' => 'prev',
			'diff' => $this->event->getExtraParam( 'revid' )
		) );
		return array(
			'url' => $url,
			'label' => $this->msg( 'notification-link-text-view-changes' )->text()
		);
	}

	public function getSecondaryLinks() {
		return array( $this->getAgentLink(), $this->getTitleLink() );
	}

	/**
	 * Return a number that represents if one or multiple edits
	 * have been reverted for formatting purposes.
	 * @return int
	 */
	private function getNumberOfEdits() {
		$method = $this->event->getExtraParam( 'method' );
		if ( $method && $method === 'rollback' ) {
			return 2;
		} else {
			return 1;
		}
	}

	private function getTitleLink() {
		$talkpage = $this->event->getTitle()->getTalkPage();
		return array(
			'label' => $talkpage->getPrefixedText(),
			'url' => $talkpage->getFullURL(),
			'icon' => 'speechBubbles',
			'prioritized' => true,
			'description' => null,
		);
	}

	private function isAutomaticSummary( $summary ) {
		$autoSummaryMsg = wfMessage( 'undo-summary' )->inContentLanguage();
		$autoSummaryMsg->params( $this->event->getExtraParam( 'reverted-revision-id' ) );
		$autoSummaryMsg->params( $this->getViewingUserForGender() );
		$autoSummary = $autoSummaryMsg->text();

		return $summary === $autoSummary;
	}
}
