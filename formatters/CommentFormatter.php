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
		if ( $param === 'content-page' ) {
			if ( $event->getTitle() ) {
				$message->params( $event->getTitle()->getSubjectPage()->getPrefixedText() );
			} else {
				$message->params( '' );
			}
		} elseif ( $param === 'subject-link' ) {
			$this->setTitleLink( $event, $message );
		} else {
			parent::processParam( $event, $param, $message, $user );
		}
	}
}
