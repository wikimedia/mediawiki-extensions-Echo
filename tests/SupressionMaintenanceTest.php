<?php

class SuppressionMaintenanceTest extends MediaWikiTestCase {

	public static function provider_updateRow() {
		$input = array(
			'event_id' => 2,
			'event_type' => 'mention',
			'event_variant' => null,
			'event_agent_id' => 3,
			'event_agent_ip' => null,
			'event_page_title' => null,
			'event_page_namespace' => null,
			'event_page_extra' => null,
			'event_extra' => null,
			'event_page_id' => null,
		);
		return array(
			array( 'Unrelated row must result in no update', array(), $input ),

			array(
				'Page title and namespace for non-existant page must move into event_extra',
				array( // expected update
					'event_extra' => serialize( array(
						'page_title' => 'Yabba Dabba Do',
						'page_namespace' => NS_MAIN
					) ),
				),
				array( // input row
					'event_page_title' => 'Yabba Dabba Do',
					'event_page_namespace' => NS_MAIN,
				) + $input,
			),

			array(
				'Page title and namespace for existing page must be result in update to event_page_id',
				array( // expected update
					'event_page_id' => 42,
				),
				array( // input row
					'event_page_title' => 'Mount Rushmore',
					'event_page_namespace' => NS_MAIN,
				) + $input,
				self::attachTitleFor( 42, 'Mount Rushmore', NS_MAIN )
			),

			array(
				'When updating non-existant page must keep old extra data',
				array( // expected update
					'event_extra' => serialize( array(
						'foo' => 'bar',
						'page_title' => 'Yabba Dabba Do',
						'page_namespace' => NS_MAIN
					) ),
				),
				array( // input row
					'event_page_title' => 'Yabba Dabba Do',
					'event_page_namespace' => NS_MAIN,
					'event_extra' => serialize( array( 'foo' => 'bar' ) ),
				) + $input,
			),

			array(
				'Must update link-from-title/namespace to link-from-page-id for page-linked events',
				array( // expected update
					'event_extra' => serialize( array( 'link-from-page-id' => 99 ) ),
				),
				array( //input row
					'event_type' => 'page-linked',
					'event_extra' => serialize( array(
						'link-from-title' => 'Horse',
						'link-from-namespace' => NS_USER_TALK
					) ),
				) + $input,
				self::attachTitleFor( 99, 'Horse', NS_USER_TALK )
			),

			array(
				'Must perform both generic update and page-linked update at same time',
				array( // expected update
					'event_extra' => serialize( array( 'link-from-page-id' => 8675309 ) ),
					'event_page_id' => 8675309,
				),
				array( //input row
					'event_type' => 'page-linked',
					'event_extra' => serialize( array(
						'link-from-title' => 'Jenny',
						'link-from-namespace' => NS_MAIN,
					) ),
					'event_page_title' => 'Jenny',
					'event_page_namespace' => NS_MAIN,
				) + $input,
				self::attachTitleFor( 8675309, 'Jenny', NS_MAIN ),
			),
		);
	}

	protected static function attachTitleFor( $id, $providedText, $providedNamespace ) {
		return function( $test, $gen ) use ( $id, $providedText, $providedNamespace ) {
			$title = $test->getMock( 'Title' );
			$title->expects( $test->any() )
				->method( 'getArticleId' )
				->will( $test->returnValue( $id ) );

			$titles = array( $providedNamespace => array( $providedText => $title ) );

			$gen->setNewTitleFromText( function( $text, $defaultNamespace ) use( $titles ) {
				if ( isset( $titles[$defaultNamespace][$text] ) ) {
					return $titles[$defaultNamespace][$text];
				}
				return Title::newFromText( $text, $defaultNamespace );
			} );
		};
	}

	/**
	 * @dataProvider provider_updateRow
	 */
	public function testUpdateRow( $message, $expected, $input, $callable = null ) {
		$gen = new EchoSuppressionRowUpdateGenerator;
		if ( $callable ) {
			call_user_func( $callable, $this, $gen );
		}
		$update = $gen->update( (object) $input );
		$this->assertEquals( $expected, $update, $message );
	}
}
