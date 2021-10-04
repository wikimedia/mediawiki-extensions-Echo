<?php

use MediaWiki\MediaWikiServices;
use MediaWiki\Page\PageRecord;

/**
 * Cache class that maps article id to Title object
 */
class EchoTitleLocalCache extends EchoLocalCache {

	/**
	 * @var EchoTitleLocalCache
	 */
	private static $instance;

	/**
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
	protected function resolve( array $lookups ) {
		if ( $lookups ) {
			$titles = MediaWikiServices::getInstance()
				->getPageStore()
				->newSelectQueryBuilder()
				->wherePageIds( $lookups )
				->caller( __METHOD__ )
				->fetchPageRecords();

			/** @var PageRecord $title */
			foreach ( $titles as $title ) {
				$title = MediaWikiServices::getInstance()->getTitleFactory()->castFromPageIdentity( $title );
				yield $title->getArticleID() => $title;
			}
		}
	}

}
