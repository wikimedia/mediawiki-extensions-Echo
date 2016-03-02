( function ( mw, $ ) {
	/**
	 * Notification group item widget for echo popup.
	 *
	 * @class
	 * @extends mw.echo.ui.NotificationItemWidget
	 * @mixins OO.ui.mixin.PendingElement
	 * @mixins OO.ui.mixin.GroupElement
	 * @mixins OO.ui.mixin.GroupWidget
	 *
	 * @constructor
	 * @param {mw.echo.dm.NotificationGroupItem} model Item model
	 * @param {Object} [config] Configuration object
	 */
	mw.echo.ui.NotificationGroupItemWidget = function MwEchoUiNotificationGroupItemWidget( model, config ) {
		config = config || {};

		// Parent constructor
		mw.echo.ui.NotificationGroupItemWidget.parent.call( this, model, config );

		// Mixin constructor
		OO.ui.mixin.GroupWidget.call( this, config );
		OO.ui.mixin.PendingElement.call( this, config );

		this.setPendingElement( this.$group );
		this.$group
			.addClass( 'mw-echo-ui-notificationGroupItemWidget-group' )
			// We have to manually set the display to 'none' here because
			// otherwise the 'slideUp' and 'slideDown' jQuery effects don't
			// work
			.css( 'display', 'none' );

		this.showTitles = false;
		this.expanded = false;

		// Add "expand" button
		this.toggleExpandButton = new OO.ui.ButtonOptionWidget( {
			icon: 'expand',
			framed: false,
			classes: [ 'mw-echo-ui-notificationItemWidget-content-actions-button' ]
		} );
		this.updateExpandButton();
		this.actionsButtonSelectWidget.addItems( [ this.toggleExpandButton ] );

		// Events
		this.toggleExpandButton.connect( this, { click: 'expand' } );
		this.$content.on( 'click', this.expand.bind( this ) );
		this.model.connect( this, {
			add: 'onModelAddGroup',
			remove: 'onModelRemoveGroup',
			clear: 'onModelClearGroups'
		} );

		// TODO: Handle cases where the group became empty or a case where the group only has 1 item left.
		// Note: Right now this code works primarily for cross-wiki notifications. These act differently
		// than local bundles. Cross-wiki notifications, when they "lose" their items for being read, they
		// vanish from the list. Unlike them, the plan for local bundles is that read sub-items go outside
		// the bundle and become their own items in the general notificationsWidget, and when the local bundle
		// has 1 notification left, the group will actually transform into that last notification item.
		// We don't listen to the empty event right now, because the entire item is deleted in cross-wiki
		// notifications. When we work on local bundles, we will have to add that event listener per item.

		// Initialization
		this.populateFromModel();
		this.toggleExpanded( false );
		this.$element
			.addClass( 'mw-echo-ui-notificationGroupItemWidget' )
			.append(
				$( '<div>' )
					.addClass( 'mw-echo-ui-notificationGroupItemWidget-separator' ),
				this.$group
			);
	};

	/* Initialization */

	OO.inheritClass( mw.echo.ui.NotificationGroupItemWidget, mw.echo.ui.NotificationItemWidget );
	OO.mixinClass( mw.echo.ui.NotificationGroupItemWidget, OO.ui.mixin.PendingElement );
	// Need to mixin base class as well
	OO.mixinClass( mw.echo.ui.NotificationGroupItemWidget, OO.ui.mixin.GroupElement );
	OO.mixinClass( mw.echo.ui.NotificationGroupItemWidget, OO.ui.mixin.GroupWidget );

	/* Methods */

	/**
	 * Respond to model clearing the group
	 */
	mw.echo.ui.NotificationGroupItemWidget.prototype.onModelClearGroups = function () {
		this.clearItems();
		this.handleEmptyGroups();
	};

	/**
	 * Respond to model adding group
	 *
	 * @param {mw.echo.dm.NotificationsModel} notificationsModel Added group
	 * @param {number} index Position the group was added
	 */
	mw.echo.ui.NotificationGroupItemWidget.prototype.onModelAddGroup = function ( notificationsModel, index ) {
		this.addItems(
			[
				new mw.echo.ui.BundledNotificationGroupWidget( notificationsModel, {
					showTitle: this.showTitles,
					$overlay: this.$overlay
				} )
			],
			index
		);

		this.checkShowTitles();
	};

	/**
	 * Expand the notification group
	 */
	mw.echo.ui.NotificationGroupItemWidget.prototype.expand = function () {
		var widget = this;

		this.toggleExpanded( !this.expanded );
		this.updateExpandButton();

		if ( this.expanded ) {
			// Expand
			this.pushPending();

			// Query all sources
			this.model.fetchAllNotificationsInGroups()
				.then( function () {
					widget.popPending();
				} );

			// Log the expand action
			mw.echo.logger.logInteraction(
				mw.echo.Logger.static.actions.notificationBundleExpand,
				mw.echo.Logger.static.context.popup,
				widget.getModel().getId(),
				widget.getModel().getCategory()
			);
		}
	};

	/**
	 * Update the expand button label
	 */
	mw.echo.ui.NotificationGroupItemWidget.prototype.updateExpandButton = function () {
		var type = this.model.getType();
		if ( $.isArray( type ) ) {
			type = 'all';
		}
		this.toggleExpandButton.setLabel(
			this.expanded ?
				mw.msg( 'notification-link-text-collapse-all' ) :
				// Messages that appear here are:
				// notification-link-text-expand-alert-count
				// notification-link-text-expand-message-count
				mw.msg( 'notification-link-text-expand-' + this.model.getType() + '-count', this.model.getCount() )
		);
		this.toggleExpandButton.setIcon(
			this.expanded ?
				'collapse' :
				'expand'
		);
	};

	/**
	 * Populate the items from the model
	 */
	mw.echo.ui.NotificationGroupItemWidget.prototype.populateFromModel = function () {
		var i,
			items = this.model.getItems(),
			widgets = [];

		for ( i = 0; i < items.length; i++ ) {
			widgets.push(
				new mw.echo.ui.BundledNotificationGroupWidget( items[ i ], {
					showTitle: this.showTitles,
					$overlay: this.$overlay
				} )
			);
		}

		this.addItems( widgets );
		this.checkShowTitles();
	};

	/**
	 * Respond to model removing a group
	 *
	 * @param {mw.echo.dm.NotificationsModel} notificationsModel Removed group
	 */
	mw.echo.ui.NotificationGroupItemWidget.prototype.onModelRemoveGroup = function ( notificationsModel ) {
		var widget = this.getItemFromData( notificationsModel.getId() );

		if ( widget ) {
			this.removeItems( [ widget ] );
		}
	};

	/**
	 * Toggle the expand/collapsed state of this group widget
	 *
	 * @param {boolean} show Show the widget expanded
	 */
	mw.echo.ui.NotificationGroupItemWidget.prototype.toggleExpanded = function ( show ) {
		this.expanded = show !== undefined ? !!show : !this.expanded;

		if ( show ) {
			this.$group.slideDown();
		} else {
			this.$group.slideUp();
		}
	};

	/**
	 * Check whether the titles should be shown and toggle them in the items.
	 */
	mw.echo.ui.NotificationGroupItemWidget.prototype.checkShowTitles = function () {
		var i,
			items = this.getItems(),
			numItems = items.length,
			showTitles = numItems > 1;

		if ( this.showTitles !== showTitles ) {
			this.showTitles = showTitles;
			for ( i = 0; i < numItems; i++ ) {
				items[ i ].toggleTitle( showTitles );
			}
		}
	};

} )( mediaWiki, jQuery );
