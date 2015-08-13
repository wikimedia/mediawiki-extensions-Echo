( function ( mw ) {
	QUnit.module( 'ext.echo.dm mw.echo.dm.NotificationsModel' );

	function runPreparation( model, testPrepare ) {
		var j, jlen;

		for ( j = 0, jlen = testPrepare.length; j < jlen; j++ ) {
			model[ testPrepare[j].method ].apply( model, testPrepare[j].params );
		}
	}

	QUnit.test( 'Adding notifications', function ( assert ) {
		var i, ilen, model, actual, test,
			cases = [
				{
					prepare: [
						{
							method: 'addItems',
							params: [
								[
									new mw.echo.dm.NotificationItem( 1, { content: '1', timestamp: '20150828172900' } ),
									new mw.echo.dm.NotificationItem( 2, { content: '2', timestamp: '20150828172900' } )
								]
							]
						}
					],
					run: {
						method: 'getItemCount'
					},
					expect: 2,
					message: 'Adding items'
				},
				{
					prepare: [
						{
							method: 'addItems',
							params: [
								[
									new mw.echo.dm.NotificationItem( 1, { content: '1', timestamp: '20150828172900' } ),
									new mw.echo.dm.NotificationItem( 2, { content: '2', timestamp: '20150828172900' } )
									// TODO: This should actually work, but due to a bug in List, the 'don't add items twice'
									// only works when we explicitly request to add the item a separate second time.
									// This should be fixed in List and upstreamed to OOUI GroupElement which is where
									// it came from.
									// new mw.echo.dm.NotificationItem( 1, { content: '1', timestamp: '20150828172900' } )
								]
							]
						},
						{
							method: 'addItems',
							params: [
								[
									new mw.echo.dm.NotificationItem( 1, { content: '1', timestamp: '20150828172900' } )
								]
							]
						}
					],
					run: {
						method: 'getItemCount'
					},
					expect: 2,
					message: 'Do not re-add items with existing ids'
				}
			];

		assert.expect( cases.length );

		for ( i = 0, ilen = cases.length; i < ilen; i++ ) {
			model = new mw.echo.dm.NotificationsModel( {
				type: 'alert',
				limit: 25,
				userLang: 'en'
			} );

			test = cases[i];

			// Run preparation
			runPreparation( model, test.prepare );

			// Test
			actual = model[ test.run.method ].apply( model, cases[i].run.params );
			assert.equal( actual, cases[i].expect, cases[i].message );
		}
	} );

	QUnit.test( 'Deleting notifications', 2, function ( assert ) {
		var model = new mw.echo.dm.NotificationsModel( {
				type: 'alert',
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
		model.removeItems( [ items[0], items[1], items[5] ] );

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
									new mw.echo.dm.NotificationItem( 1, { content: '1', timestamp: '20150828172900' } ),
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
			model = new mw.echo.dm.NotificationsModel( {
				type: 'alert',
				limit: 25,
				userLang: 'en'
			} );

			test = cases[i];

			// Run preparation
			runPreparation( model, test.prepare );

			// Test
			actual = model[ test.run.method ].apply( model, cases[i].run.params );
			assert.equal( actual, cases[i].expect, cases[i].message );
		}
	} );

} )( mediaWiki );
