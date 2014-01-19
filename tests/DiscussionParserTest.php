<?php

class EchoDiscussionParserTest extends MediaWikiTestCase {
	// TODO test cases for:
	// - generateEventsForRevision
	// - stripHeader
	// - stripIndents
	// - stripSignature
	// - getNotifiedUsersForComment

	public function testDiscussionParserAcceptsInternalDiff() {
		global $wgDiff;

		$origWgDiff = $wgDiff;
		$wgDiff = '/does/not/exist/or/at/least/we/hope/not';
		try {
			$res = EchoDiscussionParser::getMachineReadableDiff(
				<<<TEXT
line 1
line 2
line 3
line 4
TEXT
				,
				<<<TEXT
line 1
line c
line 4
TEXT
			);
		} catch ( MWException $e ) {
			$wgDiff = $origWgDiff;
			throw $e;
		}
		$wgDiff = $origWgDiff;

		// Test failure occurs when MWException is thrown due to parsing failure
		$this->assertTrue( true );
	}

	public function testTimestampRegex() {
		$exemplarTimestamp = self::getExemplarTimestamp();
		$timestampRegex = EchoDiscussionParser::getTimestampRegex();

		$match = preg_match( '/' . $timestampRegex . '/u', $exemplarTimestamp );
		$this->assertEquals( 1, $match );
	}

	public function testGetTimestampPosition() {
		$line = 'Hello World. '. self::getExemplarTimestamp();
		$pos = EchoDiscussionParser::getTimestampPosition( $line );
		$this->assertEquals( 13, $pos );
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
	public function testAnnotation( $message, $diff, $user, $expectedAnnotation ) {
		$actual = EchoDiscussionParser::interpretDiff( $diff, $user );
		$this->assertEquals( $expectedAnnotation, $actual, $message );
	}

	public function annotationData() {
		$ts = self::getExemplarTimestamp();

		return array(

			array(
				'Must detect added comments',
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
				'Full Section must not include the following pre-existing section',
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
				'Must detect new-section-with-comment when a new section is added',
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

			array(
				'Must detect multiple added comments when multiple sections are edited',
				EchoDiscussionParser::getMachineReadableDiff(
					<<<TEXT
== Section 1 ==
I do not like you. [[User:Jorm|Jorm]] $ts
:What do you think? [[User:Werdna]] $ts
== Section 2 ==
Well well well. [[User:DarTar]] $ts
== Section 3 ==
Hai [[User:Bsitu]] $ts
TEXT
					,
					<<<TEXT
== Section 1 ==
I do not like you. [[User:Jorm|Jorm]] $ts
:What do you think? [[User:Werdna]] $ts
:New Comment [[User:JarJar]] $ts
== Section 2 ==
Well well well. [[User:DarTar]] $ts
== Section 3 ==
Hai [[User:Bsitu]] $ts
:Other New Comment [[User:JarJar]] $ts
TEXT
				),
				// User
				'JarJar',
				// Expected annotation
				array(
					array(
						'type' => 'add-comment',
						'content' => ":New Comment [[User:JarJar]] $ts",
						'full-section' => <<<TEXT
== Section 1 ==
I do not like you. [[User:Jorm|Jorm]] $ts
:What do you think? [[User:Werdna]] $ts
:New Comment [[User:JarJar]] $ts
TEXT
					),
					array(
						'type' => 'add-comment',
						'content' => ":Other New Comment [[User:JarJar]] $ts",
						'full-section' => <<<TEXT
== Section 3 ==
Hai [[User:Bsitu]] $ts
:Other New Comment [[User:JarJar]] $ts
TEXT
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

	static public function provider_detectSectionTitleAndText() {
		$name = 'TestUser';
		$mention = 'Someone';
		$comment = self::signedMessage( $name );

		return array(
			array(
				'Must detect first sub heading when inserting in the middle of two sub headings',
				'Sub Heading 1',
				"
== Heading ==
$comment

== Sub Heading 1 ==
$comment
%s

== Sub Heading 2 ==
$comment
				",
				$name
			),

			array(
				'Must detect second sub heading when inserting in the end of two sub headings',
				'Sub Heading 2',
				"
== Heading ==
$comment

== Sub Heading 1 ==
$comment

== Sub Heading 2 ==
$comment
%s
				",
				$name
			),

			array(
				'Commenting in multiple sub-headings must result in no section link',
				'',
				"
== Heading ==
$comment

== Sub Heading 1 ==
$comment
%s

== Sub Heading 2 ==
$comment
%s

				",
				$name
			),

			array(
				'Must accept headings without a space between the = and the section name',
				'Heading',
				"
==Heading==
$comment
%s
				",
				$name
			),

			array(
				'Must not accept invalid headings split with a return',
				'',
				"
==Some
Heading==
$comment
%s
				",
				$name
			),
		);
	}

	/**
	 * @dataProvider provider_detectSectionTitleAndText
	 */
	public function testdetectSectionTitleAndText( $message, $expect, $format, $name ) {
		// str_replace because we want to replace multiple instances of '%s' with the same valueA
		$before = str_replace( '%s', '', $format );
		$after = str_replace( '%s', self::signedMessage( $name ), $format );

		$diff = EchoDiscussionParser::getMachineReadableDiff( $before, $after );
		$interp = EchoDiscussionParser::interpretDiff( $diff, $name );

		// There should be a section-text only if there is section-title
		$expectText = $expect ? self::message( $name ) : '';
		$this->assertEquals(
			array( 'section-title' => $expect, 'section-text' => $expectText ),
			EchoDiscussionParser::detectSectionTitleAndText( $interp, $message )
		);
	}

	protected static function signedMessage( $name ) {
		return ": " . self::message() . " [[User:$name|$name]] ([[User talk:$name|talk]]) 00:17, 7 May 2013 (UTC)";
	}

	protected static function message() {
		return 'foo';
	}

	static public function provider_getFullSection() {
		$tests = array(
			array(
				'Extracts full section',
				// Full document content
				<<<TEXT
==Header 1==
foo
===Header 2===
bar
==Header 3==
baz
TEXT
				,
				// Map of Line numbers to expanded section content
				array(
					1 => "==Header 1==\nfoo",
					2 => "==Header 1==\nfoo",
					3 => "===Header 2===\nbar",
					4 => "===Header 2===\nbar",
					5 => "==Header 3==\nbaz",
					6 => "==Header 3==\nbaz",
				),
			),
		);

		// Allow for setting an array of line numbers to expand from rather than
		// just a single line number
		$retval = array();
		foreach ( $tests as $test ) {
			foreach ( $test[2] as $lineNum => $expected ) {
				$retval[] = array(
					$test[0],
					$expected,
					$test[1],
					$lineNum,
				);
			}
		}

		return $retval;
	}

	/**
	 * @dataProvider provider_getFullSection
	 */
	public function testGetFullSection( $message, $expect, $lines, $startLineNum ) {
		$section = EchoDiscussionParser::getFullSection( explode( "\n", $lines ), $startLineNum );
		$this->assertEquals( $expect, $section, $message );
	}

	public function testGetSectionCount() {
		$one = "==Zomg==\nfoobar\n";
		$two = "===SubZomg===\nHi there\n";
		$three = "==Header==\nOh Hai!\n";

		$this->assertEquals( 1, EchoDiscussionParser::getSectionCount( $one ) );
		$this->assertEquals( 2, EchoDiscussionParser::getSectionCount( $one . $two ) );
		$this->assertEquals( 2, EchoDiscussionParser::getSectionCount( $one . $three ) );
		$this->assertEquals( 3, EchoDiscussionParser::getSectionCount( $one . $two . $three ) );
	}
}
