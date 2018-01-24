<?php

/**
 * @covers EchoTitleLocalCache
 */
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
		$cache->clearAll();
		$cache->add( 1 );
		$this->assertEquals( count( $cache->getLookups() ), 1 );
		$this->assertArrayHasKey( 1, $cache->getLookups() );
	}

	/**
	 * @depends testCreate
	 */
	public function testGet( $cache ) {
		$map = new HashBagOStuff( [ 'maxKeys' => EchoLocalCache::TARGET_MAX_NUM ] );
		$titleIds = [];

		// First title included in cache
		$res = $this->insertPage( 'EchoTitleLocalCacheTest_testGet' );
		$titleIds[$res['id']] = $res['id'];
		$map->set( $res['id'], $res['title'] );

		// Second title not in internal cache, resolves from db.
		$res = $this->insertPage( 'EchoTitleLocalCacheTest_testGet2' );
		$titleIds[$res['id']] = $res['id'];

		$object = new \ReflectionObject( $cache );

		// Load our generated map in as the targets (known mapping from
		// title id to title object) into $cache
		$targets = $object->getProperty( 'targets' );
		$targets->setAccessible( true );
		$targets->setValue( $cache, $map );

		// Load both of the titles we are curious about into the list of titles
		// to be looked up
		$lookups = $object->getProperty( 'lookups' );
		$lookups->setAccessible( true );
		$lookups->setValue( $cache, $titleIds );

		// Requesting the first object, which is within the known targets, should
		// not resolve the pending lookups.
		$this->assertInstanceOf( 'Title', $cache->get( reset( $titleIds ) ) );
		$this->assertGreaterThan( 0, count( $cache->getLookups() ) );

		// Requesting the second object, which is not within the known targets, should
		// resolve the pending lookups and reset the list to lookup.
		$this->assertInstanceOf( 'Title', $cache->get( end( $titleIds ) ) );
		$this->assertEquals( 0, count( $cache->getLookups() ) );
	}

	/**
	 * @depends testCreate
	 */
	public function testClearAll( $cache ) {
		$map = new HashBagOStuff( [ 'maxKeys' => EchoLocalCache::TARGET_MAX_NUM ] );
		$map->set( 1, $this->mockTitle() );
		$object = new \ReflectionObject( $cache );
		$targets = $object->getProperty( 'targets' );
		$targets->setAccessible( true );
		$targets->setValue( $cache, $map );
		$lookups = $object->getProperty( 'lookups' );
		$lookups->setAccessible( true );
		$lookups->setValue( $cache, [ '1' => '1', '2' => '2' ] );

		$cache->clearAll();
		$this->assertTrue( count( $cache->getLookups() ) == 0 );
		$this->assertEquals( false, $cache->getTargets()->get( 1 ) );
		$this->assertEquals( false, $cache->getTargets()->get( '1' ) );
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
