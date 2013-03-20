<?php

/**
 * Handle user email batch ( daily/ weekly )
 */
abstract class MWEchoEmailBatch {

	// the user to be notified
	protected $mUser;

	// list of email content
	protected $content = array();
	// the last notification event of this batch
	protected $lastEvent;
	// the event count, this count is supported up to self::$displaySize + 1
	protected $count = 0;

	// number of events to include in an email, we couldn't include
	// all events in a batch email
	protected static $displaySize = 10;

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
	 * @return MWEchoEmailBatch/false
	 */
	public static function newFromUserId( $userId ) {
		$batchClassName = self::getEmailBatchClass();

		$user = User::newFromId( intval( $userId ) );

		$userEmailSetting = intval( $user->getOption( 'echo-email-frequency' ) );

		// clear all existing events if user decides not to receive emails
		if ( $userEmailSetting == -1 ) {
			$emailBatch = new $batchClassName( $user );
			$emailBatch->clearProcessedEvent();
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
			if ( wfTimestamp( TS_MW, $nextBatch ) > wfTimestampNow() ) {
				return false;
			}
		}

		return new $batchClassName( $user );
	}

	/**
	 * Get the name of the email batch class
	 * @return string
	 * @throws MWException
	 */
	private static function getEmailBatchClass() {
		global $wgEchoBackendName;

		$className = 'MW' . $wgEchoBackendName . 'EchoEmailBatch';

		if ( !class_exists( $className ) ) {
			throw new MWException( "$wgEchoBackendName email batch is not supported!" );
		}

		return $className;
	}

	/**
	 * Wrapper function that calls other functions required to process email batch
	 */
	public function process() {
		wfProfileIn( __METHOD__ );

		// if there is no event for this user, exist the process
		if ( !$this->setLastEvent() ) {
			return;
		}

		// get valid events
		$events = $this->getEvents();

		if ( $events ) {
			foreach( $events as $row ) {
				$this->count++;
				if ( $this->count > self::$displaySize ) {
					break;
				}
				$event = EchoEvent::newFromRow( $row );
				$this->appendContent( $event );
			}

			$this->sendEmail();
		}

		$this->clearProcessedEvent();
		$this->updateUserLastBatchTimestamp();

		wfProfileOut( __METHOD__ );
	}

	/**
	 * Set the last event of this batch, this is a cutoff point for clearing
	 * processed/invalid events
	 *
	 * @return bool true if event exists false otherwise
	 */
	abstract protected function setLastEvent();

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
	abstract protected function getEvents();

	/**
	 * Add individual event template to the big email content
	 */
	protected function appendContent( $event ) {
		// get the category for this event
		$category = $event->getCategory();

		$email = EchoNotificationController::formatNotification( $event, $this->mUser, 'email' );
		if ( !isset( $this->content[$category] ) ) {
			$this->content[$category] = array();
		}
		$this->content[$category][] = $email['batch-body'];
	}

	/**
	 * Concatenate the list of contents with 'echo-email-batch-separator'
	 * grouped by category
	 * @return string
	 */
	protected function listToText() {
		if ( !$this->content ) {
			return '';
		}

		$result = array();
		// build the text section for each category
		foreach( $this->content as $category => $notifs ) {
			$output = wfMessage( 'echo-email-batch-category-header' )->params(
					count( $notifs ),
					wfMessage( 'echo-category-title-' . $category )->text()
				)->text() . "\n";
			foreach( $notifs as $notif ) {
				$output .= "\n " . wfMessage( 'echo-email-batch-bullet' )->text() . ' ' . $notif;
			}
			$result[] = $output;
		}

		// for prepending and appending 'echo-email-batch-separator'
		$result = array_merge( array( '' ), $result, array( '' ) );

		return trim(
				implode(
					"\n\n" . wfMessage( 'echo-email-batch-separator' )->text() . "\n\n",
					$result
				)
			);
	}

	/**
	 * Clear "processed" events in the queue, processed could be: email sent, invalid, users do not want to receive emails
	 */
	abstract public function clearProcessedEvent();

	/**
	 * Send the batch email
	 */
	public function sendEmail() {
		global $wgPasswordSender, $wgPasswordSenderName, $wgEchoEmailFooterAddress;

		// global email footer
		$footer = wfMessage( 'echo-email-footer-default' )
				->inLanguage( $this->mUser->getOption( 'language' ) )
				->params( $wgEchoEmailFooterAddress, '' )
				->text();

		// @Todo - replace them with the CONSTANT in 33810 once it is merged 
		if ( $this->mUser->getOption( 'echo-email-frequency' ) == 7 ) {
			$frequency = 'weekly';
		} else {
			$frequency = 'daily';
		}

		// email subject
		if ( $this->count > self::$displaySize ) {
			$count = wfMessage( 'echo-notification-count' )->params( self::$displaySize )->text();
		} else {
			$count = $this->count;
		}
		$subject = wfMessage( 'echo-email-batch-subject-' . $frequency )->params( $count, $this->count )->text();
		$body = wfMessage( 'echo-email-batch-body-' . $frequency )->params(
				$this->mUser->getName(),
				$count,
				$this->count,
				$this->listToText(),
				$footer
			)->text();

		$adminAddress = new MailAddress( $wgPasswordSender, $wgPasswordSenderName );
		$address = new MailAddress( $this->mUser );

		$params = array(
			'to' => $address,
			'from' => $adminAddress,
			'subj' => $subject,
			'body' => $body,
			// no replyto
			'replyto' => ''
		);
		$job = new EmaillingJob( null, $params );
		JobQueueGroup::singleton()->push( $job );
	}

	/**
	 * Insert notification event into email queue
	 * @param $userId int
	 * @param $eventId int
	 * @param $priority int
	 */
	public static function addToQueue( $userId, $eventId, $priority ) {
		$batchClassName = self::getEmailBatchClass();

		if ( !method_exists( $batchClassName, 'actuallyAddToQueue' ) ) {
			throw new MWException( "$batchClassName must implement method actuallyAddToQueue()" );
		}

		$batchClassName::actuallyAddToQueue( $userId, $eventId, $priority );
	}

	/**
	 * Get a list of users to be notified for the batch
	 * @param $startUserId int
	 * @param $batchSize int
	 */
	public static function getUsersToNotify( $startUserId, $batchSize ) {
		$batchClassName = self::getEmailBatchClass();

		if ( !method_exists( $batchClassName, 'actuallyGetUsersToNotify' ) ) {
			throw new MWException( "$batchClassName must implement method actuallyGetUsersToNotify()" );
		}

		return $batchClassName::actuallyGetUsersToNotify( $startUserId, $batchSize );
	}
}
