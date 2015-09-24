( function ( mw, $ ) {
	/**
	 * Notification badge button widget for echo popup.
	 *
	 * @class
	 * @extends OO.ui.ButtonWidget
	 *
	 * @constructor
	 * @param {Object} [config] Configuration object
	 * @cfg {string|Object} [badgeIcon] The icons to use for this button.
	 *  If this is a string, it will be used as the icon regardless of the state.
	 *  If it is an object, it must include
	 *  the properties 'unseen' and 'seen' with icons attached to both. For example:
	 *  { badgeIcon: {
	 *    unseen: 'bellOn',
	 *    seen: 'bell'
	 *  } }
	 * @cfg {string} [href] URL the badge links to
	 */
	mw.echo.ui.BadgeLinkWidget = function MwEchoUiBadgeLinkWidget( config ) {
		config = config || {};

		// Parent constructor
		mw.echo.ui.BadgeLinkWidget.parent.call( this, config );

		// Mixin constructors
		OO.ui.mixin.LabelElement.call( this, $.extend( { $label: this.$element }, config ) );
		OO.ui.mixin.ButtonElement.call( this, $.extend( { $button: this.$element }, config ) );
		OO.ui.mixin.IconElement.call( this, $.extend( { $icon: this.$element }, config ) );
		OO.ui.mixin.TitledElement.call( this, $.extend( { $titled: this.$element }, config ) );
		OO.ui.mixin.FlaggedElement.call( this, $.extend( {}, config, { $flagged: this.$element } ) );

		this.$element.addClass( 'mw-echo-notifications-badge' );

		if ( config.href !== undefined && OO.ui.isSafeUrl( config.href ) ) {
			this.$element.attr( 'href', config.href );
		}
	};

	OO.inheritClass( mw.echo.ui.BadgeLinkWidget, OO.ui.Widget );
	OO.mixinClass( mw.echo.ui.BadgeLinkWidget, OO.ui.mixin.LabelElement );
	OO.mixinClass( mw.echo.ui.BadgeLinkWidget, OO.ui.mixin.ButtonElement );
	OO.mixinClass( mw.echo.ui.BadgeLinkWidget, OO.ui.mixin.IconElement );
	OO.mixinClass( mw.echo.ui.BadgeLinkWidget, OO.ui.mixin.TitledElement );
	OO.mixinClass( mw.echo.ui.BadgeLinkWidget, OO.ui.mixin.FlaggedElement );

	mw.echo.ui.BadgeLinkWidget.static.tagName = 'a';

} )( mediaWiki, jQuery );
