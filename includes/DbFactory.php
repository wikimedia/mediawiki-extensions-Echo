<?php

namespace MediaWiki\Extension\Notifications;

use MediaWiki\MainConfigNames;
use MediaWiki\MediaWikiServices;
use Wikimedia\Rdbms\IDatabase;
use Wikimedia\Rdbms\ILoadBalancer;
use Wikimedia\Rdbms\IReadableDatabase;

/**
 * Database factory class, returns connections for the Echo virtual database
 * domains
 */
class DbFactory {

	/**
	 * Create a db factory instance from default Echo configuration
	 * A singleton is not necessary because it's actually handled
	 * inside core database object
	 *
	 * @return DbFactory
	 */
	public static function newFromDefault() {
		return new self();
	}

	/**
	 * @return bool
	 */
	public function isReadOnly() {
		return ( $this->getLB()->getReadOnlyReason() !== false );
	}

	/**
	 * Get the database load balancer
	 * @return ILoadBalancer
	 */
	protected function getLB() {
		return MediaWikiServices::getInstance()->getDBLoadBalancerFactory()
			->getLoadBalancer( DbDomains::VIRTUAL_DOMAIN );
	}

	/**
	 * @return ILoadBalancer
	 */
	protected function getSharedLB() {
		return MediaWikiServices::getInstance()->getDBLoadBalancerFactory()
			->getLoadBalancer( DbDomains::VIRTUAL_SHARED_DOMAIN );
	}

	/**
	 * Get the database connection for Echo
	 * @param int $db Index of the connection to get
	 * @param string[] $groups Query groups. Only the first group is used.
	 * @return IDatabase|IReadableDatabase
	 */
	public function getEchoDb( $db, array $groups = [] ) {
		$provider = MediaWikiServices::getInstance()->getConnectionProvider();
		if ( $db === DB_PRIMARY ) {
			return $provider->getPrimaryDatabase( DbDomains::VIRTUAL_DOMAIN );
		}

		return $provider->getReplicaDatabase( DbDomains::VIRTUAL_DOMAIN, $groups[0] ?? null );
	}

	/**
	 * @param int $db Index of the connection to get
	 * @param string[] $groups Query groups. Only the first group is used.
	 *
	 * @return bool|IDatabase|IReadableDatabase false if no shared db is configured
	 */
	public function getSharedDb( $db, array $groups = [] ) {
		$services = MediaWikiServices::getInstance();
		if ( !DbDomains::isSharedTrackingConfigured( $services->getMainConfig() ) ) {
			return false;
		}

		$provider = $services->getConnectionProvider();
		if ( $db === DB_PRIMARY ) {
			return $provider->getPrimaryDatabase( DbDomains::VIRTUAL_SHARED_DOMAIN );
		}

		return $provider->getReplicaDatabase( DbDomains::VIRTUAL_SHARED_DOMAIN, $groups[0] ?? null );
	}

	/**
	 * Wrapper function for LBFactory::getExternalLB/getMainLB, some extensions like MobileFrontend is
	 * using this to issue sql queries against Echo database directly.  This
	 * is totally not accepted and should be updated to use Echo database access
	 * objects
	 *
	 * @deprecated Use newFromDefault() instead to create a db factory
	 * @param int $db Index of the connection to get
	 * @param string[] $groups Query groups.
	 * @param string|bool $wiki The wiki ID, or false for the current wiki
	 * @return IDatabase|IReadableDatabase
	 */
	public static function getDB( $db, array $groups = [], $wiki = false ) {
		$services = MediaWikiServices::getInstance();
		if ( $wiki === false ) {
			return ( new self() )->getEchoDb( $db, $groups );
		}

		$lbFactory = $services->getDBLoadBalancerFactory();
		$virtualDomainsMapping = $services->getMainConfig()->get( MainConfigNames::VirtualDomainsMapping );
		if ( isset( $virtualDomainsMapping[DbDomains::VIRTUAL_DOMAIN] ) ) {
			// All wikis share one Echo cluster, connect to it with the foreign
			// wiki's domain
			$lb = $lbFactory->getLoadBalancer( DbDomains::VIRTUAL_DOMAIN );
		} else {
			// Echo tables live in the main database of each wiki
			$lb = $lbFactory->getMainLB( $wiki );
		}

		return $lb->getConnection( $db, $groups, $wiki );
	}

	/**
	 * Check whether it makes sense to retry a failed lookup on the primary database.
	 * @return bool True if there are multiple servers and changes were made in this request; false otherwise
	 */
	public function canRetryPrimary() {
		return DbDomains::canRetryPrimary();
	}
}

class_alias( DbFactory::class, 'MWEchoDbFactory' );
