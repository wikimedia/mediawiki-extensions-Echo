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
	'prefs-emailsubscriptions' => 'Notify me by e-mail when someone',
	'prefs-emailfrequency' => 'When would you like to receive e-mail notifications?',
	'echo-pref-email-edit-user-talk' => 'Posts on my talk page',
	'echo-pref-email-article-linked' => 'Creates a link to a page I created',
	'echo-pref-email-reverted' => 'Reverts my edit',
	'echo-pref-email-frequency-never' => 'Do not send me any e-mail notifications',
	'echo-pref-email-frequency-immediately' => 'Individual notifications as they come in',
	'echo-pref-email-frequency-daily' => 'A daily summary of notifications',
	'echo-pref-email-frequency-weekly' => 'A weekly summary of notifications',
	'echo-pref-notify-hide-link' => 'Hide the link and badge for notifications in my toolbar',

	// Errors
	'echo-no-agent' => '[Nobody]',
	'echo-no-title' => '[No page]',
	'echo-error-no-formatter' => 'No formatting defined for notification',

	// Special:Notifications
	'notifications' => 'Notifications',
	'tooltip-pt-notifications' => 'Your notifications',
	'echo-specialpage' => 'My notifications',
	'echo-anon' => 'To receive notifications, [[Special:Userlogin/signup|create an account]] or [[Special:UserLogin|log in]].',
	'echo-none' => 'You have no notifications.',
	'echo-more-info' => 'More info',

	// Notification
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|posted}} on your [[User talk:$2|talk page]].',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|posted}} on your [[User talk:$2|talk page]].',
	'notification-article-linked2' => '$3 {{PLURAL:$4|was|were}} {{GENDER:$1|linked}} by [[User:$1|$1]] from this page: [[$2]]',
	'notification-article-linked-flyout2' => '$3 {{PLURAL:$4|was|were}} {{GENDER:$1|linked}} by $1 from this page: [[$2]]',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|commented}} on "[[$3|$2]]" on the "$4" talk page',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|posted}} a new topic "$2" on [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|sent}} you a message: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|commented}} on "[[$3#$2|$2]]" on your talk page',
	'notification-talkpage-content' => '$1', ## Do not translate unless you deliberately want to change behaviour
	'notification-new-user' => 'Welcome to {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Please remember to sign any comments on talk pages with 4 tildes (~~~~).',
	'notification-reverted2' => 'Your {{PLURAL:$4|edit on [[$2]] has|edits on [[$2]] have}} been {{GENDER:$1|reverted}} by [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => 'Your {{PLURAL:$4|edit on $2 has|edits on $2 have}} been {{GENDER:$1|reverted}} by $1 $3',
	'notification-edit-talk-page-email-subject2' => 'You have a new talkpage message',
	'notification-edit-talk-page-email-body2' => '{{SITENAME}} user $1 {{GENDER:$1|posted}} on your talk page:

$3

View more:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|posted}} on your talk page',
	'notification-article-linked-email-subject2' => '{{PLURAL:$2|A page|Pages}} you started {{PLURAL:$2|was|were}} cross referenced on {{SITENAME}}',
	'notification-article-linked-email-body2' => '$4 {{PLURAL:$5|was|were}} {{GENDER:$1|linked}} by {{SITENAME}} user $1, from this page: $2

View more:

$3

$6',
	'notification-article-linked-email-batch-body2' => '$2 {{PLURAL:$3|was|were}} {{GENDER:$1|linked}} by $1',
	'notification-reverted-email-subject2' => 'Your {{PLURAL:$3|edit on $2 was|edits on $2 were}} {{GENDER:$1|reverted}} by $1',
	'notification-reverted-email-body2' => 'Your {{PLURAL:$7|edit on $2 has been|edits on $2 have been}} {{GENDER:$1|reverted}} by $1.

$5

View more:

$3

$6',
	'notification-reverted-email-batch-body2' => 'Your {{PLURAL:$3|edit on $2 was|edits on $2 were}} {{GENDER:$1|reverted}} by $1',
	'echo-notification-count' => '$1+',
	// E-mail notification
	'echo-email-subject-default' => 'New notification at {{SITENAME}}',
	'echo-email-body-default' => 'You have a new notification at {{SITENAME}}:

$1',
	'echo-email-footer-default' => '$2

To control which e-mails we send you, visit:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	// Notifications overlay
	'echo-link-new' => '$1 new {{PLURAL:$1|notification|notifications}}',
	'echo-link' => 'Notifications',
	'echo-overlay-link' => 'All notifications',
	'echo-overlay-title' => 'My notifications',
	'echo-overlay-title-overflow' => 'My notifications (showing $1 of $2 unread)',

	// Special page
	'echo-date-today' => 'Today',
	'echo-date-yesterday' => 'Yesterday',
	'echo-date-header' => '$1 $2',
	'echo-load-more-error' => 'An error occurred while fetching more results.',

	// E-mail batch
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
	'echo-email-batch-category-header-edit-user-talk' => '$1 talk page {{PLURAL:$1|message|messages}}',
	'echo-email-batch-category-header-edit-revert' => '$1 edit {{PLURAL:$1|revert|reverts}}',
	'echo-email-batch-category-header-cross-reference' => '$1 {{PLURAL:$1|cross reference|cross references}}',
	'echo-email-batch-category-header-other' => '$1 {{PLURAL:$1|other|others}}',
);

/** Message documentation (Message documentation)
 * @author Amire80
 * @author Kghbln
 * @author Krenair
 * @author Minh Nguyen
 * @author Nike
 * @author Raymond
 * @author Shirayuki
 * @author Siebrand
 */
$messages['qqq'] = array(
	'echo-desc' => '{{desc|name=Echo|url=http://www.mediawiki.org/wiki/Extension:Echo}}',
	'prefs-echo' => 'Name of preferences section for Echo notifications.
{{Identical|Notification}}',
	'prefs-displaynotifications' => 'Header for the section of preferences that deals with how notifications are displayed',
	'prefs-emailsubscriptions' => 'Header for the section of preferences that deals with which notifications the user receives emails for
* {{msg-mw|Echo-pref-email-edit-user-talk}}
* {{msg-mw|Echo-pref-email-article-linked}}
* {{msg-mw|Echo-pref-email-reverted}}
"Page Triage" messages:
* {{msg-mw|Echo-pref-email-pagetriage-mark-as-reviewed}}
* {{msg-mw|Echo-pref-email-pagetriage-add-maintenance-tag}}
* {{msg-mw|Echo-pref-email-pagetriage-add-deletion-tag}}',
	'prefs-emailfrequency' => 'Header for the section of preferences that deals with how often notification emails are sent out
* {{msg-mw|Echo-pref-email-frequency-never}}
* {{msg-mw|Echo-pref-email-frequency-immediately}}
* {{msg-mw|Echo-pref-email-frequency-daily}}
* {{msg-mw|Echo-pref-email-frequency-weekly}}',
	'echo-pref-email-edit-user-talk' => "Option for getting emails when someone posts on the user's talk page. This is the conclusion of the sentence begun by the header: {{msg-mw|prefs-emailsubscriptions}}.",
	'echo-pref-email-article-linked' => 'Option for getting emails when someone creates a link to a page created by the user. This is the conclusion of the sentence begun by the header: {{msg-mw|prefs-emailsubscriptions}}.',
	'echo-pref-email-reverted' => "Option for getting emails when someone reverts the user's edit. This is the conclusion of the sentence begun by the header: {{msg-mw|prefs-emailsubscriptions}}.",
	'echo-pref-email-frequency-never' => "Option for users who don't want to receive any email notifications

See also:
* {{msg-mw|Echo-pref-email-frequency-immediately}}
* {{msg-mw|Echo-pref-email-frequency-daily}}
* {{msg-mw|Echo-pref-email-frequency-weekly}}",
	'echo-pref-email-frequency-immediately' => 'Option for users who want to receive email for each notification as it occurs',
	'echo-pref-email-frequency-daily' => 'Option for users who want to receive a daily digest of email notifications',
	'echo-pref-email-frequency-weekly' => 'Option for users who want to receive a weekly digest of email notifications',
	'echo-pref-notify-hide-link' => "Label for a preference which disables the 'Notifications' link in the header and associated fly-out panel",
	'echo-no-agent' => 'Shown in place of a username in a notification
	if the notification has no specified user.',
	'echo-no-title' => 'Shown in place of a page title in a notification if the notification has no specified page title.',
	'echo-error-no-formatter' => "Error message displayed when no formatting has been defined for a notification. In other words, the extension doesn't know how to properly display the notification.",
	'notifications' => 'This message is the page title of the special page [[Special:Notifications]].
{{Identical|Notification}}',
	'tooltip-pt-notifications' => 'This is used for the title (mouseover text) of the notifications user tool.',
	'echo-specialpage' => 'Special page title for Special:Notifications',
	'echo-anon' => 'Error message shown to users who try to visit Special:Notifications as an anon.',
	'echo-none' => 'Message shown to users who have no notifications. Also shown in the overlay.',
	'echo-more-info' => 'This is used for the title (mouseover text) of an icon that links to a page with more information about the Echo extension.',
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
	'notification-article-linked2' => 'Format for displaying notifications of articles being linked
* $1 is the username of the person who linked the page, plain text. Can be used for GENDER.
* $2 is the page to which new links are added
* $3 is comma separated list of pages being linked
* $4 is the number of pages being linked
See also:
* {{msg-mw|Notification-article-linked-flyout2}}
* {{msg-mw|Notification-article-linked-email-batch-body2}}
* {{msg-mw|Notification-article-linked-email-subject2}}
* {{msg-mw|Notification-article-linked-email-body2}}',
	'notification-article-linked-flyout2' => 'Flyout-specific format for displaying notifications of articles being linked
* $1 is the username of the person who linked the page, plain text. Can be used for GENDER.
* $2 is the page to which new links are added
* $3 is comma separated list of pages being linked
* $4 is the number of pages being linked
See also:
* {{msg-mw|Notification-article-linked2}}
* {{msg-mw|Notification-article-linked-email-batch-body2}}
* {{msg-mw|Notification-article-linked-email-subject2}}
* {{msg-mw|Notification-article-linked-email-body2}}',
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
	'notification-talkpage-content' => 'Message shown as the "content" of a talkpage-related action.
* $1 is the content of the talk page post.

{{optional}}',
	'notification-new-user' => 'Title for the welcome notification. Parameters:
* $1 - the name of the new user
See also:
* {{msg-mw|Guidedtour-tour-gettingstarted-start-title}}',
	'notification-new-user-content' => 'The content shown to users on their welcome notification.',
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
	'notification-article-linked-email-subject2' => 'E-mail subject. Parameters:
* $1 is a comma separated list of pages being linked.
* $2 is the number of pages being linked.
See also:
* {{msg-mw|Notification-article-linked2}}
* {{msg-mw|Notification-article-linked-flyout2}}
* {{msg-mw|Notification-article-linked-email-batch-body2}}
* {{msg-mw|Notification-article-linked-email-body2}}',
	'notification-article-linked-email-body2' => 'E-mail notification. Parameters:
* $1 is the username of the person who linked the page, plain text.  Can be used for GENDER.
* $2 is the page to which new links are added.
* $3 is the link to the page with new links added.
* $4 is a comma separated list of pages being linked.
* $5 is the number of pages being linked.
* $6 is the e-mail footer, {{msg-mw|echo-email-footer-default}}.
See also:
* {{msg-mw|Notification-article-linked2}}
* {{msg-mw|Notification-article-linked-flyout2}}
* {{msg-mw|Notification-article-linked-email-batch-body2}}
* {{msg-mw|Notification-article-linked-email-subject2}}',
	'notification-article-linked-email-batch-body2' => 'E-mail notification for page being linked. Parameters:
* $1 is the username of the person who linked the page, plain text. Can be used for GENDER.
* $2 is a comma separated list of pages being linked.
* $3 is the number of pages being linked.
See also:
* {{msg-mw|Notification-article-linked2}}
* {{msg-mw|Notification-article-linked-flyout2}}
* {{msg-mw|Notification-article-linked-email-subject2}}
* {{msg-mw|Notification-article-linked-email-body2}}',
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
	'echo-notification-count' => '{{optional}}
The new notification count next to notification link, for example: 99+
* $1 is the count',
	'echo-email-subject-default' => 'Default subject for Echo e-mail notifications',
	'echo-email-body-default' => 'Default message content for Echo e-mail notifications.
* $1 is a plain text description of the notification.',
	'echo-email-footer-default' => 'Default footer content for Echo e-mail notifications.  Parameters:
* $1 is the address of the organization that sent the e-mail
* $2 is "-------..." ({{msg-mw|echo-email-batch-separator}})',
	'echo-link-new' => 'Shown in "personal links" when a user has unread notifications.
* $1 is number of unread notifications',
	'echo-link' => 'Shown in "personal links" when a user has JS. New notifications are indicated with a badge.
{{Identical|Notification}}',
	'echo-overlay-link' => 'Link to "all notifications" at the bottom of the overlay',
	'echo-overlay-title' => 'Title at the top of the notifications overlay',
	'echo-overlay-title-overflow' => 'Title at the top of the notifications overlay when there are additional unread notifications that are not being shown. Parameters:
* $1 - the number of unread notifications being shown
* $2 - the total number of unread notifications that exist',
	'echo-date-today' => "The header text for today's notification section",
	'echo-date-yesterday' => "The header text for yesterday's notification section",
	'echo-date-header' => '{{optional}}
The header text for each notification section which is grouped by date
* $1 is the month, it could be {{msg-mw|january-gen}}, {{msg-mw|february-gen}}, {{msg-mw|march-gen}}, {{msg-mw|april-gen}}, {{msg-mw|may-gen}}, {{msg-mw|june-gen}}, {{msg-mw|july-gen}}, {{msg-mw|august-gen}}, {{msg-mw|september-gen}}, {{msg-mw|october-gen}}, {{msg-mw|november-gen}}, {{msg-mw|december-gen}}
* $2 is the date of a month, eg 21',
	'echo-load-more-error' => 'Error message for errors in loading more notifications',
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
	'echo-email-batch-category-header-edit-user-talk' => 'E-mail batch section title for edit-user-talk category
* $1 is the numeric count
See also:
* {{msg-mw|Echo-email-batch-category-header-edit-revert}}
* {{msg-mw|Echo-email-batch-category-header-cross-reference}}
* {{msg-mw|Echo-email-batch-category-header-other}}',
	'echo-email-batch-category-header-edit-revert' => 'E-mail batch section title for edit-revert category
* $1 is the numeric count
See also:
* {{msg-mw|Echo-email-batch-category-header-edit-user-talk}}
* {{msg-mw|Echo-email-batch-category-header-cross-reference}}
* {{msg-mw|Echo-email-batch-category-header-other}}',
	'echo-email-batch-category-header-cross-reference' => 'E-mail batch section title for cross-reference category
* $1 is the numeric count
See also:
* {{msg-mw|Echo-email-batch-category-header-edit-user-talk}}
* {{msg-mw|Echo-email-batch-category-header-edit-revert}}
* {{msg-mw|Echo-email-batch-category-header-other}}',
	'echo-email-batch-category-header-other' => 'E-mail batch section title for events with category not specified
* $1 is the numeric count
See also:
* {{msg-mw|Echo-email-batch-category-header-edit-user-talk}}
* {{msg-mw|Echo-email-batch-category-header-edit-revert}}
* {{msg-mw|Echo-email-batch-category-header-cross-reference}}',
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
	'prefs-emailsubscriptions' => 'Паведамляць мне праз электронную пошту, калі нехта',
	'prefs-emailfrequency' => 'Калі вы хочаце атрымліваць абвесткі праз e-mail?',
	'echo-pref-email-edit-user-talk' => 'Піша на маёй старонцы гутарак',
	'echo-pref-email-article-linked' => 'Робіць спасылку на створаную мною старонку',
	'echo-pref-email-reverted' => 'Скасоўвае маю праўку',
	'echo-pref-email-frequency-never' => 'Не дасылаць мне абвестак праз e-mail',
	'echo-pref-email-frequency-immediately' => 'Асобна кожнае, калі зьяўляецца',
	'echo-pref-email-frequency-daily' => 'Штодзённая зборка абвестак',
	'echo-pref-email-frequency-weekly' => 'Штотыднёвая зборка абвестак',
	'echo-pref-notify-hide-link' => 'Схаваць спасылку і значак пра абвесткі ў маёй панэлі інструмэнтаў',
	'echo-no-agent' => '[Ніхто]',
	'echo-no-title' => '[Няма старонкі]',
	'echo-error-no-formatter' => 'Фарматаваньне для абвестак ня вызначана',
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
	'echo-email-subject-default' => 'Новая абвестка ад {{GRAMMAR:родны|{{SITENAME}}}}',
	'echo-email-body-default' => 'Для вас ёсьць новая абвестка ў {{GRAMMAR:месны|{{SITENAME}}}}:

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
	'echo-email-batch-category-header-edit-user-talk' => '$1 {{PLURAL:$1|паведамленьне|паведамленьні|паведамленьняў}} на старонцы абмеркаваньняў',
	'echo-email-batch-category-header-edit-revert' => '$1 {{PLURAL:$1|скасаваньне|скасаваньні|скасаваньняў}} правак',
	'echo-email-batch-category-header-other' => '$1 {{PLURAL:$1|іншая|іншыя|іншых}}',
);

/** Breton (brezhoneg)
 * @author Fulup
 * @author Y-M D
 */
$messages['br'] = array(
	'echo-no-agent' => '[Den]',
	'echo-no-title' => '[Diditl]', # Fuzzy
	'notification-edit' => '$2 {{GENDER:$1|en deus kemmet}} [[$3]] $4', # Fuzzy
	'notification-edit-talk-page' => '$2 en deus {{GENDER:$1|kemmet}} [[User talk:$3|ho pajenn kaozeadenn]]. $4',
	'notification-add-talkpage-topic' => '$2 a zo {{GENDER:$1|kroget}} gant un tem nevez "$3" war [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 en deus {{GENDER:$1|kaset}} deoc\'h ur gemennadenn : "[[$4#$3|$3]]"',
);

/** Catalan (català)
 * @author පසිඳු කාවින්ද
 */
$messages['ca'] = array(
	'notifications' => 'Notificacions',
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
	'prefs-emailsubscriptions' => 'Upozorněte mě e-mailem, když někdo',
	'prefs-emailfrequency' => 'Kdy chcete dostávat e-mailová upozornění?',
	'echo-pref-email-edit-user-talk' => 'Napíše do mé diskuse',
	'echo-pref-email-article-linked' => 'Vytvoří odkaz na stránku, kterou jsem založil',
	'echo-pref-email-reverted' => 'Vrátí moje úpravy',
	'echo-pref-email-frequency-never' => 'Neposílejte mi žádná upozornění e-mailem',
	'echo-pref-email-frequency-immediately' => 'Jednotlivá upozornění, jakmile se objeví',
	'echo-pref-email-frequency-daily' => 'Denní souhrn upozornění',
	'echo-pref-email-frequency-weekly' => 'Týdenní souhrn upozornění',
	'echo-pref-notify-hide-link' => 'Skrýt odkaz a štítek upozornění v uživatelském panelu',
	'echo-no-agent' => '[Nikdo]',
	'echo-no-title' => '[Žádná stránka]',
	'echo-error-no-formatter' => 'Upozornění nemá definováno formátování',
	'notifications' => 'Upozornění',
	'tooltip-pt-notifications' => 'Vaše upozornění',
	'echo-specialpage' => 'Moje upozornění',
	'echo-anon' => 'Pro zobrazování upozornění je nutné [[Special:Userlogin/signup|vytvořit si účet]] nebo [[Special:UserLogin|se přihlásit]].',
	'echo-none' => 'Žádné upozornění zatím neobdrženo.', # Fuzzy
	'notification-new-user' => 'Vítá vás {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Nezapomeňte všechny komentáře v diskusních stránkách podepisovat čtyřmi vlnovkami (~~~~).',
	'echo-email-subject-default' => 'Nové upozornění na {{grammar:6sg|{{SITENAME}}}}',
	'echo-email-body-default' => 'Na {{grammar:6sg|{{SITENAME}}}} máte nové upozornění:

$1',
	'echo-email-footer-default' => '$2

Pro nastavení e-mailů, které vám máme posílat, navštivte:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nové upozornění|nová upozornění|nových upozornění}}',
	'echo-link' => 'Moje upozornění', # Fuzzy
	'echo-overlay-link' => 'Všechna upozornění',
	'echo-overlay-title' => 'Moje upozornění',
	'echo-overlay-title-overflow' => 'Moje upozornění (zobrazuje se $1 z $2 nepřečtených)',
	'echo-date-today' => 'Dnes',
	'echo-date-yesterday' => 'Včera',
	'echo-load-more-error' => 'Při načítání dalších výsledků došlo k chybě.',
	'echo-email-batch-subject-daily' => 'Dnes máte $1 {{PLURAL:$2|upozornění}}',
	'echo-email-batch-subject-weekly' => 'Tento týden máte $1 {{PLURAL:$2|upozornění}}',
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
	'prefs-emailsubscriptions' => 'Benachrichtige mich per E-Mail, wenn jemand',
	'prefs-emailfrequency' => 'Wann möchtest du E-Mail-Benachrichtigungen erhalten?',
	'echo-pref-email-edit-user-talk' => 'Nachrichten auf meiner Diskussionsseite hinterlässt',
	'echo-pref-email-article-linked' => 'Verlinkungen zu einer von mir erstellten Seite vornimmt',
	'echo-pref-email-reverted' => 'Bearbeitungen von mir rückgängig macht',
	'echo-pref-email-frequency-never' => 'Keine Benachrichtigungen',
	'echo-pref-email-frequency-immediately' => 'Individuelle Benachrichtigung zu jedem Ereignis',
	'echo-pref-email-frequency-daily' => 'Tägliche Benachrichtigung zu den Ereignissen',
	'echo-pref-email-frequency-weekly' => 'Wöchentliche Benachrichtigung zu den Ereignissen',
	'echo-pref-notify-hide-link' => 'Den Link sowie das Symbol für Benachrichtigungen nicht in meiner Benutzerleiste anzeigen',
	'echo-no-agent' => '[Niemand]',
	'echo-no-title' => '[Keine Seite]',
	'echo-error-no-formatter' => 'Keine Formatierung zur Benachrichtigung definiert',
	'notifications' => 'Benachrichtigungen',
	'tooltip-pt-notifications' => 'Deine Benachrichtigungen',
	'echo-specialpage' => 'Meine Benachrichtigungen',
	'echo-anon' => 'Um Benachrichtigungen erhalten zu können, muss man ein [[Special:Userlogin/signup|Benutzerkonto anlegen]] oder sich [[Special:UserLogin|anmelden]].',
	'echo-none' => 'Du hast keine Benachrichtigungen.',
	'echo-more-info' => 'Mehr Informationen',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|hinterließ}} eine Nachricht auf deiner [[User talk:$2|Diskussionsseite]].',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|hinterließ}} eine Nachricht auf deiner [[User talk:$2|Diskussionsseite]].',
	'notification-article-linked2' => '{{PLURAL:$4|Die Seite $3 wurde|Die Seiten $3 wurden}} von [[User:$1|$1]] von der Seite [[$2]] {{GENDER:$1|verlinkt}}.',
	'notification-article-linked-flyout2' => '{{PLURAL:$4|Die Seite $3 wurde|Die Seiten $3 wurden}} von $1 von der Seite [[$2]] {{GENDER:$1|verlinkt}}.',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|kommentierte}} auf „[[$3|$2]]“ auf der Diskussionsseite von „$4“',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|startete}} das neue Thema „$2“ auf [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] hat dir eine Nachricht {{GENDER:$1|gesandt}}: „[[$3#$2|$2]]“',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|kommentierte}} auf „[[$3#$2|$2]]“ auf deiner Diskussionsseite',
	'notification-new-user' => 'Willkommen bei {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Bitte vergiss nicht alle Beiträge auf Diskussionsseiten mit 4 Tilden (~~~~) zu signieren.',
	'notification-reverted2' => 'Deine {{PLURAL:$4|Bearbeitung an der Seite [[$2]] wurde|Bearbeitungen an der Seite [[$2]] wurden}} von [[User:$1|$1]] {{GENDER:$1|rückgängig}} gemacht. $3',
	'notification-reverted-flyout2' => 'Deine {{PLURAL:$4|Bearbeitung an der Seite $2 wurde|Bearbeitungen an der Seite $2 wurden}} von $1 {{GENDER:$1|rückgängig}} gemacht. $3',
	'notification-edit-talk-page-email-subject2' => 'Du hast eine neue Diskussionsseitennachricht',
	'notification-edit-talk-page-email-body2' => '{{GENDER:$1|Der {{SITENAME}}-Benutzer|Die {{SITENAME}}-Benutzerin}} $1 hinterließ eine Nachricht auf deiner Diskussionsseite:

$3

Mehr:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|hinterließ}} eine Nachricht auf deiner Diskussionsseite',
	'notification-article-linked-email-subject2' => '{{PLURAL:$2|Eine Seite|$2 Seiten}}, die du auf {{SITENAME}} angelegt hast, {{PLURAL:$2|wurde|wurden}} mit einem Querverweis versehen.',
	'notification-article-linked-email-body2' => '{{PLURAL:$5|Die Seite $4 wurde|Die Seiten $4 wurden}} {{GENDER:$1|vom {{SITENAME}}-Benutzer|von der {{SITENAME}}-Benutzerin}} $1 von der Seite $2 verlinkt.

Mehr:

$3

$6',
	'notification-article-linked-email-batch-body2' => '{{PLURAL:$3|Die Seite $2 wurde|Die Seiten $2 wurden}} von $1 {{GENDER:$1|verlinkt}}',
	'notification-reverted-email-subject2' => 'Deine {{PLURAL:$3|Bearbeitung an der Seite $2 wurde|Bearbeitungen an der Seite $2 wurden}} von $1 {{GENDER:$1|rückgängig}} gemacht',
	'notification-reverted-email-body2' => 'Deine {{PLURAL:$7|Bearbeitung an der Seite $2 wurde|Bearbeitungen an der Seite $2 wurden}} von $1 {{GENDER:$1|rückgängig}} gemacht.

$5

Mehr:

$3

$6',
	'notification-reverted-email-batch-body2' => 'Deine {{PLURAL:$3|Bearbeitung an der Seite $2 wurde|Bearbeitungen an der Seite $2 wurden}} von $1 {{GENDER:$1|rückgängig}} gemacht',
	'echo-email-subject-default' => 'Neue Benachrichtigung auf {{SITENAME}}',
	'echo-email-body-default' => 'Es gibt eine neue Benachrichtigung auf {{SITENAME}}:

$1',
	'echo-email-footer-default' => '$2

Um zu kontrollieren, welche E-Mails wir dir senden, besuche bitte:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 neue {{PLURAL:$1|Benachrichtigung|Benachrichtigungen}}',
	'echo-link' => 'Benachrichtigungen',
	'echo-overlay-link' => 'Alle Benachrichtigungen',
	'echo-overlay-title' => 'Meine Benachrichtigungen',
	'echo-overlay-title-overflow' => 'Meine Benachrichtigungen ($1 von $2 ungelesenen werden angezeigt)',
	'echo-date-today' => 'Heute',
	'echo-date-yesterday' => 'Gestern',
	'echo-load-more-error' => 'Beim Abrufen mehrerer Ergebnisse ist ein Fehler aufgetreten.',
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
	'echo-email-batch-category-header-edit-user-talk' => '{{PLURAL:$1|Eine Diskussionsseitennachricht|$1 Diskussionsseitennachrichten}}',
	'echo-email-batch-category-header-edit-revert' => '{{PLURAL:$1|Eine Zurücksetzung|$1 Zurücksetzungen}}',
	'echo-email-batch-category-header-cross-reference' => '{{PLURAL:$1|Ein Querverweis|$1 Querverweise}}',
	'echo-email-batch-category-header-other' => '{{PLURAL:$1|Eine andere|$1 andere}}',
);

/** German (formal address) (Deutsch (Sie-Form)‎)
 * @author Kghbln
 */
$messages['de-formal'] = array(
	'prefs-emailfrequency' => 'Wann möchten Sie E-Mail-Benachrichtigungen erhalten?',
	'echo-none' => 'Sie haben in letzter Zeit keine Benachrichtigungen erhalten.', # Fuzzy
	'notification-new-user-content' => 'Bitte vergessen Sie nicht alle Beiträge auf Diskussionsseiten mit 4 Tilden (~~~~) zu signieren.',
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
	'notification-edit' => '$2\'i [[$3]] {{GENDER:$1|vurnê}} $4: "$5"',
	'echo-link' => 'Tebliği',
	'echo-overlay-link' => 'Tebliği pêro...',
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
	'prefs-emailsubscriptions' => 'Να ειδοποιούμαι μέσω ηλεκτρονικού ταχυδρομείου όταν κάποιος',
	'prefs-emailfrequency' => 'Πόσο συχνά λαμβάνω ειδοποιήσεις μέσω ηλεκτρονικού ταχυδρομείου', # Fuzzy
	'echo-pref-email-edit-user-talk' => 'Δημοσιεύσεις στη σελίδα συζήτησής μου',
	'echo-pref-email-reverted' => 'Αναστρέφει την επεξεργασία μου',
	'echo-pref-email-frequency-never' => 'Μην μου στέλνετε ειδοποιήσεις μέσω ηλεκτρονικού ταχυδρομείου',
	'echo-pref-email-frequency-daily' => 'Μια ημερήσια σύνοψη ειδοποιήσεων',
	'echo-pref-email-frequency-weekly' => 'Μια εβδομαδιαία σύνοψη ειδοποιήσεων',
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
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'echo-no-agent' => '[Neniu]',
	'echo-no-title' => '[Sen Paĝo]',
	'notification-edit' => '$2 {{GENDER:$1|redaktis}} [[$3]] $4: "$5"',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|afiŝis}} en via [[User talk:$3|diskuto-pago]].',
	'notification-add-comment' => '$2 {{GENDER:$1|komentis}} en "[[$4|$3]]" en la diskuto-paĝo "$5"',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|afiŝis}} novan temon "$3" je [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|sendis}} al vi mesaĝon: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|komentis}} en "[[$4|$3]]" en via diskuto-paĝo "$5"', # Fuzzy
	'notification-new-user' => 'Bonvenon al {{SITENAME}}, $1!',
	'notification-edit-talk-page-email-batch-body' => '$2 {{GENDER:$2|afiŝis}} en via diskuto-paĝo',
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
 * @author Invadinado
 * @author Ralgis
 * @author TheBITLINK
 * @author Vivaelcelta
 */
$messages['es'] = array(
	'echo-desc' => 'Sistema de notificaciones',
	'prefs-echo' => 'Notificaciones',
	'prefs-displaynotifications' => 'Opciones de visualización',
	'prefs-emailsubscriptions' => 'Notificarme por correo electrónico cuando alguien',
	'prefs-emailfrequency' => '¿Con qué frecuencia recibo notificaciones por correo electrónico?', # Fuzzy
	'echo-pref-email-edit-user-talk' => 'Mensajes en mi página de discusión',
	'echo-pref-email-reverted' => 'Revierte mi edición',
	'echo-pref-email-frequency-never' => 'No me envíes notificaciones por correo electrónico',
	'echo-pref-email-frequency-immediately' => 'Enviarme las notificaciones individuales en cuanto lleguen',
	'echo-pref-email-frequency-daily' => 'Un resumen diario de notificaciones',
	'echo-pref-email-frequency-weekly' => 'Un resumen semanal de las notificaciones',
	'echo-pref-notify-hide-link' => 'Ocultar el enlace y la insignia para las notificaciones en mi barra de herramientas',
	'echo-no-agent' => '[Nadie]',
	'echo-no-title' => '[No hay ninguna página]',
	'echo-error-no-formatter' => 'Sin formato definido para notificaciones',
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
	'prefs-emailsubscriptions' => 'Mulle saadetakse e-kiri, kui keegi',
	'echo-pref-email-edit-user-talk' => 'Postitab mu aruteluleheküljele',
	'echo-pref-email-reverted' => 'Tühistab mu muudatuse',
	'echo-no-agent' => '[Eikeegi]',
	'echo-no-title' => '[Lehekülge pole]',
	'notifications' => 'Teavitused',
	'echo-specialpage' => 'Minu märkused',
	'echo-anon' => 'Et teavitusi saada, [[Special:Userlogin/signup|loo konto]] või [[Special:UserLogin|logi sisse]].',
	'notification-edit' => '$2 {{GENDER:$1|redigeeris}} lehekülge [[$3]] $4: "$5"',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|postitas}} sinu [[User talk:$3|aruteluleheküljele]].',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|postitas}} leheküljele [[$4]] uue teema "$3"',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|saatis}} sulle sõnumi: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|kommenteeris}} sinu aruteluleheküljel teemat "[[$4#$3|$3]]"',
	'notification-new-user' => 'Tere tulemast saidile {{SITENAME}}, $1!',
	'notification-edit-talk-page-email-subject' => 'Sul on uus arutelulehekülje sõnum',
	'notification-edit-talk-page-email-body' => '{{GRAMMAR:genitive|{{SITENAME}}}} kasutaja $2 postitas sinu arutelulehele:

$4

Vaata lisaks:

$3

$5',
	'notification-reverted-email-subject' => '$2 tühistas sinu muudatuse leheküljel $3', # Fuzzy
	'notification-reverted-email-batch-body' => '$2 tühistas sinu muudatuse leheküljel $3', # Fuzzy
	'echo-link-new' => '$1 {{PLURAL:$1|uus teavitus|uut teavitust}}',
	'echo-link' => 'Teavitused',
	'echo-overlay-link' => 'Kõik teavitused',
	'echo-overlay-title' => 'Minu märkused',
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
 * @author VezonThunder
 */
$messages['fi'] = array(
	'echo-desc' => 'Ilmoitusjärjestelmä',
	'prefs-echo' => 'Ilmoitukset',
	'prefs-displaynotifications' => 'Näyttöasetukset',
	'prefs-emailsubscriptions' => 'Ilmoita minulle sähköpostilla, kun joku',
	'prefs-emailfrequency' => 'Kuinka usein saan sähköposti-ilmoituksia', # Fuzzy
	'echo-pref-email-edit-user-talk' => 'Kirjoittaa keskustelusivulleni',
	'echo-pref-email-reverted' => 'Kumoaa muokkaukseni',
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
	'notification-new-user' => 'Tervetuloa sivustolle {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Muista allekirjoittaa kommenttisi keskustelusivuilla neljällä tildellä (~~~~).',
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
	'echo-overlay-title-overflow' => 'Ilmoitukseni (näytetään $1/$2 lukematonta)',
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
	'echo-email-batch-category-header-edit-user-talk' => '$1 {{PLURAL:$1|viesti|viestiä}} keskustelusivulla',
	'echo-email-batch-category-header-edit-revert' => '$1 {{PLURAL:$1|muokkaus|muokkausta}} kumottu',
	'echo-email-batch-category-header-other' => '$1 {{PLURAL:$1|muu|muuta}}',
);

/** French (français)
 * @author Crochet.david
 * @author DavidL
 * @author Gomoko
 * @author Hello71
 * @author IAlex
 * @author Jean-Frédéric
 * @author Tititou36
 */
$messages['fr'] = array(
	'echo-desc' => 'Système de notifications',
	'prefs-echo' => 'Notifications',
	'prefs-displaynotifications' => "Options d'affichage",
	'prefs-emailsubscriptions' => "M'avertir par courriel quand quelqu'un",
	'prefs-emailfrequency' => 'Quand aimeriez-vous recevoir les notifications par courriel ?',
	'echo-pref-email-edit-user-talk' => 'Messages sur ma page de discussion',
	'echo-pref-email-article-linked' => "Crée un lien vers une page que j'ai créée",
	'echo-pref-email-reverted' => 'Annuler ma modification',
	'echo-pref-email-frequency-never' => "Ne pas m'envoyer de notification par courriel",
	'echo-pref-email-frequency-immediately' => "Notifications individuelles au fil de l'eau",
	'echo-pref-email-frequency-daily' => 'Un sommaire quotidien des notifications',
	'echo-pref-email-frequency-weekly' => 'Un sommaire hebdomadaire des notifications',
	'echo-pref-notify-hide-link' => "Masquer le lien et l'insigne pour les notifications dans ma barre d'outils",
	'echo-no-agent' => '[Personne]',
	'echo-no-title' => '[Aucune page]',
	'echo-error-no-formatter' => 'Aucune mise en forme définies pour la notification',
	'notifications' => 'Notifications',
	'tooltip-pt-notifications' => 'Vos notifications',
	'echo-specialpage' => 'Mes notifications',
	'echo-anon' => 'Pour recevoir des notifications, [[Special:Userlogin/signup|créez un compte]] ou [[Special:UserLogin|connectez-vous]].',
	'echo-none' => "Vous n'avez reçu aucune notification.",
	'echo-more-info' => "Plus d'information",
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|a publié}} sur votre [[User talk:$2|page de discussion]].',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|a publié}} sur votre [[User talk:$2|page de discussion]].',
	'notification-article-linked2' => '$3 {{PLURAL:$4|a été liée|ont été liées}} {{GENDER:$1|}} par [[User:$1|$1]] depuis cette page: [[$2]]',
	'notification-article-linked-flyout2' => '$3 {{PLURAL:$4|a été liée|ont été liées}} {{GENDER:$1|}} par $1 depuis cette page: [[$2]]',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|a fait un commentaire}} sur "[[$3|$2]]" sur la page de discussion "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|a publié}} un nouveau sujet "$2" sur [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] vous {{GENDER:$1|a envoyé}} un message: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|a fait un commentaire}} sur "[[$3#$2|$2]]" sur votre page de discussion',
	'notification-new-user' => 'Bienvenue sur {{SITENAME}}, $1 !',
	'notification-new-user-content' => "N'oubliez pas de signer vos commentaires sur les pages de discussion avec 4 tildes (~~~~).",
	'notification-reverted2' => '{{PLURAL:$4|Votre modification sur [[$2]] a|Vos modifications sur [[$2]] ont}} été {{GENDER:$1|annulée}}{{PLURAL:$4||s}} par [[User:$1|$1]] $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|Votre modification sur $2 a|Vos modifications sur $2 ont}} été {{GENDER:$1|annulée}}{{PLURAL:$4||s}} par $1 $3',
	'notification-edit-talk-page-email-subject2' => 'Vous avez un nouveau message sur votre page de discussion',
	'notification-edit-talk-page-email-body2' => "L'utilisateur $1 de {{SITENAME}} {{GENDER:$1|a publié}} sur votre page de discussion:

$3

En savoir plus:

$2

$4",
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|a publié}} sur votre page de discussion',
	'notification-article-linked-email-subject2' => '{{PLURAL:$2|Une page|$2 pages}} que vous avez démarrée{{PLURAL:$2| a été référencée|s ont été référencées}} sur {{SITENAME}}',
	'notification-article-linked-email-body2' => "$4 {{PLURAL:$5|a été liée|ont été liées}} {{GENDER:$1|}} par l'utilisateur $1 de {{SITENAME}}, depuis cette page: $2

En savoir plus:

$3

$6",
	'notification-article-linked-email-batch-body2' => '$2 {{PLURAL:$3|a été lié|ont été liés}} {{GENDER:$1|}} par $1',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|Votre modification sur $2 a été annulée|Vos modifications sur $2 ont été annulées}} {{GENDER:$1|}} par $1',
	'notification-reverted-email-body2' => '{{PLURAL:$7|Votre modification sur $2 a été annulée|Vos modifications sur $2 ont été annulées}} {{GENDER:$1|}} par $1.

$5

En savoir plus:

$3

$6',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|Votre modification sur $2 a été annulée|Vos modifications sur $2 ont été annulées}} {{GENDER:$1|}} par $1',
	'echo-email-subject-default' => 'Nouvelle notification sur {{SITENAME}}',
	'echo-email-body-default' => 'Vous avez une nouvelle notification sur {{SITENAME}} :

$1',
	'echo-email-footer-default' => '$2

Pour vérifier quels courriels nous vous envoyons, allez sur:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nouvelle notification|nouvelles notifications}}',
	'echo-link' => 'Notifications',
	'echo-overlay-link' => 'Toutes les notifications',
	'echo-overlay-title' => 'Mes notifications',
	'echo-overlay-title-overflow' => 'Mes notifications (affichant $1 sur $2 non lus)',
	'echo-date-today' => "Aujourd'hui",
	'echo-date-yesterday' => 'Hier',
	'echo-load-more-error' => "Un erreur s'est produite en analysant davantage de résultats.",
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
	'echo-email-batch-category-header-edit-user-talk' => '$1 {{PLURAL:$1|message|messages}} de page de discussion',
	'echo-email-batch-category-header-edit-revert' => '$1 {{PLURAL:$1|modification annulée|modifications annulées}}',
	'echo-email-batch-category-header-cross-reference' => '$1 {{PLURAL:$1|référence croisée|références croisées}}',
	'echo-email-batch-category-header-other' => '$1 {{PLURAL:$1|Autre|Autres}}',
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
	'prefs-emailsubscriptions' => 'Notificádeme cando alguén',
	'prefs-emailfrequency' => 'Quere recibir notificacións por correo electrónico?',
	'echo-pref-email-edit-user-talk' => 'Deixe unha mensaxe na miña conversa',
	'echo-pref-email-article-linked' => 'Cree unha ligazón cara a unha páxina que eu creei',
	'echo-pref-email-reverted' => 'Reverta unha edición miña',
	'echo-pref-email-frequency-never' => 'Non me enviedes ningunha notificación por correo electrónico',
	'echo-pref-email-frequency-immediately' => 'Notificacións individuais en canto cheguen',
	'echo-pref-email-frequency-daily' => 'Un resumo diario das notificacións',
	'echo-pref-email-frequency-weekly' => 'Un resumo semanal das notificacións',
	'echo-pref-notify-hide-link' => 'Agochar a ligazón e a insignia das notificacións na miña barra de ferramentas',
	'echo-no-agent' => '[Ninguén]',
	'echo-no-title' => '[Ningunha páxina]',
	'echo-error-no-formatter' => 'Non se definiu formato ningún para a notificación',
	'notifications' => 'Notificacións',
	'tooltip-pt-notifications' => 'As súas notificacións',
	'echo-specialpage' => 'As miñas notificacións',
	'echo-anon' => 'Para recibir notificacións, [[Special:Userlogin/signup|cree unha conta]] ou [[Special:UserLogin|acceda ao sistema]].',
	'echo-none' => 'Non ten ningunha notificación.',
	'echo-more-info' => 'Máis información',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|deixou}} unha mensaxe na súa [[User talk:$2|páxina de conversa]].',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|deixou}} unha mensaxe na súa [[User talk:$2|páxina de conversa]].',
	'notification-article-linked2' => '[[User:$1|$1]] {{GENDER:$1|ligou}} {{PLURAL:$4|a páxina|as páxinas}} $3 desde estoutra páxina: [[$2]]',
	'notification-article-linked-flyout2' => '$1 {{GENDER:$1|ligou}} {{PLURAL:$4|a páxina|as páxinas}} $3 desde estoutra páxina: [[$2]]',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|comentou}} en "[[$3|$2]]" na páxina de conversa "$4"',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|comezou}} o fío de conversa "$2" en "[[$3]]"',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|envioulle}} unha mensaxe: "[[$3#$2|$2]]"',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|comentou}} en "[[$3#$2|$2]]" na páxina de conversa',
	'notification-new-user' => 'Dámoslle a benvida a {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Lembre asinar calquera comentario que deixe nas páxinas de conversa con 4 tiles (~~~~).',
	'notification-reverted2' => '[[User:$1|$1]] {{GENDER:$1|reverteu}} {{PLURAL:$4|a súa edición|as súas edicións}} en "[[$2]]" $3',
	'notification-reverted-flyout2' => '$1 {{GENDER:$1|reverteu}} {{PLURAL:$4|a súa edición|as súas edicións}} en "$2" $3',
	'notification-edit-talk-page-email-subject2' => 'Ten unha nova mensaxe na súa páxina de conversa',
	'notification-edit-talk-page-email-body2' => '{{GENDER:$1|O editor|A editora}} $1 deixou unha mensaxe na súa páxina de conversa:

$3

Ollar máis:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|deixou}} unha mensaxe na súa páxina de conversa',
	'notification-article-linked-email-subject2' => '{{PLURAL:$2|Unha páxina|Varias páxinas}} que comezou {{PLURAL:$2|ten|teñen}} agora algunha referencia cruzada en {{SITENAME}}',
	'notification-article-linked-email-body2' => '{{GENDER:$1|O editor|A editora}} $1 ligou {{PLURAL:$5|a páxina|as páxinas}} $4 desde estoutra páxina: $2

Ollar máis:

$3

$6',
	'notification-article-linked-email-batch-body2' => '$1 {{GENDER:$1|ligou}} {{PLURAL:$3|a páxina|as páxinas}} $2',
	'notification-reverted-email-subject2' => '$1 {{GENDER:$1|reverteu}} {{PLURAL:$3|a súa edición|as súas edicións}} en "$2"',
	'notification-reverted-email-body2' => '$1 {{GENDER:$1|reverteu}} {{PLURAL:$7|a súa edición|as súas edicións}} en "$2".

$5

Ollar máis:

$3

$6',
	'notification-reverted-email-batch-body2' => '$1 {{GENDER:$1|reverteu}} {{PLURAL:$3|a súa edición|as súas edicións}} en "$2"',
	'echo-email-subject-default' => 'Nova notificación en {{SITENAME}}',
	'echo-email-body-default' => 'Ten unha nova notificación en {{SITENAME}}:

$1',
	'echo-email-footer-default' => '$2

Para controlar os correos electrónicos que lle enviamos, visite:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nova notificación|novas notificacións}}',
	'echo-link' => 'Notificacións',
	'echo-overlay-link' => 'Todas as notificacións',
	'echo-overlay-title' => 'As miñas notificacións',
	'echo-overlay-title-overflow' => 'As miñas notificacións (mostrando $1 de $2 sen ler)',
	'echo-date-today' => 'Hoxe',
	'echo-date-yesterday' => 'Onte',
	'echo-load-more-error' => 'Houbo un erro ao procurar máis resultados.',
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
	'echo-email-batch-category-header-edit-user-talk' => '$1 {{PLURAL:$1|mensaxe|mensaxes}} na páxina de conversa',
	'echo-email-batch-category-header-edit-revert' => '$1 {{PLURAL:$1|reversión|reversións}}',
	'echo-email-batch-category-header-cross-reference' => '$1 {{PLURAL:$1|referencia cruzada|referencias cruzadas}}',
	'echo-email-batch-category-header-other' => '$1 {{PLURAL:$1|máis}}',
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
	'prefs-emailsubscriptions' => 'להודיע לי בדואר אלקטרוני כשמישהו',
	'prefs-emailfrequency' => 'באיזו תדירות ברצונך לקבל הודעות בדואר אלקטרוני?',
	'echo-pref-email-edit-user-talk' => 'שולח הודעה לדף השיחה שלי',
	'echo-pref-email-article-linked' => 'יצירת קישור לדף שיצרתי',
	'echo-pref-email-reverted' => 'משחזר עריכה שלי',
	'echo-pref-email-frequency-never' => 'לא לשלוח לי הודעות הדואר אלקטרוני',
	'echo-pref-email-frequency-immediately' => 'הודעות בודדות כשהן מגיעות',
	'echo-pref-email-frequency-daily' => 'סיכום יומי של הודעות',
	'echo-pref-email-frequency-weekly' => 'סיכום שבועי של הודעות',
	'echo-pref-notify-hide-link' => 'להסתיר את הקישור ואת התג להתראות בסרגל שלי',
	'echo-no-agent' => '[לא צוין]',
	'echo-no-title' => '[ללא דף]',
	'echo-error-no-formatter' => 'לא הוגדת עיצוב להודעות',
	'notifications' => 'הודעות',
	'tooltip-pt-notifications' => 'ההודעות שלך',
	'echo-specialpage' => 'ההודעות שלי',
	'echo-anon' => 'כדי לקבל הודעות, [[Special:Userlogin/signup|יש ליצור חשבון]] או [[Special:UserLogin|להיכנס]].',
	'echo-none' => 'אין לך הודעות',
	'echo-more-info' => 'מידע נוסף',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|כתב|כתבה}} ב[[User talk:$2|הדף השיחה]] שלך.',
	'notification-new-user' => 'ברוך בואך ל{{GRAMMAR:תחילית|{{SITENAME}}}}, $1!',
	'notification-new-user-content' => 'נא לזכור לחתום על כל דפי השיחה ב־4 טילדות (~~~~).',
	'notification-edit-talk-page-email-subject2' => 'יש לך הודעה חדשה בדף השיחה',
	'echo-email-subject-default' => 'הודעה חדשה באתר {{SITENAME}}',
	'echo-email-body-default' => 'יש לך הודעה חדשה באתר {{SITENAME}}:

$1',
	'echo-email-footer-default' => 'תודה!

צוות {{SITENAME}}

אפשר לשנות את העדפות הדוא"ל שלך בדף הבא:

{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1', # Fuzzy
	'echo-link-new' => '{{PLURAL:$1|הודעה אחת חדשה|$1 הודעות חדשות}}',
	'echo-link' => 'התראות',
	'echo-overlay-link' => 'כל ההודעות',
	'echo-overlay-title' => 'ההודעות שלי',
	'echo-date-today' => 'היום',
	'echo-date-yesterday' => 'אתמול',
	'echo-load-more-error' => 'אירעה שגיאה בעת אחזור תוצאות נוספות.',
	'echo-email-batch-subject-daily' => 'יש לך {{PLURAL:$2|הודעה אחת|$1 הודעה}} היום',
	'echo-email-batch-subject-weekly' => 'יש לך {{PLURAL:$2|הודעה אחת|$1 הודעה}} השבוע',
);

/** Hindi (हिन्दी)
 * @author Ansumang
 * @author Siddhartha Ghai
 */
$messages['hi'] = array(
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
	'echo-no-agent' => '[Nichtó]',
	'echo-no-title' => '[Žana strona]',
	'echo-error-no-formatter' => 'Za zdźělenje njeje so formatowanje definowało',
	'notifications' => 'Zdźělenki',
	'echo-specialpage' => 'Moje zdźělenki',
	'echo-anon' => 'Zo by zdźělenki dóstał, dyrbiš [[Special:Userlogin/signup|konto załožić]] abo [[Special:UserLogin|so přizjewić]].',
	'echo-none' => 'Nimaš zdźělenki.',
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
 */
$messages['hu'] = array(
	'echo-desc' => 'Értesítési rendszer',
	'prefs-echo' => 'Értesítések',
	'prefs-displaynotifications' => 'Megjelenítési beállítások',
	'prefs-emailsubscriptions' => 'Értesíts e-mailen, ha valaki',
	'prefs-emailfrequency' => 'Milyen gyakran kapok értesítést e-mailen',
	'echo-pref-email-edit-user-talk' => 'üzenet küld a vitalapomon',
	'echo-pref-email-reverted' => 'visszavonja a szerkesztésem',
	'echo-pref-email-frequency-never' => 'Egyáltalán ne küldjön e-mail értesítést',
	'echo-pref-email-frequency-immediately' => 'egyéni értesítést, ahogy az esemény  bekövetkezik',
	'echo-pref-email-frequency-daily' => 'értesítések napi összefoglalója',
	'echo-pref-email-frequency-weekly' => 'értesítések heti összefoglalója',
	'echo-no-agent' => '[Senki]',
	'echo-no-title' => '[Nincs lap]',
	'echo-error-no-formatter' => 'Nincs értesítési formatálás definiálva',
	'notifications' => 'Értesítések',
	'echo-specialpage' => 'Értesítéseim',
	'echo-anon' => 'Értesítések fogadásához [[Special:Userlogin/signup|hozz létre egy fiókot]] vagy [[Special:UserLogin|jelentkezzen be]].',
	'echo-none' => 'Nincsenek értesítések.',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|üzenetet küldött}} a [[User talk:$3|vitalapodon]].',
	'notification-add-comment' => '$2 {{GENDER:$1|megjegyzést küldött}} a "[[$4|$3]]" témában "$5" vitalapján',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|létrehozott}} egy új témát ("$3") a [[$4]] lapon',
	'notification-add-talkpage-topic-yours' => '$2 űj üzenetet {{GENDER:$1|küldött}}: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|hozzászólt}} a "[[$4#$3|$3]]" témához a vitalapodon',
	'notification-new-user' => 'Üdvözlet a {{SITENAME}} oldalon, $1!',
	'notification-edit-talk-page-email-subject' => 'Új vitalap üzeneted van',
	'notification-reverted-email-batch-body' => '$2 visszavonta $3 oldalon végzett szeresztésedet', # Fuzzy
	'echo-link-new' => '$1 új értesítés',
	'echo-link' => 'Értesítések',
	'echo-overlay-link' => 'Összes értesítés…', # Fuzzy
	'echo-overlay-title' => 'Értesítéseim',
	'echo-overlay-title-overflow' => 'Értesüléseim ($2 olvasatlanból $1 megjelenítve)',
	'echo-date-today' => 'Ma',
	'echo-date-yesterday' => 'Tegnap',
	'echo-load-more-error' => 'Hiba történt a további eredmények lekérdezése során.',
	'echo-email-batch-category-header-edit-user-talk' => '{{PLURAL:$1|Egy|$1}} vitalap üzenet',
	'echo-email-batch-category-header-edit-revert' => '{{PLURAL:$1|Egy|$1}} szerkesztés visszavonás',
	'echo-email-batch-category-header-other' => '{{PLURAL:$1|Egy|$1}} egyéb',
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
	'echo-none' => 'Tu non ha recipite notificationes recentemente.',
	'notification-edit' => '$2 {{GENDER:$1|modificava}} [[$3]] $4', # Fuzzy
	'notification-edit-talk-page' => '$2 {{GENDER:$1|modificava}} [[User talk:$3|tu pagina de discussion]]. $4',
	'notification-add-comment' => '$2 {{GENDER:$1|commentava}} "[[$4|$3]]" in le pagina de discussion "$5"',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|publicava}} un nove topico "$3" sur [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 te {{GENDER:$1|inviava}} un message: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|commentava}} "[[$4#$3|$3]]" in tu pagina de discussion',
	'notification-edit-email-subject' => 'Notification de {{SITENAME}} : $3 ha essite modificate per $2',
	'notification-edit-email-body' => 'Salute $5,
Isto es un notification pro informar te que $2 ha modificate le pagina $3 de {{SITENAME}}.

Tu pote vider le cambiamentos que $2 faceva per sequer iste ligamine:
<$4>

Tu ha recipite iste message perque tu te ha subscribite a actualisationes per e-mail pro cambiamentos de iste pagina.

Gratias pro usar {{SITENAME}}
Le systema de notification de {{SITENAME}}', # Fuzzy
	'notification-edit-talk-page-email-subject' => 'Tu pagina de discussion in {{SITENAME}} ha essite modificate per $2',
	'notification-edit-talk-page-email-body' => 'Salute $4,
Isto es un notification pro informar te que $2 ha modificate tu pagina de discussion in {{SITENAME}}.

In {{SITENAME}}, tu pagina de discussion es ubi altere usatores pote lassar te messages.

Tu pote vider le cambiamentos que $2 faceva per sequer iste ligamine:
<$3>

Gratias pro usar {{SITENAME}}
Le systema de notification de {{SITENAME}}', # Fuzzy
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
 * @author Raoli
 * @author Vituzzu
 */
$messages['it'] = array(
	'echo-desc' => 'Sistema per le notifiche',
	'prefs-echo' => 'Notifiche',
	'prefs-displaynotifications' => 'Opzioni di visualizzazione',
	'prefs-emailsubscriptions' => 'Notificami via e-mail quando qualcuno',
	'prefs-emailfrequency' => 'Quando si desidera ricevere le notifiche via e-mail?',
	'echo-pref-email-edit-user-talk' => 'Scrive sulla mia pagina di discussione',
	'echo-pref-email-article-linked' => 'Crea un collegamento ad una pagina che ho creato',
	'echo-pref-email-reverted' => 'Annulla una mia modifica',
	'echo-pref-email-frequency-never' => 'Non inviarmi alcuna notifica via e-mail',
	'echo-pref-email-frequency-immediately' => 'Notifiche individuali come arrivano',
	'echo-pref-email-frequency-daily' => 'Un riepilogo giornaliero delle notifiche',
	'echo-pref-email-frequency-weekly' => 'Un riepilogo settimanale delle notifiche',
	'echo-pref-notify-hide-link' => "Nascondi il link e l'icona di notifica nella mia barra degli strumenti",
	'echo-no-agent' => '[Nessuno]',
	'echo-no-title' => '[Nessuna pagina]',
	'echo-error-no-formatter' => 'Nessuna formattazione definita per le notifiche',
	'notifications' => 'Notifiche',
	'tooltip-pt-notifications' => 'Tutte le notifiche',
	'echo-specialpage' => 'Mie notifiche',
	'echo-anon' => "Per ricevere le notifiche, [[Special:Userlogin/signup|crea un account]] o [[Special:UserLogin|effettua l'accesso]].",
	'echo-none' => 'Non hai notifiche.',
	'echo-more-info' => 'Altre informazioni',
	'notification-new-user' => 'Benvenuto su {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Ricordati di firmare i commenti nelle pagine di discussione con quattro tildi (~~~~).',
	'echo-email-subject-default' => 'Nuova notifica su {{SITENAME}}',
	'echo-email-body-default' => 'Hai una nuova notifica su {{SITENAME}}:

$1',
	'echo-email-footer-default' => '$2

Per controllare quali email ti verranno inviate, visita:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nuova notifica|nuove notifiche}}',
	'echo-link' => 'notifiche',
	'echo-overlay-link' => 'Tutte le notifiche',
	'echo-overlay-title' => 'Mie notifiche',
	'echo-overlay-title-overflow' => 'Le mie notifiche (mostrate $1 di $2 non lette)',
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
	'echo-email-batch-category-header-edit-user-talk' => '$1 {{PLURAL:$1|messaggio|messaggi}} nella tua pagina di discussione',
	'echo-email-batch-category-header-edit-revert' => '$1 {{PLURAL:$1|modifica annullata|modifiche annullate}}',
	'echo-email-batch-category-header-other' => '$1 {{PLURAL:$1|altra|altre}}',
);

/** Japanese (日本語)
 * @author Shirayuki
 */
$messages['ja'] = array(
	'echo-desc' => '通知システム',
	'prefs-echo' => '通知',
	'prefs-displaynotifications' => '表示の設定',
	'prefs-emailsubscriptions' => '以下の場合に通知メールを受け取る',
	'prefs-emailfrequency' => 'メールで通知を受け取る頻度',
	'echo-pref-email-edit-user-talk' => '自分のトークページに誰かが投稿したとき',
	'echo-pref-email-article-linked' => '自分が作成したページへのリンクを誰かが作成したとき',
	'echo-pref-email-reverted' => '自分の編集を誰かが差し戻したとき',
	'echo-pref-email-frequency-never' => '通知メールを何も受け取らない',
	'echo-pref-notify-hide-link' => '通知のリンクとバッジをツールバーに表示しない',
	'echo-error-no-formatter' => '通知の書式が定義されていません',
	'notifications' => '通知',
	'tooltip-pt-notifications' => '自分の通知',
	'echo-specialpage' => '自分の通知',
	'echo-anon' => '通知を受け取るには、[[Special:Userlogin/signup|アカウント作成]]または[[Special:UserLogin|ログイン]]をしてください。',
	'echo-none' => '通知はありません。',
	'echo-more-info' => '詳細情報',
	'notification-edit-talk-page2' => '[[User:$1|$1]] があなたの[[User talk:$2|トークページ]]に{{GENDER:$1|投稿しました}}。',
	'notification-edit-talk-page-flyout2' => '$1 があなたの[[User talk:$2|トークページ]]に{{GENDER:$1|投稿しました}}。',
	'notification-article-linked2' => '$3 {{PLURAL:$4|が}} [[User:$1|$1]] によって{{GENDER:$1|リンクされました}}。リンク元ページ: [[$2]]',
	'notification-article-linked-flyout2' => '$3 {{PLURAL:$4|が}} $1 によって{{GENDER:$1|リンクされました}}。リンク元ページ: [[$2]]',
	'notification-add-comment2' => '[[User:$1|$1]] が「$4」のトークページの「[[$3|$2]]」に{{GENDER:$1|コメントしました}}',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] が [[$3]] に新しい話題「$2」を{{GENDER:$1|投稿しました}}',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] があなたにメッセージを{{GENDER:$1|送信しました}}:「[[$3#$2|$2]]」',
	'notification-add-comment-yours2' => '[[User:$1|$1]] があなたのトークページの「[[$3#$2|$2]]」に{{GENDER:$1|コメントしました}}',
	'notification-new-user' => '$1さん、{{SITENAME}}へようこそ!',
	'notification-new-user-content' => 'トークページヘのコメントには 4 つのチルダ (~~~~) を付けて署名してください。',
	'notification-reverted2' => '{{PLURAL:$4|[[$2]] でのあなたの編集}}を [[User:$1|$1]] が{{GENDER:$1|差し戻しました}} $3',
	'notification-reverted-flyout2' => '{{PLURAL:$4|$2 でのあなたの編集}}を $1 が{{GENDER:$1|差し戻しました}} $3',
	'notification-edit-talk-page-email-subject2' => 'トークページに新着メッセージがあります',
	'notification-edit-talk-page-email-body2' => '{{SITENAME}}の利用者 $1 があなたのトークページに{{GENDER:$1|投稿しました}}:

$3

詳細はこちら:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 があなたのトークページに{{GENDER:$1|投稿しました}}',
	'notification-article-linked-email-subject2' => 'あなたが作成した{{PLURAL:$2|ページ}}が{{SITENAME}}で相互参照{{PLURAL:$2|されました}}',
	'notification-article-linked-email-body2' => '$4 {{PLURAL:$5|が}}{{SITENAME}}の利用者 $1 によって{{GENDER:$1|リンクされました}}。リンク元ページ: $2

詳細情報:

$3

$6',
	'notification-article-linked-email-batch-body2' => '$2 {{PLURAL:$3|が}} $1 によって{{GENDER:$1|リンクされました}}',
	'notification-reverted-email-subject2' => '{{PLURAL:$3|$2 でのあなたの編集}}を $1 が{{GENDER:$1|差し戻しました}}',
	'notification-reverted-email-body2' => '{{PLURAL:$7|$2 でのあなたの編集}}を $1 が{{GENDER:$1|差し戻しました}}。

$5

詳細はこちら:

$3

$6',
	'notification-reverted-email-batch-body2' => '{{PLURAL:$3|$2 でのあなたの編集}}を $1 が{{GENDER:$1|差し戻しました}}',
	'echo-email-subject-default' => '{{SITENAME}}での新しい通知',
	'echo-email-body-default' => '{{SITENAME}}で新しい通知があります:

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|件の新しい通知}}',
	'echo-link' => '通知',
	'echo-overlay-link' => 'すべての通知',
	'echo-overlay-title' => '自分の通知',
	'echo-overlay-title-overflow' => '自分の通知 (未読 $2 件中 $1 件を表示中)',
	'echo-date-today' => '今日',
	'echo-date-yesterday' => '昨日',
	'echo-date-header' => '$1$2日',
	'echo-load-more-error' => '結果の続きを取得する際にエラーが発生しました。',
	'echo-email-batch-separator' => '________________________________________________',
	'echo-email-batch-category-header-edit-user-talk' => 'トークページヘのメッセージ $1 {{PLURAL:$1|件}}',
	'echo-email-batch-category-header-edit-revert' => '編集の差し戻し $1 {{PLURAL:$1|件}}',
	'echo-email-batch-category-header-cross-reference' => '相互参照 $1 {{PLURAL:$1|件}}',
	'echo-email-batch-category-header-other' => 'その他 $1 {{PLURAL:$1|件}}',
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
	'echo-none' => 'Sampéyan durung nampa wara-wara apa-apa.',
	'notification-edit' => '$2 {{GENDER:$1|nyunting}} [[$3]] $4', # Fuzzy
	'notification-edit-talk-page' => '$2 {{GENDER:$1|nyunting}} [[User talk:$3|kaca guneman Sampéyan]]. $4',
	'notification-add-comment' => '$2 {{GENDER:$1|nanggepi}} nèng "[[$4|$3]]" nèng kaca guneman "$5"',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|ngirim}} topik anyar "$3" nèng [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|ngirimi}} Sampéyan layang: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|nanggepi}} nèng "[[$4#$3|$3]]" nèng kaca guneman Sampéyan',
	'notification-edit-email-subject' => '{{SITENAME}} wara-wara: $3 disunting déning $2',
	'notification-edit-talk-page-email-subject' => 'Kaca guneman {{SITENAME}} Sampéyan wis diowah déning $2',
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
	'echo-no-agent' => '[არავინ]',
	'echo-no-title' => '[არ არის გვერდი]',
	'notifications' => 'შეტყობინებები',
	'echo-specialpage' => 'ჩემი შეტყობინებები',
	'notification-new-user' => 'კეთილი იყოს თქვენი მობრძანება საიტზე {{SITENAME}}, $1!',
	'echo-link' => 'შეტყობინებები',
	'echo-overlay-link' => 'შეტყობინება',
	'echo-overlay-title' => 'ჩემი შეტყობინებები',
);

/** Korean (한국어)
 * @author 아라
 */
$messages['ko'] = array(
	'echo-desc' => '알림 시스템',
	'prefs-echo' => '알림',
	'prefs-displaynotifications' => '보이기 설정',
	'prefs-emailsubscriptions' => '다른 사용자가 이메일을 통해 알림',
	'prefs-emailfrequency' => '언제 이메일 알림을 받겠습니까?',
	'echo-pref-email-edit-user-talk' => '내 토론 문서에 대한 게시물',
	'echo-pref-email-article-linked' => '내가 만든 문서에 링크를 만들었습니다',
	'echo-pref-email-reverted' => '내 편집을 되돌리기',
	'echo-pref-email-frequency-never' => '내게 어떠한 이메일 알림을 보내지 않기',
	'echo-pref-email-frequency-immediately' => '모두한테 오는 개별 알림',
	'echo-pref-email-frequency-daily' => '알림의 일별 요약',
	'echo-pref-email-frequency-weekly' => '알림의 주간 요약',
	'echo-pref-notify-hide-link' => '툴바에 알림에 대한 링크와 배지 숨기기',
	'echo-no-agent' => '[알 수 없는 사용자]',
	'echo-no-title' => '[문서 없음]',
	'echo-error-no-formatter' => '알림에 대해 정의한 형식이 없습니다',
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
	'notification-article-linked-email-subject2' => '{{SITENAME}}에서 작성한 {{PLURAL:$2|문서}}가 교차 참조{{PLURAL:$2|했습니다}}',
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
	'echo-email-batch-category-header-edit-user-talk' => '토론 문서 {{PLURAL:$1|메시지}} $1개',
	'echo-email-batch-category-header-edit-revert' => '편집 {{PLURAL:$1|되돌리기}} $1개',
	'echo-email-batch-category-header-cross-reference' => '{{PLURAL:$1|교차 참조}} $1개',
	'echo-email-batch-category-header-other' => '{{PLURAL:$1|다른}} $1개',
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
	'echo-pref-email-reverted' => 'Meng Ännerung zrécksetzen',
	'echo-pref-email-frequency-daily' => 'All Dag e Resumé vun den Notifikatiounen',
	'echo-pref-email-frequency-weekly' => 'All Woch e Resumé vun den Notifikatiounen',
	'echo-no-agent' => '[Keen]',
	'echo-no-title' => '[Keen Säit]',
	'notifications' => 'Notifikatiounen',
	'echo-specialpage' => 'Meng Notifikatiounen',
	'echo-anon' => 'Fir Notifikatiounen ze kréien, [[Special:Userlogin/signup|maacht e Benotzerkont op]] oder [[Special:UserLogin|loggt Iech an]]',
	'echo-none' => 'Dir hutt keng Notifikatiounen.',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|huet}} op Är [[User talk:$3|Diskussiounssäit]] geschriwwen.',
	'notification-new-user' => 'Wëllkomm op {{SITENAME}}, $1!',
	'notification-edit-talk-page-email-subject' => 'Dir hutt en neie Message op enger Diskussiounssäit',
	'notification-reverted-email-batch-body' => 'Är Ännerung op $3 gouf vum $2 zréckgesat', # Fuzzy
	'echo-email-subject-default' => 'Nei Notifikatioun op {{SITENAME}}',
	'echo-email-body-default' => 'Dir hutt eng nei Notifikatioun op {{SITENAME}}:

$1',
	'echo-link-new' => '$1 nei {{PLURAL:$1|Notifikatioun|Notifikatiounen}}',
	'echo-link' => 'Notifikatiounen',
	'echo-overlay-link' => 'All Notifikatiounen',
	'echo-overlay-title' => 'Meng Notifikatiounen',
	'echo-date-today' => 'Haut',
	'echo-date-yesterday' => 'Gëschter',
	'echo-email-batch-category-header-edit-user-talk' => 'Diskussiounssäit $1 {{PLURAL:$1|Message|Messagen}}',
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

/** Macedonian (македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'echo-desc' => 'Известителен систем',
	'prefs-echo' => 'Известувања',
	'prefs-displaynotifications' => 'Нагодувања на приказот',
	'prefs-emailsubscriptions' => 'Извешти ме на е-пошта кога некој ќе',
	'prefs-emailfrequency' => 'Кога би сакале да примате известувања на е-пошта?',
	'echo-pref-email-edit-user-talk' => 'Објави на мојата страница за разговор',
	'echo-pref-email-article-linked' => 'Става врска до страница што ја имам создадено',
	'echo-pref-email-reverted' => 'Врати мое уредување',
	'echo-pref-email-frequency-never' => 'Не ми праќај известувања на е-пошта',
	'echo-pref-email-frequency-immediately' => 'Поединечни известувања, едно по едно',
	'echo-pref-email-frequency-daily' => 'Дневен преглед на известувањата',
	'echo-pref-email-frequency-weekly' => 'Неделен преглед на известувањата',
	'echo-pref-notify-hide-link' => 'Скриј ја врската и значката за известувања во алатникот',
	'echo-no-agent' => '[Никој]',
	'echo-no-title' => '[Нема страница]',
	'echo-error-no-formatter' => 'Нема зададено форматирање за ова известување',
	'notifications' => 'Известувања',
	'tooltip-pt-notifications' => 'Вашите известувања',
	'echo-specialpage' => 'Мои известувања',
	'echo-anon' => 'За да добивате известувања, [[Special:Userlogin/signup|направете сметка]] или [[Special:UserLogin|најавете се]].',
	'echo-none' => 'Немате известувања.',
	'echo-more-info' => 'Повеќе информации',
	'notification-edit-talk-page2' => '[[User:$1|$1]] {{GENDER:$1|објави}} на вашата [[User talk:$2|страница за разговор]].',
	'notification-edit-talk-page-flyout2' => '$1 {{GENDER:$1|објави}} на вашата [[User talk:$2|страница за разговор]].',
	'notification-article-linked2' => '[[User:$1|$1]] {{PLURAL:$4|ја стави врската|ги стави врските}} $3 {{PLURAL:$4|што води|што водат}} {{GENDER:$1|од}} оваа страница: [[$2]]',
	'notification-article-linked-flyout2' => '$1 {{PLURAL:$4|ја стави врската|ги стави врските}} $3 {{PLURAL:$4|што води|што водат}} {{GENDER:$1|од}} оваа страница: [[$2]]',
	'notification-add-comment2' => '[[User:$1|$1]] {{GENDER:$1|коментираше}} на „[[$3|$2]]“ на страницата за разговор „$4“',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] {{GENDER:$1|ја објави}} новата тема „$2“ на [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] {{GENDER:$1|ви испрати}} порака: „[[$3#$2|$2]]“',
	'notification-add-comment-yours2' => '[[User:$1|$1]] {{GENDER:$1|коментираше}} на „[[$3#$2|$2]]“ на вашата страница за разговор',
	'notification-new-user' => 'Добредојдовте на {{SITENAME}}, $1!',
	'notification-new-user-content' => 'НЕ заборавајте да си ги потпишувате коментарите на страниците за разговор со 4 тилди (~~~~).',
	'notification-reverted2' => '[[User:$1|$1]] {{PLURAL:$4|го|ги}} {{GENDER:$1|врати}} {{PLURAL:$4|вашето уредување на [[$2]]|вашите уредувања на [[$2]]}} $3',
	'notification-reverted-flyout2' => '$1 {{PLURAL:$4|го|ги}} {{GENDER:$1|врати}} {{PLURAL:$4|вашето уредување на $2|вашите уредувања на $2}} $3',
	'notification-edit-talk-page-email-subject2' => 'Имате нова порака',
	'notification-edit-talk-page-email-body2' => 'Корисникот $1 на {{SITENAME}} {{GENDER:$1|објави}} на вашата страница за разговор:

$3

Погледајте повеќе:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 {{GENDER:$1|објави}} на вашата страница за разговор',
	'notification-article-linked-email-subject2' => 'На {{SITENAME}} {{PLURAL:$2|беше наведена|беа наведени}} {{PLURAL:$2|страница што вие ја започнавте|страници што вие ги започнавте}}.',
	'notification-article-linked-email-body2' => 'Корисникот $1 на {{SITENAME}} {{PLURAL:$5|ја стави врската $4 што води|ги стави врските $4 што водат}} {{GENDER:$1|од}} оваа страница: $2

Погледајте повеќе:

$3

$6',
	'notification-article-linked-email-batch-body2' => '$1 {{GENDER:$1|стави}} {{PLURAL:$3|врска|врски}} до $2',
	'notification-reverted-email-subject2' => '$1 {{PLURAL:$3|го|ги}} {{GENDER:$1|врати}} {{PLURAL:$3|вашето уредување на $2|вашите уредувања на $2}}',
	'notification-reverted-email-body2' => '$1 {{PLURAL:$7|го|ги}} {{GENDER:$1|врати}} {{PLURAL:$7|вашето уредување на $2|вашите уредувања на $2}}.

$5

Погледајте повеќе:

$3

$6',
	'notification-reverted-email-batch-body2' => '$1 {{PLURAL:$3|го|ги}} {{GENDER:$1|врати}} {{PLURAL:$3|вашето уредување на $2|вашите уредувања на $2}}',
	'echo-email-subject-default' => 'Ново известување на {{SITENAME}}',
	'echo-email-body-default' => 'Имате ново известување на {{SITENAME}}:

$1',
	'echo-email-footer-default' => '$2

Ако сакате да изберете какви пораки да добивате, појдете на страницата:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|ново известување|нови известувања}}',
	'echo-link' => 'Известувања',
	'echo-overlay-link' => 'Сите известувања',
	'echo-overlay-title' => 'Мои известувања',
	'echo-overlay-title-overflow' => 'Мои известувања (приказ на $1 од $2 непрочитани)',
	'echo-date-today' => 'Денес',
	'echo-date-yesterday' => 'Вчера',
	'echo-load-more-error' => 'Се појави грешка при обидот да добијам повеќе резултати.',
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
	'echo-email-batch-category-header-edit-user-talk' => '$1 {{PLURAL:$1|порака|пораки}} на страницата за разговор',
	'echo-email-batch-category-header-edit-revert' => '$1 {{PLURAL:$1|враќање|враќања}} на уреденото',
	'echo-email-batch-category-header-cross-reference' => '$1 {{PLURAL:$1|наведена врска|наведени врски}}',
	'echo-email-batch-category-header-other' => '$1 {{PLURAL:$1|останато|останати}}',
);

/** Malayalam (മലയാളം)
 * @author Praveenp
 */
$messages['ml'] = array(
	'echo-desc' => 'അറിയിപ്പ് വ്യവസ്ഥ',
	'prefs-echo' => 'അറിയിപ്പുകൾ',
	'echo-no-agent' => '[ആരുമില്ല]',
	'echo-no-title' => '[താൾ ഇല്ല]',
	'echo-error-no-formatter' => 'അറിയിപ്പിനായി യാതൊരു രൂപവും നിർവ്വചിച്ചിട്ടില്ല',
	'notifications' => 'അറിയിപ്പുകൾ',
	'echo-specialpage' => 'എനിക്കുള്ള അറിയിപ്പുകൾ',
	'echo-anon' => 'അറിയിപ്പുകൾ ലഭിക്കാനായി, [[Special:Userlogin/signup|അംഗത്വമെടുക്കയോ]] [[Special:UserLogin|പ്രവേശിക്കുകയോ]] ചെയ്യേണ്ടതാണ്.',
	'echo-none' => 'താങ്കൾക്ക് മുമ്പ് അറിയിപ്പുകളൊന്നും ലഭിച്ചിരുന്നില്ല.', # Fuzzy
	'notification-new-user' => '{{SITENAME}} സംരംഭത്തിലേയ്ക്ക് സ്വാഗതം, $1!',
	'notification-new-user-content' => 'സംവാദം താളുകളിലെ ഏതൊരു കുറിപ്പിനും 4 റ്റിൽഡേകൾ (~~~~) ഉപയോഗിച്ച് ഒപ്പിടാൻ ഓർക്കുമല്ലോ.',
	'echo-email-subject-default' => '{{SITENAME}} സംരംഭത്തിൽ അറിയിപ്പുണ്ട്',
	'echo-email-body-default' => '{{SITENAME}} സംരംഭത്തിൽ താങ്കൾക്ക് ഒരു അറിയിപ്പുണ്ട്:

$1',
	'echo-link-new' => 'പുതിയ {{PLURAL:$1|അറിയിപ്പ്|$1 അറിയിപ്പുകൾ}}',
	'echo-link' => 'എനിക്കുള്ള അറിയിപ്പുകൾ', # Fuzzy
	'echo-overlay-link' => 'എല്ലാ അറിയിപ്പുകളും...', # Fuzzy
	'echo-overlay-title' => 'എനിക്കുള്ള അറിയിപ്പുകൾ',
);

/** Malay (Bahasa Melayu)
 * @author Anakmalaysia
 */
$messages['ms'] = array(
	'echo-desc' => 'Sistem pemberitahuan',
	'prefs-echo' => 'Pemberitahuan',
	'prefs-displaynotifications' => 'Pilihan paparan',
	'prefs-emailsubscriptions' => 'Beritahu saya melalui e-mel apabila seseorang',
	'prefs-emailfrequency' => 'Berapa kerap saya menerima pemberitahuan melalui e-mel', # Fuzzy
	'echo-pref-email-edit-user-talk' => 'Mengepos di halaman perbualan saya',
	'echo-pref-email-article-linked' => 'Mewujudkan pautan kepada halaman yang saya cipta',
	'echo-pref-email-reverted' => 'Membalikkan suntingan saya',
	'echo-pref-email-frequency-never' => 'Jangan hantar sebarang pemberitahuan e-mel kepada saya',
	'echo-pref-email-frequency-immediately' => 'Pemberitahuan satu persatu',
	'echo-pref-email-frequency-daily' => 'Ringkasan pemberitahuan harian',
	'echo-pref-email-frequency-weekly' => 'Ringkasan pemberitahuan mingguan',
	'echo-pref-notify-hide-link' => 'Sorokkan pautan dan lencana untuk pemberitahuan di dalam palang alatan saya',
	'echo-no-agent' => '[Tiada Sesiapa]',
	'echo-no-title' => '[Tiada halaman]',
	'echo-error-no-formatter' => 'Tiada pemformatan yang ditetapkan untuk pemberitahuan',
	'notifications' => 'Pemberitahuan',
	'tooltip-pt-notifications' => 'Pemberitahuan anda',
	'echo-specialpage' => 'Pemberitahuan saya',
	'echo-anon' => 'Untuk menerima pemberitahuan, sila [[Special:Userlogin/signup|buka akaun]] atau [[Special:UserLogin|log masuk]].',
	'echo-none' => 'Tiada pemberitahuan untuk anda.',
	'notification-new-user' => 'Selamat datang ke {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Jangan lupa untuk menandatangani sebarang komen pada halaman perbincangan dengan serentet 4 tanda tilde (~~~~).',
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
	'echo-overlay-title' => 'Pemberitahuan saya',
	'echo-overlay-title-overflow' => 'Pemberitahuan untuk saya (memaparkan $1 daripada $2 pesanan belum dibaca)',
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
	'echo-email-batch-category-header-edit-user-talk' => '$1 pesanan di halaman perbualan',
	'echo-email-batch-category-header-edit-revert' => '$1 suntingan dibalikkan',
	'echo-email-batch-category-header-cross-reference' => '$1 rujukan silang',
	'echo-email-batch-category-header-other' => '$1 yang lain',
);

/** Maltese (Malti)
 * @author Chrisportelli
 */
$messages['mt'] = array(
	'echo-desc' => 'Sistema għan-notifiki',
	'prefs-echo' => 'Notifiki',
	'prefs-emailfrequency' => 'Kemm huma spissi n-notifiki li nirċievi',
	'echo-no-agent' => '[Ħadd]',
	'echo-no-title' => '[L-ebda paġna]',
	'notifications' => 'Notifiki',
	'echo-specialpage' => 'Notifiki tiegħi',
	'echo-anon' => 'Sabiex tirċievi notifiki, [[Special:Userlogin/signup|oħloq kont]] jew [[Special:UserLogin|illoggja]].',
	'echo-none' => "M'għandek l-ebda notifiki",
	'notification-edit' => '$2 {{GENDER:$1|immodifika|immodifikat}} [[$3]] $4', # Fuzzy
	'notification-edit-talk-page' => "$2 {{GENDER:$1|immodifika|immodifikat}} il-[[User talk:$3|paġna ta' diskussjoni tiegħek]]. $4", # Fuzzy
	'notification-add-comment' => '$2 {{GENDER:$1|ikkummenta|ikkummentat}} fuq "[[$4|$3]]" fil-paġna ta\' diskussjoni ta\' "$5"',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|daħħal|daħħlet}} suġġett ġdid "$3" fuq [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|bagħtlek|bagħtitlek}} messaġġ: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|ikkummenta|ikkummentat}} fuq "[[$4#$3|$3]]" fil-paġna ta\' diskussjoni tiegħek',
	'notification-new-user' => 'Merħba fuq {{SITENAME}}, $1!',
	'notification-reverted' => 'Il-{{PLURAL:$5|modifika|modifiki}} tiegħek fuq [[$3]] {{PLURAL:$5|ġiet|ġew}} {{GENDER:$1|imħassra}} minn $2 $4',
	'notification-edit-email-subject' => "Notifika ta' {{SITENAME}}: $3 ġiet modifikata minn $2",
	'notification-edit-email-body' => "Insellimlek $1,
Din hija notifika sabiex ngħarrfuk li $2 {{GENDER:$2|immodifika}} l-paġna $3 fuq {{SITENAME}}.

$2 ikkummenta l-modifiki {{GENDER:$2|tiegħu}} b'din it-taqsira: $6

Tista' tara l-bidla li $2 {{GENDER:$2|għamel}} billi ssegwi din il-ħolqa:
<$4>

Inti qiegħed tirċievi dan il-messaġġ minħabba li abbonajt għall-aġġornamenti permezz tal-posta elettronika għat-tibdil li jsir fuq din il-paġna.

$7", # Fuzzy
	'notification-edit-talk-page-email-subject' => "Għandek messaġġ ġdid fil-paġna ta' diskussjoni",
	'notification-edit-talk-page-email-body' => "Insellimlek $4,
Din hija notifika sabiex ngħarrfuk li $2 immodifika l-paġna ta' diskussjoni tiegħek fuq {{SITENAME}}.

Fuq {{SITENAME}}, il-paġna ta' diskussjoni huwa dak il-post fejn utenti oħra jistgħu jħallulek messaġġi.

Tista' tara t-tibdil li $2 għamel billi ssegwi din il-ħolqa:
<$3>

Grazzi talli qiegħed tuża {{SITENAME}}
Is-sistema ta' notifika ta' {{SITENAME}}", # Fuzzy
	'echo-email-subject-default' => 'Notifika ġdida fuq {{SITENAME}}',
	'echo-email-body-default' => 'Għandek notifika ġdida fuq {{SITENAME}}:

$1',
	'echo-link-new' => '{{PLURAL:$1|notifika ġdida|$1 notifiki ġodda}}',
	'echo-link' => 'Notifiki tiegħi', # Fuzzy
	'echo-overlay-link' => 'Notifiki kollha…', # Fuzzy
	'echo-overlay-title' => 'Notifiki tiegħi',
);

/** Dutch (Nederlands)
 * @author Kippenvlees1
 * @author Rcdeboer
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'echo-desc' => 'Meldingensysteem',
	'prefs-echo' => 'Meldingen',
	'prefs-displaynotifications' => 'Weergaveopties',
	'prefs-emailsubscriptions' => 'Stuur mij een e-mail als iemand',
	'prefs-emailfrequency' => 'Wanneer wilt u melding via e-mail ontvangen?',
	'echo-pref-email-edit-user-talk' => 'Een bericht op mijn overlegpagina plaatst',
	'echo-pref-email-article-linked' => 'Koppeling maakt naar een pagina die ik heb aangemaakt',
	'echo-pref-email-reverted' => 'Een bewerking van mij terugdraait',
	'echo-pref-email-frequency-never' => 'Stuur mij geen meldingen via e-mail',
	'echo-pref-email-frequency-immediately' => 'Individuele meldingen als ze binnenkomen',
	'echo-pref-email-frequency-daily' => 'Een dagelijkse samenvatting van meldingen',
	'echo-pref-email-frequency-weekly' => 'Een wekelijkse samenvatting van meldingen',
	'echo-pref-notify-hide-link' => 'Verberg de koppeling en badge voor meldingen in mijn werkbalk',
	'echo-no-agent' => '[Niemand]',
	'echo-no-title' => '[Geen pagina]',
	'echo-error-no-formatter' => 'Er is geen opmaak ingesteld voor de melding',
	'notifications' => 'Meldingen',
	'tooltip-pt-notifications' => 'Uw meldingen',
	'echo-specialpage' => 'Mijn meldingen',
	'echo-anon' => '[[Special:Userlogin/signup|Maak een gebruiker aan]] of [[Special:UserLogin|meld u aan]] als u meldingen wilt ontvangen.',
	'echo-none' => 'U hebt geen meldingen.',
	'notification-new-user' => 'Welkom op {{SITENAME}}, $1!',
	'notification-new-user-content' => "Vergeet niet om opmerkingen over overlegpagina's te ondertekenen met 4 tildes (~~~~).",
	'echo-email-subject-default' => 'Nieuwe melding op {{SITENAME}}',
	'echo-email-body-default' => 'U hebt een nieuwe melding op {{SITENAME}}:

$1',
	'echo-email-footer-default' => '$2

Volg de volgende koppeling om uw e-mailvoorkeuren te wijzigen of om u uit te schrijven:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '{{PLURAL:$1|1 nieuwe melding|$1 nieuwe meldingen}}',
	'echo-link' => 'Meldingen',
	'echo-overlay-link' => 'Alle meldingen',
	'echo-overlay-title' => 'Mijn meldingen',
	'echo-overlay-title-overflow' => 'Meldingen ($1 van $2 ongelezen)',
	'echo-date-today' => 'Vandaag',
	'echo-date-yesterday' => 'Gisteren',
	'echo-load-more-error' => 'Er is een fout opgetreden tijdens het ophalen van meer resultaten.',
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
	'echo-email-batch-category-header-edit-user-talk' => '{{PLURAL:$1|één bericht op uw overlegpagina|$1 berichten op uw overlegpagina}}',
	'echo-email-batch-category-header-edit-revert' => '{{PLURAL:$1|één teruggedraaide bewerking|$1  teruggedraaide bewerkingen}}',
	'echo-email-batch-category-header-other' => '{{PLURAL:$1|één andere|$1 anderen}}',
);

/** Nederlands (informeel)‎ (Nederlands (informeel)‎)
 * @author Siebrand
 */
$messages['nl-informal'] = array(
	'tooltip-pt-notifications' => 'Jouw meldingen',
	'echo-none' => 'Je hebt geen meldingen.',
	'notification-edit-talk-page' => '$2 heeft een bericht {{GENDER:$1|achtergelaten}} op je [[User talk:$3|overlegpagina]].',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|heeft}} je een bericht gezonden: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|heeft}} gereageerd op "[[$4#$3|$3]]" op je overlegpagina',
	'notification-reverted' => 'Je {{PLURAL:$5|bewerking|bewerkingen}} aan [[$3]] {{PLURAL:$5|is|zijn}} {{GENDER:$1|teruggedraaid}} door $2 $4', # Fuzzy
	'notification-edit-talk-page-email-subject' => 'Je hebt een nieuw bericht op je overlegpagina',
	'notification-edit-talk-page-email-body' => '$2 heeft een bericht {{GENDER:$2|achtergelaten}} op je overlegpagina op {{SITENAME}}

$4

Meer lezen:

$3

$5',
	'notification-edit-talk-page-email-batch-body' => '$2 {{GENDER:$2|heeft}} een bericht achtergelaten op je overlegpagina',
	'notification-reverted-email-subject' => 'Je bewerking{{PLURAL:$4| aan $3 is|en aan $3 zijn}} {{GENDER:$2|teruggedraaid}} door $2',
	'notification-reverted-email-body' => 'Je bewerking{{PLURAL:$8| aan $3 is|en aan $3 zijn}} {{GENDER:$2|teruggedraaid}} door $2.

$6

Meer lezen:

$4

$7',
	'notification-reverted-email-batch-body' => 'Je bewerking{{PLURAL:$4| aan $3 is|en aan $3 zijn}} {{GENDER:$2|teruggedraaid}} door $2',
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
 * @author Matma Rex
 * @author Odie2
 * @author Przemub
 * @author Woytecr
 */
$messages['pl'] = array(
	'echo-desc' => 'System powiadomień',
	'prefs-echo' => 'Powiadomienia',
	'prefs-displaynotifications' => 'Opcje wyświetlania',
	'prefs-emailsubscriptions' => 'Powiadom mnie przez e-mail, gdy ktoś',
	'prefs-emailfrequency' => 'W jakiej formie chcę otrzymywać powiadomienia e-mailem', # Fuzzy
	'echo-pref-email-edit-user-talk' => 'napisze na mojej stronie dyskusji',
	'echo-pref-email-article-linked' => 'Utworzy link do strony, którą utworzyłem',
	'echo-pref-email-reverted' => 'wycofa moją edycję',
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
	'echo-specialpage' => 'Moje powiadomienia',
	'echo-anon' => 'Aby otrzymywać powiadomienia [[Special:Userlogin/signup|utwórz konto]] lub [[Special:UserLogin|zaloguj się]].',
	'echo-none' => 'Nie masz żadnych powiadomień.',
	'notification-new-user' => 'Witaj na stronach {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Nie zapomnij podpisywać komentarzy na stronach dyskusji czterema tyldami (~~~~).',
	'echo-notification-count' => '$1+',
	'echo-email-subject-default' => 'Nowe powiadomienie na {{SITENAME}}',
	'echo-email-body-default' => 'Masz nowe powiadomienie na {{SITENAME}}:

$1',
	'echo-email-footer-default' => '$2

Aby ustalić jakie wiadomości mamy CI przesyłać, odwiedź:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nowe powiadomienie|nowe powiadomienia|nowych powiadomień}}',
	'echo-link' => 'Moje powiadomienia', # Fuzzy
	'echo-overlay-link' => 'Wszystkie powiadomienia',
	'echo-overlay-title' => 'Moje powiadomienia',
	'echo-overlay-title-overflow' => 'Moje powiadomienia (wyświetlono $1 z $2 nieprzeczytanych)',
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
	'echo-email-batch-category-header-edit-user-talk' => '$1 {{PLURAL:$1|wiadomość|wiadomości}} na stronie dyskusji',
	'echo-email-batch-category-header-edit-revert' => '$1 {{PLURAL:$1|wycofanie|wycofania|wycofań}} edycji',
	'echo-email-batch-category-header-other' => '$1 {{PLURAL:$1|inne|inne|innych}}',
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
	'notification-article-linked-email-subject2' => "{{PLURAL:$2|Na pagina|Dle pagine}} ch'it l'has ancaminà {{PLURAL:$2|a l'é stàita|a son stàite}} referensià crosià dzor {{SITENAME}}",
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
	'notification-add-talkpage-topic-yours' => '$2 تاسې ته يو پيغام {{GENDER:$1|لېږلی}}: "[[$4#$3|$3]]"',
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
	'notification-edit-talk-page' => '$2 {{GENDER:$1|a publicat}} pe [[User talk:$3|pagina dumneavoastră de discuții]].',
	'notification-add-comment' => '$2 {{GENDER:$1|a comentat}} subiectul „[[$4|$3]]” pe pagina de discuții „$5”',
	'notification-new-user' => 'Bine ați venit pe {{SITENAME}}, $1!',
	'notification-edit-talk-page-email-subject' => 'Aveți un mesaj nou pe pagina de discuții',
	'notification-edit-talk-page-email-batch-body' => '$2 {{GENDER:$2|a postat}} pe pagina dumneavoastră de discuții',
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
	'echo-no-agent' => '[Nisciune]',
	'echo-no-title' => '[Nisciuna vôsce]',
	'notifications' => 'Notificaziune',
	'echo-specialpage' => 'Notificaziune mie',
	'notification-edit' => '$2 {{GENDER:$1|cangiate}} [[$3]] $4: "$5"',
	'notification-edit-talk-page-email-subject' => "Tu è 'nu messàgge nuève sus 'a pàgene de le 'ngazzaminde",
	'echo-email-body-default' => "Tu è 'na notifica nove sus a {{SITENAME}}:

$1",
	'echo-link' => 'Notificaziune',
	'echo-overlay-link' => 'Tutte le notificaziune',
	'echo-email-batch-category-header-edit-revert' => "$1 Cange l'{{PLURAL:$1|annullamende|annullaminde}}",
	'echo-email-batch-category-header-other' => '$1 {{PLURAL:$1|Otre}}',
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
	'prefs-emailfrequency' => 'Желаемая частота получения уведомлений по электронной почте', # Fuzzy
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
	'notification-edit-talk-page-email-subject' => 'ඔබ හට නව කතාබහ පිටු පණිවුඩයක් ඇත',
	'notification-edit-talk-page-email-body' => '{{SITENAME}} පරිශීලක $2 ඔබේ කතාබහ පිටුවේ {{GENDER:$2|හසුනක් දමා ඇත}}:

$4

තවත් නරඹන්න:

$3

$5',
	'notification-edit-talk-page-email-batch-body' => '$2 ඔබේ කතාබහ පිටුවේ {{GENDER:$2|හසුනක් දමා ඇත}}',
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
	'notification-edit-talk-page' => '$2 {{GENDER:$1|је изменио|је изменила|је изменио}} [[User talk:$3|вашу страницу за разговор]]. $4', # Fuzzy
	'notification-add-comment' => '$2 {{GENDER:$1|је прокоментарисао|је прокоментарисала|је прокоментарисао}} „[[$4|$3]]“ на страници за разговор „$5“',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|је поставио|је поставила|је поставио}} нову тему „$3“ на [[$4]]',
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
	'echo-none' => 'U poslednje vreme niste primili nijedno obaveštenje.',
	'notification-edit' => '$2 {{GENDER:$1|je izmenio|je izmenila|je izmenio}} [[$3]] $4', # Fuzzy
	'notification-edit-talk-page' => '$2 {{GENDER:$1|je izmenio|je izmenila|je izmenio}} [[User talk:$3|vašu stranicu za razgovor]]. $4',
	'notification-add-comment' => '$2 {{GENDER:$1|je prokomentarisao|je prokomentarisala|je prokomentarisao}} „[[$4|$3]]“ na stranici za razgovor „$5“',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|je postavio|je postavila|je postavio}} novu temu „$3“ na [[$4]]',
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
	'prefs-emailsubscriptions' => 'Meddela mig via e-post när någon',
	'prefs-emailfrequency' => 'Hur ofta jag får aviseringar via e-post', # Fuzzy
	'echo-pref-email-edit-user-talk' => 'Inlägg på min diskussionssida',
	'echo-pref-email-reverted' => 'Återställer min redigering',
	'echo-pref-email-frequency-never' => 'Skicka mig inte några aviseringar via e-postmeddelanden',
	'echo-pref-email-frequency-immediately' => 'Enskilda meddelanden när de kommer',
	'echo-pref-email-frequency-daily' => 'En daglig sammanfattning av aviseringar',
	'echo-pref-email-frequency-weekly' => 'En veckosammanfattning av aviseringar',
	'echo-no-agent' => '[Ingen]',
	'echo-no-title' => '[Ingen sida]',
	'echo-error-no-formatter' => 'Ingen formatering definierad för notifikation',
	'notifications' => 'Meddelanden',
	'echo-specialpage' => 'Mina meddelanden',
	'echo-anon' => 'För att ta emot meddelanden, [[Special:Userlogin/signup|skapa ett konto]] eller [[Special:UserLogin|logga in]].',
	'echo-none' => 'Du har inga meddelanden.',
	'notification-new-user' => 'Välkommen till {{SITENAME}},  $1!',
	'notification-new-user-content' => 'Kom ihåg att underteckna kommentarer på diskussionssidor med 4 tilde (~~~~).',
	'echo-email-subject-default' => 'Nytt meddelande på {{SITENAME}}',
	'echo-email-body-default' => 'Du har ett nytt meddelande på {{SITENAME}}:

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nytt meddelande|nya meddelanden}}',
	'echo-link' => 'Meddelanden',
	'echo-overlay-link' => 'Alla meddelanden',
	'echo-overlay-title' => 'Mina meddelanden',
	'echo-overlay-title-overflow' => 'Mina meddelanden (visar $1 av $2 olästa)',
	'echo-date-today' => 'Idag',
	'echo-date-yesterday' => 'Igår',
	'echo-load-more-error' => 'Ett fel uppstod när fler resultat skulle hämtas.',
	'echo-email-batch-subject-daily' => 'Du har $1 {{PLURAL:$2|meddelande|meddelanden}} idag',
	'echo-email-batch-subject-weekly' => 'Du har $1 {{PLURAL:$2|meddelande|meddelanden}} denna vecka',
	'echo-email-batch-category-header-edit-user-talk' => '$1 {{PLURAL:$1|meddelande|meddelanden}} på diskussionssidan',
	'echo-email-batch-category-header-edit-revert' => '$1 {{PLURAL:$1|redigeringsåterställning|redigeringsåterställningar}}',
	'echo-email-batch-category-header-other' => '$1 {{PLURAL:$1|annan|andra}}',
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
	'notification-edit' => '$2 {{GENDER:$1|தொகுத்துள்ளார்}} [[$3]] $4: "$5"',
	'notification-edit-email-body' => 'வணக்கம் $5,

$2 என்ற பயனரால் {{SITENAME}} பக்கம் $3 மாற்றப்பட்டது.

இந்த இணைப்பின் மூலம் நீங்கள் ஏற்படுத்தப்பட்ட மாற்றங்களைக் காணலாம்:
<$4>

பக்க மாற்றல் மின்னஞ்சல் அறிவிப்புகளுக்கு நீங்கள் விருப்பம் தெரிவித்ததால் இச் செய்தியை நீங்கள் பெறுகிறீர்கள்.

{{SITENAME}} ஐப் பயன்படுத்துவதற்கு நன்றி!
{{SITENAME}} அறிவித்தல் அமைப்பு', # Fuzzy
	'notification-edit-talk-page-email-subject' => 'உங்கள் {{SITENAME}} பேச்சுப் பக்கம் $2 என்ற பயனரால் தொகுக்கப்பட்டுள்ளது.', # Fuzzy
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
	'echo-link' => 'میری اطلاعات',
	'echo-overlay-link' => 'سب اطلاعات...',
	'echo-overlay-title' => 'میری اطلاعات',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'echo-desc' => 'Hệ thống thông báo',
	'prefs-echo' => 'Thông báo',
	'prefs-displaynotifications' => 'Tùy chọn hiển thị',
	'prefs-emailsubscriptions' => 'Báo cho tôi qua thư điện tử khi ai đó',
	'prefs-emailfrequency' => 'Khi nào bạn muốn nhận thông báo qua thư điện tử?',
	'echo-pref-email-edit-user-talk' => 'Nhắn tin vào trang thảo luận của tôi',
	'echo-pref-email-article-linked' => 'Đặt liên kết đến một trang do tôi tạo ra',
	'echo-pref-email-reverted' => 'Lùi sửa đổi của tôi',
	'echo-pref-email-frequency-never' => 'Không gửi cho tôi bất kỳ thông báo qua thư điện tử',
	'echo-pref-email-frequency-immediately' => 'Gửi các thông báo từng cái một vào đúng lúc xảy ra',
	'echo-pref-email-frequency-daily' => 'Tóm lược các thông báo hàng ngày',
	'echo-pref-email-frequency-weekly' => 'Tóm lược các thông báo hàng tuần',
	'echo-pref-notify-hide-link' => 'Ẩn liên kết và dấu hiệu thông báo khỏi thanh công cụ',
	'echo-no-agent' => '[Không ai]',
	'echo-no-title' => '[Không có trang]',
	'echo-error-no-formatter' => 'Thông báo không có định rõ định dạng',
	'notifications' => 'Thông báo',
	'tooltip-pt-notifications' => 'Các thông báo cho bạn',
	'echo-specialpage' => 'Thông báo cho tôi',
	'echo-anon' => 'Để nhận thông báo, hãy [[Special:Userlogin/signup|mở tài khoản]] hoặc [[Special:UserLogin|đăng nhập]].',
	'echo-none' => 'Bạn không có thông báo.',
	'echo-more-info' => 'Thêm thông tin',
	'notification-edit-talk-page2' => '[[User:$1|$1]] đã nhắn tin vào [[User talk:$2|trang thảo luận]] của bạn.',
	'notification-edit-talk-page-flyout2' => '$1 đã nhắn tin vào [[User talk:$2|trang thảo luận]] của bạn.',
	'notification-article-linked2' => '[[User:$1|$1]] đã đặt {{PLURAL:$4|liên kết|các liên kết}} đến $3 từ trang này: [[$2]]',
	'notification-article-linked-flyout2' => '$1 đã đặt {{PLURAL:$4|liên kết|các liên kết}} đến $3 từ trang này: [[$2]]',
	'notification-add-comment2' => '[[User:$1|$1]] đã bình luận về “[[$3|$2]]” tại trang thảo luận “$4”',
	'notification-add-talkpage-topic2' => '[[User:$1|$1]] đã bắt đầu cuộc thảo luận mới về “$2” tại [[$3]]',
	'notification-add-talkpage-topic-yours2' => '[[User:$1|$1]] đã nhắn tin cho bạn: “[[$3#$2|$2]]”',
	'notification-add-comment-yours2' => '[[User:$1|$1]] đã bình luận về “[[$3#$2|$2]]” tại trang thảo luận của bạn',
	'notification-new-user' => 'Chào mừng $1 đã đến với {{SITENAME}}!',
	'notification-new-user-content' => 'Hãy nhớ ký tên vào các lời bình luận tại trang thảo luận bằng 4 dấu ngã (~~~~).',
	'notification-reverted2' => '[[User:$1|$1]] đã lùi lại {{PLURAL:$4|sửa đổi|các sửa đổi}} của bạn tại [[$2]] $3',
	'notification-reverted-flyout2' => '$1 đã lùi lại {{PLURAL:$4|sửa đổi|các sửa đổi}} của bạn tại $2 $3',
	'notification-edit-talk-page-email-subject2' => 'Trang thảo luận của bạn có tin nhắn mới',
	'notification-edit-talk-page-email-body2' => 'Người dùng $1 tại {{SITENAME}} đã nhắn tin vào trang thảo luận của bạn:

$3

Xem thêm:

$2

$4',
	'notification-edit-talk-page-email-batch-body2' => '$1 đã nhắn tin vào trang thảo luận của bạn',
	'notification-article-linked-email-subject2' => '{{PLURAL:$2|Một|Một số}} tham khảo chéo đến trang do bạn bắt đầu đã được bổ sung tại {{SITENAME}}',
	'notification-article-linked-email-body2' => 'Người dùng $1 tại {{SITENAME}} đã đặt {{PLURAL:$5|liên kết|các liên kết}} đến $4 từ trang này: $2

Xem thêm:

$3

$6',
	'notification-article-linked-email-batch-body2' => '$1 đã đặt {{PLURAL:$3|liên kết|các liên kết}} đến $2',
	'notification-reverted-email-subject2' => '$1 đã lùi lại {{PLURAL:$3|sửa đổi|các sửa đổi}} của bạn tại $2',
	'notification-reverted-email-body2' => '$1 đã lùi lại {{PLURAL:$7|sửa đổi|các sửa đổi}} của bạn tại $2.

$5

Xem thêm:

$3

$6',
	'notification-reverted-email-batch-body2' => '$1 đã lùi lại {{PLURAL:$3|sửa đổi|các sửa đổi}} của bạn tại $2',
	'echo-email-subject-default' => 'Thông báo mới tại {{SITENAME}}',
	'echo-email-body-default' => 'Bạn có thông báo mới tại {{SITENAME}}:

$1',
	'echo-email-footer-default' => '$2

Để cấu hình hoặc tắt các thông báo qua thư điện tử, hãy ghé vào:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1',
	'echo-link-new' => '$1 thông báo mới',
	'echo-link' => 'Thông báo',
	'echo-overlay-link' => 'Tất cả các thông báo',
	'echo-overlay-title' => 'Thông báo cho tôi',
	'echo-overlay-title-overflow' => 'Tin nhắn cho tôi (đang xem $1 trên $2 chưa đọc)',
	'echo-date-today' => 'Hôm nay',
	'echo-date-yesterday' => 'Hôm qua',
	'echo-load-more-error' => 'Lỗi đã xảy ra khi lấy thêm kết quả.',
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
	'echo-email-batch-category-header-edit-user-talk' => '$1 tin nhắn',
	'echo-email-batch-category-header-edit-revert' => '$1 sửa đổi bị lùi lại',
	'echo-email-batch-category-header-cross-reference' => '$1 tham khảo chéo',
	'echo-email-batch-category-header-other' => '$1 khác',
);

/** Simplified Chinese (中文（简体）‎)
 * @author Anakmalaysia
 * @author Dimension
 * @author Liangent
 * @author Shirayuki
 */
$messages['zh-hans'] = array(
	'echo-desc' => '通知系统',
	'prefs-echo' => '通知',
	'prefs-displaynotifications' => '显示选项',
	'prefs-emailsubscriptions' => '在以下情况使用电子邮件通知我',
	'prefs-emailfrequency' => '我通过电子邮件接收通知的频率', # Fuzzy
	'echo-pref-email-edit-user-talk' => '我的讨论页的话题',
	'echo-pref-email-reverted' => '对我的编辑的撤销',
	'echo-pref-email-frequency-never' => '不要给我发送任何电子邮件通知',
	'echo-pref-email-frequency-immediately' => '允许的个别通知',
	'echo-pref-email-frequency-daily' => '每日通知摘要',
	'echo-pref-email-frequency-weekly' => '每周通知摘要',
	'echo-pref-notify-hide-link' => '在我的工具栏中隐藏通知的链接和徽章',
	'echo-no-agent' => '[无人]',
	'echo-no-title' => '[无页面]',
	'echo-error-no-formatter' => '通知没有定义格式',
	'notifications' => '通知',
	'tooltip-pt-notifications' => '您的通知',
	'echo-specialpage' => '我的通知',
	'echo-anon' => '要接收通知，请[[Special:Userlogin/signup|创建帐号]]或[[Special:UserLogin|登录]]。',
	'echo-none' => '您没有任何通知。',
	'notification-new-user' => '欢迎来到{{SITENAME}}，$1！',
	'notification-new-user-content' => '请记得为讨论页上的任何讨论使用4个波浪线（~~~~）签名。',
	'echo-email-subject-default' => '{{SITENAME}}上的新通知',
	'echo-email-body-default' => '您在{{SITENAME}}上有新通知：

$1',
	'echo-link-new' => '$1条新通知',
	'echo-link' => '通知',
	'echo-overlay-link' => '全部通知',
	'echo-overlay-title' => '我的通知',
	'echo-date-today' => '今天',
	'echo-date-yesterday' => '昨天',
	'echo-load-more-error' => '获取更多的结果时出错。',
	'echo-email-batch-category-header-edit-user-talk' => '$1对话页$1条信息',
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
	'prefs-emailsubscriptions' => '以電郵通知我，如果其他人...',
	'prefs-emailfrequency' => '以電郵接收通知的頻率', # Fuzzy
	'echo-pref-email-edit-user-talk' => '討論頁留言',
	'echo-pref-email-article-linked' => '於其他頁面加入一條連結到我創建的頁面',
	'echo-pref-email-reverted' => '回退我的編輯',
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
