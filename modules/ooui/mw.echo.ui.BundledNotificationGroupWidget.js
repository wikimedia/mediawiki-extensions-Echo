( function ( mw, $ ) {
	/**
	 * Notification option widget for echo popup.
	 *
	 * @class
	 * @extends OO.ui.Widget
	 *
	 * @constructor
	 * @param {mw.echo.dm.NotificationsModel} model Notifications model for this bundle
	 * @param {Object} [config] Configuration object
	 * @cfg {boolean} [showTitle=false] Show the title of this group
	 * @cfg {jQuery} [$overlay] A jQuery element functioning as an overlay
	 *  for popups.
	 */
	mw.echo.ui.BundledNotificationGroupWidget = function MwEchoUiBundledNotificationGroupWidget( model, config ) {
		config = config || {};

		this.model = model;
		this.id = this.model.getSource();

		// Parent constructor
		mw.echo.ui.BundledNotificationGroupWidget.parent.call( this, $.extend( { data: this.id }, config ) );

		this.showTitle = !!config.showTitle;
		this.$overlay = config.$overlay || this.$element;

		this.notifsWidget = new mw.echo.ui.NotificationsWidget(
			model,
			{
				bundle: true,
				$overlay: this.$overlay,
				source: this.model.getSource(),
				type: this.model.getType()
			}
		);

		this.title = new OO.ui.LabelWidget( {
			classes: [ 'mw-echo-ui-bundledNotificationGroupWidget-title' ]
		} );

		if ( this.model.getTitle() ) {
			this.title.setLabel( this.model.getTitle() );
			this.$element.append( this.title.$element );
		}
		this.title.toggle( this.showTitle );

		this.$element
			.addClass( 'mw-echo-ui-bundledNotificationGroupWidget' )
			.append( this.notifsWidget.$element );
	};

	/* Initialization */

	OO.inheritClass( mw.echo.ui.BundledNotificationGroupWidget, OO.ui.Widget );

	/* Events */

	/**
	 * The bundle is empty
	 *
	 * @event empty
	 */

	/* Methods */

	/**
	 * Get the bundle id
	 *
	 * @return {string} Bundle id
	 */
	mw.echo.ui.BundledNotificationGroupWidget.prototype.getId = function () {
		return this.id;
	};

	/**
	 * Toggle the visibility of the title
	 *
	 * @param {boolean} show Show the title
	 */
	mw.echo.ui.BundledNotificationGroupWidget.prototype.toggleTitle = function ( show ) {
		show = show !== undefined ? show : !this.showTitle;

		if ( this.showTitle !== show ) {
			this.showTitle = show;
			this.title.toggle( this.showTitle );
		}
	};

} )( mediaWiki, jQuery );
