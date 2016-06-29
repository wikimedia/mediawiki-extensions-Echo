<?php

$IP = getenv( 'MW_INSTALL_PATH' );
if ( $IP === false ) {
	$IP = __DIR__ . '/../../..';
}
require_once ( "$IP/maintenance/Maintenance.php" );

class BackfillUnreadWikis extends Maintenance {
	public function __construct() {
		parent::__construct();

		$this->mDescription = "Backfill echo_unread_wikis table";
		$this->addOption( 'rebuild', 'Only recompute already-existing rows' );
		$this->setBatchSize( 300 );
	}

	public function execute() {
		$dbFactory = MWEchoDbFactory::newFromDefault();
		$lookup = CentralIdLookup::factory();

		$rebuild = $this->hasOption( 'rebuild' );
		if ( $rebuild ) {
			$iterator = new BatchRowIterator( $dbFactory->getSharedDb( DB_SLAVE ), 'echo_unread_wikis', 'euw_user', $this->mBatchSize );
			$iterator->addConditions( array( 'euw_wiki' => wfWikiID() ) );
		} else {
			$iterator = new BatchRowIterator( wfGetDB( DB_SLAVE ), 'user', 'user_id', $this->mBatchSize );
			$iterator->setFetchColumns( User::selectFields() );
		}

		$processed = 0;
		foreach ( $iterator as $batch ) {
			foreach ( $batch as $row ) {
				if ( $rebuild ) {
					$user = $lookup->localUserFromCentralId( $row->euw_user, CentralIdLookup::AUDIENCE_RAW );
				} else {
					$user = User::newFromRow( $row );
				}
				if ( !$user ) {
					continue;
				}

				$notifUser = MWEchoNotifUser::newFromUser( $user );
				$uw = EchoUnreadWikis::newFromUser( $user );
				if ( $uw ) {
					$alertCount = $notifUser->getNotificationCount( true, DB_SLAVE, EchoAttributeManager::ALERT, false );
					$alertUnread = $notifUser->getLastUnreadNotificationTime( true, DB_SLAVE, EchoAttributeManager::ALERT, false );

					$msgCount = $notifUser->getNotificationCount( true, DB_SLAVE, EchoAttributeManager::MESSAGE, false );
					$msgUnread = $notifUser->getLastUnreadNotificationTime( true, DB_SLAVE, EchoAttributeManager::MESSAGE, false );

					$uw->updateCount( wfWikiID(), $alertCount, $alertUnread, $msgCount, $msgUnread );
				}
			}

			$processed += count( $batch );
			$this->output( "Updated $processed users.\n" );
			$dbFactory->waitForSlaves();
		}
	}
}

$maintClass = "BackfillUnreadWikis";
require_once ( DO_MAINTENANCE );
