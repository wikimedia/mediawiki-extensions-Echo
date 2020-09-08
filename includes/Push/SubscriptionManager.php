<?php

namespace EchoPush;

use EchoAbstractMapper;
use IDatabase;
use MediaWiki\Storage\NameTableStore;
use OverflowException;
use Wikimedia\Rdbms\DBError;

class SubscriptionManager extends EchoAbstractMapper {

	/** @var IDatabase */
	private $dbw;

	/** @var IDatabase */
	private $dbr;

	/** @var NameTableStore */
	private $pushProviderStore;

	/** @var NameTableStore */
	private $pushTopicStore;

	/** @var int */
	private $maxSubscriptionsPerUser;

	/**
	 * @param IDatabase $dbw primary DB connection (for writes)
	 * @param IDatabase $dbr replica DB connection (for reads)
	 * @param NameTableStore $pushProviderStore
	 * @param NameTableStore $pushTopicStore
	 * @param int $maxSubscriptionsPerUser
	 */
	public function __construct(
		IDatabase $dbw,
		IDatabase $dbr,
		NameTableStore $pushProviderStore,
		NameTableStore $pushTopicStore,
		int $maxSubscriptionsPerUser
	) {
		parent::__construct();
		$this->dbw = $dbw;
		$this->dbr = $dbr;
		$this->pushProviderStore = $pushProviderStore;
		$this->pushTopicStore = $pushTopicStore;
		$this->maxSubscriptionsPerUser = $maxSubscriptionsPerUser;
	}

	/**
	 * Get the configured maximum number of stored subscriptions per user.
	 * @return int
	 */
	public function getMaxSubscriptionsPerUser(): int {
		return $this->maxSubscriptionsPerUser;
	}

	/**
	 * Store push subscription information for a central user ID.
	 * @param string $provider Provider name string (validated by presence in the PARAM_TYPE array)
	 * @param string $token Subscriber token provided by the push provider
	 * @param int $centralId
	 * @param string|null $topic APNS topic string
	 * @return bool true if the subscription was created; false if the token already exists
	 * @throws OverflowException if the user already has >= the configured max subscriptions
	 */
	public function create( string $provider, string $token, int $centralId, ?string $topic = null ): bool {
		if ( $this->userHasMaxAllowedSubscriptions( $centralId ) ) {
			throw new OverflowException( 'Max subscriptions exceeded' );
		}
		$topicId = $topic ? $this->pushTopicStore->acquireId( $topic ) : null;
		$this->dbw->insert(
			'echo_push_subscription',
			[
				'eps_user' => $centralId,
				'eps_provider' => $this->pushProviderStore->acquireId( $provider ),
				'eps_token' => $token,
				'eps_token_sha256' => hash( 'sha256', $token ),
				'eps_data' => null,
				'eps_topic' => $topicId,
				'eps_updated' => $this->dbw->timestamp()
			],
			__METHOD__,
			[ 'IGNORE' ]
		);
		return (bool)$this->dbw->affectedRows();
	}

	/**
	 * Get full data for all registered subscriptions for a user (by central ID).
	 * @param int $centralId
	 * @return array array of Subscription objects
	 */
	public function getSubscriptionsForUser( int $centralId ) {
		$res = $this->dbr->select(
			[ 'echo_push_subscription', 'echo_push_provider', 'echo_push_topic' ],
			'*',
			[ 'eps_user' => $centralId ],
			__METHOD__,
			[],
			[
				'echo_push_provider' => [ 'INNER JOIN', [ 'eps_provider = epp_id' ] ],
				'echo_push_topic' => [ 'LEFT JOIN', [ 'eps_topic = ept_id' ] ],
			]
		);
		$result = [];
		foreach ( $res as $row ) {
			$result[] = Subscription::newFromRow( $row );
		}
		return $result;
	}

	/**
	 * Delete one or more push subscriptions by token. Unless the current user is a push
	 * subscription manager, the query will also include the current central user ID as a condition.
	 * @param array $tokens Delete the subscription with these tokens
	 * @param int|null $centralId
	 * @return int number of rows deleted
	 * @throws DBError
	 */
	public function delete( array $tokens, int $centralId = null ): int {
		$cond = [ 'eps_token' => $tokens ];
		if ( $centralId ) {
			$cond['eps_user'] = $centralId;
		}
		$this->dbw->delete(
			'echo_push_subscription',
			$cond,
			__METHOD__
		);
		return $this->dbw->affectedRows();
	}

	/**
	 * Get count of all registered subscriptions for a user (by central ID).
	 * @param int $centralId
	 * @return int
	 */
	private function getSubscriptionCountForUser( int $centralId ) {
		return $this->dbr->selectRowCount(
			'echo_push_subscription',
			'eps_id',
			[ 'eps_user' => $centralId ],
			__METHOD__
		);
	}

	/**
	 * Returns true if the central user has >= the configured maximum push subscriptions in the DB
	 * @param int $centralId
	 * @return bool
	 */
	private function userHasMaxAllowedSubscriptions( int $centralId ): bool {
		return $this->getSubscriptionCountForUser( $centralId ) >= $this->maxSubscriptionsPerUser;
	}

}
