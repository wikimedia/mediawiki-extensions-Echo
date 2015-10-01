<?php

class MWEchoDbFactoryTest extends MediaWikiTestCase {

	public function testNewFromDefault() {
		$db = MWEchoDbFactory::newFromDefault();
		$this->assertInstanceOf( 'MWEchoDbFactory', $db );

		return $db;
	}

	/**
	 * @depends testNewFromDefault
	 */
	public function testGetEchoDb( MWEchoDbFactory $db ) {
		$this->assertInstanceOf( 'DatabaseBase', $db->getEchoDb( DB_MASTER ) );
		$this->assertInstanceOf( 'DatabaseBase', $db->getEchoDb( DB_SLAVE ) );
	}

	/**
	 * @depends testNewFromDefault
	 */
	public function testGetLB( MWEchoDbFactory $db ) {
		$reflection = new ReflectionClass( 'MWEchoDbFactory' );
		$method = $reflection->getMethod( 'getLB' );
		$method->setAccessible( true );
		$this->assertInstanceOf( 'LoadBalancer', $method->invoke( $db ) );
	}

}
