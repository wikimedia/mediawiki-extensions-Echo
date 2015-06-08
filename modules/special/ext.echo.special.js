( function ( $, mw ) {
	'use strict';

	mw.echo.special = {

		notcontinue: null,
		header: '',
		processing: false,

		/**
		 * Initialize the property in special notification page.
		 */
		initialize: function () {
			var skin = mw.config.get( 'skin' );

			// Convert more link into a button
			$( '#mw-echo-more' )
				.addClass( 'mw-ui-button mw-ui-primary' )
				.css( 'margin', '0.5em 0 0 0' )
				.click( function ( e ) {
					e.preventDefault();
					if ( !mw.echo.special.processing ) {
						mw.echo.special.processing = true;
						mw.echo.special.loadMore();
					}
				}
			);
			mw.echo.special.notcontinue = mw.config.get( 'wgEchoNextContinue' );
			mw.echo.special.header = mw.config.get( 'wgEchoDateHeader' );

			// Set up each individual notification with eventlogging, a close
			// box and dismiss interface if it is dismissable.
			$( '.mw-echo-notification' ).each( function () {
				mw.echo.setupNotificationLogging( $( this ), 'archive' );
				if ( $( this ).find( '.mw-echo-dismiss' ).length ) {
					mw.echo.setUpDismissability( this );
				}
			} );

			$( '#mw-echo-moreinfo-link' ).click( function () {
				mw.echo.logInteraction( 'ui-help-click', 'archive' );
			} );
			$( '#mw-echo-pref-link' ).click( function () {
				mw.echo.logInteraction( 'ui-prefs-click', 'archive' );
			} );

			// Convert subtitle links into header icons for Vector and Monobook skins
			if ( skin === 'vector' || skin === 'monobook' ) {
				$( '#mw-echo-moreinfo-link, #mw-echo-pref-link' )
					.empty()
					.appendTo( '#firstHeading' );
				$( '#contentSub' ).empty();
			}

		},

		/**
		 * Load more notification records.
		 */
		loadMore: function () {
			var notifications, data, container, $li,
				api = new mw.Api( { ajax: { cache: false } } ),
				seenTime = mw.user.options.get( 'echo-seen-time' ),
				that = this,
				unread = [],
				apiData = {
					action: 'query',
					meta: 'notifications',
					notformat: 'html',
					notprop: 'index|list',
					notcontinue: this.notcontinue,
					notlimit: mw.config.get( 'wgEchoDisplayNum' ),
					uselang: 'user'
				};

			api.get( apiData ).done( function ( result ) {
				container = $( '#mw-echo-special-container' );
				notifications = result.query.notifications;
				unread = [];

				$.each( notifications.index, function ( index, id ) {
					data = notifications.list[id];

					if ( that.header !== data.timestamp.date ) {
						that.header = data.timestamp.date;
						$( '<li></li>' ).addClass( 'mw-echo-date-section' ).append( that.header ).appendTo( container );
					}

					$li = $( '<li></li>' )
						.data( 'details', data )
						.data( 'id', id )
						.addClass( 'mw-echo-notification' )
						.attr( {
							'data-notification-category': data.category,
							'data-notification-event': data.id,
							'data-notification-type': data.type
						} )
						.append( data['*'] )
						.appendTo( container );

					if ( !data.read ) {
						$li.addClass( 'mw-echo-unread' );
						unread.push( id );
					}

					if ( seenTime !== null && data.timestamp.mw > seenTime ) {
						$li.addClass( 'mw-echo-unseen' );
					}

					mw.echo.setupNotificationLogging( $li, 'archive' );

					if ( $li.find( '.mw-echo-dismiss' ).length ) {
						mw.echo.setUpDismissability( $li );
					}
				} );

				that.notcontinue = notifications['continue'];
				if ( unread.length > 0 ) {
					that.markAsRead( unread );
				} else {
					that.onSuccess();
				}
			} ).fail( function () {
				that.onError();
			} );
		},

		/**
		 * Mark notifications as read.
		 */
		markAsRead: function ( unread ) {
			var newCount, rawCount, $badge,
				api = new mw.Api(),
				that = this;

			api.postWithToken( 'edit', {
				action: 'echomarkread',
				list: unread.join( '|' ),
				uselang: 'user'
			} ).done( function ( result ) {
				// update the badge if the link is enabled
				if ( result.query.echomarkread.count !== undefined &&
					$( '#pt-notifications' ).length
				) {
					newCount = result.query.echomarkread.count;
					rawCount = result.query.echomarkread.rawcount;
					$badge = mw.echo.getBadge();
					$badge.text( newCount );

					// Special:Notifications never loads newer notifications, so
					// the badge should never light up again when it fetches
					// additional (older) unread notifications. It can only go
					// grey once all unread posts have been fetched.
					if ( rawCount === '0' || rawCount === 0 ) {
						$badge.removeClass( 'mw-echo-unread-notifications' );
					}
				}
				that.onSuccess();
			} ).fail( function () {
				that.onError();
			} );
		},

		onSuccess: function () {
			if ( !this.notcontinue ) {
				$( '#mw-echo-more' ).hide();
			}
			this.processing = false;
		},

		onError: function () {
			// Todo: Show detail error message based on error code
			$( '#mw-echo-more' ).text( mw.msg( 'echo-load-more-error' ) );
			this.processing = false;
		}
	};

	$( document ).ready( mw.echo.special.initialize );

} )( jQuery, mediaWiki );
