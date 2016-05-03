( function ( mw, $ ) {
	/*global moment:false */
	/**
	 * Notification option widget for echo popup.
	 *
	 * @class
	 * @extends OO.ui.OptionWidget
	 *
	 * @constructor
	 * @param {mw.echo.dm.NotificationItem} model Notification item model
	 * @param {Object} [config] Configuration object
	 * @cfg {boolean} [markReadWhenSeen=false] This option is marked as read when it is viewed
	 * @cfg {jQuery} [$overlay] A jQuery element functioning as an overlay
	 *  for popups.
	 * @cfg {boolean} [bundle=false] This notification item is part of a bundle.
	 */
	mw.echo.ui.NotificationItemWidget = function MwEchoUiNotificationItemWidget( model, config ) {
		var i, secondaryUrls, urlObj, linkButton, $icon, isInsideMenu, echoMoment,
			$message = $( '<div>' ).addClass( 'mw-echo-ui-notificationItemWidget-content-message' ),
			widget = this;

		config = config || {};

		// Parent constructor
		mw.echo.ui.NotificationItemWidget.parent.call( this, $.extend( { data: model.getId() }, config ) );

		this.model = model;
		this.$overlay = config.$overlay || this.$element;
		this.bundle = !!config.bundle;

		this.$content = $( '<div>' ).addClass( 'mw-echo-ui-notificationItemWidget-content' );
		this.$actions = $( '<div>' )
			.addClass( 'mw-echo-ui-notificationItemWidget-content-actions' );

		// Mark as read
		this.markAsReadButton = new OO.ui.ButtonWidget( {
			icon: 'close',
			framed: false,
			title: mw.msg( 'echo-notification-markasread-tooltip' ),
			classes: [ 'mw-echo-ui-notificationItemWidget-markAsReadButton' ]
		} );

		this.markReadWhenSeen = !!config.markReadWhenSeen;

		// Icon
		if ( this.model.getIconURL() ) {
			$icon = $( '<div>' )
				.addClass( 'mw-echo-ui-notificationItemWidget-icon' )
				.append( $( '<img>' ).attr( 'src', this.model.getIconURL() ) );
		}

		// Content
		$message.append(
			$( '<div>' )
				.addClass( 'mw-echo-ui-notificationItemWidget-content-message-header' )
				.append( this.model.getContentHeader() )
		);
		if ( !this.bundle && this.model.getContentBody() ) {
			$message.append(
				$( '<div>' )
					.addClass( 'mw-echo-ui-notificationItemWidget-content-message-body' )
					.append( this.model.getContentBody() )
					// dir=auto has a similar effect to wrapping the content in <bdi>, but
					// makes text-overflow: ellipsis; behave less strangely
					.attr( 'dir', 'auto' )
			);
		}

		// Actions menu
		this.actionsButtonSelectWidget = new OO.ui.ButtonSelectWidget( {
			classes: [ 'mw-echo-ui-notificationItemWidget-content-actions-buttons' ]
		} );

		// Popup menu
		this.menuPopupButtonWidget = new mw.echo.ui.ActionMenuPopupWidget( {
			framed: false,
			icon: 'ellipsis',
			$overlay: this.$overlay,
			menuWidth: 200,
			title: mw.msg( 'echo-notification-more-options-tooltip' ),
			classes: [ 'mw-echo-ui-notificationItemWidget-content-actions-menu' ]
		} );

		// Timestamp
		// We want to use extra-short timestamp strings; we change the locale
		// to our echo-defined one and use that instead of the normal moment locale
		echoMoment = moment.utc( this.model.getTimestamp(), 'YYYYMMDDHHmmss' );
		echoMoment.locale( 'echo-shortRelativeTime' );

		this.timestampWidget = new OO.ui.LabelWidget( {
			classes: [ 'mw-echo-ui-notificationItemWidget-content-actions-timestamp' ],
			// Get the time 'fromNow' without the suffix 'ago'
			label: echoMoment.fromNow( true )
		} );

		// Build the actions line
		if ( this.bundle ) {
			// In a bundled item, the timestamp should go before the menu
			this.$actions.append(
				$( '<div>' )
					// We are wrapping the actions in a 'row' div so that the
					// internal pieces are also a table layout
					.addClass( 'mw-echo-ui-notificationItemWidget-content-actions-row' )
					.append(
						this.actionsButtonSelectWidget.$element,
						this.timestampWidget.$element,
						this.menuPopupButtonWidget.$element
					)
			);
		} else {
			this.$actions.append(
				this.actionsButtonSelectWidget.$element,
				this.menuPopupButtonWidget.$element,
				this.timestampWidget.$element
			);
		}

		// Actions
		secondaryUrls = this.model.getSecondaryUrls();
		for ( i = 0; i < secondaryUrls.length; i++ ) {
			urlObj = secondaryUrls[ i ];

			isInsideMenu = !this.bundle && urlObj.prioritized !== undefined;

			linkButton = new mw.echo.ui.MenuItemWidget( {
				icon: urlObj.icon || 'next',
				label: urlObj.label,
				tooltip: urlObj.tooltip,
				description: urlObj.description,
				url: urlObj.url,
				prioritized: isInsideMenu
			} );

			if ( isInsideMenu ) {
				this.actionsButtonSelectWidget.addItems( [ linkButton ] );
			} else {
				this.menuPopupButtonWidget.getMenu().addItems( [ linkButton ] );
			}
		}
		// Add a "mark as read" secondary action
		this.toggleReadSecondaryButton = new mw.echo.ui.MenuItemWidget( {
			data: 'toggleRead',
			prioritized: false,
			classes: [ 'mw-echo-ui-notificationItemWidget-content-actions-button' ]
		} );
		this.menuPopupButtonWidget.getMenu().addItems( [ this.toggleReadSecondaryButton ] );

		// Toggle 'mark as read' functionality
		this.toggleMarkAsReadButtons( !this.markReadWhenSeen && !this.model.isRead() );

		if ( this.bundle ) {
			// In a bundle, we have table layout, so the icon is
			// inserted into the content, and the 'mark as read'
			// button is not floating, and should be at the end
			this.$content.append(
				$icon,
				$message,
				this.$actions,
				this.markAsReadButton.$element
			);
			this.$element.append( this.$content );
		} else {
			this.$content.append(
				this.markAsReadButton.$element,
				$message,
				$( '<div>' )
					.addClass( 'mw-echo-ui-notificationItemWidget-content-table' )
					.append( this.$actions )
			);
			this.$element.append( $icon, this.$content );
		}

		this.$element
			.addClass( 'mw-echo-ui-notificationItemWidget mw-echo-ui-notificationItemWidget-' + this.model.getType() )
			.toggleClass( 'mw-echo-ui-notificationItemWidget-initiallyUnseen', !this.model.isSeen() && !this.bundle )
			.toggleClass( 'mw-echo-ui-notificationItemWidget-bundle', this.bundle );

		if ( this.model.getPrimaryUrl() ) {
			this.$element.contents()
				.wrapAll(
					// HACK: Wrap the entire item with a link that takes
					// the user to the primary url. This is not perfect,
					// but it makes the behavior native to the browser rather
					// than us listening to click events and opening new
					// windows.
					$( '<a>' )
						.addClass( 'mw-echo-ui-notificationItemWidget-linkWrapper' )
						.attr( 'href', this.model.getPrimaryUrl() )
						.on( 'click', function () {
							// Log notification click

							mw.echo.logger.logInteraction(
								mw.echo.Logger.static.actions.notificationClick,
								mw.echo.Logger.static.context.popup,
								widget.getModel().getId(),
								widget.getModel().getCategory(),
								false,
								// Source of this notification if it is cross-wiki
								widget.bundle ? widget.getModel().getSource() : ''
							);
						} )
				);
		}

		// Events
		this.markAsReadButton.connect( this, { click: 'onMarkAsReadButtonClick' } );
		this.menuPopupButtonWidget.getMenu().connect( this, { choose: 'onPopupButtonWidgetChoose' } );
		this.model.connect( this, {
			seen: 'toggleSeen',
			read: 'toggleRead'
		} );

		// Initialize state
		this.toggleRead( this.model.isRead() );
		this.toggleSeen( this.model.isSeen() );

		// HACK: We have to remove the built-in label. When this
		// widget is switched to a standalone widget rather than
		// an OptionWidget we can get rid of this
		this.$label.detach();
	};

	/* Initialization */

	OO.inheritClass( mw.echo.ui.NotificationItemWidget, OO.ui.OptionWidget );

	/* Static properties */

	mw.echo.ui.NotificationItemWidget.static.pressable = false;
	mw.echo.ui.NotificationItemWidget.static.selectable = false;

	/* Events */

	/**
	 * @event markAsRead
	 *
	 * Mark this notification as read
	 */

	/* Methods */

	/**
	 * Respond to mark as read button click
	 */
	mw.echo.ui.NotificationItemWidget.prototype.onMarkAsReadButtonClick = function () {
		this.model.toggleRead( true );
	};

	/**
	 * Respond to selecting an item from the popup button widget
	 */
	mw.echo.ui.NotificationItemWidget.prototype.onPopupButtonWidgetChoose = function ( item ) {
		var action = item && item.getData();

		if ( action === 'toggleRead' ) {
			this.model.toggleRead();
		}
	};

	/**
	 * Toggle the function of the 'mark as read' secondary button from 'mark as read' to
	 * 'mark as unread' and update the visibility of the primary 'mark as read' X button.
	 *
	 *
	 * @param {boolean} [show] Show the 'mark as read' buttons
	 *  - "false" means that the item is marked as read, whereby we show the user 'mark unread'
	 *    and hide the primary 'x' button
	 *  - "true" means that the item is marked as unread and we show the user 'mark as read'
	 *    primary and secondary buttons.
	 */
	mw.echo.ui.NotificationItemWidget.prototype.toggleMarkAsReadButtons = function ( show ) {
		show = show !== undefined ? show : !this.model.isRead();

		this.markAsReadButton.toggle( show );

		if ( show ) {
			// Mark read
			this.toggleReadSecondaryButton.setLabel( mw.msg( 'echo-notification-markasread' ) );
			this.toggleReadSecondaryButton.setIcon( 'check' );
		} else {
			// Mark unread
			this.toggleReadSecondaryButton.setLabel( mw.msg( 'echo-notification-markasunread' ) );
			this.toggleReadSecondaryButton.setIcon( 'sun' );
		}
		this.menuPopupButtonWidget.toggle( !this.menuPopupButtonWidget.getMenu().isEmpty() );
	};

	/**
	 * Reset the status of the notification without touching its user-controlled status.
	 * For one, remove 'initiallyUnseen' which exists only for the animation to work.
	 * This is called when new notifications are added to the parent widget, having to
	 * reset the 'unseen' status from the old ones.
	 */
	mw.echo.ui.NotificationItemWidget.prototype.reset = function () {
		this.$element.removeClass( 'mw-echo-ui-notificationItemWidget-initiallyUnseen' );
	};

	/**
	 * Toggle the read state of the widget
	 *
	 * @param {boolean} [read] The current read state. If not given, the state will
	 *  become the opposite of its current state.
	 */
	mw.echo.ui.NotificationItemWidget.prototype.toggleRead = function ( read ) {
		this.read = read !== undefined ? read : !this.read;

		this.$element.toggleClass( 'mw-echo-ui-notificationItemWidget-unread', !this.read );
		this.toggleMarkAsReadButtons( !this.read );
	};

	/**
	 * Toggle the seen state of the widget
	 *
	 * @param {boolean} [seen] The current seen state. If not given, the state will
	 *  become the opposite of its current state.
	 */
	mw.echo.ui.NotificationItemWidget.prototype.toggleSeen = function ( seen ) {
		this.seen = seen !== undefined ? seen : !this.seen;

		this.$element
			.toggleClass( 'mw-echo-ui-notificationItemWidget-unseen', !this.seen );
	};

	/**
	 * Get the notification link
	 *
	 * @return {string} Notification link
	 */
	mw.echo.ui.NotificationItemWidget.prototype.getModel = function () {
		return this.model;
	};

	/**
	 * Get the notification link
	 *
	 * @return {string} Notification link
	 */
	mw.echo.ui.NotificationItemWidget.prototype.getPrimaryUrl = function () {
		return this.model.getPrimaryUrl();
	};

	/**
	 * Disconnect events when widget is destroyed.
	 */
	mw.echo.ui.NotificationItemWidget.prototype.destroy = function () {
		this.model.disconnect( this );
	};

} )( mediaWiki, jQuery );
