<?php

namespace MediaWiki\Extension\Notifications\Test;

use Wikimedia\Rdbms\IMaintainableDatabase;

/**
 * Creates all Echo tables in the test database.
 *
 * Echo's tables belong to the virtual-echo and virtual-echo-shared domains,
 * which may map to other databases in the wiki's configuration. Virtual
 * domains resolve to the local database under PHPUnit (T384238), so the
 * tables cannot be assumed to exist there.
 */
trait EchoSchemaOverridesTrait {

	/** @inheritDoc */
	protected function getSchemaOverrides( IMaintainableDatabase $db ) {
		$sqlDir = dirname( __DIR__, 2 ) . '/sql/' . $db->getType();
		return [
			'scripts' => [
				"$sqlDir/tables-generated.sql",
				"$sqlDir/tables-push-generated.sql",
				"$sqlDir/tables-sharedtracking-generated.sql",
			],
			'create' => [
				'echo_event',
				'echo_notification',
				'echo_email_batch',
				'echo_target_page',
				'echo_push_provider',
				'echo_push_subscription',
				'echo_push_topic',
				'echo_unread_wikis',
			],
		];
	}
}
