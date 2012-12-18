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
			$this->formatLink( $event, $message, $props );
		} elseif ( $param === 'titlelink' ) {
			$this->formatLink( $event, $message );
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

	/**
	 * Generate links based on output format and passed properties
	 * $event EchoEvent
	 * $message Message
	 * $props array
	 */
	private function formatLink( $event, $message, $props = array() ) {
		if ( !$event->getTitle() ) {
			$message->params( wfMessage( 'echo-no-title' )->text() );
			return;
		}

		$title = $event->getTitle();

		$param = array();
		if ( isset( $props['param'] ) ) {
			$param = (array)$props['param'];
		}

		if ( $this->outputFormat === 'html' ) {
			$class = array();
			if ( isset( $props['class'] ) ) {
				$class['class'] = $props['class'];
			}

			if ( isset( $props['linkText'] ) ) {
				$linkText = $props['linkText'];
			} else {
				$linkText = htmlspecialchars( $title->getPrefixedText() );
			}

			$message->rawParams( Linker::link( $title, $linkText, $class, $param ) );
		} elseif ( $this->outputFormat === 'email' ) {
			$message->params( $title->getCanonicalURL( $param ) );
		} else {
			$message->params( $title->getFullURL( $param ) );
		}
	}
}
