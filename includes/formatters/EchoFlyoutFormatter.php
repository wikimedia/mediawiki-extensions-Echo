<?php

/**
 * A formatter for the notification flyout popup
 *
 * Ideally we wouldn't need this and we'd just pass the
 * presentation model to the client, but we need to continue
 * sending HTML for backwards compatibility.
 */
class EchoFlyoutFormatter extends EchoEventFormatter {
	public function format( EchoEvent $event ) {
		$model = EchoEventPresentationModel::factory( $event, $this->language, $this->user );
		if ( !$model->canRender() ) {
			return false;
		}

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

		//@todo body text

		$ts = $this->language->getHumanTimestamp(
			new MWTimestamp( $event->getTimestamp() ),
			null,
			$this->user
		);

		$footerItems = array( $ts );
		foreach ( $model->getSecondaryLinks() as $target => $text ) {
			$footerItems[] = Html::element( 'a', array( 'href' => $target ), $text );
		}
		$html .= Xml::tags(
			'div',
			array( 'class' => 'mw-echo-notification-footer' ),
			$this->language->pipeList( $footerItems )
		) . "\n";

		// Add the primary link afterwards???
		list( $primaryUrl, $primaryText ) = $model->getPrimaryLink();
		$html .= Html::element(
			'a',
			array( 'class' => 'mw-echo-notification-primary-link', 'href' => $primaryUrl ),
			$primaryText
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
