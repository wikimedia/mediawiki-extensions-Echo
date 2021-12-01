<?php

use MediaWiki\User\UserOptionsLookup;

/**
 * @coversDefaultClass EchoContainmentSet
 */
class EchoContainmentSetTest extends MediaWikiIntegrationTestCase {

	/**
	 * @covers ::addTitleIDsFromUserOption
	 * @dataProvider addTitlesFromUserOptionProvider
	 * @param string $prefData
	 * @param string $contains
	 * @param bool $expected
	 */
	public function testAddTitlesFromUserOption(
		$prefData, string $contains, bool $expected
	) {
		$user = $this->getDefaultUserMock();
		$userOptionsLookupMock = $this->createMock( UserOptionsLookup::class );
		$userOptionsLookupMock->method( 'getOption' )->willReturn( $prefData );
		$this->setService( 'UserOptionsLookup', $userOptionsLookupMock );
		$containmentSet = new EchoContainmentSet( $user );
		$containmentSet->addTitleIDsFromUserOption( 'preference-name' );
		$this->assertSame( $expected, $containmentSet->contains( $contains ) );
	}

	public function addTitlesFromUserOptionProvider(): array {
		return [
			[
				'foo',
				'bar',
				false
			],
			[
				[ 'foo', 'bar' ],
				'foo',
				false
			],
			[
				"foo\nbar",
				'bar',
				true
			],
			[
				'{"foo":"bar"}',
				'bar',
				false
			]

		];
	}

	private function getDefaultUserMock() {
		return $this->getMockBuilder( User::class )
			->disableOriginalConstructor()
			->getMock();
	}

}
