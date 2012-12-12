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
		$this->setHeaders();

		$out = $this->getOutput();
		$out->setPageTitle( $this->msg( 'echo-specialpage' )->text() );

		$user = $this->getUser();
		if ( $user->isAnon() ) {
			$out->addWikiMsg( 'echo-anon' );
			return;
		}

		EchoNotificationController::resetNotificationCount( $user );

		// The timestamp and offset to pull current set of data from, this
		// would be used for browsers with javascript disabled
		$timestamp = $offset = 0;
		$paging = $this->getRequest()->getVal( 'paging', false );
		if ( $paging ) {
			$paging = explode( '|', $paging, 2 );
			$timestamp = intval( $paging[0] );
			$offset = intval( $paging[1] );
		}

		// Preferences link
		$preferenceLink = Html::element(
			'a',
			array(
				'href' => SpecialPage::getTitleFor( 'Preferences' )->getLinkURL() . '#mw-prefsection-echo'
			),
			wfMessage( 'preferences' )->text()
		);

		$html = Html::rawElement( 'div', array( 'class' => 'mw-echo-preference' ), $preferenceLink );

		$notif = ApiEchoNotifications::getNotifications( $user, false, 'html', self::$displayNum + 1, $timestamp, $offset );

		if ( !$notif ) {
			$out->addHTML( $html );
			$out->addWikiMsg( 'echo-none' );
			return;
		}

		// The timestamp and offset to pull next set of data from
		$nextTimestamp = $nextOffset = 0;

		// Check if there is more data to load for next request
		if ( count( $notif ) > self::$displayNum ) {
			array_pop( $notif );
			$more = true;
		} else {
			$more = false;
		}

		// The date header title for each section
		$dateHeader = '';
		foreach ( $notif as $row ) {
			// Output the date header if it has not been displayed
			if ( $dateHeader !== $row['timestamp']['date'] ) {
				$dateHeader = $row['timestamp']['date'];
				$html.= Html::element( 'li', array( 'class' => 'mw-echo-date-section' ), $dateHeader );
			}

			$class = 'mw-echo-notification';
			if ( !isset( $row['read'] ) ) {
				$class .= ' mw-echo-unread';
			}
			$nextTimestamp = $row['timestamp']['unix'];
			$nextOffset = $row['id'];
			$html .= Html::rawElement( 'li', array( 'class' => $class, 'data-notification-type' => $row['type'] ), $row['*'] );
		}

		$html = Html::rawElement( 'ul', array( 'id' => 'mw-echo-special-container' ), $html );

		// Build the more link
		if ( $more ) {
			// This is for no-javascript fallback
			$url = Html::element(
				'a',
				array(
					'href' => SpecialPage::getTitleFor( 'Notifications' )->getLinkURL(
								array( 'paging' => intval( $nextTimestamp ) . '|' . intval( $nextOffset ) )
							)
				),
				wfMessage( 'moredotdotdot' )->text()
			);

			$html .= Html::rawElement( 'div', array( 'id' => 'mw-echo-more' ), $url );
		}

		$out->addHTML( $html );
		$out->addModules( 'ext.echo.special' );
		$out->addJsConfigVars(
			array(
				'wgEchoDisplayNum' => self::$displayNum,
				'wgEchoStartTimestamp' => $nextTimestamp,
				'wgEchoStartOffset' => $nextOffset,
				'wgEchoDateHeader' => $dateHeader
			)
		);
		// For no-js support
		global $wgExtensionAssetsPath;
		$out->addExtensionStyle( "$wgExtensionAssetsPath/Echo/modules/base/ext.echo.base.css" );
		$out->addExtensionStyle( "$wgExtensionAssetsPath/Echo/modules/icons/icons.css" );
	}

}
