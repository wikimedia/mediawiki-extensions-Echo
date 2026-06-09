<?php

namespace MediaWiki\Extension\Notifications\Formatters;

use MediaWiki\SpecialPage\SpecialPage;

class EchoUserBlockStatusPresentationModel extends EchoEventPresentationModel {

	/**
	 * @inheritDoc
	 */
	public function getIconType() {
		return 'block';
	}

	/**
	 * @inheritDoc
	 */
	public function getHeaderMessage() {
		if ( $this->event->getType() === 'user-unblocked' ) {
			return $this->msg( 'notification-header-user-unblocked' )
				->params( $this->getViewingUserForGender() );
		}

		$sitewide = (bool)$this->event->getExtraParam( 'sitewide', true );
		$indefinite = (bool)$this->event->getExtraParam( 'indefinite', false );

		if ( $sitewide && $indefinite ) {
			return $this->msg( 'notification-header-user-blocked-sitewide-indefinite' )
				->params( $this->getViewingUserForGender() );
		}

		if ( $sitewide ) {
			return $this->msg( 'notification-header-user-blocked-sitewide-temporary' )
				->params( $this->getViewingUserForGender() );
		}

		if ( $indefinite ) {
			return $this->msg( 'notification-header-user-blocked-partial-indefinite' )
				->params( $this->getViewingUserForGender() );
		}

		return $this->msg( 'notification-header-user-blocked-partial-temporary' )
			->params( $this->getViewingUserForGender() );
	}

	/**
	 * @inheritDoc
	 */
	public function getBodyMessage() {
		if ( $this->event->getType() === 'user-unblocked' ) {
			return $this->msg( 'notification-body-user-unblocked' );
		}

		$scope = (bool)$this->event->getExtraParam( 'sitewide', true )
			? $this->msg( 'notification-body-user-blocked-scope-sitewide' )->text()
			: $this->msg( 'notification-body-user-blocked-scope-partial' )->text();

		if ( (bool)$this->event->getExtraParam( 'indefinite', false ) ) {
			return $this->msg( 'notification-body-user-blocked-indefinite' )
				->params( $this->getViewingUserForGender(), $scope );
		}

		$expiry = $this->event->getExtraParam( 'expiry' );
		if ( $expiry !== null && $expiry !== '' ) {
			return $this->msg( 'notification-body-user-blocked-expiring' )
				->params( $this->getViewingUserForGender(), $scope )
				->expiryParams( $expiry );
		}

		return $this->msg( 'notification-body-user-blocked' )
			->params( $this->getViewingUserForGender(), $scope );
	}

	/**
	 * @inheritDoc
	 */
	public function getPrimaryLink() {
		if ( $this->event->getType() === 'user-unblocked' ) {
			return $this->getBlockLogLink();
		}

		$targetUserName = $this->getTargetUserName();
		if ( !$targetUserName ) {
			return $this->getBlockLogLink();
		}

		return [
			'url' => SpecialPage::getTitleFor( 'BlockList', $targetUserName )->getFullURL(),
			'label' => $this->msg( 'notification-link-text-user-blocked-blocklist' )->text(),
			'description' => '',
			'icon' => false,
		];
	}

	/**
	 * @inheritDoc
	 */
	public function getSecondaryLinks() {
		$links = [];

		$agentLink = $this->getAgentLink();
		if ( $agentLink ) {
			$links[] = $agentLink;
		}

		$links[] = $this->getBlockLogLink();

		return $links;
	}

	private function getTargetUserName(): ?string {
		$targetUserName = $this->event->getExtraParam( 'target-user-name' );
		if ( is_string( $targetUserName ) && $targetUserName !== '' ) {
			return $targetUserName;
		}

		$title = $this->event->getTitle();
		return $title ? $title->getText() : null;
	}

	private function getBlockLogLink(): array {
		$query = [
			'type' => 'block',
		];

		$title = $this->event->getTitle();
		if ( $title ) {
			$query['page'] = $title->getPrefixedText();
		}

		return [
			'url' => SpecialPage::getTitleFor( 'Log' )->getFullURL( $query ),
			'label' => $this->msg( 'notification-link-text-user-blocked-log' )->text(),
			'description' => '',
			'icon' => false,
		];
	}
}
