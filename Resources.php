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
	'ext.echo.ui' => $echoResourceTemplate + array(
		'scripts' => array(
			'ooui/mw.echo.ui.js',
			'ooui/mw.echo.ui.NotificationsWidget.js',
			'ooui/mw.echo.ui.NotificationOptionWidget.js',
			'ooui/mw.echo.ui.NotificationBadgeWidget.js'
		),
		'styles' => array(
			'ooui/styles/mw.echo.ui.NotificationsWidget.less',
			'ooui/styles/mw.echo.ui.NotificationOptionWidget.less',
			'ooui/styles/mw.echo.ui.NotificationBadgeWidget.less'
		),
		'skinStyles' => array(
			'monobook' => array(
				'ooui/styles/mw.echo.ui.NotificationsWidget.monobook.less',
				'ooui/styles/mw.echo.ui.NotificationBadgeWidget.monobook.less'
			),
			'modern' => array(
				'ooui/styles/mw.echo.ui.NotificationOptionWidget.modern.less',
				'ooui/styles/mw.echo.ui.NotificationBadgeWidget.modern.less'
			)
		),
		'dependencies' => array(
			'ext.echo.nojs',
			'ext.echo.dm',
			'oojs-ui',
			'ext.echo.logger',
			'mediawiki.api',
			'mediawiki.jqueryMsg',
			'mediawiki.language',
		),
		'messages' => array(
			'echo-overlay-link',
			'echo-mark-all-as-read',
			'echo-more-info',
			'echo-feedback',
			'echo-notification-alert',
			'echo-notification-message',
			'echo-notification-alert-text-only',
			'echo-notification-message-text-only',
			'echo-email-batch-bullet',
			'tooltip-pt-notifications-alert',
			'tooltip-pt-notifications-message',
			'mypreferences'
		),
		'targets' => array( 'desktop', 'mobile' ),
	),
	'ext.echo.dm' => $echoResourceTemplate + array(
		'scripts' => array(
			'viewmodel/mw.echo.dm.js',
			'viewmodel/mw.echo.dm.NotificationItem.js',
			'viewmodel/mw.echo.dm.List.js',
			'viewmodel/mw.echo.dm.NotificationList.js',
			'viewmodel/mw.echo.dm.NotificationsModel.js',
		),
		'dependencies' => array(
			'oojs'
		),
		'targets' => array( 'desktop', 'mobile' ),
	),
	'ext.echo.base' => array(
		// This is a dummy module for backwards compatibility.
		// Most extensions that require ext.echo.base actually need
		// the logger. They will have to be adjusted to use the new
		// logger functionality, however.
		//
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
			'ext.echo.ui'
		),
		'targets' => array( 'desktop', 'mobile' ),
	),
	// Base no-js styles
	'ext.echo.nojs' => $echoResourceTemplate + array(
		'position' => 'top',
		'styles' => array(
			'nojs/mw.echo.badge.less',
			'nojs/mw.echo.alert.less',
			'nojs/mw.echo.notifications.less'
		),
		'skinStyles' => array(
			'monobook' => array(
				'nojs/mw.echo.alert.monobook.less',
			),
			'modern' => array(
				'nojs/mw.echo.alert.modern.less',
			)
		),
		'targets' => array( 'desktop', 'mobile' ),
	),
	'ext.echo.nojs.special' => $echoResourceTemplate + array(
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
);

unset( $echoResourceTemplate );
