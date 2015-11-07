( function ( mw, oo ) {
	/**
	 * @class mw.echo.dm.SortedList
	 * Contains and a sorted mw.echo.dm.List
	 *
	 * @constructor
	 */
	mw.echo.dm.SortedList = function OoSortedEmitterList() {
		// Mixin constructors
		mw.echo.dm.List.call( this );

		this.sortingCallback = function ( a, b ) {
			return a.getTimestamp() - b.getTimestamp();
		};

		// Listen to sortChange event and make sure
		// we re-sort the changed item when that happens
		this.aggregate( {
			sortChange: 'itemSortChange'
		} );

		this.connect( this, {
			itemSortChange: 'onItemSortChange'
		} );
	};

	oo.mixinClass( mw.echo.dm.SortedList, mw.echo.dm.List );

	/**
	 * Handle a case where an item changed a property that relates
	 * to its sorted order
	 *
	 * @param {mw.echo.dm.NotificationItem} item Item in the list
	 */
	mw.echo.dm.SortedList.prototype.onItemSortChange = function ( item ) {
		// Remove the item
		this.removeItems( item );
		// Re-add the item so it is in the correct place
		this.addItems( item );
	};

	/**
	 * Set the sorting callback for this sorted list.
	 *
	 * @param {Function} sortingCallback Sorting callback
	 */
	mw.echo.dm.SortedList.prototype.setSortingCallback = function ( sortingCallback ) {
		var items = this.getItems();

		this.sortingCallback = sortingCallback;

		// Empty the list
		this.clearItems();
		// Re-add the items in the new order
		this.addItems( items );
	};

	/**
	 * Add items to the sorted list.
	 *
	 * @param {OO.EventEmitter|OO.EventEmitter[]} items Item to add or
	 *  an array of items to add
	 */
	mw.echo.dm.SortedList.prototype.addItems = function ( items ) {
		var index, i, insertionIndex;

		if ( !Array.isArray( items ) ) {
			items = [ items ];
		}

		if ( items.length === 0 ) {
			return this;
		}

		// Call parent mixin
		for ( i = 0; i < items.length; i++ ) {
			// Find insertion index
			insertionIndex = this.findInsertionIndex( items[ i ] );

			// Check if the item exists using the sorting callback
			// and remove it first if it exists
			if (
				// First make sure the insertion index is not at the end
				// of the list (which means it does not point to any actual
				// items)
				insertionIndex <= this.items.length &&
				// Make sure there actually is an item in this index
				this.items[ insertionIndex ] &&
				// The callback returns 0 if the items are equal
				this.sortingCallback( this.items[ insertionIndex ], items[ i ] ) === 0
			) {
				// Remove the existing item
				this.removeItems( this.items[ insertionIndex ] );
			}

			// Insert item at the insertion index
			index = this.insertItem( items[ i ], insertionIndex );
			this.emit( 'add', items[ i ], insertionIndex );
		}

		return this;
	};

	/**
	 * Normalize requested index to fit into the array.
	 * In the case of a sorted list, the index
	 *
	 * @param {OO.EventEmitter} item Items to insert
	 * @return {number} The index the item should be inserted into
	 */
	mw.echo.dm.SortedList.prototype.findInsertionIndex = function ( item ) {
		var list = this;

		return this.binarySearchIndex(
			this.items,
			// Fake a this.sortingCallback.bind( null, item ) call here
			// otherwise this doesn't pass tests in phantomJS
			function ( otherItem ) {
				return list.sortingCallback( item, otherItem );
			},
			true
		);

	};

	/**
	 * Use binary search to locate an element in a sorted array.
	 *
	 * searchFunc is given an element from the array. `searchFunc(elem)` must return a number
	 * above 0 if the element we're searching for is to the right of (has a higher index than) elem,
	 * below 0 if it is to the left of elem, or zero if it's equal to elem.
	 *
	 * To search for a specific value with a comparator function (a `function cmp(a,b)` that returns
	 * above 0 if `a > b`, below 0 if `a < b`, and 0 if `a == b`), you can use
	 * `searchFunc = cmp.bind( null, value )`.
	 *
	 * @param {Array} arr Array to search in
	 * @param {Function} searchFunc Search function
	 * @param {boolean} [forInsertion] If not found, return index where val could be inserted
	 * @return {number|null} Index where val was found, or null if not found
	 */
	mw.echo.dm.SortedList.prototype.binarySearchIndex = function ( arr, searchFunc, forInsertion ) {
		// TODO: Replace this with OO.binarySearch
		// See https://gerrit.wikimedia.org/r/#/c/246813/
		var mid, cmpResult,
			left = 0,
			right = arr.length;

		while ( left < right ) {
			// Equivalent to Math.floor( ( left + right ) / 2 ) but much faster
			/*jshint bitwise:false */
			mid = ( left + right ) >> 1;
			cmpResult = searchFunc( arr[ mid ] );
			if ( cmpResult < 0 ) {
				right = mid;
			} else if ( cmpResult > 0 ) {
				left = mid + 1;
			} else {
				return mid;
			}
		}
		return forInsertion ? right : null;
	};
}( mediaWiki, OO ) );
