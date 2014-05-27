<?php

class ApiEchoNotifications extends ApiQueryBase {

	public function __construct( $query, $moduleName ) {
		parent::__construct( $query, $moduleName, 'not' );
	}

	public function execute() {
		// To avoid API warning, register the parameter used to bust browser cache
		$this->getMain()->getVal( '_' );

		$user = $this->getUser();
		if ( $user->isAnon() ) {
			$this->dieUsage( 'Login is required', 'login-required' );
		}

		$notifUser = MWEchoNotifUser::newFromUser( $user );

		$params = $this->extractRequestParams();

		$prop = $params['prop'];

		$result = array();
		if ( in_array( 'list', $prop ) ) {
			$result['list'] = self::getNotifications( $user, $params['format'], $params['limit'] + 1, $params['continue'] );

			// check if there is more elements than we request
			if ( count( $result['list'] ) > $params['limit'] ) {
				$lastItem = array_pop( $result['list'] );
				$result['continue'] = $lastItem['timestamp']['utcunix'] . '|' . $lastItem['id'];
			} else {
				$result['continue'] = null;
			}
			$this->getResult()->setIndexedTagName( $result['list'], 'notification' );
		}

		if ( in_array( 'count', $prop ) ) {
			$rawCount = $notifUser->getNotificationCount();
			$result['rawcount'] = $rawCount;
			$result['count'] = EchoNotificationController::formatNotificationCount( $rawCount );
		}

		if ( in_array( 'index', $prop ) ) {
			$result['index'] = array();
			foreach ( array_keys( $result['list'] ) as $key ) {
				// Don't include the XML tag name ('_element' key)
				if ( $key != '_element' ) {
					$result['index'][] = $key;
				}
			}
			$this->getResult()->setIndexedTagName( $result['index'], 'id' );
		}

		$this->getResult()->setIndexedTagName( $result, 'notification' );
		$this->getResult()->addValue( 'query', $this->getModuleName(), $result );
	}

	/**
	 * Get a list of notifications based on the passed parameters
	 *
	 * @param $user User the user to get notifications for
	 * @param $format string|bool false to not format any notifications, string to a specific output format
	 * @param $limit int The maximum number of notifications to return
	 * @param $continue string Used for offset
	 *
	 * @return array
	 */
	public static function getNotifications( $user, $format = false, $limit = 20, $continue = null ) {
		global $wgEchoBackend;

		$output = array();

		// TODO: Make 'web' based on a new API param?
		$res = $wgEchoBackend->loadNotifications( $user, $limit, $continue, 'web' );

		foreach ( $res as $row ) {
			$event = EchoEvent::newFromRow( $row );
			if ( $row->notification_bundle_base && $row->notification_bundle_display_hash ) {
				$event->setBundleHash( $row->notification_bundle_display_hash );
			}

			$timestampMw = self::getUserLocalTime( $user, $row->notification_timestamp );

			// Start creating date section header
			$now = wfTimestamp();
			$dateFormat = substr( $timestampMw, 0, 8 );
			if ( substr( self::getUserLocalTime( $user, $now ), 0, 8 ) === $dateFormat ) {
				// 'Today'
				$date = wfMessage( 'echo-date-today' )->escaped();
			} elseif ( substr( self::getUserLocalTime( $user, $now - 86400 ), 0, 8 ) === $dateFormat ) {
				// 'Yesterday'
				$date = wfMessage( 'echo-date-yesterday' )->escaped();
			} else {
				// 'May 10' or '10 May' (depending on user's date format preference)
				$lang = RequestContext::getMain()->getLanguage();
				$dateFormat = $lang->getDateFormatString( 'pretty', $user->getDatePreference() ?: 'default' );
				$date = $lang->sprintfDate( $dateFormat, $timestampMw );
			}
			// End creating date section header

			$thisEvent = array(
				'id' => $event->getId(),
				'type' => $event->getType(),
				'category' => $event->getCategory(),
				'timestamp' => array(
					// UTC timestamp in UNIX format used for loading more notification
					'utcunix' => wfTimestamp( TS_UNIX, $row->notification_timestamp ),
					'unix' => self::getUserLocalTime( $user, $row->notification_timestamp, TS_UNIX ),
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
				if ( $event->userCan( Revision::DELETED_USER, $user ) ) {
					$thisEvent['agent'] = array(
						'id' => $event->getAgent()->getId(),
						'name' => $event->getAgent()->getName(),
					);
				} else {
					$thisEvent['agent'] = array( 'userhidden' => '' );
				}
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

	/**
	 * Internal helper function for converting UTC timezone to a user's timezone
	 *
	 * @param $user User
	 * @param $ts string
	 * @param $format int output format
	 *
	 * @return string
	 */
	private static function getUserLocalTime( $user, $ts, $format = TS_MW ) {
		$timestamp = new MWTimestamp( $ts );
		$timestamp->offsetForUser( $user );
		return $timestamp->getTimestamp( $format );
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
			'format' => array(
				ApiBase::PARAM_TYPE => array(
					'text',
					'flyout',
					'html',
				),
			),
			'limit' => array(
				ApiBase::PARAM_TYPE => 'limit',
				ApiBase::PARAM_DFLT => 20,
				ApiBase::PARAM_MIN => 1,
				ApiBase::PARAM_MAX => ApiBase::LIMIT_SML1,
				ApiBase::PARAM_MAX2 => ApiBase::LIMIT_SML2,
			),
			'index' => false,
			'continue' => null,
			'uselang' => null
		);
	}

	public function getParamDescription() {
		return array(
			'prop' => 'Details to request.',
			'format' => 'If specified, notifications will be returned formatted this way.',
			'index' => 'If specified, a list of notification IDs, in order, will be returned.',
			'limit' => 'The maximum number of notifications to return.',
			'continue' => 'When more results are available, use this to continue',
			'uselang' => 'the desired language to format the output'
		);
	}

	public function getDescription() {
		return 'Get notifications waiting for the current user';
	}

	public function getExamples() {
		return array(
			'api.php?action=query&meta=notifications',
			'api.php?action=query&meta=notifications&notprop=count',
		);
	}

	public function getHelpUrls() {
		return 'https://www.mediawiki.org/wiki/Echo_(notifications)/API';
	}

	public function getVersion() {
		return __CLASS__ . '-0.1';
	}
}
