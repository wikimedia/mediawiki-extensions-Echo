( function ( $, mw ) {
	'use strict';
	/*!
	 * Echo Special:Notifications page initialization
	 */
	$( document ).ready( function () {
		var prefLink, specialPageContainer,
			limitNotifications = 50,
			$content = $( '#mw-content-text' ),
			echoApi = new mw.echo.api.EchoApi( { limit: limitNotifications, bundle: false } ),
			unreadCounter = new mw.echo.dm.UnreadNotificationCounter( echoApi, [ 'message', 'alert' ], limitNotifications ),
			modelManager = new mw.echo.dm.ModelManager( unreadCounter, {
				type: [ 'message', 'alert' ],
				itemsPerPage: limitNotifications,
				localCounter: new mw.echo.dm.UnreadNotificationCounter(
					echoApi,
					[ 'message', 'alert' ],
					limitNotifications,
					{
						localOnly: true,
						source: 'local'
					}
				)
			} ),
			controller = new mw.echo.Controller(
				echoApi,
				modelManager
			);

		prefLink = new mw.Uri( $( '#pt-preferences a' ).prop( 'href' ) );
		prefLink.fragment = 'mw-prefsection-echo';

		specialPageContainer = new mw.echo.ui.NotificationsInboxWidget(
			controller,
			modelManager,
			{
				limit: limitNotifications,
				$overlay: mw.echo.ui.$overlay,
				prefLink: prefLink.toString(),
				helpLink: $( '#mw-indicator-mw-helplink a' ).prop( 'href' )
			}
		);

		// Overlay
		$( 'body' ).append( mw.echo.ui.$overlay );

		// Notifications
		$content.empty().append( specialPageContainer.$element );
	} );
} )( jQuery, mediaWiki );
