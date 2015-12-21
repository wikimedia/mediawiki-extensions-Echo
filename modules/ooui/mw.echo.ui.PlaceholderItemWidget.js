( function ( mw, $ ) {
	/**
	 * Placeholder notification option widget for echo popup.
	 *
	 * @class
	 * @extends OO.ui.OptionWidget
	 *
	 * @constructor
	 * @param {Object} [config] Configuration object
	 * @cfg {string} [link] A link that this widget leads to.
	 */
	mw.echo.ui.PlaceholderItemWidget = function MwEchoUiPlaceholderItemWidget( config ) {
		config = config || {};

		// Parent constructor
		mw.echo.ui.PlaceholderItemWidget.parent.call( this, $.extend( { data: null }, config ) );

		this.$link = $( '<a>' )
			.addClass( 'mw-echo-ui-notificationsWidget-loadingOption-link' );
		this.setLink( config.link || '' );

		this.$element
			.addClass( 'mw-echo-ui-notificationsWidget-loadingOption' )
			.append(
				this.$link.append( this.$label )
			);
	};

	OO.inheritClass( mw.echo.ui.PlaceholderItemWidget, OO.ui.OptionWidget );

	mw.echo.ui.PlaceholderItemWidget.static.selectable = false;
	mw.echo.ui.PlaceholderItemWidget.static.highlightable = false;
	mw.echo.ui.PlaceholderItemWidget.static.pressable = false;

	/**
	 * Set (or unset) the main link for this widget
	 *
	 * @param {string} link The widget link
	 */
	mw.echo.ui.PlaceholderItemWidget.prototype.setLink = function ( link ) {
		this.link = link;

		this.$element.toggleClass( 'mw-echo-ui-notificationsWidget-loadingOption-notLinked', !this.link );

		this.$link.attr( 'href', this.link );
	};

} )( mediaWiki, jQuery );
