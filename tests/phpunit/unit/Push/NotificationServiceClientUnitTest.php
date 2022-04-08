<?php

use MediaWiki\Extension\Notifications\Push\NotificationServiceClient;
use MediaWiki\Extension\Notifications\Push\Subscription;

/** @covers \MediaWiki\Extension\Notifications\Push\NotificationServiceClient */
class NotificationServiceClientUnitTest extends MediaWikiUnitTestCase {

	/**
	 * @dataProvider sendCheckEchoRequestsProvider
	 */
	public function testSendCheckEchoRequests( $numOfCalls, $subscriptions, $expected ): void {
		$mock = $this->getMockBuilder( NotificationServiceClient::class )
			->disableOriginalConstructor()
			->onlyMethods( [ 'sendRequest' ] )
			->getMock();

		$mock->expects( $this->exactly( $numOfCalls ) )
			->method( 'sendRequest' )
			->withConsecutive( ...$expected );

		$mock->sendCheckEchoRequests( $subscriptions );
	}

	public function sendCheckEchoRequestsProvider(): array {
		$row = new stdClass();
		$row->eps_token = 'JKL123';
		$row->epp_name = 'fcm';
		$row->eps_data = null;
		$row->ept_text = null;
		$row->eps_updated = '2020-01-01 10:10:10';
		$subscriptions[] = Subscription::newFromRow( $row );

		$row->eps_token = 'DEF456';
		$row->epp_name = 'fcm';
		$row->eps_data = null;
		$row->ept_text = null;
		$row->eps_updated = '2020-01-01 10:10:10';
		$subscriptions[] = Subscription::newFromRow( $row );

		$row->eps_token = 'GHI789';
		$row->epp_name = 'apns';
		$row->eps_data = null;
		$row->ept_text = 'test';
		$row->eps_updated = '2020-01-01 10:10:10';
		$subscriptions[] = Subscription::newFromRow( $row );

		return [
				[
					1,
					[ $subscriptions[0], $subscriptions[1] ],
					[
						[
							'fcm',
							[
								'deviceTokens' => [ "JKL123", 'DEF456' ],
								'messageType' => 'checkEchoV1'
							]
						]
					]
				],
				[
					2,
					$subscriptions,
					[
						[
							'fcm',
							[
								'deviceTokens' => [ "JKL123", 'DEF456' ],
								'messageType' => 'checkEchoV1'
							]
						],
						[
							'apns',
							[
								'deviceTokens' => [ 'GHI789' ],
								'messageType' => 'checkEchoV1',
								'topic' => 'test'
							]
						]
				]
			]
		];
	}

}
