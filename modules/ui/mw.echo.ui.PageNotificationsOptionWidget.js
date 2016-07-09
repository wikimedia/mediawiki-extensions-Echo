( function ( $, mw ) {
	/**
	 * An option widget for the page filter in PageFilterWidget
	 *
	 * @class
	 * @extends OO.ui.OptionWidget
	 * @mixins OO.ui.mixin.IconElement
	 *
	 * @constructor
	 * @param {Object} [config] Configuration object
	 * @cfg {number} [unreadCount] Number of unread notifications
	 */
	mw.echo.ui.PageNotificationsOptionWidget = function MwEchoUiPageNotificationsOptionWidget( config ) {
		config = config || {};

		// Parent
		mw.echo.ui.PageNotificationsOptionWidget.parent.call( this, config );
		// Mixin constructors
		OO.ui.mixin.IconElement.call( this, config );

		this.count = config.unreadCount || 0;

		this.$label
			.addClass( 'mw-echo-ui-pageNotificationsOptionWidget-title-label' );

		this.unreadCountLabel = new OO.ui.LabelWidget( {
			classes: [ 'mw-echo-ui-pageNotificationsOptionWidget-label-count' ],
			label: mw.language.convertNumber( this.count )
		} );

		// Initialization
		this.$element
			.addClass( 'mw-echo-ui-pageNotificationsOptionWidget' )
			.append(
				$( '<div>' )
					.addClass( 'mw-echo-ui-pageNotificationsOptionWidget-count' )
					.append( this.unreadCountLabel.$element ),
				$( '<div>' )
					.addClass( 'mw-echo-ui-pageNotificationsOptionWidget-title' )
					.append( this.$label )
			);

		if ( this.getIcon() ) {
			this.$element.prepend(
				$( '<div>' )
					.addClass( 'mw-echo-ui-pageNotificationsOptionWidget-icon' )
					.append( this.$icon )
			);
		}
	};

	/* Initialization */

	OO.inheritClass( mw.echo.ui.PageNotificationsOptionWidget, OO.ui.OptionWidget );
	OO.mixinClass( mw.echo.ui.PageNotificationsOptionWidget, OO.ui.mixin.IconElement );

	/**
	 * Set the page count
	 *
	 * @param {number} count Page count
	 */
	mw.echo.ui.PageNotificationsOptionWidget.prototype.setCount = function ( count ) {
		this.count = count;
		this.unreadCountLabel.setLabel( this.count );
	};

	/**
	 * Get the page count
	 *
	 * @return {number} Page count
	 */
	mw.echo.ui.PageNotificationsOptionWidget.prototype.getCount = function () {
		return this.count;
	};

} )( jQuery, mediaWiki );
