<?php

/**
 * @covers EchoAbstractMapper
 */
class EchoAbstractMapperTest extends MediaWikiTestCase {

	public function testAttachListener() {
		$mapper = new EchoAbstractMapperStub();
		$mapper->attachListener( 'testMethod', 'key_a', function () {
		} );

		$class = new ReflectionClass( 'EchoAbstractMapperStub' );
		$property = $class->getProperty( 'listeners' );
		$property->setAccessible( true );
		$listeners = $property->getValue( $mapper );

		$this->assertArrayHasKey( 'testMethod', $listeners );
		$this->assertArrayHasKey( 'key_a', $listeners['testMethod'] );
		$this->assertTrue( is_callable( $listeners['testMethod']['key_a'] ) );

		return [ 'mapper' => $mapper, 'property' => $property ];
	}

	/**
	 * @expectedException MWException
	 */
	public function testAttachListenerWithException() {
		$mapper = new EchoAbstractMapperStub();
		$mapper->attachListener( 'nonExistingMethod', 'key_a', function () {
		} );
	}

	/**
	 * @depends testAttachListener
	 */
	public function testGetMethodListeners( $data ) {
		$mapper = $data['mapper'];
		$property = $data['property'];

		$listeners = $mapper->getMethodListeners( 'testMethod' );
		$this->assertArrayHasKey( 'key_a', $listeners );
		$this->assertTrue( is_callable( $listeners['key_a'] ) );
	}

	/**
	 * @depends testAttachListener
	 * @expectedException MWException
	 */
	public function testGetMethodListenersWithException( $data ) {
		$mapper = $data['mapper'];
		$property = $data['property'];

		$listeners = $mapper->getMethodListeners( 'nonExistingMethod' );
	}

	/**
	 * @depends testAttachListener
	 */
	public function testDetachListener( $data ) {
		$mapper = $data['mapper'];
		$property = $data['property'];

		$mapper->detachListener( 'testMethod', 'key_a' );
		$listeners = $property->getValue( $mapper );
		$this->assertArrayHasKey( 'testMethod', $listeners );
		$this->assertTrue( !isset( $listeners['testMethod']['key_a'] ) );
	}

}
