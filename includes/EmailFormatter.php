<?php

/**
 * Abstract class for formatting email notifications
 */
abstract class EchoEmailFormatter {

	/**
	 * @var EchoEmailMode
	 */
	protected $emailMode;

	/**
	 * @param $emailMode EchoEmailMode
	 */
	public function __construct( EchoEmailMode $emailMode ) {
		$this->emailMode = $emailMode;
	}

	/**
	 * Abstract method for formatting email
	 * @return string
	 */
	abstract public function formatEmail();
}

/**
 * Formatter class for formatting text email notification
 */
class EchoTextEmailFormatter extends EchoEmailFormatter {

	/**
	 * @param $emailMode EchoEmailMode
	 */
	public function __construct( EchoEmailMode $emailMode ) {
		parent::__construct( $emailMode );
	}

	/**
	 * Formatting text email notification
	 * @return string
	 */
	public function formatEmail() {
		$template = $this->emailMode->getTextTemplate();

		foreach ( $this->emailMode->getComponent() as $val ) {
			$func = 'build' . ucfirst( $val );
			$template = str_replace( "%%$val%%", $this->emailMode->$func( 'text' ), $template );
		}

		// Remove redundant newline characters
		return $this->removeExtraNewLine( $template );
	}

	/**
	 * Remove extra newline from a text content
	 * @param $text string
	 * @return string
	 */
	protected function removeExtraNewLine( $text ) {
		return preg_replace( "/\n{3,}/", "\n\n", $text );
	}

}

/**
 * Formatter class for formatting HTML email notification
 */
class EchoHTMLEmailFormatter extends EchoEmailFormatter {

	/**
	 * @param $emailMode EchoEmailMode
	 */
	public function __construct( EchoEmailMode $emailMode ) {
		parent::__construct( $emailMode );
	}

	/**
	 * Formatting HTML email notification
	 * @return string
	 */
	public function formatEmail() {
		$template = $this->emailMode->getHTMLTemplate();

		foreach ( $this->emailMode->getComponent() as $val ) {
			$func = 'build' . ucfirst( $val );
			$template = str_replace( "%%$val%%", $this->emailMode->$func( 'html' ), $template );
		}

		return $template;
	}
}

/**
 * Abstract entity that represents an email delivery mode
 */
abstract class EchoEmailMode {

	/**
	 * Email components
	 * @var array
	 */
	protected $component;

	/**
	 * @var User
	 */
	protected $user;

	/**
	 * @param $user User
	 * @param $component array
	 */
	public function __construct( User $user, array $component ) {
		$this->user = $user;
		// All email delivery mode share the same footer
		$this->component = array_merge( $component, array( 'footer' ) );
	}

	/**
	 * Get text email template
	 * @return string
	 */
	abstract public function getTextTemplate();

	/**
	 * Get html email template
	 * @return string
	 */
	abstract public function getHTMLTemplate();

	/**
	 * Get the footer component
	 * @param $format string 'text'/'html'
	 * @return string
	 */
	public function buildFooter( $format ) {
		global $wgEchoEmailFooterAddress;

		if ( $format === 'text' ) {
			return wfMessage( 'echo-email-footer-default' )
					->params(
						$wgEchoEmailFooterAddress,
						wfMessage( 'echo-email-batch-separator' )->text()
					)
					->text();
		} else {
			$title = SpecialPage::getTitleFor( 'Preferences' );
			$title->setFragment( "#mw-prefsection-echo" );
			return wfMessage( 'echo-email-footer-default-html' )
					->params( $wgEchoEmailFooterAddress )
					->rawParams( $title->getFullURL( '', false, PROTO_HTTPS ) )
					->text();
		}
	}

	/**
	 * Getter method for email template component
	 * @return array
	 */
	public function getComponent() {
		return $this->component;
	}

	/**
	 * The style for primary link
	 * @return string
	 */
	protected function getPrimaryLinkCSS() {
		return 'cursor:pointer; text-align:center;
			text-decoration:none; padding:.45em 1.2em .45em;
			color:#D9EEF7; background:#3366BB;
			font-family: arial;font-size: 13px;';
	}

	/**
	 * The style for secondary link
	 * @return string
	 */
	protected function getSecondaryLinkCSS() {
		return 'text-decoration: none;font-size: 10px;font-family: arial;
			color: #808184';
	}
}

/**
 * Entity that represents a single email delivery mode
 */
class EchoEmailSingle extends EchoEmailMode {

	/**
	 * @var EchoBasicFormatter
	 */
	protected $notifFormatter;

	/**
	 * @var EchoEvent
	 */
	protected $event;

	/**
	 * @param $notifFormatter EchoBasicFormatter
	 * @param $event EchoEvent
	 * @param $user User
	 */
	public function __construct( EchoBasicFormatter $notifFormatter, EchoEvent $event, User $user ) {
		parent::__construct( $user, array ( 'emailIcon', 'intro', 'summary', 'action' ) );
		$this->notifFormatter = $notifFormatter;
		$this->event = $event;
	}

	/**
	 * Build the intro component
	 * @param $format string 'text'/'html'
	 * @return string
	 */
	public function buildIntro( $format ) {
		$bundle = $this->notifFormatter->getValue( 'bundleData' );
		$email  = $this->notifFormatter->getValue( 'email' );

		if ( $bundle['use-bundle'] && $email['batch-bundle-body']['message'] ) {
			$detail = $email['batch-bundle-body'];
		} else {
			$detail = $email['batch-body'];
		}

		$message = $this->notifFormatter->formatFragment(
			$detail,
			$this->event,
			$this->user
		);

		if ( $format === 'text' ) {
			return $message->text();
		} else {
			return $message->parse();
		}
	}

	/**
	 * Build the summary component
	 * @param $format string 'text'/'html'
	 * @return string
	 */
	public function buildSummary( $format ) {
		return $this->notifFormatter->formatRevisionComment(
			$this->event,
			$this->user
		);
	}

	/**
	 * Build the action component
	 * @param $format string 'text'/'html'
	 * @return string
	 */
	public function buildAction( $format ) {
		$link = array();
		$ranks = array( 'primary', 'secondary' );

		foreach ( $ranks as $rank ) {
			$message = $this->event->getLinkMessage( $rank );

			// Valid call to action should have link text
			if ( !$message ) {
				continue;
			}

			// Plain text email
			if ( $format === 'text' ) {
				$url = $this->notifFormatter->getLink( $this->event, $this->user, $rank, false, true );

				$link[] = wfMessage( $message )->text()
					. wfMessage( 'colon-separator' )->text()
					. '<'
					. $this->notifFormatter->sanitizeEmailLink( $url )
					. '>';
			// HTML email
			} else {
				if ( $rank === 'primary' ) {
					$style = $this->getPrimaryLinkCSS();
				} else {
					$style = $this->getSecondaryLinkCSS();
				}

				$link[] = $this->notifFormatter->getLink( $this->event, $this->user, $rank, false, false, $style );
			}
		}

		// Add some spacing between the two action links
		$spacing = ( $format === 'text' ) ? "\n\n" : "&nbsp;&nbsp;";
		return implode( $spacing, $link );
	}

	/**
	 * Build the email icon component
	 * @param $format string 'text'/'html'
	 * @return string
	 */
	public function buildEmailIcon( $format ) {
		global  $wgEchoNotificationIcons, $wgExtensionAssetsPath;

		$iconInfo = $wgEchoNotificationIcons[$this->notifFormatter->getValue( 'icon' )];
		if ( isset( $iconInfo['url'] ) && $iconInfo['url'] ) {
			$iconUrl = $iconInfo['url'];
		} else {
			if ( !isset( $iconInfo['path'] ) || !$iconInfo['path'] ) {
				$iconInfo = $wgEchoNotificationIcons['placeholder'];
			}
			$iconUrl = "$wgExtensionAssetsPath/{$iconInfo['path']}";
		}

		return wfExpandUrl( $iconUrl );
	}

	/**
	 * Get template for text email
	 * @return string
	 */
	public function getTextTemplate() {
		return <<< EOF
%%intro%%

%%summary%%

%%action%%

%%footer%%
EOF;
	}

	/**
	 * Get template for html email
	 * @return string
	 */
	public function getHTMLTemplate() {
		return <<< EOF
<html><head></head><body>
<table cellspacing="0" cellpadding="0" border="0" width="100%" align="center">
<tr>
	<td bgcolor="#E6E7E8"><center>
		<br /><br />
		<table cellspacing="0" cellpadding="0" border="0" width="600">
			<tr>
				<td bgcolor="#FFFFFF" width="35">&nbsp;</td>
				<td bgcolor="#FFFFFF" width="61">&nbsp;</td>
				<td bgcolor="#FFFFFF" width="469" style="line-height:40px;">&nbsp;</td>
				<td bgcolor="#FFFFFF" width="35">&nbsp;</td>
			</tr><tr>
				<td bgcolor="#FFFFFF" width="35" rowspan="2">&nbsp;</td>
				<td bgcolor="#FFFFFF" width="61" align="center" valign="top" rowspan="2"><img src="%%emailIcon%%" alt="" height="30" width="30"></td>
				<td bgcolor="#FFFFFF" width="469" align="left" style="font-family:arial; font-size:13px; line-height:20px; color:#A6A8AB;">%%intro%%</td>
				<td bgcolor="#FFFFFF" width="35" rowspan="2">&nbsp;</td>
			</tr><tr>
				<td bgcolor="#FFFFFF" width="469" align="left" style="font-family: arial; font-size:16px; line-height: 20px; font-weight: 600;">
					<table cellspacing="0" cellpadding="0" border="0">
						<tr>
							<td bgcolor="#FFFFFF" align="left" style="font-family: arial; padding-top: 8px; font-size:13px; font-weight: bold; color: #58585B;">
								%%summary%%
							</td>
						</tr>
					</table>
					<table cellspacing="0" cellpadding="0" border="0">
						<tr>
							<td bgcolor="#FFFFFF" align="left" style="font-family: arial; font-size:14px; padding-top: 25px;">
								%%action%%
							</td>
						</tr>
					</table>
				</td>
			</tr><tr>
				<td bgcolor="#FFFFFF" width="35">&nbsp;</td>
				<td bgcolor="#FFFFFF" width="61">&nbsp;</td>
				<td bgcolor="#FFFFFF" width="469" style="line-height:40px;">&nbsp;</td>
				<td bgcolor="#FFFFFF" width="35">&nbsp;</td>
			</tr><tr>
				<td bgcolor="#F8F8F8" width="35">&nbsp;</td>
				<td bgcolor="#F8F8F8" width="61">&nbsp;</td>
				<td bgcolor="#F8F8F8" width="469" align="left" style="font-family:arial; font-size:10px; line-height:13px; color:#B7B7B7; padding:10px 20px;"><br />
					%%footer%%
					<br /><br />
				</td>
				<td bgcolor="#F8F8F8" width="35">&nbsp;</td>
			</tr><tr>
				<td colspan="4">&nbsp;</td>
			</tr>
		</table>
		<br><br></center>
	</td>
</tr>
</table>
</body></html>
EOF;
	}

}

/**
 * Class that represents email digest delivery mode
 * @Todo - To be completed for email digest
 */
class EchoEmailDigest extends EchoEmailMode {

	public function __construct( $user ) {
		parent::__construct( $user, array( 'header', 'intro', 'digestList' ) );
	}

	public function buildHeader() {}
	public function buildIntro() {}
	public function buildDigestList() {}

	public function getTextTemplate() {}
	public function getHTMLTemplate() {}

}
