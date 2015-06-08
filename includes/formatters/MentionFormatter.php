<?php

class EchoMentionFormatter extends EchoCommentFormatter {
	/**
	 * {@inheritDoc}
	 */
	protected function applyChangeBeforeFormatting( EchoEvent $event, User $user, $type ) {
		parent::applyChangeBeforeFormatting( $event, $user, $type );

		// If we can't find a section title for the mention,
		// fall back to `notification-mention-nosection`.
		if ( !$this->getSectionTitle( $event, $user ) ) {
			$this->title = array(
				'message' => 'notification-mention-nosection',
				'params' => array( 'agent', 'main-title-text', 'title' )
			);
			$this->flyoutTitle = array(
				'message' => 'notification-mention-nosection-flyout',
				'params' => array( 'agent', 'main-title-text', 'title' )
			);
			$this->email['batch-body'] = array(
				'message' => 'notification-mention-nosection-email-batch-body',
				'params' => array( 'agent', 'main-title-text' )
			);
		}
	}
}
