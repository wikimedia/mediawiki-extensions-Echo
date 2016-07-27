<?php

/**
 * Presenter for 'mention-failure' notifications
 *
 * @author Christoph Fischer <christoph.fischer@wikimedia.de>
 *
 * @license GNU GPL v2+
 */
class EchoMentionFailurePresentationModel extends EchoEventPresentationModel {
	use EchoPresentationModelSectionTrait;

	public function getIconType() {
		return 'mention-failure';
	}

	public function getHeaderMessage() {
		if ( $this->isTooManyMentionsFailure() ) {
			$msg = $this->getMessageWithAgent( 'notification-header-mention-failure-too-many' );
			$msg->numParams( $this->getMaxMentions() );
			return $msg;
		}

		if ( $this->isBundled() ) {
			$msg = $this->getMessageWithAgent( 'notification-header-mention-failure-bundle' );
			$msg->numParams( $this->getBundleCount() );
			$msg->params( $this->getTruncatedTitleText( $this->event->getTitle() ) );
			return $msg;
		}

		// Messages that can be used here:
		// * notification-header-mention-failure-user-unknown
		// * notification-header-mention-failure-user-anonymous
		$msg = $this->getMessageWithAgent( 'notification-header-mention-failure-' . $this->getFailureType() );
		$msg->params( $this->getSubjectName() );

		return $msg;
	}

	public function getCompactHeaderMessage() {
		// Messages that can be used here:
		// * notification-compact-header-mention-failure-user-unknown
		// * notification-compact-header-mention-failure-user-anonymous
		$msg = $this->msg( 'notification-compact-header-mention-failure-' . $this->getFailureType() );
		$msg->params( $this->getSubjectName() );

		return $msg;
	}

	public function getPrimaryLink() {
		return array(
			// Need FullURL so the section is included
			'url' => $this->getTitleWithSection()->getFullURL(),
			'label' => $this->msg( 'notification-link-text-view-mention-failure' )
				->numParams( $this->getBundleCount() )
				->text()
		);
	}

	public function getSecondaryLinks() {
		if ( $this->isBundled() ) {
			$viewMentionsLink = array_merge(
				$this->getPrimaryLink(),
				array(
					'icon' => 'speechBubbles',
					'prioritized' => true
				)
			);

			return array( $viewMentionsLink );
		}

		$talkPageLink = $this->getPageLink(
			$this->getTitleWithSection(),
			'',
			true
		);

		return array( $talkPageLink );
	}

	private function getSubjectName() {
		return $this->event->getExtraParam( 'subject-name', '' );
	}

	private function getFailureType() {
		return $this->event->getExtraParam( 'failure-type', 'user-unknown' );
	}

	private function isTooManyMentionsFailure() {
		return $this->getType() === 'mention-failure-too-many';
	}

	private function getMaxMentions() {
		global $wgEchoMaxMentionsCount;
		return $this->event->getExtraParam( 'max-mentions', $wgEchoMaxMentionsCount );
	}
}
