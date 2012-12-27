( function( $, mw ) {
	'use strict';

	mw.echo.overlay = {

		'notificationLimit' : 8,

		'updateCount' : function( newCount ) {
			// Accomodate '10' or '100+'. Numbers need to be
			// passed as numbers for correct behavior of '0'.
			if ( !isNaN( newCount ) ) {
				newCount = Number( newCount );
			}

			if ( mw.echo.overlay.configuration['notifications-link-full'] ) {
				$( '#pt-notifications a' )
					.text( mw.msg( 'echo-link' ) )
					.badge( newCount, true, true );
			} else {
				$( '#pt-notifications a' )
					.text( '' )
					.badge( newCount, true, true );
				$( '#pt-notifications .mw-badge' ).css( 'margin-left', '-5px' );
			}

			mw.echo.overlay.notification_count = newCount;
		},

		'configuration' : mw.config.get( 'wgEchoOverlayConfiguration' ),

		'buildOverlay' : function( callback ) {
			var $overlay = $( '<div></div>' ).addClass( 'mw-echo-overlay' ),
				$link = $( '#pt-notifications a' ),
				$prefLink = $( '#pt-preferences a' ),
				count = 0;

			$overlay.css( 'max-height', $( window ).height() * 0.75 );

			var Api = new mw.Api();

			Api.get( {
				'action' : 'query',
				'meta' : 'notifications',
				'notformat' : 'html',
				'notlimit' : mw.echo.overlay.notificationLimit,
				'notprop' : 'index|list|count'
			}, {
				'ok' : function( result ) {
					var notifications = result.query.notifications,
						unread = [],
						unreadTotalCount = result.query.notifications.count,
						$title = $( '<div class="mw-echo-overlay-title"></div>' ),
						$ul = $( '<ul class="mw-echo-notifications"></ul>' ),
						titleText = '';

					$.each( notifications.index, function( index, id ) {
						var data = notifications['list'][id];
						var $li = $( '<li></li>' )
								.data( 'details', data )
								.data( 'id', id )
								.addClass( 'mw-echo-notification' )
								.append( data['*'] )
								.appendTo( $ul );

						if ( !data.read ) {
							$li.addClass( 'mw-echo-unread' );
							unread.push( id );
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
					$title.html( $( '<a/>' ).attr( 'href', mw.util.wikiGetlink( 'Special:Notifications' ) ).text( titleText ) );
					$title.appendTo( $overlay );

					if ( $ul.find( 'li' ).length ) {
						$ul.appendTo( $overlay );
					}

					// only show 'All notifications...' link if there is notification
					if ( notifications.index.length > 0 ) {
						$overlay.append(
							$( '<div/>' )
								.attr( 'id', 'mw-echo-overlay-link' )
								.append( $link
									.clone()
									.text( mw.msg( 'echo-overlay-link' ) )
								)
						);
					}

					// add link to notification preferences
					$overlay.append(
						$( '<div/>' )
							.attr( 'id', 'mw-echo-overlay-pref-link' )
							.append( $prefLink
								.clone()
								.attr( 'href', $prefLink.attr( 'href' ) + '#mw-prefsection-echo' )
							)
					);

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
						.appendTo( $( 'body' ) );
					// Figure out which footer link is first and pad it appropriately
					// (Sometimes the 'All notifications' link doesn't exist)
					if ( $( '#mw-echo-overlay-link' ).length ) {
						$( '#mw-echo-overlay-link' )
							.addClass( 'mw-echo-overlay-first-footer-link' );
					} else {
						$( '#mw-echo-overlay-pref-link' )
							.addClass( 'mw-echo-overlay-first-footer-link' );
					}
					$overlay.slideDown( 'fast' );
				} );
		} );

		$( 'body' ).click( function( e ) {
			if ( ! $( e.target ).is( '.mw-echo-overlay,.mw-echo-overlay *' ) ) {
				$( '.mw-echo-overlay' ).fadeOut( 'fast',
					function() { $( this ).remove(); }
				);
			}
		} );
	} );
} )( jQuery, mediaWiki );
