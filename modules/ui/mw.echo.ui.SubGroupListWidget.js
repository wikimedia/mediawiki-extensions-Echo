( function ( mw, $ ) {
	/**
	 * Sub group list widget.
	 * This widget contains a list of notifications from a single source
	 * in a cross-wiki notifications group.
	 *
	 * @param {mw.echo.Controller} controller Notifications controller
	 * @param {mw.echo.dm.SortedList} listModel Notifications list model for this source
	 * @param {Object} config Configuration object
	 * @cfg {boolean} [showTitle=false] Show the title of this group
	 * @cfg {jQuery} [$overlay] A jQuery element functioning as an overlay
	 *  for popups.
	 */
	mw.echo.ui.SubGroupListWidget = function MwEchoUiSubGroupListWidget( controller, listModel, config ) {
		var sourceURL;

		config = config || {};

		this.controller = controller;
		this.model = listModel;

		// Parent constructor
		mw.echo.ui.SubGroupListWidget.parent.call( this, $.extend( { data: this.getSource() }, config ) );

		this.showTitle = !!config.showTitle;
		this.$overlay = config.$overlay || this.$element;

		this.listWidget = new mw.echo.ui.SortedListWidget(
			// Sorting callback
			function ( a, b ) {
				var diff;
				// Reverse sorting
				diff = Number( b.getTimestamp() ) - Number( a.getTimestamp() );
				if ( diff !== 0 ) {
					return diff;
				}

				// Fallback on IDs
				return b.getId() - a.getId();
			},
			// Config
			{ $overlay: this.$overlay }
		);

		sourceURL = this.model.getSourceURL() ?
			this.model.getSourceURL().replace( '$1', 'Special:Notifications' ) :
			null;
		this.title = new OO.ui.ButtonWidget( {
			framed: false,
			classes: [ 'mw-echo-ui-subGroupListWidget-title' ],
			href: sourceURL
		} );
		if ( this.model.getTitle() ) {
			this.title.setLabel( this.model.getTitle() );
		}
		this.title.toggle( this.showTitle );

		// Events
		this.model.connect( this, {
			// We really only need to listen to 'remove' item here
			// There is no other update event worthwhile in this list.
			remove: 'onModelRemoveItem',
			update: 'onModelUpdate' // Adding all items
		} );

		this.$element
			.addClass( 'mw-echo-ui-subGroupListWidget' )
			.append(
				this.title.$element,
				this.listWidget.$element
			);
	};

	/* Initialization */

	OO.inheritClass( mw.echo.ui.SubGroupListWidget, OO.ui.Widget );

	/* Methods */

	/**
	 * Respond to model update event
	 *
	 * @param {mw.echo.dm.NotificationItem[]} items Item models that are added
	 */
	mw.echo.ui.SubGroupListWidget.prototype.onModelUpdate = function ( items ) {
		var i,
			itemWidgets = [];

		for ( i = 0; i < items.length; i++ ) {
			itemWidgets.push(
				new mw.echo.ui.SingleNotificationItemWidget(
					this.controller,
					items[ i ],
					{
						$overlay: this.$overlay,
						bundle: true
					}
				)
			);
		}

		// Clear the current items if any exist
		this.getListWidget().clearItems();
		// Add the new items
		this.getListWidget().addItems( itemWidgets );
	};

	/**
	 * Respond to mode remove event. This may happen when an item
	 * is marked as read.
	 *
	 * @param {mw.echo.dm.NotificationItem} item Notification item model
	 */
	mw.echo.ui.SubGroupListWidget.prototype.onModelRemoveItem = function ( item ) {
		this.listWidget.removeItems( [ this.listWidget.getItemFromId( item.getId() ) ] );
	};

	/**
	 * Get the associated list widget. This is useful to specifically
	 * add and/or remove items from the list.
	 *
	 * @return {mw.echo.ui.SortedListWidget} List widget
	 */
	mw.echo.ui.SubGroupListWidget.prototype.getListWidget = function () {
		return this.listWidget;
	};

	/**
	 * Get the timestamp for the list
	 *
	 * @return {number} Timestamp
	 */
	mw.echo.ui.SubGroupListWidget.prototype.getTimestamp = function () {
		return this.listWidget.getTimestamp();
	};

	/**
	 * Toggle the visibility of the title
	 *
	 * @param {boolean} show Show the title
	 */
	mw.echo.ui.SubGroupListWidget.prototype.toggleTitle = function ( show ) {
		show = show !== undefined ? show : !this.showTitle;

		if ( this.showTitle !== show ) {
			this.showTitle = show;
			this.title.toggle( this.showTitle );
		}
	};

	/**
	 * Get a the source of this list.
	 *
	 * @return {string} Group source
	 */
	mw.echo.ui.SubGroupListWidget.prototype.getSource = function () {
		return this.model.getSource();
	};

	/**
	 * Get the group id, which is represented by its source.
	 * This is meant for sorting callbacks that fallback on
	 * sorting by IDs.
	 *
	 * @return {string} Group source
	 */
	mw.echo.ui.SubGroupListWidget.prototype.getId = function () {
		return this.getSource();
	};
} )( mediaWiki, jQuery );
