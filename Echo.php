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
	'url' => 'http://www.mediawiki.org/wiki/Echo_(Notifications)',
	'author' => array(
		'Andrew Garrett',
	),
	'descriptionmsg' => 'echo-desc',
);

$dir = dirname( __FILE__ ) . '/';
$wgExtensionMessagesFiles['Echo'] = $dir . 'Echo.i18n.php';
$wgExtensionMessagesFiles['EchoAliases'] = $dir . 'Echo.alias.php';

$wgAutoloadClasses['EchoHooks'] = "$dir/Hooks.php";
$wgAutoloadClasses['EchoSubscription'] = "$dir/model/Subscription.php";
$wgAutoloadClasses['EchoEvent'] = "$dir/model/Event.php";
$wgAutoloadClasses['EchoNotification'] = "$dir/model/Notification.php";

// Formatters
$wgAutoloadClasses['EchoNotificationFormatter'] = "$dir/formatters/NotificationFormatter.php";
$wgAutoloadClasses['EchoBasicFormatter'] = "$dir/formatters/BasicFormatter.php";
$wgAutoloadClasses['EchoEditFormatter'] = "$dir/formatters/EditFormatter.php";
$wgAutoloadClasses['EchoCommentFormatter'] = "$dir/formatters/CommentFormatter.php";

// Internal stuff
$wgAutoloadClasses['EchoNotifier'] = "$dir/Notifier.php";
$wgAutoloadClasses['EchoNotificationController'] = "$dir/controller/NotificationController.php";
$wgAutoloadClasses['EchoDiscussionParser'] = "$dir/includes/DiscussionParser.php";

// Job queue
$wgAutoloadClasses['EchoNotificationJob'] = "$dir/jobs/NotificationJob.php";
$wgJobClasses['EchoNotificationJob'] = 'EchoNotificationJob';

// API
$wgAutoloadClasses['ApiEchoNotifications'] = "$dir/api/ApiEchoNotifications.php";
$wgAPIMetaModules['notifications'] = 'ApiEchoNotifications';

// Special page
$wgAutoloadClasses['SpecialNotifications'] = "$dir/special/SpecialNotifications.php";
$wgSpecialPages['Notifications'] = 'SpecialNotifications';

// Housekeeping hooks
$wgHooks['LoadExtensionSchemaUpdates'][] = 'EchoHooks::getSchemaUpdates';
$wgHooks['GetPreferences'][] = 'EchoHooks::getPreferences';
$wgHooks['PersonalUrls'][] = 'EchoHooks::onPersonalUrls';
$wgHooks['BeforePageDisplay'][] = 'EchoHooks::beforePageDisplay';
$wgHooks['MakeGlobalVariablesScript'][] = 'EchoHooks::makeGlobalVariablesScript';
$wgHooks['UnitTestsList'][] = 'EchoHooks::getUnitTests';

$echoResourceTemplate = array(
	'localBasePath' => "$dir/modules",
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
			'echo-overlay-link',
			'echo-none',
		),
	),
	'ext.echo.special' => $echoResourceTemplate + array(
		'dependencies' => array(
			'ext.echo.base',
			'ext.echo.icons',
		),
	),
	'ext.echo.icons' => $echoResourceTemplate + array(
		'styles' => 'icons/icons.css',
	),
);

$wgDefaultUserOptions['echo-notify-watchlist'] = true;

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
$wgHooks['WatchArticleComplete'][] = 'EchoHooks::onWatch';
$wgHooks['UnwatchArticleComplete'][] = 'EchoHooks::onUnwatch';
$wgHooks['ArticleSaveComplete'][] = 'EchoHooks::onArticleSaved';
$wgHooks['AddNewAccount'][] = 'EchoHooks::onAccountCreated';
$wgHooks['ArticleRollbackComplete'][] = 'EchoHooks::onRollbackComplete';

// Disable ordinary email notifications
$wgHooks['AbortEmailNotification'][] = 'EchoHooks::abortEmailNotification';
// Disable the yellow bar of death
$wgHooks['ArticleEditUpdateNewTalk'][] = 'EchoHooks::abortNewtalkNotification';

// Configuration

$wgEchoDisableStandardEmail = true;

$wgEchoDefaultNotificationTypes = array( // Welcome events do not use subscription, and will only trigger notify, not email.
	'all' => array(
		'notify' => true,
		'email' => true,
	),
	'reverted' => array(
		'notify' => true,
		'email' => false,
	)
);

$wgEchoNotifiers = array(
	'notify' => array( 'EchoNotifier', 'notifyWithNotification' ),
	'email' => array( 'EchoNotifier', 'notifyWithEmail' ),
);

$wgEchoEnabledEvents = array(
	'edit-user-talk',
	'add-comment',
	'add-talkpage-topic',
	'welcome',
	'reverted',
);

// Definitions of the notifications built into Echo
$wgEchoNotificationFormatters = array(
	'edit-user-talk' => array(
		'type' => 'edit',
		'title-message' => 'notification-edit-talk-page',
		'title-params' => array( 'agent', 'difflink', 'user', 'summary' ),
		'email-subject-message' => 'notification-edit-talk-page-email-subject',
		'email-subject-params' => array( 'agent' ),
		'email-body-message' => 'notification-edit-talk-page-email-body',
		'email-body-params' => array( 'agent', 'difflink', 'user', 'summary' ),
		'icon' => 'chat',
	),
	'edit' => array(
		'type' => 'edit',
		'title-message' => 'notification-edit',
		'title-params' => array( 'agent', 'title', 'difflink', 'user', 'summary' ),
		'email-subject-message' => 'notification-edit-email-subject',
		'email-subject-params' => array( 'agent', 'title' ),
		'email-body-message' => 'notification-edit-email-body',
		'email-body-params' => array( 'agent', 'title', 'difflink', 'user', 'summary' ),
		'icon' => 'w',
	),
	'add-comment' => array(
		'type' => 'comment',
		'title-message' => 'notification-add-comment',
		'title-message-yours' => 'notification-add-comment-yours',
		'title-params' => array( 'agent', 'subject', 'title', 'content-page' ),
		'content-message' => 'notification-talkpage-content',
		'content-params' => array( 'commentText' ),
		'icon' => 'chat',
	),
	'add-talkpage-topic' => array(
		'type' => 'comment',
		'title-message' => 'notification-add-talkpage-topic',
		'title-message-yours' => 'notification-add-talkpage-topic-yours',
		'title-params' => array( 'agent', 'subject', 'title', 'content-page' ),
		'content-message' => 'notification-talkpage-content',
		'content-params' => array( 'commentText' ),
		'icon' => 'chat',
	),
	'welcome' => array(
		'type' => 'welcome',
		'title-message' => 'notification-new-user',
		'title-params' => array( 'agent' ),
		'content-message' => 'notification-new-user-content',
		'content-params' => array( 'agent' ),
		'icon' => 'w',
	),
	'reverted' => array(
		'type' => 'edit',
		'title-message' => 'notification-reverted',
		'title-params' => array( 'agent', 'title', 'difflink', 'summary', 'number' ),
		'email-subject-message' => 'notification-reverted-email-subject',
		'email-subject-params' => array( 'agent', 'title', 'summary' ),
		'email-body-message' => 'notification-reverted-email-body',
		'email-body-params' => array( 'agent', 'title', 'difflink', 'user', 'summary' ),
		'icon' => 'revert',
	)
);
