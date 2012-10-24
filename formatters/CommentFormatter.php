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

	protected function formatFragment( $details, $event, $user ) {
		$userTalkPage = $user->getUserPage()->getTalkPage();

		if (
			$event->getTitle()->equals( $userTalkPage ) &&
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
		if ( $param === 'subject' ) {
			if ( isset( $extra['section-title'] ) && $extra['section-title'] ) {
				$message->params( $extra['section-title'] );
			} else {
				$message->params( '' );
			}
		} elseif ( $param === 'commentText' ) {
			/**
			 * @var $wgLang Language
			 */
			global $wgLang; // Message::language is protected :(

			if ( isset( $extra['content'] ) && $extra['content'] ) {
				$content = $extra['content'];

				$content = EchoDiscussionParser::stripHeader( $content );
				$content = EchoDiscussionParser::stripSignature( $content );
				$content = EchoDiscussionParser::stripIndents( $content );
				$content = trim( $content );
				$content = $wgLang->truncate( $content, 200 );

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
		} else {
			parent::processParam( $event, $param, $message, $user );
		}
	}
}
