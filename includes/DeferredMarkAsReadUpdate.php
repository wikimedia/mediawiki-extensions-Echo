<?php

/**
 * Mark event notifications as read at the end of a request.  Used to queue up
 * individual events to mark due to formatting failures or other uses.
 */
class EchoDeferredMarkAsReadUpdate implements DeferrableUpdate {
	/**
	 * @var array
	 */
	protected $events = array();

	/**
	 * @param EchoEvent $event
	 * @param User $user
	 */
	public static function add( EchoEvent $event, User $user ) {
		static $update;
		if ( $update === null ) {
			$update = new self();
			DeferredUpdates::addUpdate( $update );
		}
		$update->addInternal( $event, $user );
	}

	/**
	 * @param EchoEvent $event
	 * @param User $user
	 */
	private function addInternal( EchoEvent $event, User $user ) {
		$uid = $user->getId();
		if ( isset( $this->events[$uid] ) ) {
			$this->events[$uid]['eventIds'][] = $event->getId();
		} else {
			$this->events[$uid] = array(
				'user' => $user,
				'eventIds' => array( $event->getId() ),
			);
		}
	}

	/**
	 * Mark's all queue'd notifications as read.
	 * Satisfies DeferrableUpdate interface
	 */
	public function doUpdate() {
		foreach ( $this->events as $data ) {
			MWEchoNotifUser::newFromUser( $data['user'] )->markRead( $data['eventIds'] );
		}
		$this->events = array();
	}
}
