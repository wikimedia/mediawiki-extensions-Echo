<?php

/**
 * A formatter for the notification flyout popup. Just the bare data needed to
 * render everything client-side.
 */
class EchoModelFormatter extends EchoEventFormatter {
	/**
	 * @param EchoEventPresentationModel $model
	 * @return array
	 */
	protected function formatModel( EchoEventPresentationModel $model ) {
		$data = $model->jsonSerialize();
		$data['iconUrl'] = EchoNotificationFormatter::getIconUrl( $model->getIconType(), $this->language->getDir() );

		if ( isset( $data['links']['primary']['url'] ) ) {
			$data['links']['primary']['url'] = wfExpandUrl( $data['links']['primary']['url'] );
		}

		foreach ( $data['links']['secondary'] as &$link ) {
			$link['url'] = wfExpandUrl( $link['url'] );
		}

		return $data;
	}
}
