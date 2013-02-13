( function ( $, mw ) {
	'use strict';

	mw.echo = {

		'optionsToken': '',

		/**
		 * Change the user's preferences related to this notification type and
		 * reload the page.
		 */
		'dismiss': function( notification ) {
			var _this = this,
				$notification = $( notification ),
				eventType = $notification.attr( 'data-notification-type' ),
				change = 'echo-web-notifications' + eventType + '=0',
				prefRequest = {
					'action': 'options',
					'change': change,
					'token': mw.echo.optionsToken,
					'format': 'json'
				};
			$.ajax( {
				type: 'post',
				url: mw.util.wikiScript( 'api' ),
				data: prefRequest,
				dataType: 'json',
				success: function( data ) {
					// If we're on the Notifications archive page, just refresh the page
					if ( mw.config.get( 'wgCanonicalNamespace' ) === 'Special'
						&& mw.config.get( 'wgCanonicalSpecialPageName' ) === 'Notifications' )
					{
						window.location.reload();
					} else {
						eventType = $notification.attr( 'data-notification-type' );
						$( '.mw-echo-overlay li[data-notification-type="' + eventType + '"]' ).hide();
						$notification.data( 'dismiss', false );
					}
				},
				error: function() {
					alert( mw.msg( 'echo-error-preference' ) );
				}
			} );
		},

		/**
		 * Handle clicking the Dismiss button.
		 * First we have to retrieve the options token.
		 */
		'setOptionsToken': function( callback, notification ) {
			var _this = this;
			var tokenRequest = {
				'action': 'tokens',
				'type' : 'options',
				'format': 'json'
			};
			if ( this.optionsToken ) {
				callback( notification );
			} else {
				$.ajax( {
					type: 'get',
					url: mw.util.wikiScript( 'api' ),
					data: tokenRequest,
					dataType: 'json',
					success: function( data ) {
						if ( typeof data.tokens.optionstoken === 'undefined' ) {
							alert( mw.msg( 'echo-error-token' ) );
						} else {
							_this.optionsToken = data.tokens.optionstoken;
							callback( notification );
						}
					},
					error: function() {
						alert( mw.msg( 'echo-error-token' ) );
					}
				} );
			}
		},

		/**
		 * Show the dismiss interface (Dismiss and Cancel buttons).
		 */
		'showDismissOption': function( closeBox ) {
			var $notification = $( closeBox ).parent();
			$( closeBox ).hide();
			$notification.data( 'dismiss', true );
			$notification.find( '.mw-echo-dismiss' )
				// Make sure the dismiss interface exactly covers the notification
				.height( $notification.height() )
				// Icon adds 45px to the notification
				.width( $notification.width() - 45 )
				.css( 'padding-top', $notification.css( 'padding-top' ) )
				.css( 'padding-bottom', $notification.css( 'padding-bottom' ) )
				.css( 'padding-right', $notification.css( 'padding-right' ) )
				.css( 'padding-left', parseInt( $notification.css( 'padding-left' ) ) + 45 )
				.show();
			// Temprorarily ungrey-out read notifications
			if ( !$notification.hasClass( 'mw-echo-unread' ) ) {
				$notification.find( '.mw-echo-state' ).css( 'filter', 'alpha(opacity=100)' );
				$notification.find( '.mw-echo-state' ).css( 'opacity', '1.0' );
			}
		},

		'setUpDismissability' : function( notification ) {
			var $dismissButton,
				$cancelButton,
				_this = this,
				$notification = $( notification );

			// Add dismiss box
			var $closebox = $( '<div/>' )
				.addClass( 'mw-echo-close-box' )
				.css( 'display', 'none' )
				.click( function() {
					_this.showDismissOption( this );
				} );
			$notification.append( $closebox );

			// Add dismiss and cancel buttons
			$dismissButton = $( '<button/>' )
				.text( mw.msg( 'echo-dismiss-button' ) )
				.addClass( 'mw-echo-dismiss-button' )
				.addClass( 'ui-button-blue' )
				.button( {
					icons: { primary: "ui-icon-closethick" }
				} )
				.click( function () {
					_this.setOptionsToken( _this.dismiss, $notification );
				} );
			$cancelButton = $( '<button/>' )
				.text( mw.msg( 'cancel' ) )
				.addClass( 'mw-echo-cancel-button' )
				.addClass( 'ui-button-red' )
				.button()
				.click( function () {
					$notification.data( 'dismiss', false );
					$notification.find( '.mw-echo-dismiss' ).hide();
					$closebox.show();
					// Restore greyed-out state for read notifications
					if ( !$notification.hasClass( 'mw-echo-unread' ) ) {
						$notification.find( '.mw-echo-state' ).css( 'filter', 'alpha(opacity=50)' );
						$notification.find( '.mw-echo-state' ).css( 'opacity', '0.5' );
					}
				} );
			$notification.find( '.mw-echo-dismiss' )
				.append( $dismissButton )
				.append( $cancelButton );

			// Make each notification hot for dismissability
			$notification.hover(
				function() {
					if ( !$( this ).data( 'dismiss' ) ) {
						$( this ).find( '.mw-echo-close-box' ).show();
					}
				},
				function() {
					if ( !$( this ).data( 'dismiss' ) ) {
						$( this ).find( '.mw-echo-close-box' ).hide();
					}
				}
			);
		},

	};
} )( jQuery, mediaWiki );
