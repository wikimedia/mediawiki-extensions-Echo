<?php

/**
 * Handle user email batch ( daily/ weekly )
 */
class MWEchoEmailBatch {

	// the user to be notified
	protected $mUser;

	// list of email content
	protected $content = array();
	// the last notification event of this batch
	protected $lastEvent;
	// the event count, this count is supported up to self::$displaySize + 1
	protected $count = 0;

	// number of bundle events to include in an email, we couldn't include
	// all events in a batch email
	protected static $displaySize = 20;

	/**
	 * @param $user User
	 */
	public function __construct( User $user ) {
		$this->mUser = $user;
	}

	/**
	 * Factory method to determine whether to create a batch instance for this
	 * user based on the user setting, this assumes the following value for
	 * member setting for echo-email-frequency
	 * -1 - no email
	 *  0 - instant
	 *  1 - once everyday
	 *  7 - once every 7 days
	 * @param $userId int
	 * @param $enforceFrequency boolean Whether or not email sending frequency should
	 *  be enforced.
	 *
	 *  When true, today's notifications won't be returned if they are
	 *  configured to go out tonight or at the end of the week.
	 *
	 *  When false, all pending notifications will be returned.
	 * @return MWEchoEmailBatch/false
	 */
	public static function newFromUserId( $userId, $enforceFrequency = true ) {
		$user = User::newFromId( intval( $userId ) );

		$userEmailSetting = intval( $user->getOption( 'echo-email-frequency' ) );

		// clear all existing events if user decides not to receive emails
		if ( $userEmailSetting == -1 ) {
			$emailBatch = new self( $user );
			$emailBatch->clearProcessedEvent();

			return false;
		}

		// @Todo - There may be some items idling in the queue, eg, a bundle job is lost
		// and there is not never another message with the same hash or a user switches from
		// digest to instant.  We should check the first item in the queue, if it doesn't
		// have either web or email bundling or created long ago, then clear it, this will
		// prevent idling item queuing up.

		// user has instant email delivery
		if ( $userEmailSetting == 0 ) {
			return false;
		}

		$userLastBatch = $user->getOption( 'echo-email-last-batch' );

		// send email batch, if
		// 1. it has been long enough since last email batch based on frequency
		// 2. there is no last batch timestamp recorded for the user
		// 3. user has switched from batch to instant email, send events left in the queue
		if ( $userLastBatch ) {
			// use 20 as hours per day to get estimate
			$nextBatch = wfTimestamp( TS_UNIX, $userLastBatch ) + $userEmailSetting * 20 * 60 * 60;
			if ( $enforceFrequency && wfTimestamp( TS_MW, $nextBatch ) > wfTimestampNow() ) {
				return false;
			}
		}

		return new self( $user );
	}

	/**
	 * Wrapper function that calls other functions required to process email batch
	 */
	public function process() {
		// if there is no event for this user, exist the process
		if ( !$this->setLastEvent() ) {
			return;
		}

		// get valid events
		$events = $this->getEvents();

		if ( $events ) {
			foreach ( $events as $row ) {
				$this->count++;
				if ( $this->count > self::$displaySize ) {
					break;
				}
				$event = EchoEvent::newFromRow( $row );
				$this->appendContent( $event, $row->eeb_event_hash );
			}

			$this->sendEmail();
		}

		$this->clearProcessedEvent();
		$this->updateUserLastBatchTimestamp();
	}

	/**
	 * Set the last event of this batch, this is a cutoff point for clearing
	 * processed/invalid events
	 *
	 * @return bool true if event exists false otherwise
	 */
	protected function setLastEvent() {
		$dbr = MWEchoDbFactory::getDB( DB_SLAVE );
		$res = $dbr->selectField(
			array( 'echo_email_batch' ),
			array( 'MAX( eeb_event_id )' ),
			array( 'eeb_user_id' => $this->mUser->getId() ),
			__METHOD__
		);

		if ( $res ) {
			$this->lastEvent = $res;

			return true;
		} else {
			return false;
		}
	}

	/**
	 * Update the user's last batch timestamp after a successful batch
	 */
	protected function updateUserLastBatchTimestamp() {
		$this->mUser->setOption( 'echo-email-last-batch', wfTimestampNow() );
		$this->mUser->saveSettings();
		$this->mUser->invalidateCache();
	}

	/**
	 * Get the events queued for the current user
	 * @return array
	 */
	protected function getEvents() {
		global $wgEchoNotifications;

		$events = array();

		$validEvents = array_keys( $wgEchoNotifications );

		// Per the tech discussion in the design meeting (03/22/2013), since this is
		// processed by a cron job, it's okay to use GROUP BY over more complex
		// composite index, favor insert performance, storage space over read
		// performance in this case
		if ( $validEvents ) {
			$dbr = MWEchoDbFactory::getDB( DB_SLAVE );

			$conds = array(
				'eeb_user_id' => $this->mUser->getId(),
				'event_id = eeb_event_id',
				'event_type' => $validEvents
			);

			// See setLastEvent() for more detail for this variable
			if ( $this->lastEvent ) {
				$conds[] = 'eeb_event_id <= ' . intval( $this->lastEvent );
			}

			$res = $dbr->select(
				array( 'echo_email_batch', 'echo_event' ),
				array( '*' ),
				$conds,
				__METHOD__,
				array(
					'ORDER BY' => 'eeb_event_priority',
					'LIMIT' => self::$displaySize + 1,
					'GROUP BY' => 'eeb_event_hash'
				)
			);

			foreach ( $res as $row ) {
				// records in the queue inserted before email bundling code
				// have no hash, in this case, we just ignore them
				if ( $row->eeb_event_hash ) {
					$events[$row->eeb_id] = $row;
				}
			}
		}

		return $events;
	}

	/**
	 * Add individual event template to the big email content
	 *
	 * @param EchoEvent $event
	 * @param string $hash
	 */
	protected function appendContent( EchoEvent $event, $hash ) {
		// get the category for this event
		$category = $event->getCategory();
		$event->setBundleHash( $hash );
		$email = EchoNotificationController::formatNotification( $event, $this->mUser, 'email', 'emaildigest' );

		$this->content[$category][] = $email;
	}

	/**
	 * Clear "processed" events in the queue, processed could be: email sent, invalid, users do not want to receive emails
	 */
	public function clearProcessedEvent() {
		$conds = array( 'eeb_user_id' => $this->mUser->getId() );

		// there is a processed cutoff point
		if ( $this->lastEvent ) {
			$conds[] = 'eeb_event_id <= ' . intval( $this->lastEvent );
		}

		$dbw = MWEchoDbFactory::newFromDefault()->getEchoDb( DB_MASTER );
		$dbw->delete(
			'echo_email_batch',
			$conds,
			__METHOD__
		);
	}

	/**
	 * Send the batch email
	 */
	public function sendEmail() {
		global $wgNotificationSender, $wgNotificationReplyName;

		if ( $this->mUser->getOption( 'echo-email-frequency' )
			== EchoHooks::EMAIL_WEEKLY_DIGEST
		) {
			$frequency = 'weekly';
			$emailDeliveryMode = 'weekly_digest';
		} else {
			$frequency = 'daily';
			$emailDeliveryMode = 'daily_digest';
		}

		// Echo digest email mode
		$emailDigest = new EchoEmailDigest( $this->mUser, $this->content, $frequency );

		$textEmailFormatter = new EchoTextEmailFormatter( $emailDigest );

		$body = $textEmailFormatter->formatEmail();

		$format = MWEchoNotifUser::newFromUser( $this->mUser )->getEmailFormat();
		if ( $format == EchoHooks::EMAIL_FORMAT_HTML ) {
			$htmlEmailFormatter = new EchoHTMLEmailFormatter( $emailDigest );
			$body = array(
				'text' => $body,
				'html' => $htmlEmailFormatter->formatEmail()
			);
		}

		// Give grep a chance to find the usages:
		// echo-email-batch-subject-daily, echo-email-batch-subject-weekly
		$subject = wfMessage( 'echo-email-batch-subject-' . $frequency )
			->inLanguage( $this->mUser->getOption( 'language' ) )
			->params( $this->count, $this->count )->text();

		$toAddress = MailAddress::newFromUser( $this->mUser );
		$fromAddress = new MailAddress( $wgNotificationSender, EchoHooks::getNotificationSenderName() );
		$replyTo = new MailAddress( $wgNotificationSender, $wgNotificationReplyName );

		// @Todo Push the email to job queue or just send it out directly?
		UserMailer::send( $toAddress, $fromAddress, $subject, $body, array( 'replyTo' => $replyTo ) );
		MWEchoEventLogging::logSchemaEchoMail( $this->mUser, $emailDeliveryMode );
	}

	/**
	 * Insert notification event into email queue
	 *
	 * @param $userId int
	 * @param $eventId int
	 * @param $priority int
	 * @param $hash string
	 *
	 * @throws MWException
	 */
	public static function addToQueue( $userId, $eventId, $priority, $hash ) {
		if ( !$userId || !$eventId ) {
			return;
		}

		$dbw = MWEchoDbFactory::getDB( DB_MASTER );

		$row = array(
			'eeb_user_id' => $userId,
			'eeb_event_id' => $eventId,
			'eeb_event_priority' => $priority,
			'eeb_event_hash' => $hash
		);

		$id = $dbw->nextSequenceValue( 'echo_email_batch_eeb_id' );

		if ( $id ) {
			$row['eeb_id'] = $id;
		}

		$dbw->insert(
			'echo_email_batch',
			$row,
			__METHOD__,
			array( 'IGNORE' )
		);
	}

	/**
	 * Get a list of users to be notified for the batch
	 *
	 * @param $startUserId int
	 * @param $batchSize int
	 *
	 * @throws MWException
	 * @return ResultWrapper|bool
	 */
	public static function getUsersToNotify( $startUserId, $batchSize ) {
		$dbr = MWEchoDbFactory::getDB( DB_SLAVE );
		$res = $dbr->select(
			array( 'echo_email_batch' ),
			array( 'eeb_user_id' ),
			array( 'eeb_user_id > ' . intval( $startUserId ) ),
			__METHOD__,
			array( 'ORDER BY' => 'eeb_user_id', 'LIMIT' => $batchSize )
		);

		return $res;
	}
}
