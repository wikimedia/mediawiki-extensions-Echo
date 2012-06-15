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

/** Message documentation (Message documentation) */
$messages['qqq'] = array(
	'echo-desc' => '{{desc}}',
	'prefs-echo' => 'Name of preferences section for Echo notifications.',
	'echo-pref-notify-watchlist' => 'Name of a preference which causes
	any changes to your watchlist to be replicated in Echo subscriptions',
	'echo-no-agent' => 'Shown in place of a username in a notification
	if the notification has no specified user.',
	'echo-no-title' => 'Shown in place of a page title in a notification
	if the notification has no specified page title.',
	'notifications' => 'This message is the page title of the special page [[Special:Notifications]].',
	'echo-specialpage' => 'Special page title for Special:Notifications',
	'echo-anon' => 'Error message shown to users who try to visit Special:Notifications as an anon.',
	'echo-none' => 'Message shown to users who have no notifications. Also shown in the overlay.',
	'notification-edit-talk-page' => 'Format for displaying notifications of a user talk page being edited
* $1 is the username of the person who edited, plain text.
* $2 is the username of the person who edited, formatted.
* $3 is a diff link, formatted.',
	'notification-edit' => 'Format for displaying notifications of a page being edited (generally from a watchlist)
* $1 is the username of the person who edited, plain text.
* $2 is the username of the person who edited, formatted.
* $3 is the page that was edited, formatted.
* $4 is a diff link, possibly formatted.',
	'echo-email-subject-default' => 'Default subject for Echo email notifications',
	'echo-email-body-default' => 'Default message content for Echo email notifications.
* $1 is a plain text description of the notification.',
	'echo-link-new' => 'Shown in "personal links" when a user has unread notifications.
* $1 is number of unread notifications',
	'echo-link-none' => 'Shown in "personal links" when a user has no unread notifications.',
	'echo-overlay-link' => 'Link to "all notifications" at the bottom of the overlay',
	'echo-overlay-title' => 'Title at the top of the notifications overlay',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'echo-desc' => 'Ermöglicht MediaWiki eine modernere Benachrichtigungsinfrastruktur',
	'prefs-echo' => 'Benachrichtigungen',
	'echo-pref-notify-watchlist' => 'Das Bearbeiten der Einstellungen zu Benachrichtigungen ermöglichen, wenn ich Seiten zu meiner Beobachtungsliste hinzufüge.',
	'echo-no-agent' => '[Niemand]',
	'echo-no-title' => '[Kein Titel]',
	'notifications' => 'Benachrichtigungen',
	'echo-specialpage' => 'Meine Benachrichtigungen',
	'echo-anon' => 'Um Benachrichtigungen erhalten zu können, muss man ein [[Special:Userlogin/signup|Benutzerkonto anlegen]].',
	'echo-none' => 'Du hast in letzter Zeit keine Benachrichtigungen erhalten.',
	'notification-edit-talk-page' => '$2 bearbeitete deine Benutzerseite $3',
	'notification-edit' => '$2 bearbeitete $3 $4',
	'notification-edit-email-subject' => '{{SITENAME}}-Benachrichtigung: $3 wurde von $2 bearbeitet',
	'notification-edit-email-body' => 'Hallo $5,

dies ist eine Benachrichtigung, um dir mitzuteilen, dass $2 die Seite $3 auf {{SITENAME}} bearbeitet hat.

Du kannst die Änderungen von $2 ansehen, sofern du auf den folgenden Link klickst:
<$4>

Du erhältst diese Nachricht, da du E-Mail-Benachrichtigungen zu Änderungen an der Seite $3 abonniert hast.

Vielen Dank, dass du {{SITENAME}} nutzt.
Das {{SITENAME}}-Benachrichtigungssytem',
	'notification-edit-talk-page-email-subject' => 'Deine {{SITENAME}}-Diskussionsseite wurde von $2 bearbeitet',
	'notification-edit-talk-page-email-body' => 'Hallo $4,

dies ist eine Benachrichtigung, um dir mitzuteilen, dass $2 deine Diskussionsseite auf {{SITENAME}} bearbeitet hat.

Die Diskussionsseite ist auf {{SITENAME}} die Stelle, an der dir andere Benutzer eine Nachricht hinterlassen können.

Du kannst die Änderungen von $2 ansehen, sofern du auf den folgenden Link klickst:
<$3>

Vielen Dank, dass du {{SITENAME}} nutzt.
Das {{SITENAME}}-Benachrichtigungssytem',
	'echo-email-subject-default' => 'Neue Benachrichtigung auf {{SITENAME}}',
	'echo-email-body-default' => 'Es gibt eine neue Benachrichtigung auf {{SITENAME}}:

$1',
	'echo-link-new' => '$1 neue Benachrichtigungen',
	'echo-link-none' => 'Meine Benachrichtigungen',
	'echo-overlay-link' => 'Alle Benachrichtigungen …',
	'echo-overlay-title' => 'Meine Benachrichtigungen',
);

/** German (formal address) (‪Deutsch (Sie-Form)‬)
 * @author Kghbln
 */
$messages['de-formal'] = array(
	'echo-none' => 'Sie haben in letzter Zeit keine Benachrichtigungen erhalten.',
	'notification-edit-talk-page' => '$2 bearbeitete Ihre Benutzerseite $3',
	'notification-edit-email-body' => 'Hallo $5,

dies ist eine Benachrichtigung, um Ihnen mitzuteilen, dass $2 die Seite $3 auf {{SITENAME}} bearbeitet hat.

Sie können die Änderungen von $2 ansehen, sofern Sie auf den folgenden Link klicken:
<$4>

Sie erhalten diese Nachricht, da Sie E-Mail-Benachrichtigungen zu Änderungen an der Seite $3 abonniert haben.

Vielen Dank, dass Sie {{SITENAME}} nutzen.
Das {{SITENAME}}-Benachrichtigungssytem',
	'notification-edit-talk-page-email-subject' => 'Ihre {{SITENAME}}-Diskussionsseite wurde von $2 bearbeitet',
	'notification-edit-talk-page-email-body' => 'Hallo $4,

dies ist eine Benachrichtigung, um Ihnen mitzuteilen, dass $2 Ihre Diskussionsseite auf {{SITENAME}} bearbeitet hat.

Die Diskussionsseite ist auf {{SITENAME}} die Stelle, an der Ihnen andere Benutzer eine Nachricht hinterlassen können.

Sie können die Änderungen von $2 ansehen, sofern Sie auf den folgenden Link klicken:
<$3>

Vielen Dank, dass Sie {{SITENAME}} nutzen.
Das {{SITENAME}}-Benachrichtigungssytem',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'echo-desc' => 'Pangkasunod na salinlahing imprastruktura ng pagpapabatid para sa MediaWiki',
	'prefs-echo' => 'Mga pagpapabatid',
	'echo-pref-notify-watchlist' => 'Pasipian ako na mapatnugutan ang mga pagpapabatid kapag nagdaragdag ako ng mga pahina sa bantayan ko.',
	'echo-no-agent' => '[Walang Sinuman]',
	'echo-no-title' => '[Walang Pamagat]',
	'notifications' => 'Mga pagpapabatid',
	'echo-specialpage' => 'Mga pagpapabatid ko',
	'echo-anon' => 'Upang makatanggap ng mga pagpapabatid, [[Special:Userlogin/signup|lumikha ng isang akawnt]].',
	'echo-none' => 'Hindi ka nakakatanggap ng anumang mga pagpapabatid nitong mga uling panahon!',
	'notification-edit-talk-page' => 'Binago ni $2 ang pahina mo ng usapang $3',
	'notification-edit' => 'Binago ni $2 ang $3 $4',
	'notification-edit-email-subject' => 'Pagpapabatid ng {{SITENAME}} : Binago ni $2 ang $3',
	'notification-edit-email-body' => 'Kumusta ka $5,
Isa itong pagpapabatid upang ipaalam sa iyo na binago ni $2 ang pahinang $3 ng {{SITENAME}}.

Makikita mo ang mga pagbabagong ginawa ni $2 sa pamamagitan ng pagsunod sa kawing na ito:
<$4>

Natatanggap mo ang mensaheng ito dahil nagpasipi ka ng mga pagsasapanahon sa pamamagitan ng e-liham para sa mga pagbabago sa pahinang ito.

Maraming salamat sa paggamit ng {{SITENAME}}
Ang sistema ng pagpapabatid ng {{SITENAME}}',
	'notification-edit-talk-page-email-subject' => 'Binago ni $2 ang pahina mong pang-usapan na nasa {{SITENAME}}',
	'notification-edit-talk-page-email-body' => 'Kumusta ka $4,
Isa itong pagpapabatid upang maipalam sa iyo na binago ni $2 ang iyong pahina ng usapan na nasa {{SITENAME}}.

Doon sa {{SITENAME}}, ang pahina mo ng usapan ay ang kung saan maaaring makapag-iwan ng mga mensaheng para sa iyo ang iba pang mga tagagamit.

Makikita mo ang mga pagbabagong ginawa ni $2 dito sa kawing na ito:
<$3>

Salamat sa paggamit ng {{SITENAME}}
Ang sistema ng pagpapabatid ng {{SITENAME}}',
	'echo-email-subject-default' => 'Bagong pagpapabatid sa {{SITENAME}}',
	'echo-email-body-default' => 'Mayroon kang isang bagong pagpapabatid doon sa {{SITENAME}}:

$1',
	'echo-link-new' => '$1 bagong mga pagpapabatid',
	'echo-link-none' => 'Mga pagpapabatid ko',
	'echo-overlay-link' => 'Lahat ng mga pagpapabatid...',
	'echo-overlay-title' => 'Mga pagpapabatid ko',
);

