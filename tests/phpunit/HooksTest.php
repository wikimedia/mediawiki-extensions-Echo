<?php

/**
 * @covers EchoHooks
 */
class EchoHooksTest extends MediaWikiTestCase {

	/**
	 * Test the UserSaveOptions hook implementation.
	 */
	public function testOnUserSaveOptions() {
		$options['echo-notifications-blacklist'] = [
			'',
			'0',
			'abcdef',
			'12345',
			'54321',
		];

		EchoHooks::onUserSaveOptions( new User(), $options );

		$this->assertSame( "12345\n54321", $options['echo-notifications-blacklist'] );
	}

	/**
	 * Test the UserLoadOptions hook implementation.
	 */
	public function testOnUserLoadOptions() {
		$options['echo-notifications-blacklist'] = "12345\n54321";

		EchoHooks::onUserLoadOptions( new User(), $options );

		$this->assertSame( [ 12345, 54321 ], $options['echo-notifications-blacklist'] );
	}

}
