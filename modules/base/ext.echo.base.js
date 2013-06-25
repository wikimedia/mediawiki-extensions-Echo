( function ( $, mw ) {
	/*global alert */
	'use strict';

	mw.echo = {

		optionsToken: '',

		dismissOutputFormats: ['web', 'email'],

		clickThroughEnabled: mw.config.get( 'wgEchoConfig' ).eventlogging.EchoInteraction.enabled,

		/**
		 * Set up event logging for individual notification
		 * @param {JQuery} notification JQuery representing a single notification
		 * @param {string} context 'flyout'/'archive'
		 */
		setupNotificationLogging: function ( notification, context ) {
			var eventId = +notification.attr( 'data-notification-event' ),
				eventType = notification.attr( 'data-notification-type' );

			// Check if Schema:EchoInteraction is enabled
			if ( !mw.echo.clickThroughEnabled ) {
				return;
			}
			// Log the impression
			mw.echo.logInteraction( 'notification-impression', context, eventId, eventType );
			// Set up logging for clickthrough
			notification.find( 'a' ).click( function () {
				mw.echo.logInteraction( 'notification-link-click', context, eventId, eventType );
			} );
		},

		/**
		 * Log all Echo interaction related events
		 * @param {string} clickAction The interaction
		 * @param {string} context 'flyout'/'archive' or undefined for the badge
		 * @param {int} eventId Notification event id
		 * @param {string} eventType notification type
		 */
		logInteraction: function ( action, context, eventId, eventType ) {
			// Check if Schema:EchoInteraction is enabled
			if ( !mw.echo.clickThroughEnabled ) {
				return;
			}

			var myEvt = {
				action: action
			};

			// All the three fields below are optional
			if ( context ) {
				myEvt.context = context;
			}
			if ( eventId ) {
				myEvt.eventId = eventId;
			}
			if ( eventType ) {
				myEvt.notificationType = eventType;
			}

			mw.eventLog.logEvent( 'EchoInteraction', myEvt );
		},

		/**
		 * Change the user's preferences related to this notification type and
		 * reload the page.
		 */
		dismiss: function ( notification ) {
			var $notification = $( notification ),
				eventCategory = $notification.attr( 'data-notification-category' ),
				prefName = '',
				prefs = [];
			$.each( mw.echo.dismissOutputFormats, function ( index, format ) {
				// Make sure output format pref exists for this event type
				prefName = 'echo-subscriptions-' + format + '-' + eventCategory;
				if ( mw.user.options.exists( prefName ) ) {
					prefs.push( prefName + '=0' );
				}
			} );
			( new mw.Api() ).post( {
				action: 'options',
				change: prefs.join( '|' ),
				token: mw.echo.optionsToken
			} ).done( function () {
				// If we're on the Notifications archive page, just refresh the page
				if ( mw.config.get( 'wgCanonicalNamespace' ) === 'Special' &&
					mw.config.get( 'wgCanonicalSpecialPageName' ) === 'Notifications'
				) {
					window.location.reload();
				} else {
					eventCategory = $notification.attr( 'data-notification-category' );
					$( '.mw-echo-overlay li[data-notification-category="' + eventCategory + '"]' ).hide();
					$notification.data( 'dismiss', false );
				}
			} ).fail( function () {
				alert( mw.msg( 'echo-error-preference' ) );
			} );
		},

		/**
		 * Handle clicking the Dismiss button.
		 * First we have to retrieve the options token.
		 */
		setOptionsToken: function ( callback, notification ) {
			if ( mw.echo.optionsToken ) {
				callback( notification );
			} else {
				( new mw.Api() ).get( {
					action: 'tokens',
					type : 'options'
				} ).done( function ( data ) {
					if ( data.tokens.optionstoken === undefined ) {
						alert( mw.msg( 'echo-error-token' ) );
					} else {
						mw.echo.optionsToken = data.tokens.optionstoken;
						callback( notification );
					}
				} ).fail( function () {
					alert( mw.msg( 'echo-error-token' ) );
				} );
			}
		},

		/**
		 * Show the dismiss interface (Dismiss and Cancel buttons).
		 */
		showDismissOption: function ( closeBox ) {
			var $notification = $( closeBox ).parent();
			$( closeBox ).hide();
			$notification.data( 'dismiss', true );
			$notification.height( $notification.find( '.mw-echo-dismiss' ).height() - 10 );
			$notification.find( '.mw-echo-dismiss' )
				// Make sure the dismiss interface exactly covers the notification
				// Icon adds 45px to the notification
				.width( $notification.width() - 45 )
				.show();
			// Temprorarily ungrey-out read notifications
			if ( !$notification.hasClass( 'mw-echo-unread' ) ) {
				$notification.find( '.mw-echo-state' ).css( 'filter', 'alpha(opacity=100)' );
				$notification.find( '.mw-echo-state' ).css( 'opacity', '1.0' );
			}
		},

		setUpDismissability: function ( notification ) {
			var $dismissButton,
				$cancelButton,
				$closebox,
				$notification = $( notification );

			// Add dismiss box
			$closebox = $( '<div/>' )
				.addClass( 'mw-echo-close-box' )
				.css( 'display', 'none' )
				.click( function () {
					mw.echo.showDismissOption( this );
				} );
			$notification.append( $closebox );

			// Add dismiss and cancel buttons
			$dismissButton = $( '<button/>' )
				.text( mw.msg( 'echo-dismiss-button' ) )
				.addClass( 'mw-echo-dismiss-button' )
				.addClass( 'ui-button-blue' )
				.button( {
					icons: { primary: 'ui-icon-closethick' }
				} )
				.click( function () {
					mw.echo.setOptionsToken( mw.echo.dismiss, $notification );
				} );
			$cancelButton = $( '<a/>' )
				.text( mw.msg( 'cancel' ) )
				.addClass( 'mw-echo-cancel-link' )
				.click( function () {
					$notification.data( 'dismiss', false );
					$notification.find( '.mw-echo-dismiss' ).hide();
					$notification.css( 'height', 'auto' );
					$closebox.show();
				} );
			$notification.find( '.mw-echo-dismiss' )
				.append( $dismissButton )
				.append( $cancelButton );

			// Make each notification hot for dismissability
			$notification.hover(
				function () {
					if ( !$( this ).data( 'dismiss' ) ) {
						$( this ).find( '.mw-echo-close-box' ).show();
					}
				},
				function () {
					if ( !$( this ).data( 'dismiss' ) ) {
						$( this ).find( '.mw-echo-close-box' ).hide();
					}
				}
			);
		}

	};

	if ( mw.echo.clickThroughEnabled ) {
		mw.eventLog.setDefaults( 'EchoInteraction', {
			version: mw.config.get( 'wgEchoConfig' ).version,
			userId: +mw.config.get( 'wgUserId' ),
			editCount: +mw.config.get( 'wgUserEditCount' )
		} );
	}
} )( jQuery, mediaWiki );
