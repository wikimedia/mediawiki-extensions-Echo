<?php

class EchoHooks {
	const EMAIL_NEVER = -1; // Never send email notifications
	const EMAIL_IMMEDIATELY = 0; // Send email notificaitons immediately as they come in
	const EMAIL_DAILY_DIGEST = 1; // Send daily email digests
	const EMAIL_WEEKLY_DIGEST = 7; // Send weekly email digests

	/**
	 * Initialize Echo extension with necessary data, this function is invoked
	 * from $wgExtensionFunctions
	 */
	public static function initEchoExtension() {
		global $wgEchoBackend, $wgEchoBackendName, $wgEchoNotifications,
			$wgEchoNotificationCategories, $wgEchoNotificationIcons, $wgEchoConfig;

		// allow extensions to define their own event
		wfRunHooks( 'BeforeCreateEchoEvent', array( &$wgEchoNotifications, &$wgEchoNotificationCategories, &$wgEchoNotificationIcons ) );

		$wgEchoBackend = MWEchoBackend::factory( $wgEchoBackendName );

		// turn schema off if eventLogging is not enabled
		if ( !function_exists( 'efLogServerSideEvent' ) ) {
			foreach ( $wgEchoConfig['eventlogging'] as $schema => $property ) {
				if ( $property['enabled'] ) {
					$wgEchoConfig['eventlogging'][$schema]['enabled'] = false;
				}
			}
		}
	}

	/**
	 * Handler for ResourceLoaderRegisterModules hook
	 */
	public static function onResourceLoaderRegisterModules( ResourceLoader &$resourceLoader ) {
		global $wgResourceModules, $wgEchoConfig;

		foreach ( $wgEchoConfig['eventlogging'] as $schema => $property ) {
			if ( $property['enabled'] ) {
				$wgResourceModules[ 'schema.' . $schema ] = array(
					'class'  => 'ResourceLoaderSchemaModule',
					'schema' => $schema,
					'revision' => $property['revision'],
				);
				$wgResourceModules['ext.echo.base']['dependencies'][] = 'schema.' . $schema;
			}
		}

		return true;
	}

	/**
	 * Attempt to log the event
	 * @param $schema string
	 * @param $data array
	 */
	public static function logEvent( $schema, $data ) {
		global $wgEchoConfig;

		if ( !empty( $wgEchoConfig['eventlogging'][$schema]['enabled'] ) ) {
			efLogServerSideEvent( $schema, $wgEchoConfig['eventlogging'][$schema]['revision'], $data );
		}
	}

	/**
	 * @param $updater DatabaseUpdater object
	 * @return bool true in all cases
	 */
	public static function getSchemaUpdates( $updater ) {
		$dir = __DIR__;
		$baseSQLFile = "$dir/echo.sql";
		$updater->addExtensionTable( 'echo_event', $baseSQLFile );
		$updater->addExtensionTable( 'echo_email_batch', "$dir/db_patches/echo_email_batch.sql" );

		$updater->modifyExtensionField( 'echo_event', 'event_agent', "$dir/db_patches/patch-event_agent-split.sql" );
		$updater->modifyExtensionField( 'echo_event', 'event_variant', "$dir/db_patches/patch-event_variant_nullability.sql" );
		$updater->modifyExtensionField( 'echo_event', 'event_extra', "$dir/db_patches/patch-event_extra-size.sql" );
		$updater->modifyExtensionField( 'echo_event', 'event_agent_ip', "$dir/db_patches/patch-event_agent_ip-size.sql" );

		$updater->addExtensionField( 'echo_notification', 'notification_bundle_base',
			"$dir/db_patches/patch-notification-bundling-field.sql" );
		$updater->addExtensionIndex( 'echo_event', 'event_type', "$dir/db_patches/patch-alter-type_page-index.sql" );
		$updater->dropTable( 'echo_subscription' );
		$updater->dropExtensionField( 'echo_event', 'event_timestamp', "$dir/db_patches/patch-drop-echo_event-event_timestamp.sql" );
		$updater->addExtensionField( 'echo_email_batch', 'eeb_event_hash',
			"$dir/db_patches/patch-email_batch-new-field.sql" );
		return true;
	}

	/**
	 * Handler for EchoGetBundleRule hook, which defines the bundle rule for each notification
	 * @param $event EchoEvent
	 * @param $bundleString string Determines how the notification should be bundled, for example,
	 * talk page notification is bundled based on namespace and title, the bundle string would be
	 * 'edit-user-talk-' + namespace + title, email digest/email bundling would use this hash as
	 * a key to identify bundle-able event.  For web bundling, we bundle further based on user's
	 * visit to the overlay, we would generate a display hash based on the hash of $bundleString
	 *
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
	 * Handler for EchoGetDefaultNotifiedUsers hook.
	 * @param $event EchoEvent to get implicitly subscribed users for
	 * @param &$users Array to append implicitly subscribed users to.
	 * @return bool true in all cases
	 */
	public static function getDefaultNotifiedUsers( $event, &$users ) {
		switch ( $event->getType() ) {
			// Everyone deserves to know when something happens
			// on their user talk page
			case 'edit-user-talk':
				if ( !$event->getTitle() || !$event->getTitle()->getNamespace() == NS_USER_TALK ) {
					break;
				}

				$username = $event->getTitle()->getText();
				$user = User::newFromName( $username );
				if ( $user && $user->getId() ) {
					$users[$user->getId()] = $user;
				}
				break;
			case 'add-comment':
			case 'add-talkpage-topic':
				// Handled by EchoDiscussionParser
				$extraData = $event->getExtra();

				if ( !isset( $extraData['revid'] ) || !$extraData['revid'] ) {
					break;
				}

				$revision = Revision::newFromId( $extraData['revid'] );
				if ( $revision ) {
					$users += EchoDiscussionParser::getNotifiedUsersForComment( $revision );
				}
				break;
			case 'welcome':
				$users[$event->getAgent()->getId()] = $event->getAgent();
				break;
			case 'reverted':
				$extra = $event->getExtra();

				if ( !$extra || !isset( $extra['reverted-user-id'] ) ) {
					break;
				}
				$victimID = $extra['reverted-user-id'];
				$victim = User::newFromId( $victimID );
				$users[$victim->getId()] = $victim;
				break;
			case 'page-linked':
				$agent = $event->getAgent();
				$title = $event->getTitle();

				if ( !$title || $title->getArticleID() <= 0 || !$agent ) {
					break;
				}

				$dbr = wfGetDB( DB_SLAVE );

				$res = $dbr->selectRow(
					array( 'revision' ),
					array( 'rev_user' ),
					array( 'rev_page' => $title->getArticleID() ),
					__METHOD__,
					array( 'LIMIT' => 1, 'ORDER BY' => 'rev_timestamp, rev_id' )
				);
				// No notification if agents link their own articles
				if ( $res && $res->rev_user && $agent->getID() != $res->rev_user ) {
					// Map each linked page to a corresponding author
					$user = User::newFromId( $res->rev_user );
					if ( $user ) {
						$users[$user->getID()] = $user;
					}
				}
				break;
			case 'mention':
				$extraData = $event->getExtra();
				foreach ( $extraData['mentioned-users'] as $userId ) {
					//backward compatibility
					if ( $userId instanceof User ) {
						$users[$userId->getID()] = $userId;
					} else {
						$users[$userId] = User::newFromId( $userId );
					}
				}
				break;
			case 'user-rights':
				$extraData = $event->getExtra();
				$users[$extraData['user']] = User::newFromId( $extraData['user'] );
				break;
		}

		return true;
	}

	/**
	 * Handler for EchoGetNotificationTypes hook, Adjust the notify types (e.g. web, email) which
	 * are applicable to this event and user based on various user options. In other words, allow
	 * certain non-echo user options to override the echo notification options.
	 * @param $user User
	 * @param $event EchoEvent
	 * @param $notifyTypes
	 * @return bool
	 */
	public static function getNotificationTypes( $user, $event, &$notifyTypes ) {
		$type = $event->getType();
		if ( !$user->getOption( 'enotifminoredits' ) ) {
			$extra = $event->getExtra();
			if ( !empty( $extra['revid'] ) ) {
				$rev = Revision::newFromID( $extra['revid'] );

				if ( $rev->isMinor() ) {
					$notifyTypes = array_diff( $notifyTypes, array( 'email' ) );
				}
			}
		}
		return true;
	}

	/**
	 * Handler for GetPreferences hook.
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/GetPreferences
	 * @param $user User to get preferences for
	 * @param &$preferences Preferences array
	 * @return bool true in all cases
	 */
	public static function getPreferences( $user, &$preferences ) {
		global $wgEchoDefaultNotificationTypes, $wgAuth, $wgEchoEnableEmailBatch,
			$wgEchoNotifiers, $wgEchoNotificationCategories, $wgEchoNotifications,
			$wgEchoHelpPage;

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

		// Sort notification categories by priority
		$categoriesAndPriorities = array();
		foreach ( $wgEchoNotificationCategories as $category => $categoryData ) {
			// See if the category is not dismissable at all. Must do strict
			// comparison to true since no-dismiss can also be an array
			if ( isset( $categoryData['no-dismiss'] ) && in_array( 'all' , $categoryData['no-dismiss'] ) ) {
				continue;
			}
			// See if user is eligible to recieve this notification (per user group restrictions)
			if ( EchoNotificationController::getCategoryEligibility( $user, $category ) ) {
				$categoriesAndPriorities[$category] = EchoNotificationController::getCategoryPriority( $category );
			}
		}
		asort( $categoriesAndPriorities );
		$validSortedCategories = array_keys( $categoriesAndPriorities );

		// Show subscription options

		// Build the columns (output formats)
		$columns = array();
		foreach ( $wgEchoNotifiers as $notifierType => $notifierData ) {
			$formatMessage = wfMessage( 'echo-pref-' . $notifierType )->escaped();
			$columns[$formatMessage] = $notifierType;
		}

		// Build the rows (notification categories)
		$rows = array();
		foreach ( $validSortedCategories as $category ) {
			$categoryMessage = wfMessage( 'echo-category-title-' . $category )->numParams( 1 )->escaped();
			$rows[$categoryMessage] = $category;
		}

		// Figure out the individual exceptions in the matrix and make them disabled
		$removeOptions = array();
		foreach ( $wgEchoNotifiers as $notifierType => $notifierData ) {
			foreach ( $validSortedCategories as $category ) {
				// See if this output format is non-dismissable
				if ( isset( $wgEchoNotificationCategories[$category]['no-dismiss'] )
					&& in_array( $notifierType, $wgEchoNotificationCategories[$category]['no-dismiss'] ) )
				{
					$removeOptions[] = "$notifierType-$category";
				}

				// Make sure this output format is possible for this notification category
				if ( isset( $wgEchoDefaultNotificationTypes[$category] ) ) {
					if ( !$wgEchoDefaultNotificationTypes[$category][$notifierType] ) {
						$removeOptions[] = "$notifierType-$category";
					}
				} elseif ( !$wgEchoDefaultNotificationTypes['all'][$notifierType] ) {
					$removeOptions[] = "$notifierType-$category";
				}
			}
		}

		$preferences['echo-subscriptions'] = array(
			'class' => 'HTMLCheckMatrix',
			'section' => 'echo/echosubscriptions',
			'rows' => $rows,
			'columns' => $columns,
			'remove-options' => $removeOptions,
			'help' => Html::rawElement(
				'a',
				array( 'href' => $wgEchoHelpPage ),
				wfMessage( 'echo-learn-more' )->escaped()
			),
		);

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

		// Show fly-out display prefs
		// Per bug 47562, we're going to hide this pref for now until we see
		// what the community reaction to Echo is on en.wiki.
		$preferences['echo-notify-show-link'] = array(
			'type' => 'hidden',
			'label-message' => 'echo-pref-notify-show-link',
			//'section' => 'echo/displaynotifications',
		);
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
		if ( $revision ) {
			$title = $article->getTitle();
			// If the edit is to a talk page or a project page, send it to the
			// discussion parser.
			if ( $title->isTalkPage() || $title->inNamespace( NS_PROJECT ) ) {
				EchoDiscussionParser::generateEventsForRevision( $revision );
			}

			// Handle the case of someone undoing an edit, either through the
			// 'undo' link in the article history or via the API.
			if ( isset( $wgEchoNotifications['reverted'] ) ) {
				$undidRevId = $wgRequest->getVal( 'wpUndidRevision' );
				if ( $undidRevId ) {
					$undidRevision = Revision::newFromId( $undidRevId );
					if ( $undidRevision ) {
						$victimId = $undidRevision->getUser();
						if ( $victimId ) { // No notifications for anonymous users
							EchoEvent::create( array(
								'type' => 'reverted',
								'title' => $article->getTitle(),
								'extra' => array(
									'revid' => $revision->getId(),
									'reverted-user-id' => $victimId,
									'reverted-revision-id' => $undidRevId,
									'method' => 'undo',
								),
								'agent' => $user,
							) );
						}
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
		) );

		return true;
	}

	/**
	 * Handler for UserRights hook.
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/UserRights
	 * @param $user User User object that was changed
	 * @param $add array Array of strings corresponding to groups added
	 * @param $remove array Array of strings corresponding to groups removed
	 */
	public static function onUserRights( &$user, $add, $remove ) {
		global $wgUser;

		if ( !$user->isAnon() && $wgUser->getId() != $user->getId() && ( $add || $remove ) ) {
			EchoEvent::create(
				array(
					'type' => 'user-rights',
					'title' => Title::newMainPage(),
					'extra' => array(
						'user' => $user->getID(),
						'add' => $add,
						'remove' => $remove
					),
					'agent' => $wgUser,
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
		global $wgRequest, $wgUser;

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
			|| !$linksUpdate->mRecursive || $linksUpdate->mTitle->isRedirect() )
		{
			return true;
		}

		global $wgUser;

		// link notification is boundless as you can include infinite number of links in a page
		// db insert is expensive, limit it to a reasonable amount, we can increase this limit
		// once the storage is on Redis
		$max = 10;
		// Only create notifications for links to content namespace pages
		// @Todo - use one big insert instead of individual insert inside foreach loop
		foreach ( $insertions as $key => $page ) {
			if ( MWNamespace::isContent( $page['pl_namespace'] ) ) {
				$title = Title::makeTitle( $page['pl_namespace'], $page['pl_title'] );
				EchoEvent::create( array(
					'type' => 'page-linked',
					'title' => $title,
					'agent' => $wgUser,
					'extra' => array(
						'link-from-namespace' => $linksUpdate->mTitle->getNamespace(),
						'link-from-title' => $linksUpdate->mTitle->getDBkey(),
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
		$user = $out->getUser();
		if ( $user->isLoggedIn() && $user->getOption( 'echo-notify-show-link' ) ) {
			// Load the module for the Notifications flyout
			$out->addModules( array( 'ext.echo.overlay' ) );
		}
		return true;
	}

	/**
	 * Handler for PersonalUrls hook.
	 * Add a "Notifications" item to the user toolbar ('personal URLs').
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/PersonalUrls
	 * @param &$personal_urls Array of URLs to append to.
	 * @param &$title Title of page being visited.
	 * @return bool true in all cases
	 */
	static function onPersonalUrls( &$personal_urls, &$title ) {
		global $wgUser, $wgEchoShowFullNotificationsLink;
		// Add a "My notifications" item to personal URLs
		if ( $wgUser->isAnon() || !$wgUser->getOption( 'echo-notify-show-link' ) ) {
			return true;
		}

		$notificationCount = EchoNotificationController::getNotificationCount( $wgUser );
		if ( $wgEchoShowFullNotificationsLink ) {
			// Add a "Notifications" item to personal URLs
			$msg = wfMessage( $notificationCount == 0 ? 'echo-link' : 'echo-link-new' );
			$text = $msg->params( EchoNotificationController::formatNotificationCount( $notificationCount ) )->text();
		} else {
			// Just add a number
			$text = wfMessage( 'parentheses', EchoNotificationController::formatNotificationCount( $notificationCount ) )->plain();
		}
		$url = SpecialPage::getTitleFor( 'Notifications' )->getLocalURL();

		$notificationsLink = array(
			'href' => $url,
			'text' => $text,
			'active' => ( $url == $title->getLocalUrl() ),
		);

		$insertUrls = array( 'notifications' => $notificationsLink );
		if ( $wgEchoShowFullNotificationsLink ) {
			$personal_urls = wfArrayInsertAfter( $personal_urls, $insertUrls, 'mytalk' );
		} else {
			$personal_urls = wfArrayInsertAfter( $personal_urls, $insertUrls, 'userpage' );
		}
		return true;
	}

	/**
	 * Handler for AbortEmailNotification and UpdateUserMailerFormattedPageStatus hook.
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/AbortEmailNotification
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/UpdateUserMailerFormattedPageStatus
	 * @return bool true in all cases
	 */
	static function disableStandUserTalkEnotif() {
		global $wgEchoNotifications, $wgEnotifUserTalk;
		if ( isset( $wgEchoNotifications['edit-user-talk'] ) ) {
			// Disable the standard email notification for talk page messages
			$wgEnotifUserTalk = false;
		}
		// Don't abort watchlist email notifications
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
		global $wgEchoShowFullNotificationsLink, $wgEchoHelpPage, $wgEchoMaxNotificationCount;
		$user = $outputPage->getUser();

		// Provide info for the Overlay

		$timestamp = new MWTimestamp( wfTimestampNow() );
		if ( ! $user->isAnon() ) {
			$vars['wgEchoOverlayConfiguration'] = array(
				'notifications-link-full' => $wgEchoShowFullNotificationsLink,
				'timestamp' => $timestamp->getTimestamp( TS_UNIX ),
				'notification-count' => EchoNotificationController::getFormattedNotificationCount( $user ),
				'max-notification-count' => $wgEchoMaxNotificationCount,
			);
			$vars['wgEchoHelpPage'] = $wgEchoHelpPage;
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
		$dir = dirname( __FILE__ ) . '/tests';
		$files[] = "$dir/DiscussionParserTest.php";
		return true;
	}

	/**
	 * Handler for ArticleEditUpdateNewTalk hook.
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/ArticleEditUpdateNewTalk
	 * @param &$page WikiPage The WikiPage object of the talk page being updated
	 * @param $recipient User The user who's talk page was edited
	 * @return bool Should return false to prevent the orange notification bar
	 *     or true to allow the orange notification bar
	 */
	static function abortNewTalkNotification( &$page, $recipient ) {
		global $wgEchoNotifications;
		// If the user has the notifications flyout turned on and is receiving
		// notifications for talk page messages, disable the orange-bar-style notice.
		if ( $recipient->isLoggedIn()
			&& $recipient->getOption( 'echo-notify-show-link' )
			&& isset( $wgEchoNotifications['edit-user-talk'] )
		) {
			// hide orange bar
			return false;
		} else {
			// show orange bar
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

		if ( $victimId ) { // No notifications for anonymous users
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
		// Reset the notification count since it may have changed due to user
		// option changes. This covers both explicit changes in the preferences
		// and changes made through the options API (since both call this hook).
		EchoNotificationController::resetNotificationCount( $user );
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
		// If the user had opted out of the old version of talk page notification emails
		// but we have not migrated a new style preference for the same preference
		// then fake a new style one too
		// Only check while we are migrating
		global $wgRecentEchoInstall;
		if ( $wgRecentEchoInstall ) {
			if ( isset( $options['enotifusertalkpages'] ) &&
				!$options['enotifusertalkpages']
			) {
				$options['echo-subscriptions-email-edit-user-talk'] = false;
			}
		}
		// note not calling saveSettings()
		// so will not change on disk until user saves for some other reason
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
		global $wgRecentEchoInstall;
		if ( $wgRecentEchoInstall ) {
			// Both echo-subscriptions-email-edit-user-talk and enotifusertalkpages
			// default to true.
			if ( isset( $options['echo-subscriptions-email-edit-user-talk'] ) &&
				!$options['echo-subscriptions-email-edit-user-talk']
			) {
				$options['enotifusertalkpages'] = false;
			} else {
				$options['enotifusertalkpages'] = true;
			}
		}
		return true;
	}
}
