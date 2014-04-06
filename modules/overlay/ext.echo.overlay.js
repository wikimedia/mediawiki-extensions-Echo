/*global window:false */
( function ( $, mw ) {
	'use strict';

	// backwards compatibility <= MW 1.21
	var getUrl = mw.util.getUrl || mw.util.wikiGetlink;

	mw.echo.overlay = {

		/**
		 * @param newCount formatted count
		 * @param rawCount unformatted count
		 */
		updateCount: function ( newCount, rawCount ) {
			var $badge = $( '.mw-echo-notifications-badge' );
			$badge.text( newCount );

			if ( rawCount !== '0' && rawCount !== 0 ) {
				$badge.addClass( 'mw-echo-unread-notifications' );
			} else {
				$badge.removeClass( 'mw-echo-unread-notifications' );
			}
		},

		configuration: mw.config.get( 'wgEchoOverlayConfiguration' ),

		removeOverlay: function () {
			$( '.mw-echo-overlay, .mw-echo-overlay-pokey' ).fadeOut( 'fast',
				function () { $( this ).remove(); }
			);
		},

		buildOverlay: function ( callback ) {
			var notificationLimit,
				$overlay = $( '<div>' ).addClass( 'mw-echo-overlay' ),
				$prefLink = $( '#pt-preferences a' ),
				count = 0,
				apiData,
				api = new mw.Api( { ajax: { cache: false } } );

			// Set notification limit based on height of the window
			notificationLimit = Math.floor( ( $( window ).height() - 134 ) / 90 );

			if ( notificationLimit < 1 ) {
				notificationLimit = 1;
			} else if ( notificationLimit > 8 ) {
				notificationLimit = 8;
			}

			apiData = {
				'action' : 'query',
				'meta' : 'notifications',
				'notformat' : 'flyout',
				'notlimit' : notificationLimit,
				'notprop' : 'index|list|count'
			};

			api.get( mw.echo.desktop.appendUseLang( apiData ) ).done( function ( result ) {
				var notifications = result.query.notifications,
					unread = [],
					unreadTotalCount = result.query.notifications.count,
					unreadRawTotalCount = result.query.notifications.rawcount,
					$title = $( '<div>' ).addClass( 'mw-echo-overlay-title' ),
					$ul = $( '<ul>' ).addClass( 'mw-echo-notifications' ),
					titleText,
					overflow,
					$overlayFooter,
					$markReadButton;

				if ( unreadTotalCount !== undefined ) {
					mw.echo.overlay.updateCount( unreadTotalCount, unreadRawTotalCount );
				}
				$ul.css( 'max-height', notificationLimit * 95 + 'px' );
				$.each( notifications.index, function ( index, id ) {
					var $wrapper,
						data = notifications.list[id],
						$li = $( '<li>' )
							.data( 'details', data )
							.data( 'id', id )
							.attr( {
								'data-notification-category': data.category,
								'data-notification-event': data.id,
								'data-notification-type': data.type
							} )
							.addClass( 'mw-echo-notification' );

					if ( !data.read ) {
						$li.addClass( 'mw-echo-unread' );
						unread.push( id );
					}

					if ( !data['*'] ) {
						return;
					}

					$li.append( data['*'] )
						.appendTo( $ul );

					// Grey links in the notification title and footer (except on hover)
					$li.find( '.mw-echo-title a, .mw-echo-notification-footer a' )
						.addClass( 'mw-echo-grey-link' );
					$li.hover(
						function() {
							$( this ).find( '.mw-echo-title a' ).removeClass( 'mw-echo-grey-link' );
						},
						function() {
							$( this ).find( '.mw-echo-title a' ).addClass( 'mw-echo-grey-link' );
						}
					);
					// If there is a primary link, make the entire notification clickable.
					// Yes, it is possible to nest <a> tags via DOM manipulation,
					// and it works like one would expect.
					if ( $li.find( '.mw-echo-notification-primary-link' ).length ) {
						$wrapper = $( '<a>' )
							.addClass( 'mw-echo-notification-wrapper' )
							.attr( 'href', $li.find( '.mw-echo-notification-primary-link' ).attr( 'href' ) )
							.click( function() {
								if ( mw.echo.clickThroughEnabled ) {
									// Log the clickthrough
									mw.echo.logInteraction( 'notification-link-click', 'flyout', +data.id, data.type );
								}
							} );
					} else {
						$wrapper = $('<div>').addClass( 'mw-echo-notification-wrapper' );
					}

					$li.wrapInner( $wrapper );

					mw.echo.setupNotificationLogging( $li, 'flyout' );

					// Set up each individual notification with a close box and dismiss
					// interface if it is dismissable.
					if ( $li.find( '.mw-echo-dismiss' ).length ) {
						mw.echo.setUpDismissability( $li );
					}
				} );

				if ( notifications.index.length > 0 ) {
					if ( unreadRawTotalCount > unread.length ) {
						titleText = mw.msg(
							'echo-overlay-title-overflow',
							mw.language.convertNumber( unread.length ),
							mw.language.convertNumber( unreadTotalCount )
						);
						overflow = true;
					} else {
						titleText = mw.msg( 'echo-overlay-title' );
						overflow = false;
					}
				} else {
					titleText = mw.msg( 'echo-none' );
				}

				// If there are more unread notifications than can fit in the overlay,
				// but fewer than the maximum count, show the 'mark all as read' button.
				// The only reason we limit it to the maximum is to prevent expensive
				// database updates. If the count is more than the maximum, it could
				// be thousands.
				if ( overflow && unreadRawTotalCount < mw.echo.overlay.configuration['max-notification-count']
				) {
					// Add the 'mark all as read' button to the title area
					$markReadButton = $( '<button>' )
						.addClass( 'mw-ui-button' )
						.attr( 'id', 'mw-echo-mark-read-button' )
						.text( mw.msg( 'echo-mark-all-as-read' ) )
						.click( function ( e ) {
							e.preventDefault();
							api.post( mw.echo.desktop.appendUseLang( {
								'action' : 'echomarkread',
								'all' : true,
								'token': mw.user.tokens.get( 'editToken' )
							} ) ).done( function ( result ) {
								if ( result.query.echomarkread.count !== undefined ) {
									count = result.query.echomarkread.count;
									mw.echo.overlay.updateCount( count, result.query.echomarkread.rawcount );
									// Reset header to 'Notifications'
									$( '#mw-echo-overlay-title-text' ).html( mw.msg( 'echo-overlay-title' ) );
								}
							} );
						} );
					$title.append( $markReadButton );
				}

				// Add the header to the title area
				$( '<div>' )
				.attr( 'id', 'mw-echo-overlay-title-text' )
				.html( titleText )
				.appendTo( $title );

				// Add help button
				$( '<a>' )
					.attr( 'href', mw.config.get( 'wgEchoHelpPage' ) )
					.attr( 'title', mw.msg( 'echo-more-info' ) )
					.attr( 'id', 'mw-echo-overlay-moreinfo-link' )
					.attr( 'target', '_blank' )
					.click( function () {
						mw.echo.logInteraction( 'ui-help-click', 'flyout' );
					} )
					.appendTo( $title );

				// Insert the title area into the overlay
				$title.appendTo( $overlay );

				if ( $ul.find( 'li' ).length ) {
					$ul.appendTo( $overlay );
				}

				$overlayFooter = $( '<div>' )
					.attr( 'id', 'mw-echo-overlay-footer' );

				// add link to notifications archive
				$overlayFooter.append(
					$( '<a>' )
						.attr( 'id', 'mw-echo-overlay-link' )
						.addClass( 'mw-echo-grey-link' )
						.attr( 'href', getUrl( 'Special:Notifications' ) )
						.text( mw.msg( 'echo-overlay-link' ) )
						.click( function () {
							mw.echo.logInteraction( 'ui-archive-link-click', 'flyout' );
						} )
						.hover(
							function() {
								$( this ).removeClass( 'mw-echo-grey-link' );
							},
							function() {
								$( this ).addClass( 'mw-echo-grey-link' );
							}
						)
				);

				// add link to notification preferences
				$overlayFooter.append(
					$( '<a>' )
						.html( $prefLink.html() )
						.attr( 'id', 'mw-echo-overlay-pref-link' )
						.addClass( 'mw-echo-grey-link' )
						.attr( 'href', $prefLink.attr( 'href' ) + '#mw-prefsection-echo' )
						.click( function () {
							mw.echo.logInteraction( 'ui-prefs-click', 'flyout' );
						} )
						.hover(
							function() {
								$( this ).removeClass( 'mw-echo-grey-link' );
							},
							function() {
								$( this ).addClass( 'mw-echo-grey-link' );
							}
						)
				);

				$overlay.append( $overlayFooter );

				callback( $overlay );

				// only need to mark as read if there is unread item
				if ( unread.length > 0 ) {
					api.post( mw.echo.desktop.appendUseLang( {
						'action' : 'echomarkread',
						'list' : unread.join( '|' ),
						'token': mw.user.tokens.get( 'editToken' )
					} ) ).done( function ( result ) {
						if ( result.query.echomarkread.count !== undefined ) {
							count = result.query.echomarkread.count;
							mw.echo.overlay.updateCount( count, result.query.echomarkread.rawcount );
						}
					} );
				}
			} ).fail( function () {
				window.location.href = $( '#pt-notifications a' ).attr( 'href' );
			} );
		}
	};

	$( function () {
		var $link = $( '#pt-notifications a' );
		if ( ! $link.length ) {
			return;
		}

		$link.click( function ( e ) {
			var $target;

			// log the badge click
			mw.echo.logInteraction( 'ui-badge-link-click' );

			// If the link is not near the top of the window, showing the overlay below it
			// will likely look very silly, so let's not do this and just go the special page
			if ( $link.offset().top > 0.2 * $( window ).height() ) {
				return;
			}

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
						.appendTo( $( '#pt-notifications' ) );

					// Create the pokey (aka chevron)
					$overlay.before( $( '<div>' ).addClass( 'mw-echo-overlay-pokey' ) );

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
			if ( ! $( e.target ).is( '.mw-echo-overlay, .mw-echo-overlay *, .mw-echo-overlay-pokey, #pt-notifications a' ) ) {
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
} )( jQuery, mediaWiki );
