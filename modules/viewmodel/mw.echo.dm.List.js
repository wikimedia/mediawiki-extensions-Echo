( function ( $, mw ) {
	/**
	 * Echo List mixin
	 *
	 * @mixin
	 * @abstract
	 * @constructor
	 * @param {Object} config Configuration options
	 */
	mw.echo.dm.List = function mwFlowDmList( config ) {
		// Configuration initialization
		config = config || {};

		this.items = [];

		// Store references to items by their ids
		this.itemsById = {};

		this.aggregateItemEvents = {};
	};

	/* Events */

	/**
	 * Item has been added
	 *
	 * @event add
	 * @param {OO.EventEmitter} item Added item
	 * @param {number} index Index items were added at
	 */

	/**
	 * Item has been moved to a new index
	 *
	 * @event move
	 * @param {OO.EventEmitter} item Moved item
	 * @param {number} index Index item was moved to
	 */

	/**
	 * Item has been removed
	 *
	 * @event remove
	 * @param {OO.EventEmitter} item Removed item
	 * @param {number} index Index the item was removed from
	 */

	/**
	 * @event clear The list has been cleared of items
	 */

	/* Methods */

	/**
	 * Get all items
	 *
	 * @return {mw.echo.dm.NotificationItem[]} Items in the list
	 */
	mw.echo.dm.List.prototype.getItems = function () {
		return this.items.slice( 0 );
	};

	/**
	 * Get an item by its id
	 *
	 * @param {string} id Item id
	 * @return {mw.echo.dm.NotificationItem} Item
	 */
	mw.echo.dm.List.prototype.getItemById = function ( id ) {
		return this.itemsById[ id ];
	};

	/**
	 * Get the index of a specific item
	 *
	 * @param {mw.echo.dm.NotificationItem} item Requested item
	 * @return {number} Index of the item
	 */
	mw.echo.dm.List.prototype.getItemIndex = function ( item ) {
		return this.items.indexOf( item );
	};

	/**
	 * Get number of items
	 *
	 * @return {number} Number of items in the list
	 */
	mw.echo.dm.List.prototype.getItemCount = function () {
		return this.items.length;
	};

	/**
	 * Check if a list contains no items.
	 *
	 * @return {boolean} Group is empty
	 */
	mw.echo.dm.List.prototype.isEmpty = function () {
		return !this.items.length;
	};

	/**
	 * Aggregate the events emitted by the group.
	 * Taken from oojs-ui's OO.ui.GroupElement#aggregate
	 *
	 * When events are aggregated, the group will listen to all contained items for the event,
	 * and then emit the event under a new name. The new event will contain an additional leading
	 * parameter containing the item that emitted the original event. Other arguments emitted from
	 * the original event are passed through.
	 *
	 * @param {Object.<string,string|null>} events An object keyed by the name of the event that should be
	 *  aggregated  (e.g., ‘click’) and the value of the new name to use (e.g., ‘groupClick’).
	 *  A `null` value will remove aggregated events.

	 * @throws {Error} An error is thrown if aggregation already exists.
	 */
	mw.echo.dm.List.prototype.aggregate = function ( events ) {
		var i, item, add, remove, itemEvent, groupEvent;

		for ( itemEvent in events ) {
			groupEvent = events[ itemEvent ];

			// Remove existing aggregated event
			if ( Object.prototype.hasOwnProperty.call( this.aggregateItemEvents, itemEvent ) ) {
				// Don't allow duplicate aggregations
				if ( groupEvent ) {
					throw new Error( 'Duplicate item event aggregation for ' + itemEvent );
				}
				// Remove event aggregation from existing items
				for ( i = 0; i < this.items.length; i++ ) {
					item = this.items[ i ];
					if ( item.connect && item.disconnect ) {
						remove = {};
						remove[ itemEvent ] = [ 'emit', this.aggregateItemEvents[ itemEvent ], item ];
						item.disconnect( this, remove );
					}
				}
				// Prevent future items from aggregating event
				delete this.aggregateItemEvents[ itemEvent ];
			}

			// Add new aggregate event
			if ( groupEvent ) {
				// Make future items aggregate event
				this.aggregateItemEvents[ itemEvent ] = groupEvent;
				// Add event aggregation to existing items
				for ( i = 0; i < this.items.length; i++ ) {
					item = this.items[ i ];
					if ( item.connect && item.disconnect ) {
						add = {};
						add[ itemEvent ] = [ 'emit', groupEvent, item ];
						item.connect( this, add );
					}
				}
			}
		}
	};

	/**
	 * Add items.
	 *
	 * @param {mw.echo.dm.NotificationItem|mw.echo.dm.NotificationItem[]} items Item to add or
	 *  an array of items to add
	 * @param {number} [index] Index to add items at. If no index is
	 *  given, or if the index that is given is invalid, the item
	 *  will be added at the end of the list.
	 * @chainable
	 * @fires add
	 * @fires move
	 */
	mw.echo.dm.List.prototype.addItems = function ( items, index ) {
		var i;

		if ( !Array.isArray( items ) ) {
			items = [ items ];
		}

		if ( items.length === 0 ) {
			return this;
		}

		index = this.normalizeIndex( index );
		for ( i = 0; i < items.length; i++ ) {
			if ( this.items.indexOf( items[ i ] ) !== -1 ) {
				// Move item to new index
				index = this.moveItem( items[ i ], index );
				this.emit( 'move', items[ i ], index );
			} else {
				// insert item at index
				index = this.insertItem( items[ i ], index );
				this.emit( 'add', items[ i ], index );
			}
			index++;
		}

		return this;
	};

	/**
	 * Move an item from its current position to a new index.
	 *
	 * @param {mw.echo.dm.NotificationItem} item Items to add
	 * @param {number} newIndex Index to move the item to
	 * @private
	 * @return {number} The index the item was moved to
	 */
	mw.echo.dm.List.prototype.moveItem = function ( item, newIndex ) {
		var existingIndex = this.items.indexOf( item );

		newIndex = this.normalizeIndex( newIndex );

		if ( existingIndex === -1 ) {
			return this;
		}

		// Remove the item from the current index
		this.items.splice( existingIndex, 1 );

		// Adjust new index after removal
		newIndex--;

		// Move the item to the new index
		this.items.splice( newIndex, 0, item );

		return newIndex;
	};

	/**
	 * Normalize requested index to fit into the array.
	 *
	 * @private
	 * @param {number} index Requested index
	 * @return {number} Normalized index
	 */
	mw.echo.dm.List.prototype.normalizeIndex = function ( index ) {
		return ( index === undefined || index < 0 || index >= this.items.length ) ?
			this.items.length :
			index;
	};

	/**
	 * Utility method to insert an item into the list, and
	 * connect it to aggregate events.
	 *
	 * Don't call this directly unless you know what you're doing.
	 * Use #addItems instead.
	 *
	 * @param {mw.echo.dm.NotificationItem} item Items to add
	 * @param {number} index Index to add items at
	 * @private
	 * @return {number} The index the item was added at
	 */
	mw.echo.dm.List.prototype.insertItem = function ( item, index ) {
		var events, event;

		// Add the item to event aggregation
		if ( item.connect && item.disconnect ) {
			events = {};
			for ( event in this.aggregateItemEvents ) {
				events[ event ] = [ 'emit', this.aggregateItemEvents[ event ], item ];
			}
			item.connect( this, events );
		}

		index = this.normalizeIndex( index );

		// Insert into items array
		this.items.splice( index, 0, item );

		// Store by id
		this.itemsById[ item.getId() ] = item;
		return index;
	};

	/**
	 * Remove items
	 *
	 * @param {mw.echo.dm.NotificationItem[]} items Items to remove
	 * @chainable
	 * @fires remove
	 */
	mw.echo.dm.List.prototype.removeItems = function ( items ) {
		var i, item, index;

		if ( !Array.isArray( items ) ) {
			items = [ items ];
		}

		if ( items.length === 0 ) {
			return this;
		}

		// Remove specific items
		for ( i = 0; i < items.length; i++ ) {
			item = items[ i ];
			index = this.items.indexOf( item );
			if ( index !== -1 ) {
				if ( item.connect && item.disconnect ) {
					// Disconnect all listeners from the item
					item.disconnect( this );
				}
				// Remove from id cache
				delete this.itemsById[ index ];
				// Remove from items
				this.items.splice( index, 1 );
				this.emit( 'remove', item, index );
			}
		}

		return this;
	};

	/**
	 * Clear all items
	 *
	 * @fires clear
	 */
	mw.echo.dm.List.prototype.clearItems = function () {
		var i, item,
			items = this.items.splice( 0, this.items.length );

		// Remove all items
		for ( i = 0; i < items.length; i++ ) {
			item = items[ i ];
			if ( item.connect && item.disconnect ) {
				item.disconnect( this );
			}
		}

		this.itemsById = {};

		this.emit( 'clear' );

		return this;
	};
}( jQuery, mediaWiki ) );
