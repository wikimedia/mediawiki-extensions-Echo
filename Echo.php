<?php
/**
 * MediaWiki Extension: Echo
 * http://www.mediawiki.org/wiki/Extension:Echo
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * This program is distributed WITHOUT ANY WARRANTY.
 */

/**
 *
 * @file
 * @ingroup Extensions
 * @author Andrew Garrett, Benny Situ, Ryan Kaldari, Erik Bernhardson
 * @licence MIT License
 */

# Alert the user that this is not a valid entry point to MediaWiki if they try to access the special pages file directly.
if ( !defined( 'MEDIAWIKI' ) ) {
	echo <<<EOT
To install this extension, put the following line in LocalSettings.php:
require_once( "$IP/extensions/Echo/Echo.php" );
EOT;
	exit( 1 );
}

// Extension credits that will show up on Special:Version
$wgExtensionCredits['specialpage'][] = array(
	'path' => __FILE__,
	'name' => 'Echo',
	'url' => 'https://www.mediawiki.org/wiki/Extension:Echo',
	'author' => array( 'Andrew Garrett', 'Ryan Kaldari', 'Benny Situ', 'Luke Welling' ),
	'descriptionmsg' => 'echo-desc',
);

$dir = dirname( __FILE__ ) . '/';
$wgMessagesDirs['Echo'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['Echo'] = $dir . 'Echo.i18n.php';
$wgExtensionMessagesFiles['EchoAliases'] = $dir . 'Echo.alias.php';

// Basic Echo classes
$wgAutoloadClasses['EchoHooks'] = $dir . 'Hooks.php';
$wgAutoloadClasses['EchoEvent'] = $dir . 'model/Event.php';
$wgAutoloadClasses['EchoNotification'] = $dir . 'model/Notification.php';
$wgAutoloadClasses['MWEchoEmailBatch'] = $dir . 'includes/EmailBatch.php';
$wgAutoloadClasses['MWDbEchoEmailBatch'] = $dir . 'includes/DbEmailBatch.php';
$wgAutoloadClasses['MWEchoEmailBundler'] = $dir . 'includes/EmailBundler.php';
$wgAutoloadClasses['MWDbEchoEmailBundler'] = $dir . 'includes/DbEmailBundler.php';
$wgAutoloadClasses['MWEchoEventLogging'] = $dir . 'includes/EventLogging.php';
$wgAutoloadClasses['EchoAttributeManager'] = $dir . 'includes/AttributeManager.php';

// Database mappers && gateways
$wgAutoloadClasses['EchoEventMapper'] = $dir . 'includes/mapper/EventMapper.php';
$wgAutoloadClasses['EchoNotificationMapper'] = $dir . 'includes/mapper/NotificationMapper.php';
$wgAutoloadClasses['EchoUserNotificationGateway'] = $dir . 'includes/gateway/UserNotificationGateway.php';

// Output formatters
$wgAutoloadClasses['EchoDataOutputFormatter'] = $dir . 'includes/DataOutputFormatter.php';

// Event formatters
$wgAutoloadClasses['EchoNotificationFormatter'] = $dir . 'formatters/NotificationFormatter.php';
$wgAutoloadClasses['EchoBasicFormatter'] = $dir . 'formatters/BasicFormatter.php';
$wgAutoloadClasses['EchoEditFormatter'] = $dir . 'formatters/EditFormatter.php';
$wgAutoloadClasses['EchoCommentFormatter'] = $dir . 'formatters/CommentFormatter.php';
$wgAutoloadClasses['EchoMentionFormatter'] = $dir . 'formatters/MentionFormatter.php';
$wgAutoloadClasses['EchoUserRightsFormatter'] = $dir . 'formatters/UserRightsFormatter.php';
$wgAutoloadClasses['EchoPageLinkFormatter'] = $dir . 'formatters/PageLinkFormatter.php';
$wgAutoloadClasses['EchoEditUserTalkFormatter'] = $dir . 'formatters/EditUserTalkFormatter.php';

// Email formatters
$wgAutoloadClasses['EchoEmailFormatter'] = $dir . 'includes/EmailFormatter.php';
$wgAutoloadClasses['EchoTextEmailFormatter'] = $dir . 'includes/EmailFormatter.php';
$wgAutoloadClasses['EchoHTMLEmailFormatter'] = $dir . 'includes/EmailFormatter.php';
$wgAutoloadClasses['EchoEmailMode'] = $dir . 'includes/EmailFormatter.php';
$wgAutoloadClasses['EchoEmailSingle'] = $dir . 'includes/EmailFormatter.php';
$wgAutoloadClasses['EchoEmailDigest'] = $dir . 'includes/EmailFormatter.php';
$wgAutoloadClasses['EchoEmailDecorator'] = $dir . 'includes/EmailFormatter.php';
$wgAutoloadClasses['EchoTextEmailDecorator'] = $dir . 'includes/EmailFormatter.php';
$wgAutoloadClasses['EchoHTMLEmailDecorator'] = $dir . 'includes/EmailFormatter.php';

// Internal stuff
$wgAutoloadClasses['EchoNotifier'] = $dir . 'Notifier.php';
$wgAutoloadClasses['EchoUserLocator'] = $dir . 'includes/UserLocator.php';
$wgAutoloadClasses['EchoNotificationController'] = $dir . 'controller/NotificationController.php';
$wgAutoloadClasses['EchoDiscussionParser'] = $dir . 'includes/DiscussionParser.php';
$wgAutoloadClasses['EchoDiffParser'] = $dir . 'includes/DiffParser.php';

// Job queue
$wgAutoloadClasses['EchoNotificationJob'] = $dir . 'jobs/NotificationJob.php';
$wgJobClasses['EchoNotificationJob'] = 'EchoNotificationJob';
$wgAutoloadClasses['MWEchoNotificationEmailBundleJob'] = $dir . 'jobs/NotificationEmailBundleJob.php';
$wgJobClasses['MWEchoNotificationEmailBundleJob'] = 'MWEchoNotificationEmailBundleJob';

// API
$wgAutoloadClasses['ApiEchoNotifications'] = $dir . 'api/ApiEchoNotifications.php';
$wgAPIMetaModules['notifications'] = 'ApiEchoNotifications';
$wgAutoloadClasses['ApiEchoMarkRead'] = $dir . 'api/ApiEchoMarkRead.php';
$wgAPIModules['echomarkread'] = 'ApiEchoMarkRead';

// Special page
$wgAutoloadClasses['SpecialNotifications'] = $dir . 'special/SpecialNotifications.php';
$wgSpecialPages['Notifications'] = 'SpecialNotifications';
$wgSpecialPageGroups['Notifications'] = 'users';

// Backend support
$wgAutoloadClasses['MWEchoDbFactory'] = $dir . 'includes/EchoDbFactory.php';
$wgAutoloadClasses['MWEchoNotifUser'] = $dir . 'includes/NotifUser.php';

// Whitelist and Blacklist
$wgAutoloadClasses['EchoContainmentList'] = $dir . 'includes/ContainmentSet.php';
$wgAutoloadClasses['EchoContainmentSet'] = $dir . 'includes/ContainmentSet.php';
$wgAutoloadClasses['EchoArrayList'] = $dir . 'includes/ContainmentSet.php';
$wgAutoloadClasses['EchoOnWikiList'] = $dir . 'includes/ContainmentSet.php';
$wgAutoloadClasses['EchoCachedList'] = $dir . 'includes/ContainmentSet.php';

// Maintenance testing
$wgAutoloadClasses['EchoBatchRowUpdate'] = $dir . 'includes/BatchRowUpdate.php';
$wgAutoloadClasses['EchoBatchRowWriter'] = $dir . 'includes/BatchRowUpdate.php';
$wgAutoloadClasses['EchoBatchRowIterator'] = $dir . 'includes/BatchRowUpdate.php';
$wgAutoloadClasses['EchoRowUpdateGenerator'] = $dir . 'includes/BatchRowUpdate.php';
$wgAutoloadClasses['EchoSuppressionRowUpdateGenerator'] = $dir . 'includes/schemaUpdate.php';

// Housekeeping hooks
$wgHooks['LoadExtensionSchemaUpdates'][] = 'EchoHooks::getSchemaUpdates';
$wgHooks['GetPreferences'][] = 'EchoHooks::getPreferences';
$wgHooks['PersonalUrls'][] = 'EchoHooks::onPersonalUrls';
$wgHooks['BeforePageDisplay'][] = 'EchoHooks::beforePageDisplay';
$wgHooks['MakeGlobalVariablesScript'][] = 'EchoHooks::makeGlobalVariablesScript';
$wgHooks['UnitTestsList'][] = 'EchoHooks::getUnitTests';
$wgHooks['ResourceLoaderRegisterModules'][] = 'EchoHooks::onResourceLoaderRegisterModules';
$wgHooks['UserRights'][] = 'EchoHooks::onUserRights';
$wgHooks['UserLoadOptions'][] = 'EchoHooks::onUserLoadOptions';
$wgHooks['UserSaveOptions'][] = 'EchoHooks::onUserSaveOptions';
$wgHooks['UserClearNewTalkNotification'][] = 'EchoHooks::onUserClearNewTalkNotification';
$wgHooks['ParserTestTables'][] = 'EchoHooks::onParserTestTables';

// Extension initialization
$wgExtensionFunctions[] = 'EchoHooks::initEchoExtension';

include __DIR__ . '/Resources.php';

/**
 * This Echo hook can be used to define users who are by default interested in
 * certain events.
 * For example, it can be used to say that users are by default interested in
 * their own user talk page being edited. In fact, that is what it is used for
 * internally.
 */
$wgHooks['EchoGetDefaultNotifiedUsers'][] = 'EchoHooks::getDefaultNotifiedUsers';
$wgHooks['EchoGetNotificationTypes'][] = 'EchoHooks::getNotificationTypes';
$wgHooks['EchoGetBundleRules'][] = 'EchoHooks::onEchoGetBundleRules';
$wgHooks['EchoAbortEmailNotification'][] = 'EchoHooks::onEchoAbortEmailNotification';
$wgHooks['EchoCreateNotificationComplete'][] = 'EchoHooks::onEchoCreateNotificationComplete';

// Hook appropriate events
$wgHooks['ArticleSaveComplete'][] = 'EchoHooks::onArticleSaved';
$wgHooks['AddNewAccount'][] = 'EchoHooks::onAccountCreated';
$wgHooks['ArticleRollbackComplete'][] = 'EchoHooks::onRollbackComplete';
$wgHooks['UserSaveSettings'][] = 'EchoHooks::onUserSaveSettings';

// Disable ordinary user talk page email notifications
$wgHooks['AbortTalkPageEmailNotification'][] = 'EchoHooks::onAbortTalkPageEmailNotification';
$wgHooks['SendWatchlistEmailNotification'][] = 'EchoHooks::onSendWatchlistEmailNotification';
// Disable the yellow bar of death
$wgHooks['GetNewMessagesAlert'][] = 'EchoHooks::abortNewMessagesAlert';
$wgHooks['LinksUpdateAfterInsert'][] = 'EchoHooks::onLinksUpdateAfterInsert';

// Configuration

// The name of the backend to use for Echo email bundling and digest, it should
// be always Db
// @deprecated
// @todo remove it from code base
$wgEchoBackendName = 'Db';

// Whether to turn on email batch function
$wgEchoEnableEmailBatch = true;

// URL for more information about the Echo notification system
$wgEchoHelpPage = '//www.mediawiki.org/wiki/Special:MyLanguage/Help:Extension:Echo';

// Whether to use job queue to process web and email notifications, bypass the queue for now
// since it's taking more than an hour to run in mediawiki.org, this is not acceptable for the
// purpose of testing notification.
// Todo - Abstract this into classes like: JobQueueNone, JobQueueMySQL, JobQueueRedis
$wgEchoUseJobQueue = false;

// The organization address, the value should be defined in LocalSettings.php
$wgEchoEmailFooterAddress = '';

// The email address for both "from" and "reply to" on email notifications.
// Should be defined in LocalSettings.php
$wgNotificationSender = $wgPasswordSender;
// Name for "from" on email notifications. Should be defined in LocalSettings.php
// if null, uses 'emailsender' message
$wgNotificationSenderName = null;
// Name for "reply to" on email notifications. Should be defined in LocalSettings.php
$wgNotificationReplyName = 'No Reply';

// Use the main db if this is set to false, to use a specific external db, just
// use any key defined in $wgExternalServers
$wgEchoCluster = false;

// The max notification count showed in badge
// The max number showed in bundled message, eg, <user> and 99+ others <action>
$wgEchoMaxNotificationCount = 99;

// The time interval between each bundle email in seconds
// set a small number for test wikis, should set this to 0 to disable email bundling
// if there is no delay queue support
$wgEchoBundleEmailInterval = 0;

// Whether or not to enable a new talk page message alert for logged in users
$wgEchoNewMsgAlert = true;

// Cohort study period.  This array should consist of 3 TS_MW format timestamps
// in ascending order, the 1st one is when the bucketing and study start, the 2nd
// one is when the bucketing ends, the 3rd one is when the study ends.  Set this
// to empty array to disable Cohort study, this should be defined in LocalSettings.php
$wgEchoCohortInterval = array();

// Define which output formats are available for each notification category
$wgEchoDefaultNotificationTypes = array(
	'all' => array(
		'web' => true,
		'email' => true,
	),
);

// Definitions of the different types of notification delivery that are possible.
// Each definition consists of a class name and a function name.
// See also: EchoNotificationController class.
$wgEchoNotifiers = array(
	'web' => array( 'EchoNotifier', 'notifyWithNotification' ), // web-based notification
	'email' => array( 'EchoNotifier', 'notifyWithEmail' ),
);

// List of usernames that will not trigger notification creation. This is initially
// for bots that perform automated edits that are not important enough to regularly
// spam people with notifications. Set to empty array when not in use.
$wgEchoAgentBlacklist = array();

// Page location of community maintained blacklist within NS_MEDIAWIKI.  Set to null to disable.
$wgEchoOnWikiBlacklist = 'Echo-blacklist';

// sprintf format of per-user notification agent whitelists. Set to null to disable.
$wgEchoPerUserWhitelistFormat = '%s/Echo-whitelist';

// Define the categories that notifications can belong to. Categories can be
// assigned the following parameters: priority, nodismiss, tooltip, and usergroups.
// All parameters are optional.
// If a notifications type doesn't have a category parameter, it is
// automatically assigned to the 'other' category which is lowest priority and
// has no preferences or dismissibility.
// The priority parameter controls the order in which notifications are
// displayed in preferences and batch emails. Priority ranges from 1 to 10. If
// the priority is not specified, it defaults to 10, which is the lowest.
// The usergroups param specifies an array of usergroups eligible to recieve the
// notifications in the category. If no usergroups parameter is specified, all
// groups are eligible.
// The nodismiss parameter disables the dismissability of notifications in the
// category. It can either be set to an array of output formats (see
// $wgEchoNotifiers) or an array containing 'all'.
$wgEchoNotificationCategories = array(
	'system' => array(
		'priority' => 9,
		'no-dismiss' => array( 'all' ),
	),
	'user-rights' => array( // bug 55337
		'priority' => 9,
		'tooltip' => 'echo-pref-tooltip-user-rights',
	),
	'other' => array(
		'no-dismiss' => array( 'all' ),
	),
	'edit-user-talk' => array(
		'priority' => 1,
		'no-dismiss' => array( 'web' ),
		'tooltip' => 'echo-pref-tooltip-edit-user-talk',
	),
	'reverted' => array(
		'priority' => 9,
		'tooltip' => 'echo-pref-tooltip-reverted',
	),
	'article-linked' => array(
		'priority' => 5,
		'tooltip' => 'echo-pref-tooltip-article-linked',
	),
	'mention' => array(
		'priority' => 4,
		'tooltip' => 'echo-pref-tooltip-mention',
	),
);

$echoIconPath = "Echo/modules/icons";

// Defines icons, which are 30x30 images. This is passed to BeforeCreateEchoEvent so
// extensions can define their own icons with the same structure.  It is recommended that
// extensions prefix their icon key. An example is myextension-name.  This will help
// avoid namespace conflicts.
//
// You can use either a path or a url, but not both.
// The value of 'path' is relative to $wgExtensionAssetsPath.
//
// The value of 'url' should be a URL.
//
// You should customize the site icon URL, which is:
// $wgEchoNotificationIcons['site']['url']
$wgEchoNotificationIcons = array(
	'placeholder' => array(
		'path' => "$echoIconPath/Generic.png",
	),
	'trash' => array(
		'path' => "$echoIconPath/Deletion.png",
	),
	'chat' => array(
		'path' => "$echoIconPath/Talk.png",
	),
	'linked' => array(
		'path' => "$echoIconPath/CrossReferenced.png",
	),
	'featured' => array(
		'path' => "$echoIconPath/Featured.png",
	),
	'reviewed' => array(
		'path' => "$echoIconPath/Reviewed.png",
	),
	'tagged' => array(
		'path' => "$echoIconPath/ReviewedWithTags.png",
	),
	'revert' => array(
		'path' => "$echoIconPath/Revert.png",
	),
	'checkmark' => array(
		'path' => "$echoIconPath/Reviewed.png",
	),
	'gratitude' => array(
		'path' => "$echoIconPath/Gratitude.png",
	),
	'site' => array(
		'url' => false
	),
);

// Definitions of the notification event types built into Echo.
// If formatter-class isn't specified, defaults to EchoBasicFormatter.
$wgEchoNotifications = array(
	'welcome' => array(
		'category' => 'system',
		'group' => 'positive',
		'title-message' => 'notification-new-user',
		'title-params' => array( 'agent' ),
		'icon' => 'site',
	),
	'edit-user-talk' => array(
		'user-locators' => array(
			'EchoUserLocator::locateTalkPageOwner',
		),
		'primary-link' => array( 'message' => 'notification-link-text-view-message', 'destination' => 'section' ),
		'secondary-link' => array( 'message' => 'notification-link-text-view-changes', 'destination' => 'diff' ),
		'category' => 'edit-user-talk',
		'group' => 'interactive',
		'bundle' => array( 'web' => true, 'email' => false ),
		'formatter-class' => 'EchoEditUserTalkFormatter',
		'title-message' => 'notification-edit-talk-page2',
		'title-params' => array( 'agent', 'user', 'subject-anchor' ),
		'bundle-message' => 'notification-edit-talk-page-bundle',
		'bundle-params' => array( 'agent', 'user', 'agent-other-display', 'agent-other-count' ),
		'flyout-message' => 'notification-edit-talk-page-flyout2',
		'flyout-params' => array( 'agent', 'user', 'subject-anchor' ),
		'email-subject-message' => 'notification-edit-talk-page-email-subject2',
		'email-subject-params' => array( 'agent' ),
		'email-body-batch-message' => 'notification-edit-talk-page-email-batch-body2',
		'email-body-batch-params' => array( 'agent' ),
		'email-body-batch-bundle-message' => 'notification-edit-user-talk-email-batch-bundle-body',
		'email-body-batch-bundle-params' => array( 'agent', 'agent-other-display', 'agent-other-count' ),
		'icon' => 'chat',
	),
	'reverted' => array(
		'primary-link' => array( 'message' => 'notification-link-text-view-edit', 'destination' => 'diff' ),
		'category' => 'reverted',
		'group' => 'negative',
		'formatter-class' => 'EchoEditFormatter',
		'title-message' => 'notification-reverted2',
		'title-params' => array( 'agent', 'title', 'difflink', 'number' ),
		'flyout-message' => 'notification-reverted-flyout2',
		'flyout-params' => array( 'agent', 'title', 'difflink', 'number' ),
		'email-subject-message' => 'notification-reverted-email-subject2',
		'email-subject-params' => array( 'agent', 'title', 'number' ),
		'email-body-batch-message' => 'notification-reverted-email-batch-body2',
		'email-body-batch-params' => array( 'agent', 'title', 'number' ),
		'icon' => 'revert',
	),
	'page-linked' => array(
		'primary-link' => array( 'message' => 'notification-link-text-view-page', 'destination' => 'link-from-page' ),
		'category' => 'article-linked',
		'group' => 'neutral',
		'bundle' => array( 'web' => true, 'email' => true ),
		'formatter-class' => 'EchoPageLinkFormatter',
		'title-message' => 'notification-page-linked',
		'title-params' => array( 'agent', 'title', 'link-from-page' ),
		'bundle-message' => 'notification-page-linked-bundle',
		'bundle-params' => array( 'agent', 'title', 'link-from-page', 'link-from-page-other-display', 'link-from-page-other-count' ),
		'flyout-message' => 'notification-page-linked-flyout',
		'flyout-params' => array( 'agent', 'title', 'link-from-page' ),
		'email-subject-message' => 'notification-page-linked-email-subject',
		'email-subject-params' => array(),
		'email-body-batch-message' => 'notification-page-linked-email-batch-body',
		'email-body-batch-params' => array( 'agent', 'title', 'link-from-page' ),
		'email-body-batch-bundle-message' => 'notification-page-linked-email-batch-bundle-body',
		'email-body-batch-bundle-params' => array( 'agent', 'title', 'link-from-page', 'link-from-page-other-display', 'link-from-page-other-count' ),
		'icon' => 'linked',
	),
	'mention' => array(
		'primary-link' => array( 'message' => 'notification-link-text-view-mention', 'destination' => 'section' ),
		'secondary-link' => array( 'message' => 'notification-link-text-view-changes', 'destination' => 'diff' ),
		'category' => 'mention',
		'group' => 'interactive',
		'formatter-class' => 'EchoMentionFormatter',
		'title-message' => 'notification-mention',
		'title-params' => array( 'agent', 'subject-anchor', 'title', 'section-title', 'main-title-text' ),
		'flyout-message' => 'notification-mention-flyout',
		'flyout-params' => array( 'agent', 'subject-anchor',  'title', 'section-title', 'main-title-text' ),
		'email-subject-message' => 'notification-mention-email-subject',
		'email-subject-params' => array( 'agent' ),
		'email-body-batch-message' => 'notification-mention-email-batch-body',
		'email-body-batch-params' => array( 'agent', 'title', 'section-title', 'main-title-text' ),
		'icon' => 'chat',
	),
	'user-rights' => array(
		'primary-link' => array( 'message' => 'echo-learn-more', 'destination' => 'user-rights-list' ),
		'category' => 'user-rights',
		'group' => 'neutral',
		'formatter-class' => 'EchoUserRightsFormatter',
		'title-message' => 'notification-user-rights',
		'title-params' => array( 'agent', 'user-rights-list' ),
		'flyout-message' => 'notification-user-rights-flyout',
		'flyout-params' => array( 'agent', 'user-rights-list' ),
		'email-subject-message' => 'notification-user-rights-email-subject',
		'email-subject-params' => array(),
		'email-body-batch-message' => 'notification-user-rights-email-batch-body',
		'email-body-batch-params' => array( 'agent', 'user-rights-list' ),
		'icon' => 'site',
	),
);

// Enable notifications for all logged in users by default
$wgDefaultUserOptions['echo-notify-show-link'] = true;

// Enable new talk page messages alert for all logged in users by default
$wgDefaultUserOptions['echo-show-alert'] = true;

// By default, send emails for each notification as they come in
$wgDefaultUserOptions['echo-email-frequency'] = 0; /*EchoHooks::EMAIL_IMMEDIATELY*/

if ( $wgAllowHTMLEmail ) {
	$wgDefaultUserOptions['echo-email-format'] = 'html'; /*EchoHooks::EMAIL_FORMAT_HTML*/
} else {
	$wgDefaultUserOptions['echo-email-format'] = 'plain-text'; /*EchoHooks::EMAIL_FORMAT_PLAIN_TEXT*/
}

// Set all of the events to notify by web but not email by default (won't affect events that don't email)
foreach ( $wgEchoNotificationCategories as $category => $categoryData ) {
	$wgDefaultUserOptions["echo-subscriptions-email-{$category}"] = false;
	$wgDefaultUserOptions["echo-subscriptions-web-{$category}"] = true;
}

// most settings default to web on, email off, but override these
$wgDefaultUserOptions['echo-subscriptions-email-system'] = true;
$wgDefaultUserOptions['echo-subscriptions-email-user-rights'] = true;
$wgDefaultUserOptions['echo-subscriptions-web-article-linked'] = false;

// Echo Configuration for EventLogging
$wgEchoConfig = array(
	'version' => '1.5',
	// default all eventlogging off, overwrite them in site configuration
	'eventlogging' => array (
		'Echo' => array (
			'enabled' => false,
			'revision' => 7572295,
		),
		'EchoMail' => array (
			'enabled' => false,
			'revision' => 5467650
		),
		'EchoInteraction' => array (
			'enabled' => false,
			'revision' => 5782287
		),
	)
);
