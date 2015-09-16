( function ( mw, $ ) {
	/**
	 * Notification widget for echo popup.
	 *
	 * @class
	 * @extends OO.ui.Widget
	 *
	 * @constructor
	 * @param {mw.echo.dm.NotificationsModel} model Notifications view model
	 * @param {Object} [config] Configuration object
	 * @cfg {boolean} [markReadWhenSeen=false] State whether the notifications are all
	 *  marked as read when they are seen.
	 */
	mw.echo.ui.NotificationsWidget = function MwEchoUiNotificationsWidget( model, config ) {
		config = config || {};

		this.model = model;

		this.markReadWhenSeen = !!config.markReadWhenSeen;

		// Parent constructor
		mw.echo.ui.NotificationsWidget.parent.call( this, config );

		// Dummy 'loading' option widget
		this.loadingOptionWidget = new OO.ui.OptionWidget( {
			data: null,
			classes: [ 'mw-echo-ui-notificationsWidget-loadingOption' ]
		} );
		this.addItems( [ this.loadingOptionWidget ] );

		// Events
		this.model.connect( this, {
			add: 'onModelNotificationAdd',
			remove: 'onModelNotificationRemove',
			clear: 'onModelNotificationClear'
		} );

		this.$element
			.addClass( 'mw-echo-ui-notificationsWidget' );
	};

	/* Initialization */

	OO.inheritClass( mw.echo.ui.NotificationsWidget, OO.ui.SelectWidget );

	/* Methods */

	/**
	 * Respond to model add event
	 *
	 * @param {mw.echo.dm.NotificationItem[]} Added notification items
	 */
	mw.echo.ui.NotificationsWidget.prototype.onModelNotificationAdd = function ( notificationItems, index ) {
		var i, len, widget,
			$elements = $(),
			optionWidgets = [];

		for ( i = 0, len = notificationItems.length; i < len; i++ ) {
			widget = new mw.echo.ui.NotificationOptionWidget(
				notificationItems[i],
				{
					markReadWhenSeen: this.markReadWhenSeen
				}
			);
			optionWidgets.push( widget );
			// Collect the elements for the hook firing
			$elements = $elements.add( widget.$element );
		}

		// Fire hook for gadgets to update the option list
		mw.hook( 'ext.echo.overlay.beforeShowingOverlay' ).fire( $elements );

		// Remove dummy option
		this.removeItems( [ this.loadingOptionWidget ] );

		this.addItems( optionWidgets, index );
	};

	/**
	 * Respond to model add event
	 *
	 * @param {mw.echo.dm.NotificationItem[]} Removed notification items
	 */
	mw.echo.ui.NotificationsWidget.prototype.onModelNotificationClear = function () {
		var i, len,
			items = this.getItems();

		// Destroy all the widgets and their events
		for ( i = 0, len = items.length; i < len; i++ ) {
			if ( typeof items[i].destroy === 'function' ) {
				// Destroy if destroyable
				items[i].destroy();
			}
		}

		this.clearItems();

		// Add dummy option
		this.resetLoadingOption();
	};

	/**
	 * Respond to model add event
	 *
	 * @param {mw.echo.dm.NotificationItem[]} Removed notification items
	 */
	mw.echo.ui.NotificationsWidget.prototype.onModelNotificationRemove = function ( notificationItems ) {
		var i, len, widget, items,
			removalWidgets = [];

		for ( i = 0, len = notificationItems.length; i < len; i++ ) {
			widget = this.getItemById( notificationItems[i].getId() );
			if ( widget && typeof widget.destroy === 'function' ) {
				// Destroy all widgets that can be destroyed
				widget.destroy();
			}
			removalWidgets.push( widget );
		}

		this.removeItems( removalWidgets );

		items = this.getItems();
		if ( !items.length ) {
			this.resetLoadingOption();
		}
	};

	/**
	 * Reset the loading 'dummy' option widget
	 *
	 * @param {string} [label] Label for the option widget
	 */
	mw.echo.ui.NotificationsWidget.prototype.resetLoadingOption = function ( label ) {
		this.loadingOptionWidget.setLabel( label || '' );
		this.addItems( [ this.loadingOptionWidget ] );
	};
} )( mediaWiki, jQuery );
