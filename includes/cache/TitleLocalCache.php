<?php

class EchoTitleLocalCache extends EchoLocalCache {

	/**
	 * @var EchoTitleLocalCache
	 */
	private static $instance;

	/**
	 * The current wiki id
	 * @var string|null
	 */
	private static $wiki;

	/**
	 * Create a TitleLocalCache object
	 * @return TitleLocalCache
	 */
	public static function create() {
		// A job queue may run against multiple wikis,
		// initialize a new one for the current wiki
		if ( wfWikiId() != self::$wiki ) {
			self::$instance = null;
			self::$wiki = wfWikiId();
		}
		if ( !self::$instance ) {
			self::$instance = new EchoTitleLocalCache();
		}
		return self::$instance;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function resolve() {
		if ( $this->lookups ) {
			$titles = Title::newFromIDs( $this->lookups );
			foreach ( $titles as $title ) {
				$this->targets->set( $title->getArticleId(), $title );
			}
			$this->lookups = array();
		}
	}

}
