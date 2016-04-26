<?php

class ApiEchoNotifications extends ApiQueryBase {
	/**
	 * @var EchoForeignNotifications
	 */
	protected $foreignNotifications;

	/**
	 * @var bool
	 */
	protected $crossWikiSummary = false;

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

		/* @deprecated */
		if ( $params['format'] === 'flyout' ) {
			$this->setWarning(
				"notformat=flyout has been deprecated and will be removed soon.\n".
				"Use notformat=model to get the raw data or notformat=special\n".
				"for pre-rendered HTML."
			);
		} elseif ( $params['format'] === 'html' ) {
			$this->setWarning(
				"notformat=html has been deprecated and will be removed soon.\n".
				"Use notformat=special instead."
			);
		}

		$this->foreignNotifications = new EchoForeignNotifications( $user );
		$this->crossWikiSummary = $params['crosswikisummary'];

		$result = array();
		if ( in_array( 'list', $prop ) ) {
			// Group notification results by section
			if ( $params['groupbysection'] ) {
				foreach ( $params['sections'] as $section ) {
					$result[$section] = $this->getSectionPropList(
						$user, $section, $params['filter'], $params['limit'],
						$params[$section . 'continue'], $params['format'], $params[$section . 'unreadfirst']
					);

					if ( $this->crossWikiSummary && $this->foreignNotifications->getCount( $section ) > 0 ) {
						// insert fake notification for foreign notifications
						array_unshift( $result[$section]['list'], $this->makeForeignNotification( $user, $params['format'], $section ) );
					}

					$this->getResult()->setIndexedTagName( $result[$section]['list'], 'notification' );
				}
			} else {
				$attributeManager = EchoAttributeManager::newFromGlobalVars();
				$result = $this->getPropList(
					$user,
					$attributeManager->getUserEnabledEventsbySections( $user, 'web', $params['sections'] ),
					$params['filter'], $params['limit'], $params['continue'], $params['format'], $params['unreadfirst']
				);

				// if exactly 1 section is specified, we consider only that section, otherwise
				// we pass 'null' to consider all foreign notifications
				$section = count( $params['sections'] ) === 1 ? reset( $params['sections'] ) : null;
				if ( $this->crossWikiSummary && $this->foreignNotifications->getCount( $section ) > 0 ) {
					array_unshift( $result['list'], $this->makeForeignNotification( $user, $params['format'], $section ) );
				}

				$this->getResult()->setIndexedTagName( $result['list'], 'notification' );
			}
		}

		if ( in_array( 'count', $prop ) ) {
			$result = array_merge_recursive(
				$result,
				$this->getPropCount( $user, $params['sections'], $params['groupbysection'] )
			);
		}

		$this->getResult()->setIndexedTagName( $result, 'notification' );
		$this->getResult()->addValue( 'query', $this->getModuleName(), $result );
	}

	/**
	 * Internal method for getting the property 'list' data for individual section
	 * @param User $user
	 * @param string $section 'alert' or 'message'
	 * @param string $filter 'all', 'read' or 'unread'
	 * @param int $limit
	 * @param string $continue
	 * @param string $format
	 * @param boolean $unreadFirst
	 * @return array
	 */
	protected function getSectionPropList( User $user, $section, $filter, $limit, $continue, $format, $unreadFirst = false ) {
		$attributeManager = EchoAttributeManager::newFromGlobalVars();
		$sectionEvents = $attributeManager->getUserEnabledEventsbySections( $user, 'web', array( $section ) );

		if ( !$sectionEvents ) {
			$result = array(
				'list' => array(),
				'continue' => null
			);
		} else {
			$result = $this->getPropList(
				$user, $sectionEvents, $filter, $limit, $continue, $format, $unreadFirst
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
	 * @param string $filter 'all', 'read' or 'unread'
	 * @param int $limit
	 * @param string $continue
	 * @param string $format
	 * @param boolean $unreadFirst
	 * @return array
	 */
	protected function getPropList( User $user, array $eventTypes, $filter, $limit, $continue, $format, $unreadFirst = false ) {
		$result = array(
			'list' => array(),
			'continue' => null
		);

		$notifMapper = new EchoNotificationMapper();

		// check if we want both read & unread...
		if ( in_array( 'read', $filter ) && in_array( '!read', $filter ) ) {
			// Prefer unread notifications. We don't care about next offset in this case
			if ( $unreadFirst ) {
				// query for unread notifications past 'continue' (offset)
				$notifs = $notifMapper->fetchUnreadByUser( $user, $limit + 1, $continue, $eventTypes );

				/*
				 * 'continue' has a timestamp & id (to start with, in case
				 * there would be multiple events with that same timestamp)
				 * Unread notifications should always load first, but may be
				 * older than read ones, but we can work with current
				 * 'continue' format:
				 * * if there's no continue, first load unread notifications
				 * * if there's a continue, fetch unread notifications first
				 * * if there are no unread ones, continue must've been
				 *   about read notifications: fetch 'em
				 * * if there are unread ones but first one doesn't match
				 *   continue id, it must've been about read notifications:
				 *   discard unread & fetch read
				 */
				if ( $notifs && $continue ) {
					/** @var EchoNotification $first */
					$first = reset( $notifs );
					$continueId = intval( trim( strrchr( $continue, '|' ), '|' ) );
					if ( $first->getEvent()->getID() !== $continueId ) {
						// notification doesn't match continue id, it must've been
						// about read notifications: discard all unread ones
						$notifs = array();
					}
				}

				// If there are less unread notifications than we requested,
				// then fill the result with some read notifications
				$count = count( $notifs );
				// we need 1 more than $limit, so we can respond 'continue'
				if ( $count <= $limit ) {
					// Query planner should be smart enough that passing a short list of ids to exclude
					// will only visit at most that number of extra rows.
					$mixedNotifs = $notifMapper->fetchByUser(
						$user,
						$limit - $count + 1,
						// if there were unread notifications, 'continue' was for
						// unread notifications and we should start fetching read
						// notifications from start
						$count > 0 ? null : $continue,
						$eventTypes,
						array_keys( $notifs )
					);
					foreach ( $mixedNotifs as $notif ) {
						$notifs[$notif->getEvent()->getId()] = $notif;
					}
				}
			} else {
				$notifs = $notifMapper->fetchByUser( $user, $limit + 1, $continue, $eventTypes );
			}
		} elseif ( in_array( 'read', $filter ) ) {
			$notifs = $notifMapper->fetchReadByUser( $user, $limit + 1, $continue, $eventTypes );
		} else { // = if ( in_array( '!read', $filter ) ) {
			$notifs = $notifMapper->fetchUnreadByUser( $user, $limit + 1, $continue, $eventTypes );
		}

		foreach ( $notifs as $notif ) {
			$output = EchoDataOutputFormatter::formatOutput( $notif, $format, $user, $this->getLanguage() );
			if ( $output !== false ) {
				$result['list'][] = $output;
			}
		}

		// Generate offset if necessary
		if ( count( $result['list'] ) > $limit ) {
			$lastItem = array_pop( $result['list'] );
			$result['continue'] = $lastItem['timestamp']['utcunix'] . '|' . $lastItem['id'];
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
		if ( $this->crossWikiSummary ) {
			$rawCount += $this->foreignNotifications->getCount();
		}
		$result['rawcount'] = $rawCount;
		$result['count'] = EchoNotificationController::formatNotificationCount( $rawCount );

		if ( $groupBySection ) {
			foreach ( $sections as $section ) {
				$rawCount = $notifUser->getNotificationCount( /* $tryCache = */true, DB_SLAVE, $section );
				if ( $this->crossWikiSummary ) {
					$rawCount += $this->foreignNotifications->getCount( $section );
				}
				$result[$section]['rawcount'] = $rawCount;
				$result[$section]['count'] = EchoNotificationController::formatNotificationCount( $rawCount );
			}
		}

		return $result;
	}

	protected function makeForeignNotification( User $user, $format, $section = null ) {
		$wikis = $this->foreignNotifications->getWikis( $section );
		$count = $this->foreignNotifications->getCount( $section );

		// Sort wikis by timestamp, in descending order (newest first)
		usort( $wikis, function ( $a, $b ) use ( $section ) {
			$aTimestamp = $this->foreignNotifications->getWikiTimestamp( $a, $section ) ?: new MWTimestamp( 0 );
			$bTimestamp = $this->foreignNotifications->getWikiTimestamp( $b, $section ) ?: new MWTimestamp( 0 );
			return $bTimestamp->getTimestamp( TS_UNIX ) - $aTimestamp->getTimestamp( TS_UNIX );
		} );

		$row = new StdClass;
		$row->event_id = -1;
		$row->event_type = 'foreign';
		$row->event_variant = null;
		$row->event_agent_id = $user->getId();
		$row->event_agent_ip = null;
		$row->event_page_id = null;
		$row->event_page_namespace = null;
		$row->event_page_title = null;
		$row->event_extra = serialize( array(
			'section' => $section ?: 'all',
			'wikis' => $wikis,
			'count' => $count
		) );

		$row->notification_user = $user->getId();
		$row->notification_timestamp = $this->foreignNotifications->getTimestamp( $section );
		$row->notification_read_timestamp = null;
		$row->notification_bundle_base = 1;
		$row->notification_bundle_hash = md5( 'bogus' );
		$row->notification_bundle_display_hash = md5( 'also-bogus' );

		// Format output like any other notification
		$notif = EchoNotification::newFromRow( $row );
		$output = EchoDataOutputFormatter::formatOutput( $notif, $format, $user, $this->getLanguage() );

		// Add cross-wiki-specific data
		$output['section'] = $section ?: 'all';
		$output['count'] = $count;
		$output['sources'] = $this->foreignNotifications->getApiEndpoints( $wikis );
		// Add timestamp information
		foreach ( $output['sources'] as $wiki => &$data ) {
			$data['ts'] = $this->foreignNotifications->getWikiTimestamp( $wiki, $section )->getTimestamp( TS_MW );
		}
		return $output;
	}

	public function getAllowedParams() {
		$sections = EchoAttributeManager::$sections;
		$params = array(
			'filter' => array(
				ApiBase::PARAM_ISMULTI => true,
				ApiBase::PARAM_DFLT => 'read|!read',
				ApiBase::PARAM_TYPE => array(
					'read',
					'!read',
				),
			),
			'prop' => array(
				ApiBase::PARAM_ISMULTI => true,
				ApiBase::PARAM_TYPE => array(
					'list',
					'count',
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
					'model',
					'special',
					'flyout', /* @deprecated */
					'html', /* @deprecated */
				),
				ApiBase::PARAM_HELP_MSG_PER_VALUE => array(),
			),
			// create "x notifications from y wikis" notification bundle &
			// include unread counts from other wikis in prop=count results
			'crosswikisummary' => array(
				ApiBase::PARAM_TYPE => 'boolean',
				ApiBase::PARAM_DFLT => false,
			),
			'limit' => array(
				ApiBase::PARAM_TYPE => 'limit',
				ApiBase::PARAM_DFLT => 20,
				ApiBase::PARAM_MIN => 1,
				ApiBase::PARAM_MAX => ApiBase::LIMIT_SML1,
				ApiBase::PARAM_MAX2 => ApiBase::LIMIT_SML2,
			),
			'continue' => array(
				ApiBase::PARAM_HELP_MSG => 'api-help-param-continue',
			),
			'unreadfirst' => array(
				ApiBase::PARAM_TYPE => 'boolean',
				ApiBase::PARAM_DFLT => false,
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
