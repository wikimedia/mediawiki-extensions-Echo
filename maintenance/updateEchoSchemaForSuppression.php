<?php
/**
 * Update event_page_id in echo_event based on event_page_title and
 * event_page_namespace
 *
 * @ingroup Maintenance
 */
require_once ( getenv( 'MW_INSTALL_PATH' ) !== false
	? getenv( 'MW_INSTALL_PATH' ) . '/maintenance/Maintenance.php'
	: __DIR__ . '/../../../maintenance/Maintenance.php' );

/**
 * Maintenance script that populates the event_page_id column of echo_event
 *
 * @ingroup Maintenance
 */
class UpdateEchoSchemaForSuppression extends Maintenance {

	/**
	 * @var $table string The table to update
	 */
	protected $table = 'echo_event';

	/**
	 * @var $idField string The primary key column of the table to update
	 */
	protected $idField = 'event_id';

	public function __construct() {
		parent::__construct();
		$this->setBatchSize( 500 );
	}

	public function execute() {
		global $wgEchoCluster;

		$reader = new EchoBatchRowIterator( MWEchoDbFactory::getDB( DB_SLAVE ), $this->table, $this->idField, $this->mBatchSize );
		$reader->addConditions( array(
			"event_page_title IS NOT NULL",
			"event_page_id" => null,
		) );

		$updater = new EchoBatchRowUpdate(
			$reader,
			new EchoBatchRowWriter( MWEchoDbFactory::getDB( DB_MASTER ), $this->table, $wgEchoCluster ),
			new EchoSuppressionRowUpdateGenerator
		);
		$updater->setOutput( array( $this, '__internalOutput' ) );
		$updater->execute();
	}

	/**
	 * Internal use only. parent::output() is a protected method, only way to access it from
	 * a callback in php5.3 is to make a public function. In 5.4 can replace with a Closure.
	 */
	public function __internalOutput( $text ) {
		$this->output( $text );
	}
}

$maintClass = 'UpdateEchoSchemaForSuppression'; // Tells it to run the class
require_once ( RUN_MAINTENANCE_IF_MAIN );
