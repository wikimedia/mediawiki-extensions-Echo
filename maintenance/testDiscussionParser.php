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

			$oldText = '';
			$newText = '';
			$allData = $newData['query']['pages'];
			$pageData = array_shift( $allData );
			if ( count( $pageData['revisions'] ) == 2 ) {
				$revision1 = $pageData['revisions'][0];
				$revision2 = $pageData['revisions'][1];
				$oldText = trim( $revision2['*'] ) . "\n";
				$newText = trim( $revision1['*'] ) . "\n";
			} elseif ( count( $pageData['revisions'] ) == 1 ) {
				$revision1 = $pageData['revisions'][0];
				$newText = trim( $revision1['*'] ) . "\n";
				$oldText = '';
			}

			$user = $pageData['revisions'][0]['user'];

			print "http://en.wikipedia.org/w/index.php?diff=prev&oldid=$revid\n";
			EchoDiscussionParser::getInterestedUsers( $oldText, $newText, $user ); // FIXME: getInterestedUsers() is undefined
		}
	}
}

$maintClass = "TestDiscussionParser";
require_once RUN_MAINTENANCE_IF_MAIN;
