<?php

$cfg = require __DIR__ . '/../vendor/mediawiki/mediawiki-phan-config/src/config.php';

$cfg['directory_list'] = array_merge(
	$cfg['directory_list'],
	[
		'../../extensions/CentralAuth',
		'../../extensions/UserMerge',
	]
);

$cfg['exclude_analysis_directory_list'] = array_merge(
	$cfg['exclude_analysis_directory_list'],
	[
		'../../extensions/CentralAuth',
		'../../extensions/UserMerge',
	]
);

if ( !in_array(
	Wikimedia\NormalizedException\NormalizedException::class,
	$cfg['exception_classes_with_optional_throws_phpdoc'],
	true
) ) {
	$cfg['exception_classes_with_optional_throws_phpdoc'] = [
		...$cfg['exception_classes_with_optional_throws_phpdoc'],
		Wikimedia\NormalizedException\NormalizedException::class,
	];
} else {
	throw new \Error( 'Delete override, no longer needed' );
}

return $cfg;
