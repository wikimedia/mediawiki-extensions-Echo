<?php

use MediaWiki\Logger\LoggerFactory;

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
	 * @return array
	 * @throws Exception
	 */
	protected function getFromForeign() {
		$reqs = $this->getForeignRequestParams( $this->getRequestedForeignWikis() );

		return $this->foreignRequests( $reqs );
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
		$wikis = isset( $params['wikis'] ) ? $params['wikis'] : array( wfWikiID() );

		if ( array_search( '*', $wikis ) !== false ) {
			// expand `*` to all foreign wikis with unread notifications + local
			$wikis = array_merge(
				array( wfWikiID() ),
				$this->getForeignWikisWithUnreadNotifications()
			);
		}

		if ( !$this->allowCrossWikiNotifications() ) {
			// exclude foreign wikis if x-wiki is not enabled
			$wikis = array_intersect_key( array( wfWikiID() ), $wikis );
		}

		return $wikis;
	}

	/**
	 * @return array Wiki names
	 */
	protected function getRequestedForeignWikis() {
		return array_diff( $this->getRequestedWikis(), array( wfWikiId() ) );
	}

	/**
	 * @return array Wiki names
	 */
	protected function getForeignWikisWithUnreadNotifications() {
		return $this->foreignNotifications->getWikis();
	}

	/**
	 * @param User $user
	 * @return string
	 */
	protected function getCentralAuthToken( User $user ) {
		$context = new RequestContext;
		$context->setRequest( new FauxRequest( array( 'action' => 'centralauthtoken' ) ) );
		$context->setUser( $user );

		$api = new ApiMain( $context );
		$api->execute();

		return $api->getResult()->getResultData( array( 'centralauthtoken', 'centralauthtoken' ) );
	}

	/**
	 * @param array $wikis Wiki names
	 * @return array
	 */
	protected function getForeignRequestParams( array $wikis ) {
		$apis = $this->foreignNotifications->getApiEndpoints( $wikis );
		if ( !$apis ) {
			return array();
		}

		$reqs = array();
		foreach ( $apis as $wiki => $api ) {
			$reqs[$wiki] = array(
				'method' => 'GET',
				'url' => $api['url'],
				'query' => $this->getForeignQueryParams( $wiki ),
			);
		}

		return $reqs;
	}

	/**
	 * @param string $wiki Wiki name
	 * @return array
	 */
	protected function getForeignQueryParams( $wiki ) {
		// use original request params, to forward them to individual wikis
		$params = $this->getRequest()->getValues();

		return array(
			'centralauthtoken' => $this->getCentralAuthToken( $this->getUser() ),
			// once all the results are gathered & merged, they'll be output in the
			// user requested format
			// but this is going to be an internal request & we don't want those
			// results in the format the user requested but in a fixed format that
			// we can interpret here
			'format' => 'json',
			// Only request data from that specific wiki, or they'd all spawn
			// cross-wiki api requests...
			$this->getModulePrefix() . 'wikis' => $wiki,
		) + $params;
	}

	/**
	 * @param array $reqs API request params
	 * @return array
	 * @throws Exception
	 */
	protected function foreignRequests( array $reqs ) {
		$http = new MultiHttpClient( array() );
		$responses = $http->runMulti( $reqs );

		$results = array();
		foreach ( $responses as $wiki => $response ) {
			$statusCode = $response['response']['code'];

			if ( $statusCode >= 200 && $statusCode <= 299 ) {
				$parsed = json_decode( $response['response']['body'], true );
				if ( $parsed ) {
					$results[$wiki] = $parsed;
				}
			}

			if ( !isset( $results[$wiki] ) ) {
				LoggerFactory::getInstance( 'Echo' )->warning(
					'Failed to fetch {module} from {wiki}. Response: {code} {response}',
					array(
						'module' => $this->getModuleName(),
						'wiki' => $wiki,
						'code' => $response['response']['code'],
						'response' => $response['response']['body'],
					)
				);
			}
		}

		return $results;
	}

	/**
	 * @return array
	 */
	public function getAllowedParams() {
		global $wgConf;

		$params = array();

		if ( $this->allowCrossWikiNotifications() ) {
			$params += array(
				// fetch notifications from multiple wikis
				'wikis' => array(
					ApiBase::PARAM_ISMULTI => true,
					ApiBase::PARAM_DFLT => wfWikiId(),
					// `*` will let you immediately fetch from all wikis that have
					// unread notifications, without having to look them up first
					ApiBase::PARAM_TYPE => array_unique( array_merge( $wgConf->wikis, array( wfWikiId(), '*' ) ) ),
				),
			);
		}

		return $params;
	}
}
