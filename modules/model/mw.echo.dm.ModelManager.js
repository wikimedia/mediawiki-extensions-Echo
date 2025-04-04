/**
 * A container that manages all models that are involved in creating
 * the notification list. There are currently two types of models:
 * - mw.echo.dm.SortedList - This currently includes the local model
 *   or any model that has individual messages.
 * - mw.echo.dm.CrossWikiNotificationItem - This is a model for the
 *   cross wiki notification, which acts as an item but itself contains
 *   a list.
 *
 * All notification models that are managed by the manager must implement the
 * following methods:
 * - getName - This should retrieve the model's name for the manager to fetch
 * - isGroup - This should be true for xwiki model and local bundles
 * - hasUnseen - This should iterate in the model's items and check whether
 *   there are any unseen notifications within them.
 * - getCount - Get a total count of available notifications currently in the model
 *
 * @class
 * @mixes OO.EventEmitter
 *
 * @constructor
 * @param {mw.echo.dm.UnreadNotificationCounter} counter Unread counter
 * @param {Object} [config={}]
 * @param {string|string[]} [config.type="message"] The type of the notifications in
 *  the models that this manager handles.
 * @param {number} [config.itemsPerPage=25] Number of items per page
 * @param {string} [config.readState] Notifications read state. Pass through to mw.echo.dm.FiltersModel
 */
mw.echo.dm.ModelManager = function MwEchoDmModelManager( counter, config ) {
	config = config || {};

	// Mixin constructor
	OO.EventEmitter.call( this );

	this.counter = counter;
	// Keep types in an array
	this.types = config.type || 'message';
	this.types = Array.isArray( this.types ) ?
		config.type : [ this.types ];

	this.seenTimeModel = new mw.echo.dm.SeenTimeModel( { types: this.types } );

	this.notificationModels = {};
	this.paginationModel = new mw.echo.dm.PaginationModel( {
		itemsPerPage: config.itemsPerPage || 25
	} );
	this.filtersModel = new mw.echo.dm.FiltersModel( {
		selectedSource: 'local',
		readState: config.readState
	} );

	// Events
	this.seenTimeModel.connect( this, { update: 'onSeenTimeUpdate' } );

	this.localCounter = config.localCounter || new mw.echo.dm.UnreadNotificationCounter();
	this.localCounter.connect( this, { countChange: [ 'emit', 'localCountChange' ] } );
};

OO.initClass( mw.echo.dm.ModelManager );
OO.mixinClass( mw.echo.dm.ModelManager, OO.EventEmitter );

/* Events */

/**
 * The model has been rebuilt or has been updated
 *
 * @event mw.echo.dm.ModelManager#update
 * @param {Object[]} Current available notifications
 */

/**
 * A model has been permanently removed
 *
 * @event mw.echo.dm.ModelManager#discard
 * @param {string} modelId Discard model id
 */

/**
 * All notifications in that source are seen
 *
 * @event mw.echo.dm.ModelManager#seen
 * @param {string} source Source where seenTime was updated
 * @param {number} timestamp The new seen timestamp, as a full UTC ISO 8601 timestamp
 */

/**
 * There are no more local talk page notifications
 *
 * @event mw.echo.dm.ModelManager#allTalkRead
 */

/**
 * A specific item inside a notifications model has been updated
 *
 * @event mw.echo.dm.ModelManager#modelItemUpdate
 * @param {string} modelId Model ID
 * @param {mw.echo.dm.NotificationItem} item Updated item
 */

/**
 * There was a change in the count of local unread notifications
 *
 * @event mw.echo.dm.ModelManager#localCountChange
 */

/* Methods */

/**
 * Respond to seen time change for a given source
 *
 * @param {string} timestamp Seen time, as a full UTC ISO 8601 timestamp
 * @fires mw.echo.dm.ModelManager#seen
 */
mw.echo.dm.ModelManager.prototype.onSeenTimeUpdate = function ( timestamp ) {
	const models = this.getAllNotificationModels();

	for ( const modelId in models ) {
		models[ modelId ].updateSeenState( timestamp );
	}

	this.emit( 'seen', timestamp );
};

/**
 * Respond to a notification model discarding items.
 *
 * @param {string} modelId Model name
 */
mw.echo.dm.ModelManager.prototype.onModelDiscardItems = function ( modelId ) {
	const model = this.getNotificationModel( modelId );

	// If the model is empty, remove it
	if ( model.isEmpty() ) {
		this.removeNotificationModel( modelId );
	}
};

/**
 * Get the notifications
 *
 * @return {Object} Object of notification models and their symbolic names
 */
mw.echo.dm.ModelManager.prototype.getAllNotificationModels = function () {
	return this.notificationModels;
};

/**
 * Set the models in the manager.
 *
 * @param {Object} modelDefinitions An object defining the models
 * The format for the definition object is:
 * {
 *   'modelId': {mw.echo.dm.SortedList},
 *   ...
 * }
 * @fires mw.echo.dm.ModelManager#update
 */
mw.echo.dm.ModelManager.prototype.setNotificationModels = function ( modelDefinitions ) {
	this.resetNotificationModels();

	for ( const modelId in modelDefinitions ) {
		this.notificationModels[ modelId ] = modelDefinitions[ modelId ];
		this.notificationModels[ modelId ].connect( this, {
			discard: [ 'onModelDiscardItems', modelId ],
			itemUpdate: [ 'onModelItemUpdate', modelId ]
		} );
	}

	// Update pagination count
	this.updateCurrentPageItemCount();

	this.emit( 'update', this.getAllNotificationModels() );
};

/**
 * Respond to model update event
 *
 * @param {string} modelName Model name
 * @param {mw.echo.dm.NotificationItem} item Notification item
 * @fires mw.echo.dm.ModelManager#modelItemUpdate
 */
mw.echo.dm.ModelManager.prototype.onModelItemUpdate = function ( modelName, item ) {
	this.checkLocalUnreadTalk();

	this.emit( 'modelItemUpdate', modelName, item );
};

/**
 * Update the current page item count based on available items
 */
mw.echo.dm.ModelManager.prototype.updateCurrentPageItemCount = function () {
	this.getPaginationModel().setCurrentPageItemCount( this.getAllNotificationCount() );
};

/**
 * Go over all the notification models and return the total number of
 * available notifications.
 *
 * @return {number} A count of all notifications
 */
mw.echo.dm.ModelManager.prototype.getAllNotificationCount = function () {
	const models = this.getAllNotificationModels();

	let count = 0;
	for ( const model in models ) {
		count += models[ model ].getCount();
	}

	return count;
};

/**
 * Get a notification model.
 *
 * @param {string} modelName Unique model name
 * @return {mw.echo.dm.SortedList} Notifications model
 */
mw.echo.dm.ModelManager.prototype.getNotificationModel = function ( modelName ) {
	return this.notificationModels[ modelName ];
};

/**
 * Get the pagination model
 *
 * @return {mw.echo.dm.PaginationModel} Pagination model
 */
mw.echo.dm.ModelManager.prototype.getPaginationModel = function () {
	return this.paginationModel;
};

/**
 * Get the filters model
 *
 * @return {mw.echo.dm.FiltersModel} Filters model
 */
mw.echo.dm.ModelManager.prototype.getFiltersModel = function () {
	return this.filtersModel;
};

/**
 * Remove a model from the manager
 *
 * @param {string} modelName Symbolic name of the model
 * @fires mw.echo.dm.ModelManager#discard
 */
mw.echo.dm.ModelManager.prototype.removeNotificationModel = function ( modelName ) {
	delete this.notificationModels[ modelName ];

	this.emit( 'discard', modelName );
};

/**
 * Reset all models
 *
 * @private
 */
mw.echo.dm.ModelManager.prototype.resetNotificationModels = function () {
	for ( const model in this.notificationModels ) {
		if ( Object.prototype.hasOwnProperty.call( this.notificationModels, model ) ) {
			this.notificationModels[ model ].disconnect( this );
			delete this.notificationModels[ model ];
		}
	}
};

/**
 * Get the unread notification counter
 *
 * @return {mw.echo.dm.UnreadNotificationCounter} Unread notification counter
 */
mw.echo.dm.ModelManager.prototype.getUnreadCounter = function () {
	return this.counter;
};

/**
 * Check if the local model has any unread notifications.
 *
 * @return {boolean} Local model has unread notifications.
 */
mw.echo.dm.ModelManager.prototype.hasLocalUnread = function () {
	return this.getLocalNotifications().some( ( item ) => !item.isRead() );
};

/**
 * Get local unread notifications
 *
 * @return {mw.echo.dm.NotificationItem[]} Local unread notifications
 */
mw.echo.dm.ModelManager.prototype.getLocalUnread = function () {
	return this.getLocalNotifications().filter( ( item ) => !item.isRead() );
};
/**
 * Check whether there are talk notifications, and emit an event
 * in case there aren't any left.
 *
 * @fires mw.echo.dm.ModelManager#allTalkRead
 */
mw.echo.dm.ModelManager.prototype.checkLocalUnreadTalk = function () {
	if ( !this.hasLocalUnreadTalk() ) {
		this.emit( 'allTalkRead' );
	}
};

/**
 * Check if the local model has any unread talk page notifications.
 *
 * @return {boolean} Local model has unread talk page notifications.
 */
mw.echo.dm.ModelManager.prototype.hasLocalUnreadTalk = function () {
	return this.getLocalNotifications().some(
		( item ) => !item.isRead() && item.getCategory() === 'edit-user-talk'
	);
};

/**
 * Check if a model has any unseen notifications.
 *
 * @param {string} modelId Model ID
 * @return {boolean} The given model has unseen notifications.
 */
mw.echo.dm.ModelManager.prototype.hasUnseenInModel = function ( modelId ) {
	const model = this.getNotificationModel( modelId || 'local' );

	return model && model.hasUnseen();
};

/**
 * Check if a model has any unseen notifications.
 *
 * @param {string} [source='local'] Model source
 * @return {boolean} The given models has unseen notifications.
 */
mw.echo.dm.ModelManager.prototype.hasUnseenInSource = function ( source ) {
	source = source || 'local';
	const modelNames = this.getModelsBySource( source );

	for ( let i = 0; i < modelNames.length; i++ ) {
		if ( this.getNotificationModel( modelNames[ i ] ).hasUnseen() ) {
			return true;
		}
	}

	return false;
};

/**
 * Check if there are unseen notifications in any of the models
 *
 * @return {boolean} Local model has unseen notifications.
 */
mw.echo.dm.ModelManager.prototype.hasUnseenInAnyModel = function () {
	const models = this.getAllNotificationModels();

	for ( const model in models ) {
		if ( models[ model ].hasUnseen() ) {
			return true;
		}
	}

	return false;
};

/**
 * Get the system seen time
 *
 * @param {string} [source='local'] Seen time source
 * @return {string} Seen time, as a full UTC ISO 8601 timestamp
 */
mw.echo.dm.ModelManager.prototype.getSeenTime = function ( source ) {
	return this.getSeenTimeModel().getSeenTime( source );
};

/**
 * Get the array of model types
 *
 * @return {string[]} Model types
 */
mw.echo.dm.ModelManager.prototype.getTypes = function () {
	return this.types;
};

/**
 * Get the model types string; 'message', 'alert', or 'all'
 *
 * @return {string} Model types
 */
mw.echo.dm.ModelManager.prototype.getTypeString = function () {
	return (
		this.types.length === 1 ?
			this.types[ 0 ] :
			'all'
	);
};

/**
 * Get the local counter
 *
 * @return {mw.echo.dm.UnreadNotificationCounter} Local counter
 */
mw.echo.dm.ModelManager.prototype.getLocalCounter = function () {
	return this.localCounter;
};

/**
 * Get all local notifications
 *
 * @return {mw.echo.dm.NotificationItem[]} all local notifications
 */
mw.echo.dm.ModelManager.prototype.getLocalNotifications = function () {
	return this.getNotificationsBySource( 'local' );
};

/**
 * Get all notifications that come from a given source
 *
 * @param {string} [source='local'] Source name
 * @return {mw.echo.dm.NotificationItem[]} All notifications from that source
 */
mw.echo.dm.ModelManager.prototype.getNotificationsBySource = function ( source ) {
	source = source || 'local';

	const notifications = [];
	Object.keys( this.getAllNotificationModels() ).forEach( ( modelName ) => {
		const model = this.getNotificationModel( modelName );
		if ( model.getSource() === source ) {
			notifications.push( ...model.getItems() );
		}
	} );
	return notifications;
};

/**
 * Get all models that have a specific source
 *
 * @param {string} [source='local'] Given source
 * @return {string[]} All model IDs that use this source
 */
mw.echo.dm.ModelManager.prototype.getModelsBySource = function ( source ) {
	const modelIds = [];

	source = source || 'local';

	Object.keys( this.getAllNotificationModels() ).forEach( ( modelName ) => {
		const model = this.getNotificationModel( modelName );
		if ( model.getSource() === source ) {
			modelIds.push( modelName );
		}
	} );
	return modelIds;
};

/**
 * Get the SeenTime model
 *
 * @return {mw.echo.dm.SeenTimeModel} SeenTime model
 */
mw.echo.dm.ModelManager.prototype.getSeenTimeModel = function () {
	return this.seenTimeModel;

};
