<?php

class EchoDiffParserTest extends MediaWikiTestCase {

	/**
	 * @dataProvider provider_getChangeSet
	 */
	public function testGetChangeSet( $message, array $expect, $leftText, $rightText ) {
		$changeSet = EchoDiscussionParser::getMachineReadableDiff( $leftText, $rightText );
		unset( $changeSet['_info'] );
		$this->assertEquals( $expect, $changeSet, $message );
	}

	static public function provider_getChangeSet() {
		return array(

			array(
				'Duplicate content must generate no changes',
				// Expected change set
				array(),
				// Left text
				"a\nb\nc",
				// Right text
				"a\nb\nc",
			),

			array(
				'Removing blank lines must generate no changes',
				// Expected change set
				array(),
				// Left text
				"a\n\nb\n\nc",
				// Right text
				"a\nb\nc\n",
			),

			array(
				'Must generate a single add change with only lines added',
				// Expected change set
				array( self::mockAction( 'add', "foo\nbar", 1 ) ),
				// Left
				"something",
				// Right
				"foo\nbar\nsomething",
			),

			array(
				'Must generate a single subtract change with only lines subtracted',
				// Expected change set
				array( self::mockAction( 'subtract', "Zomg\nHiHiHi", 2 ) ),
				// Left
				"dummy\nZomg\nHiHiHi",
				// Right
				"dummy",
			),

			array(
				'Adding content seperated by no change must generate multiple changes',
				// Expected change set
				array(
					self::mockAction( 'add', 'b1', 3 ),
					self::mockAction( 'add', "d1\nd2", 5, 6 ),
				),
				// Left text
				"a\nb\nc\nd\ne\nf",
				// Right text
				"a\nb\nb1\nc\nd\nd1\nd2\ne\nf",
			),

			array(
				'Extra blank lines on the edges must be trimmed',
				// Expected change set
				array( self::mockAction( 'add', "Zomg\nHiHiHi", 1 ) ),
				// Left text
				"",
				// Right text
				"\nZomg\nHiHiHi\n",
			),

			array(
				'Extra blank lines inside the content must not be trimmed',
				// Expected change set
				array( self::mockAction( 'add', "\nZomg\nHiHiHi\n", 2 ) ),
				// Left text
				"foo\nbar",
				// Right text
				"foo\n\nZomg\nHiHiHi\n\nbar",
			),

			array(
				'A blank line replaced with content must be an add',
				// Expected change set
				array( self::mockAction( 'add', 'cowbell', 1 ) ),
				// Left Text
				"",
				// Right Text
				"cowbell",
			),

			array(
				'A blanked out line must be a subtraction',
				// Expected change set
				array( self::mockAction( 'subtract', 'cowbell', 1 ) ),
				// Left text
				"cowbell",
				// Right text
				"",
			),

			array(
				'A line with its content replaced must be a change',
				// Expected change set
				array( self::mockChange( 'Its all about the journey', 'dummy', 1 ) ),
				// Left text
				"Its all about the journey",
				// Right text
				"dummy",
			),

			array(
				'Changing lines and adding more must result in two changes',
				// Expected change set
				array(
					self::mockChange( 'Must be in a hurry to finish this thing', 'Must be in a hurry', 1 ),
					self::mockAction( 'add', 'Finish this thing', 2 ),
				),
				// Left text
				"Must be in a hurry to finish this thing",
				// Right text
				"Must be in a hurry\nFinish this thing",
			),

			array(
				'Changing multiple lines and adding more must result in two changes',
				// Expected change set
				array(
					self::mockChange( "Must not be\nin much of a hurry", "Must be\nin a hurry", 2 ),
					self::mockAction( 'subtract', "to finish\nthis thing", 4 ),
				),
				// Left text
				"abc\nMust not be\nin much of a hurry\nto finish\nthis thing",
				// Right text
				"abc\nMust be\nin a hurry",
			),

			array(
				'Must generate multiple add, change, and subtract actions',
				// Expected change set
				array(
					self::mockChange( "abc\nSome", "Other\nThings", 1 ),
					self::mockAction( 'subtract', "Stuff", 3 ),
					self::mockChange( "And\nThen", "There\nWas", 6, 5 ),
					self::mockAction( 'add', 'Fencing', 8, 7 ),
				),
				// Left text
				"abc\nSome\nStuff\ndef\nghi\nAnd\nThen\njkl\nmno",
				// Right text
				"\nOther\nThings\ndef\nghi\nThere\nWas\nFencing\njkl\nmno",
			),
		);
	}

	static protected function mockAction( $action, $content, $left, $right = null ) {
		if ( $right === null ) {
			$right = $left;
		}
		return array(
			'action' => $action,
			'content' => $content,
			'left-pos' => $left,
			'right-pos' => $right,
		);
	}

	static public function mockChange( $oldContent, $newContent, $left, $right = null ) {
		if ( $right === null ) {
			$right = $left;
		}
		return array(
			'action' => 'change',
			'old_content' => $oldContent,
			'new_content' => $newContent,
			'left-pos' => $left,
			'right-pos' => $right,
		);
	}
}
