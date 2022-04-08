<?php

use MediaWiki\Extension\Notifications\Push\Subscription;
use Wikimedia\Timestamp\ConvertibleTimestamp;

/** @covers \MediaWiki\Extension\Notifications\Push\Subscription */
class SubscriptionTest extends MediaWikiUnitTestCase {

	public function testNewFromRow(): void {
		$row = new stdClass();
		$row->eps_token = 'AABC123';
		$row->epp_name = 'fcm';
		$row->eps_data = null;
		$row->ept_text = null;
		$row->eps_updated = '2020-01-01 10:10:10';

		$subscription = Subscription::newFromRow( $row );
		$this->assertSame( 'AABC123', $subscription->getToken() );
		$this->assertSame( 'fcm', $subscription->getProvider() );
		$this->assertNull( $subscription->getTopic() );
		$this->assertInstanceOf( ConvertibleTimestamp::class, $subscription->getUpdated() );
		$this->assertSame( '1577873410', $subscription->getUpdated()->getTimestamp() );
	}

	public function testNewFromRowWithTopic(): void {
		$row = new stdClass();
		$row->eps_token = 'DEF456';
		$row->epp_name = 'apns';
		$row->eps_data = null;
		$row->ept_text = 'test';
		$row->eps_updated = '2020-01-01 10:10:10';

		$subscription = Subscription::newFromRow( $row );
		$this->assertSame( 'DEF456', $subscription->getToken() );
		$this->assertSame( 'apns', $subscription->getProvider() );
		$this->assertSame( 'test', $subscription->getTopic() );
		$this->assertInstanceOf( ConvertibleTimestamp::class, $subscription->getUpdated() );
		$this->assertSame( '1577873410', $subscription->getUpdated()->getTimestamp() );
	}

}
