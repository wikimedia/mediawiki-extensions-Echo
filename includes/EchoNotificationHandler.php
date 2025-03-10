<?php

namespace MediaWiki\Extension\Notifications;

use MediaWiki\Extension\Notifications\Model\Event;
use MediaWiki\Notification\AgentAware;
use MediaWiki\Notification\Notification;
use MediaWiki\Notification\NotificationHandler;
use MediaWiki\Notification\RecipientSet;
use MediaWiki\Notification\TitleAware;
use MediaWiki\Page\PageIdentity;
use MediaWiki\User\UserIdentity;

class EchoNotificationHandler implements NotificationHandler {

	public function notify( Notification $notification, RecipientSet $recipients ): void {
		global $wgEchoNotifications;

		// If the type matches one of our event types, handle this event like an Echo event.
		if ( isset( $wgEchoNotifications[$notification->getType()] ) ) {
			$props = $notification->getProperties();

			$info = [];
			$info['type'] = $notification->getType();
			// New way of determining the Agent and Title
			if ( $notification instanceof AgentAware ) {
				$info['agent'] = $notification->getAgent();
			}
			if ( $notification instanceof TitleAware ) {
				$info['title'] = $notification->getTitle();
			}

			// Old way, decide whether to remove
			if ( isset( $props['agent'] ) && $props['agent'] instanceof UserIdentity ) {
				$info['agent'] = $props['agent'];
				unset( $props['agent'] );
			}
			if ( isset( $props['title'] ) && $props['title'] instanceof PageIdentity ) {
				$info['title'] = $props['title'];
				unset( $props['title'] );
			}
			// Registered event types implement a EchoEventPresentationModel instead of passing a message
			unset( $props['msg'] );

			// Pass all other custom props from core Notification in the extra array of Event
			$info['extra'] = $props;

			// Pass $recipients to Event instead of requiring it to be handled by Echo locators
			$info['extra'][Event::RECIPIENTS_IDX] =
				array_map( static fn ( $user ) => $user->getId(), $recipients->getRecipients() );

			Event::create( $info );
		}

		// TODO: Handle generic events not registered with Echo as well (T385839)
	}

}
