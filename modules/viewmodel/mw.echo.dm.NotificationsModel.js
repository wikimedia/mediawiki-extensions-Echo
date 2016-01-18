( function ( mw, $ ) {
	/**
	 * Notification view model
	 *
	 * @class
	 * @mixins OO.EventEmitter
	 *
	 * @constructor
	 * @param {mw.echo.dm.NetworkHandler} networkHandler Network handler
	 * @param {Object} [config] Configuration object
	 * @cfg {string} [id] Model id, used to refer to the model specifically.
	 *  Falls back to the model's unique source
	 * @cfg {string} [title=''] An optional title for the model. This is mostly used
	 *  for nested bundled models inside group items.
	 * @cfg {string|string[]} [type='alert'] Notification type 'alert', 'message'
	 *  or an array [ 'alert', 'message' ]
	 * @cfg {string} [source='local'] Model source, 'local' or some symbolic name identifying
	 *  the source of the notification items for the network handler.
	 * @cfg {number} [limit=25] Notification limit
	 * @cfg {string} [userLang] User language
	 * @cfg {boolean} [foreign] The model's source is foreign
	 * @cfg {boolean} [removeReadNotifications=false] Remove read notifications completely. This
	 *  means the model will only contain unread notifications. This is useful for
	 *  cross-wiki bundled notifications.
	 */
	mw.echo.dm.NotificationsModel = function MwEchoDmNotificationsModel( networkHandler, config ) {
		config = config || {};

		// Mixin constructor
		OO.EventEmitter.call( this );

		// Mixin constructor
		mw.echo.dm.SortedList.call( this );

		this.type = config.type || 'alert';
		this.source = config.source || 'local';
		this.id = config.id || this.source;
		this.title = config.title || '';

		this.markingAllAsRead = false;
		this.autoMarkReadInProcess = false;

		this.removeReadNotifications = !!config.removeReadNotifications;
		this.foreign = !!config.foreign;

		this.networkHandler = networkHandler;

		this.seenTime = mw.config.get( 'wgEchoSeenTime' ) || {};

		// Store references to unseen and unread notifications
		this.unseenNotifications = new mw.echo.dm.NotificationList();
		this.unreadNotifications = new mw.echo.dm.NotificationList();

		// Events
		this.aggregate( {
			seen: 'itemSeen',
			read: 'itemRead',
			empty: 'itemGroupEmpty'
		} );

		this.connect( this, {
			itemSeen: 'onItemSeen',
			itemRead: 'onItemRead',
			itemGroupEmpty: 'onItemGroupEmpty'
		} );

		this.setSortingCallback( function ( a, b ) {
			var diff;

			if ( !a.isRead() && b.isRead() ) {
				return -1; // Unread items are always above read items
			} else if ( a.isRead() && !b.isRead() ) {
				return 1;
			} else {
				// Reverse sorting
				diff = Number( b.getTimestamp() ) - Number( a.getTimestamp() );
				if ( diff !== 0 ) {
					return diff;
				}

				// Fallback on IDs
				return b.getId() - a.getId();
			}
		} );
	};

	/* Initialization */

	OO.initClass( mw.echo.dm.NotificationsModel );
	OO.mixinClass( mw.echo.dm.NotificationsModel, OO.EventEmitter );
	OO.mixinClass( mw.echo.dm.NotificationsModel, mw.echo.dm.SortedList );

	/* Events */

	/**
	 * @event updateSeenTime
	 *
	 * Seen time has been updated
	 */

	/**
	 * @event unseenChange
	 * @param {mw.echo.dm.NotificationItem} items An array of the unseen items
	 *
	 * Items' seen status has changed
	 */

	/**
	 * @event unreadChange
	 * @param {mw.echo.dm.NotificationItem} items An array of the unread items
	 *
	 * Items' read status has changed
	 */

	/**
	 * @event allRead
	 *
	 * All items are marked as read
	 */

	/**
	 * @event empty
	 *
	 * The model is empty
	 */

	/**
	 * @event done
	 * @param {boolean} success The operation is successful
	 * @param {Object} result The result of the operation. For success, the
	 *  result includes the ids of the items. For failures, the result
	 *  includes the error code from the failed API request
	 * @param {string[]} [result.ids] An array of notification IDs that were
	 *  fetched from the API. This only appears on success.
	 * @param {string} [result.errCode] The error code from the API.
	 *  This only appears on failure.
	 * @param {Object} [result.errObj] The error object from the API.
	 *  This only appears on failure.
	 *
	 * The process of fetching notifications from the API has finished
	 */

	/* Methods */

	/**
	 * Respond to item seen state change
	 *
	 * @param {mw.echo.dm.NotificationItem} item Notification item
	 * @param {boolean} isSeen Notification is seen
	 * @fires unseenChange
	 */
	mw.echo.dm.NotificationsModel.prototype.onItemSeen = function ( item, isSeen ) {
		var id = item && item.getId(),
			unseenItem = id && this.unseenNotifications.getItemById( id );

		if ( unseenItem ) {
			if ( isSeen ) {
				this.unseenNotifications.removeItems( [ unseenItem ] );
			} else {
				this.unseenNotifications.addItems( [ unseenItem ] );
			}
			this.emit( 'unseenChange', this.unseenNotifications.getItems() );
		}
	};

	/**
	 * Respond to item read state change
	 *
	 * @param {mw.echo.dm.NotificationItem} item Notification item
	 * @param {boolean} isRead Notification is read
	 * @fires unreadChange
	 */
	mw.echo.dm.NotificationsModel.prototype.onItemRead = function ( item, isRead ) {
		var id = item && item.getId(),
			unreadItem = id && this.unreadNotifications.getItemById( id );

		// Update unread status and emit events
		if ( unreadItem ) {
			if ( isRead ) {
				// We are skipping "mark as read" when the operation is "mark all read"
				// because the API takes a single request to mark all notifications
				// as read, and we don't need to send multiple individual requests.
				if ( !this.markingAllAsRead ) {
					this.markItemReadInApi( id );
				}
				if ( this.removeReadNotifications ) {
					// Remove this notification from the model
					this.removeItems( [ unreadItem ] );
				}
				// Remove the item from the counter after all other operations
				// finished, since some of the operations check if there are any
				// unread notifications to begin with.
				this.unreadNotifications.removeItems( [ unreadItem ] );
			} else {
				this.unreadNotifications.addItems( [ unreadItem ] );
			}
			this.emit( 'unreadChange', this.unreadNotifications.getItems() );
		}

		if ( this.unreadNotifications.isEmpty() ) {
			this.emit( 'allRead' );
		}

		if ( !this.countUnreadTalkPageNotifications() ) {
			this.emit( 'allTalkRead' );
		}
	};

	/**
	 * Respond to grouped item being empty
	 *
	 * @param {mw.echo.dm.NotificationItem} item Group item
	 */
	mw.echo.dm.NotificationsModel.prototype.onItemGroupEmpty = function ( item ) {
		// TODO: When we have other types of bundles, we should check how to handle
		// empty bundles (and bundles with only 1 item left)
		// In this case, the notification is a "cross wiki" notification, which
		// goes away when it is empty
		this.removeItems( [ item ] );
	};

	/**
	 * Count the unread messages that originate from the user talk page.
	 *
	 * @return {number} Number of unread talk page messages
	 */
	mw.echo.dm.NotificationsModel.prototype.countUnreadTalkPageNotifications = function () {
		var i, len,
			talk = 0,
			items = this.unreadNotifications.getItems();

		for ( i = 0, len = items.length; i < len; i++ ) {
			if ( items[i].getCategory() === 'edit-user-talk' ) {
				talk++;
			}
		}
		return talk;
	};

	/**
	 * Get the type of the notifications that this model deals with.
	 * Notifications types can be 'alert', 'message' or an array of both.
	 *
	 * @return {string|string[]} Notifications type
	 */
	mw.echo.dm.NotificationsModel.prototype.getType = function () {
		return this.type;
	};

	/**
	 * Get the counter of how many notifications are unseen
	 *
	 * @return {number} Number of unseen notifications
	 */
	mw.echo.dm.NotificationsModel.prototype.getUnseenCount = function () {
		return this.unseenNotifications.getItemCount();
	};

	/**
	 * Get the counter of how many notifications are unread
	 *
	 * @return {number} Number of unread notifications
	 */
	mw.echo.dm.NotificationsModel.prototype.getUnreadCount = function () {
		return this.unreadNotifications.getItemCount();
	};

	/**
	 * Get the counter of how many regular, non bundled notifications are unread
	 *
	 * @return {number} Number of non bundled unread notifications
	 */
	mw.echo.dm.NotificationsModel.prototype.getNonbundledUnreadCount = function () {
		var i,
			nonBundleItems = 0,
			items = this.getItems();

		for ( i = 0; i < items.length; i++ ) {
			if (
				!( items[ i ] instanceof mw.echo.dm.NotificationGroupItem ) &&
				!items[ i ].isRead()
			) {
				nonBundleItems++;
			}
		}
		return nonBundleItems;
	};

	/**
	 * Set the system seen time - the last time we've marked notification as seen
	 *
	 * @private
	 * @param {string} Mediawiki seen timestamp in Mediawiki timestamp format
	 */
	mw.echo.dm.NotificationsModel.prototype.setSeenTime = function ( time ) {
		var i,
			type = $.isArray( this.type ) ? this.type : [ this.type ];

		for ( i = 0; i < type.length; i++ ) {
			// Update all types
			this.seenTime[ type[ i ] ] = time;
		}
	};

	/**
	 * Get the system seen time
	 *
	 * @param {string} [type] Notification type
	 * @return {string} Mediawiki seen timestamp in Mediawiki timestamp format
	 */
	mw.echo.dm.NotificationsModel.prototype.getSeenTime = function ( type ) {
		type = type || ( $.isArray( this.type ) ? this.type[ 0 ] : this.type );

		return this.seenTime[ type ];
	};

	/**
	 * Update the seen timestamp
	 *
	 * @param {string|string[]} [type] Notification type
	 * @return {jQuery.Promise} A promise that resolves with the seen timestamp
	 * @fires updateSeenTime
	 */
	mw.echo.dm.NotificationsModel.prototype.updateSeenTime = function ( type ) {
		var i, len, promise,
			items = this.unseenNotifications.getItems();

		type = type || this.type;

		// Update the notifications seen status
		for ( i = 0, len = items.length; i < len; i++ ) {
			items[ i ].toggleSeen( true );
		}
		this.emit( 'updateSeenTime' );

		// Only update seenTime in the API locally
		if ( !this.isForeign() ) {
			promise = this.getApi().updateSeenTime( type );
		} else {
			promise = $.Deferred().resolve();
		}

		return promise
			.then( this.setSeenTime.bind( this ) );
	};

	/**
	 * Mark all notifications as read
	 *
	 * @return {jQuery.Promise} A promise that resolves when all notifications
	 * were marked as read.
	 * @fires empty
	 */
	mw.echo.dm.NotificationsModel.prototype.markAllRead = function () {
		var i, len,
			items = this.unreadNotifications.getItems(),
			length = items.length;

		// Skip if this is an automatic "mark as read" and this model is
		// external
		if ( this.external && this.autoMarkReadInProcess ) {
			return $.Deferred().resolve( 0 ).promise();
		}

		// In some cases our model is empty out of technicalities -- that is,
		// we didn't fetch its items yet. In that case, when markAllRead is
		// called, we should emit the empty event (that would have been
		// emitted if there were items that were then marked as read and removed)
		// and return a resolved promise
		if ( length === 0 ) {
			if ( this.removeReadNotifications ) {
				this.emit( 'empty' );
			}
			return $.Deferred().resolve( 0 ).promise();
		}

		this.markingAllAsRead = true;
		for ( i = 0, len = items.length; i < len; i++ ) {
			// Skip items that are external if we are in automatic 'mark all as read'
			if ( !items[ i ].isForeign() || !this.autoMarkReadInProcess ) {
				items[ i ].toggleRead( true );
				items[ i ].toggleSeen( true );
				this.unreadNotifications.removeItems( [ items[ i ] ] );
			}
		}
		this.markingAllAsRead = false;

		return this.getApi().markAllRead();
	};

	/**
	 * Trigger an automatic mark all notifications as read. It's important to mark
	 * this process as an automatic one, because there are several cases where we
	 * don't want to mark specific notifications as automatically read (like external
	 * group items)
	 *
	 * @return {jQuery.Promise} A promise that resolves when all notifications
	 * were marked as read.
	 * @fires empty
	 */
	mw.echo.dm.NotificationsModel.prototype.autoMarkAllRead = function () {
		var model = this;

		this.autoMarkReadInProcess = true;
		this.markAllRead()
			.then( function () {
				model.autoMarkReadInProcess = false;
			} );
	};

	/**
	 * Update the read status of a notification item in the API
	 *
	 * @param {string} itemId Item id
	 * @return {jQuery.Promise} A promise that resolves when the notifications
	 * were marked as read.
	 */
	mw.echo.dm.NotificationsModel.prototype.markItemReadInApi = function ( itemId ) {
		if ( !this.unreadNotifications.getItemCount() ) {
			return $.Deferred().resolve( 0 ).promise();
		}

		return this.getApi().markItemRead( itemId );
	};

	/**
	 * Update the read status in the API only for the existing items in this model.
	 * If an item id array is given, those items will be updated. Otherwise, all items
	 * in the model are updated.
	 *
	 * @param {string[]} [itemIds] Array of item ids
	 * @return {jQuery.Promise} A promise that resolves when the notifications
	 * were marked as read.
	 */
	mw.echo.dm.NotificationsModel.prototype.markExistingItemsReadInApi = function ( itemIds ) {
		itemIds = itemIds || this.getAllItemIds();

		return this.getApi().markMultipleItemsRead( itemIds );
	};

	/**
	 * Get an array of the notification IDs of the items in this model
	 *
	 * @return {string[]} Array of notification IDs
	 */
	mw.echo.dm.NotificationsModel.prototype.getAllItemIds = function () {
		var i,
			items = this.getItems(),
			result = [];

		for ( i = 0; i < items.length; i++ ) {
			result.push( items[ i ].getId() );
		}

		return result;
	};

	/**
	 * Fetch notifications from the API and update the notifications list.
	 *
	 * @param {jQuery.Promise} An existing promise querying the API for notifications.
	 *  This allows us to send an API request external to the DM and have the model
	 *  handle the operation as if it asked for the request itself, updating all that
	 *  needs to be updated and emitting all proper events.
	 * @return {jQuery.Promise} A promise that resolves with an array of notification IDs
	 */
	mw.echo.dm.NotificationsModel.prototype.fetchNotifications = function ( apiPromise ) {
		var model = this;

		// Rebuild the notifications promise either when it is null or when
		// it exists in a failed state
		return ( apiPromise || this.getApi().fetchNotifications() )
			.then(
				// Success
				function ( result ) {
					var notifData, id, t, tlen, s,
						notificationModel, types, content,
						newNotifData = {},
						sources = {},
						optionItems = [],
						idArray = [],
						data = OO.getProp( result.query, 'notifications', model.type ) || { index: [] },
						sourceDefinitions = OO.getProp( result.query, 'notifications', 'sources' ) || {};

					types = $.isArray( model.type ) ? model.type : [ model.type ];

					for ( t = 0, tlen = types.length; t < tlen; t++ ) {
						data = OO.getProp( result.query, 'notifications', types[ t ] ) || { list: [] };
						for ( id in data.list ) {
							notifData = data.list[ id ];
							content = notifData['*'] || {};

							if ( model.getItemById( id ) ) {
								// Skip if we already have the item
								// TODO: Instead of skipping, we should consider repopulating
								// the item, in case there are any changes that would result
								// in repositioning/resorting in the future.
								continue;
							}

							// Collect common data
							newNotifData = {
								read: !!notifData.read,
								seen: !!notifData.read || notifData.timestamp.mw <= model.getSeenTime(),
								timestamp: notifData.timestamp.utcmw,
								category: notifData.category,
								content: {
									header: content.header,
									body: content.body
								},
								iconURL: content.iconUrl,
								iconType: content.icon,
								type: model.getType(),
								foreign: model.isForeign(),
								source: model.getSource(),
								primaryUrl: OO.getProp( content.links, 'primary', 'url' ),
								secondaryUrls: OO.getProp( content.links, 'secondary' ) || []
							};

							if ( notifData.type === 'foreign' ) {
								// Define sources
								sources = {};
								for ( s = 0; s < notifData.sources.length; s++ ) {
									sources[ notifData.sources[ s ] ] = sourceDefinitions[ notifData.sources[ s ] ];
								}

								// Create model
								notificationModel = new mw.echo.dm.NotificationGroupItem(
									model.networkHandler,
									sources,
									id,
									$.extend( true, {}, newNotifData, {
										// This should probably be separated by bundled
										// type. Some types don't have read messages, but
										// some do
										removeReadNotifications: true,
										// Override the foreign flag to 'true' for cross-wiki
										// notifications.
										// For bundles that are not foreign (like regular
										// bundles of notifications) this flag should be false
										foreign: true,
										count: notifData.count
									} )
								);
							} else {
								notificationModel = new mw.echo.dm.NotificationItem(
									id,
									newNotifData
								);
							}

							idArray.push( notifData.id );
							optionItems.push( notificationModel );
						}
					}

					// Add to the model
					model.addItems( optionItems, 0 );

					model.emit( 'done', true, { ids: idArray } );
					return idArray;
				},
				// Failure
				function ( errCode, errObj ) {
					model.emit( 'done', false, { errCode: errCode, errInfo: OO.getProp( errObj, 'error', 'info' ) } );
				}
			);
	};

	/**
	 * Update the unread and unseen tracking lists when we add items
	 *
	 * @param {mw.echo.dm.NotificationItem[]} items Items to add
	 */
	mw.echo.dm.NotificationsModel.prototype.addItems = function ( items ) {
		var i, len;

		for ( i = 0, len = items.length; i < len; i++ ) {
			if ( !items[ i ].isRead() ) {
				this.unreadNotifications.addItems( [ items[ i ] ] );
			}
			if ( !items[ i ].isSeen() ) {
				this.unseenNotifications.addItems( [ items[ i ] ] );
			}
		}
		// Parent
		mw.echo.dm.SortedList.prototype.addItems.call( this, items );
	};

	/**
	 * Update the unread and unseen tracking lists when we remove items
	 *
	 * @param {mw.echo.dm.NotificationItem[]} items Items to remove
	 * @param {number} index Index to add items at
	 */
	mw.echo.dm.NotificationsModel.prototype.removeItems = function ( items ) {
		var i, len;

		for ( i = 0, len = items.length; i < len; i++ ) {
			this.unreadNotifications.removeItems( [ items[ i ] ] );
			this.unseenNotifications.removeItems( [ items[ i ] ] );
		}

		// Parent
		mw.echo.dm.SortedList.prototype.removeItems.call( this, items );

		if ( this.isEmpty() ) {
			this.emit( 'empty' );
		}
	};

	/**
	 * Update the unread and unseen tracking lists when we clear items
	 */
	mw.echo.dm.NotificationsModel.prototype.clearItems = function () {
		this.unreadNotifications.clearItems();
		this.unseenNotifications.clearItems();

		// Parent
		mw.echo.dm.SortedList.prototype.clearItems.call( this );
		this.emit( 'empty' );
	};

	/**
	 * Query the API for unread count of the notifications in this model
	 *
	 * @return {jQuery.Promise} jQuery promise that's resolved when the unread count is fetched
	 *  and the badge label is updated.
	 */
	mw.echo.dm.NotificationsModel.prototype.fetchUnreadCountFromApi = function () {
		return this.getApi().fetchUnreadCount();
	};

	/**
	 * Check whether the model is fetching notifications from the API
	 *
	 * @return {boolean} The model is in the process of fetching from the API
	 */
	mw.echo.dm.NotificationsModel.prototype.isFetchingNotifications = function () {
		return this.getApi().isFetchingNotifications();
	};

	/**
	 * Check whether the model has an api error state flagged
	 *
	 * @return {boolean} The model is in api error state
	 */
	mw.echo.dm.NotificationsModel.prototype.isFetchingErrorState = function () {
		return this.getApi().isFetchingErrorState();
	};

	/**
	 * Return the fetch notifications promise
	 * @return {jQuery.Promise} Promise that is resolved when notifications were
	 *  fetched from the API.
	 */
	mw.echo.dm.NotificationsModel.prototype.getFetchNotificationPromise = function () {
		return this.getApi().getFetchNotificationPromise();
	};

	/**
	 * Get the timestamp of the latest unread item
	 *
	 * @return {mw.echo.dm.APIHandler} API handler
	 */
	mw.echo.dm.NotificationsModel.prototype.getTimestamp = function () {
		var items = this.getItems();

		// This is a sorted list, so the top (first) item is also the 'latest'
		// item for this purpose.
		return items[ 0 ] && items[ 0 ].getTimestamp();
	};

	/**
	 * Get the API handler associated with this model's source
	 *
	 * @return {mw.echo.dm.APIHandler} API handler
	 */
	mw.echo.dm.NotificationsModel.prototype.getApi = function () {
		return this.networkHandler.getApiHandler( this.source );
	};

	/**
	 * Get the network handler
	 *
	 * @return {mw.echo.dm.NetworkHandler} Network handler
	 */
	mw.echo.dm.NotificationsModel.prototype.getNetworkHandler = function () {
		return this.networkHandler;
	};

	/**
	 * Get the source this model is associated with
	 *
	 * @return {string} Symbolic name for the APIHandler source
	 */
	mw.echo.dm.NotificationsModel.prototype.getSource = function () {
		return this.source;
	};

	/**
	 * Get the title of this model
	 *
	 * @return {string} Title
	 */
	mw.echo.dm.NotificationsModel.prototype.getTitle = function () {
		return this.title;
	};

	/**
	 * Get the id of this model
	 *
	 * @return {string} id
	 */
	mw.echo.dm.NotificationsModel.prototype.getId = function () {
		return this.id;
	};

	/**
	 * This model is foreign
	 *
	 * @return {boolean} Model is foreign
	 */
	mw.echo.dm.NotificationsModel.prototype.isForeign = function () {
		return this.foreign;
	};

} )( mediaWiki, jQuery );
