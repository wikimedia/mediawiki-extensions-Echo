( function ( mw ) {
	/**
	 * Cross-wiki notification item model. Contains a list of sources,
	 * that each contain a list of notification items from that source.
	 *
	 * @class
	 * @extends mw.echo.dm.NotificationItem
	 *
	 * @constructor
	 * @param {number} id Notification id
	 * @param {Object} [config] Configuration object
	 * @cfg {number} count The initial anticipated count of notifications through all
	 *  of the sources.
	 * @cfg {number} hasUnseen Whether the bundle had any unseen notifications originally
	 *  in any source
	 */
	mw.echo.dm.CrossWikiNotificationItem = function MwEchoDmCrossWikiNotificationItem( id, config ) {
		config = config || {};

		mw.echo.dm.CrossWikiNotificationItem.parent.call( this, id, config );

		this.originallyUnseen = !!config.hasUnseen;
		this.populated = false;

		this.foreign = true;
		this.source = null;
		this.count = config.count || 0;
		this.seen = !this.originallyUnseen;

		this.list = new mw.echo.dm.NotificationGroupsList();

		this.list.connect( this, { discard: 'onListDiscard' } );
	};

	OO.inheritClass( mw.echo.dm.CrossWikiNotificationItem, mw.echo.dm.NotificationItem );

	/* Events */

	/**
	 * @event discard
	 * @param {string} name The symbolic name for the list model that was discarded
	 *
	 * A sub list has been discarded
	 */

	/* Methods */

	/**
	 * Respond to list being removed from the cross-wiki bundle.
	 *
	 * @param {mw.echo.dm.NotificationGroupsList} sourceModel The source model that was removed
	 * @fires discard
	 */
	mw.echo.dm.CrossWikiNotificationItem.prototype.onListDiscard = function ( sourceModel ) {
		this.emit( 'discard', sourceModel.getName() );
	};

	/**
	 * Get the list of sources
	 *
	 * @return {mw.echo.dm.NotificationGroupsList} List of sources
	 */
	mw.echo.dm.CrossWikiNotificationItem.prototype.getList = function () {
		return this.list;
	};

	/**
	 * Get an array of source names that are in the cross-wiki list
	 *
	 * @return {string[]} Source names
	 */
	mw.echo.dm.CrossWikiNotificationItem.prototype.getSourceNames = function () {
		var i,
			sourceNames = [],
			sourceLists = this.list.getItems();

		for ( i = 0; i < sourceLists.length; i++ ) {
			sourceNames.push( sourceLists[ i ].getName() );
		}

		return sourceNames;
	};

	/**
	 * Get a specific item from the list by its source name
	 *
	 * @param {string} sourceName Source name
	 * @return {mw.echo.dm.NotificationGroupsList} Source item
	 */
	mw.echo.dm.CrossWikiNotificationItem.prototype.getItemBySource = function ( sourceName ) {
		return this.list.getGroupByName( sourceName );
	};

	/**
	 * Get expected item count from all sources
	 *
	 * @return {number} Item count
	 */
	mw.echo.dm.CrossWikiNotificationItem.prototype.getCount = function () {
		return this.count;
	};

	/**
	 * Check if there are unseen items in any of the cross wiki source lists.
	 * This method is required for all models that are managed by the
	 * mw.echo.dm.ModelManager.
	 *
	 * @return {boolean} There are unseen items
	 */
	mw.echo.dm.CrossWikiNotificationItem.prototype.hasUnseen = function () {
		var i, j, items,
			sourceLists = this.getList().getItems();

		// If the model is not yet populated, we must fall back
		// to what the server told us about the state of any unseen
		// notifications inside the bundle
		if ( !this.populated ) {
			return this.originallyUnseen;
		}

		// In this case, we already opened the bundle; if the check
		// for 'hasUnseen' runs now, we should check with the actual
		// items (whose status may have changed, for example if we
		// re-expand the bundle without reloading the page or the
		// popup) so we get the correct response
		for ( i = 0; i < sourceLists.length; i++ ) {
			items = sourceLists[ i ].getItems();
			for ( j = 0; j < items.length; j++ ) {
				if ( !items[ j ].isSeen() ) {
					return true;
				}
			}
		}

		return false;
	};

	/**
	 * Set the populated state of this item
	 *
	 * @param {boolean} isPopulated The item is populated
	 */
	mw.echo.dm.CrossWikiNotificationItem.prototype.setPopulated = function ( isPopulated ) {
		this.populated = isPopulated;
	};

	/**
	 * Get all items in the cross wiki notification bundle
	 *
	 * @return {mw.echo.dm.NotificationItem[]} All items across all sources
	 */
	mw.echo.dm.CrossWikiNotificationItem.prototype.getItems = function () {
		var notifications = [];
		this.list.getItems().forEach( function ( sourceList ) {
			notifications = notifications.concat( sourceList.getItems() );
		} );

		return notifications;
	};

	/**
	 * This item is a group.
	 * This method is required for all models that are managed by the
	 * mw.echo.dm.ModelManager.
	 *
	 * @return {boolean} This item is a group
	 */
	mw.echo.dm.CrossWikiNotificationItem.prototype.isGroup = function () {
		return true;
	};

	mw.echo.dm.CrossWikiNotificationItem.prototype.isEmpty = function () {
		return this.getList().isEmpty();
	};

} )( mediaWiki );
