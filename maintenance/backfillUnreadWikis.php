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

		$this->setBatchSize( 300 );
	}

	public function execute() {
		global $wgEchoSharedTrackingCluster;

		$dbr = wfGetDB( DB_SLAVE );
		$iterator = new BatchRowIterator( $dbr, 'user', 'user_id', $this->mBatchSize );
		$iterator->setFetchColumns( User::selectFields() );

		$processed = 0;
		foreach ( $iterator as $batch ) {
			foreach ( $batch as $row ) {
				$user = User::newFromRow( $row );

				$notifUser = MWEchoNotifUser::newFromUser( $user );
				$uw = EchoUnreadWikis::newFromUser( $user );
				if ( $uw ) {
					$alertCount = $notifUser->getNotificationCount( false, DB_SLAVE, EchoAttributeManager::ALERT, false );
					$alertUnread = $notifUser->getLastUnreadNotificationTime( false, DB_SLAVE, EchoAttributeManager::ALERT, false );

					$msgCount = $notifUser->getNotificationCount( false, DB_SLAVE, EchoAttributeManager::MESSAGE, false );
					$msgUnread = $notifUser->getLastUnreadNotificationTime( false, DB_SLAVE, EchoAttributeManager::MESSAGE, false );

					$uw->updateCount( wfWikiID(), $alertCount, $alertUnread, $msgCount, $msgUnread );
				}
			}

			$processed += count( $batch );
			$this->output( "Updated $processed users.\n" );
			wfWaitForSlaves( false, false, $wgEchoSharedTrackingCluster );
		}
	}
}

$maintClass = "BackfillUnreadWikis";
require_once ( DO_MAINTENANCE );
