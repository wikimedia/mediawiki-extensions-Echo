( function ( mw ) {
	/**
	 * A container that manages all models that are involved in creating
	 * the notification list. There are currently two types of models:
	 * * mw.echo.dm.SortedList - This currently includes the local model
	 *   or any model that has individual messages.
	 * * mw.echo.dm.CrossWikiNotificationItem - This is a model for the
	 *   cross wiki notification, which acts as an item but itself contains
	 *   a list.
	 *
	 * All notification models that are managed by the manager must implement the
	 * following methods:
	 * * getName - This should retrieve the model's name for the manager to fetch
	 * * isGroup - This should be true for xwiki model and local bundles
	 * * hasUnseen - This should iterate in the model's items and check whether
	 *   there are any unseen notifications within them.
	 * * getCount - Get a total count of available notifications currently in the model
	 *
	 * @class
	 * @mixins OO.EventEmitter
	 *
	 * @constructor
	 * @param {mw.echo.dm.UnreadNotificationCounter} counter Unread counter
	 * @param {Object} [config] Configuration object
	 * @cfg {string|string[]} [type="message"] The type of the notifications in
	 *  the models that this manager handles.
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

		this.notificationModels = {};
		this.paginationModel = new mw.echo.dm.PaginationModel();
		this.filtersModel = new mw.echo.dm.FiltersModel();

		// Properties
		this.seenTime = mw.config.get( 'wgEchoSeenTime' ) || {};
	};

	OO.initClass( mw.echo.dm.ModelManager );
	OO.mixinClass( mw.echo.dm.ModelManager, OO.EventEmitter );

	/* Events */

	/**
	 * @event update
	 * @param {Object[]} Current available notifications
	 *
	 * The model has been rebuilt or has been updated
	 */

	/**
	 * @event remove
	 * @param {string} Removed model
	 *
	 * A model has been removed
	 */

	/**
	 * @event seen
	 *
	 * All local notifications are seen
	 */

	/**
	 * @event allTalkRead
	 *
	 * There are no more local talk page notifications
	 */

	/* Methods */

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
	 * 		'modelId': {mw.echo.dm.SortedList},
	 * 		...
	 * }
	 */
	mw.echo.dm.ModelManager.prototype.setNotificationModels = function ( modelDefinitions ) {
		var modelId,
			localModel;

		this.resetNotificationModels();

		for ( modelId in modelDefinitions ) {
			this.notificationModels[ modelId ] = modelDefinitions[ modelId ];
		}

		localModel = this.getNotificationModel( 'local' );
		if ( localModel ) {
			localModel.aggregate( { update: 'itemUpdate' } );
			localModel.connect( this, { itemUpdate: 'checkLocalUnreadTalk' } );
		}

		this.emit( 'update', this.getAllNotificationModels() );
	};

	/**
	 * Go over all the notification models and return the total number of
	 * available notifications.
	 *
	 * @return {number} A count of all notifications
	 */
	mw.echo.dm.ModelManager.prototype.getAllNotificationCount = function () {
		var model,
			count = 0,
			models = this.getAllNotificationModels();

		for ( model in models ) {
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
	 * @fires remove
	 */
	mw.echo.dm.ModelManager.prototype.removeNotificationModel = function ( modelName ) {
		delete this.notificationModels[ modelName ];
		this.emit( 'remove', modelName );
	};

	/**
	 * Reset all models
	 *
	 * @private
	 */
	mw.echo.dm.ModelManager.prototype.resetNotificationModels = function () {
		var model;

		for ( model in this.notificationModels ) {
			if ( this.notificationModels.hasOwnProperty( model ) ) {
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
		var localModel = this.getNotificationModel( 'local' ),
			isUnread = function ( item ) {
				return !item.isRead();
			};

		return localModel ?
			localModel.getItems().some( isUnread ) :
			false;
	};

	/**
	 * Check whether there are talk notifications, and emit an event
	 * in case there aren't any left.
	 *
	 * @fires allTalkRead
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
		var localModel = this.getNotificationModel( 'local' ),
			isUnreadUserTalk = function ( item ) {
				return !item.isRead() && item.getCategory() === 'edit-user-talk';
			};

		return localModel ?
			localModel.getItems().some( isUnreadUserTalk ) :
			false;
	};

	/**
	 * Check if a model has any unseen notifications.
	 *
	 * @param {string} modelId Model ID
	 * @return {boolean} The given model has unseen notifications.
	 */
	mw.echo.dm.ModelManager.prototype.hasUnseenInModel = function ( modelId ) {
		var model = this.getNotificationModel( modelId || 'local' );

		return model && model.hasUnseen();
	};

	/**
	 * Check if there are unseen notifications in any of the models
	 *
	 * @return {boolean} Local model has unseen notifications.
	 */
	mw.echo.dm.ModelManager.prototype.hasUnseenInAnyModel = function () {
		var model,
			models = this.getAllNotificationModels();

		for ( model in models ) {
			if ( models[ model ].hasUnseen() ) {
				return true;
			}
		}

		return false;
	};

	/**
	 * Update the local version of seenTime object.
	 *
	 * @private
	 * @param {string|string[]} type Type of notifications; could be a single type
	 *  or an array of types.
	 * @param {string} time Seen time
	 */
	mw.echo.dm.ModelManager.prototype.updateSeenTimeObject = function ( type, time ) {
		var i,
			types = Array.isArray( type ) ? type : [ type ];

		for ( i = 0; i < types.length; i++ ) {
			if ( this.seenTime.hasOwnProperty( types[ i ] ) ) {
				this.seenTime[ types[ i ] ] = time;
			}
		}
	};

	/**
	 * Set items in the local model as seen
	 *
	 * @private
	 */
	mw.echo.dm.ModelManager.prototype.setLocalModelItemsSeen = function () {
		var model = this.getNotificationModel( 'local' );

		model.getItems().forEach( function ( item ) {
			item.toggleSeen( true );
		} );

		this.emit( 'seen' );
	};

	/**
	 * Get the system seen time
	 *
	 * @param {string|string[]} [type] Notification types
	 * @return {string} Mediawiki seen timestamp in Mediawiki timestamp format
	 */
	mw.echo.dm.ModelManager.prototype.getSeenTime = function ( type ) {
		var types = type || this.getTypes();
		types = Array.isArray( types ) ? types : [ types ];

		// If the type that is set is an array [ 'alert', 'message' ]
		// then the seen time will be the same to both, and we can
		// return the value of the arbitrary first one.
		return this.seenTime[ types[ 0 ] ];
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

} )( mediaWiki, jQuery );
