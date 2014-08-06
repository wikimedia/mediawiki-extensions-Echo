( function( $, mw ) {
	QUnit.module( 'ext.echo.overlay', {
		setup: function() {
			this.$badge = $( '<a class="mw-echo-notifications-badge mw-echo-unread-notifications">1</a>' );
			this.sandbox.stub( mw.echo, 'getBadge' ).returns( this.$badge );
			// Kill any existing overlays to avoid clashing with other tests
			$( '.mw-echo-overlay' ).remove();

			var ApiStub = function( mode ) {
				this.mode = mode;
			};
			ApiStub.prototype = {
				post: function( data ) {
					return new $.Deferred().resolve( this.getNewNotificationCountData( data ) );
				},
				get: function() {
					var data = this.getData();
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
							}
						};
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
									index: [],
									list: {}
								},
								alert: {
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
		assert.strictEqual( $overlay.find( 'ul.mw-echo-notifications' ).length, 1, 'Overlay contains a list of notifications.' );
		assert.strictEqual( $overlay.find( 'ul.mw-echo-notifications li' ).length, 2, 'There are two notifications.' );
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
		assert.strictEqual( $overlay.find( '.mw-echo-overlay-title li' ).eq( 0 ).hasClass( 'mw-echo-section-current' ),
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
			$tabs = $overlay.find( '.mw-echo-overlay-title li' );
		} );

		// switch to 2nd tab
		$overlay.find( '.mw-echo-overlay-title li' ).eq( 1 ).trigger( 'click' );

		assert.strictEqual( $tabs.eq( 0 ).hasClass( 'mw-echo-section-current' ),
			false, 'First tab is now the selected tab.' );
		assert.strictEqual( $tabs.eq( 1 ).hasClass( 'mw-echo-section-current' ),
			true, 'Second tab is now the selected tab.' );
		assert.strictEqual( this.$badge.text(),
			'0', 'The label is now set to 0.' );
		assert.strictEqual( this.$badge.hasClass( 'mw-echo-unread-notifications' ),
			false, 'There are now zero unread notifications.' );
	} );

}( jQuery, mediaWiki ) );
