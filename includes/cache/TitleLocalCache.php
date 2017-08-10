<?php

/**
 * Cache class that maps article id to Title object
 */
class EchoTitleLocalCache extends EchoLocalCache {

	/**
	 * @var EchoTitleLocalCache
	 */
	private static $instance;

	/**
	 * Create a TitleLocalCache object
	 * @return EchoTitleLocalCache
	 */
	public static function create() {
		if ( !self::$instance ) {
			self::$instance = new EchoTitleLocalCache();
		}

		return self::$instance;
	}

	/**
	 * @inheritDoc
	 */
	protected function resolve() {
		if ( $this->lookups ) {
			$titles = Title::newFromIDs( $this->lookups );
			foreach ( $titles as $title ) {
				$this->targets->set( $title->getArticleId(), $title );
			}
			$this->lookups = [];
		}
	}

}
