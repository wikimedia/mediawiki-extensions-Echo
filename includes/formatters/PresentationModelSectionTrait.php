<?php
/**
 * Trait that adds section title handling to an EchoEventPresentationModel subclass.
 */
trait EchoPresentationModelSectionTrait {
	private $rawSectionTitle = null;
	private $parsedSectionTitle = null;

	/**
	 * Get the raw (unparsed) section title
	 * @return string Section title
	 */
	protected function getRawSectionTitle() {
		if ( $this->rawSectionTitle !== null ) {
			return $this->rawSectionTitle;
		}
		$sectionTitle = $this->event->getExtraParam( 'section-title' );
		if ( !$sectionTitle ) {
			$this->rawSectionTitle = false;
			return false;
		}
		// Check permissions
		if ( !$this->userCan( Revision::DELETED_TEXT ) ) {
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
	protected function getParsedSectionTitle() {
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
	protected function hasSection() {
		return (bool)$this->getRawSectionTitle();
	}

	/**
	 * Get a Title pointing to the section, if available.
	 * @return Title
	 */
	protected function getTitleWithSection() {
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

	protected function getTruncatedSectionTitle() {
		return $this->language->embedBidi( $this->language->truncate(
			$this->getParsedSectionTitle(),
			self::SECTION_TITLE_RECOMMENDED_LENGTH,
			'...',
			false
		) );
	}
}
