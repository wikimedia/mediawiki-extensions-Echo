<?php

class ApiEchoUnreadNotificationPages extends ApiCrossWikiBase {
	/**
	 * @var bool
	 */
	protected $crossWikiSummary = false;

	/**
	 * @param ApiQuery $query
	 * @param string $moduleName
	 */
	public function __construct( $query, $moduleName ) {
		parent::__construct( $query, $moduleName, 'unp' );
	}

	/**
	 * @throws UsageException
	 */
	public function execute() {
		// To avoid API warning, register the parameter used to bust browser cache
		$this->getMain()->getVal( '_' );

		if ( $this->getUser()->isAnon() ) {
			$this->dieUsage( 'Login is required', 'login-required' );
		}

		$params = $this->extractRequestParams();

		$result = array();
		if ( in_array( wfWikiID(), $this->getRequestedWikis() ) ) {
			$result[wfWikiID()] = $this->getFromLocal( $params['limit'] );
		}

		if ( $this->getRequestedForeignWikis() ) {
			$result += $this->getFromForeign();
		}

		$apis = $this->foreignNotifications->getApiEndpoints( $this->getRequestedWikis() );
		foreach ( $result as $wiki => $data ) {
			$result[$wiki]['source'] = $apis[$wiki];
			$result[$wiki]['pages'] = $data['pages'] ?: array();
		}

		$this->getResult()->addValue( 'query', $this->getModuleName(), $result );
	}

	/**
	 * @param int $limit
	 * @return array
	 */
	protected function getFromLocal( $limit ) {
		$dbr = MWEchoDbFactory::newFromDefault()->getEchoDb( DB_SLAVE );
		$rows = $dbr->select(
			array( 'echo_event', 'echo_notification' ),
			array( 'event_page_id', 'count' => 'COUNT(*)' ),
			array(
				'notification_user' => $this->getUser()->getId(),
				'notification_read_timestamp' => null,
				'event_page_id IS NOT NULL',
				'event_deleted' => 0,
			),
			__METHOD__,
			array(
				'GROUP BY' => 'event_page_id',
				'ORDER BY' => 'count DESC',
				'LIMIT' => $limit,
			),
			array( 'echo_notification' => array( 'INNER JOIN', 'notification_event = event_id' ) )
		);

		if ( $rows === false ) {
			return array();
		}

		$pages = array();
		foreach ( $rows as $row ) {
			$pages[$row->event_page_id] = $row->count;
		}

		$result = array();
		$titles = Title::newFromIDs( array_keys( $pages ) );
		foreach ( $titles as $title ) {
			$result[] = array(
				'title' => $title->getPrefixedText(),
				'count' => $pages[$title->getArticleID()],
			);
		}

		return array(
			'pages' => $result,
			'totalCount' => MWEchoNotifUser::newFromUser( $this->getUser() )->getLocalNotificationCount(),
		);
	}

	/**
	 * @return array
	 */
	protected function getFromForeign() {
		$result = array();
		foreach ( parent::getFromForeign() as $wiki => $data ) {
			$result[$wiki] = $data['query'][$this->getModuleName()][$wiki];
		}

		return $result;
	}

	/**
	 * @return array
	 */
	public function getAllowedParams() {
		global $wgEchoMaxUpdateCount;

		return parent::getAllowedParams() + array(
			'limit' => array(
				ApiBase::PARAM_TYPE => 'limit',
				ApiBase::PARAM_DFLT => 20,
				ApiBase::PARAM_MIN => 1,
				ApiBase::PARAM_MAX => $wgEchoMaxUpdateCount,
				ApiBase::PARAM_MAX2 => $wgEchoMaxUpdateCount,
			),
			// there is no `offset` or `continue` value: the set of possible
			// notifications is small enough to allow fetching all of them at
			// once, and any sort of fetching would be unreliable because
			// they're sorted based on count of notifications, which could
			// change in between requests
		);
	}

	/**
	 * @see ApiBase::getExamplesMessages()
	 */
	protected function getExamplesMessages() {
		return array(
			'action=query&meta=unreadnotificationpages' => 'apihelp-query+unreadnotificationpages-example-1',
		);
	}

	public function getHelpUrls() {
		return 'https://www.mediawiki.org/wiki/Echo_(Notifications)/API';
	}
}
