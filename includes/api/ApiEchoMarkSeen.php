<?php

class ApiEchoMarkSeen extends ApiBase {

	public function execute() {
		// To avoid API warning, register the parameter used to bust browser cache
		$this->getMain()->getVal( '_' );

		$user = $this->getUser();
		if ( $user->isAnon() ) {
			$this->dieUsage( 'Login is required', 'login-required' );
		}

		// Load from the master to reduce CAS errors from high update frequency
		$u = User::newFromId( $user->getId() );
		$u->load( User::READ_LATEST );

		$timestamp = wfTimestamp( TS_MW );
		// @TODO: do not abuse user preferences for "last seen"
		$u->setOption( 'echo-seen-time', $timestamp );
		$u->saveSettings();

		$this->getResult()->addValue( 'query', $this->getModuleName(), array(
			'result' => 'success',
			'timestamp' => $timestamp,
		) );
	}

	public function getAllowedParams() {
		return array(
			'token' => array(
				ApiBase::PARAM_REQUIRED => true,
			),
		);
	}

	/**
	 * @deprecated since MediaWiki core 1.25
	 */
	public function getParamDescription() {
		return array(
			'token' => 'edit token',
		);
	}

	public function needsToken() {
		return 'csrf';
	}

	public function getTokenSalt() {
		return '';
	}

	public function mustBePosted() {
		return true;
	}

	public function isWriteMode() {
		return true;
	}

	/**
	 * @deprecated since MediaWiki core 1.25
	 */
	public function getDescription() {
		return 'Mark notifications as seen for the current user';
	}

	/**
	 * @deprecated since MediaWiki core 1.25
	 */
	public function getExamples() {
		return array(
			'api.php?action=echomarkseen',
		);
	}

	/**
	 * @see ApiBase::getExamplesMessages()
	 */
	protected function getExamplesMessages() {
		return array(
			'action=echomarkseen' => 'apihelp-echomarkseen-example-1',
		);
	}

	public function getHelpUrls() {
		return 'https://www.mediawiki.org/wiki/Echo_(Notifications)/API';
	}
}
