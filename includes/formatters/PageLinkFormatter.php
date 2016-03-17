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
	 *
	 * @param $event EchoEvent
	 * @param $user User
	 * @param $type string deprecated
	 */
	protected function generateBundleData( $event, $user, $type ) {
		$data = $this->getRawBundleData( $event, $user, $type );

		if ( !$data ) {
			return;
		}
		$extra = self::extractExtra( $event->getExtra() );

		if ( !$this->isTitleSet( $extra ) ) {
			// Link from title is required for bundling notification
			return;
		}

		$count = 1;
		$linkFrom = array(
			$extra['link-from-page-id'] => true
		);
		foreach ( $data as $bundledEvent ) {
			$extra = $bundledEvent->getExtra();
			if ( !$extra ) {
				continue;
			}

			if ( $this->isTitleSet( $extra ) ) {
				$pageId = $extra['link-from-page-id'];

				if ( !isset( $linkFrom[$pageId] ) ) {
					$linkFrom[$pageId] = true;
					$count++;
				}
			}
			if ( $count > MWEchoNotifUser::MAX_BADGE_COUNT + 1 ) {
				break;
			}
		}

		$this->bundleData['link-from-page-other-count'] = $count - 1;
		if ( $count > 1 ) {
			$this->bundleData['use-bundle'] = true;
		}
	}

	/**
	 * Internal function to check if link from page id key is set
	 * @param $extra array
	 * @return bool
	 */
	private function isTitleSet( $extra ) {
		return isset( $extra['link-from-page-id'] ) && $extra['link-from-page-id'];
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
				$title = null;
				if ( $this->isTitleSet( $extra ) ) {
					$title = Title::newFromId( $extra['link-from-page-id'] );
					// Link-from page could be a brand new page and page_id would not be replicated
					// to slave db yet.  If job queue is enabled to process web and email notification,
					// the check against master database is not necessary since there is already a
					// delay in the job queue
					if ( !$title ) {
						global $wgEchoUseJobQueue;
						$diff = wfTimestamp() - wfTimestamp( TS_UNIX, $event->getTimestamp() );
						if ( !$wgEchoUseJobQueue && $diff < 5 ) {
							$title = Title::newFromID( $extra['link-from-page-id'], Title::GAID_FOR_UPDATE );
						}
					}
					if ( $title ) {
						if ( $this->outputFormat === 'htmlemail' ) {
							$message->rawParams(
								Linker::link(
									$title,
									$this->formatTitle( $title ),
									array( 'style' => $this->getHTMLLinkStyle() ),
									array(),
									array( 'https' )
								)
							);
						} else {
							$message->params( $this->formatTitle( $title ) );
						}
					}
				}

				if ( !$title ) {
					$message->params( $this->getMessage( 'echo-no-title' ) );
				}
				break;

			// example: {7} other pages, {99+} other pages
			// link-from-page-other-display is no longer needed for new messages, but kept for backwards-compatibility
			case 'link-from-page-other-display':
			case 'link-from-page-other-count':
				$message->numParams(
					EchoNotificationController::getCappedNotificationCount( $this->bundleData['link-from-page-other-count'] )
				);
				break;

			default:
				parent::processParam( $event, $param, $message, $user );
				break;
		}
	}

	/**
	 * Helper function for getLink()
	 *
	 * @param EchoEvent $event
	 * @param User $user The user receiving the notification
	 * @param String $destination The destination type for the link
	 * @return Array including target and query parameters
	 */
	protected function getLinkParams( $event, $user, $destination ) {
		$target = null;
		$query = array();
		// Set up link parameters based on the destination (or pass to parent)
		switch ( $destination ) {
			case 'link-from-page':
				if ( $this->bundleData['use-bundle'] ) {
					if ( $event->getTitle() ) {
						$target = SpecialPage::getTitleFor( 'WhatLinksHere', $event->getTitle()->getPrefixedText() );
					}
				} else {
					$extra = self::extractExtra( $event->getExtra() );
					if ( $this->isTitleSet( $extra ) ) {
						$target = Title::newFromId( $extra['link-from-page-id'] );
					}
				}
				break;
			default:
				return parent::getLinkParams( $event, $user, $destination );
		}

		return array( $target, $query );
	}
}
