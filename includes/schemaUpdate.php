<?php

/**
 * Performs updates required for respecting suppression within echo:
 *   Updates event_page_id based on event_page_title and event_page_namespace
 *   Updates extra data for page-linked events to contain page id's
 */
class EchoSuppressionRowUpdateGenerator implements RowUpdateGenerator {
	/**
	 * @var callable Hack to allow replacing Title::newFromText in tests
	 */
	protected $newTitleFromText = array( 'Title', 'newFromText' );

	/**
	 * {@inheritDoc}
	 */
	public function update( $row ) {
		$update = $this->updatePageIdFromTitle( $row );
		if ( $row->event_extra !== null && $row->event_type === 'page-linked' ) {
			$update = $this->updatePageLinkedExtraData( $row, $update );
		}

		return $update;
	}

	/**
	 * Hackish method of mocking Title::newFromText for tests
	 *
	 * @param $callable callable
	 */
	public function setNewTitleFromText( $callable ) {
		$this->newTitleFromText = $callable;
	}

	/**
	 * Hackish method of mocking Title::newFromText for tests
	 *
	 * @param $text string The page name to look up
	 * @param $defaultNamespace integer The default namespace of the page to look up
	 * @return Title|null The title located for the text + namespace, or null if invalid
	 */
	protected function newTitleFromText( $text, $defaultNamespace = NS_MAIN ) {
		return call_user_func( $this->newTitleFromText, $text, $defaultNamespace );
	}

	/**
	 * Migrates all echo events from having page title and namespace as rows in the table
	 * to having only a page id in the table.  Any event from a page that doesn't have an
	 * article id gets the title+namespace moved to the event extra data
	 *
	 * @param $row stdClass A row from the database
	 * @return array All updates required for this row
	 */
	protected function updatePageIdFromTitle( $row ) {
		$update = array();
		$title = $this->newTitleFromText( $row->event_page_title, $row->event_page_namespace );
		if ( $title !== null ) {
			$pageId = $title->getArticleId();
			if ( $pageId ) {
				// If the title has a proper id from the database, store it
				$update['event_page_id'] = $pageId;
			} else {
				// For titles that do not refer to a WikiPage stored in the database
				// move the title/namespace into event_extra
				$extra = $this->extra( $row );
				$extra['page_title'] = $row->event_page_title;
				$extra['page_namespace'] = $row->event_page_namespace;

				$update['event_extra'] = serialize( $extra );
			}
		}

		return $update;
	}

	/**
	 * Updates the extra data for page-linked events to point to the id of the article
	 * rather than the namespace+title combo.
	 *
	 * @param $row stdClass A row from the database
	 * @param $update array
	 *
	 * @return array All updates required for this row
	 */
	protected function updatePageLinkedExtraData( $row, array $update ) {
		$extra = $this->extra( $row, $update );

		if ( isset( $extra['link-from-title'], $extra['link-from-namespace'] ) ) {
			$title = $this->newTitleFromText( $extra['link-from-title'], $extra['link-from-namespace'] );
			unset( $extra['link-from-title'], $extra['link-from-namespace'] );
			// Link from page is always from a content page, if null or no article id it was
			// somehow invalid
			if ( $title !== null && $title->getArticleId() ) {
				$extra['link-from-page-id'] = $title->getArticleId();
			}

			$update['event_extra'] = serialize( $extra );
		}

		return $update;
	}

	/**
	 * Return the extra data for a row, if an update wants to change the
	 * extra data returns that updated data rather than the origional. If
	 * no extra data exists returns array()
	 *
	 * @param $row stdClass The database row being updated
	 * @param $update array Updates that need to be applied to the database row
	 * @return array The event extra data
	 */
	protected function extra( $row, array $update = array() ) {
		if ( isset( $update['event_extra'] ) ) {
			return unserialize( $update['event_extra'] );
		} elseif ( $row->event_extra ) {
			return unserialize( $row->event_extra );
		}

		return array();
	}

}
