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
	'prefs-emailfrequency' => 'How often I receive notifications by e-mail',
	'echo-pref-email-edit-user-talk' => 'Posts on my talk page',
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
	'echo-specialpage' => 'My notifications',
	'echo-anon' => 'To receive notifications, [[Special:Userlogin/signup|create an account]] or [[Special:UserLogin|log in]].',
	'echo-none' => 'You have no notifications.',

	// Notification
	'notification-edit' => '$2 {{GENDER:$1|edited}} [[$3]] $4: "$5"',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|posted}} on your [[User talk:$3|talk page]].',
	'notification-add-comment' => '$2 {{GENDER:$1|commented}} on "[[$4|$3]]" on the "$5" talk page',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|posted}} a new topic "$3" on [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|sent}} you a message: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|commented}} on "[[$4#$3|$3]]" on your talk page',
	'notification-talkpage-content' => '$1', ## Do not translate unless you deliberately want to change behaviour
	'notification-new-user' => 'Welcome to {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Hi $1, and welcome to {{SITENAME}}.<br />
Please remember to sign any comments on talk pages with 4 tildes (~~~~).',
	'notification-reverted' => 'Your {{PLURAL:$5|edit on [[$3]] has|edits on [[$3]] have}} been {{GENDER:$1|reverted}} by $2 $4',
	'notification-edit-email-subject' => '{{SITENAME}} notification: $3 has been edited by $2',
	'notification-edit-email-body' => 'Hello $5,
This is a notification to let you know that $2 {{GENDER:$2|has edited}} the {{SITENAME}} page $3.

$2 {{GENDER:$2|summarized}} {{GENDER:$2|his|her|their}} change with this comment: $6

You can see the change that $2 {{GENDER:$2|made}} by following this link:
<$4>

You are receiving this message because you have subscribed to e-mail updates for changes to this page.

$7',
	'notification-edit-talk-page-email-subject' => 'You have a new talkpage message',
	'notification-edit-talk-page-email-body' => '{{SITENAME}} user $2 {{GENDER:$2|posted}} on your talk page:

$4

View more:

$3

$5',
	'notification-edit-talk-page-email-batch-body' => '$2 {{GENDER:$2|posted}} on your talk page',
	'notification-reverted-email-subject' => 'Your edit on $3 was {{GENDER:$2|reverted}} by $2',
	'notification-reverted-email-body' => 'Your edit on $3 has been {{GENDER:$2|has reverted}} by $2.

$6

View more:

$4

$7',
	'notification-reverted-email-batch-body' => 'Your edit on $3 was reverted by $2',
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
	'echo-email-batch-category-header-edit-user-talk' => '$1 Talk page {{PLURAL:$1|message|messages}}',
	'echo-email-batch-category-header-edit-revert' => '$1 Edit {{PLURAL:$1|revert|reverts}}',
	'echo-email-batch-category-header-other' => '$1 {{PLURAL:$1|Other|Others}}',
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
	'prefs-echo' => 'Name of preferences section for Echo notifications.',
	'prefs-displaynotifications' => 'Header for the section of preferences that deals with how notifications are displayed',
	'prefs-emailsubscriptions' => 'Header for the section of preferences that deals with which notifications the user receives emails for
* {{msg-mw|Echo-pref-email-edit-user-talk}}
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
	'echo-pref-email-reverted' => "Option for getting emails when someone reverts the user's edit. This is the conclusion of the sentence begun by the header: {{msg-mw|prefs-emailsubscriptions}}.",
	'echo-pref-email-frequency-never' => "Option for users who don't want to receive any email notifications",
	'echo-pref-email-frequency-immediately' => 'Option for users who want to receive email for each notification as it occurs',
	'echo-pref-email-frequency-daily' => 'Option for users who want to receive a daily digest of email notifications',
	'echo-pref-email-frequency-weekly' => 'Option for users who want to receive a weekly digest of email notifications',
	'echo-pref-notify-hide-link' => "Label for a preference which disables the 'Notifications' link in the header and associated fly-out panel",
	'echo-no-agent' => 'Shown in place of a username in a notification
	if the notification has no specified user.',
	'echo-no-title' => 'Shown in place of a page title in a notification if the notification has no specified page title.',
	'echo-error-no-formatter' => "Error message displayed when no formatting has been defined for a notification. In other words, the extension doesn't know how to properly display the notification.",
	'notifications' => 'This message is the page title of the special page [[Special:Notifications]].',
	'echo-specialpage' => 'Special page title for Special:Notifications',
	'echo-anon' => 'Error message shown to users who try to visit Special:Notifications as an anon.',
	'echo-none' => 'Message shown to users who have no notifications. Also shown in the overlay.',
	'notification-edit' => 'Format for displaying notifications of a page being edited (generally from a watchlist)
* $1 is the username of the person who edited, plain text. Can be used for GENDER.
* $2 is the username of the person who edited, HTML formatted as the link to the user\'s page.
* $3 is the page that was edited, as plain text.
* $4 is a diff link, possibly formatted as an HTML link with the text "(diff)".
* $5 is the edit summary.',
	'notification-edit-talk-page' => "Format for displaying notifications of a user talk page being edited
* $1 is the username of the person who edited, plain text. Can be used for GENDER.
* $2 is the username of the person who edited, HTML formatted as the link to the user's page.
* $3 is the current user's name, used in the link to their talk page.",
	'notification-add-comment' => 'Format for displaying notifications of a comment being added to an existing discussion. Parameters:
* $1 is the username of the person who edited, plain text. Can be used for GENDER,
* $2 is the username of the person who edited,
* $3 is the section title of the discussion,
* $4 is a link to a page and section,
* $5 is the page on which the discussion exists, plain text.',
	'notification-add-talkpage-topic' => "Format for displaying notifications of a new discussion being added
* $1 is the username of the person who edited, plain text. Can be used for GENDER.
* $2 is the username of the person who edited, HTML formatted as the link to the user's page.
* $3 is the section title of the discussion.
* $4 is the page on which the discussion was added, plain text.",
	'notification-add-talkpage-topic-yours' => 'Parameters:
* $1 is a username used for GENDER
* $2 is a linked username
* $3 is a page section
* $4 is a page title.',
	'notification-add-comment-yours' => 'Parameters:
* $1 Username used for GENDER;
* $2 Linked Username;
* $3 Discussion name;
* $4 link to user talk page.',
	'notification-talkpage-content' => 'Message shown as the "content" of a talkpage-related action.
* $1 is the content of the talk page post.

{{optional}}',
	'notification-new-user' => 'Title for the welcome notification. $1 is the name of the new user.',
	'notification-new-user-content' => 'The content shown to users on their welcome notification. $1 is the name of the new user.',
	'notification-reverted' => "Format for displaying notifications of a user's edit being reverted.
* $1 is the username of the person who reverted, plain text. Can be used for GENDER.
* $2 is the username of the person who reverted, formatted.
* $3 is the page that was reverted, formatted.
* $4 is a diff link to the ''revert'', possibly formatted.
* $5 is the number of edits that were reverted. NOTE: This will only be set to 1 or 2, with 2 actually meaning 'an unknown number greater than 0'.",
	'notification-edit-email-subject' => 'E-mail subject. Parameters:
* $2 is a username
* $3 is a page title',
	'notification-edit-email-body' => "E-mail notification. Parameters:
* $2 is a username
* $3 is a page title
* $4 is a link to a change
* $5 is the e-mail recipient's username.
* $6 is the edit summary.
* $7 is the e-mail footer, {{msg|echo-email-footer-default}}",
	'notification-edit-talk-page-email-subject' => 'E-mail subject.',
	'notification-edit-talk-page-email-body' => 'E-mail notification. Parameters:
* $2 is a username
* $3 is a link to a change
* $4 is the edit summary.
* $5 is the e-mail footer, {{msg|echo-email-footer-default}}',
	'notification-edit-talk-page-email-batch-body' => 'E-mail notification for talk page edit
* $2 is a username',
	'notification-reverted-email-subject' => 'E-mail subject. Parameters:
*$2 is a username
*$3 is a page title',
	'notification-reverted-email-body' => "E-mail notification. Parameters:
* $2 is the username
* $3 is the page title
* $4 is the link to the change
* $5 is the e-mail recipient's username
* $6 is the edit summary
* $7 is the email footer, {{msg|echo-email-footer-default}}",
	'notification-reverted-email-batch-body' => 'E-mail notification for page revert. Parameters:
* $2 is a username
* $3 is a page title',
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
	'echo-link' => 'Shown in "personal links" when a user has JS. New notifications are indicated with a badge.',
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
* $1 could be a numeric count or "$1+" ({{msg-mw|echo-notification-count}})
* $2 is a numeric count, this is used for plural support',
	'echo-email-batch-subject-weekly' => 'Weekly e-mail batch subject.
* $1 could be a numeric count or "$1+" ({{msg-mw|echo-notification-count}})
* $2 is a numeric count, this is used for plural support',
	'echo-email-batch-body-daily' => 'Daily e-mail batch body. Parameters:
* $1 is a username
* $2 could be a numeric count or "$1+" ({{msg-mw|echo-notification-count}})
* $3 is a numeric count, this is used for plural support
* $4 is the e-mail batch content separated by "-------..." ({{msg-mw|echo-email-batch-separator}})
* $5 is the e-mail footer, {{msg|echo-email-footer-default}}',
	'echo-email-batch-body-weekly' => 'Weekly e-mail batch body. Parameters:
* $1 is a username
* $2 could be a numeric count or "$1+" ({{msg-mw|echo-notification-count}})
* $3 is a numeric count, this is used for plural support
* $4 is the e-mail batch content separated by "--------..." ({{msg-mw|echo-email-batch-separator}})
* $5 is the e-mail footer, {{msg|echo-email-footer-default}}',
	'echo-email-batch-category-header-edit-user-talk' => 'E-mail batch section title for edit-user-talk category
* $1 is the numeric count',
	'echo-email-batch-category-header-edit-revert' => 'E-mail batch section title for edit-revert category
* $1 is the numeric count',
	'echo-email-batch-category-header-other' => 'E-mail batch section title for events with category not specified
* $1 is the numeric count',
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
	'prefs-emailfrequency' => 'نئچه واختدان بیر من ایمیل ایله بیلدیری آلیرام',
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
	'notification-edit' => '$2، [[$3]]-ی {{GENDER:$1|دَییشدیردی}} $4: «$5»',
	'notification-edit-talk-page' => '$2 سیزین [[User talk:$3|دانیشیق صحیفه]]‌نیزه مئساژ {{GENDER:$1|قویدو}}',
	'notification-add-comment' => '$2 «[[$4|$3]]»-ه «$5» دانیشیق صحیفه‌سینده یوروم {{GENDER:$1|قویدو}}',
	'notification-add-talkpage-topic' => '$2، [[$4]]-ه بیر یئنی قونو «$3» {{GENDER:$1|یول‌لادی}}',
	'notification-add-talkpage-topic-yours' => '$2 سیزه بیر مئساژ {{GENDER:$1|گؤندردی}}: «[[$4#$3|$3]]»',
	'notification-add-comment-yours' => '$2 سیزین دانیشیق صحیفه‌نیزده «[[$4#$3|$3]]»-ه یوروم {{GENDER:$1|قویدو}}',
	'notification-new-user' => '{{SITENAME}}-ه خوش گلمیسینیز، $1!',
	'notification-new-user-content' => 'سلام $1، و {{SITENAME}}-ه خوش گلمیسینیز.<br />
لوطفاً دانیشیق صحیفه‌لرینده یوروملارینیزی ۴ تیلدا (~~~~) ایله ایمضالاماغی اونوتمایین.',
	'notification-reverted' => 'سیزین [[$3]]-ده {{PLURAL:$5|دَییشیکلیگینیز|دَییشیکلیکلرینیز}} $2 ایله {{GENDER:$1|قایتاریلیب}} $4',
	'notification-edit-email-subject' => '{{SITENAME}} بیلدیریسی: $3، $2 ایله دَییشیلیب‌دیر',
	'notification-edit-email-body' => 'سلام $5،
بو بیر بیلدیری‌دیر کی سیزه خبر وئریر $2، $3 {{SITENAME}} صحیفه‌سینی {{GENDER:$2|دَییشدیریب‌دیر}}.

$2 وئردیگی دَییشدیرمه‌یه بئله خولاصه {{GENDER:$2|یازیب‌دیر}}: $6

سیز $2 {{GENDER:$2|وئردیگی}} دَییشدیرمه‌نی بو باغلانتی ایله گؤره بیلرسینیز:
<$4>

سیز بو صحیفه‌نین دَییشدیرمه‌لرینه ایمیل ایله خبردار اولماغا آد یازدیرماسینا گؤره بو مئساژی آلیرسینیز.

$7',
	'notification-edit-talk-page-email-subject' => 'سیزین بیر یئنی دانیشیق صحیفه‌سی مئساژی وارینیزدیر',
	'notification-edit-talk-page-email-body' => '{{SITENAME}} ایستیفاده‌چیسی $2 سیزین دانیشیق صحیفه‌نیزه {{GENDER:$2|یازیب‌دیر}}S

$4

چوخ گؤرون:

$3

$5',
	'notification-edit-talk-page-email-batch-body' => '$2 سیزین دانیشیق صحیفه‌نیزه {{GENDER:$2|یازیب‌دیر}}',
	'notification-reverted-email-subject' => 'سیزین $3-ده وئردیگینیز دَییشیکلیک $2 ایله {{GENDER:$2|قایتاریلیب‌دیر}}',
	'notification-reverted-email-body' => 'سیزین $3-ده‌کی دَییشدیردیگینیز $2 ایله {{GENDER:$2|قایتاریلیب‌دیر}}.

$6

چوخ گؤرون:

$4

$7',
	'notification-reverted-email-batch-body' => 'سیزین $3-ه دَییشدیردیگینیز $2 ایله قایتاریلیب‌دیر',
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

/** Belarusian (Taraškievica orthography) (беларуская (тарашкевіца)‎)
 * @author Base
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'echo-desc' => 'Сыстэма апавяшчэньняў',
	'prefs-echo' => 'Абвесткі',
	'echo-no-agent' => '[Ніхто]',
	'echo-no-title' => '[Няма старонкі]',
	'notifications' => 'Абвесткі',
	'echo-specialpage' => 'Мае абвесткі',
	'echo-anon' => 'Для атрыманьня абвестак [[Special:Userlogin/signup|стварыце рахунак]] або [[Special:UserLogin|увайдзіце]].',
	'echo-none' => 'За апошні час вы не атрымлівалі абвестак!', # Fuzzy
	'notification-edit' => '$2 {{GENDER:$1|адрэдагаваў|адрэдагавала}} «[[$3]]» $4', # Fuzzy
	'notification-edit-talk-page' => '$2 {{GENDER:$1|напісаў|напісала}} на [[User talk:$3|вашую старонку гутарак]]. $4', # Fuzzy
	'notification-add-comment' => '$2 {{GENDER:$1|пакінуў|пакінула}} камэнтар у тэме «[[$4|$3]]» на старонцы абмеркаваньня «$5»',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|стварыў|стварыла}} новую тэму «$3» у [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|даслаў|даслала}} вам паведамленьне: «[[$4#$3|$3]]»',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|пакінуў|пакінула}} камэнтар у тэме «[[$4#$3|$3]]» вашай старонкі гутарак',
	'notification-new-user' => 'Вітаем у {{GRAMMAR:месны|{{SITENAME}}}}, $1!',
	'notification-new-user-content' => 'Вітаем у {{GRAMMAR:месны|{{SITENAME}}}}, $1.<br />
Будзьце ласкавыя падпісваць свае камэнтары на старонках абмеркаваньняў чатырма тыльдамі (~~~~).',
	'notification-edit-email-subject' => 'Абвестка ад {{GRAMMAR:родны|{{SITENAME}}}}: $2 адрэдагаваў «$3»',
	'notification-edit-email-body' => 'Вітаем, $5! Паведамляем, што $2 рэдагаваў старонку {{GRAMMAR:родны|{{SITENAME}}}} «$3».

Вы можаце пабачыць унесеныя ўдзельнікам $2 зьмены па наступнай спасылцы:
<$4>

Вы атрымалі гэтую абвестку, таму што падпісаныя на абвесткі электроннай поштай пра зьмены на гэтай старонцы.

Дзякуем за выкарыстаньне {{GRAMMAR:родны|{{SITENAME}}}}.
Сыстэма абвестак {{GRAMMAR:родны|{{SITENAME}}}}.', # Fuzzy
	'notification-edit-talk-page-email-subject' => '$2 {{GENDER:$2|адрэдагаваў|адрэдагавала}} вашую старонку гутарак у {{GRAMMAR:месны|{{SITENAME}}}}', # Fuzzy
	'notification-edit-talk-page-email-body' => 'Вітаем, $4.
Паведамляем вам, што {{GENDER:$2|рэдагаваў|рэдагавала}} вашую старонку гутарак у {{GRAMMAR:месны|{{SITENAME}}}}.

Старонка гутарак — месца, дзе іншыя ўдзельнікі могуць пакідаць вам паведамленьні.

Вы можаце праглядзець унесеныя {{GENDER:$2|ўдзельнікам|ўдзельніцай}} $2 зьмены па гэтай спасылцы:
<$3>

Дзякуем за выкарыстаньне {{GRAMMAR:родны|{{SITENAME}}}},
Сыстэма абвестак {{GRAMMAR:родны|{{SITENAME}}}}', # Fuzzy
	'echo-email-subject-default' => 'Новая абвестка ад {{GRAMMAR:родны|{{SITENAME}}}}',
	'echo-email-body-default' => 'Для вас ёсьць новая абвестка ў {{GRAMMAR:месны|{{SITENAME}}}}:

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|новая абвестка|новыя абвесткі|новых абвестак}}',
	'echo-link' => 'Мае абвесткі', # Fuzzy
	'echo-overlay-link' => 'Усе абвесткі',
	'echo-overlay-title' => 'Мае абвесткі',
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
 */
$messages['cs'] = array(
	'echo-desc' => 'Notifikační systém',
	'prefs-echo' => 'Upozornění',
	'echo-no-agent' => '[Nikdo]',
	'echo-no-title' => '[Žádná stránka]',
	'notifications' => 'Upozornění',
	'echo-specialpage' => 'Moje upozornění',
	'echo-anon' => 'Pro zobrazování upozornění je nutné [[Special:Userlogin/signup|vytvořit si účet]] nebo [[Special:UserLogin|se přihlásit]].',
	'echo-none' => 'Žádné upozornění zatím neobdrženo.',
	'notification-edit' => '$2 {{GENDER:$1|editoval|editovala}} [[$3]] $4', # Fuzzy
	'notification-edit-talk-page' => '$2 {{GENDER:$1|editoval|editovala}} [[User talk:$3|Vaší diskuzní stránku]]. $4',
	'notification-add-comment' => '$2 {{GENDER:$1|diskutoval|diskutovala}} [[$4|$3]] na diskuzní stránce $5',
	'notification-edit-email-body' => 'Dobrý den $5,

Toto je upozornění na to, že $2 editoval {{SITENAME}} stránku $3.

Změny, které $2 udělal, si můžete prohlédnout v následujícím odkazu: 
<$4>

Tuto zprávu dostáváte proto, protože jste se přihlásil k e-mailovým upozorněním o změnách této stránky.

Děkujeme za použití {{SITENAME}}
Systém upozorňování {{SITENAME}}', # Fuzzy
	'notification-edit-talk-page-email-subject' => 'Vaše diskuse na {{grammar:6sg|{{SITENAME}}}} byla změněna uživatelem $2',
	'notification-edit-talk-page-email-body' => 'Dobrý den $4,

Toto je upozornění na to, že $2 editoval Vaší diskuzní stránku na {{SITENAME}}. 

Je možné mu odpovědět na Vaší diskuzní stránce na {{SITENAME}}. 

Změny, které $2 udělal, si můžete prohlédnout v následujícím odkazu: 
<$3>

Děkujeme za použití {{SITENAME}}
Systém upozorňování {{SITENAME}}', # Fuzzy
	'echo-email-subject-default' => 'Nové upozornění na {{SITENAME}}',
	'echo-email-body-default' => 'Máte nové upozornění na {{SITENAME}}:

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nové upozornění|nová upozornění|nových upozornění}}',
	'echo-link' => 'Moje upozornění', # Fuzzy
	'echo-overlay-link' => 'Všechna upozornění...', # Fuzzy
	'echo-overlay-title' => 'Moje upozornění',
);

/** Danish (dansk)
 * @author Tjernobyl
 */
$messages['da'] = array(
	'prefs-echo' => 'Meddelelser',
	'prefs-emailsubscriptions' => 'Giv mig besked via e-mail, når en person',
	'echo-no-agent' => '[Ingen]',
	'echo-no-title' => '[Ingen side]',
	'notifications' => 'Meddelelser',
	'echo-specialpage' => 'Mine meddelelser',
	'notification-edit-email-subject' => '{{SITENAME}}-meddelelse: $3 er blevet redigeret af $2',
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
	'echo-desc' => 'Benachrichtigungssystem',
	'prefs-echo' => 'Benachrichtigungen',
	'prefs-displaynotifications' => 'Anzeigeoptionen',
	'prefs-emailsubscriptions' => 'Benachrichtige mich per E-Mail, wenn jemand',
	'prefs-emailfrequency' => 'Wie oft ich Benachrichtigungen per E-Mail erhalte',
	'echo-pref-email-edit-user-talk' => 'Nachrichten auf meiner Diskussionsseite hinterlässt',
	'echo-pref-email-reverted' => 'meine Bearbeitung rückgängig macht',
	'echo-pref-email-frequency-never' => 'Sende mir keine E-Mail-Benachrichtigungen',
	'echo-pref-email-frequency-immediately' => 'Individuelle Benachrichtigungen, wie sie eingehen',
	'echo-pref-email-frequency-daily' => 'Tägliche Zusammenfassung von Benachrichtigungen',
	'echo-pref-email-frequency-weekly' => 'Wöchentliche Zusammenfassung von Benachrichtigungen',
	'echo-pref-notify-hide-link' => 'Den Link und das Symbol für Benachrichtigungen in meiner Werkzeugleiste verstecken',
	'echo-no-agent' => '[Niemand]',
	'echo-no-title' => '[Keine Seite]',
	'echo-error-no-formatter' => 'Keine Formatierung zur Benachrichtigung definiert',
	'notifications' => 'Benachrichtigungen',
	'echo-specialpage' => 'Meine Benachrichtigungen',
	'echo-anon' => 'Um Benachrichtigungen erhalten zu können, muss man ein [[Special:Userlogin/signup|Benutzerkonto anlegen]] oder sich [[Special:UserLogin|anmelden]].',
	'echo-none' => 'Du hast keine Benachrichtigungen.',
	'notification-edit' => '$2 {{GENDER:$1|bearbeitete}} [[$3]] $4: „$5“',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|hinterließ}} eine Nachricht auf deiner [[User talk:$3|Diskussionsseite]].',
	'notification-add-comment' => '$2 {{GENDER:$1|kommentierte}} „[[$4|$3]]“ auf der Diskussionsseite „$5“',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|startete}} das neue Thema  „$3“ zu [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|sandte}} dir eine Nachricht: [[$4#$3|$3]]',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|kommentierte}} „[[$4#$3|$3]]“ auf deiner Diskussionsseite',
	'notification-new-user' => 'Willkommen bei {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Hallo $1, und willkommen bei {{SITENAME}}.<br />
Bitte vergiss nicht alle Beiträge auf Diskussionsseiten mit 4 Tilden (~~~~) zu signieren.',
	'notification-reverted' => 'Deine {{PLURAL:$5|Bearbeitung der Seite [[$3]] wurde|Bearbeitungen der Seite [[$3]] wurden}} von $2 {{GENDER:$1|rückgängig}} gemacht $4',
	'notification-edit-email-subject' => '{{SITENAME}}-Benachrichtigung: $3 wurde von $2 bearbeitet',
	'notification-edit-email-body' => 'Hallo $5,

dies ist eine Benachrichtigung, um dir mitzuteilen, dass $2 die Seite $3 auf {{SITENAME}} {{GENDER:$2|bearbeitet}} hat.

$2 {{GENDER:$2|fasste}} {{GENDER:$2|die}} Bearbeitung mit diesem Kommentar zusammen: $6

Du kannst {{GENDER:$2|die}} Änderung von $2 ansehen, sofern du auf den folgenden Link klickst:
<$4>

Du erhältst diese Nachricht, da du E-Mail-Benachrichtigungen zu Änderungen an der Seite $3 abonniert hast.

$7',
	'notification-edit-talk-page-email-subject' => 'Du hast eine neue Diskussionsseitennachricht',
	'notification-edit-talk-page-email-body' => 'Der {{SITENAME}}-Benutzer $2 {{GENDER:$2|hinterließ}} eine Nachricht auf deiner Diskussionsseite:

$4

Mehr ansehen:

$3

$5',
	'notification-edit-talk-page-email-batch-body' => '$2 {{GENDER:$2|hinterließ}} eine Nachricht auf deiner Diskussionsseite',
	'notification-reverted-email-subject' => 'Deine Bearbeitung der Seite $3 wurde von $2 {{GENDER:$2|rückgängig}} gemacht',
	'notification-reverted-email-body' => 'Deine Bearbeitung an der Seite $3 wurde von $2 {{GENDER:$2|rückgängig gemacht}}.

$6

Mehr ansehen:

$4

$7',
	'notification-reverted-email-batch-body' => 'Deine Bearbeitung an $3 wurde von $2 rückgängig gemacht',
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
	'echo-email-batch-category-header-other' => '{{PLURAL:$1|Eine andere|$1 andere}}',
);

/** German (formal address) (Deutsch (Sie-Form)‎)
 * @author Kghbln
 */
$messages['de-formal'] = array(
	'echo-none' => 'Sie haben in letzter Zeit keine Benachrichtigungen erhalten.',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|bearbeitete}} [[User talk:$3|Ihre Benutzerseite]]. $4',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|sandte}} Ihnen eine Nachricht: [[$4#$3|$3]]',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|kommentierte}} „[[$4#$3|$3]]“ auf Ihrer Diskussionsseite',
	'notification-new-user-content' => 'Hallo $1, und willkommen bei {{SITENAME}}.<br />
Bitte vergessen Sie nicht alle Beiträge auf Diskussionsseiten mit 4 Tilden (~~~~) zu signieren.',
	'notification-edit-email-body' => 'Hallo $5,

dies ist eine Benachrichtigung, um Ihnen mitzuteilen, dass $2 die Seite $3 auf {{SITENAME}} bearbeitet hat.

Sie können die Änderungen von $2 ansehen, sofern Sie auf den folgenden Link klicken:
<$4>

Sie erhalten diese Nachricht, da Sie E-Mail-Benachrichtigungen zu Änderungen an der Seite $3 abonniert haben.

Vielen Dank, dass Sie {{SITENAME}} nutzen.
Das {{SITENAME}}-Benachrichtigungssytem', # Fuzzy
	'notification-edit-talk-page-email-subject' => 'Ihre {{SITENAME}}-Diskussionsseite wurde von $2 bearbeitet',
	'notification-edit-talk-page-email-body' => 'Hallo $4,

dies ist eine Benachrichtigung, um Ihnen mitzuteilen, dass $2 Ihre Diskussionsseite auf {{SITENAME}} bearbeitet hat.

Die Diskussionsseite ist auf {{SITENAME}} die Stelle, an der Ihnen andere Benutzer eine Nachricht hinterlassen können.

Sie können die Änderungen von $2 ansehen, sofern Sie auf den folgenden Link klicken:
<$3>

Vielen Dank, dass Sie {{SITENAME}} nutzen.
Das {{SITENAME}}-Benachrichtigungssytem', # Fuzzy
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
 * @author ZaDiak
 */
$messages['el'] = array(
	'echo-desc' => 'Σύστημα ειδοποιήσεων',
	'prefs-echo' => 'Ειδοποιήσεις',
	'prefs-displaynotifications' => 'Επιλογές εμφάνισης',
	'echo-no-agent' => '[Κανένας]',
	'echo-no-title' => '[Χωρίς σελίδα]',
	'notifications' => 'Ειδοποιήσεις',
	'echo-specialpage' => 'Οι ειδοποιήσεις μου',
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
 * @author Ralgis
 * @author Vivaelcelta
 */
$messages['es'] = array(
	'echo-desc' => 'Sistema de notificaciones',
	'prefs-echo' => 'Notificaciones',
	'prefs-displaynotifications' => 'Opciones de visualización',
	'prefs-emailsubscriptions' => 'Notificarme por correo electrónico cuando alguien',
	'prefs-emailfrequency' => '¿Con qué frecuencia recibo notificaciones por correo electrónico?',
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
	'echo-specialpage' => 'Mis notificaciones',
	'echo-anon' => 'Para recibir notificaciones, [[Special:Userlogin/signup|crea una cuenta]] o [[Special:UserLogin|inicia sesión]].',
	'echo-none' => '¡No has recibido notificaciones últimamente!', # Fuzzy
	'notification-edit' => '$2 {{GENDER:$1|ha editado}} [[$3]] $4: "$5"',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|ha editado}} [[User talk:$3|tu página de discusión]]. $4', # Fuzzy
	'notification-add-comment' => '$2 {{GENDER:$1|ha comentado}} sobre "[[$4|$3]]" en la página de discusión "$5"',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|ha publicado}} un nuevo tema "$3" en [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|te ha enviado}} un mensaje: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|ha comentado}} sobre "[[$4#$3|$3]]" en tu página de discusión',
	'notification-new-user' => '¡Bienvenido a {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Hola $1 y bienvenido a {{SITENAME}}.<br />
Recuerda firmar cualquier comentario en las páginas de discusión con 4 tildes (~ ~ ~ ~).',
	'notification-reverted' => '$2 {{GENDER:$1|ha revertido}} {{PLURAL:$5|1=tu edición|tus ediciones}} en [[$3]] $4', # Fuzzy
	'notification-edit-email-subject' => 'Notificación de {{SITENAME}}: $3 ha sido editado por $2',
	'notification-edit-email-body' => 'Hola  $5 ,

Esto es una notificación para hacerte saber que $2 ha editado la página $3 de {{SITENAME}}.

$2 ha resumido sus cambios con este comentario: $6

Puedes ver los cambios que $2 ha hecho siguiendo este enlace:
<$4>

Estás recibiendo este mensaje porque estás suscrito a las actualizaciones por correo electrónico de los cambios de esta página.

$7',
	'notification-edit-talk-page-email-subject' => 'Tu página de discusión en {{SITENAME}} ha sido editada por $2', # Fuzzy
	'notification-edit-talk-page-email-body' => 'Hola $4,

Esto es una notificación para hacerte saber que $2 ha editado tu página de discusión en {{SITENAME}}.

En {{SITENAME}}, tu página de discusión es donde otros usuarios te pueden dejar mensajes.

$2 ha empleado el siguiente resumen para describir sus cambios: $5

Puedes ver los cambios que $2 ha realizado en este enlace:
<$3>

$6', # Fuzzy
	'notification-edit-talk-page-email-batch-body' => '$2 {{GENDER:$2|ha publicado}} en tu página de discusión',
	'notification-reverted-email-subject' => 'Notificación de {{SITENAME}}: $2 ha revertido tu edición en $3: $4', # Fuzzy
	'notification-reverted-email-body' => 'Hola, $5:
Esta es una notificación para hacerte saber que $2 ha revertido tus ediciones en la página $3 de {{SITENAME}}.

$2 usó el siguiente resumen para describir sus cambios: $6

Puedes ver el cambio que $2 hizo para revertir tus ediciones siguiente este enlace:
<$4>

Estás recibiendo este mensaje porque te has suscrito a las alertas por correo electrónico
cuando tus cambios sean revertidos.

$7', # Fuzzy
	'notification-reverted-email-batch-body' => 'Tu edición en $3 fue revertida por $2', # Fuzzy
	'echo-email-subject-default' => 'Nueva notificación en {{SITENAME}}',
	'echo-email-body-default' => 'Tienes una nueva notificación en {{SITENAME}}:

$1',
	'echo-email-footer-default' => '¡Gracias!

El Equipo de {{SITENAME}}

Para cambiar tus preferencias de correo electrónico o cancelar la subscrición, visita:

{{canonicalurl:{{#special:Preferencias}}#mw-prefsection-echo}}

$1', # Fuzzy
	'echo-link-new' => '$1 {{PLURAL:$1|notificación nueva|notificaciones nuevas}}',
	'echo-link' => 'Notificaciones',
	'echo-overlay-link' => 'Todas las notificaciones',
	'echo-overlay-title' => 'Mis notificaciones',
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
	'notification-edit-talk-page-email-body' => '{{SITENAME}} kasutaja $2 {{GENDER:$2|postitas}} sinu arutelulehele:

$4

Vaata lisaks:

$3

$5',
	'notification-reverted-email-subject' => '$2 tühistas sinu muudatuse leheküljel $3',
	'notification-reverted-email-batch-body' => '$2 tühistas sinu muudatuse leheküljel $3',
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
	'prefs-emailfrequency' => 'Kuinka usein saan sähköposti-ilmoituksia',
	'echo-no-agent' => '[Ei kukaan]',
	'echo-no-title' => '[Ei sivua]',
	'notifications' => 'Ilmoitukset',
	'echo-specialpage' => 'Ilmoitukset',
	'echo-anon' => 'Jos haluat saada ilmoituksia, [[Special:Userlogin/signup|luo käyttäjätunnus]] tai [[Special:UserLogin|kirjaudu sisään]].',
	'echo-none' => 'Ei uusia ilmoituksia.',
	'notification-edit' => '$2 {{GENDER:$1|muokkasi}} sivua [[$3]] $4: $5',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|muokkasi}} [[User talk:$3|keskustelusivuasi]]. $4', # Fuzzy
	'notification-add-comment' => '$2 {{GENDER:$1|kommentoi}} keskustelua [[$4|$3]] sivusta $5',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|aloitti}} keskustelun $3 sivusta [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|lähetti}} sinulle viestin: [[$4#$3|$3]]',
	'echo-link' => 'Ilmoitukset',
	'echo-overlay-link' => 'Kaikki ilmoitukset',
	'echo-overlay-title' => 'Ilmoitukset',
	'echo-date-today' => 'Tänään',
	'echo-date-yesterday' => 'Eilen',
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
	'prefs-emailfrequency' => 'À quelle fréquence je recevrai les notifications par courriel',
	'echo-pref-email-edit-user-talk' => 'Messages sur ma page de discussion',
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
	'echo-specialpage' => 'Mes notifications',
	'echo-anon' => 'Pour recevoir des notifications, [[Special:Userlogin/signup|créez un compte]] ou [[Special:UserLogin|connectez-vous]].',
	'echo-none' => "Vous n'avez reçu aucune notification.",
	'notification-edit' => '$2 {{GENDER:$1|a modifié}} [[$3]] $4: "$5"',
	'notification-edit-talk-page' => '$2 a {{GENDER:$1|publié}} sur [[User talk:$3|votre page de discussion]].',
	'notification-add-comment' => '$2 {{GENDER:$1|a posté}} un commentaire à la discussion « [[$4|$3]] » sur $5',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|a ouvert}} un nouveau sujet « $3 » sur [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 vous {{GENDER:$1|a laissé}} un message : [[$4#$3|$3]]',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|a posté}} un commentaire sur « [[$4#$3|$3]] » sur votre page de discussion',
	'notification-new-user' => 'Bienvenue sur {{SITENAME}}, $1 !',
	'notification-new-user-content' => "Bonjour $1 et bienvenue sur {{SITENAME}}.<br />
N'oubliez pas de signer vos commentaires sur les pages de discussions avec 4 tildes (~ ~ ~ ~).",
	'notification-reverted' => '{{PLURAL:$5|Votre modification sur [[$3]] a été annulée|Vos modifications sur [[$3]] ont été annulées}} {{GENDER:$1|}} par $2 $4',
	'notification-edit-email-subject' => 'Notification de {{SITENAME}} : $3 a été modifié par $2',
	'notification-edit-email-body' => 'Bonjour $5,
Ceci est une notification pour vous informer que $2 {{GENDER:$2|a modifié}} la page $3 de {{SITENAME}}.

$2 {{GENDER:$2|a résumé}} {{GENDER:$2|sa|sa|leur}} modification avec ce commentaire: $6

Vous pouvez voir les changements {{GENDER:$2|faits}} par $2 en suivant ce lien:
<$4>

Vous recevez ce message parce que vous avez souscrit aux mises à jour par courriel des modifications apportées à cette page.

$7',
	'notification-edit-talk-page-email-subject' => 'Vous avez un nouveau message sur votre page de discussion',
	'notification-edit-talk-page-email-body' => "L'utilisateur $2 de {{SITENAME}} {{GENDER:$2|a écrit}} sur votre page de discussion:

$4

En savoir plus:

$3

$5",
	'notification-edit-talk-page-email-batch-body' => '$2 {{GENDER:$2|a fait une publication}} sur votre page de discussion',
	'notification-reverted-email-subject' => 'Votre modification sur $3 a été {{GENDER:$2|annulée}} par $2',
	'notification-reverted-email-body' => 'Votre modification sur $3 a été {{GENDER:$2|annulée}} par $2.

$6

En savoir plus:

$4

$7',
	'notification-reverted-email-batch-body' => 'Votre modification sur $3 a été annulée par $2',
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
	'echo-email-batch-category-header-other' => '$1 {{PLURAL:$1|Autre|Autres}}',
);

/** Franco-Provençal (arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'prefs-echo' => 'Notificacions',
	'echo-no-agent' => '[Nion]',
	'echo-no-title' => '[Sen titro]', # Fuzzy
	'notifications' => 'Notificacions',
	'echo-specialpage' => 'Mes notificacions',
	'notification-edit' => '$2 at {{GENDER:$1|changiê}} [[$3]] $4', # Fuzzy
	'notification-edit-talk-page' => '$2 at {{GENDER:$1|changiê}} [[User talk:$3|voutra pâge de discussion]]. $4',
	'notification-add-talkpage-topic-yours' => '$2 vos at {{GENDER:$1|mandâ}} un mèssâjo : « [[$4#$3|$3]] »',
	'notification-edit-email-subject' => 'Notificacion de {{SITENAME}} : $3 est étâ changiê per $2',
	'notification-edit-talk-page-email-subject' => 'Voutra pâge de discussion de {{SITENAME}} est étâye changiêye per $2',
	'echo-email-subject-default' => 'Novèla notificacion dessus {{SITENAME}}',
	'echo-email-body-default' => 'Vos avéd na novèla notificacion dessus {{SITENAME}} :

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|novèla notificacion|novèles notificacions}}',
	'echo-link' => 'Mes notificacions', # Fuzzy
	'echo-overlay-link' => 'Totes les notificacions...', # Fuzzy
	'echo-overlay-title' => 'Mes notificacions',
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
	'prefs-emailfrequency' => 'Con que frecuencia quere recibir notificacións por correo electrónico?',
	'echo-pref-email-edit-user-talk' => 'Deixe unha mensaxe na miña conversa',
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
	'echo-specialpage' => 'As miñas notificacións',
	'echo-anon' => 'Para recibir notificacións, [[Special:Userlogin/signup|cree unha conta]] ou [[Special:UserLogin|acceda ao sistema]].',
	'echo-none' => 'Non ten ningunha notificación.',
	'notification-edit' => '$2 {{GENDER:$1|editou}} "[[$3]]" $4: "$5"',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|deixou}} unha mensaxe na súa [[User talk:$3|páxina de conversa]].',
	'notification-add-comment' => '$2 {{GENDER:$1|comentou}} en "[[$4|$3]]" na páxina de conversa "$5"',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|publicou}} unha nova mensaxe, "$3", en "[[$4]]"',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|envioulle}} unha mensaxe: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|comentou}} en "[[$4#$3|$3]]" na súa páxina de conversa',
	'notification-new-user' => 'Dámoslle a benvida a {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Boas $1. Dámoslle a benvida a {{SITENAME}}.<br />
Lembre asinar calquera comentario que deixe nas páxinas de conversa con 4 tiles (~~~~).',
	'notification-reverted' => '$2 {{GENDER:$1|reverteu}} a súa edición en "[[$3]]" $4', # Fuzzy
	'notification-edit-email-subject' => 'Notificación de {{SITENAME}}: $2 editou "$3"',
	'notification-edit-email-body' => 'Boas, $5:
Esta é unha notificación para facerlle saber que $2 {{GENDER:$2|editou}} a páxina "$3" de {{SITENAME}}.

$2 {{GENDER:$2|resumiu}} os seus cambios con este comentario: $6

Pode ollar os cambios que {{GENDER:$2|realizou}} $2 seguindo esta ligazón:
<$4>

Recibiu esta mensaxe porque activou a subscrición ás actualizacións por correo electrónico sobre os cambios nesta páxina.

$7',
	'notification-edit-talk-page-email-subject' => 'Ten unha nova mensaxe na súa páxina de conversa',
	'notification-edit-talk-page-email-body' => '{{GENDER:$2|O usuario|A usuaria}} $2 deixou unha mensaxe na súa páxina de conversa:

$4

Ollar máis:

$3

$5',
	'notification-edit-talk-page-email-batch-body' => '$2 {{GENDER:$2|deixou}} unha mensaxe na súa páxina de conversa',
	'notification-reverted-email-subject' => '$2 {{GENDER:$2|reverteu}} a súa edición en "$3"',
	'notification-reverted-email-body' => '$2 {{GENDER:$2|reverteu}} a súa edición en "$3".

$6

Ollar máis:

$4

$7',
	'notification-reverted-email-batch-body' => '$2 reverteu a súa edición en "$3"',
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
	'prefs-emailfrequency' => 'באיזו תדירות לקבל הודעות בדואר אלקטרוני',
	'echo-pref-email-edit-user-talk' => 'שולח הודעה לדף השיחה שלי',
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
	'echo-specialpage' => 'ההודעות שלי',
	'echo-anon' => 'כדי לקבל הודעות, [[Special:Userlogin/signup|יש ליצור חשבון]] או [[Special:UserLogin|להיכנס]].',
	'echo-none' => 'אין לך הודעות',
	'notification-edit' => '$2 {{GENDER:$1|ערך|ערכה}} את הדף [[$3]] $4: "$5"',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|כתב|כתבה}} [[User talk:$3|בדף השיחה שלך]].',
	'notification-add-comment' => '$2 {{GENDER:$1|הגיב|הגיבה}} על "[[$4|$3]]" בדף השיחה "$5"',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|יצר|יצרה}} את הנושא החדש "$3" בדף [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|שלח|שלחה}} לך הודעה: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|הגיב|הגיבה}} על "[[$4#$3|$3]]" בדף השיחה שלך',
	'notification-new-user' => 'ברוך בואך ל{{GRAMMAR:תחילית|{{SITENAME}}}}, $1!',
	'notification-new-user-content' => 'שלום $1 וברוך בואך ל{{GRAMMAR:תחילית|{{SUTENAME}}}}.<br />
נא לזכור לחתום על כל דפי השיחה ב־4 טילדות (~~~~).',
	'notification-reverted' => '$2 {{GENDER:$1|שחזרה|שחזרה}} את עריכתך בדף [[$3]] $4', # Fuzzy
	'notification-edit-email-subject' => 'הודעה מאתר {{SITENAME}}: הדף $3 נערך על־ידי $2',
	'notification-edit-email-body' => 'שלום $5,
זוהי הודעה כדי לידע אותך ש$2 {{GENDER:$2|ערך|ערכה}} את עמוד ה{{SITENAME}} "$3".

$2 {{GENDER:$2|סיכם|סיכמה}} את העריכה עם ההערה הבעאה: $6

אפשר לראות את השינויים ש$2 {{GENDER:$2|עשה|עשתה}} בקישור זה:
<$4>

קיבלת הודעה זו בגלל שנרשמת לקבל עידכונים באימייל על שינויים בדף זה.

תודה שהשתמשת ב{{SITENAME}}
מערכת ההודעות של{{SITENAME}}

$7', # Fuzzy
	'notification-edit-talk-page-email-subject' => 'דף השיחה שלך באתר {{SITENAME}} נערך עלֹ־ידי $2', # Fuzzy
	'notification-edit-talk-page-email-body' => 'שלום $4,
רצינו לספר לך ש{{GRAMMAR|תחילית|$2}} {{GENDER:$2|ערך|ערכה}} את דף השיחה שלך באתר {{SITENAME}}.

ב{{SITENAME}}, דף השיחה שלך הוא מקום שמשתמשים אחרים יכולים להשאיר בו הודעות בשבילך.

$2 {{GENDER:$2|כתב|כתבה}} את התקציר הבא כדי לתאר את השינוי {{GENDER:$2|שעשה|שעשתה}}: $5

אפשר לראות את השינויים ש{{GRAMMAR|תחילית|$2}} {{GENDER:$2|עשה|עשתה}} בקישור זה:
<$3>

$6', # Fuzzy
	'notification-reverted-email-subject' => 'הודעת {{SITENAME}}: $2 {{GENDER:$2|שחזר|שחזרה}} את עריכתך בדף $3: $4', # Fuzzy
	'notification-reverted-email-body' => 'שלום $5,
רצינו להודיע לך ש{{GRAMMAR:תחילית|$2}} {{GENDER:$2|ערך|ערכה}} את העמוד $3 באתר {{SITENAME}}.

$2 {{GENDER:$2|סיכם|סיכמה}} את העריכה עם ההערה הבאה: $6

אפשר לראות את השינויים ש{{GRAMMAR:תחילית|$2}} {{GENDER:$2|עשה|עשתה}} בקישור הבא:
<$4>

קיבלת הודעה זו בגלל שנרשמת לקבל עדכונים בדואר אלקארוני על שינויים בדף זה.

$7', # Fuzzy
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
	'notification-edit' => '$2 je [[$3]] $4: "$5" {{GENDER:$1|wobdźěłał|wobdźěłała}}',
	'notification-edit-talk-page' => '$2 je zdźělenku na [[User talk:$3|twojej diskusijnej stronje]] {{GENDER:$1|zawostajił|zawostajiła}}.',
	'notification-add-comment' => '$2 je "[[$4|$3]]" na diskusijnej stronje "$5" {{GENDER:$1|komentował|komentowała}}',
	'notification-add-talkpage-topic' => '$2 je nowu temu "$3" na [[$4]] {{GENDER:$1|započał|započała}}',
	'notification-add-talkpage-topic-yours' => '$2 je ći powěsć {{GENDER:$1|pósłał|pósłała}}: [[$4#$3|$3]]',
	'notification-add-comment-yours' => '$2 je "[[$4#$3|$3]]" na twojej diskusijnej stronje {{GENDER:$1|komentował|komentowała}}',
	'notification-new-user' => 'Witaj do {{GRAMMAR:genitiw|{{SITENAME}}}}, $1!',
	'notification-new-user-content' => 'Halo $1, a witaj do {{GRAMMAR:genitiw|{{SITENAME}}}}.<br />
Prošu njezabudź komentary na diskusijnych stronach z 4 tildami (~~~~) podpisać .',
	'notification-reverted' => 'Twoja změna na [[$3]]  je so wot $2 {{GENDER:$1|anulował|anulowała}} $4', # Fuzzy
	'notification-edit-email-subject' => 'Zdźělenka z {{GRAMMAR:genitiw|{{SITENAME}}}}: $3 je so wot $2 wobdźěłał',
	'notification-edit-email-body' => 'Witaj $5,

to je zdźělenka, kotraž će informuje, zo $2 je stronu $3 na {{GRAMMAR:lokatiw|{{SITENAME}}}} wobdźěłał.

$2 je swoje změny z tutym komentarom zjał: $6

Móžeš změny, kotrež $2 přewjedźe, přez slědowacy wotkaz widźeć:
<$4>

Přijimaš tutu zdźělenku, dokelž sy e-mejlowe aktualizacije wo změnach na tutej stronje abonował.

$7', # Fuzzy
	'notification-edit-talk-page-email-subject' => 'Maš nowu powěsć na diskusijnej stronje',
	'notification-edit-talk-page-email-body' => 'Witaj $4,

to je zdźělenka, kotraž će informuje, zo $2 je twoju diskusijnu stronu na {{GRAMMAR:lokatiw|{{SITENAME}}}} wobdźěłał.

Twoja duskusijna strona je na {{GRAMMAR:lokatiw|{{SITENAME}}}}  te městno, hdźež wužiwarjo móža ći powěsće zawostajić.

$2 je slědowace zjeće wužił, zo by swoju změnu wopisał: $5

Změny, kotrež $2 přewjedźe, móžeš přez slědowacy wotkaz widźeć:
<$3>

$6', # Fuzzy
	'notification-reverted-email-subject' => 'Zdźělenje přez {{GRAMMAR:akuzatiw|{{SITENAME}}}}: $2 je wašu změny na $3 anulował: $4', # Fuzzy
	'notification-reverted-email-body' => 'Witaj $5,

to je zdźělenka, kotraž će informuje, zo $2 je twoje změny  na stronje $3 w {{GRAMMAR:lokatiw|{{SITENAME}}}} anulował.

$2 je slědowace zjeće wužił, zo by swoju změnu wopisał: $6

Móžeš změny, kotrež $2 přewjedźe, zo by twoje změny anulował, přez slědowacy wotkaz widźeć:
<$4>

Přijimaš tutu zdźělenku, dokelž sy e-mejlowe zdźělenki wo anulowanych změnach abonował.

$7', # Fuzzy
	'echo-email-subject-default' => 'Nowa zdźělenka na {{GRAMMAR:lokatiw|{{SITENAME}}}}',
	'echo-email-body-default' => 'Maš nowu zdźělenku na {{GRAMMAR:lokatiw|{{SITENAME}}}}:

$1',
	'echo-email-footer-default' => 'Wulki dźak!

Team {{GRAMMAR:genitiw|{{SITENAME}}}}

Zo by swoje e-mejlow nastajenja změnić abo wotskazać, wopytaj prošu:

{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1', # Fuzzy
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
	'prefs-echo' => 'Értesítések',
	'notifications' => 'Értesítések',
	'echo-specialpage' => 'Értesítéseim',
	'echo-link' => 'Értesítések',
	'echo-overlay-link' => 'Összes értesítés…', # Fuzzy
	'echo-overlay-title' => 'Értesítéseim',
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
 */
$messages['it'] = array(
	'echo-desc' => 'Sistema per le notifiche',
	'prefs-echo' => 'Notifiche',
	'prefs-displaynotifications' => 'Opzioni di visualizzazione',
	'prefs-emailsubscriptions' => 'Notificami via e-mail quando qualcuno',
	'prefs-emailfrequency' => 'Quanto spesso ricevo le notifiche via e-mail',
	'echo-pref-email-edit-user-talk' => 'scrive sulla mia pagina di discussione',
	'echo-pref-email-reverted' => 'annulla una mia modifica',
	'echo-pref-email-frequency-never' => 'Non inviarmi alcuna notifica via e-mail',
	'echo-pref-email-frequency-immediately' => 'Notifiche individuali come arrivano',
	'echo-pref-email-frequency-daily' => 'Un riepilogo giornaliero delle notifiche',
	'echo-pref-email-frequency-weekly' => 'Un riepilogo settimanale delle notifiche',
	'echo-no-agent' => '[Nessuno]',
	'echo-no-title' => '[Nessuna pagina]',
	'echo-error-no-formatter' => 'Nessuna formattazione definita per le notifiche',
	'notifications' => 'Notifiche',
	'echo-specialpage' => 'Mie notifiche',
	'echo-anon' => "Per ricevere le notifiche, [[Special:Userlogin/signup|crea un account]] o [[Special:UserLogin|effettua l'accesso]].",
	'echo-none' => 'Non hai notifiche.',
	'notification-edit' => '$2 {{GENDER:$1|ha modificato}} [[$3]] $4: "$5"',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|ha postato}} sulla tua [[User talk:$3|pagina di discussione]].',
	'notification-add-comment' => '$2 {{GENDER:$1|ha commentato}} riguardo a "[[$4|$3]]" nella pagina di discussione di "$5"',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|ha inserito}} un nuovo argomento "$3" su [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 ti {{GENDER:$1|ha inviato}} un messaggio: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|ha commentato}} riguardo a "[[$4#$3|$3]]" nella tua pagina di discussione',
	'notification-new-user' => 'Benvenuto su {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Ciao $1 e benvenuto su {{SITENAME}}.<br />
Ricordati di firmare i commenti nelle pagine di discussione con quattro tildi (~~~~).',
	'notification-reverted' => '{{PLURAL:$5|1=La tua modifica|Le tue modifiche}} su [[$3]] {{PLURAL:$5|è stata annullata|sono state annullate}} {{GENDER:$1|da}} $2 $4',
	'notification-edit-email-subject' => 'Notifica di {{SITENAME}}: $3 è stata modificata da $2',
	'notification-edit-email-body' => 'Ciao $5,
Questa è una notifica per farti sapere che $2 {{GENDER:$2|ha modificato}} la pagina di {{SITENAME}} $3.

$2 ha commentato le {{GENDER:$2|sue}} modifiche con questo oggetto: $6

Puoi vedere le modifiche che $2 ha fatto seguendo questo collegamento:
<$4>

Stai ricevendo questo messaggio perché hai sottoscritto gli aggiornamenti tramite e-mail per le modifiche a questa pagina.

$7',
	'notification-edit-talk-page-email-subject' => 'Hai un nuovo messaggio nella pagina di discussione',
	'notification-edit-talk-page-email-body' => "L'utente di {{SITENAME}} $2 {{GENDER:$2|ha modificato}} la tua pagina di discussione:

$4

Vedi anche:

$3

$5",
	'notification-edit-talk-page-email-batch-body' => '$2 {{GENDER:$2|ha postato}} sulla tua pagina di discussione',
	'notification-reverted-email-subject' => 'Le tue modifiche su $3 sono state {{GENDER:$2|annullate}} da $2',
	'notification-reverted-email-body' => 'La tua modifica su $3 {{GENDER:$2|è stata annullata}} da $2.

$6

Vedi anche:

$4

$7',
	'notification-reverted-email-batch-body' => 'La tua modifica su $3 è stata annullata da $2',
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
	'echo-pref-email-reverted' => '自分の編集を誰かが差し戻したとき',
	'echo-pref-email-frequency-never' => '通知メールを何も受け取らない',
	'echo-pref-notify-hide-link' => '通知のリンクとバッジをツールバーに表示しない',
	'echo-error-no-formatter' => '通知の書式が定義されていません',
	'notifications' => '通知',
	'echo-specialpage' => '自分の通知',
	'echo-anon' => '通知を受け取るには、[[Special:Userlogin/signup|アカウント作成]]または[[Special:UserLogin|ログイン]]をしてください。',
	'echo-none' => '通知はありません。',
	'notification-edit' => '$2 が [[$3]] $4 を{{GENDER:$1|編集しました}}:「$5」',
	'notification-edit-talk-page' => '$2 があなたの[[User talk:$3|トークページ]]に{{GENDER:$1|投稿しました}}。',
	'notification-add-comment' => '$2 がトークページ「$5」の「[[$4|$3]]」に{{GENDER:$1|コメントしました}}',
	'notification-add-talkpage-topic' => '$2 が [[$4]] に新しい話題「$3」を{{GENDER:$1|投稿しました}}',
	'notification-add-talkpage-topic-yours' => '$2 があなたにメッセージを{{GENDER:$1|送信しました}}:「[[$4#$3|$3]]」',
	'notification-add-comment-yours' => '$2 があなたのトークページの「[[$4#$3|$3]]」に{{GENDER:$1|コメントしました}}',
	'notification-new-user' => '$1さん、{{SITENAME}}にようこそ!',
	'notification-new-user-content' => 'こんにちは、$1さん。{{SITENAME}}へようこそ。<br />
トークページヘのコメントには 4 つのチルダ (~~~~) を付けて署名してください。',
	'notification-reverted' => '[[$3]] でのあなたの{{PLURAL:$5|編集}}を $2 が{{GENDER:$1|差し戻しました}} $4',
	'notification-edit-email-subject' => '{{SITENAME}}からの通知: $3 を $2 が編集しました',
	'notification-edit-talk-page-email-subject' => 'トークページに新着メッセージがあります',
	'notification-edit-talk-page-email-batch-body' => '$2 があなたのトークページに{{GENDER:$2|投稿しました}}',
	'notification-reverted-email-subject' => '$3 でのあなたの編集を $2 が{{GENDER:$2|差し戻しました}}',
	'notification-reverted-email-batch-body' => '$3 でのあなたの編集を $2 が差し戻しました',
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
	'prefs-emailfrequency' => '내가 이메일 알림을 받는 빈도',
	'echo-pref-email-edit-user-talk' => '내 토론 문서에 대한 게시물',
	'echo-pref-email-reverted' => '내 편집을 되돌립니다',
	'echo-pref-email-frequency-never' => '내게 어떠한 이메일 알림을 보내지 않기',
	'echo-pref-email-frequency-immediately' => '모두한테 오는 개별 알림',
	'echo-pref-email-frequency-daily' => '알림의 일별 요약',
	'echo-pref-email-frequency-weekly' => '알림의 주간 요약',
	'echo-pref-notify-hide-link' => '툴바에 알림에 대한 링크와 배지 숨기기',
	'echo-no-agent' => '[알 수 없는 사용자]',
	'echo-no-title' => '[문서 없음]',
	'echo-error-no-formatter' => '알림에 대해 정의한 형식이 없습니다',
	'notifications' => '알림',
	'echo-specialpage' => '내 알림',
	'echo-anon' => '알림을 받으려면 [[Special:Userlogin/signup|계정을 만들거나]] [[Special:UserLogin|로그인하세요]].',
	'echo-none' => '알림이 없습니다.',
	'notification-edit' => '$2 사용자가 [[$3]] 문서를 {{GENDER:$1|편집했습니다}} $4: "$5"',
	'notification-edit-talk-page' => '$2 사용자가 당신의 [[User talk:$3|토론 문서]]에 {{GENDER:$1|게시했습니다}}.',
	'notification-add-comment' => '$2 사용자가 "$5" 토론 문서의 "[[$4|$3]]"에 {{GENDER:$1|덧글을 남겼습니다}}',
	'notification-add-talkpage-topic' => '$2 사용자가 [[$4]]에 "$3" 새 주제를 {{GENDER:$1|게시했습니다}}',
	'notification-add-talkpage-topic-yours' => '$2 사용자가 메시지를 {{GENDER:$1|보냈습니다}}: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 사용자가 당신의 토론 문서의 "[[$4#$3|$3]]"에 {{GENDER:$1|덧글을 남겼습니다}}',
	'notification-new-user' => '$1, {{SITENAME}}에 온 것을 환영합니다!',
	'notification-new-user-content' => '$1 안녕하세요, {{SITENAME}}에 온 것을 환영합니다.<br />
토론 문서에서 글을 쓴 후에는 물결표 4개(~~~~)를 넣어 서명하는 것을 기억하세요.',
	'notification-reverted' => '[[$3]]에 대한 당신의 편집을 $2 사용자가 {{GENDER:$1|되돌렸습니다}} $4', # Fuzzy
	'notification-edit-email-subject' => '{{SITENAME}} 알림: $3 문서를 $2에 의해 편집함',
	'notification-edit-email-body' => '$5 안녕하세요.
$2 사용자가 {{SITENAME}} $3 문서를 {{GENDER:$2|편집했음}}을 알립니다.

$2 사용자가 이 덧글로 바뀜을 {{GENDER:$2|요약했습니다}}: $6

이 링크를 통해 $2 사용자에 의한 바뀜을 볼 수 있습니다:
<$4>

이 문서의 바뀜에 대해 이메일 업데이트에 구독했기 때문에 이 메시지를 보내드립니다.

$7',
	'notification-edit-talk-page-email-subject' => '새 토론 문서 메시지가 있습니다',
	'notification-edit-talk-page-email-body' => '{{SITENAME}} $2 사용자가 당신의 토론 문서에 {{GENDER:$2|게시했습니다}}:

$4

더 보기:

$3

$5',
	'notification-edit-talk-page-email-batch-body' => '$2 사용자가 당신의 토론 문서에 {{GENDER:$2|게시했습니다}}',
	'notification-reverted-email-subject' => '$3에 대한 당신의 편집을 $2 사용자가 {{GENDER:$2|되돌렸습니다}}',
	'notification-reverted-email-body' => '$3에 대한 당신의 편집을 $2 사용자가 {{GENDER:$2|되돌렸습니다}}.

$6

더 보기:

$4

$7',
	'notification-reverted-email-batch-body' => '$3에 대한 당신의 편집을 $2 사용자가 되돌렸습니다',
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
	'echo-none' => 'Ende läzde Zigg häß De kein Medeilonge krääje.',
	'notification-edit' => '{{GENDER:$1|Dä|Dat|Dä Metmaacher|De|Dat}} $2 hät jät op dä Sigg „[[$3]]“ jeändert: $4', # Fuzzy
	'notification-edit-talk-page' => '{{GENDER:$1|Dä|Dat|Dä Metmaacher|De|Dat}} $2 hät jät op [[User talk:$3|Ding Klaafsigg]] jeschrevve. $4',
	'notification-add-comment' => '{{GENDER:$1|Dä|Dat|Dä Metmaacher|De|Dat}} $2 hät jät op [[$4|$3]] op dä Klaafsigg „$5“ jeschrevve',
	'notification-add-talkpage-topic' => '{{GENDER:$1|Dä|Dat|Dä Metmaacher|De|Dat}} $2 häd dä neue Jeschpräächsfäddem „$3“ op di Sigg  [[$4]] jeschrevves',
	'notification-add-talkpage-topic-yours' => '{{GENDER:$1|Dä|Dat|Dä Metmaacher|De|Dat}} $2 hät Der en neue Nohreesch jeschrevves: [[$4#$3|$3]]',
	'notification-add-comment-yours' => '{{GENDER:$1|Dä|Dat|Dä Metmaacher|De|Dat}} $2 hät zoh [[$4#$3|$3]] op Dinge Klaafsigg jät  jeschrevves.',
	'notification-new-user' => '$1, welkumme op {{GENDER:Dative|{{SITENAME}}}}!',
	'notification-new-user-content' => 'Jooden Daach $1, welkumme op {{GENDER:Dative|{{SITENAME}}}}.<br />
Bes esu jood un donn Ding Beidrääsch op Klaafsigge met vier Tilde (~~~~) „ongerschriive“.',
	'notification-edit-email-subject' => 'Medeilong {{GRAMMAR:genitive vun|{{ucfirst:{{SITENAME}}}}}}: „$3“ wood {{GENDER:$2|vum|vum|vumm Metmaacher|vun dä|vum}} $2 jeändert.',
	'notification-edit-email-body' => 'Daach $5,
dat heh es en Medeilong, öm Desch weßße ze lohße, dat {{GENDER:$2|dä|dat|dä Metmaacher|de|dat}} $2 di Sigg „$3“ jeändert hät.

Do kann de Änderonge övver heh dä Lengk beloore:
<$4>

Do kriß dat jeschrevve, weil De Desch enjeschrevve häs, dat De bei Änderonge aan dä Sigg en e-mail jeschek krijje wells.

Mer bedanke ons för et Metmaache op {{GRAMMAR:dative|{{ucfirst:{{SITENAME}}}}}}.
Et Süßtehm vör Medeilong {{GRAMMAR:genive|{{ucfirst:{{SITENAME}}}}}}', # Fuzzy
	'notification-edit-talk-page-email-subject' => 'Ding Klaafsigg {{GRAMMAR:dative en|{{ucfirst:{{SITENAME}}}}}} wood {{GENDER:$2|vum|vum|vum_Metmaacher|vun dä|vum}} $2 jeändert.',
	'notification-edit-talk-page-email-body' => 'Daach $4,
Dat heh es en Medeilong, öm Desch weßße ze lohße, dat Ding Klaafsigg op {{GRAMMAR:dative|{{ucfirst:{{SITENAME}}}}}} {{GENDER:$2|vum|vum|vum_Metmaacher|vun dä|vum}} $2 jeändert woode es.

Ding Klaadsigg {{GRAMMAR:dative+em|{{ucfirst:{{SITENAME}}}}}} es doför doh, dat Der ander Lück Nohreeschte drop schriive künne.

Do kann de Änderonge övver heh dä Lengk beloore:
<$3>

Mer bedanke ons för et Metmaache op {{GRAMMAR:dative|{{ucfirst:{{SITENAME}}}}}}.
Et Süßtehm vör Medeilong {{GRAMMAR:genive|{{ucfirst:{{SITENAME}}}}}}', # Fuzzy
	'echo-email-subject-default' => 'En neue Medeilong op {{GRAMMAR:dative|{{ucfirst:{{SITENAME}}}}}}',
	'echo-email-body-default' => 'Do häss_en neue Medeilong op {{GRAMMAR:dative|{{ucfirst:{{SITENAME}}}}}}:

$1',
	'echo-link-new' => '{{PLURAL:$1|Ein neue Medeilong|$1 neue Medeilonge|Kein neue Medeilong}}',
	'echo-link' => 'Ming Medeilonge', # Fuzzy
	'echo-overlay-link' => 'Alle Medeilonge{{int:ellipsis}}', # Fuzzy
	'echo-overlay-title' => 'Ming Medeilonge',
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
	'notification-edit' => '$2 {{GENDER:$1|huet}} [[$3]] $4: "$5" geännert',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|huet}} [[User talk:$3|Är Diskussiounssäit]]. $4', # Fuzzy
	'notification-new-user' => 'Wëllkomm op {{SITENAME}}, $1!',
	'notification-edit-email-subject' => '{{SITENAME}}-Notifikatioun: $3 gouf vum $2 geännert',
	'notification-edit-talk-page-email-subject' => 'Är {{SITENAME}} Diskussiounssäit gouf vum $2 geännert', # Fuzzy
	'notification-reverted-email-batch-body' => 'Är Ännerung op $3 gouf vum $2 zréckgesat',
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
	'prefs-emailfrequency' => 'Колку често да примате известувања на е-пошта',
	'echo-pref-email-edit-user-talk' => 'Објави на мојата страница за разговор',
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
	'echo-specialpage' => 'Мои известувања',
	'echo-anon' => 'За да добивате известувања, [[Special:Userlogin/signup|направете сметка]] или [[Special:UserLogin|најавете се]].',
	'echo-none' => 'Немате известувања.',
	'notification-edit' => '$2 {{GENDER:$1|ја измени}} страницата [[$3]] $4: „$5“',
	'notification-edit-talk-page' => '$2 ја {{GENDER:$1|објави}} на вашата [[User talk:$3|страница за разговор]].',
	'notification-add-comment' => '$2 {{GENDER:$1|коментираше}} на „[[$4|$3]]“ на страницата за разговор „$5“',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|напиша}} нова тема „$3“ за [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 ви {{GENDER:$1|испрати}} порака: [[$4#$3|$3]]',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|коментираше}} на „[[$4#$3|$3]]“ на вашата страница за разговор',
	'notification-new-user' => 'Добредојдовте на {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Здраво $1, и добредојдовте на {{SITENAME}}.<br />
НЕ заборавајте да си ги потпишувате коментарите на страниците за разговор со 4 тилди (~~~~).',
	'notification-reverted' => '$2 {{PLURAL:$5|го|ги}} {{GENDER:$1|врати}} {{PLURAL:$5|вашето уредување на [[$3]]|вашите уредувања на [[$3]]}} $4',
	'notification-edit-email-subject' => 'Известување од {{SITENAME}}: $2 ја измени страницата $3',
	'notification-edit-email-body' => 'Здраво $5,
Ве известуваме дека $2 {{GENDER:$2|ја измени}} страницата $3 на {{SITENAME}}.

$2  {{GENDER:$2|ги опиша}} {{GENDER:$2|неговите|нејзините|неговите}} промени со следниов коментар: $6

Измената што {{GENDER:$2|ја направи}} $2 можете да ги погледате на следнава врска:
<$4>

Соопштениево го добивате бидејќе сте пријавени на известувања по е-пошта во врска со измени на оваа страница.

$7',
	'notification-edit-talk-page-email-subject' => 'Имате нова порака.',
	'notification-edit-talk-page-email-body' => 'Корисникот $2 на {{SITENAME}} {{GENDER:$2|објави}} на вашата страница за разговор:

$4

Погледајте повеќе:

$3

$5',
	'notification-edit-talk-page-email-batch-body' => '$2 {{GENDER:$2|објави}} на вашата страница за разговор',
	'notification-reverted-email-subject' => '$2 {{GENDER:$2|го врати}} вашето уредување на $3',
	'notification-reverted-email-body' => '$2 {{GENDER:$2|го врати}} вашето уредување на $3.

$6

Погледајте повеќе:

$4

$7',
	'notification-reverted-email-batch-body' => '$2 го врати вашето уредување на $3',
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
	'notification-edit' => '[[$3]] എന്ന താൾ $2 {{GENDER:$1|തിരുത്തിയിരിക്കുന്നു}} $4: "$5"',
	'notification-edit-talk-page' => '[[User talk:$3|താങ്കളുടെ സംവാദത്താൾ]] $2 {{GENDER:$1|തിരുത്തിയിരിക്കുന്നു}}. $4', # Fuzzy
	'notification-add-comment' => '"$5" സംവാദത്താളിൽ "[[$4|$3]]"-ൽ $2 {{GENDER:$1|അഭിപ്രായം ചേർത്തിരിക്കുന്നു}}',
	'notification-add-talkpage-topic' => '[[$4]] എന്ന താളിൽ "$3" എന്ന പുതിയ വിഷയം $2 {{GENDER:$1|ചേർത്തിരിക്കുന്നു}}',
	'notification-add-talkpage-topic-yours' => '$2 താങ്കൾക്ക് ഒരു സന്ദേശം {{GENDER:$1|അയച്ചിട്ടുണ്ട്}}: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => 'താങ്കളുടെ സംവാദത്താളിൽ,  "[[$4#$3|$3]]"  എന്നതിൽ $2 {{GENDER:$1|കുറിപ്പിട്ടിരിക്കുന്നു}}',
	'notification-new-user' => '{{SITENAME}} സംരംഭത്തിലേയ്ക്ക് സ്വാഗതം, $1!',
	'notification-new-user-content' => 'നമസ്കാരം $1, {{SITENAME}} സംരംഭത്തിലേയ്ക്ക് സ്വാഗതം.<br />
സംവാദം താളുകളിലെ ഏതൊരു കുറിപ്പിനും 4 റ്റിൽഡേകൾ (~~~~) ഉപയോഗിച്ച് ഒപ്പിടാൻ ഓർക്കുമല്ലോ.',
	'notification-reverted' => '[[$3]] എന്ന താളിലെ താങ്കളുടെ {{PLURAL:$5|1=edit|തിരുത്തലുകൾ}} $2 {{GENDER:$1|മുൻപ്രാപനം ചെയ്തിരിക്കുന്നു}} $4', # Fuzzy
	'notification-edit-email-subject' => '{{SITENAME}} അറിയിപ്പുകൾ: $3 എന്ന താൾ $2 തിരുത്തിയിരിക്കുന്നു',
	'notification-edit-email-body' => 'നമസ്കാരം $5,
{{SITENAME}} താളായ $3, $2 തിരുത്തിയിരിക്കുന്നു എന്ന് താങ്കളെ അറിയിക്കാനുള്ള അറിയിപ്പാണ് ഇത്.

$2 അദ്ദേഹം വരുത്തിയ മാറ്റങ്ങൾ ഈ കുറിപ്പിൽ സംഗ്രഹിച്ചിരിക്കുന്നു: $6

$2 വരുത്തിയ മാറ്റങ്ങൾ ഇനിക്കൊടുക്കുന്ന കണ്ണിയുപയോഗിച്ച് താങ്കൾക്ക് കാണാവുന്നതാണ്:
<$4>

ഈ താളിനെക്കുറിച്ചുള്ള ഇമെയിൽ പുതിയവിവരങ്ങൾക്ക് താങ്കൾ വരിചേർന്നിട്ടുള്ളതിനാലാണ് താങ്കൾക്ക് ഈ സന്ദേശം ലഭിക്കുന്നത്.

$7', # Fuzzy
	'notification-edit-talk-page-email-subject' => 'താങ്കളുടെ {{SITENAME}} സംവാദത്താൾ $2 തിരുത്തിയിരിക്കുന്നു', # Fuzzy
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
	'prefs-emailfrequency' => 'Berapa kerap saya menerima pemberitahuan melalui e-mel',
	'echo-pref-email-edit-user-talk' => 'Mengepos di halaman perbualan saya',
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
	'echo-specialpage' => 'Pemberitahuan saya',
	'echo-anon' => 'Untuk menerima pemberitahuan, sila [[Special:Userlogin/signup|buka akaun]] atau [[Special:UserLogin|log masuk]].',
	'echo-none' => 'Tiada pemberitahuan untuk anda.',
	'notification-edit' => '$2 {{GENDER:$1|menyunting}} [[$3]] $4: "$5"',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|mengepos}} di [[User talk:$3|halaman perbualan anda]].',
	'notification-add-comment' => '$2 {{GENDER:$1|mengulas}} tentang "[[$4|$3]]" pada halaman perbincangan "$5"',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|membuka}} topik baru "$3" di [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|menghantar}} pesanan kepada anda: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|mengulas}} tentang "[[$4#$3|$3]]" pada halaman perbincangan anda',
	'notification-new-user' => 'Selamat datang ke {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Selamat sejahtera diucapkan kepada $1, dan selamat datang ke {{SITENAME}}.<br />
Jangan lupa untuk menandatangani sebarang komen pada halaman perbincangan dengan serentet 4 tanda tilde (~~~~).',
	'notification-reverted' => 'Suntingan anda di [[$3]] telah {{GENDER:$1|dibalikkan}} oleh $2 $4', # Fuzzy
	'notification-edit-email-subject' => 'Pemberitahuan {{SITENAME}}: $3 telah disunting oleh $2',
	'notification-edit-email-body' => 'Selamat sejahtera $5,

Sila ambil maklum bahawa $2 telah {{GENDER:$2|menyunting}} halaman $3 di {{SITENAME}}.

$2 {{GENDER:$2|merumuskan}} suntingan{{GENDER:$2|nya}} dengan ulasan yang berikut: $6

Anda boleh melihat suntingan yang {{GENDER:$2|dibuat}} oleh $2 dengan mengikuti pautan ini:
<$4>

Anda menerima pesanan ini kerana anda telah melanggan untuk menerima kemas kini perubahan pada halaman ini melalui e-mel.

$7',
	'notification-edit-talk-page-email-subject' => 'Anda mendapat pesanan baru di halaman perbualan',
	'notification-edit-talk-page-email-body' => 'Pengguna {{SITENAME}}, $2 telah {{GENDER:$2|mengeposkan}} sesuatu di halaman perbincangan anda:

$4

Baca selanjutnya:

$3

$5',
	'notification-edit-talk-page-email-batch-body' => '$2 {{GENDER:$2|mengepos}} pada halaman perbualan anda',
	'notification-reverted-email-subject' => 'Suntingan anda di $3 telah {{GENDER:$2|dibalikkan}} oleh $2',
	'notification-reverted-email-body' => 'Suntingan anda di $3 telah {{GENDER:$2|dibalikkan}} oleh $2.

$6

Baca selanjutnya:

$4

$7',
	'notification-reverted-email-batch-body' => 'Suntingan anda di $3 telah dibalikkan oleh $2',
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
	'prefs-emailfrequency' => 'Hoe vaak ik melding via e-mail wil ontvangen',
	'echo-pref-email-edit-user-talk' => 'Een bericht op mijn overlegpagina plaatst',
	'echo-pref-email-reverted' => 'Een bewerking van mij terugdraait',
	'echo-pref-email-frequency-never' => 'Stuur mij geen meldingen via e-mail',
	'echo-pref-email-frequency-immediately' => 'Individuele meldingen als ze binnenkomen',
	'echo-pref-email-frequency-daily' => 'Een dagelijkse samenvatting van meldingen',
	'echo-pref-email-frequency-weekly' => 'Een wekelijkse samenvatting van meldingen',
	'echo-pref-notify-hide-link' => 'Verberg de verwijzing en badge voor melding in mijn werkbalk',
	'echo-no-agent' => '[Niemand]',
	'echo-no-title' => '[Geen pagina]',
	'echo-error-no-formatter' => 'Er is geen opmaak ingesteld voor de melding',
	'notifications' => 'Meldingen',
	'echo-specialpage' => 'Mijn meldingen',
	'echo-anon' => '[[Special:Userlogin/signup|Maak een gebruiker aan]] of [[Special:UserLogin|meld u aan]] als u meldingen wilt ontvangen.',
	'echo-none' => 'U hebt geen meldingen.',
	'notification-edit' => '$2 {{GENDER:$1|heeft}} [[$3]] bewerkt $4: "$5"',
	'notification-edit-talk-page' => '$2 heeft een bericht {{GENDER:$1|achtergelaten}} op uw [[User talk:$3|overlegpagina]].',
	'notification-add-comment' => '$2 {{GENDER:$1|heeft}} gereageerd op "[[$4|$3]]" op de overlegpagina "$5"',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|heeft}} een nieuw onderwerp "$3" geplaatst op [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|heeft}} u een bericht gezonden: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|heeft}} gereageerd op "[[$4#$3|$3]]" op uw overlegpagina',
	'notification-new-user' => 'Welkom op {{SITENAME}}, $1!',
	'notification-new-user-content' => "Hallo $1 en welkom op {{SITENAME}}.<br />
Vergeet niet om opmerkingen over overlegpagina's te ondertekenen met 4 tildes (~~~~).",
	'notification-reverted' => 'Uw {{PLURAL:$5|bewerking|bewerkingen}} aan [[$3]] {{PLURAL:$5|is|zijn}} {{GENDER:$1|teruggedraaid}} door $2 $4',
	'notification-edit-email-subject' => 'Melding van {{SITENAME}}: $3 is bewerkt door $2',
	'notification-edit-email-body' => 'Hallo $5,

Dit is een melding om u te laten weten dat $2 de pagina $3 op {{SITENAME}} heeft bewerkt.

$2 heeft {{GENDER:$2|zijn|haar}} wijzigingen als volgt samengevat: $6

U kunt de wijzigingen die {{GENDER:$2|hij|zij}} heeft gemaakt bekijken via de volgende verwijzing:
<$4>

U ontvangt dit bericht omdat u bent geabonneerd op meldingen via e-mail voor deze pagina.

$7',
	'notification-edit-talk-page-email-subject' => 'U hebt een nieuw bericht op uw overlegpagina',
	'notification-edit-talk-page-email-body' => '$2 heeft een bericht {{GENDER:$2|achtergelaten}} op uw overlegpagina op {{SITENAME}}

$4

Meer lezen:

$3

$5',
	'notification-edit-talk-page-email-batch-body' => '$2 {{GENDER:$2|heeft}} een bericht achtergelaten op uw overlegpagina',
	'notification-reverted-email-subject' => 'Uw bewerking aan $3 is {{GENDER:$2|teruggedraaid}} door $2',
	'notification-reverted-email-body' => 'Uw bewerking aan $3 is {{GENDER:$2|teruggedraaid}} door $2.

$6

Meer lezen:

$4

$7',
	'notification-reverted-email-batch-body' => 'Uw bewerking aan $3 is {{GENDER:$2|teruggedraaid}} door $2',
	'echo-email-subject-default' => 'Nieuwe melding op {{SITENAME}}',
	'echo-email-body-default' => 'U hebt een nieuwe melding op {{SITENAME}}:

$1',
	'echo-email-footer-default' => '$2

Volg de volgende verwijzing om uw e-mailvoorkeuren te wijzigen of om u uit te schrijven:
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

/** Polish (polski)
 * @author Ankry
 * @author Base
 * @author BeginaFelicysym
 * @author Matma Rex
 * @author Odie2
 * @author Przemub
 */
$messages['pl'] = array(
	'echo-desc' => 'System powiadomień',
	'prefs-echo' => 'Powiadomienia',
	'prefs-displaynotifications' => 'Opcje wyświetlania',
	'prefs-emailsubscriptions' => 'Powiadom mnie przez e-mail, gdy ktoś',
	'prefs-emailfrequency' => 'W jakiej formie chcę otrzymywać powiadomienia e-mailem',
	'echo-pref-email-edit-user-talk' => 'napisze na mojej stronie dyskusji',
	'echo-pref-email-reverted' => 'wycofa moją edycję',
	'echo-pref-email-frequency-never' => 'Nie wysyłaj powiadomień e-mailem',
	'echo-pref-email-frequency-immediately' => 'Każde powiadomienie osobno',
	'echo-pref-email-frequency-daily' => 'Dzienne podsumowanie',
	'echo-pref-email-frequency-weekly' => 'Tygodniowe podsumowanie',
	'echo-no-agent' => '[Nikt]',
	'echo-no-title' => '[Brak strony]',
	'notifications' => 'Powiadomienia',
	'echo-specialpage' => 'Moje powiadomienia',
	'echo-anon' => 'Aby otrzymywać powiadomienia [[Special:Userlogin/signup|utwórz konto]] lub [[Special:UserLogin|zaloguj się]].',
	'echo-none' => 'Nie masz żadnych powiadomień.',
	'notification-edit' => '$2 {{GENDER:$1|edytował|edytowała}} [[$3]] $4', # Fuzzy
	'notification-edit-talk-page' => '$2 {{GENDER:$1|edytował|edytowała}} [[User talk:$3|twoją stronę dyskusji]]. $4', # Fuzzy
	'notification-add-comment' => '$2 {{GENDER:$1|skomentował|skomentowała}} „[[$4|$3]]” na stronie dyskusji „$5”',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|otworzył|otworzyła}} nowy temat "$3" na [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|wysłał|wysłała}} Ci wiadomość: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|dodał|dodała}} komentarz do "[[$4#$3|$3]]" na twojej stronie dyskusji',
	'notification-new-user' => 'Witaj na stronach {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Cześć $1 i witaj na stronach {{SITENAME}}.<br />
Nie zapomnij podpisywać komentarzy na stronach dyskusji czterema tyldami (~~~~).',
	'notification-edit-email-subject' => 'Wiadomość {{GRAMMAR:D.lp|{{SITENAME}}}}: strona $3 była edytowane przez $2',
	'notification-edit-email-body' => 'Witaj $5,
Jest to powiadomienie, że $2 zmienił stronę $3 witryny {{SITENAME}}.

Możesz przejrzeć wykonane poprawki $2 przechodząc przez łącze:
<$4>

Otrzymujsz tą wiadomość ponieważ subskrybujesz powiadomienia pocztą elektroniczną o zmianach na tej stronie.

Dziękujemy za korzystanie z {{SITENAME}}
System powiadomień {{SITENAME}}', # Fuzzy
	'notification-edit-talk-page-email-subject' => 'Twoja strona dyskusji na {{GRAMMAR:MS.lp|{{SITENAME}}}} została zmieniona przez $2', # Fuzzy
	'notification-edit-talk-page-email-body' => 'Witaj $4,
To jest powiadomienie ze strony {{SITENAME}}. $2 edytował Twoją stronę dyskusji, czyli miejsce, gdzie inni użytkownicy mogą zostawiać Ci wiadomości.

Możesz zobaczyć zmiany dzięki temu linkowi:
<$3>

Dziękujemy za używanie {{SITENAME}}
System powiadomień {{SITENAME}}', # Fuzzy
	'echo-notification-count' => '$1+',
	'echo-email-subject-default' => 'Nowe powiadomienie na {{SITENAME}}',
	'echo-email-body-default' => 'Masz nowe powiadomienie na {{SITENAME}}:

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
	'echo-email-batch-category-header-edit-user-talk' => '$1 {{PLURAL:$1|wiadomość|wiadomości}} na stronie dyskusji',
	'echo-email-batch-category-header-edit-revert' => '$1 {{PLURAL:$1|wycofanie|wycofania|wycofań}} edycji',
	'echo-email-batch-category-header-other' => '$1 {{PLURAL:$1|inne|inne|innych}}',
);

/** Piedmontese (Piemontèis)
 * @author Borichèt
 * @author Dragonòt
 */
$messages['pms'] = array(
	'echo-desc' => 'Sistem ëd notìfiche',
	'prefs-echo' => 'Notìfiche',
	'prefs-displaynotifications' => 'Opsion ëd visualisassion',
	'prefs-emailsubscriptions' => 'Avis për corel quand quaidun',
	'prefs-emailfrequency' => 'Vàire soens i arsèivo notìfiche për corel',
	'echo-pref-email-edit-user-talk' => 'Scriv dzora mia pagina ëd discussion',
	'echo-pref-email-reverted' => 'Buta andré mia modìfica',
	'echo-pref-email-frequency-never' => 'Mandme pa gnun-e notìfiche ëd corel',
	'echo-pref-email-frequency-immediately' => 'Notìfiche andividuaj com che a rivo',
	'echo-pref-email-frequency-daily' => 'Un resumé giornalier dle notìfiche',
	'echo-pref-email-frequency-weekly' => 'Un resumé mensil dle notìfiche',
	'echo-pref-notify-hide-link' => "Stërma ël colegament e tessera për notìfiche an mia bara dj'utiss",
	'echo-no-agent' => '[Gnun]',
	'echo-no-title' => '[Gnun-e pagine]',
	'echo-error-no-formatter' => 'Pa gnun-e formatassion definìe për notìfiche',
	'notifications' => 'Notìfiche',
	'echo-specialpage' => 'Mie notìfiche',
	'echo-anon' => "Për arseive dle notìfiche, [[Special:Userlogin/signup|ch'a crea un cont]] o [[Special:UserLogin|ch'a intra ant ël sistema]].",
	'echo-none' => "It l'has pa gnun-e notìfiche.",
	'notification-edit' => '$2 {{GENDER:$1|a l\'ha modificà}} [[$3]] $4: "$5"',
	'notification-edit-talk-page' => "$2 {{GENDER:$1|a l'ha modificà}} dzora soa [[User talk:$3|pàgina ëd ciaciarade]].",
	'notification-add-comment' => "$2 {{GENDER:$1|a l'ha comentà}} a propòsit ëd  «[[$4|$3]]» dzora a la pàgina ëd discussion ëd «$5»",
	'notification-add-talkpage-topic' => "$2 {{GENDER:$1|a l'ha publicà}} n'argoment neuv «$3» dzora a [[$4]]",
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|a l\'ha manda}}te un mëssagi: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => "$2 {{GENDER:$1|a l'ha comentà}} a propòsit ëd «[[$4#$3|$3]]» dzora a soa pàgina ëd ciaciarade",
	'notification-new-user' => 'Bin-ëvnù an {{SITENAME}}, $1!',
	'notification-new-user-content' => "Cerea $1, e bin-ëvnù an {{SITENAME}}.<br />
Për piasì, ch'as visa ëd firmé tut coment an sle pàgine ëd discussion con 4 tilde (~~~~).",
	'notification-reverted' => "{{PLURAL:$5|Toa modìfica dzora [[$3]] a l'é stàita|Toe modìfiche dzora [[$3]] a son stàite}} {{GENDER:$1|butà andré}} da $2 $4",
	'notification-edit-email-subject' => "Notìfica ëd {{SITENAME}}: $3 a l'é stàita modificà da $2",
	'notification-edit-email-body' => "Cerea $5,
Costa a l'é na notìfica për feje savèj che $2 {{GENDER:$2|a l'ha modificà}} la pàgina $3 ëd {{SITENAME}}.

$2 {{GENDER:$2|a l'ha riassumù}} {{GENDER:$2|sò}} cambi con sto coment: $6

A peul vëdde le modìfiche che $2 {{GENDER:$2|a l'ha fàit}} andasend dré a la liura:
<$4>

A arsèiv ës mëssagi përchè a l'ha sot-ëscrivù ij mësssagi ëd modìfica për le modìfiche a costa pàgina.

$7",
	'notification-edit-talk-page-email-subject' => "It l'has un neuv mëssagi an sla pagina ëd discussion",
	'notification-edit-talk-page-email-body' => "L'utent $2 ëd {{SITENAME}} a l'ha {{GENDER:$2|scrivù}} dzora toa pagina ëd discussion:

$4

Mosta ëd pi:

$3

$5",
	'notification-edit-talk-page-email-batch-body' => "$2 a l'ha {{GENDER:$2|scrivù}} dzora toa pagina ëd discussion",
	'notification-reverted-email-subject' => "Toa modìfica dzora $3 a l'é staita {{GENDER:$2|anulà}} da $2",
	'notification-reverted-email-body' => "Toa modìfica dzora $3 a l'é stàita {{GENDER:$2|anulà}} da $2.

$6

Mosta ëd pi:

$4

$7",
	'notification-reverted-email-batch-body' => "Toa modìfica dzora $3 a l'é stàita anulà da $2",
	'echo-email-subject-default' => 'Notìfiche neuve a {{SITENAME}}',
	'echo-email-body-default' => "It l'has na notìfica neuva a {{SITENAME}}:

$1",
	'echo-email-footer-default' => "$2

Për controlé che corel i l'oma mandate, vìsita:
{{canonicalurl:{{#special:Preferences}}#mw-prefsection-echo}}

$1",
	'echo-link-new' => '$1 {{PLURAL:$1|notifìca neuva|notifìche neuve}}',
	'echo-link' => 'Notìfiche',
	'echo-overlay-link' => 'Tute le notìfiche',
	'echo-overlay-title' => 'Mie notìfiche',
	'echo-overlay-title-overflow' => 'Mie notìfiche (mostrant $1 ëd $2 pa lesùe)',
	'echo-date-today' => 'Ancheuj',
	'echo-date-yesterday' => 'Ier',
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
	'echo-email-batch-category-header-edit-user-talk' => '$1 {{PLURAL:$1|mëssagi}} ant la pagina ëd discussion',
	'echo-email-batch-category-header-edit-revert' => '$1 {{PLURAL:$1|Modifica|Modifiche}} anulà',
	'echo-email-batch-category-header-other' => '$1 {{PLURAL:$1|Àutr|Àutri}}',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
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
	'echo-pref-email-edit-user-talk' => 'Mesaje pe pagina mea de discuții',
	'echo-pref-email-reverted' => 'Anulează modificarea mea',
	'echo-pref-email-frequency-daily' => 'Un rezumat zilnic al notificărilor',
	'echo-pref-email-frequency-weekly' => 'Un rezumat săptămânal al notificărilor',
	'echo-no-agent' => '[Nimeni]',
	'echo-no-title' => '[Nicio pagină]',
	'notifications' => 'Notificări',
	'echo-specialpage' => 'Notificările mele',
	'echo-none' => 'Nu aveți nicio notificare.',
	'notification-edit' => '$2 {{GENDER:$1|a modificat}} [[$3]] $4: „$5”',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|a publicat}} pe [[User talk:$3|pagina dumneavoastră de discuții]].',
	'notification-add-comment' => '$2 {{GENDER:$1|a comentat}} subiectul „[[$4|$3]]” pe pagina de discuții „$5”',
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
	'prefs-echo' => 'Notificaziune',
	'echo-no-agent' => '[Nisciune]',
	'echo-no-title' => '[Nisciune titole]', # Fuzzy
	'notifications' => 'Notificaziune',
	'echo-specialpage' => 'Notificaziune mie',
	'notification-edit' => '$2 {{GENDER:$1|cangiate}} [[$3]] $4',
	'echo-email-body-default' => "Tu è 'na notifica nove sus a {{SITENAME}}:

$1",
	'echo-link' => 'Notificaziune mie',
	'echo-overlay-link' => 'Tutte le notificaziune ...',
);

/** Russian (русский)
 * @author Base
 * @author DCamer
 * @author David1010
 * @author KPu3uC B Poccuu
 * @author Kalan
 */
$messages['ru'] = array(
	'echo-desc' => 'Система уведомлений',
	'prefs-echo' => 'Уведомления',
	'prefs-displaynotifications' => 'Настройки отображения',
	'prefs-emailsubscriptions' => 'Сообщите мне по электронной почте, когда кто-то',
	'prefs-emailfrequency' => 'Как часто получать уведомления по электронной почте',
	'echo-pref-email-edit-user-talk' => 'Пишет на моей странице обсуждения',
	'echo-pref-email-reverted' => 'Отменяет мои правки',
	'echo-pref-email-frequency-never' => 'Не присылайте мне уведомления по электронной почте',
	'echo-pref-email-frequency-immediately' => 'Отдельные уведомления как они приходят',
	'echo-pref-email-frequency-daily' => 'Ежедневная сводка уведомлений',
	'echo-pref-email-frequency-weekly' => 'Еженедельная сводка уведомлений',
	'echo-pref-notify-hide-link' => 'Скрыть ссылку и значок для уведомлений в моей панели инструментов',
	'echo-no-agent' => '[Никто]',
	'echo-no-title' => '[Нет страницы]',
	'echo-error-no-formatter' => 'Форматирование не определено для уведомления',
	'notifications' => 'Уведомления',
	'echo-specialpage' => 'Мои уведомления',
	'echo-anon' => 'Чтобы получать уведомления, [[Special:Userlogin/signup|создайте учётную запись]] или [[Special:UserLogin|представьтесь]].',
	'echo-none' => 'Вы не получали уведомлений.',
	'notification-edit' => '$2 {{GENDER:$1|отредактировал|отредактировала}} [[$3]] $4', # Fuzzy
	'notification-edit-talk-page' => '$2 {{GENDER:$1|отредактировал|отредактировала}} [[User talk:$3|вашу страницу обсуждения]]. $4', # Fuzzy
	'notification-add-comment' => '$2 {{GENDER:$1|прокомментировал|прокомментировала}} тему «[[$4|$3]]» на странице «$5»',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|добавил|добавила}} тему «$3» на странице «[[$4]]»',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|отправил|отправила}} вам сообщение: «[[$4#$3|$3]]»',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|прокомментировал|прокомментировала}} тему «[[$4#$3|$3]]» на вашей странице обсуждения',
	'notification-new-user' => 'Добро пожаловать в {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Привет $1, и добро пожаловать в {{SITENAME}}.<br />
Пожалуйста, не забывайте подписывать любые комментарии на страницах обсуждения 4 тильдами (~~~~).',
	'notification-reverted' => '{{PLURAL:$5|Ваша правка на [[$3]] была отменена|Ваши правки на [[$3]] были отменены}} $2 $4', # Fuzzy
	'notification-edit-email-subject' => 'Уведомление {{SITENAME}}: $3 отредактировал $2',
	'notification-edit-email-body' => 'Здравствуйте, $5, это уведомление о том, что $2 {{GENDER:$2|отредактировал|отредактировала}} страницу проекта {{SITENAME}} $3.

$2 {{GENDER:$2|описал|описала}} причину своей правки: $6

Вы можете увидеть правку, которую $2 {{GENDER:$2|совершил|совершила}}, по следующей ссылке:
<$4>

Вы получили это сообщение, потому что вы подписаны на уведомления об изменениях на этой странице.

$7',
	'notification-edit-talk-page-email-subject' => 'Вы получили новое сообщение',
	'notification-edit-talk-page-email-body' => 'Участник проекта {{SITENAME}} $2 {{GENDER:$2|оставил|оставила}} сообщение на вашей странице обсуждения:

$4

Узнать больше:

$3

$5',
	'notification-edit-talk-page-email-batch-body' => '$2 {{GENDER:$2|оставил|оставила}} сообщение на вашей странице обсуждения',
	'echo-email-subject-default' => 'Новые уведомления на {{SITENAME}}',
	'echo-link' => 'Уведомления',
	'echo-overlay-link' => 'Все уведомления',
	'echo-overlay-title' => 'Мои уведомления',
);

/** Sinhala (සිංහල)
 * @author පසිඳු කාවින්ද
 */
$messages['si'] = array(
	'echo-desc' => 'නිවේදන පද්ධතිය',
	'prefs-echo' => 'නිවේදන',
	'prefs-displaynotifications' => 'විකල්ප පෙන්වන්න',
	'echo-pref-email-edit-user-talk' => 'මගේ කතාබහ පිටුවේ හසුන්',
	'echo-pref-email-reverted' => 'මගේ සංස්කරණය ප්‍රතිවර්තනය',
	'echo-pref-email-frequency-daily' => 'නිවේදනවල දෛනික සාරාංශයක්',
	'echo-pref-email-frequency-weekly' => 'නිවේදනවල සතිපතා සාරාංශයක්',
	'echo-no-agent' => '[කිසිවෙකු නැත]',
	'echo-no-title' => '[පිටුවක් නොමැත]',
	'notifications' => 'නිවේදන',
	'echo-specialpage' => 'මගේ නිවේදන',
	'echo-none' => 'ඔබට නිවේදන කිසිවක් නොමැත.',
	'notification-edit' => '$2 {{GENDER:$1|සංස්කරණය කරා}} [[$3]] $4: "$5"',
	'notification-new-user' => '{{SITENAME}} වෙත පිළිගනිමු, $1!',
	'notification-edit-talk-page-email-subject' => 'ඔබ හට නව කතාබහ පිටු පණිවුඩයක් ඇත',
	'echo-email-subject-default' => '{{SITENAME}} හී නව නිවේදනයක්',
	'echo-link-new' => 'නව {{PLURAL:$1|නිවේදන|නිවේදන}} $1', # Fuzzy
	'echo-link' => 'මගේ නිවේදන', # Fuzzy
	'echo-overlay-link' => 'සියලුම නිවේදන...', # Fuzzy
	'echo-overlay-title' => 'මගේ නිවේදන',
	'echo-overlay-title-overflow' => 'මගේ නිවේදන (නොකියවූ ඒවා $1 න් $2 පෙන්වමින්)',
	'echo-date-today' => 'අද',
	'echo-date-yesterday' => 'පෙරදින',
	'echo-email-batch-category-header-edit-user-talk' => 'කතාබහ පිටු {{PLURAL:$1|පණිවුඩ|පණිවුඩ}} $1', # Fuzzy
	'echo-email-batch-category-header-edit-revert' => 'සංස්කරණ {{PLURAL:$1|ප්‍රතිවර්තන|ප්‍රතිවර්තන}} $1', # Fuzzy
	'echo-email-batch-category-header-other' => '{{PLURAL:$1|වෙනත්|වෙනත්}} $1', # Fuzzy
);

/** Serbian (Cyrillic script) (српски (ћирилица)‎)
 * @author Rancher
 * @author Михајло Анђелковић
 */
$messages['sr-ec'] = array(
	'prefs-echo' => 'Обавештења',
	'echo-no-agent' => '[Нико]',
	'echo-no-title' => '[Без наслова]', # Fuzzy
	'notifications' => 'Обавештења',
	'echo-specialpage' => 'Моја обавештења',
	'echo-none' => 'У последње време нисте примили ниједно обавештење.',
	'notification-edit' => '$2 {{GENDER:$1|је изменио|је изменила|је изменио}} [[$3]] $4', # Fuzzy
	'notification-edit-talk-page' => '$2 {{GENDER:$1|је изменио|је изменила|је изменио}} [[User talk:$3|вашу страницу за разговор]]. $4',
	'notification-add-comment' => '$2 {{GENDER:$1|је прокоментарисао|је прокоментарисала|је прокоментарисао}} „[[$4|$3]]“ на страници за разговор „$5“',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|је поставио|је поставила|је поставио}} нову тему „$3“ на [[$4]]',
	'echo-link' => 'Моја обавештења', # Fuzzy
	'echo-overlay-link' => 'Сва обавештења…', # Fuzzy
	'echo-overlay-title' => 'Моја обавештења',
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
	'prefs-emailfrequency' => 'Hur ofta jag får aviseringar via e-post',
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
	'notification-edit' => '$2 {{GENDER:$1|redigerade}} [[$3]] $4: "$5"',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|postade}} på din [[User talk:$3|diskussionssida]].',
	'notification-add-comment' => '$2 {{GENDER:$1|kommenterade}} "[[$4|$3]]" på diskussionssidan för "$5"',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|postade}} ett nytt ämne "$3" på [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|skickade}} ett meddelande till dig: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|kommenterade}} på "[[$4#$3|$3]]" på din diskussionssida',
	'notification-new-user' => 'Välkommen till {{SITENAME}},  $1!',
	'notification-new-user-content' => 'Hej $1, och välkommen till {{SITENAME}}.<br />
Kom ihåg att underteckna kommentarer på diskussionssidor med 4 tilde (~~~~).',
	'notification-reverted' => '{{PLURAL:$5|Din redigering|Dina redigeringar}} på [[$3]] har {{GENDER:$1|återställts}} av $2 $4',
	'notification-edit-email-subject' => '{{SITENAME}} meddelande: $3 har redigerats av $2',
	'notification-edit-talk-page-email-subject' => 'Du har ett nytt meddelande på diskussionssidan',
	'notification-edit-talk-page-email-batch-body' => '$2 {{GENDER:$2|postade}} på din diskussionssida',
	'notification-reverted-email-subject' => 'Din redigering på $3 har {{GENDER:$2|återställts}} av $2',
	'notification-reverted-email-body' => 'Din redigering på $3 har {{GENDER:$2|återställts}} av $2.

$6

Visa mer:

$4

$7',
	'notification-reverted-email-batch-body' => 'Din redigering på $3 återställdes av $2',
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
	'echo-no-title' => '[தலைப்பு இல்லை]', # Fuzzy
	'notifications' => 'அறிவிப்புகள்',
	'echo-specialpage' => 'என் அறிவிப்புகள்',
	'echo-anon' => 'அறிவிப்புகளைப் பெறுவதற்கு [[Special:Userlogin/signup|ஒரு கணக்கை உருவாக்குங்கள்]] அல்லது [[Special:UserLogin|உள்நுழையுங்கள்]].',
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
	'echo-none' => 'Hindi ka nakakatanggap ng anumang mga pagpapabatid nitong mga uling panahon!',
	'notification-edit' => '{{GENDER:$1|Binago}} ni $2 ang [[$3]] $4', # Fuzzy
	'notification-edit-talk-page' => '{{GENDER:$1|Binago}} ni $2 ang [[User talk:$3|pahina mo ng usapan]]. $4',
	'notification-add-comment' => '{{GENDER:$1|Pinuna}} ni $2 ang hinggil sa "[[$4|$3]]" na nasa ibabaw ng pahina ng usapan ng "$5"',
	'notification-add-talkpage-topic' => '{{GENDER:$1|Nagpaskil}} si $2 ng isang bagong paksa na "$3" na nasa ibabaw ng [[$4]]',
	'notification-add-talkpage-topic-yours' => '{{GENDER:$1|Nagpasa}} sa iyo si $2 ng isang mensahe: [[$4#$3|$3]]',
	'notification-add-comment-yours' => '{{GENDER:$1|Pinuna}} ni $2 ang hinggil sa "[[$4#$3|$3]]" na nasa ibabaw ng iyong pahina ng usapan',
	'notification-new-user' => 'Maligayang Pagdating sa {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Hi $1, at maligayang pagdating sa {{SITENAME}}.<br />
Manyaring tandaan na lumagda ng kahit na anong komento sa mga pahina ng usapan na may 4 na bantas (~~~~).',
	'notification-edit-email-subject' => 'Pagpapabatid ng {{SITENAME}} : Binago ni $2 ang $3',
	'notification-edit-email-body' => 'Kumusta ka $5,
Isa itong pagpapabatid upang ipaalam sa iyo na binago ni $2 ang pahinang $3 ng {{SITENAME}}.

Makikita mo ang mga pagbabagong ginawa ni $2 sa pamamagitan ng pagsunod sa kawing na ito:
<$4>

Natatanggap mo ang mensaheng ito dahil nagpasipi ka ng mga pagsasapanahon sa pamamagitan ng e-liham para sa mga pagbabago sa pahinang ito.

Maraming salamat sa paggamit ng {{SITENAME}}
Ang sistema ng pagpapabatid ng {{SITENAME}}', # Fuzzy
	'notification-edit-talk-page-email-subject' => 'Binago ni $2 ang pahina mong pang-usapan na nasa {{SITENAME}}',
	'notification-edit-talk-page-email-body' => 'Kumusta ka $4,
Isa itong pagpapabatid upang maipalam sa iyo na binago ni $2 ang iyong pahina ng usapan na nasa {{SITENAME}}.

Doon sa {{SITENAME}}, ang pahina mo ng usapan ay ang kung saan maaaring makapag-iwan ng mga mensaheng para sa iyo ang iba pang mga tagagamit.

Makikita mo ang mga pagbabagong ginawa ni $2 dito sa kawing na ito:
<$3>

Salamat sa paggamit ng {{SITENAME}}
Ang sistema ng pagpapabatid ng {{SITENAME}}', # Fuzzy
	'echo-email-subject-default' => 'Bagong pagpapabatid sa {{SITENAME}}',
	'echo-email-body-default' => 'Mayroon kang isang bagong pagpapabatid doon sa {{SITENAME}}:

$1',
	'echo-link-new' => '$1 bagong {{PLURAL:$1|pagpapabatid|mga pagpapabatid}}',
	'echo-link' => 'Mga pagpapabatid ko', # Fuzzy
	'echo-overlay-link' => 'Lahat ng mga pagpapabatid...', # Fuzzy
	'echo-overlay-title' => 'Mga pagpapabatid ko',
);

/** Ukrainian (українська)
 * @author Base
 * @author Ата
 */
$messages['uk'] = array(
	'echo-desc' => 'Система сповіщень',
	'prefs-echo' => 'Сповіщення',
	'prefs-displaynotifications' => 'Опції відображення',
	'prefs-emailsubscriptions' => 'Сповіщати мене через електронну пошту, коли хтось',
	'prefs-emailfrequency' => 'Як часто я отримуватиму сповіщення електронною поштою',
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
	'echo-specialpage' => 'Мої сповіщення',
	'echo-anon' => 'Для отримання сповіщень, [[Special:Userlogin/signup|створіть обліковий запис]] або [[Special:UserLogin|увійдіть]].',
	'echo-none' => 'У Вас немає сповіщень.',
	'notification-edit' => '$2 {{GENDER:$1|відредагував|відредагувала}} [[$3]] $4: «$5»',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|написав|написала}} на Вашій [[User talk:$3|сторінці обговорення]].',
	'notification-add-comment' => '$2 {{GENDER:$1|прокоментував|прокоментувала}} тему «[[$4|$3]]» на сторінці «$5»',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|додав|додала}} тему «$3» на сторінці «[[$4]]»',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|надіслав|надіслала}} Вам повідомлення: «[[$4#$3|$3]]»',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|прокоментував|прокоментувала}} тему «[[$4#$3|$3]]» на Вашій сторінці обговорення',
	'notification-new-user' => 'Ласкаво просимо до {{GRAMMAR:accusative|{{SITENAME}}}}, $1!',
	'notification-new-user-content' => 'Привіт $1, і ласкаво просимо до проекту {{SITENAME}}!<br />
Будь ласка, не забувайте підписувати усі коментарі на сторінках обговорень з допомогою 4 тильд (~~~~).',
	'notification-reverted' => '{{PLURAL:$5|Ваше|Ваші}} редагування сторінки [[$3]] було {{GENDER:$1|відкинуто}} користувачем $2 $4',
	'notification-edit-email-subject' => 'Сповіщення {{SITENAME}}: $3 {{GENDER:$2|відредагував|відредагувала}} $2',
	'notification-edit-email-body' => 'Привіт $5,
Це сповіщення Ви отримали, бо $2 {{GENDER:$2|відрелагував|відредагувала}} сторінку {{SITENAME}} $3.

$2 {{GENDER:$2|підсумував|підсумувала}} свої зміни таким коментарем: $6

Ви можете переглянути зроблені $2 зміни за цим посиланням:
<$4>

Ви отримали це повідомлення, оскільки підписані на сповіщення електронною поштою про зміни на цій сторінці.

$7',
	'notification-edit-talk-page-email-subject' => 'У Вас нове повідомлення на сторінці обговорення',
	'notification-edit-talk-page-email-body' => 'Користувач {{SITENAME}} $2 {{GENDER:$2|написав|написала}} на Вашій сторінці обговорення:

$4

Детальніше:

$3

$5',
	'notification-edit-talk-page-email-batch-body' => '$2 {{GENDER:$2|написав|написала}} на Вашій сторінці обговорення',
	'notification-reverted-email-subject' => 'Ваше редагування на сторінці $3 було {{GENDER:$2|відкинуте}} $2',
	'notification-reverted-email-body' => 'Ваше редагування на сторінці $3 було {{GENDER:$2|відкинуте}} $2

$6

Детальніше:

$4

$7',
	'notification-reverted-email-batch-body' => 'Ваше редагування на сторінці $3 було {{GENDER:$2|відкинуте}} $2',
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
	'prefs-emailfrequency' => 'Mức thường xuyên gửi thông báo qua thư điện tử',
	'echo-pref-email-edit-user-talk' => 'Nhắn tin vào trang thảo luận của tôi',
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
	'echo-specialpage' => 'Thông báo cho tôi',
	'echo-anon' => 'Để nhận thông báo, hãy [[Special:Userlogin/signup|mở tài khoản]] hoặc [[Special:UserLogin|đăng nhập]].',
	'echo-none' => 'Bạn không có thông báo.',
	'notification-edit' => '{{GENDER:$1}}$2 đã sửa đổi [[$3]] $4: “$5”',
	'notification-edit-talk-page' => '{{GENDER:$1}}$2 đã nhắn tin trên [[User talk:$3|trang thảo luận của bạn]].',
	'notification-add-comment' => '{{GENDER:$1}}$2 đã bình luận về “[[$4|$3]]” tại trang thảo luận “$5”',
	'notification-add-talkpage-topic' => '{{GENDER:$1}}$2 đã đăng chủ đề mới “$3” tại [[$4]]',
	'notification-add-talkpage-topic-yours' => '{{GENDER:$1}}$2 đã nhắn tin mới cho bạn: “[[$4#$3|$3]]”',
	'notification-add-comment-yours' => '{{GENDER:$1}}$2 đã bình luận về “[[$4#$3|$3]]” tại trang thảo luận của bạn',
	'notification-new-user' => 'Chào mừng $1 đã đến với {{SITENAME}}!',
	'notification-new-user-content' => 'Chào mừng $1 đã đến với {{SITENAME}}.<br />
Hãy nhớ ký tên vào các lời bình luận tại trang thảo luận bằng 4 dấu ngã (~~~~).',
	'notification-reverted' => '{{GENDER:$1}}$2 đã lùi lại sửa đổi của bạn tại [[$3]] $4', # Fuzzy
	'notification-edit-email-subject' => 'Thông báo từ {{SITENAME}}: $3 đã được sửa bởi $2',
	'notification-edit-email-body' => 'Xin chào $5,
Xin thông báo với bạn rằng $2 đã sửa đổi trang $3 tại {{SITENAME}}.

$2 tóm lược các thay đổi của họ như thế này: $6

Bạn có thể xem các thay đổi của $2 bằng cách theo dõi liên kết này:
<$4>

Bạn nhận được thư điện tử này vì bạn đã xin theo dõi các thay đổi tại trang này.

$7',
	'notification-edit-talk-page-email-subject' => 'Trang thảo luận của bạn có tin nhắn mới',
	'notification-edit-talk-page-email-body' => 'Người dùng $2 tại {{SITENAME}} đã nhắn tin trên trang thảo luận của bạn:

$4

Xem thêm:

$3

$5',
	'notification-edit-talk-page-email-batch-body' => '$2 đã nhắn tin vào trang thảo luận của bạn',
	'notification-reverted-email-subject' => '$2 đã lùi lại sửa đổi của bạn tại $3',
	'notification-reverted-email-body' => '$2 đã lùi lại sửa đổi của bạn tại $3.

$6

Xem thêm:

$4

$7',
	'notification-reverted-email-batch-body' => '$2 đã lùi sửa đổi của bạn tại $3',
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
	'echo-email-batch-category-header-other' => '$1 khác',
);

/** Simplified Chinese (中文（简体）‎)
 * @author Anakmalaysia
 * @author Liangent
 * @author Shirayuki
 */
$messages['zh-hans'] = array(
	'echo-desc' => '通知系统',
	'prefs-echo' => '通知',
	'prefs-displaynotifications' => '显示选项',
	'prefs-emailsubscriptions' => '在以下情况使用电子邮件通知我',
	'prefs-emailfrequency' => '我通过电子邮件接收通知的频率',
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
	'echo-specialpage' => '我的通知',
	'echo-anon' => '要接收通知，请[[Special:Userlogin/signup|创建帐号]]或[[Special:UserLogin|登录]]。',
	'echo-none' => '您没有任何通知。',
	'notification-edit' => '$2{{GENDER:$1|编辑了}}[[$3]]$4：“$5”', # Fuzzy
	'notification-edit-talk-page' => '$2在[[User talk:$3|您的对话页]]{{GENDER:$1|发表了话题}}。',
	'notification-add-comment' => '$2在“$5”讨论页上{{GENDER:$1|评论了}}“[[$4|$3]]”',
	'notification-add-talkpage-topic' => '$2在[[$4]]上{{GENDER:$1|发表了}}一个新主题“$3”',
	'notification-add-talkpage-topic-yours' => '$2给您{{GENDER:$1|发送了}}新消息：“[[$4#$3|$3]]”',
	'notification-add-comment-yours' => '$2在您的对话页上上{{GENDER:$1|评论了}}“[[$4#$3|$3]]”',
	'notification-new-user' => '欢迎来到{{SITENAME}}，$1！',
	'notification-new-user-content' => '您好 $1，欢迎来到{{SITENAME}}。<br />
请记得为讨论页上的任何讨论使用4个波浪线（~~~~）签名。',
	'notification-reverted' => '您在[[$3]]上的编辑已被$2{{GENDER:$1|撤销}} $4', # Fuzzy
	'notification-edit-email-subject' => '{{SITENAME}}通知：$3已被$2编辑',
	'notification-edit-email-body' => '您好 $5，
这个通知为了让您了解$2编辑了{{SITENAME}}页面$3。

您可以在这个链接查看$2作出的更改：
<$4>

您收到这个消息是因为您订阅了这个页面变更的电子邮件更新。

感谢您使用{{SITENAME}}
{{SITENAME}}通知系统', # Fuzzy
	'notification-edit-talk-page-email-subject' => '您的{{SITENAME}}对话页已被$2编辑', # Fuzzy
	'notification-edit-talk-page-email-body' => '您好 $4，
这个通知为了让您了解$2编辑了{{SITENAME}}上您的对话页。

在{{SITENAME}}，您的对话页是其他用户可以给您留言的地方。

您可以在这个链接查看$2作出的更改：
<$3>

感谢您使用{{SITENAME}}
{{SITENAME}}通知系统', # Fuzzy
	'echo-email-subject-default' => '{{SITENAME}}上的新通知',
	'echo-email-body-default' => '您在{{SITENAME}}上有新通知：

$1',
	'echo-link-new' => '$1条新通知',
	'echo-link' => '通知',
	'echo-overlay-link' => '全部通知',
	'echo-overlay-title' => '我的通知',
	'echo-date-today' => '今天',
	'echo-date-yesterday' => '昨天',
);

/** Traditional Chinese (中文（繁體）‎)
 * @author Shirayuki
 * @author Simon Shek
 */
$messages['zh-hant'] = array(
	'echo-desc' => 'MediaWiki的下一代通知架構', # Fuzzy
	'prefs-echo' => '通知',
	'echo-no-agent' => '[無人]',
	'echo-no-title' => '[無標題]', # Fuzzy
	'notifications' => '通知',
	'echo-specialpage' => '我的通知',
	'echo-anon' => '要接收通知，請[[Special:Userlogin/signup|創建帳號]]或[[Special:UserLogin|登錄]]。',
	'echo-none' => '您最近沒有收到任何通知。', # Fuzzy
	'notification-edit' => '$2{{GENDER:$1|編輯了}}[[$3]] $4', # Fuzzy
	'notification-edit-talk-page' => '$2{{GENDER:$1|編輯了}}[[User talk:$3|您的對話頁]]. $4', # Fuzzy
	'notification-add-comment' => '$2在“$5”討論頁上{{GENDER:$1|評論了}}“[[$4|$3]]”',
	'notification-add-talkpage-topic' => '$2在[[$4]]上{{GENDER:$1|發表了}}一個新主題“$3”',
	'notification-add-talkpage-topic-yours' => '$2給您{{GENDER:$1|發送了}}新消息：“[[$4#$3|$3]]”',
	'notification-add-comment-yours' => '$2在您的對話頁上上{{GENDER:$1|評論了}}“[[$4#$3|$3]]”',
	'notification-edit-email-subject' => '{{SITENAME}}通知：$3已被$2編輯',
	'notification-edit-email-body' => '您好 $5，
這個通知為了讓您了解$2編輯了{{SITENAME}}頁面$3。

您可以在這個鏈接查看$2作出的更改：
<$4>

您收到這個消息是因為您訂閱了這個頁面變更的電子郵件更新。

感謝您使用{{SITENAME}}
{{SITENAME}}通知系統', # Fuzzy
	'notification-edit-talk-page-email-subject' => '你在{{SITENAME}}上的討論頁已被$2編輯。', # Fuzzy
	'notification-edit-talk-page-email-body' => '您好 $4，
這個通知為了讓您了解$2編輯了{{SITENAME}}上您的對話頁。

在{{SITENAME}}，您的對話頁是其他用戶可以給您留言的地方。

您可以在這個鏈接查看$2作出的更改：
<$3>

感謝您使用{{SITENAME}}
{{SITENAME}}通知系統', # Fuzzy
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
