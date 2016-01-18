<?php

class EchoEditUserTalkPresentationModel extends EchoEventPresentationModel {

	public function canRender() {
		return (bool)$this->event->getTitle();
	}

	public function getIconType() {
		return 'edit-user-talk';
	}

	public function getPrimaryLink() {
		$title = $this->event->getTitle();
		if ( $this->hasSection() ) {
			$title = Title::makeTitle(
				$title->getNamespace(),
				$title->getDBkey(),
				$this->formatSubjectAnchor()
			);
		}

		return array(
			'url' => $title->getFullURL(),
			'label' => $this->msg( 'notification-link-text-view-message' )->text()
		);
	}

	public function getSecondaryLinks() {
		$diffLink = array(
			'url' => $this->getDiffLinkUrl(),
			'label' => $this->msg( 'notification-link-text-view-changes' )->text(),
			'description' => '',
			'icon' => 'changes',
			'prioritized' => true
		);
		return array( $this->getAgentLink(), $diffLink );
	}

	public function getHeaderMessage() {
		if ( $this->getBundleCount( true, array( $this,'getEventUser' ) ) > 1 ) {
			$msg = $this->getMessageWithAgent( "notification-bundle-header-{$this->type}" );
			list( $formattedCount, $countForPlural ) =
				$this->getNotificationCountForOutput( false, array( $this, 'getEventUser' ) );
			$msg->params( $this->getViewingUserForGender() );
			$msg->params( $formattedCount );
			$msg->params( $countForPlural );
			return $msg;
		} elseif ( $this->hasSection() ) {
			$msg = $this->getMessageWithAgent( "notification-header-{$this->type}-with-section" );
			$msg->params( $this->getViewingUserForGender() );
			$msg->params( $this->getSectionTitleSnippet() );
			return $msg;
		} else {
			$msg = parent::getHeaderMessage();
			$msg->params( $this->getViewingUserForGender() );
			return $msg;
		}
	}

	public function getBodyMessage() {
		if ( $this->getBundleCount( true, array( $this,'getEventUser' ) ) === 1 && $this->hasSection() ) {
			$msg = $this->msg( 'notification-body-edit-user-talk-with-section' );
			$msg->params( wfEscapeWikiText( $this->getRevisionSnippet() ) );
			return $msg;
		} else {
			return false;
		}
	}

	public static function getEventUser( EchoEvent $event ) {
		$agent = $event->getAgent();
		return $agent->isAnon() ? $agent->getName() : $agent->getId();
	}

	private function hasSection() {
		return (bool)$this->event->getExtraParam( 'section-title' );
	}

	/**
	 * Get the section title for a talk page post
	 * @return string
	 */
	private function getSectionTitleSnippet() {
		if ( $this->userCan( Revision::DELETED_TEXT ) ) {
			return EchoDiscussionParser::getTextSnippet(
				$this->event->getExtraParam( 'section-title' ),
				$this->language,
				30
			);
		} else {
			return $this->msg( 'echo-rev-deleted-text-view' )->text();
		}
	}

	private function getRevisionSnippet() {
		$sectionText = $this->event->getExtraParam( 'section-text' );
		if ( $sectionText === null || !$this->userCan( Revision::DELETED_TEXT ) ) {
			return '';
		}

		return trim( $sectionText );
	}

	/**
	 * Extract the subject anchor (linkable portion of the edited page) from
	 * the event.
	 *
	 * @return string The anchor on page, or an empty string
	 */
	private function formatSubjectAnchor() {
		global $wgParser;

		if ( !$this->userCan( Revision::DELETED_TEXT ) ) {
			return $this->msg( 'echo-rev-deleted-text-view' )->text();
		}
		$sectionTitle = $this->event->getExtraParam( 'section-title' );
		if ( $sectionTitle === null ) {
			return '';
		}

		// Strip out #
		return substr( $wgParser->guessLegacySectionNameFromWikiText( $sectionTitle ), 1 );
	}

	private function getDiffLinkUrl() {
		$revId = $this->event->getExtraParam( 'revid' );
		$oldId = $this->isBundled() ? $this->getRevBeforeFirstNotification() : 'prev';
		$query = array(
			'oldid' => $oldId,
			'diff' => $revId,
		);
		return $this->event->getTitle()->getFullURL( $query );
	}

	private function getRevBeforeFirstNotification() {
		$events = $this->getBundledEvents();
		$firstNotificationRevId = end( $events )->getExtraParam( 'revid' );
		return $this->event->getTitle()->getPreviousRevisionID( $firstNotificationRevId );
	}
}
