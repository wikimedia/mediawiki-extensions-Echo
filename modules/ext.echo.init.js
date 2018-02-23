( function ( mw, $ ) {
	'use strict';

	// Remove ?markasread=XYZ from the URL
	var uri = new mw.Uri();
	if ( uri.query.markasread !== undefined ) {
		delete uri.query.markasread;
		window.history.replaceState( null, document.title, uri );
	}

	mw.echo = mw.echo || {};
	mw.echo.config = mw.echo.config || {};
	// Set default max prioritized action links per item
	mw.echo.config.maxPrioritizedActions = 2;

	// Activate ooui
	$( function () {
		var myWidget, echoApi,
			$existingAlertLink = $( '#pt-notifications-alert a' ),
			$existingMessageLink = $( '#pt-notifications-notice a' ),
			numAlerts = $existingAlertLink.attr( 'data-counter-num' ),
			numMessages = $existingMessageLink.attr( 'data-counter-num' ),
			badgeLabelAlerts = $existingAlertLink.attr( 'data-counter-text' ),
			badgeLabelMessages = $existingMessageLink.attr( 'data-counter-text' ),
			hasUnseenAlerts = $existingAlertLink.hasClass( 'mw-echo-unseen-notifications' ),
			hasUnseenMessages = $existingMessageLink.hasClass( 'mw-echo-unseen-notifications' ),
			// Store links
			links = {
				notifications: $( '#pt-notifications-alert a' ).attr( 'href' ) || mw.util.getUrl( 'Special:Notifications' ),
				preferences: ( $( '#pt-preferences a' ).attr( 'href' ) || mw.util.getUrl( 'Special:Preferences' ) ) +
					'#mw-prefsection-echo'
			};

		// Respond to click on the notification button and load the UI on demand
		$( '.mw-echo-notification-badge-nojs' ).click( function ( e ) {
			var time = mw.now(),
				myType = $( this ).parent().prop( 'id' ) === 'pt-notifications-alert' ? 'alert' : 'message';

			if ( e.which !== 1 || $( this ).data( 'clicked' ) ) {
				return false;
			}

			$( this ).data( 'clicked', true );

			// Dim the button while we load
			$( this ).addClass( 'mw-echo-notifications-badge-dimmed' );

			// Fire the notification API requests
			echoApi = new mw.echo.api.EchoApi();
			echoApi.fetchNotifications( myType )
				.then( function ( data ) {
					mw.track( 'timing.MediaWiki.echo.overlay.api', mw.now() - time );
					return data;
				} );

			// Load the ui
			mw.loader.using( 'ext.echo.ui.desktop', function () {
				var messageController,
					alertController,
					messageModelManager,
					alertModelManager,
					unreadMessageCounter,
					unreadAlertCounter,
					maxNotificationCount = mw.config.get( 'wgEchoMaxNotificationCount' );

				// Overlay
				$( 'body' ).append( mw.echo.ui.$overlay );
				// Load message button and popup if messages exist
				if ( $existingMessageLink.length ) {
					unreadMessageCounter = new mw.echo.dm.UnreadNotificationCounter( echoApi, 'message', maxNotificationCount );
					messageModelManager = new mw.echo.dm.ModelManager( unreadMessageCounter, { type: 'message' } );
					messageController = new mw.echo.Controller( echoApi, messageModelManager );

					mw.echo.ui.messageWidget = new mw.echo.ui.NotificationBadgeWidget(
						messageController,
						messageModelManager,
						{
							$overlay: mw.echo.ui.$overlay,
							numItems: Number( numMessages ),
							hasUnseen: hasUnseenMessages,
							badgeIcon: 'tray',
							convertedNumber: badgeLabelMessages,
							links: links,
							href: $existingMessageLink.attr( 'href' )
						}
					);
					// Replace the link button with the ooui button
					$existingMessageLink.parent().replaceWith( mw.echo.ui.messageWidget.$element );
				}
				unreadAlertCounter = new mw.echo.dm.UnreadNotificationCounter( echoApi, 'alert', maxNotificationCount );
				alertModelManager = new mw.echo.dm.ModelManager( unreadAlertCounter, { type: 'alert' } );
				alertController = new mw.echo.Controller( echoApi, alertModelManager );

				mw.echo.ui.alertWidget = new mw.echo.ui.NotificationBadgeWidget(
					alertController,
					alertModelManager,
					{
						numItems: Number( numAlerts ),
						convertedNumber: badgeLabelAlerts,
						hasUnseen: hasUnseenAlerts,
						badgeIcon: 'bell',
						links: links,
						$overlay: mw.echo.ui.$overlay,
						href: $existingAlertLink.attr( 'href' )
					}
				);

				alertModelManager.on( 'allTalkRead', function () {
					// If there was a talk page notification, get rid of it
					$( '#pt-mytalk a' )
						.removeClass( 'mw-echo-alert' )
						.text( mw.msg( 'mytalk' ) );
				} );

				// Replace the link button with the ooui button
				$existingAlertLink.parent().replaceWith( mw.echo.ui.alertWidget.$element );

				// HACK: Now that the module loaded, show the popup
				myWidget = myType === 'alert' ? mw.echo.ui.alertWidget : mw.echo.ui.messageWidget;
				myWidget.once( 'finishLoading', function () {
					// Log timing after notifications are shown
					mw.track( 'timing.MediaWiki.echo.overlay', mw.now() - time );
				} );
				myWidget.popup.toggle( true );
				mw.track( 'timing.MediaWiki.echo.overlay.ooui', mw.now() - time );
			} );

			if ( hasUnseenAlerts || hasUnseenMessages ) {
				// Clicked on the flyout due to having unread notifications
				mw.track( 'counter.MediaWiki.echo.unseen.click' );
			}

			// Prevent default
			return false;
		} );
	} );

}( mediaWiki, jQuery ) );
