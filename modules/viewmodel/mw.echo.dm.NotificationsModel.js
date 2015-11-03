( function ( mw, $ ) {
	/**
	 * Notification view model
	 *
	 * @class
	 * @mixins OO.EventEmitter
	 *
	 * @constructor
	 * @param {Object} [config] Configuration object
	 * @cfg {string} [type='alert'] Notification type 'alert', 'message' or 'all'
	 * @cfg {number} [limit=25] Notification limit
	 * @cfg {string} [userLang] User language
	 */
	mw.echo.dm.NotificationsModel = function MwEchoDmNotificationsModel( config ) {
		config = config || {};

		// Mixin constructor
		OO.EventEmitter.call( this );

		// Mixin constructor
		mw.echo.dm.List.call( this );

		this.type = config.type || 'alert';
		this.limit = config.limit || 25;
		this.userLang = config.userLang || 'en';

		this.api = new mw.Api( { ajax: { cache: false } } );
		this.fetchNotificationsPromise = null;
		this.apiErrorState = false;

		this.seenTime = mw.config.get( 'wgEchoSeenTime' );

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
	};

	/* Initialization */

	OO.initClass( mw.echo.dm.NotificationsModel );
	OO.mixinClass( mw.echo.dm.NotificationsModel, OO.EventEmitter );
	OO.mixinClass( mw.echo.dm.NotificationsModel, mw.echo.dm.List );

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
	 * Notifications type are given from the API: 'alert', 'message', 'all'
	 *
	 * @return {string} Notifications type
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
		this.seenTime[ this.type ] = time;
	};

	/**
	 * Get the system seen time
	 *
	 * @return {string} Mediawiki seen timestamp in Mediawiki timestamp format
	 */
	mw.echo.dm.NotificationsModel.prototype.getSeenTime = function () {
		return this.seenTime[ this.type ];
	};

	/**
	 * Check whether the model is fetching notifications from the API
	 *
	 * @return {boolean} The model is in the process of fetching from the API
	 */
	mw.echo.dm.NotificationsModel.prototype.isFetchingNotifications = function () {
		return !!this.fetchNotificationsPromise;
	};

	/**
	 * Check whether the model has an api error state flagged
	 *
	 * @return {boolean} The model is in api error state
	 */
	mw.echo.dm.NotificationsModel.prototype.isFetchingErrorState = function () {
		return !!this.apiErrorState;
	};

	/**
	 * Return the fetch notifications promise
	 * @return {jQuery.Promise} Promise that is resolved when notifications were
	 *  fetched from the API.
	 */
	mw.echo.dm.NotificationsModel.prototype.getFetchNotificationPromise = function () {
		return this.fetchNotificationsPromise;
	};

	/**
	 * Update the seen timestamp
	 *
	 * @return {jQuery.Promise} A promise that resolves with the seen timestamp
	 * @fires updateSeenTime
	 */
	mw.echo.dm.NotificationsModel.prototype.updateSeenTime = function () {
		var i, len,
			model = this,
			items = this.unseenNotifications.getItems();

		// Update the notifications seen status
		for ( i = 0, len = items.length; i < len; i++ ) {
			items[ i ].toggleSeen( true );
		}
		this.emit( 'updateSeenTime' );

		return this.api.postWithToken( 'edit', {
			action: 'echomarkseen',
			type: this.type
		} )
			.then( function ( data ) {
				var time = data.query.echomarkseen.timestamp;

				// Update seen time from the server
				model.setSeenTime( time );
			} );
	};

	/**
	 * Mark all notifications as read
	 *
	 * @return {jQuery.Promise} A promise that resolves when all notifications
	 * were marked as read.
	 */
	mw.echo.dm.NotificationsModel.prototype.markAllRead = function () {
		var model = this,
			data = {
				action: 'echomarkread',
				uselang: this.userLang,
				sections: this.type
			};

		if ( !this.unreadNotifications.getItemCount() ) {
			return $.Deferred().resolve( 0 ).promise();
		}

		return this.api.postWithToken( 'edit', data )
			.then( function ( result ) {
				return result.query.echomarkread[model.type].rawcount || 0;
			} )
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
		var model = this,
			data = {
				action: 'echomarkread',
				uselang: this.userLang,
				list: itemId
			};

		if ( !this.unreadNotifications.getItemCount() ) {
			return $.Deferred().resolve( 0 ).promise();
		}

		return this.api.postWithToken( 'edit', data )
			.then( function ( result ) {
				return result.query.echomarkread[model.type].rawcount || 0;
			} );
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
		var model = this,
			params = $.extend( { notsections: this.type }, mw.echo.apiCallParams );

		// Rebuild the notifications promise either when it is null or when
		// it exists in a failed state
		if ( !this.fetchNotificationsPromise || this.isFetchingErrorState() ) {
			this.apiErrorState = false;
			this.fetchNotificationsPromise = ( apiPromise || this.api.get( params ) )
				.then( function ( result ) {
					var notifData, i, len, $content, wasSeen, wasRead, notificationModel,
						optionItems = [],
						idArray = [],
						data = result.query.notifications[model.type];

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

						wasRead = !!notifData.read;
						wasSeen = notifData.timestamp.mw <= model.getSeenTime();
						notificationModel = new mw.echo.dm.NotificationItem(
							notifData.id,
							{
								read: wasRead,
								seen: wasRead || wasSeen,
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
					model.addItems( optionItems, 0 );

					return idArray;
				} )
				.fail( function () {
					// Mark API error state
					model.apiErrorState = true;
				} )
				.always( function ( idArray ) {
					model.fetchNotificationsPromise = null;

					return idArray;
				} );
		}
		return this.fetchNotificationsPromise;
	};

	/**
	 * Update the unread and unseen tracking lists when we add items
	 *
	 * @param {mw.echo.dm.NotificationItem[]} items Items to add
	 * @param {number} index Index to add items at
	 */
	mw.echo.dm.NotificationsModel.prototype.addItems = function ( items, index ) {
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
		mw.echo.dm.List.prototype.addItems.call( this, items, index );
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
		mw.echo.dm.List.prototype.removeItems.call( this, items );
	};

	/**
	 * Update the unread and unseen tracking lists when we clear items
	 */
	mw.echo.dm.NotificationsModel.prototype.clearItems = function () {
		this.unreadNotifications.clearItems();
		this.unseenNotifications.clearItems();

		// Parent
		mw.echo.dm.List.prototype.clearItems.call( this );
	};

	/**
	 * Query the API for unread count of the notifications in this model
	 *
	 * @return {jQuery.Promise} jQuery promise that's resolved when the unread count is fetched
	 *  and the badge label is updated.
	 */
	mw.echo.dm.NotificationsModel.prototype.fetchUnreadCountFromApi = function () {
		var apiData = {
				action: 'query',
				meta: 'notifications',
				notsections: this.getType(),
				notmessageunreadfirst: 1,
				notlimit: this.limit,
				notprop: 'index|count',
				uselang: this.userLang
			};

		return this.api.get( apiData )
			.then( function ( result ) {
				return OO.getProp( result.query, 'notifications', 'rawcount' ) || 0;
			} );
	};
} )( mediaWiki, jQuery );
