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
	'url' => 'http://www.mediawiki.org/wiki/Echo_(notifications)',
	'author' => array(
		'Andrew Garrett',
	),
	'descriptionmsg' => 'echo-desc',
);

$dir = dirname( __FILE__ ) . '/';
$wgExtensionMessagesFiles['Echo'] = $dir . 'Echo.i18n.php';

$wgAutoloadClasses['EchoHooks'] = "$dir/Hooks.php";
$wgAutoloadClasses['EchoSubscription'] = "$dir/model/Subscription.php";
$wgAutoloadClasses['EchoEvent'] = "$dir/model/Event.php";
$wgAutoloadClasses['EchoNotification'] = "$dir/model/Notification.php";

// Formatters
$wgAutoloadClasses['EchoNotificationFormatter'] = "$dir/formatters/NotificationFormatter.php";
$wgAutoloadClasses['EchoBasicFormatter'] = "$dir/formatters/BasicFormatter.php";
$wgAutoloadClasses['EchoEditFormatter'] = "$dir/formatters/EditFormatter.php";

// Internal stuff
$wgAutoloadClasses['EchoNotifier'] = "$dir/Notifier.php";
$wgAutoloadClasses['EchoNotificationController'] = "$dir/controller/NotificationController.php";

// API
$wgAutoloadClasses['ApiEchoNotifications'] = "$dir/api/ApiEchoNotifications.php";
$wgAPIMetaModules['notifications'] = 'ApiEchoNotifications';

// Special page
$wgAutoloadClasses['SpecialNotifications'] = "$dir/special/SpecialNotifications.php";
$wgSpecialPages['Notifications'] = 'SpecialNotifications';

// Housekeeping hooks
$wgHooks['LoadExtensionSchemaUpdates'][] = 'EchoHooks::getSchemaUpdates';
$wgHooks['GetPreferences'][] = 'EchoHooks::getPreferences';

$wgResourceModules += array(
	'ext.echo.special' => array(
		'localBasePath' => "$dir/modules",
		'remoteExtPath' => 'Echo/modules',
		'group' => 'ext.echo',
		'styles' => 'ext.echo.special.css',
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
$wgHooks['EchoGetDefaultNotifiedUsers'] = array('EchoHooks::getDefaultNotifiedUsers');

// Hook appropriate events
$wgHooks['WatchArticleComplete'][] = 'EchoHooks::onWatch';
$wgHooks['UnwatchArticleComplete'][] = 'EchoHooks::onUnwatch';
$wgHooks['ArticleSaveComplete'][] = 'EchoHooks::onArticleSaved';

// Configuration

$wgEchoDefaultNotificationTypes = array(
	'all' => array(
		'notify' => true,
	),
);

$wgEchoNotifiers = array(
	'notify' => array('EchoNotifier', 'notifyWithNotification'),
	'email' => array('EchoNotifier', 'notifyWithEmail'),
);

$wgEchoNotificationFormatters = array(
	'edit-user-talk' => array(
		'type' => 'edit',
		'message-key' => 'notification-edit-talk-page',
		'message-params' => array('agent', 'difflink'),
	),
	'edit' => array(
		'type' => 'edit',
		'message-key' => 'notification-edit',
		'message-params' => array('agent', 'title', 'difflink'),
	),
);