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
	 * {@inheritDoc}
	 */
	protected function resolve() {
		if ( $this->lookups ) {
			// @Todo Add newFromIds() to Revision
			$dbr = wfGetDB( DB_SLAVE );
			$fields = array_merge(
				Revision::selectFields(),
				Revision::selectPageFields(),
				Revision::selectUserFields()
			);
			$res = $dbr->select(
				array( 'revision', 'page', 'user' ),
				$fields,
				array( 'rev_id' => $this->lookups ),
				__METHOD__,
				array(),
				array(
					'page' => Revision::pageJoinCond(),
					'user' => Revision::userJoinCond()
				)
			);
			if ( $res ) {
				foreach ( $res as $row ) {
					$this->targets->set( $row->rev_id, new Revision( $row ) );
				}
				$this->lookups = array();
			}
		}
	}

}
