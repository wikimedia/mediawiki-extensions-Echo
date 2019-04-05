<?php

class EchoIconTest extends MediaWikiTestCase {

	protected function setUp() {
		parent::setUp();
		$this->setMwGlobals( 'wgExtensionAssetsPath', '/assets/path' );
	}

	/**
	 * @covers EchoIcon::getUrl
	 */
	public function testGetUrl_url() {
		$this->setMwGlobals( 'wgEchoNotificationIcons', [ 'foo' => [ 'url' => 'www.foo.bar/icon.jpg' ] ] );
		$this->assertEquals(
			'www.foo.bar/icon.jpg',
			EchoIcon::getUrl( 'foo', 'ltr' )
		);
	}

	/**
	 * @covers EchoIcon::getUrl
	 */
	public function testGetUrl_path() {
		$this->setMwGlobals( 'wgEchoNotificationIcons', [
			'foo' => [ 'path' => 'modules/foo.svg' ],
			'bar' => [ 'path' => [ 'ltr' => 'modules/bar-ltr.svg', 'rtl' => 'modules/bar-rtl.svg' ] ],
		] );
		$this->assertEquals(
			'/assets/path/modules/foo.svg',
			EchoIcon::getUrl( 'foo', 'rtl' )
		);
		$this->assertEquals(
			'/assets/path/modules/bar-ltr.svg',
			EchoIcon::getUrl( 'bar', 'ltr' )
		);
		$this->assertEquals(
			'/assets/path/modules/bar-rtl.svg',
			EchoIcon::getUrl( 'bar', 'rtl' )
		);
	}

	/**
	 * @covers EchoIcon::getUrl
	 */
	public function testGetUrl_placeholder() {
		$this->assertEquals(
			'/assets/path/Echo/modules/icons/notice.svg',
			EchoIcon::getUrl( 'site', 'rtl' )
		);
	}

	/**
	 * @covers EchoIcon::getUrlForEmail
	 */
	public function testGetUrlForEmail_url() {
		$this->setMwGlobals( 'wgEchoNotificationIcons', [ 'foo' => [ 'url' => 'www.foo.bar/icon.jpg' ] ] );
		$this->assertEquals(
			'www.foo.bar/icon.jpg',
			EchoIcon::getUrlForEmail( 'foo', 'ltr' )
		);
	}

	/**
	 * @covers EchoIcon::getUrlForEmail
	 */
	public function testGetUrlForEmail_path() {
		$this->assertStringStartsWith(
			'data:image/svg+xml;base64,',
			EchoIcon::getUrlForEmail( 'chat', 'ltr' )
		);
	}

}
