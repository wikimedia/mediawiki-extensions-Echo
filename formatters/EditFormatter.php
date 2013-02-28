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
			$props = array(
				'class' => 'mw-echo-diff',
				'linkText' => wfMessage( 'parentheses', wfMessage( 'showdiff' )->text() )->escaped(),
				'param' => array(
					'oldid' => $eventData['revid'],
					'diff' => 'prev',
				)
			);
			$this->setTitleLink( $event, $message, $props );
		} elseif ( $param === 'titlelink' ) {
			$this->setTitleLink( $event, $message );
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
