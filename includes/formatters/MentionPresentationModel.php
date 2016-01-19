<?php

class EchoMentionPresentationModel extends EchoEventPresentationModel {
	private $sectionTitle = null;


	public function getIconType() {
		return 'mention';
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

	public function canRender() {
		return (bool)$this->event->getTitle();
	}

	/**
	 * Override to switch the message key to -nosection
	 * if no section title was detected
	 *
	 * @return string
	 */
	protected function getHeaderMessageKey() {
		// Messages used:
		// notification-header-mention
		// notification-header-mention-nosection
		$key = parent::getHeaderMessageKey();
		if ( !$this->getSection() ) {
			$key .= '-nosection';
		}

		return $key;
	}

	public function getHeaderMessage() {
		$msg = parent::getHeaderMessage();
		// @fixme this message should not say "xx talk page"
		$msg->params( $this->event->getTitle()->getText() );
		$section = $this->getSection();
		if ( $section ) {
			$msg->params(
				EchoDiscussionParser::getTextSnippet(
						$section,
						$this->language,
						30
				)
			);
		} else {
			// For the -nosection message
			$msg->params( $this->event->getTitle()->getPrefixedText() );
		}
		$msg->params( $this->getViewingUserForGender() );

		return $msg;
	}

	/**
	 * @return Title
	 */
	private function getTitleWithSection() {
		$title = $this->event->getTitle();
		$section = $this->getSection();
		if ( $section ) {
			$title = Title::makeTitle(
				$title->getNamespace(),
				$title->getDBkey(),
				$section
			);
		}

		return $title;
	}

	public function getPrimaryLink() {
		return array(
			// Need FullURL so the section is included
			'url' => $this->getTitleWithSection()->getFullURL(),
			'label' => $this->msg( 'notification-link-text-view-mention' )->text()
		);
	}

	public function getSecondaryLinks() {
		$url = $this->event->getTitle()->getLocalURL( array(
			'oldid' => 'prev',
			'diff' => $this->event->getExtraParam( 'revid' )
		) );
		$viewChangesLink = array(
			'url' => $url,
			'label' => $this->msg( 'notification-link-text-view-changes' )->text(),
			'description' => '',
			'icon' => 'changes',
			'prioritized' => true,
		);
		return array( $this->getAgentLink(), $viewChangesLink );
	}
}
