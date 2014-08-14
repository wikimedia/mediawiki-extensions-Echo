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
			} else {
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
			}
		}

		if ( in_array( 'count', $prop ) ) {
			$result = array_merge_recursive(
				$result,
				$this->getPropcount( $user, $params['sections'], $params['groupbysection'] )
			);
		}

		$this->getResult()->setIndexedTagName( $result, 'notification' );
		$this->getResult()->addValue( 'query', $this->getModuleName(), $result );
	}

	/**
	 * Internal method for getting the property 'list' data for individual section
	 * @param User $user
	 * @param string $section
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
		// Some section like 'message' only has flow notifications, which most wikis and
		// users don't have, we should skip the query in such case
		if ( !$sectionEvents || !$notifUser->shouldQuerySectionData( $section ) ) {
			$result = array(
				'list' => array(),
				'continue' => null
			);
		} else {
			$result = $this->getPropList(
				$user, $sectionEvents, $limit, $continue, $format, $unreadFirst
			);
			// If events exist for applicable section we should set the section status
			// in cache to check whether a query should be triggered in later request.
			// This is mostly for users who don't have 'message' notifications
			if ( $sectionEvents ) {
				$notifUser->setSectionStatusCache( $section, count( $result['list'] ) );
			}
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

		// Unread notifications + possbile 3 read notification depending on result number
		// We don't care about next offset in this case
		if ( $unreadFirst ) {
			$notifs = $notifMapper->fetchUnreadByUser( $user, $limit, $eventTypes );
			// If there are less unread notifications than we requested,
			// then fill the result with some read notifications
			$count = count( $notifs );
			if ( $count < $limit ) {
				// We could add another function for "notification_read_timestamp is not null"
				// but it's probably not good to add negation condition to a query
				$mixedNotifs = $notifMapper->fetchByUser( $user, $count + 3, null, $eventTypes );
				foreach ( $mixedNotifs as $notif ) {
					if ( !isset( $notifs[$notif->getEvent()->getId()] ) ) {
						if ( $count >= $limit ) {
							break;
						}
						$count++;
						$notifs[$notif->getEvent()->getId()] = $notif;
					}
				}
			}
		} else {
			$notifs = $notifMapper->fetchByUser( $user, $limit + 1, $continue, $eventTypes );
		}
		foreach ( $notifs as $notif ) {
			$result['list'][$notif->getEvent()->getID()] = EchoDataOutputFormatter::formatOutput( $notif, $format, $user );
		}

		return $result;
	}

	/**
	 * Internal helper method for getting property 'count' data
	 * @param User $user
	 * @param string[] $sections
	 * @param boolean $groupBySection
	 * @return aray
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
			'continue' => null,
			'uselang' => null
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

	public function getParamDescription() {
		return array(
			'prop' => 'Details to request.',
			'sections' => 'The notification sections to query.',
			'groupbysection' => 'Whether to group the result by section, each section is fetched separately if set',
			'format' => 'If specified, notifications will be returned formatted this way.',
			'index' => 'If specified, a list of notification IDs, in order, will be returned.',
			'limit' => 'The maximum number of notifications to return.',
			'continue' => 'When more results are available, use this to continue, this is used only when groupbysection is not set.',
			'alertcontinue' => 'When more alert results are available, use this to continue.',
			'messagecontinue' => 'When more message results are available, use this to continue.',
			'uselang' => 'the desired language to format the output',
			'alertunreadfirst' => 'Whether to show unread message notifications first',
			'messageunreadfirst' => 'Whether to show unread alert notifications first'
		);
	}

	public function getDescription() {
		return 'Get notifications waiting for the current user';
	}

	public function getExamples() {
		return array(
			'api.php?action=query&meta=notifications',
			'api.php?action=query&meta=notifications&notprop=count&notsections=alert|message&notgroupbysection=1',
		);
	}

	public function getHelpUrls() {
		return 'https://www.mediawiki.org/wiki/Echo_(Notifications)/API';
	}
}
