<?php

/**
 * @group Echo
 * @group DataBase
 * @group medium
 */
class EchoTalkPageFunctionalTest extends ApiTestCase {

	protected $dbr;

	protected function setUp() {
		parent::setUp();
		$this->dbr = MWEchoDbFactory::getDB( DB_REPLICA );
	}

	/**
	 * Creates and updates a user talk page a few times to ensure proper events are
	 * created. The user performing the edits is self::$users['sysop'].
	 * @group Broken
	 */
	public function testAddCommentsToTalkPage() {
		$editor = self::$users['sysop']->getUser()->getName();
		$talkPage = self::$users['uploader']->getUser()->getName();
		// A set of messages which will be inserted
		$messages = [
			'Moar Cowbell',
			"I can haz test\n\nplz?", // checks that the parser allows multi-line comments
			'blah blah',
		];

		$messageCount = 0;
		$this->assertCount( $messageCount, $this->fetchAllEvents() );

		// Start a talkpage
		$content = "== Section 8 ==\n\n" . $this->signedMessage( $editor, $messages[$messageCount] );
		$this->editPage( $talkPage, $content, '', NS_USER_TALK );

		// Ensure the proper event was created
		$events = $this->fetchAllEvents();
		$this->assertCount( 1 + $messageCount, $events, 'After initial edit a single event must exist.' ); // +1 is due to 0 index
		$row = array_shift( $events );
		$this->assertEquals( 'edit-user-talk', $row->event_type );
		$this->assertEventSectionTitle( 'Section 8', $row );

		// Add another message to the talk page
		$messageCount++;
		$content .= $this->signedMessage( $editor, $messages[$messageCount] );
		$this->editPage( $talkPage, $content, '', NS_USER_TALK );

		// Ensure another event was created
		$events = $this->fetchAllEvents();
		$this->assertCount( 1 + $messageCount, $events );
		$row = array_shift( $events );
		$this->assertEquals( 'edit-user-talk', $row->event_type );
		$this->assertEventSectionTitle( 'Section 8', $row );

		// Add a new section and a message within it
		$messageCount++;
		$content .= "\n\n== EE ==\n\n" . $this->signedMessage( $editor, $messages[$messageCount] );
		$this->editPage( $talkPage, $content, '', NS_USER_TALK );

		// Ensure this event has the new section title
		$events = $this->fetchAllEvents();
		$this->assertCount( 1 + $messageCount, $events );
		$row = array_pop( $events );
		$this->assertEquals( 'edit-user-talk', $row->event_type );
		$this->assertEventSectionTitle( 'EE', $row );
	}

	protected function assertEventSectionTitle( $sectionTitle, $row ) {
		$this->assertNotNull( $row->event_extra, 'Event must contain extra data.' );
		$extra = unserialize( $row->event_extra );
		$this->assertArrayHasKey( 'section-title', $extra, 'Extra data must include a section-title key.' );
		$this->assertEquals( $sectionTitle, $extra['section-title'], 'Detected section title must match' );
	}

	/**
	 * @return array All events in db sorted from oldest to newest
	 */
	protected function fetchAllEvents() {
		$res = $this->dbr->select( 'echo_event', [ '*' ], [], __METHOD__, [ 'ORDER BY' => 'event_id ASC' ] );

		return iterator_to_array( $res );
	}

	protected function signedMessage( $name, $content = 'Moar cowbell', $depth = 1 ) {
		return str_repeat( ':', $depth ) . " $content [[User:$name|$name]] ([[User talk:$name|$name]]) 00:17, 7 May 2013 (UTC)\n";
	}

}
