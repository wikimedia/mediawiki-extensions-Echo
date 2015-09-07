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

	// Activate ooui
	$( document ).ready( function () {
		var $existingAlertLink = $( '#pt-notifications-alert a' ),
			$existingMessageLink = $( '#pt-notifications-message a' ),
			numAlerts = $existingAlertLink.text(),
			numMessages = $existingMessageLink.text(),
			hasUnseenAlerts = $existingAlertLink.hasClass( 'mw-echo-unseen-notifications' ),
			hasUnseenMessages = $existingMessageLink.hasClass( 'mw-echo-unseen-notifications' ),
			// Store links
			links = {
				notifications: $( '#pt-notifications_message a' ).attr( 'href' ),
				preferences: $( '#pt-preferences a' ).attr( 'href' )
			};

		if ( $existingMessageLink.length ) {
			mw.echo.ui.messageWidget = new mw.echo.ui.NotificationBadgeWidget( {
				type: 'message',
				markReadWhenSeen: false,
				numItems: numMessages,
				hasUnseen: hasUnseenMessages,
				badgeIcon: 'speechBubble',
				links: links
			} );
			$existingMessageLink.replaceWith( mw.echo.ui.messageWidget.$element );
		}

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
		$existingAlertLink.replaceWith( mw.echo.ui.alertWidget.$element );
	} );

} )( mediaWiki, jQuery );
