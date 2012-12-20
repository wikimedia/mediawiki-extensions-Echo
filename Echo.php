<?php
/**
 * MediaWiki Extension: Echo
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
 * @author Andrew Garrett
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
$wgExtensionMessagesFiles['Echo'] = $dir . 'Echo.i18n.php';
$wgExtensionMessagesFiles['EchoAliases'] = $dir . 'Echo.alias.php';

$wgAutoloadClasses['EchoHooks'] = $dir . 'Hooks.php';
$wgAutoloadClasses['EchoSubscription'] = $dir . 'model/Subscription.php';
$wgAutoloadClasses['EchoEvent'] = $dir . 'model/Event.php';
$wgAutoloadClasses['EchoNotification'] = $dir . 'model/Notification.php';
$wgAutoloadClasses['MWEchoEmailBatch'] = $dir . 'includes/EmailBatch.php';

// Formatters
$wgAutoloadClasses['EchoNotificationFormatter'] = $dir . 'formatters/NotificationFormatter.php';
$wgAutoloadClasses['EchoBasicFormatter'] = $dir . 'formatters/BasicFormatter.php';
$wgAutoloadClasses['EchoEditFormatter'] = $dir . 'formatters/EditFormatter.php';
$wgAutoloadClasses['EchoCommentFormatter'] = $dir . 'formatters/CommentFormatter.php';

// Internal stuff
$wgAutoloadClasses['EchoNotifier'] = $dir . 'Notifier.php';
$wgAutoloadClasses['EchoNotificationController'] = $dir . 'controller/NotificationController.php';
$wgAutoloadClasses['EchoDiscussionParser'] = $dir . 'includes/DiscussionParser.php';

// Job queue
$wgAutoloadClasses['EchoNotificationJob'] = $dir . 'jobs/NotificationJob.php';
$wgJobClasses['EchoNotificationJob'] = 'EchoNotificationJob';

// API
$wgAutoloadClasses['ApiEchoNotifications'] =  $dir . 'api/ApiEchoNotifications.php';
$wgAPIMetaModules['notifications'] = 'ApiEchoNotifications';

// Special page
$wgAutoloadClasses['SpecialNotifications'] = $dir . 'special/SpecialNotifications.php';
$wgSpecialPages['Notifications'] = 'SpecialNotifications';

// Housekeeping hooks
$wgHooks['LoadExtensionSchemaUpdates'][] = 'EchoHooks::getSchemaUpdates';
$wgHooks['GetPreferences'][] = 'EchoHooks::getPreferences';
$wgHooks['PersonalUrls'][] = 'EchoHooks::onPersonalUrls';
$wgHooks['BeforePageDisplay'][] = 'EchoHooks::beforePageDisplay';
$wgHooks['MakeGlobalVariablesScript'][] = 'EchoHooks::makeGlobalVariablesScript';
$wgHooks['UnitTestsList'][] = 'EchoHooks::getUnitTests';

$echoResourceTemplate = array(
	'localBasePath' => $dir . 'modules',
	'remoteExtPath' => 'Echo/modules',
	'group' => 'ext.echo',
);

$wgResourceModules += array(
	'ext.echo.base' => $echoResourceTemplate + array(
		'styles' => 'base/ext.echo.base.css',
		'scripts' => 'base/ext.echo.base.js',
	),
	'ext.echo.overlay' => $echoResourceTemplate + array(
		'scripts' => array(
			'overlay/ext.echo.overlay.js',
		),
		'styles' => 'overlay/ext.echo.overlay.css',
		'dependencies' => array(
			'ext.echo.base',
			'mediawiki.api',
			'mediawiki.jqueryMsg',
			'jquery.badge',
			'ext.echo.icons',
		),
		'messages' => array(
			'echo-link-new',
			'echo-link',
			'echo-overlay-title',
			'echo-overlay-title-overflow',
			'echo-overlay-link',
			'echo-none',
		),
	),
	'ext.echo.special' => $echoResourceTemplate + array(
		'scripts' => array(
			'special/ext.echo.special.js',
		),
		'styles' => 'special/ext.echo.special.css',
		'dependencies' => array(
			'ext.echo.base',
			'mediawiki.api',
			'mediawiki.jqueryMsg',
			'ext.echo.icons',
		),
		'messages' => array(
			'echo-load-more-error',
		),
	),
	'ext.echo.icons' => $echoResourceTemplate + array(
		'styles' => 'icons/icons.css',
	),
);

/**
 * This Echo hook can be used to define users who are by default interested in
 * certain events.
 * For example, it can be used to say that users are by default interested in
 * their own user talk page being edited. In fact, that is what it is used for
 * internally.
 */
$wgHooks['EchoGetDefaultNotifiedUsers'][] = 'EchoHooks::getDefaultNotifiedUsers';
$wgHooks['EchoGetNotificationTypes'][] = 'EchoHooks::getNotificationTypes';

// Hook appropriate events
$wgHooks['ArticleSaveComplete'][] = 'EchoHooks::onArticleSaved';
$wgHooks['AddNewAccount'][] = 'EchoHooks::onAccountCreated';
$wgHooks['ArticleRollbackComplete'][] = 'EchoHooks::onRollbackComplete';

// Disable ordinary user talk page email notifications
$wgHooks['AbortEmailNotification'][] = 'EchoHooks::disableStandUserTalkEnotif';
$wgHooks['UpdateUserMailerFormattedPageStatus'][] = 'EchoHooks::disableStandUserTalkEnotif';
// Disable the yellow bar of death
$wgHooks['ArticleEditUpdateNewTalk'][] = 'EchoHooks::abortNewTalkNotification';

// Configuration

// Enable notifications for all logged in users by default
$wgDefaultUserOptions['echo-notify-link'] = 'true';

$wgEchoDisableStandardEmail = true;
// Whether to turn on email batch function
$wgEchoEnableEmailBatch = true;

// Show a 'Notifications' link with badge in the user toolbar at the top of the page.
// Otherwise, only show a badge next to the username.
$wgEchoShowFullNotificationsLink = true;

// Whether to use job queue to process web and email notifications, bypass the queue for now
// since it's taking more than an hour to run in mediawiki.org, this is not acceptable for the
// purpose of testing notification.
// Todo - Abstract this into classes like: JobQueueNone, JobQueueMySQL, JobQueueRedis
$wgEchoUseJobQueue = false;

// By default, send emails for each notification as they come in
$wgDefaultUserOptions['echo-email-frequency'] = EchoHooks::EMAIL_IMMEDIATELY;

// The organization address, the value should be defined in LocalSettings.php
$wgEchoEmailFooterAddress = '';

// The max notification count showed in badge
$wgEchoMaxNotificationCount = 99;

$wgEchoDefaultNotificationTypes = array( // Welcome events do not use subscription, and will only trigger notify, not email.
	'all' => array(
		'notify' => true,
		'email' => true,
	)
);

// Definitions of the different types of notification delivery that are possible.
// Each definition consists of a class name and a function name.
// See also: EchoNotificationController class.
$wgEchoNotifiers = array(
	'notify' => array( 'EchoNotifier', 'notifyWithNotification' ), // web-based notification
	'email' => array( 'EchoNotifier', 'notifyWithEmail' ),
);

// Event types that should have notifications enabled.
// The list here only includes event types handled by Echo itself. Other
// extensions can add to this list through the BeforeCreateEchoEvent hook.
$wgEchoEnabledEvents = array(
	'welcome', // A user created an account
	'edit-user-talk', // User talk page is edited
	'reverted', // An edit is undone or rolled-back
	// These aren't ready yet, specifically they have no means of subscription
#	'add-comment', // A signed comment is added to an existing section
#	'add-talkpage-topic', // A new section is added to a talk page
);

// This array stores the category and priority for enabled events
// if an event is not specified, it means the event belongs to the
// 'other' category with priority 10, which is the lowest,
// priority is ranging from 1 to 10
$wgEchoEventDetails = array(
	'edit-user-talk' => array(
		'category' => 'edit-user-talk',
		'priority' => 1
	),
	'reverted' => array(
		'category' => 'edit-revert',
		'priority' => 9
	),
);

// Set all of the events to email by default (won't affect events that don't email)
foreach ( $wgEchoEnabledEvents as $wgEchoEnabledEvent ) {
	$wgDefaultUserOptions['echo-email-notifications' . $wgEchoEnabledEvent] = true;
}
// unset default email for reverts (changes it to opt-in)
$wgDefaultUserOptions['echo-email-notificationsreverted'] = false;

// Definitions of the notification event types built into Echo
$wgEchoNotificationFormatters = array(
	'edit-user-talk' => array(
		'type' => 'edit',
		'title-message' => 'notification-edit-talk-page',
		'title-params' => array( 'agent', 'user' ),
		'payload' => array( 'summary' ),
		'email-subject-message' => 'notification-edit-talk-page-email-subject',
		'email-body-message' => 'notification-edit-talk-page-email-body',
		'email-body-params' => array( 'agent', 'titlelink', 'summary', 'email-footer' ),
		'email-body-batch-message' => 'notification-edit-talk-page-email-batch-body',
		'email-body-batch-params' => array( 'agent', 'difflink', 'summary' ),
		'icon' => 'chat',
	),
	'edit' => array(
		'type' => 'edit',
		'title-message' => 'notification-edit',
		'title-params' => array( 'agent', 'title', 'difflink', 'user', 'summary' ),
		'email-subject-message' => 'notification-edit-email-subject',
		'email-subject-params' => array( 'agent', 'title' ),
		'email-body-message' => 'notification-edit-email-body',
		'email-body-params' => array( 'agent', 'title', 'difflink', 'user', 'summary', 'email-footer' ),
		'email-body-batch-message' => 'notification-edit-email-batch-body',
		'email-body-batch-params' => array( 'agent', 'title', 'difflink', 'summary' ),
		'icon' => 'w',
	),
	'add-comment' => array(
		'type' => 'comment',
		'title-message' => 'notification-add-comment',
		'title-message-yours' => 'notification-add-comment-yours',
		'title-params' => array( 'agent', 'subject', 'title', 'content-page' ),
		'payload' => array( 'snippet' ),
		'icon' => 'chat',
	),
	'add-talkpage-topic' => array(
		'type' => 'comment',
		'title-message' => 'notification-add-talkpage-topic',
		'title-message-yours' => 'notification-add-talkpage-topic-yours',
		'title-params' => array( 'agent', 'subject', 'title', 'content-page' ),
		'payload' => array( 'snippet' ),
		'icon' => 'chat',
	),
	'welcome' => array(
		'type' => 'welcome',
		'title-message' => 'notification-new-user',
		'title-params' => array( 'agent' ),
		'payload' => array( 'welcome' ),
		'icon' => 'w',
	),
	'reverted' => array(
		'type' => 'edit',
		'title-message' => 'notification-reverted',
		'title-params' => array( 'agent', 'title', 'difflink', 'number' ),
		'payload' => array( 'summary' ),
		'email-subject-message' => 'notification-reverted-email-subject',
		'email-subject-params' => array( 'agent', 'title', 'summary' ),
		'email-body-message' => 'notification-reverted-email-body',
		'email-body-params' => array( 'agent', 'title', 'difflink', 'user', 'summary', 'email-footer' ),
		'email-body-batch-message' => 'notification-reverted-email-batch-body',
		'email-body-batch-params' => array( 'agent', 'title', 'difflink', 'summary' ),
		'icon' => 'revert',
	)
);
