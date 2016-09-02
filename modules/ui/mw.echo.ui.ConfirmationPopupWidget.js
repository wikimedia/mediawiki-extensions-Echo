( function ( mw, $ ) {
	/**
	 * Confirmation overlay widget, especially for mobile display.
	 * The behavior of this widget is to appear with a given confirmation
	 * message and then disapear after a given interval.
	 *
	 * @class
	 * @extends OO.ui.Widget
	 * @mixins OO.ui.mixin.LabelElement
	 * @mixins OO.ui.mixin.IconElement
	 *
	 * @constructor
	 * @param {Object} [config] Configuration object
	 * @cfg {number} [interval=2000] The number of milliseconds that it takes
	 *  for the popup to disappear after appearing.
	 */
	mw.echo.ui.ConfirmationPopupWidget = function MwEchoUiConfirmationPopupWidget( config ) {
		config = config || {};

		// Parent constructor
		mw.echo.ui.ConfirmationPopupWidget.parent.call( this, config );

		// Mixin constructor
		OO.ui.mixin.LabelElement.call( this, config );
		OO.ui.mixin.IconElement.call( this, $.extend( { icon: 'doubleCheck' }, config ) );

		this.interval = config.interval || 2000;

		this.$element
			.addClass( 'mw-echo-ui-confirmationPopupWidget' )
			.append(
				$( '<div>' )
					.addClass( 'mw-echo-ui-confirmationPopupWidget-popup' )
					.append( this.$icon, this.$label )
			)
			// We're using explicit hide here because the widget uses
			// animated fadeOut
			.hide();
	};

	/* Initialization */

	OO.inheritClass( mw.echo.ui.ConfirmationPopupWidget, OO.ui.Widget );
	OO.mixinClass( mw.echo.ui.ConfirmationPopupWidget, OO.ui.mixin.LabelElement );
	OO.mixinClass( mw.echo.ui.ConfirmationPopupWidget, OO.ui.mixin.IconElement );

	/**
	 * Show the widget and then animate its fade out.
	 */
	mw.echo.ui.ConfirmationPopupWidget.prototype.showAnimated = function () {
		// OOUI removes the oo-ui-image-invert class when it is initialized
		// without explicit flag classes, so we have to re-add this when we
		// display the icon for the icon to be inverted
		this.$icon.addClass( 'oo-ui-image-invert' );
		this.$element.show();
		setTimeout( this.hide.bind( this ), this.interval );
	};

	/**
	 * Hide the widget by fading it out
	 *
	 * @private
	 */
	mw.echo.ui.ConfirmationPopupWidget.prototype.hide = function () {
		this.$element.fadeOut();
	};
} )( mediaWiki, jQuery );
