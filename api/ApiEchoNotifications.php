<?php

class ApiEchoNotifications extends ApiQueryBase {
	public function __construct( $query, $moduleName ) {
		parent::__construct( $query, $moduleName, 'not' );
	}

	public function execute() {
		$user = $this->getUser();
		if ( $user->isAnon() ) {
			$this->dieUsage( 'Login is required', 'login-required' );
		}

		$params = $this->extractRequestParams();
		if ( count( $params['markread'] ) ) {
			EchoNotificationController::markRead( $user, $params['markread'] );
		}

		$prop = $params['prop'];

		$result = array();
		if ( in_array( 'list', $prop ) ) {
			$result['list'] = self::getNotifications( $user, $params['unread'], $params['format'], $params['limit'] + 1, $params['timestamp'], $params['offset'] );

			// check if there is more elements than we request
			if ( count( $result['list'] ) > $params['limit'] ) {
				array_pop( $result['list'] );
				$result['more'] = '1';
			} else {
				$result['more'] = '0';
			}
		}

		if ( in_array( 'count', $prop ) ) {
			$result['count'] = EchoNotificationController::getFormattedNotificationCount( $user );
		}

		if ( in_array( 'index', $prop ) ) {
			$result['index'] = array_keys( $result['list'] );
		}

		$this->getResult()->setIndexedTagName( $result, 'notification' );
		$this->getResult()->addValue( 'query', $this->getModuleName(), $result );
	}

	/**
	 * Get a list of notifications based on the passed parameters
	 *
	 * @param $user User the user to get notifications for
	 * @param $unread Boolean true to get only unread notifications
	 * @param $format string|bool false to not format any notifications, string to a specific output format
	 * @param $limit int The maximum number of notifications to return
	 * @param $timestamp int The timestamp to start from
	 * @param $offset int The notification event id to start from
	 * @return array
	 */
	public static function getNotifications( $user, $unread = false, $format = false, $limit = 20, $timestamp = 0, $offset = 0 ) {
		global $wgEchoBackend;

		$output = array();

		// TODO: Make 'web' based on a new API param?
		$res = $wgEchoBackend->loadNotifications( $user, $unread, $limit, $timestamp, $offset, 'web' );

		foreach ( $res as $row ) {
			$event = EchoEvent::newFromRow( $row );

			$timestamp = new MWTimestamp( $row->notification_timestamp );
			$timestampUnix = $timestamp->getTimestamp( TS_UNIX );
			$timestampMw = $timestamp->getTimestamp( TS_MW );

			// start creating date section header
			$today = wfTimestamp( TS_MW );
			$yesterday = wfTimestamp( TS_MW, wfTimestamp( TS_UNIX, $today ) - 24 * 3600 );

			if ( substr( $today, 4, 4 ) === substr( $timestampMw, 4, 4 ) ) {
				$date = wfMessage( 'echo-date-today' )->escaped();
			} elseif ( substr( $yesterday, 4, 4 ) === substr( $timestampMw, 4, 4 ) ) {
				$date = wfMessage( 'echo-date-yesterday' )->escaped();
			} else {
				$month = array(
					'01' => 'january-gen',
					'02' => 'february-gen',
					'03' => 'march-gen',
					'04' => 'april-gen',
					'05' => 'may-gen',
					'06' => 'june-gen',
					'07' => 'july-gen',
					'08' => 'august-gen',
					'09' => 'september-gen',
					'10' => 'october-gen',
					'11' => 'november-gen',
					'12' => 'december-gen'
				);

				$headerMonth = wfMessage( $month[substr( $timestampMw, 4, 2 )] )->text();
				$headerDate  = substr( $timestampMw, 6, 2 );
				$date = wfMessage( 'echo-date-header' )->params( $headerMonth )->numParams( $headerDate )->escaped();
			}
			// end creating date section header

			$thisEvent = array(
				'id' => $event->getId(),
				'type' => $event->getType(),
				'category' => EchoNotificationController::getNotificationCategory( $event->getType() ),
				'timestamp' => array(
					'unix' => $timestampUnix,
					'mw' => $timestampMw,
					'date' => $date
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

			if ( $row->notification_read_timestamp ) {
				$thisEvent['read'] = $row->notification_read_timestamp;
			}

			if ( $format ) {
				$thisEvent['*'] = EchoNotificationController::formatNotification(
					$event, $user, $format );
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
					'flyout',
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
			'offset' => array(
				ApiBase::PARAM_TYPE => 'integer',
			),
			'timestamp' => array(
				ApiBase::PARAM_TYPE => 'integer',
			),
		);
	}

	public function getParamDescription() {
		return array(
			'prop' => 'Details to request.',
			'markread' => 'A list of notification IDs to mark as read',
			'unread' => 'Request only unread notifications',
			'format' => 'If specified, notifications will be returned formatted this way.',
			'index' => 'If specified, a list of notification IDs, in order, will be returned.',
			'limit' => 'The maximum number of notifications to return.',
			'offset' => 'Notification event id to start from (requires timestamp param to be passed as well)',
			'timestamp' => 'Timestamp to start from',
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
