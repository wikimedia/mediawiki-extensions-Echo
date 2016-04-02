<?php

use MediaWiki\Logger\LoggerFactory;

class EchoHooks {
	const EMAIL_NEVER = -1; // Never send email notifications
	const EMAIL_IMMEDIATELY = 0; // Send email notificaitons immediately as they come in
	const EMAIL_DAILY_DIGEST = 1; // Send daily email digests
	const EMAIL_WEEKLY_DIGEST = 7; // Send weekly email digests
	const EMAIL_FORMAT_HTML = 'html';
	const EMAIL_FORMAT_PLAIN_TEXT = 'plain-text';

	/**
	 * Initialize Echo extension with necessary data, this function is invoked
	 * from $wgExtensionFunctions
	 */
	public static function initEchoExtension() {
		global $wgEchoNotifications, $wgEchoNotificationCategories, $wgEchoNotificationIcons,
			$wgEchoConfig;

		// allow extensions to define their own event
		Hooks::run( 'BeforeCreateEchoEvent', array( &$wgEchoNotifications, &$wgEchoNotificationCategories, &$wgEchoNotificationIcons ) );

		// turn schema off if eventLogging is not enabled
		if ( !class_exists( 'EventLogging' ) ) {
			foreach ( $wgEchoConfig['eventlogging'] as $schema => $property ) {
				if ( $property['enabled'] ) {
					$wgEchoConfig['eventlogging'][$schema]['enabled'] = false;
				}
			}
		}
	}

	public static function getNotificationSenderName() {
		global $wgNotificationSenderName;
		if ( $wgNotificationSenderName === null ) {
			$wgNotificationSenderName = wfMessage( 'emailsender' )->inContentLanguage()->text();
		}

		return $wgNotificationSenderName;
	}

	/**
	 * ResourceLoaderTestModules hook handler
	 * @see https://www.mediawiki.org/wiki/Manual:Hooks/ResourceLoaderTestModules
	 *
	 * @param array $testModules
	 * @param ResourceLoader $resourceLoader
	 * @return bool
	 */
	public static function onResourceLoaderTestModules( array &$testModules,
		ResourceLoader $resourceLoader
	) {
		global $wgResourceModules;

		$testModuleBoilerplate = array(
			'localBasePath' => __DIR__,
			'remoteExtPath' => 'Echo',
		);

		// find test files for every RL module
		$prefix = 'ext.echo';
		foreach ( $wgResourceModules as $key => $module ) {
			if ( substr( $key, 0, strlen( $prefix ) ) === $prefix && isset( $module['scripts'] ) ) {
				$testFiles = array();
				foreach ( $module['scripts'] as $script ) {
					$testFile = 'tests/qunit/' . dirname( $script ) . '/test_' . basename( $script );
					// if a test file exists for a given JS file, add it
					if ( file_exists( $testModuleBoilerplate['localBasePath'] . '/' . $testFile ) ) {
						$testFiles[] = $testFile;
					}
				}
				// if test files exist for given module, create a corresponding test module
				if ( count( $testFiles ) > 0 ) {
					$testModules['qunit']["$key.tests"] = $testModuleBoilerplate + array(
						'dependencies' => array( $key ),
						'scripts' => $testFiles,
					);
				}
			}
		}

		return true;
	}

	public static function onEventLoggingRegisterSchemas( array &$schemas ) {
		global $wgEchoConfig;
		foreach ( $wgEchoConfig['eventlogging'] as $schema => $property ) {
			if ( $property['enabled'] && $property['client'] ) {
				$schemas[$schema] = $property['revision'];
			}
		}
	}

	/**
	 * Handler for ResourceLoaderRegisterModules hook
	 */
	public static function onResourceLoaderRegisterModules( ResourceLoader &$resourceLoader ) {
		global $wgEchoConfig;

		// ext.echo.logger is used by mobile notifications as well, so be sure not to add any
		// dependencies that do not target mobile.
		$definition = array(
			'position' => 'top',
			'scripts' => array(
				'logger/mw.echo.Logger.js',
			),
			'dependencies' => array(
				'oojs'
			),
			'localBasePath' => __DIR__ . '/modules',
			'remoteExtPath' => 'Echo/modules',
			'targets' => array( 'desktop', 'mobile' ),
		);

		$hasSchemas = false;
		foreach ( $wgEchoConfig['eventlogging'] as $schema => $property ) {
			if ( $property['enabled'] && $property['client'] ) {
				$definition['dependencies'][] = 'schema.' . $schema;
				$hasSchemas = true;
			}
		}

		if ( $hasSchemas ) {
			$definition['dependencies'][] = 'ext.eventLogging';
		}

		$resourceLoader->register( 'ext.echo.logger', $definition );
	}

	/**
	 * @param $updater DatabaseUpdater object
	 */
	public static function onLoadExtensionSchemaUpdates( DatabaseUpdater $updater ) {
		global $wgEchoCluster;
		if ( $wgEchoCluster !== false ) {
			// DatabaseUpdater does not support other databases, so skip
			return;
		}
		$dir = __DIR__;
		$baseSQLFile = "$dir/echo.sql";
		$updater->addExtensionTable( 'echo_event', $baseSQLFile );
		$updater->addExtensionTable( 'echo_email_batch', "$dir/db_patches/echo_email_batch.sql" );
		$updater->addExtensionTable( 'echo_target_page', "$dir/db_patches/echo_target_page.sql" );

		if ( $updater->getDB()->getType() === 'sqlite' ) {
			$updater->modifyExtensionField( 'echo_event', 'event_agent', "$dir/db_patches/patch-event_agent-split.sqlite.sql" );
			$updater->modifyExtensionField( 'echo_event', 'event_variant', "$dir/db_patches/patch-event_variant_nullability.sqlite.sql" );
			$updater->addExtensionField( 'echo_target_page', 'etp_id', "$dir/db_patches/patch-multiple_target_pages.sqlite.sql" );
			// There is no need to run the patch-event_extra-size or patch-event_agent_ip-size because
			// sqlite ignores numeric arguments in parentheses that follow the type name (ex: VARCHAR(255))
			// see http://www.sqlite.org/datatype3.html Section 2.2 for more info
		} else {
			$updater->modifyExtensionField( 'echo_event', 'event_agent', "$dir/db_patches/patch-event_agent-split.sql" );
			$updater->modifyExtensionField( 'echo_event', 'event_variant', "$dir/db_patches/patch-event_variant_nullability.sql" );
			$updater->modifyExtensionField( 'echo_event', 'event_extra', "$dir/db_patches/patch-event_extra-size.sql" );
			$updater->modifyExtensionField( 'echo_event', 'event_agent_ip', "$dir/db_patches/patch-event_agent_ip-size.sql" );
			$updater->addExtensionField( 'echo_target_page', 'etp_id', "$dir/db_patches/patch-multiple_target_pages.sql" );
		}

		$updater->addExtensionField( 'echo_notification', 'notification_bundle_base',
			"$dir/db_patches/patch-notification-bundling-field.sql" );
		// This index was renamed twice,  first from type_page to event_type and later from event_type to echo_event_type
		if ( $updater->getDB()->indexExists( 'echo_event', 'type_page', __METHOD__ ) ) {
			$updater->addExtensionIndex( 'echo_event', 'event_type', "$dir/db_patches/patch-alter-type_page-index.sql" );
		}
		$updater->dropTable( 'echo_subscription' );
		$updater->dropExtensionField( 'echo_event', 'event_timestamp', "$dir/db_patches/patch-drop-echo_event-event_timestamp.sql" );
		$updater->addExtensionField( 'echo_email_batch', 'eeb_event_hash',
			"$dir/db_patches/patch-email_batch-new-field.sql" );
		$updater->addExtensionField( 'echo_event', 'event_page_id', "$dir/db_patches/patch-add-echo_event-event_page_id.sql" );
		$updater->addExtensionIndex( 'echo_event', 'echo_event_type', "$dir/db_patches/patch-alter-event_type-index.sql" );
		$updater->addExtensionIndex( 'echo_notification', 'echo_user_timestamp', "$dir/db_patches/patch-alter-user_timestamp-index.sql" );
	}

	/**
	 * Handler for EchoGetBundleRule hook, which defines the bundle rule for each notification
	 *
	 * @param $event EchoEvent
	 * @param $bundleString string Determines how the notification should be bundled, for example,
	 * talk page notification is bundled based on namespace and title, the bundle string would be
	 * 'edit-user-talk-' + namespace + title, email digest/email bundling would use this hash as
	 * a key to identify bundle-able event.  For web bundling, we bundle further based on user's
	 * visit to the overlay, we would generate a display hash based on the hash of $bundleString
	 *
	 * @return bool
	 */
	public static function onEchoGetBundleRules( $event, &$bundleString ) {
		switch ( $event->getType() ) {
			case 'edit-user-talk':
				$bundleString = 'edit-user-talk';
				if ( $event->getTitle() ) {
					$bundleString .= '-' . $event->getTitle()->getNamespace()
						. '-' . $event->getTitle()->getDBkey();
				}
				break;
			case 'page-linked':
				$bundleString = 'page-linked';
				if ( $event->getTitle() ) {
					$bundleString .= '-' . $event->getTitle()->getNamespace()
						. '-' . $event->getTitle()->getDBkey();
				}
				break;
		}

		return true;
	}

	/**
	 * Handler for the GetBetaFeaturePreferences hook.
	 * @see https://www.mediawiki.org/wiki/Manual:Hooks/GetBetaFeaturePreferences
	 *
	 * @param $user User to get preferences for
	 * @param &$preferences Preferences array
	 *
	 * @return bool true in all cases
	 */
	public static function getBetaFeaturePreferences( User $user, array &$preferences ) {
		global $wgExtensionAssetsPath, $wgEchoUseCrossWikiBetaFeature;

		if ( $wgEchoUseCrossWikiBetaFeature ) {
			$preferences['echo-cross-wiki-notifications'] = array(
				'label-message' => 'echo-pref-beta-feature-cross-wiki-message',
				'desc-message' => 'echo-pref-beta-feature-cross-wiki-description',
				// Paths to images that represents the feature.
				'screenshot' => array(
					'rtl' => "$wgExtensionAssetsPath/Echo/images/betafeatures-icon-notifications-rtl.svg",
					'ltr' => "$wgExtensionAssetsPath/Echo/images/betafeatures-icon-notifications-ltr.svg",
				),
				'info-link' => 'https://www.mediawiki.org/wiki/Special:Mylanguage/Help:Notifications/Cross-wiki',
				// Link to discussion about the feature - talk pages might work
				'discussion-link' => 'https://www.mediawiki.org/wiki/Help_talk:Notifications',
			);
		}

		return true;
	}

	/**
	 * Handler for GetPreferences hook.
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/GetPreferences
	 *
	 * @param $user User to get preferences for
	 * @param &$preferences Preferences array
	 *
	 * @throws MWException
	 * @return bool true in all cases
	 */
	public static function getPreferences( $user, &$preferences ) {
		global $wgEchoDefaultNotificationTypes, $wgAuth, $wgEchoEnableEmailBatch,
			$wgEchoNotifiers, $wgEchoNotificationCategories, $wgEchoNotifications,
			$wgEchoNewMsgAlert, $wgAllowHTMLEmail, $wgEchoUseCrossWikiBetaFeature,
			$wgEchoShowFooterNotice;

		// Show email frequency options
		$never = wfMessage( 'echo-pref-email-frequency-never' )->plain();
		$immediately = wfMessage( 'echo-pref-email-frequency-immediately' )->plain();
		$freqOptions = array(
			$never => self::EMAIL_NEVER,
			$immediately => self::EMAIL_IMMEDIATELY,
		);
		// Only show digest options if email batch is enabled
		if ( $wgEchoEnableEmailBatch ) {
			$daily = wfMessage( 'echo-pref-email-frequency-daily' )->plain();
			$weekly = wfMessage( 'echo-pref-email-frequency-weekly' )->plain();
			$freqOptions += array(
				$daily => self::EMAIL_DAILY_DIGEST,
				$weekly => self::EMAIL_WEEKLY_DIGEST
			);
		}
		$preferences['echo-email-frequency'] = array(
			'type' => 'select',
			'label-message' => 'echo-pref-send-me',
			'section' => 'echo/emailsettings',
			'options' => $freqOptions
		);

		// Display information about the user's currently set email address
		$prefsTitle = SpecialPage::getTitleFor( 'Preferences', false, 'mw-prefsection-echo' );
		$link = Linker::link(
			SpecialPage::getTitleFor( 'ChangeEmail' ),
			wfMessage( $user->getEmail() ? 'prefs-changeemail' : 'prefs-setemail' )->escaped(),
			array(),
			array( 'returnto' => $prefsTitle->getFullText() )
		);
		$emailAddress = $user->getEmail() ? htmlspecialchars( $user->getEmail() ) : '';
		if ( $wgAuth->allowPropChange( 'emailaddress' ) ) {
			if ( $emailAddress === '' ) {
				$emailAddress .= $link;
			} else {
				$emailAddress .= wfMessage( 'word-separator' )->escaped()
					. wfMessage( 'parentheses' )->rawParams( $link )->escaped();
			}
		}
		$preferences['echo-emailaddress'] = array(
			'type' => 'info',
			'raw' => true,
			'default' => $emailAddress,
			'label-message' => 'echo-pref-send-to',
			'section' => 'echo/emailsettings'
		);

		// Only show this option if html email is allowed, otherwise it is always plain text format
		if ( $wgAllowHTMLEmail ) {
			// Email format
			$preferences['echo-email-format'] = array(
				'type' => 'select',
				'label-message' => 'echo-pref-email-format',
				'section' => 'echo/emailsettings',
				'options' => array(
					wfMessage( 'echo-pref-email-format-html' )->plain() => self::EMAIL_FORMAT_HTML,
					wfMessage( 'echo-pref-email-format-plain-text' )->plain() => self::EMAIL_FORMAT_PLAIN_TEXT
				)
			);
		}

		// Sort notification categories by priority
		$categoriesAndPriorities = array();
		foreach ( $wgEchoNotificationCategories as $category => $categoryData ) {
			// See if the category is not dismissable at all. Must do strict
			// comparison to true since no-dismiss can also be an array
			if ( isset( $categoryData['no-dismiss'] ) && in_array( 'all', $categoryData['no-dismiss'] ) ) {
				continue;
			}
			$attributeManager = EchoAttributeManager::newFromGlobalVars();
			// See if user is eligible to recieve this notification (per user group restrictions)
			if ( $attributeManager->getCategoryEligibility( $user, $category ) ) {
				$categoriesAndPriorities[$category] = $attributeManager->getCategoryPriority( $category );
			}
		}
		asort( $categoriesAndPriorities );
		$validSortedCategories = array_keys( $categoriesAndPriorities );

		// Show subscription options.  IMPORTANT: 'echo-subscriptions-email-edit-user-talk' is a
		// virtual option, its value is saved to existing talk page notification option
		// 'enotifusertalkpages', see onUserLoadOptions() and onUserSaveOptions() for more
		// information on how it is handled. Doing it in this way, we can avoid keeping running
		// massive data migration script to keep these two options synced when echo is enabled on
		// new wikis or Echo is disabled and re-enabled for some reason.  We can update the name
		// if Echo is ever merged to core

		// Build the columns (output formats)
		$columns = array();
		foreach ( $wgEchoNotifiers as $notifierType => $notifierData ) {
			$formatMessage = wfMessage( 'echo-pref-' . $notifierType )->escaped();
			$columns[$formatMessage] = $notifierType;
		}

		// Build the rows (notification categories)
		$rows = array();
		$tooltips = array();
		foreach ( $validSortedCategories as $category ) {
			$categoryMessage = wfMessage( 'echo-category-title-' . $category )->numParams( 1 )->escaped();
			$rows[$categoryMessage] = $category;
			if ( isset( $wgEchoNotificationCategories[$category]['tooltip'] ) ) {
				$tooltips[$categoryMessage] = wfMessage( $wgEchoNotificationCategories[$category]['tooltip'] )->text();
			}
		}

		// Figure out the individual exceptions in the matrix and make them disabled
		$forceOptionsOff = $forceOptionsOn = array();
		foreach ( $wgEchoNotifiers as $notifierType => $notifierData ) {
			foreach ( $validSortedCategories as $category ) {
				// See if this output format is non-dismissable
				if ( isset( $wgEchoNotificationCategories[$category]['no-dismiss'] )
					&& in_array( $notifierType, $wgEchoNotificationCategories[$category]['no-dismiss'] )
				) {
					$forceOptionsOn[] = "$notifierType-$category";
				}

				// Make sure this output format is possible for this notification category
				if ( isset( $wgEchoDefaultNotificationTypes[$category] ) ) {
					if ( !$wgEchoDefaultNotificationTypes[$category][$notifierType] ) {
						$forceOptionsOff[] = "$notifierType-$category";
					}
				} elseif ( !$wgEchoDefaultNotificationTypes['all'][$notifierType] ) {
					$forceOptionsOff[] = "$notifierType-$category";
				}
			}
		}

		$invalid = array_intersect( $forceOptionsOff, $forceOptionsOn );
		if ( $invalid ) {
			throw new MWException( sprintf(
				'The following notifications are both forced and removed: %s',
				implode( ', ', $invalid )
			) );
		}
		$preferences['echo-subscriptions'] = array(
			'class' => 'HTMLCheckMatrix',
			'section' => 'echo/echosubscriptions',
			'rows' => $rows,
			'columns' => $columns,
			'prefix' => 'echo-subscriptions-',
			'force-options-off' => $forceOptionsOff,
			'force-options-on' => $forceOptionsOn,
			'tooltips' => $tooltips,
		);

		if ( !$wgEchoUseCrossWikiBetaFeature ) {
			$preferences['echo-cross-wiki-notifications'] = array(
				'type' => 'toggle',
				'label-message' => 'echo-pref-cross-wiki-notifications',
				'section' => 'echo/echocrosswiki'
			);
		}

		if ( $wgEchoNewMsgAlert ) {
			$preferences['echo-show-alert'] = array(
				'type' => 'toggle',
				'label-message' => 'echo-pref-new-message-indicator',
				'section' => 'echo/newmessageindicator',
			);
		}

		// If we're using Echo to handle user talk page post notifications,
		// hide the old (non-Echo) preference for this. If Echo is moved to core
		// we'll want to remove this old user option entirely. For now, though,
		// we need to keep it defined in case Echo is ever uninstalled.
		// Otherwise, that preference could be lost entirely. This hiding logic
		// is not abstracted since there is only a single preference in core
		// that is potentially made obsolete by Echo.
		if ( isset( $wgEchoNotifications['edit-user-talk'] ) ) {
			$preferences['enotifusertalkpages']['type'] = 'hidden';
			unset( $preferences['enotifusertalkpages']['section'] );
		}

		if ( $wgEchoShowFooterNotice ) {
			$preferences['echo-dismiss-feedback-alert'] = array(
				'type' => 'api',
			);
		}

		return true;
	}

	/**
	 * Handler for ArticleSaveComplete hook
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/ArticleSaveComplete
	 * @param $article Article edited
	 * @param $user User who edited
	 * @param $text string New article text
	 * @param $summary string Edit summary
	 * @param $minoredit bool Minor edit or not
	 * @param $watchthis bool Watch this article?
	 * @param $sectionanchor string Section that was edited
	 * @param $flags int Edit flags
	 * @param $revision Revision that was created
	 * @param $status Status
	 * @return bool true in all cases
	 */
	public static function onArticleSaved( &$article, &$user, $text, $summary, $minoredit, $watchthis, $sectionanchor, &$flags, $revision, &$status ) {
		global $wgEchoNotifications, $wgRequest;

		if ( !$revision ) {
			return true;
		}

		// unless status is "good" (not only ok, also no warnings or errors), we
		// probably shouldn't process it at all (e.g. null edits)
		if ( !$status->isGood() ) {
			return true;
		}

		$title = $article->getTitle();

		// Try to do this after the HTTP response
		DeferredUpdates::addCallableUpdate( function () use ( $revision ) {
			EchoDiscussionParser::generateEventsForRevision( $revision );
		} );

		// If the user is not an IP and this is not a null edit,
		// test for them reaching a congratulatory threshold
		$thresholds = [ 1, 10, 100, 1000, 10000, 100000, 1000000 ];
		if ( $user->isLoggedIn() && $status->value['revision'] ) {
			// This edit hasn't been added to the edit count yet
			$thresholdCount = $user->getEditCount() + 1;
			if ( in_array( $thresholdCount, $thresholds ) ) {
				$id = $user->getId();
				DeferredUpdates::addCallableUpdate( function () use ( $id, $title, $thresholdCount ) {
					// Fresh User object
					$user = User::newFromId( $id );
					$userEditCount = $user->getEditCount();
					if ( (int)$userEditCount !== (int)$thresholdCount ) {
						// Race condition with multiple simultaneous requests, skip
						LoggerFactory::getInstance( 'Echo' )->debug(
							'thank-you-edit race condition detected: {user} (id: {id}) should ' .
							'have had {expectedCount} edits but has {actualCount}',
							array(
								'user' => $user->getName(),
								'id' => $user->getId(),
								'expectedCount' => $thresholdCount,
								'actualCount' => $userEditCount,
							)
						);
						return;
					}
					LoggerFactory::getInstance( 'Echo' )->debug(
						'Thanking {user} (id: {id}) for their {count} edit',
						array(
							'user' => $user->getName(),
							'id' => $user->getId(),
							'count' => $thresholdCount,
						)
					);
					EchoEvent::create( array(
							'type' => 'thank-you-edit',
							'title' => $title,
							'agent' => $user,
							// Edit threshold notifications are sent to the agent
							'extra' => array(
								'notifyAgent' => true,
								'editCount' => $thresholdCount,
							)
						)
					);
				} );
			}
		}

		// Handle the case of someone undoing an edit, either through the
		// 'undo' link in the article history or via the API.
		if ( isset( $wgEchoNotifications['reverted'] ) ) {
			$undidRevId = $wgRequest->getVal( 'wpUndidRevision' );
			if ( $undidRevId ) {
				$undidRevision = Revision::newFromId( $undidRevId );
				if ( $undidRevision && $undidRevision->getTitle()->equals( $title ) ) {
					$victimId = $undidRevision->getUser();
					if ( $victimId ) { // No notifications for anonymous users
						EchoEvent::create( array(
							'type' => 'reverted',
							'title' => $title,
							'extra' => array(
								'revid' => $revision->getId(),
								'reverted-user-id' => $victimId,
								'reverted-revision-id' => $undidRevId,
								'method' => 'undo',
								'summary' => $summary,
							),
							'agent' => $user,
						) );
					}
				}
			}
		}

		return true;
	}

	/**
	 * Handler for EchoAbortEmailNotification hook
	 * @param $user User
	 * @param $event EchoEvent
	 * @return bool true - send email, false - do not send email
	 */
	public static function onEchoAbortEmailNotification( $user, $event ) {
		if ( $event->getType() === 'edit-user-talk' ) {
			$extra = $event->getExtra();
			if ( !empty( $extra['minoredit'] ) ) {
				global $wgEnotifMinorEdits;
				if ( !$wgEnotifMinorEdits || !$user->getOption( 'enotifminoredits' ) ) {
					// Do not send talk page notification email
					return false;
				}
			}
		}

		// Proceed to send talk page notification email
		return true;
	}

	/**
	 * Handler for AddNewAccount hook.
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/AddNewAccount
	 * @param $user User object that was created.
	 * @param $byEmail bool True when account was created "by email".
	 * @return bool
	 */
	public static function onAccountCreated( $user, $byEmail ) {

		// new users get echo preferences set that are not the default settings for existing users
		$user->setOption( 'echo-subscriptions-web-reverted', false );
		$user->setOption( 'echo-subscriptions-email-reverted', false );
		$user->setOption( 'echo-subscriptions-web-article-linked', true );
		$user->setOption( 'echo-subscriptions-email-mention', true );
		$user->setOption( 'echo-subscriptions-email-article-linked', true );
		$user->saveSettings();

		EchoEvent::create( array(
			'type' => 'welcome',
			'agent' => $user,
			// Welcome notification is sent to the agent
			'extra' => array(
				'notifyAgent' => true
			)
		) );

		return true;
	}

	/**
	 * Handler for UserGroupsChanged hook.
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/UserGroupsChanged
	 *
	 * @param User $user user that was changed
	 * @param string[] $add strings corresponding to groups added
	 * @param string[] $remove strings corresponding to groups removed
	 * @param User|bool $performer
	 * @param string|bool $reason Reason given by the user changing the rights
	 *
	 * @return bool
	 */
	public static function onUserGroupsChanged( $user, $add, $remove, $performer, $reason ) {
		if ( !$performer ) {
			// TODO: Implement support for autopromotion
			return true;
		}

		if ( !$user instanceof User ) {
			// TODO: Support UserRightsProxy
			return true;
		}

		if ( $user->equals( $performer ) ) {
			// Don't notify for self changes
			return true;
		}

		if ( $add || $remove ) {
			EchoEvent::create(
				array(
					'type' => 'user-rights',
					'title' => Title::newMainPage(),
					'extra' => array(
						'user' => $user->getID(),
						'add' => $add,
						'remove' => $remove,
						'reason' => $reason,
					),
					'agent' => $performer,
				)
			);
		}

		return true;
	}

	/**
	 * Handler for LinksUpdateAfterInsert hook.
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/LinksUpdateAfterInsert
	 * @param $linksUpdate LinksUpdate
	 * @param $table string
	 * @param $insertions array
	 * @return bool
	 */
	public static function onLinksUpdateAfterInsert( $linksUpdate, $table, $insertions ) {
		global $wgRequest;

		// FIXME: This doesn't work in 1.27+
		// Rollback or undo should not trigger link notification
		// @Todo Implement a better solution so it doesn't depend on the checking of
		// a specific set of request variables
		if ( $wgRequest->getVal( 'wpUndidRevision' ) || $wgRequest->getVal( 'action' ) == 'rollback' ) {
			return true;
		}

		// Handle only
		// 1. inserts to pagelinks table &&
		// 2. content namespace pages &&
		// 3. non-transcluding pages &&
		// 4. non-redirect pages
		if ( $table !== 'pagelinks' || !MWNamespace::isContent( $linksUpdate->mTitle->getNamespace() )
			|| !$linksUpdate->mRecursive || $linksUpdate->mTitle->isRedirect()
		) {
			return true;
		}

		if ( is_callable( array( $linksUpdate, 'getTriggeringUser' ) ) ) {
			$user = $linksUpdate->getTriggeringUser();
		} else {
			global $wgUser;
			$user = $wgUser;
		}

		// link notification is boundless as you can include infinite number of links in a page
		// db insert is expensive, limit it to a reasonable amount, we can increase this limit
		// once the storage is on Redis
		$max = 10;
		// Only create notifications for links to content namespace pages
		// @Todo - use one big insert instead of individual insert inside foreach loop
		foreach ( $insertions as $page ) {
			if ( MWNamespace::isContent( $page['pl_namespace'] ) ) {
				$title = Title::makeTitle( $page['pl_namespace'], $page['pl_title'] );
				if ( $title->isRedirect() ) {
					continue;
				}

				EchoEvent::create( array(
					'type' => 'page-linked',
					'title' => $title,
					'agent' => $user,
					'extra' => array(
						'link-from-page-id' => $linksUpdate->mTitle->getArticleId(),
					)
				) );
				$max--;
			}
			if ( $max < 0 ) {
				break;
			}
		}

		return true;
	}

	/**
	 * Handler for BeforePageDisplay hook.
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/BeforePageDisplay
	 * @param $out OutputPage object
	 * @param $skin Skin being used.
	 * @return bool true in all cases
	 */
	static function beforePageDisplay( $out, $skin ) {
		if ( $out->getUser()->isLoggedIn() && $skin->getSkinName() !== 'minerva' ) {
			// Load the module for the Notifications flyout
			$out->addModules( array( 'ext.echo.init' ) );
			// Load the styles for the Notifications badge
			$out->addModuleStyles( array(
				'ext.echo.styles.badge',
				'ext.echo.badgeicons'
			) );
		}

		return true;
	}

	/**
	 * Handler for PersonalUrls hook.
	 * Add a "Notifications" item to the user toolbar ('personal URLs').
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/PersonalUrls
	 * @param &$personal_urls Array of URLs to append to.
	 * @param &$title Title of page being visited.
	 * @param SkinTemplate $sk
	 * @return bool true in all cases
	 */
	static function onPersonalUrls( &$personal_urls, &$title, $sk ) {
		global $wgEchoNewMsgAlert;
		$user = $sk->getUser();
		if ( $user->isAnon() ) {
			return true;
		}

		// Attempt to mark a notification as read when visiting a page
		// @todo should this really be here?
		$subtractAlerts = 0;
		$subtractMessages = 0;
		if ( $title->getArticleID() ) {
			$mapper = new EchoTargetPageMapper();
			$fetchedTargetPages = $mapper->fetchByUserPageId( $user, $title->getArticleID() );
			if ( $fetchedTargetPages ) {
				$eventIds = array();
				$attribManager = EchoAttributeManager::newFromGlobalVars();
				/* @var EchoTargetPage[] $targetPages */
				foreach ( $fetchedTargetPages as $id => $targetPages ) {
					// Only look at the first target page since they'll
					// all point to the same event
					$section = $attribManager->getNotificationSection(
						$targetPages[0]->getEventType()
					);
					if ( $section === EchoAttributeManager::MESSAGE ) {
						$subtractMessages += 1;
					} else {
						// ALERT
						$subtractAlerts += 1;
					}
					$eventIds[] = $id;
				}
				DeferredUpdates::addCallableUpdate( function () use ( $user, $eventIds ) {
					$notifUser = MWEchoNotifUser::newFromUser( $user );
					$notifUser->markRead( $eventIds );
				} );
			}
		}

		// Add a "My notifications" item to personal URLs
		$notifUser = MWEchoNotifUser::newFromUser( $user );
		$msgCount = $notifUser->getMessageCount() - $subtractMessages;
		$alertCount = $notifUser->getAlertCount() - $subtractAlerts;

		$msgNotificationTimestamp = $notifUser->getLastUnreadMessageTime();
		$alertNotificationTimestamp = $notifUser->getLastUnreadAlertTime();

		$seenAlertTime = EchoSeenTime::newFromUser( $user )->getTime( 'alert' );
		$seenMsgTime = EchoSeenTime::newFromUser( $user )->getTime( 'message' );

		$sk->getOutput()->addJsConfigVars( 'wgEchoInitialNotifCount', array(
			'alert' => $alertCount,
			'message' => $msgCount
		) );

		$sk->getOutput()->addJsConfigVars( 'wgEchoSeenTime', array(
			'alert' => $seenAlertTime,
			'message' => $seenMsgTime
		) );

		$msgText = EchoNotificationController::formatNotificationCount( $msgCount );
		$alertText = EchoNotificationController::formatNotificationCount( $alertCount );

		$url = SpecialPage::getTitleFor( 'Notifications' )->getLocalURL();

		// HACK: inverted icons only work in the "MediaWiki" OOUI theme
		// Avoid flashes in skins that don't use it (T111821)
		$sk->getOutput()->setupOOUI( strtolower( $sk->getSkinName() ), $sk->getOutput()->getLanguage()->getDir() );
		$oouiImageClass = get_class( OOUI\Theme::singleton() ) === 'OOUI\\MediaWikiTheme'
			? 'oo-ui-image-invert'
			: '';

		$msgLinkClasses = array( "mw-echo-notifications-badge mw-echo-notification-badge-nojs $oouiImageClass oo-ui-iconElement oo-ui-iconElement-icon oo-ui-icon-speechBubbles" );
		$alertLinkClasses = array( "mw-echo-notifications-badge mw-echo-notification-badge-nojs $oouiImageClass oo-ui-iconElement oo-ui-iconElement-icon" );

		$hasUnseen = false;
		if (
			$msgCount != 0 && // no unread notifications
			$msgNotificationTimestamp !== false && // should already always be false if count === 0
			( $seenMsgTime === null || $seenMsgTime < $msgNotificationTimestamp->getTimestamp( TS_MW ) ) // there are no unseen notifications
		) {
			$msgLinkClasses[] = 'mw-echo-unseen-notifications';
			$hasUnseen = true;
		}

		$alertIcon = "bell";
		if (
			$alertCount != 0 && // no unread notifications
			$alertNotificationTimestamp !== false && // should already always be false if count === 0
			( $seenAlertTime === null || $seenAlertTime < $alertNotificationTimestamp->getTimestamp( TS_MW ) ) // all notifications have already been seen
		) {
			$alertLinkClasses[] = 'mw-echo-unseen-notifications';
			$alertIcon = "bellOn";
			$hasUnseen = true;
		}
		$alertLinkClasses[] = 'oo-ui-icon-' . $alertIcon;

		$alertLink = array(
			'href' => $url,
			'text' => $alertText,
			'active' => ( $url == $title->getLocalUrl() ),
			'class' => $alertLinkClasses,
		);

		$insertUrls = array(
			'notifications-alert' => $alertLink,
		);

		$msgLink = array(
			'href' => $url,
			'text' => $msgText,
			'active' => ( $url == $title->getLocalUrl() ),
			'class' => $msgLinkClasses,
		);

		$insertUrls['notifications-message'] = $msgLink;

		$personal_urls = wfArrayInsertAfter( $personal_urls, $insertUrls, 'userpage' );

		if ( $hasUnseen ) {
			// Record that the user is going to see an indicator that they have unread notifications
			RequestContext::getMain()->getStats()->increment( 'echo.unseen' );
		}

		// If the user has new messages, display a talk page alert
		// We need to check:
		// * Orange alert is enabled in configuration
		// * Enabled in user preferences
		// * User actually has new messages
		// * User is not viewing their user talk page, as user_newtalk
		//   will not have been cleared yet. (bug T107655).
		if ( $wgEchoNewMsgAlert && $user->getOption( 'echo-show-alert' )
			&& $user->getNewtalk() && !$user->getTalkPage()->equals( $title )
		) {
			$personal_urls['mytalk']['text'] = $sk->msg( 'echo-new-messages' )->text();
			$personal_urls['mytalk']['class'] = array( 'mw-echo-alert' );
			$sk->getOutput()->addModuleStyles( 'ext.echo.styles.alert' );
		}

		return true;
	}

	/**
	 * Handler for AbortTalkPageEmailNotification hook.
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/AbortTalkPageEmailNotification
	 * @param $targetUser User
	 * @param $title Title
	 * @return bool
	 */
	static function onAbortTalkPageEmailNotification( $targetUser, $title ) {
		global $wgEchoNotifications;

		// Send legacy talk page email notification if
		// 1. echo is disabled for them or
		// 2. echo talk page notification is disabled
		if ( !isset( $wgEchoNotifications['edit-user-talk'] ) ) {
			// Legacy talk page email notification
			return true;
		}

		// Echo talk page email notification
		return false;
	}

	/**
	 * Handler for AbortWatchlistEmailNotification hook.
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/AbortWatchlistEmailNotification
	 * @param $targetUser User
	 * @param $title Title
	 * @param $emailNotification EmailNotification The email notification object that sends non-echo notifications
	 * @return bool
	 */
	static function onSendWatchlistEmailNotification( $targetUser, $title, $emailNotification ) {
		// If a user is watching his/her own talk page, do not send talk page watchlist
		// email notification if the user is receiving Echo talk page notification
		if ( $title->isTalkPage() && $targetUser->getTalkPage()->equals( $title ) ) {
			$attributeManager = EchoAttributeManager::newFromGlobalVars();
			$events = $attributeManager->getUserEnabledEvents( $targetUser, 'email' );
			if ( in_array( 'edit-user-talk', $events ) ) {
				// Do not send watchlist email notification, the user will receive an Echo notification
				return false;
			}
		}

		// Proceed to send watchlist email notification
		return true;
	}

	/**
	 * Handler for MakeGlobalVariablesScript hook.
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/MakeGlobalVariablesScript
	 * @param &$vars array Variables to be added into the output
	 * @param $outputPage OutputPage instance calling the hook
	 * @return bool true in all cases
	 */
	public static function makeGlobalVariablesScript( &$vars, OutputPage $outputPage ) {
		global $wgEchoConfig;
		$user = $outputPage->getUser();

		// Provide info for the Overlay

		if ( $user->isLoggedIn() ) {
			$vars['wgEchoConfig'] = $wgEchoConfig;
		} elseif (
			$outputPage->getTitle()->equals( SpecialPage::getTitleFor( 'JavaScriptTest', 'qunit' ) ) ||
			// Also if running from /plain or /export
			$outputPage->getTitle()->isSubpageOf( SpecialPage::getTitleFor( 'JavaScriptTest', 'qunit' ) )
		) {
			// For testing purposes
			$vars['wgEchoConfig'] = array(
				'eventlogging' => array(
					'EchoInteraction' => array(),
				),
			);
		}

		return true;
	}

	/**
	 * Handler for UnitTestsList hook.
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/UnitTestsList
	 * @param &$files Array of unit test files
	 * @return bool true in all cases
	 */
	static function getUnitTests( &$files ) {
		// @codeCoverageIgnoreStart
		$directoryIterator = new RecursiveDirectoryIterator( __DIR__ . '/tests/phpunit/' );

		/**
		 * @var SplFileInfo $fileInfo
		 */
		$ourFiles = array();
		foreach ( new RecursiveIteratorIterator( $directoryIterator ) as $fileInfo ) {
			if ( substr( $fileInfo->getFilename(), -8 ) === 'Test.php' ) {
				$ourFiles[] = $fileInfo->getPathname();
			}
		}

		$files = array_merge( $files, $ourFiles );

		return true;
		// @codeCoverageIgnoreEnd
	}

	/**
	 * Handler for GetNewMessagesAlert hook.
	 * We're using the GetNewMessagesAlert hook instead of the
	 * ArticleEditUpdateNewTalk hook since we still want the user_newtalk data
	 * to be updated and availble to client-side tools and the API.
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/GetNewMessagesAlert
	 * @param &$newMessagesAlert String An alert that the user has new messages
	 *     or an empty string if the user does not (empty by default)
	 * @param $newtalks Array This will be empty if the user has no new messages
	 *     or an Array containing links and revisions if there are new messages
	 * @param $user User The user who is loading the page
	 * @param $out Output object
	 * @return bool Should return false to prevent the new messages alert (OBOD)
	 *     or true to allow the new messages alert
	 */
	static function abortNewMessagesAlert( &$newMessagesAlert, $newtalks, $user, $out ) {
		global $wgEchoNotifications;

		// If the user has the notifications flyout turned on and is receiving
		// notifications for talk page messages, disable the new messages alert.
		if ( $user->isLoggedIn()
			&& isset( $wgEchoNotifications['edit-user-talk'] )
		) {
			// hide new messages alert
			return false;
		} else {
			// show new messages alert
			return true;
		}
	}

	/**
	 * Handler for ArticleRollbackComplete hook.
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/ArticleRollbackComplete
	 * @param $page WikiPage The article that was edited
	 * @param $agent User The user who did the rollback
	 * @param $newRevision Revision The revision the page was reverted back to
	 * @param $oldRevision Revision The revision of the top edit that was reverted
	 * @return bool true in all cases
	 */
	static function onRollbackComplete( $page, $agent, $newRevision, $oldRevision ) {
		$victimId = $oldRevision->getUser();

		if (
			$victimId && // No notifications for anonymous users
			!$oldRevision->getContent()->equals( $newRevision->getContent() ) // No notifications for null rollbacks
		) {
			EchoEvent::create( array(
				'type' => 'reverted',
				'title' => $page->getTitle(),
				'extra' => array(
					'revid' => $page->getRevision()->getId(),
					'reverted-user-id' => $victimId,
					'reverted-revision-id' => $oldRevision->getId(),
					'method' => 'rollback',
				),
				'agent' => $agent,
			) );
		}

		return true;
	}

	/**
	 * Handler for UserSaveSettings hook.
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/UserSaveSettings
	 * @param $user User whose settings were saved
	 * @return bool true in all cases
	 */
	static function onUserSaveSettings( $user ) {
		// Extensions like AbuseFilter might create an account, but
		// the tables we need might not exist. Bug 57335
		if ( !defined( 'MW_UPDATER' ) ) {
			// Reset the notification count since it may have changed due to user
			// option changes. This covers both explicit changes in the preferences
			// and changes made through the options API (since both call this hook).
			MWEchoNotifUser::newFromUser( $user )->resetNotificationCount();
		}

		return true;
	}

	/**
	 * Handler for UserLoadOptions hook.
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/UserLoadOptions
	 * @param $user User whose options were loaded
	 * @param $options Options can be modified
	 * @return bool true in all cases
	 */
	public static function onUserLoadOptions( $user, &$options ) {
		// Use existing enotifusertalkpages option for echo-subscriptions-email-edit-user-talk
		if ( isset( $options['enotifusertalkpages'] ) ) {
			$options['echo-subscriptions-email-edit-user-talk'] = $options['enotifusertalkpages'];
		}

		return true;
	}

	/**
	 * Handler for UserSaveOptions hook.
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/UserSaveOptions
	 * @param $user User whose options are being saved
	 * @param $options Options can be modified
	 * @return bool true in all cases
	 */
	public static function onUserSaveOptions( $user, &$options ) {
		// echo-subscriptions-email-edit-user-talk is just a virtual option,
		// save the value in the real option enotifusertalkpages
		if ( isset( $options['echo-subscriptions-email-edit-user-talk'] ) ) {
			$options['enotifusertalkpages'] = $options['echo-subscriptions-email-edit-user-talk'];
			unset( $options['echo-subscriptions-email-edit-user-talk'] );
		}

		return true;
	}

	/**
	 * Handler for UserClearNewTalkNotification hook.
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/UserClearNewTalkNotification
	 * @param $user User whose talk page notification should be marked as read
	 * @return bool true in all cases
	 */
	public static function onUserClearNewTalkNotification( User $user ) {
		if ( !$user->isAnon() ) {
			DeferredUpdates::addCallableUpdate( function () use ( $user ) {
				MWEchoNotifUser::newFromUser( $user )->clearTalkNotification();
			} );
		}

		return true;
	}

	/**
	 * Handler for ParserTestTables hook, makes sure that Echo's tables are present during tests
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/UserClearNewTalkNotification
	 * @param array $tables List of DB tables to be used for parser tests
	 * @return bool true in all cases
	 */
	public static function onParserTestTables( &$tables ) {
		$tables[] = 'echo_event';
		$tables[] = 'echo_notification';
		$tables[] = 'echo_email_batch';

		return true;
	}

	/**
	 * Handler for EmailUserComplete hook.
	 * @see https://www.mediawiki.org/wiki/Manual:Hooks/EmailUserComplete
	 * @param $address MailAddress Adress of receiving user
	 * @param $from MailAddress Adress of sending user
	 * @param $subject string Subject of the mail
	 * @param $text string Text of the mail
	 * @return bool true in all cases
	 */
	public static function onEmailUserComplete( $address, $from, $subject, $text ) {
		global $wgContLang;

		if ( $from->name === $address->name ) {
			// nothing to notify
			return true;
		}
		$userTo = User::newFromName( $address->name );
		$userFrom = User::newFromName( $from->name );

		$autoSubject = wfMessage( 'defemailsubject', $from->name )->inContentLanguage()->text();
		if ( $subject === $autoSubject ) {
			$autoFooter = "\n\n-- \n" . wfMessage( 'emailuserfooter', $from->name, $address->name )->inContentLanguage()->text();
			$textWithoutFooter = preg_replace( '/' . preg_quote( $autoFooter, '/' ) . '$/', '', $text );
			$preview = $wgContLang->truncate( $textWithoutFooter, 125 );
		} else {
			$preview = $subject;
		}

		EchoEvent::create( array(
			'type' => 'emailuser',
			'extra' => array(
				'to-user-id' => $userTo->getId(),
				'preview' => $preview,
			),
			'agent' => $userFrom,
		) );

		return true;
	}

	/**
	 * For integration with the UserMerge extension.
	 *
	 * @param array $updateFields
	 * @return bool
	 */
	public static function onUserMergeAccountFields( &$updateFields ) {
		// array( tableName, idField, textField )
		$dbw = MWEchoDbFactory::newFromDefault()->getEchoDb( DB_MASTER );
		$updateFields[] = array( 'echo_event', 'event_agent_id', 'db' => $dbw );
		$updateFields[] = array( 'echo_notification', 'notification_user', 'db' => $dbw, 'options' => array( 'IGNORE' ) );
		$updateFields[] = array( 'echo_email_batch', 'eeb_user_id', 'db' => $dbw, 'options' => array( 'IGNORE' ) );
		$updateFields[] = array( 'echo_target_page', 'etp_user', 'db' => $dbw, 'options' => array( 'IGNORE' ) );

		return true;
	}

	public static function onMergeAccountFromTo( User &$oldUser, User &$newUser ) {
		MWEchoNotifUser::newFromUser( $oldUser )->resetNotificationCount( DB_MASTER );

		if ( !$newUser->isAnon() ) {
			MWEchoNotifUser::newFromUser( $newUser )->resetNotificationCount( DB_MASTER );
		}

		return true;
	}

	public static function onUserMergeAccountDeleteTables( &$tables ) {
		$dbw = MWEchoDbFactory::newFromDefault()->getEchoDb( DB_MASTER );
		$tables['echo_notification'] = array( 'notification_user', 'db' => $dbw );
		$tables['echo_email_batch'] = array( 'eeb_user_id', 'db' => $dbw );
		$tables['echo_target_page'] = array( 'etp_user', 'db' => $dbw );

		return true;
	}

	// Sets custom login message for redirect from notification page
	public static function onLoginFormValidErrorMessages( &$messages ) {
		$messages[] = 'echo-notification-loginrequired';
		return true;
	}

	public static function onResourceLoaderGetConfigVars( &$vars ) {
	global $wgEchoShowFooterNotice, $wgEchoFooterNoticeURL;

		$vars['wgEchoMaxNotificationCount'] = MWEchoNotifUser::MAX_BADGE_COUNT;
		$vars['wgEchoShowFooterNotice'] = $wgEchoShowFooterNotice;
		$vars['wgEchoFooterNoticeURL'] = $wgEchoFooterNoticeURL;

		return true;
	}

}
