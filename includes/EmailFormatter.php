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
		$this->emailMode->attachDecorator( new EchoTextEmailDecorator() );
	}

	/**
	 * {@inheritDoc}
	 */
	public function formatEmail() {
		$template = $this->emailMode->getTextTemplate();

		foreach ( $this->emailMode->getComponent() as $val ) {
			$func = 'build' . ucfirst( $val );
			$template = str_replace( "%%$val%%", $this->emailMode->$func(), $template );
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
		$this->emailMode->attachDecorator( new EchoHTMLEmailDecorator() );
	}

	/**
	 * {@inheritDoc}
	 */
	public function formatEmail() {
		$template = $this->emailMode->getHTMLTemplate();

		foreach ( $this->emailMode->getComponent() as $val ) {
			$func = 'build' . ucfirst( $val );
			$template = str_replace( "%%$val%%", $this->emailMode->$func(), $template );
		}

		return $template;
	}
}

/**
 * Abstract entity that represents an email delivery mode
 */
abstract class EchoEmailMode {

	/**
	 * @var array
	 * Email components
	 */
	protected $component;

	/**
	 * @var User
	 * The user who receives email notifications
	 */
	protected $user;

	/**
	 * @var EchoEmailDecorator
	 * Email decorator
	 */
	protected $decorator;

	/**
	 * @param $user User
	 * @param $component array
	 */
	public function __construct( User $user, array $component ) {
		$this->user = $user;
		// All email delivery mode share the same footer
		$this->component = array_merge( $component, array( 'footer' ) );
		// Initialize with a text decorator, the decorator can be altered
		// via attacheDecorator() based on text/html emails
		$this->decorator = new EchoTextEmailDecorator();
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
	 * @return string
	 */
	public function buildFooter() {
		global $wgEchoEmailFooterAddress;
		return $this->decorator->decorateFooter( $wgEchoEmailFooterAddress );
	}

	/**
	 * Getter method for email template component
	 * @return array
	 */
	public function getComponent() {
		return $this->component;
	}

	/**
	 * Get the notification icon path
	 * @param $icon string
	 * @return string
	 */
	public static function getNotifIcon( $icon ) {
		global $wgEchoNotificationIcons, $wgExtensionAssetsPath;

		$iconInfo = $wgEchoNotificationIcons[$icon];
		if ( isset( $iconInfo['url'] ) && $iconInfo['url'] ) {
			$iconUrl = $iconInfo['url'];
		} else {
			if ( !isset( $iconInfo['path'] ) || !$iconInfo['path'] ) {
				$iconInfo = $wgEchoNotificationIcons['placeholder'];
			}
			$iconUrl = "$wgExtensionAssetsPath/{$iconInfo['path']}";
		}

		// Use http for image path, there is no need for https
		return wfExpandUrl( $iconUrl, PROTO_HTTP );
	}

	/**
	 * Attach an email decorator to the email mode object
	 * @param $decorator EchoEmailDecorator
	 */
	public function attachDecorator( EchoEmailDecorator $decorator ) {
		$this->decorator = $decorator;
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
	 * @return string
	 */
	public function buildIntro() {
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

		return $this->decorator->decorateIntro( $message );
	}

	/**
	 * Build the summary component
	 * @return string
	 */
	public function buildSummary() {
		return $this->decorator->decorateRevisionSnippet(
			$this->notifFormatter->getRevisionSnippet(
				$this->event,
				$this->user
			)
		);
	}

	/**
	 * Build the action component
	 * @return string
	 */
	public function buildAction() {
		$link = array();
		$ranks = array( 'primary', 'secondary' );

		foreach ( $ranks as $rank ) {
			$message = $this->event->getLinkMessage( $rank );

			// Valid call to action should have link text
			if ( !$message ) {
				continue;
			}

			$link[] = $this->decorator->decorateSingleAction(
				$this->notifFormatter,
				$this->event,
				$this->user,
				$rank,
				$message
			);
		}

		// Add some spacing between the two action links
		$spacing = $this->decorator->getActionLinkSeparator();
		return implode( $spacing . $spacing, $link );
	}

	/**
	 * Build the email icon component
	 * @return string
	 */
	public function buildEmailIcon() {
		return EchoEmailMode::getNotifIcon( $this->notifFormatter->getValue( 'icon' ) );
	}

	/**
	 * {@inheritDoc}
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
	 * {@inheritDoc}
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
				<td bgcolor="#FFFFFF" width="469" align="left" style="font-family:arial; font-size:13px; line-height:20px; color:#6D6E70;">%%intro%%</td>
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
				<td bgcolor="#F8F8F8" width="469" align="left" style="font-family:arial; font-size:10px; line-height:13px; color:#6D6E70; padding:10px 20px;"><br />
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
 */
class EchoEmailDigest extends EchoEmailMode {

	/**
	 * @var string
	 * The mode of email digest, 'weekly' or 'daily'
	 */
	protected $digestMode;

	/**
	 * @var array
	 * Raw email digest list
	 */
	protected $rawDigestList;

	/**
	 * @param $user User
	 * @param $rawDigestList array the raw notification event list
	 * @param $digestMode string 'daily'/'weekly'
	 */
	public function __construct( User $user, array $rawDigestList, $digestMode = 'daily' ) {
		parent::__construct( $user, array( 'intro', 'digestList', 'action' ) );
		// Some data validation
		if ( !in_array( $digestMode, array( 'daily', 'weekly' ) ) ) {
			$digestMode = 'daily';
		}
		$this->digestMode = $digestMode;
		$this->rawDigestList = $rawDigestList;
	}

	/**
	 * Build the intro component
	 * @return string
	 */
	public function buildIntro() {
		$message = wfMessage(
			'echo-email-batch-body-intro-' . $this->digestMode,
			$this->user->getName()
		);

		return $this->decorator->decorateIntro( $message );
	}

	/**
	 * Build the digestList component
	 * @return string
	 */
	public function buildDigestList() {
		if ( !$this->rawDigestList ) {
			return '';
		}

		return $this->decorator->decorateDigestList( $this->rawDigestList );
	}

	/**
	 * Build the action component
	 * @return string
	 */
	public function buildAction() {
		$title = SpecialPage::getTitleFor( 'Notifications' );

		return $this->decorator->decorateDigestAction( $title );
	}

	/**
	 * {@inheritDoc}
	 */
	public function getTextTemplate() {
		return <<< EOF
%%intro%%

%%digestList%%

%%action%%

%%footer%%

EOF;
	}

	/**
	 * {@inheritDoc}
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
				<td bgcolor="#FFFFFF" width="31">&nbsp;</td>
				<td bgcolor="#FFFFFF" width="469" style="line-height:40px;">&nbsp;</td>
				<td bgcolor="#FFFFFF" width="65">&nbsp;</td>
			</tr>
			<tr>
				<td bgcolor="#FFFFFF" width="35" rowspan="2">&nbsp;</td>
				<td bgcolor="#FFFFFF" width="31" rowspan="2">&nbsp;</td>
				<td bgcolor="#FFFFFF" width="469" align="center" style="font-family:arial; font-size:13px; line-height:20px; color:#6D6E70; text-align: center;">%%intro%%</td>
				<td bgcolor="#FFFFFF" width="65" rowspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td bgcolor="#FFFFFF" width="469" align="left" style="font-family: arial; font-size:16px; line-height: 20px; font-weight: 600;">
					<table cellspacing="0" cellpadding="0" border="0" width="100%">
						<tr>
							<td bgcolor="#FFFFFF" align="left" style="font-family: arial; font-size:13px; color: #58585B; padding-top: 25px;">
								%%digestList%%
							</td>
						</tr>
					</table>
					<br /><br />
				</td>
			</tr>
			<tr>
				<td bgcolor="#FFFFFF" width="35">&nbsp;</td>
				<td bgcolor="#FFFFFF" width="31">&nbsp;</td>
				<td bgcolor="#FFFFFF" width="469" style="line-height:60px;" align="center">%%action%%</td>
				<td bgcolor="#FFFFFF" width="65">&nbsp;</td>
			</tr>
			<tr>
				<td bgcolor="#FFFFFF" width="35">&nbsp;</td>
				<td bgcolor="#FFFFFF" width="31">&nbsp;</td>
				<td bgcolor="#FFFFFF" width="469" style="line-height:40px;">&nbsp;</td>
				<td bgcolor="#FFFFFF" width="65">&nbsp;</td>
			</tr>
			<tr>
				<td bgcolor="#F8F8F8" width="35">&nbsp;</td>
				<td bgcolor="#F8F8F8" width="31">&nbsp;</td>
				<td bgcolor="#F8F8F8" width="469" align="left" style="font-family:arial; font-size:10px; line-height:13px; color:#6D6E70; padding: 10px 20px;"><br />
					%%footer%%
					<br /><br />
				</td>
				<td bgcolor="#F8F8F8" width="65">&nbsp;</td>
			</tr>
			<tr>
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
 * Email decorator interface
 */
interface EchoEmailDecorator {
	/**
	 * Decorate the intro for all modes
	 * @param $message Message the intro message object
	 * @return string
	 */
	public function decorateIntro( $message );

	/**
	 * Decorate the digest list for digest mode
	 * @param $digestList array
	 * @return string
	 */
	public function decorateDigestList( $digestList );

	/**
	 * Decorate the primary action for digest mode
	 * @param $title Title
	 * @return string
	 */
	public function decorateDigestAction( $title );

	/**
	 * Decorate the footer for all mode
	 * @param $address string
	 * @return string
	 */
	public function decorateFooter( $address );

	/**
	 * Decorate the actions for single mode
	 * @param $notifFormatter EchoBasicFormatter
	 * @param $event EchoEvent
	 * @param $user User
	 * @param $rank string
	 * @param $message string
	 * @return string
	 */
	public function decorateSingleAction( $notifFormatter, $event, $user, $rank, $message );

	/**
	 * Decorate a revision snippet
	 * @param $snippet the raw revision snippet
	 * @return string
	 */
	public function decorateRevisionSnippet( $snippet );

	/**
	 * Get the spacing for between action links
	 * @return string
	 */
	public function getActionLinkSeparator();
}

/**
 * Text email decorator
 */
class EchoTextEmailDecorator implements EchoEmailDecorator {

	/**
	 * {@inheritDoc}
	 */
	public function decorateIntro( $message ) {
		return $message->text();
	}

	/**
	 * {@inheritDoc}
	 */
	public function decorateDigestList( $digestList ) {
		$result = array();

		// build the text section for each category
		foreach( $digestList as $category => $notifs ) {
			$output = wfMessage( 'echo-category-title-' . $category )->numParams( count( $notifs ) )->text()
				. wfMessage( 'colon-separator' )->text() . "\n";

			foreach( $notifs as $notif ) {
				$output .= "\n " . wfMessage( 'echo-email-batch-bullet' )->text() . ' ' . $notif['batch-body'];
			}
			$result[] = $output;
		}

		// for prepending and appending 'echo-email-batch-separator'
		$result = array_merge( array( '' ), $result, array( '' ) );

		return trim(
			implode(
				"\n\n" . wfMessage( 'echo-email-batch-separator' )->text() . "\n\n",
				$result
			)
		);
	}

	/**
	 * {@inheritDoc}
	 */
	public function decorateDigestAction( $title ) {
		return wfMessage( 'echo-email-batch-link-text-view-all-notifications' )->text()
			. wfMessage( 'colon-separator' )->text()
			. '<'
			. $title->getFullURL( '', false, PROTO_HTTPS )
			. '>';
	}

	/**
	 * {@inheritDoc}
	 */
	public function decorateFooter( $address ) {
		return wfMessage( 'echo-email-footer-default' )
				->params(
					$address,
					wfMessage( 'echo-email-batch-separator' )->text()
				)
				->text();
	}

	/**
	 * {@inheritDoc}
	 */
	public function decorateSingleAction( $notifFormatter, $event, $user, $rank, $message ) {
		$url = $notifFormatter->getLink( $event, $user, $rank, false, true );

		return wfMessage( $message )->text()
			. wfMessage( 'colon-separator' )->text()
			. '<'
			. $notifFormatter->sanitizeEmailLink( $url )
			. '>';
	}

	/**
	 * {@inheritDoc}
	 */
	public function decorateRevisionSnippet( $snippet ) {
		// Doing nothing now, but there is a potential to wrap the text
		// around snippet with quote in plain text email
		return $snippet;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getActionLinkSeparator() {
		return "\n";
	}
}

/**
 * HTML email decorator
 */
class EchoHTMLEmailDecorator implements EchoEmailDecorator {

	/**
	 * {@inheritDoc}
	 */
	public function decorateIntro( $message ) {
		return nl2br( $message->parse() );
	}

	/**
	 * {@inheritDoc}
	 */
	public function decorateDigestList( $digestList ) {
		$result = array();
		// build the html section for each category
		foreach( $digestList as $category => $notifs ) {
			$output = $this->applyStyleToCategory(
				wfMessage( 'echo-category-title-' . $category )
					->numParams( count( $notifs ) )
					->escaped()
			);
			foreach( $notifs as $notif ) {
				$output .= "\n" . $this->applyStyleToEvent( $notif );
			}
			$result[] = '<table border="0" width="100%">' . $output . '</table>';
		}

		return trim( implode( "\n", $result ) );
	}

	/**
	 * {@inheritDoc}
	 */
	public function decorateDigestAction( $title ) {
		return Linker::link(
			$title,
			wfMessage( 'echo-email-batch-link-text-view-all-notifications' )->escaped(),
			array( 'style' => $this->getPrimaryLinkCSS() ),
			array(),
			array( 'https' )
		);
	}

	/**
	 * {@inheritDoc}
	 */
	public function decorateFooter( $address ) {
		$title = SpecialPage::getTitleFor( 'Preferences' );
		$title->setFragment( "#mw-prefsection-echo" );
		return wfMessage( 'echo-email-footer-default-html' )
				->params( $address )
				->rawParams( $title->getFullURL( '', false, PROTO_HTTPS ) )
				->text();
	}

	/**
	 * {@inheritDoc}
	 */
	public function decorateSingleAction( $notifFormatter, $event, $user, $rank, $message ) {
		if ( $rank === 'primary' ) {
			$style = $this->getPrimaryLinkCSS();
		} else {
			$style = $this->getSecondaryLinkCSS();
		}

		return $notifFormatter->getLink( $event, $user, $rank, false, false, $style );
	}

	/**
	 * {@inheritDoc}
	 */
	public function decorateRevisionSnippet( $snippet ) {
		return htmlspecialchars( $snippet );
	}

	/**
	 * {@inheritDoc}
	 */
	public function getActionLinkSeparator() {
		return "&nbsp;";
	}

	/**
	 * The style for primary link
	 * @return string
	 */
	protected function getPrimaryLinkCSS() {
		return 'cursor:pointer; text-align:center; text-decoration:none; padding:.45em 1.2em .45em;
			color:#D9EEF7; background:#3366BB; font-family: arial;font-size: 13px;';
	}

	/**
	 * The style for secondary link
	 * @return string
	 */
	protected function getSecondaryLinkCSS() {
		return 'text-decoration: none;font-size: 10px;font-family: arial; color: #808184';
	}

	/**
	 * Apply style to notification category header
	 * @param $category string
	 * @return string
	 */
	protected function applyStyleToCategory( $category ) {
		return <<< EOF
<tr>
	<td colspan="2" style="color: #A87B4F; font-weight: normal; font-size: 13px; padding-top: 15px;">
		$category <br />
		<hr style="background-color:#FFFFFF; color:#FFFFFF; border: 1px solid #F2F2F2;" />
	</td>
</tr>
EOF;
	}

	/**
	 * Apply style to individual notification event
	 * @param $notif array an array containts keys: icon, batch-body, batch-body-html
	 * @return string
	 */
	protected function applyStyletoEvent( $notif ) {
		// notification icon
		$icon = EchoEmailMode::getNotifIcon( $notif['icon'] );
		// notification text
		$text = $notif['batch-body-html'];

		return <<< EOF
<tr>
	<td width="30">
		<img src="$icon" width="70%" height="70%" style="vertical-align:middle;">
	</td>
	<td style="font-family: arial; font-size:13px; color: #58585B;">
		$text
	</td>
</tr>
EOF;
	}

}

