<?php

/**
 * Database factory class, this will determine whether to use the main database
 * or an external database defined in configuration file
 */
class MWEchoDbFactory {

	/**
	 * Database loadbalancer
	 */
	private static $lb;

	/**
	 * Database cache
	 */
	private static $cache = array();

	/**
	 * Internal function for getting database loadbalancer, Echo database
	 * can reside on extension1 db
	 *
	 * @param $wiki string The wiki ID, or false for the current wiki
	 */
	private static function initLB( $wiki ) {
		if ( self::$lb === null ) {
			global $wgEchoCluster;

			// Use the external db defined for Echo
			if ( $wgEchoCluster ) {
				self::$lb = wfGetLBFactory()->getExternalLB( $wgEchoCluster );
			} else {
				self::$lb = wfGetLB( $wiki );
			}
		}
	}

	/**
	 * Wrapper function for wfGetDB
	 *
	 * @param $db int Index of the connection to get
	 * @param $groups mixed Query groups.
	 * @param $wiki string The wiki ID, or false for the current wiki
	 * @return DatabaseBase
	 */
	public static function getDB( $db, $groups = array(), $wiki = false ) {
		if ( !isset( self::$cache[$db] ) ) {
			self::initLB( $wiki );

			self::$cache[$db] = self::$lb->getConnection( $db, $groups, $wiki );
		}

		return self::$cache[$db];
	}

}
