<?php

class MWEchoNotificationEmailBundleJob extends Job {
	function __construct( $title, $params ) {
		parent::__construct( 'MWEchoNotificationEmailBundleJob', $title, $params );
		// If there is already a job with the same params, this job will be ignored
		// for example, if there is a page link bundle notification job for article A
		// created by user B, any subsequent jobs with the same data will be ignored
		$this->removeDuplicates = true;
	}

	function run() {
		$user = User::newFromId( $this->params['user_id'] );
		if ( $user ) {
			$bundle = MWEchoEmailBundler::newFromUserHash( $user, $this->params['bundle_hash'] );
			if ( $bundle ) {
				$bundle->processBundleEmail();
			}
		} else {
			//@Todo: delete notifications for this user_id
		}
		return true;
	}
}
