<?php

class ApiEchoMarkSeen extends ApiBase {

	public function execute() {
		// To avoid API warning, register the parameter used to bust browser cache
		$this->getMain()->getVal( '_' );

		$user = $this->getUser();
		if ( $user->isAnon() ) {
			$this->dieWithError( 'apierror-mustbeloggedin-generic', 'login-required' );
		}

		$params = $this->extractRequestParams();
		$timestamp = wfTimestamp( TS_MW );
		$seenTime = EchoSeenTime::newFromUser( $user );
		$seenTime->setTime( $timestamp, $params['type'] );

		if ( $params['timestampFormat'] === 'ISO_8601' ) {
			$outputTimestamp = wfTimestamp( TS_ISO_8601, $timestamp );
		} else {
			// MW
			$this->addDeprecation( 'apiwarn-echo-deprecation-timestampformat' );

			$outputTimestamp = $timestamp;
		}

		$this->getResult()->addValue( 'query', $this->getModuleName(), array(
			'result' => 'success',
			'timestamp' => $outputTimestamp,
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
			),
			'timestampFormat' => array(
				// Not using the TS constants, since clients can't.
				ApiBase::PARAM_DFLT => 'MW',
				ApiBase::PARAM_TYPE => array( 'ISO_8601', 'MW' ),
			),
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
