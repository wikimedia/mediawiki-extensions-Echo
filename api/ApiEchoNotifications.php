<?php

class ApiEchoNotifications extends ApiQueryBase {
	public function __construct( $query, $moduleName ) {
		parent::__construct( $query, $moduleName, 'not' );
	}

	public function execute() {
		global $wgUser;
		$params = $this->extractRequestParams();
		$result = $this->getResult();
		$prop = $params['prop'];

		if ( in_array('list', $prop) ) {
			$r = $this->getNotifications( $wgUser, $params['unread'], $params['format'] );
		} else {
			$r = array();
		}

		if ( in_array('count', $prop) ) {
			$r['count'] = EchoNotificationController::getNotificationCount($wgUser);
		}

		if ( count($params['markread']) ) {
			EchoNotificationController::markRead( $wgUser, $params['markread'] );
		}

		$result->setIndexedTagName( $r, 'notification' );
		$result->addValue( 'query', $this->getModuleName(), $r );
	}

	public function getNotifications( $user, $unread = false, $format = false ) {
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
				'LIMIT' => 50,
			),
			array(
				'echo_event' => array('left join', 'notification_event=event_id'),
			)
		);

		foreach( $res as $row ) {
			$event = EchoEvent::loadFromRow( $row );

			$thisEvent = array(
				'type' => $event->getType(),
				'timestamp' => array(
					'unix' => wfTimestamp( TS_UNIX, $event->getTimestamp() ),
					'mw' => $event->getTimestamp(),
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
				global $wgUser;
				$thisEvent['*'] = EchoNotificationController::formatNotification(
						$event, $wgUser, $format );
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
		);
	}

	public function getParamDescription() {
		return array(
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