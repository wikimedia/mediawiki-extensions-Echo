<?php

/**
 * Email Bundling for database storage
 */
class MWDbEchoEmailBundler extends MWEchoEmailBundler {

	/**
	 * Retrieve the base event for email bundling, the one with the largest eeb_id
	 * @return bool
	 */
	protected function retrieveBaseEvent() {
		$dbr = MWEchoDbFactory::getDB( DB_SLAVE );
		$res = $dbr->selectRow(
			array( 'echo_email_batch' ),
			array( 'eeb_event_id' ),
			array(
				'eeb_user_id' => $this->mUser->getId(),
				'eeb_event_hash' => $this->bundleHash
			),
			__METHOD__,
			array( 'ORDER BY' => 'eeb_event_priority DESC, eeb_id DESC', 'LIMIT' => 1 )
		);
		if ( !$res ) {
			return false;
		}
		$this->baseEvent = EchoEvent::newFromId( $res->eeb_event_id );
		return true;
	}

	/**
	 * Clear processed events from the queue
	 */
	protected function clearProcessedEvent() {
		if ( !$this->baseEvent ) {
			return;
		}
		$conds = array( 'eeb_user_id' => $this->mUser->getId(), 'eeb_event_hash' => $this->bundleHash );

		$conds[] = 'eeb_event_id <= ' . intval( $this->baseEvent->getId() );

		$dbw = MWEchoDbFactory::getDB( DB_MASTER );
		$dbw->delete(
			'echo_email_batch',
			$conds,
			__METHOD__,
			array()
		);
	}

}
