mw.template.add( 'ext.echo.mobile', 'NotificationBadge.mustache',
	mw.template.get( 'test.Echo', 'NotificationBadge.mustache' ).getSource()
);

mw.loader.using( 'mobile.startup' ).then( function () {
	require( './mobile/test_NotificationBadge.js' );
} );

mw.loader.using( 'ext.echo.dm' ).then( function () {
	require( './model/test_mw.echo.dm.BundleNotificationItem.js' );
	require( './model/test_mw.echo.dm.CrossWikiNotificationItem.js' );
	require( './model/test_mw.echo.dm.FiltersModel.js' );
	require( './model/test_mw.echo.dm.NotificationGroupsList.js' );
	require( './model/test_mw.echo.dm.NotificationItem.js' );
	require( './model/test_mw.echo.dm.NotificationsList.js' );
	require( './model/test_mw.echo.dm.PaginationModel.js' );
	require( './model/test_mw.echo.dm.SeenTimeModel.js' );
	require( './model/test_mw.echo.dm.SourcePagesModel.js' );
	require( './model/test_mw.echo.dm.UnreadNotificationCounter.js' );
} );
