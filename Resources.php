<?php
/**
 * MediaWiki Extension: Echo
 * http://www.mediawiki.org/wiki/Extension:Echo
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * This program is distributed WITHOUT ANY WARRANTY.
 */

/**
 *
 * @file
 * @ingroup Extensions
 * @author Andrew Garrett, Benny Situ, Ryan Kaldari, Erik Bernhardson
 * @licence MIT License
 */

$echoResourceTemplate = array(
	'localBasePath' => __DIR__ . '/modules',
	'remoteExtPath' => 'Echo/modules',
);

$wgResourceModules += array(
	'ext.echo.ui.desktop' => $echoResourceTemplate + array(
		'scripts' => array(
			'ooui/mw.echo.ui.BadgeLinkWidget.js',
			'ooui/mw.echo.ui.NotificationBadgeWidget.js',
		),
		'styles' => array(
			'ooui/styles/mw.echo.ui.NotificationBadgeWidget.less',
		),
		'skinStyles' => array(
			'monobook' => array(
				'ooui/styles/mw.echo.ui.NotificationBadgeWidget.monobook.less'
			),
			'modern' => array(
				'ooui/styles/mw.echo.ui.NotificationBadgeWidget.modern.less'
			),
			'vector' => array(
				'ooui/styles/mw.echo.ui.NotificationBadgeWidget.vector.less'
			),
		),
		'dependencies' => array(
			'ext.echo.ui',
			'ext.echo.styles.badge',
			'mediawiki.util',
		),
		'messages' => array(
			'echo-popup-footer-beta-invitation',
			'echo-popup-footer-beta-invitation-link',
			// echo-popup-footer-beta-invitation uses this message with {{int:}}:
			'echo-pref-beta-feature-cross-wiki-message',
		),
		'targets' => array( 'desktop' ),
	),
	'ext.echo.ui' => $echoResourceTemplate + array(
		'scripts' => array(
			'ooui/mw.echo.ui.js',
			'ooui/mw.echo.ui.PlaceholderItemWidget.js',
			'ooui/mw.echo.ui.NotificationItemWidget.js',
			'ooui/mw.echo.ui.NotificationGroupItemWidget.js',
			'ooui/mw.echo.ui.NotificationsWidget.js',
			'ooui/mw.echo.ui.BundledNotificationGroupWidget.js',
			'ooui/mw.echo.ui.ActionMenuPopupWidget.js',
			'ooui/mw.echo.ui.MenuItemWidget.js',
			'ooui/mw.echo.ui.FooterNoticeWidget.js',
			'ooui/mw.echo.ui.NotificationsWrapper.js',
			'ext.echo.moment-hack.js',
		),
		'styles' => array(
			'ooui/styles/mw.echo.ui.overlay.less',
			'ooui/styles/mw.echo.ui.icons.less',
			'ooui/styles/mw.echo.ui.NotificationsWidget.less',
			'ooui/styles/mw.echo.ui.NotificationItemWidget.less',
			'ooui/styles/mw.echo.ui.NotificationGroupItemWidget.less',
			'ooui/styles/mw.echo.ui.BundledNotificationGroupWidget.less',
			'ooui/styles/mw.echo.ui.MenuItemWidget.less',
			'ooui/styles/mw.echo.ui.FooterNoticeWidget.less',
		),
		'skinStyles' => array(
			'monobook' => array(
				'ooui/styles/mw.echo.ui.NotificationsWidget.monobook.less',
			),
			'modern' => array(
				'ooui/styles/mw.echo.ui.NotificationItemWidget.modern.less',
			),
			'vector' => array(
				'ooui/styles/mw.echo.ui.overlay.vector.less',
			),
		),
		'dependencies' => array(
			'ext.echo.styles.notifications',
			'ext.echo.dm',
			'oojs-ui-core',
			'oojs-ui-widgets', // Only needed for ButtonSelectWidget :(
			'moment',
			'ext.echo.logger',
			'mediawiki.jqueryMsg',
			'mediawiki.language',
			'mediawiki.Title',
			// OOJS-UI icons
			// TODO: We are only using 1-2 icons from each
			// bundle; split them up to our own bundle so we
			// don't load heavy icons all the time
			'oojs-ui.styles.icons-user',
			'oojs-ui.styles.icons-alerts',
			'oojs-ui.styles.icons-content',
			'oojs-ui.styles.icons-interactions',
		),
		'messages' => array(
			'echo-badge-count',
			'echo-overlay-link',
			'echo-mark-all-as-read',
			'echo-more-info',
			'echo-feedback',
			'echo-notification-alert',
			'echo-notification-message',
			'echo-notification-loginrequired',
			'echo-notification-popup-loginrequired',
			'notification-link-text-collapse-all',
			"notification-link-text-expand-alert-count",
			"notification-link-text-expand-message-count",
			"notification-link-text-expand-all-count",
			"notification-timestamp-ago-seconds",
			"notification-timestamp-ago-minutes",
			"notification-timestamp-ago-hours",
			"notification-timestamp-ago-days",
			"notification-timestamp-ago-months",
			"notification-timestamp-ago-years",
			'echo-notification-markasread',
			'echo-notification-markasunread',
			'echo-notification-markasread-tooltip',
			'echo-notification-more-options-tooltip',
			'echo-notification-alert-text-only',
			'echo-notification-message-text-only',
			'echo-email-batch-bullet',
			'echo-notification-placeholder',
			'tooltip-pt-notifications-alert',
			'tooltip-pt-notifications-message',
			'mytalk',
			'mypreferences'
		),
		'targets' => array( 'desktop', 'mobile' ),
	),
	'ext.echo.dm' => $echoResourceTemplate + array(
		'scripts' => array(
			'viewmodel/mw.echo.dm.js',
			'viewmodel/mw.echo.dm.List.js',
			'viewmodel/mw.echo.dm.SortedList.js',
			'viewmodel/mw.echo.dm.UnreadNotificationCounter.js',
			'viewmodel/mw.echo.dm.NotificationItem.js',
			'viewmodel/mw.echo.dm.NotificationGroupItem.js',
			'viewmodel/mw.echo.dm.NotificationList.js',
			'viewmodel/mw.echo.dm.NotificationsModel.js',
		),
		'dependencies' => array(
			'oojs',
			'ext.echo.api',
		),
		'messages' => array(
			'echo-api-failure',
			'echo-api-failure-cross-wiki',
		),
		'targets' => array( 'desktop', 'mobile' ),
	),
	'ext.echo.api' => $echoResourceTemplate + array(
		'scripts' => array(
			'api/mw.echo.api.js',
			'api/mw.echo.api.EchoApi.js',
			'api/mw.echo.api.APIHandler.js',
			'api/mw.echo.api.LocalAPIHandler.js',
			'api/mw.echo.api.ForeignAPIHandler.js',
			'api/mw.echo.api.NetworkHandler.js',
		),
		'dependencies' => array(
			'mediawiki.api',
			'mediawiki.ForeignApi',
			'oojs'
		),
		'targets' => array( 'desktop', 'mobile' ),
	),
	'ext.echo.base' => array(
		// This is a dummy module for backwards compatibility.
		// Most extensions that require ext.echo.base actually need
		// the logger. They will have to be adjusted to use the new
		// logger functionality, however.
		// This module is mainly here to make sure other extensions
		// that rely on ext.echo.base don't explode, and that CI lets
		// us merge this while fixing the main extensions that require
		// to be changed due to the new structure.
		'targets' => array( 'desktop', 'mobile' ),
		'dependencies' => array( 'ext.echo.logger' )
	),
	// ext.echo.logger is registered in EchoHooks::onResourceLoaderRegisterModules
	'ext.echo.init' => $echoResourceTemplate + array(
		'scripts' => array(
			'ext.echo.init.js',
		),
		'dependencies' => array(
			'ext.echo.api',
			'mediawiki.Uri',
		 ),
		'targets' => array( 'desktop' ),
	),
	// Base no-js styles
	'ext.echo.styles.badge' => $echoResourceTemplate + array(
		'position' => 'top',
		'styles' => array(
			'nojs/mw.echo.badge.less',
		),
		'skinStyles' => array(
			'monobook' => array(
				'nojs/mw.echo.badge.monobook.less',
			),
			'vector' => array(
				'nojs/mw.echo.badge.vector.less',
			),
		),
		'targets' => array( 'desktop', 'mobile' ),
	),
	// Styles for individual notification entries in flyout and Special:Notifications
	'ext.echo.styles.notifications' => $echoResourceTemplate + array(
		'position' => 'top',
		'styles' => array(
			'nojs/mw.echo.notifications.less'
		),
		'targets' => array( 'desktop', 'mobile' ),
	),
	'ext.echo.styles.alert' => $echoResourceTemplate + array(
		'position' => 'top',
		'styles' => array(
			'nojs/mw.echo.alert.less',
		),
		'skinStyles' => array(
			'monobook' => array(
				'nojs/mw.echo.alert.monobook.less',
			),
			'modern' => array(
				'nojs/mw.echo.alert.modern.less',
			),
		),
		'targets' => array( 'desktop', 'mobile' ),
	),
	'ext.echo.styles.special' => $echoResourceTemplate + array(
		'position' => 'top',
		'styles' => array(
			'nojs/mw.echo.special.less',
		),
		'targets' => array( 'desktop', 'mobile' ),
	),
	'ext.echo.special' => $echoResourceTemplate + array(
		'scripts' => array(
			'special/ext.echo.special.js',
		),
		'dependencies' => array(
			'mediawiki.ui.button',
			'mediawiki.api',
			'ext.echo.ui',
		),
		'messages' => array(
			'echo-load-more-error',
			'echo-more-info',
			'echo-feedback',
		),
	),

	// HACK: OOUI has an icon pack for these, but it's unhelpfully large and we don't
	// want to load more as render-blocking CSS than we have to (T112401)
	'ext.echo.badgeicons' => $echoResourceTemplate + array(
		'class' => 'ResourceLoaderOOUIImageModule',
		'position' => 'top',
		'name' => 'badgeicons',
		'rootPath' => 'icons',
		'selectorWithoutVariant' => '.oo-ui-icon-{name}',
		'selectorWithVariant' => '.oo-ui-image-{variant}.oo-ui-icon-{name}',
	),
);

unset( $echoResourceTemplate );
