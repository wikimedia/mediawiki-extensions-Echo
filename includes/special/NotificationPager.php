<?php

/**
 * This pager is used by Special:Notifications (NO-JS).
 * The heavy-lifting is done by IndexPager (grand-parent to this class).
 * It paginates on notification_event for a specific user, bundle_base=1, and the user's enabled event types.
 *
 * Class NotificationPager
 */
class NotificationPager extends ReverseChronologicalPager {
	public function __construct() {
		$dbFactory = MWEchoDbFactory::newFromDefault();
		$this->mDb = $dbFactory->getEchoDb( DB_SLAVE );

		parent::__construct();
	}

	function formatRow( $row ) {
		$msg = "This pager does not support row formatting. Use 'getNotifications()' to get a list of EchoNotification objects.";
		throw new Exception( $msg );
	}

	function getQueryInfo() {
		$attributeManager = EchoAttributeManager::newFromGlobalVars();
		$eventTypes = $attributeManager->getUserEnabledEvents( $this->getUser(), 'web' );

		return array(
			'tables' => array( 'echo_notification', 'echo_event' ),
			'fields' => '*',
			'conds' => array(
				'notification_user' => $this->getUser()->getId(),
				'event_type' => $eventTypes,
			),
			'options' => array(),
			'join_conds' =>
				array( 'echo_event' =>
					array(
						'JOIN',
						'notification_event=event_id',
					),
				),
		);
	}

	public function getNotifications() {
		if ( !$this->mQueryDone ) {
			$this->doQuery();
		}

		$notifications = array();
		foreach ( $this->mResult as $row ) {
			$notifications[] = EchoNotification::newFromRow( $row );
		}

		// get rid of the overfetched
		if ( count( $notifications ) > $this->getLimit() ) {
			array_pop( $notifications );
		}

		if ( $this->mIsBackwards ) {
			$notifications = array_reverse( $notifications );
		}

		return $notifications;
	}

	function getIndexField() {
		return 'notification_event';
	}
}
