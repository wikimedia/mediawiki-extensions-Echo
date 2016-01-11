<?php

class EchoLinkNormalizer {

	/**
	 * Utility method to ensure B/C compat with previous getPrimaryLink return
	 * types, until all of them have been fixed.
	 *
	 * @deprecated
	 * @param string|array|bool $link
	 * @return string|bool
	 */
	public static function normalizePrimaryLink( $link ) {
		// B/C for old format: [url, label]
		if ( $link && !isset( $link['url'] ) ) {
			return array(
				'url' => $link[0],
				'label' => $link[1],
			);
		}

		// current primary link format: ['url' => ..., 'label' => ...]
		return $link;
	}

	/**
	 * Utility method to ensure B/C compat with previous getSecondaryLinks
	 * return types, until all of them have been fixed.
	 *
	 * @deprecated
	 * @param array $link
	 * @return array
	 */
	public static function normalizeSecondaryLinks( array $link ) {
		// B/C for old secondary links format: [url => label, ...]
		if ( isset( $link[0] ) && !isset( $link[0]['url'] ) ) {
			$links = array();
			foreach ( $link as $url => $text ) {
				$links[] = array(
					'url' => $url,
					'label' => $text,
					'description' => '',
					'icon' => false,
					'prioritized' => true,
				);
			}
			return $links;
		}

		// current secondary links format: [['url' => ..., 'label' => ..., ...], ...]
		return $link;
	}



}
