<?php

class EchoIcon {

	const URL = 'url';
	const PATH = 'path';

	/**
	 * @param string $icon Name of icon as registered in BeforeCreateEchoEvent hook
	 * @param string $directionality 'ltr' or 'rtl'
	 * @return string Web URL of the icon
	 */
	public static function getUrl( $icon, $directionality ) {
		global $wgExtensionAssetsPath;
		list( $location, $locationType ) = self::getIconLocation( $icon, $directionality );

		// If it's a path, stick the assets path in front
		if ( $locationType === self::PATH ) {
			$location = "$wgExtensionAssetsPath/$location";
		}

		return $location;
	}

	/**
	 * @param string $icon Name of icon as registered in BeforeCreateEchoEvent hook
	 * @param string $directionality 'ltr' or 'rtl'
	 * @return string Data or web URL for the icon
	 * @throws Exception
	 */
	public static function getUrlForEmail( $icon, $directionality ) {
		// phpcs:ignore MediaWiki.NamingConventions.ValidGlobalName.allowedPrefix
		global $IP;
		list( $location, $locationType ) = self::getIconLocation( $icon, $directionality );

		// If it's a path, build a data uri
		if ( $locationType === self::PATH ) {
			$format = substr( $location, -3 );
			if ( $format === 'svg' ) {
				$format = 'svg+xml';
			}
			$fullPath = "$IP/extensions/$location";
			return "data:image/$format;base64," . base64_encode( file_get_contents( $fullPath ) );
		}

		// Fallback to a web URL when we don't know the file's location on disk
		return wfExpandUrl( $location, PROTO_CANONICAL );
	}

	/**
	 * @param string $icon Name of icon as registered in BeforeCreateEchoEvent hook
	 * @param string $directionality 'ltr' or 'rtl'
	 * @return array [ Icon location, Location type: 'url' or 'path' ]
	 */
	private static function getIconLocation( $icon, $directionality ) {
		global $wgEchoNotificationIcons;
		if ( !isset( $wgEchoNotificationIcons[$icon] ) ) {
			throw new InvalidArgumentException( "The $icon icon is not registered" );
		}

		$iconInfo = $wgEchoNotificationIcons[$icon];

		// Now we need to check it has a valid url/path
		if ( isset( $iconInfo[self::URL] ) && $iconInfo[self::URL] ) {
			$location = $iconInfo[self::URL];
			$locationType = self::URL;
		} elseif ( isset( $iconInfo[self::PATH] ) && $iconInfo[self::PATH] ) {
			$location = $iconInfo[self::PATH];
			$locationType = self::PATH;
		} else {
			// Fallback to hardcoded 'placeholder'. This is used if someone
			// doesn't configure the 'site' icon for example.
			$icon = 'placeholder';
			$location = $wgEchoNotificationIcons['placeholder'][self::PATH];
			$locationType = self::PATH;
		}

		// Might be an array with different icons for ltr/rtl
		if ( is_array( $location ) ) {
			if ( !isset( $location[$directionality] ) ) {
				throw new UnexpectedValueException(
					"Icon type $icon doesn't have an icon for $directionality directionality"
				);
			}

			$location = $location[$directionality];
		}

		return [ $location, $locationType ];
	}

}
