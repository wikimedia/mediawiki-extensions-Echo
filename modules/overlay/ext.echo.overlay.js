/*global window:false */
( function( $, mw ) {
	'use strict';

	mw.echo.overlay = {

		'updateCount' : function( newCount ) {
			// Accomodate '10' or '100+'. Numbers need to be
			// passed as numbers for correct behavior of '0'.
			if ( !isNaN( newCount ) ) {
				newCount = Number( newCount );
			}

			if ( mw.echo.overlay.configuration['notifications-link-full'] ) {
				$( '#pt-notifications > a' )
					.text( mw.msg( 'echo-link' ) )
					.badge( newCount, true, true );
			} else {
				$( '#pt-notifications > a' )
					.addClass( 'mw-echo-short-link' )
					.text( '' )
					.badge( newCount, true, true );
			}

			mw.echo.overlay.notification_count = newCount;
		},

		'configuration' : mw.config.get( 'wgEchoOverlayConfiguration' ),

		'buildOverlay' : function( callback ) {
			var $overlay = $( '<div></div>' ).addClass( 'mw-echo-overlay' ),
				$link = $( '#pt-notifications a' ),
				$prefLink = $( '#pt-preferences a' ),
				count = 0;
			var Api = new mw.Api();
			// Set notification limit based on height of the window
			var notificationLimit = Math.floor( ( $( window ).height() - 134 ) / 90 );

			if ( notificationLimit < 1 ) {
				notificationLimit = 1;
			} else if ( notificationLimit > 8 ) {
				notificationLimit = 8;
			}

			Api.get( {
				'action' : 'query',
				'meta' : 'notifications',
				'notformat' : 'flyout',
				'notlimit' : notificationLimit,
				'notprop' : 'index|list|count'
			}, {
				'ok' : function( result ) {
					var notifications = result.query.notifications,
						unread = [],
						unreadTotalCount = result.query.notifications.count,
						$title = $( '<div class="mw-echo-overlay-title"></div>' ),
						$ul = $( '<ul class="mw-echo-notifications"></ul>' ),
						titleText = '';

					$ul.css( 'max-height', notificationLimit * 95 + 'px' );
					$.each( notifications.index, function( index, id ) {
						var data = notifications.list[id];
						var $li = $( '<li></li>' )
								.data( 'details', data )
								.data( 'id', id )
								.attr( 'data-notification-category', data.category )
								.addClass( 'mw-echo-notification' )
								.append( data['*'] )
								.appendTo( $ul );

						if ( !data.read ) {
							$li.addClass( 'mw-echo-unread' );
							unread.push( id );
						}

						// Set up each individual notification with a close box and dismiss
						// interface if it is dismissable.
						if ( $li.find( '.mw-echo-dismiss' ).length ) {
							mw.echo.setUpDismissability( $li );
						}
					} );

					if ( notifications.index.length > 0 ) {
						if ( unreadTotalCount > unread.length ) {
							titleText = mw.msg( 'echo-overlay-title-overflow', unread.length, unreadTotalCount );
						} else {
							titleText =  mw.msg( 'echo-overlay-title' );
						}
					} else {
						titleText = mw.msg( 'echo-none' );
					}
					$title.text( titleText );
					$title.appendTo( $overlay );

					if ( $ul.find( 'li' ).length ) {
						$ul.appendTo( $overlay );
					}

					var $overlayFooter = $( '<div/>' )
						.attr( 'id', 'mw-echo-overlay-footer' );

					// add link to notifications archive
					$overlayFooter.append(
						$link
							.clone()
							.attr( 'id', 'mw-echo-overlay-link' )
							.text( mw.msg( 'echo-overlay-link' ) )
					);

					// add link to notification preferences
					$overlayFooter.append(
						$prefLink
							.clone()
							.attr( 'id', 'mw-echo-overlay-pref-link' )
							.attr( 'href', $prefLink.attr( 'href' ) + '#mw-prefsection-echo' )
					);

					$overlay.append( $overlayFooter );

					callback( $overlay );

					// only need to mark as read if there is unread item
					if ( unread.length > 0 ) {
						Api.get( {
							'action' : 'query',
							'meta' : 'notifications',
							'notmarkread' : unread.join( '|' ),
							'notprop' : 'count'
						}, {
							'ok' : function( result ) {
								if ( result.query.notifications.count !== undefined ) {
									count = result.query.notifications.count;
									mw.echo.overlay.updateCount( count );
								}
							}
						} );
					}
				},
				'err' : function() {
					window.location.href = $link.attr( 'href' );
				}
			} );
		}
	};

	mw.echo.overlay.notification_count = mw.echo.overlay.configuration['notification-count'];

	$( function() {
		mw.echo.overlay.updateCount( mw.echo.overlay.notification_count );

		var $link = $( '#pt-notifications a' );
		if ( ! $link.length ) {
			return;
		}

		$link.click( function( e ) {
			e.preventDefault();
			var $target = $( e.target );
			// If the user clicked on the overlay or any child,
			//  ignore the click
			if ( $target.hasClass( 'mw-echo-overlay' ) ||
				$target.is( 'mw-echo-overlay *' )
			) {
				return;
			}

			var $overlay = $( '.mw-echo-overlay' );

			if ( $overlay.length ) {
				$overlay.fadeOut( 'fast',
					function() { $overlay.remove(); }
				);
				return;
			}
			
			$overlay = mw.echo.overlay.buildOverlay(
				function( $overlay ) {
					$overlay
						.hide()
						.appendTo( $( '#pt-notifications' ) );
					// Create the pokey (aka chevron)
					$( '.mw-echo-overlay' ).before( $( '<div/>' ).addClass( 'mw-echo-overlay-pokey' ) );
					// Show the notifications overlay
					$overlay.show();
				} );
		} );

		$( 'body' ).click( function( e ) {
			if ( ! $( e.target ).is( '.mw-echo-overlay, .mw-echo-overlay *, .mw-echo-overlay-pokey' ) ) {
				$( '.mw-echo-overlay, .mw-echo-overlay-pokey' ).fadeOut( 'fast',
					function() { $( this ).remove(); }
				);
			}
		} );
	} );
} )( jQuery, mediaWiki );
