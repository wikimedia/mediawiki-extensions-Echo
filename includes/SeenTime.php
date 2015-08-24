<?php

/**
 * A small wrapper around ObjectCache to manage
 * storing the last time a user has seen notifications
 */
class EchoSeenTime {

	/**
	 * @var User
	 */
	private $user;

	/**
	 * @var string
	 */
	private $key;

	/**
	 * @var BagOStuff
	 */
	private $cache;

	/**
	 * @param User $user A logged in user
	 */
	private function __construct( User $user ) {
		$this->user = $user;
		$this->key = wfMemcKey( 'echo', 'seen', 'time', $user->getId() );
		$this->cache = ObjectCache::getInstance( 'db-replicated' );
	}

	/**
	 * @param User $user
	 * @return EchoSeenTime
	 */
	public static function newFromUser( User $user ) {
		return new self( $user );
	}

	/**
	 * @param int $flags BagOStuff::READ_LATEST to use the master
	 * @return string|bool false if no stored time
	 */
	public function getTime( $flags = 0 ) {
		$cas = 0; // Unused, but we have to pass something by reference
		$data = $this->cache->get( $this->key, $cas, $flags );
		if ( $data === false ) {
			// Check if the user still has it set in their preferences
			$data = $this->user->getOption( 'echo-seen-time', false );
		}

		return $data;
	}

	public function setTime( $time ) {
		return $this->cache->set( $this->key, $time );
	}
}
