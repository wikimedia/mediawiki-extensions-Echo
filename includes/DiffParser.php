<?php
/**
 * MediaWiki Extension: Echo
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * This program is distributed WITHOUT ANY WARRANTY.
 */

/**
 *
 * @file
 * @ingroup Extensions
 * @author Erik Bernhardson
 */

/**
 * Calculates the individual sets of differences between two pieces of text
 * as individual groupings of add, subtract, and change actions. Internally
 * uses 0-indexing for positions.  All results from the class are 1 indexed
 * to stay consistent with the origional diff output and the previous diff
 * parsing code.
 */
class EchoDiffParser {

	/**
	 * @var integer $prefixLength The number of characters the diff prefixes a line with
	 */
	protected $prefixLength = 1;

	/**
	 * @var array $left The text of the left side of the diff operation
	 */
	protected $left;

	/**
	 * @var integer $leftPos The current position within the left text
	 */
	protected $leftPos;

	/**
	 * @var array $right The text of the right side of the diff operation
	 */
	protected $right;

	/**
	 * @var integer $rightPos The current position within the right text
	 */
	protected $rightPos;

	/**
	 * @var array $changeSet Set of add, subtract, or change operations within the diff
	 */
	protected $changeSet;

	/**
	 * Get the set of add, subtract, and change operations required to transform leftText into rightText
	 *
	 * @param string $leftText The left, or old, revision of the text
	 * @param string $rightText The right, or new, revision of the text
	 * @return array Array of arrays containing changes to individual groups of lines within the text
	 * Each change consists of:
	 * An 'action', one of:
	 * - add
	 * - subtract
	 * - change
	 * 'content' that was added or removed, or in the case
	 *     of a change, 'old_content' and 'new_content'
	 * 'left_pos' and 'right_pos' (in 1-indexed lines) of the change.
	 */
	public function getChangeSet( $leftText, $rightText ) {
		/**
		 * The internal diff utility, which is used when GNU diff is not available
		 * prefixes lines with 2 characters instead of 1.
		 * For more info see bug 41689.
		 */
		if ( self::usingInternalDiff() ) {
			$this->prefixLength = 2;
		} else {
			$this->prefixLength = 1;
		}

		$left = trim( $leftText ) . "\n";
		$right = trim( $rightText ) . "\n";
		$diff = wfDiff( $left, $right, '-u -w' );

		return $this->parse( $diff, $left, $right );
	}

	/**
	 * Duplicates the check from the global wfDiff function to determine
	 * if we are using internal or external diff utilities
	 */
	static protected function usingInternalDiff() {
		global $wgDiff;

		wfSuppressWarnings();
		$haveDiff = $wgDiff && file_exists( $wgDiff );
		wfRestoreWarnings();

		return !$haveDiff;
	}

	/**
	 * Parse the unified diff output into an array of changes to individual groups of the text
	 *
	 * @param string $diff The unified diff output
	 * @param string $left The left side of the diff used for sanity checks
	 * @param string $right The right side of the diff used for sanity checks
	 */
	protected function parse( $diff, $left, $right ) {
		$this->left = explode( "\n", $left );
		$this->right = explode( "\n", $right );
		$diff = explode( "\n", $diff );

		$this->leftPos = 0;
		$this->rightPos = 0;
		$this->changeSet = array(
			'_info' => array(
				'lhs-length' => count( $this->left ),
				'rhs-length' => count( $this->right ),
				'lhs' => $this->left,
				'rhs' => $this->right,
			),
		);

		$change = null;
		foreach ( $diff as $line ) {
			$change = $this->parseLine( $line, $change );
		}
		if ( $change === null ) {
			return $this->changeSet;
		} else {
			return array_merge( $this->changeSet, $change->getChangeSet() );
		}
	}

	/**
	 * Parse the next line of the unified diff output
	 *
	 * @param string $line The next line of the unified diff
	 * @param EchoDiffGroup $change Changes the the immediately previous lines
	 * @return EchoDiffGroup Changes to this line and any changed lines immediately previous
	 */
	protected function parseLine( $line, EchoDiffGroup $change = null ) {
		if ( $line ) {
			$op = $line[0];
			if ( strlen( $line ) > $this->prefixLength ) {
				$line = substr( $line, $this->prefixLength );
			} else {
				$line = '';
			}
		}  else {
			$op = ' ';
		}

		switch( $op ) {
		case '@': // metadata
			if ( $change !== null ) {
				$this->changeSet = array_merge( $this->changeSet, $change->getChangeSet() );
				$change = null;
			}
			// @@ -start,numLines +start,numLines @@
			list( $at, $left, $right, $at ) = explode( ' ', $line );
			list( $this->leftPos ) = explode( ',', substr( $left, 1 ) );
			list( $this->rightPos ) = explode( ',', substr( $right, 1 ) );

			// -1 because diff is 1 indexed and we are 0 indexed
			$this->leftPos--;
			$this->rightPos--;
			break;

		case ' ': // No changes
			if ( $change !== null ) {
				$this->changeSet = array_merge( $this->changeSet, $change->getChangeSet() );
				$change = null;
			}
			$this->leftPos++;
			$this->rightPos++;
			break;

		case '-': // subtract
			if ( $this->left[$this->leftPos] !== $line ) {
				throw new MWException( 'Positional error: left' );
			}
			if ( $change === null ) {
				$change = new EchoDiffGroup( $this->leftPos, $this->rightPos );
			}
			$change->subtract( $line );
			$this->leftPos++;
			break;

		case '+': // add
			if ( $this->right[$this->rightPos] !== $line ) {
				throw new MWException( 'Positional error: right' );
			}
			if ( $change === null ) {
				$change = new EchoDiffGroup( $this->leftPos, $this->rightPos );
			}
			$change->add( $line );
			$this->rightPos++;
			break;

		default:
			throw new MWException( 'Unknown Diff Operation: ' . $op );
		}

		return $change;
	}
}

/**
 * Represents a single set of changes all effecting neighboring lines
 */
class EchoDiffGroup {
	/**
	 * @var array The left and right position this change starts at
	 */
	protected $position;

	/**
	 * @var array The lines that have been added
	 */
	protected $new = array();

	/**
	 * @var array The lines that have been removed
	 */
	protected $old = array();

	/**
	 * @param integer $leftPos The starting line number in the left text
	 * @param integer $rightPos The starting line number in the right text
	 */
	public function __construct( $leftPos, $rightPos ) {
		// +1 due to the origional code use 1 indexing for this result
		$this->position = array(
			'right-pos' => $rightPos + 1,
			'left-pos' => $leftPos + 1,
		);
	}

	/**
	 * @param string $line Line in the right text but not in the left
	 */
	public function add( $line ) {
		$this->new[] = $line;
	}

	/**
	 * @param string $line Line in the left text but not in the right
	 */
	public function subtract( $line ) {
		$this->old[] = $line;
	}

	/**
	 * @return array set of changes
	 * Each change consists of:
	 * An 'action', one of:
	 *   - add
	 *   - subtract
	 *   - change
	 * 'content' that was added or removed, or in the case
	 *    of a change, 'old_content' and 'new_content'
	 * 'left_pos' and 'right_pos' (in 1-indexed lines) of the change.
	 */
	public function getChangeSet() {
		$old = implode( "\n", $this->old );
		$new = implode( "\n", $this->new );
		$position = $this->position;
		$changeSet = array();

		// The implodes must come first because we consider array( '' ) to also be false
		// meaning a blank link replaced with content is an addition
		if ( $old && $new ) {
			$min = min( count( $this->old ), count( $this->new ) );
			$changeSet[] = $position + array(
				'action' => 'change',
				'old_content' => implode( "\n", array_slice( $this->old, 0, $min ) ),
				'new_content' => implode( "\n", array_slice( $this->new, 0, $min ) ),
			);
			$position['left-pos'] += $min;
			$position['right-pos'] += $min;
			$old = implode( "\n", array_slice( $this->old, $min ) );
			$new = implode( "\n", array_slice( $this->new, $min ) );
		}

		if ( $new ) {
			$changeSet[] = $position + array(
				'action' => 'add',
				'content' => $new,
			);
		} elseif ( $old ) {
			$changeSet[] = $position + array(
				'action' => 'subtract',
				'content' => $old,
			);
		}

		return $changeSet;
	}
}

