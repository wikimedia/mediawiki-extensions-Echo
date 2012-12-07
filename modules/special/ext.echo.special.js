( function( $, mw ) {
	'use strict';

	mw.echo.special = {

		'timestamp': 0,
		'offset': 0,
		'header': '',

		/**
		 * initialize the property in special notification page
		 */
		'initialize': function() {
			var _this = this;
			$( '#mw-echo-more' ).click(
				function( e ) {
					e.preventDefault();
					_this.loadMore();
				}
			);
			_this.timestamp = mw.config.get( 'wgEchoStartTimestamp' );
			_this.offset = mw.config.get( 'wgEchoStartOffset' );
			_this.header = mw.config.get( 'wgEchoDateHeader' );
		},

		/**
		 * function for loading more notification records
		 */
		'loadMore': function() {
			var api = new mw.Api(), notifications, data, container, $li, _this = this;

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
						notifications = result.query.notifications,

						$.each( notifications.index, function( index, id ) {
							data = notifications['list'][id];

							if ( _this.header !== data.timestamp.date ) {
								_this.header = data.timestamp.date;
								$( '<li></li>' ).addClass( 'mw-echo-date-section' ).append( _this.header ).appendTo( container );
							}

							$li = $( '<li></li>' )
								.data( 'details', data )
								.data( 'id', id )
								.addClass( 'mw-echo-notification' )
								.append( data['*'] )
								.appendTo( container );

							if ( !data.read ) {
								$li.addClass( 'mw-echo-unread' );
							}

							// update the timestamp and offset to get data from
							// this is used for next data retrieval
							_this.timestamp = data.timestamp.unix;
							_this.offset = data.id;
						} );

						if ( notifications.more == '0' && $( '#mw-echo-more' ).length ) {
							$( '#mw-echo-more' ).hide();
						}
					},
					'err' : function() {
						// Todo: Show detail error message based on error code
						$( '#mw-echo-more' ).text( mw.msg( 'echo-load-more-error' ) );
					}
				}
			);
		}
	};

	mw.echo.special.initialize();

} )( jQuery, mediaWiki );
