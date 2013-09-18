<?php

class ApiEchoMarkRead extends ApiBase {

	public function __construct( $query, $moduleName ) {
		parent::__construct( $query, $moduleName );
	}

	public function execute() {
		// To avoid API warning, register the parameter used to bust browser cache
		$this->getMain()->getVal( '_' );

		$user = $this->getUser();
		if ( $user->isAnon() ) {
			$this->dieUsage( 'Login is required', 'login-required' );
		}

		$notifUser = MWEchoNotifUser::newFromUser( $user );

		$params = $this->extractRequestParams();

		// There is no need to trigger markRead if all notifications are read
		if ( $notifUser->getNotificationCount() > 0 ) {
			if ( count( $params['list'] ) ) {
				// Make sure there is a limit to the update
				$notifUser->markRead( array_slice( $params['list'], 0, ApiBase::LIMIT_SML2 ) );
			} elseif ( $params['all'] ) {
				$notifUser->markAllRead();
			}
		}

		$result = array( 'result' => 'success', 'count' => $notifUser->getFormattedNotificationCount() );
		$this->getResult()->addValue( 'query', $this->getModuleName(), $result );
	}

	public function getAllowedParams() {
		return array(
			'list' => array(
				ApiBase::PARAM_ISMULTI => true,
			),
			'all' => array(
				ApiBase::PARAM_REQUIRED => false,
				ApiBase::PARAM_TYPE => 'boolean'
			),
			'token' => array(
				ApiBase::PARAM_REQUIRED => true,
			),
		);
	}

	public function getParamDescription() {
		return array(
			'list' => 'A list of notification IDs to mark as read',
			'all' => "If set to true, marks all of a user's notifications as read",
			'token' => 'edit token',
		);
	}

	public function needsToken() {
		return true;
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

	public function getDescription() {
		return 'Mark notifications as read for the current user';
	}

	public function getExamples() {
		return array(
			'api.php?action=echomarkread&list=8',
			'api.php?action=echomarkread&all=true'
		);
	}

	public function getHelpUrls() {
		return 'https://www.mediawiki.org/wiki/Echo_(notifications)/API';
	}

	public function getVersion() {
		return __CLASS__ . '-0.1';
	}
}
