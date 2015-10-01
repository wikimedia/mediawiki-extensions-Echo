<?php

class FilteredSequentialIteratorTest extends MediaWikiTestCase {

	public function testEchoCallbackIteratorDoesntBlowUp() {
		$it = new EchoCallbackIterator(
			new ArrayIterator( array( 1, 2, 3 ) ),
			function ( $num ) {
				return "There were $num items";
			}
		);

		foreach ( $it as $val ) {
			$res[] = $val;
		}

		$expected = array( "There were 1 items", "There were 2 items", "There were 3 items" );
		$this->assertEquals( $expected, $res, 'Basic iteration with callback applied' );
	}

	public static function echoFilteredSequentialIteratorProvider() {
		$odd = function ( $v ) {
			return $v & 1;
		};
		$greaterThanFour = function ( $v ) {
			return $v > 4;
		};

		return array(
			array(
				'Empty object still works',
				// expected result
				array(),
				// list of iterators/arrays/etc each containing users
				array(),
				// list of filters to apply on output
				array(),
			),
			array(
				'Basic iteration with one array and no filters',
				// expected result
				array( 1, 2, 3 ),
				// list of iterators/arrays/etc each containing users
				array( array( 1, 2, 3 ) ),
				// list of filters to apply on output
				array()
			),
			array(
				'Basic iteration with one array and one filters',
				// expected result
				array( 1, 3 ),
				// list of tierators/arrays/etc each containing users
				array( array( 1, 2, 3 ) ),
				// list of filters to apply on output
				array( $odd ),
			),
			array(
				'Iteration with multiple input arrays and no filters',
				// expected result (iterators are run in parallel)
				array( 1, 4, 2, 5, 3 ),
				// list of tierators/arrays/etc each containing users
				array( array( 1, 2, 3 ), array( 4, 5 ) ),
				// list of filters to apply on output
				array(),
			),
			array(
				'Iteration with multiple input arrays and multiple filters',
				// expected result
				array( 5 ),
				// list of tierators/arrays/etc each containing users
				array( array( 1, 2 ), array( 3, 4 ), array( 5, 6 ) ),
				// list of filters to apply on output
				array( $odd, $greaterThanFour ),
			),
			array(
				'Iteration with interspersed empty arrays',
				// expected result
				array( 1, 3, 2 ),
				// list of tierators/arrays/etc each containing users
				array( array(), array( 1, 2 ), array( 3 ), array() ),
				// list of filters to apply on output
				array(),
			),
		);
	}

	/**
	 * @dataProvider echoFilteredSequentialIteratorProvider
	 */
	public function testEchoFilteredSequentialIterator( $message, $expect, $userLists, $filters ) {
		$notify = new EchoFilteredSequentialIterator;

		foreach ( $userLists as $userList ) {
			$notify->add( $userList );
		}

		foreach ( $filters as $filter ) {
			$notify->addFilter( $filter );
		}

		$result = array();
		foreach ( $notify as $value ) {
			$result[] = $value;
		}

		$this->assertEquals( $expect, $result, $message );
	}
}
