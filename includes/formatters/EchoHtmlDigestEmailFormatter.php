<?php

class EchoHtmlDigestEmailFormatter extends EchoEventDigestFormatter {

	/**
	 * @var string 'daily' or 'weekly'
	 */
	protected $digestMode;

	public function __construct( User $user, Language $language, $digestMode ) {
		parent::__construct( $user, $language );
		$this->digestMode = $digestMode;
	}

	/**
	 * @param EchoEventPresentationModel[] $models
	 * @return array of the following format:
	 *               [ 'body'    => formatted email body,
	 *                 'subject' => formatted email subject ]
	 */
	protected function formatModels( array $models ) {
		// echo-email-batch-body-intro-daily
		// echo-email-batch-body-intro-weekly
		$intro = $this->msg( 'echo-email-batch-body-intro-' . $this->digestMode )
			->params( $this->user->getName() )
			->parse();
		$intro = nl2br( $intro );

		$eventsByCategory = $this->groupByCategory( $models );
		ksort( $eventsByCategory );
		$digestList = $this->renderDigestList( $eventsByCategory );

		$htmlFormatter = new EchoHtmlEmailFormatter( $this->user, $this->language );

		$body = $this->renderBody(
			$this->language,
			$intro,
			$digestList,
			$this->renderAction(),
			$htmlFormatter->getFooter()
		);

		// echo-email-batch-subject-daily
		// echo-email-batch-subject-weekly
		$subject = $this->msg( 'echo-email-batch-subject-' . $this->digestMode )
			->numParams( count( $models ), count( $models ) )
			->text();

		return array(
			'subject' => $subject,
			'body' => $body,
		);
	}

	private function renderBody( Language $language, $intro, $digestList, $action, $footer ) {
		$alignStart = $language->alignStart();
		$langCode = $language->getCode();
		$langDir = $language->getDir();

		return <<< EOF
<html><head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<style>
		@media only screen and (max-width: 480px){
			table[id="email-container"]{max-width:600px !important; width:100% !important;}
		}
	</style>
</head><body>
<table cellspacing="0" cellpadding="0" border="0" width="100%" align="center" lang="$langCode" dir="$langDir">
<tr>
	<td bgcolor="#E6E7E8"><center>
		<br /><br />
		<table cellspacing="0" cellpadding="0" border="0" width="600" id="email-container">
			<tr>
				<td bgcolor="#FFFFFF" width="5%">&nbsp;</td>
				<td bgcolor="#FFFFFF" width="6%">&nbsp;</td>
				<td bgcolor="#FFFFFF" width="79%" style="line-height:40px;">&nbsp;</td>
				<td bgcolor="#FFFFFF" width="10%">&nbsp;</td>
			</tr>
			<tr>
				<td bgcolor="#FFFFFF" rowspan="2">&nbsp;</td>
				<td bgcolor="#FFFFFF" rowspan="2">&nbsp;</td>
				<td bgcolor="#FFFFFF" align="center" style="font-family: Arial, Helvetica, sans-serif; font-size:13px; line-height:20px; color:#6D6E70; text-align: center;">$intro</td>
				<td bgcolor="#FFFFFF" rowspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td bgcolor="#FFFFFF" align="$alignStart" style="font-family: Arial, Helvetica, sans-serif; line-height: 20px; font-weight: 600;">
					<table cellspacing="0" cellpadding="0" border="0" width="100%">
						<tr>
							<td bgcolor="#FFFFFF" align="$alignStart" style="font-family: Arial, Helvetica, sans-serif; font-size:13px; color: #58585B; padding-top: 25px;">
								$digestList
							</td>
						</tr>
					</table>
					<br /><br />
				</td>
			</tr>
			<tr>
				<td bgcolor="#FFFFFF">&nbsp;</td>
				<td bgcolor="#FFFFFF">&nbsp;</td>
				<td bgcolor="#FFFFFF" style="line-height:60px;" align="center">$action</td>
				<td bgcolor="#FFFFFF">&nbsp;</td>
			</tr>
			<tr>
				<td bgcolor="#FFFFFF">&nbsp;</td>
				<td bgcolor="#FFFFFF">&nbsp;</td>
				<td bgcolor="#FFFFFF" style="line-height:40px;">&nbsp;</td>
				<td bgcolor="#FFFFFF">&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td align="$alignStart" style="font-family: Arial, Helvetica, sans-serif; font-size:10px; line-height:13px; color:#6D6E70; padding: 10px 20px;"><br />
					$footer
					<br /><br />
				</td>
				<td>&nbsp;</td>
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

	/**
	 * @param string $type Notification type
	 * @param int $count Number of notifications in this type's section
	 * @return string Formatted category section title
	 */
	private function getCategoryTitle( $type, $count ) {
		return $this->msg( "echo-category-title-$type" )
			->numParams( $count )
			->parse();
	}

	/**
	 * @param EchoEventPresentationModel[] $models
	 * @return array [ 'category name' => EchoEventPresentationModel[] ]
	 */
	private function groupByCategory( $models ) {
		$eventsByCategory = array();
		foreach ( $models as $model ) {
			$eventsByCategory[$model->getCategory()][] = $model;
		}
		return $eventsByCategory;
	}

	/**
	 * Apply style to notification category header
	 * @param string $category. Can contain HTML. Is included as-is in HTML template, is not escaped.
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
	 * @param EchoEventPresentationModel $model
	 * @return string
	 */
	protected function applyStyleToEvent( EchoEventPresentationModel $model ) {
		$iconUrl = wfExpandUrl(
			EchoIcon::getRasterizedUrl( $model->getIconType(), $this->language->getCode() ),
			PROTO_CANONICAL
		);

		$imgSrc = Sanitizer::encodeAttribute( $iconUrl );

		// notification text
		$text = $model->getHeaderMessage()->parse();

		return <<< EOF
<tr>
	<td width="30">
		<img src="$imgSrc" width="30" height="30" style="vertical-align:middle;">
	</td>
	<td style="font-family: Arial, Helvetica, sans-serif; font-size:13px; color: #58585B;">
		$text
	</td>
</tr>
EOF;
	}

	private function renderDigestList( $eventsByCategory ) {
		$result = array();
		// build the html section for each category
		foreach ( $eventsByCategory as $category => $models ) {
			$output = $this->applyStyleToCategory(
				$this->getCategoryTitle( $category, count( $models ) )
			);
			foreach ( $models as $model ) {
				$output .= "\n" . $this->applyStyleToEvent( $model );
			}
			$result[] = '<table border="0" width="100%">' . $output . '</table>';
		}

		return trim( implode( "\n", $result ) );
	}

	private function renderAction() {
		return Html::element(
			'a',
			array(
				'href' => SpecialPage::getTitleFor( 'Notifications' )->getFullURL( '', false, PROTO_CANONICAL ),
				'style' => EchoHtmlEmailFormatter::PRIMARY_LINK_STYLE,
			),
			$this->msg( 'echo-email-batch-link-text-view-all-notifications' )->text()
		);
	}


}
