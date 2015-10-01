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

		$params = $this->extractRequestParams();
		$prop = $params['prop'];

		$result = array();
		if ( in_array( 'list', $prop ) ) {
			// Group notification results by section
			if ( $params['groupbysection'] ) {
				wfProfileIn( __METHOD__ . '-group-by-section' );
				foreach ( $params['sections'] as $section ) {
					$result[$section] = $this->getSectionPropList(
						$user, $section, $params['limit'],
						$params[$section . 'continue'], $params['format'], $params[$section . 'unreadfirst']
					);
					$this->getResult()->setIndexedTagName( $result[$section]['list'], 'notification' );
					// 'index' is built on top of 'list'
					if ( in_array( 'index', $prop ) ) {
						$result[$section]['index'] = $this->getPropIndex( $result[$section]['list'] );
						$this->getResult()->setIndexedTagName( $result[$section]['index'], 'id' );
					}
				}
				wfProfileOut( __METHOD__ . '-group-by-section' );
			} else {
				wfProfileIn( __METHOD__ . '-group-by-none' );
				$attributeManager = EchoAttributeManager::newFromGlobalVars();
				$result = $this->getPropList(
					$user,
					$attributeManager->getUserEnabledEventsbySections( $user, 'web', $params['sections'] ),
					$params['limit'], $params['continue'], $params['format']
				);
				$this->getResult()->setIndexedTagName( $result['list'], 'notification' );
				// 'index' is built on top of 'list'
				if ( in_array( 'index', $prop ) ) {
					$result['index'] = $this->getPropIndex( $result['list'] );
					$this->getResult()->setIndexedTagName( $result['index'], 'id' );
				}
				wfProfileOut( __METHOD__ . '-group-by-none' );
			}
		}

		if ( in_array( 'count', $prop ) ) {
			wfProfileIn( __METHOD__ . '-count' );
			$result = array_merge_recursive(
				$result,
				$this->getPropcount( $user, $params['sections'], $params['groupbysection'] )
			);
			wfProfileOut( __METHOD__ . '-count' );
		}

		$this->getResult()->setIndexedTagName( $result, 'notification' );
		$this->getResult()->addValue( 'query', $this->getModuleName(), $result );
	}

	/**
	 * Internal method for getting the property 'list' data for individual section
	 * @param User $user
	 * @param string $section 'alert' or 'message'
	 * @param int $limit
	 * @param string $continue
	 * @param string $format
	 * @param boolean $unreadFirst
	 * @return array
	 */
	protected function getSectionPropList( User $user, $section, $limit, $continue, $format, $unreadFirst = false ) {
		$notifUser = MWEchoNotifUser::newFromUser( $user );
		$attributeManager = EchoAttributeManager::newFromGlobalVars();
		$sectionEvents = $attributeManager->getUserEnabledEventsbySections( $user, 'web', array( $section ) );

		if ( !$sectionEvents ) {
			$result = array(
				'list' => array(),
				'continue' => null
			);
		} else {
			$result = $this->getPropList(
				$user, $sectionEvents, $limit, $continue, $format, $unreadFirst
			);
		}

		return $result;
	}

	/**
	 * Internal helper method for getting property 'list' data, this is based
	 * on the event types specified in the arguments and it could be event types
	 * of a set of sections or a single section
	 * @param User $user
	 * @param string[] $eventTypes
	 * @param int $limit
	 * @param string $continue
	 * @param string $format
	 * @param boolean $unreadFirst
	 * @return array
	 */
	protected function getPropList( User $user, array $eventTypes, $limit, $continue, $format, $unreadFirst = false ) {
		$result = array(
			'list' => array(),
			'continue' => null
		);

		$notifMapper = new EchoNotificationMapper();

		// Prefer unread notifications. We don't care about next offset in this case
		if ( $unreadFirst ) {
			wfProfileIn( __METHOD__ . '-fetch-data-unread-first' );
			$notifs = $notifMapper->fetchUnreadByUser( $user, $limit, $eventTypes );
			// If there are less unread notifications than we requested,
			// then fill the result with some read notifications
			$count = count( $notifs );
			if ( $count < $limit ) {
				// Query planner should be smart enough that passing a short list of ids to exclude
				// will only visit at most that number of extra rows.
				$mixedNotifs = $notifMapper->fetchByUser(
					$user,
					$limit - $count,
					null,
					$eventTypes,
					array_keys( $notifs )
				);
				foreach ( $mixedNotifs as $notif ) {
					$notifs[$notif->getEvent()->getId()] = $notif;
				}
			}
			wfProfileOut( __METHOD__ . '-fetch-data-unread-first' );
		} else {
			wfProfileIn( __METHOD__ . '-fetch-data' );
			$notifs = $notifMapper->fetchByUser( $user, $limit + 1, $continue, $eventTypes );
			wfProfileOut( __METHOD__ . '-fetch-data' );
		}

		wfProfileIn( __METHOD__ . '-formatting' );
		foreach ( $notifs as $notif ) {
			$result['list'][$notif->getEvent()->getID()] = EchoDataOutputFormatter::formatOutput( $notif, $format, $user );
		}
		wfProfileOut( __METHOD__ . '-formatting' );

		// Generate offset if necessary
		if ( !$unreadFirst ) {
			if ( count( $result['list'] ) > $limit ) {
				$lastItem = array_pop( $result['list'] );
				$result['continue'] = $lastItem['timestamp']['utcunix'] . '|' . $lastItem['id'];
			}
		}

		return $result;
	}

	/**
	 * Internal helper method for getting property 'count' data
	 * @param User $user
	 * @param string[] $sections
	 * @param boolean $groupBySection
	 * @return array
	 */
	protected function getPropCount( User $user, array $sections, $groupBySection ) {
		$result = array();
		$notifUser = MWEchoNotifUser::newFromUser( $user );
		// Always get total count
		$rawCount = $notifUser->getNotificationCount();
		$result['rawcount'] = $rawCount;
		$result['count'] = EchoNotificationController::formatNotificationCount( $rawCount );

		if ( $groupBySection ) {
			foreach ( $sections as $section ) {
				$rawCount = $notifUser->getNotificationCount( /* $tryCache = */true, DB_SLAVE, $section );
				$result[$section]['rawcount'] = $rawCount;
				$result[$section]['count'] = EchoNotificationController::formatNotificationCount( $rawCount );
			}
		}

		return $result;
	}

	/**
	 * Internal helper method for getting property 'index' data
	 * @param array $list
	 * @return array
	 */
	protected function getPropIndex( $list ) {
		$result = array();
		foreach ( array_keys( $list ) as $key ) {
			// Don't include the XML tag name ('_element' key)
			if ( $key != '_element' ) {
				$result[] = $key;
			}
		}

		return $result;
	}

	public function getAllowedParams() {
		$sections = EchoAttributeManager::$sections;
		$params = array(
			'prop' => array(
				ApiBase::PARAM_ISMULTI => true,
				ApiBase::PARAM_TYPE => array(
					'list',
					'count',
					'index',
				),
				ApiBase::PARAM_DFLT => 'list',
			),
			'sections' => array(
				ApiBase::PARAM_DFLT => implode( '|', $sections ),
				ApiBase::PARAM_TYPE => $sections,
				ApiBase::PARAM_ISMULTI => true,
			),
			'groupbysection' => array(
				ApiBase::PARAM_TYPE => 'boolean',
				ApiBase::PARAM_DFLT => false,
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
			'continue' => array(
				/** @todo Once support for MediaWiki < 1.25 is dropped, just use ApiBase::PARAM_HELP_MSG directly */
				constant( 'ApiBase::PARAM_HELP_MSG' ) ?: '' => 'api-help-param-continue',
			),
		);
		foreach ( $sections as $section ) {
			$params[$section . 'continue'] = null;
			$params[$section . 'unreadfirst'] = array(
				ApiBase::PARAM_TYPE => 'boolean',
				ApiBase::PARAM_DFLT => false,
			);
		}

		return $params;
	}

	/**
	 * @deprecated since MediaWiki core 1.25
	 */
	public function getParamDescription() {
		return array(
			'prop' => 'Details to request.',
			'sections' => 'The notification sections to query (i.e. some combination of \'alert\' and \'message\').',
			'groupbysection' => 'Whether to group the result by section, each section is fetched separately if set',
			'format' => 'If specified, notifications will be returned formatted this way.',
			'index' => 'If specified, a list of notification IDs, in order, will be returned.',
			'limit' => 'The maximum number of notifications to return.',
			'continue' => 'When more results are available, use this to continue, this is used only when groupbysection is not set.',
			'alertcontinue' => 'When more alert results are available, use this to continue.',
			'messagecontinue' => 'When more message results are available, use this to continue.',
			'alertunreadfirst' => 'Whether to show unread message notifications first',
			'messageunreadfirst' => 'Whether to show unread alert notifications first'
		);
	}

	/**
	 * @deprecated since MediaWiki core 1.25
	 */
	public function getDescription() {
		return 'Get notifications waiting for the current user';
	}

	/**
	 * @deprecated since MediaWiki core 1.25
	 */
	public function getExamples() {
		return array(
			'api.php?action=query&meta=notifications',
			'api.php?action=query&meta=notifications&notprop=count&notsections=alert|message&notgroupbysection=1',
		);
	}

	/**
	 * @see ApiBase::getExamplesMessages()
	 */
	protected function getExamplesMessages() {
		return array(
			'action=query&meta=notifications'
				=> 'apihelp-query+notifications-example-1',
			'action=query&meta=notifications&notprop=count&notsections=alert|message&notgroupbysection=1'
				=> 'apihelp-query+notifications-example-2',
		);
	}

	public function getHelpUrls() {
		return 'https://www.mediawiki.org/wiki/Echo_(Notifications)/API';
	}
}
