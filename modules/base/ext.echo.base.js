( function ( mw ) {
	'use strict';

	mw.echo = {

		clickThroughEnabled: mw.config.get( 'wgEchoConfig' ).eventlogging.EchoInteraction.enabled,

		/**
		 * Set up event logging for individual notification
		 * @param {JQuery} notification JQuery representing a single notification
		 * @param {string} context 'flyout'/'archive'
		 * @param {boolean} mobile True if interaction was on a mobile device
		 */
		setupNotificationLogging: function ( notification, context, mobile ) {
			var eventId = +notification.attr( 'data-notification-event' ),
				eventType = notification.attr( 'data-notification-type' );

			// Check if Schema:EchoInteraction is enabled
			if ( !mw.echo.clickThroughEnabled ) {
				return;
			}
			// Log the impression
			mw.echo.logInteraction( 'notification-impression', context, eventId, eventType, mobile );
			// Set up logging for clickthrough
			notification.find( 'a' ).click( function () {
				mw.echo.logInteraction( 'notification-link-click', context, eventId, eventType, mobile );
			} );
		},

		/**
		 * Log all Echo interaction related events
		 * @param {string} clickAction The interaction
		 * @param {string} context 'flyout'/'archive' or undefined for the badge
		 * @param {int} eventId Notification event id
		 * @param {string} eventType notification type
		 * @param {boolean} mobile True if interaction was on a mobile device
		 */
		logInteraction: function ( action, context, eventId, eventType, mobile ) {
			// Check if Schema:EchoInteraction is enabled
			if ( !mw.echo.clickThroughEnabled ) {
				return;
			}

			var myEvt = {
				action: action
			};

			// All the fields below are optional
			if ( context ) {
				myEvt.context = context;
			}
			if ( eventId ) {
				myEvt.eventId = eventId;
			}
			if ( eventType ) {
				myEvt.notificationType = eventType;
			}
			if ( mobile ) {
				myEvt.mobile = mobile;
			}
			mw.loader.using( 'ext.eventLogging', function() {
				mw.eventLog.logEvent( 'EchoInteraction', myEvt );
			} );
		}

	};

	if ( mw.echo.clickThroughEnabled ) {
		mw.loader.using( 'ext.eventLogging', function() {
			mw.eventLog.setDefaults( 'EchoInteraction', {
				version: mw.config.get( 'wgEchoConfig' ).version,
				userId: +mw.config.get( 'wgUserId' ),
				editCount: +mw.config.get( 'wgUserEditCount' )
			} );
		} );
	}
} )( mediaWiki );
