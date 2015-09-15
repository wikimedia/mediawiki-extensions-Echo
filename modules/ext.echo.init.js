( function ( mw, $ ) {
	'use strict';

	if ( mw.echo.Logger.static.clickThroughEnabled ) {
		mw.loader.using( 'ext.eventLogging', function () {
			mw.eventLog.setDefaults( 'EchoInteraction', {
				version: mw.config.get( 'wgEchoConfig' ).version,
				userId: +mw.config.get( 'wgUserId' ),
				editCount: +mw.config.get( 'wgUserEditCount' )
			} );
		} );
	}

	mw.echo.apiCallParams = {
		action: 'query',
		meta: 'notifications',
		// We have to send the API 'groupbysection' otherwise
		// the 'messageunreadfirst' doesn't do anything.
		// TODO: Fix the API.
		notgroupbysection: 1,
		notmessageunreadfirst: 1,
		notformat: 'flyout',
		notlimit: 25,
		notprop: 'index|list|count',
		uselang: mw.config.get( 'wgUserLanguage' )
	};

	// Activate ooui
	$( document ).ready( function () {
		var apiRequest, myWidget,
			$existingAlertLink = $( '#pt-notifications-alert a' ),
			$existingMessageLink = $( '#pt-notifications-message a' ),
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
		$( '.mw-echo-notification-badge-nojs' ).click( function () {
			var myType = $( this ).parent().prop( 'id' ) === 'pt-notifications-alert' ? 'alert' : 'message';
			// Dim the button while we load
			$( this ).addClass( 'mw-echo-notifications-badge-dimmed' );

			// Fire the notification API requests
			apiRequest = new mw.Api( { ajax: { cache: false } } ).get( $.extend( { notsections: myType }, mw.echo.apiCallParams ) );

			// Load the ui
			mw.loader.using( 'ext.echo.ui', function () {
				// Load message button and popup if messages exist
				if ( $existingMessageLink.length ) {
					mw.echo.ui.messageWidget = new mw.echo.ui.NotificationBadgeWidget( {
						type: 'message',
						markReadWhenSeen: false,
						numItems: numMessages,
						hasUnseen: hasUnseenMessages,
						badgeIcon: 'speechBubble',
						links: links
					} );
					// avoid late debouncedUpdateThemeClasses
					mw.echo.ui.messageWidget.debouncedUpdateThemeClasses();
					// Replace the link button with the ooui button
					$existingMessageLink.replaceWith( mw.echo.ui.messageWidget.$element );
				}

				// Load alerts popup and button
				mw.echo.ui.alertWidget = new mw.echo.ui.NotificationBadgeWidget( {
					type: 'alert',
					markReadWhenSeen: true,
					numItems: numAlerts,
					hasUnseen: hasUnseenAlerts,
					badgeIcon: {
						seen: 'bell',
						unseen: 'bellOn'
					},
					links: links
				} );
				// avoid late debouncedUpdateThemeClasses
				mw.echo.ui.alertWidget.debouncedUpdateThemeClasses();
				// Replace the link button with the ooui button
				$existingAlertLink.replaceWith( mw.echo.ui.alertWidget.$element );

				// HACK: Now that the module loaded, show the popup
				myWidget = myType === 'alert' ? mw.echo.ui.alertWidget : mw.echo.ui.messageWidget;
				myWidget.populateNotifications( apiRequest );
				myWidget.popup.toggle( true );
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
