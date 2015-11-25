( function ( mw ) {
	/**
	 * Abstract notification API handler
	 *
	 * @abstract
	 * @class
	 * @mixins OO.EventEmitter
	 *
	 * @constructor
	 * @param {Object} [config] Configuration object
	 * @cfg {Object} [baseParams] The base parameters for all API calls
	 *  done by the API handler
	 * @cfg {number} [limit=25] The limit on how many notifications to fetch
	 * @cfg {string} [type='alert'] Notification type
	 * @cfg {string} [userLang='en'] User language
	 */
	mw.echo.dm.APIHandler = function MwEchoDmAPIHandler( config ) {
		config = config || {};

		// Mixin constructor
		OO.EventEmitter.call( this );

		this.fetchNotificationsPromise = null;
		this.apiErrorState = false;

		this.type = config.type || 'alert';
		this.limit = config.limit || 25;
		this.userLang = config.userLang || 'en';
		this.baseParams = config.baseParams || {};

		this.api = null;
	};

	/* Setup */

	OO.initClass( mw.echo.dm.APIHandler );
	OO.mixinClass( mw.echo.dm.APIHandler, OO.EventEmitter );

	/**
	 * Fetch notifications from the API.
	 *
	 * @param {jQuery.Promise} [apiPromise] An existing promise querying the API for notifications.
	 *  This allows us to send an API request foreign to the DM and have the model
	 *  handle the operation as if it asked for the request itself, updating all that
	 *  needs to be updated and emitting all proper events.
	 * @return {jQuery.Promise} A promise that resolves with an object containing the
	 *  notification items
	 */
	mw.echo.dm.APIHandler.prototype.fetchNotifications = null;

	/**
	 * Update the seen timestamp
	 *
	 * @param {string|string[]} [type] Notification type 'message', 'alert' or
	 *  an array of both.
	 * @return {jQuery.Promise} A promise that resolves with the seen timestamp
	 */
	mw.echo.dm.APIHandler.prototype.updateSeenTime = null;

	/**
	 * Mark all notifications as read
	 *
	 * @return {jQuery.Promise} A promise that resolves when all notifications
	 *  are marked as read.
	 */
	mw.echo.dm.APIHandler.prototype.markAllRead = null;

	/**
	 * Update the read status of a notification item in the API
	 *
	 * @param {string} itemId Item id
	 * @return {jQuery.Promise} A promise that resolves when the notifications
	 *  are marked as read.
	 */
	mw.echo.dm.APIHandler.prototype.markItemRead = null;

	/**
	 * Query the API for unread count of the notifications in this model
	 *
	 * @return {jQuery.Promise} jQuery promise that's resolved when the unread count is fetched
	 *  and the badge label is updated.
	 */
	mw.echo.dm.APIHandler.prototype.fetchUnreadCount = null;

	/**
	 * Check whether the model is fetching notifications from the API
	 *
	 * @return {boolean} The model is in the process of fetching from the API
	 */
	mw.echo.dm.APIHandler.prototype.isFetchingNotifications = function () {
		return !!this.fetchNotificationsPromise;
	};

	/**
	 * Check whether the model has an API error state flagged
	 *
	 * @return {boolean} The model is in API error state
	 */
	mw.echo.dm.APIHandler.prototype.isFetchingErrorState = function () {
		return !!this.apiErrorState;
	};

	/**
	 * Return the fetch notifications promise
	 * @return {jQuery.Promise} Promise that is resolved when notifications are
	 *  fetched from the API.
	 */
	mw.echo.dm.APIHandler.prototype.getFetchNotificationPromise = function () {
		return this.fetchNotificationsPromise;
	};

	/**
	 * Get the base params associated with this API handler
	 *
	 * @return {Object} Base API params
	 */
	mw.echo.dm.APIHandler.prototype.getBaseParams = function () {
		return this.baseParams;
	};
} )( mediaWiki );
