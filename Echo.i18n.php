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
	'notifications' => 'Notifications',
	'echo-specialpage' => 'My notifications',
	'echo-anon' => 'To receive notifications, [[Special:Userlogin/signup|create an account]].',
	'echo-none' => 'You have not received any notifications lately!',

	// Notification
	'notification-edit-talk-page' => '$2 edited your talk page $3',
	'notification-edit' => '$2 edited $3 $4',

	'notification-edit-email-subject' => '{{SITENAME}} notification: $3 has been edited by $2',
	'notification-edit-email-body' => 'Hello $5,
This is a notification to let you know that $2 has edited the {{SITENAME}} page $3.

You can see the changes that $2 made by following this link:
<$4>

You are receiving this message because you have subscribed to email updates for changes to this page.

Thanks for using {{SITENAME}}
The {{SITENAME}} notification system',
	'notification-edit-talk-page-email-subject' => 'Your {{SITENAME}} talk page has been edited by $2',
	'notification-edit-talk-page-email-body' => 'Hello $4,
This is a notification to let you know that $2 has edited your talk page on {{SITENAME}}.

On {{SITENAME}}, your talk page is where other users can leave you messages.

You can see the changes that $2 made at this link:
<$3>

Thanks for using {{SITENAME}}
The {{SITENAME}} notification system',

	// Email notification
	'echo-email-subject-default' => 'New notification at {{SITENAME}}',
	'echo-email-body-default' => 'You have a new notification at {{SITENAME}}:

$1',

	// Notifications overlay
	'echo-link-new' => '$1 new notifications',
	'echo-link-none' => 'My notifications',
	'echo-overlay-link' => 'All notifications…',
	'echo-overlay-title' => 'My notifications',
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
	'notifications' => 'This message is the page title of the special page [[Special:Notifications]].',
	'echo-specialpage' => 'Special page title for Special:Notifications',
	'echo-anon' => 'Error message shown to users who try to visit Special:Notifications as an anon.',
	'echo-none' => 'Message shown to users who have no notifications. Also shown in the overlay.',

	// Notification
	'notification-edit-talk-page' => 'Format for displaying notifications of a user talk page being edited
* $1 is the username of the person who edited, plain text.
* $2 is the username of the person who edited, formatted.
* $3 is a diff link, formatted.',
	'notification-edit' => 'Format for displaying notifications of a page being edited (generally from a watchlist)
* $1 is the username of the person who edited, plain text.
* $2 is the username of the person who edited, formatted.
* $3 is the page that was edited, formatted.
* $4 is a diff link, possibly formatted.',

	// Notifications overlay
	'echo-link-new' => 'Shown in "personal links" when a user has unread notifications.
* $1 is number of unread notifications',
	'echo-link-none' => 'Shown in "personal links" when a user has no unread notifications.',
	'echo-overlay-link' => 'Link to "all notifications" at the bottom of the overlay',
	'echo-overlay-title' => 'Title at the top of the notifications overlay',

	// Email notification
	'echo-email-subject-default' => 'Default subject for Echo email notifications',
	'echo-email-body-default' => 'Default message content for Echo email notifications.
* $1 is a plain text description of the notification.',
);
