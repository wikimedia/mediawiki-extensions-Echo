<?php

/**
 * @group Database
 * @covers \EchoPush\SubscriptionManager
 */
class PushSubscriptionManagerTest extends MediaWikiIntegrationTestCase {

	public function setUp(): void {
		parent::setUp();
		$this->tablesUsed[] = 'echo_push_subscription';
		$this->tablesUsed[] = 'echo_push_provider';
	}

	public function testManagePushSubscriptions(): void {
		$subscriptionManager = EchoServices::getInstance()->getPushSubscriptionManager();
		$user = $this->getTestUser()->getUser();
		$subscriptionManager->create( $user, 'test', 'ABC123' );
		$subscriptions = $subscriptionManager->getSubscriptionsForUser( $user );
		$this->assertCount( 1, $subscriptions );
		$subscriptionManager->delete( $user, 'ABC123' );
		$subscriptions = $subscriptionManager->getSubscriptionsForUser( $user );
		$this->assertCount( 0, $subscriptions );
	}

}
