<?php
/**
 * Remove invalid events from echo_event and echo_notification
 *
 * @ingroup Maintenance
 */
require_once getenv( 'MW_INSTALL_PATH' ) !== false
	? getenv( 'MW_INSTALL_PATH' ) . '/maintenance/Maintenance.php'
	: __DIR__ . '/../../../maintenance/Maintenance.php';

/**
 * Maintenance script that removes invalid notifications
 *
 * @ingroup Maintenance
 */
class RemoveInvalidNotification extends Maintenance {

	protected $batchSize = 500;
	protected $invalidEventType = [ 'article-linked' ];

	public function __construct() {
		$this->mDescription = "Removes invalid notifications from the database.";
		$this->requireExtension( 'Echo' );
	}

	public function execute() {
		if ( !$this->invalidEventType ) {
			$this->output( "There is nothing to process\n" );

			return;
		}

		global $wgEchoCluster;

		$dbw = MWEchoDbFactory::getDB( DB_MASTER );
		$dbr = MWEchoDbFactory::getDB( DB_REPLICA );

		$count = $this->batchSize;

		while ( $count == $this->batchSize ) {
			$res = $dbr->select(
				[ 'echo_event' ],
				[ 'event_id' ],
				[
					'event_type' => $this->invalidEventType,
				],
				__METHOD__,
				[ 'LIMIT' => $this->batchSize ]
			);

			$event = [];
			$count = 0;
			foreach ( $res as $row ) {
				if ( !in_array( $row->event_id, $event ) ) {
					$event[] = $row->event_id;
				}
				$count++;
			};

			if ( $event ) {
				$this->beginTransaction( $dbw, __METHOD__ );

				$dbw->delete(
					'echo_event',
					[ 'event_id' => $event ],
					__METHOD__
				);
				$dbw->delete(
					'echo_notification',
					[ 'notification_event' => $event ],
					__METHOD__
				);

				$this->commitTransaction( $dbw, __METHOD__ );

				$this->output( "processing " . count( $event ) . " invalid events\n" );
				wfWaitForSlaves( false, false, $wgEchoCluster );
			}

			// Cleanup is not necessary for
			// 1. echo_email_batch, invalid notification is removed during the cron
		}
	}
}

$maintClass = 'RemoveInvalidNotification'; // Tells it to run the class
require_once RUN_MAINTENANCE_IF_MAIN;
