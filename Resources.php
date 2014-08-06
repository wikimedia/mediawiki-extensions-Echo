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
	// ext.echo.base is used by mobile notifications as well, so be sure not to add any
	// dependencies that do not target mobile.
	'ext.echo.base' => $echoResourceTemplate + array(
		'styles' => 'base/ext.echo.base.less',
		'scripts' => array(
			'base/ext.echo.base.js',
		),
		'messages' => array(
			'echo-error-preference',
			'echo-error-token',
		),
		'targets' => array( 'desktop', 'mobile' ),
	),
	'ext.echo.desktop' => $echoResourceTemplate + array(
		'scripts' => array(
			'desktop/ext.echo.desktop.js',
		),
		'dependencies' => array(
			'ext.echo.base',
			'mediawiki.api',
			'mediawiki.Uri',
			'mediawiki.jqueryMsg',
			'mediawiki.user',
		),
	),
	'ext.echo.overlay' => $echoResourceTemplate + array(
		'scripts' => array(
			'overlay/ext.echo.overlay.js',
		),
		'styles' => 'overlay/ext.echo.overlay.less',
		'skinStyles' => array(
			'modern' => 'overlay/ext.echo.overlay.modern.css',
			'monobook' => 'overlay/ext.echo.overlay.monobook.css',
		),
		'dependencies' => array(
			'ext.echo.desktop',
			'mediawiki.util',
			'mediawiki.language',
		),
		'messages' => array(
			'echo-overlay-link',
			'echo-mark-all-as-read',
			'echo-more-info',
			'echo-feedback',
			'echo-notification-alert',
			'echo-notification-message',
			'echo-email-batch-bullet'
		),
	),
	'ext.echo.overlay.init' => $echoResourceTemplate + array(
		'dependencies' => array(
			'ext.echo.overlay',
		),
		'scripts' => array(
			'overlay/ext.echo.overlay.init.js',
		),
	),
	'ext.echo.special' => $echoResourceTemplate + array(
		'scripts' => array(
			'special/ext.echo.special.js',
		),
		'styles' => 'special/ext.echo.special.less',
		'dependencies' => array(
			'ext.echo.desktop',
			'mediawiki.ui.button',
		),
		'messages' => array(
			'echo-load-more-error',
			'echo-more-info',
			'echo-feedback',
		),
		'position' => 'top',
	),
	'ext.echo.alert' => $echoResourceTemplate + array(
		'styles' => 'alert/ext.echo.alert.less',
		'skinStyles' => array(
			'modern' => 'alert/ext.echo.alert.modern.css',
			'monobook' => 'alert/ext.echo.alert.monobook.css',
		),
	),
	'ext.echo.badge' => $echoResourceTemplate + array(
		'styles' => 'badge/ext.echo.badge.less',
		'skinStyles' => array(
			'modern' => 'badge/ext.echo.badge.modern.css',
			'monobook' => 'badge/ext.echo.badge.monobook.css',
		),
	),
);
