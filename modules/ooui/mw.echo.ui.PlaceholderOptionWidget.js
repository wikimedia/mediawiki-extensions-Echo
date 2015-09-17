( function ( mw, $ ) {
	/**
	 * Placeholder notification option widget for echo popup.
	 *
	 * @class
	 * @extends OO.ui.OptionWidget
	 *
	 * @constructor
	 * @param {Object} [config] Configuration object
	 */
	mw.echo.ui.PlaceholderOptionWidget = function MwEchoUiPlaceholderOptionWidget( config ) {
		// Parent constructor
		mw.echo.ui.PlaceholderOptionWidget.parent.call( this, $.extend( { data: null }, config ) );

		this.$element.addClass( 'mw-echo-ui-notificationsWidget-loadingOption' );
	};

	OO.inheritClass( mw.echo.ui.PlaceholderOptionWidget, OO.ui.OptionWidget );

	mw.echo.ui.PlaceholderOptionWidget.static.selectable = false;
	mw.echo.ui.PlaceholderOptionWidget.static.highlightable = false;
	mw.echo.ui.PlaceholderOptionWidget.static.pressable = false;

} )( mediaWiki, jQuery );
