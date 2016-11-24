( function ( mw, $ ) {
	/**
	 * Secondary menu item
	 *
	 * @class
	 * @extends OO.ui.Widget
	 * @mixins OO.ui.mixin.IconElement
	 * @mixins OO.ui.mixin.PendingElement
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
		OO.ui.mixin.PendingElement.call( this, config );

		this.dynamic = config.type === 'dynamic-action';
		this.prioritized = !!config.prioritized;
		this.messages = this.isDynamicAction() ?
			config.actionData.messages :
			{};

		this.actionData = config.actionData || {};

		// Optional description
		this.descriptionLabel = new OO.ui.LabelWidget( {
			classes: [ 'mw-echo-ui-menuItemWidget-content-description' ],
			label: config.description || ''
		} );
		this.descriptionLabel.toggle( !this.prioritized && config.description );

		// Build the option
		this.$element
			.addClass( 'mw-echo-ui-menuItemWidget' )
			.toggleClass( 'mw-echo-ui-menuItemWidget-prioritized', this.prioritized )
			.toggleClass( 'mw-echo-ui-menuItemWidget-dynamic-action', this.isDynamicAction() )
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

		if ( config.url && !this.isDynamicAction() ) {
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
	OO.mixinClass( mw.echo.ui.MenuItemWidget, OO.ui.mixin.PendingElement );

	/* Static Properties */

	mw.echo.ui.MenuItemWidget.static.highlightable = false;
	mw.echo.ui.MenuItemWidget.static.pressable = false;

	/* Methods */

	mw.echo.ui.MenuItemWidget.prototype.isSelectable = function () {
		// If we have a link force selectability to false, otherwise defer to parent method
		// Without a link (for dynamic actions or specific internal actions) we need this widget
		// to be selectable so it emits the 'choose' event
		return !this.hasLink && mw.echo.ui.MenuItemWidget.parent.prototype.isSelectable.apply( this, arguments );
	};

	/**
	 * Check whether this item is prioritized
	 *
	 * @return {boolean} Item is prioritized
	 */
	mw.echo.ui.MenuItemWidget.prototype.isPrioritized = function () {
		return this.prioritized;
	};

	/**
	 * Get the messages for the confirmation dialog
	 * We expect optionally two messages - title and description.
	 *
	 * NOTE: The messages are parsed as HTML. If user-input is expected
	 * please make sure to properly escape it.
	 *
	 * @return {Object} Messages for the confirmation dialog
	 * @return {string} return.title Title for the confirmation dialog
	 * @return {string} return.description Description for the confirmation dialog
	 */
	mw.echo.ui.MenuItemWidget.prototype.getConfirmationMessages = function () {
		return this.messages.confirmation;
	};

	/**
	 * Get the action data associated with this item
	 *
	 * @return {Object} Action data
	 */
	mw.echo.ui.MenuItemWidget.prototype.getActionData = function () {
		return this.actionData;
	};

	/**
	 * This item is a dynamic action
	 *
	 * @return {boolean} Item is a dynamic action
	 */
	mw.echo.ui.MenuItemWidget.prototype.isDynamicAction = function () {
		return this.dynamic;
	};
}( mediaWiki, jQuery ) );
