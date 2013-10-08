<?php

/**
 * Database factory class, this will determine whether to use the main database
 * or an external database defined in configuration file
 */
class MWEchoDbFactory {

	/**
	 * Wrapper function for wfGetDB
	 *
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
