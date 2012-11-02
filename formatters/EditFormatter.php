<?php

class EchoEditFormatter extends EchoBasicFormatter {

	/**
	 * @param EchoEvent $event
	 * @param $param
	 * @param $message Message
	 * @param $user User
	 */
	protected function processParam( $event, $param, $message, $user ) {
		if ( $param === 'difflink' ) {
			$eventData = $event->getExtra();
			if ( !isset( $eventData['revid'] ) ) {
				$message->params( '' );
				return;
			}

			if ( !$event->getTitle() ) {
				$message->params( wfMessage( 'echo-no-title' )->text() );
			}

			$revid = $eventData['revid'];
			$title = $event->getTitle();

			if ( $this->outputFormat === 'html' ) {
				$link = Linker::link(
					$title,
					wfMessage( 'parentheses', wfMessage( 'diff' )->text() )->escaped(),
					array(
						'class' => 'mw-echo-diff',
					),
					array(
						'oldid' => $revid,
						'diff' => 'prev',
					)
				);
				$message->rawParams( $link );
			} elseif ( $this->outputFormat === 'email' ) {
				$link = $title->getCanonicalURL(
					array( 'oldid' => $revid, 'diff' => 'prev' ) );
				$message->params( $link );
			} else {
				$link = $title->getFullURL(
					array( 'oldid' => $revid, 'diff' => 'prev' ) );
				$message->params( $link );
			}
		} elseif ( $param === 'summary' ) {
			$eventData = $event->getExtra();
			if ( !isset( $eventData['revid'] ) ) {
				$message->params( '' );
				return;
			}

			$revision = Revision::newFromId( $eventData['revid'] );
			if ( $revision ) {
				$message->params( $revision->getComment( Revision::FOR_THIS_USER, $user ) );
			}
		} elseif ( $param === 'number' ) {
			$eventData = $event->getExtra();
			// The folliwing is a bit of a hack...
			// If the edit is a rollback, we want to say 'your edits' in the
			// notification. If the edit is an undo, we want to say 'your edit'
			// in the notification. To accomplish this, we pass a 'number' param
			// to the message which is set to 1 or 2 and formatted with {{PLURAL}}.
			if ( isset( $eventData['method'] ) && $eventData['method'] === 'rollback' ) {
				$message->params( 2 );
			} else {
				$message->params( 1 );
			}
		} else {
			parent::processParam( $event, $param, $message, $user );
		}
	}
}
