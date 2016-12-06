<?php

class EchoMentionPresentationModel extends EchoEventPresentationModel {
	use EchoPresentationModelSectionTrait;

	public function getIconType() {
		return 'mention';
	}

	public function canRender() {
		return (bool)$this->event->getTitle();
	}

	protected function getHeaderMessageKey() {
		if ( $this->onArticleTalkpage() ) {
			return $this->hasSection() ?
				'notification-header-mention-article-talkpage' :
				'notification-header-mention-article-talkpage-nosection';
		} elseif ( $this->onAgentTalkpage() ) {
			return $this->hasSection() ?
				'notification-header-mention-agent-talkpage' :
				'notification-header-mention-agent-talkpage-nosection';
		} elseif ( $this->onUserTalkpage() ) {
			return $this->hasSection() ?
				'notification-header-mention-user-talkpage-v2' :
				'notification-header-mention-user-talkpage-nosection';
		} else {
			return $this->hasSection() ?
				'notification-header-mention-other' :
				'notification-header-mention-other-nosection';
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
			$msg->params( $this->getTruncatedUsername( User::newFromName( $username, false ) ) );
			$msg->params( $username );
		} else {
			$msg->params( $this->getTruncatedTitleText( $this->event->getTitle(), true ) );
		}

		if ( $this->hasSection() ) {
			$msg->plaintextParams( $this->getTruncatedSectionTitle() );
		}

		return $msg;
	}

	public function getBodyMessage() {
		$content = $this->event->getExtraParam( 'content' );
		if ( $content && $this->userCan( Revision::DELETED_TEXT ) ) {
			$msg = $this->msg( 'notification-body-mention' );
			$msg->plaintextParams(
				EchoDiscussionParser::getTextSnippet(
					$content,
					$this->language,
					150,
					$this->event->getTitle()
				)
			);
			return $msg;
		} else {
			return false;
		}
	}

	public function getPrimaryLink() {
		return [
			// Need FullURL so the section is included
			'url' => $this->getTitleWithSection()->getFullURL(),
			'label' => $this->msg( 'notification-link-text-view-mention' )->text()
		];
	}

	public function getSecondaryLinks() {
		$title = $this->event->getTitle();

		$url = $title->getLocalURL( [
			'oldid' => 'prev',
			'diff' => $this->event->getExtraParam( 'revid' )
		] );
		$viewChangesLink = [
			'url' => $url,
			'label' => $this->msg( 'notification-link-text-view-changes', $this->getViewingUserForGender() )->text(),
			'description' => '',
			'icon' => 'changes',
			'prioritized' => true,
		];

		return [ $this->getAgentLink(), $viewChangesLink ];
	}

	private function onArticleTalkpage() {
		return $this->event->getTitle()->getNamespace() === NS_TALK;
	}

	private function onAgentTalkpage() {
		return $this->event->getTitle()->equals( $this->event->getAgent()->getTalkPage() );
	}

	private function onUserTalkpage() {
		return $this->event->getTitle()->getNamespace() === NS_USER_TALK &&
			$this->event->getTitle()->isTalkPage() &&
			!$this->event->getTitle()->isSubpage();
	}

	private function isTalk() {
		return $this->event->getTitle()->isTalkPage();
	}

	private function isArticle() {
		$ns = $this->event->getTitle()->getNamespace();
		return $ns === NS_MAIN || $ns === NS_TALK;
	}

	protected function getSubjectMessageKey() {
		return 'notification-mention-email-subject';
	}
}
