( function( $, mw ) {
	QUnit.module( 'ext.echo.overlay', {
		setup: function() {
			this.$badge = $( '<a class="mw-echo-notifications-badge mw-echo-unread-notifications">1</a>' );
			this.sandbox.stub( mw.echo, 'getBadge' ).returns( this.$badge );
			// Kill any existing overlays to avoid clashing with other tests
			$( '.mw-echo-overlay' ).remove();

			var ApiStub = function( mode, numberUnreadMessages ) {
				this.mode = mode;
				this.numberUnreadMessages = numberUnreadMessages || 7;
			};
			ApiStub.prototype = {
				post: function( data ) {
					return new $.Deferred().resolve( this.getNewNotificationCountData( data ) );
				},
				get: function() {
					var i, id,
						index = [], listObj = {},
						data = this.getData();
					if ( this.mode === 1 ) {
						data.query.notifications.message = {
							index: [ 100 ],
							list: {
								100: {
									'*': 'Jon sent you a message on the Flow board Talk:XYZ',
									read: '20140805211446',
									category: 'message',
									id: 100,
									type: 'message'
								}
							},
							rawcount: 0,
							count: '0'
						};
					} else if ( this.mode === 2 ) {
						for ( i = 0; i < 7; i++ ) {
							id = 500 + i;
							index.push( id );
							listObj[id] = { '*': '!', category: 'message', id: id, type: 'message' };
						}
						data.query.notifications.message = {
							index: index,
							list: listObj,
							rawcount: this.numberUnreadMessages,
							count: '' + this.numberUnreadMessages
						};
						// Total number is number of messages + number of alerts (1)
						data.query.notifications.count = this.numberUnreadMessages + 1;
						data.query.notifications.rawcount = this.numberUnreadMessages + 1;
					}
					return $.Deferred().resolve( data );
				},
				getNewNotificationCountData: function( data ) {
					var alertCount, messageCount,
						rawCount = 0,
						count = 0;

					messageCount = {
						count: '0',
						rawcount: 0
					};
					if ( data.list === '100' ) {
						alertCount = {
							count: '1',
							rawcount: 1
						};
						count = 1;
						rawCount = 1;
					} else if ( data.list === 500 ) {
						messageCount = {
							count: '6',
							rawcount: 6
						};
						rawCount = 7;
						count = 7;
					} else {
						alertCount = {
							count: '0',
							rawcount: 0
						};
					}
					data = {
						query: {
							echomarkread: {
								alert: alertCount,
								message: messageCount,
								rawcount: rawCount,
								count: count
							}
						}
					};
					return data;
				},
				getData: function() {
					return {
						query: {
							notifications: {
								count: '1',
								rawcount: 1,
								message: {
									rawcount: 0,
									count: '0',
									index: [],
									list: {}
								},
								alert: {
									rawcount: 1,
									count: '1',
									index: [ 70, 71 ],
									list: {
										70: {
											'*': 'Jon mentioned you.',
											agent: { id: 212, name: 'Jon' },
											category: 'mention',
											id: 70,
											read: '20140805211446',
											timestamp: {
												unix: '1407273276'
											},
											title: {
												full: 'Spiders'
											},
											type: 'mention'
										},
										71: {
											'*': 'X talked to you.',
											category: 'edit-user-talk',
											id: 71,
											type: 'edit-user-talk'
										}
									}
								}
							}
						}
					};
				}
			};
			this.ApiStub = ApiStub;
		}
	} );

	QUnit.test( 'mw.echo.overlay.buildOverlay', 7, function( assert ) {
		var $overlay;
		this.sandbox.stub( mw.echo.overlay, 'api', new this.ApiStub() );
		mw.echo.overlay.buildOverlay( function( $o ) {
			$overlay = $o;
		} );
		assert.strictEqual( $overlay.find( '.mw-echo-overlay-title ul li' ).length, 1, 'Only one tab in header' );
		assert.strictEqual( $overlay.find( '.mw-echo-notifications' ).length, 1, 'Overlay contains a list of notifications.' );
		assert.strictEqual( $overlay.find( '.mw-echo-notifications li' ).length, 2, 'There are two notifications.' );
		assert.strictEqual( $overlay.find( '.mw-echo-unread' ).length, 1, 'There is one unread notification.' );
		assert.strictEqual( $overlay.find( '#mw-echo-overlay-footer a' ).length, 2,
			'There is a footer with 2 links to preferences and all notifications.' );
		assert.strictEqual( this.$badge.text(),
			'0', 'The alerts are marked as read once opened.' );
		assert.strictEqual( this.$badge.hasClass( 'mw-echo-unread-notifications' ),
			false, 'The badge no longer indicates new messages.' );
	} );

	QUnit.test( 'mw.echo.overlay.buildOverlay with messages', 5, function( assert ) {
		var $overlay;
		this.sandbox.stub( mw.echo.overlay, 'api', new this.ApiStub( 1 ) );
		mw.echo.overlay.buildOverlay( function( $o ) {
			$overlay = $o;
		} );
		assert.strictEqual( $overlay.find( '.mw-echo-overlay-title ul li' ).length, 2, 'There are two tabs in header' );
		assert.strictEqual( $overlay.find( '.mw-echo-notifications' ).length, 2, 'Overlay contains 2 lists of notifications.' );
		assert.strictEqual( $overlay.find( '.mw-echo-overlay-title a' ).eq( 0 ).hasClass( 'mw-ui-active' ),
			true, 'First tab is the selected tab upon opening.' );
		assert.strictEqual( this.$badge.text(),
			'1', 'The label stays as 1 until you switch tabs.' );
		assert.strictEqual( this.$badge.hasClass( 'mw-echo-unread-notifications' ),
			true, 'The notification button class is not updated until you switch to alert tab.' );
	} );

	QUnit.test( 'Switch tabs on overlay. No unread messages, 1 unread alert.', 4, function( assert ) {
		var $overlay, $tabs;

		this.sandbox.stub( mw.echo.overlay, 'api', new this.ApiStub( 1 ) );
		mw.echo.overlay.buildOverlay( function( $o ) {
			$overlay = $o;
			$tabs = $overlay.find( '.mw-echo-overlay-title li a' );
		} );

		// switch to 2nd tab
		$overlay.find( '.mw-echo-overlay-title li a' ).eq( 1 ).trigger( 'click' );

		assert.strictEqual( $tabs.eq( 0 ).hasClass( 'mw-ui-active' ),
			false, 'First tab is now the selected tab.' );
		assert.strictEqual( $tabs.eq( 1 ).hasClass( 'mw-ui-active' ),
			true, 'Second tab is now the selected tab.' );
		assert.strictEqual( this.$badge.text(),
			'0', 'The label is now set to 0.' );
		assert.strictEqual( this.$badge.hasClass( 'mw-echo-unread-notifications' ),
			false, 'There are now zero unread notifications.' );
	} );

	QUnit.test( 'Tabs have labels with counts in them.', 4, function( assert ) {
		var $overlay, $tabs, beforeAlertText, afterAlertText;

		this.sandbox.stub( mw.echo.overlay, 'api', new this.ApiStub( 1 ) );
		mw.echo.overlay.buildOverlay( function( $o ) {
			$overlay = $o;
			$tabs = $overlay.find( '.mw-echo-overlay-title li a' );
			beforeAlertText = $overlay.find( '.mw-echo-overlay-title li a' ).eq( 1 ).text();
			$tabs.eq( 1 ).trigger( 'click' );
			afterAlertText = $overlay.find( '.mw-echo-overlay-title li a' ).eq( 1 ).text();
		} );

		// switch to 2nd tab
		$tabs = $overlay.find( '.mw-echo-overlay-title li a' );
		assert.strictEqual( $overlay.find( '.mw-echo-overlay-title li a' ).eq( 0 ).text(), 'Messages (0)', 'Check the label has a count in it.' );
		assert.strictEqual( beforeAlertText, 'Alerts (1)', 'Check the label has a count in it.' );
		assert.strictEqual( afterAlertText, 'Alerts (0)', 'Check the label has an updated count in it.' );
		assert.strictEqual( $overlay.find( '.mw-echo-overlay-title li a' ).eq( 1 ).hasClass( 'mw-ui-active' ),
			true, 'Second tab is the selected tab.' );
	} );

	QUnit.test( 'Unread message behaviour', 5, function( assert ) {
		var $overlay;

		this.sandbox.stub( mw.echo.overlay, 'api', new this.ApiStub( 2 ) );
		mw.echo.overlay.buildOverlay( function( $o ) {
			$overlay = $o;
		} );

		// Test initial state
		assert.strictEqual( $overlay.find( '.mw-echo-overlay-title li a' ).eq( 0 ).text(), 'Messages (7)',
			'Check the label has a count in it and it is not automatically reset when tab is open.' );
		assert.strictEqual( $overlay.find( '.mw-echo-unread' ).length, 8, 'There are 8 unread notifications.' );

		// Click mark as read
		$overlay.find( '.mw-echo-notifications > button' ).eq( 0 ).trigger( 'click' );
		assert.strictEqual( $overlay.find( '.mw-echo-overlay-title li a' ).eq( 0 ).text(), 'Messages (0)',
			'Check all the notifications (even those outside overlay) have been marked as read.' );
		assert.strictEqual( $overlay.find( '.mw-echo-notifications ' ).eq( 0 ).find( '.mw-echo-unread' ).length,
			0, 'There are now no unread notifications in this tab.' );
		assert.strictEqual( $overlay.find( '.mw-echo-notifications > button' ).length, 0,
			'There are no notifications now so no need for button.' );
	} );

	QUnit.test( 'Mark as read.', 8, function( assert ) {
		var $overlay;
		this.$badge.text( '8' );
		this.sandbox.stub( mw.echo.overlay, 'api', new this.ApiStub( 2 ) );
		mw.echo.overlay.buildOverlay( function( $o ) {
			$overlay = $o;
		} );

		// Test initial state
		assert.strictEqual( $overlay.find( '.mw-echo-overlay-title li a' ).eq( 0 ).text(), 'Messages (7)',
			'Check the label has a count in it and it is not automatically reset when tab is open.' );
		assert.strictEqual( $overlay.find( '.mw-echo-unread' ).length, 8, 'There are 8 unread notifications.' );
		assert.strictEqual( this.$badge.text(), '8', '8 unread notifications in badge.' );
		assert.strictEqual( $overlay.find( '.mw-echo-notifications li button' ).length, 7,
			'There are 7 mark as read button.' );

		// Click first mark as read
		$overlay.find( '.mw-echo-notifications li button' ).eq( 0 ).trigger( 'click' );

		assert.strictEqual( $overlay.find( '.mw-echo-overlay-title li a' ).eq( 0 ).text(), 'Messages (6)',
			'Check the notification was marked as read.' );
		assert.strictEqual( $overlay.find( '.mw-echo-unread' ).length, 7, 'There are now 7 unread notifications.' );
		assert.strictEqual( $overlay.find( '.mw-echo-notifications li button' ).length, 6,
			'There are now 6 mark as read buttons.' );
		assert.strictEqual( this.$badge.text(), '7', 'Now 7 unread notifications.' );
	} );

	QUnit.test( 'Tabs when there is overflow.', 2, function( assert ) {
		var $overlay;
		this.sandbox.stub( mw.echo.overlay, 'api', new this.ApiStub( 2, 50 ) );
		mw.echo.overlay.buildOverlay( function( $o ) {
			$overlay = $o;
		} );

		// Test initial state
		assert.strictEqual( $overlay.find( '.mw-echo-overlay-title li a' ).eq( 0 ).text(), 'Messages (50)',
			'Check the label has a count in it and reflects the total unread and not the shown unread' );
		assert.strictEqual( $overlay.find( '.mw-echo-unread' ).length, 8, 'There are 8 unread notifications.' );
	} );

	QUnit.test( 'Switching tabs visibility', 4, function( assert ) {
		var $overlay;

		this.sandbox.stub( mw.echo.overlay, 'api', new this.ApiStub( 2 ) );
		mw.echo.overlay.buildOverlay( function( $o ) {
			// put in dom so we can do visibility tests
			$overlay = $o.appendTo( '#qunit-fixture' );
		} );

		// Test initial state
		assert.strictEqual( $overlay.find( '.mw-echo-notifications' ).eq( 0 ).is( ':visible' ),
			true, 'First tab is visible.' );
		assert.strictEqual( $overlay.find( '.mw-echo-notifications' ).eq( 1 ).is( ':visible' ),
			false, 'Second tab starts hidden.' );

		// Switch to second tab
		$overlay.find( '.mw-echo-overlay-title li a' ).eq( 1 ).trigger( 'click' );

		// check new tab visibility
		assert.strictEqual( $overlay.find( '.mw-echo-notifications' ).eq( 0 ).is( ':visible' ),
			false, 'First tab is now hidden.' );
		assert.strictEqual( $overlay.find( '.mw-echo-notifications' ).eq( 1 ).is( ':visible' ),
			true, 'Second tab is now visible.' );
	} );
}( jQuery, mediaWiki ) );
