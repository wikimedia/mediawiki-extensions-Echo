<?php

namespace MediaWiki\Extension\Notifications\Mapper;

use BatchRowIterator;
use Exception;
use InvalidArgumentException;
use MediaWiki\Deferred\AtomicSectionUpdate;
use MediaWiki\Deferred\DeferredUpdates;
use MediaWiki\Exception\MWExceptionHandler;
use MediaWiki\Extension\Notifications\Model\Notification;
use MediaWiki\MediaWikiServices;
use MediaWiki\Title\Title;
use MediaWiki\User\UserIdentity;
use Wikimedia\Rdbms\IDatabase;
use Wikimedia\Rdbms\SelectQueryBuilder;

/**
 * Database mapper for Notification model
 */
class NotificationMapper extends AbstractMapper {

	/**
	 * Insert a notification record
	 */
	public function insert( Notification $notification ) {
		$dbw = $this->dbFactory->getEchoDb( DB_PRIMARY );

		$listeners = $this->getMethodListeners( __FUNCTION__ );

		$row = $notification->toDbArray();
		DeferredUpdates::addUpdate( new AtomicSectionUpdate(
			$dbw,
			__METHOD__,
			static function ( IDatabase $dbw, $fname ) use ( $row, $listeners ) {
				$row['notification_timestamp'] =
					$dbw->timestamp( $row['notification_timestamp'] );
				$row['notification_read_timestamp'] =
					$dbw->timestampOrNull( $row['notification_read_timestamp'] );
				$dbw->newInsertQueryBuilder()
					->insertInto( 'echo_notification' )
					->row( $row )
					->caller( $fname )
					->execute();
				foreach ( $listeners as $listener ) {
					$dbw->onTransactionCommitOrIdle( $listener, $fname );
				}
			}
		) );
	}

	/**
	 * Extract the offset used for notification list
	 * @param string|null $continue String Used for offset
	 * @return int[]
	 */
	protected function extractQueryOffset( $continue ) {
		$offset = [
			'timestamp' => 0,
			'offset' => 0,
		];
		if ( $continue ) {
			$values = explode( '|', $continue, 3 );
			if ( count( $values ) !== 2 ) {
				throw new InvalidArgumentException( 'Invalid continue param: ' . $continue );
			}
			$offset['timestamp'] = (int)$values[0];
			$offset['offset'] = (int)$values[1];
		}

		return $offset;
	}

	/**
	 * Get unread notifications by user in the amount specified by limit order by
	 * notification timestamp in descending order.  We have an index to retrieve
	 * unread notifications, but it's not optimized for ordering by timestamp.  The
	 * descending order is only allowed if we keep the notification in low volume,
	 * which is done via a deleteJob
	 * @param UserIdentity $userIdentity
	 * @param int $limit
	 * @param string|null $continue Used for offset
	 * @param string[] $eventTypes
	 * @param Title[]|null $titles If set, only return notifications for these pages.
	 *  To find notifications not associated with any page, add null as an element to this array.
	 * @param int $dbSource Use primary database or replica database
	 * @return Notification[]
	 */
	public function fetchUnreadByUser(
		UserIdentity $userIdentity,
		$limit,
		$continue,
		array $eventTypes = [],
		?array $titles = null,
		$dbSource = DB_REPLICA
	) {
		$conds = [ 'notification_read_timestamp' => null ];
		if ( $titles ) {
			$conds['event_page_id'] = $this->getIdsForTitles( $titles );
			if ( !$conds['event_page_id'] ) {
				return [];
			}
		}
		return $this->fetchByUserInternal(
			$userIdentity,
			$limit,
			$continue,
			$eventTypes,
			$conds,
			$dbSource
		);
	}

	/**
	 * Get read notifications by user in the amount specified by limit order by
	 * notification timestamp in descending order.  We have an index to retrieve
	 * unread notifications but it's not optimized for ordering by timestamp.  The
	 * descending order is only allowed if we keep the notification in low volume,
	 * which is done via a deleteJob
	 * @param UserIdentity $userIdentity
	 * @param int $limit
	 * @param string|null $continue Used for offset
	 * @param string[] $eventTypes
	 * @param Title[]|null $titles If set, only return notifications for these pages.
	 *  To find notifications not associated with any page, add null as an element to this array.
	 * @param int $dbSource Use primary database or replica database
	 * @return Notification[]
	 */
	public function fetchReadByUser(
		UserIdentity $userIdentity,
		$limit,
		$continue,
		array $eventTypes = [],
		?array $titles = null,
		$dbSource = DB_REPLICA
	) {
		$dbr = $this->dbFactory->getEchoDb( $dbSource );
		$conds = [ $dbr->expr( 'notification_read_timestamp', '!=', null ) ];
		if ( $titles ) {
			$conds['event_page_id'] = $this->getIdsForTitles( $titles );
			if ( !$conds['event_page_id'] ) {
				return [];
			}
		}
		return $this->fetchByUserInternal(
			$userIdentity,
			$limit,
			$continue,
			$eventTypes,
			$conds,
			$dbSource
		);
	}

	/**
	 * Get Notification by user in batch along with limit, offset etc
	 *
	 * @param UserIdentity $userIdentity the user to get notifications for
	 * @param int $limit The maximum number of notifications to return
	 * @param string|null $continue Used for offset
	 * @param array $eventTypes Event types to load
	 * @param array $excludeEventIds Event id's to exclude.
	 * @param Title[]|null $titles If set, only return notifications for these pages.
	 *  To find notifications not associated with any page, add null as an element to this array.
	 * @return Notification[]
	 */
	public function fetchByUser(
		UserIdentity $userIdentity,
		$limit,
		$continue,
		array $eventTypes = [],
		array $excludeEventIds = [],
		?array $titles = null
	) {
		$dbr = $this->dbFactory->getEchoDb( DB_REPLICA );

		$conds = [];
		if ( $excludeEventIds ) {
			$conds[] = $dbr->expr( 'event_id', '!=', $excludeEventIds );
		}
		if ( $titles ) {
			$conds['event_page_id'] = $this->getIdsForTitles( $titles );
			if ( !$conds['event_page_id'] ) {
				return [];
			}
		}

		return $this->fetchByUserInternal(
			$userIdentity,
			$limit,
			$continue,
			$eventTypes,
			$conds
		);
	}

	protected function getIdsForTitles( array $titles ): array {
		$ids = [];
		foreach ( $titles as $title ) {
			if ( $title === null ) {
				$ids[] = null;
			} elseif ( $title->exists() ) {
				$ids[] = $title->getArticleId();
			}
		}
		return $ids;
	}

	/**
	 * @param UserIdentity $userIdentity the user to get notifications for
	 * @param int $limit The maximum number of notifications to return
	 * @param string|null $continue Used for offset
	 * @param array $eventTypes Event types to load
	 * @param array $conds Additional query conditions.
	 * @param int $dbSource Use primary database or replica database
	 * @return Notification[]
	 */
	protected function fetchByUserInternal(
		UserIdentity $userIdentity,
		$limit,
		$continue,
		array $eventTypes = [],
		array $conds = [],
		$dbSource = DB_REPLICA
	) {
		$dbr = $this->dbFactory->getEchoDb( $dbSource );

		if ( !$eventTypes ) {
			return [];
		}

		// There is a problem with querying by event type, if a user has only one or none
		// flow notification and huge amount other notifications, the lookup of only flow
		// notification will result in a slow query.  Luckily users won't have that many
		// notifications.  We should have some cron job to remove old notifications so
		// the notification volume is in a reasonable amount for such case.  The other option
		// is to denormalize notification table with event_type and lookup index.
		$conds = [
			'notification_user' => $userIdentity->getId(),
			'event_type' => $eventTypes,
			'event_deleted' => 0,
		] + $conds;

		$offset = $this->extractQueryOffset( $continue );

		// Start points are specified
		if ( $offset['timestamp'] && $offset['offset'] ) {
			// The offset and timestamp are those of the first notification we want to return
			$conds[] = $dbr->buildComparison( '<=', [
				'notification_timestamp' => $dbr->timestamp( $offset['timestamp'] ),
				'notification_event' => $offset['offset'],
			] );
		}

		$res = $dbr->newSelectQueryBuilder()
			->select( Notification::selectFields() )
			->from( 'echo_notification' )
			->leftJoin( 'echo_event', null, 'notification_event=event_id' )
			->where( $conds )
			->orderBy( [ 'notification_timestamp', 'notification_event' ], SelectQueryBuilder::SORT_DESC )
			->limit( $limit )
			->caller( __METHOD__ )
			->fetchResultSet();

		/** @var Notification[] $allNotifications */
		$allNotifications = [];
		foreach ( $res as $row ) {
			try {
				$notification = Notification::newFromRow( $row );
				if ( $notification ) {
					$allNotifications[] = $notification;
				}
			} catch ( Exception $e ) {
				$id = $row->event_id ?? 'unknown event';
				wfDebugLog( 'Echo', __METHOD__ . ": Failed initializing event: $id" );
				MWExceptionHandler::logException( $e );
			}
		}

		$data = [];
		foreach ( $allNotifications as $notification ) {
			$data[ $notification->getEvent()->getId() ] = $notification;
		}

		return $data;
	}

	/**
	 * Fetch Notifications by user and event IDs.
	 *
	 * @param UserIdentity $userIdentity
	 * @param int[] $eventIds
	 * @return Notification[]
	 */
	public function fetchByUserEvents( UserIdentity $userIdentity, array $eventIds ) {
		$dbr = $this->dbFactory->getEchoDb( DB_REPLICA );

		$result = $dbr->newSelectQueryBuilder()
			->select( Notification::selectFields() )
			->from( 'echo_notification' )
			->join( 'echo_event', null, 'notification_event=event_id' )
			->where( [
				'notification_user' => $userIdentity->getId(),
				'notification_event' => $eventIds
			] )
			->caller( __METHOD__ )
			->fetchResultSet();

		$notifications = [];
		foreach ( $result as $row ) {
			$notifications[] = Notification::newFromRow( $row );
		}
		return $notifications;
	}

	/**
	 * Fetch a notification by user in the specified offset.  The caller should
	 * know that passing a big number for offset is NOT going to work
	 * @param UserIdentity $userIdentity
	 * @param int $offset
	 * @return Notification|false
	 */
	public function fetchByUserOffset( UserIdentity $userIdentity, $offset ) {
		$dbr = $this->dbFactory->getEchoDb( DB_REPLICA );
		$row = $dbr->newSelectQueryBuilder()
			->select( Notification::selectFields() )
			->from( 'echo_notification' )
			->leftJoin( 'echo_event', null, 'notification_event=event_id' )
			->where( [
				'notification_user' => $userIdentity->getId(),
				'event_deleted' => 0,
			] )
			->orderBy( [ 'notification_timestamp', 'notification_event' ], SelectQueryBuilder::SORT_DESC )
			->offset( $offset )
			->caller( __METHOD__ )
			->fetchRow();

		if ( $row ) {
			return Notification::newFromRow( $row );
		} else {
			return false;
		}
	}

	/**
	 * Batch delete notifications by user and eventId offset
	 * @param UserIdentity $userIdentity
	 * @param int $eventId
	 * @return bool
	 */
	public function deleteByUserEventOffset( UserIdentity $userIdentity, $eventId ) {
		global $wgUpdateRowsPerQuery;
		$eventMapper = new EventMapper( $this->dbFactory );
		$userId = $userIdentity->getId();
		$dbw = $this->dbFactory->getEchoDb( DB_PRIMARY );
		$dbr = $this->dbFactory->getEchoDb( DB_REPLICA );
		$lbFactory = MediaWikiServices::getInstance()->getDBLoadBalancerFactory();
		$ticket = $lbFactory->getEmptyTransactionTicket( __METHOD__ );
		$domainId = $dbw->getDomainID();

		$iterator = new BatchRowIterator(
			$dbr,
			'echo_notification',
			'notification_event',
			$wgUpdateRowsPerQuery
		);
		$iterator->addConditions( [
			'notification_user' => $userId,
			$dbw->expr( 'notification_event', '<', (int)$eventId ),
		] );
		$iterator->setCaller( __METHOD__ );

		foreach ( $iterator as $batch ) {
			$eventIds = [];
			foreach ( $batch as $row ) {
				$eventIds[] = $row->notification_event;
			}
			$dbw->newDeleteQueryBuilder()
				->deleteFrom( 'echo_notification' )
				->where( [
					'notification_user' => $userId,
					'notification_event' => $eventIds,
				] )
				->caller( __METHOD__ )
				->execute();

			// Find out which events are now orphaned, i.e. no longer referenced in echo_notifications
			// (besides the rows we just deleted) or in echo_email_batch, and delete them
			$eventMapper->deleteOrphanedEvents( $eventIds, $userId, 'echo_notification' );

			$lbFactory->commitAndWaitForReplication(
				__METHOD__, $ticket, [ 'domain' => $domainId ] );
		}
		return true;
	}

	/**
	 * Fetch ids of users that have notifications for certain events
	 *
	 * @param int[] $eventIds
	 * @return int[]
	 */
	public function fetchUsersWithNotificationsForEvents( array $eventIds ) {
		$dbr = $this->dbFactory->getEchoDb( DB_REPLICA );

		return $dbr->newSelectQueryBuilder()
			->select( 'notification_user' )
			->distinct()
			->from( 'echo_notification' )
			->where( [
				'notification_event' => $eventIds
			] )
			->caller( __METHOD__ )
			->fetchFieldValues();
	}

}

class_alias( NotificationMapper::class, 'EchoNotificationMapper' );
