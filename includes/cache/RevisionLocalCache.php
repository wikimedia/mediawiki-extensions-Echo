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
	 * Create a EchoRevisionLocalCache object
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
	protected function resolve() {
		if ( $this->lookups ) {
			// @Todo Add newFromIds() to Revision
			$dbr = wfGetDB( DB_REPLICA );
			$revQuery = Revision::getQueryInfo( [ 'page', 'user' ] );
			$res = $dbr->select(
				$revQuery['tables'],
				$revQuery['fields'],
				[ 'rev_id' => $this->lookups ],
				__METHOD__,
				[],
				$revQuery['joins']
			);
			if ( $res ) {
				foreach ( $res as $row ) {
					$this->targets->set( $row->rev_id, new Revision( $row ) );
				}
				$this->lookups = [];
			}
		}
	}

}
