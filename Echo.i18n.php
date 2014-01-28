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
	'prefs-emailsettings' => 'Email options',
	'prefs-displaynotifications' => 'Display options',
	'prefs-echosubscriptions' => 'Notify me about these events',
	'prefs-newmessageindicator' => 'New message indicator',
	'echo-pref-send-me' => 'Send me:',
	'echo-pref-send-to' => 'Send to:',
	'echo-pref-email-format' => 'Email format:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Email',
	'echo-pref-email-frequency-never' => 'Do not send me any email notifications',
	'echo-pref-email-frequency-immediately' => 'Individual notifications as they come in',
	'echo-pref-email-frequency-daily' => 'A daily summary of notifications',
	'echo-pref-email-frequency-weekly' => 'A weekly summary of notifications',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Plain text',
	'echo-pref-notify-show-link' => 'Show notifications in my toolbar',
	'echo-pref-new-message-indicator' => 'Show talk page message indicator in my toolbar',
	'echo-learn-more' => 'Learn more',

	// Alert interface
	'echo-new-messages' => 'You have new messages',

	// Category titles
	'echo-category-title-edit-user-talk' => 'Talk page {{PLURAL:$1|message|messages}}',
	'echo-category-title-article-linked' => 'Page {{PLURAL:$1|link|links}}',
	'echo-category-title-reverted' => 'Edit {{PLURAL:$1|revert|reverts}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Mention|Mentions}}',
	'echo-category-title-other' => '{{PLURAL:$1|Other}}',
	'echo-category-title-system' => '{{PLURAL:$1|System}}',

	// Category tooltips
	'echo-pref-tooltip-edit-user-talk' => 'Notify me when someone posts a message or replies on my talk page.',
	'echo-pref-tooltip-article-linked' => 'Notify me when someone links to a page I created from an article page.',
	'echo-pref-tooltip-reverted' => 'Notify me when someone reverts an edit I made, by using the undo or rollback tool.',
	'echo-pref-tooltip-mention' => 'Notify me when someone links to my user page from any talk page.',

	// Errors
	'echo-no-agent' => '[Nobody]',
	'echo-no-title' => '[No page]',
	'echo-error-no-formatter' => 'No formatting defined for notification.',
	'echo-error-preference' => 'Error: Could not set user preference.',
	'echo-error-token' => 'Error: Could not retrieve user token.',

	// Special:Notifications
	'notifications' => 'Notifications',
	'tooltip-pt-notifications' => 'Your notifications',
	'echo-specialpage' => 'Notifications',
	'echo-anon' => 'To receive notifications, [$1 create an account] or [$2 log in].',
	'echo-none' => 'You have no notifications.',
	'echo-more-info' => 'More info',
	'echo-feedback' => 'Feedback',

	// Notification
	'echo-quotation-marks' => '"$1"',
	'notification-link-text-view-message' => 'View message',
	'notification-link-text-view-mention' => 'View mention',
	'notification-link-text-view-changes' => 'View changes',
	'notification-link-text-view-page' => 'View page',
	'notification-link-text-view-edit' => 'View edit',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|left}} a message on your [[User talk:$2#$3|talk page]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|left}} a message on your talk page in "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|left}} a message on your [[User talk:$2#$3|talk page]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|left}} a message on your talk page in "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => '[[:$2]] was {{GENDER:$1|linked}} from [[:$3]]. [[Special:WhatLinksHere/$2|See all links to this page]].',
	'notification-page-linked-flyout' => '$2 was {{GENDER:$1|linked}} from [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|commented}} on "[[$3|$2]]" on the "$4" talk page.',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|posted}} a new topic "$2" on [[$3]].',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|sent}} you a message: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|commented}} on "[[$3#$2|$2]]" on your talk page.',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|mentioned}} you on the $5 talk page in "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 {{GENDER:$1|mentioned}} you on the $5 talk page in "[[$3#$2|$4]]".',
	'notification-mention-nosection' => '[[User:$1|$1]] {{GENDER:$1|mentioned}} you on the [[$3|$2 talk page]].',
	'notification-mention-nosection-flyout' => '$1 {{GENDER:$1|mentioned}} you on the [[$3|$2 talk page]].',
	'notification-user-rights' => 'Your user rights [[Special:Log/rights/$1|were {{GENDER:$1|changed}}]] by [[User:$1|$1]]. $2. [[Special:ListGroupRights|Learn more]]',
	'notification-user-rights-flyout' => 'Your user rights were {{GENDER:$1|changed}} by $1. $2. [[Special:ListGroupRights|Learn more]]',
	'notification-user-rights-add' => 'You are now a member of {{PLURAL:$2|this group|these groups}}: $1',
	'notification-user-rights-remove' => 'You are no longer a member of {{PLURAL:$2|this group|these groups}}: $1',
	'notification-new-user' => "Welcome to {{SITENAME}}, $1! We're glad you're here.",
	'notification-reverted2' => 'Your {{PLURAL:$4|edit on [[:$2]] has|edits on [[:$2]] have}} been {{GENDER:$1|reverted}} by [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => 'Your {{PLURAL:$4|edit on $2 has|edits on $2 have}} been {{GENDER:$1|reverted}} by $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|left}} you a message on {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|left}} a message on your talk page:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|left}} a message on your talk page in "$2".',
	'notification-page-linked-email-subject' => 'Your page was linked on {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2 was {{GENDER:$1|linked}} from $3.',
	'notification-reverted-email-subject2' => 'Your {{PLURAL:$3|edit was|edits were}} {{GENDER:$1|reverted}} on {{SITENAME}}',
	'notification-reverted-email-batch-body2' => 'Your {{PLURAL:$3|edit on $2 has been|edits on $2 have been}} {{GENDER:$1|reverted}} by $1.',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|mentioned}} you on {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|mentioned}} you on the $4 talk page in "$3".',
	'notification-mention-nosection-email-batch-body' => '$1 {{GENDER:$1|mentioned}} you on the $2 talk page.',
	'notification-user-rights-email-subject' => 'Your user rights have changed on {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Your user rights were {{GENDER:$1|changed}} by $1. $2.',
	'echo-notification-count' => '$1+',
	// Email notification
	'echo-email-subject-default' => 'New notification at {{SITENAME}}',
	'echo-email-body-default' => 'You have a new notification at {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'You have a new notification.',
	'echo-email-footer-default' => '$2

To control which emails we send you, check your preferences:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'To control which emails we send you, <a href="$2" style="text-decoration:none; color: #3868B0;">check your preferences</a>.<br />
$1',
	// Notifications overlay
	'echo-overlay-link' => 'All notifications',
	'echo-overlay-title' => '<b>Notifications</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Notifications}}</b> (showing $1 of $2 unread)',
	'echo-mark-all-as-read' => 'Mark all as read',

	// Special page
	'echo-date-today' => 'Today',
	'echo-date-yesterday' => 'Yesterday',
	'echo-load-more-error' => 'An error occurred while fetching more results.',

	// Bundle
	'notification-edit-talk-page-bundle' => '$1 and $3 {{PLURAL:$4|other|others}} {{GENDER:$1|left}} a message on your [[User talk:$2|talk page]].',
	'notification-page-linked-bundle' => '$2 was {{GENDER:$1|linked}} from $3 and $4 other {{PLURAL:$5|page|pages}}. [[Special:WhatLinksHere/$2|See all links to this page]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 and $2 {{PLURAL:$3|other|others}} {{GENDER:$1|left}} a message on your talk page.',
	'notification-page-linked-email-batch-bundle-body' => '$2 was {{GENDER:$1|linked}} from $3 and $4 other {{PLURAL:$5|page|pages}}.',

	// Email batch
	'echo-email-batch-separator' => '--', # only translate this message to other languages if you have to change it
	'echo-email-batch-bullet' => '•', # only translate this message to other languages if you have to change it
	'echo-email-batch-subject-daily' => 'You have {{PLURAL:$2|a new notification|new notifications}} at {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'You have {{PLURAL:$2|a new notification|new notifications}} at {{SITENAME}} this week',
	'echo-email-batch-body-intro-daily' => "Hi $1,
Here's a summary of today's activity on {{SITENAME}} for you.",
	'echo-email-batch-body-intro-weekly' => "Hi $1,
Here's a summary of this week's activity on {{SITENAME}} for you.",
	'echo-email-batch-link-text-view-all-notifications' => 'View all notifications',
	// Supressed Revisions
	'echo-rev-deleted-text-view' => 'This page revision has been suppressed.',
);

/** Message documentation (Message documentation)
 * @author Amire80
 * @author Beta16
 * @author Geraki
 * @author Jduranboger
 * @author Kaganer
 * @author Kghbln
 * @author Krenair
 * @author Lloffiwr
 * @author Minh Nguyen
 * @author Mormegil
 * @author Nemo bis
 * @author Nike
 * @author Pxos
 * @author Raymond
 * @author Shirayuki
 * @author Siebrand
 * @author Toliño
 * @author రహ్మానుద్దీన్
 */
$messages['qqq'] = array(
	'echo-desc' => '{{desc|name=Echo|url=http://www.mediawiki.org/wiki/Extension:Echo}} The [https://www.mediawiki.org/wiki/Help:Notifications Mediawiki help] page gives notes on the terminology in this extension.',
	'prefs-echo' => 'Name of preferences section for Echo notifications.
{{Identical|Notification}}',
	'prefs-emailsettings' => 'Header for the section of preferences that deals with how often notification emails are sent out and what address they are sent to.
{{Identical|E-mail setting}}',
	'prefs-displaynotifications' => 'Header for the section of preferences that deals with how notifications are displayed',
	'prefs-echosubscriptions' => 'Header for the section of preferences that deals with which notifications the user receives',
	'prefs-newmessageindicator' => 'Header for the section of preferences that deals with talk page message alerts',
	'echo-pref-send-me' => 'Label for the following email delivery options:
* {{msg-mw|Echo-pref-email-frequency-never}}
* {{msg-mw|Echo-pref-email-frequency-immediately}} (default)
* {{msg-mw|Echo-pref-email-frequency-daily}}
* {{msg-mw|Echo-pref-email-frequency-weekly}}',
	'echo-pref-send-to' => 'Label for the address to send email notifications to.',
	'echo-pref-email-format' => 'Label for individual email notification format, the label will be updated once HTML email is ready for email digest.

Used as label for the select box which has the following options:
* {{msg-mw|Echo-pref-email-format-html}}
* {{msg-mw|Echo-pref-email-format-plain-text}}',
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
	'echo-pref-email-format-html' => 'Option for users who want to receive HTML email notification.

See also:
* {{msg-mw|Echo-pref-email-format}}
{{Identical|HTML}}',
	'echo-pref-email-format-plain-text' => 'Option for users who want to receive plain text email notification.

See also:
* {{msg-mw|Echo-pref-email-format}}
{{Identical|Plain text}}',
	'echo-pref-notify-show-link' => "Label for a preference which enables the 'Notifications' link in the header and associated fly-out panel",
	'echo-pref-new-message-indicator' => 'Label for a preference which enables the new talk page message alert',
	'echo-learn-more' => 'Text for link to more information about a topic.
{{Identical|Learn more}}',
	'echo-new-messages' => "Message to let the user know that they have new talk page messages, displayed in the personal menu (top-right corner on Vector and Monobook).

Keep this message short. It '''should not''' end in a full stop.",
	'echo-category-title-edit-user-talk' => 'This is a short title for notification category.

Used in a list of options under the heading {{msg-mw|Prefs-echosubscriptions}} in Special:Preferences. As far as I can see this always needs to be a plural for an unspecified number.

It used to be used as <code>$1</code> in {{msg-mw|Echo-dismiss-message}}, but this message is no longer used, apparently.

Parameters:
* $1 - number of messages, for PLURAL support
{{Related|Echo-category-title}}',
	'echo-category-title-article-linked' => 'This is a short title for notification category.

Used in a list of options under the heading {{msg-mw|Prefs-echosubscriptions}} in Special:Preferences. As far as I can see this always needs to be a plural for an unspecified number.

It used to be used as <code>$1</code> in {{msg-mw|Echo-dismiss-message}}, but this message is no longer used, apparently.

Parameters:
* $1 - number of messages, for PLURAL support
{{Related|Echo-category-title}}',
	'echo-category-title-reverted' => 'This is a short title for notification category.

Used in a list of options under the heading {{msg-mw|Prefs-echosubscriptions}} in Special:Preferences. As far as I can see this always needs to be a plural for an unspecified number.

It used to be used as <code>$1</code> in {{msg-mw|Echo-dismiss-message}}, but this message is no longer used, apparently.

Parameters:
* $1 - number of messages, for PLURAL support
{{Related|Echo-category-title}}',
	'echo-category-title-mention' => 'This is a short title for notification category.

Used in a list of options under the heading {{msg-mw|Prefs-echosubscriptions}} in Special:Preferences. As far as I can see this always needs to be a plural for an unspecified number.

It used to be used as <code>$1</code> in {{msg-mw|Echo-dismiss-message}}, but this message is no longer used, apparently.

Parameters:
* $1 - number of messages, for PLURAL support
{{Related|Echo-category-title}}',
	'echo-category-title-other' => 'This is a short title for notification category.

Used in a list of options under the heading {{msg-mw|Prefs-echosubscriptions}} in Special:Preferences. As far as I can see this always needs to be a plural for an unspecified number.

It used to be used as <code>$1</code> in {{msg-mw|Echo-dismiss-message}}, but this message is no longer used, apparently.

Parameters:
* $1 - number of messages, for PLURAL support
{{Related|Echo-category-title}}',
	'echo-category-title-system' => 'This is a short title for notification category.

Used in a list of options under the heading {{msg-mw|Prefs-echosubscriptions}} in Special:Preferences. As far as I can see this always needs to be a plural for an unspecified number.

It used to be used as <code>$1</code> in {{msg-mw|Echo-dismiss-message}}, but this message is no longer used, apparently.

Parameters:
* $1 - number of messages, for PLURAL support
{{Related|Echo-category-title}}',
	'echo-pref-tooltip-edit-user-talk' => 'This is a short description of the edit-user-talk notification category.
{{Related|Echo-pref-tooltip}}',
	'echo-pref-tooltip-article-linked' => 'This is a short description of the article-linked notification category.
{{Related|Echo-pref-tooltip}}',
	'echo-pref-tooltip-reverted' => 'This is a short description of the tooltip-reverted notification category.
{{Related|Echo-pref-tooltip}}',
	'echo-pref-tooltip-mention' => 'This is a short description of the mention notification category.
{{Related|Echo-pref-tooltip}}',
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
	'echo-anon' => 'Error message shown to users who try to visit [[Special:Notifications]] as an anon.

Parameters:
* $1 - URL of signup page, with returnto pointing to Special:Notifications
* $2 - URL of login page, with returnto pointing to Special:Notifications',
	'echo-none' => 'Message shown to users who have no notifications. Also shown in the overlay.',
	'echo-more-info' => 'This is used for the title (mouseover text) of an icon that links to a page with more information about the Echo extension.',
	'echo-feedback' => 'Text for a link that goes to a feedback survey shown at [[Special:Notifications]].
{{Identical|Feedback}}',
	'echo-quotation-marks' => 'Unused at this time.

{{optional}}
Puts the edit summary in quotation marks. Only translate if different than English.

Parameters:
* $1 - ...',
	'notification-link-text-view-message' => 'Label for button that links to a message on your talk page.
{{Identical|View message}}',
	'notification-link-text-view-mention' => 'Label for button that links to a discussion where you were mentioned.',
	'notification-link-text-view-changes' => 'Label for button that links to a "diff" view showing changes made to a page. This is an alternative to the wording in {{msg-mw|notification-link-text-view-edit}}, which serves essentially the same function.
{{Identical|View changes}}',
	'notification-link-text-view-page' => 'Label for button that links to a page.
{{Identical|View page}}',
	'notification-link-text-view-edit' => 'Label for button that links to a "diff" view showing an edit made to a page. This is an alternative to the wording in {{msg-mw|notification-link-text-view-changes}}, which serves essentially the same function.',
	'notification-edit-talk-page2' => "Format for displaying notifications of a user talk page being edited
* $1 is the username of the person who edited, plain text. Can be used for GENDER.
* $2 is the current user's name, used in the link to their talk page.
* $3 is the section title of the discussion, if any, used in the link to their talk page.
See also:
* {{msg-mw|Notification-edit-talk-page-flyout2}}
* {{msg-mw|Notification-add-talkpage-topic2}}
* left is for verb left.",
	'notification-edit-talk-page-with-section' => 'Format for displaying notifications of a user talk page being edited with a new section or new comment
* $1 is the username of the person who edited, plain text. Can be used for GENDER.
* $2 is the username of current user, used in the link to their talk page.
* $3 is the section title of the discussion, if any, used in the link to their talk page.
* $4 is the raw section title text',
	'notification-edit-talk-page-flyout2' => "Flyout-specific format for displaying notifications of a user talk page being edited
* $1 is the username of the person who edited, plain text. Can be used for GENDER.
* $2 is the current user's name, used in the link to their talk page.
* $3 is the section title of the discussion, if any, used in the link to their talk page
See also:
* {{msg-mw|Notification-edit-talk-page2}}
* {{msg-mw|Notification-add-talkpage-topic2}}",
	'notification-edit-talk-page-flyout-with-section' => 'Flyout-specific format for displaying notifications of a user talk page being edited with a new section or new comment
* $1 is the username of the person who edited, plain text. Can be used for GENDER.
* $2 is the username of current user, used in the link to their talk page.
* $3 is the section title of the discussion, if any, used in the link to their talk page
* $4 is the raw section title text',
	'notification-page-linked' => 'Format for displaying notifications of articles being linked
* $1 is the username of the person who linked the page, plain text. Can be used for GENDER.
* $2 is the page being linked
* $3 is the page linked from
See also:
* {{msg-mw|Notification-page-linked-flyout}}
* {{msg-mw|Notification-page-linked-email-batch-body}}
* {{msg-mw|Notification-page-linked-email-subject}}',
	'notification-page-linked-flyout' => 'Flyout-specific format for displaying notifications of articles being linked
* $1 is the username of the person who linked the page, plain text. Can be used for GENDER.
* $2 is the page being linked
* $3 is the page linked from
See also:
* {{msg-mw|Notification-page-linked}}
* {{msg-mw|Notification-page-linked-email-batch-body}}
* {{msg-mw|Notification-page-linked-email-subject}}',
	'notification-add-comment2' => 'Format for displaying notifications of a comment being added to an existing discussion.

Parameters:
* $1 - the username of the person who edited, plain text. Can be used for GENDER.
* $2 - the section title of the discussion
* $3 - a link to a page and section
* $4 - the page on which the discussion exists, plain text
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
* $1 - a username, plain text; can be used for GENDER
* $2 - discussion name
* $3 - link to user talk page
See also:
* {{msg-mw|Notification-add-comment2}}',
	'notification-mention' => "Format for displaying notifications of a comment in a specific section including a link to another user's user page.

Parameters:
* $1 - the username of the person who edited, plain text. Can be used for GENDER
* $2 - the section title of the discussion
* $3 - the page title of the discussion
* $4 - the raw section title text
* $5 - the title text without namespace (a page title in any namespace)",
	'notification-mention-flyout' => 'Flyout-specific format for displaying notifications of a comment in a specific section.
Parameters:
* $1 - the username of the person who mentioned you, plain text. Can be used for GENDER.
* $2 - the section title of the discussion
* $3 - the page title of the discussion
* $4 - the raw section title text
* $5 - the title text without namespace (a page title in any namespace)',
	'notification-mention-nosection' => "Format for displaying notifications of a comment including a link to another user's user page. Parameters:
* $1 - the username of the person who edited, plain text. Can be used for GENDER
* $2 - the title text without namespace (a page title in any namespace)
* $3 - the page title of the discussion",
	'notification-mention-nosection-flyout' => 'Flyout-specific format for displaying notifications of a comment.
Parameters:
* $1 - the username of the person who edited, plain text. Can be used for GENDER
* $2 - the title text without namespace (a page title in any namespace)
* $3 - the page title of the discussion',
	'notification-user-rights' => 'Format for displaying notifications of a user right change in notification page.  Parameters:
* $1 is the username of the person who made the user right change.  Can be used for GENDER support
* $2 is a semicolon separated list of {{msg-mw|notification-user-rights-add}}, {{msg-mw|notification-user-rights-remove}}',
	'notification-user-rights-flyout' => 'Format for displaying notifications of a user right change in notification flyout.  Parameters:
* $1 - the username of the person who made the user right change.  Can be used for GENDER support
* $2 - a semicolon separated list of {{msg-mw|notification-user-rights-add}}, {{msg-mw|notification-user-rights-remove}}',
	'notification-user-rights-add' => 'Message indicating that a user was added to a user group.  Parameters:
* $1 - a comma separated list of user group names
* $2 - the number of user groups, this is used for PLURAL support
See also:
* {{msg-mw|Notification-user-rights-remove}}',
	'notification-user-rights-remove' => 'Message indicating that a user was removed from a user group. Parameters:
* $1 - a comma separated list of user group names
* $2 - the number of user groups, this is used for PLURAL support
See also:
* {{msg-mw|Notification-user-rights-add}}',
	'notification-new-user' => 'Text of the welcome notification. Parameters:
* $1 - the name of the new user
See also:
* {{msg-mw|Guidedtour-tour-gettingstarted-start-title}}',
	'notification-reverted2' => "Format for displaying notifications of a user's edit being reverted. Parameters:
* $1 - the username of the person who reverted, plain text. Can be used for GENDER.
* $2 - the page that was reverted, formatted
* $3 - a diff link which is labeled {{msg-mw|Showdiff}}
* $4 - the number of edits that were reverted. NOTE: This will only be set to 1 or 2, with 2 actually meaning 'an unknown number greater than 0'.
{{Related|Notification-reverted}}",
	'notification-reverted-flyout2' => 'Flyout-specific format for displaying notifications of a user\'s edit being reverted.

Parameters:
* $1 - the username of the person who reverted, plain text. Can be used for GENDER.
* $2 - the page that was reverted, formatted
* $3 - a diff link which is labeled {{msg-mw|Showdiff}}
* $4 - the number of edits that were reverted. NOTE: This will only be set to 1 or 2, with 2 actually meaning "an unknown number greater than 0".
{{Related|Notification-reverted}}',
	'notification-edit-talk-page-email-subject2' => 'E-mail subject.  Parameters:
* $1 is a username which can be used for gender support',
	'notification-edit-talk-page-email-batch-body2' => 'First line of the email notification for a talk page edit. The following line completes it with the description of the message in question, that is its edit summary.

Parameters:
* $1 is a username (which also links to the userpage of the user in question, in the HTML version)

See also:
* {{msg-mw|Notification-edit-talk-page2}}
* {{msg-mw|Notification-edit-talk-page-email-subject2}}
* {{msg-mw|Notification-edit-talk-page-flyout2}}',
	'notification-edit-talk-page-email-batch-body-with-section' => 'E-mail notification for talk page edit with new section or new comment.  Parameters
* $1 is a username
* $2 is the raw section title text',
	'notification-page-linked-email-subject' => 'E-mail subject.
See also:
* {{msg-mw|Notification-page-linked}}
* {{msg-mw|Notification-page-linked-flyout}}
* {{msg-mw|Notification-page-linked-email-batch-body}}',
	'notification-page-linked-email-batch-body' => 'E-mail notification for page being linked. Parameters:
* $1 is the username of the person who linked the page, plain text. Can be used for GENDER.
* $2 is the page being linked.
* $3 is the page linked from
See also:
* {{msg-mw|Notification-page-linked}}
* {{msg-mw|Notification-page-linked-flyout}}
* {{msg-mw|Notification-page-linked-email-subject}}',
	'notification-reverted-email-subject2' => 'Email subject. Parameters:
* $1 - a username
* $2 - (Unused) a page title
* $3 - the number of reverts
{{Related|Notification-reverted}}',
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
* {{msg-mw|Notification-mention-email-batch-body}}',
	'notification-mention-email-batch-body' => 'E-mail notification batch body.  Parameters:
* $1 - a username, plaintext.  Can be used for gender support
* $2 - (Unused) talk page title
* $3 - the raw section title text
* $4 - the title text without namespace (a page title in any namespace)

See also:
* {{msg-mw|Notification-mention}}
* {{msg-mw|Notification-mention-flyout}}
* {{msg-mw|Notification-mention-email-subject}}',
	'notification-mention-nosection-email-batch-body' => 'E-mail notification batch body.  Parameters:
* $1 - a username, plaintext.  Can be used for gender support
* $2 - the title text without namespace (a page title in any namespace)

See also:
* {{msg-mw|Notification-mention-nosection}}
* {{msg-mw|Notification-mention-nosection-flyout}}
* {{msg-mw|Notification-mention-email-subject}}',
	'notification-user-rights-email-subject' => 'E-mail subject for user rights notification

See also:
* {{msg-mw|Notification-user-rights}}
* {{msg-mw|Notification-user-rights-flyout}}
* {{msg-mw|Notification-user-rights-email-batch-body}}',
	'notification-user-rights-email-batch-body' => 'Email notification batch body.  Parameters:
* $1 is a user name, plaintext.  Can be used for gender support
* $2 is a semicolon separated list of {{msg-mw|notification-user-rights-add}}, {{msg-mw|notification-user-rights-remove}}',
	'echo-notification-count' => '{{optional}}
The new notification count next to notification link, for example: 99+

Parameters:
* $1 - the count',
	'echo-email-subject-default' => 'Default subject for Echo e-mail notifications',
	'echo-email-body-default' => 'Default message content for Echo e-mail notifications.
* $1 is a plain text description of the notification.',
	'echo-email-batch-body-default' => 'Default message for Echo e-mail digest notifications',
	'echo-email-footer-default' => 'Default footer content for Echo text e-mail notifications.  Parameters:
* $1 is the address of the organization that sent the e-mail
* $2 is "-------..." ({{msg-mw|echo-email-batch-separator}})

For HTML version, see {{msg-mw|echo-email-footer-default-html}}.',
	'echo-email-footer-default-html' => 'Default footer content for Echo html e-mail notifications. Parameters:
* $1 - the address of the organization that sent the email
* $2 - the URL to the notification preference page
For plain-text version, see {{msg-mw|Echo-email-footer-default}}.',
	'echo-overlay-link' => 'Link to "all notifications" at the bottom of the overlay.
{{Identical|All notifications}}',
	'echo-overlay-title' => 'Title at the top of the notifications overlay. Should include bold tags.',
	'echo-overlay-title-overflow' => 'Title at the top of the notifications overlay when there are additional unread notifications that are not being shown.

Parameters:
* $1 - the number of unread notifications being shown
* $2 - the total number of unread notifications that exist',
	'echo-mark-all-as-read' => 'Text for button that marks all unread notifications as read. Keep this short as possible.
{{Identical|Mark all as read}}',
	'echo-date-today' => "The header text for today's notification section.
{{Identical|Today}}",
	'echo-date-yesterday' => "The header text for yesterday's notification section.
{{Identical|Yesterday}}",
	'echo-load-more-error' => 'Error message for errors in loading more notifications',
	'notification-edit-talk-page-bundle' => 'Bundled message for edit-user-talk notification. Parameters:
* $1 - the username who performs the action, which can be used for gender support
* $2 - the username
* $3 - the count of other action performers, could be number or {{msg-mw|Echo-notification-count}}. e.g. 7 others or 99+ others
* $4 - a number used for plural support
See also:
* {{msg-mw|Notification-edit-talk-page2}}
* {{msg-mw|Notification-edit-talk-page-email-batch-body2}}
* {{msg-mw|Notification-edit-talk-page-email-subject2}}',
	'notification-page-linked-bundle' => 'Bundled message for page-linked notification. Parameters:
* $1 - the username who performs the action, which can be used for gender support
* $2 - the page title
* $3 - the page linked from
* $4 - the count of other action performers, could be number or {{msg-mw|Echo-notification-count}}. e.g. 7 others or 99+ others
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
* {{msg-mw|Notification-edit-talk-page-email-subject2}}',
	'notification-page-linked-email-batch-bundle-body' => 'Bundled message for page-linked email digest notification.  Parameters:
* $1 - the username who performs the action, which can be used for gender support
* $2 - the link-to page title
* $3 - the link-from page title
* $4 - the count of other link-from page title, can be number or {{msg-mw|echo-notification-count}}
* $5 - a number used for plural support

See also:
* {{msg-mw|Notification-page-linked}}
* {{msg-mw|Notification-page-linked-flyout}}
* {{msg-mw|Notification-page-linked-email-batch-body}}
* {{msg-mw|Notification-page-linked-email-subject}}',
	'echo-email-batch-separator' => '{{optional}}
Email batch content separator',
	'echo-email-batch-bullet' => '{{optional}}',
	'echo-email-batch-subject-daily' => 'Daily email batch subject.
* $1 - (Unused) could be a numeric count or "10+". See also: {{msg-mw|Echo-notification-count|optional message}}.
* $2 - a numeric count, this is used for plural support
See also:
* {{msg-mw|Echo-email-batch-subject-weekly}}',
	'echo-email-batch-subject-weekly' => 'Weekly email batch subject. Parameters:
* $1 - (Unused) could be a numeric count or "10+". See also: {{msg-mw|Echo-notification-count|optional message|notext=1}}
* $2 - a numeric count, this is used for plural support
See also:
* {{msg-mw|Echo-email-batch-subject-daily}}',
	'echo-email-batch-body-intro-daily' => 'Introduction text for daily email digest.  Parameters:
* $1 - a username
See also:
* {{msg-mw|Echo-email-batch-body-intro-weekly}}',
	'echo-email-batch-body-intro-weekly' => 'Introduction text for weekly email digest.  Parameters:
* $1 - a username
See also:
* {{msg-mw|Echo-email-batch-body-intro-daily}}',
	'echo-email-batch-link-text-view-all-notifications' => 'The link text for the primary action in daily and weekly email digest',
	'echo-rev-deleted-text-view' => 'Short message displayed instead of edit content when revision text is suppressed.',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'echo-desc' => 'Kennisgewing-stelsel',
	'prefs-echo' => 'Kennisgewings',
	'prefs-emailsettings' => 'E-posopsies',
	'prefs-displaynotifications' => 'Vertoonopsies',
	'prefs-echosubscriptions' => 'Hou my op hoogte oor hierdie gebeurtenisse',
	'prefs-newmessageindicator' => 'Nuwe boodskap-indikator',
	'echo-pref-send-me' => 'Stuur my:',
	'echo-pref-send-to' => 'Stuur na:',
	'echo-pref-email-format' => 'E-posformaat:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-pos',
	'echo-pref-email-frequency-never' => 'Moenie aan my e-pos stuur nie',
	'echo-pref-email-frequency-immediately' => 'Individuele kennisgewings soos hulle inkom',
	'echo-pref-email-frequency-daily' => 'Daaglikse opsomming van kennisgewings',
	'echo-pref-email-frequency-weekly' => 'Weeklikse opsomming van kennisgewings',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Eenvoudige teks',
	'echo-pref-notify-show-link' => 'Wys kennisgewings in my werkbalk',
	'echo-pref-new-message-indicator' => 'Wys besprekingsblad-boodskapindikator in my werkbalk',
	'echo-learn-more' => 'Leer meer',
	'echo-new-messages' => 'U het nuwe boodskappe', # Fuzzy
	'echo-category-title-edit-user-talk' => 'Boodskap{{PLURAL:$1||pe}} op u besprekingsblad',
	'echo-category-title-article-linked' => 'Bladsyskakel{{PLURAL:$1||s}}',
	'echo-category-title-system' => '{{PLURAL:$1|Stelsel}}',
	'echo-no-agent' => '[Niemand]',
	'echo-no-title' => '[Geen bladsy]',
	'notifications' => 'Kennisgewings',
	'tooltip-pt-notifications' => 'U kennisgewings',
	'echo-specialpage' => 'Kennisgewings',
	'echo-more-info' => 'Meer inligting',
	'echo-feedback' => 'Terugvoer',
	'notification-link-text-view-message' => 'Wys boodskap',
	'notification-link-text-view-mention' => 'Wys vermelding',
	'notification-link-text-view-changes' => 'Wys veranderings',
	'notification-link-text-view-page' => 'Wys bladsy',
	'notification-link-text-view-edit' => 'Wys wysiging',
	'notification-edit-talk-page2' => "[[User:$1|$1]] {{GENDER:$1|het 'n boodskap}} op u [[User talk:$2#$3|besprekingsblad]] geplaas.",
	'echo-email-subject-default' => 'Nuwe kennisgewing op {{SITENAME}}',
	'echo-email-body-default' => "U het 'n nuwe kennisgewing op {{SITENAME}}:

$1",
	'echo-email-batch-body-default' => "U het 'n nuwe kennisgewing.",
	'echo-overlay-link' => 'Alle kennisgewings',
	'echo-overlay-title' => '<b>Kennisgewings</b>',
	'echo-mark-all-as-read' => 'Merk alles as gelees',
	'echo-date-today' => 'Vandag',
	'echo-date-yesterday' => 'Gister',
	'echo-email-batch-link-text-view-all-notifications' => 'Wys alle kennisgewings',
);

/** Amharic (አማርኛ)
 * @author Elfalem
 */
$messages['am'] = array(
	'prefs-echo' => 'ማስታወቂያዎች',
	'prefs-emailsettings' => 'የኢ-ሜል ምርጫዎች',
	'prefs-displaynotifications' => 'የማሳያ አማራጮች',
	'echo-pref-email' => 'ኢ-ሜል',
	'echo-pref-email-frequency-never' => 'ማስታወቂያዎችን በኢ-ሜል አትላክልኝ',
	'echo-pref-email-frequency-immediately' => 'ለእያንዳንዱ ማስታወቂያ',
	'echo-pref-email-frequency-daily' => 'በየቀኑ አንድ ማጠቃለያ',
	'echo-pref-email-frequency-weekly' => 'በሳምንቱ አንድ ማጠቃለያ',
	'echo-pref-email-format-html' => 'ኤች.ቲ.ኤም.ኤል. (HTML)',
	'echo-pref-email-format-plain-text' => 'ጥሬ ጽሁፍ',
	'echo-learn-more' => 'የበለጠ ለመረዳት',
	'echo-new-messages' => 'አዲስ መልዕክቶች አሉዎት።', # Fuzzy
	'echo-category-title-edit-user-talk' => 'ውይይት ገጽ {{PLURAL:$1|መልዕክት|መልዕክቶች}}',
	'echo-category-title-article-linked' => 'የገጽ {{PLURAL:$1|መያያዣ|መያያዣዎች}}',
	'echo-category-title-reverted' => 'የ{{PLURAL:$1|ተገለበጠ ለውጥ|ተገለበጡ ለውጦች}}',
	'echo-category-title-mention' => '{{PLURAL:$1|ስም ማንሳት}}',
	'echo-category-title-other' => '{{PLURAL:$1|ሌላ|ሌሎች}}',
	'echo-pref-tooltip-edit-user-talk' => 'ማንኛውም ሰው በውይይት ገጼ ላይ ሲጽፍ አስታውቀኝ።',
	'echo-pref-tooltip-article-linked' => 'ማንኛው ሰው እኔ ወደ ፈጠርኩት መጣጥፍ በሌላ መጣጥፍ ውስጥ መያያዣ ሲያቀርብ አስታውቀኝ።',
	'echo-pref-tooltip-reverted' => 'ማንኛው ሰው የእኔን ለውጦች ሲገለብጥ አስታውቀኝ።',
	'echo-pref-tooltip-mention' => 'ማንኛውም ሰው ወደ እኔ ውይይት ገጽ በሌላ ውይይት ገጽ ላይ መያያዣ ሲያቀርብ አስታውቀኝ።',
	'echo-no-agent' => '[Nobody]',
	'echo-no-title' => '[No page]',
	'notifications' => 'ማስታወቂያዎች',
	'tooltip-pt-notifications' => 'የእርስዎ ማስታወቂያዎች',
	'echo-specialpage' => 'ማስታወቂያዎች',
	'echo-anon' => 'ማስታወቂያዎችን ለማየት [$1 የብዕር ስም ያውጡ] ወይም [$2 በብዕር ስምዎ ይግቡ]።',
	'echo-none' => 'ምንም ማስታወቂያዎች የሎትም።',
	'echo-more-info' => 'ተጨማሪ መረጃ',
	'echo-feedback' => 'አስተያየት',
	'notification-link-text-view-message' => 'መልዕክት ለማየት',
	'notification-link-text-view-mention' => 'ስምዎ የተነሳበትን ገጽ ለማየት',
	'notification-link-text-view-changes' => 'ማነጻጸሪያ ለማየት',
	'notification-link-text-view-page' => 'ገጽ ለማየት',
	'notification-link-text-view-edit' => 'ማነጻጸሪያ ለማየት',
	'notification-edit-talk-page2' => '[[User:$1|$1]]  [[User talk:$2#$3|በውይይት ገጽዎ]] ላይ መልዕክት {{GENDER:$1|ትቷል|ትታለች|ትተዋል}}።',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] በውይይት ገጽዎ ላይ በ«[[User talk:$2#$3|$4]]» ርዕስ ስር መልዕክት {{GENDER:$1|ትቷል|ትታለች|ትተዋል}}።',
	'notification-edit-talk-page-flyout2' => '$1  [[User talk:$2#$3|በውይይት ገጽዎ]] ላይ መልዕክት {{GENDER:$1|ትቷል|ትታለች|ትተዋል}}።',
	'notification-edit-talk-page-flyout-with-section' => '$1 በውይይት ገጽዎ ላይ በ«[[User talk:$2#$3|$4]]» ርዕስ ስር መልዕክት {{GENDER:$1|ትቷል|ትታለች|ትተዋል}}።',
	'notification-page-linked' => '$1 በ[[:$3]] ላይ ወደ [[:$2]] መያያዣ {{GENDER:$1|ፈጥሯል|ፈጥራለች|ፈጥረዋል}}። [[Special:WhatLinksHere/$2|ወደዚህ ገጽ ያሉት መያያዣዎች ሁሉ ይዩ]]።',
	'notification-page-linked-flyout' => 'በ[[:$3]] ላይ ወደ $2 ገጽ መያያዣ ተፈጥሯል።', # Fuzzy
	'notification-add-comment2' => '[[User:$1|$1]] በ$4 ገጽ በ«[[$3|$2]]» ርዕስ ላይ አስተያየት {{GENDER:$1|ሰጥቷል|ስጥታለች|ስጥተዋል}}።',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] በ[[$3]] ላይ አዲስ ውይይት በ«$2» ርዕስ {{GENDER:$1|ጀመረ|ጀመረች|ጀመሩ}}።',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] አዲስ መልዕክት {{GENDER:$1|ልኮሎታል}}፣ «[[$3#$2|$2]]»።',
	'echo-overlay-link' => 'ሁሉም ማስታወቂያዎች',
	'echo-overlay-title' => '<b>ማስታወቂያዎች</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|ማስታወቂያ|ማስታወቂያዎች}}</b> (ከ$2 {{PLURAL:$2|ያልታየ|ያልታዩ}} ውስጥ {{PLURAL:$1|ዱ|ቱ}})',
	'echo-mark-all-as-read' => 'ሁሉንም ታይተዋል በል',
	'echo-date-today' => 'ዛሬ',
	'echo-date-yesterday' => 'ትላንትና',
	'echo-load-more-error' => 'ተጨማሪ ውጤቶችን ሲያመጣ ስህተት ተከስቷል።',
	'echo-email-batch-link-text-view-all-notifications' => 'ሁሉንም ማስታወቂያዎች ለማየት',
);

/** Arabic (العربية)
 * @author Achraf94
 * @author Ciphers
 * @author Meno25
 * @author Mido
 * @author Zanatos
 * @author زكريا
 * @author مشعل الحربي
 */
$messages['ar'] = array(
	'echo-desc' => 'نظام الإشعارات',
	'prefs-echo' => 'إشعارات',
	'prefs-emailsettings' => 'خيارات البريد الإلكتروني',
	'prefs-displaynotifications' => 'خيارات العرض',
	'prefs-echosubscriptions' => 'أعلمني بشأن هذه الأحداث',
	'prefs-newmessageindicator' => 'مؤشر الرسائل الجديدة',
	'echo-pref-send-me' => 'أرسل لي:',
	'echo-pref-send-to' => 'أرسل إلى:',
	'echo-pref-email-format' => 'صيغة البريد الإلكتروني:',
	'echo-pref-web' => 'ويب',
	'echo-pref-email' => 'بريد إلكتروني',
	'echo-pref-email-frequency-never' => 'لا ترسل لي أي إشعارات بالبريد الإلكتروني',
	'echo-pref-email-frequency-immediately' => 'الإشعارات الفردية حال ورودها',
	'echo-pref-email-frequency-daily' => 'ملخصا يوميا للإشعارات',
	'echo-pref-email-frequency-weekly' => 'ملخصا أسبوعيا للإشعارات',
	'echo-pref-email-format-html' => 'إتش تي إم إل',
	'echo-pref-email-format-plain-text' => 'نص خام',
	'echo-pref-notify-show-link' => 'أظهر الإشعارات في شريط الأدوات',
	'echo-pref-new-message-indicator' => 'أظهر مؤشر رسائل صفحة النقاش في شريط الأدوات',
	'echo-learn-more' => 'معرفة المزيد',
	'echo-new-messages' => 'لديك رسائل جديدة',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|رسالة|رسائل}} صفحة النقاش',
	'echo-category-title-article-linked' => '{{PLURAL:$1|وصلة|وصلات}} صفحة',
	'echo-category-title-reverted' => 'إلغاء {{PLURAL:$1|تعديل|تعديلات}}',
	'echo-category-title-mention' => '{{PLURAL:$1|إشارة|إشارات}}',
	'echo-category-title-other' => '{{PLURAL:$1|أخرى}}',
	'echo-category-title-system' => '{{PLURAL:$1|النظام}}',
	'echo-pref-tooltip-edit-user-talk' => 'أعلمني عندما توضع رسائل أو ردود في صفحة نقاشي.',
	'echo-pref-tooltip-article-linked' => 'أعلمني عندما توضع في مقالة ما وصلة لصفحة أنشأتها.',
	'echo-pref-tooltip-reverted' => 'أعلمني عندما إلغاء تعديل أجريته.',
	'echo-pref-tooltip-mention' => 'أعلمني عندما توضع في صفحة نقاش ما وصلة لصفحتي.',
	'echo-no-agent' => '[لا أحد]',
	'echo-no-title' => '[لا صفحة]',
	'echo-error-no-formatter' => 'لم يحدد للإشعارات أي تنسيق.',
	'echo-error-preference' => 'خطأ: لم تحفظ تفضيلات المستخدم.',
	'echo-error-token' => 'خطأ: لم يتوصل إلى مفتاح معطيات المستخدم.',
	'notifications' => 'إشعارات',
	'tooltip-pt-notifications' => 'إشعاراتك',
	'echo-specialpage' => 'إشعاراتي',
	'echo-anon' => 'لتلقي الإشعارات، [$1 أنشئ حسابا] أو [$2 سجل الدخول].',
	'echo-none' => 'ليس لديك أي إشعارات',
	'echo-more-info' => 'المزيد',
	'echo-feedback' => 'تعليقات',
	'notification-link-text-view-message' => 'اعرض الرسالة',
	'notification-link-text-view-mention' => 'اعرض الإشارة',
	'notification-link-text-view-changes' => 'اعرض التعديلات',
	'notification-link-text-view-page' => 'اعرض الصفحة',
	'notification-link-text-view-edit' => 'اعرض التعديل',
	'notification-edit-talk-page2' => '{{GENDER:$1|بعث|بعثت}} لك [[User:$1|$1]] برسالة في [[User talk:$2#$3|صفحة نقاشك]].',
	'notification-edit-talk-page-with-section' => '{{GENDER:$1|بعث|بعثت}} لك [[User:$1|$1]] برسالة في قسم [[User talk:$2#$3|$4]] من [[User talk:$2#$3|صفحة نقاشك]].',
	'notification-edit-talk-page-flyout2' => '{{GENDER:$1|بعث|بعثت}} لك $1 برسالة في [[User talk:$2#$3|صفحة نقاشك]].',
	'notification-edit-talk-page-flyout-with-section' => '{{GENDER:$1|بعث|بعثت}} لك $1 برسالة في قسم [[User talk:$2#$3|$4]] من صفحة نقاشك.',
	'notification-page-linked' => '{{GENDER:$1|وضعت}} وصلة لصفحة [[:$2]] في [[:$3]]. [[Special:WhatLinksHere/$2|انظر جميع وصلات تلك الصفحة]].',
	'notification-page-linked-flyout' => '{{GENDER:$1|وضعت}} وصلة لصفحة $2 في [[:$3]].',
	'notification-add-comment2' => '{{GENDER:$1|علق|علقت}} [[User:$1|$1]] على "[[$3|$2]]" في صفحة نقاش "$4".',
	'notification-add-talkpage-topic2' => '{{GENDER:$1|أنشأ|أنشأت}} [[User:$1|$1]] قسما جديدا بعنوان "$2" في [[$3]].',
	'notification-add-talkpage-topic-yours2' => '{{GENDER:$1|أرسل|أرسلت}} لك [[User:$1|$1]] رسالة بعنوان "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '{{GENDER:$1|علق|علقت}} [[User:$1|$1]] على "[[$3#$2|$2]]" في صفحة نقاشك.',
	'notification-mention' => '{{GENDER:$1|أشار|أشارت}} إليك [[User:$1|$1]] في قسم "[[$3#$2|$4]]" من صفحة نقاش $5.',
	'notification-mention-flyout' => '{{GENDER:$1|أشار|أشارت}} إليك $1 في قسم "[[$3#$2|$4]]" في صفحة نقاش $5.',
	'notification-mention-nosection' => '{{GENDER:$1|أشار|أشارت}} [[مستخدم:$1|$1]] إليك في [[$3|صفحة نقاش $2]].', # Fuzzy
	'notification-mention-nosection-flyout' => '{{GENDER:$1|أشار|أشارت}} $1 إليك في [[$3|صفحة نقاش $2]].',
	'notification-user-rights' => '[[Special:Log/rights/$1|{{GENDER:$1|غير|غيرت}}]]  [[User:$1|$1]] صلاحياتك. $2. [[Special:ListGroupRights|المزيد]]',
	'notification-user-rights-flyout' => '{{GENDER:$1|غير|غيرت}} $1 صلاحياتك. $2. [[Special:ListGroupRights|المزيد]]',
	'notification-user-rights-add' => 'أنت الآن عضو في {{PLURAL:$2|مجموعة|مجموعات}}: $1',
	'notification-user-rights-remove' => 'ألغيت عضويتك في {{PLURAL:$2|مجموعة|مجموعات}}: $1',
	'notification-new-user' => '$1، مرحبا بك في {{SITENAME}}. أسعدنا بلقياك.',
	'notification-reverted2' => '{{GENDER:$1|ألغى|ألغت}} [[User:$1|$1]] {{PLURAL:$4|تعديلك في [[:$2]]|تعديلاتك في [[:$2]]}}. $3',
	'notification-reverted-flyout2' => '{{GENDER:$1|ألغى|ألغت}} $1 {{PLURAL:$4|تعديلك في $2|تعديلاتك في $2}}. $3',
	'notification-edit-talk-page-email-subject2' => '{{GENDER:$1|بعث|بعثت}} لك $1 برسالة في {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '{{GENDER:$1|بعث|بعثت}} لك $1 برسالة في صفحة نقاشك:',
	'notification-edit-talk-page-email-batch-body-with-section' => '{{GENDER:$1|بعث|بعثت}} لك $1 برسالة في صفحة نقاشك في "$2".',
	'notification-page-linked-email-subject' => 'وضعت وصلة لصفحتك في {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '{{GENDER:$1|وضعت}} وصلة إلى $2 في $3.',
	'notification-reverted-email-subject2' => '{{GENDER:$1|ألغي{{PLURAL:$3||ت}}}} {{PLURAL:$3|تعديلك|تعديلاتك}} في {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '{{GENDER:$1|ألغى|ألغت}} $1 {{PLURAL:$3|تعديلك|تعديلاتك}} في $2.',
	'notification-mention-email-subject' => ' {{GENDER:$1|أشار|أشارت}} إليك $1 في {{SITENAME}}',
	'notification-mention-email-batch-body' => ' {{GENDER:$1|أشار|أشارت}} إليك $1 في قسم "$3" من صفحة نقاش $4.',
	'notification-mention-nosection-email-batch-body' => '$1 {{GENDER:$1|أشار|أشارت}} إليك في صفحة نقاش $2.',
	'notification-user-rights-email-subject' => 'غيرت صلاحياتك في {{SITENAME}}',
	'notification-user-rights-email-batch-body' => '{{GENDER:$1|غير|غيرت}} $1 صلاحياتك. $2.',
	'echo-email-subject-default' => 'إشعار جديد في {{SITENAME}}',
	'echo-email-body-default' => 'لديك إشعار جديد في {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'لديك إشعار جديد.',
	'echo-email-footer-default' => '$2

للتحكم في رسائل الإلكترونية التي نرسلها لك، انظر التفضيلات:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'للتحكم في رسائل الإلكترونية التي نرسلها لك، <a href="$2" style="text-decoration:none; color: #3868B0;">انظر التفضيلات</a>.<br />
$1',
	'echo-overlay-link' => 'كل الإشعارات',
	'echo-overlay-title' => '<b>إشعارات</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|إشعارات}}</b> (عرض $1 من $2 لم تقرأ)',
	'echo-mark-all-as-read' => 'اعتبرها كلها مقروءة',
	'echo-date-today' => 'اليوم',
	'echo-date-yesterday' => 'أمس',
	'echo-load-more-error' => 'وقع خطأ في إيراد المزيد من النتائج.',
	'notification-edit-talk-page-bundle' => '{{GENDER:$1|{{PLURAL:$4|بعث}}|{{PLURAL:$4|بعثت}}}} لك $1 و{{PLURAL:$4|مستخدم آخر|مستخدم آخر|مستخدمان آخران|$3 آخرون}} برسائل في [[User talk:$2|صفحة نقاشك]].',
	'notification-page-linked-bundle' => '{{GENDER:$1|وضعت}} وصلة إلى $2 في $3 و{{PLURAL:$5|صفحة أخرى|صفحة أخرى|صفحتين أخريين|$4 صفحات أخرى|$4 صفحة أخرى}}. [[Special:WhatLinksHere/$2|انظر جميع الوصلات إلى هذه الصفحة]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '{{GENDER:$1|{{PLURAL:$3|بعث}}|{{PLURAL:$3|بعثت}}}} لك $1 و{{PLURAL:$3|مستخدم آخر|مستخدم آخر|مستخدمان آخران|$2 مستخدمين آخرين|$2 مستخدما آخر|$2 مستخدم آخر}} برسائل في صفحة نقاشك.',
	'notification-page-linked-email-batch-bundle-body' => '{{GENDER:$1|وضعت}} وصلة إلى $2 في $3 و{{PLURAL:$5|صفحة أخرى|صفحة أخرى|صفحتين أخريين|$4 صفحات أخرى|$4 صفحة أخرى}}.',
	'echo-email-batch-subject-daily' => 'لديك {{PLURAL:$2|إشعار جديد|إشعارات جديدة}} في {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'لديك {{PLURAL:$2|إشعار جديد|إشعارات جديدة}} في {{SITENAME}} هذا الأسبوع',
	'echo-email-batch-body-intro-daily' => 'سلام $1،
هذا ملخص لنشاطات اليوم في {{SITENAME}}.',
	'echo-email-batch-body-intro-weekly' => 'سلام $1،
هذا ملخص لنشاطات الأسبوع في {{SITENAME}}.',
	'echo-email-batch-link-text-view-all-notifications' => 'اعرض كل الإشعارات',
	'echo-rev-deleted-text-view' => 'هذه النسخة من الصفحة قد حذفت.',
);

/** Asturian (asturianu)
 * @author Xuacu
 */
$messages['ast'] = array(
	'echo-desc' => "Sistema d'avisos",
	'prefs-echo' => 'Avisos',
	'prefs-emailsettings' => 'Opciones de corréu',
	'prefs-displaynotifications' => 'Opciones de vista',
	'prefs-echosubscriptions' => "Avisame d'estos socesos",
	'prefs-newmessageindicator' => 'Indicador de mensaxe nuevu',
	'echo-pref-send-me' => 'Unviame:',
	'echo-pref-send-to' => 'Unviar a:',
	'echo-pref-email-format' => 'Formatu del corréu:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Corréu',
	'echo-pref-email-frequency-never' => 'Nun unviame avisos per corréu electrónicu',
	'echo-pref-email-frequency-immediately' => 'Avisos individuales según entren',
	'echo-pref-email-frequency-daily' => 'Un resume diariu de los avisos',
	'echo-pref-email-frequency-weekly' => 'Un resume selmanal de los avisos',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Testu simple',
	'echo-pref-notify-show-link' => 'Amosar los avisos na mio barra de ferramientes',
	'echo-pref-new-message-indicator' => "Amosar un indicador de mensaxe na páxina d'alderique na mio barra de ferramientes",
	'echo-learn-more' => 'Más información',
	'echo-new-messages' => 'Tien mensaxes nuevos',
	'echo-category-title-edit-user-talk' => "{{PLURAL:$1|Mensaxe|Mensaxes}} na páxina d'alderique",
	'echo-category-title-article-linked' => '{{PLURAL:$1|Enllaz|Enllaces}} a páxina',
	'echo-category-title-reverted' => "{{PLURAL:$1|Inversión|Inversiones}} d'edición",
	'echo-category-title-mention' => '{{PLURAL:$1|Mención|Menciones}}',
	'echo-category-title-other' => '{{PLURAL:$1|Otros}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistema}}',
	'echo-pref-tooltip-edit-user-talk' => "Avisame cuando alguién dexe un mensaxe na mio páxina d'alderique.",
	'echo-pref-tooltip-article-linked' => 'Avisame cuando alguién enllace dende un artículu a una páxina que yo creé.',
	'echo-pref-tooltip-reverted' => 'Avisame cuando alguién revierta una edición de mió, usando les ferramientes desfacer o revertir.',
	'echo-pref-tooltip-mention' => "Avisame cuando alguién enllace a la mio páxina d'usuariu dende una páxina d'alderique.",
	'echo-no-agent' => '[Naide]',
	'echo-no-title' => '[Ensin páxina]',
	'echo-error-no-formatter' => 'Nun se definió formatu dalu pal avisu',
	'echo-error-preference' => "Error: Nun pudo establecese la preferencia d'usuariu",
	'echo-error-token' => "Error: Nun pudo recuperase'l token d'usuariu",
	'notifications' => 'Avisos',
	'tooltip-pt-notifications' => 'Los sos avisos',
	'echo-specialpage' => 'Avisos',
	'echo-anon' => 'Pa recibir avisos, [$1 cree una cuenta] o [$2 anicie sesión].',
	'echo-none' => 'Nun tien avisos.',
	'echo-more-info' => 'Más información',
	'echo-feedback' => 'La so opinión',
	'notification-link-text-view-message' => 'Ver el mensaxe',
	'notification-link-text-view-mention' => 'Ver la mención',
	'notification-link-text-view-changes' => 'Ver los cambios',
	'notification-link-text-view-page' => 'Ver la páxina',
	'notification-link-text-view-edit' => 'Ver la edición',
	'notification-edit-talk-page2' => "[[User:$1|$1]] {{GENDER:$1|dexó}} un mensaxe na so [[User talk:$2#$3|páxina d'alderique]].",
	'notification-edit-talk-page-with-section' => "[[User:$1|$1]] {{GENDER:$1|dexó}} un mensaxe na so páxina d'alderique en [[User talk:$2#$3|$4]].",
	'notification-edit-talk-page-flyout2' => "$1 {{GENDER:$1|dexó}} un mensaxe na so [[User talk:$2#$3|páxina d'alderique]].",
	'notification-edit-talk-page-flyout-with-section' => "$1 {{GENDER:$1|dexó}} un mensaxe na so páxina d'alderique en «[[User talk:$2#$3|$4]]».",
	'notification-page-linked' => '[[:$2]] {{GENDER:$1|enllazóse}} dende [[:$3]]. [[Special:WhatLinksHere/$2|Ver tolos enllaces a esta páxina]].',
	'notification-page-linked-flyout' => '$2 {{GENDER:$1|enllazóse}} dende [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|comentó}} sobro "[[$3|$2]]" na páxina d\'alderique "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|amestó}} l\'asuntu nuevu "$2" en [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|unvió-y}} un mensaxe: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|comentó}} sobro "[[$3#$2|$2]]" na so páxina d\'alderique',
	'notification-mention' => '[[User:$1|$1]] fizo-y una {{GENDER:$1|mención}} nel alderique de $5 en «[[$3#$2|$4]]».',
	'notification-mention-flyout' => '$1 fizo-y una {{GENDER:$1|mención}} nel alderique de $5  en «[[$3#$2|$4]]».',
	'notification-mention-nosection' => "[[User:$1|$1]] {{GENDER:$1|mentó-y}} na [[$3|páxina d'alderique de $2]].",
	'notification-mention-nosection-flyout' => "$1 {{GENDER:$1|mentó-y}} na [[$3|páxina d'alderique de $2]].",
	'notification-user-rights' => "[[User:$1|$1]] [[Special:Log/rights/$1|{{GENDER:$1|camudó}}]] los sos permisos d'usuariu. $2. [[Special:ListGroupRights|Más información]]",
	'notification-user-rights-flyout' => "$1 {{GENDER:$1|camudó}} los sos permisos d'usuariu. $2. [[Special:ListGroupRights|Más información]]",
	'notification-user-rights-add' => "Agora ye miembru d'{{PLURAL:$2|esti grupu|estos grupos}}: $1",
	'notification-user-rights-remove' => "Dexó de ser miembru d'{{PLURAL:$2|esti grupu|estos grupos}}: $1",
	'notification-new-user' => '¡Damos-y la bienvenida a {{SITENAME}}, $1! Prestanos que tea equí.',
	'notification-reverted2' => '[[User:$1|$1]] {{GENDER:$1|invertió}} {{PLURAL:$4|la so edición|les sos ediciones}} en [[:$2]] $3',
	'notification-reverted-flyout2' => '$1 {{GENDER:$1|invertió}} {{PLURAL:$4|la so edición|les sos ediciones}} en $2 $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|dexó-y}} un mensaxe en {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => "$1 {{GENDER:$1|dexó}} un mensaxe na to páxina d'alderique:",
	'notification-edit-talk-page-email-batch-body-with-section' => "$1 {{GENDER:$1|dexó}} un mensaxe na so páxina d'alderique en «$2».",
	'notification-page-linked-email-subject' => "La so páxina enllazóse'n {{SITENAME}}",
	'notification-page-linked-email-batch-body' => '$2 {{GENDER:$1|enllazóse}} dende $3',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Desfizose la so edición|Desficieronse les sos ediciones}} {{GENDER:$1|en}} {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '$1 {{GENDER:$1|desfizo}} {{PLURAL:$3|la so edición|les sos ediciones}} en $2',
	'notification-mention-email-subject' => '$1 fizo-y una {{GENDER:$1|mención}} en {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 fizo-y una {{GENDER:$1|mención}} nel alderique de $4 en «$3».',
	'notification-mention-nosection-email-batch-body' => "$1 {{GENDER:$1|mentó-y}} na páxina d'alderique de $2.",
	'notification-user-rights-email-subject' => "Camudaron los sos permisos d'usuariu en {{SITENAME}}",
	'notification-user-rights-email-batch-body' => "$1 {{GENDER:$1|camudó}} los sos permisos d'usuariu. $2",
	'echo-email-subject-default' => 'Nuevu avisu en {{SITENAME}}',
	'echo-email-body-default' => 'Tien un nuevu avisu en {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Tien un nuevu avisu',
	'echo-email-footer-default' => '$2

Pa controlar los correos que-y unviamos, compruebe les sos preferencies:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Pa controlar los correos electrónicos que-y unviamos, <a href="$2" style="text-decoration:none; color: #3868B0;">compruebe les sos preferencies</a>.<br />
$1',
	'echo-overlay-link' => 'Tolos avisos',
	'echo-overlay-title' => '<b>Avisos</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Avisu|Avisos}}</b> (amosando $1 de $2 ensin lleer)',
	'echo-mark-all-as-read' => 'Marcar too como lleío',
	'echo-date-today' => 'Güei',
	'echo-date-yesterday' => 'Ayeri',
	'echo-load-more-error' => 'Hubo un error al descargar más resultaos.',
	'notification-edit-talk-page-bundle' => "$1 y {{PLURAL:$4|otra persona|otres $3 persones}} {{GENDER:$1|dexaron}} un mensaxe na so [[User talk:$2|páxina d'alderique]].",
	'notification-page-linked-bundle' => '$2 {{GENDER:$1|enllazóse}} dende $3 y $4 {{PLURAL:$5|páxina|páxines}} más. [[Special:WhatLinksHere/$2|Ver tolos enllaces a esta páxina]]',
	'notification-edit-user-talk-email-batch-bundle-body' => "$1 y {{PLURAL:$3|otra persona|otres $2 persones}} {{GENDER:$1|dexaron}} un mensaxe na so páxina d'alderique",
	'notification-page-linked-email-batch-bundle-body' => '$2 {{GENDER:$1|enllazóse}} dende $3 y {{PLURAL:$5|otra páxina|otres $4 páxines}}',
	'echo-email-batch-subject-daily' => 'Tien {{PLURAL:$2|un avisu nuevu|avisos nuevos}} en {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Tien {{PLURAL:$2|un avisu nuevu|avisos nuevos}} en {{SITENAME}} esta selmana',
	'echo-email-batch-body-intro-daily' => 'Hola, $1:
Esti ye un resume personal de la actividá de güei en {{SITENAME}}.',
	'echo-email-batch-body-intro-weekly' => 'Hola, $1:
Esti ye un resume personal de la actividá selmanal en {{SITENAME}}.',
	'echo-email-batch-link-text-view-all-notifications' => 'Ver toles notificaciones',
	'echo-rev-deleted-text-view' => 'Esta revisión de páxina ta encaboxada',
);

/** Azerbaijani (azərbaycanca)
 * @author Interfase
 */
$messages['az'] = array(
	'echo-desc' => 'Bildiriş sistemi',
	'prefs-echo' => 'Bildirişlər',
	'prefs-emailsettings' => 'Elektron poçtun parametrləri',
	'prefs-displaynotifications' => 'Displeyin parametrləri',
	'echo-pref-send-me' => 'Mənə göndər:',
	'echo-pref-send-to' => 'Göndər',
	'notifications' => 'Bildirişlər',
	'tooltip-pt-notifications' => 'Sizin bildirişləriniz',
	'echo-specialpage' => 'Bildirişlər',
	'echo-none' => 'Sizə bildiriş yoxdur',
	'echo-more-info' => 'Daha ətraflı',
	'echo-feedback' => 'Rəy',
	'notification-link-text-view-message' => 'Məktuba bax',
	'notification-link-text-view-mention' => 'Qeydə bax',
	'notification-link-text-view-changes' => 'Dəyişiklərə bax',
	'notification-link-text-view-page' => 'Səhifəyə bax',
	'notification-link-text-view-edit' => 'Redaktəyə bax',
	'echo-email-body-default' => 'Sizə {{SITENAME}} səhifəsində yeni bildiriş var :

$1',
	'echo-email-batch-body-default' => 'Sizə yeni bildiriş var',
	'echo-overlay-link' => 'Bütün bildirişlər',
	'echo-overlay-title' => '<b>Bildirişlər</b>',
	'echo-overlay-title-overflow' => '<b>Bildirişlər</b> $2 {{PLURAL|$2|oxunmamış|oxunmamışlar}})dan $1 ({{PLURAL|$1|göstərilib|göstəriliblər}}', # Fuzzy
	'echo-mark-all-as-read' => 'Hamısını oxunmuş kimi qeyd et',
	'echo-date-today' => 'Bugün',
	'echo-date-yesterday' => 'Dünən',
);

/** South Azerbaijani (تورکجه)
 * @author Mousa
 */
$messages['azb'] = array(
	'echo-desc' => 'بیلدیریش سیستِمی',
	'prefs-echo' => 'بیلدیریلر',
	'prefs-displaynotifications' => 'گؤرونتو سئچَنکلری',
	'echo-pref-email-frequency-never' => 'منه هئچ بیلدیری ایمیلی گؤندرمه',
	'echo-pref-email-frequency-immediately' => 'آیری آیری هر بیلدیری گلنده',
	'echo-pref-email-frequency-daily' => 'گونلوک بیلدیریلرین بیر خولاصه‌سی',
	'echo-pref-email-frequency-weekly' => 'هفته‌لیک بیلدیریلرین بیر خولاصه‌سی',
	'echo-no-agent' => '[هئچ کیمسه]',
	'echo-no-title' => '[هئچ صحیفه]',
	'echo-error-no-formatter' => 'بیلدیری اوچون بیر فورمت تعریفی یوخدور',
	'notifications' => 'بیلدیریلر',
	'echo-specialpage' => 'منیم بیلدیریلریم', # Fuzzy
	'echo-anon' => 'بیلدیریلری آلماق اوچون، [$1 بیر حساب یارادین] یادا [$2 گیریش ائدین].',
	'echo-none' => 'سیزین بیلدیرینیز یوخدور.',
	'notification-new-user' => '{{SITENAME}}-ه خوش گلمیسینیز، $1!', # Fuzzy
	'echo-email-subject-default' => '{{SITENAME}}-ده یئنی بیلدیری',
	'echo-email-body-default' => 'سیزین {{SITENAME}}-ده یئنی بیلدیرینیز واردیر:

$1',
	'echo-email-footer-default' => '$2

سیزه هانکی ایمیل‌لرین گله بیله‌جگینی دَییشمگه، باخین:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1', # Fuzzy
	'echo-overlay-link' => 'بوتون بیلدیریلر',
	'echo-overlay-title' => 'منیم بیلدیریلریم', # Fuzzy
	'echo-overlay-title-overflow' => 'منیم بیلدیریلریم ($2 اوخونمامیشدان $1-ی گؤستریلیر)', # Fuzzy
	'echo-date-today' => 'بوگون',
	'echo-date-yesterday' => 'دونن',
	'echo-load-more-error' => 'آرتیق نتیجه‌لری گتیرنده بیر خطا قاباغا گلدی.',
	'echo-email-batch-subject-daily' => 'سیزین بوگون $1 {{PLURAL:$2|بیلدیرینیز}} واردیر', # Fuzzy
	'echo-email-batch-subject-weekly' => 'سیزین بو هفته $1 {{PLURAL:$2|بیلدیرینیز}} واردیر', # Fuzzy
);

/** Bashkir (башҡортса)
 * @author Ләйсән
 */
$messages['ba'] = array(
	'prefs-echo' => 'Белдереүҙәр',
	'notifications' => 'Белдереүҙәр',
	'tooltip-pt-notifications' => 'Һеҙҙең белдереүҙәр',
	'echo-specialpage' => 'Минең белдереүҙәр', # Fuzzy
	'echo-overlay-link' => 'Бөтә белдереүҙәр',
	'echo-overlay-title' => 'Минең белдереүҙәр', # Fuzzy
);

/** Batak Toba (Batak Toba)
 * @author WBT001Erin
 */
$messages['bbc-latn'] = array(
	'echo-category-title-article-linked' => 'Alaman pangait', # Fuzzy
	'notification-edit-user-talk-email-batch-bundle-body' => 'alaman panghataion', # Fuzzy
	'notification-page-linked-email-batch-bundle-body' => 'alaman/alamanalaman', # Fuzzy
);

/** Belarusian (беларуская)
 * @author Дзяніс Тутэйшы
 * @author Чаховіч Уладзіслаў
 */
$messages['be'] = array(
	'echo-desc' => 'Сістэма паведамленняў',
	'prefs-echo' => 'Паведамленні',
	'prefs-emailsettings' => 'Настройкі эл. пошты',
	'prefs-displaynotifications' => 'Настройкі адлюстравання',
	'prefs-echosubscriptions' => 'Паведамляць мне пра гэтыя падзеі',
	'prefs-newmessageindicator' => 'Індыкатар новага паведамлення',
	'echo-pref-send-me' => 'Дасылаць мне:',
	'echo-pref-send-to' => 'Дасылаць да:',
	'echo-pref-email-format' => 'Фармат e-mail:',
	'echo-pref-web' => 'Праз сайт',
	'echo-pref-email' => 'Эл.пошта',
	'echo-pref-email-frequency-never' => 'Не дасылаць мне паведамленні па эл. пошце',
	'echo-pref-email-frequency-immediately' => 'Асобныя паведамленні па меры іх паступлення',
	'echo-pref-email-frequency-daily' => 'Штодзённы агляд паведамленняў',
	'echo-pref-email-frequency-weekly' => 'Штотыдневы агляд паведамленняў',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Просты тэкст',
	'echo-pref-notify-show-link' => 'Паказаць паведамленні ў маёй панэлі інструментаў',
	'echo-pref-new-message-indicator' => 'Паказаць у маёй панэлі інструментаў індыкатар паведамленняў на старонцы абмеркавання',
	'echo-learn-more' => 'Даведацца больш',
	'echo-new-messages' => 'У вас ёсць новыя паведамленні', # Fuzzy
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|паведамленне|паведамленні}} на старонцы размоў',
	'echo-category-title-article-linked' => '{{PLURAL:$1|спасылка|спасылкі}} на старонкі',
	'echo-category-title-reverted' => '{{PLURAL:$1|адмена|адмены}} правак',
	'echo-category-title-mention' => '{{PLURAL:$1|згадванне|згадванні}}',
	'echo-category-title-other' => '{{PLURAL:$1|іншае|іншыя}}',
	'echo-category-title-system' => '{{PLURAL:$1|сістэмнае|сістэмныя}}',
	'echo-pref-tooltip-edit-user-talk' => 'Паведамляць мне, калі хтосьці пакідае паведамленне ці адказвае на маёй старонцы размоў.',
	'echo-pref-tooltip-article-linked' => 'Паведамляць мне, калі хтосьці спасылаецца ў артыкулах на створаную мной старонку',
	'echo-pref-tooltip-reverted' => 'Паведамляць мне, калі хтосьці адмяніў маю праўку, выкарыстаўшы функцыю адмены ці адкату.',
	'echo-pref-tooltip-mention' => 'Паведамляць мне, калі хтосьці высылаецца на маю старонку ўдзельніка з любой старонкі размоў.',
	'echo-no-agent' => '[Ніхто]',
	'echo-no-title' => '[Няма старонкі]',
	'echo-error-no-formatter' => 'Фарматаванне не вызначана для паведамлення',
	'echo-error-preference' => 'Памылка: Не ўдалося задаць настройкі ўдзельніка',
	'echo-error-token' => 'Памылка: не ўдалося атрымаць маркер удзельніка (user token)',
	'notifications' => 'Паведамленні',
	'tooltip-pt-notifications' => 'Вашы паведамленні',
	'echo-specialpage' => 'Паведамленні',
	'echo-anon' => 'Каб атрымліваць паведамленні, [$1 стварыце ўліковы запіс] ці [$2 прадстаўцеся].',
	'echo-none' => 'Вы не атрымлівалі паведамленняў.',
	'echo-more-info' => 'Больш падрабязна',
	'echo-feedback' => 'Зваротная сувязь',
	'notification-link-text-view-message' => 'Прагляд паведамленняў',
	'notification-link-text-view-mention' => 'Прагляд згадкі',
	'notification-link-text-view-changes' => 'Прагляд змен',
	'notification-link-text-view-page' => 'Прагляд старонкі',
	'notification-link-text-view-edit' => 'Прагляд праўкі',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|пакінуў|пакінула}} паведамленне на вашай [[User talk:$2#$3|старонцы размоў]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|пакінуў|пакінула}} паведамленне на вашай старонцы размоў "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|пакінуў|пакінула}} паведамленне на вашай [[User talk:$2#$3|старонцы размоў]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|пакінуў|пакінула}} паведамленне на вашай старонцы размоў "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => '[[:$2]] была {{GENDER:$1|звязана}} з [[:$3]]. [[Special:WhatLinksHere/$2|Гл. усе спасылкі на гэту старонку]].',
	'notification-page-linked-flyout' => '$2 была {{GENDER:$1|звязана}} з [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|пракаментаваў|пракаментавала}} тэму "[[$3|$2]]" на старонцы размоў "$4".',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|дадаў|дадала}} новую тэму "$2" на старонцы [[$3]].',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|адправіў|адправіла}} вам паведамленне: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|пракаментаваў|пракаментавала}} тэму "[[$3#$2|$2]]" на вашай старонцы размоў.',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|згадаў|згадала}} вас на старонцы размоў $5 у раздзеле "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 {{GENDER:$1|згадаў|згадала}} вас на старонцы размоў $5 у раздзеле "[[$3#$2|$4]]".',
	'notification-user-rights' => 'Вашы правы карыстальніка [[Special:Log/rights/$1|{{GENDER:$1|змяніў|змяніла}}]] [[User:$1|$1]]. $2. [[Special:ListGroupRights|Падрабязней]]',
	'notification-user-rights-flyout' => 'Вашы правы карыстальніка [[Special:Log/rights/$1|{{GENDER:$1|змяніў|змяніла}}]] [[User:$1|$1]]. $2. [[Special:ListGroupRights|Падрабязней]]', # Fuzzy
	'notification-user-rights-add' => 'Правы карыстальніка {{GENDER:$1|змяніў|змяніла}} $1. $2. [[Special:ListGroupRights|Падрабязней]]', # Fuzzy
	'notification-user-rights-remove' => 'Зараз вы ўваходзіце ў {{PLURAL:$2|наступную групу|наступныя групы}}: $1',
	'notification-new-user' => 'Вы больш не ўваходзіце ў {{PLURAL:$2|наступную групу|наступныя групы}}: $1', # Fuzzy
	'notification-reverted2' => 'Вітаем у {{GRAMMAR:месны|{{SITENAME}}}}, $1! Мы радыя бачыць Вас.', # Fuzzy
	'notification-reverted-flyout2' => '{{PLURAL:$4|Вашу праўку на станіцы [[:$2]]|Вашы праўкі на старонцы [[:$2]]}} {{GENDER:$1|адмяніў|адмяніла}} [[User:$1|$1]]. $3', # Fuzzy
	'notification-edit-talk-page-email-subject2' => '{{GENDER:$1|Удзельнік|Удзельніца}} $1 {{GENDER:$1|пакінуў|пакінула}} вам паведамленне на сайце «{{SITENAME}}»',
	'notification-edit-talk-page-email-batch-body2' => '{{GENDER:$1|Удзельнік|Удзельніца}} $1 {{GENDER:$1|пакінуў|пакінула}} паведамленне на вашай старонцы размоў:',
	'notification-edit-talk-page-email-batch-body-with-section' => '{{GENDER:$1|Удзельнік|Удзельніца}} $1 {{GENDER:$1|пакінуў|пакінула}} вам паведамленне на вашай старонцы размоў у раздзеле (тэме) «$2»',
	'notification-page-linked-email-subject' => "На сайце «{{SITENAME}}» з'явілася спасылка на вашу старонку ўдзельніка",
	'notification-page-linked-email-batch-body' => '{{GENDER:$1|Удзельнік|удзельніца}} $1 {{GENDER:$1|спаслаўся|спаслалася}} на $2 з $3',
	'notification-reverted-email-subject2' => '{{GENDER:$1|Хтосьці}} адмяніў {{PLURAL:$3|вашу праўку|вашы праўкі}} на сайце «{{SITENAME}}»',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Ваша праўка на старонцы «$2» была адменена|Вашы праўкі на старонцы «$2» былі адменены}} {{GENDER:$1|ўдзельнікам|ўдзельніцай}} $1.',
	'notification-mention-email-subject' => '{{GENDER:$1|Удзельнік|Удзельніца}} $1 {{GENDER:$1|згадаў|згадала}} вас на сайце «{{SITENAME}}»',
	'notification-mention-email-batch-body' => '{{GENDER:$1|Удзельнік|Удзельніца}} $1 {{GENDER:$1|згадаў|згадала}} вас на старонцы размоў $4 на сайце «$3».',
	'notification-user-rights-email-subject' => 'Вашы правы на сайце «{{SITENAME}}» былі зменены',
	'notification-user-rights-email-batch-body' => 'Вашы правы былі зменены {{GENDER:$1|ўдзельнікам|ўдзельніцай}} $1. $2.',
	'echo-email-subject-default' => 'Новыя паведамленні на сайце «{{SITENAME}}»',
	'echo-email-body-default' => 'У вас ёсць новае паведамленне на сайце «{{SITENAME}}»: $1',
	'echo-email-batch-body-default' => 'У вас ёсць новае паведамленне',
	'echo-email-footer-default' => '$2 Для кантролю за тым, якія паведамленні адпраўляюцца вам па эл. пошце, праверце свае персанальныя настройкі: {{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}} $1',
	'echo-email-footer-default-html' => 'Для кантролю за тым, якія паведамленні адпраўляюцца вам па эл. пошце, <a href="$2" style="text-decoration:none; color: #3868B0;">праверце свае персанальныя настройкі</a><br /> $1',
	'echo-overlay-link' => 'Усе паведамленні',
	'echo-overlay-title' => '<b>Паведамленні</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Паведамленні}}</b> ({{PLURAL|$1|паказана|паказаны}} $1 з $2 {{PLURAL|$2|непрачытанага|непрачытаных}})',
	'echo-mark-all-as-read' => 'Пазначыць усе як прачытаныя',
	'echo-date-today' => 'Сёння',
	'echo-date-yesterday' => 'Учора',
	'echo-load-more-error' => 'Адбылася памылка пры атрыманні дадатковых вынікаў.',
	'notification-edit-talk-page-bundle' => '$1 і $3 {{PLURAL:$4|іншы|іншых}} {{PLURAL:$4|ўдзельнік|удзельнікаў}} пакінулі паведамленне на вашай [[User talk:$2|старонцы размоў]].',
	'notification-page-linked-bundle' => 'На старонку «$2» ёсць {{GENDER:$1|спасылка}} са старонкі «$3» і яшчэ $4 {{PLURAL:$5|старонкі|старонак}}. [[Special:WhatLinksHere/$2|Гл. усе спасылкі на гэту старонку]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 і $2 {{PLURAL:$3|іншы|іншых}} {{PLURAL:$3|ўдзельнік|удзельнікаў}} пакінулі паведамленне на вашай старонцы размоў.',
	'notification-page-linked-email-batch-bundle-body' => 'На старонку «$2» ёсць {{GENDER:$1|спасылка}} са старонкі «$3» і яшчэ $4 {{PLURAL:$5|старонкі|старонак}}',
	'echo-email-batch-subject-daily' => 'Вы атрымалі $2 {{PLURAL:$2|новае паведамленне ў|новых паведамлення ў|новых паведамленняў у}} праекце «{{SITENAME}}»',
	'echo-email-batch-subject-weekly' => 'На гэтым тыдні вы атрымалі $2 {{PLURAL:$2|новае паведамленне ў|новых паведамлення ў|новых паведамленняў у}} праекце «{{SITENAME}}»',
	'echo-email-batch-body-intro-daily' => 'Прывітанне, $1! Вось кароткі агляд сённяшняй дзейнасці ў {{SITENAME}} для вас.',
	'echo-email-batch-body-intro-weekly' => 'Прывітанне, $1! Вось кароткі тыднёвы агляд дзейнасці ў {{SITENAME}} для вас.',
	'echo-email-batch-link-text-view-all-notifications' => 'Праглядзець усе паведамленні',
	'echo-rev-deleted-text-view' => 'Гэта версія старонкі была схавана',
);

/** Belarusian (Taraškievica orthography) (беларуская (тарашкевіца)‎)
 * @author Base
 * @author Renessaince
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'echo-desc' => 'Сыстэма апавяшчэньняў',
	'prefs-echo' => 'Абвесткі',
	'prefs-emailsettings' => 'Налады e-mail',
	'prefs-displaynotifications' => 'Налады паказу',
	'prefs-echosubscriptions' => 'Паведамляць мне пра гэтыя падзеі',
	'prefs-newmessageindicator' => 'Індыкатар новых паведамленьняў',
	'echo-pref-send-me' => 'Даслаць мне:',
	'echo-pref-send-to' => 'Даслаць да:',
	'echo-pref-email-format' => 'Фармат e-mail:',
	'echo-pref-web' => 'Праз сайт',
	'echo-pref-email' => 'Праз пошту',
	'echo-pref-email-frequency-never' => 'Не дасылаць мне абвестак праз e-mail',
	'echo-pref-email-frequency-immediately' => 'Асобна кожнае, калі зьяўляецца',
	'echo-pref-email-frequency-daily' => 'Штодзённая зборка абвестак',
	'echo-pref-email-frequency-weekly' => 'Штотыднёвая зборка абвестак',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Просты тэкст',
	'echo-pref-notify-show-link' => 'Паказваць апавяшчэньні ў маёй панэлі',
	'echo-pref-new-message-indicator' => 'Паказваць індыкатар паведамленьняў на старонцы гутарак у маёй панэлі',
	'echo-learn-more' => 'Даведацца болей',
	'echo-new-messages' => 'Вы маеце новыя паведамленьні', # Fuzzy
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|1=Паведамленьне ў|Паведамленьні ў}} гутарках', # Fuzzy
	'echo-category-title-article-linked' => '{{PLURAL:$1|1=Спасылка|Спасылкі}} на старонку', # Fuzzy
	'echo-category-title-reverted' => '{{PLURAL:$1|1=Адкат праўкі|Адкаты правак}}', # Fuzzy
	'echo-category-title-mention' => '{{PLURAL:$1|1=Згадваньне|Згадваньні}}', # Fuzzy
	'echo-category-title-other' => '{{PLURAL:$1|1=Іншае|Іншыя}}', # Fuzzy
	'echo-category-title-system' => '{{PLURAL:$1|1=Сыстэмнае|Сыстэмныя}}', # Fuzzy
	'echo-pref-tooltip-edit-user-talk' => 'Паведамляць, калі нехта дасылае паведамленьне на маю старонку гутарак.',
	'echo-pref-tooltip-article-linked' => 'Паведамляць, калі нехта спасылаецца на створаную мной старонку зь іншага артыкула.',
	'echo-pref-tooltip-reverted' => 'Паведамляць, калі нехта адкатвае зробленую мной праўку.',
	'echo-pref-tooltip-mention' => 'Паведамляць, калі нехта спасылаецца на маю старонку ўдзельніка зь нейкай старонкі абмеркаваньня.',
	'echo-no-agent' => '[Ніхто]',
	'echo-no-title' => '[Няма старонкі]',
	'echo-error-no-formatter' => 'Фарматаваньне для абвестак ня вызначана',
	'echo-error-preference' => 'Памылка: не ўдалося захаваць наладу',
	'echo-error-token' => 'Памылка: не ўдалося атрымаць токен удзельніка',
	'notifications' => 'Абвесткі',
	'tooltip-pt-notifications' => 'Вашыя абвесткі',
	'echo-specialpage' => 'Абвесткі',
	'echo-anon' => 'Для атрыманьня абвестак [$1 стварыце рахунак] або [$2 увайдзіце].',
	'echo-none' => 'Вы ня маеце абвестак.',
	'echo-more-info' => 'Болей',
	'echo-feedback' => 'Водгук',
	'notification-link-text-view-message' => 'Праглядзець паведамленьне',
	'notification-link-text-view-mention' => 'Праглядзець згадваньне',
	'notification-link-text-view-changes' => 'Праглядзець зьмены',
	'notification-link-text-view-page' => 'Праглядзець старонку',
	'notification-link-text-view-edit' => 'Праглядзець праўку',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|пакінуў|пакінула}} паведамленьне на Вашай [[User talk:$2#$3|старонцы гутарак]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|пакінуў|пакінула}} паведамленьне на вашай старонцы гутарак у «[[User talk:$2#$3|$4]]».',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|пакінуў|пакінула}} паведамленьне на Вашай [[User talk:$2#$3|старонцы гутарак]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|пакінуў|пакінула}} паведамленьне на вашай старонцы гутарак у «[[User talk:$2#$3|$4]]».',
	'notification-page-linked' => 'На [[:$2]] {{GENDER:$1|спаслаліся}} з [[:$3]]. [[Special:WhatLinksHere/$2|усе спасылкі на гэтую старонку]].',
	'notification-page-linked-flyout' => 'На $2 {{GENDER:$1|спаслаліся}} з [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|пакінуў|пакінула}} камэнтар у тэме «[[$3|$2]]» на старонцы абмеркаваньня «$4»',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|стварыў|стварыла}} новую тэму «$2» у [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|даслаў|даслала}} Вам паведамленьне: «[[$3#$2|$2]]»',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|пакінуў|пакінула}} камэнтар у тэме «[[$3#$2|$2]]» на вашай старонцы гутарак',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|згадаў|згадала}} Вас на старонцы размоваў $5 у «[[$3#$2|$4]]».',
	'notification-mention-flyout' => '$1 {{GENDER:$1|згадаў|згадала}} Вас на старонцы абмеркаваньня $5 у «[[$3#$2|$4]]».',
	'notification-user-rights' => '[[User:$1|$1]] [[Special:Log/rights/$1|{{GENDER:$1|зьмяніў|зьмяніла}}]] Вашыя правы. $2. [[Special:ListGroupRights|Даведайцеся болей]]',
	'notification-user-rights-flyout' => '$1 {{GENDER:$1|зьмяніў|зьмяніла}} вашыя правы. $2. [[Special:ListGroupRights|Даведайцеся больш]]',
	'notification-user-rights-add' => 'Цяпер Вы ўваходзіце ў {{PLURAL:$2|1=гэтую групу|гэтыя групы}}: $1', # Fuzzy
	'notification-user-rights-remove' => 'Цяпер вы не ўваходзіце ў {{PLURAL:$2|1=гэтую групу|гэтыя групы}}: $1', # Fuzzy
	'notification-new-user' => 'Вітаем у {{GRAMMAR:месны|{{SITENAME}}}}, $1! Мы радыя бачыць Вас.',
	'notification-reverted2' => '{{PLURAL:$4|1=Вашая праўка|Вашыя праўкі}} на старонцы [[:$2]] {{GENDER:$1|скасаваў|скасавала}} [[User:$1|$1]]. $3', # Fuzzy
	'notification-reverted-flyout2' => '$1 {{GENDER:$1|скасаваў|скасавала}} {{PLURAL:$4|1=Вашую праўку|Вашыя праўкі}} на старонцы $2. $3', # Fuzzy
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|пакінуў|пакінула}} Вам паведамленьне на {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|пакінуў|пакінула}} Вам паведамленьне на старонцы абмеркаваньня:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|пакінуў|пакінула}} паведамленьне на Вашай старонцы гутарак у «$2».',
	'notification-page-linked-email-subject' => 'На вашую старонку спаслаліся ў {{GRAMMAR:месны|{{SITENAME}}}}',
	'notification-page-linked-email-batch-body' => 'На $2 {{GENDER:$1|спаслаліся}} з $3.',
	'notification-reverted-email-subject2' => '$1 {{GENDER:$1|скасаваў|скасавала}} {{PLURAL:$3|1=Вашую праўку|Вашыя праўкі}} на {{SITENAME}}', # Fuzzy
	'notification-reverted-email-batch-body2' => '$1 {{GENDER:$1|скасаваў|скасавала}} {{PLURAL:$3|1=Вашую праўку|Вашыя праўкі}} ў «$2».', # Fuzzy
	'notification-mention-email-subject' => '$1 {{GENDER:$1|згадаў|згадала}} Вас у {{GRAMMAR:месны|{{SITENAME}}}}',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|згадаў|згадала}} Вас на старонцы абмеркаваньня $4 у «$3».',
	'notification-user-rights-email-subject' => 'Вашыя правы ў {{GRAMMAR:месны|{{SITENAME}}}} былі зьмененыя',
	'notification-user-rights-email-batch-body' => '$1 {{GENDER:$1|зьмяніў|зьмяніла}} Вашыя правы. $2',
	'echo-email-subject-default' => 'Новая абвестка ад {{GRAMMAR:родны|{{SITENAME}}}}',
	'echo-email-body-default' => 'Для Вас ёсьць новая абвестка ў {{GRAMMAR:месны|{{SITENAME}}}}:

$1',
	'echo-email-batch-body-default' => 'Вы маеце новую абвестку',
	'echo-email-footer-default' => '$2

Каб выбраць, якія лісты мы дасылацьмем Вам, наведайце свае налады:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Каб абраць лісты, якія Вы жадаеце атрымліваць, <a href="$2" style="text-decoration:none; color: #3868B0;">праверце свае налады</a>.<br />
$1',
	'echo-overlay-link' => 'Усе абвесткі',
	'echo-overlay-title' => '<b>Абвесткі</b>',
	'echo-overlay-title-overflow' => '<b>Абвесткі</b> (паказаныя $1 з $2 непрачытаных)', # Fuzzy
	'echo-mark-all-as-read' => 'Пазначыць усё як прачытанае',
	'echo-date-today' => 'Сёньня',
	'echo-date-yesterday' => 'Учора',
	'echo-load-more-error' => 'Узьнікла памылка ў час атрыманьня дадатковых вынікаў.',
	'notification-edit-talk-page-bundle' => '$1 і $3 {{PLURAL:$4|1=іншы|іншыя}} {{GENDER:$1|пакінуў|пакінула}} паведамленьне на Вашай [[User talk:$2|старонцы гутарак]].', # Fuzzy
	'notification-page-linked-bundle' => '$1 {{GENDER:$1|дадаў|дадала}} спасылку на $2 на старонцы $3 і {{PLURAL:$5|1=іншай старонцы|$4 іншых старонках}}. [[Special:WhatLinksHere/$2|Глядзіце ўсе спасылкі на гэтую старонку]]', # Fuzzy
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 і $2 {{PLURAL:$3|1=іншы|іншых}} {{GENDER:$1|пакінуў|пакінула}} паведамленьне на Вашай старонцы гутарак.', # Fuzzy
	'notification-page-linked-email-batch-bundle-body' => '$1 {{GENDER:$1|дадаў|дадала}} спасылку на $2 на старонцы $3 і яшчэ $4 {{PLURAL:$5|1=старонкі|старонак}}.', # Fuzzy
	'echo-email-batch-subject-daily' => 'Вы атрымалі {{PLURAL:$2|новую абвестку|новыя абвесткі|новых абвестак}} на {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'На гэтым тыдні Вы атрымалі {{PLURAL:$2|новую абвестку|новыя абвесткі|новых абвестак}} на {{SITENAME}}',
	'echo-email-batch-body-intro-daily' => 'Вітаем, $1!
Вось агляд сёньняшняй актыўнасьці ў {{GRAMMAR:месны|{{SITENAME}}}} для Вас.',
	'echo-email-batch-body-intro-weekly' => 'Вітаем, $1!
Вось тыднёвы агляд актыўнасьці ў {{GRAMMAR:месны|{{SITENAME}}}} для вас.',
	'echo-email-batch-link-text-view-all-notifications' => 'Праглядзець усе абвесткі',
	'echo-rev-deleted-text-view' => 'Гэтая вэрсія старонкі была схаваная.',
);

/** Bulgarian (български)
 * @author Aceofhearts1968
 * @author DCLXVI
 * @author Termininja
 */
$messages['bg'] = array(
	'echo-desc' => 'Система за известия',
	'prefs-echo' => 'Известия',
	'prefs-emailsettings' => 'Настройки за е-поща',
	'prefs-displaynotifications' => 'Настройки за показване',
	'prefs-echosubscriptions' => 'Получаване на известие за следните събития',
	'prefs-newmessageindicator' => 'Индикатор за ново съобщение',
	'echo-pref-send-me' => 'Съдържание на е-писмата:',
	'echo-pref-send-to' => 'Адрес за получаване:',
	'echo-pref-email-format' => 'Формат на е-писмата:',
	'echo-pref-web' => 'Уеб',
	'echo-pref-email' => 'Е-поща',
	'echo-pref-email-frequency-never' => 'Без изпращане на известия по е-поща',
	'echo-pref-email-frequency-immediately' => 'Известие за всяко отделно събитие',
	'echo-pref-email-frequency-daily' => 'Дневно резюме на известията',
	'echo-pref-email-frequency-weekly' => 'Седмично резюме на известията',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'обикновен текст',
	'echo-pref-notify-show-link' => 'Показване на известията в лентата с моите инструменти',
	'echo-pref-new-message-indicator' => 'Показване на индикатор за съобщения на беседата в лентата с моите инструменти',
	'echo-learn-more' => 'Повече подробности',
	'echo-new-messages' => 'Имате нови съобщения',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Съобщение|Съобщения}} на беседата',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Препратка|Препратки}} към страницата',
	'echo-category-title-reverted' => '{{PLURAL:$1|Връщане|Връщания}} на редакция',
	'echo-category-title-mention' => '{{PLURAL:$1|Споменаване|Споменавания}}',
	'echo-category-title-other' => '{{PLURAL:$1|Други}}',
	'echo-category-title-system' => '{{PLURAL:$1|Системни известия}}',
	'echo-pref-tooltip-edit-user-talk' => 'Получаване на известие в случаите, когато някой остави съобщение или отговор на беседата ми.',
	'echo-pref-tooltip-article-linked' => 'Получаване на известие в случаите, когато някой постави препратка към създадена от мен страница.',
	'echo-pref-tooltip-reverted' => 'Получаване на известие в случаите, когато някой премахне или отмени моя редакция.',
	'echo-pref-tooltip-mention' => 'Получаване на известие в случаите, когато някой постави препратка към потребителската ми страница на друга беседа.',
	'echo-no-agent' => '[Никой]',
	'echo-no-title' => '[Няма страница]',
	'echo-error-no-formatter' => 'Не е посочено форматиране на известията.',
	'echo-error-preference' => 'Грешка: Потребителските предпочитания не бяха съхранени.',
	'notifications' => 'Известия',
	'tooltip-pt-notifications' => 'Вашите известия',
	'echo-specialpage' => 'Известия',
	'echo-anon' => 'За получаване на известия е необходимо да [$1 регистрирате сметка] или [$2 влезте] в системата.',
	'echo-none' => 'Нямате известия.',
	'echo-more-info' => 'Повече информация',
	'echo-feedback' => 'Обратна връзка',
	'notification-link-text-view-message' => 'Преглед на известието',
	'notification-link-text-view-mention' => 'Преглед на споменаването',
	'notification-link-text-view-changes' => 'Преглед на промените',
	'notification-link-text-view-page' => 'Преглед на страницата',
	'notification-link-text-view-edit' => 'Преглед на редакцията',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|остави}} съобщение на Вашата [[User talk:$2#$3|беседа]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|остави}} съобщение на Вашата беседа „[[User talk:$2#$3|$4]]“.',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|остави}} съобщение на Вашата [[User talk:$2#$3|беседа]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|остави}} съобщение на Вашата беседа „[[User talk:$2#$3|$4]]“.',
	'notification-new-user' => 'Добре дошли в {{SITENAME}}, $1! Радостно е, че сте сред нас.',
	'notification-user-rights-email-subject' => 'Потребителските ви права в {{SITENAME}} бяха променени',
	'echo-email-subject-default' => 'Ново известие в {{SITENAME}}',
	'echo-email-body-default' => 'Имате ново известие в {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Имате ново известие.',
	'echo-overlay-link' => 'Всички известия',
	'echo-overlay-title' => '<b>Известия</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Известия}}</b> (показване на $1 от $2 непрочетени))', # Fuzzy
	'echo-mark-all-as-read' => 'Отбелязване на всички като прочетени',
	'echo-date-today' => 'Днес',
	'echo-date-yesterday' => 'Вчера',
	'echo-load-more-error' => 'Възникна грешка при извличане на още резултати.',
	'echo-email-batch-subject-daily' => 'Имате {{PLURAL:$2|ново известие|нови известия}} в {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Имате {{PLURAL:$2|ново известие|нови известия}} в {{SITENAME}} от тази седмица',
	'echo-email-batch-body-intro-daily' => 'Здравейте $1,
По-долу е показано резюме на активността в {{SITENAME}} за днес.',
	'echo-email-batch-body-intro-weekly' => 'Здравейте $1,
По-долу е показано резюме на активността в {{SITENAME}} през седмицата.',
	'echo-email-batch-link-text-view-all-notifications' => 'Преглед на всички известия',
);

/** Bengali (বাংলা)
 * @author Aftab1995
 * @author Bellayet
 * @author Jayantanth
 * @author Nasir8891
 * @author Sayak Sarkar
 */
$messages['bn'] = array(
	'echo-desc' => 'বিজ্ঞপ্তি ব্যবস্থা',
	'prefs-echo' => 'বিজ্ঞপ্তি',
	'prefs-emailsettings' => 'ইমেইল অপশন',
	'prefs-displaynotifications' => 'প্রদর্শনী অপশন',
	'prefs-echosubscriptions' => 'এই ঘটনা সম্পর্কে আমাকে অবহিত করো',
	'prefs-newmessageindicator' => 'নতুন বার্তা নির্দেশক',
	'echo-pref-send-me' => 'আমাকে পাঠাও:',
	'echo-pref-send-to' => 'প্রাপক:',
	'echo-pref-email-format' => 'ইমেইল ফরমেট:',
	'echo-pref-web' => 'ওয়েব',
	'echo-pref-email' => 'ইমেইল',
	'echo-pref-email-frequency-never' => 'আমাকে কোনো ইমেইল বিজ্ঞপ্তি পাঠিও না',
	'echo-pref-email-frequency-immediately' => 'স্বতন্ত্র বিজ্ঞপ্তি আসা মাত্রই',
	'echo-pref-email-frequency-daily' => 'দৈনিক বিজ্ঞপ্তির একটি সারাংশ',
	'echo-pref-email-frequency-weekly' => 'সাপ্তাহিক বিজ্ঞপ্তির একটি সারাংশ',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'সরল লেখা',
	'echo-pref-notify-show-link' => 'আমার টুলবারে বিজ্ঞপ্তি দেখাও',
	'echo-pref-new-message-indicator' => 'আমার টুলবারে আলাপ পাতা বার্তা নির্দেশক (বিজ্ঞপ্তি) দেখাও',
	'echo-learn-more' => 'আরও জানুন',
	'echo-new-messages' => 'আপনার নতুন বার্তা এসেছে',
	'echo-category-title-edit-user-talk' => 'আলাপ পাতার {{PLURAL:$1|বার্তা|বার্তাসমূহ}}',
	'echo-category-title-article-linked' => 'পাতা {{PLURAL:$1|সংযোগ|সংযোগসমূহ}}',
	'echo-category-title-reverted' => 'সম্পাদনা {{PLURAL:$1|ফেরত}}',
	'echo-category-title-mention' => '{{PLURAL:$1|উল্লেখ|উল্লেখসমূহ}}',
	'echo-category-title-other' => '{{PLURAL:$1|অন্য}}',
	'echo-category-title-system' => '{{PLURAL:$1|সিস্টেম}}',
	'echo-pref-tooltip-edit-user-talk' => 'আমার আলাপ পাতায় কেউ বার্তা রাখলে বা উত্তর দিলে আমাকে বিজ্ঞপ্তি দাও।',
	'echo-pref-tooltip-article-linked' => 'যদি কেউ অন্য পাতায় আমার তৈরি কোনো পাতার লিঙ্ক প্রদান করে তাহলে আমাকে বিজ্ঞপ্তি দাও।',
	'echo-pref-tooltip-reverted' => 'আনডু বা রোলব্যাক টুল দিয়ে কেউ আমার সম্পাদনা ফেরত নিলে আমাকে বিজ্ঞপ্তি দাও।',
	'echo-pref-tooltip-mention' => 'যে কোনো আলাপ পাতায় কেউ আমার ব্যবহারকারী পাতার লিঙ্ক প্রদান করলে আমাকে বিজ্ঞপ্তি দাও।',
	'echo-no-agent' => '[কেউ নাই]',
	'echo-no-title' => '[কোনো পাতা নাই]',
	'echo-error-no-formatter' => 'বিজ্ঞপ্তির জন্য কোনো ফরমেটিং নির্ধারিত হয়নি',
	'echo-error-preference' => 'ত্রুটি: ব্যবহারকারী পছন্দ ধার্য্য করা যাচ্ছে না',
	'echo-error-token' => 'ত্রুটি: ব্যবহারকারী টোকেন উদ্ধার করা যাচ্ছে না',
	'notifications' => 'বিজ্ঞপ্তি',
	'tooltip-pt-notifications' => 'আপনার বিজ্ঞপ্তি',
	'echo-specialpage' => 'বিজ্ঞপ্তি',
	'echo-anon' => 'বিজ্ঞপ্তি পেতে, [$1 অ্যাকাউন্ট তৈরি] অথবা [$2 প্রবেশ] করুন।',
	'echo-none' => 'আপনার কোন বিজ্ঞপ্তি নাই।',
	'echo-more-info' => 'আরও তথ্য',
	'echo-feedback' => 'প্রতিক্রিয়া',
	'notification-link-text-view-message' => 'বার্তা দেখাও',
	'notification-link-text-view-mention' => 'উল্লেখণ দেখাও',
	'notification-link-text-view-changes' => 'পরিবর্তনসমূহ দেখাও',
	'notification-link-text-view-page' => 'পাতা দেখাও',
	'notification-link-text-view-edit' => 'সম্পাদনা দেখাও',
	'notification-edit-talk-page2' => '[[User:$1|$1]]  আপনার [[User talk:$2#$3|আলাপ পাতায়]] একটি বার্তা {{GENDER:$1|রেখেছেন}}।',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] আপনার আলাপ পাতার "[[User talk:$2#$3|$4]]"-এ একটি বার্তা {{GENDER:$1|রেখেছেন}}।',
	'notification-edit-talk-page-flyout2' => '$1 আপনার [[User talk:$2#$3|আলাপ পাতায়]] একটি বার্তা {{GENDER:$1|রেখেছেন}}।',
	'notification-edit-talk-page-flyout-with-section' => '$1 আপনার আলাপ পাতার "[[User talk:$2#$3|$4]]"-এ একটি বার্তা {{GENDER:$1|রেখেছেন}}।',
	'notification-page-linked' => '[[:$3]] থেকে [[:$2]] {{GENDER:$1|সংযুক্ত}} রয়েছে। [[Special:WhatLinksHere/$2|এই পাতার সাথে সকল সংযোগ দেখুন]]।',
	'notification-page-linked-flyout' => '[[:$3]] থেকে $2 {{GENDER:$1|সংযুক্ত}} রয়েছে।',
	'notification-add-comment2' => '[[User:$1|$1]] "[[$3|$2]]" সম্পর্কে "$4"-এর আলাপ পাতায় {{GENDER:$1|মন্তব্য করেছেন}}।',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] [[$3]]-এ "$2" সম্পর্কে একটি নতুন বিষয় {{GENDER:$1|পোষ্ট করেছেন}}।',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] আপনাকে একটি বার্তা {{GENDER:$1|পাঠিয়েছেন}}: "[[$3#$2|$2]]"।',
	'notification-add-comment-yours2' => '[[User:$1|$1]] আপনার আলাপ পাতায় "[[$3#$2|$2]]" সম্পর্কে {{GENDER:$1|মন্তব্য করেছেন}}।',
	'notification-mention' => '[[User:$1|$1]]  $5-এর আলাপ পাতায়  [[$3#$2|$4]]-এ আপনাকে {{GENDER:$1|উল্লেখ করেছেন}}।',
	'notification-mention-flyout' => '$1 $5-এর আলাপ পাতায় "[[$3#$2|$4]]"-এ আপনাকে {{GENDER:$1|উল্লেখ করেছেন}}।',
	'notification-mention-nosection' => '[[User:$1|$1]] [[$3|$2-এর আলাপ পাতায়]] আপনাকে {{GENDER:$1|উল্লেখ করেছেন}}।',
	'notification-mention-nosection-flyout' => '$1 [[$3|$2-এর আলাপ পাতায়]] আপনাকে {{GENDER:$1|উল্লেখ করেছেন}}।',
	'notification-user-rights' => '[[User:$1|$1]] আপনার ব্যবহারকারী অধিকার [[Special:Log/rights/$1|{{GENDER:$1|পরিবর্তন করেছেন}}]]। $2। [[Special:ListGroupRights|আরও জানুন]]',
	'notification-user-rights-flyout' => '$1 আপনার ব্যবহারকারী অধিকার {{GENDER:$1|পরিবর্তন করেছেন}}। $2। [[Special:ListGroupRights|আরও জানুন]]',
	'notification-user-rights-add' => 'আপনি এখন থেকে {{PLURAL:$2|এই দলের|এই দলসমূহের}} একজন সদস্য: $1',
	'notification-user-rights-remove' => 'আপনি আর {{PLURAL:$2|এই দলের|এই দলসমূহের}} সদস্য নন।: $1',
	'notification-new-user' => '{{SITENAME}} সাইটে স্বাগতম, $1! আপনাকে এখানে পেয়ে আমরা খুব আনন্দিত।',
	'notification-reverted2' => '{{PLURAL:$4[[:$2]]-এ আপনার সম্পাদনা|[[:$2]]-এ আপনার সম্পাদনাগুলো}}  [[User:$1|$1]] দ্বারা  {{GENDER:$1|পূর্বাবস্থায়}} নেওয়া হয়েছে। $3',
	'notification-reverted-flyout2' => '$2-এ আপনার {{PLURAL:$4|সম্পাদনা|সম্পাদনাগুলো}}  $1 দ্বারা {{GENDER:$1|পূর্বাবস্থায়}} নেয়া হয়েছে। $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{SITENAME}} এ আপনার জন্য একটি বার্তা {{GENDER:$1|রেখেছেন}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 আপনার আলাপ পাতায় একটি বার্তা {{GENDER:$1|রেখেছেন}}:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 আপনার আলাপ পাতায় "$2"-এ একটি বার্তা {{GENDER:$1|রেখেছেন}}।',
	'notification-page-linked-email-subject' => 'আপনার পাতাটি {{SITENAME}} সাইটে সংযুক্ত রয়েছে।',
	'notification-page-linked-email-batch-body' => '$2 পাতাটি $3 হতে {{GENDER:$1|সংযুক্ত}}।',
	'notification-reverted-email-subject2' => '{{SITENAME}}-এ আপনার {{PLURAL:$3|সম্পাদনা|সম্পাদনাগুলো}} {{GENDER:$1|পূর্বাবস্থায়}} নেয়া হয়েছে',
	'notification-reverted-email-batch-body2' => '$1 দ্বারা {{PLURAL:$3|$2-এ আপনার সম্পাদনা|$2-এ আপনার সম্পাদনাগুলি}} {{GENDER:$1|পূর্বাবস্থায়}} নেয়া হয়েছে।',
	'notification-mention-email-subject' => '$1 আপনাকে {{SITENAME}}-এ {{GENDER:$1|উল্লেখ করেছেন}}',
	'notification-mention-email-batch-body' => '$1 আপনাকে $4-এর আলাপ পাতায় "$3"-এ {{GENDER:$1|উল্লেখ করেছেন}}।',
	'notification-mention-nosection-email-batch-body' => '$1 $2-এর আলাপ পাতায় আপনাকে {{GENDER:$1|উল্লেখ করেছেন}}।',
	'notification-user-rights-email-subject' => '{{SITENAME}}-এ আপনার ব্যবহারকারী অধিকার পরবর্তন হয়েছে',
	'notification-user-rights-email-batch-body' => '$1 আপনার অধিকারসমূহ {{GENDER:$1|পরিবর্তন করেছেন}}। $2।',
	'echo-email-subject-default' => '{{SITENAME}} এ নতুন বিজ্ঞপ্তি',
	'echo-email-body-default' => '{{SITENAME}} এ আপনার একটি নতুন বিজ্ঞপ্তি রয়েছে:

$1',
	'echo-email-batch-body-default' => 'আপনার নতুন একটি বিজ্ঞপ্তি রয়েছে।',
	'echo-email-footer-default' => '$2

যে ইমেইল আমরা আপনাকে পাঠাই তা নিয়ন্ত্রণ করতে, আপনার পছন্দসমূহ পরীক্ষা করুন:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'যে ইমেইল আমরা আপনাকে পাঠাই তা নিয়ন্ত্রণ করতে, <a href="$2" style="text-decoration:none; color: #3868B0;">আপনার পছন্দসমূহ পরীক্ষা করুন</a>।<br />
$1',
	'echo-overlay-link' => 'সকল বিজ্ঞপ্তি',
	'echo-overlay-title' => '<b>বিজ্ঞপ্তি</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|বিজ্ঞপ্তি}}</b> (অপঠিত $2টির মধ্যে $1টি প্রদর্শিত হচ্ছে)',
	'echo-mark-all-as-read' => 'সব পঠিত বলে চিহ্নিত',
	'echo-date-today' => 'আজ',
	'echo-date-yesterday' => 'গতকাল',
	'echo-load-more-error' => 'আরও ফলাফল আনার সময় কোনো ত্রুটি হয়েছে।',
	'notification-edit-talk-page-bundle' => '$1 এবং আরো $3 {{PLURAL:$4|জন}} [[User talk:$2|আপনার আলাপ পাতায়]] একটি {{GENDER:$1|বার্তা}} রেখেছেন।',
	'notification-page-linked-bundle' => '$3 এবং আরো $4টি {{PLURAL:$5|পাতায়}}  $2 পাতার {{GENDER:$1|সংযোগ}} রয়েছে।[[Special:WhatLinksHere/$2|সংযোগকারী পাতাগুলিকে দেখুন]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 এবং আরও $2 {{PLURAL:$3|জন}} আপনার আলাপ পাতায় বার্তা {{GENDER:$1|দিয়েছেন}}।',
	'notification-page-linked-email-batch-bundle-body' => '$3 এবং আরো $4টি {{PLURAL:$5|পাতায়}}  $2 পাতার {{GENDER:$1|সংযোগ}} রয়েছে।',
	'echo-email-batch-subject-daily' => 'আপনি {{SITENAME}}-এ {{PLURAL:$2|একটি নতুন বিজ্ঞপ্তি|নতুন বিজ্ঞপ্তিসমূহ}} পেয়েছেন',
	'echo-email-batch-subject-weekly' => 'এই সপ্তাহে আপনি {{SITENAME}}-এ {{PLURAL:$2|একটি নতুন বিজ্ঞপ্তি|নতুন বিজ্ঞপ্তিসমূহ}} পেয়েছেন',
	'echo-email-batch-body-intro-daily' => 'প্রিয় $1,
{{SITENAME}} সাইটে আপনার জন্য দিনের কার্যক্রমের সারাংশ এখানে দেওয়া হল।',
	'echo-email-batch-body-intro-weekly' => 'প্রিয় $1,
{{SITENAME}} সাইটে আপনার জন্য সপ্তাহের কার্যক্রমের সারাংশ এখানে দেওয়া হল।',
	'echo-email-batch-link-text-view-all-notifications' => 'সকল বিজ্ঞপ্তি দেখাও',
	'echo-rev-deleted-text-view' => 'এই পাতা সংস্করণটি বাতিল করা হয়েছে।',
);

/** Breton (brezhoneg)
 * @author Fohanno
 * @author Fulup
 * @author Y-M D
 */
$messages['br'] = array(
	'echo-desc' => 'Reizhiad kemennoù',
	'prefs-echo' => 'Kemennoù',
	'prefs-emailsettings' => 'Dibarzhioù postel',
	'prefs-displaynotifications' => 'Dibarzhioù diskwel',
	'prefs-echosubscriptions' => 'Kemenn din an darvoudoù-mañ',
	'echo-pref-send-me' => 'Kas din :',
	'echo-pref-send-to' => 'Kas da :',
	'echo-pref-email-format' => 'Furmad ar postel :',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Postel',
	'echo-pref-email-frequency-never' => 'Arabat kas posteloù kemenn din',
	'echo-pref-email-frequency-daily' => "Un diverrañ pemdeziek eus ar c'hemennoù",
	'echo-pref-email-frequency-weekly' => "Un diverrañ sizhuniek eus ar c'hemennoù",
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Testenn blaen',
	'echo-pref-notify-show-link' => "Diskouez ar c'hemennoù em barrenn ostilhoù",
	'echo-learn-more' => "Gouzout hiroc'h",
	'echo-new-messages' => "Kemennadennoù nevez zo ganeoc'h",
	'echo-category-title-article-linked' => 'Pajenn {{PLURAL:$1|link}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Meneg}}',
	'echo-category-title-other' => '{{PLURAL:$1|All}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistem}}',
	'echo-pref-tooltip-edit-user-talk' => 'Kemenn din pa vez postet ur gemennadenn gant unan bennak pe pa respont war ma fajenn gaozeal.',
	'echo-no-agent' => '[Den]',
	'echo-no-title' => '[Pajenn ebet]',
	'echo-error-preference' => 'Fazi : Dibosubl eo termenniñ an arventenn implijer.',
	'notifications' => 'Kemennoù',
	'tooltip-pt-notifications' => 'Ho kemennoù',
	'echo-specialpage' => 'Kemennoù',
	'echo-none' => "N'ho peus resevet kemenn ebet.",
	'echo-more-info' => "Gouzout hiroc'h",
	'echo-feedback' => 'Sonjoù',
	'notification-link-text-view-message' => 'Dsikwel ar gemennadenn',
	'notification-link-text-view-mention' => 'Gwelet ar meneg',
	'notification-link-text-view-changes' => "Diskouez ar c'hemmoù",
	'notification-link-text-view-page' => 'Gwelet ar bajenn',
	'notification-link-text-view-edit' => "Gwelet ar c'hemm",
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|en deus|he deus}} kaset ur gemennadenn deoc\'h: "[[$3#$2|$2]]".',
	'notification-new-user' => 'Degemer mat er {{SITENAME}}, $1!',
	'notification-edit-talk-page-email-subject2' => "$1 {{GENDER:$1|en|he}} deus laosket deoc'h ur gemennadenn
war {{SITENAME}}",
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|en deus|he deus}} lezet ur gemennadenn war ho pajenn gaozeal :',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|en deus|he deus}} embannet ur gemennadenn war ho pajenn gaozeal diwar-benn "$2".',
	'notification-page-linked-email-subject' => 'Liammet eo bet ho pajenn ouzh {{SITENAME}}',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|en deus|he deus}} ho meneget war {{SITENAME}}',
	'notification-mention-nosection-email-batch-body' => "$1 {{GENDER:$1|en deus|he deus}} meneget ac'hanoc'h war ar bajenn gaozeal $2.",
	'notification-user-rights-email-subject' => 'Cheñchet eo ho kwirioù implijer war {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Kemmet eo bet ho kwirioù implijer gant $1. $2.',
	'echo-email-subject-default' => 'Kemenn nevez e {{SITENAME}}',
	'echo-email-body-default' => "Ur c'hemenn nevez ho peus war {{SITENAME}}:

$1",
	'echo-email-batch-body-default' => "Ur c'hemenn nevez ho peus resevet.",
	'echo-overlay-link' => 'An holl gemennoù',
	'echo-overlay-title' => 'Kemennoù',
	'echo-overlay-title-overflow' => "Va c'hemennoù (o tiskouez $1 diwar $2 nann-lennet)", # Fuzzy
	'echo-mark-all-as-read' => 'Merkañ an holl evel lennet',
	'echo-date-today' => 'Hiziv',
	'echo-date-yesterday' => "Dec'h",
	'echo-load-more-error' => "Ur fazi zo bet en ur glask disoc'hoù all.",
	'echo-email-batch-subject-daily' => '$1 kemenn{{PLURAL:$2||}} nevez hiziv', # Fuzzy
	'echo-email-batch-subject-weekly' => '$1 kemenn{{PLURAL:$2||}} nevez ar sizhun-mañ', # Fuzzy
	'echo-email-batch-link-text-view-all-notifications' => 'Gwelet an holl gemennoù',
	'echo-rev-deleted-text-view' => 'Lamet eo bet an adwel pajenn-mañ.',
);

/** Bosnian (bosanski)
 * @author CERminator
 * @author DzWiki
 * @author Edinwiki
 * @author Palapa
 */
$messages['bs'] = array(
	'echo-desc' => 'Obavještajni sistem',
	'prefs-echo' => 'Obavještenja',
	'prefs-emailsettings' => 'Email opcije',
	'prefs-displaynotifications' => 'Opcije prikaza',
	'prefs-echosubscriptions' => 'Obavijesti me o tim događajima',
	'prefs-newmessageindicator' => 'Indikator za nove poruke',
	'echo-pref-send-me' => 'Pošalji mi:',
	'echo-pref-send-to' => 'Pošalji:',
	'echo-pref-email-format' => 'Format e-pošte:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-pošta',
	'echo-pref-email-frequency-never' => 'Ne šalji mi obavještenja preko e-pošte',
	'echo-pref-email-frequency-immediately' => 'Lična obavještenja kako dolaze u',
	'echo-pref-email-frequency-daily' => 'Dnevni sažetak obavještenja',
	'echo-pref-email-frequency-weekly' => 'Sedmični sažetak obavještenja',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Obični tekst',
	'echo-pref-notify-show-link' => 'Pokaži obavještenja u mojoj alatnoj traci',
	'echo-pref-new-message-indicator' => 'Pokaži indikator da je dobijena poruka na stranici za razgovor u mojoj alatnoj traci',
	'echo-learn-more' => 'Saznajte više',
	'echo-new-messages' => 'Imate nove poruke',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Poruke}} na stranici za razgovor',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Linkovi na stranicu}}',
	'echo-category-title-reverted' => '{{PLURAL:$1|Vraćanje izmjena}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Spominjanje|Spominjanja}}',
	'echo-category-title-other' => '{{PLURAL:$1|Ostalo}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistem}}',
	'echo-pref-tooltip-edit-user-talk' => 'Obavijesti me kada neko ostavi poruku ili odgovor na mojoj stranici za razgovor.',
	'echo-pref-tooltip-article-linked' => 'Obavijesti me kada neko linkuje na stranicu koju sam napravio od stranice članaka.',
	'echo-pref-tooltip-reverted' => 'Obavijesti me kada neko vrati uređivanje koje sam napravio/la, korištenjem naredbe undo ili alatom za vraćanje.',
	'echo-pref-tooltip-mention' => 'Obavijesti me kada me neko spomene na nekoj stranici za razgovor.',
	'echo-no-agent' => '[Niko]',
	'echo-no-title' => '[Nema stranice]',
	'echo-error-no-formatter' => 'Nema formatiranja određenog za obavještavanje.',
	'echo-error-preference' => 'Greška: Nemoguće odrediti korisničke postavke.',
	'echo-error-token' => 'Greška: Nemoguće ponovo pronaći korisničku oznaku.',
	'notifications' => 'Obavještenja',
	'tooltip-pt-notifications' => 'Vaša obavještenja',
	'echo-specialpage' => 'Obavještenja',
	'echo-anon' => 'Da biste primili obaveštenja, morate se [[Special:UserLogin|prijaviti]] ili [[Special:Userlogin/signup|napraviti račun]].',
	'echo-none' => 'Nemate obavještenja',
	'echo-more-info' => 'Više informacija',
	'echo-feedback' => 'Povratna informacija',
	'notification-link-text-view-message' => 'Pogledaj poruku',
	'notification-link-text-view-mention' => 'Pogledajte spominjanje',
	'notification-link-text-view-changes' => 'Pogledaj izmjene',
	'notification-link-text-view-page' => 'Pogledaj stranicu',
	'notification-link-text-view-edit' => 'Pogledaj uređivanje',
	'notification-edit-talk-page2' => '[[User:$1|$1]] vam je {{GENDER:$1|ostavio|ostavila}} poruku na vašoj [[User talk:$2#$3|stranici za razgovor]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] vam je {{GENDER:$1|ostavio|ostavila}} poruku na vašoj stranici za razgovor u "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 vam je {{GENDER:$1|ostavio|ostavila}} poruku na vašoj [[User talk:$2#$3|stranici za razgovor]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 vam je {{GENDER:$1|ostavio|ostavila}} poruku na vašoj stranici za razgovor u "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => 'Stranica [[:$2]] je {{GENDER:$1|povezana}} sa stranicom [[:$3]]. [[Special:WhatLinksHere/$2|Pogledajte sve veze prema ovoj stranici]].',
	'notification-page-linked-flyout' => '$2 je {{GENDER:$1|povezana}} sa [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] je {{GENDER:$1|ostavio|ostavila}} komentar na "[[$3|$2]]" na "$4" stranici za razgovor.',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] je {{GENDER:$1|postavio|postavila}} novu temu "$2" na [[$3]].',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] vam je {{GENDER:$1|poslao|poslala}} poruku: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]] je {{GENDER:$1|komentarisao|komentarisala}} temu "[[$3#$2|$2]]" na vašoj stranici za razgovor.',
	'notification-mention' => '[[User:$1|$1]] vas je {{GENDER:$1|spomenuо|spomenula}} na stranici za razgovor $5 u "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 vas je {{GENDER:$1|spomenuо|spomenula}} na stranici za razgovor $5 u "[[$3#$2|$4]]".',
	'notification-user-rights' => 'Vaša korisnička prava [[Special:Log/rights/$1|su bila {{GENDER:$1|izmijenjena}}]] od strane [[User:$1|$1]]. $2. [[Special:ListGroupRights|Saznajte više]]',
	'notification-user-rights-flyout' => 'Vaša korisnička prava su bila {{GENDER:$1|izmijenjena}} od strane $1. $2. [[Special:ListGroupRights|Saznajte više]]',
	'notification-user-rights-add' => 'Od sada ste član {{PLURAL:$2|ove grupe|ovih grupa}}: $1',
	'notification-user-rights-remove' => 'Više niste član {{PLURAL:$2|ove grupe|ovih grupa}}: $1',
	'notification-new-user' => '$1, dobro došli na {{SITENAME}}! Drago nam je što ste ovdje.',
	'notification-reverted2' => '{{PLURAL:$4|Vaša izmjena na [[:$2]] je poništena|Vaše izmjene na [[:$2]] su poništene}} {{GENDER:$1|od}} strane [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Vaša izmjena na $2 je poništena|Vaše izmjene na $2 su poništene}} {{GENDER:$1|od}} strane $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 vam je {{GENDER:$1|ostavio|ostavila}} poruku na {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 vam je {{GENDER:$1|ostavio|ostavila}} poruku na vašoj stranici za razgovor:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 vam je {{GENDER:$1|ostavio|ostavila}} poruku na vašoj stranici za razgovor u "$2".',
	'notification-page-linked-email-subject' => 'Vaša stranica je povezana na {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2 je {{GENDER:$1|povezana}} sa $3.',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Vaša izmjena je {{GENDER:$1|poništena}}|Vaše izmjene su {{GENDER:$1|poništene}}}} na {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Vaša izmjena na $2 je poništena|Vaše izmjene na $2 su poništene}} {{GENDER:$1|od}} strane $1.',
	'notification-mention-email-subject' => '$1 vas je {{GENDER:$1|spomenuо|spomenula}} na {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 vas je {{GENDER:$1|spomenuо|spomenula}} na stranici za razgovor $4 u "$3".',
	'notification-user-rights-email-subject' => 'Vaša korisnička prava su se promijenila na {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Vaša korisnička prava su {{GENDER:$1|promjenjena}} od strane $1. $2',
	'echo-email-subject-default' => 'Novo obavještenje na {{SITENAME}}',
	'echo-email-body-default' => 'Imate novo obavještenje na {{SITENAME}}: 

$1',
	'echo-email-batch-body-default' => 'Imate novo obavještenje.',
	'echo-email-footer-default' => '$2

Da kontrolišete koje vam email poruke šaljemo, provjerite svoje postavke:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Da kontrolišete koje vam email poruke šaljemo, <a href="$2" style="text-decoration:none; color: #3868B0;">provjerite vaše postavke</a>.<br />
$1',
	'echo-overlay-link' => 'Sva obavještenja',
	'echo-overlay-title' => '<b>Obavještenja</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Obavještenja}}</b> (prikaz $1 od $2 nepročitanih)',
	'echo-mark-all-as-read' => 'Označi sve kao pročitano',
	'echo-date-today' => 'Danas',
	'echo-date-yesterday' => 'Jučer',
	'echo-load-more-error' => 'Greška se pojavila za vrijeme dobavljanja više rezultata.',
	'notification-edit-talk-page-bundle' => '$1 i $3 {{PLURAL:$4|ostali|ostale}} {{GENDER:$1|ostavili}} su poruku na vašoj [[User talk:$2|stranici za razgovor]].',
	'notification-page-linked-bundle' => '$2 je {{GENDER:$1|povezana}} sa $3 i $4 {{PLURAL:$5|druge stranice|drugih stranica}}. [[Special:WhatLinksHere/$2|Pogledaj sve linkove na ovu stranicu]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 i $2 {{PLURAL:$3|ostali|ostalih}} {{GENDER:$1|ostavili}} su poruku na vašoj stranici za razgovor.',
	'notification-page-linked-email-batch-bundle-body' => 'Stranica $2 je {{GENDER:$1|povezana}} sa $3 i $4 {{PLURAL:$5|druge stranice|drugih stranica}}.',
	'echo-email-batch-subject-daily' => 'Imate {{PLURAL:$2|novo obavještenje|nova obavještenja}} na {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Imate {{PLURAL:$2|novo obavještenje|nova obavještenja}} na {{SITENAME}} ove sedmice',
	'echo-email-batch-body-intro-daily' => 'Zdravo $1,
Ovo je sažetak današnjih aktivnosti na {{SITENAME}} za Vas.',
	'echo-email-batch-body-intro-weekly' => 'Zdravo $1,
Ovo je sažetak sedmičnih aktivnosti na {{SITENAME}} za Vas.',
	'echo-email-batch-link-text-view-all-notifications' => 'Pogledaj sva obavještenja',
	'echo-rev-deleted-text-view' => 'Revizija ove stranice je zabranjena.',
);

/** Catalan (català)
 * @author Arnaugir
 * @author Papapep
 * @author Pitort
 * @author QuimGil
 * @author Vriullop
 * @author පසිඳු කාවින්ද
 */
$messages['ca'] = array(
	'echo-desc' => 'Sistema de notificacions',
	'prefs-echo' => 'Notificacions',
	'prefs-emailsettings' => 'Opcions de correu electrònic',
	'prefs-displaynotifications' => 'Opcions de visualització',
	'prefs-echosubscriptions' => "Notifica'm sobre aquests esdeveniments",
	'prefs-newmessageindicator' => 'Indicador de missatges nous',
	'echo-pref-send-me' => "Envia'm:",
	'echo-pref-send-to' => 'Envia a:',
	'echo-pref-email-format' => 'Format de correu:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Correu electrònic',
	'echo-pref-email-frequency-never' => "No m'enviïs notificacions per correu electrònic",
	'echo-pref-email-frequency-immediately' => 'Notificacions individuals a mesura que arribin',
	'echo-pref-email-frequency-daily' => 'Un resum diari de notificacions',
	'echo-pref-email-frequency-weekly' => 'Un resum setmanal de notificacions',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Text net',
	'echo-pref-notify-show-link' => "Mostra les notificacions a la meva barra d'eines",
	'echo-pref-new-message-indicator' => "Mostra l'indicador de missatges en pàgina de discussió a la meva barra d'eines",
	'echo-learn-more' => 'Més informació',
	'echo-new-messages' => 'Teniu nous missatges',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Missatge|Missatges}} de discussió',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Enllaç|Enllaços}} de pàgina',
	'echo-category-title-reverted' => "{{PLURAL:$1|Reversió d'edició|Reversions d'edicions}}",
	'echo-category-title-mention' => '{{PLURAL:$1|Menció|Mencions}}',
	'echo-category-title-other' => '{{PLURAL:$1|Altres}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistema}}',
	'echo-pref-tooltip-edit-user-talk' => "Avisa'm quan algú envia un missatge o respon a la meva pàgina de discussió.",
	'echo-pref-tooltip-article-linked' => "Avisa'm quan algú enllaça des d'un article a una pàgina que he creat.",
	'echo-pref-tooltip-reverted' => "Avisa'm quan algú reverteix una modificació que he fet, emprant l'eina per a desfer o revocar.",
	'echo-pref-tooltip-mention' => "Avisa'm quan algú enllaça a la meva pàgina d'usuari des de qualsevol pàgina de discussió.",
	'echo-no-agent' => '[Ningú]',
	'echo-no-title' => '[Cap pàgina]',
	'echo-error-no-formatter' => 'Cap format definit per a la notificació.',
	'echo-error-preference' => "Error: No s'ha pogut establir la preferència d'usuari.",
	'echo-error-token' => "Error: No ha pogut recuperar el símbol de l'usuari.",
	'notifications' => 'Notificacions',
	'tooltip-pt-notifications' => 'Les vostres notificacions',
	'echo-specialpage' => 'Notificacions',
	'echo-anon' => 'Per a rebre notificacions, [[Special:Userlogin/signup|creeu un compte]] o [[Special:UserLogin|registreu-vos]].',
	'echo-none' => 'No teniu cap notificació.',
	'echo-more-info' => 'Més informació',
	'echo-feedback' => 'Comentaris',
	'notification-link-text-view-message' => 'Mostra el missatge',
	'notification-link-text-view-mention' => 'Mostra la menció',
	'notification-link-text-view-changes' => 'Mostra els canvis',
	'notification-link-text-view-page' => 'Mostra la pàgina',
	'notification-link-text-view-edit' => 'Mostra la modificació',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|ha deixat}} un missatge a la vostra [[User talk:$2#$3|pàgina de discussió]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|ha deixat}} un missatge a la vostra pàgina de discussió sobre "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|ha deixat}} un missatge a la vostra [[User talk:$2#$3|pàgina de discussió]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|ha deixat}} un missatge a la vostra pàgina de discussió sobre «[[User talk:$2#$3|$4]]».',
	'notification-page-linked' => "S'ha {{GENDER:$1|enllaçat}} [[:$2]] des de [[:$3]]. [[Special:WhatLinksHere/$2|Vegeu tots els enllaços a aquesta pàgina]].",
	'notification-page-linked-flyout' => "S'ha {{GENDER:$1|enllaçada}} $2 des de [[:$3]].",
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|ha fet un comentari}} sobre «[[$3|$2]]» a la pàgina de discussió «$4».',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|ha publicat}} un nou fil de discussió «$2» a [[$3]].',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] us {{GENDER:$1|ha enviat}} un missatge: «[[$3#$2|$2]]».',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|ha fet un comentari}} sobre «[[$3#$2|$2]]» a la vostra pàgina de discussió.',
	'notification-mention' => '[[User:$1|$1]] us {{GENDER:$1|ha mencionat}} a $5 en la seva pàgina de discussió sobre «[[$3#$2|$4]]».',
	'notification-mention-flyout' => '$1 us {{GENDER:$1|ha mencionat}} en la pàgina de discussió de $5 sobre «[[$3#$2|$4]]».',
	'notification-user-rights' => "Els vostres drets d'accés [[Special:Log/rights/$1|han estat {{GENDER:$1|canviats}}]] per [[User:$1|$1]]. $2. [[Special:ListGroupRights|Més informació]]",
	'notification-user-rights-flyout' => "Els vostres drets d'accés han estat {{GENDER:$1|canviats}} per $1. $2. [[Special:ListGroupRights|Més informació]]",
	'notification-user-rights-add' => "Ara sou membre d'{{PLURAL:$2|aquest grup|aquests grups}}: $1",
	'notification-user-rights-remove' => 'Heu deixat de pertànyer {{PLURAL:$2|al següent grup|als següents grups}}: $1',
	'notification-new-user' => 'Benvingut al projecte {{SITENAME}}, $1! Ens alegrem que estiguis aquí.',
	'notification-reverted2' => "{{PLURAL:$4|S'ha revertit la vostra edició a [[:$2]] |S'ha revertit les vostres edicions a [[:$2]]}} {{GENDER:$1|per}} [[User:$1|$1]]. $3",
	'notification-reverted-flyout2' => "{{PLURAL:$4|S'ha revertit la vostra edició a $2|S'ha revertit les vostres edicions a $2}} {{GENDER:$1|per}} $1. $3",
	'notification-edit-talk-page-email-subject2' => '$1 us {{GENDER:$1|ha deixat}} un missatge al projecte {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 us {{GENDER:$1|ha deixat}} un missatge en la vostra pàgina de discussió:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 us {{GENDER:$1|ha deixat}} un missatge en la vostra pàgina de discussió sobre «$2».',
	'notification-page-linked-email-subject' => "S'ha enllaçat la vostra pàgina al projecte {{SITENAME}}",
	'notification-page-linked-email-batch-body' => "S'ha {{GENDER:$1|enllaçada}} $2 des de $3.",
	'notification-reverted-email-subject2' => "{{PLURAL:$3|S'ha revertit la vostra edició|S'han revertit les vostres edicions}} {{GENDER:$1|al projecte}} {{SITENAME}}",
	'notification-reverted-email-batch-body2' => "{{PLURAL:$3|S'ha revertit la vostra edició a $2|S'ha revertit les vostres edicions a $2}} {{GENDER:$1|}}per $1.",
	'notification-mention-email-subject' => '$1 us ha {{GENDER:$1|mencionat}} a {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 us ha {{GENDER:$1|mencionat}} a la pàgina de discussió de $4, a "$3".',
	'notification-user-rights-email-subject' => "Els vostres permisos d'usuari han canviat a {{SITENAME}}",
	'notification-user-rights-email-batch-body' => "Els vostres permisos d'usuari han estat {{GENDER:$1|canviats}} per $1. $2.",
	'echo-email-subject-default' => 'Notificació de nou a {{SITENAME}}',
	'echo-email-body-default' => 'Teniu una nova notificació a {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Teniu una nova notificació.',
	'echo-email-footer-default' => '$2

Per a controlar quins correus us enviem, reviseu les vostres preferències:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Per a controlar quins correus us enviem, <a href="$2" style="text-decoration:none; color: #3868B0;">reviseu les vostres preferències</a>.<br />
$1',
	'echo-overlay-link' => 'Totes les notificacions',
	'echo-overlay-title' => '<b>Notificacions</b>',
	'echo-overlay-title-overflow' => '<b>Notificacions</b> (mostrant $1 de $2 no llegides)', # Fuzzy
	'echo-mark-all-as-read' => "Marca'ls tots com a llegits",
	'echo-date-today' => 'Avui',
	'echo-date-yesterday' => 'Ahir',
	'echo-load-more-error' => "S'ha produït un error en obtenir més resultats.",
	'notification-edit-talk-page-bundle' => '$1 i $3 {{PLURAL:$4|més}} {{GENDER:$1|han deixat}} un missatge a la vostra [[User talk:$2|pàgina de discussió]].',
	'notification-page-linked-bundle' => "S'ha {{GENDER:$1|enllaçat}} $2 des de $3 i $4  {{PLURAL:$5|pàgina|pàgines}} més. [[Special:WhatLinksHere/$2|Vegeu tots els enllaços a aquesta pàgina]]",
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 i $2 {{PLURAL:$3|més}} {{GENDER:$1|han deixat}} un missatge a la seva pàgina de discussió.',
	'notification-page-linked-email-batch-bundle-body' => '$2 ha {{GENDER:$1|enllaçat}} {{PLURAL:$5|una altra pàgina|altres pàgines}} des de $3 i $4.',
	'echo-email-batch-subject-daily' => 'Teniu {{PLURAL:$2|una nova notificació|noves notificacions}} al projecte {{SITENAME}}',
	'echo-email-batch-subject-weekly' => "Teniu {{PLURAL:$2|una nova notificació|noves notificacions}} d'aquesta setmana al projecte {{SITENAME}}",
	'echo-email-batch-body-intro-daily' => "Hola $1,
Aquí teniu un resum de l'activitat d'avui a {{SITENAME}}.",
	'echo-email-batch-body-intro-weekly' => "Hola $1,
Aquí teniu un resum de l'activitat d'aquesta setmana a {{SITENAME}}.",
	'echo-email-batch-link-text-view-all-notifications' => 'Vegeu totes les notificacions',
	'echo-rev-deleted-text-view' => "S'ha suprimit aquesta revisió de pàgina.",
);

/** Min Dong Chinese (Mìng-dĕ̤ng-ngṳ̄)
 * @author Yejianfei
 */
$messages['cdo'] = array(
	'echo-desc' => '通知系統',
	'prefs-echo' => '通知',
	'prefs-emailsettings' => '電子郵件選項',
	'prefs-displaynotifications' => '顯示選項',
	'prefs-echosubscriptions' => '通知我茲幾萆事計',
	'prefs-newmessageindicator' => '新其導航',
	'echo-pref-send-me' => '發送給我：',
	'echo-pref-send-to' => '發送遘：',
	'echo-pref-email-format' => '電子郵件格式：',
	'echo-pref-web' => '網頁',
	'echo-pref-email' => '電子郵件',
	'echo-pref-email-frequency-never' => '伓使發給我任何通知',
	'echo-pref-email-frequency-immediately' => '伊各儂來辰候其个人通知',
	'echo-pref-email-frequency-daily' => '蜀日蜀回其通知總結',
	'echo-pref-email-frequency-weekly' => '蜀禮拜蜀回其通知總結',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => '純文本',
	'echo-pref-notify-show-link' => '敆我其工具欄顯示通知',
	'echo-pref-new-message-indicator' => '敆我其工具欄顯示討論頁信息指示',
	'echo-learn-more' => '學習更更価仂囝',
	'echo-new-messages' => '汝有新其信息。', # Fuzzy
	'echo-category-title-edit-user-talk' => '討論頁 {{PLURAL:$1|條}}信息',
	'echo-category-title-article-linked' => '頁面{{PLURAL:$1|萆鏈接}}',
	'echo-category-title-reverted' => '修改{{PLURAL:$1|回退回}}',
	'echo-category-title-mention' => '提遘{{PLURAL:$1|回}}',
	'echo-category-title-other' => '{{PLURAL:$1|其它}}',
	'echo-category-title-system' => '{{PLURAL:$1|萆系統}}',
	'echo-pref-tooltip-edit-user-talk' => '有儂敆我其用戶頁回覆其辰候通知我。',
	'echo-pref-tooltip-article-linked' => '有儂鏈接我趁論文頁面創建其頁面其辰候通知我。',
	'echo-pref-tooltip-reverted' => '有儂使撤銷或者回滾工具回退我其修改其辰候通知我。',
	'echo-pref-tooltip-mention' => '有儂趁任何討論頁鏈接遘我其用戶頁其辰候通知我。',
	'echo-no-agent' => '[無儂]',
	'echo-no-title' => '[無頁]',
	'echo-error-no-formatter' => '未規定通知其格式。',
	'echo-error-preference' => '有賺：無辦法設置用戶其喜好。',
	'echo-error-token' => '有賺：無辦法得遘用戶其標誌。',
	'notifications' => '通知',
	'tooltip-pt-notifications' => '汝其通知',
	'echo-specialpage' => '通知',
	'echo-anon' => '卜收通知，[$1 開賬戶]或者[$2 躒底]。',
	'echo-none' => '汝無通知。',
	'echo-more-info' => '更更価其信息',
	'echo-feedback' => '反饋',
	'notification-link-text-view-message' => '看蜀看信息',
	'notification-link-text-view-mention' => '看提遘其乇',
	'notification-link-text-view-changes' => '看蜀看改變',
	'notification-link-text-view-page' => '看蜀看頁面',
	'notification-link-text-view-edit' => '看蜀看修改',
	'notification-edit-talk-page2' => '[[User:$1|$1]]敆汝其[[User talk:$2#$3|討論頁]]{{GENDER:$1|留下}}蜀萆信息。',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]]敆汝其討論頁「[[User talk:$2#$3|$4]]」{{GENDER:$1|留下}}蜀萆信息。',
	'notification-edit-talk-page-flyout2' => '$1敆汝其[[User talk:$2#$3|討論頁]]{{GENDER:$1|留下}}蜀條信息。',
	'notification-edit-talk-page-flyout-with-section' => '$1敆汝其討論頁「[[User talk:$2#$3|$4]]」{{GENDER:$1|留下}}蜀條信息。',
	'notification-page-linked' => '[[:$2]]趁[[:$3]]𡅏{{GENDER:$1|鏈}}過來。[[Special:WhatLinksHere/$2|看全部鏈遘茲蜀頁其鏈接]]。',
	'notification-page-linked-flyout' => '$2是趁[[:$3]]𡅏{{GENDER:$1|鏈}}過來。',
	'notification-add-comment2' => '[[User:$1|$1]]敆「$4」其討論頁𡅏{{GENDER:$1|評論}}「[[$3|$2]]」。',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]]敆[[$3]]𡅏{{GENDER:$1|發表}}蜀萆新其话題「$2」。',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]]{{GENDER:$1|發}}給汝蜀條信息：「[[$3#$2|$2]]」。',
	'notification-add-comment-yours2' => '[[User:$1|$1]]敆汝其討論頁𡅏{{GENDER:$1|評論}}「[[$3#$2|$2]]」。',
	'notification-mention' => '[[User:$1|$1]]敆$5其討論頁其「[[$3#$2|$4]]」𡅏{{GENDER:$1|提遘}}汝。',
	'notification-mention-flyout' => '$1敆$5其討論頁其「[[$3#$2|$4]]」𡅏{{GENDER:$1|提遘}}汝。',
	'notification-user-rights' => '汝其用戶權利乞[[User:$1|$1]][[Special:Log/rights/$1|{{GENDER:$1|改去}}]]。$2. [[Special:ListGroupRights|學習更更価]]',
	'notification-user-rights-flyout' => '汝其用戶權限乞$1{{GENDER:$1|改去}}。$2。[[Special:ListGroupRights|學習更更価]]',
	'notification-user-rights-add' => '汝現在是{{PLURAL:$2|茲蜀組|茲幾組}}其成頁：$1',
	'notification-user-rights-remove' => '汝不再是{{PLURAL:$2|茲蜀組|茲幾組}}其成員了：$1',
	'notification-new-user' => '歡迎來遘{{SITENAME}}，$1！儂家各儂雅高興看見汝敆這塊。',
	'notification-reverted2' => '汝{{PLURAL:$4|敆[[:$2]]上其修改}}已經乞[[User:$1|$1]]{{GENDER:$1|回滾}}了。$3',
	'notification-reverted-flyout2' => '汝{{PLURAL:$4|敆$2上其修改}}已經乞$1{{GENDER:$1|回滾}}。$3',
	'notification-edit-talk-page-email-subject2' => '$1敆{{SITENAME}}𡅏給汝{{GENDER:$1|留下}}蜀條信息',
	'notification-edit-talk-page-email-batch-body2' => '$1敆汝其討論頁𡅏{{GENDER:$1|留下}}蜀條信息：',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1敆汝其用戶討論頁其「$2」𡅏{{GENDER:$1|留下}}蜀條信息。',
	'notification-page-linked-email-subject' => '汝其頁面鏈遘{{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2是趁$3𡅏{{GENDER:$1|鏈}}過來。',
	'notification-reverted-email-subject2' => '汝其{{PLURAL:$3|修改}}敆{{SITENAME}}𡅏乞{{GENDER:$1|回滾}}去',
	'notification-reverted-email-batch-body2' => '汝其{{PLURAL:$3|敆$2懸頂其修改已經}}乞$1{{GENDER:$1|回滾}}了。',
	'notification-mention-email-subject' => '$1敆{{SITENAME}}𡅏{{GENDER:$1|提遘}}汝',
	'notification-mention-email-batch-body' => '$1敆$4其討論頁其「$3」𡅏{{GENDER:$1|提遘mentioned}}汝。',
	'notification-user-rights-email-subject' => '汝其用戶權利敆{{SITENAME}}𡅏乞改去了。',
	'notification-user-rights-email-batch-body' => '汝其用戶權利乞$1改去了。$2。',
	'echo-email-subject-default' => '敆{{SITENAME}}懸頂有新其通知',
	'echo-email-body-default' => '汝敆{{SITENAME}}懸頂有新其通知：

$1',
	'echo-email-batch-body-default' => '汝有蜀萆新其通知。',
	'echo-email-footer-default' => '為𡅏控制儂家發給汝其底蜀種電子郵件，檢查汝其喜好：
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$2：$1',
	'echo-email-footer-default-html' => '為𡅏控制儂家發給汝底蜀種電子郵件，請<a href="$2" style="text-decoration:none; color: #3868B0;">檢查汝其喜好</a>。<br />
$1',
	'echo-overlay-link' => '全部通知',
	'echo-overlay-title' => '<b>通知</b>',
	'echo-overlay-title-overflow' => '<b>通知</b>（未讀其通知顯示出$1條，共總有$2條）', # Fuzzy
	'echo-mark-all-as-read' => '全部標記成已讀',
	'echo-date-today' => '今旦',
	'echo-date-yesterday' => '昨冥',
	'echo-load-more-error' => '獲取更更価其結果辰候發生错误。',
	'notification-edit-talk-page-bundle' => '$1共$3{{PLURAL:$4|其它}}敆汝其[[User talk:$2|討論頁]]𡅏{{GENDER:$1|留下}}蜀條信息。',
	'notification-page-linked-bundle' => '$2是趁$3共其它$4{{PLURAL:$5|頁}}𡅏{{GENDER:$1|鏈}}過其。[[Special:WhatLinksHere/$2|看全部鏈遘茲蜀頁其鏈接]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1其其它$2{{PLURAL:$3|隻}}儂敆汝其討論頁上{{GENDER:$1|留下}}蜀條信息。',
	'notification-page-linked-email-batch-bundle-body' => '$2是趁$3共其它$4{{PLURAL:$5|頁}}𡅏{{GENDER:$1|鏈}}過來。',
	'echo-email-batch-subject-daily' => '汝敆{{SITENAME}}𡅏有{{PLURAL:$2|新其通知}}',
	'echo-email-batch-subject-weekly' => '汝茲蜀禮拜敆{{SITENAME}}𡅏有{{PLURAL:$2|新其通知}}',
	'echo-email-batch-body-intro-daily' => '嘿$1，
這是汝其今旦敆{{SITENAME}}懸頂其活動。',
	'echo-email-batch-body-intro-weekly' => '嘿$1，
這是汝其茲蜀禮拜敆{{SITENAME}}懸頂其活動。',
	'echo-email-batch-link-text-view-all-notifications' => '看全部通知',
	'echo-rev-deleted-text-view' => '茲頁其修定已經乞限制了。',
);

/** Chechen (нохчийн)
 * @author Умар
 */
$messages['ce'] = array(
	'echo-desc' => 'Хааман система',
	'prefs-echo' => 'Хаамаш',
	'prefs-emailsettings' => 'Электронан почтан гӀирс нисбар',
	'prefs-displaynotifications' => 'Гуш болу гӀирсаш',
	'prefs-echosubscriptions' => 'ХӀокху хиларах лаьцна хаийта',
	'prefs-newmessageindicator' => 'Керлачу хааман индикатор',
	'echo-pref-send-me' => 'Баийта соьга:',
	'echo-pref-send-to' => 'Хаам баийта тӀе:',
	'echo-pref-email-format' => 'Хааман формат:',
	'echo-pref-web' => 'Веб',
	'echo-pref-email' => 'Электронан почта',
	'echo-pref-email-frequency-never' => 'Сан эл. почте ма баийта хаамаш',
	'echo-pref-email-frequency-immediately' => 'Къаьстина хаамаш тӀедаре хьаьжна',
	'echo-pref-email-frequency-daily' => 'ХӀор денна хаам',
	'echo-pref-email-frequency-weekly' => 'ХӀор кӀиранах хаам',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Цхьалхе йоза',
	'echo-pref-notify-show-link' => 'Сан панелан тӀехь гайта хаам',
	'echo-pref-new-message-indicator' => 'Сан панелан тӀехь гайта хааман индикатор',
	'echo-learn-more' => 'Цул совнаха хаа',
	'echo-new-messages' => 'Хьуна кхаьчна керла хаам',
	'echo-category-title-edit-user-talk' => 'Дийцаре агӀонехь {{PLURAL:$1|1=хаам|хаамаш}}', # Fuzzy
	'echo-category-title-article-linked' => 'АгӀона тӀе {{PLURAL:$1|1=хьажораг|хьажорагаш}}', # Fuzzy
	'echo-category-title-reverted' => '{{PLURAL:$1|1=юхадаккхар нисдар|юхадаккхар нисдарш}}', # Fuzzy
	'echo-category-title-mention' => '{{PLURAL:$1|1=хаам|хаамаш}}', # Fuzzy
	'echo-category-title-other' => '{{PLURAL:$1|1=кхин долу|кхин дерш}}', # Fuzzy
	'echo-category-title-system' => '{{PLURAL:$1|системан}}', # Fuzzy
	'echo-pref-tooltip-edit-user-talk' => 'Хаийта соьга, цхьам хаам баийтача я сан дийцаре агӀорахь жоп делча.',
	'echo-pref-tooltip-article-linked' => 'Хаийта соьга, цхьам ас кхоьллина агӀона тӀе хьажораг цхьан агӀонашкахь йитича.',
	'echo-pref-tooltip-reverted' => 'Хаийта соьга, цхьам сан нисдар юха даьккхича.',
	'echo-pref-tooltip-mention' => 'Хаийта соьга, цхьам сан долара агӀона тӀе хьажораг цхьан дийцаре агӀорахь йитича.',
	'echo-no-agent' => '[Цхьа а]',
	'echo-no-title' => '[АгӀо яц]',
	'echo-error-no-formatter' => 'Хааман формат билгалйина яц',
	'echo-error-preference' => 'ГӀала:Декъашхочун гӀирс нисбан цабелира',
	'echo-error-token' => 'ГӀалат:Декъашхочун (user token) маркер схьаэца тар цаделира',
	'notifications' => 'Хаамаш',
	'tooltip-pt-notifications' => 'Хьан хаамаш',
	'echo-specialpage' => 'Хаамаш',
	'echo-anon' => 'Хаамаш хилийта, [$1 декъашхочун дӀаяздар кхолла] я [$2 чугӀо].',
	'echo-none' => 'Хьуна хаамаш ца беара.',
	'echo-more-info' => 'Ма-дарра',
	'echo-feedback' => 'ЮхагӀо зӀе',
	'notification-link-text-view-message' => 'Хааме хьажар',
	'notification-link-text-view-mention' => 'Хааме хьажар',
	'notification-link-text-view-changes' => 'Хийцаме хьажар',
	'notification-link-text-view-page' => 'Хьажа агӀоне',
	'notification-link-text-view-edit' => 'Нисдаре хьажар',
	'notification-edit-talk-page2' => 'Декъашхочо [[User:$1|$1]] хьан [[User talk:$2#$3|дийцаре агӀонехь]] {{GENDER:$1|битина}}. хаам.',
	'notification-edit-talk-page-with-section' => 'Хьан дийцаре агӀонехь [[User:$1|$1]] {{GENDER:$1|битина}} хаам "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|Декъашхочо}} хьан [[User talk:$2#$3|дийцаре агӀонехь]] битина хаам.',
	'notification-edit-talk-page-flyout-with-section' => 'Хьан дийцаре агӀонехь $1 {{GENDER:$1|битина}} хаам "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => '[[:$2]] и {{GENDER:$1|йихкина}} оцу [[:$3]]. [[Special:WhatLinksHere/$2|Хьажа. ХӀокху агӀона массо хьажораш]].',
	'notification-page-linked-flyout' => '$2 и {{GENDER:$1|йихкина}} оцу [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|хаам биттина}} темехь "[[$3|$2]]" "$4" дийцаре агӀонехь.',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|тӀетоьхна}} керла тем "$2" [[$3]] агӀонехь.',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] хьога хаам {{GENDER:$1|хьажийна}}: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|хаам биттина}} темехь "[[$3#$2|$2]]" дийцаре агӀонехь.',
	'notification-mention' => '[[User:$1|$1]]  хьо {{GENDER:$1|хьахийна}} дийцаре агӀонехь $5 декъехь "[[$3#$2|$4]]".',
	'notification-mention-flyout' => 'хьо {{GENDER:$1|хьахийна}} дийцаре агӀонехь $5 декъехь "[[$3#$2|$4]]".',
	'notification-mention-nosection' => '[[User:$1|$1]] хьо хьахийна [[$3|дийцаре агӀонехь $2]].',
	'notification-mention-nosection-flyout' => '{{GENDER:$1||декъашхочо}} хьо хьахийна [[$3|дийцаре агӀонехь $2]].',
	'notification-user-rights' => 'Хьан бакъонаш [[Special:Log/rights/$1|{{GENDER:$1|хийцина}}]] [[User:$1|$1]]. $2. [[Special:ListGroupRights|Мадарра]]',
	'notification-user-rights-flyout' => 'Декъашхочун бакъонаш {{GENDER:$1|хийцина}} $1. $2. [[Special:ListGroupRights|Мадарра]]',
	'notification-user-rights-add' => 'ХӀинца хьо {{PLURAL:$2|1=тобан юкъа эцна|тобаншан юкъа эцна}}: $1', # Fuzzy
	'notification-user-rights-remove' => 'Хьан хӀокху {{PLURAL:$2|1=тобан|тобашан}} бакъо дӀаяьккхина: $1', # Fuzzy
	'notification-new-user' => 'Марша догӀилла {{SITENAME}}, $1! Хьо кхузахь хиларна даккхийде тхо.',
	'notification-reverted2' => '{{PLURAL:$4|1=АгӀонехь [[:$2]] хьан нисдар|АгӀонехь [[:$2]] хьан нисдарш}}  {{GENDER:$1|юхадаькхина}} [[User:$1|$1]]. $3', # Fuzzy
	'notification-reverted-flyout2' => '{{PLURAL:$4|1=АгӀонехь $2 хьан нисдар|АгӀонехь $2 хьан нисдарш}} {{GENDER:$1|юхадаькхина}} $1. $3', # Fuzzy
	'notification-edit-talk-page-email-subject2' => '{{GENDER:$1|Декъашхочо}} $1 «{{SITENAME}}» сайтехь хьуна хаам {{GENDER:$1|биттина}}',
	'notification-edit-talk-page-email-batch-body2' => 'Хьан дийцаре агӀонехь {{GENDER:$1|декъашхочо}} $1 {{GENDER:$1|битина}} хаам:',
	'notification-edit-talk-page-email-batch-body-with-section' => 'Хьан дийцаре агӀонехь {{GENDER:$1|декъашхочо}} $1 {{GENDER:$1|битина}} хаам (темехь) «$2»',
	'notification-page-linked-email-subject' => '«{{SITENAME}}» сайтехь хьан декъашхочун агӀона тӀе хьажораг хӀоттина',
	'notification-page-linked-email-batch-body' => '{{GENDER:$1|Декъашхо}} $1 {{GENDER:$1|тӀетеввжина}} цу $2 $3',
	'notification-reverted-email-subject2' => '{{GENDER:$1|Цхьам}} «{{SITENAME}}» сайтехь хьан {{PLURAL:$3|1=нисдар юхадаькхина|нисдарш юхадаьхина}}', # Fuzzy
	'notification-reverted-email-batch-body2' => '{{GENDER:$1|Декъашхочо}} $1 {{PLURAL:$3|1=«$2» агӀонехь хьан нисдар юхадаьккхина|«$2» агӀонехь хьан нисдарш юхадаьхина}}.', # Fuzzy
	'notification-mention-email-subject' => '$1 {{GENDER:$1|Декъашхочо}} «{{SITENAME}}» сайтехь хьо хьахийна',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|хьахийна}} хьо $4 дийцарийн агӀо "$3".',
	'notification-mention-nosection-email-batch-body' => '$1 декъашхочо хьо хьахийна $2 агӀона чохь.',
	'notification-user-rights-email-subject' => 'Сайтехь «{{SITENAME}}» хьан бакъонаш хийцина',
	'notification-user-rights-email-batch-body' => '{{GENDER:$1|Декъашхочо}} хьан бакъонаш хийцина $1. $2.',
	'echo-email-subject-default' => 'Сайтехь «{{SITENAME}}» керла хаам',
	'echo-email-body-default' => 'Сайтехь «{{SITENAME}}» хьога керла хаам бу:

$1',
	'echo-email-batch-body-default' => 'Хьан керла хаам бу',
	'echo-email-footer-default' => '$2

Электронан почте муьлха хаамаш богӀуш бу хьажа а уьш дӀанисбан а декъашхочун гӀирсе хьажа :
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Электронан почте муьлха хаамаш бохуш бу хьажа а уьш дӀанисбан а <a href="$2" style="text-decoration:none; color: #3868B0;">Википедин почтан гӀирсе хьажа </a><br />
$1',
	'echo-overlay-link' => 'Массо хаамаш',
	'echo-overlay-title' => '<b>Хаамаш</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Хаам}}</b> ({{PLURAL:$1|гайтина}} $1 царах $2 {{PLURAL:$2|беша бац}})', # Fuzzy
	'echo-mark-all-as-read' => 'Массо билгал йе еша сана',
	'echo-date-today' => 'Тахана',
	'echo-date-yesterday' => 'Селхана',
	'echo-load-more-error' => 'Кхин тӀе хилам схьаоьцуш гӀалат хила',
	'notification-edit-talk-page-bundle' => '$1 а $3 {{PLURAL:$4|кхи}} {{GENDER:$1|декъашхоша}} хьан [[User talk:$2|дийцаре агӀонехь хаам битина]].', # Fuzzy
	'notification-page-linked-bundle' => 'АгӀона тӀе «$2» {{GENDER:$1|хьажораг}} ю «$3» агӀона чура а кхин $4 {{PLURAL:$5|1=агӀона|агӀонашан}}. [[Special:WhatLinksHere/$2|Хьажа массо хьажорагашка]]', # Fuzzy
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 а $2 {{PLURAL:$3|кхин}} {{GENDER:$1|декъашхоша}} хьан дийцаре агӀонехь хаам битина.', # Fuzzy
	'notification-page-linked-email-batch-bundle-body' => 'АгӀона «$2» тӀе {{GENDER:$1|хьажораг ю}} «$3» агӀона чура а кхин $4 {{PLURAL:$5|1=агӀона|агӀонашан}} чура а', # Fuzzy
	'echo-email-batch-subject-daily' => 'Хьоьга кхаьчна $2 {{PLURAL:$2|1=керла хаам|керла хаамаш}} «{{SITENAME}}» проектехь', # Fuzzy
	'echo-email-batch-subject-weekly' => 'ХӀокху кӀиран чохь хьоьга кхаьчна $2 {{PLURAL:$2|1=керла хаам|керла хаамаш}} «{{SITENAME}}» проектехь', # Fuzzy
	'echo-email-batch-body-intro-daily' => 'Маршалла, $1!
Тахан хилларг {{SITENAME}}.',
	'echo-email-batch-body-intro-weekly' => 'Маршалла, $1!
Тахан хилларг {{SITENAME}}.',
	'echo-email-batch-link-text-view-all-notifications' => 'Массо хаамашка хьажар',
	'echo-rev-deleted-text-view' => 'Хьара агӀона верси къайлаяьккхина',
);

/** Sorani Kurdish (کوردی)
 * @author Calak
 */
$messages['ckb'] = array(
	'echo-desc' => 'سیستەمی ئاگادارییەکان',
	'prefs-echo' => 'ئاگادارییەکان',
	'prefs-emailsettings' => 'ھەڵبژاردەکانی ئیمەیل',
	'prefs-displaynotifications' => 'ھەڵبژاردەکانی پێشاندان',
	'prefs-echosubscriptions' => 'سەبارەت بەم ڕووداوانە ئاگادارم بکە',
	'prefs-newmessageindicator' => 'نیشاندەری پەیامی نوێ',
	'echo-pref-send-me' => 'بۆم بنێرە:',
	'echo-pref-send-to' => 'بنێرە بۆ:',
	'echo-pref-email-format' => 'جۆری ئیمەیل:',
	'echo-pref-web' => 'وێب',
	'echo-pref-email' => 'ئیمەیل',
	'echo-pref-email-frequency-never' => 'ھیچ ئاگاداراییەکم بە ئیمەیل بۆ مەنێرە',
	'echo-pref-email-frequency-immediately' => 'ئاگادارییە تاکەکەسییەکان ھەر وەکی دێن',
	'echo-pref-email-frequency-daily' => 'کورتەیەکی رۆژانەی ئاگادارییەکان',
	'echo-pref-email-frequency-weekly' => 'کورتەیەکی حەفتانەی ئاگادارییەکان',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'دەقی ساکار',
	'echo-pref-notify-show-link' => 'ئاگادارییەکان لە تووڵامرازەکەمدا نیشان بدە',
	'echo-pref-new-message-indicator' => 'نیشاندەری پەیامی پەڕەی لێدوان لە تووڵامرازەکەمدا نیشان بدە',
	'echo-learn-more' => 'زۆرتر بزانە',
	'echo-new-messages' => 'پەیامی نوێت ھەیە',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|پەیام|پەیامەکان}}ی پەڕەی لێدوان',
	'echo-category-title-article-linked' => '{{PLURAL:$1|بەستەر|بەستەرەکان}}ی پەڕە',
	'echo-category-title-reverted' => '{{PLURAL:$1|گەڕاندنەوە|گەڕاندنەوەکان}}ی دەستکاری',
	'echo-category-title-mention' => '{{PLURAL:$1|ئاماژە|ئاماژەکان}}',
	'echo-category-title-other' => '{{PLURAL:$1|دیکە}}',
	'echo-category-title-system' => '{{PLURAL:$1|سیستەم}}',
	'echo-pref-tooltip-edit-user-talk' => 'کاتێک کەسێک لە پەڕەی لێدوانمدا پەیامێکی نارد یان وەڵامی دامەوە، ئاگادارم بکە.',
	'echo-pref-tooltip-article-linked' => 'کاتێک کەسێک لە پەڕەیەکی وتاردا بە پەڕەیەک کە من دروستم کردووە بەستەری دا، ئاگادارم بکە.',
	'echo-pref-tooltip-reverted' => 'کاتێک کەسێک دەستکارییەکی من کردوومە بە ئامرازی پووچەڵکردنەوە یان گەڕاندنەوە دەگەڕێنێتەوە، ئاگادارم بکە.',
	'echo-pref-tooltip-mention' => 'کاتێک کەسێک لە پەڕەیەکی لێدواندا بە پەڕەی بەکارھێنەریی من بەستەری دا، ئاگادارم بکە.',
	'echo-no-agent' => '[هیچ کەس]',
	'echo-no-title' => '[بێ سەردێڕ]',
	'echo-error-no-formatter' => 'ھیچ شێوازێک بۆ ئاگاداری دیاری نەکراوە.',
	'echo-error-preference' => 'ھەڵە: ھەڵبژاردەکانی بەکارھێنەر ڕێک ناخرێ.',
	'echo-error-token' => 'ھەڵە: نیشانی بەکارھێنەر وەرناگیرێ.',
	'notifications' => 'ئاگادارییەکان',
	'tooltip-pt-notifications' => 'ئاگادارییەکانت',
	'echo-specialpage' => 'ئاگادارییەکان',
	'echo-anon' => 'بۆ وەرگرتنی ئاگادارییەکان، [$1 ھەژمارێک دروست بکە] یان [$2 بچۆ ژوورەوە].',
	'echo-none' => 'ئاگادارییەکت نییە.',
	'echo-more-info' => 'زانیاریی زیاتر',
	'echo-feedback' => 'بەردەنگ',
	'notification-link-text-view-message' => 'پەیام ببینە',
	'notification-link-text-view-mention' => 'ئاماژە ببینە',
	'notification-link-text-view-changes' => 'گۆڕانکارییەکان ببینە',
	'notification-link-text-view-page' => 'پەڕە ببینە',
	'notification-link-text-view-edit' => 'دەستکاری ببینە',
	'notification-edit-talk-page2' => '[[User:$1|$1]] پەیامێکی لە [[User talk:$2#$3|پەڕەی لێدوان]]تدا {{GENDER:$1|نووسی}}.',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] پەیامێکی لە [[User talk:$2#$3|پەڕەی لێدوان]]ت لە "[[User talk:$2#$3|$4]]"دا {{GENDER:$1|نووسی}}.',
	'notification-edit-talk-page-flyout2' => '$1 پەیامێکی لە [[User talk:$2#$3|پەڕەی لێدوان]]تدا {{GENDER:$1|نووسی}}.',
	'notification-edit-talk-page-flyout-with-section' => '$1 پەیامێکی لە [[User talk:$2#$3|پەڕەی لێدوان]]ت لە "[[User talk:$2#$3|$4]]"دا {{GENDER:$1|نووسی}}.',
	'notification-page-linked' => '[[:$2]] لە [[:$3]]دا {{GENDER:$1|بەستەر درا}}. [[Special:WhatLinksHere/$2|ھەموو بەستەرە بەسراوەکان بەم پەڕەیەوە ببینە]].',
	'notification-page-linked-flyout' => '$2 لە [[:$3]]دا {{GENDER:$1|بەستەر درا}}.',
	'notification-add-comment2' => '[[User:$1|$1]] لە «[[$3|$2]]»ی پەڕەی لێدوانی «$4»دا بۆچۆنی نووسی.',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] بابەتی نوێی «$2»ی لە [[$3]]دا نووسی.',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] پەیامێکی بۆ ناردی: «[[$3#$2|$2]]».',
	'notification-add-comment-yours2' => '[[User:$1|$1]] لە «[[$3#$2|$2]]»ی پەڕەی لێدوانتدا بۆچۆنی نووسی.',
	'notification-mention' => '[[User:$1|$1]] لە پەڕەی لێدوانی $5 لە «[[$3#$2|$4]]»دا ئاماژەی پێ‌کردی.',
	'notification-mention-flyout' => '$1 لە پەڕەی لێدوانی $5 لە «[[$3#$2|$4]]»دا ئاماژەی پێ‌کردی.',
	'notification-mention-nosection' => '[[User:$1|$1]]  لە [[$3|پەڕەی لێدوانی $2]]دا ئاماژەی {{GENDER:$1| پێ‌کردی}}.',
	'notification-mention-nosection-flyout' => '$1  لە [[$3|پەڕەی لێدوانی $2]]دا ئاماژەی {{GENDER:$1| پێ‌کردی}}.',
	'notification-user-rights' => 'مافەکانی بەکارھێنەریت لە لایەن [[User:$1|$1]]ەوە [[Special:Log/rights/$1|{{GENDER:$1|گۆڕدرا}}]]. $2. [[Special:ListGroupRights|زیاتر بزانە]]',
	'notification-user-rights-flyout' => 'مافەکانی بەکارھێنەریت لە لایەن $1ەوە {{GENDER:$1|گۆڕدرا}}. $2. [[Special:ListGroupRights|زیاتر بزانە]]',
	'notification-user-rights-add' => 'تۆ ھەر ئێستا ئەندامی ئەم {{PLURAL:$2|گرووپە|گرووپانە}}ی: $1',
	'notification-user-rights-remove' => 'تۆ ئیتر ئەندامی ئەم {{PLURAL:$2|گرووپە|گرووپانە}} نی: $1',
	'notification-new-user' => 'بەخێرھاتی بۆ {{SITENAME}}، $1! کەیفخۆشین لێرەی.',
	'notification-reverted2' => '{{PLURAL:$4|دەستکارییەکەت|دەستکارییەکانت}} لە [[:$2]]دا لە لایەن [[User:$1|$1]]ەوە {{GENDER:$1|گەڕێنرایەوە}}. $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|دەستکارییەکەت|دەستکارییەکانت}} لە $2دا لە لایەن $1ەوە {{GENDER:$1|گەڕێنرایەوە}}. $3',
	'notification-edit-talk-page-email-subject2' => '$1 لە {{SITENAME}}دا پەیامێکی بۆ ناردی.',
	'notification-edit-talk-page-email-batch-body2' => '$1 لە پەڕەی لێدوانتدا پەیامێکی نارد.',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 لە پەڕەی لێدوانت لە «$2»دا پەیامێکی نارد.',
	'notification-page-linked-email-subject' => 'پەڕەکەت لە {{SITENAME}}دا بەستەر درا.',
	'notification-page-linked-email-batch-body' => '$2 لە $3دا {{GENDER:$1|بەستەر درا}}.',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|دەستکارییەکەت|دەستکارییەکانت}} لە {{SITENAME}}دا {{GENDER:$1|گەڕێنرایەوە}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|دەستکارییەکەت|دەستکارییەکانت}} لە $2دا لە لایەن $1ەوە {{GENDER:$1|گەڕێنرایەوە}}.',
	'notification-mention-email-subject' => '$1 لە {{SITENAME}}دا ئاماژەی پێ‌کردی.',
	'notification-mention-email-batch-body' => '$1 لە پەڕەی لێدوانی $4 لە «$3»دا ئاماژەی پێ‌کردی.',
	'notification-mention-nosection-email-batch-body' => '$1 لە پەڕەی لێدوانی $2دا ئاماژەی {{GENDER:$1|پێ‌کردی}}.',
	'notification-user-rights-email-subject' => 'مافەکانی بەکارھێنەریت لە {{SITENAME}}دا گۆڕدرا.',
	'notification-user-rights-email-batch-body' => 'مافەکانی بەکارھێنەریت لە لایەن $1ەوە گۆڕدرا. $2.',
	'echo-email-subject-default' => 'ئاگادارییەکی نوێ لە {{SITENAME}}',
	'echo-email-body-default' => 'ئاگادارییەکی نوێت ھەیە لە {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'ئاگادارییەکی نوێت ھەیە.',
	'echo-email-footer-default' => '$2

بۆ کۆنترۆڵی ئەو ئیمەیلانەی بۆت دەنێرین، ھەڵبژاردەکانت تاوتوێ بکە:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => '

بۆ کۆنترۆڵی ئەو ئیمەیلانەی بۆت دەنێرین، <a href="$2" style="text-decoration:none; color: #3868B0;">ھەڵبژاردەکانت تاوتوێ بکە</a>.<br />:
$1',
	'echo-overlay-link' => 'ھەموو ئاگادارییەکان',
	'echo-overlay-title' => '<b>ئاگادارییەکان</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|ئاگادارییەکان}}</b> (نیشاندانی $1 لە $2ی نەخوێنراو)',
	'echo-mark-all-as-read' => 'ھەموویان وەک خوێنراوە نیشان بکە',
	'echo-date-today' => 'ئەمڕۆ',
	'echo-date-yesterday' => 'دوێنێ',
	'echo-load-more-error' => 'ھەڵەیەک لە کاتی وەرگرتنی ئاکامی زیاتر ڕووی دا.',
	'notification-edit-talk-page-bundle' => '$1 و $3ی {{PLURAL:$4|تر}} لە  [[User talk:$2|پەڕەی لێدوان]]تدا پەیامێکیان ناردووە.',
	'notification-page-linked-bundle' => '$2 لە $3 و $4 {{PLURAL:$5|پەڕە}}ی تردا {{GENDER:$1|بەستەر درا}}. [[Special:WhatLinksHere/$2|ھەموو بەسراوەکان بەم پەڕەیە ببینە]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 و $2ی {{PLURAL:$3|تر}} لە پەڕەی لێدوانتدا پەیامێکیان ناردووە.',
	'notification-page-linked-email-batch-bundle-body' => '$2 لە $3 و $4 {{PLURAL:$5|پەڕە}}ی تردا {{GENDER:$1|بەستەر درا}}.',
	'echo-email-batch-subject-daily' => 'لە {{SITENAME}}دا {{PLURAL:$2|ئاگادارییەکی نوێت|ئاگاداریی نوێت}} ھەیە',
	'echo-email-batch-subject-weekly' => 'لە {{SITENAME}}دا {{PLURAL:$2|ئاگادارییەکی نوێت|ئاگاداریی نوێت}} لەم حەفتەیەدا ھەیە',
	'echo-email-batch-body-intro-daily' => 'سڵاو $1،
ئەمە کۆرتەیەکە لە چالاکییەکانی ئەمرۆی {{SITENAME}} بۆ تۆ.',
	'echo-email-batch-body-intro-weekly' => 'سڵاو $1،
ئەمە کۆرتەیەکە لە چالاکییەکانی حەفتانەی {{SITENAME}} بۆ تۆ.',
	'echo-email-batch-link-text-view-all-notifications' => 'ھەموو ئاگادارییەکان ببینە',
	'echo-rev-deleted-text-view' => 'پێداچوونەوەی ئەم پەڕەیە بێسراوە.',
);

/** Czech (čeština)
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
	'prefs-newmessageindicator' => 'Indikátor nových zpráv',
	'echo-pref-send-me' => 'Posílejte mi:',
	'echo-pref-send-to' => 'Posílat na:',
	'echo-pref-email-format' => 'Formát e-mailu:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-mail',
	'echo-pref-email-frequency-never' => 'Neposílejte mi žádná upozornění e-mailem',
	'echo-pref-email-frequency-immediately' => 'Jednotlivá upozornění, jakmile se objeví',
	'echo-pref-email-frequency-daily' => 'Denní souhrn upozornění',
	'echo-pref-email-frequency-weekly' => 'Týdenní souhrn upozornění',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Prostý text',
	'echo-pref-notify-show-link' => 'Zobrazovat upozornění v panelu nástrojů',
	'echo-pref-new-message-indicator' => 'Zobrazit indikátor diskusních zpráv v mém panelu nástrojů',
	'echo-learn-more' => 'Další informace',
	'echo-new-messages' => 'Máte nové zprávy',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|příspěvek|příspěvky}} v diskusi',
	'echo-category-title-article-linked' => '{{PLURAL:$1|odkaz|odkazy}} na stránku',
	'echo-category-title-reverted' => '{{PLURAL:$1|vrácenou úpravu|vrácené úpravy}}',
	'echo-category-title-mention' => '{{PLURAL:$1|zmínku|zmínky}}',
	'echo-category-title-other' => '{{PLURAL:$1|jinou událost|jiné události}}',
	'echo-category-title-system' => '{{PLURAL:$1|systémovou událost|systémové události}}',
	'echo-pref-tooltip-edit-user-talk' => 'Upozorněte mě, když mi někdo na mé diskusní stránce napíše zprávu nebo odpoví.',
	'echo-pref-tooltip-article-linked' => 'Upozorněte mě, když někdo na stránku, kterou jsem založil, odkáže z článku.',
	'echo-pref-tooltip-reverted' => 'Upozorněte mě, když někdo úpravu, kterou jsem provedl, vrátí pomocí nástrojů pro zrušení editace nebo vrácení zpět.',
	'echo-pref-tooltip-mention' => 'Upozorněte mě, když někdo v libovolné diskusi odkáže na mou uživatelskou stránku.',
	'echo-no-agent' => '[Nikdo]',
	'echo-no-title' => '[Žádná stránka]',
	'echo-error-no-formatter' => 'Upozornění nemá definováno formátování',
	'echo-error-preference' => 'Chyba: Nepodařilo se uložit uživatelské nastavení',
	'echo-error-token' => 'Chyba: Nepodařilo se získat uživatelský token',
	'notifications' => 'Upozornění',
	'tooltip-pt-notifications' => 'Vaše upozornění',
	'echo-specialpage' => 'Upozornění',
	'echo-anon' => 'Pro zobrazování upozornění je nutné [$1 vytvořit si účet] nebo [$2 se přihlásit].',
	'echo-none' => 'Nemáte žádné upozornění.',
	'echo-more-info' => 'Více informací',
	'echo-feedback' => 'Názor',
	'echo-quotation-marks' => '„$1“',
	'notification-link-text-view-message' => 'Zobrazit zprávu',
	'notification-link-text-view-mention' => 'Zobrazit zmínku',
	'notification-link-text-view-changes' => 'Zobrazit změny',
	'notification-link-text-view-page' => 'Zobrazit stránku',
	'notification-link-text-view-edit' => 'Zobrazit editaci',
	'notification-edit-talk-page2' => '[[User:$1|$1]] vám {{GENDER:$1|napsal|napsala}} na [[User talk:$2#$3|vaši diskusní stránku]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] vám {{GENDER:$1|napsal|napsala}} na vaši diskusní stránku k „[[User talk:$2#$3|$4]]“.',
	'notification-edit-talk-page-flyout2' => '$1 vám {{GENDER:$1|napsal|napsala}} na [[User talk:$2#$3|vaši diskusní stránku]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 vám {{GENDER:$1|napsal|napsala}} na vaši diskusní stránku k „[[User talk:$2#$3|$4]]“.',
	'notification-page-linked' => 'Do stránky [[:$3]] {{GENDER:$1|byl přidán}} odkaz na stránku [[:$2]]. [[Special:WhatLinksHere/$2|Zobrazit všechny odkazy na tuto stránku]].',
	'notification-page-linked-flyout' => 'Do stránky [[:$3]] {{GENDER:$1|byl přidán}} odkaz na stránku $2.',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|přidal|přidala}} komentář k „[[$3|$2]]“ na stránce „$4“',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|přidal|přidala}} komentář na nové téma „$2“ na stránce „[[$3]]“',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] vám {{GENDER:$1|poslal|poslala}} zprávu: „[[$3#$2|$2]]“',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|přidal|přidala}} komentář k „[[$3#$2|$2]]“ na vaší diskusní stránce',
	'notification-mention' => '[[User:$1|$1]] vás {{GENDER:$1|zmínil|zmínila}} v diskusi {{GENDER:$5|uživatele|uživatelky}} $5 u „[[$3#$2|$4]]“.',
	'notification-mention-flyout' => '$1 vás {{GENDER:$1|zmínil|zmínila}} v diskusi {{GENDER:$5|uživatele|uživatelky}} $5 u „[[$3#$2|$4]]“.',
	'notification-mention-nosection' => '[[User:$1|$1]] vás {{GENDER:$1|zmínil|zmínila}} v [[$3|diskusi ke stránce $2]].',
	'notification-mention-nosection-flyout' => '$1 vás {{GENDER:$1|zmínil|zmínila}} v [[$3|diskusi ke stránce $2]].',
	'notification-user-rights' => '[[User:$1|$1]] [[Special:Log/rights/$1|{{GENDER:$1|změnil|změnila}}]] vaše uživatelská práva. $2. [[Special:ListGroupRights|Více informací]]',
	'notification-user-rights-flyout' => '$1 {{GENDER:$1|změnil|změnila}} vaše uživatelská práva. $2. [[Special:ListGroupRights|Více informací]]',
	'notification-user-rights-add' => 'Nyní patříte do {{PLURAL:$2|této skupiny|těchto skupin}}: $1',
	'notification-user-rights-remove' => 'Nadále už nepatříte do {{PLURAL:$2|této skupiny|těchto skupin}}: $1',
	'notification-new-user' => 'Vítejte na {{grammar:6sg|{{SITENAME}}}}, $1! Těší nás, že jste tu.',
	'notification-reverted2' => '[[User:$1|$1]] {{GENDER:$1|revertoval|revertovala}} {{PLURAL:$4|vaši editaci|vaše editace}} stránky [[:$2]] $3',
	'notification-reverted-flyout2' => '$1 {{GENDER:$1|revertoval|revertovala}} {{PLURAL:$4|vaši editaci|vaše editace}} stránky $2 $3',
	'notification-edit-talk-page-email-subject2' => '$1 vám na {{grammar:6sg|{{SITENAME}}}} {{GENDER:$1|napsal|napsala}} zprávu.',
	'notification-edit-talk-page-email-batch-body2' => '$1 vám {{GENDER:$1|napsal|napsala}} na vaši diskusní stránku:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 vám {{GENDER:$1|napsal|napsala}} na vaši diskusní stránku k „$2“.',
	'notification-page-linked-email-subject' => 'Na {{grammar:6sg|{{SITENAME}}}} někdo odkázal na vaši stránku.',
	'notification-page-linked-email-batch-body' => 'Do stránky $3 {{GENDER:$1|byl přidán}} odkaz na stránku $2',
	'notification-reverted-email-subject2' => '$1 {{GENDER:$1|revertoval|revertovala}} {{PLURAL:$3|vaši editaci|vaše editace}} na {{grammar:6sg|{{SITENAME}}}}',
	'notification-reverted-email-batch-body2' => '$1 {{GENDER:$1|revertoval|revertovala}} {{PLURAL:$3|vaši editaci|vaše editace}} stránky $2.',
	'notification-mention-email-subject' => '$1 vás na {{grammar:6sg|{{SITENAME}}}} {{GENDER:$1|zmínil|zmínila}}',
	'notification-mention-email-batch-body' => '$1 vás {{GENDER:$1|zmínil|zmínila}} v diskusi {{GENDER:$4|uživatele|uživatelky}} $4 u „$3“.',
	'notification-mention-nosection-email-batch-body' => '$1 vás {{GENDER:$1|zmínil|zmínila}} v diskusi ke stránce $2.',
	'notification-user-rights-email-subject' => 'Na {{grammar:6sg|{{SITENAME}}}} byla změněna vaše uživatelská práva',
	'notification-user-rights-email-batch-body' => '$1 {{GENDER:$1|změnil|změnila}} vaše uživatelská práva. $2',
	'echo-email-subject-default' => 'Nové upozornění na {{grammar:6sg|{{SITENAME}}}}',
	'echo-email-body-default' => 'Na {{grammar:6sg|{{SITENAME}}}} máte nové upozornění:

$1',
	'echo-email-batch-body-default' => 'Máte nové upozornění',
	'echo-email-footer-default' => '$2

Posílání e-mailů si můžete přizpůsobit v nastavení:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Posílání e-mailů si můžete přizpůsobit <a href="$2" style="text-decoration:none; color: #3868B0;">v nastavení</a>.<br />
$1',
	'echo-overlay-link' => 'Všechna upozornění',
	'echo-overlay-title' => '<b>Upozornění</b>',
	'echo-overlay-title-overflow' => '<b>Upozornění</b> (zobrazuje se $1 z $2 {{PLURAL:$1|nepřečteného|nepřečtených}})',
	'echo-mark-all-as-read' => 'Označit vše jako přečtené',
	'echo-date-today' => 'Dnes',
	'echo-date-yesterday' => 'Včera',
	'echo-load-more-error' => 'Při načítání dalších výsledků došlo k chybě.',
	'notification-edit-talk-page-bundle' => '$1 a $3 {{PLURAL:$4|další}} vám napsali na [[User talk:$2|vaši diskusní stránku]].',
	'notification-page-linked-bundle' => 'Do stránky $3 a $4 {{PLURAL:$5|další stránky|dalších stránek}} {{GENDER:$1|byly přidány}} odkazy na stránku $2: [[Special:WhatLinksHere/$2|Zobrazit všechny odkazy na tuto stránku]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 a $2 {{PLURAL:$3|další}} vám napsali na vaši diskusní stránku',
	'notification-page-linked-email-batch-bundle-body' => 'Do stránky $3 a $4 {{PLURAL:$5|další stránky|dalších stránek}} {{GENDER:$1|byly přidány}} odkazy na stránku $2',
	'echo-email-batch-subject-daily' => 'Na {{grammar:6sg|{{SITENAME}}}} dnes máte {{PLURAL:$2|nové|nová}} upozornění',
	'echo-email-batch-subject-weekly' => 'Na {{grammar:6sg|{{SITENAME}}}} máte tento týden {{PLURAL:$2|nové|nová}} upozornění',
	'echo-email-batch-body-intro-daily' => 'Ahoj, uživateli $1,

zde pro vás máme shrnutí dnešní aktivity na {{grammar:6sg|{{SITENAME}}}}',
	'echo-email-batch-body-intro-weekly' => 'Ahoj, uživateli $1,

zde pro vás máme shrnutí aktivity na {{grammar:6sg|{{SITENAME}}}} za tento týden',
	'echo-email-batch-link-text-view-all-notifications' => 'Zobrazit všechna upozornění',
	'echo-rev-deleted-text-view' => 'Tato verze stránky byla utajena',
);

/** Church Slavic (словѣньскъ / ⰔⰎⰑⰂⰡⰐⰠⰔⰍⰟ)
 * @author ОйЛ
 */
$messages['cu'] = array(
	'echo-learn-more' => 'поꙁнаи вѧщє',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|напьсаниѥ|напьсании|напьсаниꙗ}} бєсѣдꙑ страницѣ',
	'echo-category-title-system' => '{{PLURAL:$1|сѷстима}}',
	'echo-date-yesterday' => 'вьчєра',
);

/** Welsh (Cymraeg)
 * @author Lloffiwr
 */
$messages['cy'] = array(
	'echo-desc' => 'Sustem hysbysu',
	'prefs-echo' => 'Hysbysiadau',
	'prefs-emailsettings' => 'Dewisiadau ebost',
	'prefs-displaynotifications' => 'Dewisiadau arddangos',
	'prefs-echosubscriptions' => 'Hysbyswch fi am y digwyddiadau hyn',
	'prefs-newmessageindicator' => 'Arwyddo negeseuon newydd',
	'echo-pref-send-me' => 'Anfon ataf:',
	'echo-pref-send-to' => 'Anfon at:',
	'echo-pref-email-format' => 'Fformat yr ebost:',
	'echo-pref-web' => 'Gwe',
	'echo-pref-email' => 'Ebost',
	'echo-pref-email-frequency-never' => 'Peidio ag anfon unrhyw hysbysiadau ebost ataf',
	'echo-pref-email-frequency-immediately' => 'Hysbysiadau unigol pan ddigwyddant',
	'echo-pref-email-frequency-daily' => "Crynodeb dyddiol o'r hysbysiadau",
	'echo-pref-email-frequency-weekly' => "Crynodeb wythnosol o'r hysbysiadau",
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Testun plaen',
	'echo-pref-notify-show-link' => 'Dangos hysbysiadau yn fy mar offer',
	'echo-pref-new-message-indicator' => 'Dangos arwydd bod neges newydd ar fy nhudalen sgwrs yn fy mar offer',
	'echo-learn-more' => 'Darllen mwy',
	'echo-new-messages' => 'Mae negeseuon newydd gennych',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|negeseuon}} ar dudalennau sgwrs',
	'echo-category-title-article-linked' => '{{PLURAL:$1|cysylltau i dudalennau}}',
	'echo-category-title-reverted' => '{{PLURAL:$1|dadwneud golygiadau}}',
	'echo-category-title-mention' => '{{PLURAL:$1|cyfeiriadau}}',
	'echo-category-title-other' => '{{PLURAL:$1|Arall}}',
	'echo-category-title-system' => '{{PLURAL:$1|sustem}}',
	'echo-pref-tooltip-edit-user-talk' => 'Fy hysbysu pan fo rhywun yn gadael neges neu ateb ar fy nhudalen sgwrs.',
	'echo-pref-tooltip-article-linked' => 'Fy hysbysu pan fo rhywun yn gosod cyswllt o ryw erthygl i dudalen a ddechreuais i.',
	'echo-pref-tooltip-reverted' => "Hysbyswch fi pan fo rhywun yn dadwneud golygiad o'm heiddo i, drwy ddefnyddio'r teclynnau dadwneud neu wrthdroi.",
	'echo-pref-tooltip-mention' => 'Hysbyswch fi pan fo rhywun yn gosod cyswllt at fy nhudalen defnyddiwr oddi wrth rhyw dudalen sgwrs.',
	'echo-no-agent' => '[Neb]',
	'echo-no-title' => '[Dim tudalen]',
	'echo-error-no-formatter' => "Ni phenwyd unrhyw fformat i'r hysbysiad.",
	'echo-error-preference' => "Gwall: Ni ellid gosod y dewis yn newisiadau'r defnyddiwr.",
	'echo-error-token' => 'Gwall: Ni ellid adalw tocyn y defnyddiwr.',
	'notifications' => 'Hysbysiadau',
	'tooltip-pt-notifications' => 'Eich hysbysiadau',
	'echo-specialpage' => 'Hysbysiadau',
	'echo-anon' => 'Er mwyn derbyn hysbysiadau, [$1 dechreuwch gyfrif] neu [$2 mewngofnodwch].',
	'echo-none' => 'Nid oes unrhyw hysbysiadau gennych.',
	'echo-more-info' => 'Mwy o wybodaeth',
	'echo-feedback' => 'Adborth',
	'notification-link-text-view-message' => 'Gweld y neges',
	'notification-link-text-view-mention' => 'Gweld y crybwyll',
	'notification-link-text-view-changes' => 'Gweld y newidiadau',
	'notification-link-text-view-page' => 'Gweld y dudalen',
	'notification-link-text-view-edit' => 'Gweld y golygiad',
	'notification-edit-talk-page2' => '{{GENDER:$1|Gadawodd}} [[User:$1|$1]] neges ar eich [[User talk:$2#$3|tudalen sgwrs]].',
	'notification-edit-talk-page-with-section' => '{{GENDER:$1|Gadawodd}} [[User:$1|$1]] neges ar eich tudalen sgwrs yn yr adran "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '{{GENDER:$1|Gadawodd}} $1 neges ar eich [[User talk:$2#$3|tudalen sgwrs]].',
	'notification-edit-talk-page-flyout-with-section' => '{{GENDER:$1|Gadawodd}} $1 neges ar eich tudalen sgwrs yn yr adran "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => "{{GENDER:$1|Cysylltwyd}} [[:$2]] o [[:$3]]. [[Special:WhatLinksHere/$2|Gweler yr holl gysylltau i'r dudalen hon]].",
	'notification-page-linked-flyout' => '{{GENDER:$1|Cysylltwyd}} $2 o [[:$3]].',
	'notification-add-comment2' => '{{GENDER:$1|Gadawodd}} [[User:$1|$1]] sylw am "[[$3|$2]]" ar y dudalen sgwrs "$4".',
	'notification-add-talkpage-topic2' => '{{GENDER:$1|Gosododd}} [[User:$1|$1]] sylw ar y pwnc newydd "$2" ar [[$3]].',
	'notification-add-talkpage-topic-yours2' => '{{GENDER:$1|Anfonodd}} [[User:$1|$1]] neges atoch: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '{{GENDER:$1|Gosododd}} [[User:$1|$1]] sylw am "[[$3#$2|$2]]" ar eich tudalen sgwrs.',
	'notification-mention' => '{{GENDER:$1|Cyfeiriodd}} [[User:$1|$1]] atoch ar dudalen sgwrs $5 yn yr adran "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '{{GENDER:$1|Cyfeiriodd}} $1 atoch ar dudalen sgwrs $5 yn yr adran "[[$3#$2|$4]]".',
	'notification-mention-nosection' => '{{GENDER:$1|Cyfeiriodd}} [[User:$1|$1]] atoch ar [[$3|dudalen sgwrs $2]].',
	'notification-mention-nosection-flyout' => '{{GENDER:$1|Cyfeiriodd}} $1 atoch ar [[$3|dudalen sgwrs $2]].',
	'notification-user-rights' => '[[Special:Log/rights/$1|{{GENDER:$1|Newidiwyd}}]] eich galluoedd defnyddiwr gan [[User:$1|$1]]. $2. [[Special:ListGroupRights|Darllen mwy]]',
	'notification-user-rights-flyout' => '{{GENDER:$1|Newidiwyd}} eich galluoedd defnyddiwr gan $1. $2. [[Special:ListGroupRights|Darllen mwy]]',
	'notification-user-rights-add' => "Rydych nawr yn aelod o'r {{PLURAL:$2|grŵp hwn|grŵp hwn|grwpiau hyn}}: $1",
	'notification-user-rights-remove' => "Nid ydych bellach yn aelod o'r {{PLURAL:$2|grŵp hwn|grŵp hwn|grwpiau hyn}}: $1",
	'notification-new-user' => 'Croeso i {{SITENAME}}, $1! Rydym yn falch eich bod wedi cyrraedd.',
	'notification-reverted2' => '{{GENDER:$1|Dadwneuthpwyd}} eich {{PLURAL:$4||golygiad ar [[:$2]]|golygiadau ar [[:$2]]}} gan [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => '{{GENDER:$1|Dadwneuthpwyd}} eich {{PLURAL:$4||golygiad ar $2|golygiadau ar $2}} gan $1. $3',
	'notification-edit-talk-page-email-subject2' => '{{GENDER:$1|Gosododd}} $1 neges i chi ar {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '{{GENDER:$1|Gosododd}} $1 neges ar eich tudalen sgwrs:',
	'notification-edit-talk-page-email-batch-body-with-section' => '{{GENDER:$1|Gosododd}} $1 neges ar eich tudalen sgwrs yn "$2".',
	'notification-page-linked-email-subject' => "Cysylltwyd i'ch tudalen ar {{SITENAME}}",
	'notification-page-linked-email-batch-body' => '{{GENDER:$1|Gosodwyd}} cyswllt o $3 i $2.',
	'notification-reverted-email-subject2' => '{{GENDER:$1|Dadwnaethpwyd}} eich {{PLURAL:$3||golygiad|golygiadau}} ar {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '{{GENDER:$1|Dadwnaethpwyd}} eich {{PLURAL:$3||golygiad|golygiadau}}ar $2 gan $1.',
	'notification-mention-email-subject' => '{{GENDER:$1|Cyfeiriodd}} $1 atoch ar {{SITENAME}}',
	'notification-mention-email-batch-body' => '{{GENDER:$1|Cyfeiriodd}} $1 atoch ar dudalen sgwrs $4 yn yr adran "$3".',
	'notification-mention-nosection-email-batch-body' => '{{GENDER:$1|Cyfeiriodd}} $1 atoch ar y dudalen sgwrs $2.',
	'notification-user-rights-email-subject' => 'Newidiodd eich galluoedd fel defnyddiwr ar {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Newidiwyd eich galluoedd {{GENDER:$1|defnyddiwr}} gan $1. $2.',
	'echo-email-subject-default' => 'Hysbysiad newydd ar {{SITENAME}}',
	'echo-email-body-default' => 'Mae hysbysiad newydd gennych ar {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Mae hysbysiad newydd gennych.',
	'echo-email-footer-default' => "$2

Os am reoli yr ebyst y cewch gennym, ewch i'ch dewisiadau:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1",
	'echo-email-footer-default-html' => 'I reoli\'r ebyst i\'w hanfon atoch, <a href="$2" style="text-decoration:none; color: #3868B0;">ewch i\'ch dewisiadau</a>.<br />
$1',
	'echo-overlay-link' => 'Pob hysbysiad',
	'echo-overlay-title' => '<b>Hysbysiadau</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Hysbysiadau}}</b> (yn dangos $1 o $2 heb eu darllen)',
	'echo-mark-all-as-read' => 'Marcio bod y cwbl wedi eu darllen',
	'echo-date-today' => 'Heddiw',
	'echo-date-yesterday' => 'Ddoe',
	'echo-load-more-error' => 'Cafwyd gwall wrth nôl rhagor o ganlyniadau.',
	'notification-edit-talk-page-bundle' => '{{GENDER:$1|Gadawodd}} $1 a $3 {{PLURAL:$4|a $3 arall|ac $3 arall|a $3 eraill}} negeseuon ar eich [[User talk:$2|tudalen defnyddiwr]].',
	'notification-page-linked-bundle' => "{{GENDER:$1|Gosodwyd}} cysylltiad at $2 o $3 {{PLURAL:$5||ac $4 dudalen arall|a $4 dudalen arall|a $4 o dudalennau eraill}}. [[Special:WhatLinksHere/$2|Gweler yr holl gysylltiadau i'r dudalen hon]]",
	'notification-edit-user-talk-email-batch-bundle-body' => '{{GENDER:$1|Gadawodd}} $1 {{PLURAL:$3||ac $2 arall||a $2 arall| a $2 eraill}} negeseuon ar eich tudalen sgwrs.',
	'notification-page-linked-email-batch-bundle-body' => '{{GENDER:$1|Gosodwyd}} gyswllt i $2 oddi wrth $3 {{PLURAL:$5||ac $4 dudalen arall|a $2 dudalen arall|a $2 o dudalennau eraill}}.',
	'echo-email-batch-subject-daily' => 'Mae {{PLURAL:$2||hysbysiad|hysbysiadau}} newydd gennych ar {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Mae {{PLURAL:$2||hysbysiad|hysbysiadau}} newydd gennych yr wythnos hon ar {{SITENAME}}',
	'echo-email-batch-body-intro-daily' => 'Sut mae $1,
Dyma grynodeb i chi o weithgaredd heddiw ar {{SITENAME}}.',
	'echo-email-batch-body-intro-weekly' => 'Sut mae $1,
Dyma grynodeb i chi o weithgaredd yr wythnos hon ar {{SITENAME}}.',
	'echo-email-batch-link-text-view-all-notifications' => 'Gweld yr holl hysbysiadau',
	'echo-rev-deleted-text-view' => "Cuddiwyd y diwygiad hwn o'r dudalen.",
);

/** Danish (dansk)
 * @author Byrial
 * @author Christian List
 * @author Palnatoke
 * @author Sarrus
 * @author Tjernobyl
 */
$messages['da'] = array(
	'echo-desc' => 'Meddelelsessystem',
	'prefs-echo' => 'Meddelelser',
	'prefs-emailsettings' => 'E-mailindstillinger',
	'prefs-displaynotifications' => 'Indstillinger for visning',
	'prefs-echosubscriptions' => 'Giv mig en meddelelse ved følgende hændelser',
	'prefs-newmessageindicator' => 'Indikator for nye meddelelser',
	'echo-pref-send-me' => 'Send mig:',
	'echo-pref-send-to' => 'Send til:',
	'echo-pref-email-format' => 'E-mailformat:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-mail',
	'echo-pref-email-frequency-never' => 'Send mig ikke nogen e-mailmeddelelser',
	'echo-pref-email-frequency-immediately' => 'De enkelte meddelelser når de kommer',
	'echo-pref-email-frequency-daily' => 'En daglig oversigt over meddelelser',
	'echo-pref-email-frequency-weekly' => 'En ugentlig oversigt over meddelelser',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Plain text',
	'echo-pref-notify-show-link' => 'Vis meddelelser i min værktøjslinje',
	'echo-pref-new-message-indicator' => 'Vis indikator for meddelelser på diskussionssiden i min værktøjslinje',
	'echo-learn-more' => 'Find ud af mere',
	'echo-new-messages' => 'Du har nye beskeder',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Besked|Beskeder}} på diskussionsside',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Sidehenvisning|Sidehenvisninger}}',
	'echo-category-title-reverted' => 'Tilbagestilling af {{PLURAL:$1|redigering|redigeringer}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Omtale|Omtaler}}',
	'echo-category-title-other' => '{{PLURAL:$1|Anden|Andre}}',
	'echo-category-title-system' => '{{PLURAL:$1|System}}',
	'echo-pref-tooltip-edit-user-talk' => 'Giv mig besked når nogen skriver en besked eller et svar på min diskussionsside.',
	'echo-pref-tooltip-article-linked' => 'Giv mig beked når nogen henviser til en side som jeg har oprettet, fra en artikelside.',
	'echo-pref-tooltip-reverted' => 'Giv mig besked når nogen tilbagestiller en redigering som jeg lavet, ved at bruge fjern redigering eller rul tilbage.',
	'echo-pref-tooltip-mention' => 'Giv mig besked når nogen henviser til min brugerside fra en diskussionsside.',
	'echo-no-agent' => '[Ingen]',
	'echo-no-title' => '[Ingen side]',
	'echo-error-no-formatter' => 'Der er ikke defineret et format for meddelelsen',
	'echo-error-preference' => 'Fejl: Kunne ikke gemme brugerindstillinger',
	'echo-error-token' => 'Fejl: Kunne ikke hente brugertoken',
	'notifications' => 'Meddelelser',
	'tooltip-pt-notifications' => 'Dine meddelelser',
	'echo-specialpage' => 'Meddelelser',
	'echo-anon' => 'For at modtage meddelelser skal du [$1 oprette en konto] eller [$2 logge ind].',
	'echo-none' => 'Du har ingen meddelelser.',
	'echo-more-info' => 'Mere information',
	'echo-feedback' => 'Feedback',
	'notification-link-text-view-message' => 'Vis besked',
	'notification-link-text-view-mention' => 'Se omtale',
	'notification-link-text-view-changes' => 'Se ændringer',
	'notification-link-text-view-page' => 'Se side',
	'notification-link-text-view-edit' => 'Se redigering',
	'notification-edit-talk-page2' => '[[User:$1|$1]] skrev en besked på din [[User talk:$2#$3|diskussionsside]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] lagde en besked på din diskussionsside i "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 skrev et indlæg på din [[User talk:$2#$3|diskussionsside]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 lagde en besked på din diskussionside i "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => 'Der blev {{GENDER:$1|henvist}} til [[:$2]] fra [[:$3]]. [[Special:WhatLinksHere/$2|Se alle henvisninger til siden]].',
	'notification-page-linked-flyout' => 'Der blev {{GENDER:$1|henvist}} til $2 fra [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] kommenterede om "[[$3|$2]]" på diskussionssiden "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] skrev et nyt indlæg om "$2" på [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] har sendt dig en besked: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] kommenterede om "[[$3#$2|$2]]" på din diskussionsside',
	'notification-mention' => '[[User:$1|$1]] omtalte dig på diskussionssiden $5 i "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 omtalte dig på diskussionssiden $5 i "[[$3#$2|$4]]".',
	'notification-mention-nosection' => '[[User:$1|$1]] {{GENDER:$1|nævnte}} dig på [[$3|diskussionssiden for "$2"]].',
	'notification-mention-nosection-flyout' => '$1 {{GENDER:$1|nævnte}} dig på [[$3|diskussionssiden for "$2"]].',
	'notification-user-rights' => 'Dine brugerrettigheder [[Special:Log/rights/$1|blev  ændret]] af [[User:$1|$1]]. $2. [[Special:ListGroupRights|Find ud af mere]]',
	'notification-user-rights-flyout' => 'Dine brugerrettigheder blev  ændret af $1. $2. [[Special:ListGroupRights|Find ud af mere]]',
	'notification-user-rights-add' => 'Du er nu medlem af {{PLURAL:$2|denne gruppe|disse grupper}}: $1',
	'notification-user-rights-remove' => 'du er ikke længere medlem af {{PLURAL:$2|denne gruppe|disse grupper}}: $1',
	'notification-new-user' => 'Velkommen til {{SITENAME}}, $1! Vi er glade for at du er her.',
	'notification-reverted2' => '{{PLURAL:$4|Din redigering af [[:$2]] er blevet tilbagestillet|Dine redigeringer af [[:$2]] er blevet tilbagestillede}} af [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Din redigering af $2 er blevet tilbagestillet|Dine redigeringer af $2 er blevet tilbagestillede}} af $1 $3',
	'notification-edit-talk-page-email-subject2' => '$1 lagde en besked til dig på {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 skrev et indlæg på din diskussionsside',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 lagde en besked på din diskussionsside i "$2".',
	'notification-page-linked-email-subject' => 'En side som du oprettede blev henvist til på {{SITENAME}}',
	'notification-page-linked-email-batch-body' => 'Der {{GENDER:$1|blev}} henvist til $2 fra $3',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Din redigering blev|Dine redigeringer blev}} {{GENDER:$1|omgjort}} på {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Din redigering|Dine redigeringer}} på $2 er omgjort af $1.',
	'notification-mention-email-subject' => '$1 omtalte dig på {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 omtalte dig på diskussionssiden $4 i "$3".',
	'notification-mention-nosection-email-batch-body' => '$1 {{GENDER:$1|nævnte}} dig på diskussionssiden for "$2".',
	'notification-user-rights-email-subject' => 'Dine brugerrettigheder er blevet ændret på {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Dine brugerrettigheder er blevet ændret af $1. $2',
	'echo-email-subject-default' => 'Ny meddelelse på {{SITENAME}}',
	'echo-email-body-default' => 'Der er en ny meddelelse til dig på {{SITENAME}}

$1',
	'echo-email-batch-body-default' => 'Der er en ny meddelelse til dig',
	'echo-email-footer-default' => '$2

Tjek dine indstillinger for at se hvilke e-mails vi sender til dig:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'For at styre hvilke e-mails, vi sender til dig, <a href="$2" style="text-decoration:none; color: #3868B0;">tjek dine indstillinger</a><br />
$1',
	'echo-overlay-link' => 'Alle meddelelser',
	'echo-overlay-title' => '<b>Meddelelser</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Meddelelser}}<b> (viser $1 af $2 ulæste)',
	'echo-mark-all-as-read' => 'Markér alle som læste',
	'echo-date-today' => 'I dag',
	'echo-date-yesterday' => 'I går',
	'echo-load-more-error' => 'Der skete en fejl under hentningen af flere resultater.',
	'notification-edit-talk-page-bundle' => '$1 og $3 {{PLURAL:$4|andre}} lagde en besked på din [[User talk:$2|diskussionsside]].',
	'notification-page-linked-bundle' => '$2 {{GENDER:$1|blev}} henvist til fra $3 og $4 {{PLURAL:$5|anden side|andre sider}}. [[Special:WhatLinksHere/$2|Se alle henvisninger til siden]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 og $2 {{PLURAL:$3|anden|andre}} skrev indlæg på din diskussionsside',
	'notification-page-linked-email-batch-bundle-body' => '$2 {{GENDER:$1|blev}} henvist til fra $3 og $4 {{PLURAL:$5|anden side|andre sider}}',
	'echo-email-batch-subject-daily' => 'Du har {{PLURAL:$2|en ny meddelelse|$2 nye meddelelser}} på {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Du har {{PLURAL:$2|en ny meddelelse|$2 nye meddelelser}} på {{SITENAME}} i denne uge',
	'echo-email-batch-body-intro-daily' => 'Hej $1,
Her er en oversigt over dagens aktivitet på {{SITENAME}} for dig.',
	'echo-email-batch-body-intro-weekly' => 'Hej $1,
Her er et resumé af denne uges aktivitet på {{SITENAME}} for dig.',
	'echo-email-batch-link-text-view-all-notifications' => 'Se alle meddelelser',
	'echo-rev-deleted-text-view' => 'Denne sideversion er skjult.',
);

/** German (Deutsch)
 * @author Kghbln
 * @author Metalhead64
 * @author Se4598
 * @author TMg
 */
$messages['de'] = array(
	'echo-desc' => 'Ermöglicht ein Benachrichtigungssystem',
	'prefs-echo' => 'Benachrichtigungen',
	'prefs-emailsettings' => 'E-Mail-Optionen',
	'prefs-displaynotifications' => 'Anzeigeoptionen',
	'prefs-echosubscriptions' => 'Mich bei diesen Ereignissen benachrichtigen',
	'prefs-newmessageindicator' => 'Neue-Nachrichten-Hinweise',
	'echo-pref-send-me' => 'Sende mir:',
	'echo-pref-send-to' => 'Senden an:',
	'echo-pref-email-format' => 'E-Mail-Format:',
	'echo-pref-web' => 'Wiki',
	'echo-pref-email' => 'E-Mail',
	'echo-pref-email-frequency-never' => 'Keine Benachrichtigungen',
	'echo-pref-email-frequency-immediately' => 'Individuelle Benachrichtigung zu jedem Ereignis',
	'echo-pref-email-frequency-daily' => 'Tägliche Benachrichtigung zu den Ereignissen',
	'echo-pref-email-frequency-weekly' => 'Wöchentliche Benachrichtigung zu den Ereignissen',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Nur Text',
	'echo-pref-notify-show-link' => 'Benachrichtigungen in meiner Werkzeugleiste anzeigen',
	'echo-pref-new-message-indicator' => 'Diskussionsseitennachrichthinweise in meiner Benutzerleiste anzeigen',
	'echo-learn-more' => 'Mehr erfahren',
	'echo-new-messages' => 'Du hast neue Nachrichten',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Diskussionsseitennachricht|Diskussionsseitennachrichten}}',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Seitenverlinkung|Seitenverlinkungen}}',
	'echo-category-title-reverted' => '{{PLURAL:$1|Rückgängigmachung einer Bearbeitung|Rückgängigmachungen von Bearbeitungen}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Erwähnung|Erwähnungen}}',
	'echo-category-title-other' => '{{PLURAL:$1|Andere}}',
	'echo-category-title-system' => '{{PLURAL:$1|System}}',
	'echo-pref-tooltip-edit-user-talk' => 'Benachrichtige mich, wenn jemand eine Nachricht oder eine Antwort auf meiner Diskussionsseite hinterlässt.',
	'echo-pref-tooltip-article-linked' => 'Benachrichtige mich, wenn jemand in einem Artikel auf eine Seite verlinkt, die ich erstellt habe.',
	'echo-pref-tooltip-reverted' => 'Benachrichtige mich, wenn jemand eine von mir gemachte Bearbeitung rückgängig macht oder zurücksetzt.',
	'echo-pref-tooltip-mention' => 'Benachrichtige mich, wenn jemand von einer Diskussionsseite auf meine Benutzerseite verlinkt.',
	'echo-no-agent' => '[Niemand]',
	'echo-no-title' => '[Keine Seite]',
	'echo-error-no-formatter' => 'Keine Formatierung zur Benachrichtigung definiert',
	'echo-error-preference' => 'Fehler: Benutzereinstellung konnte nicht festgelegt werden.',
	'echo-error-token' => 'Fehler: Benutzertoken konnte nicht abgerufen werden',
	'notifications' => 'Benachrichtigungen',
	'tooltip-pt-notifications' => 'Deine Benachrichtigungen',
	'echo-specialpage' => 'Benachrichtigungen',
	'echo-anon' => 'Um Benachrichtigungen erhalten zu können, muss man ein [$1 Benutzerkonto anlegen] oder sich [$2 anmelden].',
	'echo-none' => 'Du hast keine Benachrichtigungen.',
	'echo-more-info' => 'Mehr Informationen',
	'echo-feedback' => 'Rückmeldung',
	'notification-link-text-view-message' => 'Nachricht ansehen',
	'notification-link-text-view-mention' => 'Erwähnung ansehen',
	'notification-link-text-view-changes' => 'Änderungen ansehen',
	'notification-link-text-view-page' => 'Seite ansehen',
	'notification-link-text-view-edit' => 'Bearbeitung ansehen',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|hinterließ}} eine Nachricht auf deiner [[User talk:$2#$3|Diskussionsseite]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|hinterließ}} eine Nachricht auf deiner Diskussionsseite zum Thema „[[User talk:$2#$3|$4]]“.',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|hinterließ}} eine Nachricht auf deiner [[User talk:$2#$3|Diskussionsseite]].',
	'notification-edit-talk-page-flyout-with-section' => '„$1“ {{GENDER:$1|hinterließ}} eine Nachricht auf deiner Diskussionsseite zum Thema „[[User talk:$2#$3|$4]]“.',
	'notification-page-linked' => '[[:$2]] wurde von der Seite [[:$3]] {{GENDER:$1|verlinkt}}. [[Special:WhatLinksHere/$2|Alle Links auf diese Seite ansehen]].',
	'notification-page-linked-flyout' => '$2 wurde von der Seite [[:$3]] {{GENDER:$1|verlinkt}}.',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|kommentierte}} auf „[[$3|$2]]“ auf der Diskussionsseite von „$4“',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|startete}} das neue Thema „$2“ auf [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] hat dir eine Nachricht {{GENDER:$1|gesandt}}: „[[$3#$2|$2]]“',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|kommentierte}} auf „[[$3#$2|$2]]“ auf deiner Diskussionsseite',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|erwähnte}} dich auf der Seite „$5“ in „[[$3#$2|$4]]“.',
	'notification-mention-flyout' => '$1 {{GENDER:$1|erwähnte}} dich auf der Seite „$5“ in „[[$3#$2|$4]]“.',
	'notification-mention-nosection' => '[[User:$1|$1]] {{GENDER:$1|erwähnte}} dich auf der [[$3|Seite „$2“]].',
	'notification-mention-nosection-flyout' => '$1 {{GENDER:$1|erwähnte}} dich auf der [[$3|Seite „$2“]].',
	'notification-user-rights' => 'Deine Benutzerrechte wurden von [[User:$1|$1]] [[Special:Log/rights/$1|{{GENDER:$1|geändert}}]]. $2. [[Special:ListGroupRights|Mehr erfahren]]',
	'notification-user-rights-flyout' => 'Deine Benutzerrechte wurden von $1 {{GENDER:$1|geändert}}. $2. [[Special:ListGroupRights|Mehr erfahren]]',
	'notification-user-rights-add' => 'Du bist jetzt Mitglied dieser {{PLURAL:$2|Gruppe|Gruppen}}: $1',
	'notification-user-rights-remove' => 'Du bist nicht länger Mitglied dieser {{PLURAL:$2|Gruppe|Gruppen}}: $1',
	'notification-new-user' => 'Willkommen bei {{SITENAME}}, $1! Wir freuen uns, dass du hier bist.',
	'notification-reverted2' => 'Deine {{PLURAL:$4|Bearbeitung an der Seite [[:$2]] wurde|Bearbeitungen an der Seite [[:$2]] wurden}} von [[User:$1|$1]] {{GENDER:$1|rückgängig}} gemacht. $3',
	'notification-reverted-flyout2' => 'Deine {{PLURAL:$4|Bearbeitung an der Seite $2 wurde|Bearbeitungen an der Seite $2 wurden}} von $1 {{GENDER:$1|rückgängig}} gemacht. $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|hinterließ}} dir eine Nachricht auf {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|hinterließ}} eine Nachricht auf deiner Diskussionsseite:',
	'notification-edit-talk-page-email-batch-body-with-section' => '„$1“ {{GENDER:$1|hinterließ}} eine Nachricht auf deiner Diskussionsseite zum Thema „$2“.',
	'notification-page-linked-email-subject' => 'Deine Seite wurde auf {{SITENAME}} verlinkt',
	'notification-page-linked-email-batch-body' => '$2 wurde von der Seite $3 {{GENDER:$1|verlinkt}}',
	'notification-reverted-email-subject2' => 'Deine {{PLURAL:$3|Bearbeitung wurde|Bearbeitungen wurden}} auf {{SITENAME}} {{GENDER:$1|rückgängig}} gemacht',
	'notification-reverted-email-batch-body2' => 'Deine {{PLURAL:$3|Bearbeitung an der Seite $2 wurde|Bearbeitungen an der Seite $2 wurden}} von $1 {{GENDER:$1|rückgängig}} gemacht',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|erwähnte}} dich auf {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|erwähnte}} dich auf der Diskussionsseite von $4 in „$3“.',
	'notification-mention-nosection-email-batch-body' => '$1 {{GENDER:$1|erwähnte}} dich auf der Diskussionsseite „$2“.',
	'notification-user-rights-email-subject' => 'Deine Benutzerrechte auf {{SITENAME}} wurden geändert.',
	'notification-user-rights-email-batch-body' => 'Deine Benutzerrechte wurden von $1 {{GENDER:$1|geändert}}. $2',
	'echo-email-subject-default' => 'Neue Benachrichtigung auf {{SITENAME}}',
	'echo-email-body-default' => 'Es gibt eine neue Benachrichtigung auf {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Du hast eine neue Benachrichtigung',
	'echo-email-footer-default' => '$2

Um zu steuern, welche E-Mails wir dir senden, nutze deine Einstellungen:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Um zu steuern, welche E-Mails wir dir senden, <a href="$2" style="text-decoration:none; color: #3868B0;">nutze deine Einstellungen</a>.<br />
$1',
	'echo-overlay-link' => 'Alle Benachrichtigungen',
	'echo-overlay-title' => '<b>Benachrichtigungen</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Benachrichtigungen}}</b> ($1 von $2 ungelesenen werden angezeigt)',
	'echo-mark-all-as-read' => 'Alle als gelesen markieren',
	'echo-date-today' => 'Heute',
	'echo-date-yesterday' => 'Gestern',
	'echo-load-more-error' => 'Beim Abrufen weiterer Ergebnisse ist ein Fehler aufgetreten.',
	'notification-edit-talk-page-bundle' => '$1 und {{PLURAL:$4|ein weiterer Benutzer|$3 weitere Benutzer}} {{GENDER:$1|hinterließen}} eine Nachricht auf deiner [[User talk:$2|Diskussionsseite]].',
	'notification-page-linked-bundle' => '$2 wurde von $3 und {{PLURAL:$5|einer weiteren Seite|$4 weiteren Seiten}} {{GENDER:$1|verlinkt}}. [[Special:WhatLinksHere/$2|Alle Links auf diese Seite ansehen]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 und {{PLURAL:$3|ein weiterer Benutzer|$2 weitere Benutzer}} {{GENDER:$1|hinterließen}} eine Nachricht auf deiner Diskussionsseite',
	'notification-page-linked-email-batch-bundle-body' => '$2 wurde von $3 und {{PLURAL:$5|einer weiteren Seite|$4 weiteren Seiten}} {{GENDER:$1|verlinkt}}',
	'echo-email-batch-subject-daily' => 'Du hast {{PLURAL:$2|eine neue Benachrichtigung|neue Benachrichtigungen}} auf {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Du hast diese Woche {{PLURAL:$2|eine neue Benachrichtigung|neue Benachrichtigungen}} auf {{SITENAME}}',
	'echo-email-batch-body-intro-daily' => 'Hallo $1,
Hier ist für dich eine Zusammenfassung der Aktivitäten auf {{SITENAME}} von heute.',
	'echo-email-batch-body-intro-weekly' => 'Hallo $1,
Hier ist für dich eine Zusammenfassung der Aktivitäten auf {{SITENAME}} von dieser Woche.',
	'echo-email-batch-link-text-view-all-notifications' => 'Alle Benachrichtigungen ansehen',
	'echo-rev-deleted-text-view' => 'Diese Seitenversion wurde unterdrückt',
);

/** German (formal address) (Deutsch (Sie-Form)‎)
 * @author Kghbln
 */
$messages['de-formal'] = array(
	'echo-new-messages' => 'Sie haben neue Nachrichten', # Fuzzy
	'echo-none' => 'Sie haben in letzter Zeit keine Benachrichtigungen erhalten.', # Fuzzy
);

/** Zazaki (Zazaki)
 * @author Asmen
 * @author Erdemaslancan
 * @author Marmase
 * @author Mirzali
 */
$messages['diq'] = array(
	'prefs-echo' => 'Mengeney',
	'prefs-emailsettings' => 'Opsiyona e-posta',
	'prefs-displaynotifications' => 'Weçinayışa mocnayışi',
	'echo-pref-send-me' => 'Bırş mıré:',
	'echo-pref-send-to' => 'Bırş neyré:',
	'echo-pref-email-format' => 'Formata  E-posta:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-posta',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Duz metin',
	'echo-learn-more' => 'Zewbi',
	'echo-new-messages' => 'Şımaré mesaco newe esto',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Mesacê|Mesacên}} pela werênayışi',
	'echo-category-title-article-linked' => 'Para {{PLURAL:$1|link|linki}}',
	'echo-category-title-reverted' => 'Timara {{PLURAL:$1|terknayış|terknayışi}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Bahs kerden|Bahs kerdeni}}',
	'echo-category-title-other' => '{{PLURAL:$1|Zewbi}}',
	'echo-category-title-system' => '{{PLURAL:$1|sistem}}',
	'echo-no-agent' => '[Kesek]',
	'echo-no-title' => '[Pele Çıniya]',
	'notifications' => 'Mengene',
	'tooltip-pt-notifications' => 'Beyanatê to',
	'echo-specialpage' => 'Mengeney',
	'echo-none' => 'Beyanatê to çıniyê.',
	'echo-more-info' => 'Zêde (vêşi) melumat',
	'echo-feedback' => 'Peydrışten',
	'notification-link-text-view-message' => 'Qaytê mesaci ke',
	'notification-link-text-view-mention' => 'Qayt ke, cao ke qalê to biyo',
	'notification-link-text-view-changes' => 'Qaytê vırnayışan ke',
	'notification-link-text-view-page' => 'Qaytê pele ke',
	'notification-link-text-view-edit' => 'Qaytê vırnayışi ke',
	'notification-edit-talk-page2' => '[[User:$1|$1]],  perda [[User talk:$2#$3| mesacande]] to de zew mesaco newe {{GENDER:$1|vırada}}.',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]], Pera masecan de "[[User talk:$2#$3|$4]]" de mewzu {{GENDER:$1|vırade}}.',
	'notification-reverted-flyout2' => '$1 {{PLURAL:$4|vırnayışa $2 |vırnayışane $2 }} rewizyona $3 {{GENDER:$1|peyser}} grot',
	'echo-email-subject-default' => '{{SITENAME}} de beyanato newe',
	'echo-email-body-default' => '{{SITENAME}} de beyanatê do newe esto:

$1',
	'echo-email-batch-body-default' => 'Yew beyanatê to esto.',
	'echo-overlay-link' => 'Pêro beyanati',
	'echo-overlay-title' => '<b>Tebliği</b>',
	'echo-mark-all-as-read' => 'Pêrine wende nışan ke',
	'echo-date-today' => 'Naroc',
	'echo-date-yesterday' => 'Vızér',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 u $2 {{PLURAL:$3|zewna karberi|tayna karberan}}, to re zew mesac {{GENDER:$1|vırada}}.',
	'echo-email-batch-link-text-view-all-notifications' => 'Qaytê beyanatan pêrine ke',
	'echo-rev-deleted-text-view' => 'Vırnayışê na pele dard we.',
);

/** Lower Sorbian (dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'echo-desc' => 'System powěźeńkow',
	'prefs-echo' => 'Powěźeńki',
	'prefs-emailsettings' => 'E-mailowe nastajenja',
	'prefs-displaynotifications' => 'Zwobraznjowańske nastajenja',
	'prefs-echosubscriptions' => 'Mě wó toś tych tšojenjach informěrowaś',
	'prefs-newmessageindicator' => 'Nowy powěsćowy indikator',
	'echo-pref-send-me' => 'Pósćel mě:',
	'echo-pref-send-to' => 'Pósłaś na:',
	'echo-pref-email-format' => 'E-mailowy format:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-mail',
	'echo-pref-email-frequency-never' => 'Mě žedne e-mailowe powěźeńki njepósłaś',
	'echo-pref-email-frequency-immediately' => 'Indiwiduelne powěźeńki ako dochadaju',
	'echo-pref-email-frequency-daily' => 'Wšedny pśeglěd powěźeńkow',
	'echo-pref-email-frequency-weekly' => 'Tyźeński pśeglěd powěźeńkow',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Lutny tekst',
	'echo-pref-notify-show-link' => 'Powěźeńki w symbolowej rědce pokazaś',
	'echo-pref-new-message-indicator' => 'Powěsćowy indikator diskusijnego boka w symbolowej rědce pokazaś',
	'echo-learn-more' => 'Dalšne informacije',
	'echo-new-messages' => 'Maš nowe powěsći',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Powěsć|Powěsći}} na diskusijnem boku',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Wótkaz|Wótkaza|Wótkaze}} boka',
	'echo-category-title-reverted' => '{{PLURAL:$1|Anulěrowanje|Anulěrowani|Anulěrowanja}} změnow',
	'echo-category-title-mention' => '{{PLURAL:$1|Naspomnjenje|Naspomnjeni|Naspomnjenja}}',
	'echo-category-title-other' => '{{PLURAL:$1|Druga|Drugej|Druge}}',
	'echo-category-title-system' => '{{PLURAL:$1|System}}',
	'echo-pref-tooltip-edit-user-talk' => 'Informěruj mě gaž něchten zawóstaja powěsć abo wótegrono na mójom diskusijnem boku.',
	'echo-pref-tooltip-article-linked' => 'Informěruj mě, gaž něchten wótkazujo na bok, kótaryž som z nastawka napórał.',
	'echo-pref-tooltip-reverted' => 'Informěruj mě, gaž něchten z pomocu anulěrowanja abo rěda anulěrujo změnu, kótaruž som cynił.',
	'echo-pref-tooltip-mention' => 'Informěruj mě, gaž něchten wótkazujo z někakego diskusijnego boka k mójomu wužywarskemu bokoju.',
	'echo-no-agent' => '[Nichten]',
	'echo-no-title' => '[Žeden bok]',
	'echo-error-no-formatter' => 'Za powěźeńku njejo se formatěrowanje definěrowało.',
	'echo-error-preference' => 'Zmólka: Wužywarske nastajenje njedajo se stajiś.',
	'echo-error-token' => 'Zmólka: Wužywarski token njedajo se wótwołaś.',
	'notifications' => 'Powěźeńki',
	'tooltip-pt-notifications' => 'Twóje powěźeńki',
	'echo-specialpage' => 'Powěźeńki',
	'echo-anon' => 'Aby powěźeńki dostał, [$1 napóraj konto] abo [$2 pśizjaw se].',
	'echo-none' => 'Njamaš powěźeńki',
	'echo-more-info' => 'Dalšne informacije',
	'echo-feedback' => 'Komentary',
	'notification-link-text-view-message' => 'Powěsć pokazaś',
	'notification-link-text-view-mention' => 'Naspomnjenje pokazaś',
	'notification-link-text-view-changes' => 'Změny pokazaś',
	'notification-link-text-view-page' => 'Bok se woglědaś',
	'notification-link-text-view-edit' => 'Změnu pokazaś',
	'notification-edit-talk-page2' => '[[User:$1|$1]] jo powěsć na twójom [[User talk:$2#$3|diskusijnem boku]] {{GENDER:$1|zawóstajił|zawóstajiła}}.',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] jo powěsć na twójom diskusijnem boku w "[[User talk:$2#$3|$4]]" {{GENDER:$1|zawóstajił|zawóstajiła}}.',
	'notification-edit-talk-page-flyout2' => '$1 jo powěsć na twójom [[User talk:$2#$3|diskusijnem boku]] {{GENDER:$1|zawóstajił|zawóstajiła}}.',
	'notification-edit-talk-page-flyout-with-section' => '$1 jo powěsć na twójom diskusijnem boku w "[[User talk:$2#$3|$4]]" {{GENDER:$1|zawóstajił|zawóstajiła}}.',
	'notification-page-linked' => '[[:$2]] jo se wót [[:$3]] {{GENDER:$1|wótkazał|wótkazała}}. [[Special:WhatLinksHere/$2|Wšykne wótkaze k toś tomu bokoju pokazaś]].',
	'notification-page-linked-flyout' => '$2 jo se wót [[:$3]] {{GENDER:$1|wótkazał|wótkazała}}.',
	'notification-add-comment2' => '[[User:$1|$1]] jo na "[[$3|$2]]" na diskusijnem boku "$4" {{GENDER:$1|komentěrował|komentěrowała}}.',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] jo nowu temu "$2" na [[$3]] {{GENDER:$1|startował|startowała}}.',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]]  jo śi powěsć {{GENDER:$1|pósłał|pósłała}}: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]]  jo na "[[$3#$2|$2]]" na twójom diskusijnem boku {{GENDER:$1|komentěrował|komentěrowała}}.',
	'notification-mention' => '[[User:$1|$1]] jo śi na diskusijnem boku $5 w "[[$3#$2|$4]]" {{GENDER:$1|naspomnjeł|naspomnjeła}}.',
	'notification-mention-flyout' => '$1 jo śi na diskusijnem boku $5 w "[[$3#$2|$4]]" {{GENDER:$1|naspomnjeł|naspomnjeła}}.',
	'notification-mention-nosection' => '[[User:$1|$1]] jo śi na [[$3|diskusijnem boku $2]] {{GENDER:$1|naspomnjeł|naspomnjeła}}.',
	'notification-mention-nosection-flyout' => '$1 jo śi na [[$3|diskusijnem boku $2]] {{GENDER:$1|naspomnjeł|naspomnjeła}}.',
	'notification-user-rights' => 'Twóje wužywarske pšawa [[Special:Log/rights/$1|su se wót [[User:$1|$1]] {{GENDER:$1|změnili}}]] . $2. [[Special:ListGroupRights|Dalšne informacije]]',
	'notification-user-rights-flyout' => 'Twóje wužywarske pšawa su se wót $1 {{GENDER:$1|změnili}}. $2. [[Special:ListGroupRights|Dalšne informacije]]',
	'notification-user-rights-add' => 'Sy něnto cłonk {{PLURAL:$2|toś teje kupki|toś teju kupkowu|toś tych kupkow}}: $1',
	'notification-user-rights-remove' => 'Njejsy wěcej cłonk {{PLURAL:$2|toś teje kupki|toś teju kupkowu|toś tych kupkow}}: $1',
	'notification-new-user' => 'Witaj do {{GRAMMAR:genitiw|{{SITENAME}}}}, $1! Wjaselimy se, až sy how.',
	'notification-reverted2' => '[[User:$1|$1]] jo {{PLURAL:$4|změnu na [[:$2]]|změnje na [[:$2]]|změny na [[:$2]]}} {{GENDER:$1|anulěrował|anulěrowała}}. $3',
	'notification-reverted-flyout2' => '$1 jo {{PLURAL:$4|změnu na $2|změnje na $2|změny na $2}} {{GENDER:$1|anulěrował|anulěrowała}}. $3',
	'notification-edit-talk-page-email-subject2' => '$1 jo śi powěsć na {{GRAMMAR:lokatiw|{{SITENAME}}}} {{GENDER:$1|zawóstajił|zawóstajiła}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 jo powěsć na twójom diskusijnem boku {{GENDER:$1|zawóstajił|zawóstajiła}}:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 jo powěsć wó "$2" na twójom diskusijnem boku {{GENDER:$1|zawóstajił|zawóstajiła}}.',
	'notification-page-linked-email-subject' => 'Twój bok jo se na {{GRAMMAR:lokatiw|{{SITENAME}}}} wótkazał.',
	'notification-page-linked-email-batch-body' => '$2 jo se z $3 {{GENDER:$1|wótkazał}}.',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Twója změna jo|Twójej změnje stej|Twóje změny su}} se na {{GRAMMAR:lokatiw|{{SITENAME}}}}{{GENDER:$1|{{PLURAL:$3|anulěrowała|anulěrowałej|anulěrowali}}}}',
	'notification-reverted-email-batch-body2' => '$1 jo {{PLURAL:$3|twóju změnu na $2|twójej změnje na $2|twóje změny na $2}} {{GENDER:$1|anulěrował|anulěrowała}}.',
	'notification-mention-email-subject' => '$1 jo śi na {{GRAMMAR:lokatiw|{{SITENAME}}}} {{GENDER:$1|naspomnjeł|naspomnjeła}}',
	'notification-mention-email-batch-body' => '$1 jo śi na diskusijnem boku $4 w "$3" {{GENDER:$1|naspomnjeł|naspomnjeła}}.',
	'notification-mention-nosection-email-batch-body' => '$1 jo śi na diskusijnem boku $2 {{GENDER:$1|naspomnjeł|naspomnjeła}}.',
	'notification-user-rights-email-subject' => 'Twóje wužywarske pšawa su se na {{GRAMMAR:lokatiw|{{SITENAME}}}} změnili',
	'notification-user-rights-email-batch-body' => 'Twóje wužywarske pšawa su se wót $1 {{GENDER:$1|změnili}}. $2',
	'echo-email-subject-default' => 'Nowa powěźeńka na {{GRAMMAR:lokatiw|{{SITENAME}}}}',
	'echo-email-body-default' => 'Maš nowu powěźeńku na {{GRAMMAR:lokatiw|{{SITENAME}}}}:

$1',
	'echo-email-batch-body-default' => 'Maš nowu powěźeńku.',
	'echo-email-footer-default' => '$2

Aby kontrěrolował, kótare e-maile śi sćelomy, pśeglědaj swóje nastajenja:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Aby kontrolěrował, kótare e-maile śi sćelomy, <a href="$2" style="text-decoration:none; color: #3868B0;">pśeglědaj swóje nastajenja</a>.<br />
$1',
	'echo-overlay-link' => 'Wšykne powěźeńki',
	'echo-overlay-title' => '<b>Powěźeńki</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Poěźeńka|Powěźeńce|Powěźeńki}}</b> ($1 z $2 {{PLURAL:$2|njepśecytaneje|njepśecytaneju|njepśecytanych}} se {{PLURAL:$1|pokazujo|pokazujotej|pokazuju|pokazujo}})',
	'echo-mark-all-as-read' => 'Wšykne ako pśecytane markěrowaś',
	'echo-date-today' => 'Źinsa',
	'echo-date-yesterday' => 'Cora',
	'echo-load-more-error' => 'Pśi wobstarowanju dalšnych wuslědkow jo zmólka nastała.',
	'notification-edit-talk-page-bundle' => '$1 a {{PLURAL:$4|dalšny wužywaŕ jo|$3 dalšnej wužywarja stej|$3 dalšne wužywarje su|$3 dalšnych wužywarjow jo}} powěsć na twójom [[User talk:$2|diskusijnem boku]] {{PLURAL:$4|zawóstajił|zawóstajiłej|zawóstajili|zawóstajiło}}.',
	'notification-page-linked-bundle' => '$2 jo se z $3 a {{PLURAL:$5|jadnogo dalšnego boka|$4 dalšneju bokowu|$4 dalšnych bokow}} {{GENDER:$1|wotkazał}}. [[Special:WhatLinksHere/$2|Wšykne wótkaze k toś tomu bokoju pokazaś]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 a {{PLURAL:$3|dalšny wužywaŕ stej|$2 dalšnej wužywarja su|$2 dalšne wužywarje su|$2 dalšnych wužywarjow su}} powěsć na twójom diskusijnem boku {{GENDER:$1|zawóstajiłej|zawóstajili}}.',
	'notification-page-linked-email-batch-bundle-body' => '$2 jo se wót $3 a {{PLURAL:$5|jadnogo dalšnego boka|$4 dalšneju bokowu|$4 dalšnych bokow}} {{GENDER:$1|wótkazał}}.',
	'echo-email-batch-subject-daily' => 'Maš {{PLURAL:$2|nowu powěźeńku|nowej powěźeńce|nowe powěźeńki}} na {{GRAMMAR:lokatiw|{{SITENAME}}}}',
	'echo-email-batch-subject-weekly' => 'Maš {{PLURAL:$2|nowu powěźeńku|nowej powěźeńce|nowe powěźeńki}} na {{GRAMMAR:lokatiw|{{SITENAME}}}} toś ten tyźeń',
	'echo-email-batch-body-intro-daily' => 'Witaj $1,

how jo zespominanje źinsajšnych aktiwitow na {{GRAMMAR:lokatiw|{{SITENAME}}}} za tebje.',
	'echo-email-batch-body-intro-weekly' => 'Witja $1,

how jo zespominanje aktiwitow z toś togo tyźenja na {{GRAMMAR:lokatiw|{{SITENAME}}}} za tebje.',
	'echo-email-batch-link-text-view-all-notifications' => 'Wšykne powěźeńki pokazaś',
	'echo-rev-deleted-text-view' => 'Toś ta bokowa wersija jo se pódtłocyła.',
);

/** Greek (Ελληνικά)
 * @author Aitolos
 * @author Dipa1965
 * @author Geraki
 * @author Glavkos
 * @author Protnet
 * @author Xaris333
 * @author ZaDiak
 */
$messages['el'] = array(
	'echo-desc' => 'Σύστημα ειδοποιήσεων',
	'prefs-echo' => 'Ειδοποιήσεις',
	'prefs-emailsettings' => 'Επιλογές ηλεκτρονικού ταχυδρομείου',
	'prefs-displaynotifications' => 'Επιλογές εμφάνισης',
	'prefs-echosubscriptions' => 'Να ειδοποιούμαι σχετικά με αυτά τα γεγονότα',
	'prefs-newmessageindicator' => 'Δείκτης νέων μηνυμάτων',
	'echo-pref-send-me' => 'Στείλτε μου:',
	'echo-pref-send-to' => 'Αποστολή σε:',
	'echo-pref-email-format' => 'Μορφή ηλεκτρονικού ταχυδρομείου:',
	'echo-pref-web' => 'Ιστοσελίδα',
	'echo-pref-email' => 'Ηλεκτρονικό ταχυδρομείο',
	'echo-pref-email-frequency-never' => 'Μην μου στέλνετε ειδοποιήσεις μέσω ηλεκτρονικού ταχυδρομείου',
	'echo-pref-email-frequency-immediately' => 'Μεμονωμένες κοινοποιήσεις, καθώς έρχονται',
	'echo-pref-email-frequency-daily' => 'Ημερήσια σύνοψη ειδοποιήσεων',
	'echo-pref-email-frequency-weekly' => 'Εβδομαδιαία σύνοψη ειδοποιήσεων',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Απλό κείμενο',
	'echo-pref-notify-show-link' => 'Εμφάνιση ειδοποιήσεων στη γραμμή εργαλείων μου',
	'echo-pref-new-message-indicator' => 'Να εμφανίζεται, στη γραμμή εργαλείων, ο δείκτης μηνυμάτων της σελίδας συζήτησης',
	'echo-learn-more' => 'Μάθετε περισσότερα',
	'echo-new-messages' => 'Έχετε νέα μηνύματα',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Μήνυμα|Μηνύματα}} στη σελίδα συζήτησης',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Σύνδεσμος|Σύνδεσμοι}} σελίδας',
	'echo-category-title-reverted' => '{{PLURAL:$1|Επαναφορά|Επαναφορές}} επεξεργασίας',
	'echo-category-title-mention' => '{{PLURAL:$1|Αναφορά|Αναφορές}}',
	'echo-category-title-other' => '{{PLURAL:$1|Άλλα}}',
	'echo-category-title-system' => '{{PLURAL:$1|Σύστημα}}',
	'echo-pref-tooltip-edit-user-talk' => 'Να ειδοποιούμαι όταν κάποιος δημοσιεύσει ένα μήνυμα ή απαντήσεις στη σελίδα συζήτησής μου.',
	'echo-pref-tooltip-article-linked' => 'Να ειδοποιούμαι όταν κάποιος συνδέει σε σελίδα που δημιούργησα από μια σελίδα λήμματος.',
	'echo-pref-tooltip-reverted' => 'Να ειδοποιούμαι όταν κάποιος αναστρέφει μια επεξεργασία που έκανα, χρησιμοποιώντας το εργαλείο αναίρεσης ή επαναφοράς.',
	'echo-pref-tooltip-mention' => 'Να ειδοποιούμαι όταν κάποιος προσθέτει σύνδεσμο προς τη σελίδα χρήστη μου, σε οποιαδήποτε σελίδα συζήτησης.',
	'echo-no-agent' => '[Κανένας]',
	'echo-no-title' => '[Καμία σελίδα]',
	'echo-error-no-formatter' => 'Δεν έχει οριστεί μορφοποίηση για την ειδοποίηση',
	'echo-error-preference' => 'Σφάλμα: Δεν ήταν δυνατό να οριστεί προτίμηση χρήστη',
	'echo-error-token' => 'Σφάλμα: δεν ήταν δυνατή η ανάκτηση διακριτικού χρήστη',
	'notifications' => 'Ειδοποιήσεις',
	'tooltip-pt-notifications' => 'Οι ειδοποιήσεις σας',
	'echo-specialpage' => 'Ειδοποιήσεις',
	'echo-anon' => 'Για να λαμβάνετε ειδοποιήσεις, [$1 δημιουργήστε ένα λογαριασμό] ή [$2 συνδεθείτε].',
	'echo-none' => 'Δεν έχετε ειδοποιήσεις.',
	'echo-more-info' => 'Περισσότερες πληροφορίες',
	'echo-feedback' => 'Ανατροφοδότηση',
	'notification-link-text-view-message' => 'Προβολή μηνύματος',
	'notification-link-text-view-mention' => 'Προβολή αναφοράς',
	'notification-link-text-view-changes' => 'Προβολή αλλαγών',
	'notification-link-text-view-page' => 'Προβολή σελίδας',
	'notification-link-text-view-edit' => 'Προβολή επεξεργασίας',
	'notification-edit-talk-page2' => '{{GENDER:$1|Ο|Η}} [[User:$1|$1]] άφησε μήνυμα στη [[User talk:$2#$3|σελίδα συζήτησής]] σας.',
	'notification-edit-talk-page-with-section' => '{{GENDER:$1|Ο|Η}} [[User:$1|$1]] άφησε μήνυμα στην ενότητα "[[User talk:$2#$3|$4]] της σελίδας συζήτησης σας.',
	'notification-edit-talk-page-flyout2' => '{{GENDER:$1|Ο|Η}} $1 άφησε μήνυμα στη [[User talk:$2#$3|σελίδα συζήτησής]] σας.',
	'notification-edit-talk-page-flyout-with-section' => '{{GENDER:$1|Ο|Η}} $1 άφησε μήνυμα στη σελίδα συζήτησής στη [[User talk:$2#$3|$4]].',
	'notification-page-linked' => 'Η σελίδα [[:$2]] {{GENDER:$1|συνδέθηκε}} από τη σελίδα [[:$3]]. [[Special:WhatLinksHere/$2|Δείτε όλους τους συνδέσμους προς αυτή τη σελίδα]].',
	'notification-page-linked-flyout' => 'Η σελίδα $2 {{GENDER:$1|συνδέθηκε}} από τη σελίδα [[:$3]].',
	'notification-add-comment2' => '{{GENDER:$1|Ο|Η}} [[User:$1|$1]] σχολίασε στο "[[$3|$2]]" στην συζήτηση "$4".',
	'notification-mention' => '{{GENDER:$1|Ο|Η}} [[User:$1|$1]] {{GENDER:$1|σας ανάφερε}} στην ενότητα "[[$3#$2|$4]]" της σελίδας $5.',
	'notification-mention-flyout' => '$1 {{GENDER:$1|}} στην ενότητα "[[$3#$2|$4]]" της σελίδας $5.',
	'notification-new-user' => 'Καλώς ήρθατε στο {{SITENAME}}, $1! Χαιρόμαστε που είστε εδώ.',
	'notification-reverted2' => '{{PLURAL:$4|Η επεξεργασία σας στην [[:$2]] έχει|Οι επεξεργασίες σας στην [[:$2]] έχουν}} αναστραφεί από {{GENDER:$1|τον|την}} [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Η επεξεργασία σας στην $2 έχει|Οι επεξεργασίες σας στην $2 έχουν}} αναστραφεί από {{GENDER:$1|τον|την}} $1. $3',
	'notification-edit-talk-page-email-subject2' => '{{GENDER:$1|Ο|Η}} $1 σας άφησε ένα μήνυμα στη {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '{{GENDER:$1|Ο|Η}} $1 άφησε ένα μήνυμα στην σελίδα συζήτησής σας:',
	'notification-edit-talk-page-email-batch-body-with-section' => '{{GENDER:$1|Ο|Η}} $1 άφησε ένα μήνυμα στην σελίδα συζήτησής σας στην "$2"',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Η επεξεργασία σας στην $2 έχει|Οι επεξεργασίες σας στην $2 έχουν}} αναστραφεί από {{GENDER:$1|τον|την}} $1.',
	'notification-mention-email-subject' => '{{GENDER:$1|Ο|Η}} $1 σας ανέφερε στη {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|σας ανάφερε}} στην ενότητα "$3" της σελίδας $4.',
	'notification-user-rights-email-subject' => 'Τα δικαιώματα χρήστη σας έχουν αλλάξει στη {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Τα δικαιώματα χρήστη σας έχουν αλλάξει από {{GENDER:$1|τον|την}} $1. $2.',
	'echo-email-subject-default' => 'Νέα ειδοποίηση στο {{SITENAME}}',
	'echo-email-body-default' => 'Έχετε μια νέα ειδοποίηση στη {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Έχετε μια νέα ειδοποίηση.',
	'echo-email-footer-default' => '$2

Για να ελέγξετε ποια μηνύματα σας στέλνουμε, πηγαίνετε στις προτιμήσεις σας:

{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Για να ελέγξετε ποια μηνύματα σας στέλνουμε, <a href="$2" style="text-decoration:none; color: #3868B0;">πηγαίνετε στις προτιμήσεις σας</a>.<br />
$1',
	'echo-overlay-link' => 'Όλες οι ειδοποιήσεις',
	'echo-overlay-title' => '<b>Ειδοποιήσεις</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Ειδοποιήσεις}}</b> (εμφανίζονται $1 από $2 μη αναγνωσμένες)',
	'echo-mark-all-as-read' => 'Σήμανση όλων ως αναγνωσμένες',
	'echo-date-today' => 'Σήμερα',
	'echo-date-yesterday' => 'Χθες',
	'echo-load-more-error' => 'Παρουσιάστηκε σφάλμα κατά την ανάκτηση περισσότερων αποτελέσματων.',
	'notification-edit-talk-page-bundle' => '{{GENDER:$1|Ο|Η}} $1 και $3 {{PLURAL:$4|άλλος|άλλοι}} άφησαν μηνύματα στην [[User talk:$2|σελίδα συζήτησής σας]].',
	'notification-page-linked-bundle' => 'Η $2 {{GENDER:$1|συνδέθηκε}} από τη σελίδα $3 και $4 {{PLURAL:$5|άλλη σελίδα|άλλες σελίδες}}. [[Special:WhatLinksHere/$2|Δείτε όλους τους συνδέσμους]] προς αυτή τη σελίδα',
	'notification-edit-user-talk-email-batch-bundle-body' => 'Ο χρήστης $1 και $2 {{PLURAL:$3|άλλος χρήστης|άλλοι χρήστες}} {{GENDER:$1|άφησαν}} ένα μήνυμα στη σελίδα συζήτησης σας.',
	'echo-email-batch-link-text-view-all-notifications' => 'Δείτε όλες τις ειδοποιήσεις',
	'echo-rev-deleted-text-view' => 'Αυτή η αναθεώρηση σελίδας έχει καταργηθεί.',
);

/** British English (British English)
 * @author Shirayuki
 */
$messages['en-gb'] = array(
	'echo-email-batch-category-header-other' => '$1 uncategorised {{PLURAL:$1|notification|notifications}}',
);

/** Esperanto (Esperanto)
 * @author KuboF
 * @author Tlustulimu
 * @author Yekrats
 */
$messages['eo'] = array(
	'echo-desc' => 'Sciiga sistemo',
	'prefs-echo' => 'Sciigoj',
	'prefs-emailsettings' => 'Retpoŝtaj opcioj',
	'prefs-displaynotifications' => 'Montraj opcioj',
	'prefs-echosubscriptions' => 'Sciigu min pri tiuj ĉi okazaĵoj',
	'prefs-newmessageindicator' => 'Indikilo pri novaj mesaĝoj',
	'echo-pref-send-me' => 'Sendadi al mi:',
	'echo-pref-send-to' => 'Sendadi al:',
	'echo-pref-email-format' => 'Formo de retpoŝto:',
	'echo-pref-web' => 'Reteje',
	'echo-pref-email' => 'Retpoŝte',
	'echo-pref-email-frequency-never' => 'Ne sendadi al mi retpoŝtajn sciigojn',
	'echo-pref-email-frequency-immediately' => 'Unuopajn sciigojn tuj kiam ili alvenos',
	'echo-pref-email-frequency-daily' => 'Tagan resumon de sciigoj',
	'echo-pref-email-frequency-weekly' => 'Semajnan resumon de sciigoj',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Ordinara teksto',
	'echo-pref-notify-show-link' => 'Montri sciigojn en mia ilobreto',
	'echo-pref-new-message-indicator' => 'Montri indikilon pri diskutaj mesaĝoj en mia ilobreto',
	'echo-learn-more' => 'Lerni plu',
	'echo-new-messages' => 'Vi havas novajn mesaĝojn',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Mesaĝo|Mesaĝoj}} en diskutpaĝo',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Ligilo|Ligiloj}} al paĝo',
	'echo-category-title-reverted' => '{{PLURAL:$1|Malfaro|Malfaroj}} de redakto',
	'echo-category-title-mention' => '{{PLURAL:$1|Mencio|Mencioj}}',
	'echo-category-title-other' => '{{PLURAL:$1|Aliaj}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistemo}}',
	'echo-pref-tooltip-edit-user-talk' => 'Sciigu min kiam iu komencas diskuton aŭ respondas en mia diskutpaĝo.',
	'echo-pref-tooltip-article-linked' => 'Sciigu min kiam iu ligas al paĝo kiun mi kreis de artikolo.',
	'echo-pref-tooltip-reverted' => 'Sciigu min kiam iu malfaras mian redakton per ilo por malfari aŭ amasmalfari.',
	'echo-pref-tooltip-mention' => 'Sciigu min kiam iu ligas al mia uzantopaĝo de ajna diskutpaĝo.',
	'echo-no-agent' => '[Neniu]',
	'echo-no-title' => '[Sen Paĝo]',
	'echo-error-no-formatter' => 'Neniu aranĝo difinita por sciigo.',
	'echo-error-preference' => 'Eraro: Konserviĝo de uzanto-preferoj ne sukcesis.',
	'echo-error-token' => 'Eraro: Simbolo de uzanto ne povis esti elvokata.',
	'notifications' => 'Sciigoj',
	'tooltip-pt-notifications' => 'Viaj sciigoj',
	'echo-specialpage' => 'Sciigoj',
	'echo-anon' => 'Po ricevadi sciigojn oni bezonas [$1 krei konton] aŭ [$2 ensaluti].',
	'echo-none' => 'Vi ne havas sciigojn.',
	'echo-more-info' => 'Pliaj informoj',
	'echo-feedback' => 'Rimarkoj',
	'notification-link-text-view-message' => 'Montri mesaĝon',
	'notification-link-text-view-mention' => 'Montri mencion',
	'notification-link-text-view-changes' => 'Montri ŝanĝojn',
	'notification-link-text-view-page' => 'Montri paĝon',
	'notification-link-text-view-edit' => 'Montri redakton',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|lasis}} mesaĝon en via [[User talk:$2#$3|diskutpaĝo]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|lasis}} mesaĝon sur via diskutopaĝo en „[[User talk:$2#$3|$4]]“.',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|lasis}} mesaĝon sur via [[User talk:$2#$3|diskutopaĝo]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|lasis}} mesaĝon sur via diskutopaĝo en "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => '[[:$2]] estis {{GENDER:$1|ligata}} de [[:$3]]. [[Special:WhatLinksHere/$2|Ligiloj ĉi tien]].',
	'notification-page-linked-flyout' => '$2 estis {{GENDER:$1|ligita}} de [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|komentis}} sur "[[$3|$2]]" sur la diskutopaĝo de "$4".',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|afiŝis}} novan temon "$2" sur [[$3]].',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|sendis}} al vi mesaĝon: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|komentis}} sur "[[$3#$2|$2]]" sur via diskutopaĝo.',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|menciis}} vin sur la diskutopaĝo de $5 en "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 {{GENDER:$1|menciis}} vin sur la diskutopaĝo de $5 en "[[$3#$2|$4]]".',
	'notification-mention-nosection' => '[[User:$1|$1]] {{GENDER:$1|menciis}} vin sur la [[$3|diskutopaĝo „$2“]].',
	'notification-mention-nosection-flyout' => '$1 {{GENDER:$1|menciis}} vin sur la [[$3|diskutopaĝo „$2“]].',
	'notification-user-rights' => 'Viaj uzantorajtoj [[Special:Log/rights/$1|estis {{GENDER:$1|ŝanĝitaj}}]] de [[User:$1|$1]]. $2. [[Special:ListGroupRights|Pliaj informoj]]',
	'notification-user-rights-flyout' => 'Viaj uzantorajtoj estis {{GENDER:$1|ŝanĝitaj}} de $1. $2. [[Special:ListGroupRights|Pliaj informoj]]',
	'notification-user-rights-add' => 'Vi estas nun membro de {{PLURAL:$2|ĉi tiu grupo|ĉi tiuj grupoj}}: $1',
	'notification-user-rights-remove' => 'Vi ne plu estas membro de {{PLURAL:$2|ĉi tiu grupo|ĉi tiuj grupoj}}: $1',
	'notification-new-user' => 'Bonvenon al {{SITENAME}}, $1! Ni ĝojas, ke vi estas ĉi tie.',
	'notification-reverted2' => '{{PLURAL:$4|Via redakto sur [[:$2]] estis {{GENDER:$1|malfarita}}|Viaj redaktoj sur [[:$2]] estis {{GENDER:$1|malfaritaj}}}} de [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Via redakto sur $2 estis {{GENDER:$1|malfarita}}|Viaj redaktoj sur $2 estis {{GENDER:$1|malfaritaj}}}} de $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|lasis}} al vi mesaĝon sur {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|lasis}} mesaĝon sur via diskutopaĝo:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|lasis}} mesaĝon sur via diskutopaĝo pri "$2".',
	'notification-page-linked-email-subject' => 'Via paĝo estas ligita en {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2 estis {{GENDER:$1|ligita}} de $3.',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Via redakto estis {{GENDER:$1|malfarita}}|Viaj redaktoj estis {{GENDER:$1|malfaritaj}}}} sur {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Via redakto sur $2 estis {{GENDER:$1|malfarita}}|Viaj redaktoj sur $2 estis {{GENDER:$1|malfaritaj}}}} de $1.',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|menciis}} vin sur {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|menciis}} vin sur la diskutopaĝo de $4 en "$3".',
	'notification-mention-nosection-email-batch-body' => '$1 {{GENDER:$1|menciis}} vin sur la diskutopaĝo „$2“.',
	'notification-user-rights-email-subject' => 'Viaj uzantorajtoj estis ŝanĝitaj sur {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Viaj uzantorajtoj estis {{GENDER:$1|ŝanĝitaj}} de $1. $2.',
	'echo-email-subject-default' => 'Nova sciigo en {{SITENAME}}',
	'echo-email-body-default' => 'Vi havas novan noton ĉe {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Vi havas novajn sciigojn.',
	'echo-email-footer-default' => '$2

Por kontroli kiujn retpoŝtaĵojn ni sendas al vi, kontrolu viajn preferojn:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Por kontroli kiujn retpoŝtaĵojn ni sendas al vi, <a href="$2" style="text-decoration:none; color: #3868B0;">kontrolu viajn preferojn</a>.<br />
$1',
	'echo-overlay-link' => 'Ĉiuj sciigoj',
	'echo-overlay-title' => '<b>Sciigoj</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Sciigo|Sciigoj}}</b> (montrante $1 de $2 {{PLURAL:$2|nelegita|nelegitaj}})',
	'echo-mark-all-as-read' => 'Marki ĉiujn kiel legitaj',
	'echo-date-today' => 'Hodiaŭ',
	'echo-date-yesterday' => 'Hieraŭ',
	'echo-load-more-error' => 'Okazis eraro dum venigo de pliaj rezultoj.',
	'notification-edit-talk-page-bundle' => '$1 kaj {{PLURAL:$4|alia uzanto|$3 aliaj uzantoj}} {{GENDER:$1|lasis}} mesaĝon sur via [[User talk:$2|diskutopaĝo]].',
	'notification-page-linked-bundle' => '$2 estis {{GENDER:$1|ligita}} de $3 kaj $4 {{PLURAL:$5|plia paĝo|pliaj paĝoj}}. [[Special:WhatLinksHere/$2|Ligiloj ĉi tien]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 kaj {{PLURAL:$3|alia uzanto|$2 aliaj uzantoj}} {{GENDER:$1|lasis}} mesaĝon sur via diskutopaĝo.',
	'notification-page-linked-email-batch-bundle-body' => '$2 estis {{GENDER:$1|ligita}} de $3 kaj $4 {{PLURAL:$5|plia paĝo|pliaj paĝoj}}.',
	'echo-email-batch-subject-daily' => 'Vi havas {{PLURAL:$2|novan sciigon|novajn sciigojn}} sur {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Vi ĉisemajne havas {{PLURAL:$2|novan sciigon|novajn sciigojn}} sur {{SITENAME}}',
	'echo-email-batch-body-intro-daily' => 'Saluton $1,
Ĉi tie estas resumo de hodiaŭaj aktivaĵoj sur {{SITENAME}} por vi.',
	'echo-email-batch-body-intro-weekly' => 'Saluton $1,
Ĉi tie estas resumo de la aktivaĵoj de ĉi tiu semajno sur {{SITENAME}} por vi.',
	'echo-email-batch-link-text-view-all-notifications' => 'Montri ĉiujn sciigojn',
	'echo-rev-deleted-text-view' => 'Ĉi tiu revizio de la paĝo estis subpremita.',
);

/** Spanish (español)
 * @author -jem-
 * @author Armando-Martin
 * @author DJ Nietzsche
 * @author Fitoschido
 * @author Hahc21
 * @author Invadinado
 * @author Jduranboger
 * @author Larjona
 * @author Miguel2706
 * @author PoLuX124
 * @author Ralgis
 * @author The Anonymouse
 * @author TheBITLINK
 * @author Vivaelcelta
 */
$messages['es'] = array(
	'echo-desc' => 'Sistema de notificaciones',
	'prefs-echo' => 'Notificaciones',
	'prefs-emailsettings' => 'Opciones de correo electrónico',
	'prefs-displaynotifications' => 'Opciones de visualización',
	'prefs-echosubscriptions' => 'Notificarme sobre estos eventos',
	'prefs-newmessageindicator' => 'Indicador de mensajes nuevos',
	'echo-pref-send-me' => 'Enviarme:',
	'echo-pref-send-to' => 'Enviar a:',
	'echo-pref-email-format' => 'Formato de correo electrónico:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Correo electrónico',
	'echo-pref-email-frequency-never' => 'No enviarme notificaciones por correo electrónico',
	'echo-pref-email-frequency-immediately' => 'Enviarme las notificaciones individuales en cuanto lleguen',
	'echo-pref-email-frequency-daily' => 'Resumen diario de notificaciones',
	'echo-pref-email-frequency-weekly' => 'Resumen semanal de las notificaciones',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Texto sin formato',
	'echo-pref-notify-show-link' => 'Mostrar las notificaciones en mi barra de herramientas',
	'echo-pref-new-message-indicator' => 'Mostrar un indicador de mensajes nuevos en la barra de herramientas',
	'echo-learn-more' => 'Leer más',
	'echo-new-messages' => 'Tienes mensajes nuevos',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Mensaje|mensajes}} en la página de discusión',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Enlace|Enlaces}} de página',
	'echo-category-title-reverted' => 'Editar {{PLURAL:$1|la reversión|las reversiones}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Mención|Menciones}}',
	'echo-category-title-other' => '{{PLURAL:$1|Otros}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistema}}',
	'echo-pref-tooltip-edit-user-talk' => 'Notificarme cuando alguien publique un mensaje o responda en mi página de discusión.',
	'echo-pref-tooltip-article-linked' => 'Notificarme cuando alguien enlace en un artículo a una página creada por mí.',
	'echo-pref-tooltip-reverted' => 'Notificarme cuando alguien revierta una edición mía mediante las herramientas de deshacer o revertir.',
	'echo-pref-tooltip-mention' => 'Notificarme cuando alguien enlace a mi página de usuario desde cualquier página de discusión.',
	'echo-no-agent' => '[Nadie]',
	'echo-no-title' => '[No hay ninguna página]',
	'echo-error-no-formatter' => 'No se definió ningún formato para las notificaciones.',
	'echo-error-preference' => 'Error: No se pudo establecer la preferencia del usuario.',
	'echo-error-token' => 'Error: No se pudo recuperar el token de usuario.',
	'notifications' => 'Notificaciones',
	'tooltip-pt-notifications' => 'Mis notificaciones',
	'echo-specialpage' => 'Notificaciones',
	'echo-anon' => 'Para recibir notificaciones, [$1 crea una cuenta] o [$2 inicia sesión].',
	'echo-none' => 'No tienes notificaciones.',
	'echo-more-info' => 'Más información',
	'echo-feedback' => 'Comentarios',
	'notification-link-text-view-message' => 'Ver mensaje',
	'notification-link-text-view-mention' => 'Ver la mención',
	'notification-link-text-view-changes' => 'Ver cambios',
	'notification-link-text-view-page' => 'Ver página',
	'notification-link-text-view-edit' => 'Ver edición',
	'notification-edit-talk-page2' => '[[User:$1|$1]] te ha dejado un mensaje en tu [[User talk:$2#$3|página de discusión]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] te ha dejado un mensaje en tu página de discusión: «[[User talk:$2#$3|$4]]».',
	'notification-edit-talk-page-flyout2' => '$1 te ha dejado un mensaje en tu [[User talk:$2#$3|página de discusión]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 te ha dejado un mensaje en tu página de discusión: «[[User talk:$2#$3|$4]]».',
	'notification-page-linked' => '[[:$2]] fue {{GENDER:$1|enlazado}} a [[:$3]]. [[Special:WhatLinksHere/$2|Ver todos los enlaces a esta página]].',
	'notification-page-linked-flyout' => '$2 fue {{GENDER:$1|enlazado}} a [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|comentó}} en la sección "[[$3|$2]]" de la página de discusión de "$4".',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] inició un nuevo hilo, "$2", en [[$3]].',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|te envió}} un mensaje: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|comentó}} "[[$3#$2|$2]]" en  tu página de discusión.',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|te mencionó}} en la página de discusión de $5 en "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 {{GENDER:$1|te mencionó}} en la página de discusión de $5 en "[[$3#$2|$4]]".',
	'notification-mention-nosection' => '[[User:$1|$1]] te ha mencionado en la [[$3|página de discusión de $2]].',
	'notification-mention-nosection-flyout' => '$1 te ha mencionado en la [[$3|$2 página de discusión]].',
	'notification-user-rights' => 'Tus permisos de usuario [[Special:Log/rights/$1|han sido {{GENDER:$1|modificados}}]] por [[User:$1|$1]]. $2. [[Special:ListGroupRights|Ver más]]',
	'notification-user-rights-flyout' => 'Tus permisos de usuario {{GENDER:$1|han sido modificados}} por $1. $2. [[Special:ListGroupRights|Ver más]]',
	'notification-user-rights-add' => 'Ahora eres miembro {{PLURAL:$2|del siguiente grupo|de los siguientes grupos grupos}}: $1',
	'notification-user-rights-remove' => 'Has dejado de pertenecer {{PLURAL:$2|al siguiente grupo|a los siguientes grupos}}: $1',
	'notification-new-user' => '¡Bienvenido a {{SITENAME}}, $1! Nos alegra que estés aquí.',
	'notification-reverted2' => '{{PLURAL:$4|Tu|Tus}} {{PLURAL:$4|edición en [[:$2]] ha|ediciones en [[:$2]] han}} sido {{PLURAL:$4|revertida|revertidas}} por {{GENDER:$1|el|la|el}} usuari{{GENDER:$1|o|a|o}} [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Tu|Tus}} {{PLURAL:$4|edición en $2 ha|ediciones en $2 han}} sido {{PLURAL:$4|revertida|revertidas}} por {{GENDER:$1|el|la|el}} usuari{{GENDER:$1|o|a|o}} $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 te ha dejado un mensaje en {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 te ha dejado un mensaje en tu página de discusión:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 te ha dejado un mensaje en tu página de discusión: «$2»',
	'notification-page-linked-email-subject' => 'Se ha añadido un enlace a una página creada por ti en {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2 ha sido {{GENDER:$1|enlazada}} desde $3.',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Tu|Tus}} {{PLURAL:$3|edición fue|ediciones fueron}} {{GENDER:$1|{{PLURAL:$3|revertida|revertidas}}}} en {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Tu|Tus}} {{PLURAL:$3|edición en $2 ha sido|ediciones en $2 han sido}} {{GENDER:$1|{{PLURAL:$3|revertida|revertidas}}}} por $1.',
	'notification-mention-email-subject' => '$1 te ha {{GENDER:$1|mencionado}} en {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 te ha {{GENDER:$1|mencionado}} en la página de discusión de $4, en "$3"',
	'notification-mention-nosection-email-batch-body' => '$1 te ha mencionado en la página de discusión de $2.',
	'notification-user-rights-email-subject' => 'Tus permisos de usuario en {{SITENAME}} han sido modificados.',
	'notification-user-rights-email-batch-body' => 'Tus permisos de usuario fueron {{GENDER:$1|modificados}} por $1. $2.',
	'echo-email-subject-default' => 'Nueva notificación en {{SITENAME}}',
	'echo-email-body-default' => 'Tienes una nueva notificación en {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Tienes una nueva notificación',
	'echo-email-footer-default' => '$2

Para controlar los emails que te enviamos, visita:
{{canonicalurl:{{#Especial:Preferencias}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Para controlar los emails que te enviamos, <a href="$2" style="text-decoration:none; color: #3868B0;">verifica tus preferencias</a>.<br />

$1',
	'echo-overlay-link' => 'Todas las notificaciones',
	'echo-overlay-title' => '<b>Notificaciones</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Notificaciones}}</b> (se muestran $1 de $2 sin leer)',
	'echo-mark-all-as-read' => 'Marcar todo como leído',
	'echo-date-today' => 'Hoy',
	'echo-date-yesterday' => 'Ayer',
	'echo-load-more-error' => 'Se ha producido un error al intentar obtener más resultados.',
	'notification-edit-talk-page-bundle' => '$1 y $3 {{PLURAL:$4|usuario|usuarios}} más han escrito en tu [[User talk:$2|página de discusión]].',
	'notification-page-linked-bundle' => '$2 fue {{GENDER:$1|enlazado|enlazada|enlazado}} desde $3 y $4 {{PLURAL:$5|página|páginas}} más. [[Special:WhatLinksHere/$2|Verifica todos los enlaces a ésta página]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 y $2 {{PLURAL:$3|usuario|usuarios}} más han escrito en tu página de discusión.',
	'notification-page-linked-email-batch-bundle-body' => '$2 fue {{GENDER:$1|enlazada}} desde $3 y $4 {{PLURAL:$5|página|páginas}} más.',
	'echo-email-batch-subject-daily' => 'Tienes {{PLURAL:$2|una nueva notificación|nuevas notificaciones}} en {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Tienes {{PLURAL:$2|una nueva notificación|nuevas notificaciones}} esta semana',
	'echo-email-batch-body-intro-daily' => 'Hola $1,
Aquí está un resumen de la actividad de hoy en {{SITENAME}}.',
	'echo-email-batch-body-intro-weekly' => 'Hola $1,
Aquí está un resumen de la actividad de esta semana en {{SITENAME}}.',
	'echo-email-batch-link-text-view-all-notifications' => 'Ver todas las notificaciones',
	'echo-rev-deleted-text-view' => 'Esta revisión de página ha sido suprimida.',
);

/** Estonian (eesti)
 * @author Avjoska
 * @author Kyng
 * @author Pikne
 */
$messages['et'] = array(
	'echo-desc' => 'Teavitussüsteem',
	'prefs-echo' => 'Teavitused',
	'prefs-emailsettings' => 'E-posti suvandid',
	'prefs-displaynotifications' => 'Kuvaseaded',
	'prefs-echosubscriptions' => 'Teavita mind neist sündmustest',
	'prefs-newmessageindicator' => 'Uue sõnumi indikaator',
	'echo-pref-send-me' => 'Saada mulle:',
	'echo-pref-send-to' => 'Saada aadressile:',
	'echo-pref-email-format' => 'E-posti vorming:',
	'echo-pref-web' => 'Veeb',
	'echo-pref-email' => 'E-post',
	'echo-pref-email-frequency-never' => 'Ära saada mulle ühtegi e-posti teavitust',
	'echo-pref-email-frequency-immediately' => 'Üksikud teavitused nende ilmumisel',
	'echo-pref-email-frequency-daily' => 'Teavituste päevakokkuvõte',
	'echo-pref-email-frequency-weekly' => 'Teavituste nädalakokkuvõte',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Lihttekst',
	'echo-pref-notify-show-link' => 'Näita teavitusi minu tööriistaribal',
	'echo-pref-new-message-indicator' => 'Näita arutelulehekülje postituste indikaatorit minu tööriistaribal',
	'echo-learn-more' => 'Lisateave',
	'echo-new-messages' => 'Sulle on uusi sõnumeid',
	'echo-category-title-edit-user-talk' => 'Arutelulehekülje {{PLURAL:$1|sõnum|sõnumid}}',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Leheküljelink|Leheküljelingid}}',
	'echo-category-title-reverted' => 'Tühistatud {{PLURAL:$1|muudatus|muudatused}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Mainimine|Mainimised}}',
	'echo-category-title-other' => '{{PLURAL:$1|Muu}}',
	'echo-category-title-system' => '{{PLURAL:$1|Süsteem}}',
	'echo-pref-tooltip-edit-user-talk' => 'Teavita mind, kui keegi postitab või vastab minu aruteluleheküljel.',
	'echo-pref-tooltip-article-linked' => 'Teavita mind, kui keegi lingib mõnest artiklist minu alustatud leheküljele.',
	'echo-pref-tooltip-reverted' => 'Teavita mind, kui keegi tühistab minu muudatuse, kasutades eemaldus- või tühistusfunktsiooni.',
	'echo-pref-tooltip-mention' => 'Teavita mind, kui keegi lingib mõnelt aruteluleheküljelt minu aruteluleheküljele',
	'echo-no-agent' => '[Eikeegi]',
	'echo-no-title' => '[Lehekülge pole]',
	'echo-error-no-formatter' => 'Teavituse vormindusviis on määramata.',
	'echo-error-preference' => 'Viga: Ei saanud kasutaja eelistusi salvestada',
	'echo-error-token' => 'Tõrge: Ei õnnestunud leida kasutajaluba.',
	'notifications' => 'Teavitused',
	'tooltip-pt-notifications' => 'Sinu teavitused',
	'echo-specialpage' => 'Teavitused',
	'echo-anon' => 'Et teavitusi saada, [$1 loo konto] või [$2 logi sisse].',
	'echo-none' => 'Sul pole uusi teavitusi.',
	'echo-more-info' => 'Lisateave',
	'echo-feedback' => 'Tagasiside',
	'notification-link-text-view-message' => 'Vaata sõnumit',
	'notification-link-text-view-mention' => 'Vaata mainimist',
	'notification-link-text-view-changes' => 'Vaata muudatusi',
	'notification-link-text-view-page' => 'Vaata lehekülge',
	'notification-link-text-view-edit' => 'Vaata muudatust',
	'notification-edit-talk-page2' => '[[User:$1|$1]] jättis sõnumi sinu [[User talk:$2#$3|aruteluleheküljele]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] jättis sõnumi sinu arutelulehekülje alaosasse "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 jättis sõnumi sinu [[User talk:$2#$3|aruteluleheküljele]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 jättis sõnumi sinu arutelulehekülje alaosasse "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => 'Leheküljele [[:$2]] {{GENDER:$1|lingiti}} asukohast [[:$3]]. [[Special:WhatLinksHere/$2|Vaata kõiki linke sellele leheküljele]].',
	'notification-page-linked-flyout' => 'Leheküljele $2 {{GENDER:$1|lingiti}} asukohast [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] lisas kommentaari lehekülje "$4" arutelu alaosasse "[[$3|$2]]".',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|postitas}} uue teema "$2" arutellu [[$3]].',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|saatis}} sulle sõnumi: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]] lisas kommentaari sinu arutelulehekülje alaosasse "[[$3#$2|$2]]".',
	'notification-mention' => '[[User:$1|$1]] mainis sind kasutaja $5 arutelulehekülje alaosas "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 mainis sind kasutaja $5 arutelulehekülje alaosas "[[$3#$2|$4]]".',
	'notification-mention-nosection' => '[[User:$1|$1]] mainis sind lehekülje "$2" [[$3|arutelus]].',
	'notification-mention-nosection-flyout' => '$1 mainis sind lehekülje "$2" [[$3|arutelus]].',
	'notification-user-rights' => '[[User:$1|$1]] [[Special:Log/rights/$1|muutis]] sinu kasutajaõigusi. $2. [[Special:ListGroupRights|Lisateave]]',
	'notification-user-rights-flyout' => '$1 {{GENDER:$1|muutis}} sinu kasutajaõigusi. $2. [[Special:ListGroupRights|Lisateave]]',
	'notification-user-rights-add' => 'Kuulud nüüd {{PLURAL:$2|sellesse rühma|nendesse rühmadesse}}: $1',
	'notification-user-rights-remove' => 'Sa ei kuulu enam {{PLURAL:$2|sellesse rühma|nendesse rühmadesse}}: $1',
	'notification-new-user' => 'Tere tulemast saidile {{SITENAME}}, $1! Meil on hea meel, et siin oled.',
	'notification-reverted2' => '[[User:$1|$1]] tühistas sinu {{PLURAL:$4|muudatuse|muudatused}} leheküljel [[:$2]]. $3',
	'notification-reverted-flyout2' => '$1 tühistas sinu {{PLURAL:$4|muudatuse|muudatused}} leheküljel $2. $3',
	'notification-edit-talk-page-email-subject2' => '$1 jättis sulle {{GRAMMAR:inessive|{{SITENAME}}}} sõnumi',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|jättis}} sinu arutelulehele sõnumi:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|jättis}} sinu arutelulehele sõnumi "$2":',
	'notification-page-linked-email-subject' => '{{GRAMMAR:inessive|{{SITENAME}}}} lingiti sinu leheküljele',
	'notification-page-linked-email-batch-body' => 'Leheküljele $2 {{GENDER:$1|lingiti}} asukohast $3.',
	'notification-reverted-email-subject2' => 'Sinu {{PLURAL:$3|muudatus|muudatused}} {{GRAMMAR:inessive|{{SITENAME}}}} {{GENDER:$1|tühistati}}',
	'notification-reverted-email-batch-body2' => '$1 tühistas võrgukohas {{SITENAME}} leheküljel $2 sinu {{PLURAL:$3|muudatuse|muudatused}}',
	'notification-mention-email-subject' => '$1 mainis {{GRAMMAR:inessive|{{SITENAME}}}} sind',
	'notification-mention-email-batch-body' => '$1 mainis sind kasutaja $4 arutelulehekülje alaosas "$3".',
	'notification-mention-nosection-email-batch-body' => '$1 mainis sind lehekülje "$2" arutelus.',
	'notification-user-rights-email-subject' => '{{GRAMMAR:inessive|{{SITENAME}}}} muudeti sinu kasutajaõigusi',
	'notification-user-rights-email-batch-body' => '$1 {{GENDER:$1|muutis}} sinu kasutajaõigusi. $2.',
	'echo-email-subject-default' => 'Uus teavitus {{GRAMMAR:inessive|{{SITENAME}}}}',
	'echo-email-body-default' => 'Võrgukohas {{SITENAME}} on sulle uus teavitus:

$1',
	'echo-email-batch-body-default' => 'Sulle on uus teavitus.',
	'echo-email-footer-default' => '$2

Et valida, milliseid e-kirju sulle saadetakse, sea oma eelistusi:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Et valida, milliseid e-kirju sulle saadetakse, <a href="$2" style="text-decoration:none; color: #3868B0;">sea oma eelistusi</a>.<br />
$1',
	'echo-overlay-link' => 'Kõik teavitused',
	'echo-overlay-title' => '<b>Teavitused</b>',
	'echo-overlay-title-overflow' => '<b>Teavitused</b> (näidatakse {{PLURAL:$1|üht|$1}} $2-st lugemata teavitusest)',
	'echo-mark-all-as-read' => 'Märgi kõik loetuks',
	'echo-date-today' => 'Täna',
	'echo-date-yesterday' => 'Eile',
	'echo-load-more-error' => 'Rohkemate tulemuste laadimisel ilmnes tõrge.',
	'notification-edit-talk-page-bundle' => '$1 ja veel {{PLURAL:$4|üks kasutaja|$3 kasutajat}} jätsid sõnumi sinu [[User talk:$2|aruteluleheküljele]].',
	'notification-page-linked-bundle' => 'Leheküljele $2 {{GENDER:$1|lingiti}} asukohast $3 ja veel {{PLURAL:$5|ühelt|$4}} leheküljelt. [[Special:WhatLinksHere/$2|Vaata kõiki linke sellele leheküljele]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 ja veel {{PLURAL:$3|üks kasutaja|$2 kasutajat}} jätsid sõnumi sinu aruteluleheküljele.',
	'notification-page-linked-email-batch-bundle-body' => 'Leheküljele $2 {{GENDER:$1|lingiti}} asukohast $3 ja veel {{PLURAL:$5|ühelt|$4}} leheküljelt.',
	'echo-email-batch-subject-daily' => 'Sulle on {{GRAMMAR:inessive|{{SITENAME}}}} {{PLURAL:$2|uus teavitus|uusi teavitusi}}',
	'echo-email-batch-subject-weekly' => 'Sulle on sellel nädalal {{GRAMMAR:inessive|{{SITENAME}}}} {{PLURAL:$2|uus teavitus|uusi teavitusi}}',
	'echo-email-batch-body-intro-daily' => 'Tere, $1.
Siin on sulle kokkuvõte võrgukohas {{SITENAME}} täna toimunust.',
	'echo-email-batch-body-intro-weekly' => 'Tere, $1.
Siin on sulle kokkuvõte võrgukohas {{SITENAME}} sellel nädalal toimunust.',
	'echo-email-batch-link-text-view-all-notifications' => 'Vaata kõiki teavitusi',
	'echo-rev-deleted-text-view' => 'Lehekülje see redaktsioon on varjatud.',
);

/** Basque (euskara)
 * @author Xabier Armendaritz
 */
$messages['eu'] = array(
	'echo-new-messages' => 'Mezu berriak dituzu',
	'tooltip-pt-notifications' => 'Zure jakinarazpenak',
);

/** Persian (فارسی)
 * @author A.R.Rostamzade
 * @author Dalba
 * @author Ebraminio
 * @author Ladsgroup
 * @author Mjbmr
 * @author Omidh
 * @author Reza1615
 * @author Rtemis
 * @author درفش کاویانی
 * @author فلورانس
 */
$messages['fa'] = array(
	'echo-desc' => 'سامانهٔ آگاه‌سازی‌ها',
	'prefs-echo' => 'آگاه‌سازی‌ها',
	'prefs-emailsettings' => 'تنظیمات رایانامه',
	'prefs-displaynotifications' => 'گزینه‌های نمایش',
	'prefs-echosubscriptions' => 'مرا از این رویدادها آگاه کن',
	'prefs-newmessageindicator' => 'نشانگر پیام تازه',
	'echo-pref-send-me' => 'برایم فرستاده شود:',
	'echo-pref-send-to' => 'فرستاده‌شود به:',
	'echo-pref-email-format' => 'قالب رایانامه:',
	'echo-pref-web' => 'وب‌گاه',
	'echo-pref-email' => 'رایانامه',
	'echo-pref-email-frequency-never' => 'آگاه‌سازی رایانامه‌ای برایم فرستاده نشود',
	'echo-pref-email-frequency-immediately' => 'آگاه‌سازی‌های جداگانه به محض دریافت',
	'echo-pref-email-frequency-daily' => 'خلاصهٔ روزانهٔ آگاه‌سازی‌‌ها',
	'echo-pref-email-frequency-weekly' => 'خلاصهٔ هفتگی از آگاه‌سازی‌ها',
	'echo-pref-email-format-html' => 'اچ‌تی‌ام‌ال',
	'echo-pref-email-format-plain-text' => 'متن ساده',
	'echo-pref-notify-show-link' => 'نمایش آگاه‌سازی‌ها در نوار ابزار من',
	'echo-pref-new-message-indicator' => 'نمایش نشانگر پیام صفحهٔ بحث در نوار ابزار من',
	'echo-learn-more' => 'اطلاعات بیشتر',
	'echo-new-messages' => 'پیام‌های جدیدی دارید',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|پیام|پیام‌های}} صفحهٔ بحث',
	'echo-category-title-article-linked' => '{{PLURAL:$1|پیوند|پیوندهای}} صفحه',
	'echo-category-title-reverted' => '{{PLURAL:$1|واگردانی|واگردانی‌های}} ویرایش',
	'echo-category-title-mention' => '{{PLURAL:$1|اشاره}}',
	'echo-category-title-other' => '{{PLURAL:$1|دیگر}}',
	'echo-category-title-system' => '{{PLURAL:$1|سامانه}}',
	'echo-pref-tooltip-edit-user-talk' => 'هنگامی که کسی برای من پیام فرستاد یا جواب پیام مرا در صفحهٔ بحثم داد، مرا آگاه کن.',
	'echo-pref-tooltip-article-linked' => 'هنگامی که کسی به مقالهٔ ایجادشده توسط من پیوند داد، مرا آگاه کن.',
	'echo-pref-tooltip-reverted' => 'هنگامی که کسی ویرایشی را که من انجام داده‌ام را با استفاده از ابزار خثنی‌سازی یا واگردانی، خثنی کرد، مرا آگاه کن.',
	'echo-pref-tooltip-mention' => 'هنگامی که شخصی به صفحهٔ کاربری من در هر صفحه‌ای پیوند ایجاد کرد، مرا آگاه کن.',
	'echo-no-agent' => '[هیچ کس]',
	'echo-no-title' => '[بدون عنوان]',
	'echo-error-no-formatter' => 'هیچ قالب تعریف‌شده‌ای برای آگاه‌سازی وجود ندارد',
	'echo-error-preference' => 'خطا: ترجیحات کاربر تنظیم نشده‌است.',
	'echo-error-token' => 'خطا: رمز کاربر قابل بازیابی نیست.',
	'notifications' => 'آگاه‌سازی‌ها',
	'tooltip-pt-notifications' => 'آگاه‌سازی‌های شما',
	'echo-specialpage' => 'آگاه‌سازی‌ها',
	'echo-anon' => 'برای دریافت آگاه‌سازی‌ها [$1 حسابی بسازید] یا [$2 وارد سامانه شوید] .',
	'echo-none' => 'شما هیچگونه آگاه‌سازی‌ای ندارید.',
	'echo-more-info' => 'اطلاعات بیشتر',
	'echo-feedback' => 'بازخورد',
	'notification-link-text-view-message' => 'نمایش پیام',
	'notification-link-text-view-mention' => 'مشاهدهٔ تذکر',
	'notification-link-text-view-changes' => 'نمایش تغییرات',
	'notification-link-text-view-page' => 'مشاهدهٔ صفحه',
	'notification-link-text-view-edit' => 'نمایش ویرایش',
	'notification-edit-talk-page2' => '[[User:$1|$1]] در صفحه‌‌ٔ بحث شما  [[User talk:$2#$3|پیامی]] گذاشته‌است.',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] برای شما در صفحهٔ بحث‌تان  در «[[User talk:$2#$3|$4]]» پیامی {{GENDER:$1|گذاشت}}.',
	'notification-edit-talk-page-flyout2' => '$1 در صفحه‌‌ٔ‌‌‌ بحث شما [[User talk:$2#$3|مطلبی]] گذاشته‌است.',
	'notification-edit-talk-page-flyout-with-section' => '$1 یک پیام در بحث شما در «[[User talk:$2#$3|$4]]» {{GENDER:$1|گذاشته‌است}}.',
	'notification-page-linked' => '[[:$2]] از [[:$3]] {{GENDER:$1|پیوند گرفته‌است}}. [[Special:WhatLinksHere/$2|همهٔ پیوندها به این صفحه را ببینید]].',
	'notification-page-linked-flyout' => '$2 از [[:$3]] {{GENDER:$1|پیوند گرفته‌است}}.',
	'notification-add-comment2' => '[[User:$1|$1]] در «[[$3|$2]]» در صفحه بحث «$4» نظری افزود.',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] بخش جدیدی «$2» در [[$3]] ایجاد کرد.',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] به شما پیامی فرستاد: «[[$3#$2|$2]]»',
	'notification-add-comment-yours2' => '[[User:$1|$1]] در «[[$3#$2|$2]]» در صفحه بحث شما نظری داده‌است',
	'notification-mention' => '[[User:$1|$1]] به شما در بحث $5  در «[[$3#$2|$4]]» {{GENDER:$1|اشاره‌کرد}}.',
	'notification-mention-flyout' => '$1 در بحث $5 در «[[$3#$2|$4]]» به شما {{GENDER:$1|اشاره}} کرده‌است.',
	'notification-mention-nosection' => '[[User:$1|$1]] در  [[$3|صفحه بحث $2]] به شما {{GENDER:$1|اشاره}} کرده‌ است.',
	'notification-mention-nosection-flyout' => '$1 در  [[$3|صفحهٔ بحث $2 ]] به شما {{GENDER:$1|اشاره}} کرده است.',
	'notification-user-rights' => 'دسترسی‌های شما توسط [[User:$1|$1]] [[Special:Log/rights/$1|تغییر یافته است]] . $2. [[Special:ListGroupRights|بیشتر بخوانید]]',
	'notification-user-rights-flyout' => 'دسترسی‌های شما توسط $1 تغییر یافت. $2. [[Special:ListGroupRights|اطلاعات بیشتر]]',
	'notification-user-rights-add' => 'شما در حال حاضر عضو  {{PLURAL:$2| این گروه|این گروه‌ها}} هستید:$1',
	'notification-user-rights-remove' => 'شما دیگر عضو {{PLURAL:$2|این گروه|این گروه‌ها}} نیستید: $1',
	'notification-new-user' => 'به {{SITENAME}} خوش‌آمدید، $1! خوشحالیم که شما اینجا هستید.',
	'notification-reverted2' => '{{PLURAL:$4|ویرایش|ویرایش‌های}} شما در [[:$2]] توسط [[User:$1|$1]] واگردانی شده‌اند. $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|ویرایش|ویرایش‌های}} شما بر روی $2 توسط $1 واگردانی {{GENDER:$1|شده‌است}}. $3',
	'notification-edit-talk-page-email-subject2' => 'شما یک پیام تازه از طرف $1 در صفحهٔ بحث {{SITENAME}} دارید.',
	'notification-edit-talk-page-email-batch-body2' => '$1 پیامی بر روی صفحهٔ بحثتان {{GENDER:$1|گذاشته‌است}}:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 یک پیام در بحث شما در «$2» {{GENDER:$1|گذاشته‌است}}.',
	'notification-page-linked-email-subject' => 'صفحه‌ای که شما آغازگر آن بودید در {{SITENAME}} پیوند شد.',
	'notification-page-linked-email-batch-body' => '$2 از $3 {{GENDER:$1|پیوند داده شده‌است}}.',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|ویرایش|ویرایش‌های}} شما در {{SITENAME}} {{GENDER:$1|واگردانی شده‌است}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|ویرایش|ویرایش‌های}} شما در $2 توسط $1 {{GENDER:$1|واگردانی شده‌است}}.',
	'notification-mention-email-subject' => '$1 شما را در {{SITENAME}} {{GENDER:$1|ذکر کرده‌است}}',
	'notification-mention-email-batch-body' => '$1 در $4 صفحهٔ بحث «$3» به شما {{GENDER:$1|اشاره کرد}}',
	'notification-mention-nosection-email-batch-body' => '$1 در صفحهٔ بحث $2 به‌ شما {{GENDER:$1|اشاره}} کرده است.',
	'notification-user-rights-email-subject' => 'دسترسی‌های شما در {{SITENAME}} تغییر یافته‌است',
	'notification-user-rights-email-batch-body' => 'دسترسی‌های شما توسط $1 تغییر یافته‌است. $2',
	'echo-email-subject-default' => 'آگاه‌سازی‌های تازه در {{SITENAME}}',
	'echo-email-body-default' => 'شما در {{SITENAME}} آگاه‌سازی تازه‌ای دارید:

$1',
	'echo-email-batch-body-default' => 'شما آگاه‌سازی تازه‌ای دارید.',
	'echo-email-footer-default' => '$2

برای کنترل رایانامه‌های ارسالی به شما ترجیحات‌تان را بررسی کنید:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'برای کنترل اینکه چه رایانامه‌ای به شما بفرستیم، <a href="$2" style="text-decoration:none; color: #3868B0;">ترجیحاتتان را بررسی کنید</a>.<br />
$1',
	'echo-overlay-link' => 'همهٔ آگاه‌سازی‌ها',
	'echo-overlay-title' => '<b>آگاه‌سازی‌ها</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|آگاه‌سازی‌ها}}</b> (نمایش $1 از $2 خوانده‌نشده)',
	'echo-mark-all-as-read' => 'نشان‌گذاری همه به‌عنوان خوانده‌شده',
	'echo-date-today' => 'امروز',
	'echo-date-yesterday' => 'دیروز',
	'echo-load-more-error' => 'دریافت نتیجه‌های بیشتر با خطا مواجه شده‌است.',
	'notification-edit-talk-page-bundle' => '$1 و $3 {{PLURAL:$4|کاربر دیگر}} در صفحهٔ [[User talk:$2|بحث شما]] پیامی گذاشته‌اند.',
	'notification-page-linked-bundle' => '$2 بدست $1 از $3 و $4 {{PLURAL:$5|صفحهٔ دیگر}} پیوند داده شده‌است. [[Special:WhatLinksHere/$2|دیدن همهٔ پیوندها به این صفحه]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 و $2 {{PLURAL:$3|شخص دیگر}} پیامی در صفحهٔ بحث شما گذاشته‌اند.',
	'notification-page-linked-email-batch-bundle-body' => '$2 از $3 و $4 {{PLURAL:$5|صفحهٔ دیگر}} {{GENDER:$1|پیوند داده شده‌است}}.',
	'echo-email-batch-subject-daily' => 'شما دارای {{PLURAL:$2|یک آگاه‌سازی تازه|آگاه‌سازی‌های تازه‌ای}} در {{SITENAME}} هستید',
	'echo-email-batch-subject-weekly' => 'شما دارای {{PLURAL:$2|یک آگاه‌سازی تازه|آگاه‌سازی‌های تازه‌ای}} در {{SITENAME}} در این هفته هستید',
	'echo-email-batch-body-intro-daily' => 'سلام $1،
در اینجا خلاصهٔ فعالیت امروز شما در {{SITENAME}} وجود دارد.',
	'echo-email-batch-body-intro-weekly' => 'سلام $1،
در اینجا خلاصهٔ فعالیت این هفتهٔ شما در {{SITENAME}} وجود دارد.',
	'echo-email-batch-link-text-view-all-notifications' => 'دیدن همهٔ آگاه‌سازی‌ها',
	'echo-rev-deleted-text-view' => 'بازنگری این صفحه متوقف شده‌است.',
);

/** Finnish (suomi)
 * @author Crt
 * @author Nedergard
 * @author Nike
 * @author Olli
 * @author Pxos
 * @author Samoasambia
 * @author Silvonen
 * @author Stryn
 * @author VezonThunder
 */
$messages['fi'] = array(
	'echo-desc' => 'Ilmoitusten lähetysjärjestelmä',
	'prefs-echo' => 'Ilmoitukset',
	'prefs-emailsettings' => 'Sähköpostiasetukset',
	'prefs-displaynotifications' => 'Näyttöasetukset',
	'prefs-echosubscriptions' => 'Ilmoita minulle näistä tapahtumista',
	'prefs-newmessageindicator' => 'Uuden viestin ilmaisin',
	'echo-pref-send-me' => 'Lähetä minulle:',
	'echo-pref-send-to' => 'Lähetä osoitteeseen:',
	'echo-pref-email-format' => 'Sähköpostin muoto:',
	'echo-pref-web' => 'Verkko',
	'echo-pref-email' => 'Sähköposti',
	'echo-pref-email-frequency-never' => 'Älä lähetä minulle sähköposti-ilmoituksia',
	'echo-pref-email-frequency-immediately' => 'Yksittäiset ilmoitukset sitä mukaa kun niitä tulee',
	'echo-pref-email-frequency-daily' => 'Päivittäinen yhteenveto ilmoituksista',
	'echo-pref-email-frequency-weekly' => 'Viikottainen yhteenveto ilmoituksista',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Pelkkä teksti',
	'echo-pref-notify-show-link' => 'Näytä ilmoitukset työkalurivissä',
	'echo-pref-new-message-indicator' => 'Näytä keskustelusivujen viestistä erillinen ilmoitus työkalurivilläni',
	'echo-learn-more' => 'Lue lisää aiheesta',
	'echo-new-messages' => 'Sinulle on uusia viestejä',
	'echo-category-title-edit-user-talk' => 'Keskustelusivun {{PLURAL:$1|viesti|viestit}}',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Sivun linkki|Sivujen linkit}}',
	'echo-category-title-reverted' => '{{PLURAL:$1|Muokkauksen kumoaminen|Muokkausten kumoamiset}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Maininta|Maininnat}}',
	'echo-category-title-other' => '{{PLURAL:$1|Muu|Muut}}',
	'echo-category-title-system' => '{{PLURAL:$1|Järjestelmä}}',
	'echo-pref-tooltip-edit-user-talk' => 'Ilmoita minulle, kun joku kirjoittaa viestin tai vastaa viestiini keskustelusivullani.',
	'echo-pref-tooltip-article-linked' => 'Ilmoita minulle, kun joku linkittää luomaani sivuun artikkelisivulta.',
	'echo-pref-tooltip-reverted' => 'Ilmoita minulle, kun joku kumoaa tekemäni muokkauksen käyttäen kumoa/palauta-työkalua.',
	'echo-pref-tooltip-mention' => 'Ilmoita minulle, kun joku tekee linkin käyttäjäsivulleni joltakin keskustelusivulta.',
	'echo-no-agent' => '[Ei kukaan]',
	'echo-no-title' => '[Ei sivua]',
	'echo-error-no-formatter' => 'Mitään muotoilua ei ole määritelty tälle ilmoitukselle.',
	'echo-error-preference' => 'Virhe: Käyttäjäasetuksen määritys epäonnistui.',
	'echo-error-token' => 'Virhe: Käyttäjätunnisteen (token) haku epäonnistui.',
	'notifications' => 'Ilmoitukset',
	'tooltip-pt-notifications' => 'Omat ilmoitukset',
	'echo-specialpage' => 'Ilmoitukset',
	'echo-anon' => 'Jos haluat saada ilmoituksia, [$1 luo käyttäjätunnus] tai [$2 kirjaudu sisään].',
	'echo-none' => 'Sinulla ei ole ilmoituksia.',
	'echo-more-info' => 'Lisätietoja',
	'echo-feedback' => 'Palaute',
	'notification-link-text-view-message' => 'Näytä viesti',
	'notification-link-text-view-mention' => 'Näytä maininta',
	'notification-link-text-view-changes' => 'Näytä muutokset',
	'notification-link-text-view-page' => 'Näytä sivu',
	'notification-link-text-view-edit' => 'Näytä muokkaus',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|jätti}} viestin [[User talk:$2#$3|keskustelusivullesi]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|jätti}} viestin keskustelusivullesi osioon "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|jätti}} viestin [[User talk:$2#$3|keskustelusivullesi]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|jätti}} viestin keskustelusivullesi osioon "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => 'Sivulle [[:$2]] {{GENDER:$1|on nyt linkki}} sivulta [[:$3]].[[Special:WhatLinksHere/$2|Katso kaikki kohteeseen viittaavat linkit]].',
	'notification-page-linked-flyout' => 'Sivulle $2 {{GENDER:$1|johtaa nyt linkki}} sivulta [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|kommentoi}} aihetta "[[$3|$2]]" keskustelusivulla "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|lisäsi}} uuden aiheen "$2" sivulle [[$3]].',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|lähetti}} sinulle viestin: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|kommentoi}} aihetta "[[$3#$2|$2]]" keskustelusivullasi.',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|mainitsi}} sinut kohteen $5 keskustelussa osiossa "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 {{GENDER:$1|mainitsi}} sinut kohteen $5 keskustelussa osiossa "[[$3#$2|$4]]".',
	'notification-mention-nosection' => '[[User:$1|$1]] {{GENDER:$1|mainitsi}} sinut [[$3|$2 keskustelusivulla]].',
	'notification-mention-nosection-flyout' => '$1 {{GENDER:$1|mainitsi}} sinut [[$3|$2 keskustelusivulla]].',
	'notification-user-rights' => '[[User:$1|$1]] [[Special:Log/rights/$1|{{GENDER:$1|muutti}}]] käyttöoikeuksiasi. $2. [[Special:ListGroupRights|Lisätietoja]]',
	'notification-user-rights-flyout' => '$1 {{GENDER:$1|muutti}} käyttöoikeuksiasi. $2. [[Special:ListGroupRights|Lisätietoja]]',
	'notification-user-rights-add' => 'Olet nyt {{PLURAL:$2|tämän ryhmän|näiden ryhmien}} jäsen: $1',
	'notification-user-rights-remove' => 'Et ole enää {{PLURAL:$2|tämän ryhmän|näiden ryhmien}} jäsen: $1',
	'notification-new-user' => 'Tervetuloa sivustolle {{SITENAME}}, $1! Olemme iloisia että olet täällä.',
	'notification-reverted2' => '[[User:$1|$1]] {{GENDER:$1|kumosi}} {{PLURAL:$4|muokkauksesi}} sivulla [[:$2]]. $3',
	'notification-reverted-flyout2' => 'Käyttäjä $1 on {{GENDER:$1|kumonnut}} {{PLURAL:$4|muokkauksesi sivulla $2|muokkauksiasi sivulla $2}}. $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|jätti}} sinulle viestin sivustolla {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|jätti}} viestin keskustelusivullesi:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|jätti}} viestin keskustelusivullesi osioon "$2".',
	'notification-page-linked-email-subject' => 'Sivusi linkitettiin sivustolla {{SITENAME}}',
	'notification-page-linked-email-batch-body' => 'Sivulle $2 johtava {{GENDER:$1|linkki lisättiin}} sivulta $3.',
	'notification-reverted-email-subject2' => 'Tekemäsi {{PLURAL:$3|muokkaus|muokkaukset}} sivustolla {{SITENAME}} on {{GENDER:$1|kumottu}}.',
	'notification-reverted-email-batch-body2' => 'Tekemäsi {{PLURAL:$3|muutoksen sivulle $2 on|muutokset sivulle $2 on}} {{GENDER:$1|kumonnut}} $1.',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|mainitsi}} sinut sivustolla {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|mainitsi}} sinut kohteen $4 keskustelussa osiossa "$3".',
	'notification-mention-nosection-email-batch-body' => '$1 {{GENDER:$1|mainitsi}} sinut keskustelusivulla $2.',
	'notification-user-rights-email-subject' => 'Käyttöoikeutesi ovat muuttuneet sivustolla {{SITENAME}}',
	'notification-user-rights-email-batch-body' => '$1 {{GENDER:$1|muutti}} käyttöoikeuksiasi. $2.',
	'echo-email-subject-default' => 'Uusi ilmoitus sivustolla {{SITENAME}}',
	'echo-email-body-default' => 'Sinulle on uusi ilmoitus sivustolla {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Sinulla on uusi ilmoitus.',
	'echo-email-footer-default' => '$2

Määrittele, mitä sähköposteja lähetämme sinulle, tarkistamalla asetuksesi:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Määrittele, mitä sähköpostiviestejä lähetämme sinulle, <a href="$2" style="text-decoration:none; color: #3868B0;">tarkistamalla asetuksesi</a>.<br />
$1',
	'echo-overlay-link' => 'Kaikki ilmoitukset',
	'echo-overlay-title' => '<b>Ilmoitukset</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Ilmoitukset}}</b> (näytetään $1 ($2) lukematonta)',
	'echo-mark-all-as-read' => 'Merkitse kaikki luetuiksi',
	'echo-date-today' => 'Tänään',
	'echo-date-yesterday' => 'Eilen',
	'echo-load-more-error' => 'Virhe ilmeni, kun haettiin lisää tuloksia.',
	'notification-edit-talk-page-bundle' => '$1 ja {{PLURAL:$4|yksi muu|$3 muuta}} {{GENDER:$1|jättivät}} viestin [[User talk:$2|keskustelusivullesi]].',
	'notification-page-linked-bundle' => 'Sivulle $2 {{GENDER:$1|on tehty linkki}} sivulta $3 ja {{PLURAL:$5|yhdeltä muulta sivulta|$4 muulta sivulta}}. [[Special:WhatLinksHere/$2|Katso kaikki kohteeseen viittavat linkit]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 ja {{PLURAL:$3|yksi muu jättivät|$2 muuta ovat jättäneet}} viestin keskustelusivullesi.',
	'notification-page-linked-email-batch-bundle-body' => 'Sivu $2 {{GENDER:$1|linkitettiin}} sivulta $3 ja {{PLURAL:$5|yhdeltä muulta sivulta|$4 muulta sivulta}}',
	'echo-email-batch-subject-daily' => 'Sinulle on {{PLURAL:$2|yksi uusi ilmoitus|$2 uutta ilmoitusta}} sivustolla {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Sinulle on {{PLURAL:$2|yksi uusi ilmoitus|$2 uutta ilmoitusta}} tällä viikolla sivustolla {{SITENAME}}',
	'echo-email-batch-body-intro-daily' => 'Hei $1.
Tässä on sinulle kooste tämän päivän tapahtumista sivustolla {{SITENAME}}.',
	'echo-email-batch-body-intro-weekly' => 'Hei $1.
Tässä on sinulle kooste tämän viikon tapahtumista sivustolla {{SITENAME}}.',
	'echo-email-batch-link-text-view-all-notifications' => 'Katso kaikki ilmoitukset',
	'echo-rev-deleted-text-view' => 'Tämä versio sivusta on poistettu.',
);

/** Faroese (føroyskt)
 * @author EileenSanda
 */
$messages['fo'] = array(
	'echo-desc' => 'Fráboðanarskipan',
	'prefs-echo' => 'Fráboðanir',
	'prefs-emailsettings' => 'T-post innstillingar',
	'prefs-displaynotifications' => 'Innstillingar fyri sýning',
	'prefs-echosubscriptions' => 'Gev mær boð um hesar hendingar',
	'echo-pref-send-me' => 'Send mær:',
	'echo-pref-send-to' => 'Send til:',
	'echo-pref-email-format' => 'Teldupost format:',
	'echo-pref-web' => 'Net',
	'echo-pref-email' => 'T-postur',
	'echo-pref-email-frequency-never' => 'Ikki senda mær fráboðanir við telduposti',
	'echo-no-agent' => '[Ongin]',
	'echo-no-title' => '[Ongin síða]',
	'notification-link-text-view-page' => 'Vís síðu',
	'notification-link-text-view-edit' => 'Vís rætting',
	'echo-email-batch-body-default' => 'Tú hevur nýggj boð.',
	'echo-overlay-link' => 'Allar fráboðanir',
	'echo-overlay-title' => '<b>Fráboðanir</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Fráboðanir}}</b> (vísir $1 av $2 ólisnum)',
	'echo-mark-all-as-read' => 'Merk alt sum lisið',
	'echo-date-today' => 'Í dag',
	'echo-date-yesterday' => 'Í gjár',
);

/** French (français)
 * @author Automatik
 * @author Crochet.david
 * @author DavidL
 * @author Gomoko
 * @author Hello71
 * @author IAlex
 * @author Jean-Frédéric
 * @author Ltrlg
 * @author Metroitendo
 * @author Peter17
 * @author Sherbrooke
 * @author Tititou36
 * @author Urhixidur
 * @author Wyz
 * @author Y-M D
 */
$messages['fr'] = array(
	'echo-desc' => 'Système de notifications',
	'prefs-echo' => 'Notifications',
	'prefs-emailsettings' => 'Options de courriel',
	'prefs-displaynotifications' => "Options d'affichage",
	'prefs-echosubscriptions' => 'Me prévenir de ces événements',
	'prefs-newmessageindicator' => 'Indicateur de nouveau message',
	'echo-pref-send-me' => "M'envoyer :",
	'echo-pref-send-to' => 'Envoyer à :',
	'echo-pref-email-format' => 'Format de courriel :',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Courriel',
	'echo-pref-email-frequency-never' => "Ne pas m'envoyer de notification par courriel",
	'echo-pref-email-frequency-immediately' => "Notifications individuelles au fil de l'eau",
	'echo-pref-email-frequency-daily' => 'Un résumé quotidien des notifications',
	'echo-pref-email-frequency-weekly' => 'Un résumé hebdomadaire des notifications',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Texte brut',
	'echo-pref-notify-show-link' => "Afficher les notifications dans ma barre d'outils",
	'echo-pref-new-message-indicator' => 'Afficher l’indicateur de message sur la page de discussion dans ma barre d’outils',
	'echo-learn-more' => 'En savoir plus',
	'echo-new-messages' => 'Vous avez de nouveaux messages',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Message|Messages}} de la page de discussion',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Article lié|Article liés}}',
	'echo-category-title-reverted' => '{{PLURAL:$1|Modification annulée|Modifications annulées}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Mention|Mentions}}',
	'echo-category-title-other' => '{{PLURAL:$1|Autres}}',
	'echo-category-title-system' => '{{PLURAL:$1|Système}}',
	'echo-pref-tooltip-edit-user-talk' => 'Me prévenir quand quelqu’un publie un message ou répond sur ma page de discussion.',
	'echo-pref-tooltip-article-linked' => 'Me prévenir quand quelqu’un fait référence à une page que j’ai créée à partir d’une page d’article.',
	'echo-pref-tooltip-reverted' => 'Me prévenir quand quelqu’un annule une modification que j’ai faite, en utilisant l’outil annulation ou révocation',
	'echo-pref-tooltip-mention' => 'Me prévenir quand quelqu’un fait référence à ma page utilisateur depuis une page de discussion.',
	'echo-no-agent' => '[Personne]',
	'echo-no-title' => '[Aucune page]',
	'echo-error-no-formatter' => 'Aucune mise en forme définie pour la notification',
	'echo-error-preference' => 'Erreur : Impossible de définir la préférence utilisateur',
	'echo-error-token' => 'Erreur : Impossible de récupérer le jeton de l’utilisateur',
	'notifications' => 'Notifications',
	'tooltip-pt-notifications' => 'Vos notifications',
	'echo-specialpage' => 'Notifications',
	'echo-anon' => 'Pour recevoir des notifications, [$1 créez un compte] ou [$2 connectez-vous].',
	'echo-none' => "Vous n'avez reçu aucune notification.",
	'echo-more-info' => "Plus d'information",
	'echo-feedback' => 'Avis',
	'notification-link-text-view-message' => 'Afficher le message',
	'notification-link-text-view-mention' => 'Afficher la mention',
	'notification-link-text-view-changes' => 'Afficher les modifications',
	'notification-link-text-view-page' => 'Afficher la page',
	'notification-link-text-view-edit' => 'Afficher la modification',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|a laissé}} un message sur votre [[User talk:$2#$3|page de discussion]].',
	'notification-edit-talk-page-with-section' => "[[User:$1|$1]] a laissé un message sur votre page de discussion dans la [[User talk:$2#$3|section ''$4'']].",
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|a laissé}} un message sur votre [[User talk:$2#$3|page de discussion]].',
	'notification-edit-talk-page-flyout-with-section' => "$1 a laissé un message sur votre page de discussion dans la [[User talk:$2#$3|section ''$4'']].",
	'notification-page-linked' => '[[:$2]] a été {{GENDER:$1|référencé}} depuis [[:$3]]. [[Special:WhatLinksHere/$2|Voir tous les liens vers cette page]].',
	'notification-page-linked-flyout' => '$2 a été {{GENDER:$1|référencé}} depuis [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|a fait un commentaire}} dans « [[$3|$2]] » sur la page de discussion « $4 »',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|a publié}} un nouveau sujet "$2" sur [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] vous {{GENDER:$1|a envoyé}} un message: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => "[[User:$1|$1]] {{GENDER:$1|a fait un commentaire}} dans ''[[$3#$2|$2]]'' sur votre page de discussion",
	'notification-mention' => "[[User:$1|$1]] vous {{GENDER:$1|a mentionné|a mentionnée}} sur la page de discussion de $5 dans la [[$3#$2|section ''$4'']].",
	'notification-mention-flyout' => "$1 vous {{GENDER:$1|a mentionné|a mentionnée}} sur la page de discussion de $5 dans la [[$3#$2|section ''$4'']].",
	'notification-mention-nosection' => '[[User:$1|$1]] {{GENDER:$1|a fait mention}} de vous sur la [[$3|page de discussion de $2]].',
	'notification-mention-nosection-flyout' => '$1 {{GENDER:$1|a fait mention}} de vous sur la [[$3|page de discussion de $2]].',
	'notification-user-rights' => 'Vos droits d’utilisateur [[Special:Log/rights/$1|ont été {{GENDER:$1|modifiés}}]] par [[User:$1|$1]]. $2. [[Special:ListGroupRights|En savoir plus]]',
	'notification-user-rights-flyout' => 'Vos droits d’utilisateur {{GENDER:$1|ont été modifiés}} par $1. $2. [[Special:ListGroupRights|En savoir plus]]',
	'notification-user-rights-add' => 'Vous êtes maintenant membre de {{PLURAL:$2|ce groupe|ces groupes}} : $1',
	'notification-user-rights-remove' => 'Vous n’êtes plus membre de {{PLURAL:$2|ce groupe|ces groupes}} : $1',
	'notification-new-user' => 'Bienvenue sur {{SITENAME}}, $1 ! Nous sommes heureux de vous voir ici.',
	'notification-reverted2' => '{{PLURAL:$4|Votre modification sur [[:$2]] a|Vos modifications sur [[:$2]] ont}} été {{GENDER:$1|annulée}}{{PLURAL:$4||s}} par [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Votre modification sur $2 a|Vos modifications sur $2 ont}} été {{GENDER:$1|annulée}}{{PLURAL:$4||s}} par $1 $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|a laissé}} un message sur votre page de discussion sur {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|a laissé}} un message sur votre page de discussion :',
	'notification-edit-talk-page-email-batch-body-with-section' => "$1 a laissé un message sur votre page de discussion dans ''$2''.",
	'notification-page-linked-email-subject' => 'Votre page a été référencée sur {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2 a été {{GENDER:$1|référencé}} depuis $3',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Votre modification a été annulée|Vos modifications ont été annulées}} {{GENDER:$1|}} sur {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Votre modification sur $2 a été annulée|Vos modifications sur $2 ont été annulées}} {{GENDER:$1|}} par $1',
	'notification-mention-email-subject' => '$1 vous {{GENDER:$1|a mentionné|a mentionnée}} sur {{SITENAME}}',
	'notification-mention-email-batch-body' => "$1 vous {{GENDER:$1|a mentionné|a mentionnée}} sur la page de discussion de $4 dans ''$3''.",
	'notification-mention-nosection-email-batch-body' => '$1 {{GENDER:$1|a fait mention}} de vous sur la page de discussion de $2.',
	'notification-user-rights-email-subject' => 'Vos droits d’utilisateur ont été modifiés sur {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Vos droits d’utilisateur {{GENDER:$1|ont été modifiés}} par $1. $2',
	'echo-email-subject-default' => 'Nouvelle notification sur {{SITENAME}}',
	'echo-email-body-default' => 'Vous avez une nouvelle notification sur {{SITENAME}} :

$1',
	'echo-email-batch-body-default' => 'Vous avez une nouvelle notification',
	'echo-email-footer-default' => '$2

Pour vérifier quels courriels nous vous envoyons, allez dans vos préférences :
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Pour contrôler les courriels que nous vous envoyons, <a href="$2" style="text-decoration:none; color: #3868B0;">vérifiez vos préférences</a><br />
$1',
	'echo-overlay-link' => 'Toutes les notifications',
	'echo-overlay-title' => '<b>Notifications</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Notification|Notifications}}</b> ($1 sur $2 {{PLURAL:$1|non lue affichée|non lues affichées}})',
	'echo-mark-all-as-read' => 'Tout marquer comme lu',
	'echo-date-today' => 'Aujourd’hui',
	'echo-date-yesterday' => 'Hier',
	'echo-load-more-error' => "Un erreur s'est produite en analysant davantage de résultats.",
	'notification-edit-talk-page-bundle' => '$1 et $3 {{PLURAL:$4|autre|autres}} {{GENDER:$1|ont laissé}} un message sur votre [[User talk:$2|page de discussion]].',
	'notification-page-linked-bundle' => '$2 a été {{GENDER:$1|référencé}} depuis $3 et $4 {{PLURAL:$5|autre page|autres pages}}. [[Special:WhatLinksHere/$2|Voir tous les liens vers cette page]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 et $2 {{PLURAL:$3|autre|autres}} ont {{GENDER:$1|laissé}} un message sur votre page de discussion.',
	'notification-page-linked-email-batch-bundle-body' => '$2 a été {{GENDER:$1|lié}} depuis $3 et $4 autres {{PLURAL:$5|page|pages}}',
	'echo-email-batch-subject-daily' => "Vous avez {{PLURAL:$2|une nouvelle notification|de nouvelles notifications}} aujourd'hui sur {{SITENAME}}",
	'echo-email-batch-subject-weekly' => 'Vous avez {{PLURAL:$2|une nouvelle notification|de nouvelles notifications}} sur {{SITENAME}} cette semaine',
	'echo-email-batch-body-intro-daily' => 'Bonjour $1,
Voici pour vous un résumé de l’activité d’aujourd’hui sur {{SITENAME}}',
	'echo-email-batch-body-intro-weekly' => 'Bonjour $1,
Voici pour vous un résumé de l’activité de la semaine sur {{SITENAME}}',
	'echo-email-batch-link-text-view-all-notifications' => 'Voir toutes les notifications',
	'echo-rev-deleted-text-view' => 'Cette révision de page a été supprimée',
);

/** Franco-Provençal (arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'echo-desc' => 'Sistèmo de notificacions',
	'prefs-echo' => 'Notificacions',
	'prefs-displaynotifications' => 'Chouèx de visualisacion',
	'echo-no-agent' => '[Nion]',
	'echo-no-title' => '[Niona pâge]',
	'notifications' => 'Notificacions',
	'tooltip-pt-notifications' => 'Voutres notificacions',
	'echo-specialpage' => 'Mes notificacions', # Fuzzy
	'echo-none' => 'Vos éd reçu gins de notificacion.',
	'notification-new-user' => 'Benvegnua sur {{SITENAME}}, $1 !', # Fuzzy
	'echo-email-subject-default' => 'Novèla notificacion dessus {{SITENAME}}',
	'echo-email-body-default' => 'Vos avéd na novèla notificacion dessus {{SITENAME}} :

$1',
	'echo-email-footer-default' => '$2

Por controlar quints mèssâjos nos vos mandens, visitâd :
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1', # Fuzzy
	'echo-overlay-link' => 'Totes les notificacions',
	'echo-overlay-title' => 'Mes notificacions', # Fuzzy
	'echo-overlay-title-overflow' => 'Mes notificacions (montrent $1 sur $2 pas liesues)', # Fuzzy
	'echo-date-today' => 'Houé',
	'echo-date-yesterday' => 'Hièr',
	'echo-load-more-error' => 'Na fôta est arrevâye pendent la rècupèracion de més de rèsultats.',
	'echo-email-batch-subject-daily' => 'Vos avéd $1 notificacion{{PLURAL:$2||s}} houé', # Fuzzy
	'echo-email-batch-subject-weekly' => 'Vos avéd $1 notificacion{{PLURAL:$2||s}} ceta semana', # Fuzzy
);

/** Northern Frisian (Nordfriisk)
 * @author Murma174
 */
$messages['frr'] = array(
	'echo-desc' => 'Bööd-süsteem',
	'prefs-echo' => 'Bööd',
	'prefs-emailsettings' => 'E-mail iinstelangen',
	'prefs-displaynotifications' => "Mögelkhaiden för't uunwisin",
	'prefs-echosubscriptions' => 'Schüür mi diar en bööd am',
	'prefs-newmessageindicator' => 'Nei bööd uunwiiser',
	'echo-pref-send-me' => 'Schüür mi:',
	'echo-pref-send-to' => 'Schüür tu:',
	'echo-pref-email-format' => 'E-mail-formoot:',
	'echo-pref-web' => 'Wääb',
	'echo-pref-email' => 'E-mail',
	'echo-pref-email-frequency-never' => 'Schüür mi nian bööd',
	'echo-pref-email-frequency-immediately' => 'Enkelt bööd tu arke föörgung',
	'echo-pref-email-frequency-daily' => 'Iansis a dai en bööd',
	'echo-pref-email-frequency-weekly' => 'Iansis a weg en bööd',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Normool tekst',
	'echo-pref-notify-show-link' => 'Bööd uun min werktjüchlist uunwise',
	'echo-pref-new-message-indicator' => 'Nei bööd üüb min diskuschuunssidj uun min werktjüchlist uunwise',
	'echo-learn-more' => 'Ik wal muar wed',
	'echo-new-messages' => 'Dü heest nei bööd',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|bööd|bööden}} üüb min diskuschuunssidj',
	'echo-category-title-article-linked' => '$1 {{PLURAL:$1|ferwisang|ferwisangen}}',
	'echo-category-title-reverted' => '{{PLURAL:$1|turagsaatang|turagsaatangen}} bewerke',
	'echo-category-title-mention' => '{{PLURAL:$1|henwis|henwiser}}',
	'echo-category-title-other' => '{{PLURAL:$1|Öödern}}',
	'echo-category-title-system' => '{{PLURAL:$1|Süsteem}}',
	'echo-pref-tooltip-edit-user-talk' => 'Sai mi beskias, wan diar hoker en bööd of en oonswaar üüb min diskuschuunsidj skraft.',
	'echo-pref-tooltip-article-linked' => 'Sai mi beskias, wan diar hoker en ferwisang üüb en sidj saat, diar ik skrewen haa.',
	'echo-pref-tooltip-reverted' => 'Sai mi beskias, wan diar hoker en feranrang faan mi uun en artiikel turagsaat.',
	'echo-pref-tooltip-mention' => 'Sai mi beskias, wan diar hoker en ferwisang faan sin diskuschuunsidj üüb min brükersidj saat.',
	'echo-no-agent' => '[Näämen]',
	'echo-no-title' => '[Nian sidj]',
	'echo-error-no-formatter' => 'Tu detdiar bööd as nian formoot fäästlaanj wurden.',
	'echo-error-preference' => 'Feeler: Brükeriinstelangen küd ei seekert wurd.',
	'echo-error-token' => 'Feeler: Brüker-token küd ei ufrepen wurd.',
	'notifications' => 'Bööd',
	'tooltip-pt-notifications' => 'Din bööd',
	'echo-specialpage' => 'Bööd',
	'echo-anon' => 'Am bööd tu fun, skel dü en [$1 brükerkonto] iinracht of di [$2 uunmelde].',
	'echo-none' => 'Dü heest nian bööd.',
	'echo-more-info' => 'Muar diartu',
	'echo-feedback' => 'Ragmeldang',
	'notification-link-text-view-message' => 'Bööd/en uunwise',
	'notification-link-text-view-mention' => 'Henwis/er uunwise',
	'notification-link-text-view-changes' => 'Feranrang/en uunwise',
	'notification-link-text-view-page' => 'Sidj uunwise',
	'notification-link-text-view-edit' => 'Feranrang uunwise',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|hää}} en bööd üüb din [[User talk:$2#$3|brükersidj]] skrewen.',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|hää}} en bööd üüb din diskuschuunsidj skrewen auer "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|hää}} en bööd üüb din [[User talk:$2#$3|diskuschuunsidj]] skrewen.',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|hää}} en bööd üüb din diskuschuunsidj skrewen auer "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => 'Üüb [[:$2]] as faan [[:$3]] {{GENDER:$1|ferwiset}} wurden. [[Special:WhatLinksHere/$2|Aal a ferwisangen üüb detdiar sidj uunwise]].',
	'notification-page-linked-flyout' => 'Üüb $2 as faan [[:$3]] {{GENDER:$1|ferwiset}} wurden.',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|skrääw}} auer "[[$3|$2]]" üüb det "$4" diskuschuunsidj.',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|skrääw}} en nei kirew "$2" üüb [[$3]].',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|hää}} di en bööd schüürd: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|skrääw}} auer "[[$3#$2|$2]]" üüb din diskuschuunsidj.',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|näämd}} di üüb det $5 diskuschuunsidj auer "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 {{GENDER:$1|näämd}} di üüb det $5 diskuschuunsidj uun "[[$3#$2|$4]]".',
	'notification-mention-nosection' => '[[User:$1|$1]] {{GENDER:$1|näämd}} di üüb det [[$3|$2 diskuschuunsidj]].',
	'notification-mention-nosection-flyout' => '$1 {{GENDER:$1|näämd}} di üüb det [[$3|$2 diskuschuunsidj]].',
	'notification-user-rights' => 'Din brükerrochten [[Special:Log/rights/$1|san {{GENDER:$1|feranert}}]] wurden faan [[User:$1|$1]]. $2. [[Special:ListGroupRights|Muar diartu]]',
	'notification-user-rights-flyout' => 'Din brükerrochten san {{GENDER:$1|feranert}} wurden faan $1. $2. [[Special:ListGroupRights|Muar diartu]]',
	'notification-user-rights-add' => 'Dü beest nü lasmoot faan {{PLURAL:$2|detdiar brükerskööl|jodiar brükersköölen}}: $1',
	'notification-user-rights-remove' => 'Dü beest nian lasmoot muar faan {{PLURAL:$2|detdiar brükerskööl|jodiar brükersköölen}}: $1',
	'notification-new-user' => 'Welkimen tu {{SITENAME}}, $1! Wi san bliis, dat dü diar beest.',
	'notification-reverted2' => 'Din {{PLURAL:$4|feranrang üüb [[:$2]] as|feranrangen üüb [[:$2]] san}} {{GENDER:$1|turagsaat}} wurden faan [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => 'Din {{PLURAL:$4|feranrang üüb $2 as|feranrangen üüb $2 san}} {{GENDER:$1|turagsaat}} wurden faan $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|hää}} di en bööd schüürd üüb {{SITENAME}}.',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|hää}} en bööd üüb din diskuschuunsidj skrewen:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|hää}} en bööd üüb din diskuschuunsidj skrewen auer "$2".',
	'notification-page-linked-email-subject' => 'Üüb din sidj as faan {{SITENAME}} ferwiset wurden.',
	'notification-page-linked-email-batch-body' => 'Üüb $2 as faan $3 {{GENDER:$1|ferwiset}} wurden.',
	'notification-reverted-email-subject2' => 'Din {{PLURAL:$3|feranrang as|feranrangen san}} {{GENDER:$1|turagsaat}} wurden üüb {{SITENAME}}.',
	'notification-reverted-email-batch-body2' => 'Din {{PLURAL:$3|feranrang üüb $2 as|feranrangen üüb $2 san}} faan $1 {{GENDER:$1|turagsaat}} wurden.',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|näämd}} di üüb {{SITENAME}}.',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|näämd}} di üüb det $4 diskuschuunsidj uun "$3".',
	'notification-mention-nosection-email-batch-body' => '$1 {{GENDER:$1|näämd}} di üüb det $2 diskuschuunsidj.',
	'notification-user-rights-email-subject' => 'Din brükerrochten san feranert wurden üüb {{SITENAME}}.',
	'notification-user-rights-email-batch-body' => 'Din brükerrochten san {{GENDER:$1|feranert}} wurden faan $1. $2.',
	'echo-email-subject-default' => 'Nei bööd üüb {{SITENAME}}.',
	'echo-email-body-default' => 'Dü heest nei bööd üüb {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Dü heest nei bööd.',
	'echo-email-footer-default' => '$2

Am iintustelen, hük e-mails tu di schüürd wurd, brük din iinstelangs-sidj:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Am iintustelen, hük e-mails tu di schüürd wurd, <a href="$2" style="text-decoration:none; color: #3868B0;">brük din iinstelangs-sidj</a>.<br />
$1',
	'echo-overlay-link' => 'Aal din bööd',
	'echo-overlay-title' => '<b>Bööd</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Bööden}}</b> (Uunwiset wurd $1 faan $2, diar noch ei leesen wurden san)',
	'echo-mark-all-as-read' => 'Aaltumaal üs leesen kääntiakne',
	'echo-date-today' => 'Daalang',
	'echo-date-yesterday' => 'Jister',
	'echo-load-more-error' => "Bi't ufrepen as wat skiaf gingen.",
	'notification-edit-talk-page-bundle' => '$1 an $3 {{PLURAL:$4|brüker muar|muar brükern}} {{GENDER:$1|schüürd}} en bööd tu din [[User talk:$2|diskuschuunsidj]].',
	'notification-page-linked-bundle' => 'Üüb $2 as faan $3 an $4 {{PLURAL:$5|sidj muar|muar sidjen}} {{GENDER:$1|ferwiset}} wurden. [[Special:WhatLinksHere/$2|Aal a ferwisangen üüb detdiar sidj uunwise]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 an $2 {{PLURAL:$3|brüker muar|muar brükern}} {{GENDER:$1|haa}} en bööd tu din diskuschuunsidj schüürd.',
	'notification-page-linked-email-batch-bundle-body' => 'Üüb $2 as faan $3 an $4 {{PLURAL:$5|sidj muar|muar sidjen}} {{GENDER:$1|ferwiset}} wurden.',
	'echo-email-batch-subject-daily' => 'Dü heest {{PLURAL:$2|en nei bööd|nei bööden}} üüb {{SITENAME}}.',
	'echo-email-batch-subject-weekly' => 'Dü heest das weg {{PLURAL:$2|ian nei bööd|nei bööden}} üüb {{SITENAME}}.',
	'echo-email-batch-body-intro-daily' => 'Hoi $1,
diar as en auersicht för di auer feranrangen üüb {{SITENAME}} faan daalang.',
	'echo-email-batch-body-intro-weekly' => 'Hoi $1,
Diar as en auersicht för di auer a feranrangen üüb {{SITENAME}} faan das weg.',
	'echo-email-batch-link-text-view-all-notifications' => 'Aal min bööd uunwise',
	'echo-rev-deleted-text-view' => 'Detdiar sidjenwerjuun as ferbürgen wurden.',
);

/** Galician (galego)
 * @author Elisardojm
 * @author Toliño
 * @author Vivaelcelta
 */
$messages['gl'] = array(
	'echo-desc' => 'Sistema de notificacións',
	'prefs-echo' => 'Notificacións',
	'prefs-emailsettings' => 'Opcións de correo electrónico',
	'prefs-displaynotifications' => 'Opcións de visualización',
	'prefs-echosubscriptions' => 'Notificádeme sobre estes eventos',
	'prefs-newmessageindicator' => 'Indicador de mensaxe nova',
	'echo-pref-send-me' => 'Enviádeme:',
	'echo-pref-send-to' => 'Enviar a:',
	'echo-pref-email-format' => 'Formato do correo:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Correo electrónico',
	'echo-pref-email-frequency-never' => 'Non me enviedes ningunha notificación por correo electrónico',
	'echo-pref-email-frequency-immediately' => 'Notificacións individuais en canto cheguen',
	'echo-pref-email-frequency-daily' => 'Un resumo diario das notificacións',
	'echo-pref-email-frequency-weekly' => 'Un resumo semanal das notificacións',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Texto simple',
	'echo-pref-notify-show-link' => 'Mostrar as notificacións na miña barra de ferramentas',
	'echo-pref-new-message-indicator' => 'Mostrar o indicador de mensaxe na páxina de conversa na miña barra de ferramentas',
	'echo-learn-more' => 'Máis información',
	'echo-new-messages' => 'Ten mensaxes novas',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Mensaxe|Mensaxes}} na páxina de conversa',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Ligazón|Ligazóns}} a unha páxina',
	'echo-category-title-reverted' => '{{PLURAL:$1|Reversión|Reversións}} dunha edición',
	'echo-category-title-mention' => '{{PLURAL:$1|Mención|Mencións}}',
	'echo-category-title-other' => '{{PLURAL:$1|Outras}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistema}}',
	'echo-pref-tooltip-edit-user-talk' => 'Notificádeme cando alguén deixe unha mensaxe na miña páxina de conversa.',
	'echo-pref-tooltip-article-linked' => 'Notificádeme cando alguén ligue cunha páxina que creei desde un artigo.',
	'echo-pref-tooltip-reverted' => 'Notificádeme cando alguén reverta unha edición feita por min usando a ferramenta de reversión ou desfacer.',
	'echo-pref-tooltip-mention' => 'Notificádeme cando alguén ligue cara a miña páxina de usuario desde calquera páxina de conversa.',
	'echo-no-agent' => '[Ninguén]',
	'echo-no-title' => '[Ningunha páxina]',
	'echo-error-no-formatter' => 'Non se definiu formato ningún para a notificación',
	'echo-error-preference' => 'Erro: Non se puido establecer a preferencia de usuario',
	'echo-error-token' => 'Erro: Non se puido recuperar o pase de usuario',
	'notifications' => 'Notificacións',
	'tooltip-pt-notifications' => 'As súas notificacións',
	'echo-specialpage' => 'Notificacións',
	'echo-anon' => 'Para recibir notificacións, [$1 cree unha conta] ou [$2 acceda ao sistema].',
	'echo-none' => 'Non ten ningunha notificación.',
	'echo-more-info' => 'Máis información',
	'echo-feedback' => 'Comentarios',
	'notification-link-text-view-message' => 'Mostrar a mensaxe',
	'notification-link-text-view-mention' => 'Mostrar a mención',
	'notification-link-text-view-changes' => 'Mostrar os cambios',
	'notification-link-text-view-page' => 'Mostrar a páxina',
	'notification-link-text-view-edit' => 'Mostrar a edición',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|deixou}} unha mensaxe na súa [[User talk:$2#$3|páxina de conversa]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|deixou}} unha mensaxe na súa páxina de conversa na sección "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|deixou}} unha mensaxe na súa [[User talk:$2#$3|páxina de conversa]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|deixou}} unha mensaxe na súa páxina de conversa na sección "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => '"[[:$2]]" foi {{GENDER:$1|ligada}} desde "[[:$3]]". [[Special:WhatLinksHere/$2|Ollar todas as ligazóns cara a esta páxina]].',
	'notification-page-linked-flyout' => '"$2" foi {{GENDER:$1|ligada}} desde "[[:$3]]".',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|comentou}} en "[[$3|$2]]" na páxina de conversa "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|comezou}} o fío de conversa "$2" en "[[$3]]"',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|envioulle}} unha mensaxe: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|comentou}} en "[[$3#$2|$2]]" na súa páxina de conversa.',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|fíxolle}} unha mención na páxina de conversa de "$5" na sección "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 {{GENDER:$1|fíxolle}} unha mención na páxina de conversa de "$5" na sección "[[$3#$2|$4]]".',
	'notification-mention-nosection' => '[[User:$1|$1]] {{GENDER:$1|fíxolle}} unha mención na [[$3|páxina de conversa de "$2"]].',
	'notification-mention-nosection-flyout' => '$1 {{GENDER:$1|fíxolle}} unha mención na [[$3|páxina de conversa de "$2"]].',
	'notification-user-rights' => '[[User:$1|$1]] [[Special:Log/rights/$1|{{GENDER:$1|mudou}} os seus dereitos de usuario]]. $2. [[Special:ListGroupRights|Máis información]]',
	'notification-user-rights-flyout' => '$1 {{GENDER:$1|mudou}} os seus dereitos de usuario. $2. [[Special:ListGroupRights|Máis información]]',
	'notification-user-rights-add' => 'Agora pertence a {{PLURAL:$2|este grupo|estes grupos}}: $1',
	'notification-user-rights-remove' => 'Xa non pertence a {{PLURAL:$2|este grupo|estes grupos}}: $1',
	'notification-new-user' => 'Dámoslle a benvida a {{SITENAME}}, $1! Alegrámonos de que estea aquí.',
	'notification-reverted2' => '[[User:$1|$1]] {{GENDER:$1|reverteu}} {{PLURAL:$4|a súa edición|as súas edicións}} en "[[:$2]]" $3',
	'notification-reverted-flyout2' => '$1 {{GENDER:$1|reverteu}} {{PLURAL:$4|a súa edición|as súas edicións}} en "$2" $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|deixoulle}} unha mensaxe en {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|deixou}} unha mensaxe na súa páxina de conversa:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|deixou}} unha mensaxe na súa páxina de conversa na sección "$2"',
	'notification-page-linked-email-subject' => 'A súa páxina foi ligada en {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '"$2" foi {{GENDER:$1|ligada}} desde "$3"',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Reverteuse a súa edición|Revertéronse as súas edicións}} {{GENDER:$1|en}} {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '$1 {{GENDER:$1|reverteu}} {{PLURAL:$3|a súa edición|as súas edicións}} en "$2"',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|fíxolle}} unha mención en {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|fíxolle}} unha mención na páxina de conversa de $4 na sección "$3"',
	'notification-mention-nosection-email-batch-body' => '$1 {{GENDER:$1|fíxolle}} unha mención na páxina de conversa de "$2".',
	'notification-user-rights-email-subject' => 'Os seus dereitos de usuario cambiaron en {{SITENAME}}',
	'notification-user-rights-email-batch-body' => '$1 {{GENDER:$1|mudou}} os seus dereitos de usuario. $2',
	'echo-email-subject-default' => 'Nova notificación en {{SITENAME}}',
	'echo-email-body-default' => 'Ten unha nova notificación en {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Ten unha nova notificación',
	'echo-email-footer-default' => '$2

Para controlar os correos electrónicos que lle enviamos, comprobe as súas preferencias:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Para controlar os correos electrónicos que lle enviamos, <a href="$2" style="text-decoration:none; color: #3868B0;">comprobe as súas preferencias</a><br />
$1',
	'echo-overlay-link' => 'Todas as notificacións',
	'echo-overlay-title' => '<b>Notificacións</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Notificación|Notificacións}}</b> (mostrando $1 de $2 sen ler)',
	'echo-mark-all-as-read' => 'Marcar todo como lido',
	'echo-date-today' => 'Hoxe',
	'echo-date-yesterday' => 'Onte',
	'echo-load-more-error' => 'Houbo un erro ao procurar máis resultados.',
	'notification-edit-talk-page-bundle' => '$1 e {{PLURAL:$4|outra persoa|$3 persoas máis}} {{GENDER:$1|deixaron}} mensaxes na súa [[User talk:$2|páxina de conversa]].',
	'notification-page-linked-bundle' => '"$2" foi {{GENDER:$1|ligada}} desde "$3" e $4 {{PLURAL:$5|páxina|páxinas}} máis. [[Special:WhatLinksHere/$2|Ollar todas as ligazóns cara a esta páxina]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 e {{PLURAL:$3|outra persoa|$2 persoas máis}} {{GENDER:$1|deixaron}} mensaxes na súa páxina de conversa',
	'notification-page-linked-email-batch-bundle-body' => '"$2" foi {{GENDER:$1|ligada}} desde "$3" e {{PLURAL:$5|outra páxina|$4 páxinas máis}}',
	'echo-email-batch-subject-daily' => 'Ten {{PLURAL:$2|unha nova notificación|novas notificacións}} en {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Esta semana ten {{PLURAL:$2|unha nova notificación|novas notificacións}} en {{SITENAME}}',
	'echo-email-batch-body-intro-daily' => 'Boas, $1:
Velaquí ten un resumo da actividade de hoxe en {{SITENAME}}',
	'echo-email-batch-body-intro-weekly' => 'Boas, $1:
Velaquí ten un resumo da actividade da semana en {{SITENAME}}',
	'echo-email-batch-link-text-view-all-notifications' => 'Ollar todas as notificacións',
	'echo-rev-deleted-text-view' => 'Eliminouse a revisión da páxina',
);

/** Guarani (Avañe'ẽ)
 * @author P. S. F. Freitas
 */
$messages['gn'] = array(
	'echo-desc' => 'Maranduha reko',
	'prefs-echo' => 'Maranduha',
	'prefs-emailsettings' => 'E-mail jeporavo',
	'prefs-displaynotifications' => 'Jehecha jeporavo',
	'prefs-echosubscriptions' => 'Tomomarandu chéve kóva rehegua',
	'prefs-newmessageindicator' => "Momba'ukaha pyahu hechaukaha",
	'echo-pref-send-me' => "Chemombe'ukarãː",
	'echo-pref-send-to' => "Mombe'ukaː",
	'echo-pref-email-format' => 'E-mail rekoː',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-mail',
	'echo-pref-email-format-html' => 'HTML',
	'echo-no-agent' => '[Mavave]',
	'echo-no-title' => '[Ndaipóri Kuatirogue]',
	'notifications' => 'Maranduha',
	'tooltip-pt-notifications' => 'Nde maranduha',
	'echo-specialpage' => 'Maranduha',
	'echo-none' => 'Nderereko maranduha pyahu.',
	'echo-more-info' => 'Maranduve',
	'echo-feedback' => "Ñeimo'ã",
	'notification-link-text-view-message' => "Mombe'ukaha jehecha",
	'notification-link-text-view-changes' => 'Ñemoambue jehecha',
	'notification-link-text-view-page' => 'Kuatiarogue jehecha',
	'notification-link-text-view-edit' => 'Jehaijey jehecha',
	'notification-edit-talk-page2' => "[[User:$1|$1]] {{GENDER:$1|omoĩ}} mombe'ukaha pyahu nde [[User talk:$2#$3|myangekõi kuatiápe]].",
);

/** Gujarati (ગુજરાતી)
 * @author Dsvyas
 * @author KartikMistry
 * @author Rangilo Gujarati
 */
$messages['gu'] = array(
	'echo-desc' => 'સૂચના સિસ્ટમ',
	'prefs-echo' => 'સૂચનાઓ',
	'prefs-emailsettings' => 'ઈમેઇલ સંબંધી વિકલ્પો',
	'prefs-displaynotifications' => 'પ્રદર્શન વિકલ્પો',
	'prefs-echosubscriptions' => 'મને આ ઘટનાઓ વિશે જાણ કરવી',
	'prefs-newmessageindicator' => 'નવો સંદેશ સૂચક',
	'echo-pref-send-me' => 'મને મોકલો:',
	'echo-pref-send-to' => 'માટે મોકલો:',
	'echo-pref-email-format' => 'ઈમેઇલ માળખું:',
	'echo-pref-web' => 'વેબ',
	'echo-pref-email' => 'ઈમેઇલ',
	'echo-pref-email-frequency-never' => 'મને કોઈ ઈમેઇલ સૂચનાઓ ન મોકલવી',
	'echo-pref-email-frequency-immediately' => 'વ્યક્તિગત સૂચનાઓ મોકલવી',
	'echo-pref-email-frequency-daily' => 'સૂચનાઓનો દૈનિક સારાંશ',
	'echo-pref-email-frequency-weekly' => 'સૂચનાઓનો સાપ્તાહિક સારાંશ',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'સાદું લખાણ',
	'echo-pref-notify-show-link' => 'સૂચનાઓ મારી સાધનપટ્ટીમાં દેખાડવી',
	'echo-pref-new-message-indicator' => 'ચર્ચા પાનાઓની સૂચનાઓ મારી સાધનપટ્ટીમાં દેખાડવી',
	'echo-learn-more' => 'વધુ જાણો',
	'echo-new-messages' => 'તમારા માટે નવા સંદેશાઓ છે',
	'echo-category-title-edit-user-talk' => 'ચર્ચા પાનું {{PLURAL:$1|સંદેશ|સંદેશાઓ}}',
	'echo-category-title-article-linked' => 'પાનું {{PLURAL:$1|કડી|કડીઓ}}',
	'echo-category-title-reverted' => '{{PLURAL:$1|ઉલટાવેલ|ઉલટાવેલા}} ફેરફાર કરો',
	'echo-category-title-mention' => '{{PLURAL:$1|ઉલ્લેખ|ઉલ્લેખો}}',
	'echo-category-title-other' => '{{PLURAL:$1|અન્ય}}',
	'echo-category-title-system' => '{{PLURAL:$1|સિસ્ટમ}}',
	'echo-pref-tooltip-edit-user-talk' => 'નવાં સંદેશા કે ચર્ચા પાનાનાં ફેરફાર પર મને સૂચન કરવું.',
	'echo-pref-tooltip-article-linked' => 'જ્યારે કોઇ મારા દ્વારા બનાવવામાં આવેલ લેખને કોઈ જગ્યાએ જોડવામાં આવે ત્યારે મને જાણ કરવી.',
	'echo-pref-tooltip-reverted' => 'જ્યારે કોઈ મારું સમ્પાદન રદ કરે કે કોઈ રોલબેક ઉપકરણ ઉપકરણ વાપરે ત્યારે મને જાણ કરવી.',
	'echo-pref-tooltip-mention' => 'મારા સભ્ય પાનાને જ્યારે કોઈ ચર્ચા પાના પર જોડે ત્યારે મને જાણ કરવી.',
	'echo-no-agent' => '[કોઈ નહી]',
	'echo-no-title' => '[કોઈ પાનું નહી]',
	'echo-error-no-formatter' => 'સૂચનાઓ માટે કોઈ માળખુ નીયત નથી કર્યું.',
	'echo-error-preference' => 'ભૂલ: સભ્ય પસંદગી સાચવી ન શક્યા.',
	'echo-error-token' => 'ભૂલ: સભ્ય ટોકન શોધાયુ નહી.',
	'notifications' => 'સૂચનાઓ',
	'tooltip-pt-notifications' => 'તમારી સૂચનાઓ',
	'echo-specialpage' => 'સૂચનાઓ',
	'echo-anon' => 'સૂચનાઓ પ્રાપ્ત કરવા, [$1 નવું ખાતું ખોલો] અથવા [$2 પ્રવેશ કરો]',
	'echo-none' => 'તમારા માટે કોઈ સૂચનાઓ નથી.',
	'echo-more-info' => 'વધારે જાણકારી',
	'echo-feedback' => 'અભિપ્રાય',
	'notification-link-text-view-message' => 'મેસેજ જુઓ',
	'notification-link-text-view-mention' => 'ઉલ્લેખ જુઓ',
	'notification-link-text-view-changes' => 'ફેરફારો જુઓ',
	'notification-link-text-view-page' => 'પાનું જુઓ',
	'notification-link-text-view-edit' => 'ફેરફાર જુઓ',
	'notification-edit-talk-page2' => '[[User:$1|$1]]એ તમારાં [[User talk:$2#$3|ચર્ચા પાનાં]] પર સંદેશો {{GENDER:$1|છોડ્યો}} છે.',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]]એ તમારા ચર્ચા પાનાંમાં "[[User talk:$2#$3|$4]]" પર સંદેશો {{GENDER:$1|છોડ્યો}} છે.',
	'notification-edit-talk-page-flyout2' => '$1એ તમારા [[User talk:$2#$3|ચર્ચા પાનાં]] પર સંદેશો {{GENDER:$1|છોડયો}} છે.',
	'notification-edit-talk-page-flyout-with-section' => '$1એ તમારા "[[User talk:$2#$3|$4]]" ચર્ચા પાનાં પર સંદેશો {{GENDER:$1|છોડયો}} છે.',
	'notification-page-linked' => '{{GENDER:$1|linked}} દ્વારા [[:$2]], [[:$3]] પર જોડવામાં આવેલું. [[Special:WhatLinksHere/$2|આ પાનાંને સમ્બોધતી બધી કડીઓ જુઓ]].',
	'notification-page-linked-flyout' => '$2ને [[:$3]] સાથે {{GENDER:$1|જોડ્યું છે}}.',
	'notification-add-comment2' => '[[User:$1|$1]]એ "$4"નાં "[[$3|$2]]" પર {{GENDER:$1|સંદેશો છોડ્યો}}.',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]]એ [[$3]] પર નવો વિશય "$2" {{GENDER:$1|ચાલૂ કર્યો}}.',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]]એ તમને નવો સંદેશો {{GENDER:$1|મોકલ્યો}}: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]]એ "[[$3#$2|$2]]" પર {{GENDER:$1|ટીપ્પણી કરી}}.',
	'notification-mention' => '[[User:$1|$1]]એ $5નાં ચર્ચાનાં પાને "[[$3#$2|$4]]"માં તમારો {{GENDER:$1|ઉલ્લેખ કર્યો છે}}.',
	'notification-mention-flyout' => '$1એ $5નાં ચર્ચાનાં પાને "[[$3#$2|$4]]"માં તમારો {{GENDER:$1|ઉલ્લેખ કર્યો છે}}.',
	'notification-user-rights-flyout' => 'તમારા સભ્ય હક્કો $1એ {{GENDER:$1|બદલ્યા}} છે. $2.
[[Special:ListGroupRights|વધુ જાણો]]',
	'notification-user-rights-add' => 'તમે હવે {{PLURAL:$2|આ જુથ|આ જુથો}}ના સભ્ય છો: $1',
	'notification-user-rights-remove' => 'હવે તમે {{PLURAL:$2|આ જુથ|આ જુથો}}ના સભ્ય રહ્યા નથી: $1',
	'notification-new-user' => '$1! તમારું {{SITENAME}} પર સ્વાગત છે. અમે તમરા જોડાણથી ખુશ છે.',
	'notification-reverted2' => '{{PLURAL:$4|[[:$2]] પરનો તમારો ફેરફાર|[[:$2]] પરના તમારા ફેરફારો}} [[User:$1|$1]]એ {{GENDER:$1|{{PLURAL|પાછો વાળ્યો|પાછા વાળ્યા}} છે}}. $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|$2 પરનો તમારો ફેરફાર|$2 પરના તમારા ફેરફારો}} $1એ {{GENDER:$1|{{PLURAL|પાછો વાળ્યો|પાછા વાળ્યા}} છે}}. $3',
	'notification-edit-talk-page-email-subject2' => '{{SITENAME}} પર તમારા માટે $1એ {{GENDER:$1|સંદેશો}} મૂક્યો છે.',
	'notification-edit-talk-page-email-batch-body2' => '$1એ તમારા ચર્ચાનાં પાને {{GENDER:$1|સંદેશો}} મૂક્યો છે:',
	'notification-edit-talk-page-email-batch-body-with-section' => "$1એ તમારા ચર્ચાનાં પાને ''$2'' હેઠળ તમારા માટે {{GENDER:$1|સંદેશો}} મૂક્યો છે.",
	'notification-page-linked-email-subject' => 'તમારુ પાનાની કડી {{SITENAME}} પર જોડવામાં આવી',
	'notification-page-linked-email-batch-body' => '$2ને $3 સાથે {{GENDER:$1|જોડ્યું}} હતું,',
	'notification-reverted-email-subject2' => '{{SITENAME}} પર {{PLURAL:$3|તમારો ફેરફાર|તમારા ફેરફારો}} {{GENDER:$1|{{PLURAL|પાછો વાળ્યો|પાછા વાળ્યા}} છે}}.',
	'notification-mention-email-subject' => '$1એ {{SITENAME}} પર તમારો {{GENDER:$1|ઉલ્લેખ}} કર્યો છે.',
	'notification-user-rights-email-subject' => 'તમારાં {{SITENAME}} પરનાં અધિકારો બદલાયા છે.',
	'notification-user-rights-email-batch-body' => 'તમારા સભ્ય અધિકારો {{GENDER:$1|દ્વારા}} બદલાવવમાં આવ્યા છે. $2',
	'echo-email-subject-default' => '{{SITENAME}} પર નવી સૂચના',
	'echo-email-body-default' => 'તમારા માટે {{SITENAME}} પર નવી સૂચના છે:

$1',
	'echo-email-batch-body-default' => 'તમને નવો સંદેશ આવેલો છે',
	'echo-overlay-link' => 'બધી સૂચનાઓ',
	'echo-overlay-title' => '<b>સૂચનાઓ</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|સુચનાઓ}}</b> ($2 પૈકીની નહિવાંચેલી $1 દર્શાવી છે)',
	'echo-mark-all-as-read' => 'બધીને વાંચેલી તરીકે અંકિત કરો',
	'echo-date-today' => 'આજે',
	'echo-date-yesterday' => 'ગઈ કાલે',
	'echo-load-more-error' => 'વધુ પરિણામો લાવતી વખતે એક ભૂલ આવી.',
	'echo-email-batch-subject-daily' => 'તમારા માટે {{SITENAME}} પર {{PLURAL:$2|નવી સૂચના|નવી સૂચનાઓ}} છે.',
	'echo-email-batch-subject-weekly' => 'આ અઠવાડીએ {{SITENAME}} પર તમારા માટે {{PLURAL:$2|નવી સુચના|નવી સુચનાઓ}} છે',
	'echo-email-batch-body-intro-daily' => 'નમસ્કાર $1,
{{SITENAME}} પર તમારી ક્રિયાઓનો આજનો સારાંશ આ પ્રમાણે છે.',
	'echo-email-batch-body-intro-weekly' => 'નમસ્કાર $1,
{{SITENAME}} પર તમારી ક્રિયાઓનો સાપ્તાહિક સારાંશ આ પ્રમાણે છે.',
	'echo-email-batch-link-text-view-all-notifications' => 'બધાં સંદેશાઓ જુઓ',
	'echo-rev-deleted-text-view' => 'આ સૂધાર્ણા દબાવી દેવામાં આવી છે.',
);

/** Hebrew (עברית)
 * @author Amire80
 * @author Guycn1
 * @author Guycn2
 * @author Inkbug
 * @author Orsa
 * @author Ypnypn
 * @author דולב
 * @author חיים
 * @author ערן
 */
$messages['he'] = array(
	'echo-desc' => 'מערכת הודעות',
	'prefs-echo' => 'הודעות',
	'prefs-emailsettings' => 'אפשרויות דוא"ל',
	'prefs-displaynotifications' => 'אפשרויות תצוגה',
	'prefs-echosubscriptions' => 'להודיע לי על האירועים הבאים',
	'prefs-newmessageindicator' => 'סמן הודעות חדשות',
	'echo-pref-send-me' => 'מה לשלוח לי:',
	'echo-pref-send-to' => 'לשלוח אל:',
	'echo-pref-email-format' => 'תסדיר דוא"ל:',
	'echo-pref-web' => 'באתר',
	'echo-pref-email' => 'בדוא"ל',
	'echo-pref-email-frequency-never' => 'לא לשלוח לי שום הודעות בדואר אלקטרוני',
	'echo-pref-email-frequency-immediately' => 'הודעות בודדות כשהן מגיעות',
	'echo-pref-email-frequency-daily' => 'סיכום יומי של הודעות',
	'echo-pref-email-frequency-weekly' => 'סיכום שבועי של הודעות',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'טקסט רגיל',
	'echo-pref-notify-show-link' => 'להציג הודעות בסרגל שלי',
	'echo-pref-new-message-indicator' => 'הצגת סמן הודעות דף שיחה בסרגל הכלים שלי',
	'echo-learn-more' => 'מידע נוסף',
	'echo-new-messages' => 'יש לך הודעות חדשות',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|הודעה|הודעות}} בדף שיחה',
	'echo-category-title-article-linked' => '{{PLURAL:$1|קישור לדף|קישורים לדפים}}',
	'echo-category-title-reverted' => '{{PLURAL:$1|שחזור עריכה|שחזורי עריכות}}',
	'echo-category-title-mention' => '{{PLURAL:$1|אזכור|אזכורים}}',
	'echo-category-title-other' => '{{PLURAL:$1|אחר}}',
	'echo-category-title-system' => '{{PLURAL:$1|מערכת}}',
	'echo-pref-tooltip-edit-user-talk' => 'להודיע לי כשמישהו כותב בדף השיחה שלי.',
	'echo-pref-tooltip-article-linked' => 'להודיע לי כשמישהו מקשר לדף שיצרתי מדף אחר.',
	'echo-pref-tooltip-reverted' => 'להודיע לי כשמישהו משחזר עריכה שעשיתי, באמצעות כלי הביטול או השחזור.',
	'echo-pref-tooltip-mention' => 'להודיע לי כשמישהו מקשר לדף המשתמש שלי מכל דף שיחה.',
	'echo-no-agent' => '[אף אחד]',
	'echo-no-title' => '[ללא דף]',
	'echo-error-no-formatter' => 'לא הוגדר עיצוב להודעות.',
	'echo-error-preference' => 'שגיאה: לא ניתן להגדיר העדפת משתמש.',
	'echo-error-token' => 'שגיאה: לא ניתן לאחזר אסימון משתמש',
	'notifications' => 'הודעות',
	'tooltip-pt-notifications' => 'ההודעות שלך',
	'echo-specialpage' => 'הודעות',
	'echo-anon' => 'כדי לקבל הודעות, [$1 יש ליצור חשבון] או [$2 להיכנס].',
	'echo-none' => 'אין לך הודעות.',
	'echo-more-info' => 'מידע נוסף',
	'echo-feedback' => 'משוב',
	'notification-link-text-view-message' => 'הצגת הודעה',
	'notification-link-text-view-mention' => 'הצגת אזכור',
	'notification-link-text-view-changes' => 'הצגת שינויים',
	'notification-link-text-view-page' => 'הצגת דף',
	'notification-link-text-view-edit' => 'הצגת עריכה',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|כתב|כתבה}} ב[[User talk:$2#$3|דף השיחה]] שלך.',
	'notification-edit-talk-page-with-section' => "[[User:$1|$1]] {{GENDER:$1|כתב|כתבה}} כתבה בדף השיחה שלך הודעה תחת הכותרת '[[User talk:$2#$3|$4]]'.",
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|כתב|כתבה}} ב[[User talk:$2#$3|דף השיחה שלך]].',
	'notification-edit-talk-page-flyout-with-section' => "$1 {{GENDER:$1|כתב|כתבה}} בדף השיחה שלך הודעה תחת הכותרת '[[User talk:$2#$3|$4]]'.",
	'notification-page-linked' => '{{GENDER:$1|נוסף קישור}} אל הדף [[:$2]] מהדף [[:$3]]. [[Special:WhatLinksHere/$2|כל הקישורים אל הדף הזה]].',
	'notification-page-linked-flyout' => '{{GENDER:$1|נוסף קישור}} אל הדף $2 מהדף [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|העיר|העירה}} על הנושא "[[$3|$2]]" בדף השיחה של "$4".',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|והוסיף|הוסיפה}} את נושא החדש "$2" לדף [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|שלח|שלחה}} לך הודעה: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|העיר|העירה}} על הנושא "[[$3#$2|$2]]" בדף השיחה שלך',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|הזכיר|הזכירה}} אותך בפסקה "[[$3#$2|$4]]" בדף השיחה של $5.',
	'notification-mention-flyout' => '$1 {{GENDER:$1|הזכיר|הזכירה}} אותך בפסקה "[[$3#$2|$4]]" בדף השיחה של $5.',
	'notification-mention-nosection' => '[[User:$1|$1]] {{GENDER:$1|הזכיר|הזכירה}} אותך ב[[$3|דף השיחה $2]].',
	'notification-mention-nosection-flyout' => '$1 {{GENDER:$1|הזכיר|הזכירה}} אותך ב[[$3|דף השיחה $2]].',
	'notification-user-rights' => '[[User:$1|$1]] [[Special:Log/rights/$1|{{GENDER:$1|שינה|שינתה}}]] את ההרשאות שלך. $2. [[Special:ListGroupRights|מידע נוסף]]',
	'notification-user-rights-flyout' => '$1 {{GENDER:$1|שינה|שינתה}} את ההרשאות שלך. $2. [[Special:ListGroupRights|מידע נוסף]]',
	'notification-user-rights-add' => 'צורפת {{PLURAL:$2|לקבוצה הבאה|לקבוצות הבאות}}: $1',
	'notification-user-rights-remove' => 'נמחקת {{PLURAL:$2|מהקבוצה הבאה|מהקבוצות הבאות}}: $1',
	'notification-new-user' => 'ברוך בואך ל{{GRAMMAR:תחילית|{{SITENAME}}}}&rlm;, $1! אנחנו שמחים לראות אותך כאן.',
	'notification-reverted2' => '[[User:$1|$1]] {{GENDER:$1|שחזר|שחזרה}} {{PLURAL:$4|עריכה שלך|עריכות שלך}} בדף [[:$2]] $3',
	'notification-reverted-flyout2' => '$1 {{GENDER:$1|שחזר|שחזרה}} {{PLURAL:$4|עריכה שלך|עריכות שלך}} בדף $2 $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|כתב|כתבה}} לך הודעה חדשה באתר {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|כתב|כתבה}} הודעה בדף השיחה שלך:',
	'notification-edit-talk-page-email-batch-body-with-section' => "$1 {{GENDER:$1|כתב|כתבה}} בדף השיחה שלך הודעה תחת הכותרת '$2'.",
	'notification-page-linked-email-subject' => 'מישהו קישר אל הדף שלך באתר {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '{{GENDER:$1|מישהו קישר|מישהי קישרה}} מהדף $3 אל הדף $2',
	'notification-reverted-email-subject2' => '$1 {{GENDER:$1|שחזר|שחזרה}} {{PLURAL:$3|עריכה שלך|עריכות שלך}} באתר {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '$1 {{GENDER:$1|שחזר|שחזרה}} {{PLURAL:$3|עריכה שלך|עריכות שלך}} בדף $2',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|הזכיר|הזכירה}} אותך באתר {{SITENAME}}',
	'notification-mention-email-batch-body' => "$1 {{GENDER:$1|הזכיר|הזכירה}} אותך בדיון בדף השיחה של $4 בפסקה '$3'.",
	'notification-mention-nosection-email-batch-body' => '$1 {{GENDER:$1|הזכיר|הזכירה}} אותך בדף השיחה $2.',
	'notification-user-rights-email-subject' => 'ההרשאות שלך באתר {{SITENAME}} שונו',
	'notification-user-rights-email-batch-body' => '$1 {{GENDER:$1|שינה|שינתה}} את ההרשאות שלך. $2',
	'echo-notification-count' => 'יותר מ־$1',
	'echo-email-subject-default' => 'הודעה חדשה באתר {{SITENAME}}',
	'echo-email-body-default' => 'יש לך הודעה חדשה באתר {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'יש לך הודעה חדשה.',
	'echo-email-footer-default' => '$2

כדי לבחור אילו מכתבים נשלח לך, אפשר לשנות את ההעדפות שלך:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'כדי לשלוט בסוגי המכתבים שאנחנו שולחים לך <a href="$2" style="text-decoration:none; color: #3868B0;">נא להתאים את ההעדפות שלך</a><br />
$1',
	'echo-overlay-link' => 'כל ההודעות',
	'echo-overlay-title' => '<b>הודעות</b>',
	'echo-overlay-title-overflow' => '<b>הודעות</b> ({{PLURAL:$1|מוצגת אחת|מוצגות $1}} {{PLURAL:$2|שלא נקראה|מתוך $2 שלא נקראו}})',
	'echo-mark-all-as-read' => 'לסמן שהכול נקרא',
	'echo-date-today' => 'היום',
	'echo-date-yesterday' => 'אתמול',
	'echo-load-more-error' => 'אירעה שגיאה בעת אחזור תוצאות נוספות.',
	'notification-edit-talk-page-bundle' => '$1 ועוד {{PLURAL:$4|אדם אחד|$3 אנשים}} כתבו הודעות ב[[User talk:$2|דף השיחה]] שלך.',
	'notification-page-linked-bundle' => 'אל הדף $2 {{GENDER:$1|נוסף קישור}} מהדף $3 ומעוד {{PLURAL:$5|דף|$4 דפים אחרים}}. [[Special:WhatLinksHere/$2|כל הקישורים אל הדף הזה]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 ועוד {{PLURAL:$3|אדם אחד|$2 אנשים}} כתבו הודעות בדף השיחה שלך.',
	'notification-page-linked-email-batch-bundle-body' => 'אל הדף $2 {{GENDER:$1|נוסף קישור}} מהדף $3 ומעוד {{PLURAL:$5|דף|$4 דפים אחרים}}.',
	'echo-email-batch-subject-daily' => 'קיבלת {{PLURAL:$2|הודעה חדשה|הודעות חדשות}} באתר {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'קיבלת {{PLURAL:$2|הודעה חדשה|הודעות חדשות}} השבוע באתר {{SITENAME}}',
	'echo-email-batch-body-intro-daily' => 'שלום $1,
להלן תקציר של פעילויות שקשורות אליך באתר {{SITENAME}} היום.',
	'echo-email-batch-body-intro-weekly' => 'שלום $1,
להלן תקציר של פעילויות שקשורות אליך באתר {{SITENAME}} השבוע.',
	'echo-email-batch-link-text-view-all-notifications' => 'הצגת כל ההודעות',
	'echo-rev-deleted-text-view' => 'הגרסה הזאת של הדף הוסתרה.',
);

/** Hindi (हिन्दी)
 * @author Akash.bhargude
 * @author Ansumang
 * @author Bill william compton
 * @author Hindustanilanguage
 * @author Shubhamkanodia
 * @author Siddhartha Ghai
 */
$messages['hi'] = array(
	'echo-desc' => 'अधिसूचना प्रणाली',
	'prefs-echo' => 'अधिसूचनाएँ',
	'prefs-emailsettings' => 'ईमेल विकल्प',
	'prefs-displaynotifications' => 'प्रदर्शन विकल्प',
	'prefs-echosubscriptions' => 'मुझे इन घटनाओं के बारे में सूचित करें',
	'prefs-newmessageindicator' => 'नए संदेश का संकेतक',
	'echo-pref-send-me' => 'मुझे भेजिए:',
	'echo-pref-send-to' => 'यहाँ भेजिए:',
	'echo-pref-email-format' => 'ईमेल प्रारूप:',
	'echo-pref-web' => 'वेब',
	'echo-pref-email' => 'ईमेल',
	'echo-pref-email-frequency-never' => 'मुझे कोई भी ईमेल अधिसूचना मत भेजें',
	'echo-pref-email-frequency-immediately' => 'अधिसूचनाएँ एक-एक कर के, जैसे-जैसे वे प्राप्त होती हैं',
	'echo-pref-email-frequency-daily' => 'अधिसूचनाओं का दैनिक सारांश',
	'echo-pref-email-frequency-weekly' => 'अधिसूचनाओं का साप्ताहिक सारांश',
	'echo-pref-email-format-html' => 'एच॰टी॰एम॰एल॰',
	'echo-pref-email-format-plain-text' => 'सादा पाठ',
	'echo-pref-notify-show-link' => 'अधिसूचनाओं को मेरी उपकरण-पट्टी में दिखाएँ',
	'echo-pref-new-message-indicator' => 'वार्ता पृष्ठ संदेश संकेतक मेरी उपकरण पट्टी में दिखाएँ',
	'echo-learn-more' => 'अधिक जानिए',
	'echo-new-messages' => 'आपके लिए नए संदेश हैं।', # Fuzzy
	'echo-category-title-edit-user-talk' => 'वार्ता पृष्ठ {{PLURAL:$1| सन्देश}}',
	'echo-category-title-article-linked' => 'पृष्ठ  {{PLURAL:$1| कड़ी | कड़ियाँ}}',
	'echo-category-title-reverted' => 'सम्पादन {{PLURAL:$1|पूर्ववत किये जाने की}}',
	'echo-category-title-mention' => '{{PLURAL:$1|उल्लेख}}',
	'echo-category-title-other' => '{{PLURAL:$1|अन्य}}',
	'echo-category-title-system' => '{{PLURAL:$1|प्रणाली}}',
	'echo-pref-tooltip-edit-user-talk' => 'जब कोई मुझे संदेश भेजे या मेरे वार्ता पृष्ठ पर उत्तर दे तो मुझे सूचित करें।',
	'echo-pref-tooltip-article-linked' => 'जब कोई मेरे द्वारा बनाए गए लेख की कड़ी कहीं जोड़े तो मुझे सूचित करें।',
	'echo-pref-tooltip-reverted' => 'जब कोई मेरे किसी सम्पादन को पूर्ववत करे या वापस ले तो मुझे सूचित करें।',
	'echo-pref-tooltip-mention' => 'जब कोई मेरे सदस्य पृष्ठ की कड़ी का किसी वार्ता पृष्ठ पर प्रयोग करे तो मुझे सूचित करें।',
	'echo-no-agent' => '[कोई नहीं]',
	'echo-no-title' => '[कोई पृष्ठ नहीं]',
	'echo-error-no-formatter' => 'अधिसूचना के लिए कोई स्वरूपण परिभाषित नहीं है।',
	'echo-error-preference' => 'त्रुटि: सदस्य पसंद निर्धारित नहीं की जा सकी।',
	'echo-error-token' => 'त्रुटि: सदस्य टोकन प्राप्त नहीं किया जा सका।',
	'notifications' => 'अधिसूचनाएँ',
	'tooltip-pt-notifications' => 'आपकी अधिसूचनाएँ',
	'echo-specialpage' => 'अधिसूचनाएँ',
	'echo-anon' => 'अधिसूचनाएँ पाने के लिये, [$1 खाता बनाएँ] या [$2 लॉग इन करें]।',
	'echo-none' => 'आपके लिये कोई अधिसूचना नहीं है।',
	'echo-more-info' => 'अधिक जानकारी',
	'echo-feedback' => 'आपके सुझाव',
	'notification-link-text-view-message' => 'संदेश देखें',
	'notification-link-text-view-mention' => 'उल्लेख देखें',
	'notification-link-text-view-changes' => 'बदलाव देखें',
	'notification-link-text-view-page' => 'पृष्ठ देखें',
	'notification-link-text-view-edit' => 'सम्पादन देखें',
	'notification-edit-talk-page2' => '[[User:$1|$1]] ने आपके [[User talk:$2#$3|वार्ता पृष्ठ]] पर एक नया सन्देश {{GENDER:$1|छोड़ा}} है।',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] ने आपके वार्ता पृष्ठ पर "[[User talk:$2#$3|$4]]" भाग में एक नया सन्देश {{GENDER:$1|छोड़ा}} है।',
	'notification-edit-talk-page-flyout2' => '$1 ने आपके [[User talk:$2#$3|वार्ता पृष्ठ]] पर एक सन्देश {{GENDER:$1|छोड़ा}} है।',
	'notification-edit-talk-page-flyout-with-section' => '$1 ने आपके वार्ता पृष्ठ पर "[[User talk:$2#$3|$4]]" भाग में एक सन्देश {{GENDER:$1|छोड़ा}} है।',
	'notification-page-linked' => '[[:$3]] पर [[:$2]] की कड़ी {{GENDER:$1|जोड़ी}} गयी थी। [[Special:WhatLinksHere/$2|इस पृष्ठ से जुड़ने वाले सभी पृष्ठ देखें]]।',
	'notification-page-linked-flyout' => '[[:$3]] पर $2 की कड़ी {{GENDER:$1|जोड़ी}} गयी।',
	'notification-add-comment2' => '[[User:$1|$1]] ने "$4" वार्ता पृष्ठ पर "[[$3|$2]]" भाग में {{GENDER:$1|टिप्पणी की है}}।',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] ने [[$3]] पर "$2" विषय पर चर्चा शुरू {{GENDER:$1|की}} है।',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] ने आपको एक नया सन्देश {{GENDER:$1|भेजा}} है: "[[$3#$2|$2]]"।',
	'notification-add-comment-yours2' => '[[User:$1|$1]] ने आपके वार्ता पृष्ठ पर "[[$3#$2|$2]]" भाग में टिप्पणी की है।',
	'notification-mention' => '[[User:$1|$1]] ने $5 के वार्ता पृष्ठ पर "[[$3#$2|$4]]" भाग में आपका उल्लेख {{GENDER:$1|किया}} है।',
	'notification-mention-flyout' => '$1 ने $5 के वार्ता पृष्ठ पर "[[$3#$2|$4]]" भाग में आपका उल्लेख {{GENDER:$1|किया}} है।',
	'notification-user-rights' => 'आपके सदस्य अधिकार [[User:$1|$1]] द्वारा [[Special:Log/rights/$1|{{GENDER:$1|बदले गये}}]]। $2। [[Special:ListGroupRights|अधिक जानिये]]',
	'notification-user-rights-flyout' => 'आपके सदस्य अधिकार $1 द्वारा {{GENDER:$1|बदले गये}}। $2। [[Special:ListGroupRights|अधिक जानिये]]',
	'notification-user-rights-add' => 'आप अब {{PLURAL:$2|इस समूह|इन समूहों}} के सदस्य हैं: $1',
	'notification-user-rights-remove' => 'आप अब {{PLURAL:$2|इस समूह|इन समूहों}} के सदस्य नहीं रहे: $1',
	'notification-new-user' => 'आपका {{SITENAME}} पर स्वागत है, $1! हमे ख़ुशी है आप यहाँ आये।',
	'notification-reverted2' => '[[:$2]] पर आपके {{PLURAL:$4|सम्पादन|सम्पादनों}} को [[User:$1|$1]] द्वारा {{GENDER:$1|पूर्ववत}} कर दिया गया है। $3',
	'notification-reverted-flyout2' => '$2 पर आपके {{PLURAL:$4|सम्पादन|सम्पादनों}} को $1 द्वारा {{GENDER:$1|पूर्ववत}} कर दिया गया है। $3',
	'notification-edit-talk-page-email-subject2' => '$1 ने आपके लिए {{SITENAME}} पर संदेश {{GENDER:$1|छोड़ा है}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 ने आपके वार्ता पृष्ठ पर संदेश {{GENDER:$1|छोड़ा है}}:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 ने आपके वार्ता पृष्ठ पर "$2" भाग में संदेश {{GENDER:$1|छोड़ा है}}।',
	'notification-page-linked-email-subject' => 'आपका पृष्ठ {{SITENAME}} पर लिंक किया गया',
	'notification-page-linked-email-batch-body' => '$2 {{GENDER:$1|लिंक किया गया}} $3 से।',
	'notification-reverted-email-subject2' => '{{SITENAME}} पर आपके {{PLURAL:$3|सम्पादन|सम्पादनों}} को {{GENDER:$1|पूर्ववत}} किया गया।',
	'notification-reverted-email-batch-body2' => '$2 पर आपके {{PLURAL:$3|सम्पादन|सम्पादनों}} को $1 द्वारा {{GENDER:$1|पूर्ववत}} किया गया।',
	'notification-mention-email-subject' => '$1 ने {{SITENAME}} पर आपका {{GENDER:$1|उल्लेख}} किया',
	'notification-mention-email-batch-body' => '$1 ने $4 के वार्ता पृष्ठ पर "$3" भाग में आपका {{GENDER:$1|उल्लेख}} किया।',
	'notification-user-rights-email-subject' => '{{SITENAME}} पर आपके सदस्य अधिकार बदले गए हैं',
	'notification-user-rights-email-batch-body' => 'आपके सदस्य अधिकार $1 द्वारा {{GENDER:$1|बदले गए}} हैं। $2।',
	'echo-email-subject-default' => '{{SITENAME}} पर नई अधिसूचना',
	'echo-email-body-default' => 'आपके लिए {{SITENAME}} पर नई अधिसूचना है:

$1',
	'echo-email-batch-body-default' => 'आपके लिए नई अधिसूचना है।',
	'echo-email-footer-default' => '$2

हमारी ओर से भेजे जाने वाले ईमेलों पर नियंत्रण करने के लिये कृपया अपनी पसन्द देखिए:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'हमारी ओर से भेजे जाने वाले ईमेलों पर नियंत्रण करने के लिये <a href="$2" style="text-decoration:none; color: #3868B0;">अपनी पसन्द देखिए</a>।<br />

$1',
	'echo-overlay-link' => 'सभी अधिसूचनाएँ',
	'echo-overlay-title' => '<b>अधिसूचनाएँ</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|अधिसूचनाएँ}}</b>($2 अपठित में से $1 दिखाई जा रही हैं)',
	'echo-mark-all-as-read' => 'सभी पढ़ी गयी चिन्हित करें',
	'echo-date-today' => 'आज',
	'echo-date-yesterday' => 'कल',
	'echo-load-more-error' => 'अधिक परिणाम प्राप्त करते समय एक त्रुटि हुई।',
	'notification-edit-talk-page-bundle' => '$1 और $3 {{PLURAL:$4|अन्य}} ने आपके [[User talk:$2|वार्ता पृष्ठ]] पर सन्देश छोड़े हैं।',
	'notification-page-linked-bundle' => '$2 की कड़ी $3 और $4 अन्य {{PLURAL:$5|पृष्ठ|पृष्ठों}} पर {{GENDER:$1|जोड़ी}} गयी। [[Special:WhatLinksHere/$2|इस पृष्ठ से जुड़ने वाले सभी पृष्ठ देखें]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 और $2 {{PLURAL:$3|अन्य}} ने आपके वार्ता पृष्ठ पर सन्देश छोड़े हैं।',
	'notification-page-linked-email-batch-bundle-body' => '$2 की कड़ी $3 और $4 अन्य {{PLURAL:$5|पृष्ठ|पृष्ठों}} में {{GENDER:$1|जोड़ी}} गयी।',
	'echo-email-batch-subject-daily' => 'आपके लिये {{SITENAME}} पर नई {{PLURAL:$2|अधिसूचना है|अधिसूचनाएँ हैं}}।',
	'echo-email-batch-subject-weekly' => 'आपके लिये {{SITENAME}} पर इस सप्ताह नई {{PLURAL:$2|अधिसूचना है|अधिसूचनाएँ हैं}}।',
	'echo-email-batch-body-intro-daily' => 'नमस्कार $1,
{{SITENAME}} पर आज की गतिविधि का सारांश निम्न है।',
	'echo-email-batch-body-intro-weekly' => 'नमस्कार $1,
{{SITENAME}} पर इस सप्ताह की गतिविधि का सारांश निम्न है।',
	'echo-email-batch-link-text-view-all-notifications' => 'सभी अधिसूचनाएँ देखें',
	'echo-rev-deleted-text-view' => 'यह पृष्ठ अवतरण छिपा दिया गया है।',
);

/** Croatian (hrvatski)
 * @author MaGa
 * @author Roberta F.
 */
$messages['hr'] = array(
	'echo-desc' => 'Sustav obavješćivanja',
	'prefs-echo' => 'Obavijesti',
	'prefs-emailsettings' => 'Mogućnosti elektroničke pošte',
	'prefs-displaynotifications' => 'Opcije prikaza',
	'prefs-echosubscriptions' => 'Obavijesti me o događajima',
	'prefs-newmessageindicator' => 'Pokazivač novih poruka',
	'echo-pref-send-me' => 'Pošalji mi:',
	'echo-pref-send-to' => 'Pošalji:',
	'echo-pref-email-format' => 'Oblik e-poruke:',
	'echo-pref-web' => 'Mreža',
	'echo-pref-email' => 'Elektronička pošta',
	'echo-pref-email-frequency-never' => 'Ne šalji mi nikakve obavijesti e-mailom',
	'echo-pref-email-frequency-immediately' => 'Pojedinačne obavijesti po redoslijedu',
	'echo-pref-email-frequency-daily' => 'Dnevni sažetak obavijesti',
	'echo-pref-email-frequency-weekly' => 'Tjedni sažetak obavijesti',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'obični tekst',
	'echo-pref-notify-show-link' => 'Prikaži obavijesti na mojoj alatnoj vrpci',
	'echo-pref-new-message-indicator' => 'Prikaži pokazivač poruka na stranici za razgovor na mojoj alatnoj traci',
	'echo-learn-more' => 'Saznajte više',
	'echo-new-messages' => 'Imate nove poruke.', # Fuzzy
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Poruka}} na stranici za razgovor',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Poveznica|Poveznice|Poveznica}} na stranicu',
	'echo-category-title-reverted' => 'Uklanjanje {{PLURAL:$1|uređivanja}}',
	'echo-category-title-mention' => 'Spominjanja', # Fuzzy
	'echo-category-title-system' => '{{PLURAL:$1|Sustav}}',
	'echo-pref-tooltip-edit-user-talk' => 'Obavijesti me kad netko snimi poruku ili odgovori na mojoj stranici za razgovor.',
	'echo-pref-tooltip-article-linked' => 'Obavijesti me kad netko doda poveznicu na stranicu koju sam započeo.',
	'echo-pref-tooltip-reverted' => 'Obavijesti me kad netko ukloni moje uređivanje.',
	'echo-pref-tooltip-mention' => 'Obavijesti me kad netko doda poveznicu prema mojoj suradničkoj stranici s bilo koje razgovorne stranice.',
	'echo-no-agent' => '[Nitko]',
	'echo-no-title' => '[Nema stranice]',
	'echo-error-preference' => 'Pogrješka: Nije moguće postaviti suradničke postavke.',
	'notifications' => 'Obavijesti',
	'tooltip-pt-notifications' => 'Vaše obavijesti',
	'echo-specialpage' => 'Obavijesti',
	'echo-anon' => 'Da biste primali obavijesti, [$1 otvorite račun] ili se [$2 prijavite].',
	'echo-none' => 'Nemate obavijesti.',
	'echo-more-info' => 'Više informacija',
	'echo-feedback' => 'Povratna informacija',
	'notification-link-text-view-message' => 'Pogledajte poruku',
	'notification-link-text-view-mention' => 'Pogledaj spominjanja',
	'notification-link-text-view-changes' => 'Prikaži promjene',
	'notification-link-text-view-page' => 'Vidi stranicu',
	'notification-link-text-view-edit' => 'Prikaži promjene',
	'notification-edit-talk-page2' => '[[User:$1|$1]] je {{GENDER:$1|ostavio|ostavila}} poruku na Vašoj [[User talk:$2#$3|razgovornoj stranici]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] je {{GENDER:$1|ostavio|ostavila}} poruku na Vašoj razgovornoj stranici "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 je {{GENDER:$1|ostavio|ostavila}} poruku na Vašoj [[User talk:$2#$3|razgovornoj stranici]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 je {{GENDER:$1|ostavio|ostavila}} poruku na Vašoj razgovornoj stranici u "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => 'Članak [[:$2]] je {{GENDER:$1|povezan}} s člankom [[:$3]]. [[Special:WhatLinksHere/$2|Pogledajte što vodi prema ovom članku]].',
	'notification-page-linked-flyout' => 'Članak $2 je {{GENDER:$1|povezan}} s člankom [[:$3]].',
	'notification-mention' => '[[User:$1|$1]] Vas je {{GENDER:$1|spomenuо|spomenula}} na stranici za razgovor $5, u odlomku [[$3#$2|$4]].',
	'notification-mention-flyout' => '$1 Vas je {{GENDER:$1|spomenuo|spomenula}} na stranici za razgovor $5, u odlomku [[$3#$2|$4]].',
	'notification-reverted2' => '{{PLURAL:$4|Vaše uređivanje na stranici [[:$2]]|Vaša uređivanja na stranici [[:$2]]}} {{GENDER:$1|uklonio je suradnik|uklonila je suradnica}} [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Vaše uređivanje na stranici $2|Vaša uređivanja na stranici $2}} {{GENDER:$1|uklonio je suradnik|uklonila je suradnica}} $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 Vam je {{GENDER:$1|ostavio|ostavila}} poruku na projektu {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 Vam je {{GENDER:$1|ostavio|ostavila}} poruku na Vašoj stranici za razgovor:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 je {{GENDER:$1|ostavio|ostavila}} poruku na Vašoj stranici za razgovor u odlomku "$2".',
	'notification-page-linked-email-subject' => 'Na projektu {{SITENAME}} dodana je poveznica na Vaš članak',
	'notification-page-linked-email-batch-body' => 'Članak $2 je {{GENDER:$1|povezan}} s člankom $3.',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Vaša izmjena je {{GENDER:$1|uklonjena}}|Vaše izmjene su {{GENDER:$1|uklonjene}}}} na projektu {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Vaše uređivanje|Vaša uređivanja}} na stranici $2 {{GENDER:$1|uklonio je|uklonila je}} $1.',
	'notification-mention-email-subject' => '$1 Vas je {{GENDER:$1|spomenuo|spomenula}} na projektu {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 Vas je {{GENDER:$1|spomenuo|spomenula}} na stranici za razgovor $4, u odlomku $3.',
	'echo-email-batch-body-default' => 'Imate novu poruku.',
	'echo-email-footer-default' => '$2

Ukoliko želite prilagoditi primanje e-pošte, prilagodite svoje postavke:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Ukoliko želite prilagoditi primanje e-pošte, <a href="$2" style="text-decoration:none; color: #3868B0;">prilagodite svoje postavke</a>.<br />
$1',
	'echo-overlay-link' => 'Sve obavijesti',
	'echo-overlay-title' => '<b>Obavijesti</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Obavijesti}}</b> (prikazano $1 od $2 {{PLURAL:$1|nepročitana|nepročitane|nepročitanih}})',
	'echo-mark-all-as-read' => 'Označi sve pročitanim',
	'echo-date-today' => 'Danas',
	'echo-date-yesterday' => 'Jučer',
	'notification-edit-talk-page-bundle' => '$1 i $3 {{PLURAL:$4|ostali|ostalih}} {{GENDER:$1|ostavili}} su poruku na Vašoj [[User talk:$2|stranici za razgovor]].',
	'notification-page-linked-bundle' => 'Članak $2 je {{GENDER:$1|povezan}} s člankom $3 i još $4 {{PLURAL:$5|člankom|članka|članaka}}. [[Special:WhatLinksHere/$2|Pogledajte što vodi prema ovom članku]].',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 i još $2 {{PLURAL:$3|suradnik|suradnika}} {{GENDER:$1|ostavili}} su poruku na Vašoj stranici za razgovor.',
	'notification-page-linked-email-batch-bundle-body' => 'Članak $2 je {{GENDER:$1|povezan}} s člankom $3 i još $4 {{PLURAL:$5|člankom|članka|članaka}}.',
	'echo-email-batch-link-text-view-all-notifications' => 'Prikaži sve obavijesti',
);

/** Upper Sorbian (hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'echo-desc' => 'Zdźělenski system',
	'prefs-echo' => 'Zdźělenki',
	'prefs-emailsettings' => 'E-mejlowe nastajenja',
	'prefs-displaynotifications' => 'Zwobraznjenske opcije',
	'prefs-echosubscriptions' => 'Mje wo tutych podawkach informować',
	'prefs-newmessageindicator' => 'Nowy powěsćowy indikator',
	'echo-pref-send-me' => 'Pósćel mi:',
	'echo-pref-send-to' => 'Pósłać na:',
	'echo-pref-email-format' => 'E-mejlowy format:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-mejl',
	'echo-pref-email-frequency-never' => 'Njepósćel mi e-mejlowe zdźělenki',
	'echo-pref-email-frequency-immediately' => 'Indiwiduelne zdźělenki kaž dochadźeja',
	'echo-pref-email-frequency-daily' => 'Wšědny přehlad zdźělenkow',
	'echo-pref-email-frequency-weekly' => 'Tydźenski přehlad zdźělenkow',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Luty tekst',
	'echo-pref-notify-show-link' => 'Zdźělenki w symbolowej lajsće pokazać',
	'echo-pref-new-message-indicator' => 'Powěsćowy indikator diskusijneje strony w symbolowej lajsće pokazać',
	'echo-learn-more' => 'Dalše informacije',
	'echo-new-messages' => 'Maš nowe powěsće',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Powěsć|Powěsći|Powěsće|Powěsćow}} na diskusijnej stronje',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Wotkaz|Wotkazaj|Wotkazy}} strony',
	'echo-category-title-reverted' => '{{PLURAL:$1|Cofnjenje|Cofnjeni|Cofnjenja}} změnow',
	'echo-category-title-mention' => '{{PLURAL:$1|Naspomnjenje|Naspomnjeni|Naspomnjenja}}',
	'echo-category-title-other' => '{{PLURAL:$1|Druha|Druhej|Druhe}}',
	'echo-category-title-system' => '{{PLURAL:$1|System|Systemaj|Systemy}}',
	'echo-pref-tooltip-edit-user-talk' => 'Informuj mje, hdyž něchtó powěsć abo wotmołwu na mojej diskusijnej stronje zawostaja.',
	'echo-pref-tooltip-article-linked' => 'Informuj mje, hdyž něchtó na stronu wotkazuje, kotruž sym z nastawka wutworił.',
	'echo-pref-tooltip-reverted' => 'Informuj mje, hdyž něchtó z pomocu cofnjenja abo nastroja změnu anuluje, kotruž sym činił.',
	'echo-pref-tooltip-mention' => 'Informuj mje, hdyž něchtó z někajkeje diskusijneje strony k mojej wužiwarskej stronje wotkazuje.',
	'echo-no-agent' => '[Nichtó]',
	'echo-no-title' => '[Žana strona]',
	'echo-error-no-formatter' => 'Za zdźělenje njeje so formatowanje definowało.',
	'echo-error-preference' => 'Zmylk: Wužiwarske nastajenje njeda so stajić.',
	'echo-error-token' => 'Zmylk: Wužiwarski token njeda so wotwołać.',
	'notifications' => 'Zdźělenki',
	'tooltip-pt-notifications' => 'Twoje zdźělenki',
	'echo-specialpage' => 'Zdźělenki',
	'echo-anon' => 'Zo by zdźělenki dóstał, dyrbiš [$1 konto załožić] abo [$2 so přizjewić].',
	'echo-none' => 'Nimaš zdźělenki.',
	'echo-more-info' => 'Dalše informacije',
	'echo-feedback' => 'Komentary',
	'echo-quotation-marks' => '"$1"',
	'notification-link-text-view-message' => 'Powěsć pokazać',
	'notification-link-text-view-mention' => 'Naspomnjenje pokazać',
	'notification-link-text-view-changes' => 'Změny pokazać',
	'notification-link-text-view-page' => 'Stronu pokazać',
	'notification-link-text-view-edit' => 'Změnu pokazać',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|zawostaji}} powěsć na twojej [[User talk:$2#$3|diskusijnej stronje]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|zawostaji}} powěsć na twojej diskusijnej stronje w "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|zawostaji}} powěsć na twojej [[User talk:$2#$3|diskusijnej stronje]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|zawostaji}} powěsć na twojej diskusijnej stronje w "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => '[[:$2]] je so wot [[:$3]] {{GENDER:$1|wotkazał|wotkazała}}. [[Special:WhatLinksHere/$2|Wšě wotkazy k tutej stronje pokazać]].',
	'notification-page-linked-flyout' => '$2 je so wot [[:$3]] {{GENDER:$1|wotkazał}}.',
	'notification-add-comment2' => '[[User:$1|$1]]  je na "[[$3|$2]]" na diskusijnej stronje "$4" {{GENDER:$1|komentował|komentowała}}.',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] je nowu temu "$2" na [[$3]] {{GENDER:$1|startował|startowała}}.',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]]  je ći powěsć {{GENDER:$1|pósłał|pósłała}}: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]]  je na "[[$3#$2|$2]]" na twojej diskusijnej stronje {{GENDER:$1|komentował|komentowała}}.',
	'notification-mention' => '[[User:$1|$1]] je će na diskusijnej stronje $5 w "[[$3#$2|$4]]" {{GENDER:$1|naspomnił|naspomniła}}.',
	'notification-mention-flyout' => '$1 je će na diskusijnej stronje $5 w "[[$3#$2|$4]]" {{GENDER:$1|naspomnił|naspomniła}}.',
	'notification-mention-nosection' => '[[User:$1|$1]] je će na [[$3|diskusijnej stronje $2]] {{GENDER:$1|naspomnił|naspomniła}}.',
	'notification-mention-nosection-flyout' => '$1 je će na [[$3|diskusijnej stronje $2]] {{GENDER:$1|naspomnił|naspomniła}}.',
	'notification-user-rights' => 'Twoje wužiwarske prawa [[Special:Log/rights/$1|su so wot [[User:$1|$1]] {{GENDER:$1|změnili}}]] . $2. [[Special:ListGroupRights|Dalše informacije]]',
	'notification-user-rights-flyout' => 'Twoje wužiwarske prawa su so wot $1 {{GENDER:$1|změnili}}. $2. [[Special:ListGroupRights|Dalše informacije]]',
	'notification-user-rights-add' => 'Sy nětko čłon {{PLURAL:$2|tuteje skupiny|tuteju skupinow|tutych skupinow}}: $1',
	'notification-user-rights-remove' => 'Njejsy hižo čłon {{PLURAL:$2|tuteje skupiny|tuteju skupinow|tutych skupinow}}: $1',
	'notification-new-user' => 'Witaj do {{GRAMMAR:genitiw|{{SITENAME}}}}, $1! Wjeselimy so, zo sy tu.',
	'notification-reverted2' => '[[User:$1|$1]] je {{PLURAL:$4|změnu na [[:$2]]|změnje na [[:$2]]|změny na [[:$2]]}} {{GENDER:$1|anulował|anulowała}}. $3',
	'notification-reverted-flyout2' => '$1 je {{PLURAL:$4|změnu na $2|změnje na $2|změny na $2}} {{GENDER:$1|anulował|anulowała}}. $3',
	'notification-edit-talk-page-email-subject2' => '$1 je ći powěsć na {{GRAMMAR:lokatiw|{{SITENAME}}}} {{GENDER:$1|zawostajił|zawostajiła}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 je powěsć na twojej diskusijnej stronje {{GENDER:$1|zawostajił|zawostajiła}}:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 je powěsć wo "$2" na twojej diskusijnej stronje {{GENDER:$1|zawostajił|zawostajiła}}.',
	'notification-page-linked-email-subject' => 'Twoja strona je so na {{GRAMMAR:lokatiw|{{SITENAME}}}} wotkazała.',
	'notification-page-linked-email-batch-body' => '$2 je so z $3 {{GENDER:$1|wotkazał}}.',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Twoja změna je|Twojej změnje stej|Twoje změny su}} so na {{GRAMMAR:lokatiw|{{SITENAME}}}}{{GENDER:$1|{{PLURAL:$3|anulowała|anulowałoj|anulowali}}}}',
	'notification-reverted-email-batch-body2' => '$1 je {{PLURAL:$3|twoju změnu na $2|twojej změnje na $2|twoje změny na $2}} {{GENDER:$1|anulował|anulowała}}.',
	'notification-mention-email-subject' => '$1 je će na {{GRAMMAR:lokatiw|{{SITENAME}}}} {{GENDER:$1|naspomnił|naspomniła}}',
	'notification-mention-email-batch-body' => '$1 je će na diskusijnej stronje $4 w "$3" {{GENDER:$1|naspomnił|naspomniła}}.',
	'notification-mention-nosection-email-batch-body' => '$1 je će na diskusijnej stronje $2 {{GENDER:$1|naspomnił|naspomniła}}.',
	'notification-user-rights-email-subject' => 'Twoje wužiwarske prawa su so na {{GRAMMAR:lokatiw|{{SITENAME}}}} změnili',
	'notification-user-rights-email-batch-body' => 'Twoje wužiwarske prawa su so wot $1 {{GENDER:$1|změnili}}. $2',
	'echo-notification-count' => '$1+',
	'echo-email-subject-default' => 'Nowa zdźělenka na {{GRAMMAR:lokatiw|{{SITENAME}}}}',
	'echo-email-body-default' => 'Maš nowu zdźělenku na {{GRAMMAR:lokatiw|{{SITENAME}}}}:

$1',
	'echo-email-batch-body-default' => 'Maš nowu powěsć.',
	'echo-email-footer-default' => '$2

Zo by kontrolował, kotre e-mejle ći sćelemy, přepruwuj swoje nastajenja:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Zo by kontrolował, kotre e-mejle ći sćelemy, <a href="$2" style="text-decoration:none; color: #3868B0;">přepruwuj swoje nastajenja</a>.<br />
$1',
	'echo-overlay-link' => 'Wšě zdźělenki',
	'echo-overlay-title' => '<b>Zdźělenki</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Zdźělenka|Zdźělence|Zdźělenki}}</b> ($1 z $2 {{PLURAL:$2|njepřitaneje|njepřečitaneju|njepřečitanych}} so {{PLURAL:$1|pokazuje|pokazujetej|pokazuja|pokazuje}})',
	'echo-mark-all-as-read' => 'Wšě jako přečitane markěrować',
	'echo-date-today' => 'Dźensa',
	'echo-date-yesterday' => 'Wčera',
	'echo-load-more-error' => 'Při wobstarowanju dalšich wuslědkow je zmylk wustupił.',
	'notification-edit-talk-page-bundle' => '$1 a {{PLURAL:$4|dalši wužiwar je|$3 dalšej wužiwarjej stej|$3 dalši wužiwarjo su|$3 dalšich wužiwarjow je}} powěsć na twojej [[User talk:$2|diskusijnej stronje]] {{PLURAL:$4|zawostajił|zawostajiłoj|zawostajili|zawostajiło}}.',
	'notification-page-linked-bundle' => '$2 je so z $3 a {{PLURAL:$5|jedneje dalšeje strony|$4 dalšeju stronow|$4 dalšich stronow}} {{GENDER:$1|wotkazał}}. [[Special:WhatLinksHere/$2|Wšě wotkazy k tutej stronje pokazać]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 a {{PLURAL:$3|dalši wužiwar staj|$2 dalšej wužiwarjej su|$2 dalši wužiwarjo su|dalšich wužiwarjow su}} powěsć na twojej diskusijnej stronje {{GENDER:$1|zawostajiłoj|zawostajili}}.',
	'notification-page-linked-email-batch-bundle-body' => '$2 je so wot $3 a {{PLURAL:$5|jedneje dalšeje strony|$4 dalšeju stronow|$4 dalšich stronow}} {{GENDER:$1|wotkazał}}.',
	'echo-email-batch-bullet' => '•',
	'echo-email-batch-subject-daily' => 'Maš {{PLURAL:$2|nowu zdźělenku|nowej zdźělence|nowe zdźělenki}} na {{GRAMMAR:lokatiw|{{SITENAME}}}}',
	'echo-email-batch-subject-weekly' => 'Maš {{PLURAL:$2|nowu zdźělenku|nowej zdźělence|nowe zdźělenki}} na {{GRAMMAR:lokatiw|{{SITENAME}}}} tutón tydźeń',
	'echo-email-batch-body-intro-daily' => 'Witaj $1,

tu je zjeće dźensnišich aktiwitow na {{GRAMMAR:lokatiw|{{SITENAME}}}} za tebje.',
	'echo-email-batch-body-intro-weekly' => 'Witja $1,

tu je zjeće aktiwitow z tutoho tydźenja na {{GRAMMAR:lokatiw|{{SITENAME}}}} za tebje.',
	'echo-email-batch-link-text-view-all-notifications' => 'Wšě zdźělenki pokazać',
	'echo-rev-deleted-text-view' => 'Tuta wersija strony je so potłóčiła.',
);

/** Hungarian (magyar)
 * @author BáthoryPéter
 * @author Dj
 * @author Misibacsi
 * @author TK-999
 * @author Tgr
 */
$messages['hu'] = array(
	'echo-desc' => 'Értesítési rendszer',
	'prefs-echo' => 'Értesítések',
	'prefs-emailsettings' => 'E-mail beállítások',
	'prefs-displaynotifications' => 'Megjelenítési beállítások',
	'prefs-echosubscriptions' => 'Értesítést kérek ezekről az eseményekről',
	'prefs-newmessageindicator' => 'Új üzenet jelzése',
	'echo-pref-send-me' => 'Gyakoriság:',
	'echo-pref-send-to' => 'Erre a címre:',
	'echo-pref-email-format' => 'A levél formátuma:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-mail',
	'echo-pref-email-frequency-never' => 'Egyáltalán ne küldjön e-mail értesítést',
	'echo-pref-email-frequency-immediately' => 'Küldjön külön értesítést minden eseményről',
	'echo-pref-email-frequency-daily' => 'Küldjön napi összefoglalót az értesítésekről',
	'echo-pref-email-frequency-weekly' => 'Küldjön heti összefoglalót az értesítésekről',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Sima szöveg',
	'echo-pref-notify-show-link' => 'Mutassa az értesítéseket a lap tetején lévő menüben',
	'echo-pref-new-message-indicator' => 'Jelezze a vitalapi üzeneteket a lap tetején lévő menüben',
	'echo-learn-more' => 'Tudj meg többet',
	'echo-new-messages' => 'Új üzeneted van',
	'echo-category-title-edit-user-talk' => 'vitalapi {{PLURAL:$1|üzenet|üzenetek}}',
	'echo-category-title-article-linked' => 'hivatkozott {{PLURAL:$1|lap|lapok}}',
	'echo-category-title-reverted' => 'visszaállított {{PLURAL:$1|szerkesztés|szerkesztések}}',
	'echo-category-title-mention' => '{{PLURAL:$1|említés|említések}}',
	'echo-category-title-other' => '{{PLURAL:$1|Más}}',
	'echo-category-title-system' => '{{PLURAL:$1|rendszerüzenet|rendszerüzenetek}}',
	'echo-pref-tooltip-edit-user-talk' => 'Értesítést kérek, ha valaki üzen vagy válaszol a vitalapomon.',
	'echo-pref-tooltip-article-linked' => 'Értesítést kérek, ha valaki hivatkozik egy általam írt szócikkre egy másik cikkben.',
	'echo-pref-tooltip-reverted' => 'Értesítést kérek, ha valaki visszaállítja egy szerkesztésemet.',
	'echo-pref-tooltip-mention' => 'Értesítést kérek, ha valaki hivatkozik a felhasználói lapomra valamelyik vitalapon.',
	'echo-no-agent' => '[Senki]',
	'echo-no-title' => '[Nincs lap]',
	'echo-error-no-formatter' => 'Nincs értesítési formátum definiálva',
	'echo-error-preference' => 'Hiba: Nem sikerült elmenteni a felhasználói beállítást',
	'echo-error-token' => 'Hiba: nem sikerült lekérni a felhasználói tokent',
	'notifications' => 'Értesítések',
	'tooltip-pt-notifications' => 'Értesítéseid',
	'echo-specialpage' => 'Értesítések',
	'echo-anon' => 'Értesítések fogadásához [$1 hozz létre egy fiókot] vagy [$2 jelentkezz be].',
	'echo-none' => 'Nincsenek értesítéseid.',
	'echo-more-info' => 'További információ',
	'echo-feedback' => 'Visszajelzés',
	'notification-link-text-view-message' => 'Üzenet mutatása',
	'notification-link-text-view-mention' => 'Említés mutatása',
	'notification-link-text-view-changes' => 'Változások mutatása',
	'notification-link-text-view-page' => 'Lap mutatása',
	'notification-link-text-view-edit' => 'Szerkesztés mutatása',
	'notification-edit-talk-page2' => '[[User:$1|$1]] üzenetet hagyott [[User talk:$2#$3|a vitalapodon]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] üzenetet hagyott a vitalapodon „[[User talk:$2#$3|$4]]” címmel.',
	'notification-edit-talk-page-flyout2' => '$1 üzenetet hagyott [[User talk:$2#$3|a vitalapodon]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 üzenetet hagyott a vitalapodon „[[User talk:$2#$3|$4]]” címmel.',
	'notification-page-linked' => 'A(z) [[:$2]] szócikkedre hivatkoztak a(z) [[:$3]] cikkben. [[Special:WhatLinksHere/$2|Kilistázhatod az összes hivatkozást a szócikkre]].', # Fuzzy
	'notification-page-linked-flyout' => 'A(z) $2 szócikkedre hivatkoztak a(z) [[:$3]] cikkben.', # Fuzzy
	'notification-add-comment2' => '[[User:$1|$1]] hozzászólt a(z) „[[$3|$2]]” témához a(z) „$4” vitalapon',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] új témát kezdett „$2” néven a(z) [[$3]] lapon.',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] üzenetet küldött neked: „[[$3#$2|$2]]”',
	'notification-add-comment-yours2' => '[[User:$1|$1]] hozzászólt a „[[$3#$2|$2]]” témához a vitalapodon',
	'notification-mention' => '[[User:$1|$1]] megemlített téged $5 vitalapján a(z) „[[$3#$2|$4]]” szakaszban.',
	'notification-mention-flyout' => '$1 megemlített téged $5 vitalapján a(z) „[[$3#$2|$4]]” szakaszban.',
	'notification-user-rights' => '[[User:$1|$1]] [[Special:Log/rights/$1|megváltoztatta a jogosultságaidat]]. $2. [[Special:ListGroupRights|Információ a jogosultságokról]]',
	'notification-user-rights-flyout' => '$1 megváltoztatta a jogosultságaidat. $2. [[Special:ListGroupRights|Információ a jogosultságokról]]',
	'notification-user-rights-add' => 'Tagja lettél {{PLURAL:$2|ennek a csoportnak|ezeknek a csoportoknak}}: $1',
	'notification-user-rights-remove' => 'Kikerültél {{PLURAL:$2|ebből a csoportból|ezekből a csoportokból}}: $1',
	'notification-new-user' => 'Üdvözlet a {{SITENAME}} oldalon, $1! Örülünk, hogy csatlakoztál hozzánk.',
	'notification-reverted2' => '[[User:$1|$1]] visszavonta a {{PLURAL:$4|szerkesztésedet|szerkesztéseidet}} a(z) [[:$2]] cikkben $3',
	'notification-reverted-flyout2' => '$1 visszavonta a {{PLURAL:$4|szerkesztésedet|szerkesztéseidet}} a(z) $2 cikkben $3',
	'notification-edit-talk-page-email-subject2' => '$1 üzenetet hagyott neked a(z) {{SITENAME}} wikin',
	'notification-edit-talk-page-email-batch-body2' => '$1 üzenetet hagyott a vitalapodon:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 üzenetet hagyott a vitalapodon a(z) „$2” szakaszban.',
	'notification-page-linked-email-subject' => 'Hivatkoztak egy általad létrehozott oldalra a(z) {{SITENAME}} wikin',
	'notification-page-linked-email-batch-body' => 'A(z) $2 lapra hivatkoztak a(z) $3 lapról.', # Fuzzy
	'notification-reverted-email-subject2' => 'Visszavonták a {{PLURAL:$3|szerkesztésedet|szerkesztéseidet}} a(z) {{SITENAME}} wikin',
	'notification-reverted-email-batch-body2' => '$1 visszavonta a {{PLURAL:$3|szerkesztésedet|szerkesztéseidet}} a(z) $2 oldalon.',
	'notification-mention-email-subject' => '$1 említett téged a(z) {{SITENAME}} wikin',
	'notification-mention-email-batch-body' => '$1 említett téged $4 vitalapján a(z) „$3” szakaszban.',
	'notification-user-rights-email-subject' => 'Megváltoztak a jogosultságaid a(z) {{SITENAME}} wikin',
	'notification-user-rights-email-batch-body' => '$1 megváltoztatta a jogosultságaidat. $2',
	'echo-email-subject-default' => 'Új értesítés a(z) {{SITENAME}} wikin',
	'echo-email-body-default' => 'Új értesítést kaptál a(z) {{SITENAME}} wikin:', # Fuzzy
	'echo-email-batch-body-default' => 'Új értesítést kaptál.',
	'echo-email-footer-default' => '$2

A beállításaidnál módosíthatod, mikor küldjünk e-mailt:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => '
<a href="$2" style="text-decoration:none; color: #3868B0;">A beállításaidnál</a> módosíthatod, mikor küldjünk e-mailt.<br />
$1',
	'echo-overlay-link' => 'Összes értesítés',
	'echo-overlay-title' => '<b>Értesítéseim</b>',
	'echo-overlay-title-overflow' => '<b>Értesítéseim</b> ($2 olvasatlanból $1 mutatva)', # Fuzzy
	'echo-mark-all-as-read' => 'Összes olvasottnak jelölése',
	'echo-date-today' => 'Ma',
	'echo-date-yesterday' => 'Tegnap',
	'echo-load-more-error' => 'Hiba történt a további eredmények lekérdezése során.',
	'notification-edit-talk-page-bundle' => '$1 és még $3 szerkesztő üzenetet hagyott [[User talk:$2|a vitalapodon]].', # Fuzzy
	'notification-page-linked-bundle' => 'A(z) $2 lapra hivatkoztak a(z) $3 lapról és még $4 másikról. [[Special:WhatLinksHere/$2|Megnézheted az összes hivatkozást]]', # Fuzzy
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 és még $2 szerkesztő üzenetet hagyott a vitalapodon', # Fuzzy
	'notification-page-linked-email-batch-bundle-body' => 'A(z) $2 lapra hivatkoztak a(z) $3 lapról és még $4 másikról', # Fuzzy
	'echo-email-batch-subject-daily' => 'Új {{PLURAL:$2|értesítést|értesítéseket}} kaptál a(z) {{SITENAME}} wikin',
	'echo-email-batch-subject-weekly' => 'A héten új {{PLURAL:$2|értesítést|értesítéseket}} kaptál a(z) {{SITENAME}} wikin',
	'echo-email-batch-body-intro-daily' => 'Kedves $1,
összefoglaltuk, mi történt ma a(z) {{SITENAME}} wikin.',
	'echo-email-batch-body-intro-weekly' => 'Kedves $1,
összefoglaltuk, mi történt a héten a(z) {{SITENAME}} wikin.',
	'echo-email-batch-link-text-view-all-notifications' => 'Nézd meg az összes értesítést',
	'echo-rev-deleted-text-view' => 'Ezt a lapváltozatot elrejtették.',
);

/** Armenian (Հայերեն)
 * @author Xelgen
 */
$messages['hy'] = array(
	'echo-desc' => 'Ծանուցումների համակարգ',
	'prefs-echo' => 'Ծանուցումներ',
	'prefs-emailsettings' => 'Էլ․ փոստի կարգավորումներ',
	'prefs-displaynotifications' => 'Ցուցադրման կարգավորումներ',
	'prefs-echosubscriptions' => 'Ծանուցել հետևյալ դեպքերում',
	'prefs-newmessageindicator' => 'Նոր ուղերձների ցուցիչ։',
	'echo-pref-send-me' => 'Ուղարկել ինձ․',
	'echo-pref-send-to' => 'Ուղարկել․',
	'echo-pref-email-format' => 'Նամակի ձևաչափ․',
	'echo-pref-web' => 'Ոստայն',
	'echo-pref-email' => 'Էլ. փոստ',
	'echo-pref-email-frequency-never' => 'Չուղարկել ինձ ծանուցումներ էլ․ փոստով',
	'echo-pref-email-frequency-immediately' => 'Առանձին ծանուցումներ, հայտնվելուն պես',
	'echo-pref-email-frequency-daily' => 'Ծանուցումների օրական ամփոփում',
	'echo-pref-email-frequency-weekly' => 'Ծանուցումների շաբաթական ամփոփում',
	'echo-pref-email-format-html' => 'ԷյչԹիԷմԷլ',
	'echo-pref-email-format-plain-text' => 'Պարզ տեքստ',
	'echo-pref-notify-show-link' => 'Ցուցադրել ծանուցումները իմ վահանակում',
	'echo-pref-new-message-indicator' => 'Ցուցադրել քննարկման էջում հաղորդագրությունների ցուցիչը իմ վահանակաում',
	'echo-learn-more' => 'Իմանալ ավելին',
	'echo-new-messages' => 'Դուք նոր ուղերձներ ունեք',
	'echo-category-title-edit-user-talk' => 'Քննարկման էջում {{PLURAL:$1|ուղերձ|ուղերձներ}}',
	'echo-no-agent' => '[Ոչ ոք]',
	'echo-no-title' => '[Էջը չկա]',
	'notifications' => 'Ծանուցումներ',
	'tooltip-pt-notifications' => 'Ձեր ծանուցումները',
	'echo-specialpage' => 'Ծանուցումներ',
	'echo-anon' => 'Ծանուցումներ ստանալու համար [$1 ստեղծեք հաշիվ] կամ [$2 մուտք գործեք]։',
	'echo-none' => 'Դուք ծանուցումներ չունեք։',
	'echo-more-info' => 'Մանրամասն',
	'echo-feedback' => 'Հետադարձ կապ',
	'notification-link-text-view-message' => 'Դիտել ուղերձը',
	'notification-link-text-view-mention' => 'Դիտել հիշատակումը',
	'notification-link-text-view-changes' => 'Դիտել փոփոխությունները',
	'notification-link-text-view-page' => 'Դիտել էջը',
	'notification-link-text-view-edit' => 'Դիտել խմբագրումը',
	'notification-new-user' => 'Բարի՛ գալուստ {{SITENAME}}, $1։ Ուրախ ենք տեսնել ձեզ այստեղ։',
	'echo-email-subject-default' => 'Նոր ծանուցումներ {{SITENAME}} կայքից։',
	'echo-email-body-default' => 'Դուք ունեք նոր ծանուցումներ «{{SITENAME}}» կայքից:

$1',
	'echo-email-batch-body-default' => 'Դուք ունեք նոր ծանուցում։',
	'echo-overlay-link' => 'Բոլոր ծանուցումները',
	'echo-overlay-title' => '<b>Ծանուցումներ</b>',
	'echo-mark-all-as-read' => 'Ամենը ընթերցված նշել',
	'echo-date-today' => 'Այսօր',
	'echo-date-yesterday' => 'Երեկ',
	'echo-email-batch-link-text-view-all-notifications' => 'Դիտել բոլոր ծանուցումները',
	'echo-rev-deleted-text-view' => 'Էջի այս խմբագրումը թաքցված է։',
);

/** Interlingua (interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'echo-desc' => 'Systema de notificationes',
	'prefs-echo' => 'Notificationes',
	'prefs-emailsettings' => 'Optiones de e-mail',
	'prefs-displaynotifications' => 'Optiones de presentation',
	'prefs-echosubscriptions' => 'Notificar me de iste eventos',
	'prefs-newmessageindicator' => 'Indicator de nove messages',
	'echo-pref-send-me' => 'Inviar me:',
	'echo-pref-send-to' => 'Inviar a:',
	'echo-pref-email-format' => 'Formato de e-mail:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-mail',
	'echo-pref-email-frequency-never' => 'Non inviar me notificationes in e-mail',
	'echo-pref-email-frequency-immediately' => 'Notificationes individual al momento de cata occurrentia',
	'echo-pref-email-frequency-daily' => 'Un summario quotidian de notificationes',
	'echo-pref-email-frequency-weekly' => 'Un summario septimanal de notificationes',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Texto simple',
	'echo-pref-notify-show-link' => 'Monstrar notificationes in mi instrumentario',
	'echo-pref-new-message-indicator' => 'Monstrar indicator de message in pagina de discussion in mi instrumentario',
	'echo-learn-more' => 'Leger plus',
	'echo-new-messages' => 'Tu ha nove messages',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Message|Messages}} del pagina de discussion',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Ligamine|Ligamines}} a un pagina',
	'echo-category-title-reverted' => '{{PLURAL:$1|Modification|Modificationes}} revertite',
	'echo-category-title-mention' => '{{PLURAL:$1|Mention|Mentiones}}',
	'echo-category-title-other' => '{{PLURAL:$1|Altere|Alteres}}',
	'echo-category-title-system' => '{{PLURAL:$1|Systema|Systemas}}',
	'echo-pref-tooltip-edit-user-talk' => 'Notificar me quando alcuno scribe o responde in mi pagina de discussion',
	'echo-pref-tooltip-article-linked' => 'Notificar me quando alcuno insere in un pagina de articulo un ligamine a un pagina que io ha create.',
	'echo-pref-tooltip-reverted' => 'Notificar me quando alcuno reverte un modification que io ha facite per medio de "disfacer" o "revocar".',
	'echo-pref-tooltip-mention' => 'Notificar me quando alcuno insere un ligamine a mi pagina de usator in alcun pagina de discussion.',
	'echo-no-agent' => '[Nemo]',
	'echo-no-title' => '[Nulle pagina]',
	'echo-error-no-formatter' => 'Nulle formato definite pro notification',
	'echo-error-preference' => 'Error: Impossibile definir le preferentia de usator',
	'echo-error-token' => 'Error: Impossibile recuperar le indicio de usator',
	'notifications' => 'Notificationes',
	'tooltip-pt-notifications' => 'Tu notificationes',
	'echo-specialpage' => 'Notificationes',
	'echo-anon' => 'Pro reciper notificationes, [$1 crea un conto] o [$2 aperi session].',
	'echo-none' => 'Tu non ha notificationes.',
	'echo-more-info' => 'Plus info',
	'echo-feedback' => 'Commentario',
	'notification-link-text-view-message' => 'Vider message',
	'notification-link-text-view-mention' => 'Vider mention',
	'notification-link-text-view-changes' => 'Vider modificationes',
	'notification-link-text-view-page' => 'Vider pagina',
	'notification-link-text-view-edit' => 'Vider modification',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|lassava}} un message in tu [[User talk:$2#$3|pagina de discussion]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] te lassava un message in tu pagina de discussion sub "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 te lassava un message in tu [[User talk:$2#$3|pagina de discussion]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 te lassava un message in tu pagina de discussion sub "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => 'Un ligamine a [[:$2]] ha essite {{GENDER:$1|inserite}} in [[:$3]]. [[Special:WhatLinksHere/$2|Vider tote le ligamines a iste pagina]].',
	'notification-page-linked-flyout' => 'Un ligamine a $2 ha essite {{GENDER:$1|inserite}} in [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] commentava "[[$3|$2]]" in le pagina de discussion "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|ha comenciate}} un nove discussion "$2" in [[$3]].',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] te {{GENDER:$1|ha inviate}} un message: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|ha commentate}} "[[$3#$2|$2]]" in tu pagina de discussion.',
	'notification-mention' => '[[User:$1|$1]] te {{GENDER:$1|ha mentionate}} in le pagina de discussion de $5 in "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 te {{GENDER:$1|ha mentionate}} in le pagina de discussion de $5 in "[[$3#$2|$4]]".',
	'notification-mention-nosection' => '[[User:$1|$1]] te {{GENDER:$1|mentionava}} in le [[$3|$2 pagina de discussion]].',
	'notification-mention-nosection-flyout' => '$1 te {{GENDER:$1|mentionava}} in le [[$3|$2 pagina de discussion]].',
	'notification-user-rights' => 'Tu derectos de usator [[Special:Log/rights/$1|ha essite {{GENDER:$1|cambiate}}]] per [[User:$1|$1]]. $2. [[Special:ListGroupRights|Leger plus]]',
	'notification-user-rights-flyout' => 'Tu derectos de usator ha essite {{GENDER:$1|cambiate}} per $1. $2. [[Special:ListGroupRights|Leger plus]]',
	'notification-user-rights-add' => 'Tu es ora membro de iste {{PLURAL:$2|gruppo|gruppos}}: $1',
	'notification-user-rights-remove' => 'Tu non plus es membro de iste {{PLURAL:$2|gruppo|gruppos}}: $1',
	'notification-new-user' => 'Benvenite a {{SITENAME}}, $1! Nos es felice de vider te hic.',
	'notification-reverted2' => 'Tu {{PLURAL:$4|modification|modificationes}} de [[:$2]] ha essite {{GENDER:$1|revertite}} per [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => 'Tu {{PLURAL:$4|modification|modificationes}} de $2 ha essite {{GENDER:$1|revertite}} per $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 te {{GENDER:$1|ha lassate}} un message in {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|ha lassate}} un message in tu pagina de discussion:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|ha lassate}} un message in tu pagina de discussion in "$2".',
	'notification-page-linked-email-subject' => 'Un ligamine a tu pagina ha essite inserite in {{SITENAME}}',
	'notification-page-linked-email-batch-body' => 'Un ligamine a $2 ha essite {{GENDER:$1|inserite}} in $3.',
	'notification-reverted-email-subject2' => 'Tu {{PLURAL:$3|modification|modificationes}} ha essite {{GENDER:$1|revertite}} in {{SITENAME}}',
	'notification-reverted-email-batch-body2' => 'Tu {{PLURAL:$3|modification|modificationes}} de $2 ha essite {{GENDER:$1|revertite}} per $1.',
	'notification-mention-email-subject' => '$1 te {{GENDER:$1|ha mentionate}} in {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 te {{GENDER:$1|ha mentionate}} in le pagina de discussion de $4 in "$3".',
	'notification-mention-nosection-email-batch-body' => '$1 te {{GENDER:$1|mentionava}} in le pagina de discussion de $2.',
	'notification-user-rights-email-subject' => 'Tu derectos de usator ha cambiate in {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Tu derectos de usator ha essite {{GENDER:$1|cambiate}} per $1. $2',
	'echo-email-subject-default' => 'Nove notification in {{SITENAME}}',
	'echo-email-body-default' => 'Tu ha un nove notification in {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Tu ha un nove notification.',
	'echo-email-footer-default' => '$2

Pro seliger le e-mails que nos te invia, controla tu preferentias:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Pro seliger le e-mails que nos te invia, <a href="$2" style="text-decoration:none; color: #3868B0;">controla tu preferentias</a>.<br />
$1',
	'echo-overlay-link' => 'Tote le notificationes',
	'echo-overlay-title' => '<b>Notificationes</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Notificationes}}</b> ($1 monstrate de $2 non legite)',
	'echo-mark-all-as-read' => 'Marcar toto como legite',
	'echo-date-today' => 'Hodie',
	'echo-date-yesterday' => 'Heri',
	'echo-load-more-error' => 'Un error ha occurrite durante le obtention de altere resultatos.',
	'notification-edit-talk-page-bundle' => '$1 e $3 {{PLURAL:$4|altere|alteres}} {{GENDER:$1|ha lassate}} un message in tu [[User talk:$2|pagina de discussion]].',
	'notification-page-linked-bundle' => 'Ligamines a $2 ha essite {{GENDER:$1|inserite}} in $3 e $4 altere {{PLURAL:$5|pagina|paginas}}. [[Special:WhatLinksHere/$2|Vider tote le ligamines a iste pagina]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 e $2 {{PLURAL:$3|altere|alteres}} {{GENDER:$1|ha lassate}} un message in tu pagina de discussion.',
	'notification-page-linked-email-batch-bundle-body' => 'Un ligamine a $2 ha essite {{GENDER:$1|inserite}} in $3 e $4 altere {{PLURAL:$5|pagina|paginas}}.',
	'echo-email-batch-subject-daily' => 'Tu ha {{PLURAL:$2|un nove notification|nove notificationes}} in {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Tu ha {{PLURAL:$2|un nove notification|nove notificationes}} in {{SITENAME}} iste septimana',
	'echo-email-batch-body-intro-daily' => 'Salute $1,
Ecce un summario del activitate de hodie in {{SITENAME}} pro te.',
	'echo-email-batch-body-intro-weekly' => 'Salute $1,
Ecce un summario del activitate de iste septimana in {{SITENAME}} pro te.',
	'echo-email-batch-link-text-view-all-notifications' => 'Vider tote le notificationes',
	'echo-rev-deleted-text-view' => 'Iste version del pagina ha essite supprimite.',
);

/** Indonesian (Bahasa Indonesia)
 * @author Farras
 * @author William Surya Permana
 * @author පසිඳු කාවින්ද
 */
$messages['id'] = array(
	'echo-desc' => 'Sistem pemberitahuan',
	'prefs-echo' => 'Pemberitahuan',
	'prefs-emailsettings' => 'Opsi surel',
	'prefs-displaynotifications' => 'Opsi tampilan',
	'prefs-echosubscriptions' => 'Beritahu saya mengenai peristiwa berikut',
	'prefs-newmessageindicator' => 'Penanda pesan baru',
	'echo-pref-send-me' => 'Kirimi saya:',
	'echo-pref-send-to' => 'Kirimkan ke:',
	'echo-pref-email-format' => 'Format surel:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Surel',
	'echo-pref-email-frequency-never' => 'Jangan kirimi saya pemberitahuan surel apapun',
	'echo-pref-email-frequency-immediately' => 'Pemberitahuan tunggal setiap suatu peristiwa terjadi',
	'echo-pref-email-frequency-daily' => 'Ringkasan harian dari beberapa pemberitahuan',
	'echo-pref-email-frequency-weekly' => 'Ringkasan mingguan dari beberapa pemberitahuan',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Teks polos',
	'echo-pref-notify-show-link' => 'Tampilkan pemberitahuan di bilah alat saya',
	'echo-pref-new-message-indicator' => 'Tampilkan penanda pesan halaman pembicaraan pada bilah alat saya',
	'echo-learn-more' => 'Pelajari selengkapnya',
	'echo-new-messages' => 'Anda memiliki pesan baru.', # Fuzzy
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Pesan}} halaman pembicaraan',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Pranala}} halaman',
	'echo-category-title-reverted' => '{{PLURAL:$1|Pembalikan}} suntingan',
	'echo-category-title-mention' => '{{PLURAL:$1|Sebutan}}',
	'echo-category-title-other' => '{{PLURAL:$1|Lainnya}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistem}}',
	'echo-pref-tooltip-edit-user-talk' => 'Beritahu saya saat seseorang mengirim pesan atau balasan pada halaman pembicaraan saya.',
	'echo-pref-tooltip-article-linked' => 'Beritahu saya saat seseorang membuat pranala di halaman artikel ke sebuah halaman yang pernah saya rintis.',
	'echo-pref-tooltip-reverted' => 'Beritahu saya saat seseorang membalikkan suntingan yang pernah saya buat, dengan menggunakan alat batalkan atau balikkan.',
	'echo-pref-tooltip-mention' => 'Beritahu saya saat seseorang membuat pranala di halaman pembicaraan apapun ke halaman pengguna saya.',
	'echo-no-agent' => '[Tidak seorang pun]',
	'echo-no-title' => '[Tidak ada halaman]',
	'echo-error-no-formatter' => 'Tidak ada pemformatan yang ditetapkan untuk pemberitahuan.',
	'echo-error-preference' => 'Galat: Tidak dapat menetapkan preferensi pengguna.',
	'echo-error-token' => 'Galat: Tidak dapat mengambil token pengguna.',
	'notifications' => 'Pemberitahuan',
	'tooltip-pt-notifications' => 'Pemberitahuan Anda',
	'echo-specialpage' => 'Pemberitahuan',
	'echo-anon' => 'Untuk menerima pemberitahuan, [$1 buat sebuah akun] atau [$2 masuk log].',
	'echo-none' => 'Anda tidak memiliki pemberitahuan.',
	'echo-more-info' => 'Informasi selengkapnya',
	'echo-feedback' => 'Umpan balik',
	'notification-link-text-view-message' => 'Lihat pesan',
	'notification-link-text-view-mention' => 'Lihat sebutan',
	'notification-link-text-view-changes' => 'Lihat perubahan',
	'notification-link-text-view-page' => 'Lihat halaman',
	'notification-link-text-view-edit' => 'Lihat suntingan',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|meninggalkan}} sebuah pesan pada [[User talk:$2#$3|halaman pembicaraan]] Anda.',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|meninggalkan}} sebuah pesan pada halaman pembicaraan Anda di [[User talk:$2#$3|$4]].',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|meninggalkan}} sebuah pesan pada [[User talk:$2#$3|halaman pembicaraan]] Anda.',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|meninggalkan}} sebuah pesan pada halaman pembicaraan Anda di [[User talk:$2#$3|$4]].',
	'notification-page-linked' => 'Pranala ke [[:$2]] {{GENDER:$1|ditambahkan}} di [[:$3]]. [[Special:WhatLinksHere/$2|Lihat semua pranala balik ke halaman ini]].',
	'notification-page-linked-flyout' => 'Pranala ke $2 {{GENDER:$1|ditambahkan}} di [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|mengomentari}} "[[$3|$2]]" pada halaman pembicaraan "$4".',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|mengirimkan}} sebuah topik baru "$2" di [[$3]].',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|mengirimi}} Anda sebuah pesan: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|mengomentari}} "[[$3#$2|$2]]" pada halaman pembicaraan Anda.',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|menyebut}} Anda di "[[$3#$2|$4]]" pada halaman pembicaraan $5.',
	'notification-mention-flyout' => '$1 {{GENDER:$1|menyebut}} Anda di "[[$3#$2|$4]]" pada halaman pembicaraan $5.',
	'notification-user-rights' => 'Hak pengguna Anda [[Special:Log/rights/$1|telah {{GENDER:$1|diubah}}]] oleh [[User:$1|$1]]. $2. [[Special:ListGroupRights|Pelajari selengkapnya]]',
	'notification-user-rights-flyout' => 'Hak pengguna Anda telah {{GENDER:$1|diubah}} oleh $1. $2. [[Special:ListGroupRights|Pelajari selengkapnya]]',
	'notification-user-rights-add' => 'Anda sekarang adalah anggota dari {{PLURAL:$2|kelompok berikut}}: $1',
	'notification-user-rights-remove' => 'Anda tidak lagi menjadi anggota dari {{PLURAL:$2|kelompok berikut}}: $1',
	'notification-new-user' => 'Selamat datang di {{SITENAME}}, $1! Kami senang Anda hadir di sini.',
	'notification-reverted2' => '{{PLURAL:$4|Suntingan Anda pada [[:$2]] telah}} {{GENDER:$1|dibalikkan}} oleh [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Suntingan Anda pada $2 telah}} {{GENDER:$1|dibalikkan}} oleh $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|meninggalkan}} Anda sebuah pesan di {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|meninggalkan}} sebuah pesan pada halaman pembicaraan Anda:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|meninggalkan}} sebuah pesan di "$2" pada halaman pembicaraan Anda.',
	'notification-page-linked-email-subject' => 'Pranala ke halaman Anda ditambahkan di {{SITENAME}}',
	'notification-page-linked-email-batch-body' => 'Pranala ke $2 {{GENDER:$1|ditambahkan}} di $3.',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Suntingan}} Anda telah {{GENDER:$1|dibalikkan}} di {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|suntingan Anda pada $2 telah}} {{GENDER:$1|dibalikkan}} oleh $1.',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|menyebut}} Anda di {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|menyebut}} Anda di "$3" pada halaman pembicaraan $4.',
	'notification-user-rights-email-subject' => 'Hak pengguna Anda telah diubah di {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Hak pengguna Anda telah {{GENDER:$1|diubah}} oleh $1. $2.',
	'echo-email-subject-default' => 'Pemberitahuan baru di {{SITENAME}}',
	'echo-email-body-default' => 'Anda memiliki pemberitahuan baru di {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Anda memiliki pemberitahuan baru.',
	'echo-email-footer-default' => '$2

Untuk mengendalikan surel mana saja yang akan kami kirimkan kepada Anda, periksa preferensi Anda:
{{canonicalurl: {{#special:Preferences}} #mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Untuk mengendalikan surel mana saja yang akan kami kirimkan kepada Anda, <a href="$2" style="text-decoration:none; color: #3868B0;">periksa preferensi Anda</a>.<br />
$1',
	'echo-overlay-link' => 'Semua pemberitahuan',
	'echo-overlay-title' => '<b>Pemberitahuan</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Pemberitahuan}}</b> (menampilkan $1 dari $2 yang belum dibaca)',
	'echo-mark-all-as-read' => 'Tandai semua sebagai telah dibaca',
	'echo-date-today' => 'Hari ini',
	'echo-date-yesterday' => 'Kemarin',
	'echo-load-more-error' => 'Terjadi galat saat mengambil hasil selengkapnya.',
	'notification-edit-talk-page-bundle' => '$1 dan $3 pengguna {{PLURAL:$4|lainnya}} {{GENDER:$1|meninggalkan}} sebuah pesan pada [[User talk:$2|halaman pembicaraan]] Anda.',
	'notification-page-linked-bundle' => 'Pranala ke $2 {{GENDER:$1|ditambahkan}} di $3 dan $4 {{PLURAL:$5|halaman}} lainnya. [[Special:WhatLinksHere/$2|Lihat semua pranala balik ke halaman ini]].',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 dan $2 pengguna {{PLURAL:$3|lainnya}} {{GENDER:$1|meninggalkan}} sebuah pesan pada halaman pembicaraan Anda.',
	'notification-page-linked-email-batch-bundle-body' => 'Pranala ke $2 {{GENDER:$1|ditambahkan}} di $3 dan $4 {{PLURAL:$5|halaman}} lainnya.',
	'echo-email-batch-subject-daily' => 'Anda memiliki {{PLURAL:$2|sebuah|beberapa}} pemberitahuan baru di {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Anda memiliki {{PLURAL:$2|sebuah|beberapa}} pemberitahuan baru di {{SITENAME}} pekan ini',
	'echo-email-batch-body-intro-daily' => 'Hai $1,
Ini adalah ringkasan aktivitas kegiatan hari ini di {{SITENAME}} untuk Anda.',
	'echo-email-batch-body-intro-weekly' => 'Hai $1,
Ini adalah ringkasan aktivitas kegiatan pekan ini di {{SITENAME}} untuk Anda.',
	'echo-email-batch-link-text-view-all-notifications' => 'Tampilkan semua pemberitahuan',
	'echo-rev-deleted-text-view' => 'Revisi halaman ini telah ditekan.',
);

/** Igbo (Igbo)
 * @author Ukabia
 */
$messages['ig'] = array(
	'echo-date-today' => 'Ta',
	'echo-date-yesterday' => 'Nnyáfụ̀',
);

/** Iloko (Ilokano)
 * @author Lam-ang
 */
$messages['ilo'] = array(
	'echo-desc' => 'Sistema dagiti pakaammo',
	'prefs-echo' => 'Dagiti pakaammo',
	'prefs-emailsettings' => 'Pagpilian ti esurat',
	'prefs-displaynotifications' => 'Ipakita dagiti pagpilian',
	'prefs-echosubscriptions' => 'Pakammuannak ti maipanggep kadagitoy a pasamak',
	'prefs-newmessageindicator' => 'Baro a panangipakita ti mensahe',
	'echo-pref-send-me' => 'Patulodannak:',
	'echo-pref-send-to' => 'Ipatulod kenni:',
	'echo-pref-email-format' => 'Pormat ti esurat:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Esurat',
	'echo-pref-email-frequency-never' => 'Saannak a patulodan kadagiti aniaman a pakaammo ti esurat',
	'echo-pref-email-frequency-immediately' => 'Dagiti agmaymaysa a pakaaamo a kas um-umayda',
	'echo-pref-email-frequency-daily' => 'Ti inaldaw a pakapukpukan dagiti pakaammo',
	'echo-pref-email-frequency-weekly' => 'Ti linawas a pakapukpukan dagiti pakaammo',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Naranas a testo',
	'echo-pref-notify-show-link' => 'Ipakita dagiti pakaammo iti baras ti ramitko',
	'echo-pref-new-message-indicator' => 'Iparang ti panangipakita ti mensahe ti tungtungan a panid iti baras ti ramitko',
	'echo-learn-more' => 'Agadal pay ti adu',
	'echo-new-messages' => 'Adda dagiti baro a mensahem',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Ti mensahe|Dagiti mensahe}} ti tungtungan a panid',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Ti silpo|Dagiti silpo}} ti panid',
	'echo-category-title-reverted' => '{{PLURAL:$1|Ti naisubli|Dagiti naisubli}} nga inurnos',
	'echo-category-title-mention' => '{{PLURAL:$1|Naibaga|Naibagbaga}}',
	'echo-category-title-other' => '{{PLURAL:$1|Sabali}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistema}}',
	'echo-pref-tooltip-edit-user-talk' => 'Pakaammuannak no adda agipablaak ti mensahe wenno sumungbat iti tungtungan a panidko.',
	'echo-pref-tooltip-article-linked' => 'Pakaammuannak no adda mangisilpo iti panid a pinartuatko manipud ti maysa a panid ti artikulo.',
	'echo-pref-tooltip-reverted' => 'Pakaammuannak no adda mangisubli ti inurnosko, babaen ti panag-usar ti ramit ti panagukas wenno panangisubli.',
	'echo-pref-tooltip-mention' => 'Pakaammuannak no adda mangisilpo iti panidko manipud ti aniaman a tungtungan a panid.',
	'echo-no-agent' => '[Awan ti sinoman]',
	'echo-no-title' => '[Awan ti panid]',
	'echo-error-no-formatter' => 'Awan ti naipalawag a panagporma para iti pakaammo.',
	'echo-error-preference' => 'Biddut: Saan a maiyasentar ti kakaykayatan ti agar-aramat.',
	'echo-error-token' => 'Biddut: Saan a maala ti tandaan ti agar-aramat.',
	'notifications' => 'Dagiti pakaammo',
	'tooltip-pt-notifications' => 'Dagiti pakaammom',
	'echo-specialpage' => 'Dagiti pakaammo',
	'echo-anon' => 'Tapno makaawat kadagiti pakaammo, [$1 agpartuat ti pakabilangan] wenno [$2 sumrek].',
	'echo-none' => 'Awan dagiti pakaammom.',
	'echo-more-info' => 'Adu pay a pakaammo',
	'echo-feedback' => 'Feedback',
	'notification-link-text-view-message' => 'Kitaen ti mensahe',
	'notification-link-text-view-mention' => 'Kitaen ti naibaga',
	'notification-link-text-view-changes' => 'Kitaen dagiti sinukatan',
	'notification-link-text-view-page' => 'Kitaen ti panid',
	'notification-link-text-view-edit' => 'Kitaen ti inurnos',
	'notification-edit-talk-page2' => 'Ni [[User:$1|$1]] ket {{GENDER:$1|nangibati}} ti mensahe idiay [[User talk:$2#$3|tungtungam a panid]].',
	'notification-edit-talk-page-with-section' => 'Ni [[User:$1|$1]] ket {{GENDER:$1|nangibati}} ti mensahe idiay tungtungam a panid idiay "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => 'Ni $1 ket {{GENDER:$1|nangibati}} ti mensahe a idiay [[User talk:$2#$3|tungtungam a panid]].',
	'notification-edit-talk-page-flyout-with-section' => 'Ni $1 ket {{GENDER:$1|nangibati}} ti mensahe idiay tungtungam a panid idiay "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => 'Ti [[:$2]] ket {{GENDER:$1|naisilpo}} manipud ti [[:$3]]. [[Special:WhatLinksHere/$2|Kitaen amin dagiti silpo iti daytoy a panid]].',
	'notification-page-linked-flyout' => 'Ti $2 ket {{GENDER:$1|naisilpo}} manipud ti [[:$3]].',
	'notification-add-comment2' => 'Ni [[User:$1|$1]] ket {{GENDER:$1|nagkomentario}} iti "[[$3|$2]]" iti tungtungan a panid ti "$4".',
	'notification-add-talkpage-topic2' => 'Ni [[User:$1|$1]] ket {{GENDER:$1|nangipablaak}} ti baro a topiko ti "$2" iti [[$3]].',
	'notification-add-talkpage-topic-yours2' => 'Ni [[User:$1|$1]] ket {{GENDER:$1|pinatulodannaka}} ti mensahe: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => 'Ni [[User:$1|$1]] ken {{GENDER:$1|nagkomentario}} iti "[[$3#$2|$2]]" idiay tungtungam a panid.',
	'notification-mention' => 'Ni [[User:$1|$1]] ket {{GENDER:$1|inbaganaka}} iti tungtungan a panid ti $5 iti "[[$3#$2|$4]]".',
	'notification-mention-flyout' => 'Ni $1 ket {{GENDER:$1|inbaganaka}} iti tungtungan a panid ti $5 iti "[[$3#$2|$4]]".',
	'notification-mention-nosection' => 'Ni [[User:$1|$1]] ket {{GENDER:$1|inbaganaka}} idiay [[$3|$2 a tungtungan a panid]].',
	'notification-mention-nosection-flyout' => 'Ni $1 ket {{GENDER:$1|inbaganaka}} idiay [[$3|$2 a tungtungan a panid]].',
	'notification-user-rights' => 'Dagiti karbengam nga agar-aramat [[Special:Log/rights/$1|ket {{GENDER:$1|binaliwan}}]] babaen ni [[User:$1|$1]]. $2. [[Special:ListGroupRights|Agadal pay ti adu]]',
	'notification-user-rights-flyout' => 'Dagiti karbengam nga agar-aramat ket {{GENDER:$1|binaliwan}} babaen ni $1. $2. [[Special:ListGroupRights|Agadal pay ti adu]]',
	'notification-user-rights-add' => 'Kamengka itan {{PLURAL:$2|iti daytoy a grupo|kadagitoy a grupo}}: $1',
	'notification-user-rights-remove' => 'Saankan a kameng {{PLURAL:$2|iti daytoy a grupo|kadagitoy a grupo}}: $1',
	'notification-new-user' => 'Naragsak nga isasangbay iti {{SITENAME}}, $1! Maragsakankami nga addaka ditoy.',
	'notification-reverted2' => 'Ti {{PLURAL:$4|inurnosmo iti [[:$2]] ket|inur-urnosmo iti [[:$2]] ket}} {{GENDER:$1|naisubli}} babaen ni [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => 'Ti {{PLURAL:$4|inurnosmo iti $2 ket|inur-urnosmo iti $2 ket}} {{GENDER:$1|naisubli}} babaen ni $1. $3',
	'notification-edit-talk-page-email-subject2' => 'Ni $1 ket {{GENDER:$1|nangibati}} kenka ti mensahe idiay {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => 'Ni $1 ket {{GENDER:$1|nangibati}} ti mensahe idiay tungtungam a panid:',
	'notification-edit-talk-page-email-batch-body-with-section' => 'Ni $1 ket {{GENDER:$1|nangibati}} ti mensahe idiay tungtungam a panid iti "$2".',
	'notification-page-linked-email-subject' => 'Ti panidmo ket naisilpo idiay {{SITENAME}}',
	'notification-page-linked-email-batch-body' => 'Ti $2 ket {{GENDER:$1|naisilpo}} manipud iti $3.',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Ti inurnosmo ket|Dagiti inurnosmo ket}} {{GENDER:$1|naisubli}} idiay {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Ti inurnosmo iti $2 ket|Dagiti inurnosmo iti $2 ket}} {{GENDER:$1|insubli}} babaen ni $1.',
	'notification-mention-email-subject' => 'Ni $1 {{GENDER:$1|inbaganaka}} idiay {{SITENAME}}',
	'notification-mention-email-batch-body' => 'Ni $1 {{GENDER:$1|inbaganaka}} idiay tungtungan a panid ti $4 iti "$3".',
	'notification-mention-nosection-email-batch-body' => 'Ni $1 ket {{GENDER:$1|inbaganaka}} idiay $2 a tungtungan a panid.',
	'notification-user-rights-email-subject' => 'Dagiti karbengam nga agar-aramat ket nabaliwan idiay {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Dagiti karbengam nga agar-aramat ket {{GENDER:$1|binaliwan}} babaen ni $1. $2.',
	'echo-email-subject-default' => 'Baro a pakaammo idiay {{SITENAME}}',
	'echo-email-body-default' => 'Adda baro a pakaammom idiay {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Adda baro a pakaammom.',
	'echo-email-footer-default' => '$2

Ti mangtengngel no ania dagiti esurat nga ipatulodmi kenka, kitaem dagiti kakaykayatam:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Ti mangtengngel no ania dagiti esurat nga ipatulodmi kenka, <a href="$2" style="text-decoration:none; color: #3868B0;">kitaem dagiti kakaykayatam</a>.<br />
$1',
	'echo-overlay-link' => 'Dagiti amin a pakaaammo',
	'echo-overlay-title' => '<b>Dagiti pakaammo</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Dagiti pakaammo}}</b> (agipakpakita ti $1 iti $2 a saan pay a nabasa)',
	'echo-mark-all-as-read' => 'Markaan amin a kas nabasa',
	'echo-date-today' => 'Ita nga aldaw',
	'echo-date-yesterday' => 'Idi kalman',
	'echo-load-more-error' => 'Adda biddut a rimsua bayat nga agal-ala kadagiti ad-adu a resulta.',
	'notification-edit-talk-page-bundle' => 'Ni $1 ken $3 a {{PLURAL:$4|sabali|sabsabali}} ket {{GENDER:$1|nangibati}} ti mensahe idiay [[User talk:$2|tungtungam a panid]].',
	'notification-page-linked-bundle' => 'Ti $2 ket {{GENDER:$1|naisilpo}} manipud ti $3 ken ti $4 a sabali a {{PLURAL:$5|panid|pampanid}}. [[Special:WhatLinksHere/$2|Kitaen amin dagiti silpo iti daytoy a panid]]',
	'notification-edit-user-talk-email-batch-bundle-body' => 'Ni $1 ken $2 a {{PLURAL:$3|sabali|sabsabali}} ket {{GENDER:$1|nangibati}} ti mensahe idiay tungtungam a panid.',
	'notification-page-linked-email-batch-bundle-body' => 'Ti $2 ket {{GENDER:$1|naisilpo}} manipud ti $3 ken $4 a sabali a {{PLURAL:$5|panid|pampanid}}.',
	'echo-email-batch-subject-daily' => 'Addaanka {{PLURAL:$2|ti baro a pakaammo|kadagiti baro a pakaammo}} idiay {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Addaanka {{PLURAL:$2|ti baro a pakaammo|kadagiti baro a pakaammo}} idiay {{SITENAME}} ita a lawas',
	'echo-email-batch-body-intro-daily' => 'Kumusta $1,
Adda ditoy ti pakapukpukan ti aktibidad ita nga aldaw idiay {{SITENAME}} para kenka.',
	'echo-email-batch-body-intro-weekly' => 'Kumusta $1,
Adda ditoy ti pakapukpukan ti aktibidad ita a lawas idiay {{SITENAME}} para kenka.',
	'echo-email-batch-link-text-view-all-notifications' => 'Kitaen amin dagiti pakaammo',
	'echo-rev-deleted-text-view' => 'Daytoy a panagbaliw ti panid ket napasardengen.',
);

/** Icelandic (íslenska)
 * @author Snævar
 * @author පසිඳු කාවින්ද
 */
$messages['is'] = array(
	'echo-desc' => 'Tilkynninga kerfi',
	'prefs-echo' => 'Tilkynningar',
	'prefs-emailsettings' => 'Tölvupósts stillingar',
	'prefs-displaynotifications' => 'Útlits möguleikar',
	'prefs-echosubscriptions' => 'Gefðu mér tilkynningar fyrir eftirfarandi viðburði',
	'echo-pref-send-me' => 'Sentu mér:',
	'echo-pref-send-to' => 'Senda til:',
	'echo-pref-email-format' => 'Stílviðmið tölvupósts:',
	'echo-pref-web' => 'Á netinu',
	'echo-pref-email' => 'Með tölvupósti',
	'echo-pref-email-frequency-never' => 'Ekki senda mér tilkynningar í tölvupósti',
	'echo-pref-email-frequency-immediately' => 'Einstakar tilkynningar um leið og þær koma',
	'echo-pref-email-frequency-daily' => 'Daglegt yfirlit yfir tilkynningar',
	'echo-pref-email-frequency-weekly' => 'Vikulegt yfirlit yfir tilkynningar',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'óstílfærður texti',
	'echo-pref-notify-show-link' => 'Sýna tilkynningar í verkfærastiku',
	'echo-new-messages' => 'Þú hefur ný skilaboð',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Skilaboð|Skilaboð}} á spjallsíðu', # Fuzzy
	'echo-category-title-article-linked' => '{{PLURAL:$1|Tengil|Tengla}} á síðum',
	'echo-category-title-other' => '{{PLURAL:$1|Annað}}',
	'echo-pref-tooltip-edit-user-talk' => 'Tilkynntu mig um þegar einhver skilur eftir skilaboð eða svarar skilaboðum á spjallsíðunni minni.',
	'echo-no-agent' => '[Enginn]',
	'echo-no-title' => '[Engin síða]',
	'echo-error-no-formatter' => 'Engin stílviðmið tilgreind fyrir tilkynningum.',
);

/** Italian (italiano)
 * @author Beta16
 * @author Darth Kule
 * @author Eleonora negri
 * @author Elitre
 * @author Nemo bis
 * @author Pietrodn
 * @author Raoli
 * @author Vituzzu
 */
$messages['it'] = array(
	'echo-desc' => 'Sistema di notifica',
	'prefs-echo' => 'Notifiche',
	'prefs-emailsettings' => 'Opzioni email',
	'prefs-displaynotifications' => 'Opzioni di visualizzazione',
	'prefs-echosubscriptions' => 'Inviami una notifica su questi eventi',
	'prefs-newmessageindicator' => 'Barra dei nuovi messaggi',
	'echo-pref-send-me' => 'Inviami:',
	'echo-pref-send-to' => 'Invia a:',
	'echo-pref-email-format' => 'Formato email:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Email',
	'echo-pref-email-frequency-never' => 'Non inviarmi alcuna notifica via e-mail',
	'echo-pref-email-frequency-immediately' => 'Notifiche singole per ogni evento',
	'echo-pref-email-frequency-daily' => 'Un riepilogo giornaliero delle notifiche',
	'echo-pref-email-frequency-weekly' => 'Un riepilogo settimanale delle notifiche',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Testo normale',
	'echo-pref-notify-show-link' => 'Visualizza le notifiche nella mia barra degli strumenti',
	'echo-pref-new-message-indicator' => 'Notificami i nuovi messaggi nella mia discussione con un avviso nella mia barra degli strumenti',
	'echo-learn-more' => 'Ulteriori informazioni',
	'echo-new-messages' => 'Hai nuovi messaggi',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Messaggio|Messaggi}} sulla pagina di discussione',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Collegamento|Collegamenti}} a una pagina',
	'echo-category-title-reverted' => '{{PLURAL:$1|Modifica annullata|Modifiche annullate}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Menzione|Menzioni}}',
	'echo-category-title-other' => '{{PLURAL:$1|Altro}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistema}}',
	'echo-pref-tooltip-edit-user-talk' => 'Avvisami quando qualcuno mi scrive un messaggio o risponde nella mia pagina di discussione.',
	'echo-pref-tooltip-article-linked' => 'Avvisami quando qualcuno collega, da una voce, una pagina che ho creato.',
	'echo-pref-tooltip-reverted' => 'Avvisami quando qualcuno annulla una modifica che ho fatto, usando le funzioni annulla o rollback.',
	'echo-pref-tooltip-mention' => 'Avvisami quando qualcuno collega la mia pagina utente da una qualsiasi pagina di discussione.',
	'echo-no-agent' => '[Nessuno]',
	'echo-no-title' => '[Nessuna pagina]',
	'echo-error-no-formatter' => 'Nessuna formattazione definita per le notifiche',
	'echo-error-preference' => "Errore: impossibile impostare le preferenze dell'utente",
	'echo-error-token' => 'Errore: impossibile recuperare token utente',
	'notifications' => 'Notifiche',
	'tooltip-pt-notifications' => 'Tutte le notifiche',
	'echo-specialpage' => 'Notifiche',
	'echo-anon' => 'Per ricevere le notifiche, [$1 registrati] o [$2 accedi].',
	'echo-none' => 'Non hai notifiche.',
	'echo-more-info' => 'Altre informazioni',
	'echo-feedback' => 'Commenti',
	'notification-link-text-view-message' => 'Vedi messaggio',
	'notification-link-text-view-mention' => 'Vedi menzione',
	'notification-link-text-view-changes' => 'Vedi modifiche',
	'notification-link-text-view-page' => 'Vedi pagina',
	'notification-link-text-view-edit' => 'Vedi modifica',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|ha lasciato}} un messaggio sulla tua [[User talk:$2#$3|pagina di discussione]].',
	'notification-edit-talk-page-with-section' => "[[User:$1|$1]] {{GENDER:$1|ha lasciato}} un messaggio nella tua pagina di discussione in '[[User talk:$2#$3|$4]]'.",
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|ha lasciato}} un messaggio sulla tua [[User talk:$2#$3|pagina di discussione]].',
	'notification-edit-talk-page-flyout-with-section' => "$1 {{GENDER:$1|ha lasciato}} un messaggio nella tua pagina di discussione in '[[User talk:$2#$3|$4]]'.",
	'notification-page-linked' => '[[:$2]] è stata {{GENDER:$1|collegata}} da [[:$3]]. [[Special:WhatLinksHere/$2|Vedi tutti i collegamenti a questa pagina]].',
	'notification-page-linked-flyout' => '$2 è stata {{GENDER:$1|collegata}} da [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|ha lasciato un commento}} riguardo a "[[$3|$2]]" nella pagina di discussione di "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|ha aggiunto}} un nuovo argomento "$2" su [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] ti {{GENDER:$1|ha inviato}} un messaggio: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|ha lasciato un commento}} riguardo a "[[$3#$2|$2]]" nella tua pagina di discussione',
	'notification-mention' => "[[User:$1|$1]] ti ha {{GENDER:$1|menzionato|menzionata|menzionato/a}} sulla pagina di discussione di $5 in '[[$3#$2|$4]]'.",
	'notification-mention-flyout' => "$1 ti ha {{GENDER:$1|menzionato|menzionata|menzionato/a}} sulla pagina di discussione di $5 in '[[$3#$2|$4]]'.",
	'notification-mention-nosection' => '[[User:$1|$1]] ti {{GENDER:$1|ha menzionato}} nella [[$3|pagina di discussione $2]].',
	'notification-mention-nosection-flyout' => '$1 ti {{GENDER:$1|ha menzionato}} nella [[$3|pagina di discussione $2]].',
	'notification-user-rights' => 'I tuoi diritti utente [[Special:Log/rights/$1|sono stati {{GENDER:$1|modificati}}]] da [[User:$1|$1]]. $2. [[Special:ListGroupRights|Ulteriori informazioni]]',
	'notification-user-rights-flyout' => 'I tuoi diritti utente sono stati {{GENDER:$1|modificati}} da $1. $2. [[Special:ListGroupRights|Ulteriori informazioni]]',
	'notification-user-rights-add' => 'Ora sei membro di {{PLURAL:$2|questo gruppo|questi gruppi}}: $1',
	'notification-user-rights-remove' => 'Non sei più membro di {{PLURAL:$2|questo gruppo|questi gruppi}}: $1',
	'notification-new-user' => 'Benvenuto su {{SITENAME}}, $1! Siamo felici che tu sia qui.',
	'notification-reverted2' => '{{PLURAL:$4|La tua modifica|Le tue modifiche}} su [[:$2]] {{PLURAL:$4|è stata annullata|sono state annullate}} {{GENDER:$1|da}} [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|La tua modifica|Le tue modifiche}} su $2 {{PLURAL:$4|è stata annullata|sono state annullate}} {{GENDER:$1|da}} $1 $3',
	'notification-edit-talk-page-email-subject2' => '$1 ti {{GENDER:$1|ha lasciato}} un messaggio in {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|ha lasciato}} un messaggio sulla tua pagina di discussione:',
	'notification-edit-talk-page-email-batch-body-with-section' => "$1 {{GENDER:$1|ha lasciato}} un messaggio sulla tua pagina di discussione in '$2'.",
	'notification-page-linked-email-subject' => 'Una pagina che hai creato è stata collegata su {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2 è stata {{GENDER:$1|collegata}} da $3',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|La tua modifica è stata annullata|Le tue modifiche sono state annullate}} {{GENDER:$1|su}} {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|La tua modifica|Le tue modifiche}} su $2 {{PLURAL:$3|è stata annullata|sono state annullate}} {{GENDER:$1|da}} $1',
	'notification-mention-email-subject' => '$1 ti ha {{GENDER:$1|menzionato|menzionata|menzionato/a}} su {{SITENAME}}',
	'notification-mention-email-batch-body' => "$1 ti ha {{GENDER:$1|menzionato|menzionata|menzionato/a}} sulla pagina di discussione di $4 in '$3'.",
	'notification-mention-nosection-email-batch-body' => '$1 ti {{GENDER:$1|ha menzionato}} nella pagina di discussione $2.',
	'notification-user-rights-email-subject' => 'I tuoi diritti utente sono stati modificati su {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'I tuoi diritti utente sono stati {{GENDER:$1|modificati}} da $1. $2',
	'echo-email-subject-default' => 'Nuova notifica su {{SITENAME}}',
	'echo-email-body-default' => 'Hai una nuova notifica su {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Hai una nuova notifica',
	'echo-email-footer-default' => '$2

Per controllare quali email ti verranno inviate, controlla le tue preferenze:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Per verificare quali email ti vengono inviate, <a href="$2" style="text-decoration:none; color: #3868B0;">controlla le tue preferenze</a><br />
$1',
	'echo-overlay-link' => 'Tutte le notifiche',
	'echo-overlay-title' => '<b>Notifiche</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Notifica|Notifiche}}</b> (mostrate $1 di $2 non lette)',
	'echo-mark-all-as-read' => 'Segna tutte come lette',
	'echo-date-today' => 'Oggi',
	'echo-date-yesterday' => 'Ieri',
	'echo-load-more-error' => 'Si è verificato un errore nel recupero di ulteriori risultati.',
	'notification-edit-talk-page-bundle' => '$1 e {{PLURAL:$4|un altro utente|altri $3 utenti}} {{GENDER:$1|hanno lasciato}} un messaggio nella tua [[User talk:$2|pagina di discussione]].',
	'notification-page-linked-bundle' => '$2 è stata {{GENDER:$1|collegata}} da $3 ed {{PLURAL:$5|un altra pagina|altre $4 pagine}}. [[Special:WhatLinksHere/$2|Vedi tutti i collegamenti a questa pagina]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 e {{PLURAL:$3|un altro|altri $2}} {{GENDER:$1|hanno lasciato}} un messaggio sulla tua pagina di discussione',
	'notification-page-linked-email-batch-bundle-body' => '$2 è stata {{GENDER:$1|collegata}} da $3 ed {{PLURAL:$5|un altra pagina|altre $4 pagine}}',
	'echo-email-batch-subject-daily' => 'Hai {{PLURAL:$2|una nuova notifica|nuove notifiche}} su {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Hai {{PLURAL:$2|una nuova notifica|nuove notifiche}} su {{SITENAME}} questa settimana',
	'echo-email-batch-body-intro-daily' => 'Ciao $1,
eccoti una sintesi delle attività di oggi su {{SITENAME}}.',
	'echo-email-batch-body-intro-weekly' => 'Ciao $1,
eccoti una sintesi delle attività di questa settimana su {{SITENAME}}.',
	'echo-email-batch-link-text-view-all-notifications' => 'Vedi tutte le notifiche',
	'echo-rev-deleted-text-view' => 'Questa versione della pagina è stata soppressa',
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
	'prefs-newmessageindicator' => '新着メッセージの表示',
	'echo-pref-send-me' => '受け取る頻度:',
	'echo-pref-send-to' => '送信先:',
	'echo-pref-email-format' => 'メールの形式:',
	'echo-pref-web' => 'ウェブ',
	'echo-pref-email' => 'メール',
	'echo-pref-email-frequency-never' => '通知メールを何も受け取らない',
	'echo-pref-email-frequency-immediately' => '個別の通知が来るたび',
	'echo-pref-email-frequency-daily' => '通知を1日ごとに要約',
	'echo-pref-email-frequency-weekly' => '通知を1週間ごとに要約',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'プレーンテキスト',
	'echo-pref-notify-show-link' => '通知をツールバーに表示',
	'echo-pref-new-message-indicator' => 'トークページのメッセージの未読数をツールバーに表示',
	'echo-learn-more' => '詳細',
	'echo-new-messages' => '新着メッセージがあります',
	'echo-category-title-edit-user-talk' => 'トークページヘの{{PLURAL:$1|メッセージ}}',
	'echo-category-title-article-linked' => 'ページへの{{PLURAL:$1|リンク}}',
	'echo-category-title-reverted' => '編集の{{PLURAL:$1|差し戻し}}',
	'echo-category-title-mention' => '{{PLURAL:$1|言及}}',
	'echo-category-title-other' => '{{PLURAL:$1|その他}}',
	'echo-category-title-system' => '{{PLURAL:$1|システム}}',
	'echo-pref-tooltip-edit-user-talk' => '誰かが私のトークページでメッセージの投稿または返信をしたときに通知する。',
	'echo-pref-tooltip-article-linked' => '誰かが私が作成したページに記事からリンクしたときに通知する。',
	'echo-pref-tooltip-reverted' => '誰かが取り消しや巻き戻しの機能で私の編集を差し戻したときに通知する。',
	'echo-pref-tooltip-mention' => '誰かが私の利用者ページにどこかのトークページからリンクしたときに通知する。',
	'echo-no-agent' => '[送信者なし]',
	'echo-no-title' => '[ページなし]',
	'echo-error-no-formatter' => '通知の書式が定義されていません。',
	'echo-error-preference' => 'エラー: 個人設定を変更できませんでした。',
	'echo-error-token' => 'エラー: 利用者トークンを取得できませんでした。',
	'notifications' => '通知',
	'tooltip-pt-notifications' => '自分の通知',
	'echo-specialpage' => '通知',
	'echo-anon' => '通知を受け取るには、[$1 アカウント作成]または[$2 ログイン]をしてください。',
	'echo-none' => '通知はありません。',
	'echo-more-info' => '詳細情報',
	'echo-feedback' => 'フィードバック',
	'echo-quotation-marks' => '「$1」',
	'notification-link-text-view-message' => 'メッセージを閲覧',
	'notification-link-text-view-mention' => '言及を閲覧',
	'notification-link-text-view-changes' => '差分を閲覧',
	'notification-link-text-view-page' => 'ページを閲覧',
	'notification-link-text-view-edit' => '編集内容を閲覧',
	'notification-edit-talk-page2' => '[[User:$1|$1]] があなたの[[User talk:$2#$3|トークページ]]にメッセージを{{GENDER:$1|投稿しました}}。',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] があなたのトークページの「[[User talk:$2#$3|$4]]」にメッセージを{{GENDER:$1|投稿しました}}。',
	'notification-edit-talk-page-flyout2' => '$1 があなたの[[User talk:$2#$3|トークページ]]にメッセージを{{GENDER:$1|投稿しました}}。',
	'notification-edit-talk-page-flyout-with-section' => '$1 があなたのトークページの「[[User talk:$2#$3|$4]]」にメッセージを{{GENDER:$1|投稿しました}}。',
	'notification-page-linked' => '[[:$2]] が [[:$3]] から{{GENDER:$1|リンクされました}}。[[Special:WhatLinksHere/$2|このページのリンク元]]',
	'notification-page-linked-flyout' => '$2 が [[:$3]] から{{GENDER:$1|リンクされました}}。',
	'notification-add-comment2' => '[[User:$1|$1]] が「$4」のトークページの「[[$3|$2]]」に{{GENDER:$1|コメントしました}}。',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] が [[$3]] に新しい話題「$2」を{{GENDER:$1|投稿しました}}。',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] があなたにメッセージを{{GENDER:$1|送信しました}}:「[[$3#$2|$2]]」',
	'notification-add-comment-yours2' => '[[User:$1|$1]] があなたのトークページの「[[$3#$2|$2]]」に{{GENDER:$1|コメントしました}}。',
	'notification-mention' => '[[User:$1|$1]] が $5 のトークページの「[[$3#$2|$4]]」であなたに{{GENDER:$1|言及しました}}。',
	'notification-mention-flyout' => '$1 が $5 のトークページの「[[$3#$2|$4]]」であなたに{{GENDER:$1|言及しました}}。',
	'notification-mention-nosection' => '[[User:$1|$1]] が [[$3|$2 のトークページ]]であなたに{{GENDER:$1|言及しました}}。',
	'notification-mention-nosection-flyout' => '$1 が [[$3|$2 のトークページ]]であなたに{{GENDER:$1|言及しました}}。',
	'notification-user-rights' => 'あなたの権限を[[User:$1|$1]]が[[Special:Log/rights/$1|{{GENDER:$1|変更しました}}]]。$2。[[Special:ListGroupRights|詳細はこちら]]',
	'notification-user-rights-flyout' => 'あなたの権限を $1 が{{GENDER:$1|変更しました}}。$2。[[Special:ListGroupRights|詳細はこちら]]',
	'notification-user-rights-add' => 'あなたは{{PLURAL:$2|以下のグループ}}に所属になりました: $1',
	'notification-user-rights-remove' => 'あなたは{{PLURAL:$2|以下のグループ}}の所属から外れました: $1',
	'notification-new-user' => '$1さん、{{SITENAME}}へようこそおいでくださいました。',
	'notification-reverted2' => '{{PLURAL:$4|[[:$2]] でのあなたの編集}}を [[User:$1|$1]] が{{GENDER:$1|差し戻しました}}。$3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|$2 でのあなたの編集}}を $1 が{{GENDER:$1|差し戻しました}}。$3',
	'notification-edit-talk-page-email-subject2' => '{{SITENAME}}で $1 があなたのトークページにメッセージを{{GENDER:$1|投稿しました}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 があなたのトークページにメッセージを{{GENDER:$1|投稿しました}}:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 があなたのトークページの「$2」にメッセージを{{GENDER:$1|投稿しました}}。',
	'notification-page-linked-email-subject' => 'あなたのページが{{SITENAME}}でリンクされました',
	'notification-page-linked-email-batch-body' => '$2 が $3 から{{GENDER:$1|リンクされました}}。',
	'notification-reverted-email-subject2' => '{{SITENAME}}でのあなたの{{PLURAL:$3|編集}}が{{GENDER:$1|差し戻されました}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|$2 でのあなたの編集}}を $1 が{{GENDER:$1|差し戻しました}}。',
	'notification-mention-email-subject' => '$1 が{{SITENAME}}であなたに{{GENDER:$1|言及しました}}',
	'notification-mention-email-batch-body' => '$1 が $4 のトークページの「$3」であなたに{{GENDER:$1|言及しました}}。',
	'notification-mention-nosection-email-batch-body' => '$1 が $2 のトークページであなたに{{GENDER:$1|言及しました}}。',
	'notification-user-rights-email-subject' => '{{SITENAME}}での利用者権限が変更されました',
	'notification-user-rights-email-batch-body' => 'あなたの権限が $1 により{{GENDER:$1|変更されました}}。$2',
	'echo-email-subject-default' => '{{SITENAME}}での新しい通知',
	'echo-email-body-default' => '{{SITENAME}}で新しい通知があります:

$1',
	'echo-email-batch-body-default' => '新しい通知があります。',
	'echo-email-footer-default' => '$2

受け取るメールの設定を変更するには、個人設定をご確認ください:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'お送りするメールの設定を変更するには、<a href="$2" style="text-decoration:none; color: #3868B0;">個人設定を参照してください</a>。<br />
$1',
	'echo-overlay-link' => 'すべての通知',
	'echo-overlay-title' => '<b>通知</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|通知}}</b> (未読 $2 件中 $1 件を表示中)',
	'echo-mark-all-as-read' => 'すべて既読にする',
	'echo-date-today' => '今日',
	'echo-date-yesterday' => '昨日',
	'echo-load-more-error' => '結果の続きを取得する際にエラーが発生しました。',
	'notification-edit-talk-page-bundle' => '$1 と他 $3 {{PLURAL:$4|人}}があなたの[[User talk:$2|トークページ]]にメッセージを{{GENDER:$1|投稿しました}}。',
	'notification-page-linked-bundle' => '$2 が $3 と他 $4 {{PLURAL:$5|件のページ}}から{{GENDER:$1|リンクされました}}。[[Special:WhatLinksHere/$2|このページのリンク元]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 と他 $2 {{PLURAL:$3|人}}があなたのトークページにメッセージを{{GENDER:$1|投稿しました}}。',
	'notification-page-linked-email-batch-bundle-body' => '$2 が $3 と他 $4 {{PLURAL:$5|件のページ}}から{{GENDER:$1|リンクされました}}。',
	'echo-email-batch-subject-daily' => '{{SITENAME}}で{{PLURAL:$2|新たな通知}}が届いています',
	'echo-email-batch-subject-weekly' => '{{SITENAME}}でこの1週間に{{PLURAL:$2|新たな通知}}が届いています',
	'echo-email-batch-body-intro-daily' => 'こんにちは、$1 さん。
これが {{SITENAME}} での今日の出来事をあなたのために要約したものです。',
	'echo-email-batch-body-intro-weekly' => 'こんにちは、$1 さん。
これが {{SITENAME}} での今週の出来事をあなたのために要約したものです。',
	'echo-email-batch-link-text-view-all-notifications' => 'すべての通知を閲覧',
	'echo-rev-deleted-text-view' => 'ページのこの版は秘匿されています。',
);

/** Javanese (Basa Jawa)
 * @author Anggoro
 * @author Bennylin
 * @author NoiX180
 */
$messages['jv'] = array(
	'echo-desc' => 'Sistem pemberitahuan',
	'prefs-echo' => 'Wara-wara',
	'prefs-emailsettings' => 'Opsi layang elektronik',
	'prefs-displaynotifications' => 'Duduhna pilihan',
	'prefs-echosubscriptions' => 'Beritahu saya mengenai peristiwa berikut',
	'prefs-newmessageindicator' => 'Penanda layang anyar',
	'echo-pref-send-me' => 'Kirim nang aku:',
	'echo-pref-send-to' => 'Kirim nang:',
	'echo-pref-email-format' => 'Format layang elektronik:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Layang èlèktronik',
	'echo-pref-email-frequency-never' => 'Ora usah ngirimi aku notifikasi',
	'echo-pref-email-frequency-immediately' => 'Pemberitahuan tunggal setiap suatu peristiwa terjadi',
	'echo-pref-email-frequency-daily' => 'Ringkasan harian dari beberapa pemberitahuan',
	'echo-pref-email-frequency-weekly' => 'Ringkasan mingguan dari beberapa pemberitahuan',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'aksara nglegena',
	'echo-pref-notify-show-link' => 'Tampilkan pemberitahuan di bilah alat saya',
	'echo-pref-new-message-indicator' => 'Tampilkan penanda pesan halaman pembicaraan pada bilah alat saya',
	'echo-learn-more' => 'Sinau luwih',
	'echo-new-messages' => 'Panjenengan olèh pesen-pesen anyar',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Pesan}} halaman pembicaraan',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Pranala|Pranala}} kaca',
	'echo-category-title-reverted' => '{{PLURAL:$1|Balikna|Baliknya}} pangowahan',
	'echo-category-title-mention' => '{{PLURAL:$1|Panyebutan|Panyebutan}}',
	'echo-category-title-other' => '{{PLURAL:$1|Liyane}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistem}}',
	'echo-pref-tooltip-edit-user-talk' => 'Beritahu saya saat seseorang mengirim pesan atau balasan pada halaman pembicaraan saya.',
	'echo-pref-tooltip-article-linked' => 'Beritahu saya saat seseorang membuat pranala di halaman artikel ke sebuah halaman yang pernah saya rintis.',
	'echo-pref-tooltip-reverted' => 'Beritahu saya saat seseorang membalikkan suntingan yang pernah saya buat, dengan menggunakan alat batalkan atau balikkan.',
	'echo-pref-tooltip-mention' => 'Beritahu saya saat seseorang membuat pranala di halaman pembicaraan apapun ke halaman pengguna saya.',
	'echo-no-agent' => '[Dudu sapa-sapa]',
	'echo-no-title' => '[Ora ana kaca]',
	'echo-error-no-formatter' => 'Tidak ada pemformatan yang ditetapkan untuk pemberitahuan.',
	'echo-error-preference' => 'Galat: Tidak dapat menetapkan preferensi pengguna.',
	'echo-error-token' => 'Galat: Tidak dapat mengambil token pengguna.',
	'notifications' => 'Wara-wara',
	'tooltip-pt-notifications' => 'Pemberitahuan Anda',
	'echo-specialpage' => 'Wara-wara',
	'echo-anon' => 'Kanggo nampa wara-wara [$1 gawé akun] utawa [$2 mlebu log].',
	'echo-none' => 'Sampéyan durung nampa wara-wara apa-apa.',
	'echo-more-info' => 'Info jangkep',
	'echo-feedback' => 'Lebon saran',
	'notification-link-text-view-message' => 'Lihat pesan',
	'notification-link-text-view-mention' => 'Lihat sebutan',
	'notification-link-text-view-changes' => 'Tuduhna pangowahan',
	'notification-link-text-view-page' => 'Tuduhna kaca',
	'notification-link-text-view-edit' => 'Tuduhna pangowahan',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|meninggalkan}} sebuah pesan pada [[User talk:$2#$3|halaman pembicaraan]] Anda.',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|meninggalkan}} sebuah pesan pada halaman pembicaraan Anda di [[User talk:$2#$3|$4]].',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|meninggalkan}} sebuah pesan pada [[User talk:$2#$3|halaman pembicaraan]] Anda.',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|meninggalkan}} sebuah pesan pada halaman pembicaraan Anda di [[User talk:$2#$3|$4]].',
	'notification-page-linked' => 'Pranala ke [[:$2]] {{GENDER:$1|ditambahkan}} di [[:$3]]. [[Special:WhatLinksHere/$2|Lihat semua pranala balik ke halaman ini]].',
	'notification-page-linked-flyout' => 'Pranala ke $2 {{GENDER:$1|ditambahkan}} di [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|mengomentari}} "[[$3|$2]]" pada halaman pembicaraan "$4".',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|mengirimkan}} sebuah topik baru "$2" di [[$3]].',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|mengirimi}} Anda sebuah pesan: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|mengomentari}} "[[$3|$2]]" pada halaman pembicaraan "$4".', # Fuzzy
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|menyebut}} Anda di "[[$3#$2|$4]]" pada halaman pembicaraan $5.',
	'notification-mention-flyout' => '$1 {{GENDER:$1|menyebut}} Anda di "[[$3#$2|$4]]" pada halaman pembicaraan $5.',
	'notification-user-rights' => 'Hak pengguna Anda [[Special:Log/rights/$1|telah {{GENDER:$1|diubah}}]] oleh [[User:$1|$1]]. $2. [[Special:ListGroupRights|Pelajari selengkapnya]]',
	'notification-user-rights-flyout' => 'Hak pengguna Anda telah {{GENDER:$1|diubah}} oleh $1. $2. [[Special:ListGroupRights|Pelajari selengkapnya]]',
	'notification-user-rights-add' => 'Anda sekarang adalah anggota dari {{PLURAL:$2|kelompok berikut}}: $1',
	'notification-user-rights-remove' => 'Anda tidak lagi menjadi anggota dari {{PLURAL:$2|kelompok berikut}}: $1',
	'notification-new-user' => 'Selamat datang di {{SITENAME}}, $1! Kami senang Anda hadir di sini.',
	'notification-reverted2' => '{{PLURAL:$4|Suntingan Anda pada [[:$2]] telah}} {{GENDER:$1|dibalikkan}} oleh [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Suntingan Anda pada $2 telah}} {{GENDER:$1|dibalikkan}} oleh $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|meninggalkan}} Anda sebuah pesan di {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|meninggalkan}} sebuah pesan pada halaman pembicaraan Anda:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|meninggalkan}} sebuah pesan di "$2" pada halaman pembicaraan Anda.',
	'notification-page-linked-email-subject' => 'Pranala ke halaman Anda ditambahkan di {{SITENAME}}',
	'notification-page-linked-email-batch-body' => 'Pranala ke $2 {{GENDER:$1|ditambahkan}} di [[:$3]].', # Fuzzy
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Suntingan}} Anda telah {{GENDER:$1|dibalikkan}} di {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$4|Suntingan Anda pada $2 telah}} {{GENDER:$1|dibalikkan}} oleh $1. $3', # Fuzzy
	'notification-mention-email-subject' => '$1 {{GENDER:$1|menyebut}} Anda di {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|menyebut}} Anda di "[[$3#$2|$4]]" pada halaman pembicaraan $5.', # Fuzzy
	'notification-user-rights-email-subject' => 'Hak pengguna Anda telah diubah di {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Hak pengguna Anda telah {{GENDER:$1|diubah}} oleh $1. $2.',
	'echo-email-subject-default' => 'Wara-wara anyar nèng {{SITENAME}}',
	'echo-email-body-default' => 'Sampéyan nduwé wara-wara anyar nèng {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Sampéyan nampa wara-wara anyar.',
	'echo-email-footer-default' => '$2

Untuk mengendalikan surel mana saja yang akan kami kirimkan kepada Anda, periksa preferensi Anda:
{{canonicalurl: {{#special:Preferences}} #mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Untuk mengendalikan surel mana saja yang akan kami kirimkan kepada Anda, <a href="$2" style="text-decoration:none; color: #3868B0;">periksa preferensi Anda</a>.<br />
$1',
	'echo-overlay-link' => 'Kabèh wara-wara',
	'echo-overlay-title' => '<b>Wara-wara</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Pemberitahuan}}</b> (menampilkan $1 dari $2 yang belum dibaca)',
	'echo-mark-all-as-read' => 'Tandhai kabèh minangka kawaca',
	'echo-date-today' => 'Dina iki',
	'echo-date-yesterday' => 'Dina wingi',
	'echo-load-more-error' => 'Ana kasalahan nalika njupuk luwih akèh asil.',
	'notification-edit-talk-page-bundle' => '$1 dan $3 pengguna {{PLURAL:$4|lainnya}} {{GENDER:$1|meninggalkan}} sebuah pesan pada [[User talk:$2|halaman pembicaraan]] Anda.',
	'notification-page-linked-bundle' => 'Pranala ke $2 {{GENDER:$1|ditambahkan}} di $3 dan $4 {{PLURAL:$5|halaman}} lainnya. [[Special:WhatLinksHere/$2|Lihat semua pranala balik ke halaman ini]].',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 dan $2 pengguna {{PLURAL:$3|lainnya}} {{GENDER:$1|meninggalkan}} sebuah pesan pada halaman pembicaraan Anda.',
	'notification-page-linked-email-batch-bundle-body' => 'Pranala ke $2 {{GENDER:$1|ditambahkan}} di $3 dan $4 {{PLURAL:$5|halaman}} lainnya.',
	'echo-email-batch-subject-daily' => 'Anda memiliki {{PLURAL:$2|sebuah|beberapa}} pemberitahuan baru di {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Anda memiliki {{PLURAL:$2|sebuah|beberapa}} pemberitahuan baru di {{SITENAME}} pekan ini',
	'echo-email-batch-body-intro-daily' => 'Hai $1,
Ini adalah ringkasan aktivitas kegiatan hari ini di {{SITENAME}} untuk Anda.',
	'echo-email-batch-body-intro-weekly' => 'Hai $1,
Ini adalah ringkasan aktivitas kegiatan pekan ini di {{SITENAME}} untuk Anda.',
	'echo-email-batch-link-text-view-all-notifications' => 'Tampilkan semua pemberitahuan',
	'echo-rev-deleted-text-view' => 'Revisi halaman ini telah ditekan.',
);

/** Georgian (ქართული)
 * @author David1010
 * @author MIKHEIL
 * @author Nodar Kherkheulidze
 */
$messages['ka'] = array(
	'echo-desc' => 'შეტყობინებების სისტემა',
	'prefs-echo' => 'შეტყობინებები',
	'prefs-emailsettings' => 'ელ-ფოსტის პარამეტრები',
	'prefs-displaynotifications' => 'გამოსახვის პარამეტრები',
	'prefs-echosubscriptions' => 'შემატყობინეთ ამ ღონისძიებების შესახებ',
	'prefs-newmessageindicator' => 'ახალი შეტყობინების ინდიკატორი',
	'echo-pref-send-me' => 'გამომიგზავნეთ:',
	'echo-pref-send-to' => 'გასაგზავნი მისამართი:',
	'echo-pref-email-format' => 'ელ.ფოსტის ფორმატი:',
	'echo-pref-web' => 'ქსელი',
	'echo-pref-email' => 'ელ. ფოსტა',
	'echo-pref-email-frequency-never' => 'არ გამომიგზავნოთ არავითარი შეტყობინება ელ.ფოსტაზე',
	'echo-pref-email-frequency-immediately' => 'ინდივიდუალური შეტყობინებები როგორც ისინი მოდის',
	'echo-pref-email-frequency-daily' => 'დღის შემაჯამებელი შეტყობინებები',
	'echo-pref-email-frequency-weekly' => 'კვირის შემაჯამებელი შეტყობინებები',
	'echo-pref-email-format-plain-text' => 'ჩვეულებრივი ტექსტი',
	'echo-pref-new-message-indicator' => 'განხილვის გვერდის შეტყობინების ინდიკატორის ჩვენება ხელსაწყოების პანელზე',
	'echo-new-messages' => 'თქვენ გაქვთ ახალი შეტყობინება',
	'echo-category-title-edit-user-talk' => 'განხილვის გვერდის {{PLURAL:$1|შეტყობინება}}',
	'echo-no-agent' => '[არავინ]',
	'echo-no-title' => '[არ არის გვერდი]',
	'notifications' => 'შეტყობინებები',
	'tooltip-pt-notifications' => 'თქვენი შეტყობინებები',
	'echo-specialpage' => 'შეტყობინებები',
	'echo-none' => 'თქვენ არ გაქვთ შეტყობინება.',
	'echo-more-info' => 'დეტალურად',
	'echo-feedback' => 'შეფასება',
	'notification-link-text-view-changes' => 'ცვლილებების ნახვა',
	'notification-link-text-view-edit' => 'რედაქტირების ნახვა',
	'notification-edit-talk-page2' => 'მომხმარებელმა [[User:$1|$1]] {{GENDER:$1|დატოვა}} შეტყობინება თქვენი [[User talk:$2#$3|განხილვის გვერდზე]].',
	'notification-edit-talk-page-with-section' => 'მომხმარებელმა [[User:$1|$1]] {{GENDER:$1|დატოვა}} შეტყობინება თქვენი განხილვის გვერდზე განყოფილებაში „[[User talk:$2#$3|$4]]“.',
	'notification-edit-talk-page-flyout2' => 'მომხმარებელმა $1 {{GENDER:$1|დატოვა}} შეტყობინება თქვენი [[User talk:$2#$3|განხილვის გვერდზე]].',
	'notification-edit-talk-page-flyout-with-section' => 'მომხმარებელმა $1 {{GENDER:$1|დატოვა}} შეტყობინება თქვენი განხილვის გვერდზე განყოფილებაში „[[User talk:$2#$3|$4]]“.',
	'notification-page-linked' => '[[:$2]] {{GENDER:$1|ბმული}} გაკეთდა სტატიაში [[:$3]]. [[Special:WhatLinksHere/$2|იხილეთ ამ გვერდის ყველა ბმული]].',
	'notification-new-user' => 'კეთილი იყოს თქვენი მობრძანება საიტზე {{SITENAME}}, $1! ჩვენ მოხარული ვართ თქვენი აქ ყოფნით.',
	'notification-edit-talk-page-email-batch-body2' => 'მომხმარებელმა $1 {{GENDER:$1|დატოვა}} შეტყობინება თქვენი განხილვის გვერდზე:',
	'notification-edit-talk-page-email-batch-body-with-section' => 'მომხმარებელმა $1 {{GENDER:$1|დატოვა}} შეტყობინება თქვენი განხილვის გვერდზე განყოფილებაში „$2“.',
	'echo-notification-count' => '$1+',
	'echo-overlay-link' => 'შეტყობინება',
	'echo-overlay-title' => '<b>შეტყობინებები</b>',
	'echo-date-today' => 'დღეს',
	'echo-date-yesterday' => 'გუშინ',
	'echo-email-batch-bullet' => '•',
);

/** Kazakh (Cyrillic script) (қазақша (кирил)‎)
 * @author Arystanbek
 */
$messages['kk-cyrl'] = array(
	'echo-desc' => 'Хабарландыру жүйесі',
	'prefs-echo' => 'Хабарландырулар',
	'prefs-emailsettings' => 'Е-пошта баптаулары',
	'prefs-displaynotifications' => 'Көрсету бапталымдары',
	'prefs-echosubscriptions' => 'Бұл оқиғалар туралы маған хабарландыр',
	'prefs-newmessageindicator' => 'Жаңа хабарлама көрсеткіші',
	'echo-pref-send-me' => 'Маған жіберу:',
	'echo-pref-send-to' => 'Жіберу:',
	'echo-pref-email-format' => 'Е-пошта пішіні:',
	'echo-pref-web' => 'Веб',
	'echo-pref-email' => 'Е-поштаңыз',
	'echo-pref-email-frequency-never' => 'Ешбір е-пошта хабарландыруларын маған жіберме',
	'echo-pref-email-frequency-daily' => 'Хабарландырулардың күнделікті түйіндемесі',
	'echo-pref-email-frequency-weekly' => 'Хабарландырулардың апталық түйіндемесі',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Қалыпты мәтін',
	'echo-pref-notify-show-link' => 'Құралдар үстелімде ескертпелерді көрсету',
	'echo-pref-new-message-indicator' => 'Құралдар үстелімде талқылау беттегі хабарламалар көрсеткішін көрсету',
	'echo-learn-more' => 'Көбірек білу',
	'echo-new-messages' => 'Сізде жаңа хабарламалар бар',
	'echo-category-title-edit-user-talk' => 'Талқылау бетіңіздегі {{PLURAL:$1|хабарлама|хабарламалар}}',
	'echo-category-title-article-linked' => 'Бет {{PLURAL:$1|сілтемесі|сілтемелері}}',
	'echo-category-title-reverted' => 'Өңдеме {{PLURAL:$1|қайтаруы|қайтарулары}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Еске салу|Еске салу}}',
	'echo-category-title-other' => '{{PLURAL:$1|Басқа}}',
	'echo-category-title-system' => '{{PLURAL:$1|Жүйе}}',
	'echo-pref-tooltip-edit-user-talk' => 'Әлдекім талқылау бетіме хабарлама немесе жауап жазса маған ескерт.',
	'echo-pref-tooltip-article-linked' => 'Әлдекім мен бастаған бетті мақала бетінде сілтеген кезде маған ескерт.',
	'echo-pref-tooltip-reverted' => 'Әлдекім жоққа шығару несесе шегіндіру құралын қолданып мен жасаған өңдемелерді қайтарған кезде маған ескерт.',
	'echo-pref-tooltip-mention' => 'Әлдекім менің қатысушы бетімді кез келген талқылау бетінде сілтеген кезде маған ескерт.',
	'echo-no-agent' => '[Ешкім]',
	'echo-no-title' => '[Бет жоқ]',
	'echo-error-no-formatter' => 'Ескертпелер үшін форматтау анықталмайды.',
	'echo-error-preference' => 'Қате: Қатысушы бапталымдары орнатылмайды.',
	'echo-error-token' => 'Қате: Қатысушы токені қалпына келтірілмейді.',
	'notifications' => 'Хабарландырулар',
	'tooltip-pt-notifications' => 'Сіздегі хабарландырулар',
	'echo-specialpage' => 'Хабарландырулар',
	'echo-anon' => 'Ескертпелерді қабылдау үшін [$1 тіркеліңіз] немесе [$2 кіріңіз].',
	'echo-none' => 'Сізде ескертпелер жоқ.',
	'echo-more-info' => 'Көбірек ақпарат',
	'echo-feedback' => 'Кері байланыс',
	'notification-link-text-view-message' => 'Хабарламаны көру',
	'notification-link-text-view-mention' => 'Еске салуды көру',
	'notification-link-text-view-changes' => 'Өзгерістерді көру',
	'notification-link-text-view-page' => 'Бетті көру',
	'notification-link-text-view-edit' => 'Өңдемені көру',
	'notification-edit-talk-page2' => '[[User:$1|$1]] [[User talk:$2#$3|талқылау бетіңізге]] хабарлама {{GENDER:$1|қалдырды}}.',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] талқылау бетіңіздегі "[[User talk:$2#$3|$4]]" бөліміне хабарлама {{GENDER:$1|қалдырды}}.',
	'notification-edit-talk-page-flyout2' => '$1 [[User talk:$2#$3|талқылау бетіңізге]] хабарлама {{GENDER:$1|қалдырды}}.',
	'notification-edit-talk-page-flyout-with-section' => '$1 талқылау бетіңіздегі "[[User talk:$2#$3|$4]]" бөліміне хабарлама {{GENDER:$1|қалдырды}}.',
	'notification-page-linked' => '[[:$2]] [[:$3]] дегенде {{GENDER:$1|сілтенді}}  . [[Special:WhatLinksHere/$2|Бұл бетке барлық сілтенгендерді көру]].',
	'notification-page-linked-flyout' => '$2 [[:$3]] дегеннен {{GENDER:$1|сілтенді}}.',
	'notification-add-comment2' => '[[User:$1|$1]] "$4" талқылау бетіндегі "[[$3|$2]]" бөліміне {{GENDER:$1|пікір жазды}}.',
	'notification-add-talkpage-topic2' => '[[$3]] бетінде [[User:$1|$1]] "$2" деген жаңа тақырып  {{GENDER:$1|қосты}}.',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] сізге хабарлама {{GENDER:$1|жіберді}}: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]] талқылау бетіндегі "[[$3#$2|$2]]" бөліміне {{GENDER:$1|пікір жазды}}.',
	'notification-mention' => '[[User:$1|$1]] $5 талқылау бетінің "[[$3#$2|$4]]" бөлімінде сізді {{GENDER:$1|атап өтті}}.',
	'notification-mention-flyout' => '$1 $5 талқылау бетінің "[[$3#$2|$4]]" бөлімінде сізді {{GENDER:$1|атап өтті}}.',
	'notification-mention-nosection' => '[[User:$1|$1]] [[$3|$2 талқылау бетінде]] сізді {{GENDER:$1|атап өтті}}.',
	'notification-mention-nosection-flyout' => '$1 [[$3|$2 талқылау бетінде]] сізді {{GENDER:$1|атап өтті}}.',
	'notification-user-rights' => 'Сіздің қатысушы құқықтарыңызды [[User:$1|$1]][[Special:Log/rights/$1| {{GENDER:$1|өзгерті}}]]. $2. [[Special:ListGroupRights|Толығырақ білу]]',
	'notification-user-rights-flyout' => 'Сіздің қатысушы құқықтарыңызды $1. $2 {{GENDER:$1|өзгерті}}. [[Special:ListGroupRights|Көбірек білу]]',
	'notification-user-rights-add' => 'Сіз қазір {{PLURAL:$2|бұл топтың|бұл топтардың}} мүшесісіз: $1',
	'notification-user-rights-remove' => 'Сіз {{PLURAL:$2|бұл топтың|бұл топтың}} көптен бергі мүшесі емессіз: $1',
	'notification-new-user' => '$1 {{SITENAME}} сайтына қош келдіңіз! Сіз осында болғаныңызға біз қуаныштымыз.',
	'notification-reverted2' => 'Сіздің {{PLURAL:$4|[[:$2]] бетіндегі өңдемеңізді|[[:$2]] бетіндегі өңдемелеріңізді}} [[User:$1|$1]] есімді қатысушы {{GENDER:$1|жоққа шығарды}}. $3',
	'notification-reverted-flyout2' => 'Сіздің {{PLURAL:$4|$2 бетіндегі өңдемеңізді|$2 бетіндегі өңдемелеріңізді}} $1 есімді қатысушы {{GENDER:$1|жоққа шығарыды}}. $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{SITENAME}} сайтында сізге хабарлама {{GENDER:$1|қалдырды}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 сіздің талқылау бетіңізге хабарлама {{GENDER:$1|қалдырды}}:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 сіздің талқылау бетіңіздегі  "$2" бөліміне хабарлама {{GENDER:$1|қалдырды}}.',
	'notification-page-linked-email-subject' => '{{SITENAME}} сайтында сіздің бетіңіз сілтенді',
	'notification-page-linked-email-batch-body' => '$2 $3 дегеннен {{GENDER:$1|сілтенді}}.',
	'notification-reverted-email-subject2' => '{{SITENAME}} сайтында сіздің {{PLURAL:$3|өңдемеңіз|өңдемелеріңіз}}{{GENDER:$1|қайтарылды}}',
	'notification-reverted-email-batch-body2' => 'Сіздің {{PLURAL:$3|$2 бетіндегі өңдемеңізді|$2 бетіндегі өңдемелеріңізді}} $1 есімді қатысушы {{GENDER:$1|жоққа шығарыды}}.',
	'notification-mention-email-subject' => '{{SITENAME}} сайтында $1 сізді {{GENDER:$1|атап өтті}}',
	'notification-mention-email-batch-body' => '$1 $4 талқылау бетінің "$3" бөлімінде сізді {{GENDER:$1|атап өтті}}.',
	'notification-mention-nosection-email-batch-body' => '$1 $2 талқылау бетінде сізді {{GENDER:$1|атап өтті}}.',
	'notification-user-rights-email-subject' => '{{SITENAME}} сайтында сіздің қатысушы құқықтарыңыз өзгерілді.',
	'notification-user-rights-email-batch-body' => 'Сіздің қатысушы құқықтарыңызды $1. $2 {{GENDER:$1|өзгерті}}.',
	'echo-email-subject-default' => '{{SITENAME}} сайтында жаңа ескертпелер',
	'echo-email-body-default' => '{{SITENAME}} сайтында сіз жаңа ескертпелер алдыңыз:

$1',
	'echo-email-batch-body-default' => 'Сізде жаңа ескертпелер бар.',
	'echo-email-footer-default' => '$2

Бақылау email арқылы жіберілсе, бапталымдарыңызды тексеріп шығыңыз:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Бақылау email арқылы жіберілсе, <a href="$2" style="text-decoration:none; color: #3868B0;">бапталымдарыңызды тексеріңіз</a>.<br />

$1',
	'echo-overlay-link' => 'Барлық ескертпелер',
	'echo-overlay-title' => '<b>Ескертпелер</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Ескертпелер}}</b> (көрселуде:$1 оқылмағандар:$2 )',
	'echo-mark-all-as-read' => 'Оқылды деп белгіле',
	'echo-date-today' => 'Бүгін',
	'echo-date-yesterday' => 'Ертең',
	'notification-edit-talk-page-bundle' => '$1 және {{PLURAL:$4|басқа|басқа}} $3 қатысушы[[User talk:$2|талқылау бетіңізге]] хабарлама {{GENDER:$1|қалдырды}}.',
	'notification-page-linked-bundle' => '$2 $3 және басқа $4 {{PLURAL:$5|беттен|беттен}} {{GENDER:$1|сілтенді}}. [[Special:WhatLinksHere/$2|Бұл бетке барлық сілтенгендерді көру]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 және {{PLURAL:$3|басқа|басқа}} $2 қатысушы талқылау бетіңізге хабарлама {{GENDER:$1|қалдырды}}.',
	'notification-page-linked-email-batch-bundle-body' => '$2 $3 және басқа $4 {{PLURAL:$5|беттен|беттен}} {{GENDER:$1|сілтенді}}.',
	'echo-email-batch-subject-daily' => 'Сіз {{SITENAME}} сайтында {{PLURAL:$2|жаңа ескертпе|жаңа ескертпелер}} алдыңыз',
	'echo-email-batch-subject-weekly' => 'Сіз осы аптада {{SITENAME}} сайтында {{PLURAL:$2|жаңа ескертпе|жаңа ескертпелер}} алдыңыз',
	'echo-email-batch-body-intro-daily' => 'Сәлем $1, 
Бұл {{SITENAME}} жобасындағы бүгінгі сіз үшін іс-әрекеттер түйіндемесі.',
	'echo-email-batch-body-intro-weekly' => 'Сәлем $1, 
Бұл {{SITENAME}} жобасындағы осы аптадағы сіз үшін іс-әрекеттер түйіндемесі.',
	'echo-email-batch-link-text-view-all-notifications' => 'Барлық ескертпелерді көру',
);

/** Kannada (ಕನ್ನಡ)
 * @author Pavanaja
 * @author Shubha
 * @author Vikashegde
 */
$messages['kn'] = array(
	'echo-desc' => 'ಸೂಚನಾ ವ್ಯವಸ್ಥೆ',
	'prefs-echo' => 'ಸೂಚನೆಗಳು',
	'prefs-emailsettings' => 'ಇಮೈಲ್ ಆಯ್ಕೆಗಳು',
	'prefs-displaynotifications' => 'ಪ್ರದರ್ಶನ ಆಯ್ಕೆಗಳು',
	'prefs-echosubscriptions' => 'ಈ ಘಟನೆಗಳ ಬಗ್ಗೆ ನನಗೆ ತಿಳಿಸಿ',
	'prefs-newmessageindicator' => 'ಹೊಸ ಸಂದೇಶ ಸೂಚಕ',
	'echo-pref-send-me' => 'ನನಗೆ ಕಳುಹಿಸಿ:',
	'echo-pref-send-to' => 'ಇವರಿಗೆ ಕಳುಹಿಸಿ:',
	'echo-pref-email-format' => 'ಇಮೈಲ್ ನಮೂನೆ:',
	'echo-pref-web' => 'ವಿಶ್ವವ್ಯಾಪಿಜಾಲ',
	'echo-pref-email' => 'ಇಮೈಲ್',
	'echo-pref-email-frequency-never' => 'ನನಗೆ ಯಾವುದೇ ಇಮೈಲ್ ಸಂದೇಶ ಕಳುಹಿಸಬೇಡಿ',
	'echo-pref-email-frequency-immediately' => 'ಒಂದೊಂದೆ ಸಂದೇಶ ಅವು ಬರುತ್ತಿದ್ದಂತೆ',
	'echo-pref-email-frequency-daily' => 'ಪ್ರತಿದಿನದ ಸೂಚನೆಗಳ ಸಾರಾಂಶ',
	'echo-pref-email-frequency-weekly' => 'ಪ್ರತಿ ವಾರದ ಸೂಚನೆಗಳ ಸಾರಾಂಶ',
	'echo-pref-email-format-html' => 'ಎಚ್‌ಟಿಎಂಎಲ್',
	'echo-pref-email-format-plain-text' => 'ಸಾದಾ ಪಠ್ಯ',
	'echo-pref-notify-show-link' => 'ನನ್ನ ಸಾಧನಪಟ್ಟಿಯಲ್ಲಿ ಸೂಚನೆಗಳನ್ನು ತೋರಿಸಿ',
	'echo-pref-new-message-indicator' => 'ನನ್ನ ಸಾಧನಪಟ್ಟಿಯಲ್ಲಿ ಚರ್ಚಾಪುಟದ ಸಂದೇಶಸೂಚನೆ ತೋರಿಸಿ',
	'echo-learn-more' => 'ಇನ್ನಷ್ಟು ತಿಳಿಯಿರಿ',
	'echo-new-messages' => 'ನಿಮಗೆ ಹೊಸ ಸಂದೇಶಗಳಿವೆ', # Fuzzy
	'echo-category-title-edit-user-talk' => 'ಚರ್ಚಾಪುಟ {{PLURAL:$1|message|messages}}',
	'echo-category-title-article-linked' => 'ಪುಟ {{PLURAL:$1|link|links}}',
	'echo-category-title-reverted' => '{{PLURAL:$1|revert|reverts}} ಸಂಪಾದಿಸಿ',
	'echo-category-title-mention' => '{{PLURAL:$1|Mention|Mentions}}',
	'echo-category-title-other' => '{{PLURAL:$1|Other}}',
	'echo-category-title-system' => '{{PLURAL:$1|System}}',
	'echo-pref-tooltip-edit-user-talk' => 'ಯಾರಾದರೂ ನನಗೆ ಸಂದೇಶ ಪೋಸ್ಟ್ ಮಾಡಿದರೆ ಅಥವಾ ನನ್ನ ಚರ್ಚಾಪುಟದಲ್ಲಿ ಉತ್ತರಿಸಿದರೆ ತಿಳಿಸಿ',
	'echo-pref-tooltip-article-linked' => 'ನಾನು ತಯಾರಿಸಿದ ಲೇಖನಪುಟಕ್ಕೆ ಯಾರಾದರೂ ಕೊಂಡಿ ನೀಡಿದರೆ ನನಗೆ ತಿಳಿಸಿ',
	'echo-pref-tooltip-reverted' => 'ನಾನು ಮಾಡಿದ ಸಂಪಾದನೆಯನ್ನು ಯಾರಾದರು ಹಿಂದಿನಂತೆ ಮಾಡಿದರೆ ನನಗೆ ತಿಳಿಸಿ',
	'echo-pref-tooltip-mention' => 'ನನ್ನ ಸದಸ್ಯ ಪುಟಕ್ಕೆ ಯಾರಾದರು ಯಾವುದಾದರು ಚರ್ಚಾಪುಟದಿಂದ ಕೊಂಡಿ ನೀಡಿದರೆ ನನಗೆ ತಿಳಿಸಿ',
	'echo-no-agent' => '[ಯಾರೂ ಇಲ್ಲ]',
	'echo-no-title' => '[ಯಾವುದೇ ಪುಟ ಇಲ್ಲ]',
	'echo-error-no-formatter' => 'ಸೂಚನೆಗಳಿಗೆ ಯಾವುದೇ ನಮೂನೆ ನಿರ್ಧರಿಸಿಲ್ಲ',
	'echo-error-preference' => 'ದೋಷ: ಬಳಕೆದಾರ ಪ್ರಾಶಸ್ತ್ಯಗಳನ್ನು ನಿಗದಿ ಮಾಡಲು ಆಗಲಿಲ್ಲ',
	'echo-error-token' => 'ದೋಷ: ಬಳಕೆದಾರ ಟೋಕನ್ ಮರಳಿ ಪಡೆಯಲು ಸಾಧ್ಯವಾಗಲಿಲ್ಲ',
	'notifications' => 'ಸೂಚನೆಗಳು',
	'tooltip-pt-notifications' => 'ನಿಮ್ಮ ಸೂಚನೆಗಳು',
	'echo-specialpage' => 'ಸೂಚನೆಗಳು',
	'echo-anon' => 'ಸೂಚನೆಗಳನ್ನು ಸ್ವೀಕರಿಸಲು [ಖಾತೆ ಸೃಷ್ಟಿಸಿ $1] ಅಥವಾ [ಲಾಗಿನ್ $2]',
	'echo-none' => 'ನಿಮಗೆ ಯಾವುದೇ ಸೂಚನೆಗಳಿಲ್ಲ',
	'echo-more-info' => 'ಹೆಚ್ಚಿನ ಮಾಹಿತಿ',
	'echo-feedback' => 'ಹಿಂಮಾಹಿತಿ',
	'notification-link-text-view-message' => 'ಸಂದೇಶ ನೋಡಿ',
	'notification-link-text-view-mention' => 'ಸಂಬೋಧನೆ ನೋಡಿ',
	'notification-link-text-view-changes' => 'ಬದಲಾವಣೆ ನೋಡಿ',
	'notification-link-text-view-page' => 'ಪುಟ ನೋಡಿ',
	'notification-link-text-view-edit' => 'ಸಂಪಾದನೆ ನೋಡಿ',
	'notification-new-user' => '{{SITENAME}} ಕ್ಕೆ ಸುಸ್ವಾಗತ, $1! ನೀವು ಇಲ್ಲಿ ಬಂದಿದ್ದು ಸಂತಸ ತಂದಿತು',
	'notification-page-linked-email-subject' => 'ನಿಮ್ಮ ಪುಟವು {{SITENAME}} ಜಾಲತಾಣಕ್ಕೆ ಸಂಪರ್ಕಿಸಲ್ಪಟ್ಟಿದೆ',
	'notification-user-rights-email-subject' => '{{SITENAME}} ಜಾಲತಾಣದಲ್ಲಿ ನಿಮ್ಮ ಬಳಕೆದಾರ ಹಕ್ಕುಗಳನ್ನು ಬದಲಿಸಲಾಗಿದೆ',
	'echo-email-subject-default' => '{{SITENAME}} ಜಾಲತಾಣದಲ್ಲಿ ಹೊಸ ಸೂಚನೆ ಇದೆ',
	'echo-email-body-default' => '{{SITENAME}} ಜಾಲತಾಣದಲ್ಲಿ ನಿಮಗೆ ಈ ಸೂಚನೆ ಇದೆ: $1',
	'echo-email-batch-body-default' => 'ನಿಮಗೆ ಹೊಸ ಸೂಚನೆ ಇದೆ.',
	'echo-email-footer-default-html' => 'ನಿಮಗೆ ನಾವು ಯಾವ ಇಮೈಲ್‌ಗಳನ್ನು ಕಳುಹಿಸಬಹುದೆಂಬುದನ್ನು ನಿಯಂತ್ರಿಸಲು, <a href="$2" style="text-decoration:none; color: #3868B0;">ನಿಮ್ಮ ಪ್ರಾಶಸ್ತ್ಯಗಳನ್ನು ಪರಿಶೀಲಿಸಿ</a>.<br /> $1',
	'echo-overlay-link' => 'ಎಲ್ಲ ಸೂಚನೆಗಳು',
	'echo-overlay-title' => '<b>ಸೂಚನೆಗಳು</b>',
	'echo-overlay-title-overflow' => '<b>ಸೂಚನೆಗಳು</b> ($2 ರಲ್ಲಿ $1 ಓದದವುಗಳನ್ನು ತೋರಿಸಲಾಗುತ್ತಿದೆ)', # Fuzzy
	'echo-mark-all-as-read' => 'ಎಲ್ಲವನ್ನೂ ಓದಿದೆ ಎಂದು ಆಯ್ಕೆ ಮಾಡಿ',
	'echo-date-today' => 'ಇಂದು',
	'echo-date-yesterday' => 'ನಿನ್ನೆ',
	'echo-load-more-error' => 'ಹೆಚ್ಚು ಫಲಿತಾಂಶಗಳನ್ನು ಪಡೆಯುವಾಗ ದೋಷವೊಂದು ಆಯಿತು',
	'echo-email-batch-body-intro-daily' => 'ನಮಸ್ಕಾರ $1,
{{SITENAME}} ಜಾಲತಾಣದಲ್ಲಿ ಇಂದು ನಡೆದ ಎಲ್ಲ ಪ್ರಕ್ರಿಯೆಗಳ ಸಾರಾಂಶ ನಿಮಗಾಗಿ ಇಲ್ಲಿದೆ.',
	'echo-email-batch-body-intro-weekly' => 'ನಮಸ್ಕಾರ $1,
{{SITENAME}} ಜಾಲತಾಣದಲ್ಲಿ ಈ ವಾರ ನಡೆದ ಎಲ್ಲ ಪ್ರಕ್ರಿಯೆಗಳ ಸಾರಾಂಶ ನಿಮಗಾಗಿ ಇಲ್ಲಿದೆ.',
	'echo-email-batch-link-text-view-all-notifications' => 'ಎಲ್ಲ ಸೂಚನೆಗಳನ್ನು ನೋಡಿ',
	'echo-rev-deleted-text-view' => 'ಈ ಪುಟದ ಪರಿಷ್ಕರಣೆಯನ್ನು ಹತ್ತಿಕ್ಕಲಾಗಿದೆ',
);

/** Korean (한국어)
 * @author Daisy2002
 * @author Freebiekr
 * @author Hym411
 * @author Kwj2772
 * @author Priviet
 * @author 관인생략
 * @author 아라
 */
$messages['ko'] = array(
	'echo-desc' => '알림 시스템',
	'prefs-echo' => '알림',
	'prefs-emailsettings' => '이메일 설정',
	'prefs-displaynotifications' => '보이기 설정',
	'prefs-echosubscriptions' => '다음 경우에 알림',
	'prefs-newmessageindicator' => '새 메시지 표시기',
	'echo-pref-send-me' => '다음 방식으로 보내기:',
	'echo-pref-send-to' => '다음 주소로 보내기:',
	'echo-pref-email-format' => '이메일 형식:',
	'echo-pref-web' => '웹',
	'echo-pref-email' => '이메일',
	'echo-pref-email-frequency-never' => '내게 어떠한 이메일 알림도 보내지 않기',
	'echo-pref-email-frequency-immediately' => '알릴 내용이 있는 대로 개별적으로 알림',
	'echo-pref-email-frequency-daily' => '매일 알림 요약',
	'echo-pref-email-frequency-weekly' => '매주 알림 요약',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => '일반 텍스트',
	'echo-pref-notify-show-link' => '툴바에 알림 보이기',
	'echo-pref-new-message-indicator' => '툴바에 토론 문서 메시지 표시기 보이기',
	'echo-learn-more' => '더 알아보기',
	'echo-new-messages' => '다른 사용자가 글을 남겼습니다.',
	'echo-category-title-edit-user-talk' => '토론 문서 {{PLURAL:$1|메시지}}',
	'echo-category-title-article-linked' => '문서 {{PLURAL:$1|링크}}',
	'echo-category-title-reverted' => '편집이 {{PLURAL:$1|되돌려짐}}',
	'echo-category-title-mention' => '본인 {{PLURAL:$1|언급}}',
	'echo-category-title-other' => '{{PLURAL:$1|기타}}',
	'echo-category-title-system' => '{{PLURAL:$1|시스템}}',
	'echo-pref-tooltip-edit-user-talk' => '내 토론 문서에 누군가가 글이나 답글을 남길 때 내게 알립니다.',
	'echo-pref-tooltip-article-linked' => '누군가가 어느 문서에서 내가 만든 문서를 링크할 때 내게 알립니다.',
	'echo-pref-tooltip-reverted' => '누군가가 편집 취소나 되돌리기 도구를 사용하여 내 편집을 되돌릴 때 내게  알립니다.',
	'echo-pref-tooltip-mention' => '누군가가 어느 토론 문서에서 내 사용자 문서를 링크할 때 내게 알립니다.',
	'echo-no-agent' => '[알 수 없는 사용자]',
	'echo-no-title' => '[문서 없음]',
	'echo-error-no-formatter' => '알림에 대해 정의된 형식이 없습니다',
	'echo-error-preference' => '오류: 사용자 환경 설정을 저장할 수 없습니다',
	'echo-error-token' => '오류: 사용자 토큰을 얻을 수 없습니다',
	'notifications' => '알림',
	'tooltip-pt-notifications' => '내 알림',
	'echo-specialpage' => '알림',
	'echo-anon' => '알림을 받으려면 [$1 계정을 만들거나] [$2 로그인]하세요.',
	'echo-none' => '알림이 없습니다.',
	'echo-more-info' => '자세한 정보',
	'echo-feedback' => '피드백 남기기',
	'notification-link-text-view-message' => '메시지 보기',
	'notification-link-text-view-mention' => '언급된 내용 보기',
	'notification-link-text-view-changes' => '차이 보기',
	'notification-link-text-view-page' => '문서 보기',
	'notification-link-text-view-edit' => '편집 보기',
	'notification-edit-talk-page2' => '[[User:$1|$1]]님이 내 [[User talk:$2#$3|토론 문서]]에 글을 {{GENDER:$1|남겼습니다}}.',
	'notification-edit-talk-page-with-section' => "[[User:$1|$1]]님이 '[[User talk:$2#$3|$4]]'의 내 토론 문서에 글을 {{GENDER:$1|남겼습니다}}.",
	'notification-edit-talk-page-flyout2' => '$1님이 내 [[User talk:$2#$3|토론 문서]]에 글을 {{GENDER:$1|남겼습니다}}.',
	'notification-edit-talk-page-flyout-with-section' => "$1님이 '[[User talk:$2#$3|$4]]'의 내 토론 문서에 글을 {{GENDER:$1|남겼습니다}}.",
	'notification-page-linked' => '[[:$2]] 문서가 [[:$3]]에 {{GENDER:$1|링크되었습니다}}. [[Special:WhatLinksHere/$2|이 문서를 가리키는 모든 링크를 봅니다]].',
	'notification-page-linked-flyout' => '$2 문서가 [[:$3]]에 {{GENDER:$1|링크되었습니다}}.',
	'notification-add-comment2' => '[[User:$1|$1]]님이 "$4" 토론 문서의 "[[$3|$2]]"에 {{GENDER:$1|댓글을 남겼습니다}}',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]]님이 [[$3]]의 "$2" 새 주제를 {{GENDER:$1|게시했습니다}}',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]]님이 내게 메시지를 {{GENDER:$1|보냈습니다}}: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]]님이 내 토론 문서의 "[[$3#$2|$2]]"에 {{GENDER:$1|댓글을 남겼습니다}}',
	'notification-mention' => "[[User:$1|$1]]님이 '[[$3#$2|$4]]'의 $5 토론 문서에 당신을 {{GENDER:$1|언급했습니다}}.",
	'notification-mention-flyout' => "$1님이 '[[$3#$2|$4]]'의 $5 토론 문서에 당신을 {{GENDER:$1|언급했습니다}}.",
	'notification-mention-nosection' => '[[User:$1|$!]] 님이 [[$3|$2 토론 문서]]에서 당신을 언급했습니다.',
	'notification-mention-nosection-flyout' => '$1 님이 [[$3|$2 토론 문서]]에서 당신을 언급했습니다.',
	'notification-user-rights' => '[[User:$1|$1]]님이 당신의 [[Special:Log/rights/$1|사용자 권한을 {{GENDER:$1|바꾸었}}습니다]]. $2. [[Special:ListGroupRights|더 알아보기]]',
	'notification-user-rights-flyout' => '$1님이 당신의 사용자 권한을 {{GENDER:$1|바꾸었}}습니다. $2. [[Special:ListGroupRights|더 알아보기]]',
	'notification-user-rights-add' => '당신은 이제 {{PLURAL:$2|다음 권한|다음 권한}}을 갖습니다: $1',
	'notification-user-rights-remove' => '당신은 더 이상 {{PLURAL:$2|다음 권한|다음 권한}}을 갖지 않습니다: $1',
	'notification-new-user' => '$1님, {{SITENAME}}에 온 것을 환영합니다! 당신이 여기에 오신 걸 매우 기쁘게 생각합니다.',
	'notification-reverted2' => '{{PLURAL:$4|[[:$2]]에 대한 내 편집}}을 [[User:$1|$1]]님이 {{GENDER:$1|되돌렸습니다}}. $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|$2에 대한 내 편집}}을 $1님이 {{GENDER:$1|되돌렸습니다}} $3',
	'notification-edit-talk-page-email-subject2' => '$1님이 {{SITENAME}}의 나에게 글을 {{GENDER:$1|남겼습니다}}',
	'notification-edit-talk-page-email-batch-body2' => '$1님이 내 토론 문서에 글을 {{GENDER:$1|남겼습니다}}:',
	'notification-edit-talk-page-email-batch-body-with-section' => "$1님이 '$2'에 내 토론 문서에 글을 {{GENDER:$1|남겼습니다}}.",
	'notification-page-linked-email-subject' => '{{SITENAME}}에서 당신의 문서가 링크되었습니다',
	'notification-page-linked-email-batch-body' => '$2 문서가 $3에 {{GENDER:$1|링크되었습니다}}',
	'notification-reverted-email-subject2' => '{{SITENAME}}의 내 {{PLURAL:$3|편집}}이 {{GENDER:$1|되돌려졌습니다}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|$2에 대한 내 편집}}을 $1님이 {{GENDER:$1|되돌렸습니다}}',
	'notification-mention-email-subject' => '$1님이 {{SITENAME}}에서 당신을 {{GENDER:$1|언급했습니다}}',
	'notification-mention-email-batch-body' => "$1님이 '$3'의 $4 토론 문서에 당신을 {{GENDER:$1|언급했습니다}}.",
	'notification-mention-nosection-email-batch-body' => '$1 님이 $2 토론 문서에서 당신을 언급했습니다.',
	'notification-user-rights-email-subject' => '{{SITENAME}}에서 당신의 사용자 권한이 바뀌었습니다',
	'notification-user-rights-email-batch-body' => '당신의 사용자 권한이 $1님에 의해 {{GENDER:$1|바뀌었습니다}}. $2',
	'echo-email-subject-default' => '{{SITENAME}}의 새 알림',
	'echo-email-body-default' => '{{SITENAME}}에 새 알림이 있습니다:

$1',
	'echo-email-batch-body-default' => '새 알림이 있습니다',
	'echo-email-footer-default' => '$2

발송되는 이메일을 관리하려면, 환경 설정을 확인하세요:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => '우리가 보내는 이메일을 제어하려면, <a href="$2" style="text-decoration:none; color: #3868B0;">사용자 환경 설정을 확인하세요</a><br />
$1',
	'echo-overlay-link' => '모든 알림',
	'echo-overlay-title' => '<b>알림</b>',
	'echo-overlay-title-overflow' => '<b>알림</b> (보이는 $2개 중 $1개를 읽지 않음)',
	'echo-mark-all-as-read' => '모두 읽은 것으로 표시',
	'echo-date-today' => '오늘',
	'echo-date-yesterday' => '어제',
	'echo-load-more-error' => '더 많은 결과를 가져오는 동안 오류가 발생했습니다.',
	'notification-edit-talk-page-bundle' => '$1님과 {{PLURAL:$4|다른}} $3명이 당신의 [[User talk:$2|토론 문서]]에 글을 {{GENDER:$1|남겼습니다}}.',
	'notification-page-linked-bundle' => '$2 문서가 $3 문서와 다른 $4개 {{PLURAL:$5|문서}}에 {{GENDER:$1|링크되었습니다}}. [[Special:WhatLinksHere/$2|이 문서를 가리키는 모든 링크 보기]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1님과 {{PLURAL:$3|다른}} $2명의 사용자가 당신의 토론 문서에 글을 {{GENDER:$1|남겼습니다}}',
	'notification-page-linked-email-batch-bundle-body' => '$2 문서가 $3 문서와 다른 $4개 {{PLURAL:$5|문서}}에 {{GENDER:$1|링크되었습니다}}',
	'echo-email-batch-subject-daily' => '{{SITENAME}}에서 {{PLURAL:$2|새 알림}}이 있습니다',
	'echo-email-batch-subject-weekly' => '이번 주에 {{SITENAME}}에서 {{PLURAL:$2|새 알림}}이 있습니다',
	'echo-email-batch-body-intro-daily' => '$1님 안녕하세요,
여기에 {{SITENAME}}에 오늘의 활동 요약이 있습니다.',
	'echo-email-batch-body-intro-weekly' => '$1님 안녕하세요,
여기에 {{SITENAME}}에 이번 주의 활동 요약이 있습니다.',
	'echo-email-batch-link-text-view-all-notifications' => '모든 알림 보기',
	'echo-rev-deleted-text-view' => '이 문서 판은 숨겨져 있습니다',
);

/** Karachay-Balkar (къарачай-малкъар)
 * @author Iltever
 */
$messages['krc'] = array(
	'echo-desc' => 'Билдириуле система',
	'prefs-echo' => 'Билдириуле',
	'prefs-emailsettings' => 'Эл. почтаны джарашдырыулары',
	'prefs-displaynotifications' => 'Кёрюнюуню джарашдырыулары',
	'prefs-echosubscriptions' => 'Бу болууланы юсюнден билдире тур',
	'prefs-newmessageindicator' => 'Джангы билдириуню индикатору',
	'echo-pref-send-me' => 'Меннге джибер:',
	'echo-pref-send-to' => 'Былайгъа джибер:',
	'echo-pref-email-format' => "E-mail'ни форматы:",
	'echo-pref-web' => 'Веб',
	'echo-pref-email' => 'E-mail',
	'echo-pref-email-frequency-never' => 'Эл. почта бла билдириуле джиберме',
	'echo-pref-email-frequency-immediately' => 'Келгенлерине кёре энчи билдириуле',
	'echo-pref-email-frequency-daily' => 'Билдириулени кюн сайын сводкасы',
	'echo-pref-email-frequency-weekly' => 'Билдириулени ыйыкъ сайын сводкасы',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Тюз текст',
	'echo-pref-notify-show-link' => 'Адырла панелимде билдириулени кёргюз',
	'echo-pref-new-message-indicator' => 'Адырла панелимде сюзюу бетимдеги билдириулени индикаторун кёргюз',
	'echo-learn-more' => 'Кёбюрек бил',
	'echo-new-messages' => 'Джангы билдириулеринг барды',
	'echo-category-title-edit-user-talk' => 'Сюзюу бетде {{PLURAL:$1|1=билдириу|билдириуле}}', # Fuzzy
	'echo-category-title-article-linked' => 'Бетлеге {{PLURAL:$1|1=джибериу|джибериуле}}', # Fuzzy
	'echo-category-title-reverted' => 'Тюрлендириулени {{PLURAL:$1|1=ызына алыу|ызына алыула}}', # Fuzzy
	'echo-category-title-mention' => '{{PLURAL:$1|1=Сагъыныу|Сагъыныула}}', # Fuzzy
	'echo-category-title-other' => '{{PLURAL:$1|башха}}', # Fuzzy
	'echo-category-title-system' => '{{PLURAL:$1|Система}}', # Fuzzy
	'echo-pref-tooltip-edit-user-talk' => 'Ким болса да билдириу ийсе неда сюзюу бетимде джууаб берсе, меннге билдир.',
	'echo-pref-tooltip-article-linked' => 'Ким болса да статьялада мен къурагъан бетге джибериу салса, меннге билдир.',
	'echo-pref-tooltip-reverted' => 'Ким болса да, ызына алыу неда дженгил къайтарыу функция бла мени тюрлендириуюмю ызына алса, меннге билдир.',
	'echo-pref-tooltip-mention' => 'Ким болса да, къайсы болса да сюзюу бетде мени къошулуучу бетиме джибериу салса, меннге билдир.',
	'echo-no-agent' => '[Киши да]',
	'echo-no-title' => '[Бет джокъду]',
	'echo-error-no-formatter' => 'Билдириу ючюн форматланыу белгиленмегенди.',
	'echo-error-preference' => 'Халат: Къошулуучуну джарашдырыулары этилмедиле.',
	'echo-error-token' => 'Халат: къошулуучу маркер (user token) алыналмады.',
	'notifications' => 'Билдириуле',
	'tooltip-pt-notifications' => 'Билдириулеригиз',
	'echo-specialpage' => 'Билдириуле',
	'echo-anon' => 'Билдириуле алыр ючюн, [$1 тергеу джазыу къурагъыз] неда [$2 системагъа киригиз].',
	'echo-none' => 'Билдириуюгюз болмагъанды.',
	'echo-more-info' => 'Толу билги',
	'echo-feedback' => 'Ызына билдириу',
	'notification-link-text-view-message' => 'Билдириуню кёр',
	'notification-link-text-view-mention' => 'Сагъыныуну кёр',
	'notification-link-text-view-changes' => 'Тюрлениулени кёр',
	'notification-link-text-view-page' => 'Бетни кёр',
	'notification-link-text-view-edit' => 'Тюрлендириуню кёр',
	'notification-edit-talk-page2' => '[[User:$1|$1]], [[User talk:$2#$3|сюзюу бетигизде]] билдириу {{GENDER:$1|къойду}}.',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]], сюзюу бетигизде ("[[User talk:$2#$3|$4]]") билдириу {{GENDER:$1|къойду}}.',
	'notification-edit-talk-page-flyout2' => '$1, [[User talk:$2#$3|сюзюу бетигизде]] билдириу {{GENDER:$1|къойду}}.',
	'notification-edit-talk-page-flyout-with-section' => '$1, сюзюу бетигизде ("[[User talk:$2#$3|$4]]") билдириу {{GENDER:$1|къойду}}.',
	'notification-page-linked' => '[[:$2]], [[:$3]] бла {{GENDER:$1|байламлы}} эди. [[Special:WhatLinksHere/$2|Бу бетге бары джибериулеге къарагъыз]].',
	'notification-page-linked-flyout' => '$2, [[:$3]] бла {{GENDER:$1|байламлы}} эди.',
	'notification-add-comment2' => '[[User:$1|$1]], "$4" сюзюу бетдеги "[[$3|$2]]" темада комментарий {{GENDER:$1|къойду}}.',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]], [[$3]] бетде "$2" деген джангы теманы {{GENDER:$1|ачды}}.',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]], сизге билдириу {{GENDER:$1|джиберди}}: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]], сизни сюзюу бетигиздеги "[[$3#$2|$2]]" темада комментарий {{GENDER:$1|къойду}}.',
	'notification-mention' => '[[User:$1|$1]], $5 сюзюу бетинде ("[[$3#$2|$4]]") сизни {{GENDER:$1|сагъынды}}.',
	'notification-mention-flyout' => '$1, $5 сюзюу бетинде ("[[$3#$2|$4]]") сизни {{GENDER:$1|сагъынды}}.',
	'notification-user-rights' => 'Къошулуучу хакъларыгъыз [[User:$1|$1]] джанындан [[Special:Log/rights/$1|{{GENDER:$1|тюрлендирилди}}]]. $2. [[Special:ListGroupRights|Толуракъ билги]]',
	'notification-user-rights-flyout' => 'Къошулуучу хакъларыгъызны $1 {{GENDER:$1|тюрлендирди}}. $2. [[Special:ListGroupRights|Толуракъ билги]]',
	'notification-user-rights-add' => 'Энди сиз {{PLURAL:$2|1=бу къауумгъа|бу къауумлагъа}} киресиз: $1', # Fuzzy
	'notification-user-rights-remove' => 'Энди сиз {{PLURAL:$2|1=бу къауумгъа|бу къауумлагъа}} кирмейсиз: $1', # Fuzzy
	'notification-new-user' => '{{SITENAME}} сайтха хош келигиз, $1! Сизни былайгъа келгенигизге къууандыкъ.',
	'notification-reverted2' => '[[User:$1|$1]], {{PLURAL:$4|1=[[:$2]] бетде сизни тюрлендириуюгюзню|[[:$2]] бетде сизни тюрлендириулеригизни}} {{GENDER:$1|ызына алды}}. $3', # Fuzzy
	'notification-reverted-flyout2' => '{{PLURAL:$4|1=$2 бетде сизни тюрлендириуюгюзню|$2 бетде сизни тюрлендириулеригизни}} $1 {{GENDER:$1|ызына алды}}. $3', # Fuzzy
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|къошулуучу}} сизге «{{SITENAME}}» сайтда билдириу {{GENDER:$1|къойду}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|къошулуучу}}, сюзюу бетигизде билдириу {{GENDER:$1|къойду}}:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|къошулуучу}}, сюзюу бетигизни «$2» бёлюмюнде (темасында) билдириу {{GENDER:$1|къойду}}.',
	'notification-page-linked-email-subject' => '«{{SITENAME}}» сайтда сизни къошулуучу бетигизге джибериу салынды',
	'notification-page-linked-email-batch-body' => '$1 къошулуучу, $3 бетде $2 бетге джибериу {{GENDER:$1|салды}}.',
	'notification-reverted-email-subject2' => '{{GENDER:$1|Ким эсе да}}, сизни «{{SITENAME}}» сайтда {{PLURAL:$3|1=тюрлендириуюгюзню|тюрлендириулеригизни}} ызына алды', # Fuzzy
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|1=«$2» бетде сизни тюрлендириуюгюзню|«$2» бетде сизни тюрлендириулеригизни}} $1 {{GENDER:$1|ызына алды}}.', # Fuzzy
	'notification-mention-email-subject' => '$1, {{SITENAME}} сайтда сизни {{GENDER:$1|сагъынды}}',
	'notification-mention-email-batch-body' => '$1, $4 сюзюу бетинде ("$3") сизни {{GENDER:$1|сагъынды}}.',
	'notification-user-rights-email-subject' => 'Сизни «{{SITENAME}}» сайтда хакъларыгъыз тюрлендирилдиле',
	'notification-user-rights-email-batch-body' => 'Къошулуучу хакъларыгъызны $1 {{GENDER:$1|тюрлендирди}}. $2.',
	'echo-email-subject-default' => '«{{SITENAME}}» сайтда джангы билдириу',
	'echo-email-body-default' => '«{{SITENAME}}» сайтда джангы билдириуюгюз барды:

$1',
	'echo-email-batch-body-default' => 'Сизни джангы билдириуюгюз барды.',
	'echo-email-footer-default' => '$2

Эл. почта бла ийилген билдириулени контролда тутар ючюн энчи джарашдырыуларыгъызны тинтигиз:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Эл. почта бла ийилген билдириулени контролда тутар ючюн <a href="$2" style="text-decoration:none; color: #3868B0;">энчи джарашдырыуларыгъызны тинтигиз</a><br />
$1',
	'echo-overlay-link' => 'Бютеу билдириуле',
	'echo-overlay-title' => '<b>Билдириуле</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Билдириуле}}</b> ($2 {{PLURAL|$2|окъулмагъандан}} $1 саны {{PLURAL|$1|кёргюзюлгенди}})', # Fuzzy
	'echo-mark-all-as-read' => 'Барысын да окъулгъанлача белгиле',
	'echo-date-today' => 'Бюгюн',
	'echo-date-yesterday' => 'Тюнене',
	'echo-load-more-error' => 'Къошакъ эсеблени алгъан сагъатда халат чыкъды.',
	'notification-edit-talk-page-bundle' => '$1 бла $3 {{PLURAL:$4|1=башха къошулуучу|башха къошулуучула}}, [[User talk:$2|сюзюу бетигизде]] билдириу {{GENDER:$1|къойду}}.', # Fuzzy
	'notification-page-linked-bundle' => '«$2» бетге «$3» бетден эмда башха $4 {{PLURAL:$5|бетден}} {{GENDER:$1|джибериу}} барды. [[Special:WhatLinksHere/$2|Бу бетге бютеу джибериулеге къарагъыз]]', # Fuzzy
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 бла $2 {{PLURAL:$3|1=башха къошулуучу|башха къошулуучула}}, сюзюу бетигизде билдириу {{GENDER:$1|къойду}}.', # Fuzzy
	'notification-page-linked-email-batch-bundle-body' => '«$2» бетге «$3» бетден эмда башха $4 {{PLURAL:$5|бетден}} {{GENDER:$1|джибериу}} барды.',
	'echo-email-batch-subject-daily' => '«{{SITENAME}}» проектде сизни $2 {{PLURAL:$2|джангы билдириуюгюз}} барды', # Fuzzy
	'echo-email-batch-subject-weekly' => '«{{SITENAME}}» проектде бу ыйыкъда сизге $2 {{PLURAL:$2|джангы билдириу}} келди.', # Fuzzy
	'echo-email-batch-body-intro-daily' => 'Салам, $1!
Сизге {{SITENAME}} сайтда бюгюннгю турумну юсюнден къысха хапар.',
	'echo-email-batch-body-intro-weekly' => 'Салам, $1!
Сизге {{SITENAME}} сайтда турумну юсюнден ыйыкъ сайын къысха хапар.',
	'echo-email-batch-link-text-view-all-notifications' => 'Бютеу билдириулени кёрюу',
	'echo-rev-deleted-text-view' => 'Бу бет версия джашырылыбды',
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
	'echo-specialpage' => 'Ming Meddeilonge', # Fuzzy
	'echo-anon' => 'Do moß Desch [$1 aanmälde] udder [$2 enlogge], öm Medeilonge krijje ze künne.',
	'echo-none' => 'Ende läzde Zigg häß De kein Medeilonge krääje.', # Fuzzy
	'notification-new-user' => '$1, welkumme op {{GENDER:Dative|{{SITENAME}}}}!', # Fuzzy
	'echo-email-subject-default' => 'En neue Medeilong op {{GRAMMAR:dative|{{ucfirst:{{SITENAME}}}}}}',
	'echo-email-body-default' => 'Do häss_en neue Medeilong op {{GRAMMAR:dative|{{ucfirst:{{SITENAME}}}}}}:

$1',
	'echo-overlay-link' => 'Alle Medeilonge{{int:ellipsis}}', # Fuzzy
	'echo-overlay-title' => 'Ming Medeilonge', # Fuzzy
	'echo-date-today' => 'Hück',
	'echo-date-yesterday' => 'Jäßtere',
);

/** Kurdish (Latin script) (Kurdî (latînî)‎)
 * @author George Animal
 */
$messages['ku-latn'] = array(
	'echo-new-messages' => 'Peyamên nû ji te re hene', # Fuzzy
);

/** Latin (Latina)
 * @author Autokrator
 * @author UV
 */
$messages['la'] = array(
	'echo-desc' => 'Modus nuntiorum mittendarum',
	'prefs-echo' => 'Nuntia',
	'prefs-emailsettings' => 'Praeferentiae litterarum electronicarum',
	'prefs-displaynotifications' => 'Praeferentiae nuntiorum',
	'prefs-echosubscriptions' => 'De his actionibus nuntiare',
	'prefs-newmessageindicator' => 'Nova nuntia',
	'echo-pref-send-me' => 'Mitte mihi:',
	'echo-pref-send-to' => 'Mittere ad:',
	'echo-pref-email-format' => 'Modus litterarum electronicarum:',
	'echo-pref-web' => 'Interrete',
	'echo-pref-email' => 'Litterae electronicae',
	'echo-pref-email-frequency-never' => 'Nullas litteras electronicas mittere',
	'echo-pref-email-frequency-daily' => 'Summarium cottidianum nuntiorum',
	'echo-pref-email-frequency-weekly' => 'Summarium hebdomadale nuntiorum',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Textus',
	'echo-pref-notify-show-link' => 'Nuntia in arca ferramentorum monstrare',
	'echo-pref-new-message-indicator' => 'Monstrare indicatorem paginarum disputationis nuntiorum in arca ferramentorum',
	'echo-learn-more' => 'Plura legere',
	'echo-new-messages' => 'Habes nuntia nova.', # Fuzzy
	'echo-category-title-edit-user-talk' => 'Paginae disputationis {{PLURAL:$1|nuntium|nuntia}}',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Nexus}} ad paginam',
	'echo-category-title-mention' => '{{PLURAL:$1|Mentio|Mentiones}}',
	'echo-category-title-other' => '{{PLURAL:$1|Alia}}',
	'echo-pref-tooltip-edit-user-talk' => 'Me certiorem facere si quis nuntium mittat vel in pagina disputationis mea respondat.',
	'echo-pref-tooltip-article-linked' => 'Me certiorem facere si quis paginam quam creavi nectit e quadam pagina commentationis.',
	'echo-pref-tooltip-mention' => 'Me certiorem facere si quis e quacumque pagina disputationis ad paginam usoris meam nectit.',
	'echo-no-agent' => '[Nemo]',
	'echo-no-title' => '[Nulla pagina]',
	'echo-error-preference' => 'Error: Praeferentias usoris adaptare non contigit.',
	'notifications' => 'Nuntia',
	'tooltip-pt-notifications' => 'Nuntia tua',
	'echo-specialpage' => 'Nuntia',
	'echo-anon' => 'Ut nuntia accipias, [$1 rationem crees] aut [$2 conventum aperias] rogamus.',
	'echo-none' => 'Nulla nuntia.',
	'echo-more-info' => 'Plura legere',
	'echo-feedback' => 'Responsa',
	'notification-link-text-view-message' => 'Nuntium spectare',
	'notification-link-text-view-mention' => 'Mentionem spectare',
	'notification-link-text-view-changes' => 'Mutata ostendere',
	'notification-link-text-view-page' => 'Vide paginam',
	'notification-link-text-view-edit' => 'Vide recensionem',
	'notification-page-linked-flyout' => '$2 nectum est a pagina [[:$3]].', # Fuzzy
	'notification-user-rights-add' => 'Nunc es sodalis {{PLURAL:$2|eius gregis|eorum gregium}}: $1',
	'notification-user-rights-remove' => 'Non iam es sodalis {{PLURAL:$2|eius gregis|eorum gregium}}: $1',
	'notification-new-user' => 'Salve ad {{grammar:accusative|{{SITENAME}}}}, $1!',
	'notification-page-linked-email-subject' => 'Pagina tua annexa est apud {{grammar:accusative|{{SITENAME}}}}',
	'notification-mention-email-subject' => '$1 tui {{GENDER:$1|mentionem fecit}} apud {{grammar:accusative|{{SITENAME}}}}',
	'notification-mention-email-batch-body' => '$1 tui {{GENDER:$1|mentionem fecit}} in $4 in "$3"',
	'echo-email-subject-default' => 'Nova nuntia apud {{grammar:accusative|{{SITENAME}}}}',
	'echo-email-body-default' => 'Habes nova nuntia apud {{grammar:accusative|{{SITENAME}}}}:

$1',
	'echo-email-batch-body-default' => 'Habes novum nuntium.',
	'echo-email-footer-default' => '$2

Ad aptandum quales litteras electronicas tibi mittantur praeferentias tuas vide:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Ad aptandum quales litteras electronicas tibi mittantur <a href="$2" style="text-decoration:none; color: #3868B0;">praeferentias tuas vide</a>.<br />
$1',
	'echo-overlay-link' => 'Omnia nuntia',
	'echo-overlay-title' => '<b>Nuntia</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Nuntium|Nuntia}}</b> (monstrans $1 de $2 inlectis)',
	'echo-mark-all-as-read' => 'Omnia perlecta indicare',
	'echo-date-today' => 'Hodie',
	'echo-date-yesterday' => 'Heri',
	'echo-load-more-error' => 'Error in plura eventa quaerendo.',
	'notification-page-linked-bundle' => '$2 nectum est a $3 et $4 {{PLURAL:$5|alia pagina|aliis paginis}}. [[Special:WhatLinksHere/$2|Omnes nexus ad hanc paginam spectare]]', # Fuzzy
	'echo-email-batch-subject-daily' => 'Habes {{PLURAL:$2|novum nuntium|nova nuntia}} apud {{grammar:accusative|{{SITENAME}}}}',
	'echo-email-batch-subject-weekly' => 'Habes {{PLURAL:$2|novum nuntium|nova nuntia}} apud {{grammar:accusative|{{SITENAME}}}} hac hebdomada',
	'echo-email-batch-body-intro-daily' => 'Salve $1,
Hoc est summarium actionum hodiernarum apud {{grammar:accusative|{{SITENAME}}}}.',
	'echo-email-batch-body-intro-weekly' => 'Salve $1,
Hoc est summarium actionum hebdomadum apud {{grammar:accusative|{{SITENAME}}}}.',
	'echo-email-batch-link-text-view-all-notifications' => 'Omnia nuntia spectare',
	'echo-rev-deleted-text-view' => 'Haec emendatio paginae oppressa est.',
);

/** Ladino (Ladino)
 * @author Menachem.Moreira
 * @author Universal Life
 */
$messages['lad'] = array(
	'prefs-emailsettings' => 'Opsyones del korreo elektroniko',
	'echo-pref-email' => 'Korreo elektroniko',
	'echo-pref-email-format-html' => 'HTML',
	'echo-category-title-article-linked' => 'Pajina{{PLURAL:$1|enlase|enlases}}',
	'notification-link-text-view-changes' => 'Amostrar los trocamientos',
	'notification-link-text-view-page' => 'Ver la hoja',
	'notification-link-text-view-edit' => 'Ver edisyon',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 * @author Soued031
 */
$messages['lb'] = array(
	'echo-desc' => 'Notifikatiounssystem',
	'prefs-echo' => 'Notifikatiounen',
	'prefs-emailsettings' => 'E-Mail-Astellungen',
	'prefs-displaynotifications' => 'Optioune vum Affichage',
	'prefs-echosubscriptions' => 'Mech iwwer dës Evenementer informéieren',
	'prefs-newmessageindicator' => 'Indicateur vun neie Messagen',
	'echo-pref-send-me' => 'Mir schécken:',
	'echo-pref-send-to' => 'Schécken un:',
	'echo-pref-email-format' => 'E-Mail-Format:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-Mail',
	'echo-pref-email-frequency-never' => 'Schéckt mir keng E-Mail-Notifikatiounen',
	'echo-pref-email-frequency-immediately' => "Individuell Notifikatiounen sou wéi s'erakommen",
	'echo-pref-email-frequency-daily' => 'All Dag e Resumé vun den Notifikatiounen',
	'echo-pref-email-frequency-weekly' => 'All Woch e Resumé vun den Notifikatiounen',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Kloertext',
	'echo-pref-notify-show-link' => 'Notifikatiounen a menger Geschirläischt weisen',
	'echo-pref-new-message-indicator' => 'Indicateur fir Messagen op menger Diskussiounssäit a menger Geschirläischt weisen',
	'echo-learn-more' => 'Fir méi ze wëssen',
	'echo-new-messages' => 'Dir hutt nei Messagen',
	'echo-category-title-edit-user-talk' => 'Diskussiounssäit {{PLURAL:$1|Message|Messagen}}',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Säitelink|Säitelinken}}',
	'echo-category-title-reverted' => '{{PLURAL:$1|Zréckgesetzung|Zrécksetzungen}} änneren',
	'echo-category-title-mention' => '{{PLURAL:$1|Mentioun|Mentiounen}}',
	'echo-category-title-other' => '{{PLURAL:$1|Aneren|Anerer}}',
	'echo-category-title-system' => '{{PLURAL:$1|System}}',
	'echo-pref-tooltip-edit-user-talk' => 'Mech informéiere wann een eppes op meng Diskussiounssäit schreift oder do äntwert.',
	'echo-pref-tooltip-article-linked' => 'Mech informéiere wann een an engem Artikel op eng Säit verlinkt, déi ech kreéiert hunn.',
	'echo-pref-tooltip-reverted' => "Mech informéiere wann ee meng Ännerung zrécksetzt oder andeems hien de 'Rollback'-Tool benotzt.",
	'echo-pref-tooltip-mention' => 'Mech informéiere wann een op iergendenger Diskussiounssäit e Link op meng Benotzersäit setzt.',
	'echo-no-agent' => '[Keen]',
	'echo-no-title' => '[Keng Säit]',
	'echo-error-no-formatter' => 'Keng Formatéierung fir Notifikatiounen definéiert.',
	'echo-error-preference' => 'Feeler: Benotzerastellung konnt net gemaach ginn.',
	'echo-error-token' => 'Feelerː Benotzertoken konnt net ofgeruff ginn.',
	'notifications' => 'Notifikatiounen',
	'tooltip-pt-notifications' => 'Är Notifikatiounen',
	'echo-specialpage' => 'Notifikatiounen',
	'echo-anon' => 'Fir Notifikatiounen ze kréien, [$1 maacht e Benotzerkont op] oder [$2 loggt Iech an]',
	'echo-none' => 'Dir hutt keng Notifikatiounen.',
	'echo-more-info' => 'Méi Informatiounen',
	'echo-feedback' => 'Feedback',
	'notification-link-text-view-message' => 'Message weisen',
	'notification-link-text-view-mention' => 'Mentioun weisen',
	'notification-link-text-view-changes' => 'Ännerunge weisen',
	'notification-link-text-view-page' => 'Säit weisen',
	'notification-link-text-view-edit' => 'Ännerung weisen',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|huet}} op Är [[User talk:$2#$3|Diskussiounssäit]] geschriwwen.',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|huet}} e Message op Ärer Diskussiounssäit ënner "[[User talk:$2#$3|$4]]" hannerlooss.',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|huet}} op Är [[User talk:$2#$3|Diskussiounssäit]] geschriwwen.',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|huet}} e Message op Ärer Diskussiounssäit ënner "[[User talk:$2#$3|$4]]" hannerlooss.',
	'notification-page-linked-flyout' => '$2 gouf vun der Säit [[:$3]] {{GENDER:$1|verlinkt}}.',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|huet}} eng Bemierkung iwwer "[[$3|$2]]" op der "$4" Diskussiounssäit geschriwwen.',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|huet}} en neit Thema "$2" op [[$3]] ugefaang.',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|huet}} Iech ee Message geschéckt: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|huet}} op "[[$3#$2|$2]]" op Ärer Diskussiounssäit eng Bemierkung gemaach',
	'notification-mention-flyout' => '$1 {{GENDER:$1|huet}} Iech op der $5 Diskussiounssäit bei "[[$3#$2|$4]]" ernimmt.',
	'notification-mention-nosection-flyout' => '$1 {{GENDER:$1|huet}} Iech op der [[$3|$2 Diskussiounssäit]] ernimmt.',
	'notification-user-rights-flyout' => 'Är Benotzerrechter goufe vum $1 {{GENDER:$1|geännert}}. $2. [[Special:ListGroupRights|Fir méi ze wëssen]]',
	'notification-user-rights-add' => 'Dir sidd elo Member vun {{PLURAL:$2|dësem Grupp|dëse Gruppen}}: $1',
	'notification-user-rights-remove' => 'Dir sidd net méi Member vun {{PLURAL:$2|dësem Grupp|dëse Gruppen}}: $1',
	'notification-new-user' => 'Wëllkomm op {{SITENAME}}, $1! Mir si frou Iech begréissen ze kënnen.',
	'notification-reverted2' => 'Är {{PLURAL:$4|Ännerung vu(n) [[:$2]] gouf|Ännerunge vu(n) [[:$2]] goufe}} vum [[User:$1|$1]] {{GENDER:$1|zréckgesat}}. $3',
	'notification-reverted-flyout2' => 'Är {{PLURAL:$4|Ännerung op $2 gouf|Ännerungen op $2 goufe}} vum $1 {{GENDER:$1|zréckgesat}} $3.',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|huet}} Iech en neie Message op Ärer Diskussiounssäit op {{SITENAME}} hannerlooss',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|huet}} ee Message op Är Diskussiounssäit geschriwwen:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|huet}} ee Message op Är Diskussiounssäit op "$2" geschriwwen.',
	'notification-page-linked-email-subject' => 'Är Säit gouf op {{SITENAME}} verlinkt',
	'notification-page-linked-email-batch-body' => '$2 gouf vu(n) $3 {{GENDER:$1|verlinkt}}.',
	'notification-reverted-email-subject2' => 'Är {{PLURAL:$3|Ännerung|Ännerungen}} op {{SITENAME}} {{PLURAL:$3|gouf|goufen}} {{GENDER:$1|zréckgesat}}',
	'notification-reverted-email-batch-body2' => 'Är {{PLURAL:$3|Ännerung vu(n) $2 gouf|Ännerunge vu(n) $2 goufe}} vum $1 {{GENDER:$1|zréckgesat}}.',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|huet}} Iech op {{SITENAME}} ernimmt',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|huet}} Iech op der $4 Diskussiounssäit ernimmt bei "$3".',
	'notification-mention-nosection-email-batch-body' => '$1 {{GENDER:$1|huet}} Iech op der $2 Diskussiounssäit ernimmt.',
	'notification-user-rights-email-subject' => 'Är Benotzerrechter op {{SITENAME}} hu geännert',
	'notification-user-rights-email-batch-body' => 'Är Benotzerrechter goufe vum $1 {{GENDER:$1|geännert}}. $2',
	'echo-email-subject-default' => 'Nei Notifikatioun op {{SITENAME}}',
	'echo-email-body-default' => 'Dir hutt eng nei Notifikatioun op {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Dir hutt eng Notifikatioun',
	'echo-email-footer-default' => '$2

Fir ze kontrolléiere wat fir eng E-Maile mir Iech schécken, kuckt Är Preferenzen no:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Fir ze kontrolléieren, watfir E-Maile mir Iech schécken, <a href="$2" style="text-decoration:none; color: #3868B0;">kuckt Är Astellungen no</a>.<br />
$1',
	'echo-overlay-link' => 'All Notifikatiounen',
	'echo-overlay-title' => '<b>Notifikatiounen</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Notifikatioun|Notifikatiounen}}</b> (weist $1 vun $2 net geliesten)',
	'echo-mark-all-as-read' => 'All als geliest markéieren',
	'echo-date-today' => 'Haut',
	'echo-date-yesterday' => 'Gëschter',
	'echo-load-more-error' => 'Am Sichen no méi Resultater ass e Feeler geschitt.',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 a(n) {{PLURAL:$3|een anere|$2 aner}} Benotzer {{GENDER:$1|hunn}} ee Message op Är Diskussiounssäit geschriwwen.',
	'echo-email-batch-subject-daily' => 'Dir hutt haut {{PLURAL:$2|eng nei Notifikatioun|nei Notifikatiounen}} op {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Dir hutt dës Woch {{PLURAL:$2|eng nei Notifikatioun|nei Notifikatiounen}} op {{SITENAME}}',
	'echo-email-batch-body-intro-daily' => 'Salut $1,

Hei ass e Resumé vun den Aktivitéite vun haut op {{SITENAME}} fir Iech.',
	'echo-email-batch-body-intro-weekly' => 'Salut $1,

Hei ass e Resumé vun den Aktivitéite vun dëser Woch op {{SITENAME}} fir Iech.',
	'echo-email-batch-link-text-view-all-notifications' => 'All Notifikatioune weisen',
	'echo-rev-deleted-text-view' => 'Dës Versioun vun der Säit gouf geläscht.',
);

/** لوری (لوری)
 * @author Bonevarluri
 * @author Mogoeilor
 */
$messages['lrc'] = array(
	'echo-desc' => 'وارسیاریا سامونه',
	'prefs-echosubscriptions' => 'مه نه سی ای رخ ونیا خوردار کو',
	'echo-pref-send-me' => 'کل کو سیم:',
	'echo-pref-send-to' => 'کل کو سی:',
	'echo-pref-email-format' => 'قالو ایمیل:',
	'echo-pref-web' => 'مالگه',
	'echo-pref-email' => 'پیومک برقی',
	'echo-pref-email-format-html' => 'اچ تی ام ال',
	'echo-pref-email-format-plain-text' => 'متن ساده',
	'echo-learn-more' => 'بيشتر يا بيئريت',
	'echo-new-messages' => 'شما پیغومیا تازه داریتو',
	'echo-category-title-edit-user-talk' => 'بلگه چک چنه {{جمی:$1|پیغوم|پیغومیا}}', # Fuzzy
	'echo-category-title-article-linked' => 'بلگه {{جمی:$1|هوم پیوند|هوم پیوندیا}}', # Fuzzy
	'echo-category-title-reverted' => 'ویایشت بکید {{جمی:$1|ورگشتی|ورگشتیا}}', # Fuzzy
	'echo-category-title-mention' => '{{جمی:$1|گوتن|گوتنیا}}', # Fuzzy
	'echo-category-title-other' => '{{جمی:$1|هنی}}', # Fuzzy
	'echo-category-title-system' => '{{جمی:$1|سیستم}}', # Fuzzy
	'echo-pref-tooltip-edit-user-talk' => 'مه نه وختی که یه نفر د بلگه چک چنم پیغوم می نه یا جواو می ئه خوردار کو.',
	'echo-no-agent' => '[هیشکی]',
	'echo-no-title' => '[بی بلگه]',
	'notifications' => 'وارسیاریا',
	'tooltip-pt-notifications' => 'وارسیاریا شما',
	'echo-more-info' => 'دونسمنیا هنی',
	'echo-feedback' => 'بازحرد',
	'notification-link-text-view-message' => 'دیئن پیغوما',
	'notification-link-text-view-mention' => 'گوته نه بیئنیت.',
	'notification-link-text-view-changes' => 'دیئن آلشتیا',
	'notification-link-text-view-page' => 'بلگه بوینیت',
	'notification-link-text-view-edit' => 'ویرایشت نه بوینیت',
	'notification-edit-talk-page-with-section' => '[[کارور:$1|$1]] {{جنس:$1|}} یه گل پیغوم د بلگه چک چنه شما نیا د "[[بلگه چک چنه:$2#$3|$4]]".', # Fuzzy
	'notification-edit-talk-page-flyout2' => '$1 {{جنس:$1|}}یه گل پیغوم د  [[چک چنه کارور:$2#$3|بلگه چک چنه]]تو نیائه.', # Fuzzy
	'notification-edit-talk-page-flyout-with-section' => '$1 {{جنس:$1|}}یه گل پیغوم د بلگه چک چنه شما نیائه" د[[چک چنه کارور:$2#$3|$4]]".', # Fuzzy
	'notification-page-linked-flyout' => '$2  {{جنس:$1|هوم پیوند دئه }}سی [[:$3]].',
	'notification-add-comment2' => '[[کارور:$1|$1]] {{جنس:$1|د}}د "[[$3|$2]]" د بلگه چک چنه "$4"  نیا.', # Fuzzy
	'notification-add-comment-yours2' => '[[کارور:$1|$1]] {{جنس:$1|د}}د "[[$3|$2]]" د بلگه چک چنه "$4"  نیا.', # Fuzzy
	'notification-user-rights' => 'حقوق کاروری تو [[ویجه:پهرستنومه/حقوق/$1|بیه {{جنس:$1|آلشت بیه }}]] وا [[کارور:$1|$1]]. $2. [[ویجه:نوم گه حقوق گرو|بیشتر بفئمید]]', # Fuzzy
	'notification-page-linked-email-subject' => 'بلگه شما د {{نوم مالگه}} هوم پیوند بیه',
	'echo-overlay-link' => 'همه وارسیاریا',
	'echo-mark-all-as-read' => 'همه نه د عنوان حنه بیه نشو بیه',
	'echo-date-today' => 'امرو',
	'echo-date-yesterday' => 'دوش،دیرو',
	'echo-email-batch-link-text-view-all-notifications' => 'همه وارسیاریانه بوینیت',
);

/** Lithuanian (lietuvių)
 * @author Eitvys200
 * @author Hugo.arg
 * @author Mantak111
 */
$messages['lt'] = array(
	'echo-desc' => 'Pranešimų sistema',
	'prefs-echo' => 'Pranešimai',
	'prefs-emailsettings' => 'El. pašto nustatymai', # Fuzzy
	'prefs-displaynotifications' => 'Rodymo nuostatos',
	'prefs-echosubscriptions' => 'Praneškite man apie šiuos įvykius',
	'prefs-newmessageindicator' => 'Naujų žinučių indikatorius',
	'echo-pref-send-me' => 'Siųskite man:',
	'echo-pref-send-to' => 'Siųsti:',
	'echo-pref-web' => 'Internetas',
	'echo-pref-email' => 'El. paštas',
	'echo-pref-email-frequency-never' => 'Nesiųskite man jokiu el. pašto pranešimų',
	'echo-learn-more' => 'Sužinokite daugiau',
	'echo-new-messages' => 'Jūs turite naujų žinučių', # Fuzzy
	'echo-no-agent' => '[Niekas]',
	'notifications' => 'Pranešimai',
	'tooltip-pt-notifications' => 'Jūsų pranešimai',
	'echo-specialpage' => 'Pranešimai',
	'echo-none' => 'Jūs turite jokių pranešimų.',
	'echo-more-info' => 'Daugiau informacijos',
	'echo-feedback' => 'Atsiliepimas',
	'notification-link-text-view-message' => 'Peržiūrėti žinutę',
	'notification-link-text-view-mention' => 'Peržiūrėti paminėjimą',
	'notification-link-text-view-changes' => 'Peržiūrėti pakeitimus',
	'notification-link-text-view-page' => 'Peržiūrėti puslapį',
	'notification-link-text-view-edit' => 'Peržiūrėti redagavimą',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|paliko}} žinutę jūsų [[User talk:$2#$3|aptarimų puslapyje]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|paliko}} žinutę jūsų aptarimų puslapyje "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|paliko}} žinutę jūsų [[User talk:$2#$3|aptarimų puslapyje]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|paliko}} žinutę jūsų aptarimų puslapyje "[[User talk:$2#$3|$4]]".',
	'notification-reverted2' => 'Jūsų {{PLURAL:$4|keitimas puslapyje [[:$2]]|keitimai [[:$2]] puslapyje}} buvo {{PLURAL:$4|atmestas|atmesti}} naudotojo [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => 'Jūsų {{PLURAL:$4|keitimas puslapyje $2|keitimai $2 puslapyje}} buvo {{PLURAL:$4|atmestas|atmesti}} naudotojo $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|paliko}} žinutę jums svetainėje {{SITENAME}}',
	'echo-email-batch-body-default' => 'Jūs turite naują pranešimą',
	'echo-overlay-link' => 'Visi pranešimai',
	'echo-overlay-title' => '<b>Pranešimai</b>',
	'echo-mark-all-as-read' => 'Pažymėti visus kaip skaitytus',
	'echo-date-today' => 'Šiandien',
	'echo-date-yesterday' => 'Vakar',
	'echo-load-more-error' => 'Įvyko klaida gaunant daugiau rezultatų.',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 ir $2 {{PLURAL:$3|kitas|kiti|kitų}} {{GENDER:$1|paliko}} žinutę jūsų aptarimų puslapyje.',
);

/** Latvian (latviešu)
 * @author Admresdeserv.
 * @author Edgars2007
 * @author Papuass
 */
$messages['lv'] = array(
	'echo-desc' => 'Paziņojumu sistēma',
	'prefs-echo' => 'Paziņojumi',
	'prefs-emailsettings' => 'E-pasta uzstādījumi',
	'prefs-displaynotifications' => 'Attēlošanas uzstādījumi',
	'prefs-echosubscriptions' => 'Paziņot man par šiem notikumiem',
	'prefs-newmessageindicator' => 'Jauna ziņojuma indikators',
	'echo-pref-send-me' => 'Nosūtīt man:',
	'echo-pref-send-to' => 'Nosūtīt uz:',
	'echo-pref-email-format' => 'E-pasta formāts:',
	'echo-pref-web' => 'Tīmeklis',
	'echo-pref-email' => 'E-pasts',
	'echo-pref-email-frequency-never' => 'Nesūtīt man e-pasta paziņojumus',
	'echo-pref-email-frequency-immediately' => 'Individuāli paziņojumi, tiklīdz tie ienāk',
	'echo-pref-email-frequency-daily' => 'Ikdienas paziņojumu kopsavilkums',
	'echo-pref-email-frequency-weekly' => 'Iknedēļas paziņojumu kopsavilkums',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Vienkāršs teksts',
	'echo-pref-notify-show-link' => 'Rādīt paziņojumus manā rīkjoslā',
	'echo-pref-new-message-indicator' => 'Rādīt diskusiju lapas ziņojumu indikatoru manā rīkjoslā',
	'echo-learn-more' => 'Uzzināt vairāk',
	'echo-new-messages' => 'tev ir jauni paziņojumi',
	'echo-category-title-edit-user-talk' => 'Diskusiju lapas {{PLURAL:$1|paziņojums|paziņojumi}}',
	'echo-category-title-article-linked' => 'Lapas {{PLURAL:$1|saite|saites}}',
	'echo-category-title-reverted' => '{{PLURAL:$1|Atcelts labojums|Atcelti labojumi}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Pieminēšana|Pieminēšanas}}',
	'echo-category-title-other' => '{{PLURAL:$1|Cits|Citi}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistēmas paziņojums|Sistēmas paziņojumi}}',
	'echo-pref-tooltip-edit-user-talk' => 'Paziņot man, kad kāds pievieno ziņojumu vai atbild manā diskusiju lapā.',
	'echo-pref-tooltip-article-linked' => 'Paziņot man, kad kāds izveido saiti uz manis izveidotu lapu.',
	'echo-pref-tooltip-reverted' => 'Paziņot man, kad kāds atceļ manis veiktu labojumu, izmanojot atcelšanas rīku.',
	'echo-pref-tooltip-mention' => 'Paziņot man, kad kāds izveido saiti uz manu lietotāja lapu no jebkuras diskusiju lapas.',
	'echo-no-agent' => '[Neviens]',
	'echo-no-title' => '[Nav lapas]',
	'echo-error-no-formatter' => 'Paziņojumam nav norādīts formatējums',
	'echo-error-preference' => 'Kļūda: Neizdevās uzstādīt lietotāja izvēli',
	'echo-error-token' => 'Kļūda: Neizdevās iegūt lietotāja identifikatoru',
	'notifications' => 'Paziņojumi',
	'tooltip-pt-notifications' => 'Jūsu paziņojumi',
	'echo-specialpage' => 'Paziņojumi',
	'echo-anon' => 'Lai saņemtu paziņojumus, [$1 izveidojiet lietotāja kontu] vai [$2 pieslēdzietes].',
	'echo-none' => 'Jums nav paziņojumu.',
	'echo-more-info' => 'Vairāk informācijas',
	'echo-feedback' => 'Atsauksmes',
	'notification-link-text-view-message' => 'Apskatīt ziņojumu',
	'notification-link-text-view-mention' => 'Apskatīt pieminēšanu',
	'notification-link-text-view-changes' => 'Apskatīt izmaiņas',
	'notification-link-text-view-page' => 'Apskatīt lapu',
	'notification-link-text-view-edit' => 'Apskatīt labojumu',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|atstāja}} paziņojumu jūsu [[User talk:$2#$3|diskusiju lapā]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|atstāja}} paziņojumu jūsu diskusiju lapā "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|atstāja}} paziņojumu jūsu [[User talk:$2#$3|diskusiju lapā]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|atstāja}} paziņojumu tavā diskusiju lapā "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => 'Uz [[:$2]] {{GENDER:$1|tika izveidota saite}} no [[:$3]]. [[Special:WhatLinksHere/$2|Apskatīt visas saites uz šo lapu]].',
	'notification-page-linked-flyout' => 'Uz $2 tika  {{GENDER:$1|izveidota saite}} no [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|komentēja}} par "[[$3|$2]]" "$4" diskusiju lapā',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|izveidoja}} jaunu tēmu "$2" [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|nosūtīja}} jums paziņojumu: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|komentēja}} par "[[$3#$2|$2]]" jūsu diskusiju lapā',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|pieminēja}} jūs $5 diskusiju lapā "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 {{GENDER:$1|pieminēja}} jūs $5 diskusiju lapā par "[[$3#$2|$4]]".',
	'notification-mention-nosection' => '[[User:$1|$1]] {{GENDER:$1|pieminēja}} tevi [[$3|$2 diskusiju lapā]].',
	'notification-mention-nosection-flyout' => '$1 {{GENDER:$1|pieminēja}} tevi [[$3|$2 diskusiju lapā]].',
	'notification-user-rights' => '[[User:$1|$1]] [[Special:Log/rights/$1|{{GENDER:$1|nomainīja}}]] tavas lietotāja tiesības. $2. [[Special:ListGroupRights|Skatīt informāciju]]',
	'notification-user-rights-flyout' => '$1 {{GENDER:$1|nomainīja}} tavas lietotāja tiesības. $2. [[Special:ListGroupRights|Skatīt informāciju]]',
	'notification-user-rights-add' => 'Jūs tagad esat {{PLURAL:$2|šīs grupas|šo grupu}} dalībnieks: $1',
	'notification-user-rights-remove' => 'Jūs vairs neesat {{PLURAL:$2|šīs grupas|šo grupu}} dalībnieks: $1',
	'notification-new-user' => 'Laipni lūdzam {{SITENAME}}, $1! Mēs priecājamies jūs te redzēt.',
	'notification-reverted2' => 'Jūsu {{PLURAL:$4|labojumu lapā [[:$2]]|labojumus lapā [[:$2]]}} {{GENDER:$1|atcēla}} [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => 'Jūsu {{PLURAL:$4|labojumu lapā $2|labojumus lapā $2}} {{GENDER:$1|atcēla}} $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|atstāja}} tev ziņojumu {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|atstāja}} paziņojumu jūsu diskusiju lapā:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|atstāja}} paziņojumu jūsu diskusiju lapā "$2".',
	'notification-page-linked-email-subject' => 'Uz jūsu lapu {{SITENAME}} tika izveidota saite',
	'notification-page-linked-email-batch-body' => '$3 lapā tika izveidota saite no $2', # Fuzzy
	'notification-reverted-email-subject2' => 'Jūsu {{PLURAL:$3|labojums tika {{GENDER:$1|atcelts}}|labojumi tika {{GENDER:$1|atcelti}}}} {{SITENAME}}',
	'notification-reverted-email-batch-body2' => 'Jūsu {{PLURAL:$3|labojumu $2|labojumus $2}} {{GENDER:$1|atcēla}} $1.',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|pieminēja}} jūs {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|pieminēja}} jūs $4 diskusiju lapā "$3".',
	'notification-mention-nosection-email-batch-body' => '$1 {{GENDER:$1|pieminēja}} tevi $2 diskusijas lapā.',
	'notification-user-rights-email-subject' => 'Jūsu lietotāja tiesības tika izmainītas {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Jūsu lietotāja tiesības {{GENDER:$1|izmainīja}} $1. $2.',
	'echo-email-subject-default' => 'Jauns paziņojums par {{SITENAME}}',
	'echo-email-body-default' => 'Jums ir jauns paziņojums par {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Jums ir jauns paziņojums.',
	'echo-email-footer-default' => '$2

Lai kontrolētu, kurus e-pastus mēs Jums sūtām, pārbaudiet savus uzstādījumus:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Lai kontrolētu, kurus e-pastus mēs Jums sūtām, <a href="$2" style="text-decoration:none; color: #3868B0;">pārbaudiet savus iestatījumus</a>.<br />
$1',
	'echo-overlay-link' => 'Visi paziņojumi',
	'echo-overlay-title' => '<b>Paziņojumi</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Paziņojumi}}</b> (rāda $1 no $2 nelasītiem)',
	'echo-mark-all-as-read' => 'Atzīmēt visus kā izlasītus',
	'echo-date-today' => 'Šodien',
	'echo-date-yesterday' => 'Vakar',
	'echo-load-more-error' => 'Ielasot vairāk rezultātus notika kļūda.',
	'notification-edit-talk-page-bundle' => '$1 un $3 {{PLURAL:$4|cits|citi}} {{GENDER:$1|atstāja}} paziņojumu tavā [[User talk:$2|diskusiju lapā]].',
	'notification-page-linked-email-batch-bundle-body' => '{{GENDER:$1|linked}} from $3 un $4 citās {{PLURAL:$5|lapā|lapās}} tika izveidota saite uz $2.',
	'echo-email-batch-subject-daily' => 'Jums ir {{PLURAL:$2|jauns paziņojums|jauni paziņojumi}} par {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Jums šonedēļ ir {{PLURAL:$2|jauns paziņojums|jauni paziņojumi}} par {{SITENAME}}',
	'echo-email-batch-body-intro-daily' => 'Sveiks $1,
Šis ir šīsdienas {{SITENAME}} aktivitāšu saraksts.',
	'echo-email-batch-body-intro-weekly' => 'Sveiks $1,
Šis ir šīs nedēļas {{SITENAME}} aktivitāšu saraksts.',
	'echo-email-batch-link-text-view-all-notifications' => 'Apskatīt visus paziņojumus',
);

/** Literary Chinese (文言)
 * @author Yanteng3
 */
$messages['lzh'] = array(
	'echo-new-messages' => '子有新訊息', # Fuzzy
);

/** Malagasy (Malagasy)
 * @author Jagwar
 */
$messages['mg'] = array(
	'echo-desc' => 'Rafitra fampilazana',
	'prefs-echo' => 'Filazana',
	'prefs-emailsettings' => "Safidin'ny mailaka",
	'prefs-displaynotifications' => 'Safidin-tseho',
	'prefs-echosubscriptions' => 'Ampandreneso momba ireo zava-mitranga ireo aho',
	'prefs-newmessageindicator' => 'Tondron-kafatra vaovao',
	'echo-pref-send-me' => 'Andefaso ahy:',
	'echo-pref-send-to' => 'Alefaso any amy:',
	'echo-pref-web' => 'Tranonkala',
	'echo-pref-email' => 'Mailaka',
	'echo-pref-email-frequency-never' => "Aza andefasana fampilazana amin'ny mailaka aho",
	'echo-pref-email-frequency-immediately' => 'Fampilazana tsirairay araky ny iaviany',
	'echo-pref-email-frequency-daily' => "Famintinana isan'andron'ny fampilazana",
	'echo-pref-email-frequency-weekly' => "Famintinana isan-kerinandron'ny fampilazana",
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Soratra tsotra',
	'echo-pref-notify-show-link' => "Asehoy ao amin'ny toolbar-ko ny fampilazana",
	'echo-pref-new-message-indicator' => "Haneho ny mpanondro hafatra ao amin'ny pejin-dresaka ao amin'ny toolbar-ko",
	'echo-learn-more' => 'Fampahalalana fanampiny',
	'echo-new-messages' => 'Misy hafatra vaovao.', # Fuzzy
	'echo-category-title-edit-user-talk' => 'Hafatry ny {{PLURAL:$1|pejin-dresaka}}',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Rohim-pejy}}',
	'echo-pref-tooltip-edit-user-talk' => "Ilazao aho raha misy mamela hafatra na mamaly hafatra eo amin'ny pejin-dresaka.",
	'echo-pref-tooltip-article-linked' => "Ilazao aho raha misy manisy rohy mankany amina pejy noforiko avy amin'ny pejin-dahatsoratra",
	'echo-no-agent' => '[Tsy misy]',
	'echo-no-title' => '[Tsy misy pejy]',
	'notifications' => 'Fampilazana',
	'tooltip-pt-notifications' => 'Ny fampilazanao',
	'echo-specialpage' => 'Fampilazana',
	'echo-more-info' => 'Fampahalalana fanampiny',
	'echo-feedback' => 'Famoahan-kevitra',
	'notification-link-text-view-message' => 'Hijery hafatra',
	'notification-link-text-view-mention' => 'Hijery ny zava-boamarika',
	'notification-link-text-view-changes' => 'Hijery ny fiovana',
	'notification-link-text-view-page' => 'Hijery ny pejy',
	'notification-link-text-view-edit' => 'Hijery ny fanovàna',
	'notification-edit-talk-page-email-batch-body-with-section' => 'Namela hafatra teo amin\'ny pejin-dresakao tanatin\'i "$2" i $1',
	'notification-user-rights-email-subject' => "Voaova teo amin'i {{SITENAME}} ny zom-pikambanao",
	'notification-user-rights-email-batch-body' => "Voaovan'i $1 ny zom-pikambanao. $2",
	'echo-email-subject-default' => "Fampilazana vaovao any amin'i {{SITENAME}}",
	'echo-email-body-default' => "Manana fampilazana vaovao ianao any amin'i {{SITENAME}}:

$1",
	'echo-email-batch-body-default' => 'Manana fampilazana vaovao ianao.',
	'echo-overlay-link' => 'Fampilazana rehetra',
	'echo-overlay-title' => '<b>Fampilazana</b>',
	'echo-mark-all-as-read' => 'Marihana ho voavaky',
	'echo-date-today' => 'Androany',
	'echo-date-yesterday' => 'Omaly',
	'echo-load-more-error' => 'Nisy hadisoana nitranga tam-panaovana fetch ny valiny.',
	'echo-email-batch-link-text-view-all-notifications' => 'Hijery ny fampilazana rehetra',
	'echo-rev-deleted-text-view' => 'Voafafa ity filazam-pajy ity.',
);

/** Macedonian (македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'echo-desc' => 'Известителен систем',
	'prefs-echo' => 'Известувања',
	'prefs-emailsettings' => 'Можности за е-пошта',
	'prefs-displaynotifications' => 'Нагодувања на приказот',
	'prefs-echosubscriptions' => 'Известувај ме за следниве настани',
	'prefs-newmessageindicator' => 'Показател за нови пораки',
	'echo-pref-send-me' => 'Испрати ми:',
	'echo-pref-send-to' => 'Испрати на:',
	'echo-pref-email-format' => 'Формат на е-пошта:',
	'echo-pref-web' => 'На вики',
	'echo-pref-email' => 'Е-пошта',
	'echo-pref-email-frequency-never' => 'Не ми праќај известувања на е-пошта',
	'echo-pref-email-frequency-immediately' => 'Поединечни известувања, едно по едно',
	'echo-pref-email-frequency-daily' => 'Дневен преглед на известувањата',
	'echo-pref-email-frequency-weekly' => 'Неделен преглед на известувањата',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Прост текст',
	'echo-pref-notify-show-link' => 'Прикажувај известувања во мојот алатник',
	'echo-pref-new-message-indicator' => 'Прикажувај показател за нови пораки (на стр. за разговор) во алатникот',
	'echo-learn-more' => 'Дознајте повеќе',
	'echo-new-messages' => 'Имате нови пораки',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Порака|Пораки}} на стран. за разговор',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Врска|Врски}} до стран.',
	'echo-category-title-reverted' => '{{PLURAL:$1|Вратено уредување|Вратени уредувања}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Спомнување|Спомнувања}}',
	'echo-category-title-other' => '{{PLURAL:$1|Друго}}',
	'echo-category-title-system' => '{{PLURAL:$1|Систем}}',
	'echo-pref-tooltip-edit-user-talk' => 'Извести ме кога некој ќе остави порака или ќе одговори на мојата страница за разговор.',
	'echo-pref-tooltip-article-linked' => 'Извести ме кога некој ќе се повика на статија што ја имам создадено.',
	'echo-pref-tooltip-reverted' => 'Извести ме кога некој ќе откаже уредување што го имам направено користејќи ја алатката за отповикување или враќање.',
	'echo-pref-tooltip-mention' => 'Извести ме кога некој ќе се повика на мојата корисничка страница од некоја страница за разговор.',
	'echo-no-agent' => '[Никој]',
	'echo-no-title' => '[Нема страница]',
	'echo-error-no-formatter' => 'Нема зададено форматирање за ова известување',
	'echo-error-preference' => 'Грешка: Не можам да го зададам нагодувањето',
	'echo-error-token' => 'Грешка: Не можев да ја добијам корисничката шифра',
	'notifications' => 'Известувања',
	'tooltip-pt-notifications' => 'Вашите известувања',
	'echo-specialpage' => 'Известувања',
	'echo-anon' => 'За да добивате известувања, [$1 направете сметка] или [$2 најавете се].',
	'echo-none' => 'Немате известувања.',
	'echo-more-info' => 'Повеќе информации',
	'echo-feedback' => 'Мислења',
	'echo-quotation-marks' => '„$1“',
	'notification-link-text-view-message' => 'Погл. порака',
	'notification-link-text-view-mention' => 'Погл. спомнување',
	'notification-link-text-view-changes' => 'Погл. промени',
	'notification-link-text-view-page' => 'Погл. страница',
	'notification-link-text-view-edit' => 'Погл. уредување',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|остави}} порака на вашата [[User talk:$2#$3|страница за разговор]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|остави}} порака на вашата страница за разговор во „[[User talk:$2#$3|$4]]“.',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|остави}} порака на вашата [[User talk:$2#$3|страница за разговор]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|остави}} порака на вашата страница за разговор во „[[User talk:$2#$3|$4]]“.',
	'notification-page-linked' => '[[:$2]] е {{GENDER:$1|наведена}} од [[:$3]].  [[Special:WhatLinksHere/$2|Погл. сите врски до страницава]].',
	'notification-page-linked-flyout' => '$2 е {{GENDER:$1|наведена}} на [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|коментираше}} на „[[$3|$2]]“ на страницата за разговор „$4“',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|ја објави}} новата тема „$2“ на [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|ви испрати}} порака: „[[$3#$2|$2]]“',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|коментираше}} на „[[$3#$2|$2]]“ на вашата страница за разговор',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|ве спомна}} во страницата $5 на „[[$3#$2|$4]]“.',
	'notification-mention-flyout' => '$1 {{GENDER:$1|ве спомна}} во страницата $5 на „[[$3#$2|$4]]“.',
	'notification-mention-nosection' => '[[User:$1|$1]] {{GENDER:$1|ве спомна}} на [[$3|страницата за разговор на $2]].',
	'notification-mention-nosection-flyout' => '$1 {{GENDER:$1|ве спомна}} во [[$3|страницата за разговор на $2]].',
	'notification-user-rights' => 'Вашите кориснички права се [[Special:Log/rights/$1|{{GENDER:$1|изменети}}]] од [[User:$1|$1]]. $2. [[Special:ListGroupRights|Дознајте повеќе]]',
	'notification-user-rights-flyout' => 'Вашите кориснички права се {{GENDER:$1|изменети}} од $1. $2. [[Special:ListGroupRights|Дознајте повеќе]]',
	'notification-user-rights-add' => 'Сега членувате во {{PLURAL:$2|оваа група|овие групи}}: $1',
	'notification-user-rights-remove' => 'Повеќе не членувате во {{PLURAL:$2|оваа група|овие групи}}: $1',
	'notification-new-user' => 'Добре дојдовте на {{SITENAME}}, $1! Драго ни е што сте тука.',
	'notification-reverted2' => '[[User:$1|$1]] {{PLURAL:$4|го|ги}} {{GENDER:$1|врати}} {{PLURAL:$4|вашето уредување на [[:$2]]|вашите уредувања на [[:$2]]}} $3',
	'notification-reverted-flyout2' => '$1 {{PLURAL:$4|го|ги}} {{GENDER:$1|врати}} {{PLURAL:$4|вашето уредување на $2|вашите уредувања на $2}} $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|ви остави}} порака на {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|остави}} порака на вашата страница за разговор:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|остави}} порака на вашата страница за разговор на „$2“.',
	'notification-page-linked-email-subject' => 'Ваша страница беше наведена на {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2 е {{GENDER:$1|наведена}} на $3',
	'notification-reverted-email-subject2' => '{{GENDER:$1|На}} {{SITENAME}} {{PLURAL:$3|е вратено ваше уредување|се вратени ваши уредувања}}',
	'notification-reverted-email-batch-body2' => '$1 {{GENDER:$1|врати}} {{PLURAL:$3|ваше уредување на $2|ваши уредувања на $2}}',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|ве спомна}} на {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|ве спомна}} во страницата $4 на „$3“.',
	'notification-mention-nosection-email-batch-body' => '$1 {{GENDER:$1|ве спомна}} во страницата за разговор на $2.',
	'notification-user-rights-email-subject' => 'Вашите кориснички права на {{SITENAME}} се изменети',
	'notification-user-rights-email-batch-body' => 'Вашите кориснички права се {{GENDER:$1|изменети}} од $1. $2',
	'echo-email-subject-default' => 'Ново известување на {{SITENAME}}',
	'echo-email-body-default' => 'Имате ново известување на {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Имате ново известување',
	'echo-email-footer-default' => '$2

Ако сакате да изберете какви пораки да добивате, појдете на страницата:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}} $1

$1',
	'echo-email-footer-default-html' => 'За да изберете какви писма да примате од нас, <a href="$2" style="text-decoration:none; color: #3868B0;">појдете во вашите нагодувања</a><br />
$1',
	'echo-overlay-link' => 'Сите известувања',
	'echo-overlay-title' => '<b>Известувања</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Известувања}}</b> ({{PLURAL:$1|прикажано|прикажани}} $1 од $2 непрочитани)',
	'echo-mark-all-as-read' => 'Означи ги сите како прочитани',
	'echo-date-today' => 'Денес',
	'echo-date-yesterday' => 'Вчера',
	'echo-load-more-error' => 'Се појави грешка при обидот да добијам повеќе резултати.',
	'notification-edit-talk-page-bundle' => '$1 и {{PLURAL:$4|уште еден друг|уште $3 други}} {{GENDER:$1|оставија}} порака на вашата [[User talk:$2|страница за разговор]].',
	'notification-page-linked-bundle' => '$2 е {{GENDER:$1|наведена}} на $3 и уште $4 {{PLURAL:$5|страница|страници}}. [[Special:WhatLinksHere/$2|Погл. сите врски до страницава]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 и уште {{PLURAL:$3|еден|$2 корисници}} {{GENDER:$1|оставија}} порака на вашата страница за разговор',
	'notification-page-linked-email-batch-bundle-body' => '$2 беше {{GENDER:$1|наведена}} од $3 и уште {{PLURAL:$5|една страница|$4 страници}}',
	'echo-email-batch-subject-daily' => 'Имате {{PLURAL:$2|ново известување|нови известувања}} на {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Неделава имате {{PLURAL:$2|ново известување|нови известувања}} на {{SITENAME}}',
	'echo-email-batch-body-intro-daily' => 'Здраво $1,
Ви даваме преглед на денешните збиднувања на {{SITENAME}}',
	'echo-email-batch-body-intro-weekly' => 'Здраво $1,
Ви даваме преглед на збиднувањата на {{SITENAME}} за оваа седмица',
	'echo-email-batch-link-text-view-all-notifications' => 'Погл. сите известувања',
	'echo-rev-deleted-text-view' => 'Оваа ревизија е скриена',
);

/** Malayalam (മലയാളം)
 * @author Praveenp
 * @author Santhosh.thottingal
 * @author Sidharthan
 * @author Vssun
 */
$messages['ml'] = array(
	'echo-desc' => 'അറിയിപ്പ് സംവിധാനം',
	'prefs-echo' => 'അറിയിപ്പുകൾ',
	'prefs-emailsettings' => 'ഇമെയിൽ ഐച്ഛികങ്ങൾ',
	'prefs-displaynotifications' => 'പ്രദർശന ഐച്ഛികങ്ങൾ',
	'prefs-echosubscriptions' => 'ഈ സംഭവങ്ങളെക്കുറിച്ച് എന്നെ അറിയിക്കുക',
	'prefs-newmessageindicator' => 'പുതിയ സന്ദേശത്തിന്റെ അടയാളം',
	'echo-pref-send-me' => 'അയക്കേണ്ട രീതി:',
	'echo-pref-send-to' => 'അയക്കേണ്ട വിലാസം:',
	'echo-pref-email-format' => 'ഇമെയിൽ എഴുത്തുരീതി:',
	'echo-pref-web' => 'വെബ്',
	'echo-pref-email' => 'ഇമെയിൽ',
	'echo-pref-email-frequency-never' => 'എനിക്ക് ഇമെയിൽ അറിയിപ്പുകൾ വേണ്ട',
	'echo-pref-email-frequency-immediately' => 'വരുന്ന മുറയ്ക്ക് വെവ്വേറെ അറിയിപ്പുകൾ',
	'echo-pref-email-frequency-daily' => 'ഒരു ദിവസത്തെ അറിയിപ്പുകളുടെ അവലോകനം',
	'echo-pref-email-frequency-weekly' => 'ഒരു ആഴ്ചയിലെ അറിയിപ്പുകളുടെ അവലോകനം',
	'echo-pref-email-format-html' => 'എച്ച്.റ്റി.എം.എൽ.',
	'echo-pref-email-format-plain-text' => 'വെറും എഴുത്ത്',
	'echo-pref-notify-show-link' => 'അറിയിപ്പുകൾ ടൂൾബാറിൽ പ്രദർശിപ്പിക്കുക',
	'echo-pref-new-message-indicator' => 'എന്റെ സംവാദത്താളിലെ സന്ദേശങ്ങളുടെ സൂചന ടൂൾബാറിൽ പ്രദർശിപ്പിക്കുക',
	'echo-learn-more' => 'കൂടുതൽ അറിയുക',
	'echo-new-messages' => 'താങ്കൾക്ക് പുതിയ സന്ദേശങ്ങൾ ഉണ്ട്',
	'echo-category-title-edit-user-talk' => 'സംവാദത്താളിലെ {{PLURAL:$1|സന്ദേശം|സന്ദേശങ്ങൾ}}',
	'echo-category-title-article-linked' => 'താളിലേയ്ക്കുള്ള {{PLURAL:$1|കണ്ണി|കണ്ണികൾ}}',
	'echo-category-title-reverted' => 'തിരുത്തൽ {{PLURAL:$1|മുൻപ്രാപനം|മുൻപ്രാപനങ്ങൾ}}',
	'echo-category-title-mention' => '{{PLURAL:$1|പരാമർശം|പരാമർശങ്ങൾ}}',
	'echo-category-title-other' => '{{PLURAL:$1|മറ്റുള്ളവ}}',
	'echo-category-title-system' => '{{PLURAL:$1|വ്യവസ്ഥ}}',
	'echo-pref-tooltip-edit-user-talk' => 'ആരെങ്കിലും എന്റെ സംവാദത്താളിൽ ഒരു സന്ദേശമോ മറുപടിയോ ഇട്ടാൽ എന്നെ അറിയിക്കുക.',
	'echo-pref-tooltip-article-linked' => 'ഞാൻ സൃഷ്ടിച്ച ഒരു ലേഖനതാളിൽ ആരെങ്കിലും കണ്ണി ചേർത്താൽ എന്നെ അറിയിക്കുക.',
	'echo-pref-tooltip-reverted' => 'തിരസ്കരണ അല്ലെങ്കിൽ മുൻപ്രാപന ഉപകരണമുപയോഗിച്ച് ആരെങ്കിലും ഞാൻ വരുത്തിയ തിരുത്തൽ ഒഴിവാക്കിയാൽ എന്നെ അറിയിക്കുക.',
	'echo-pref-tooltip-mention' => 'ആരെങ്കിലും എന്റെ ഉപയോക്തൃതാൾ ഏതെങ്കിലും സംവാദതാളിൽ നിന്ന് കണ്ണി ചേർത്താൽ എന്നെ അറിയിക്കുക.',
	'echo-no-agent' => '[ആരുമില്ല]',
	'echo-no-title' => '[താൾ ഇല്ല]',
	'echo-error-no-formatter' => 'അറിയിപ്പിനായി യാതൊരു രൂപവും നിർവ്വചിച്ചിട്ടില്ല',
	'echo-error-preference' => 'പിഴവ്: ഉപയോക്താവിന്റെ ക്രമീകരണങ്ങൾ സജ്ജീകരിക്കാൻ കഴിഞ്ഞില്ല',
	'echo-error-token' => 'പിഴവ്: ഉപയോക്താവിന്റെ ചീട്ട് എടുക്കാൻ കഴിഞ്ഞില്ല',
	'notifications' => 'അറിയിപ്പുകൾ',
	'tooltip-pt-notifications' => 'താങ്കൾക്കുള്ള അറിയിപ്പുകൾ',
	'echo-specialpage' => 'അറിയിപ്പുകൾ',
	'echo-anon' => 'അറിയിപ്പുകൾ ലഭിക്കാനായി, [$1 അംഗത്വമെടുക്കയോ] [$2 പ്രവേശിക്കുകയോ] ചെയ്യേണ്ടതാണ്.',
	'echo-none' => 'താങ്കൾക്ക് അറിയിപ്പുകളൊന്നുമില്ല.',
	'echo-more-info' => 'കൂടുതൽ വിവരങ്ങൾ',
	'echo-feedback' => 'പ്രതികരണം',
	'notification-link-text-view-message' => 'സന്ദേശം കാണുക',
	'notification-link-text-view-mention' => 'പരാമർശിച്ചിരിക്കുന്നത് കാണുക',
	'notification-link-text-view-changes' => 'മാറ്റങ്ങൾ കാണുക',
	'notification-link-text-view-page' => 'താൾ കാണുക',
	'notification-link-text-view-edit' => 'തിരുത്ത് കാണുക',
	'notification-edit-talk-page2' => 'താങ്കളുടെ [[User talk:$2#$3|സംവാദത്താളിൽ]] [[User:$1|$1]] ഒരു സന്ദേശം {{GENDER:$1|ചേർത്തിരിക്കുന്നു}} .',
	'notification-edit-talk-page-with-section' => "താങ്കളുടെ സംവാദത്താളിൽ ''[[User talk:$2#$3|$4]]'' എന്ന് [[User:$1|$1]] ഒരു സന്ദേശം {{GENDER:$1|ചേർത്തിരികുന്നു}} .",
	'notification-edit-talk-page-flyout2' => 'താങ്കളുടെ [[User talk:$2#$3|സംവാദത്താളിൽ]] $1 ഒരു സന്ദേശം {{GENDER:$1|ചേർത്തിരിക്കുന്നു}}.',
	'notification-edit-talk-page-flyout-with-section' => "താങ്കളുടെ സംവാദത്താളിൽ ''[[User talk:$2#$3|$4]]'' എന്ന് ഒരു സന്ദേശം  $1 {{GENDER:$1|ചേർത്തിരിക്കുന്നു}} .",
	'notification-page-linked' => '[[:$2]] എന്ന താളിലേയ്ക്ക് [[:$3]] എന്ന താളിൽ നിന്ന് കണ്ണി {{GENDER:$1|ചേർക്കപ്പെട്ടിരിക്കുന്നു}}: [[Special:WhatLinksHere/$2|ഈ താളിലേയ്ക്കുള്ള എല്ലാ കണ്ണികളും കാണുക]]',
	'notification-page-linked-flyout' => '$2 എന്ന താളിലേയ്ക്ക് [[:$3]] എന്ന താളിൽ നിന്ന് കണ്ണി {{GENDER:$1|ചേർക്കപ്പെട്ടിരിക്കുന്നു}}.',
	'notification-add-comment2' => '[[User:$1|$1]]  "$4" സംവാദത്താളിലെ "[[$3|$2]]" എന്നതിൽ {{GENDER:$1|കുറിപ്പിട്ടിരിക്കുന്നു}}',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] [[$3]] എന്ന താളിലെ "$2" എന്നതിൽ ഒരു പുതിയ വിഷയം {{GENDER:$1|ചേർത്തു}}.',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]]  താങ്കൾക്ക് ഒരു സന്ദേശം {{GENDER:$1|അയച്ചിട്ടുണ്ട്}}: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]] താങ്കളുടെ സംവാദത്താളിലെ "[[$3#$2|$2]]" എന്നതിൽ {{GENDER:$1|കുറിപ്പിട്ടു}}',
	'notification-mention' => '[[User:$1|$1]] താങ്കളെ $5 എന്ന സംവാദത്താളിൽ "[[$3#$2|$4]]" എന്ന് {{GENDER:$1|പരാമർശിച്ചിരിക്കുന്നു}}.',
	'notification-mention-flyout' => '$1 എന്ന ഉപയോക്താവ് താങ്കളെ $5 എന്ന സംവാദത്താളിലെ "[[$3#$2|$4]]" എന്ന ഭാഗത്ത് {{GENDER:$1|പരാമർശിച്ചിരിക്കുന്നു}}.',
	'notification-mention-nosection' => '[[$3|$2 സംവാദത്താളിൽ]] താങ്കളെ [[User:$1|$1]] {{GENDER:$1|പരാമർശിച്ചിരിക്കുന്നു}}.',
	'notification-mention-nosection-flyout' => '[[$3|$2 സംവാദത്താളിൽ]] താങ്കളെ $1 {{GENDER:$1|പരാമർശിച്ചിരിക്കുന്നു}}.',
	'notification-user-rights' => 'താങ്കളുടെ ഉപയോക്തൃ അവകാശങ്ങൾ [[User:$1|$1]] [[Special:Log/rights/$1|{{GENDER:$1|മാറ്റിയിരിക്കുന്നു}}]]. $2 . [[Special:ListGroupRights|കൂടുതലറിയുക]]',
	'notification-user-rights-flyout' => 'താങ്കളുടെ ഉപയോക്തൃ അവകാശങ്ങൾ $1 {{GENDER:$1|മാറ്റിയിരിക്കുന്നു}}. $2 . [[Special:ListGroupRights|കൂടുതലറിയുക]]',
	'notification-user-rights-add' => 'താങ്കളിപ്പോൾ {{PLURAL:$2|ഈ സംഘത്തിൽ|ഈ സംഘങ്ങളിൽ}} അംഗമാണ്: $1',
	'notification-user-rights-remove' => 'താങ്കളിപ്പോൾ {{PLURAL:$2|ഈ സംഘത്തിൽ|ഈ സംഘങ്ങളിൽ}} അംഗമല്ല: $1',
	'notification-new-user' => '{{SITENAME}} സംരംഭത്തിലേയ്ക്ക് സ്വാഗതം, $1! താങ്കളിവിടെ എത്തിയതിൽ സന്തോഷമുണ്ട്.',
	'notification-reverted2' => '[[:$2]] എന്ന താളിൽ, താങ്കൾ ചെയ്ത {{PLURAL:$4|തിരുത്ത്|തിരുത്തുകൾ}} [[User:$1|$1]] {{GENDER:$1|മുൻപ്രാപനം ചെയ്തിരിക്കുന്നു}}. $3',
	'notification-reverted-flyout2' => '$2 എന്ന താളിൽ, താങ്കൾ ചെയ്ത {{PLURAL:$4|തിരുത്ത്|തിരുത്തുകൾ}} $1 {{GENDER:$1|മുൻപ്രാപനം ചെയ്തിരിക്കുന്നു}}.  $3',
	'notification-edit-talk-page-email-subject2' => '{{SITENAME}} സംരംഭത്തിൽ, താങ്കൾക്കൊരു സന്ദേശം $1 {{GENDER:$1|ചേർത്തിട്ടുണ്ട്}}',
	'notification-edit-talk-page-email-batch-body2' => 'താങ്കളുടെ സംവാദത്താളിൽ, ഒരു സന്ദേശം $1 {{GENDER:$1|ചേർത്തിട്ടുണ്ട്}}:',
	'notification-edit-talk-page-email-batch-body-with-section' => 'താങ്കളുടെ സംവാദത്താളിൽ, "$2" എന്നതിൽ ഒരു സന്ദേശം $1 {{GENDER:$1|ചേർത്തിട്ടുണ്ട്}}.',
	'notification-page-linked-email-subject' => 'താങ്കളുടെ താൾ {{SITENAME}} സംരംഭത്തിൽ കണ്ണിചേർക്കപ്പെട്ടിരിക്കുന്നു',
	'notification-page-linked-email-batch-body' => '$2 എന്ന താളിലേയ്ക്ക് $3 എന്ന താളിൽ നിന്ന് കണ്ണി {{GENDER:$1|ചേർക്കപ്പെട്ടിരിക്കുന്നു}}',
	'notification-reverted-email-subject2' => '{{SITENAME}} സംരംഭത്തിൽ താങ്കൾ വരുത്തിയ {{PLURAL:$3|തിരുത്ത്|തിരുത്തുകൾ}} {{GENDER:$1|മുൻപ്രാപനം ചെയ്തിരിക്കുന്നു}}',
	'notification-reverted-email-batch-body2' => 'താങ്കൾ വരുത്തിയ {{PLURAL:$3|$2 താളിലെ തിരുത്ത്|$2 താളിലെ തിരുത്തുകൾ}} $1 {{GENDER:$1|മുൻപ്രാപനം ചെയ്തിരിക്കുന്നു}}',
	'notification-mention-email-subject' => '$1 താങ്കളെ {{SITENAME}} സംരംഭത്തിൽ {{GENDER:$1|പരാമർശിച്ചിരിക്കുന്നു}}',
	'notification-mention-email-batch-body' => '$1 താങ്കളെ $4 സംവാദത്താളിൽ "$3" എന്നതിൽ {{GENDER:$1|പരാമർശിച്ചിരിക്കുന്നു}}.',
	'notification-mention-nosection-email-batch-body' => '$2 സംവാദത്താളിൽ താങ്കളെ $1 {{GENDER:$1|പരാമർശിച്ചിരിക്കുന്നു}}.',
	'notification-user-rights-email-subject' => '{{SITENAME}} സംരംഭത്തിൽ താങ്കളുടെ അവകാശങ്ങളിൽ മാറ്റമുണ്ടായിരിക്കുന്നു',
	'notification-user-rights-email-batch-body' => 'താങ്കളുടെ ഉപയോക്തൃ അവകാശങ്ങൾ $1 {{GENDER:$1|മാറ്റിയിരിക്കുന്നു}}. $2',
	'echo-email-subject-default' => '{{SITENAME}} സംരംഭത്തിൽ അറിയിപ്പുണ്ട്',
	'echo-email-body-default' => '{{SITENAME}} സംരംഭത്തിൽ താങ്കൾക്ക് ഒരു അറിയിപ്പുണ്ട്:

$1',
	'echo-email-batch-body-default' => 'താങ്കൾക്ക് ഒരറിയിപ്പുണ്ട്',
	'echo-email-footer-default' => '$2

ഞങ്ങൾ താങ്കൾക്കയയ്ക്കുന്ന ഇമെയിലുകൾ നിയന്ത്രിക്കാൻ, താങ്കളുടെ ക്രമീകരണങ്ങൾ ഉപയോഗിക്കുക: {{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'ഞങ്ങൾ താങ്കൾക്കയയ്ക്കുന്ന ഇമെയിലുകൾ നിയന്ത്രിക്കാൻ, <a href="$2" style="text-decoration:none; color: #3868B0;">താങ്കളുടെ ക്രമീകരണങ്ങൾ പരിശോധിക്കുക</a>.<br />
$1',
	'echo-overlay-link' => 'എല്ലാ അറിയിപ്പുകളും',
	'echo-overlay-title' => '<b>അറിയിപ്പുകൾ</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|അറിയിപ്പുകൾ}}</b> (വായിക്കാത്ത $2 എണ്ണത്തിലെ $1 എണ്ണം കാണിക്കുന്നു)',
	'echo-mark-all-as-read' => 'എല്ലാം വായിച്ചതായി അടയാളപ്പെടുത്തുക',
	'echo-date-today' => 'ഇന്ന്',
	'echo-date-yesterday' => 'ഇന്നലെ',
	'echo-load-more-error' => 'കൂടുതൽ ഫലങ്ങൾ എടുക്കുന്നതിനിടെ ഒരു പിഴവുണ്ടായി.',
	'notification-edit-talk-page-bundle' => '$1 എന്നയാൾക്കുപുറമേ {{PLURAL:$4|മറ്റൊരാളും|മറ്റ് $3 പേരും}} താങ്കളുടെ [[User talk:$2|സംവാദത്താളിൽ]] സന്ദേശം {{GENDER:$1|ചേർത്തിരിക്കുന്നു}}.',
	'notification-page-linked-bundle' => '$2 എന്ന താളിലേയ്ക്ക് $3 എന്ന താളിൽ നിന്നും മറ്റ് $4 {{PLURAL:$5|താളിൽ|താളുകളിൽ}} നിന്നും കണ്ണി {{GENDER:$1|ചേർക്കപ്പെട്ടിരിക്കുന്നു}}. [[Special:WhatLinksHere/$2|ഈ താളിലേയ്ക്കുള്ള എല്ലാ കണ്ണികളും കാണുക]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 എന്ന ഉപയോക്താവും ഒപ്പം {{PLURAL:$3|മറ്റൊരു ഉപയോക്താവും|$2 മറ്റുപയോക്താക്കളും}} താങ്കളുടെ സം‌വാദത്താളിൽ സന്ദേശം {{GENDER:$1|ചേർത്തിരിക്കുന്നു}}.',
	'notification-page-linked-email-batch-bundle-body' => '$2 എന്ന താളിലേയ്ക്ക് $3 എന്ന താളിൽ നിന്നും മറ്റ് $4 {{PLURAL:$5|താളിൽ|താളുകളിൽ}} നിന്നും {{GENDER:$1|കണ്ണി ചേർക്കപ്പെട്ടിരിക്കുന്നു}}.',
	'echo-email-batch-subject-daily' => 'താങ്കൾക്ക് {{SITENAME}} സംരംഭത്തിൽ {{PLURAL:$2|ഒരു പുതിയ അറിയിപ്പ്|പുതിയ അറിയിപ്പുകൾ}} ഉണ്ട്',
	'echo-email-batch-subject-weekly' => 'താങ്കൾക്ക് ഈ ആഴ്ച, {{SITENAME}} സംരംഭത്തിൽ {{PLURAL:$2|പുതിയ ഒരറിയിപ്പ്|പുതിയ അറിയിപ്പുകൾ}} ഉണ്ട്',
	'echo-email-batch-body-intro-daily' => 'പ്രിയ $1,
{{SITENAME}} സംരംഭത്തിൽ, താങ്കളെ ബാധിക്കുന്ന ഇന്നത്തെ പ്രവർത്തനങ്ങളുടെ സംഗ്രഹം ഇതാ.',
	'echo-email-batch-body-intro-weekly' => 'പ്രിയ $1,
{{SITENAME}} സംരംഭത്തിൽ, താങ്കളെ ബാധിക്കുന്ന ഈ ആഴ്ചയിലെ പ്രവർത്തനങ്ങളുടെ സംഗ്രഹം ഇതാ.',
	'echo-email-batch-link-text-view-all-notifications' => 'എല്ലാ അറിയിപ്പുകളും കാണുക',
	'echo-rev-deleted-text-view' => 'താളിന്റെ ഈ നാൾപ്പതിപ്പ് ഒതുക്കിയിരിക്കുന്നു.',
);

/** Marathi (मराठी)
 * @author Nikhil.kawale
 * @author Niraj Suryawanshi
 * @author Prabodh1987
 * @author Sankoswal
 * @author V.narsikar
 */
$messages['mr'] = array(
	'echo-desc' => 'अधिसूचना प्रणाली',
	'prefs-echo' => 'अधिसूचना',
	'prefs-emailsettings' => 'विपत्र ऐच्छिके',
	'prefs-displaynotifications' => 'प्रदर्शित करण्याचे पर्याय',
	'prefs-echosubscriptions' => 'ह्या उपक्रमाबद्दल कळवावे',
	'prefs-newmessageindicator' => 'नवीन संदेश निर्देशक',
	'echo-pref-send-me' => 'मला पाठवा:',
	'echo-pref-send-to' => 'ला पाठवा:',
	'echo-pref-email-format' => 'विपत्र प्रारुप:',
	'echo-pref-web' => 'वेब',
	'echo-pref-email' => 'ई-मेल',
	'echo-pref-email-frequency-never' => 'ईमेलद्वारे मला अधिसूचना पाठविण्यात येऊ नये',
	'echo-pref-email-frequency-immediately' => 'वैयक्तीक अधिसूचना त्या जश्या प्राप्त होतील तेंव्हा',
	'echo-pref-email-frequency-daily' => 'अधिसूचनांचा दैनिक सारांश',
	'echo-pref-email-frequency-weekly' => 'अधिसूचनांचा साप्ताहिक सारांश',
	'echo-pref-email-format-html' => 'एचटीएमएल',
	'echo-pref-email-format-plain-text' => 'साधा मजकूर',
	'echo-pref-notify-show-link' => 'माझ्या साधनपेटीत अधिसूचना दाखवा',
	'echo-pref-new-message-indicator' => 'चर्चापान संदेश दर्शक माझ्या साधनपेटीत दाखवा',
	'echo-learn-more' => 'अधिक जाणून घ्या',
	'echo-new-messages' => 'तुमच्यासाठी नवीन संदेश आहेत.', # Fuzzy
	'echo-category-title-edit-user-talk' => 'चर्चा पान {{PLURAL:$1|संदेश}}',
	'echo-category-title-article-linked' => 'पान {{PLURAL:$1|दुवा|दुवे}}',
	'echo-category-title-reverted' => 'संपादन {{PLURAL:$1|उलटवा}}',
	'echo-category-title-mention' => '{{PLURAL:$1|उल्लेख}}',
	'echo-category-title-other' => '{{PLURAL:$1|इतर}}',
	'echo-category-title-system' => '{{PLURAL:$1|प्रणाली}}',
	'echo-pref-tooltip-edit-user-talk' => 'माझ्या चर्चापानावर कोणी संदेश किंवा उत्तर टाकल्यास मला कळवा.',
	'echo-pref-tooltip-article-linked' => 'मी तयार केलेल्या लेख पानाचा दुवा कोणी दुसरऱ्या लेख पानात दिल्यास मला कळवा.',
	'echo-pref-tooltip-reverted' => "मी केलेले संपादन जर कोणी 'रद्द करा' किंवा रोलबॅक साधन वापरून उलटवित असेल तर मला कळवा.",
	'echo-pref-tooltip-mention' => 'माझ्या सदस्यपानाचा दुवा जर कोणी इतर कुठल्याही चर्चापानात दिल्यास मला कळवा.',
	'echo-no-agent' => '[कोणीच नाही]',
	'echo-no-title' => '[कोणतेच पान नाही]',
	'echo-error-no-formatter' => 'अधिसूचनेसाठी कोणतेच प्रारुपण निश्चित नाही.',
	'echo-error-preference' => 'त्रूटी: सदस्य पसंतीक्रम स्थापता आला नाही.',
	'echo-error-token' => 'त्रूटी:सदस्य बिल्ला शोधू शकलो नाही.',
	'notifications' => 'अधिसूचना',
	'tooltip-pt-notifications' => 'आपल्या अधिसूचना',
	'echo-specialpage' => 'अधिसूचना',
	'echo-anon' => 'अधिसूचना मिळण्यास, [$1 create an account] किंवा [$2 log in].',
	'echo-none' => 'आपल्यासाठी काहीच अधिसूचना नाहीत.',
	'echo-more-info' => 'अधिक माहिती',
	'echo-feedback' => 'प्रतिक्रिया',
	'notification-link-text-view-message' => 'संदेश बघा',
	'notification-link-text-view-mention' => 'उल्लेख बघा',
	'notification-link-text-view-changes' => 'बदल बघा',
	'notification-link-text-view-page' => 'पान बघा',
	'notification-link-text-view-edit' => 'संपादन बघा',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|ने}} आपल्या [[User talk:$2#$3|चर्चा पानावर]] संदेश टाकला.',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|ने}} एक संदेश आपल्या चर्चा पानावर "[[User talk:$2#$3|$4]]" या मथळ्याखाली टाकला.',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|ने}} आपल्या [[User talk:$2#$3|चर्चा पानावर]] एक संदेश टाकला.',
	'notification-edit-talk-page-flyout-with-section' => "$1 {{GENDER:$1|ने}} ''[[User talk:$2#$3|$4]]'' या मथळ्याखाली  आपल्या चर्चा पानावर एक संदेश टाकला.",
	'notification-page-linked' => '[[:$2]] ला [[:$3]] वरून {{GENDER:$1|दुवा दिल्या गेला}}. [[Special:WhatLinksHere/$2|या पानाचे सर्व दुवे बघा]].',
	'notification-page-linked-flyout' => '$2 ला [[:$3]] वरुन {{GENDER:$1|दुवा दिल्या गेला}}.',
	'notification-add-comment2' => '[[User:$1|$1]] ने "[[$3|$2]]" वर, "$4" चर्चा पानावर{{GENDER:$1|शेरा टाकला}}.',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] ने [[$3]]वर नविन विषय "$2" {{GENDER:$1|टाकला}}.',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]]ने आपणास एक संदेश {{GENDER:$1|पाठविला}}:"[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]]ने "[[$3#$2|$2]]" बाबत आपल्या चर्चापानावर {{GENDER:$1|शेरा टाकला}}.',
	'notification-mention' => '[[User:$1|$1]]ने  "[[$3#$2|$4]]" मध्ये $5 चर्चापानावर आपला {{GENDER:$1|उल्लेख केला}}.',
	'notification-mention-flyout' => '$1 ने "[[$3#$2|$4]]" मध्ये $5 चर्चापानावर आपला {{GENDER:$1|उल्लेख केला}}',
	'notification-user-rights' => 'आपले सदस्य अधिकार [[User:$1|$1]]द्वारा [[Special:Log/rights/$1| {{GENDER:$1|बदलविण्यात आले}}]]. $2. [[Special:ListGroupRights|अधिक माहिती घ्या]]',
	'notification-user-rights-flyout' => 'आपले सदस्य अधिकार $1 द्वारा {{GENDER:$1|बदलविण्यात आले}}.$2. [[Special:ListGroupRights|अधिक माहिती घ्या]]',
	'notification-user-rights-add' => 'आपण आता {{PLURAL:$2|या गटाचे|या गटांचे}} सदस्य आहात:$1',
	'notification-user-rights-remove' => 'आपण यापुढे {{PLURAL:$2|या गटाचे|या गटांचे}} सदस्य नाहीत:
$1',
	'notification-new-user' => '$1! या {{SITENAME}}वर आपले स्वागत. आपण येथे आल्यामुळे आम्हास आनंद झाला.',
	'notification-reverted2' => 'आपले/ली{{PLURAL:$4|संपादन [[:$2]]वर|संपादने [[:$2]]वर}} [[User:$1|$1]]ने {{GENDER:$1|उलटवली}}. $3',
	'notification-reverted-flyout2' => 'आपले/ली {{PLURAL:$4|$2वरील संपादन|$2वरील संपादने}} $1ने {{GENDER:$1|उलटविलीत}}. $3',
	'notification-edit-talk-page-email-subject2' => '$1 ने {{SITENAME}}वर आपल्यासाठी एक संदेश {{GENDER:$1|टाकला}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 ने आपल्या चर्चा पानावर एक संदेश {{GENDER:$1|टाकला}}:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 ने "$2" मधील आपल्या चर्चा पानावर एक संदेश {{GENDER:$1|टाकला}}.',
	'notification-page-linked-email-subject' => '{{SITENAME}}वर आपले पान जोडल्या गेले आहे',
	'notification-page-linked-email-batch-body' => '$2 ला $3शी {{GENDER:$1|दुव्याने जोडण्यात आले आहे}}.',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|आपले {{SITENAME}} वरील संपादन {{GENDER:$1|उलटविले गेले}}|आपली {{SITENAME}} वरील  संपादने {{GENDER:$1|उलटवविली गेली}}}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|आपले $2 वरील संपादन|आपली $2 वरील संपादने}} $1 ने {{GENDER:$1|उलटविली}}.',
	'notification-mention-email-subject' => '$1 ने आपला {{SITENAME}} वर {{GENDER:$1|उल्लेख केला}}',
	'notification-mention-email-batch-body' => '$1 ने आपला "$3" मध्ये $4 चर्चापानावर {{GENDER:$1|उल्लेख केला}}.',
	'notification-user-rights-email-subject' => '{{SITENAME}} वर आपले सदस्य अधिकार बदलले आहेत',
	'notification-user-rights-email-batch-body' => '$1द्वारा आपले सदस्य अधिकार {{GENDER:$1|बदलविल्या गेलेत}}. $2.',
	'echo-email-subject-default' => '{{SITENAME}} वर एक नविन अधिसूचना',
	'echo-email-body-default' => '{{SITENAME}}वर आपणासाठी एक नविन अधिसूचना आहे:

$1',
	'echo-email-batch-body-default' => 'आपणासाठी एक नविन अधिसूचना आहे.',
	'echo-email-footer-default' => '$2

आम्ही आपणास पाठविण्याच्या विपत्रांवर नियंत्रणासाठी, आपला पसंतीक्रम तपासा:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'आम्ही आपणास पाठविलेल्या विपत्रांवर नियंत्रणासाठी, <a href="$2" style="text-decoration:none; color: #3868B0;">आपला पसंतीक्रम तपासा</a>.<br />
$1',
	'echo-overlay-link' => 'सर्व अधिसूचना',
	'echo-overlay-title' => '<b>अधिसूचना</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|अधिसूचना}}</b> ($2 पैकी $1 न वाचलेल्या)',
	'echo-mark-all-as-read' => 'वाचले म्हणून खूण करा',
	'echo-date-today' => 'आज',
	'echo-date-yesterday' => 'काल',
	'echo-load-more-error' => 'अधिक निकाल देण्यापोटी एक त्रूटी घडली.',
	'notification-edit-talk-page-bundle' => '$1 व $3 {{PLURAL:$4|इतरानी|इतरांनी}} आपल्या [[User talk:$2|चर्चा पानावर]] एक संदेश {{GENDER:$1|टाकला}}.',
	'notification-page-linked-bundle' => '$2 हे पान $3 व $4 यापासून, इतर {{PLURAL:$5|पानाशी|पानांशी}}{{GENDER:$1|जोडल्या गेले}}. [[Special:WhatLinksHere/$2|या पानाशी जोडलेले सर्व दुवे बघा]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 व $2 {{PLURAL:$3|इतरानी|इतरांनी}} आपल्या चर्चा पानावर एक संदेश  {{GENDER:$1|टाकला}}.',
	'notification-page-linked-email-batch-bundle-body' => '$2ला  $3शी व $4 इतर {{PLURAL:$5|पानाशी|पानांशी}} {{GENDER:$1|दुव्याने जोडल्या गेले}}.',
	'echo-email-batch-subject-daily' => 'आपल्यासाठी {{SITENAME}}वर {{PLURAL:$2|एक नविन अधिसूचना आहे|नविन अधिसूचना आहेत}}',
	'echo-email-batch-subject-weekly' => 'आपल्यासाठी या आठवड्यात {{SITENAME}}वर {{PLURAL:$2|एक नविन अधिसूचना आहे|नविन अधिसूचना आहेत}}',
	'echo-email-batch-body-intro-daily' => 'नमस्कार $1,
आपण {{SITENAME}}वर केलेल्या आजच्या क्रियाकलापांचा सारांश येथे आहे.',
	'echo-email-batch-body-intro-weekly' => 'नमस्कार $1,
आपण {{SITENAME}}वर केलेल्या या आठवड्याच्या क्रियाकलापांचा सारांश येथे आहे.',
	'echo-email-batch-link-text-view-all-notifications' => 'सर्व अधिसूचना पहा',
	'echo-rev-deleted-text-view' => 'या पानाची आवृत्ती दाबण्यात आलेली आहे.',
);

/** Malay (Bahasa Melayu)
 * @author Anakmalaysia
 */
$messages['ms'] = array(
	'echo-desc' => 'Sistem pemberitahuan',
	'prefs-echo' => 'Pemberitahuan',
	'prefs-emailsettings' => 'Pilihan e-mel',
	'prefs-displaynotifications' => 'Pilihan paparan',
	'prefs-echosubscriptions' => 'Beritahu saya tentang peristiwa-peristiwa ini',
	'prefs-newmessageindicator' => 'Indikator pesanan baru',
	'echo-pref-send-me' => 'Hantarkan saya:',
	'echo-pref-send-to' => 'Hantar kepada:',
	'echo-pref-email-format' => 'Format e-mel:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-mel',
	'echo-pref-email-frequency-never' => 'Jangan hantar sebarang pemberitahuan e-mel kepada saya',
	'echo-pref-email-frequency-immediately' => 'Pemberitahuan satu persatu',
	'echo-pref-email-frequency-daily' => 'Ringkasan pemberitahuan harian',
	'echo-pref-email-frequency-weekly' => 'Ringkasan pemberitahuan mingguan',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Teks biasa',
	'echo-pref-notify-show-link' => 'Paparkan pemberitahuan di palang alat saya',
	'echo-pref-new-message-indicator' => 'Paparkan indikator pesanan dari halaman perbincangan pada palang alat saya',
	'echo-learn-more' => 'Ketahui lebih lanjut',
	'echo-new-messages' => 'Anda ada pesanan baru', # Fuzzy
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Pesanan}} halaman perbualan',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Pautan}} halaman',
	'echo-category-title-reverted' => '{{PLURAL:$1|Pembalikan}} suntingan',
	'echo-category-title-mention' => '{{PLURAL:$1|Sebutan}}',
	'echo-category-title-other' => '{{PLURAL:$1|Lain-lain}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistem}}',
	'echo-pref-tooltip-edit-user-talk' => 'Beritahu saya apabila seseorang mengirim pesanan atau membalas halaman perbualan saya.',
	'echo-pref-tooltip-article-linked' => 'Beritahu saya apabila seseorang membuat pautan ke suatu halaman yang pernah saya wujudkan dari halaman rencana.',
	'echo-pref-tooltip-reverted' => "Beritahu saya apabila seseorang mengundurkan suntingan saya dengan menggunakan alat 'batalkan' atau 'undur'.",
	'echo-pref-tooltip-mention' => 'Beritahu saya apaila seseorang membuat pautan ke halaman pengguna saya dari sebarang halaman perbualan.',
	'echo-no-agent' => '[Tiada Sesiapa]',
	'echo-no-title' => '[Tiada halaman]',
	'echo-error-no-formatter' => 'Tiada pemformatan yang ditetapkan untuk pemberitahuan',
	'echo-error-preference' => 'Ralat: Keutamaan pengguna tidak boleh ditetapkan',
	'echo-error-token' => 'Ralat: Token pengguna tidak dapat diambil',
	'notifications' => 'Pemberitahuan',
	'tooltip-pt-notifications' => 'Pemberitahuan anda',
	'echo-specialpage' => 'Pemberitahuan',
	'echo-anon' => 'Untuk menerima pemberitahuan, sila [$1 buka akaun] atau [$2 log masuk].',
	'echo-none' => 'Tiada pemberitahuan untuk anda.',
	'echo-more-info' => 'Maklumat lanjut',
	'echo-feedback' => 'Maklum balas',
	'notification-link-text-view-message' => 'Lihat pesanan',
	'notification-link-text-view-mention' => 'Lihat sebutan',
	'notification-link-text-view-changes' => 'Lihat perubahan',
	'notification-link-text-view-page' => 'Lihat halaman',
	'notification-link-text-view-edit' => 'Lihat suntingan',
	'notification-edit-talk-page2' => '[[User:$1|$1]] telah {{GENDER:$1|meninggalkan}} pesanan di [[User talk:$2#$3|halaman perbualan]] anda.',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] telah {{GENDER:$1|meninggalkan}} pesanan di halaman perbualan anda di "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 telah {{GENDER:$1|meninggalkan}} pesanan di [[User talk:$2#$3|halaman perbualan]] anda.',
	'notification-edit-talk-page-flyout-with-section' => '$1 telah {{GENDER:$1|meninggalkan}} pesanan di halaman perbualan anda di "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => '[[:$2]] telah {{GENDER:$1|dipautkan}} dari [[:$3]]. [[Special:WhatLinksHere/$2|Lihat semua pautan ke halaman ini]].',
	'notification-page-linked-flyout' => '$2 telah {{GENDER:$1|dipautkan}} dari [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] telah {{GENDER:$1|mengulas}} tentang "[[$3|$2]]" di halaman perbualan "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] telah mengepos topik baru, "$2", di [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] telah {{GENDER:$1|mengirim}} pesanan kepada anda: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] telah {{GENDER:$1|mengulas}} tentang "[[$3#$2|$2]]" di halaman perbualan anda',
	'notification-mention' => '[[User:$1|$1]] telah {{GENDER:$1|menyebut}} anda di halaman perbualan $5 di "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 {{GENDER:$1|menyebut}} anda anda di halaman perbualan $5 di [[$3#$2|$4]].',
	'notification-user-rights' => 'Hak-hak pengguna anda telah [[Special:Log/rights/$1|{{GENDER:$1|diubah}}]] oleh [[User:$1|$1]]. $2. [[Special:ListGroupRights|Ketahui lebih lanjut]]',
	'notification-user-rights-flyout' => 'Hak-hak pengguna anda telah {{GENDER:$1|diubah}} oleh 	$1. $2. [[Special:ListGroupRights|Ketahui lebih lanjut]]',
	'notification-user-rights-add' => 'Anda kini menganggotai {{PLURAL:$2|kumpulan|kumpulan-kumpulan ini:}} $1',
	'notification-user-rights-remove' => 'Anda tidak lagi menganggotai {{PLURAL:$2|kumpulan|kumpulan-kumpulan ini:}} $1',
	'notification-new-user' => 'Selamat datang ke {{SITENAME}}, $1! Dengan sukacita kami menyambut kedatangan anda.',
	'notification-reverted2' => '{{PLURAL:$4|Suntingan|Suntingan-suntingan}} anda di [[:$2]] telah {{GENDER:$1|dibalikkan}} oleh [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Suntingan|Suntingan-suntingan}} anda di $2 telah {{GENDER:$1|dibalikkan}} oleh $1 $3',
	'notification-edit-talk-page-email-subject2' => '$1 telah {{GENDER:$1|meninggalkan}} pesanan untuk anda di {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 telah {{GENDER:$1|meninggalkan}} pesanan untuk anda di halaman perbualan anda:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 telah {{GENDER:$1|meninggalkan}} pesanan di halaman perbualan anda di "$2".',
	'notification-page-linked-email-subject' => 'Halaman anda telah dipautkan dengan {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2 telah {{GENDER:$1|dipautkan}} dari $3',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Suntingan|Suntingan-suntingan}} telah {{GENDER:$1|diundurkan}} di {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Suntingan|Suntingan-suntingan}} anda di $2 telah {{GENDER:$1|diundurkan}} oleh $1',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|menyebut}} anda di {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 telah {{GENDER:$1|menyebut}} anda di halaman perbualan $4 di "$3".',
	'notification-user-rights-email-subject' => 'Hak-hak pengguna anda telah berubah di {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Hak-hak pengguna anda telah {{GENDER:$1|diubah}} oleh $1. $2',
	'echo-email-subject-default' => 'Pemberitahuan baru di {{SITENAME}}',
	'echo-email-body-default' => 'Anda menerima pemberitahuan baru di {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Anda mempunyai pemberitahuan baru',
	'echo-email-footer-default' => '$2

Untuk mengubah pesanan-pesanan e-mel yang anda hendak kami hantar, semak keutamaan anda:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Untuk mengawal e-mel yang kami hantar kepada anda, <a href="$2" style="text-decoration:none; color: #3868B0;">semak keutamaan anda</a><br />
$1',
	'echo-overlay-link' => 'Semua pemberitahuan',
	'echo-overlay-title' => '<b>Pemberitahuan</b>',
	'echo-overlay-title-overflow' => '<b>Pemberitahuan</b> (memaparkan $1 daripada $2 yang belum dibaca)', # Fuzzy
	'echo-mark-all-as-read' => 'Tanda semua sebagai dibaca',
	'echo-date-today' => 'Hari ini',
	'echo-date-yesterday' => 'Semalam',
	'echo-load-more-error' => 'Ralat berlaku ketika mengambil lebih banyak hasil.',
	'notification-edit-talk-page-bundle' => '$1 dan $3 {{PLURAL:$4|orang lain}} telah {{GENDER:$1|meninggalkan}} pesanan di [[User talk:$2|halaman perbualan]] anda.',
	'notification-page-linked-bundle' => '$2 telah {{GENDER:$1|dipautkan}} dari $3 dan $4 {{PLURAL:$5|halaman}} yang lain. [[Special:WhatLinksHere/$2|Lihat semua pautan ke halaman ini]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 dan $2 {{PLURAL:$3|orang lain}} telah {{GENDER:$1|meninggalkan}} pesanan di halaman perbualan anda',
	'notification-page-linked-email-batch-bundle-body' => '$2 telah {{GENDER:$1|dipautkan}} dari $3 dan $4 {{PLURAL:$5|halaman}} lain',
	'echo-email-batch-subject-daily' => 'Anda ada {{PLURAL:$2|satu|beberapa}} pemberitahuan baru di {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Anda ada {{PLURAL:$2|satu|beberapa}} pemberitahuan baru di {{SITENAME}} minggu ini',
	'echo-email-batch-body-intro-daily' => '$1,
Yang berikut adalah ringkasan kegiatan hari ini di {{SITENAME}} untuk rujukan anda',
	'echo-email-batch-body-intro-weekly' => '$1,
Yang berikut adalah ringkasan kegiatan minggu ini di {{SITENAME}} untuk rujukan anda',
	'echo-email-batch-link-text-view-all-notifications' => 'Baca semua pemberitahuan',
	'echo-rev-deleted-text-view' => 'Semakan halaman ini telah digantung',
);

/** Maltese (Malti)
 * @author Chrisportelli
 * @author Leli Forte
 * @author MTSap
 */
$messages['mt'] = array(
	'echo-desc' => "Sistema ta' notifika",
	'prefs-echo' => 'Notifiki',
	'prefs-emailsettings' => 'Għażliet għall-posta elettronika',
	'prefs-displaynotifications' => "Għażla ta' kif trid tara n-notifiki",
	'prefs-echosubscriptions' => 'Għarrafni meta jiġru dawn',
	'prefs-newmessageindicator' => "Sinjal ta' messaġġi ġodda",
	'echo-pref-send-me' => 'Ibgħatli:',
	'echo-pref-send-to' => 'Ibgħat lil:',
	'echo-pref-email-format' => 'Format tal-posta elettronika:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Posta elettronika',
	'echo-pref-email-frequency-never' => 'Tibgħatli l-ebda notifika bil-posta elettronika',
	'echo-pref-email-frequency-immediately' => 'In-notifiki individwali kif jidħlu',
	'echo-pref-email-frequency-daily' => "Sommarju ta' kuljum tan-notifiki",
	'echo-pref-email-frequency-weekly' => "Sommarju ta' kull ġimgħa tan-notifiki",
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Test normali',
	'echo-pref-notify-show-link' => 'Uri n-notifiki fl-iżbarra tal-għodda',
	'echo-pref-new-message-indicator' => 'Uri s-sinjal tal-messaġġi l-ġodda fil-paġna tad-diskussjoni tiegħi fl-iżbarra tal-għodda',
	'echo-learn-more' => 'Aktar tagħrif',
	'echo-new-messages' => 'Għandek messaġġi ġodda.',
	'echo-category-title-edit-user-talk' => "{{PLURAL:$1|Messaġġ|Messaġġi}} fuq il-paġna ta' diskussjoni",
	'echo-category-title-article-linked' => "{{PLURAL:$1|Ħolqa|Ħoloq}} ma' paġna",
	'echo-category-title-reverted' => '{{PLURAL:$1|Modifika annullata|Modifiki annullati}}',
	'echo-category-title-mention' => 'Fejn {{PLURAL:$1|issemmejt}}',
	'echo-category-title-other' => '{{PLURAL:$1|Ieħor/Oħra|Oħrajn}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistema}}',
	'echo-pref-tooltip-edit-user-talk' => 'Għarrafni meta xi ħadd jiktibli messaġġ jew iweġibni fuq il-paġna tad-diskussjoni tiegħi.',
	'echo-pref-tooltip-article-linked' => 'Għarrafni meta xi ħadd joħloq ħolqa minn artiklu għal xi paġna li ħlaqt jien.',
	'echo-pref-tooltip-reverted' => 'Għarrafni meta xi ħadd permezz tal-għodda tal-annullament (undo) jew tat-treġġigħ lura (rollback) jannulla xi modifika li għamilt jien.',
	'echo-pref-tooltip-mention' => 'Għarrafni meta xi ħadd joħloq ħolqa minn xi paġna tad-diskussjoni għall-paġna tal-utent tiegħi.',
	'echo-no-agent' => '[Ħadd]',
	'echo-no-title' => '[L-ebda paġna]',
	'echo-error-no-formatter' => 'L-ebda formattazzjoni definita għan-notifiki',
	'echo-error-preference' => 'Żball: Il-preferenzi tal-utent ma setgħux jiġu ssettjati.',
	'echo-error-token' => 'Żball: It-token tal-utent ma setax jiġi rkuprat.',
	'notifications' => 'Notifiki',
	'tooltip-pt-notifications' => 'In-notifiki tiegħek',
	'echo-specialpage' => 'Notifiki',
	'echo-anon' => 'Sabiex tirċievi n-notifiki, [$1 oħloq kont] jew [$2 idħol fil-kont].',
	'echo-none' => "M'għandek l-ebda notifika",
	'echo-more-info' => 'Aktar informazzjoni',
	'echo-feedback' => 'Kummenti',
	'notification-link-text-view-message' => 'Ara l-messaġġ',
	'notification-link-text-view-mention' => 'Ara fejn issemmejt',
	'notification-link-text-view-changes' => 'Ara l-bidliet',
	'notification-link-text-view-page' => 'Ara l-paġna',
	'notification-link-text-view-edit' => 'Ara l-modifika',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|ħalla|ħalliet}} messaġġ fuq il-[[User talk:$2#$3|paġna tal-utent]] tiegħek.',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|ħalla|ħalliet}} messaġġ fuq il-paġna tad-diskussjoni tiegħek f\'"[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|ħalla|ħalliet}} messaġġ fuq il-[[User talk:$2#$3|paġna tad-diskussjoni]] tiegħek.',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|ħalla|ħalliet}} messaġġ fil-paġna tad-diskussjoni tiegħek f\' "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => '[[:$2]] {{GENDER:$1|inħalqitilha}} ħolqa minn [[:$3]]. [[Special:WhatLinksHere/$2|Ara l-ħoloq għal din il-paġna kollha]].',
	'notification-page-linked-flyout' => '$2 {{GENDER:$1|inħalqitilha}} ħolqa minn [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|ħalla|ħalliet}} kumment "[[$3|$2]]" fuq il-paġna tad-diskussjoni ta\' "$4".',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|beda|bdiet}} suġġett ġdid  "$2" fuq [[$3]].',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|bagħatlek|bagħtitlek}} messaġġ: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|ħalla|ħalliet}} kumment dwar "[[$3#$2|$2]]" fuq il-paġna tad-diskussjoni tiegħek.',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|semmiek|semmietek}} fuq il-paġna tad-diskussjoni ta\' $5 f\' "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 {{GENDER:$1|semmiek|semmietek}} fuq il-paġna tad-diskussjoni ta\' $5 f\' "[[$3#$2|$4]]".',
	'notification-user-rights' => "Id-drittijiet tiegħek ta' utent [[Special:Log/rights/$1|ġew {{GENDER:$1|modifikati}}]] minn [[User:$1|$1]]. $2. [[Special:ListGroupRights|Ara iżjed]]$1$1",
	'notification-user-rights-flyout' => "Id-drittijiet tiegħek ta' utent ġew {{GENDER:$1|modifikati}} minn $1. $2. [[Special:ListGroupRights|Ara iżjed]]",
	'notification-user-rights-add' => "Issa int membru ta' {{PLURAL:$2|dan il-grupp|dawn il-gruppi}}: $1",
	'notification-user-rights-remove' => "Int m'għadikx membru ta' {{PLURAL:$2|dan il-grupp|dawn il-gruppi}}: $1",
	'notification-new-user' => 'Merħba fuq {{SITENAME}}, $1! Qed nieħdu gost li ġejt hawn.',
	'notification-reverted2' => 'Il-{{PLURAL:$4|modifika|modifiki}} fuq [[:$2]] {{PLURAL:$4|ġiet annullata|ġew annullati}} {{GENDER:$1|minn}} [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => 'Il-{{PLURAL:$4|modifika|modifiki}} tiegħek fuq $2 {{PLURAL:$4|ġiet annullata|ġew annullati}} {{GENDER:$1|minn}} $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|ħallielek|ħallietlek}} messaġġ fuq {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|ħalla|ħalliet}} messaġġ fuq il-paġna tad-diskussjoni tiegħek:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|ħalla|ħalliet}} messaġġ fil-paġna tad-diskussjoni tiegħek f\' "$2".',
	'notification-page-linked-email-subject' => 'Inħolqot ħolqa għall-paġna tiegħek fuq {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2 {{GENDER:$1|inħalqitilha}} ħolqa minn $3.',
	'notification-reverted-email-subject2' => 'Il-{{PLURAL:$3|modifika tiegħek ġiet annullata|modifiki tiegħek ġew annullati}} {{GENDER:$1|fuq}} {{SITENAME}}',
	'notification-reverted-email-batch-body2' => 'Il-{{PLURAL:$3|modifika|modifiki}} tiegħek fuq $2 {{PLURAL:$3|ġiet annullata|ġew annullati}} {{GENDER:$1|minn}} $1.',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|semmiek|semmietek}} fuq {{SITENAME}}$1',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|semmiek|semmietek}} fuq il-paġna tad-diskussjoni ta\' $4 f\' "$3".',
	'notification-user-rights-email-subject' => "Id-drittijiet tiegħek ta' utent fuq {{SITENAME}} inbidlu.",
	'notification-user-rights-email-batch-body' => "Id-drittijiet tiegħek ta' utent {{GENDER:$1|biddilhom|biddlithom}} $1. $2.",
	'echo-email-subject-default' => 'Notifika ġdida fuq {{SITENAME}}',
	'echo-email-body-default' => 'Għandek notifika ġdida fuq {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Għandek notifika ġdida.',
	'echo-email-footer-default' => '$2

Biex tkun taf liema posta elettronika tasallek, iċċekkja l-preferenzi tiegħek: 
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Biex tikkontrolla liema posta elettronika nibagħtulek, <a href="$2" style="text-decoration:none; color: #3868B0;">iċċekkja l-preferenzi tiegħek</a>.<br /> 
$1',
	'echo-overlay-link' => 'In-notifiki kollha',
	'echo-overlay-title' => '<b>Notifiki</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Notifiki}}</b> (qegħdin jidhru $1 minn $2 li ma nqrawx)',
	'echo-mark-all-as-read' => 'Immarkahom kollha bħala li nqraw',
	'echo-date-today' => 'Illum',
	'echo-date-yesterday' => 'Ilbieraħ',
	'echo-load-more-error' => 'Sar żball waqt li kienu qegħdin jinkisbu iktar riżultati.',
	'notification-edit-talk-page-bundle' => '$1 u $3 {{PLURAL:$4|ieħor/oħra|oħrajn}} {{GENDER:$1|ħallew}} messaġġ fuq il-[[User talk:$2|paġna tad-diskussjoni]] tiegħek.',
	'notification-page-linked-bundle' => '$2 {{GENDER:$1|saritilha ħolqa}} minn $3 u $4 {{PLURAL:$5|paġna|paġni}} oħra. [[Special:WhatLinksHere/$2|Ara l-ħoloq kollha għal din il-paġna]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 u $2 {{PLURAL:$3|ieħor/oħra|oħra}} {{GENDER:$1|ħalla/ħalliet|ħallew}} messaġġ fuq il-paġna tad-diskussjoni tiegħek.',
	'notification-page-linked-email-batch-bundle-body' => '$2 saritilha {{GENDER:$1|ħolqa}} minn $3 u $4 {{PLURAL:$5|paġna|paġni}} oħra.',
	'echo-email-batch-subject-daily' => 'Għandek {{PLURAL:$2|notifika ġdida|notifiki ġodda}} fuq {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Għandek {{PLURAL:$2|notifika ġdida|notifiki ġodda}} fuq {{SITENAME}} dil-Ġimgħa',
	'echo-email-batch-body-intro-daily' => "X'hemm $1,
Dan hu s-sommarju tal-attività tal-lum fuq {{SITENAME}} biex tista' tarah.",
	'echo-email-batch-body-intro-weekly' => "X'hemm $1,
Dan hu s-sommarju tal-attività ta' din il-ġimgħa fuq {{SITENAME}} biex tista' tarah.",
	'echo-email-batch-link-text-view-all-notifications' => 'Ara n-notifiki kollha',
	'echo-rev-deleted-text-view' => 'Din ir-reviżjoni tal-paġna ġiet soppressa.',
);

/** Norwegian Bokmål (norsk bokmål)
 * @author Danmichaelo
 * @author Jeblad
 * @author Laaknor
 * @author Njardarlogar
 */
$messages['nb'] = array(
	'echo-desc' => 'Varslingssystem',
	'prefs-echo' => 'Varsler',
	'prefs-emailsettings' => 'E-postinnstillinger',
	'prefs-displaynotifications' => 'Visningsvalg',
	'prefs-echosubscriptions' => 'Varsle meg om disse hendelsene',
	'prefs-newmessageindicator' => 'Indikator for ny melding',
	'echo-pref-send-me' => 'Send meg:',
	'echo-pref-send-to' => 'Send til:',
	'echo-pref-email-format' => 'Epost-format:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-post',
	'echo-pref-email-frequency-never' => 'Ikke send meg e-postvarsler',
	'echo-pref-email-frequency-immediately' => 'Individuelle varsler fortløpende',
	'echo-pref-email-frequency-daily' => 'Daglig sammendrag av varsler',
	'echo-pref-email-frequency-weekly' => 'Ukentlig sammendrag av varsler',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Ren tekst',
	'echo-pref-notify-show-link' => 'Vis varslinger i verktøylinjen min',
	'echo-pref-new-message-indicator' => 'Vis indikator for nye meldinger i verktøylinjen min',
	'echo-learn-more' => 'Lær mer',
	'echo-new-messages' => 'Du har nye meldinger',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Melding|Meldinger}} på diskusjonsside',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Sidelenke|Sidelenker}}',
	'echo-category-title-reverted' => 'Tilbakestilling av {{PLURAL:$1|redigering|redigeringer}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Omtale|Omtaler}}',
	'echo-category-title-other' => '{{PLURAL:$1|Annet}}',
	'echo-category-title-system' => '{{PLURAL:$1|System}}',
	'echo-pref-tooltip-edit-user-talk' => 'Gi meg beskjed når noen skriver en melding eller svarer på diskusjonssiden min.',
	'echo-pref-tooltip-article-linked' => 'Gi meg beskjed når noen lenker til en side jeg opprettet fra en artikkel.',
	'echo-pref-tooltip-reverted' => 'Gi meg beskjed når noen tilbakestiller en redigering jeg gjorde.',
	'echo-pref-tooltip-mention' => 'Gi meg beskjed når noen lenker til brukersiden min fra en annen diskusjonsside.',
	'echo-no-agent' => '[Ingen]',
	'echo-no-title' => '[Ingen side]',
	'echo-error-no-formatter' => 'Ingen formatering definert for varselet',
	'echo-error-preference' => 'Feil: Kunne ikke lagre brukervalg',
	'echo-error-token' => 'Feil: Kunne ikke hente brukertegn',
	'notifications' => 'Varsler',
	'tooltip-pt-notifications' => 'Dine varsler',
	'echo-specialpage' => 'Varsler',
	'echo-anon' => 'For å motta varsler, [$1 opprett en konto] eller [$2 logg inn].',
	'echo-none' => 'Du har ingen varsler.',
	'echo-more-info' => 'Mer informasjon',
	'echo-feedback' => 'Tilbakemelding',
	'notification-link-text-view-message' => 'Vis melding',
	'notification-link-text-view-mention' => 'Vis omtale',
	'notification-link-text-view-changes' => 'Vis endringer',
	'notification-link-text-view-page' => 'Vis side',
	'notification-link-text-view-edit' => 'Vis redigering',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|skrev}} en melding på [[User talk:$2#$3|diskusjonssiden din]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|skrev}} en melding på diskusjonssiden din under «[[User talk:$2#$3|$4]]».',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|skrev}} en melding på [[User talk:$2#$3|diskusjonssiden din]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|skrev}} en melding på diskusjonssiden din under «[[User talk:$2#$3|$4]]».',
	'notification-page-linked' => '[[:$2]] ble {{GENDER:$1|lenket til}} fra [[:$3]]. [[Special:WhatLinksHere/$2|Se alle lenker til denne siden]].',
	'notification-page-linked-flyout' => '$2 ble {{GENDER:$1|lenket til}} fra [[:$3]].',
	'notification-add-comment2' => "[[User:$1|$1]] {{GENDER:$1|kommenterte}} på ''[[$3|$2]]'' på diskusjonssiden ''$4''",
	'notification-add-talkpage-topic2' => "[[User:$1|$1]] {{GENDER:$1|postet}} en ny tråd ''$2'' på [[$3]]",
	'notification-add-talkpage-topic-yours2' => "[[User:$1|$1]] {{GENDER:$1|sendte}} deg en melding: ''[[$3#$2|$2]]''",
	'notification-add-comment-yours2' => "[[User:$1|$1]] {{GENDER:$1|kommenterte}} på ''[[$3#$2|$2]]'' på diskusjonssiden din",
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|nevnte}} deg i «[[$3#$2|$4]]» på diskusjonssiden til $5.',
	'notification-mention-flyout' => '$1 {{GENDER:$1|nevnte}} deg i «[[$3#$2|$4]]» på diskusjonssiden til $5.',
	'notification-mention-nosection' => '[[User:$1|$1]] {{GENDER:$1|nevnte}} deg på [[$3|diskusjonssiden til «$2»]].',
	'notification-mention-nosection-flyout' => '$1 {{GENDER:$1|nevnte}} deg på [[$3|diskusjonssiden til «$2»]].',
	'notification-user-rights' => 'Brukerrettighetene dine [[Special:Log/rights/$1|ble {{GENDER:$1|endret}}]] av [[User:$1|$1]]. $2. [[Special:ListGroupRights|Lær mer]]',
	'notification-user-rights-flyout' => 'Brukerrettighetene dine ble {{GENDER:$1|endret}} av $1. $2. [[Special:ListGroupRights|Lær mer]]',
	'notification-user-rights-add' => 'Du er nå medlem av {{PLURAL:$2|denne gruppa|disse gruppene}}: $1',
	'notification-user-rights-remove' => 'Du er ikke lenger medlem av {{PLURAL:$2|denne gruppa|disse gruppene}}: $1',
	'notification-new-user' => 'Velkommen til {{SITENAME}}, $1! Hyggelig å se deg her.',
	'notification-reverted2' => '{{PLURAL:$4|Redigeringen din|Redigeringene dine}} på [[:$2]] har blitt {{GENDER:$1|tilbakestilt}} av [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Redigeringen din|Redigeringene dine}} på $2 har blitt {{GENDER:$1|tilbakestilt}} av $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|skrev}} en melding til deg på {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|skrev}} en melding på diskusjonssiden din:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|skrev}} en melding til deg under overskriften «$2» på diskussjonssiden din.',
	'notification-page-linked-email-subject' => 'Siden din ble lenket til på {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2 ble {{GENDER:$1|lenket}} til fra $3',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Redigeringen din|Redigeringene dine}} på {{SITENAME}} ble {{GENDER:$1|tilbakestilt}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Redigeringen din|Redigeringene dine}} på $2 har blitt {{GENDER:$1|tilbakestilt}} av $1.',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|nevnte}} deg på {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|nevnte}} deg i «$3» på diskusjonssiden til $4.',
	'notification-mention-nosection-email-batch-body' => '$1 {{GENDER:$1|nevnte}} deg på diskusjonssiden til «$2».',
	'notification-user-rights-email-subject' => 'Brukerrettighetene dine ble endret på {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Brukerrettighetene dine ble {{GENDER:$1|endret}} av $1. $2',
	'echo-email-subject-default' => 'Nytt varsel på {{SITENAME}}',
	'echo-email-body-default' => 'Du har et nytt varsel på {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Du har et nytt varsel',
	'echo-email-footer-default' => '$2

For å styre hva slags e-poster vi sender deg, sjekk innstillingene dine: {{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'For å kontrollere hvilke e-poster vi kan sende deg, <a href="$2" style="text-decoration:none; color: #3868B0;">sjekk innstillingene dine</a><br />
$1',
	'echo-overlay-link' => 'Alle varsler',
	'echo-overlay-title' => '<b>Varslinger</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Varsler}}</b> (viser $1 av $2 uleste)',
	'echo-mark-all-as-read' => 'Merk alle som leste',
	'echo-date-today' => 'I dag',
	'echo-date-yesterday' => 'I går',
	'echo-load-more-error' => 'En feil oppsto under henting av flere resultater.',
	'notification-edit-talk-page-bundle' => '$1 og $3 {{PLURAL:$4|annen|andre}} {{GENDER:$1|skrev}} en melding på [[User talk:$2|diskusjonssiden din]].',
	'notification-page-linked-bundle' => '$2 ble {{GENDER:$1|lenket til}} fra $3 og $4 {{PLURAL:$5|annen side|andre sider}}. [[Special:WhatLinksHere/$2|Se alle lenker til denne siden]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 og $2 {{PLURAL:$3|annen|andre}} {{GENDER:$1|skrev}} en melding på diskusjonssiden din',
	'notification-page-linked-email-batch-bundle-body' => '$2 ble {{GENDER:$1|lenket til}} fra $3 og $4 {{PLURAL:$5|annen side|andre sider}}',
	'echo-email-batch-subject-daily' => 'Du har {{PLURAL:$2|ett nytt varsel|nye varsler}} på {{SITENAME}} i dag',
	'echo-email-batch-subject-weekly' => 'Du har {{PLURAL:$2|ett nytt varsel|nye varsler}} på {{SITENAME}} denne uka',
	'echo-email-batch-body-intro-daily' => 'Hei $1,
Her er et sammendrag av dagens aktivitet på {{SITENAME}} for deg',
	'echo-email-batch-body-intro-weekly' => 'Hei $1,
Her er et sammendrag av ukas aktivitet på {{SITENAME}} for deg',
	'echo-email-batch-link-text-view-all-notifications' => 'Vis alle varsler',
	'echo-rev-deleted-text-view' => 'Denne siderevisjonen har blitt skjult',
);

/** Low German (Plattdüütsch)
 * @author Joachim Mos
 */
$messages['nds'] = array(
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-Mail',
	'echo-category-title-other' => 'Annere', # Fuzzy
);

/** Low Saxon (Netherlands) (Nedersaksies)
 * @author Servien
 */
$messages['nds-nl'] = array(
	'echo-desc' => 'Meldingssysteem',
	'prefs-echo' => 'Melding',
	'prefs-emailsettings' => 'Netpostinstellingen',
	'prefs-displaynotifications' => 'Weergave-instellingen',
	'prefs-echosubscriptions' => 'Stel mien op de heugte van disse gebeurtenissen',
	'prefs-newmessageindicator' => 'Melding nieje berichten',
	'echo-pref-send-me' => 'Stuur mien:',
	'echo-pref-send-to' => 'Sturen naor:',
	'echo-pref-email-format' => 'Netpostopmaak:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Netpost',
	'echo-pref-email-frequency-never' => 'Gien meldingen per netpost sturen',
	'echo-pref-email-frequency-immediately' => 'Individuele meldingen as ze binnenkoemen',
	'echo-pref-email-frequency-daily' => 'n Dagelikse samenvatting van meldingen',
	'echo-pref-email-frequency-weekly' => 'n Wekelikse samenvatting van meldingen',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Tekste zonder opmaak',
	'echo-pref-notify-show-link' => 'Laot melding in mien warkbalke zien',
	'echo-pref-new-message-indicator' => 'Laot meldingen over berichten op mien overlegzied in mien warkbalke zien',
	'echo-learn-more' => 'Meer lezen',
	'echo-new-messages' => 'Je hebben nieje berichten',
	'echo-category-title-edit-user-talk' => 'Bericht{{PLURAL:$1||en}} op mien overlegzied',
	'echo-category-title-article-linked' => 'Ziedverwiezing{{PLURAL:$1||en}}',
	'echo-category-title-reverted' => 'Bewarking{{PLURAL:$1||en}} weerummedreid',
	'echo-category-title-mention' => '{{PLURAL:$1|Eneumd}}',
	'echo-category-title-other' => '{{PLURAL:$1|Overige}}',
	'echo-category-title-system' => '{{PLURAL:$1|Systeem}}',
	'echo-pref-tooltip-edit-user-talk' => "Stuur m'n n melding as der ene n niej bericht op mien overlegzied zet of as e antwoordt.",
	'echo-pref-tooltip-article-linked' => "Stuur m'n n melding as der ene n verwiezing maakt naor n zied die'k an-emaakt hebbe.",
	'echo-pref-tooltip-reverted' => "Stuur m'n n melding as der ene n bewarking die'k an-ebröcht hebbe weerummedreit mit de funksie ongedaonmaken of weerummedreien.",
	'echo-pref-tooltip-mention' => "Stuur m'n n melding as der ene n verwiezing maakt naor mien gebrukerszied vanaof n overlegzied.",
	'echo-no-agent' => '[Gien ene]',
	'echo-no-title' => '[Gien zied]',
	'echo-error-no-formatter' => 'Der is gien opmaak in-esteld veur de melding.',
	'echo-error-preference' => 'Fout: de gebrukersinstelling kon niet in-esteld wörden',
	'echo-error-token' => 'Fout: t gebrukerstoken kon niet op-ehaold wörden',
	'notifications' => 'Meldingen',
	'tooltip-pt-notifications' => 'Joew meldingen',
	'echo-specialpage' => 'Meldingen',
	'echo-anon' => "[$1 Maak n gebrukerskonto n] of [$2 meld je eigen an] a'j meldingen ontvangen willen.",
	'echo-none' => 'Je hebben gien meldingen.',
	'echo-more-info' => 'Meer informasie',
	'echo-feedback' => 'Kommentaar',
	'notification-link-text-view-message' => 'Bericht bekieken',
	'notification-link-text-view-mention' => 'Vermelding bekieken',
	'notification-link-text-view-changes' => 'Verschil bekieken',
	'notification-link-text-view-page' => 'Zied bekieken',
	'notification-link-text-view-edit' => 'Bewarking bekieken',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|hef n bericht achtereleuten}} op joew [[User talk:$2#$3|overlegzied]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|hef}} n bericht op joew overlegzied achtereleuten in t onderwarp "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|hef n bericht achtereleuten}} op joew [[User talk:$2#$3|overlegzied]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|hef}} n bericht op joew overlegzied achtereleuten in t onderwarp "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => '[[:$2]] is {{GENDER:$1|ekoppeld}} vanaof [[:$3]]:[[Special:WhatLinksHere/$2|alle verwiezingen naor disse zied bekieken]].',
	'notification-page-linked-flyout' => '$2 is {{GENDER:$1|ekoppeld}} vanaof [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|hef ereageerd}} op "[[$3|$2]]" op de overlegzied "$4".',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|hef}} n niej onderwarp "$2" op [[$3]] ezet.',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|hef}} joe n bericht estuurd: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|hef ereageerd}} op "[[$3#$2|$2]]" op joew overlegzied',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|hef}} joe eneumd op de overlegzied van $5 in "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 {{GENDER:$1|hef}} joe eneumd op de overlegzied van $5 in "[[$3#$2|$4]]".',
	'notification-user-rights' => '[[Special:Log/rights/$1|Joew gebrukersrechten]] bin {{GENDER:$1|ewiezigd}} deur [[User:$1|$1]]. $2. [[Special:ListGroupRights|Meer informasie]]',
	'notification-user-rights-flyout' => 'Joew gebrukersrechten bin {{GENDER:$1|ewiezigd}} deur $1. $2. [[Special:ListGroupRights|Meer informasie]]',
	'notification-user-rights-add' => 'Je bin noen lid van disse groep{{PLURAL:$2||en}}: $1',
	'notification-user-rights-remove' => 'Je bin noen gien lid meer van disse groep{{PLURAL:$2||en}}: $1',
	'notification-new-user' => "Welkom op {{SITENAME}}, $1! Goed da'j der bin.",
	'notification-reverted2' => 'Joew {{PLURAL:$4|bewarking op [[:$2]] is|bewarkingen op [[:$2]] bin}} {{GENDER:$1|weerummedreid}} deur [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => 'Joew {{PLURAL:$4|bewarking op $2 is|bewarkingen op $2 bin}} {{GENDER:$1|weerummedreid}} deur $1 $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|hef}} n bericht veur joe achtereleuten op {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|hef}} n bericht achtereleuten op joew overlegzied:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|hef}} n bericht achtereleuten op joew overlegzied in "$2".',
	'notification-page-linked-email-subject' => "n Zied die'j an-emaakt hebbe is ekoppeld op {{SITENAME}}",
	'notification-page-linked-email-batch-body' => '$2 is {{GENDER:$1|ekoppeld}} vanaof $3.',
	'notification-reverted-email-subject2' => 'Joew {{PLURAL:$3|bewarking op {{SITENAME}} is|bewarkingen op {{SITENAME}} bin}} {{GENDER:$1|weerummedreid}}',
	'notification-reverted-email-batch-body2' => 'Joew {{PLURAL:$3|bewarking op $2 is|bewarkingen op $2 bin}} {{GENDER:$1|weerummedreid}} deur $1',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|hef}} joe eneumd op {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|hef}} joe eneumd op de overlegzied van $4 in "$3"',
	'notification-user-rights-email-subject' => 'Joew gebrukersrechten op {{SITENAME}} bin ewiezigd',
	'notification-user-rights-email-batch-body' => 'Joew gebrukersrechten bin {{GENDER:$1|ewiezigd}} deur $1. $2',
	'echo-email-subject-default' => 'Nieje melding op {{SITENAME}}',
	'echo-email-body-default' => 'Je hebben n nieje melding op {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Je hebben n nieje melding.',
	'echo-email-footer-default' => '$2

Volg de volgende verwiezing um te bepaolen hokken netberichten wie joe sturen:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Gao naor <a href="$2" style="text-decoration:none; color: #3868B0;">mien veurkeuren</a> um te bepaolen hokken netberichten wie joe sturen.<br />
$1',
	'echo-overlay-link' => 'Alle meldingen',
	'echo-overlay-title' => '<b>Meldingen</b>',
	'echo-overlay-title-overflow' => "<b>{{PLURAL:$1|Meldingen}}</b> ($1 van $2 he'j nog niet elezen)",
	'echo-mark-all-as-read' => 'Alles as elezen markeren',
	'echo-date-today' => 'Vandage',
	'echo-date-yesterday' => 'Gisteren',
	'echo-load-more-error' => 'Der is wat mis egaon bie t ophaolen van meer resultaoten.',
	'notification-edit-talk-page-bundle' => '$1 en $3 {{PLURAL:$4|aandere gebruker|aandere gebrukers}} hebben n bericht {{GENDER:$1|achtereleuten}} op joew [[User talk:$2|overlegzied]].',
	'notification-page-linked-bundle' => '$2 is {{GENDER:$1|ekoppeld}} vanaof $3 en $4 aandere {{PLURAL:$5|zied|ziejen}}. [[Special:WhatLinksHere/$2|Alle verwiezingen naor disse zied bekieken]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 en $2 {{PLURAL:$3|aandere gebruker|aandere gebrukers}} {{GENDER:$1|hebben}} n bericht op joew overlegzied achtereleuten.',
	'notification-page-linked-email-batch-bundle-body' => '$2 is {{GENDER:$1|ekoppeld}} vanaof $3 en $4 aandere {{PLURAL:$5|zied|ziejen}}',
	'echo-email-batch-subject-daily' => 'Je hebben {{PLURAL:$2|n nieje melding|nieje meldingen}} op {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Je hebben disse weke {{PLURAL:$2|n nieje melding|nieje meldingen}} op {{SITENAME}}',
	'echo-email-batch-body-intro-daily' => "Huj $1,
Hier he'j n samenvatting van de aktiviteiten op {{SITENAME}} van vandage",
	'echo-email-batch-body-intro-weekly' => "Huj $1,
Hier he'j n samenvatting van de aktiviteiten op {{SITENAME}} van disse weke.",
	'echo-email-batch-link-text-view-all-notifications' => 'Alle mededelingen bekieken',
	'echo-rev-deleted-text-view' => 'Disse ziedversie is onderdrokt.',
);

/** Nepali (नेपाली)
 * @author सरोज कुमार ढकाल
 */
$messages['ne'] = array(
	'echo-desc' => 'जानकारी प्रणाली',
	'prefs-echo' => 'जानकारीहरू',
	'prefs-emailsettings' => 'इमेल विकल्पहरु',
	'prefs-displaynotifications' => 'प्रदर्शन विकल्पहरू',
	'prefs-echosubscriptions' => 'निम्न घटनाहरूबारे मलाई जानकारी गराउने',
	'prefs-newmessageindicator' => 'नयाँ जानकारी सुचक',
	'echo-pref-send-me' => 'मलाई पठाउने:',
	'echo-pref-send-to' => 'पठाउने:',
	'echo-pref-email-format' => 'इमेल ढाँचा :',
	'echo-pref-web' => 'वेब',
	'echo-pref-email' => 'इमेल',
	'echo-pref-email-frequency-never' => 'मलाई कुनै पनि इमेल जानकारी नपठाउने',
	'echo-pref-email-frequency-immediately' => 'जानकारीहरू जस्ताको तस्तै जसै हुन्छन्',
	'echo-pref-email-frequency-daily' => 'दैनिक जानकारीको सारांश',
	'echo-pref-email-frequency-weekly' => 'साप्ताहिक जानकारीको सारांश',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'साधारण पाठ',
	'echo-pref-notify-show-link' => 'मेरो टुलबारमा देखाउने',
	'echo-pref-new-message-indicator' => 'टुलबारमा मेरो वार्तालाप पृष्ठको सन्देश पनि देखाउने',
	'echo-learn-more' => 'थप जानकारी',
	'echo-new-messages' => 'तपाईंको लागि नयाँ सन्देशहरू छन्',
	'echo-category-title-edit-user-talk' => 'वार्तालाप पृष्ठ  {{PLURAL:$1|सन्देश|सन्देशहरू}}',
	'echo-category-title-article-linked' => 'पृष्ठ {{PLURAL:$1|लिङ्क|लिङ्कहरू}}',
	'echo-category-title-reverted' => 'सम्पादन {{PLURAL:$1|रिभर्ट|रिभर्टहरू}}',
	'echo-category-title-mention' => '{{PLURAL:$1|नाम लिइयो|नामहरू लिइयो}}',
	'echo-category-title-other' => '{{PLURAL:$1|अरु}}',
	'echo-category-title-system' => '{{PLURAL:$1|प्रणाली}}',
	'notifications' => 'जानकारीहरू',
	'echo-specialpage' => 'जानकारीहरू',
	'echo-none' => 'तपाईँको लागि नयाँ जानकारी छैन ।',
	'echo-more-info' => 'थप जानकारी',
	'echo-feedback' => 'प्रतिक्रिया',
	'notification-link-text-view-message' => 'सन्देश हेर्ने',
	'notification-link-text-view-mention' => 'नाम लिइएको हेर्ने',
	'notification-link-text-view-changes' => 'परिवर्तन हेर्ने',
	'notification-link-text-view-page' => 'पृष्ठ हेर्ने',
	'notification-link-text-view-edit' => 'सम्पादन हेर्ने',
	'echo-email-batch-body-default' => 'तपाईँको लागि नयाँ जानकारी छ ।',
	'echo-overlay-link' => 'सबै जानकारीहरु',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|जानकारीहरू}}</b> ($2 मध्येका $1 नहेरिएका जानकारीहरू )',
	'echo-mark-all-as-read' => 'सबै पढिएको भनि चिनो लगाउने',
	'echo-date-today' => 'आज',
	'echo-date-yesterday' => 'हिजो',
	'echo-email-batch-link-text-view-all-notifications' => 'सबै जानकारीहरु हेर्नुहोस्',
	'echo-rev-deleted-text-view' => 'यो पृष्ठको पुनरावलोकन दबाइएको छ ।',
);

/** Dutch (Nederlands)
 * @author Edokter
 * @author Kippenvlees1
 * @author Mathonius
 * @author Nemo bis
 * @author Rcdeboer
 * @author Romaine
 * @author SPQRobin
 * @author Siebrand
 * @author Southparkfan
 * @author User555
 * @author Whaledad
 */
$messages['nl'] = array(
	'echo-desc' => 'Meldingensysteem',
	'prefs-echo' => 'Meldingen',
	'prefs-emailsettings' => 'E-mailinstellingen',
	'prefs-displaynotifications' => 'Weergaveopties',
	'prefs-echosubscriptions' => 'Houd mij op de hoogte over deze gebeurtenissen',
	'prefs-newmessageindicator' => 'Melding nieuwe berichten',
	'echo-pref-send-me' => 'Wanneer verzenden:',
	'echo-pref-send-to' => 'Verzenden naar:',
	'echo-pref-email-format' => 'E-mailopmaak:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-mail',
	'echo-pref-email-frequency-never' => 'U geen meldingen via e-mail sturen',
	'echo-pref-email-frequency-immediately' => 'Individuele meldingen wanneer ze binnenkomen',
	'echo-pref-email-frequency-daily' => 'Een dagelijkse samenvatting van meldingen',
	'echo-pref-email-frequency-weekly' => 'Een wekelijkse samenvatting van meldingen',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Platte tekst',
	'echo-pref-notify-show-link' => 'Meldingen weergeven in mijn werkbalk',
	'echo-pref-new-message-indicator' => 'Toon overlegpagina-berichtenindicator in mijn werkbalk',
	'echo-learn-more' => 'Meer lezen',
	'echo-new-messages' => 'U heeft nieuwe berichten',
	'echo-category-title-edit-user-talk' => 'Bericht{{PLURAL:$1||en}} op uw overlegpagina',
	'echo-category-title-article-linked' => 'Paginakoppeling{{PLURAL:$1||en}}',
	'echo-category-title-reverted' => 'Bewerking{{PLURAL:$1||en}} teruggedraaid',
	'echo-category-title-mention' => '{{PLURAL:$1|Genoemd}}',
	'echo-category-title-other' => '{{PLURAL:$1|Overige}}',
	'echo-category-title-system' => '{{PLURAL:$1|Systeem}}',
	'echo-pref-tooltip-edit-user-talk' => 'Houd mij op de hoogte wanneer iemand een bericht of antwoord op mijn overlegpagina plaatst.',
	'echo-pref-tooltip-article-linked' => 'Houd mij op de hoogte wanneer iemand vanaf een artikelpagina linkt naar een pagina die ik gemaakt.',
	'echo-pref-tooltip-reverted' => 'Houd mij op de hoogte wanneer iemand een bewerking van mij terugdraait met behulp van "ongedaan maken" of "terugdraaien".',
	'echo-pref-tooltip-mention' => 'Houd mij op de hoogte wanneer iemand een link naar mijn gebruikerspagina plaats op een overlegpagina.',
	'echo-no-agent' => '[Niemand]',
	'echo-no-title' => '[Geen pagina]',
	'echo-error-no-formatter' => 'Er is geen opmaak ingesteld voor deze melding.',
	'echo-error-preference' => 'Fout: de gebruikersinstelling kon niet ingesteld worden',
	'echo-error-token' => 'Fout: het gebruikerstoken kon niet opgehaald worden',
	'notifications' => 'Meldingen',
	'tooltip-pt-notifications' => 'Uw meldingen',
	'echo-specialpage' => 'Meldingen',
	'echo-anon' => '[$1 Maak een gebruiker aan] of [$2 meld u aan] als u meldingen wilt ontvangen.',
	'echo-none' => 'U hebt geen meldingen.',
	'echo-more-info' => 'Meer info',
	'echo-feedback' => 'Terugkoppeling',
	'notification-link-text-view-message' => 'Bericht bekijken',
	'notification-link-text-view-mention' => 'Vermelding bekijken',
	'notification-link-text-view-changes' => 'Wijzigingen bekijken',
	'notification-link-text-view-page' => 'Pagina bekijken',
	'notification-link-text-view-edit' => 'Bewerking bekijken',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|heeft een bericht geplaatst}} op uw [[User talk:$2#$3|overlegpagina]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|heeft}} een bericht achtergelaten op uw overlegpagina in het onderwerp "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|heeft een bericht geplaatst}} op uw [[User talk:$2#$3|overlegpagina]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|heeft}} een bericht achtergelaten op uw overlegpagina onder het kopje "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => '[[:$2]] is {{GENDER:$1|gekoppeld}} vanaf [[:$3]]:[[Special:WhatLinksHere/$2|alle koppelingen naar deze pagina bekijken]]',
	'notification-page-linked-flyout' => '$2 is {{GENDER:$1|gekoppeld}} vanaf [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|heeft gereageerd}} op "[[$3|$2]]" op de overlegpagina "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|heeft}} een nieuw onderwerp "$2" geplaatst op [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|heeft}} u een bericht gezonden: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|heeft gereageerd}} op "[[$3#$2|$2]]" op uw overlegpagina',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|heeft}} u genoemd op de overlegpagina van $5 onder "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 {{GENDER:$1|heeft}} u genoemd op de overlegpagina van $5 onder "[[$3#$2|$4]]".',
	'notification-mention-nosection' => '[[User:$1|$1]] heeft u {{GENDER:$1|genoemd}} op de [[$3|overlegpagina van $2]].',
	'notification-mention-nosection-flyout' => '$1 heeft u {{GENDER:$1|genoemd}} op de [[$3|overlegpagina van $2]].',
	'notification-user-rights' => '[[Special:Log/rights/$1|Uw gebruikersrechten]] zijn {{GENDER:$1|gewijzigd}} door [[User:$1|$1]]. $2. [[Special:ListGroupRights|Meer informatie]]',
	'notification-user-rights-flyout' => 'Uw gebruikersrechten zijn {{GENDER:$1|gewijzigd}} door $1. $2. [[Special:ListGroupRights|Meer informatie]]',
	'notification-user-rights-add' => 'U bent nu lid van deze groep{{PLURAL:$2||en}}: $1',
	'notification-user-rights-remove' => 'U bent niet langer lid van deze groep{{PLURAL:$2||en}}: $1',
	'notification-new-user' => 'Welkom op {{SITENAME}}, $1! We zijn blij dat u er bent.',
	'notification-reverted2' => 'Uw {{PLURAL:$4|bewerking op [[:$2]] is|bewerkingen op [[:$2]] zijn}} {{GENDER:$1|teruggedraaid}} door [[User:$1|$1]]: $3',
	'notification-reverted-flyout2' => 'Uw {{PLURAL:$4|bewerking op $2 is|bewerkingen op $2 zijn}} {{GENDER:$1|teruggedraaid}} door $1 $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|heeft}} een bericht voor u achtergelaten op {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|heeft}} een bericht achtergelaten op uw overlegpagina:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|heeft}} een bericht achtergelaten op uw overlegpagina onder "$2".',
	'notification-page-linked-email-subject' => 'Een pagina die u hebt aangemaakt is gekoppeld vanaf {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2 is {{GENDER:$1|gekoppeld}} vanaf $3',
	'notification-reverted-email-subject2' => 'Uw {{PLURAL:$3|bewerking op {{SITENAME}} is|bewerkingen op {{SITENAME}} zijn}} {{GENDER:$1|teruggedraaid}}',
	'notification-reverted-email-batch-body2' => 'Uw {{PLURAL:$3|bewerking op $2 is|bewerkingen op $2 zijn}} {{GENDER:$1|teruggedraaid}} door $1',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|heeft}} u genoemd op {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|heeft}} u genoemd op de overlegpagina van $4 onder "$3"',
	'notification-mention-nosection-email-batch-body' => '$1 heeft u {{GENDER:$1|genoemd}} op de overlegpagina van $2.',
	'notification-user-rights-email-subject' => 'Uw gebruikersrechten op {{SITENAME}} zijn gewijzigd',
	'notification-user-rights-email-batch-body' => 'Uw gebruikersrechten zijn {{GENDER:$1|gewijzigd}} door $1. $2',
	'echo-email-subject-default' => 'Nieuwe melding op {{SITENAME}}',
	'echo-email-body-default' => 'U hebt een nieuwe melding op {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'U hebt een nieuwe melding',
	'echo-email-footer-default' => '$2

Volg de volgende koppeling om te bepalen welke e-mails wij u zenden:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Ga naar <a href="$2" style="text-decoration:none; color: #3868B0;">uw voorkeuren</a> om te bepalen welke e-mails wij u zenden.<br />
$1',
	'echo-overlay-link' => 'Alle meldingen',
	'echo-overlay-title' => '<b>Meldingen</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Meldingen}}</b> ($1 van $2 ongelezen)',
	'echo-mark-all-as-read' => 'Alles als gelezen markeren',
	'echo-date-today' => 'Vandaag',
	'echo-date-yesterday' => 'Gisteren',
	'echo-load-more-error' => 'Er is een fout opgetreden tijdens het ophalen van meer resultaten.',
	'notification-edit-talk-page-bundle' => '$1 en $3 {{PLURAL:$4|andere|anderen}} hebben een bericht {{GENDER:$1|geplaatst}} op uw [[User talk:$2|overlegpagina]].',
	'notification-page-linked-bundle' => "$2 is {{GENDER:$1|gekoppeld}} vanaf $3 en $4 andere pagina{{PLURAL:$5||'s}}. [[Special:WhatLinksHere/$2|Alle koppelingen naar deze pagina bekijken]]",
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 and $2 {{PLURAL:$3|andere gebruiker|andere gebruikers}} {{GENDER:$1|hebben}} een bericht op uw overlegpagina geplaatst',
	'notification-page-linked-email-batch-bundle-body' => "$2 is {{GENDER:$1|gekoppeld}} vanaf $3 en $4 andere pagina{{PLURAL:$5||'s}}",
	'echo-email-batch-subject-daily' => 'U heeft vandaag {{PLURAL:$2|0=geen nieuwe meldingen|een nieuwe melding|nieuwe meldingen}} op {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'U heeft deze week {{PLURAL:$2|0=geen nieuwe meldingen|een nieuwe melding|nieuwe meldingen}} op {{SITENAME}}',
	'echo-email-batch-body-intro-daily' => 'Hallo $1,
Hier is een samenvatting voor u van de activiteiten van vandaag op {{SITENAME}}.',
	'echo-email-batch-body-intro-weekly' => 'Hallo $1,
Hier is een samenvatting voor u van de activiteiten van deze week op {{SITENAME}}.',
	'echo-email-batch-link-text-view-all-notifications' => 'Alle mededelingen bekijken',
	'echo-rev-deleted-text-view' => 'Deze paginaversie is onderdrukt.',
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

$1', # Fuzzy
	'echo-email-batch-subject-daily' => 'Je hebt vandaag {{PLURAL:$2|0=geen meldingen|één melding|$1 meldingen}}', # Fuzzy
	'echo-email-batch-subject-weekly' => 'Je hebt deze week {{PLURAL:$2|0=geen meldingen|één melding|$1 meldingen}}', # Fuzzy
);

/** Norwegian Nynorsk (norsk nynorsk)
 * @author Njardarlogar
 */
$messages['nn'] = array(
	'echo-desc' => 'Meldingssystem',
	'prefs-echo' => 'Meldingar',
	'prefs-emailsettings' => 'E-postval',
	'prefs-displaynotifications' => 'Visingsval',
	'prefs-echosubscriptions' => 'Meld meg om desse hendingane',
	'prefs-newmessageindicator' => 'Ny melding-indikator',
	'echo-pref-send-me' => 'Send meg:',
	'echo-pref-send-to' => 'Send til:',
	'echo-pref-email-format' => 'E-postformat',
	'echo-pref-web' => 'Nett',
	'echo-pref-email' => 'E-post',
	'echo-pref-email-frequency-never' => 'Ikkje send meg e-postmeldingar',
	'echo-pref-email-frequency-immediately' => 'Einkskilde meldingar etter kvart som dei kjem inn',
	'echo-pref-email-frequency-daily' => 'Eit dagleg samandrag av meldingar',
	'echo-pref-email-frequency-weekly' => 'Eit vekentleg samandrag av meldingar',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Rein tekst',
	'echo-pref-notify-show-link' => 'Vis meldingar på verktøylina mi',
	'echo-pref-new-message-indicator' => 'Vis indikatoren for diskusjonssidemeldingar på verktøylina mi',
	'echo-learn-more' => 'Lær meir',
	'echo-new-messages' => 'Du har nye meldingar.', # Fuzzy
	'echo-category-title-edit-user-talk' => 'Diskusjonssidemelding{{PLURAL:$1||ar}}',
	'echo-category-title-article-linked' => 'Sidelenkje{{PLURAL:$1||r}}',
	'echo-category-title-reverted' => 'Attenderulling av endring{{PLURAL:$1||ar}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Omtale|Omtaler}}',
	'echo-category-title-other' => '{{PLURAL:$1|Anna}}',
	'echo-category-title-system' => '{{PLURAL:$1|System}}',
	'echo-pref-tooltip-edit-user-talk' => 'Meld meg når nokon skriv ei melding eller svarar på diskusjonssida mi.',
	'echo-pref-tooltip-article-linked' => 'Meld meg når nokon lenkjer frå ein artikkel til ei side eg har oppretta.',
	'echo-pref-tooltip-reverted' => 'Meld meg når nokon fjernar ei endring eg gjorde ved bruk av angre- eller attenderullingsverktøyet.',
	'echo-pref-tooltip-mention' => 'Meld meg når nokon lenkjer til brukarsida mi frå ei kva som helst diskusjonsside.',
	'echo-no-agent' => '[Ingen]',
	'echo-no-title' => '[Inga side]',
	'echo-error-no-formatter' => 'Inga formatering definert for meldinga.',
	'echo-error-preference' => 'Feil: kunne ikkje lagra brukarval.',
	'echo-error-token' => 'Feil: kunne ikkje henta brukartoken.',
	'notifications' => 'Meldingar',
	'tooltip-pt-notifications' => 'Meldingane dine',
	'echo-specialpage' => 'Meldingar',
	'echo-anon' => 'For å få meldingar, [$1 opprett ein konto] eller [$2 logg inn].',
	'echo-none' => 'Du har ingen meldingar.',
	'echo-more-info' => 'Meir info',
	'echo-feedback' => 'Attendemelding',
	'notification-link-text-view-message' => 'Sjå melding',
	'notification-link-text-view-mention' => 'Sjå omtale',
	'notification-link-text-view-changes' => 'Sjå endringar',
	'notification-link-text-view-page' => 'Sjå side',
	'notification-link-text-view-edit' => 'Sjå endring',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|la att}} ei melding på [[User talk:$2#$3|diskusjonssida]] di.',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|la att}} ei melding på diskusjonssida di under bolken «[[User talk:$2#$3|$4]]».',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|la att}} ei melding på [[User talk:$2#$3|diskusjonssida]] di.',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|la att}} ei melding på diskusjonssida di under bolken «[[User talk:$2#$3|$4]]».',
	'notification-page-linked' => '[[:$2]] vart {{GENDER:$1|lenkja}} til frå [[:$3]].  [[Special:WhatLinksHere/$2|Sjå alle lenkjene til sida]].',
	'notification-page-linked-flyout' => '$2 vart {{GENDER:$1|lenkja}} til frå [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|kommenterte}} emnet «[[$3|$2]]» på diskusjonssida «$4».',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|la inn}} det nye emnet «$2» på [[$3]].',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|sende}} deg ei melding: «[[$3#$2|$2]]».',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|kommenterte}} emnet «[[$3#$2|$2]]» på diskusjonssida di.',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|nemnde}} deg på diskusjonssida til $5 under bolken «[[$3#$2|$4]]».',
	'notification-mention-flyout' => '$1 {{GENDER:$1|nemnde}} deg på diskusjonssida til $5 under bolken «[[$3#$2|$4]]».',
	'notification-user-rights' => 'Brukarrettane dine [[Special:Log/rights/$1|vart {{GENDER:$1|endra}}]] av [[User:$1|$1]]. $2. [[Special:ListGroupRights|Lær meir]]',
	'notification-user-rights-flyout' => 'Brukarrettane dine vart {{GENDER:$1|endra}} av $1. $2. [[Special:ListGroupRights|Lær meir]]',
	'notification-user-rights-add' => 'Du er no ein medlem av {{PLURAL:$2|denne gruppa|desse gruppene}}: $1',
	'notification-user-rights-remove' => 'Du er ikkje lenger medlem av {{PLURAL:$2|denne gruppa|desse gruppene}}: $1',
	'notification-new-user' => 'Velkomen til {{SITENAME}}, $1! Me er glade for at du er her.',
	'notification-reverted2' => '{{PLURAL:$4|Endringa di|Endringane dine}} på [[:$2]] vart {{GENDER:$1|fjerna}} av [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Endringa di|Endringane dine}} på $2 vart {{GENDER:$1|fjerna}} av $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|la att}} ei melding til deg på {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|la att}} ei melding på diskusjonssida di:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|la att}} ei melding på diskusjonssida di under «$2».',
	'notification-page-linked-email-subject' => 'Sida di vart lenkja til på {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2 vart {{GENDER:$1|lenkja til}} frå $3.',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Endringa di|Endringane dine}} vart {{GENDER:$1|fjerna}} på {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Endringa di|Endringane dine}} på $2 vart {{GENDER:$1|fjerna}} av $1.',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|nemnde}} deg på {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|nemnde}} deg på diskusjonssida til $4 under bolken «$3».',
	'notification-user-rights-email-subject' => 'Brukarrettane dine har endra seg på {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Brukarrettane dine vart {{GENDER:$1|endra}} av $1. $2.',
	'echo-email-subject-default' => 'Ny melding på {{SITENAME}}',
	'echo-email-body-default' => 'Du har ei ny melding på {{SITENAME}}: $1',
	'echo-email-batch-body-default' => 'Du har ei ny melding.',
	'echo-email-footer-default' => '$2

For å styra kva for e-postar me sender til deg, sjå til innstillingane dine:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'For å styra kva for e-postar me sender til deg, <a href="$2" style="text-decoration:none; color: #3868B0;">sjå til innstillingane dine</a>.<br />
$1',
	'echo-overlay-link' => 'Alle meldingar',
	'echo-overlay-title' => '<b>Meldingar</b>',
	'echo-overlay-title-overflow' => '<b>Meldingar</b> (viser $1 av $2 ulesne)', # Fuzzy
	'echo-mark-all-as-read' => 'Merk alle som lesne',
	'echo-date-today' => 'I dag',
	'echo-date-yesterday' => 'I går',
	'echo-load-more-error' => 'Det oppstod ein feil under henting av fleire resultat.',
	'notification-edit-talk-page-bundle' => '$1 og {{PLURAL:$4|ein annan|$3 andre}} {{GENDER:$1|la att}} ei melding til deg på [[User talk:$2|diskusjonssida]] di.',
	'notification-page-linked-bundle' => '$2 vart {{GENDER:$1|lenkja til}} frå $3 og {{PLURAL:$5|ei anna side|$4 andre sider}}. [[Special:WhatLinksHere/$2|Sjå alle lenkjene til sida]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 og {{PLURAL:$3|ein annan|$2 andre}} {{GENDER:$1|la att}} ei melding på diskusjonssida di.',
	'notification-page-linked-email-batch-bundle-body' => '$2 vart {{GENDER:$1|lenkja til}} frå $3 og {{PLURAL:$5|ei anna side|$4 andre sider}}.',
	'echo-email-batch-subject-daily' => 'Du har {{PLURAL:$2|ei ny melding|nye meldingar}} på {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Du har {{PLURAL:$2|ei ny melding|nye meldingar}} på {{SITENAME}} denne veka',
	'echo-email-batch-body-intro-daily' => 'Hei $1.
Her er eit samandrag av aktiviteten i dag på {{SITENAME}} for deg.',
	'echo-email-batch-body-intro-weekly' => 'Hei $1.
Her er eit samandrag av aktiviteten denne veka på {{SITENAME}} for deg.',
	'echo-email-batch-link-text-view-all-notifications' => 'Sjå alle meldingane',
	'echo-rev-deleted-text-view' => 'Denne sideversjonen er vorten løynd.',
);

/** Occitan (occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'echo-desc' => 'Sistèma de notificacions',
	'prefs-echo' => 'Notificacions',
	'prefs-emailsettings' => 'Opcions del corrièr electronic',
	'prefs-displaynotifications' => "Opcions d'afichatge",
	'prefs-echosubscriptions' => "M'avisar d'aqueles eveniments",
	'prefs-newmessageindicator' => 'Indicador de messatge novèl',
	'echo-pref-send-me' => 'Me mandar :',
	'echo-pref-send-to' => 'Mandar a :',
	'echo-pref-email-format' => 'Format de corrièr electronic :',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Corrièr electronic',
	'echo-pref-email-frequency-never' => 'Me mandar pas cap de notificacion per corrièr electronic',
	'echo-pref-email-frequency-immediately' => "Notificacions individualas al fial de l'aiga",
	'echo-pref-email-frequency-daily' => 'Un resumit quotidian de las notificacions',
	'echo-pref-email-frequency-weekly' => 'Un resumit setmanièr de las notificacions',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Tèxte brut',
	'echo-pref-notify-show-link' => "Afichar las notificacions dins ma barra d'aisinas",
	'echo-pref-new-message-indicator' => 'Afichar l’indicador de messatge sus la pagina de discussion dins ma barra d’aisinas',
	'echo-learn-more' => 'Ne saber mai',
	'echo-new-messages' => 'Avètz de messatges novèls',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Messatge|Messatges}} de la pagina de discussion',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Article ligat|Articles ligats}}',
	'echo-category-title-reverted' => '{{PLURAL:$1|Modificacion anullada|Modificacions anulladas}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Mencion|Mencions}}',
	'echo-category-title-other' => '{{PLURAL:$1|Autres}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistèma}}',
	'echo-pref-tooltip-edit-user-talk' => "M'avisar quand qualqu’un publica un messatge o respond sus ma pagina de discussion.",
	'echo-pref-tooltip-article-linked' => "M'avisar quand qualqu’un fa referéncia a una pagina qu’ai creada a partir d’una pagina d’article.",
	'echo-pref-tooltip-reverted' => "M'avisar quand qualqu’un anulla una modificacion qu’ai facha, en utilizant l’aisina anullacion o retorn arrièr",
	'echo-pref-tooltip-mention' => "M'avisar quand qualqu’un fa referéncia a ma pagina d'utilizaire dempuèi una pagina de discussion.",
	'echo-no-agent' => '[Pas degun]',
	'echo-no-title' => '[Pas cap de pagina]',
	'echo-error-no-formatter' => 'Cap de mesa en forma pas definida per la notificacion',
	'echo-error-preference' => "Error : Impossible de definir la preferéncia d'utilizaire",
	'echo-error-token' => 'Error : Impossible de recuperar lo geton de l’utilizaire',
	'notifications' => 'Notificacions',
	'tooltip-pt-notifications' => 'Vòstras notificacions',
	'echo-specialpage' => 'Notificacions',
	'echo-anon' => 'Per recebre de notificacions, [$1 creatz un compte] o [$2 connectatz-vos].',
	'echo-none' => 'Avètz pas recebut cap de notificacion.',
	'echo-more-info' => "Mai d'informacion",
	'echo-feedback' => 'Vejaires',
	'notification-link-text-view-message' => 'Afichar lo messatge',
	'notification-link-text-view-mention' => 'Afichar la mencion',
	'notification-link-text-view-changes' => 'Afichar las modificacions',
	'notification-link-text-view-page' => 'Afichar la pagina',
	'notification-link-text-view-edit' => 'Afichar la modificacion',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|a daissat}} un messatge sus vòstra [[User talk:$2#$3|pagina de discussion]].',
	'notification-edit-talk-page-with-section' => "[[User:$1|$1]] a daissat un messatge sus vòstra pagina de discussion dins la [[User talk:$2#$3|seccion ''$4'']].",
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|a daissat}} un messatge sus vòstra [[User talk:$2#$3|pagina de discussion]].',
	'notification-edit-talk-page-flyout-with-section' => "$1 a daissat un messatge sus vòstra pagina de discussion dins la [[User talk:$2#$3|seccion ''$4'']].",
	'notification-page-linked' => '[[:$2]] es estat {{GENDER:$1|referenciat}} dempuèi [[:$3]]. [[Special:WhatLinksHere/$2|Veire totes los ligams cap a aquesta pagina]].',
	'notification-page-linked-flyout' => '$2 es estat {{GENDER:$1|referenciat}} dempuèi [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|a fach un comentari}} dins « [[$3|$2]] » sus la pagina de discussion « $4 »',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|a publicat}} un subjècte novèl "$2" sus [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] vos {{GENDER:$1|a mandat}} un messatge : "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => "[[User:$1|$1]] {{GENDER:$1|a fach un comentari}} dins ''[[$3#$2|$2]]'' sus vòstra pagina de discussion",
	'notification-mention' => "[[User:$1|$1]] vos {{GENDER:$1|a mencionat|a mencionada}} sus la pagina de discussion de $5 dins la [[$3#$2|seccion ''$4'']].",
	'notification-mention-flyout' => "$1 vos {{GENDER:$1|a mencionat|a mencionada}} sus la pagina de discussion de $5 dins la [[$3#$2|seccion ''$4'']].",
	'notification-user-rights' => 'Vòstres dreches d’utilizaire [[Special:Log/rights/$1|son estats {{GENDER:$1|modificats}}]] per [[User:$1|$1]]. $2. [[Special:ListGroupRights|Ne saber mai]]',
	'notification-user-rights-flyout' => 'Vòstres dreches d’utilizaire {{GENDER:$1|son estats modificats}} per $1. $2. [[Special:ListGroupRights|Ne saber mai]]',
	'notification-user-rights-add' => "Ara sètz membre d'{{PLURAL:$2|aqueste grop|aquestes gropes}} : $1",
	'notification-user-rights-remove' => "Sètz pas mai membre d'{{PLURAL:$2|aqueste grop|aquestes gropes}} : $1",
	'notification-new-user' => 'Benvenguda sus {{SITENAME}}, $1 ! Sèm uroses de vos veire aicí.',
	'notification-reverted2' => '{{PLURAL:$4|Vòstra modificacion sus [[:$2]] es estada|Vòstras modificacions sus [[:$2]] son estadas}} {{GENDER:$1|anullada}}{{PLURAL:$4||s}} per [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Vòstra modificacion sus $2 es estada|Vòstras modificacions sus $2 son estadas}} {{GENDER:$1|anullada}}{{PLURAL:$4||s}} per $1 $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|a daissat}} un messatge sus vòstra pagina de discussion sus {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|a daissat}} un messatge sus vòstra pagina de discussion :',
	'notification-edit-talk-page-email-batch-body-with-section' => "$1 a daissat un messatge sus vòstra pagina de discussion dins ''$2''.",
	'notification-page-linked-email-subject' => 'Vòstra pagina es estada referenciada sus {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2 es estat {{GENDER:$1|referenciat}} dempuèi $3',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Vòstra modificacion es estada anullada|Vòstras modificacions son estadas anulladas}} {{GENDER:$1|}} sus {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Vòstra modification sus $2 es estada anullada|Vòstras modificacions sus $2 son estadas anulladas}} {{GENDER:$1|}} per $1',
	'notification-mention-email-subject' => '$1 vos {{GENDER:$1|a mencionat|a mencionada}} sus {{SITENAME}}',
	'notification-mention-email-batch-body' => "$1 vos {{GENDER:$1|a mencionat|a mencionada}} sus la pagina de discussion de $4 dins ''$3''.",
	'notification-user-rights-email-subject' => 'Vòstres dreches d’utilizaire son estats modificats sus {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Vòstres dreches d’utilizaire {{GENDER:$1|son estats modificats}} per $1. $2',
	'echo-email-subject-default' => 'Novèla notificacion sus {{SITENAME}}',
	'echo-email-body-default' => 'Avètz una novèla notificacion sus {{SITENAME}} :

$1',
	'echo-email-batch-body-default' => 'Avètz una novèla notificacion',
	'echo-email-footer-default' => '$2

Per verificar quines corrièrs electronics vos mandam, anatz dins vòstras preferéncias :
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Per contrarotlar los corrièrs electronics que vos mandam, <a href="$2" style="text-decoration:none; color: #3868B0;">verificatz vòstras preferéncias</a><br />
$1',
	'echo-overlay-link' => 'Totas las notificacions',
	'echo-overlay-title' => '<b>Notificacions</b>',
	'echo-overlay-title-overflow' => "<b>{{PLURAL:$1|Notificacion|Notificacions}}</b> ($1 sus $2 {{PLURAL:$1|pas legida d'afichada|pas legidas d'afichadas}})",
	'echo-mark-all-as-read' => 'Marcar tot coma legit',
	'echo-date-today' => 'Uèi',
	'echo-date-yesterday' => 'Ièr',
	'echo-load-more-error' => "Una error s'es producha en analisant mai de resultats.",
	'notification-edit-talk-page-bundle' => '$1 e $3 {{PLURAL:$4|autre|autres}} {{GENDER:$1|an daissat}} un messatge sus vòstra [[User talk:$2|pagina de discussion]].',
	'notification-page-linked-bundle' => '$2 es estat {{GENDER:$1|referenciat}} dempuèi $3 e $4 {{PLURAL:$5|autra pagina|autras paginas}}. [[Special:WhatLinksHere/$2|Veire totes los ligams cap a aquesta pagina]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 e $2 {{PLURAL:$3|autre|autres}} an {{GENDER:$1|daissat}} un messatge sus vòstra pagina de discussion.',
	'notification-page-linked-email-batch-bundle-body' => '$2 a été {{GENDER:$1|ligat}} dempuèi $3 e $4 {{PLURAL:$5|autra pagina|autras paginas}}',
	'echo-email-batch-subject-daily' => 'Avètz {{PLURAL:$2|una novèla notificacion|de novèlas notificacions}} uèi sus {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Avètz {{PLURAL:$2|una novèla notificacion|de novèlas notificacions}} sus {{SITENAME}} aquesta setmana',
	'echo-email-batch-body-intro-daily' => 'Bonjorn $1,
Aquí per vos un resumit de l’activitat d’uèi sus {{SITENAME}}',
	'echo-email-batch-body-intro-weekly' => 'Bonjorn $1,
Aquí per vos un resumit de l’activitat de la setmana sus {{SITENAME}}',
	'echo-email-batch-link-text-view-all-notifications' => 'Veire totas las notificacions',
	'echo-rev-deleted-text-view' => 'Aquesta revision de pagina es estada suprimida',
);

/** Oriya (ଓଡ଼ିଆ)
 * @author MKar
 */
$messages['or'] = array(
	'echo-desc' => 'ସୂଚନା ପ୍ରଣାଳି',
	'prefs-echo' => 'ସୂଚନା ସମୂହ',
	'prefs-emailsettings' => 'ଇମେଲ ବିକଳ୍ପ',
	'prefs-displaynotifications' => 'ଦେଖଣା ବିକଳ୍ପ',
	'prefs-echosubscriptions' => 'ଏହି ଘଟଣା ସଂପର୍କରେ ମତେ ସୂଚନା ଦିଅନ୍ତୁ',
	'prefs-newmessageindicator' => 'ନୂଆ ବାର୍ତ୍ତା ସୂଚକ',
	'echo-pref-send-me' => 'ମୋ ପାଖକୁ ପଠାନ୍ତୁ',
	'echo-pref-send-to' => 'ଏହାଙ୍କ ପାଖକୁ ପଠାନ୍ତୁ',
	'echo-pref-email-format' => 'ଇମେଲ ଶୈଳୀ',
	'echo-pref-web' => 'ୱେବ',
	'echo-pref-email' => 'ଇ-ମେଲ',
	'echo-pref-email-frequency-never' => 'ମୋ ପାଖକୁ କୌଣସି ଇ-ମେଲ ସୂଚନା ପଠାନ୍ତୁ ନାହିଁ',
	'echo-pref-email-frequency-immediately' => 'ପ୍ରତ୍ୟେକ ସୂଚନା ଅସିବା ମତେ',
	'echo-pref-email-frequency-daily' => 'ସୂଚନାର ଦୈନିକ ସାରମର୍ମ',
	'echo-pref-email-frequency-weekly' => 'ସୂଚନାର ସାପ୍ତାହିକ ସାରମର୍ମ',
	'echo-pref-email-format-html' => 'ଏଚଟିଏମଏଲ',
	'echo-pref-email-format-plain-text' => 'ସାଦା ଲେଖା',
	'echo-pref-notify-show-link' => 'ମୋ ଟୁଲବାରରେ ସୂଚନା ସବୁ ଦେଖାନ୍ତୁ',
	'echo-pref-new-message-indicator' => 'ମୋ ଟୁଲବାରରେ ଆଲୋଚନା ପୃଷ୍ଠା ବାର୍ତ୍ତ ସୂଚକ ଦେଖାନ୍ତୁ',
	'echo-learn-more' => 'ଅଧିକ ଶିଖନ୍ତୁ',
	'echo-new-messages' => 'ଆପଣଙ୍କ ପାଇଁ ଏକ ନୂଆ ବାର୍ତ୍ତା ଅଛି', # Fuzzy
	'echo-category-title-edit-user-talk' => 'ଆଲୋଚନା ପୃଷ୍ଠା {{PLURAL:$1|ବାର୍ତ୍ତା|ଏକାଧିକ ବାର୍ତ୍ତା}}',
	'echo-category-title-article-linked' => 'ପୃଷ୍ଠା {{PLURAL:$1|ଲିଙ୍କ|ଏକାଧିକ ଲିଙ୍କ}}',
	'echo-category-title-reverted' => 'ସଂପାଦନା {{PLURAL:$1|ପଶ୍ଚାତକରଣ|ଏକାଧିକ ପଶ୍ଚାତକରଣ}}',
	'echo-category-title-other' => '{{PLURAL:$1|ଅନ୍ୟାନ୍ୟ}}',
	'echo-category-title-system' => '{{PLURAL:$1|ସିଷ୍ଟମ}}',
	'echo-pref-tooltip-edit-user-talk' => 'ମୋ ଆଲୋଚନା ପୃଷ୍ଠାରେ କେହି ବାର୍ତ୍ତା ପଠାଇଲେ କିମ୍ବା ଉତ୍ତର ଦେଲେ ମୋତେ ସୂଚିତ କରନ୍ତୁ',
	'echo-pref-tooltip-article-linked' => 'ମୁଁ ତିଆରି କରିଥିବା ପୃଷ୍ଠାକୁ କେହି ପ୍ରସଙ୍ଗ ପୃଷ୍ଠାରେ ସଂଯୋଗ କଲେ ମୋତେ ସୂଚିତ କରନ୍ତୁ',
	'echo-pref-tooltip-reverted' => 'ମୋର ସଂପାଦନାକୁ କେହି ରୋଲବ୍ୟାକ ଟୁଲ ବା ପଛକୁ ଫେରାଇବା ଟୁଲ ବ୍ୟବହାର କରି ପଶ୍ଚାତକରଣ କଲେ ମୋତେ ସୂଚନା ଦିଅନ୍ତୁ',
	'echo-pref-tooltip-mention' => 'ମୋର ବ୍ୟବହାରକାରୀ ପୃଷ୍ଠାକୁ କେହି ଜଣେ କୌଣସି ଆଲୋଚନା ପୃଷ୍ଠାରୁ ସଂଯୋଗ କଲେ ମୋତେ ସୂଚୀତ କରନ୍ତୁ',
	'echo-no-agent' => '[କେହି ନୁହେଁ]',
	'echo-no-title' => '[କୌଣସି ପୃଷ୍ଠା ନାହିଁ]',
	'echo-error-no-formatter' => 'ସୂଚନା ନିମନ୍ତେ କୌଣସି ନିର୍ଦ୍ଦିଷ୍ଟ ଶୈଳୀ ନାହିଁ',
	'echo-error-preference' => 'ତୃଟି:ବ୍ୟବହାରକାରୀ ପସନ୍ଦ ସ୍ଥାପନ କରାଯାଇପାରିଲା ନାହିଁ',
	'echo-error-token' => 'ତୃଟି:ବ୍ୟବହାରକାରୀ ଟୋକନ ଅଣାଯାଇ ପାରିଲା ନାହିଁ',
	'notifications' => 'ସୂଚନାବଳି',
	'tooltip-pt-notifications' => 'ଆପଣଙ୍କ ନିମନ୍ତେ ସୂଚନାବଳି',
	'echo-specialpage' => 'ସୂଚନାବଳି',
	'echo-anon' => 'ସୂଚନା ପ୍ରାପ୍ତି ନିମନ୍ତେ, [$1 ନୂଆ ଖାତା ଖୋଲନ୍ତୁ] କିମ୍ବା [$2 ଲଗ ଇନ କରନ୍ତୁ].',
	'echo-none' => 'ଆପଣଙ୍କ ନିମନ୍ତେ କୌଣସି ସୂଚନା ନାହିଁ',
	'echo-more-info' => 'ଅଧିକ ତଥ୍ୟ',
	'echo-feedback' => 'ମତାମତ',
	'notification-link-text-view-message' => 'ବାର୍ତ୍ତା ଦେଖନ୍ତୁ',
	'notification-link-text-view-mention' => 'ସୂଚିତ ହୋଇଥିବା ପୃଷ୍ଠା ଦେଖନ୍ତୁ',
	'notification-link-text-view-changes' => 'ସମସ୍ତ ବଦଳ ଦେଖନ୍ତୁ',
	'notification-link-text-view-page' => 'ପୃଷ୍ଠା ଦେଖନ୍ତୁ',
	'notification-link-text-view-edit' => 'ସମ୍ପାଦନା ଦେଖନ୍ତୁ',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|left}}  ଆପଣଙ୍କ ପାଇଁ ଗୋଟିଏ ବାର୍ତ୍ତ ଅଛି [[User talk:$2#$3|ଆଲୋଚନା ପୃଷ୍ଠାରେ]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|left}} ଆପଣଙ୍କ ପାଇଁ ଗୋଟିଏ ବାର୍ତ୍ତା ଅଛି ଆପଣଙ୍କ ଆଲୋଚନା ପୃଷ୍ଠାରେ "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|left}} ଗୋଟିଏ ବାର୍ତ୍ତ ଆପଣଙ୍କ [[User talk:$2#$3|ଆଲୋଚନା ପୃଷ୍ଠା]]ରେ.',
	'echo-overlay-link' => 'ସମସ୍ତ ସୂଚନା',
	'echo-overlay-title' => '<b>ସୂଚନାବଳୀ</b>',
	'echo-mark-all-as-read' => 'ସବୁ ପଢ଼ା ସରିଛି ବୋଲି ଚିହ୍ନ ଦିଅନ୍ତୁ',
	'echo-date-today' => 'ଆଜି',
	'echo-date-yesterday' => 'ଗତ କାଲି',
	'echo-load-more-error' => 'ଅଧିକ ଫଳଗୁଡ଼ିକୁ ଖୋଜୁଥିବା ବେଳେ କିଛିଗୋଟେ ଅସୁବିଧା ହେଲା ।',
	'echo-email-batch-subject-weekly' => 'ଆପଣଙ୍କ ପାଇଁ {{SITENAME}}ରେ ଚଳିତ ସପ୍ତାହର {{PLURAL:$2|ଗୋଟିଏ ନୂଆ ବାର୍ତ୍ତ|ଏକାଧିକ ନୂଆ ବାର୍ତ୍ତା}} ଅଛି',
	'echo-email-batch-body-intro-daily' => 'ନମସ୍କାର $1,
ଆପଣଙ୍କ ପାଇଁ ଏହା ହେଉଛି {{SITENAME}}ରେ ଚଳିତ ସପ୍ତାହର କାର୍ଯ୍ୟାବଳୀର ସାରମର୍ମ',
	'echo-email-batch-body-intro-weekly' => 'ନମସ୍କାର $1,
ଆପଣଙ୍କ ପାଇଁ ଏହା ହେଉଛି {{SITENAME}}ରେ ଏହି ସପ୍ତାହର କାର୍ଯ୍ୟାବଳୀର ସାରମର୍ମ',
	'echo-email-batch-link-text-view-all-notifications' => 'ସମସ୍ତ ସୂଚନା ଦେଖନ୍ତୁ',
	'echo-rev-deleted-text-view' => 'ଏହି ପୃଷ୍ଠାର ପୁନରାବୃତି ଇତିହାସ ଉହ୍ୟ କରିଦିଆଯାଇଛି',
);

/** Punjabi (ਪੰਜਾਬੀ)
 * @author Satdeep gill
 */
$messages['pa'] = array(
	'echo-desc' => 'ਸੂਚਨਾ ਪ੍ਰਣਾਲੀ',
	'prefs-echo' => 'ਸੂਚਨਾਵਾਂ',
	'prefs-emailsettings' => 'ਈ-ਮੇਲ ਆਪਸ਼ਨ',
	'prefs-displaynotifications' => 'ਪ੍ਰਗਟਾਓ ਆਪਸ਼ਨ',
	'prefs-echosubscriptions' => 'ਮੈਨੂੰ ਇਸ ਤਰ੍ਹਾਂ ਦੇ ਸਬੱਬਾਂ ਬਾਰੇ ਨੋਟੀਫਾਈ ਕਰੋ',
	'prefs-newmessageindicator' => 'ਨਵਾਂ ਸੰਦੇਸ਼ ਸੂਚਕ',
	'echo-pref-send-me' => 'ਮੈਨੂੰ ਭੇਜੋ:',
	'echo-pref-send-to' => 'ਭੇਜੋ:',
	'echo-pref-email-format' => 'ਈ-ਮੇਲ ਫਾਰਮੈਟ',
	'echo-pref-web' => 'ਵੈੱਬ',
	'echo-pref-email' => 'ਈ-ਮੇਲ',
	'echo-pref-email-frequency-never' => 'ਮੈਨੂੰ ਈ-ਮੇਲ ਸੂਚਨਾਵਾਂ ਨਾ ਭੇਜੋ',
	'echo-pref-email-frequency-immediately' => 'ਖਾਸ ਸੂਚਨਾਵਾਂ ਜਿਵੇਂ ਉਹ ਆਈਆਂ',
	'echo-pref-email-frequency-daily' => 'ਸੂਚਨਾਵਾਂ ਦਾ ਰੋਜ਼ਾਨਾ ਸਾਰ',
	'echo-pref-email-frequency-weekly' => 'ਸੂਚਨਾਵਾਂ ਦਾ ਹਫਤਾਵਰ ਸਾਰ',
	'echo-pref-email-format-html' => 'ਐਚ.ਟੀ.ਮੈਲ.ਐਲ.',
	'echo-pref-email-format-plain-text' => 'ਸਰਲ ਟੈਕਸਟ',
	'echo-pref-notify-show-link' => 'ਮੇਰੀ ਟੂਲਬਾਰ ਵਿੱਚ ਸੂਚਨਾਵਾਂ ਵਿਖਾਓ',
	'echo-pref-new-message-indicator' => 'ਮੇਰੀ ਟੂਲਬਾਰ ਵਿੱਚ ਗੱਲ-ਬਾਤ ਪੰਨਾ ਸੂਚਕ ਵਿਖਾਓ',
	'echo-learn-more' => 'ਹੋਰ ਜਾਣੋ',
	'echo-new-messages' => 'ਤੁਹਾਡੇ ਲਈ ਨਵੇਂ ਸੁਨੇਹੇ ਹਨ।', # Fuzzy
	'echo-category-title-edit-user-talk' => 'ਗੱਲ-ਬਾਤ ਪੰਨਾ {{PLURAL:$1|ਸੁਨੇਹਾ|ਸੁਨੇਹੇ}}',
	'echo-category-title-article-linked' => 'ਪੰਨਾ {{PLURAL:$1|ਲਿੰਕ}}',
	'echo-category-title-reverted' => 'ਸੋਧ {{PLURAL:$1|ਰੱਦ ਕੀਤਾ|ਰੱਦ ਕੀਤੇ}}',
	'echo-category-title-mention' => '{{PLURAL:$1|ਜ਼ਿਕਰ}}',
	'echo-category-title-other' => '{{PLURAL:$1|ਹੋਰ}}',
	'echo-category-title-system' => '{{PLURAL:$1|ਪ੍ਰਣਾਲੀ}}',
	'echo-pref-tooltip-edit-user-talk' => 'ਜਦ ਕੋਈ ਮੇਰੇ ਗੱਲ-ਬਾਤ ਪੰਨੇ ਉੱਤੇ ਸੰਦੇਸ਼ ਭੇਜੇ ਜਾਂ ਕਿਸੇ ਸੰਦੇਸ਼ ਦਾ ਜਵਾਬ ਦੇਵੇ ਤਾਂ ਮੈਨੂੰ ਸੂਚਨਾ ਦੇਵੋ।',
	'echo-pref-tooltip-article-linked' => 'ਜਦ ਕੋਈ ਉਸ ਪੰਨੇ ਨਾਲ ਜੁੜਦਾ ਹੈ ਜੋ ਮੈਂ ਕਿਸੇ ਲੇਖ ਦੇ ਪੰਨੇ ਤੋਂ ਬਣਾਇਆ ਸੀ ਤਾਂ ਮੈਨੂੰ ਸੂਚਨਾ ਦੇਵੋ।',
	'echo-pref-tooltip-reverted' => 'ਜਦ ਕੋਈ ਮੇਰੀ ਕੀਤੀ ਸੋਧ ਨੂੰ, ਕੋਈ ਟੂਲ ਵਰਤ ਕੇ ਰੱਦ ਕਰ ਦਿੰਦਾ ਹੈ ਤਾਂ ਮੈਨੂੰ ਸੂਚਨਾ ਦੇਵੋ।',
	'echo-pref-tooltip-mention' => 'ਜਦ ਕੋਈ ਕਿਸੇ ਗੱਲ-ਬਾਤ ਪੰਨੇ ਤੋਂ ਮੇਰੇ ਵਰਤੋਂਕਾਰ ਪੰਨੇ ਤੇ ਜੁੜਦਾ ਹੈ ਤਾਂ ਮੈਨੂੰ ਸੂਚਨਾ ਦੇਵੋ।',
	'echo-no-agent' => '[ਕੋਈ ਨਹੀਂ]',
	'echo-no-title' => '[ਕੋਈ ਪੰਨਾ ਨਹੀਂ]',
	'echo-error-no-formatter' => 'ਸੂਚਨਾ ਲਈ ਕੋਈ ਫਾਰਮੈਟ ਨਹੀਂ ਹੈ।',
	'echo-error-preference' => 'ਭੁੱਲ: ਵਰਤੋਂਕਾਰ ਤਰਜੀਹ ਲਾਗੂ ਨਹੀਂ ਕੀਤੀ ਜਾ ਸਕੀ।',
	'echo-error-token' => 'ਭੁੱਲ: ਵਰਤੋਂਕਾਰ ਪਛਾਣ ਲੱਭੀ ਨਹੀਂ ਜਾ ਸਕੀ।',
	'notifications' => 'ਸੂਚਨਾਵਾਂ',
	'tooltip-pt-notifications' => 'ਤੁਹਾਡੀਆਂ ਸੂਚਨਾਵਾਂ',
	'echo-specialpage' => 'ਸੂਚਨਾਵਾਂ',
	'echo-anon' => 'ਸੂਚਨਾਵਾਂ ਪ੍ਰਾਪਤ ਕਰਨ ਲਈ, [$1 ਖਾਤਾ ਬਣਾਉ] ਜਾਂ [$2 ਲਾਗ ਇਨ ਕਰੋ]।',
	'echo-none' => 'ਤੁਹਾਡੇ ਲਈ ਕੋਈ ਸੂਚਨਾ ਨਹੀਂ ਹੈ।',
	'echo-more-info' => 'ਹੋਰ ਜਾਣਕਾਰੀ',
	'echo-feedback' => 'ਫ਼ੀਡਬੈਕ',
	'notification-link-text-view-message' => 'ਸੰਦੇਸ਼ ਦੇਖੋ',
	'notification-link-text-view-mention' => 'ਜ਼ਿਕਰ ਦੇਖੋ',
	'notification-link-text-view-changes' => 'ਤਬਦੀਲੀਆਂ ਦੇਖੋ',
	'notification-link-text-view-page' => 'ਪੰਨਾ ਦੇਖੋ',
	'notification-link-text-view-edit' => 'ਸੋਧ ਦੇਖੋ',
	'notification-edit-talk-page2' => '[[User:$1|$1]] ਨੇ ਤੁਹਾਡੇ [[User talk:$2#$3|talk page]] ਤੇ ਇੱਕ ਸੰਦੇਸ਼ {{GENDER:$1|ਭੇਜਿਆ}} ਹੈ।',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] ਨੇ "[[User talk:$2#$3|$4]]" ਵਿੱਚ ਤੁਹਾਡੇ ਗੱਲ-ਬਾਤ ਪੰਨੇ ਤੇ ਇੱਕ ਸੰਦੇਸ਼ {{GENDER:$1|ਭੇਜਿਆ}} ਹੈ।',
	'notification-edit-talk-page-flyout2' => '$1 ਨੇ ਤੁਹਾਡੇ [[User talk:$2#$3|talk page]] ਉੱਤੇ ਇੱਕ ਸੰਦੇਸ਼ {{GENDER:$1|ਭੇਜਿਆ ਹੈ}}।',
	'notification-edit-talk-page-flyout-with-section' => '$1 ਨੇ "[[User talk:$2#$3|$4]]" ਵਿੱਚ ਤੁਹਾਡੇ ਗੱਲ-ਬਾਤ ਪੰਨੇ ਉੱਤੇ ਇਕ ਸੰਦੇਸ਼ {{GENDER:$1|leftਭੇਜਿਆ ਹੈ}}।',
	'notification-page-linked' => '[[:$2]] ਨੂੰ [[:$3]] ਤੋਂ {{GENDER:$1|ਜੋੜਿਆ}} ਸੀ। [[Special:WhatLinksHere/$2|ਇਸ ਪੰਨੇ ਨਾਲ ਜੁੜਦੇ ਸਾਰੇ ਲਿੰਕ ਵੇਖੋ]]।',
	'notification-page-linked-flyout' => '$2 ਨੂੰ [[:$3]] ਤੋਂ {{GENDER:$1|ਜੋੜਿਆ}} ਸੀ।',
	'notification-add-comment2' => '[[User:$1|$1]] ਨੇ "$4" ਗੱਲ-ਬਾਤ ਪੰਨੇ ਉੱਤੇ "[[$3|$2]]" ਉੱਤੇ {{GENDER:$1|ਟਿੱਪਣੀ ਕੀਤੀ}}।',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] ਨੇ [[$3]] ਉੱਤੇ ਇੱਕ ਨਵਾਂ ਵਿਸ਼ਾ "$2" {{GENDER:$1|ਪਾਇਆ}}',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] ਨੇ ਤੁਹਾਨੂੰ ਇੱਕ ਸੰਦੇਸ਼ {{GENDER:$1|ਭੇਜਿਆ ਹੈ}}: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]] ਨੇ ਤੁਹਾਡੇ ਗੱਲ-ਬਾਤ ਪੰਨੇ ਉੱਤੇ "[[$3#$2|$2]]" ਉੱਤੇ {{GENDER:$1|ਟਿੱਪਣੀ ਕੀਤੀ ਹੈ}}।',
	'notification-mention' => '[[User:$1|$1]] ਨੇ "[[$3#$2|$4]]" ਵਿੱਚ $5 ਗੱਲ-ਬਾਤ ਪੰਨੇ ਉੱਤੇ ਤੁਹਾਡਾ {{GENDER:$1|ਜ਼ਿਕਰ ਕੀਤਾ ਹੈ}}',
	'notification-mention-flyout' => '$1 ਨੇ "[[$3#$2|$4]]" ਵਿੱਚ $5 ਗੱਲ-ਬਾਤ ਪੰਨੇ ਉੱਤੇ ਤੁਹਾਡਾ {{GENDER:$1|ਜ਼ਿਕਰ ਕੀਤਾ ਹੈ}}',
	'notification-user-rights' => 'ਤੁਹਾਡੇ ਵਰਤੋਂਕਾਰ ਅਧਿਕਾਰ [[User:$1|$1]] ਦੁਆਰਾ [[Special:Log/rights/$1|{{GENDER:$1|ਬਦਲ ਦਿੱਤੇ ਗਏ ਸਨ}}]]। $2। [[Special:ListGroupRights|ਹੋਰ ਜਾਣੋ]]',
	'notification-user-rights-flyout' => 'ਤੁਹਾਡੇ ਵਰਤੋਂਕਾਰ ਅਧਿਕਾਰ $1 ਦੁਆਰਾ {{GENDER:$1|ਬਦਲ ਦਿੱਤੇ ਗਏ}} ਸਨ। $2।[[Special:ListGroupRights|ਹੋਰ ਜਾਣੋ]]',
	'notification-user-rights-add' => 'ਹੁਣ ਤੁਸੀਂ {{PLURAL:$2|ਇਸ ਸਮੂਹ|ਇਨ੍ਹਾਂ ਸਮੂਹਾਂ}} ਦੇ ਮੈਂਬਰ ਹੋ: $1',
	'notification-user-rights-remove' => 'ਹੁਣ ਤੁਸੀਂ {{PLURAL:$2|ਇਸ ਸਮੂਹ|ਇਨ੍ਹਾਂ ਸਮੂਹਾਂ}} ਦੇ ਮੈਂਬਰ ਨਹੀਂ ਹੋ: $1',
	'notification-new-user' => '{{SITENAME}} ਉੱਤੇ ਤੁਹਾਡਾ ਸਵਾਗਤ ਹੈ, $1! ਤੁਹਾਡੇ ਇਥੇ ਆਉਣ ਉੱਤੇ ਸਾਨੂੰ ਖੁਸ਼ੀ ਹੋਈ।',
	'notification-reverted2' => 'ਤੁਹਾਡੀ {{PLURAL:$4|[[:$2]] ਉੱਤੇ ਸੋਧ|[[:$2]] ਉੱਤੇ ਸੋਧਾਂ}} ਨੂੰ [[User:$1|$1]] ਨੇ {{GENDER:$1|ਰੱਦ ਕਰ ਦਿੱਤਾ}} ਹੈ। $3',
	'notification-reverted-flyout2' => 'ਤੁਹਾਡੀ {{PLURAL:$4|$2 ਉੱਤੇ ਸੋਧ|$2 ਉੱਤੇ ਸੋਧਾਂ}} ਨੂੰ $1 ਨੇ {{GENDER:$1|ਰੱਦ ਕਰ ਦਿੱਤਾ}} ਹੈ। $3',
	'notification-edit-talk-page-email-subject2' => '$1 ਨੇ {{SITENAME}} ਉੱਤੇ ਤੁਹਾਡੇ ਲਈ ਇੱਕ ਸੰਦੇਸ਼ {{GENDER:$1|ਭੇਜਿਆ ਹੈ}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 ਨੇ ਤੁਹਾਡੇ ਗੱਲ-ਬਾਤ ਪੰਨੇ ਉੱਤੇ ਇੱਕ ਸੰਦੇਸ਼ {{GENDER:$1|ਛੱਡਿਆ}} ਹੈ :',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 ਨੇ "$2" ਵਿੱਚ ਗੱਲ-ਬਾਤ ਪੰਨੇ ਉੱਤੇ ਇੱਕ ਸੰਦੇਸ਼ {{GENDER:$1|ਛੱਡਿਆ}} ਹੈ।',
	'notification-page-linked-email-subject' => '{{SITENAME}} ਉੱਤੇ ਤੁਹਾਡਾ ਪੰਨਾ ਜੁੜਦਾ ਹੈ',
	'notification-page-linked-email-batch-body' => '$2 ਨੂੰ $3 ਤੋਂ {{GENDER:$1|ਜੋੜਿਆ ਗਿਆ}}।',
	'notification-reverted-email-subject2' => 'ਤੁਹਾਡੀ {{SITENAME}} ਉੱਤੇ {{PLURAL:$3|ਸੋਧ|ਸੋਧਾਂ}} ਨੂੰ {{GENDER:$1|ਰੱਦ ਕਰ ਦਿੱਤਾ}} ਸੀ।',
	'notification-reverted-email-batch-body2' => 'ਤੁਹਾਡੀ {{PLURAL:$3|$2 ਉੱਤੇ ਸੋਧ|$2 ਉੱਤੇ ਸੋਧਾਂ}} ਨੂੰ $1 ਨੇ {{GENDER:$1|ਰੱਦ ਕਰ ਦਿੱਤਾ}} ਹੈ।',
	'notification-mention-email-subject' => '$1 ਨੇ {{SITENAME}} ਉੱਤੇ ਤੁਹਾਡਾ {{GENDER:$1|ਜ਼ਿਕਰ ਕੀਤਾ ਹੈ}}',
	'notification-mention-email-batch-body' => '$1 ਨੇ "$3" ਵਿੱਚ $4 ਗੱਲ-ਬਾਤ ਪੰਨੇ ਉੱਤੇ ਤੁਹਾਡਾ {{GENDER:$1|ਜ਼ਿਕਰ ਕੀਤਾ ਹੈ}}',
	'notification-user-rights-email-subject' => '{{SITENAME}} ਉੱਤੇ ਤੁਹਾਡੇ ਵਰਤੋਂਕਾਰ ਅਧਿਕਾਰ ਬਦਲ ਗਏ ਹਨ',
	'notification-user-rights-email-batch-body' => 'ਤੁਹਾਡੇ ਵਰਤੋਂਕਾਰ ਅਧਿਕਾਰ $1. $2 ਦੁਆਰਾ {{GENDER:$1|ਬਦਲੇ ਗਏ}}।',
	'echo-email-subject-default' => '{{SITENAME}} ਉੱਤੇ ਨਵੀਂ ਸੂਚਨਾ',
	'echo-email-body-default' => 'ਤੁਹਾਡੇ ਲਈ {{SITENAME}} ਉੱਤੇ ਨਵੀਂ ਸੂਚਨਾ ਹੈ:

$1',
	'echo-email-batch-body-default' => 'ਤੁਹਾਡੇ ਲਈ ਇੱਕ ਨਵੀਂ ਸੂਚਨਾ ਹੈ।',
	'echo-email-footer-default' => '$2

ਅਸੀਂ ਤੁਹਾਨੂੰ ਕਿਹੜੇ ਈ-ਮੇਲ ਭੇਜਦੇ ਹਾਂ ਨੂੰ ਕੰਟਰੋਲ ਕਰਨ ਲਈ ਆਪਣੀਆਂ ਤਰਜੀਹਾਂ ਵੇਖੋ:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'ਅਸੀਂ ਤੁਹਾਨੂੰ ਕਿਹੜੇ ਈ-ਮੇਲ ਭੇਜਦੇ ਹਾਂ ਨੂੰ ਕੰਟਰੋਲ ਕਰਨ ਲਈ <a href="$2" style="text-decoration:none; color: #3868B0;">ਆਪਣੀਆਂ ਤਰਜੀਹਾਂ ਵੇਖੋ</a>.<br />
$1',
	'echo-overlay-link' => 'ਸਾਰੀਆਂ ਸੂਚਨਾਵਾਂ',
	'echo-overlay-title' => '<b>ਸੂਚਨਾਵਾਂ</b>',
	'echo-overlay-title-overflow' => '<b>ਸੂਚਨਾਵਾਂ</b> ($2 ਨਾ ਪੜ੍ਹੀਆਂ ਗਈਆਂ ਵਿੱਚੋਂ $1 ਦਿਖਾਈ ਜਾ ਰਹੀ ਹੈ)', # Fuzzy
	'echo-mark-all-as-read' => 'ਸਾਰੀਆਂ ਨੂੰ ਪੜ੍ਹਿਆਂ ਵਜੋਂ ਨਿਸ਼ਾਨੀ ਲਾਓ',
	'echo-date-today' => 'ਅੱਜ',
	'echo-date-yesterday' => 'ਬੀਤੀ ਕੱਲ',
	'echo-load-more-error' => 'ਹੋਰ ਨਤੀਜੇ ਖੋਜਣ ਦੌਰਾਨ ਇੱਕ ਭੁੱਲ ਹੋ ਗਈ।',
	'notification-edit-talk-page-bundle' => '$1 ਅਤੇ  $3 {{PLURAL:$4|ਹੋਰ|ਹੋਰਾਂ}} ਨੇ ਤੁਹਾਡੇ [[User talk:$2|talk page]] ਉੱਤੇ ਸੰਦੇਸ਼ {{GENDER:$1|ਭੇਜਿਆ ਹੈ}}।',
	'notification-page-linked-bundle' => '$2 ਨੂੰ $3 ਅਤੇ $4 ਹੋਰ {{PLURAL:$5|ਪੰਨਾ|ਪੰਨੇ}} ਤੋਂ {{GENDER:$1|ਜੋੜਿਆ}} ਸੀ।
[[Special:WhatLinksHere/$2|ਇਸ ਪੰਨੇ ਉੱਤੇ ਜੁੜਦੇ ਸਾਰੇ ਲਿੰਕ ਵੇਖੋ]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 ਅਤੇ $2 {{PLURAL:$3|ਹੋਰ|ਹੋਰਾਂ}} ਨੇ ਤੁਹਾਡੇ ਗੱਲ-ਬਾਤ ਪੰਨੇ ਉੱਤੇ ਇੱਕ ਸੰਦੇਸ਼ {{GENDER:$1|}}ਭੇਜਿਆ ਹੈ।',
	'notification-page-linked-email-batch-bundle-body' => '$2 ਨੂੰ $3 ਅਤੇ $4 ਹੋਰ {{PLURAL:$5|ਪੰਨਾ|ਪੰਨੇ}} ਤੋਂ {{GENDER:$1|ਜੋੜਿਆ}} ਸੀ।',
	'echo-email-batch-subject-daily' => 'ਤੁਹਾਡੇ ਲਈ {{SITENAME}} ਉੱਤੇ {{PLURAL:$2|ਇੱਕ ਨਵੀਂ ਸੂਚਨਾ|ਨਵੀਆਂ ਸੂਚਨਾਵਾਂ}} ਹਨ।',
	'echo-email-batch-subject-weekly' => 'ਤੁਹਾਡੇ ਲਈ {{SITENAME}} ਉੱਤੇ ਇਸ ਹਫਤੇ {{PLURAL:$2|ਇੱਕ ਨਵੀਂ ਸੂਚਨਾ|ਨਵੀਆਂ ਸੂਚਨਾਵਾਂ}} ਹਨ।',
	'echo-email-batch-body-intro-daily' => 'ਸਤਿ ਸ਼੍ਰੀ ਅਕਾਲ $1,
ਤੁਹਾਡੇ ਲਈ {{SITENAME}} ਉੱਤੇ ਅੱਜ ਦੀ ਸਰਗਰਮੀ ਦਾ ਸਾਰ।',
	'echo-email-batch-body-intro-weekly' => 'ਸਤਿ ਸ਼੍ਰੀ ਅਕਾਲ $1,
ਤੁਹਾਡੇ ਲਈ {{SITENAME}} ਉੱਤੇ ਹਫਤਾਵਰ ਸਰਗਰਮੀ ਦਾ ਸਾਰ।',
	'echo-email-batch-link-text-view-all-notifications' => 'ਸਾਰੀਆਂ ਸੂਚਨਾਵਾਂ ਦੇਖੋ',
	'echo-rev-deleted-text-view' => 'ਇਸ ਪੰਨੇ ਦੀ ਸੁਧਾਈ ਨੂੰ ਰੋਕ ਦਿੱਤਾ ਗਿਆ ਹੈ।',
);

/** Polish (polski)
 * @author Ankry
 * @author Base
 * @author BeginaFelicysym
 * @author Chrumps
 * @author Faren
 * @author Matma Rex
 * @author Odie2
 * @author Przemub
 * @author Tar Lócesilion
 * @author WTM
 * @author Woytecr
 * @author Wpedzich
 */
$messages['pl'] = array(
	'echo-desc' => 'System powiadomień',
	'prefs-echo' => 'Powiadomienia',
	'prefs-emailsettings' => 'Opcje e-maila',
	'prefs-displaynotifications' => 'Opcje wyświetlania',
	'prefs-echosubscriptions' => 'Powiadom mnie o tych zdarzeniach',
	'prefs-newmessageindicator' => 'Informacje o nowych wiadomościach',
	'echo-pref-send-me' => 'Wysyłaj mi:',
	'echo-pref-send-to' => 'Wyślij na adres:',
	'echo-pref-email-format' => 'Format e-maila:',
	'echo-pref-web' => 'Na stronie',
	'echo-pref-email' => 'Przez e‐mail',
	'echo-pref-email-frequency-never' => 'Nie wysyłaj powiadomień e-mailem',
	'echo-pref-email-frequency-immediately' => 'Każde powiadomienie osobno',
	'echo-pref-email-frequency-daily' => 'Dzienne podsumowanie',
	'echo-pref-email-frequency-weekly' => 'Tygodniowe podsumowanie',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Zwykły tekst',
	'echo-pref-notify-show-link' => 'Pokazuj powiadomienia w pasku narzędzi',
	'echo-pref-new-message-indicator' => 'Pokazuj informację o nowej wiadomości w pasku osobistym',
	'echo-learn-more' => 'Dowiedz się więcej',
	'echo-new-messages' => 'Masz nowe wiadomości',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Wpis|Wpisy}} w dyskusji',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Link|Linki}} do moich artykułów',
	'echo-category-title-reverted' => '{{PLURAL:$1|Rewert|Rewerty}} edycji',
	'echo-category-title-mention' => '{{PLURAL:$1|Wzmianka|Wzmianki}}',
	'echo-category-title-other' => '{{PLURAL:$1|Inne zdarzenie|Inne zdarzenia}}',
	'echo-category-title-system' => '{{PLURAL:$1|Zdarzenie systemowe|Zdarzenia systemowe}}',
	'echo-pref-tooltip-edit-user-talk' => 'Powiadom mnie, kiedy ktoś napisze nową wiadomość albo odpowie na mojej stronie dyskusji.',
	'echo-pref-tooltip-article-linked' => 'Powiadom mnie, kiedy ktoś umieści w artykule link do strony utworzonej przeze mnie.',
	'echo-pref-tooltip-reverted' => 'Powiadom mnie, kiedy ktoś wycofa moją edycję korzystając z narzędzia „anuluj” albo „cofnij”.',
	'echo-pref-tooltip-mention' => 'Powiadom mnie, kiedy ktoś umieści link do mojej strony użytkownika na jakiejkolwiek stronie dyskusji.',
	'echo-no-agent' => '[Nikt]',
	'echo-no-title' => '[Brak strony]',
	'echo-error-no-formatter' => 'Nie określono formatowania dla powiadomień',
	'echo-error-preference' => 'Błąd: Nie można ustawić preferencji użytkownika',
	'echo-error-token' => 'Błąd: Nie można pobrać tokenu',
	'notifications' => 'Powiadomienia',
	'tooltip-pt-notifications' => 'Twoje powiadomienia',
	'echo-specialpage' => 'Powiadomienia',
	'echo-anon' => 'Aby otrzymywać powiadomienia, [$1 załóż konto] lub [$2 zaloguj się].',
	'echo-none' => 'Nie masz żadnych powiadomień.',
	'echo-more-info' => 'Więcej informacji',
	'echo-feedback' => 'Opinie',
	'notification-link-text-view-message' => 'Zobacz wiadomość',
	'notification-link-text-view-mention' => 'Zobacz wzmiankę',
	'notification-link-text-view-changes' => 'Zobacz zmiany',
	'notification-link-text-view-page' => 'Zobacz stronę',
	'notification-link-text-view-edit' => 'Zobacz edycję',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|napisał|napisała}} do ciebie na twojej [[User talk:$2#$3|stronie dyskusji]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|napisał|napisała}} do ciebie na twojej stronie dyskusji, w wątku „[[User talk:$2#$3|$4]]”.',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|napisał|napisała}} do ciebie na twojej [[User talk:$2#$3|stronie dyskusji]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|napisał|napisała}} do ciebie na twojej stronie dyskusji, w wątku „[[User talk:$2#$3|$4]]”.',
	'notification-page-linked' => 'W artykule [[:$3]] {{GENDER:$1|umieszczono}} link do artykułu [[:$2]]. [[Special:WhatLinksHere/$2|Pokaż wszystkie linkujące do artykułu $2]].',
	'notification-page-linked-flyout' => 'W artykule [[:$3]] {{GENDER:$1|umieszczono}} link do artykułu $2.',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|umieścił|umieściła}} komentarz do „[[$3|$2]]” na stronie dyskusji „$4”',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|umieścił|umieściła}} komentarz w nowym wątku „$2” na stronie [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|wysłał|wysłała}} ci wiadomość: „[[$3#$2|$2]]”',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|umieścił|umieściła}} komentarz do „[[$3#$2|$2]]” na twojej stronie dyskusji',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|wspomniał|wspomniała}} o tobie na stronie $5 w wątku „[[$3#$2|$4]]”.',
	'notification-mention-flyout' => '$1 {{GENDER:$1|wspomniał|wspomniała}} o tobie w wątku „[[$3#$2|$4]]” na stronie $5.',
	'notification-mention-nosection' => '[[User:$1|$1]] {{GENDER:$1|wspomniał|wspomniała}} o tobie na [[$3|stronie $2]].',
	'notification-mention-nosection-flyout' => '$1 {{GENDER:$1|wspomniał|wspomniała}} o tobie na [[$3|stronie $2]].',
	'notification-user-rights' => '[[User:$1|$1]] [[Special:Log/rights/$1|{{GENDER:$1|zmienił|zmieniła}}]] twoje uprawnienia. $2. [[Special:ListGroupRights|Dowiedz się więcej]]',
	'notification-user-rights-flyout' => '$1 {{GENDER:$1|zmienił|zmieniła}} twoje uprawnienia. $2. [[Special:ListGroupRights|Dowiedz się więcej]]',
	'notification-user-rights-add' => 'Należysz teraz do {{PLURAL:$2|tej grupy|tych grup}}: $1',
	'notification-user-rights-remove' => 'Od teraz nie należysz już do {{PLURAL:$2|tej grupy|tych grup}}: $1',
	'notification-new-user' => 'Witaj w {{grammar:MS.lp|{{SITENAME}}}}, $1! Cieszymy się, że tu jesteś.',
	'notification-reverted2' => '[[User:$1|$1]] {{GENDER:$1|wycofał|wycofała}} {{PLURAL:$4|twoją edycję|twoje edycje}} na stronie [[:$2]] $3',
	'notification-reverted-flyout2' => '$1 {{GENDER:$1|wycofał|wycofała}} {{PLURAL:$4|twoją edycję|twoje edycje}} na stronie $2 $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|napisał|napisała}} do ciebie w {{grammar:MS.lp|{{SITENAME}}}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|napisał|napisała}} do ciebie na twojej stronie dyskusji:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|napisał|napisała}} do ciebie na twojej stronie dyskusji w wątku „$2”.',
	'notification-page-linked-email-subject' => 'W {{grammar:MS.lp|{{SITENAME}}}} ktoś wstawił link do twojej strony',
	'notification-page-linked-email-batch-body' => 'Na stronie $3 {{GENDER:$1|umieszczono}} link do strony $2',
	'notification-reverted-email-subject2' => '$1 {{GENDER:$1|wycofał|wycofała}} {{PLURAL:$3|twoją edycję|twoje edycje}} w {{grammar:MS.lp|{{SITENAME}}}}',
	'notification-reverted-email-batch-body2' => '$1 {{GENDER:$1|wycofał|wycofała}} {{PLURAL:$3|twoją edycję|twoje edycje}} na stronie $2',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|wspomniał|wspomniała}} o tobie w {{grammar:MS.lp|{{SITENAME}}}}',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|wspomniał|wspomniała}} o tobie na stronie $4 w wątku „$3”.',
	'notification-mention-nosection-email-batch-body' => '$1 {{GENDER:$1|wspomniał|wspomniała}} o tobie na stronie $2.',
	'notification-user-rights-email-subject' => 'W {{grammar:MS.lp|{{SITENAME}}}} zostały zmienione twoje uprawnienia',
	'notification-user-rights-email-batch-body' => '$1 {{GENDER:$1|zmienił|zmieniła}} twoje uprawnienia. $2',
	'echo-notification-count' => '$1+',
	'echo-email-subject-default' => 'Nowe powiadomienie w {{grammar:MS.lp|{{SITENAME}}}}',
	'echo-email-body-default' => 'Masz nowe powiadomienie w {{grammar:MS.lp|{{SITENAME}}}}:

$1',
	'echo-email-batch-body-default' => 'Masz nowe powiadomienie',
	'echo-email-footer-default' => '$2

Możesz wybrać, jakie e-maile chcesz otrzymywać, w swoich preferencjach: {{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Możesz wybrać, jakie e-maile chcesz otrzymywać <a href="$2" style="text-decoration:none; color: #3868B0;">w swoich preferencjach</a>.<br />
$1',
	'echo-overlay-link' => 'Wszystkie powiadomienia',
	'echo-overlay-title' => '<b>Powiadomienia</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Powiadomienie|Powiadomienia}}</b> (wyświetlono $1 z $2 nieprzeczytanych)',
	'echo-mark-all-as-read' => 'Oznacz wszystkie jako przeczytane',
	'echo-date-today' => 'Dzisiaj',
	'echo-date-yesterday' => 'Wczoraj',
	'echo-load-more-error' => 'Wystąpił błąd przy pobieraniu kolejnych wyników.',
	'notification-edit-talk-page-bundle' => '$1 i {{PLURAL:$4|ktoś inny|$3 inni|$3 innych}} napisali do ciebie na twojej [[User talk:$2|stronie dyskusji]].',
	'notification-page-linked-bundle' => 'Na stronie $3 i na {{PLURAL:$5|innej stronie|$4 innych stronach}} {{GENDER:$1|umieszczono}} link do strony $2: [[Special:WhatLinksHere/$2|pokaż wszystkie linkujące do tej strony]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 i {{PLURAL:$3|ktoś inny|$2 inni|$2 innych}} {{GENDER:$1|napisali}} do ciebie na twojej stronie dyskusji.',
	'notification-page-linked-email-batch-bundle-body' => 'Na stronie $3 i na {{PLURAL:$5|innej stronie|$4 innych stronach}} {{GENDER:$1|umieszczono}} link do strony $2',
	'echo-email-batch-subject-daily' => 'Masz {{PLURAL:$2|nowe powiadomienie|nowe powiadomienia}} w {{grammar:MS.lp|{{SITENAME}}}}',
	'echo-email-batch-subject-weekly' => 'Masz {{PLURAL:$2|nowe powiadomienie|nowe powiadomienia}} w {{grammar:MS.lp|{{SITENAME}}}} z tego tygodnia',
	'echo-email-batch-body-intro-daily' => 'Cześć, $1!
W {{grammar:MS.lp|{{SITENAME}}}} czeka na ciebie dzisiejsze podsumowanie powiadomień.',
	'echo-email-batch-body-intro-weekly' => 'Cześć, $1!
W {{grammar:MS.lp|{{SITENAME}}}} czeka na ciebie podsumowanie powiadomień z ostatniego tygodnia.',
	'echo-email-batch-link-text-view-all-notifications' => 'Zobacz wszystkie powiadomienia',
	'echo-rev-deleted-text-view' => 'Ta wersja strony została ukryta',
);

/** Piedmontese (Piemontèis)
 * @author Borichèt
 * @author Dragonòt
 */
$messages['pms'] = array(
	'echo-desc' => 'Sistema ëd notìfiche',
	'prefs-echo' => 'Notìfiche',
	'prefs-emailsettings' => 'Opsion ëd pòsta eletrònica',
	'prefs-displaynotifications' => 'Opsion ëd visualisassion',
	'prefs-echosubscriptions' => 'Aviseme ëd si eveniment',
	'prefs-newmessageindicator' => 'Marca ëd mëssagi neuv',
	'echo-pref-send-me' => 'Mandeme:',
	'echo-pref-send-to' => 'Mandé a:',
	'echo-pref-email-format' => 'Formà ëd mëssagi:',
	'echo-pref-web' => 'Aragnà',
	'echo-pref-email' => 'Mëssagi',
	'echo-pref-email-frequency-never' => 'Mandeme gnun-e notìfiche për pòsta eletrònica',
	'echo-pref-email-frequency-immediately' => 'Notìfiche andividuaj com che a rivo',
	'echo-pref-email-frequency-daily' => 'Un resumé cotidian dle notìfiche',
	'echo-pref-email-frequency-weekly' => 'Un resumé ebdomadari dle notìfiche',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Mach test',
	'echo-pref-notify-show-link' => "Smon-e le notìfiche an mia bara d'utiss",
	'echo-pref-new-message-indicator' => "Smon-e la marca ëd mëssagi an la pàgina ëd ciaciarade an mia bara d'utiss",
	'echo-learn-more' => "Savèjne 'd pì",
	'echo-new-messages' => "A l'ha 'd mëssagi neuv",
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|mëssagi}} ëd la pàgina ëd ciaciarade',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Liura|Liure}} a dle pàgine',
	'echo-category-title-reverted' => '{{PLURAL:$1|Anulament}} ëd modìfiche',
	'echo-category-title-mention' => '{{PLURAL:$1|Mension}}',
	'echo-category-title-other' => '{{PLURAL:$1|Àutr}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistema}}',
	'echo-pref-tooltip-edit-user-talk' => 'Aviseme cand cheidun a pùblica un mëssagi o a rëspond su mia pàgina ëd ciaciarade.',
	'echo-pref-tooltip-article-linked' => "Aviseme cand cheidun a buta na liura a na pàgina che mi i l'hai creà da na pàgina d'artìcol.",
	'echo-pref-tooltip-reverted' => "Aviseme cand cheidun a anula na modìfica che mi i l'hai fàit, an dovrand l'utiss d'anulament o d'artorn andaré.",
	'echo-pref-tooltip-mention' => "Aviseme cand cheidun a buta na liura a mia pàgina d'utent da na pàgina ëd discussion qualsëssìa.",
	'echo-no-agent' => '[Gnun]',
	'echo-no-title' => '[Gnun-a pàgina]',
	'echo-error-no-formatter' => 'Gnun formà definì për la notìfica',
	'echo-error-preference' => 'Eror: Impossìbil definì ël gust utent.',
	'echo-error-token' => "Eror: Impossìbil arcuperé ël geton dl'utent.",
	'notifications' => 'Notìfiche',
	'tooltip-pt-notifications' => 'Toe notìfiche',
	'echo-specialpage' => 'Notìfiche',
	'echo-anon' => 'Për arseive dle notìfiche, <span class="plainlinks">[$1 ch\'a crea un cont] o <span class="plainlinks">[$2 ch\'a intra ant ël sistema].',
	'echo-none' => "A l'ha gnun-e notìfiche.",
	'echo-more-info' => "Pi d'anformassion",
	'echo-feedback' => 'Opinion',
	'notification-link-text-view-message' => 'Smon-e ël mëssagi',
	'notification-link-text-view-mention' => 'Smon-e la rëspondensa',
	'notification-link-text-view-changes' => 'Smon-e le modìfiche',
	'notification-link-text-view-page' => 'Smon-e la pàgina',
	'notification-link-text-view-edit' => 'Smon-e la modìfica',
	'notification-edit-talk-page2' => "[[User:$1|$1]] {{GENDER:$1|a l'ha lassà}} un mëssagi dzora a soa [[User talk:$2#$3|pàgina ëd ciaciarade]].",
	'notification-edit-talk-page-with-section' => "[[User:$1|$1]] {{GENDER:$1|a l'ha lassà}} un mëssagi an soa pàgina ëd ciaciarade an «[[User talk:$2#$3|$4]]».",
	'notification-edit-talk-page-flyout2' => "$1 {{GENDER:$1|a l'ha lassà}} un mëssagi dzora soa [[User talk:$2#$3|pàgina ëd ciaciarade]].",
	'notification-edit-talk-page-flyout-with-section' => "$1 {{GENDER:$1|a l'ha lassà}} un mëssagi su soa pàgina ëd ciaciarade an «[[User talk:$2#$3|$4]]».",
	'notification-page-linked' => "[[:$2]] a l'é stàit {{GENDER:$1|colegà}} da [[:$3]]. [[Special:WhatLinksHere/$2|Vëdde tute le liure a costa pàgina]].",
	'notification-page-linked-flyout' => "$2 a l'é stàit {{GENDER:$1|colegà}} da [[:$3]].",
	'notification-add-comment2' => "[[User:$1|$1]] {{GENDER:$1|a l'ha comentà}} su «[[$3|$2]]» an sla pàgina ëd discussion «$4»",
	'notification-add-talkpage-topic2' => "[[User:$1|$1]] {{GENDER:$1|a l'ha publicà}} n'argoment neuv «$2» dzor [[$3]]",
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|a l\'ha manda}}te un mëssagi: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => "[[User:$1|$1]] {{GENDER:$1|a l'ha comentà}} dzor «[[$3#$2|$2]]» su soa pàgina ëd ciaciarade",
	'notification-mention' => "[[User:$1|$1]] a l'ha {{GENDER:$1|massionalo|massionala}} an sla pàgina ëd ciaciarade ëd $5 an «[[$3#$2|$4]]».",
	'notification-mention-flyout' => "$1 {{GENDER:$1|a l'ha massionalo|a l'ha massionala}} ant la pàgina ëd discussion ëd $5 an «[[$3#$2|$4]]».",
	'notification-mention-nosection' => "[[User:$1|$1]] a l'ha {{GENDER:$1|massionalo|massional}} ant la [[$3|pàgina ëd discussion ëd $2]].",
	'notification-mention-nosection-flyout' => "$1 {{GENDER:$1|a l'ha massionalo|a l'ha massionala}} an sla [[$3|pàgina ëd discussion ëd $2]].",
	'notification-user-rights' => "Ij sò drit d'utent [[Special:Log/rights/$1|a son ëstàit {{GENDER:$1|modificà}}]] da [[User:$1|$1]]. $2. [[Special:ListGroupRights|Savèjne ëd pi]]",
	'notification-user-rights-flyout' => "Ij sò drit d'utent a son ëstàit {{GENDER:$1|modificà}} da $1. $2. [[Special:ListGroupRights|Savèjne ëd pi]]",
	'notification-user-rights-add' => "Adess a l'é mèmber ëd {{PLURAL:$2|costa partìa|coste partìe}}: $1",
	'notification-user-rights-remove' => "A l'é pi nen mèmber ëd {{PLURAL:$2|costa partìa|coste partìe}}: $1",
	'notification-new-user' => "Bin-ëvnù su {{SITENAME}}, $1! I soma content ch'a l'é ambelessì.",
	'notification-reverted2' => "{{PLURAL:$4|Soa modìfica dzor [[:$2]] a l'é stàita|Soe modìfiche dzor [[:$2]] a son stàite}} {{GENDER:$1|ripristinà}} da [[User:$1|$1]] $3",
	'notification-reverted-flyout2' => "{{PLURAL:$4|Soa modìfica dzor $2 a l'é stàita|Soe modìfiche dzor $2 a son stàite}} {{GENDER:$1|ripristinà}} da $1 $3",
	'notification-edit-talk-page-email-subject2' => "$1 a l'ha {{GENDER:$1|lassaje}} un mëssagi su {{SITENAME}}",
	'notification-edit-talk-page-email-batch-body2' => "$1 {{GENDER:$1|a l'ha lassà}} un mëssadi dzora soa pàgina ëd ciaciarade:",
	'notification-edit-talk-page-email-batch-body-with-section' => "$1 {{GENDER:$1|a l'ha lassà}} un mëssagi su soa pàgina ëd discussion an «$2».",
	'notification-page-linked-email-subject' => "Soa pàgina a l'é stàita sità su {{SITENAME}}",
	'notification-page-linked-email-batch-body' => "$2 a l'é stàit {{GENDER:$1|sità}} da $3.",
	'notification-reverted-email-subject2' => "{{PLURAL:$3|Soa modìfica a l'é stàita|Soe modìfiche a son ëstàite}} {{GENDER:$1|anulà}} su {{SITENAME}}",
	'notification-reverted-email-batch-body2' => "{{PLURAL:$3|Soa modìfica a $2 a l'é stàita|Soe modìfiche a $2 a son stàite}} {{GENDER:$1|anulà}} da $1.",
	'notification-mention-email-subject' => "$1 a l'ha {{GENDER:$1|massionalo|massionala}} su {{SITENAME}}",
	'notification-mention-email-batch-body' => "$1 a l'ha {{GENDER:$1|massionalo|massionala}} ant lapàgina ëd discussion ëd $4 an «$3».",
	'notification-mention-nosection-email-batch-body' => "$1 a l'ha {{GENDER:$1|massionalo|massionala}} ant la pàgina ëd discussion ëd $2.",
	'notification-user-rights-email-subject' => "Ij sò drit d'utent a son ëstàit modificà su {{SITENAME}}",
	'notification-user-rights-email-batch-body' => "Ij sò drit d'utent a son ëstàit {{GENDER:$1|modificà}} da $1. $2.",
	'echo-email-subject-default' => 'Notìfiche neuve a {{SITENAME}}',
	'echo-email-body-default' => "It l'has na notìfica neuva a {{SITENAME}}:

$1",
	'echo-email-batch-body-default' => "A l'ha na neuva notìfica.",
	'echo-email-footer-default' => "$2

Për controlé che mëssagi i-j mandoma, ch'a contròla ij sò gust:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1",
	'echo-email-footer-default-html' => 'Për controlé che mëssagi i-j mandoma, <a href="$2" style="text-decoration:none; color: #3868B0;">ch\'a contròla ij sò gust</a>.<br />
$1',
	'echo-overlay-link' => 'Tute le notìfiche',
	'echo-overlay-title' => '<b>Notìfiche</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Notìfiche}}</b> (as na mostro $1 ëd $2 nen lesùe)',
	'echo-mark-all-as-read' => 'Marché tut tanme lesù',
	'echo-date-today' => 'Ancheuj',
	'echo-date-yesterday' => 'Jer',
	'echo-load-more-error' => "A l'é capitaje n'eror an recuperand pi d'arzultà.",
	'notification-edit-talk-page-bundle' => "$1 e $3 {{PLURAL:$4|àutr a l'ha|àutri a l'han}} {{GENDER:$1|lassà}} un mëssagi su soa [[User talk:$2|pàgina dle ciaciarade]].",
	'notification-page-linked-bundle' => "$2 a l'é stàit {{GENDER:$1|colegà}} da $3 e $4 {{PLURAL:$5|àutra pàgina|àutre pàgine}}. [[Special:WhatLinksHere/$2|Vëdde tute le liure a costa pàgina]]",
	'notification-edit-user-talk-email-batch-bundle-body' => "$1 e $2 {{PLURAL:$3|àutr|àutri}} a l'han {{GENDER:$1|lassà}} un mëssagi su soa pàgina dle ciaciarade.",
	'notification-page-linked-email-batch-bundle-body' => "$2 a l'é stàit {{GENDER:$1|colegà}} da $3 e $4 {{PLURAL:$5|àutra pàgina|àutre pàgine}}.",
	'echo-email-batch-subject-daily' => "A l'ha {{PLURAL:$2|na notìfica neuva|dle notìfiche neuve}} su {{SITENAME}}",
	'echo-email-batch-subject-weekly' => "A l'ha {{PLURAL:$2|na notìfica neuva|dle notìfiche neuve}} su {{SITENAME}} sta sman-a",
	'echo-email-batch-body-intro-daily' => "Cerea $1
Valà un resumé dl'atività d'ancheuj su {{SITENAME}} për chiel.",
	'echo-email-batch-body-intro-weekly' => "Cerea $1,
Valà un resumé dl'atività dë sta sman-a su {{SITENAME}} për chiel.",
	'echo-email-batch-link-text-view-all-notifications' => 'Vëdde tute le notìfiche',
	'echo-rev-deleted-text-view' => "Costa revision ëd pàgina a l'é stàita scancelà.",
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'echo-desc' => 'د يادگيرنو غونډال',
	'prefs-echo' => 'يادگيرنې',
	'prefs-emailsettings' => 'د برېښليک خوښنې',
	'prefs-displaynotifications' => 'د ښکارېدنې خوښنې',
	'prefs-echosubscriptions' => 'د دغو پېښو په اړه دې خبر شم',
	'prefs-newmessageindicator' => 'نوی پيغام ښکاره کوونکی',
	'echo-pref-send-me' => 'را ولېږه:',
	'echo-pref-send-to' => 'ور ولېږه:',
	'echo-pref-email-format' => 'برېښليک بڼه:',
	'echo-pref-web' => 'وېبځی',
	'echo-pref-email' => 'برېښليک',
	'echo-pref-email-frequency-never' => 'برېښليکي يادگيرنې راته مه رالېږه',
	'echo-pref-email-frequency-immediately' => 'د رارسېدو سره سمدلاسه فردي يادگيرنې',
	'echo-pref-email-frequency-daily' => 'د يادگيرنو يو ورځينی لنډيز',
	'echo-pref-email-frequency-weekly' => 'د يادگيرنو يو اونيز لنډيز',
	'echo-pref-email-format-html' => 'اچ ټي ام اېل',
	'echo-pref-email-format-plain-text' => 'ساده متن',
	'echo-pref-notify-show-link' => 'يادگيرنې زما په توکپټه کې ښکاره کول',
	'echo-pref-new-message-indicator' => 'زما په توکپټه کې د خبرو اترو پيغام ښودونکی ښکاره کول',
	'echo-learn-more' => 'نور څه زده کول',
	'echo-new-messages' => 'تاسې نوي پيغامونه لرئ',
	'echo-category-title-edit-user-talk' => 'خبرو اترو مخ {{PLURAL:$1|پيغام|پيغامونه}}',
	'echo-category-title-article-linked' => 'مخ {{PLURAL:$1|تړنه|تړنې}}',
	'echo-category-title-other' => '{{PLURAL:$1|نور}}',
	'echo-category-title-system' => '{{PLURAL:$1|غونډال}}',
	'echo-no-agent' => '[هېڅوک]',
	'echo-no-title' => '[هېڅ مخ]',
	'notifications' => 'يادگيرنې',
	'tooltip-pt-notifications' => 'ستاسې يادگيرنې',
	'echo-specialpage' => 'يادگيرنې',
	'echo-anon' => 'د يادگيرنو د ترلاسه کولو لپاره، [$1 يو گڼون جوړ کړۍ] او يا هم [$2 کې ننوځۍ].',
	'echo-none' => 'تاسې هېڅ يادگيرنې نه لرئ.',
	'echo-more-info' => 'نور مالومات',
	'echo-feedback' => 'غبرگون',
	'notification-link-text-view-message' => 'پيغام کتل',
	'notification-link-text-view-mention' => 'يادگيرنه کتل',
	'notification-link-text-view-changes' => 'بدلونونه کتل',
	'notification-link-text-view-page' => 'مخ کتل',
	'notification-link-text-view-edit' => 'سمون کتل',
	'notification-new-user' => '$1 {{SITENAME}} ته ښه راغلې!، موږ خوښ يو چې تاسې دلته ياست.',
	'notification-edit-talk-page-email-batch-body2' => '$1 ستاسې د خبرو اترو په مخ يو پيغام {{GENDER:$1|پرېښوده}}:',
	'echo-email-subject-default' => 'په {{SITENAME}} باندې نوې يادگيرنه',
	'echo-email-body-default' => 'تاسې په {{SITENAME}} باندې يوه نوې يادگيرنه لرئ:

$1',
	'echo-email-batch-body-default' => 'تاسې يوه نوې يادگيرنه لرئ.',
	'echo-overlay-link' => 'ټولې يادگيرنې',
	'echo-overlay-title' => '<b>يادگيرنې</b>',
	'echo-overlay-title-overflow' => '<b>يادگيرنې</b> (د$2 څخه $1 نالوستلي ښکاره کول)', # Fuzzy
	'echo-mark-all-as-read' => 'ټول لوستی په نخښه کول',
	'echo-date-today' => 'نن',
	'echo-date-yesterday' => 'پرون',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 او $2 {{PLURAL:$3|نور|نورو}} يو پيغام ستاسې د خبرو اترو په مخ {{GENDER:$1|پرېښوده}}.',
	'echo-email-batch-link-text-view-all-notifications' => 'ټولې يادگيرنې کتل',
);

/** Portuguese (português)
 * @author Cainamarques
 * @author GoEThe
 * @author Helder.wiki
 * @author Lijealso
 * @author Polyethylen
 * @author Vitorvicentevalente
 */
$messages['pt'] = array(
	'echo-desc' => 'Sistema de notificações',
	'prefs-echo' => 'Notificações',
	'prefs-emailsettings' => 'Opções de e-mail',
	'prefs-displaynotifications' => 'Opções de visualização',
	'prefs-echosubscriptions' => 'Notifique-me sobre estes eventos',
	'prefs-newmessageindicator' => 'Indicador de nova mensagem',
	'echo-pref-send-me' => 'Envie-me:',
	'echo-pref-send-to' => 'Envie para:',
	'echo-pref-email-format' => 'Formato de e-mail:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-mail',
	'echo-pref-email-frequency-never' => 'Não me envie notificações por e-mail',
	'echo-pref-email-frequency-immediately' => 'Notificações individuais conforme cheguem',
	'echo-pref-email-frequency-daily' => 'Resumo diário de notificações',
	'echo-pref-email-frequency-weekly' => 'Resumo semanal de notificações',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Texto simples',
	'echo-pref-notify-show-link' => 'Mostrar notificações na barra de ferramentas',
	'echo-pref-new-message-indicator' => 'Mostrar mensagem na página de discussão na minha barra de ferramentas',
	'echo-learn-more' => 'Saiba mais',
	'echo-new-messages' => 'Tem novas mensagens',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Mensagem|Mensagens}} na página de discussão',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Ligação|Ligações}} para a página',
	'echo-category-title-reverted' => '{{PLURAL:$1|Edição revertida|Edições revertidas}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Menção|Menções}}',
	'echo-category-title-other' => '{{PLURAL:$1|Outro|Outros}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistema|Sistemas}}',
	'echo-pref-tooltip-edit-user-talk' => 'Notificar-me quando alguém publicar na minha página de discussão.',
	'echo-pref-tooltip-article-linked' => 'Notificar-me quando alguém interligar uma página criada por mim numa outra.',
	'echo-pref-tooltip-reverted' => 'Notificar-me quando alguém reverter uma edição minha, ao utilizar a função desfazer ou a ferramenta de reversão.',
	'echo-pref-tooltip-mention' => 'Notificar-me quando alguém mencionar ligação da minha página de discussão numa outra qualquer página de discussão.',
	'echo-no-agent' => '[Ninguém]',
	'echo-no-title' => '[Nenhuma página]',
	'echo-error-no-formatter' => 'Sem formato definido para notificações',
	'echo-error-preference' => 'Erro: não foi possível configurar as preferências do utilizador',
	'echo-error-token' => 'Erro: Não foi possível receber o toque do utilizador',
	'notifications' => 'Notificações',
	'tooltip-pt-notifications' => 'As suas notificações',
	'echo-specialpage' => 'Notificações',
	'echo-anon' => 'Para receber notificações, [$1 crie uma conta] ou [$2 entre] na sua.',
	'echo-none' => 'Não tem notificações.',
	'echo-more-info' => 'Mais informações',
	'echo-feedback' => 'Comentários',
	'notification-link-text-view-message' => 'Ver mensagem',
	'notification-link-text-view-mention' => 'Ver menção',
	'notification-link-text-view-changes' => 'Ver mudanças',
	'notification-link-text-view-page' => 'Ver página',
	'notification-link-text-view-edit' => 'Ver edição',
	'notification-edit-talk-page2' => '[[User:$1|$1]] deixou uma mensagem na sua [[User talk:$2#$3|página de discussão]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] deixou uma mensagem na sua página de discussão na secção "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 deixou uma mensagem na sua [[User talk:$2#$3|página de discussão]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 deixou uma mensagem na sua página de discussão na secção "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => '[[:$2]] foi ligada a partir de [[:$3]]. [[Special:WhatLinksHere/$2|Veja todas as páginas afluentes a esta]].', # Fuzzy
	'notification-page-linked-flyout' => '$2 foi ligada a partir de [[:$3]].', # Fuzzy
	'notification-add-comment2' => '[[User:$1|$1]] comentou em "[[$3|$2]]" na página de discussão de "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] criou o novo tópico "$2" em [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] enviou-lhe uma mensagem: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] comentou a secção "[[$3#$2|$2]]" na sua página de discussão',
	'notification-mention' => '{{GENDER:$1|O|A}} [[User:$1|$1]] mencionou-{{GENDER:$1|o|a}} na página de discussão $5, na secção "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '{{GENDER:$1|O|A}} $1 mencionou-{{GENDER:$1|o|a}} na página de discussão de $5, na secção "[[$3#$2|$4]]".',
	'notification-mention-nosection' => '[[User:$1|$1]] fez uma menção a si na [[$3|página de discussão de $2]].',
	'notification-mention-nosection-flyout' => '$1 mencionou você na [[$3|página de discussão de $2]].',
	'notification-user-rights' => 'Os seus privilégios de {{GENDER:$1|utilizador}} [[Special:Log/rights/$1|foram]] alterados por [[User:$1|$1]]. $2. [[Special:ListGroupRights|Saiba mais]]',
	'notification-user-rights-flyout' => 'Os seus privilégios de {{GENDER:$1|utilizador|utilizadora}} foram alterados por $1. $2. [[Special:ListGroupRights|Saiba mais]]',
	'notification-user-rights-add' => 'É agora membro {{PLURAL:$2|deste grupo|destes grupos}}: $1',
	'notification-user-rights-remove' => 'Já não é membro {{PLURAL:$2|deste grupo|destes grupos}}: $1',
	'notification-new-user' => 'Bem-vindo(a) à {{SITENAME}}, $1! Estamos contentes por se ter juntado a nós.',
	'notification-reverted2' => '{{PLURAL:$4|A sua edição em [[:$2]] foi revertida|As suas edições em [[:$2]] foram revertidas}} por [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|A sua edição em $2 foi revertida|As suas edições em $2 foram revertidas}} {{GENDER:$1|pelo|pela|por}} $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 deixou-lhe uma mensagem {{GENDER:$1|no}} {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 deixou-lhe uma mensagem {{GENDER:$1|na}} {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|deixou-lhe}} uma mensagem na sua página de discussão na secção "$2".',
	'notification-page-linked-email-subject' => 'A sua página foi ligada no {{SITENAME}}',
	'notification-page-linked-email-batch-body' => 'A página $2 foi {{GENDER:$1|ligada}} a partir de $3.',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|A sua edição foi revertida|As suas edições foram revertidas}} {{GENDER:$1|}} em {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|A sua edição em $2 foi revertida|As suas edições em $2 foram revertidas}} por $1.',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|mencionou-o|mencionou-a}} em {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 mencionou-{{GENDER:$1|o|a}} na página de discussão $4, na secção "$3".',
	'notification-mention-nosection-email-batch-body' => '$1 mencionou você na página de discussão de $2',
	'notification-user-rights-email-subject' => 'Os seus privilégios de utilizador foram alterados em {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Os seus privilégios de {{GENDER:$1|utilizador|utilizadora}} foram alterados por $1. $2.',
	'echo-email-subject-default' => 'Nova notificação em {{SITENAME}}',
	'echo-email-body-default' => 'Tem uma nova notificação em {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Tem uma nova notificação.',
	'echo-email-footer-default' => '$2

Para controlar quais os e-mails que deseja receber, consulte as suas preferências: {{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Para controlar quais os e-mails que deseja receber, <a href="$2" style="text-decoration:none; color: #3868B0;">consulte as suas preferências</a>.<br />
$1',
	'echo-overlay-link' => 'Todas as notificações',
	'echo-overlay-title' => '<b>Notificações</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Notificações}}</b> (a mostrar $1 de $2 não lidas)',
	'echo-mark-all-as-read' => 'Marcas todas como lidas',
	'echo-date-today' => 'Hoje',
	'echo-date-yesterday' => 'Ontem',
	'echo-load-more-error' => 'Ocorreu um erro ao carregar mais resultados.',
	'notification-edit-talk-page-bundle' => '$1 e $3 {{PLURAL:$4|outro|outros}} {{GENDER:$1|deixaram}} uma mensagem na sua [[User talk:$2|página de discussão]].',
	'notification-page-linked-bundle' => '$2 foi {{GENDER:$1|ligada}} a partir de $3 e $4 para {{PLURAL:$5|outra página|outras páginas}}. [[Special:WhatLinksHere/$2|Veja todas as páginas ligadas a esta]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 e $2 {{PLURAL:$3|outro|outros}} {{GENDER:$1|deixaram}} uma mensagem na sua página de discussão',
	'notification-page-linked-email-batch-bundle-body' => '$2 foi {{GENDER:$1|ligada}} a partir de $3 e $4 para {{PLURAL:$5|outra página|outras páginas}}',
	'echo-email-batch-subject-daily' => 'Tem {{PLURAL:$2|uma nova notificação|novas notificações}} em {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Tem {{PLURAL:$2|uma nova notificação|novas notificações}} em {{SITENAME}} esta semana',
	'echo-email-batch-body-intro-daily' => 'Olá $1,
Aqui está um resumo da actividade de hoje em {{SITENAME}} para si.',
	'echo-email-batch-body-intro-weekly' => 'Olá $1,
Aqui está um resumo da actividade desta semana em {{SITENAME}} para si.',
	'echo-email-batch-link-text-view-all-notifications' => 'Ver todas as notificações',
	'echo-rev-deleted-text-view' => 'Esta edição foi eliminada.',
);

/** Brazilian Portuguese (português do Brasil)
 * @author Cainamarques
 * @author Helder.wiki
 * @author HenriqueCrang
 * @author Luckas
 * @author Raylton P. Sousa
 * @author TheGabrielZaum
 */
$messages['pt-br'] = array(
	'echo-desc' => 'Sistema de notificações',
	'prefs-echo' => 'Notificações',
	'prefs-emailsettings' => 'Opções de email',
	'prefs-displaynotifications' => 'Opções de exibição',
	'prefs-echosubscriptions' => 'Notifique-me sobre esses eventos',
	'prefs-newmessageindicator' => 'Indicador de nova mensagem',
	'echo-pref-send-me' => 'Envie-me:',
	'echo-pref-send-to' => 'Envie para:',
	'echo-pref-email-format' => 'Formato do Email:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Email',
	'echo-pref-email-frequency-never' => 'Não me envie notificações por email',
	'echo-pref-email-frequency-immediately' => 'Notificações individuais conforme cheguem',
	'echo-pref-email-frequency-daily' => 'Resumo diário de notificações',
	'echo-pref-email-frequency-weekly' => 'Resumo semanal de notificações',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Texto simples',
	'echo-pref-notify-show-link' => 'Exibir notificações na barra de ferramentas',
	'echo-pref-new-message-indicator' => 'Exibir indicador de mensagem na página de discussão em minha barra de ferramentas',
	'echo-learn-more' => 'Saiba mais',
	'echo-new-messages' => 'Você tem novas mensagens',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Mensagem|Mensagens}} na página de discussão',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Link|Links}} para página',
	'echo-category-title-reverted' => '{{PLURAL:$1|Edição revertida|Edições revertidas}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Menção|Menções}}',
	'echo-category-title-other' => '{{PLURAL:$1|Outro|Outros}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistema|Sistemas}}',
	'echo-pref-tooltip-edit-user-talk' => 'Notifique-me quando alguém publicar ou responder em minha página de discussão.',
	'echo-pref-tooltip-article-linked' => 'Notifique-me quando alguém criar em um artigo link para uma página criada por mim.',
	'echo-pref-tooltip-reverted' => 'Notifique-me quando alguém reverter uma edição minha utilizando a função desfazer ou a ferramenta de reversão.',
	'echo-pref-tooltip-mention' => 'Notifique-me quando alguém criar links para minha página de usuário em alguma página de discussão.',
	'echo-no-agent' => '[Ninguém]',
	'echo-no-title' => '[Nenhuma página]',
	'echo-error-no-formatter' => 'Nenhum formato definido para notificações',
	'echo-error-preference' => 'Erro: não foi possível configurar as preferências do usuário',
	'echo-error-token' => 'Erro: Não foi possível receber token do usuário',
	'notifications' => 'Notificações',
	'tooltip-pt-notifications' => 'Suas notificações',
	'echo-specialpage' => 'Notificações',
	'echo-anon' => 'Para receber notificações, [[Special:Userlogin/signup|crie uma conta]] ou [[Special:UserLogin|registre-se]].',
	'echo-none' => 'Você não tem notificações.',
	'echo-more-info' => 'Mais informações',
	'echo-feedback' => 'Comentários',
	'notification-link-text-view-message' => 'Ver mensagem',
	'notification-link-text-view-mention' => 'Ver menção',
	'notification-link-text-view-changes' => 'Ver mudanças',
	'notification-link-text-view-page' => 'Ver página',
	'notification-link-text-view-edit' => 'Ver edição',
	'notification-edit-talk-page2' => '{{GENDER:$1|O|A}} [[User:$1|$1]] deixou uma mensagem em sua [[User talk:$2#$3|página de discussão]].',
	'notification-edit-talk-page-with-section' => '{{GENDER:$1|O|A}} [[User:$1|$1]] deixou uma mensagem em sua página de discussão em "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '{{GENDER:$1|O|A}} $1 deixou uma mensagem em sua [[User talk:$2#$3|página de discussão]].',
	'notification-edit-talk-page-flyout-with-section' => '{{GENDER:$1|O|A}} $1 deixou uma mensagem em sua página de discussão em "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => '[[:$2]] foi {{GENDER:$1|linkado}} a partir de [[:$3]]. [[Special:WhatLinksHere/$2|Veja todos os links para essa página]].',
	'notification-page-linked-flyout' => '$2 foi {{GENDER:$1|linkada}} em [[:$3]].',
	'notification-add-comment2' => '{{GENDER:$1|O|A}} [[User:$1|$1]] comentou em "[[$3|$2]]" na página de discussão "$4".',
	'notification-add-talkpage-topic2' => '{{GENDER:$1|O|A}} [[User:$1|$1]] adicionou um novo tópico "$2" em [[$3]].',
	'notification-add-talkpage-topic-yours2' => '{{GENDER:$1|O|A}} [[User:$1|$1]] enviou-lhe uma mensagem: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '{{GENDER:$1|O|A}} [[User:$1|$1]] comentou em "[[$3#$2|$2]]" em sua página de discussão.',
	'notification-mention' => '{{GENDER:$1|O|A}} [[User:$1|$1]] mencionou você na página de discussão $5 em "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '{{GENDER:$1|O|A}} $1 mencionou você na página de discussão $5 em "[[$3#$2|$4]]".',
	'notification-mention-nosection' => '[[User:$1|$1]] mencionou você na [[$3|página de discussão de $2]].',
	'notification-mention-nosection-flyout' => '$1 mencionou você na [[$3|página de discussão de $2]].',
	'notification-user-rights' => 'Seus direitos de usuário [[Special:Log/rights/$1|foram alterados]] {{GENDER:$1|pelo|pela|por}} [[User:$1|$1]]. $2. [[Special:ListGroupRights|Saiba mais]]',
	'notification-user-rights-flyout' => 'Seus direitos de usuário foram alterados {{GENDER:$1|pelo|pela|por}} $1. $2. [[Special:ListGroupRights|Saiba mais]]',
	'notification-user-rights-add' => 'Você agora é membro {{PLURAL:$2|desse grupo|desses grupos}}: $1',
	'notification-user-rights-remove' => 'Você não é mais membro {{PLURAL:$2|deste grupo|destes grupos}}: $1',
	'notification-new-user' => 'Bem-vindo(a) à {{SITENAME}}, $1! Estamos felizes por você estar aqui.',
	'notification-reverted2' => '{{PLURAL:$4|Sua edição em [[:$2]] foi revertida|Suas edições em [[:$2]] foram revertidas}} {{GENDER:$1|pelo|pela|por}} [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Sua edição em $2 foi revertida|Suas edições em $2 foram revertidas}} {{GENDER:$1|pelo|pela|por}} $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 deixou uma mensagem para você em {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 deixou uma mensagem em sua página de discussao:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 deixou uma mensagem em sua página de discussão em "$2".',
	'notification-page-linked-email-subject' => 'Sua página foi linkada na {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2 foi {{GENDER:$1|linkado}} a partir de $3.',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Sua edição foi|Suas edições foram}} {{PLURAL:$1|revertida|revertidas}} em {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Sua edição em $2 foi revertida|Suas edições em $2 foram revertidas}} {{GENDER:$1|pelo|pela|por}} $1.',
	'notification-mention-email-subject' => '$1 mencionou você em {{SITENAME}}',
	'notification-mention-email-batch-body' => '{{GENDER:$1|O|A}} $1 mencionou você na página de discussão de $4 em "$3".',
	'notification-mention-nosection-email-batch-body' => '$1 mencionou você na página de discussão de $2.',
	'notification-user-rights-email-subject' => 'Seus direitos de usuários mudaram na {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Seus direitos de usuário foram alterados por $1. $2.',
	'echo-email-subject-default' => 'Nova notificação em {{SITENAME}}',
	'echo-email-body-default' => 'Você tem uma nova notificação na {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Você tem uma nova notificação.',
	'echo-email-footer-default' => '$2

Para controlar quais emails enviamos a você, confira suas preferências: {{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Para controlar quais emails enviamos a você, <a href="$2" style="text-decoration:none; color: #3868B0;">confira suas preferências</a>.<br /> $1',
	'echo-overlay-link' => 'Todas as notificações',
	'echo-overlay-title' => '<b>Notificações</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Notificação|Notificações}}</b> (exibindo $1 de $2 não lidas)',
	'echo-mark-all-as-read' => 'Marcas todas como lidas',
	'echo-date-today' => 'Hoje',
	'echo-date-yesterday' => 'Ontem',
	'echo-load-more-error' => 'Um erro ocorreu ao carregar mais resultados.',
	'notification-edit-talk-page-bundle' => '{{GENDER:$1|O|A}} $1 e $3 {{PLURAL:$4|outro deixou|outros deixaram}} uma mensagem em sua [[User talk:$2|página de discussão]].',
	'notification-page-linked-bundle' => '$2 foi {{GENDER:$1|linkado}} em $3 e $4 {{PLURAL:$5|outra página|outras páginas}}. [[Special:WhatLinksHere/$2|Veja todos os links para essa página]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 e $2 {{PLURAL:$3|outro|outros}} deixaram uma mensagem em sua página de discussão.',
	'notification-page-linked-email-batch-bundle-body' => '$2 foi {{GENDER:$1|linkado}} em $3 e $4 {{PLURAL:$5|outra página|outras páginas}}.',
	'echo-email-batch-subject-daily' => 'Você tem {{PLURAL:$2|uma nova notificação|novas notificações}} na {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Você tem {{PLURAL:$2|uma nova notificação|novas notificações}} na {{SITENAME}} essa semana',
	'echo-email-batch-body-intro-daily' => 'Olá $1,
Aqui está o resumo diário de atividades na {{SITENAME}} para você.',
	'echo-email-batch-body-intro-weekly' => 'Olá $1,
Aqui está o resumo semanal de atividades na {{SITENAME}} para você.',
	'echo-email-batch-link-text-view-all-notifications' => 'Ver todas as notificações',
	'echo-rev-deleted-text-view' => 'Esta revisão foi removida.',
);

/** Romanian (română)
 * @author Firilacroco
 * @author Minisarm
 * @author Reception123
 * @author Stelistcristi
 */
$messages['ro'] = array(
	'echo-desc' => 'Sistem de notificări',
	'prefs-echo' => 'Notificări',
	'prefs-emailsettings' => 'Setări pentru e-mail',
	'prefs-displaynotifications' => 'Opțiuni de afișare',
	'prefs-echosubscriptions' => 'Notifică-mă despre aceste evenimente',
	'prefs-newmessageindicator' => 'Indicator de mesaj nou',
	'echo-pref-send-me' => 'Trimite-mi:',
	'echo-pref-send-to' => 'Trimite la:',
	'echo-pref-email-format' => 'Formatul e-mailului:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-mail',
	'echo-pref-email-frequency-never' => 'Nu-mi trimite nicio notificare prin e-mail',
	'echo-pref-email-frequency-immediately' => 'Notificări individuale pe măsură ce sosesc',
	'echo-pref-email-frequency-daily' => 'Un rezumat zilnic al notificărilor',
	'echo-pref-email-frequency-weekly' => 'Un rezumat săptămânal al notificărilor',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Text brut',
	'echo-pref-notify-show-link' => 'Arată notificări în bara mea de instrumente',
	'echo-pref-new-message-indicator' => 'Arată indicator pentru mesajele din pagina de discuții în bara mea de instrumente',
	'echo-learn-more' => 'Aflați mai multe',
	'echo-new-messages' => 'Aveți mesaje noi',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Mesaj|Mesaje}} în pagina de discuții',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Legătură|Legături}} către pagină',
	'echo-category-title-reverted' => '{{PLURAL:$1|Revenire|Reveniri}} asupra modificărilor',
	'echo-category-title-mention' => '{{PLURAL:$1|Menționare|Menționări}}',
	'echo-category-title-other' => '{{PLURAL:$1|Altele}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistem}}',
	'echo-pref-tooltip-edit-user-talk' => 'Notifică-mă când cineva publică un mesaj sau răspunde pe pagina mea de discuții.',
	'echo-pref-tooltip-article-linked' => 'Notifică-mă atunci când cineva introduce într-un articol o legătură către una din paginile pe care le-am creat.',
	'echo-pref-tooltip-reverted' => 'Notifică-mă atunci când cineva, folosind uneltele de anulare sau revenire, revine asupra unei modificări făcută de mine.',
	'echo-pref-tooltip-mention' => 'Notifică-mă când cineva face referire la pagina mea de utilizator în orice pagină de discuții.',
	'echo-no-agent' => '[Nimeni]',
	'echo-no-title' => '[Nicio pagină]',
	'echo-error-no-formatter' => 'Nicio formatare definită pentru această notificare.',
	'echo-error-preference' => 'Eroare: Nu s-au putut stabili preferințele utilizatorului.',
	'echo-error-token' => 'Eroare: Nu s-a putut prelua jetonul utilizatorului.',
	'notifications' => 'Notificări',
	'tooltip-pt-notifications' => 'Notificările dumneavoastră',
	'echo-specialpage' => 'Notificări',
	'echo-anon' => 'Pentru a primi notificări, [$1 creați-vă un cont] sau [$2 autentificați-vă].',
	'echo-none' => 'Nu aveți nicio notificare.',
	'echo-more-info' => 'Mai multe informații',
	'echo-feedback' => 'Reacții',
	'notification-link-text-view-message' => 'Vezi mesajul',
	'notification-link-text-view-mention' => 'Vezi menționarea',
	'notification-link-text-view-changes' => 'Vezi schimbările',
	'notification-link-text-view-page' => 'Vezi pagina',
	'notification-link-text-view-edit' => 'Vezi modificarea',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|a lăsat}} un mesaj pe [[User talk:$2#$3|pagina dumneavoastră de discuții]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|a lăsat}} un mesaj pe pagina dumneavoastră de discuții, în cadrul secțiunii „[[User talk:$2#$3|$4]]”.',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|a lăsat}} un mesaj pe [[User talk:$2#$3|pagina dumneavoastră de discuții]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|a lăsat}} un mesaj pe pagina dumneavoastră de discuții, în cadrul secțiunii „[[User talk:$2#$3|$4]]”.',
	'notification-page-linked' => '[[:$2]] a fost {{GENDER:$1|menționată}} în [[:$3]]: [[Special:WhatLinksHere/$2|Vedeți toate legăturile către această pagină]].',
	'notification-page-linked-flyout' => '$2 a fost {{GENDER:$1|menționată}} în [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|a comentat}} subiectul „[[$3|$2]]” din pagina de discuție „$4”.',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|a pornit}} un nou subiect („$2”) pe [[$3]].',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|v-a trimis}} un mesaj: „[[$3#$2|$2]]”.',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|a comentat}} subiectul „[[$3#$2|$2]]” de pe pagina dumneavoastră de discuții.',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|v-a menționat}} pe pagina de discuții a paginii $5, în cadrul secțiunii „[[$3#$2|$4]]”.',
	'notification-mention-flyout' => '$1 {{GENDER:$1|v-a menționat}} pe pagina de discuții a paginii $5, în cadrul secțiunii „[[$3#$2|$4]]”.',
	'notification-mention-nosection' => '[[User:$1|$1]] {{GENDER:$1|v-a menționat}} pe [[$3|pagina de discuție a paginii $2]].',
	'notification-mention-nosection-flyout' => '$1 {{GENDER:$1|v-a menționat}} pe [[$3|pagina de discuție a paginii $2]].',
	'notification-user-rights' => 'Drepturile dumneavoastră de utilizator [[Special:Log/rights/$1|au fost {{GENDER:$1|schimbate}}]] de către [[User:$1|$1]]. $2. [[Special:ListGroupRights|Aflați mai multe]]',
	'notification-user-rights-flyout' => 'Drepturile dumneavoastră de utilizator au fost {{GENDER:$1|schimbate}} de către $1. $2. [[Special:ListGroupRights|Aflați mai multe]]',
	'notification-user-rights-add' => 'Sunteți acum membru al {{PLURAL:$2|acestui grup|acestor grupuri}}: $1',
	'notification-user-rights-remove' => 'Nu mai sunteți membru al {{PLURAL:$2|acestui grup|acestor grupuri}}: $1',
	'notification-new-user' => 'Bine ați venit la {{SITENAME}}, $1! Ne bucurăm că sunteți aici.',
	'notification-reverted2' => '{{PLURAL:$4|Modificarea dumneavoastră asupra paginii [[:$2]] a|Modificările dumneavoastră asupra paginii [[:$2]] au}} fost {{GENDER:$1|înlăturat}}{{PLURAL:$4|ă|e}} de către [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Modificarea dumneavoastră asupra paginii $2 a|Modificările dumneavoastră asupra paginii $2 au}} fost {{GENDER:$1|înlăturat}}{{PLURAL:$4|ă|e}} de către $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|v-a lăsat}} un mesaj la {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|a lăsat}} un mesaj pe pagina dumneavoastră de discuții:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|a lăsat}} un mesaj pe pagina dumneavoastră de discuții, în cadrul secțiunii „$2”.',
	'notification-page-linked-email-subject' => 'Pagina dumnevoastră a fost menționată la {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2 a fost {{GENDER:$1|menționată}} în $3.',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Modificarea dumneavoastră a fost|Modificările dumneavoastră au fost}} {{GENDER:$1|înlăturat}}{{PLURAL:$3|ă|e}} la {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Modificarea dumneavoastră asupra paginii $2 a fost|Modificările dumneavoastră asupra paginii $2 au fost}} {{GENDER:$1|înlăturat}}{{PLURAL:$3|ă|e}} de către $1.',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|v-a menționat}} la {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|v-a menționat}} pe pagina de discuții a paginii $4, în secțiunea „$3”.',
	'notification-mention-nosection-email-batch-body' => '$1 {{GENDER:$1|v-a menționat}} pe pagina de discuție a paginii $2.',
	'notification-user-rights-email-subject' => 'Drepturile dumneavoastră de utilizator s-au schimbat la {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Drepturile dumneavoastră de utilizator au fost {{GENDER:$1|schimbate}} de către $1. $2',
	'echo-email-subject-default' => 'Notificare nouă la {{SITENAME}}',
	'echo-email-body-default' => 'Aveți o notificare nouă la {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Aveți o notificare nouă.',
	'echo-email-footer-default' => '$2

Pentru a avea controlul asupra tipurilor de e-mailuri pe care vi le trimitem, verificați-vă preferințele:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Pentru a controla e-mailurile pe care vi le trimitem, <a href="$2" style="text-decoration:none; color: #3868B0;">verificați-vă preferințele</a>.<br />
$1',
	'echo-overlay-link' => 'Toate notificările',
	'echo-overlay-title' => '<b>Notificări</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Notificări}}</b> (se afișează $1 din $2 necitite)',
	'echo-mark-all-as-read' => 'Marchează toate ca citite',
	'echo-date-today' => 'Astăzi',
	'echo-date-yesterday' => 'Ieri',
	'echo-load-more-error' => 'A apărut o eroare în timpul obținerii mai multor rezultate.',
	'notification-edit-talk-page-bundle' => '$1 și încă {{PLURAL:$4|altcineva|alți $3}} {{GENDER:$1|au lăsat}} un mesaj pe [[User talk:$2|pagina dumneavoastră de discuții]].',
	'notification-page-linked-bundle' => '$2 a fost {{GENDER:$1|menționată}} în $3 și încă {{PLURAL:$5|o pagină|alte $4 pagini}}. [[Special:WhatLinksHere/$2|Vedeți toate legăturile către această pagină]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 și încă {{PLURAL:$3|altcineva|alți $2}} {{GENDER:$1|au lăsat}} un mesaj pe pagina dumneavoastră de discuții.',
	'notification-page-linked-email-batch-bundle-body' => '$2 a fost {{GENDER:$1|menționată}} în $3 și încă {{PLURAL:$5|o pagină|alte $4 pagini}}.',
	'echo-email-batch-subject-daily' => 'Aveți {{PLURAL:$2|o notificare nouă|notificări noi}} la {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Aveți {{PLURAL:$2|o notificare nouă|notificări noi}} la {{SITENAME}} în această săptămână',
	'echo-email-batch-body-intro-daily' => 'Bună ziua $1,
Aveți aici un rezumat al activității de astăzi la {{SITENAME}}.',
	'echo-email-batch-body-intro-weekly' => 'Bună ziua $1,
Aveți aici un rezumat al activității din această săptămână la {{SITENAME}}.',
	'echo-email-batch-link-text-view-all-notifications' => 'Vezi toate notificările',
	'echo-rev-deleted-text-view' => 'Această versiune a paginii a fost suprimată.',
);

/** tarandíne (tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'echo-desc' => 'Sisteme de notifiche',
	'prefs-echo' => 'Notificaziune',
	'prefs-emailsettings' => "'Mbostaziune de l'email",
	'prefs-displaynotifications' => 'Opziune de visualizzazzione',
	'prefs-echosubscriptions' => 'Notificame sus a ste avveneminde',
	'prefs-newmessageindicator' => 'Indicatore de messàgge nuève',
	'echo-pref-send-me' => 'Manne a me:',
	'echo-pref-send-to' => 'Manne a:',
	'echo-pref-email-format' => "Formate de l'email:",
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-mail',
	'echo-pref-email-frequency-never' => 'No sce mannanne nisciuna mail de notifiche',
	'echo-pref-email-frequency-immediately' => 'Le notifiche individuale a cumme trasene',
	'echo-pref-email-frequency-daily' => "'Nu riepiloghe sciurnaliere de le notifiche",
	'echo-pref-email-frequency-weekly' => "'Nu riepiloghe sumanale de le notifiche",
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Teste semblice',
	'echo-pref-notify-show-link' => "Fà vedè le notifiche sus 'a barre de le struminde meje",
	'echo-pref-new-message-indicator' => "Fà vedè le 'ndicature de le messàgge sus a pàgene de le 'ngazzaminde jndr'à barre de le struminde meje",
	'echo-learn-more' => "'Mbare de cchiù",
	'echo-new-messages' => 'Tu è messàgge nuève',
	'echo-category-title-edit-user-talk' => "{{PLURAL:$1|Messàgge}} d'a pàgene de le 'ngazzaminde",
	'echo-category-title-article-linked' => "{{PLURAL:$1|Collegamende|Collegaminde}} d'a pàgene",
	'echo-category-title-reverted' => "Annulle {{PLURAL:$1|'u cangiamende|le cangiaminde}}",
	'echo-category-title-mention' => '{{PLURAL:$1|Menzione}}',
	'echo-category-title-other' => '{{PLURAL:$1|Otre}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sisteme}}',
	'echo-pref-tooltip-edit-user-talk' => "Notificame quacche quacchedune manne 'nu messàgge o responne sus 'a pàgene de le 'ngazzaminde meje.",
	'echo-pref-tooltip-article-linked' => "Notificame quacche quacchedune se colleghe a 'na pàgene ca ije agghie ccrejate da 'na vôsce.",
	'echo-pref-tooltip-reverted' => "Notificame quanne quacchedune annulle 'nu cangiamende ca agghie fatte ije, ausanne 'u strumende de annullamende.",
	'echo-pref-tooltip-mention' => "Notificame quanne quacchedune se colleghe a pàgena utende meje da qualsiase pàgene de le 'ngazzaminde.",
	'echo-no-agent' => '[Nisciune]',
	'echo-no-title' => '[Nisciuna vôsce]',
	'echo-error-no-formatter' => 'Nisciune formattazzione ha state definite pa notifiche',
	'echo-error-preference' => "Errore: Non ge pozze 'mbostà le preferenze de l'utende",
	'echo-error-token' => "Errore: Non ge riesche a pigghià 'u gettone de l'utende",
	'notifications' => 'Notificaziune',
	'tooltip-pt-notifications' => 'Le notifiche tune',
	'echo-specialpage' => 'Notificaziune',
	'echo-anon' => 'Pe ricevere notifiche, <span class="plainlinks">[$1 ccreje \'nu cunde] o <span class="plainlinks">[$2 tràse].',
	'echo-none' => 'Non ge tìne notifiche.',
	'echo-more-info' => "Cchiù 'mbormaziune",
	'echo-feedback' => 'Segnalazione',
	'notification-link-text-view-message' => "'Ndruche 'u messàgge",
	'notification-link-text-view-mention' => "'Ndruche 'a menzione",
	'notification-link-text-view-changes' => "'Ndruche le cangiaminde",
	'notification-link-text-view-page' => "'Ndruche 'a pàgene",
	'notification-link-text-view-edit' => "'Ndruche 'u cangiamende",
	'notification-edit-talk-page2' => "[[User:$1|$1]] {{GENDER:$1|ha lassate}} 'nu messàgge sus 'a [[User talk:$2#$3|pàgene de le 'ngazzaminde]] tune.",
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|ave lassate}} \'nu messàgge sus \'a pàgene de le \'ngazzaminde toje jndr\'à "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => "$1 {{GENDER:$1|ha lassate}} 'nu messàgge sus 'a [[User talk:$2#$3|pàgene de le 'ngazzaminde]] tune.",
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|ave lassate}} \'nu messàgge sus \'a pàgene de le \'ngazzaminde toje jndr\'à "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => "[[:$2]] ha state {{GENDER:$1|appundate}} da [[:$3]]. [[Special:WhatLinksHere/$2|'Ndruche tutte le collegaminde a sta pàgene]].",
	'notification-page-linked-flyout' => '$2 ere {{GENDER:$1|appondate}} da [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|ave commendate}} sus a "[[$3|$2]]" sus a pàgene de le \'ngazzaminde "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|ave mannate}} \'n\'argomende nuève "$2" sus a [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|y\'ha mannate}} \'nu messàgge: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|ave commendate}} sus a "[[$3#$2|$2]]" sus \'a pàgene de le \'ngazzaminde tune',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|t\'ave menzionate}} sus a pàgene de le \'ngazzaminde $5 jndr\'à "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 {{GENDER:$1|t\'ave menzionate}} sus a pàgene de le \'ngazzaminde $5 jndr\'à "[[$3#$2|$4]]".',
	'notification-user-rights' => "Le deritte de l'utende [[Special:Log/rights/$1|onne state {{GENDER:$1|cangiate}}]] da [[User:$1|$1]]. $2. [[Special:ListGroupRights|'Mbare de cchiù]]",
	'notification-user-rights-flyout' => "Le deritte tune onne state {{GENDER:$1|cangiate}} da $1. $2. [[Special:ListGroupRights|'Mbare de cchiù]]",
	'notification-user-rights-add' => 'Tu mò si nu memenre de {{PLURAL:$2|stu gruppe|ste gruppe}}: $1',
	'notification-user-rights-remove' => "No ge sì cchiù 'nu membre de {{PLURAL:$2|stu gruppe|ste gruppe}}: $1",
	'notification-new-user' => "Bovègne jndr'à {{SITENAME}}, $1! Nuje sime cundende ca ste aqquà.",
	'notification-reverted2' => "{{PLURAL:$4|'U cangiamende tune sus a [[:$2]] ha|Le cangiaminde sus a [[:$2]] onne}} state {{GENDER:$1|annullate}} da [[User:$1|$1]]. $3",
	'notification-reverted-flyout2' => "Your {{PLURAL:$4|'U cangiamende tune sus a $2 ha|Le cangiaminde tune sus a $2 onne}} state {{GENDER:$1|annullate}} by $1. $3",
	'notification-edit-talk-page-email-subject2' => "$1 {{GENDER:$1|t'ha lassate}} 'nu messàgge sus a {{SITENAME}}",
	'notification-edit-talk-page-email-batch-body2' => "$1 {{GENDER:$1|t'ha lassate}} 'nu messàgge sus 'a pàgene de le 'ngazzaminde tune:",
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|t\'ha lassate}} \'nu messàgge sus \'a pàgene de le \'ngazzaminde tune jndr\'à "$2".',
	'notification-page-linked-email-subject' => "'A pàgena toje ha state collegate sus a {{SITENAME}}",
	'notification-page-linked-email-batch-body' => '$2 ere {{GENDER:$1|collegate}} da $3',
	'notification-reverted-email-subject2' => "{{PLURAL:$3|'U cangiamende tune ha state|Le cangiaminde tune onne}} state {{GENDER:$1|annullate}} sus a {{SITENAME}}",
	'notification-reverted-email-batch-body2' => "{{PLURAL:$3|'U cangiamende tune sus a $2 ha state|Le cangiaminde tune sus a $2 onne}} state {{GENDER:$1|annullate}} da $1.",
	'notification-mention-email-subject' => "$1 {{GENDER:$1|t'ave menzionate}} sus a {{SITENAME}}",
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|\'ave menzionate}} sus a pàgene de le \'ngazzaminde $4 jndr\'à "$3".',
	'notification-user-rights-email-subject' => 'Le deritte utende tune onne state cangiate sus a {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Le deritte utende tune onne state {{GENDER:$1|cangiate}} da $1. $2.',
	'echo-email-subject-default' => 'Notifica nove sus a {{SITENAME}}',
	'echo-email-body-default' => "Tu è 'na notifica nove sus a {{SITENAME}}:

$1",
	'echo-email-batch-body-default' => "Tu è 'na notifica nove",
	'echo-email-footer-default' => "$2

Pe condrollà quale email t'amme mannate, verifiche le prefenze tune:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1",
	'echo-email-footer-default-html' => 'Pe condrollà quale email t\'amme mannate, <a href="$2" style="text-decoration:none; color: #3868B0;">condrolle le preferenze tune</a>.<br />
$1',
	'echo-overlay-link' => 'Tutte le notificaziune',
	'echo-overlay-title' => '<b>Notifiche</b>',
	'echo-overlay-title-overflow' => "<b>{{PLURAL:$1|Notifiche}}</b> (face 'ndrucà $1 de $2 non lette)",
	'echo-mark-all-as-read' => 'Signe tutte cumme a lette',
	'echo-date-today' => 'Osce',
	'echo-date-yesterday' => 'Ajere',
	'echo-load-more-error' => "Ha assute 'n'errore mendre analizzave le resultate.",
	'notification-edit-talk-page-bundle' => "$1 e $3 {{PLURAL:$4|otre}} {{GENDER:$1|t'onne lassate}} 'nu messàgge sus a toje [[User talk:$2|pàgene de le 'ngazzaminde]].",
	'notification-page-linked-bundle' => "$2 ha state {{GENDER:$1|appundate}} da $3 e $4 otre {{PLURAL:$5|pàgene|pàggene}}. [[Special:WhatLinksHere/$2|'Ndruche tutte le collegaminde a sta pàgene]]",
	'notification-edit-user-talk-email-batch-bundle-body' => "$1 e $2 {{PLURAL:$3|otre}} {{GENDER:$1|t'onne lassate}} 'nu messàgge sus 'a pàgene de le 'ngazzaminde toje.",
	'notification-page-linked-email-batch-bundle-body' => '$2 ha state {{GENDER:$1|appundate}} da $3 e $4 otre {{PLURAL:$5|pàgene|pàggene}}.',
	'echo-email-batch-subject-daily' => "Tu è {{PLURAL:$2|'na notifica|notifiche}} nove sus a {{SITENAME}}",
	'echo-email-batch-subject-weekly' => "Tu è {{PLURAL:$2|'na notifica|notifiche}} nove STA SUMàNE sus a {{SITENAME}}",
	'echo-email-batch-body-intro-daily' => "Cià $1,
Aqquà ste 'u rieploghe de l'attività de osce sus a {{SITENAME}} pe te.",
	'echo-email-batch-body-intro-weekly' => "Cià $1,
Aqquà ste 'u rieploghe de l'attività d'a sumàne sus a {{SITENAME}} pe te.",
	'echo-email-batch-link-text-view-all-notifications' => "'Ndruche tutte le notifiche",
	'echo-rev-deleted-text-view' => "Sta revisione d'a pàgene ha state accise",
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
 * @author Okras
 * @author Orsa
 * @author ShinePhantom
 * @author Soul Train
 * @author Sunpriat
 * @author Чаховіч Уладзіслаў
 */
$messages['ru'] = array(
	'echo-desc' => 'Система уведомлений',
	'prefs-echo' => 'Уведомления',
	'prefs-emailsettings' => 'Настройки эл. почты',
	'prefs-displaynotifications' => 'Настройки отображения',
	'prefs-echosubscriptions' => 'Сообщать мне об этих событиях',
	'prefs-newmessageindicator' => 'Индикатор нового сообщения',
	'echo-pref-send-me' => 'Присылать мне:',
	'echo-pref-send-to' => 'Отправлять в:',
	'echo-pref-email-format' => 'Формат писем:',
	'echo-pref-web' => 'Веб',
	'echo-pref-email' => 'Эл. почта',
	'echo-pref-email-frequency-never' => 'Не присылать мне уведомления по эл. почте',
	'echo-pref-email-frequency-immediately' => 'Отдельные уведомления по мере их поступления',
	'echo-pref-email-frequency-daily' => 'Ежедневная сводка уведомлений',
	'echo-pref-email-frequency-weekly' => 'Еженедельная сводка уведомлений',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Простой текст',
	'echo-pref-notify-show-link' => 'Показать уведомления в моей панели инструментов',
	'echo-pref-new-message-indicator' => 'Показать в моей панели инструментов индикатор сообщений на странице обсуждения',
	'echo-learn-more' => 'Узнать больше',
	'echo-new-messages' => 'У вас есть новые сообщения',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|1=сообщение|сообщения}} на странице обсуждения',
	'echo-category-title-article-linked' => '{{PLURAL:$1|1=ссылка|ссылки}} на страницы',
	'echo-category-title-reverted' => '{{PLURAL:$1|1=отмена|отмены}} правок',
	'echo-category-title-mention' => '{{PLURAL:$1|1=упоминание|упоминания}}',
	'echo-category-title-other' => '{{PLURAL:$1|1=прочее|прочие}}',
	'echo-category-title-system' => '{{PLURAL:$1|1=системное|системные}}',
	'echo-pref-tooltip-edit-user-talk' => 'Сообщать мне, когда кто-то посылает сообщение или отвечает на моей странице обсуждения.',
	'echo-pref-tooltip-article-linked' => 'Сообщать мне, когда кто-то ссылается в статьях на созданную мной страницу',
	'echo-pref-tooltip-reverted' => 'Сообщать мне, когда кто-то отменил мою правку, используя функцию отмены или отката.',
	'echo-pref-tooltip-mention' => 'Сообщать мне, когда кто-то ссылается на мою страницу участника с любой страницы обсуждения.',
	'echo-no-agent' => '[Никто]',
	'echo-no-title' => '[Нет страницы]',
	'echo-error-no-formatter' => 'Форматирование не определено для уведомления',
	'echo-error-preference' => 'Ошибка: Не удалось задать настройки участника',
	'echo-error-token' => 'Ошибка: не удалось получить маркер участника (user token)',
	'notifications' => 'Уведомления',
	'tooltip-pt-notifications' => 'Ваши уведомления',
	'echo-specialpage' => 'Уведомления',
	'echo-anon' => 'Чтобы получать уведомления, [$1 создайте учётную запись] или [$2 представьтесь].',
	'echo-none' => 'Вы не получали уведомлений.',
	'echo-more-info' => 'Подробнее',
	'echo-feedback' => 'Обратная связь',
	'echo-quotation-marks' => '«$1»',
	'notification-link-text-view-message' => 'Просмотр сообщения',
	'notification-link-text-view-mention' => 'Просмотр упоминания',
	'notification-link-text-view-changes' => 'Просмотр изменений',
	'notification-link-text-view-page' => 'Просмотр страницы',
	'notification-link-text-view-edit' => 'Просмотр правки',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|оставил|оставила}} сообщение на вашей [[User talk:$2#$3|странице обсуждения]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|оставил|оставила}} сообщение на вашей странице обсуждения "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|оставил|оставила}} сообщение на вашей [[User talk:$2#$3|странице обсуждения]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|оставил|оставила}} сообщение на вашей странице обсуждения "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => '[[:$2]] была {{GENDER:$1|связана}} с [[:$3]]. [[Special:WhatLinksHere/$2|См. все ссылки на эту страницу]].',
	'notification-page-linked-flyout' => '$2 была {{GENDER:$1|связана}} с [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|прокомментировал|прокомментировала}} тему "[[$3|$2]]" на странице обсуждения "$4".',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|добавил|добавила}} новую тему "$2" на странице [[$3]].',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|отправил|отправила}} вам сообщение: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|прокомментировал|прокомментировала}} тему "[[$3#$2|$2]]" на вашей странице обсуждения.',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|упомянул|упомянула}} вас на странице обсуждения $5 в разделе "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 {{GENDER:$1|упомянул|упомянула}} вас на странице обсуждения $5 в разделе "[[$3#$2|$4]]".',
	'notification-mention-nosection' => '[[User:$1|$1]] упомянул{{GENDER:$1||а}} вас на [[$3|странице обсуждения $2]].',
	'notification-mention-nosection-flyout' => '$1 упомянул{{GENDER:$1||а}} вас на [[$3|странице обсуждения $2]].',
	'notification-user-rights' => 'Ваши права пользователя [[Special:Log/rights/$1|{{GENDER:$1|изменил|изменила}}]] [[User:$1|$1]]. $2. [[Special:ListGroupRights|Подробнее]]',
	'notification-user-rights-flyout' => 'Права пользователя {{GENDER:$1|изменил|изменила}} $1. $2. [[Special:ListGroupRights|Подробнее]]',
	'notification-user-rights-add' => 'Теперь вы входите в {{PLURAL:$2|1=следующую группу|следующие группы}}: $1',
	'notification-user-rights-remove' => 'Вы больше не входите в {{PLURAL:$2|1=следующую группу|следующие группы}}: $1',
	'notification-new-user' => 'Добро пожаловать в {{SITENAME}}, $1! Мы рады, что вы здесь.',
	'notification-reverted2' => '{{PLURAL:$4|1=Вашу правку|Ваши правки}} на странице [[:$2]] {{GENDER:$1|отменил|отменила}} [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|1=Вашу правку|Ваши правки}} на странице $2 {{GENDER:$1|отменил|отменила}} $1. $3',
	'notification-edit-talk-page-email-subject2' => '{{GENDER:$1|Участник|Участница}} $1 {{GENDER:$1|оставил|оставила}} вам сообщение на сайте «{{SITENAME}}»',
	'notification-edit-talk-page-email-batch-body2' => '{{GENDER:$1|Участник|Участница}} $1 {{GENDER:$1|оставил|оставила}} сообщение на вашей странице обсуждения:',
	'notification-edit-talk-page-email-batch-body-with-section' => '{{GENDER:$1|Участник|Участница}} $1 {{GENDER:$1|оставил|оставила}} вам сообщение на вашей странице обсуждения в разделе (теме) «$2»',
	'notification-page-linked-email-subject' => 'На сайте «{{SITENAME}}» появилась ссылка на вашу страницу участника',
	'notification-page-linked-email-batch-body' => '{{GENDER:$1|Участник|участница}} $1 {{GENDER:$1|сослался|сослалась}} на $2 из $3',
	'notification-reverted-email-subject2' => '{{GENDER:$1|Кто-то}} отменил {{PLURAL:$3|1=вашу правку|ваши правки}} на сайте «{{SITENAME}}»',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|1=Ваша правка на странице «$2» была отменена|Ваши правки на странице «$2» были отменены}} {{GENDER:$1|участником|участницей}} $1.',
	'notification-mention-email-subject' => '{{GENDER:$1|Участник|Участница}} $1 {{GENDER:$1|упомянул|упомянула}} вас на сайте «{{SITENAME}}»',
	'notification-mention-email-batch-body' => '$1 {{ПОЛ:$1|, упоминается}} вы на $4 страница обсуждения в "$3".',
	'notification-mention-nosection-email-batch-body' => '$1 упомянул{{GENDER:$1||а}} вас на странице обсуждения $2.',
	'notification-user-rights-email-subject' => 'Ваши права на сайте «{{SITENAME}}» были изменены',
	'notification-user-rights-email-batch-body' => 'Ваши права были изменены {{GENDER:$1|участником|участницей}} $1. $2.',
	'echo-notification-count' => '$1+',
	'echo-email-subject-default' => 'Новые уведомления на сайте «{{SITENAME}}»',
	'echo-email-body-default' => 'У вас есть новое уведомление на сайте «{{SITENAME}}»:

$1',
	'echo-email-batch-body-default' => 'У вас есть новое уведомление',
	'echo-email-footer-default' => '$2

Для контроля за тем, какие сообщения отправляются вам по эл. почте, проверьте свои персональные настройки:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Для контроля за тем, какие сообщения отправляются вам по эл. почте, <a href="$2" style="text-decoration:none; color: #3868B0;">проверьте свои персональные настройки</a><br />
$1',
	'echo-overlay-link' => 'Все уведомления',
	'echo-overlay-title' => '<b>Уведомления</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Уведомления}}</b> ({{PLURAL:$1|показано|показаны}} $1 из $2 {{PLURAL:$2|непрочитанного|непрочитанных}})',
	'echo-mark-all-as-read' => 'Отметить все как прочитанные',
	'echo-date-today' => 'Сегодня',
	'echo-date-yesterday' => 'Вчера',
	'echo-load-more-error' => 'Произошла ошибка при получении дополнительных результатов.',
	'notification-edit-talk-page-bundle' => '$1 и $3 {{PLURAL:$4|1=другой участник|других участников|других участника}} оставили сообщение на вашей [[User talk:$2|странице обсуждения]].',
	'notification-page-linked-bundle' => 'На страницу «$2» есть {{GENDER:$1|ссылка}} со страницы «$3» и ещё $4 {{PLURAL:$5|страницы|страниц}}. [[Special:WhatLinksHere/$2|См. все ссылки на эту страницу]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 и $2 {{PLURAL:$3|другой участник|других участников|других участникa}} оставили сообщения на вашей странице обсуждения.',
	'notification-page-linked-email-batch-bundle-body' => 'На страницу «$2» есть {{GENDER:$1|ссылка}} со страницы «$3» и ещё {{PLURAL:$5|$4 страницы|$4 страниц|1=одной страницы}}',
	'echo-email-batch-bullet' => '•',
	'echo-email-batch-subject-daily' => 'Вы получили {{PLURAL:$2|$2 новое уведомление|$2 новых уведомлений|$2 новых уведомления|1=новое уведомление}} в проекте «{{SITENAME}}»',
	'echo-email-batch-subject-weekly' => 'На этой неделе вы получили {{PLURAL:$2|$2 новое уведомление|$2 новых уведомлений|$2 новых уведомления|1=новое уведомление}} в проекте «{{SITENAME}}»',
	'echo-email-batch-body-intro-daily' => 'Привет, $1!
Вот краткий обзор сегодняшней деятельности в {{SITENAME}} для вас.',
	'echo-email-batch-body-intro-weekly' => 'Привет, $1!
Вот краткий недельный обзор деятельности в {{SITENAME}} для вас.',
	'echo-email-batch-link-text-view-all-notifications' => 'Посмотреть все уведомления',
	'echo-rev-deleted-text-view' => 'Эта версия страницы была скрыта',
);

/** Sanskrit (संस्कृतम्)
 * @author Shubha
 */
$messages['sa'] = array(
	'echo-desc' => 'सूचनाव्यवस्था',
	'prefs-echo' => 'सूचनाः',
	'prefs-emailsettings' => 'ईपत्र-विकल्पाः',
	'prefs-displaynotifications' => 'प्रदर्शन-विकल्पाः',
	'prefs-echosubscriptions' => 'एतेषां घटनानां विषये मां सूचयतु',
	'prefs-newmessageindicator' => 'नूतनसन्देशसूचकम्',
	'echo-pref-send-me' => 'मह्यं प्रेष्यताम्:',
	'echo-pref-send-to' => 'एतस्मै प्रेष्यताम्',
	'echo-pref-email-format' => 'ईपत्र-प्रारूपः:',
	'echo-pref-web' => 'विश्वव्यापिजालम्',
	'echo-pref-email' => 'ईपत्रम्',
	'echo-pref-email-frequency-never' => 'ईपत्रसन्देशाः मा प्रेष्यन्ताम्',
	'echo-pref-email-frequency-immediately' => 'प्रत्येकसूचना यथा प्राप्यते',
	'echo-pref-email-frequency-daily' => 'प्रतिदिनस्य सन्देशानां सारांशाः',
	'echo-pref-email-frequency-weekly' => 'प्रतिसप्ताहस्य सन्देशानां सारांश:',
	'echo-pref-email-format-html' => 'एच् टि एम् एल्',
	'echo-pref-email-format-plain-text' => 'सरलपठ्यम्',
	'echo-pref-notify-show-link' => 'उपकरणपट्टिकायां सूचनाः दर्श्यन्ताम्',
	'echo-pref-new-message-indicator' => 'मम साधनापट्टिकायां चर्चापुटस्य सन्देशः दर्श्यताम्',
	'echo-learn-more' => 'अधिकं ज्ञायताम्',
	'echo-new-messages' => 'भवते नूतनसन्देशाः सन्ति |', # Fuzzy
	'echo-category-title-edit-user-talk' => 'चर्चापुटम् {{PLURAL:$1|सन्देशः|सन्देशाः}}',
	'echo-category-title-article-linked' => 'पुटम् {{PLURAL:$1|सम्पर्कतन्तुः|सम्पर्कतन्तवः}}',
	'echo-category-title-reverted' => 'सम्पाद्यताम् {{PLURAL:$1|revert|reverts}}',
	'echo-category-title-mention' => '{{PLURAL:$1|उल्लेखः|उल्लेखाः}}',
	'echo-category-title-other' => '{{PLURAL:$1|अन्यत्}}',
	'echo-category-title-system' => '{{PLURAL:$1|व्यवस्था}}',
	'echo-pref-tooltip-edit-user-talk' => 'केनापि मह्यं सन्देशः प्रेषितः चेत्, मम चर्चापुटे उत्तरितं चेत् मां सूचयन्तु',
	'echo-pref-tooltip-article-linked' => 'मया निर्मितेन पुटेन सह यदि अन्येन सम्पर्कतन्तुः योज्यते तर्हि मां सूचयन्तु |',
	'echo-pref-tooltip-reverted' => 'मया कृतं सम्पादनं यदि अन्यः पूर्ववत् परिवर्तयेत् तर्हि सूच्यताम् |',
	'echo-pref-tooltip-mention' => 'कस्यचित् चर्चापुटस्य सम्पर्कतन्तुः मम योजकपुटेन सह योज्यते चेत् सूच्यताम् |',
	'echo-no-agent' => '[कोपि नास्ति]',
	'echo-no-title' => '[न किञ्चित् पुटं विद्यते]',
	'echo-error-no-formatter' => 'सूचनानां प्रारूपः न रचितः |',
	'echo-error-preference' => 'दोषः: योजकस्य इष्टतमानि न निर्दिष्टानि |',
	'notifications' => 'सूचनाः',
	'tooltip-pt-notifications' => 'भवतः सूचनाः',
	'echo-specialpage' => 'सूचनाः',
	'echo-none' => 'भवते सूचनाः न विद्यन्ते |',
	'echo-more-info' => 'अधिकं विवरणम्',
	'echo-feedback' => 'प्रतिस्पन्दः',
	'notification-link-text-view-message' => 'सन्देशः दृश्यताम्',
);

/** Sicilian (sicilianu)
 * @author Gmelfi
 */
$messages['scn'] = array(
	'echo-desc' => 'Sistema di nutifica',
	'prefs-echo' => 'Nutìfichi',
	'prefs-emailsettings' => 'Upzioni email',
	'prefs-displaynotifications' => 'Upzioni di visualizzazzioni',
	'prefs-echosubscriptions' => 'Mànnami na nutìfica supra sti abbinimenti',
	'prefs-newmessageindicator' => 'Barra dî missaggi novi',
	'echo-pref-send-me' => 'Mànnami:',
	'echo-pref-send-to' => 'Manna a:',
	'echo-pref-email-format' => 'Furmatu email:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Nnirizzu email:',
	'echo-pref-email-frequency-never' => 'Nun mannàrimi nudda nutìfica via email',
	'echo-pref-email-frequency-immediately' => 'Nutìfichi sìnguli pi ogni abbinimentu',
	'echo-pref-email-frequency-daily' => 'Nu riepìlugu giuranlieru dî nutìfichi',
	'echo-pref-email-frequency-weekly' => 'Nu riepìlugu dî nutìfichi dâ simana',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Testu nurmali',
	'echo-pref-notify-show-link' => 'Visualizza li nutìfichi ntâ mè barra dî strummenta',
	'echo-pref-new-message-indicator' => 'Ammùscia la barra dê missaggi novi supra la mè pàggina di discussioni ntâ barra dî strummenta',
	'echo-learn-more' => 'Pi sapìrinni cchiossai',
	'echo-new-messages' => 'Vossìa havi missaggi novi', # Fuzzy
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Missaggiu|Missaggi}} supra la pàggina di discussioni',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Liami|Liama}} a na pàggina',
	'echo-category-title-reverted' => '{{PLURAL:$1|Canciamentu annullatu|Canciamenti annullati}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Minzioni}}',
	'echo-category-title-other' => '{{PLURAL:$1|Àutru}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistema}}',
	'echo-pref-tooltip-edit-user-talk' => 'Abbìsami quannu quarcunu mi scrivi nu missaggiu o arrispunni ntâ mè pàggina di discussioni.',
	'echo-pref-tooltip-article-linked' => 'Abbìsami quannu quarcunu cullèga, di na vuci, na pàggina ca criai.',
	'echo-pref-tooltip-reverted' => 'Abbìsami quannu quarcunu annulla nu canciamentu ca fici, usannu li funzioni annulla o rollback.',
	'echo-pref-tooltip-mention' => 'Abbìsami quannu quarcunu cullèga la mè pàggina utenti di na qualunqui pàggina di discussioni.',
	'echo-no-agent' => '[Nuddu]',
	'echo-no-title' => '[Nudda pàggina]',
	'echo-error-no-formatter' => 'Nudda furnattazzioni difinuta pê nutìfichi',
	'echo-error-preference' => "Erruri: mpussibbili mpustari li prifirenzi di l'utenti",
	'echo-error-token' => 'Erruri: mpussìbbili ricupirari token utenti',
	'notifications' => 'Nutìfichi',
	'tooltip-pt-notifications' => 'Tutti li nutìfichi',
	'echo-specialpage' => 'Nutìfichi',
	'echo-anon' => 'Pi arriciviri li nutìfichi, [$1 arriggistrati] o [$2 trasi].',
	'echo-none' => 'Nun arricivistru nutìfichi',
	'echo-more-info' => 'Àutri nfurmazzioni',
	'echo-feedback' => 'Cummenti',
	'notification-link-text-view-message' => 'Talìa lu missaggiu',
	'notification-link-text-view-mention' => 'Talìa la minzioni',
	'notification-link-text-view-changes' => 'Talìa li canciamenti',
	'notification-link-text-view-page' => 'Talìa la pàggina',
	'notification-link-text-view-edit' => 'Talìa lu canciamentu',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|lasssau}} nu missaggiu supra la tò [[User talk:$2#$3|pàggina di discussioni]].',
	'notification-edit-talk-page-with-section' => "[[User:$1|$1]] {{GENDER:$1|lassau}} nu missaggiu ntâ tò pàggina di discussioni n '[[User talk:$2#$3|$4]]'.",
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|lassau}} nu missaggiu supra la tò [[User talk:$2#$3|pàggina di discussioni]].',
	'notification-edit-talk-page-flyout-with-section' => "$1 {{GENDER:$1|lassau}} nu missaggiu ntâ tò pàggina di discussioni n '[[User talk:$2#$3|$4]]'.",
	'notification-page-linked' => '[[:$2]] fu {{GENDER:$1|culligata}} di [[:$3]]. [[Special:WhatLinksHere/$2|Talìa tutti li liami a sta pàggina]].',
	'notification-page-linked-flyout' => '$2 fu {{GENDER:$1|culligata}} di [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|lassau nu cummentu}} arriguardu a "[[$3|$2]]" ntâ pàggina di discussioni di "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|juncìu}} n\'argumentu novu "$2" supra [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] ti {{GENDER:$1|mannàu}} nu missaggiu: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|lassau nu cummentu}} arriguardu a "[[$3#$2|$2]]" ntâ tò pàggina di discussioni',
	'notification-mention' => "[[User:$1|$1]] ti {{GENDER:$1|mintuviau}} supra la pàggina di discussioni di $5 n '[[$3#$2|$4]]'.",
	'notification-mention-flyout' => "$1 ti {{GENDER:$1|mintuviàu}} supra la pàggina di discussioni di $5 n '[[$3#$2|$4]]'.",
	'notification-user-rights' => 'Li tò diritti utenti [[Special:Log/rights/$1|foru {{GENDER:$1|canciati}}]] di [[User:$1|$1]]. $2. [[Special:ListGroupRights|Pi sapìrinni cchiossai]]',
	'notification-user-rights-flyout' => 'Li tò diritti utenti foru {{GENDER:$1|canciati}} di $1. $2. [[Special:ListGroupRights|Pi sapìrinni cchiossai]]',
	'notification-user-rights-add' => 'Ora si membru di {{PLURAL:$2|stu gruppu|sti gruppa}}: $1',
	'notification-user-rights-remove' => 'Nun si cchiù membru di {{PLURAL:$2|stu gruppu|sti gruppa}}: $1',
	'notification-new-user' => 'Bimminutu/a supra {{SITENAME}}, $1! Semu filici ca tu si ccà.',
	'notification-reverted2' => '{{PLURAL:$4|Lu tò canciamentu|Li tò canciamenti}} supra [[:$2]] {{PLURAL:$4|fu annullatu|foru annullati}} {{GENDER:$1|di}} [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Lu tò canciamentu|Li tò canciamenti}} supra $2 {{PLURAL:$4|fu annullatu|foru annullati}} {{GENDER:$1|di}} $1 $3',
	'notification-edit-talk-page-email-subject2' => '$1 ti {{GENDER:$1|lassau}} nu missaggiu n {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|lassau}} nu missaggiu supra la tò pàggina di discussioni:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|lassau}} nu missaggiu supra la tò pàggina di discussioni n $2.',
	'notification-page-linked-email-subject' => 'La tò pàggina fu liata a {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2 fu {{GENDER:$1|culligata}} di $3',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Lu tò canciamentu fu annullatu|Li tò canciamenti foru annullati}} {{GENDER:$1|supra}} {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Lu tò canciamentu supra $2 fu annullatu|Li tò canciamenti supra $2 foru annullati}} {{GENDER:$1|di}} $1 $3',
	'notification-mention-email-subject' => '$1 ti {{GENDER:$1|mintuviàu}} su {{SITENAME}}',
	'notification-mention-email-batch-body' => "$1 ti {{GENDER:$1|mintuviàu}} supra la pàggina di discussioni di $4 n '$3'.",
	'notification-user-rights-email-subject' => 'Li tò diritti utenti foru canciati supra {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Li tò dirirtti utenti foru {{GENDER:$1|canciati}} di $1. $2',
	'echo-email-subject-default' => 'Nutìfica nova supra {{SITENAME}}',
	'echo-email-body-default' => 'Vossìa havi na nutìfica nova supra {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Vossìa havi na nutìfica nova',
	'echo-email-footer-default' => '$2

Pi cuntrullari quali email ti vènunu mannati, cuntrolla li tò prifirenzi:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Pi virificari quali email ti sunu mannati, <a href="$2" style="text-decoration:none; color: #3868B0;">cuntrolla li tò prifirenzi</a><br />
$1',
	'echo-overlay-link' => 'Tutti li nutìfichi',
	'echo-overlay-title' => '<b>Nutìfichi</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Nutifica|Nutìfichi}}</b> (ammusciati $1 di $2 nunu ligghiuti)',
	'echo-mark-all-as-read' => 'Sinna tutti comu ligghiuti',
	'echo-date-today' => 'Ogghi',
	'echo-date-yesterday' => 'Ieri',
	'echo-load-more-error' => "Si virificau n'erruri ntô ricùpiru di àutri risurtati.",
	'notification-edit-talk-page-bundle' => "$1 e {{PLURAL:$4|n'autru utenti|àutri $3 utenti}} {{GENDER:$1|lassaru}} nu missaggiu ntâ tò [[User talk:$2|pàggina di discussioni]].",
	'notification-page-linked-bundle' => "$2 fu {{GENDER:$1|culligata}} di $3 e {{PLURAL:$5|n'àutra pàggina|àutri $4 pàggini}}. [[Special:WhatLinksHere/$2|Talìa tutti li culligamenti a sta pàggina]]",
	'notification-edit-user-talk-email-batch-bundle-body' => "$1 e {{PLURAL:$3|n'àutru|àutri $2}} {{GENDER:$1|lassaru}} nu missaggiu supra la tò pàggina di discussioni",
	'notification-page-linked-email-batch-bundle-body' => "$2 fu {{GENDER:$1|culligata}} di $3 e {{PLURAL:$5|n'àutra pàggina|àutri $4 pàggini}}",
	'echo-email-batch-subject-daily' => 'Vossia havi {{PLURAL:$2|na nutìfica nova|nutìfichi novi}} supra {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Vossia havi {{PLURAL:$2|na nutìfica nova|nutìfichi novi}} supra {{SITENAME}} sta simana',
	'echo-email-batch-body-intro-daily' => "Sabbinirica $1,
eccu na sìntisi di l'attivitati di ogghi supra {{SITENAME}} pi vossia",
	'echo-email-batch-body-intro-weekly' => "Sabbinirica $1,
eccu na sìntisi di l'attivitati di sta siamana supra {{SITENAME}} pi Vossia",
	'echo-email-batch-link-text-view-all-notifications' => 'Talìa tutti li canciamenti',
	'echo-rev-deleted-text-view' => 'Sta virsioni dâ pàggina fu supprimuta',
);

/** Serbo-Croatian (srpskohrvatski / српскохрватски)
 * @author Kolega2357
 */
$messages['sh'] = array(
	'echo-desc' => 'Obavještajni sistem',
	'prefs-echo' => 'Obavještenja',
	'prefs-emailsettings' => 'Email opcije',
	'prefs-displaynotifications' => 'Opcije prikaza',
	'prefs-echosubscriptions' => 'Obavijesti me o tim događajima',
	'prefs-newmessageindicator' => 'Indikator za nove poruke',
	'echo-pref-send-me' => 'Pošalji mi:',
	'echo-pref-send-to' => 'Pošalji:',
	'echo-pref-email-format' => 'Format e-pošte:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-pošta',
	'echo-pref-email-frequency-never' => 'Ne šalji mi obavještenja preko e-pošte',
	'echo-pref-email-frequency-immediately' => 'Lična obavještenja kako dolaze u',
	'echo-pref-email-frequency-daily' => 'Dnevni sažetak obavještenja',
	'echo-pref-email-frequency-weekly' => 'Nedeljni sažetak obavještenja',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Obični tekst',
	'echo-pref-notify-show-link' => 'Pokaži obavještenja u mojoj alatnoj traci',
	'echo-pref-new-message-indicator' => 'Pokaži indikator da je dobijena poruka na stranici za razgovor u mojoj alatnoj traci',
	'echo-learn-more' => 'Saznajte više',
	'echo-new-messages' => 'Imate nove poruke.',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Poruke}} na stranici za razgovor',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Linkovi na stranicu}}',
	'echo-category-title-reverted' => '{{PLURAL:$1|Vraćanje izmjena}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Spominjanje|Spominjanja}}',
	'echo-category-title-other' => '{{PLURAL:$1|Ostalo}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistem}}',
	'echo-pref-tooltip-edit-user-talk' => 'Obavijesti me kada neko ostavi poruku ili odgovor na mojoj stranici za razgovor.',
	'echo-pref-tooltip-article-linked' => 'Obavijesti me kada neko linkuje na stranicu koju sam napravio od stranice članaka.',
	'echo-pref-tooltip-reverted' => 'Obavijesti me kada neko vrati uređivanje koje sam napravio/la, korištenjem naredbe undo ili alatom za vraćanje.',
	'echo-pref-tooltip-mention' => 'Obavijesti me kada me neko spomene na nekoj stranici za razgovor.',
	'echo-no-agent' => '[Niko]',
	'echo-no-title' => '[Nema stranice]',
	'echo-error-no-formatter' => 'Nema formatiranja određenog za obavještavanje.',
	'echo-error-preference' => 'Greška: Nemoguće odrediti korisničke postavke.',
	'echo-error-token' => 'Greška: Nemoguće ponovo pronaći korisničku oznaku.',
	'notifications' => 'Obavještenja',
	'tooltip-pt-notifications' => 'Vaša obavještenja',
	'echo-specialpage' => 'Obavještenja',
	'echo-anon' => 'Da biste primili obaveštenja, morate se [[Special:UserLogin|prijaviti]] ili [[Special:Userlogin/signup|napraviti račun]].', # Fuzzy
	'echo-none' => 'Nemate obavještenja',
	'echo-more-info' => 'Više informacija',
	'echo-feedback' => 'Povratna informacija',
	'notification-link-text-view-message' => 'Pogledaj poruku',
	'notification-link-text-view-mention' => 'Pogledajte spominjanje',
	'notification-link-text-view-changes' => 'Pogledaj izmjene',
	'notification-link-text-view-page' => 'Pogledaj stranicu',
	'notification-link-text-view-edit' => 'Pogledaj uređivanje',
	'notification-edit-talk-page2' => '[[User:$1|$1]] vam je {{GENDER:$1|ostavio|ostavila}} poruku na vašoj [[User talk:$2#$3|stranici za razgovor]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] vam je {{GENDER:$1|ostavio|ostavila}} poruku na vašoj stranici za razgovor u "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 vam je {{GENDER:$1|ostavio|ostavila}} poruku na vašoj [[User talk:$2#$3|stranici za razgovor]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 vam je {{GENDER:$1|ostavio|ostavila}} poruku na vašoj stranici za razgovor u "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => 'Stranica [[:$2]] je {{GENDER:$1|povezana}} sa stranicom [[:$3]]. [[Special:WhatLinksHere/$2|Pogledajte sve veze prema ovoj stranici]].',
	'notification-page-linked-flyout' => '$2 je {{GENDER:$1|povezana}} sa [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] je {{GENDER:$1|ostavio|ostavila}} komentar na "[[$3|$2]]" na "$4" stranici za razgovor.',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] je {{GENDER:$1|postavio|postavila}} novu temu "$2" na [[$3]].',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] vam je {{GENDER:$1|poslao|poslala}} poruku: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]] je {{GENDER:$1|komentarisao|komentarisala}} temu "[[$3#$2|$2]]" na vašoj stranici za razgovor.',
	'notification-mention' => '[[User:$1|$1]] vas je {{GENDER:$1|spomenuо|spomenula}} na stranici za razgovor $5 u "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 vas je {{GENDER:$1|spomenuо|spomenula}} na stranici za razgovor $5 u "[[$3#$2|$4]]".',
	'notification-user-rights' => 'Vaša korisnička prava [[Special:Log/rights/$1|su bila {{GENDER:$1|izmijenjena}}]] od strane [[User:$1|$1]]. $2. [[Special:ListGroupRights|Saznajte više]]',
	'notification-user-rights-flyout' => 'Vaša korisnička prava su bila {{GENDER:$1|izmijenjena}} od strane $1. $2. [[Special:ListGroupRights|Saznajte više]]',
	'notification-user-rights-add' => 'Od sada ste član {{PLURAL:$2|ove grupe|ovih grupa}}: $1',
	'notification-user-rights-remove' => 'Više niste član {{PLURAL:$2|ove grupe|ovih grupa}}: $1',
	'notification-new-user' => '$1, dobro došli na {{SITENAME}}! Drago nam je što ste ovdje.',
	'notification-reverted2' => '{{PLURAL:$4|Vaša izmjena na [[:$2]] je poništena|Vaše izmjene na [[:$2]] su vraćene}} {{GENDER:$1|od}} strane [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Vaša izmjena na $2 je poništena|Vaše izmjene na $2 su vraćene}} {{GENDER:$1|od}} strane $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 vam je {{GENDER:$1|ostavio|ostavila}} poruku na {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 vam je {{GENDER:$1|ostavio|ostavila}} poruku na vašoj stranici za razgovor:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 vam je {{GENDER:$1|ostavio|ostavila}} poruku na vašoj stranici za razgovor u "$2".',
	'notification-page-linked-email-subject' => 'Vaša stranica je povezana na {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2 je {{GENDER:$1|povezana}} sa $3.',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Vaša izmjena je {{GENDER:$1|poništena}}|Vaše izmjene su {{GENDER:$1|poništene}}}} na {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Vaša izmjena na $2 je poništena|Vaše izmjene na $2 su vraćene}} {{GENDER:$1|od}} strane $1.',
	'notification-mention-email-subject' => '$1 vas je {{GENDER:$1|spomenuо|spomenula}} na {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 vas je {{GENDER:$1|spomenuо|spomenula}} na stranici za razgovor $4 u "$3".',
	'notification-user-rights-email-subject' => 'Vaša korisnička prava su se promijenila na {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Vaša korisnička prava su {{GENDER:$1|promjenjena}} od strane $1. $2',
	'echo-email-subject-default' => 'Novo obavještenje na {{SITENAME}}',
	'echo-email-body-default' => 'Imate novo obavještenje na {{SITENAME}}: 

$1',
	'echo-email-batch-body-default' => 'Imate novo obavještenje.',
	'echo-email-footer-default' => '$2

Da kontrolišete koje vam email poruke šaljemo, provjerite svoje postavke:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Da kontrolišete koje vam email poruke šaljemo, <a href="$2" style="text-decoration:none; color: #3868B0;">provjerite vaše postavke</a>.<br />
$1',
	'echo-overlay-link' => 'Sva obavještenja',
	'echo-overlay-title' => '<b>Obavještenja</b>',
	'echo-overlay-title-overflow' => '<b>Obavještenja</b> (prikaz $1 od $2 nepročitanih)
<b>Obavještenja</b> (prikaz $1 od $2 nepročitanih)', # Fuzzy
	'echo-mark-all-as-read' => 'Označi sve kao pročitano',
	'echo-date-today' => 'Danas',
	'echo-date-yesterday' => 'Juče',
	'echo-load-more-error' => 'Greška se pojavila za vrijeme dobavljanja više rezultata.',
	'notification-edit-talk-page-bundle' => '$1 i $3 {{PLURAL:$4|ostali|ostale}} {{GENDER:$1|ostavili}} su poruku na vašoj [[User talk:$2|stranici za razgovor]].',
	'notification-page-linked-bundle' => '$2 je {{GENDER:$1|povezana}} sa $3 i $4 {{PLURAL:$5|druge stranice|drugih stranica}}. [[Special:WhatLinksHere/$2|Pogledaj sve linkove na ovu stranicu]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 i $2 {{PLURAL:$3|ostali|ostalih}} {{GENDER:$1|ostavili}} su poruku na vašoj stranici za razgovor.',
	'notification-page-linked-email-batch-bundle-body' => 'Stranica $2 je {{GENDER:$1|povezana}} sa $3 i $4 {{PLURAL:$5|druge stranice|drugih stranica}}.',
	'echo-email-batch-subject-daily' => 'Imate {{PLURAL:$2|novo obavještenje|nova obavještenja}} na {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Imate {{PLURAL:$2|novo obavještenje|nova obavještenja}} na {{SITENAME}} ove nedelje',
	'echo-email-batch-body-intro-daily' => 'Zdravo $1,
Ovo je sažetak današnjih aktivnosti na {{SITENAME}} za Vas.',
	'echo-email-batch-body-intro-weekly' => 'Zdravo $1,
Ovo je sažetak nedeljnih aktivnosti na {{SITENAME}} za Vas.',
	'echo-email-batch-link-text-view-all-notifications' => 'Vidi sve notifikacije',
	'echo-rev-deleted-text-view' => 'Revizija ove stranice je zabranjena.',
);

/** Sinhala (සිංහල)
 * @author පසිඳු කාවින්ද
 */
$messages['si'] = array(
	'echo-desc' => 'නිවේදන පද්ධතිය',
	'prefs-echo' => 'නිවේදන',
	'prefs-displaynotifications' => 'විකල්ප පෙන්වන්න',
	'echo-pref-email-frequency-never' => 'මට විද්‍යුත්-තැපැල් නිවේදන කිසිවක් එවන්න එපා',
	'echo-pref-email-frequency-immediately' => 'තනි තනි නිවේදන ඒවා එන විට',
	'echo-pref-email-frequency-daily' => 'නිවේදනවල දෛනික සාරාංශයක්',
	'echo-pref-email-frequency-weekly' => 'නිවේදනවල සතිපතා සාරාංශයක්',
	'echo-no-agent' => '[කිසිවෙකු නැත]',
	'echo-no-title' => '[පිටුවක් නොමැත]',
	'echo-error-no-formatter' => 'නිවේදනය සඳහා කිසිදු ආකෘතියක් දක්වා නොමැත',
	'notifications' => 'නිවේදන',
	'tooltip-pt-notifications' => 'ඔබේ නිවේදන',
	'echo-specialpage' => 'නිවේදන',
	'echo-anon' => 'නිවේදන ලබා ගැනීම සඳහා, [$1 ගිණුමක් තනන්න] හෝ [$2 ප්‍රවිෂ්ට වන්න].',
	'echo-none' => 'ඔබට නිවේදන කිසිවක් නොමැත.',
	'notification-new-user' => '{{SITENAME}} වෙත පිළිගනිමු, $1!', # Fuzzy
	'echo-email-subject-default' => '{{SITENAME}} හී නව නිවේදනයක්',
	'echo-email-body-default' => 'ඔබට {{SITENAME}} හීදී නව නිවේදනයක් ඇත:

$1',
	'echo-overlay-link' => 'සියලුම නිවේදන',
	'echo-overlay-title' => '<b>නිවේදන</b>',
	'echo-overlay-title-overflow' => 'මගේ නිවේදන (නොකියවූ ඒවා $1 න් $2 පෙන්වමින්)', # Fuzzy
	'echo-date-today' => 'අද',
	'echo-date-yesterday' => 'පෙරදින',
	'echo-load-more-error' => 'තවත් ප්‍රතිඑල පමුනුවිමේදී දෝෂයක් හට ගැනුණි.',
	'echo-email-batch-subject-daily' => 'ඔබට අද {{PLURAL:$2|නිවේදන}} $1 ඇත', # Fuzzy
	'echo-email-batch-subject-weekly' => 'ඔබට මෙම සතියේ {{PLURAL:$2|නිවේදන}} $1 ඇත', # Fuzzy
);

/** Slovak (slovenčina)
 * @author Sudo77(new)
 */
$messages['sk'] = array(
	'echo-desc' => 'Notifikačný systém',
	'prefs-echo' => 'Upozornenia',
	'prefs-emailsettings' => 'Možnosti e-mailu',
	'prefs-displaynotifications' => 'Možnosti zobrazenia',
	'prefs-echosubscriptions' => 'Upozornite ma na tieto udalosti',
	'prefs-newmessageindicator' => 'Indikátor nových správ',
	'echo-pref-send-me' => 'Posielajte mi:',
	'echo-pref-send-to' => 'Posielať na:',
	'echo-pref-email-format' => 'Formát e-mailu:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-mail',
	'echo-pref-email-frequency-never' => 'Neposielajte mi žiadne upozornenia e-mailom',
	'echo-pref-email-frequency-immediately' => 'Jednotlivé upozornenia ako prichádzajú',
	'echo-pref-email-frequency-daily' => 'Denný súhrn upozornení',
	'echo-pref-email-frequency-weekly' => 'Týždenný súhrn upozornení',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Obyčajný text',
	'echo-pref-notify-show-link' => 'Zobrazovať upozornenia v mojom paneli nástrojov',
	'echo-pref-new-message-indicator' => 'Zobraziť indikátor diskusných správ v mojom paneli nástrojov',
	'echo-learn-more' => 'Ďalšie informácie',
	'echo-new-messages' => 'Máte nové správy.', # Fuzzy
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|správu|správy}} v diskusii',
	'echo-category-title-article-linked' => '{{PLURAL:$1|odkaz|odkazy}} na stránku',
	'echo-category-title-reverted' => '{{PLURAL:$1|vrátenú úpravu|vrátené úpravy}}',
	'echo-category-title-mention' => '{{PLURAL:$1|zmienku|zmienky}}',
	'echo-category-title-other' => '{{PLURAL:$1|inú udalosť|iné udalosti}}',
	'echo-category-title-system' => '{{PLURAL:$1|systémovú udalosť|systémové udalosti}}',
	'echo-pref-tooltip-edit-user-talk' => 'Upozornite ma, keď mi niekto na mojej diskusnej stránke napíše správu alebo odpovie.',
	'echo-pref-tooltip-article-linked' => 'Upozornite ma, keď niekto na stránku, ktorú som založil, odkáže z článku.',
	'echo-pref-tooltip-reverted' => 'Upozornite ma, keď niekto vráti úpravu, ktorú som urobil, pomocou nástrojov vrátiť alebo rollback.',
	'echo-pref-tooltip-mention' => 'Upozornite ma, keď v akejkoľvek diskusii niekto odkáže na moju redaktorskú stránku.',
	'echo-no-agent' => '[Nikto]',
	'echo-no-title' => '[Žiadna stránka]',
	'echo-error-no-formatter' => 'Upozornenie nemá definované formátovanie',
	'notifications' => 'Upozornenia',
	'tooltip-pt-notifications' => 'Vaše upozornenia',
	'echo-specialpage' => 'Upozornenia',
	'echo-anon' => 'Ak chcete dostávať upozornenia, musíte si [$1 vytvoriť účet] alebo [$2 sa prihlásiť].',
	'echo-none' => 'Nemáte žiadne upozornenia.',
	'echo-more-info' => 'Viac informácií',
	'echo-feedback' => 'Spätná väzba',
	'notification-link-text-view-message' => 'Zobraziť správu',
	'notification-link-text-view-mention' => 'Zobraziť zmienku',
	'notification-link-text-view-changes' => 'Zobraziť zmeny',
	'notification-link-text-view-page' => 'Zobraziť stránku',
	'notification-link-text-view-edit' => 'Zobraziť úpravu',
	'notification-edit-talk-page2' => '[[User:$1|$1]] vám {{GENDER:$1|napísal|napísala}} na [[User talk:$2#$3|vašu diskusnú stránku]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] vám {{GENDER:$1|napísal|napísala}} na vašu diskusnú stránku v sekcii „[[User talk:$2#$3|$4]]“.',
	'notification-edit-talk-page-flyout2' => '$1 vám {{GENDER:$1|napísal|napísala}} na [[User talk:$2#$3|vašu diskusnú stránku]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 vám {{GENDER:$1|napísal|napísala}} na vašu diskusnú stránku v sekcii „[[User talk:$2#$3|$4]]“.',
	'notification-page-linked' => 'Na stránku [[:$3]] {{GENDER:$1|bol pridaný}} odkaz na stránku [[:$2]]. [[Special:WhatLinksHere/$2|Zobraziť všetky odkazy na túto stránku]].',
	'notification-page-linked-flyout' => 'Na stránku [[:$3]] {{GENDER:$1|bol pridaný}} odkaz na stránku $2.',
	'notification-page-linked-email-batch-body' => 'Na stránku $3 {{GENDER:$1|bol pridaný}} odkaz na stránku $2',
	'echo-email-batch-body-default' => 'Máte nové upozornenie',
	'echo-overlay-link' => 'Všetky upozornenia',
	'echo-overlay-title' => '<b>Upozornenia</b>',
	'echo-mark-all-as-read' => 'Označiť všetko ako prečítané',
	'echo-date-today' => 'Dnes',
	'echo-date-yesterday' => 'Včera',
	'echo-email-batch-link-text-view-all-notifications' => 'Zobraziť všetky upozornenia',
);

/** Slovenian (slovenščina)
 * @author Dbc334
 * @author Eleassar
 * @author Matej1234
 * @author Pinky sl
 * @author Yerpo
 */
$messages['sl'] = array(
	'echo-desc' => 'Sistem obvestil',
	'prefs-echo' => 'Obvestila',
	'prefs-emailsettings' => 'Možnosti e-pošte',
	'prefs-displaynotifications' => 'Možnosti prikaza',
	'prefs-echosubscriptions' => 'Obvesti me o naslednjih dogodkih',
	'prefs-newmessageindicator' => 'Kazalnik novih sporočil',
	'echo-pref-send-me' => 'Pošlji mi:',
	'echo-pref-send-to' => 'Pošlji:',
	'echo-pref-email-format' => 'Format e-pošte:',
	'echo-pref-web' => 'Splet',
	'echo-pref-email' => 'E-pošta',
	'echo-pref-email-frequency-never' => 'Ne pošiljaj mi nobenih e-poštnih obvestil',
	'echo-pref-email-frequency-immediately' => 'Posamezna obvestila, kot prihajajo',
	'echo-pref-email-frequency-daily' => 'Dnevni povzetek obvestil',
	'echo-pref-email-frequency-weekly' => 'Tedenski povzetek obvestil',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Neoblikovano besedilo',
	'echo-pref-notify-show-link' => 'Prikaži obvestila v orodni vrstici',
	'echo-pref-new-message-indicator' => 'V orodni vrstici prikaži kazalnik sporočil na pogovornih straneh',
	'echo-learn-more' => 'Več o tem',
	'echo-new-messages' => 'Imate nova sporočila',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Sporočilo|Sporočila}} na pogovornih straneh',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Povezava|Povezave}} na pogovornih straneh',
	'echo-category-title-reverted' => 'Uredi {{PLURAL:$1|vračanje|vračanja}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Omemba|Omembe}}',
	'echo-category-title-other' => '{{PLURAL:$1|Drugo}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistem}}',
	'echo-pref-tooltip-edit-user-talk' => 'Obvesti me, ko nekdo na moji pogovorni strani objavi sporočilo ali odgovori.',
	'echo-pref-tooltip-article-linked' => 'Obvesti me, ko nekdo doda povezavo na stran, ki sem jo ustvaril.',
	'echo-pref-tooltip-reverted' => 'Obvesti me, ko nekdo z orodjem za razveljavitev ali vrnitev vrne urejanje, ki sem ga napravil.',
	'echo-pref-tooltip-mention' => 'Obvesti me, ko se nekdo s katere koli pogovorne strani poveže na mojo uporabniško stran.',
	'echo-no-agent' => '[Nihče]',
	'echo-no-title' => '[Nobena stran]',
	'echo-error-no-formatter' => 'Za obvestilo ni določeno nobeno oblikovanje.',
	'echo-error-preference' => 'Napaka: ni bilo mogoče nastaviti uporabniških nastavitev.',
	'echo-error-token' => 'Napaka: ni bilo mogoče pridobiti uporabnikovega žetona.',
	'notifications' => 'Obvestila',
	'tooltip-pt-notifications' => 'Vaša obvestila',
	'echo-specialpage' => 'Obvestila',
	'echo-anon' => 'Za prejemanje obvestil [$1 si ustvarite račun] ali [$2 se prijavite].',
	'echo-none' => 'Nimate obvestil.',
	'echo-more-info' => 'Več informacij',
	'echo-feedback' => 'Povratne informacije',
	'notification-link-text-view-message' => 'Ogled sporočila',
	'notification-link-text-view-mention' => 'Ogled omembe',
	'notification-link-text-view-changes' => 'Ogled sprememb',
	'notification-link-text-view-page' => 'Ogled strani',
	'notification-link-text-view-edit' => 'Ogled urejanja',
	'notification-edit-talk-page2' => '[[User:$1|$1]] je na vaši [[User talk:$2#$3|pogovorni strani]] {{GENDER:$1|pustil|pustila}} sporočilo.',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] je {{GENDER:$1|pustil|pustila}} sporočilo na vaši pogovorni strani v razdelku »[[User talk:$2#$3|$4]]«.',
	'notification-edit-talk-page-flyout2' => '$1 je na vaši [[User talk:$2#$3|pogovorni strani]]{{GENDER:$1|pustil|pustila}} sporočilo.',
	'notification-edit-talk-page-flyout-with-section' => '$1 je {{GENDER:$1|pustil|pustila}} sporočilo na vaši pogovorni strani v razdelku »[[User talk:$2#$3|$4]]«.',
	'notification-page-linked' => 'Na strani »[[:$3]]« je bila {{GENDER:$1|dodana}} povezava na stran »[[:$2]]«. [[Special:WhatLinksHere/$2|Ogled vseh povezav na to stran]].',
	'notification-page-linked-flyout' => 'Na strani »[[:$3]]« je bila {{GENDER:$1|dodana povezava}} na stran »$2«.',
	'notification-add-comment2' => '[[User:$1|$1]] je o »[[$3|$2]]« {{GENDER:$1|komentiral|komentirala}} na pogovorni strani »$4«.',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] je na strani »[[$3]]« {{GENDER:$1|objavil|objavila}} novo temo »$2«.',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] vam je {{GENDER:$1|poslal|poslala}} sporočilo: »[[$3#$2|$2]]«.',
	'notification-add-comment-yours2' => '[[User:$1|$1]] je na vaši pogovorni strani {{GENDER:$1|komentiral|komentirala}} o temi »[[$3#$2|$2]]«.',
	'notification-mention' => '[[User:$1|$1]] vas je {{GENDER:$1|omenil|omenila}} na pogovorni strani strani »$5« v razdelku »[[$3#$2|$4]]«.',
	'notification-mention-flyout' => '$1 vas je {{GENDER:$1|omenil|omenila}} v razdelku »[[$3#$2|$4]]« na pogovorni strani uporabnika »$5«.',
	'notification-mention-nosection' => '[[User:$1|$1]] vas je {{GENDER:$1|omenil|omenila|omenil(-a)}} na [[$3|pogovorni strani $2]].',
	'notification-mention-nosection-flyout' => '$1 vas je {{GENDER:$1|omenil|omenila|omenil(-a)}} na [[$3|pogovorni strani $2]].',
	'notification-user-rights' => 'Vaše uporabniške pravice [[Special:Log/rights/$1|je {{GENDER:$1|spremenil|spremenila}}]] {{GENDER:$1|uporabnik|uporabnica}} [[User:$1|$1]]. $2. [[Special:ListGroupRights|Več o tem]].',
	'notification-user-rights-flyout' => 'Vaše uporabniške pravice je {{GENDER:$1|spremenil|spremenila}} {{GENDER:$1|uporabnik|uporabnica}} $1. $2. [[Special:ListGroupRights|Več o tem]].',
	'notification-user-rights-add' => 'Odslej ste član {{PLURAL:$2|naslednje skupine|naslednjih skupin}}: $1',
	'notification-user-rights-remove' => 'Niste več član {{PLURAL:$2|naslednje skupine|naslednjih skupin}}: $1',
	'notification-new-user' => 'Pozdravljeni v {{GRAMMAR:dajalnik|{{SITENAME}}}}, $1! Veseli smo, da ste tu.',
	'notification-reverted2' => '{{PLURAL:$4|Vaše urejanje strani »[[:$2]]« je|Vaša urejanja strani »[[:$2]]« je}} {{GENDER:$1|uporabnik|uporabnica}} [[User:$1|$1]] {{GENDER:$1|vrnil|vrnila}}. $3.',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Vaše urejanje strani »$2«|Vaša urejanja strani »$2«}} je {{GENDER:$1|vrnil|vrnila}} {{GENDER:$1|uporabnik|uporabnica}} $1. $3.',
	'notification-edit-talk-page-email-subject2' => 'V projektu {{SITENAME}} vam je {{GENDER:$1|uporabnik|uporabnica}} {{GENDER:$1|pustil|pustila}} sporočilo.',
	'notification-edit-talk-page-email-batch-body2' => '{{GENDER:$1|Uporabnik|Uporabnica}} vam je na pogovorni strani {{GENDER:$1|pustil|pustila}} sporočilo:',
	'notification-edit-talk-page-email-batch-body-with-section' => '{{GENDER:$1|Uporabnik|Uporabnica}} vam je {{GENDER:$1|pustil|pustila}} sporočilo na pogovorni strani v razdelku »$2«.',
	'notification-page-linked-email-subject' => 'V projektu {{SITENAME}} je bila dodana povezava na vašo stran',
	'notification-page-linked-email-batch-body' => 'Stran »$2« je bila {{GENDER:$1|povezana}} s strani »$3«.',
	'notification-reverted-email-subject2' => 'V {{GRAMMAR:dajalnik|{{SITENAME}}}} {{PLURAL:$3|je bilo|so bila}} {{PLURAL:$3|vaše urejanje|vaša urejanja}} {{GENDER:$1|{{PLURAL:$3|vrnjeno|vrnjena}}}}.',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Vaše urejanje|Vaša urejanja}} v {{GRAMMAR:mestnik|$2}} je {{GENER:$1|vrnil|vrnila}} $1.',
	'notification-mention-email-subject' => 'V projektu {{SITENAME}} vas je {{GENDER:$1|omenil|omenila}} $1.',
	'notification-mention-email-batch-body' => 'V razdelku »$3« na pogovorni strani {{GENDER:$4|uporabnika|uporabnice}} vas je {{GENDER:$1|omenil|omenila}} $1.',
	'notification-mention-nosection-email-batch-body' => '$1 vas je {{GENDER:$1|omenil|omenila|omenil(-a)}} na pogovorni strani $2.',
	'notification-user-rights-email-subject' => 'V {{GRAMMAR:dajalnik|{{SITENAME}}}} so bile spremenjene vaše uporabniške pravice',
	'notification-user-rights-email-batch-body' => 'Vaše uporabniške pravice je {{GENDER:$1|spremenil|spremenila}} $1. $2.',
	'echo-email-subject-default' => 'Novo obvestilo v {{GRAMMAR:dajalnik|{{SITENAME}}}}',
	'echo-email-body-default' => 'V {{GRAMMAR:dajalnik|{{SITENAME}}}} imate novo obvestilo:

$1',
	'echo-email-batch-body-default' => 'Imate novo obvestilo.',
	'echo-email-footer-default' => '$2

Za izbiro e-poštnih sporočil, ki jih želite prejemati, prilagodite svoje nastavitve:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Za izbiro e-poštnih sporočil, ki naj vam jih pošiljamo, <a href="$2" style="text-decoration:none; color: #3868B0;">preverite svoje nastavitve</a>.<br />
$1',
	'echo-overlay-link' => 'Vsa obvestila',
	'echo-overlay-title' => '<b>Obvestila</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Obvestila}}</b> ({{PLURAL:$1|prikazano|prikazani|prikazana|prikazanih}} $1 od $2 {{PLURAL:$2|neprebranega|neprebranih}})',
	'echo-mark-all-as-read' => 'Označi vsa sporočila kot prebrana',
	'echo-date-today' => 'Danes',
	'echo-date-yesterday' => 'Včeraj',
	'echo-load-more-error' => 'Pri pridobivanju dodatnih rezultatov je prišlo do napake.',
	'notification-edit-talk-page-bundle' => '$1 in $3 {{PLURAL:$4|drug|druga|drugih}} vam je na vaši [[User talk:$2|uporabniški strani]] {{GENDER:$1|pustilo}} sporočilo.',
	'notification-page-linked-bundle' => 'Stran »$2« je bila »{{GENDER:$1|povezan|povezana}}« s strani »$3« in $4 {{PLURAL:$5|druge strani|drugih strani}}. [[Special:WhatLinksHere/$2|Ogled vseh povezav na to stran]].',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 in $2 {{PLURAL:$3|drug|druga|drugih}} vam je na pogovorni strani {{GENDER:$1|pustilo}} sporočilo.',
	'notification-page-linked-email-batch-bundle-body' => 'Stran »$2« je bila {{GENDER:$1|povezan|povezana}} s strani »$3« in $4 {{PLURAL:$5|druge strani|drugih strani}}.',
	'echo-email-batch-subject-daily' => 'V {{GRAMMAR:dajalnik|{{SITENAME}}}} imate {{PLURAL:$2|novo sporočilo|nova sporočila}}.',
	'echo-email-batch-subject-weekly' => 'V {{GRAMMAR:dajalnik|{{SITENAME}}}} imate ta teden {{PLURAL:$2|eno novo sporočilo|nova sporočila}}.',
	'echo-email-batch-body-intro-daily' => 'Pozdravljeni, $1,
tu je za vas povzetek današnje aktivnosti v {{GRAMMAR:dajalnik|{{SITENAME}}}}.',
	'echo-email-batch-body-intro-weekly' => 'Pozdravljeni, $1,
tu je za vas povzetek aktivnosti preteklega tedna v {{GRAMMAR:dajalnik|{{SITENAME}}}}.',
	'echo-email-batch-link-text-view-all-notifications' => 'Ogled vseh obvestil',
	'echo-rev-deleted-text-view' => 'Ta redakcija strani je bila izbrisana.',
);

/** Somali (Soomaaliga)
 * @author Abshirdheere
 */
$messages['so'] = array(
	'echo-new-messages' => 'Farriin cusub baa kuu taal',
	'tooltip-pt-notifications' => 'Wargelinadaada',
	'echo-specialpage' => 'Wargelin',
	'echo-none' => 'Malahan wax wargelin ah.',
	'echo-more-info' => 'Dheeraad',
	'echo-overlay-link' => 'Dhammaan wargelinada',
	'echo-overlay-title' => '<b>Wargelinada</b>',
);

/** Albanian (shqip)
 * @author Euriditi
 */
$messages['sq'] = array(
	'echo-desc' => 'Sistemi i njoftimeve',
	'prefs-echo' => 'Njoftimet',
	'prefs-emailsettings' => 'Opsionet e e-mailit',
	'prefs-displaynotifications' => 'Shfaq opsionet',
	'prefs-echosubscriptions' => 'Më njofto për këto raste',
	'prefs-newmessageindicator' => 'Brezi i mesazhit të ri',
	'echo-pref-send-me' => 'Më dërgo:',
	'echo-pref-send-to' => 'Dërgo në:',
	'echo-pref-email-format' => 'Formati i e-mailit:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-mail',
	'echo-pref-email-frequency-never' => 'Mos më dërgo më njoftime me email',
	'echo-pref-email-frequency-immediately' => 'Njoftimet individuale për çdo rast',
	'echo-pref-email-frequency-daily' => 'Përmbledhje e përditshme e njoftimeve',
	'echo-pref-email-frequency-weekly' => 'Përmbledhje javore e njoftimeve',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Tekst normal',
	'echo-pref-notify-show-link' => 'Shfaq njoftimet në brezin e mjeteve',
	'echo-pref-new-message-indicator' => 'Shfaq brezin e mesazheve të reja në faqen time të diskutimit në brezin e mjeteve',
	'echo-learn-more' => 'Mëso më tepër',
	'echo-new-messages' => 'Keni mesazhe të reja',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|mesazh|mesazhe}} në faqen e diskutimeve',
	'echo-category-title-article-linked' => '{{PLURAL:$1|lidhje|lidhje}} në një faqe',
	'echo-category-title-reverted' => '{{PLURAL:$1|Redaktim i kthyer|Redaktime të kthyera}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Përmëndje|Përmëndje}}',
	'echo-category-title-other' => '{{PLURAL:$1|Të tjera}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistemi}}',
	'echo-pref-tooltip-edit-user-talk' => 'Më njofto kur dikush poston një mesazh të ri ose përgjigjet në faqet time të diskutimit.',
	'echo-pref-tooltip-article-linked' => 'Më njofto kur dikush lidh, një faqe, me një faqe që kam krijuar unë.',
	'echo-pref-tooltip-reverted' => 'Më njofto kur dikush kthen një ndryshim që kam bërë unë, duke përdorur funksionet zhbëj ose riktheje.',
	'echo-pref-tooltip-mention' => 'Më njofto kur dikush lidh faqen time të përdoruesit me cilëndo faqe diskutimi.',
	'echo-no-agent' => '[Asnjeri]',
	'echo-no-title' => '[Asnjë faqe]',
	'echo-error-no-formatter' => 'Asnjë përcaktim mbi formatimimin e njoftimeve.',
	'echo-error-preference' => 'Gabim: Preferenca e përdoruesit nuk janë ruajtur.',
	'echo-error-token' => 'Gabim: Sistemi nuk arriti të rigjejë shenjat e identifikimit.',
	'notifications' => 'Njoftimet',
	'tooltip-pt-notifications' => 'Njoftimet tuaja',
	'echo-specialpage' => 'Njoftimet',
	'echo-anon' => 'Për të marrë njoftime, [$1 regjistrohuni] ose [$2 hyni].',
	'echo-none' => 'Nuk keni njoftime.',
	'echo-more-info' => 'Më tepër informacion',
	'echo-feedback' => 'Komente',
	'notification-link-text-view-message' => 'Shiko mesazhin',
	'notification-link-text-view-mention' => 'Shiko përmëndjen',
	'notification-link-text-view-changes' => 'Shiko ndryshimet',
	'notification-link-text-view-page' => 'Shiko faqen',
	'notification-link-text-view-edit' => 'Shiko redaktimin',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|iu la}} një mesazh në [[User talk:$2#$3|faqen tuaj të diskutimeve]].',
	'notification-edit-talk-page-with-section' => "[[User:$1|$1]] {{GENDER:$1|iu la}} një mesazh në faqen tuaj të diskutimeve në seksionin '[[User talk:$2#$3|$4]]'.",
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|iu la}} një mesazh në [[User talk:$2#$3|faqen tuaj të diskutimeve]].',
	'notification-edit-talk-page-flyout-with-section' => "$1 {{GENDER:$1|iu la}} një mesazh në faqen tuaj të diskutimeve në seksionin '[[User talk:$2#$3|$4]]'.",
	'notification-page-linked' => '[[:$2]] u {{GENDER:$1|lidh}} nga [[:$3]]. [[Special:WhatLinksHere/$2|Shiko të gjitha lidhjet me këtë faqe]].',
	'notification-page-linked-flyout' => '$2 u {{GENDER:$1|lidh}} nga [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|la një koment}} në lidhje me "[[$3|$2]]" në faqen e diskutimeve të "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|postoi}} një temë të re "$2" në [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] të {{GENDER:$1|dërgoi}} një mesazh: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|la një koment}} në lidhje me  "[[$3#$2|$2]]" në faqen tuaj të diskutimeve.',
	'notification-mention' => "[[User:$1|$1]] iu {{GENDER:$1|përmëndi}} në faqen e diskutimeve $5 në '[[$3#$2|$4]]'.",
	'notification-mention-flyout' => "$1 iu {{GENDER:$1|përmëndi}} në faqen e diskutimeve $5 në '[[$3#$2|$4]]'.",
	'notification-user-rights' => 'Të drejtat e tua të përdoruesit [[Special:Log/rights/$1|u {{GENDER:$1|ndryshuan}}]] nga [[User:$1|$1]]. $2. [[Special:ListGroupRights|Mëso më tepër]]',
	'notification-user-rights-flyout' => 'Të drejtat e tua të përdoruesit u {{GENDER:$1|ndryshuan}} nga $1. $2. [[Special:ListGroupRights|Më tepër informacion]]',
	'notification-user-rights-add' => 'Tashmë je anëtar i {{PLURAL:$2|këtij grupi|këtyre grupeve}}: $1',
	'notification-user-rights-remove' => 'Ju nuk jeni më anëtar i {{PLURAL:$2|këtij grupi|këtyre grupeve}}: $1',
	'notification-new-user' => 'Mirësevini në {{SITENAME}}, $1! Jemi të lumtur që ti je këtu.',
	'notification-reverted2' => '{{PLURAL:$4|Redaktimi juaj|Redaktimet e tua}} në [[:$2]] {{PLURAL:$4|u kthye|u kthyen}} {{GENDER:$1|nga}} [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Redaktimi juaj|Redaktimet e tua}} në $2 {{PLURAL:$4|u kthye|u kthyen}} {{GENDER:$1|nga}} $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|iu la}} një mesazh në {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|iu la}} një mesazh në faqen tuaj të diskutimeve:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|iu la}} një mesazh në faqen tuaj të diskutimeve në "$2".',
	'notification-page-linked-email-subject' => 'Një faqe që keni krijuar u lidh në {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2 u {{GENDER:$1|lidh}} nga $3',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Redaktimi juaj|Redaktimet tuaja}} {{GENDER:$1|u kthyen}} në {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Redaktimi juaj|Redaktimet e tua}} në $2 {{PLURAL:$3|u kthye|u kthyen}} {{GENDER:$1|nga}} $1',
	'notification-mention-email-subject' => '$1 të {{GENDER:$1|përmëndi}} në {{SITENAME}}',
	'notification-mention-email-batch-body' => "$1 të {{GENDER:$1|përmëndi}} në faqen e diskutimeve të $4 në seksionin '$3'.",
	'notification-user-rights-email-subject' => 'Të drejtat e tua të përdoruesit u ndryshuan në {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Të drejtat e tua të përdoruesit u {{GENDER:$1|ndyshuan}} nga $1. $2',
	'echo-email-subject-default' => 'Njoftim i ri në {{SITENAME}}',
	'echo-email-body-default' => 'Keni një njoftim të ri në {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Keni një njoftim të ri.',
	'echo-email-footer-default' => "$2

Për të kontrolluar se cili email do t'iu dërgohet, kontrolloni parapëlqimet tuaja:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1",
	'echo-email-footer-default-html' => 'Për të kontrolluar se cili email do t\'iu dërgohet, <a href="$2" style="text-decoration:none; color: #3868B0;">kontrolloni parapëlqimet tuaja</a>.<br />
$1',
	'echo-overlay-link' => 'Të gjitha njoftimet',
	'echo-overlay-title' => '<b>Njoftimet</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Njoftime}}</b> (duke shfaqur $1 nga $2 të pa lexuara)',
	'echo-mark-all-as-read' => 'Shënoji të gjitha si të lexuara',
	'echo-date-today' => 'Sot',
	'echo-date-yesterday' => 'Dje',
	'echo-load-more-error' => 'Pati një gabim në ngarkimin e rezultateve shtesë.',
	'notification-edit-talk-page-bundle' => '$1 dhe {{PLURAL:$4|një përdorues tjetër|$3 përdorues të tjerë}} {{GENDER:$1|iu lanë}} një mesazh në [[User talk:$2|faqen tuaj të diskutimeve]].',
	'notification-page-linked-bundle' => '$2 u {{GENDER:$1|lidh}} nga $3 dhe {{PLURAL:$5|një faqe tjetër|$4 faqe të tjera}}. [[Special:WhatLinksHere/$2|Shfaq të gjitha lidhjet me këtë faqe]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 dhe {{PLURAL:$3|një tjetër|$2 të tjerë}} {{GENDER:$1|lanë}} një mesazh në faqen tuaj të diskutimeve',
	'notification-page-linked-email-batch-bundle-body' => '$2 u {{GENDER:$1|lidh}} nga $3 dhe {{PLURAL:$5|një tjetër faqe|$4 faqe të tjera}}',
	'echo-email-batch-subject-daily' => 'Keni {{PLURAL:$2|një njoftim të ri|njoftime të reja}} në {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Keni {{PLURAL:$2|një njoftim të ri|njoftime të reja}} në {{SITENAME}} gjatë kësaj jave.',
	'echo-email-batch-body-intro-daily' => 'Përshëndetje $1,
këtu është përmbledhja e aktivitetit të sotëm në {{SITENAME}} për ju.',
	'echo-email-batch-body-intro-weekly' => 'Përshëndetje $1,
këtu është përmbledhja e aktivitetit javor në {{SITENAME}} për ju.',
	'echo-email-batch-link-text-view-all-notifications' => 'Shfaq të gjitha njoftimet',
	'echo-rev-deleted-text-view' => 'Ky version i faqes është fshirë.',
);

/** Serbian (Cyrillic script) (српски (ћирилица)‎)
 * @author Milicevic01
 * @author Rancher
 * @author Михајло Анђелковић
 */
$messages['sr-ec'] = array(
	'echo-desc' => 'Обавештајни систем',
	'prefs-echo' => 'Обавештења',
	'prefs-emailsettings' => 'Поставке е-поште',
	'prefs-displaynotifications' => 'Поставке приказа',
	'prefs-echosubscriptions' => 'Обавести ме о следећим догађајима.',
	'prefs-newmessageindicator' => 'Индикатор за нове поруке',
	'echo-pref-send-me' => 'Пошаљи ми:',
	'echo-pref-send-to' => 'Пошаљи на:',
	'echo-pref-email-format' => 'Формат е-поште:',
	'echo-pref-web' => 'Веб',
	'echo-pref-email' => 'На е-пошту',
	'echo-pref-email-frequency-never' => 'Не шаљи ми обавештења на е-пошту',
	'echo-pref-email-frequency-immediately' => 'Појединачна обавештења чим се појаве',
	'echo-pref-email-frequency-daily' => 'Дневни сажетак обавештења',
	'echo-pref-email-frequency-weekly' => 'Седмични сажетак обавештења',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Чист текст',
	'echo-pref-notify-show-link' => 'Прикажи обавештења у мојој траци алатки',
	'echo-learn-more' => 'Сазнајте више',
	'echo-new-messages' => 'Имате нове поруке',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Поруке}} на страници за разговор',
	'echo-category-title-reverted' => 'Поништене {{PLURAL:$1|измене}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Спомињања}}',
	'echo-category-title-other' => '{{PLURAL:$1|Остало}}',
	'echo-category-title-system' => '{{PLURAL:$1|Систем}}',
	'echo-pref-tooltip-edit-user-talk' => 'Обавештава вас када неко остави поруку на вашој страници за разговор.',
	'echo-pref-tooltip-reverted' => 'Обавештава вас када неко поништи измену коју сте ви начинили.',
	'echo-pref-tooltip-mention' => 'Обавештава вас кад вас неко спомене на некој страници за разговор.',
	'echo-no-agent' => '[Нико]',
	'echo-no-title' => '[Нема странице]',
	'echo-error-no-formatter' => 'Није задато обликовање за обавештења',
	'notifications' => 'Обавештења',
	'tooltip-pt-notifications' => 'Ваша обавештења',
	'echo-specialpage' => 'Обавештења',
	'echo-anon' => 'Да би сте приступили овој страници морате се [$2 пријавити] или [$1 отворити налог].',
	'echo-none' => 'Немате обавештења',
	'echo-more-info' => 'Више информација',
	'notification-link-text-view-message' => 'Погледај поруку',
	'notification-link-text-view-mention' => 'Види спомињање',
	'notification-link-text-view-changes' => 'Погледај измене',
	'notification-link-text-view-page' => 'Погледај страницу',
	'notification-link-text-view-edit' => 'Погледај измену',
	'notification-edit-talk-page2' => '[[User:$1|$1]] вам је {{GENDER:$1|оставио|оставила}} поруку на вашој [[User talk:$2#$3|страници за разговор]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] вам је {{GENDER:$1|оставио|оставила}} поруку на вашој страници за разговор у „[[User talk:$2#$3|$4]]“.',
	'notification-edit-talk-page-flyout2' => '$1 вам је {{GENDER:$1|оставио|оставила}} поруку на вашој [[User talk:$2#$3|страници за разговор]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 вам је {{GENDER:$1|оставио|оставила}} поруку на вашој страници за разговор у „[[User talk:$2#$3|$4]]“.',
	'notification-page-linked' => 'Страница [[:$2]] је {{GENDER:$1|повезана}} са страницом [[:$3]]. [[Special:WhatLinksHere/$2|Погледајте све везе према овој страници]].',
	'notification-page-linked-flyout' => '$2 је {{GENDER:$1|повезана}} са [[:$3]].',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] је {{GENDER:$1|поставио|поставила}} нову тему „$2“ на [[$3]].',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] вам је {{GENDER:$1|послао|послала}} поруку: „[[$3#$2|$2]]“.',
	'notification-add-comment-yours2' => '[[User:$1|$1]] је {{GENDER:$1|прокоментарисао|прокоментарисала}} тему „[[$3#$2|$2]]“ на вашој страници за разговор.',
	'notification-mention' => '[[User:$1|$1]] вас је {{GENDER:$1|спомену|споменула}} на страници за разговор $5 у „[[$3#$2|$4]]“.',
	'notification-mention-flyout' => '$1 вас је {{GENDER:$1|споменуо|споменула}} на страници за разговор $5 у „[[$3#$2|$4]]“.',
	'notification-user-rights' => 'Ваша корисничка права [[Special:Log/rights/$1|су била {{GENDER:$1|промењена}}]] од стране [[User:$1|$1]]. $2. [[Special:ListGroupRights|Сазнајте више]]',
	'notification-user-rights-add' => 'Од сада сте члан {{PLURAL:$2|ове групе|ових група}}: $1',
	'notification-user-rights-remove' => 'Више нисте члан {{PLURAL:$2|ове групе|ових група}}: $1',
	'notification-reverted2' => '{{PLURAL:$4|Ваша измена на страници [[:$2]] је поништена|Ваше измене на страници [[:$2]] су поништене}} од стране {{GENDER:$1|корисника|кориснице}} [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Ваша измена на страници $2 је поништена|Ваше измене на страници $2 су поништене}} од стране {{GENDER:$1|корисника|кориснице}} $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 вам је {{GENDER:$1|оставио|оставила}} поруку на {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 вам је {{GENDER:$1|оставио|оставила}} поруку на вашој страници за разговор:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 вам је {{GENDER:$1|оставио|оставила}} поруку на вашој страници за разговор у „$2“.',
	'notification-page-linked-email-subject' => 'Ваша страница је повезана на {{SITENAME}}',
	'notification-page-linked-email-batch-body' => 'Страница $2 је {{GENDER:$1|повезана}} са $3.',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Ваша измена на страници $2 је поништена|Ваше измене на страници $2 су поништене}} од стране {{GENDER:$1|корисника|кориснице}} $1.',
	'notification-mention-email-subject' => '$1 вас је {{GENDER:$1|споменуо|споменула}} на {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 вас је {{GENDER:$1|споменуо|споменула}} на страници за разговор $4 у „$3“.',
	'notification-user-rights-email-subject' => 'Ваша корисничка права су се променила на {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Ваша корисничка права су {{GENDER:$1|промењена}} од стране $1. $2',
	'echo-email-subject-default' => 'Ново обавештење на {{SITENAME}}',
	'echo-email-body-default' => 'Имате ново обавештење на {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Имате ново обавештење.',
	'echo-overlay-link' => 'Сва обавештења',
	'echo-overlay-title' => '<b>Обавештења</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Обавештења}}</b> (приказ $1 од $2 непрочитаних)',
	'echo-mark-all-as-read' => 'Означи све прочитаним',
	'echo-date-today' => 'Данас',
	'echo-date-yesterday' => 'Јуче',
	'echo-load-more-error' => 'Дошло је до грешке при добављању више резултата.',
	'notification-page-linked-bundle' => 'Страница $2 је {{GENDER:$1|повезана}} са $3 и $4 {{PLURAL:$5|друге странице|других страница}}. [[Special:WhatLinksHere/$2|Погледајте све везе према овој страници]]',
	'echo-email-batch-subject-daily' => 'Имате {{PLURAL:$2|ново обавештење|нова обавештења}} на {{SITENAME}}',
	'echo-email-batch-link-text-view-all-notifications' => 'Погледај сва обавештења',
	'echo-rev-deleted-text-view' => 'Ова ревизија странице је потиснута.',
);

/** Serbian (Latin script) (srpski (latinica)‎)
 * @author Milicevic01
 */
$messages['sr-el'] = array(
	'echo-desc' => 'Obaveštajni sistem',
	'prefs-echo' => 'Obaveštenja',
	'prefs-emailsettings' => 'Postavke e-pošte',
	'prefs-displaynotifications' => 'Postavke prikaza',
	'prefs-echosubscriptions' => 'Obavesti me o sledećim događajima.',
	'prefs-newmessageindicator' => 'Indikator za nove poruke',
	'echo-pref-send-me' => 'Pošalji mi:',
	'echo-pref-send-to' => 'Pošalji na:',
	'echo-pref-email-format' => 'Format e-pošte:',
	'echo-pref-web' => 'Veb',
	'echo-pref-email' => 'Na e-poštu',
	'echo-pref-email-frequency-never' => 'Ne šalji mi obaveštenja na e-poštu',
	'echo-pref-email-frequency-immediately' => 'Pojedinačna obaveštenja čim se pojave',
	'echo-pref-email-frequency-daily' => 'Dnevni sažetak obaveštenja',
	'echo-pref-email-frequency-weekly' => 'Sedmični sažetak obaveštenja',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Čist tekst',
	'echo-pref-notify-show-link' => 'Prikaži obaveštenja u mojoj traci alatki',
	'echo-learn-more' => 'Saznajte više',
	'echo-new-messages' => 'Imate nove poruke',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Poruke}} na stranici za razgovor',
	'echo-category-title-reverted' => 'Poništene {{PLURAL:$1|izmene}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Spominjanja}}',
	'echo-category-title-other' => '{{PLURAL:$1|Ostalo}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistem}}',
	'echo-pref-tooltip-edit-user-talk' => 'Obaveštava vas kada neko ostavi poruku na vašoj stranici za razgovor.',
	'echo-pref-tooltip-reverted' => 'Obaveštava vas kada neko poništi izmenu koju ste vi načinili.',
	'echo-pref-tooltip-mention' => 'Obaveštava vas kad vas neko spomene na nekoj stranici za razgovor.',
	'echo-no-agent' => '[Niko]',
	'echo-no-title' => '[Nema stranice]',
	'echo-error-no-formatter' => 'Nije zadato oblikovanje za obaveštenja',
	'notifications' => 'Obaveštenja',
	'tooltip-pt-notifications' => 'Vaša obaveštenja',
	'echo-specialpage' => 'Obaveštenja',
	'echo-none' => 'Nemate obaveštenja',
	'echo-more-info' => 'Više informacija',
	'notification-link-text-view-message' => 'Pogledaj poruku',
	'notification-link-text-view-mention' => 'Vidi spominjanje',
	'notification-link-text-view-changes' => 'Pogledaj izmene',
	'notification-link-text-view-page' => 'Pogledaj stranicu',
	'notification-link-text-view-edit' => 'Pogledaj izmenu',
	'notification-edit-talk-page2' => '[[User:$1|$1]] vam je {{GENDER:$1|ostavio|ostavila}} poruku na vašoj [[User talk:$2#$3|stranici za razgovor]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] vam je {{GENDER:$1|ostavio|ostavila}} poruku na vašoj stranici za razgovor u „[[User talk:$2#$3|$4]]“.',
	'notification-edit-talk-page-flyout2' => '$1 vam je {{GENDER:$1|ostavio|ostavila}} poruku na vašoj [[User talk:$2#$3|stranici za razgovor]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 vam je {{GENDER:$1|ostavio|ostavila}} poruku na vašoj stranici za razgovor u „[[User talk:$2#$3|$4]]“.',
	'notification-page-linked' => 'Stranica [[:$2]] je {{GENDER:$1|povezana}} sa stranicom [[:$3]]. [[Special:WhatLinksHere/$2|Pogledajte sve veze prema ovoj stranici]].',
	'notification-page-linked-flyout' => '$2 je {{GENDER:$1|povezana}} sa [[:$3]].',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] je {{GENDER:$1|postavio|postavila}} novu temu „$2“ na [[$3]].',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] vam je {{GENDER:$1|poslao|poslala}} poruku: „[[$3#$2|$2]]“.',
	'notification-add-comment-yours2' => '[[User:$1|$1]] je {{GENDER:$1|prokomentarisao|prokomentarisala}} temu „[[$3#$2|$2]]“ na vašoj stranici za razgovor.',
	'notification-mention' => '[[User:$1|$1]] vas je {{GENDER:$1|spomenuo|spomenula}} na stranici za razgovor $5 u „[[$3#$2|$4]]“.',
	'notification-mention-flyout' => '$1 vas je {{GENDER:$1|spomenuo|spomenula}} na stranici za razgovor $5 u „[[$3#$2|$4]]“.',
	'notification-user-rights' => 'Vaša korisnička prava [[Special:Log/rights/$1|su bila {{GENDER:$1|promenjena}}]] od strane [[User:$1|$1]]. $2. [[Special:ListGroupRights|Saznajte više]]',
	'notification-user-rights-add' => 'Od sada ste član {{PLURAL:$2|ove grupe|ovih grupa}}: $1',
	'notification-user-rights-remove' => 'Više niste član {{PLURAL:$2|ove grupe|ovih grupa}}: $1',
	'notification-reverted2' => '{{PLURAL:$4|Vaša izmena na stranici [[:$2]] je poništena|Vaše izmene na stranici [[:$2]] su poništene}} od strane {{GENDER:$1|korisnika|korisnice}} [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Vaša izmena na stranici $2 je poništena|Vaše izmene na stranici $2 su poništene}} od strane {{GENDER:$1|korisnika|korisnice}} $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 vam je {{GENDER:$1|ostavio|ostavila}} poruku na {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 vam je {{GENDER:$1|ostavio|ostavila}} poruku na vašoj stranici za razgovor:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 vam je {{GENDER:$1|ostavio|ostavila}} poruku na vašoj stranici za razgovor u „$2“.',
	'notification-page-linked-email-subject' => 'Vaša stranica je povezana na {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2 je {{GENDER:$1|povezana}} sa $3.',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Vaša izmena na stranici $2 je poništena|Vaše izmene na stranici $2 su poništene}} od strane {{GENDER:$1|korisnika|korisnice}} $1.',
	'notification-mention-email-subject' => '$1 vas je {{GENDER:$1|spomenuо|spomenula}} na {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 vas je {{GENDER:$1|spomenuо|spomenula}} na stranici za razgovor $4 u „$3“.',
	'notification-user-rights-email-subject' => 'Vaša korisnička prava su se promenila na {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Vaša korisnička prava su {{GENDER:$1|promenjena}} od strane $1. $2',
	'echo-email-subject-default' => 'Novo obaveštenje na {{SITENAME}}',
	'echo-email-body-default' => 'Imate novo obaveštenje na {{SITENAME}}: 

$1',
	'echo-email-batch-body-default' => 'Imate novo obaveštenje.',
	'echo-overlay-link' => 'Sva obaveštenja',
	'echo-overlay-title' => '<b>Obaveštenja</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Obaveštenja}}</b> (prikaz $1 od $2 nepročitanih)',
	'echo-mark-all-as-read' => 'Označi sve pročitanim',
	'echo-date-today' => 'Danas',
	'echo-date-yesterday' => 'Juče',
	'echo-load-more-error' => 'Došlo je do greške pri dobavljanju više rezultata.',
	'notification-page-linked-bundle' => 'Stranica $2 je {{GENDER:$1|povezana}} sa $3 i $4 {{PLURAL:$5|druge stranice|drugih stranica}}. [[Special:WhatLinksHere/$2|Pogledajte sve veze prema ovoj stranici]]',
	'echo-email-batch-subject-daily' => 'Imate {{PLURAL:$2|novo obaveštenje|nova obaveštenja}} na {{SITENAME}}',
	'echo-email-batch-link-text-view-all-notifications' => 'Pogledaj sva obaveštenja',
	'echo-rev-deleted-text-view' => 'Ova revizija stranice je potisnuta.',
);

/** Swedish (svenska)
 * @author Ainali
 * @author Dcastor
 * @author Edvinw
 * @author Jopparn
 * @author Lejonel
 * @author Skalman
 * @author Tobulos1
 * @author WikiPhoenix
 */
$messages['sv'] = array(
	'echo-desc' => 'Meddelandesystem',
	'prefs-echo' => 'Meddelanden',
	'prefs-emailsettings' => 'E-postinställningar',
	'prefs-displaynotifications' => 'Visningsalternativ',
	'prefs-echosubscriptions' => 'Underrätta mig om dessa händelser',
	'prefs-newmessageindicator' => 'Indikator för nya meddelanden',
	'echo-pref-send-me' => 'Skicka mig:',
	'echo-pref-send-to' => 'Skicka till:',
	'echo-pref-email-format' => 'E-postformat:',
	'echo-pref-web' => 'Webb',
	'echo-pref-email' => 'E-post',
	'echo-pref-email-frequency-never' => 'Skicka mig inga meddelanden via e-post',
	'echo-pref-email-frequency-immediately' => 'Enskilda meddelanden efterhand som de kommer',
	'echo-pref-email-frequency-daily' => 'En daglig sammanställning av meddelanden',
	'echo-pref-email-frequency-weekly' => 'En veckovis sammanställning av meddelanden',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Oformaterad text',
	'echo-pref-notify-show-link' => 'Visa meddelanden i min verktygsrad',
	'echo-pref-new-message-indicator' => 'Visa symbolen för diskussionssidemeddelanden i min verktygsrad',
	'echo-learn-more' => 'Läs mer',
	'echo-new-messages' => 'Du har nya meddelanden',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Diskussionssidemeddelande|Diskussionssidemeddelanden}}',
	'echo-category-title-article-linked' => 'Sid{{PLURAL:$1|länk|länkar}}',
	'echo-category-title-reverted' => 'Redigerings{{PLURAL:$1|återställning|återställningar}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Omnämning|Omnämningar}}',
	'echo-category-title-other' => '{{PLURAL:$1|Annan|Andra}}',
	'echo-category-title-system' => '{{PLURAL:$1|System}}',
	'echo-pref-tooltip-edit-user-talk' => 'Meddela mig när någon lämnar ett meddelande eller svarar på min diskussionssida.',
	'echo-pref-tooltip-article-linked' => 'Meddela mig när någon länkar till en sida som jag skapat från en annan artikel.',
	'echo-pref-tooltip-reverted' => 'Meddela mig när någon återställer en ändring som jag gjort, med hjälp av verktygen "gör ogjord" eller "rulla tillbaka".',
	'echo-pref-tooltip-mention' => 'Meddela mig när någon länkar till min användarsida från någon diskussionssida.',
	'echo-no-agent' => '[Ingen]',
	'echo-no-title' => '[Ingen sida]',
	'echo-error-no-formatter' => 'Ingen formatering definierad för notifikation',
	'echo-error-preference' => 'Fel: Kunde inte spara användarvalet.',
	'echo-error-token' => 'Fel: Det gick inte att hämta användar-token.',
	'notifications' => 'Meddelanden',
	'tooltip-pt-notifications' => 'Dina meddelanden',
	'echo-specialpage' => 'Meddelanden',
	'echo-anon' => 'För att ta emot meddelanden, [$1 skapa ett konto] eller [$2 logga in].',
	'echo-none' => 'Du har inga meddelanden.',
	'echo-more-info' => 'Mer information',
	'echo-feedback' => 'Feedback',
	'notification-link-text-view-message' => 'Visa meddelande',
	'notification-link-text-view-mention' => 'Visa omnämnande',
	'notification-link-text-view-changes' => 'Visa ändringar',
	'notification-link-text-view-page' => 'Visa sida',
	'notification-link-text-view-edit' => 'Visa redigering',
	'notification-edit-talk-page2' => '[[User:$1|$1]] skrev ett inlägg på din [[User talk:$2#$3|diskussionssida]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] lämnade ett meddelande på din diskussionssida i "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 skrev ett inlägg på din [[User talk:$2#$3|diskussionssida]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 lämnade ett meddelande på din diskussionsida i "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => '[[:$2]] {{GENDER:$1|länkades}} från [[:$3]]. [[Special:WhatLinksHere/$2|Se alla länkar till denna sida]]',
	'notification-page-linked-flyout' => '$2 {{GENDER:$1|länkades}} från [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|kommenterade}} "[[$3|$2]]" på diskussionssidan för "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|postade}} ett nytt ämne "$2" på [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|skickade}} ett meddelande till dig: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|kommenterade}} om "[[$3#$2|$2]]" på din diskussionssida',
	'notification-mention' => '[[User:$1|$1]] nämnde dig på diskussionssidan $5 i "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 nämnde dig på diskussionssidan $5 i "[[$3#$2|$4]]".',
	'notification-mention-nosection' => '[[User:$1|$1]] {{GENDER:$1|nämnde}} dig på [[$3|$2 diskussionssidan]].',
	'notification-mention-nosection-flyout' => '$1 {{GENDER:$1|nämnde}} dig på [[$3|$2 diskussionssidan]].',
	'notification-user-rights' => 'Dina användarrättigheter [[Special:Log/rights/$1|ändrades]] av [[User:$1|$1]]. $2. [[Special:ListGroupRights|Läs mer]]',
	'notification-user-rights-flyout' => 'Dina användarrättigheter ändrades av $1. $2. [[Special:ListGroupRights|Läs mer]]',
	'notification-user-rights-add' => 'Du är nu medlem i {{PLURAL:$2|denna grupp|dessa grupper}}: $1',
	'notification-user-rights-remove' => 'Du är inte längre medlem i {{PLURAL:$2|denna grupp|dessa grupper}}: $1',
	'notification-new-user' => 'Välkommen till {{SITENAME}}, $1! Vi är glada att du är här.',
	'notification-reverted2' => '{{PLURAL:$4|Din redigering|Dina redigeringar}} på [[:$2]] har {{GENDER:$1|återställts}} av [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Din redigering|Dina redigeringar}} på $2 har {{GENDER:$1|återställts}} av $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|lämnade}} ett meddelande till dig på {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|lämnade}} ett meddelande på din diskussionssida:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 lämnade ett meddelande på din diskussionssida i "$2".',
	'notification-page-linked-email-subject' => 'Din sida länkades till på {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2 {{GENDER:$1|länkades}} från $3.',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Din redigering blev|Dina redigeringar blev}} {{GENDER:$1|återställda}} på {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Din redigering|Dina redigeringar}} på $2 har återställts av $1.',
	'notification-mention-email-subject' => '$1 nämnde dig på {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 nämnde dig på diskussionssidan $4 i "$3".',
	'notification-mention-nosection-email-batch-body' => '$1 {{GENDER:$1|nämnde}} dig på $2 diskussionssidan.',
	'notification-user-rights-email-subject' => 'Dina användarrättigheter har ändrats på {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'Dina användarrättigheter har ändrats av $1. $2.',
	'echo-email-subject-default' => 'Nytt meddelande på {{SITENAME}}',
	'echo-email-body-default' => 'Du har ett nytt meddelande på {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Du har ett nytt meddelande.',
	'echo-email-footer-default' => '$2

För att kontrollera vilken e-post vi skickar dig, kontrollera dina inställningar:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'För att kontrollera vilka meddelanden vi e-postar till dig, <a href="$2" style="text-decoration:none; color: #3868B0;">gå till dina inställningar</a><br />
$1',
	'echo-overlay-link' => 'Alla meddelanden',
	'echo-overlay-title' => '<b>Meddelanden</b>',
	'echo-overlay-title-overflow' => '<b>Meddelanden</b> (visar $1 av $2 {{PLURAL:$2|oläst|olästa}})',
	'echo-mark-all-as-read' => 'Markera alla som lästa',
	'echo-date-today' => 'Idag',
	'echo-date-yesterday' => 'Igår',
	'echo-load-more-error' => 'Ett fel uppstod när fler resultat skulle hämtas.',
	'notification-edit-talk-page-bundle' => '$1 och $3 {{PLURAL:$4|andra}} {{GENDER:$1|lämnade}} ett meddelande på din [[User talk:$2|diskussionssida]].',
	'notification-page-linked-bundle' => '$2 {{GENDER:$1|länkades}} från $3 och $4 {{PLURAL:$5|annan sida|andra sidor}}. [[Special:WhatLinksHere/$2|Se alla länkar till denna sida]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 och $2 {{PLURAL:$3|annan|andra}} lämnade ett meddelande på din diskussionssida.',
	'notification-page-linked-email-batch-bundle-body' => '$2 {{GENDER:$1|länkades}} från $3 och $4 {{PLURAL:$5|annan sida|andra sidor}}.',
	'echo-email-batch-subject-daily' => 'Du har {{PLURAL:$2|ett nytt meddelande|nya meddelanden}} på {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Du har {{PLURAL:$2|ett nytt meddelande|nya meddelanden}} på {{SITENAME}} den här veckan',
	'echo-email-batch-body-intro-daily' => 'Hej $1,
Här är en sammanfattning av dagens aktivitet på {{SITENAME}} för dig.',
	'echo-email-batch-body-intro-weekly' => 'Hej $1,
Här är en sammanfattning av veckans aktivitet på {{SITENAME}} för dig.',
	'echo-email-batch-link-text-view-all-notifications' => 'Visa alla meddelanden',
	'echo-rev-deleted-text-view' => 'Denna sidversion har dolts.',
);

/** Tamil (தமிழ்)
 * @author Jayarathina
 * @author Karthi.dr
 * @author Shanmugamp7
 * @author மதனாஹரன்
 */
$messages['ta'] = array(
	'echo-desc' => 'அறிவிப்பு முறைமை',
	'prefs-echo' => 'அறிவிப்புகள்',
	'prefs-emailsettings' => 'மின்னஞ்சல் விருப்பத்தேர்வுகள்',
	'prefs-echosubscriptions' => 'இந்த நிகழ்வுகளை பற்றி எனக்கு அறிவி',
	'prefs-newmessageindicator' => 'புதிய செய்தி குறிகாட்டி',
	'echo-pref-send-me' => 'எனக்கு இவற்றை அனுப்பவும்:',
	'echo-pref-send-to' => 'இம்மின்னஞ்சல் முகவரிக்கு அனுப்பவும்:',
	'echo-pref-email-format' => 'மின்னஞ்சல் வடிவமைப்பு:',
	'echo-pref-web' => 'இணையம்',
	'echo-pref-email' => 'மின்னஞ்சல்',
	'echo-pref-email-frequency-never' => 'எந்த மின்னஞ்சல் அறிவிப்புகளையும் எனக்கு அனுப்ப வேண்டாம்',
	'echo-pref-email-frequency-immediately' => 'ஒவ்வொரு அறிவிப்புகளையும் அதன் அறிவிப்பு நேரத்திலேயே',
	'echo-pref-email-frequency-daily' => 'தினமும் அறிவித்தல்களின் சுருக்கம்',
	'echo-pref-email-frequency-weekly' => 'அறிவிப்புகளின் இவ்வார சுறுக்கம்',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'வெற்று உரை',
	'echo-pref-notify-show-link' => 'என் கருவிப்பட்டியில் அறிவிப்புகளை காட்டு',
	'echo-pref-new-message-indicator' => 'என் கருவிப்பட்டியில் பேச்சு பக்க செய்திகளின் குறிகாட்டியினை காட்டு',
	'echo-learn-more' => 'மேலும் அறிய',
	'echo-new-messages' => 'உங்களுக்கு புதிய செய்திகள் உள்ளன',
	'echo-category-title-edit-user-talk' => 'பேச்சுப் பக்க {{PLURAL:$1|செய்தி|செய்திகள்}}',
	'echo-category-title-article-linked' => 'பக்க {{PLURAL:$1|இணைப்பு|இணைப்புகள்}}',
	'echo-category-title-mention' => '{{PLURAL:$1|குறித்தல்|குறித்தல்கள்}}',
	'echo-pref-tooltip-edit-user-talk' => 'என் பேச்சுப்பக்கத்தில் எனக்கு யாரேனும் செய்தி இட்டாலோ அல்லது மறுமொழி இட்டாலோ எனக்குத்தெரிவி',
	'echo-pref-tooltip-article-linked' => 'நான் உருவாக்கிய கட்டுரை பக்கத்துக்கு வேறு ஒரு பக்கத்திலிருந்து யாராவது இணைப்புகள் இட்டால் எனக்கு தெரிவி.',
	'echo-pref-tooltip-reverted' => 'நான் செய்த தொகுப்புகளை யாராவது மீளமை அல்லது முன்நிலையாக்குக கருவி கொண்டு மீளமைத்தால் எனக்கு தெரிவி.',
	'echo-pref-tooltip-mention' => 'என் பயனர் பக்கத்துக்கு வேறு ஒரு பேச்சுப்பக்கத்திலிருந்து யாராவது இணைப்புகள் இட்டால் எனக்கு தெரிவி.',
	'echo-no-agent' => '[யாருமில்லை]',
	'echo-no-title' => '[கட்டுரை இல்லை]',
	'echo-error-no-formatter' => 'அறிவிப்புகளுக்கு எந்த வடிவமைப்பும் வரையறுக்கப்படவில்லை.',
	'echo-error-preference' => 'பிழை: பயனர் விருப்ப தேர்வுகளை சேமிக்க இயவில்லை.',
	'notifications' => 'அறிவிப்புகள்',
	'tooltip-pt-notifications' => 'உங்கள் அறிவிப்புகள்',
	'echo-specialpage' => 'அறிவிப்புகள்',
	'echo-anon' => 'அறிவிப்புகளைப் பெறுவதற்கு [$1 ஒரு கணக்கை உருவாக்குங்கள்] அல்லது [$2 உள்நுழையுங்கள்].',
	'echo-none' => 'உங்களுக்கு அறிவிப்பு ஏதும் இல்லை.',
	'echo-more-info' => 'மேலதிக தகவல்',
	'echo-feedback' => 'கருத்து',
	'notification-link-text-view-message' => 'செய்தியினை பார்',
	'notification-link-text-view-mention' => 'குறித்திருப்பதைக்காண்க',
	'notification-link-text-view-changes' => 'மாற்றக்களை பார்',
	'notification-link-text-view-page' => 'பக்கத்தை பார்',
	'notification-link-text-view-edit' => 'தொகுப்பை பார்',
	'notification-edit-talk-page2' => '[[User:$1|$1]] உங்களுக்கு ஒரு செய்தியினை உங்களின் [[User talk:$2#$3|பேச்சுப்பக்கத்தில்]] {{GENDER:$1|விட்டுச்சென்றுள்ளார்}}.',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] உங்களுக்கு ஒரு செய்தியினை உங்களின் பேச்சுப்பக்கத்தின்  "[[User talk:$2#$3|$4]]இல்" {{GENDER:$1|விட்டுச்சென்றுள்ளார்}}.',
	'notification-edit-talk-page-flyout2' => '$1 ஒரு செய்தியினை உங்களின் [[User talk:$2#$3|பேச்சுப்பக்கத்தில்]] {{GENDER:$1|விட்டுச்சென்றுள்ளார்}}.',
	'notification-edit-talk-page-flyout-with-section' => '$1 ஒரு செய்தியினை உங்களின் பேச்சுப்பக்கத்தின் "[[User talk:$2#$3|$4]]இல்" {{GENDER:$1|விட்டுச்சென்றுள்ளார்}}.',
	'notification-new-user' => '$1 {{SITENAME}}க்கு உங்களை வரவேற்கிறோம்! உங்களின் வருகை எங்களுக்கு மகிழ்ச்சியளிக்கிறது.',
	'notification-reverted2' => 'உங்களால் {{PLURAL:$4|[[:$2]]இல் செய்யப்பட்ட தொகுப்பு|[[:$2]]இல் செய்யப்பட்ட தொகுப்புகள்}} [[User:$1|$1]]ஆல் {{GENDER:$1|மீளமைக்கப்பட்டுள்ளது}}. $3',
	'notification-reverted-flyout2' => 'உங்களால் {{PLURAL:$4|$2 இல் செய்யப்பட்ட தொகுப்பு|$2இல் செய்யப்பட்ட தொகுப்புகள்}} $1ஆல் {{GENDER:$1|மீளமைக்கப்பட்டுள்ளது}}. $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{SITENAME}}இல் உங்களுக்கு ஒரு புதிய செய்தியினை விட்டுச்சென்றுள்ளார்',
	'notification-edit-talk-page-email-batch-body2' => '$1 உங்களின் பேச்சுப்பக்கத்தில் ஒரு செய்தியினை விட்டுச்சென்றுள்ளார்:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 உங்களின் பேச்சுப்பக்கத்தில் ஒரு செய்தியினை விட்டுச்சென்றுள்ளார் "$2".',
	'notification-page-linked-email-subject' => '{{SITENAME}}இல் உங்கள் பக்கம் இணைக்கப்பட்டுள்ளது',
	'notification-page-linked-email-batch-body' => '$2 $3இல் {{GENDER:$1|lஇணைக்கப்பட்டுள்ளது}}.',
	'notification-reverted-email-subject2' => 'உங்களின் {{PLURAL:$3|தொகுப்பு|தொகுப்புகள்}} {{SITENAME}}இல் {{GENDER:$1|மீளமைக்கப்பட்டுள்ளது}}',
	'notification-reverted-email-batch-body2' => 'உங்களால் {{PLURAL:$3|$2இல் செய்யப்பட்ட தொகுப்பு|$2இல் செய்யப்பட்ட தொகுப்புகள்}} $1ஆல் {{GENDER:$1|மீளமைக்கப்பட்டுள்ளது}}',
	'notification-mention-email-subject' => '$1 உங்களை {{SITENAME}}இல் குறிப்பிட்டுள்ளார்',
	'notification-mention-email-batch-body' => '$1 உங்களை $4இன் பேச்சுப்பக்கத்தில் "$3" பகுதியில் குறிப்பிட்டுள்ளார்.',
	'echo-email-subject-default' => '{{SITENAME}}இல்  புதிய அறிவிப்புகள்',
	'echo-email-body-default' => '{{SITENAME}} இல் உங்களுக்கு ஒரு புதிய அறிவிப்பு உள்ளது:

$1',
	'echo-email-batch-body-default' => 'உங்களுக்கு ஒரு புதிய அறிவிப்பு உள்ளது',
	'echo-overlay-link' => 'எல்லா அறிவிப்புகள்',
	'echo-overlay-title' => '<b>அறிவிப்புகள்</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|அறிவிப்புகள்}}</b> ($2இல் பார்க்கப்படாத $1 காட்டப்படுகின்றது)',
	'echo-mark-all-as-read' => 'அனைத்தையும் படித்ததாய்க் குறித்துக் கொள்',
	'echo-date-today' => 'இன்று',
	'echo-date-yesterday' => 'நேற்று',
	'echo-load-more-error' => 'மேலும் முடிவுகளைப் பெறும்போது பிழை ஏற்பட்டுள்ளது.',
	'echo-email-batch-subject-daily' => '{{SITENAME}}இல் உங்களுக்கு {{PLURAL:$2|ஒரு புதிய செய்தி|புதிய செய்திகள்}} உள்ளன',
	'echo-email-batch-subject-weekly' => 'இவ்வாரம் {{SITENAME}}இல் உங்களுக்கு {{PLURAL:$2|ஒரு புதிய செய்தி|புதிய செய்திகள்}} உள்ளன',
	'echo-email-batch-body-intro-daily' => '$1,
{{SITENAME}}இல் உங்களுக்காக இன்றைய செயல்பாடுகளின் சுருக்கம் இதோ.',
	'echo-email-batch-body-intro-weekly' => '$1,
{{SITENAME}}இல் உங்களுக்காக இந்த வார செயல்பாடுகளின் சுருக்கம் இதோ.',
	'echo-email-batch-link-text-view-all-notifications' => 'எல்லா அறிவிப்புகளையும் பார்',
	'echo-rev-deleted-text-view' => 'பக்கத்தின் இந்த திருத்தம் மறைக்கப்பட்டுள்ளது.',
);

/** Telugu (తెలుగు)
 * @author Arjunaraoc
 * @author Veeven
 * @author Visdaviva
 * @author రహ్మానుద్దీన్
 * @author వైజాసత్య
 */
$messages['te'] = array(
	'echo-desc' => 'సూచన వ్యవస్థ',
	'prefs-echo' => 'సూచనలు',
	'prefs-emailsettings' => 'ఈ-మెయిల్ ఐచ్ఛికాలు',
	'prefs-displaynotifications' => 'ప్రదర్శన ఐచ్ఛికాలు',
	'prefs-echosubscriptions' => 'ఈ సంఘటనల గురించి నాకు తెలియచేయి',
	'prefs-newmessageindicator' => 'కొత్త సందేశపు సూచిక',
	'echo-pref-send-me' => 'నాకు పంపు:',
	'echo-pref-send-to' => 'పంపించు:',
	'echo-pref-email-format' => 'ఇమెయిల్ ఫార్మాట్:',
	'echo-pref-web' => 'అంతర్జాలం',
	'echo-pref-email' => 'ఈ-మెయిల్',
	'echo-pref-email-frequency-never' => 'నాకు ఈ-మెయిల్ సూచనలు పంపవద్దు',
	'echo-pref-email-frequency-immediately' => 'ఒక్కో సూచన వచ్చినది వచ్చినట్టుగా పంపు',
	'echo-pref-email-frequency-daily' => 'రోజువారి సూచనల సారాంశం',
	'echo-pref-email-frequency-weekly' => 'వారం మొత్తం మీద సూచనల సారాంశం',
	'echo-pref-email-format-html' => 'హెచ్.టి.ఎం.ఎల్',
	'echo-pref-email-format-plain-text' => 'సాదా పాఠ్యం',
	'echo-pref-notify-show-link' => 'నా టూల్‌బార్‌లో సూచనలను చూపించు',
	'echo-pref-new-message-indicator' => 'నా టూల్‌బార్‌లో చర్చా పేజీ సందేశ-సూచికను చూపించు',
	'echo-learn-more' => 'మరింత తెలుసుకోండి',
	'echo-new-messages' => 'మీకు కొత్త సందేశాలు ఉన్నాయి',
	'echo-category-title-edit-user-talk' => 'చర్చా పేజి {{PLURAL:$1|సందేశం|సందేశాలు}}',
	'echo-category-title-article-linked' => 'పేజి {{PLURAL:$1|లంకె|లంకెలు}}',
	'echo-category-title-reverted' => 'మార్చు {{PLURAL:$1|మళ్ళింపు|మళ్ళింపులు}}',
	'echo-category-title-mention' => '{{PLURAL:$1|పేరెన్నిక|పేరెన్నికలు}}',
	'echo-category-title-other' => '{{PLURAL:$1|ఇతర}}',
	'echo-category-title-system' => '{{PLURAL:$1|వ్యవస్థ}}',
	'echo-pref-tooltip-edit-user-talk' => 'నా చర్చా పేజీలో ఎవరైనా సందేశం వ్రాసినా లేదా జవాబిచ్చినా నాకు తెలియపరుచు.',
	'echo-pref-tooltip-article-linked' => 'నేను వ్యాసపు పేజీ నుండి సృష్టించిన పేజీని ఎవరయినా లంకె వేస్తే నాకు తెలియపరుచు.',
	'echo-pref-tooltip-reverted' => 'నా మార్పును ఎవరయినా రద్దు చేసినా లేదా రోల్ బ్యాక్ పరికరం వాడి వెనక్కు మళ్ళించినా, నాకు తెలియపరుచు.',
	'echo-pref-tooltip-mention' => 'ఎవరయినా నా వాడుకరి పేజీకి ఏదయినా చర్చా పేజీలో లంకె వేస్తే నాకు తెలియపరుచు.',
	'echo-no-agent' => '[ఎవరూ లేరు]',
	'echo-no-title' => '[ఏ పేజీ లేదు]',
	'echo-error-no-formatter' => 'సూచనకు ఎలాంటి ఆకృతి నిర్దేశించబడలేదు.',
	'echo-error-preference' => 'దోషం: వాడుకరి అభిరుచులు అమర్చడం కుదరలేదు.',
	'echo-error-token' => 'దోషం: వాడుకరి చిహ్నం తిరిగితేవటం కుదరలేదు.',
	'notifications' => 'సూచనలు',
	'tooltip-pt-notifications' => 'మీకు సూచనలు',
	'echo-specialpage' => 'సూచనలు',
	'echo-anon' => 'సూచనలు పొందటానికి [$1 ఖాతా తెరవండి] లేదా [$2 లోనికి రండి]',
	'echo-none' => 'మీకు ఏ సూచనలు లేవు',
	'echo-more-info' => 'మరింత సమాచారం',
	'echo-feedback' => 'ప్రతిస్పందన',
	'notification-link-text-view-message' => 'సందేశాన్ని చూడు',
	'notification-link-text-view-mention' => 'పేరెన్నికను చూడు',
	'notification-link-text-view-changes' => 'మార్పులు చూడు',
	'notification-link-text-view-page' => 'పేజీని చూడు',
	'notification-link-text-view-edit' => 'మార్పును చూడు',
	'notification-edit-talk-page2' => '[[User:$1|$1]] మీ [[User talk:$2#$3|చర్చా పేజీ]]పై  సందేశం {{GENDER:$1|చేర్చారు}}.',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]]  మీ చర్చా పేజీపై  "[[User talk:$2#$3|$4]]" వద్ద  ఒక సందేశాన్ని {{GENDER:$1|చేర్చారు}}.',
	'notification-edit-talk-page-flyout2' => '$1   మీ   [[User talk:$2#$3|చర్చాపేజీ]] పై  ఒక సందేశం {{GENDER:$1|చేర్చారు}}.',
	'notification-edit-talk-page-flyout-with-section' => '$1 మీ చర్చా పేజీలో "[[User talk:$2#$3|$4]]"  వద్ద ఒక సందేశాన్ని {{GENDER:$1|చేర్చారు}}.',
	'notification-page-linked' => '[[:$3]] నుండి [[:$2]]కి {{GENDER:$1|లంకె వేసారు}}.
[[Special:WhatLinksHere/$2|ఈ పేజీకి చేరుకోవటానికున్న అన్ని లంకెలను చూడు]].',
	'notification-page-linked-flyout' => '[[:$3]] నుండి $2 కి {{GENDER:$1|లంకె వేశారు}}.',
	'notification-add-comment2' => '[[User:$1|$1]] "$4" చర్చా పేజీలో  "[[$3|$2]]" పై {{GENDER:$1|వ్యాఖ్యానించారు}}.',
	'notification-add-talkpage-topic2' => ' [[User:$1|$1]]    [[$3]]  పై "$2" అనే ఒక కొత్త విషయాన్ని {{GENDER:$1|చేర్చారు}}.',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] మీకు {{GENDER:$1|పంపిన సందేశం}}: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]] మీ చర్చాపేజీలో "[[$3#$2|$2]]" వద్ద {{GENDER:$1|వ్యాఖ్యానించారు}}.',
	'notification-mention' => '[[User:$1|$1]] మిమ్మల్ని   $5 చర్చా పేజీ  పై "[[$3#$2|$4]]"వద్ద {{GENDER:$1|పేర్కొన్నారు}}.',
	'notification-mention-flyout' => '$1 మిమ్మల్ని  $5 చర్చా పేజీపై  "[[$3#$2|$4]]" వద్ద{{GENDER:$1|పేర్కొన్నారు}}.',
	'notification-user-rights' => 'మీ [[Special:Log/rights/$1|వాడుకరి హక్కులు ]] [[User:$1|$1]].$2 ద్వారా  {{GENDER:$1|మార్చబడ్డాయి}}. [[Special:ListGroupRights|మరింత తెలుసుకోండి]]',
	'notification-user-rights-flyout' => 'మీ వాడుకరి హక్కులను $1($2) {{GENDER:$1|మార్చారు}}. [[Special:ListGroupRights|మరింత తెలుసుకోండి]]',
	'notification-user-rights-add' => 'మీరిప్పుడు {{PLURAL:$2|ఈ సమూహం|ఈ సమూహాలలో}} సభ్యులు:$1',
	'notification-user-rights-remove' => 'మీరికపై {{PLURAL:$2|ఈ సమూహం|ఈ సమూహాలలో}} సభ్యులు కారు:$1',
	'notification-new-user' => '{{SITENAME}}కు స్వాగతం, $1! మీ రాక మాకెంతో సంతోషం సుమండీ.',
	'notification-reverted2' => '{{PLURAL:$4|[[:$2]] పై మీరు చేసిన మార్పు|[[:$2]] పై మీరు చేసిన మార్పులు}} [[User:$1|$1]]  ద్వారా {{GENDER:$1|రద్దు చేయబడ్డాయి}}.$3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|$2 పై మీ మార్పు|$2 పై మీ మార్పులు}} $1 ద్వారా {{GENDER:$1|రద్దు చేయబడ్డాయి}}. $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{SITENAME}} వద్ద మీకొక సందేశం {{GENDER:$1|రాశారు}}.',
	'notification-edit-talk-page-email-batch-body2' => '$1 మీ చర్చా పేజీ పై ఒక సందేశాన్ని {{GENDER:$1|రాసారు}}:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 మీ చర్చా పేజీలోని "$2" పై ఒక సందేశం {{GENDER:$1|రాసారు}}.',
	'notification-page-linked-email-subject' => 'మీ పేజీకి {{SITENAME}}లో లింకు ఇవ్వబడింది',
	'notification-page-linked-email-batch-body' => '$3 వద్ద నుండి $2 {{GENDER:$1|లింకు చేయబడ్డారు}}',
	'notification-reverted-email-subject2' => '{{SITENAME}} వద్ద మీ {{PLURAL:$3|మార్పు|మార్పులు}} {{GENDER:$1|వెనక్కి మళ్ళించ}}  {{PLURAL:$3|బడింది|బడ్డాయి}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|$2 పై మీ మార్పు|$2 పై మీ మార్పులు}} $1 ద్వారా {{GENDER:$1|రద్దు చేయబడ్డాయి}}.',
	'notification-mention-email-subject' => '$1 మిమ్మల్ని {{SITENAME}} లో {{GENDER:$1|పేర్కొన్నారు}}.',
	'notification-mention-email-batch-body' => '$1 మిమ్మల్ని $4 చర్చా పేజీలో "$3" వద్ద {{GENDER:$1|పేర్కొన్నారు}}.',
	'notification-user-rights-email-subject' => '{{SITENAME}}లో మీ వాడుకరి హక్కులు మారినవి',
	'notification-user-rights-email-batch-body' => 'మీ వాడుకరి హక్కులను $1.$2 {{GENDER:$1|మార్చారు}}.',
	'echo-email-subject-default' => '{{SITENAME}} వద్ద కొత్త సూచన',
	'echo-email-body-default' => '{{SITENAME}} వద్ద మీకొక కొత్త సూచన ఉన్నది : 

$1',
	'echo-email-batch-body-default' => 'మీకొక కొత్త సూచన ఉంది.',
	'echo-email-footer-default' => '$2

మీకు ఏ ఏ ఈ-మెయిళ్లు పంపించాలో నియంత్రించడానికి, మీ అభిరుచులను చూడండి:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'మీకు మేము ఏ ఏ ఈ-మెయిళ్లు పంపించాలో నియంత్రించడానికి, <a href="$2" style="text-decoration:none; color: #3868B0;">మీ అభిరుచులను చూడండి</a>.<br />
$1',
	'echo-overlay-link' => 'అన్ని సూచనలు',
	'echo-overlay-title' => '<b>సూచనలు</b>',
	'echo-overlay-title-overflow' => '<b> {{PLURAL:$1|సూచనలు}}</b> (చదవని $2 లో $1 వది)',
	'echo-mark-all-as-read' => 'అన్నిటినీ చదివినవిగా గుర్తించు',
	'echo-date-today' => 'ఈరోజు',
	'echo-date-yesterday' => 'నిన్న',
	'echo-load-more-error' => 'మరిన్ని ఫలితాలు తెచ్చి చూపడంలో దోషం జరిగింది.',
	'notification-edit-talk-page-bundle' => '$1 మరియు మరో $3 {{PLURAL:$4|వ్యక్తి|వ్యక్తులు}}  మీ [[User talk:$2|వాడుకరి చర్చా పేజీ]]లో సందేశం {{GENDER:$1| చేర్చారు}}.',
	'notification-page-linked-bundle' => '$3 మరియు $4 ఇతర {{PLURAL:$5|పేజీ|పేజీల}} నుండి $2  {{GENDER:$1|లింకు చేయబడ్డారు}}. [[Special:WhatLinksHere/$2|ఈ పేజీకి చేర్చే అన్ని లింకులను చూడు]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 మరియు $2 {{PLURAL:$3|ఇతర వ్యక్తి|ఇతరులు}} మీ చర్చా పేజీలో ఒక సందేశం {{GENDER:$1|రాసారు}}.',
	'notification-page-linked-email-batch-bundle-body' => '$3 మరియు $4 ఇతర {{PLURAL:$5|పేజీ|పేజీల}} నుండి $2కు {{GENDER:$1|లింకు వేశారు}}',
	'echo-email-batch-subject-daily' => 'మీకు {{SITENAME}} వద్ద {{PLURAL:$2|కొత్త సూచన ఉంది|కొత్త సందేశాలు ఉన్నాయి}}',
	'echo-email-batch-subject-weekly' => 'మీకు ఈ వారం {{SITENAME}} లో {{PLURAL:$2|కొత్త సూచన ఉంది|కొత్త సూచనలుఉన్నాయి}}',
	'echo-email-batch-body-intro-daily' => 'నమస్కారం $1 గారూ,
మీ కోసం {{SITENAME}}లో ఈ రోజు జరిగిన సంగతుల యొక్క సారాంశం ఇక్కడ సమకూరుస్తున్నాం.',
	'echo-email-batch-body-intro-weekly' => 'నమస్కారం $1 గారూ,
మీ కోసం {{SITENAME}}లో ఈ వారం జరిగిన సంగతుల యొక్క సారాంశం ఇక్కడ సమకూరుస్తున్నాం.',
	'echo-email-batch-link-text-view-all-notifications' => 'అన్ని సూచనలు చూడు',
	'echo-rev-deleted-text-view' => 'ఈ పేజీ మార్పు అణచబడింది',
);

/** Thai (ไทย)
 * @author Nullzero
 * @author Supasate
 */
$messages['th'] = array(
	'echo-desc' => 'ระบบแจ้งเตือน',
	'prefs-echo' => 'การแจ้งเตือน',
	'prefs-emailsettings' => 'ตัวเลือกอีเมล',
	'prefs-displaynotifications' => 'ตัวเลือกการแสดงผล',
	'prefs-echosubscriptions' => 'แจ้งให้ฉันทราบเกี่ยวกับเหตุการณ์นี้',
	'prefs-newmessageindicator' => 'ตัวบ่งชี้ข้อความใหม่',
	'echo-pref-send-to' => 'ส่งถึง:',
	'echo-pref-email-format' => 'รูปแบบอีเมล:',
	'echo-pref-web' => 'เว็บ',
	'echo-pref-email' => 'อีเมล',
	'echo-pref-email-frequency-never' => 'ไม่ส่งการแจ้งเตือนทางอีเมล์ใดๆ',
	'echo-pref-email-frequency-immediately' => 'การแจ้งเตือนแบบแยกสำหรับทุกเหตุการณ์ทันทีที่เกิดขึ้น',
	'echo-pref-email-frequency-daily' => 'การแจ้งเตือนแบบสรุปรายวัน',
	'echo-pref-email-frequency-weekly' => 'การแจ้งเตือนแบบสรุปรายสัปดาห์',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'ข้อความล้วน',
	'echo-pref-notify-show-link' => 'แสดงการแจ้งเตือนในแถบเครื่องมือของฉัน',
	'echo-pref-new-message-indicator' => 'แสดงตัวบ่งชี้ข้อความในหน้าพูดคุยในแถบเครื่องมือของฉัน',
	'echo-learn-more' => 'เรียนรู้เพิ่มเติม',
	'echo-new-messages' => 'คุณมีข้อความใหม่',
	'echo-category-title-edit-user-talk' => 'หน้าพูดคุย {{PLURAL:$1| ข้อความ|ข้อความ}}',
	'echo-category-title-article-linked' => 'หน้า {{PLURAL:$1|ลิงก์|ลิงก์}}',
	'echo-category-title-reverted' => 'การแก้ไข {{PLURAL:$1| ย้อนกลับ|ย้อนกลับ}}',
	'echo-category-title-mention' => '{{PLURAL:$1|การกล่าวถึง|การกล่าวถึง}}',
	'echo-category-title-other' => '{{PLURAL:$1|อื่นๆ}}',
	'echo-category-title-system' => '{{PLURAL:$1|ระบบ}}',
	'echo-pref-tooltip-edit-user-talk' => 'แจ้งเตือนเมื่อมีคนโพสต์ข้อความ หรือตอบในหน้าพูดคุยของฉัน',
	'echo-pref-tooltip-article-linked' => 'แจ้งเตือนฉันเมื่อมีคนลิงก์ถึงหน้าบทความที่ฉันสร้าง',
	'echo-pref-tooltip-reverted' => 'แจ้งเตือนฉันเมื่อมีคนย้อนการแก้ไข โดยใช้เครื่องมือยกเลิกหรือย้อนกลับการแก้ไข',
	'echo-pref-tooltip-mention' => 'แจ้งเตือนฉันเมื่อมีคนลิงก์หน้าผู้ใช้ของฉันจากหน้าพูดคุยใด ๆ',
	'echo-no-agent' => '[คน]',
	'echo-no-title' => '[หน้า]',
	'echo-error-no-formatter' => 'ไม่มีรูปแบบที่กำหนดไว้สำหรับการแจ้งเตือน',
	'echo-error-preference' => 'ข้อผิดพลาด: ไม่สามารถตั้งค่าการกำหนดลักษณะผู้ใช้',
	'echo-error-token' => 'ข้อผิดพลาด: ไม่สามารถเรียกโทเค็นผู้ใช้',
	'notifications' => 'การแจ้งเตือน',
	'tooltip-pt-notifications' => 'การแจ้งเตือนของคุณ',
	'echo-specialpage' => 'การแจ้งเตือน',
	'echo-anon' => 'ถ้าต้องการรับการแจ้งเตือน [$1 สร้างบัญชีผู้ใช้] หรือ [$2 เข้าสู่ระบบ]',
	'echo-none' => 'คุณไม่มีการแจ้งเตือนในขณะนี้',
	'echo-more-info' => 'ข้อมูลเพิ่มเติม',
	'echo-feedback' => 'คำติชม',
	'notification-link-text-view-message' => 'ดูข้อความ',
	'notification-link-text-view-mention' => 'ดูการกล่าวถึง',
	'notification-link-text-view-changes' => 'ดูความเปลี่ยนแปลง',
	'notification-link-text-view-page' => 'ดูหน้า',
	'notification-link-text-view-edit' => 'ดูการแก้ไข',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|ฝาก}}ข้อความไว้บน[[User talk:$2#$3|หน้าพูดคุย]]ของคุณ',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|ฝาก}}ข้อความบนหน้าพูดคุยของคุณที่ "[[User talk:$2#$3|$4]]".',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 * @author Sky Harbor
 * @author TheSleepyhollow02
 */
$messages['tl'] = array(
	'echo-desc' => 'Sistema ng pagpapabatid',
	'prefs-echo' => 'Mga pagpapabatid',
	'prefs-emailsettings' => 'Mga kagustuhan para sa e-liham',
	'prefs-displaynotifications' => 'Mga kagustuhan sa pagpapakita',
	'prefs-echosubscriptions' => 'Ipabatid ako tungkol sa mga pangyayaring ito',
	'prefs-newmessageindicator' => 'Indikador ng mga bagong mensahe',
	'echo-pref-send-me' => 'Ipadala sa akin:',
	'echo-pref-send-to' => 'Ipadala kay:',
	'echo-pref-email-format' => 'Kaanyuan ng e-liham:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-liham',
	'echo-pref-email-frequency-never' => 'Huwag magpadala sa akin ng anumang pabatid sa e-liham',
	'echo-pref-email-frequency-immediately' => 'Mga indibiduwal na pabatid nang papasok ito',
	'echo-pref-email-frequency-daily' => 'Isang arawang buod ng mga pabatid',
	'echo-pref-email-frequency-weekly' => 'Isang lingguhang buod ng mga pabatid',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Purong teksto',
	'echo-pref-notify-show-link' => 'Ipakita ang mga pabatid sa aking toolbar',
	'echo-pref-new-message-indicator' => 'Ipakita ang indikador ng mga mensaheng pampahinang usapan sa aking toolbar',
	'echo-learn-more' => 'Matuto pa',
	'echo-new-messages' => 'Mayroon kang mga bagong mensahe',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Mensahe|Mga mensahe}} sa pahinang usapan',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Kawing|Mga kawing}} sa pahina',
	'echo-category-title-mention' => '{{PLURAL:$1|Banggit|Mga banggit}}',
	'echo-category-title-other' => '{{PLURAL:$1|Iba}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistema}}',
	'echo-pref-tooltip-edit-user-talk' => 'Ipabatid sa akin kung may nagpaskil ng mensahe o may tumugon sa aking pahinang usapan.',
	'echo-pref-tooltip-article-linked' => 'Ipabatid sa akin kung may kumawing sa pahinang inilika ko mula sa isang pahina ng artikulo.',
	'echo-pref-tooltip-mention' => 'Ipabatid sa aking kung may kumawing sa aking pahina ng tagagamit mula sa anumang pahinang usapan.',
	'echo-no-agent' => '[Wala sinuman]',
	'echo-no-title' => '[Walang pahina]',
	'echo-error-no-formatter' => 'Walang itinakdang anyo para sa pabatid.',
	'echo-error-preference' => 'Kamalian: Hindi maitakda ang kagustuhan ng tagagamit.',
	'notifications' => 'Mga pagpapabatid',
	'tooltip-pt-notifications' => 'Mga pabatid mo',
	'echo-specialpage' => 'Mga pabatid',
	'echo-anon' => 'Upang makatanggap ng mga pagpapabatid, [$1 lumikha ng isang akawnt] o [$2 lumagdang papasok].',
	'echo-none' => 'Wala kang mga pabatid.',
	'echo-more-info' => 'Karagdagang impormasyon',
	'echo-feedback' => 'Komentaryo',
	'notification-link-text-view-message' => 'Ipakita ang mensahe',
	'notification-link-text-view-mention' => 'Ipakita ang pagbanggit',
	'notification-link-text-view-changes' => 'Ipakita ang pagbabago',
	'notification-link-text-view-page' => 'Ipakita ang pahina',
	'notification-link-text-view-edit' => 'Ipakita ang pagbabago',
	'notification-edit-talk-page2' => '{{GENDER:$1|Nag-iwan}} si [[User:$1|$1]] ng mensahe sa iyong [[User talk:$2#$3|pahinang usapan]].',
	'notification-edit-talk-page-with-section' => '{{GENDER:$1|Nag-iwan}} si [[User:$1|$1]] ng mensahe sa iyong pahinang usapan sa seksiyong "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '{{GENDER:$1|Nag-iwan}} si $1 ng mensahe sa iyong [[User talk:$2#$3|pahinang usapan]].',
	'notification-edit-talk-page-flyout-with-section' => '{{GENDER:$1|Nag-iwan}} si $1 ng mensahe sa iyong pahinang usapan sa seksiyong "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => '{{GENDER:$1|Ikinawing}} ang [[:$2]] mula sa [[:$3]].  [[Special:WhatLinksHere/$2|Tingnan ang lahat ng kawing patungo sa pahinang ito.]]',
	'notification-page-linked-flyout' => '{{GENDER:$1|Ikinawing}} ang $2 mula sa [[:$3]].',
	'notification-add-comment2' => '{{GENDER:$1|Nagkomento}} si [[User:$1|$1]] sa seksiyong "[[$3|$2]]" ng pahinang usapan ng "$4".',
	'notification-add-talkpage-topic-yours2' => '{{GENDER:$1|Ipinadala}} ka ni [[User:$1|$1]] ng mensahe: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '{{GENDER:$1|Nagkomento}} si [[User:$1|$1]] sa seksiyong "[[$3#$2|$2]]" sa iyong pahinang usapan.',
	'notification-mention' => '{{GENDER:$1|Binanggit}} ka ni [[User:$1|$1]] sa pahinang usapan ng $5 sa seksiyong "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '{{GENDER:$1|Binanggit}} ka ni $1 sa pahinang usapan ng $5 sa seksiyong "[[$3#$2|$4]]".',
	'notification-user-rights' => '[[Special:Log/rights/$1|{{GENDER:$1|Binago}}]] ni [[User:$1|$1]] ang iyong mga karapatang pantagagamit. $2. [[Special:ListGroupRights|Matuto pa]]',
	'notification-user-rights-flyout' => '{{GENDER:$1|Binago}} ni $1 ang iyong mga karapatang pantagagamit. $2. [[Special:ListGroupRights|Matuto pa]]',
	'notification-user-rights-add' => 'Kasapi ka na ng {{PLURAL:$2|grupong ito|mga grupong ito}}: $1',
	'notification-user-rights-remove' => 'Hindi ka na kasapi ng {{PLURAL:$2|grupong ito|mga grupong ito}}: $1',
	'notification-new-user' => 'Maligayang pagdating sa {{SITENAME}}, $1!  Masaya kami na nandito ka.',
	'notification-edit-talk-page-email-subject2' => '{{GENDER:$1|Nag-iwan}} si $1 ng mensahe para sa iyo sa {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '{{GENDER:$1|Nag-iwan}} si $1 ng mensahe sa iyong pahinang usapan:',
	'notification-edit-talk-page-email-batch-body-with-section' => '{{GENDER:$1|Nag-iwan}} si $1 ng mensahe sa iyong pahinang usapan sa "$2".',
	'notification-page-linked-email-subject' => 'Ikinawing ang pahina mo sa {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '{{GENDER:$1|Ikinawing}} ang $2 mula sa $3.',
	'notification-mention-email-subject' => '{{GENDER:$1|Binanggit}} ka ni $1 sa {{SITENAME}}',
	'notification-mention-email-batch-body' => '{{GENDER:$1|Binanggit}} ka ni $1 sa pahinang usapan ng $4 sa seksiyong "$3".',
	'notification-user-rights-email-subject' => 'Nagbago ang iyong mga karapatang pantagagamit sa {{SITENAME}}',
	'notification-user-rights-email-batch-body' => '{{GENDER:$1|Binago}} ni $1 ang iyong karapatang pantagagamit. $2.',
	'echo-email-subject-default' => 'Bagong pabatid sa {{SITENAME}}',
	'echo-email-body-default' => 'Mayroon kang isang bagong pagpapabatid doon sa {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'May bago kang pabatid.',
	'echo-email-footer-default' => '$2

Upang makontrol mo ang mga e-liham na ipinapadala namin sa iyo, tingnan ang iyong mga kagustuhan: {{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Upang makontrol mo ang mga e-liham na ipinapadala namin sa iyo, <a href="$2" style="text-decoration:none; color: #3868B0;">tingnan ang iyong mga kagustuhan</a>.<br />
$1',
	'echo-overlay-link' => 'Lahat ng mga pabatid',
	'echo-overlay-title' => '<b>Mga pabatid</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Mga pabatid}}</b> (ipinapakita ang $1 ng $2 hindi pa nababasa)',
	'echo-mark-all-as-read' => 'Tatakan ang lahat bilang nabasa na',
	'echo-date-today' => 'Ngayon',
	'echo-date-yesterday' => 'Kahapon',
	'notification-edit-talk-page-bundle' => '{{GENDER:$1|Nag-iwan}} sina $1 at $3 {{PLURAL:$4|iba pa}} ng mensahe sa iyong [[User talk:$2|pahinang usapan]].',
	'notification-page-linked-bundle' => '{{GENDER:$1|Ikinawing}} ang $2 mula sa $3 at $4 ibang {{PLURAL:$5|pahina}}.  [[Special:WhatLinksHere/$2|Tingnan ang lahat ng kawing patungo sa pahinang ito]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '{{GENDER:$1|Nag-iwan}} sina $1 at $2 {{PLURAL:$3|iba pa}} ng mensahe sa iyong pahinang usapan.',
	'notification-page-linked-email-batch-bundle-body' => '{{GENDER:$1|Ikinawing}} ang $2 mula sa $3 at $4 ibang {{PLURAL:$5|pahina}}.',
	'echo-email-batch-subject-daily' => 'May {{PLURAL:$2|bago kang pabatid|mga bago kang pabatid}} sa {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'May {{PLURAL:$2|bago kang pabatid|mga bago kang pabatid}} sa {{SITENAME}} ngayong linggo',
	'echo-email-batch-body-intro-daily' => 'Magandang araw $1,
Ito ang buod ng mga gawain ngayon sa {{SITENAME}} para sa iyo.',
	'echo-email-batch-body-intro-weekly' => 'Magandang araw $1,
Ito ang buod ng mga gawain ngayong linggo sa {{SITENAME}} para sa iyo.',
	'echo-email-batch-link-text-view-all-notifications' => 'Tingnan ang lahat ng pabatid',
);

/** Turkish (Türkçe)
 * @author Emperyan
 * @author Incelemeelemani
 * @author Joseph
 * @author Meelo
 * @author Rapsar
 */
$messages['tr'] = array(
	'echo-desc' => 'Bildirim sistemi',
	'prefs-echo' => 'Bildirimler',
	'prefs-emailsettings' => 'E-posta seçenekleri',
	'prefs-displaynotifications' => 'Görüntüleme seçenekleri',
	'prefs-echosubscriptions' => 'Bu olaylar hakkında bildir',
	'prefs-newmessageindicator' => 'Yeni ileti bildirimi',
	'echo-pref-send-me' => 'Bana gönder:',
	'echo-pref-send-to' => 'Şuna gönder:',
	'echo-pref-email-format' => 'E-posta biçimi:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-posta',
	'echo-pref-email-frequency-never' => 'Bana e-posta bildirimi gönderme',
	'echo-pref-email-frequency-immediately' => 'Tüm iletiler',
	'echo-pref-email-frequency-daily' => 'İletilerin günlük özeti',
	'echo-pref-email-frequency-weekly' => 'İletilerin haftalık özeti',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Düz metin',
	'echo-pref-notify-show-link' => 'Bildirimleri araç çubuğumda göster',
	'echo-pref-new-message-indicator' => 'Mesaj sayfamın yerine mesaj göstergesi araç çubuğunu göster',
	'echo-learn-more' => 'Daha fazla bilgi',
	'echo-new-messages' => 'Yeni mesajınız var',
	'echo-category-title-edit-user-talk' => 'Tartışma sayfası {{PLURAL:$1|mesajı|mesajları}}',
	'echo-category-title-article-linked' => 'Sayfa {{PLURAL:$1|bağlantısı|bağlantıları}}',
	'echo-category-title-reverted' => 'Değişiklik {{PLURAL:$1|iptali|iptalleri}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Bahsetme|Bahsetmeler}}',
	'echo-category-title-other' => '{{PLURAL:$1|Diğer}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistem}}',
	'echo-pref-tooltip-edit-user-talk' => 'Bir kullanıcı mesaj sayfamı değiştirdiğinde bunu bana bildir.',
	'echo-pref-tooltip-article-linked' => 'Oluşturduğum sayfalarda değişiklik yapıldığında bana bildir.',
	'echo-pref-tooltip-reverted' => 'Düzenleme yapıldıktan sonra geri alındığı takdirde bu durumu bana bildir.',
	'echo-pref-tooltip-mention' => 'Herhangi bir tartışma sayfasında kullanıcı adıma bağlantı verildiğinde bunu bana bildir.',
	'echo-no-agent' => '[Kimse]',
	'echo-no-title' => '[Sayfa yok]',
	'echo-error-no-formatter' => 'Hiçbir bildirim için biçim tanımlanmamış.',
	'echo-error-preference' => 'Hata: Kullanıcı tercihi ayarlanamadı.',
	'echo-error-token' => 'Hata: Kullanıcı anahtarı alınamadı.',
	'notifications' => 'Bildirimler',
	'tooltip-pt-notifications' => 'Bildirimleriniz',
	'echo-specialpage' => 'Bildirimler',
	'echo-anon' => 'Bildirimlere ulaşabilmek için, [$1 hesap oluşturun] ya da [$2 giriş yapın].',
	'echo-none' => 'Bildiriminiz bulunmuyor.',
	'echo-more-info' => 'Daha fazla bilgi',
	'echo-feedback' => 'Geri bildirim',
	'notification-link-text-view-message' => 'Mesajı görüntüle',
	'notification-link-text-view-mention' => 'Bahsi görüntüle',
	'notification-link-text-view-changes' => 'Değişiklikleri görüntüle',
	'notification-link-text-view-page' => 'Sayfayı görüntüle',
	'notification-link-text-view-edit' => 'Değişikliği görüntüle',
	'notification-edit-talk-page2' => '[[User:$1|$1]], [[User talk:$2#$3|mesaj sayfanıza]] yeni bir mesaj {{GENDER:$1|bıraktı}}.',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]], mesaj sayfanızın "[[User talk:$2#$3|$4]]" başlığına bir mesaj {{GENDER:$1|bıraktı}}.',
	'notification-edit-talk-page-flyout2' => '$1, [[User talk:$2#$3|mesaj sayfanıza]] bir mesaj {{GENDER:$1|bıraktı}}.',
	'notification-edit-talk-page-flyout-with-section' => '$1, mesaj sayfanızdaki "[[User talk:$2#$3|$4]]" başlığına bir mesaj {{GENDER:$1|bıraktı}}.',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] size bir mesaj {{GENDER:$1|gönderdi}}: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]], mesaj sayfanızdaki "[[$3#$2|$2]]" konusuna {{GENDER:$1|yorum yaptı}}.',
	'notification-mention' => '[[User:$1|$1]], $5 sayfasının tartışma sayfasının "[[$3#$2|$4]]" başlığında sizden {{GENDER:$1|bahsetti}}.',
	'notification-mention-flyout' => '$1, $5 sayfasının tartışma sayfasının "[[$3#$2|$4]]" başlığında sizden {{GENDER:$1|bahsetti}}.',
	'notification-user-rights' => 'Kullanıcı haklarınız [[User:$1|$1]] tarafından [[Special:Log/rights/$1|{{GENDER:$1|değiştirildi}}]]. $2. [[Special:ListGroupRights|Daha fazla bilgi]]',
	'notification-user-rights-add' => 'Artık {{PLURAL:$2|bu grubun|bu grupların}} üyesisiniz: $1',
	'notification-user-rights-remove' => 'Artık {{PLURAL:$2|bu grubun|bu grupların}} üyesi değilsiniz: $1',
	'notification-new-user' => 'Hoş geldin $1! Sizi burada görmekten memnun olduk.',
	'notification-reverted2' => '{{PLURAL:$4|[[:$2]] sayfasındaki değişikliğiniz|[[:$2]] sayfasındaki değişiklikleriniz}} [[User:$1|$1]] tarafından {{GENDER:$1|geri alındı}}. $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|$2 sayfasındaki değişikliğiniz|$2 sayfasındaki değişiklikleriniz}}, $1 tarafından {{GENDER:$1|geri alındı}}. $3',
	'notification-edit-talk-page-email-subject2' => '$1, {{SITENAME}} sayfasında size bir mesaj {{GENDER:$1|bıraktı}}',
	'notification-edit-talk-page-email-batch-body2' => '$1, mesaj sayfanıza bir mesaj {{GENDER:$1|bıraktı}}:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1, mesaj sayfanızın "$2" başlığında bir mesaj {{GENDER:$1|bıraktı}}.',
	'notification-page-linked-email-subject' => 'Sayfanıza {{SITENAME}} sitesinde bağlantı verildi',
	'notification-mention-email-subject' => '$1, {{SITENAME}} sitesinde sizden {{GENDER:$1|bahsetti}}',
	'notification-mention-email-batch-body' => '$1, $4 sayfasının tartışma sayfasının "$3" başlığında sizden {{GENDER:$1|bahsetti}}.',
	'notification-user-rights-email-subject' => '{{SITENAME}} için kullanıcı hakları değişmiştir',
	'notification-user-rights-email-batch-body' => 'Kullanıcı haklarınız $1 tarafından {{GENDER:$1|değiştirildi}}. $2',
	'echo-email-subject-default' => '{{SITENAME}} için yeni bildirim',
	'echo-email-body-default' => '{{SITENAME}} için yeni bildiriminiz var:

$1',
	'echo-email-batch-body-default' => 'Yeni bir bildiriminiz var',
	'echo-overlay-link' => 'Bütün bildirimler',
	'echo-overlay-title' => '<b>Bildirimler</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Bildirimler}}</b>  ($2 okunmayandan $1 adeti gösteriliyor)',
	'echo-mark-all-as-read' => 'Tümünü okundu olarak işaretle',
	'echo-date-today' => 'Bugün',
	'echo-date-yesterday' => 'Dün',
	'echo-load-more-error' => 'Daha fazla sonuç oluşturma esnasında bir hata oluştu.',
	'notification-edit-talk-page-bundle' => '$1 ve diğer $3 {{PLURAL:$4|kullanıcı}}, [[User talk:$2|mesaj sayfanıza]] bir mesaj {{GENDER:$1|bıraktı}}.',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 ve diğer $2 {{PLURAL:$3|kullanıcı}}, mesaj sayfanıza bir mesaj {{GENDER:$1|bıraktı}}.',
	'echo-email-batch-subject-daily' => '{{SITENAME}} sitesinde {{PLURAL:$2|yeni bir bildiriminiz|yeni bildirimleriniz}} var',
	'echo-email-batch-subject-weekly' => 'Bu hafta {{SITENAME}} sitesinde {{PLURAL:$2|yeni bir bildiriminiz|yeni bildirimleriniz}} var',
	'echo-email-batch-body-intro-daily' => 'Merhaba $1,
Burada {{SITENAME}} için bu günün etkinlik özetini bulabilirsiniz.',
	'echo-email-batch-body-intro-weekly' => 'Merhaba $1,
Burada {{SITENAME}} için bu haftaki etkinlik özetini bulabilirsiniz.',
	'echo-email-batch-link-text-view-all-notifications' => 'Tüm bildirimleri göster',
	'echo-rev-deleted-text-view' => 'Bu sayfa sürümü kaldırıldı.',
);

/** Tatar (Cyrillic script) (татарча)
 * @author Ilnur efende
 */
$messages['tt-cyrl'] = array(
	'tooltip-pt-notifications' => 'Сезнең хәбәрләр',
	'notification-link-text-view-edit' => 'Үзгәртүне карау',
	'notification-mention' => '[[User:$1|$1]] $5 бәхәс битенең "[[$3#$2|$4]]" бүлегендә сезне искә алды.',
	'notification-mention-flyout' => '[[User:$1|$1]] $5 бәхәс битенең "[[$3#$2|$4]]" бүлегендә сезне искә алды.', # Fuzzy
	'notification-mention-nosection' => '[[User:$1|$1]] $5 бәхәс битенең "[[$3#$2|$4]]" бүлегендә сезне искә алды.', # Fuzzy
	'notification-mention-nosection-flyout' => '[[User:$1|$1]] $5 бәхәс битенең "[[$3#$2|$4]]" бүлегендә сезне искә алды.', # Fuzzy
	'notification-mention-nosection-email-batch-body' => '[[User:$1|$1]] $5 бәхәс битенең "[[$3#$2|$4]]" бүлегендә сезне искә алды.', # Fuzzy
	'echo-date-yesterday' => 'Кичә',
);

/** Uyghur (Arabic script) (ئۇيغۇرچە)
 * @author Sahran
 */
$messages['ug-arab'] = array(
	'prefs-echo' => 'ئۇقتۇرۇشلار',
	'prefs-displaynotifications' => 'كۆرسىتىش تاللانما',
	'notifications' => 'ئۇقتۇرۇشلار',
	'echo-date-today' => 'بۈگۈن',
	'echo-date-yesterday' => 'تۈنۈگۈن',
);

/** Ukrainian (українська)
 * @author AS
 * @author Ahonc
 * @author Andriykopanytsia
 * @author Base
 * @author Olvin
 * @author Steve.rusyn
 * @author SteveR
 * @author Ата
 */
$messages['uk'] = array(
	'echo-desc' => 'Система сповіщень',
	'prefs-echo' => 'Сповіщення',
	'prefs-emailsettings' => 'Параметри електронної пошти',
	'prefs-displaynotifications' => 'Опції відображення',
	'prefs-echosubscriptions' => 'Повідомляти мене про ці події',
	'prefs-newmessageindicator' => 'Індикатор нових повідомлень',
	'echo-pref-send-me' => 'Надіслати мені:',
	'echo-pref-send-to' => 'Надіслати до:',
	'echo-pref-email-format' => 'Формат листів:',
	'echo-pref-web' => 'Веб',
	'echo-pref-email' => 'Ел. пошта',
	'echo-pref-email-frequency-never' => 'Не надсилати мені жодних сповіщень електронною поштою',
	'echo-pref-email-frequency-immediately' => 'Сповіщати про кожну подію одразу',
	'echo-pref-email-frequency-daily' => 'Щоденна збірка сповіщень',
	'echo-pref-email-frequency-weekly' => 'Щомісячна збірка сповіщень',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Простий текст',
	'echo-pref-notify-show-link' => 'Показувати сповіщення в моїй панелі інструментів',
	'echo-pref-new-message-indicator' => 'Показувати індикатор повідомлень на сторінці обговорення у моїй панелі інструментів',
	'echo-learn-more' => 'Дізнатися більше',
	'echo-new-messages' => 'У Вас є нові повідомлення',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Повідомлення|Повідомлення|Повідомлень}} на сторінці обговорення',
	'echo-category-title-article-linked' => '{{PLURAL:$1|посилання}} на сторінку',
	'echo-category-title-reverted' => '{{PLURAL:$1|скасування|скасування|скасувань}} редагувань',
	'echo-category-title-mention' => '{{PLURAL:$1|згадування}}',
	'echo-category-title-other' => '{{PLURAL:$1|інше}}',
	'echo-category-title-system' => '{{PLURAL:$1|системне}}',
	'echo-pref-tooltip-edit-user-talk' => 'Повідомляти мене, коли хтось надіслав повідомлення або відповів на моїй сторінці обговорення.',
	'echo-pref-tooltip-article-linked' => 'Повідомляти мене, коли хтось зробив посилання на створену мною сторінку.',
	'echo-pref-tooltip-reverted' => 'Повідомляти мене, коли хтось відкинув моє редагування з допомогою скасування чи відкату.',
	'echo-pref-tooltip-mention' => 'Повідомляти мене, коли хтось зробив посилання на мою сторінку користувача з будь-якої сторінки обговорення.',
	'echo-no-agent' => '[Ніхто]',
	'echo-no-title' => '[Нема сторінки]',
	'echo-error-no-formatter' => 'Не визначено формату сповіщень',
	'echo-error-preference' => 'Помилка: Не вдалося встановити уподобання користувача',
	'echo-error-token' => 'Помилка: Не вдалося отримати маркер користувача',
	'notifications' => 'Сповіщення',
	'tooltip-pt-notifications' => 'Ваші сповіщення',
	'echo-specialpage' => 'Сповіщення',
	'echo-anon' => 'Для отримання сповіщень [$1 створіть обліковий запис] або [$2 увійдіть].',
	'echo-none' => 'У Вас немає сповіщень.',
	'echo-more-info' => 'Детальніше',
	'echo-feedback' => "Зворотний зв'язок",
	'notification-link-text-view-message' => 'Переглянути повідомлення',
	'notification-link-text-view-mention' => 'Переглянути згадку',
	'notification-link-text-view-changes' => 'Переглянути зміни',
	'notification-link-text-view-page' => 'Переглянути сторінку',
	'notification-link-text-view-edit' => 'Переглянути редагування',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|залишив|залишила}} повідомлення на Вашій [[User talk:$2#$3|сторінці обговорення]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|залишив|залишила}} повідомлення на Вашій сторінці обговорення у «[[User talk:$2#$3|$4]]».',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|залишив|залишила}} повідомлення на Вашій [[User talk:$2#$3|сторінці обговорення]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|залишив|залишила}} повідомлення на Вашій сторінці обговорення у «[[User talk:$2#$3|$4]]».',
	'notification-page-linked' => 'На [[:$3]] $1 {{GENDER:$1|додав|додала}} посилання на [[:$2]]. [[Special:WhatLinksHere/$2|Див. усі посилання на цю сторінку]]',
	'notification-page-linked-flyout' => 'На [[:$3]] $1 {{GENDER:$1|додав|додала}} посилання на $2.',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|прокоментував|прокоментувала}} "[[$3|$2]]" на сторінці обговорення "$4".',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|створив|створила}} нову тему "$2" на [[$3]].',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|надіслав|надіслала}} Вам повідомлення: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|прокоментував|прокоментувала}} "[[$3#$2|$2]]" на Вашій сторінці обговорення.',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|згадав|згадала}} Вас на сторінці обговорення $5 у «[[$3#$2|$4]]».',
	'notification-mention-flyout' => '$1 {{GENDER:$1|згадав|згадала}} Вас на сторінці обговорення $5 у «[[$3#$2|$4]]».',
	'notification-mention-nosection' => '[[User:$1|$1]] {{GENDER:$1|згадав|згадала}} вас на [[$3|сторінці обговорення $2]].',
	'notification-mention-nosection-flyout' => '$1 {{GENDER:$1|згадав|згадала}} вас на [[$3|сторінці обговорення $2]].',
	'notification-user-rights' => 'Ваші права користувача [[Special:Log/rights/$1|було змінено]] {{GENDER:$1|користувачем|користувачкою}} [[User:$1|$1]]. $2. [[Special:ListGroupRights|Дізнатися більше]]',
	'notification-user-rights-flyout' => 'Ваші права користувача було змінено {{GENDER:$1|користувачем|користувачкою}} $1. $2. [[Special:ListGroupRights|Дізнатися більше]]',
	'notification-user-rights-add' => 'Зараз Ви член {{PLURAL:$2|1=такої групи|таких груп}}: $1',
	'notification-user-rights-remove' => 'Ви більше не є членом {{PLURAL:$2|1=цієї групи|таких груп}}: $1',
	'notification-new-user' => 'Ласкаво просимо до {{GRAMMAR:Genitive|{{SITENAME}}}}, $1! Ми раді, що Ви тут.',
	'notification-reverted2' => '{{PLURAL:$4|1=Ваше редагування|Ваші редагування}} сторінки [[:$2]] було {{GENDER:$1|відкочено}} {{GENDER:$1|користувачем|користувачкою}} [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|1=Ваше редагування|Ваші редагування}} сторінки $2 було {{GENDER:$1|відкочено}} {{GENDER:$1|користувачем|користувачкою}} $1 $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|залишив|залишила}} Вам повідомлення на сайті {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|залишив|залишила}} повідомлення на Вашій сторінці обговорення:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|залишив|залишила}} повідомлення на Вашій сторінці обговорення у «$2».',
	'notification-page-linked-email-subject' => "На сайті {{SITENAME}} з'явилось посилання на Вашу сторінку",
	'notification-page-linked-email-batch-body' => 'На «$3» $1 {{GENDER:$1|зробив|зробила}} посилання на «$2»',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|1=Ваше редагування|Ваші редагування}} на сайті {{SITENAME}} було {{GENDER:$1|відкочено}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|1=Ваше редагування|Ваші редагування}} сторінки $2 було {{GENDER:$1|відкочено}} {{GENDER:$1|користувачем|користувачкою}} $1',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|згадав|згадала}} Вас на {{GRAMMAR:locative|{{SITENAME}}}}.',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|згадав|згадала}} Вас на сторінці обговорення {{GENDER:$4|користувача|користувачки}} $4 у «$3».',
	'notification-mention-nosection-email-batch-body' => '$1 {{GENDER:$1|згадав|згадала}} вас на сторінці обговорення $2.',
	'notification-user-rights-email-subject' => 'Змінились Ваші права користувача на {{GRAMMAR:locative|{{SITENAME}}}}.',
	'notification-user-rights-email-batch-body' => 'Ваші права користувача було змінено {{GENDER:$1|користувачем|користувачкою}} $1. $2.',
	'echo-email-subject-default' => 'Нові сповіщення на {{GRAMMAR:locative|{{SITENAME}}}}',
	'echo-email-body-default' => 'У Вас є нове сповіщення на {{GRAMMAR:locative|{{SITENAME}}}}:

$1',
	'echo-email-batch-body-default' => 'У Вас нове сповіщення.',
	'echo-email-footer-default' => '$2

Щоб контролювати, які листи ми Вам надсилаємо, перевірте свої налаштування:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Щоб проконтролювати, які листи ми вам надсилаємо, <a href="$2" style="text-decoration:none; color: #3868B0;">перевірте свої налаштування</a>.<br />
$1',
	'echo-overlay-link' => 'Усі сповіщення',
	'echo-overlay-title' => '<b>Сповіщення</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Сповіщення|Сповіщення|Сповіщень}}</b> (показано $1 з $2 непрочитаних)',
	'echo-mark-all-as-read' => 'Позначити всі як прочитані',
	'echo-date-today' => 'Сьогодні',
	'echo-date-yesterday' => 'Вчора',
	'echo-load-more-error' => 'Під час отримання додаткових результатів сталася помилка.',
	'notification-edit-talk-page-bundle' => '$1 та $3 {{PLURAL:$4|інший користувач|інші користувачі|інших користувачів}} {{GENDER:$1|залишили}} повідомлення на Вашій [[User talk:$2|сторінці обговорення]].',
	'notification-page-linked-bundle' => 'На $3 та $4 {{PLURAL:$5|1=іншій сторінці|інших сторінках}} $1 {{GENDER:$1|додав|додала}} посилання на $2. [[Special:WhatLinksHere/$2|Див. усі посилання на цю сторінку]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 та $2 {{PLURAL:$3|інший користувач|інші користувачі|інших користувачів}} {{GENDER:$1|залишили}} повідомлення на Вашій сторінці обговорення',
	'notification-page-linked-email-batch-bundle-body' => 'На $3 та $4 {{PLURAL:$5|1=іншій сторінці|інших сторінках}} $1 {{GENDER:$1|додав|додала}} посилання на $2.',
	'echo-email-batch-subject-daily' => 'У Вас {{PLURAL:$2|нове сповіщення|нові сповіщення|нових сповіщень}} на сайті {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'У Вас {{PLURAL:$2|нове сповіщення|нові сповіщення|нових сповіщень}} на сайті {{SITENAME}} цього тижня',
	'echo-email-batch-body-intro-daily' => 'Привіт $1!
Ось підсумок денної активності на сайті {{SITENAME}} для вас.',
	'echo-email-batch-body-intro-weekly' => 'Привіт $1!
Ось підсумок тижневої активності на сайті {{SITENAME}} для вас.',
	'echo-email-batch-link-text-view-all-notifications' => 'Переглянути усі сповіщення',
	'echo-rev-deleted-text-view' => 'Цю версію сторінки було приховано.',
);

/** Urdu (اردو)
 * @author Noor2020
 * @author පසිඳු කාවින්ද
 */
$messages['ur'] = array(
	'prefs-echo' => 'اطلاعات',
	'echo-category-title-other' => 'دیگر', # Fuzzy
	'notifications' => 'اطلاعات',
	'echo-specialpage' => 'میری اطلاعات', # Fuzzy
	'echo-feedback' => 'آپ کی رائے',
	'notification-user-rights-flyout' => 'آپ کے صارفانہ حقوق ہوگئے  {{GENDER:$1| تبدیل}} <b> $1 </b>کے ذریعے ۔ $2. [[Special:ListGroupRights|مزید دیکھیں]]',
	'echo-overlay-link' => 'سب اطلاعات...', # Fuzzy
	'echo-overlay-title' => '<b>اطلاعات</b>',
	'echo-overlay-title-overflow' => '<b>اطلاعات</b> (دکھا رہا ہے $1  کے  $2  غیر مطلع)', # Fuzzy
);

/** vèneto (vèneto)
 * @author Candalua
 */
$messages['vec'] = array(
	'echo-pref-send-me' => 'Màndeme:',
	'echo-pref-send-to' => 'Manda a:',
	'echo-pref-email-format' => 'Formato email:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Email',
	'echo-pref-email-frequency-never' => 'No sta mandarme nissuna notifica par email',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Testo normal',
	'echo-new-messages' => 'Te ghè dei messagi novi.', # Fuzzy
	'echo-category-title-other' => '{{PLURAL:$1|Altro}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistema}}',
	'echo-no-agent' => '[Nissun]',
	'echo-no-title' => '[Nissuna pagina]',
	'notification-link-text-view-message' => 'Varda messajo',
	'echo-mark-all-as-read' => 'Segna tuto come zà lèto',
	'echo-date-today' => 'Uncuò',
	'echo-date-yesterday' => 'Jeri',
);

/** Vietnamese (Tiếng Việt)
 * @author Baonguyen21022003
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'echo-desc' => 'Hệ thống thông báo',
	'prefs-echo' => 'Thông báo',
	'prefs-emailsettings' => 'Tùy chọn thư điện tử',
	'prefs-displaynotifications' => 'Tùy chọn hiển thị',
	'prefs-echosubscriptions' => 'Báo cho tôi biết về những sự kiện này',
	'prefs-newmessageindicator' => 'Đèn tin nhắn mới',
	'echo-pref-send-me' => 'Gửi thư cho tôi:',
	'echo-pref-send-to' => 'Gửi đến:',
	'echo-pref-email-format' => 'Định dạng thư điện tử:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Thư điện tử',
	'echo-pref-email-frequency-never' => 'Không gửi cho tôi bất kỳ thông báo qua thư điện tử',
	'echo-pref-email-frequency-immediately' => 'Gửi các thông báo từng cái một vào đúng lúc xảy ra',
	'echo-pref-email-frequency-daily' => 'Tóm lược các thông báo hàng ngày',
	'echo-pref-email-frequency-weekly' => 'Tóm lược các thông báo hàng tuần',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Văn bản thuần',
	'echo-pref-notify-show-link' => 'Hiển thị thông báo trên thanh công cụ',
	'echo-pref-new-message-indicator' => 'Hiển thị đèn tin nhắn trên thanh công cụ của tôi',
	'echo-learn-more' => 'Tìm hiểu thêm',
	'echo-new-messages' => 'Bạn có tin nhắn mới',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1}}Lời tin nhắn',
	'echo-category-title-article-linked' => '{{PLURAL:$1}}Liên kết đến trang',
	'echo-category-title-reverted' => '{{PLURAL:$1}}Lùi sửa',
	'echo-category-title-mention' => '{{PLURAL:$1}}Lời nói đến',
	'echo-category-title-other' => '{{PLURAL:$1}}Khác',
	'echo-category-title-system' => '{{PLURAL:$1}}Hệ thống',
	'echo-pref-tooltip-edit-user-talk' => 'Báo cho tôi biết khi nào người ta nhắn tin hoặc trả lời trên trang thảo luận của tôi.',
	'echo-pref-tooltip-article-linked' => 'Báo cho tôi biết khi nào người ta đặt liên kết từ một bài đến một trang do tôi tạo ra.',
	'echo-pref-tooltip-reverted' => 'Báo cho tôi khi nào người ta lùi lại một sửa đổi của tôi dùng chức năng Lùi sửa hoặc Lùi tất cả.',
	'echo-pref-tooltip-mention' => 'Báo cho tôi biết khi nào người ta đặt liên kết từ bất cứ trang thảo luận nào đến trang cá nhân của tôi.',
	'echo-no-agent' => '[Không ai]',
	'echo-no-title' => '[Không có trang]',
	'echo-error-no-formatter' => 'Thông báo không có định rõ định dạng',
	'echo-error-preference' => 'Lỗi: Không thể đặt tùy chọn',
	'echo-error-token' => 'Lỗi: Không thể lấy dấu hiệu người dùng',
	'notifications' => 'Thông báo',
	'tooltip-pt-notifications' => 'Các thông báo cho bạn',
	'echo-specialpage' => 'Thông báo',
	'echo-anon' => 'Để nhận thông báo, hãy [$1 mở tài khoản] hoặc [$2 đăng nhập].',
	'echo-none' => 'Bạn không có thông báo.',
	'echo-more-info' => 'Thêm thông tin',
	'echo-feedback' => 'Phản hồi',
	'echo-quotation-marks' => '“$1”',
	'notification-link-text-view-message' => 'Xem thông điệp',
	'notification-link-text-view-mention' => 'Xem lời nói đến bạn',
	'notification-link-text-view-changes' => 'Xem các thay đổi',
	'notification-link-text-view-page' => 'Xem trang',
	'notification-link-text-view-edit' => 'Xem sửa đổi',
	'notification-edit-talk-page2' => '[[User:$1|$1]] đã nhắn tin vào [[User talk:$2#$3|trang thảo luận]] của bạn.',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] đã {{GENDER:$1}}nhắn tin cho bạn trong “[[User talk:$2#$3|$4]]”.',
	'notification-edit-talk-page-flyout2' => '$1 đã nhắn tin vào [[User talk:$2#$3|trang thảo luận]] của bạn.',
	'notification-edit-talk-page-flyout-with-section' => '$1 đã {{GENDER:$1}}nhắn tin cho bạn trong “[[User talk:$2#$3|$4]]”.',
	'notification-page-linked' => '[[:$3]] mới {{GENDER:$1}}có liên kết đến [[:$2]]. [[Special:WhatLinksHere/$2|Xem tất cả các liên kết đến trang này]].',
	'notification-page-linked-flyout' => '[[:$3]] mới {{GENDER:$1}}có liên kết đến $2',
	'notification-add-comment2' => '[[User:$1|$1]] đã bình luận về “[[$3|$2]]” tại trang thảo luận “$4”',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] đã bắt đầu cuộc thảo luận mới về “$2” tại [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] đã nhắn tin cho bạn: “[[$3#$2|$2]]”',
	'notification-add-comment-yours2' => '[[User:$1|$1]] đã bình luận về “[[$3#$2|$2]]” tại trang thảo luận của bạn',
	'notification-mention' => '[[User:$1|$1]] đã nói đến bạn trên trang tin nhắn của $5 trong “[[$3#$2|$4]]”.',
	'notification-mention-flyout' => '$1 đã nói đến bạn trên trang tin nhắn của $5 trong “[[$3#$2|$4]]”.',
	'notification-mention-nosection' => '[[User:$1|$1]] {{GENDER:$1}}đã nói đến bạn trên [[$3|trang thảo luận $2]].',
	'notification-mention-nosection-flyout' => '$1 {{GENDER:$1}}đã nói đến bạn trên [[$3|trang thảo luận $2]].',
	'notification-user-rights' => '[[User:$1|$1]] {{GENDER:$1}}đã [[Special:Log/rights/$1|thay đổi]] các quyền người dùng của bạn. $2. [[Special:ListGroupRights|Tìm hiểu thêm]]',
	'notification-user-rights-flyout' => '$1 {{GENDER:$1}}đã thay đổi các quyền người dùng của bạn. $2. [[Special:ListGroupRights|Tìm hiểu thêm]]',
	'notification-user-rights-add' => 'Bạn mới là thành viên của {{PLURAL:$2|nhóm|các nhóm}} này: $1',
	'notification-user-rights-remove' => 'Bạn không còn là thành viên của {{PLURAL:$2|nhóm|các nhóm}} này: $1',
	'notification-new-user' => 'Chào mừng $1 đã đến với {{SITENAME}}!',
	'notification-reverted2' => '[[User:$1|$1]] đã lùi lại {{PLURAL:$4|sửa đổi|các sửa đổi}} của bạn tại [[:$2]] $3',
	'notification-reverted-flyout2' => '$1 đã lùi lại {{PLURAL:$4|sửa đổi|các sửa đổi}} của bạn tại $2 $3',
	'notification-edit-talk-page-email-subject2' => '$1 đã {{GENDER:$1}}nhắn tin cho bạn trên {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 đã nhắn tin vào trang thảo luận của bạn:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 đã {{GENDER:$1}}nhắn tin cho bạn trong “$2”.',
	'notification-page-linked-email-subject' => 'Có liên kết mới đến một trang do bạn tạo ra tại {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$3 mới {{GENDER:$1}}có liên kết đến $2',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Sửa đổi|Các sửa đổi}} của bạn đã bị {{GENDER:$1}}lùi lại trên {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '$1 đã lùi lại {{PLURAL:$3|sửa đổi|các sửa đổi}} của bạn tại $2',
	'notification-mention-email-subject' => '$1 đã nói đến bạn tại {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 đã nói đến bạn trên trang tin nhắn của $4 trong “$3”',
	'notification-mention-nosection-email-batch-body' => '$1 {{GENDER:$1}}đã nói đến bạn trên trang thảo luận $2.',
	'notification-user-rights-email-subject' => 'Các quyền người dùng của bạn đã thay đổi tại {{SITENAME}}',
	'notification-user-rights-email-batch-body' => '$1 {{GENDER:$1}}đã thay đổi các quyền người dùng của bạn. $2',
	'echo-email-subject-default' => 'Thông báo mới tại {{SITENAME}}',
	'echo-email-body-default' => 'Bạn có thông báo mới tại {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Bạn có thông báo mới',
	'echo-email-footer-default' => '$2

Để cấu hình hoặc tắt các thông báo qua thư điện tử, hãy xem tùy chọn của bạn:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Để kiểm soát các thư điện tử mà chúng tôi gửi cho bạn, hãy <a href="$2" style="text-decoration:none; color: #3868B0;">kiểm tra tùy chọn của bạn</a>.<br />
$1',
	'echo-overlay-link' => 'Tất cả các thông báo',
	'echo-overlay-title' => '<b>Thông báo</b>',
	'echo-overlay-title-overflow' => '<b>Tin nhắn</b> (đang xem $1 trên $2 chưa đọc)',
	'echo-mark-all-as-read' => 'Đánh dấu tất cả là đã đọc',
	'echo-date-today' => 'Hôm nay',
	'echo-date-yesterday' => 'Hôm qua',
	'echo-load-more-error' => 'Lỗi đã xảy ra khi lấy thêm kết quả.',
	'notification-edit-talk-page-bundle' => '$1 và $3 {{PLURAL:$4}}người khác đã {{GENDER:$1}}nhắn tin vào [[User talk:$2|trang thảo luận]] của bạn.',
	'notification-page-linked-bundle' => '$3 và $4 {{PLURAL:$5}}trang khác mới {{GENDER:$1}}có liên kết đến $2. [[Special:WhatLinksHere/$2|Xem tất cả các liên kết đến trang này]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 và $2 {{PLURAL:$3}}người khác {{GENDER:$1}}đã nhắn tin vào trang thảo luận của bạn',
	'notification-page-linked-email-batch-bundle-body' => '$3 và $4 {{PLURAL:$5}}trang khác {{GENDER:$1}}mới có liên kết đến $2',
	'echo-email-batch-subject-daily' => 'Bạn có {{PLURAL:$2|một tin nhắn|các tin nhắn}} mới hôm nay trên {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Bạn có {{PLURAL:$2|thông báo|các thông báo}} mới trên {{SITENAME}} tuần này',
	'echo-email-batch-body-intro-daily' => 'Chào $1,
Đây là bản tóm tắt các chuyện xảy ra hôm nay trên {{SITENAME}}.',
	'echo-email-batch-body-intro-weekly' => 'Chào $1,
Đây là bản tóm tắt các chuyện xảy ra vào tuần này trên {{SITENAME}}.',
	'echo-email-batch-link-text-view-all-notifications' => 'Xem tất cả thông báo',
	'echo-rev-deleted-text-view' => 'Phiên bản trang này đã bị ẩn',
);

/** Volapük (Volapük)
 * @author Malafaya
 */
$messages['vo'] = array(
	'prefs-echo' => 'Nunäds',
	'echo-pref-send-me' => 'Sedön obe:',
	'echo-new-messages' => 'Labol nunis nulik',
	'notifications' => 'Nunäds',
	'echo-specialpage' => 'Nunäds',
);

/** Yiddish (ייִדיש)
 * @author פוילישער
 */
$messages['yi'] = array(
	'echo-desc' => 'נאטיפֿיקאציע סיסטעם',
	'prefs-echo' => 'אנזאגן',
	'prefs-emailsettings' => 'ע־פאסט אפציעס',
	'prefs-displaynotifications' => 'ווײַזן אפציעס',
	'prefs-echosubscriptions' => 'זיי מיך מודיע וועגן די דאזיקע געשעענישן',
	'prefs-newmessageindicator' => 'נייער אנזאג ווייזער',
	'echo-pref-send-me' => 'שיקט מיר:',
	'echo-pref-send-to' => 'שיקט צו:',
	'echo-pref-email-format' => 'ע־פאסט פֿארמאט',
	'echo-pref-web' => 'וועב',
	'echo-pref-email' => 'ע-פאסט',
	'echo-pref-email-frequency-never' => 'שיקט מיר נישט קיין ע־פאסט אנזאגן',
	'echo-pref-email-frequency-daily' => 'א טעגליכע רעזומע פון אנזאגן',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'פשוטער טעקסט',
	'echo-learn-more' => 'לערנען נאך',
	'echo-new-messages' => 'איר האט נייע מעלדונגען',
	'echo-category-title-edit-user-talk' => 'שמועס בלאט {{PLURAL:$1|מעלדונג|מעלדונגען}}',
	'echo-category-title-article-linked' => 'בלאט {{PLURAL:$1|לינק|לינקען}}',
	'echo-category-title-reverted' => 'רעדאקטירן {{PLURAL:$1|צוריקמאכונג|צוריקמאכונגען}}',
	'echo-category-title-mention' => '{{PLURAL:$1|דערמאנונג|דערמאנונגען}}',
	'echo-category-title-other' => '{{PLURAL:$1|אנדערע}}',
	'echo-category-title-system' => '{{PLURAL:$1|סיסטעם}}',
	'echo-pref-tooltip-edit-user-talk' => 'זיי מיך מודיע ווען עמעצער שיקט א מעלדונג אדער ענטפערט אויף מיין שמועס בלאט.',
	'echo-no-agent' => '[קיינער]',
	'echo-no-title' => '[קיין בלאט]',
	'echo-error-no-formatter' => 'קיין פארמאטירונג נישט דעפינירט פאר דער הודעה.',
	'echo-error-preference' => 'פעלער: נישט געווען מעגלעך צו שטעלן באניצער פרעפערענץ.',
	'echo-anon' => 'כדי צו באקומען הודעות, [$1 שאפט א קאנטע] אדער [$2 לאגירט אריין].',
	'echo-more-info' => 'נאך אינפארמאציע',
	'echo-feedback' => 'פֿידבעק',
	'notification-link-text-view-message' => 'באקוקן מעלדונג',
	'notification-link-text-view-changes' => 'באקוקן ענדערונגען',
	'notification-link-text-view-page' => 'באקוקן בלאט',
	'notification-link-text-view-edit' => 'באקוקן רעדאקטירונג',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|האט געלאזט}} א מעלדונג אויף אײַער [[User talk:$2#$3|שמועס בלאט]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|האט געלאזט}} א מעלדונג אויף אייער שמועס בלאט ביי "[[User talk:$2#$3|$4]]".',
	'notification-page-linked-flyout' => '$2 איז געווארן {{GENDER:$1|פֿאַרלינקט}} פֿון [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|האט געלאזט א הערה}} וועגן "[[$3|$2]]" אויפן "$4" רעדן בלאט.',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|האט}} אײַך געשיקט אן אנזאג: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|האט געלאזט א הערה}} וועגן "[[$3#$2|$2]]" אויף אײַער רעדן בלאט.',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|האט אייך געשריבן}} א נייע מעלדונג אינעם {{SITENAME}} וועבזייטל',
	'notification-page-linked-email-subject' => 'אײַער בלאט איז געווארן פֿאַרלינקט אויף {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2 איז געווארן {{GENDER:$1| פֿאַרלינקט}} פֿון $3.',
	'echo-overlay-link' => 'אלע הודעות',
	'echo-overlay-title' => '<b>הודעות</b>',
	'echo-mark-all-as-read' => 'מאַרקירן אַלע געליינט',
	'echo-date-today' => 'הײַנט',
	'echo-date-yesterday' => 'נעכטן',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 און $2 {{PLURAL:$3|אנדערער|אנדערע}} {{GENDER:$1|האבן געלאזט}} אן אנזאג אויף אייער רעדן בלאט.',
	'notification-page-linked-email-batch-bundle-body' => '$2 איז געווארן {{GENDER:$1|געלינקט}} פון $3 און $4 {{PLURAL:$5|אנדער בלאט|אנדערע בלעטער}}.',
);

/** Yoruba (Yorùbá)
 * @author Demmy
 */
$messages['yo'] = array(
	'notifications' => 'Àwọn ìdálákìíyèsí',
	'tooltip-pt-notifications' => 'Àwọn ìdálákìíyèsí yín',
	'echo-specialpage' => 'Àwọn ìdálákìíyèsí',
	'echo-none' => 'Ẹ kò ní ìdálákìíyèsí kankan.',
	'notification-link-text-view-message' => 'Ìgbéwò ìránṣẹ́',
	'notification-link-text-view-mention' => 'Ìgbéwò ìdárúkọ',
	'notification-link-text-view-changes' => 'Ìgbéwò àwọn àtúnṣe tuntun',
	'notification-link-text-view-page' => 'Ìgbéwò ojúewé',
	'notification-link-text-view-edit' => 'Ìgbéwò àtúnṣe',
	'notification-edit-talk-page2' => "[[User:$1|$1]] {{GENDER:$1|fi}} ìránṣẹ́ s'órí [[User talk:$2#$3|ojúewé ọ̀rọ̀]] yín.",
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|fi}} ìránṣẹ́ s\'órí ojúewé ọ̀rọ̀ yín ní "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|fi}} ìránṣẹ́ sí [[User talk:$2#$3|ojúewé ọ̀rọ̀]] yín.',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|fi}} ìránṣẹ́ fún yín lórí {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => "$1 {{GENDER:$1|fi}} ìránṣẹ́ s'órí ojúewé ọ̀rọ̀ yín:",
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|fi}} ìránṣẹ́ s\'órí ojúewé ọ̀rọ̀ yín ní "$2".',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|dárúkọ}} yín lórí {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|dárúkọ}} yín lórí ojúewé ọ̀rọ̀ $4 nínú "$3".',
	'notification-mention-nosection-email-batch-body' => '$1 {{GENDER:$1|dárúkọ}} yín lórí ojúewé ọ̀rọ̀ $2.',
	'echo-email-subject-default' => 'Ìdálákìíyèsí tuntun wà ní {{SITENAME}}',
	'echo-email-body-default' => 'Ẹ ní ìdálákìíyèsí tuntun ní {{SITENAME}}:


$1',
	'echo-email-batch-body-default' => 'Ẹ ní ìdálákìíyèsí tuntun.',
	'echo-overlay-link' => 'Gbogbo ìdálákìíyèsí',
	'echo-overlay-title' => '<b>Àwọn ìdálákìíyèsí</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|Àwọn ìdálákìíyèsí}}</b> (ìhàn $1 nínú $2 àìtíìkà)',
	'echo-date-today' => 'Òní',
	'echo-date-yesterday' => 'Àná',
	'echo-email-batch-link-text-view-all-notifications' => 'Ìgbéwò gbogbo ìdálákìíyèsí',
);

/** Cantonese (粵語)
 * @author William915
 * @author Wong128hk
 */
$messages['yue'] = array(
	'echo-desc' => '通知系統',
	'prefs-echo' => '通知',
	'prefs-emailsettings' => '電郵選項',
	'prefs-displaynotifications' => '顯示選項',
	'prefs-echosubscriptions' => '通知選項',
	'prefs-newmessageindicator' => '新留言提示',
	'echo-pref-send-me' => '幾耐電郵通知一次',
	'echo-pref-send-to' => '發畀：',
	'echo-pref-email-format' => '郵件格式︰',
	'echo-pref-web' => '網頁',
	'echo-pref-email' => '電郵',
	'echo-pref-email-frequency-never' => '唔使出電郵通知',
	'echo-pref-email-frequency-immediately' => '每樣都即時通知',
	'echo-pref-email-frequency-daily' => '一日出一次',
	'echo-pref-email-frequency-weekly' => '一個禮拜出一次',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => '純文字',
	'echo-pref-notify-show-link' => '喺工具列道出通知',
	'echo-pref-new-message-indicator' => '喺工具列道出新留言提示',
	'echo-learn-more' => '了解多啲',
	'echo-new-messages' => '你有新信', # Fuzzy
	'echo-category-title-edit-user-talk' => '傾偈版{{PLURAL:$1|新信}}',
	'echo-category-title-article-linked' => '{{PLURAL:$1|連}}到我開嘅版',
	'echo-category-title-reverted' => '將我嘅修改{{PLURAL:$1|打回頭}}',
	'echo-category-title-mention' => '{{PLURAL:$1|提到}}我',
	'echo-category-title-other' => '{{PLURAL:$1|其他}}',
	'echo-category-title-system' => '{{PLURAL:$1|系統}}',
	'echo-pref-tooltip-edit-user-talk' => '有人喺我傾偈版留信或者回覆，話我知。',
	'echo-pref-tooltip-article-linked' => '有人喺文章連過去我開嘅版，話我知',
	'echo-pref-tooltip-reverted' => '有人將我嘅修改打回頭，話我知。',
	'echo-pref-tooltip-mention' => '有人喺任何傾偈頁提及我嘅用戶頁，話我知。',
	'echo-error-no-formatter' => '無預定通知格式',
	'echo-error-preference' => '出錯︰設定唔到用戶喜好。',
	'echo-error-token' => '出錯︰攞唔到用戶保安編碼。',
	'notifications' => '通知',
	'tooltip-pt-notifications' => '你嘅通知',
	'echo-specialpage' => '通知',
	'echo-anon' => '要收到通知嘅話，就[$1 開戶]或者[$2 簽到]啦。',
	'echo-none' => '爾家無通知畀你',
	'echo-more-info' => '知多啲',
	'echo-feedback' => '反饋',
	'notification-link-text-view-message' => '去睇信息',
	'notification-link-text-view-mention' => '去睇下講啲咩',
	'notification-link-text-view-changes' => '去睇改咗啲乜',
	'notification-link-text-view-page' => '去睇嗰頁',
	'notification-link-text-view-edit' => '去睇改咗啲乜',
	'notification-edit-talk-page2' => '[[User:$1|$1]]喺你[[User talk:$2#$3|傾偈版]]道{{GENDER:$1|留}}咗個訊息。',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]]喺你傾偈版小節「[[User talk:$2#$3|$4]]」道{{GENDER:$1|留}}咗個訊息。',
	'notification-edit-talk-page-flyout2' => '$1喺你[[User talk:$2#$3|傾偈版]]道{{GENDER:$1|留}}咗個訊息。',
	'notification-edit-talk-page-flyout-with-section' => '$1喺你傾偈版小節「[[User talk:$2#$3|$4]]」道{{GENDER:$1|留}}咗個訊息。',
	'notification-page-linked' => '[[:$3]]道有連結{{GENDER:$1|連}}過去[[:$2]]。 [[Special:WhatLinksHere/$2|睇嗮有乜連過去]]',
	'notification-page-linked-flyout' => '[[:$3]]道有連結{{GENDER:$1|連}}過去$2。',
	'notification-add-comment2' => '[[User:$1|$1]]喺「$4」傾偈頁小節「[[$3|$2]]」道{{GENDER:$1|發}}咗個意見。',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]]喺[[$3]]道{{GENDER:$1|開}}咗個小節「$2」。',
	'echo-email-batch-body-default' => '你有新通知',
	'echo-mark-all-as-read' => '全部標做讀過',
	'echo-date-today' => '今日',
	'echo-date-yesterday' => '尋日',
	'echo-rev-deleted-text-view' => '爾次修改收埋咗',
);

/** Simplified Chinese (中文（简体）‎)
 * @author Anakmalaysia
 * @author Byfserag
 * @author Chiefwei
 * @author Cwek
 * @author Dimension
 * @author Fantasticfears
 * @author GeneralNFS
 * @author Hydra
 * @author Hzy980512
 * @author Kuailong
 * @author Li3939108
 * @author Liangent
 * @author Linforest
 * @author Liuxinyu970226
 * @author Qiyue2001
 * @author Shirayuki
 * @author Shizhao
 * @author StephDC
 * @author TianyinLee
 * @author Xiaomingyan
 * @author Xingzhe
 * @author Yfdyh000
 * @author 乌拉跨氪
 */
$messages['zh-hans'] = array(
	'echo-desc' => '通知系统',
	'prefs-echo' => '通知',
	'prefs-emailsettings' => '电子邮件选项',
	'prefs-displaynotifications' => '显示选项',
	'prefs-echosubscriptions' => '通知我这些事件',
	'prefs-newmessageindicator' => '新信息提示器',
	'echo-pref-send-me' => '给我发送：',
	'echo-pref-send-to' => '发送至：',
	'echo-pref-email-format' => '电子邮件格式：',
	'echo-pref-web' => '网页',
	'echo-pref-email' => '电子邮件',
	'echo-pref-email-frequency-never' => '不要给我发送任何电子邮件通知',
	'echo-pref-email-frequency-immediately' => '每一新事件都单独通知',
	'echo-pref-email-frequency-daily' => '每日一次通知摘要',
	'echo-pref-email-frequency-weekly' => '每周一次通知摘要',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => '纯文本',
	'echo-pref-notify-show-link' => '在我的工具栏中显示通知',
	'echo-pref-new-message-indicator' => '在我的工具栏中显示讨论页留言提示器',
	'echo-learn-more' => '了解更多',
	'echo-new-messages' => '您有新信息',
	'echo-category-title-edit-user-talk' => '讨论页{{PLURAL:$1|留言}}',
	'echo-category-title-article-linked' => '页面{{PLURAL:$1|链接}}',
	'echo-category-title-reverted' => '编辑{{PLURAL:$1|回退}}',
	'echo-category-title-mention' => '{{PLURAL:$1|提及}}',
	'echo-category-title-other' => '{{PLURAL:$1|其他}}',
	'echo-category-title-system' => '{{PLURAL:$1|系统}}',
	'echo-pref-tooltip-edit-user-talk' => '当有人在我的讨论页上留言或回复时通知我。',
	'echo-pref-tooltip-article-linked' => '当有人在条目中链接了我创建的页面时通知我。',
	'echo-pref-tooltip-reverted' => '当有人用撤销或回退工具回退了我的编辑时通知我。',
	'echo-pref-tooltip-mention' => '当有人在任何讨论页链接我的用户页面时通知我。',
	'echo-no-agent' => '[匿名]',
	'echo-no-title' => '[无页面]',
	'echo-error-no-formatter' => '未指定通知格式',
	'echo-error-preference' => '出错：无法设定用户设置。',
	'echo-error-token' => '出错：无法检索用户令牌。',
	'notifications' => '通知',
	'tooltip-pt-notifications' => '您的通知',
	'echo-specialpage' => '通知',
	'echo-anon' => '想要接收通知，请[$1 创建账户]或[$2 登录]。',
	'echo-none' => '您没有通知。',
	'echo-more-info' => '更多信息',
	'echo-feedback' => '反馈',
	'echo-quotation-marks' => '“$1”',
	'notification-link-text-view-message' => '查看留言',
	'notification-link-text-view-mention' => '查看提及',
	'notification-link-text-view-changes' => '查看更改',
	'notification-link-text-view-page' => '查看页面',
	'notification-link-text-view-edit' => '查看编辑',
	'notification-edit-talk-page2' => '[[User:$1|$1]]在您的[[User talk:$2#$3|讨论页]]留言了。',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]]在您的讨论页的“[[User talk:$2#$3|$4]]”段落{{GENDER:$1|留言}}了。',
	'notification-edit-talk-page-flyout2' => '$1在您的[[User talk:$2#$3|讨论页]]{{GENDER:$1|留言}}了。',
	'notification-edit-talk-page-flyout-with-section' => '$1在您的讨论页的“[[User talk:$2#$3|$4]]”段落{{GENDER:$1|留言}}了。',
	'notification-page-linked' => '[[:$3]]{{GENDER:$1|链接}}了[[:$2]]。[[Special:WhatLinksHere/$2|查看所有链至该页的页面]]。',
	'notification-page-linked-flyout' => '$2被[[:$3]]{{GENDER:$1|链接}}。',
	'notification-add-comment2' => '[[User:$1|$1]]在“$4”的讨论页面的“[[$3|$2]]”段落{{GENDER:$1|发表意见}}。',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]]在[[$3]]上发起了新话题“$2”',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]]给您发来一则信息：“[[$3#$2|$2]]”。',
	'notification-add-comment-yours2' => '[[User:$1|$1]]在您的讨论页的“[[$3#$2|$2]]”段落{{GENDER:$1|发表意见}}。',
	'notification-mention' => '[[User:$1|$1]]在$5的讨论页的“[[$3#$2|$4]]”段落{{GENDER:$1|提到}}了您。',
	'notification-mention-flyout' => '$1在$5的讨论页的“[[$3#$2|$4]]”段落{{GENDER:$1|提到}}了您。',
	'notification-mention-nosection' => '[[User:$1|$1]]在[[$3|$2的讨论页]]提到了您。',
	'notification-mention-nosection-flyout' => '$1在[[$3|$2的讨论页]]提到了您。',
	'notification-user-rights' => '您的用户权限被[[User:$1|$1]][[Special:Log/rights/$1|更改了]]。$2。[[Special:ListGroupRights|了解更多]]',
	'notification-user-rights-flyout' => '您的用户权限被$1{{GENDER:$1|更改了}}。$2。[[Special:ListGroupRights|了解更多]]',
	'notification-user-rights-add' => '您被添加至该{{PLURAL:$2|用户组}}：$1',
	'notification-user-rights-remove' => '您被从该{{PLURAL:$2|用户组}}中移除：$1',
	'notification-new-user' => '欢迎来到{{SITENAME}}，$1！',
	'notification-reverted2' => '您对[[:$2]]的{{PLURAL:$4|编辑}}被[[User:$1|$1]]{{GENDER:$1|回退了}}。$3',
	'notification-reverted-flyout2' => '您对$2的{{PLURAL:$4|编辑}}被$1{{GENDER:$1|回退了}}。$3',
	'notification-edit-talk-page-email-subject2' => '$1在{{SITENAME}}给您{{GENDER:$1|留言}}了',
	'notification-edit-talk-page-email-batch-body2' => '$1在您的讨论页{{GENDER:$1|留言}}了：',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1在您的讨论页的“$2”段落{{GENDER:$1|留言}}了。',
	'notification-page-linked-email-subject' => '您创建的页面已链入{{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2被$3{{GENDER:$1|链接}}。',
	'notification-reverted-email-subject2' => '你在{{SITENAME}}的{{PLURAL:$3|编辑}}被{{GENDER:$1|回退了}}',
	'notification-reverted-email-batch-body2' => '你{{PLURAL:$3|对$2的编辑}}被$1{{GENDER:$1|回退了}}。',
	'notification-mention-email-subject' => '$1在{{SITENAME}}{{GENDER:$1|提到}}了您',
	'notification-mention-email-batch-body' => '$1在$4的讨论页的“$3”段落{{GENDER:$1|提到}}了您。',
	'notification-mention-nosection-email-batch-body' => '$1在$2的讨论页提到了您。',
	'notification-user-rights-email-subject' => '您在{{SITENAME}}的用户权限已被更改',
	'notification-user-rights-email-batch-body' => '您的用户权限被$1{{GENDER:$1|更改}}。$2。',
	'echo-email-subject-default' => '{{SITENAME}}的新通知',
	'echo-email-body-default' => '在{{SITENAME}}中有您的新通知：

$1',
	'echo-email-batch-body-default' => '您有新的通知。',
	'echo-email-footer-default' => '$2

想要调整我们发送给您的电子邮件，请更改您的设置：{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => '要调整我们发送给您哪些电子邮件，请<a href="$2" style="text-decoration:none; color: #3868B0;">更改您的设置</a>。<br />
$1',
	'echo-overlay-link' => '全部通知',
	'echo-overlay-title' => '<b>通知</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|通知}}</b>（显示$2条未读通知中的$1条）',
	'echo-mark-all-as-read' => '标记所有为已读',
	'echo-date-today' => '今天',
	'echo-date-yesterday' => '昨天',
	'echo-load-more-error' => '获取更多结果时出错。',
	'notification-edit-talk-page-bundle' => '$1及{{PLURAL:$4|另外}}$3位用户在您的[[User talk:$2|讨论页]]{{GENDER:$1|留言}}了。',
	'notification-page-linked-bundle' => '$2被$3和另外$4个{{PLURAL:$5|页面}}{{GENDER:$1|链接}}。[[Special:WhatLinksHere/$2|查看链至该页的所有页面]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1和{{PLURAL:$3|另外}}$2位用户在您的讨论页{{GENDER:$1|留言}}了。',
	'notification-page-linked-email-batch-bundle-body' => '$2被$3和另外$4个{{PLURAL:$5|页面}}{{GENDER:$1|链接}}。',
	'echo-email-batch-subject-daily' => '在{{SITENAME}}中有您的{{PLURAL:$2|新通知}}',
	'echo-email-batch-subject-weekly' => '本周您在{{SITENAME}}中有{{PLURAL:$2|新通知}}',
	'echo-email-batch-body-intro-daily' => '嗨，$1，
这是今天您在{{SITENAME}}的通知摘要。',
	'echo-email-batch-body-intro-weekly' => '$1，
这是本周您在{{SITENAME}}的通知摘要。',
	'echo-email-batch-link-text-view-all-notifications' => '查看所有通知',
	'echo-rev-deleted-text-view' => '该页面版本已经被取消。',
);

/** Traditional Chinese (中文（繁體）‎)
 * @author Ch.Andrew
 * @author Chiefwei
 * @author Fantasticfears
 * @author Justincheng12345
 * @author Kevinhksouth
 * @author Liflon
 * @author Littletung
 * @author Liuxinyu970226
 * @author Shirayuki
 * @author Simon Shek
 * @author Waihorace
 * @author Wong128hk
 */
$messages['zh-hant'] = array(
	'echo-desc' => '通知系統',
	'prefs-echo' => '通知',
	'prefs-emailsettings' => '電子郵件選項',
	'prefs-displaynotifications' => '顯示選項',
	'prefs-echosubscriptions' => '通知我這些事件',
	'prefs-newmessageindicator' => '新訊息提示工具',
	'echo-pref-send-me' => '發送給我：',
	'echo-pref-send-to' => '發送至：',
	'echo-pref-email-format' => '信件格式：',
	'echo-pref-web' => '網頁',
	'echo-pref-email' => '電子郵件',
	'echo-pref-email-frequency-never' => '不要傳送任何信件通知',
	'echo-pref-email-frequency-immediately' => '允許每則新事件的個別通知',
	'echo-pref-email-frequency-daily' => '每日通知摘要',
	'echo-pref-email-frequency-weekly' => '每週通知摘要',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => '純文字',
	'echo-pref-notify-show-link' => '在工具列中顯示通知',
	'echo-pref-new-message-indicator' => '在工具列中顯示討論頁訊息提示工具',
	'echo-learn-more' => '了解更多',
	'echo-new-messages' => '您有新訊息',
	'echo-category-title-edit-user-talk' => '討論頁{{PLURAL:$1|訊息}}',
	'echo-category-title-article-linked' => '頁面{{PLURAL:$1|連結}}',
	'echo-category-title-reverted' => '編輯{{PLURAL:$1|恢復}}',
	'echo-category-title-mention' => '{{PLURAL:$1|提到}}',
	'echo-category-title-other' => '{{PLURAL:$1|其他}}',
	'echo-category-title-system' => '{{PLURAL:$1|系統}}',
	'echo-pref-tooltip-edit-user-talk' => '有人在我的討論頁上留下訊息或是回覆留言時，請通知我。',
	'echo-pref-tooltip-article-linked' => '有人從條目頁面連結到我建立的頁面時，請通知我。',
	'echo-pref-tooltip-reverted' => '有人使用復原或回退工具來恢復我的編輯時，請通知我。',
	'echo-pref-tooltip-mention' => '有人從任何討論頁連結到我的使用者頁面時，請通知我。',
	'echo-no-agent' => '[無使用者]',
	'echo-no-title' => '[無頁面]',
	'echo-error-no-formatter' => '沒有格式化定義的通知。',
	'echo-error-preference' => '錯誤：無法設定使用者偏好。',
	'echo-error-token' => '錯誤：無法取回使用者 Token 。',
	'notifications' => '通知',
	'tooltip-pt-notifications' => '您的通知',
	'echo-specialpage' => '通知',
	'echo-anon' => '如果要收到通知，請先[$1 註冊帳號]或是[$2 使用者登入]。',
	'echo-none' => '您沒有任何通知。',
	'echo-more-info' => '更多資訊',
	'echo-feedback' => '意見反饋',
	'notification-link-text-view-message' => '檢視訊息',
	'notification-link-text-view-mention' => '檢視提到',
	'notification-link-text-view-changes' => '檢視變更',
	'notification-link-text-view-page' => '檢視頁面',
	'notification-link-text-view-edit' => '檢視編輯',
	'notification-edit-talk-page2' => '[[User:$1|$1]] 在您的[[User talk:$2#$3|討論頁]]{{GENDER:$1|留下了}}一則訊息。',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] 在您的討論頁段落「[[User talk:$2#$3|$4]]」裡面{{GENDER:$1|留下了}}一則訊息。',
	'notification-edit-talk-page-flyout2' => '$1 在您的[[User talk:$2#$3|討論頁]]{{GENDER:$1|留下了}}一則訊息。',
	'notification-edit-talk-page-flyout-with-section' => '$1 在您的討論頁段落「[[User talk:$2#$3|$4]]」裡面{{GENDER:$1|留下了}}一則訊息。',
	'notification-page-linked' => '[[:$2]]已從[[:$3]]頁面{{GENDER:$1|連入了}}。詳情請見[[Special:WhatLinksHere/$2|此頁面的所有連結]]。',
	'notification-page-linked-flyout' => '$2已從[[:$3]]頁面{{GENDER:$1|連入了}}。',
	'notification-add-comment2' => '[[User:$1|$1]] 在「$4」討論頁段落「[[$3|$2]]」裡面{{GENDER:$1|發表了意見}}。',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] 在[[$3]]的頁面{{GENDER:$1|張貼了}}新主題「$2」。',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] 傳送了一則訊息給您：「[[$3#$2|$2]]」。',
	'notification-add-comment-yours2' => '[[User:$1|$1]] 在您的討論頁段落「[[$3#$2|$2]]」裡面{{GENDER:$1|發表了意見}}。',
	'notification-mention' => '[[User:$1|$1]] 在 $5 的討論頁段落「 [[$3#$2|$4]] 」裡面{{GENDER:$1|提到了}}您。',
	'notification-mention-flyout' => '$1 在 $5 討論頁段落「[[$3#$2|$4]]」裡面{{GENDER:$1|提到了}}您。',
	'notification-mention-nosection' => '[[User:$1|$1]]於[[$3|$2討論頁]]提到了您。',
	'notification-mention-nosection-flyout' => '$1於[[$3|$2討論頁]]提到了您。',
	'notification-user-rights' => '您的使用者權限已由 [[User:$1|$1]] 執行了[[Special:Log/rights/$1|變更]]。$2。[[Special:ListGroupRights|了解更多]]',
	'notification-user-rights-flyout' => '您的使用者權限已由 $1 執行了{{GENDER:$1|變更}}。$2。[[Special:ListGroupRights|了解更多]]',
	'notification-user-rights-add' => '您成為了{{PLURAL:$2|這個群組|這些群組}}的成員：$1',
	'notification-user-rights-remove' => '你不再是{{PLURAL:$2|這個群組|這些群組}}的成員：$1',
	'notification-new-user' => '歡迎來到{{SITENAME}}，$1！我們很高興您的蒞臨。',
	'notification-reverted2' => '您{{PLURAL:$4|在[[:$2]]頁面的編輯}}已由 [[User:$1|$1]] 給{{GENDER:$1|恢復了}}。$3',
	'notification-reverted-flyout2' => '您{{PLURAL:$4|在$2頁面的編輯}}已由 $1 給恢復了。 $3',
	'notification-edit-talk-page-email-subject2' => '$1 在 {{SITENAME}} {{GENDER:$1|留下了}}一則訊息給您。',
	'notification-edit-talk-page-email-batch-body2' => '$1 在您的討論頁中{{GENDER:$1|留下了}}一則訊息：',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 在您的討論頁「$2」中{{GENDER:$1|留下了}}一則訊息。',
	'notification-page-linked-email-subject' => '您的頁面已在 {{SITENAME}} 連入了',
	'notification-page-linked-email-batch-body' => '$2 頁面已從 $3 頁面{{GENDER:$1|連入了}}。',
	'notification-reverted-email-subject2' => '您在 {{SITENAME}} 的{{PLURAL:$3|編輯}}已給{{GENDER:$1|恢復了}}',
	'notification-reverted-email-batch-body2' => '您在{{PLURAL:$3|$2頁面的編輯}}已由 $1 給{{GENDER:$1|恢復了}}。',
	'notification-mention-email-subject' => '$1 在 {{SITENAME}} {{GENDER:$1|提到了}}您',
	'notification-mention-email-batch-body' => '$1 在$4的討論頁段落「$3」裡面{{GENDER:$1|提到了}}您。',
	'notification-mention-nosection-email-batch-body' => '$1於$2討論頁提到了您。',
	'notification-user-rights-email-subject' => '您在 {{SITENAME}} 的使用者權限已變更',
	'notification-user-rights-email-batch-body' => '你的使用者權限已由 $1 修改。$2',
	'echo-email-subject-default' => '{{SITENAME}}的新通知',
	'echo-email-body-default' => '你在{{SITENAME}}有一則新訊息：


$1',
	'echo-email-batch-body-default' => '你有一則新訊息。',
	'echo-email-footer-default' => '$2

如要調整我們寄給您的電子郵件，按一下這裡檢查您的偏好設定：
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => '如要調整我們寄給您的電子郵件，<a href="$2" style="text-decoration:none; color: #3868B0;">按一下這裡檢查您的偏好設定</a>。<br />
$1',
	'echo-overlay-link' => '所有通知',
	'echo-overlay-title' => '<b>通知</b>',
	'echo-overlay-title-overflow' => '<b>{{PLURAL:$1|通知}}</b>（顯示 $2 則的其中 $1 則未讀）',
	'echo-mark-all-as-read' => '標記所有為已讀',
	'echo-date-today' => '今天',
	'echo-date-yesterday' => '昨天',
	'echo-load-more-error' => '擷取更多結果的時候發生錯誤。',
	'notification-edit-talk-page-bundle' => '$1 與{{PLURAL:$4|另外}} $3 位使用者在您的[[User talk:$2|討論頁]]裡面{{GENDER:$1|留下了}}一則訊息。',
	'notification-page-linked-bundle' => '$2已經由$3以及另外 $4 個{{PLURAL:$5|頁面}}給{{GENDER:$1|連入}}了。詳情請見[[Special:WhatLinksHere/$2|所有的連入頁面]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 與{{PLURAL:$3|另外}} $2 位使用者在您的討論頁裡面{{GENDER:$1|留下了}}訊息。',
	'notification-page-linked-email-batch-bundle-body' => '$2頁面已從$3頁面以及另外 $4 個{{PLURAL:$5|頁面}}{{GENDER:$1|連入了}}',
	'echo-email-batch-subject-daily' => '您在 {{SITENAME}} 有{{PLURAL:$2|一則新通知}}',
	'echo-email-batch-subject-weekly' => '本週您在 {{SITENAME}} 有{{PLURAL:$2|一則新通知}}',
	'echo-email-batch-body-intro-daily' => '$1您好，
這是您在 {{SITENAME}} 的今日活動記錄摘要。',
	'echo-email-batch-body-intro-weekly' => '$1您好，
這是您在 {{SITENAME}} 的本週活動記錄摘要。',
	'echo-email-batch-link-text-view-all-notifications' => '檢視所有通知',
	'echo-rev-deleted-text-view' => '該頁面修訂已停用。',
);
