<?php

class EchoEditFormatter extends EchoBasicFormatter {

	/**
	 * @param EchoEvent $event
	 * @param $param
	 * @param $message Message
	 * @param $user User
	 */
	protected function processParam( EchoEvent $event, $param, $message, $user ) {
		if ( $param === 'difflink' ) {
			$eventData = $event->getExtra();
			if ( !isset( $eventData['revid'] ) ) {
				$message->params( '' );
				return;
			}

			if ( !$event->getTitle() ) {
				$message->params( wfMessage( 'echo-no-title' )->text() );
			}

			$revid = $eventData['revid'];
			$title = $event->getTitle();

			if ( $this->outputFormat === 'html' ) {
				$link = Linker::link(
					$title,
					'(' . wfMessage( 'diff' )->escaped() . ')',
					array(
						'class' => 'mw-echo-diff',
					),
					array(
						'oldid' => $revid,
						'diff' => 'prev',
					)
				);
				$message->rawParams( $link );
			} else {
				$link = $title->getFullURL(
					array( 'oldid' => $revid, 'diff' => 'prev' ) );

				$message->params( $link );
			}
		} else {
			parent::processParam( $event, $param, $message, $user );
		}
	}
}
