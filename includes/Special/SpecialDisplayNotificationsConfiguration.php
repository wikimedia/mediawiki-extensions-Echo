<?php

namespace MediaWiki\Extension\Notifications\Special;

use MediaWiki\Extension\Notifications\AttributeManager;
use MediaWiki\Extension\Notifications\Hooks as EchoHooks;
use MediaWiki\Html\Html;
use MediaWiki\Html\TocGeneratorTrait;
use MediaWiki\HTMLForm\HTMLForm;
use MediaWiki\Json\FormatJson;
use MediaWiki\MainConfigNames;
use MediaWiki\Message\Message;
use MediaWiki\SpecialPage\UnlistedSpecialPage;
use MediaWiki\User\Options\UserOptionsManager;

class SpecialDisplayNotificationsConfiguration extends UnlistedSpecialPage {
	use TocGeneratorTrait;

	/**
	 * Category names, mapping internal name to HTML-formatted name
	 *
	 * @var string[]
	 */
	protected $categoryNames;

	// Should be one mapping text (friendly) name to internal name, but there
	// is no friendly name
	/**
	 * Notification type names.  Mapping HTML-formatted internal name to internal name
	 *
	 * @var string[]
	 */
	protected $notificationTypeNames;

	/**
	 * Notify types, mapping internal name to HTML-formatted name
	 *
	 * @var string[]
	 */
	protected $notifyTypes;

	// Due to how HTMLForm works, it's convenient to have both directions
	/**
	 * Category names, mapping HTML-formatted name to internal name
	 *
	 * @var string[]
	 */
	protected $flippedCategoryNames;

	/**
	 * Notify types, mapping HTML-formatted name to internal name
	 *
	 * @var string[]
	 */
	protected $flippedNotifyTypes;

	/**
	 * @param AttributeManager $attributeManager AttributeManager to access notification configuration
	 * @param UserOptionsManager $userOptionsManager
	 */
	public function __construct(
		protected AttributeManager $attributeManager,
		private readonly UserOptionsManager $userOptionsManager,
	) {
		parent::__construct( 'DisplayNotificationsConfiguration' );
	}

	/** @inheritDoc */
	public function execute( $subPage ) {
		$this->setHeaders();
		$this->checkPermissions();

		$config = $this->getConfig();

		$internalCategoryNames = $this->attributeManager->getInternalCategoryNames();
		$this->categoryNames = [];

		foreach ( $internalCategoryNames as $internalCategoryName ) {
			$formattedFriendlyCategoryName = Html::element(
				'strong',
				[],
				$this->msg( $this->attributeManager->getCategoryTitle( $internalCategoryName ) )->numParams( 1 )->text()
			);

			$formattedInternalCategoryName = $this->msg( 'parentheses' )->rawParams(
				Html::element(
					'em',
					[],
					$internalCategoryName
				)
			)->parse();

			$this->categoryNames[$internalCategoryName] = $formattedFriendlyCategoryName . ' '
				. $formattedInternalCategoryName;
		}

		$this->flippedCategoryNames = array_flip( $this->categoryNames );

		$this->notifyTypes = [];
		foreach ( $config->get( 'EchoNotifiers' ) as $notifyType => $notifier ) {
			$this->notifyTypes[$notifyType] = $this->msg( 'echo-pref-' . $notifyType )->escaped();
		}

		$this->flippedNotifyTypes = array_flip( $this->notifyTypes );

		$notificationTypes = array_keys( $config->get( 'EchoNotifications' ) );
		$this->notificationTypeNames = array_combine(
			array_map( 'htmlspecialchars', $notificationTypes ),
			$notificationTypes
		);

		$this->getOutput()->setPageTitleMsg( $this->msg( 'echo-displaynotificationsconfiguration' ) );
		$this->outputHeader( 'echo-displaynotificationsconfiguration-summary' );
		$this->outputConfiguration();
	}

	/**
	 * Outputs the Echo configuration
	 */
	protected function outputConfiguration() {
		// Collect HTML for all sections, registering TOC entries in the process
		$htmlParts = [
			$this->getNotificationsInCategories(),
			$this->getNotificationsInSections(),
			$this->getAvailability(),
			$this->getMandatory(),
			$this->getEnabledDefault(),
		];

		// Add TOC at the top of the page
		$this->getOutput()->addTOCPlaceholder( $this->getTocData() );
		$this->getOutput()->addHTML( implode( '', $htmlParts ) );
	}

	/**
	 * Register a TOC section and return the corresponding heading HTML.
	 *
	 * @param string $id Arbitrary ID
	 * @param string $msg Message key for the heading label
	 * @return string HTML
	 */
	protected function getMainHeading( string $id, string $msg ): string {
		$this->addTocSection( $id, $msg );
		return Html::element(
			'h2',
			[ 'id' => $id ],
			$this->msg( $msg )->text()
		);
	}

	/**
	 * Register a TOC sub-section, return the heading HTML and check matrix.
	 *
	 * @param string $id Arbitrary ID
	 * @param string|Message $legendMsg Message or message key for the heading label
	 * @param array $rowLabelMapping Associative array mapping label to tag
	 * @param array $columnLabelMapping Associative array mapping label to tag
	 * @param array $value Array consisting of strings in the format '$columnTag-$rowTag'
	 * @return string HTML
	 */
	protected function getCheckMatrixWithSubHeading(
		string $id,
		string|Message $legendMsg,
		array $rowLabelMapping,
		array $columnLabelMapping,
		array $value
	): string {
		$message = $this->msg( $legendMsg );
		$this->addTocSubSection( $id, $message->getKey(), ...$message->getParams() );
		$form = HTMLForm::factory( 'codex',
			[
				$id => [
					'type' => 'checkmatrix',
					'rows' => $rowLabelMapping,
					'columns' => $columnLabelMapping,
					'default' => $value,
					'disabled' => true,
				],
			],
			$this->getContext()
		);

		$form->setTitle( $this->getPageTitle() )
			->prepareForm()
			->suppressDefaultSubmit();

		return Html::element( 'h3', [ 'id' => $id ], $message->text() )
			. $form->getHTML( false );
	}

	/**
	 * Outputs the notification types in each category
	 * @return string HTML
	 */
	protected function getNotificationsInCategories(): string {
		$notificationsByCategory = $this->attributeManager->getEventsByCategory();

		$html = $this->getMainHeading(
			'notifications-by-category',
			'echo-displaynotificationsconfiguration-notifications-by-category-header'
		) . Html::openElement( 'ul' );
		foreach ( $notificationsByCategory as $categoryName => $notificationTypes ) {
			$implodedTypes = Html::element(
				'span',
				[],
				implode( $this->msg( 'comma-separator' )->text(), $notificationTypes )
			);

			$html .= Html::rawElement(
				'li',
				[],
				$this->categoryNames[$categoryName] . $this->msg( 'colon-separator' )->escaped() . ' '
					. $implodedTypes
			);
		}
		return $html . Html::closeElement( 'ul' );
	}

	/**
	 * Output the notification types in each section (alert/message)
	 * @return string HTML
	 */
	protected function getNotificationsInSections(): string {
		$html = $this->getMainHeading(
			'sorting-by-section',
			'echo-displaynotificationsconfiguration-sorting-by-section-header'
		);

		$bySectionValue = [];

		$flippedSectionNames = [];

		foreach ( AttributeManager::$sections as $section ) {
			$types = $this->attributeManager->getEventsForSection( $section );
			// echo-notification-alert-text-only, echo-notification-notice-text-only
			$msgSection = $section == 'message' ? 'notice' : $section;
			$flippedSectionNames[$this->msg( 'echo-notification-' . $msgSection . '-text-only' )->escaped()]
				= $section;
			foreach ( $types as $type ) {
				$bySectionValue[] = "$section-$type";
			}
		}

		$html .= $this->getCheckMatrixWithSubHeading(
			'type-by-section',
			'echo-displaynotificationsconfiguration-sorting-by-section-legend',
			$this->notificationTypeNames,
			$flippedSectionNames,
			$bySectionValue
		);
		return $html;
	}

	/**
	 * Output which notify types are available for each category
	 * @return string HTML
	 */
	protected function getAvailability(): string {
		$html = $this->getMainHeading(
			'available-notification-methods',
			'echo-displaynotificationsconfiguration-available-notification-methods-header'
		);

		$byCategoryValue = [];

		foreach ( $this->notifyTypes as $notifyType => $displayNotifyType ) {
			foreach ( $this->categoryNames as $category => $displayCategory ) {
				if ( $this->attributeManager->isNotifyTypeAvailableForCategory( $category, $notifyType ) ) {
					$byCategoryValue[] = "$notifyType-$category";
				}
			}
		}

		$html .= $this->getCheckMatrixWithSubHeading(
			'availability-by-category',
			'echo-displaynotificationsconfiguration-available-notification-methods-by-category-legend',
			$this->flippedCategoryNames,
			$this->flippedNotifyTypes,
			$byCategoryValue
		);
		return $html;
	}

	/**
	 * Output which notification categories are turned on by default, for each notify type
	 * @return string HTML
	 */
	protected function getEnabledDefault(): string {
		$html = $this->getMainHeading(
			'enabled-default',
			'echo-displaynotificationsconfiguration-enabled-default-header'
		);

		// Some of the preferences are mapped to existing ones defined in core MediaWiki
		$virtualOptions = EchoHooks::getVirtualUserOptions( $this->getConfig() );

		$defaults = $this->userOptionsManager->getDefaultOptions();
		$conditionalDefaults = $this->getConfig()->get( MainConfigNames::ConditionalUserOptions );

		$byCategory = [];
		$byCategoryConditional = [];
		foreach ( $this->notifyTypes as $notifyType => $displayNotifyType ) {
			foreach ( $this->categoryNames as $category => $displayCategory ) {
				$prefKey = "echo-subscriptions-$notifyType-$category";
				if ( isset( $virtualOptions[ $prefKey ] ) ) {
					$prefKey = $virtualOptions[ $prefKey ];
				}

				$byCategory["$notifyType-$category"] = $defaults[$prefKey];

				foreach ( $conditionalDefaults[$prefKey] ?? [] as $conditionalDefault ) {
					// At the zeroth index of the conditional case, the intended value is found; the rest
					// of the array are conditions.
					$value = array_shift( $conditionalDefault );
					$serializedCondition = FormatJson::encode( $conditionalDefault, true );

					$byCategoryConditional[$serializedCondition]["$notifyType-$category"] = $value;
				}
			}
		}

		$html .= $this->getCheckMatrixWithSubHeading(
			'enabled-by-default-generic',
			'echo-displaynotificationsconfiguration-enabled-default-legend',
			$this->flippedCategoryNames,
			$this->flippedNotifyTypes,
			array_keys( array_filter( $byCategory ) )
		);

		$i = 0;
		foreach ( $byCategoryConditional as $condition => $overrides ) {
			// Remove rows identical to the defaults
			$flippedCategoryNames = $this->flippedCategoryNames;
			foreach ( $this->categoryNames as $internal => $formatted ) {
				foreach ( $overrides as $key => $unused ) {
					if ( str_ends_with( $key, "-$internal" ) ) {
						continue 2;
					}
				}
				unset( $flippedCategoryNames[$formatted] );
			}

			$html .= $this->getCheckMatrixWithSubHeading(
				'enabled-by-default-conditional' . ++$i,
				$this->msg( 'echo-displaynotificationsconfiguration-enabled-default-conditional-legend' )
					->plaintextParams( $condition ),
				$flippedCategoryNames,
				$this->flippedNotifyTypes,
				array_keys( array_filter( array_merge( $byCategory, $overrides ) ) )
			);
		}
		return $html;
	}

	/**
	 * Output which notify types are mandatory for each category
	 * @return string HTML
	 */
	protected function getMandatory(): string {
		$byCategoryValue = [];

		$html = $this->getMainHeading(
			'mandatory-notification-methods',
			'echo-displaynotificationsconfiguration-mandatory-notification-methods-header'
		);

		foreach ( $this->notifyTypes as $notifyType => $displayNotifyType ) {
			foreach ( $this->categoryNames as $category => $displayCategory ) {
				if ( !$this->attributeManager->isNotifyTypeDismissableForCategory( $category, $notifyType ) ) {
					$byCategoryValue[] = "$notifyType-$category";
				}
			}
		}

		$html .= $this->getCheckMatrixWithSubHeading(
			'mandatory',
			'echo-displaynotificationsconfiguration-mandatory-notification-methods-by-category-legend',
			$this->flippedCategoryNames,
			$this->flippedNotifyTypes,
			$byCategoryValue
		);
		return $html;
	}
}
