<?php

class EchoEditFormatter extends EchoBasicFormatter {
	protected function processParam( $event, $param, $message ) {
		parent::processParam( $event, $param, $message );

		if ( $param === 'difflink' ) {
			$eventData = $event->getExtra();
			if ( !isset($eventData['revid']) ) {
				$message->params('');
				return;
			}

			if ( !$event->getTitle() ) {
				$message->params(wfMsg('echo-no-title'));
			}

			$revid = $eventData['revid'];
			$title = $event->getTitle();

			if ( $this->outputFormat === 'html' ) {
				$link = Linker::link(
					$title,
					'('.wfMessage('diff')->text().')',
					array(
						'class' => 'mw-echo-diff',
					),
					array(
						'oldid' => $revid,
						'diff' => 'prev',
					)
				);
				$message->rawParams($link);
			} else {
				$link = Linker::linkUrl( $title,
					array( 'oldid' => $revid, 'diff' => 'prev' ) );

				$message->params($link);
			}
		}
	}
}