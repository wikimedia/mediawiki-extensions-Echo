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
	mw.echo.ui.NotificationOptionWidget = function MwEchoUiNotificationOptionWidget( model, config ) {
		config = config || {};

		this.model = model;

		// Parent constructor
		mw.echo.ui.NotificationOptionWidget.parent.call( this, $.extend( { data: this.model.getId() }, config ) );

		this.markAsReadButton = new OO.ui.ButtonWidget( {
			icon: 'close',
			framed: false,
			classes: [ 'mw-echo-ui-notificationOptionWidget-markAsReadButton' ]
		} );

		this.setLabel( this.model.getContent() );

		this.toggleRead( this.model.isRead() );
		this.toggleSeen( this.model.isSeen() );

		this.markReadWhenSeen = !!config.markReadWhenSeen;

		// Events
		this.markAsReadButton.connect( this, { click: 'onMarkAsReadButtonClick' } );
		this.model.connect( this, {
			seen: 'toggleSeen',
			read: 'toggleRead'
		} );

		this.$element
			.addClass( 'mw-echo-ui-notificationOptionWidget' )
			.append(
				this.markAsReadButton.$element,
				this.$label
			);

		this.$element.toggleClass( 'mw-echo-ui-notificationOptionWidget-initiallyUnseen', !this.model.isSeen() );

		if ( this.markReadWhenSeen ) {
			this.$element.addClass( 'mw-echo-ui-notificationOptionWidget-markReadWhenSeen' );
		}

	};

	/* Initialization */

	OO.inheritClass( mw.echo.ui.NotificationOptionWidget, OO.ui.OptionWidget );

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
	mw.echo.ui.NotificationOptionWidget.prototype.onMarkAsReadButtonClick = function () {
		this.model.toggleRead( true );
	};
	/**
	 * Toggle the read state of the widget
	 *
	 * @param {boolean} [read] The current read state. If not given, the state will
	 *  become the opposite of its current state.
	 */
	mw.echo.ui.NotificationOptionWidget.prototype.toggleRead = function ( read ) {
		this.read = read !== undefined ? read : !this.read;

		this.$element.toggleClass( 'mw-echo-ui-notificationOptionWidget-unread', !this.read );
		this.markAsReadButton.toggle( !this.read );
	};

	/**
	 * Toggle the seen state of the widget
	 *
	 * @param {boolean} [seen] The current seen state. If not given, the state will
	 *  become the opposite of its current state.
	 */
	mw.echo.ui.NotificationOptionWidget.prototype.toggleSeen = function ( seen ) {
		this.seen = seen !== undefined ? seen : !this.seen;

		this.$element
			.toggleClass( 'mw-echo-ui-notificationOptionWidget-unseen', !this.seen );
	};

	/**
	 * Get the notification link
	 *
	 * @return {string} Notification link
	 */
	mw.echo.ui.NotificationOptionWidget.prototype.getModel = function () {
		return this.model;
	};

	/**
	 * Get the notification link
	 *
	 * @return {string} Notification link
	 */
	mw.echo.ui.NotificationOptionWidget.prototype.getPrimaryUrl = function () {
		return this.model.getPrimaryUrl();
	};

	/**
	 * Disconnect events when widget is destroyed.
	 */
	mw.echo.ui.NotificationOptionWidget.prototype.destroy = function () {
		this.model.disconnect( this );
	};

} )( mediaWiki, jQuery );
