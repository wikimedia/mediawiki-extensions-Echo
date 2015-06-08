<?php

class EchoCommentFormatter extends EchoEditFormatter {
	public function __construct( $params ) {
		parent::__construct( $params );
	}

	/**
	 * @param EchoEvent $event
	 * @param $param
	 * @param Message $message
	 * @param User $user
	 */
	protected function processParam( $event, $param, $message, $user ) {
		if ( $param === 'content-page' ) {
			if ( $event->getTitle() ) {
				$message->params( $event->getTitle()->getSubjectPage()->getPrefixedText() );
			} else {
				$message->params( '' );
			}
		} elseif ( $param === 'subject-link' ) {
			$this->setTitleLink( $event, $message );
		// The title text without namespace
		} elseif ( $param === 'main-title-text' ) {
			if ( !$event->getTitle() ) {
				$message->params( $this->getMessage( 'echo-no-title' )->text() );
			} else {
				$message->params( $event->getTitle()->getText() );
			}
		} else {
			parent::processParam( $event, $param, $message, $user );
		}
	}
}
