<?php

/**
 * Abstract mapper for model
 */
abstract class EchoAbstractMapper {

	/**
	 * Echo database factory
	 * @var MWEchoDbFactory
	 */
	protected $dbFactory;

	/**
	 * @param MWEchoDbFactory|null
	 */
	public function __construct( MWEchoDbFactory $dbFactory = null ) {
		if ( $dbFactory === null ) {
			$dbFactory = MWEchoDbFactory::newFromDefault();
		}
		$this->dbFactory = $dbFactory;
	}

}
