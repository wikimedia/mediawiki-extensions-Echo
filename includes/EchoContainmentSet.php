<?php

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
	protected $lists = [];

	/**
	 * @var User
	 */
	protected $recipient;

	public function __construct( User $recipient ) {
		$this->recipient = $recipient;
	}

	/**
	 * Add an EchoContainmentList to the set of lists checked by self::contains()
	 *
	 * @param EchoContainmentList $list
	 */
	public function add( EchoContainmentList $list ) {
		$this->lists[] = $list;
	}

	/**
	 * Add a php array to the set of lists checked by self::contains()
	 *
	 * @param array $list
	 */
	public function addArray( array $list ) {
		$this->add( new EchoArrayList( $list ) );
	}

	/**
	 * Add a list from a user preference to the set of lists checked by self::contains().
	 *
	 * @param string $preferenceName
	 */
	public function addFromUserOption( $preferenceName ) {
		$preference = $this->recipient->getOption( $preferenceName, [] );

		if ( $preference ) {
			$lookup = CentralIdLookup::factory();
			$names = $lookup->namesFromCentralIds( $preference, $this->recipient );
			$this->addArray( $names );
		}
	}

	/**
	 * Add a list from a wiki page to the set of lists checked by self::contains().  Data
	 * from wiki pages is cached via the BagOStuff.  Caching is disabled when passing a null
	 * $cache object.
	 *
	 * @param int $namespace An NS_* constant representing the mediawiki namespace of the page containing the list.
	 * @param string $title The title of the page containing the list.
	 * @param BagOStuff|null $cache An object to cache the page with or null for no cache.
	 * @param string $cacheKeyPrefix A prefix to be combined with the pages latest revision id and used as a cache key.
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
	 * @param mixed $value The value to look for
	 * @return bool True when the set contains the provided value
	 */
	public function contains( $value ) {
		foreach ( $this->lists as $list ) {
			// Use strict comparison to prevent the number 0 from matching all strings (T177825)
			if ( array_search( $value, $list->getValues(), true ) !== false ) {
				return true;
			}
		}

		return false;
	}
}
