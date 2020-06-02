<?php

use EchoPush\SubscriptionManager;
use MediaWiki\MediaWikiServices;

class EchoServices {

	/** @var MediaWikiServices */
	private $services;

	/** @return EchoServices */
	public static function getInstance(): EchoServices {
		return new self( MediaWikiServices::getInstance() );
	}

	/** @param MediaWikiServices $services */
	public function __construct( MediaWikiServices $services ) {
		$this->services = $services;
	}

	/** @return SubscriptionManager */
	public function getPushSubscriptionManager(): SubscriptionManager {
		return $this->services->getService( 'EchoPushSubscriptionManager' );
	}

}
