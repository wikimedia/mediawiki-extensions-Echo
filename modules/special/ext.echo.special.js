( function( $, mw ) {
	'use strict';

	mw.echo.special = {

		'timestamp': 0,
		'offset': 0,
		'header': '',
		'processing': false,
		'moreData': '0',

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
					mw.echo.setUpDismissability( this );
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
								.attr( 'data-notification-category', data.category )
								.append( data['*'] )
								.appendTo( container );

							if ( !data.read ) {
								$li.addClass( 'mw-echo-unread' );
								unread.push( id );
							}

							if ( $li.find( '.mw-echo-dismiss' ).length ) {
								mw.echo.setUpDismissability( $li );
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
