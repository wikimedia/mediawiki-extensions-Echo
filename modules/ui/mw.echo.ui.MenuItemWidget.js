( function ( mw, $ ) {
	/**
	 * Secondary menu item
	 *
	 * @class
	 * @extends OO.ui.Widget
	 *
	 * @constructor
	 * @param {Object} [config] Configuration object
	 * @cfg {string} [description] An optional description for the item
	 * @cfg {string} [icon] An optional icon for the item
	 * @cfg {boolean} [prioritized] The item is prioritized outside the
	 *  popup menu.
	 */
	mw.echo.ui.MenuItemWidget = function MwEchoUiMenuItemWidget( config ) {
		config = config || {};

		// Parent constructor
		mw.echo.ui.MenuItemWidget.parent.call( this, config );

		// Mixin constructors
		OO.ui.mixin.IconElement.call( this, config );

		this.prioritized = !!config.prioritized;

		// Optional description
		this.descriptionLabel = new OO.ui.LabelWidget( {
			classes: [ 'mw-echo-ui-menuItemWidget-content-description' ],
			label: config.description || ''
		} );
		this.descriptionLabel.toggle( !this.prioritized );

		// Build the option
		this.$element
			.addClass( 'mw-echo-ui-menuItemWidget' )
			.toggleClass( 'mw-echo-ui-menuItemWidget-prioritized', this.prioritized )
			.append(
				this.$icon
					.addClass( 'mw-echo-ui-menuItemWidget-icon' ),
				$( '<div>' )
					.addClass( 'mw-echo-ui-menuItemWidget-content' )
					.append(
						this.$label
							.addClass( 'mw-echo-ui-menuItemWidget-content-label' ),
						this.descriptionLabel.$element
					)
			);

		if ( config.url ) {
			this.hasLink = true;
			this.$element.contents()
				.wrapAll(
					// HACK: Wrap the entire item with a link that takes
					// the user to the primary url. This is not perfect,
					// but it makes the behavior native to the browser rather
					// than us listening to click events and opening new
					// windows.
					$( '<a>' )
						.addClass( 'mw-echo-ui-menuItemWidget-linkWrapper' )
						.attr( 'href', config.url )
						.attr( 'title', config.tooltip )
				);
		}
	};

	/* Initialization */

	OO.inheritClass( mw.echo.ui.MenuItemWidget, OO.ui.OptionWidget );
	OO.mixinClass( mw.echo.ui.MenuItemWidget, OO.ui.mixin.IconElement );

	/* Static Properties */

	mw.echo.ui.MenuItemWidget.static.highlightable = false;
	mw.echo.ui.MenuItemWidget.static.pressable = false;

	/* Methods */

	mw.echo.ui.MenuItemWidget.prototype.isSelectable = function () {
		// If we have a link, force selectability to false, otherwise defer to parent method
		return !this.hasLink && mw.echo.ui.MenuItemWidget.parent.prototype.isSelectable.apply( this, arguments );
	};

} )( mediaWiki, jQuery );

