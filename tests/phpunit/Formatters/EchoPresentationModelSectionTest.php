<?php

use MediaWiki\Extension\Notifications\Formatters\EchoPresentationModelSection;

/**
 * @covers \MediaWiki\Extension\Notifications\Formatters\EchoPresentationModelSection
 * @group Database
 */
class EchoPresentationModelSectionTest extends MediaWikiIntegrationTestCase {

	public function testGetTruncatedSectionTitle_short() {
		$lang = Language::factory( 'en' );
		$section = new EchoPresentationModelSection(
			$this->makeEvent( [ 'event_extra' => serialize( [ 'section-title' => 'asdf' ] ) ] ),
			$this->getTestUser()->getUser(),
			$lang
		);

		$this->assertEquals( $lang->embedBidi( 'asdf' ), $section->getTruncatedSectionTitle() );
	}

	public function testGetTruncatedSectionTitle_long() {
		$lang = Language::factory( 'en' );
		$section = new EchoPresentationModelSection(
			$this->makeEvent( [ 'event_extra' => serialize( [ 'section-title' => str_repeat( 'a', 100 ) ] ) ] ),
			$this->getTestUser()->getUser(),
			$lang
		);

		$this->assertEquals(
			$lang->embedBidi( str_repeat( 'a', 50 ) . '...' ),
			$section->getTruncatedSectionTitle()
		);
	}

	public function testGetTitleWithSection() {
		$page = $this->getExistingTestPage();
		$section = new EchoPresentationModelSection(
			$this->makeEvent( [
				'event_page_id' => $page->getId(),
				'event_extra' => serialize( [ 'section-title' => 'asdf' ] ),
			] ),
			$this->getTestUser()->getUser(),
			Language::factory( 'en' )
		);

		$titleWithSection = $section->getTitleWithSection();

		$this->assertEquals( 'asdf', $titleWithSection->getFragment() );
		$this->assertEquals( $page->getTitle()->getPrefixedText(), $titleWithSection->getPrefixedText() );
	}

	public function testExists_no() {
		$section = new EchoPresentationModelSection(
			$this->makeEvent(),
			$this->getTestUser()->getUser(),
			Language::factory( 'en' )
		);

		$this->assertFalse( $section->exists() );
	}

	public function testExists_yes() {
		$section = new EchoPresentationModelSection(
			$this->makeEvent( [ 'event_extra' => serialize( [ 'section-title' => 'asdf' ] ) ] ),
			$this->getTestUser()->getUser(),
			Language::factory( 'en' )
		);

		$this->assertTrue( $section->exists() );
	}

	private function makeEvent( $config = [] ) {
		$agent = $this->getTestSysop()->getUser();
		return EchoEvent::newFromRow( (object)array_merge( [
			'event_id' => 12,
			'event_type' => 'welcome',
			'event_variant' => '1',
			'event_page_id' => 1,
			'event_deleted' => 0,
			'event_agent_id' => $agent->getId(),
			'event_extra' => '',
		], $config ) );
	}
}
