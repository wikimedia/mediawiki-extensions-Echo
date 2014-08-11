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

	function EchoOverlayTab( name, notifications ) {
		this.api = mw.echo.overlay.api;
		this.name = name;
		this.unread = [];
		this._buildList( notifications );
	}

	EchoOverlayTab.prototype = {
		unread: [],
		getUnreadIds: function() {
			return this.unread;
		},
		/**
		 * Mark all unread notifications as read
		 * @method
		 * @return jQuery.Deferred
		 */
		markAsRead: function() {
			var self = this;
			// only need to mark as read if there is unread item
			if ( this.unread.length ) {
				return this.api.post( mw.echo.desktop.appendUseLang( {
					'action' : 'echomarkread',
					'list' : this.unread.join( '|' ),
					'token': mw.user.tokens.get( 'editToken' )
				} ) ).then( function ( result ) {
					return result.query.echomarkread[self.name];
				} ).done( function() {
					// reset internal state of unread messages
					self.unread = [];
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
				$ul = $( '<ul>' ).addClass( 'mw-echo-notifications' )
					.data( 'tab', this )
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
			this.$el = $ul;
		}
	};

	EchoOverlay.prototype = {
		/**
		 * @var string the name of the tab that is currently active
		 */
		activeTabName: 'alert',
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
			var $lists = this.$el.find( '.mw-echo-notifications' ).hide(),
				self = this;

			this.activeTabName = tab.name;
			$lists.each( function() {
				if ( $( this ).data( 'tab' ).name === tab.name ) {
					$( this ).show();
					tab.markAsRead().done( function( data ) {
						self.updateBadgeCount( data.count, data.rawcount );
						self._updateTitleElement();
					} );
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
					label = mw.msg( 'echo-notification-' + tabName, echoTab.getUnreadIds().length );

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
					.addClass( echoTab.name === self.activeTabName ? 'mw-ui-active' : 'mw-ui-quiet' )
					.text( label ).appendTo( $li );
			} );
			return $ul;
		},

		getUnreadCount: function() {
			var count = 0;
			$.each( this.tabs, function( i, tab ) {
				count += tab.getUnreadIds().length;
			} );
			return count;
		},

		_getTitleElement: function() {
			var $title = $( '<div>' ).addClass( 'mw-echo-overlay-title' )
				.append( this._getTabsElement() );
			this._showTabList( this.tabs[0] );
			return $title;
		},

		_buildOverlay: function ( notifications ) {
			var tabs,
				self = this,
				$overlay = $( '<div>' ).addClass( 'mw-echo-overlay' );

			this.$el = $overlay;

			if ( notifications.message.index.length ) {
				tabs = [ 'message', 'alert' ];
			} else {
				tabs = [ 'alert' ];
			}

			$.each( tabs, function( i, tabName ) {
				var tab = new EchoOverlayTab( tabName, notifications[tabName] );
				self.$el.append( tab.$el );
				self.tabs.push( tab );
				self.notificationCount.all += notifications[tabName].index.length;
			} );
			this.activeTabName = this.tabs[0].name;

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
			$( '.mw-echo-overlay, .mw-echo-overlay-pokey' ).fadeOut( 'fast',
				function () {
					$( this ).remove();
				}
			);
		}
	};
} )( jQuery, mediaWiki );
