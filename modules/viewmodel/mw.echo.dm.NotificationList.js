( function ( mw ) {
	/**
	 * Notification list
	 *
	 * @class
	 * @mixins OO.EventEmitter
	 * @mixins mw.echo.dm.List
	 *
	 * @constructor
	 * @param {Object} [config] Configuration object
	 */
	mw.echo.dm.NotificationList = function MwEchoDmNotificationList() {

		// Mixin constructor
		OO.EventEmitter.call( this );

		// Mixin constructor
		mw.echo.dm.List.call( this );
	};

	/* Initialization */

	OO.initClass( mw.echo.dm.NotificationList );
	OO.mixinClass( mw.echo.dm.NotificationList, OO.EventEmitter );
	OO.mixinClass( mw.echo.dm.NotificationList, mw.echo.dm.List );

} )( mediaWiki );
