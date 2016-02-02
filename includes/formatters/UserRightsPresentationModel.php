<?php

/**
 * Formatter for 'user-rights' notifications
 */
class EchoUserRightsPresentationModel extends EchoEventPresentationModel {

	public function getIconType() {
		return 'user-rights';
	}

	public function getHeaderMessage() {
		list( $formattedName, $genderName ) = $this->getAgentForOutput();
		$add = $this->getLocalizedGroupNames( array_values( $this->event->getExtraParam( 'add', array() ) ) );
		$remove = $this->getLocalizedGroupNames( array_values( $this->event->getExtraParam( 'remove', array() ) ) );
		if ( $add && !$remove ) {
			$msg = $this->msg( 'notification-header-user-rights-add-only' );
			$msg->params( $genderName );
			$msg->params( $this->language->listToText( $add ) );
			$msg->params( count( $add ) );
			$msg->params( $this->getViewingUserForGender() );
			return $msg;
		} elseif ( !$add && $remove ) {
			$msg = $this->msg( 'notification-header-user-rights-remove-only' );
			$msg->params( $genderName );
			$msg->params( $this->language->listToText( $remove ) );
			$msg->params( count( $remove ) );
			$msg->params( $this->getViewingUserForGender() );
			return $msg;
		} else {
			$msg = $this->msg( 'notification-header-user-rights-add-and-remove' );
			$msg->params( $genderName );
			$msg->params( $this->language->listToText( $add ) );
			$msg->params( count( $add ) );
			$msg->params( $this->language->listToText( $remove ) );
			$msg->params( count( $remove ) );
			$msg->params( $this->getViewingUserForGender() );
			return $msg;
		}
	}

	private function getLocalizedGroupNames( $names ) {
		return array_map( function( $name ) {
			$msg = $this->msg( 'group-' . $name );
			return $msg->isBlank() ? $name : $msg->text();
		}, $names );
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
