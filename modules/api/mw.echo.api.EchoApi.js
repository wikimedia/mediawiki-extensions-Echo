( function ( mw ) {
	/**
	 * A class defining Echo API instructions and network operations
	 *
	 * @constructor
	 */
	mw.echo.api.EchoApi = function MwEchoApiEchoApi() {
		this.network = new mw.echo.api.NetworkHandler();

		this.fetchingPromise = null;
	};

	OO.initClass( mw.echo.api.EchoApi );

	/**
	 * Register a set of sources.
	 *
	 * @param {Object} sources Object mapping source names to config objects
	 */
	mw.echo.api.EchoApi.prototype.registerForeignSources = function ( sources ) {
		var s;
		for ( s in sources ) {
			this.network.addApiHandler( s, sources[ s ], true );
		}
	};

	/**
	 * Fetch notifications from the server based on type
	 *
	 * @param {string} type Notification type to fetch: 'alert', 'message', or 'all'
	 * @param {string} [source="local"] The source from which to fetch the notifications
	 * @param {boolean} [isForced] Force a refresh on the fetch notifications promise
	 * @return {jQuery.Promise} Promise that is resolved with all notifications for the
	 *  requested types.
	 */
	mw.echo.api.EchoApi.prototype.fetchNotifications = function ( type, source, isForced ) {
		source = source || 'local';

		return this.network.getApiHandler( source ).fetchNotifications( type, isForced )
			.then( function ( result ) {
				return OO.getProp( result.query, 'notifications' );
			} );
	};

	/**
	 * Fetch notifications from several sources
	 *
	 * @param {string[]} sourceArray An array of sources to fetch from the group
	 * @param {string} type Notification type
	 * @return {jQuery.Promise} A promise that resolves with an array of promises for
	 *  fetchNotifications per each given source in the source array.
	 */
	mw.echo.api.EchoApi.prototype.fetchNotificationGroups = function ( sourceArray, type ) {
		var i, promise,
			promises = [];

		for ( i = 0; i < sourceArray.length; i++ ) {
			promise = this.network.getApiHandler( sourceArray[ i ] ).fetchNotifications( type );
			promises.push( promise );
		}

		return mw.echo.api.NetworkHandler.static.waitForAllPromises( promises );
	};

	/**
	 * Mark items as read in the API.
	 *
	 * @param {string[]} itemIds An array of item IDs to mark as read
	 * @param {string} source The source that these items belong to
	 * @param {boolean} [isRead] The read state of the item; true for marking the
	 *  item as read, false for marking the item as unread
	 * @return {jQuery.Promise} A promise that is resolved when the operation
	 *  is complete, with the number of unread notifications still remaining
	 *  for that type in the given source
	 */
	mw.echo.api.EchoApi.prototype.markItemsRead = function ( itemIds, source, isRead ) {
		return this.network.getApiHandler( source ).markItemsRead( itemIds, isRead );
	};

	/**
	 * Mark all notifications for a given type as read in the given source.
	 *
	 * @param {string} source Symbolic name of notifications source
	 * @param {string} type Notifications type
	 * @return {jQuery.Promise} A promise that is resolved when the operation
	 *  is complete, with the number of unread notifications still remaining
	 *  for that type in the given source
	 */
	mw.echo.api.EchoApi.prototype.markAllRead = function ( source, type ) {
		// FIXME: This specific method sends an operation
		// to the API that marks all notifications of the given type as read regardless
		// of whether they were actually seen by the user.
		// We should consider removing the use of this method and, instead,
		// using strictly the 'markItemsRead' by giving the API only the
		// notifications that are available to the user.
		return this.network.getApiHandler( source ).markAllRead( type );
	};

	/**
	 * Fetch the number of unread notifications for the given type in the given
	 * source.
	 *
	 * @param {string} source Notifications source
	 * @param {string} type Notification type
	 * @return {jQuery.Promise} A promise that is resolved with the number of
	 *  unread notifications for the given type and source.
	 */
	mw.echo.api.EchoApi.prototype.fetchUnreadCount = function ( source, type ) {
		return this.network.getApiHandler( source ).fetchUnreadCount( type );
	};

	/**
	 * Update the seenTime property for the given type and source.
	 *
	 * @param {string} source Notification source
	 * @param {string} type Notification type
	 * @return {jQuery.Promise} A promise that is resolved when the operation is complete.
	 */
	mw.echo.api.EchoApi.prototype.updateSeenTime = function ( source, type ) {
		return this.network.getApiHandler( source ).updateSeenTime( type );
	};

	/**
	 * Check whether the API promise for fetch notification is in an error
	 * state for the given source and notification type.
	 *
	 * @param {string} source Notification source.
	 * @param {string} type Notification type
	 * @return {boolean} The API response for fetching notification has
	 *  resolved in an error state, or is rejected.
	 */
	mw.echo.api.EchoApi.prototype.isFetchingErrorState = function ( source, type ) {
		return this.network.getApiHandler( source ).isFetchingErrorState( type );
	};

	/**
	 * Get the fetch notifications promise active for the current source and type.
	 *
	 * @param {string} source Notification source.
	 * @param {string} type Notification type
	 * @return {jQuery.Promise} Promise that is resolved when notifications are
	 *  fetched from the API.
	 */
	mw.echo.api.EchoApi.prototype.getFetchNotificationPromise = function ( source, type ) {
		return this.network.getApiHandler( source ).getFetchNotificationPromise( type );
	};

} )( mediaWiki );
