<?php

/**
 * Custom formatter for 'page-link' notifications
 */
class EchoPageLinkFormatter extends EchoBasicFormatter {

	/**
	 * This method overwrite parent method and construct the bundle iterator
	 * based on link from, it will be used in a message like this: Page A was
	 * link from Page B and X other pages
	 * @param $event EchoEvent
	 * @param $user User
	 */
	protected function generateBundleData( $event, $user ) {
		global $wgEchoMaxNotificationCount;

		$data = $this->getRawBundleData( $event, $user );

		if ( !$data ) {
			return;
		}
		$extra = $event->getExtra();

		$linkFrom = array();

		if ( $this->isTitleSet( $extra ) ) {
			$linkFrom[$this->getTitleHash( $extra )] = true;
		} else {
			throw new MWException( "Link from title is required for bundling notification!" );
		}

		$count = 1;
		foreach ( $data as $row ) {
			$extra = $row->event_extra;
			if ( $this->isTitleSet( $extra ) ) {
				$key = $this->getTitleHash( $extra );

				if ( !isset( $linkFrom[$key] ) ) {
					$linkFrom[$key] = true;
					$count++;
				}
			}
			if ( $count > $wgEchoMaxNotificationCount + 1 ) {
				break;
			}
		}

		$this->bundleData['link-from-page-other-count'] = $count - 1;
		if ( $count > 1 ) {
			$this->bundleData['use-bundle'] = true;
		}
	}

	/**
	 * Internal function to check if link from namespace and title keys are set
	 * @param $extra array
	 * @return bool
	 */
	private function isTitleSet( $extra ) {
		if ( isset( $extra['link-from-namespace'], $extra['link-from-title'] ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Internal function to generate a unique md5 of namespace and title
	 * @param $extra array
	 * @return string
	 */
	private function getTitleHash( $extra ) {
		return md5( $extra['link-from-namespace'] . '-' .  $extra['link-from-title'] );
	}

	/**
	 * @param $event EchoEvent
	 * @param $param string
	 * @param $message Message
	 * @param $user User
	 */
	protected function processParam( $event, $param, $message, $user ) {
		$extra = $event->getExtra();
		switch ( $param ) {
			// 'A' part in this message: link from page A and X others
			case 'link-from-page':
				if ( $this->isTitleSet( $extra ) ) {
					$message->params(
						Title::makeTitle(
							$extra['link-from-namespace'],
							$extra['link-from-title']
						)
					);
				} else {
					$message->params( '' );
				}
				break;

			// example: {7} other page, {99+} other pages
			case 'link-from-page-other-display':
				global $wgEchoMaxNotificationCount;

				if ( $this->bundleData['link-from-page-other-count'] > $wgEchoMaxNotificationCount ) {
					$message->params(
						wfMessage( 'echo-notification-count' )
						->inLanguage( $user->getOption( 'language' ) )
						->params( $wgEchoMaxNotificationCount )
						->text()
					);
				} else {
					$message->params( $this->bundleData['link-from-page-other-count'] );
				}
				break;

			// the number used for plural support
			case 'link-from-page-other-count':
				$message->params( $this->bundleData['link-from-page-other-count'] );
				break;

			default:
				parent::processParam( $event, $param, $message, $user );
				break;
		}
	}

}
