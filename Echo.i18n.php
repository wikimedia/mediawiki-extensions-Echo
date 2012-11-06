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
	'echo-pref-notify-watchlist' => 'Subscribe me to edit notifications when I add pages to my watchlist.',

	// Errors
	'echo-no-agent' => '[Nobody]',
	'echo-no-title' => '[No page]',
	'echo-error-no-formatter' => 'No formatting defined for notification',

	// Special:Notifications
	'notifications' => 'Notifications',
	'echo-specialpage' => 'My notifications',
	'echo-anon' => 'To receive notifications, [[Special:Userlogin/signup|create an account]] or [[Special:UserLogin|log in]].',
	'echo-none' => 'You have not received any notifications lately.',

	// Notification
	'notification-edit' => '$2 {{GENDER:$1|edited}} [[$3]] $4: "$5"',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|edited}} [[User talk:$4|your talk page]] $3: "$5"',
	'notification-add-comment' => '$2 {{GENDER:$1|commented}} on "[[$4|$3]]" on the "$5" talk page',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|posted}} a new topic "$3" on [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|sent}} you a message: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|commented}} on "[[$4#$3|$3]]" on your talk page',
	'notification-talkpage-content' => '$1', ## Do not translate unless you deliberately want to change behaviour
	'notification-new-user' => 'Welcome to {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Hi $1, and welcome to {{SITENAME}}.<br />
Please remember to sign any comments on talk pages with 4 tildes (~~~~).',
	'notification-reverted' => '$2 {{GENDER:$1|reverted}} your {{PLURAL:$6|1=edit|edits}} on [[$3]] $4: "$5"',
	'notification-edit-email-subject' => '{{SITENAME}} notification: $3 has been edited by $2',
	'notification-edit-email-body' => 'Hello $5,
This is a notification to let you know that $2 has edited the {{SITENAME}} page $3.

$2 summarized their changes with this comment: $6

You can see the changes that $2 made by following this link:
<$4>

You are receiving this message because you have subscribed to email updates for changes to this page.

Thanks for using {{SITENAME}}
The {{SITENAME}} notification system',

	'notification-edit-talk-page-email-subject' => 'Your {{SITENAME}} talk page has been edited by $2',
	'notification-edit-talk-page-email-body' => 'Hello $4,
This is a notification to let you know that $2 has edited your talk page on {{SITENAME}}.

On {{SITENAME}}, your talk page is where other users can leave you messages.

$2 used the following summary to describe their change: $5

You can see the changes that $2 made at this link:
<$3>

Thanks for using {{SITENAME}}
The {{SITENAME}} notification system',

	'notification-reverted-email-subject' => '{{SITENAME}} notification: $2 has reverted your edit on $3: $4',
	'notification-reverted-email-body' => 'Hello $5,
This is a notification to let you know that $2 has reverted your edits on the {{SITENAME}} page $3.

$2 used the following summary to describe their change: $6

You can see the change that $2 made to revert your edits by following this link:
<$4>

You are receiving this message because you have subscribed to email alerts
when your changes are reverted.

Thanks for using {{SITENAME}}
The {{SITENAME}} notification system.',

	// Email notification
	'echo-email-subject-default' => 'New notification at {{SITENAME}}',
	'echo-email-body-default' => 'You have a new notification at {{SITENAME}}:

$1',

	// Notifications overlay
	'echo-link-new' => '$1 new {{PLURAL:$1|notification|notifications}}',
	'echo-link' => 'Notifications',
	'echo-overlay-link' => 'All notifications…',
	'echo-overlay-title' => 'My notifications',
);

/** Message documentation (Message documentation)
 * @author Amire80
 * @author Kghbln
 * @author Krenair
 * @author Nike
 * @author Raymond
 * @author Shirayuki
 * @author Siebrand
 */
$messages['qqq'] = array(
	'echo-desc' => '{{desc}}',
	'prefs-echo' => 'Name of preferences section for Echo notifications.',
	'echo-pref-notify-watchlist' => 'Name of a preference which causes
	any changes to your watchlist to be replicated in Echo subscriptions',
	'echo-no-agent' => 'Shown in place of a username in a notification
	if the notification has no specified user.',
	'echo-no-title' => 'Shown in place of a page title in a notification
	if the notification has no specified page title.',
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
	'notification-edit-talk-page' => 'Format for displaying notifications of a user talk page being edited
* $1 is the username of the person who edited, plain text. Can be used for GENDER.
* $2 is the username of the person who edited, HTML formatted as the link to the user\'s page.
* $3 is a diff link, formatted as an HTML link with the text "(diff)".
* $4 is the current user\'s name, used in the link to their talk page.
* $5 is the edit summary.',
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
* $5 is the edit summary used to revert.
* $6 is the number of edits that were reverted. NOTE: This will only be set to 1 or 2, with 2 actually meaning 'an unknown number greater than 0'.",
	'notification-edit-email-subject' => 'E-mail subject. Parameters:
* $2 is a username
* $3 is a page title',
	'notification-edit-email-body' => "E-mail notification. Parameters:
* $2 is a username
* $3 is a page title
* $4 is a link to a change
* $5 is the e-mail recipient's username.
* $6 is the edit summary.", # Fuzzy
	'notification-edit-talk-page-email-subject' => 'E-mail subject. Parameters:
* $2 is a username.',
	'notification-edit-talk-page-email-body' => "E-mail notification. Parameters:
* $2 is a username
* $3 link to a change
* $4 is the e-mail recipient's username.
* $5 is the edit summary.",
	'notification-reverted-email-subject' => 'E-mail subject. Parameters:
*$2 is a username
*$3 is a page title
*$4 is the edit summary',
	'notification-reverted-email-body' => "E-mail notification. Parameters:
* $2 is the username
* $3 is the page title
* $4 is the link to the change
* $5 is the e-mail recipient's username
* $6 is the edit summary",
	'echo-email-subject-default' => 'Default subject for Echo email notifications',
	'echo-email-body-default' => 'Default message content for Echo email notifications.
* $1 is a plain text description of the notification.',
	'echo-link-new' => 'Shown in "personal links" when a user has unread notifications.
* $1 is number of unread notifications',
	'echo-link' => 'Shown in "personal links" when a user has JS. New notifications are indicated with a badge.',
	'echo-overlay-link' => 'Link to "all notifications" at the bottom of the overlay',
	'echo-overlay-title' => 'Title at the top of the notifications overlay',
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

/** Belarusian (Taraškievica orthography) (беларуская (тарашкевіца)‎)
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'echo-desc' => 'Сыстэма апавяшчэньняў',
	'prefs-echo' => 'Абвесткі',
	'echo-pref-notify-watchlist' => 'Падпісацца на абвесткі пра рэдагаваньні старонак, за якімі я назіраю.',
	'echo-no-agent' => '[Ніхто]',
	'echo-no-title' => '[Няма старонкі]',
	'notifications' => 'Абвесткі',
	'echo-specialpage' => 'Мае абвесткі',
	'echo-anon' => 'Для атрыманьня абвестак [[Special:Userlogin/signup|стварыце рахунак]] або [[Special:UserLogin|увайдзіце]].',
	'echo-none' => 'За апошні час вы не атрымлівалі абвестак!',
	'notification-edit' => '$2 {{GENDER:$1|адрэдагаваў|адрэдагавала}} «[[$3]]» $4',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|напісаў|напісала}} на [[User talk:$4|вашую старонку гутарак]] $3',
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
Сыстэма абвестак {{GRAMMAR:родны|{{SITENAME}}}}.',
	'notification-edit-talk-page-email-subject' => '$2 {{GENDER:$2|адрэдагаваў|адрэдагавала}} вашую старонку гутарак у {{GRAMMAR:месны|{{SITENAME}}}}',
	'notification-edit-talk-page-email-body' => 'Вітаем, $4.
Паведамляем вам, што {{GENDER:$2|рэдагаваў|рэдагавала}} вашую старонку гутарак у {{GRAMMAR:месны|{{SITENAME}}}}.

Старонка гутарак — месца, дзе іншыя ўдзельнікі могуць пакідаць вам паведамленьні.

Вы можаце праглядзець унесеныя {{GENDER:$2|ўдзельнікам|ўдзельніцай}} $2 зьмены па гэтай спасылцы:
<$3>

Дзякуем за выкарыстаньне {{GRAMMAR:родны|{{SITENAME}}}},
Сыстэма абвестак {{GRAMMAR:родны|{{SITENAME}}}}',
	'echo-email-subject-default' => 'Новая абвестка ад {{GRAMMAR:родны|{{SITENAME}}}}',
	'echo-email-body-default' => 'Для вас ёсьць новая абвестка ў {{GRAMMAR:месны|{{SITENAME}}}}:

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|новая абвестка|новыя абвесткі|новых абвестак}}',
	'echo-link' => 'Мае абвесткі',
	'echo-overlay-link' => 'Усе абвесткі…',
	'echo-overlay-title' => 'Мае абвесткі',
);

/** Breton (brezhoneg)
 * @author Fulup
 * @author Y-M D
 */
$messages['br'] = array(
	'echo-no-agent' => '[Den]',
	'echo-no-title' => '[Diditl]', # Fuzzy
	'notification-edit' => '$2 {{GENDER:$1|en deus kemmet}} [[$3]] $4',
	'notification-edit-talk-page' => '$2 en deus {{GENDER:$1|kemmet}} [[User talk:$4|ho pajenn kaozeadenn]] $3',
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
	'echo-desc' => 'Systém pro upozorňování nové generace pro MediaWiki', # Fuzzy
	'prefs-echo' => 'Upozornění',
	'echo-no-agent' => '[Nikdo]',
	'echo-no-title' => '[Bez názvu]', # Fuzzy
	'notifications' => 'Upozornění',
	'echo-specialpage' => 'Moje upozornění',
	'echo-anon' => 'Pro zobrazování upozornění je nutné [[Special:Userlogin/signup|vytvořit si účet]] nebo [[Special:UserLogin|se přihlásit]].',
	'echo-none' => 'Žádné upozornění zatím neobdrženo.',
	'notification-edit' => '$2 {{GENDER:$1|editoval|editovala}} [[$3]] $4',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|editoval|editovala}} [[User talk:$4|Vaší diskuzní stránku]] $3',
	'notification-add-comment' => '$2 {{GENDER:$1|diskutoval|diskutovala}} [[$4|$3]] na diskuzní stránce $5',
	'notification-edit-email-body' => 'Dobrý den $5,

Toto je upozornění na to, že $2 editoval {{SITENAME}} stránku $3.

Změny, které $2 udělal, si můžete prohlédnout v následujícím odkazu: 
<$4>

Tuto zprávu dostáváte proto, protože jste se přihlásil k e-mailovým upozorněním o změnách této stránky.

Děkujeme za použití {{SITENAME}}
Systém upozorňování {{SITENAME}}',
	'notification-edit-talk-page-email-subject' => 'Vaše diskuse na {{grammar:6sg|{{SITENAME}}}} byla změněna uživatelem $2',
	'notification-edit-talk-page-email-body' => 'Dobrý den $4,

Toto je upozornění na to, že $2 editoval Vaší diskuzní stránku na {{SITENAME}}. 

Je možné mu odpovědět na Vaší diskuzní stránce na {{SITENAME}}. 

Změny, které $2 udělal, si můžete prohlédnout v následujícím odkazu: 
<$3>

Děkujeme za použití {{SITENAME}}
Systém upozorňování {{SITENAME}}',
	'echo-email-subject-default' => 'Nové upozornění na {{SITENAME}}',
	'echo-email-body-default' => 'Máte nové upozornění na {{SITENAME}}:

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nové upozornění|nová upozornění|nových upozornění}}',
	'echo-link' => 'Moje upozornění',
	'echo-overlay-link' => 'Všechna upozornění...',
	'echo-overlay-title' => 'Moje upozornění',
);

/** German (Deutsch)
 * @author Kghbln
 * @author Metalhead64
 */
$messages['de'] = array(
	'echo-desc' => 'Benachrichtigungssystem',
	'prefs-echo' => 'Benachrichtigungen',
	'echo-pref-notify-watchlist' => 'Das Bearbeiten der Einstellungen zu Benachrichtigungen ermöglichen, wenn ich Seiten zu meiner Beobachtungsliste hinzufüge.',
	'echo-no-agent' => '[Niemand]',
	'echo-no-title' => '[Keine Seite]',
	'echo-error-no-formatter' => 'Keine Formatierung zur Benachrichtigung definiert',
	'notifications' => 'Benachrichtigungen',
	'echo-specialpage' => 'Meine Benachrichtigungen',
	'echo-anon' => 'Um Benachrichtigungen erhalten zu können, muss man ein [[Special:Userlogin/signup|Benutzerkonto anlegen]] oder sich [[Special:UserLogin|anmelden]].',
	'echo-none' => 'Du hast in letzter Zeit keine Benachrichtigungen erhalten.',
	'notification-edit' => '$2 {{GENDER:$1|bearbeitete}} [[$3]] $4: „$5“',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|bearbeitete}} [[User talk:$4|deine Benutzerseite]] $3: „$5“',
	'notification-add-comment' => '$2 {{GENDER:$1|kommentierte}} „[[$4|$3]]“ auf der Diskussionsseite „$5“',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|startete}} das neue Thema  „$3“ zu [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|sandte}} dir eine Nachricht: [[$4#$3|$3]]',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|kommentierte}} „[[$4#$3|$3]]“ auf deiner Diskussionsseite',
	'notification-new-user' => 'Willkommen bei {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Hallo $1, und willkommen bei {{SITENAME}}.<br />
Bitte vergiss nicht alle Beiträge auf Diskussionsseiten mit 4 Tilden (~~~~) zu signieren.',
	'notification-reverted' => '$2 {{GENDER:$1|machte}} deine {{PLURAL:$6|1=Bearbeitung|Bearbeitungen}} von [[$3]] rückgängig $4: „$5“',
	'notification-edit-email-subject' => '{{SITENAME}}-Benachrichtigung: $3 wurde von $2 bearbeitet',
	'notification-edit-email-body' => 'Hallo $5,

dies ist eine Benachrichtigung, um dir mitzuteilen, dass $2 die Seite $3 auf {{SITENAME}} bearbeitet hat.

$2 fasste die Bearbeitungen mit diesem Kommentar zusammen: $6

Du kannst die Änderungen von $2 ansehen, sofern du auf den folgenden Link klickst:
<$4>

Du erhältst diese Nachricht, da du E-Mail-Benachrichtigungen zu Änderungen an der Seite $3 abonniert hast.

Vielen Dank, dass du {{SITENAME}} nutzt.
Das {{SITENAME}}-Benachrichtigungssystem',
	'notification-edit-talk-page-email-subject' => 'Deine {{SITENAME}}-Diskussionsseite wurde von $2 bearbeitet',
	'notification-edit-talk-page-email-body' => 'Hallo $4,

dies ist eine Benachrichtigung, um dir mitzuteilen, dass $2 deine Diskussionsseite auf {{SITENAME}} bearbeitet hat.

Die Diskussionsseite ist auf {{SITENAME}} die Stelle, an der dir andere Benutzer eine Nachricht hinterlassen können.

$2 benutzte die folgende Zusammenfassung, um die Änderungen zu beschreiben: $5

Du kannst die Änderungen von $2 ansehen, sofern du auf den folgenden Link klickst:
<$3>

Vielen Dank, dass du {{SITENAME}} nutzt.
Das {{SITENAME}}-Benachrichtigungssystem',
	'notification-reverted-email-subject' => 'Benachrichtigung von {{SITENAME}}: $2 machte deine Bearbeitung von $3 rückgängig: $4',
	'notification-reverted-email-body' => 'Hallo $5,
dies ist eine Benachrichtigung, um dir mitzuteilen, dass $2 deine Bearbeitungen der Seite „$3“ auf {{SITENAME}} rückgängig gemacht hat.

$2 benutzte die folgende Zusammenfassung, um die Änderungen zu beschreiben: $6

Du kannst die Änderungen einsehen, die $2 vorgenommen hat, um deine Bearbeitungen rückgängig zu machen, indem du auf den folgenden Link klickst:
<$4>

Du erhältst diese Nachricht, da du E-Mail-Benachrichtigungen zu rückgängig gemachten Bearbeitungen abonniert hast.

Vielen Dank, dass du {{SITENAME}} nutzt.
Das {{SITENAME}}-Benachrichtigungssystem.',
	'echo-email-subject-default' => 'Neue Benachrichtigung auf {{SITENAME}}',
	'echo-email-body-default' => 'Es gibt eine neue Benachrichtigung auf {{SITENAME}}:

$1',
	'echo-link-new' => '$1 neue {{PLURAL:$1|Benachrichtigung|Benachrichtigungen}}',
	'echo-link' => 'Meine Benachrichtigungen',
	'echo-overlay-link' => 'Alle Benachrichtigungen …',
	'echo-overlay-title' => 'Meine Benachrichtigungen',
);

/** German (formal address) (Deutsch (Sie-Form)‎)
 * @author Kghbln
 */
$messages['de-formal'] = array(
	'echo-none' => 'Sie haben in letzter Zeit keine Benachrichtigungen erhalten.',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|bearbeitete}} [[User talk:$4|Ihre Benutzerseite]] $3',
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

/** Zazaki (Zazaki)
 * @author Erdemaslancan
 * @author Mirzali
 */
$messages['diq'] = array(
	'prefs-echo' => 'Tebliği',
	'echo-no-title' => '[Pele Çıniya]',
	'notifications' => 'Tebliği',
	'echo-specialpage' => 'Tebliğê me',
	'notification-edit' => '$2 {{GENDER:$1|vurna}} [[$3]] $4',
	'echo-link' => 'Tebliğê me',
	'echo-overlay-link' => 'Tebliği pêro...',
	'echo-overlay-title' => 'Tebliğê me',
);

/** Greek (Ελληνικά)
 * @author Aitolos
 * @author Glavkos
 */
$messages['el'] = array(
	'prefs-echo' => 'Ειδοποιήσεις',
	'echo-no-agent' => '[Κανένας]',
	'echo-no-title' => '[Χωρίς σελίδα]',
	'notifications' => 'Ειδοποιήσεις',
	'echo-specialpage' => 'Οι ειδοποιήσεις μου',
	'echo-link' => 'Οι ειδοποιήσεις μου',
	'echo-overlay-link' => 'Όλες οι ειδοποιήσεις...',
	'echo-overlay-title' => 'Οι ειδοποιήσεις μου',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'echo-no-title' => '[Sen Titolo]', # Fuzzy
	'echo-email-body-default' => 'Vi havas novan noton ĉe {{SITENAME}}:

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nova noto|novaj notoj}}',
	'echo-link' => 'Miaj notoj',
	'echo-overlay-link' => 'Ĉiuj notoj...',
	'echo-overlay-title' => 'Miaj notoj',
);

/** Spanish (español)
 * @author Armando-Martin
 * @author Vivaelcelta
 */
$messages['es'] = array(
	'echo-desc' => 'Sistema de notificaciones',
	'prefs-echo' => 'Notificaciones',
	'echo-pref-notify-watchlist' => 'Suscribirme para editar notificaciones cuando agregue páginas a mi lista de vigilancia.',
	'echo-no-agent' => '[Nadie]',
	'echo-no-title' => '[No hay ninguna página]',
	'echo-error-no-formatter' => 'Sin formato definido para notificaciones',
	'notifications' => 'Notificaciones',
	'echo-specialpage' => 'Mis notificaciones',
	'echo-anon' => 'Para recibir notificaciones, [[Special:Userlogin/signup|crea una cuenta]] o [[Special:UserLogin|inicia sesión]].',
	'echo-none' => '¡No has recibido notificaciones últimamente!',
	'notification-edit' => '$2 {{GENDER:$1|ha editado}} [[$3]] $4: "$5"',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|ha editado}} [[User talk:$4|tu página de discusión]] $3: "$5"',
	'notification-add-comment' => '$2 {{GENDER:$1|ha comentado}} sobre "[[$4|$3]]" en la página de discusión "$5"',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|ha publicado}} un nuevo tema "$3" en [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|te ha enviado}} un mensaje: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|ha comentado}} sobre "[[$4#$3|$3]]" en tu página de discusión',
	'notification-new-user' => '¡Bienvenido a {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Hola $1 y bienvenido a {{SITENAME}}.<br />
Recuerda firmar cualquier comentario en las páginas de discusión con 4 tildes (~ ~ ~ ~).',
	'notification-reverted' => '$2 {{GENDER:$1|ha revertido}} {{PLURAL:$6|1=su edición|sus ediciones}} en "[[$3]]" $4: "$5"',
	'notification-edit-email-subject' => 'Notificación de {{SITENAME}}: $3 ha sido editado por $2',
	'notification-edit-email-body' => 'Hola  $5 ,

Esto es una notificación para hacerte saber que  $2  ha editado la página $3 de {{SITENAME}}.

$2 ha resumido sus cambios con este comentario: $6

Puedes ver los cambios que  $2 ha hecho siguiendo este enlace:

<$4>

Estás recibiendo este mensaje porque estás suscrito a las actualizaciones por correo electrónico de los cambios de esta página.

Gracias por usar {{SITENAME}}
El sistema de notificaciones de {{SITENAME}}',
	'notification-edit-talk-page-email-subject' => 'Tu página de discusión en {{SITENAME}} ha sido editada por $2',
	'notification-edit-talk-page-email-body' => 'Hola $4,

Esto es una notificación para hacerte saber que $2 ha editado tu página de discusión en {{SITENAME}}.

En {{SITENAME}}, tu página de discusión es donde otros usuarios te pueden dejar mensajes.

$2 ha empleado el siguiente resumen para describir su cambio: $5

Puedes ver los cambios que $2 en este enlace:
<$3>

Gracias por usar {{SITENAME}}
El sistema de notificaciones de {{SITENAME}}',
	'notification-reverted-email-subject' => 'Notificación de {{SITENAME}}: $2 ha revertido su edición en $3: $4',
	'echo-email-subject-default' => 'Nueva notificación en {{SITENAME}}',
	'echo-email-body-default' => 'Tienes una nueva notificación en {{SITENAME}}:

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|notificación nueva|notificaciones nuevas}}',
	'echo-link' => 'Mis notificaciones',
	'echo-overlay-link' => 'Todas las notificaciones...',
	'echo-overlay-title' => 'Mis notificaciones',
);

/** Estonian (eesti)
 * @author Avjoska
 * @author Pikne
 */
$messages['et'] = array(
	'echo-no-agent' => '[Eikeegi]',
	'echo-specialpage' => 'Minu märkused',
	'echo-link' => 'Märkused',
	'echo-overlay-link' => 'Kõik märkused...',
	'echo-overlay-title' => 'Minu märkused',
);

/** Persian (فارسی)
 * @author Mjbmr
 */
$messages['fa'] = array(
	'prefs-echo' => 'اعلامیه‌ها',
	'echo-no-agent' => '[هیچ کس]',
	'echo-no-title' => '[بدون عنوان]', # Fuzzy
	'echo-email-body-default' => 'شما در {{SITENAME}} اعلان جدید دارید:

$1',
	'echo-link' => 'اعلامیه‌های من',
	'echo-overlay-link' => 'همهٔ اعلامیه‌ها...',
	'echo-overlay-title' => 'اعلامیه‌های من',
);

/** Finnish (suomi)
 * @author Crt
 * @author Nike
 */
$messages['fi'] = array(
	'echo-desc' => 'Ilmoitusjärjestelmä',
	'prefs-echo' => 'Ilmoitukset',
	'echo-no-agent' => '[Ei kukaan]',
	'echo-no-title' => '[Ei sivua]',
	'notifications' => 'Ilmoitukset',
	'echo-specialpage' => 'Ilmoitukset',
	'echo-anon' => 'Vain [[Special:Userlogin/signup|rekisteröityneet käyttäjät]] saavat ilmoituksia.', # Fuzzy
	'echo-none' => 'Ei uusia ilmoituksia viime aikoina.',
	'notification-edit' => '$2 {{GENDER:$1|muokkasi}} sivua [[$3]] $4: $5',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|muokkasi}} [[User talk:$4|keskustelusivuasi]] $3: $5',
	'notification-add-comment' => '$2 {{GENDER:$1|kommentoi}} keskustelua [[$4|$3]] sivusta $5',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|aloitti}} keskustelun $3 sivusta [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|lähetti}} sinulle viestin: [[$4#$3|$3]]',
	'echo-link' => 'Ilmoitukset',
	'echo-overlay-link' => 'Kaikki ilmoitukset…',
	'echo-overlay-title' => 'Ilmoitukset',
);

/** French (français)
 * @author Crochet.david
 * @author DavidL
 * @author Hello71
 * @author IAlex
 * @author Jean-Frédéric
 * @author Tititou36
 */
$messages['fr'] = array(
	'echo-desc' => 'Système de notifications',
	'prefs-echo' => 'Notifications',
	'echo-pref-notify-watchlist' => "M'inscrire pour modifier les notifications quand j'ajoute des pages à ma liste de suivi.",
	'echo-no-agent' => '[Personne]',
	'echo-no-title' => '[Aucune page]',
	'echo-error-no-formatter' => 'Aucune mise en forme définies pour la notification',
	'notifications' => 'Notifications',
	'echo-specialpage' => 'Mes notifications',
	'echo-anon' => 'Pour recevoir des notifications, [[Special:Userlogin/signup|créez un compte]] ou [[Special:UserLogin|connectez-vous]].',
	'echo-none' => "Vous n'avez reçu aucune notification dernièrement !",
	'notification-edit' => '$2 {{GENDER:$1|a modifié}} [[$3]] $4: "$5"',
	'notification-edit-talk-page' => '$2 a {{GENDER:$1|modifié}} [[User talk:$4|votre page de discussion]] $3 : « $5 »',
	'notification-add-comment' => '$2 {{GENDER:$1|a posté}} un commentaire à la discussion « [[$4|$3]] » sur $5',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|a ouvert}} un nouveau sujet « $3 » sur [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 vous {{GENDER:$1|a laissé}} un message : [[$4#$3|$3]]',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|a posté}} un commentaire sur « [[$4#$3|$3]] » sur votre page de discussion',
	'notification-new-user' => 'Bienvenue sur {{SITENAME}}, $1 !',
	'notification-new-user-content' => "Bonjour $1 et bienvenue sur {{SITENAME}}.<br />
N'oubliez pas de signer vos commentaires sur les pages de discussions avec 4 tildes (~ ~ ~ ~).",
	'notification-reverted' => '$2 {{GENDER:$1|a annulé}} {{PLURAL:$6|votre modification|vos modifications}} sur [[$3]] $4: "$5"',
	'notification-edit-email-subject' => 'Notification de {{SITENAME}} : $3 a été modifié par $2',
	'notification-edit-email-body' => "Bonjour $5,
Ceci est une notification pour vous informer que $2 a modifié la page $3 de {{SITENAME}}.

$2 a résumé ses changements avec ce commentaire: $6

Vous pouvez voir les changements faits par $2 en suivant ce lien:
<$4>

Vous recevez ce message parce que vous avez souscrit aux mises à jour par courriel des modifications apportées à cette page.

Merci d'utiliser {{SITENAME}}
Le système de notification de {{SITENAME}}",
	'notification-edit-talk-page-email-subject' => 'Votre page de discussion de {{SITENAME}} a été modifée par $2',
	'notification-edit-talk-page-email-body' => "Bonjour $4,

Ceci est une notification pour vous informer que $2 a modifié votre page de discussion sur {{SITENAME}}.

Sur {{SITENAME}}, votre page de discussion est là où les autres utilisateurs peuvent vous laisser des messages.

$2 a utilisé ce commentaire pour décrire son changement: $5

Vous pouvez voir les changements que $2 a fait en suivant ce lien:
$3

Merci d'utiliser {{SITENAME}}
Le système de notification de {{SITENAME}}",
	'notification-reverted-email-subject' => 'Notification de {{SITENAME}}: $2 a annulé votre modification sur $3: $4',
	'notification-reverted-email-body' => "Bonjour $5,

Ceci est une notification pour vous informer que $2 a annulé vos modifications sur page $3 de {{SITENAME}}

$2 a résumé ses changements avec ce commentaire: $6

Vous pouvez voir les changements faits par $2 pour annulé vos modifications en suivant ce lien:
<$4>

Vous recevez ce message parce que vous avez souscrit aux mises à jour par courriel quand vos modifications sont annulé.

Merci d'utiliser {{SITENAME}}
Le système de notification de {{SITENAME}}",
	'echo-email-subject-default' => 'Nouvelle notification sur {{SITENAME}}',
	'echo-email-body-default' => 'Vous avez une nouvelle notification sur {{SITENAME}} :

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nouvelle notification|nouvelles notifications}}',
	'echo-link' => 'Mes notifications',
	'echo-overlay-link' => 'Toutes les notifications…',
	'echo-overlay-title' => 'Mes notifications',
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
	'notification-edit' => '$2 at {{GENDER:$1|changiê}} [[$3]] $4',
	'notification-edit-talk-page' => '$2 at {{GENDER:$1|changiê}} [[User talk:$4|voutra pâge de discussion]] $3',
	'notification-add-talkpage-topic-yours' => '$2 vos at {{GENDER:$1|mandâ}} un mèssâjo : « [[$4#$3|$3]] »',
	'notification-edit-email-subject' => 'Notificacion de {{SITENAME}} : $3 est étâ changiê per $2',
	'notification-edit-talk-page-email-subject' => 'Voutra pâge de discussion de {{SITENAME}} est étâye changiêye per $2',
	'echo-email-subject-default' => 'Novèla notificacion dessus {{SITENAME}}',
	'echo-email-body-default' => 'Vos avéd na novèla notificacion dessus {{SITENAME}} :

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|novèla notificacion|novèles notificacions}}',
	'echo-link' => 'Mes notificacions',
	'echo-overlay-link' => 'Totes les notificacions...',
	'echo-overlay-title' => 'Mes notificacions',
);

/** Galician (galego)
 * @author Toliño
 * @author Vivaelcelta
 */
$messages['gl'] = array(
	'echo-desc' => 'Sistema de notificación',
	'prefs-echo' => 'Notificacións',
	'echo-pref-notify-watchlist' => 'Subscribirme para editar as notificación cando engada páxinas á miña lista de vixilancia.',
	'echo-no-agent' => '[Ninguén]',
	'echo-no-title' => '[Ningunha páxina]',
	'echo-error-no-formatter' => 'Non se definiu formato ningún para a notificación',
	'notifications' => 'Notificacións',
	'echo-specialpage' => 'As miñas notificacións',
	'echo-anon' => 'Para recibir notificacións, [[Special:Userlogin/signup|cree unha conta]] ou [[Special:UserLogin|acceda ao sistema]].',
	'echo-none' => 'Non recibiu notificación ningunha ultimamente!',
	'notification-edit' => '$2 {{GENDER:$1|editou}} "[[$3]]" $4: "$5"',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|editou}} [[User talk:$4|a súa páxina de conversa]] $3: "$5"',
	'notification-add-comment' => '$2 {{GENDER:$1|comentou}} en "[[$4|$3]]" na páxina de conversa "$5"',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|publicou}} unha nova mensaxe, "$3", en "[[$4]]"',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|envioulle}} unha mensaxe: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|comentou}} en "[[$4#$3|$3]]" na súa páxina de conversa',
	'notification-new-user' => 'Dámoslle a benvida a {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Boas $1. Dámoslle a benvida a {{SITENAME}}.<br />
Lembre asinar calquera comentario que deixe nas páxinas de conversa con 4 tiles (~~~~).',
	'notification-reverted' => '$2 {{GENDER:$1|reverteu}} a {{PLURAL:$6|1=súa edición|súas edicións}} en "[[$3]]" $4: "$5"',
	'notification-edit-email-subject' => 'Notificación de {{SITENAME}}: $2 editou "$3"',
	'notification-edit-email-body' => 'Boas $5:
Esta é unha notificación para facerlle saber que $2 editou a páxina "$3" de {{SITENAME}}.

$2 resumiu os seus cambios con este comentario: $6

Pode ollar os cambios que realizou $2 seguindo esta ligazón:
<$4>

Recibiu esta mensaxe porque activou a subscrición ás actualizacións por correo electrónico sobre os cambios nesta páxina.

Grazas por usar {{SITENAME}}
O sistema de notificación de {{SITENAME}}',
	'notification-edit-talk-page-email-subject' => '$2 editou a súa páxina de conversa de {{SITENAME}}',
	'notification-edit-talk-page-email-body' => 'Boas $4:
Esta é unha notificación para facerlle saber que $2 editou a súa páxina de conversa de {{SITENAME}}.

En {{SITENAME}}, a súa páxina de conversa é o lugar no que os demais usuarios poden deixarlle mensaxes.

$2 utilizou o seguinte resumo para describir o seu cambio: $5

Pode ollar os cambios que realizou $2 seguindo esta ligazón:
<$3>

Grazas por usar {{SITENAME}}
O sistema de notificación de {{SITENAME}}',
	'notification-reverted-email-subject' => 'Notificación de {{SITENAME}}: $2 reverteu a súa edición en "$3": $4',
	'notification-reverted-email-body' => 'Boas $5:
Esta é unha notificación para facerlle saber que $2 reverteu as súas edicións na páxina "$3" de {{SITENAME}}.

$2 utilizou o seguinte resumo para describir o seu cambio: $6

Pode ollar o cambio que realizou $2 para reverter as súas edicións seguindo esta ligazón:
<$4>

Recibiu esta mensaxe porque activou a subscrición ás actualizacións por correo electrónico
sobre reversións dos seus cambios.

Grazas por usar {{SITENAME}}
O sistema de notificación de {{SITENAME}}.',
	'echo-email-subject-default' => 'Nova notificación en {{SITENAME}}',
	'echo-email-body-default' => 'Ten unha nova notificación en {{SITENAME}}:

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nova notificación|novas notificacións}}',
	'echo-link' => 'As miñas notificacións',
	'echo-overlay-link' => 'Todas as notificacións…',
	'echo-overlay-title' => 'As miñas notificacións',
);

/** Hebrew (עברית)
 * @author Amire80
 * @author Inkbug
 */
$messages['he'] = array(
	'echo-desc' => 'מערכת הודעות',
	'prefs-echo' => 'הודעות',
	'echo-pref-notify-watchlist' => 'לרשום אותי להודעות על עריכה כאשר אני מוסיף דפים לרשימת המעקב שלי.',
	'echo-no-agent' => '[לא צוין]',
	'echo-no-title' => '[ללא דף]',
	'echo-error-no-formatter' => 'לא הוגדת עיצוב להודעות',
	'notifications' => 'הודעות',
	'echo-specialpage' => 'ההודעות שלי',
	'echo-anon' => 'כדי לקבל הודעות, [[Special:Userlogin/signup|יש ליצור חשבון]] או [[Special:UserLogin|להיכנס]].',
	'echo-none' => 'לא קיבלת הודעות לאחרונה!',
	'notification-edit' => '$2 {{GENDER:$1|ערך|ערכה}} את הדף [[$3]] $4: "$5"',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|ערך|ערכה}} את [[User talk:$4|דף השיחה שלך]] $3: $5',
	'notification-add-comment' => '$2 {{GENDER:$1|הגיב|הגיבה}} על "[[$4|$3]]" בדף השיחה "$5"',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|יצר|יצרה}} את הנושא החדש "$3" בדף [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|שלח|שלחה}} לך הודעה: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|הגיב|הגיבה}} על "[[$4#$3|$3]]" בדף השיחה שלך',
	'notification-new-user' => 'ברוך בואך ל{{GRAMMAR:תחילית|{{SITENAME}}}}, $1!',
	'notification-new-user-content' => 'שלום $1 וברוך בואך ל{{GRAMMAR:תחילית|{{SUTENAME}}}}.<br />
נא לזכור לחתום על כל דפי השיחה ב־4 טילדות (~~~~).',
	'notification-reverted' => '$2 {{GENDER:$1|שחזרה|שחזרה}} את {{PLURAL:$6|עריכתך|עריכותיך}} בדף [[$3]] $4: "$5"',
	'notification-edit-email-subject' => 'הודעה מאתר {{SITENAME}}: הדף $3 נערך על־ידי $2',
	'notification-edit-email-body' => 'שלום $5,
זוהי הודעה כדי לידע אותך ש$2 {{GENDER:$2|ערך|ערכה}} את עמוד ה{{SITENAME}} "$3".

$2 {{GENDER:$2|סיכם|סיכמה}} את העריכה עם ההערה הבעאה: $6

אפשר לראות את השינויים ש$2 {{GENDER:$2|עשה|עשתה}} בקישור זה:
<$4>

קיבלת הודעה זו בגלל שנרשמת לקבל עידכונים באימייל על שינויים בדף זה.

תודה שהשתמשת ב{{SITENAME}}
מערכת ההודעות של{{SITENAME}}',
	'notification-edit-talk-page-email-subject' => 'דף השיחה שלך באתר {{SITENAME}} נערך עלֹ־ידי $2',
	'notification-edit-talk-page-email-body' => 'שלום $4,
זוהי הודעה כדי לידע אותך ש$2 {{GENDER:$2|ערך|ערכה}} את דף השיחה שלך ב{{SITENAME}}.

ב{{SITENAME}}, דף השיחה שלך הינו מקום בו משתמשים אחרים יכולים להשאיר לך הודעות.

אפשר לראות את השינויים ש$2 {{GENDER:$2|עשה|עשתה}} בקישור זה:
<$3>

תודה שהשתמשת ב{{SITENAME}}
מערכת ההודעות של{{SITENAME}}', # Fuzzy
	'notification-reverted-email-subject' => 'הודעת {{SITENAME}}: $2 {{GENDER:$1|שחזרה|שחזרה}} את עריכתך בדף $3: $4', # Fuzzy
	'echo-email-subject-default' => 'הודעה חדשה באתר {{SITENAME}}',
	'echo-email-body-default' => 'יש לך הודעה חדשה באתר {{SITENAME}}:

$1',
	'echo-link-new' => '{{PLURAL:$1|הודעה אחת חדשה|$1 הודעות חדשות}}',
	'echo-link' => 'ההודעות שלי',
	'echo-overlay-link' => 'על ההודעות...',
	'echo-overlay-title' => 'ההודעות שלי',
);

/** Upper Sorbian (hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'echo-desc' => 'Zdźělenski system',
	'prefs-echo' => 'Zdźělenki',
	'echo-pref-notify-watchlist' => 'Abonować, zo by zdźělenki wobdźěłał, hdyž strony swojim wobkedźbowankach přidawam.',
	'echo-no-agent' => '[Nichtó]',
	'echo-no-title' => '[Žana strona]',
	'echo-error-no-formatter' => 'Za zdźělenje njeje so formatowanje definowało',
	'notifications' => 'Zdźělenki',
	'echo-specialpage' => 'Moje zdźělenki',
	'echo-anon' => 'Zo by zdźělenki dóstał, dyrbiš [[Special:Userlogin/signup|konto załožić]] abo [[Special:UserLogin|so přizjewić]].',
	'echo-none' => 'W poslednim času njejsy žane zdźělenki dóstał!',
	'notification-edit' => '$2 je [[$3]] $4: "$5" {{GENDER:$1|wobdźěłał|wobdźěłała}}',
	'notification-edit-talk-page' => '$2 jo [[User talk:$4|twoju diskusijnu stronu]] {{GENDER:$1|wobdźěłał|wobdźěłała}} $3: "$5"',
	'notification-add-comment' => '$2 je "[[$4|$3]]" na diskusijnej stronje "$5" {{GENDER:$1|komentował|komentowała}}',
	'notification-add-talkpage-topic' => '$2 je nowu temu "$3" na [[$4]] {{GENDER:$1|započał|započała}}',
	'notification-add-talkpage-topic-yours' => '$2 je ći powěsć {{GENDER:$1|pósłał|pósłała}}: [[$4#$3|$3]]',
	'notification-add-comment-yours' => '$2 je "[[$4#$3|$3]]" na twojej diskusijnej stronje {{GENDER:$1|komentował|komentowała}}',
	'notification-new-user' => 'Witaj do {{GRAMMAR:genitiw|{{SITENAME}}}}, $1!',
	'notification-new-user-content' => 'Halo $1, a witaj do {{GRAMMAR:genitiw|{{SITENAME}}}}.<br />
Prošu njezabudź komentary na diskusijnych stronach z 4 tildami (~~~~) podpisać .',
	'notification-reverted' => '$2 je {{PLURAL:$6|1=změnu|změny}} na [[$3]] $4 {{GENDER:$1|anulował|anulowała}}: "$5"',
	'notification-edit-email-subject' => 'Zdźělenka z {{GRAMMAR:genitiw|{{SITENAME}}}}: $3 je so wot $2 wobdźěłał',
	'notification-edit-email-body' => 'Witaj $5,

to je zdźělenka, kotraž će informuje, zo $2 je stronu $3 na {{GRAMMAR:lokatiw|{{SITENAME}}}} wobdźěłał.

$2 je swoje změny z tutym komentarom zjał: $6

Móžeš změny, kotrež $2 přewjedźe, přez slědowacy wotkaz widźeć:
<$4>

Přijimaš tutu zdźělenku, dokelž sy e-mejlowe aktualizacije wo změnach na tutej stronje abonował.

Dźakujemy so, zo {{GRAMMAR:akuzatiw|{{SITENAME}}}} wužiwaš.
Zdźělenski system {{GRAMMAR:genitiw|{{SITENAME}}}}',
	'notification-edit-talk-page-email-subject' => 'Twoja diskusijna strona na {{GRAMMAR:lokatiw|{{SITENAME}}}} je so wot $2 wobdźěłała',
	'notification-edit-talk-page-email-body' => 'Witaj $4,
to je zdźělenka, kotraž će informuje, zo $2 je twoju diskusijnu stronu na {{GRAMMAR:lokatiw|{{SITENAME}}}} wobdźěłał.

Twoja duskusijna strona je na {{GRAMMAR:lokatiw|{{SITENAME}}}}  te městno, hdźež wužiwarjo móža ći powěsće zawostajić.

$2 je slědowace zjeće wužił, zo by swoju změnu wopisał: $5

Změny, kotrež $2 přewjedźe, móžeš přez slědowacy wotkaz widźeć:
<$3>

Dźakujemy so, zo {{GRAMMAR:akuzatiw|{{SITENAME}}}} wužiwaš.
Zdźělenski system {{GRAMMAR:genitiw|{{SITENAME}}}}',
	'notification-reverted-email-subject' => 'Zdźělenje přez {{GRAMMAR:akuzatiw|{{SITENAME}}}}: $2 je wašu změny na $3 anulował: $4',
	'notification-reverted-email-body' => 'Witaj $5,

to je zdźělenka, kotraž će informuje, zo $2 je twoje změny  na stronje $3 w {{GRAMMAR:lokatiw|{{SITENAME}}}} anulował.

$2 je slědowace zjeće wužił, zo by swoju změnu wopisał: $6

Móžeš změny, kotrež $2 přewjedźe, zo by twoje změny anulował, přez slědowacy wotkaz widźeć:
<$4>

Přijimaš tutu zdźělenku, dokelž sy e-mejlowe zdźělenki wo anulowanych změnach abonował.

Dźakujemy so, zo {{GRAMMAR:akuzatiw|{{SITENAME}}}} wužiwaš.
Zdźělenski system {{GRAMMAR:genitiw|{{SITENAME}}}}',
	'echo-email-subject-default' => 'Nowa zdźělenka na {{GRAMMAR:lokatiw|{{SITENAME}}}}',
	'echo-email-body-default' => 'Maš nowu zdźělenku na {{GRAMMAR:lokatiw|{{SITENAME}}}}:

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nowa zdźělenka|nowej zdźělence|nowe zdźělenki|nowych zdźělenkow}}',
	'echo-link' => 'Moje zdźělenki',
	'echo-overlay-link' => 'Wšě zdźělenki...',
	'echo-overlay-title' => 'Moje zdźělenki',
);

/** Hungarian (magyar)
 * @author Dj
 */
$messages['hu'] = array(
	'prefs-echo' => 'Értesítések',
	'notifications' => 'Értesítések',
	'echo-specialpage' => 'Értesítéseim',
	'echo-link' => 'Értesítéseim',
	'echo-overlay-link' => 'Összes értesítés…',
	'echo-overlay-title' => 'Értesítéseim',
);

/** Interlingua (interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'echo-desc' => 'Systema de notificationes',
	'prefs-echo' => 'Notificationes',
	'echo-pref-notify-watchlist' => 'Subscriber me pro modificar notificationes quando io adde paginas a mi observatorio.',
	'echo-no-agent' => '[Nemo]',
	'echo-no-title' => '[Sin titulo]', # Fuzzy
	'notifications' => 'Notificationes',
	'echo-specialpage' => 'Mi notificationes',
	'echo-anon' => 'Pro reciper notificationes, [[Special:Userlogin/signup|crea un conto]] o [[Special:UserLogin|aperi session]].',
	'echo-none' => 'Tu non ha recipite notificationes recentemente.',
	'notification-edit' => '$2 {{GENDER:$1|modificava}} [[$3]] $4', # Fuzzy
	'notification-edit-talk-page' => '$2 {{GENDER:$1|modificava}} [[User talk:$4|tu pagina de discussion]] $3', # Fuzzy
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
	'echo-link' => 'Mi notificationes',
	'echo-overlay-link' => 'Tote le notificationes…',
	'echo-overlay-title' => 'Mi notificationes',
);

/** Italian (italiano)
 * @author Beta16
 * @author Darth Kule
 */
$messages['it'] = array(
	'echo-desc' => 'Sistema per le notifiche',
	'prefs-echo' => 'Notifiche',
	'echo-pref-notify-watchlist' => 'Modifica le mie notifiche quando aggiungo pagine ai miei osservati speciali.',
	'echo-no-agent' => '[Nessuno]',
	'echo-no-title' => '[Nessuna pagina]',
	'echo-error-no-formatter' => 'Nessuna formattazione definita per le notifiche',
	'notifications' => 'Notifiche',
	'echo-specialpage' => 'Mie notifiche',
	'echo-anon' => "Per ricevere le notifiche, [[Special:Userlogin/signup|crea un account]] o [[Special:UserLogin|effettua l'accesso]].",
	'echo-none' => 'Non hai ricevuto notifiche ultimamente!',
	'notification-edit' => '$2 {{GENDER:$1|ha modificato}} [[$3]] $4: "$5"',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|ha modificato}} la tua [[User talk:$4|pagina di discussione]] $3: "$5"',
	'notification-add-comment' => '$2 {{GENDER:$1|ha commentato}} riguardo a "[[$4|$3]]" nella pagina di discussione di "$5"',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|ha inserito}} un nuovo argomento "$3" su [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 ti {{GENDER:$1|ha inviato}} un messaggio: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|ha commentato}} riguardo a "[[$4#$3|$3]]" nella tua pagina di discussione',
	'notification-new-user' => 'Benvenuto su {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Ciao $1 e benvenuto su {{SITENAME}}.<br />
Ricordati di firmare i commenti nelle pagine di discussione con quattro tildi (~~~~).',
	'notification-reverted' => '$2 {{GENDER:$1|ha annullato}} {{PLURAL:$6|1=la tua modifica|le tue modifiche}} su [[$3]] $4: "$5"',
	'notification-edit-email-subject' => 'Notifica di {{SITENAME}}: $3 è stata modificata da $2',
	'notification-edit-email-body' => 'Ciao $5,
Questa è una notifica per farti sapere che $2 ha modificato la pagina di {{SITENAME}} $3.

$2 ha commentato le sue modifiche con questo oggetto: $6

Puoi vedere le modifiche che $2 ha fatto seguendo questo collegamento:
<$4>

Stai ricevendo questo messaggio perché hai sottoscritto gli aggiornamenti tramite email per le modifiche a questa pagina.

Grazie per usare {{SITENAME}}
Il sistema di notifica di {{SITENAME}}',
	'notification-edit-talk-page-email-subject' => 'La pagina di discussione su {{SITENAME}} è stata modificata da $2',
	'notification-edit-talk-page-email-body' => 'Ciao $4,
Questa è una notifica per farti sapere che $2 ha modificato la tua pagina di discussione su {{SITENAME}}.

Su {{SITENAME}}, la pagina di discussione è dove altri utenti possono lasciarti messaggi.

$2 ha commentato le sue modifiche con questo oggetto: $5

Puoi vedere le modifiche che $2 ha fatto seguendo questo collegamento:
<$3>

Grazie per usare {{SITENAME}}
Il sistema di notifica di {{SITENAME}}',
	'notification-reverted-email-subject' => 'Notifica di {{SITENAME}}: $2 ha annullato le tue modifiche su $3: $4',
	'notification-reverted-email-body' => 'Ciao $5,
Questa è una notifica per farti sapere che $2 ha annullato le tue modifiche alla pagina di {{SITENAME}} $3.

$2 ha commentato le sue modifiche con questo oggetto: $6

Puoi vedere le modifiche che $2 ha fatto seguendo questo collegamento:
<$4>

Stai ricevendo questo messaggio perché hai sottoscritto gli aggiornamenti tramite email per le modifiche a questa pagina.

Grazie per usare {{SITENAME}}
Il sistema di notifica di {{SITENAME}}',
	'echo-email-subject-default' => 'Nuova notifica su {{SITENAME}}',
	'echo-email-body-default' => 'Hai una nuova notifica su {{SITENAME}}:

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nuova notifica|nuove notifiche}}',
	'echo-link' => 'mie notifiche',
	'echo-overlay-link' => 'Tutte le notifiche...',
	'echo-overlay-title' => 'Mie notifiche',
);

/** Japanese (日本語)
 * @author Shirayuki
 */
$messages['ja'] = array(
	'echo-desc' => '通知システム',
	'prefs-echo' => '通知',
	'echo-error-no-formatter' => '通知の書式が定義されていません',
	'notifications' => '通知',
	'echo-specialpage' => '自分の通知',
	'notification-edit' => '$2 が [[$3]] $4 を{{GENDER:$1|編集しました}}:「$5」',
	'notification-edit-talk-page' => '$2 が[[User talk:$4|あなたのトークページ]]を{{GENDER:$1|編集しました}} $3:「$5」',
	'notification-add-comment' => '$2 がトークページ「$5」の「[[$4|$3]]」に{{GENDER:$1|コメントしました}}',
	'notification-add-talkpage-topic-yours' => '$2 があなたにメッセージを{{GENDER:$1|送信しました}}:「[[$4#$3|$3]]」',
	'notification-add-comment-yours' => '$2 があなたのトークページの「[[$4#$3|$3]]」に{{GENDER:$1|コメントしました}}',
	'notification-new-user' => '$1さん、{{SITENAME}}にようこそ!',
	'notification-reverted' => '$2 が [[$3]] のあなたの{{PLURAL:$6|編集}}を{{GENDER:$1|取り消しました}} $4:「$5」',
	'notification-edit-email-subject' => '{{SITENAME}}からの通知: $3 を $2 が編集しました',
	'notification-edit-talk-page-email-subject' => '{{SITENAME}}のあなたのトークページを $2 が編集しました',
	'notification-reverted-email-subject' => '{{SITENAME}} からの通知: $3 でのあなたの編集を $2 が取り消しました: $4',
	'echo-email-subject-default' => '{{SITENAME}}での新しい通知',
	'echo-email-body-default' => '{{SITENAME}}で新しい通知があります:

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|件の新しい通知}}',
	'echo-link' => '自分の通知',
	'echo-overlay-link' => 'すべての通知…',
	'echo-overlay-title' => '自分の通知',
);

/** Javanese (Basa Jawa)
 * @author NoiX180
 */
$messages['jv'] = array(
	'echo-desc' => 'Infrastruktur wara-wara gènèrasi ngarep kanggo MediaWiki', # Fuzzy
	'prefs-echo' => 'Wara-wara',
	'echo-pref-notify-watchlist' => 'Langganan kanggo nyunting wara-wara nalika Kula nambahaké kaca nèng daptar pangawasan kula.',
	'echo-no-agent' => '[Dudu sapa-sapa]',
	'echo-no-title' => '[Ora ana judhul]', # Fuzzy
	'notifications' => 'Wara-wara',
	'echo-specialpage' => 'Wara-wara kula',
	'echo-anon' => 'Kanggo nampa wara-wara [[Special:Userlogin/signup|gawé akun]] utawa [[Special:UserLogin|mlebu log]].',
	'echo-none' => 'Sampéyan durung nampa wara-wara apa-apa.',
	'notification-edit' => '$2 {{GENDER:$1|nyunting}} [[$3]] $4',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|nyunting}} [[User talk:$4|kaca guneman Sampéyan]] $3',
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
	'echo-link' => 'Wara-wara kula',
	'echo-overlay-link' => 'Kabèh wara-wara...',
	'echo-overlay-title' => 'Wara-wara kula',
);

/** Georgian (ქართული)
 * @author David1010
 */
$messages['ka'] = array(
	'prefs-echo' => 'შეტყობინებები',
	'echo-no-agent' => '[არავინ]',
	'echo-no-title' => '[უსათაურო]', # Fuzzy
	'notifications' => 'შეტყობინებები',
	'echo-specialpage' => 'ჩემი შეტყობინებები',
	'echo-link' => 'ჩემი შეტყობინებები',
	'echo-overlay-link' => 'ყველა შეტყობინება…',
	'echo-overlay-title' => 'ჩემი შეტყობინებები',
);

/** Korean (한국어)
 * @author 아라
 */
$messages['ko'] = array(
	'echo-desc' => '알림 시스템',
	'prefs-echo' => '알림',
	'echo-pref-notify-watchlist' => '내 주시문서 목록에 문서를 추가할 때 알림 편집을 구독합니다.',
	'echo-no-agent' => '[알 수 없는 사용자]',
	'echo-no-title' => '[문서 없음]',
	'echo-error-no-formatter' => '알림에 대해 정의한 형식이 없습니다',
	'notifications' => '알림',
	'echo-specialpage' => '내 알림',
	'echo-anon' => '알림을 받으려면 [[Special:Userlogin/signup|계정을 만들거나]] [[Special:UserLogin|로그인하세요]].',
	'echo-none' => '최근에 알림을 받지 않았습니다.',
	'notification-edit' => '$2 사용자가 [[$3]] 문서를 {{GENDER:$1|편집했습니다}} $4: "$5"',
	'notification-edit-talk-page' => '$2 사용자가 [[User talk:$4|당신의 토론 문서]] 문서를 {{GENDER:$1|편집했습니다}} $3: "$5"',
	'notification-add-comment' => '$2 사용자가 "$5" 토론 문서의 "[[$4|$3]]"에 {{GENDER:$1|덧글을 남겼습니다}}',
	'notification-add-talkpage-topic' => '$2 사용자가 [[$4]]에 "$3" 새 주제를 {{GENDER:$1|게시했습니다}}',
	'notification-add-talkpage-topic-yours' => '$2 사용자가 메시지를 {{GENDER:$1|보냈습니다}}: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 사용자가 당신의 토론 문서의 "[[$4#$3|$3]]"에 {{GENDER:$1|덧글을 남겼습니다}}',
	'notification-new-user' => '$1, {{SITENAME}}에 온 것을 환영합니다!',
	'notification-new-user-content' => '$1 안녕하세요, {{SITENAME}}에 온 것을 환영합니다.<br />
토론 문서에서 글을 쓴 후에는 물결표 4개(~~~~)를 넣어 서명하는 것을 기억하세요.',
	'notification-reverted' => '$2 사용자가 [[$3]]에 대한 당신의 {{PLURAL:$6|1=편집|편집}}을 {{GENDER:$1|되돌렸습니다}} $4: "$5"',
	'notification-edit-email-subject' => '{{SITENAME}} 알림: $3 문서를 $2에 의해 편집함',
	'notification-edit-email-body' => '$5 안녕하세요.
$2 사용자가 {{SITENAME}} $3 문서를 편집했음을 알립니다.

$2 사용자가 이 덧글로 바뀜을 요약했습니다: $6

이 링크를 통해 $2 사용자에 의한 바뀜을 볼 수 있습니다:
<$4>

이 문서의 바뀜에 대해 이메일 업데이트에 구독했기 때문에 이 메시지를 보내드립니다.

{{SITENAME}}(을)를 사용해 주셔서 감사합니다
{{SITENAME}} 알림 시스템',
	'notification-edit-talk-page-email-subject' => '당신의 {{SITENAME}} 토론 문서를 $2에 의해 편집함',
	'notification-edit-talk-page-email-body' => '$4 안녕하세요.
$2 사용자가 {{SITENAME}}에 당신의 토론 문서를 편집했음을 알립니다.

{{SITENAME}}에서 당신의 토론 문서는 다른 사용자가 메시지를 남길 수 있는 곳입니다.

$2 사용자가 다음 요약으로 바뀜을 설명했습니다: $5

이 링크에서 $2 사용자에 의한 바뀜을 볼 수 있습니다:
<$3>

{{SITENAME}}(을)를 사용해 주셔서 감사합니다
{{SITENAME}} 알림 시스템',
	'notification-reverted-email-subject' => '{{SITENAME}} 알림: $2 사용자가 $3에 대한 당신의 편집을 되돌렸습니다: $4',
	'notification-reverted-email-body' => '$5 안녕하세요.
$2 사용자가 {{SITENAME}} $3 문서에 당신의 편집을 되돌렸음을 알립니다.

$2 사용자가 다음 요약으로 바뀜을 설명했습니다: $6

이 링크를 통해 당신의 편집을 되돌린 $2 사용자에 의한 바뀜을 볼 수 있습니다:
<$4>

당신이 편집한 문서를 되돌릴 때 이메일 업데이트에 구독했기 때문에
이 메시지를 보내드립니다.

{{SITENAME}}(을)를 사용해 주셔서 감사합니다
{{SITENAME}} 알림 시스템',
	'echo-email-subject-default' => '{{SITENAME}}에서 새 알림',
	'echo-email-body-default' => '{{SITENAME}}에서 새 알림이 있습니다:

$1',
	'echo-link-new' => '새 {{PLURAL:$1|알림}} $1개',
	'echo-link' => '내 알림',
	'echo-overlay-link' => '모든 알림…',
	'echo-overlay-title' => '내 알림',
);

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'echo-desc' => 'Süßtehm för Medeilonge',
	'prefs-echo' => 'Meddeilonge',
	'echo-pref-notify-watchlist' => 'Lohß mech Meddeilonge maache, wann esch Sigge op ming Oppaßlėß donn.',
	'echo-no-agent' => '[Keine]',
	'echo-no-title' => '[Kein Sigg]',
	'notifications' => 'Meddeilonge',
	'echo-specialpage' => 'Ming Meddeilonge',
	'echo-anon' => 'Do moß Desch [[Special:Userlogin/signup|aanmälde]] udder [[Special:UserLogin|enlogge]], öm Medeilonge krijje ze künne.',
	'echo-none' => 'Ende läzde Zigg häß De kein Medeilonge krääje.',
	'notification-edit' => '{{GENDER:$1|Dä|Dat|Dä Metmaacher|De|Dat}} $2 hät jät op dä Sigg „[[$3]]“ jeändert: $4',
	'notification-edit-talk-page' => '{{GENDER:$1|Dä|Dat|Dä Metmaacher|De|Dat}} $2 hät jät op [[User talk:$4|Ding Klaafsigg]] jeschrevve: $3',
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
Et Süßtehm vör Medeilong {{GRAMMAR:genive|{{ucfirst:{{SITENAME}}}}}}',
	'notification-edit-talk-page-email-subject' => 'Ding Klaafsigg {{GRAMMAR:dative en|{{ucfirst:{{SITENAME}}}}}} wood {{GENDER:$2|vum|vum|vum_Metmaacher|vun dä|vum}} $2 jeändert.',
	'notification-edit-talk-page-email-body' => 'Daach $4,
Dat heh es en Medeilong, öm Desch weßße ze lohße, dat Ding Klaafsigg op {{GRAMMAR:dative|{{ucfirst:{{SITENAME}}}}}} {{GENDER:$2|vum|vum|vum_Metmaacher|vun dä|vum}} $2 jeändert woode es.

Ding Klaadsigg {{GRAMMAR:dative+em|{{ucfirst:{{SITENAME}}}}}} es doför doh, dat Der ander Lück Nohreeschte drop schriive künne.

Do kann de Änderonge övver heh dä Lengk beloore:
<$3>

Mer bedanke ons för et Metmaache op {{GRAMMAR:dative|{{ucfirst:{{SITENAME}}}}}}.
Et Süßtehm vör Medeilong {{GRAMMAR:genive|{{ucfirst:{{SITENAME}}}}}}',
	'echo-email-subject-default' => 'En neue Medeilong op {{GRAMMAR:dative|{{ucfirst:{{SITENAME}}}}}}',
	'echo-email-body-default' => 'Do häss_en neue Medeilong op {{GRAMMAR:dative|{{ucfirst:{{SITENAME}}}}}}:

$1',
	'echo-link-new' => '{{PLURAL:$1|Ein neue Medeilong|$1 neue Medeilonge|Kein neue Medeilong}}',
	'echo-link' => 'Ming Medeilonge',
	'echo-overlay-link' => 'Alle Medeilonge{{int:ellipsis}}',
	'echo-overlay-title' => 'Ming Medeilonge',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'echo-desc' => 'Notifikatiouns-System',
	'prefs-echo' => 'Notifikatiounen',
	'echo-no-agent' => '[Keen]',
	'echo-no-title' => '[Keen Säit]',
	'notifications' => 'Notifikatiounen',
	'echo-specialpage' => 'Meng Notifikatiounen',
	'echo-anon' => 'Fir Notifikatiounen ze kréien, [[Special:Userlogin/signup|maacht e Benotzerkont op]] oder [[Special:UserLogin|loggt Iech an]]',
	'echo-none' => 'Dir hutt keng Notifikatioune mat Verspéidung kritt!',
	'notification-edit' => '$2 {{GENDER:$1|huet}} [[$3]] $4: "$5" geännert',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|huet}} [[User talk:$4|Är Diskussiounssäit]] $3: "$5" geännert',
	'notification-new-user' => 'Wëllkomm op {{SITENAME}}, $1!',
	'notification-edit-email-subject' => '{{SITENAME}}-Notifikatioun: $3 gouf vum $2 geännert',
	'notification-edit-talk-page-email-subject' => 'Är {{SITENAME}} Diskussiounssäit gouf vum $2 geännert',
	'echo-email-subject-default' => 'Nei Notifikatioun op {{SITENAME}}',
	'echo-email-body-default' => 'Dir hutt eng nei Notifikatioun op {{SITENAME}}:

$1',
	'echo-link-new' => '$1 nei {{PLURAL:$1|Notifikatioun|Notifikatiounen}}',
	'echo-link' => 'Meng Notifikatiounen',
	'echo-overlay-link' => 'All Notifikatiounen...',
	'echo-overlay-title' => 'Meng Notifikatiounen',
);

/** Lithuanian (lietuvių)
 * @author Eitvys200
 */
$messages['lt'] = array(
	'prefs-echo' => 'Pranešimai',
);

/** Macedonian (македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'echo-desc' => 'Известителен систем',
	'prefs-echo' => 'Известувања',
	'echo-pref-notify-watchlist' => 'Претплати ме за измена на известувањата кога додавам страници во мојот список на набљудувања.',
	'echo-no-agent' => '[Никој]',
	'echo-no-title' => '[Нема страница]',
	'echo-error-no-formatter' => 'Нема зададено форматирање за ова известување',
	'notifications' => 'Известувања',
	'echo-specialpage' => 'Мои известувања',
	'echo-anon' => 'За да добивате известувања, [[Special:Userlogin/signup|направете сметка]] или [[Special:UserLogin|најавете се]].',
	'echo-none' => 'Во последно време немате примено ниедно известување!',
	'notification-edit' => '$2 {{GENDER:$1|ја измени}} страницата [[$3]] $4: „$5“',
	'notification-edit-talk-page' => '$2 ја {{GENDER:$1|измени}} [[User talk:$4|вашата страница за разговор]] $3: „$5“',
	'notification-add-comment' => '$2 {{GENDER:$1|коментираше}} на „[[$4|$3]]“ на страницата за разговор „$5“',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|напиша}} нова тема „$3“ за [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 ви {{GENDER:$1|испрати}} порака: [[$4#$3|$3]]',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|коментираше}} на „[[$4#$3|$3]]“ на вашата страница за разговор',
	'notification-new-user' => 'Добредојдовте на {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Здраво $1, и добредојдовте на {{SITENAME}}.<br />
НЕ заборавајте да си ги потпишувате коментарите на страниците за разговор со 4 тилди (~~~~).',
	'notification-reverted' => '$2 {{GENDER:$1|ја врати}} {{PLURAL:$6|1=вашата измена|вашите измени}} на [[$3]] $4: „$5“',
	'notification-edit-email-subject' => 'Известување од {{SITENAME}}: $2 ја измени страницата $3',
	'notification-edit-email-body' => 'Здраво $5,
Ве известуваме дека $2 ја измени страницата $3 на {{SITENAME}}.

$2 ги опиша промените што ги направи со следниов коментар: $6

Измените што ги направи $2 можете да ги погледате на следнава врска:
<$4>

Соопштениево го добивате бидејќе сте пријавени на известувања по е-пошта во врска со измени на оваа страница.

Ви благодариме што сте корисник на {{SITENAME}}
Известителниот систем на {{SITENAME}}',
	'notification-edit-talk-page-email-subject' => '$2 ја измени вашата страница ра разговор на {{SITENAME}}',
	'notification-edit-talk-page-email-body' => 'Здраво $4,
Ве известуваме дека $2 ја измени вашата страница за разговор на {{SITENAME}}.

Страниците за разговор на {{SITENAME}} служат за оставање пораки на други корисници.

$2 го даде следниов опис на измените што ги направи: $5

Измените што ги направи $2 можете да ги погледате на следнава врска:
<$3>


Ви благодариме што сте корисник на {{SITENAME}}
Известителниот систем на {{SITENAME}}',
	'notification-reverted-email-subject' => 'Известување од {{SITENAME}}: $2 ја врати вашата измена на $3: $4',
	'notification-reverted-email-body' => 'Здраво $5,
Ве известуваме дека $2 ја ги врати вашите измени на страницата $3 на {{SITENAME}}.

$2 ги опиша промените што ги направи со следниов коментар: $6

Измените што ги направи $2 можете да ги погледате на следнава врска:
<$4>

Соопштениево го добивате бидејќе сте пријавени на известувања по е-пошта во врска со измени на оваа страница.

Ви благодариме што сте корисник на {{SITENAME}}
Известителниот систем на {{SITENAME}}',
	'echo-email-subject-default' => 'Ново известување на {{SITENAME}}',
	'echo-email-body-default' => 'Имате ново известување на {{SITENAME}}:

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|ново известување|нови известувања}}',
	'echo-link' => 'Мои известувања',
	'echo-overlay-link' => 'Сите известувања',
	'echo-overlay-title' => 'Мои известувања',
);

/** Malayalam (മലയാളം)
 * @author Praveenp
 */
$messages['ml'] = array(
	'echo-no-agent' => '[ആരുമില്ല]',
	'echo-no-title' => '[തലക്കെട്ടില്ല]', # Fuzzy
	'notifications' => 'അറിയിപ്പുകൾ',
	'echo-specialpage' => 'എനിക്കുള്ള അറിയിപ്പുകൾ',
	'echo-email-subject-default' => '{{SITENAME}} സംരംഭത്തിൽ അറിയിപ്പുണ്ട്',
	'echo-email-body-default' => '{{SITENAME}} സംരംഭത്തിൽ താങ്കൾക്ക് ഒരു അറിയിപ്പുണ്ട്:

$1',
	'echo-link-new' => 'പുതിയ {{PLURAL:$1|അറിയിപ്പ്|$1 അറിയിപ്പുകൾ}}',
	'echo-link' => 'എനിക്കുള്ള അറിയിപ്പുകൾ',
	'echo-overlay-link' => 'എല്ലാ അറിയിപ്പുകളും...',
	'echo-overlay-title' => 'എനിക്കുള്ള അറിയിപ്പുകൾ',
);

/** Malay (Bahasa Melayu)
 * @author Anakmalaysia
 */
$messages['ms'] = array(
	'echo-desc' => 'Sistem pemberitahuan',
	'prefs-echo' => 'Pemberitahuan',
	'echo-pref-notify-watchlist' => 'Langganlah saya untuk menyunting pemberitahuan setiap kali saya menambahkan halaman ke dalam senarai pantau saya.',
	'echo-no-agent' => '[Tiada Sesiapa]',
	'echo-no-title' => '[Tiada halaman]',
	'echo-error-no-formatter' => 'Tiada pemformatan yang ditetapkan untuk pemberitahuan',
	'notifications' => 'Pemberitahuan',
	'echo-specialpage' => 'Pemberitahuan saya',
	'echo-anon' => 'Untuk menerima pemberitahuan, sila [[Special:Userlogin/signup|buka akaun]] atau [[Special:UserLogin|log masuk]].',
	'echo-none' => 'Anda tidak menerima sebarang pemberitahuan akhir-akhir ini.',
	'notification-edit' => '$2 {{GENDER:$1|menyunting}} [[$3]] $4: "$5"',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|menyunting}} [[User talk:$4|halaman perbincangan anda]] $3: "$5"',
	'notification-add-comment' => '$2 {{GENDER:$1|mengulas}} tentang "[[$4|$3]]" pada halaman perbincangan "$5"',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|membuka}} topik baru "$3" di [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|menghantar}} pesanan kepada anda: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|mengulas}} tentang "[[$4#$3|$3]]" pada halaman perbincangan anda',
	'notification-new-user' => 'Selamat datang ke {{SITENAME}}, $1!',
	'notification-new-user-content' => 'Selamat sejahtera diucapkan kepada $1, dan selamat datang ke {{SITENAME}}.<br />
Jangan lupa untuk menandatangani sebarang komen pada halaman perbincangan dengan serentet 4 tanda tilde (~~~~).',
	'notification-reverted' => '$2 {{GENDER:$1|membalikkan}} {{PLURAL:$6|1=suntingan|suntingan-suntingan}} anda di [[$3]] $4: "$5"',
	'notification-edit-email-subject' => 'Pemberitahuan {{SITENAME}}: $3 telah disunting oleh $2',
	'notification-edit-email-body' => '$5,

Sila ambil maklum bahawa $2 telah menyunting halaman $3 di {{SITENAME}}.

$2 merumuskan pengubahannya dengan ulasan yang berikut: $6

Anda boleh melihat suntingan yang dibuat oleh $2 dengan mengikuti pautan ini:
<$4>

Anda menerima pesanan ini kerana anda telah melanggan untuk menerima kemas kini perubahan pada halaman ini melalui e-mel.

Terima kasih kerana menggunakan {{SITENAME}}

Sistem pemberitahuan {{SITENAME}}',
	'notification-edit-talk-page-email-subject' => 'Halaman perbincangan anda di {{SITENAME}} telah disunting oleh $2',
	'notification-edit-talk-page-email-body' => '$4,

Sila ambil maklum bahawa $2 telah menyunting halaman perbincangan anda di {{SITENAME}}.

Di {{SITENAME}}, halaman perbincangan anda adalah di mana pengguna lain boleh meninggalkan pesanan kepada anda.

$2 memerikan pengubahannya dengan ringkasan yang berikut: $5

Anda boleh melihat suntingan yang dibuat oleh $2 dengan mengikuti pautan ini:
<$3>

Terima kasih kerana menggunakan {{SITENAME}}

Sistem pemberitahuan {{SITENAME}}',
	'notification-reverted-email-subject' => 'Pemberitahuan {{SITENAME}}: $2 telah membalikkan suntingan anda di $3: $4',
	'notification-reverted-email-body' => '$5,

Sila ambil maklum bahawa $2 telah membalikkan suntingan anda di halaman $3 di {{SITENAME}}.

$2 menjelaskan pengubahannya dengan ringkasan yang berikut: $6

Anda boleh melihat perubahan yang dibuat oleh $2 untuk membalikkan hasil suntingan anda dengan mengikuti pautan ini:
<$4>

Anda menerima pesanan ini kerana anda telah melanggan peringatan e-mel apabila suntingan anda dibalikkan.

Terima kasih kerana menggunakan {{SITENAME}}

Sistem pemberitahuan {{SITENAME}}.',
	'echo-email-subject-default' => 'Pemberitahuan baru di {{SITENAME}}',
	'echo-email-body-default' => 'Anda menerima pemberitahuan baru di {{SITENAME}}:

$1',
	'echo-link-new' => '$1 pemberitahuan baru',
	'echo-link' => 'Pemberitahuan saya',
	'echo-overlay-link' => 'Semua pemberitahuan…',
	'echo-overlay-title' => 'Pemberitahuan saya',
);

/** Maltese (Malti)
 * @author Chrisportelli
 */
$messages['mt'] = array(
	'echo-desc' => "Infrastruttura ta' ġenerazzjoni ġdida għan-notifiki fuq MediaWiki", # Fuzzy
	'prefs-echo' => 'Notifiki',
	'echo-pref-notify-watchlist' => "Immodifika l-modifiki tiegħi meta nżid paġni fil-lista ta' osservazzjonijiet tiegħi.",
	'echo-no-agent' => '[Ħadd]',
	'echo-no-title' => '[L-ebda titlu]', # Fuzzy
	'notifications' => 'Notifiki',
	'echo-specialpage' => 'Notifiki tiegħi',
	'echo-anon' => 'Sabiex tirċievi notifiki, [[Special:Userlogin/signup|oħloq kont]] jew [[Special:UserLogin|illoggja]].',
	'echo-none' => 'Riċentament ma rċevejtx l-ebda notifika.',
	'notification-edit' => '$2 {{GENDER:$1|immodifika|immodifikat}} [[$3]] $4',
	'notification-edit-talk-page' => "$2 {{GENDER:$1|immodifika|immodifikat}} il-[[User talk:$4|paġna ta' diskussjoni tiegħek]] $3",
	'notification-add-comment' => '$2 {{GENDER:$1|ikkummenta|ikkummentat}} fuq "[[$4|$3]]" fil-paġna ta\' diskussjoni ta\' "$5"',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|daħħal|daħħlet}} suġġett ġdid "$3" fuq [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|bagħtlek|bagħtitlek}} messaġġ: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|ikkummenta|ikkummentat}} fuq "[[$4#$3|$3]]" fil-paġna ta\' diskussjoni tiegħek',
	'notification-edit-email-subject' => "Notifika ta' {{SITENAME}}: $3 ġiet modifikata minn $2",
	'notification-edit-email-body' => "Insellimlek $1,
Din hija notifika sabiex ngħarrfuk li $2 immodifika l-paġna $3 fuq {{SITENAME}}.

Tista' tara t-tibdil li $2 għamel billi ssegwi din il-ħolqa:
<$4>

Inti qiegħed tirċievi dan il-messaġġ minħabba li abbonajt għall-aġġornamenti permezz tal-posta elettronika għat-tibdil li jsir fuq din il-paġna.

Grazzi talli qiegħed tuża {{SITENAME}}
Is-sistema ta' notifika ta' {{SITENAME}}", # Fuzzy
	'notification-edit-talk-page-email-subject' => "Il-paġna ta' diskussjoni tiegħek fuq {{SITENAME}} ġiet modifikata minn $2",
	'notification-edit-talk-page-email-body' => "Insellimlek $4,
Din hija notifika sabiex ngħarrfuk li $2 immodifika l-paġna ta' diskussjoni tiegħek fuq {{SITENAME}}.

Fuq {{SITENAME}}, il-paġna ta' diskussjoni huwa dak il-post fejn utenti oħra jistgħu jħallulek messaġġi.

Tista' tara t-tibdil li $2 għamel billi ssegwi din il-ħolqa:
<$3>

Grazzi talli qiegħed tuża {{SITENAME}}
Is-sistema ta' notifika ta' {{SITENAME}}",
	'echo-email-subject-default' => 'Notifika ġdida fuq {{SITENAME}}',
	'echo-email-body-default' => 'Għandek notifika ġdida fuq {{SITENAME}}:

$1',
	'echo-link-new' => '{{PLURAL:$1|notifika ġdida|$1 notifiki ġodda}}',
	'echo-link' => 'Notifiki tiegħi',
	'echo-overlay-link' => 'Notifiki kollha…',
	'echo-overlay-title' => 'Notifiki tiegħi',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'echo-desc' => 'Meldingensysteem',
	'prefs-echo' => 'Meldingen',
	'echo-pref-notify-watchlist' => "Mijn abonneren op meldingen over bewerkingen als ik pagina's aan mijn volglijst toevoeg.",
	'echo-no-agent' => '[Niemand]',
	'echo-no-title' => '[Geen pagina]',
	'notifications' => 'Meldingen',
	'echo-specialpage' => 'Mijn meldingen',
	'echo-anon' => '[[Special:Userlogin/signup|Maak een gebruiker aan]] of [[Special:UserLogin|meld u aan]] als u meldingen wilt ontvangen.',
	'echo-none' => 'U hebt de laatste tijd geen meldingen ontvangen!',
	'notification-edit' => '$2 {{GENDER:$1|heeft}} [[$3]] bewerkt $4: "$5"',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|heeft}} [[User talk:$4|uw overlegpagina]] bewerkt $3: "$5"',
	'notification-add-comment' => '$2 {{GENDER:$1|heeft}} gereageerd op "[[$4|$3]]" op de overlegpagina "$5"',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|heeft}} een nieuw onderwerp "$3" geplaatst op [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|heeft}} u een bericht gezonden: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|heeft}} gereageerd op "[[$4#$3|$3]]" op uw overlegpagina',
	'notification-new-user' => 'Welkom op {{SITENAME}}, $1!',
	'notification-new-user-content' => "Hallo $1 en welkom op {{SITENAME}}.<br />
Vergeet niet om opmerkingen over overlegpagina's te ondertekenen met 4 tildes (~~~~).",
	'notification-reverted' => '$2 {{GENDER:$1|heeft}} uw {{PLURAL:$6|1=bewerking|bewerkingen}} teruggedraaid op [[$3]] $4: "$5"',
	'notification-edit-email-subject' => 'Melding van {{SITENAME}}: $3 is bewerkt door $2',
	'notification-edit-email-body' => 'Hallo $5,

Dit is een melding om u te laten weten dat $2 de pagina $3 op {{SITENAME}} heeft bewerkt.

U kunt de wijzigingen die $2 heeft gemaakt bekijken via de volgende verwijzing:
<$4>

U ontvangt dit bericht omdat u bent geabonneerd op meldingen via e-mail voor deze pagina.

Dank u wel voor het gebruiken van {{SITENAME}}
Het meldingensysteem van {{SITENAME}}', # Fuzzy
	'notification-edit-talk-page-email-subject' => 'Uw overlegpagina op {{SITENAME}} is bewerkt door $2',
	'notification-edit-talk-page-email-body' => 'Hallo $4,

Dit is een melding om u te laten weten dat $2 uw overlegpagina op {{SITENAME}} heeft bewerkt.
This is a notification to let you know that $2 has edited your talk page on {{SITENAME}}.

Uw overlegpagina is de plaats op {{SITENAME}} waar andere gebruikers berichten voor u achter kunnen laten.

U kunt de wijzigingen die $2 heeft gemaakt bekijken via de volgende verwijzing:
<$3>

Dank u wel voor het gebruiken van {{SITENAME}}
Het meldingensysteem van {{SITENAME}}', # Fuzzy
	'echo-email-subject-default' => 'Nieuwe melding op {{SITENAME}}',
	'echo-email-body-default' => 'U hebt een nieuwe melding op {{SITENAME}}:

$1',
	'echo-link-new' => '{{PLURAL:$1|1 nieuwe melding|$1 nieuwe meldingen}}',
	'echo-link' => 'Mijn meldingen',
	'echo-overlay-link' => 'Alle meldingen…',
	'echo-overlay-title' => 'Mijn meldingen',
);

/** Polish (polski)
 * @author Ankry
 * @author BeginaFelicysym
 * @author Przemub
 */
$messages['pl'] = array(
	'echo-desc' => 'Powiadomienie o infrastrukturze nowej generacji dla MediaWiki', # Fuzzy
	'prefs-echo' => 'Powiadomienia',
	'echo-pref-notify-watchlist' => 'Wpisz mnie na listę powiadomień o edycji gdy dodaję strony do śledzonych.',
	'echo-no-agent' => '[Nikt]',
	'echo-no-title' => '[Bez tytułu]', # Fuzzy
	'notifications' => 'Powiadomienia',
	'echo-specialpage' => 'Moje powiadomienia',
	'echo-anon' => 'Aby otrzymywać powiadomienia [[Special:Userlogin/signup|utwórz konto]] lub [[Special:UserLogin|zaloguj się]].',
	'echo-none' => 'Ostatnio nie otrzymano żadnych powiadomień.',
	'notification-edit' => '$2 {{GENDER:$1|edytował|edytowała}} [[$3]] $4',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|edytował|edytowała}} [[User talk:$4|twoją stronę dyskusji]] $3',
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
System powiadomień {{SITENAME}}',
	'notification-edit-talk-page-email-subject' => 'Twoja strona dyskusji na {{GRAMMAR:MS.lp|{{SITENAME}}}} została zmieniona przez $2',
	'notification-edit-talk-page-email-body' => 'Witaj $4,
To jest powiadomienie ze strony {{SITENAME}}. $2 edytował Twoją stronę dyskusji, czyli miejsce, gdzie inni użytkownicy mogą zostawiać Ci wiadomości.

Możesz zobaczyć zmiany dzięki temu linkowi:
<$3>

Dziękujemy za używanie {{SITENAME}}
System powiadomień {{SITENAME}}',
	'echo-email-subject-default' => 'Nowe powiadomienie na {{SITENAME}}',
	'echo-email-body-default' => 'Masz nowe powiadomienie na {{SITENAME}}:

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nowe powiadomienie|nowe powiadomienia|nowych powiadomień}}',
	'echo-link' => 'Moje powiadomienia',
	'echo-overlay-link' => 'Wszystkie powiadomienia...',
	'echo-overlay-title' => 'Moje powiadomienia',
);

/** Piedmontese (Piemontèis)
 * @author Borichèt
 * @author Dragonòt
 */
$messages['pms'] = array(
	'echo-desc' => 'Anfrastrutura ëd notìfica ëd neuva generassion për MediaWiki', # Fuzzy
	'prefs-echo' => 'Notìfiche',
	'echo-pref-notify-watchlist' => "Anscrivme për modifiché le notìfiche quand che mi i gionto dle pàgine a lòn ch'im ten-o sot-euj.",
	'echo-no-agent' => '[Gnun]',
	'echo-no-title' => '[Gnun Tìtoj]', # Fuzzy
	'notifications' => 'Notìfiche',
	'echo-specialpage' => 'Mie notìfiche',
	'echo-anon' => "Për arseive dle notìfiche, [[Special:Userlogin/signup|ch'a crea un cont]] o [[Special:UserLogin|ch'a intra ant ël sistema]].",
	'echo-none' => "It l'has pa arseivù gnun-e notìfiche ultimament.",
	'notification-edit' => "$2 {{GENDER:$1|a l'ha modificà}} [[$3]] $4",
	'notification-edit-talk-page' => "$2 {{GENDER:$1|a l'ha modificà}} [[User talk:$4|soa pàgina ëd ciaciarade]] $3",
	'notification-add-comment' => "$2 {{GENDER:$1|a l'ha comentà}} a propòsit ëd  «[[$4|$3]]» dzora a la pàgina ëd discussion ëd «$5»",
	'notification-add-talkpage-topic' => "$2 {{GENDER:$1|a l'ha publicà}} n'argoment neuv «$3» dzora a [[$4]]",
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|a l\'ha manda}}te un mëssagi: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => "$2 {{GENDER:$1|a l'ha comentà}} a propòsit ëd «[[$4#$3|$3]]» dzora a soa pàgina ëd ciaciarade",
	'notification-new-user' => 'Bin-ëvnù an {{SITENAME}}, $1!',
	'notification-new-user-content' => "Cerea $1, e bin-ëvnù an {{SITENAME}}.<br />
Për piasì, ch'as visa ëd firmé tut coment an sle pàgine ëd discussion con 4 tilde (~~~~).",
	'notification-edit-email-subject' => "Notìfica ëd {{SITENAME}}: $3 a l'é stàita modificà da $2",
	'notification-edit-email-body' => "Cerea $5,
costa a l'é na notìfica për feje savèj che $2 a l'ha modificà la pàgina $3 ëd {{SITENAME}}.

A peul vëdde le modìfiche che $2 a l'ha fàit andasend dré a la liura:
<$4>

A arsèiv ës mëssagi përchè a l'ha sot-ëscrivù ij mësssagin ëd modìfica për le modìfiche a costa pàgina.

Mersì ëd dovré {{SITENAME}}
Ël sistema ëd notìfica ëd {{SITENAME}}",
	'notification-edit-talk-page-email-subject' => "Soa pàgina ëd ciaciarade ëd {{SITENAME}} a l'é stàita modificà da $2",
	'notification-edit-talk-page-email-body' => "Cerea $4,
costa a l'é na notìfica për feje savèj che $2 a l'ha modificà soa pàgina ëd discussion dzora a {{SITENAME}}.

Dzora a {{SITENAME}}, soa pàgina ëd discussion a l'é andoa d'àutri utent a peulo lasseje dij mëssagi.

A peul vëdde le modìfiche che $2 a l'ha fàit an andasendje dapress a la liura:
<$3>

Mersì ëd dovré {{SITENAME}}
Ël sistema ëd notìfica ëd {{SITENAME}}",
	'echo-email-subject-default' => 'Notìfiche neuve a {{SITENAME}}',
	'echo-email-body-default' => "It l'has na notìfica neuva a {{SITENAME}}:

$1",
	'echo-link-new' => '$1 {{PLURAL:$1|notifìca neuva|notifìche neuve}}',
	'echo-link' => 'Mie notìfiche',
	'echo-overlay-link' => 'Tute le notìfiche...',
	'echo-overlay-title' => 'Mie notìfiche',
);

/** Romanian (română)
 * @author Minisarm
 * @author Stelistcristi
 */
$messages['ro'] = array(
	'prefs-echo' => 'Notificări',
	'echo-no-title' => '[Nicio pagină]',
	'notifications' => 'Notificări',
	'echo-specialpage' => 'Notificările mele',
	'echo-link' => 'Notificările mele',
	'echo-overlay-link' => 'Toate notificările...',
	'echo-overlay-title' => 'Notificările mele',
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
 * @author DCamer
 * @author David1010
 * @author Kalan
 */
$messages['ru'] = array(
	'echo-desc' => 'Следующего поколения уведомлений для MediaWiki', # Fuzzy
	'prefs-echo' => 'Уведомления',
	'echo-pref-notify-watchlist' => 'Подписать меня на уведомления при добавлении страниц в мой список наблюдения.',
	'echo-no-agent' => '[Никто]',
	'echo-no-title' => '[Нет название]', # Fuzzy
	'notifications' => 'Уведомления',
	'echo-specialpage' => 'Мои уведомления',
	'echo-anon' => 'Чтобы получать уведомления, [[Special:Userlogin/signup|создайте учетную запись]] или [[Special:Userlogin|представьтесь]].', # Fuzzy
	'echo-none' => 'Вы не получали уведомлений!',
	'notification-edit' => '$2 {{GENDER:$1|отредактировал|отредактировала}} [[$3]] $4',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|отредактировал|отредактировала}} [[User talk:$4|вашу страницу обсуждения]] $3',
	'notification-add-comment' => '$2 {{GENDER:$1|прокомментировал|прокомментировала}} тему «[[$4|$3]]» на странице «$5»',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|добавил|добавила}} тему «$3» на странице «[[$4]]»',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|отправил|отправила}} вам сообщение: «[[$4#$3|$3]]»',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|прокомментировал|прокомментировала}} тему «[[$4#$3|$3]]» на вашей странице обсуждения',
	'notification-edit-email-subject' => 'Уведомление {{SITENAME}}: $3 отредактировал $2',
	'echo-email-subject-default' => 'Новые уведомления на {{SITENAME}}',
	'echo-link' => 'Мои уведомления',
	'echo-overlay-link' => 'Все уведомления...',
	'echo-overlay-title' => 'Мои уведомления',
);

/** Sinhala (සිංහල)
 * @author පසිඳු කාවින්ද
 */
$messages['si'] = array(
	'prefs-echo' => 'නිවේදන',
	'echo-no-agent' => '[කිසිවෙකු නැත]',
	'echo-no-title' => '[මාතෘකාවක් නොමැත]', # Fuzzy
	'notifications' => 'නිවේදන',
	'echo-specialpage' => 'මගේ නිවේදන',
	'notification-edit' => '$2 {{GENDER:$1|සංස්කරණය කරා}} [[$3]] $4',
	'echo-email-subject-default' => '{{SITENAME}} හී නව නිවේදනයක්',
	'echo-link' => 'මගේ නිවේදන',
	'echo-overlay-link' => 'සියලුම නිවේදන...',
	'echo-overlay-title' => 'මගේ නිවේදන',
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
	'notification-edit' => '$2 {{GENDER:$1|је изменио|је изменила|је изменио}} [[$3]] $4',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|је изменио|је изменила|је изменио}} [[User talk:$4|вашу страницу за разговор]] $3',
	'notification-add-comment' => '$2 {{GENDER:$1|је прокоментарисао|је прокоментарисала|је прокоментарисао}} „[[$4|$3]]“ на страници за разговор „$5“',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|је поставио|је поставила|је поставио}} нову тему „$3“ на [[$4]]',
	'echo-link' => 'Моја обавештења',
	'echo-overlay-link' => 'Сва обавештења…',
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
	'notification-edit' => '$2 {{GENDER:$1|je izmenio|je izmenila|je izmenio}} [[$3]] $4',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|je izmenio|je izmenila|je izmenio}} [[User talk:$4|vašu stranicu za razgovor]] $3',
	'notification-add-comment' => '$2 {{GENDER:$1|je prokomentarisao|je prokomentarisala|je prokomentarisao}} „[[$4|$3]]“ na stranici za razgovor „$5“',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|je postavio|je postavila|je postavio}} novu temu „$3“ na [[$4]]',
	'echo-link' => 'Moja obaveštenja',
	'echo-overlay-link' => 'Sva obaveštenja…',
	'echo-overlay-title' => 'Moja obaveštenja',
);

/** Swedish (svenska)
 * @author Ainali
 * @author WikiPhoenix
 */
$messages['sv'] = array(
	'echo-desc' => 'Notifikationssystem',
	'prefs-echo' => 'Meddelanden',
	'echo-pref-notify-watchlist' => 'Prenumerera på redigeringsmeddelanden när jag lägger till sidor i min bevakningslista.',
	'echo-no-agent' => '[Ingen]',
	'echo-no-title' => '[Ingen sida]',
	'echo-error-no-formatter' => 'Ingen formatering definierad för notifikation',
	'notifications' => 'Meddelanden',
	'echo-specialpage' => 'Mina meddelanden',
	'echo-anon' => 'För att ta emot meddelanden, [[Special:Userlogin/signup|skapa ett konto]] eller [[Special:UserLogin|logga in]].',
	'echo-none' => 'Du har inte fått några meddelanden på sistone!',
	'notification-edit' => '$2 {{GENDER:$1|redigerade}} [[$3]] $4: "$5"',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|redigerade}} [[User talk:$4|din diskussionssida]] $3:$5',
	'notification-add-comment' => '$2 {{GENDER:$1|kommenterade}} "[[$4|$3]]" på diskussionssidan för "$5"',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|postade}} ett nytt ämne "$3" på [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|skickade}} ett meddelande till dig: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|kommenterade}} på "[[$4#$3|$3]]" på din diskussionssida',
	'notification-new-user' => 'Välkommen till {{SITENAME}},  $1!',
	'notification-new-user-content' => 'Hej $1, och välkommen till {{SITENAME}}.<br />
Kom ihåg att underteckna kommentarer på diskussionssidor med 4 tilde (~~~~).',
	'notification-reverted' => '$2 {{GENDER:$1|återställde}} {{PLURAL:$6|1=din redigering|dina redigeringar}} på [[$3]] $4: "$5"',
	'notification-edit-email-subject' => '{{SITENAME}} meddelande: $3 har redigerats av $2',
	'notification-edit-talk-page-email-subject' => 'Din {{SITENAME}} diskussionssida har redigerats av $2',
	'notification-reverted-email-subject' => '{{SITENAME}}notifikation: $2 har återställt redigeringen på $3: $4',
	'echo-email-subject-default' => 'Nytt meddelande på {{SITENAME}}',
	'echo-email-body-default' => 'Du har ett nytt meddelande på {{SITENAME}}:

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nytt meddelande|nya meddelanden}}',
	'echo-link' => 'Mina meddelanden',
	'echo-overlay-link' => 'Alla meddelanden',
	'echo-overlay-title' => 'Mina meddelanden',
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
{{SITENAME}} அறிவித்தல் அமைப்பு',
	'notification-edit-talk-page-email-subject' => 'உங்கள் {{SITENAME}} பேச்சுப் பக்கம் $2 என்ற பயனரால் தொகுக்கப்பட்டுள்ளது.',
	'echo-email-subject-default' => '{{SITENAME}}இல்  புதிய அறிவிப்புகள்',
	'echo-email-body-default' => '{{SITENAME}} இல் உங்களுக்கு ஒரு புதிய அறிவிப்பு உள்ளது:

$1',
	'echo-link-new' => '$1 புதிய {{PLURAL:$1|notification|அறிவிக்கைகள்}}',
	'echo-link' => 'என் அறிவிப்புகள்',
	'echo-overlay-link' => 'எல்லா அறிவிப்புகள்....',
	'echo-overlay-title' => 'என் அறிவிப்புகள்',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 * @author TheSleepyhollow02
 */
$messages['tl'] = array(
	'echo-desc' => 'Pangkasunod na salinlahing imprastruktura ng pagpapabatid para sa MediaWiki', # Fuzzy
	'prefs-echo' => 'Mga pagpapabatid',
	'echo-pref-notify-watchlist' => 'Pasipian ako na mapatnugutan ang mga pagpapabatid kapag nagdaragdag ako ng mga pahina sa bantayan ko.',
	'echo-no-agent' => '[Walang Sinuman]',
	'echo-no-title' => '[Walang Pamagat]', # Fuzzy
	'notifications' => 'Mga pagpapabatid',
	'echo-specialpage' => 'Mga pagpapabatid ko',
	'echo-anon' => 'Upang makatanggap ng mga pagpapabatid, [[Special:Userlogin/signup|lumikha ng isang akawnt]] o [[Special:UserLogin|lumagdang papasok]].',
	'echo-none' => 'Hindi ka nakakatanggap ng anumang mga pagpapabatid nitong mga uling panahon!',
	'notification-edit' => '{{GENDER:$1|Binago}} ni $2 ang [[$3]] $4',
	'notification-edit-talk-page' => '{{GENDER:$1|Binago}} ni $2 ang [[User talk:$4|pahina mo ng usapan]] na $3',
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
	'echo-link-new' => '$1 bagong {{PLURAL:$1|pagpapabatid|mga pagpapabatid}}',
	'echo-link' => 'Mga pagpapabatid ko',
	'echo-overlay-link' => 'Lahat ng mga pagpapabatid...',
	'echo-overlay-title' => 'Mga pagpapabatid ko',
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
	'echo-pref-notify-watchlist' => 'Đăng ký các thông báo về sửa đổi khi nào tôi thêm trang vào danh sách theo dõi.',
	'echo-no-agent' => '[Không ai]',
	'echo-no-title' => '[Không có trang]',
	'echo-error-no-formatter' => 'Thông báo không có định rõ định dạng',
	'notifications' => 'Thông báo',
	'echo-specialpage' => 'Thông báo cho tôi',
	'echo-anon' => 'Để nhận thông báo, hãy [[Special:Userlogin/signup|mở tài khoản]] hoặc [[Special:UserLogin|đăng nhập]].',
	'echo-none' => 'Lâu nay bạn không nhận thông báo nào.',
	'notification-edit' => '{{GENDER:$1}}$2 đã sửa đổi [[$3]] $4: “$5”',
	'notification-edit-talk-page' => '{{GENDER:$1}}$2 đã sửa đổi [[User talk:$4|trang thảo luận của bạn]] $3: “$5”',
	'notification-add-comment' => '{{GENDER:$1}}$2 đã bình luận về “[[$4|$3]]” tại trang thảo luận “$5”',
	'notification-add-talkpage-topic' => '{{GENDER:$1}}$2 đã đăng chủ đề mới “$3” tại [[$4]]',
	'notification-add-talkpage-topic-yours' => '{{GENDER:$1}}$2 đã nhắn tin mới cho bạn: “[[$4#$3|$3]]”',
	'notification-add-comment-yours' => '{{GENDER:$1}}$2 đã bình luận về “[[$4#$3|$3]]” tại trang thảo luận của bạn',
	'notification-new-user' => 'Chào mừng $1 đã đến với {{SITENAME}}!',
	'notification-new-user-content' => 'Chào mừng $1 đã đến với {{SITENAME}}.<br />
Hãy nhớ ký tên vào các lời bình luận tại trang thảo luận bằng 4 dấu ngã (~~~~).',
	'notification-reverted' => '{{GENDER:$1}} $2 đã lùi lại {{PLURAL:$6|1=sửa đổi|các sửa đổi}} của bạn tại [[$3]] $4: “$5”',
	'notification-edit-email-subject' => 'Thông báo từ {{SITENAME}}: $3 đã được sửa bởi $2',
	'notification-edit-email-body' => 'Xin chào $5,
Xin thông báo với bạn rằng $2 đã sửa đổi trang $3 tại {{SITENAME}}.

$2 tóm lược các thay đổi của họ như thế này: $6

Bạn có thể xem các thay đổi của $2 bằng cách theo dõi liên kết này:
<$4>

Bạn nhận được thư điện tử này vì bạn đã xin theo dõi các thay đổi tại trang này.

Cám ơn bạn sử dụng {{SITENAME}},
Hệ thống thông báo {{SITENAME}}',
	'notification-edit-talk-page-email-subject' => 'Trang thảo luận của bạn tại {{SITENAME}} đã được sửa bởi $2',
	'notification-edit-talk-page-email-body' => 'Xin chào $4,
Xin thông báo với bạn rằng $2 đã sửa đổi trang thảo luận của bạn tại {{SITENAME}}.

Tại {{SITENAME}}, trang thảo luận của bạn là nơi để những người dùng khác nhắn tin cho bạn.

$2 tóm lược các thay đổi của họ như thế này: $5

Bạn có thể xem các thay đổi của $2 bằng cách theo dõi liên kết này:
<$3>

Cám ơn bạn sử dụng {{SITENAME}},
Hệ thống thông báo {{SITENAME}}',
	'notification-reverted-email-subject' => 'Thông báo từ {{SITENAME}}: $2 đã lùi lại sửa đổi của bạn tại $3: $4',
	'notification-reverted-email-body' => 'Xin chào $5,
Xin thông báo với bạn rằng $2 đã lùi lại các sửa đổi tại trang $3 tại {{SITENAME}}.

$2 tóm lược thay đổi của họ như thế này: $6

Bạn có thể xem thay đổi lùi sửa của $2 bằng cách theo dõi liên kết này:
<$4>

Bạn nhận được thư điện tử này vì bạn đã xin theo dõi các vụ lùi sửa thay đổi của bạn.

Cám ơn bạn sử dụng {{SITENAME}},
Hệ thống thông báo {{SITENAME}}',
	'echo-email-subject-default' => 'Thông báo mới tại {{SITENAME}}',
	'echo-email-body-default' => 'Bạn có thông báo mới tại {{SITENAME}}:

$1',
	'echo-link-new' => '$1 thông báo mới',
	'echo-link' => 'Thông báo cho tôi',
	'echo-overlay-link' => 'Tất cả các thông báo…',
	'echo-overlay-title' => 'Thông báo cho tôi',
);

/** Simplified Chinese (中文（简体）‎)
 * @author Anakmalaysia
 * @author Liangent
 */
$messages['zh-hans'] = array(
	'echo-desc' => 'MediaWiki的下一代通知架构', # Fuzzy
	'prefs-echo' => '通知',
	'echo-pref-notify-watchlist' => '当我向监视列表添加页面时也为我订阅编辑通知。',
	'echo-no-agent' => '[无人]',
	'echo-no-title' => '[无标题]', # Fuzzy
	'notifications' => '通知',
	'echo-specialpage' => '我的通知',
	'echo-anon' => '要接收通知，请[[Special:Userlogin/signup|创建帐号]]或[[Special:UserLogin|登录]]。',
	'echo-none' => '您最近没有收到任何通知。',
	'notification-edit' => '$2{{GENDER:$1|编辑了}}[[$3]] $4',
	'notification-edit-talk-page' => '$2{{GENDER:$1|编辑了}}[[User talk:$4|您的对话页]] $3',
	'notification-add-comment' => '$2在“$5”讨论页上{{GENDER:$1|评论了}}“[[$4|$3]]”',
	'notification-add-talkpage-topic' => '$2在[[$4]]上{{GENDER:$1|发表了}}一个新主题“$3”',
	'notification-add-talkpage-topic-yours' => '$2给您{{GENDER:$1|发送了}}新消息：“[[$4#$3|$3]]”',
	'notification-add-comment-yours' => '$2在您的对话页上上{{GENDER:$1|评论了}}“[[$4#$3|$3]]”',
	'notification-edit-email-subject' => '{{SITENAME}}通知：$3已被$2编辑',
	'notification-edit-email-body' => '您好 $5，
这个通知为了让您了解$2编辑了{{SITENAME}}页面$3。

您可以在这个链接查看$2作出的更改：
<$4>

您收到这个消息是因为您订阅了这个页面变更的电子邮件更新。

感谢您使用{{SITENAME}}
{{SITENAME}}通知系统',
	'notification-edit-talk-page-email-subject' => '您的{{SITENAME}}对话页已被$2编辑',
	'notification-edit-talk-page-email-body' => '您好 $4，
这个通知为了让您了解$2编辑了{{SITENAME}}上您的对话页。

在{{SITENAME}}，您的对话页是其他用户可以给您留言的地方。

您可以在这个链接查看$2作出的更改：
<$3>

感谢您使用{{SITENAME}}
{{SITENAME}}通知系统',
	'echo-email-subject-default' => '{{SITENAME}}上的新通知',
	'echo-email-body-default' => '您在{{SITENAME}}上有新通知：

$1',
	'echo-link-new' => '$1条新通知',
	'echo-link' => '我的通知',
	'echo-overlay-link' => '全部通知...',
	'echo-overlay-title' => '我的通知',
);

/** Traditional Chinese (中文（繁體）‎)
 * @author Simon Shek
 */
$messages['zh-hant'] = array(
	'echo-desc' => 'MediaWiki的下一代通知架構', # Fuzzy
	'prefs-echo' => '通知',
	'echo-pref-notify-watchlist' => '當我向監視列表添加頁面時也為我訂閱編輯通知。',
	'echo-no-agent' => '[無人]',
	'echo-no-title' => '[無標題]', # Fuzzy
	'notifications' => '通知',
	'echo-specialpage' => '我的通知',
	'echo-anon' => '要接收通知，請[[Special:Userlogin/signup|創建帳號]]或[[Special:UserLogin|登錄]]。',
	'echo-none' => '您最近沒有收到任何通知。',
	'notification-edit' => '$2{{GENDER:$1|編輯了}}[[$3]] $4',
	'notification-edit-talk-page' => '$2{{GENDER:$1|編輯了}}[[User talk:$4|您的對話頁]] $3',
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
{{SITENAME}}通知系統',
	'notification-edit-talk-page-email-subject' => '你在{{SITENAME}}上的討論頁已被$2編輯。',
	'notification-edit-talk-page-email-body' => '您好 $4，
這個通知為了讓您了解$2編輯了{{SITENAME}}上您的對話頁。

在{{SITENAME}}，您的對話頁是其他用戶可以給您留言的地方。

您可以在這個鏈接查看$2作出的更改：
<$3>

感謝您使用{{SITENAME}}
{{SITENAME}}通知系統',
	'echo-email-subject-default' => '{{SITENAME}}上的新通知',
	'echo-email-body-default' => '你在{{SITENAME}}有一項新訊息：

$1',
	'echo-link-new' => '$1項新{{PLURAL:$1|訊息|訊息}}',
	'echo-link' => '我的訊息',
	'echo-overlay-link' => '所有訊息...',
	'echo-overlay-title' => '我的訊息',
);
