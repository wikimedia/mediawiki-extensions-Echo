( function ( mw ) {
	/**
	 * Echo notification group item model
	 *
	 * @class
	 * @inherits mw.echo.dm.NotificationItem
	 * @mixins mw.echo.dm.SortedList
	 *
	 * @constructor
	 * @param {mw.echo.dm.NetworkHandler} networkHandler The network handler
	 * @param {Object[]} sources An array of objects defining the sources
	 *  of its item's sub-items.
	 * @param {number} id Notification id,
	 * @param {Object} [config] Configuration object
	 * @cfg {boolean} [removeReadNotifications=false] Completely remove notifications that are
	 *  marked as read.
	 * @cfg {number} [count=0] The number of items this group contains. This is used for both the
	 *  'expand' label and also to potentially update the badge counters for local bundles.
	 */
	mw.echo.dm.NotificationGroupItem = function mwEchoDmNotificationGroupItem( networkHandler, sources, id, config ) {
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
			empty: 'groupEmpty'
		} );
		this.connect( this, {
			groupEmpty: 'onGroupEmpty'
		} );
		this.removeReadNotifications = !!config.removeReadNotifications;

		this.sources = sources;
		this.networkHandler = networkHandler;
		this.notifModels = {};
		this.count = config.count || 0;

		// Create notification models for each source
		for ( source in this.sources ) {
			// Add external API handler
			this.networkHandler.addApiHandler( source, { url: this.sources[ source ].url }, true );

			// Create a notifications model
			item = new mw.echo.dm.NotificationsModel(
				this.networkHandler,
				{
					type: this.getType(),
					source: source,
					external: this.external,
					title: this.sources[ source ].title,
					removeReadNotifications: this.removeReadNotifications
				}
			);
			items.push( item );
			this.notifModels[source] = item;
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

	/* Methods */

	/**
	 * Respond to notification model being empty
	 *
	 * @param {mw.echo.dm.NotificationModel} notifModel Notification model
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

		return this.networkHandler.fetchNotificationGroups( sourceKeys )
			.then( function ( promises ) {
				var i;

				for ( i = 0; i < sourceKeys.length; i++ ) {
					notifModel = model.getItemById( sourceKeys[ i ] );
					if ( notifModel ) {
						fetchPromises.push( notifModel.fetchNotifications( promises[ i ] ) );
					}
				}

				// Wait for all fetch processes to finish before we resolve this promise
				return mw.echo.dm.NetworkHandler.static.waitForAllPromises( fetchPromises );
			} );
	};

	/**
	 * @inheritdoc
	 */
	mw.echo.dm.NotificationGroupItem.prototype.toggleRead = function ( read ) {
		var i,
			notifModels = this.getItems();

		read = read !== undefined ? read : !this.read;

		if ( this.read !== read ) {
			// Mark sub items as read
			for ( i = 0; i < notifModels.length; i++ ) {
				notifModels[ i ].markAllRead();
			}
		}

		// Parent method
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
	 * Get the anticipated count of items in this group item
	 *
	 * @return {number} Anticipated item count
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

} )( mediaWiki );
