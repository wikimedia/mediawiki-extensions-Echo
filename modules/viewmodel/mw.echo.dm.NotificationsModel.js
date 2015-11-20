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
	 * @cfg {string|string[]} [type='alert'] Notification type 'alert', 'message'
	 *  or an array [ 'alert', 'message' ]
	 * @cfg {string} [source='local'] Model source, 'local' or some symbolic name identifying
	 *  the source of the notification items for the network handler.
	 * @cfg {number} [limit=25] Notification limit
	 * @cfg {string} [userLang] User language
	 */
	mw.echo.dm.NotificationsModel = function MwEchoDmNotificationsModel( networkHandler, config ) {
		config = config || {};

		// Mixin constructor
		OO.EventEmitter.call( this );

		// Mixin constructor
		mw.echo.dm.SortedList.call( this );

		this.type = config.type || 'alert';
		this.source = config.source || 'local';

		this.networkHandler = networkHandler;

		this.seenTime = mw.config.get( 'wgEchoSeenTime' ) || {};

		// Store references to unseen and unread notifications
		this.unseenNotifications = new mw.echo.dm.NotificationList();
		this.unreadNotifications = new mw.echo.dm.NotificationList();

		// Events
		this.aggregate( {
			seen: 'itemSeen',
			read: 'itemRead'
		} );

		this.connect( this, {
			itemSeen: 'onItemSeen',
			itemRead: 'onItemRead'
		} );

		this.setSortingCallback( function ( a, b ) {
			var diff;

			if ( !a.isRead() && b.isRead() ) {
				return -1; // Unread items are always above read items
			} else if ( a.isRead() && !b.isRead() ) {
				return 1;
			} else {
				// Reverse sorting
				diff = b.getTimestamp() - a.getTimestamp();
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
				this.markItemReadInApi( id );
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
		var i, len,
			items = this.unseenNotifications.getItems();

		type = type || this.type;

		// Update the notifications seen status
		for ( i = 0, len = items.length; i < len; i++ ) {
			items[ i ].toggleSeen( true );
		}
		this.emit( 'updateSeenTime' );

		return this.getApi().updateSeenTime( type )
			.then( this.setSeenTime.bind( this ) );
	};

	/**
	 * Mark all notifications as read
	 *
	 * @return {jQuery.Promise} A promise that resolves when all notifications
	 * were marked as read.
	 */
	mw.echo.dm.NotificationsModel.prototype.markAllRead = function () {
		var model = this;

		if ( !this.unreadNotifications.getItemCount() ) {
			return $.Deferred().resolve( 0 ).promise();
		}

		return this.getApi().markAllRead()
			.then( function () {
				var i, len,
					items = model.unreadNotifications.getItems();

				for ( i = 0, len = items.length; i < len; i++ ) {
					items[i].toggleRead( true );
					items[i].toggleSeen( true );
				}
				model.unreadNotifications.clearItems();
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
	 * Fetch notifications from the API and update the notifications list.
	 *
	 * @param {jQuery.Promise} An existing promise querying the API for notifications.
	 *  This allows us to send an API request external to the DM and have the model
	 *  handle the operation as if it asked for the request itself, updating all that
	 *  needs to be updated and emitting all proper events.
	 * @return {jQuery.Promise} A promise that resolves with an array of notification
	 *  id's.
	 */
	mw.echo.dm.NotificationsModel.prototype.fetchNotifications = function ( apiPromise ) {
		var model = this;

		// Rebuild the notifications promise either when it is null or when
		// it exists in a failed state
		return this.getApi().fetchNotifications( apiPromise )
			.then( function ( result ) {
				var notifData, i, len, t, tlen, $content,
					notificationModel, types,
					optionItems = [],
					idArray = [],
					data = OO.getProp( result.query, 'notifications', model.type ) || { index: [] };

				types = $.isArray( model.type ) ? model.type : [ model.type ];

				for ( t = 0, tlen = types.length; t < tlen; t++ ) {
					data = OO.getProp( result.query, 'notifications', types[ t ] ) || { index: [] };
					for ( i = 0, len = data.index.length; i < len; i++ ) {
						notifData = data.list[ data.index[i] ];
						if ( model.getItemById( notifData.id ) ) {
							// Skip if we already have the item
							continue;
						}
						// TODO: This should really be formatted better, and the OptionWidget
						// should be the one that displays whatever icon relates to this notification
						// according to its type.
						$content = $( $.parseHTML( notifData['*'] ) );

						notificationModel = new mw.echo.dm.NotificationItem(
							notifData.id,
							{
								read: !!notifData.read,
								seen: !!notifData.read || notifData.timestamp.mw <= model.getSeenTime(),
								timestamp: notifData.timestamp.mw,
								category: notifData.category,
								content: $content,
								type: model.getType(),
								// Hack: Get the primary link from the $content
								primaryUrl: $content.find( '.mw-echo-notification-primary-link' ).attr( 'href' )
							}
						);

						idArray.push( notifData.id );
						optionItems.push( notificationModel );
					}
				}

				// Add to the model
				model.addItems( optionItems, 0 );

				return idArray;
			} );
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
	};

	/**
	 * Update the unread and unseen tracking lists when we clear items
	 */
	mw.echo.dm.NotificationsModel.prototype.clearItems = function () {
		this.unreadNotifications.clearItems();
		this.unseenNotifications.clearItems();

		// Parent
		mw.echo.dm.SortedList.prototype.clearItems.call( this );
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
	 * Get the API handler associated with this model's source
	 *
	 * @return {mw.echo.dm.APIHandler} API handler
	 */
	mw.echo.dm.NotificationsModel.prototype.getApi = function () {
		return this.networkHandler.getApiHandler( this.source );
	};

} )( mediaWiki, jQuery );
