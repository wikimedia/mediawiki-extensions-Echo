<?php
/**
 * Remove rows from echo_event that don't have corresponding rows in echo_notification.
 *
 * @ingroup Maintenance
 */
require_once getenv( 'MW_INSTALL_PATH' ) !== false
	? getenv( 'MW_INSTALL_PATH' ) . '/maintenance/Maintenance.php'
	: __DIR__ . '/../../../maintenance/Maintenance.php';

/**
 * Maintenance script that removes orphaned event rows
 *
 * @ingroup Maintenance
 */
class RemoveOrphanedEvents extends LoggedUpdateMaintenance {

	public function __construct() {
		parent::__construct();

		$this->mDescription = "Remove rows from echo_event that don't have corresponding rows in echo_notification";

		$this->setBatchSize( 500 );

		$this->requireExtension( 'Echo' );
	}

	public function getUpdateKey() {
		return __CLASS__;
	}

	public function doDBUpdates() {
		$dbFactory = MWEchoDbFactory::newFromDefault();
		$dbw = $dbFactory->getEchoDb( DB_MASTER );
		$dbr = $dbFactory->getEchoDb( DB_REPLICA );
		$iterator = new BatchRowIterator(
			$dbr,
			[ 'echo_event', 'echo_notification' ],
			'event_id',
			$this->mBatchSize
		);
		$iterator->addJoinConditions( [
			'echo_notification' => [ 'LEFT JOIN', 'notification_event=event_id' ]
		] );
		$iterator->addConditions( [
			'notification_user' => null
		] );

		$this->output( "Removing orphaned echo_event rows...\n" );

		$processed = 0;
		foreach ( $iterator as $batch ) {
			$ids = [];
			foreach ( $batch as $row ) {
				$ids[] = $row->event_id;
			}
			$dbw->delete(
				'echo_event',
				[ 'event_id' => $ids ]

			);
			$processed += $dbw->affectedRows();
			$this->output( "Deleted $processed orphaned rows.\n" );
			$dbFactory->waitForSlaves();
		}

		return true;
	}
}

$maintClass = 'RemoveOrphanedEvents';
require_once RUN_MAINTENANCE_IF_MAIN;
