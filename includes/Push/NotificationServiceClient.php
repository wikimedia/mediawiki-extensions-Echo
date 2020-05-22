<?php

namespace EchoPush;

use MediaWiki\Http\HttpRequestFactory;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;

class NotificationServiceClient implements LoggerAwareInterface {

	use LoggerAwareTrait;

	/** @var HttpRequestFactory */
	private $httpRequestFactory;

	/** @var string */
	private $url;

	/**
	 * @param HttpRequestFactory $httpRequestFactory
	 * @param string $url push service notification request endpoint URL
	 */
	public function __construct( HttpRequestFactory $httpRequestFactory, string $url ) {
		$this->httpRequestFactory = $httpRequestFactory;
		$this->url = $url;
	}

	/**
	 * Send a CHECK_ECHO notification request to the push service.
	 * @param array $subscriptions Subscriptions for which to send the message
	 */
	public function sendCheckEchoRequest( array $subscriptions ): void {
		$this->sendRequest( $subscriptions, [ 'message' => 'CHECK_ECHO' ] );
	}

	/**
	 * @param array $subscriptions Subscriptions for which to send the message
	 * @param array $payload message payload
	 */
	private function sendRequest( array $subscriptions, array $payload ): void {
		// TODO: Implement this when the push notification service's request API exists
		$this->logger->debug( 'Sending push notification request' );
	}

}
