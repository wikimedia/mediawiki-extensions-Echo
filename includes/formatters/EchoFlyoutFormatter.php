<?php

/**
 * A formatter for the notification flyout popup
 *
 * Ideally we wouldn't need this and we'd just pass the
 * presentation model to the client, but we need to continue
 * sending HTML for backwards compatibility.
 */
class EchoFlyoutFormatter extends EchoEventFormatter {
	protected function formatModel( EchoEventPresentationModel $model ) {
		$icon = Html::element(
			'img',
			array(
				'class' => 'mw-echo-icon',
				'src' => $this->getIconURL( $model ),
			)
		);

		$html = Xml::tags(
				'div',
				array( 'class' => 'mw-echo-title' ),
				$model->getHeaderMessage()->parse()
			) . "\n";

		$body = $model->getBodyMessage();
		if ( $body ) {
			$html .= Xml::tags(
					'div',
					array( 'class' => 'mw-echo-payload' ),
					$body->parse()
				) . "\n";
		}

		$ts = $this->language->getHumanTimestamp(
			new MWTimestamp( $model->getTimestamp() ),
			null,
			$this->user
		);

		$footerItems = array( $ts );
		$secondaryLinks = $this->normalizeSecondaryLinks( $model->getSecondaryLinks() );
		foreach ( $secondaryLinks as $link ) {
			$footerItems[] = Html::element( 'a', array( 'href' => $link['url'] ), $link['label'] );
		}
		$html .= Xml::tags(
			'div',
			array( 'class' => 'mw-echo-notification-footer' ),
			$this->language->pipeList( $footerItems )
		) . "\n";

		// Add the primary link afterwards, if it has one
		$primaryLink = $model->getPrimaryLink();
		if ( $primaryLink !== false ) {
			$primaryLink = $this->normalizePrimaryLink( $primaryLink );
			$html .= Html::element(
				'a',
				array( 'class' => 'mw-echo-notification-primary-link', 'href' => $primaryLink['url'] ),
				$primaryLink['label']
			) . "\n";
		}

		// Wrap everything in mw-echo-content class
		$html = Xml::tags( 'div', array( 'class' => 'mw-echo-content' ), $html );

		// And then add the icon in front and wrap with mw-echo-state class.
		$html = Xml::tags( 'div', array( 'class' => 'mw-echo-state' ), $icon . $html );

		return $html;
	}

	private function getIconURL( EchoEventPresentationModel $model ) {
		return EchoNotificationFormatter::getIconUrl(
				$model->getIconType(),
				$this->language->getDir()
		);
	}

	/**
	 * Utility method to ensure B/C compat with previous getPrimaryLink return
	 * types, until all of them have been fixed.
	 *
	 * @deprecated
	 * @param string|array|bool $link
	 * @return string|bool
	 */
	protected function normalizePrimaryLink( $link ) {
		// B/C for old format: [url, label]
		if ( !isset( $link['url'] ) ) {
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
	protected function normalizeSecondaryLinks( array $link ) {
		// B/C for old secondary links format: [url => label, ...]
		if ( !isset( $link[0] ) || !isset( $link[0]['url'] ) ) {
			$links = array();
			foreach ( $link as $url => $text ) {
				$links[] = array(
					'url' => $url,
					'label' => $text,
					'description' => '',
					'icon' => false,
					'prioritized' => false,
				);
			}
			return $links;
		}

		// current secondary links format: [['url' => ..., 'label' => ..., ...], ...]
		return $link;
	}
}
