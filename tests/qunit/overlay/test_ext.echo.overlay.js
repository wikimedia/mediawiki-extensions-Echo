( function( $, mw ) {
	QUnit.module( 'ext.echo.overlay', {
		setup: function() {
			var ApiStub = function() {};
			ApiStub.prototype = {
				post: function() {
					return $.Deferred().resolve( {
						query: {
							echomarkread: {
								count: 0
							}
						}
					} );
				},
				get: function() {
					return new $.Deferred().resolve( {
						query: {
							notifications: {
								index: [ 70, 71 ],
								count: '1',
								rawcount: 1,
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
					} );
				}
			};
			this.sandbox.stub( mw, 'Api', ApiStub );
		}
	} );

	QUnit.test( 'mw.echo.overlay.buildOverlay', 5, function( assert ) {
		var $overlay;
		mw.echo.overlay.buildOverlay( function( $o ) {
			$overlay = $o;
		} );
		assert.strictEqual( $overlay.find( 'ul' ).length, 1, 'Overlay contains a list of notifications.' );
		assert.strictEqual( $overlay.find( 'li' ).length, 2, 'There are two notifications.' );
		assert.strictEqual( $overlay.find( '.mw-echo-unread' ).length, 1, 'There is one unread notification.' );
		assert.strictEqual( $overlay.find( '#mw-echo-overlay-footer a' ).length, 2,
			'There is a footer with 2 links to preferences and all notifications.' );
		assert.strictEqual( $overlay.find( 'a#mw-echo-overlay-moreinfo-link' ).length, 1,
			'There is a help link.' );
	} );

}( jQuery, mediaWiki ) );
