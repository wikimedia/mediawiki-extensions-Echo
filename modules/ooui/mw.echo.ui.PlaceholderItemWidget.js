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
	mw.echo.ui.PlaceholderItemWidget = function MwEchoUiPlaceholderItemWidget( config ) {
		// Parent constructor
		mw.echo.ui.PlaceholderItemWidget.parent.call( this, $.extend( { data: null }, config ) );

		this.$element.addClass( 'mw-echo-ui-notificationsWidget-loadingOption' );
	};

	OO.inheritClass( mw.echo.ui.PlaceholderItemWidget, OO.ui.OptionWidget );

	mw.echo.ui.PlaceholderItemWidget.static.selectable = false;
	mw.echo.ui.PlaceholderItemWidget.static.highlightable = false;
	mw.echo.ui.PlaceholderItemWidget.static.pressable = false;

} )( mediaWiki, jQuery );
