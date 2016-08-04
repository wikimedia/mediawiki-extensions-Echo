<?php

class SpecialNotifications extends SpecialPage {

	/**
	 * Number of notification records to display per page/load
	 */
	const DISPLAY_NUM = 20;

	public function __construct() {
		parent::__construct( 'Notifications' );
	}

	public function execute( $par ) {

		$this->setHeaders();

		$out = $this->getOutput();
		$out->setPageTitle( $this->msg( 'echo-specialpage' )->text() );

		$this->addHelpLink( 'Help:Notifications/Special:Notifications' );

		$user = $this->getUser();
		if ( $user->isAnon() ) {
			// Redirect to login page and inform user of the need to login
			$this->requireLogin( 'echo-notification-loginrequired' );
			return;
		}

		$out->addSubtitle( $this->buildSubtitle() );

		$out->enableOOUI();

		$pager = new NotificationPager( $this->getContext() );
		$pager->setOffset( $this->getRequest()->getVal( 'offset' ) );
		$pager->setLimit( $this->getRequest()->getVal( 'limit', self::DISPLAY_NUM ) );
		$notifications = $pager->getNotifications();

		// If there are no notifications, display a message saying so
		if ( !$notifications ) {
			$out->addWikiMsg( 'echo-none' );
			$out->addModules( array( 'ext.echo.special' ) );
			return;
		}

		$notif = array();
		foreach ( $notifications as $notification ) {
			$output = EchoDataOutputFormatter::formatOutput( $notification, 'special', $user, $this->getLanguage() );
			if ( $output ) {
				$notif[] = $output;
			}
		}

		// Add the notifications to the page (interspersed with date headers)
		$dateHeader = '';
		$unread = array();
		$echoSeenTime = EchoSeenTime::newFromUser( $user );
		$seenTime = $echoSeenTime->getTime();
		$notifArray = array();
		foreach ( $notif as $row ) {
			$class = 'mw-echo-notification';
			if ( !isset( $row['read'] ) ) {
				$class .= ' mw-echo-notification-unread';
				if ( !$row['targetpages'] ) {
					$unread[] = $row['id'];
				}
			}

			if ( $seenTime !== null && $row['timestamp']['mw'] > $seenTime ) {
				$class .= ' mw-echo-notification-unseen';
			}

			if ( !$row['*'] ) {
				continue;
			}

			// Output the date header if it has not been displayed
			if ( $dateHeader !== $row['timestamp']['date'] ) {
				$dateHeader = $row['timestamp']['date'];
				$notifArray[ $dateHeader ] = array(
					'unread' => array(),
					'notices' => array()
				);
			}

			// Collect unread IDs
			if ( !isset( $row['read'] ) ) {
				$notifArray[ $dateHeader ][ 'unread' ][] = $row['id'];
			}

			$notifArray[ $dateHeader ][ 'notices' ][] = Html::rawElement(
				'li',
				array(
					'class' => $class,
					'data-notification-category' => $row['category'],
					'data-notification-event' => $row['id'],
					'data-notification-type' => $row['type']
				),
				$row['*']
			);
		}

		// Build the HTML
		$notices = '';
		$markReadSpecialPage = new SpecialNotificationsMarkRead();
		foreach ( $notifArray as $section => $data ) {
			$dateSectionText = Html::element( 'span', array( 'class' => 'mw-echo-date-section-text' ), $section );
			$sectionTitle = $dateSectionText;
			if ( count( $data[ 'unread' ] ) > 0 ) {
				$markReadSectionText = $this->msg( 'echo-specialpage-section-markread' )->text();

				$markAsReadLabelIcon = new EchoOOUI\LabelIconWidget( array(
					'label' => $markReadSectionText,
					'icon' => 'doubleCheck',
				) );

				// There are unread notices. Add the 'mark section as read' button
				$markSectionAsReadForm = $markReadSpecialPage->getMinimalForm(
					$data[ 'unread' ],
					$markReadSectionText,
					true,
					$markAsReadLabelIcon->toString()
				);

				$formHtml = $markSectionAsReadForm->prepareForm()->getHTML( /* First submission attempt */ false );
				$formWrapper = Html::rawElement(
					'div',
					array(
						'class' => 'mw-echo-markAsReadSectionButton',
					),
					$formHtml
				);
				$sectionTitle .= $formWrapper;
			}

			// Heading
			$notices .= Html::rawElement( 'li', array( 'class' => 'mw-echo-date-section' ), $sectionTitle );

			// Notices
			$notices .= join( "\n", $data[ 'notices' ] );
		}

		$navBar = $pager->getNavigationBar();

		$html = Html::rawElement( 'div', array( 'class' => 'mw-echo-special-navbar-top' ), $navBar );
		$html .= Html::rawElement( 'ul', array( 'class' => 'mw-echo-special-notifications' ), $notices );
		$html .= Html::rawElement( 'div', array( 'class' => 'mw-echo-special-navbar-bottom' ), $navBar );

		$html = Html::rawElement( 'div', array( 'class' => 'mw-echo-special-container' ), $html );
		$out->addHTML( Html::rawElement( 'div', array( 'class' => 'mw-echo-special-nojs' ), $html ) );

		$out->addModules( array( 'ext.echo.special' ) );

		$out->addJsConfigVars( 'wgNotificationsSpecialPageLinks', array(
			'help' => '//www.mediawiki.org/wiki/Special:MyLanguage/Help:Notifications/Special:Notifications',
			'preferences' => SpecialPage::getTitleFor( 'Preferences' )->getLinkURL() . '#mw-prefsection-echo',
		) );
		// For no-js support
		$out->addModuleStyles( array( 'ext.echo.styles.notifications', 'ext.echo.styles.special' ) );

		// Log visit
		MWEchoEventLogging::actuallyLogTheEvent(
			'EchoInteraction',
			array(
				'context' => 'archive',
				'action' => 'special-page-visit',
				'userId' => (int)$user->getId(),
				'editCount' => (int)$user->getEditCount(),
				'notifWiki' => wfWikiID(),
				// Hack: Figure out if we are in the mobile skin
				'mobile' => $out->getSkin()->getSkinName() === 'minerva',
			)
		);
	}

	/**
	 * Build the subtitle (more info and preference links)
	 * @return string HTML for the subtitle
	 */
	public function buildSubtitle() {
		$lang = $this->getLanguage();
		$subtitleLinks = array();
		// Preferences link
		$subtitleLinks[] = Html::element(
			'a',
			array(
				'href' => SpecialPage::getTitleFor( 'Preferences' )->getLinkURL() . '#mw-prefsection-echo',
				'id' => 'mw-echo-pref-link',
				'class' => 'mw-echo-special-header-link',
				'title' => $this->msg( 'preferences' )->text()
			),
			$this->msg( 'preferences' )->text()
		);
		// using pipeList to make it easier to add some links in the future
		return $lang->pipeList( $subtitleLinks );
	}

	protected function getGroupName() {
		return 'users';
	}
}
