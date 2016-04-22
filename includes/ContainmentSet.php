<?php

/**
 * Interface providing list of contained values and an optional cache key to go along with it.
 */
interface EchoContainmentList {
	/**
	 * @return array The values contained within this list.
	 */
	public function getValues();

	/**
	 * @return string A string suitable for appending to the cache key prefix to facilitate
	 *                cache busting when the underlying data changes, or a blank string if
	 *                not relevant.
	 */
	public function getCacheKey();
}

/**
 * Utilizes EchoContainmentList interface to provide a fluent interface to whitelist/blacklist
 * from multiple sources like global variables, wiki pages, etc.
 *
 * Initialize:
 *   $cache = ObjectCache::getLocalClusterIntance();
 *   $set = new EchoContainmentSet;
 *   $set->addArray( $wgSomeGlobalParameter );
 *   $set->addOnWiki( NS_USER, 'Foo/bar-baz', $cache, 'some_user_specific_cache_key' );
 *
 * Usage:
 *   if ( $set->contains( 'SomeUser' ) ) {
 *       ...
 *   }
 */
class EchoContainmentSet {
	/**
	 * @var EchoContainmentList[]
	 */
	protected $lists = array();

	/**
	 * Add an EchoContainmentList to the set of lists checked by self::contains()
	 *
	 * @param $list EchoContainmentList
	 */
	public function add( EchoContainmentList $list ) {
		$this->lists[] = $list;
	}

	/**
	 * Add a php array to the set of lists checked by self::contains()
	 *
	 * @param $list array
	 */
	public function addArray( array $list ) {
		$this->add( new EchoArrayList( $list ) );
	}

	/**
	 * Add a list from a wiki page to the set of lists checked by self::contains().  Data
	 * from wiki pages is cached via the BagOStuff.  Caching is disabled when passing a null
	 * $cache object.
	 *
	 * @param $namespace      integer   An NS_* constant representing the mediawiki namespace of the page containing the list.
	 * @param $title          string    The title of the page containing the list.
	 * @param $cache          BagOStuff An object to cache the page with or null for no cache.
	 * @param $cacheKeyPrefix string    A prefix to be combined with the pages latest revision id and used as a cache key.
	 *
	 * @throws MWException
	 */
	public function addOnWiki( $namespace, $title, BagOStuff $cache = null, $cacheKeyPrefix = '' ) {
		$list = new EchoOnWikiList( $namespace, $title );
		if ( $cache ) {
			if ( $cacheKeyPrefix === '' ) {
				throw new MWException( 'Cache requires providing a cache key prefix.' );
			}
			$list = new EchoCachedList( $cache, $cacheKeyPrefix, $list );
		}
		$this->add( $list );
	}

	/**
	 * Test the wrapped lists for existence of $value
	 *
	 * @param $value mixed The value to look for
	 * @return boolean True when the set contains the provided value
	 */
	public function contains( $value ) {
		foreach ( $this->lists as $list ) {
			if ( array_search( $value, $list->getValues() ) !== false ) {
				return true;
			}
		}

		return false;
	}
}

/**
 * Implements the EchoContainmentList interface for php arrays.  Possible source
 * of arrays includes $wg* global variables initialized from extensions or global
 * wiki config.
 */
class EchoArrayList implements EchoContainmentList {
	/**
	 * @var array
	 */
	protected $list;

	/**
	 * @param $list array
	 */
	public function __construct( array $list ) {
		$this->list = $list;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getValues() {
		return $this->list;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getCacheKey() {
		return '';
	}
}

/**
 * Implements EchoContainmentList interface for sourcing a list of items from a wiki
 * page. Uses the pages latest revision ID as cache key.
 */
class EchoOnWikiList implements EchoContainmentList {
	/**
	 * @var Title|null A title object representing the page to source the list from,
	 *                        or null if the page does not exist.
	 */
	protected $title;

	/**
	 * @param $titleNs     integer An NS_* constant representing the mediawiki namespace of the page
	 * @param $titleString string  String portion of the wiki page title
	 */
	public function __construct( $titleNs, $titleString ) {
		$title = Title::newFromText( $titleString, $titleNs );
		if ( $title !== null && $title->getArticleId() ) {
			$this->title = $title;
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function getValues() {
		if ( !$this->title ) {
			return array();
		}

		$article = WikiPage::newFromID( $this->title->getArticleId() );
		if ( $article === null || !$article->exists() ) {
			return array();
		}

		return array_filter( array_map( 'trim', explode( "\n", $article->getText() ) ) );
	}

	/**
	 * {@inheritDoc}
	 */
	public function getCacheKey() {
		if ( !$this->title ) {
			return '';
		}

		return $this->title->getLatestRevID();
	}
}

/**
 * Caches an EchoContainmentList within a BagOStuff(memcache, etc) to prevent needing
 * to load the nested list from a potentially slow source (mysql, etc).
 */
class EchoCachedList implements EchoContainmentList {
	const ONE_WEEK = 4233600;
	const ONE_DAY = 86400;

	protected $cache;
	protected $partialCacheKey;
	protected $nestedList;
	protected $timeout;
	private $result;

	/**
	 * @param $cache           BagOStuff           Bag to stored cached data in.
	 * @param $partialCacheKey string              Partial cache key, $nestedList->getCacheKey() will be appended to this
	 *                                             to construct the cache key used.
	 * @param $nestedList      EchoContainmentList The nested EchoContainmentList to cache the result of.
	 * @param $timeout         integer             How long in seconds to cache the nested list, defaults to 1 week.
	 */
	public function __construct( BagOStuff $cache, $partialCacheKey, EchoContainmentList $nestedList, $timeout = self::ONE_WEEK ) {
		$this->cache = $cache;
		$this->partialCacheKey = $partialCacheKey;
		$this->nestedList = $nestedList;
		$this->timeout = $timeout;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getValues() {
		if ( $this->result ) {
			return $this->result;
		}

		$cacheKey = $this->getCacheKey();
		$fetched = $this->cache->get( $cacheKey );
		if ( is_array( $fetched ) ) {
			return $this->result = $fetched;
		}

		$result = $this->nestedList->getValues();
		if ( !is_array( $result ) ) {
			throw new MWException( sprintf(
				"Expected array but received '%s' from '%s::getValues'",
				is_object( $result ) ? get_class( $result ) : gettype( $result ),
				get_class( $this->nestedList )
			) );
		}
		$this->cache->set( $cacheKey, $result, $this->timeout );

		return $this->result = $result;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getCacheKey() {
		return $this->partialCacheKey . '_' . $this->nestedList->getCacheKey();
	}
}
