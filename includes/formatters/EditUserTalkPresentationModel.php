<?php

class EchoEditUserTalkPresentationModel extends EchoEventPresentationModel {
	use EchoPresentationModelSectionTrait;

	public function canRender() {
		return (bool)$this->event->getTitle();
	}

	public function getIconType() {
		return 'edit-user-talk';
	}

	public function getPrimaryLink() {
		return array(
			// Need FullURL so the section is included
			'url' => $this->getTitleWithSection()->getFullURL(),
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
