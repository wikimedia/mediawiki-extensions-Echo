<?php

namespace MediaWiki\Extension\Notifications\Mapper;

use InvalidArgumentException;
use MediaWiki\Extension\Notifications\DbDomains;
use MediaWiki\MediaWikiServices;
use Wikimedia\Rdbms\IConnectionProvider;
use Wikimedia\Rdbms\IDatabase;
use Wikimedia\Rdbms\IReadableDatabase;

/**
 * Abstract mapper for model
 */
abstract class AbstractMapper {

	private ?IConnectionProvider $dbProvider;

	/**
	 * Event listeners for method like insert/delete
	 * @var array[]
	 */
	protected $listeners;

	public function __construct( ?IConnectionProvider $dbProvider = null ) {
		$this->dbProvider = $dbProvider;
	}

	protected function getDbProvider(): IConnectionProvider {
		$this->dbProvider ??= MediaWikiServices::getInstance()->getConnectionProvider();

		return $this->dbProvider;
	}

	/**
	 * Get the primary database connection for the main Echo tables.
	 * Not for the shared tracking or push tables, which live in
	 * DbDomains::VIRTUAL_SHARED_DOMAIN.
	 */
	protected function getPrimaryDb(): IDatabase {
		return $this->getDbProvider()->getPrimaryDatabase( DbDomains::VIRTUAL_DOMAIN );
	}

	/**
	 * Get a replica database connection for the main Echo tables.
	 * Not for the shared tracking or push tables, which live in
	 * DbDomains::VIRTUAL_SHARED_DOMAIN.
	 */
	protected function getReplicaDb(): IReadableDatabase {
		return $this->getDbProvider()->getReplicaDatabase( DbDomains::VIRTUAL_DOMAIN );
	}

	/**
	 * Attach a listener
	 *
	 * @param string $method Method name
	 * @param string $key Identification of the callable
	 * @param callable $callable
	 */
	public function attachListener( $method, $key, $callable ) {
		if ( !method_exists( $this, $method ) ) {
			throw new InvalidArgumentException( $method . ' does not exist in ' . get_class( $this ) );
		}
		if ( !isset( $this->listeners[$method] ) ) {
			$this->listeners[$method] = [];
		}

		$this->listeners[$method][$key] = $callable;
	}

	/**
	 * Detach a listener
	 *
	 * @param string $method Method name
	 * @param string $key identification of the callable
	 */
	public function detachListener( $method, $key ) {
		if ( isset( $this->listeners[$method] ) ) {
			unset( $this->listeners[$method][$key] );
		}
	}

	/**
	 * Get the listener for a method
	 *
	 * @param string $method
	 * @return callable[]
	 */
	public function getMethodListeners( $method ) {
		if ( !method_exists( $this, $method ) ) {
			throw new InvalidArgumentException( $method . ' does not exist in ' . get_class( $this ) );
		}

		return $this->listeners[$method] ?? [];
	}

}
