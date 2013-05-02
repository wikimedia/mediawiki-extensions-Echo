<?php

class EchoCommentFormatter extends EchoEditFormatter {
	public function __construct( $params ) {
		parent::__construct( $params );

		if ( isset( $params['title-message-yours'] ) ) {
			$this->title['message-yours'] = $params['title-message-yours'];
		}

		if ( isset( $params['content-message-yours'] ) ) {
			$this->content['message-yours'] = $params['content-message-yours'];
		}

		if ( isset( $params['email-subject-message-yours'] ) ) {
			$this->email['subject']['message-yours'] = $params['email-subject-message-yours'];
		}

		if ( isset( $params['email-body-message-yours'] ) ) {
			$this->email['body']['message-yours'] = $params['email-body-message-yours'];
		}
	}

	/**
	 * @param $details
	 * @param $event EchoEvent
	 * @param $user User
	 * @return Message
	 */
	protected function formatFragment( $details, $event, $user ) {
		$userTalkPage = $user->getUserPage()->getTalkPage();

		$title = $event->getTitle();
		if ( $title && $title->equals( $userTalkPage ) &&
			isset( $details['message-yours'] )
		) {
			$details['message'] = $details['message-yours'];
		}

		return parent::formatFragment( $details, $event, $user );
	}

	/**
	 * @param EchoEvent $event
	 * @param $param
	 * @param Message $message
	 * @param User $user
	 */
	protected function processParam( $event, $param, $message, $user ) {
		$extra = $event->getExtra();
		if ( $param === 'subject-anchor' ) {
			global $wgParser;
			if ( !empty( $extra['section-title'] ) ) {
				$message->params(
					// Strip out #, keeping # in the i18n message makes it look more clear
					substr( $wgParser->guessLegacySectionNameFromWikiText( $extra['section-title'] ), 1 )
				);
			} else {
				$message->params( '' );
			}
		} elseif ( $param === 'commentText' ) {
			if ( isset( $extra['content'] ) && $extra['content'] ) {
				$content = $extra['content'];
				$content = EchoDiscussionParser::stripHeader( $content );
				$content = EchoDiscussionParser::stripSignature( $content );
				$content = EchoDiscussionParser::stripIndents( $content );
				$content = EchoDiscussionParser::getTextSnippet( $content, 200 );

				$message->params( $content );
			} else {
				$message->params( '' );
			}
		} elseif ( $param === 'content-page' ) {
			if ( $event->getTitle() ) {
				$message->params( $event->getTitle()->getSubjectPage()->getPrefixedText() );
			} else {
				$message->params( '' );
			}
		} elseif ( $param === 'subject-link' ) {
			$prop = array();
			if ( isset( $extra['section-title'] ) && $extra['section-title'] ) {
				$prop['fragment'] = $extra['section-title'];
			}
			$this->setTitleLink( $event, $message, $prop );
		} else {
			parent::processParam( $event, $param, $message, $user );
		}
	}
}
