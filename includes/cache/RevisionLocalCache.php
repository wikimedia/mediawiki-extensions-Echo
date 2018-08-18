<?php

/**
 * Cache class that maps revision id to Revision object
 */
class EchoRevisionLocalCache extends EchoLocalCache {

	/**
	 * @var EchoRevisionLocalCache
	 */
	private static $instance;

	/**
	 * @return EchoRevisionLocalCache
	 */
	public static function create() {
		if ( !self::$instance ) {
			self::$instance = new EchoRevisionLocalCache();
		}

		return self::$instance;
	}

	/**
	 * @inheritDoc
	 */
	protected function resolve( array $lookups ) {
		$dbr = wfGetDB( DB_REPLICA );
		$revQuery = Revision::getQueryInfo( [ 'page', 'user' ] );
		$res = $dbr->select(
			$revQuery['tables'],
			$revQuery['fields'],
			[ 'rev_id' => $lookups ],
			__METHOD__,
			[],
			$revQuery['joins']
		);
		foreach ( $res as $row ) {
			yield $row->rev_id => new Revision( $row );
		}
	}
}
