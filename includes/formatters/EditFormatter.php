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
		} elseif ( $param === 'section-title' ) {
			$message->params( $this->getSectionTitle( $event, $user ) );
		} elseif ( $param === 'difflink' ) {
			$revid = $event->getExtraParam( 'revid' );
			if ( !$revid ) {
				$message->params( '' );
				return;
			}
			$diff = $event->getExtraParam( 'diffid', 'prev' );
			$props = array(
				'attribs' => array( 'class' => 'mw-echo-diff' ),
				'linkText' => $this->getMessage( 'parentheses' )
						->params(
							$this->getMessage( 'showdiff' )->text()
						)->escaped(),
				'param' => array(
					'oldid' => $revid,
					'diff' => $diff,
				),
				// Set fragment to empty string for diff links
				'fragment' => ''
			);
			$this->setTitleLink( $event, $message, $props );
		} elseif ( $param === 'summary' ) {
			$message->params( $this->getRevisionSnippet( $event, $user ) );
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
	 * Get the section title for a talk page post
	 * @param $event EchoEvent
	 * @param $user User
	 * @return string
	 */
	protected function getSectionTitle( $event, $user ) {
		$extra = $event->getExtra();

		if ( !empty( $extra['section-title'] ) ) {
			if ( $event->userCan( Revision::DELETED_TEXT, $user ) ) {
				return EchoDiscussionParser::getTextSnippet( $extra['section-title'], 30 );
			} else {
				return $this->getMessage( 'echo-rev-deleted-text-view' )->text();
			}
		}

		return '';
	}
}
