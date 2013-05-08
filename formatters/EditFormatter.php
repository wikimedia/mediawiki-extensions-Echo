<?php

class EchoEditFormatter extends EchoBasicFormatter {

	/**
	 * @param EchoEvent $event
	 * @param $param
	 * @param $message Message
	 * @param $user User
	 */
	protected function processParam( $event, $param, $message, $user ) {
		if ( $param === 'subject-anchor' ) {
			$message->params( $this->formatSubjectAnchor( $event ) );
		} elseif ( $param === 'difflink' ) {
			$revid = $event->getExtraParam( 'revid' );
			if ( !$revid ) {
				$message->params( '' );
				return;
			}
			$props = array(
				'class' => 'mw-echo-diff',
				'linkText' => wfMessage( 'parentheses', wfMessage( 'showdiff' )->text() )->escaped(),
				'param' => array(
					'oldid' => $revid,
					'diff' => 'prev',
				)
			);
			$this->setTitleLink( $event, $message, $props );
		} elseif ( $param === 'summary' ) {
			$message->params( $this->formatSummary( $event, $user ) );
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
