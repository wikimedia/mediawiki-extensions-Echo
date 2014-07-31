<?php

class ApiEchoNotifications extends ApiQueryBase {

	public function __construct( $query, $moduleName ) {
		parent::__construct( $query, $moduleName, 'not' );
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

		$prop = $params['prop'];

		$result = array();
		if ( in_array( 'list', $prop ) ) {
			$result['list'] = array();
			$notifMapper = new EchoNotificationMapper( MWEchoDbFactory::newFromDefault() );
			$notifs = $notifMapper->fetchByUser( $user, $params['limit'] + 1, $params['continue'], 'web' );
			foreach ( $notifs as $notif ) {
				$result['list'][$notif->getEvent()->getID()] = EchoDataOutputFormatter::formatOutput( $notif, $params['format'], $user );
			}

			// check if there is more elements than we request
			if ( count( $result['list'] ) > $params['limit'] ) {
				$lastItem = array_pop( $result['list'] );
				$result['continue'] = $lastItem['timestamp']['utcunix'] . '|' . $lastItem['id'];
			} else {
				$result['continue'] = null;
			}
			$this->getResult()->setIndexedTagName( $result['list'], 'notification' );
		}

		if ( in_array( 'count', $prop ) ) {
			$rawCount = $notifUser->getNotificationCount();
			$result['rawcount'] = $rawCount;
			$result['count'] = EchoNotificationController::formatNotificationCount( $rawCount );
		}

		if ( in_array( 'index', $prop ) ) {
			$result['index'] = array();
			foreach ( array_keys( $result['list'] ) as $key ) {
				// Don't include the XML tag name ('_element' key)
				if ( $key != '_element' ) {
					$result['index'][] = $key;
				}
			}
			$this->getResult()->setIndexedTagName( $result['index'], 'id' );
		}

		$this->getResult()->setIndexedTagName( $result, 'notification' );
		$this->getResult()->addValue( 'query', $this->getModuleName(), $result );
	}

	public function getAllowedParams() {
		return array(
			'prop' => array(
				ApiBase::PARAM_ISMULTI => true,
				ApiBase::PARAM_TYPE => array(
					'list',
					'count',
					'index',
				),
				ApiBase::PARAM_DFLT => 'list',
			),
			'format' => array(
				ApiBase::PARAM_TYPE => array(
					'text',
					'flyout',
					'html',
				),
			),
			'limit' => array(
				ApiBase::PARAM_TYPE => 'limit',
				ApiBase::PARAM_DFLT => 20,
				ApiBase::PARAM_MIN => 1,
				ApiBase::PARAM_MAX => ApiBase::LIMIT_SML1,
				ApiBase::PARAM_MAX2 => ApiBase::LIMIT_SML2,
			),
			'index' => false,
			'continue' => null,
			'uselang' => null
		);
	}

	public function getParamDescription() {
		return array(
			'prop' => 'Details to request.',
			'format' => 'If specified, notifications will be returned formatted this way.',
			'index' => 'If specified, a list of notification IDs, in order, will be returned.',
			'limit' => 'The maximum number of notifications to return.',
			'continue' => 'When more results are available, use this to continue',
			'uselang' => 'the desired language to format the output'
		);
	}

	public function getDescription() {
		return 'Get notifications waiting for the current user';
	}

	public function getExamples() {
		return array(
			'api.php?action=query&meta=notifications',
			'api.php?action=query&meta=notifications&notprop=count',
		);
	}

	public function getHelpUrls() {
		return 'https://www.mediawiki.org/wiki/Echo_(notifications)/API';
	}

	public function getVersion() {
		return __CLASS__ . '-0.1';
	}
}
