/* eslint-disable no-jquery/no-global-selector */
( function () {
	'use strict';

	// Remove ?markasread=XYZ from the URL
	var uri = new mw.Uri();
	if ( uri.query.markasread !== undefined ) {
		delete uri.query.markasread;
		delete uri.query.markasreadwiki;
		window.history.replaceState( null, document.title, uri );
	}

	mw.echo = mw.echo || {};
	mw.echo.config = mw.echo.config || {};
	// Set default max prioritized action links per item
	mw.echo.config.maxPrioritizedActions = 2;

	// Activate ooui
	$( function () {
		var selectedWidget,
			echoApi,
			messageController,
			alertController,
			messageModelManager,
			alertModelManager,
			unreadMessageCounter,
			unreadAlertCounter,
			maxNotificationCount = mw.config.get( 'wgEchoMaxNotificationCount' ),
			pollingRate = mw.config.get( 'wgEchoPollForUpdates' ),
			documentTitle = document.title,
			$existingAlertLink = $( '#pt-notifications-alert a' ),
			$existingMessageLink = $( '#pt-notifications-notice a' ),
			numAlerts = $existingAlertLink.attr( 'data-counter-num' ),
			numMessages = $existingMessageLink.attr( 'data-counter-num' ),
			badgeLabelAlerts = $existingAlertLink.attr( 'data-counter-text' ),
			badgeLabelMessages = $existingMessageLink.attr( 'data-counter-text' ),
			hasUnseenAlerts = $existingAlertLink.hasClass( 'mw-echo-unseen-notifications' ),
			hasUnseenMessages = $existingMessageLink.hasClass( 'mw-echo-unseen-notifications' ),
			alertCount = parseInt( numAlerts ),
			messageCount = parseInt( numMessages ),
			loadingPromise = null,
			// Store links
			links = {
				notifications: $existingAlertLink.attr( 'href' ) || mw.util.getUrl( 'Special:Notifications' ),
				preferences: ( $( '#pt-preferences a' ).attr( 'href' ) || mw.util.getUrl( 'Special:Preferences' ) ) +
					'#mw-prefsection-echo'
			};

		function updateDocumentTitleWithNotificationCount( totalAlertCount, totalMessageCount ) {
			var totalCount = totalAlertCount + totalMessageCount,
				convertedTotalCount,
				newTitle = documentTitle;

			if ( totalCount > 0 ) {
				convertedTotalCount = totalCount <= maxNotificationCount ? totalCount : maxNotificationCount + 1;
				convertedTotalCount = mw.msg( 'echo-badge-count', mw.language.convertNumber( convertedTotalCount ) );
				newTitle = mw.msg( 'parentheses', convertedTotalCount ) + ' ' + documentTitle;
			}
			document.title = newTitle;
		}

		// change document title on initialization only when polling rate(feature flag) is non-zero.
		if ( pollingRate !== 0 ) {
			updateDocumentTitleWithNotificationCount( alertCount, messageCount );
		}

		function loadEcho() {
			if ( loadingPromise !== null ) {
				return loadingPromise;
			}
			// This part executes only once, either when header icons are clicked or after completion of 60secs whichever occur first.
			echoApi = new mw.echo.api.EchoApi();

			loadingPromise = mw.loader.using( 'ext.echo.ui.desktop' ).then( function () {

				// Overlay
				$( 'body' ).append( mw.echo.ui.$overlay );

				unreadAlertCounter = new mw.echo.dm.UnreadNotificationCounter( echoApi, 'alert', maxNotificationCount );
				alertModelManager = new mw.echo.dm.ModelManager( unreadAlertCounter, { type: 'alert' } );
				alertController = new mw.echo.Controller( echoApi, alertModelManager );

				mw.echo.ui.alertWidget = new mw.echo.ui.NotificationBadgeWidget(
					alertController,
					alertModelManager,
					links,
					{
						numItems: Number( numAlerts ),
						convertedNumber: badgeLabelAlerts,
						hasUnseen: hasUnseenAlerts,
						badgeIcon: 'bell',
						$overlay: mw.echo.ui.$overlay,
						href: $existingAlertLink.attr( 'href' )
					}
				);

				// Replace the link button with the ooui button
				$existingAlertLink.parent().replaceWith( mw.echo.ui.alertWidget.$element );

				alertModelManager.on( 'allTalkRead', function () {
					// If there was a talk page notification, get rid of it
					$( '#pt-mytalk a' )
						.removeClass( 'mw-echo-alert' )
						.text( mw.msg( 'mytalk' ) );
				} );

				// listen to event countChange and change title only if polling rate is non-zero
				if ( pollingRate !== 0 ) {
					alertModelManager.getUnreadCounter().on( 'countChange', function ( count ) {
						alertCount = count;
						updateDocumentTitleWithNotificationCount( count, messageCount );
					} );
				}

				// Load message button and popup if messages exist
				if ( $existingMessageLink.length ) {
					unreadMessageCounter = new mw.echo.dm.UnreadNotificationCounter( echoApi, 'message', maxNotificationCount );
					messageModelManager = new mw.echo.dm.ModelManager( unreadMessageCounter, { type: 'message' } );
					messageController = new mw.echo.Controller( echoApi, messageModelManager );

					mw.echo.ui.messageWidget = new mw.echo.ui.NotificationBadgeWidget(
						messageController,
						messageModelManager,
						links,
						{
							$overlay: mw.echo.ui.$overlay,
							numItems: Number( numMessages ),
							hasUnseen: hasUnseenMessages,
							badgeIcon: 'tray',
							convertedNumber: badgeLabelMessages,
							href: $existingMessageLink.attr( 'href' )
						}
					);

					// Replace the link button with the ooui button
					$existingMessageLink.parent().replaceWith( mw.echo.ui.messageWidget.$element );

					// listen to event countChange and change title only if polling rate is non-zero
					if ( pollingRate !== 0 ) {
						messageModelManager.getUnreadCounter().on( 'countChange', function ( count ) {
							messageCount = count;
							updateDocumentTitleWithNotificationCount( alertCount, count );
						} );
					}
				}
			} );
			return loadingPromise;

		}

		// Respond to click on the notification button and load the UI on demand
		$( '.mw-echo-notification-badge-nojs' ).on( 'click', function ( e ) {
			var timeOfClick = mw.now(),
				clickedSection = $( this ).parent().prop( 'id' ) === 'pt-notifications-alert' ? 'alert' : 'message';
			if ( e.which !== 1 || $( this ).data( 'clicked' ) ) {
				return false;
			}

			$( this ).data( 'clicked', true );

			// Dim the button while we load
			$( this ).addClass( 'mw-echo-notifications-badge-dimmed' );

			// Fire the notification API requests
			echoApi = new mw.echo.api.EchoApi();
			echoApi.fetchNotifications( clickedSection )
				.then( function ( data ) {
					mw.track( 'timing.MediaWiki.echo.overlay.api', mw.now() - timeOfClick );
					return data;
				} );

			loadEcho().then( function () {
				// Now that the module loaded, show the popup
				selectedWidget = clickedSection === 'alert' ? mw.echo.ui.alertWidget : mw.echo.ui.messageWidget;
				selectedWidget.once( 'finishLoading', function () {
					// Log timing after notifications are shown
					mw.track( 'timing.MediaWiki.echo.overlay', mw.now() - timeOfClick );
				} );
				selectedWidget.popup.toggle( true );
				mw.track( 'timing.MediaWiki.echo.overlay.ooui', mw.now() - timeOfClick );

				if ( hasUnseenAlerts || hasUnseenMessages ) {
					// Clicked on the flyout due to having unread notifications
					mw.track( 'counter.MediaWiki.echo.unseen.click' );
				}
			} );
			// Prevent default
			return false;
		} );

		function pollForNotificationCountUpdates() {
			alertController.refreshUnreadCount();
			messageController.refreshUnreadCount();
			// Make notification update after n*pollingRate(time in secs) where n depends on document.hidden
			setTimeout( pollForNotificationCountUpdates, ( document.hidden ? 5 : 1 ) * pollingRate * 1000 );
		}

		function pollStart() {
			if ( mw.config.get( 'skin' ) !== 'minerva' && pollingRate !== 0 ) {
				// load widgets if not loaded already then start polling
				loadEcho().then( pollForNotificationCountUpdates );
			}
		}

		setTimeout( pollStart, 60 * 1000 );

	} );

}() );
