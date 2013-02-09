<?php

$IP = getenv( 'MW_INSTALL_PATH' );
if ( $IP === false ) {
	$IP = dirname( __FILE__ ) . '/../..';
}
require_once( "$IP/maintenance/Maintenance.php" );

/**
 * A maintenance script that processes email digest
 */
class processEchoEmailBatch extends Maintenance {

	/**
	 * Max number of records to process at a time
	 * @var int
	 */
	protected $batchSize = 300;

	/**
	 * @var DatabaseBase
	 */
	protected $dbr;

	public function __construct() {
		parent::__construct();
		$this->mDescription = "Process email digest";
	}

	protected function init() {
		$this->dbr = wfGetDB( DB_SLAVE );
	}

	public function execute() {
		$this->init();
		$this->output( "Started processing... \n" );

		$startUserId = 0;
		$count = $this->batchSize;

		while ( $count === $this->batchSize ) {
			$count = 0;

			$res = MWEchoEmailBatch::getUsersToNotify( $startUserId, $this->batchSize );

			$updated = false;
			foreach ( $res as $row ) {
				$userId = intval( $row->eeb_user_id );
				if ( $userId && $userId > $startUserId ) {
					$emailBatch = MWEchoEmailBatch::newFromUserId( $userId );
					if ( $emailBatch ) {
						$this->output( "processing user_Id " . $userId . " \n" );
						$emailBatch->process();
					}
					$startUserId = $userId;
					$updated = true;
				}
				$count++;
			}
			wfWaitForSlaves();

			// double check to make sure that the id is updated
			if ( !$updated ) {
				break;
			}
		}

		$this->output( "Completed \n" );
	}
}

$maintClass = "processEchoEmailBatch";
require_once( DO_MAINTENANCE );
