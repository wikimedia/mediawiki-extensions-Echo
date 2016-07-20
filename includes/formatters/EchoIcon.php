<?php

class EchoIcon {

	/**
	 * @param string $icon Name of icon as registered in BeforeCreateEchoEvent hook
	 * @param string $dir either 'ltr' or 'rtl'
	 * @return string
	 */
	public static function getUrl( $icon, $dir ) {
		global $wgEchoNotificationIcons, $wgExtensionAssetsPath;
		if ( !isset( $wgEchoNotificationIcons[$icon] ) ) {
			throw new InvalidArgumentException( "The $icon icon is not registered" );
		}

		$iconInfo = $wgEchoNotificationIcons[$icon];
		$needsPrefixing = true;

		// Now we need to check it has a valid url/path
		if ( isset( $iconInfo['url'] ) && $iconInfo['url'] ) {
			$iconUrl = $iconInfo['url'];
			$needsPrefixing = false;
		} elseif ( isset( $iconInfo['path'] ) && $iconInfo['path'] ) {
			$iconUrl = $iconInfo['path'];
		} else {
			// Fallback to hardcoded 'placeholder'. This is used if someone
			// doesn't configure the 'site' icon for example.
			$icon = 'placeholder';
			$iconUrl = $wgEchoNotificationIcons['placeholder']['path'];
		}

		// Might be an array with different icons for ltr/rtl
		if ( is_array( $iconUrl ) ) {
			if ( !isset( $iconUrl[$dir] ) ) {
				throw new UnexpectedValueException( "Icon type $icon doesn't have an icon for $dir directionality" );
			}

			$iconUrl = $iconUrl[$dir];
		}

		// And if it was a 'path', stick the assets path in front
		if ( $needsPrefixing ) {
			$iconUrl = "$wgExtensionAssetsPath/$iconUrl";
		}

		return $iconUrl;
	}

}
