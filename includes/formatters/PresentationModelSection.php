<?php
/**
 * Component that represents a section of a page to be used from EchoEventPresentationModel subclass.
 */
class EchoPresentationModelSection {

	/**
	 * @var string
	 */
	private $rawSectionTitle = null;

	/**
	 * @var string
	 */
	private $parsedSectionTitle = null;

	/**
	 * @var EchoEvent
	 */
	private $event;

	/**
	 * @var User
	 */
	private $user;

	/**
	 * @var Language
	 */
	private $language;

	/**
	 * EchoPresentationModelSection constructor.
	 *
	 * @param EchoEvent $event
	 * @param User $user
	 * @param Language $language
	 */
	public function __construct( EchoEvent $event, User $user, Language $language ) {
		$this->event = $event;
		$this->user = $user;
		$this->language = $language;
	}

	/**
	 * Get the raw (unparsed) section title
	 * @return string Section title
	 */
	private function getRawSectionTitle() {
		if ( $this->rawSectionTitle !== null ) {
			return $this->rawSectionTitle;
		}
		$sectionTitle = $this->event->getExtraParam( 'section-title' );
		if ( !$sectionTitle ) {
			$this->rawSectionTitle = false;
			return false;
		}
		// Check permissions
		if ( !$this->event->userCan( Revision::DELETED_TEXT, $this->user ) ) {
			$this->rawSectionTitle = false;
			return false;
		}

		$this->rawSectionTitle = $sectionTitle;
		return $this->rawSectionTitle;
	}

	/**
	 * Get the section title parsed to plain text
	 * @return string Section title (plain text)
	 */
	private function getParsedSectionTitle() {
		if ( $this->parsedSectionTitle !== null ) {
			return $this->parsedSectionTitle;
		}
		$rawSectionTitle = $this->getRawSectionTitle();
		if ( !$rawSectionTitle ) {
			$this->parsedSectionTitle = false;
			return false;
		}
		$this->parsedSectionTitle = EchoDiscussionParser::getTextSnippet(
			$rawSectionTitle,
			$this->language,
			150,
			$this->event->getTitle()
		);
		return $this->parsedSectionTitle;
	}

	/**
	 * Check if there is a section.
	 *
	 * This also returns false if the revision is deleted,
	 * even if there is a section, because the section can't
	 * be viewed in that case.
	 * @return bool Whether there is a section
	 */
	public function exists() {
		return (bool)$this->getRawSectionTitle();
	}

	/**
	 * Get a Title pointing to the section, if available.
	 * @return Title
	 */
	public function getTitleWithSection() {
		$title = $this->event->getTitle();
		$section = $this->getParsedSectionTitle();
		$fragment = substr( Parser::guessSectionNameFromStrippedText( $section ), 1 );
		if ( $section ) {
			$title = Title::makeTitle(
				$title->getNamespace(),
				$title->getDBkey(),
				$fragment
			);
		}
		return $title;
	}

	public function getTruncatedSectionTitle() {
		return $this->language->embedBidi( $this->language->truncateForVisual(
			$this->getParsedSectionTitle(),
			EchoEventPresentationModel::SECTION_TITLE_RECOMMENDED_LENGTH,
			'...',
			false
		) );
	}
}
