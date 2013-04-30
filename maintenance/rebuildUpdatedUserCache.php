<?php
/**
 * @ingroup Maintenance
 */
require_once ( getenv( 'MW_INSTALL_PATH' ) !== false
	? getenv( 'MW_INSTALL_PATH' ) . '/maintenance/Maintenance.php'
	: dirname( __FILE__ ) . '/../../../maintenance/Maintenance.php' );

/**
 * Rebuild cache for users updated by CopyExistingEmailPreference
 *
 * @ingroup Maintenance
 */
class RebuildUpdatedUserCache extends Maintenance {

	public function __construct() {
		parent::__construct();
		$this->mDescription = "Script for clearing user cache for updated users";
		$this->addOption( 'batch', 'Batch size', false, true );
	}

	public function execute() {
		global $wgMemc;

		if( $this->hasOption( 'batch' ) ) {
			$batch = $this->getOption( 'batch' );
		} else {
			$batch = 100;
		}

		$begin = time();
		$dbr = $this->getDB( DB_SLAVE );
		$updated = 0;
		$lastUserID = 0;

		while ( true ) {
			$res = $dbr->select(
				'user_properties', // table
				array( 'up_user' ), // fields
				array(
					'up_property' => 'enotifusertalkpages',
					'up_user > ' . $dbr->addQuotes( $lastUserID ),
				), // conditions
				__METHOD__, // caller
				array( 'LIMIT' => $batch, 'ORDER BY' => 'up_user' ) // options
			);
			if ( !$res->numRows() ) {
				break;
			}
			foreach ( $res as $row ) {
				$lastUserID = $row->up_user;
				$user = User::newFromId( $row->up_user );
				$user->invalidateCache();
				$updated++;
			}
			$this->output( "Updated: $updated; Last ID processed: $lastUserID\n" );
			wfWaitForSlaves();
		}

		$end = time();
		$duration = $end - $begin;
		$this->output( "Done. Elapsed seconds: $duration\n" );
	}
}

$maintClass = 'RebuildUpdatedUserCache'; // Tells it to run the class
require_once( RUN_MAINTENANCE_IF_MAIN );
