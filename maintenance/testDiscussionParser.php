<?php

$IP = getenv( 'MW_INSTALL_PATH' );
if ( $IP === false ) {
	$IP = __DIR__ . '/../../..';
}
require_once "$IP/maintenance/Maintenance.php";

class TestDiscussionParser extends Maintenance {
	public function __construct() {
		parent::__construct();
		$this->mDescription = "Takes enwiki revision IDs and attempts to identify interested users";

		$this->addArg( 'revisions', 'Revision IDs, separated by commas', true /*required*/ );

		$this->requireExtension( 'Echo' );
	}

	public function execute() {
		$apiURL = 'http://en.wikipedia.org/w/api.php';

		$revisions = explode( ',', $this->getArg( 0 ) );

		// Retrieve original revisions and their predecessors
		$requestData = [
			'format' => 'php',
			'action' => 'query',
			'prop' => 'revisions',
			'revids' => implode( '|', $revisions ),
		];

		$originalData = Http::post(
			$apiURL,
			[
				'postData' => $requestData,
			]
		);

		$data = unserialize( $originalData );

		$pages = $data['query']['pages'];

		foreach ( $pages as $page ) {
			if ( count( $page['revisions'] ) !== 1 ) {
				continue;
			}

			$revid = $page['revisions'][0]['revid'];

			$newRequest = [
				'format' => 'php',
				'action' => 'query',
				'prop' => 'revisions',
				'titles' => $page['title'],
				'rvstartid' => $revid,
				'rvlimit' => 2,
				'rvprop' => 'ids|content|user',
			];

			$newData = Http::post(
				$apiURL,
				[
					'postData' => $newRequest,
				]
			);

			$newData = unserialize( $newData );

			$pageData = reset( $newData['query']['pages'] );
			$oldText = isset( $pageData['revisions'][1] )
				? trim( $pageData['revisions'][1]['*'] ) . "\n"
				: '';
			$newText = trim( $pageData['revisions'][0]['*'] ) . "\n";
			$user = $pageData['revisions'][0]['user'];

			print "http://en.wikipedia.org/w/index.php?diff=prev&oldid=$revid\n";
			EchoDiscussionParser::getInterestedUsers( $oldText, $newText, $user ); // FIXME: getInterestedUsers() is undefined
		}
	}
}

$maintClass = TestDiscussionParser::class;
require_once RUN_MAINTENANCE_IF_MAIN;
