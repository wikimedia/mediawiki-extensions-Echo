( function ( mw ) {
	/**
	 * Notification groups list data structure.
	 * It contains mw.echo.dm.NotificationsList items
	 *
	 * This contains a list of grouped notifications by source, and
	 * serves as a list of lists for cross-wiki notifications based
	 * on their remote sources and/or wikis.
	 *
	 * @class
	 * @extends mw.echo.dm.SortedList
	 *
	 * @constructor
	 * @param {Object} [config] Configuration options
	 * @cfg {boolean} [foreign] The list contains foreign notifications
	 */
	mw.echo.dm.NotificationGroupsList = function MwEchoDmNotificationGroupsList( config ) {
		config = config || {};

		// Parent constructor
		mw.echo.dm.NotificationGroupsList.parent.call( this );

		// Sorting callback
		this.setSortingCallback( function ( a, b ) {
			var diff;
			// Reverse sorting
			diff = Number( b.getTimestamp() ) - Number( a.getTimestamp() );
			if ( diff !== 0 ) {
				return diff;
			}

			// Fallback on Source
			return b.getSource() - a.getSource();
		} );

		this.foreign = !!config.foreign;
		this.groups = {};

		this.aggregate( { remove: 'groupRemoveItem' } );
		this.connect( this, { groupRemoveItem: 'onGroupRemoveItem' } );
	};

	/* Initialization */
	OO.inheritClass( mw.echo.dm.NotificationGroupsList, mw.echo.dm.SortedList );

	/* Methods */

	/**
	 * Handle a remove event from any list.
	 * This means that one of the sources has removed an item.
	 *
	 * @param {mw.echo.dm.NotificationsList} groupList List source model for the item
	 */
	mw.echo.dm.NotificationGroupsList.prototype.onGroupRemoveItem = function ( groupList ) {
		// Check if the list has anything at all
		if ( groupList.isEmpty() ) {
			// Remove it
			this.removeItems( [ groupList ] );
		}
	};

	/**
	 * Add a group to the list. This is a more convenient alias to using
	 * addItems()
	 *
	 * @param {string} groupSource Symbolic name for the source of
	 *  this group, to be recognized for API operations
	 * @param {Object} sourceData Source data
	 * @param {mw.echo.dm.NotificationItem[]} [groupItems] Optional items to add to this group
	 */
	mw.echo.dm.NotificationGroupsList.prototype.addGroup = function ( groupSource, sourceData, groupItems ) {
		var groupListModel = new mw.echo.dm.NotificationsList( {
			title: sourceData.title,
			source: groupSource,
			sourceURL: sourceData.base,
			timestamp: sourceData.ts
		} );

		if ( Array.isArray( groupItems ) && groupItems.length > 0 ) {
			groupListModel.addItems( groupItems );
		}

		// Add the group
		this.addItems( [ groupListModel ] );
	};

	/**
	 * Get the timestamp of the list by taking the latest list's
	 * timestamp.
	 *
	 * @return {string} Latest timestamp
	 */
	mw.echo.dm.NotificationGroupsList.prototype.getTimestamp = function () {
		var items = this.getItems();

		return (
			items.length > 0 ?
				items[ 0 ].getTimestamp() :
				0
		);
	};

	/**
	 * Add items to a specific group by its source identifier.
	 *
	 * @param {string} groupSource Source identifier of the group
	 * @param {mw.echo.dm.NotificationItem[]} groupItems Items to add to this group
	 */
	mw.echo.dm.NotificationGroupsList.prototype.addItemsToGroup = function ( groupSource, groupItems ) {
		var group = this.getGroupBySource( groupSource );

		if ( group ) {
			group.addItems( groupItems );
		}
	};
	/**
	 * Remove a group from the list. This is an easier to use alias
	 * to 'removeItems()' method.
	 *
	 * @param {string} groupSource Group source name
	 */
	mw.echo.dm.NotificationGroupsList.prototype.removeGroup = function ( groupSource ) {
		var group = this.getGroupBySource( groupSource );

		if ( group ) {
			this.removeItems( group );
		}
	};

	/**
	 * Get a group by its source identifier.
	 *
	 * @param {string} groupSource Group source
	 * @return {mw.echo.dm.NotificationsList|null} Requested group, null if none was found.
	 */
	mw.echo.dm.NotificationGroupsList.prototype.getGroupBySource = function ( groupSource ) {
		var i,
			items = this.getItems();

		for ( i = 0; i < items.length; i++ ) {
			if ( items[ i ].getSource() === groupSource ) {
				return items[ i ];
			}
		}
		return null;
	};
} )( mediaWiki );
