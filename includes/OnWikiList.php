<?php

namespace MediaWiki\Extension\Notifications;

use BadMethodCallException;
use MediaWiki\Content\TextContent;
use MediaWiki\MediaWikiServices;
use MediaWiki\Title\Title;
use Wikimedia\ObjectCache\WANObjectCache;

/**
 * Implements ContainmentList interface for sourcing a list of items from a wiki
 * page. Optionally caches the values by the page's latest revision ID.
 */
class OnWikiList implements ContainmentList {
	/** @var string[]|null */
	private $result;

	/**
	 * @var Title|null A title object representing the page to source the list from,
	 *  or null if the page does not exist.
	 */
	protected $title;

	/**
	 * @param int $titleNs An NS_* constant representing the mediawiki namespace of the page
	 * @param string $titleString String portion of the wiki page title
	 * @param WANObjectCache|null $cache Cache for the page's values, or null for no cache.
	 * @param string $cacheKeyPrefix Prefix to combine with the page's latest revision ID.
	 */
	public function __construct(
		$titleNs, $titleString,
		private readonly ?WANObjectCache $cache = null,
		private readonly string $cacheKeyPrefix = ''
	) {
		if ( $cache && $cacheKeyPrefix === '' ) {
			throw new BadMethodCallException( 'Cache requires providing a cache key prefix.' );
		}
		$title = Title::newFromText( $titleString, $titleNs );
		if ( $title !== null && $title->getArticleID() ) {
			$this->title = $title;
		}
	}

	/**
	 * @inheritDoc
	 */
	public function getValues() {
		if ( !$this->cache ) {
			return $this->loadValues();
		}
		if ( $this->result !== null ) {
			return $this->result;
		}
		$this->result = $this->cache->buildGetWithSetCallback()
			->globalKey(
				'echo-containment-list',
				$this->cacheKeyPrefix,
				$this->title ? (string)$this->title->getLatestRevID() : ''
			)
			->keepForAWeek()
			->callback( fn () => $this->loadValues() )
			->fetch();
		return $this->result;
	}

	/** @return string[] */
	private function loadValues(): array {
		if ( !$this->title ) {
			return [];
		}

		$article = MediaWikiServices::getInstance()->getWikiPageFactory()->newFromTitle( $this->title );
		if ( !$article->exists() ) {
			return [];
		}

		$content = $article->getContent();
		$text = ( $content instanceof TextContent ) ? $content->getText() : null;
		if ( $text === null ) {
			return [];
		}
		return array_filter( array_map( 'trim', explode( "\n", $text ) ) );
	}
}
