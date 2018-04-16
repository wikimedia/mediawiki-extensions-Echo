<?php
if ( count( $argv ) < 3 ) {
	print "Call with 2 arguments: the path to the load url and the file to output to";
	exit();
}
$loadUrl = $argv[1];
$outputFile = $argv[2];

define( 'MEDIAWIKI', true );
const NS_MAIN = 0;
$wgVersion = 1.23;
$wgSpecialPages = [];
$wgResourceModules = [];

include "Resources.php";

$query = [];
$blacklist = [];
foreach ( $wgResourceModules as $moduleName => $def ) {
	if ( !in_array( $moduleName, $blacklist ) ) {
		$query[] = $moduleName;
	}
}

$url = $loadUrl . '?only=styles&skin=vector&modules=' . implode( '|', $query );
echo $url;
$css = file_get_contents( $url );
file_put_contents( $outputFile, $css );
