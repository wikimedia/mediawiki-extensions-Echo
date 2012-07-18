<?php

class EchoHooks {

	/**
	 * @param $updater DatabaseUpdater object
	 * @return bool true in all cases
	 */
	public static function getSchemaUpdates( $updater ) {
		$dir = __DIR__;
		$baseSQLFile = "$dir/echo.sql";
		$updater->addExtensionTable( 'echo_subscription', $baseSQLFile );
		$updater->addExtensionTable( 'echo_event', $baseSQLFile );
		$updater->addExtensionTable( 'echo_notification', $baseSQLFile );

		$updater->modifyField( 'echo_event', 'event_agent',
			"$dir/db_patches/patch-event_agent-split.sql", true );
		$updater->modifyField( 'echo_event', 'event_variant',
			"$dir/db_patches/patch-event_variant_nullability.sql", true );
		$updater->modifyField( 'echo_event', 'event_extra',
			"$dir/db_patches/patch-event_extra-size.sql", true );
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
			//  on their user talk page
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

				$users = array_merge(
					$users,
					EchoDiscussionParser::getNotifiedUsersForComment( $revision )
				);
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
		}

		return true;
	}

	public static function getNotificationTypes( $subscription, $event, &$notifyTypes ) {
		$type = $event->getType();
		$user = $subscription->getUser();

		// Figure out when to disallow email notifications
		if ( $type == 'edit' ) {
			if ( !$user->getOption( 'enotifwatchlistpages' ) ) {
				$notifyTypes = array_diff( $notifyTypes, array( 'email' ) );
			}
		} elseif ( $type == 'edit-user-talk' ) {
			if ( !$user->getOption( 'enotifusertalkpages' ) ) {
				$notifyTypes = array_diff( $notifyTypes, array( 'email' ) );
			}
		}

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
		global $wgEchoEnabledEvents;
		if ( $wgEchoEnabledEvents !== false && !in_array( 'edit', $wgEchoEnabledEvents ) ) {
			return true;
		}

		$preferences['echo-notify-watchlist'] = array(
			'type' => 'toggle',
			'label-message' => 'echo-pref-notify-watchlist',
			'section' => 'echo',
		);
		return true;
	}

	/**
	 * Handler for WatchArticleComplete hook
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/WatchArticleComplete
	 * @param $user User who watched the Article
	 * @param $article Article that was watched.
	 * @return bool true in all cases
	 */
	public static function onWatch( $user, $article ) {
		global $wgEchoEnabledEvents;
		if ( $wgEchoEnabledEvents !== false && !in_array( 'edit', $wgEchoEnabledEvents ) ) {
			return true;
		}

		if ( !$user->getOption( 'echo-notify-watchlist' ) ) {
			return true;
		}

		$subscription = new EchoSubscription( $user, 'edit', $article->getTitle() );
		$subscription->enableNotification( 'notify' );
		$subscription->save();
		return true;
	}

	/**
	 * Handler for UnwatchArticleComplete hook
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/UnwatchArticleComplete
	 * @param $user User who unwatched the Article
	 * @param $article Article that was unwatched.
	 * @return bool true in all cases
	 */
	public static function onUnwatch( $user, $article ) {
		global $wgEchoEnabledEvents;
		if ( $wgEchoEnabledEvents !== false && !in_array( 'edit', $wgEchoEnabledEvents ) ) {
			return true;
		}

		$subscription = new EchoSubscription( $user, 'edit', $article->getTitle() );
		$subscription->disableNotification( 'notify' );
		$subscription->save();
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
		if ( $revision ) {
			EchoEvent::create( array(
				'type' => 'edit',
				'title' => $article->getTitle(),
				'extra' => array( 'revid' => $revision->getID() ),
				'agent' => $user,
			) );

			if ( $article->getTitle()->isTalkPage() ) {
				EchoDiscussionParser::generateEventsForRevision( $revision );
			}

			// Handle the case of someone undoing an edit, either through the
			// 'undo' link in the article history or via the API.
			global $wgRequest;
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
		EchoEvent::create( array(
			'type' => 'welcome',
			'agent' => $user,
		) );

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
		global $wgUser;
		if ( !$wgUser->isAnon() ) {
			$out->addModules( array( 'ext.echo.overlay' ) );
		}
		return true;
	}

	/**
	 * Handler for PersonalUrls hook.
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/PersonalUrls
	 * @param &$personal_urls Array of URLs to append to.
	 * @param &$title Title of page being visited.
	 * @return bool true in all cases
	 */
	static function onPersonalUrls( &$personal_urls, &$title ) {
		global $wgUser, $wgLang;
		// Add a "My notifications" item to personal URLs

		if ( $wgUser->isAnon() ) {
			return true;
		}

		$notificationCount = EchoNotificationController::getNotificationCount( $wgUser );

		$msg = wfMessage( $notificationCount == 0 ? 'echo-link' : 'echo-link-new' );
		$url = SpecialPage::getTitleFor( 'Notifications' )->getLocalURL();

		$notificationsLink = array(
			'href' => $url,
			'text' => $msg->params( $wgLang->formatNum( $notificationCount ) )->text(),
			'active' => $notificationCount > 0,
		);

		$insertUrls = array( 'notifications' => $notificationsLink );
		$personal_urls = wfArrayInsertAfter( $personal_urls, $insertUrls, 'watchlist' );

		return true;
	}

	/**
	 * Handler for AbortEmailNotification hook.
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/AbortEmailNotification
	 * @return bool true in all cases
	 */
	static function abortEmailNotification() {
		global $wgEchoDisableStandardEmail;
		return !$wgEchoDisableStandardEmail;
	}

	public static function makeGlobalVariablesScript( &$vars, OutputPage $outputPage ) {
		$user = $outputPage->getUser();

		// Provide info for the Overlay

		$timestamp = new MWTimestamp( wfTimestampNow() );
		if ( ! $user->isAnon() ) {
			$vars['wgEchoOverlayConfiguration'] = array(
				'timestamp' => $timestamp->getTimestamp( TS_UNIX ),
				'notification-count' => EchoNotificationController::getNotificationCount( $user ),
			);
		}

		return true;
	}

	static function getUnitTests( &$files ) {
		$dir = dirname( __FILE__ ) . '/tests';
		$files[] = "$dir/DiscussionParserTest.php";
		return true;
	}

	static function abortNewtalkNotification( $article ) {
		return false;
	}

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
}
