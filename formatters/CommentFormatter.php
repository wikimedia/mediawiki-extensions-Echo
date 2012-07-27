<?php

class EchoCommentFormatter extends EchoEditFormatter {
	protected function processParam( $event, $param, $message, $user ) {
		$extra = $event->getExtra();
		if ( $param === 'subject' ) {
			if ( isset( $extra['section-title'] ) && $extra['section-title'] ) {
				$message->params( $extra['section-title'] );
			} else {
				$message->params( '' );
			}
		} elseif ( $param === 'commentText' ) {
			global $wgLang; // Message::language is protected :(

			if ( isset( $extra['content'] ) && $extra['content'] ) {
				$content = $extra['content'];

				$content = EchoDiscussionParser::stripHeader( $content );
				$content = $wgLang->truncate( $content, 200 );

				$message->params( $content );
			} else {
				$message->params( '' );
			}
		} else {
			parent::processParam( $event, $param, $message, $user );
		}
	}
}