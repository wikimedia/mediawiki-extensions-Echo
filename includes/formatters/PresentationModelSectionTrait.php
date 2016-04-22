<?php
/**
 * Trait that adds section title handling to an EchoEventPresentationModel subclass.
 */
trait EchoPresentationModelSectionTrait {
	private $sectionTitle = null;

	/**
	 * Get the section title
	 * @return string Section title
	 */
	protected function getSection() {
		if ( $this->sectionTitle !== null ) {
			return $this->sectionTitle;
		}
		$sectionTitle = $this->event->getExtraParam( 'section-title' );
		if ( !$sectionTitle ) {
			$this->sectionTitle = false;
			return false;
		}
		// Check permissions
		if ( !$this->userCan( Revision::DELETED_TEXT ) ) {
			$this->sectionTitle = false;
			return false;
		}

		$this->sectionTitle = $sectionTitle;
		return $this->sectionTitle;
	}

	/**
	 * Check if there is a section.
	 *
	 * This also returns false if the revision is deleted,
	 * even if there is a section, because the section can't
	 * be viewed in that case.
	 * @return boolean Whether there is a section
	 */
	protected function hasSection() {
		return (bool)$this->getSection();
	}

	/**
	 * Get a Title pointing to the section, if available.
	 * @return Title
	 */
	protected function getTitleWithSection() {
		$title = $this->event->getTitle();
		$section = $this->getSection();
		if ( $section ) {
			$title = Title::makeTitle(
				$title->getNamespace(),
				$title->getDBkey(),
				$section
			);
		}
		return $title;
	}
}
