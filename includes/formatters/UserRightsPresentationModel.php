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
		$add = array_map(
			array( $this->language, 'embedBidi' ),
			$this->getLocalizedGroupNames( array_values( $this->event->getExtraParam( 'add', array() ) ) )
		);
		$remove = array_map(
			array( $this->language, 'embedBidi' ),
			$this->getLocalizedGroupNames( array_values( $this->event->getExtraParam( 'remove', array() ) ) )
		);
		if ( $add && !$remove ) {
			$msg = $this->msg( 'notification-header-user-rights-add-only' );
			$msg->params( $genderName );
			$msg->params( $this->language->commaList( $add ) );
			$msg->params( count( $add ) );
			$msg->params( $this->getViewingUserForGender() );
			return $msg;
		} elseif ( !$add && $remove ) {
			$msg = $this->msg( 'notification-header-user-rights-remove-only' );
			$msg->params( $genderName );
			$msg->params( $this->language->commaList( $remove ) );
			$msg->params( count( $remove ) );
			$msg->params( $this->getViewingUserForGender() );
			return $msg;
		} else {
			$msg = $this->msg( 'notification-header-user-rights-add-and-remove' );
			$msg->params( $genderName );
			$msg->params( $this->language->commaList( $add ) );
			$msg->params( count( $add ) );
			$msg->params( $this->language->commaList( $remove ) );
			$msg->params( count( $remove ) );
			$msg->params( $this->getViewingUserForGender() );
			return $msg;
		}
	}

	public function getBodyMessage() {
		$reason = $this->event->getExtraParam( 'reason' );
		return $reason ? $this->msg( 'notification-body-user-rights' )->params( $reason ) : false;
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
		return array( $this->getAgentLink(), $this->getLogLink() );
	}

	private function getLogLink() {
		$affectedUserPage = User::newFromId( $this->event->getExtraParam( 'user' ) )->getUserPage();
		$query = array(
			'type' => 'rights',
			'page' => $affectedUserPage->getPrefixedText(),
			'user' => $this->event->getAgent()->getName(),
		);
		return array(
			'label' => $this->msg( 'echo-log' )->text(),
			'url' => SpecialPage::getTitleFor( 'Log' )->getFullURL( $query ),
			'description' => '',
			'icon' => false,
			'prioritized' => true,
		);
	}
}
