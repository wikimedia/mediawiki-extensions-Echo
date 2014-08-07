/*global window:false */
( function ( $, mw ) {
	'use strict';

	// backwards compatibility <= MW 1.21
	var getUrl = mw.util.getUrl || mw.util.wikiGetlink;

	function EchoOverlay( apiResultNotifications ) {
		this.api = mw.echo.overlay.api;
		// set internal properties
		this.tabs = [];
		this._buildOverlay( apiResultNotifications );
	}

	function EchoOverlayTab( options, notifications ) {
		this.api = mw.echo.overlay.api;
		this.markOnView = options.markOnView;
		this.markAsReadCallback = options.markAsReadCallback;
		this.name = options.name;
		this.unread = [];
		this._totalUnread = notifications[this.name].rawcount;
		this._buildList( notifications[this.name] );
	}

	EchoOverlayTab.prototype = {
		/* @var integer totalUnread the number of unread notifications in this tab.
			including those that are not visible. */
		/**
		 * Return a list of unread and shown ids
		 * @method
		 * @param integer id of a notification to mark as read
		 * @return jQuery.Deferred
		 */
		getUnreadIds: function() {
			return this.unread;
		},
		/**
		 * Get a count the number of all unread notifications of this type
		 * @method
		 * @param integer id of a notification to mark as read
		 * @return integer
		 */
		getNumberUnread: function() {
			return this._totalUnread;
		},
		/**
		 * Mark all existing notifications as read
		 * @method
		 * @param integer id of a notification to mark as read
		 * @return jQuery.Deferred
		 */
		markAsRead: function( id ) {
			var self = this, data;
			// only need to mark as read if there is unread item
			if ( this.unread.length ) {
				data = {
					'action' : 'echomarkread',
					'token': mw.user.tokens.get( 'editToken' )
				};
				if ( id ) {
					// If id is given mark that as read otherwise use all unread messages
					data.list = id;
				} else {
					data.all = 1;
				}

				return this.api.post( mw.echo.desktop.appendUseLang( data ) ).then( function ( result ) {
					return result.query.echomarkread;
				} ).done( function( result ) {
					// reset internal state of unread messages
					if ( id ) {
						if ( self.unread.indexOf( id ) > -1 ) {
							self.unread.splice( self.unread.indexOf( id ), 1 );
						}
					} else {
						self.unread = [];
					}
					// update the count
					self._totalUnread = result[self.name].rawcount;
					self.markAsReadCallback( result, id );
				} );
			} else {
				return new $.Deferred();
			}
		},
		/**
		 * Builds an Echo notifications list
		 * @method
		 * @param string tabName the tab
		 * @param object notifications as returned by the api of notification items
		 * @return jQuery element
		 */
		_buildList: function( notifications ) {
			var self = this,
				$container = $( '<div class="mw-echo-notifications">' )
					.data( 'tab', this )
					.css( 'max-height', $( window ).height() - 134 ),
				$ul = $( '<ul>' ).appendTo( $container );

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

				if ( !data['*'] ) {
					return;
				}

				$li.append( data['*'] )
					.appendTo( $ul );

				if ( !data.read ) {
					$li.addClass( 'mw-echo-unread' );
					self.unread.push( id );
					if ( !self.markOnView ) {
						$( '<button class="mw-ui-button mw-ui-quiet">&times;</button>' )
							.on( 'click', function( ev ) {
								ev.preventDefault();
								self.markAsRead( $( this ).closest( 'li' ).data( 'notification-event' ) );
							} ).appendTo( $li );
					}
				}

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

			if ( !this.markOnView && this.unread.length ) {
				$( '<button class="mw-ui-button mw-ui-quiet">' )
					.text( mw.msg( 'echo-mark-all-as-read' ) )
					.on( 'click', function() {
						var $btn = $( this );
						self.markAsRead().done( function() {
							self.$el.find( '.mw-echo-unread' ).removeClass( 'mw-echo-unread' );
							$btn.remove();
						} );
					} )
					.prependTo( $container );
			}
			this.$el = $container;
		}
	};

	EchoOverlay.prototype = {
		/**
		 * @var array a list of EchoOverlayTabs
		 */
		tabs: [],
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
		 * FIXME: This should be pulled out of EchoOverlay and use an EventEmitter.
		 * @param newCount formatted count
		 * @param rawCount unformatted count
		 */
		updateBadgeCount: function ( newCount, rawCount ) {
			var $badge = mw.echo.getBadge();
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

		_showTabList: function( tab ) {
			var $lists = this.$el.find( '.mw-echo-notifications' ).hide();

			this._activeTab = tab;
			$lists.each( function() {
				if ( $( this ).data( 'tab' ).name === tab.name ) {
					$( this ).show();
					if ( tab.markOnView ) {
						tab.markAsRead();
					}
				}
			} );
		},


		_updateTitleElement: function() {
			var $header;
			$header = this.$el.find( '.mw-echo-overlay-title' );
			this._getTitleElement().insertBefore( $header );
			$header.remove();
		},

		_getTabsElement: function() {
			var $li,
				$ul = $( '<ul>' ), self = this;

			$.each( this.tabs, function( i, echoTab ) {
				var
					tabName = echoTab.name,
					// @todo: Unread value is inaccurate. If a user has more than mw.echo.overlay.notificationLimit
					// API change needed
					label = mw.msg( 'echo-notification-' + tabName, echoTab.getNumberUnread() );

				$li = $( '<li>' )
					.appendTo( $ul );

				$( '<a class="mw-ui-progressive">' )
					.on( 'click', function() {
						var $this = $( this );
						$ul.find( 'a' ).removeClass( 'mw-ui-active' ).addClass( 'mw-ui-quiet' );
						$this.addClass( 'mw-ui-active' ).removeClass( 'mw-ui-quiet');
						self._showTabList( $this.data( 'tab' ) );
					} )
					.data( 'tab', echoTab )
					.addClass( echoTab.name === self._activeTab.name ? 'mw-ui-active' : 'mw-ui-quiet' )
					.text( label ).appendTo( $li );
			} );
			return $ul;
		},

		getUnreadCount: function() {
			var count = 0;
			$.each( this.tabs, function( i, tab ) {
				count += tab.getNumberUnread();
			} );
			return count;
		},

		_getTitleElement: function() {
			var $title = $( '<div>' ).addClass( 'mw-echo-overlay-title' )
				.append( this._getTabsElement() );
			this._showTabList( this._activeTab );
			return $title;
		},

		_buildOverlay: function ( notifications ) {
			var tabs,
				self = this,
				options = {
					markAsReadCallback: function( data, id ) {
						self.updateBadgeCount( data.count, data.rawcount );
						self._updateTitleElement();
						if ( id ) {
							self.$el.find( '[data-notification-event="' + id + '"]').removeClass( 'mw-echo-unread' )
								.find( 'button' ).remove();
						}
					}
				},
				$overlay = $( '<div>' ).addClass( 'mw-echo-overlay' );

			this.$el = $overlay;

			if ( notifications.message.index.length ) {
				tabs = [ { name: 'message' }, { name: 'alert', markOnView: true } ];
			} else {
				tabs = [ { name: 'alert', markOnView: true } ];
			}

			$.each( tabs, function( i, tabOptions ) {
				var tab = new EchoOverlayTab( $.extend( tabOptions, options ), notifications );
				self.$el.append( tab.$el );
				self.tabs.push( tab );
				self.notificationCount.all += notifications[tabOptions.name].index.length;
			} );
			this._activeTab = this.tabs[0];

			$overlay.prepend( this._getTitleElement() );
			$overlay.append( this._getFooterElement() );
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
				notsections : 'alert|message',
				notgroupbysection: 1,
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
			$( '.mw-echo-overlay' ).fadeOut( 'fast',
				function () {
					$( this ).remove();
				}
			);
		}
	};
} )( jQuery, mediaWiki );
