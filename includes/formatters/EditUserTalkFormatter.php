<?php

/**
 * Custom formatter for 'edit-user-talk' notifications
 */
class EchoEditUserTalkFormatter extends EchoEditFormatter {

	/**
	 * {@inheritDoc}
	 */
	protected function applyChangeBeforeFormatting( EchoEvent $event, User $user, $type ) {
		parent::applyChangeBeforeFormatting( $event, $user, $type );

		// Replace default generic notification message with 'Someone left a message
		// on your talk page in "xxxx"' if
		// * the message is not bundled and
		// * there is a section title
		// We could go with the approach of creating a new notification type, but
		// * this is variant is too small to introduce a new type
		// * may not fall back to default for talk page post with oversighted content
		// * message bundling is supposed to bundle the same notfication type, creating
		//   a new type will not be able to bundle them together
		if ( !$this->bundleData['use-bundle'] && $this->getSectionTitle( $event, $user ) ) {
			$this->title = array(
				'message' => 'notification-edit-talk-page-with-section',
				'params' => array( 'agent', 'user', 'subject-anchor', 'section-title' )
			);
			$this->email['batch-body'] = array(
				'message' => 'notification-edit-talk-page-email-batch-body-with-section',
				'params' => array( 'agent', 'section-title' )
			);
			// Display the summary if there is a section title
			$this->payload = array( 'summary' );
		}
	}

}
