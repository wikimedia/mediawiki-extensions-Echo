<?php

class EchoPageLinkedPresentationModel extends EchoEventPresentationModel {

	public function getIconType() {
		return 'linked';
	}

	/**
	 * The page containing the link may be a new page
	 * that is not yet replicated.
	 * This event won't be rendered unless/until
	 * both pages are available.
	 * @return bool
	 */
	public function canRender() {
		$pageTo = $this->event->getTitle();
		$pageFrom = $this->getPageFrom();
		return (bool)$pageTo && (bool)$pageFrom;
	}

	public function getPrimaryLink() {
		return array(
			'url' => $this->getPageFrom()->getFullURL(),
			'label' => $this->msg( 'notification-link-text-view-page' )->text(),
		);
	}

	public function getSecondaryLinks() {
		$whatLinksHereLink = array(
			'url' => SpecialPage::getTitleFor( 'Whatlinkshere', $this->event->getTitle()->getPrefixedText() )->getFullURL(),
			'label' => $this->msg( 'notification-link-text-what-links-here' )->text(),
			'description' => '',
			'icon' => 'linked',
			'prioritized' => true
		);
		return array( $whatLinksHereLink );
	}

	protected function getHeaderMessageKey() {
		if ( $this->getBundleCount( true, array( $this, 'getLinkedPageId' ) ) > 1 ) {
			return "notification-bundle-header-{$this->type}";
		}
		return "notification-header-{$this->type}";
	}

	public function getHeaderMessage() {
		$msg = parent::getHeaderMessage();
		$msg->params( $this->getTruncatedTitleText( $this->event->getTitle(), true ) );
		$msg->params( $this->getTruncatedTitleText( $this->getPageFrom(), true ) );
		$count =
			$this->getNotificationCountForOutput( false, array( $this, 'getLinkedPageId' ) );

		// Repeat is B/C until unused parameter is removed from translations
		$msg->numParams( $count, $count );
		return $msg;
	}

	/**
	 * Get the page ID of the linked-from page for a given event.
	 * @param EchoEvent $event page-linked event
	 * @return int Page ID, or 0 if the page doesn't exist
	 */
	public function getLinkedPageId( EchoEvent $event ) {
		$extra = $event->getExtra();
		if ( isset( $extra['link-from-page-id'] ) ) {
			return $extra['link-from-page-id'];
		}
		// Backwards compatiblity for events from before https://gerrit.wikimedia.org/r/#/c/63076
		if ( isset( $extra['link-from-namespace'] ) && isset( $extra['link-from-title'] ) ) {
			$title = Title::makeTitleSafe( $extra['link-from-namespace'], $extra['link-from-title'] );
			if ( $title ) {
				return $title->getArticleId();
			}
		}
		return 0;
	}

	private function getPageFrom() {
		return Title::newFromId( $this->getLinkedPageId( $this->event ) );
	}
}
