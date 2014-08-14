<?php

class ApiEchoMarkRead extends ApiBase {

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

		$rawCount = $notifUser->getNotificationCount();

		$result = array(
			'result' => 'success'
		);
		$rawCount = 0;
		foreach ( EchoAttributeManager::$sections as $section ) {
			$rawSectionCount = $notifUser->getNotificationCount( /* $tryCache = */true, DB_SLAVE, $section );
			$result[$section]['rawcount'] = $rawSectionCount;
			$result[$section]['count'] = EchoNotificationController::formatNotificationCount( $rawSectionCount );
			$rawCount += $rawSectionCount;
		}

		$result += array(
			'rawcount' => $rawCount,
			'count' => EchoNotificationController::formatNotificationCount( $rawCount ),
		);
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
			'uselang' => null
		);
	}

	public function getParamDescription() {
		return array(
			'list' => 'A list of notification IDs to mark as read',
			'all' => "If set to true, marks all of a user's notifications as read",
			'token' => 'edit token',
			'uselang' => 'the desired language to format the output'
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
		return 'https://www.mediawiki.org/wiki/Echo_(Notifications)/API';
	}
}
