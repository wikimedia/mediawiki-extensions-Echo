<?php

class MWEchoNotificationEmailBundleJob extends Job {
	function __construct( $title, $params ) {
		parent::__construct( __CLASS__, $title, $params );
		// If there is already a job with the same params, this job will be ignored
		// for example, if there is a page link bundle notification job for article A
		// created by user B, any subsequent jobs with the same data will be ignored
		$this->removeDuplicates = true;
	}

	function run() {
		$bundle = MWEchoEmailBundler::newFromUserHash(
			User::newFromId( $this->params['user_id'] ),
			$this->params['bundle_hash']
		);

		if ( $bundle ) {
			$bundle->processBundleEmail();
		} else {
			throw new MWException( 'Fail to create bundle object for: user_id: ' . $this->params['user_id'] . ', bundle_hash: ' . $this->params['bundle_hash'] );
		}

		return true;
	}
}
