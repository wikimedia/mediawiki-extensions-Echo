( function ( mw ) {
	/**
	 * Notifications list widget.
	 * All of its items must be of the mw.echo.ui.NotificationItem type.
	 *
	 * @class
	 * @extends mw.echo.ui.SortedListWidget
	 *
	 * @constructor
	 * @param {mw.echo.Controller} controller Echo notifications controller
	 * @param {mw.echo.dm.ModelManager} manager Model manager
	 * @param {Object} [config] Configuration object
	 *  marked as read when they are seen.
	 * @cfg {jQuery} [$overlay] A jQuery element functioning as an overlay
	 *  for popups.
	 */
	mw.echo.ui.NotificationsListWidget = function MwEchoUiNotificationsListWidget( controller, manager, config ) {
		config = config || {};
		// Parent constructor
		mw.echo.ui.NotificationsListWidget.parent.call( this, config );

		// Initialize models
		this.controller = controller;
		this.manager = manager;
		this.models = {};

		// Properties
		this.$overlay = config.$overlay || this.$element;
		this.timestamp = config.timestamp || 0;

		// Dummy 'loading' option widget
		this.loadingOptionWidget = new mw.echo.ui.PlaceholderItemWidget();

		// Define the sorting order
		this.setSortingCallback( function ( a, b ) {
			var diff;

			if ( !a.isRead() && b.isRead() ) {
				return -1; // Unread items are always above read items
			} else if ( a.isRead() && !b.isRead() ) {
				return 1;
			} else if ( !a.isForeign() && b.isForeign() ) {
				return -1;
			} else if ( a.isForeign() && !b.isForeign() ) {
				return 1;
			} else {
				// Reverse sorting
				diff = Number( b.getTimestamp() ) - Number( a.getTimestamp() );
				if ( diff !== 0 ) {
					return diff;
				}

				// Fallback on IDs
				return b.getId() - a.getId();
			}
		} );

		this.resetLoadingOption();

		this.manager.connect( this, {
			update: 'resetDataFromModel',
			remove: 'onModelManagerRemove'
		} );

		this.$element
			.addClass( 'mw-echo-ui-notificationsListWidget' );
	};

	/* Initialization */

	OO.inheritClass( mw.echo.ui.NotificationsListWidget, mw.echo.ui.SortedListWidget );

	/* Methods */

	mw.echo.ui.NotificationsListWidget.prototype.onModelManagerRemove = function ( modelName ) {
		var i,
			items = this.getItems();

		// For the moment, this is only relevant for xwiki bundles.
		// Local single items will not get their entire model removed, but
		// local bundles may - when that happens, the condition below should
		// also deal with local bundles and removing them specifically
		if ( modelName === 'xwiki' ) {
			for ( i = 0; i < items.length; i++ ) {
				if ( items[ i ] instanceof mw.echo.ui.CrossWikiNotificationItemWidget ) {
					this.removeItems( [ items[ i ] ] );
					return;
				}
			}
		}
	};

	/**
	 * Respond to model manager update event.
	 * This event means we are repopulating the entire list and the
	 * associated models within it.
	 *
	 * @param {Object} models Object of new models to populate the
	 *  list.
	 */
	mw.echo.ui.NotificationsListWidget.prototype.resetDataFromModel = function ( models ) {
		var i, modelId, model, subItems,
			itemWidgets = [];

		// Detach all attached models
		for ( modelId in this.models ) {
			this.detachModel( modelId );
		}

		// Attach and process new models
		for ( modelId in models ) {
			model = models[ modelId ];
			this.attachModel( modelId, model );

			// Build widgets based on the data in the model
			if ( model.isGroup() ) {
				// TODO: For the moment, 'group' is for group
				// of lists (x-wiki items) but when we have local
				// bundles, we will need to separate those out to
				// their own widgets and find a way to differentiate
				// them from the x-wiki groups.

				// One Widget to Rule Them All
				itemWidgets.push( new mw.echo.ui.CrossWikiNotificationItemWidget(
					this.controller,
					model,
					{
						$overlay: this.$overlay
					}
				) );
			} else {
				subItems = model.getItems();
				// Separate widgets per item
				for ( i = 0; i < subItems.length; i++ ) {
					itemWidgets.push( new mw.echo.ui.SingleNotificationItemWidget(
						this.controller,
						subItems[ i ],
						{
							$overlay: this.$overlay,
							bundle: false
						}
					) );
				}
			}
		}

		// Reset the current items and re-add the new item widgets
		this.clearItems();
		this.addItems( itemWidgets );

		this.resetLoadingOption(
			itemWidgets.length === 0 ?
			mw.msg( 'echo-notification-placeholder' ) :
			''
		);
	};

	/**
	 * Attach a model to the widget
	 *
	 * @param {string} modelId Symbolic name for the model
	 * @param {mw.echo.dm.SortedList} model Notifications list model
	 */
	mw.echo.ui.NotificationsListWidget.prototype.attachModel = function ( modelId, model ) {
		this.models[ modelId ] = model;
	};

	/**
	 * Detach a model from the widget
	 *
	 * @param {string} modelId Notifications list model
	 */
	mw.echo.ui.NotificationsListWidget.prototype.detachModel = function ( modelId ) {
		this.models[ modelId ].disconnect( this );
		delete this.models[ modelId ];
	};

	/**
	 * Reset the loading 'dummy' option widget
	 *
	 * @param {string} [label] Label for the option widget
	 * @param {string} [link] Link for the option widget
	 */
	mw.echo.ui.NotificationsListWidget.prototype.resetLoadingOption = function ( label, link ) {
		this.loadingOptionWidget.setLabel( label || '' );
		this.loadingOptionWidget.setLink( link || '' );
		if ( this.isEmpty() ) {
			this.addItems( [ this.loadingOptionWidget ] );
		}
	};

	/**
	 * Reset the 'initiallyUnseen' state of all items
	 */
	mw.echo.ui.NotificationsListWidget.prototype.resetInitiallyUnseenItems = function () {
		var i,
			itemWidgets = this.getItems();

		for ( i = 0; i < itemWidgets.length; i++ ) {
			itemWidgets[ i ].resetInitiallyUnseen();
		}
	};
} )( mediaWiki );
