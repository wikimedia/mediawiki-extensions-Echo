( function ( $, mw ) {
	$( function () {
		var $link = $( '#pt-notifications a' );
		if ( ! $link.length ) {
			return;
		}

		$link.click( function ( e ) {
			var $target;

			// log the badge click
			mw.echo.logInteraction( 'ui-badge-link-click' );

			e.preventDefault();

			$target = $( e.target );
			// If the user clicked on the overlay or any child, ignore the click
			if ( $target.hasClass( 'mw-echo-overlay' ) || $target.is( '.mw-echo-overlay *' ) ) {
				return;
			}

			if ( $( '.mw-echo-overlay' ).length ) {
				mw.echo.overlay.removeOverlay();
				return;
			}

			mw.echo.overlay.buildOverlay(
				function ( $overlay ) {
					$overlay
						.hide()
						.appendTo( document.body );

					function positionOverlay() {
						var offset = $( '#pt-notifications' ).offset();
						$overlay.css( { left: offset.left - 200 } );
					}
					positionOverlay();
					$( window ).on( 'resize', positionOverlay );
					mw.hook( 'ext.echo.overlay.beforeShowingOverlay' ).fire( $overlay );

					// Show the notifications overlay
					$overlay.show();

					// Make sure the overlay is visible, even if the badge is near the edge of browser window.
					// 10 is an arbitrarily chosen "close enough" number.
					// We are careful not to slide out from below the pokey (which is 21px wide) (200-21/2+1 == 189)
					var
						offset = $overlay.offset(),
						width = $overlay.width(),
						windowWidth = $( window ).width();
					if ( offset.left < 10 ) {
						$overlay.css( 'left', '+=' + Math.min( 189, 10 - offset.left ) );
					} else if ( offset.left + width > windowWidth - 10 ) {
						$overlay.css( 'left', '-=' + Math.min( 189, ( offset.left + width ) - ( windowWidth - 10 ) ) );
					}
				}
			);
		} );

		$( 'body' ).click( function ( e ) {
			if ( ! $( e.target ).is( '.mw-echo-overlay, .mw-echo-overlay *, #pt-notifications a' ) ) {
				mw.echo.overlay.removeOverlay();
			}
		} );

		// Closes the notifications overlay when ESC key pressed
		$( document ).on( 'keydown', function ( e ) {
			if ( e.which === 27 ) {
				mw.echo.overlay.removeOverlay();
			}
		} );

	} );
}( jQuery, mediaWiki ));
