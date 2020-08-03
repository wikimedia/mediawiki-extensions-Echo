<?php

/**
 * @group medium
 * @group API
 * @group Database
 * @covers \EchoPush\Api\ApiEchoPushSubscriptionsCreate
 */
class ApiEchoPushSubscriptionsCreateTest extends ApiTestCase {

	/** @var User */
	private $user;

	public function setUp(): void {
		parent::setUp();
		$this->setMwGlobals( [
			'wgEchoEnablePush' => true,
			'wgEchoPushMaxSubscriptionsPerUser' => 2
		] );
		$this->tablesUsed[] = 'echo_push_subscription';
		$this->tablesUsed[] = 'echo_push_provider';
		$this->user = $this->getTestUser()->getUser();
		$this->createTestData();
	}

	public function testApiCreateSubscription(): void {
		// Before max subscriptions reached
		$params = [
			'action' => 'echopushsubscriptions',
			'command' => 'create',
			'provider' => 'fcm',
			'providertoken' => 'ABC123',
		];
		$result = $this->doApiRequestWithToken( $params, null, $this->user );
		$this->assertEquals( 'Success', $result[0]['create']['result'] );

		// After max subscriptions reached
		$params['providertoken'] = 'DEF456';
		$this->expectException( ApiUsageException::class );
		$this->doApiRequestWithToken( $params, null, $this->user );
	}

	public function testApiCreateSubscriptionTokenExists(): void {
		$params = [
			'action' => 'echopushsubscriptions',
			'command' => 'create',
			'provider' => 'fcm',
			'providertoken' => 'XYZ789',
		];
		$this->expectException( ApiUsageException::class );
		$this->doApiRequestWithToken( $params, null, $this->user );
	}

	public function testApiCreateApnsSubscriptionWithTopic(): void {
		$params = [
			'action' => 'echopushsubscriptions',
			'command' => 'create',
			'provider' => 'apns',
			'providertoken' => 'ABC123',
			'topic' => 'test',
		];
		$result = $this->doApiRequestWithToken( $params, null, $this->user );
		$this->assertEquals( 'Success', $result[0]['create']['result'] );
	}

	public function testApiCreateApnsSubscriptionWithoutTopic(): void {
		$params = [
			'action' => 'echopushsubscriptions',
			'command' => 'create',
			'provider' => 'apns',
			'providertoken' => 'DEF456',
		];
		$this->expectException( ApiUsageException::class );
		$this->doApiRequestWithToken( $params, null, $this->user );
	}

	private function createTestData(): void {
		$subscriptionManager = EchoServices::getInstance()->getPushSubscriptionManager();
		$subscriptionManager->create( $this->user, 'fcm', 'XYZ789' );
	}

}
