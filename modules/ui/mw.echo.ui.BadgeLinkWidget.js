/**
 * Notification badge button widget for echo popup.
 *
 * @class
 * @extends OO.ui.ButtonWidget
 *
 * @constructor
 * @param {Object} [config={}]
 * @param {jQuery} config.$badge the badge that was enhanced.
 * @param {string} [config.type] The notification types this button represents;
 *  'message', 'alert' or 'all'
 * @param {string} [config.href] URL the badge links to
 * @param {string} [config.numItems=0] The number of items that are in the button display
 * @param {string} [config.hasUnseen=false] There are unseen notifications of this type
 * @param {string} [config.convertedNumber] A converted version of the initial count
 */
mw.echo.ui.BadgeLinkWidget = function MwEchoUiBadgeLinkWidget( config ) {
	config = config || {};
	this.$badge = config.$badge;

	// Parent constructor
	mw.echo.ui.BadgeLinkWidget.super.call( this, config );

	// Mixin constructors
	OO.ui.mixin.LabelElement.call( this, Object.assign( { $label: this.$element }, config ) );
	OO.ui.mixin.ButtonElement.call( this, Object.assign( { $button: this.$element }, config ) );
	OO.ui.mixin.TitledElement.call( this, Object.assign( { $titled: this.$element }, config ) );

	this.$element
		.addClass( 'mw-echo-notifications-badge' );

	this.count = 0;
	this.type = config.type || 'alert';
	this.setCount( config.numItems || 0, config.convertedNumber );
	this.setHasUnseen( config.hasUnseen );

	if ( config.href !== undefined && OO.ui.isSafeUrl( config.href ) ) {
		this.$element.attr( 'href', config.href );
	}
	if ( this.type === 'alert' ) {
		this.$element
			.addClass( 'oo-ui-icon-bell' );
	} else {
		this.$element
			.addClass( 'oo-ui-icon-tray' );
	}
};

OO.inheritClass( mw.echo.ui.BadgeLinkWidget, OO.ui.Widget );
OO.mixinClass( mw.echo.ui.BadgeLinkWidget, OO.ui.mixin.LabelElement );
OO.mixinClass( mw.echo.ui.BadgeLinkWidget, OO.ui.mixin.ButtonElement );
OO.mixinClass( mw.echo.ui.BadgeLinkWidget, OO.ui.mixin.TitledElement );

mw.echo.ui.BadgeLinkWidget.static.tagName = 'a';

/**
 * Overrides ButtonElement.prototype.onClick so that it doesn't call ev.stopPropagation.
 * This ensures the dialog dismisses other open overlays e.g. ULS (See T295796 for more
 * information).
 *
 * @inheritDoc
 */
mw.echo.ui.BadgeLinkWidget.prototype.onClick = function ( ev ) {
	ev.preventDefault();
	this.emit( 'click' );
};

/**
 * @param {boolean} hasUnseen
 */
mw.echo.ui.BadgeLinkWidget.prototype.setHasUnseen = function ( hasUnseen ) {
	this.$badge
		.toggleClass( 'mw-echo-unseen-notifications', hasUnseen );
};

/**
 * Set the count labels for this button.
 *
 * @param {number} numItems Number of items
 * @param {string} [convertedNumber] Label of the button. Defaults to the default message
 *  showing the item number.
 */
mw.echo.ui.BadgeLinkWidget.prototype.setCount = function ( numItems, convertedNumber ) {
	convertedNumber = convertedNumber !== undefined ? convertedNumber : numItems;

	this.$badge
		.toggleClass( 'mw-echo-notifications-badge-all-read', !numItems )
		.toggleClass( 'mw-echo-notifications-badge-long-label', convertedNumber.length > 2 )
		.attr( 'data-counter-num', numItems )
		.attr( 'data-counter-text', convertedNumber );

	this.setLabel( mw.msg(
		this.type === 'alert' ?
			'echo-notification-alert' :
			'echo-notification-notice',
		convertedNumber
	) );

	if ( this.count !== numItems ) {
		this.count = numItems;

		// Fire badge count change hook
		mw.hook( 'ext.echo.badge.countChange' ).fire( this.type, this.count, convertedNumber );
	}
};
