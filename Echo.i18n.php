<?php

// Internationalisation file for Echo extension.

$messages = array();

/**
 * English
 * @author Andrew Garrett
 */
$messages['en'] = array(
	'echo-desc' => 'Next-generation notification infrastructure for MediaWiki',

	// Preferences
	'prefs-echo' => 'Notifications',
	'echo-pref-notify-watchlist' => 'Subscribe me to edit notifications when I add pages to my watchlist.',

	// Errors
	'echo-no-agent' => '[Nobody]',
	'echo-no-title' => '[No Title]',

	// Special:Notifications
	'echo-specialpage' => 'My notifications',
	'echo-anon' => 'To receive notifications, [[Special:Userlogin/signup|create an account]].',

	// Notification
	'notification-edit-talk-page' => '$2 edited your talk page $3',
	'notification-edit' => '$2 edited $3 $4',
);

/**
 * Message documentation
 */
$messages['qqq'] = array(
	'echo-desc' => '{{desc}}',

	// Preferences
	'prefs-echo' => 'Name of preferences section for Echo notifications.',
	'echo-pref-notify-watchlist' => 'Name of a preference which causes
	any changes to your watchlist to be replicated in Echo subscriptions',

	// Errors
	'echo-no-agent' => 'Shown in place of a username in a notification
	if the notification has no specified user.',
	'echo-no-title' => 'Shown in place of a page title in a notification
	if the notification has no specified page title.',

	// Special:Notifications
	'echo-specialpage' => 'Special page title for Special:Notifications',
	'echo-anon' => 'Error message shown to users who try to visit Special:Notifications as an anon.',

	// Notification
	'notification-edit-talk-page' => 'Format for displaying notifications of a user talk page being edited',
	'notification-edit' => 'Format for displaying notifications of a page being edited (generally from a watchlist)',
);
