( function ( mw, $ ) {
	/* global moment:false */
	var fakeData = {
		type: 'alert',
		read: true,
		seen: true,
		timestamp: '2016-09-14T23:21:56Z',
		content: {
			header: 'Your edit on <strong>Moai</strong> was reverted.',
			compactHeader: 'Your edit on <strong>Moai</strong> was reverted.',
			body: 'undo'
		},
		iconType: 'revert',
		primaryUrl: 'http://dev.wiki.local.wmftest.net:8080/w/index.php?title=Moai&oldid=prev&diff=1978&markasread=2126',
		secondaryUrls: [
			{
				url: 'http://dev.wiki.local.wmftest.net:8080/wiki/User:RandomUser',
				label: 'RandomUser',
				icon: 'userAvatar'
			},
			{
				url: 'http://dev.wiki.local.wmftest.net:8080/wiki/Talk:Moai',
				label: 'Moai',
				tooltip: 'Talk:Moai',
				icon: 'speechBubbles'
			}
		]
	};

	QUnit.module( 'ext.echo.dm - mw.echo.dm.NotificationItem' );

	QUnit.test( 'Constructing items', function ( assert ) {
		var i, j, itemModel, checkMethods,
			defaultValues = {
				getId: undefined,
				getContentHeader: '',
				getContentBody: '',
				getCategory: '',
				getType: 'message',
				isRead: false,
				isSeen: false,
				isForeign: false,
				isBundled: false,
				getTimestamp: moment.utc().format( 'YYYY-MM-DD[T]HH:mm:ss[Z]' ),
				getPrimaryUrl: undefined,
				getIconURL: undefined,
				getIconType: undefined,
				getSecondaryUrls: [],
				getModelName: 'local',
				getAllIds: []
			},
			tests = [
				{
					msg: 'Empty data',
					params: { id: 0, config: {} },
					tests: 'all',
					expected: $.extend( true, {}, defaultValues, { getId: 0, getAllIds: [ 0 ] } )
				},
				{
					msg: 'Fake data',
					params: { id: 999, config: fakeData },
					tests: 'all',
					expected: $.extend( true, {}, defaultValues, {
						getId: 999,
						getAllIds: [ 999 ],
						getType: 'alert',
						isRead: true,
						isSeen: true,
						getTimestamp: '2016-09-14T23:21:56Z',
						getContentHeader: 'Your edit on <strong>Moai</strong> was reverted.',
						getContentBody: 'undo',
						getIconType: 'revert',
						getPrimaryUrl: 'http://dev.wiki.local.wmftest.net:8080/w/index.php?title=Moai&oldid=prev&diff=1978&markasread=2126',
						getSecondaryUrls: [
							{
								url: 'http://dev.wiki.local.wmftest.net:8080/wiki/User:RandomUser',
								label: 'RandomUser',
								icon: 'userAvatar'
							},
							{
								url: 'http://dev.wiki.local.wmftest.net:8080/wiki/Talk:Moai',
								label: 'Moai',
								tooltip: 'Talk:Moai',
								icon: 'speechBubbles'
							}
						]
					} )
				}
			];

		for ( i = 0; i < tests.length; i++ ) {
			itemModel = new mw.echo.dm.NotificationItem( tests[ i ].params.id, tests[ i ].params.config );

			checkMethods = tests[ i ].tests;
			if ( tests[ i ].tests === 'all' ) {
				checkMethods = Object.keys( defaultValues );
			}

			for ( j = 0; j < checkMethods.length; j++ ) {
				assert.deepEqual(
					// Run the method
					itemModel[ checkMethods[ j ] ](),
					// Expected result
					tests[ i ].expected[ checkMethods[ j ] ],
					// Message
					tests[ i ].msg + ' (' + checkMethods[ j ] + ')'
				);
			}
		}
	} );

	QUnit.test( 'Emitting update event', function ( assert ) {
		var results = [],
			itemModel = new mw.echo.dm.NotificationItem( 0, $.extend( true, {}, fakeData, { seen: false, read: false } ) );

		// Listen to update event
		itemModel.on( 'update', function () {
			results.push( [
				itemModel.isRead(),
				itemModel.isSeen()
			] );
		} );

		// Trigger events
		itemModel.toggleSeen( true ); // [ [ false, true ] ]
		itemModel.toggleSeen( true ); // [ [ false, true ] ] ( No change, event was not emitted )
		itemModel.toggleRead( true ); // [ [ false, true ], [ true, true ] ]
		itemModel.toggleRead( true ); // [ [ false, true ], [ true, true ] ] ( No change, event was not emitted )
		itemModel.toggleRead( false ); // [ [ false, true ], [ true, true ], [ false, true ] ]
		itemModel.toggleSeen( false ); // [ [ false, true ], [ true, true ], [ false, true ], [ false, false ] ]
		itemModel.toggleRead( true ); // [ [ false, true ], [ true, true ], [ false, true ], [ false, false ], [ true, false ] ]

		assert.deepEqual(
			results,
			// Expected:
			[ [ false, true ], [ true, true ], [ false, true ], [ false, false ], [ true, false ] ],
			'Read and seen changes produced "update" events'
		);
	} );

}( mediaWiki, jQuery ) );
