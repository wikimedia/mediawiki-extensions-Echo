<?php

class EchoRevertedPresentationModel extends EchoEventPresentationModel {

	public function getIconType() {
		return 'revert';
	}

	public function canRender() {
		return (bool)$this->event->getTitle();
	}

	public function getHeaderMessage() {
		$msg = parent::getHeaderMessage();
		$msg->params( $this->event->getTitle()->getPrefixedText() );
		$msg->params( $this->getNumberOfEdits() );
		return $msg;
	}

	public function getPrimaryLink() {
		$url = $this->event->getTitle()->getLocalURL( array(
			'oldid' => 'prev',
			'diff' => $this->event->getExtraParam( 'revid' )
		) );
		return array(
			$url, $this->msg( 'notification-link-text-view-changes' )->text()
		);
	}


	/**
	 * Return a number that represents if one or multiple edits
	 * have been reverted for formatting purposes.
	 * @return int
	 */
	private function getNumberOfEdits() {
		$method = $this->event->getExtraParam( 'method' );
		if ( $method && $method === 'rollback' ) {
			return 2;
		} else {
			return 1;
		}
	}
}
