<?php

namespace MediaWiki\Extension\Notifications;

use MediaWiki\Config\Config;
use MediaWiki\MainConfigNames;
use MediaWiki\MediaWikiServices;

/**
 * The virtual database domains used by Echo.
 *
 * @see \MediaWiki\MainConfigSchema::VirtualDomainsMapping
 */
class DbDomains {

	/**
	 * Virtual database domain of the main Echo tables (echo_event,
	 * echo_notification, echo_email_batch, echo_target_page).
	 */
	public const VIRTUAL_DOMAIN = 'virtual-echo';

	/**
	 * Virtual database domain of the tables shared between the wikis of a
	 * farm (echo_unread_wikis and the echo_push_* tables). When this domain
	 * is not present in $wgVirtualDomainsMapping, cross-wiki unread
	 * notification tracking is considered unconfigured.
	 */
	public const VIRTUAL_SHARED_DOMAIN = 'virtual-echo-shared';

	/**
	 * Whether the shared virtual domain is configured, i.e. whether cross-wiki
	 * unread notification tracking is available on this wiki.
	 */
	public static function isSharedTrackingConfigured( Config $config ): bool {
		return isset( $config->get( MainConfigNames::VirtualDomainsMapping )[self::VIRTUAL_SHARED_DOMAIN] );
	}

	/**
	 * Check whether it makes sense to retry a failed lookup on the primary database.
	 *
	 * @return bool True if there are multiple servers and changes were made in this request; false otherwise
	 */
	public static function canRetryPrimary(): bool {
		$loadBalancer = MediaWikiServices::getInstance()->getDBLoadBalancerFactory()
			->getLoadBalancer( self::VIRTUAL_DOMAIN );

		return $loadBalancer->getServerCount() > 1 && $loadBalancer->hasOrMadeRecentPrimaryChanges();
	}

	/**
	 * extension.json registration callback. Maps the deprecated
	 * $wgEchoCluster, $wgEchoSharedTrackingDB and $wgEchoSharedTrackingCluster
	 * settings into $wgVirtualDomainsMapping, unless a mapping is already
	 * configured.
	 */
	public static function onRegistration(): void {
		global $wgEchoCluster, $wgEchoSharedTrackingDB, $wgEchoSharedTrackingCluster,
			$wgVirtualDomainsMapping;

		if ( $wgEchoCluster && !isset( $wgVirtualDomainsMapping[self::VIRTUAL_DOMAIN] ) ) {
			$wgVirtualDomainsMapping[self::VIRTUAL_DOMAIN] = [
				'cluster' => $wgEchoCluster,
				// 'db' must be false explicitly: without it,
				// LBFactory::isSharedVirtualDomain() would treat the domain as
				// shared and DatabaseUpdater would skip the Echo tables.
				'db' => false,
			];
		}

		if ( $wgEchoSharedTrackingDB && !isset( $wgVirtualDomainsMapping[self::VIRTUAL_SHARED_DOMAIN] ) ) {
			$mapping = [ 'db' => $wgEchoSharedTrackingDB ];
			if ( $wgEchoSharedTrackingCluster ) {
				$mapping['cluster'] = $wgEchoSharedTrackingCluster;
			}
			$wgVirtualDomainsMapping[self::VIRTUAL_SHARED_DOMAIN] = $mapping;
		}
	}
}
