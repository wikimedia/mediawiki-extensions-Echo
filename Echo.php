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

if ( function_exists( 'wfLoadExtension' ) ) {
	wfLoadExtension( 'Echo' );
	// Keep i18n globals so mergeMessageFileList.php doesn't break
	$wgMessagesDirs['Echo'] = [
		__DIR__ . '/i18n',
		__DIR__ . '/i18n/api',
	];
	$wgExtensionMessagesFiles['EchoAliases'] = __DIR__ . '/Echo.alias.php';
	/* wfWarn(
		'Deprecated PHP entry point used for Echo extension. ' .
		'Please use wfLoadExtension instead, ' .
		'see https://www.mediawiki.org/wiki/Extension_registration for more details.'
	); */
	return;
} else {
	die( 'This version of the Echo extension requires MediaWiki 1.25+' );
}
