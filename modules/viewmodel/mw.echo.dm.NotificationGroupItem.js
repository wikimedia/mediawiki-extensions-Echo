( function ( mw, $ ) {
	/**
	 * Echo notification group item model
	 *
	 * @class
	 * @extends mw.echo.dm.NotificationItem
	 * @mixins mw.echo.dm.SortedList
	 *
	 * @constructor
	 * @param {mw.echo.api.EchoApi} api Echo API
	 * @param {mw.echo.dm.UnreadNotificationCounter} unreadCounter Counter of unread notifications
	 * @param {Object[]} sources An array of objects defining the sources
	 *  of its item's sub-items.
	 * @param {number} id Notification id,
	 * @param {Object} [config] Configuration object
	 * @cfg {boolean} [removeReadNotifications=false] Completely remove notifications that are
	 *  marked as read.
	 * @cfg {number} [count=0] The number of items this group contains. This is used for both the
	 *  'expand' label and also to potentially update the badge counters for local bundles.
	 */
	mw.echo.dm.NotificationGroupItem = function mwEchoDmNotificationGroupItem( api, unreadCounter, sources, id, config ) {
		var source, item,
			items = [];

		config = config || {};

		// Parent
		mw.echo.dm.NotificationGroupItem.parent.call( this, id, config );

		// Mixin constructor
		mw.echo.dm.SortedList.call( this );
		this.setSortingCallback( function ( a, b ) {
			var diff;
			// Reverse sorting
			diff = Number( b.getTimestamp() ) - Number( a.getTimestamp() );
			if ( diff !== 0 ) {
				return diff;
			}

			// Fallback on IDs
			return b.getId() - a.getId();
		} );
		this.aggregate( {
			empty: 'groupEmpty',
			itemRead: 'groupItemRead'
		} );
		this.connect( this, {
			groupEmpty: 'onGroupEmpty'
		} );
		this.removeReadNotifications = !!config.removeReadNotifications;

		this.unreadCounter = unreadCounter;
		this.sources = sources;
		this.api = api;
		this.notifModels = {};
		this.count = config.count || 0;

		// Create notification models for each source
		for ( source in this.sources ) {
			// Create a notifications model
			item = new mw.echo.dm.NotificationsModel(
				this.api,
				this.unreadCounter,
				{
					type: this.getType(),
					source: source,
					foreign: this.isForeign(),
					title: this.sources[ source ].title,
					removeReadNotifications: this.removeReadNotifications,
					timestamp: this.sources[ source ].ts
				}
			);
			items.push( item );
			this.notifModels[ source ] = item;
		}

		this.addItems( items );
	};

	/* Inheritance */

	OO.inheritClass( mw.echo.dm.NotificationGroupItem, mw.echo.dm.NotificationItem );
	OO.mixinClass( mw.echo.dm.NotificationGroupItem, mw.echo.dm.SortedList );

	/* Events */

	/**
	 * The group is empty
	 *
	 * @event empty
	 */

	/**
	 * The number of item read in a group changed
	 *
	 * @event groupItemRead
	 */

	/* Methods */

	/**
	 * Respond to notification model being empty
	 *
	 * @param {mw.echo.dm.NotificationsModel} notifModel Notifications model
	 */
	mw.echo.dm.NotificationGroupItem.prototype.onGroupEmpty = function ( notifModel ) {
		if ( this.removeReadNotifications ) {
			// This means the model is now empty. We should remove it as a group completely
			this.removeItems( [ notifModel ] );
		}

		if ( this.isEmpty() ) {
			this.emit( 'empty' );
		}
	};

	/**
	 * Fetch items from each of the sources
	 *
	 * @return {jQuery.Promise} Promise that is resolved when all items are fetched
	 */
	mw.echo.dm.NotificationGroupItem.prototype.fetchAllNotificationsInGroups = function () {
		var notifModel,
			model = this,
			fetchPromises = [],
			sourceKeys = Object.keys( this.sources );

		return this.api.fetchNotificationGroups( sourceKeys, this.getType() )
			.then( function () {
				var i;

				for ( i = 0; i < sourceKeys.length; i++ ) {
					notifModel = model.getItemById( sourceKeys[ i ] );
					if ( notifModel ) {
						fetchPromises.push( notifModel.fetchNotifications() );
					}
				}

				// Wait for all fetch processes to finish before we resolve this promise
				return mw.echo.api.NetworkHandler.static.waitForAllPromises( fetchPromises );
			} );
	};

	/**
	 * @inheritdoc
	 */
	mw.echo.dm.NotificationGroupItem.prototype.toggleRead = function ( read ) {
		var i, promise,
			notifModels = this.getItems();

		read = read !== undefined ? read : !this.read;

		if ( this.read !== read ) {
			for ( i = 0; i < notifModels.length; i++ ) {
				// Verify that we have items in the models. The models may still
				// be empty in the case where the group was marked as read before
				// it was expanded and the notifications were fetched.
				// NOTE: Local groups should never be empty, as we are
				// getting all items without the need to query the API. Even so,
				// this should happen to any notification that is empty to make
				// sure that we are only marking the correct items as read and not
				// all items indiscriminately.
				if ( notifModels[ i ].isEmpty() ) {
					// Fetch the notifications so we know what to mark as read
					promise = notifModels[ i ].fetchNotifications();
				} else {
					// Create a fake resolved promise for models that already
					// have items in them
					promise = $.Deferred().resolve( notifModels[ i ].getAllItemIds() );
				}

				// For each of those, mark items as read in the UI and API
				// Note that the promise for the notification models that
				// were already full will resolve immediately, and hence be
				// synchronous.
				/*jshint loopfunc:true */
				promise
					.then( ( function ( model ) {
						return function ( idArray ) {
							// Mark sub items as read in the UI
							model.markAllRead();
							// Mark all existing items as read in the API
							model.unreadCounter.estimateChange( -idArray.length );
							model.toggleItemsReadInApi( idArray, read ).then( function () {
								model.unreadCounter.update();
							} );
						};
					} )( notifModels[ i ] ) );
			}
		}

		// Parent method
		// Note: The parent method will mark this item as read, synchronously.
		// In cases where the notification is external and empty, we are fetching
		// the items (above) asynchronously, but the process of visually tagging
		// the entire group as read in the UI should not wait for that API request
		// to finish. Despite the async methods above, this is synchronous by design.
		mw.echo.dm.NotificationGroupItem.parent.prototype.toggleRead.call( this, read );
	};

	/**
	 * @inheritdoc
	 */
	mw.echo.dm.NotificationGroupItem.prototype.toggleSeen = function ( seen ) {
		var i,
			notifModels = this.getItems();

		seen = seen !== undefined ? seen : !this.seen;

		if ( this.seen !== seen ) {
			// Mark sub items as seen
			for ( i = 0; i < notifModels.length; i++ ) {
				notifModels[ i ].updateSeenTime();
			}
		}

		// Parent method
		mw.echo.dm.NotificationGroupItem.parent.prototype.toggleSeen.call( this, seen );
	};

	/**
	 * Get the item count.
	 *
	 * @return {number} count
	 */
	mw.echo.dm.NotificationGroupItem.prototype.getCount = function () {
		return this.count;
	};

	/**
	 * Get the array of sources for this group
	 *
	 * @return {string[]} Sources
	 */
	mw.echo.dm.NotificationGroupItem.prototype.getSources = function () {
		return this.sources;
	};

	/**
	 * Get all the sub-notification models for this group
	 *
	 * @return {Object} A keyed object containing mw.echo.dm.NotificationModel
	 *  objects keyed by their source name.
	 */
	mw.echo.dm.NotificationGroupItem.prototype.getSubModels = function () {
		return this.notifModels;
	};

} )( mediaWiki, jQuery );
