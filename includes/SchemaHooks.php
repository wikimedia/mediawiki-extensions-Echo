<?php

namespace MediaWiki\Extension\Notifications;

use MediaWiki\Installer\DatabaseUpdater;
use MediaWiki\Installer\Hook\LoadExtensionSchemaUpdatesHook;
use MediaWiki\MainConfigNames;
use MediaWiki\MediaWikiServices;

class SchemaHooks implements LoadExtensionSchemaUpdatesHook {

	/**
	 * @param DatabaseUpdater $updater
	 */
	public function onLoadExtensionSchemaUpdates( $updater ) {
		$dbType = $updater->getDB()->getType();

		$dir = dirname( __DIR__ ) . '/sql';

		$updater->addExtensionUpdateOnVirtualDomain(
			[ DbDomains::VIRTUAL_DOMAIN, 'addTable', 'echo_event', "$dir/$dbType/tables-generated.sql", true ]
		);

		$updater->addExtensionUpdateOnVirtualDomain( [
			DbDomains::VIRTUAL_SHARED_DOMAIN,
			'addTable', 'echo_unread_wikis', "$dir/$dbType/tables-sharedtracking-generated.sql", true,
		] );

		// The full-file update must stay ahead of the per-table echo_push_* updates
		// below: the generated file creates all three push tables, and would fail on
		// a wiki where a per-table update already created a newer one.
		$updater->addExtensionUpdateOnVirtualDomain( [
			DbDomains::VIRTUAL_SHARED_DOMAIN,
			'addTable', 'echo_push_provider', "$dir/$dbType/tables-push-generated.sql", true,
		] );

		// 1.35
		$updater->addExtensionUpdateOnVirtualDomain( [
			DbDomains::VIRTUAL_SHARED_DOMAIN,
			'addTable', 'echo_push_subscription', "$dir/echo_push_subscription.sql", true,
		] );

		// 1.36
		$updater->addExtensionUpdateOnVirtualDomain(
			[ DbDomains::VIRTUAL_SHARED_DOMAIN, 'addTable', 'echo_push_topic', "$dir/echo_push_topic.sql", true ]
		);

		// 1.39
		if ( $dbType === 'mysql' ) {
			// Split into single steps to support updates from some releases as well - T322143
			$updater->addExtensionUpdateOnVirtualDomain( [
				DbDomains::VIRTUAL_SHARED_DOMAIN,
				'renameIndex', 'echo_push_subscription', 'echo_push_subscription_user_id', 'eps_user', false,
				"$dir/$dbType/patch-echo_push_subscription-rename-index-eps_user.sql", true,
			] );
			$updater->addExtensionUpdateOnVirtualDomain( [
				DbDomains::VIRTUAL_SHARED_DOMAIN,
				'dropIndex', 'echo_push_subscription', 'echo_push_subscription_token',
				"$dir/$dbType/patch-echo_push_subscription-drop-index-eps_token.sql", true,
			] );
			$updater->addExtensionUpdateOnVirtualDomain( [
				DbDomains::VIRTUAL_SHARED_DOMAIN,
				'addIndex', 'echo_push_subscription', 'eps_token',
				"$dir/$dbType/patch-echo_push_subscription-create-index-eps_token.sql", true,
			] );
			$updater->addExtensionUpdateOnVirtualDomain( [
				DbDomains::VIRTUAL_SHARED_DOMAIN,
				'addField', 'echo_push_subscription', 'eps_topic',
				"$dir/$dbType/patch-echo_push_subscription-add-column-eps_topic.sql", true,
			] );
			$updater->addExtensionUpdateOnVirtualDomain( [
				DbDomains::VIRTUAL_SHARED_DOMAIN,
				[ __CLASS__, 'dropPushSubscriptionForeignKeys' ], $dir,
			] );
		}
		if ( $dbType === 'sqlite' ) {
			$updater->addExtensionUpdateOnVirtualDomain( [
				DbDomains::VIRTUAL_SHARED_DOMAIN,
				'addIndex', 'echo_push_subscription', 'eps_user',
				"$dir/$dbType/patch-cleanup-push_subscription-foreign-keys-indexes.sql", true,
			] );
		}

		// 1.44
		$updater->addExtensionUpdateOnVirtualDomain( [
			DbDomains::VIRTUAL_DOMAIN,
			'dropField', 'echo_event', 'event_variant', "$dir/$dbType/patch-echo_event-event_variant.sql", true,
		] );
	}

	/**
	 * Drop the foreign keys of echo_push_subscription, if they are present (1.39).
	 *
	 * Runs on the virtual-echo-shared domain: the check has to happen on that
	 * domain's connection, and DatabaseUpdater's patch helpers only queue
	 * updates for the main domain, so the patch files are applied directly.
	 *
	 * @param DatabaseUpdater $updater
	 * @param string $dir Echo's sql/ directory
	 */
	public static function dropPushSubscriptionForeignKeys( DatabaseUpdater $updater, string $dir ): void {
		$virtualDomainsMapping = MediaWikiServices::getInstance()->getMainConfig()
			->get( MainConfigNames::VirtualDomainsMapping );
		if ( ( $virtualDomainsMapping[DbDomains::VIRTUAL_SHARED_DOMAIN]['db'] ?? false ) !== false ) {
			// Never alter a shared database from a per-wiki update.php run,
			// mirroring what DatabaseUpdater::doTable() does for the updates
			// above; shared installs handle this cleanup out of band.
			return;
		}

		$dbw = $updater->getDB();
		if ( !$dbw->tableExists( 'echo_push_subscription', __METHOD__ ) ) {
			return;
		}

		$res = $dbw->query( 'SHOW CREATE TABLE ' . $dbw->tableName( 'echo_push_subscription' ), __METHOD__ );
		$row = $res ? $res->fetchRow() : false;
		$statement = $row ? $row[1] : '';
		foreach ( [ 1, 2 ] as $i ) {
			if ( str_contains( $statement, $dbw->addIdentifierQuotes( "echo_push_subscription_ibfk_$i" ) ) ) {
				$updater->output( "Dropping echo_push_subscription_ibfk_$i foreign key " .
					"from echo_push_subscription\n" );
				$dbw->sourceFile( "$dir/mysql/patch-echo_push_subscription-drop-foreign-keys_$i.sql" );
			}
		}
	}

}
