( function ( mw, $ ) {
	/**
	 * Placeholder notification option widget for echo popup.
	 *
	 * @class
	 * @extends OO.ui.Widget
	 * @mixins OO.ui.mixin.LabelElement
	 *
	 * @constructor
	 * @param {Object} [config] Configuration object
	 * @cfg {string} [link] A link that this widget leads to.
	 */
	mw.echo.ui.PlaceholderItemWidget = function MwEchoUiPlaceholderItemWidget( config ) {
		config = config || {};

		// Parent constructor
		mw.echo.ui.PlaceholderItemWidget.parent.call( this, $.extend( { data: null }, config ) );

		// Mixin constructor
		OO.ui.mixin.LabelElement.call( this, config );

		this.$link = $( '<a>' )
			.addClass( 'mw-echo-ui-placeholderItemWidget-link' );
		this.setLink( config.link || '' );

		this.$element
			.addClass( 'mw-echo-ui-placeholderItemWidget' )
			.append(
				this.$link.append( this.$label )
			);
	};

	OO.inheritClass( mw.echo.ui.PlaceholderItemWidget, OO.ui.Widget );
	OO.mixinClass( mw.echo.ui.PlaceholderItemWidget, OO.ui.mixin.LabelElement );

	/**
	 * Set (or unset) the main link for this widget
	 *
	 * @param {string} link The widget link
	 */
	mw.echo.ui.PlaceholderItemWidget.prototype.setLink = function ( link ) {
		this.link = link;

		this.$element.toggleClass( 'mw-echo-ui-placeholderItemWidget-loadingOption-notLinked', !this.link );

		this.$link.attr( 'href', this.link );
	};

	/**
	 * Return false on 'isRead' call for the notification list
	 * sorting.
	 *
	 * @return {boolean} false
	 */
	mw.echo.ui.PlaceholderItemWidget.prototype.isRead = function () {
		return false;
	};

	/**
	 * Return false on 'isForeign' call for the notification list
	 * sorting.
	 *
	 * @return {boolean} false
	 */
	mw.echo.ui.PlaceholderItemWidget.prototype.isForeign = function () {
		return false;
	};

	/**
	 * Return 0 on getTimestamp call for the notification list
	 * sorting.
	 *
	 * @return {number} 0
	 */
	mw.echo.ui.PlaceholderItemWidget.prototype.getTimestamp = function () {
		return 0;
	};

	/**
	 * Return 0 on getId call for the notification list
	 * sorting.
	 *
	 * @return {number} 0
	 */
	mw.echo.ui.PlaceholderItemWidget.prototype.getId = function () {
		return 0;
	};
} )( mediaWiki, jQuery );
