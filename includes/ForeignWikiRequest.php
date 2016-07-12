<?php

use MediaWiki\Logger\LoggerFactory;

class EchoForeignWikiRequest {

	/**
	 * @param User   $user      User object
	 * @param array  $params    Request parameters
	 * @param array  $wikis     Wikis to send the request to
	 * @param string $wikiParam Parameter name to set to the name of the wiki
	 */
	public function __construct( User $user, array $params, array $wikis, $wikiParam = null ) {
		$this->user = $user;
		$this->params = $params;
		$this->wikis = $wikis;
		$this->wikiParam = $wikiParam;
	}

	/**
	 * Execute the request
	 * @return array [ wiki => result ]
	 */
	public function execute() {
		if ( !$this->isUserGlobal() ) {
			return array();
		}

		$reqs = $this->getRequestParams();
		return $this->doRequests( $reqs );
	}

	protected function isUserGlobal() {
		$lookup = CentralIdLookup::factory();
		$id = $lookup->centralIdFromLocalUser( $this->user, CentralIdLookup::AUDIENCE_RAW );
		return $id !== 0;
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
	 * @return array
	 */
	protected function getRequestParams() {
		$apis = EchoForeignNotifications::getApiEndpoints( $this->wikis );
		if ( !$apis ) {
			return array();
		}

		$reqs = array();
		foreach ( $apis as $wiki => $api ) {
			$reqs[$wiki] = array(
				'method' => 'GET',
				'url' => $api['url'],
				'query' => $this->getQueryParams( $wiki ),
			);
		}

		return $reqs;
	}

	/**
	 * @param string $wiki Wiki name
	 * @return array
	 */
	protected function getQueryParams( $wiki ) {
		$extraParams = array();
		if ( $this->wikiParam ) {
			// Only request data from that specific wiki, or they'd all spawn
			// cross-wiki api requests...
			$extraParams[$this->wikiParam] = $wiki;
		}

		return array(
			'centralauthtoken' => $this->getCentralAuthToken( $this->user ),
			// once all the results are gathered & merged, they'll be output in the
			// user requested format
			// but this is going to be an internal request & we don't want those
			// results in the format the user requested but in a fixed format that
			// we can interpret here
			'format' => 'json',
		) + $extraParams + $this->params;
	}

	/**
	 * @param array $reqs API request params
	 * @return array
	 * @throws Exception
	 */
	protected function doRequests( array $reqs ) {
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
					'Failed to fetch API response from {wiki}. Error code {code}',
					array(
						'wiki' => $wiki,
						'code' => $response['response']['code'],
						'response' => $response['response']['body'],
						'request' => $reqs[$wiki],
					)
				);
			}
		}

		return $results;
	}
}
