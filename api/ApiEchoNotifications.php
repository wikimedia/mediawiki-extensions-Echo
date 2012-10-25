<?php

class ApiEchoNotifications extends ApiQueryBase {
	public function __construct( $query, $moduleName ) {
		parent::__construct( $query, $moduleName, 'not' );
	}

	public function execute() {
		$params = $this->extractRequestParams();
		$user = $this->getUser();

		if ( count( $params['markread'] ) ) {
			EchoNotificationController::markRead( $user, $params['markread'] );
		}

		$result = $this->getResult();
		$prop = $params['prop'];

		if ( in_array( 'list', $prop ) ) {
			$r = $this->getNotifications( $user, $params['unread'], $params['format'], $params['limit'] );
		} else {
			$r = array();
		}

		if ( in_array( 'count', $prop ) ) {
			$r['count'] = EchoNotificationController::getNotificationCount( $user );
		}

		if ( in_array( 'index', $prop ) ) {
			$r['index'] = array_keys( $r );
		}

		$result->setIndexedTagName( $r, 'notification' );
		$result->addValue( 'query', $this->getModuleName(), $r );
	}

	/**
	 * @param $user User to get notifications for
	 * @param $unread Boolean: True to get only unread notifications.
	 * @param $format bool false to not format any notifications, or an output format name.
	 * @param $limit int The maximum number of notifications to return.
	 * @return array
	 */
	public function getNotifications( $user, $unread = false, $format = false, $limit = 20 ) {
		$dbr = wfGetDB( DB_SLAVE );

		$output = array();

		$conds = array(
			'notification_user' => $user->getID(),
		);

		if ( $unread ) {
			$conds['notification_read_timestamp'] = null;
		}

		$res = $dbr->select(
			array( 'echo_notification', 'echo_event' ),
			'*',
			$conds,
			__METHOD__,
			array(
				'ORDER BY' => 'notification_timestamp DESC',
				'LIMIT' => $limit,
			),
			array(
				'echo_event' => array( 'LEFT JOIN', 'notification_event=event_id' ),
			)
		);

		foreach ( $res as $row ) {
			$event = EchoEvent::newFromRow( $row );

			if ( MWInit::methodExists( 'Language', 'prettyTimestamp' ) ) {
				$ts = $this->getLanguage()->prettyTimestamp( $event->getTimestamp(), false, $user );
			} else {
				$ts = $this->getLanguage()->timeanddate( $event->getTimestamp(), true );
			}

			$timestamp = new MWTimestamp( $event->getTimestamp() );
			$timestampUnix = $timestamp->getTimestamp( TS_UNIX );
			$timestampMw = $timestamp->getTimestamp( TS_MW );

			$thisEvent = array(
				'type' => $event->getType(),
				'timestamp' => array(
					'unix' => $timestampUnix,
					'mw' => $timestampMw,
					'pretty' => $ts,
				),
			);

			if ( $event->getVariant() ) {
				$thisEvent['variant'] = $event->getVariant();
			}

			if ( $event->getTitle() ) {
				$thisEvent['title'] = array(
					'full' => $event->getTitle()->getPrefixedText(),
					'namespace' => $event->getTitle()->getNSText(),
					'namespace-key' => $event->getTitle()->getNamespace(),
					'text' => $event->getTitle()->getText(),
				);
			}

			if ( $event->getAgent() ) {
				$thisEvent['agent'] = array(
					'id' => $event->getAgent()->getId(),
					'name' => $event->getAgent()->getName(),
				);
			}

			if ( $event->getExtra() ) {
				$thisEvent['extra'] = $event->getExtra();
			}

			if ( $row->notification_read_timestamp ) {
				$thisEvent['read'] = $row->notification_read_timestamp;
			}

			if ( $format ) {
				$thisEvent['*'] = EchoNotificationController::formatNotification(
					$event, $this->getUser(), $format );
			}

			$output[$event->getID()] = $thisEvent;
		}

		return $output;
	}

	public function getAllowedParams() {
		return array(
			'prop' => array(
				ApiBase::PARAM_ISMULTI => true,
				ApiBase::PARAM_TYPE => array(
					'list',
					'count',
					'index',
				),
				ApiBase::PARAM_DFLT => 'list',
			),
			'markread' => array(
				ApiBase::PARAM_ISMULTI => true,
			),
			'unread' => false,
			'format' => array(
				ApiBase::PARAM_TYPE => array(
					'text',
					'html',
				),
			),
			'limit' => array(
				ApiBase::PARAM_TYPE => 'integer',
				ApiBase::PARAM_DFLT => 20,
				ApiBase::PARAM_MAX => 50,
				ApiBase::PARAM_MIN => 1,
			),
			'index' => false,
		);
	}

	public function getParamDescription() {
		return array(
			'prop' => 'Details to request.',
			'markread' => 'A list of notification IDs to mark as read',
			'unread' => 'Request only unread notifications',
			'format' => 'If specified, notifications will be returned formatted this way.',
			'index' => 'If specified, a list of notification IDs, in order, will be returned.',
			'limit' => 'The maximum number of notifications to return.'
		);
	}

	public function getDescription() {
		return 'Get notifications waiting for the current user';
	}

	public function getExamples() {
		return array(
			'api.php?action=query&meta=notifications',
			'api.php?action=query&meta=notifications&notprop=count',
			'api.php?action=query&meta=notifications&notmarkread=8',
		);
	}

	public function getHelpUrls() {
		return 'https://www.mediawiki.org/wiki/Echo_(notifications)/API';
	}

	public function getVersion() {
		return __CLASS__ . '-0.1';
	}
}
