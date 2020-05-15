<?php

use EchoPush\SubscriptionManager;

/** @covers EchoServices */
class EchoServicesTest extends MediaWikiIntegrationTestCase {

	public function testGetSubscriptionManager(): void {
		$subscriptionManager = EchoServices::getInstance()->getPushSubscriptionManager();
		$this->assertInstanceOf( SubscriptionManager::class, $subscriptionManager );
	}

}
