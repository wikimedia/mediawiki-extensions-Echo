( function ( mw, $ ) {
	/**
	 * Abstract notification API handler
	 *
	 * @abstract
	 * @class
	 *
	 * @constructor
	 * @param {Object} [config] Configuration object
	 * @cfg {number} [limit=25] The limit on how many notifications to fetch
	 * @cfg {string} [userLang=mw.config.get( 'wgUserLanguage' )] User language. Defaults
	 *  to the default user language configuration settings.
	 */
	mw.echo.api.APIHandler = function MwEchoApiAPIHandler( config ) {
		config = config || {};

		this.fetchNotificationsPromise = {};
		this.apiErrorState = {};

		this.limit = config.limit || 25;
		this.userLang = config.userLang || mw.config.get( 'wgUserLanguage' );

		this.api = null;

		// Map the logical type to the type
		// that the API recognizes
		this.normalizedType = {
			message: 'message',
			alert: 'alert',
			all: 'message|alert'
		};

		// Parameters that are sent through
		// to the 'fetch notification' promise
		// per type
		this.typeParams = {
			message: {},
			alert: {},
			all: {}
		};
	};

	/* Setup */

	OO.initClass( mw.echo.api.APIHandler );

	/**
	 * Fetch notifications from the API.
	 *
	 * @param {string} type Notification type
	 * @return {jQuery.Promise} A promise that resolves with an object containing the
	 *  notification items
	 */
	mw.echo.api.APIHandler.prototype.fetchNotifications = null;

	/**
	 * Create a new fetchNotifications promise that queries the API and overrides
	 * the cached promise.
	 *
	 * @param {string} type Notification type
	 */
	mw.echo.api.APIHandler.prototype.createNewFetchNotificationPromise = function ( type ) {
		var me = this,
			params = $.extend( {
				action: 'query',
				meta: 'notifications',
				notsections: this.normalizedType[ type ],
				notformat: 'model',
				notlimit: this.limit,
				notunreadfirst: 1,
				notprop: 'list|count',
				uselang: this.userLang
			}, this.getTypeParams( type ) );

		this.apiErrorState[ type ] = false;
		this.fetchNotificationsPromise[ type ] = this.api.get( params )
			.fail( function () {
				// Mark API error state
				me.apiErrorState[ type ] = true;
			} );

	};

	/**
	 * Update the seen timestamp
	 *
	 * @param {string} [type] Notification type 'message', 'alert' or 'all'.
	 * @return {jQuery.Promise} A promise that resolves with the seen timestamp
	 */
	mw.echo.api.APIHandler.prototype.updateSeenTime = null;

	/**
	 * Mark all notifications as read
	 *
	 * @param {string|string[]} type Notification type 'message', 'alert' or 'all'.
	 * @return {jQuery.Promise} A promise that resolves when all notifications
	 *  are marked as read.
	 */
	mw.echo.api.APIHandler.prototype.markAllRead = null;

	/**
	 * Mark multiple notification items as read using specific IDs
	 *
	 * @abstract
	 * @param {string[]} itemIdArray An array of notification item IDs
	 * @param {boolean} [isRead] Item's new read state; true for marking the item
	 *  as read, false for marking the item as unread
	 * @return {jQuery.Promise} A promise that resolves when all given notifications
	 *  are marked as read.
	 */
	mw.echo.api.APIHandler.prototype.markItemsRead = null;

	/**
	 * Update the read status of a notification item in the API
	 *
	 * @param {string} itemId Item id
	 * @param {boolean} [isRead] Item's new read state; true for marking the item
	 *  as read, false for marking the item as unread
	 * @return {jQuery.Promise} A promise that resolves when the notifications
	 *  are marked as read.
	 */
	mw.echo.api.APIHandler.prototype.markItemRead = function ( itemId, isRead ) {
		return this.markItemsRead( [ itemId ], isRead );
	};

	/**
	 * Query the API for unread count of the notifications in this model
	 *
	 * @param {string} type Notification type 'message', 'alert' or 'all'.
	 * @return {jQuery.Promise} jQuery promise that's resolved when the unread count is fetched
	 *  and the badge label is updated.
	 */
	mw.echo.api.APIHandler.prototype.fetchUnreadCount = null;

	/**
	 * Check whether the model has an API error state flagged
	 *
	 * @param {string} type Notification type, 'alert', 'message' or 'all'
	 * @return {boolean} The model is in API error state
	 */
	mw.echo.api.APIHandler.prototype.isFetchingErrorState = function ( type ) {
		return !!this.apiErrorState[ type ];
	};

	/**
	 * Return the fetch notifications promise
	 *
	 * @param {string} type Notification type, 'alert', 'message' or 'all'
	 * @return {jQuery.Promise} Promise that is resolved when notifications are
	 *  fetched from the API.
	 */
	mw.echo.api.APIHandler.prototype.getFetchNotificationPromise = function ( type ) {
		if ( !this.fetchNotificationsPromise[ type ] ) {
			this.createNewFetchNotificationPromise( type );
		}
		return this.fetchNotificationsPromise[ type ];
	};

	/**
	 * Get the extra parameters for fetching notifications for a given
	 * notification type.
	 *
	 * @param {string} type Notification type
	 * @return {Object} Extra API parameters for fetch notifications
	 */
	mw.echo.api.APIHandler.prototype.getTypeParams = function ( type ) {
		return this.typeParams[ type ];
	};
} )( mediaWiki, jQuery );
