<?php

/**
 * Database factory class, this will determine whether to use the main database
 * or an external database defined in configuration file
 */
class MWEchoDbFactory {

	/**
	 * The wiki to access the database for
	 * @var string|bool
	 */
	protected $wiki;

	/**
	 * The cluster for the database
	 * @var string|bool
	 */
	protected $cluster;

	/**
	 * @param string|bool
	 * @param string|bool
	 */
	public function __construct( $cluster = false, $wiki = false ) {
		$this->cluster = $cluster;
		$this->wiki = $wiki;
	}

	/**
	 * Create a db factory instance from default Echo configuration
	 * @return MWEchoDbFactory
	 */
	public static function newFromDefault() {
		global $wgEchoCluster;
		return new self( $wgEchoCluster );
	}

	/**
	 * Get the database load balancer
	 * @param $wiki string|bool The wiki ID, or false for the current wiki
	 * @return LoadBalancer
	 */
	protected function getLB() {
		// Use the external db defined for Echo
		if ( $this->cluster ) {
			$lb = wfGetLBFactory()->getExternalLB( $this->cluster, $this->wiki );
		} else {
			$lb = wfGetLB( $this->wiki );
		}

		return $lb;
	}

	/**
	 * Get the database connection for Echo
	 * @param $db int Index of the connection to get
	 * @param $groups mixed Query groups.
	 * @return DatabaseBase
	 */
	public function getEchoDb( $db, $groups = array() ) {
		return $this->getLB()->getConnection( $db, $groups, $this->wiki );
	}

	/**
	 * Wrapper function for wfGetDB
	 * @deprecated Use newFromDefault() instead to create a db factory
	 * @param $db int Index of the connection to get
	 * @param $groups mixed Query groups.
	 * @param $wiki string|bool The wiki ID, or false for the current wiki
	 * @return DatabaseBase
	 */
	public static function getDB( $db, $groups = array(), $wiki = false ) {
		global $wgEchoCluster;

		// Use the external db defined for Echo
		if ( $wgEchoCluster ) {
			$lb = wfGetLBFactory()->getExternalLB( $wgEchoCluster, $wiki );
		} else {
			$lb = wfGetLB( $wiki );
		}

		return $lb->getConnection( $db, $groups, $wiki );

	}

}
