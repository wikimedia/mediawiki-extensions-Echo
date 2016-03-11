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

	protected function getHeaderMessageKey() {
		$noSection = !$this->getSection();

		if ( $this->onArticleTalkpage() ) {
			return $noSection ?
				'notification-header-mention-article-talkpage-nosection' :
				'notification-header-mention-article-talkpage';
		} elseif ( $this->onAgentTalkpage() ) {
			return $noSection ?
				'notification-header-mention-agent-talkpage-nosection' :
				'notification-header-mention-agent-talkpage';
		} elseif ( $this->onUserTalkpage() ) {
			return $noSection ?
				'notification-header-mention-user-talkpage-nosection' :
				'notification-header-mention-user-talkpage-v2';
		} else {
			return $noSection ?
				'notification-header-mention-other-nosection' :
				'notification-header-mention-other';
		}
	}

	public function getHeaderMessage() {
		$msg = $this->getMessageWithAgent( $this->getHeaderMessageKey() );
		$msg->params( $this->getViewingUserForGender() );

		if ( $this->onArticleTalkpage() ) {
			$msg->params( $this->getTruncatedTitleText( $this->event->getTitle() ) );
		} elseif ( $this->onAgentTalkpage() ) {
			// No params to add here.
			// If we remove this check, onUserTalkpage() has to
			// make sure it is a user talk page but NOT the agent's talk page.
		} elseif ( $this->onUserTalkpage() ) {
			$username = $this->event->getTitle()->getText();
			$msg->params( $this->getTruncatedUsername() );
			$msg->params( $username );
		} else {
			$msg->params( $this->getTruncatedTitleText( $this->event->getTitle(), true ) );
		}

		$section = $this->getSection();
		if ( $section ) {
			$msg->params( $this->language->embedBidi(
				EchoDiscussionParser::getTextSnippet(
						$section,
						$this->language,
						self::SECTION_TITLE_RECOMMENDED_LENGTH
				)
			) );
		}

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

	public function getBodyMessage() {
		$content = $this->event->getExtraParam( 'content' );
		if ( $content && $this->userCan( Revision::DELETED_TEXT ) ) {
			$msg = $this->msg( 'notification-body-mention' );
			$msg->params(
				EchoDiscussionParser::getTextSnippet(
					$content,
					$this->language
				)
			);
			return $msg;
		} else {
			return false;
		}
	}

	public function getPrimaryLink() {
		return array(
			// Need FullURL so the section is included
			'url' => $this->getTitleWithSection()->getFullURL(),
			'label' => $this->msg( 'notification-link-text-view-mention' )->text()
		);
	}

	public function getSecondaryLinks() {
		$title = $this->event->getTitle();

		$url = $title->getLocalURL( array(
			'oldid' => 'prev',
			'diff' => $this->event->getExtraParam( 'revid' )
		) );
		$viewChangesLink = array(
			'url' => $url,
			'label' => $this->msg( 'notification-link-text-view-changes', $this->getViewingUserForGender() )->text(),
			'description' => '',
			'icon' => 'changes',
			'prioritized' => true,
		);

		return array( $this->getAgentLink(), $viewChangesLink );
	}

	private function onArticleTalkpage() {
		return $this->event->getTitle()->getNamespace() === NS_TALK;
	}

	private function onAgentTalkpage() {
		return $this->event->getTitle()->getPrefixedText() === $this->event->getAgent()->getTalkPage()->getPrefixedText();
	}

	private function onUserTalkpage() {
		return $this->event->getTitle()->getNamespace() === NS_USER_TALK;
	}

	private function isTalk() {
		return $this->event->getTitle()->isTalkPage();
	}

	private function isArticle() {
		$ns = $this->event->getTitle()->getNamespace();
		return $ns === NS_MAIN || $ns === NS_TALK;
	}
}
