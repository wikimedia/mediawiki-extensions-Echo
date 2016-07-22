( function ( mw, $ ) {
	'use strict';

	// Remove ?markasread=XYZ from the URL
	var uri = new mw.Uri();
	if ( uri.query.markasread !== undefined ) {
		delete uri.query.markasread;
		window.history.replaceState( null, document.title, uri );
	}

	mw.echo = mw.echo || {};

	// Activate ooui
	$( document ).ready( function () {
		var myWidget, echoApi,
			$existingAlertLink = $( '#pt-notifications-alert a' ),
			$existingMessageLink = $( '#pt-notifications-notice a' ),
			numAlerts = $existingAlertLink.text(),
			numMessages = $existingMessageLink.text(),
			hasUnseenAlerts = $existingAlertLink.hasClass( 'mw-echo-unseen-notifications' ),
			hasUnseenMessages = $existingMessageLink.hasClass( 'mw-echo-unseen-notifications' ),
			// Store links
			links = {
				notifications: $( '#pt-notifications-alert a' ).attr( 'href' ),
				preferences: $( '#pt-preferences a' ).attr( 'href' ) + '#mw-prefsection-echo'
			};

		// Respond to click on the notification button and load the UI on demand
		$( '.mw-echo-notification-badge-nojs' ).click( function ( e ) {
			var time = mw.now(),
				myType = $( this ).parent().prop( 'id' ) === 'pt-notifications-alert' ? 'alert' : 'message';

			if ( e.which !== 1 ) {
				return;
			}

			// Dim the button while we load
			$( this ).addClass( 'mw-echo-notifications-badge-dimmed' );

			// Fire the notification API requests
			echoApi = new mw.echo.api.EchoApi( { bundle: true } );
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
					messageController = new mw.echo.Controller(
						echoApi,
						messageModelManager,
						{
							type: [ 'message' ]
						}
					);

					mw.echo.ui.messageWidget = new mw.echo.ui.NotificationBadgeWidget(
						messageController,
						messageModelManager,
						{
							$overlay: mw.echo.ui.$overlay,
							numItems: numMessages,
							hasUnseen: hasUnseenMessages,
							badgeIcon: 'speechBubbles',
							links: links,
							href: $existingMessageLink.attr( 'href' )
						}
					);
					// HACK: avoid late debouncedUpdateThemeClasses
					mw.echo.ui.messageWidget.badgeButton.debouncedUpdateThemeClasses();
					// Replace the link button with the ooui button
					$existingMessageLink.parent().replaceWith( mw.echo.ui.messageWidget.$element );

					messageModelManager.on( 'allTalkRead', function () {
						// If there was a talk page notification, get rid of it
						$( '#pt-mytalk a' )
							.removeClass( 'mw-echo-alert' )
							.text( mw.msg( 'mytalk' ) );
					} );
				}
				unreadAlertCounter = new mw.echo.dm.UnreadNotificationCounter( echoApi, 'alert', maxNotificationCount );
				alertModelManager = new mw.echo.dm.ModelManager( unreadAlertCounter, { type: 'alert' } );
				alertController = new mw.echo.Controller(
					echoApi,
					alertModelManager,
					{
						type: [ 'alert' ]
					}
				);

				mw.echo.ui.alertWidget = new mw.echo.ui.NotificationBadgeWidget(
					alertController,
					alertModelManager,
					{
						numItems: numAlerts,
						hasUnseen: hasUnseenAlerts,
						badgeIcon: {
							seen: 'bell',
							unseen: 'bellOn'
						},
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

				// HACK: avoid late debouncedUpdateThemeClasses
				mw.echo.ui.alertWidget.badgeButton.debouncedUpdateThemeClasses();
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

} )( mediaWiki, jQuery );
