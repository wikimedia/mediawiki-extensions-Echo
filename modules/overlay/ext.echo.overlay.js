/*global window:false */
( function ( $, mw ) {
	'use strict';

	// backwards compatibility <= MW 1.21
	var getUrl = mw.util.getUrl || mw.util.wikiGetlink;

	function EchoOverlay( apiResultNotifications ) {
		this.api = mw.echo.overlay.api;
		this._buildOverlay( apiResultNotifications );
	}

	EchoOverlay.prototype = {
		/**
		 * @var array a list of unread notification ids that are visible in the UI
		 */
		unread: [],
		/**
		 * @var object current count status of notification types
		 */
		notificationCount: {
			/* @var integer length of all notifications (both unread and read) that will be visible in the overlay */
			all: 0,
			/* @var string a string representation the current number of unread notifications (1, 99, 99+) */
			unread: '0',
			/* @var integer the total number of all unread notifications including those not in the overlay */
			unreadRaw: 0
		},
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
			this.notificationCount.unread = newCount;
			this.notificationCount.unreadRaw = rawCount;
		},

		configuration: mw.config.get( 'wgEchoOverlayConfiguration' ),

		_getMarkAsReadButton: function() {
			var self = this;
			return $( '<button>' )
				.addClass( 'mw-ui-button' )
				.attr( 'id', 'mw-echo-mark-read-button' )
				.text( mw.msg( 'echo-mark-all-as-read' ) )
				.click( function ( e ) {
					e.preventDefault();
					// FIXME: Use postWithToken
					self.api.post( mw.echo.desktop.appendUseLang( {
						'action' : 'echomarkread',
						'all' : true,
						'token': mw.user.tokens.get( 'editToken' )
					} ) ).done( function ( result ) {
						var count;
						if ( result.query.echomarkread.count !== undefined ) {
							count = result.query.echomarkread.count;
							self.updateCount( count, result.query.echomarkread.rawcount );
							// Reset header to 'Notifications'
							$( '#mw-echo-overlay-title-text' ).html( mw.msg( 'echo-overlay-title' ) );
						}
					} );
				} );
		},

		_getFooterElement: function() {
			var $prefLink = $( '#pt-preferences a' ),
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
			return $overlayFooter;
		},

		_getTitleElement: function() {
			var titleText, includeMarkAsReadButton, overflow,
				counter = this.notificationCount,
				notificationsCount = counter.all,
				unreadRawTotalCount = counter.unreadRaw,
				unreadTotalCount = counter.unread,
				unreadCount = this.unread.length,
				$title = $( '<div>' ).addClass( 'mw-echo-overlay-title' );

			if ( notificationsCount > 0 ) {
				if ( unreadRawTotalCount > unreadCount ) {
					titleText = mw.msg(
						'echo-overlay-title-overflow',
						mw.language.convertNumber( unreadCount ),
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
			includeMarkAsReadButton = overflow &&
				unreadRawTotalCount < this.configuration[ 'max-notification-count' ];
			if ( includeMarkAsReadButton ) {
				// Add the 'mark all as read' button to the title area
				$title.append( this._getMarkAsReadButton() );
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
			return $title;
		},

		/**
		 * Builds an Echo notifications list
		 * @method
		 * @param object as returned by the api of notification items
		 * @return jQuery element
		 */
		_buildNotificationList: function( notifications ) {
			var self = this,
				$ul = $( '<ul>' ).addClass( 'mw-echo-notifications' )
					.css( 'max-height', $( window ).height() - 134 );


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
					self.unread.push( id );
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
			return $ul;
		},

		_buildOverlay: function ( notifications ) {
			var $ul,
				$overlay = $( '<div>' ).addClass( 'mw-echo-overlay' ),
				self = this;

			this.notificationCount.all = notifications.index.length;
			if ( this.notificationCount.all !== undefined ) {
				self.updateCount( notifications.count, notifications.rawcount );
			}

			$ul = self._buildNotificationList( notifications );
			self._getTitleElement().
				appendTo( $overlay );

			if ( $ul.find( 'li' ).length ) {
				$ul.appendTo( $overlay );
			}

			$overlay.append( self._getFooterElement() );
			self.markAsRead();

			this.$el = $overlay;
		},
		/**
		 * Mark a list of notifications as read
		 * @method
		 */
		markAsRead: function() {
			var self = this;
			// only need to mark as read if there is unread item
			if ( this.unread.length ) {
				this.api.post( mw.echo.desktop.appendUseLang( {
					'action' : 'echomarkread',
					'list' : this.unread.join( '|' ),
					'token': mw.user.tokens.get( 'editToken' )
				} ) ).done( function ( result ) {
					var count;
					if ( result.query.echomarkread.count !== undefined ) {
						count = result.query.echomarkread.count;
						self.updateCount( count, result.query.echomarkread.rawcount );
					}
				} );
			}
		}
	};

	mw.echo.overlay = {
		/**
		 * @var integer the maximum number of notifications to show in the overlay
		 */
		notificationLimit: 8,
		/**
		 * @var mw.Api
		 */
		api: new mw.Api( { ajax: { cache: false } } ),
		/**
		 * Builds an overlay element
		 * @method
		 * @param callback a callback which passes the newly created overlay as a parameter
		 */
		buildOverlay: function( callback ) {
			var apiData = {
				'action' : 'query',
				'meta' : 'notifications',
				'notformat' : 'flyout',
				'notlimit' : this.notificationLimit,
				'notprop' : 'index|list|count'
			};

			this.api.get( mw.echo.desktop.appendUseLang( apiData ) ).done( function ( result ) {
				var overlay = new EchoOverlay( result.query.notifications );
				callback( overlay.$el );
			} ).fail( function () {
				window.location.href = $( '#pt-notifications a' ).attr( 'href' );
			} );
		},
		removeOverlay: function () {
			$( '.mw-echo-overlay, .mw-echo-overlay-pokey' ).fadeOut( 'fast',
				function () {
					$( this ).remove();
				}
			);
		}
	};
} )( jQuery, mediaWiki );
