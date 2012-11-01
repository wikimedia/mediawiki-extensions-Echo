( function( $, mw ) {
	'use strict';

	mw.echo.overlay = {
		'updateCount' : function( newCount ) {
			$( '#pt-notifications a' )
				.text( mw.msg( 'echo-link' ) )
				.badge( newCount, { 'type' : 'inline' } );

			mw.echo.overlay.notification_count = newCount;
		},

		'configuration' : mw.config.get( 'wgEchoOverlayConfiguration' ),

		'buildOverlay' : function( callback ) {
			var $overlay = $( '<div></div>' ).addClass( 'mw-echo-overlay' ),
				$link = $( '#pt-notifications a' );

			$overlay.append(
				$( '<div/>' )
					.addClass( 'mw-echo-overlay-title' )
					.text( mw.msg( 'echo-overlay-title' ) )
			);

			$overlay.css( 'max-height', $( window ).height() * 0.75 );

			var Api = new mw.Api();

			Api.get( {
				'action' : 'query',
				'meta' : 'notifications',
				'notformat' : 'html',
				'notprop' : 'index|list'
			}, {
				'ok' : function( result ) {
					var notifications = result.query.notifications,
						$ul = $( '<ul></ul>' ).appendTo( $overlay );

					$.each( notifications.index, function( index, id ) {
						var data = notifications[id],
							$li = $( '<li></li>' )
								.data( 'details', data )
								.data( 'id', id )
								.addClass( 'mw-echo-notification' )
								.append( data['*'] )
								.appendTo( $ul );

						if ( ! data.read ) {
							$li.addClass( 'mw-echo-unread' );
						}
					} );

					if ( ! $ul.find( 'li' ).length ) {
						$ul.remove();
						$overlay.append(
							$( '<div></div>' )
								.addClass( 'mw-echo-overlay-none' )
								.text( mw.msg( 'echo-none' ) )
						);
					}

					$overlay.append(
						$( '<div/>' )
							.addClass( 'mw-echo-overlay-link' )
							.append( $link
								.clone()
								.text( mw.msg( 'echo-overlay-link' ) )
							)
					);

					callback( $overlay );

					Api.get( {
						'action' : 'query',
						'meta' : 'notifications',
						'notmarkread' : notifications.index.join( '|' ),
						'notprop' : 'count'
					}, {
						'ok' : function( result ) {
							var count = result.query.notifications.count;

							mw.echo.overlay.updateCount( count );
						}
					} );
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
						.appendTo( $( 'body' ) )
						.slideDown( 'fast' );
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
