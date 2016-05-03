<?php

/**
 * A formatter for Special:Notifications
 */
class SpecialNotificationsFormatter extends EchoEventFormatter {
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
					$body->escaped()
				) . "\n";
		}

		$ts = $this->language->getHumanTimestamp(
			new MWTimestamp( $model->getTimestamp() ),
			null,
			$this->user
		);

		$footerItems = array( Html::element( 'span', array( 'class' => 'mw-echo-notification-footer-element' ), $ts ) );

		// Add links to the footer, primary goes first, then secondary ones
		$links = array();
		$primaryLink = $model->getPrimaryLinkWithMarkAsRead();
		if ( $primaryLink !== false ) {
			$links[] = $primaryLink;
		}
		$links = array_merge( $links, array_filter( $model->getSecondaryLinks() ) );
		foreach ( $links as $link ) {
			$footerAttributes = array(
				'href' => $link['url'],
				'class' => 'mw-echo-notification-footer-element',
			);

			if ( isset( $link['tooltip'] ) ) {
				$footerAttributes['title'] = $link['tooltip'];
			}

			$footerItems[] = Html::element(
				'a',
				$footerAttributes,
				$link['label']
			);
		}

		$pipe = wfMessage( 'pipe-separator' )->inLanguage( $this->language )->escaped();
		$html .= Xml::tags(
			'div',
			array( 'class' => 'mw-echo-notification-footer' ),
			implode( Html::element( 'span', array( 'class' => 'mw-echo-notification-footer-element' ), $pipe ), $footerItems )
		) . "\n";

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
}
