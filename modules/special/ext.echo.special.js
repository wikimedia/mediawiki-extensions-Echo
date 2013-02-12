( function( $, mw ) {
	'use strict';

	mw.echo.special = {

		'timestamp': 0,
		'offset': 0,
		'header': '',
		'processing': false,
		'moreData': '0',
		'optionsToken': '',

		/**
		 * Show the dismiss interface (Dismiss and Cancel buttons).
		 */
		'showDismissOption': function( closeBox ) {
			var $notification = $( closeBox ).parent();
			$( closeBox ).hide();
			$notification.data( 'dismiss', true );
			$notification.find( '.mw-echo-dismiss' ).show();
		},

		/**
		 * Handle clicking the Dismiss button.
		 * First we have to retrieve the options token.
		 */
		'dismiss': function( notification ) {
			var eventType,
				_this = this,
				$notification = $( notification );
			var tokenRequest = {
				'action': 'tokens',
				'type' : 'options',
				'format': 'json'
			};
			if ( this.optionsToken ) {
				this.finishDismiss( notification );
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
							_this.finishDismiss( notification );
						}
						/*
						// TODO: Use something like this for the flyout to immediately
						// hide the notifications without reloading the page. We reload
						// the page in the archive interface since we're also dealing
						// with date headers.
						eventType = $notification.attr( 'data-notification-type' );
						$( 'li[data-notification-type="' + eventType + '"]' ).hide();
						*/
					},
					error: function() {
						alert( mw.msg( 'echo-error-token' ) );
					}
				} );
			}
		},

		/**
		 * Change the user's preferences related to this notification type and
		 * reload the page.
		 */
		'finishDismiss': function( notification ) {
			var _this = this,
				$notification = $( notification ),
				eventType = $notification.attr( 'data-notification-type' ),
				change = 'echo-web-notifications' + eventType + '=0',
				prefRequest = {
					'action': 'options',
					'change': change,
					'token': this.optionsToken,
					'format': 'json'
				};
			$.ajax( {
				type: 'post',
				url: mw.util.wikiScript( 'api' ),
				data: prefRequest,
				dataType: 'json',
				success: function( data ) {
					window.location.reload();
				},
				error: function() {
					alert( mw.msg( 'echo-error-preference' ) );
				}
			} );
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
					_this.dismiss( $notification );
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
				} );
			$notification.find( '.mw-echo-dismiss' )
				.height( $notification.height() )
				.width( $notification.width() - 45 )
				.css( 'padding-top', $notification.css( 'padding-top' ) )
				.css( 'padding-bottom', $notification.css( 'padding-bottom' ) )
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

		/**
		 * Initialize the property in special notification page.
		 */
		'initialize': function() {
			var _this = this;
			$( '#mw-echo-more' ).click(
				function( e ) {
					e.preventDefault();
					if ( !_this.processing ) {
						_this.processing = true;
						_this.loadMore();
					}
				}
			);
			_this.timestamp = mw.config.get( 'wgEchoStartTimestamp' );
			_this.offset = mw.config.get( 'wgEchoStartOffset' );
			_this.header = mw.config.get( 'wgEchoDateHeader' );

			// Set up each individual notification with a close box and dismiss
			// interface if it is dismissable.
			$( '.mw-echo-notification' ).each( function() {
				if ( $( this ).find( '.mw-echo-dismiss' ).length ) {
					_this.setUpDismissability( this );
				}
			} );

			$( '<a/>' )
				.attr( 'href', mw.config.get( 'wgEchoHelpPage' ) )
				.attr( 'title', mw.msg( 'echo-more-info' ) )
				.attr( 'id', 'mw-echo-moreinfo-link' )
				.prop( 'target', '_blank' )
				.appendTo( $( '#firstHeading' ) );

			$( '#mw-echo-pref-link' )
				.appendTo( $( '#firstHeading' ) );
		},

		/**
		 * Load more notification records.
		 */
		'loadMore': function() {
			var api = new mw.Api(), notifications, data, container, $li, _this = this, unread = [];

			api.get(
				{
					'action' : 'query',
					'meta' : 'notifications',
					'notformat' : 'html',
					'notprop' : 'index|list',
					'nottimestamp': this.timestamp,
					'notoffset': this.offset,
					'notlimit': mw.config.get( 'wgEchoDisplayNum' )
				},
				{
					'ok' : function( result ) {
						container = $( '#mw-echo-special-container' );
						notifications = result.query.notifications;
						unread = [];

						$.each( notifications.index, function( index, id ) {
							data = notifications.list[id];

							if ( _this.header !== data.timestamp.date ) {
								_this.header = data.timestamp.date;
								$( '<li></li>' ).addClass( 'mw-echo-date-section' ).append( _this.header ).appendTo( container );
							}

							$li = $( '<li></li>' )
								.data( 'details', data )
								.data( 'id', id )
								.addClass( 'mw-echo-notification' )
								.attr( 'data-notification-type', data.type )
								.append( data['*'] )
								.appendTo( container );

							if ( !data.read ) {
								$li.addClass( 'mw-echo-unread' );
								unread.push( id );
							}

							if ( $li.find( '.mw-echo-dismiss' ).length ) {
								_this.setUpDismissability( $li );
							}

							// update the timestamp and offset to get data from
							// this is used for next data retrieval
							_this.timestamp = data.timestamp.unix;
							_this.offset = data.id;
						} );

						_this.moreData = notifications.more;
						if ( unread.length > 0 ) {
							_this.markAsRead( unread );
						} else {
							_this.onSuccess();
						}
					},
					'err' : function() {
						_this.onError();
					}
				}
			);
		},

		/**
		 * Mark notifications as read.
		 */
		'markAsRead': function( unread ) {
			var api = new mw.Api(), _this = this;

			api.get( {
				'action' : 'query',
				'meta' : 'notifications',
				'notmarkread' : unread.join( '|' ),
				'notprop' : 'count'
			}, {
				'ok' : function( result ) {
					// update the badge if the link is enabled
					if ( typeof result.query.notifications.count !== 'undefined' &&
						$( '#pt-notifications').length && typeof mw.echo.overlay === 'object'
					) {
						mw.echo.overlay.updateCount( result.query.notifications.count );
					}
					_this.onSuccess();
				},
				'err': function() {
					_this.onError();
				}
			} );
		},

		'onSuccess': function() {
			if ( this.moreData == '0' ) {
				$( '#mw-echo-more' ).hide();
			}
			this.processing = false;
		},

		'onError': function() {
			// Todo: Show detail error message based on error code
			$( '#mw-echo-more' ).text( mw.msg( 'echo-load-more-error' ) );
			this.processing = false;
		}
	};

	mw.echo.special.initialize();

} )( jQuery, mediaWiki );
