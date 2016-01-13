<?php

/**
 * Formatter for 'user-rights' notifications
 */
class EchoUserRightsPresentationModel extends EchoEventPresentationModel {

	public function getIconType() {
		return 'user-rights';
	}

	public function getHeaderMessage() {
		$msg = parent::getHeaderMessage();
		// @todo fix lego message
		$msg->params( $this->getChangedGroups() );

		return $msg;
	}

	/**
	 * @return string
	 */
	private function getChangedGroups() {
		$list = array();
		$extra = $this->event->getExtra();
		foreach ( array( 'add', 'remove' ) as $action ) {
			if ( isset( $extra[$action] ) && $extra[$action] ) {

				// Get the localized group names, bug 55338
				$groups = array();
				foreach ( $extra[$action] as $group ) {
					$msg = $this->msg( 'group-' . $group );
					$groups[] = $msg->isBlank() ? $group : $msg->text();
				}

				// Messages that can be used here:
				// * notification-user-rights-add
				// * notification-user-rights-remove
				$list[] = $this->msg( 'notification-user-rights-' . $action )
					->params( $this->language->commaList( $groups ), count( $groups ) )
					->text();
			}
		}

		return $this->language->semicolonList( $list );
	}

	public function getPrimaryLink() {
		return array(
			'url' => SpecialPage::getTitleFor( 'Listgrouprights' )->getLocalURL(),
			'label' => $this->msg( 'echo-learn-more' )->text()
		);
	}

	public function getSecondaryLinks() {
		return array( $this->getAgentLink() );
	}
}
