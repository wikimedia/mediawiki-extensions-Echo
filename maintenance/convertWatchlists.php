<?php

require_once ( getenv( 'MW_INSTALL_PATH' ) !== false
	? getenv( 'MW_INSTALL_PATH' ) . '/maintenance/Maintenance.php'
	: dirname( __FILE__ ) . '/../../../maintenance/Maintenance.php' );

class EchoConvertWatchlists extends Maintenance {
	public function __construct() {
		parent::__construct();
		$this->mDescription = "Converts MediaWiki watchlists into Echo subscriptions";
	}

	public function execute() {
		$dbr = wfGetDB( DB_SLAVE );
		$uid = 0;
		$continue = true;

		// Do it one user at a time
		while ( $continue ) {
			$uRes = $dbr->select( 'user',
				'*',
				array( 'user_id > ' . $dbr->addQuotes( $uid ) ),
				__METHOD__,
				array( 'LIMIT' => 500 )
			);

			foreach ( $uRes as $uRow ) {
				$user = User::newFromRow( $uRow );
				$wlRes = $dbr->select( 'watchlist',
					array( 'wl_namespace', 'wl_title' ),
					array( 'wl_user' => $uRow->user_id ),
					__METHOD__
				);

				foreach ( $wlRes as $wlRow ) {
					$title = Title::makeTitleSafe( $wlRow->wl_namespace, $wlRow->wl_title );
					$subscription = new EchoSubscription( $user, 'edit', $title );
					$subscription->enableNotification( 'notify' );
					$subscription->save();
				}
			}
		}
	}
}

$maintClass = "EchoConvertWatchlists";
require_once( RUN_MAINTENANCE_IF_MAIN );
