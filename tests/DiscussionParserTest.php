<?php

class EchoDiscussionParserTest extends MediaWikiTestCase {
	// TODO test cases for:
	// - generateEventsForRevision
	// - stripHeader
	// - stripIndents
	// - stripSignature
	// - getNotifiedUsersForComment

	public function testTimestampRegex() {
		$exemplarTimestamp = self::getExemplarTimestamp();
		$timestampRegex = EchoDiscussionParser::getTimestampRegex();

		$match = preg_match( '/' . $timestampRegex . '/u', $exemplarTimestamp );
		$this->assertEquals( 1, $match );
	}

	/**
	 * @dataProvider signingDetectionData
	 * FIXME some of the app logic is in the test...
	 */
	public function testSigningDetection( $line, $expectedUser ) {
		if ( !EchoDiscussionParser::isSignedComment( $line ) ) {
			$this->assertEquals( $expectedUser, false );
			return;
		}

		$tsPos = EchoDiscussionParser::getTimestampPosition( $line );
		$output = EchoDiscussionParser::getUserFromLine( $line, $tsPos );

		if ( $output === false ) {
			$this->assertEquals( false, $expectedUser );
		} elseif ( is_array( $expectedUser ) ) {
			// Sometimes testing for correct user detection,
			//  sometimes testing for offset detection
			$this->assertEquals( $expectedUser, $output );
		} else {
			$this->assertEquals( $expectedUser, $output[1] );
		}
	}

	public function signingDetectionData() {
		$ts = self::getExemplarTimestamp();
		return array(
			// Basic
			array( "I like this. [[User:Werdna]] ([[User talk:Werdna|talk]]) $ts", 'Werdna' ),
			// Confounding
			array( "[[User:Jorm]] is a meanie. --[[User:Werdna|Andrew]] $ts", "Werdna" ),
			// Talk page link only
			array( "[[User:Swalling|Steve]] is the best person I have ever met. --[[User talk:Werdna|Andrew]] $ts", 'Werdna' ),
			// Anonymous user
			array( "I am anonymous because I like my IP address. --[[Special:Contributions/127.0.0.1]] $ts", '127.0.0.1' ),
			// No signature
			array( "Well, I do think that [[User:Newyorkbrad]] is pretty cool, but what do I know?", false ),
			// Hash symbols in usernames
			array( "What do you think? [[User talk:We buried our secrets in the garden#top|wbositg]] $ts", 'We buried our secrets in the garden' ),
		);
	}

	/** @dataProvider diffData */
	public function testDiff( $oldText, $newText, $expected ) {
		$actual = EchoDiscussionParser::getMachineReadableDiff( $oldText, $newText );
		unset( $actual['_info'] );
		unset( $expected['_info'] );

		$this->assertEquals( $expected, $actual );
	}

	public function diffData() {
		return array(
			array(
				<<<TEXT
line 1
line 2
line 3
line 4
TEXT
				,<<<TEXT
line 1
line 3
line 4
TEXT
				,
				array( array(
					'action' => 'subtract',
					'content' => 'line 2',
					'left-pos' => 2,
					'right-pos' => 2,
				) )
			),
			array(
				<<<TEXT
line 1
line 2
line 3
line 4
TEXT
				,<<<TEXT
line 1
line 2
line 2.5
line 3
line 4
TEXT
				,
				array( array(
					'action' => 'add',
					'content' => 'line 2.5',
					'left-pos' => 3,
					'right-pos' => 3,
				) )
			),
			array(
				<<<TEXT
line 1
line 2
line 3
line 4
TEXT
				,<<<TEXT
line 1
line b
line 3
line 4
TEXT
				,
				array( array(
					'action' => 'change',
					'old_content' => 'line 2',
					'new_content' => 'line b',
					'left-pos' => 2,
					'right-pos' => 2,
				) )
			),
			array(
				<<<TEXT
line 1
line 2
line 3
line 4
TEXT
				,<<<TEXT
line 1
line b
line c
line d
line 3
line 4
TEXT
				,
				array(
					array(
						'action' => 'change',
						'old_content' => 'line 2',
						'new_content' => 'line b',
						'left-pos' => 2,
						'right-pos' => 2,
					),
					array(
						'action' => 'add',
						'content' => 'line c
line d',
						'left-pos' => 3,
						'right-pos' => 3,
					),
				),
			),
		);
	}

	/** @dataProvider annotationData */
	public function testAnnotation( $diff, $user, $expectedAnnotation ) {
		$actual = EchoDiscussionParser::interpretDiff( $diff, $user );
		$this->assertEquals( $expectedAnnotation, $actual );
	}

	public function annotationData() {
		$ts = self::getExemplarTimestamp();

		return array(
			array(
				// Diff
				array(
					// Action
					array(
						'action' => 'add',
						'content' => ":What do you think? [[User:Werdna]] $ts",
						'left-pos' => 3,
						'right-pos' => 3,
					),
					'_info' => array(
						'lhs' => array(
							'== Section 1 ==',
							"I do not like you. [[User:Jorm|Jorm]] $ts",
						),
						'rhs' => array(
							'== Section 1 ==',
							"I do not like you. [[User:Jorm|Jorm]] $ts",
							":What do you think? [[User:Werdna]] $ts",
						),
					),
				),
				// User
				'Werdna',
				// Expected annotation
				array(
					array(
						'type' => 'add-comment',
						'content' => ":What do you think? [[User:Werdna]] $ts",
						'full-section' => <<<TEXT
== Section 1 ==
I do not like you. [[User:Jorm|Jorm]] $ts
:What do you think? [[User:Werdna]] $ts
TEXT
					),
				),
			),
			array(
				// Diff
				array(
					// Action
					array(
						'action' => 'add',
						'content' => ":What do you think? [[User:Werdna]] $ts",
						'left-pos' => 3,
						'right-pos' => 3,
					),
					'_info' => array(
						'lhs' => array(
							'== Section 1 ==',
							"I do not like you. [[User:Jorm|Jorm]] $ts",
							'== Section 2 ==',
							"Well well well. [[User:DarTar]] $ts",
						),
						'rhs' => array(
							'== Section 1 ==',
							"I do not like you. [[User:Jorm|Jorm]] $ts",
							":What do you think? [[User:Werdna]] $ts",
							'== Section 2 ==',
							"Well well well. [[User:DarTar]] $ts",
						),
					),
				),
				// User
				'Werdna',
				// Expected annotation
				array(
					array(
						'type' => 'add-comment',
						'content' => ":What do you think? [[User:Werdna]] $ts",
						'full-section' => <<<TEXT
== Section 1 ==
I do not like you. [[User:Jorm|Jorm]] $ts
:What do you think? [[User:Werdna]] $ts
TEXT
					),
				),
			),
			array(
				// Diff
				array(
					// Action
					array(
						'action' => 'add',
						'content' => <<<TEXT
== Section 1a ==
Hmmm? [[User:Jdforrester]] $ts
TEXT
						,
						'left-pos' => 4,
						'right-pos' => 4,
					),
					'_info' => array(
						'lhs' => array(
							'== Section 1 ==',
							"I do not like you. [[User:Jorm|Jorm]] $ts",
							":What do you think? [[User:Werdna]] $ts",
							'== Section 2 ==',
							"Well well well. [[User:DarTar]] $ts",
						),
						'rhs' => array(
							'== Section 1 ==',
							"I do not like you. [[User:Jorm|Jorm]] $ts",
							":What do you think? [[User:Werdna]] $ts",
							'== Section 1a ==',
							'Hmmm? [[User:Jdforrester]] $ts',
							'== Section 2 ==',
							"Well well well. [[User:DarTar]] $ts",
						),
					),
				),
				// User
				'Jdforrester',
				// Expected annotation
				array(
					array(
						'type' => 'new-section-with-comment',
						'content' => <<<TEXT
== Section 1a ==
Hmmm? [[User:Jdforrester]] $ts
TEXT
						,
					),
				),
			),
		);
	}

	public static function getExemplarTimestamp() {
		$title = Title::newMainPage();
		$user = User::newFromName( 'Test' );
		$options = new ParserOptions;

		global $wgParser;
		$exemplarTimestamp =
			$wgParser->preSaveTransform( '~~~~~', $title, $user, $options );

		return $exemplarTimestamp;
	}
}
