<?php

/**
 * This class handles email bundling, it has only two public interfacing entries:
 *
 * 1. a single notification is triggered which calls self::addToEmailBatch()
 *    (a) cycle is null/reset, send single notification, schedule a bundle job for next notification
 *    (b) cycle is in bundle mode, add the notification to the queue
 *
 * 2. a job is popped off the queue which calls self::processBundleEmail()
 *
 */
abstract class MWEchoEmailBundler {

	/**
	 * @var User
	 */
	protected $mUser;

	/**
	 * @var string
	 */
	protected $bundleHash;

	/**
	 * @var string
	 *
	 * The timestamp of email being sent
	 */
	protected $timestamp;

	/**
	 * @var Event
	 */
	protected $baseEvent;

	/**
	 * @var int
	 *
	 * seconds between sending batch email for a bundle notification
	 * this only applies to a bundle type
	 */
	protected $emailInterval;

	/**
	 * Private constructor
	 */
	private function __construct( $user, $hash ) {
		global $wgEchoBundleEmailInterval;

		$this->mUser = $user;
		$this->bundleHash = $hash;
		$this->emailInterval = $wgEchoBundleEmailInterval;

		if ( $this->emailInterval < 0 ) {
			$this->emailInterval = 0;
		}
	}

	/**
	 * Get the name of the email batch class
	 * @return string
	 * @throws MWException
	 */
	private static function getEmailBundlerClass() {
		global $wgEchoBackendName;

		$className = 'MW' . $wgEchoBackendName . 'EchoEmailBundler';

		if ( !class_exists( $className ) ) {
			throw new MWException( "$wgEchoBackendName email bundler is not supported!" );
		}

		return $className;
	}

	/**
	 * Factory method
	 */
	public static function newFromUserHash( User $user, $hash ) {
		if ( !$user->getId() ) {
			return false;
		}
		if ( !$hash || !preg_match( '/^[a-f0-9]{32}$/', $hash ) ) {
			return false;
		}
		$className = self::getEmailBundlerClass();
		return new $className( $user, $hash );
	}

	/**
	 * Check if a new notification should be added to the batch queue
	 * true  - added to the queue for bundling email
	 * false - not added, the client should send single email
	 * @return bool
	 */
	public function addToEmailBatch( $eventId, $eventPriority ) {
		$this->retrieveLastEmailTimestamp();
		$this->retrieveBaseEvent();

		// send instant single notification email if there is no base event in the batch queue
		// and the email is ready to send, otherwiase, add the email to batch and schedule
		// a delayed job
		if ( !$this->baseEvent && $this->shouldSendEmailNow() ) {
			$this->timestamp = wfTimestampNow();
			$this->updateEmailMetadata();
			return false;
		} else {
			// add to email batch queue
			MWEchoEmailBatch::addToQueue(
				$this->mUser->getId(),
				$eventId,
				$eventPriority,
				$this->bundleHash
			);

			// always push the job to job queue in case the previous job
			// was lost, job queue will ignore duplicate
			$this->pushToJobQueue( $this->getDelayTime() );
			return true;
		}
	}

	/**
	 * Get the time diff since last email
	 */
	protected function timeSinceLastEmail() {
		// if there is no timestamp, next email should be sent right away
		// set the time diff longer than the email interval
		if ( !$this->timestamp ) {
			return $this->emailInterval + 600;
		}

		$now = wfTimestamp( TS_UNIX );

		return $now - wfTimestamp( TS_UNIX, $this->timestamp );
	}

	/**
	 * Check if an email should be sent right away
	 * @return bool
	 */
	protected function shouldSendEmailNow() {
		if ( $this->timeSinceLastEmail() > $this->emailInterval ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Get the delay time
	 * @return int
	 */
	protected function getDelayTime() {
		$delay = $this->emailInterval - $this->timeSinceLastEmail();
		if ( $delay <= 0 ) {
			$delay = 0;
		}
		return $delay;
	}

	/**
	 * Get the timestamp of last email
	 */
	protected function retrieveLastEmailTimestamp() {
		global $wgMemc;

		$data = $wgMemc->get( $this->getMemcacheKey() );
		if ( $data !== false ) {
			$this->timestamp = $data['timestamp'];
		}
	}

	/**
	 * Get the memcache key
	 * @return string
	 */
	protected function getMemcacheKey() {
		return wfMemcKey( 'echo', 'email_bundle_status', $this->mUser->getId(), $this->bundleHash );
	}

	/**
	 * Retrieve the base event for email bundling
	 * @return bool
	 */
	abstract protected function retrieveBaseEvent();

	/**
	 * Push the latest bundle data to the queue
	 * @param $delay int To delay the job in $delay seconds
	 */
	public function pushToJobQueue( $delay = 0 ) {
		$title = Title::newMainPage();
		$job = new MWEchoNotificationEmailBundleJob(
			$title,
			array(
				'user_id' => $this->mUser->getId(),
				'bundle_hash' => $this->bundleHash,
				'jobReleaseTimestamp' => wfTimestamp( TS_MW, wfTimestamp( TS_UNIX ) + $delay )
			)
		);
		JobQueueGroup::singleton()->push( $job );
	}

	/**
	 * Main function for processinig bundle email
	 */
	public function processBundleEmail() {
		$emailSetting = intval( $this->mUser->getOption( 'echo-email-frequency' ) );

		// User has switched to email digest or decided not to receive email,
		// the daily cron will handle events left in the queue
		if ( $emailSetting != 0 ) {
			throw new MWException( "User has switched to email digest/no email option!" );
		}

		// If there is nothing in the queue, do not update timestamp so next
		// email would be just an instant email
		if ( $this->retrieveBaseEvent() ) {
			$this->timestamp = wfTimestampNow();
			$this->updateEmailMetadata();
			$this->sendEmail();
			$this->clearProcessedEvent();
		} else {
			throw new MWException( "There is no bundle notification to process!" );
		}
	}

	/**
	 * Send the bundle email
	 */
	protected function sendEmail() {
		$content = $this->generateEmailContent();

		if ( !isset( $content['subject'] ) || !isset( $content['body'] ) ) {
			throw new MWException( "Fail to create bundle email content!" );
		}

		global $wgNotificationSender, $wgNotificationSenderName, $wgNotificationReplyName;

		$toAddress = new MailAddress( $this->mUser );
		$fromAddress = new MailAddress( $wgNotificationSender, $wgNotificationSenderName );
		$replyAddress = new MailAddress( $wgNotificationSender, $wgNotificationReplyName );

		// Schedule a email job or just send the email directly?
		UserMailer::send( $toAddress, $fromAddress, $content['subject'], $content['body'], $replyAddress );
		MWEchoEventLogging::logSchemaEchoMail( $this->mUser, 'bundle' );
	}

	/**
	 * Generate the content for bundle email
	 * @return string
	 */
	protected function generateEmailContent() {
		if ( !$this->baseEvent ) {
			return '';
		}
		$this->baseEvent->setBundleHash( $this->bundleHash );
		return EchoNotificationController::formatNotification( $this->baseEvent, $this->mUser, 'email', 'email' );
	}

	/**
	 * Update bundle email metadata for user/hash pair
	 */
	protected function updateEmailMetadata() {
		global $wgMemc;

		$key = $this->getMemcacheKey();

		// Delete existing data
		$wgMemc->delete( $key );
		// Store new data and make it expire in 7 days
		$wgMemc->set(
			$key,
			array(
				'timestamp' => $this->timestamp
			),
			3600 * 24 * 7
		);
	}

	/**
	 * clear processed event in the queue
	 */
	abstract protected function clearProcessedEvent();

}
