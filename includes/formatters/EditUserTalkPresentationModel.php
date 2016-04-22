<?php

class EchoEditUserTalkPresentationModel extends EchoEventPresentationModel {

	private $sectionTitle = null;

	public function canRender() {
		return (bool)$this->event->getTitle();
	}

	public function getIconType() {
		return 'edit-user-talk';
	}

	public function getPrimaryLink() {
		$title = $this->event->getTitle();
		if ( !$this->isBundled() && $this->hasSection() ) {
			$title = Title::makeTitle(
				$title->getNamespace(),
				$title->getDBkey(),
				$this->getSection()
			);
		}

		return array(
			// Need FullURL so the section is included
			'url' => $title->getFullURL(),
			'label' => $this->msg( 'notification-link-text-view-message' )->text()
		);
	}

	public function getSecondaryLinks() {
		$diffLink = array(
			'url' => $this->getDiffLinkUrl(),
			'label' => $this->msg( 'notification-link-text-view-changes', $this->getViewingUserForGender() )->text(),
			'description' => '',
			'icon' => 'changes',
			'prioritized' => true
		);

		if ( $this->isBundled() ) {
			return array( $diffLink );
		} else {
			return array( $this->getAgentLink(), $diffLink );
		}
	}

	public function getHeaderMessage() {
		if ( $this->isBundled() ) {
			$msg = $this->msg( "notification-bundle-header-{$this->type}-v2" );
			$count = $this->getNotificationCountForOutput();

			// Repeat is B/C until unused parameter is removed from translations
			$msg->numParams( $count, $count );
			$msg->params( $this->getViewingUserForGender() );
			return $msg;
		} elseif ( $this->hasSection() ) {
			$msg = $this->getMessageWithAgent( "notification-header-{$this->type}-with-section" );
			$msg->params( $this->getViewingUserForGender() );
			$msg->plaintextParams( $this->getTruncatedSectionTitle( $this->getSection() ) );
			return $msg;
		} else {
			$msg = parent::getHeaderMessage();
			$msg->params( $this->getViewingUserForGender() );
			return $msg;
		}
	}

	public function getBodyMessage() {
		if ( !$this->isBundled() && $this->hasSection() ) {
			$msg = $this->msg( 'notification-body-edit-user-talk-with-section' );
			// section-text is safe to use here, because hasSection() returns false if the revision is deleted
			$msg->plaintextParams( $this->event->getExtraParam( 'section-text' ) );
			return $msg;
		} else {
			return false;
		}
	}

	private function hasSection() {
		return (bool)$this->getSection();
	}

	private function getSection() {
		if ( $this->sectionTitle !== null ) {
			return $this->sectionTitle;
		}
		$sectionTitle = $this->event->getExtraParam( 'section-title' );
		if ( !$sectionTitle ) {
			$this->sectionTitle = false;
			return false;
		}
		// Check permissions
		if ( !$this->userCan( Revision::DELETED_TEXT ) ) {
			$this->sectionTitle = false;
			return false;
		}

		$this->sectionTitle = $sectionTitle;
		return $this->sectionTitle;
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
