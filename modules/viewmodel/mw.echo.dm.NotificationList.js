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

	/* Methods */

	/**
	 * Count the number of notifications by asking all contained objects
	 * how many notifications they each represent. Some are single, some
	 * are groups.
	 *
	 * @return {number}
	 */
	mw.echo.dm.NotificationList.prototype.getNotificationCount = function () {
		var sum = 0;
		this.getItems().forEach( function ( notificationItem ) {
			sum += notificationItem.getCount();
		} );
		return sum;
	};

} )( mediaWiki );
