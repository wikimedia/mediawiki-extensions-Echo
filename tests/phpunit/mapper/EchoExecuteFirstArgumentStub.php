<?php

class EchoExecuteFirstArgumentStub implements PHPUnit_Framework_MockObject_Stub {
	public function invoke( PHPUnit_Framework_MockObject_Invocation $invocation ) {
		if ( !$invocation instanceof PHPUnit_Framework_MockObject_Invocation_Static ) {
			throw new PHPUnit_Framework_Exception( 'wrong invocation type' );
		}
		if ( !$invocation->arguments ) {
			throw new PHPUnit_Framework_Exception( 'Method call must have an argument' );
		}

		return call_user_func( reset( $invocation->arguments ) );
	}

	public function toString() {
		return 'return result of call_user_func on first invocation argument';
	}
}
