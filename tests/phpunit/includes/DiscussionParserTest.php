<?php

/**
 * @group Echo
 * @group Database
 */
class EchoDiscussionParserTest extends MediaWikiTestCase {
	/**
	 * @var array
	 */
	protected $tablesUsed = array( 'user' );

	/**
	 * @var array
	 */
	protected $testusers = array(
		// username
		'Werdna' => array(
			// user preferences
			'nickname' => '',
			'fancysig' => '0',
		),
		'Werdna2' => array(
			'nickname' => '[[User:Werdna2|Andrew]]',
			'fancysig' => '1',
		),
		'Werdna3' => array(
			'nickname' => '[[User talk:Werdna3|Andrew]]',
			'fancysig' => '1',
		),
		'Werdna4' => array(
			'nickname' => '[[User:Werdna4|wer]dna]]',
			'fancysig' => '1',
		),
		'We buried our secrets in the garden' => array(
			'nickname' => '[[User talk:We buried our secrets in the garden#top|wbositg]]',
			'fancysig' => '1',
		),
		'I Heart Spaces' => array(
			'nickname' => '[[User:I_Heart_Spaces]] ([[User_talk:I_Heart_Spaces]])',
			'fancysig' => '1',
		),
		'Jam' => array(
			'nickname' => '[[User:Jam]]',
			'fancysig' => '1',
		),
		'Reverta-me' => array(
			'nickname' => "[[User:Reverta-me|<span style=\"font-size:13px; color:blue;font-family:Lucida Handwriting;text-shadow:aqua 5px 3px 12px;\">Aaaaa Bbbbbbb</span>]]'' <sup>[[User Talk:Reverta-me|<font color=\"gold\" face=\"Lucida Calligraphy\">Discussão</font>]]</sup>''",
			'fancysig' => '1',
		),
		'Jorm' => array(
			'nickname' => '',
			'fancysig' => '0',
		),
		'Jdforrester' => array(
			'nickname' => '',
			'fancysig' => '0',
		),
		'DarTar' => array(
			'nickname' => '',
			'fancysig' => '0',
		),
		'Bsitu' => array(
			'nickname' => '',
			'fancysig' => '0',
		),
		'JarJar' => array(
			'nickname' => '',
			'fancysig' => '0',
		),
		'Schnark' => array(
			'nickname' => '[[User:Schnark]] ([[User:Schnark/js|js]])',
			'fancysig' => '1',
		),
		'Cwobeel' => array(
			'nickname' => '[[User:Cwobeel|<span style="color:#339966">Cwobeel</span>]] [[User_talk:Cwobeel|<span style="font-size:80%">(talk)</span>]]',
			'fancysig' => '1',
		),
	);

	protected function setUp() {
		parent::setUp();

		// we only need to add these users once, we won't (can't) tear them down anyway
		static $executed = false;
		if ( $executed === true ) {
			return;
		}

		foreach ( $this->testusers as $username => $preferences ) {
			$user = User::createNew( $username );

			// set signature preferences
			if ( $user ) {
				foreach ( $preferences as $option => $value ) {
					$user->setOption( $option, $value );
				}
				$user->saveSettings();
			}
		}

		$executed = true;
	}

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

		$output = EchoDiscussionParser::getUserFromLine( $line );

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
			array(
				"I like this. [[User:Werdna|Werdna]] ([[User talk:Werdna|talk]]) $ts",
				array(
					13,
					'Werdna'
				),
			),
			// Confounding
			array(
				"[[User:Jorm]] is a meanie. --[[User:Werdna2|Andrew]] $ts",
				array(
					29,
					"Werdna2"
				),
			),
			// Talk page link only
			array(
				"[[User:Swalling|Steve]] is the best person I have ever met. --[[User talk:Werdna3|Andrew]] $ts",
				array(
					62,
					'Werdna3'
				),
			),
			// Anonymous user
			array(
				"I am anonymous because I like my IP address. --[[Special:Contributions/127.0.0.1|127.0.0.1]] $ts",
				array(
					47,
					'127.0.0.1'
				),
			),
			// No signature
			array(
				"Well, \nI do think that [[User:Newyorkbrad]] is pretty cool, but what do I know?", 
				false
			),
			// Hash symbols in usernames
			array(
				"What do you think? [[User talk:We buried our secrets in the garden#top|wbositg]] $ts",
				array(
					19,
					'We buried our secrets in the garden'
				),
			),
			// Title that gets normalized different than it is provided in the wikitext
			array(
				"Beep boop [[User:I_Heart_Spaces]] ([[User_talk:I_Heart_Spaces]]) $ts",
				array(
					strlen( "Beep boop " ),
					'I Heart Spaces'
				),
			),
			// Accepts ] in the pipe
			array(
				"Shake n Bake --[[User:Werdna4|wer]dna]] $ts",
				array(
					strlen( "Shake n Bake --" ),
					'Werdna4',
				),
			),

			array(
				"xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxã? [[User:Jam]] $ts",
				array(
					strlen( "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxã? " ),
					"Jam"
				),
			),
			// extra long signature
			array(
				"{{U|He7d3r}}, xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxã? [[User:Reverta-me|<span style=\"font-size:13px; color:blue;font-family:Lucida Handwriting;text-shadow:aqua 5px 3px 12px;\">Aaaaa Bbbbbbb</span>]]'' <sup>[[User Talk:Reverta-me|<font color=\"gold\" face=\"Lucida Calligraphy\">Discussão</font>]]</sup>''",
				array(
					strlen( "{{U|He7d3r}}, xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxã? " ),
					'Reverta-me',
				),
			),
			// Bug: T87852
			array(
				"Test --[[User:Schnark]] ([[User:Schnark/js|js]])",
				array(
					strlen( "Test --" ),
					'Schnark',
				),
			),
			// when adding additional tests, make sure to add the non-anon users
			// to EchoDiscussionParserTest::$testusers - the DiscussionParser
			// needs the users to exist, because it'll generate a comparison
			// signature, which is different when the user is considered anon
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
						'content' => ":What do you think? [[User:Werdna|Werdna]] ([[User talk:Werdna|talk]]) $ts",
						'left-pos' => 3,
						'right-pos' => 3,
					),
					'_info' => array(
						'lhs' => array(
							'== Section 1 ==',
							"I do not like you. [[User:Jorm|Jorm]] ([[User talk:Jorm|talk]]) $ts",
						),
						'rhs' => array(
							'== Section 1 ==',
							"I do not like you. [[User:Jorm|Jorm]] ([[User talk:Jorm|talk]]) $ts",
							":What do you think? [[User:Werdna|Werdna]] ([[User talk:Werdna|talk]]) $ts",
						),
					),
				),
				// User
				'Werdna',
				// Expected annotation
				array(
					array(
						'type' => 'add-comment',
						'content' => ":What do you think? [[User:Werdna|Werdna]] ([[User talk:Werdna|talk]]) $ts",
						'full-section' => <<<TEXT
== Section 1 ==
I do not like you. [[User:Jorm|Jorm]] ([[User talk:Jorm|talk]]) $ts
:What do you think? [[User:Werdna|Werdna]] ([[User talk:Werdna|talk]]) $ts
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
						'content' => ":What do you think? [[User:Werdna|Werdna]] ([[User talk:Werdna|talk]]) $ts",
						'left-pos' => 3,
						'right-pos' => 3,
					),
					'_info' => array(
						'lhs' => array(
							'== Section 1 ==',
							"I do not like you. [[User:Jorm|Jorm]] ([[User talk:Jorm|talk]]) $ts",
							'== Section 2 ==',
							"Well well well. [[User:DarTar|DarTar]] ([[User talk:DarTar|talk]]) $ts",
						),
						'rhs' => array(
							'== Section 1 ==',
							"I do not like you. [[User:Jorm|Jorm]] ([[User talk:Jorm|talk]]) $ts",
							":What do you think? [[User:Werdna|Werdna]] ([[User talk:Werdna|talk]]) $ts",
							'== Section 2 ==',
							"Well well well. [[User:DarTar|DarTar]] ([[User talk:DarTar|talk]]) $ts",
						),
					),
				),
				// User
				'Werdna',
				// Expected annotation
				array(
					array(
						'type' => 'add-comment',
						'content' => ":What do you think? [[User:Werdna|Werdna]] ([[User talk:Werdna|talk]]) $ts",
						'full-section' => <<<TEXT
== Section 1 ==
I do not like you. [[User:Jorm|Jorm]] ([[User talk:Jorm|talk]]) $ts
:What do you think? [[User:Werdna|Werdna]] ([[User talk:Werdna|talk]]) $ts
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
Hmmm? [[User:Jdforrester|Jdforrester]] ([[User talk:Jdforrester|talk]]) $ts
TEXT
						,
						'left-pos' => 4,
						'right-pos' => 4,
					),
					'_info' => array(
						'lhs' => array(
							'== Section 1 ==',
							"I do not like you. [[User:Jorm|Jorm]] ([[User talk:Jorm|talk]]) $ts",
							":What do you think? [[User:Werdna|Werdna]] ([[User talk:Werdna|talk]]) $ts",
							'== Section 2 ==',
							"Well well well. [[User:DarTar|DarTar]] ([[User talk:DarTar|talk]]) $ts",
						),
						'rhs' => array(
							'== Section 1 ==',
							"I do not like you. [[User:Jorm|Jorm]] ([[User talk:Jorm|talk]]) $ts",
							":What do you think? [[User:Werdna|Werdna]] ([[User talk:Werdna|talk]]) $ts",
							'== Section 1a ==',
							'Hmmm? [[User:Jdforrester|Jdforrester]] ([[User talk:Jdforrested|talk]]) $ts',
							'== Section 2 ==',
							"Well well well. [[User:DarTar|DarTar]] ([[User talk:DarTar|talk]]) $ts",
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
Hmmm? [[User:Jdforrester|Jdforrester]] ([[User talk:Jdforrester|talk]]) $ts
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
I do not like you. [[User:Jorm|Jorm]] ([[User talk:Jorm|talk]]) $ts
:What do you think? [[User:Werdna|Werdna]] ([[User talk:Werdna|talk]]) $ts
== Section 2 ==
Well well well. [[User:DarTar|DarTar]] ([[User talk:DarTar|talk]]) $ts
== Section 3 ==
Hai [[User:Bsitu|Bsitu]] ([[User talk:Bsitu|talk]]) $ts
TEXT
					,
					<<<TEXT
== Section 1 ==
I do not like you. [[User:Jorm|Jorm]] ([[User talk:Jorm|talk]]) $ts
:What do you think? [[User:Werdna|Werdna]] ([[User talk:Werdna|talk]]) $ts
:New Comment [[User:JarJar|JarJar]] ([[User talk:JarJar|talk]]) $ts
== Section 2 ==
Well well well. [[User:DarTar|DarTar]] ([[User talk:DarTar|talk]]) $ts
== Section 3 ==
Hai [[User:Bsitu|Bsitu]] ([[User talk:Bsitu|talk]]) $ts
:Other New Comment [[User:JarJar|JarJar]] ([[User talk:JarJar|talk]]) $ts
TEXT
				),
				// User
				'JarJar',
				// Expected annotation
				array(
					array(
						'type' => 'add-comment',
						'content' => ":New Comment [[User:JarJar|JarJar]] ([[User talk:JarJar|talk]]) $ts",
						'full-section' => <<<TEXT
== Section 1 ==
I do not like you. [[User:Jorm|Jorm]] ([[User talk:Jorm|talk]]) $ts
:What do you think? [[User:Werdna|Werdna]] ([[User talk:Werdna|talk]]) $ts
:New Comment [[User:JarJar|JarJar]] ([[User talk:JarJar|talk]]) $ts
TEXT
					),
					array(
						'type' => 'add-comment',
						'content' => ":Other New Comment [[User:JarJar|JarJar]] ([[User talk:JarJar|talk]]) $ts",
						'full-section' => <<<TEXT
== Section 3 ==
Hai [[User:Bsitu|Bsitu]] ([[User talk:Bsitu|talk]]) $ts
:Other New Comment [[User:JarJar|JarJar]] ([[User talk:JarJar|talk]]) $ts
TEXT
					),
				),
			),

			array(
				'Bug T78424',
				EchoDiscussionParser::getMachineReadableDiff(
					<<<TEXT
== Washington Post Reception Source ==

''The Boston Post'' source that was used in the reception section has a couple of problems. First, it's actually a repost of ''The Washington Post'', but ''The Washington Post'' doesn't allow the Internet Archive to preserve it. Should it still be sourced to Boston or to Washington? Second, it seems to be a lot of analysis that can't be summed up easily without trimming it out, and doesn't really fit with the reception section and should probably moved next to Wilson's testimony. Any suggestions? --[[User:RAN1|RAN1]] ([[User talk:RAN1|talk]]) 01:44, 11 December 2014 (UTC)
TEXT
					,
					<<<TEXT
== Washington Post Reception Source ==

''The Boston Post'' source that was used in the reception section has a couple of problems. First, it's actually a repost of ''The Washington Post'', but ''The Washington Post'' doesn't allow the Internet Archive to preserve it. Should it still be sourced to Boston or to Washington? Second, it seems to be a lot of analysis that can't be summed up easily without trimming it out, and doesn't really fit with the reception section and should probably moved next to Wilson's testimony. Any suggestions? --[[User:RAN1|RAN1]] ([[User talk:RAN1|talk]]) 01:44, 11 December 2014 (UTC)

== Grand jury no bill reception ==

{{u|Bob K31416}} has started a process of summarizing that section, in a manner that I believe it to be counter productive. We have expert opinions from legal, law enforcement, politicians, and media outlets all of which are notable and informative. [[WP:NOTPAPER|Wikipedia is not paper]] – If the section is too long, the correct process to avoid losing good content that is well sources, is to create a sub-article with all the detail, and summarize here per [[WP:SUMMARY]]. But deleting useful and well sourced material, is not acceptable. We are here to build an encyclopedia. - [[User:Cwobeel|<span style="color:#339966">Cwobeel</span>]] [[User_talk:Cwobeel|<span style="font-size:80%">(talk)</span>]] 16:02, 11 December 2014 (UTC)
TEXT
				),
				// User
				'Cwobeel',
				// Expected annotation
				array(
					array(
						'type' => 'new-section-with-comment',
						'content' => '== Grand jury no bill reception ==

{{u|Bob K31416}} has started a process of summarizing that section, in a manner that I believe it to be counter productive. We have expert opinions from legal, law enforcement, politicians, and media outlets all of which are notable and informative. [[WP:NOTPAPER|Wikipedia is not paper]] – If the section is too long, the correct process to avoid losing good content that is well sources, is to create a sub-article with all the detail, and summarize here per [[WP:SUMMARY]]. But deleting useful and well sourced material, is not acceptable. We are here to build an encyclopedia. - [[User:Cwobeel|<span style="color:#339966">Cwobeel</span>]] [[User_talk:Cwobeel|<span style="font-size:80%">(talk)</span>]] 16:02, 11 December 2014 (UTC)',
					),
				),
			),
			// when adding additional tests, make sure to add the non-anon users
			// to EchoDiscussionParserTest::$testusers - the DiscussionParser
			// needs the users to exist, because it'll generate a comparison
			// signature, which is different when the user is considered anon
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
		$name = 'Werdna'; // See EchoDiscussionParserTest::$testusers
		$comment = self::signedMessage( $name );

		return array(
			array(
				'Must detect first sub heading when inserting in the middle of two sub headings',
				// expected header content
				'Sub Heading 1',
				// test content format
				"
== Heading ==
$comment

== Sub Heading 1 ==
$comment
%s

== Sub Heading 2 ==
$comment
				",
				// user signing new comment
				$name
			),

			array(
				'Must detect second sub heading when inserting in the end of two sub headings',
				// expected header content
				'Sub Heading 2',
				// test content format
				"
== Heading ==
$comment

== Sub Heading 1 ==
$comment

== Sub Heading 2 ==
$comment
%s
				",
				// user signing new comment
				$name
			),

			array(
				'Commenting in multiple sub-headings must result in no section link',
				// expected header content
				'',
				// test content format
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
				// user signing new comment
				$name
			),

			array(
				'Must accept headings without a space between the = and the section name',
				// expected header content
				'Heading',
				// test content format
				"
==Heading==
$comment
%s
				",
				// user signing new comment
				$name
			),

			array(
				'Must not accept invalid headings split with a return',
				// expected header content
				'',
				// test content format
				"
==Some
Heading==
$comment
%s
				",
				// user signing new comment
				$name
			),
		);
	}

	/**
	 * @dataProvider provider_detectSectionTitleAndText
	 */
	public function testDetectSectionTitleAndText( $message, $expect, $format, $name ) {
		// str_replace because we want to replace multiple instances of '%s' with the same value
		$before = str_replace( '%s', '', $format );
		$after = str_replace( '%s', self::signedMessage( $name ), $format );

		$diff = EchoDiscussionParser::getMachineReadableDiff( $before, $after );
		$interp = EchoDiscussionParser::interpretDiff( $diff, $name );

		// There should be a section-text only if there is section-title
		$expectText = $expect ? self::message( $name ) : '';
		$this->assertEquals(
			array( 'section-title' => $expect, 'section-text' => $expectText ),
			EchoDiscussionParser::detectSectionTitleAndText( $interp ),
			$message
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
