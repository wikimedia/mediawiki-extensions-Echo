<?php

// Internationalisation file for Echo extension.

$messages = array();

/**
 * English
 * @author Andrew Garrett
 */
$messages['en'] = array(
	'echo-desc' => 'Notifications system',

	// Preferences
	'prefs-echo' => 'Notifications',
	'prefs-displaynotifications' => 'Display options',
	'prefs-emailfrequency' => 'When would you like to receive email notifications?',
	'prefs-echosubscriptions' => 'Notify me about these events',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Email',
	'echo-pref-email-frequency-never' => 'Do not send me any email notifications',
	'echo-pref-email-frequency-immediately' => 'Individual notifications as they come in',
	'echo-pref-email-frequency-daily' => 'A daily summary of notifications',
	'echo-pref-email-frequency-weekly' => 'A weekly summary of notifications',
	'echo-pref-notify-hide-link' => 'Hide the link and badge for notifications in my toolbar',

	// Dismiss interface
	'echo-dismiss-button' => 'Dismiss',
	'echo-dismiss-message' => 'Turn off all $1 notifications',
	'echo-dismiss-prefs-message' => 'You can turn these back on in Preferences',

	// Category titles
	'echo-category-title-edit-user-talk' => 'Talk page post',
	'echo-category-title-article-linked' => 'Page link',
	'echo-category-title-reverted' => 'Edit revert',
	'echo-category-title-mention' => 'Mention',
	'echo-category-title-other' => 'Other',
	'echo-category-title-system' => 'System',

	// Errors
	'echo-no-agent' => '[Nobody]',
	'echo-no-title' => '[No page]',
	'echo-error-no-formatter' => 'No formatting defined for notification',
	'echo-error-preference' => 'Error: Could not set user preference',
	'echo-error-token' => 'Error: Could not retrieve user token',

	// Special:Notifications
	'notifications' => 'Notifications',
	'tooltip-pt-notifications' => 'Your notifications',
	'echo-specialpage' => 'Notifications',
	'echo-anon' => 'To receive notifications, [[Special:Userlogin/signup|create an account]] or [[Special:UserLogin|log in]].',
	'echo-none' => 'You have no notifications.',
	'echo-more-info' => 'More info',

	// Notification
	'echo-quotation-marks' => '"$1"',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|posted}} on your [[User talk:$2|talk page]].',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|posted}} on your [[User talk:$2|talk page]].',
	'notification-page-linked' => '[[$2|$2]] was {{GENDER:$1|linked}} from [[$3|$3]]: [[Special:WhatLinksHere/$2|See all links to this page]]',
	'notification-page-linked-flyout' => '$2 was {{GENDER:$1|linked}} from $3: [[Special:WhatLinksHere/$2|See all links to this page]]',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|commented}} on "[[$3|$2]]" on the "$4" talk page',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|posted}} a new topic "$2" on [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|sent}} you a message: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|commented}} on "[[$3#$2|$2]]" on your talk page',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|mentioned}} you on [[$3#$2|$3]].',
	'notification-mention-flyout' => '$1 {{GENDER:$1|mentioned}} you on [[$3#$2|$3]].',
	'notification-user-rights' => 'Your user rights [[Special:Log/rights/$1|were {{GENDER:$1|changed}}]] by [[User:$1|$1]]. $2. [[Special:ListGroupRights|Learn more]]',
	'notification-user-rights-flyout' => 'Your user rights were {{GENDER:$1|changed}} by $1. $2. [[Special:ListGroupRights|Learn more]]',
	'notification-user-rights-add' => 'You are now a member of {{PLURAL:$2|this group|these groups}}: $1',
	'notification-user-rights-remove' => 'You are no longer a member of {{PLURAL:$2|this group|these groups}}: $1',
	'notification-talkpage-content' => '$1', ## Do not translate unless you deliberately want to change behaviour
	'notification-new-user' => "Welcome to {{SITENAME}}, $1! We're glad you're here.",
	'notification-reverted2' => 'Your {{PLURAL:$4|edit on [[$2]] has|edits on [[$2]] have}} been {{GENDER:$1|reverted}} by [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => 'Your {{PLURAL:$4|edit on $2 has|edits on $2 have}} been {{GENDER:$1|reverted}} by $1 $3',
	'notification-edit-talk-page-email-subject2' => 'You have a new talkpage message',
	'notification-edit-talk-page-email-body2' => '{{SITENAME}} user $1 {{GENDER:$1|posted}} on your talk page:

$3

View more:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|posted}} on your talk page',
	'notification-page-linked-email-subject' => 'A page you started was linked on {{SITENAME}}',
	'notification-page-linked-email-body' => '$2 was {{GENDER:$1|linked}} from $4

See all links to this page:

{{canonicalurl:{{#special:WhatLinksHere/$2}}}}

$3',
	'notification-page-linked-email-batch-body' => '$2 was {{GENDER:$1|linked}} from $3',
	'notification-reverted-email-subject2' => 'Your {{PLURAL:$3|edit on $2 was|edits on $2 were}} {{GENDER:$1|reverted}} by $1',
	'notification-reverted-email-body2' => 'Your {{PLURAL:$7|edit on $2 has been|edits on $2 have been}} {{GENDER:$1|reverted}} by $1.

$5

View more:

$3

$6',
	'notification-reverted-email-batch-body2' => 'Your {{PLURAL:$3|edit on $2 was|edits on $2 were}} {{GENDER:$1|reverted}} by $1',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|mentioned}} you on {{SITENAME}}',
	'notification-mention-email-body' => '{{SITENAME}} user $1 {{GENDER:$1|mentioned}} you on $2.

$3

View more:

$4

$5',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|mentioned}} you on $2',
	'notification-user-rights-email-subject' => 'Your user rights have changed on {{SITENAME}}',
	'notification-user-rights-email-body' => 'Your user rights were {{GENDER:$1|changed}} by $1. $2

View more:

{{canonicalurl:{{#special:ListGroupRights}}}}

$3',
	'notification-user-rights-email-batch-body' => 'Your user rights were {{GENDER:$1|changed}} by $1. $2',
	'echo-notification-count' => '$1+',
	// Email notification
	'echo-email-subject-default' => 'New notification at {{SITENAME}}',
	'echo-email-body-default' => 'You have a new notification at {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'You have a new notification',
	'echo-email-footer-default' => '$2

To control which emails we send you, visit:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	// Notifications overlay
	'echo-link-new' => '$1 new {{PLURAL:$1|notification|notifications}}',
	'echo-link' => 'Notifications',
	'echo-overlay-link' => 'All notifications',
	'echo-overlay-title' => 'Notifications',
	'echo-overlay-title-overflow' => 'Notifications (showing $1 of $2 unread)',

	// Special page
	'echo-date-today' => 'Today',
	'echo-date-yesterday' => 'Yesterday',
	'echo-date-header' => '$1 $2',
	'echo-load-more-error' => 'An error occurred while fetching more results.',

	// Bundle
	'notification-edit-talk-page-bundle' => '$1 and $3 {{PLURAL:$4|other|others}} {{GENDER:$1|posted}} on your [[User talk:$2|talk page]].',
	'notification-page-linked-bundle' => '$2 was {{GENDER:$1|linked}} from $3 and $4 other {{PLURAL:$5|page|pages}}. [[Special:WhatLinksHere/$2|See all links to this page]]',

	// Email batch
	'echo-email-batch-separator' => '________________________________________________', # only translate this message to other languages if you have to change it
	'echo-email-batch-bullet' => '•', # only translate this message to other languages if you have to change it
	'echo-email-batch-subject-daily' => 'You have $1 {{PLURAL:$2|notification|notifications}} today',
	'echo-email-batch-subject-weekly' => 'You have $1 {{PLURAL:$2|notification|notifications}} this week',
	'echo-email-batch-body-daily' => '$1,

You have $2 {{PLURAL:$3|notification|notifications}} on {{SITENAME}} today.  View them here:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,

You have $2 {{PLURAL:$3|notification|notifications}} on {{SITENAME}} this week.  View them here:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-category-header' => '$1 $2 {{PLURAL:$1|notification|notifications}}',
);

/** Message documentation (Message documentation)
 * @author Amire80
 * @author Beta16
 * @author Kghbln
 * @author Krenair
 * @author Minh Nguyen
 * @author Nike
 * @author Raymond
 * @author Shirayuki
 * @author Siebrand
 * @author Toliño
 */
$messages['qqq'] = array(
	'echo-desc' => '{{desc|name=Echo|url=http://www.mediawiki.org/wiki/Extension:Echo}}',
	'prefs-echo' => 'Name of preferences section for Echo notifications.
{{Identical|Notification}}',
	'prefs-displaynotifications' => 'Header for the section of preferences that deals with how notifications are displayed',
	'prefs-emailfrequency' => 'Header for the section of preferences that deals with how often notification emails are sent out
* {{msg-mw|Echo-pref-email-frequency-never}}
* {{msg-mw|Echo-pref-email-frequency-immediately}}
* {{msg-mw|Echo-pref-email-frequency-daily}}
* {{msg-mw|Echo-pref-email-frequency-weekly}}',
	'prefs-echosubscriptions' => 'Header for the section of preferences that deals with which notifications the user receives',
	'echo-pref-web' => 'Label for list of notifications which are delivered on the web. In other words, on the wiki itself rather by email or another method. This should be kept very short.',
	'echo-pref-email' => 'Label for list of notifications which are delivered via email. This should be kept very short.',
	'echo-pref-email-frequency-never' => "Option for users who don't want to receive any email notifications

See also:
* {{msg-mw|Echo-pref-email-frequency-immediately}}
* {{msg-mw|Echo-pref-email-frequency-daily}}
* {{msg-mw|Echo-pref-email-frequency-weekly}}",
	'echo-pref-email-frequency-immediately' => 'Option for users who want to receive email for each notification as it occurs',
	'echo-pref-email-frequency-daily' => 'Option for users who want to receive a daily digest of email notifications',
	'echo-pref-email-frequency-weekly' => 'Option for users who want to receive a weekly digest of email notifications',
	'echo-pref-notify-hide-link' => "Label for a preference which disables the 'Notifications' link in the header and associated fly-out panel",
	'echo-dismiss-button' => 'Text for the button that dismisses a notification type. Keep this short.
{{Identical|Dismiss}}',
	'echo-dismiss-message' => 'Message asking the user if they want to turn off all notifications of a certain type. Parameters:
* $1 - the name of the type; one of the following:
** {{msg-mw|Echo-category-title-edit-user-talk}}
** {{msg-mw|Echo-category-title-article-linked}}
** {{msg-mw|Echo-category-title-reverted}}
** {{msg-mw|Echo-category-title-mention}}
** {{msg-mw|Echo-category-title-other}}
** {{msg-mw|Echo-category-title-system}}',
	'echo-dismiss-prefs-message' => 'Used in Dismiss interface.',
	'echo-category-title-edit-user-talk' => 'This is a short title for notification category. Used as <code>$1</code> in {{msg-mw|Echo-dismiss-message}} and <code>$2</code> in {{msg-mw|Echo-email-batch-category-header}}.',
	'echo-category-title-article-linked' => 'This is a short title for notification category. Used as <code>$1</code> in {{msg-mw|Echo-dismiss-message}} and <code>$2</code> in {{msg-mw|Echo-email-batch-category-header}}.',
	'echo-category-title-reverted' => 'This is a short title for notification category. Used as <code>$1</code> in {{msg-mw|Echo-dismiss-message}} and <code>$2</code> in {{msg-mw|Echo-email-batch-category-header}}.',
	'echo-category-title-mention' => 'This is a short title for notification category. Used as <code>$1</code> in {{msg-mw|Echo-dismiss-message}} and <code>$2</code> in {{msg-mw|Echo-email-batch-category-header}}.',
	'echo-category-title-other' => 'This is a short title for notification category.

Used as <code>$1</code> in {{msg-mw|Echo-dismiss-message}} and <code>$2</code> in {{msg-mw|Echo-email-batch-category-header}}.
{{Identical|Other}}',
	'echo-category-title-system' => 'This is a short title for notification category. Used as <code>$1</code> in {{msg-mw|Echo-dismiss-message}} and <code>$2</code> in {{msg-mw|Echo-email-batch-category-header}}.
{{Identical|System}}',
	'echo-no-agent' => 'Shown in place of a username in a notification
	if the notification has no specified user.',
	'echo-no-title' => 'Shown in place of a page title in a notification if the notification has no specified page title.',
	'echo-error-no-formatter' => "Error message displayed when no formatting has been defined for a notification. In other words, the extension doesn't know how to properly display the notification.",
	'echo-error-preference' => 'Error message displayed when request to set user preference fails',
	'echo-error-token' => 'Error message displayed when request to get user token fails',
	'notifications' => '{{doc-special|Notifications}}
{{Identical|Notification}}',
	'tooltip-pt-notifications' => 'This is used for the title (mouseover text) of the notifications user tool.',
	'echo-specialpage' => 'Special page title for Special:Notifications.
{{Identical|Notification}}',
	'echo-anon' => 'Error message shown to users who try to visit Special:Notifications as an anon.',
	'echo-none' => 'Message shown to users who have no notifications. Also shown in the overlay.',
	'echo-more-info' => 'This is used for the title (mouseover text) of an icon that links to a page with more information about the Echo extension.',
	'echo-quotation-marks' => 'Puts the edit summary in quotation marks. Only translate if different than English.',
	'notification-edit-talk-page2' => "Format for displaying notifications of a user talk page being edited
* $1 is the username of the person who edited, plain text. Can be used for GENDER.
* $2 is the current user's name, used in the link to their talk page.
See also:
* {{msg-mw|Notification-edit-talk-page-flyout2}}
* {{msg-mw|Notification-add-talkpage-topic2}}",
	'notification-edit-talk-page-flyout2' => "Flyout-specific format for displaying notifications of a user talk page being edited
* $1 is the username of the person who edited, plain text. Can be used for GENDER.
* $2 is the current user's name, used in the link to their talk page.
See also:
* {{msg-mw|Notification-edit-talk-page2}}
* {{msg-mw|Notification-add-talkpage-topic2}}",
	'notification-page-linked' => 'Format for displaying notifications of articles being linked
* $1 is the username of the person who linked the page, plain text. Can be used for GENDER.
* $2 is the page being linked
* $3 is the page linked from
See also:
* {{msg-mw|Notification-page-linked-flyout}}
* {{msg-mw|Notification-page-linked-email-batch-body}}
* {{msg-mw|Notification-page-linked-email-subject}}
* {{msg-mw|Notification-page-linked-email-body}}',
	'notification-page-linked-flyout' => 'Flyout-specific format for displaying notifications of articles being linked
* $1 is the username of the person who linked the page, plain text. Can be used for GENDER.
* $2 is the page being linked
* $3 is the page linked from
See also:
* {{msg-mw|Notification-page-linked}}
* {{msg-mw|Notification-page-linked-email-batch-body}}
* {{msg-mw|Notification-page-linked-email-subject}}
* {{msg-mw|Notification-page-linked-email-body}}',
	'notification-add-comment2' => 'Format for displaying notifications of a comment being added to an existing discussion. Parameters:
* $1 is the username of the person who edited, plain text. Can be used for GENDER.
* $2 is the section title of the discussion,
* $3 is a link to a page and section,
* $4 is the page on which the discussion exists, plain text.
See also:
* {{msg-mw|Notification-add-comment-yours2}}',
	'notification-add-talkpage-topic2' => 'Format for displaying notifications of a new discussion being added
* $1 is the username of the person who edited, plain text. Can be used for GENDER.
* $2 is the section title of the discussion.
* $3 is the page on which the discussion was added, plain text.
See also:
* {{msg-mw|Notification-edit-talk-page2}}
* {{msg-mw|Notification-edit-talk-page-flyout2}}',
	'notification-add-talkpage-topic-yours2' => 'Parameters:
* $1 is a username, plain text. Can be used for GENDER.
* $2 is a page section
* $3 is a page title.',
	'notification-add-comment-yours2' => 'Parameters:
* $1 is a username, plain text. Can be used for GENDER.
* $2 Discussion name;
* $3 link to user talk page.
See also:
* {{msg-mw|Notification-add-comment2}}',
	'notification-mention' => "Format for displaying notifications of a comment including a link to another user's user page. Parameters:
* $1 - the username of the person who edited, plain text. Can be used for GENDER
* $2 - the section title of the discussion
* $3 - the page title of the discussion",
	'notification-mention-flyout' => "Flyout-specific format for displaying notifications of a comment including a link to another user's user page.
Parameters:
* $1 - the username of the person who mentioned you, plain text. Can be used for GENDER.
* $2 - the section title of the discussion
* $3 - the page title of the discussion",
	'notification-user-rights' => 'Format for displaying notifications of a user right change in notification page.  Parameters:
* $1 is the username of the person who made the user right change.  Can be used for GENDER support
* $2 is a semicolon separated list of {{msg-mw|notification-user-rights-add}}, {{msg-mw|notification-user-rights-remove}}',
	'notification-user-rights-flyout' => 'Format for displaying notifications of a user right change in notification flyout.  Parameters:
* $1 - the username of the person who made the user right change.  Can be used for GENDER support
* $2 - a semicolon separated list of {{msg-mw|notification-user-rights-add}}, {{msg-mw|notification-user-rights-remove}}',
	'notification-user-rights-add' => 'Message indicating that a user was added to a user group.  Parameters:
* $1 is a comma separated list of user group names
* $2 is the number of user groups, this is used for PLURAL support',
	'notification-user-rights-remove' => 'Message indicating that a user was removed from a user group.  Parameters:
* $1 is a comma separated list of user group names
* $2 is the number of user groups, this is used for PLURAL support',
	'notification-talkpage-content' => 'Message shown as the "content" of a talkpage-related action.
* $1 is the content of the talk page post.

{{optional}}',
	'notification-new-user' => 'Text of the welcome notification. Parameters:
* $1 - the name of the new user
See also:
* {{msg-mw|Guidedtour-tour-gettingstarted-start-title}}',
	'notification-reverted2' => "Format for displaying notifications of a user's edit being reverted.
* $1 is the username of the person who reverted, plain text. Can be used for GENDER.
* $2 is the page that was reverted, formatted.
* $3 is a diff link to the ''revert'', possibly formatted.
* $4 is the number of edits that were reverted. NOTE: This will only be set to 1 or 2, with 2 actually meaning 'an unknown number greater than 0'.
{{Related|Notification-reverted}}",
	'notification-reverted-flyout2' => "Flyout-specific format for displaying notifications of a user's edit being reverted.
* $1 is the username of the person who reverted, plain text. Can be used for GENDER.
* $2 is the page that was reverted, formatted.
* $3 is a diff link to the ''revert'', possibly formatted.
* $4 is the number of edits that were reverted. NOTE: This will only be set to 1 or 2, with 2 actually meaning 'an unknown number greater than 0'.
{{Related|Notification-reverted}}",
	'notification-edit-talk-page-email-subject2' => 'E-mail subject.',
	'notification-edit-talk-page-email-body2' => 'E-mail notification. Parameters:
* $1 is a username
* $2 is a link to a change
* $3 is the edit summary.
* $4 is the e-mail footer, {{msg-mw|echo-email-footer-default}}',
	'notification-edit-talk-page-email-batch-body2' => 'E-mail notification for talk page edit
* $1 is a username',
	'notification-page-linked-email-subject' => 'E-mail subject.
See also:
* {{msg-mw|Notification-page-linked}}
* {{msg-mw|Notification-page-linked-flyout}}
* {{msg-mw|Notification-page-linked-email-batch-body}}
* {{msg-mw|Notification-page-linked-email-body}}',
	'notification-page-linked-email-body' => 'E-mail notification. Parameters:
* $1 is the username of the person who linked the page, plain text.  Can be used for GENDER.
* $2 is the page being linked.
* $3 is the e-mail footer, {{msg-mw|echo-email-footer-default}}.
* $4 is the page linked from
See also:
* {{msg-mw|Notification-page-linked}}
* {{msg-mw|Notification-page-linked-flyout}}
* {{msg-mw|Notification-page-linked-email-batch-body}}
* {{msg-mw|Notification-page-linked-email-subject}}',
	'notification-page-linked-email-batch-body' => 'E-mail notification for page being linked. Parameters:
* $1 is the username of the person who linked the page, plain text. Can be used for GENDER.
* $2 is the page being linked.
* $3 is the page linked from
See also:
* {{msg-mw|Notification-page-linked}}
* {{msg-mw|Notification-page-linked-flyout}}
* {{msg-mw|Notification-page-linked-email-subject}}
* {{msg-mw|Notification-page-linked-email-body}}',
	'notification-reverted-email-subject2' => 'E-mail subject. Parameters:
* $1 is a username
* $2 is a page title
* $3 is the number of revert
{{Related|Notification-reverted}}',
	'notification-reverted-email-body2' => "E-mail notification. Parameters:
* $1 is the username
* $2 is the page title
* $3 is the link to the change
* $4 is the e-mail recipient's username
* $5 is the edit summary
* $6 is the email footer, {{msg-mw|echo-email-footer-default}}
* $7 is the number of revert
{{Related|Notification-reverted}}",
	'notification-reverted-email-batch-body2' => 'E-mail notification for page revert. Parameters:
* $1 is a username
* $2 is a page title
* $3 is the number of revert
{{Related|Notification-reverted}}',
	'notification-mention-email-subject' => 'E-mail subject. Parameters:
* $1 is a username',
	'notification-mention-email-body' => 'E-mail notification. Parameters:
* $1 is a username, plaintext.  Can be used for gender support
* $2 is talk page title
* $3 is the edit summary
* $4 is the link to the talk page section title
* $5 is the email footer',
	'notification-mention-email-batch-body' => 'E-mail notification batch body.  Parameters:
* $1 is a username, plaintext.  Can be used for gender support
* $2 is talk page title',
	'notification-user-rights-email-subject' => 'E-mail subject  for user rights notification',
	'notification-user-rights-email-body' => 'E-mail notification.  Parameters:
* $1 - a user name, plaintext.  Can be used for gender support
* $2 - a semicolon separated list of {{msg-mw|notification-user-rights-add}}, {{msg-mw|notification-user-rights-remove}}
* $3 - the email footer',
	'notification-user-rights-email-batch-body' => 'Email notification batch body.  Parameters:
* $1 is a user name, plaintext.  Can be used for gender support
* $2 is a semicolon separated list of {{msg-mw|notification-user-rights-add}}, {{msg-mw|notification-user-rights-remove}}',
	'echo-notification-count' => '{{optional}}
The new notification count next to notification link, for example: 99+
* $1 is the count',
	'echo-email-subject-default' => 'Default subject for Echo e-mail notifications',
	'echo-email-body-default' => 'Default message content for Echo e-mail notifications.
* $1 is a plain text description of the notification.',
	'echo-email-batch-body-default' => 'Default message for Echo e-mail digest notifications',
	'echo-email-footer-default' => 'Default footer content for Echo e-mail notifications.  Parameters:
* $1 is the address of the organization that sent the e-mail
* $2 is "-------..." ({{msg-mw|echo-email-batch-separator}})',
	'echo-link-new' => 'Shown in "personal links" when a user has unread notifications.
* $1 is number of unread notifications',
	'echo-link' => 'Shown in "personal links" when a user has JS. New notifications are indicated with a badge.
{{Identical|Notification}}',
	'echo-overlay-link' => 'Link to "all notifications" at the bottom of the overlay.
{{Identical|All notifications}}',
	'echo-overlay-title' => 'Title at the top of the notifications overlay.
{{Identical|Notification}}',
	'echo-overlay-title-overflow' => 'Title at the top of the notifications overlay when there are additional unread notifications that are not being shown. Parameters:
* $1 - the number of unread notifications being shown
* $2 - the total number of unread notifications that exist
{{Identical|Notification}}',
	'echo-date-today' => "The header text for today's notification section",
	'echo-date-yesterday' => "The header text for yesterday's notification section",
	'echo-date-header' => '{{optional}}
The header text for each notification section which is grouped by date
* $1 is the month, it could be {{msg-mw|january-gen}}, {{msg-mw|february-gen}}, {{msg-mw|march-gen}}, {{msg-mw|april-gen}}, {{msg-mw|may-gen}}, {{msg-mw|june-gen}}, {{msg-mw|july-gen}}, {{msg-mw|august-gen}}, {{msg-mw|september-gen}}, {{msg-mw|october-gen}}, {{msg-mw|november-gen}}, {{msg-mw|december-gen}}
* $2 is the date of a month, eg 21',
	'echo-load-more-error' => 'Error message for errors in loading more notifications',
	'notification-edit-talk-page-bundle' => 'Bundled message for edit-user-talk notification.  Parameters:
* $1 - the username who performs the action, which can be used for gender support
* $2 - the username
* $3 - the count of other action performers, could be number or {{msg-mw|echo-notification-count}}, eg, 7 others or 99+ others
* $4 - a number used for plural support',
	'notification-page-linked-bundle' => 'Bundled message for page-linked notification.  Parameters:
* $1 - the username who performs the action, which can be used for gender support
* $2 - the page title
* $3 - the page linked from
* $4 - the count of other action performers, could be number or {{msg-mw|echo-notification-count}}, eg, 7 others or 99+ others
* $5 - a number used for plural support',
	'echo-email-batch-separator' => '{{optional}}
Email batch content separator',
	'echo-email-batch-bullet' => '{{optional}}',
	'echo-email-batch-subject-daily' => 'Daily e-mail batch subject.
* $1 could be a numeric count or "10+". See also: {{msg-mw|echo-notification-count|optional message|notext=1}}.
* $2 is a numeric count, this is used for plural support
See also:
* {{msg-mw|Echo-email-batch-subject-weekly}}',
	'echo-email-batch-subject-weekly' => 'Weekly e-mail batch subject.
* $1 could be a numeric count or "10+". See also: {{msg-mw|echo-notification-count|optional message|notext=1}}
* $2 is a numeric count, this is used for plural support
See also:
* {{msg-mw|Echo-email-batch-subject-daily}}',
	'echo-email-batch-body-daily' => 'Daily e-mail batch body. Parameters:
* $1 is a username
* $2 could be a numeric count or "10+". See also: {{msg-mw|echo-notification-count|optional message|notext=1}}.
* $3 is a numeric count, this is used for plural support
* $4 is the e-mail batch content separated by "-------..." ({{msg-mw|echo-email-batch-separator}})
* $5 is the e-mail footer, {{msg-mw|echo-email-footer-default}}
See also:
* {{msg-mw|Echo-email-batch-body-weekly}}',
	'echo-email-batch-body-weekly' => 'Weekly e-mail batch body. Parameters:
* $1 is a username
* $2 could be a numeric count or "10+". See also: {{msg-mw|echo-notification-count|optional message|notext=1}}.
* $3 is a numeric count, this is used for plural support
* $4 is the e-mail batch content separated by "--------..." ({{msg-mw|echo-email-batch-separator}})
* $5 is the e-mail footer, {{msg-mw|echo-email-footer-default}}
See also:
* {{msg-mw|Echo-email-batch-body-daily}}',
	'echo-email-batch-category-header' => 'E-mail digest section title. Parameters:
* $1 - the numeric count
* $2 - the name of the type; one of the following:
** {{msg-mw|Echo-category-title-edit-user-talk}}
** {{msg-mw|Echo-category-title-article-linked}}
** {{msg-mw|Echo-category-title-reverted}}
** {{msg-mw|Echo-category-title-mention}}
** {{msg-mw|Echo-category-title-other}}
** {{msg-mw|Echo-category-title-system}}',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'echo-no-agent' => '[Niemand]',
	'echo-no-title' => '[Geen titel]', # Fuzzy
	'notifications' => 'Kennisgewings',
	'echo-specialpage' => 'My kennisgewings',
);

/** Arabic (العربية)
 * @author Meno25
 * @author Mido
 * @author Zanatos
 */
$messages['ar'] = array(
	'notifications' => 'إخطارات',
	'echo-specialpage' => 'إخطاراتي',
	'echo-link' => 'إخطاراتي',
	'echo-overlay-title' => 'إخطاراتي',
);

/** South Azerbaijani (تورکجه)
 * @author Mousa
 */
$messages['azb'] = array(
	'echo-desc' => 'بیلدیریش سیستِمی',
	'prefs-echo' => 'بیلدیریلر',
	'prefs-displaynotifications' => 'گؤرونتو سئچَنکلری',
	'prefs-emailsubscriptions' => 'بیر کس بو ایشی گؤرنده منی ایمیل ایله بیلدیر',
	'prefs-emailfrequency' => 'نئچه واختدان بیر من ایمیل ایله بیلدیری آلیرام', # Fuzzy
	'echo-pref-email-edit-user-talk' => 'منیم دانیشیق صحیفه‌مه یازیر',
	'echo-pref-email-reverted' => 'منیم دَییشیکلیکلریمی قایتار',
	'echo-pref-email-frequency-never' => 'منه هئچ بیلدیری ایمیلی گؤندرمه',
	'echo-pref-email-frequency-immediately' => 'آیری آیری هر بیلدیری گلنده',
	'echo-pref-email-frequency-daily' => 'گونلوک بیلدیریلرین بیر خولاصه‌سی',
	'echo-pref-email-frequency-weekly' => 'هفته‌لیک بیلدیریلرین بیر خولاصه‌سی',
	'echo-pref-notify-hide-link' => 'بیلدیریلرین باغلانتی و نیشانینی منیم آراج‌چوبوغومدان گیزلت',
	'echo-no-agent' => '[هئچ کیمسه]',
	'echo-no-title' => '[هئچ صحیفه]',
	'echo-error-no-formatter' => 'بیلدیری اوچون بیر فورمت تعریفی یوخدور',
	'notifications' => 'بیلدیریلر',
	'echo-specialpage' => 'منیم بیلدیریلریم',
	'echo-anon' => 'بیلدیریلری آلماق اوچون، [[Special:Userlogin/signup|بیر حساب یارادین]] یادا [[Special:UserLogin|گیریش ائدین]].',
	'echo-none' => 'سیزین بیلدیرینیز یوخدور.',
	'notification-new-user' => '{{SITENAME}}-ه خوش گلمیسینیز، $1!',
	'notification-new-user-content' => 'لوطفاً دانیشیق صحیفه‌لرینده یوروملارینیزی ۴ تیلدا (~~~~) ایله ایمضالاماغی اونوتمایین.',
	'echo-email-subject-default' => '{{SITENAME}}-ده یئنی بیلدیری',
	'echo-email-body-default' => 'سیزین {{SITENAME}}-ده یئنی بیلدیرینیز واردیر:

$1',
	'echo-email-footer-default' => '$2

سیزه هانکی ایمیل‌لرین گله بیله‌جگینی دَییشمگه، باخین:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 یئنی {{PLURAL:$1|بیلدیری}}',
	'echo-link' => 'بیلدیریلر',
	'echo-overlay-link' => 'بوتون بیلدیریلر',
	'echo-overlay-title' => 'منیم بیلدیریلریم',
	'echo-overlay-title-overflow' => 'منیم بیلدیریلریم ($2 اوخونمامیشدان $1-ی گؤستریلیر)',
	'echo-date-today' => 'بوگون',
	'echo-date-yesterday' => 'دونن',
	'echo-load-more-error' => 'آرتیق نتیجه‌لری گتیرنده بیر خطا قاباغا گلدی.',
	'echo-email-batch-subject-daily' => 'سیزین بوگون $1 {{PLURAL:$2|بیلدیرینیز}} واردیر',
	'echo-email-batch-subject-weekly' => 'سیزین بو هفته $1 {{PLURAL:$2|بیلدیرینیز}} واردیر',
	'echo-email-batch-body-daily' => '$1،

سیزین بوگون {{SITENAME}}-ده $2 {{PLURAL:$3|بیلدیرینیز}} واردیر. اونلارا بوردان باخین:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1،

سیزین بو هفته {{SITENAME}}-ده $2 {{PLURAL:$3|بیلدیرینیز}} واردیر. اونلارا بوردان باخین:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-category-header-edit-user-talk' => '$1 دانیشیق صحیفه {{PLURAL:$1|مئساژی}}',
	'echo-email-batch-category-header-edit-revert' => '$1 دَییشیکلیک {{PLURAL:$1|قایتاریلماسی}}',
	'echo-email-batch-category-header-other' => '$1 {{PLURAL:$1|آیری}}',
);

/** Bashkir (башҡортса)
 * @author Ләйсән
 */
$messages['ba'] = array(
	'prefs-echo' => 'Белдереүҙәр',
	'notifications' => 'Белдереүҙәр',
	'tooltip-pt-notifications' => 'Һеҙҙең белдереүҙәр',
	'echo-specialpage' => 'Минең белдереүҙәр',
	'echo-link' => 'Белдереүҙәр',
	'echo-overlay-link' => 'Бөтә белдереүҙәр',
	'echo-overlay-title' => 'Минең белдереүҙәр',
);

/** Belarusian (Taraškievica orthography) (беларуская (тарашкевіца)‎)
 * @author Base
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'echo-desc' => 'Сыстэма апавяшчэньняў',
	'prefs-echo' => 'Абвесткі',
	'prefs-displaynotifications' => 'Налады паказу',
	'prefs-emailfrequency' => 'Калі вы хочаце атрымліваць абвесткі праз e-mail?',
	'prefs-echosubscriptions' => 'Паведамляць мне, калі нехта…',
	'echo-pref-web' => 'Праз сайт',
	'echo-pref-email' => 'Праз пошту',
	'echo-pref-subscription-edit-user-talk' => 'Запісы на маёй старонцы гутарак',
	'echo-pref-subscription-article-linked' => 'Робіць спасылку на створаную мною старонку',
	'echo-pref-subscription-reverted' => 'Скасоўвае маю праўку',
	'echo-pref-subscription-mention' => 'Згадвае мяне',
	'echo-pref-email-frequency-never' => 'Не дасылаць мне абвестак праз e-mail',
	'echo-pref-email-frequency-immediately' => 'Асобна кожнае, калі зьяўляецца',
	'echo-pref-email-frequency-daily' => 'Штодзённая зборка абвестак',
	'echo-pref-email-frequency-weekly' => 'Штотыднёвая зборка абвестак',
	'echo-pref-notify-hide-link' => 'Схаваць спасылку і значак пра абвесткі ў маёй панэлі інструмэнтаў',
	'echo-dismiss-button' => 'Схаваць',
	'echo-dismiss-message' => 'Выключыць усе апавяшчэньні пра $1',
	'echo-dismiss-prefs-message' => 'Вы можаце ўключыць іх зноў у наладах',
	'echo-dismiss-title-edit-user-talk' => 'запісы ў гутарках',
	'echo-dismiss-title-article-linked' => 'спасыланьні на старонкі',
	'echo-dismiss-title-reverted' => 'скасаваньні правак',
	'echo-dismiss-title-mention' => 'Згадваньне',
	'echo-no-agent' => '[Ніхто]',
	'echo-no-title' => '[Няма старонкі]',
	'echo-error-no-formatter' => 'Фарматаваньне для абвестак ня вызначана',
	'echo-error-preference' => 'Памылка: не ўдалося захаваць наладу',
	'echo-error-token' => 'Памылка: не ўдалося атрымаць токен удзельніка',
	'notifications' => 'Абвесткі',
	'tooltip-pt-notifications' => 'Вашыя абвесткі',
	'echo-specialpage' => 'Мае абвесткі',
	'echo-anon' => 'Для атрыманьня абвестак [[Special:Userlogin/signup|стварыце рахунак]] або [[Special:UserLogin|увайдзіце]].',
	'echo-none' => 'Вы ня маеце абвестак.',
	'echo-more-info' => 'Болей',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|напісаў|напісала}} на вашую [[User talk:$2|старонку гутарак]].',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|напісаў|напісала}} на вашую [[User talk:$2|старонку гутарак]].',
	'notification-article-linked2' => '[[User:$1|$1]] {{GENDER:$1|спаслаўся|спаслалася}} на {{PLURAL:$4|старонку|старонкі}} $3 з гэтай старонкі: [[$2]]',
	'notification-article-linked-flyout2' => '$1 {{GENDER:$1|спаслаўся|спаслалася}} на {{PLURAL:$4|старонку «$3»|старонкі $3}} з гэтай старонкі: [[$2]]',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|пакінуў|пакінула}} камэнтар у тэме «[[$3|$2]]» на старонцы абмеркаваньня «$4»',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|стварыў|стварыла}} новую тэму «$2» у [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|даслаў|даслала}} вам паведамленьне: «[[$3#$2|$2]]»',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|пакінуў|пакінула}} камэнтар у тэме «[[$3#$2|$2]]» на вашай старонцы гутарак',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|згадаў|згадала}} вас на [[$3#$2|$3]].',
	'notification-mention-flyout' => '$1 {{GENDER:$1|згадаў|згадала}} вас на [[$3#$2|$3]].',
	'notification-new-user' => 'Вітаем у {{GRAMMAR:месны|{{SITENAME}}}}, $1!',
	'notification-new-user-content' => 'Будзьце ласкавыя падпісваць свае камэнтары на старонках абмеркаваньняў чатырма тыльдамі (~~~~).',
	'notification-reverted2' => '[[User:$1|$1]] {{GENDER:$1|скасаваў|скасавала}} {{PLURAL:$4|вашую праўку|вашыя праўкі}} на старонцы [[$2]] $3',
	'notification-reverted-flyout2' => '$1 {{GENDER:$1|скасаваў|скасавала}} {{PLURAL:$4|вашую праўку|вашыя праўкі}} на старонцы $2 $3',
	'notification-edit-talk-page-email-subject2' => 'Вы маеце новае паведамленьне на старонцы гутарак',
	'notification-edit-talk-page-email-body2' => '{{GENDER:$1|Удзельнік|Удзельніца}} {{GRAMMAR:родны|{{SITENAME}}}} {{GENDER:$1|напісаў|напісала}} вам на старонку гутарак:

$3

Падрабязьней:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|напісаў|напісала}} вам на старонку гутарак',
	'notification-article-linked-email-subject2' => 'На {{PLURAL:$2|старонку, створаную|старонкі, створаныя}} вамі ў {{GRAMMAR:месны|{{SITENAME}}}}, зрабілі спасылку',
	'notification-article-linked-email-body2' => '$1, {{GENDER:$1|удзельнік|удзельніца}} {{GRAMMAR:родны|{{SITENAME}}}}, {{GENDER:$1|спаслаўся|спаслалася}} на {{PLURAL:$5|старонку «$4»|старонкі $4}} з бачыны «$2».

Даведацца болей:

$3

$6',
	'notification-article-linked-email-batch-body2' => '$1 {{GENDER:$1|спаслаўся|спаслалася}} на {{PLURAL:$3|«$2»|$2}}.',
	'notification-reverted-email-subject2' => '$1 {{GENDER:$1|скасаваў|скасавала}} {{PLURAL:$3|вашую праўку|вашыя праўкі}} ў «$2»',
	'notification-reverted-email-body2' => '$1 {{GENDER:$1|скасаваў|скасавала}} {{PLURAL:$7|вашую праўку|вашыя праўкі}} ў «$2».

$5

Падрабязьней:

$3

$6',
	'notification-reverted-email-batch-body2' => '$1 {{GENDER:$1|скасаваў|скасавала}} {{PLURAL:$3|вашую праўку|вашыя праўкі}} ў «$2»',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|згадаў|згадала}} вас у {{GRAMMAR:месны|{{SITENAME}}}}',
	'notification-mention-email-body' => '{{GENDER:$1|Удзельнік|Удзельніца}} {{GRAMMAR:родны|{{SITENAME}}}} $1 {{GENDER:$1|згадаў|згадала}} вас у $2.

$3

Падрабязьней:

$4

$5',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|згадаў|згадала}} вас на $2',
	'echo-email-subject-default' => 'Новая абвестка ад {{GRAMMAR:родны|{{SITENAME}}}}',
	'echo-email-body-default' => 'Для вас ёсьць новая абвестка ў {{GRAMMAR:месны|{{SITENAME}}}}:

$1',
	'echo-email-footer-default' => '$2

Каб выбраць, якія лісты мы будзем дасылаць вам, наведайце:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|новая абвестка|новыя абвесткі|новых абвестак}}',
	'echo-link' => 'Абвесткі',
	'echo-overlay-link' => 'Усе абвесткі',
	'echo-overlay-title' => 'Мае абвесткі',
	'echo-overlay-title-overflow' => 'Мае абвесткі (паказаныя $1 з $2)',
	'echo-date-today' => 'Сёньня',
	'echo-date-yesterday' => 'Учора',
	'echo-date-header' => '$2 $1',
	'echo-load-more-error' => 'Узьнікла памылка ў час атрыманьня дадатковых вынікаў.',
	'echo-email-batch-subject-daily' => 'Сёньня вы атрымалі $1 {{PLURAL:$2|абвестку|абвесткі|абвестак}}',
	'echo-email-batch-subject-weekly' => 'На гэтым тыдні вы атрымалі $1 {{PLURAL:$2|абвестку|абвесткі|абвестак}}',
	'echo-email-batch-body-daily' => '$1,

Сёньня ў {{GRAMMAR:месны|{{SITENAME}}}} для вас маецца $2 {{PLURAL:$3|апавяшчэньне|апавяшчэньні|апавяшчэньняў}}. Праверыць іх можна тут:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,

На гэтым тыдні ў {{GRAMMAR:месны|{{SITENAME}}}} вы маеце $2 {{PLURAL:$3|апавяшчэньне|апавяшчэньні|апавяшчэньняў}}. Праверыць іх можна тут:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-category-header-edit-user-talk' => '$1 {{PLURAL:$1|паведамленьне|паведамленьні|паведамленьняў}} на старонцы абмеркаваньняў',
	'echo-email-batch-category-header-reverted' => '{{PLURAL:$1|Адкочаная $1 праўка|Адкочаныя $1 праўкі|Адкочаныя $1 правак}}',
	'echo-email-batch-category-header-article-linked' => 'Спасыланьні на $1 {{PLURAL:$1|старонку|старонкі|старонак}}',
	'echo-email-batch-category-header-mention' => '$1 {{PLURAL:$1|згадка|згадкі|згадак}}',
	'echo-email-batch-category-header-other' => '$1 {{PLURAL:$1|некатэгарызаваная абвестка|некатэгарызаваныя абвесткі|некатэгарызаваных абвестак}}',
	'echo-email-batch-category-header-system' => '$1 {{PLURAL:$1|сыстэмная абвестка|сыстэмныя абвесткі|сыстэмных абвестак}}',
);

/** Bulgarian (български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'prefs-echo' => 'Известия',
	'echo-pref-web' => 'Уеб',
	'echo-pref-email' => 'Е-поща',
	'notifications' => 'Известия',
	'tooltip-pt-notifications' => 'Вашите известия',
	'echo-specialpage' => 'Моите известия',
	'echo-more-info' => 'Повече информация',
	'echo-link' => 'Известия',
	'echo-overlay-link' => 'Всички известия',
	'echo-overlay-title' => 'Моите известия',
	'echo-overlay-title-overflow' => 'Моите известия (показване на $1 от $2 непрочетени)',
	'echo-date-today' => 'Днес',
	'echo-date-yesterday' => 'Вчера',
	'echo-load-more-error' => 'Възникна грешка при извличане на още резултати.',
);

/** Breton (brezhoneg)
 * @author Fohanno
 * @author Fulup
 * @author Y-M D
 */
$messages['br'] = array(
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Postel',
	'echo-pref-email-frequency-never' => 'Arabat kas posteloù kemenn din',
	'echo-dismiss-button' => 'Disteurel',
	'echo-no-agent' => '[Den]',
	'echo-no-title' => '[Diditl]', # Fuzzy
	'notifications' => 'Kemennoù',
	'tooltip-pt-notifications' => 'Ho kemennoù',
	'echo-specialpage' => "Ma c'hemennoù",
	'echo-more-info' => "Gouzout hiroc'h",
	'notification-new-user' => 'Degemer mat er {{SITENAME}}, $1!',
	'echo-link-new' => '$1 {{PLURAL:$1|kemenn|kemenn}} nevez', # Fuzzy
	'echo-link' => 'Kemennoù',
	'echo-overlay-link' => 'An holl gemennoù',
	'echo-overlay-title' => "Ma c'hemennoù",
	'echo-overlay-title-overflow' => "Va c'hemennoù (o tiskouez $1 diwar $2 nann-lennet)",
	'echo-date-today' => 'Hiziv',
	'echo-date-yesterday' => "Dec'h",
	'echo-email-batch-subject-daily' => '$1 kemenn{{PLURAL:$2||}} nevez hiziv', # Fuzzy
	'echo-email-batch-subject-weekly' => '$1 kemenn{{PLURAL:$2||}} nevez ar sizhun-mañ', # Fuzzy
	'echo-email-batch-category-header-other' => '$1 {{PLURAL:$1|all|all}}', # Fuzzy
);

/** Catalan (català)
 * @author Pitort
 * @author පසිඳු කාවින්ද
 */
$messages['ca'] = array(
	'echo-desc' => 'Sistema de notificacions',
	'prefs-echo' => 'Notificacions',
	'prefs-displaynotifications' => 'Opcions de visualització',
	'prefs-emailsubscriptions' => "Avisa'm per e-mail quan algú",
	'notifications' => 'Notificacions',
	'tooltip-pt-notifications' => 'Les vostres modificacions',
	'echo-specialpage' => 'Les meves notificacions',
	'echo-none' => 'No heu rebut cap notificació',
	'echo-more-info' => 'Més informació',
	'echo-email-subject-default' => 'Notificació de nou a {{SITENAME}}',
	'echo-email-body-default' => 'Teniu una nova notificació a {{SITENAME}}:

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nova notificació|noves notificacions}}',
	'echo-link' => 'Notificacions',
	'echo-overlay-link' => 'Totes les notificacions',
	'echo-overlay-title' => 'Les meves notificacions',
	'echo-overlay-title-overflow' => 'Les meves notificacions (mostrant $1 de $2 no llegides)',
	'echo-date-today' => 'Avui',
	'echo-date-yesterday' => 'Ahir',
	'echo-load-more-error' => "S'ha produït un error en obtenir més resultats.",
	'echo-email-batch-subject-daily' => "Teniu $1 {{PLURAL:$2|notificació|notificacions}} d'avui",
	'echo-email-batch-subject-weekly' => "Teniu $1 {{PLURAL:$2|notificació|notificacions}} d'aquesta setmana",
	'echo-email-batch-category-header-edit-user-talk' => '$1 pàgina de discussió {{PLURAL:$1|missatge|missatges}}',
);

/** Sorani Kurdish (کوردی)
 * @author Calak
 */
$messages['ckb'] = array(
	'echo-pref-email' => 'ئیمەیل',
);

/** Czech (česky)
 * @author Chmee2
 * @author Jkjk
 * @author Mormegil
 * @author Vks
 */
$messages['cs'] = array(
	'echo-desc' => 'Notifikační systém',
	'prefs-echo' => 'Upozornění',
	'prefs-displaynotifications' => 'Možnosti zobrazení',
	'prefs-emailfrequency' => 'Kdy chcete dostávat e-mailová upozornění?',
	'prefs-echosubscriptions' => 'Upozorněte mě, když…',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-mail',
	'echo-pref-subscription-edit-user-talk' => '…někdo napíše do mé diskuse',
	'echo-pref-subscription-article-linked' => '…někdo odkáže na stránku, kterou jsem založil',
	'echo-pref-subscription-reverted' => '…někdo vrátí moje úpravy',
	'echo-pref-subscription-mention' => '…mě někdo zmíní',
	'echo-pref-email-frequency-never' => 'Neposílejte mi žádná upozornění e-mailem',
	'echo-pref-email-frequency-immediately' => 'Jednotlivá upozornění, jakmile se objeví',
	'echo-pref-email-frequency-daily' => 'Denní souhrn upozornění',
	'echo-pref-email-frequency-weekly' => 'Týdenní souhrn upozornění',
	'echo-pref-notify-hide-link' => 'Skrýt odkaz a štítek upozornění v uživatelském panelu',
	'echo-dismiss-button' => 'Zavřít',
	'echo-dismiss-message' => 'Vypnout všechna upozornění na $1',
	'echo-dismiss-prefs-message' => 'Znovu zapnout si je můžete v Nastavení',
	'echo-category-title-edit-user-talk' => 'příspěvek v diskusi',
	'echo-category-title-page-linked' => 'Odkaz na stránku',
	'echo-category-title-reverted' => 'vrácené úpravy',
	'echo-category-title-mention' => 'zmínku',
	'echo-category-title-other' => 'jiné události',
	'echo-category-title-system' => 'systémové události',
	'echo-no-agent' => '[Nikdo]',
	'echo-no-title' => '[Žádná stránka]',
	'echo-error-no-formatter' => 'Upozornění nemá definováno formátování',
	'echo-error-preference' => 'Chyba: Nepodařilo se uložit uživatelské nastavení',
	'echo-error-token' => 'Chyba: Nepodařilo se získat uživatelský token',
	'notifications' => 'Upozornění',
	'tooltip-pt-notifications' => 'Vaše upozornění',
	'echo-specialpage' => 'Upozornění',
	'echo-anon' => 'Pro zobrazování upozornění je nutné [[Special:Userlogin/signup|vytvořit si účet]] nebo [[Special:UserLogin|se přihlásit]].',
	'echo-none' => 'Nemáte žádné upozornění.',
	'echo-more-info' => 'Více informací',
	'notification-new-user' => 'Vítá vás {{SITENAME}}, $1!', # Fuzzy
	'echo-email-subject-default' => 'Nové upozornění na {{grammar:6sg|{{SITENAME}}}}',
	'echo-email-body-default' => 'Na {{grammar:6sg|{{SITENAME}}}} máte nové upozornění:

$1',
	'echo-email-footer-default' => '$2

Pro nastavení e-mailů, které vám máme posílat, navštivte:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nové upozornění|nová upozornění|nových upozornění}}',
	'echo-link' => 'Upozornění',
	'echo-overlay-link' => 'Všechna upozornění',
	'echo-overlay-title' => 'Upozornění',
	'echo-overlay-title-overflow' => 'Upozornění (zobrazuje se $1 z $2 nepřečtených)',
	'echo-date-today' => 'Dnes',
	'echo-date-yesterday' => 'Včera',
	'echo-load-more-error' => 'Při načítání dalších výsledků došlo k chybě.',
	'echo-email-batch-subject-daily' => 'Dnes máte $1 {{PLURAL:$2|upozornění}}',
	'echo-email-batch-subject-weekly' => 'Tento týden máte $1 {{PLURAL:$2|upozornění}}',
	'echo-email-batch-category-header' => '$1 {{PLURAL:$1|upozornění}} na $2',
);

/** Danish (dansk)
 * @author Christian List
 * @author Tjernobyl
 */
$messages['da'] = array(
	'prefs-echo' => 'Meddelelser',
	'prefs-emailsubscriptions' => 'Giv mig besked via e-mail, når nogen',
	'echo-no-agent' => '[Ingen]',
	'echo-no-title' => '[Ingen side]',
	'notifications' => 'Meddelelser',
	'echo-specialpage' => 'Mine meddelelser',
	'echo-link' => 'Meddelelser',
	'echo-overlay-link' => 'Alle meddelelser',
	'echo-overlay-title' => 'Mine meddelelser',
	'echo-overlay-title-overflow' => 'Mine meddelelser (viser $1 af $2 ulæste)',
	'echo-date-today' => 'I dag',
	'echo-date-yesterday' => 'I går',
);

/** German (Deutsch)
 * @author Kghbln
 * @author Metalhead64
 */
$messages['de'] = array(
	'echo-desc' => 'Ermöglicht ein Benachrichtigungssystem',
	'prefs-echo' => 'Benachrichtigungen',
	'prefs-displaynotifications' => 'Anzeigeoptionen',
	'prefs-emailfrequency' => 'Wann möchtest du E-Mail-Benachrichtigungen erhalten?',
	'prefs-echosubscriptions' => 'Benachrichtige mich, wenn jemand …',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-Mail',
	'echo-pref-subscription-edit-user-talk' => 'Nachrichten auf meiner Diskussionsseite hinterlässt',
	'echo-pref-subscription-article-linked' => 'Verlinkungen zu einer von mir erstellten Seite vornimmt',
	'echo-pref-subscription-reverted' => 'Bearbeitungen von mir rückgängig macht',
	'echo-pref-subscription-mention' => 'mich erwähnt',
	'echo-pref-email-frequency-never' => 'Keine Benachrichtigungen',
	'echo-pref-email-frequency-immediately' => 'Individuelle Benachrichtigung zu jedem Ereignis',
	'echo-pref-email-frequency-daily' => 'Tägliche Benachrichtigung zu den Ereignissen',
	'echo-pref-email-frequency-weekly' => 'Wöchentliche Benachrichtigung zu den Ereignissen',
	'echo-pref-notify-hide-link' => 'Den Link sowie das Symbol für Benachrichtigungen nicht in meiner Benutzerleiste anzeigen',
	'echo-dismiss-button' => 'Ausblenden',
	'echo-dismiss-message' => 'Alle „$1“-Benachrichtigungen abschalten',
	'echo-dismiss-prefs-message' => 'Du kannst dies in deinen Einstellungen wieder aktivieren',
	'echo-category-title-edit-user-talk' => 'Diskussionsseitennachricht',
	'echo-category-title-page-linked' => 'Seite verlinkt',
	'echo-category-title-reverted' => 'Bearbeitung rückgängig gemacht',
	'echo-category-title-mention' => 'Erwähnung',
	'echo-category-title-other' => 'Andere',
	'echo-category-title-system' => 'System',
	'echo-no-agent' => '[Niemand]',
	'echo-no-title' => '[Keine Seite]',
	'echo-error-no-formatter' => 'Keine Formatierung zur Benachrichtigung definiert',
	'echo-error-preference' => 'Fehler: Benutzereinstellung konnte nicht festgelegt werden.',
	'echo-error-token' => 'Fehler: Benutzertoken konnte nicht abgerufen werden',
	'notifications' => 'Benachrichtigungen',
	'tooltip-pt-notifications' => 'Deine Benachrichtigungen',
	'echo-specialpage' => 'Benachrichtigungen',
	'echo-anon' => 'Um Benachrichtigungen erhalten zu können, muss man ein [[Special:Userlogin/signup|Benutzerkonto anlegen]] oder sich [[Special:UserLogin|anmelden]].',
	'echo-none' => 'Du hast keine Benachrichtigungen.',
	'echo-more-info' => 'Mehr Informationen',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|hinterließ}} eine Nachricht auf deiner [[User talk:$2|Diskussionsseite]].',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|hinterließ}} eine Nachricht auf deiner [[User talk:$2|Diskussionsseite]].',
	'notification-page-linked' => '[[$2|$2]] wurde von der Seite [[$3|$3]] {{GENDER:$1|verlinkt}}: [[Special:WhatLinksHere/$2|Alle Links auf diese Seite ansehen]]',
	'notification-page-linked-flyout' => '$2 wurde von der Seite $3 {{GENDER:$1|verlinkt}}: [[Special:WhatLinksHere/$2|Alle Links auf diese Seite ansehen]]',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|kommentierte}} auf „[[$3|$2]]“ auf der Diskussionsseite von „$4“',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|startete}} das neue Thema „$2“ auf [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] hat dir eine Nachricht {{GENDER:$1|gesandt}}: „[[$3#$2|$2]]“',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|kommentierte}} auf „[[$3#$2|$2]]“ auf deiner Diskussionsseite',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|erwähnte}} dich auf „[[$3#$2|$3]]“.',
	'notification-mention-flyout' => '$1 {{GENDER:$1|erwähnte}} dich auf „[[$3#$2|$3]]“.',
	'notification-user-rights' => 'Deine Benutzerrechte wurden von [[User:$1|$1]] {{GENDER:$1|geändert}}. $2. [[Special:ListGroupRights|Mehr erfahren]]',
	'notification-user-rights-flyout' => 'Deine Benutzerrechte wurden von $1 {{GENDER:$1|geändert}}. $2. [[Special:ListGroupRights|Mehr erfahren]]',
	'notification-user-rights-add' => 'Du bist jetzt Mitglied dieser {{PLURAL:$2|Gruppe|Gruppen}}: $1',
	'notification-user-rights-remove' => 'Du bist nicht länger Mitglied dieser {{PLURAL:$2|Gruppe|Gruppen}}: $1',
	'notification-new-user' => 'Willkommen bei {{SITENAME}}, $1! Wir freuen uns, dass du hier bist.',
	'notification-reverted2' => 'Deine {{PLURAL:$4|Bearbeitung an der Seite [[$2]] wurde|Bearbeitungen an der Seite [[$2]] wurden}} von [[User:$1|$1]] {{GENDER:$1|rückgängig}} gemacht. $3',
	'notification-reverted-flyout2' => 'Deine {{PLURAL:$4|Bearbeitung an der Seite $2 wurde|Bearbeitungen an der Seite $2 wurden}} von $1 {{GENDER:$1|rückgängig}} gemacht. $3',
	'notification-edit-talk-page-email-subject2' => 'Du hast eine neue Diskussionsseitennachricht',
	'notification-edit-talk-page-email-body2' => '{{GENDER:$1|Der {{SITENAME}}-Benutzer|Die {{SITENAME}}-Benutzerin}} $1 hinterließ eine Nachricht auf deiner Diskussionsseite:

$3

Mehr:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|hinterließ}} eine Nachricht auf deiner Diskussionsseite',
	'notification-page-linked-email-subject' => 'Eine Seite, die du angelegt hast, wurde auf {{SITENAME}} verlinkt',
	'notification-page-linked-email-body' => '$2 wurde von der Seite $4 {{GENDER:$1|verlinkt}}.

Alle Links auf diese Seite ansehen:

{{canonicalurl:{{#special:WhatLinksHere/$2}}}}

$3',
	'notification-page-linked-email-batch-body' => '$2 wurde von der Seite $3 {{GENDER:$1|verlinkt}}',
	'notification-reverted-email-subject2' => 'Deine {{PLURAL:$3|Bearbeitung an der Seite $2 wurde|Bearbeitungen an der Seite $2 wurden}} von $1 {{GENDER:$1|rückgängig}} gemacht',
	'notification-reverted-email-body2' => 'Deine {{PLURAL:$7|Bearbeitung an der Seite $2 wurde|Bearbeitungen an der Seite $2 wurden}} von $1 {{GENDER:$1|rückgängig}} gemacht.

$5

Mehr:

$3

$6',
	'notification-reverted-email-batch-body2' => 'Deine {{PLURAL:$3|Bearbeitung an der Seite $2 wurde|Bearbeitungen an der Seite $2 wurden}} von $1 {{GENDER:$1|rückgängig}} gemacht',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|erwähnte}} dich auf {{SITENAME}}',
	'notification-mention-email-body' => '{{GENDER:$1|Der {{SITENAME}}-Benutzer|Die {{SITENAME}}-Benutzerin}} $1 hat dich auf der Seite „$2“ erwähnt.

$3

Mehr:

$4

$5',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|erwähnte}} dich auf „$2“',
	'notification-user-rights-email-subject' => 'Deine Benutzerrechte auf {{SITENAME}} wurden geändert.',
	'notification-user-rights-email-body' => 'Deine Benutzerrechte wurden von $1 {{GENDER:$1|geändert}}. $2

Mehr ansehen:

{{canonicalurl:{{#special:ListGroupRights}}}}

$3',
	'notification-user-rights-email-batch-body' => 'Deine Benutzerrechte wurden von $1 {{GENDER:$1|geändert}}. $2',
	'echo-email-subject-default' => 'Neue Benachrichtigung auf {{SITENAME}}',
	'echo-email-body-default' => 'Es gibt eine neue Benachrichtigung auf {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Du hast eine neue Benachrichtigung',
	'echo-email-footer-default' => '$2

Um zu kontrollieren, welche E-Mails wir dir senden, besuche bitte:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 neue {{PLURAL:$1|Benachrichtigung|Benachrichtigungen}}',
	'echo-link' => 'Benachrichtigungen',
	'echo-overlay-link' => 'Alle Benachrichtigungen',
	'echo-overlay-title' => 'Benachrichtigungen',
	'echo-overlay-title-overflow' => 'Benachrichtigungen ($1 von $2 ungelesenen werden angezeigt)',
	'echo-date-today' => 'Heute',
	'echo-date-yesterday' => 'Gestern',
	'echo-load-more-error' => 'Beim Abrufen mehrerer Ergebnisse ist ein Fehler aufgetreten.',
	'notification-edit-talk-page-bundle' => '$1 und {{PLURAL:$4|ein weiterer Benutzer|$3 weitere Benutzer}} {{GENDER:$1|hinterließen}} Nachrichten auf deiner [[User talk:$2|Diskussionsseite]].',
	'notification-page-linked-bundle' => '$2 wurde von $3 und {{PLURAL:$5|einer weiteren Seite|$4 weiteren Seiten}} {{GENDER:$1|verlinkt}}. [[Special:WhatLinksHere/$2|Alle Links auf diese Seite ansehen]]',
	'echo-email-batch-subject-daily' => 'Du hast heute {{PLURAL:$2|eine Benachrichtigung|$1 Benachrichtigungen}}',
	'echo-email-batch-subject-weekly' => 'Du hast diese Woche {{PLURAL:$2|eine Benachrichtigung|$1 Benachrichtigungen}}',
	'echo-email-batch-body-daily' => '$1,

du hast heute {{PLURAL:$3|eine Benachrichtigung|$2 Benachrichtigungen}} auf {{SITENAME}}. Sehe sie hier ein:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,

du hast diese Woche {{PLURAL:$3|eine Benachrichtigung|$2 Benachrichtigungen}} auf {{SITENAME}}. Sehe sie hier ein:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-category-header' => '$1 „$2“-{{PLURAL:$1|Benachrichtigung|Benachrichtigungen}}',
);

/** German (formal address) (Deutsch (Sie-Form)‎)
 * @author Kghbln
 */
$messages['de-formal'] = array(
	'prefs-emailfrequency' => 'Wann möchten Sie E-Mail-Benachrichtigungen erhalten?',
	'prefs-echosubscriptions' => 'Benachrichtigen Sie mich, wenn jemand …',
	'echo-none' => 'Sie haben in letzter Zeit keine Benachrichtigungen erhalten.', # Fuzzy
);

/** Zazaki (Zazaki)
 * @author Erdemaslancan
 * @author Mirzali
 */
$messages['diq'] = array(
	'prefs-echo' => 'Tebliği',
	'echo-no-title' => '[Pele Çıniya]',
	'notifications' => 'Tebliği',
	'echo-specialpage' => 'Tebliğê me',
	'echo-link' => 'Tebliği',
	'echo-overlay-link' => 'Tebliği pêro...', # Fuzzy
	'echo-overlay-title' => 'Tebliğê me',
);

/** Greek (Ελληνικά)
 * @author Aitolos
 * @author Glavkos
 * @author Protnet
 * @author ZaDiak
 */
$messages['el'] = array(
	'echo-desc' => 'Σύστημα ειδοποιήσεων',
	'prefs-echo' => 'Ειδοποιήσεις',
	'prefs-displaynotifications' => 'Επιλογές εμφάνισης',
	'prefs-emailfrequency' => 'Πόσο συχνά λαμβάνω ειδοποιήσεις μέσω ηλεκτρονικού ταχυδρομείου', # Fuzzy
	'prefs-echosubscriptions' => 'Ειδοποιήστε με όταν κάποιος...',
	'echo-pref-web' => 'Διαδίκτυο',
	'echo-pref-email' => 'Ηλεκτρονικό Ταχυδρομείο',
	'echo-pref-subscription-edit-user-talk' => 'Δημοσιεύσεις στη σελίδα συζήτησής μου',
	'echo-pref-subscription-article-linked' => 'Δημιουργεί σύνδεσμο με μια σελίδα που δημιούργησα',
	'echo-pref-subscription-reverted' => 'Αναστρέφει την επεξεργασία μου',
	'echo-pref-email-frequency-never' => 'Μην μου στέλνετε ειδοποιήσεις μέσω ηλεκτρονικού ταχυδρομείου',
	'echo-pref-email-frequency-daily' => 'Μια ημερήσια σύνοψη ειδοποιήσεων',
	'echo-pref-email-frequency-weekly' => 'Μια εβδομαδιαία σύνοψη ειδοποιήσεων',
	'echo-dismiss-title-edit-user-talk' => 'Ανάρτηση σελίδας συζήτησης',
	'echo-no-agent' => '[Κανένας]',
	'echo-no-title' => '[Χωρίς σελίδα]',
	'notifications' => 'Ειδοποιήσεις',
	'tooltip-pt-notifications' => 'Οι ειδοποιήσεις σας',
	'echo-specialpage' => 'Οι ειδοποιήσεις μου',
	'echo-anon' => 'Για να λαμβάνετε ειδοποιήσεις, [[Special:Userlogin/signup|δημιουργήστε ένα λογαριασμό]] ή [[Special:UserLogin|συνδεθείτε]].',
	'echo-none' => 'Δεν έχετε ειδοποιήσεις.',
	'notification-new-user' => 'Καλώς ήρθατε στο {{SITENAME}}, $1!',
	'echo-email-subject-default' => 'Νέα ειδοποίηση στο {{SITENAME}}',
	'echo-link' => 'Οι ειδοποιήσεις μου', # Fuzzy
	'echo-overlay-link' => 'Όλες οι ειδοποιήσεις...', # Fuzzy
	'echo-overlay-title' => 'Οι ειδοποιήσεις μου',
	'echo-date-today' => 'Σήμερα',
	'echo-date-yesterday' => 'Χθες',
	'echo-email-batch-category-header-other' => '$1 {{PLURAL:$1|άλλος|άλλοι}}',
);

/** British English (British English)
 * @author Shirayuki
 */
$messages['en-gb'] = array(
	'echo-email-batch-category-header-other' => '$1 uncategorised {{PLURAL:$1|notification|notifications}}',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'echo-no-agent' => '[Neniu]',
	'echo-no-title' => '[Sen Paĝo]',
	'notification-new-user' => 'Bonvenon al {{SITENAME}}, $1!',
	'echo-email-body-default' => 'Vi havas novan noton ĉe {{SITENAME}}:

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nova noto|novaj notoj}}',
	'echo-link' => 'Miaj notoj', # Fuzzy
	'echo-overlay-link' => 'Ĉiuj notoj...', # Fuzzy
	'echo-overlay-title' => 'Miaj notoj',
	'echo-date-today' => 'Hodiaŭ',
	'echo-date-yesterday' => 'Hieraŭ',
	'echo-email-batch-category-header-edit-user-talk' => '$1 Diskuto-paĝo {{PLURAL:$1|mesaĝo|mesaĝoj}}',
	'echo-email-batch-category-header-edit-revert' => '$1 {{PLURAL:$1|malfaro de redakto|malfaroj de redaktoj}}',
	'echo-email-batch-category-header-other' => '{{PLURAL:$1|Alia|$1 Aliaj}}',
);

/** Spanish (español)
 * @author Armando-Martin
 * @author Fitoschido
 * @author Invadinado
 * @author Ralgis
 * @author TheBITLINK
 * @author Vivaelcelta
 */
$messages['es'] = array(
	'echo-desc' => 'Sistema de notificaciones',
	'prefs-echo' => 'Notificaciones',
	'prefs-displaynotifications' => 'Opciones de visualización',
	'prefs-emailfrequency' => '¿Con qué frecuencia recibo notificaciones por correo electrónico?', # Fuzzy
	'prefs-echosubscriptions' => 'Notificarme cuando alguien…',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Correo electrónico',
	'echo-pref-subscription-edit-user-talk' => 'Publique en mi página de discusión',
	'echo-pref-subscription-article-linked' => 'Cree un enlace a una página que yo creé',
	'echo-pref-subscription-reverted' => 'Revierte mi edición',
	'echo-pref-email-frequency-never' => 'No me envíes notificaciones por correo electrónico',
	'echo-pref-email-frequency-immediately' => 'Enviarme las notificaciones individuales en cuanto lleguen',
	'echo-pref-email-frequency-daily' => 'Un resumen diario de notificaciones',
	'echo-pref-email-frequency-weekly' => 'Un resumen semanal de las notificaciones',
	'echo-pref-notify-hide-link' => 'Ocultar el enlace y la insignia para las notificaciones en mi barra de herramientas',
	'echo-dismiss-button' => 'Ocultar',
	'echo-no-agent' => '[Nadie]',
	'echo-no-title' => '[No hay ninguna página]',
	'echo-error-no-formatter' => 'Sin formato definido para notificaciones',
	'echo-error-preference' => '<b>Error:</b> No se pudo establecer $1.', # Fuzzy
	'notifications' => 'Notificaciones',
	'tooltip-pt-notifications' => 'Notificaciones',
	'echo-specialpage' => 'Mis notificaciones',
	'echo-anon' => 'Para recibir notificaciones, [[Special:Userlogin/signup|crea una cuenta]] o [[Special:UserLogin|inicia sesión]].',
	'echo-none' => 'No tienes notificaciones',
	'echo-more-info' => 'Más información',
	'notification-new-user' => '¡Bienvenido a {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Recuerda firmar cualquier comentario en las páginas de discusión con 4 tildes (~ ~ ~ ~).',
	'echo-email-subject-default' => 'Nueva notificación en {{SITENAME}}',
	'echo-email-body-default' => 'Tienes una nueva notificación en {{SITENAME}}:

$1',
	'echo-email-footer-default' => '$2

Para controlar los emails que te enviamos, visita:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|notificación nueva|notificaciones nuevas}}',
	'echo-link' => 'Notificaciones',
	'echo-overlay-link' => 'Todas las notificaciones',
	'echo-overlay-title' => 'Mis notificaciones',
	'echo-overlay-title-overflow' => 'Notificaciones: (Mostrando $1 de $2 sin leer)',
	'echo-date-today' => 'Hoy',
	'echo-date-yesterday' => 'Ayer',
	'echo-load-more-error' => 'Se ha producido un error al intentar obtener más resultados.',
	'echo-email-batch-subject-daily' => 'Hoy tienes $1 {{PLURAL:$2|notificación|notificaciones}}',
	'echo-email-batch-subject-weekly' => 'Esta semana tienes $1 {{PLURAL:$2|notificación|notificaciones}}',
	'echo-email-batch-body-daily' => '$1,

Hoy tienes $2 {{PLURAL:$3|notificación|notificaciones}} en {{SITENAME}}. Verlas aquí:
{canonicalurl: {{#special:Notifications}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,

Esta semana tienes $2 {{PLURAL:$3|notificación|notificaciones}} en {{SITENAME}}. Verlas aquí:
{canonicalurl: {{#special:Notifications}}}

$4

$5',
	'echo-email-batch-category-header-edit-user-talk' => '$1 {{PLURAL:$1|mensaje|mensajes}} en la página de discusión',
	'echo-email-batch-category-header-edit-revert' => 'Editar $1 {{PLURAL:$1|edición revertida|ediciones revertidas}}',
	'echo-email-batch-category-header-other' => '$1 {{PLURAL:$1|Otro|Otros}}',
);

/** Estonian (eesti)
 * @author Avjoska
 * @author Pikne
 */
$messages['et'] = array(
	'prefs-echo' => 'Teavitused',
	'prefs-displaynotifications' => 'Kuvaseaded',
	'echo-pref-subscription-reverted' => 'Tühistab mu muudatuse',
	'echo-no-agent' => '[Eikeegi]',
	'echo-no-title' => '[Lehekülge pole]',
	'notifications' => 'Teavitused',
	'echo-specialpage' => 'Teavitused',
	'echo-anon' => 'Et teavitusi saada, [[Special:Userlogin/signup|loo konto]] või [[Special:UserLogin|logi sisse]].',
	'notification-new-user' => 'Tere tulemast saidile {{SITENAME}}, $1!', # Fuzzy
	'echo-link-new' => '$1 {{PLURAL:$1|uus teavitus|uut teavitust}}',
	'echo-link' => 'Teavitused',
	'echo-overlay-link' => 'Kõik teavitused',
	'echo-overlay-title' => 'Teavitused',
	'echo-date-today' => 'Täna',
	'echo-date-yesterday' => 'Eile',
);

/** Persian (فارسی)
 * @author Mjbmr
 */
$messages['fa'] = array(
	'prefs-echo' => 'اعلامیه‌ها',
	'prefs-displaynotifications' => 'گزینه‌های نمایش',
	'echo-no-agent' => '[هیچ کس]',
	'echo-no-title' => '[بدون عنوان]', # Fuzzy
	'echo-email-body-default' => 'شما در {{SITENAME}} اعلان جدید دارید:

$1',
	'echo-link' => 'اعلامیه‌های من', # Fuzzy
	'echo-overlay-link' => 'همهٔ اعلامیه‌ها...', # Fuzzy
	'echo-overlay-title' => 'اعلامیه‌های من',
	'echo-date-today' => 'امروز',
	'echo-date-yesterday' => 'دیروز',
);

/** Finnish (suomi)
 * @author Crt
 * @author Nedergard
 * @author Nike
 * @author Silvonen
 * @author VezonThunder
 */
$messages['fi'] = array(
	'echo-desc' => 'Ilmoitusjärjestelmä',
	'prefs-echo' => 'Ilmoitukset',
	'prefs-displaynotifications' => 'Näyttöasetukset',
	'prefs-emailfrequency' => 'Kuinka usein saan sähköposti-ilmoituksia', # Fuzzy
	'echo-pref-subscription-reverted' => 'Kumoaa muokkaukseni',
	'echo-pref-email-frequency-never' => 'Älä lähetä minulle sähköposti-ilmoituksia',
	'echo-pref-email-frequency-immediately' => 'Yksittäisiä ilmoituksia niiden tullessa',
	'echo-pref-email-frequency-daily' => 'Päivittäinen yhteenveto ilmoituksista',
	'echo-pref-email-frequency-weekly' => 'Viikottainen yhteenveto ilmoituksista',
	'echo-pref-notify-hide-link' => 'Piilota linkki ja merkki työkalupalkkini ilmoituksissa',
	'echo-no-agent' => '[Ei kukaan]',
	'echo-no-title' => '[Ei sivua]',
	'echo-error-no-formatter' => 'Ilmoitukselle ei ole määritetty muotoilua',
	'notifications' => 'Ilmoitukset',
	'echo-specialpage' => 'Ilmoitukset',
	'echo-anon' => 'Jos haluat saada ilmoituksia, [[Special:Userlogin/signup|luo käyttäjätunnus]] tai [[Special:UserLogin|kirjaudu sisään]].',
	'echo-none' => 'Ei uusia ilmoituksia.',
	'notification-new-user' => 'Tervetuloa sivustolle {{SITENAME}}, $1!', # Fuzzy
	'echo-email-subject-default' => 'Uusi ilmoitus sivustolla {{SITENAME}}',
	'echo-email-body-default' => 'Sinulle on uusi ilmoitus sivustolla {{SITENAME}}:

$1',
	'echo-email-footer-default' => '$2

Hallitaksesi sitä, mitä sähköposteja lähetämme sinulle, käy sivulla:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|uusi ilmoitus|uutta ilmoitusta}}',
	'echo-link' => 'Ilmoitukset',
	'echo-overlay-link' => 'Kaikki ilmoitukset',
	'echo-overlay-title' => 'Ilmoitukset',
	'echo-overlay-title-overflow' => 'Ilmoitukset (näytetään $1/$2 lukematonta)',
	'echo-date-today' => 'Tänään',
	'echo-date-yesterday' => 'Eilen',
	'echo-load-more-error' => 'Virhe haettaessa lisää tuloksia.',
	'echo-email-batch-subject-daily' => 'Sinulle on $1 {{PLURAL:$2|ilmoitus|ilmoitusta}} tänään',
	'echo-email-batch-subject-weekly' => 'Sinulle on $1 {{PLURAL:$2|ilmoitus|ilmoitusta}} tällä viikolla',
	'echo-email-batch-body-daily' => '$1,

Sinulle on $2 {{PLURAL:$3|ilmoitus|ilmoitusta}} sivustolla {{SITENAME}} tänään. Katso ne täällä:

$4

$5',
	'echo-email-batch-body-weekly' => '$1,

Sinulle on $2 {{PLURAL:$3|ilmoitus|ilmoitusta}} sivustolla {{SITENAME}} tällä viikolla. Katso ne täällä:

$4

$5',
);

/** French (français)
 * @author Crochet.david
 * @author DavidL
 * @author Gomoko
 * @author Hello71
 * @author IAlex
 * @author Jean-Frédéric
 * @author Metroitendo
 * @author Peter17
 * @author Tititou36
 * @author Wyz
 */
$messages['fr'] = array(
	'echo-desc' => 'Système de notifications',
	'prefs-echo' => 'Notifications',
	'prefs-displaynotifications' => "Options d'affichage",
	'prefs-emailfrequency' => 'Quand aimeriez-vous recevoir les notifications par courriel ?',
	'prefs-echosubscriptions' => 'Me prévenir lorsque quelqu’un…',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Courriel',
	'echo-pref-subscription-edit-user-talk' => 'Messages sur ma page de discussion',
	'echo-pref-subscription-article-linked' => "Crée un lien vers une page que j'ai créée",
	'echo-pref-subscription-reverted' => 'Annuler ma modification',
	'echo-pref-subscription-mention' => 'Mentionnez-moi',
	'echo-pref-email-frequency-never' => "Ne pas m'envoyer de notification par courriel",
	'echo-pref-email-frequency-immediately' => "Notifications individuelles au fil de l'eau",
	'echo-pref-email-frequency-daily' => 'Un sommaire quotidien des notifications',
	'echo-pref-email-frequency-weekly' => 'Un sommaire hebdomadaire des notifications',
	'echo-pref-notify-hide-link' => "Masquer le lien et l'insigne pour les notifications dans ma barre d'outils",
	'echo-dismiss-button' => 'Rejeter',
	'echo-dismiss-message' => 'Désactiver toutes les $1 notifications',
	'echo-dismiss-prefs-message' => 'Vous pouvez les remettre en place dans les Préférences',
	'echo-category-title-edit-user-talk' => 'Message de la page de discussion',
	'echo-category-title-page-linked' => 'Article lié',
	'echo-category-title-reverted' => 'Modification annulée',
	'echo-category-title-mention' => 'Mention',
	'echo-category-title-other' => 'Autres',
	'echo-category-title-system' => 'Système',
	'echo-no-agent' => '[Personne]',
	'echo-no-title' => '[Aucune page]',
	'echo-error-no-formatter' => 'Aucune mise en forme définies pour la notification',
	'echo-error-preference' => 'Erreur: Impossible de définir la préférence utilisateur',
	'echo-error-token' => 'Erreur: Impossible de récupérer le jeton de l’utilisateur',
	'notifications' => 'Notifications',
	'tooltip-pt-notifications' => 'Vos notifications',
	'echo-specialpage' => 'Notifications',
	'echo-anon' => 'Pour recevoir des notifications, [[Special:Userlogin/signup|créez un compte]] ou [[Special:UserLogin|connectez-vous]].',
	'echo-none' => "Vous n'avez reçu aucune notification.",
	'echo-more-info' => "Plus d'information",
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|a publié}} sur votre [[User talk:$2|page de discussion]].',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|a publié}} sur votre [[User talk:$2|page de discussion]].',
	'notification-page-linked' => '[[$2|$2]] a été {{GENDER:$1|référencé}} depuis [[$3|$3]]: [[Special:WhatLinksHere/$2|Voir tous les liens vers cette page]]',
	'notification-page-linked-flyout' => '$2 a été {{GENDER:$1|référencé}} depuis $3: [[Special:WhatLinksHere/$2|Voir tous les liens vers cette page]]',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|a fait un commentaire}} sur "[[$3|$2]]" sur la page de discussion "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|a publié}} un nouveau sujet "$2" sur [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] vous {{GENDER:$1|a envoyé}} un message: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|a fait un commentaire}} sur "[[$3#$2|$2]]" sur votre page de discussion',
	'notification-mention' => '[[User:$1|$1]] vous {{GENDER:$1|a mentionné}} sur [[$3#$2|$3]].',
	'notification-mention-flyout' => '$1 vous {{GENDER:$1|a mentionné}} sur [[$3#$2|$3]].',
	'notification-user-rights' => 'Vos droits d’utilisateur {{GENDER:$1|ont été modifiés}} par [[User:$1|$1]]. $2. [[Special:ListGroupRights|En savoir plus]]',
	'notification-user-rights-flyout' => 'Vos droits d’utilisateur {{GENDER:$1|ont été modifiés}} par $1. $2. [[Special:ListGroupRights|En savoir plus]]',
	'notification-user-rights-add' => 'Vous êtes maintenant membre de {{PLURAL:$2|ce groupe|ces groupes}}: $1',
	'notification-user-rights-remove' => 'Vous n’êtes plus membre de {{PLURAL:$2|ce groupe|ces groupes}}: $1',
	'notification-new-user' => 'Bienvenue sur {{SITENAME}}, $1 ! Nous sommes heureux de vous voir ici.',
	'notification-reverted2' => '{{PLURAL:$4|Votre modification sur [[$2]] a|Vos modifications sur [[$2]] ont}} été {{GENDER:$1|annulée}}{{PLURAL:$4||s}} par [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Votre modification sur $2 a|Vos modifications sur $2 ont}} été {{GENDER:$1|annulée}}{{PLURAL:$4||s}} par $1 $3',
	'notification-edit-talk-page-email-subject2' => 'Vous avez un nouveau message sur votre page de discussion',
	'notification-edit-talk-page-email-body2' => "L'utilisateur $1 de {{SITENAME}} {{GENDER:$1|a publié}} sur votre page de discussion:

$3

En savoir plus:

$2

$4",
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|a publié}} sur votre page de discussion',
	'notification-page-linked-email-subject' => 'Une page que vous avez commencée a été référencée sur {{SITENAME}}',
	'notification-page-linked-email-body' => '$2 a été {{GENDER:$1|référencé}} depuis $4

Voir tous les liens vers cette page:

{{canonicalurl:{{#special:WhatLinksHere/$2}}}}

$3',
	'notification-page-linked-email-batch-body' => '$2 a été {{GENDER:$1|référencé}} depuis $3',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Votre modification sur $2 a été annulée|Vos modifications sur $2 ont été annulées}} {{GENDER:$1|}} par $1',
	'notification-reverted-email-body2' => '{{PLURAL:$7|Votre modification sur $2 a été annulée|Vos modifications sur $2 ont été annulées}} {{GENDER:$1|}} par $1.

$5

En savoir plus:

$3

$6',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Votre modification sur $2 a été annulée|Vos modifications sur $2 ont été annulées}} {{GENDER:$1|}} par $1',
	'notification-mention-email-subject' => '$1 vous {{GENDER:$1|a mentionné}} sur {{SITENAME}}',
	'notification-mention-email-body' => 'L’utilisateur $1 de {{SITENAME}} vous {{GENDER:$1|a mentionné}} sur $2.

$3

En savoir plus:

$4

$5',
	'notification-mention-email-batch-body' => '$1 vous {{GENDER:$1|a mentionné}} sur $2',
	'notification-user-rights-email-subject' => 'Vos droits d’utilisateur ont été modifiés sur {{SITENAME}}',
	'notification-user-rights-email-body' => 'Vos droits d’utilisateur {{GENDER:$1|ont été modifiés}} par $1. $2

En voir plus:

{{canonicalurl:{{#special:ListGroupRights}}}}

$3',
	'notification-user-rights-email-batch-body' => 'Vos droits d’utilisateur {{GENDER:$1|ont été modifiés}} par $1. $2',
	'echo-email-subject-default' => 'Nouvelle notification sur {{SITENAME}}',
	'echo-email-body-default' => 'Vous avez une nouvelle notification sur {{SITENAME}} :

$1',
	'echo-email-batch-body-default' => 'Vous avez une nouvelle notification',
	'echo-email-footer-default' => '$2

Pour vérifier quels courriels nous vous envoyons, allez sur:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nouvelle notification|nouvelles notifications}}',
	'echo-link' => 'Notifications',
	'echo-overlay-link' => 'Toutes les notifications',
	'echo-overlay-title' => 'Notifications',
	'echo-overlay-title-overflow' => 'Notifications ($1 de $2 non lues affichées)',
	'echo-date-today' => "Aujourd'hui",
	'echo-date-yesterday' => 'Hier',
	'echo-load-more-error' => "Un erreur s'est produite en analysant davantage de résultats.",
	'notification-edit-talk-page-bundle' => '$1 et $3 {{PLURAL:$4|autre|autres}} {{GENDER:$1|ont écrit}} sur votre [[User talk:$2|page de discussion]].',
	'notification-page-linked-bundle' => '$2 a été {{GENDER:$1|référencé}} depuis $3 et $4 {{PLURAL:$5|autre page|autres pages}}. [[Special:WhatLinksHere/$2|Voir tous les liens vers cette page]]',
	'echo-email-batch-subject-daily' => "Vous avez $1 {{PLURAL:$2|notification|notifications}} aujourd'hui",
	'echo-email-batch-subject-weekly' => 'Vous avez $1 {{PLURAL:$2|notification|notifications}} cette semaine',
	'echo-email-batch-body-daily' => "$1,

Vous avez $2 {{PLURAL:$3|notification|notifications}} sur {{SITENAME}} aujourd'hui. Regardez-les ici:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5",
	'echo-email-batch-body-weekly' => '$1,

Vous avez $2 {{PLURAL:$3|notification|notifications}} sur {{SITENAME}} cette semaine. Regardez-les ici:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-category-header' => '$1 $2 {{PLURAL:$1|notification|notifications}}',
);

/** Franco-Provençal (arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'echo-desc' => 'Sistèmo de notificacions',
	'prefs-echo' => 'Notificacions',
	'prefs-displaynotifications' => 'Chouèx de visualisacion',
	'echo-pref-email-edit-user-talk' => 'Mèssâjos sur ma pâge de discussion',
	'echo-pref-email-reverted' => 'Anular mon changement',
	'echo-no-agent' => '[Nion]',
	'echo-no-title' => '[Niona pâge]',
	'notifications' => 'Notificacions',
	'tooltip-pt-notifications' => 'Voutres notificacions',
	'echo-specialpage' => 'Mes notificacions',
	'echo-none' => 'Vos éd reçu gins de notificacion.',
	'notification-new-user' => 'Benvegnua sur {{SITENAME}}, $1 !',
	'notification-new-user-content' => 'Volyéd pas oubliar de signér voutros comentèros sur les pâges de discussion avouéc 4 tildes (~~~~).',
	'echo-email-subject-default' => 'Novèla notificacion dessus {{SITENAME}}',
	'echo-email-body-default' => 'Vos avéd na novèla notificacion dessus {{SITENAME}} :

$1',
	'echo-email-footer-default' => '$2

Por controlar quints mèssâjos nos vos mandens, visitâd :
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|novèla notificacion|novèles notificacions}}',
	'echo-link' => 'Notificacions',
	'echo-overlay-link' => 'Totes les notificacions',
	'echo-overlay-title' => 'Mes notificacions',
	'echo-overlay-title-overflow' => 'Mes notificacions (montrent $1 sur $2 pas liesues)',
	'echo-date-today' => 'Houé',
	'echo-date-yesterday' => 'Hièr',
	'echo-load-more-error' => 'Na fôta est arrevâye pendent la rècupèracion de més de rèsultats.',
	'echo-email-batch-subject-daily' => 'Vos avéd $1 notificacion{{PLURAL:$2||s}} houé',
	'echo-email-batch-subject-weekly' => 'Vos avéd $1 notificacion{{PLURAL:$2||s}} ceta semana',
	'echo-email-batch-body-daily' => '$1,

vos avéd $2 notificacion{{PLURAL:$3||s}} dessus {{SITENAME}} houé.  Vêde-les ique :
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,

vos avéd $2 notificacion{{PLURAL:$3||s}} dessus {{SITENAME}} ceta semana.  Vêde-les ique :
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-category-header-edit-user-talk' => '$1 mèssâjo{{PLURAL:$1||s}} de pâge de discussion',
	'echo-email-batch-category-header-edit-revert' => '$1 {{PLURAL:$1|changement anulâ|changements anulâs}}',
	'echo-email-batch-category-header-other' => '$1 ôtro{{PLURAL:$1||s}}',
);

/** Galician (galego)
 * @author Toliño
 * @author Vivaelcelta
 */
$messages['gl'] = array(
	'echo-desc' => 'Sistema de notificación',
	'prefs-echo' => 'Notificacións',
	'prefs-displaynotifications' => 'Opcións de visualización',
	'prefs-emailfrequency' => 'Quere recibir notificacións por correo electrónico?',
	'prefs-echosubscriptions' => 'Notificádeme cando alguén…',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Correo electrónico',
	'echo-pref-subscription-edit-user-talk' => 'Deixe unha mensaxe na miña conversa',
	'echo-pref-subscription-article-linked' => 'Cree unha ligazón cara a unha páxina que eu creei',
	'echo-pref-subscription-reverted' => 'Reverta unha edición miña',
	'echo-pref-subscription-mention' => 'Me mencione',
	'echo-pref-email-frequency-never' => 'Non me enviedes ningunha notificación por correo electrónico',
	'echo-pref-email-frequency-immediately' => 'Notificacións individuais en canto cheguen',
	'echo-pref-email-frequency-daily' => 'Un resumo diario das notificacións',
	'echo-pref-email-frequency-weekly' => 'Un resumo semanal das notificacións',
	'echo-pref-notify-hide-link' => 'Agochar a ligazón e a insignia das notificacións na miña barra de ferramentas',
	'echo-dismiss-button' => 'Agochar',
	'echo-dismiss-message' => 'Desactivar todas as notificacións do tipo $1',
	'echo-dismiss-prefs-message' => 'Pode activar isto de novo nas preferencias',
	'echo-category-title-edit-user-talk' => 'Mensaxe na páxina de conversa',
	'echo-category-title-page-linked' => 'Páxina ligada',
	'echo-category-title-reverted' => 'Edición revertida',
	'echo-category-title-mention' => 'Mención',
	'echo-category-title-other' => 'Outras',
	'echo-category-title-system' => 'Sistema',
	'echo-no-agent' => '[Ninguén]',
	'echo-no-title' => '[Ningunha páxina]',
	'echo-error-no-formatter' => 'Non se definiu formato ningún para a notificación',
	'echo-error-preference' => 'Erro: Non se puido establecer a preferencia de usuario',
	'echo-error-token' => 'Erro: Non se puido recuperar o pase de usuario',
	'notifications' => 'Notificacións',
	'tooltip-pt-notifications' => 'As súas notificacións',
	'echo-specialpage' => 'Notificacións',
	'echo-anon' => 'Para recibir notificacións, [[Special:Userlogin/signup|cree unha conta]] ou [[Special:UserLogin|acceda ao sistema]].',
	'echo-none' => 'Non ten ningunha notificación.',
	'echo-more-info' => 'Máis información',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|deixou}} unha mensaxe na súa [[User talk:$2|páxina de conversa]].',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|deixou}} unha mensaxe na súa [[User talk:$2|páxina de conversa]].',
	'notification-page-linked' => '"[[$2|$2]]" foi {{GENDER:$1|ligada}} desde "[[$3|$3]]": [[Special:WhatLinksHere/$2|Ollar todas as ligazóns cara a esta páxina]]',
	'notification-page-linked-flyout' => '"$2" foi {{GENDER:$1|ligada}} desde "$3": [[Special:WhatLinksHere/$2|Ollar todas as ligazóns cara a esta páxina]]',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|comentou}} en "[[$3|$2]]" na páxina de conversa "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|comezou}} o fío de conversa "$2" en "[[$3]]"',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|envioulle}} unha mensaxe: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|comentou}} en "[[$3#$2|$2]]" na páxina de conversa',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|fíxolle}} unha mención en "[[$3#$2|$3]]".',
	'notification-mention-flyout' => '$1 {{GENDER:$1|fíxolle}} unha mención en "[[$3#$2|$3]]".',
	'notification-user-rights' => '[[User:$1|$1]] {{GENDER:$1|mudou}} os seus dereitos de usuario. $2. [[Special:ListGroupRights|Máis información]]',
	'notification-user-rights-flyout' => '$1 {{GENDER:$1|mudou}} os seus dereitos de usuario. $2. [[Special:ListGroupRights|Máis información]]',
	'notification-user-rights-add' => 'Agora pertence a {{PLURAL:$2|este grupo|estes grupos}}: $1',
	'notification-user-rights-remove' => 'Xa non pertence a {{PLURAL:$2|este grupo|estes grupos}}: $1',
	'notification-new-user' => 'Dámoslle a benvida a {{SITENAME}}, $1! Alegrámonos de que estea aquí.',
	'notification-reverted2' => '[[User:$1|$1]] {{GENDER:$1|reverteu}} {{PLURAL:$4|a súa edición|as súas edicións}} en "[[$2]]" $3',
	'notification-reverted-flyout2' => '$1 {{GENDER:$1|reverteu}} {{PLURAL:$4|a súa edición|as súas edicións}} en "$2" $3',
	'notification-edit-talk-page-email-subject2' => 'Ten unha nova mensaxe na súa páxina de conversa',
	'notification-edit-talk-page-email-body2' => '{{GENDER:$1|O editor|A editora}} $1 deixou unha mensaxe na súa páxina de conversa:

$3

Ollar máis:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|deixou}} unha mensaxe na súa páxina de conversa',
	'notification-page-linked-email-subject' => 'Unha páxina que comezou foi ligada en {{SITENAME}}',
	'notification-page-linked-email-body' => '"$2" foi {{GENDER:$1|ligada}} desde "$4".

Ollar todas as ligazóns cara a esta páxina:

{{canonicalurl:{{#special:WhatLinksHere/$2}}}}

$3',
	'notification-page-linked-email-batch-body' => '"$2" foi {{GENDER:$1|ligada}} desde "$3"',
	'notification-reverted-email-subject2' => '$1 {{GENDER:$1|reverteu}} {{PLURAL:$3|a súa edición|as súas edicións}} en "$2"',
	'notification-reverted-email-body2' => '$1 {{GENDER:$1|reverteu}} {{PLURAL:$7|a súa edición|as súas edicións}} en "$2".

$5

Ollar máis:

$3

$6',
	'notification-reverted-email-batch-body2' => '$1 {{GENDER:$1|reverteu}} {{PLURAL:$3|a súa edición|as súas edicións}} en "$2"',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|fíxolle}} unha mención en {{SITENAME}}',
	'notification-mention-email-body' => '{{GENDER:$1|O editor|A editora}} $1 fíxolle unha mención en $2:

$3

Ollar máis:

$4

$5',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|fíxolle}} unha mención en $2',
	'notification-user-rights-email-subject' => 'Os seus dereitos de usuario cambiaron en {{SITENAME}}',
	'notification-user-rights-email-body' => '$1 {{GENDER:$1|mudou}} os seus dereitos de usuario. $2

Ollar máis:

{{canonicalurl:{{#special:ListGroupRights}}}}

$3',
	'notification-user-rights-email-batch-body' => '$1 {{GENDER:$1|mudou}} os seus dereitos de usuario. $2',
	'echo-email-subject-default' => 'Nova notificación en {{SITENAME}}',
	'echo-email-body-default' => 'Ten unha nova notificación en {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Ten unha nova notificación',
	'echo-email-footer-default' => '$2

Para controlar os correos electrónicos que lle enviamos, visite:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nova notificación|novas notificacións}}',
	'echo-link' => 'Notificacións',
	'echo-overlay-link' => 'Todas as notificacións',
	'echo-overlay-title' => 'Notificacións',
	'echo-overlay-title-overflow' => 'Notificacións (mostrando $1 de $2 sen ler)',
	'echo-date-today' => 'Hoxe',
	'echo-date-yesterday' => 'Onte',
	'echo-date-header' => '$2 de $1',
	'echo-load-more-error' => 'Houbo un erro ao procurar máis resultados.',
	'notification-edit-talk-page-bundle' => '$1 e {{PLURAL:$4|outra persoa|$3 persoas máis}} {{GENDER:$1|deixaron}} mensaxes na súa [[User talk:$2|páxina de conversa]].',
	'notification-page-linked-bundle' => '"$2" foi {{GENDER:$1|ligada}} desde "$3" e $4 {{PLURAL:$5|páxina|páxinas}} máis. [[Special:WhatLinksHere/$2|Ollar todas as ligazóns cara a esta páxina]]',
	'echo-email-batch-subject-daily' => 'Hoxe ten $1 {{PLURAL:$2|notificación|notificacións}}',
	'echo-email-batch-subject-weekly' => 'Esta semana ten $1 {{PLURAL:$2|notificación|notificacións}}',
	'echo-email-batch-body-daily' => '$1:

Hoxe ten $2 {{PLURAL:$3|notificación|notificacións}} en {{SITENAME}}. Bótelles unha ollada aquí:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1:

Esta semana ten $2 {{PLURAL:$3|notificación|notificacións}} en {{SITENAME}}. Bótelles unha ollada aquí:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-category-header' => '$1 {{PLURAL:$1|notificación|notificacións}} do tipo $2',
);

/** Gujarati (ગુજરાતી)
 * @author KartikMistry
 */
$messages['gu'] = array(
	'echo-email-batch-body-default' => 'તમને નવો સંદેશ આવેલો છે',
);

/** Hebrew (עברית)
 * @author Amire80
 * @author Inkbug
 * @author חיים
 */
$messages['he'] = array(
	'echo-desc' => 'מערכת הודעות',
	'prefs-echo' => 'הודעות',
	'prefs-displaynotifications' => 'אפשרויות תצוגה',
	'prefs-emailfrequency' => 'באיזו תדירות ברצונך לקבל הודעות בדואר אלקטרוני?',
	'prefs-echosubscriptions' => 'להודיע לי כשמישהו...',
	'echo-pref-web' => 'אינטרנט',
	'echo-pref-email' => 'דואר אלקטרוני',
	'echo-pref-subscription-edit-user-talk' => 'כותב בדף השיחה שלי',
	'echo-pref-subscription-article-linked' => 'יצירת קישור לדף שיצרתי',
	'echo-pref-subscription-reverted' => 'משחזר עריכה שלי',
	'echo-pref-subscription-mention' => 'מזכיר אותי',
	'echo-pref-email-frequency-never' => 'לא לשלוח לי הודעות הדואר אלקטרוני',
	'echo-pref-email-frequency-immediately' => 'הודעות בודדות כשהן מגיעות',
	'echo-pref-email-frequency-daily' => 'סיכום יומי של הודעות',
	'echo-pref-email-frequency-weekly' => 'סיכום שבועי של הודעות',
	'echo-pref-notify-hide-link' => 'להסתיר את הקישור ואת התג להתראות בסרגל שלי',
	'echo-dismiss-button' => 'סגירה',
	'echo-dismiss-message' => 'כיבוי כל ההודעת על $1',
	'echo-dismiss-prefs-message' => 'אפשר להפעיל את אלה שוב בהעדפות',
	'echo-category-title-edit-user-talk' => 'כתיבה בדף שיחה',
	'echo-category-title-article-linked' => 'קישור לדף',
	'echo-category-title-reverted' => 'שחזור עריכה',
	'echo-category-title-mention' => 'אזכור',
	'echo-no-agent' => '[לא צוין]',
	'echo-no-title' => '[ללא דף]',
	'echo-error-no-formatter' => 'לא הוגדת עיצוב להודעות',
	'echo-error-preference' => 'שגיאה: לא ניתן להגדיר העדפת משתמש',
	'echo-error-token' => 'שגיאה: לא ניתן לקבל אסימון משתמש',
	'notifications' => 'הודעות',
	'tooltip-pt-notifications' => 'ההודעות שלך',
	'echo-specialpage' => 'ההודעות שלי',
	'echo-anon' => 'כדי לקבל הודעות, [[Special:Userlogin/signup|יש ליצור חשבון]] או [[Special:UserLogin|להיכנס]].',
	'echo-none' => 'אין לך הודעות',
	'echo-more-info' => 'מידע נוסף',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|כתב|כתבה}} ב[[User talk:$2|הדף השיחה]] שלך.',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|כתב|כתבה}} ב[[User talk:$2|דף השיחה שלך]].',
	'notification-article-linked2' => '[[User:$1|$1]] {{GENDER:$1|קישר|קישרה}} אל {{PLURAL:$4|הדף|הדפים}} $3 מהדף [[$2]]',
	'notification-article-linked-flyout2' => '$1 {{GENDER:$1|קישר|קישרה}} אל {{PLURAL:$4|הדף|הדפים}} $3 מהדף [[$2]]',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|העיר|העירה}} על הנושא "[[$3|$2]]" בדף השיחה של "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|והוסיף|הוסיפה}} את נושא החדש "$2" לדף [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|שלח|שלחה}} לך הודעה: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|העיר|העירה}} על הנושא "[[$3#$2|$2]]" בדף השיחה שלך',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|הזכיר|הזכירה}} אותך בדיון [[$3#$2|$3]].',
	'notification-mention-flyout' => '$1 {{GENDER:$1|הזכיר|הזכירה}} אותך בדיון [[$3#$2|$3]].',
	'notification-new-user' => 'ברוך בואך ל{{GRAMMAR:תחילית|{{SITENAME}}}}, $1!',
	'notification-new-user-content' => 'נא לזכור לחתום על כל דפי השיחה ב־4 טילדות (~~~~).',
	'notification-reverted2' => '[[User:$1|$1]] {{GENDER:$1|שחזר|שחזרה}} {{PLURAL:$4|עריכה שלך|עריכות שלך}} בדף [[$2]] $3',
	'notification-reverted-flyout2' => '$1 {{GENDER:$1|שחזר|שחזרה}} {{PLURAL:$4|עריכה שלך|עריכות שלך}} בדף $2 $3',
	'notification-edit-talk-page-email-subject2' => 'יש לך הודעה חדשה בדף השיחה',
	'notification-edit-talk-page-email-body2' => '{{GENDER:$1|משתמש|משתמשת}} {{SITENAME}} $1 {{GENDER:$1|כתב|כתבה}} בדף השיחה שלך:

$3

מידע נוסף:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|כתב|כתבה}} הדף השיחה שלך',
	'notification-article-linked-email-subject2' => 'מישהו קישר אל {{PLURAL:$2|דף|דפים}} שהתחלת באתר {{SITENAME}}',
	'notification-article-linked-email-body2' => '{{GENDER:$1|משתמש|משתמשת}} {{SITENAME}} $1 {{GENDER:$1|קישר|קישרה}} אל {{PLURAL:$5|הדף|הדפים}} $4 מהדף $2

מידע נוסף:

$3

$6',
	'notification-article-linked-email-batch-body2' => '$1 {{GENDER:$1|קישר|קישרה}} אל {{PLURAL:$3|הדף|הדפים}} $2',
	'notification-reverted-email-subject2' => '$1 {{GENDER:$1|שחזר|שחזרה}} {{PLURAL:$3|עריכה שלך|עריכות שלך}} בדף $2',
	'notification-reverted-email-body2' => '$1 {{GENDER:$1|שחזר|שחזרה}} {{PLURAL:$7|עריכה שלך|עריכות שלך}} בדף $2.

$5

מידע נוסף:

$3

$6',
	'notification-reverted-email-batch-body2' => '$1 {{GENDER:$1|שחזר|שחזרה}} {{PLURAL:$3|עריכה שלך|עריכות שלך}} בדף $2',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|הזכיר|הזכירה}} אותך באתר {{SITENAME}}',
	'notification-mention-email-body' => '$1 {{GENDER:$1|הזכיר|הזכירה}} אותך בדף $2

$3

מידע נוסף:

$4

$5',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|הזכיר|הזכירה}} אותך בדף $2',
	'echo-notification-count' => 'יותר מ־$1',
	'echo-email-subject-default' => 'הודעה חדשה באתר {{SITENAME}}',
	'echo-email-body-default' => 'יש לך הודעה חדשה באתר {{SITENAME}}:

$1',
	'echo-email-footer-default' => '$2

אפשר לשנות את העדפות הדוא"ל שלך בדף הבא:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '{{PLURAL:$1|הודעה אחת חדשה|$1 הודעות חדשות}}',
	'echo-link' => 'התראות',
	'echo-overlay-link' => 'כל ההודעות',
	'echo-overlay-title' => 'ההודעות שלי',
	'echo-overlay-title-overflow' => 'ההודעות שלי (מוצגות $1 מתוך $2 שלא נקראו)',
	'echo-date-today' => 'היום',
	'echo-date-yesterday' => 'אתמול',
	'echo-load-more-error' => 'אירעה שגיאה בעת אחזור תוצאות נוספות.',
	'echo-email-batch-subject-daily' => 'יש לך {{PLURAL:$2|הודעה אחת|$1 הודעה}} היום',
	'echo-email-batch-subject-weekly' => 'יש לך {{PLURAL:$2|הודעה אחת|$1 הודעה}} השבוע',
	'echo-email-batch-body-daily' => '$1,

יש לך {{PLURAL:$3|הודעה אחת|$2 הודעות}} באתר {{SITENAME}} היום. אפשר לראות אותן כאן:

{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,

קיבלת $2 {{PLURAL:$3|הודעה|הודעות}} באתר {{SITENAME}} השבוע. אפשר לראות אותן כאן:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
);

/** Hindi (हिन्दी)
 * @author Akash.bhargude
 * @author Ansumang
 * @author Siddhartha Ghai
 */
$messages['hi'] = array(
	'prefs-echo' => 'मला  म़ारा',
	'prefs-displaynotifications' => 'Display options',
	'prefs-emailfrequency' => 'When would you like to receive e-mail notifications?',
	'prefs-echosubscriptions' => 'Notify me when someone…',
	'echo-no-agent' => '[कोई नहीं]',
	'echo-no-title' => '[कोई पृष्ठ नहीं]',
	'notifications' => 'सूचनाएँ',
	'tooltip-pt-notifications' => 'आपकी सूचनाएँ',
	'echo-specialpage' => 'मेरी सूचनाएँ',
	'echo-link' => 'सूचनाएँ',
	'echo-overlay-link' => 'सभी सूचनाएँ',
	'echo-overlay-title' => 'मेरी सूचनाएँ',
	'echo-date-today' => 'आज',
	'echo-date-yesterday' => 'कल',
);

/** Upper Sorbian (hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'echo-desc' => 'Zdźělenski system',
	'prefs-echo' => 'Zdźělenki',
	'prefs-displaynotifications' => 'Zwobraznjenske opcije',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-mejl',
	'echo-dismiss-button' => 'Zaćisnyć',
	'echo-no-agent' => '[Nichtó]',
	'echo-no-title' => '[Žana strona]',
	'echo-error-no-formatter' => 'Za zdźělenje njeje so formatowanje definowało',
	'notifications' => 'Zdźělenki',
	'tooltip-pt-notifications' => 'Twoje zdźělenki',
	'echo-specialpage' => 'Moje zdźělenki',
	'echo-anon' => 'Zo by zdźělenki dóstał, dyrbiš [[Special:Userlogin/signup|konto załožić]] abo [[Special:UserLogin|so přizjewić]].',
	'echo-none' => 'Nimaš zdźělenki.',
	'echo-more-info' => 'Dalše informacije',
	'notification-new-user' => 'Witaj do {{GRAMMAR:genitiw|{{SITENAME}}}}, $1!',
	'notification-new-user-content' => 'Prošu njezabudź komentary na diskusijnych stronach z 4 tildami (~~~~) podpisać .',
	'echo-email-subject-default' => 'Nowa zdźělenka na {{GRAMMAR:lokatiw|{{SITENAME}}}}',
	'echo-email-body-default' => 'Maš nowu zdźělenku na {{GRAMMAR:lokatiw|{{SITENAME}}}}:

$1',
	'echo-email-footer-default' => '$2

Zo by kontrolował, kotre e-mejle ći sćelemy, wopytaj:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nowa zdźělenka|nowej zdźělence|nowe zdźělenki|nowych zdźělenkow}}',
	'echo-link' => 'Zdźělenki',
	'echo-overlay-link' => 'Wšě zdźělenki',
	'echo-overlay-title' => 'Moje zdźělenki',
	'echo-date-today' => 'Dźensa',
	'echo-date-yesterday' => 'Wčera',
	'echo-load-more-error' => 'Při wobstarowanju dalšich wuslědkow je zmylk wustupił.',
);

/** Hungarian (magyar)
 * @author Dj
 * @author TK-999
 */
$messages['hu'] = array(
	'echo-desc' => 'Értesítési rendszer',
	'prefs-echo' => 'Értesítések',
	'prefs-displaynotifications' => 'Megjelenítési beállítások',
	'prefs-emailfrequency' => 'Milyen gyakran kapok értesítést e-mailen', # Fuzzy
	'prefs-echosubscriptions' => 'Értesítést kérek, ha valaki...',
	'echo-pref-email' => 'E-mail',
	'echo-pref-subscription-edit-user-talk' => 'Üzenetet ír a vitalapomra',
	'echo-pref-subscription-article-linked' => 'Hivatkozik valamelyik általam létrehozott lapra',
	'echo-pref-subscription-reverted' => 'visszavonja a szerkesztésem',
	'echo-pref-subscription-mention' => 'Megemlít engem',
	'echo-pref-email-frequency-never' => 'Egyáltalán ne küldjön e-mail értesítést',
	'echo-pref-email-frequency-immediately' => 'egyéni értesítést, ahogy az esemény  bekövetkezik',
	'echo-pref-email-frequency-daily' => 'értesítések napi összefoglalója',
	'echo-pref-email-frequency-weekly' => 'értesítések heti összefoglalója',
	'echo-pref-notify-hide-link' => 'Rejtse el az értesítések hivatkozásait és jelvényét az eszköztáramban',
	'echo-dismiss-button' => 'elrejt',
	'echo-dismiss-message' => 'Minden "$1" típusú értesítés kikapcsolása',
	'echo-dismiss-prefs-message' => 'Visszakapcsolhatod ezeket a beállításaidban.',
	'echo-dismiss-title-edit-user-talk' => 'vitalapi üzenet',
	'echo-dismiss-title-article-linked' => 'hivatkozott lap',
	'echo-dismiss-title-reverted' => 'visszaállított szerkesztés',
	'echo-dismiss-title-mention' => 'említés',
	'echo-no-agent' => '[Senki]',
	'echo-no-title' => '[Nincs lap]',
	'echo-error-no-formatter' => 'Nincs értesítési formatálás definiálva',
	'echo-error-preference' => 'Hiba: Nem sikerült beállítani a felhasználói beállítást',
	'notifications' => 'Értesítések',
	'tooltip-pt-notifications' => 'Értesítéseim',
	'echo-specialpage' => 'Értesítéseim',
	'echo-anon' => 'Értesítések fogadásához [[Special:Userlogin/signup|hozz létre egy fiókot]] vagy [[Special:UserLogin|jelentkezzen be]].',
	'echo-none' => 'Nincsenek értesítések.',
	'echo-more-info' => 'További információ',
	'notification-edit-talk-page2' => '[[User:$1|$1]] üzenetet írt [[User talk:$2|a vitalapodra]].',
	'notification-edit-talk-page-flyout2' => '$1 üzenetet írt [[User talk:$2|a vitalapodra]].',
	'notification-article-linked2' => '[[User:$1|$1]] hivatkozott a(z) $3 {{PLURAL:$4|lapra|lapokra}} innen: [[$2]]',
	'notification-article-linked-flyout2' => '$1 hivatkozott a(z) $3 {{PLURAL:$4|lapra|lapokra}} innen: [[$2]]',
	'notification-add-comment2' => '[[User:$1|$1]] hozzászólt a(z) "[[$3|$2]]" témához a(z) "$4" vitalapon',
	'notification-new-user' => 'Üdvözlet a {{SITENAME}} oldalon, $1!',
	'echo-link-new' => '$1 új értesítés',
	'echo-link' => 'Értesítések',
	'echo-overlay-link' => 'Összes értesítés…', # Fuzzy
	'echo-overlay-title' => 'Értesítéseim',
	'echo-overlay-title-overflow' => 'Értesüléseim ($2 olvasatlanból $1 megjelenítve)',
	'echo-date-today' => 'Ma',
	'echo-date-yesterday' => 'Tegnap',
	'echo-load-more-error' => 'Hiba történt a további eredmények lekérdezése során.',
	'echo-email-batch-category-header-edit-user-talk' => '{{PLURAL:$1|Egy|$1}} vitalap üzenet',
	'echo-email-batch-category-header-other' => '{{PLURAL:$1|Egy|$1}} egyéb', # Fuzzy
);

/** Interlingua (interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'echo-desc' => 'Systema de notificationes',
	'prefs-echo' => 'Notificationes',
	'echo-no-agent' => '[Nemo]',
	'echo-no-title' => '[Sin titulo]', # Fuzzy
	'notifications' => 'Notificationes',
	'echo-specialpage' => 'Mi notificationes',
	'echo-anon' => 'Pro reciper notificationes, [[Special:Userlogin/signup|crea un conto]] o [[Special:UserLogin|aperi session]].',
	'echo-none' => 'Tu non ha recipite notificationes recentemente.', # Fuzzy
	'echo-email-subject-default' => 'Nove notification in {{SITENAME}}',
	'echo-email-body-default' => 'Tu ha un nove notification in {{SITENAME}}:

$1',
	'echo-link-new' => '$1 nove {{PLURAL:$1|notification|notificationes}}',
	'echo-link' => 'Mi notificationes', # Fuzzy
	'echo-overlay-link' => 'Tote le notificationes…', # Fuzzy
	'echo-overlay-title' => 'Mi notificationes',
);

/** Indonesian (Bahasa Indonesia)
 * @author Farras
 * @author පසිඳු කාවින්ද
 */
$messages['id'] = array(
	'echo-desc' => 'Sistem notifikasi',
	'prefs-echo' => 'Notifikasi',
	'notifications' => 'Notifikasi',
	'notification-new-user' => 'Selamat datang di {{SITENAME}}, $1!',
);

/** Igbo (Igbo)
 * @author Ukabia
 */
$messages['ig'] = array(
	'echo-date-today' => 'Ta',
	'echo-date-yesterday' => 'Nnyáfụ̀',
);

/** Icelandic (íslenska)
 * @author පසිඳු කාවින්ද
 */
$messages['is'] = array(
	'echo-link' => 'Tilkynningar',
);

/** Italian (italiano)
 * @author Beta16
 * @author Darth Kule
 * @author Eleonora negri
 * @author Raoli
 * @author Vituzzu
 */
$messages['it'] = array(
	'echo-desc' => 'Sistema per le notifiche',
	'prefs-echo' => 'Notifiche',
	'prefs-displaynotifications' => 'Opzioni di visualizzazione',
	'prefs-emailfrequency' => 'Quando si desidera ricevere le notifiche via e-mail?',
	'prefs-echosubscriptions' => 'Inviami una notifica quando qualcuno...',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Email',
	'echo-pref-subscription-edit-user-talk' => 'Scrive sulla mia pagina di discussione',
	'echo-pref-subscription-article-linked' => 'Crea un collegamento ad una pagina che ho creato',
	'echo-pref-subscription-reverted' => 'Annulla una mia modifica',
	'echo-pref-subscription-mention' => 'Mi menziona',
	'echo-pref-email-frequency-never' => 'Non inviarmi alcuna notifica via e-mail',
	'echo-pref-email-frequency-immediately' => 'Notifiche individuali come arrivano',
	'echo-pref-email-frequency-daily' => 'Un riepilogo giornaliero delle notifiche',
	'echo-pref-email-frequency-weekly' => 'Un riepilogo settimanale delle notifiche',
	'echo-pref-notify-hide-link' => "Nascondi il link e l'icona di notifica nella mia barra degli strumenti",
	'echo-dismiss-button' => 'Nascondi',
	'echo-dismiss-message' => 'Nascondi tutte le notifiche di $1',
	'echo-category-title-edit-user-talk' => 'post sulla pagina di discussione',
	'echo-category-title-page-linked' => 'pagine collegate', # Fuzzy
	'echo-category-title-reverted' => 'modifiche annullate',
	'echo-category-title-mention' => 'menzioni',
	'echo-category-title-other' => 'altro',
	'echo-category-title-system' => 'sistema',
	'echo-no-agent' => '[Nessuno]',
	'echo-no-title' => '[Nessuna pagina]',
	'echo-error-no-formatter' => 'Nessuna formattazione definita per le notifiche',
	'echo-error-preference' => "Errore: impossibile impostare le preferenze dell'utente",
	'echo-error-token' => 'Errore: impossibile recuperare token utente',
	'notifications' => 'Notifiche',
	'tooltip-pt-notifications' => 'Tutte le notifiche',
	'echo-specialpage' => 'Notifiche',
	'echo-anon' => "Per ricevere le notifiche, [[Special:Userlogin/signup|crea un account]] o [[Special:UserLogin|effettua l'accesso]].",
	'echo-none' => 'Non hai notifiche.',
	'echo-more-info' => 'Altre informazioni',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|ha postato}} sulla tua [[User talk:$2|pagina di discussione]].',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|ha postato}} sulla tua [[User talk:$2|pagina di discussione]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|ha lasciato un commento}} riguardo a "[[$3|$2]]" nella pagina di discussione di "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|ha postato}} un nuovo argomento "$2" su [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] ti {{GENDER:$1|ha inviato}} un messaggio: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|ha lasciato un commento}} riguardo a "[[$3#$2|$2]]" nella tua pagina di discussione',
	'notification-mention' => '[[User:$1|$1]] ti ha {{GENDER:$1|menzionato|menzionata|menzionato/a}} su [[$3#$2|$3]].',
	'notification-mention-flyout' => '$1 ti ha {{GENDER:$1|menzionato|menzionata|menzionato/a}} su [[$3#$2|$3]].',
	'notification-new-user' => 'Benvenuto su {{SITENAME}}, $1! Siamo felici che tu sia qui.',
	'notification-reverted2' => '{{PLURAL:$4|La tua modifica|Le tue modifiche}} su [[$2]] {{PLURAL:$4|è stata annullata|sono state annullate}} {{GENDER:$1|da}} [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|La tua modifica|Le tue modifiche}} su $2 {{PLURAL:$4|è stata annullata|sono state annullate}} {{GENDER:$1|da}} $1 $3',
	'notification-edit-talk-page-email-subject2' => 'Hai un nuovo messaggio nella pagina di discussione',
	'notification-edit-talk-page-email-body2' => "L'utente di {{SITENAME}} $1 {{GENDER:$2|ha postato}} sulla tua pagina di discussione:

$3

Vedi anche:

$2

$4",
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|ha postato}} sulla tua pagina di discussione',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|La tua modifica|Le tue modifiche}} su $2 {{PLURAL:$3|è stata annullata|sono state annullate}} {{GENDER:$1|da}} $1',
	'notification-reverted-email-body2' => '{{PLURAL:$7|La tua modifica|Le tue modifiche}} alla pagina $2 {{PLURAL:$7|è stata annullata|sono state annullate}} da $1.

$5

Mostra di più:

$3

$6',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|La tua modifica|Le tue modifiche}} su $2 {{PLURAL:$3|è stata annullata|sono state annullate}} {{GENDER:$1|da}} $1',
	'notification-mention-email-subject' => '$1 ti ha {{GENDER:$1|menzionato|menzionata|menzionato/a}} su {{SITENAME}}',
	'notification-mention-email-body' => "L'utente di {{SITENAME}} $1 ti ha {{GENDER:$1|menzionato|menzionata|menzionato/a}} su $2.

$3

Vedi anche:

$4

$5",
	'notification-mention-email-batch-body' => '$1 ti ha {{GENDER:$1|menzionato|menzionata|menzionato/a}} su $2',
	'echo-email-subject-default' => 'Nuova notifica su {{SITENAME}}',
	'echo-email-body-default' => 'Hai una nuova notifica su {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Hai una nuova notifica',
	'echo-email-footer-default' => '$2

Per controllare quali email ti verranno inviate, visita:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nuova notifica|nuove notifiche}}',
	'echo-link' => 'notifiche',
	'echo-overlay-link' => 'Tutte le notifiche',
	'echo-overlay-title' => 'Notifiche',
	'echo-overlay-title-overflow' => 'Notifiche (mostrate $1 di $2 non lette)',
	'echo-date-today' => 'Oggi',
	'echo-date-yesterday' => 'Ieri',
	'echo-load-more-error' => 'Si è verificato un errore nel recupero di ulteriori risultati.',
	'echo-email-batch-subject-daily' => 'Hai $1 {{PLURAL:$2|notifica|notifiche}} oggi',
	'echo-email-batch-subject-weekly' => 'Hai $1 {{PLURAL:$2|notifica|notifiche}} questa settimana',
	'echo-email-batch-body-daily' => '$1,

Hai $2 {{PLURAL:$3|notifica|notifiche}} su {{SITENAME}} oggi. Puoi vederle qui:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,

Hai $2 {{PLURAL:$3|notifica|notifiche}} su {{SITENAME}} questa settimana. Puoi vederle qui:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-category-header' => '$1 {{PLURAL:$1|notifica|notifiche}} di $2',
);

/** Japanese (日本語)
 * @author Fryed-peach
 * @author Shirayuki
 * @author Whym
 */
$messages['ja'] = array(
	'echo-desc' => '通知システム',
	'prefs-echo' => '通知',
	'prefs-displaynotifications' => '表示の設定',
	'prefs-emailfrequency' => 'メールで通知を受け取る頻度',
	'prefs-echosubscriptions' => '以下の場合に通知を受け取る',
	'echo-pref-web' => 'ウェブ',
	'echo-pref-email' => 'メール',
	'echo-pref-subscription-edit-user-talk' => '自分のトークページに誰かが投稿したとき',
	'echo-pref-subscription-article-linked' => '自分が作成したページへのリンクを誰かが作成したとき',
	'echo-pref-subscription-reverted' => '自分の編集を誰かが差し戻したとき',
	'echo-pref-subscription-mention' => '自分に誰かが言及したとき',
	'echo-pref-email-frequency-never' => '通知メールを何も受け取らない',
	'echo-pref-email-frequency-immediately' => '個別の通知が来るたび',
	'echo-pref-email-frequency-daily' => '通知を1日ごとに要約',
	'echo-pref-email-frequency-weekly' => '通知を1週間ごとに要約',
	'echo-pref-notify-hide-link' => '通知のリンクとバッジをツールバーに表示しない',
	'echo-dismiss-button' => '非表示',
	'echo-dismiss-message' => '$1についての通知をすべて止める',
	'echo-dismiss-prefs-message' => 'これらは個人設定で元に戻すこともできます',
	'echo-category-title-edit-user-talk' => 'トークページヘの投稿',
	'echo-category-title-page-linked' => 'ページヘのリンク',
	'echo-category-title-reverted' => '編集の差し戻し',
	'echo-category-title-mention' => '言及',
	'echo-category-title-other' => 'その他',
	'echo-category-title-system' => 'システム',
	'echo-no-agent' => '[送信者なし]',
	'echo-no-title' => '[ページなし]',
	'echo-error-no-formatter' => '通知の書式が定義されていません',
	'echo-error-preference' => 'エラー: 個人設定を変更できませんでした',
	'echo-error-token' => 'エラー: 利用者トークンを取得できませんでした',
	'notifications' => '通知',
	'tooltip-pt-notifications' => '自分の通知',
	'echo-specialpage' => '通知',
	'echo-anon' => '通知を受け取るには、[[Special:Userlogin/signup|アカウント作成]]または[[Special:UserLogin|ログイン]]をしてください。',
	'echo-none' => '通知はありません。',
	'echo-more-info' => '詳細情報',
	'echo-quotation-marks' => '「$1」',
	'notification-edit-talk-page2' => '[[User:$1|$1]] があなたの[[User talk:$2|トークページ]]に{{GENDER:$1|投稿しました}}。',
	'notification-edit-talk-page-flyout2' => '$1 があなたの[[User talk:$2|トークページ]]に{{GENDER:$1|投稿しました}}。',
	'notification-page-linked' => '[[$2|$2]] が [[$3|$3]] から{{GENDER:$1|リンクされました}}: [[Special:WhatLinksHere/$2|このページのリンク元]]',
	'notification-page-linked-flyout' => '$2 が $3 から{{GENDER:$1|リンクされました}}: [[Special:WhatLinksHere/$2|このページのリンク元]]',
	'notification-add-comment2' => '[[User:$1|$1]] が「$4」のトークページの「[[$3|$2]]」に{{GENDER:$1|コメントしました}}',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] が [[$3]] に新しい話題「$2」を{{GENDER:$1|投稿しました}}',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] があなたにメッセージを{{GENDER:$1|送信しました}}:「[[$3#$2|$2]]」',
	'notification-add-comment-yours2' => '[[User:$1|$1]] があなたのトークページの「[[$3#$2|$2]]」に{{GENDER:$1|コメントしました}}',
	'notification-mention' => '[[User:$1|$1]] が [[$3#$2|$3]] であなたに{{GENDER:$1|言及しました}}。',
	'notification-mention-flyout' => '$1 が [[$3#$2|$3]] であなたに{{GENDER:$1|言及しました}}。',
	'notification-new-user' => '$1さん、{{SITENAME}}へようこそ!', # Fuzzy
	'notification-reverted2' => '{{PLURAL:$4|[[$2]] でのあなたの編集}}を [[User:$1|$1]] が{{GENDER:$1|差し戻しました}} $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|$2 でのあなたの編集}}を $1 が{{GENDER:$1|差し戻しました}} $3',
	'notification-edit-talk-page-email-subject2' => 'トークページに新着メッセージがあります',
	'notification-edit-talk-page-email-body2' => '{{SITENAME}}の利用者 $1 があなたのトークページに{{GENDER:$1|投稿しました}}:

$3

詳細はこちら:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 があなたのトークページに{{GENDER:$1|投稿しました}}',
	'notification-page-linked-email-subject' => 'あなたが作成したページが{{SITENAME}}でリンクされました',
	'notification-page-linked-email-body' => '$2 が $4 から{{GENDER:$1|リンクされました}}

このページのすべてのリンク元:

{{canonicalurl:{{#special:WhatLinksHere/$2}}}}

$3',
	'notification-page-linked-email-batch-body' => '$2 が $3 から{{GENDER:$1|リンクされました}}',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|$2 でのあなたの編集}}を $1 が{{GENDER:$1|差し戻しました}}',
	'notification-reverted-email-body2' => '{{PLURAL:$7|$2 でのあなたの編集}}を $1 が{{GENDER:$1|差し戻しました}}。

$5

詳細はこちら:

$3

$6',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|$2 でのあなたの編集}}を $1 が{{GENDER:$1|差し戻しました}}',
	'notification-mention-email-subject' => '$1 が{{SITENAME}}であなたに{{GENDER:$1|言及しました}}',
	'notification-mention-email-body' => '{{SITENAME}}の利用者 $1 が $2 であなたに{{GENDER:$1|言及しました}}。

$3

詳細はこちら:

$4

$5',
	'notification-mention-email-batch-body' => '$1 が $2 であなたに{{GENDER:$1|言及しました}}',
	'notification-user-rights-email-subject' => '{{SITENAME}}での利用者権限が変更されました',
	'echo-email-subject-default' => '{{SITENAME}}での新しい通知',
	'echo-email-body-default' => '{{SITENAME}}で新しい通知があります:

$1',
	'echo-email-batch-body-default' => '新しい通知があります',
	'echo-email-footer-default' => '$2

どのメールを受け取るかを制御するにはこちら:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|件の新しい通知}}',
	'echo-link' => '通知',
	'echo-overlay-link' => 'すべての通知',
	'echo-overlay-title' => '通知',
	'echo-overlay-title-overflow' => '通知 (未読 $2 件中 $1 件を表示中)',
	'echo-date-today' => '今日',
	'echo-date-yesterday' => '昨日',
	'echo-date-header' => '$1$2日',
	'echo-load-more-error' => '結果の続きを取得する際にエラーが発生しました。',
	'notification-edit-talk-page-bundle' => '$1 と他 $3 {{PLURAL:$4|人}}があなたの[[User talk:$2|トークページ]]に{{GENDER:$1|投稿しました}}。',
	'notification-page-linked-bundle' => '$2 が $3 と他 $4 {{PLURAL:$5|件のページ}}から{{GENDER:$1|リンクされました}}。[[Special:WhatLinksHere/$2|このページのリンク元]]',
	'echo-email-batch-separator' => '________________________________________________',
	'echo-email-batch-subject-daily' => 'この1日で $1 件の{{PLURAL:$2|通知}}が届いています',
	'echo-email-batch-subject-weekly' => 'この1週間で $1 件の{{PLURAL:$2|通知}}が届いています',
	'echo-email-batch-body-daily' => '$1 さん、

{{SITENAME}}上で今日、$2 件の{{PLURAL:$3|通知}}が届きました。下記の場所でご覧いただけます。
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1 さん、

{{SITENAME}}上でこの1週間に、$2 件の{{PLURAL:$3|通知}}が届きました。下記の場所でご覧いただけます。
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-category-header' => '$2についての通知 $1 {{PLURAL:$1|件}}',
);

/** Javanese (Basa Jawa)
 * @author NoiX180
 */
$messages['jv'] = array(
	'echo-desc' => 'Infrastruktur wara-wara gènèrasi ngarep kanggo MediaWiki', # Fuzzy
	'prefs-echo' => 'Wara-wara',
	'echo-no-agent' => '[Dudu sapa-sapa]',
	'echo-no-title' => '[Ora ana judhul]', # Fuzzy
	'notifications' => 'Wara-wara',
	'echo-specialpage' => 'Wara-wara kula',
	'echo-anon' => 'Kanggo nampa wara-wara [[Special:Userlogin/signup|gawé akun]] utawa [[Special:UserLogin|mlebu log]].',
	'echo-none' => 'Sampéyan durung nampa wara-wara apa-apa.', # Fuzzy
	'echo-email-subject-default' => 'Wara-wara anyar nèng {{SITENAME}}',
	'echo-email-body-default' => 'Sampéyan nduwé wara-wara anyar nèng {{SITENAME}}:

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|wara-wara|wara-wara}} anyar',
	'echo-link' => 'Wara-wara kula', # Fuzzy
	'echo-overlay-link' => 'Kabèh wara-wara...', # Fuzzy
	'echo-overlay-title' => 'Wara-wara kula',
);

/** Georgian (ქართული)
 * @author David1010
 */
$messages['ka'] = array(
	'echo-desc' => 'შეტყობინებების სისტემა',
	'prefs-echo' => 'შეტყობინებები',
	'prefs-displaynotifications' => 'გამოსახვის პარამეტრები',
	'prefs-echosubscriptions' => 'შემატყობინეთ როცა ვინმე…',
	'echo-pref-web' => 'ქსელი',
	'echo-pref-email' => 'ელ. ფოსტა',
	'echo-pref-subscription-edit-user-talk' => 'დაწერს ჩემი განხილვის გვერდზე',
	'echo-pref-subscription-article-linked' => 'გააკეთებს ბმულს ჩემ მიერ შექმნილ გვერდზე',
	'echo-pref-subscription-reverted' => 'გააუქმებს ჩემ რედაქტირებას',
	'echo-no-agent' => '[არავინ]',
	'echo-no-title' => '[არ არის გვერდი]',
	'notifications' => 'შეტყობინებები',
	'tooltip-pt-notifications' => 'თქვენი შეტყობინებები',
	'echo-specialpage' => 'ჩემი შეტყობინებები',
	'echo-more-info' => 'დეტალურად',
	'notification-new-user' => 'კეთილი იყოს თქვენი მობრძანება საიტზე {{SITENAME}}, $1!',
	'echo-notification-count' => '$1+',
	'echo-link' => 'შეტყობინებები',
	'echo-overlay-link' => 'შეტყობინება',
	'echo-overlay-title' => 'ჩემი შეტყობინებები',
	'echo-date-today' => 'დღეს',
	'echo-date-yesterday' => 'გუშინ',
	'echo-date-header' => '$1 $2',
	'echo-email-batch-separator' => '________________________________________________',
	'echo-email-batch-bullet' => '•',
);

/** Korean (한국어)
 * @author Freebiekr
 * @author 아라
 */
$messages['ko'] = array(
	'echo-desc' => '알림 시스템',
	'prefs-echo' => '알림',
	'prefs-displaynotifications' => '보이기 설정',
	'prefs-emailfrequency' => '언제 이메일 알림을 받겠습니까?',
	'prefs-echosubscriptions' => '다음 경우에 알림…',
	'echo-pref-web' => '웹',
	'echo-pref-email' => '이메일',
	'echo-pref-subscription-edit-user-talk' => '자신의 토론 문서에 게시물이 생길 때',
	'echo-pref-subscription-article-linked' => '자신이 만든 문서에 링크가 걸릴 때',
	'echo-pref-subscription-reverted' => '자신의 편집이 되돌려질 떄',
	'echo-pref-subscription-mention' => '자신이 언급될 때',
	'echo-pref-email-frequency-never' => '내게 어떠한 이메일 알림을 보내지 않기',
	'echo-pref-email-frequency-immediately' => '모두한테 오는 개별 알림',
	'echo-pref-email-frequency-daily' => '알림의 일별 요약',
	'echo-pref-email-frequency-weekly' => '알림의 주간 요약',
	'echo-pref-notify-hide-link' => '툴바에 알림에 대한 링크와 배지 숨기기',
	'echo-dismiss-button' => '기각',
	'echo-dismiss-message' => '모든 $1 알림 끄기',
	'echo-dismiss-prefs-message' => '사용자 환경 설정에서 다시 설정할 수 있습니다.',
	'echo-category-title-edit-user-talk' => '토론 문서 게시물',
	'echo-category-title-article-linked' => '문서를 링크함',
	'echo-category-title-reverted' => '편집을 되돌림',
	'echo-category-title-mention' => '언급',
	'echo-no-agent' => '[알 수 없는 사용자]',
	'echo-no-title' => '[문서 없음]',
	'echo-error-no-formatter' => '알림에 대해 정의한 형식이 없습니다',
	'echo-error-preference' => '오류: 사용자 환경 설정을 설정할 수 없습니다',
	'echo-error-token' => '오류: 사용자 토큰을 얻을 수 없습니다',
	'notifications' => '알림',
	'tooltip-pt-notifications' => '내 알림',
	'echo-specialpage' => '내 알림',
	'echo-anon' => '알림을 받으려면 [[Special:Userlogin/signup|계정을 만들거나]] [[Special:UserLogin|로그인하세요]].',
	'echo-none' => '알림이 없습니다.',
	'echo-more-info' => '자세한 정보',
	'notification-edit-talk-page2' => '[[User:$1|$1]] 사용자가 내 [[User talk:$2|토론 문서]]에 {{GENDER:$1|게시했습니다}}.',
	'notification-edit-talk-page-flyout2' => '$1 사용자가 내 [[User talk:$2|토론 문서]]에 {{GENDER:$1|게시했습니다}}.',
	'notification-article-linked2' => '$3 문서를 이 문서에서 [[User:$1|$1]] 사용자가 {{GENDER:$1|링크}}{{PLURAL:$4|했습니다}}: [[$2]]',
	'notification-article-linked-flyout2' => '$3 문서를 이 문서에서 $1 사용자가 {{GENDER:$1|링크}}{{PLURAL:$4|했습니다}}: [[$2]]',
	'notification-add-comment2' => '[[User:$1|$1]] 사용자가 "$4" 토론 문서의 "[[$3|$2]]"에 {{GENDER:$1|덧글을 남겼습니다}}',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] 사용자가 [[$3]]의 "$2" 새 주제를 {{GENDER:$1|게시했습니다}}',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] 사용자가 내게 메시지를 {{GENDER:$1|보냈습니다}}: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] 사용자가 내 토론 문서의 "[[$3#$2|$2]]"에 {{GENDER:$1|덧글을 남겼습니다}}',
	'notification-mention' => '[[User:$1|$1]] 사용자가 [[$3#$2|$3]]에 당신을 {{GENTER:$1|언급했습니다}}.',
	'notification-mention-flyout' => '$1 사용자가 [[$3#$2|$3]]에 당신을 {{GENDER:$1|언급했습니다}}.',
	'notification-new-user' => '$1, {{SITENAME}}에 온 것을 환영합니다!',
	'notification-new-user-content' => '토론 문서에서 글을 쓴 후에는 물결표 4개(~~~~)를 넣어 서명하는 것을 기억하세요.',
	'notification-reverted2' => '{{PLURAL:$4|[[$2]]에 대한 내 편집}}을 [[User:$1|$1]] 사용자가 {{GENDER:$1|되돌렸습니다}} $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|$2에 대한 내 편집}}을 $1 사용자가 {{GENDER:$1|되돌렸습니다}} $3',
	'notification-edit-talk-page-email-subject2' => '새 토론 문서 메시지가 있습니다',
	'notification-edit-talk-page-email-body2' => '{{SITENAME}} $1 사용자가 내 토론 문서에 {{GENDER:$1|게시했습니다}}:

$3

더 보기:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 사용자가 내 토론 문서에 {{GENDER:$1|게시했습니다}}',
	'notification-article-linked-email-subject2' => '{{SITENAME}}에서 작성한 {{PLURAL:$2|문서}}를 링크{{PLURAL:$2|했습니다}}',
	'notification-article-linked-email-body2' => '$4 문서를 이 문서에서 {{SITENAME}} $1 사용자가 {{GENDER:$1|링크}}{{PLURAL:$5|했습니다}}: $2

더 보기:

$3

$6',
	'notification-article-linked-email-batch-body2' => '$2 문서를 $1 사용자가 {{GENDER:$1|링크}}{{PLURAL:$3|했습니다}}',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|$2에 대한 내 편집}}을 $1 사용자가 {{GENDER:$1|되돌렸습니다}}',
	'notification-reverted-email-body2' => '{{PLURAL:$7|$2에 대한 내 편집}}을 $1 사용자가 {{GENDER:$1|되돌렸습니다}}.

$5

더 보기:

$3

$6',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|$2에 대한 내 편집}}을 $1 사용자가 {{GENDER:$1|되돌렸습니다}}',
	'notification-mention-email-subject' => '$1 사용자가 {{SITENAME}}에 당신을 {{GENDER:$1|언급했습니다}}',
	'notification-mention-email-body' => '{{SITENAME}} $1 사용자가 $2에 당신을 {{GENDER:$1|언급했습니다}}.

$3

더 보기:

$4

$5',
	'notification-mention-email-batch-body' => '$1 사용자가 $2에 당신을 {{GENDER:$1|언급했습니다}}',
	'echo-email-subject-default' => '{{SITENAME}}에서 새 알림',
	'echo-email-body-default' => '{{SITENAME}}에서 새 알림이 있습니다:

$1',
	'echo-email-footer-default' => '$2

보내는 이메일을 관리하려면 다음을 방문하세요:

{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '새 {{PLURAL:$1|알림}} $1개',
	'echo-link' => '알림',
	'echo-overlay-link' => '모든 알림',
	'echo-overlay-title' => '내 알림',
	'echo-overlay-title-overflow' => '내 알림 (읽지 않은 알림 $2개 중 $1개 보는 중)',
	'echo-date-today' => '오늘',
	'echo-date-yesterday' => '어제',
	'echo-load-more-error' => '더 많은 결과를 가져오는 동안 오류가 발생했습니다.',
	'echo-email-batch-subject-daily' => '오늘 {{PLURAL:$2|알림}} $1개가 있습니다',
	'echo-email-batch-subject-weekly' => '이번 주 {{PLURAL:$2|알림}} $1개가 있습니다',
	'echo-email-batch-body-daily' => '$1,

오늘 {{SITENAME}}에 {{PLURAL:$3|알림}} $2개가 있습니다. 여기서 볼 수 있습니다:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,

이번 주 {{SITENAME}}에 {{PLURAL:$3|알림}} $2개가 있습니다. 여기서 볼 수 있습니다:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
);

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'echo-desc' => 'Süßtehm för Medeilonge',
	'prefs-echo' => 'Meddeilonge',
	'echo-no-agent' => '[Keine]',
	'echo-no-title' => '[Kein Sigg]',
	'notifications' => 'Meddeilonge',
	'echo-specialpage' => 'Ming Meddeilonge',
	'echo-anon' => 'Do moß Desch [[Special:Userlogin/signup|aanmälde]] udder [[Special:UserLogin|enlogge]], öm Medeilonge krijje ze künne.',
	'echo-none' => 'Ende läzde Zigg häß De kein Medeilonge krääje.', # Fuzzy
	'notification-new-user' => '$1, welkumme op {{GENDER:Dative|{{SITENAME}}}}!',
	'notification-new-user-content' => 'Bes esu jood un donn Ding Beidrääsch op Klaafsigge met vier Tilde (~~~~) „ongerschriive“.',
	'echo-email-subject-default' => 'En neue Medeilong op {{GRAMMAR:dative|{{ucfirst:{{SITENAME}}}}}}',
	'echo-email-body-default' => 'Do häss_en neue Medeilong op {{GRAMMAR:dative|{{ucfirst:{{SITENAME}}}}}}:

$1',
	'echo-link-new' => '{{PLURAL:$1|Ein neue Medeilong|$1 neue Medeilonge|Kein neue Medeilong}}',
	'echo-link' => 'Ming Medeilonge', # Fuzzy
	'echo-overlay-link' => 'Alle Medeilonge{{int:ellipsis}}', # Fuzzy
	'echo-overlay-title' => 'Ming Medeilonge',
	'echo-date-today' => 'Hück',
	'echo-date-yesterday' => 'Jäßtere',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'echo-desc' => 'Notifikatiouns-System',
	'prefs-echo' => 'Notifikatiounen',
	'prefs-displaynotifications' => 'Optioune vum Affichage',
	'echo-pref-web' => 'Web',
	'echo-pref-subscription-edit-user-talk' => 'Op meng Diskussiounssäit schreift',
	'echo-pref-subscription-reverted' => 'Meng Ännerung zrécksetzen',
	'echo-pref-subscription-mention' => 'Mech ernimmt',
	'echo-pref-email-frequency-daily' => 'All Dag e Resumé vun den Notifikatiounen',
	'echo-pref-email-frequency-weekly' => 'All Woch e Resumé vun den Notifikatiounen',
	'echo-dismiss-button' => 'Verwerfen',
	'echo-dismiss-message' => 'All $1-Notifikatiounen ausschalten',
	'echo-category-title-page-linked' => 'Säit verlinkt',
	'echo-category-title-reverted' => 'Ännerung zréckgesat',
	'echo-category-title-system' => 'System',
	'echo-no-agent' => '[Keen]',
	'echo-no-title' => '[Keng Säit]',
	'echo-error-preference' => 'Feeler:Benotzerastellung konnt net gemaacht ginn',
	'notifications' => 'Notifikatiounen',
	'tooltip-pt-notifications' => 'Är Notifikatiounen',
	'echo-specialpage' => 'Notifikatiounen',
	'echo-anon' => 'Fir Notifikatiounen ze kréien, [[Special:Userlogin/signup|maacht e Benotzerkont op]] oder [[Special:UserLogin|loggt Iech an]]',
	'echo-none' => 'Dir hutt keng Notifikatiounen.',
	'echo-more-info' => 'Méi Informatiounen',
	'notification-new-user' => 'Wëllkomm op {{SITENAME}}, $1! Mir si frou Iech begréissen ze kënnen.',
	'notification-edit-talk-page-email-subject2' => 'Dir hutt en neie Message op Ärer Diskussiounssäit',
	'notification-page-linked-email-subject' => 'Eng Säit déi Dir ugeluecht hutt gouf op {{SITENAME}} verlinkt',
	'notification-user-rights-email-subject' => 'Är Benotzerrechter op {{SITENAME}} hu geännert',
	'notification-user-rights-email-batch-body' => 'Är Benotzerrechter goufe vum $1 {{GENDER:$1|geännert}}. $2',
	'echo-email-subject-default' => 'Nei Notifikatioun op {{SITENAME}}',
	'echo-email-body-default' => 'Dir hutt eng nei Notifikatioun op {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Dir hutt eng Notifikatioun',
	'echo-link-new' => '$1 nei {{PLURAL:$1|Notifikatioun|Notifikatiounen}}',
	'echo-link' => 'Notifikatiounen',
	'echo-overlay-link' => 'All Notifikatiounen',
	'echo-overlay-title' => 'Notifikatiounen',
	'echo-date-today' => 'Haut',
	'echo-date-yesterday' => 'Gëschter',
	'echo-email-batch-category-header' => '$1 $2 {{PLURAL:$1|Notifikatioun|Notifikatiounen}}',
);

/** Lithuanian (lietuvių)
 * @author Eitvys200
 */
$messages['lt'] = array(
	'prefs-echo' => 'Pranešimai',
	'echo-no-agent' => '[Niekas]',
	'echo-date-today' => 'Šiandien',
	'echo-date-yesterday' => 'Vakar',
);

/** Latvian (latviešu)
 * @author Admresdeserv.
 */
$messages['lv'] = array(
	'echo-email-batch-body-default' => 'Jums ir jauns paziņojums',
);

/** Macedonian (македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'echo-desc' => 'Известителен систем',
	'prefs-echo' => 'Известувања',
	'prefs-displaynotifications' => 'Нагодувања на приказот',
	'prefs-emailfrequency' => 'Кога би сакале да примате известувања на е-пошта?',
	'prefs-echosubscriptions' => 'Извести ме кога некој…',
	'echo-pref-web' => 'На вики',
	'echo-pref-email' => 'Е-пошта',
	'echo-pref-subscription-edit-user-talk' => 'Објави на мојата страница за разговор',
	'echo-pref-subscription-article-linked' => 'Става врска до страница што ја имам создадено',
	'echo-pref-subscription-reverted' => 'Врати мое уредување',
	'echo-pref-subscription-mention' => 'Ме спомнува',
	'echo-pref-email-frequency-never' => 'Не ми праќај известувања на е-пошта',
	'echo-pref-email-frequency-immediately' => 'Поединечни известувања, едно по едно',
	'echo-pref-email-frequency-daily' => 'Дневен преглед на известувањата',
	'echo-pref-email-frequency-weekly' => 'Неделен преглед на известувањата',
	'echo-pref-notify-hide-link' => 'Скриј ја врската и значката за известувања во алатникот',
	'echo-dismiss-button' => 'Тргни',
	'echo-dismiss-message' => 'Исклучи ги сите $1 известувања',
	'echo-dismiss-prefs-message' => 'Овие можете пак да ги вклучите во Нагодувања',
	'echo-category-title-edit-user-talk' => 'Објава на страницата за разговор',
	'echo-category-title-page-linked' => 'Сврзана страница',
	'echo-category-title-reverted' => 'Уредувањето е вратено',
	'echo-category-title-mention' => 'Спомнување',
	'echo-category-title-other' => 'Друго',
	'echo-category-title-system' => 'Систем',
	'echo-no-agent' => '[Никој]',
	'echo-no-title' => '[Нема страница]',
	'echo-error-no-formatter' => 'Нема зададено форматирање за ова известување',
	'echo-error-preference' => 'Грешка: Не можам да го зададам нагодувањето',
	'echo-error-token' => 'Грешка: Не можев да го добијам корисничкиот жетон',
	'notifications' => 'Известувања',
	'tooltip-pt-notifications' => 'Вашите известувања',
	'echo-specialpage' => 'Известувања',
	'echo-anon' => 'За да добивате известувања, [[Special:Userlogin/signup|направете сметка]] или [[Special:UserLogin|најавете се]].',
	'echo-none' => 'Немате известувања.',
	'echo-more-info' => 'Повеќе информации',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|објави}} на вашата [[User talk:$2|страница за разговор]].',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|објави}} на вашата [[User talk:$2|страница за разговор]].',
	'notification-page-linked' => '[[$2|$2]] е {{GENDER:$1|наведена}} од [[$3|$3]]: [[Special:WhatLinksHere/$2|Погл. сите врски до страницава]]',
	'notification-page-linked-flyout' => '$2 е {{GENDER:$1|наведена}} на $3: [[Special:WhatLinksHere/$2|Погл. сите врски до страницава]]',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|коментираше}} на „[[$3|$2]]“ на страницата за разговор „$4“',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|ја објави}} новата тема „$2“ на [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|ви испрати}} порака: „[[$3#$2|$2]]“',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|коментираше}} на „[[$3#$2|$2]]“ на вашата страница за разговор',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|ве спомна}} на „[[$3#$2|$3]]“.',
	'notification-mention-flyout' => '$1 {{GENDER:$1|ве спомна}} на „[[$3#$2|$3]]“.',
	'notification-user-rights' => 'Вашите кориснички права се {{GENDER:$1|изменети}} од [[User:$1|$1]]. $2. [[Special:ListGroupRights|Дознајте повеќе]]',
	'notification-user-rights-flyout' => 'Вашите кориснички права се {{GENDER:$1|изменети}} од $1. $2. [[Special:ListGroupRights|Дознајте повеќе]]',
	'notification-user-rights-add' => 'Сега членувате во {{PLURAL:$2|оваа група|овие групи}}: $1',
	'notification-user-rights-remove' => 'Повеќе не членувате во {{PLURAL:$2|оваа група|овие групи}}: $1',
	'notification-new-user' => 'Добре дојдовте на {{SITENAME}}, $1! Драго ни е што сте тука.',
	'notification-reverted2' => '[[User:$1|$1]] {{PLURAL:$4|го|ги}} {{GENDER:$1|врати}} {{PLURAL:$4|вашето уредување на [[$2]]|вашите уредувања на [[$2]]}} $3',
	'notification-reverted-flyout2' => '$1 {{PLURAL:$4|го|ги}} {{GENDER:$1|врати}} {{PLURAL:$4|вашето уредување на $2|вашите уредувања на $2}} $3',
	'notification-edit-talk-page-email-subject2' => 'Имате нова порака',
	'notification-edit-talk-page-email-body2' => 'Корисникот $1 на {{SITENAME}} {{GENDER:$1|објави}} на вашата страница за разговор:

$3

Погледајте повеќе:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|објави}} на вашата страница за разговор',
	'notification-page-linked-email-subject' => 'Страница што вие ја започнавте е наведена на {{SITENAME}}',
	'notification-page-linked-email-body' => '$2 е {{GENDER:$1|наведена}} на $4

Погл. сите врски до страницава:

{{canonicalurl:{{#special:WhatLinksHere/$2}}}}

$3',
	'notification-page-linked-email-batch-body' => '$2 е {{GENDER:$1|наведена}} на $3',
	'notification-reverted-email-subject2' => '$1 {{PLURAL:$3|го|ги}} {{GENDER:$1|врати}} {{PLURAL:$3|вашето уредување на $2|вашите уредувања на $2}}',
	'notification-reverted-email-body2' => '$1 {{PLURAL:$7|го|ги}} {{GENDER:$1|врати}} {{PLURAL:$7|вашето уредување на $2|вашите уредувања на $2}}.

$5

Погледајте повеќе:

$3

$6',
	'notification-reverted-email-batch-body2' => '$1 {{PLURAL:$3|го|ги}} {{GENDER:$1|врати}} {{PLURAL:$3|вашето уредување на $2|вашите уредувања на $2}}',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|ве спомна}} на {{SITENAME}}',
	'notification-mention-email-body' => 'Корисникот $1 {{GENDER:$1|mentioned}} од {{SITENAME}} ве спомна на „$2“.

$3

Погледајте повеќе:

$4

$5',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|ве спомна}} на „$2“',
	'notification-user-rights-email-subject' => 'Вашите кориснички права на {{SITENAME}} се изменети',
	'notification-user-rights-email-body' => 'Вашите кориснички права се {{GENDER:$1|изменети}} од $1. $2

Погледајте повеќе:

{{canonicalurl:{{#special:ListGroupRights}}}}

$3',
	'notification-user-rights-email-batch-body' => 'Вашите кориснички права се {{GENDER:$1|изменети}} од $1. $2',
	'echo-email-subject-default' => 'Ново известување на {{SITENAME}}',
	'echo-email-body-default' => 'Имате ново известување на {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Имате ново известување',
	'echo-email-footer-default' => '$2

Ако сакате да изберете какви пораки да добивате, појдете на страницата:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|ново известување|нови известувања}}',
	'echo-link' => 'Известувања',
	'echo-overlay-link' => 'Сите известувања',
	'echo-overlay-title' => 'Известувања',
	'echo-overlay-title-overflow' => 'Известувања (приказ на $1 од $2 непрочитани)',
	'echo-date-today' => 'Денес',
	'echo-date-yesterday' => 'Вчера',
	'echo-load-more-error' => 'Се појави грешка при обидот да добијам повеќе резултати.',
	'notification-edit-talk-page-bundle' => '$1 и {{PLURAL:$4|уште еден друг|уште $3 други}} {{GENDER:$1|објавија}} нешто на вашата [[User talk:$2|страница за разговор]].',
	'notification-page-linked-bundle' => '$2 е {{GENDER:$1|наведена}} на $3 и уште $4 {{PLURAL:$5|страница|страници}}. [[Special:WhatLinksHere/$2|Погл. сите врски до страницава]]',
	'echo-email-batch-subject-daily' => 'За денес имате $1 {{PLURAL:$2|известување|известувања}}',
	'echo-email-batch-subject-weekly' => 'За неделава $1 {{PLURAL:$2|известување|известувања}} за неделава',
	'echo-email-batch-body-daily' => '$1,

За денес имате $2 {{PLURAL:$3|известување|известувања}} на {{SITENAME}}. Погледајте ги тука:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,

За неделава имате $2 {{PLURAL:$3|известување|известувања}} на {{SITENAME}}. Погледајте ги тука:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-category-header' => '$1 $2 {{PLURAL:$1|известување|известувања}}',
);

/** Malayalam (മലയാളം)
 * @author Praveenp
 * @author Santhosh.thottingal
 */
$messages['ml'] = array(
	'echo-desc' => 'അറിയിപ്പ് വ്യവസ്ഥ',
	'prefs-echo' => 'അറിയിപ്പുകൾ',
	'prefs-displaynotifications' => 'പ്രദർശന ഐച്ഛികങ്ങൾ',
	'prefs-emailfrequency' => 'താങ്കൾക്ക് എപ്പോഴൊക്കെയാണ് ഇമെയിൽ അറിയിപ്പുകൾ ലഭിക്കേണ്ടത്?',
	'echo-pref-subscription-article-linked' => 'ഞാൻ സൃഷ്ടിച്ച താളിലേയ്ക്ക് ഒരു കണ്ണി സൃഷ്ടിക്കപ്പെടുമ്പോൾ',
	'echo-pref-subscription-reverted' => 'എന്റെ തിരുത്ത് മുൻപ്രാപനം ചെയ്യപ്പെട്ടാൽ',
	'echo-pref-email-frequency-never' => 'എനിക്ക് ഇമെയിൽ അറിയിപ്പുകൾ വേണ്ട',
	'echo-pref-email-frequency-immediately' => 'ഓരോ വേളയിലും വ്യത്യസ്ത അറിയിപ്പുകൾ',
	'echo-pref-email-frequency-daily' => 'ഒരു ദിവസത്തെ അറിയിപ്പുകളുടെ അവലോകനം',
	'echo-pref-email-frequency-weekly' => 'ഒരു ആഴ്ചയിലെ അറിയിപ്പുകളുടെ അവലോകനം',
	'echo-pref-notify-hide-link' => 'എന്റെ ടൂൾബാറിൽ നിന്നും അറിയിപ്പുകൾക്കുള്ള ലിങ്കും മുദ്രയും മറയ്ക്കുക',
	'echo-no-agent' => '[ആരുമില്ല]',
	'echo-no-title' => '[താൾ ഇല്ല]',
	'echo-error-no-formatter' => 'അറിയിപ്പിനായി യാതൊരു രൂപവും നിർവ്വചിച്ചിട്ടില്ല',
	'notifications' => 'അറിയിപ്പുകൾ',
	'tooltip-pt-notifications' => 'താങ്കൾക്കുള്ള അറിയിപ്പുകൾ',
	'echo-specialpage' => 'അറിയിപ്പുകൾ',
	'echo-anon' => 'അറിയിപ്പുകൾ ലഭിക്കാനായി, [[Special:Userlogin/signup|അംഗത്വമെടുക്കയോ]] [[Special:UserLogin|പ്രവേശിക്കുകയോ]] ചെയ്യേണ്ടതാണ്.',
	'echo-none' => 'താങ്കൾക്ക് അറിയിപ്പുകളൊന്നുമില്ല.',
	'echo-more-info' => 'കൂടുതൽ വിവരങ്ങൾ',
	'notification-edit-talk-page2' => '[[User:$1|$1]] താങ്കളുടെ on your [[User talk:$2|സംവാദത്താളിൽ]] {{GENDER:$1|കുറിപ്പിട്ടു}} .',
	'notification-edit-talk-page-flyout2' => 'താങ്കളുടെ [[User talk:$2|സംവാദത്താളിൽ]] $1 {{GENDER:$1|കുറിപ്പിട്ടിട്ടുണ്ട്}}.',
	'notification-new-user' => '{{SITENAME}} സംരംഭത്തിലേയ്ക്ക് സ്വാഗതം, $1!', # Fuzzy
	'echo-email-subject-default' => '{{SITENAME}} സംരംഭത്തിൽ അറിയിപ്പുണ്ട്',
	'echo-email-body-default' => '{{SITENAME}} സംരംഭത്തിൽ താങ്കൾക്ക് ഒരു അറിയിപ്പുണ്ട്:

$1',
	'echo-link-new' => 'പുതിയ {{PLURAL:$1|അറിയിപ്പ്|$1 അറിയിപ്പുകൾ}}',
	'echo-link' => 'എനിക്കുള്ള അറിയിപ്പുകൾ', # Fuzzy
	'echo-overlay-link' => 'എല്ലാ അറിയിപ്പുകളും...', # Fuzzy
	'echo-overlay-title' => 'അറിയിപ്പുകൾ',
	'echo-overlay-title-overflow' => 'അറിയിപ്പുകൾ (വായിക്കാത്ത $2 എണ്ണത്തിലെ $1 എണ്ണം കാണിക്കുന്നു)',
	'echo-date-today' => 'ഇന്ന്',
	'echo-date-yesterday' => 'ഇന്നലെ',
);

/** Malay (Bahasa Melayu)
 * @author Anakmalaysia
 */
$messages['ms'] = array(
	'echo-desc' => 'Sistem pemberitahuan',
	'prefs-echo' => 'Pemberitahuan',
	'prefs-displaynotifications' => 'Pilihan paparan',
	'prefs-emailfrequency' => 'Bilakah ingin anda menerima pemberitahuan melalui e-mel?',
	'prefs-echosubscriptions' => 'Beritahu saya apabila seseorang…',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-mel',
	'echo-pref-subscription-edit-user-talk' => 'Mengepos di halaman perbualan saya',
	'echo-pref-subscription-article-linked' => 'Mewujudkan pautan kepada halaman yang saya cipta',
	'echo-pref-subscription-reverted' => 'Membalikkan suntingan saya',
	'echo-pref-subscription-mention' => 'Menyebut saya',
	'echo-pref-email-frequency-never' => 'Jangan hantar sebarang pemberitahuan e-mel kepada saya',
	'echo-pref-email-frequency-immediately' => 'Pemberitahuan satu persatu',
	'echo-pref-email-frequency-daily' => 'Ringkasan pemberitahuan harian',
	'echo-pref-email-frequency-weekly' => 'Ringkasan pemberitahuan mingguan',
	'echo-pref-notify-hide-link' => 'Sorokkan pautan dan lencana untuk pemberitahuan di dalam palang alatan saya',
	'echo-dismiss-button' => 'Singkir',
	'echo-dismiss-message' => 'Matikan semua pemberitahuan $1',
	'echo-dismiss-prefs-message' => 'Anda boleh memasangnya semula dalam Keutamaan',
	'echo-category-title-edit-user-talk' => 'Pos halaman perbualan',
	'echo-category-title-page-linked' => 'Halaman telah dipautkan', # Fuzzy
	'echo-category-title-reverted' => 'Suntingan dibalikkan',
	'echo-category-title-mention' => 'Sebutan',
	'echo-category-title-other' => 'Lain-lain',
	'echo-category-title-system' => 'Sistem',
	'echo-no-agent' => '[Tiada Sesiapa]',
	'echo-no-title' => '[Tiada halaman]',
	'echo-error-no-formatter' => 'Tiada pemformatan yang ditetapkan untuk pemberitahuan',
	'echo-error-preference' => 'Ralat: Keutamaan pengguna tidak boleh ditetapkan',
	'echo-error-token' => 'Ralat: Token pengguna tidak dapat diambil',
	'notifications' => 'Pemberitahuan',
	'tooltip-pt-notifications' => 'Pemberitahuan anda',
	'echo-specialpage' => 'Pemberitahuan',
	'echo-anon' => 'Untuk menerima pemberitahuan, sila [[Special:Userlogin/signup|buka akaun]] atau [[Special:UserLogin|log masuk]].',
	'echo-none' => 'Tiada pemberitahuan untuk anda.',
	'echo-more-info' => 'Maklumat lanjut',
	'notification-edit-talk-page2' => '[[User:$1|$1]] telah mengepos di [[User talk:$2|halaman perbualan]] anda.',
	'notification-edit-talk-page-flyout2' => '$1 telah mengepos di [[User talk:$2|halaman perbualan]] anda.',
	'notification-add-comment2' => '[[User:$1|$1]] telah {{GENDER:$1|mengulas}} tentang "[[$3|$2]]" di halaman perbualan "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] telah mengepos topik baru, "$2", di [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] telah {{GENDER:$1|mengirim}} pesanan kepada anda: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] telah {{GENDER:$1|mengulas}} tentang "[[$3#$2|$2]]" di halaman perbualan anda',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|menyebut}} anda di [[$3#$2|$3]].',
	'notification-mention-flyout' => '$1 {{GENDER:$1|menyebut}} anda di [[$3#$2|$3]].',
	'notification-user-rights' => 'Hak-hak pengguna anda telah {{GENDER:$1|diubah}} oleh [[User:$1|$1]]. $2. [[Special:ListGroupRights|Ketahui lebih lanjut]]',
	'notification-user-rights-flyout' => 'Hak-hak pengguna anda telah {{GENDER:$1|diubah}} oleh $1. $2. [[Special:ListGroupRights|Ketahui lebih lanjut]]',
	'notification-user-rights-add' => 'Anda kini menganggotai {{PLURAL:$2|kumpulan|kumpulan-kumpulan ini:}} $1',
	'notification-user-rights-remove' => 'Anda tidak lagi menganggotai {{PLURAL:$2|kumpulan|kumpulan-kumpulan ini:}} $1',
	'notification-new-user' => 'Selamat datang ke {{SITENAME}}, $1!', # Fuzzy
	'notification-reverted2' => '{{PLURAL:$4|Suntingan|Suntingan-suntingan}} anda di [[$2]] telah {{GENDER:$1|dibalikkan}} oleh [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Suntingan|Suntingan-suntingan}} anda di $2 telah {{GENDER:$1|dibalikkan}} oleh $1 $3',
	'notification-edit-talk-page-email-subject2' => 'Anda mendapat pesanan baru di halaman perbualan',
	'notification-edit-talk-page-email-body2' => 'Pengguna {{SITENAME}}, $1 telah {{GENDER:$1|mengepos}} di halaman perbualan anda:

$3

Baca selanjutnya:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|mengepos}} pada halaman perbualan anda',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Suntingan|Suntingan-suntingan}} anda di $2 telah dibalikkan oleh $1',
	'notification-reverted-email-body2' => '{{PLURAL:$7|Suntingan|Suntingan-suntingan}} anda di $2 telah {{GENDER:$1|dibalikkan}} oleh $1.

$5

Baca selanjutnya:

$3

$6',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Suntingan|Suntingan-suntingan}} anda di $2 telah dibalikkan oleh $1',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|menyebut}} anda di {{SITENAME}}',
	'notification-mention-email-body' => 'Pengguna {{SITENAME}}, $1 telah {{GENDER:$1|menyebut}} anda di $2.

$3

Baca selanjutnya:

$4

$5',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|menyebut}} anda di $2',
	'notification-user-rights-email-subject' => 'Hak-hak pengguna anda telah berubah di {{SITENAME}}',
	'notification-user-rights-email-body' => 'Hak-hak pengguna anda telah {{GENDER:$1|diubah}} oleh $1. $2

Lihat selanjutnya:
{{canonicalurl:{{#special:ListGroupRights}}}}

$3',
	'notification-user-rights-email-batch-body' => 'Hak-hak pengguna anda telah {{GENDER:$1|diubah}} oleh $1. $2',
	'echo-email-subject-default' => 'Pemberitahuan baru di {{SITENAME}}',
	'echo-email-body-default' => 'Anda menerima pemberitahuan baru di {{SITENAME}}:

$1',
	'echo-email-footer-default' => '$2

Untuk mengubah pesanan-pesanan e-mel yang anda hendak kami hantar, kunjungi:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 pemberitahuan baru',
	'echo-link' => 'Pemberitahuan',
	'echo-overlay-link' => 'Semua pemberitahuan',
	'echo-overlay-title' => 'Pemberitahuan',
	'echo-overlay-title-overflow' => 'Pemberitahuan (memaparkan $1 daripada $2 yang belum dibaca)',
	'echo-date-today' => 'Hari ini',
	'echo-date-yesterday' => 'Semalam',
	'echo-load-more-error' => 'Ralat berlaku ketika mengambil lebih banyak hasil.',
	'echo-email-batch-subject-daily' => 'Anda ada $1 {{PLURAL:$2|pemberitahuan}} hari ini',
	'echo-email-batch-subject-weekly' => 'Anda ada $1 {{PLURAL:$2|pemberitahuan}} minggu ini',
	'echo-email-batch-body-daily' => '$1,

Anda ada $2 {{PLURAL:$3|pemberitahuan}} di {{SITENAME}} hari ini. Sila baca di sini:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,

Anda ada $2 {{PLURAL:$3|pemberitahuan}} di {{SITENAME}} minggu ini. Sila baca di sini:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-category-header' => '$1 pemberitahuan $2',
);

/** Maltese (Malti)
 * @author Chrisportelli
 */
$messages['mt'] = array(
	'echo-desc' => 'Sistema għan-notifiki',
	'prefs-echo' => 'Notifiki',
	'prefs-emailfrequency' => 'Kemm huma spissi n-notifiki li nirċievi', # Fuzzy
	'echo-no-agent' => '[Ħadd]',
	'echo-no-title' => '[L-ebda paġna]',
	'notifications' => 'Notifiki',
	'echo-specialpage' => 'Notifiki tiegħi',
	'echo-anon' => 'Sabiex tirċievi notifiki, [[Special:Userlogin/signup|oħloq kont]] jew [[Special:UserLogin|illoggja]].',
	'echo-none' => "M'għandek l-ebda notifiki",
	'notification-new-user' => 'Merħba fuq {{SITENAME}}, $1!',
	'echo-email-subject-default' => 'Notifika ġdida fuq {{SITENAME}}',
	'echo-email-body-default' => 'Għandek notifika ġdida fuq {{SITENAME}}:

$1',
	'echo-link-new' => '{{PLURAL:$1|notifika ġdida|$1 notifiki ġodda}}',
	'echo-link' => 'Notifiki tiegħi', # Fuzzy
	'echo-overlay-link' => 'Notifiki kollha…', # Fuzzy
	'echo-overlay-title' => 'Notifiki tiegħi',
);

/** Low German (Plattdüütsch)
 * @author Joachim Mos
 */
$messages['nds'] = array(
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-Mail',
	'echo-category-title-other' => 'Annere',
);

/** Dutch (Nederlands)
 * @author Kippenvlees1
 * @author Nemo bis
 * @author Rcdeboer
 * @author SPQRobin
 * @author Siebrand
 * @author User555
 */
$messages['nl'] = array(
	'echo-desc' => 'Meldingensysteem',
	'prefs-echo' => 'Meldingen',
	'prefs-displaynotifications' => 'Weergaveopties',
	'prefs-emailfrequency' => 'Wanneer wilt u melding via e-mail ontvangen?',
	'prefs-echosubscriptions' => 'U een melding sturen wanneer iemand...',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-mail',
	'echo-pref-subscription-edit-user-talk' => 'Een bericht plaatst op uw overlegpagina',
	'echo-pref-subscription-article-linked' => 'Een koppeling maakt naar een pagina die u hebt aangemaakt',
	'echo-pref-subscription-reverted' => 'Een bewerking van u terugdraait',
	'echo-pref-subscription-mention' => 'U noemt',
	'echo-pref-email-frequency-never' => 'U geen meldingen via e-mail sturen',
	'echo-pref-email-frequency-immediately' => 'Individuele meldingen als ze binnenkomen',
	'echo-pref-email-frequency-daily' => 'Een dagelijkse samenvatting van meldingen',
	'echo-pref-email-frequency-weekly' => 'Een wekelijkse samenvatting van meldingen',
	'echo-pref-notify-hide-link' => 'Koppeling en badge voor meldingen in uw werkbalk verbergen',
	'echo-dismiss-button' => 'Sluiten',
	'echo-dismiss-message' => 'Alle meldingen uitschakelen over $1',
	'echo-dismiss-prefs-message' => 'U kunt deze inschakelen in uw voorkeuren',
	'echo-category-title-edit-user-talk' => 'berichten op uw overlegpagina',
	'echo-category-title-page-linked' => "Gekoppelde pagina's",
	'echo-category-title-reverted' => 'Bewerking teruggedraaid',
	'echo-category-title-mention' => 'Genoemd',
	'echo-category-title-other' => 'Overige',
	'echo-category-title-system' => 'Systeem',
	'echo-no-agent' => '[Niemand]',
	'echo-no-title' => '[Geen pagina]',
	'echo-error-no-formatter' => 'Er is geen opmaak ingesteld voor de melding',
	'echo-error-preference' => 'Fout: de gebruikersinstelling kon niet ingesteld worden',
	'echo-error-token' => 'Fout: het gebruikerstoken kon niet opgehaald worden',
	'notifications' => 'Meldingen',
	'tooltip-pt-notifications' => 'Uw meldingen',
	'echo-specialpage' => 'Meldingen',
	'echo-anon' => '[[Special:Userlogin/signup|Maak een gebruiker aan]] of [[Special:UserLogin|meld u aan]] als u meldingen wilt ontvangen.',
	'echo-none' => 'U hebt geen meldingen.',
	'echo-more-info' => 'Meer info',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|heeft een bericht geplaatst}} op uw [[User talk:$2|overlegpagina]].',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|heeft een bericht geplaatst}} op uw [[User talk:$2|overlegpagina]].',
	'notification-page-linked' => '[[$2|$2]] is {{GENDER:$1|gekoppeld}} vanaf [[$3|$3]]: [[Special:WhatLinksHere/$2|alle koppelingen naar deze pagina bekijken]]',
	'notification-page-linked-flyout' => '$2 is {{GENDER:$1|gekoppeld}} vanaf $3: [[Special:WhatLinksHere/$2|alle koppelingen naar deze pagina bekijken]]',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|heeft gereageerd}} op "[[$3|$2]]" op de overlegpagina "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|heeft}} een nieuw onderwerp "$2" geplaatst op [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|heeft}} u een bericht gezonden: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|heeft gereageerd}} op "[[$3#$2|$2]]" op uw overlegpagina',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|heeft}} u genoemd op [[$3#$2|$3]].',
	'notification-mention-flyout' => '$1 {{GENDER:$1|heeft}} u genoemd op [[$3#$2|$3]].',
	'notification-user-rights' => 'Uw gebruikersrechten zijn {{GENDER:$1|gewijzigd}} door [[User:$1|$1]]. $2. [[Special:ListGroupRights|Meer informatie]]',
	'notification-user-rights-flyout' => 'Uw gebruikersrechten zijn {{GENDER:$1|gewijzigd}} door $1. $2. [[Special:ListGroupRights|Meer informatie]]',
	'notification-user-rights-add' => 'U bent nu lid van deze groep{{PLURAL:$2||en}}: $1',
	'notification-user-rights-remove' => 'U bent niet langer lid van deze groep{{PLURAL:$2||en}}: $1',
	'notification-new-user' => 'Welkom op {{SITENAME}}, $1! We zijn blij dat u hier bent.',
	'notification-reverted2' => 'Uw {{PLURAL:$4|bewerking op [[$2]] is|bewerkingen op [[$2]] zijn}} {{GENDER:$1|teruggedraaid}} [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => 'Uw {{PLURAL:$4|bewerking op $2 is|bewerkingen op $2 zijn}} {{GENDER:$1|teruggedraaid}} door $1 $3',
	'notification-edit-talk-page-email-subject2' => 'U hebt een nieuw bericht op uw overlegpagina',
	'notification-edit-talk-page-email-body2' => 'Gebruiker $1 van {{SITENAME}} {{GENDER:$1|heeft}} een bericht op uw overlegpagina geplaatst:

$3

Meer bekijken:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|heeft}} een bericht achtergelaten op uw overlegpagina',
	'notification-page-linked-email-subject' => 'Een pagina die u hebt aangemaakt is gekoppeld op {{SITENAME}}',
	'notification-page-linked-email-body' => '$2 is {{GENDER:$1|gekoppeld}} vanaf $4

Alle koppelingen naar deze pagina bekijken:

{{canonicalurl:{{#special:WhatLinksHere/$2}}}}

$3',
	'notification-page-linked-email-batch-body' => '$2 is {{GENDER:$1|gekoppeld}} vanaf $3',
	'notification-reverted-email-subject2' => 'Uw {{PLURAL:$3|bewerking op $2 is|bewerkingen op $2 zijn}} {{GENDER:$1|teruggedraaid}} door $1',
	'notification-reverted-email-body2' => 'Uw {{PLURAL:$7|bewerking op $2 is|bewerkingen op $2 zijn}} {{GENDER:$1|teruggedraaid}} door $1.

$5

Meer bekijken:

$3

$6',
	'notification-reverted-email-batch-body2' => 'Uw {{PLURAL:$3|bewerking op $2 is|bewerkingen op $2 zijn}} {{GENDER:$1|teruggedraaid}} door $1',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|heeft}} u genoemd op {{SITENAME}}',
	'notification-mention-email-body' => '$1 van {{SITENAME}} {{GENDER:$1|heeft}} u genoemd op $2.

$3

Meer bekijken:

$4

$5',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|heeft}} u genoemd op $2',
	'notification-user-rights-email-subject' => 'Uw gebruikersrechten op {{SITENAME}} zijn gewijzigd',
	'notification-user-rights-email-body' => 'Uw gebruikersrechten zijn {{GENDER:$1|gewijzigd}} door $1. $2
Meer informatie:

{{canonicalurl:{{#special:ListGroupRights}}}}

$3',
	'notification-user-rights-email-batch-body' => 'Uw gebruikersrechten zijn {{GENDER:$1|gewijzigd}} door $1. $2',
	'echo-email-subject-default' => 'Nieuwe melding op {{SITENAME}}',
	'echo-email-body-default' => 'U hebt een nieuwe melding op {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'U hebt een nieuwe melding',
	'echo-email-footer-default' => '$2

Volg de volgende koppeling om uw e-mailvoorkeuren te wijzigen of om u uit te schrijven:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '{{PLURAL:$1|1 nieuwe melding|$1 nieuwe meldingen}}',
	'echo-link' => 'Meldingen',
	'echo-overlay-link' => 'Alle meldingen',
	'echo-overlay-title' => 'Meldingen',
	'echo-overlay-title-overflow' => 'Meldingen ($1 van $2 ongelezen)',
	'echo-date-today' => 'Vandaag',
	'echo-date-yesterday' => 'Gisteren',
	'echo-load-more-error' => 'Er is een fout opgetreden tijdens het ophalen van meer resultaten.',
	'notification-edit-talk-page-bundle' => '$1 en $3 andere{{PLURAL:$4||anderen}} hebben een bericht {{GENDER:$1|geplaatst}} op uw [[User talk:$2|overlegpagina]].',
	'notification-page-linked-bundle' => "$2 is {{GENDER:$1|gekoppeld}} vanaf $3 en $4 andere pagina{{PLURAL:$5||'s}}. [[Special:WhatLinksHere/$2|Alle koppelingen naar deze pagina bekijken]]",
	'echo-email-batch-subject-daily' => 'U hebt vandaag {{PLURAL:$2|0=geen meldingen|één melding|$1 meldingen}}',
	'echo-email-batch-subject-weekly' => 'U hebt deze week {{PLURAL:$2|0=geen meldingen|één melding|$1 meldingen}}',
	'echo-email-batch-body-daily' => '$1,
U hebt vandaag {{PLURAL:$3|0=geen meldingen|één melding|$2 meldingen}} op {{SITENAME}}. Hier kunt u uw meldingen bekijken:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,
U hebt deze week {{PLURAL:$3|0=geen meldingen|één melding|$2 meldingen}} op {{SITENAME}}. Hier kunt u uw meldingen bekijken:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-category-header' => '$1 $2 melding{{PLURAL:$1||en}}',
);

/** Nederlands (informeel)‎ (Nederlands (informeel)‎)
 * @author Siebrand
 */
$messages['nl-informal'] = array(
	'tooltip-pt-notifications' => 'Jouw meldingen',
	'echo-none' => 'Je hebt geen meldingen.',
	'echo-email-body-default' => 'Je hebt een nieuwe melding op {{SITENAME}}:

$1',
	'echo-email-footer-default' => '$2

Volg de volgende koppeling om je e-mailvoorkeuren te wijzigen of om je uit te schrijven:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-batch-subject-daily' => 'Je hebt vandaag {{PLURAL:$2|0=geen meldingen|één melding|$1 meldingen}}',
	'echo-email-batch-subject-weekly' => 'Je hebt deze week {{PLURAL:$2|0=geen meldingen|één melding|$1 meldingen}}',
	'echo-email-batch-body-daily' => '$1,
Je hebt vandaag {{PLURAL:$3|0=geen meldingen|één melding|$2 meldingen}} op {{SITENAME}}. Hier kan je je meldingen bekijken:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,
Je hebt deze week {{PLURAL:$3|0=geen meldingen|één melding|$2 meldingen}} op {{SITENAME}}. Hier kan je je meldingen bekijken:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
);

/** Polish (polski)
 * @author Ankry
 * @author Base
 * @author BeginaFelicysym
 * @author Chrumps
 * @author Matma Rex
 * @author Odie2
 * @author Przemub
 * @author WTM
 * @author Woytecr
 */
$messages['pl'] = array(
	'echo-desc' => 'System powiadomień',
	'prefs-echo' => 'Powiadomienia',
	'prefs-displaynotifications' => 'Opcje wyświetlania',
	'prefs-emailfrequency' => 'Kiedy chcesz otrzymywać powiadomienia e-mailem?',
	'prefs-echosubscriptions' => 'Powiadom mnie gdy ktoś…',
	'echo-pref-subscription-edit-user-talk' => 'napisze na mojej stronie dyskusji',
	'echo-pref-subscription-article-linked' => 'stworzy link do strony utworzonej przeze mnie',
	'echo-pref-subscription-reverted' => 'cofnie moją edycję',
	'echo-pref-subscription-mention' => 'wspomni o mnie',
	'echo-pref-email-frequency-never' => 'Nie wysyłaj powiadomień e-mailem',
	'echo-pref-email-frequency-immediately' => 'Każde powiadomienie osobno',
	'echo-pref-email-frequency-daily' => 'Dzienne podsumowanie',
	'echo-pref-email-frequency-weekly' => 'Tygodniowe podsumowanie',
	'echo-pref-notify-hide-link' => 'Ukryj link i znacznik powiadomień w moim pasku narzędzi',
	'echo-no-agent' => '[Nikt]',
	'echo-no-title' => '[Brak strony]',
	'echo-error-no-formatter' => 'Nie określono formatowania dla powiadomień',
	'notifications' => 'Powiadomienia',
	'tooltip-pt-notifications' => 'Twoje powiadomienia',
	'echo-specialpage' => 'Powiadomienia',
	'echo-anon' => 'Aby otrzymywać powiadomienia [[Special:Userlogin/signup|utwórz konto]] lub [[Special:UserLogin|zaloguj się]].',
	'echo-none' => 'Nie masz żadnych powiadomień.',
	'echo-more-info' => 'Więcej informacji na temat',
	'notification-new-user' => 'Witaj na stronach {{SITENAME}}, $1!', # Fuzzy
	'echo-notification-count' => '$1+',
	'echo-email-subject-default' => 'Nowe powiadomienie na {{SITENAME}}',
	'echo-email-body-default' => 'Masz nowe powiadomienie na {{SITENAME}}:

$1',
	'echo-email-footer-default' => '$2

Aby ustalić jakie wiadomości mamy CI przesyłać, odwiedź:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nowe powiadomienie|nowe powiadomienia|nowych powiadomień}}',
	'echo-link' => 'Powiadomienia',
	'echo-overlay-link' => 'Wszystkie powiadomienia',
	'echo-overlay-title' => 'Powiadomienia',
	'echo-overlay-title-overflow' => 'Moje powiadomienia (wyświetlono $1 z $2 nieprzeczytanych)', # Fuzzy
	'echo-date-today' => 'Dzisiaj',
	'echo-date-yesterday' => 'Wczoraj',
	'echo-date-header' => '$1 $2',
	'echo-load-more-error' => 'Wystąpił błąd przy pobieraniu kolejnych wyników.',
	'echo-email-batch-subject-daily' => 'Posiadasz $1 {{PLURAL:$2|powiadomienie|powiadomień}} z dzisiejszego dnia',
	'echo-email-batch-subject-weekly' => 'Posiadasz $1 {{PLURAL:$2|powiadomienie|powiadomień}} z tego tygodnia',
	'echo-email-batch-body-daily' => '$1,

Posiadasz $2 {{PLURAL:$3|powiadomienie|powiadomienia|powiadomień}} na {{SITENAME}} z dzisiejszego dnia. Możesz je zobaczyć tutaj:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,

Posiadasz $2 {{PLURAL:$3|powiadomienie|powiadomienia|powiadomień}} na {{SITENAME}} z tego tygodnia. Możesz je zobaczyć tutaj:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
);

/** Piedmontese (Piemontèis)
 * @author Borichèt
 * @author Dragonòt
 */
$messages['pms'] = array(
	'echo-desc' => 'Sistema ëd notìfiche',
	'prefs-echo' => 'Notìfiche',
	'prefs-displaynotifications' => 'Opsion ëd visualisassion',
	'prefs-emailsubscriptions' => 'Aviseme për pòsta eletrònica quand quaidun',
	'prefs-emailfrequency' => 'Quand it veus-to arseive le notìfiche ëd corel?',
	'echo-pref-email-edit-user-talk' => 'Mëssage ansima a mia pàgina ëd discussion',
	'echo-pref-email-article-linked' => "Crea un colegament a na pagina che i l'heu creà",
	'echo-pref-email-reverted' => 'Buta andré mia modìfica',
	'echo-pref-email-frequency-never' => 'Mandeme gnun-e notìfiche për pòsta eletrònica',
	'echo-pref-email-frequency-immediately' => 'Notìfiche andividuaj com che a rivo',
	'echo-pref-email-frequency-daily' => 'Un resumé cotidian dle notìfiche',
	'echo-pref-email-frequency-weekly' => 'Un resumé ebdomadari dle notìfiche',
	'echo-pref-notify-hide-link' => "Stërmé la liura e l'ansëgna për le notìfiche an mia bara dj'utiss",
	'echo-no-agent' => '[Gnun]',
	'echo-no-title' => '[Gnun-a pàgina]',
	'echo-error-no-formatter' => 'Gnun formà definì për la notìfica',
	'notifications' => 'Notìfiche',
	'tooltip-pt-notifications' => 'Toe notìfiche',
	'echo-specialpage' => 'Mie notìfiche',
	'echo-anon' => "Për arseive dle notìfiche, [[Special:Userlogin/signup|ch'a crea un cont]] o [[Special:UserLogin|ch'a intra ant ël sistema]].",
	'echo-none' => "A l'ha gnun-e notìfiche.",
	'echo-more-info' => 'Pi anformassion',
	'notification-edit-talk-page2' => "[[User:$1|$1]] {{GENDER:$1|a l'ha mandà}} dzor toa [[User talk:$2|pagina ëd discussion]].",
	'notification-edit-talk-page-flyout2' => "$1 {{GENDER:$1|a l'ha mandà}} dzora soa [[User talk:$2|pàgina ëd ciaciarade]].",
	'notification-article-linked2' => "$3 {{PLURAL:$4|a l'era|a j'ero}} {{GENDER:$1|colegà}} da [[User:$1|$1]] da sta pagina: [[$2]]",
	'notification-article-linked-flyout2' => "$3 {{PLURAL:$4|a l'era|a j'ero}} {{GENDER:$1|colegà}} da $1 da sta pagina: [[$2]]",
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|a l\'ha comentà}} dzor "[[$3|$2]]" dzor la pagina ëd discussion "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|a l\'ha mandà}} n\'argoment neuv "$2" dzor [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|a l\'ha manda}}te un mëssagi: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|a l\'ha comentà}} dzor "[[$3#$2|$2]]" dzor toa pagina ëd discussion',
	'notification-new-user' => 'Bin-ëvnù an {{SITENAME}}, $1!',
	'notification-new-user-content' => "Për piasì, ch'as visa ëd firmé tut coment an sle pàgine ëd discussion con 4 tilde (~~~~).",
	'notification-reverted2' => "Toa {{PLURAL:$4|modìfica dzor [[$2]] a l'é stàita|modìfiche dzor [[$2]] a son stàite}} {{GENDER:$1|ripristinà}} da [[User:$1|$1]] $3",
	'notification-reverted-flyout2' => "Toa {{PLURAL:$4|modìfica dzor $2 a l'é stàita|modìfiche dzor $2 a son stàite}} {{GENDER:$1|ripristinà}} da $1 $3",
	'notification-edit-talk-page-email-subject2' => "A l'ha un mëssagi neuv an soa pàgina ëd ciaciarade",
	'notification-edit-talk-page-email-body2' => "{{SITENAME}} utent $1 {{GENDER:$1|a l'ha mandà}} dzor toa pagina ëd discussion:

$3

Vëdde ëd pi:

$2

$4",
	'notification-edit-talk-page-email-batch-body2' => "$1 {{GENDER:$1|a l'ha mandà}} dzor toa pagina ëd discussion",
	'notification-article-linked-email-subject2' => "{{PLURAL:$2|Na pagina|Dle pagine}} ch'it l'has ancaminà {{PLURAL:$2|a l'é stàita|a son stàite}} referensià crosià dzor {{SITENAME}}", # Fuzzy
	'notification-article-linked-email-body2' => "$4 {{PLURAL:$5|a l'é stàit|a son stàite}} {{GENDER:$1|colegà}} da {{SITENAME}} utent $1, da sta pagina: $2

Vëdde ëd pi:

$3

$6",
	'notification-article-linked-email-batch-body2' => "$2 {{PLURAL:$3|a l'é stàit|a son stàit}} {{GENDER:$1|colegà}} da $1",
	'notification-reverted-email-subject2' => "{{PLURAL:$3|Toa modìfica dzor $2 a l'é stàit|Toe modìfiche dzor $2 a son stàite}} {{GENDER:$1|ripristinà}} da $1",
	'notification-reverted-email-body2' => "{{PLURAL:$7|Toa modìfica dzor $2 a l'é stàita|Toe modìfiche dzor $2 a son stàite}} {{GENDER:$1|ripristinà}} da $1.

$5

Vëdde ëd pi:

$3

$6",
	'notification-reverted-email-batch-body2' => "{{PLURAL:$3|Toa modìfica dzor $2 a l'é stàit|Toe modìfiche dzor $2 a son stàite}} {{GENDER:$1|ripristinà}} da $1",
	'echo-email-subject-default' => 'Notìfiche neuve a {{SITENAME}}',
	'echo-email-body-default' => "It l'has na notìfica neuva a {{SITENAME}}:

$1",
	'echo-email-footer-default' => "$2

Për controlé che mëssagi i-j mandoma, ch'a vìsita:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1",
	'echo-link-new' => '$1 {{PLURAL:$1|notifìca neuva|notifìche neuve}}',
	'echo-link' => 'Notìfiche',
	'echo-overlay-link' => 'Tute le notìfiche',
	'echo-overlay-title' => 'Mie notìfiche',
	'echo-overlay-title-overflow' => 'Mie notìfiche (as na mostro $1 ëd $2 nen lesùe)',
	'echo-date-today' => 'Ancheuj',
	'echo-date-yesterday' => 'Jer',
	'echo-load-more-error' => "A l'é capitaje n'eror an recuperand pi d'arzultà.",
	'echo-email-batch-subject-daily' => "It l'has $1 {{PLURAL:$2|notìfica|notìfiche}} ancheuj",
	'echo-email-batch-subject-weekly' => "It l'has $1 {{PLURAL:$2|notìfica|notìfiche}} sta sman-a",
	'echo-email-batch-body-daily' => "$1,

It l'has $2 {{PLURAL:$3|notìfica|notìfiche}} dzora {{SITENAME}} ancheuj.  Vardje ambelessì:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5",
	'echo-email-batch-body-weekly' => "$1,

It l'has $2 {{PLURAL:$3|notìfica|notìfiche}} dzora {{SITENAME}} sta sman-a.  Vardje ambelessì:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5",
	'echo-email-batch-category-header-edit-user-talk' => '$1 {{PLURAL:$1|mëssagi}} ëd pàgina ëd ciaciarade',
	'echo-email-batch-category-header-edit-revert' => '$1 {{PLURAL:$1|Modifica|Modifiche}} anulà',
	'echo-email-batch-category-header-cross-reference' => '$1 {{PLURAL:$1|referensià ancrosià}}',
	'echo-email-batch-category-header-other' => '$1 {{PLURAL:$1|Àutr|Àutri}}',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'prefs-echo' => 'يادګيرنې',
	'notifications' => 'يادګيرنې',
	'echo-specialpage' => 'زما يادګيرنې',
	'echo-none' => 'تاسې هېڅ يادګيرنې نه لرۍ.',
	'notification-new-user' => '$1 {{SITENAME}} ته ښه راغلې!',
	'echo-link-new' => '$1 نوې {{PLURAL:$1|يادګيرنه|يادګيرنې}}',
	'echo-link' => 'يادګيرنې',
	'echo-overlay-link' => 'ټولې يادګيرنې',
	'echo-overlay-title' => 'زما يادګيرنې',
	'echo-date-today' => 'نن',
	'echo-date-yesterday' => 'پرون',
	'echo-email-batch-category-header-edit-user-talk' => '$1 خبرو اترو مخ {{PLURAL:$1|پيغام|پيغامونه}}',
);

/** Romanian (română)
 * @author Firilacroco
 * @author Minisarm
 * @author Stelistcristi
 */
$messages['ro'] = array(
	'echo-desc' => 'Sistem de notificări',
	'prefs-echo' => 'Notificări',
	'prefs-displaynotifications' => 'Opțiuni de afișare',
	'prefs-emailsubscriptions' => 'Notifică-mă prin email când cineva',
	'echo-pref-email-edit-user-talk' => 'Mesaje pe pagina mea de discuții',
	'echo-pref-email-reverted' => 'Anulează modificarea mea',
	'echo-pref-email-frequency-daily' => 'Un rezumat zilnic al notificărilor',
	'echo-pref-email-frequency-weekly' => 'Un rezumat săptămânal al notificărilor',
	'echo-pref-notify-hide-link' => 'Ascunde legătura și insigna pentru notificări în bara mea de instrumente',
	'echo-no-agent' => '[Nimeni]',
	'echo-no-title' => '[Nicio pagină]',
	'notifications' => 'Notificări',
	'tooltip-pt-notifications' => 'Notificările dv.',
	'echo-specialpage' => 'Notificările mele',
	'echo-anon' => 'Pentru a primi notificări, [[Special:Userlogin/signup|creați-vă un cont]] sau [[Special:UserLogin|autentificați-vă]].',
	'echo-none' => 'Nu aveți nicio notificare.',
	'notification-new-user' => 'Bine ați venit pe {{SITENAME}}, $1!',
	'echo-email-subject-default' => 'Notificare nouă la {{SITENAME}}',
	'echo-email-body-default' => 'Aveți o notificare nouă la {{SITENAME}}:

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|notificare|notificări}} nouă/noi',
	'echo-link' => 'Notificările mele', # Fuzzy
	'echo-overlay-link' => 'Toate notificările...', # Fuzzy
	'echo-overlay-title' => 'Notificările mele',
	'echo-overlay-title-overflow' => 'Notificările mele (se afișează $1 din $2 necitit/e)',
	'echo-date-today' => 'Astăzi',
	'echo-date-yesterday' => 'Ieri',
	'echo-load-more-error' => 'A intervenit o eroare la obținerea mai multor rezultate.',
	'echo-email-batch-subject-daily' => 'Aveți $1 {{PLURAL:$2|notificare|notificări}} astăzi',
	'echo-email-batch-subject-weekly' => 'Aveți $1 {{PLURAL:$2|notificare|notificări}} în această săptămână',
);

/** tarandíne (tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'echo-desc' => 'Sisteme de notifiche',
	'prefs-echo' => 'Notificaziune',
	'prefs-displaynotifications' => 'Opziune de visualizzazzione',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-mail',
	'echo-pref-subscription-reverted' => "Annulle 'u cangiamende mie",
	'echo-no-agent' => '[Nisciune]',
	'echo-no-title' => '[Nisciuna vôsce]',
	'notifications' => 'Notificaziune',
	'tooltip-pt-notifications' => 'Le notifiche tune',
	'echo-specialpage' => 'Notificaziune',
	'echo-none' => 'Non ge tìne notifiche.',
	'echo-more-info' => "Cchiù 'mbormaziune",
	'notification-new-user' => "Bovègne jndr'à {{SITENAME}}, $1! Nuje sime cundende ca ste aqquà.",
	'notification-edit-talk-page-email-subject2' => "Tu è 'nu messàgge nuève sus 'a pàgene de le 'ngazzaminde",
	'echo-email-body-default' => "Tu è 'na notifica nove sus a {{SITENAME}}:

$1",
	'echo-link' => 'Notificaziune',
	'echo-overlay-link' => 'Tutte le notificaziune',
	'echo-date-today' => 'Osce',
	'echo-date-yesterday' => 'Ajere',
	'echo-email-batch-subject-daily' => 'Tu è $1 {{PLURAL:$2|notifiche}} osce',
	'echo-email-batch-subject-weekly' => 'Tu è $1 {{PLURAL:$2|notifiche}} sta sumàne',
	'echo-email-batch-body-daily' => "$1,

Tu è $2 {{PLURAL:$3|notificazione|notificaziune}} sus a {{SITENAME}} osce.  'Ndruchele:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5",
	'echo-email-batch-body-weekly' => "$1,

Tu è $2 {{PLURAL:$3|notificazione|notificaziune}} sus a {{SITENAME}} sta sumàne.  'Ndruchele:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5",
);

/** Russian (русский)
 * @author Base
 * @author DCamer
 * @author David1010
 * @author KPu3uC B Poccuu
 * @author Kaganer
 * @author Kalan
 */
$messages['ru'] = array(
	'echo-desc' => 'Система уведомлений',
	'prefs-echo' => 'Уведомления',
	'prefs-displaynotifications' => 'Настройки отображения',
	'prefs-emailsubscriptions' => 'Сообщите мне по электронной почте, когда кто-то',
	'prefs-emailfrequency' => 'Когда бы вы хотели получать уведомление по электронной почте?',
	'echo-pref-email-edit-user-talk' => 'Пишет на моей странице обсуждения',
	'echo-pref-email-article-linked' => 'Ссылается на созданную мной страницу',
	'echo-pref-email-reverted' => 'Отменяет мои правки',
	'echo-pref-email-frequency-never' => 'Не присылать мне уведомления по электронной почте',
	'echo-pref-email-frequency-immediately' => 'Отдельные уведомления по мере их поступления',
	'echo-pref-email-frequency-daily' => 'Ежедневная сводка уведомлений',
	'echo-pref-email-frequency-weekly' => 'Еженедельная сводка уведомлений',
	'echo-pref-notify-hide-link' => 'Скрыть ссылку и значок для уведомлений в моей панели инструментов',
	'echo-no-agent' => '[Никто]',
	'echo-no-title' => '[Нет страницы]',
	'echo-error-no-formatter' => 'Форматирование не определено для уведомления',
	'notifications' => 'Уведомления',
	'tooltip-pt-notifications' => 'Ваши уведомления',
	'echo-specialpage' => 'Мои уведомления',
	'echo-anon' => 'Чтобы получать уведомления, [[Special:Userlogin/signup|создайте учётную запись]] или [[Special:UserLogin|представьтесь]].',
	'echo-none' => 'Вы не получали уведомлений.',
	'echo-more-info' => 'Подробнее',
	'notification-new-user' => 'Добро пожаловать в {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Пожалуйста, не забывайте подписывать любые комментарии на страницах обсуждения 4 тильдами (~~~~).',
	'echo-email-subject-default' => 'Новые уведомления на {{SITENAME}}',
	'echo-email-body-default' => 'Вы имеете новое уведомление в проекте {{SITENAME}}:

$1',
	'echo-email-footer-default' => '$2

Для управления отправкой вам электронных сообщений посетите:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|новое уведомление|новых уведомлений}}',
	'echo-link' => 'Уведомления',
	'echo-overlay-link' => 'Все уведомления',
	'echo-overlay-title' => 'Мои уведомления',
	'echo-overlay-title-overflow' => 'Мои уведомления (показаны $1 из $2 непрочитанных)',
	'echo-date-today' => 'Сегодня',
	'echo-date-yesterday' => 'Вчера',
	'echo-load-more-error' => 'Произошла ошибка при получении дополнительных результатов.',
	'echo-email-batch-subject-daily' => 'Вы получили $1 {{PLURAL:$2|уведомление|уведомления|уведомлений}} сегодня',
	'echo-email-batch-subject-weekly' => 'Вы получили $1 {{PLURAL:$2|уведомление|уведомления|уведомлений}} на этой неделе',
	'echo-email-batch-body-daily' => '$1,

Вы получили $2 {{PLURAL:$3|уведомление|уведомления|уведомлений}} в проекте {{SITENAME}} сегодня. Увидеть их можно здесь:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,

Вы получили $2 {{PLURAL:$3|уведомление|уведомления|уведомлений}} в проекте {{SITENAME}} на этой неделе. Увидеть их можно здесь:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-category-header-edit-user-talk' => '$1 {{PLURAL:$1|сообщение|сообщений}} на странице обсуждения',
	'echo-email-batch-category-header-edit-revert' => '$1 {{PLURAL:$1|отмена|отмен}} правок',
	'echo-email-batch-category-header-cross-reference' => '$1 {{PLURAL:$1|перекрёстная ссылка|перекрёстные ссылки|перекрёстных ссылок}}',
	'echo-email-batch-category-header-other' => '$1 {{PLURAL:$1|другая|другие|других}}',
);

/** Sinhala (සිංහල)
 * @author පසිඳු කාවින්ද
 */
$messages['si'] = array(
	'echo-desc' => 'නිවේදන පද්ධතිය',
	'prefs-echo' => 'නිවේදන',
	'prefs-displaynotifications' => 'විකල්ප පෙන්වන්න',
	'prefs-emailsubscriptions' => 'මාව විද්‍යුත්-තැපෑලෙන් දැනුවත් කරන්න කවුරුහරි',
	'echo-pref-email-edit-user-talk' => 'මගේ කතාබහ පිටුවේ හසුන්',
	'echo-pref-email-reverted' => 'මගේ සංස්කරණය ප්‍රතිවර්තනය',
	'echo-pref-email-frequency-never' => 'මට විද්‍යුත්-තැපැල් නිවේදන කිසිවක් එවන්න එපා',
	'echo-pref-email-frequency-immediately' => 'තනි තනි නිවේදන ඒවා එන විට',
	'echo-pref-email-frequency-daily' => 'නිවේදනවල දෛනික සාරාංශයක්',
	'echo-pref-email-frequency-weekly' => 'නිවේදනවල සතිපතා සාරාංශයක්',
	'echo-no-agent' => '[කිසිවෙකු නැත]',
	'echo-no-title' => '[පිටුවක් නොමැත]',
	'echo-error-no-formatter' => 'නිවේදනය සඳහා කිසිදු ආකෘතියක් දක්වා නොමැත',
	'notifications' => 'නිවේදන',
	'tooltip-pt-notifications' => 'ඔබේ නිවේදන',
	'echo-specialpage' => 'මගේ නිවේදන',
	'echo-anon' => 'නිවේදන ලබා ගැනීම සඳහා, [[Special:Userlogin/signup|ගිණුමක් තනන්න]] හෝ [[Special:UserLogin|ප්‍රවිෂ්ට වන්න]].',
	'echo-none' => 'ඔබට නිවේදන කිසිවක් නොමැත.',
	'notification-new-user' => '{{SITENAME}} වෙත පිළිගනිමු, $1!',
	'echo-email-subject-default' => '{{SITENAME}} හී නව නිවේදනයක්',
	'echo-email-body-default' => 'ඔබට {{SITENAME}} හීදී නව නිවේදනයක් ඇත:

$1',
	'echo-link-new' => 'නව {{PLURAL:$1|නිවේදන|නිවේදන}} $1', # Fuzzy
	'echo-link' => 'නිවේදන',
	'echo-overlay-link' => 'සියලුම නිවේදන',
	'echo-overlay-title' => 'මගේ නිවේදන',
	'echo-overlay-title-overflow' => 'මගේ නිවේදන (නොකියවූ ඒවා $1 න් $2 පෙන්වමින්)',
	'echo-date-today' => 'අද',
	'echo-date-yesterday' => 'පෙරදින',
	'echo-load-more-error' => 'තවත් ප්‍රතිඑල පමුනුවිමේදී දෝෂයක් හට ගැනුණි.',
	'echo-email-batch-subject-daily' => 'ඔබට අද {{PLURAL:$2|නිවේදන}} $1 ඇත',
	'echo-email-batch-subject-weekly' => 'ඔබට මෙම සතියේ {{PLURAL:$2|නිවේදන}} $1 ඇත',
	'echo-email-batch-category-header-edit-user-talk' => 'කතාබහ පිටු {{PLURAL:$1|පණිවුඩ|පණිවුඩ}} $1', # Fuzzy
	'echo-email-batch-category-header-edit-revert' => 'සංස්කරණ {{PLURAL:$1|ප්‍රතිවර්තන|ප්‍රතිවර්තන}} $1', # Fuzzy
	'echo-email-batch-category-header-other' => '{{PLURAL:$1|වෙනත්|වෙනත්}} $1', # Fuzzy
);

/** Serbian (Cyrillic script) (српски (ћирилица)‎)
 * @author Rancher
 * @author Михајло Анђелковић
 */
$messages['sr-ec'] = array(
	'echo-desc' => 'Обавештајни систем',
	'prefs-echo' => 'Обавештења',
	'prefs-displaynotifications' => 'Поставке приказа',
	'prefs-emailsubscriptions' => 'Обавести ме е-поштом када неко',
	'echo-pref-email-reverted' => 'Врати моју измену',
	'echo-pref-email-frequency-never' => 'Не шаљи ми обавештења преко е-поште',
	'echo-no-agent' => '[Нико]',
	'echo-no-title' => '[Без наслова]', # Fuzzy
	'echo-error-no-formatter' => 'Није задато обликовање за обавештења',
	'notifications' => 'Обавештења',
	'tooltip-pt-notifications' => 'Ваша обавештења',
	'echo-specialpage' => 'Моја обавештења',
	'echo-none' => 'У последње време нисте примили ниједно обавештење.', # Fuzzy
	'echo-link' => 'Моја обавештења', # Fuzzy
	'echo-overlay-link' => 'Сва обавештења…', # Fuzzy
	'echo-overlay-title' => 'Моја обавештења',
	'echo-overlay-title-overflow' => 'Моја обавештења (приказ $1 од $2 непрочитаних)',
	'echo-date-today' => 'Данас',
	'echo-date-yesterday' => 'Јуче',
);

/** Serbian (Latin script) (srpski (latinica)‎)
 */
$messages['sr-el'] = array(
	'prefs-echo' => 'Obaveštenja',
	'echo-no-agent' => '[Niko]',
	'echo-no-title' => '[Bez naslova]', # Fuzzy
	'notifications' => 'Obaveštenja',
	'echo-specialpage' => 'Moja obaveštenja',
	'echo-none' => 'U poslednje vreme niste primili nijedno obaveštenje.', # Fuzzy
	'echo-link' => 'Moja obaveštenja', # Fuzzy
	'echo-overlay-link' => 'Sva obaveštenja…', # Fuzzy
	'echo-overlay-title' => 'Moja obaveštenja',
);

/** Swedish (svenska)
 * @author Ainali
 * @author WikiPhoenix
 */
$messages['sv'] = array(
	'echo-desc' => 'Notifikationssystem',
	'prefs-echo' => 'Meddelanden',
	'prefs-displaynotifications' => 'Visningsalternativ',
	'prefs-emailfrequency' => 'När vill du få e-postmeddelanden?',
	'prefs-echosubscriptions' => 'Meddela mig när någon...',
	'echo-pref-web' => 'Webb',
	'echo-pref-email' => 'E-post',
	'echo-pref-subscription-edit-user-talk' => 'Inlägg på min diskussionssida',
	'echo-pref-subscription-article-linked' => 'Skapar en länk till en sida som jag skapade',
	'echo-pref-subscription-reverted' => 'Återställer min redigering',
	'echo-pref-email-frequency-never' => 'Skicka mig inte några aviseringar via e-postmeddelanden',
	'echo-pref-email-frequency-immediately' => 'Enskilda meddelanden när de kommer',
	'echo-pref-email-frequency-daily' => 'En daglig sammanfattning av aviseringar',
	'echo-pref-email-frequency-weekly' => 'En veckosammanfattning av aviseringar',
	'echo-pref-notify-hide-link' => 'Dölj länken och märket för meddelanden i min verktygslist',
	'echo-dismiss-button' => 'Avfärda',
	'echo-dismiss-message' => 'Stäng av alla $1 notifieringar',
	'echo-category-title-edit-user-talk' => 'Diskussionssideinlägg',
	'echo-category-title-page-linked' => 'Sida länkad',
	'echo-category-title-reverted' => 'Redigering återställd',
	'echo-no-agent' => '[Ingen]',
	'echo-no-title' => '[Ingen sida]',
	'echo-error-no-formatter' => 'Ingen formatering definierad för notifikation',
	'echo-error-preference' => 'Fel: Kunde inte sätta användarens val',
	'echo-error-token' => 'Fel: Det gick inte att hämta användar-token',
	'notifications' => 'Meddelanden',
	'tooltip-pt-notifications' => 'Dina notifieringar',
	'echo-specialpage' => 'Meddelanden',
	'echo-anon' => 'För att ta emot meddelanden, [[Special:Userlogin/signup|skapa ett konto]] eller [[Special:UserLogin|logga in]].',
	'echo-none' => 'Du har inga meddelanden.',
	'echo-more-info' => 'Mer information',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|postade}} på din [[User talk:$2|diskussionssida]].',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|postade}} på din [[User talk:$2|diskussionssida]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|kommenterade}} "[[$3|$2]]" på diskussionssidan för "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|postade}} ett nytt ämne "$2" på [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|skickade}} ett meddelande till dig: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|kommenterade}} "[[$3#$2|$2]]" på din diskussionssida',
	'notification-new-user' => 'Välkommen till {{SITENAME}}, $1! Vi är glada att du är här.',
	'notification-reverted2' => '{{PLURAL:$4|Din redigering|Dina redigeringar}} på [[$2]] har {{GENDER:$1|återställts}} av [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Din redigering|Dina redigeringar}} på $2 har {{GENDER:$1|återställts}} av $1 $3',
	'notification-edit-talk-page-email-subject2' => 'Du har ett nytt meddelande på diskussionssidan',
	'notification-edit-talk-page-email-body2' => '{{SITENAME}} användare $1 {{GENDER:$1|postade}} på din diskussionssida:

$3

Se mer:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|postade}} på din diskussionssida',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Din redigering|Dina redigeringar}} på $2 blev {{GENDER:$1|återställda}} av $1',
	'echo-email-subject-default' => 'Nytt meddelande på {{SITENAME}}',
	'echo-email-body-default' => 'Du har ett nytt meddelande på {{SITENAME}}:

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nytt meddelande|nya meddelanden}}',
	'echo-link' => 'Meddelanden',
	'echo-overlay-link' => 'Alla meddelanden',
	'echo-overlay-title' => 'Meddelanden',
	'echo-overlay-title-overflow' => 'Meddelanden (visar $1 av $2 olästa)',
	'echo-date-today' => 'Idag',
	'echo-date-yesterday' => 'Igår',
	'echo-load-more-error' => 'Ett fel uppstod när fler resultat skulle hämtas.',
	'echo-email-batch-subject-daily' => 'Du har $1 {{PLURAL:$2|meddelande|meddelanden}} idag',
	'echo-email-batch-subject-weekly' => 'Du har $1 {{PLURAL:$2|meddelande|meddelanden}} denna vecka',
);

/** Tamil (தமிழ்)
 * @author Karthi.dr
 * @author Shanmugamp7
 * @author மதனாஹரன்
 */
$messages['ta'] = array(
	'prefs-echo' => 'அறிவிப்புகள்',
	'echo-pref-email-frequency-daily' => 'தினமும் அறிவித்தல்களின் சுருக்கம்',
	'echo-no-title' => '[தலைப்பு இல்லை]', # Fuzzy
	'notifications' => 'அறிவிப்புகள்',
	'echo-specialpage' => 'என் அறிவிப்புகள்',
	'echo-anon' => 'அறிவிப்புகளைப் பெறுவதற்கு [[Special:Userlogin/signup|ஒரு கணக்கை உருவாக்குங்கள்]] அல்லது [[Special:UserLogin|உள்நுழையுங்கள்]].',
	'echo-email-subject-default' => '{{SITENAME}}இல்  புதிய அறிவிப்புகள்',
	'echo-email-body-default' => '{{SITENAME}} இல் உங்களுக்கு ஒரு புதிய அறிவிப்பு உள்ளது:

$1',
	'echo-link-new' => '$1 புதிய {{PLURAL:$1|notification|அறிவிக்கைகள்}}',
	'echo-link' => 'என் அறிவிப்புகள்', # Fuzzy
	'echo-overlay-link' => 'எல்லா அறிவிப்புகள்....', # Fuzzy
	'echo-overlay-title' => 'என் அறிவிப்புகள்',
	'echo-date-today' => 'இன்று',
	'echo-date-yesterday' => 'நேற்று',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 * @author TheSleepyhollow02
 */
$messages['tl'] = array(
	'echo-desc' => 'Pangkasunod na salinlahing imprastruktura ng pagpapabatid para sa MediaWiki', # Fuzzy
	'prefs-echo' => 'Mga pagpapabatid',
	'echo-no-agent' => '[Walang Sinuman]',
	'echo-no-title' => '[Walang Pamagat]', # Fuzzy
	'notifications' => 'Mga pagpapabatid',
	'echo-specialpage' => 'Mga pagpapabatid ko',
	'echo-anon' => 'Upang makatanggap ng mga pagpapabatid, [[Special:Userlogin/signup|lumikha ng isang akawnt]] o [[Special:UserLogin|lumagdang papasok]].',
	'echo-none' => 'Hindi ka nakakatanggap ng anumang mga pagpapabatid nitong mga uling panahon!', # Fuzzy
	'notification-new-user' => 'Maligayang Pagdating sa {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Manyaring tandaan na lumagda ng kahit na anong komento sa mga pahina ng usapan na may 4 na bantas (~~~~).',
	'echo-email-subject-default' => 'Bagong pagpapabatid sa {{SITENAME}}',
	'echo-email-body-default' => 'Mayroon kang isang bagong pagpapabatid doon sa {{SITENAME}}:

$1',
	'echo-link-new' => '$1 bagong {{PLURAL:$1|pagpapabatid|mga pagpapabatid}}',
	'echo-link' => 'Mga pagpapabatid ko', # Fuzzy
	'echo-overlay-link' => 'Lahat ng mga pagpapabatid...', # Fuzzy
	'echo-overlay-title' => 'Mga pagpapabatid ko',
);

/** Turkish (Türkçe)
 * @author Emperyan
 */
$messages['tr'] = array(
	'echo-desc' => 'Bildirim sistemi',
	'prefs-echo' => 'Bildirimler',
	'prefs-displaynotifications' => 'Görüntüleme seçenekleri',
	'echo-none' => 'Bildiriminiz bulunmamakta.',
);

/** Uyghur (Arabic script) (ئۇيغۇرچە)
 * @author Sahran
 */
$messages['ug-arab'] = array(
	'prefs-echo' => 'ئۇقتۇرۇشلار',
	'prefs-displaynotifications' => 'كۆرسىتىش تاللانما',
	'notifications' => 'ئۇقتۇرۇشلار',
	'echo-link' => 'ئۇقتۇرۇشلار',
	'echo-date-today' => 'بۈگۈن',
	'echo-date-yesterday' => 'تۈنۈگۈن',
);

/** Ukrainian (українська)
 * @author Base
 * @author Olvin
 * @author Steve.rusyn
 * @author Ата
 */
$messages['uk'] = array(
	'echo-desc' => 'Система сповіщень',
	'prefs-echo' => 'Сповіщення',
	'prefs-displaynotifications' => 'Опції відображення',
	'prefs-emailsubscriptions' => 'Сповіщати мене через електронну пошту, коли хтось',
	'prefs-emailfrequency' => 'Як часто я отримуватиму сповіщення електронною поштою', # Fuzzy
	'echo-pref-email-edit-user-talk' => 'напише на моїй сторінці обговорення',
	'echo-pref-email-reverted' => 'відкотить моє редагування',
	'echo-pref-email-frequency-never' => 'Не надсилати мені жодних сповіщень електронною поштою',
	'echo-pref-email-frequency-immediately' => 'Сповіщати про кожну подію одразу',
	'echo-pref-email-frequency-daily' => 'Щоденна збірка сповіщень',
	'echo-pref-email-frequency-weekly' => 'Щомісячна збірка сповіщень',
	'echo-pref-notify-hide-link' => 'Приховати посилання та значок сповіщень на моїй панелі інструментів',
	'echo-no-agent' => '[Ніхто]',
	'echo-no-title' => '[Нема сторінки]',
	'echo-error-no-formatter' => 'Не визначено формату сповіщень',
	'notifications' => 'Сповіщення',
	'tooltip-pt-notifications' => 'Ваші сповіщення',
	'echo-specialpage' => 'Мої сповіщення',
	'echo-anon' => 'Для отримання сповіщень, [[Special:Userlogin/signup|створіть обліковий запис]] або [[Special:UserLogin|увійдіть]].',
	'echo-none' => 'У Вас немає сповіщень.',
	'notification-new-user' => 'Ласкаво просимо до {{GRAMMAR:accusative|{{SITENAME}}}}, $1!',
	'notification-new-user-content' => 'Будь ласка, не забувайте підписувати всі коментарі на сторінках обговорень чотирма тильдами (~~~~).',
	'echo-email-subject-default' => 'Нові сповіщення на {{SITENAME}}',
	'echo-email-body-default' => 'У Вас є нове сповіщення на {{SITENAME}}:

$1',
	'echo-email-footer-default' => '$2

Щоб контролювати, які листи ми Вам надсилаємо, перейдіть сюди:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|нове сповіщення|нові сповіщення|нових сповіщень}}',
	'echo-link' => 'Сповіщення',
	'echo-overlay-link' => 'Усі сповіщення',
	'echo-overlay-title' => 'Мої сповіщення',
	'echo-overlay-title-overflow' => 'Мої сповіщення (показано $1 з $2 непрочитаних)',
	'echo-date-today' => 'Сьогодні',
	'echo-date-yesterday' => 'Вчора',
	'echo-load-more-error' => 'Під час отримання додаткових результатів сталася помилка.',
	'echo-email-batch-subject-daily' => 'У Вас $1 {{PLURAL:$2|сповіщення|сповіщення|сповіщень}} сьогодні',
	'echo-email-batch-subject-weekly' => 'У Вас $1 {{PLURAL:$2|сповіщення|сповіщення|сповіщень}} цього тижня',
	'echo-email-batch-body-daily' => '$1,

У Вас $2 {{PLURAL:$3|сповіщення|сповіщення|сповіщень}} на {{SITENAME}} сьогодні. Перегляньте їх тут:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,

У Вас $2 {{PLURAL:$3|сповіщення|сповіщення|сповіщень}} на {{SITENAME}} цього тижня. Перегляньте їх тут:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-category-header-edit-user-talk' => '$1 {{PLURAL:$1|повідомлення|повідомлення|повідомлень}} на сторінці обговорення',
	'echo-email-batch-category-header-other' => '$1 {{PLURAL:$1|інше|інших}}',
);

/** Urdu (اردو)
 * @author පසිඳු කාවින්ද
 */
$messages['ur'] = array(
	'prefs-echo' => 'اطلاعات',
	'notifications' => 'اطلاعات',
	'echo-specialpage' => 'میری اطلاعات',
	'echo-link' => 'میری اطلاعات', # Fuzzy
	'echo-overlay-link' => 'سب اطلاعات...', # Fuzzy
	'echo-overlay-title' => 'میری اطلاعات',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'echo-desc' => 'Hệ thống thông báo',
	'prefs-echo' => 'Thông báo',
	'prefs-displaynotifications' => 'Tùy chọn hiển thị',
	'prefs-emailfrequency' => 'Khi nào bạn muốn nhận thông báo qua thư điện tử?',
	'prefs-echosubscriptions' => 'Báo cho tôi khi nào người ta…',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Thư điện tử',
	'echo-pref-subscription-edit-user-talk' => 'Nhắn tin vào trang thảo luận của tôi',
	'echo-pref-subscription-article-linked' => 'Đặt liên kết đến một trang do tôi tạo ra',
	'echo-pref-subscription-reverted' => 'Lùi sửa đổi của tôi',
	'echo-pref-subscription-mention' => 'Nói đến tôi',
	'echo-pref-email-frequency-never' => 'Không gửi cho tôi bất kỳ thông báo qua thư điện tử',
	'echo-pref-email-frequency-immediately' => 'Gửi các thông báo từng cái một vào đúng lúc xảy ra',
	'echo-pref-email-frequency-daily' => 'Tóm lược các thông báo hàng ngày',
	'echo-pref-email-frequency-weekly' => 'Tóm lược các thông báo hàng tuần',
	'echo-pref-notify-hide-link' => 'Ẩn liên kết và dấu hiệu thông báo khỏi thanh công cụ',
	'echo-dismiss-button' => 'Tắt',
	'echo-dismiss-message' => 'Tắt mọi thông báo $1',
	'echo-dismiss-prefs-message' => 'Bạn có thể bật lại các thông báo này trong Tùy chọn',
	'echo-category-title-edit-user-talk' => 'Lời tin nhắn',
	'echo-category-title-page-linked' => 'Trang được liên kết',
	'echo-category-title-reverted' => 'Sửa đổi bị lùi lại',
	'echo-category-title-mention' => 'Lời nói đến',
	'echo-category-title-other' => 'Khác',
	'echo-category-title-system' => 'Hệ thống',
	'echo-no-agent' => '[Không ai]',
	'echo-no-title' => '[Không có trang]',
	'echo-error-no-formatter' => 'Thông báo không có định rõ định dạng',
	'echo-error-preference' => 'Lỗi: Không thể đặt tùy chọn',
	'echo-error-token' => 'Lỗi: Không thể lấy dấu hiệu người dùng',
	'notifications' => 'Thông báo',
	'tooltip-pt-notifications' => 'Các thông báo cho bạn',
	'echo-specialpage' => 'Thông báo',
	'echo-anon' => 'Để nhận thông báo, hãy [[Special:Userlogin/signup|mở tài khoản]] hoặc [[Special:UserLogin|đăng nhập]].',
	'echo-none' => 'Bạn không có thông báo.',
	'echo-more-info' => 'Thêm thông tin',
	'echo-quotation-marks' => '“$1”',
	'notification-edit-talk-page2' => '[[User:$1|$1]] đã nhắn tin vào [[User talk:$2|trang thảo luận]] của bạn.',
	'notification-edit-talk-page-flyout2' => '$1 đã nhắn tin vào [[User talk:$2|trang thảo luận]] của bạn.',
	'notification-page-linked' => '[[$3|$3]] mới {{GENDER:$1}}có liên kết đến [[$2|$2]]: [[Special:WhatLinksHere/$2|Xem tất cả các liên kết đến trang này]]',
	'notification-page-linked-flyout' => '$3 mới {{GENDER:$1}}có liên kết đến $2: [[Special:WhatLinksHere/$2|Xem tất cả các liên kết đến trang này]]',
	'notification-add-comment2' => '[[User:$1|$1]] đã bình luận về “[[$3|$2]]” tại trang thảo luận “$4”',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] đã bắt đầu cuộc thảo luận mới về “$2” tại [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] đã nhắn tin cho bạn: “[[$3#$2|$2]]”',
	'notification-add-comment-yours2' => '[[User:$1|$1]] đã bình luận về “[[$3#$2|$2]]” tại trang thảo luận của bạn',
	'notification-mention' => '[[User:$1|$1]] đã nói đến bạn tại [[$3#$2|$3]].',
	'notification-mention-flyout' => '$1 đã nói đến bạn tại [[$3#$2|$3]].',
	'notification-user-rights' => '[[User:$1|$1]] {{GENDER:$1}}đã thay đổi các quyền người dùng của bạn. $2. [[Special:ListGroupRights|Tìm hiểu thêm]]',
	'notification-user-rights-flyout' => '$1 {{GENDER:$1}}đã thay đổi các quyền người dùng của bạn. $2. [[Special:ListGroupRights|Tìm hiểu thêm]]',
	'notification-user-rights-add' => 'Bạn mới là thành viên của {{PLURAL:$2|nhóm|các nhóm}} này: $1',
	'notification-user-rights-remove' => 'Bạn không còn là thành viên của {{PLURAL:$2|nhóm|các nhóm}} này: $1',
	'notification-new-user' => 'Chào mừng $1 đã đến với {{SITENAME}}!',
	'notification-reverted2' => '[[User:$1|$1]] đã lùi lại {{PLURAL:$4|sửa đổi|các sửa đổi}} của bạn tại [[$2]] $3',
	'notification-reverted-flyout2' => '$1 đã lùi lại {{PLURAL:$4|sửa đổi|các sửa đổi}} của bạn tại $2 $3',
	'notification-edit-talk-page-email-subject2' => 'Trang thảo luận của bạn có tin nhắn mới',
	'notification-edit-talk-page-email-body2' => 'Người dùng $1 tại {{SITENAME}} đã nhắn tin vào trang thảo luận của bạn:

$3

Xem thêm:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 đã nhắn tin vào trang thảo luận của bạn',
	'notification-page-linked-email-subject' => 'Có liên kết mới đến một trang do bạn tạo ra tại {{SITENAME}}',
	'notification-page-linked-email-body' => '$4 mới {{GENDER:$1}}có liên kết đến $2

Xem tất cả các liên kết đến trang này:

{{canonicalurl:{{#special:WhatLinksHere/$2}}}}

$3',
	'notification-page-linked-email-batch-body' => '$3 mới {{GENDER:$1}}có liên kết đến $2',
	'notification-reverted-email-subject2' => '$1 đã lùi lại {{PLURAL:$3|sửa đổi|các sửa đổi}} của bạn tại $2',
	'notification-reverted-email-body2' => '$1 đã lùi lại {{PLURAL:$7|sửa đổi|các sửa đổi}} của bạn tại $2.

$5

Xem thêm:

$3

$6',
	'notification-reverted-email-batch-body2' => '$1 đã lùi lại {{PLURAL:$3|sửa đổi|các sửa đổi}} của bạn tại $2',
	'notification-mention-email-subject' => '$1 đã nói đến bạn tại {{SITENAME}}',
	'notification-mention-email-body' => 'Người dùng $1 tại {{SITENAME}} đã nói đến bạn tại $2.

$3

Xem thêm:

$4

$5',
	'notification-mention-email-batch-body' => '$1 đã nói đến bạn tại $2',
	'notification-user-rights-email-subject' => 'Các quyền người dùng của bạn đã thay đổi tại {{SITENAME}}',
	'notification-user-rights-email-body' => '$1 {{GENDER:$1}}đã thay đổi các quyền người dùng của bạn. $2

Xem chi tiết:

{{canonicalurl:{{#special:ListGroupRights}}}}

$3',
	'notification-user-rights-email-batch-body' => '$1 {{GENDER:$1}}đã thay đổi các quyền người dùng của bạn. $2',
	'echo-email-subject-default' => 'Thông báo mới tại {{SITENAME}}',
	'echo-email-body-default' => 'Bạn có thông báo mới tại {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Bạn có thông báo mới',
	'echo-email-footer-default' => '$2

Để cấu hình hoặc tắt các thông báo qua thư điện tử, hãy ghé vào:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 thông báo mới',
	'echo-link' => 'Thông báo',
	'echo-overlay-link' => 'Tất cả các thông báo',
	'echo-overlay-title' => 'Thông báo',
	'echo-overlay-title-overflow' => 'Tin nhắn (đang xem $1 trên $2 chưa đọc)',
	'echo-date-today' => 'Hôm nay',
	'echo-date-yesterday' => 'Hôm qua',
	'echo-date-header' => '$2 $1',
	'echo-load-more-error' => 'Lỗi đã xảy ra khi lấy thêm kết quả.',
	'notification-edit-talk-page-bundle' => '$1 và $3 {{PLURAL:$4}}người khác đã {{GENDER:$1}}nhắn tin vào [[User talk:$2|trang thảo luận]] của bạn.',
	'notification-page-linked-bundle' => '$3 và $4 {{PLURAL:$5}}trang khác mới {{GENDER:$1}}có liên kết đến $2. [[Special:WhatLinksHere/$2|Xem tất cả các liên kết đến trang này]]',
	'echo-email-batch-subject-daily' => 'Bạn có {{PLURAL:$2|một tin nhắn|$1 tin nhắn}} hôm nay',
	'echo-email-batch-subject-weekly' => 'Bạn có {{PLURAL:$2|thông báo|$1 thông báo}} tuần này',
	'echo-email-batch-body-daily' => 'Xin chào $1,

Bạn có {{PLURAL:$3|một thông báo|$2 thông báo}} tại {{SITENAME}} hôm nay. Hãy xem chúng tại đây:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => 'Xin chào $1,

Bạn có {{PLURAL:$3|một thông báo|$2 thông báo}} tại {{SITENAME}} tuần này. Hãy xem chúng tại đây:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-category-header' => '$1 thông báo $2',
);

/** Simplified Chinese (中文（简体）‎)
 * @author Anakmalaysia
 * @author Dimension
 * @author Hydra
 * @author Kuailong
 * @author Liangent
 * @author Shirayuki
 * @author Xiaomingyan
 * @author Yfdyh000
 * @author 乌拉跨氪
 */
$messages['zh-hans'] = array(
	'echo-desc' => '通知系统',
	'prefs-echo' => '通知',
	'prefs-displaynotifications' => '显示选项',
	'prefs-emailfrequency' => '何时您想收到电子邮件通知？',
	'prefs-echosubscriptions' => '通知我当有人…',
	'echo-pref-email' => '电子邮件',
	'echo-pref-subscription-edit-user-talk' => '在我的讨论页的留言',
	'echo-pref-subscription-article-linked' => '于其他页面加入了一条链接到我创建的页面的链接',
	'echo-pref-subscription-reverted' => '对我的编辑的回退',
	'echo-pref-subscription-mention' => '提到我',
	'echo-pref-email-frequency-never' => '不要给我发送任何电子邮件通知',
	'echo-pref-email-frequency-immediately' => '允许的个别通知',
	'echo-pref-email-frequency-daily' => '每日通知摘要',
	'echo-pref-email-frequency-weekly' => '每周通知摘要',
	'echo-pref-notify-hide-link' => '在我的工具栏中隐藏通知的链接和标志',
	'echo-dismiss-button' => '解除',
	'echo-dismiss-message' => '关闭所有 $1 通知',
	'echo-dismiss-prefs-message' => '您可以在参数设置中重新打开这些选项',
	'echo-category-title-edit-user-talk' => '讨论页留言',
	'echo-category-title-page-linked' => '链接到的页面',
	'echo-category-title-reverted' => '编辑被回退',
	'echo-category-title-mention' => '提及',
	'echo-category-title-other' => '其他',
	'echo-category-title-system' => '系统',
	'echo-no-agent' => '[无人]',
	'echo-no-title' => '[无页面]',
	'echo-error-no-formatter' => '没有定义通知的格式',
	'echo-error-preference' => '错误：无法设置用户首选项',
	'echo-error-token' => '错误：无法检索用户令牌',
	'notifications' => '通知',
	'tooltip-pt-notifications' => '您的通知',
	'echo-specialpage' => '通知',
	'echo-anon' => '要接收通知，请[[Special:Userlogin/signup|创建帐号]]或[[Special:UserLogin|登录]]。',
	'echo-none' => '您没有任何通知。',
	'echo-more-info' => '更多信息',
	'notification-edit-talk-page2' => '[[User:$1|$1]]在您的[[User talk:$2|讨论页]]留言。',
	'notification-edit-talk-page-flyout2' => '$1在您的[[User talk:$2|讨论页]]留言。',
	'notification-page-linked' => '[[$2|$2]]由[[$3|$3]]{{GENDER:$1|链入}}：[[Special:WhatLinksHere/$2|查看本页的所有链入页面]]',
	'notification-add-comment2' => '[[User:$1|$1]]在“$4”的讨论页中{{GENDER:$1|谈论了}}“[[$3|$2]]”',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]]在[[$3]]上发起了一个新的话题“$2”',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]]给您发来一则消息：“[[$3#$2|$2]]”',
	'notification-add-comment-yours2' => '[[User:$1|$1]]在您的讨论页上{{GENDER:$1|谈论了}}“[[$3#$2|$2]]”',
	'notification-mention' => '[[User:$1|$1]]在[[$3#$2|$3]]中{{GENDER:$1|提到}}了你 。',
	'notification-mention-flyout' => '$1在[[$3#$2|$3]]上{{GENDER:$1|提到}}了你。',
	'notification-user-rights-flyout' => '你的用户权限已被$1{{GENDER:$1|更改}}。$2。[[Special:ListGroupRights|了解更多]]',
	'notification-user-rights-add' => '你现在是以下用户组的成员：$1', # Fuzzy
	'notification-user-rights-remove' => '你不再是{{PLURAL:$2|以下用户组}}的成员：$1',
	'notification-new-user' => '欢迎来到{{SITENAME}}，$1！我们十分欢迎您的光临。',
	'notification-reverted2' => '您在[[$2]]上的 $4 次编辑已被[[User:$1|$1]]{{GENDER:$1|撤销}}$3',
	'notification-reverted-flyout2' => '您在{{PLURAL:$4|$2的编辑}}已被$1{{GENDER:$1|回退}} $3',
	'notification-edit-talk-page-email-subject2' => '您有一条新的讨论页消息',
	'notification-edit-talk-page-email-body2' => '{{SITENAME}}用户$1在你的讨论页面{{GENDER:$1|留言了}}：

$3

查看更多：

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1在你的讨论页面{{GENDER:$1|留言了}}',
	'notification-page-linked-email-subject' => '您创建的页面被链接到了{{SITENAME}}',
	'notification-page-linked-email-body' => '$2由$4{{GENDER:$1|链入}}

查看本页的所有链入页面：

{{canonicalurl:{{#special:WhatLinksHere/$2}}}}

$3',
	'notification-reverted-email-subject2' => '您{{PLURAL:$3|在$2的编辑|在$2的编辑}}已被$1回退',
	'notification-reverted-email-body2' => '您{{PLURAL:$7|在$2的编辑已被|在$2的编辑已被}}$1回退。

$5

查看更多：

$3

$6',
	'notification-reverted-email-batch-body2' => '您{{PLURAL:$3|在$2的编辑|在$2的编辑}}已被$1回退',
	'notification-mention-email-subject' => '$1在{{SITENAME}}上{{GENDER:$1|提到}}了你',
	'notification-mention-email-body' => '{{SITENAME}}用户$1在$2上{{GENDER:$1|提到}}了你。

$3

查看更多：

$4

$5',
	'notification-mention-email-batch-body' => '$1在$2上{{GENDER:$1|提到}}了你',
	'notification-user-rights-email-subject' => '您在{{SITENAME}}的用户权限已变更',
	'notification-user-rights-email-body' => '你的用户权限被$1{{GENDER:$1|修改}}了。$2

查看更多

{{canonicalurl:{{#special:ListGroupRights}}}}

$3',
	'notification-user-rights-email-batch-body' => '你的用户权限已被$1{{GENDER:$1|修改}}。$2',
	'echo-email-subject-default' => '{{SITENAME}}上的新通知',
	'echo-email-body-default' => '您在{{SITENAME}}上有新通知：

$1',
	'echo-email-batch-body-default' => '您有一条新通知',
	'echo-email-footer-default' => '$2

管理你想要接收的电子邮件的种类，请访问：{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1条新通知',
	'echo-link' => '通知',
	'echo-overlay-link' => '全部通知',
	'echo-overlay-title' => '通知',
	'echo-overlay-title-overflow' => '通知（显示 $2 / $1 条未读）',
	'echo-date-today' => '今天',
	'echo-date-yesterday' => '昨天',
	'echo-load-more-error' => '获取更多的结果时出错。',
	'notification-edit-talk-page-bundle' => '$1和{{PLURAL:$4|其他}}$3名用户在你的[[User talk:$2|对话页]]上{{GENDER:$1|留言}}。',
	'echo-email-batch-subject-daily' => '您今天有$1{{PLURAL:$2|条通知|条通知}}',
	'echo-email-batch-subject-weekly' => '您本周有$1{{PLURAL:$2|条通知|条通知}}',
	'echo-email-batch-body-daily' => '$1：

今天您在{{SITENAME}}有 $2 {{PLURAL:$3|条通知|条通知}}。查看它们：
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1：

本周您在{{SITENAME}}有 $2 {{PLURAL:$3|条通知|条通知}}。查看它们：
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-category-header' => '$1$2{{PLURAL:$1|通知}}',
);

/** Traditional Chinese (中文（繁體）‎)
 * @author Shirayuki
 * @author Simon Shek
 * @author Waihorace
 */
$messages['zh-hant'] = array(
	'echo-desc' => '通知系統',
	'prefs-echo' => '通知',
	'prefs-displaynotifications' => '顯示選項',
	'prefs-emailfrequency' => '何時您想收到電郵通知？',
	'echo-pref-subscription-article-linked' => '於其他頁面加入一條連結到我創建的頁面',
	'echo-pref-subscription-reverted' => '回退我的編輯',
	'echo-pref-email-frequency-never' => '不要向我發送任何電郵通知',
	'echo-pref-email-frequency-immediately' => '允許個別通知',
	'echo-pref-email-frequency-daily' => '每日通知摘要',
	'echo-pref-email-frequency-weekly' => '每周通知摘要',
	'echo-pref-notify-hide-link' => '在我的工具列中隱藏通知連結及標示',
	'echo-no-agent' => '[無人]',
	'echo-no-title' => '[無頁面]',
	'echo-error-no-formatter' => '沒有定義通知格式',
	'notifications' => '通知',
	'tooltip-pt-notifications' => '你的通知',
	'echo-specialpage' => '我的通知',
	'echo-anon' => '要接收通知，請[[Special:Userlogin/signup|創建帳號]]或[[Special:UserLogin|登錄]]。',
	'echo-none' => '您沒有任何通知。',
	'notification-new-user' => '歡迎來到{{SITENAME}}，$1！',
	'notification-new-user-content' => '請記得為討論頁上的任何留言用四個波浪線（~~~~）簽名。',
	'echo-email-subject-default' => '{{SITENAME}}上的新通知',
	'echo-email-body-default' => '你在{{SITENAME}}有一項新訊息：

$1',
	'echo-link-new' => '$1項新{{PLURAL:$1|訊息|訊息}}',
	'echo-link' => '我的訊息', # Fuzzy
	'echo-overlay-link' => '所有訊息...', # Fuzzy
	'echo-overlay-title' => '我的訊息',
	'echo-date-today' => '今天',
	'echo-date-yesterday' => '昨天',
);
