( function ( mw ) {
	/**
	 * Wrapper for the notifications widget, for view outside the popup.
	 *
	 * @class
	 * @extends OO.ui.Widget
	 * @mixins OO.ui.mixin.PendingElement
	 *
	 * @constructor
	 * @param {mw.echo.dm.NotificationsModel} model Notifications view model
	 * @param {Object} [config] Configuration object
	 */
	mw.echo.ui.NotificationsWrapper = function MwEchoUiNotificationsWrapper( model, config ) {
		config = config || {};

		// Parent constructor
		mw.echo.ui.NotificationsWrapper.parent.call( this, config );

		// Mixin constructor
		OO.ui.mixin.PendingElement.call( this, config );

		this.model = model;

		this.notificationsWidget = new mw.echo.ui.NotificationsWidget(
			this.model,
			{
				markReadWhenSeen: false,
				$overlay: config.$overlay,
				label: mw.msg( 'notifications' ),
				icon: 'bell'
			}
		);

		// Initialize
		this.$element
			.append( this.notificationsWidget.$element );
	};

	/* Initialization */

	OO.inheritClass( mw.echo.ui.NotificationsWrapper, OO.ui.Widget );
	OO.mixinClass( mw.echo.ui.NotificationsWrapper, OO.ui.mixin.PendingElement );

	/* Events */

	/**
	 * @event finishLoading
	 * Notifications have successfully finished being processed and are fully loaded
	 */

	/* Methods */

	/**
	 * Populate the notifications panel
	 *
	 * @return {jQuery.Promise} A promise that is resolved when all notifications
	 *  were fetched from the API and added to the model and UI.
	 */
	mw.echo.ui.NotificationsWrapper.prototype.populate = function () {
		var widget = this;

		this.pushPending();
		return this.model.fetchNotifications( true )
			.always( function () {
				widget.popPending();
				widget.emit( 'finishLoading' );
				widget.promiseRunning = false;
			} );
	};
} )( mediaWiki );
