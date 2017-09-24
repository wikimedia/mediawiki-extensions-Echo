<?php

abstract class ApiCrossWikiBase extends ApiQueryBase {
	/**
	 * @var EchoForeignNotifications
	 */
	protected $foreignNotifications;

	/**
	 * @param ApiQuery $queryModule
	 * @param string $moduleName
	 * @param string $paramPrefix
	 */
	public function __construct( ApiQuery $queryModule, $moduleName, $paramPrefix = '' ) {
		parent::__construct( $queryModule, $moduleName, $paramPrefix );

		$this->foreignNotifications = new EchoForeignNotifications( $this->getUser() );
	}

	/**
	 * This will turn the current API call (with all of it's params) and execute
	 * it on all foreign wikis, returning an array of results per wiki.
	 *
	 * @param array $wikis List of wikis to query. Defaults to the result of getRequestedForeignWikis().
	 * @param array $paramOverrides Request parameter overrides
	 * @return array
	 * @throws Exception
	 */
	protected function getFromForeign( $wikis = null, array $paramOverrides = [] ) {
		$foreignReq = new EchoForeignWikiRequest(
			$this->getUser(),
			$paramOverrides + $this->getForeignQueryParams(),
			$wikis !== null ? $wikis : $this->getRequestedForeignWikis(),
			$this->getModulePrefix() . 'wikis'
		);
		return $foreignReq->execute();
	}

	/**
	 * Get the query parameters to use for the foreign API requests.
	 * Subclasses should override this if they need to customize the
	 * parameters.
	 * @return array Query parameters
	 */
	protected function getForeignQueryParams() {
		return $this->getRequest()->getValues();
	}

	/**
	 * @return bool
	 */
	protected function allowCrossWikiNotifications() {
		global $wgEchoCrossWikiNotifications;
		return $wgEchoCrossWikiNotifications;
	}

	/**
	 * This is basically equivalent to $params['wikis'], but some added checks:
	 * - `*` will expand to "all wikis with unread notifications"
	 * - if `$wgEchoCrossWikiNotifications` is off, foreign wikis will be excluded
	 *
	 * @return array
	 */
	protected function getRequestedWikis() {
		$params = $this->extractRequestParams();

		// if wiki is omitted from params, that's because crosswiki is/was not
		// available, and it'll default to current wiki
		$wikis = isset( $params['wikis'] ) ? $params['wikis'] : [ wfWikiID() ];

		if ( array_search( '*', $wikis ) !== false ) {
			// expand `*` to all foreign wikis with unread notifications + local
			$wikis = array_merge(
				[ wfWikiID() ],
				$this->getForeignWikisWithUnreadNotifications()
			);
		}

		if ( !$this->allowCrossWikiNotifications() ) {
			// exclude foreign wikis if x-wiki is not enabled
			$wikis = array_intersect_key( [ wfWikiID() ], $wikis );
		}

		return $wikis;
	}

	/**
	 * @return array Wiki names
	 */
	protected function getRequestedForeignWikis() {
		return array_diff( $this->getRequestedWikis(), [ wfWikiID() ] );
	}

	/**
	 * @return array Wiki names
	 */
	protected function getForeignWikisWithUnreadNotifications() {
		return $this->foreignNotifications->getWikis();
	}

	/**
	 * @return array
	 */
	public function getAllowedParams() {
		global $wgConf;

		$params = [];

		if ( $this->allowCrossWikiNotifications() ) {
			$params += [
				// fetch notifications from multiple wikis
				'wikis' => [
					ApiBase::PARAM_ISMULTI => true,
					ApiBase::PARAM_DFLT => wfWikiID(),
					// `*` will let you immediately fetch from all wikis that have
					// unread notifications, without having to look them up first
					ApiBase::PARAM_TYPE => array_unique( array_merge( $wgConf->wikis, [ wfWikiID(), '*' ] ) ),
				],
			];
		}

		return $params;
	}
}
