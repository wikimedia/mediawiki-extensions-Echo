<?php
// @codingStandardsIgnoreStart

use PHPUnit\Framework\MockObject\Invocation;
use PHPUnit\Framework\MockObject\Invocation\StaticInvocation;

if ( !interface_exists( PHPUnit\Framework\MockObject\Stub\Stub::class ) ) {
	// PHPUnit < 8
	interface StubCompatTemp extends PHPUnit\Framework\MockObject\Stub {
	}
} else {
	// PHPUnit 8+
	interface StubCompatTemp extends PHPUnit\Framework\MockObject\Stub\Stub {
	}
}

class EchoExecuteFirstArgumentStub implements StubCompatTemp {
	public function invoke( Invocation $invocation ) {
		if ( !$invocation instanceof StaticInvocation ) {
			throw new PHPUnit\Framework\Exception( 'wrong invocation type' );
		}
		if ( !$invocation->arguments ) {
			throw new PHPUnit\Framework\Exception( 'Method call must have an argument' );
		}

		return call_user_func( reset( $invocation->arguments ) );
	}

	public function toString() : string {
		return 'return result of call_user_func on first invocation argument';
	}
}
// @codingStandardsIgnoreEnd
