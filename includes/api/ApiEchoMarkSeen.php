<?php

class ApiEchoMarkSeen extends ApiBase {

	public function execute() {
		// To avoid API warning, register the parameter used to bust browser cache
		$this->getMain()->getVal( '_' );

		$user = $this->getUser();
		if ( $user->isAnon() ) {
			$this->dieUsage( 'Login is required', 'login-required' );
		}

		$params = $this->extractRequestParams();
		$timestamp = wfTimestamp( TS_MW );
		$seenTime = EchoSeenTime::newFromUser( $user );
		$seenTime->setTime( $timestamp, $params['type'] );

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
			'type' => array(
				ApiBase::PARAM_REQUIRED => true,
				ApiBase::PARAM_TYPE => array( 'alert', 'message', 'all' ),
			)
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
	 * @see ApiBase::getExamplesMessages()
	 */
	protected function getExamplesMessages() {
		return array(
			'action=echomarkseen&type=all' => 'apihelp-echomarkseen-example-1',
		);
	}

	public function getHelpUrls() {
		return 'https://www.mediawiki.org/wiki/Echo_(Notifications)/API';
	}
}
