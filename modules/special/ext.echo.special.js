( function ( $, mw ) {
	'use strict';
	/*!
	 * Echo Special:Notifications page initialization
	 */
	$( document ).ready( function () {
		var limitNotifications = 50,
			$content = $( '#mw-content-text' ),
			echoApi = new mw.echo.api.EchoApi( { limit: limitNotifications, bundle: false } ),
			unreadCounter = new mw.echo.dm.UnreadNotificationCounter( echoApi, [ 'message', 'alert' ], limitNotifications ),
			modelManager = new mw.echo.dm.ModelManager( unreadCounter, { type: [ 'message', 'alert' ] } ),
			controller = new mw.echo.Controller(
				echoApi,
				modelManager,
				{
					type: [ 'message' ]
				}
			),
			specialPageContainer = new mw.echo.ui.NotificationsInboxWidget(
				controller,
				modelManager,
				{
					limit: limitNotifications,
					$overlay: mw.echo.ui.$overlay
				}
			);

		// Overlay
		$( 'body' ).append( mw.echo.ui.$overlay );

		$content.empty().append( specialPageContainer.$element );
	} );
} )( jQuery, mediaWiki );
