<?php

namespace MediaWiki\Extension\Notifications\Test;

use MediaWiki\Extension\Notifications\ContainmentSet;
use MediaWiki\Extension\Notifications\OnWikiList;
use MediaWikiIntegrationTestCase;
use Wikimedia\ObjectCache\HashBagOStuff;
use Wikimedia\ObjectCache\WANObjectCache;

/**
 * @covers \MediaWiki\Extension\Notifications\ContainmentSet
 * @covers \MediaWiki\Extension\Notifications\OnWikiList
 * @group Echo
 * @group Database
 */
class ContainmentSetTest extends MediaWikiIntegrationTestCase {

	public function testGenericContains() {
		$list = new ContainmentSet( self::getTestUser()->getUser() );

		$list->addArray( [ 'foo', 'bar' ] );
		$this->assertTrue( $list->contains( 'foo' ) );
		$this->assertTrue( $list->contains( 'bar' ) );
		$this->assertFalse( $list->contains( 'whammo' ) );

		$list->addArray( [ 'whammo' ] );
		$this->assertTrue( $list->contains( 'whammo' ) );

		$list->addArray( [ 0 ] );
		$this->assertFalse( $list->contains( 'baz' ) );
	}

	public function testOnWikiList() {
		$this->editPage( 'User:Foo/Bar-baz', "abc\ndef\r\nghi\n\n\n" );

		$list = new OnWikiList( NS_USER, "Foo/Bar-baz" );
		$this->assertEquals(
			[ 'abc', 'def', 'ghi' ],
			$list->getValues()
		);
	}

	public function testOnWikiListNonExistant() {
		$list = new OnWikiList( NS_USER, "Some_Non_Existant_Page" );
		$this->assertEquals( [], $list->getValues() );
	}

	public function testCachedOnWikiList() {
		$this->editPage( 'User:Foo/Cached-list', "bing\nbang" );
		$innerCache = new HashBagOStuff;
		$wanCache = new WANObjectCache( [ 'cache' => $innerCache ] );
		$inner = [ 'bing', 'bang' ];
		$cached = new OnWikiList( NS_USER, 'Foo/Cached-list', $wanCache, 'test_key' );
		$this->assertEquals( $inner, $cached->getValues() );
		$this->assertEquals( $inner, $cached->getValues() );

		// A new list should reuse the cached values without reading the page content.
		$wikiPageFactory = $this->createMock( \MediaWiki\Page\WikiPageFactory::class );
		$wikiPageFactory->expects( $this->never() )->method( 'newFromTitle' );
		$this->setService( 'WikiPageFactory', $wikiPageFactory );
		$freshCached = new OnWikiList( NS_USER, 'Foo/Cached-list', $wanCache, 'test_key' );
		$this->assertEquals( $inner, $freshCached->getValues() );
	}

	public function testCachedOnWikiListAfterEdit() {
		$wanCache = new WANObjectCache( [ 'cache' => new HashBagOStuff ] );
		$this->editPage( 'User:Foo/Updated-list', 'before' );
		$list = new OnWikiList( NS_USER, 'Foo/Updated-list', $wanCache, 'test_key' );
		$this->assertSame( [ 'before' ], $list->getValues() );

		$this->editPage( 'User:Foo/Updated-list', 'after' );
		$list = new OnWikiList( NS_USER, 'Foo/Updated-list', $wanCache, 'test_key' );
		$this->assertSame( [ 'after' ], $list->getValues() );
	}

	public function testCachedOnWikiListRequiresPrefix() {
		$this->expectException( \BadMethodCallException::class );
		new OnWikiList( NS_USER, 'Foo/Bar', new WANObjectCache( [ 'cache' => new HashBagOStuff ] ) );
	}

	public function testCachedOnWikiListEmptyPage() {
		$this->editPage( 'User:Foo/Empty-list', "\n\n" );
		$wanCache = new WANObjectCache( [ 'cache' => new HashBagOStuff ] );
		$list = new OnWikiList( NS_USER, 'Foo/Empty-list', $wanCache, 'empty_list' );
		$this->assertSame( [], $list->getValues() );

		$wikiPageFactory = $this->createMock( \MediaWiki\Page\WikiPageFactory::class );
		$wikiPageFactory->expects( $this->never() )->method( 'newFromTitle' );
		$this->setService( 'WikiPageFactory', $wikiPageFactory );
		$this->assertSame( [], $list->getValues() );
		$list = new OnWikiList( NS_USER, 'Foo/Empty-list', $wanCache, 'empty_list' );
		$this->assertSame( [], $list->getValues() );
	}
}
