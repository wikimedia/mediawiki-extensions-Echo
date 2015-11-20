<?php

/**
 * A formatter for the notification flyout popup. Just the bare data needed to
 * render everything client-side.
 */
class EchoModelFormatter extends EchoFlyoutFormatter {
	/**
	 * @param EchoEventPresentationModel $model
	 * @return array
	 */
	protected function formatModel( EchoEventPresentationModel $model ) {
		$data = $model->jsonSerialize();
		$data['iconUrl'] = EchoNotificationFormatter::getIconUrl( $model->getIconType(), $this->language->getDir() );
		return $data;
	}
}
