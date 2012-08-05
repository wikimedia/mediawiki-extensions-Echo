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
	'echo-anon' => 'To receive notifications, [[Special:Userlogin/signup|create an account]] or [[Special:UserLogin|log in]].',
	'echo-none' => 'You have not received any notifications lately.',

	// Notification
	'notification-edit' => '$2 {{GENDER:$1|edited}} [[$3]] $4',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|edited}} [[User talk:$4|your talk page]] $3',
	'notification-add-comment' => '$2 {{GENDER:$1|commented}} on "[[$4|$3]]" on the "$5" talk page',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|posted}} a new topic "$3" on [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|sent}} you a message: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|commented}} on "[[$4#$3|$3]]" on your talk page',
	'notification-talkpage-content' => '$1', ## Do not translate unless you deliberately want to change behaviour

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
	'echo-link-new' => '$1 new {{PLURAL:$1|notification|notifications}}',
	'echo-link' => 'My notifications',
	'echo-overlay-link' => 'All notifications…',
	'echo-overlay-title' => 'My notifications',
);

/** Message documentation (Message documentation)
 * @author Amire80
 * @author Kghbln
 * @author Raymond
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
	'notifications' => 'This message is the page title of the special page [[Special:Notifications]].',
	'echo-specialpage' => 'Special page title for Special:Notifications',
	'echo-anon' => 'Error message shown to users who try to visit Special:Notifications as an anon.',
	'echo-none' => 'Message shown to users who have no notifications. Also shown in the overlay.',
	'notification-edit' => 'Format for displaying notifications of a page being edited (generally from a watchlist)
* $1 is the username of the person who edited, plain text. Can be used for GENDER.
* $2 is the username of the person who edited, formatted.
* [[$3]] is the page that was edited, as plain text.
* $4 is a diff link, possibly formatted.',
	'notification-edit-talk-page' => 'Format for displaying notifications of a user talk page being edited
* $1 is the username of the person who edited, plain text. Can be used for GENDER.
* $2 is the username of the person who edited, formatted.
* $3 is a diff link, formatted.',
	'notification-add-comment' => 'Format for displaying notifications of a comment being added to an existing discussion. Parameters:
* $1 is the username of the person who edited, plain text. Can be used for GENDER,
* $2 is the username of the person who edited,
* $3 is the section title of the discussion,
* $4 is a link to a page and section,
* $5 is the page on which the discussion exists, plain text.',
	'notification-add-talkpage-topic' => 'Format for displaying notifications of a new discussion being added
$1 is the username of the person who edited, plain text. Can be used for GENDER.
$2 is the username of the person who edited, formatted.
$3 is the section title of the discussion.
$4 is the page on which the discussion was added, plain text.',
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
	'notification-edit-email-subject' => 'E-mail subject. Parameters:
* $2 is a username
* $3 is a page title',
	'notification-edit-email-body' => "E-mail notification. Parameters:
* $2 is a username
* $3 is a page title
* $4 is a link to a change
* $5 is the e-mail recipient's username.",
	'notification-edit-talk-page-email-subject' => 'E-mail subject. Parameters:
* $2 is a username.',
	'notification-edit-talk-page-email-body' => "E-mail notification. Parameters:
* $2 is a username
* $3 link to a change
* $4 is the e-mail recipient's username.",
	'echo-email-subject-default' => 'Default subject for Echo email notifications',
	'echo-email-body-default' => 'Default message content for Echo email notifications.
* $1 is a plain text description of the notification.',
	'echo-link-new' => 'Shown in "personal links" when a user has unread notifications.
* $1 is number of unread notifications',
	'echo-link' => 'Shown in "personal links" when a user has JS. New notifications are indicated with a badge.',
	'echo-overlay-link' => 'Link to "all notifications" at the bottom of the overlay',
	'echo-overlay-title' => 'Title at the top of the notifications overlay',
);

/** Belarusian (Taraškievica orthography) (‪беларуская (тарашкевіца)‬)
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'echo-desc' => 'Інфраструктура абвестак новага пакаленьня для MediaWiki',
	'prefs-echo' => 'Абвесткі',
	'echo-pref-notify-watchlist' => 'Падпісацца на абвесткі пра рэдагаваньні старонак, за якімі я назіраю.',
	'echo-no-agent' => '[Ніхто]',
	'echo-no-title' => '[Без загалоўку]',
	'notifications' => 'Абвесткі',
	'echo-specialpage' => 'Мае абвесткі',
	'echo-anon' => 'Для атрыманьня абвестак [[Special:Userlogin/signup|стварыце рахунак]].',
	'echo-none' => 'За апошні час вы не атрымлівалі абвестак!',
	'notification-edit' => '$2 {{GENDER:$1|адрэдагаваў|адрэдагавала}} «[[$3]]» $4',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|напісаў|напісала}} на вашую старонку гутарак $3',
	'notification-edit-email-subject' => 'Абвестка ад {{GRAMMAR:родны|{{SITENAME}}}}: $2 адрэдагаваў «$3»',
	'notification-edit-email-body' => 'Вітаем, $5! Паведамляем, што $2 рэдагаваў старонку {{GRAMMAR:родны|{{SITENAME}}}} «$3».

Вы можаце пабачыць унесеныя ўдзельнікам $2 зьмены па наступнай спасылцы:
<$4>

Вы атрымалі гэтую абвестку, таму што падпісаныя на абвесткі электроннай поштай пра зьмены на гэтай старонцы.

Дзякуем за выкарыстаньне {{GRAMMAR:родны|{{SITENAME}}}}.
Сыстэма абвестак {{GRAMMAR:родны|{{SITENAME}}}}.',
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
 */
$messages['br'] = array(
	'echo-no-agent' => '[Den]',
	'echo-no-title' => '[Diditl]',
);

/** German (Deutsch)
 * @author Kghbln
 * @author Metalhead64
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
	'notification-edit' => '$2 {{GENDER:$1|bearbeitete}} [[$3]] $4',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|bearbeitete}} [[User talk:$4|deine Benutzerseite]] $3',
	'notification-add-comment' => '$2 {{GENDER:$1|kommentierte}} „[[$4|$3]]“ auf der Diskussionsseite „$5“',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|startete}} das neue Thema  „$3“ zu [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|sandte}} dir eine Nachricht: [[$4#$3|$3]]',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|kommentierte}} „[[$4#$3|$3]]“ auf deiner Diskussionsseite',
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
	'echo-link-new' => '$1 neue {{PLURAL:$1|Benachrichtigung|Benachrichtigungen}}',
	'echo-link' => 'Meine Benachrichtigungen',
	'echo-overlay-link' => 'Alle Benachrichtigungen …',
	'echo-overlay-title' => 'Meine Benachrichtigungen',
);

/** German (formal address) (‪Deutsch (Sie-Form)‬)
 * @author Kghbln
 */
$messages['de-formal'] = array(
	'echo-none' => 'Sie haben in letzter Zeit keine Benachrichtigungen erhalten.',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|bearbeitete}} [[User talk:$4|Ihre Benutzerseite]] $3',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|sandte}} Ihnen eine Nachricht: [[$4#$3|$3]]',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|kommentierte}} „[[$4#$3|$3]]“ auf Ihrer Diskussionsseite',
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
 */
$messages['diq'] = array(
	'echo-overlay-link' => 'Tebliği pêro...',
);

/** Spanish (español)
 * @author Armando-Martin
 */
$messages['es'] = array(
	'echo-desc' => 'Infraestructura de última generación para notificaciones de MediaWiki',
	'prefs-echo' => 'Notificaciones',
	'echo-pref-notify-watchlist' => 'Suscribirme para editar notificaciones cuando agregue páginas a mi lista de vigilancia.',
	'echo-no-agent' => '[Nadie]',
	'echo-no-title' => '[Sin título]',
	'notifications' => 'Notificaciones',
	'echo-specialpage' => 'Mis notificaciones',
	'echo-anon' => 'Para recibir notificaciones, [[Special:Userlogin/signup|crea una cuenta]].',
	'echo-none' => '¡No has recibido notificaciones últimamente!',
	'notification-edit' => '$2 ha editado [[$3]] $4',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|ha editado}} [[User talk:$4|tu página de discusión]] $3',
	'notification-edit-email-subject' => 'Notificación de {{SITENAME}}: $3 ha sido editado por $2',
	'notification-edit-email-body' => 'Hola  $5 ,

Esto es una notificación para hacerte saber que  $2  ha editado la página $3 de {{SITENAME}}.

Puedes ver los cambios que  $2 ha hecho siguiendo este enlace:

<$4>

Estás recibiendo este mensaje porque estás suscrito a las actualizaciones por correo electrónico de los cambios de esta página.

Gracias por usar {{SITENAME}}
El sistema de notificaciones de {{SITENAME}}',
	'notification-edit-talk-page-email-subject' => 'Tu página de discusión en {{SITENAME}} ha sido editada por $2',
	'notification-edit-talk-page-email-body' => 'Hola  $4,

Esto es una notificación para hacerte saber que  $2  ha editado tu página de discusión en {{SITENAME}}.

En {{SITENAME}}, tu página de discusión es donde otros usuarios te pueden dejar mensajes.

Puedes ver los cambios que  $2  en este enlace:
<$3>

Gracias por usar {{SITENAME}}
El sistema de notificaciones de {{SITENAME}}',
	'echo-email-subject-default' => 'Nueva notificación en {{SITENAME}}',
	'echo-email-body-default' => 'Tienes una nueva notificación en {{SITENAME}}:

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|notificación nueva|notificaciones nuevas}}',
	'echo-link' => 'Mis notificaciones',
	'echo-overlay-link' => 'Todas las notificaciones...',
	'echo-overlay-title' => 'Mis notificaciones',
);

/** French (français)
 * @author DavidL
 * @author IAlex
 * @author Jean-Frédéric
 * @author Tititou36
 */
$messages['fr'] = array(
	'echo-desc' => 'Infrastructure de notification de prochaine génération pour MediaWiki',
	'prefs-echo' => 'Notifications',
	'echo-pref-notify-watchlist' => "M'inscrire pour modifier les notifications quand j'ajoute des pages à ma liste de suivi.",
	'echo-no-agent' => '[Personne]',
	'echo-no-title' => '[Sans titre]',
	'notifications' => 'Notifications',
	'echo-specialpage' => 'Mes notifications',
	'echo-anon' => 'Pour recevoir des notifications, [[Special:Userlogin/signup|créez un compte]].',
	'echo-none' => "Vous n'avez reçu aucune notification dernièrement !",
	'notification-edit' => '$2 {{GENDER:$1|a modifié}} [[$3]] $4',
	'notification-edit-talk-page' => '$2 a {{GENDER:$1|modifié}} [[User talk:$4|votre page de discussion]] $3',
	'notification-add-comment' => '$2 {{GENDER:$1|a posté}} un commentaire à la discussion « [[$4|$3]] » sur $5',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|a ouvert}} un nouveau sujet « $3 » sur [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 vous {{GENDER:$1|a laissé}} un message : [[$4#$3|$3]]',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|a posté}} un commentaire sur « [[$4#$3|$3]] » sur votre page de discussion',
	'notification-edit-email-subject' => 'Notification de {{SITENAME}} : $3 a été modifié par $2',
	'notification-edit-email-body' => "Bonjour  $5,
Ceci est une notification pour vous informer que $2 a modifié la page $3 de {{SITENAME}}.

Vous pouvez voir les changements faits par $2 en suivant ce lien :
$4

Vous recevez ce message parce que vous avez souscrit aux mises à jour par courriel des modifications apportées à cette page.

Merci d'utiliser {{SITENAME}}
Le système de notification de {{SITENAME}}",
	'notification-edit-talk-page-email-subject' => 'Votre page de discussion de {{SITENAME}} a été modifée par $2',
	'notification-edit-talk-page-email-body' => "Bonjour  $4,

Ceci est une notification pour vous informer que $2 a modifié votre page de discussion sur {{SITENAME}}.

Sur {{SITENAME}}, votre page de discussion est là où les autres utilisateurs peuvent vous laisser des messages.

Vous pouvez voir les changements que $2 a fait en suivant ce lien:
$3

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

/** Galician (galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'echo-desc' => 'A nova xeración da infraestrutura de notificación de MediaWiki',
	'prefs-echo' => 'Notificacións',
	'echo-pref-notify-watchlist' => 'Subscribirme para editar as notificación cando engada páxinas á miña lista de vixilancia.',
	'echo-no-agent' => '[Ninguén]',
	'echo-no-title' => '[Sen título]',
	'notifications' => 'Notificacións',
	'echo-specialpage' => 'As miñas notificacións',
	'echo-anon' => 'Para recibir notificacións, [[Special:Userlogin/signup|cree unha conta]].',
	'echo-none' => 'Non recibiu notificación ningunha ultimamente!',
	'notification-edit' => '$2 {{GENDER:$1|editou}} "[[$3]]" $4',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|editou}} [[User talk:$4|a súa páxina de conversa]] $3',
	'notification-add-comment' => '$2 {{GENDER:$1|comentou}} en "[[$4|$3]]" na páxina de conversa "$5"',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|publicou}} unha nova mensaxe, "$3", en "[[$4]]"',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|envioulle}} unha mensaxe: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|comentou}} en "[[$4#$3|$3]]" na súa páxina de conversa',
	'notification-edit-email-subject' => 'Notificación de {{SITENAME}}: $2 editou "$3"',
	'notification-edit-email-body' => 'Boas $5:
Esta é unha notificación para facerlle saber que $2 editou a páxina "$3" de {{SITENAME}}.

Pode ollar os cambios que realizou $2 seguindo esta ligazón:
<$4>

Recibiu esta mensaxe porque activou a subscrición ás actualizacións por correo electrónico sobre os cambios nesta páxina.

Grazas por usar {{SITENAME}}
O sistema de notificación de {{SITENAME}}',
	'notification-edit-talk-page-email-subject' => '$2 editou a súa páxina de conversa de {{SITENAME}}',
	'notification-edit-talk-page-email-body' => 'Boas $4:
Esta é unha notificación para facerlle saber que $2 editou a súa páxina de conversa de {{SITENAME}}.

En {{SITENAME}}, a súa páxina de conversa é o lugar no que os demais usuarios poden deixarlle mensaxes.

Pode ollar os cambios que realizou $2 seguindo esta ligazón:
<$3>

Grazas por usar {{SITENAME}}
O sistema de notificación de {{SITENAME}}',
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
 */
$messages['he'] = array(
	'echo-desc' => 'הדור הבא של תשתית ההודעות של מדיה־ויקי',
	'prefs-echo' => 'הודעות',
	'echo-pref-notify-watchlist' => 'לרשום אותי להודעות על עריכה כאשר אני מוסיף דפים לרשימת המעקב שלי.',
	'echo-no-agent' => '[לא צוין]',
	'echo-no-title' => '[ללא כותרת]',
	'notifications' => 'הודעות',
	'echo-specialpage' => 'ההודעות שלי',
	'echo-anon' => 'כדי לקבל הודעות, [[Special:Userlogin/signup|יש ליצור חשבון]].',
	'echo-none' => 'לא קיבלת הודעות לאחרונה!',
	'notification-edit' => '$2 {{GENDER:$1|ערך|ערכה}} את הדף [[$3]] $4',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|ערך|ערכה}} את דף השיחה שלך $3',
	'notification-add-comment' => '$2 {{GENDER:$1|הגיב|הגיבה}} על "[[$4|$3]]" בדף השיחה "$5"',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|יצר|יצרה}} את הנושא החדש "$3" בדף [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|שלח|שלחה}} לך הודעה: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|הגיב|הגיבה}} על "[[$4#$3|$3]]" בדף השיחה שלך',
	'notification-edit-email-subject' => 'הודעה מאתר {{SITENAME}}: הדף $3 נערך על־ידי $2',
	'notification-edit-talk-page-email-subject' => 'דף השיחה שלך באתר {{SITENAME}} נערך עלֹ־ידי $2',
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
	'echo-desc' => 'Zdźělenska infrastruktura přichodneje generacije za MediaWiki',
	'prefs-echo' => 'Zdźělenki',
	'echo-pref-notify-watchlist' => 'Abonować, zo by zdźělenki wobdźěłał, hdyž strony swojim wobkedźbowankach přidawam.',
	'echo-no-agent' => '[Nichtó]',
	'echo-no-title' => '[Žadyn titul]',
	'notifications' => 'Zdźělenki',
	'echo-specialpage' => 'Moje zdźělenki',
	'echo-anon' => 'Zo by zdźělenki dóstał, dyrbiš [[Special:Userlogin/signup|konto załožić]].',
	'echo-none' => 'W poslednim času njejsy žane zdźělenki dóstał!',
	'notification-edit' => '$2 je [[$3]] $4 {{GENDER:$1|wobdźěłał|wobdźěłała}}',
	'notification-edit-talk-page' => '$2 jo [[User talk:$4|twoju diskusijnu stronu]] {{GENDER:$1|wobdźěłał|wobdźěłała}} $3',
	'notification-add-comment' => '$2 je "[[$4|$3]]" na diskusijnej stronje "$5" {{GENDER:$1|komentował|komentowała}}',
	'notification-add-talkpage-topic' => '$2 je nowu temu "$3" na [[$4]] {{GENDER:$1|započał|započała}}',
	'notification-add-talkpage-topic-yours' => '$2 je ći powěsć {{GENDER:$1|pósłał|pósłała}}: [[$4#$3|$3]]',
	'notification-add-comment-yours' => '$2 je "[[$4#$3|$3]]" na twojej diskusijnej stronje {{GENDER:$1|komentował|komentowała}}',
	'notification-edit-email-subject' => 'Zdźělenka z {{GRAMMAR:genitiw|{{SITENAME}}}}: $3 je so wot $2 wobdźěłał',
	'notification-edit-email-body' => 'Witaj $5,

to je zdźělenka, kotraž će informuje, zo $2 je stronu $3 na {{GRAMMAR:lokatiw|{{SITENAME}}}} wobdźěłał.

Móžeš změny, kotrež $2 přewjedźe, přez slědowacy wotkaz widźeć:
<$4>

Přijimaš tutu zdźělenku, dokelž sy e-mejlowe aktualizacije wo změnach na tutej stronje abonował.

Dźakujemy so, zo {{GRAMMAR:akuzatiw|{{SITENAME}}}} wužiwaš.
Zdźělenski system {{GRAMMAR:genitiw|{{SITENAME}}}}',
	'notification-edit-talk-page-email-subject' => 'Twoja diskusijna strona na {{GRAMMAR:lokatiw|{{SITENAME}}}} je so wot $2 wobdźěłała',
	'notification-edit-talk-page-email-body' => 'Witaj $4,
to je zdźělenka, kotraž će informuje, zo $2 je twoju diskusijnu stronu na {{GRAMMAR:lokatiw|{{SITENAME}}}} wobdźěłał.

Twoja duskusijna strona je na {{GRAMMAR:lokatiw|{{SITENAME}}}}  te městno, hdźež wužiwarjo móža ći powěsće zawostajić.

Změny, kotrež $2 přewjedźe, móžeš přez slědowacy wotkaz widźeć:
<$3>

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

/** Interlingua (interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'echo-desc' => 'Un nove infrastructura de notification pro MediaWiki',
	'prefs-echo' => 'Notificationes',
	'echo-pref-notify-watchlist' => 'Subscriber me pro modificar notificationes quando io adde paginas a mi observatorio.',
	'echo-no-agent' => '[Nemo]',
	'echo-no-title' => '[Sin titulo]',
	'notifications' => 'Notificationes',
	'echo-specialpage' => 'Mi notificationes',
	'echo-anon' => 'Pro reciper notificationes, [[Special:Userlogin/signup|crea un conto]].',
	'echo-none' => 'Tu non ha recipite notificationes recentemente.',
	'notification-edit' => '$2 modificava [[$3]] $4',
	'notification-edit-talk-page' => '$2 modificava tu pagina de discussion $3',
	'notification-edit-email-subject' => 'Notification de {{SITENAME}} : $3 ha essite modificate per $2',
	'notification-edit-email-body' => 'Salute $5,
Isto es un notification pro informar te que $2 ha modificate le pagina $3 de {{SITENAME}}.

Tu pote vider le cambiamentos que $2 faceva per sequer iste ligamine:
<$4>

Tu ha recipite iste message perque tu te ha subscribite a actualisationes per e-mail pro cambiamentos de iste pagina.

Gratias pro usar {{SITENAME}}
Le systema de notification de {{SITENAME}}',
	'notification-edit-talk-page-email-subject' => 'Tu pagina de discussion in {{SITENAME}} ha essite modificate per $2',
	'notification-edit-talk-page-email-body' => 'Salute $4,
Isto es un notification pro informar te que $2 ha modificate tu pagina de discussion in {{SITENAME}}.

In {{SITENAME}}, tu pagina de discussion es ubi altere usatores pote lassar te messages.

Tu pote vider le cambiamentos que $2 faceva per sequer iste ligamine:
<$3>

Gratias pro usar {{SITENAME}}
Le systema de notification de {{SITENAME}}',
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
 */
$messages['it'] = array(
	'echo-desc' => 'Infrastruttura di nuova generazione per le notifiche su MediaWiki',
	'prefs-echo' => 'Notifiche',
	'echo-pref-notify-watchlist' => 'Modifica le mie notifiche quando aggiungo pagine ai miei osservati speciali.',
	'echo-no-agent' => '[Nessuno]',
	'echo-no-title' => '[Nessun titolo]',
	'notifications' => 'Notifiche',
	'echo-specialpage' => 'Mie notifiche',
	'echo-anon' => 'Per ricevere le notifiche, [[Special:Userlogin/signup|crea un account]].',
	'echo-none' => 'Non hai ricevuto notifiche ultimamente!',
	'notification-edit' => '$2 ha modificato [[$3]] $4',
	'notification-edit-talk-page' => '$2 ha modificato la tua pagina di discussione $3',
	'notification-edit-email-subject' => 'Notifica di {{SITENAME}}:  $3 è stata modificata da $2',
	'notification-edit-email-body' => 'Ciao $5,
Questa è una notifica per farti sapere che $2 ha modificato la pagina di {{SITENAME}} $3.

Puoi vedere le modifiche che $2 ha fatto seguendo questo collegamento:
<$4>

Stai ricevendo questo messaggio perché hai sottoscritto gli aggiornamenti tramite email per le modifiche a questa pagina.

Grazie per usare {{SITENAME}}
Il sistema di notifica di {{SITENAME}}',
	'notification-edit-talk-page-email-subject' => 'La pagina di discussione su {{SITENAME}} è stata modificata da $2',
	'notification-edit-talk-page-email-body' => 'Ciao $4,
Questa è una notifica per farti sapere che $2 ha modificato la tua pagina di discussione su {{SITENAME}}.

Su {{SITENAME}}, la pagina di discussione è dove altri utenti possono lasciarti messaggi.

Puoi vedere le modifiche che $2 ha fatto seguendo questo collegamento:
<$3>

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

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'echo-desc' => 'E neu Süßtehm för Medeilonge em_MeedijaWikki.',
	'prefs-echo' => 'Meddeilonge',
	'echo-pref-notify-watchlist' => 'Lohß mech Meddeilonge maache, wann esch Sigge op ming Oppaßlėß donn.',
	'echo-no-agent' => '[Keine]',
	'echo-no-title' => '[Kein Övveschreff]',
	'notifications' => 'Meddeilonge',
	'echo-specialpage' => 'Ming Meddeilonge',
	'echo-anon' => 'Do moß Desch [[Special:Userlogin/signup|aanmälde]], öm Medeilonge krijje ze künne.',
	'echo-none' => 'Ende läzde Zigg häß De kein Medeilonge krääje.',
	'notification-edit' => '{{GENDER:$1|Dä|Dat|Dä Metmaacher|De|Dat}} $2 hät jät op dä Sigg „[[$3]]“ jeändert: $4',
	'notification-edit-talk-page' => '{{GENDER:$1|Dä|Dat|Dä Metmaacher|De|Dat}} $2 hät jät op Ding Klaafsigg jeschrevve: $3',
	'notification-edit-email-subject' => 'Medeilong {{GRAMMAR:genitive vun|{{ucfirst:{{SITENAME}}}}}}: „$3“ wood {{GENDER:$1|vum|vum|vumm Metmaacher|vun dä|vum}} $2 jeändert.',
	'notification-edit-email-body' => 'Daach $5,
dat heh es en Medeilong, öm Desch weßße ze lohße, dat {{GENDER:$2|dä|dat|dä Metmaacher|de|dat}} $2 di Sigg „$3“ jeändert hät.

Do kann de Änderonge övver heh dä Lengk beloore:
<$4>

Do kriß dat jeschrevve, weil De Desch enjeschrevve häs, dat De bei Änderonge aan dä Sigg en e-mail jeschek krijje wells.

Mer bedanke ons för et Metmaache op {{GRAMMAR:dative|{{ucfirst:{{SITENAME}}}}}}.
Et Süßtehm vör Medeilong {{GRAMMAR:genive|{{ucfirst:{{SITENAME}}}}}}',
	'notification-edit-talk-page-email-subject' => 'Ding Klaafsigg {{GRAMMAR:dative en|{{ucfirst:{{SITENAME}}}}}} wood {{GENDER:$1|vum|vum|vum_Metmaacher|vun dä|vum}} $2 jeändert.',
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
	'echo-desc' => 'Nächst Generatioun vun Notifikatiouns-System fir MediaWiki',
	'prefs-echo' => 'Notifikatiounen',
	'echo-no-agent' => '[Keen]',
	'echo-no-title' => '[Keen Titel]',
	'notifications' => 'Notifikatiounen',
	'echo-specialpage' => 'Meng Notifikatiounen',
	'echo-anon' => 'Fir Notifikatiounen ze kréien, [[Special:Userlogin/signup|maacht e Benotzerkont op]].',
	'echo-none' => 'Dir hutt keng Notifikatioune mat Verspéidung kritt!',
	'notification-edit' => '$2 huet [[$3]] $4 geännert',
	'notification-edit-talk-page' => '$2 huet Är Diskussiounssäit $3 geännert',
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
	'echo-desc' => 'Нова инфраструктура за известувања на МедијаВики',
	'prefs-echo' => 'Известувања',
	'echo-pref-notify-watchlist' => 'Претплати ме за измена на известувањата кога додавам страници во мојот список на набљудувања.',
	'echo-no-agent' => '[Никој]',
	'echo-no-title' => '[Без наслов]',
	'notifications' => 'Известувања',
	'echo-specialpage' => 'Мои известувања',
	'echo-anon' => 'За да добивате известувања, [[Special:Userlogin/signup|направете сметка]].',
	'echo-none' => 'Во последно време немате примено ниедно известување!',
	'notification-edit' => '$2 {{GENDER:$1|ја измени}} страницата [[$3]] $4',
	'notification-edit-talk-page' => '$2 ја {{GENDER:$1|измени}} [[User talk:$4|вашата страница за разговор]] $3',
	'notification-add-comment' => '$2 {{GENDER:$1|коментираше}} на „[[$4|$3]]“ на страницата за разговор „$5“',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|напиша}} нова тема „$3“ за [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 ви {{GENDER:$1|испрати}} порака: [[$4#$3|$3]]',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|коментираше}} на „[[$4#$3|$3]]“ на вашата страница за разговор',
	'notification-edit-email-subject' => 'Известување од {{SITENAME}}: $2 ја измени страницата $3',
	'notification-edit-email-body' => 'Здраво $5,
Ве известуваме дека $2 ја измени страницата $3 на {{SITENAME}}.

Измените што ги направи $2 можете да ги погледате на следнава врска:
<$4>

Соопштениево го добивате бидејќе сте пријавени на известувања по е-пошта во врска со измени на оваа страница.

Ви благодариме што сте корисник на {{SITENAME}}
Известителниот систем на {{SITENAME}}',
	'notification-edit-talk-page-email-subject' => '$2 ја измени вашата страница ра разговор на {{SITENAME}}',
	'notification-edit-talk-page-email-body' => 'Здраво $4,
Ве известуваме дека $2 ја измени вашата страница за разговор на {{SITENAME}}.

Страниците за разговор на {{SITENAME}} служат за оставање пораки на други корисници.

Измените што ги направи $2 можете да ги погледате на следнава врска:
<$3>


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

/** Dutch (Nederlands)
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'echo-desc' => 'Meldingeninfrastructuur voor MediaWiki',
	'prefs-echo' => 'Meldingen',
	'echo-pref-notify-watchlist' => "Mijn abonneren op meldingen over bewerkingen als ik pagina's aan mijn volglijst toevoeg.",
	'echo-no-agent' => '[Niemand]',
	'echo-no-title' => '[Geen titel]',
	'notifications' => 'Meldingen',
	'echo-specialpage' => 'Mijn meldingen',
	'echo-anon' => '[[Special:Userlogin/signup|Maak een gebruiker aan]] als u meldingen wilt ontvangen.',
	'echo-none' => 'U hebt de laatste tijd geen meldingen ontvangen!',
	'notification-edit' => '$2 {{GENDER:$1|heeft}} [[$3]] bewerkt $4',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|heeft}} [[User talk:$4|uw overlegpagina]] bewerkt $3',
	'notification-add-comment' => '$2 {{GENDER:$1|heeft}} gereageerd op "[[$4|$3]]" op de overlegpagina "$5"',
	'notification-add-talkpage-topic' => '$2 {{GENDER:$1|heeft}} een nieuw onderwerp "$3" geplaatst op [[$4]]',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|heeft}} u een bericht gezonden: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|heeft}} gereageerd op "[[$4#$3|$3]]" op uw overlegpagina',
	'notification-edit-email-subject' => 'Melding van {{SITENAME}}: $3 is bewerkt door $2',
	'notification-edit-email-body' => 'Hallo $5,

Dit is een melding om u te laten weten dat $2 de pagina $3 op {{SITENAME}} heeft bewerkt.

U kunt de wijzigingen die $2 heeft gemaakt bekijken via de volgende verwijzing:
<$4>

U ontvangt dit bericht omdat u bent geabonneerd op meldingen via e-mail voor deze pagina.

Dank u wel voor het gebruiken van {{SITENAME}}
Het meldingensysteem van {{SITENAME}}',
	'notification-edit-talk-page-email-subject' => 'Uw overlegpagina op {{SITENAME}} is bewerkt door $2',
	'notification-edit-talk-page-email-body' => 'Hallo $4,

Dit is een melding om u te laten weten dat $2 uw overlegpagina op {{SITENAME}} heeft bewerkt.
This is a notification to let you know that $2 has edited your talk page on {{SITENAME}}.

Uw overlegpagina is de plaats op {{SITENAME}} waar andere gebruikers berichten voor u achter kunnen laten.

U kunt de wijzigingen die $2 heeft gemaakt bekijken via de volgende verwijzing:
<$3>

Dank u wel voor het gebruiken van {{SITENAME}}
Het meldingensysteem van {{SITENAME}}',
	'echo-email-subject-default' => 'Nieuwe melding op {{SITENAME}}',
	'echo-email-body-default' => 'U hebt een nieuwe melding op {{SITENAME}}:

$1',
	'echo-link-new' => '{{PLURAL:$1|1 nieuwe melding|$1 nieuwe meldingen}}',
	'echo-link' => 'Mijn meldingen',
	'echo-overlay-link' => 'Alle meldingen…',
	'echo-overlay-title' => 'Mijn meldingen',
);

/** Polish (polski)
 * @author BeginaFelicysym
 */
$messages['pl'] = array(
	'echo-no-agent' => '[Nikt]',
	'echo-no-title' => '[Bez tytułu]',
);

/** Russian (русский)
 * @author DCamer
 */
$messages['ru'] = array(
	'echo-desc' => 'Следующего поколения уведомлений для MediaWiki',
	'prefs-echo' => 'Уведомления',
	'echo-pref-notify-watchlist' => 'Подписать меня на уведомления при добавлении страниц в мой список наблюдения.',
	'echo-no-agent' => '[Никто]',
	'echo-no-title' => '[Нет название]',
	'notifications' => 'Уведомления',
	'echo-specialpage' => 'Мои уведомления',
	'echo-anon' => 'Чтобы получать уведомления, [[Special:Userlogin/signup|создайте учетную запись]].',
	'echo-none' => 'Вы не получали уведомлений!',
	'notification-edit' => '$2 отредактировал [[$3]] $4',
	'notification-edit-talk-page' => '$2 отредактировал вашу страницу обсуждения $3',
	'notification-edit-email-subject' => 'Уведомление {{SITENAME}}: $3 отредактировал $2',
);

/** Swedish (svenska)
 * @author Ainali
 */
$messages['sv'] = array(
	'echo-desc' => 'Nästa generations meddelandeinfrastruktur för MediaWiki',
	'prefs-echo' => 'Meddelanden',
	'echo-pref-notify-watchlist' => 'Prenumerera på redigeringsmeddelanden när jag lägger till sidor i min bevakningslista.',
	'echo-no-agent' => '[Ingen]',
	'echo-no-title' => '[Ingen titel]',
	'notifications' => 'Meddelanden',
	'echo-specialpage' => 'Mina meddelanden',
	'echo-anon' => 'För att ta emot meddelanden, [[Special:Userlogin/signup|skapa ett konto]].',
	'echo-none' => 'Du har inte fått några meddelanden på sistone!',
	'notification-edit' => '$2 {{GENDER:$1|redigerade}} [[$3]] $4',
	'notification-edit-talk-page' => '$2 {{GENDER:$1|redigerade}} [[User talk:$4|din diskussionssida]] $3',
	'notification-add-comment' => '$2 {{GENDER:$1|kommenterade}} "[[$4|$3]]" på diskussionssidan för "$5"',
	'notification-add-talkpage-topic-yours' => '$2 {{GENDER:$1|skickade}} ett meddelande till dig: "[[$4#$3|$3]]"',
	'notification-add-comment-yours' => '$2 {{GENDER:$1|kommenterade}} "[[$4|$3]]" på din diskussionssida',
	'notification-edit-email-subject' => '{{SITENAME}} meddelande: $3 har redigerats av $2',
	'notification-edit-talk-page-email-subject' => 'Din {{SITENAME}} diskussionssida har redigerats av $2',
	'echo-email-subject-default' => 'Nytt meddelande på {{SITENAME}}',
	'echo-email-body-default' => 'Du har ett nytt meddelande på {{SITENAME}}:

$1',
	'echo-link-new' => '$1 {{PLURAL:$1|nytt meddelande|nya meddelanden}}',
	'echo-link' => 'Mina meddelanden',
	'echo-overlay-link' => 'Alla meddelanden',
	'echo-overlay-title' => 'Mina meddelanden',
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
	'notification-edit' => '{{GENDER:$1|Binago}} ni $2 ang [[$3]] $4',
	'notification-edit-talk-page' => '{{GENDER:$1|Binago}} ni $2 ang [[User talk:$4|pahina mo ng usapan]] na $3',
	'notification-add-comment' => '{{GENDER:$1|Pinuna}} ni $2 ang hinggil sa "[[$4|$3]]" na nasa ibabaw ng pahina ng usapan ng "$5"',
	'notification-add-talkpage-topic' => '{{GENDER:$1|Nagpaskil}} si $2 ng isang bagong paksa na "$3" na nasa ibabaw ng [[$4]]',
	'notification-add-talkpage-topic-yours' => '{{GENDER:$1|Nagpasa}} sa iyo si $2 ng isang mensahe: [[$4#$3|$3]]',
	'notification-add-comment-yours' => '{{GENDER:$1|Pinuna}} ni $2 ang hinggil sa "[[$4#$3|$3]]" na nasa ibabaw ng iyong pahina ng usapan',
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

