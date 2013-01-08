<?php

class EchoHooks {
	const EMAIL_NEVER = -1; // Never send email notifications
	const EMAIL_IMMEDIATELY = 0; // Send email notificaitons immediately as they come in
	const EMAIL_DAILY_DIGEST = 1; // Send daily email digests
	const EMAIL_WEEKLY_DIGEST = 7; // Send weekly email digests

	/**
	 * @param $updater DatabaseUpdater object
	 * @return bool true in all cases
	 */
	public static function getSchemaUpdates( $updater ) {
		$dir = __DIR__;
		$baseSQLFile = "$dir/echo.sql";
		$updater->addExtensionTable( 'echo_subscription', $baseSQLFile );
		$updater->addExtensionTable( 'echo_email_batch', "$dir/db_patches/echo_email_batch.sql" );

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
			case 'article-linked':
				$extra = $event->getExtra();
				$agent = $event->getAgent();

				if ( !$event->getTitle() || !isset( $extra['new-links'] )
					|| !is_array( $extra['new-links'] ) || !$agent
				) {
					break;
				}

				global $wgEchoUseJobQueue;
				$count = 0;
				$agentId = $agent->getID();
				$dbr = wfGetDB( DB_SLAVE );
				$updated = false;

				// @Todo: Title::newFromText() would trigger individual query for each title, this is not
				// efficient if there are a lot of new links, since we only need the page_id, this can be done
				// by one big query
				foreach( $extra['new-links'] as $page ) {
					$count++;
					// processing a lot of links on a normal web request is expensive, we should cap
					// this till we have job queue enabled
					if ( !$wgEchoUseJobQueue && $count > 100 ) {
						break;
					}
					$title = Title::newFromText( $page['pl_title'], $page['pl_namespace'] );
					if ( !$title || $title->getArticleID() <= 0 ) {
						continue;
					}
					$res = $dbr->selectRow(
						array( 'revision' ),
						array( 'rev_user' ),
						array( 'rev_page' => $title->getArticleID() ),
						__METHOD__,
						array( 'LIMIT' => 1, 'ORDER BY' => 'rev_timestamp, rev_id' )
					);
					// No notification if agents link their own articles
					if ( $res && $res->rev_user && $agentId != $res->rev_user ) {
						// Map each linked page to a corresponding author
						if ( !isset( $extra['notif-list'][$res->rev_user] ) ) {
							$extra['notif-list'][$res->rev_user] = array();
						}
						if ( isset( $users[$res->rev_user] ) ) {
							$user = $users[$res->rev_user];
						} else {
							$user = User::newFromId( $res->rev_user );
						}

						if ( $user ) {
							$users[$user->getID()] = $user;
							$extra['notif-list'][$res->rev_user][] = $page;
							$updated = true;
						}
					}
				}
				if ( $updated ) {
					$event->updateExtra( $extra );
				}
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
		global $wgEchoDefaultNotificationTypes, $wgAuth, $wgEchoEnableEmailBatch, $wgEchoEventDetails;

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
			//'label-message' => 'echo-pref-email-frequency',
			'section' => 'echo/emailfrequency',
			'options' => $freqOptions
		);

		// Show email subscription options
		$emailOptions = array();

		// Bug 43446 - Sort events by priority
		$eventsAndPriorities = array();

		foreach ( EchoEvent::gatherValidEchoEvents() as $enabledEvent ) {
			if ( isset( $wgEchoEventDetails[$enabledEvent] ) ) {
				$eventsAndPriorities[$enabledEvent] = $wgEchoEventDetails[$enabledEvent]['priority'];
			} else {
				$eventsAndPriorities[$enabledEvent] = 10;
			}
		}

		asort( $eventsAndPriorities );

		foreach ( array_keys( $eventsAndPriorities ) as $enabledEvent ) {
			// Welcome notifications don't have subscriptions
			if ( $enabledEvent === 'welcome' ) {
				continue;
			}
			// Make sure email notifications are possible for this event
			if ( isset( $wgEchoDefaultNotificationTypes[$enabledEvent] ) ) {
				if ( !$wgEchoDefaultNotificationTypes[$enabledEvent]['email'] ) {
					continue;
				}
			} elseif ( !$wgEchoDefaultNotificationTypes['all']['email'] ) {
				continue;
			}
			// If we're creating our own preference for email notification on user
			// talk page edit, remove the existing preference from the User profile tab.
			if ( $enabledEvent === 'edit-user-talk' ) {
				unset( $preferences['enotifusertalkpages'] );
			}
			$eventMessage = wfMessage( 'echo-pref-email-' . $enabledEvent )->plain();
			$emailOptions["$eventMessage"] = $enabledEvent;
		}
		$preferences['echo-email-notifications'] = array(
			'type' => 'multiselect',
			'section' => 'echo/emailsubscriptions',
			'options' => $emailOptions,
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
		$emailContent = wfMessage( 'youremail' )->escaped()
			. wfMessage( 'word-separator' )->escaped() . $emailAddress;
		$preferences['echo-emailaddress'] = array(
			'type' => 'info',
			'raw' => true,
			'default' => $emailContent,
			'section' => 'echo/emailsubscriptions'
		);

		// Show fly-out display prefs
		$preferences['echo-notify-hide-link'] = array(
			'type' => 'toggle',
			'label-message' => 'echo-pref-notify-hide-link',
			'section' => 'echo/displaynotifications',
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
		global $wgEchoEnabledEvents;
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
			if ( in_array( 'reverted', $wgEchoEnabledEvents ) ) {
				$undidRevId = $user->getRequest()->getVal( 'wpUndidRevision' );
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
	 * Handler for LinksUpdateAfterInsert hook.
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/LinksUpdateAfterInsert
	 * @param $linksUpdate LinksUpdate
	 * @param $table string
	 * @param $insertions array
	 * @return bool
	 */
	public static function onLinksUpdateAfterInsert( $linksUpdate, $table, $insertions ) {
	 	// Confirm: if $linksUpdate->mRecursive is false, that means $linkUpdate->mTitle is
	 	// transcluding other page, and this link update is resulting from the other page
	 	// link update
		if ( !$linksUpdate->mRecursive ) {
			return true;
		}

		// Handle only inserts to pagelinks table for content namespace pages
		if ( $table !== 'pagelinks' || !MWNamespace::isContent( $linksUpdate->mTitle->getNamespace() ) ) {
			return true;
		}

		// Only create notifications for links to content namespace pages
		foreach ( $insertions as $key => $page ) {
			if ( !MWNamespace::isContent( $page['pl_namespace'] ) ) {
				unset( $insertions[$key] );
			}
		}

		// Exits if there is no new link
		if ( !$insertions ) {
			return true;
		}

		global $wgUser;
		EchoEvent::create( array(
			'type' => 'article-linked',
			'title' => $linksUpdate->mTitle,
			'agent' => $wgUser,
			'extra' => array(
				'new-links' => $insertions,
				'notif-list' => array()
			)
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
		$user = $out->getUser();
		if ( $user->isLoggedIn() && !$user->getOption( 'echo-notify-hide-link' ) ) {
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
		if ( $wgUser->isAnon() || $wgUser->getOption( 'echo-notify-hide-link' ) ) {
			return true;
		}

		$notificationCount = EchoNotificationController::getNotificationCount( $wgUser );
		if ( $wgEchoShowFullNotificationsLink ) {
			// Add a "Notifications" item to personal URLs
			$msg = wfMessage( $notificationCount == 0 ? 'echo-link' : 'echo-link-new' );
			$text = $msg->params( EchoNotificationController::formatNotificationCount( $notificationCount ) )->text();
		} else {
			// Just add a number
			$text = wfMessage( 'parentheses', $notificationCount )->plain();
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
		global $wgEchoEnabledEvents, $wgEnotifUserTalk;
		if ( in_array( 'edit-user-talk', $wgEchoEnabledEvents ) ) {
			// Disable the standard email notification for talk page messages
			$wgEnotifUserTalk = false;
		}
		// Don't abort watchlist email notifications
		return true;
	}

	/**
	 * Handler for MakeGlobalVariablesScript hook.
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/MakeGlobalVariablesScript
	 * @param &$vars Variables to be added into the output
	 * @param $outputPage OutputPage instance calling the hook
	 * @return bool true in all cases
	 */
	public static function makeGlobalVariablesScript( &$vars, OutputPage $outputPage ) {
		global $wgEchoShowFullNotificationsLink, $wgEchoHelpPage;
		$user = $outputPage->getUser();

		// Provide info for the Overlay

		$timestamp = new MWTimestamp( wfTimestampNow() );
		if ( ! $user->isAnon() ) {
			$vars['wgEchoOverlayConfiguration'] = array(
				'notifications-link-full' => $wgEchoShowFullNotificationsLink,
				'timestamp' => $timestamp->getTimestamp( TS_UNIX ),
				'notification-count' => EchoNotificationController::getFormattedNotificationCount( $user ),
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
	 * @param $page The WikiPage object of the talk page being updated
	 * @return bool
	 */
	static function abortNewTalkNotification( $page ) {
		global $wgUser, $wgEchoEnabledEvents;
		// If the user has the notifications flyout turned on and is receiving
		// notifications for talk page messages, disable the yellow-bar-style notice.
		if ( !$wgUser->getOption( 'echo-notify-hide-link' )
			&& in_array( 'edit-user-talk', $wgEchoEnabledEvents ) )
		{
			return false;
		} else {
			return true;
		}
	}

	/**
	 * Handler for ArticleRollbackComplete hook.
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/ArticleRollbackComplete
	 * @param $page The article that was edited
	 * @param $agent The user who did the rollback
	 * @param $newRevision The revision the page was reverted back to
	 * @param $oldRevision The revision of the top edit that was reverted
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
}
