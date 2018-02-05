<?php

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
	 * @param BagOStuff $cache Bag to stored cached data in.
	 * @param string $partialCacheKey Partial cache key, $nestedList->getCacheKey() will be appended
	 *   to this to construct the cache key used.
	 * @param EchoContainmentList $nestedList The nested EchoContainmentList to cache the result of.
	 * @param int $timeout How long in seconds to cache the nested list, defaults to 1 week.
	 */
	public function __construct( BagOStuff $cache, $partialCacheKey, EchoContainmentList $nestedList, $timeout = self::ONE_WEEK ) {
		$this->cache = $cache;
		$this->partialCacheKey = $partialCacheKey;
		$this->nestedList = $nestedList;
		$this->timeout = $timeout;
	}

	/**
	 * @inheritDoc
	 */
	public function getValues() {
		if ( $this->result ) {
			return $this->result;
		}

		$cacheKey = $this->getCacheKey();
		$fetched = $this->cache->get( $cacheKey );
		if ( is_array( $fetched ) ) {
			$this->result = $fetched;
			return $this->result;
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

		$this->result = $result;
		return $this->result;
	}

	/**
	 * @inheritDoc
	 */
	public function getCacheKey() {
		return $this->partialCacheKey . '_' . $this->nestedList->getCacheKey();
	}
}
