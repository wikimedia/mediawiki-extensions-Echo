/*global window:false */
( function ( $, mw ) {
	'use strict';

	mw.echo.overlay = {

		updateCount: function ( newCount ) {
			var $badge = $( '.mw-echo-notifications-badge' );
			$badge.text( newCount );
			// newCount could be '99+' or another string.
			// Checking for number as well just to be paranoid.
			if ( newCount !== '0' && newCount !== 0 ) {
				$badge.addClass( 'mw-echo-unread-notifications' );
			} else {
				$badge.removeClass( 'mw-echo-unread-notifications' );
			}
		},

		configuration: mw.config.get( 'wgEchoOverlayConfiguration' ),

		buildOverlay: function ( callback ) {
			var notificationLimit,
				$overlay = $( '<div></div>' ).addClass( 'mw-echo-overlay' ),
				$prefLink = $( '#pt-preferences a' ),
				count = 0,
				api = new mw.Api();

			// Set notification limit based on height of the window
			notificationLimit = Math.floor( ( $( window ).height() - 134 ) / 90 );

			if ( notificationLimit < 1 ) {
				notificationLimit = 1;
			} else if ( notificationLimit > 8 ) {
				notificationLimit = 8;
			}

			api.get( {
				'action' : 'query',
				'meta' : 'notifications',
				'notformat' : 'flyout',
				'notlimit' : notificationLimit,
				'notprop' : 'index|list|count'
			} ).done( function ( result ) {
				var notifications = result.query.notifications,
					unread = [],
					unreadTotalCount = result.query.notifications.count,
					$title = $( '<div class="mw-echo-overlay-title"></div>' ),
					$ul = $( '<ul class="mw-echo-notifications"></ul>' ),
					titleText = '',
					overflow = false,
					$overlayFooter,
					$markReadButton;

				if ( unreadTotalCount !== undefined ) {
					mw.echo.overlay.updateCount( unreadTotalCount );
				}
				$ul.css( 'max-height', notificationLimit * 95 + 'px' );
				$.each( notifications.index, function ( index, id ) {
					var data = notifications.list[id],
						$li = $( '<li></li>' )
							.data( 'details', data )
							.data( 'id', id )
							.attr( {
								'data-notification-category': data.category,
								'data-notification-event': data.id,
								'data-notification-type': data.type
							} )
							.addClass( 'mw-echo-notification' )
							.append( data['*'] )
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
					if ( $li.find( '.mw-echo-notification-primary-link' ).length ) {
						$li.css( 'cursor', 'pointer' );
						$li.click( function() {
							if ( mw.echo.clickThroughEnabled ) {
								// Log the clickthrough
								mw.echo.logInteraction( 'notification-link-click', 'flyout', +data.id, data.type );
							}
							window.location.href = $li.find( '.mw-echo-notification-primary-link' ).attr( 'href' );
						} );
					}

					mw.echo.setupNotificationLogging( $li, 'flyout' );

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
					if ( isNaN( unreadTotalCount ) || unreadTotalCount > unread.length ) {
						titleText = mw.msg( 'echo-overlay-title-overflow', unread.length, unreadTotalCount );
						overflow = true;
					} else {
						titleText =  mw.msg( 'echo-overlay-title' );
					}
				} else {
					titleText = mw.msg( 'echo-none' );
				}

				$markReadButton = $( '<button>' )
					.addClass( 'mw-ui-button' )
					.attr( 'id', 'mw-echo-mark-read-button' )
					.text( mw.msg( 'echo-mark-all-as-read' ) )
					.click( function ( e ) {
						e.preventDefault();
						api.get( {
							'action' : 'query',
							'meta' : 'notifications',
							'notmarkallread' : true,
							'notprop' : 'count'
						} ).done( function ( result ) {
							if ( result.query.notifications.count !== undefined ) {
								count = result.query.notifications.count;
								mw.echo.overlay.updateCount( count );
								// Reset header to 'Notifications'
								$( '#mw-echo-overlay-title-text').msg( 'echo-overlay-title' );
							}
						} );
					} );

				// If there are more unread notifications than can fit in the overlay,
				// but fewer than the maximum count, show the 'mark all as read' button.
				// The only reason we limit it to the maximum is to prevent expensive
				// database updates. If the count is more than the maximum, it could
				// be thousands.
				if ( overflow &&
					!isNaN( unreadTotalCount ) &&
					unreadTotalCount < mw.echo.overlay.configuration['max-notification-count']
				) {
					// Add the 'mark all as read' button to the title area
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
						.attr( 'href', mw.util.wikiGetlink( 'Special:Notifications' ) )
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
					$prefLink
						.clone()
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
					api.get( {
						'action' : 'query',
						'meta' : 'notifications',
						'notmarkread' : unread.join( '|' ),
						'notprop' : 'count'
					} ).done( function ( result ) {
						if ( result.query.notifications.count !== undefined ) {
							count = result.query.notifications.count;
							mw.echo.overlay.updateCount( count );
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
			var $target, $overlay;

			e.preventDefault();

			// log the badge click
			mw.echo.logInteraction( 'ui-badge-link-click' );

			$target = $( e.target );
			// If the user clicked on the overlay or any child,
			//  ignore the click
			if ( $target.hasClass( 'mw-echo-overlay' ) ||
				$target.is( 'mw-echo-overlay *' )
			) {
				return;
			}

			$overlay = $( '.mw-echo-overlay' );

			if ( $overlay.length ) {
				$overlay.fadeOut( 'fast',
					function () { $overlay.remove(); }
				);
				return;
			}

			$overlay = mw.echo.overlay.buildOverlay(
				function ( $overlay ) {
					$overlay
						.hide()
						.appendTo( $( '#pt-notifications' ) );
					// Create the pokey (aka chevron)
					$( '.mw-echo-overlay' ).before( $( '<div>' ).addClass( 'mw-echo-overlay-pokey' ) );

					mw.hook( 'ext.echo.overlay.beforeShowingOverlay' ).fire( $overlay );

					// Show the notifications overlay
					$overlay.show();
				} );
		} );

		$( 'body' ).click( function ( e ) {
			if ( ! $( e.target ).is( '.mw-echo-overlay, .mw-echo-overlay *, .mw-echo-overlay-pokey' ) ) {
				$( '.mw-echo-overlay, .mw-echo-overlay-pokey' ).fadeOut( 'fast',
					function () { $( this ).remove(); }
				);
			}
		} );
	} );
} )( jQuery, mediaWiki );
