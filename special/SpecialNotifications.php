<?php

class SpecialNotifications extends SpecialPage {

	/**
	 * Number of notification records to display per page/load
	 */
	private static $displayNum = 20;

	public function __construct() {
		parent::__construct( 'Notifications' );
	}

	public function execute( $par ) {
		global $wgEchoFeedbackPage;

		$this->setHeaders();

		$out = $this->getOutput();
		$out->setPageTitle( $this->msg( 'echo-specialpage' )->text() );

		$user = $this->getUser();
		if ( $user->isAnon() ) {
			$out->addWikiMsg( 'echo-anon' );
			return;
		}

		// The continue parameter to pull current set of data from, this
		// would be used for browsers with javascript disabled
		$continue = $this->getRequest()->getVal( 'continue', null );

		// Preferences link
		$html = Html::rawElement( 'a', array(
			'href' => SpecialPage::getTitleFor( 'Preferences' )->getLinkURL() . '#mw-prefsection-echo',
			'id' => 'mw-echo-pref-link',
			'class' => 'mw-echo-special-header-link',
			'title' => wfMessage( 'preferences' )->text()
		) );

		// Pull the notifications
		$notif = ApiEchoNotifications::getNotifications( $user, 'html', self::$displayNum + 1, $continue );

		// If there are no notifications, display a message saying so
		if ( !$notif ) {
			$out->addHTML( $html );
			$out->addWikiMsg( 'echo-none' );
			return;
		}

		// Check if there is more data to load for next request
		if ( count( $notif ) > self::$displayNum ) {
			$lastItem = array_pop( $notif );
			$nextContinue = $lastItem['timestamp']['unix'] . '|' . $lastItem['id'];
		} else {
			$nextContinue = null;
		}

		// Add the notifications to the page (interspersed with date headers)
		$dateHeader = '';
		$notices = '';
		$unread = array();
		foreach ( $notif as $row ) {
			// Output the date header if it has not been displayed
			if ( $dateHeader !== $row['timestamp']['date'] ) {
				$dateHeader = $row['timestamp']['date'];
				$notices .= Html::rawElement( 'li', array( 'class' => 'mw-echo-date-section' ), $dateHeader );
			}

			$class = 'mw-echo-notification';
			if ( !isset( $row['read'] ) ) {
				$class .= ' mw-echo-unread';
				$unread[] = $row['id'];
			}
			$notices .= Html::rawElement( 'li', array( 'class' => $class, 'data-notification-category' => $row['category'] ), $row['*'] );
		}
		$html .= Html::rawElement( 'ul', array( 'id' => 'mw-echo-special-container' ), $notices );

		// Build the more link
		if ( $nextContinue ) {
			$html .= Html::element(
				'a',
				array(
					'href' => SpecialPage::getTitleFor( 'Notifications' )->getLinkURL(
								array( 'continue' => $nextContinue )
							),
					'id' => 'mw-echo-more'
				),
				wfMessage( 'moredotdotdot' )->text()
			);
		}

		$out->addHTML( $html );
		$out->addModules( 'ext.echo.special' );
		$out->addJsConfigVars(
			array(
				'wgEchoDisplayNum' => self::$displayNum,
				'wgEchoNextContinue' => $nextContinue,
				'wgEchoFeedbackPage' => $wgEchoFeedbackPage,
				'wgEchoDateHeader' => $dateHeader
			)
		);
		// For no-js support
		global $wgExtensionAssetsPath;
		$out->addExtensionStyle( "$wgExtensionAssetsPath/Echo/modules/base/ext.echo.base.css" );
		// Mark items as read
		if ( $unread ) {
			MWEchoNotifUser::newFromUser( $user )->markRead( $unread );
		}
	}

}
