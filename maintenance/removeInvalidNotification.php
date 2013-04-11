<?php
/**
 * Remove invalid events from echo_event and echo_notification
 *
 * @ingroup Maintenance
 */
require_once ( getenv( 'MW_INSTALL_PATH' ) !== false
	? getenv( 'MW_INSTALL_PATH' ) . '/maintenance/Maintenance.php'
	: dirname( __FILE__ ) . '/../../../maintenance/Maintenance.php' );

/**
 * Maintenance script that removes invalid notifications
 *
 * @ingroup Maintenance
 */
class removeInvalidNotification extends Maintenance {

	protected $batchSize = 500;
	protected $invalidEventType = array( 'article-linked' );

	public function execute() {
		if ( !$this->invalidEventType ) {
			$this->output( "There is nothing to process\n" );
			return;
		}

		global $wgEchoCluster;

		$dbw = MWEchoDbFactory::getDB( DB_MASTER );
		$dbr = MWEchoDbFactory::getDB( DB_SLAVE );

		$count = $this->batchSize;

		while ( $count == $this->batchSize ) {
			$res = $dbr->select(
				array( 'echo_event' ),
				array( 'event_id' ),
				array(
					'event_type' => $this->invalidEventType,
				),
				__METHOD__,
				array( 'LIMIT' => $this->batchSize )
			);

			$event = array();
			$count = 0;
			foreach( $res as $row ) {
				if ( !in_array( $row->event_id, $event ) ) {
					$event[] = $row->event_id;
				}
				$count++;
			};

			if ( $event ) {
				$dbw->begin();

				$dbw->delete(
					'echo_event',
					array( 'event_id' => $event ),
					__METHOD__
				);
				$dbw->delete(
					'echo_notification',
					array( 'notification_event' => $event ),
					__METHOD__
				);

				$dbw->commit();

				$this->output( "processing " . count( $event ) . " invalid events\n" );
				wfWaitForSlaves( false, false, $wgEchoCluster );
			}

			// Cleanup is not necessary for
			// 1. echo_email_batch, invalid notification is removed during the cron
		}
	}
}

$maintClass = 'removeInvalidNotification'; // Tells it to run the class
require_once( RUN_MAINTENANCE_IF_MAIN );
