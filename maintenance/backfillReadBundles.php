<?php

$IP = getenv( 'MW_INSTALL_PATH' );
if ( $IP === false ) {
	$IP = __DIR__ . '/../../..';
}
require_once ( "$IP/maintenance/Maintenance.php" );

class BackfillReadBundles extends Maintenance {
	public function __construct() {
		parent::__construct();

		$this->mDescription = "Backfill echo_notification.notification_read_timestamp for bundles";

		$this->setBatchSize( 300 );
	}

	public function execute() {
		$dbr = $this->getDB( DB_SLAVE );
		$dbw = $this->getDB( DB_MASTER );
		$iterator = new BatchRowIterator(
			$dbr,
			'echo_notification',
			array( 'notification_event', 'notification_user' ),
			$this->mBatchSize
		);
		$iterator->setFetchColumns( array( 'notification_bundle_display_hash', 'notification_read_timestamp' ) );
		$iterator->addConditions( array(
			'notification_bundle_base' => 1,
			"notification_bundle_display_hash <>'' ",
			'notification_read_timestamp IS NOT NULL',
		) );

		$processed = 0;
		foreach ( $iterator as $batch ) {
			foreach ( $batch as $row ) {
				$displayHash = $row->notification_bundle_display_hash;
				$readTimestamp = $row->notification_read_timestamp;

				$result = $dbw->update(
					'echo_notification',
					array( 'notification_read_timestamp' => $readTimestamp ),
					array(
						'notification_read_timestamp IS NULL',
						'notification_bundle_base' => 0,
						'notification_bundle_display_hash' => $displayHash,
					)
				);

				if ( !$result ) {
					$this->output( "Failed to set read_timestamp on notifications with bundle_display_hash: $displayHash\n" );
				}

				$processed += $dbw->affectedRows();
			}

			$this->output( "Updated $processed notifications.\n" );
		}
	}
}

$maintClass = "BackfillReadBundles";
require_once ( DO_MAINTENANCE );
