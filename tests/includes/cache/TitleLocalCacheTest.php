<?php

class EchoTitleLocalCacheTest extends MediaWikiTestCase {

	public function testCreate() {
		$cache = EchoTitleLocalCache::create();
		$this->assertInstanceOf( 'EchoTitleLocalCache', $cache );
		return $cache;
	}

	/**
	 * @depends testCreate
	 */
	public function testAdd( $cache ) {
		$cache->add( 1 );
		$this->assertEquals( count( $cache->getLookups() ), 1 );
		$this->assertArrayHasKey( 1, $cache->getLookups() );
	}

	/**
	 * @depends testCreate
	 */
	public function testGet( $cache ) {
		$object = new \ReflectionObject( $cache );
		$targets = $object->getProperty( 'targets' );
		$targets->setAccessible( true );
		$lruMap = new MapCacheLRU( EchoLocalCache::TARGET_MAX_NUM );
		$lruMap->set( 1, $this->mockTitle() );
		$targets->setValue( $cache, $lruMap );
		$lookups = $object->getProperty( 'lookups' );
		$lookups->setAccessible( true );
		$lookups->setValue( $cache, array( '1' => '1', '2' => '2' ) );
		$this->assertTrue( count( $cache->getLookups() ) > 0 );
		// MapCacheLRU should treat key 1 same as '1'
		$this->assertInstanceOf( 'Title', $cache->get( '1' ) );
		$this->assertTrue( count( $cache->getLookups() ) > 0 );
		$this->assertInstanceOf( 'Title', $cache->get( 2 ) );
		$this->assertTrue( count( $cache->getLookups() ) == 0 );
	}

	/**
	 * @depends testCreate
	 */
	public function testClearAll( $cache ) {
		$object = new \ReflectionObject( $cache );
		$targets = $object->getProperty( 'targets' );
		$targets->setAccessible( true );
		$lruMap = new MapCacheLRU( EchoLocalCache::TARGET_MAX_NUM );
		$lruMap->set( 1, $this->mockTitle() );
		$targets->setValue( $cache, $lruMap );
		$lookups = $object->getProperty( 'lookups' );
		$lookups->setAccessible( true );
		$lookups->setValue( $cache, array( '1' => '1', '2' => '2' ) );

		$cache->clearAll();
		$this->assertTrue( count( $cache->getLookups() ) == 0 );
		$this->assertNull( $cache->getTargets()->get( 1 ) );
		$this->assertNull( $cache->getTargets()->get( '1' ) );
	}

	/**
	 * Mock object of Title
	 */
	protected function mockTitle() {
		$title = $this->getMockBuilder( 'Title' )
			->disableOriginalConstructor()
			->getMock();
		return $title;
	}
}
