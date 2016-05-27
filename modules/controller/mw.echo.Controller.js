( function ( mw, $ ) {
	/**
	 * Controller for Echo notifications
	 *
	 * @param {mw.echo.api.EchoApi} echoApi Echo API
	 * @param {mw.echo.dm.ModelManager} manager Model manager
	 * @param {Object} [config] Configuration
	 */
	mw.echo.Controller = function MwEchoController( echoApi, manager, config ) {
		config = config || {};

		this.api = echoApi;
		this.manager = manager;
	};

	/* Initialization */
	OO.initClass( mw.echo.Controller );

	/**
	 * Fetch the next page by date
	 *
	 * @return {jQuery.Promise} A promise that resolves with an object where the keys are
	 *  days and the items are item IDs.
	 */
	mw.echo.Controller.prototype.fetchNextPageByDate = function () {
		this.manager.getPaginationModel().forwards();
		return this.fetchLocalNotificationsByDate();
	};

	/**
	 * Fetch the previous page by date
	 *
	 * @return {jQuery.Promise} A promise that resolves with an object where the keys are
	 *  days and the items are item IDs.
	 */
	mw.echo.Controller.prototype.fetchPrevPageByDate = function () {
		this.manager.getPaginationModel().backwards();
		return this.fetchLocalNotificationsByDate();
	};

	/**
	 * Fetch the first page by date
	 *
	 * @return {jQuery.Promise} A promise that resolves with an object where the keys are
	 *  days and the items are item IDs.
	 */
	mw.echo.Controller.prototype.fetchFirstPageByDate = function () {
		this.manager.getPaginationModel().setCurrPageIndex( 0 );
		return this.fetchLocalNotificationsByDate();
	};

	/**
	 * Fetch notifications from the local API and sort them by date.
	 * This method ignores cross-wiki notifications and bundles.
	 *
	 * @param {number} [page] Page number. If not given, it defaults to the current
	 *  page.
	 * @return {jQuery.Promise} A promise that resolves with an object where the keys are
	 *  days and the items are item IDs.
	 */
	mw.echo.Controller.prototype.fetchLocalNotificationsByDate = function ( page ) {
		var controller = this,
			pagination = this.manager.getPaginationModel(),
			continueValue = pagination.getPageContinue( page || pagination.getCurrPageIndex() );

		return this.api.fetchNotifications(
			this.manager.getTypeString(),
			'local',
			true,
			continueValue
		)
			.then( function ( data ) {
				var i, notifData, newNotifData, date, itemModel, symbolicName,
					dateItemIds = {},
					dateItems = {},
					models = {};

				data = data || { list: [] };

				// Go over the data
				for ( i = 0; i < data.list.length; i++ ) {
					notifData = data.list[ i ];

					// Collect common data
					newNotifData = controller.createNotificationData( notifData );
					if ( notifData.type !== 'foreign' ) {
						date = newNotifData.timestamp.substring( 0, 8 );
						newNotifData.source = 'local_' + date;

						// Single notifications
						itemModel = new mw.echo.dm.NotificationItem(
							notifData.id,
							newNotifData
						);

						dateItems[ date ] = dateItems[ date ] || [];
						dateItems[ date ].push( itemModel );

						dateItemIds[ date ] = dateItemIds[ date ] || [];
						dateItemIds[ date ].push( notifData.id );
					}
				}

				// Fill in the models
				for ( date in dateItems ) {
					symbolicName = 'local_' + date;

					// Set up model
					models[ symbolicName ] = new mw.echo.dm.NotificationsList( {
						type: controller.manager.getTypes(),
						source: symbolicName,
						title: date,
						timestamp: date
					} );

					models[ symbolicName ].setItems( dateItems[ date ] );
				}

				// Register local sources
				controller.api.registerLocalSources( Object.keys( models ) );

				// Update the manager
				controller.manager.setNotificationModels( models );

				// Update the pagination
				controller.manager.getPaginationModel().setNextPageContinue( data.continue );

				return dateItemIds;
			} );
	};
	/**
	 * Fetch notifications from the local API and update the notifications list.
	 *
	 * @param {boolean} [isForced] Force a renewed fetching promise. If set to false, the
	 *  model will request the stored/cached fetching promise from the API. A 'true' value
	 *  will force the API to re-request that information from the server and update the
	 *  notifications.
	 * @return {jQuery.Promise} A promise that resolves with an array of notification IDs
	 */
	mw.echo.Controller.prototype.fetchLocalNotifications = function ( isForced ) {
		var controller = this,
			// Create a new local list model
			localListModel = new mw.echo.dm.NotificationsList( {
				type: this.manager.getTypes()
			} ),
			localItems = [],
			idArray = [];

		this.manager.counter.update();

		// Fetch the notifications from the database
		// Initially, we're going to have to split the operation
		// between local notifications and x-wiki notifications
		// until the backend gives us the x-wiki notifications as
		// part of the original response.
		return this.api.fetchNotifications( this.manager.getTypeString(), 'local', !!isForced )
			.then(
				// Success
				function ( data ) {
					var i, notifData, content, newNotifData,
						foreignListModel, source, itemModel,
						allModels = { local: localListModel };

					data = data || { list: [] };

					// Go over the data
					for ( i = 0; i < data.list.length; i++ ) {
						notifData = data.list[ i ];
						content = notifData[ '*' ] || {};

						// Collect common data
						newNotifData = controller.createNotificationData( notifData );
						if ( notifData.type === 'foreign' ) {
							// x-wiki notification multi-group
							// We need to request a new list model
							allModels.xwiki = foreignListModel = new mw.echo.dm.CrossWikiNotificationItem( notifData.id, newNotifData );
							foreignListModel.setForeign( true );

							// Register foreign sources
							controller.api.registerForeignSources( notifData.sources );
							// Add the lists according to the sources
							for ( source in notifData.sources ) {
								foreignListModel.getList().addGroup(
									source,
									notifData.sources[ source ]
								);
							}
						} else {
							// Local single notifications
							itemModel = new mw.echo.dm.NotificationItem(
								notifData.id,
								newNotifData
							);

							idArray.push( notifData.id );
							localItems.push( itemModel );
						}

					}

					// Refresh local items
					localListModel.addItems( localItems );

					// Update the controller
					controller.manager.setNotificationModels( allModels );

					return idArray;
				},
				// Failure
				function ( errCode, errObj ) {
					if ( !controller.manager.getNotificationModel( 'local' ) ) {
						// Update the controller
						controller.manager.setNotificationModels( { local: localListModel } );
					}
					return {
						errCode: errCode,
						errInfo: OO.getProp( errObj, 'error', 'info' )
					};
				}
			);
	};

	/**
	 * Create notification data config object for notification items from the
	 * given API data.
	 *
	 * @param {Object} apiData API data
	 * @return {Object} Notification config data object
	 */
	mw.echo.Controller.prototype.createNotificationData = function ( apiData ) {
		var content = apiData[ '*' ] || {};

		return {
			// type: controller.type,
			foreign: false,
			source: 'local',
			count: apiData.count,
			read: !!apiData.read,
			seen: !!apiData.read || apiData.timestamp.mw <= this.manager.getSeenTime(),
			timestamp: apiData.timestamp.utcmw,
			category: apiData.category,
			content: {
				header: content.header,
				body: content.body
			},
			iconURL: content.iconUrl,
			iconType: content.icon,
			primaryUrl: OO.getProp( content.links, 'primary', 'url' ),
			secondaryUrls: OO.getProp( content.links, 'secondary' ) || []
		};
	};

	/**
	 * Mark all items within a given list model as read.
	 *
	 * NOTE: This method is strictly for list models, and will not work for
	 * group list models. To mark items as read in the xwiki model, whether
	 * it is pre-populated or not, please see #markEntireCrossWikiItemAsRead
	 *
	 * @param {string} [modelName] Symbolic name for the model
	 * @return {jQuery.Promise} Promise that is resolved when all items
	 *  were marked as read.
	 */
	mw.echo.Controller.prototype.markEntireListModelRead = function ( modelName ) {
		var i, items,
			itemIds = [],
			model = this.manager.getNotificationModel( modelName || 'local' );

		if ( !model ) {
			// Model doesn't exist
			return $.Deferred().reject();
		}

		items = model.getItems();
		for ( i = 0; i < items.length; i++ ) {
			if ( !items[ i ].isRead() ) {
				itemIds.push( items[ i ].getId() );
			}
		}

		return this.markItemsRead( itemIds, model.getSource(), true );
	};

	/**
	 * Fetch notifications from the cross-wiki sources.
	 *
	 * @return {jQuery.Promise} Promise that is resolved when all items
	 *  from the cross-wiki sources are populated into the cross-wiki
	 *  model.
	 */
	mw.echo.Controller.prototype.fetchCrossWikiNotifications = function () {
		var controller = this,
			xwikiModel = this.manager.getNotificationModel( 'xwiki' );

		if ( !xwikiModel ) {
			// There is no xwiki notifications model, so we can't
			// fetch into it
			return $.Deferred().reject().promise();
		}

		return this.api.fetchNotificationGroups( xwikiModel.getSourceNames(), this.manager.getTypeString() )
			.then(
				function ( groupList ) {
					var i, notifData, listModel, group, groupItems,
						items = [];

					for ( group in groupList ) {
						listModel = xwikiModel.getItemBySource( group );
						groupItems = groupList[ group ];

						items = [];
						for ( i = 0; i < groupItems.length; i++ ) {
							notifData = controller.createNotificationData( groupItems[ i ] );
							items.push(
								new mw.echo.dm.NotificationItem( groupItems[ i ].id, $.extend( notifData, {
									source: group,
									bundled: true,
									foreign: true
								} ) )
							);
						}
						// Add items
						listModel.setItems( items );
					}
				},
				function ( errCode, errObj ) {
					return {
						errCode: errCode,
						errInfo: errCode === 'http' ?
							mw.msg( 'echo-api-failure-cross-wiki' ) :
							OO.getProp( errObj, 'error', 'info' )
					};
				}
			);
	};

	/**
	 * Mark a single item as read. The item can be a local item or an item
	 * that is part of an xwiki foreign list.
	 *
	 * @param {number} itemId Item ID
	 * @param {string} modelSource The source that these items belong to
	 * @param {boolean} [isForeign=false] The model is foreign, inside a cross-wiki
	 *  bundle.
	 * @param {boolean} [isRead=true] The read state of the item; true for marking the
	 *  item as read, false for marking the item as unread
	 * @return {jQuery.Promise} A promise that is resolved when the operation
	 *  is complete, with the number of unread notifications still remaining
	 *  for the set type of this controller, in the given source.
	 */
	mw.echo.Controller.prototype.markSingleItemRead = function ( itemId, modelSource, isForeign, isRead ) {
		if ( isForeign ) {
			return this.markCrossWikiItemsRead( [ itemId ], modelSource, isRead );
		}

		return this.markItemsRead( [ itemId ], modelSource, isRead );
	};

	/**
	 * Mark local items as read in the API.
	 *
	 * @param {string[]|string} itemIds An array of item IDs, or a single item ID, to mark as read
	 * @param {string} modelSource The source that these items belong to
	 * @param {boolean} [isRead=true] The read state of the item; true for marking the
	 *  item as read, false for marking the item as unread
	 * @return {jQuery.Promise} A promise that is resolved when the operation
	 *  is complete, with the number of unread notifications still remaining
	 *  for the set type of this controller, in the given source.
	 */
	mw.echo.Controller.prototype.markItemsRead = function ( itemIds, modelSource, isRead ) {
		itemIds = Array.isArray( itemIds ) ? itemIds : [ itemIds ];

		// Default to true
		isRead = isRead === undefined ? true : isRead;

		this.manager.getNotificationModel( modelSource ).findByIds( itemIds ).forEach( function ( notification ) {
			notification.toggleRead( isRead );
		} );

		this.manager.getUnreadCounter().estimateChange( isRead ? -itemIds.length : itemIds.length );

		return this.api.markItemsRead( itemIds, modelSource, isRead ).then( this.refreshUnreadCount.bind( this ) );
	};

	/**
	 * Mark cross-wiki items as read in the API.
	 *
	 * @param {string[]|string} itemIds An array of item IDs, or a single item ID, to mark as read
	 * @param {string} modelSource The source that these items belong to
	 * @return {jQuery.Promise} A promise that is resolved when the operation
	 *  is complete, with the number of unread notifications still remaining
	 *  for the set type of this controller, in the given source.
	 */
	mw.echo.Controller.prototype.markCrossWikiItemsRead = function ( itemIds, modelSource ) {
		var sourceModel,
			notifs = [],
			xwikiModel = this.manager.getNotificationModel( 'xwiki' );

		if ( !xwikiModel ) {
			return $.Deferred().reject().promise();
		}
		this.manager.getUnreadCounter().estimateChange( -itemIds.length );

		itemIds = Array.isArray( itemIds ) ? itemIds : [ itemIds ];

		sourceModel = xwikiModel.getList().getGroupBySource( modelSource );
		notifs = sourceModel.findByIds( itemIds );
		sourceModel.discardItems( notifs );

		return this.api.markItemsRead( itemIds, modelSource, true )
			.then( this.refreshUnreadCount.bind( this ) );
	};

	/**
	 * Mark all cross-wiki notifications from all sources as read
	 *
	 * @return {jQuery.Promise} Promise that is resolved when all notifications
	 *  are marked as read
	 */
	mw.echo.Controller.prototype.markEntireCrossWikiItemAsRead = function () {
		var controller = this,
			xwikiModel = this.manager.getNotificationModel( 'xwiki' );

		if ( !xwikiModel ) {
			return $.Deferred().reject().promise();
		}

		return this.api.fetchNotificationGroups( xwikiModel.getSourceNames(), this.manager.getTypeString() )
			.then( function ( groupList ) {
				var i, listModel, group, groupItems,
					promises = [],
					idArray = [],
					itemCounter = 0;

				for ( group in groupList ) {
					listModel = xwikiModel.getItemBySource( group );
					groupItems = groupList[ group ];

					idArray = [];
					for ( i = 0; i < groupItems.length; i++ ) {
						idArray.push( groupItems[ i ].id );
					}
					itemCounter += idArray.length;

					// Mark items as read in the API
					promises.push(
						controller.markCrossWikiItemsRead( idArray, listModel.getSource() )
					);

				}
				// Synchronously remove this model from the widget
				controller.removeCrossWikiItem();

				controller.manager.counter.estimateChange( -itemCounter );
				return mw.echo.api.NetworkHandler.static.waitForAllPromises( promises );
			} );
	};

	/**
	 * Remove the entire cross-wiki model.
	 */
	mw.echo.Controller.prototype.removeCrossWikiItem = function () {
		this.manager.removeNotificationModel( 'xwiki' );
	};

	/**
	 * Refresh the unread notifications counter
	 *
	 * @return {jQuery.Promise} A promise that is resolved when the counter
	 *  is updated with the actual unread count from the server.
	 */
	mw.echo.Controller.prototype.refreshUnreadCount = function () {
		return this.manager.getUnreadCounter().update();
	};

	/**
	 * Update local seenTime for the given types
	 *
	 * @return {jQuery.Promise} A promise that is resolved when the
	 *  seenTime was updated for all given types.
	 */
	mw.echo.Controller.prototype.updateLocalSeenTime = function () {
		var controller = this,
			promises = [],
			types = this.manager.getTypes();

		types.forEach( function ( type ) {
			promises.push( controller.api.updateSeenTime( 'local', type ) );
		} );

		return mw.echo.api.NetworkHandler.static.waitForAllPromises( promises )
			.then( function ( promises ) {
				var i;
				// Update the seen time object
				// The promises are in the same order as the types
				// so we can use the same iterator for both
				for ( i = 0; i < promises.length; i++ ) {
					promises[ i ].done( controller.manager.updateSeenTimeObject.bind( controller.manager, types[ i ] ) );
				}
			} )
			.then( controller.manager.setLocalModelItemsSeen.bind( controller.manager ) );
	};

	/**
	 * Get the types associated with the controller and model
	 *
	 * @return {string[]} Notification types
	 */
	mw.echo.Controller.prototype.getTypes = function () {
		return this.manager.getTypes();
	};

	/**
	 * Return a string representation of the notification type.
	 * It could be 'alert', 'message' or, if both are set, 'all'
	 *
	 * @return {string} String representation of notifications type
	 */
	mw.echo.Controller.prototype.getTypeString = function () {
		return this.manager.getTypeString();
	};
} )( mediaWiki, jQuery );
