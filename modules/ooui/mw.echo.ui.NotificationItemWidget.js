( function ( mw, $ ) {
	/**
	 * Notification option widget for echo popup.
	 *
	 * @class
	 * @extends OO.ui.OptionWidget
	 *
	 * @constructor
	 * @param {Object} [config] Configuration object
	 * @cfg {boolean} [markReadWhenSeen=false] This option is marked as read when it is viewed
	 */
	mw.echo.ui.NotificationItemWidget = function MwEchoUiNotificationItemWidget( model, config ) {
		var widget = this;
		config = config || {};

		this.model = model;

		// Parent constructor
		mw.echo.ui.NotificationItemWidget.parent.call( this, $.extend( { data: this.model.getId() }, config ) );

		this.markAsReadButton = new OO.ui.ButtonWidget( {
			icon: 'close',
			framed: false,
			classes: [ 'mw-echo-ui-notificationItemWidget-markAsReadButton' ]
		} );

		this.setLabel( this.model.getContent() );

		this.toggleRead( this.model.isRead() );
		this.toggleSeen( this.model.isSeen() );

		this.markReadWhenSeen = !!config.markReadWhenSeen;
		this.markAsReadButton.toggle( !this.markReadWhenSeen && !this.model.isRead() );

		// Events
		this.markAsReadButton.connect( this, { click: 'onMarkAsReadButtonClick' } );
		this.model.connect( this, {
			seen: 'toggleSeen',
			read: 'toggleRead'
		} );

		this.$element
			.addClass( 'mw-echo-ui-notificationItemWidget mw-echo-ui-notificationItemWidget-' + this.model.getType() )
			.append(
				// HACK: Wrap the entire option with a link that takes
				// the user to the primary url. This is not perfect,
				// but it makes the behavior native to the browser rather
				// than us listening to click events and opening new
				// windows.
				$( '<a>' )
					.addClass( 'mw-echo-ui-notificationItemWidget-linkWrapper' )
					.attr( 'href', this.model.getPrimaryUrl() )
					.append(
						this.markAsReadButton.$element,
						this.$label
					)
					.on( 'click', function () {
						// Log notification click
						mw.echo.logger.logInteraction(
							mw.echo.Logger.static.actions.notificationClick,
							mw.echo.Logger.static.context.popup,
							widget.getModel().getId(),
							widget.getModel().getCategory()
						);
					} )
			);

		this.$element.toggleClass( 'mw-echo-ui-notificationItemWidget-initiallyUnseen', !this.model.isSeen() );
	};

	/* Initialization */

	OO.inheritClass( mw.echo.ui.NotificationItemWidget, OO.ui.OptionWidget );

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
		this.markAsReadButton.toggle( !this.read );
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
