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
	 * @cfg {jQuery} [$overlay] A jQuery element functioning as an overlay
	 *  for popups.
	 * @cfg {boolean} [bundle=false] This notification is part of a bundled notification
	 *  group. This affects the rendering of the items.
	 */
	mw.echo.ui.NotificationsWidget = function MwEchoUiNotificationsWidget( model, config ) {
		config = config || {};

		// Parent constructor
		mw.echo.ui.NotificationsWidget.parent.call( this, config );

		this.model = model;

		this.markReadWhenSeen = !!config.markReadWhenSeen;
		this.bundle = !!config.bundle;
		this.$overlay = config.$overlay || this.$element;

		// Dummy 'loading' option widget
		this.loadingOptionWidget = new mw.echo.ui.PlaceholderItemWidget();
		this.addItems( [ this.loadingOptionWidget ] );

		// Events
		this.model.connect( this, {
			add: 'onModelNotificationAdd',
			remove: 'onModelNotificationRemove',
			clear: 'onModelNotificationClear',
			done: 'onModelNotificationDone'
		} );

		this.$element
			.addClass( 'mw-echo-ui-notificationsWidget' )
			.toggleClass( 'mw-echo-ui-notificationsWidget-bundle', this.bundle );
	};

	/* Initialization */

	OO.inheritClass( mw.echo.ui.NotificationsWidget, OO.ui.SelectWidget );

	/* Methods */

	/**
	 * Handle done event from the model
	 *
	 * @param {boolean} isSuccess The operation was successful
	 * @param {Object} result Result object from the API
	 * @param {string} result.errCode The API error code
	 * @param {string} result.errInfo The API error info string
	 */
	mw.echo.ui.NotificationsWidget.prototype.onModelNotificationDone = function ( isSuccess, result ) {
		var loginPageTitle = mw.Title.newFromText( 'Special:UserLogin' );
		if ( this.model.isEmpty() ) {
			if ( isSuccess ) {
				this.resetLoadingOption( mw.msg( 'echo-notification-placeholder' ) );
			} else {
				// If failure, check if the failure is due to login
				// so we can display a more comprehensive error
				// message in that case
				if ( result.errCode === 'notlogin-required' ) {
					// Login error
					this.resetLoadingOption(
						// This message has a link inside it, so it must be
						// given to the OO.ui.LabelWidget as a jQuery object, otherwise
						// the LabelWidget parses it as a raw string.
						$( '<span>' ).text( mw.message( 'echo-notification-popup-loginrequired' ) ),
						// Set the option link to the login page
						loginPageTitle.getUrl()
					);
				} else {
					// General error
					this.resetLoadingOption( mw.msg( 'echo-api-failure', result.errInfo ) );
				}
			}
		}

		if ( isSuccess ) {
			// Log impressions
			mw.echo.logger.logNotificationImpressions(
				undefined, // type: we don't know
				result.ids,
				mw.echo.Logger.static.context.popup,
				this.getModel().getSource()
			);
		}
	};

	/**
	 * Respond to model add event
	 *
	 * @param {mw.echo.dm.NotificationItem} notificationItem Added notification item
	 * @param {number} index Index to add the item
	 */
	mw.echo.ui.NotificationsWidget.prototype.onModelNotificationAdd = function ( notificationItem, index ) {
		var widget;

		if ( notificationItem instanceof mw.echo.dm.NotificationGroupItem ) {
			widget = new mw.echo.ui.NotificationGroupItemWidget(
				notificationItem,
				{
					bundle: this.bundle,
					$overlay: this.$overlay
				}
			);
		} else {
			widget = new mw.echo.ui.NotificationItemWidget(
				notificationItem,
				{
					$overlay: this.$overlay,
					bundle: this.bundle,
					markReadWhenSeen: this.markReadWhenSeen
				}
			);
		}

		// Fire hook for gadgets to update the option list
		mw.hook( 'ext.echo.overlay.beforeShowingOverlay' ).fire( widget.$element );

		// Remove dummy option
		this.removeItems( [ this.loadingOptionWidget ] );

		this.addItems( [ widget ], index );
	};

	/**
	 * Respond to model add event
	 */
	mw.echo.ui.NotificationsWidget.prototype.onModelNotificationClear = function () {
		var i, len,
			items = this.getItems();

		// Destroy all the widgets and their events
		for ( i = 0, len = items.length; i < len; i++ ) {
			if ( typeof items[ i ].destroy === 'function' ) {
				// Destroy if destroyable
				items[ i ].destroy();
			}
		}

		this.clearItems();

		// Add dummy option
		this.resetLoadingOption();
	};

	/**
	 * Respond to model add event
	 *
	 * @param {mw.echo.dm.NotificationItem} notificationItem Removed notification items
	 */
	mw.echo.ui.NotificationsWidget.prototype.onModelNotificationRemove = function ( notificationItem ) {
		var widget, items;

		widget = this.getItemFromData( notificationItem.getId() );
		if ( widget && typeof widget.destroy === 'function' ) {
			// Destroy all widgets that can be destroyed
			widget.destroy();
		}
		this.removeItems( [ widget ] );

		items = this.getItems();
		if ( !items.length ) {
			this.resetLoadingOption();
		}
	};

	/**
	 * Go over the items and remove all items with 'initiallyUnseen' class on them.
	 * That class is given to the widgets so that the animation works. When we refresh
	 * the notifications, they should no longer be animated, allowing any new notifications
	 * that were fetched to be set as unseen.
	 */
	mw.echo.ui.NotificationsWidget.prototype.resetNotificationItems = function () {
		var i, len,
			items = this.getItems();

		for ( i = 0, len = items.length; i < len; i++ ) {
			if ( items[ i ] && typeof items[ i ].reset === 'function' ) {
				items[ i ].reset();
			}
		}
	};

	/**
	 * Reset the loading 'dummy' option widget
	 *
	 * @param {string} [label] Label for the option widget
	 * @param {string} [link] Link for the option widget
	 */
	mw.echo.ui.NotificationsWidget.prototype.resetLoadingOption = function ( label, link ) {
		this.loadingOptionWidget.setLabel( label || '' );
		this.loadingOptionWidget.setLink( link || '' );
		this.addItems( [ this.loadingOptionWidget ] );
	};

	/**
	 * Get the model associated with this widget
	 *
	 * @return {mw.echo.dm.NotificationsModel} Notifications model
	 */
	mw.echo.ui.NotificationsWidget.prototype.getModel = function () {
		return this.model;
	};

} )( mediaWiki, jQuery );
