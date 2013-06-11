<?php

/**
 * Custom formatter for 'page-link' notifications
 */
class EchoPageLinkFormatter extends EchoBasicFormatter {

	/**
	 * This is a workaround for backwards compatibility.
	 * In https://gerrit.wikimedia.org/r/#/c/63076 we changed
	 * the schema to save link-from-page-id instead of
	 * link-from-namespace & link-from-title
	 */
	protected function extractExtra( $extra ) {
		if ( isset( $extra['link-from-namespace'], $extra['link-from-title'] )
			&& !isset( $extra['link-from-page-id'] )
		) {
			$title = Title::makeTitleSafe(
				$extra['link-from-namespace'],
				$extra['link-from-title']
			);
			if ( $title ) {
				$extra['link-from-page-id'] = $title->getArticleId();
				unset(
					$extra['link-from-namespace'],
					$extra['link-from-title']
				);
			}
		}

		return $extra;
	}

	/**
	 * This method overwrite parent method and construct the bundle iterator
	 * based on link from, it will be used in a message like this: Page A was
	 * link from Page B and X other pages
	 * @param $event EchoEvent
	 * @param $user User
	 * @param $type string Notification disytribution type
	 */
	protected function generateBundleData( $event, $user, $type ) {
		global $wgEchoMaxNotificationCount;

		$data = $this->getRawBundleData( $event, $user, $type );

		if ( !$data ) {
			return;
		}
		$extra = self::extractExtra( $event->getExtra() );

		$linkFrom = array();

		if ( !$this->isTitleSet( $extra ) ) {
			// Link from title is required for bundling notification
			return;
		}
		$key = $this->getTitleHash( $extra );
		if ( !$key ) {
			// Page no longer exists
			return;
		}
		$linkFrom[$key] = true;

		$count = 1;
		foreach ( $data as $row ) {
			$extra = $row->event_extra ? unserialize( $row->event_extra ) : null;
			if ( !$extra ) {
				continue;
			}

			if ( $this->isTitleSet( $extra ) ) {
				$key = $this->getTitleHash( $extra );

				if ( $key && !isset( $linkFrom[$key] ) ) {
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
		return isset( $extra['link-from-page-id'] );
	}

	/**
	 * Internal function to return a unique identifier representing the page.
	 * @param $extra array
	 * @return integer Unique identifier for the linked page
	 */
	private function getTitleHash( $extra ) {
		return $extra['link-from-page-id'];
	}

	/**
	 * @param $event EchoEvent
	 * @param $param string
	 * @param $message Message
	 * @param $user User
	 */
	protected function processParam( $event, $param, $message, $user ) {
		$extra = self::extractExtra( $event->getExtra() );
		switch ( $param ) {
			// 'A' part in this message: link from page A and X others
			case 'link-from-page':
				$content = null;
				if ( $this->isTitleSet( $extra ) ) {
					$title = Title::newFromId( $extra['link-from-page-id'] );
					if ( $title !== null ) {
						$content = $this->formatTitle( $title );
					}
				}
				if ( $content === null ) {
					$content = wfMessage( 'echo-no-title' );
				}
				$message->params( $content );
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
