<?php
/**
 * Opt existing users out of some echo notifications
 *
 * @ingroup Maintenance
 */
require_once ( getenv( 'MW_INSTALL_PATH' ) !== false
	? getenv( 'MW_INSTALL_PATH' ) . '/maintenance/Maintenance.php'
	: dirname( __FILE__ ) . '/../../../maintenance/Maintenance.php' );

/**
 * Set existing user's notification prefs to be different than defaults in some cases.
 *
 * @ingroup Maintenance
 */
class SetEmailOptionTemp extends Maintenance {

	public function __construct() {
		parent::__construct();
		$this->mDescription = "Script for pre-emptively updating user options of users who have opted out of talk page emails";
		$this->addOption( 'days', 'Only update users that have been active within this number of days (maximum 100)', true, true, 'd' );
		$this->setBatchSize( 100 );
	}

	public function execute() {
		$begin = time();
		$dbr = $this->getDB( DB_SLAVE );

		$total = 0;
		$updated = 0;
		$lastUserID = 0;

		// Generate the proper timestamp to use as a threshold
		$now = time();
		if ( $this->getOption( 'days' ) > 100 ) {
			$days = 100;
		} else {
			$days = $this->getOption( 'days' );
		}
		$seconds = $days * 86400;
		$threshold = $now - $seconds;

		while ( true ) {
			$res = $dbr->select(
				'user', // table
				array( 'user_id' ), // fields
				array(
					'user_id > ' . $dbr->addQuotes( $lastUserID ),
					'user_touched > ' . $dbr->addQuotes( $dbr->timestamp( $threshold ) ),
				), // conditions
				__METHOD__, // caller
				array( 'LIMIT' => $this->mBatchSize, 'ORDER BY' => 'user_id' ) // options
			);
			if ( !$res->numRows() ) {
				break;
			}
			$total += $res->numRows();
			foreach ( $res as $row ) {
				$lastUserID = $row->user_id;
				$user = User::newFromId( $row->user_id );
				// If the user has disabled 'Email me when my user talk page is changed'
				// also disable the talk page email notification in Echo.
				if ( !$user->getOption( 'enotifusertalkpages' )
					&& is_null( $user->getOption( 'echo-subscriptions-email-edit-user-talk' ) )
				) {
					$user->setOption( 'echo-subscriptions-email-edit-user-talk', 0 );
					$user->saveSettings();
					$updated++;
				}
			}
			$this->output( "Processed: $total; Updated: $updated; Last ID processed: $lastUserID\n" );
			wfWaitForSlaves();
		}

		$end = time();
		$duration = $end - $begin;
		$this->output( "Done. Elapsed seconds: $duration\n" );
	}
}

$maintClass = 'SetEmailOptionTemp'; // Tells it to run the class
require_once( RUN_MAINTENANCE_IF_MAIN );
