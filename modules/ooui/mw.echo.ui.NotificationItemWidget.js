( function ( mw, $ ) {
	/*global moment:false */
	/**
	 * Notification option widget for echo popup.
	 *
	 * @class
	 * @extends OO.ui.OptionWidget
	 *
	 * @constructor
	 * @param {Object} [config] Configuration object
	 * @cfg {boolean} [markReadWhenSeen=false] This option is marked as read when it is viewed
	 * @cfg {jQuery} [$overlay] A jQuery element functioning as an overlay
	 *  for popups.
	 * @cfg {boolean} [bundle=false] This notification item is part of a bundle.
	 */
	mw.echo.ui.NotificationItemWidget = function MwEchoUiNotificationItemWidget( model, config ) {
		var i, secondaryUrls, urlObj, linkButton, $icon, isInsideMenu,
			$content = $( '<div>' ).addClass( 'mw-echo-ui-notificationItemWidget-content' ),
			$message = $( '<div>' ).addClass( 'mw-echo-ui-notificationItemWidget-content-message' ),
			widget = this;

		config = config || {};

		// Parent constructor
		mw.echo.ui.NotificationItemWidget.parent.call( this, $.extend( { data: model.getId() }, config ) );

		this.model = model;
		this.$overlay = config.$overlay || this.$element;
		this.bundle = !!config.bundle;

		this.$actions = $( '<div>' )
			.addClass( 'mw-echo-ui-notificationItemWidget-content-actions' );

		// Mark unread
		this.markAsReadButton = new OO.ui.ButtonWidget( {
			icon: 'close',
			framed: false,
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
			classes: [ 'mw-echo-ui-notificationItemWidget-content-actions-menu' ]
		} );

		// Timestamp
		this.timestampWidget = new OO.ui.LabelWidget( {
			classes: [ 'mw-echo-ui-notificationItemWidget-content-actions-timestamp' ],
			label: moment.utc( this.model.getTimestamp(), 'YYYYMMDDHHmmss' ).fromNow()
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
		this.markAsReadSecondary = new OO.ui.ButtonOptionWidget( {
			icon: 'check',
			framed: false,
			data: 'markAsRead',
			label: mw.msg( 'echo-notification-markasread' ),
			classes: [ 'mw-echo-ui-notificationItemWidget-content-actions-button' ]
		} );
		// Toggle 'mark as read' functionality
		this.toggleMarkAsReadButtons( !this.markReadWhenSeen && !this.model.isRead() );

		if ( this.bundle ) {
			// In a bundle, we have table layout, so the icon is
			// inserted into the content, and the 'mark as read'
			// button is not floating, and should be at the end
			$content.append(
				$icon,
				$message,
				this.$actions,
				this.markAsReadButton.$element
			);
			this.$element.append( $content );
		} else {
			$content.append(
				this.markAsReadButton.$element,
				$message,
				this.$actions
			);
			this.$element.append( $icon, $content );
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

							// TODO: In order to properly log a click of an item that
							// is part of a bundled cross-wiki notification, we will
							// need to add 'source' to the logging schema. Otherwise,
							// the logger will log item ID as if it is local, which
							// is wrong.
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

		if ( action === 'markAsRead' ) {
			this.model.toggleRead( true );
		}
	};

	/**
	 * Toggle the visibility of the 'mark as read' buttons and update the visibility
	 * of the secondary menu accordingly.
	 *
	 * @param {boolean} [show] Show the 'mark as read' buttons
	 */
	mw.echo.ui.NotificationItemWidget.prototype.toggleMarkAsReadButtons = function ( show ) {
		show = show !== undefined ? show : !this.model.isRead();

		this.markAsReadButton.toggle( show );
		this.markAsReadSecondary.toggle( show );

		if ( show ) {
			this.menuPopupButtonWidget.getMenu().addItems( [ this.markAsReadSecondary ] );
		} else {
			this.menuPopupButtonWidget.getMenu().removeItems( [ this.markAsReadSecondary ] );
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
