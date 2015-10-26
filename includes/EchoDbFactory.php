<?php

/**
 * Database factory class, this will determine whether to use the main database
 * or an external database defined in configuration file
 */
class MWEchoDbFactory {

	/**
	 * The cluster for the database
	 * @var string|bool
	 */
	private $cluster;

	private $shared;

	private $sharedCluster;

	/**
	 * @param string|bool $cluster
	 * @param string|bool $shared
	 * @param string|bool $sharedCluster
	 */
	public function __construct( $cluster = false, $shared = false, $sharedCluster = false ) {
		$this->cluster = $cluster;
		$this->shared = $shared;
		$this->sharedCluster = $sharedCluster;
	}

	/**
	 * Create a db factory instance from default Echo configuration
	 * A singleton is not necessary because it's actually handled
	 * inside core database object
	 *
	 * @return MWEchoDbFactory
	 */
	public static function newFromDefault() {
		global $wgEchoCluster, $wgEchoSharedTrackingDB, $wgEchoSharedTrackingCluster;

		return new self( $wgEchoCluster, $wgEchoSharedTrackingDB, $wgEchoSharedTrackingCluster );
	}

	/**
	 * Get the database load balancer
	 * @return LoadBalancer
	 */
	protected function getLB() {
		// Use the external db defined for Echo
		if ( $this->cluster ) {
			$lb = wfGetLBFactory()->getExternalLB( $this->cluster );
		} else {
			$lb = wfGetLB();
		}

		return $lb;
	}

	/**
	 * @return LoadBalancer
	 */
	protected function getSharedLB() {
		if ( $this->sharedCluster ) {
			$lb = wfGetLBFactory()->getExternalLB( $this->sharedCluster );
		} else {
			$lb = wfGetLB();
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
		return $this->getLB()->getConnection( $db, $groups );
	}

	/**
	 * @param $db int Index of the connection to get
	 * @param array $groups Query groups
	 * @return bool|DatabaseBase false if no shared db is configured
	 */
	public function getSharedDb( $db, $groups = array() ) {
		if ( !$this->shared ) {
			return false;
		}

		return $this->getSharedLB()->getConnection( $db, $groups, $this->shared );
	}



	/**
	 * Wrapper function for wfGetDB, some extensions like MobileFrontend is
	 * using this to issue sql queries against Echo database directly.  This
	 * is totally not accepted and should be updated to use Echo database access
	 * objects
	 *
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

	/**
	 * Wait for the slaves of the database
	 */
	public function waitForSlaves() {
		$this->waitFor( $this->getMasterPosition() );
	}

	/**
	 * Get the current master position for the wiki and echo
	 * db when they have at least one slave in their cluster.
	 *
	 * @return array
	 */
	public function getMasterPosition() {
		$position = array(
			'wikiDb' => false,
			'echoDb' => false,
		);
		$lb = wfGetLB();
		if ( $lb->getServerCount() > 1 ) {
			$position['wikiDb'] = $lb->getMasterPos();
		};

		if ( $this->cluster ) {
			$lb = $this->getLB();
			if ( $lb->getServerCount() > 1 ) {
				$position['echoDb'] = $lb->getMasterPos();
			}
		}

		return $position;
	}

	/**
	 * Recieves the output of self::getMasterPosition. Waits
	 * for slaves to catch up to the master position at that
	 * point.
	 *
	 * @param array $position
	 */
	public function waitFor( array $position ) {
		if ( $position['wikiDb'] ) {
			wfGetLB()->waitFor( $position['wikiDb'] );
		}
		if ( $position['echoDb'] ) {
			$this->getLB()->waitFor( $position['echoDb'] );
		}
	}
}
