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
	'echo-new-messages' => 'You have new messages.',

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
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|mentioned}} you on $5 talk page in "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 {{GENDER:$1|mentioned}} you on $5 talk page in "[[$3#$2|$4]]".',
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
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|mentioned}} you on $4 talk page in "$3".',
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
 * @author Jduranboger
 * @author Kghbln
 * @author Krenair
 * @author Lloffiwr
 * @author Minh Nguyen
 * @author Mormegil
 * @author Nemo bis
 * @author Nike
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
	'echo-new-messages' => 'Message to let the user know that they have new talk page messages. Keep this message short.',
	'echo-category-title-edit-user-talk' => 'This is a short title for notification category.

Used as <code>$1</code> in {{msg-mw|Echo-dismiss-message}}.

Parameters:
* $1 - number of messages, for PLURAL support
{{Related|Echo-category-title}}',
	'echo-category-title-article-linked' => 'This is a short title for notification category.

Used as <code>$1</code> in {{msg-mw|Echo-dismiss-message}}.

Parameters:
* $1 - number of links, for PLURAL support
{{Related|Echo-category-title}}',
	'echo-category-title-reverted' => 'This is a short title for notification category.

Used as <code>$1</code> in {{msg-mw|Echo-dismiss-message}}.

Parameters:
* $1 - number of reverts, for PLURAL support
{{Related|Echo-category-title}}',
	'echo-category-title-mention' => 'This is a short title for notification category.

Used as <code>$1</code> in {{msg-mw|Echo-dismiss-message}}.

See [https://www.mediawiki.org/wiki/Echo_%28Notifications%29/Feature_requirements#User_Mention Notifications help] for definition of term.

Parameters:
* $1 - number of mentions, for PLURAL support
{{Related|Echo-category-title}}',
	'echo-category-title-other' => 'This is a short title for notification category.

Used as <code>$1</code> in {{msg-mw|Echo-dismiss-message}}.

Parameters:
* $1 - the number used for plural support
{{Related|Echo-category-title}}
{{Identical|Other}}',
	'echo-category-title-system' => 'This is a short title for notification category.

Used as <code>$1</code> in {{msg-mw|Echo-dismiss-message}}.

Parameters:
* $1 - the number used for plural support
{{Related|Echo-category-title}}
{{Identical|System}}',
	'echo-pref-tooltip-edit-user-talk' => 'This is a short description of the edit-user-talk notification category.',
	'echo-pref-tooltip-article-linked' => 'This is a short description of the article-linked notification category',
	'echo-pref-tooltip-reverted' => 'This is a short description of the tooltip-reverted notification category',
	'echo-pref-tooltip-mention' => 'This is a short description of the mention notification category',
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
	'notification-link-text-view-message' => 'Label for button that links to a message on your talk page.',
	'notification-link-text-view-mention' => 'Label for button that links to a discussion where you were mentioned.',
	'notification-link-text-view-changes' => 'Label for button that links to a "diff" view showing changes made to a page. This is an alternative to the wording in {{msg-mw|notification-link-text-view-edit}}, which serves essentially the same function.',
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
	'notification-mention' => "Format for displaying notifications of a comment including a link to another user's user page. Parameters:
* $1 - the username of the person who edited, plain text. Can be used for GENDER
* $2 - the section title of the discussion
* $3 - the page title of the discussion
* $4 - the raw section title text
* $5 - the title text without namespace, in this case, it's always a user name",
	'notification-mention-flyout' => "Flyout-specific format for displaying notifications of a comment including a link to another user's user page.
Parameters:
* $1 - the username of the person who mentioned you, plain text. Can be used for GENDER.
* $2 - the section title of the discussion
* $3 - the page title of the discussion
* $4 - the raw section title text
* $5 - the title text without namespace, in this case, it's always a user name",
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
	'notification-mention-email-batch-body' => "E-mail notification batch body.  Parameters:
* $1 - a username, plaintext.  Can be used for gender support
* $2 - (Unused) talk page title
* $3 - the raw section title text
* $4 - the title text without namespace, in this case, it's always a user name

See also:
* {{msg-mw|Notification-mention}}
* {{msg-mw|Notification-mention-flyout}}
* {{msg-mw|Notification-mention-email-subject}}",
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
	'echo-date-yesterday' => "The header text for yesterday's notification section",
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
* $4 - the cout of other link-from page title, can be number or {{msg-mw|echo-notification-count}}
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
	'echo-no-agent' => '[Niemand]',
	'echo-no-title' => '[Geen titel]', # Fuzzy
	'notifications' => 'Kennisgewings',
	'echo-specialpage' => 'My kennisgewings', # Fuzzy
);

/** Arabic (العربية)
 * @author Achraf94
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
	'prefs-echosubscriptions' => 'أشعرني بشأن هذه الأحداث',
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
	'echo-new-messages' => 'لديك رسائل جديدة.',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|رسالة|رسائل}} صفحة النقاش',
	'echo-category-title-article-linked' => '{{PLURAL:$1|وصلة|وصلات}} صفحة',
	'echo-category-title-reverted' => 'رفض {{PLURAL:$1|تعديل|تعديلات}}',
	'echo-category-title-mention' => '{{PLURAL:$1|إشارة|إشارات}}',
	'echo-category-title-other' => '{{PLURAL:$1|أخرى}}',
	'echo-category-title-system' => '{{PLURAL:$1|النظام}}',
	'echo-pref-tooltip-edit-user-talk' => 'أشعرني عندما توضع رسائل أو ردود في صفحة نقاشي.',
	'echo-pref-tooltip-article-linked' => 'أشعرني عندما توضع في مقالة ما وصلة لصفحة أنشأتها.',
	'echo-pref-tooltip-reverted' => 'أشعرني عندما يرفض تعديل أجريته.',
	'echo-pref-tooltip-mention' => 'أشعرني عندما توضع في صفحة نقاش ما وصلة لصفحتي.',
	'echo-no-agent' => '[لا أحد]',
	'echo-no-title' => '[لا صفحة]',
	'echo-error-no-formatter' => 'لم يحدد للإشعارات أي تنسيق.',
	'echo-error-preference' => 'خطأ: لم تحفظ تفضيلات المستخدم.',
	'echo-error-token' => 'خطأ: لم يتوصل إلى مفتاح معطيات المستخدم.',
	'notifications' => 'إشعارات',
	'tooltip-pt-notifications' => 'إشعاراتك',
	'echo-specialpage' => 'إشعاراتي',
	'echo-anon' => 'لتلقي الإشعارات، [$1 أنشئ حسابا] أو [$2 سجل الدخول].',
	'echo-none' => 'ما من إشعارات لك.',
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
	'notification-user-rights' => '[[Special:Log/rights/$1|{{GENDER:$1|غير|غيرت}}]]  [[User:$1|$1]] صلاحياتك. $2. [[Special:ListGroupRights|المزيد]]',
	'notification-user-rights-flyout' => '{{GENDER:$1|غير|غيرت}} $1 صلاحياتك. $2. [[Special:ListGroupRights|المزيد]]',
	'notification-user-rights-add' => 'أنت الآن عضو في {{PLURAL:$2|مجموعة|مجموعات}}: $1',
	'notification-user-rights-remove' => 'ألغيت عضويتك في {{PLURAL:$2|مجموعة|مجموعات}}: $1',
	'notification-new-user' => '$1، مرحبا بك في {{SITENAME}}. أسعدنا بلقياك.',
	'notification-reverted2' => '{{GENDER:$1|رفض|رفضت}} [[User:$1|$1]] {{PLURAL:$4|تعديلك في [[:$2]]|تعديلاتك في [[:$2]]}}. $3',
	'notification-reverted-flyout2' => '{{GENDER:$1|رفض|رفضت}} $1 {{PLURAL:$4|تعديلك في $2|تعديلاتك في $2}}. $3',
	'notification-edit-talk-page-email-subject2' => '{{GENDER:$1|بعث|بعثت}} لك $1 برسالة في {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '{{GENDER:$1|بعث|بعثت}} لك $1 برسالة في صفحة نقاشك:',
	'notification-edit-talk-page-email-batch-body-with-section' => '{{GENDER:$1|بعث|بعثت}} لك $1 برسالة في صفحة نقاشك في "$2".',
	'notification-page-linked-email-subject' => 'وضعت وصلة لصفحتك في {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '{{GENDER:$1|وضعت}} وصلة إلى $2 في $3.',
	'notification-reverted-email-subject2' => '{{GENDER:$1|رفض{{PLURAL:$3||ت}}}} {{PLURAL:$3|تعديلك|تعديلاتك}} في {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '{{GENDER:$1|رفض|رفضت}} $1 {{PLURAL:$3|تعديلك|تعديلاتك}} في $2.',
	'notification-mention-email-subject' => ' {{GENDER:$1|أشار|أشارت}} إليك $1 في {{SITENAME}}',
	'notification-mention-email-batch-body' => ' {{GENDER:$1|أشار|أشارت}} إليك $1 في قسم "$3" من صفحة نقاش $4.',
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
	'echo-overlay-title-overflow' => '<b>إشعارات</b> (عرض $1 من $2 لم تقرأ)',
	'echo-mark-all-as-read' => 'اعتبرها كلها مقروءة',
	'echo-date-today' => 'اليوم',
	'echo-date-yesterday' => 'أمس',
	'echo-load-more-error' => 'وقع خطأ في إيراد المزيد من النتائج.',
	'notification-edit-talk-page-bundle' => '$1 و{{PLURAL:$4|مستخدم آخر|مستخدم آخر|مستخدمان آخران|$3 آخرون}} {{GENDER:$1|{{PLURAL:$4|بعثا|بعثا|بعثوا}}}} برسالة في [[User talk:$2|صفحة نقاشك]].',
	'notification-page-linked-bundle' => '{{GENDER:$1|وضعت}} وصلة إلى $2 في $3 و{{PLURAL:$5|صفحة أخرى|صفحة أخرى|صفحتين أخريين|$4 صفحات أخرى|$4 صفحة أخرى}}. [[Special:WhatLinksHere/$2|انظر جميع الوصلات إلى هذه الصفحة]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 و{{PLURAL:$3|مستخدم آخر|مستخدم آخر|مستخدمان آخران|$2 مستخدمين آخرين|$2 مستخدما آخر|$2 مستخدم آخر}} {{GENDER:$1|{{PLURAL:$3|بعثا|بعثا|بعثوا}}}} برسالة في صفحة نقاشك.',
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
	'echo-dismiss-button' => 'Descartar',
	'echo-dismiss-message' => "Desactivar tolos avisos del tipu ''$1''",
	'echo-dismiss-prefs-message' => 'Pue volver a activalo en [[Special:Preferences#mw-prefsection-echo|Preferencies]]',
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
	'echo-overlay-title-overflow' => '<b>Avisos</b> (amosando $1 de $2 ensin lleer)',
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
	'echo-overlay-title-overflow' => '<b>Bildirişlər</b> $2 {{PLURAL|$2|oxunmamış|oxunmamışlar}})dan $1 ({{PLURAL|$1|göstərilib|göstəriliblər}}',
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
	'notification-page-linked-email-body' => 'Ida saluhut pangait to alaman on', # Fuzzy
	'notification-edit-user-talk-email-batch-bundle-body' => 'alaman panghataion', # Fuzzy
	'notification-page-linked-email-batch-bundle-body' => 'alaman/alamanalaman', # Fuzzy
);

/** Belarusian (беларуская)
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
	'echo-new-messages' => 'Вы маеце новыя паведамленьні',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Паведамленьне ў|Паведамленьні ў}} гутарках',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Спасылка|Спасылкі}} на старонку',
	'echo-category-title-reverted' => '{{PLURAL:$1|Адкат праўкі|Адкаты правак}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Згадваньне|Згадваньні}}',
	'echo-category-title-other' => '{{PLURAL:$1|Іншае|Іншыя}}',
	'echo-category-title-system' => '{{PLURAL:$1|Сыстэмнае|Сыстэмныя}}',
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
	'notification-user-rights-add' => 'Цяпер Вы ўваходзіце ў {{PLURAL:$2|гэтую групу|гэтыя групы}}: $1',
	'notification-user-rights-remove' => 'Цяпер вы не ўваходзіце ў {{PLURAL:$2|гэтую групу|гэтыя групы}}: $1',
	'notification-new-user' => 'Вітаем у {{GRAMMAR:месны|{{SITENAME}}}}, $1! Мы радыя бачыць Вас.',
	'notification-reverted2' => '{{PLURAL:$4|Вашая праўка|Вашыя праўкі}} на старонцы [[:$2]] {{GENDER:$1|скасаваў|скасавала}} [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => '$1 {{GENDER:$1|скасаваў|скасавала}} {{PLURAL:$4|Вашую праўку|Вашыя праўкі}} на старонцы $2. $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|пакінуў|пакінула}} Вам паведамленьне на {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|пакінуў|пакінула}} Вам паведамленьне на старонцы абмеркаваньня:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|пакінуў|пакінула}} паведамленьне на Вашай старонцы гутарак у «$2».',
	'notification-page-linked-email-subject' => 'На вашую старонку спаслаліся ў {{GRAMMAR:месны|{{SITENAME}}}}',
	'notification-page-linked-email-batch-body' => 'На $2 {{GENDER:$1|спаслаліся}} з $3.',
	'notification-reverted-email-subject2' => '$1 {{GENDER:$1|скасаваў|скасавала}} {{PLURAL:$3|Вашую праўку|Вашыя праўкі}} на {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '$1 {{GENDER:$1|скасаваў|скасавала}} {{PLURAL:$3|Вашую праўку|Вашыя праўкі}} ў «$2».',
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
	'echo-overlay-title-overflow' => '<b>Абвесткі</b> (паказаныя $1 з $2 непрачытаных)',
	'echo-mark-all-as-read' => 'Пазначыць усё як прачытанае',
	'echo-date-today' => 'Сёньня',
	'echo-date-yesterday' => 'Учора',
	'echo-load-more-error' => 'Узьнікла памылка ў час атрыманьня дадатковых вынікаў.',
	'notification-edit-talk-page-bundle' => '$1 і $3 {{PLURAL:$4|іншы|іншыя}} {{GENDER:$1|пакінуў|пакінула}} паведамленьне на Вашай [[User talk:$2|старонцы гутарак]].',
	'notification-page-linked-bundle' => '$1 {{GENDER:$1|дадаў|дадала}} спасылку на $2 на старонцы $3 і {{PLURAL:$5|іншай старонцы|$4 іншых старонках}}. [[Special:WhatLinksHere/$2|Глядзіце ўсе спасылкі на гэтую старонку]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 і $2 {{PLURAL:$3|іншы|іншых}} {{GENDER:$1|пакінуў|пакінула}} паведамленьне на Вашай старонцы гутарак.',
	'notification-page-linked-email-batch-bundle-body' => '$1 {{GENDER:$1|дадаў|дадала}} спасылку на $2 на старонцы $3 і яшчэ $4 {{PLURAL:$5|старонкі|старонак}}.',
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
 */
$messages['bg'] = array(
	'echo-desc' => 'Система за съобщения',
	'prefs-echo' => 'Известия',
	'prefs-emailsettings' => 'Настройки за електронната поща',
	'prefs-displaynotifications' => 'Настройки за показване на списъка',
	'prefs-echosubscriptions' => 'Уведомявай ме за тези събития',
	'prefs-newmessageindicator' => 'Индикатор за ново съобщение',
	'echo-pref-web' => 'Уеб',
	'echo-pref-email' => 'Е-поща',
	'echo-pref-email-frequency-never' => 'Не ми изпращайте съобщения по е-поща',
	'echo-pref-email-frequency-immediately' => 'Отделни съобщения по ред не пристигане',
	'echo-pref-email-frequency-daily' => 'Дневник на съобщенията',
	'echo-pref-email-frequency-weekly' => 'Седмичник на съобщенията',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'обикновен текст',
	'echo-pref-notify-show-link' => 'Показвай съобщенията в инструментален панел',
	'echo-pref-new-message-indicator' => 'Показвай съобщения от дискусионната страница в инструментален панел',
	'echo-learn-more' => 'Научете повече',
	'echo-new-messages' => 'Имате нови съобщения.',
	'echo-category-title-edit-user-talk' => 'Дискусионна страница {{PLURAL:$1|}}',
	'echo-category-title-article-linked' => 'Page {{PLURAL:$1|препратка|препратки}}',
	'echo-category-title-reverted' => 'Редакция {{PLURAL:$1|връщане|връщания}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Споменаване|Споменавания}}',
	'echo-category-title-other' => '{{PLURAL:$1|Други}}',
	'echo-category-title-system' => '{{PLURAL:$1|Система}}',
	'echo-pref-tooltip-edit-user-talk' => 'Уведомете ме, ако получа съобщение или отговор на дискусионната ми страница (беседа).',
	'echo-pref-tooltip-article-linked' => 'Уведомете ме, ако някой постави препратка към създадена от мен статия.',
	'echo-pref-tooltip-reverted' => 'Уведомете ме, ако някой премахне моя редакция с връщане към предишна версия.',
	'echo-pref-tooltip-mention' => 'Уведомете ме, ако някой постави препратки към потребителската ми страница от друга беседа.',
	'echo-no-agent' => '[Никой]',
	'echo-no-title' => '[Няма страница]',
	'echo-error-no-formatter' => 'Няма установен формат за уведомяване.',
	'echo-error-preference' => 'Грешка: не бяха зададени потребителските предпочитания.',
	'notifications' => 'Известия',
	'tooltip-pt-notifications' => 'Вашите известия',
	'echo-specialpage' => 'Моите съобщения',
	'echo-anon' => 'За да получавате съобщения, [$1 създайте профил] или [$2 влезте в сайта].',
	'echo-none' => 'Нямате съобщения.',
	'echo-more-info' => 'Повече информация',
	'echo-feedback' => 'Обратна връзка',
	'notification-link-text-view-message' => 'Покажи съобщението',
	'notification-link-text-view-mention' => 'Покажи упоменаването',
	'notification-link-text-view-changes' => 'Показване на промените',
	'notification-link-text-view-page' => 'Показване на страница',
	'notification-link-text-view-edit' => 'Преглед на редакция',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|остави}} съобщение на Вашата [[User talk:$2#$3|беседа]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|остави}} съобщение на Вашата беседа  "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|остави}} съобщение на Вашата [[User talk:$2#$3|беседа]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|остави}} съобщение на Вашата беседа в  "[[User talk:$2#$3|$4]]".',
	'echo-overlay-link' => 'Всички известия',
	'echo-overlay-title' => 'Моите известия', # Fuzzy
	'echo-overlay-title-overflow' => 'Моите известия (показване на $1 от $2 непрочетени)', # Fuzzy
	'echo-date-today' => 'Днес',
	'echo-date-yesterday' => 'Вчера',
	'echo-load-more-error' => 'Възникна грешка при извличане на още резултати.',
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
	'echo-pref-email-frequency-daily' => 'একটি দৈনিক বিজ্ঞপ্তি সারাংশ',
	'echo-pref-email-frequency-weekly' => 'একটি সাপ্তাহিক বিজ্ঞপ্তি সারাংশ',
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
	'echo-pref-tooltip-mention' => 'কেউ কোনো আলাপ পাতায় আপনার ব্যবহারকারী পাতার লিঙ্ক প্রদান করলে আমাকে বিজ্ঞপ্তি দাও।',
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
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] আপনার আলাপ পাতায় "[[User talk:$2#$3|$4]]" একটি বার্তা {{GENDER:$1|রেখেছেন}}।',
	'notification-edit-talk-page-flyout2' => '$1 আপনার [[User talk:$2#$3|আলাপ পাতায়]] একটি বার্তা {{GENDER:$1|রেখেছেন}}।',
	'notification-edit-talk-page-flyout-with-section' => '$1 আপনার আলাপ পাতায় "[[User talk:$2#$3|$4]]" একটি বার্তা {{GENDER:$1|রেখেছেন}}।',
	'notification-page-linked' => '[[:$3]] থেকে [[:$2]] {{GENDER:$1|সংযুক্ত}} রয়েছে। [[Special:WhatLinksHere/$2|এই পাতার সাথে সকল সংযোগ দেখুন]]।',
	'notification-page-linked-flyout' => '[[:$3]] থেকে $2 {{GENDER:$1|সংযুক্ত}} রয়েছে।',
	'notification-add-comment2' => '[[User:$1|$1]] "[[$3|$2]]" সম্পর্কে "$4" আলাপ পাতায় {{GENDER:$1|মন্তব্য করেছেন}}',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] [[$3]] সম্পর্কে একটি নতুন বিষয় "$2" {{GENDER:$1|পোষ্ট করেছেন}}',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] আপনাকে একটি বার্তা {{GENDER:$1|পাঠিয়েছেন}}: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] সম্পর্কে "[[$3#$2|$2]]" আপনার আলাপ পাতায় {{GENDER:$1|মন্তব্য করেছেন}}',
	'notification-mention' => '[[User:$1|$1]]  $5 আলাপ পাতায়  [[$3#$2|$4]] এ আপনাকে {{GENDER:$1|উল্লেখ করেছেন}}।',
	'notification-mention-flyout' => '$1 $5 আলাপ পাতায় [[$3#$2|$4]] এ আপনাকে {{GENDER:$1|উল্লেখ করেছেন}}।',
	'notification-user-rights' => '[[User:$1|$1]] আপনার ব্যবহারকারী অধিকার [[Special:Log/rights/$1|{{GENDER:$1|পরিবর্তন করেছেন}}]]। $2। [[Special:ListGroupRights|আরও জানুন]]',
	'notification-user-rights-flyout' => '$1 আপনার ব্যবহারকারী অধিকার {{GENDER:$1|পরিবর্তন করেছেন}}। $2। [[Special:ListGroupRights|আরও জানুন]]',
	'notification-user-rights-add' => 'আপনি এখন থেকে {{PLURAL:$2|এই দলের|এই দলসমূহের}} একজন সদস্য: $1',
	'notification-user-rights-remove' => 'আপনি আর {{PLURAL:$2|এই দলের|এই দলসমূহের}} সদস্য নন।: $1',
	'notification-new-user' => '{{SITENAME}} সাইটে স্বাগতম, $1! আপনাকে এখানে পেয়ে আমরা খুব আনন্দিত।',
	'notification-reverted2' => 'আপনার {{PLURAL:$4[[:$2]] সম্পাদনা|[[:$2]] সম্পাদনাগুলো}}  [[User:$1|$1]] দ্বারা  {{GENDER:$1|ফেরত}} নেওয়া হয়েছে $3',
	'notification-reverted-flyout2' => '$2 এ সম্পর্কে আপনার  {{PLURAL:$4|সম্পাদনা|সম্পাদনাগুলো}}  $1 দ্বারা {{GENDER:$1|ফেরত}} আনা হয়েছে  $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{SITENAME}} এ আপনার জন্য একটি বার্তা {{GENDER:$1|রেখেছেন}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 আপনার আলাপ পাতায় একটি বার্তা {{GENDER:$1|রেখেছেন}}:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 আপনার আলাপ পাতায় "$2"-এ একটি বার্তা {{GENDER:$1|রেখেছেন}}।',
	'notification-page-linked-email-subject' => 'আপনার পাতাটি {{SITENAME}} সাইটে সংযুক্ত রয়েছে।',
	'notification-page-linked-email-batch-body' => '$2 পাতাটি $3 হতে {{GENDER:$1|সংযুক্ত}}',
	'notification-reverted-email-subject2' => 'সাইটে আপনার {{PLURAL:$3|সম্পাদনা|সম্পাদনাগুলো}} {{GENDER:$1|প্রত্যাহার}} করা হয়েছে',
	'notification-reverted-email-batch-body2' => '$1 দ্বারা আপনার {{PLURAL:$3|সম্পাদিত $2}} {{GENDER:$1|ফিরিয়ে }} নেওয়া হয়েছে।',
	'notification-mention-email-subject' => '$1 আপনাকে {{SITENAME}} পাতায় {{GENDER:$1|উল্লেখ করেছেন}}',
	'notification-mention-email-batch-body' => '$1 আপনাকে $4 আলাপ পাতায় "$3"-এ {{GENDER:$1|উল্লেখ করেছেন}}।',
	'notification-user-rights-email-subject' => '{{SITENAME}} এ আপনার ব্যবহারকারী অধিকার পরবর্তন হয়েছে',
	'notification-user-rights-email-batch-body' => ' $1 আপনার অধিকারসমূহ {{GENDER:$1|পরিবর্তন করেছেন}}। $2',
	'echo-email-subject-default' => '{{SITENAME}} এ নতুন বিজ্ঞপ্তি',
	'echo-email-body-default' => '{{SITENAME}} এ আপনার একটি নতুন বিজ্ঞপ্তি রয়েছে:

$1',
	'echo-email-batch-body-default' => 'আপনার নতুন একটি বিজ্ঞপ্তি রয়েছে',
	'echo-email-footer-default' => '$2

যে ইমেইল আমরা আপনাকে পাঠাই তা নিয়ন্ত্রণ করতে, আপনার পছন্দসমূহ পরীক্ষা করুন:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'যে ইমেইল আমরা আপনাকে পাঠাই তা নিয়ন্ত্রণ করতে, <a href="$2" style="text-decoration:none; color: #3868B0;">আপনার পছন্দসমূহ পরীক্ষা করুন</a>।<br />
$1',
	'echo-overlay-link' => 'সকল বিজ্ঞপ্তি',
	'echo-overlay-title' => '<b>বিজ্ঞপ্তি</b>',
	'echo-overlay-title-overflow' => '<b>বিজ্ঞপ্তি</b> (অপঠিত $2টির মধ্যে $1টি প্রদর্শিত হচ্ছে)',
	'echo-mark-all-as-read' => 'সব পঠিত বলে চিহ্নিত',
	'echo-date-today' => 'আজ',
	'echo-date-yesterday' => 'গতকাল',
	'echo-load-more-error' => 'আরও ফলাফল আনার সময় কোনো ত্রুটি হয়েছে।',
	'notification-edit-talk-page-bundle' => '$1 এবং $3 {{PLURAL:$4|অন্যরা}} [[User talk:$2|আপনার আলাপ পাতায়]] একটি {{GENDER:$1|বার্তা}} পাঠিয়েছেন।',
	'notification-page-linked-bundle' => '$3 এবং $4 অন্যরা  $2{{PLURAL:$5|পাতা|পাতাগুলিতে}} {{GENDER:$1|সংযোগ}} করেছেন।[[Special:WhatLinksHere/$2|সংযোগকারী পাতাগুলিকে দেখুন]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 এবং আরও $2 {{PLURAL:$3|জন}} আপনার আলাপ পাতায় বার্তা {{GENDER:$1|লিখেছেন}}।',
	'notification-page-linked-email-batch-bundle-body' => '$3 এবং $4 অন্যরা {{PLURAL:$5|পাতা|পাতাগুলিতে}} $2 {{GENDER:$1|সংযোগ}} করেছেন।',
	'echo-email-batch-subject-daily' => 'আপনি {{SITENAME}}-এ {{PLURAL:$2|একটি নতুন বিজ্ঞপ্তি|নতুন বিজ্ঞপ্তিসমূহ}} পেয়েছেন',
	'echo-email-batch-subject-weekly' => 'এই সপ্তাহে আপনি {{SITENAME}}-এ {{PLURAL:$2|একটি নতুন বিজ্ঞপ্তি|নতুন বিজ্ঞপ্তিসমূহ}} পেয়েছেন',
	'echo-email-batch-body-intro-daily' => 'প্রিয় $1,
{{SITENAME}} সাইটে আপনার জন্য দিনের কার্যক্রমের সারাংশ এখানে দেওয়া হল',
	'echo-email-batch-body-intro-weekly' => 'প্রিয় $1,
{{SITENAME}} সাইটে আপনার জন্য সপ্তাহের কার্যক্রমের সারাংশ এখানে দেওয়া হল',
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
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Testenn blaen',
	'echo-pref-notify-show-link' => "Diskouez ar c'hemennoù em barrenn ostilhoù",
	'echo-learn-more' => "Gouzout hiroc'h",
	'echo-new-messages' => "Kemennadennoù nevez zo ganeoc'h.",
	'echo-category-title-article-linked' => 'Pajenn {{PLURAL:$1|link}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Meneg}}',
	'echo-category-title-other' => '{{PLURAL:$1|All}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistem}}',
	'echo-pref-tooltip-edit-user-talk' => 'Kemenn din pa vez postet ur gemennadenn gant unan bennak pe pa respont war ma fajenn gaozeal.',
	'echo-no-agent' => '[Den]',
	'echo-no-title' => '[Pajenn ebet]',
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
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|en deus|he deus}} lezet ur gemennadenn war ho pajenn gaozeal :',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|en deus|he deus}} lezet ur gemennadenn war ho pajenn gaozeal e-barzh "$2".',
	'notification-page-linked-email-subject' => 'Liammet eo bet ho pajenn ouzh {{SITENAME}}',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|en deus|he deus}} ho meneget war {{SITENAME}}',
	'notification-user-rights-email-subject' => 'Cheñchet eo ho kwirioù implijer war {{SITENAME}}',
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
	'echo-dismiss-button' => 'Odbaci',
	'echo-dismiss-message' => 'Isključi sva $1 obavještenja',
	'echo-dismiss-prefs-message' => 'Možete ih ponovo uključiti u Vašim [[Special:Preferences#mw-prefsection-echo|postavkama]].',
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
	'echo-overlay-title-overflow' => '<b>Obavještenja</b> (prikaz $1 od $2 nepročitanih)',
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
	'echo-new-messages' => 'Teniu nous missatges.',
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
	'notification-page-linked' => '[[:$2]] ha estat {{GENDER:$1|enllaçada}} des de [[:$3]]. [[Special:WhatLinksHere/$2|Vegeu tots els enllaços a aquesta pàgina]].',
	'notification-page-linked-flyout' => '$2 ha estat {{GENDER:$1|enllaçada}} des de [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|ha fet un comentari}} sobre «[[$3|$2]]» a la pàgina de discussió «$4».',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|ha publicat}} un nou fil de discussió «$2» a [[$3]].',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] us {{GENDER:$1|ha enviat}} un missatge: «[[$3#$2|$2]]».',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|ha fet un comentari}} sobre «[[$3#$2|$2]]» a la vostra pàgina de discussió.',
	'notification-mention' => '[[User:$1|$1]] us {{GENDER:$1|ha mencionat}} a $5 en la seva pàgina de discussió sobre «[[$3#$2|$4]]».',
	'notification-mention-flyout' => '$1 us {{GENDER:$1|ha mencionat}} a $5 en la seva pàgina de discussió sobre «[[$3#$2|$4]]».',
	'notification-user-rights' => "Els vostres drets d'accés [[Special:Log/rights/$1|han estat {{GENDER:$1|canviats}}]] per [[User:$1|$1]]. $2. [[Special:ListGroupRights|Més informació]]",
	'notification-user-rights-flyout' => "Els vostres drets d'accés han estat {{GENDER:$1|canviats}} per $1. $2. [[Special:ListGroupRights|Més informació]]",
	'notification-user-rights-add' => "Ara sou membre d'{{PLURAL:$2|aquest grup|aquests grups}}: $1",
	'notification-user-rights-remove' => 'Heu deixat de pertànyer {{PLURAL:$2|al següent grup|als següents grups}}: $1',
	'notification-new-user' => 'Benvingut al projecte {{SITENAME}}, $1! Ens alegrem que estiguis aquí.',
	'notification-reverted2' => '{{PLURAL:$4|La vostra edició a [[:$2]] ha estat revertida|Les vostres edicions a [[:$2]] han estat revertides}} {{GENDER:$1|per}} [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|La vostra edició a $2 ha estat revertida|Les vostres edicions a $2 han estat revertides}} {{GENDER:$1|per}} $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 us {{GENDER:$1|ha deixat}} un missatge al projecte {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 us {{GENDER:$1|ha deixat}} un missatge en la vostra pàgina de discussió:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 us {{GENDER:$1|ha deixat}} un missatge en la vostra pàgina de discussió sobre «$2».',
	'notification-page-linked-email-subject' => 'La vostra pàgina ha estat enllaçada al projecte {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2 ha estat {{GENDER:$1|enllaçada}} des de $3.',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|La vostra edició ha estat revertida|Les vostres edicions han estat revertides}} {{GENDER:$1|al projecte}} {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|La vostra edició a $2 ha estat revertida|Les vostres edicions a $2 han estat revertides}} {{GENDER:$1|}}per $1.',
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
	'echo-overlay-title-overflow' => '<b>Notificacions</b> (mostrant $1 de $2 no llegides)',
	'echo-mark-all-as-read' => "Marca'ls tots com a llegits",
	'echo-date-today' => 'Avui',
	'echo-date-yesterday' => 'Ahir',
	'echo-load-more-error' => "S'ha produït un error en obtenir més resultats.",
	'notification-edit-talk-page-bundle' => '$1 i $3 {{PLURAL:$4|més}} {{GENDER:$1|han deixat}} un missatge a la seva [[User talk:$2|pàgina de discussió]].',
	'notification-page-linked-bundle' => '$2 ha estat {{GENDER:$1|enllaçat}} des de $3 i $4  {{PLURAL:$5|pàgina|pàgines}} més. [[Special:WhatLinksHere/$2|Vegeu tots els enllaços a aquesta pàgina]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 i $2 {{PLURAL:$3|més}} {{GENDER:$1|han deixat}} un missatge a la seva pàgina de discussió.',
	'notification-page-linked-email-batch-bundle-body' => '$2 ha {{GENDER:$1|enllaçat}} {{PLURAL:$5|una altra pàgina|altres pàgines}} des de $3 i $4.',
	'echo-email-batch-subject-daily' => 'Teniu {{PLURAL:$2|una nova notificació|noves notificacions}} al projecte {{SITENAME}}',
	'echo-email-batch-subject-weekly' => "Teniu {{PLURAL:$2|una nova notificació|noves notificacions}} d'aquesta setmana al projecte {{SITENAME}}",
	'echo-email-batch-body-intro-daily' => "Hola $1,
Aquí teniu un resum de l'activitat d'avui a {{SITENAME}}.",
	'echo-email-batch-body-intro-weekly' => "Hola $1,
Aquí teniu un resum de l'activitat d'aquesta setmana a {{SITENAME}}.",
	'echo-email-batch-link-text-view-all-notifications' => 'Vegeu totes les notificacions',
	'echo-rev-deleted-text-view' => 'Aquesta revisió de pàgina ha estat eliminada.',
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
	'echo-new-messages' => '汝有新其信息。',
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
	'echo-overlay-title-overflow' => '<b>通知</b>（未讀其通知顯示出$1條，共總有$2條）',
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
	'prefs-displaynotifications' => 'Гуш болу гӀирсаш',
	'echo-category-title-article-linked' => 'АгӀона тӀе {{PLURAL:$1|хьажориг|хьажоригаш}}',
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
	'echo-dismiss-button' => 'لایبە',
	'echo-dismiss-message' => 'ھەموو ئاگادارییەکانی $1 بکوژێنەوە',
	'echo-dismiss-prefs-message' => 'دەتوانی دیسان ئەمانە لە [[Special:Preferences#mw-prefsection-echo|ھەڵبژاردەکان]]تدا ھەڵ بکەیەوە.',
	'echo-new-messages' => 'پەیامی نوێت ھەیە.',
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
	'echo-overlay-title-overflow' => '<b>ئاگادارییەکان</b> (نیشاندانی $1 لە $2ی نەخوێنراو)',
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
	'echo-dismiss-button' => 'Zavřít',
	'echo-dismiss-message' => 'Vypnout všechna upozornění na $1',
	'echo-dismiss-prefs-message' => 'Znovu zapnout si je můžete v [[Special:Preferences#mw-prefsection-echo|nastavení]]',
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
	'echo-overlay-title-overflow' => '<b>Upozornění</b> (zobrazuje se $1 z $2 nepřečtených)',
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

/** Church Slavic (словѣ́ньскъ / ⰔⰎⰑⰂⰡⰐⰠⰔⰍⰟ)
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
	'echo-category-title-edit-user-talk' => 'y {{PLURAL:$1|Negeseuon}} ar dudalennau sgwrs',
	'echo-category-title-article-linked' => 'y {{PLURAL:$1|Cysylltau i dudalennau}}',
	'echo-category-title-reverted' => '{{PLURAL:$1|Dadwneud golygiadau}}',
	'echo-category-title-mention' => 'y {{PLURAL:$1|Cyfeiriadau}}',
	'echo-category-title-other' => '{{PLURAL:$1|Arall}}',
	'echo-category-title-system' => '{{PLURAL:$1|y Sustem}}',
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
	'echo-overlay-title-overflow' => '<b>Hysbysiadau</b> (yn dangos $1 o $2 heb eu darllen)',
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
	'echo-pref-email-format' => 'Email-format:',
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
	'echo-dismiss-button' => 'Afvis',
	'echo-dismiss-message' => 'Slå alle meddelelser fra af typen: $1',
	'echo-dismiss-prefs-message' => 'Du kan slå dem til igen i dine [[Special:Preferences#mw-prefsection-echo|indstillinger]]',
	'echo-new-messages' => 'Du har nye meddelelser',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|diskussionssideindlæg|diskussionssideindlæg}}', # Fuzzy
	'echo-category-title-article-linked' => '{{PLURAL:$1|Sidehenvisning|Sidehenvisninger}}',
	'echo-category-title-reverted' => '{{PLURAL:$1|Redigeringstilbagestillelse|Redigeringstilbagestillelser}}',
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
	'notification-edit-talk-page2' => '[[Bruger:$1|$1]] skrev et indlæg på din [[Brugerdiskussion:$2#$3|diskussionsside]].', # Fuzzy
	'notification-edit-talk-page-with-section' => '[[Bruger:$1|$1]] lagde en besked på din diskussionsside i "[[Brugerdiskussion:$2#$3|$4]]".', # Fuzzy
	'notification-edit-talk-page-flyout2' => '$1 skrev et indlæg på din [[User talk:$2#$3|diskussionsside]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 lagde en besked på din diskussionside i "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => 'Der blev henvist til [[:$2]] fra [[:$3]]: [[Special:WhatLinksHere/$2|Se alle henvisninger til siden]]', # Fuzzy
	'notification-page-linked-flyout' => 'Der blev {{GENDER:$1|henvist}} til $2 fra [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] kommenterede om "[[$3|$2]]" på diskussionssiden "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] skrev et nyt indlæg om "$2" på [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] har sendt dig en besked: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] kommenterede om "[[$3#$2|$2]]" på din diskussionsside',
	'notification-mention' => '[[User:$1|$1]] omtalte dig på diskussionssiden $5 i "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 omtalte dig på diskussionssiden $5 i "[[$3#$2|$4]]".',
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
	'echo-email-footer-default-html' => 'For att kontrollere hvilke beskeder, vi sender til dig, <a href="$2" style="text-decoration:none; color: #3868B0;">gå til dine indstillinger</a><br />
$1',
	'echo-overlay-link' => 'Alle meddelelser',
	'echo-overlay-title' => '<b>Meddelelser</b>',
	'echo-overlay-title-overflow' => '<b>Meddelelser<b> (viser $1 af $2 ulæste)',
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
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-Mail',
	'echo-pref-email-frequency-never' => 'Keine Benachrichtigungen',
	'echo-pref-email-frequency-immediately' => 'Individuelle Benachrichtigung zu jedem Ereignis',
	'echo-pref-email-frequency-daily' => 'Tägliche Benachrichtigung zu den Ereignissen',
	'echo-pref-email-frequency-weekly' => 'Wöchentliche Benachrichtigung zu den Ereignissen',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Klartext',
	'echo-pref-notify-show-link' => 'Benachrichtigungen in meiner Werkzeugleiste anzeigen',
	'echo-pref-new-message-indicator' => 'Diskussionsseitennachrichthinweise in meiner Benutzerleiste anzeigen',
	'echo-learn-more' => 'Mehr erfahren',
	'echo-dismiss-button' => 'Ausblenden',
	'echo-dismiss-message' => 'Alle „$1“-Benachrichtigungen abschalten',
	'echo-dismiss-prefs-message' => 'Du kannst dies in deinen [[Special:Preferences#mw-prefsection-echo|Einstellungen]] wieder aktivieren',
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
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|erwähnte}} dich auf der Diskussionsseite von $5 in „[[$3#$2|$4]]“.',
	'notification-mention-flyout' => '$1 {{GENDER:$1|erwähnte}} dich auf der Diskussionsseite von $5 in „[[$3#$2|$4]]“.',
	'notification-user-rights' => 'Deine Benutzerrechte [[Special:Log/rights/$1|wurden von [[User:$1|$1]] {{GENDER:$1|geändert}}]]. $2. [[Special:ListGroupRights|Mehr erfahren]]',
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
	'notification-user-rights-email-subject' => 'Deine Benutzerrechte auf {{SITENAME}} wurden geändert.',
	'notification-user-rights-email-batch-body' => 'Deine Benutzerrechte wurden von $1 {{GENDER:$1|geändert}}. $2',
	'echo-email-subject-default' => 'Neue Benachrichtigung auf {{SITENAME}}',
	'echo-email-body-default' => 'Es gibt eine neue Benachrichtigung auf {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Du hast eine neue Benachrichtigung',
	'echo-email-footer-default' => '$2

Um zu kontrollieren, welche E-Mails wir dir senden, überprüfe bitte deine Einstellungen:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Um zu kontrollieren, welche E-Mails wir dir senden, <a href="$2" style="text-decoration:none; color: #3868B0;">überprüfe deine Einstellungen</a>.<br />
$1',
	'echo-overlay-link' => 'Alle Benachrichtigungen',
	'echo-overlay-title' => '<b>Benachrichtigungen</b>',
	'echo-overlay-title-overflow' => '<b>Benachrichtigungen</b> ($1 von $2 ungelesenen werden angezeigt)',
	'echo-mark-all-as-read' => 'Alle als gelesen markieren',
	'echo-date-today' => 'Heute',
	'echo-date-yesterday' => 'Gestern',
	'echo-load-more-error' => 'Beim Abrufen mehrerer Ergebnisse ist ein Fehler aufgetreten.',
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
	'echo-new-messages' => 'Sie haben neue Nachrichten',
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
	'echo-specialpage' => 'Tebliğê me', # Fuzzy
	'echo-overlay-link' => 'Tebliği pêro...', # Fuzzy
	'echo-overlay-title' => 'Tebliğê me', # Fuzzy
);

/** Greek (Ελληνικά)
 * @author Aitolos
 * @author Dipa1965
 * @author Geraki
 * @author Glavkos
 * @author Protnet
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
	'notification-edit-talk-page-with-section' => '{{GENDER:$1|Ο|Η}} [[User:$1|$1]] άφησε μήνυμα στη σελίδα συζήτησής στην "[[User talk:$2#$3|$4]].',
	'notification-edit-talk-page-flyout2' => '{{GENDER:$1|Ο|Η}} $1 άφησε μήνυμα στη [[User talk:$2#$3|σελίδα συζήτησής]] σας.',
	'notification-edit-talk-page-flyout-with-section' => '{{GENDER:$1|Ο|Η}} $1 άφησε μήνυμα στη σελίδα συζήτησής στη[[User talk:$2#$3|$4]].',
	'notification-new-user' => 'Καλώς ήρθατε στο {{SITENAME}}, $1! Χαιρόμαστε που είστε εδώ.',
	'echo-email-subject-default' => 'Νέα ειδοποίηση στο {{SITENAME}}',
	'echo-overlay-link' => 'Όλες οι ειδοποιήσεις',
	'echo-overlay-title' => '<b>Ειδοποιήσεις</b>',
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
 * @author KuboF
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
	'echo-new-messages' => 'Vi havas novajn mesaĝojn.',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Mesaĝo|Mesaĝoj}} en diskutpaĝo',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Ligilo|Ligiloj}} al paĝo',
	'echo-category-title-mention' => '{{PLURAL:$1|Mencio|Mencioj}}',
	'echo-category-title-other' => '{{PLURAL:$1|Aliaj}}',
	'echo-pref-tooltip-edit-user-talk' => 'Sciigu min kiam io komencas diskuton aŭ respondas en mia diskutpaĝo.',
	'echo-pref-tooltip-article-linked' => 'Sciigu min kiam iu ligas al paĝo kiun mi kreis de artikolo.',
	'echo-pref-tooltip-reverted' => 'Sciigu min kiam iu malfaras mian redakton per ilo por malfari aŭ amasmalfari.',
	'echo-pref-tooltip-mention' => 'Sciigu min kiam iu ligas al mia uzantopaĝo de ajna diskutpaĝo.',
	'echo-no-agent' => '[Neniu]',
	'echo-no-title' => '[Sen Paĝo]',
	'echo-error-no-formatter' => 'Neniu aranĝo difinita por sciigo.',
	'echo-error-preference' => 'Eraro: Konserviĝo de uzanto-preferoj ne sukcesis.',
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
	'notification-new-user' => 'Bonvenon al {{SITENAME}}, $1! Ni ĝojas, ke vi estas ĉi tie.',
	'notification-page-linked-email-subject' => 'Via paĝo estas ligita en {{SITENAME}}',
	'echo-email-subject-default' => 'Nova sciigo en {{SITENAME}}',
	'echo-email-body-default' => 'Vi havas novan noton ĉe {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Vi havas novajn sciigojn.',
	'echo-overlay-link' => 'Ĉiuj sciigoj',
	'echo-overlay-title' => '<b>Sciigoj</b>',
	'echo-overlay-title-overflow' => '<b>Sciigoj</b> (montrante $1 de $2 nelegitaj)',
	'echo-mark-all-as-read' => 'Marki ĉiujn kiel legitaj',
	'echo-date-today' => 'Hodiaŭ',
	'echo-date-yesterday' => 'Hieraŭ',
	'echo-load-more-error' => 'Okazis eraro dum venigo de pliaj rezultoj.',
	'echo-email-batch-link-text-view-all-notifications' => 'Montri ĉiujn sciigojn',
);

/** Spanish (español)
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
	'echo-pref-new-message-indicator' => 'Mostrar el indicador de mensajes de páginas discusión en mi barra de herramientas',
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
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|dejó}} un mensaje en tu [[User talk:$2#$3|página de discusión]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|dejó}} un mensaje en tu página de discusión en "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|dejó}} un mensaje en tu [[User talk:$2#$3|página de discusión]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|dejó}} un mensaje en tu página de discusión en "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => '[[:$2]] fue {{GENDER:$1|enlazado}} a [[:$3]]. [[Special:WhatLinksHere/$2|Ver todos los enlaces a esta página]].',
	'notification-page-linked-flyout' => '$2 fue {{GENDER:$1|enlazado}} a [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|comentó}} en la sección "[[$3|$2]]" de la página de discusión de "$4".',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] inició un nuevo hilo, "$2", en [[$3]].',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|te envió}} un mensaje: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|comentó}} "[[$3#$2|$2]]" en  tu página de discusión.',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|te mencionó}} en la página de discusión de $5 en "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 {{GENDER:$1|te mencionó}} en la página de discusión de $5 en "[[$3#$2|$4]]".',
	'notification-user-rights' => 'Tus permisos de usuario [[Special:Log/rights/$1|han sido {{GENDER:$1|modificados}}]] por [[User:$1|$1]]. $2. [[Special:ListGroupRights|Ver más]]',
	'notification-user-rights-flyout' => 'Tus permisos de usuario {{GENDER:$1|han sido modificados}} por $1. $2. [[Special:ListGroupRights|Ver más]]',
	'notification-user-rights-add' => 'Ahora eres miembro {{PLURAL:$2|del siguiente grupo|de los siguientes grupos grupos}}: $1',
	'notification-user-rights-remove' => 'Has dejado de pertenecer {{PLURAL:$2|al siguiente grupo|a los siguientes grupos}}: $1',
	'notification-new-user' => '¡Bienvenido a {{SITENAME}}, $1! Nos alegra que estés aquí.',
	'notification-reverted2' => '{{PLURAL:$4|Tu|Tus}} {{PLURAL:$4|edición en [[:$2]] ha|ediciones en [[:$2]] han}} sido {{PLURAL:$4|revertida|revertidas}} por {{GENDER:$1|el|la|el}} usuari{{GENDER:$1|o|a|o}} [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Tu|Tus}} {{PLURAL:$4|edición en $2 ha|ediciones en $2 han}} sido {{PLURAL:$4|revertida|revertidas}} por {{GENDER:$1|el|la|el}} usuari{{GENDER:$1|o|a|o}} $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 te ha dejado un mensaje en {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 te ha dejado un mensaje en tu página de discusión:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 te ha dejado un mensaje en tu página de discusión en "$2"',
	'notification-page-linked-email-subject' => 'Se creó un enlace a tu página en {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2 ha sido {{GENDER:$1|enlazada}} desde $3.',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Tu|Tus}} {{PLURAL:$3|edición fue|ediciones fueron}} {{GENDER:$1|{{PLURAL:$3|revertida|revertidas}}}} en {{SITENAME}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Tu|Tus}} {{PLURAL:$3|edición en $2 ha sido|ediciones en $2 han sido}} {{GENDER:$1|{{PLURAL:$3|revertida|revertidas}}}} por $1.',
	'notification-mention-email-subject' => '$1 te ha {{GENDER:$1|mencionado}} en {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 te ha {{GENDER:$1|mencionado}} en la página de discusión de $4, en "$3"',
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
	'echo-overlay-title-overflow' => '<b>Notificaciones</b> (mostrando $1 de $2 sin leer)',
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
	'echo-dismiss-button' => 'Peida',
	'echo-dismiss-message' => 'Ära teavita järgmistest sündmustest: $1',
	'echo-dismiss-prefs-message' => 'Saad [[Special:Preferences#mw-prefsection-echo|eelistustes]] need tagasi sisse lülitada',
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
	'echo-overlay-title-overflow' => '<b>Teavitused</b> (nähtaval $1 $2-st lugemata teavitusest)',
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

/** Persian (فارسی)
 * @author A.R.Rostamzade
 * @author Dalba
 * @author Ebraminio
 * @author Ladsgroup
 * @author Mjbmr
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
	'echo-pref-web' => 'وبگاه',
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
	'echo-new-messages' => 'پیام‌های جدیدی دارید!',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|پیام|پیام‌های}} صفحهٔ بحث',
	'echo-category-title-article-linked' => '{{PLURAL:$1|پیوند|پیوندهای}} صفحه',
	'echo-category-title-reverted' => '{{PLURAL:$1|واگردانی|واگردانی}}',
	'echo-category-title-mention' => '{{PLURAL:$1|اشاره|اشاره}}',
	'echo-category-title-other' => '{{PLURAL:$1|دیگر}}',
	'echo-category-title-system' => '{{PLURAL:$1|سامانه}}',
	'echo-pref-tooltip-edit-user-talk' => 'هنگامی که کسی برای من پیام فرستاد یا جواب پیام مرا در صفحهٔ بحثم داد، با خبرم کن.',
	'echo-pref-tooltip-article-linked' => 'هنگامی که کسی به مقالهٔ ایجادشده توسط من پیوند داد، مرا آگاه کن.',
	'echo-pref-tooltip-reverted' => 'هنگامی که کسی ویرایشی را که من انجام داده‌ام را با استفاده از ابزار خثنی‌سازی یا واگردانی، خثنی کرد، مرا آگاه کن.',
	'echo-pref-tooltip-mention' => 'هنگامی که شخصی به صفحهٔ کاربری من در هر صفحه‌ای پیوند ایجاد کرد، مرا آگاه کن.',
	'echo-no-agent' => '[هیچ کس]',
	'echo-no-title' => '[بدون عنوان]',
	'echo-error-no-formatter' => 'هیچ الگوی تعریف‌شده‌ای برای آگاه‌سازی وجود ندارد',
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
	'notification-page-linked' => '[[:$2]] به دست $1 از [[:$3]] پیوند گرفت. [[Special:WhatLinksHere/$2|همهٔ پیوندها به این صفحه را ببینید]].',
	'notification-page-linked-flyout' => '$2 توسط $1 به [[:$3]] پیوند داده‌شده‌است.',
	'notification-add-comment2' => '[[User:$1|$1]] در «[[$3|$2]]» در صفحه بحث «$4» نظری افزود.',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] بخش جدیدی «$2» در [[$3]] ایجاد کرد.',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] به شما پیامی فرستاد: «[[$3#$2|$2]]»',
	'notification-add-comment-yours2' => '[[User:$1|$1]] در «[[$3#$2|$2]]» در صفحه بحث شما نظری داده‌است',
	'notification-mention' => '[[User:$1|$1]] به شما در بحث $5  در «[[$3#$2|$4]]» {{GENDER:$1|اشاره‌کرد}}.',
	'notification-mention-flyout' => '$1 در بحث $5 در «[[$3#$2|$4]]» به شما {{GENDER:$1|اشاره}} کرده‌است.',
	'notification-user-rights' => 'دسترسی‌های شما توسط [[User:$1|$1]] [[Special:Log/rights/$1|تغییر یافته است]] . $2. [[Special:ListGroupRights|بیشتر بخوانید]]',
	'notification-user-rights-flyout' => 'دسترسی‌های شما توسط $1. $2. [[Special:ListGroupRights|بیشتر بخوانید]]',
	'notification-user-rights-add' => 'شما در حال حاضر عضو  {{PLURAL:$2| این گروه|این گروه‌ها}} هستید:$1',
	'notification-user-rights-remove' => 'شما دیگر عضو {{PLURAL:$2| این گروه این گروه‌ها}} نیستید:$1',
	'notification-new-user' => 'به {{SITENAME}} خوش‌آمدید، $1! خوشحالیم که شما اینجا هستید.',
	'notification-reverted2' => '{{PLURAL:$4|ویرایش|ویرایش‌های}} شما در [[:$2]] توسط [[User:$1|$1]] واگردانی شده‌اند. $3',
	'notification-reverted-flyout2' => 'ویرایش شما  بر روی {{PLURAL:$4|$2|$2}} توسط   $1 واگردانی {{GENDER:$1|شده‌است}} . $3',
	'notification-edit-talk-page-email-subject2' => 'شما یک پیام تازه از طرف $1 در صفحهٔ بحث {{SITENAME}} دارید.',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|نوشته‌شده در صفحهٔ بحث شما}}',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 یک پیام در بحث شما در «$2» {{GENDER:$1|گذاشته‌است}}.',
	'notification-page-linked-email-subject' => 'صفحه‌ای که شما آغازگر آن بودید در {{SITENAME}} پیوند شد.',
	'notification-page-linked-email-batch-body' => '$2بود  {{GENDER:$1| مرتبط}} از$3',
	'notification-reverted-email-subject2' => 'ویرایش‌های شما در {{SITENAME}} {{GENDER:$1|واگردانی}}  {{PLURAL:$3|شد|شدند}}',
	'notification-reverted-email-batch-body2' => 'ویرایش شما بر روی  {{PLURAL:$3| $2|$2}}  توسط  $1  در {{SITENAME}} {{GENDER:$1| واگردانی}} شد.',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|شما ذکر شده در {{SITENAME}}}}',
	'notification-mention-email-batch-body' => '$1 در $4 صفحهٔ بحث «$3» به شما {{GENDER:$1|اشاره کرد}}',
	'notification-user-rights-email-subject' => 'دسترسی‌های شما در {{SITENAME}} تغییر یافته‌است',
	'notification-user-rights-email-batch-body' => 'دسترسی‌های شما توسط $1 تغییر یافته‌است. $2',
	'echo-email-subject-default' => 'آگاه‌سازی‌های تازه در {{SITENAME}}',
	'echo-email-body-default' => 'شما در {{SITENAME}} آگاه‌سازی تازه دارید:

$1',
	'echo-email-batch-body-default' => 'شما آگاه‌سازی تازه‌ای دارید.',
	'echo-email-footer-default' => '$2

برای کنترل رایانامه‌های ارسالی به شما ترجیحات‌تان را بررسی کنید:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'برای کنترل رایانامه‌ای که به شما ارسال می‌شود، <a href="$2" style="text-decoration:none; color: #3868B0;">ترجیحاتتان را چک کنید</a>.<br />
$1',
	'echo-overlay-link' => 'همهٔ آگاه‌سازی‌ها',
	'echo-overlay-title' => '<b>آگاه‌سازی‌ها</b>',
	'echo-overlay-title-overflow' => '<b>آگاه‌سازی‌ها</b> (نمایش  $1  از  $2  خوانده‌نشده)',
	'echo-mark-all-as-read' => 'نشان‌گذاری همه به‌عنوان خوانده‌شده',
	'echo-date-today' => 'امروز',
	'echo-date-yesterday' => 'دیروز',
	'echo-load-more-error' => 'دریافت نتیجه‌های بیشتر با خطا مواجه شده‌است.',
	'notification-edit-talk-page-bundle' => '$1 و $3 {{PLURAL:$4|کاربر دیگر|کاربر دیگر}} در صفحهٔ [[User talk:$2|بحث شما]] مطلبی فرستاده‌اند.',
	'notification-page-linked-bundle' => '$2 بدست $1 از  $3  و  $4  {{PLURAL:$5|صفحهٔ دیگر|صفحهٔ دیگر}} پیوند دریافت کرد. [[Special:WhatLinksHere/$2|دیدن همهٔ پیوندها به این صفحه]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 و $2 {{PLURAL:$3|شخص دیگر|دیگران}} در صفحهٔ بحث شما پیام گذاشته‌اند',
	'notification-page-linked-email-batch-bundle-body' => '$2 توسط $1 از $3 و $4 {{PLURAL:$5|صفحه دیگر|صفحه دیگر}} پیوند داده شد',
	'echo-email-batch-subject-daily' => 'شما دارای {{PLURAL:$2| آگاه‌سازی notification|new تازه}} در {{SITENAME}} هستید',
	'echo-email-batch-subject-weekly' => 'شما دارای  {{PLURAL:$2| آگاه‌سازی notification|new تازه}} در {{SITENAME}} این هفته',
	'echo-email-batch-body-intro-daily' => '$1 درود،
در اینجا خلاصه فعالیت امروز  {{SITENAME}} برای شما موجود است.',
	'echo-email-batch-body-intro-weekly' => '$1 درود،
در اینجا خلاصه فعالیت این هفته  {{SITENAME}} برای شما موجود است.',
	'echo-email-batch-link-text-view-all-notifications' => 'دیدن همهٔ آگاه‌سازی‌ها',
	'echo-rev-deleted-text-view' => 'بازنگری این صفحه متوقف شده‌است',
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
	'echo-desc' => 'Ilmoitusjärjestelmä',
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
	'echo-pref-new-message-indicator' => 'Näytä keskustelusivujen viesti-ilmaisin työkalurivilläni',
	'echo-learn-more' => 'Lisätietoja',
	'echo-new-messages' => 'Sinulle on uusia viestejä',
	'echo-category-title-edit-user-talk' => 'Keskustelusivun {{PLURAL:$1|viesti|viestit}}',
	'echo-category-title-article-linked' => 'Sivun {{PLURAL:$1|linkki|linkit}}',
	'echo-category-title-reverted' => '{{PLURAL:$1|Muokkauksen kumoaminen|Muokkausten kumoamiset}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Maininta|Maininnat}}',
	'echo-category-title-other' => '{{PLURAL:$1|Muu}}',
	'echo-category-title-system' => '{{PLURAL:$1|Järjestelmä}}',
	'echo-pref-tooltip-edit-user-talk' => 'Ilmoita minulle, kun joku kirjoittaa viestin tai vastaa viestiini keskustelusivullani.',
	'echo-pref-tooltip-article-linked' => 'Ilmoita minulle, kun joku linkittää luomaani sivuun artikkelisivulta.',
	'echo-pref-tooltip-reverted' => 'Ilmoita minulle, kun joku kumoaa tekemäni muokkauksen käyttäen kumoa/palauta-työkalua.',
	'echo-pref-tooltip-mention' => 'Ilmoita minulle, kun joku linkittää käyttäjäsivulleni joltakin keskustelusivulta.',
	'echo-no-agent' => '[Ei kukaan]',
	'echo-no-title' => '[Ei sivua]',
	'echo-error-no-formatter' => 'Mitään muotoilua ei ole määritelty tälle ilmoitukselle.',
	'echo-error-preference' => 'Virhe: Käyttäjäasetuksen määritys epäonnistui',
	'echo-error-token' => 'Virhe: Käyttäjätunnisteen haku epäonnistui',
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
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|jätti}} viestin keskustelusivullesi "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|jätti}} viestin [[User talk:$2#$3|keskustelusivullesi]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|jätti}} viestin keskustelusivullesi "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => '[[:$2]] {{GENDER:$1|linkitti}} sivulta [[:$3]]. [[Special:WhatLinksHere/$2|Katso kaikki linkit tälle sivulle]].',
	'notification-page-linked-flyout' => 'Sivu $2 {{GENDER:$1|linkitettiin}} sivulta [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|kommentoi}} aihetta "[[$3|$2]]" keskustelusivulla "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|lisäsi}} uuden aiheen "$2" sivulle [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|lähetti}} sinulle viestin: ”[[$3#$2|$2]]”',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|kommentoi}} aihetta "[[$3#$2|$2]]" keskustelusivullasi',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|mainitsi}} sinut käyttäjän $5 keskustelusivulla "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 {{GENDER:$1|mainitsi}} sinut käyttäjän $5 keskustelusivulla "[[$3#$2|$4]]".',
	'notification-user-rights' => '[[User:$1|$1]] [[Special:Log/rights/$1|{{GENDER:$1|muutti}}]] käyttöoikeuksiasi. $2. [[Special:ListGroupRights|Lisätietoja]]',
	'notification-user-rights-flyout' => '$1 {{GENDER:$1|muutti}} käyttöoikeuksiasi. $2. [[Special:ListGroupRights|Lisätietoja]]',
	'notification-user-rights-add' => 'Olet nyt {{PLURAL:$2|tämän ryhmän|näiden ryhmien}} jäsen: $1',
	'notification-user-rights-remove' => 'Et ole enää {{PLURAL:$2|tämän ryhmän|näiden ryhmien}} jäsen: $1',
	'notification-new-user' => 'Tervetuloa sivustolle {{SITENAME}}, $1! Olemme iloisia että olet täällä.',
	'notification-reverted2' => '[[User:$1|$1]] {{GENDER:$1|kumosi}} {{PLURAL:$4|muokkauksesi}} sivulla [[:$2]] $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Muokkauksesi sivulla $2}} on {{GENDER:$1|kumonnut}} käyttäjä $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|jätti}} sinulle viestin sivustolla {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|jätti}} viestin keskustelusivullesi:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|jätti}} viestin keskustelusivullesi "$2".',
	'notification-page-linked-email-subject' => 'Sivusi linkitettiin sivustolla {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2 {{GENDER:$1|linkitettiin}} sivulta $3',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Muokkauksesi}} sivustolla {{SITENAME}} on {{GENDER:$1|kumottu}}',
	'notification-reverted-email-batch-body2' => '$1 {{GENDER:$1|kumosi}} {{PLURAL:$3|muutoksesi sivuun $2}}',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|mainitsi}} sinut sivustolla {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|mainitsi}} sinut käyttäjän $4 keskustelusivulla "$3".',
	'notification-user-rights-email-subject' => 'Käyttöoikeutesi ovat muuttuneet sivustolla {{SITENAME}}',
	'notification-user-rights-email-batch-body' => '$1 {{GENDER:$1|muutti}} käyttöoikeuksiasi. $2',
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
	'echo-overlay-title-overflow' => '<b>Ilmoitukset</b> (näytetään $1 ($2) lukematonta)',
	'echo-mark-all-as-read' => 'Merkitse kaikki luetuiksi',
	'echo-date-today' => 'Tänään',
	'echo-date-yesterday' => 'Eilen',
	'echo-load-more-error' => 'Virhe ilmeni, kun haettiin lisää tuloksia.',
	'notification-edit-talk-page-bundle' => '$1 ja {{PLURAL:$4|yksi muu|$3 muuta}} {{GENDER:$1|jätti}} viestin [[User talk:$2|keskustelusivullesi]].',
	'notification-page-linked-bundle' => '$2 {{GENDER:$1|linkitettiin}} sivulta $3 ja {{PLURAL:$5|yhdeltä muulta sivulta|$4 muulta sivulta}}. [[Special:WhatLinksHere/$2|Katso kaikki linkit tälle sivulle]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 ja {{PLURAL:$3|yksi muu jätti|$2 muuta jättivät}} viestin keskustelusivullesi',
	'notification-page-linked-email-batch-bundle-body' => '$2 {{GENDER:$1|linkitettiin}} sivulta $3 ja {{PLURAL:$5|yhdeltä muulta sivulta|$4 muulta sivulta}}',
	'echo-email-batch-subject-daily' => 'Sinulle on {{PLURAL:$2|yksi uusi ilmoitus|$2 uutta ilmoitusta}} sivustolla {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Sinulle on {{PLURAL:$2|yksi uusi ilmoitus|$2 uutta ilmoitusta}} tällä viikolla sivustolla {{SITENAME}}',
	'echo-email-batch-body-intro-daily' => 'Hei $1.
Tässä on tiivistelmä sinulle tämän päivän tapahtumista sivustolla {{SITENAME}}.',
	'echo-email-batch-body-intro-weekly' => 'Hei $1.
Tässä on tiivistelmä sinulle tämän viikon tapahtumista sivustolla {{SITENAME}}.',
	'echo-email-batch-link-text-view-all-notifications' => 'Katso kaikki ilmoitukset',
	'echo-rev-deleted-text-view' => 'Tämä versio sivusta on häivytetty.',
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
	'echo-overlay-title-overflow' => '<b>Fráboðanir</b> (vísir $1 av $2 ólisnum)',
	'echo-mark-all-as-read' => 'Merk alt sum lisið',
	'echo-date-today' => 'Í dag',
	'echo-date-yesterday' => 'Í gjár',
);

/** French (français)
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
	'echo-pref-email-frequency-daily' => 'Un sommaire quotidien des notifications',
	'echo-pref-email-frequency-weekly' => 'Un sommaire hebdomadaire des notifications',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Texte brut',
	'echo-pref-notify-show-link' => "Afficher les notifications dans ma barre d'outils",
	'echo-pref-new-message-indicator' => 'Afficher l’indicateur de message sur la page de discussion dans ma barre d’outils',
	'echo-learn-more' => 'En savoir plus',
	'echo-dismiss-button' => 'Rejeter',
	'echo-dismiss-message' => 'Désactiver toutes les notifications $1',
	'echo-dismiss-prefs-message' => 'Vous pouvez les remettre en place dans vos [[Special:Preferences#mw-prefsection-echo|préférences]]',
	'echo-new-messages' => 'Vous avez de nouveaux messages',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Message|Messages}} de la page de discussion',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Article lié|Article liés}}',
	'echo-category-title-reverted' => '{{PLURAL:$1|Modification annulée|Modifications annulées}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Mention|Mentions}}',
	'echo-category-title-other' => '{{PLURAL:$1|Autres}}',
	'echo-category-title-system' => '{{PLURAL:$1|Système}}',
	'echo-pref-tooltip-edit-user-talk' => 'Me prévenir quand quelqu’un publie un message ou répond sur ma page de discussion.',
	'echo-pref-tooltip-article-linked' => 'Me prévenir quand quelqu’un fait référence à une page que j’ai créée à partir d’une page d’article.',
	'echo-pref-tooltip-reverted' => 'Me prévenir quand quelqu’un annule une modification que j’ai faite, en utilisant l’outil annulation ou retour arrière',
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
	'echo-overlay-title-overflow' => '<b>Notifications</b> ($1 de $2 non lues affichées)',
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
	'echo-email-batch-body-daily' => '$1,

vos avéd $2 notificacion{{PLURAL:$3||s}} dessus {{SITENAME}} houé.  Vêde-les ique :
{{canonicalurl:{{#special:Notifications}}}}

$4

$5', # Fuzzy
	'echo-email-batch-body-weekly' => '$1,

vos avéd $2 notificacion{{PLURAL:$3||s}} dessus {{SITENAME}} ceta semana.  Vêde-les ique :
{{canonicalurl:{{#special:Notifications}}}}

$4

$5', # Fuzzy
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
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|fíxolle}} unha mención na páxina de conversa de $5 na sección "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 {{GENDER:$1|fíxolle}} unha mención na páxina de conversa de $5 na sección "[[$3#$2|$4]]".',
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
	'echo-overlay-title-overflow' => '<b>Notificacións</b> (mostrando $1 de $2 sen ler)',
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

/** Gujarati (ગુજરાતી)
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
	'echo-new-messages' => 'તમારા માટે નવા સંદેશાઓ છે.',
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
	'notification-link-text-view-edit' => 'સમપાદન જુઓ',
	'notification-edit-talk-page2' => '[[User:$1|$1]]એ તમારાં [[User talk:$2#$3|ચર્ચા પાનાં]] પર સંદેશો {{GENDER:$1|છોડ્યો}} છે.',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]]એ તમારા ચર્ચા પાનાંમાં "[[User talk:$2#$3|$4]]" પર સંદેશો {{GENDER:$1|છોડ્યો}} છે.',
	'notification-edit-talk-page-flyout2' => '$1એ તમારા [[User talk:$2#$3|ચર્ચા પાનાં]] પર સંદેશો {{GENDER:$1|છોડયો}} છે.',
	'notification-edit-talk-page-flyout-with-section' => '$1એ તમારા "[[User talk:$2#$3|$4]]" ચર્ચા પાનાં પર સંદેશો {{GENDER:$1|છોડયો}} છે.',
	'notification-page-linked' => '{{GENDER:$1|linked}} દ્વારા [[:$2]], [[:$3]] પર જોડવામાં આવેલું. [[Special:WhatLinksHere/$2|આ પાનાંને સમ્બોધતી બધી કડીઓ જુઓ]].',
	'notification-add-comment2' => '[[User:$1|$1]]એ "$4"નાં "[[$3|$2]]" પર {{GENDER:$1|સંદેશો છોડ્યો}}.',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]]એ [[$3]] પર નવો વિશય "$2" {{GENDER:$1|ચાલૂ કર્યો}}.',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]]એ તમને નવો સંદેશો {{GENDER:$1|મોકલ્યો}}: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]]એ "[[$3#$2|$2]]" પર {{GENDER:$1|ટીપ્પણી કરી}}.',
	'notification-new-user' => '$1! તમારું {{SITENAME}} પર સ્વાગત છે. અમે તમરા જોડાણથી ખુશ છે.',
	'notification-page-linked-email-subject' => 'તમારુ પાનાની કડી {{SITENAME}} પર જોડવામાં આવી',
	'notification-user-rights-email-subject' => 'તમારાં {{SITENAME}} પરનાં અધિકારો બદલાયા છે.',
	'notification-user-rights-email-batch-body' => 'તમારા સભ્ય અધિકારો {{GENDER:$1|દ્વારા}} બદલાવવમાં આવ્યા છે. $2',
	'echo-email-subject-default' => '{{SITENAME}} પર નવી સૂચના',
	'echo-email-body-default' => 'તમારા માટે {{SITENAME}} પર નવી સૂચના છે:

$1',
	'echo-email-batch-body-default' => 'તમને નવો સંદેશ આવેલો છે',
	'echo-overlay-link' => 'બધી સૂચનાઓ',
	'echo-overlay-title' => '<b>સૂચનાઓ</b>',
	'echo-overlay-title-overflow' => '<b>સૂચનાઓ</b>($2 માં ની $1 સૂચનાઓ)',
	'echo-date-today' => 'આજે',
	'echo-date-yesterday' => 'ગઈ કાલે',
	'echo-load-more-error' => 'વધુ પરિણામો લાવતી વખતે એક ભૂલ આવી.',
	'echo-email-batch-subject-daily' => 'તમારા માટે {{SITENAME}} પર {{PLURAL:$2|નવી સૂચના|નવી સૂચનાઓ}} છે.',
	'echo-email-batch-body-intro-daily' => 'નમસ્કાર $1,
તમારુ {{SITENAME}} પર આજનું સારાંશ આ પ્રમાણે છે.',
	'echo-email-batch-body-intro-weekly' => 'નમસ્કાર $1,
તમારુ {{SITENAME}} પર સાપ્તાહિક સારાંશ આ પ્રમાણે છે.',
	'echo-email-batch-link-text-view-all-notifications' => 'બધાં સંદેશાઓ જુઓ',
	'echo-rev-deleted-text-view' => 'આ સૂધાર્ણા દબાવી દેવામાં આવી છે.',
);

/** Hebrew (עברית)
 * @author Amire80
 * @author Inkbug
 * @author Orsa
 * @author Ypnypn
 * @author דולב
 * @author חיים
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
	'echo-new-messages' => 'יש לך הודעות חדשות.',
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
	'notification-edit-talk-page-flyout-with-section' => "$1 {{GENDER:$1|כתב|כתבה}} כתבה בדף השיחה שלך הודעה תחת הכותרת '[[User talk:$2#$3|$4]]'.",
	'notification-page-linked' => '{{GENDER:$1|נוסף קישור}} אל הדף [[:$2]] מהדף [[:$3]]. [[Special:WhatLinksHere/$2|כל הקישורים אל הדף הזה]].',
	'notification-page-linked-flyout' => '{{GENDER:$1|נוסף קישור}} אל הדף $2 מהדף [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|העיר|העירה}} על הנושא "[[$3|$2]]" בדף השיחה של "$4".',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|והוסיף|הוסיפה}} את נושא החדש "$2" לדף [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|שלח|שלחה}} לך הודעה: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|העיר|העירה}} על הנושא "[[$3#$2|$2]]" בדף השיחה שלך',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|הזכיר|הזכירה}} אותך בדיון "[[$3#$2|$4]]" בדף השיחה של $5.',
	'notification-mention-flyout' => '$1 {{GENDER:$1|הזכיר|הזכירה}} אותך בדיון "[[$3#$2|$4]]" בדף השיחה של $5.',
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
	'notification-mention-email-batch-body' => "$1 {{GENDER:$1|הזכיר|הזכירה}} אותך בדיון בדך השיחה של $4 בדיון תחת הכותרת '$3'.",
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
	'echo-overlay-title-overflow' => '<b>הודעות</b> (מוצגות $1 מתוך $2 שלא נקראו)',
	'echo-mark-all-as-read' => 'לסמן שהכול נקרא',
	'echo-date-today' => 'היום',
	'echo-date-yesterday' => 'אתמול',
	'echo-load-more-error' => 'אירעה שגיאה בעת אחזור תוצאות נוספות.',
	'notification-edit-talk-page-bundle' => '$1 ועוד {{PLURAL:$4|אדם אחד|$3 אנשים אחרים}} כתבו הודעות ב[[User talk:$2|דף השיחה]] שלך.',
	'notification-page-linked-bundle' => 'אל הדף $2 {{GENDER:$1|נוסף קישור}} מהדף $3 ומעוד {{PLURAL:$5|דף|$4 דפים אחרים}}. [[Special:WhatLinksHere/$2|כל הקישורים אל הדף הזה]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 ועוד {{PLURAL:$3|אדם אחד|$2 אנשים אחרים}} כתבו הודעות בדף השיחה שלך.',
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
	'echo-new-messages' => 'आपके लिए नए संदेश हैं।',
	'echo-category-title-edit-user-talk' => 'वार्ता पृष्ठ {{PLURAL:$1| सन्देश}}',
	'echo-category-title-article-linked' => 'पृष्ठ  {{PLURAL:$1| कड़ी | कड़ियाँ}}',
	'echo-category-title-reverted' => 'संपादित करें  {{PLURAL:$1|पूर्ववत}}',
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
	'echo-error-preference' => 'त्रुटि: सदस्य पसंद निर्धारित नहीं किया जा सका।',
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
	'echo-overlay-title-overflow' => '<b>अधिसूचनाएँ</b> (दिखाई जा रही हैं नहीं पढ़ी गई $2 में से $1)',
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

/** Upper Sorbian (hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'echo-desc' => 'Zdźělenski system',
	'prefs-echo' => 'Zdźělenki',
	'prefs-emailsettings' => 'E-mejlowe nastajenja', # Fuzzy
	'prefs-displaynotifications' => 'Zwobraznjenske opcije',
	'prefs-echosubscriptions' => 'Mje wo tutych podawkach informować',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-mejl',
	'echo-learn-more' => 'Dalše informacije',
	'echo-dismiss-button' => 'Zaćisnyć',
	'echo-new-messages' => 'Maš nowe powěsće',
	'echo-no-agent' => '[Nichtó]',
	'echo-no-title' => '[Žana strona]',
	'echo-error-no-formatter' => 'Za zdźělenje njeje so formatowanje definowało',
	'notifications' => 'Zdźělenki',
	'tooltip-pt-notifications' => 'Twoje zdźělenki',
	'echo-specialpage' => 'Zdźělenki',
	'echo-anon' => 'Zo by zdźělenki dóstał, dyrbiš [$1 konto załožić] abo [$2 so přizjewić].',
	'echo-none' => 'Nimaš zdźělenki.',
	'echo-more-info' => 'Dalše informacije',
	'notification-new-user' => 'Witaj do {{GRAMMAR:genitiw|{{SITENAME}}}}, $1! Wjeselimy so, zo sy tu.',
	'notification-edit-talk-page-email-subject2' => 'Maš na {{GRAMMAR:lokatiw|{{SITENAME}}}} nowu powěsć na diskusijnej stronje', # Fuzzy
	'notification-user-rights-email-batch-body' => 'Twoje wužiwarske prawa su so wot $1 {{GENDER:$1|změnili}}. $2',
	'echo-email-subject-default' => 'Nowa zdźělenka na {{GRAMMAR:lokatiw|{{SITENAME}}}}',
	'echo-email-body-default' => 'Maš nowu zdźělenku na {{GRAMMAR:lokatiw|{{SITENAME}}}}:

$1',
	'echo-email-batch-body-default' => 'Maš nowu powěsć',
	'echo-email-footer-default' => '$2

Zo by kontrolował, kotre e-mejle ći sćelemy, přepruwuj swoje nastajenja:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-overlay-link' => 'Wšě zdźělenki',
	'echo-overlay-title' => '<b>Zdźělenki</b>',
	'echo-overlay-title-overflow' => '<b>Zdźělenki</b> ($1 z $2 {{PLURAL:$2|njepřitaneje|njepřečitaneju|njepřečitanych}} so {{PLURAL:$1|pokazuje|pokazujetej|pokazuja|pokazuje}})',
	'echo-mark-all-as-read' => 'Wšě jako přečitane markěrować',
	'echo-date-today' => 'Dźensa',
	'echo-date-yesterday' => 'Wčera',
	'echo-load-more-error' => 'Při wobstarowanju dalšich wuslědkow je zmylk wustupił.',
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
	'echo-dismiss-button' => 'Eltüntetés',
	'echo-dismiss-message' => 'Minden „$1” típusú értesítés kikapcsolása',
	'echo-dismiss-prefs-message' => '[[Special:Preferences#mw-prefsection-echo|A beállításaidnál]] tudod visszakapcsolni',
	'echo-new-messages' => 'Új üzeneteid vannak',
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
	'echo-overlay-title-overflow' => '<b>Értesítéseim</b> ($2 olvasatlanból $1 mutatva)',
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
	'echo-dismiss-button' => 'Clauder',
	'echo-dismiss-message' => 'Disactivar tote le notificationes de $1',
	'echo-dismiss-prefs-message' => 'Tu pote reactivar istes in le [[Special:Preferences#mw-prefsection-echo|preferentias]]',
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
	'echo-overlay-title-overflow' => '<b>Notificationes</b> ($1 monstrate de $2 non legite)',
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
	'echo-new-messages' => 'Anda memiliki pesan baru.',
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
	'echo-overlay-title-overflow' => '<b>Pemberitahuan</b> (menampilkan $1 dari $2 yang belum dibaca)',
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
	'echo-new-messages' => 'Adda dagiti baro a mensahem.',
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
	'echo-overlay-title-overflow' => '<b>Dagiti pakaammo</b> (agipakpakita ti $1 ti $2 a saan pay a nabasa)',
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
 * @author පසිඳු කාවින්ද
 */
$messages['is'] = array(
	'echo-link' => 'Tilkynningar',
);

/** Italian (italiano)
 * @author Beta16
 * @author Darth Kule
 * @author Eleonora negri
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
	'echo-pref-new-message-indicator' => 'Mostra la barra dei nuovi messaggi sulla mia pagina di discussione nella barra degli strumenti',
	'echo-learn-more' => 'Ulteriori informazioni',
	'echo-dismiss-button' => 'Nascondi',
	'echo-dismiss-message' => 'Nascondi tutte le notifiche di $1',
	'echo-dismiss-prefs-message' => 'È possibile riattivarle nelle [[Special:Preferences#mw-prefsection-echo|preferenze]]',
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
	'echo-anon' => 'Per ricevere le notifiche, [$1 registrati] o [$2 entra].',
	'echo-none' => 'Non hai notifiche.',
	'echo-more-info' => 'Altre informazioni',
	'echo-feedback' => 'Commenti',
	'notification-link-text-view-message' => 'Vedi messaggio',
	'notification-link-text-view-mention' => 'Vedi menzione',
	'notification-link-text-view-changes' => 'Vedi modifiche',
	'notification-link-text-view-page' => 'Vedi pagina',
	'notification-link-text-view-edit' => 'Vedi modifica',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|lasciato}} un messaggio sulla tua [[User talk:$2#$3|pagina di discussione]].',
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
	'echo-overlay-title-overflow' => '<b>Notifiche</b> (mostrate $1 di $2 non lette)',
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
ecco una sintesi delle attività di oggi su {{SITENAME}} per te',
	'echo-email-batch-body-intro-weekly' => 'Ciao $1,
ecco una sintesi delle attività di questa settimana su {{SITENAME}} per te',
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
	'echo-new-messages' => '新着メッセージがあります。',
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
	'echo-overlay-title-overflow' => '<b>通知</b> (未読 $2 件中 $1 件を表示中)',
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
 * @author NoiX180
 */
$messages['jv'] = array(
	'echo-desc' => 'Infrastruktur wara-wara gènèrasi ngarep kanggo MediaWiki', # Fuzzy
	'prefs-echo' => 'Wara-wara',
	'echo-no-agent' => '[Dudu sapa-sapa]',
	'echo-no-title' => '[Ora ana judhul]', # Fuzzy
	'notifications' => 'Wara-wara',
	'echo-specialpage' => 'Wara-wara kula', # Fuzzy
	'echo-anon' => 'Kanggo nampa wara-wara [$1 gawé akun] utawa [$2 mlebu log].',
	'echo-none' => 'Sampéyan durung nampa wara-wara apa-apa.', # Fuzzy
	'echo-email-subject-default' => 'Wara-wara anyar nèng {{SITENAME}}',
	'echo-email-body-default' => 'Sampéyan nduwé wara-wara anyar nèng {{SITENAME}}:

$1',
	'echo-overlay-link' => 'Kabèh wara-wara...', # Fuzzy
	'echo-overlay-title' => 'Wara-wara kula', # Fuzzy
);

/** Georgian (ქართული)
 * @author David1010
 */
$messages['ka'] = array(
	'echo-desc' => 'შეტყობინებების სისტემა',
	'prefs-echo' => 'შეტყობინებები',
	'prefs-emailsettings' => 'ელ. ფოსტის პარამეტრები', # Fuzzy
	'prefs-displaynotifications' => 'გამოსახვის პარამეტრები',
	'prefs-echosubscriptions' => 'შემატყობინეთ ამ ღონისძიებების შესახებ',
	'echo-pref-send-me' => 'გამომიგზავნეთ:',
	'echo-pref-web' => 'ქსელი',
	'echo-pref-email' => 'ელ. ფოსტა',
	'echo-category-title-edit-user-talk' => 'განხილვის გვერდის {{PLURAL:$1|შეტყობინება|შეტყობინება}}', # Fuzzy
	'echo-no-agent' => '[არავინ]',
	'echo-no-title' => '[არ არის გვერდი]',
	'notifications' => 'შეტყობინებები',
	'tooltip-pt-notifications' => 'თქვენი შეტყობინებები',
	'echo-specialpage' => 'შეტყობინებები',
	'echo-none' => 'თქვენ არ გაქვთ შეტყობინება.',
	'echo-more-info' => 'დეტალურად',
	'echo-feedback' => 'შეფასება',
	'notification-new-user' => 'კეთილი იყოს თქვენი მობრძანება საიტზე {{SITENAME}}, $1! ჩვენ მოხარული ვართ თქვენი აქ ყოფნით.',
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
	'echo-pref-email-frequency-weekly' => 'Хабарландырулардың апта сайынғы түйіндемесі',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Қалыпты мәтін',
	'echo-pref-notify-show-link' => 'Құралдар үстелімде ескертпелерді көрсету',
	'echo-pref-new-message-indicator' => 'Құралдар үстелімде талқылау беттегі хабарламалар көрсеткішін көрсету',
	'echo-learn-more' => 'Көбірек білу',
	'echo-dismiss-button' => 'Босату',
	'echo-dismiss-message' => 'Барлық $1 хабарландыруларды сөндіру',
	'echo-dismiss-prefs-message' => 'Сіз бұларды қайтадан [[Special:Preferences#mw-prefsection-echo|бапталымдарыңыздан]] қоса аласыз.',
	'echo-new-messages' => 'Сізде жаңа хабарламалар бар.',
	'echo-category-title-edit-user-talk' => 'Талқылау беттегі {{PLURAL:$1|хабарлама|хабарламалар}}',
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
	'notification-edit-talk-page2' => '[[User:$1|$1]][[User talk:$2#$3|талқылау бетіңізге]] хабарлама {{GENDER:$1|қалдырды}}.',
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
	'notification-user-rights' => 'Сіздің қатысушы құқықтарыңызды [[User:$1|$1]][[Special:Log/rights/$1| {{GENDER:$1|өзгерті}}]]. $2. [[Special:ListGroupRights|Толығырақ білу]]',
	'notification-user-rights-flyout' => 'Сіздің қатысушы құқықтарыңызды $1. $2 {{GENDER:$1|өзгерті}}. [[Special:ListGroupRights|Көбірек білу]]',
	'notification-user-rights-add' => 'Сіз қазір {{PLURAL:$2|бұл топтың|бұл топтардың}} мүшесісіз: $1',
	'notification-user-rights-remove' => 'Сіз {{PLURAL:$2|бұл топтың|бұл топтың}} көптен бергі мүшесі емессіз: $1',
	'notification-new-user' => '$1 {{SITENAME}} сайтына қош келдіңіз! Сіз осында болғаныңызға біз қуаныштымыз.',
	'notification-edit-talk-page-email-subject2' => '$1 {{SITENAME}} сайтында сізге хабарлама {{GENDER:$1|қалдырды}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 сіздің талқылау бетіңізге хабарлама {{GENDER:$1|қалдырды}}:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 сіздің талқылау бетіңіздегі  "$2" бөліміне хабарлама {{GENDER:$1|қалдырды}}.',
	'notification-page-linked-email-subject' => '{{SITENAME}} сайтында сіздің бетіңіз сілтенді',
	'notification-page-linked-email-batch-body' => '$2 $3 дегеннен {{GENDER:$1|сілтенді}}.',
	'notification-reverted-email-subject2' => '{{SITENAME}} сайтында сіздің {{PLURAL:$3|өңдемеңіз|өңдемелеріңіз}}{{GENDER:$1|қайтарылды}}',
	'notification-mention-email-subject' => '{{SITENAME}} сайтында $1 сізді {{GENDER:$1|атап өтті}}',
	'notification-mention-email-batch-body' => '$1 $4 талқылау бетінің "$3" бөлімінде сізді {{GENDER:$1|атап өтті}}.',
	'notification-user-rights-email-subject' => '{{SITENAME}} сайтында сіздің қатысушы құқықтарыңыз өзгерілді.',
	'notification-user-rights-email-batch-body' => 'Сіздің қатысушы құқықтарыңызды $1. $2 {{GENDER:$1|өзгерті}}.',
	'echo-email-subject-default' => '{{SITENAME}} сайтында жаңа ескертпелер',
	'echo-email-body-default' => '{{SITENAME}} сайтында сіз жаңа ескертпелер алдыңыз:

$1',
	'echo-email-batch-body-default' => 'Сізде жаңа ескертпелер бар.',
	'echo-overlay-link' => 'Барлық ескертпелер',
	'echo-overlay-title' => '<b>Ескертпелер</b>',
	'echo-overlay-title-overflow' => '<b>Ескертпелер</b> (көрселуде:$1 оқылмағандар:$2 )',
	'echo-mark-all-as-read' => 'Оқылды деп белгіле',
	'echo-date-today' => 'Бүгін',
	'echo-date-yesterday' => 'Ертең',
	'notification-edit-talk-page-bundle' => '$1 және {{PLURAL:$4|басқа|басқа}} $3 қатысушы[[User talk:$2|талқылау бетіңізге]] хабарлама {{GENDER:$1|қалдырды}}.',
	'notification-page-linked-bundle' => '$2 $3 және басқа $4 {{PLURAL:$5|беттен|беттен}} {{GENDER:$1|сілтенді}}. [[Special:WhatLinksHere/$2|Бұл бетке барлық сілтенгендерді көру]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 және {{PLURAL:$3|басқа|басқа}} $2 қатысушы талқылау бетіңізге хабарлама {{GENDER:$1|қалдырды}}.',
	'notification-page-linked-email-batch-bundle-body' => '$2 $3 және басқа $4 {{PLURAL:$5|беттен|беттен}} {{GENDER:$1|сілтенді}}.',
	'echo-email-batch-subject-daily' => 'Сіз {{SITENAME}} сайтында {{PLURAL:$2|жаңа ескертпе|жаңа ескертпелер}} алдыңыз',
	'echo-email-batch-subject-weekly' => 'Сіз осы аптада {{SITENAME}} сайтында {{PLURAL:$2|жаңа ескертпе|жаңа ескертпелер}} алдыңыз',
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
	'echo-new-messages' => 'ನಿಮಗೆ ಹೊಸ ಸಂದೇಶಗಳಿವೆ',
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
	'echo-overlay-title-overflow' => '<b>ಸೂಚನೆಗಳು</b> ($2 ರಲ್ಲಿ $1 ಓದದವುಗಳನ್ನು ತೋರಿಸಲಾಗುತ್ತಿದೆ)',
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
 * @author Freebiekr
 * @author Kwj2772
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
	'echo-new-messages' => '새 메시지가 있습니다.',
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
	'echo-overlay-title-overflow' => '<b>알림</b> (보여지는 $2개 중 $1개 읽지 않음)',
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
	'echo-new-messages' => 'Peyamên nû ji te re hene',
);

/** Latin (Latina)
 * @author Autokrator
 */
$messages['la'] = array(
	'echo-desc' => 'Modus litterarum electronicarum mittendarum',
	'prefs-echo' => 'Nuntia',
	'prefs-emailsettings' => 'Praeferentiae litterarum electronicarum',
	'prefs-displaynotifications' => 'Praeferentiae',
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
	'echo-pref-new-message-indicator' => 'Monstrare indicatorem paginarum disputationis in arca ferramentorum',
	'echo-learn-more' => 'Plura legere',
	'echo-new-messages' => 'Habes nuntia nova.',
	'echo-category-title-edit-user-talk' => 'Pagina disputationis {{PLURAL:$1|nuntium|nuntia}}',
	'echo-category-title-article-linked' => 'Pagina {{PLURAL:$1|nexus|nexus}}', # Fuzzy
	'echo-category-title-mention' => '{{PLURAL:$1|Mentio|Mentiones}}',
	'echo-category-title-other' => '{{PLURAL:$1|Alia}}',
	'echo-pref-tooltip-edit-user-talk' => 'Me certiorem facere si quis nuntionem mittat vel in pagina disputationis mea respondat.',
	'echo-pref-tooltip-article-linked' => 'Me certiorem facere si quis paginam nectit quam e quadam pagina commentationis creavi.',
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
	'notification-user-rights-add' => 'Nunc es sodalis {{PLURAL:$2|eius gregis|eorum gregium}}: $1',
	'notification-user-rights-remove' => 'Non iam es sodalis {{PLURAL:$2|eius gregis|eorum gregium}}: $1',
	'notification-new-user' => 'Salve ad paginam {{SITENAME}}, $1!',
	'notification-page-linked-email-subject' => 'Pagina tua directa est ad {{SITENAME}}',
	'notification-mention-email-subject' => '$1 tui {{GENDER:$1|mentionem fecit}} in pagina {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 tui {{GENDER:$1|mentionem fecit}} in $4 in "$3"',
	'echo-email-subject-default' => 'Nova nuntia in pagina {{SITENAME}}',
	'echo-email-body-default' => 'Habes nova nuntia in pagina {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'Habes novum nuntium.',
	'echo-email-footer-default' => '$2

Ad aptandum quales litteras electronicas tibi mittantur praeferentias tuas vide:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => 'Ad aptandum quales litteras electronicas tibi mittantur <a href="$2" style="text-decoration:none; color: #3868B0;"> praeferentias tuas vide</a>.<br />
$1',
	'echo-overlay-link' => 'Omnia nuntia',
	'echo-overlay-title' => '<b>Nuntia</b>',
	'echo-overlay-title-overflow' => '<b>Nuntia</b> (monstrans $1 de $2 inlectis)',
	'echo-mark-all-as-read' => 'Omnia perlecta indicare',
	'echo-date-today' => 'Hodie',
	'echo-date-yesterday' => 'Heri',
	'echo-load-more-error' => 'Error in plura eventa quaerendo.',
	'echo-email-batch-subject-daily' => 'Habes {{PLURAL:$2|novum nuntium|nova nuntia}} in pagina  {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Habes {{PLURAL:$2|novum nuntium|nova nuntia}} in pagina  {{SITENAME}} hac hebdomada',
	'echo-email-batch-body-intro-daily' => 'Salve $1,
Hoc est summarium actionum hodiernarum in pagina {{SITENAME}}.',
	'echo-email-batch-body-intro-weekly' => 'Salve $1,
Hoc est summarium actionum hebdomadum in pagina {{SITENAME}}.',
	'echo-email-batch-link-text-view-all-notifications' => 'Omnia nuntia spectare',
	'echo-rev-deleted-text-view' => 'Haec recensio paginae oppressa est.',
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
	'echo-pref-email-frequency-immediately' => "Individuell Notifikatiounen esou wéi s'erakommen",
	'echo-pref-email-frequency-daily' => 'All Dag e Resumé vun den Notifikatiounen',
	'echo-pref-email-frequency-weekly' => 'All Woch e Resumé vun den Notifikatiounen',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Kloertext',
	'echo-pref-notify-show-link' => 'Notifikatiounen a menger Geschirläischt weisen',
	'echo-pref-new-message-indicator' => 'Indicateur fir Messagen op menger Diskussiounssäit a menger Geschirläischt weisen',
	'echo-learn-more' => 'Fir méi ze wëssen',
	'echo-new-messages' => 'Dir hutt nei Messagen.',
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
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|huet}} op Är [[User talk:$2#$3|Diskussiounssäit]] geschriwwen.',
	'notification-page-linked-flyout' => '$2 gouf vun der Säit [[:$3]] {{GENDER:$1|verlinkt}}.',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|huet}} eng Bemierkung iwwer "[[$3|$2]]" op der "$4" Diskussiounssäit geschriwwen.',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|huet}} Iech ee Message geschéckt: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|huet}} op "[[$3#$2|$2]]" op Ärer Diskussiounssäit eng Bemierkung gemaach',
	'notification-mention-flyout' => '$1 {{GENDER:$1|huet}} Iech op der $5 Diskussiounssäit bei "[[$3#$2|$4]]" ernimmt.',
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
	'notification-mention-email-subject' => '$1 {{GENDER:$1|huet}} Iech op {{SITENAME}} ernimmt',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|huet}} Iech op der $4 Diskussiounssäit ernimmt bäi "$3".',
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
	'echo-overlay-title-overflow' => '<b>Notifikatiounen</b> (weist $1 vun $2 net geliesten)',
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

/** Lithuanian (lietuvių)
 * @author Eitvys200
 * @author Mantak111
 */
$messages['lt'] = array(
	'echo-desc' => 'Pranešimų sistema',
	'prefs-echo' => 'Pranešimai',
	'prefs-emailsettings' => 'El. pašto nustatymai',
	'prefs-displaynotifications' => 'Rodymo nuostatos',
	'prefs-echosubscriptions' => 'Praneškite man apie šiuos įvykius',
	'prefs-newmessageindicator' => 'Naujų žinučių indikatorius',
	'echo-pref-send-me' => 'Siųskite man:',
	'echo-pref-send-to' => 'Siųsti:',
	'echo-pref-web' => 'Internetas',
	'echo-pref-email' => 'El. paštas',
	'echo-pref-email-frequency-never' => 'Nesiųskite man jokiu el. pašto pranešimų',
	'echo-learn-more' => 'Sužinokite daugiau',
	'echo-dismiss-button' => 'Atmesti',
	'echo-dismiss-message' => 'Išjungti visus $1 pranešimus',
	'echo-new-messages' => 'Jūs turite naujų žinučių',
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
	'echo-email-batch-body-default' => 'Jūs turite naują pranešimą',
	'echo-overlay-link' => 'Visi pranešimai',
	'echo-overlay-title' => '<b>Pranešimai</b>',
	'echo-mark-all-as-read' => 'Pažymėti visus kaip skaitytus',
	'echo-date-today' => 'Šiandien',
	'echo-date-yesterday' => 'Vakar',
	'echo-load-more-error' => 'Įvyko klaida gaunant daugiau rezultatų.',
);

/** Latvian (latviešu)
 * @author Admresdeserv.
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
	'echo-pref-email-format-plain-text' => 'Vienkāršs teksta',
	'echo-pref-notify-show-link' => 'Rādīt paziņojumus manā rīkjoslā',
	'echo-pref-new-message-indicator' => 'Rādīt diskusiju lapas ziņojumu indikatoru manā rīkjoslā',
	'echo-learn-more' => 'Uzzināt vairāk',
	'echo-new-messages' => 'Jums nav jaunu paziņojumu',
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
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|atstāja}} ziņojumu jūsu diskusiju lapā "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => 'Uz [[:$2]] {{GENDER:$1|tika izveidota saite}} no [[:$3]]. [[Special:WhatLinksHere/$2|Apskatīt visas saites uz šo lapu]].',
	'notification-page-linked-flyout' => 'Uz $2 tika  {{GENDER:$1|izveidota saite}} no [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|komentēja}} par "[[$3|$2]]" "$4" diskusiju lapā',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|izveidoja}} jaunu tēmu "$2" [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|nosūtīja}} jums paziņojumu: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|komentēja}} par "[[$3#$2|$2]]" jūsu diskusiju lapā',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|pieminēja}} jūs $5 diskusiju lapā "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 {{GENDER:$1|pieminēja}} jūs $5 diskusiju lapā par "[[$3#$2|$4]]".',
	'notification-user-rights-add' => 'Jūs tagad esat {{PLURAL:$2|šīs grupas|šo grupu}} dalībnieks: $1',
	'notification-user-rights-remove' => 'Jūs vairs neesat {{PLURAL:$2|šīs grupas|šo grupu}} dalībnieks: $1',
	'notification-new-user' => 'Laipni lūdzam {{SITENAME}}, $1! Mēs priecājamies jūs te redzēt.',
	'notification-reverted2' => 'Jūsu {{PLURAL:$4|labojumu lapā [[:$2]]|labojumus lapā [[:$2]]}} {{GENDER:$1|atcēla}} [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => 'Jūsu {{PLURAL:$4|labojumu lapā $2|labojumus lapā $2}} {{GENDER:$1|atcēla}} $1. $3',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|atstāja}} paziņojumu jūsu diskusiju lapā:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|atstāja}} paziņojumu jūsu diskusiju lapā "$2".',
	'notification-page-linked-email-subject' => 'Uz jūsu lapu {{SITENAME}} tika izveidota saite',
	'notification-reverted-email-subject2' => 'Jūsu {{PLURAL:$3|labojums tika atcelts|labojumi tika atcelti}} {{SITENAME}}', # Fuzzy
	'notification-reverted-email-batch-body2' => 'Jūsu {{PLURAL:$3|labojumu $2|labojumus $2}} {{GENDER:$1|atcēla}} $1.',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|pieminēja}} jūs {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|pieminēja}} jūs $4 diskusiju lapā "$3".',
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
	'echo-overlay-title-overflow' => '<b>Paziņojumi</b> (rāda $1 no $2 nelasītiem)',
	'echo-mark-all-as-read' => 'Atzīmēt visus kā izlasītus',
	'echo-date-today' => 'Šodien',
	'echo-date-yesterday' => 'Vakar',
	'echo-load-more-error' => 'Ielasot vairāk rezultātus notika kļūda.',
	'echo-email-batch-subject-daily' => 'Jums ir {{PLURAL:$2|jauns paziņojums|jauni paziņojumi}} par {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'Jums šonedēļ ir {{PLURAL:$2|jauns paziņojums|jauni paziņojumi}} par {{SITENAME}}',
	'echo-email-batch-link-text-view-all-notifications' => 'Apskatīt visus paziņojumus',
);

/** Literary Chinese (文言)
 * @author Yanteng3
 */
$messages['lzh'] = array(
	'echo-new-messages' => '子有新訊息',
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
	'echo-dismiss-button' => 'Тргни',
	'echo-dismiss-message' => 'Исклучи ги сите $1 известувања',
	'echo-dismiss-prefs-message' => 'Овие можете пак да ги вклучите во [[Special:Preferences#mw-prefsection-echo|нагодувањата]]',
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
	'echo-overlay-title-overflow' => '<b>Известувања</b> (прикажувам $1 од $2 непрочитани)',
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
	'prefs-newmessageindicator' => 'നവസന്ദേശയടയാളം',
	'echo-pref-send-me' => 'എനിക്ക് അയയ്ക്കുക:',
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
	'echo-pref-notify-show-link' => 'അറിയിപ്പുകൾ എന്റെ ഉപകരണങ്ങളിൽ പ്രദർശിപ്പിക്കുക',
	'echo-pref-new-message-indicator' => 'പുതിയ സംവാദത്താൾ സന്ദേശങ്ങളുണ്ടെങ്കിൽ അടയാളം എന്റെ ഉപകരണപ്പെട്ടിയിൽ പ്രദർശിപ്പിക്കുക',
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
	'notification-edit-talk-page2' => 'താങ്കളുടെ [[User talk:$2#$3|സംവാദത്താളിൽ]] [[User:$1|$1]] ഒരു സന്ദേശം {{GENDER:$1|ചേർത്തു}} .',
	'notification-edit-talk-page-with-section' => "താങ്കളുടെ സംവാദത്താളിൽ ''[[User talk:$2#$3|$4]]'' എന്ന് [[User:$1|$1]] ഒരു സന്ദേശം {{GENDER:$1|ചേർത്തു}} .",
	'notification-edit-talk-page-flyout2' => 'താങ്കളുടെ [[User talk:$2#$3|സംവാദത്താളിൽ]] $1 ഒരു സന്ദേശം{{GENDER:$1|ചേർത്തിട്ടുണ്ട്}}.',
	'notification-edit-talk-page-flyout-with-section' => "താങ്കളുടെ സംവാദത്താളിൽ ''[[User talk:$2#$3|$4]]'' എന്ന് ഒരു സന്ദേശം  $1 {{GENDER:$1|ചേർത്തു}} .",
	'notification-page-linked' => '[[:$2]] എന്ന താളിലേയ്ക്ക് [[:$3]] എന്ന താളിൽ നിന്ന് കണ്ണി {{GENDER:$1|ചേർക്കപ്പെട്ടിരിക്കുന്നു}}: [[Special:WhatLinksHere/$2|ഈ താളിലേയ്ക്കുള്ള എല്ലാ കണ്ണികളും കാണുക]]',
	'notification-page-linked-flyout' => '$2 എന്ന താളിലേയ്ക്ക് [[:$3]] എന്ന താളിൽ നിന്ന് കണ്ണി {{GENDER:$1|ചേർക്കപ്പെട്ടിരിക്കുന്നു}}.',
	'notification-add-comment2' => '[[User:$1|$1]]  "$4" സംവാദത്താളിലെ "[[$3|$2]]" എന്നതിൽ {{GENDER:$1|കുറിപ്പിട്ടിരിക്കുന്നു}}',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] [[$3]] എന്ന താളിലെ "$2" എന്നതിൽ ഒരു പുതിയ വിഷയം {{GENDER:$1|ഇട്ടിരിക്കുന്നു}}',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]]  താങ്കൾക്ക് ഒരു സന്ദേശം {{GENDER:$1|അയച്ചിട്ടുണ്ട്}}: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] താങ്കളുടെ സംവാദത്താളിലെ "[[$3#$2|$2]]" എന്നതിൽ {{GENDER:$1|കുറിപ്പിട്ടു}}',
	'notification-mention' => '[[User:$1|$1]] താങ്കളെ $5 എന്ന സംവാദത്താളിൽ "[[$3#$2|$4]]" എന്ന് {{GENDER:$1|പരാമർശിച്ചിരിക്കുന്നു}}',
	'notification-mention-flyout' => '$1 താങ്കളെ [[$3#$2|$3]] $5 എന്ന ഉപയോക്താവിന്റെ സംവാദത്താളിൽ "[[$3#$2|$4]]" എന്നു {{GENDER:$1|പരാമർശിച്ചിരിക്കുന്നു}}',
	'notification-user-rights' => 'താങ്കളുടെ ഉപയോക്തൃ അവകാശങ്ങൾ [[User:$1|$1]] [[Special:Log/rights/$1|{{GENDER:$1|മാറ്റിയിരിക്കുന്നു}}]]. $2 . [[Special:ListGroupRights|കൂടുതലറിയുക]]',
	'notification-user-rights-flyout' => 'താങ്കളുടെ ഉപയോക്തൃ അവകാശങ്ങൾ $1 {{GENDER:$1|മാറ്റിയിരിക്കുന്നു}}. $2 . [[Special:ListGroupRights|കൂടുതലറിയുക]]',
	'notification-user-rights-add' => 'താങ്കളിപ്പോൾ {{PLURAL:$2|ഈ സംഘത്തിൽ|ഈ സംഘങ്ങളിൽ}} അംഗമാണ്: $1',
	'notification-user-rights-remove' => 'താങ്കളിപ്പോൾ {{PLURAL:$2|ഈ സംഘത്തിൽ|ഈ സംഘങ്ങളിൽ}} അംഗമല്ല: $1',
	'notification-new-user' => '{{SITENAME}} സംരംഭത്തിലേയ്ക്ക് സ്വാഗതം, $1! താങ്കളിവിടെ എത്തിയതിൽ സന്തോഷമുണ്ട്.',
	'notification-reverted2' => 'താങ്കൾ വരുത്തിയ {{PLURAL:$4|[[:$2]] താളിലെ തിരുത്ത്|[[:$2]] താളിലെ തിരുത്തുകൾ}} [[User:$1|$1]] {{GENDER:$1|മുൻപ്രാപനം ചെയ്തിരിക്കുന്നു}}  $3',
	'notification-reverted-flyout2' => 'താങ്കൾ വരുത്തിയ {{PLURAL:$4|$2 താളിലെ തിരുത്ത്|$2 താളിലെ തിരുത്തുകൾ}} $1{{GENDER:$1|മുൻപ്രാപനം ചെയ്തിരിക്കുന്നു}}  $3',
	'notification-edit-talk-page-email-subject2' => '{{SITENAME}} സംരംഭത്തിൽ $1 താങ്കൾക്കൊരു സന്ദേശം {{GENDER:$1|ചേർത്തിട്ടുണ്ട്}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 താങ്കളുടെ സംവാദത്താളിൽ ഒരു സന്ദേശം {{GENDER:$1|ചേർത്തിട്ടുണ്ട്}}:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 താങ്കളുടെ സംവാദത്താളിൽ "$2" എന്നതിൽ ഒരു സന്ദേശം {{GENDER:$1|ചേർത്തിട്ടുണ്ട്}}.',
	'notification-page-linked-email-subject' => 'താങ്കളുടെ താൾ {{SITENAME}} സംരംഭത്തിൽ കണ്ണിചേർക്കപ്പെട്ടിരിക്കുന്നു',
	'notification-page-linked-email-batch-body' => '$2 എന്ന താളിലേയ്ക്ക് $3 എന്ന താളിൽ നിന്ന് കണ്ണി {{GENDER:$1|ചേർക്കപ്പെട്ടിരിക്കുന്നു}}',
	'notification-reverted-email-subject2' => '{{SITENAME}} സംരംഭത്തിൽ താങ്കൾ വരുത്തിയ {{PLURAL:$3|തിരുത്ത്|തിരുത്തുകൾ}} {{GENDER:$1|മുൻപ്രാപനം ചെയ്തിരിക്കുന്നു}}',
	'notification-reverted-email-batch-body2' => 'താങ്കൾ വരുത്തിയ {{PLURAL:$3|$2 താളിലെ തിരുത്ത്|$2 താളിലെ തിരുത്തുകൾ}} $1 {{GENDER:$1|മുൻപ്രാപനം ചെയ്തിരിക്കുന്നു}}',
	'notification-mention-email-subject' => '$1 താങ്കളെ {{SITENAME}} സംരംഭത്തിൽ {{GENDER:$1|പരാമർശിച്ചിരിക്കുന്നു}}',
	'notification-mention-email-batch-body' => '$1 താങ്കളെ $4 സംവാദത്താളിൽ "$3" എന്നതിൽ {{GENDER:$1|പരാമർശിച്ചിരിക്കുന്നു}}.',
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
	'echo-overlay-title-overflow' => '<b>അറിയിപ്പുകൾ</b> (വായിക്കാത്ത $2 എണ്ണത്തിലെ $1 എണ്ണം കാണിക്കുന്നു)',
	'echo-mark-all-as-read' => 'എല്ലാം വായിച്ചതായി അടയാളപ്പെടുത്തുക',
	'echo-date-today' => 'ഇന്ന്',
	'echo-date-yesterday' => 'ഇന്നലെ',
	'echo-load-more-error' => 'കൂടുതൽ ഫലങ്ങൾ എടുക്കുന്നതിനിടെ ഒരു പിഴവുണ്ടായി.',
	'notification-edit-talk-page-bundle' => '$1 ഒപ്പം {{PLURAL:$4|മറ്റൊരാളും|$3 മറ്റുള്ളവരും}} താങ്കളുടെ [[User talk:$2|സംവാദത്താളിൽ]] സന്ദേശം{{GENDER:$1|ചേർത്തിരിക്കുന്നു}}.',
	'notification-page-linked-bundle' => '$2 എന്ന താളിലേയ്ക്ക് $3 എന്ന താളിൽ നിന്നും മറ്റ് $4 {{PLURAL:$5|താളിൽ|താളുകളിൽ}} നിന്നും കണ്ണി {{GENDER:$1|ചേർക്കപ്പെട്ടിരിക്കുന്നു}}. [[Special:WhatLinksHere/$2|ഈ താളിലേയ്ക്കുള്ള എല്ലാ കണ്ണികളും കാണുക]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 എന്ന ഉപയോക്താവും ഒപ്പം {{PLURAL:$3|മറ്റൊരു ഉപയോക്താവും|$2 മറ്റുപയോക്താക്കളും}} താങ്കളുടെ സം‌വാദത്താളിൽ സന്ദേശം {{GENDER:$1|ചേർത്തിരിക്കുന്നു}}',
	'notification-page-linked-email-batch-bundle-body' => '$2 എന്ന താളിലേയ്ക്ക് $3 എന്ന താളിൽ നിന്നും മറ്റ് $4 {{PLURAL:$5|താളിൽ|താളുകളിൽ}} നിന്നും {{GENDER:$1|കണ്ണി ചേർക്കപ്പെട്ടിരിക്കുന്നു}}',
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
 * @author Sankoswal
 * @author V.narsikar
 */
$messages['mr'] = array(
	'echo-desc' => 'अधिसूचना प्रणाली',
	'prefs-echo' => 'अधिसूचना',
	'prefs-emailsettings' => 'विपत्र एच्छिके',
	'prefs-displaynotifications' => 'प्रदर्शित करण्याचे पर्याय',
	'prefs-echosubscriptions' => 'ह्या उपक्रमाबद्दल कळवावे',
	'prefs-newmessageindicator' => 'नवीन संदेश निर्देशक',
	'echo-pref-send-me' => 'मला पाठवा',
	'echo-pref-send-to' => 'पाठवा',
	'echo-pref-email-format' => 'नवीन संदेश निर्देशक',
	'echo-pref-email' => 'ई-मेल',
	'echo-pref-email-frequency-never' => 'ईमेलद्वारे मला सूचित करू नये',
	'echo-pref-email-frequency-immediately' => 'त्वरित स्वतंत्र सूचना मिळण्याची सोय',
	'echo-learn-more' => 'अधिक जाणून घ्या',
	'echo-new-messages' => 'तुमच्यासाठी नवीन संदेश आहेत.',
	'echo-category-title-edit-user-talk' => 'चर्चा पान {{PLURAL:$1|संदेश}}',
	'echo-error-preference' => 'त्रूटी:सदस्य पसंतीक्रम स्थापता आला नाही.',
	'tooltip-pt-notifications' => 'आपल्या सूचना',
	'notification-edit-talk-page-flyout-with-section' => '$1 ने  "[[User talk:$2#$3|$4]]" येथे आपल्या चर्चा पानावर एक संदेश  {{GENDER:$1|टाकला}}.',
	'notification-edit-talk-page-email-batch-body2' => '$1 ने आपल्या चर्चा पानावर एक संदेश {{GENDER:$1|टाकला}}:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 ने "$2" मधील आपल्या चर्चा पानावर एक संदेश {{GENDER:$1|टाकला}}.',
	'notification-page-linked-email-subject' => '{{SITENAME}}वर आपले पान जोडल्या गेले आहे',
	'echo-email-batch-body-default' => 'आपणासाठी एक नविन अधिसूचना आहे.',
	'echo-email-footer-default-html' => 'आम्ही आपणास पाठविलेल्या विपत्रांवर नियंत्रणासाठी, <a href="$2" style="text-decoration:none; color: #3868B0;">आपला पसंतीक्रम तपासा</a>.<br />
$1',
	'echo-overlay-link' => 'सर्व सूचना पहा',
	'echo-overlay-title' => '<b>अधिसूचना</b>',
	'echo-overlay-title-overflow' => '<b> अधिसूचना </b>', # Fuzzy
	'echo-date-today' => 'आज',
	'echo-date-yesterday' => 'काल',
	'echo-email-batch-body-intro-daily' => 'नमस्कार $1,
आपण {{SITENAME}}वर केलेल्या आजच्या क्रियाकलापांचा सारांश येथे आहे.',
	'echo-email-batch-body-intro-weekly' => 'नमस्कार $1,
आपण {{SITENAME}}वर केलेल्या या आठवड्याच्या क्रियाकलापांचा सारांश येथे आहे.',
	'echo-email-batch-link-text-view-all-notifications' => 'सर्व सूचना पहा',
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
	'echo-dismiss-button' => 'Singkir',
	'echo-dismiss-message' => 'Matikan semua pemberitahuan $1',
	'echo-dismiss-prefs-message' => 'Anda boleh menghidupkannya semula dalam [[Special:Preferences#mw-prefsection-echo|keutamaan]] anda',
	'echo-new-messages' => 'Anda ada pesanan baru',
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
	'echo-overlay-title-overflow' => '<b>Pemberitahuan</b> (memaparkan $1 daripada $2 yang belum dibaca)',
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
 */
$messages['mt'] = array(
	'echo-desc' => "Sistema ta' notifika",
	'prefs-echo' => 'Notifiki',
	'prefs-emailsettings' => 'Għażliet għall-posta elettronika',
	'prefs-displaynotifications' => 'Għażliet għad-dehra',
	'prefs-echosubscriptions' => 'Għarrafni dwar dawn il-ġrajjiet',
	'prefs-newmessageindicator' => "Sinjal ta' messaġġi ġodda",
	'echo-pref-send-me' => 'Ibgħatli:',
	'echo-pref-send-to' => 'Ibgħat lil:',
	'echo-pref-email-format' => 'Format tal-posta elettronika:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'Posta elettronika',
	'echo-pref-email-frequency-never' => 'Tibgħatli ebda notifika bil-posta elettronika',
	'echo-pref-email-frequency-immediately' => 'In-notifiki individwali kif jidħlu',
	'echo-pref-email-frequency-daily' => "Sommarju ta' kuljum tan-notifiki",
	'echo-pref-email-frequency-weekly' => "Sommarju ta' kull ġimgħa tan-notifiki",
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Test normali',
	'echo-pref-notify-show-link' => 'Uri n-notifiki fl-iżbarra tal-għodda',
	'echo-pref-new-message-indicator' => 'Uri s-sinjal tal-messaġġi ġodda fil-paġna tad-diskussjoni tiegħi fl-iżbarra tal-għodda',
	'echo-learn-more' => 'Sir af aktar',
	'echo-new-messages' => 'Għandek messaġġi ġodda.',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Messaġġ|Messaġġi}} fuq il-paġna tad-dikussjoni',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Ħolqa|Ħoloq}} ma paġna',
	'echo-category-title-reverted' => '{{PLURAL:$1|Modifika annullata|Modifiki annullati}}',
	'echo-category-title-other' => '{{PLURAL:$1|Oħrajn}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistema}}',
	'echo-pref-tooltip-edit-user-talk' => 'Avżani meta xi ħadd jiktibli messaġġ jew iweġibni fuq il-paġna tad-diskussjoni tiegħi.',
	'echo-pref-tooltip-article-linked' => 'Avżani meta xi ħadd joħloq ħolqa minn artiklu għal paġna li ħlaqt jien.',
	'echo-pref-tooltip-reverted' => 'Avżani meta xi ħadd jannulla modifika li għamilt jien permezz tal-għodda tal-annullament (undo) jew tat-treġġigħ lura (rollback).',
	'echo-pref-tooltip-mention' => 'Avżani meta xi ħadd joħloq ħolqa minn xi paġna tad-diskussjoni għall-paġna tal-utent tiegħi.',
	'echo-no-agent' => '[Ħadd]',
	'echo-no-title' => '[L-ebda paġna]',
	'echo-error-no-formatter' => 'L-ebda formattazzjoni definita għan-notifiki',
	'echo-error-preference' => 'Żball: Il-preferenzi tal-utent ma setgħux jiġu ssettjati.',
	'echo-error-token' => 'Żball: It-token tal-utent ma setax jiġi rkuprat.',
	'notifications' => 'Notifiki',
	'tooltip-pt-notifications' => 'In-notifiki tiegħek',
	'echo-specialpage' => 'Notifiki',
	'echo-anon' => 'Sabiex tirċievi notifiki, [$1 oħloq kont] jew [$2 illoggja].',
	'echo-none' => "M'għandek l-ebda notifiki",
	'echo-more-info' => 'Aktar informazzjoni',
	'echo-feedback' => 'Kummenti',
	'notification-link-text-view-message' => 'Ara l-messaġġ',
	'notification-link-text-view-mention' => 'Ara t-tismija',
	'notification-link-text-view-changes' => 'Ara l-bidliet',
	'notification-link-text-view-page' => 'Ara l-paġna',
	'notification-link-text-view-edit' => 'Ara l-modifika',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|ħalla}} messaġġ fuq il-[[User talk:$2#$3|paġna tal-utent]] tiegħek.',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|ħalla}} messaġġ fuq il-paġna tad-diskussjoni tiegħek f\' "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|ħalla}} messaġġ fuq il-[[User talk:$2#$3|paġna tad-diskussjoni]] tiegħek.',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|ħalla}} messaġġ fil-paġna tad-diskussjoni tiegħek f\' "[[User talk:$2#$3|$4]]".$1',
	'notification-page-linked' => '[[:$2]] {{GENDER:$1|inħalqitilha}} ħolqa minn [[:$3]]. [[Special:WhatLinksHere/$2|Ara l-ħoloq għal din il-paġna kollha]].',
	'notification-new-user' => 'Merħba fuq {{SITENAME}}, $1!', # Fuzzy
	'echo-email-subject-default' => 'Notifika ġdida fuq {{SITENAME}}',
	'echo-email-body-default' => 'Għandek notifika ġdida fuq {{SITENAME}}:

$1',
	'echo-overlay-link' => 'Notifiki kollha…', # Fuzzy
	'echo-overlay-title' => 'Notifiki tiegħi', # Fuzzy
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
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|la inn}} en melding på [[User talk:$2#$3|diskusjonssiden din]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|etterlot}} en melding på din diskusjonsside under «[[User talk:$2#$3|$4]]».',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|la inn}} en melding på [[User talk:$2#$3|diskusjonssiden din]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|etterlot}} en melding på din diskusjonsside på "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => '[[:$2]] ble {{GENDER:$1|lenket til}} fra [[:$3]]. [[Special:WhatLinksHere/$2|Se alle lenker til denne siden]].',
	'notification-page-linked-flyout' => '$2 ble {{GENDER:$1|lenket til}} fra [[:$3]].',
	'notification-add-comment2' => "[[User:$1|$1]] {{GENDER:$1|kommenterte}} på ''[[$3|$2]]'' på diskusjonssiden ''$4''",
	'notification-add-talkpage-topic2' => "[[User:$1|$1]] {{GENDER:$1|postet}} en ny tråd ''$2'' på [[$3]]",
	'notification-add-talkpage-topic-yours2' => "[[User:$1|$1]] {{GENDER:$1|sendte}} deg en melding: ''[[$3#$2|$2]]''",
	'notification-add-comment-yours2' => "[[User:$1|$1]] {{GENDER:$1|kommenterte}} på ''[[$3#$2|$2]]'' på diskusjonssiden din",
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|nevnte}} deg i «[[$3#$2|$4]]» på diskusjonssiden til $5.',
	'notification-mention-flyout' => '$1 {{GENDER:$1|nevnte}} deg i «[[$3#$2|$4]]» på diskusjonssiden til $5.',
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
	'echo-overlay-title-overflow' => '<b>Varslinger</b> (viser $1 av $2 uleste)',
	'echo-mark-all-as-read' => 'Merk alle som leste',
	'echo-date-today' => 'I dag',
	'echo-date-yesterday' => 'I går',
	'echo-load-more-error' => 'En feil oppsto under henting av flere resultater.',
	'notification-edit-talk-page-bundle' => '$1 og $3 {{PLURAL:$4|annen|andre}} {{GENDER:$1|skrev}} en melding på [[User talk:$2|brukerdiskusjonen din]].',
	'notification-page-linked-bundle' => '$2 ble {{GENDER:$1|lenket til}} fra $3 og $4 {{PLURAL:$5|annen side|andre sider}}. [[Special:WhatLinksHere/$2|Se alle lenker til denne siden]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 og $2 {{PLURAL:$3|annen|andre}} {{GENDER:$1|skrev}} en melding på brukerdiskusjonen din',
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
	'echo-overlay-title-overflow' => "<b>Meldingen</b> ($1 van $2 he'j nog niet elezen)",
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

/** Dutch (Nederlands)
 * @author Kippenvlees1
 * @author Nemo bis
 * @author Rcdeboer
 * @author SPQRobin
 * @author Siebrand
 * @author Southparkfan
 * @author User555
 */
$messages['nl'] = array(
	'echo-desc' => 'Meldingensysteem',
	'prefs-echo' => 'Meldingen',
	'prefs-emailsettings' => 'E-mailinstellingen',
	'prefs-displaynotifications' => 'Weergaveopties',
	'prefs-echosubscriptions' => 'U over deze gebeurtenissen informeren',
	'prefs-newmessageindicator' => 'Melding nieuwe berichten',
	'echo-pref-send-me' => 'Wanneer verzenden:',
	'echo-pref-send-to' => 'Verzenden naar:',
	'echo-pref-email-format' => 'E-mailopmaak:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-mail',
	'echo-pref-email-frequency-never' => 'U geen meldingen via e-mail sturen',
	'echo-pref-email-frequency-immediately' => 'Individuele meldingen als ze binnenkomen',
	'echo-pref-email-frequency-daily' => 'Een dagelijkse samenvatting van meldingen',
	'echo-pref-email-frequency-weekly' => 'Een wekelijkse samenvatting van meldingen',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Platte tekst',
	'echo-pref-notify-show-link' => 'Melding in uw hulpbalk weergeven',
	'echo-pref-new-message-indicator' => 'Meldingen over berichten op uw overlegpagina in uw werkbalk weergeven',
	'echo-learn-more' => 'Meer lezen',
	'echo-new-messages' => 'U hebt nieuwe berichten',
	'echo-category-title-edit-user-talk' => 'Bericht{{PLURAL:$1||en}} op uw overlegpagina',
	'echo-category-title-article-linked' => 'Paginakoppeling{{PLURAL:$1||en}}',
	'echo-category-title-reverted' => 'Bewerking{{PLURAL:$1||en}} teruggedraaid',
	'echo-category-title-mention' => '{{PLURAL:$1|Genoemd}}',
	'echo-category-title-other' => '{{PLURAL:$1|Overige}}',
	'echo-category-title-system' => '{{PLURAL:$1|Systeem}}',
	'echo-pref-tooltip-edit-user-talk' => 'U een melding zenden als iemand een bericht plaatst of antwoordt op uw overlegpagina.',
	'echo-pref-tooltip-article-linked' => 'U een melding zenden als iemand een koppeling maakt naar een pagina die u hebt gemaakt.',
	'echo-pref-tooltip-reverted' => 'U een melding zenden als iemand een bewerking die u hebt gemaakt terugdraait via de functie ongedaan maken of terugdraaien.',
	'echo-pref-tooltip-mention' => 'U een melding zenden als iemand een koppeling maakt naar uw gebruikerspagina vanaf een overlegpagina.',
	'echo-no-agent' => '[Niemand]',
	'echo-no-title' => '[Geen pagina]',
	'echo-error-no-formatter' => 'Er is geen opmaak ingesteld voor de melding',
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
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|heeft}} een bericht op uw overlegpagina achtergelaten in het onderwerp "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|heeft een bericht geplaatst}} op uw [[User talk:$2#$3|overlegpagina]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|heeft}} een bericht op uw overlegpagina achtergelaten in het onderwerp "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => '[[:$2]] is {{GENDER:$1|gekoppeld}} vanaf [[:$3]]:[[Special:WhatLinksHere/$2|alle koppelingen naar deze pagina bekijken]]',
	'notification-page-linked-flyout' => '$2 is {{GENDER:$1|gekoppeld}} vanaf [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|heeft gereageerd}} op "[[$3|$2]]" op de overlegpagina "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|heeft}} een nieuw onderwerp "$2" geplaatst op [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|heeft}} u een bericht gezonden: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|heeft gereageerd}} op "[[$3#$2|$2]]" op uw overlegpagina',
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|heeft}} u genoemd op de overlegpagina van $5 in "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '$1 {{GENDER:$1|heeft}} u genoemd op de overlegpagina van $5 in "[[$3#$2|$4]]".',
	'notification-user-rights' => '[[Special:Log/rights/$1|Uw gebruikersrechten]] zijn {{GENDER:$1|gewijzigd}} door [[User:$1|$1]]. $2. [[Special:ListGroupRights|Meer informatie]]',
	'notification-user-rights-flyout' => 'Uw gebruikersrechten zijn {{GENDER:$1|gewijzigd}} door $1. $2. [[Special:ListGroupRights|Meer informatie]]',
	'notification-user-rights-add' => 'U bent nu lid van deze groep{{PLURAL:$2||en}}: $1',
	'notification-user-rights-remove' => 'U bent niet langer lid van deze groep{{PLURAL:$2||en}}: $1',
	'notification-new-user' => 'Welkom op {{SITENAME}}, $1! We zijn blij dat u hier bent.',
	'notification-reverted2' => 'Uw {{PLURAL:$4|bewerking op [[:$2]] is|bewerkingen op [[:$2]] zijn}} {{GENDER:$1|teruggedraaid}} [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => 'Uw {{PLURAL:$4|bewerking op $2 is|bewerkingen op $2 zijn}} {{GENDER:$1|teruggedraaid}} door $1 $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|heeft}} een bericht voor u achtergelaten op {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|heeft}} een bericht achtergelaten op uw overlegpagina:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|heeft}} een bericht achtergelaten op uw overlegpagina in "$2".',
	'notification-page-linked-email-subject' => 'Een pagina die u hebt aangemaakt is gekoppeld op {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '$2 is {{GENDER:$1|gekoppeld}} vanaf $3',
	'notification-reverted-email-subject2' => 'Uw {{PLURAL:$3|bewerking op {{SITENAME}} is|bewerkingen op {{SITENAME}} zijn}} {{GENDER:$1|teruggedraaid}}',
	'notification-reverted-email-batch-body2' => 'Uw {{PLURAL:$3|bewerking op $2 is|bewerkingen op $2 zijn}} {{GENDER:$1|teruggedraaid}} door $1',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|heeft}} u genoemd op {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|heeft}} u genoemd op de overlegpagina van $4 in "$3"',
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
	'echo-overlay-title-overflow' => '<b>Meldingen</b> ($1 van $2 ongelezen)',
	'echo-mark-all-as-read' => 'Alles als gelezen markeren',
	'echo-date-today' => 'Vandaag',
	'echo-date-yesterday' => 'Gisteren',
	'echo-load-more-error' => 'Er is een fout opgetreden tijdens het ophalen van meer resultaten.',
	'notification-edit-talk-page-bundle' => '$1 en $3 andere{{PLURAL:$4||anderen}} hebben een bericht {{GENDER:$1|geplaatst}} op uw [[User talk:$2|overlegpagina]].',
	'notification-page-linked-bundle' => "$2 is {{GENDER:$1|gekoppeld}} vanaf $3 en $4 andere pagina{{PLURAL:$5||'s}}. [[Special:WhatLinksHere/$2|Alle koppelingen naar deze pagina bekijken]]",
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 and $2 {{PLURAL:$3|andere gebruiker|andere gebruikers}} {{GENDER:$1|hebben}} een bericht op uw overlegpagina geplaatst',
	'notification-page-linked-email-batch-bundle-body' => "$2 is {{GENDER:$1|gekoppeld}} vanaf $3 en $4 andere pagina{{PLURAL:$5||'s}}",
	'echo-email-batch-subject-daily' => 'U hebt vandaag {{PLURAL:$2|0=geen nieuwe meldingen|een nieuwe melding|nieuwe meldingen}} op {{SITENAME}}',
	'echo-email-batch-subject-weekly' => 'U hebt deze week {{PLURAL:$2|0=geen nieuwe meldingen|een nieuwe melding|nieuwe meldingen}} op {{SITENAME}}',
	'echo-email-batch-body-intro-daily' => 'Hallo $1,
Hier is een samenvatting voor u van de activiteiten op {{SITENAME}} van vandaag',
	'echo-email-batch-body-intro-weekly' => 'Hallo $1,
Hier is een samenvatting voor u van de activiteiten op {{SITENAME}} van deze week.',
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
	'echo-email-batch-body-daily' => '$1,
Je hebt vandaag {{PLURAL:$3|0=geen meldingen|één melding|$2 meldingen}} op {{SITENAME}}. Hier kan je je meldingen bekijken:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5', # Fuzzy
	'echo-email-batch-body-weekly' => '$1,
Je hebt deze week {{PLURAL:$3|0=geen meldingen|één melding|$2 meldingen}} op {{SITENAME}}. Hier kan je je meldingen bekijken:
{{canonicalurl:{{#special:Notifications}}}}

$4

$5', # Fuzzy
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
	'echo-new-messages' => 'Du har nye meldingar.',
	'echo-category-title-edit-user-talk' => 'Diskusjonssidemelding{{PLURAL:$1||ar}}',
	'echo-category-title-article-linked' => 'Sidelenkje{{PLURAL:$1||r}}',
	'echo-category-title-reverted' => 'Attenderulling av endring{{PLURAL:$1||ar}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Omtale|Omtaler}}',
	'echo-category-title-other' => '{{PLURAL:$1|Anna}}',
	'echo-category-title-system' => '{{PLURAL:$1|System}}',
	'echo-pref-tooltip-edit-user-talk' => 'Meld meg når nokon skriv ei melding eller svarar på diskusjonssida mi.',
	'echo-pref-tooltip-article-linked' => 'Meld meg når nokon lenkjer frå ein artikkel til ei side eg har oppretta.',
	'echo-pref-tooltip-reverted' => 'Meld meg når nokon fjernar ei endring eg gjorde ved bruk av angrings- eller attenderullingsverktøyet.',
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
	'echo-overlay-title-overflow' => '<b>Meldingar</b> (viser $1 av $2 ulesne)',
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
	'echo-new-messages' => 'ଆପଣଙ୍କ ପାଇଁ ଏକ ନୂଆ ବାର୍ତ୍ତା ଅଛି',
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
	'echo-new-messages' => 'ਤੁਹਾਡੇ ਲਈ ਨਵੇਂ ਸੁਨੇਹੇ ਹਨ।',
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
	'echo-overlay-title-overflow' => '<b>ਸੂਚਨਾਵਾਂ</b> ($2 ਨਾ ਪੜ੍ਹੀਆਂ ਗਈਆਂ ਵਿੱਚੋਂ $1 ਦਿਖਾਈ ਜਾ ਰਹੀ ਹੈ)',
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
	'echo-dismiss-button' => 'Zamknij',
	'echo-dismiss-message' => 'Wyłącz wszystkie powiadomienia typu $1',
	'echo-dismiss-prefs-message' => 'Można włączyć je ponownie w [[Special:Preferences#mw-prefsection-echo|preferencjach]]',
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
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|wspomniał|wspomniała}} o tobie na stronie dyskusji $5 w wątku „[[$3#$2|$4]]”.',
	'notification-mention-flyout' => '$1 {{GENDER:$1|wspomniał|wspomniała}} o tobie w wątku „[[$3#$2|$4]]” na stronie dyskusji $5.',
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
	'notification-reverted-email-subject2' => '$1 {{GENDER:$1|zrewertował|zrewertowała}} {{PLURAL:$3|twoją edycję|twoje edycje}} w {{grammar:MS.lp|{{SITENAME}}}}',
	'notification-reverted-email-batch-body2' => '$1 {{GENDER:$1|zrewertował|zrewertowała}} {{PLURAL:$3|twoją edycję|twoje edycje}} na stronie $2',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|wspomniał|wspomniała}} o tobie w {{grammar:MS.lp|{{SITENAME}}}}',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|wspomniał|wspomniała}} o tobie na stronie dyskusji $4 w wątku „$3”.',
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
	'echo-overlay-title-overflow' => '<b>Powiadomienia</b> (wyświetlono $1 z $2 nieprzeczytanych)',
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
	'echo-anon' => 'Për arseive dle notìfiche, <span class="plainlinks">[$1 ch\'a crea un cont] o <span class="plainlinks">[$2 ch\'a intra ant ël sistema].',
	'echo-none' => "A l'ha gnun-e notìfiche.",
	'echo-more-info' => "Pi d'anformassion",
	'notification-edit-talk-page2' => "[[User:$1|$1]] {{GENDER:$1|a l'ha publicà}} dzora a soa [[User talk:$2#$3|pàgina ëd ciaciarade]].", # Fuzzy
	'notification-edit-talk-page-flyout2' => "$1 {{GENDER:$1|a l'ha publicà}} dzora soa [[User talk:$2#$3|pàgina ëd ciaciarade]].", # Fuzzy
	'notification-add-comment2' => "[[User:$1|$1]] {{GENDER:$1|a l'ha comentà}} su «[[$3|$2]]» an sla pàgina ëd discussion «$4»",
	'notification-add-talkpage-topic2' => "[[User:$1|$1]] {{GENDER:$1|a l'ha publicà}} n'argoment neuv «$2» dzor [[$3]]",
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|a l\'ha manda}}te un mëssagi: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => "[[User:$1|$1]] {{GENDER:$1|a l'ha comentà}} dzor «[[$3#$2|$2]]» su soa pàgina ëd ciaciarade",
	'notification-new-user' => 'Bin-ëvnù an {{SITENAME}}, $1!', # Fuzzy
	'notification-reverted2' => "{{PLURAL:$4|Soa modìfica dzor [[:$2]] a l'é stàita|Soe modìfiche dzor [[:$2]] a son stàite}} {{GENDER:$1|ripristinà}} da [[User:$1|$1]] $3",
	'notification-reverted-flyout2' => "{{PLURAL:$4|Soa modìfica dzor $2 a l'é stàita|Soe modìfiche dzor $2 a son stàite}} {{GENDER:$1|ripristinà}} da $1 $3",
	'notification-edit-talk-page-email-subject2' => "A l'ha un mëssagi neuv an soa pàgina ëd ciaciarade", # Fuzzy
	'notification-edit-talk-page-email-batch-body2' => "$1 {{GENDER:$1|a l'ha publicà}} dzora soa pàgina ëd ciaciarade", # Fuzzy
	'notification-reverted-email-subject2' => "{{PLURAL:$3|Toa modìfica dzor $2 a l'é stàit|Toe modìfiche dzor $2 a son stàite}} {{GENDER:$1|ripristinà}} da $1", # Fuzzy
	'notification-reverted-email-batch-body2' => "{{PLURAL:$3|Toa modìfica dzor $2 a l'é stàit|Toe modìfiche dzor $2 a son stàite}} {{GENDER:$1|ripristinà}} da $1", # Fuzzy
	'echo-email-subject-default' => 'Notìfiche neuve a {{SITENAME}}',
	'echo-email-body-default' => "It l'has na notìfica neuva a {{SITENAME}}:

$1",
	'echo-email-footer-default' => "$2

Për controlé che mëssagi i-j mandoma, ch'a vìsita:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1", # Fuzzy
	'echo-overlay-link' => 'Tute le notìfiche',
	'echo-overlay-title' => 'Mie notìfiche', # Fuzzy
	'echo-overlay-title-overflow' => 'Mie notìfiche (as na mostro $1 ëd $2 nen lesùe)', # Fuzzy
	'echo-date-today' => 'Ancheuj',
	'echo-date-yesterday' => 'Jer',
	'echo-load-more-error' => "A l'é capitaje n'eror an recuperand pi d'arzultà.",
	'echo-email-batch-subject-daily' => "It l'has $1 {{PLURAL:$2|notìfica|notìfiche}} ancheuj", # Fuzzy
	'echo-email-batch-subject-weekly' => "It l'has $1 {{PLURAL:$2|notìfica|notìfiche}} sta sman-a", # Fuzzy
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
	'echo-learn-more' => 'نور څه زده کول',
	'echo-new-messages' => 'تاسې نوي پيغامونه لرئ.',
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
	'echo-overlay-title-overflow' => '<b>يادگيرنې</b> (د$2 څخه $1 نالوستلي ښکاره کول)',
	'echo-mark-all-as-read' => 'ټول لوستی په نخښه کول',
	'echo-date-today' => 'نن',
	'echo-date-yesterday' => 'پرون',
	'echo-email-batch-link-text-view-all-notifications' => 'ټولې يادگيرنې کتل',
);

/** Portuguese (português)
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
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|deixou}} uma mensagem na sua [[User talk:$2#$3|página de discussão]].',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] {{GENDER:$1|deixou}} uma mensagem na sua página de discussão na secção "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|deixou}} uma mensagem na sua [[User talk:$2#$3|página de discussão]].',
	'notification-edit-talk-page-flyout-with-section' => '$1 {{GENDER:$1|deixou}} uma mensagem na sua página de discussão na secção "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => '[[:$2]] foi {{GENDER:$1|ligada}} a partir de [[:$3]]. [[Special:WhatLinksHere/$2|Veja todas as páginas que ligam a esta]].',
	'notification-page-linked-flyout' => '$2 foi {{GENDER:$1|ligada}} a partir de [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|comentou}} em "[[$3|$2]]" na página de discussão de "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|criou}} o novo tópico "$2" em [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|enviou-lhe}} uma mensagem: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|comentou}} a secção "[[$3#$2|$2]]" na sua página de discussão',
	'notification-mention' => '{{GENDER:$1|O|A}} [[User:$1|$1]] mencionou você na página de discussão $5, na secção "[[$3#$2|$4]]".',
	'notification-mention-flyout' => '{{GENDER:$1|O|A}} $1 mencionou você na página de discussão $5, na secção "[[$3#$2|$4]]".',
	'notification-user-rights' => 'Os seus privilégios de {{GENDER:$1|utilizador}} [[Special:Log/rights/$1|foram]] alterados por [[User:$1|$1]]. $2. [[Special:ListGroupRights|Saiba mais]]',
	'notification-user-rights-flyout' => 'Os seus privilégios de {{GENDER:$1|utilizadora}} foram alterados por $1. $2. [[Special:ListGroupRights|Saiba mais]]',
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
	'notification-mention-email-subject' => '$1 {{GENDER:$1|mencionou-o}} no {{SITENAME}}',
	'notification-mention-email-batch-body' => '$1 mencionou-{{GENDER:$1|o|a}} na página de discussão $4, na secção "$3".',
	'notification-user-rights-email-subject' => 'Os seus privilégios de utilizador foram alterados em {{SITENAME}}',
	'notification-user-rights-email-batch-body' => 'OS seus privilégios de utilizador foram {{GENDER:$1|alterados}} por $1. $2.',
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
	'echo-overlay-title-overflow' => '<b>Notificações</b> (a mostrar $1 de $2 não lidas)',
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
	'echo-dismiss-button' => 'Ignorar',
	'echo-dismiss-message' => 'Desligar todas notificações de $1',
	'echo-dismiss-prefs-message' => 'Você pode reativar em suas [[Special:Preferences#mw-prefsection-echo|preferências]]',
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
	'echo-overlay-title-overflow' => '<b>Notificações</b> (exibindo $1 de $2 não lidas)',
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
	'echo-dismiss-button' => 'Respinge',
	'echo-dismiss-message' => 'Dezactivează toate notificările tip $1',
	'echo-dismiss-prefs-message' => 'Le puteți reactiva în cadrul [[Special:Preferences#mw-prefsection-echo|preferințelor]] dumneavoastră.',
	'echo-new-messages' => 'Aveți mesaje noi.',
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
	'notification-mention' => '[[User:$1|$1]] {{GENDER:$1|v-a menționat}} pe pagina de discuții a utilizatorului $5, în cadrul secțiunii „[[$3#$2|$4]]”.',
	'notification-mention-flyout' => '$1 {{GENDER:$1|v-a menționat}} pe pagina de discuții a utilizatorului $5, în cadrul secțiunii „[[$3#$2|$4]]”.',
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
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|v-a menționat}} pe pagina de discuții a utilizatorului $4, în secțiunea „$3”.',
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
	'echo-overlay-title-overflow' => '<b>Notificări</b> (se afișează $1 din $2 necitite)',
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
	'echo-overlay-title-overflow' => '<b>Notifiche</b> (fà vedè $1 de $2 non lette)',
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
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|сообщение|сообщения}} на странице обсуждения',
	'echo-category-title-article-linked' => '{{PLURAL:$1|ссылка|ссылки}} на страницы',
	'echo-category-title-reverted' => '{{PLURAL:$1|отмена|отмены}} правок',
	'echo-category-title-mention' => '{{PLURAL:$1|упоминание|упоминания}}',
	'echo-category-title-other' => '{{PLURAL:$1|прочее|прочие}}',
	'echo-category-title-system' => '{{PLURAL:$1|системное|системные}}',
	'echo-pref-tooltip-edit-user-talk' => 'Сообщать мне, когда кто-то посылает сообщение или отвечает на моей странице обсуждения.',
	'echo-pref-tooltip-article-linked' => 'Сообщать мне, когда кто-то ссылается в статьях на созданную мной страницу',
	'echo-pref-tooltip-reverted' => 'Сообщать мне, когда кто-то отменил мою правку, используя функциу отмены или отката.',
	'echo-pref-tooltip-mention' => 'Сообщать мне, когда кто-то ссылается на мою страницу участника с любой страницы обсуждения.',
	'echo-no-agent' => '[Никто]',
	'echo-no-title' => '[Нет страницы]',
	'echo-error-no-formatter' => 'Форматирование не определено для уведомления',
	'echo-error-preference' => 'Ошибка: Не удаллось задать настройки участника',
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
	'notification-user-rights' => 'Ваши права пользователя [[Special:Log/rights/$1|{{GENDER:$1|изменил|изменила}}]] [[User:$1|$1]]. $2. [[Special:ListGroupRights|Подробнее]]',
	'notification-user-rights-flyout' => 'Права пользователя {{GENDER:$1|изменил|изменила}} $1. $2. [[Special:ListGroupRights|Подробнее]]',
	'notification-user-rights-add' => 'Теперь вы входите в {{PLURAL:$2|следующую группу|следующие группы}}: $1',
	'notification-user-rights-remove' => 'Вы больше не входите в {{PLURAL:$2|следующую группу|следующие группы}}: $1',
	'notification-new-user' => 'Добро пожаловать в {{SITENAME}}, $1! Мы рады, что вы здесь.',
	'notification-reverted2' => '{{PLURAL:$4|Вашу правку на станице [[:$2]]|Ваши правки на странице [[:$2]]}}  {{GENDER:$1|отменил|отменила}} [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Вашу правку на странице $2|Ваши правки на странице $2}} {{GENDER:$1|отменил|отменила}} $1. $3',
	'notification-edit-talk-page-email-subject2' => '{{GENDER:$1|Участник|Участница}} $1 {{GENDER:$1|оставил|оставила}} вам сообщение на сайте «{{SITENAME}}»',
	'notification-edit-talk-page-email-batch-body2' => '{{GENDER:$1|Участник|Участница}} $1 {{GENDER:$1|оставил|оставила}} сообщение на вашей странице обсуждения:',
	'notification-edit-talk-page-email-batch-body-with-section' => '{{GENDER:$1|Участник|Участница}} $1 {{GENDER:$1|оставил|оставила}} вам сообщение на вашей странице обсуждения в разделе (теме) «$2»',
	'notification-page-linked-email-subject' => 'На сайте «{{SITENAME}}» появилась ссылка на вашу страницу участника',
	'notification-page-linked-email-batch-body' => '{{GENDER:$1|Участник|участница}} $1 {{GENDER:$1|сослался|сослалась}} на $2 из $3',
	'notification-reverted-email-subject2' => '{{GENDER:$1|Кто-то}} отменил {{PLURAL:$3|вашу правку|ваши правки}} на сайте «{{SITENAME}}»',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Ваша правка на странице «$2» была отменена|Ваши правки на странице «$2» были отменены}} {{GENDER:$1|участником|участницей}} $1.',
	'notification-mention-email-subject' => '{{GENDER:$1|Участник|Участница}} $1 {{GENDER:$1|упомянул|упомянула}} вас на сайте «{{SITENAME}}»',
	'notification-mention-email-batch-body' => '$1 {{ПОЛ:$1|, упоминается}} вы на $4 страница обсуждения в "$3".',
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
	'echo-overlay-title-overflow' => '<b>Уведомления</b> ({{PLURAL|$1|показано|показаны}} $1 из $2 {{PLURAL|$2|непрочитанного|непрочитанных}})',
	'echo-mark-all-as-read' => 'Отметить все как прочитанные',
	'echo-date-today' => 'Сегодня',
	'echo-date-yesterday' => 'Вчера',
	'echo-load-more-error' => 'Произошла ошибка при получении дополнительных результатов.',
	'notification-edit-talk-page-bundle' => '$1 и $3 {{PLURAL:$4|другой|других}} {{GENDER:$1|участников}} оставили сообщение на вашей [[User talk:$2|странице обсуждения]].',
	'notification-page-linked-bundle' => 'На страницу «$2» есть {{GENDER:$1|ссылка}} со страницы «$3» и ещё $4 {{PLURAL:$5|страницы|страниц}}. [[Special:WhatLinksHere/$2|См. все ссылки на эту страницу]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 и $2 {{PLURAL:$3|другой|других}} {{GENDER:$1|участников}} оставили сообщение на вашей странице обсуждения.',
	'notification-page-linked-email-batch-bundle-body' => 'На страницу «$2» есть {{GENDER:$1|ссылка}} со страницы «$3» и ещё $4 {{PLURAL:$5|страницы|страниц}}',
	'echo-email-batch-bullet' => '•',
	'echo-email-batch-subject-daily' => 'Вы получили $2 {{PLURAL:$2|новое уведомление|новых уведомления|новых уведомлений}} в проекте «{{SITENAME}}»',
	'echo-email-batch-subject-weekly' => 'На этой неделе вы получили $2 {{PLURAL:$2|новое уведомление|новых уведомления|новых уведомлений}} в проекте «{{SITENAME}}»',
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
	'echo-new-messages' => 'भवते नूतनसन्देशाः सन्ति |',
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
	'echo-overlay-title' => 'මගේ නිවේදන', # Fuzzy
	'echo-overlay-title-overflow' => 'මගේ නිවේදන (නොකියවූ ඒවා $1 න් $2 පෙන්වමින්)', # Fuzzy
	'echo-date-today' => 'අද',
	'echo-date-yesterday' => 'පෙරදින',
	'echo-load-more-error' => 'තවත් ප්‍රතිඑල පමුනුවිමේදී දෝෂයක් හට ගැනුණි.',
	'echo-email-batch-subject-daily' => 'ඔබට අද {{PLURAL:$2|නිවේදන}} $1 ඇත', # Fuzzy
	'echo-email-batch-subject-weekly' => 'ඔබට මෙම සතියේ {{PLURAL:$2|නිවේදන}} $1 ඇත', # Fuzzy
);

/** Slovenian (slovenščina)
 * @author Eleassar
 * @author Matej1234
 * @author Pinky sl
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
	'echo-new-messages' => 'Imate nova sporočila.',
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
	'echo-overlay-title-overflow' => '<b>Obvestila</b> ({{PLURAL:$1|prikazano|prikazani|prikazana|prikazanih}} je {{PLURAL:$1|sporočilo|sporočili|sporočila|sporočil}} od $2 {{PLURAL:$2|neprebranega|neprebranih}})',
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
	'echo-new-messages' => 'Keni një mesazh të ri',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|mesazh|mesazhe}} në faqen e diskutimeve',
	'echo-category-title-article-linked' => '{{PLURAL:$1|lidhje|lidhje}} në një faqe',
	'echo-category-title-reverted' => '{{PLURAL:$1|Redaktim i kthyer|Redaktime të kthyera}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Përmëndje|Përmëndje}}',
	'echo-category-title-other' => '{{PLURAL:$1|Të tjera}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistemi}}',
	'echo-pref-tooltip-edit-user-talk' => 'Më njofto kur dikush poston një mesazh të ri ose përgjigjet në faqet time të diskutimit.',
	'echo-pref-tooltip-reverted' => 'Më njofto kur dikush kthen një ndryshim që kam bërë unë, duke përdorur funksionet zhbëj ose riktheje.',
	'echo-no-agent' => '[Asnjeri]',
	'echo-no-title' => '[Asnjë faqe]',
	'echo-error-no-formatter' => 'Asnjë përcaktim mbi formatimimin e njoftimeve.',
	'echo-error-preference' => 'Gabim: Preferenca e përdoruesit nuk janë ruajtur.',
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
	'echo-email-batch-body-default' => 'Keni një njoftim të ri.',
	'echo-email-footer-default' => "$2

Për të kontrolluar se cili email do t'iu dërgohet, kontrolloni parapëlqimet tuaja:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1",
	'echo-email-footer-default-html' => 'Për të kontrolluar se cili email do t\'iu dërgohet, <a href="$2" style="text-decoration:none; color: #3868B0;">kontrolloni parapëlqimet tuaja</a>.<br />
$1',
	'echo-overlay-link' => 'Të gjitha njoftimet',
	'echo-overlay-title' => '<b>Njoftimet</b>',
	'echo-overlay-title-overflow' => '<b>Njoftimet</b> (duke shfaqur $1 nga $2 të pa lexuara)',
	'echo-mark-all-as-read' => 'Shënoji të gjitha si të lexuara',
	'echo-date-today' => 'Sot',
	'echo-date-yesterday' => 'Dje',
	'echo-load-more-error' => 'Pati një gabim në ngarkimin e rezultateve shtesë.',
	'notification-edit-talk-page-bundle' => '$1 dhe {{PLURAL:$4|një përdorues tjetër|$3 përdorues të tjerë}} {{GENDER:$1|iu lanë}} një mesazh në [[User talk:$2|faqen tuaj të diskutimeve]].',
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
	'echo-new-messages' => 'Стигла вам је нова порука',
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
	'echo-anon' => 'Да би сте приступили овој страници морате се [[Special:UserLogin|пријавити]] или [[Special:Userlogin/signup|отворити налог]].',
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
	'notification-reverted2' => '{{PLURAL:$4|Ваша измена на [[:$2]] је поништена|Ваше  измене на [[:$2]] су поништене}} {{GENDER:$1|од}}  стране [[User:$1|$1]]. $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Ваша измена на $2 је поништена|Ваше  измене на $2 су поништене}} {{GENDER:$1|од}}  стране $1. $3',
	'notification-edit-talk-page-email-subject2' => '$1 вам је {{GENDER:$1|оставио|оставила}} поруку на {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 вам је {{GENDER:$1|оставио|оставила}} поруку на вашој страници за разговор:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 вам је {{GENDER:$1|оставио|оставила}} поруку на вашој страници за разговор у „$2“.',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Ваша измена на $2 је поништена|Ваше  измене на $2 су поништене}} {{GENDER:$1|од}}  стране $1.',
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
	'echo-overlay-title-overflow' => '<b>Обавештења</b> (приказ $1 од $2 непрочитаних)',
	'echo-mark-all-as-read' => 'Означи све као прочитано',
	'echo-date-today' => 'Данас',
	'echo-date-yesterday' => 'Јуче',
	'echo-load-more-error' => 'Дошло је до грешке при добављању више резултата.',
	'echo-email-batch-subject-daily' => 'Имате {{PLURAL:$2|ново обавештење|нова обавештења}} на {{SITENAME}}',
	'echo-email-batch-link-text-view-all-notifications' => 'Погледај сва обавештења',
	'echo-rev-deleted-text-view' => 'Ова ревизија странице је потиснута.',
);

/** Serbian (Latin script) (srpski (latinica)‎)
 * @author Milicevic01
 */
$messages['sr-el'] = array(
	'prefs-echo' => 'Obaveštenja',
	'echo-no-agent' => '[Niko]',
	'echo-no-title' => '[Nema stranice]',
	'notifications' => 'Obaveštenja',
	'echo-specialpage' => 'Moja obaveštenja', # Fuzzy
	'echo-none' => 'U poslednje vreme niste primili nijedno obaveštenje.', # Fuzzy
	'echo-overlay-link' => 'Sva obaveštenja',
	'echo-overlay-title' => '<b>Obaveštenja</b>',
);

/** Swedish (svenska)
 * @author Ainali
 * @author Dcastor
 * @author Edvinw
 * @author Jopparn
 * @author Lejonel
 * @author Skalman
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
	'echo-new-messages' => 'Du har nya meddelanden.',
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
	'echo-overlay-title-overflow' => '<b>Meddelanden</b> (visar $1 av $2 olästa)',
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
 * @author Karthi.dr
 * @author Shanmugamp7
 * @author மதனாஹரன்
 */
$messages['ta'] = array(
	'prefs-echo' => 'அறிவிப்புகள்',
	'echo-pref-email-frequency-daily' => 'தினமும் அறிவித்தல்களின் சுருக்கம்',
	'echo-no-title' => '[தலைப்பு இல்லை]', # Fuzzy
	'notifications' => 'அறிவிப்புகள்',
	'echo-specialpage' => 'என் அறிவிப்புகள்', # Fuzzy
	'echo-anon' => 'அறிவிப்புகளைப் பெறுவதற்கு [$1 ஒரு கணக்கை உருவாக்குங்கள்] அல்லது [$2 உள்நுழையுங்கள்].',
	'echo-email-subject-default' => '{{SITENAME}}இல்  புதிய அறிவிப்புகள்',
	'echo-email-body-default' => '{{SITENAME}} இல் உங்களுக்கு ஒரு புதிய அறிவிப்பு உள்ளது:

$1',
	'echo-overlay-link' => 'எல்லா அறிவிப்புகள்....', # Fuzzy
	'echo-overlay-title' => 'என் அறிவிப்புகள்', # Fuzzy
	'echo-date-today' => 'இன்று',
	'echo-date-yesterday' => 'நேற்று',
);

/** Telugu (తెలుగు)
 * @author Arjunaraoc
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
	'echo-new-messages' => 'మీకో క్రొత్త సందేశాలు ఉన్నాయి.',
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
	'notification-edit-talk-page2' => '[[వాడుకరి:$1|$1]] మీ [[వాడుకరి చర్చ:$2#$3|చర్చా పేజీ]] పై మీకొక సందేశం {{స్త్రీ/పురుషుడు:$1|రాసారు}}.', # Fuzzy
	'notification-edit-talk-page-with-section' => '[[వాడుకరి:$1|$1]] "[[వాడుకరి చర్చ:$2#$3|$4]]" వద్ద మీ చర్చా పేజీలో ఒక సందేశాన్ని {{స్త్రీ/పురుషుడు:$1|రాసారు}}.', # Fuzzy
	'notification-edit-talk-page-flyout2' => '$1 [[వాడుకరి చర్చ:$2#$3|చర్చా పేజీ]] మీకొక సందేశం {{స్త్రీ/పురుషుడు:$1|రాసారు}}.', # Fuzzy
	'notification-edit-talk-page-flyout-with-section' => '$1 మీ చర్చా పేజీలో "[[వాడుకరి పేజీ:$2#$3|$4]]" వద్ద ఒక సందేశాన్ని {{స్త్రీ/పురుష:$1|రాసారు}}.', # Fuzzy
	'notification-page-linked' => '[[:$3]] నుండి [[:$2]]కి {{స్త్రీ/పురుష:$1|లంకె వేసారు}}.
[[Special:WhatLinksHere/$2|ఈ పేజీకి చేరుకోవటానికున్న అన్ని లంకెలను చూడు]].',
	'notification-page-linked-flyout' => '[[:$3]] నుండి [[:$2]]కి {{స్త్రీ/పురుష:$1|లంకె వేసారు}}.', # Fuzzy
	'notification-add-comment2' => '[[వాడుకరి:$1|$1]] "$4" చర్చా పేజీలో "[[$3|$2]]" పై {{స్త్రీ/పురుష:$1|వ్యాఖ్యానించారు}}.', # Fuzzy
	'notification-add-talkpage-topic2' => '[[వాడుకరి:$1|$1]] [[$3]] పై "$2" అనే ఒక కొత్త విషయాన్ని {{స్త్రీ/పురుష:$1|చేర్చారు}}.', # Fuzzy
	'notification-add-talkpage-topic-yours2' => '[[వాడుకరి:$1|$1]] మీకొక సందేశాన్ని {{స్త్రీ/పురుష:$1|పంపారు}}: "[[$3#$2|$2]]".', # Fuzzy
	'notification-add-comment-yours2' => '[[వాడుకరి:$1|$1]] మీ చర్చాపేజీలోని "[[$3#$2|$2]]" పై {{GENDER:$1|వ్యాఖ్యానించారు}}.', # Fuzzy
	'notification-mention' => '[[వాడుకరి:$1|$1]] మిమ్మల్ని   "[[$3#$2|$4]]"లో $5 చర్చా పేజీ వద్ద {{GENDER:$1|పేర్కొన్నారు}}.', # Fuzzy
	'notification-mention-flyout' => '$1 మిమ్మల్ని "[[$3#$2|$4]]"లో $5 చర్చా పేజీపై {{స్త్రీ/పురుష:$1|పేర్కొన్నారు}}.',
	'notification-user-rights' => 'మీ వాడుకరి హక్కులు [[వాడుకరి:$1|$1]]($2) ద్వారా [[Special:Log/rights/$1| {{GENDER:$1|మార్చబడ్డాయి}}]]. [[Special:ListGroupRights|మరింత తెలుసుకోండి]]', # Fuzzy
	'notification-user-rights-flyout' => 'మీ వాడుకరి హక్కులను $1($2) {{GENDER:$1|మార్చారు}}. [[Special:ListGroupRights|మరింత తెలుసుకోండి]]',
	'notification-user-rights-add' => 'మీరిప్పుడు {{PLURAL:$2|ఈ సమూహం|ఈ సమూహాలలో}} సభ్యులు:$1',
	'notification-user-rights-remove' => 'మీరికపై {{PLURAL:$2|ఈ సమూహం|ఈ సమూహాలలో}} సభ్యులు కారు:$1',
	'notification-new-user' => '{{SITENAME}}కు స్వాగతం, $1! మీ రాక మాకెంతో సంతోషం సుమండీ.',
	'notification-reverted2' => '{{PLURAL:$4|[[:$2]] పై మీరు చేసిన మార్పు|[[:$2]] పై మీరు చేసిన మార్పులు}} [[వాడుకరి:$1|$1]] ద్వారా {{స్త్రీ/పురుష:$1|రద్దు చేయబడ్డాయి}}.$3', # Fuzzy
	'notification-reverted-flyout2' => '{{PLURAL:$4|$2 పై మీ మార్పు|$2 పై మీ మార్పులు}} $1 ద్వారా {{స్త్రీ/పురుష:$1|రద్దు చేయబడ్డాయి}}. $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{SITENAME}} వద్ద మీకొక సందేశం {{GENDER:$1|రాసారు}}.',
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
	'echo-overlay-title-overflow' => '<b>సూచనలు</b> (చదవని $2 లో $1 వది)',
	'echo-mark-all-as-read' => 'అన్నిటినీ చదివినవిగా గుర్తించు',
	'echo-date-today' => 'ఈరోజు',
	'echo-date-yesterday' => 'నిన్న',
	'echo-load-more-error' => 'మరిన్ని ఫలితాలు తెచ్చి చూపడంలో దోషం జరిగింది.',
	'notification-edit-talk-page-bundle' => '$1 మరియు మరో $3 {{PLURAL:$4|ఒకరు|మంది}} సభ్యులు మీ [[User talk:$2|వాడుకరి చర్చా పేజీ]]లో సందేశం {{GENDER:$1|విడిచారు}}.',
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
	'echo-rev-deleted-text-view' => 'ఈ పేజీ పునర్కూర్పు కుచించబడింది.',
);

/** Thai (ไทย)
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
	'echo-category-title-edit-user-talk' => 'หน้าพูดคุย {{PLURAL:$1| ข้อความ|ข้อความ} }',
	'echo-category-title-article-linked' => 'หน้า {{PLURAL:$1|ลิงก์|ลิงก์} }',
	'echo-category-title-reverted' => 'การแก้ไข {{PLURAL:$1| ย้อนกลับ|ย้อนกลับ} }',
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
	'prefs-newmessageindicator' => 'Indikador ng mga bagong mensahe',
	'echo-pref-send-me' => 'Ipadala sa akin:',
	'echo-pref-send-to' => 'Ipadala kay:',
	'echo-pref-web' => 'Web',
	'echo-pref-email' => 'E-liham',
	'echo-pref-email-frequency-never' => 'Huwag magpadala sa akin ng anumang pabatid sa e-liham',
	'echo-pref-email-frequency-immediately' => 'Mga indibiduwal na pabatid nang papasok ito',
	'echo-pref-email-frequency-daily' => 'Isang arawang buod ng mga pabatid',
	'echo-pref-email-frequency-weekly' => 'Isang lingguhang buod ng mga pabatid',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => 'Purong teksto',
	'echo-new-messages' => 'Mayroon kang mga bagong mensahe.',
	'echo-category-title-edit-user-talk' => '{{PLURAL:$1|Mensahe|Mga mensahe}} sa pahinang usapan',
	'echo-category-title-article-linked' => '{{PLURAL:$1|Kawing|Mga kawing}} sa pahina',
	'echo-category-title-other' => '{{PLURAL:$1|Iba}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistema}}',
	'echo-pref-tooltip-edit-user-talk' => 'Ipabatid sa akin kung may nagpaskil ng mensahe o may tumugon sa aking pahinang usapan.',
	'echo-pref-tooltip-article-linked' => 'Ipabatid sa akin kung may kumawing sa pahinang inilika ko mula sa isang pahina ng artikulo.',
	'echo-no-agent' => '[Walang Sinuman]',
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
	'notification-link-text-view-changes' => 'Ipakita ang pagbabago',
	'notification-link-text-view-page' => 'Ipakita ang pahina',
	'notification-link-text-view-edit' => 'Ipakita ang pagbabago',
	'notification-edit-talk-page2' => '{{GENDER:$1|Nag-iwan}} si [[User:$1|$1]] ng mensahe sa iyong [[User talk:$2#$3|pahinang usapan]].',
	'notification-edit-talk-page-with-section' => '{{GENDER:$1|Nag-iwan}} si [[User:$1|$1]] ng mensahe sa iyong pahinang usapan sa "[[User talk:$2#$3|$4]]".',
	'notification-edit-talk-page-flyout2' => '{{GENDER:$1|Nag-iwan}} si $1 ng mensahe sa iyong [[User talk:$2#$3|pahinang usapan]].',
	'notification-edit-talk-page-flyout-with-section' => '{{GENDER:$1|Nag-iwan}} si $1 ng mensahe sa iyong pahinang usapan sa "[[User talk:$2#$3|$4]]".',
	'notification-page-linked' => '{{GENDER:$1|Ikinawing}} ang [[:$2]] mula sa [[:$3]].  [[Special:WhatLinksHere/$2|Tingnan ang lahat ng kawing patungo sa pahinang ito.]]',
	'notification-page-linked-flyout' => '{{GENDER:$1|Ikinawing}} ang $2 mula sa [[:$3]].',
	'notification-add-talkpage-topic-yours2' => '{{GENDER:$1|Ipinadala}} ka ni [[User:$1|$1]] ng mensahe: "[[$3#$2|$2]]".',
	'notification-user-rights-add' => 'Kasapi ka na ng {{PLURAL:$2|grupong ito|mga grupong ito}}: $1',
	'notification-user-rights-remove' => 'Hindi ka na kasapi ng {{PLURAL:$2|grupong ito|mga grupong ito}}: $1',
	'notification-new-user' => 'Maligayang pagdating sa {{SITENAME}}, $1!  Masaya kami na nandito ka.',
	'notification-edit-talk-page-email-subject2' => '{{GENDER:$1|Nag-iwan}} si $1 ng mensahe para sa iyo sa {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '{{GENDER:$1|Nag-iwan}} si $1 ng mensahe sa iyong pahinang usapan:',
	'notification-edit-talk-page-email-batch-body-with-section' => '{{GENDER:$1|Nag-iwan}} si $1 ng mensahe sa iyong pahinang usapan sa "$2".',
	'notification-page-linked-email-subject' => 'Ikinawing ang pahina mo sa {{SITENAME}}',
	'notification-page-linked-email-batch-body' => '{{GENDER:$1|Ikinawing}} ang $2 mula sa $3.',
	'notification-user-rights-email-subject' => 'Nagbago ang iyong mga karapatang pantagagamit sa {{SITENAME}}',
	'notification-user-rights-email-batch-body' => '{{GENDER:$1|Binago}} ni $1 ang iyong karapatang pantagagamit. $2.',
	'echo-email-subject-default' => 'Bagong pagpapabatid sa {{SITENAME}}',
	'echo-email-body-default' => 'Mayroon kang isang bagong pagpapabatid doon sa {{SITENAME}}:

$1',
	'echo-email-batch-body-default' => 'May bago kang pabatid.',
	'echo-overlay-link' => 'Lahat ng mga pabatid',
	'echo-overlay-title' => '<b>Mga pabatid</b>',
	'echo-overlay-title-overflow' => '<b>Mga pabatid</b> (ipinapakita ang $1 ng $2 hindi pa nababasa)',
	'echo-mark-all-as-read' => 'Tatakan ang lahat bilang nabasa na',
	'echo-date-today' => 'Ngayon',
	'echo-date-yesterday' => 'Kahapon',
	'echo-email-batch-body-intro-daily' => 'Magandang araw $1,
Ito ang buod ng mga gawain ngayon sa {{SITENAME}} para sa iyo.',
	'echo-email-batch-body-intro-weekly' => 'Magandang araw $1,
Ito ang buod ng mga gawain ngayong linggo sa {{SITENAME}} para sa iyo.',
	'echo-email-batch-link-text-view-all-notifications' => 'Tingnan ang lahat ng pabatid',
);

/** Turkish (Türkçe)
 * @author Emperyan
 * @author Incelemeelemani
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
	'echo-new-messages' => 'Yeni mesajınız var.',
	'echo-category-title-edit-user-talk' => 'Tartışma sayfası {{PLURAL:$1|mesajı|mesajları}}',
	'echo-category-title-article-linked' => 'Sayfa {{PLURAL:$1|bağlantısı|bağlantıları}}',
	'echo-category-title-reverted' => 'Değişiklik {{PLURAL:$1|iptali|iptalleri}}',
	'echo-category-title-mention' => '{{PLURAL:$1|Zikretme|Zikretmeler}}',
	'echo-category-title-other' => '{{PLURAL:$1|Diğer}}',
	'echo-category-title-system' => '{{PLURAL:$1|Sistem}}',
	'echo-pref-tooltip-edit-user-talk' => 'Ne zaman birisi bana mesaj gönderse ya da tartışma sayfamı değiştirse bana bildir.',
	'echo-pref-tooltip-article-linked' => 'Oluşturduğum makalelerde değişiklik yapıldığında bana bildir.',
	'echo-pref-tooltip-reverted' => 'Düzenleme yapıldıktan sonra geri alındığı takdirde bu durumu bana bildir.',
	'echo-pref-tooltip-mention' => 'Ne zaman birisi tartışma sayfasında kullanıcı adıma bağlantı verirse, bunu bana bildir.',
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
	'notification-link-text-view-edit' => 'Düzenlemeyi görüntüle',
	'notification-new-user' => 'Hoş geldin $1! Sizi burada görmekten memnun olduk.',
	'notification-edit-talk-page-email-subject2' => 'Yeni tartışma sayfası iletiniz var.', # Fuzzy
	'notification-user-rights-email-subject' => '{{SITENAME}} için kullanıcı hakları değişmiştir',
	'echo-email-subject-default' => '{{SITENAME}} için yeni bildirim',
	'echo-email-body-default' => '{{SITENAME}} için yeni bildiriminiz var:

$1',
	'echo-email-batch-body-default' => 'Yeni bir bildiriminiz var',
	'echo-overlay-link' => 'Bütün bildirimler',
	'echo-overlay-title' => '<b>Bildirimler</b>',
	'echo-overlay-title-overflow' => '<b>Bildirimler</b> ($2 okunmayandan $1 adeti)',
	'echo-mark-all-as-read' => 'Tümünü okundu olarak işaretle',
	'echo-date-today' => 'Bugün',
	'echo-date-yesterday' => 'Dün',
	'echo-load-more-error' => 'Daha fazla sonuç oluşturma esnasında bir hata oluştu.',
	'echo-email-batch-body-intro-daily' => 'Merhaba $1,
Burada {{SITENAME}} için bu günün etkinlik özetini bulabilirsiniz.',
	'echo-email-batch-body-intro-weekly' => 'Merhaba $1,
Burada {{SITENAME}} için bu haftaki etkinlik özetini bulabilirsiniz.',
	'echo-email-batch-link-text-view-all-notifications' => 'Tüm bildirimleri göster',
	'echo-rev-deleted-text-view' => 'Bu sayfa sürümü kaldırıldı.',
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
	'echo-category-title-reverted' => '{{PLURAL:$1|відкот|відкоти}} редагувань',
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
	'notification-user-rights' => 'Ваші права користувача [[Special:Log/rights/$1|було змінено]] {{GENDER:$1|користувачем|користувачкою}} [[User:$1|$1]]. $2. [[Special:ListGroupRights|Дізнатися більше]]',
	'notification-user-rights-flyout' => 'Ваші права користувача було змінено {{GENDER:$1|користувачем|користувачкою}} $1. $2. [[Special:ListGroupRights|Дізнатися більше]]',
	'notification-user-rights-add' => 'Зараз Ви член {{PLURAL:$2|такої групи|таких груп}}: $1',
	'notification-user-rights-remove' => 'Ви більше не є членом {{PLURAL:$2|цієї групи|таких груп}}: $1',
	'notification-new-user' => 'Ласкаво просимо до {{GRAMMAR:Genitive|{{SITENAME}}}}, $1! Ми раді, що Ви тут.',
	'notification-reverted2' => '{{PLURAL:$4|Ваше редагування|Ваші редагування}} сторінки [[:$2]] було {{GENDER:$1|відкочено}} {{GENDER:$1|користувачем|користувачкою}} [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Ваше редагування|Ваші редагування}} сторінки $2 було {{GENDER:$1|відкочено}} {{GENDER:$1|користувачем|користувачкою}} $1 $3',
	'notification-edit-talk-page-email-subject2' => '$1 {{GENDER:$1|залишив|залишила}} Вам повідомлення на сайті {{SITENAME}}',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|залишив|залишила}} повідомлення на Вашій сторінці обговорення:',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 {{GENDER:$1|залишив|залишила}} повідомлення на Вашій сторінці обговорення у «$2».',
	'notification-page-linked-email-subject' => "На сайті {{SITENAME}} з'явилось посилання на Вашу сторінку",
	'notification-page-linked-email-batch-body' => 'На «$3» $1 {{GENDER:$1|зробив|зробила}} посилання на «$2»',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Ваше редагування|Ваші редагування}} на сайті {{SITENAME}} було {{GENDER:$1|відкочено}}',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Ваше редагування|Ваші редагування}} сторінки $2 було {{GENDER:$1|відкочено}} {{GENDER:$1|користувачем|користувачкою}} $1',
	'notification-mention-email-subject' => '$1 {{GENDER:$1|згадав|згадала}} Вас на {{GRAMMAR:locative|{{SITENAME}}}}.',
	'notification-mention-email-batch-body' => '$1 {{GENDER:$1|згадав|згадала}} Вас на сторінці обговорення {{GENDER:$4|користувача|користувачки}} $4 у «$3».',
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
	'echo-overlay-title-overflow' => '<b>Сповіщення</b> (показано $1 з $2 непрочитаних)',
	'echo-mark-all-as-read' => 'Позначити всі як прочитані',
	'echo-date-today' => 'Сьогодні',
	'echo-date-yesterday' => 'Вчора',
	'echo-load-more-error' => 'Під час отримання додаткових результатів сталася помилка.',
	'notification-edit-talk-page-bundle' => '$1 та $3 {{PLURAL:$4|інший користувач|інші користувачі|інших користувачів}} {{GENDER:$1|залишили}} повідомлення на Вашій [[User talk:$2|сторінці обговорення]].',
	'notification-page-linked-bundle' => 'На $3 та $4 {{PLURAL:$5|іншій сторінці|інших сторінках}} $1 {{GENDER:$1|додав|додала}} посилання на $2. [[Special:WhatLinksHere/$2|Див. усі посилання на цю сторінку]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 та $2 {{PLURAL:$3|інший користувач|інші користувачі|інших користувачів}} {{GENDER:$1|залишили}} повідомлення на Вашій сторінці обговорення',
	'notification-page-linked-email-batch-bundle-body' => 'На $3 та $4 {{PLURAL:$5|іншій сторінці|інших сторінках}} $1 {{GENDER:$1|додав|додала}} посилання на $2.',
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
	'echo-dismiss-prefs-message' => 'آپ اس کو واپس لا سکتے ہیں[[Special:Preferences#mw-prefsection-echo|preferences]] پر',
	'echo-category-title-other' => 'دیگر', # Fuzzy
	'notifications' => 'اطلاعات',
	'echo-specialpage' => 'میری اطلاعات', # Fuzzy
	'echo-feedback' => 'آپ کی رائے',
	'notification-user-rights-flyout' => 'آپ کے صارفانہ حقوق ہوگئے  {{GENDER:$1| تبدیل}} <b> $1 </b>کے ذریعے ۔ $2. [[Special:ListGroupRights|مزید دیکھیں]]',
	'echo-overlay-link' => 'سب اطلاعات...', # Fuzzy
	'echo-overlay-title' => '<b>اطلاعات</b>',
	'echo-overlay-title-overflow' => '<b>اطلاعات</b> (دکھا رہا ہے $1  کے  $2  غیر مطلع)',
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
	'echo-new-messages' => 'Te ghè dei messagi novi.',
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
	'echo-new-messages' => 'Labol nunis nulik.',
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
	'echo-new-messages' => 'איר האט נייע מעלדונגען.',
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
	'notification-page-linked-flyout' => '$2 איז געווארן {{GENDER:$1|פֿאַרלינקט}} פֿון [[:$3]].',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|האט געלאזט א הערה}} וועגן "[[$3|$2]]" אויפן "$4" רעדן בלאט.',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|האט}} אײַך געשיקט אן אנזאג: "[[$3#$2|$2]]".',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|האט געלאזט א הערה}} וועגן "[[$3#$2|$2]]" אויף אײַער רעדן בלאט.',
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

/** Cantonese (粵語)
 * @author Wong128hk
 */
$messages['yue'] = array(
	'echo-desc' => '通知系統',
	'prefs-echo' => '通知',
	'prefs-emailsettings' => '電郵選項',
	'prefs-displaynotifications' => '顯示選項',
	'prefs-echosubscriptions' => '通知選項',
	'prefs-newmessageindicator' => '新留言提示',
	'echo-pref-send-me' => '通知得幾密',
	'echo-pref-send-to' => '電郵去︰',
	'echo-pref-email-format' => '郵件格式︰',
	'echo-pref-web' => '網頁',
	'echo-pref-email' => '電郵',
	'echo-pref-email-frequency-never' => '唔使出電郵通知',
	'echo-pref-email-frequency-immediately' => '每樣都通知',
	'echo-pref-email-frequency-daily' => '每日出通知摘要',
	'echo-pref-email-frequency-weekly' => '每個星期出通知摘要',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => '純文字',
	'echo-pref-notify-show-link' => '喺工具列道出通知',
	'echo-pref-new-message-indicator' => '喺工具列道出新留言提示',
	'echo-learn-more' => '了解多啲',
	'echo-new-messages' => '你有新信',
	'echo-category-title-edit-user-talk' => '傾偈頁{{PLURAL:$1|新信}}',
	'echo-category-title-article-linked' => '頁面{{PLURAL:$1|連結}}',
	'echo-category-title-reverted' => '編輯{{PLURAL:$1|打回頭}}',
	'echo-category-title-mention' => '{{PLURAL:$1|提及}}自己',
	'echo-category-title-other' => '{{PLURAL:$1|其他}}',
	'echo-category-title-system' => '{{PLURAL:$1|系統}}',
	'echo-pref-tooltip-edit-user-talk' => '有人留信或者回覆喺我傾偈頁，話我知。',
	'echo-pref-tooltip-article-linked' => '有人喺文章連過去我開嘅版，話我知',
	'echo-pref-tooltip-reverted' => '有人復原或者反轉我嘅編輯，話我知。',
	'echo-pref-tooltip-mention' => '有人喺任何傾偈頁提及我嘅用戶頁，話我知。',
);

/** Simplified Chinese (中文（简体）‎)
 * @author Anakmalaysia
 * @author Byfserag
 * @author Chiefwei
 * @author Cwek
 * @author Dimension
 * @author Fantasticfears
 * @author Hydra
 * @author Hzy980512
 * @author Kuailong
 * @author Li3939108
 * @author Liangent
 * @author Linforest
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
	'prefs-echosubscriptions' => '通知事件选项',
	'prefs-newmessageindicator' => '新信息提示器',
	'echo-pref-send-me' => '给我发送：',
	'echo-pref-send-to' => '发送至：',
	'echo-pref-email-format' => '电子邮件格式：',
	'echo-pref-web' => '网页',
	'echo-pref-email' => '电子邮件',
	'echo-pref-email-frequency-never' => '不要给我发送任何电子邮件通知',
	'echo-pref-email-frequency-immediately' => '每个新事件的单独通知',
	'echo-pref-email-frequency-daily' => '每日一次通知摘要',
	'echo-pref-email-frequency-weekly' => '一周一次通知摘要',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => '纯文本',
	'echo-pref-notify-show-link' => '在我的工具栏中显示通知',
	'echo-pref-new-message-indicator' => '在我的工具栏中显示讨论页面留言提示器',
	'echo-learn-more' => '了解更多',
	'echo-new-messages' => '你有新信息。',
	'echo-category-title-edit-user-talk' => '讨论页面{{PLURAL:$1|留言}}',
	'echo-category-title-article-linked' => '页面{{PLURAL:$1|链接}}',
	'echo-category-title-reverted' => '编辑{{PLURAL:$1|回退}}',
	'echo-category-title-mention' => '{{PLURAL:$1|提及}}',
	'echo-category-title-other' => '{{PLURAL:$1|其他}}',
	'echo-category-title-system' => '{{PLURAL:$1|系统}}',
	'echo-pref-tooltip-edit-user-talk' => '当有人在我的讨论页面上留言或回复时通知我。',
	'echo-pref-tooltip-article-linked' => '当有人在条目页面中链接了我创建的页面时通知我。',
	'echo-pref-tooltip-reverted' => '当有人用撤销或回退工具回退了我的编辑时通知我。',
	'echo-pref-tooltip-mention' => '当有人在任何讨论页面链接我的用户页面时通知我。',
	'echo-no-agent' => '[匿名]',
	'echo-no-title' => '[无页面]',
	'echo-error-no-formatter' => '未指定通知格式',
	'echo-error-preference' => '出错：无法设定用户设置。',
	'echo-error-token' => '出错：无法检索用户令牌。',
	'notifications' => '通知',
	'tooltip-pt-notifications' => '你的通知',
	'echo-specialpage' => '通知',
	'echo-anon' => '想要接收通知，请[$1 创建账户]或[$2 登录]。',
	'echo-none' => '您没有通知。',
	'echo-more-info' => '更多信息',
	'echo-feedback' => '反馈',
	'notification-link-text-view-message' => '查看留言',
	'notification-link-text-view-mention' => '查看提及',
	'notification-link-text-view-changes' => '查看更改',
	'notification-link-text-view-page' => '查看页面',
	'notification-link-text-view-edit' => '查看编辑',
	'notification-edit-talk-page2' => '[[User:$1|$1]]在你的[[User talk:$2#$3|讨论页面]]留了言。',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]]在你的讨论页面的“[[User talk:$2#$3|$4]]”段落{{GENDER:$1|留}}了言。',
	'notification-edit-talk-page-flyout2' => '$1在你的[[User talk:$2#$3|讨论页面]]{{GENDER:$1|留}}了言。',
	'notification-edit-talk-page-flyout-with-section' => '$1在你的讨论页面的“[[User talk:$2#$3|$4]]”段落{{GENDER:$1|留}}了言。',
	'notification-page-linked' => '[[:$2]]被[[:$3]]{{GENDER:$1|链接}}。[[Special:WhatLinksHere/$2|查看所有链至该页的页面]]。',
	'notification-page-linked-flyout' => '$2被[[:$3]]{{GENDER:$1|链接}}。',
	'notification-add-comment2' => '[[User:$1|$1]]在“$4”的讨论页面的“[[$3|$2]]”段落{{GENDER:$1|发表意见}}。',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]]在[[$3]]上发起了新话题“$2”',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]]发送给你一则信息：“[[$3#$2|$2]]”。',
	'notification-add-comment-yours2' => '[[User:$1|$1]]在你的讨论页面的“[[$3#$2|$2]]”段落{{GENDER:$1|发表意见}}。',
	'notification-mention' => '[[User:$1|$1]]在$5的讨论页面的“[[$3#$2|$4]]”段落{{GENDER:$1|提到}}了你。',
	'notification-mention-flyout' => '$1在$5的讨论页面的“[[$3#$2|$4]]”段落{{GENDER:$1|提到}}了你。',
	'notification-user-rights' => '你的用户权限被[[User:$1|$1]][[Special:Log/rights/$1|更改]]。$2。[[Special:ListGroupRights|了解更多]]',
	'notification-user-rights-flyout' => '你的用户权限被$1{{GENDER:$1|更改}}。$2。[[Special:ListGroupRights|了解更多]]',
	'notification-user-rights-add' => '你被添加至以下{{PLURAL:$2|用户组}}：$1',
	'notification-user-rights-remove' => '你被移除自以下{{PLURAL:$2|用户组}}：$1',
	'notification-new-user' => '欢迎来到{{SITENAME}}，$1！非常高兴看到你加入我们。',
	'notification-reverted2' => '你对[[:$2]]的{{PLURAL:$4|编辑}}被[[User:$1|$1]]{{GENDER:$1|回退}}。$3',
	'notification-reverted-flyout2' => '你对$2的{{PLURAL:$4|编辑}}被$1{{GENDER:$1|回退}}。$3',
	'notification-edit-talk-page-email-subject2' => '$1在{{SITENAME}}给你{{GENDER:$1|留}}了言',
	'notification-edit-talk-page-email-batch-body2' => '$1在你的讨论页面{{GENDER:$1|留}}了言：',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1在你的讨论页面的“$2”段落{{GENDER:$1|留}}了言。',
	'notification-page-linked-email-subject' => '你在{{SITENAME}}创建的页面被链接',
	'notification-page-linked-email-batch-body' => '$2被$3{{GENDER:$1|链接}}。',
	'notification-reverted-email-subject2' => '你在{{SITENAME}}的{{PLURAL:$3|编辑}}被{{GENDER:$1|回退}}',
	'notification-reverted-email-batch-body2' => '你{{PLURAL:$3|对$2的编辑}}被$1{{GENDER:$1|回退}}。',
	'notification-mention-email-subject' => '$1在{{SITENAME}}{{GENDER:$1|提到}}了你',
	'notification-mention-email-batch-body' => '$1在$4的讨论页面的“$3”段落{{GENDER:$1|提到}}了你。',
	'notification-user-rights-email-subject' => '你在{{SITENAME}}的用户权限已经更改',
	'notification-user-rights-email-batch-body' => '你的用户权限被$1{{GENDER:$1|更改}}。$2。',
	'echo-email-subject-default' => '{{SITENAME}}的新通知',
	'echo-email-body-default' => '你在{{SITENAME}}有新通知：

$1',
	'echo-email-batch-body-default' => '你有新通知。',
	'echo-email-footer-default' => '$2

想要管理我们给你发送的电子邮件的内容，请更改你的设置：{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => '要管理我们给你发送的电子邮件的内容，请<a href="$2" style="text-decoration:none; color: #3868B0;">更改你的设置</a>。<br />
$1',
	'echo-overlay-link' => '全部通知',
	'echo-overlay-title' => '<b>通知</b>',
	'echo-overlay-title-overflow' => '<b>通知</b>（显示$2条未读通知中的$1条）',
	'echo-mark-all-as-read' => '标记所有通知为已读',
	'echo-date-today' => '今天',
	'echo-date-yesterday' => '昨天',
	'echo-load-more-error' => '获取更多结果时出错。',
	'notification-edit-talk-page-bundle' => '$1和{{PLURAL:$4|另外}}$3人在你的[[User talk:$2|讨论页面]]{{GENDER:$1|留}}了言。',
	'notification-page-linked-bundle' => '$2被$3和另外$4个{{PLURAL:$5|页面}}{{GENDER:$1|链接}}。[[Special:WhatLinksHere/$2|查看链至该页的所有页面]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1和{{PLURAL:$3|另外}}$2人在你的讨论页面{{GENDER:$1|留}}了言。',
	'notification-page-linked-email-batch-bundle-body' => '$2被$3和另外$4个{{PLURAL:$5|页面}}{{GENDER:$1|链接}}。',
	'echo-email-batch-subject-daily' => '你在{{SITENAME}}有{{PLURAL:$2|新通知}}',
	'echo-email-batch-subject-weekly' => '你本周在{{SITENAME}}有{{PLURAL:$2|新通知}}',
	'echo-email-batch-body-intro-daily' => '嗨，$1，
这是今天你的{{SITENAME}}通知的摘要。',
	'echo-email-batch-body-intro-weekly' => '嗨，$1，
这是本周你的{{SITENAME}}通知的摘要。',
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
	'prefs-echosubscriptions' => '通知選項',
	'prefs-newmessageindicator' => '新訊息提示工具',
	'echo-pref-send-me' => '發送頻率',
	'echo-pref-send-to' => '發送至：',
	'echo-pref-email-format' => '信件格式：',
	'echo-pref-web' => '網頁',
	'echo-pref-email' => '電子郵件',
	'echo-pref-email-frequency-never' => '毋須發電郵通知',
	'echo-pref-email-frequency-immediately' => '允許每則新事件的個別通知',
	'echo-pref-email-frequency-daily' => '每日通知摘要',
	'echo-pref-email-frequency-weekly' => '每週通知摘要',
	'echo-pref-email-format-html' => 'HTML',
	'echo-pref-email-format-plain-text' => '純文字',
	'echo-pref-notify-show-link' => '在工具列中顯示通知',
	'echo-pref-new-message-indicator' => '在工具列中加入新討論頁留言提示',
	'echo-learn-more' => '了解更多',
	'echo-new-messages' => '您有新訊息。',
	'echo-category-title-edit-user-talk' => '討論頁{{PLURAL:$1|訊息}}',
	'echo-category-title-article-linked' => '頁面{{PLURAL:$1|連結}}',
	'echo-category-title-reverted' => '編輯{{PLURAL:$1|恢復}}',
	'echo-category-title-mention' => '{{PLURAL:$1|提及}}本人',
	'echo-category-title-other' => '{{PLURAL:$1|其他}}',
	'echo-category-title-system' => '{{PLURAL:$1|系統}}',
	'echo-pref-tooltip-edit-user-talk' => '有人在我的討論頁上留下訊息或是回覆留言時，請通知我。',
	'echo-pref-tooltip-article-linked' => '有人從條目頁面連結到我建立的頁面時，請通知我。',
	'echo-pref-tooltip-reverted' => '當有人使用復原或回退工具來恢復我的編輯時通知我。',
	'echo-pref-tooltip-mention' => '有人從任何討論頁連結到我的使用者頁面時，請通知我。',
	'echo-no-agent' => '[無使用者]',
	'echo-no-title' => '[無頁面]',
	'echo-error-no-formatter' => '無既定通知格式。',
	'echo-error-preference' => '錯誤：無法設定使用者偏好。',
	'echo-error-token' => '錯誤：無法取得用戶保安編碼。',
	'notifications' => '通知',
	'tooltip-pt-notifications' => '通知',
	'echo-specialpage' => '通知',
	'echo-anon' => '要收取通知，請[$1 註冊]或[$2 登入]。',
	'echo-none' => '無任何通知。',
	'echo-more-info' => '更多資訊',
	'echo-feedback' => '意見反饋',
	'notification-link-text-view-message' => '檢視留言',
	'notification-link-text-view-mention' => '檢視提到',
	'notification-link-text-view-changes' => '檢視變更',
	'notification-link-text-view-page' => '檢視頁面',
	'notification-link-text-view-edit' => '檢視編輯',
	'notification-edit-talk-page2' => '[[User:$1|$1]]於您的[[User talk:$2#$3|討論頁]]{{GENDER:$1|留了}}言。',
	'notification-edit-talk-page-with-section' => '[[User:$1|$1]] 在您的討論頁「[[User talk:$2#$3|$4]]」段落裡面{{GENDER:$1|}}{{GENDER:$1|留下了}}一則訊息。',
	'notification-edit-talk-page-flyout2' => '$1 在您的[[User talk:$2#$3|討論頁]]{{GENDER:$1|留了}}言。',
	'notification-edit-talk-page-flyout-with-section' => '$1 在您的討論頁「[[User talk:$2#$3|$4]]」段落{{GENDER:$1|留了}}言。',
	'notification-page-linked' => '[[:$2]]已從[[:$3]]頁面{{GENDER:$1|連入}}了。詳情請見：[[Special:WhatLinksHere/$2|所有的連入頁面]]。',
	'notification-page-linked-flyout' => '$2 已從[[:$3]]頁面{{GENDER:$1|連入}}了。',
	'notification-add-comment2' => '[[User:$1|$1]]在「$4」討論頁「[[$3|$2]]」段落{{GENDER:$1|發了意見}}。',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] 在[[$3]]的頁面{{GENDER:$1|張貼了}}新主題「$2」。',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]]發訊息給您：「[[$3#$2|$2]]」。',
	'notification-add-comment-yours2' => '[[User:$1|$1]]在您的討論頁「[[$3#$2|$2]]」段落裡面{{GENDER:$1|提出了討論}}。',
	'notification-mention' => '[[User:$1|$1]] 在 $5 的討論頁「 [[$3#$2|$4]] 」段落裡面{{GENDER:$1|提到了}}您。',
	'notification-mention-flyout' => '$1 在 $5  討論頁「[[$3#$2|$4]]」段落裡面{{GENDER:$1|提到了}}您。',
	'notification-user-rights' => '您的使用者權限已由 [[User:$1|$1]] 執行了[[Special:Log/rights/$1|變更]]。$2。[[Special:ListGroupRights|了解更多]]',
	'notification-user-rights-flyout' => '您的使用者權限已經由 $1 執行了{{GENDER:$1|變更}}。$2。[[Special:ListGroupRights|了解更多]]',
	'notification-user-rights-add' => '您成為了{{PLURAL:$2|這個群組|這些群組}}的成員：$1',
	'notification-user-rights-remove' => '你不再是{{PLURAL:$2|這個群組|這些群組}}的成員：$1',
	'notification-new-user' => '歡迎來到{{SITENAME}}，$1！我們很高興您的蒞臨。',
	'notification-reverted2' => '您{{PLURAL:$4|在[[:$2]]頁面的編輯}}已由 [[User:$1|$1]] 給{{GENDER:$1|恢復}}了。$3',
	'notification-reverted-flyout2' => '您{{PLURAL:$4|在$2頁面的編輯}}已由 $1 給回復了。 $3',
	'notification-edit-talk-page-email-subject2' => '$1 在{{SITENAME}}的頁面中{{GENDER:$1|留下了}}一則訊息給您。',
	'notification-edit-talk-page-email-batch-body2' => '$1 在您的討論頁中{{GENDER:$1|留下了}}一則訊息：',
	'notification-edit-talk-page-email-batch-body-with-section' => '$1 在您的討論頁「$2」中{{GENDER:$1|留下了}}一則訊息。',
	'notification-page-linked-email-subject' => '您的頁面已在{{SITENAME}}站上連入了',
	'notification-page-linked-email-batch-body' => '$2 頁面已從 $3 頁面{{GENDER:$1|連入}}了。',
	'notification-reverted-email-subject2' => '您在{{SITENAME}}站上的{{PLURAL:$3|編輯}}已給{{GENDER:$1|恢復了}}',
	'notification-reverted-email-batch-body2' => '您在{{PLURAL:$3|$2頁面的編輯}}已由 $1 給{{GENDER:$1|恢復了}}。',
	'notification-mention-email-subject' => '$1 在{{SITENAME}}站上{{GENDER:$1|提到了}}您',
	'notification-mention-email-batch-body' => '$1 在$4的討論頁「$3」段落裡面{{GENDER:$1|提到了}}您。',
	'notification-user-rights-email-subject' => '您在{{SITENAME}}的使用者權限已變更',
	'notification-user-rights-email-batch-body' => '你的使用者權限已由 $1 修改。$2',
	'echo-email-subject-default' => '{{SITENAME}}站上的新通知',
	'echo-email-body-default' => '你在{{SITENAME}}站上有新訊息：

$1',
	'echo-email-batch-body-default' => '你有新訊息。',
	'echo-email-footer-default' => '$2

如要調整我們寄給您的電子郵件，按一下這裡檢查您的偏好設定：
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-email-footer-default-html' => '如要調整我們寄給您的電子郵件，<a href="$2" style="text-decoration:none; color: #3868B0;">按一下這裡檢查你的偏好設定</a>。<br />
$1',
	'echo-overlay-link' => '所有通知',
	'echo-overlay-title' => '<b>通知</b>',
	'echo-overlay-title-overflow' => '<b>通知</b>（顯示 $2 則的其中 $1 則未讀）',
	'echo-mark-all-as-read' => '標記所有為已讀',
	'echo-date-today' => '今天',
	'echo-date-yesterday' => '昨天',
	'echo-load-more-error' => '擷取更多結果的時候發生錯誤。',
	'notification-edit-talk-page-bundle' => '$1 與{{PLURAL:$4|另外}} $3 位使用者在您的[[User talk:$2|討論頁]]裡面{{GENDER:$1|留下了}}一則訊息。',
	'notification-page-linked-bundle' => '$2已經由$3以及另外 $4 個{{PLURAL:$5|頁面}}給{{GENDER:$1|連入}}了。[[Special:WhatLinksHere/$2|詳情請見所有的連入頁面]]',
	'notification-edit-user-talk-email-batch-bundle-body' => '$1 與{{PLURAL:$3|另外}} $2 位使用者在您的討論頁裡面{{GENDER:$1|留下了}}訊息。',
	'notification-page-linked-email-batch-bundle-body' => '$2頁面已經從$3頁面以及另外 $4 個{{PLURAL:$5|頁面}}{{GENDER:$1|連入}}了。',
	'echo-email-batch-subject-daily' => '您在{{SITENAME}}站上有{{PLURAL:$2|新的通知}}',
	'echo-email-batch-subject-weekly' => '本週您在{{SITENAME}}站上有{{PLURAL:$2|新的通知}}',
	'echo-email-batch-body-intro-daily' => '$1您好，
這是您在{{SITENAME}}今日活動記錄的摘要。',
	'echo-email-batch-body-intro-weekly' => '$1您好，
這是您在{{SITENAME}}本週活動記錄的摘要。',
	'echo-email-batch-link-text-view-all-notifications' => '檢視所有通知',
	'echo-rev-deleted-text-view' => '該頁面修訂已停用。',
);
