<?php
/**
 * Remove invalid records from echo_target_page.  For instance, page has been
 * deleted or removed, notification has somehow been marked as read
 *
 * @ingroup Maintenance
 */
require_once ( getenv( 'MW_INSTALL_PATH' ) !== false
	? getenv( 'MW_INSTALL_PATH' ) . '/maintenance/Maintenance.php'
	: __DIR__ . '/../../../maintenance/Maintenance.php' );

/**
 * Maintenance script that removes invalid target page
 *
 * @ingroup Maintenance
 */
class RemoveInvalidTargetPage extends Maintenance {

	public function __construct() {
		parent::__construct();
		$this->mDescription = "Delete invalid records from echo_target_page";
		$this->setBatchSize( 500 );
	}

	public function execute() {
		$dbFactory = MWEchoDbFactory::newFromDefault();
		$dbw = $dbFactory->getEchoDb( DB_MASTER );
		$dbr = $dbFactory->getEchoDb( DB_SLAVE );

		$count = $this->mBatchSize;
		$userId = $eventId = 0;

		while ( $count == $this->mBatchSize ) {
			$res = $dbr->select(
				array(
					'echo_target_page',
					'echo_notification'
				),
				array(
					'etp_page',
					'etp_user',
					'etp_event',
					'notification_read_timestamp',
					'notification_bundle_base'
				),
				array(
					"etp_user > $userId OR ( etp_user = $userId AND etp_event > $eventId )"
				),
				__METHOD__,
				array(
					'ORDER BY' => 'etp_user, etp_event',
					'LIMIT' => $this->mBatchSize
				),
				array(
					'echo_notification' => array(
						'LEFT JOIN',
						'notification_event=etp_event AND notification_user = etp_user'
					),
				)
			);
			if ( !$res ) {
				$this->error( 'Could not select record from echo_target_page.', 1 );
			}

			$pageIds = $titles = array();
			foreach ( $res as $row ) {
				$pageIds[$row->etp_page] = $row->etp_page;
			}
			if ( $pageIds ) {
				foreach ( Title::newFromIds( $pageIds ) as $title ) {
					$titles[$title->getArticleID()] = true;
				}
			}

			// Reset the head of the iterator
			$res->rewind();
			$count = $invalidCount = 0;
			foreach ( $res as $row ) {
				if (
					// Delete if notification is read
					$row->notification_read_timestamp
					// Delete if this is no longer a base event and
					// it's not deleted from echo_target_page
					|| $row->notification_bundle_base == '0'
					// Delete if title is no longer valid
					|| !isset( $titles[$row->etp_page] )
				) {
					$dbw->delete(
						'echo_target_page',
						array(
							'etp_user' => $row->etp_user,
							'etp_event' => $row->etp_event
						),
						__METHOD__
					);
					$invalidCount++;
				}

				$userId = $row->etp_user;
				$eventId = $row->etp_event;
				$count++;
			};

			$this->output( "Deleted $invalidCount records from $count records\n" );
			$dbFactory->waitForSlaves();
		}
	}
}

$maintClass = 'RemoveInvalidTargetPage'; // Tells it to run the class
require_once ( RUN_MAINTENANCE_IF_MAIN );
