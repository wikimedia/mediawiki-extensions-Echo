( function ( $, mw ) {
	'use strict';
	var useLang = mw.config.get( 'wgUserLanguage' );

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
				mw.echo.logger.logInteraction(
					'notification-impression',
					mw.echo.Logger.static.context.archive,
					Number( $( this ).attr( 'data-notification-event' ) ),
					$( this ).attr( 'data-notification-type' )
				);
			} );

			$( '#mw-echo-moreinfo-link' ).click( function () {
				mw.echo.logger.logInteraction( 'ui-help-click', mw.echo.Logger.static.context.archive );
			} );
			$( '#mw-echo-pref-link' ).click( function () {
				mw.echo.logger.logInteraction( 'ui-prefs-click', mw.echo.Logger.static.context.archive );
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
			var notifications, container, $li,
				api = new mw.Api( { ajax: { cache: false } } ),
				seenTime = mw.config.get( 'wgEchoSeenTime' ),
				that = this,
				unread = [],
				apiData = {
					action: 'query',
					meta: 'notifications',
					notformat: 'special',
					notprop: 'list',
					notcontinue: this.notcontinue,
					notlimit: mw.config.get( 'wgEchoDisplayNum' ),
					uselang: useLang
				};

			api.get( apiData ).done( function ( result ) {
				container = $( '#mw-echo-special-container' );
				notifications = result.query.notifications;
				unread = [];

				$.each( notifications.list, function ( index, data ) {
					if ( that.header !== data.timestamp.date ) {
						that.header = data.timestamp.date;
						$( '<li></li>' ).addClass( 'mw-echo-date-section' ).append( that.header ).appendTo( container );
					}

					$li = $( '<li></li>' )
						.data( 'details', data )
						.data( 'id', data.id )
						.addClass( 'mw-echo-notification' )
						.attr( {
							'data-notification-category': data.category,
							'data-notification-event': data.id,
							'data-notification-type': data.type
						} )
						.append( data[ '*' ] )
						.appendTo( container );

					if ( !data.read ) {
						$li.addClass( 'mw-echo-unread' );
						unread.push( data.id );
					}

					if ( seenTime !== null && data.timestamp.mw > seenTime ) {
						$li.addClass( 'mw-echo-unseen' );
					}

					mw.echo.logger.logInteraction(
						'notification-impression',
						mw.echo.Logger.static.context.archive,
						Number( $li.attr( 'data-notification-event' ) ),
						$li.attr( 'data-notification-type' )
					);
				} );

				that.notcontinue = notifications[ 'continue' ];
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
			var api = new mw.Api(),
				that = this;
			api.postWithToken( 'edit', {
				action: 'echomarkread',
				list: unread.join( '|' ),
				uselang: useLang
			} ).done( function () {
				// HACK: We should really redo the way the entire special
				// page handles the notifications now that they are separated
				// into 'alert' and 'messages'. However, until that happens,
				// the badges should be updated individually.
				// Don't try this at home.
				mw.echo.ui.messageWidget.fetchUnreadCountFromApi();
				mw.echo.ui.alertWidget.fetchUnreadCountFromApi();

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
