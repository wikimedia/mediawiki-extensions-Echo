<?php
/**
 * Copy existing users preference on whether to get email talk page notifications
 * to the new notification system
 *
 * @ingroup Maintenance
 */
require_once ( getenv( 'MW_INSTALL_PATH' ) !== false
	? getenv( 'MW_INSTALL_PATH' ) . '/maintenance/Maintenance.php'
	: dirname( __FILE__ ) . '/../../../maintenance/Maintenance.php' );

/**
 * Copy user's notification pref from the old talk page email notification setting to the new one
 *
 * @ingroup Maintenance
 */
class CopyExistingEmailPreference extends Maintenance {

	public function __construct() {
		parent::__construct();
		$this->mDescription = "Script for install time copying of users who have opted out of talk page emails";
		$this->addOption( 'batch', 'Batch size for SQL partitioning', false, true );
	}

	public function execute() {
		$dbw = $this->getDB( DB_MASTER );

		if( $this->hasOption( 'batch' ) ) {
			$batch = $this->getOption( 'batch' );
		} else {
			$batch = 100;
		}

		// count the number of user who have opted out under the old system.
		// DatabaseBase::query does not return rows affected
		$users = $dbw->selectField( 'user_properties', 'COUNT(*)', array( "up_property='enotifusertalkpages'" ), __METHOD__ );

		$total = 0;

		// risks missing people if extra users opt out between script starting and finishing
		for( $i = 0; $i<$users;  $i+=$batch ) {
			$sql = "INSERT IGNORE INTO user_properties
SELECT up_user, 'echo-subscriptions-email-edit-user-talk', up_value
FROM user_properties
WHERE up_property = 'enotifusertalkpages'
ORDER BY up_user LIMIT $batch OFFSET $total";

			$res = $dbw->query(
				$sql,
				__METHOD__, // caller
				true // ignore errors
			);

			$total += $batch;

			if( $total < $users ) {
				$this->output( "Total Updated: $total\n" );
			}
			wfWaitForSlaves();
		}
		$this->output( "Done. Final total: $users\n" );
	}
}

$maintClass = 'CopyExistingEmailPreference'; // Tells it to run the class
require_once( RUN_MAINTENANCE_IF_MAIN );
