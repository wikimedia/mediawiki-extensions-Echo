<?php

use Wikimedia\TestingAccessWrapper;

/**
 * @group Database
 * @covers \EchoPush\SubscriptionManager
 */
class SubscriptionManagerTest extends MediaWikiIntegrationTestCase {

	public function setUp(): void {
		parent::setUp();
		$this->tablesUsed[] = 'echo_push_subscription';
		$this->tablesUsed[] = 'echo_push_provider';
		$this->setMwGlobals( 'wgEchoPushMaxSubscriptionsPerUser', 1 );
	}

	public function testManagePushSubscriptions(): void {
		$subscriptionManagerBase = EchoServices::getInstance()->getPushSubscriptionManager();
		$subscriptionManager = TestingAccessWrapper::newFromObject( $subscriptionManagerBase );

		$user = $this->getTestUser()->getUser();
		$centralId = CentralIdLookup::factory()->centralIdFromLocalUser( $user );

		$subscriptionManager->create( $user, 'test', 'ABC123' );
		$subscriptions = $subscriptionManager->getSubscriptionsForUser( $centralId );
		$this->assertCount( 1, $subscriptions );
		$this->assertTrue( $subscriptionManager->userHasMaxAllowedSubscriptions( $centralId ) );

		$subscriptionManager->delete( $user, 'ABC123' );
		$subscriptions = $subscriptionManager->getSubscriptionsForUser( $centralId );
		$this->assertCount( 0, $subscriptions );
		$this->assertFalse( $subscriptionManager->userHasMaxAllowedSubscriptions( $centralId ) );
	}

}
