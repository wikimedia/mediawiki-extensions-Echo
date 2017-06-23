( function ( mw ) {
	/**
	 * Action menu popup widget for echo items.
	 *
	 * We don't currently have anything that properly answers the complete
	 * design for our popup menus in OOUI, so this widget serves two purposes:
	 * 1. The MenuSelectWidget is intended to deliver a menu that relates
	 *    directly to its anchor, so its sizing is dictated by whatever anchors
	 *    it. This is not what we require, so we have to override the 'click' event
	 *    to reset the width of the menu.
	 * 2. It abstracts the behavior of the item menus for easier management
	 *    in the item widget itself (which is fairly large)
	 *
	 * @class
	 * @extends OO.ui.ButtonWidget
	 *
	 * @constructor
	 * @param {Object} [config] Configuration object
	 * @cfg {jQuery} [$overlay] A jQuery element functioning as an overlay
	 *  for popups.
	 * @cfg {number} [menuWidth=300] The width of the popup menu
	 */
	mw.echo.ui.ActionMenuPopupWidget = function MwEchoUiActionMenuPopupWidget( config ) {
		config = config || {};

		// Parent constructor
		mw.echo.ui.ActionMenuPopupWidget.parent.call( this, config );

		this.$overlay = config.$overlay || this.$element;

		this.menuWidth = config.menuWidth || 300;

		// Menu
		this.menu = new OO.ui.MenuSelectWidget( {
			$floatableContainer: this.$element,
			classes: [ 'mw-echo-ui-actionMenuPopupWidget-menu' ],
			widget: this
		} );
		this.$overlay.append( this.menu.$element );

		// Events
		this.connect( this, { click: 'onAction' } );
		this.getMenu().connect( this, {
			remove: 'decideToggle',
			add: 'decideToggle',
			clear: 'decideToggle'
		} );
		// Initialization
		this.$element
			.addClass( 'mw-echo-ui-actionMenuPopupWidget' );
	};

	/* Setup */

	OO.inheritClass( mw.echo.ui.ActionMenuPopupWidget, OO.ui.ButtonWidget );

	/**
	 * Handle the button action being triggered.
	 *
	 * @private
	 */
	mw.echo.ui.ActionMenuPopupWidget.prototype.onAction = function () {
		this.menu.toggle();
		// HACK: The menu is attempting to be the same size as the container,
		// which in our case is not the point at all. We need the menu
		// to be larger, so force this setting:
		this.menu.$element.css( 'width', this.menuWidth );
		// HACK: Prevent ClippableElement from overwriting this width value on scroll
		// or window resize
		this.menu.toggleClipping( false );
	};

	/**
	 * Decide whether the menu should be visible, based on whether it is
	 * empty or not.
	 */
	mw.echo.ui.ActionMenuPopupWidget.prototype.decideToggle = function () {
		this.toggle( !this.getMenu().isEmpty() );
	};

	/**
	 * Get the widget's action menu
	 *
	 * @return {OO.ui.MenuSelectWidget} Menu
	 */
	mw.echo.ui.ActionMenuPopupWidget.prototype.getMenu = function () {
		return this.menu;
	};
}( mediaWiki ) );
