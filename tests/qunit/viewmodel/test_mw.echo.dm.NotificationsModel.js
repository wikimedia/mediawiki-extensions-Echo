( function ( mw, $ ) {
	var echoApi,
		mockCounter,
		noop = function () {};

	QUnit.module( 'ext.echo.dm mw.echo.dm.NotificationsModel' );

	function runPreparation( model, testPrepare ) {
		var j, jlen;

		for ( j = 0, jlen = testPrepare.length; j < jlen; j++ ) {
			model[ testPrepare[ j ].method ].apply( model, testPrepare[ j ].params );
		}
	}

	// Helper method to get an array of item ids for testing
	function getIdArray( arr ) {
		return arr.map( function ( item ) {
			return item.getId();
		} );
	}

	// Set up a dummy API handler to avoid sending requests to the API during tests
	function TestApiHandler() {
		// Parent constructor
		TestApiHandler.parent.call( this );
	}
	/* Setup */
	OO.inheritClass( TestApiHandler, mw.echo.api.APIHandler );
	// Override api call
	TestApiHandler.prototype.markItemsRead = function () {
		return $.Deferred().resolve( 0 );
	};

	mockCounter = { estimateChange: noop, update: noop };

	// Create an Echo API instance
	echoApi = new mw.echo.api.EchoApi();
	// HACK: Reach into the EchoAPI to create a test handler
	echoApi.network.addCustomApiHandler( 'test', new TestApiHandler() );

	QUnit.test( 'Adding notifications', function ( assert ) {
		var initialItems = [
				new mw.echo.dm.NotificationItem( 0, { timestamp: '20150828173000', read: false } ),
				new mw.echo.dm.NotificationItem( 1, { timestamp: '20150828173100', read: false } ),
				new mw.echo.dm.NotificationItem( 2, { timestamp: '20150828173200', read: false } )
			],
			cases = [
				{
					items: initialItems,
					expected: [ 2, 1, 0 ],
					msg: 'Inserting items in timestamp order.'
				},
				{
					items: [
						initialItems[ 0 ],
						initialItems[ 1 ],
						initialItems[ 2 ],
						initialItems[ 0 ]
					],
					expected: [ 2, 1, 0 ],
					msg: 'Reinserting an item to its rightful position.'
				},
				{
					items: [
						new mw.echo.dm.NotificationItem( 0, { timestamp: '20150828173000', read: false } ),
						new mw.echo.dm.NotificationItem( 1, { timestamp: '20150828173100', read: false } ),
						new mw.echo.dm.NotificationItem( 2, { timestamp: '20150828173200', read: false } )
					],
					run: [
						{
							item: 0,
							method: 'setTimestamp',
							args: [ '20150830173000' ] // Newer timestamp
						}
					],
					expected: [ 0, 2, 1 ],
					msg: 'Changing timestamp on an item.'
				},
				{
					items: [
						new mw.echo.dm.NotificationItem( 0, { timestamp: '20150828173000', read: false } ),
						new mw.echo.dm.NotificationItem( 1, { timestamp: '20150828173100', read: false } ),
						new mw.echo.dm.NotificationItem( 2, { timestamp: '20150828173200', read: false } )
					],
					run: [
						{
							item: 1,
							method: 'toggleRead',
							args: [ true ] // Item is read
						}
					],
					expected: [ 2, 0, 1 ],
					msg: 'Changing read status of an item.'
				}
			];

		QUnit.expect( cases.length );

		cases.forEach( function ( test ) {
			var r, runCase, runItem,
				model = new mw.echo.dm.NotificationsModel( echoApi, mockCounter, {
					type: 'alert',
					source: 'test',
					limit: 25,
					userLang: 'en'
				} );

			model.addItems( test.items );

			if ( test.add ) {
				model.addItems( test.add.items );
			}
			if ( test.run ) {
				for ( r = 0; r < test.run.length; r++ ) {
					runCase = test.run[ r ];
					runItem = test.items[ runCase.item ];
					runItem[ runCase.method ].apply( runItem, runCase.args );
				}
			}

			assert.deepEqual( getIdArray( model.getItems() ), test.expected, test.msg );
		}, this );
	} );

	QUnit.test( 'Deleting notifications', 2, function ( assert ) {
		var model = new mw.echo.dm.NotificationsModel( echoApi, mockCounter, {
				type: 'alert',
				source: 'test',
				limit: 25,
				userLang: 'en'
			} ),
			items = [
				new mw.echo.dm.NotificationItem( 1, { content: '1', timestamp: '20150828172900' } ),
				new mw.echo.dm.NotificationItem( 2, { content: '2', timestamp: '20150828172900' } ),
				new mw.echo.dm.NotificationItem( 3, { content: '3', timestamp: '20150828172900' } ),
				new mw.echo.dm.NotificationItem( 4, { content: '4', timestamp: '20150828172900' } ),
				new mw.echo.dm.NotificationItem( 5, { content: '5', timestamp: '20150828172900' } ),
				new mw.echo.dm.NotificationItem( 6, { content: '6', timestamp: '20150828172900' } ),
				new mw.echo.dm.NotificationItem( 7, { content: '7', timestamp: '20150828172900' } ),
				new mw.echo.dm.NotificationItem( 8, { content: '8', timestamp: '20150828172900' } ),
				new mw.echo.dm.NotificationItem( 9, { content: '9', timestamp: '20150828172900' } ),
				new mw.echo.dm.NotificationItem( 10, { content: '10', timestamp: '20150828172900' } )
			];

		// Add initial notifications
		model.addItems( items );

		// Verify we have the correct number initially
		assert.equal( model.getItemCount(), 10, 'Added initial number of notifications' );

		// Remove notifications
		model.removeItems( [ items[ 0 ], items[ 1 ], items[ 5 ] ] );

		// Test
		assert.equal( model.getItemCount(), 7, 'Successfully deleted notifications' );
	} );

	QUnit.test( 'Clearing notifications', function ( assert ) {
		var i, ilen, model, actual, test,
			cases = [
				{
					prepare: [
						{
							method: 'addItems',
							params: [
								[
									new mw.echo.dm.NotificationItem( 1, {
										content: '1',
										timestamp: '20150828172900'
									} ),
									new mw.echo.dm.NotificationItem( 2, { content: '2', timestamp: '20150828172900' } )
								]
							]
						},
						{
							method: 'clearItems'
						}
					],
					run: {
						method: 'getItemCount'
					},
					expect: 0,
					message: 'Clearing notifications'
				}
			];

		assert.expect( cases.length );

		for ( i = 0, ilen = cases.length; i < ilen; i++ ) {
			model = new mw.echo.dm.NotificationsModel( echoApi, mockCounter, {
				type: 'alert',
				source: 'test',
				limit: 25,
				userLang: 'en'
			} );

			test = cases[ i ];

			// Run preparation
			runPreparation( model, test.prepare );

			// Test
			actual = model[ test.run.method ].apply( model, cases[ i ].run.params );
			assert.equal( actual, cases[ i ].expect, cases[ i ].message );
		}
	} );

	QUnit.test( 'Changing read/unread status', function ( assert ) {
		var i,
			initialItems = [
				new mw.echo.dm.NotificationItem( 0, { timestamp: '20150828173000', read: false } ),
				new mw.echo.dm.NotificationItem( 1, { timestamp: '20150828173100', read: false } ),
				new mw.echo.dm.NotificationItem( 2, { timestamp: '20150828173200', read: false } ),
				new mw.echo.dm.NotificationItem( 3, { timestamp: '20150828173300', read: false } ),
				// Notice that in item 4 the timestamp is earlier
				new mw.echo.dm.NotificationItem( 4, { timestamp: '20150828172900', read: true } ),
				new mw.echo.dm.NotificationItem( 5, { timestamp: '20150828173500', read: true } )
			],
			cases = [
				{
					items: initialItems,
					expected: [ 3, 2, 1, 0, 5, 4 ],
					msg: 'Items organized by read/unread groups'
				},
				{
					items: initialItems,
					markRead: [ initialItems[ 1 ], initialItems[ 3 ] ],
					expected: [ 2, 0, 5, 3, 1, 4 ],
					msg: 'Items marked as read are pushed to the end'
				}
			];

		QUnit.expect( cases.length );

		cases.forEach( function ( test ) {
			var model = new mw.echo.dm.NotificationsModel( echoApi, mockCounter, {
					type: 'alert',
					source: 'test',
					limit: 25,
					userLang: 'en'
				} );

			model.addItems( test.items );

			if ( test.markRead ) {
				for ( i = 0; i < test.markRead.length; i++ ) {
					test.markRead[ i ].toggleRead( true );
				}
			}

			assert.deepEqual( getIdArray( model.getItems() ), test.expected, test.msg );
		}, this );
	} );

} )( mediaWiki, jQuery );
