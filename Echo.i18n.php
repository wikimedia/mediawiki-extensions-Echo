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
	'prefs-emailsettings' => 'Email settings',
	'prefs-displaynotifications' => 'Display options',
	'prefs-echosubscriptions' => 'Notify me about these events',
	'echo-pref-send-me' => 'Send me:',
	'echo-pref-send-to' => 'Send to:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Email',
	'echo-pref-email-frequency-never' => 'Do not send me any email notifications',
	'echo-pref-email-frequency-immediately' => 'Individual notifications as they come in',
	'echo-pref-email-frequency-daily' => 'A daily summary of notifications',
	'echo-pref-email-frequency-weekly' => 'A weekly summary of notifications',
	'echo-pref-notify-show-link' => 'Show notifications in my toolbar',
	'echo-learn-more' => 'Learn more',

	// Dismiss interface
	'echo-dismiss-button' => 'Dismiss',
	'echo-dismiss-message' => 'Turn off all $1 notifications',
	'echo-dismiss-prefs-message' => 'You can turn these back on in your [[Special:Preferences#mw-prefsection-echo|preferences]]',

	// Category titles
	'echo-category-title-edit-user-talk' => 'Talk page {{PLURAL:$1|post|posts}}',
	'echo-category-title-article-linked' => 'Page {{PLURAL:$1|link|links}}',
	'echo-category-title-reverted' => 'Edit {{PLURAL:$1|revert|reverts}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Mention|Mentions}}',
	'echo-category-title-other' => '{{PLURAL:$1|Other}}',
	'echo-category-title-system' => '{{PLURAL:$1|System}}',

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
	'echo-feedback' => 'Feedback',

	// Notification
	'echo-quotation-marks' => '"$1"',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|posted}} on your [[User talk:$2|talk page]].',
	'notification-edit-talk-page-flyout2' => '<b>$1</b> {{GENDER:$1|posted}} on your [[User talk:$2|talk page]].',
	'notification-page-linked' => '[[:$2]] was {{GENDER:$1|linked}} from [[:$3]]: [[Special:WhatLinksHere/$2|See all links to this page]]',
	'notification-page-linked-flyout' => '<b>$2</b> was {{GENDER:$1|linked}} from <b>$3</b>: [[Special:WhatLinksHere/$2|See all links to this page]]',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|commented}} on "[[$3|$2]]" on the "$4" talk page',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|posted}} a new topic "$2" on [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|sent}} you a message: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|commented}} on "[[$3#$2|$2]]" on your talk page',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|mentioned}} you on [[$3#$2|$3]].',
	'notification-mention-flyout' => '<b>$1</b> {{GENDER:$1|mentioned}} you on [[$3#$2|$3]].',
	'notification-user-rights' => 'Your user rights [[Special:Log/rights/$1|were {{GENDER:$1|changed}}]] by [[User:$1|$1]]. $2. [[Special:ListGroupRights|Learn more]]',
	'notification-user-rights-flyout' => 'Your user rights were {{GENDER:$1|changed}} by <b>$1</b>. $2. [[Special:ListGroupRights|Learn more]]',
	'notification-user-rights-add' => 'You are now a member of {{PLURAL:$2|this group|these groups}}: $1',
	'notification-user-rights-remove' => 'You are no longer a member of {{PLURAL:$2|this group|these groups}}: $1',
	'notification-talkpage-content' => '$1', ## Do not translate unless you deliberately want to change behaviour
	'notification-new-user' => "Welcome to {{SITENAME}}, $1! We're glad you're here.",
	'notification-reverted2' => 'Your {{PLURAL:$4|edit on [[:$2]] has|edits on [[:$2]] have}} been {{GENDER:$1|reverted}} by [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => 'Your {{PLURAL:$4|edit on <b>$2</b> has|edits on <b>$2</b> have}} been {{GENDER:$1|reverted}} by <b>$1</b> $3',
	'notification-edit-talk-page-email-subject2' => 'You have a new talkpage message',
	'notification-edit-talk-page-email-body2' => '$1

$3

View more:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|posted}} on your talk page',
	'notification-page-linked-email-subject' => 'A page you started was linked on {{SITENAME}}',
	'notification-page-linked-email-body' => '$1

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

To control which emails we send you, check your preferences:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	// Notifications overlay
	'echo-link-new' => '$1 new {{PLURAL:$1|notification|notifications}}',
	'echo-link' => 'Notifications',
	'echo-overlay-link' => 'All notifications',
	'echo-overlay-title' => '<b>Notifications</b>',
	'echo-overlay-title-overflow' => '<b>Notifications</b> (showing $1 of $2 unread)',
	'echo-mark-all-as-read' => 'Mark all as read',

	// Special page
	'echo-date-today' => 'Today',
	'echo-date-yesterday' => 'Yesterday',
	'echo-date-header' => '$1 $2',
	'echo-load-more-error' => 'An error occurred while fetching more results.',

	// Bundle
	'notification-edit-talk-page-bundle' => '$1 and $3 {{PLURAL:$4|other|others}} {{GENDER:$1|posted}} on your [[User talk:$2|talk page]].',
	'notification-page-linked-bundle' => '$2 was {{GENDER:$1|linked}} from $3 and $4 other {{PLURAL:$5|page|pages}}. [[Special:WhatLinksHere/$2|See all links to this page]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 and $2 {{PLURAL:$3|other|others}} {{GENDER:$1|posted}} on your talk page',
	'notification-page-linked-email-batch-bundle-body' => '$2 was {{GENDER:$1|linked}} from $3 and $4 other {{PLURAL:$5|page|pages}}',

	// Email batch
	'echo-email-batch-separator' => '________________________________________________', # only translate this message to other languages if you have to change it
	'echo-email-batch-bullet' => '•', # only translate this message to other languages if you have to change it
	'echo-email-batch-subject-daily' => 'You have {{PLURAL:$2|a new notification|new notifications}} today',
	'echo-email-batch-subject-weekly' => 'You have {{PLURAL:$2|a new notification|new notifications}} this week',
	'echo-email-batch-body-daily' => '$1,

You have {{PLURAL:$3|a new notification|new notifications}} on {{SITENAME}} today. View {{PLURAL:$3|it|them}} here:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,

You have {{PLURAL:$3|a new notification|new notifications}} on {{SITENAME}} this week. View {{PLURAL:$3|it|them}} here:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
);

/** Message documentation (Message documentation)
 * @author Amire80
 * @author Beta16
 * @author Kghbln
 * @author Krenair
 * @author Minh Nguyen
 * @author Mormegil
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
	'prefs-emailsettings' => 'Header for the section of preferences that deals with how often notification emails are sent out and what address they are sent to.
{{Identical|E-mail setting}}',
	'prefs-displaynotifications' => 'Header for the section of preferences that deals with how notifications are displayed',
	'prefs-echosubscriptions' => 'Header for the section of preferences that deals with which notifications the user receives',
	'echo-pref-send-me' => 'Label for the following email delivery options:
* {{msg-mw|Echo-pref-email-frequency-never}}
* {{msg-mw|Echo-pref-email-frequency-immediately}} (default)
* {{msg-mw|Echo-pref-email-frequency-daily}}
* {{msg-mw|Echo-pref-email-frequency-weekly}}',
	'echo-pref-send-to' => 'Label for the address to send email notifications to.',
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
	'echo-pref-notify-show-link' => "Label for a preference which enables the 'Notifications' link in the header and associated fly-out panel",
	'echo-learn-more' => 'Text for link to more information about a topic.
{{Identical|Learn more}}',
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
	'echo-category-title-edit-user-talk' => 'This is a short title for notification category. Used as <code>$1</code> in {{msg-mw|Echo-dismiss-message}} and <code>$2</code> in {{msg-mw|Echo-email-batch-category-header}}. Parameters:
* $1 - the number used for plural support',
	'echo-category-title-article-linked' => 'This is a short title for notification category. Used as <code>$1</code> in {{msg-mw|Echo-dismiss-message}} and <code>$2</code> in {{msg-mw|Echo-email-batch-category-header}}. Parameters:
* $1 - the number used for plural support',
	'echo-category-title-reverted' => 'This is a short title for notification category. Used as <code>$1</code> in {{msg-mw|Echo-dismiss-message}} and <code>$2</code> in {{msg-mw|Echo-email-batch-category-header}}. Parameters:
* $1 - the number used for plural support',
	'echo-category-title-mention' => 'This is a short title for notification category. Used as <code>$1</code> in {{msg-mw|Echo-dismiss-message}} and <code>$2</code> in {{msg-mw|Echo-email-batch-category-header}}. Parameters:
* $1 - the number used for plural support',
	'echo-category-title-other' => 'This is a short title for notification category.

Used as <code>$1</code> in {{msg-mw|Echo-dismiss-message}} and <code>$2</code> in {{msg-mw|Echo-email-batch-category-header}}.

Parameters:
* $1 - the number used for plural support
{{Identical|Other}}',
	'echo-category-title-system' => 'This is a short title for notification category. Used as <code>$1</code> in {{msg-mw|Echo-dismiss-message}} and <code>$2</code> in {{msg-mw|Echo-email-batch-category-header}}.
{{Identical|System}} Parameters:
* $1 - the number used for plural support',
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
	'echo-feedback' => 'Text for a link that goes to a feedback survey shown at [[Special:Notifications]].
{{Identical|Feedback}}',
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
* <b>$1</b> - the username of the person who mentioned you, plain text. Can be used for GENDER.
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
* $1 - the email intro, could be {{msg-mw|notification-edit-talk-page-email-batch-body2}} or {{msg-mw|notification-edit-user-talk-email-batch-bundle-body}}
* $2 - a link to a change
* $3 - the edit summary
* $4 - the e-mail footer, {{msg-mw|echo-email-footer-default}}',
	'notification-edit-talk-page-email-batch-body2' => 'E-mail notification for talk page edit
* $1 is a username

See also:
* {{msg-mw|Notification-edit-talk-page2}}
* {{msg-mw|Notification-edit-talk-page-email-subject2}}
* {{msg-mw|Notification-edit-talk-page-flyout2}}',
	'notification-page-linked-email-subject' => 'E-mail subject.
See also:
* {{msg-mw|Notification-page-linked}}
* {{msg-mw|Notification-page-linked-flyout}}
* {{msg-mw|Notification-page-linked-email-batch-body}}
* {{msg-mw|Notification-page-linked-email-body}}',
	'notification-page-linked-email-body' => 'E-mail notification. Parameters:
* $1 is the email intro, could be {{msg-mw|notification-page-linked-email-batch-body}} or {{msg-mw|notification-page-linked-email-batch-bundle-body}}
* $2 is the page being linked.
* $3 is the e-mail footer, {{msg-mw|echo-email-footer-default}}.
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
* $1 is a username

See also:
* {{msg-mw|Notification-mention}}
* {{msg-mw|Notification-mention-flyout}}
* {{msg-mw|Notification-mention-email-batch-body}}
* {{msg-mw|Notification-mention-email-body}}',
	'notification-mention-email-body' => 'E-mail notification. Parameters:
* $1 is a username, plaintext.  Can be used for gender support
* $2 is talk page title
* $3 is the edit summary
* $4 is the link to the talk page section title
* $5 is the email footer

See also:
* {{msg-mw|Notification-mention}}
* {{msg-mw|Notification-mention-flyout}}
* {{msg-mw|Notification-mention-email-batch-body}}
* {{msg-mw|Notification-mention-email-subject}}',
	'notification-mention-email-batch-body' => 'E-mail notification batch body.  Parameters:
* $1 is a username, plaintext.  Can be used for gender support
* $2 is talk page title

See also:
* {{msg-mw|Notification-mention}}
* {{msg-mw|Notification-mention-flyout}}
* {{msg-mw|Notification-mention-email-body}}
* {{msg-mw|Notification-mention-email-subject}}',
	'notification-user-rights-email-subject' => 'E-mail subject for user rights notification

See also:
* {{msg-mw|Notification-user-rights}}
* {{msg-mw|Notification-user-rights-flyout}}
* {{msg-mw|Notification-user-rights-email-batch-body}}
* {{msg-mw|Notification-user-rights-email-body}}',
	'notification-user-rights-email-body' => 'E-mail notification.  Parameters:
* $1 - a user name, plaintext.  Can be used for gender support
* $2 - a semicolon separated list of {{msg-mw|notification-user-rights-add}}, {{msg-mw|notification-user-rights-remove}}
* $3 - the email footer

See also:
* {{msg-mw|Notification-user-rights}}
* {{msg-mw|Notification-user-rights-flyout}}
* {{msg-mw|Notification-user-rights-email-batch-body}}
* {{msg-mw|Notification-user-rights-email-subject}}',
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
	'echo-overlay-title' => 'Title at the top of the notifications overlay. Should include bold tags.',
	'echo-overlay-title-overflow' => 'Title at the top of the notifications overlay when there are additional unread notifications that are not being shown. Parameters:
* $1 - the number of unread notifications being shown
* $2 - the total number of unread notifications that exist',
	'echo-mark-all-as-read' => 'Text for button that marks all unread notifications as read. Keep this short as possible.
{{Identical|Mark all as read}}',
	'echo-date-today' => "The header text for today's notification section.
{{Identical|Today}}",
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
* $4 - a number used for plural support

See also:
* {{msg-mw|Notification-edit-talk-page2}}
* {{msg-mw|Notification-edit-talk-page-email-batch-body2}}
* {{msg-mw|Notification-edit-talk-page-email-subject2}}
* {{msg-mw|Notification-edit-talk-page-email-body2}}',
	'notification-page-linked-bundle' => 'Bundled message for page-linked notification.  Parameters:
* $1 - the username who performs the action, which can be used for gender support
* $2 - the page title
* $3 - the page linked from
* $4 - the count of other action performers, could be number or {{msg-mw|echo-notification-count}}, eg, 7 others or 99+ others
* $5 - a number used for plural support

See also:
* {{msg-mw|Notification-page-linked}}
* {{msg-mw|Notification-page-linked-flyout}}
* {{msg-mw|Notification-page-linked-email-batch-body}}
* {{msg-mw|Notification-page-linked-email-subject}}',
	'notification-edit-user-talk-email-batch-bundle-body' => 'Bundled message for edit-user-talk email digest notification.  Parameters:
* $1 - the username who performs the action, which can be used for gender support
* $2 - the count of other action performers, could be number or {{msg-mw|echo-notification-count}}
* $3 - a number used for plural support

See also:
* {{msg-mw|Notification-edit-talk-page2}}
* {{msg-mw|Notification-edit-talk-page-flyout2}}
* {{msg-mw|Notification-edit-talk-page-email-batch-body2}}
* {{msg-mw|Notification-edit-talk-page-email-subject2}}
* {{msg-mw|Notification-edit-talk-page-email-body2}}',
	'notification-page-linked-email-batch-bundle-body' => 'Bundled message for page-linked email digest notification.  Parameters:
* $1 - the username who performs the action, which can be used for gender support
* $2 - the link-to page title
* $3 - the link-from page title
* $4 - the cout of other link-from page title, can be number or {{msg-mw|echo-notification-count}}
* $5 - a number used for plural support

See also:
* {{msg-mw|Notification-page-linked}}
* {{msg-mw|Notification-page-linked-flyout}}
* {{msg-mw|Notification-page-linked-email-batch-body}}
* {{msg-mw|Notification-page-linked-email-subject}}
* {{msg-mw|Notification-page-linked-email-body}}',
	'echo-email-batch-separator' => '{{optional}}
Email batch content separator',
	'echo-email-batch-bullet' => '{{optional}}',
	'echo-email-batch-subject-daily' => 'Daily e-mail batch subject.
* $1 is currently not used, could be a numeric count or "10+". See also: {{msg-mw|echo-notification-count|optional message|notext=1}}.
* $2 is a numeric count, this is used for plural support
See also:
* {{msg-mw|Echo-email-batch-subject-weekly}}',
	'echo-email-batch-subject-weekly' => 'Weekly e-mail batch subject.
* $1 is currently not used, could be a numeric count or "10+". See also: {{msg-mw|echo-notification-count|optional message|notext=1}}
* $2 is a numeric count, this is used for plural support
See also:
* {{msg-mw|Echo-email-batch-subject-daily}}',
	'echo-email-batch-body-daily' => 'Daily e-mail batch body. Parameters:
* $1 is a username
* $2 is currently not used, could be a numeric count or "10+". See also: {{msg-mw|echo-notification-count|optional message|notext=1}}.
* $3 is a numeric count, this is used for plural support
* $4 is the e-mail batch content separated by "-------..." ({{msg-mw|echo-email-batch-separator}})
* $5 is the e-mail footer, {{msg-mw|echo-email-footer-default}}
See also:
* {{msg-mw|Echo-email-batch-body-weekly}}',
	'echo-email-batch-body-weekly' => 'Weekly e-mail batch body. Parameters:
* $1 is a username
* $2 is currently not used, could be a numeric count or "10+". See also: {{msg-mw|echo-notification-count|optional message|notext=1}}.
* $3 is a numeric count, this is used for plural support
* $4 is the e-mail batch content separated by "--------..." ({{msg-mw|echo-email-batch-separator}})
* $5 is the e-mail footer, {{msg-mw|echo-email-footer-default}}
See also:
* {{msg-mw|Echo-email-batch-body-daily}}',
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
 * @author Achraf94
 * @author Meno25
 * @author Mido
 * @author Zanatos
 */
$messages['ar'] = array(
	'notifications' => 'إخطارات',
	'echo-specialpage' => 'إخطاراتي', # Fuzzy
	'echo-link' => 'إخطاراتي',
	'echo-overlay-title' => '<b>الإخطارات</b>',
);

/** Asturian (asturianu)
 * @author Xuacu
 */
$messages['ast'] = array(
	'echo-desc' => "Sistema d'avisos",
	'prefs-echo' => 'Avisos',
	'prefs-emailsettings' => 'Configuración del corréu electrónicu',
	'prefs-displaynotifications' => 'Opciones de vista',
	'prefs-echosubscriptions' => "Avisame d'estos socesos",
	'echo-pref-send-me' => 'Unviame:',
	'echo-pref-send-to' => 'Unviar a:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Corréu',
	'echo-pref-email-frequency-never' => 'Nun unviame avisos per corréu electrónicu',
	'echo-pref-email-frequency-immediately' => 'Avisos individuales según entren',
	'echo-pref-email-frequency-daily' => 'Un resume diariu de los avisos',
	'echo-pref-email-frequency-weekly' => 'Un resume selmanal de los avisos',
	'echo-pref-notify-show-link' => 'Amosar los avisos na mio barra de ferramientes',
	'echo-dismiss-button' => 'Descartar',
	'echo-dismiss-message' => "Desactivar tolos avisos del tipu ''$1''",
	'echo-dismiss-prefs-message' => 'Pue volver a activalo en [[Special:Preferences#mw-prefsection-echo|Preferencies]]',
	'echo-category-title-edit-user-talk' => 'Tien {{PLURAL:$1|un mensaxe|mensaxes}} nel so alderique',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Enllaz|Enllaces}} a páxina',
	'echo-category-title-reverted' => "{{PLURAL:$1|Inversión|Inversiones}} d'edición",
	'echo-category-title-mention' => '{{PLURAL:$1|Mención|Menciones}}',
	'echo-category-title-other' => '{{PLURAL:$1|Otros}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistema}}',
	'echo-no-agent' => '[Naide]',
	'echo-no-title' => '[Ensin páxina]',
	'echo-error-no-formatter' => 'Nun se definió formatu dalu pal avisu',
	'echo-error-preference' => "Error: Nun pudo establecese la preferencia d'usuariu",
	'echo-error-token' => "Error: Nun pudo recuperase'l token d'usuariu",
	'notifications' => 'Avisos',
	'tooltip-pt-notifications' => 'Los sos avisos',
	'echo-specialpage' => 'Avisos',
	'echo-anon' => 'Pa recibir avisos, [[Special:Userlogin/signup|cree una cuenta]] o [[Special:UserLogin|anicie sesión]].',
	'echo-none' => 'Nun tien avisos.',
	'echo-more-info' => 'Más información',
	'echo-feedback' => 'La so opinión',
	'notification-edit-talk-page2' => "[[User:$1|$1]] {{GENDER:$1|escribió}} na so [[User talk:$2|páxina d'alderique]].",
	'notification-edit-talk-page-flyout2' => "<b>$1</b> {{GENDER:$1|escribió}} na so [[User talk:$2|páxina d'alderique]].",
	'notification-page-linked' => '[[:$2]] {{GENDER:$1|enllazóse}} dende [[:$3]]: [[Special:WhatLinksHere/$2|Ver tolos enllaces a esta páxina]]', # Fuzzy
	'notification-page-linked-flyout' => '<b>$2</b> {{GENDER:$1|enllazóse}} dende <b>$3</b>: [[Special:WhatLinksHere/$2|Ver tolos enllaces a esta páxina]]',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|comentó}} sobro "[[$3|$2]]" na páxina d\'alderique "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|amestó}} l\'asuntu nuevu "$2" en [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|unvió-y}} un mensaxe: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|comentó}} sobro "[[$3#$2|$2]]" na so páxina d\'alderique',
	'notification-mention' => '[[User:$1|$1]] fizo-y una {{GENDER:$1|mención}} en [[$3#$2|$3]].',
	'notification-mention-flyout' => '<b>$1</b> fizo-y una {{GENDER:$1|mención}} en [[$3#$2|$3]].',
	'notification-user-rights' => "[[User:$1|$1]] [[Special:Log/rights/$1|{{GENDER:$1|camudó}}]] los sos permisos d'usuariu. $2. [[Special:ListGroupRights|Más información]]",
	'notification-user-rights-flyout' => "<b>$1</b> {{GENDER:$1|camudó}} los sos permisos d'usuariu. $2. [[Special:ListGroupRights|Más información]]",
	'notification-user-rights-add' => "Agora ye miembru d'{{PLURAL:$2|esti grupu|estos grupos}}: $1",
	'notification-user-rights-remove' => "Dexó de ser miembru d'{{PLURAL:$2|esti grupu|estos grupos}}: $1",
	'notification-new-user' => '¡Damos-y la bienvenida a {{SITENAME}}, $1! Prestanos que tea equí.',
	'notification-reverted2' => '[[User:$1|$1]] {{GENDER:$1|invertió}} {{PLURAL:$4|la so edición|les sos ediciones}} en [[:$2]] $3', # Fuzzy
	'notification-reverted-flyout2' => '<b>$1</b> {{GENDER:$1|invertió}} {{PLURAL:$4|la so edición|les sos ediciones}} en <b>$2</b> $3',
	'notification-edit-talk-page-email-subject2' => "Tien un mensaxe nuevu na páxina d'alderique",
	'notification-edit-talk-page-email-body2' => '$1

$3

Ver más:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => "$1 {{GENDER:$1|escribió}} na so páxina d'alderique",
	'notification-page-linked-email-subject' => "Una páxina que principió enllazóse'n {{SITENAME}}",
	'notification-page-linked-email-body' => '$1

Ver tolos enllaces a esta páxina:

{{canonicalurl:{{#special:WhatLinksHere/$2}}}}

$3',
	'notification-page-linked-email-batch-body' => '$2 {{GENDER:$1|enllazóse}} dende $3',
	'notification-reverted-email-subject2' => '$1 {{GENDER:$1|invertió}} {{PLURAL:$3|la so edición|les sos ediciones}} en $2',
	'notification-reverted-email-body2' => '$1 {{GENDER:$1|invertió}} {{PLURAL:$7|la so edición|les sos ediciones}} en $2.

$5

Ver más:

$3

$6',
	'notification-reverted-email-batch-body2' => '$1 {{GENDER:$1|invertió}} {{PLURAL:$3|la so edición|les sos ediciones}} en $2',
	'notification-mention-email-subject' => '$1 fizo-y una {{GENDER:$1|mención}} en {{SITENAME}}',
	'notification-mention-email-body' => "L'usuariu $1 de {{SITENAME}} fizo-y una {{GENDER:$1|mención}} en $2.

$3

Ver más:

$4

$5",
	'notification-mention-email-batch-body' => '$1 fizo-y una {{GENDER:$1|mención}} en $2',
	'notification-user-rights-email-subject' => "Camudaron los sos permisos d'usuariu en {{SITENAME}}",
	'notification-user-rights-email-body' => "$1 {{GENDER:$1|camudó}} los sos permisos d'usuariu. $2

Ver más:

{{canonicalurl:{{#special:ListGroupRights}}}}

$3",
	'notification-user-rights-email-batch-body' => "$1 {{GENDER:$1|camudó}} los sos permisos d'usuariu. $2",
	'echo-email-subject-default' => 'Nuevu avisu en {{SITENAME}}',
	'echo-email-body-default' => 'Tien un nuevu avisu en {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Tien un nuevu avisu',
	'echo-email-footer-default' => '$2

Pa controlar los correos que-y unviamos, compruebe les sos preferencies:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|avisu nuevu|avisos nuevos}}',
	'echo-link' => 'Avisos',
	'echo-overlay-link' => 'Tolos avisos',
	'echo-overlay-title' => '<b>Avisos</b>',
	'echo-overlay-title-overflow' => '<b>Avisos</b> (amosando $1 de $2 ensin lleer)',
	'echo-mark-all-as-read' => 'Marcar too como lleío',
	'echo-date-today' => 'Güei',
	'echo-date-yesterday' => 'Ayeri',
	'echo-load-more-error' => 'Hubo un error al descargar más resultaos.',
	'notification-edit-talk-page-bundle' => "$1 y {{PLURAL:$4|otra persona|otres $3 persones}} {{GENDER:$1|escribieron}} na so [[User talk:$2|páxina d'alderique]].",
	'notification-page-linked-bundle' => '$2 {{GENDER:$1|enllazóse}} dende $3 y $4 {{PLURAL:$5|páxina|páxines}} más. [[Special:WhatLinksHere/$2|Ver tolos enllaces a esta páxina]]',
	'notification-edit-user-talk-email-batch-bundle-body' => "$1 y {{PLURAL:$3|otra persona|otres $2 persones}} {{GENDER:$1|escribieron}} na so páxina d'alderique",
	'notification-page-linked-email-batch-bundle-body' => '$2 {{GENDER:$1|enllazóse}} dende $3 y {{PLURAL:$5|otra páxina|otres $4 páxines}}',
	'echo-email-batch-subject-daily' => 'Tien {{PLURAL:$2|un avisu nuevu|avisos nuevos}} güei',
	'echo-email-batch-subject-weekly' => 'Tien {{PLURAL:$2|un avisu nuevu|avisos nuevos}} esta selmana',
	'echo-email-batch-body-daily' => '$1,

Tien {{PLURAL:$3|un avisu nuevu|avisos nuevos}} en {{SITENAME}} güei.  Pue velos equí:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,

Tien {{PLURAL:$3|un avisu nuevu|avisos nuevos}} en {{SITENAME}} esta selmana.  Pue velos equí:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
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

/** Batak Toba (Batak Toba)
 * @author WBT001Erin
 */
$messages['bbc-latn'] = array(
	'echo-category-title-article-linked' => 'Alaman pangait', # Fuzzy
	'notification-page-linked-email-body' => 'Ida saluhut pangait to alaman on', # Fuzzy
	'notification-edit-user-talk-email-batch-bundle-body' => 'alaman panghataion', # Fuzzy
	'notification-page-linked-email-batch-bundle-body' => 'alaman/alamanalaman', # Fuzzy
);

/** Belarusian (Taraškievica orthography) (беларуская (тарашкевіца)‎)
 * @author Base
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'echo-desc' => 'Сыстэма апавяшчэньняў',
	'prefs-echo' => 'Абвесткі',
	'prefs-displaynotifications' => 'Налады паказу',
	'prefs-echosubscriptions' => 'Паведамляць мне пра гэтыя падзеі',
	'echo-pref-web' => 'Праз сайт',
	'echo-pref-email' => 'Праз пошту',
	'echo-pref-email-frequency-never' => 'Не дасылаць мне абвестак праз e-mail',
	'echo-pref-email-frequency-immediately' => 'Асобна кожнае, калі зьяўляецца',
	'echo-pref-email-frequency-daily' => 'Штодзённая зборка абвестак',
	'echo-pref-email-frequency-weekly' => 'Штотыднёвая зборка абвестак',
	'echo-pref-notify-show-link' => 'Паказваць апавяшчэньні ў маёй панэлі',
	'echo-dismiss-button' => 'Схаваць',
	'echo-dismiss-message' => 'Выключыць усе апавяшчэньні пра $1',
	'echo-dismiss-prefs-message' => 'Вы можаце ўключыць іх зноў у наладах', # Fuzzy
	'echo-category-title-edit-user-talk' => 'запісы ў гутарках', # Fuzzy
	'echo-category-title-article-linked' => 'Спасыланьне на старонку', # Fuzzy
	'echo-category-title-reverted' => 'Адкат праўкі', # Fuzzy
	'echo-category-title-mention' => 'Згадваньне', # Fuzzy
	'echo-category-title-other' => 'Іншае', # Fuzzy
	'echo-category-title-system' => 'Сыстэмнае', # Fuzzy
	'echo-no-agent' => '[Ніхто]',
	'echo-no-title' => '[Няма старонкі]',
	'echo-error-no-formatter' => 'Фарматаваньне для абвестак ня вызначана',
	'echo-error-preference' => 'Памылка: не ўдалося захаваць наладу',
	'echo-error-token' => 'Памылка: не ўдалося атрымаць токен удзельніка',
	'notifications' => 'Абвесткі',
	'tooltip-pt-notifications' => 'Вашыя абвесткі',
	'echo-specialpage' => 'Абвесткі',
	'echo-anon' => 'Для атрыманьня абвестак [[Special:Userlogin/signup|стварыце рахунак]] або [[Special:UserLogin|увайдзіце]].',
	'echo-none' => 'Вы ня маеце абвестак.',
	'echo-more-info' => 'Болей',
	'echo-feedback' => 'Водгук',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|напісаў|напісала}} на вашую [[User talk:$2|старонку гутарак]].',
	'notification-edit-talk-page-flyout2' => '<b>$1</b> {{GENDER:$1|напісаў|напісала}} на вашую [[User talk:$2|старонку гутарак]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|пакінуў|пакінула}} камэнтар у тэме «[[$3|$2]]» на старонцы абмеркаваньня «$4»',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|стварыў|стварыла}} новую тэму «$2» у [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|даслаў|даслала}} вам паведамленьне: «[[$3#$2|$2]]»',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|пакінуў|пакінула}} камэнтар у тэме «[[$3#$2|$2]]» на вашай старонцы гутарак',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|згадаў|згадала}} вас на [[$3#$2|$3]].',
	'notification-mention-flyout' => '<b>$1</b> {{GENDER:$1|згадаў|згадала}} вас на [[$3#$2|$3]].',
	'notification-new-user' => 'Вітаем у {{GRAMMAR:месны|{{SITENAME}}}}, $1!', # Fuzzy
	'notification-reverted2' => '[[User:$1|$1]] {{GENDER:$1|скасаваў|скасавала}} {{PLURAL:$4|вашую праўку|вашыя праўкі}} на старонцы [[:$2]] $3', # Fuzzy
	'notification-reverted-flyout2' => '<b>$1</b> {{GENDER:$1|скасаваў|скасавала}} {{PLURAL:$4|вашую праўку|вашыя праўкі}} на старонцы <b>$2</b> $3',
	'notification-edit-talk-page-email-subject2' => 'Вы маеце новае паведамленьне на старонцы гутарак',
	'notification-edit-talk-page-email-body2' => '{{GENDER:$1|Удзельнік|Удзельніца}} {{GRAMMAR:родны|{{SITENAME}}}} {{GENDER:$1|напісаў|напісала}} вам на старонку гутарак:

$3

Падрабязьней:

$2

$4', # Fuzzy
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|напісаў|напісала}} вам на старонку гутарак',
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

$1', # Fuzzy
	'echo-link-new' => '$1 {{PLURAL:$1|новая абвестка|новыя абвесткі|новых абвестак}}',
	'echo-link' => 'Абвесткі',
	'echo-overlay-link' => 'Усе абвесткі',
	'echo-overlay-title' => 'Мае абвесткі', # Fuzzy
	'echo-overlay-title-overflow' => 'Мае абвесткі (паказаныя $1 з $2)', # Fuzzy
	'echo-date-today' => 'Сёньня',
	'echo-date-yesterday' => 'Учора',
	'echo-date-header' => '$2 $1',
	'echo-load-more-error' => 'Узьнікла памылка ў час атрыманьня дадатковых вынікаў.',
	'echo-email-batch-subject-daily' => 'Сёньня вы атрымалі $1 {{PLURAL:$2|абвестку|абвесткі|абвестак}}', # Fuzzy
	'echo-email-batch-subject-weekly' => 'На гэтым тыдні вы атрымалі $1 {{PLURAL:$2|абвестку|абвесткі|абвестак}}', # Fuzzy
	'echo-email-batch-body-daily' => '$1,

Сёньня ў {{GRAMMAR:месны|{{SITENAME}}}} для вас маецца $2 {{PLURAL:$3|апавяшчэньне|апавяшчэньні|апавяшчэньняў}}. Праверыць іх можна тут:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5', # Fuzzy
	'echo-email-batch-body-weekly' => '$1,

На гэтым тыдні ў {{GRAMMAR:месны|{{SITENAME}}}} вы маеце $2 {{PLURAL:$3|апавяшчэньне|апавяшчэньні|апавяшчэньняў}}. Праверыць іх можна тут:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5', # Fuzzy
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

/** Bengali (বাংলা)
 * @author Aftab1995
 */
$messages['bn'] = array(
	'notification-edit-talk-page-email-body2' => '$1

$3

আরো দেখুন:

$2

$4',
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
	'prefs-emailsettings' => 'Nastavení e-mailu',
	'prefs-displaynotifications' => 'Možnosti zobrazení',
	'prefs-echosubscriptions' => 'Upozorněte mě na…',
	'echo-pref-send-me' => 'Posílejte mi:',
	'echo-pref-send-to' => 'Posílat na:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-mail',
	'echo-pref-email-frequency-never' => 'Neposílejte mi žádná upozornění e-mailem',
	'echo-pref-email-frequency-immediately' => 'Jednotlivá upozornění, jakmile se objeví',
	'echo-pref-email-frequency-daily' => 'Denní souhrn upozornění',
	'echo-pref-email-frequency-weekly' => 'Týdenní souhrn upozornění',
	'echo-pref-notify-show-link' => 'Zobrazovat upozornění v panelu nástrojů',
	'echo-learn-more' => 'Další informace',
	'echo-dismiss-button' => 'Zavřít',
	'echo-dismiss-message' => 'Vypnout všechna upozornění na $1',
	'echo-dismiss-prefs-message' => 'Znovu zapnout si je můžete v [[Special:Preferences#mw-prefsection-echo|nastavení]]',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|příspěvek|příspěvky}} v diskusi',
	'echo-category-title-article-linked' => '{{PLURAL:$1|odkaz|odkazy}} na stránku',
	'echo-category-title-reverted' => '{{PLURAL:$1|vrácenou úpravu|vrácené úpravy}}',
	'echo-category-title-mention' => '{{PLURAL:$1|zmínku|zmínky}}',
	'echo-category-title-other' => '{{PLURAL:$1|jinou událost|jiné události}}',
	'echo-category-title-system' => '{{PLURAL:$1|systémovou událost|systémové události}}',
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
	'echo-feedback' => 'Názor',
	'notification-edit-talk-page2' => '[[User:$1|$1]] vám {{GENDER:$1|napsal|napsala}} na [[User talk:$2|vaši diskusní stránku]].',
	'notification-edit-talk-page-flyout2' => '<b>$1</b> vám {{GENDER:$1|napsal|napsala}} na [[User talk:$2|vaši diskusní stránku]].',
	'notification-page-linked' => 'Do stránky [[:$3]] {{GENDER:$1|byl přidán}} odkaz na stránku [[:$2]]: [[Special:WhatLinksHere/$2|Zobrazit všechny odkazy na tuto stránku]]',
	'notification-page-linked-flyout' => 'Do stránky <b>$3</b> {{GENDER:$1|byl přidán}} odkaz na stránku <b>$2</b>: [[Special:WhatLinksHere/$2|Zobrazit všechny odkazy na tuto stránku]]',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|přidal|přidala}} komentář k „[[$3|$2]]“ na stránce „$4“',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|přidal|přidala}} komentář na nové téma „$2“ na stránce „[[$3]]“',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] vám {{GENDER:$1|poslal|poslala}} zprávu: „[[$3#$2|$2]]“',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|přidal|přidala}} komentář k „[[$3#$2|$2]]“ na vaší diskusní stránce',
	'notification-mention' => '[[User:$1|$1]] vás {{GENDER:$1|zmínil|zmínila}} v diskusi [[$3#$2|$3]]',
	'notification-mention-flyout' => '<b>$1</b> vás {{GENDER:$1|zmínil|zmínila}} v diskusi [[$3#$2|$3]]',
	'notification-user-rights' => '[[User:$1|$1]] [[Special:Log/rights/$1|{{GENDER:$1|změnil|změnila}}]] vaše uživatelská práva. $2. [[Special:ListGroupRights|Více informací]]',
	'notification-user-rights-flyout' => '<b>$1</b> {{GENDER:$1|změnil|změnila}} vaše uživatelská práva. $2. [[Special:ListGroupRights|Více informací]]',
	'notification-user-rights-add' => 'Nyní patříte do {{PLURAL:$2|této skupiny|těchto skupin}}: $1',
	'notification-user-rights-remove' => 'Nadále už nepatříte do {{PLURAL:$2|této skupiny|těchto skupin}}: $1',
	'notification-new-user' => 'Vítejte na {{grammar:6sg|{{SITENAME}}}}, $1! Těší nás, že jste tu.',
	'notification-reverted2' => '[[User:$1|$1]] {{GENDER:$1|revertoval|revertovala}} {{PLURAL:$4|vaši editaci|vaše editace}} stránky [[:$2]] $3',
	'notification-reverted-flyout2' => '<b>$1</b> {{GENDER:$1|revertoval|revertovala}} {{PLURAL:$4|vaši editaci|vaše editace}} stránky <b>$2</b> $3',
	'notification-edit-talk-page-email-subject2' => 'V diskusi máte novou zprávu',
	'notification-edit-talk-page-email-body2' => '$1

$3

Podrobnosti:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 vám {{GENDER:$1|napsal|napsala}} na vaši diskusní stránku',
	'notification-page-linked-email-subject' => 'Na {{grammar:6sg|{{SITENAME}}}} někdo odkázal na vámi založenou stránku',
	'notification-page-linked-email-body' => '$1

Zobrazit všechny odkazy na tuto stránku:

{{canonicalurl:{{#special:WhatLinksHere/$2}}}}

$3',
	'notification-page-linked-email-batch-body' => 'Do stránky $3 {{GENDER:$1|byl přidán}} odkaz na stránku $2',
	'notification-reverted-email-subject2' => '$1 {{GENDER:$1|revertoval|revertovala}} {{PLURAL:$3|vaši editaci|vaše editace}} stránky $2',
	'notification-reverted-email-body2' => '$1 {{GENDER:$1|revertoval|revertovala}} {{PLURAL:$7|vaši editaci|vaše editace}} stránky $2.

$5

Podrobnosti:

$3

$6',
	'notification-reverted-email-batch-body2' => '$1 {{GENDER:$1|revertoval|revertovala}} {{PLURAL:$3|vaši editaci|vaše editace}} stránky $2.',
	'notification-mention-email-subject' => '$1 vás na {{grammar:6sg|{{SITENAME}}}} {{GENDER:$1|zmínil|zmínila}}',
	'notification-mention-email-body' => '{{GENDER:$1|Uživatel|Uživatelka}} $1 na {{grammar:6sg|{{SITENAME}}}} vás {{GENDER:$1|zmínil|zmínila}} v diskusi $2.

$3

Podrobnosti:

$4

$5',
	'notification-mention-email-batch-body' => '$1 vás {{GENDER:$1|zmínil|zmínila}} v diskusi $2',
	'notification-user-rights-email-subject' => 'Na {{grammar:6sg|{{SITENAME}}}} byla změněna vaše uživatelská práva',
	'notification-user-rights-email-body' => '$1 {{GENDER:$1|změnil|změnila}} vaše uživatelská práva. $2

Více informací:

{{canonicalurl:{{#special:ListGroupRights}}}}

$3',
	'notification-user-rights-email-batch-body' => '$1 {{GENDER:$1|změnil|změnila}} vaše uživatelská práva. $2',
	'echo-email-subject-default' => 'Nové upozornění na {{grammar:6sg|{{SITENAME}}}}',
	'echo-email-body-default' => 'Na {{grammar:6sg|{{SITENAME}}}} máte nové upozornění:

$1',
	'echo-email-batch-body-default' => 'Máte nové upozornění',
	'echo-email-footer-default' => '$2

Posílání e-mailů si můžete přizpůsobit v nastavení:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nové upozornění|nová upozornění|nových upozornění}}',
	'echo-link' => 'Upozornění',
	'echo-overlay-link' => 'Všechna upozornění',
	'echo-overlay-title' => '<b>Upozornění</b>',
	'echo-overlay-title-overflow' => '<b>Upozornění</b> (zobrazuje se $1 z $2 nepřečtených)',
	'echo-mark-all-as-read' => 'Označit vše jako přečtené',
	'echo-date-today' => 'Dnes',
	'echo-date-yesterday' => 'Včera',
	'echo-load-more-error' => 'Při načítání dalších výsledků došlo k chybě.',
	'notification-edit-talk-page-bundle' => '$1 a $3 {{PLURAL:$4|další}} vám napsali na [[User talk:$2|vaši diskusní stránku]].',
	'notification-page-linked-bundle' => 'Do stránky $3 a $4 {{PLURAL:$5|další stránky|dalších stránek}} {{GENDER:$1|byly přidány}} odkazy na stránku $2: [[Special:WhatLinksHere/$2|Zobrazit všechny odkazy na tuto stránku]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 a $2 {{PLURAL:$3|další}} vám napsali na vaši diskusní stránku',
	'notification-page-linked-email-batch-bundle-body' => 'Do stránky $3 a $4 {{PLURAL:$5|další stránky|dalších stránek}} {{GENDER:$1|byly přidány}} odkazy na stránku $2',
	'echo-email-batch-subject-daily' => 'Dnes máte {{PLURAL:$2|nové|nová}} upozornění',
	'echo-email-batch-subject-weekly' => 'Tento týden máte {{PLURAL:$2|nové|nová}} upozornění',
	'echo-email-batch-body-daily' => '{{GENDER:$1|Vážený uživateli|Vážená uživatelko}} $1,

na {{grammar:6sg|{{SITENAME}}}} dnes máte {{PLURAL:$3|nové oznámení|nová oznámení}}. Můžete si je prohlédnout na:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '{{GENDER:$1|Vážený uživateli|Vážená uživatelko}} $1,

na {{grammar:6sg|{{SITENAME}}}} máte tento týden {{PLURAL:$3|nové oznámení|nová oznámení}}. Můžete si je prohlédnout na:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
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
	'prefs-emailsettings' => 'E-Mail-Einstellungen',
	'prefs-displaynotifications' => 'Anzeigeoptionen',
	'prefs-echosubscriptions' => 'Mich bei diesen Ereignissen benachrichtigen',
	'echo-pref-send-me' => 'Sende mir:',
	'echo-pref-send-to' => 'Senden an:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-Mail',
	'echo-pref-email-frequency-never' => 'Keine Benachrichtigungen',
	'echo-pref-email-frequency-immediately' => 'Individuelle Benachrichtigung zu jedem Ereignis',
	'echo-pref-email-frequency-daily' => 'Tägliche Benachrichtigung zu den Ereignissen',
	'echo-pref-email-frequency-weekly' => 'Wöchentliche Benachrichtigung zu den Ereignissen',
	'echo-pref-notify-show-link' => 'Benachrichtigungen in meiner Werkzeugleiste anzeigen',
	'echo-learn-more' => 'Mehr erfahren',
	'echo-dismiss-button' => 'Ausblenden',
	'echo-dismiss-message' => 'Alle „$1“-Benachrichtigungen abschalten',
	'echo-dismiss-prefs-message' => 'Du kannst dies in deinen [[Special:Preferences#mw-prefsection-echo|Einstellungen]] wieder aktivieren',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Diskussionsseitennachricht|Diskussionsseitennachrichten}}',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Seitenverlinkung|Seitenverlinkungen}}',
	'echo-category-title-reverted' => '{{PLURAL:$1|Rückgängigmachung einer Bearbeitung|Rückgängigmachungen von Bearbeitungen}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Erwähnung|Erwähnungen}}',
	'echo-category-title-other' => '{{PLURAL:$1|Andere}}',
	'echo-category-title-system' => '{{PLURAL:$1|System}}',
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
	'echo-feedback' => 'Rückmeldung',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|hinterließ}} eine Nachricht auf deiner [[User talk:$2|Diskussionsseite]].',
	'notification-edit-talk-page-flyout2' => '<b>$1</b> {{GENDER:$1|hinterließ}} eine Nachricht auf deiner [[User talk:$2|Diskussionsseite]].',
	'notification-page-linked' => '[[:$2]] wurde von der Seite [[:$3]] {{GENDER:$1|verlinkt}}: [[Special:WhatLinksHere/$2|Alle Links auf diese Seite ansehen]]',
	'notification-page-linked-flyout' => '<b>$2</b> wurde von der Seite <b>$3</b> {{GENDER:$1|verlinkt}}: [[Special:WhatLinksHere/$2|Alle Links auf diese Seite ansehen]]',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|kommentierte}} auf „[[$3|$2]]“ auf der Diskussionsseite von „$4“',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|startete}} das neue Thema „$2“ auf [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] hat dir eine Nachricht {{GENDER:$1|gesandt}}: „[[$3#$2|$2]]“',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|kommentierte}} auf „[[$3#$2|$2]]“ auf deiner Diskussionsseite',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|erwähnte}} dich auf „[[$3#$2|$3]]“.',
	'notification-mention-flyout' => '<b>$1</b> {{GENDER:$1|erwähnte}} dich auf „[[$3#$2|$3]]“.',
	'notification-user-rights' => 'Deine Benutzerrechte [[Special:Log/rights/$1|wurden von [[User:$1|$1]] {{GENDER:$1|geändert}}]]. $2. [[Special:ListGroupRights|Mehr erfahren]]',
	'notification-user-rights-flyout' => 'Deine Benutzerrechte wurden von <b>$1</b> {{GENDER:$1|geändert}}. $2. [[Special:ListGroupRights|Mehr erfahren]]',
	'notification-user-rights-add' => 'Du bist jetzt Mitglied dieser {{PLURAL:$2|Gruppe|Gruppen}}: $1',
	'notification-user-rights-remove' => 'Du bist nicht länger Mitglied dieser {{PLURAL:$2|Gruppe|Gruppen}}: $1',
	'notification-new-user' => 'Willkommen bei {{SITENAME}}, $1! Wir freuen uns, dass du hier bist.',
	'notification-reverted2' => 'Deine {{PLURAL:$4|Bearbeitung an der Seite [[:$2]] wurde|Bearbeitungen an der Seite [[:$2]] wurden}} von [[User:$1|$1]] {{GENDER:$1|rückgängig}} gemacht. $3',
	'notification-reverted-flyout2' => 'Deine {{PLURAL:$4|Bearbeitung an der Seite <b>$2</b> wurde|Bearbeitungen an der Seite <b>$2</b> wurden}} von <b>$1</b> {{GENDER:$1|rückgängig}} gemacht. $3',
	'notification-edit-talk-page-email-subject2' => 'Du hast eine neue Diskussionsseitennachricht',
	'notification-edit-talk-page-email-body2' => '$1

$3

Mehr:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|hinterließ}} eine Nachricht auf deiner Diskussionsseite',
	'notification-page-linked-email-subject' => 'Eine Seite, die du angelegt hast, wurde auf {{SITENAME}} verlinkt',
	'notification-page-linked-email-body' => '$1

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

Um zu kontrollieren, welche E-Mails wir dir senden, überprüfe bitte deine Einstellungen:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 neue {{PLURAL:$1|Benachrichtigung|Benachrichtigungen}}',
	'echo-link' => 'Benachrichtigungen',
	'echo-overlay-link' => 'Alle Benachrichtigungen',
	'echo-overlay-title' => '<b>Benachrichtigungen</b>',
	'echo-overlay-title-overflow' => '<b>Benachrichtigungen</b> ($1 von $2 ungelesenen werden angezeigt)',
	'echo-mark-all-as-read' => 'Alle als gelesen markieren',
	'echo-date-today' => 'Heute',
	'echo-date-yesterday' => 'Gestern',
	'echo-load-more-error' => 'Beim Abrufen mehrerer Ergebnisse ist ein Fehler aufgetreten.',
	'notification-edit-talk-page-bundle' => '$1 und {{PLURAL:$4|ein weiterer Benutzer|$3 weitere Benutzer}} {{GENDER:$1|hinterließen}} Nachrichten auf deiner [[User talk:$2|Diskussionsseite]].',
	'notification-page-linked-bundle' => '$2 wurde von $3 und {{PLURAL:$5|einer weiteren Seite|$4 weiteren Seiten}} {{GENDER:$1|verlinkt}}. [[Special:WhatLinksHere/$2|Alle Links auf diese Seite ansehen]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 und {{PLURAL:$3|ein weiterer Benutzer|$2 weitere Benutzer}} {{GENDER:$1|hinterließen}} eine Nachricht auf deiner Diskussionsseite',
	'notification-page-linked-email-batch-bundle-body' => '$2 wurde von $3 und {{PLURAL:$5|einer weiteren Seite|$4 weiteren Seiten}} {{GENDER:$1|verlinkt}}',
	'echo-email-batch-subject-daily' => 'Du hast heute {{PLURAL:$2|eine neue Benachrichtigung|neue Benachrichtigungen}}',
	'echo-email-batch-subject-weekly' => 'Du hast diese Woche {{PLURAL:$2|eine neue Benachrichtigung|neue Benachrichtigungen}}',
	'echo-email-batch-body-daily' => '$1,

du hast heute {{PLURAL:$3|eine neue Benachrichtigung|neue Benachrichtigungen}} auf {{SITENAME}}. Sehe sie hier ein:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,

du hast diese Woche {{PLURAL:$3|eine neue Benachrichtigung|neue Benachrichtigungen}} auf {{SITENAME}}. Sehe sie hier ein:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
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
	'prefs-echosubscriptions' => 'Ειδοποιήστε με όταν κάποιος...', # Fuzzy
	'echo-pref-web' => 'Διαδίκτυο',
	'echo-pref-email' => 'Ηλεκτρονικό Ταχυδρομείο',
	'echo-pref-email-frequency-never' => 'Μην μου στέλνετε ειδοποιήσεις μέσω ηλεκτρονικού ταχυδρομείου',
	'echo-pref-email-frequency-daily' => 'Μια ημερήσια σύνοψη ειδοποιήσεων',
	'echo-pref-email-frequency-weekly' => 'Μια εβδομαδιαία σύνοψη ειδοποιήσεων',
	'echo-category-title-edit-user-talk' => 'Ανάρτηση σελίδας συζήτησης', # Fuzzy
	'echo-no-agent' => '[Κανένας]',
	'echo-no-title' => '[Χωρίς σελίδα]',
	'notifications' => 'Ειδοποιήσεις',
	'tooltip-pt-notifications' => 'Οι ειδοποιήσεις σας',
	'echo-specialpage' => 'Ειδοποιήσεις',
	'echo-anon' => 'Για να λαμβάνετε ειδοποιήσεις, [[Special:Userlogin/signup|δημιουργήστε ένα λογαριασμό]] ή [[Special:UserLogin|συνδεθείτε]].',
	'echo-none' => 'Δεν έχετε ειδοποιήσεις.',
	'notification-new-user' => 'Καλώς ήρθατε στο {{SITENAME}}, $1! Χαιρόμαστε που είστε εδώ.',
	'echo-email-subject-default' => 'Νέα ειδοποίηση στο {{SITENAME}}',
	'echo-link' => 'Ειδοποιήσεις',
	'echo-overlay-link' => 'Όλες οι ειδοποιήσεις',
	'echo-overlay-title' => '<b>Ανακοινώσεις</b>',
	'echo-date-today' => 'Σήμερα',
	'echo-date-yesterday' => 'Χθες',
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
	'prefs-emailsettings' => 'Configuración de correo electrónico',
	'prefs-displaynotifications' => 'Opciones de visualización',
	'prefs-echosubscriptions' => 'Notificarme sobre estos eventos',
	'echo-pref-send-me' => 'Enviarme:',
	'echo-pref-send-to' => 'Enviar a:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Correo electrónico',
	'echo-pref-email-frequency-never' => 'No me envíes notificaciones por correo electrónico',
	'echo-pref-email-frequency-immediately' => 'Enviarme las notificaciones individuales en cuanto lleguen',
	'echo-pref-email-frequency-daily' => 'Un resumen diario de notificaciones',
	'echo-pref-email-frequency-weekly' => 'Un resumen semanal de las notificaciones',
	'echo-pref-notify-show-link' => 'Mostrar las notificaciones en mi barra de herramientas',
	'echo-learn-more' => 'Aprende más',
	'echo-dismiss-button' => 'Ocultar',
	'echo-dismiss-message' => 'Desactivar todas las notificaciones de $1',
	'echo-dismiss-prefs-message' => 'Puedes reactivarlas en tus [[Special:Preferences#mw-prefsection-echo|preferencias]]',
	'echo-category-title-mention' => '{{PLURAL:$1|Mención|Menciones}}',
	'echo-no-agent' => '[Nadie]',
	'echo-no-title' => '[No hay ninguna página]',
	'echo-error-no-formatter' => 'Sin formato definido para notificaciones',
	'echo-error-preference' => '<b>Error:</b> No se pudo establecer $1.', # Fuzzy
	'notifications' => 'Notificaciones',
	'tooltip-pt-notifications' => 'Notificaciones',
	'echo-specialpage' => 'Notificaciones',
	'echo-anon' => 'Para recibir notificaciones, [[Special:Userlogin/signup|crea una cuenta]] o [[Special:UserLogin|inicia sesión]].',
	'echo-none' => 'No tienes notificaciones',
	'echo-more-info' => 'Más información',
	'echo-feedback' => 'Comentarios',
	'notification-new-user' => '¡Bienvenido a {{SITENAME}}, $1!', # Fuzzy
	'notification-edit-talk-page-email-subject2' => 'Tienes un mensaje nuevo de página de discusión',
	'notification-edit-talk-page-email-body2' => '$1

$3

Ver más:

$2

$4',
	'notification-page-linked-email-subject' => 'Se creó un enlace a una página que comenzaste en {{SITENAME}}',
	'echo-email-subject-default' => 'Nueva notificación en {{SITENAME}}',
	'echo-email-body-default' => 'Tienes una nueva notificación en {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Tienes una notificación nueva',
	'echo-email-footer-default' => '$2

Para controlar los emails que te enviamos, visita:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1', # Fuzzy
	'echo-link-new' => '$1 {{PLURAL:$1|notificación nueva|notificaciones nuevas}}',
	'echo-link' => 'Notificaciones',
	'echo-overlay-link' => 'Todas las notificaciones',
	'echo-overlay-title' => 'Mis notificaciones', # Fuzzy
	'echo-overlay-title-overflow' => 'Notificaciones: (Mostrando $1 de $2 sin leer)', # Fuzzy
	'echo-mark-all-as-read' => 'Marcar todo como leído',
	'echo-date-today' => 'Hoy',
	'echo-date-yesterday' => 'Ayer',
	'echo-load-more-error' => 'Se ha producido un error al intentar obtener más resultados.',
	'echo-email-batch-subject-daily' => 'Hoy tienes $1 {{PLURAL:$2|notificación|notificaciones}}', # Fuzzy
	'echo-email-batch-subject-weekly' => 'Esta semana tienes $1 {{PLURAL:$2|notificación|notificaciones}}', # Fuzzy
	'echo-email-batch-body-daily' => '$1,

Hoy tienes $2 {{PLURAL:$3|notificación|notificaciones}} en {{SITENAME}}. Verlas aquí:
{canonicalurl: {{#special:Notifications}}}

$4

$5', # Fuzzy
	'echo-email-batch-body-weekly' => '$1,

Esta semana tienes $2 {{PLURAL:$3|notificación|notificaciones}} en {{SITENAME}}. Verlas aquí:
{canonicalurl: {{#special:Notifications}}}

$4

$5', # Fuzzy
);

/** Estonian (eesti)
 * @author Avjoska
 * @author Pikne
 */
$messages['et'] = array(
	'echo-desc' => 'Teavitussüsteem',
	'prefs-echo' => 'Teavitused',
	'prefs-emailsettings' => 'E-posti eelistused',
	'prefs-displaynotifications' => 'Kuvaseaded',
	'prefs-echosubscriptions' => 'Teavita mind neist sündmustest',
	'echo-pref-send-me' => 'Saada mulle:',
	'echo-pref-send-to' => 'Saada aadressile:',
	'echo-pref-web' => 'Veeb',
	'echo-pref-email' => 'E-post',
	'echo-pref-email-frequency-never' => 'Ära saada mulle ühtegi e-posti teavitust',
	'echo-pref-email-frequency-immediately' => 'Üksikud teavitused nende ilmumisel',
	'echo-pref-email-frequency-daily' => 'Teavituste päevakokkuvõte',
	'echo-pref-email-frequency-weekly' => 'Teavituste nädalakokkuvõte',
	'echo-learn-more' => 'Lisateave',
	'echo-category-title-edit-user-talk' => 'Arutelulehekülje {{PLURAL:$1|postitus|postitused}}',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Leheküljelink|Leheküljelingid}}',
	'echo-category-title-reverted' => 'Tühistatud {{PLURAL:$1|muudatus|muudatused}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Mainimine|Mainimised}}',
	'echo-no-agent' => '[Eikeegi]',
	'echo-no-title' => '[Lehekülge pole]',
	'notifications' => 'Teavitused',
	'tooltip-pt-notifications' => 'Sinu teavitused',
	'echo-specialpage' => 'Teavitused',
	'echo-anon' => 'Et teavitusi saada, [[Special:Userlogin/signup|loo konto]] või [[Special:UserLogin|logi sisse]].',
	'echo-none' => 'Sul pole uusi teavitusi.',
	'echo-more-info' => 'Lisateave',
	'notification-new-user' => 'Tere tulemast saidile {{SITENAME}}, $1! Meil on hea meel, et siin oled.',
	'echo-link-new' => '$1 {{PLURAL:$1|uus teavitus|uut teavitust}}',
	'echo-link' => 'Teavitused',
	'echo-overlay-link' => 'Kõik teavitused',
	'echo-overlay-title' => '<b>Teavitused</b>',
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
 * @author Olli
 * @author Silvonen
 * @author VezonThunder
 */
$messages['fi'] = array(
	'echo-desc' => 'Ilmoitusjärjestelmä',
	'prefs-echo' => 'Ilmoitukset',
	'prefs-emailsettings' => 'Sähköpostiasetukset',
	'prefs-displaynotifications' => 'Näyttöasetukset',
	'prefs-echosubscriptions' => 'Ilmoita minulle näistä tapahtumista',
	'echo-pref-send-me' => 'Lähetä minulle:',
	'echo-pref-send-to' => 'Lähetä osoitteeseen:',
	'echo-pref-web' => 'Verkko',
	'echo-pref-email' => 'Sähköposti',
	'echo-pref-email-frequency-never' => 'Älä lähetä minulle sähköposti-ilmoituksia',
	'echo-pref-email-frequency-immediately' => 'Yksittäisiä ilmoituksia niiden tullessa',
	'echo-pref-email-frequency-daily' => 'Päivittäinen yhteenveto ilmoituksista',
	'echo-pref-email-frequency-weekly' => 'Viikottainen yhteenveto ilmoituksista',
	'echo-pref-notify-show-link' => 'Näytä ilmoitukset työkalurivissä',
	'echo-learn-more' => 'Lisätietoja',
	'echo-dismiss-button' => 'Hylkää',
	'echo-dismiss-message' => 'Poista käytöstä kaikki ilmoitukset aiheesta $1',
	'echo-dismiss-prefs-message' => 'Voit ottaa ilmoitukset takaisin käyttöön [[Special:Preferences#mw-prefsection-echo|asetuksissasi]]',
	'echo-category-title-edit-user-talk' => 'Keskustelusivun viesti{{PLURAL:$1||t}}',
	'echo-category-title-article-linked' => 'Sivujen link{{PLURAL:$1|linkki|linkit}}',
	'echo-category-title-reverted' => 'Muokkausten {{PLURAL:$1|palautus/kumoaminen|palautukset/kumoamiset}}',
	'echo-category-title-mention' => 'Mainin{{PLURAL:$1|ta|nat}}',
	'echo-category-title-other' => '{{PLURAL:$1|Muu}}',
	'echo-category-title-system' => '{{PLURAL:$1|Järjestelmä}}',
	'echo-no-agent' => '[Ei kukaan]',
	'echo-no-title' => '[Ei sivua]',
	'echo-error-no-formatter' => 'Ilmoitukselle ei ole määritetty muotoilua',
	'echo-error-preference' => 'Virhe: Käyttäjäasetuksen tallennus epäonnistui',
	'echo-error-token' => 'Virhe: Käyttäjätunnisteen haku epäonnistui',
	'notifications' => 'Ilmoitukset',
	'tooltip-pt-notifications' => 'Omat ilmoitukset',
	'echo-specialpage' => 'Ilmoitukset',
	'echo-anon' => 'Jos haluat saada ilmoituksia, [[Special:Userlogin/signup|luo käyttäjätunnus]] tai [[Special:UserLogin|kirjaudu sisään]].',
	'echo-none' => 'Ei uusia ilmoituksia.',
	'echo-more-info' => 'Lisätietoja',
	'echo-feedback' => 'Palaute',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|kirjoitti}} [[User talk:$2|keskustelusivullesi]].',
	'notification-edit-talk-page-flyout2' => '<b>$1</b> {{GENDER:$1|kirjoitti}} [[User talk:$2|keskustelusivullesi]].',
	'notification-page-linked' => '[[:$2]] {{GENDER:$1|linkitti}} sivulta [[:$3]]: [[Special:WhatLinksHere/$2|Katso kaikki linkit tälle sivulle]]',
	'notification-page-linked-flyout' => '<b>$2</b> {{GENDER:$1|linkitti}} sivulta <b>$3</b>: [[Special:WhatLinksHere/$2|Katso kaikki linkit tälle sivulle]]',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|kommentoi}} aihetta "[[$3|$2]]" keskustelusivulla "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|lisäsi}} uuden aiheen "$2" sivulle [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|lähetti}} sinulle viestin: ”[[$3#$2|$2]]”',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|kommentoi}} aihetta "[[$3#$2|$2]]" keskustelusivullasi',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|mainitsi}} sinut sivulla [[$3#$2|$3]].',
	'notification-mention-flyout' => '<b>$1</b> {{GENDER:$1|mainitsi}} sinut sivulla [[$3#$2|$3]].',
	'notification-user-rights' => '[[User:$1|$1]] [[Special:Log/rights/$1|{{GENDER:$1|muutti}}]] käyttöoikeuksiasi. $2. [[Special:ListGroupRights|Lisätietoja]]',
	'notification-user-rights-flyout' => '<b>$1</b> {{GENDER:$1|muutti}} käyttöoikeuksiasi. $2. [[Special:ListGroupRights|Lisätietoja]]',
	'notification-user-rights-add' => 'Olet nyt {{PLURAL:$2|tämän ryhmän|näiden ryhmien}} jäsen: $1',
	'notification-user-rights-remove' => 'Et ole enää {{PLURAL:$2|tämän ryhmän|näiden ryhmien}} jäsen: $1',
	'notification-new-user' => 'Tervetuloa sivustolle {{SITENAME}}, $1!',
	'notification-reverted2' => '[[User:$1|$1]] {{GENDER:$1|kumosi}} {{PLURAL:$4|muokkauksesi}} sivulla [[:$2]] $3',
	'notification-reverted-flyout2' => '<b>$1</b> {{GENDER:$1|kumosi}} {{PLURAL:$4|muokkauksesi sivulla <b>$2</b>}} $3',
	'notification-edit-talk-page-email-subject2' => 'Sinulla on uusi viesti keskustelusivulla',
	'notification-edit-talk-page-email-body2' => '$1

$3

Näytä lisää:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|lähetti viestin}} keskustelusivullesi',
	'notification-page-linked-email-subject' => 'Aloittamasi sivu linkitettiin sivustolla {{SITENAME}}',
	'notification-page-linked-email-body' => '$1

Katso kaikki linkit tälle sivulle:

{{canonicalurl:{{#special:WhatLinksHere/$2}}}}

$3',
	'notification-page-linked-email-batch-body' => '$2 {{GENDER:$1|linkitettiin}} sivulta $3',
	'notification-reverted-email-subject2' => 'Your $1 {{GENDER:$1|kumosi}} {{PLURAL:$3|muokkauksesi sivulla $2}}',
	'notification-reverted-email-body2' => '$1 {{GENDER:$1|kumosi}} {{PLURAL:$7|muokkauksesi sivulla $2}}.

$5

Näytä lisää:

$3

$6',
	'notification-reverted-email-batch-body2' => '$1 {{GENDER:$1|kumosi}} {{PLURAL:$3|muutoksesi sivulla $2}}',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|mainitsi}} sinut sivustolla {{SITENAME}}',
	'notification-mention-email-body' => 'Sivuston {{SITENAME}} käyttäjä $1 {{GENDER:$1|mainitsi}} sinut sivulla $2.

$3

Näytä lisää:

$4

$5',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|mainitsi}} sinut sivulla $2',
	'notification-user-rights-email-subject' => 'Käyttöoikeuksiasi on muutettu sivustolla {{SITENAME}}',
	'notification-user-rights-email-body' => '$1 {{GENDER:$1|muutti}} käyttöoikeuksiasi. $2

Näytä lisää:

{{canonicalurl:{{#special:ListGroupRights}}}}

$3',
	'notification-user-rights-email-batch-body' => '$1 {{GENDER:$1|muutti}} käyttöoikeuksiasi. $2',
	'echo-email-subject-default' => 'Uusi ilmoitus sivustolla {{SITENAME}}',
	'echo-email-body-default' => 'Sinulle on uusi ilmoitus sivustolla {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Sinulla on uusi ilmoitus',
	'echo-email-footer-default' => '$2

Hallitaksesi sähköposteja, mitä lähetämme sinulle, tarkista asetukset:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|uusi ilmoitus|uutta ilmoitusta}}',
	'echo-link' => 'Ilmoitukset',
	'echo-overlay-link' => 'Kaikki ilmoitukset',
	'echo-overlay-title' => '<b>Ilmoitukset</b>',
	'echo-overlay-title-overflow' => '<b>Ilmoitukset</b> (näytetään $1/$2 lukematonta)',
	'echo-mark-all-as-read' => 'Merkitse kaikki luetuiksi',
	'echo-date-today' => 'Tänään',
	'echo-date-yesterday' => 'Eilen',
	'echo-load-more-error' => 'Virhe haettaessa lisää tuloksia.',
	'notification-edit-talk-page-bundle' => '$1 ja {{PLURAL:$4|yksi muu|$3 muuta}} {{GENDER:$1|lähetti viestin}} [[User talk:$2|keskustelusivullesi]].',
	'notification-page-linked-bundle' => '$2 {{GENDER:$1|linkitettiin}} sivulta $3 ja {{PLURAL:$5|yhdeltä muulta sivulta|$4 muulta sivulta}}. [[Special:WhatLinksHere/$2|Katso kaikki linkit tälle sivulle]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 ja {{PLURAL:$3|yksi muu lähetti|$2 muuta lähettivät}} viestin keskustelusivullesi',
	'notification-page-linked-email-batch-bundle-body' => '$2 {{GENDER:$1|linkitettiin}} sivulta $3 ja {{PLURAL:$5|yhdeltä muulta sivulta|$4 muulta sivulta}}',
	'echo-email-batch-subject-daily' => 'Sinulle on {{PLURAL:$2|yksi uusi ilmoitus|$2 uutta ilmoitusta}} tänään',
	'echo-email-batch-subject-weekly' => 'Sinulle on {{PLURAL:$2|yksi uusi ilmoitus|$2 uutta ilmoitusta}} tällä viikolla',
	'echo-email-batch-body-daily' => '$1,

Olet saanut {{PLURAL:$3|yhden uuden ilmoituksen|$3 uutta ilmoitusta}} sivustolla {{SITENAME}} tänään. Katso {{PLURAL:$3|se|ne}} osoitteessa:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,

Olet saanut {{PLURAL:$3|yhden uuden ilmoituksen|$3 uutta ilmoitusta}} sivustolla {{SITENAME}} tällä viikolla. Katso {{PLURAL:$3|se|ne}} osoitteessa:
{{canonicalurl:{{#special:Notifications}}}}

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
 * @author Urhixidur
 * @author Wyz
 */
$messages['fr'] = array(
	'echo-desc' => 'Système de notifications',
	'prefs-echo' => 'Notifications',
	'prefs-emailsettings' => 'Paramètres de courriel',
	'prefs-displaynotifications' => "Options d'affichage",
	'prefs-echosubscriptions' => 'Me prévenir de ces événements',
	'echo-pref-send-me' => "M'envoyer :",
	'echo-pref-send-to' => 'Envoyer à :',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Courriel',
	'echo-pref-email-frequency-never' => "Ne pas m'envoyer de notification par courriel",
	'echo-pref-email-frequency-immediately' => "Notifications individuelles au fil de l'eau",
	'echo-pref-email-frequency-daily' => 'Un sommaire quotidien des notifications',
	'echo-pref-email-frequency-weekly' => 'Un sommaire hebdomadaire des notifications',
	'echo-pref-notify-show-link' => "Afficher les notifications dans ma barre d'outils",
	'echo-learn-more' => 'En savoir plus',
	'echo-dismiss-button' => 'Rejeter',
	'echo-dismiss-message' => 'Désactiver toutes les $1 notifications',
	'echo-dismiss-prefs-message' => 'Vous pouvez les remettre en place dans vos [[Special:Preferences#mw-prefsection-echo|préférences]]',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Message}} de la page de discussion',
	'echo-category-title-article-linked' => 'Article {{PLURAL:$1|lié}}',
	'echo-category-title-reverted' => '{{PLURAL:$1|Modification annulée|Modifications annulées}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Mention|Mentions}}',
	'echo-category-title-other' => '{{PLURAL:$1|Autres}}',
	'echo-category-title-system' => '{{PLURAL:$1|Système}}',
	'echo-no-agent' => '[Personne]',
	'echo-no-title' => '[Aucune page]',
	'echo-error-no-formatter' => 'Aucune mise en forme définies pour la notification',
	'echo-error-preference' => 'Erreur : Impossible de définir la préférence utilisateur',
	'echo-error-token' => 'Erreur : Impossible de récupérer le jeton de l’utilisateur',
	'notifications' => 'Notifications',
	'tooltip-pt-notifications' => 'Vos notifications',
	'echo-specialpage' => 'Notifications',
	'echo-anon' => 'Pour recevoir des notifications, [[Special:Userlogin/signup|créez un compte]] ou [[Special:UserLogin|connectez-vous]].',
	'echo-none' => "Vous n'avez reçu aucune notification.",
	'echo-more-info' => "Plus d'information",
	'echo-feedback' => 'Avis',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|a publié}} sur votre [[User talk:$2|page de discussion]].',
	'notification-edit-talk-page-flyout2' => '<b>$1</b> {{GENDER:$1|a publié}} sur votre [[User talk:$2|page de discussion]].',
	'notification-page-linked' => '[[:$2]] a été {{GENDER:$1|référencé}} depuis [[:$3]] : [[Special:WhatLinksHere/$2|Voir tous les liens vers cette page]]',
	'notification-page-linked-flyout' => '<b>$2</b> a été {{GENDER:$1|référencé}} depuis <b>$3</b>: [[Special:WhatLinksHere/$2|Voir tous les liens vers cette page]]',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|a fait un commentaire}} sur "[[$3|$2]]" sur la page de discussion "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|a publié}} un nouveau sujet "$2" sur [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] vous {{GENDER:$1|a envoyé}} un message: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|a fait un commentaire}} sur "[[$3#$2|$2]]" sur votre page de discussion',
	'notification-mention' => '[[User:$1|$1]] vous {{GENDER:$1|a mentionné}} sur [[$3#$2|$3]].',
	'notification-mention-flyout' => '<b>$1</b> vous {{GENDER:$1|a mentionné}} sur [[$3#$2|$3]].',
	'notification-user-rights' => 'Vos droits d’utilisateur [[Special:Log/rights/$1|ont été {{GENDER:$1|modifiés}}]] par [[User:$1|$1]]. $2. [[Special:ListGroupRights|En savoir plus]]',
	'notification-user-rights-flyout' => 'Vos droits d’utilisateur {{GENDER:$1|ont été modifiés}} par $1. $2. [[Special:ListGroupRights|En savoir plus]]',
	'notification-user-rights-add' => 'Vous êtes maintenant membre de {{PLURAL:$2|ce groupe|ces groupes}}: $1',
	'notification-user-rights-remove' => 'Vous n’êtes plus membre de {{PLURAL:$2|ce groupe|ces groupes}}: $1',
	'notification-new-user' => 'Bienvenue sur {{SITENAME}}, $1 ! Nous sommes heureux de vous voir ici.',
	'notification-reverted2' => '{{PLURAL:$4|Votre modification sur [[:$2]] a|Vos modifications sur [[:$2]] ont}} été {{GENDER:$1|annulée}}{{PLURAL:$4||s}} par [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Votre modification sur <b>$2</b> a|Vos modifications sur <b>$2</b> ont}} été {{GENDER:$1|annulée}}{{PLURAL:$4||s}} par <b>$1</b> $3',
	'notification-edit-talk-page-email-subject2' => 'Vous avez un nouveau message sur votre page de discussion',
	'notification-edit-talk-page-email-body2' => '$1

$3

En savoir plus:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|a publié}} sur votre page de discussion',
	'notification-page-linked-email-subject' => 'Une page que vous avez commencée a été référencée sur {{SITENAME}}',
	'notification-page-linked-email-body' => '$1

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

Pour vérifier quels courriels nous vous envoyons, allez dans vos préférences :
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nouvelle notification|nouvelles notifications}}',
	'echo-link' => 'Notifications',
	'echo-overlay-link' => 'Toutes les notifications',
	'echo-overlay-title' => '<b>Notifications</b>',
	'echo-overlay-title-overflow' => '<b>Notifications</b> ($1 de $2 non lues affichées)',
	'echo-mark-all-as-read' => 'Tout marquer comme lu',
	'echo-date-today' => "Aujourd'hui",
	'echo-date-yesterday' => 'Hier',
	'echo-load-more-error' => "Un erreur s'est produite en analysant davantage de résultats.",
	'notification-edit-talk-page-bundle' => '$1 et $3 {{PLURAL:$4|autre|autres}} {{GENDER:$1|ont écrit}} sur votre [[User talk:$2|page de discussion]].',
	'notification-page-linked-bundle' => '$2 a été {{GENDER:$1|référencé}} depuis $3 et $4 {{PLURAL:$5|autre page|autres pages}}. [[Special:WhatLinksHere/$2|Voir tous les liens vers cette page]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 et $2 {{PLURAL:$3|autre|autres}} ont {{GENDER:$1|posté}} sur votre page de discussion',
	'notification-page-linked-email-batch-bundle-body' => '$2 a été {{GENDER:$1|lié}} depuis $3 et $4 autres {{PLURAL:$5|page|pages}}',
	'echo-email-batch-subject-daily' => "Vous avez {{PLURAL:$2|une nouvelle notification|de nouvelles notifications}} aujourd'hui",
	'echo-email-batch-subject-weekly' => 'Vous avez {{PLURAL:$2|une nouvelle notification|de nouvelles notifications}} cette semaine',
	'echo-email-batch-body-daily' => "$1,

Vous avez {{PLURAL:$3|une nouvelle notification|de nouvelles notifications}} sur {{SITENAME}} aujourd'hui. Regardez-les ici :
{{canonicalurl:{{#special:Notifications}}}}

$4

$5",
	'echo-email-batch-body-weekly' => '$1,

Vous avez {{PLURAL:$3|une nouvelle notification|de nouvelles notifications}} sur {{SITENAME}} cette semaine. Regardez-les ici :
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
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
	'prefs-emailsettings' => 'Configuración do correo electrónico',
	'prefs-displaynotifications' => 'Opcións de visualización',
	'prefs-echosubscriptions' => 'Notificádeme sobre estes eventos',
	'echo-pref-send-me' => 'Enviádeme:',
	'echo-pref-send-to' => 'Enviar a:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Correo electrónico',
	'echo-pref-email-frequency-never' => 'Non me enviedes ningunha notificación por correo electrónico',
	'echo-pref-email-frequency-immediately' => 'Notificacións individuais en canto cheguen',
	'echo-pref-email-frequency-daily' => 'Un resumo diario das notificacións',
	'echo-pref-email-frequency-weekly' => 'Un resumo semanal das notificacións',
	'echo-pref-notify-show-link' => 'Mostrar as notificacións na miña barra de ferramentas',
	'echo-learn-more' => 'Máis información',
	'echo-dismiss-button' => 'Agochar',
	'echo-dismiss-message' => 'Desactivar todas as notificacións do tipo $1',
	'echo-dismiss-prefs-message' => 'Pode activar isto de novo nas súas [[Special:Preferences#mw-prefsection-echo|preferencias]]',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Mensaxe|Mensaxes}} na páxina de conversa',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Ligazón|Ligazóns}} a unha páxina',
	'echo-category-title-reverted' => '{{PLURAL:$1|Reversión|Reversións}} dunha edición',
	'echo-category-title-mention' => '{{PLURAL:$1|Mención|Mencións}}',
	'echo-category-title-other' => '{{PLURAL:$1|Outras}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistema}}',
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
	'echo-feedback' => 'Comentarios',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|deixou}} unha mensaxe na súa [[User talk:$2|páxina de conversa]].',
	'notification-edit-talk-page-flyout2' => '<b>$1</b> {{GENDER:$1|deixou}} unha mensaxe na súa [[User talk:$2|páxina de conversa]].',
	'notification-page-linked' => '"[[:$2]]" foi {{GENDER:$1|ligada}} desde "[[:$3]]": [[Special:WhatLinksHere/$2|Ollar todas as ligazóns cara a esta páxina]]',
	'notification-page-linked-flyout' => '"$2" foi {{GENDER:$1|ligada}} desde "<b>$3</b>": [[Special:WhatLinksHere/$2|Ollar todas as ligazóns cara a esta páxina]]',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|comentou}} en "[[$3|$2]]" na páxina de conversa "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|comezou}} o fío de conversa "$2" en "[[$3]]"',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|envioulle}} unha mensaxe: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|comentou}} en "[[$3#$2|$2]]" na páxina de conversa',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|fíxolle}} unha mención en "[[$3#$2|$3]]".',
	'notification-mention-flyout' => '<b>$1</b> {{GENDER:$1|fíxolle}} unha mención en "[[$3#$2|$3]]".',
	'notification-user-rights' => '[[User:$1|$1]] [[Special:Log/rights/$1|{{GENDER:$1|mudou}} os seus dereitos de usuario]]. $2. [[Special:ListGroupRights|Máis información]]',
	'notification-user-rights-flyout' => '<b>$1</b> {{GENDER:$1|mudou}} os seus dereitos de usuario. $2. [[Special:ListGroupRights|Máis información]]',
	'notification-user-rights-add' => 'Agora pertence a {{PLURAL:$2|este grupo|estes grupos}}: $1',
	'notification-user-rights-remove' => 'Xa non pertence a {{PLURAL:$2|este grupo|estes grupos}}: $1',
	'notification-new-user' => 'Dámoslle a benvida a {{SITENAME}}, $1! Alegrámonos de que estea aquí.',
	'notification-reverted2' => '[[User:$1|$1]] {{GENDER:$1|reverteu}} {{PLURAL:$4|a súa edición|as súas edicións}} en "[[:$2]]" $3',
	'notification-reverted-flyout2' => '<b>$1</b> {{GENDER:$1|reverteu}} {{PLURAL:$4|a súa edición|as súas edicións}} en "<b>$2</b>" $3',
	'notification-edit-talk-page-email-subject2' => 'Ten unha nova mensaxe na súa páxina de conversa',
	'notification-edit-talk-page-email-body2' => '$1

$3

Ollar máis:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|deixou}} unha mensaxe na súa páxina de conversa',
	'notification-page-linked-email-subject' => 'Unha páxina que comezou foi ligada en {{SITENAME}}',
	'notification-page-linked-email-body' => '$1

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

Para controlar os correos electrónicos que lle enviamos, comprobe as súas preferencias:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nova notificación|novas notificacións}}',
	'echo-link' => 'Notificacións',
	'echo-overlay-link' => 'Todas as notificacións',
	'echo-overlay-title' => '<b>Notificacións</b>',
	'echo-overlay-title-overflow' => '<b>Notificacións</b> (mostrando $1 de $2 sen ler)',
	'echo-mark-all-as-read' => 'Marcar todo como lido',
	'echo-date-today' => 'Hoxe',
	'echo-date-yesterday' => 'Onte',
	'echo-date-header' => '$2 de $1',
	'echo-load-more-error' => 'Houbo un erro ao procurar máis resultados.',
	'notification-edit-talk-page-bundle' => '$1 e {{PLURAL:$4|outra persoa|$3 persoas máis}} {{GENDER:$1|deixaron}} mensaxes na súa [[User talk:$2|páxina de conversa]].',
	'notification-page-linked-bundle' => '"$2" foi {{GENDER:$1|ligada}} desde "$3" e $4 {{PLURAL:$5|páxina|páxinas}} máis. [[Special:WhatLinksHere/$2|Ollar todas as ligazóns cara a esta páxina]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 e {{PLURAL:$3|outra persoa|$2 persoas máis}} {{GENDER:$1|deixaron}} mensaxes na súa páxina de conversa',
	'notification-page-linked-email-batch-bundle-body' => '"$2" foi {{GENDER:$1|ligada}} desde "$3" e {{PLURAL:$5|outra páxina|$4 páxinas máis}}',
	'echo-email-batch-subject-daily' => 'Hoxe ten {{PLURAL:$2|unha nova notificación|novas notificacións}}',
	'echo-email-batch-subject-weekly' => 'Esta semana ten {{PLURAL:$2|unha nova notificación|novas notificacións}}',
	'echo-email-batch-body-daily' => '$1:

Hoxe ten {{PLURAL:$3|unha nova notificación|novas notificacións}} en {{SITENAME}}. Bótelles unha ollada aquí:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1:

Esta semana ten {{PLURAL:$3|unha nova notificación|novas notificacións}} en {{SITENAME}}. Bótelles unha ollada aquí:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
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
 * @author Orsa
 * @author חיים
 */
$messages['he'] = array(
	'echo-desc' => 'מערכת הודעות',
	'prefs-echo' => 'הודעות',
	'prefs-emailsettings' => 'הגדרות דוא"ל',
	'prefs-displaynotifications' => 'אפשרויות תצוגה',
	'prefs-echosubscriptions' => 'להודיע לי על האירועים הבאים',
	'echo-pref-send-me' => 'מה לשלוח לי:',
	'echo-pref-send-to' => 'לשלוח אל:',
	'echo-pref-web' => 'באתר',
	'echo-pref-email' => 'בדוא"ל',
	'echo-pref-email-frequency-never' => 'לא לשלוח לי שום הודעות בדואר אלקטרוני',
	'echo-pref-email-frequency-immediately' => 'הודעות בודדות כשהן מגיעות',
	'echo-pref-email-frequency-daily' => 'סיכום יומי של הודעות',
	'echo-pref-email-frequency-weekly' => 'סיכום שבועי של הודעות',
	'echo-pref-notify-show-link' => 'להציג הודעות בסרגל שלי',
	'echo-learn-more' => 'מידע נוסף',
	'echo-dismiss-button' => 'סגירה',
	'echo-dismiss-message' => 'כיבוי כל ההודעת על $1',
	'echo-dismiss-prefs-message' => 'אפשר להפעיל את אלה שוב ב[[Special:Preferences#mw-prefsection-echo|העדפות]]',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|הודעה|הודעות}} בדף שיחה',
	'echo-category-title-article-linked' => '{{PLURAL:$1|קישור לדף|קישורים לדפים}}',
	'echo-category-title-reverted' => '{{PLURAL:$1|שחזור עריכה|שחזורי עריכות}}',
	'echo-category-title-mention' => '{{PLURAL:$1|אזכור|אזכורים}}',
	'echo-category-title-other' => '{{PLURAL:$1|אחר}}',
	'echo-category-title-system' => '{{PLURAL:$1|מערכת}}',
	'echo-no-agent' => '[אף אחד]',
	'echo-no-title' => '[ללא דף]',
	'echo-error-no-formatter' => 'לא הוגדר עיצוב להודעות',
	'echo-error-preference' => 'שגיאה: לא ניתן להגדיר העדפת משתמש',
	'echo-error-token' => 'שגיאה: לא ניתן לאחזר אסימון משתמש',
	'notifications' => 'הודעות',
	'tooltip-pt-notifications' => 'ההודעות שלך',
	'echo-specialpage' => 'הודעות',
	'echo-anon' => 'כדי לקבל הודעות, [[Special:Userlogin/signup|יש ליצור חשבון]] או [[Special:UserLogin|להיכנס]].',
	'echo-none' => 'אין לך הודעות.',
	'echo-more-info' => 'מידע נוסף',
	'echo-feedback' => 'משוב',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|כתב|כתבה}} ב[[User talk:$2|הדף השיחה]] שלך.',
	'notification-edit-talk-page-flyout2' => '<b>$1</b> {{GENDER:$1|כתב|כתבה}} ב[[User talk:$2|דף השיחה שלך]].',
	'notification-page-linked' => '{{GENDER:$1|נוסף קישור}} אל הדף [[:$2]] מהדף [[:$3]]: [[Special:WhatLinksHere/$2|כל הקישורים אל הדף הזה]]',
	'notification-page-linked-flyout' => '{{GENDER:$1|נוסף קישור}} אל הדף <b>$2</b> מהדף <b>$3</b>: [[Special:WhatLinksHere/$2|כל הקישורים אל הדף הזה]]',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|העיר|העירה}} על הנושא "[[$3|$2]]" בדף השיחה של "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|והוסיף|הוסיפה}} את נושא החדש "$2" לדף [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|שלח|שלחה}} לך הודעה: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|העיר|העירה}} על הנושא "[[$3#$2|$2]]" בדף השיחה שלך',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|הזכיר|הזכירה}} אותך בדיון [[$3#$2|$3]].',
	'notification-mention-flyout' => '<b>$1</b> {{GENDER:$1|הזכיר|הזכירה}} אותך בדיון [[$3#$2|$3]].',
	'notification-user-rights' => '[[User:$1|$1]] [[Special:Log/rights/$1|{{GENDER:$1|שינה|שינתה}}]] את ההרשאות שלך. $2. [[Special:ListGroupRights|מידע נוסף]]',
	'notification-user-rights-flyout' => '<b>$1</b> {{GENDER:$1|שינה|שינתה}} את ההרשאות שלך. $2. [[Special:ListGroupRights|מידע נוסף]]',
	'notification-user-rights-add' => 'צורפת {{PLURAL:$2|לקבוצה הבאה|לקבוצות הבאות}}: $1',
	'notification-user-rights-remove' => 'נמחקת {{PLURAL:$2|מהקבוצה הבאה|מהקבוצות הבאות}}: $1',
	'notification-new-user' => 'ברוך בואך ל{{GRAMMAR:תחילית|{{SITENAME}}}}, $1! אנחנו שמחים לראות אותך כאן.',
	'notification-reverted2' => '[[User:$1|$1]] {{GENDER:$1|שחזר|שחזרה}} {{PLURAL:$4|עריכה שלך|עריכות שלך}} בדף [[:$2]] $3',
	'notification-reverted-flyout2' => '<b>$1</b> {{GENDER:$1|שחזר|שחזרה}} {{PLURAL:$4|עריכה שלך|עריכות שלך}} בדף <b>$2</b> $3',
	'notification-edit-talk-page-email-subject2' => 'יש לך הודעה חדשה בדף השיחה',
	'notification-edit-talk-page-email-body2' => '$1

$3

מידע נוסף:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|כתב|כתבה}} הדף השיחה שלך',
	'notification-page-linked-email-subject' => 'מישהו קישר אל הדף שיצרת באתר {{SITENAME}}',
	'notification-page-linked-email-body' => '$1

כל הקישורים אל הדף הזה:

{{canonicalurl:{{#special:WhatLinksHere/$2}}}}

$3',
	'notification-page-linked-email-batch-body' => '{{GENDER:$1|מישהו קישר|מישהי קישרה}} מהדף $3 אל הדף $2',
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
	'notification-user-rights-email-subject' => 'ההרשאות שלך באתר {{SITENAME}} שונו',
	'notification-user-rights-email-body' => '$1 {{GENDER:$1|שינה|שינתה}} את ההרשאות שלך. $2

מידע נוסף:

{{canonicalurl:{{#special:ListGroupRights}}}}

$3',
	'notification-user-rights-email-batch-body' => '$1 {{GENDER:$1|שינה|שינתה}} את ההרשאות שלך. $2',
	'echo-notification-count' => 'יותר מ־$1',
	'echo-email-subject-default' => 'הודעה חדשה באתר {{SITENAME}}',
	'echo-email-body-default' => 'יש לך הודעה חדשה באתר {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'יש לך הודעה חדשה',
	'echo-email-footer-default' => '$2

כדי לבחור אילו מכתבים נשלח לך, אפשר לשנות את ההעדפות שלך:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '{{PLURAL:$1|הודעה חדשה אחת|$1 הודעות חדשות}}',
	'echo-link' => 'הודעות',
	'echo-overlay-link' => 'כל ההודעות',
	'echo-overlay-title' => '<b>הודעות</b>',
	'echo-overlay-title-overflow' => '<b>הודעות</b> (מוצגות $1 מתוך $2 שלא נקראו)',
	'echo-mark-all-as-read' => 'לסמן שהכול נקרא',
	'echo-date-today' => 'היום',
	'echo-date-yesterday' => 'אתמול',
	'echo-date-header' => '$2 $1',
	'echo-load-more-error' => 'אירעה שגיאה בעת אחזור תוצאות נוספות.',
	'notification-edit-talk-page-bundle' => '$1 ועוד {{PLURAL:$4|אדם אחד|$3 אנשים אחרים}} כתבו ב[[User talk:$2|דף השיחה]] שלך.',
	'notification-page-linked-bundle' => 'אל הדף $2 {{GENDER:$1|נוסף קישור}} מהדף $3 ומעוד {{PLURAL:$5|דף|$4 דפים אחרים}}. [[Special:WhatLinksHere/$2|כל הקישורים אל הדף הזה]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 ועוד {{PLURAL:$3|אדם אחד|$2 אנשים אחרים}} כתבו בדף השיחה שלך.',
	'notification-page-linked-email-batch-bundle-body' => 'אל הדף $2 {{GENDER:$1|נוסף קישור}} מהדף $3 ומעוד {{PLURAL:$5|דף|$4 דפים אחרים}}.',
	'echo-email-batch-subject-daily' => 'קיבלת {{PLURAL:$2|הודעה חדשה|הודעות חדשות}} היום',
	'echo-email-batch-subject-weekly' => 'קיבלת {{PLURAL:$2|הודעה חדשה|הודעות חדשות}} השבוע',
	'echo-email-batch-body-daily' => '$1,

קיבלת {{PLURAL:$3|הודעה חדשה|הודעות חדשות}} באתר {{SITENAME}} היום. אפשר לראות {{PLURAL:$3|אותה|אותן}} כאן:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,

קיבלת {{PLURAL:$3|הודעה חדשה|הודעות חדשות}} באתר {{SITENAME}} השבוע. אפשר לראות {{PLURAL:$3|אותה|אותן}} כאן:
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
	'prefs-echosubscriptions' => 'Értesítést kérek, ha valaki...', # Fuzzy
	'echo-pref-email' => 'E-mail',
	'echo-pref-email-frequency-never' => 'Egyáltalán ne küldjön e-mail értesítést',
	'echo-pref-email-frequency-immediately' => 'egyéni értesítést, ahogy az esemény  bekövetkezik',
	'echo-pref-email-frequency-daily' => 'értesítések napi összefoglalója',
	'echo-pref-email-frequency-weekly' => 'értesítések heti összefoglalója',
	'echo-dismiss-button' => 'elrejt',
	'echo-dismiss-message' => 'Minden "$1" típusú értesítés kikapcsolása',
	'echo-dismiss-prefs-message' => 'Visszakapcsolhatod ezeket a beállításaidban.', # Fuzzy
	'echo-category-title-edit-user-talk' => 'vitalapi üzenet', # Fuzzy
	'echo-category-title-article-linked' => 'hivatkozott lap', # Fuzzy
	'echo-category-title-reverted' => 'visszaállított szerkesztés', # Fuzzy
	'echo-category-title-mention' => 'említés', # Fuzzy
	'echo-no-agent' => '[Senki]',
	'echo-no-title' => '[Nincs lap]',
	'echo-error-no-formatter' => 'Nincs értesítési formatálás definiálva',
	'echo-error-preference' => 'Hiba: Nem sikerült beállítani a felhasználói beállítást',
	'notifications' => 'Értesítések',
	'tooltip-pt-notifications' => 'Értesítéseim',
	'echo-specialpage' => 'Értesítéseim', # Fuzzy
	'echo-anon' => 'Értesítések fogadásához [[Special:Userlogin/signup|hozz létre egy fiókot]] vagy [[Special:UserLogin|jelentkezzen be]].',
	'echo-none' => 'Nincsenek értesítések.',
	'echo-more-info' => 'További információ',
	'notification-edit-talk-page2' => '[[User:$1|$1]] üzenetet írt [[User talk:$2|a vitalapodra]].',
	'notification-edit-talk-page-flyout2' => '<b>$1</b> üzenetet írt [[User talk:$2|a vitalapodra]].',
	'notification-add-comment2' => '[[User:$1|$1]] hozzászólt a(z) "[[$3|$2]]" témához a(z) "$4" vitalapon',
	'notification-new-user' => 'Üdvözlet a {{SITENAME}} oldalon, $1!', # Fuzzy
	'echo-link-new' => '$1 új értesítés',
	'echo-link' => 'Értesítések',
	'echo-overlay-link' => 'Összes értesítés…', # Fuzzy
	'echo-overlay-title' => 'Értesítéseim', # Fuzzy
	'echo-overlay-title-overflow' => 'Értesüléseim ($2 olvasatlanból $1 megjelenítve)', # Fuzzy
	'echo-date-today' => 'Ma',
	'echo-date-yesterday' => 'Tegnap',
	'echo-load-more-error' => 'Hiba történt a további eredmények lekérdezése során.',
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
 * @author Pietrodn
 * @author Raoli
 * @author Vituzzu
 */
$messages['it'] = array(
	'echo-desc' => 'Sistema per le notifiche',
	'prefs-echo' => 'Notifiche',
	'prefs-emailsettings' => 'Impostazioni email',
	'prefs-displaynotifications' => 'Opzioni di visualizzazione',
	'prefs-echosubscriptions' => 'Inviami una notifica su questi eventi',
	'echo-pref-send-me' => 'Inviami:',
	'echo-pref-send-to' => 'Invia a:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Email',
	'echo-pref-email-frequency-never' => 'Non inviarmi alcuna notifica via e-mail',
	'echo-pref-email-frequency-immediately' => 'Notifiche individuali come arrivano',
	'echo-pref-email-frequency-daily' => 'Un riepilogo giornaliero delle notifiche',
	'echo-pref-email-frequency-weekly' => 'Un riepilogo settimanale delle notifiche',
	'echo-pref-notify-show-link' => 'Visualizza le notifiche nella mia barra degli strumenti',
	'echo-learn-more' => 'Ulteriori informazioni',
	'echo-dismiss-button' => 'Nascondi',
	'echo-dismiss-message' => 'Nascondi tutte le notifiche di $1',
	'echo-dismiss-prefs-message' => 'È possibile riattivarle nelle [[Special:Preferences#mw-prefsection-echo|preferenze]]',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Messaggio|Messaggi}} sulla pagina di discussione',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Collegamento|Collegamenti}} alla pagina',
	'echo-category-title-reverted' => '{{PLURAL:$1|Modifica annullata|Modifiche annullate}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Menzione|Menzioni}}',
	'echo-category-title-other' => '{{PLURAL:$1|Altro}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistema}}',
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
	'echo-feedback' => 'Feedback',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|ha postato}} sulla tua [[User talk:$2|pagina di discussione]].',
	'notification-edit-talk-page-flyout2' => '<b>$1</b> {{GENDER:$1|ha postato}} sulla tua [[User talk:$2|pagina di discussione]].',
	'notification-page-linked' => '[[:$2]] è stata {{GENDER:$1|collegata}} da [[:$3]]: [[Special:WhatLinksHere/$2|Vedi tutti i collegamenti a questa pagina]]',
	'notification-page-linked-flyout' => '<b>$2</b> è stata {{GENDER:$1|collegata}} da <b>$3</b>: [[Special:WhatLinksHere/$2|Vedi tutti i collegamenti a questa pagina]]',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|ha lasciato un commento}} riguardo a "[[$3|$2]]" nella pagina di discussione di "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|ha postato}} un nuovo argomento "$2" su [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] ti {{GENDER:$1|ha inviato}} un messaggio: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|ha lasciato un commento}} riguardo a "[[$3#$2|$2]]" nella tua pagina di discussione',
	'notification-mention' => '[[User:$1|$1]] ti ha {{GENDER:$1|menzionato|menzionata|menzionato/a}} su [[$3#$2|$3]].',
	'notification-mention-flyout' => '<b>$1</b> ti ha {{GENDER:$1|menzionato|menzionata|menzionato/a}} su [[$3#$2|$3]].',
	'notification-user-rights' => 'I tuoi diritti utente [[Special:Log/rights/$1|sono stati {{GENDER:$1|modificati}}]] da [[User:$1|$1]]. $2. [[Special:ListGroupRights|Ulteriori informazioni]]',
	'notification-user-rights-flyout' => 'I tuoi diritti utente sono stati {{GENDER:$1|modificati}} da <b>$1</b>. $2. [[Special:ListGroupRights|Ulteriori informazioni]]',
	'notification-user-rights-add' => 'Ora sei membro di {{PLURAL:$2|questo gruppo|questi gruppi}}: $1',
	'notification-user-rights-remove' => 'Non sei più membro di {{PLURAL:$2|questo gruppo|questi gruppi}}: $1',
	'notification-new-user' => 'Benvenuto su {{SITENAME}}, $1! Siamo felici che tu sia qui.',
	'notification-reverted2' => '{{PLURAL:$4|La tua modifica|Le tue modifiche}} su [[:$2]] {{PLURAL:$4|è stata annullata|sono state annullate}} {{GENDER:$1|da}} [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|La tua modifica|Le tue modifiche}} su <b>$2</b> {{PLURAL:$4|è stata annullata|sono state annullate}} {{GENDER:$1|da}} <b>$1</b> $3',
	'notification-edit-talk-page-email-subject2' => 'Hai un nuovo messaggio nella pagina di discussione',
	'notification-edit-talk-page-email-body2' => '$1

$3

Vedi anche:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|ha postato}} sulla tua pagina di discussione',
	'notification-page-linked-email-subject' => 'Una pagina che hai creato è stata collegata su {{SITENAME}}',
	'notification-page-linked-email-body' => '$1

Vedi tutti i collegamenti a questa pagina:

{{canonicalurl:{{#special:WhatLinksHere/$2}}}}

$3',
	'notification-page-linked-email-batch-body' => '$2 è stata {{GENDER:$1|collegata}} da $3',
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
	'notification-user-rights-email-subject' => 'I tuoi diritti utente sono stati modificati su {{SITENAME}}',
	'notification-user-rights-email-body' => 'I tuoi diritti utente sono stati {{GENDER:$1|modificati}} da $1. $2

Ulteriori informazioni:

{{canonicalurl:{{#special:ListGroupRights}}}}

$3',
	'notification-user-rights-email-batch-body' => 'I tuoi diritti utente sono stati {{GENDER:$1|modificati}} da $1. $2',
	'echo-email-subject-default' => 'Nuova notifica su {{SITENAME}}',
	'echo-email-body-default' => 'Hai una nuova notifica su {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Hai una nuova notifica',
	'echo-email-footer-default' => '$2

Per controllare quali email ti verranno inviate, controlla le tue preferenze:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nuova notifica|nuove notifiche}}',
	'echo-link' => 'notifiche',
	'echo-overlay-link' => 'Tutte le notifiche',
	'echo-overlay-title' => '<b>Notifiche</b>',
	'echo-overlay-title-overflow' => '<b>Notifiche</b> (mostrate $1 di $2 non lette)',
	'echo-mark-all-as-read' => 'Segna tutte come lette',
	'echo-date-today' => 'Oggi',
	'echo-date-yesterday' => 'Ieri',
	'echo-load-more-error' => 'Si è verificato un errore nel recupero di ulteriori risultati.',
	'notification-edit-talk-page-bundle' => '$1 e {{PLURAL:$4|un altro utente|altri $3 utenti}} {{GENDER:$1|hanno postato}} nella tua [[User talk:$2|pagina di discussione]].',
	'notification-page-linked-bundle' => '$2 è stata {{GENDER:$1|collegata}} da $3 ed {{PLURAL:$5|un altra pagina|altre $4 pagine}}. [[Special:WhatLinksHere/$2|Vedi tutti i collegamenti a questa pagina]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 e {{PLURAL:$3|un altro|altri $2}} {{GENDER:$1|hanno postato}} sulla tua pagina di discussione',
	'notification-page-linked-email-batch-bundle-body' => '$2 è stata {{GENDER:$1|collegata}} da $3 ed {{PLURAL:$5|un altra pagina|altre $4 pagine}}',
	'echo-email-batch-subject-daily' => 'Hai {{PLURAL:$2|una nuova notifica|nuove notifiche}} oggi',
	'echo-email-batch-subject-weekly' => 'Hai {{PLURAL:$2|una nuova notifica|nuove notifiche}} questa settimana',
	'echo-email-batch-body-daily' => '$1,

Hai {{PLURAL:$3|una nuova notifica|nuove notifiche}} su {{SITENAME}} oggi. Puoi vederle qui:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,

Hai {{PLURAL:$3|una nuova notifica|nuove notifiche}} su {{SITENAME}} questa settimana. Puoi vederle qui:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
);

/** Japanese (日本語)
 * @author Fryed-peach
 * @author Shirayuki
 * @author Whym
 */
$messages['ja'] = array(
	'echo-desc' => '通知システム',
	'prefs-echo' => '通知',
	'prefs-emailsettings' => 'メールの設定',
	'prefs-displaynotifications' => '表示の設定',
	'prefs-echosubscriptions' => '以下の場合に通知を受け取る',
	'echo-pref-send-me' => '受け取る頻度:',
	'echo-pref-send-to' => '送信先:',
	'echo-pref-web' => 'ウェブ',
	'echo-pref-email' => 'メール',
	'echo-pref-email-frequency-never' => '通知メールを何も受け取らない',
	'echo-pref-email-frequency-immediately' => '個別の通知が来るたび',
	'echo-pref-email-frequency-daily' => '通知を1日ごとに要約',
	'echo-pref-email-frequency-weekly' => '通知を1週間ごとに要約',
	'echo-pref-notify-show-link' => '通知をツールバーに表示',
	'echo-learn-more' => '詳細',
	'echo-dismiss-button' => '非表示',
	'echo-dismiss-message' => '$1についての通知をすべて止める',
	'echo-dismiss-prefs-message' => 'これらは[[Special:Preferences#mw-prefsection-echo|個人設定]]で元に戻すこともできます',
	'echo-category-title-edit-user-talk' => 'トークページヘの{{PLURAL:$1|投稿}}',
	'echo-category-title-article-linked' => 'ページへの{{PLURAL:$1|リンク}}',
	'echo-category-title-reverted' => '編集の{{PLURAL:$1|差し戻し}}',
	'echo-category-title-mention' => '{{PLURAL:$1|言及}}',
	'echo-category-title-other' => '{{PLURAL:$1|その他}}',
	'echo-category-title-system' => '{{PLURAL:$1|システム}}',
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
	'echo-feedback' => 'フィードバック',
	'echo-quotation-marks' => '「$1」',
	'notification-edit-talk-page2' => '[[User:$1|$1]] があなたの[[User talk:$2|トークページ]]に{{GENDER:$1|投稿しました}}。',
	'notification-edit-talk-page-flyout2' => '<b>$1</b> があなたの[[User talk:$2|トークページ]]に{{GENDER:$1|投稿しました}}。',
	'notification-page-linked' => '[[:$2]] が [[:$3]] から{{GENDER:$1|リンクされました}}: [[Special:WhatLinksHere/$2|このページのリンク元]]',
	'notification-page-linked-flyout' => '<b>$2</b> が <b>$3</b> から{{GENDER:$1|リンクされました}}: [[Special:WhatLinksHere/$2|このページのリンク元]]',
	'notification-add-comment2' => '[[User:$1|$1]] が「$4」のトークページの「[[$3|$2]]」に{{GENDER:$1|コメントしました}}',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] が [[$3]] に新しい話題「$2」を{{GENDER:$1|投稿しました}}',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] があなたにメッセージを{{GENDER:$1|送信しました}}:「[[$3#$2|$2]]」',
	'notification-add-comment-yours2' => '[[User:$1|$1]] があなたのトークページの「[[$3#$2|$2]]」に{{GENDER:$1|コメントしました}}',
	'notification-mention' => '[[User:$1|$1]] が [[$3#$2|$3]] であなたに{{GENDER:$1|言及しました}}。',
	'notification-mention-flyout' => '<b>$1</b> が [[$3#$2|$3]] であなたに{{GENDER:$1|言及しました}}。',
	'notification-user-rights' => 'あなたの権限を[[User:$1|$1]]が[[Special:Log/rights/$1|{{GENDER:$1|変更しました}}]]。$2。[[Special:ListGroupRights|詳細はこちら]]',
	'notification-user-rights-flyout' => 'あなたの権限を <b>$1</b> が{{GENDER:$1|変更しました}}。$2。[[Special:ListGroupRights|詳細はこちら]]',
	'notification-user-rights-add' => 'あなたは現在{{PLURAL:$2|次のグループ}}に所属しています: $1',
	'notification-user-rights-remove' => 'あなたは{{PLURAL:$2|次のグループ}}の所属から外れました: $1',
	'notification-new-user' => '$1さん、{{SITENAME}}へようこそおいでくださいました。',
	'notification-reverted2' => '{{PLURAL:$4|[[:$2]] でのあなたの編集}}を [[User:$1|$1]] が{{GENDER:$1|差し戻しました}} $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|<b>$2</b> でのあなたの編集}}を <b>$1</b> が{{GENDER:$1|差し戻しました}} $3',
	'notification-edit-talk-page-email-subject2' => 'トークページに新着メッセージがあります',
	'notification-edit-talk-page-email-body2' => '$1

$3

詳細はこちら:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 があなたのトークページに{{GENDER:$1|投稿しました}}',
	'notification-page-linked-email-subject' => 'あなたが作成したページが{{SITENAME}}でリンクされました',
	'notification-page-linked-email-body' => '$1

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
	'notification-user-rights-email-body' => 'あなたの権限が $1 により{{GENDER:$1|変更されました}}。$2

詳細を確認:

{{canonicalurl:{{#special:ListGroupRights}}}}

$3',
	'notification-user-rights-email-batch-body' => 'あなたの権限が $1 により{{GENDER:$1|変更されました}}。$2',
	'echo-email-subject-default' => '{{SITENAME}}での新しい通知',
	'echo-email-body-default' => '{{SITENAME}}で新しい通知があります:

$1',
	'echo-email-batch-body-default' => '新しい通知があります',
	'echo-email-footer-default' => '$2

受け取るメールの設定を変更するには、個人設定をご確認ください:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|件の新しい通知}}',
	'echo-link' => '通知',
	'echo-overlay-link' => 'すべての通知',
	'echo-overlay-title' => '<b>通知</b>',
	'echo-overlay-title-overflow' => '<b>通知</b> (未読 $2 件中 $1 件を表示中)',
	'echo-mark-all-as-read' => 'すべて既読にする',
	'echo-date-today' => '今日',
	'echo-date-yesterday' => '昨日',
	'echo-date-header' => '$1$2日',
	'echo-load-more-error' => '結果の続きを取得する際にエラーが発生しました。',
	'notification-edit-talk-page-bundle' => '$1 と他 $3 {{PLURAL:$4|人}}があなたの[[User talk:$2|トークページ]]に{{GENDER:$1|投稿しました}}。',
	'notification-page-linked-bundle' => '$2 が $3 と他 $4 {{PLURAL:$5|件のページ}}から{{GENDER:$1|リンクされました}}。[[Special:WhatLinksHere/$2|このページのリンク元]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 と他 $2 {{PLURAL:$3|人}}があなたのトークページに{{GENDER:$1|投稿しました}}',
	'notification-page-linked-email-batch-bundle-body' => '$2 が $3 と他 $4 {{PLURAL:$5|件のページ}}から{{GENDER:$1|リンクされました}}',
	'echo-email-batch-separator' => '________________________________________________',
	'echo-email-batch-subject-daily' => 'この1日で{{PLURAL:$2|新たな通知}}が届いています',
	'echo-email-batch-subject-weekly' => 'この1週間で{{PLURAL:$2|新たな通知}}が届いています',
	'echo-email-batch-body-daily' => '$1 さん、

{{SITENAME}}上で、今日{{PLURAL:$3|新たな通知}}が届きました。{{PLURAL:$3|}}下記の場所でご覧いただけます。
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1 さん、

{{SITENAME}}上で、この1週間に{{PLURAL:$3|新たな通知}}が届きました。{{PLURAL:$3|}}下記の場所でご覧いただけます。
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
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
	'prefs-echosubscriptions' => 'შემატყობინეთ ამ ღონისძიებების შესახებ',
	'echo-pref-web' => 'ქსელი',
	'echo-pref-email' => 'ელ. ფოსტა',
	'echo-no-agent' => '[არავინ]',
	'echo-no-title' => '[არ არის გვერდი]',
	'notifications' => 'შეტყობინებები',
	'tooltip-pt-notifications' => 'თქვენი შეტყობინებები',
	'echo-specialpage' => 'შეტყობინებები',
	'echo-more-info' => 'დეტალურად',
	'notification-new-user' => 'კეთილი იყოს თქვენი მობრძანება საიტზე {{SITENAME}}, $1! ჩვენ მოხარული ვართ თქვენი აქ ყოფნით.',
	'echo-notification-count' => '$1+',
	'echo-link' => 'შეტყობინებები',
	'echo-overlay-link' => 'შეტყობინება',
	'echo-overlay-title' => '<b>შეტყობინებები</b>',
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
	'prefs-echosubscriptions' => '다음 경우에 알림…', # Fuzzy
	'echo-pref-web' => '웹',
	'echo-pref-email' => '이메일',
	'echo-pref-email-frequency-never' => '내게 어떠한 이메일 알림을 보내지 않기',
	'echo-pref-email-frequency-immediately' => '모두한테 오는 개별 알림',
	'echo-pref-email-frequency-daily' => '알림의 일별 요약',
	'echo-pref-email-frequency-weekly' => '알림의 주간 요약',
	'echo-dismiss-button' => '기각',
	'echo-dismiss-message' => '모든 $1 알림 끄기',
	'echo-dismiss-prefs-message' => '사용자 환경 설정에서 다시 설정할 수 있습니다.', # Fuzzy
	'echo-category-title-edit-user-talk' => '토론 문서 게시물', # Fuzzy
	'echo-category-title-article-linked' => '문서를 링크함', # Fuzzy
	'echo-category-title-reverted' => '편집을 되돌림', # Fuzzy
	'echo-category-title-mention' => '언급', # Fuzzy
	'echo-no-agent' => '[알 수 없는 사용자]',
	'echo-no-title' => '[문서 없음]',
	'echo-error-no-formatter' => '알림에 대해 정의한 형식이 없습니다',
	'echo-error-preference' => '오류: 사용자 환경 설정을 설정할 수 없습니다',
	'echo-error-token' => '오류: 사용자 토큰을 얻을 수 없습니다',
	'notifications' => '알림',
	'tooltip-pt-notifications' => '내 알림',
	'echo-specialpage' => '내 알림', # Fuzzy
	'echo-anon' => '알림을 받으려면 [[Special:Userlogin/signup|계정을 만들거나]] [[Special:UserLogin|로그인하세요]].',
	'echo-none' => '알림이 없습니다.',
	'echo-more-info' => '자세한 정보',
	'notification-edit-talk-page2' => '[[User:$1|$1]] 사용자가 내 [[User talk:$2|토론 문서]]에 {{GENDER:$1|게시했습니다}}.',
	'notification-edit-talk-page-flyout2' => '<b>$1</b> 사용자가 내 [[User talk:$2|토론 문서]]에 {{GENDER:$1|게시했습니다}}.',
	'notification-add-comment2' => '[[User:$1|$1]] 사용자가 "$4" 토론 문서의 "[[$3|$2]]"에 {{GENDER:$1|덧글을 남겼습니다}}',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] 사용자가 [[$3]]의 "$2" 새 주제를 {{GENDER:$1|게시했습니다}}',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] 사용자가 내게 메시지를 {{GENDER:$1|보냈습니다}}: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] 사용자가 내 토론 문서의 "[[$3#$2|$2]]"에 {{GENDER:$1|덧글을 남겼습니다}}',
	'notification-mention' => '[[User:$1|$1]] 사용자가 [[$3#$2|$3]]에 당신을 {{GENTER:$1|언급했습니다}}.',
	'notification-mention-flyout' => '<b>$1</b> 사용자가 [[$3#$2|$3]]에 당신을 {{GENDER:$1|언급했습니다}}.',
	'notification-new-user' => '$1, {{SITENAME}}에 온 것을 환영합니다!', # Fuzzy
	'notification-reverted2' => '{{PLURAL:$4|[[:$2]]에 대한 내 편집}}을 [[User:$1|$1]] 사용자가 {{GENDER:$1|되돌렸습니다}} $3', # Fuzzy
	'notification-reverted-flyout2' => '{{PLURAL:$4|<b>$2</b>에 대한 내 편집}}을 <b>$1</b> 사용자가 {{GENDER:$1|되돌렸습니다}} $3',
	'notification-edit-talk-page-email-subject2' => '새 토론 문서 메시지가 있습니다',
	'notification-edit-talk-page-email-body2' => '{{SITENAME}} $1 사용자가 내 토론 문서에 {{GENDER:$1|게시했습니다}}:

$3

더 보기:

$2

$4', # Fuzzy
	'notification-edit-talk-page-email-batch-body2' => '$1 사용자가 내 토론 문서에 {{GENDER:$1|게시했습니다}}',
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

$1', # Fuzzy
	'echo-link-new' => '새 {{PLURAL:$1|알림}} $1개',
	'echo-link' => '알림',
	'echo-overlay-link' => '모든 알림',
	'echo-overlay-title' => '내 알림', # Fuzzy
	'echo-overlay-title-overflow' => '내 알림 (읽지 않은 알림 $2개 중 $1개 보는 중)', # Fuzzy
	'echo-date-today' => '오늘',
	'echo-date-yesterday' => '어제',
	'echo-load-more-error' => '더 많은 결과를 가져오는 동안 오류가 발생했습니다.',
	'echo-email-batch-subject-daily' => '오늘 {{PLURAL:$2|알림}} $1개가 있습니다', # Fuzzy
	'echo-email-batch-subject-weekly' => '이번 주 {{PLURAL:$2|알림}} $1개가 있습니다', # Fuzzy
	'echo-email-batch-body-daily' => '$1,

오늘 {{SITENAME}}에 {{PLURAL:$3|알림}} $2개가 있습니다. 여기서 볼 수 있습니다:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5', # Fuzzy
	'echo-email-batch-body-weekly' => '$1,

이번 주 {{SITENAME}}에 {{PLURAL:$3|알림}} $2개가 있습니다. 여기서 볼 수 있습니다:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5', # Fuzzy
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
	'prefs-emailsettings' => 'E-Mail-Astellungen',
	'prefs-displaynotifications' => 'Optioune vum Affichage',
	'prefs-echosubscriptions' => 'Mech iwwer dës Evenementer informéieren',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-Mail',
	'echo-pref-email-frequency-daily' => 'All Dag e Resumé vun den Notifikatiounen',
	'echo-pref-email-frequency-weekly' => 'All Woch e Resumé vun den Notifikatiounen',
	'echo-learn-more' => 'Fir méi ze wëssen',
	'echo-dismiss-button' => 'Verwerfen',
	'echo-dismiss-message' => 'All $1-Notifikatiounen ausschalten',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Säitelink|Säitelinken}}',
	'echo-category-title-reverted' => '{{PLURAL:$1|Zréckgesetzung|Zrécksetzungen}} änneren',
	'echo-category-title-mention' => '{{PLURAL:$1|Mentioun|Mentiounen}}',
	'echo-category-title-system' => '{{PLURAL:$1|System}}',
	'echo-no-agent' => '[Keen]',
	'echo-no-title' => '[Keng Säit]',
	'echo-error-preference' => 'Feeler:Benotzerastellung konnt net gemaacht ginn',
	'notifications' => 'Notifikatiounen',
	'tooltip-pt-notifications' => 'Är Notifikatiounen',
	'echo-specialpage' => 'Notifikatiounen',
	'echo-anon' => 'Fir Notifikatiounen ze kréien, [[Special:Userlogin/signup|maacht e Benotzerkont op]] oder [[Special:UserLogin|loggt Iech an]]',
	'echo-none' => 'Dir hutt keng Notifikatiounen.',
	'echo-more-info' => 'Méi Informatiounen',
	'echo-feedback' => 'Feedback',
	'notification-new-user' => 'Wëllkomm op {{SITENAME}}, $1! Mir si frou Iech begréissen ze kënnen.',
	'notification-edit-talk-page-email-subject2' => 'Dir hutt en neie Message op Ärer Diskussiounssäit',
	'notification-edit-talk-page-email-body2' => '$1

$3

Méi weisen:

$2

$4',
	'notification-page-linked-email-subject' => 'Eng Säit déi Dir ugeluecht hutt gouf op {{SITENAME}} verlinkt',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|huet}} Iech op $2 ernimmt',
	'notification-user-rights-email-subject' => 'Är Benotzerrechter op {{SITENAME}} hu geännert',
	'notification-user-rights-email-batch-body' => 'Är Benotzerrechter goufe vum $1 {{GENDER:$1|geännert}}. $2',
	'echo-email-subject-default' => 'Nei Notifikatioun op {{SITENAME}}',
	'echo-email-body-default' => 'Dir hutt eng nei Notifikatioun op {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Dir hutt eng Notifikatioun',
	'echo-link-new' => '$1 nei {{PLURAL:$1|Notifikatioun|Notifikatiounen}}',
	'echo-link' => 'Notifikatiounen',
	'echo-overlay-link' => 'All Notifikatiounen',
	'echo-overlay-title' => '<b>Notifikatiounen</b>',
	'echo-mark-all-as-read' => 'All als geliest markéieren',
	'echo-date-today' => 'Haut',
	'echo-date-yesterday' => 'Gëschter',
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
	'prefs-emailsettings' => 'Поставки за е-пошта',
	'prefs-displaynotifications' => 'Нагодувања на приказот',
	'prefs-echosubscriptions' => 'Известувај ме за следниве настани',
	'echo-pref-send-me' => 'Испрати ми:',
	'echo-pref-send-to' => 'Испрати на:',
	'echo-pref-web' => 'На вики',
	'echo-pref-email' => 'Е-пошта',
	'echo-pref-email-frequency-never' => 'Не ми праќај известувања на е-пошта',
	'echo-pref-email-frequency-immediately' => 'Поединечни известувања, едно по едно',
	'echo-pref-email-frequency-daily' => 'Дневен преглед на известувањата',
	'echo-pref-email-frequency-weekly' => 'Неделен преглед на известувањата',
	'echo-pref-notify-show-link' => 'Прикажувај известувања во мојот алатник',
	'echo-learn-more' => 'Дознајте повеќе',
	'echo-dismiss-button' => 'Тргни',
	'echo-dismiss-message' => 'Исклучи ги сите $1 известувања',
	'echo-dismiss-prefs-message' => 'Овие можете пак да ги вклучите во [[Special:Preferences#mw-prefsection-echo|нагодувањата]]',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Објава|Објави}} на стран. за разговор',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Врска|Врски}} до стран.',
	'echo-category-title-reverted' => '{{PLURAL:$1|Вратено уредување|Вратени уредувања}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Спомнување|Спомнувања}}',
	'echo-category-title-other' => '{{PLURAL:$1|Друго}}',
	'echo-category-title-system' => '{{PLURAL:$1|Систем}}',
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
	'echo-feedback' => 'Мислења',
	'echo-quotation-marks' => '„$1“',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|објави}} на вашата [[User talk:$2|страница за разговор]].',
	'notification-edit-talk-page-flyout2' => '<b>$1</b> {{GENDER:$1|објави}} на вашата [[User talk:$2|страница за разговор]].',
	'notification-page-linked' => '[[:$2]] е {{GENDER:$1|наведена}} од [[:$3]]: [[Special:WhatLinksHere/$2|Погл. сите врски до страницава]]',
	'notification-page-linked-flyout' => '<b>$2</b> е {{GENDER:$1|наведена}} на <b>$3</b>: [[Special:WhatLinksHere/$2|Погл. сите врски до страницава]]',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|коментираше}} на „[[$3|$2]]“ на страницата за разговор „$4“',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|ја објави}} новата тема „$2“ на [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|ви испрати}} порака: „[[$3#$2|$2]]“',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|коментираше}} на „[[$3#$2|$2]]“ на вашата страница за разговор',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|ве спомна}} на „[[$3#$2|$3]]“.',
	'notification-mention-flyout' => '<b>$1</b> {{GENDER:$1|ве спомна}} на „[[$3#$2|$3]]“.',
	'notification-user-rights' => 'Вашите кориснички права се [[Special:Log/rights/$1|{{GENDER:$1|изменети}}]] од [[User:$1|$1]]. $2. [[Special:ListGroupRights|Дознајте повеќе]]',
	'notification-user-rights-flyout' => 'Вашите кориснички права се {{GENDER:$1|изменети}} од <b>$1</b>. $2. [[Special:ListGroupRights|Дознајте повеќе]]',
	'notification-user-rights-add' => 'Сега членувате во {{PLURAL:$2|оваа група|овие групи}}: $1',
	'notification-user-rights-remove' => 'Повеќе не членувате во {{PLURAL:$2|оваа група|овие групи}}: $1',
	'notification-new-user' => 'Добре дојдовте на {{SITENAME}}, $1! Драго ни е што сте тука.',
	'notification-reverted2' => '[[User:$1|$1]] {{PLURAL:$4|го|ги}} {{GENDER:$1|врати}} {{PLURAL:$4|вашето уредување на [[:$2]]|вашите уредувања на [[:$2]]}} $3',
	'notification-reverted-flyout2' => '<b>$1</b> {{PLURAL:$4|го|ги}} {{GENDER:$1|врати}} {{PLURAL:$4|вашето уредување на <b>$2</b>|вашите уредувања на <b>$2</b>}} $3',
	'notification-edit-talk-page-email-subject2' => 'Имате нова порака',
	'notification-edit-talk-page-email-body2' => '$1

$3
Погледајте повеќе:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|објави}} на вашата страница за разговор',
	'notification-page-linked-email-subject' => 'Страница што вие ја започнавте е наведена на {{SITENAME}}',
	'notification-page-linked-email-body' => '$1

Погл. сите врски до оваа страница:

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
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}} $1

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|ново известување|нови известувања}}',
	'echo-link' => 'Известувања',
	'echo-overlay-link' => 'Сите известувања',
	'echo-overlay-title' => '<b>Известувања</b>',
	'echo-overlay-title-overflow' => '<b>Известувања</b> (прикажувам $1 од $2 непрочитани)',
	'echo-mark-all-as-read' => 'Означи ги сите како прочитани',
	'echo-date-today' => 'Денес',
	'echo-date-yesterday' => 'Вчера',
	'echo-load-more-error' => 'Се појави грешка при обидот да добијам повеќе резултати.',
	'notification-edit-talk-page-bundle' => '$1 и {{PLURAL:$4|уште еден друг|уште $3 други}} {{GENDER:$1|објавија}} нешто на вашата [[User talk:$2|страница за разговор]].',
	'notification-page-linked-bundle' => '$2 е {{GENDER:$1|наведена}} на $3 и уште $4 {{PLURAL:$5|страница|страници}}. [[Special:WhatLinksHere/$2|Погл. сите врски до страницава]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 и уште {{PLURAL:$3|еден|$2 корисници}} {{GENDER:$1|објавија}} нешто на вашата страница за разговор',
	'notification-page-linked-email-batch-bundle-body' => '$2 беше {{GENDER:$1|наведена}} од $3 и уште {{PLURAL:$5|една страница|$4 страници}}',
	'echo-email-batch-subject-daily' => 'За денес имате {{PLURAL:$2|ново известување|нови известувања}}',
	'echo-email-batch-subject-weekly' => 'Неделава имате {{PLURAL:$2|ново известување|нови известувања}}',
	'echo-email-batch-body-daily' => '$1,

Денес имате {{PLURAL:$3|ново известување|нови известувања}} на {{SITENAME}}. Погледајте тука:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,

Неделава имате {{PLURAL:$3|ново известување|нови известувања}} на {{SITENAME}}. Погледајте тука:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
);

/** Malayalam (മലയാളം)
 * @author Praveenp
 * @author Santhosh.thottingal
 * @author Sidharthan
 */
$messages['ml'] = array(
	'echo-desc' => 'അറിയിപ്പ് വ്യവസ്ഥ',
	'prefs-echo' => 'അറിയിപ്പുകൾ',
	'prefs-emailsettings' => 'ഇമെയിൽ സജ്ജീകരണങ്ങൾ',
	'prefs-displaynotifications' => 'പ്രദർശന ഐച്ഛികങ്ങൾ',
	'prefs-echosubscriptions' => 'ഈ സംഭവങ്ങളെക്കുറിച്ച് എന്നെ അറിയിക്കുക',
	'echo-pref-send-me' => 'എനിക്ക് അയയ്ക്കുക:',
	'echo-pref-send-to' => 'അയക്കേണ്ട വിലാസം:',
	'echo-pref-web' => 'വെബ്',
	'echo-pref-email' => 'ഇമെയിൽ',
	'echo-pref-email-frequency-never' => 'എനിക്ക് ഇമെയിൽ അറിയിപ്പുകൾ വേണ്ട',
	'echo-pref-email-frequency-immediately' => 'വരുന്ന മുറയ്ക്ക് വെവ്വേറെ അറിയിപ്പുകൾ',
	'echo-pref-email-frequency-daily' => 'ഒരു ദിവസത്തെ അറിയിപ്പുകളുടെ അവലോകനം',
	'echo-pref-email-frequency-weekly' => 'ഒരു ആഴ്ചയിലെ അറിയിപ്പുകളുടെ അവലോകനം',
	'echo-pref-notify-show-link' => 'അറിയിപ്പുകൾ എന്റെ ഉപകരണങ്ങളിൽ പ്രദർശിപ്പിക്കുക',
	'echo-learn-more' => 'കൂടുതൽ അറിയുക',
	'echo-dismiss-button' => 'ഒഴിവാക്കുക',
	'echo-dismiss-message' => 'എല്ലാ $1 അറിയിപ്പുകളും പ്രവർത്തനരഹിതമാക്കുക',
	'echo-dismiss-prefs-message' => 'താങ്കൾക്കിവ  [[Special:Preferences#mw-prefsection-echo|ക്രമീകരണങ്ങളിൽ]] നിന്ന് വീണ്ടും സജ്ജമാക്കാവുന്നതാണ്',
	'echo-category-title-edit-user-talk' => 'സംവാദത്താളിലെ {{PLURAL:$1|കുറിപ്പ്|കുറിപ്പുകൾ}}',
	'echo-category-title-article-linked' => 'താളിലേയ്ക്കുള്ള {{PLURAL:$1|കണ്ണി|കണ്ണികൾ}}',
	'echo-category-title-reverted' => 'തിരുത്തൽ {{PLURAL:$1|മുൻപ്രാപനം|മുൻപ്രാപനങ്ങൾ}}',
	'echo-category-title-mention' => '{{PLURAL:$1|പരാമർശം|പരാമർശങ്ങൾ}}',
	'echo-category-title-other' => '{{PLURAL:$1|മറ്റുള്ളവ}}',
	'echo-category-title-system' => '{{PLURAL:$1|വ്യവസ്ഥ}}',
	'echo-no-agent' => '[ആരുമില്ല]',
	'echo-no-title' => '[താൾ ഇല്ല]',
	'echo-error-no-formatter' => 'അറിയിപ്പിനായി യാതൊരു രൂപവും നിർവ്വചിച്ചിട്ടില്ല',
	'echo-error-preference' => 'പിഴവ്: ഉപയോക്താവിന്റെ ക്രമീകരണങ്ങൾ സജ്ജീകരിക്കാൻ കഴിഞ്ഞില്ല',
	'echo-error-token' => 'പിഴവ്: ഉപയോക്താവിന്റെ ചീട്ട് എടുക്കാൻ കഴിഞ്ഞില്ല',
	'notifications' => 'അറിയിപ്പുകൾ',
	'tooltip-pt-notifications' => 'താങ്കൾക്കുള്ള അറിയിപ്പുകൾ',
	'echo-specialpage' => 'അറിയിപ്പുകൾ',
	'echo-anon' => 'അറിയിപ്പുകൾ ലഭിക്കാനായി, [[Special:Userlogin/signup|അംഗത്വമെടുക്കയോ]] [[Special:UserLogin|പ്രവേശിക്കുകയോ]] ചെയ്യേണ്ടതാണ്.',
	'echo-none' => 'താങ്കൾക്ക് അറിയിപ്പുകളൊന്നുമില്ല.',
	'echo-more-info' => 'കൂടുതൽ വിവരങ്ങൾ',
	'echo-feedback' => 'പ്രതികരണം',
	'notification-edit-talk-page2' => 'താങ്കളുടെ [[User talk:$2|സംവാദത്താളിൽ]] [[User:$1|$1]] {{GENDER:$1|കുറിപ്പിട്ടു}} .',
	'notification-edit-talk-page-flyout2' => 'താങ്കളുടെ [[User talk:$2|സംവാദത്താളിൽ]] <b>$1</b> {{GENDER:$1|കുറിപ്പിട്ടിട്ടുണ്ട്}}.',
	'notification-page-linked' => '[[:$2]] എന്ന താളിലേയ്ക്ക് [[:$3]] എന്ന താളിൽ നിന്ന് കണ്ണി {{GENDER:$1|ചേർക്കപ്പെട്ടിരിക്കുന്നു}}: [[Special:WhatLinksHere/$2|ഈ താളിലേയ്ക്കുള്ള എല്ലാ കണ്ണികളും കാണുക]]',
	'notification-page-linked-flyout' => '<b>$2</b> എന്ന താളിലേയ്ക്ക് <b>$3</b> എന്ന താളിൽ നിന്ന് കണ്ണി {{GENDER:$1|ചേർക്കപ്പെട്ടിരിക്കുന്നു}}: [[Special:WhatLinksHere/$2|ഈ താളിലേയ്ക്കുള്ള എല്ലാ കണ്ണികളും കാണുക]]',
	'notification-add-comment2' => '[[User:$1|$1]]  "$4" സംവാദത്താളിലെ "[[$3|$2]]" എന്നതിൽ {{GENDER:$1|കുറിപ്പിട്ടിരിക്കുന്നു}}',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] [[$3]] എന്ന താളിലെ "$2" എന്നതിൽ ഒരു പുതിയ വിഷയം {{GENDER:$1|ഇട്ടിരിക്കുന്നു}}',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]]  താങ്കൾക്ക് ഒരു സന്ദേശം {{GENDER:$1|അയച്ചിട്ടുണ്ട്}}: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] താങ്കളുടെ സംവാദത്താളിലെ "[[$3#$2|$2]]" എന്നതിൽ {{GENDER:$1|കുറിപ്പിട്ടു}}',
	'notification-mention' => '[[User:$1|$1]] താങ്കളെ [[$3#$2|$3]] താളിൽ {{GENDER:$1|പരാമർശിച്ചിരിക്കുന്നു}}',
	'notification-mention-flyout' => '<b>$1</b> താങ്കളെ [[$3#$2|$3]] താളിൽ {{GENDER:$1|പരാമർശിച്ചിരിക്കുന്നു}}',
	'notification-user-rights' => 'താങ്കളുടെ ഉപയോക്തൃ അവകാശങ്ങൾ [[User:$1|$1]] [[Special:Log/rights/$1|{{GENDER:$1|മാറ്റിയിരിക്കുന്നു}}]]. $2 . [[Special:ListGroupRights|കൂടുതലറിയുക]]',
	'notification-user-rights-flyout' => 'താങ്കളുടെ ഉപയോക്തൃ അവകാശങ്ങൾ <b>$1</b> {{GENDER:$1|മാറ്റിയിരിക്കുന്നു}}. $2 . [[Special:ListGroupRights|കൂടുതലറിയുക]]',
	'notification-user-rights-add' => 'താങ്കളിപ്പോൾ {{PLURAL:$2|ഈ സംഘത്തിൽ|ഈ സംഘങ്ങളിൽ}} അംഗമാണ്: $1',
	'notification-user-rights-remove' => 'താങ്കളിപ്പോൾ {{PLURAL:$2|ഈ സംഘത്തിൽ|ഈ സംഘങ്ങളിൽ}} അംഗമല്ല: $1',
	'notification-new-user' => '{{SITENAME}} സംരംഭത്തിലേയ്ക്ക് സ്വാഗതം, $1! താങ്കളിവിടെ എത്തിയതിൽ സന്തോഷമുണ്ട്.',
	'notification-reverted2' => 'താങ്കൾ വരുത്തിയ {{PLURAL:$4|[[:$2]] താളിലെ തിരുത്ത്|[[:$2]] താളിലെ തിരുത്തുകൾ}} [[User:$1|$1]] {{GENDER:$1|മുൻപ്രാപനം ചെയ്തിരിക്കുന്നു}}  $3',
	'notification-reverted-flyout2' => 'താങ്കൾ വരുത്തിയ {{PLURAL:$4|<b>$2</b> താളിലെ തിരുത്ത്|<b>$2</b> താളിലെ തിരുത്തുകൾ}} <b>$1</b>{{GENDER:$1|മുൻപ്രാപനം ചെയ്തിരിക്കുന്നു}}  $3',
	'notification-edit-talk-page-email-subject2' => 'താങ്കൾക്ക് സംവാദത്താളിൽ പുതിയ സന്ദേശമുണ്ട്',
	'notification-edit-talk-page-email-body2' => '$1 $3 കൂടുതൽ കാണുക: $2 $4',
	'notification-edit-talk-page-email-batch-body2' => '$1 താങ്കളുടെ സംവാദത്താളിൽ {{GENDER:$1|കുറിപ്പിട്ടിട്ടുണ്ട്}}',
	'notification-page-linked-email-subject' => 'താങ്കൾ തുടക്കമിട്ട ഒരു താൾ {{SITENAME}} സംരംഭത്തിൽ കണ്ണി ചേർക്കപ്പെട്ടിരിക്കുന്നു',
	'notification-page-linked-email-body' => '$1

ഈ താളിലേയ്ക്കുള്ള എല്ലാ കണ്ണികളും കാണുക:

{{canonicalurl:{{#special:WhatLinksHere/$2}}}}

$3',
	'notification-page-linked-email-batch-body' => '$2 എന്ന താളിലേയ്ക്ക് $3 എന്ന താളിൽ നിന്ന് കണ്ണി {{GENDER:$1|ചേർക്കപ്പെട്ടിരിക്കുന്നു}}',
	'notification-reverted-email-subject2' => 'താങ്കൾ വരുത്തിയ {{PLURAL:$3|$2 താളിലെ തിരുത്ത്|$2 താളിലെ തിരുത്തുകൾ}} $1 {{GENDER:$1|മുൻപ്രാപനം ചെയ്തിരിക്കുന്നു}}',
	'notification-reverted-email-body2' => 'താങ്കൾ വരുത്തിയ {{PLURAL:$7|$2 താളിലെ തിരുത്ത്|$2 താളിലെ തിരുത്തുകൾ}} $1 {{GENDER:$1|മുൻപ്രാപനം ചെയ്തിരിക്കുന്നു}}

$5

കൂടുതൽ കാണുക:

$3

$6',
	'notification-reverted-email-batch-body2' => 'താങ്കൾ വരുത്തിയ {{PLURAL:$3|$2 താളിലെ തിരുത്ത്|$2 താളിലെ തിരുത്തുകൾ}} $1 {{GENDER:$1|മുൻപ്രാപനം ചെയ്തിരുന്നു}}',
	'notification-mention-email-subject' => '$1 താങ്കളെ {{SITENAME}} സംരംഭത്തിൽ {{GENDER:$1|പരാമർശിച്ചിരിക്കുന്നു}}',
	'notification-mention-email-body' => '{{SITENAME}} ഉപയോക്താവ് $1 താങ്കളെ $2 താളിൽ {{GENDER:$1|പരാമർശിച്ചിരിക്കുന്നു}}. $3 കൂടുതൽ കാണുക: $4 $5',
	'notification-mention-email-batch-body' => '$1 താങ്കളെ $2 താളിൽ {{GENDER:$1|പരാമർശിച്ചിരിക്കുന്നു}}',
	'notification-user-rights-email-subject' => '{{SITENAME}} സംരംഭത്തിൽ താങ്കളുടെ അവകാശങ്ങളിൽ മാറ്റമുണ്ടായിരിക്കുന്നു',
	'notification-user-rights-email-body' => 'താങ്കളുടെ ഉപയോക്തൃ അവകാശങ്ങൾ $1 {{GENDER:$1|മാറ്റിയിരിക്കുന്നു}}. $2

കൂടുതൽ കാണുക:

{{canonicalurl:{{#special:ListGroupRights}}}}

$3',
	'notification-user-rights-email-batch-body' => 'താങ്കളുടെ ഉപയോക്തൃ അവകാശങ്ങൾ $1 {{GENDER:$1|മാറ്റിയിരിക്കുന്നു}}. $2',
	'echo-email-subject-default' => '{{SITENAME}} സംരംഭത്തിൽ അറിയിപ്പുണ്ട്',
	'echo-email-body-default' => '{{SITENAME}} സംരംഭത്തിൽ താങ്കൾക്ക് ഒരു അറിയിപ്പുണ്ട്:

$1',
	'echo-email-batch-body-default' => 'താങ്കൾക്ക് ഒരറിയിപ്പുണ്ട്',
	'echo-email-footer-default' => '$2

ഞങ്ങൾ താങ്കൾക്കയയ്ക്കുന്ന ഇമെയിലുകൾ നിയന്ത്രിക്കാൻ, താങ്കളുടെ ക്രമീകരണങ്ങൾ ഉപയോഗിക്കുക: {{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => 'പുതിയ {{PLURAL:$1|അറിയിപ്പ്|$1 അറിയിപ്പുകൾ}}',
	'echo-link' => 'അറിയിപ്പുകൾ',
	'echo-overlay-link' => 'എല്ലാ അറിയിപ്പുകളും',
	'echo-overlay-title' => '<b>അറിയിപ്പുകൾ</b>',
	'echo-overlay-title-overflow' => '<b>അറിയിപ്പുകൾ</b> (വായിക്കാത്ത $2 എണ്ണത്തിലെ $1 എണ്ണം കാണിക്കുന്നു)',
	'echo-mark-all-as-read' => 'എല്ലാം വായിച്ചതായി അടയാളപ്പെടുത്തുക',
	'echo-date-today' => 'ഇന്ന്',
	'echo-date-yesterday' => 'ഇന്നലെ',
	'echo-load-more-error' => 'കൂടുതൽ ഫലങ്ങൾ എടുക്കുന്നതിനിടെ ഒരു പിഴവുണ്ടായി.',
	'notification-edit-talk-page-bundle' => '$1 ഒപ്പം $3 {{PLURAL:$4|മറ്റൊരാൾ|മറ്റുള്ളവരും}} താങ്കളുടെ [[User talk:$2|സംവാദത്താളിൽ]] {{GENDER:$1|കുറിപ്പിട്ടിരിക്കുന്നു}}.',
	'notification-page-linked-bundle' => '$2 എന്ന താളിലേയ്ക്ക് $3 എന്ന താളിൽ നിന്നും മറ്റ് $4 {{PLURAL:$5|താളിൽ|താളുകളിൽ}} നിന്നും കണ്ണി {{GENDER:$1|ചേർക്കപ്പെട്ടിരിക്കുന്നു}}. [[Special:WhatLinksHere/$2|ഈ താളിലേയ്ക്കുള്ള എല്ലാ കണ്ണികളും കാണുക]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 എന്ന ഉപയോക്താവും ഒപ്പം $2 {{PLURAL:$3|മറ്റുപയോക്താവും|മറ്റുപയോക്താക്കളും}} താങ്കളുടെ സം‌വാദത്താളിൽ {{GENDER:$1|കുറിപ്പിട്ടിരിക്കുന്നു}}',
	'notification-page-linked-email-batch-bundle-body' => '$2 എന്ന താളിലേയ്ക്ക് $3 എന്ന താളിൽ നിന്നും മറ്റ് $4 {{PLURAL:$5|താളിൽ|താളുകളിൽ}} നിന്നും {{GENDER:$1|കണ്ണി ചേർക്കപ്പെട്ടിരിക്കുന്നു}}',
	'echo-email-batch-subject-daily' => 'താങ്കൾക്ക് ഇന്ന് {{PLURAL:$2|പുതിയ ഒരറിയിപ്പ്|പുതിയ അറിയിപ്പുകൾ}} ഉണ്ട്',
	'echo-email-batch-subject-weekly' => 'താങ്കൾക്ക് ഈ ആഴ്ച {{PLURAL:$2|പുതിയ ഒരറിയിപ്പ്|പുതിയ അറിയിപ്പുകൾ}} ഉണ്ട്',
	'echo-email-batch-body-daily' => '$1, 

താങ്കൾക്ക് ഇന്ന്  {{SITENAME}} സംരംഭത്തിൽ {{PLURAL:$3|പുതിയ ഒരു അറിയിപ്പ്|പുതിയ അറിയിപ്പുകൾ}} ഉണ്ട്. {{PLURAL:$3|അത്|അവ}} ഇവിടെ കാണുക: {{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1, 

താങ്കൾക്ക് ഈ ആഴ്ച  {{SITENAME}} സംരംഭത്തിൽ {{PLURAL:$3|പുതിയ ഒരു അറിയിപ്പ്|പുതിയ അറിയിപ്പുകൾ}} ഉണ്ട്. {{PLURAL:$3|അത്|അവ}} ഇവിടെ കാണുക: {{canonicalurl:{{#special:Notifications}}}}

$4

$5',
);

/** Malay (Bahasa Melayu)
 * @author Anakmalaysia
 */
$messages['ms'] = array(
	'echo-desc' => 'Sistem pemberitahuan',
	'prefs-echo' => 'Pemberitahuan',
	'prefs-emailsettings' => 'Tetapan e-mel',
	'prefs-displaynotifications' => 'Pilihan paparan',
	'prefs-echosubscriptions' => 'Beritahu saya tentang peristiwa-peristiwa ini',
	'echo-pref-send-me' => 'Hantarkan saya:',
	'echo-pref-send-to' => 'Hantar kepada:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-mel',
	'echo-pref-email-frequency-never' => 'Jangan hantar sebarang pemberitahuan e-mel kepada saya',
	'echo-pref-email-frequency-immediately' => 'Pemberitahuan satu persatu',
	'echo-pref-email-frequency-daily' => 'Ringkasan pemberitahuan harian',
	'echo-pref-email-frequency-weekly' => 'Ringkasan pemberitahuan mingguan',
	'echo-pref-notify-show-link' => 'Paparkan pemberitahuan di palang alat saya',
	'echo-dismiss-button' => 'Singkir',
	'echo-dismiss-message' => 'Matikan semua pemberitahuan $1',
	'echo-dismiss-prefs-message' => 'Anda boleh memasangnya semula dalam Keutamaan', # Fuzzy
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Pos}} halaman perbualan',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Pautan}} halaman',
	'echo-category-title-reverted' => '{{PLURAL:$1|Pembalikan}} suntingan',
	'echo-category-title-mention' => '{{PLURAL:$1|Sebutan}}',
	'echo-category-title-other' => '{{PLURAL:$1|Lain-lain}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistem}}',
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
	'echo-feedback' => 'Maklum balas',
	'notification-edit-talk-page2' => '[[User:$1|$1]] telah mengepos di [[User talk:$2|halaman perbualan]] anda.',
	'notification-edit-talk-page-flyout2' => '<b>$1</b> telah mengepos di [[User talk:$2|halaman perbualan]] anda.',
	'notification-page-linked' => '[[:$2]] telah {{GENDER:$1|dipautkan}} dari [[:$3]]: [[Special:WhatLinksHere/$2|Lihat semua pautan ke halaman ini]]', # Fuzzy
	'notification-page-linked-flyout' => '<b>$2</b> telah {{GENDER:$1|dipautkan}} dari <b>$3</b>: [[Special:WhatLinksHere/$2|Lihat semua pautan ke halaman ini]]',
	'notification-add-comment2' => '[[User:$1|$1]] telah {{GENDER:$1|mengulas}} tentang "[[$3|$2]]" di halaman perbualan "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] telah mengepos topik baru, "$2", di [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] telah {{GENDER:$1|mengirim}} pesanan kepada anda: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] telah {{GENDER:$1|mengulas}} tentang "[[$3#$2|$2]]" di halaman perbualan anda',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|menyebut}} anda di [[$3#$2|$3]].',
	'notification-mention-flyout' => '<b>$1</b> {{GENDER:$1|menyebut}} anda di [[$3#$2|$3]].',
	'notification-user-rights' => 'Hak-hak pengguna anda telah [[Special:Log/rights/$1|{{GENDER:$1|diubah}}]] oleh [[User:$1|$1]]. $2. [[Special:ListGroupRights|Ketahui lebih lanjut]]',
	'notification-user-rights-flyout' => 'Hak-hak pengguna anda telah {{GENDER:$1|diubah}} oleh 	<b>$1</b>. $2. [[Special:ListGroupRights|Ketahui lebih lanjut]]',
	'notification-user-rights-add' => 'Anda kini menganggotai {{PLURAL:$2|kumpulan|kumpulan-kumpulan ini:}} $1',
	'notification-user-rights-remove' => 'Anda tidak lagi menganggotai {{PLURAL:$2|kumpulan|kumpulan-kumpulan ini:}} $1',
	'notification-new-user' => 'Selamat datang ke {{SITENAME}}, $1! Dengan sukacita kami menyambut kedatangan anda.',
	'notification-reverted2' => '{{PLURAL:$4|Suntingan|Suntingan-suntingan}} anda di [[:$2]] telah {{GENDER:$1|dibalikkan}} oleh [[User:$1|$1]] $3', # Fuzzy
	'notification-reverted-flyout2' => '{{PLURAL:$4|Suntingan|Suntingan-suntingan}} anda di <b>$2</b> telah {{GENDER:$1|dibalikkan}} oleh <b>$1</b> $3',
	'notification-edit-talk-page-email-subject2' => 'Anda mendapat pesanan baru di halaman perbualan',
	'notification-edit-talk-page-email-body2' => '$1

$3

Maklumat lanjut:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|mengepos}} pada halaman perbualan anda',
	'notification-page-linked-email-subject' => 'Sebuah halaman yang pernah anda wujudkan telah dipautkan di {{SITENAME}}',
	'notification-page-linked-email-body' => '$1

Lihat semua pautan ke halaman ini:

{{canonicalurl:{{#special:WhatLinksHere/$2}}}}

$3',
	'notification-page-linked-email-batch-body' => '$2 telah {{GENDER:$1|dipautkan}} dari $3',
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
	'echo-email-batch-body-default' => 'Anda mempunyai pemberitahuan baru',
	'echo-email-footer-default' => '$2

Untuk mengubah pesanan-pesanan e-mel yang anda hendak kami hantar, semak keutamaan anda:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 pemberitahuan baru',
	'echo-link' => 'Pemberitahuan',
	'echo-overlay-link' => 'Semua pemberitahuan',
	'echo-overlay-title' => 'Pemberitahuan', # Fuzzy
	'echo-overlay-title-overflow' => 'Pemberitahuan (memaparkan $1 daripada $2 yang belum dibaca)', # Fuzzy
	'echo-mark-all-as-read' => 'Tanda semua sebagai dibaca',
	'echo-date-today' => 'Hari ini',
	'echo-date-yesterday' => 'Semalam',
	'echo-load-more-error' => 'Ralat berlaku ketika mengambil lebih banyak hasil.',
	'notification-edit-talk-page-bundle' => '$1 dan $3 {{PLURAL:$4|orang lain}} telah {{GENDER:$1|mengepos}} di [[User talk:$2|halaman perbualan]] anda.',
	'notification-page-linked-bundle' => '$2 telah {{GENDER:$1|dipautkan}} dari $3 dan $4 {{PLURAL:$5|halaman}} yang lain. [[Special:WhatLinksHere/$2|Lihat semua pautan ke halaman ini]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 dan $2 {{PLURAL:$3|orang lain}} telah {{GENDER:$1|mengepos}} di halaman perbualan anda',
	'notification-page-linked-email-batch-bundle-body' => '$2 telah {{GENDER:$1|dipautkan}} dari $3 dan $4 {{PLURAL:$5|halaman}} lain',
	'echo-email-batch-subject-daily' => 'Anda menerima {{PLURAL:$2|satu|beberapa}} pemberitahuan baru hari ini',
	'echo-email-batch-subject-weekly' => 'Anda menerima {{PLURAL:$2|satu|beberapa}} pemberitahuan baru minggu ini',
	'echo-email-batch-body-daily' => '$1,

Anda ada {{PLURAL:$3|satu|beberapa}} pemberitahuan baru di {{SITENAME}} hari ini. {{PLURAL:$3|Bacanya|Baca kesemuanya}} di sini: {{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,

Anda ada {{PLURAL:$3|satu|beberapa}} pemberitahuan baru di {{SITENAME}} minggu ini. {{PLURAL:$3|Bacanya|Baca kesemuanya}} di sini: {{canonicalurl:{{#special:Notifications}}}}

$4

$5',
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

/** Norwegian Bokmål (norsk bokmål)
 * @author Danmichaelo
 */
$messages['nb'] = array(
	'echo-desc' => 'Varslingssystem',
	'prefs-echo' => 'Varsler',
	'prefs-emailsettings' => 'E-postinnstillinger',
	'prefs-displaynotifications' => 'Visningsvalg',
	'prefs-echosubscriptions' => 'Varsle meg om disse hendelsene',
	'echo-pref-send-me' => 'Send meg:',
	'echo-pref-send-to' => 'Send til:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-post',
	'echo-pref-email-frequency-never' => 'Ikke send meg e-postvarsler',
	'echo-pref-email-frequency-immediately' => 'Individuelle varsler når de kommer',
	'echo-pref-email-frequency-daily' => 'Daglig sammendrag av varsler',
	'echo-pref-email-frequency-weekly' => 'Ukentlig sammendrag av varsler',
	'echo-pref-notify-show-link' => 'Vis varslinger i verktøylinjen min',
	'echo-learn-more' => 'Lær mer',
	'echo-dismiss-button' => 'Lukk',
	'echo-dismiss-message' => 'Slå av alle varsler for $1',
	'echo-dismiss-prefs-message' => 'Du kan slå på disse igjen i [[Special:Preferences#mw-prefsection-echo|innstillingene]] dine.',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Innlegg}} på diskusjonsside',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Sidelenke|Sidelenker}}',
	'echo-category-title-reverted' => 'Tilbakestilling av {{PLURAL:$1|redigering|redigeringer}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Omtale|Omtaler}}',
	'echo-category-title-other' => '{{PLURAL:$1|Annet}}',
	'echo-category-title-system' => '{{PLURAL:$1|System}}',
	'echo-no-agent' => '[Ingen]',
	'echo-no-title' => '[Ingen side]',
	'echo-error-no-formatter' => 'Ingen formatering definert for varselet',
	'echo-error-preference' => 'Feil: Kunne ikke lagre brukervalg',
	'echo-error-token' => 'Feil: Kunne ikke hente brukertegn',
	'notifications' => 'Varsler',
	'tooltip-pt-notifications' => 'Dine varsler',
	'echo-specialpage' => 'Varsler',
	'echo-anon' => 'For å motta varsler, [[Special:Userlogin/signup|opprett en konto]] eller [[Special:UserLogin|logg inn]].',
	'echo-none' => 'Du har ingen varsler.',
	'echo-more-info' => 'Mer informasjon',
	'echo-feedback' => 'Tilbakemelding',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|postet}} på [[User talk:$2|diskusjonssiden din]].',
	'notification-edit-talk-page-flyout2' => '<b>$1</b> {{GENDER:$1|postet}} på [[User talk:$2|diskusjonssiden din]]',
	'notification-page-linked' => '[[:$2]] ble {{GENDER:$1|lenket til}} fra [[:$3]]: [[Special:WhatLinksHere/$2|Se alle lenker til denne siden]]',
	'notification-page-linked-flyout' => '<b>$2</b> ble {{GENDER:$1|lenket til}} fra <b>$3</b>: [[Special:WhatLinksHere/$2|Se alle lenker til denne siden]]',
	'notification-add-comment2' => "[[User:$1|$1]] {{GENDER:$1|kommenterte}} på ''[[$3|$2]]'' på diskusjonssiden ''$4''",
	'notification-add-talkpage-topic2' => "[[User:$1|$1]] {{GENDER:$1|postet}} en ny tråd ''$2'' på [[$3]]",
	'notification-add-talkpage-topic-yours2' => "[[User:$1|$1]] {{GENDER:$1|sendte}} deg en melding: ''[[$3#$2|$2]]''",
	'notification-add-comment-yours2' => "[[User:$1|$1]] {{GENDER:$1|kommenterte}} på ''[[$3#$2|$2]]'' på diskusjonssiden din",
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|nevnte}} deg på [[$3#$2|$3]].',
	'notification-mention-flyout' => '<b>$1</b> {{GENDER:$1|nevnte}} deg på [[$3#$2|$3]].',
	'notification-user-rights' => 'Brukerrettighetene dine [[Special:Log/rights/$1|ble {{GENDER:$1|endret}}]] av [[User:$1|$1]]. $2. [[Special:ListGroupRights|Lær mer]]',
	'notification-user-rights-flyout' => 'Brukerrettighetene dine ble {{GENDER:$1|endret}} av <b>$1</b>. $2. [[Special:ListGroupRights|Lær mer]]',
	'notification-user-rights-add' => 'Du er nå medlem av {{PLURAL:$2|denne gruppa|disse gruppene}}: $1',
	'notification-user-rights-remove' => 'Du er ikke lenger medlem av {{PLURAL:$2|denne gruppa|disse gruppene}}: $1',
	'notification-new-user' => 'Velkommen til {{SITENAME}}, $1! Hyggelig å se deg her.',
	'notification-reverted2' => '{{PLURAL:$4|Din redigering|Dine redigeringer}} på [[:$2]] har blitt {{GENDER:$1|tilbakestilt}} av [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Din redigering|Dine redigeringer}} påå <b>$2</b> har blitt {{GENDER:$1|tilbakestilt}} av <b>$1</b> $3',
	'notification-edit-talk-page-email-subject2' => 'Du har en ny beskjed på diskusjonssiden din',
	'notification-edit-talk-page-email-body2' => '$1

$3

Vis mer:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|postet}} på diskusjonssiden din',
	'notification-page-linked-email-subject' => 'En side du startet ble lenket til på {{SITENAME}}',
	'notification-page-linked-email-body' => '$1

Se alle lenker til denne siden:

{{canonicalurl:{{#special:WhatLinksHere/$2}}}}

$3',
	'notification-page-linked-email-batch-body' => '$2 ble {{GENDER:$1|lenket}} til fra $3',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Din redigering|Dine redigeringer}} på $2 ble {{GENDER:$1|tilbakestilt}} av $1',
	'notification-reverted-email-body2' => '{{PLURAL:$7|Din redigering|Dine redigeringer}} på $2 ble {{GENDER:$1|tilbakestilt}} av $1.

$5

Vis mer:

$3

$6',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Din redigering|Dine redigeringer}} på $2 ble {{GENDER:$1|tilbakestilt}} av $1.',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|nevnte}} deg på {{SITENAME}}',
	'notification-mention-email-body' => '{{SITENAME}}-brukeren $1 {{GENDER:$1|nevnte}} deg på $2.

$3

Vis mer:

$4

$5',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|nevnte}} deg på $2',
	'notification-user-rights-email-subject' => 'Brukerrettighetene dine ble endret på {{SITENAME}}',
	'notification-user-rights-email-body' => 'Brukerrettighetene dine ble {{GENDER:$1|endret}} av $1. $2

Vis mer:

{{canonicalurl:{{#special:ListGroupRights}}}}

$3',
	'notification-user-rights-email-batch-body' => 'Brukerrettighetene dine ble {{GENDER:$1|endret}} av $1. $2',
	'echo-email-subject-default' => 'Nytt varsel på {{SITENAME}}',
	'echo-email-body-default' => 'Du har et nytt varsel på {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Du har et nytt varsel',
	'echo-email-footer-default' => '$2

For å styre hva slags e-poster vi sender deg, sjekk innstillingene dine: {{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '{{PLURAL:$1|Ett nytt varsel|$1 nye varsler}}',
	'echo-link' => 'Varsler',
	'echo-overlay-link' => 'Alle varsler',
	'echo-overlay-title' => '<b>Varslinger</b>',
	'echo-overlay-title-overflow' => '<b>Varslinger</b> (viser $1 av $2 uleste)',
	'echo-mark-all-as-read' => 'Merk alle som leste',
	'echo-date-today' => 'I dag',
	'echo-date-yesterday' => 'I går',
	'echo-load-more-error' => 'En feil oppsto under henting av flere resultater.',
	'notification-edit-talk-page-bundle' => '$1 og $3 {{PLURAL:$4|annen|andre}} {{GENDER:$1|postet}} på [[User talk:$2|brukerdiskusjonen din]].',
	'notification-page-linked-bundle' => '$2 ble {{GENDER:$1|lenket til}} fra $3 og $4 {{PLURAL:$5|annen side|andre sider}}. [[Special:WhatLinksHere/$2|Se alle lenker til denne siden]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 og $2 {{PLURAL:$3|annen|andre}} {{GENDER:$1|postet}} på brukerdiskusjonen din',
	'notification-page-linked-email-batch-bundle-body' => '$2 ble {{GENDER:$1|lenket til}} fra $3 og $4 {{PLURAL:$5|annen side|andre sider}}',
	'echo-email-batch-subject-daily' => 'Du har {{PLURAL:$2|ett nytt varsel|nye varsler}} i dag',
	'echo-email-batch-subject-weekly' => 'Du har {{PLURAL:$2|ett nytt varsel|nye varsler}} denne uka',
	'echo-email-batch-body-daily' => '$1,

Du har {{PLURAL:$3|ett nytt varsel|nye varsler}} på {{SITENAME}} i dag. Se {{PLURAL:$3|det|dem}} her:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,

Du har {{PLURAL:$3|ett nytt varsel|nye varsler}} på {{SITENAME}} denne uka. Se {{PLURAL:$3|det|dem}} her:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
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
	'prefs-emailsettings' => 'E-mailinstellingen',
	'prefs-displaynotifications' => 'Weergaveopties',
	'prefs-echosubscriptions' => 'U over deze gebeurtenissen informeren',
	'echo-pref-send-me' => 'Wanneer verzenden:',
	'echo-pref-send-to' => 'Verzenden naar:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-mail',
	'echo-pref-email-frequency-never' => 'U geen meldingen via e-mail sturen',
	'echo-pref-email-frequency-immediately' => 'Individuele meldingen als ze binnenkomen',
	'echo-pref-email-frequency-daily' => 'Een dagelijkse samenvatting van meldingen',
	'echo-pref-email-frequency-weekly' => 'Een wekelijkse samenvatting van meldingen',
	'echo-pref-notify-show-link' => 'Melding in uw hulpbalk weergeven',
	'echo-learn-more' => 'Meer lezen',
	'echo-dismiss-button' => 'Sluiten',
	'echo-dismiss-message' => 'Alle meldingen uitschakelen over $1',
	'echo-dismiss-prefs-message' => 'U kunt deze inschakelen in uw [[Special:Preferences#mw-prefsection-echo|voorkeuren]]',
	'echo-category-title-edit-user-talk' => 'Bericht{{PLURAL:$1||en}} op uw overlegpagina',
	'echo-category-title-article-linked' => 'Paginakoppeling{{PLURAL:$1||en}}',
	'echo-category-title-reverted' => 'Bewerking{{PLURAL:$1||en}} teruggedraaid',
	'echo-category-title-mention' => '{{PLURAL:$1|Genoemd}}',
	'echo-category-title-other' => '{{PLURAL:$1|Overige}}',
	'echo-category-title-system' => '{{PLURAL:$1|Systeem}}',
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
	'echo-feedback' => 'Terugkoppeling',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|heeft een bericht geplaatst}} op uw [[User talk:$2|overlegpagina]].',
	'notification-edit-talk-page-flyout2' => '<b>$1</b> {{GENDER:$1|heeft een bericht geplaatst}} op uw [[User talk:$2|overlegpagina]].',
	'notification-page-linked' => '[[:$2]] is {{GENDER:$1|gekoppeld}} vanaf [[:$3]]: [[Special:WhatLinksHere/$2|alle koppelingen naar deze pagina bekijken]]',
	'notification-page-linked-flyout' => '<b>$2</b> is {{GENDER:$1|gekoppeld}} vanaf <b>$3</b>: [[Special:WhatLinksHere/$2|alle koppelingen naar deze pagina bekijken]]',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|heeft gereageerd}} op "[[$3|$2]]" op de overlegpagina "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|heeft}} een nieuw onderwerp "$2" geplaatst op [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|heeft}} u een bericht gezonden: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|heeft gereageerd}} op "[[$3#$2|$2]]" op uw overlegpagina',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|heeft}} u genoemd op [[$3#$2|$3]].',
	'notification-mention-flyout' => '<b>$1</b> {{GENDER:$1|heeft}} u genoemd op [[$3#$2|$3]].',
	'notification-user-rights' => '[[Special:Log/rights/$1|Uw gebruikersrechten]] zijn {{GENDER:$1|gewijzigd}} door [[User:$1|$1]]. $2. [[Special:ListGroupRights|Meer informatie]]',
	'notification-user-rights-flyout' => 'Uw gebruikersrechten zijn {{GENDER:$1|gewijzigd}} door <b>$1</b>. $2. [[Special:ListGroupRights|Meer informatie]]',
	'notification-user-rights-add' => 'U bent nu lid van deze groep{{PLURAL:$2||en}}: $1',
	'notification-user-rights-remove' => 'U bent niet langer lid van deze groep{{PLURAL:$2||en}}: $1',
	'notification-new-user' => 'Welkom op {{SITENAME}}, $1! We zijn blij dat u hier bent.',
	'notification-reverted2' => 'Uw {{PLURAL:$4|bewerking op [[:$2]] is|bewerkingen op [[:$2]] zijn}} {{GENDER:$1|teruggedraaid}} [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => 'Uw {{PLURAL:$4|bewerking op <b>$2</b> is|bewerkingen op <b>$2</b> zijn}} {{GENDER:$1|teruggedraaid}} door <b>$1</b> $3',
	'notification-edit-talk-page-email-subject2' => 'U hebt een nieuw bericht op uw overlegpagina',
	'notification-edit-talk-page-email-body2' => '$1

$3

Meer bekijken:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|heeft}} een bericht achtergelaten op uw overlegpagina',
	'notification-page-linked-email-subject' => 'Een pagina die u hebt aangemaakt is gekoppeld op {{SITENAME}}',
	'notification-page-linked-email-body' => '$1

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

Volg de volgende koppeling om te bepalen welke e-mails wij u zenden:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '{{PLURAL:$1|1 nieuwe melding|$1 nieuwe meldingen}}',
	'echo-link' => 'Meldingen',
	'echo-overlay-link' => 'Alle meldingen',
	'echo-overlay-title' => '<b>Meldingen</b>',
	'echo-overlay-title-overflow' => '<b>Meldingen</b> ($1 van $2 ongelezen)',
	'echo-mark-all-as-read' => 'Alles als gelezen markeren',
	'echo-date-today' => 'Vandaag',
	'echo-date-yesterday' => 'Gisteren',
	'echo-load-more-error' => 'Er is een fout opgetreden tijdens het ophalen van meer resultaten.',
	'notification-edit-talk-page-bundle' => '$1 en $3 andere{{PLURAL:$4||anderen}} hebben een bericht {{GENDER:$1|geplaatst}} op uw [[User talk:$2|overlegpagina]].',
	'notification-page-linked-bundle' => "$2 is {{GENDER:$1|gekoppeld}} vanaf $3 en $4 andere pagina{{PLURAL:$5||'s}}. [[Special:WhatLinksHere/$2|Alle koppelingen naar deze pagina bekijken]]",
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 and $2 {{PLURAL:$3|andere gebruiker|andere gebruikers}} {{GENDER:$1|hebben}} een bericht op uw overlegpagina geplaatst',
	'notification-page-linked-email-batch-bundle-body' => "$2 is {{GENDER:$1|gekoppeld}} vanaf $3 en $4 andere pagina{{PLURAL:$5||'s}}",
	'echo-email-batch-subject-daily' => 'U hebt vandaag {{PLURAL:$2|0=geen nieuwe meldingen|een nieuwe melding|nieuwe meldingen}}',
	'echo-email-batch-subject-weekly' => 'U hebt deze week {{PLURAL:$2|0=geen nieuwe meldingen|een nieuwe melding|nieuwe meldingen}}',
	'echo-email-batch-body-daily' => '$1,
U hebt vandaag {{PLURAL:$3|0=geen nieuwe meldingen|één nieuwe melding|nieuwe meldingen}} op {{SITENAME}}. Hier kunt u uw melding{{PLURAL:$3||en}} bekijken:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,
U hebt deze week {{PLURAL:$3|0=geen nieuwe meldingen|één nieuwe melding|nieuwe meldingen}} op {{SITENAME}}. Hier kunt u uw melding{{PLURAL:$3||en}} bekijken:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
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
	'prefs-emailsettings' => 'Ustawienia e-mail',
	'prefs-displaynotifications' => 'Opcje wyświetlania',
	'prefs-echosubscriptions' => 'Powiadom mnie o tych zdarzeniach',
	'echo-pref-send-me' => 'Wysyłaj do mnie:',
	'echo-pref-send-to' => 'Wyślij na:',
	'echo-pref-web' => 'Na stronie',
	'echo-pref-email' => 'Przez e‐mail',
	'echo-pref-email-frequency-never' => 'nie wysyłaj powiadomień e-mailem',
	'echo-pref-email-frequency-immediately' => 'każde powiadomienie osobno',
	'echo-pref-email-frequency-daily' => 'dzienne podsumowanie',
	'echo-pref-email-frequency-weekly' => 'tygodniowe podsumowanie',
	'echo-pref-notify-show-link' => 'Pokazuj powiadomienia w pasku narzędzi',
	'echo-learn-more' => 'Dowiedz się więcej',
	'echo-dismiss-button' => 'Zamknij',
	'echo-dismiss-message' => 'Wyłącz wszystkie powiadomienia typu $1',
	'echo-dismiss-prefs-message' => 'Można włączyć je ponownie w [[Special:Preferences#mw-prefsection-echo|preferencjach]]',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Wpis|Wpisy}} w dyskusji',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Link|Linki}} do strony',
	'echo-category-title-reverted' => '{{PLURAL:$1|Rewert|Rewerty}} edycji',
	'echo-category-title-mention' => '{{PLURAL:$1|Wzmianka|Wzmianki}}',
	'echo-category-title-other' => '{{PLURAL:$1|Inne zdarzenie|Inne zdarzenia}}',
	'echo-category-title-system' => '{{PLURAL:$1|zdarzenie systemowe|zdarzenia systemowe}}',
	'echo-no-agent' => '[Nikt]',
	'echo-no-title' => '[Brak strony]',
	'echo-error-no-formatter' => 'Nie określono formatowania dla powiadomień',
	'echo-error-preference' => 'Błąd: Nie można ustawić preferencji użytkownika',
	'echo-error-token' => 'Błąd: Nie można pobrać tokenu',
	'notifications' => 'Powiadomienia',
	'tooltip-pt-notifications' => 'Twoje powiadomienia',
	'echo-specialpage' => 'Powiadomienia',
	'echo-anon' => 'Aby otrzymywać powiadomienia [[Special:Userlogin/signup|utwórz konto]] lub [[Special:UserLogin|zaloguj się]].',
	'echo-none' => 'Nie masz żadnych powiadomień.',
	'echo-more-info' => 'Więcej informacji na temat',
	'echo-feedback' => 'Opinie',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|napisał|napisała}} do ciebie na twojej [[User talk:$2|stronie dyskusji]].',
	'notification-edit-talk-page-flyout2' => '<b>$1</b> {{GENDER:$1|napisał|napisała}} do ciebie na twojej [[User talk:$2|stronie dyskusji]].',
	'notification-page-linked' => 'Na stronie [[:$3]] {{GENDER:$1|umieszczono}} link do strony [[:$2]]: [[Special:WhatLinksHere/$2|pokaż wszystkie linkujące do tej strony]]',
	'notification-page-linked-flyout' => 'Na stronie <b>$3</b> {{GENDER:$1|umieszczono}} link do strony <b>$2</b>: [[Special:WhatLinksHere/$2|pokaż wszystkie linkujące do tej strony]]',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|umieścił|umieściła}} komentarz do "[[$3|$2]]" na stronie dyskusji "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|umieścił|umieściła}} komentarz w nowym wątku "$2" na stronie [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|wysłał|wysłała}} ci wiadomość: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]]{{GENDER:$1|umieścił|umieściła}} komentarz do "[[$3#$2|$2]]" na twojej stronie dyskusji',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|wspomniał|wspomniała}} o tobie na stronie [[$3#$2|$3]].',
	'notification-mention-flyout' => '<b>$1</b> {{GENDER:$1|wspomniał|wspomniała}} o tobie na stronie [[$3#$2|$3]].',
	'notification-user-rights' => '[[User:$1|$1]] [[Special:Log/rights/$1|{{GENDER:$1|zmienił|zmieniła}}]] twoje uprawnienia. $2. [[Special:ListGroupRights|Dowiedz się więcej]]',
	'notification-user-rights-flyout' => '<b>$1</b> {{GENDER:$1|zmienił|zmieniła}} twoje uprawnienia. $2. [[Special:ListGroupRights|Dowiedz się więcej]]',
	'notification-user-rights-add' => 'Teraz należysz do {{PLURAL:$2|tej grupy|tych grup}}: $1',
	'notification-user-rights-remove' => 'Nie należysz już do {{PLURAL:$2|tej grupy|tych grup}}: $1',
	'notification-new-user' => 'Witaj w {{grammar:6sg|{{SITENAME}}}}, $1! Cieszymy się, że tu jesteś.',
	'notification-reverted2' => '[[User:$1|$1]] {{GENDER:$1|zrewertował|zrewertowała}} {{PLURAL:$4|twoją edycję|twoje edycje}} na stronie [[:$2]] $3',
	'notification-reverted-flyout2' => '<b>$1</b> {{GENDER:$1|zrewertował|zrewertowała}} {{PLURAL:$4|twoją edycję|twoje edycje}} na stronie <b>$2</b> $3',
	'notification-edit-talk-page-email-subject2' => 'Masz nową wiadomość na swojej stronie dyskusji',
	'notification-edit-talk-page-email-body2' => '$1

$3

Szczegóły:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|napisał|napisała}} do ciebie na twojej stronie dyskusji',
	'notification-page-linked-email-subject' => 'W {{grammar:6sg|{{SITENAME}}}} ktoś wstawił link do utworzonej przez ciebie strony',
	'notification-page-linked-email-body' => '$1

Pokaż wszystkie linkujące do tej strony:

{{canonicalurl:{{#special:WhatLinksHere/$2}}}}

$3',
	'notification-page-linked-email-batch-body' => 'Na stronie $3 {{GENDER:$1|umieszczono}} link do strony $2',
	'notification-reverted-email-subject2' => '$1 {{GENDER:$1|zrewertował|zrewertowała}} {{PLURAL:$3|twoją edycję|twoje edycje}} na stronie $2',
	'notification-reverted-email-body2' => '$1 {{GENDER:$1|zrewertował|zrewertowała}} {{PLURAL:$7|twoją edycję|twoje edycje}} na stronie $2

$5

Szczegóły:

$3

$6',
	'notification-reverted-email-batch-body2' => '$1 {{GENDER:$1|zrewertował|zrewertowała}} {{PLURAL:$3|twoją edycję|twoje edycje}} na stronie $2',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|wspomniał|wspomniała}} o tobie w {{grammar:6sg|{{SITENAME}}}}',
	'notification-mention-email-body' => '{{GENDER:$1|Użytkownik|Użytkowniczka}} $1 {{grammar:2sg{{SITENAME}}}} {{GENDER:$1|wspomniał|wspomniała}} o tobie w dyskusji $2.

$3

Szczegóły:

$4

$5',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|wspomniał|wspomniała}} o tobie w dyskusji $2',
	'notification-user-rights-email-subject' => 'W {{grammar:6sg|{{SITENAME}}}} zostały zmienione twoje uprawnienia',
	'notification-user-rights-email-body' => '$1 {{GENDER:$1|zmienił|zmieniła}} twoje uprawnienia. $2

Szczegóły:

{{canonicalurl:{{#special:ListGroupRights}}}}

$3',
	'notification-user-rights-email-batch-body' => '$1 {{GENDER:$1|zmienił|zmieniła}} twoje uprawnienia. $2',
	'echo-notification-count' => '$1+',
	'echo-email-subject-default' => 'Nowe powiadomienie w {{grammar:6sg|{{SITENAME}}}}',
	'echo-email-body-default' => 'Masz nowe powiadomienie w {{grammar:6sg|{{SITENAME}}}}:

$1',
	'echo-email-batch-body-default' => 'Masz nowe powiadomienie',
	'echo-email-footer-default' => '$2

Aby ustalić jakie wiadomości mamy CI przesyłać, odwiedź:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1', # Fuzzy
	'echo-link-new' => '$1 {{PLURAL:$1|nowe powiadomienie|nowe powiadomienia|nowych powiadomień}}',
	'echo-link' => 'Powiadomienia',
	'echo-overlay-link' => 'Wszystkie powiadomienia',
	'echo-overlay-title' => '<b>Powiadomienia</b>',
	'echo-overlay-title-overflow' => '<b>Powiadomienia</b> (wyświetlono $1 z $2 nieprzeczytanych)',
	'echo-mark-all-as-read' => 'Oznacz wszystko jako przeczytane',
	'echo-date-today' => 'Dzisiaj',
	'echo-date-yesterday' => 'Wczoraj',
	'echo-date-header' => '$1 $2',
	'echo-load-more-error' => 'Wystąpił błąd przy pobieraniu kolejnych wyników.',
	'notification-edit-talk-page-bundle' => '$1 i {{PLURAL:$4|ktoś inny|$3 inni|$3 innych}} napisali do ciebie na twojej [[User talk:$2|stronie dyskusji]]',
	'notification-page-linked-bundle' => 'Na stronie $3 i na {{PLURAL:$5|innej stronie|$4 innych stronach}} {{GENDER:$1|umieszczono}} link do strony $2: [[Special:WhatLinksHere/$2|pokaż wszystkie linkujące do tej strony]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 i {{PLURAL:$3|ktoś inny|$2 inni|$2 innych}} {{GENDER:$1|napisali}} do ciebie na twojej stronie dyskusji',
	'notification-page-linked-email-batch-bundle-body' => 'Na stronie $3 i na {{PLURAL:$5|innej stronie|$4 innych stronach}} {{GENDER:$1|umieszczono}} link do strony $2',
	'echo-email-batch-subject-daily' => 'Masz {{PLURAL:$2|nowe powiadomienie|nowe powiadomienia}} z dzisiejszego dnia',
	'echo-email-batch-subject-weekly' => 'Masz {{PLURAL:$2|nowe powiadomienie|nowe powiadomienia}} z tego tygodnia',
	'echo-email-batch-body-daily' => '{{GENDER:$1|Szanowny użytkowniku|Szanowna użytkowniczko}} $1,

Masz {{PLURAL:$3|nowe powiadomienie|nowe powiadomienia}} w {{grammar:6sg|{{SITENAME}}}} z dzisiejszego dnia. Możesz je zobaczyć tutaj:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '{{GENDER:$1|Szanowny użytkowniku|Szanowna użytkowniczko}} $1,

Masz {{PLURAL:$3|nowe powiadomienie|nowe powiadomienia}} w {{grammar:6sg|{{SITENAME}}}} z tego tygodnia. Możesz je zobaczyć tutaj:
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
	'echo-pref-email-frequency-never' => 'Mandeme gnun-e notìfiche për pòsta eletrònica',
	'echo-pref-email-frequency-immediately' => 'Notìfiche andividuaj com che a rivo',
	'echo-pref-email-frequency-daily' => 'Un resumé cotidian dle notìfiche',
	'echo-pref-email-frequency-weekly' => 'Un resumé ebdomadari dle notìfiche',
	'echo-no-agent' => '[Gnun]',
	'echo-no-title' => '[Gnun-a pàgina]',
	'echo-error-no-formatter' => 'Gnun formà definì për la notìfica',
	'notifications' => 'Notìfiche',
	'tooltip-pt-notifications' => 'Toe notìfiche',
	'echo-specialpage' => 'Mie notìfiche', # Fuzzy
	'echo-anon' => "Për arseive dle notìfiche, [[Special:Userlogin/signup|ch'a crea un cont]] o [[Special:UserLogin|ch'a intra ant ël sistema]].",
	'echo-none' => "A l'ha gnun-e notìfiche.",
	'echo-more-info' => "Pi d'anformassion",
	'notification-edit-talk-page2' => "[[User:$1|$1]] {{GENDER:$1|a l'ha publicà}} dzora a soa [[User talk:$2|pàgina ëd ciaciarade]].",
	'notification-edit-talk-page-flyout2' => "<b>$1</b> {{GENDER:$1|a l'ha publicà}} dzora soa [[User talk:$2|pàgina ëd ciaciarade]].",
	'notification-add-comment2' => "[[User:$1|$1]] {{GENDER:$1|a l'ha comentà}} su «[[$3|$2]]» an sla pàgina ëd discussion «$4»",
	'notification-add-talkpage-topic2' => "[[User:$1|$1]] {{GENDER:$1|a l'ha publicà}} n'argoment neuv «$2» dzor [[$3]]",
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|a l\'ha manda}}te un mëssagi: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => "[[User:$1|$1]] {{GENDER:$1|a l'ha comentà}} dzor «[[$3#$2|$2]]» su soa pàgina ëd ciaciarade",
	'notification-new-user' => 'Bin-ëvnù an {{SITENAME}}, $1!', # Fuzzy
	'notification-reverted2' => "{{PLURAL:$4|Soa modìfica dzor [[:$2]] a l'é stàita|Soe modìfiche dzor [[:$2]] a son stàite}} {{GENDER:$1|ripristinà}} da [[User:$1|$1]] $3",
	'notification-reverted-flyout2' => "{{PLURAL:$4|Soa modìfica dzor <b>$2</b> a l'é stàita|Soe modìfiche dzor <b>$2</b> a son stàite}} {{GENDER:$1|ripristinà}} da <b>$1</b> $3",
	'notification-edit-talk-page-email-subject2' => "A l'ha un mëssagi neuv an soa pàgina ëd ciaciarade",
	'notification-edit-talk-page-email-body2' => '$1

$3

Vëdde ëd pi:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => "$1 {{GENDER:$1|a l'ha publicà}} dzora soa pàgina ëd ciaciarade",
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

$1", # Fuzzy
	'echo-link-new' => '$1 {{PLURAL:$1|notifìca neuva|notifìche neuve}}',
	'echo-link' => 'Notìfiche',
	'echo-overlay-link' => 'Tute le notìfiche',
	'echo-overlay-title' => 'Mie notìfiche', # Fuzzy
	'echo-overlay-title-overflow' => 'Mie notìfiche (as na mostro $1 ëd $2 nen lesùe)', # Fuzzy
	'echo-date-today' => 'Ancheuj',
	'echo-date-yesterday' => 'Jer',
	'echo-load-more-error' => "A l'é capitaje n'eror an recuperand pi d'arzultà.",
	'echo-email-batch-subject-daily' => "It l'has $1 {{PLURAL:$2|notìfica|notìfiche}} ancheuj", # Fuzzy
	'echo-email-batch-subject-weekly' => "It l'has $1 {{PLURAL:$2|notìfica|notìfiche}} sta sman-a", # Fuzzy
	'echo-email-batch-body-daily' => "$1,

It l'has $2 {{PLURAL:$3|notìfica|notìfiche}} dzora {{SITENAME}} ancheuj.  Vardje ambelessì:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5", # Fuzzy
	'echo-email-batch-body-weekly' => "$1,

It l'has $2 {{PLURAL:$3|notìfica|notìfiche}} dzora {{SITENAME}} sta sman-a.  Vardje ambelessì:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5", # Fuzzy
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'prefs-echo' => 'يادګيرنې',
	'notifications' => 'يادګيرنې',
	'echo-specialpage' => 'يادګيرنې',
	'echo-none' => 'تاسې هېڅ يادګيرنې نه لرۍ.',
	'notification-new-user' => '$1 {{SITENAME}} ته ښه راغلې!، موږ خوښ يو چې تاسې دلته ياست.',
	'echo-link-new' => '$1 نوې {{PLURAL:$1|يادګيرنه|يادګيرنې}}',
	'echo-link' => 'يادګيرنې',
	'echo-overlay-link' => 'ټولې يادګيرنې',
	'echo-overlay-title' => '<b>يادګيرنې</b>',
	'echo-date-today' => 'نن',
	'echo-date-yesterday' => 'پرون',
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
	'echo-pref-send-me' => 'Manne a me:',
	'echo-pref-send-to' => 'Manne a:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-mail',
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
	'echo-email-batch-subject-daily' => 'Tu è {{PLURAL:$2|notifiche}} nove osce',
	'echo-email-batch-subject-weekly' => 'Tu è {{PLURAL:$2|notifiche}} nove sta sumàne',
	'echo-email-batch-body-daily' => "$1,

Tu è {{PLURAL:$3|notificazione|notificaziune}} nove sus a {{SITENAME}} osce.  'Ndruchele:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5",
	'echo-email-batch-body-weekly' => "$1,

Tu è {{PLURAL:$3|notificazione|notificaziune}} nove sus a {{SITENAME}} sta sumàne.  'Ndruchele:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5",
);

/** Russian (русский)
 * @author Amire80
 * @author Base
 * @author DCamer
 * @author David1010
 * @author Iluvatar
 * @author KPu3uC B Poccuu
 * @author Kaganer
 * @author Kalan
 * @author Soul Train
 */
$messages['ru'] = array(
	'echo-desc' => 'Система уведомлений',
	'prefs-echo' => 'Уведомления',
	'prefs-displaynotifications' => 'Настройки отображения',
	'echo-pref-email' => 'Электронная почта',
	'echo-pref-email-frequency-never' => 'Не присылать мне уведомления по электронной почте',
	'echo-pref-email-frequency-immediately' => 'Отдельные уведомления по мере их поступления',
	'echo-pref-email-frequency-daily' => 'Ежедневная сводка уведомлений',
	'echo-pref-email-frequency-weekly' => 'Еженедельная сводка уведомлений',
	'echo-no-agent' => '[Никто]',
	'echo-no-title' => '[Нет страницы]',
	'echo-error-no-formatter' => 'Форматирование не определено для уведомления',
	'notifications' => 'Уведомления',
	'tooltip-pt-notifications' => 'Ваши уведомления',
	'echo-specialpage' => 'Мои уведомления', # Fuzzy
	'echo-anon' => 'Чтобы получать уведомления, [[Special:Userlogin/signup|создайте учётную запись]] или [[Special:UserLogin|представьтесь]].',
	'echo-none' => 'Вы не получали уведомлений.',
	'echo-more-info' => 'Подробнее',
	'echo-quotation-marks' => '«$1»',
	'notification-new-user' => 'Добро пожаловать в {{SITENAME}}, $1! Мы рады, что вы здесь.',
	'notification-edit-talk-page-email-subject2' => 'На вашей странице обсуждения есть новое сообщение',
	'echo-email-subject-default' => 'Новые уведомления на {{SITENAME}}',
	'echo-email-body-default' => 'Вы имеете новое уведомление в проекте {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'У вас есть новое уведомление',
	'echo-email-footer-default' => '$2

Для управления отправкой вам электронных сообщений посетите:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1', # Fuzzy
	'echo-link-new' => '$1 {{PLURAL:$1|новое уведомление|новых уведомлений}}',
	'echo-link' => 'Уведомления',
	'echo-overlay-link' => 'Все уведомления',
	'echo-overlay-title' => '<b>Уведомления</b>',
	'echo-overlay-title-overflow' => 'Уведомления (показаны $1 из $2 непрочитанных)', # Fuzzy
	'echo-date-today' => 'Сегодня',
	'echo-date-yesterday' => 'Вчера',
	'echo-load-more-error' => 'Произошла ошибка при получении дополнительных результатов.',
	'echo-email-batch-subject-daily' => 'Вы получили $1 {{PLURAL:$2|уведомление|уведомления|уведомлений}} сегодня', # Fuzzy
	'echo-email-batch-subject-weekly' => 'Вы получили $1 {{PLURAL:$2|уведомление|уведомления|уведомлений}} на этой неделе', # Fuzzy
	'echo-email-batch-body-daily' => '$1,

Вы получили $2 {{PLURAL:$3|уведомление|уведомления|уведомлений}} в проекте {{SITENAME}} сегодня. Увидеть их можно здесь:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5', # Fuzzy
	'echo-email-batch-body-weekly' => '$1,

Вы получили $2 {{PLURAL:$3|уведомление|уведомления|уведомлений}} в проекте {{SITENAME}} на этой неделе. Увидеть их можно здесь:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5', # Fuzzy
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
 * @author Dcastor
 * @author Edvinw
 * @author WikiPhoenix
 */
$messages['sv'] = array(
	'echo-desc' => 'Notifikationssystem',
	'prefs-echo' => 'Meddelanden',
	'prefs-emailsettings' => 'E-postinställningar',
	'prefs-displaynotifications' => 'Visningsalternativ',
	'prefs-echosubscriptions' => 'Underrätta mig om dessa händelser',
	'echo-pref-send-me' => 'Skicka mig:',
	'echo-pref-send-to' => 'Skicka till:',
	'echo-pref-web' => 'Webb',
	'echo-pref-email' => 'E-post',
	'echo-pref-email-frequency-never' => 'Skicka inga notifieringar till mig via e-post',
	'echo-pref-email-frequency-immediately' => 'Enskilda notifieringar efterhand som de kommer',
	'echo-pref-email-frequency-daily' => 'En daglig sammanställning av notifieringar',
	'echo-pref-email-frequency-weekly' => 'En veckovis sammanställning av notifieringar',
	'echo-pref-notify-show-link' => 'Visa notifieringar i min verktygsrad',
	'echo-dismiss-button' => 'Avfärda',
	'echo-dismiss-message' => 'Stäng av alla $1 notifieringar',
	'echo-dismiss-prefs-message' => 'Du kan aktivera dessa igen i dina [[Special:#mw-prefsection-echo|inställningar]]', # Fuzzy
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Diskussionssideinlägg}}',
	'echo-category-title-article-linked' => 'Sid{{PLURAL:$1|länk|länkar}}',
	'echo-category-title-reverted' => 'Redigerings{{PLURAL:$1|återställning|återställningar}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Omnämning|Omnämningar}}',
	'echo-category-title-other' => '{{PLURAL:$1|Annan|Andra}}',
	'echo-category-title-system' => '{{PLURAL:$1|System}}',
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
	'echo-feedback' => 'Feedback',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|postade}} på din [[User talk:$2|diskussionssida]].',
	'notification-edit-talk-page-flyout2' => '<b>$1</b> {{GENDER:$1|postade}} på din [[User talk:$2|diskussionssida]].',
	'notification-page-linked' => '[[:$2]] blev {{GENDER:$1|länkad}} från [[:$3]]: [[Special:WhatLinksHere/$2|Se alla länkar till denna sida]]',
	'notification-page-linked-flyout' => '<b>$2</b> blev {{GENDER:$1|länkad}} från <b>$3</b>: [[Special:WhatLinksHere/$2|Se alla länkar till denna sida]]',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|kommenterade}} "[[$3|$2]]" på diskussionssidan för "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|postade}} ett nytt ämne "$2" på [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|skickade}} ett meddelande till dig: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|kommenterade}} "[[$3#$2|$2]]" på din diskussionssida',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|nämnde}} dig på [[$3#$2|$3]].',
	'notification-mention-flyout' => '<b>$1</b> {{GENDER:$1|nämnde}} dig på [[$3#$2|$3]].',
	'notification-user-rights' => 'Dina användarrättigheter [[Special:Log/rights/$1|blev {{GENDER:$1|ändrade}}]] av [[User:$1|$1]]. $2. [[Special:ListGroupRights|Läs mer]]',
	'notification-user-rights-flyout' => 'Dina användarrättigheter blev {{GENDER:$1|ändrade}} av <b>$1</b>. $2. [[Special:ListGroupRights|Läs mer]]',
	'notification-user-rights-add' => 'Du är nu medlem i {{PLURAL:$2|denna grupp|dessa grupper}}: $1',
	'notification-user-rights-remove' => 'Du är inte längre medlem av {{PLURAL:$2|denna grupp|dessa grupper}}: $1',
	'notification-new-user' => 'Välkommen till {{SITENAME}}, $1! Vi är glada att du är här.',
	'notification-reverted2' => '{{PLURAL:$4|Din redigering|Dina redigeringar}} på [[:$2]] har {{GENDER:$1|återställts}} av [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Din redigering|Dina redigeringar}} på <b>$2</b> har {{GENDER:$1|återställts}} av <b>$1</b> $3',
	'notification-edit-talk-page-email-subject2' => 'Du har ett nytt meddelande på diskussionssidan',
	'notification-edit-talk-page-email-body2' => '$1

$3

Se mer:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|postade}} på din diskussionssida',
	'notification-page-linked-email-subject' => 'En sida som du skapat länkades till på {{SITENAME}}',
	'notification-page-linked-email-body' => '$1

Se alla länkar till denna sida:

{{canonicalurl:{{#special:WhatLinksHere/$2}}}}

$3',
	'notification-page-linked-email-batch-body' => '$2 blev {{GENDER:$1|länkad}} från $3',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Din redigering|Dina redigeringar}} på $2 blev {{GENDER:$1|återställda}} av $1',
	'notification-reverted-email-body2' => '{{PLURAL:$7|Din redigering på $2|Dina redigeringar på $2}} har {{GENDER:$1|återställts}} av $1.

$5

Se mer:

$3

$6',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Din redigering|Dina redigeringar}} på $2 blev {{GENDER:$1|återställda}} av $1',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|nämnde}} dig på {{SITENAME}}',
	'notification-mention-email-body' => '{{SITENAME}} användare $1 {{GENDER:$1|nämnde}} dig på $2.

$3

Se mer:

$4

$5',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|nämnde}} dig på $2.',
	'notification-user-rights-email-subject' => 'Dina användarrättigheter har ändrats på {{SITENAME}}',
	'notification-user-rights-email-body' => 'Dina användarrättigheter blev {{GENDER:$1|ändrade}} av $1. $2

Se mer:

{{canonicalurl:{{#special:ListGroupRights}}}}

$3',
	'notification-user-rights-email-batch-body' => 'Dina användarrättigheter blev {{GENDER:$1|ändrade}} av $1. $2',
	'echo-email-subject-default' => 'Nytt meddelande på {{SITENAME}}',
	'echo-email-body-default' => 'Du har ett nytt meddelande på {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Du har ett nytt meddelande',
	'echo-email-footer-default' => '$2

För att kontrollera vilken e-post vi skickar dig, kontrollera sina inställningar:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nytt meddelande|nya meddelanden}}',
	'echo-link' => 'Meddelanden',
	'echo-overlay-link' => 'Alla meddelanden',
	'echo-overlay-title' => '<b>Meddelanden</b>',
	'echo-overlay-title-overflow' => '<b>Meddelanden</b> (visar $1 av $2 olästa)',
	'echo-mark-all-as-read' => 'Markera alla som lästa',
	'echo-date-today' => 'Idag',
	'echo-date-yesterday' => 'Igår',
	'echo-load-more-error' => 'Ett fel uppstod när fler resultat skulle hämtas.',
	'notification-edit-talk-page-bundle' => '$1 och $3 {{PLURAL:$4|andra}} {{GENDER:$1|postade}} på din [[User talk:$2|diskussionssida]].',
	'notification-page-linked-bundle' => '$2 blev {{GENDER:$1|länkad}} från $3 och $4 {{PLURAL:$5|annan sida|andra sidor}}. [[Special:WhatLinksHere/$2|Se alla länkar till denna sida]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 och $2 {{PLURAL:$3|annan|andra}} {{GENDER:$1|postade}} på din diskussionssida.',
	'notification-page-linked-email-batch-bundle-body' => '$2 blev {{GENDER:$1|länkad}} från $3 och $4 {{PLURAL:$5|annan sida|andra sidor}}',
	'echo-email-batch-subject-daily' => 'Du har {{PLURAL:$2|ett nytt meddelande|nya meddelanden}} idag',
	'echo-email-batch-subject-weekly' => 'Du har {{PLURAL:$2|ett nytt meddelande|nya meddelanden}} denna vecka',
	'echo-email-batch-body-daily' => '$1,

Du har {{PLURAL:$3|ett nytt meddelande|nya meddelanden}} på {{SITENAME}} idag. Se {{PLURAL:$3|det|dem}} här:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,

Du har {{PLURAL:$3|ett nytt meddelande|nya meddelanden}} på {{SITENAME}} denna vecka. Se {{PLURAL:$3|det|dem}} här:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
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
	'prefs-emailsettings' => 'E-posta ayarları',
	'prefs-displaynotifications' => 'Görüntüleme seçenekleri',
	'prefs-echosubscriptions' => 'Bu olaylar hakkında bildir',
	'echo-pref-send-me' => 'Bana gönder:',
	'echo-pref-send-to' => 'Şuna gönder:',
	'echo-pref-web' => 'Veb',
	'echo-pref-email' => 'E-posta',
	'echo-pref-email-frequency-never' => 'Bana e-posta bildirimi gönderme',
	'echo-pref-email-frequency-daily' => 'Bildirimlerin günlük özeti',
	'echo-pref-email-frequency-weekly' => 'Bildirimlerin haftalık özeti',
	'echo-pref-notify-show-link' => 'Bildirimleri araç çubuğumda göster',
	'echo-learn-more' => 'Daha fazla bilgi',
	'echo-category-title-edit-user-talk' => 'Tartışma sayfası {{PLURAL:$1|gönderimi|gönderimleri}}',
	'echo-category-title-article-linked' => 'Sayfa {{PLURAL:$1|bağlantısı|bağlantıları}}',
	'echo-category-title-reverted' => 'Değişiklik {{PLURAL:$1|iptali|iptalleri}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Zikretme|Zikretmeler}}',
	'echo-category-title-other' => '{{PLURAL:$1|Diğer}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistem}}',
	'echo-no-agent' => '[Kimse]',
	'echo-no-title' => '[Sayfa yok]',
	'echo-error-preference' => 'Hata: Kullanıcı tercihi ayarlanamadı',
	'notifications' => 'Bildirimler',
	'tooltip-pt-notifications' => 'Bildirimleriniz',
	'echo-specialpage' => 'Bildirimler',
	'echo-none' => 'Bildiriminiz bulunmamakta.',
	'echo-more-info' => 'Daha fazla bilgi',
	'echo-feedback' => 'Geri bildirim',
	'notification-new-user' => 'Hoş geldin $1! Sizi burada görmekten memnun olduk.',
	'notification-edit-talk-page-email-subject2' => 'Yeni tartışma sayfası iletiniz var.',
	'notification-edit-talk-page-email-body2' => '$1

$3

Daha fazlası:

$2

$4',
	'echo-email-batch-body-default' => 'Yeni bir bildiriminiz var',
	'echo-link' => 'Bildirimler',
	'echo-overlay-link' => 'Bütün bildirimler',
	'echo-overlay-title' => '<b>Bildirimler</b>',
	'echo-date-today' => 'Bugün',
	'echo-date-yesterday' => 'Dün',
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
	'echo-pref-email-frequency-never' => 'Не надсилати мені жодних сповіщень електронною поштою',
	'echo-pref-email-frequency-immediately' => 'Сповіщати про кожну подію одразу',
	'echo-pref-email-frequency-daily' => 'Щоденна збірка сповіщень',
	'echo-pref-email-frequency-weekly' => 'Щомісячна збірка сповіщень',
	'echo-dismiss-prefs-message' => 'Ви можете повернути їх назад у своїх [[Special:Preferences#mw-prefsection-echo|налаштуваннях]]',
	'echo-no-agent' => '[Ніхто]',
	'echo-no-title' => '[Нема сторінки]',
	'echo-error-no-formatter' => 'Не визначено формату сповіщень',
	'notifications' => 'Сповіщення',
	'tooltip-pt-notifications' => 'Ваші сповіщення',
	'echo-specialpage' => 'Мої сповіщення', # Fuzzy
	'echo-anon' => 'Для отримання сповіщень, [[Special:Userlogin/signup|створіть обліковий запис]] або [[Special:UserLogin|увійдіть]].',
	'echo-none' => 'У Вас немає сповіщень.',
	'notification-new-user' => 'Ласкаво просимо до {{GRAMMAR:accusative|{{SITENAME}}}}, $1!', # Fuzzy
	'echo-email-subject-default' => 'Нові сповіщення на {{SITENAME}}',
	'echo-email-body-default' => 'У Вас є нове сповіщення на {{SITENAME}}:

$1',
	'echo-email-footer-default' => '$2

Щоб контролювати, які листи ми Вам надсилаємо, перейдіть сюди:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1', # Fuzzy
	'echo-link-new' => '$1 {{PLURAL:$1|нове сповіщення|нові сповіщення|нових сповіщень}}',
	'echo-link' => 'Сповіщення',
	'echo-overlay-link' => 'Усі сповіщення',
	'echo-overlay-title' => '<b>Сповіщення</b>',
	'echo-overlay-title-overflow' => '<b>Сповіщення</b> (показано $1 з $2 непрочитаних)',
	'echo-date-today' => 'Сьогодні',
	'echo-date-yesterday' => 'Вчора',
	'echo-load-more-error' => 'Під час отримання додаткових результатів сталася помилка.',
	'echo-email-batch-subject-daily' => 'У Вас $1 {{PLURAL:$2|сповіщення|сповіщення|сповіщень}} сьогодні', # Fuzzy
	'echo-email-batch-subject-weekly' => 'У Вас $1 {{PLURAL:$2|сповіщення|сповіщення|сповіщень}} цього тижня', # Fuzzy
	'echo-email-batch-body-daily' => '$1,

У Вас $2 {{PLURAL:$3|сповіщення|сповіщення|сповіщень}} на {{SITENAME}} сьогодні. Перегляньте їх тут:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5', # Fuzzy
	'echo-email-batch-body-weekly' => '$1,

У Вас $2 {{PLURAL:$3|сповіщення|сповіщення|сповіщень}} на {{SITENAME}} цього тижня. Перегляньте їх тут:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5', # Fuzzy
);

/** Urdu (اردو)
 * @author Noor2020
 * @author පසිඳු කාවින්ද
 */
$messages['ur'] = array(
	'prefs-echo' => 'اطلاعات',
	'echo-dismiss-prefs-message' => 'آپ اس کو واپس لا سکتے ہیں[[Special:Preferences#mw-prefsection-echo|preferences]] پر',
	'echo-category-title-other' => 'دیگر', # Fuzzy
	'notifications' => 'اطلاعات',
	'echo-specialpage' => 'میری اطلاعات', # Fuzzy
	'echo-feedback' => 'آپ کی رائے',
	'notification-user-rights-flyout' => 'آپ کے صارفانہ حقوق ہوگئے  {{GENDER:$1| تبدیل}} <b> $1 </b>کے ذریعے ۔ $2. [[Special:ListGroupRights|مزید دیکھیں]]',
	'echo-link' => 'میری اطلاعات', # Fuzzy
	'echo-overlay-link' => 'سب اطلاعات...', # Fuzzy
	'echo-overlay-title' => '<b>اطلاعات</b>',
	'echo-overlay-title-overflow' => '<b>اطلاعات</b> (دکھا رہا ہے $1  کے  $2  غیر مطلع)',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'echo-desc' => 'Hệ thống thông báo',
	'prefs-echo' => 'Thông báo',
	'prefs-emailsettings' => 'Tùy chọn thư điện tử',
	'prefs-displaynotifications' => 'Tùy chọn hiển thị',
	'prefs-echosubscriptions' => 'Báo cho tôi biết về những sự kiện này',
	'echo-pref-send-me' => 'Gửi thư cho tôi:',
	'echo-pref-send-to' => 'Gửi đến:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Thư điện tử',
	'echo-pref-email-frequency-never' => 'Không gửi cho tôi bất kỳ thông báo qua thư điện tử',
	'echo-pref-email-frequency-immediately' => 'Gửi các thông báo từng cái một vào đúng lúc xảy ra',
	'echo-pref-email-frequency-daily' => 'Tóm lược các thông báo hàng ngày',
	'echo-pref-email-frequency-weekly' => 'Tóm lược các thông báo hàng tuần',
	'echo-pref-notify-show-link' => 'Hiển thị thông báo trên thanh công cụ',
	'echo-learn-more' => 'Tìm hiểu thêm',
	'echo-dismiss-button' => 'Tắt',
	'echo-dismiss-message' => 'Tắt mọi thông báo $1',
	'echo-dismiss-prefs-message' => 'Bạn có thể bật lại các thông báo này trong [[Special:Preferences#mw-prefsection-echo|Tùy chọn]]',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1}}Lời tin nhắn',
	'echo-category-title-article-linked' => '{{PLURAL:$1}}Liên kết đến trang',
	'echo-category-title-reverted' => '{{PLURAL:$1}}Lùi sửa',
	'echo-category-title-mention' => '{{PLURAL:$1}}Lời nói đến',
	'echo-category-title-other' => '{{PLURAL:$1}}Khác',
	'echo-category-title-system' => '{{PLURAL:$1}}Hệ thống',
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
	'echo-feedback' => 'Phản hồi',
	'echo-quotation-marks' => '“$1”',
	'notification-edit-talk-page2' => '[[User:$1|$1]] đã nhắn tin vào [[User talk:$2|trang thảo luận]] của bạn.',
	'notification-edit-talk-page-flyout2' => '<b>$1</b> đã nhắn tin vào [[User talk:$2|trang thảo luận]] của bạn.',
	'notification-page-linked' => '[[:$3]] mới {{GENDER:$1}}có liên kết đến [[:$2]]: [[Special:WhatLinksHere/$2|Xem tất cả các liên kết đến trang này]]',
	'notification-page-linked-flyout' => '<b>$3</b> mới {{GENDER:$1}}có liên kết đến <b>$2</b>: [[Special:WhatLinksHere/$2|Xem tất cả các liên kết đến trang này]]',
	'notification-add-comment2' => '[[User:$1|$1]] đã bình luận về “[[$3|$2]]” tại trang thảo luận “$4”',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] đã bắt đầu cuộc thảo luận mới về “$2” tại [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] đã nhắn tin cho bạn: “[[$3#$2|$2]]”',
	'notification-add-comment-yours2' => '[[User:$1|$1]] đã bình luận về “[[$3#$2|$2]]” tại trang thảo luận của bạn',
	'notification-mention' => '[[User:$1|$1]] đã nói đến bạn tại [[$3#$2|$3]].',
	'notification-mention-flyout' => '<b>$1</b> đã nói đến bạn tại [[$3#$2|$3]].',
	'notification-user-rights' => '[[User:$1|$1]] {{GENDER:$1}}đã [[Special:Log/rights/$1|thay đổi]] các quyền người dùng của bạn. $2. [[Special:ListGroupRights|Tìm hiểu thêm]]',
	'notification-user-rights-flyout' => '<b>$1</b> {{GENDER:$1}}đã thay đổi các quyền người dùng của bạn. $2. [[Special:ListGroupRights|Tìm hiểu thêm]]',
	'notification-user-rights-add' => 'Bạn mới là thành viên của {{PLURAL:$2|nhóm|các nhóm}} này: $1',
	'notification-user-rights-remove' => 'Bạn không còn là thành viên của {{PLURAL:$2|nhóm|các nhóm}} này: $1',
	'notification-new-user' => 'Chào mừng $1 đã đến với {{SITENAME}}!',
	'notification-reverted2' => '[[User:$1|$1]] đã lùi lại {{PLURAL:$4|sửa đổi|các sửa đổi}} của bạn tại [[:$2]] $3',
	'notification-reverted-flyout2' => '<b>$1</b> đã lùi lại {{PLURAL:$4|sửa đổi|các sửa đổi}} của bạn tại <b>$2</b> $3',
	'notification-edit-talk-page-email-subject2' => 'Trang thảo luận của bạn có tin nhắn mới',
	'notification-edit-talk-page-email-body2' => '$1

$3

Xem thêm:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 đã nhắn tin vào trang thảo luận của bạn',
	'notification-page-linked-email-subject' => 'Có liên kết mới đến một trang do bạn tạo ra tại {{SITENAME}}',
	'notification-page-linked-email-body' => '$1

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

Để cấu hình hoặc tắt các thông báo qua thư điện tử, hãy xem tùy chọn của bạn:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 thông báo mới',
	'echo-link' => 'Thông báo',
	'echo-overlay-link' => 'Tất cả các thông báo',
	'echo-overlay-title' => '<b>Thông báo</b>',
	'echo-overlay-title-overflow' => '<b>Tin nhắn</b> (đang xem $1 trên $2 chưa đọc)',
	'echo-mark-all-as-read' => 'Đánh dấu tất cả là đã đọc',
	'echo-date-today' => 'Hôm nay',
	'echo-date-yesterday' => 'Hôm qua',
	'echo-date-header' => '$2 $1',
	'echo-load-more-error' => 'Lỗi đã xảy ra khi lấy thêm kết quả.',
	'notification-edit-talk-page-bundle' => '$1 và $3 {{PLURAL:$4}}người khác đã {{GENDER:$1}}nhắn tin vào [[User talk:$2|trang thảo luận]] của bạn.',
	'notification-page-linked-bundle' => '$3 và $4 {{PLURAL:$5}}trang khác mới {{GENDER:$1}}có liên kết đến $2. [[Special:WhatLinksHere/$2|Xem tất cả các liên kết đến trang này]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 và $2 {{PLURAL:$3}}người khác {{GENDER:$1}}đã nhắn tin vào trang thảo luận của bạn',
	'notification-page-linked-email-batch-bundle-body' => '$3 và $4 {{PLURAL:$5}}trang khác {{GENDER:$1}}mới có liên kết đến $2',
	'echo-email-batch-subject-daily' => 'Bạn có {{PLURAL:$2|một tin nhắn|các tin nhắn}} mới hôm nay',
	'echo-email-batch-subject-weekly' => 'Bạn có {{PLURAL:$2|thông báo|các thông báo}} mới tuần này',
	'echo-email-batch-body-daily' => 'Xin chào $1,

Bạn có {{PLURAL:$3|một thông báo|các thông báo}} mới tại {{SITENAME}} hôm nay. Hãy xem {{PLURAL:$3|nó|chúng}} tại đây:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => 'Xin chào $1,

Bạn có {{PLURAL:$3|một thông báo|các thông báo}} mới tại {{SITENAME}} tuần này. Hãy xem {{PLURAL:$3|nó|chúng}} tại đây:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
);

/** Simplified Chinese (中文（简体）‎)
 * @author Anakmalaysia
 * @author Byfserag
 * @author Cwek
 * @author Dimension
 * @author Hydra
 * @author Kuailong
 * @author Liangent
 * @author Linforest
 * @author Shirayuki
 * @author Xiaomingyan
 * @author Yfdyh000
 * @author 乌拉跨氪
 */
$messages['zh-hans'] = array(
	'echo-desc' => '通知系统',
	'prefs-echo' => '通知',
	'prefs-emailsettings' => '电子邮件设置',
	'prefs-displaynotifications' => '显示选项',
	'prefs-echosubscriptions' => '通知我有关这些事件的情况',
	'echo-pref-send-me' => '发送给我：',
	'echo-pref-send-to' => '发送到：',
	'echo-pref-web' => '网站',
	'echo-pref-email' => '电子邮件',
	'echo-pref-email-frequency-never' => '不要给我发送任何电子邮件通知',
	'echo-pref-email-frequency-immediately' => '每次发生时发出单独的通知',
	'echo-pref-email-frequency-daily' => '每日发出通知的概要',
	'echo-pref-email-frequency-weekly' => '每周发出通知的概要',
	'echo-pref-notify-show-link' => '在我的工具栏中显示通知',
	'echo-learn-more' => '了解更多',
	'echo-dismiss-button' => '解除',
	'echo-dismiss-message' => '关闭所有 $1 通知',
	'echo-dismiss-prefs-message' => '您可以在[[Special:Preferences#mw-prefsection-echo|参数设置]]中重新打开这些选项',
	'echo-category-title-edit-user-talk' => '讨论页{{PLURAL:$1|留言}}',
	'echo-category-title-article-linked' => '页面被{{PLURAL:$1|链接|链接}}',
	'echo-category-title-reverted' => '编辑被{{PLURAL:$1|恢复|恢复}}',
	'echo-category-title-mention' => '{{PLURAL:$1|提及|提及}}',
	'echo-category-title-other' => '{{PLURAL:$1|其他}}',
	'echo-category-title-system' => '{{PLURAL:$1|系统}}',
	'echo-no-agent' => '[无人]',
	'echo-no-title' => '[无页面]',
	'echo-error-no-formatter' => '没有定义通知的格式',
	'echo-error-preference' => '错误：无法设置用户首选项',
	'echo-error-token' => '错误：无法检索用户令牌',
	'notifications' => '通知',
	'tooltip-pt-notifications' => '您的通知',
	'echo-specialpage' => '通知',
	'echo-anon' => '要想接收通知，请[[Special:Userlogin/signup|创建帐号]]或[[Special:UserLogin|登录]]。',
	'echo-none' => '您没有任何通知。',
	'echo-more-info' => '更多信息',
	'echo-feedback' => '反馈',
	'notification-edit-talk-page2' => '[[User:$1|$1]]在您的[[User talk:$2|讨论页]]留言。',
	'notification-edit-talk-page-flyout2' => '<b>$1</b>在您的[[User talk:$2|讨论页]]留言。',
	'notification-page-linked' => '[[:$2]]有来自[[:$3]]的{{GENDER:$1|链入}}：[[Special:WhatLinksHere/$2|查看本页的所有链入页面]]',
	'notification-page-linked-flyout' => '<b>$2</b>有来自<b>$3</b>的{{GENDER:$1|链入}}：[[Special:WhatLinksHere/$2|查看本页的所有链入页面]]',
	'notification-add-comment2' => '[[User:$1|$1]]在“$4”的讨论页中{{GENDER:$1|谈论了}}“[[$3|$2]]”',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]]在[[$3]]上发起了一个新的话题“$2”',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]]给您发来一条消息：“[[$3#$2|$2]]”',
	'notification-add-comment-yours2' => '[[User:$1|$1]]在您的讨论页上{{GENDER:$1|谈论了}}“[[$3#$2|$2]]”',
	'notification-mention' => '[[User:$1|$1]]在[[$3#$2|$3]]中{{GENDER:$1|提到}}了你。',
	'notification-mention-flyout' => '$1在[[$3#$2|$3]]上{{GENDER:$1|提到}}了你。',
	'notification-user-rights' => '您的用户权限已被[[User:$1|$1]][[Special:Log/rights/$1|更改]]。$2。[[Special:ListGroupRights|了解更多]]',
	'notification-user-rights-flyout' => '你的用户权限已被<b>$1</b>{{GENDER:$1|更改}}。$2。[[Special:ListGroupRights|了解更多]]',
	'notification-user-rights-add' => '您现在是{{PLURAL:$2|此组|这些组}}的成员：$1',
	'notification-user-rights-remove' => '您不再是{{PLURAL:$2|该组|这些组}}的成员：$1',
	'notification-new-user' => '欢迎来到{{SITENAME}}，$1！我们十分欢迎您的光临。',
	'notification-reverted2' => '您在{{PLURAL:$4|[[:$2]]上的编辑|[[:$2]]上的编辑}}已被[[User:$1|$1]]{{GENDER:$1|回退}} $3',
	'notification-reverted-flyout2' => '您在{{PLURAL:$4|<b>$2</b>的编辑}}已被$1{{GENDER:$1|回退}} $3',
	'notification-edit-talk-page-email-subject2' => '您有一条新的讨论页消息',
	'notification-edit-talk-page-email-body2' => '$1

$3

查看更多：

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1在您的讨论页{{GENDER:$1|留言了}}',
	'notification-page-linked-email-subject' => '您创建的页面在{{SITENAME}}上被链接了',
	'notification-page-linked-email-body' => '$1

查看此页的所有链入页面：

{{canonicalurl:{{#special:WhatLinksHere/$2}}}}

$3',
	'notification-page-linked-email-batch-body' => '$2从$3{{GENDER:$1|链入}}',
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
	'notification-user-rights-email-body' => '您的用户权限被$1{{GENDER:$1|修改}}了。$2

查看更多

{{canonicalurl:{{#special:ListGroupRights}}}}

$3',
	'notification-user-rights-email-batch-body' => '您的用户权限已被$1{{GENDER:$1|修改}}。$2',
	'echo-email-subject-default' => '{{SITENAME}}上的新通知',
	'echo-email-body-default' => '您在{{SITENAME}}上有新通知：

$1',
	'echo-email-batch-body-default' => '您有一条新通知',
	'echo-email-footer-default' => '$2

要想管理您接收的电子邮件的种类，请访问：{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1条新通知',
	'echo-link' => '通知',
	'echo-overlay-link' => '全部通知',
	'echo-overlay-title' => '<b>通知</b>',
	'echo-overlay-title-overflow' => '<b>通知</b>（正显示$2条未读通知中的$1条）',
	'echo-mark-all-as-read' => '将所有标记为已读',
	'echo-date-today' => '今天',
	'echo-date-yesterday' => '昨天',
	'echo-load-more-error' => '获取更多的结果时出错。',
	'notification-edit-talk-page-bundle' => '$1和{{PLURAL:$4|其他}}$3名用户在你的[[User talk:$2|对话页]]上{{GENDER:$1|留言}}了。',
	'notification-page-linked-bundle' => '$2由$3以及其他$4个{{PLURAL:$5|页面}}{{GENDER:$1|链入}}。[[Special:WhatLinksHere/$2|查看该页的所有链入页面]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1以及{{PLURAL:$3|其他}}$2个人在你的讨论页上{{GENDER:$1|留言}}',
	'notification-page-linked-email-batch-bundle-body' => '$2由$3和其他$4个{{PLURAL:$5|页面}}{{GENDER:$1|链入}}',
	'echo-email-batch-subject-daily' => '您今天有{{PLURAL:$2|条通知|条通知}}',
	'echo-email-batch-subject-weekly' => '您本周有{{PLURAL:$2|条通知|条通知}}',
	'echo-email-batch-body-daily' => '$1：

今天您在{{SITENAME}}有{{PLURAL:$3|1条新通知|数条新通知}}。点此查看{{PLURAL:$3|它|它们}}：
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1：

本周您在{{SITENAME}}有{{PLURAL:$3|1条新通知|数条新通知}}。点此查看{{PLURAL:$3|它|它们}}：
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
);

/** Traditional Chinese (中文（繁體）‎)
 * @author Justincheng12345
 * @author Kevinhksouth
 * @author Littletung
 * @author Shirayuki
 * @author Simon Shek
 * @author Waihorace
 */
$messages['zh-hant'] = array(
	'echo-desc' => '通知系統',
	'prefs-echo' => '通知',
	'prefs-emailsettings' => '電子郵件設定',
	'prefs-displaynotifications' => '顯示選項',
	'prefs-echosubscriptions' => '通知我有關這些事件的情況',
	'echo-pref-send-me' => '發送給我：',
	'echo-pref-send-to' => '發送到:',
	'echo-pref-web' => '網頁',
	'echo-pref-email' => '電子郵件',
	'echo-pref-email-frequency-never' => '不要向我發送任何電郵通知',
	'echo-pref-email-frequency-immediately' => '允許個別通知',
	'echo-pref-email-frequency-daily' => '每日通知摘要',
	'echo-pref-email-frequency-weekly' => '每周通知摘要',
	'echo-pref-notify-show-link' => '在工具列中顯示通知',
	'echo-learn-more' => '了解更多',
	'echo-dismiss-button' => '取消',
	'echo-dismiss-message' => '關閉所有$1通知',
	'echo-dismiss-prefs-message' => '你可於[[Special:Preferences#mw-prefsection-echo|preferences]]重新啟動這些選項',
	'echo-category-title-edit-user-talk' => '討論頁{{PLURAL:$1|留言}}',
	'echo-category-title-article-linked' => '頁面{{PLURAL:$1|連結}}',
	'echo-category-title-reverted' => '編輯{{PLURAL:$1|回退}}',
	'echo-category-title-mention' => '{{PLURAL:$1|提到|提到}}',
	'echo-category-title-other' => '{{PLURAL:$1|其他}}',
	'echo-category-title-system' => '{{PLURAL:$1|系統}}',
	'echo-no-agent' => '[無人]',
	'echo-no-title' => '[無頁面]',
	'echo-error-no-formatter' => '沒有定義通知格式',
	'echo-error-preference' => '錯誤: 無法設置用戶設定',
	'echo-error-token' => '錯誤: 無法取得用戶令牌',
	'notifications' => '通知',
	'tooltip-pt-notifications' => '您的通知',
	'echo-specialpage' => '通知',
	'echo-anon' => '要接收通知，請[[Special:Userlogin/signup|創建帳號]]或[[Special:UserLogin|登錄]]。',
	'echo-none' => '您沒有任何通知。',
	'echo-more-info' => '更多資訊',
	'echo-feedback' => '意見',
	'notification-edit-talk-page2' => '[[User:$1|$1]]在您的[[User talk:$2|討論頁]]留言。',
	'notification-edit-talk-page-flyout2' => '<b>$1</b>在您的[[User talk:$2|討論頁]]留言。',
	'notification-page-linked' => '[[:$2]]已從[[:$3]]{{GENDER:$1|連入}}：[[Special:WhatLinksHere/$2|參見所有連入頁面]]',
	'notification-page-linked-flyout' => '<b>$2</b>已從<b>$3</b>{{GENDER:$1|連入}}：[[Special:WhatLinksHere/$2|參見所有連入頁面]]',
	'notification-add-comment2' => '[[User:$1|$1]]於「$4」的討論頁中{{GENDER:$1|談及}}「[[$3|$2]]」',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]]於[[$3]]發起了一個新話題「$2」',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]]發給您一則訊息：「[[$3#$2|$2]]」',
	'notification-add-comment-yours2' => '[[User:$1|$1]]於您的討論頁{{GENDER:$1|談及}}「[[$3#$2|$2]]」',
	'notification-mention' => '[[User:$1|$1]]於[[$3#$2|$3]]{{GENDER:$1|提到}}你 。',
	'notification-mention-flyout' => '$1於[[$3#$2|$3]]{{GENDER:$1|提到}}你。',
	'notification-user-rights' => '您的用戶權限已由[[User:$1|$1]][[Special:Log/rights/$1|改變]]。$2。[[Special:ListGroupRights|瞭解更多]]',
	'notification-user-rights-flyout' => '您的用戶權限已由<b>$1</b>改變。$2。[[Special:ListGroupRights|瞭解更多]]',
	'notification-user-rights-add' => '你現成為了{{PLURAL:$2|此|這些}}組別的成員：$1',
	'notification-user-rights-remove' => '你不再是{{PLURAL:$2|此|這些}}組別的成員：$1',
	'notification-new-user' => '歡迎來到{{SITENAME}}，$1！',
	'notification-reverted2' => '您於[[:$2]]上的{{PLURAL:$4|編輯}}遭[[User:$1|$1]]回退 $3',
	'notification-reverted-flyout2' => '您於<b>$2</b>上的{{PLURAL:$4|編輯}}遭<b>$1</b>回退 $3',
	'notification-edit-talk-page-email-subject2' => '你有一則新留言',
	'notification-edit-talk-page-email-body2' => '$1

$3

查看更多：

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1在您的討論頁{{GENDER:$1|留言}}',
	'notification-page-linked-email-subject' => '您創建的頁面已由{{SITENAME}}連入',
	'notification-page-linked-email-body' => '$1

查看所有連入頁面：

{{canonicalurl:{{#special:WhatLinksHere/$2}}}}

$3',
	'notification-page-linked-email-batch-body' => '$2已從$3{{GENDER:$1|連入}}',
	'notification-reverted-email-subject2' => '您於$2上的{{PLURAL:$3|編輯}}遭$1回退',
	'notification-reverted-email-body2' => '您於$2上的{{PLURAL:$7|編輯}}遭$1回退。

$5

查看更多：

$3

$6',
	'notification-reverted-email-batch-body2' => '您於$2上的{{PLURAL:$3|編輯}}遭$1回退',
	'notification-mention-email-subject' => '$1於{{SITENAME}}提到你',
	'notification-mention-email-body' => '{{SITENAME}}用戶$1於$2提到你。

$3

查看更多：

$4

$5',
	'notification-mention-email-batch-body' => '$1在$2{{GENDER:$1|提到}}你',
	'notification-user-rights-email-subject' => '您在{{SITENAME}}的用戶權限已變更',
	'notification-user-rights-email-body' => '你的用戶權限已由$1修改。$2

查看更多

{{canonicalurl:{{#special:ListGroupRights}}}}

$3',
	'notification-user-rights-email-batch-body' => '你的用戶權限已由$1修改。$2',
	'echo-email-subject-default' => '{{SITENAME}}上的新通知',
	'echo-email-body-default' => '你在{{SITENAME}}有一項新訊息：

$1',
	'echo-email-batch-body-default' => '你有新訊息',
	'echo-email-footer-default' => '$2

請安以下網址檢查你的選項以控制我們寄給您的電子郵件：
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1項新{{PLURAL:$1|訊息|訊息}}',
	'echo-link' => '通知',
	'echo-overlay-link' => '所有通知',
	'echo-overlay-title' => '<b>通知</b>',
	'echo-overlay-title-overflow' => '<b>通知</b>（顯示$2項未閱之中的$1項）',
	'echo-mark-all-as-read' => '標記所有為已讀',
	'echo-date-today' => '今天',
	'echo-date-yesterday' => '昨天',
	'echo-load-more-error' => '獲取更多的結果時出錯。',
	'notification-edit-talk-page-bundle' => '$1與{{PLURAL:$4|另外}}$3名用戶於在您的[[User talk:$2|對話頁]]上留言。',
	'notification-page-linked-bundle' => '$2已由$3及其它$4個{{PLURAL:$5|頁面}}{{GENDER:$1|連入}}。[[Special:WhatLinksHere/$2|查看所有連入頁面]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1與{{PLURAL:$3|另外}}$2名用戶於在您的對話頁上留言。',
	'notification-page-linked-email-batch-bundle-body' => '$2已從$3及另外$4個{{PLURAL:$5|頁面}}{{GENDER:$1|連入}}',
	'echo-email-batch-subject-daily' => '今天你有{{PLURAL:$2|新一項新通知|多項新通知}}',
	'echo-email-batch-subject-weekly' => '本週你有{{PLURAL:$2|新一項新通知|多項新通知}}',
	'echo-email-batch-body-daily' => '$1,

您今天於{{SITENAME}}有{{PLURAL:$3|一|數}}則新通知。按以下連結查看：
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
	'echo-email-batch-body-weekly' => '$1,

您這星期於{{SITENAME}}有{{PLURAL:$3|一|數}}則新通知。按以下連結查看：
{{canonicalurl:{{#special:Notifications}}}}

$4

$5',
);
