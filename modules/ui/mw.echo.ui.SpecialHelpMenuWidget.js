( function ( $, mw ) {
	/**
	 * Widget for the settings menu in the Special:Notifications page
	 *
	 * @param {mw.echo.dm.ModelManager} manager Model manager
	 * @param {Object} config Configuration object
	 */
	mw.echo.ui.SpecialHelpMenuWidget = function MwEchoUiSpecialHelpMenuWidget( manager, config ) {
		var $menu = $( '<div>' ).addClass( 'mw-echo-ui-specialHelpMenuWidget-menu' );

		config = config || {};

		// Parent constructor
		mw.echo.ui.SpecialHelpMenuWidget.parent.call( this, $.extend( {
			icon: 'advanced',
			indicator: 'down',
			popup: {
				$content: $menu,
				width: 300
			}
		}, config ) );

		// Mixin constructors
		OO.ui.mixin.GroupWidget.call( this, $.extend( {}, config, { $group: $menu } ) );
		OO.ui.mixin.PendingElement.call( this, config );

		this.manager = manager;

		this.markAllReadButton = new OO.ui.ButtonWidget( {
			framed: false,
			icon: 'checkAll',
			label: this.getMarkAllReadButtonLabel()
		} );
		this.setPendingElement( this.$element );
		this.markAllReadButton.toggle( false );

		this.addItems( [ this.markAllReadButton ] );
		if ( config.prefLink ) {
			this.addItems( [
				// Preferences link
				new OO.ui.ButtonWidget( {
					framed: false,
					icon: 'advanced',
					label: mw.msg( 'mypreferences' ),
					href: config.prefLink
				} )
			] );
		}

		if ( config.helpLink ) {
			this.addItems( [
				// Help link
				new OO.ui.ButtonWidget( {
					framed: false,
					icon: 'help',
					label: mw.msg( 'echo-learn-more' ),
					href: config.helpLink
				} )
			] );
		}

		// Events
		this.markAllReadButton.connect( this, { click: 'onMarkAllreadButtonClick' } );
		this.manager.connect( this, {
			localCountChange: 'onLocalCountChange'
		} );
		this.manager.getFiltersModel().getSourcePagesModel().connect( this, { update: 'onSourcePageUpdate' } );

		this.$element
			.addClass( 'mw-echo-ui-specialHelpMenuWidget' );
	};

	/* Initialization */

	OO.inheritClass( mw.echo.ui.SpecialHelpMenuWidget, OO.ui.PopupButtonWidget );
	OO.mixinClass( mw.echo.ui.SpecialHelpMenuWidget, OO.ui.mixin.GroupElement );
	OO.mixinClass( mw.echo.ui.SpecialHelpMenuWidget, OO.ui.mixin.PendingElement );

	/* Events */

	/**
	 * @event markAllRead
	 *
	 * Mark all notifications as read in the selected wiki
	 */

	/* Methods */

	/**
	 * Respond to source page change
	 */
	mw.echo.ui.SpecialHelpMenuWidget.prototype.onSourcePageUpdate = function () {
		this.markAllReadButton.setLabel( this.getMarkAllReadButtonLabel() );

	};

	/**
	 * Respond to local counter update event
	 *
	 * @param {number} count New count
	 */
	mw.echo.ui.SpecialHelpMenuWidget.prototype.onLocalCountChange = function ( count ) {
		this.markAllReadButton.toggle( count > 0 );
	};

	/**
	 * Respond to mark all read button click
	 */
	mw.echo.ui.SpecialHelpMenuWidget.prototype.onMarkAllreadButtonClick = function () {
		// Log this action
		mw.echo.logger.logInteraction(
			mw.echo.Logger.static.actions.markAllReadClick,
			mw.echo.Logger.static.context.archive,
			null, // Notification ID is irrelevant
			this.manager.getTypeString(), // The type of the list in general
			null, // The Logger has logic to decide whether this is mobile or not
			this.manager.getFiltersModel().getSourcePagesModel().getCurrentSource() // Source name
		);

		this.popup.toggle( false );
		this.emit( 'markAllRead' );
	};

	/**
	 * Build the button label
	 *
	 * @return {string} Mark all read button label
	 */
	mw.echo.ui.SpecialHelpMenuWidget.prototype.getMarkAllReadButtonLabel = function () {
		var pageModel = this.manager.getFiltersModel().getSourcePagesModel(),
			source = pageModel.getCurrentSource(),
			sourceTitle = pageModel.getSourceTitle( source );

		return sourceTitle ?
			mw.msg( 'echo-mark-wiki-as-read', sourceTitle ) :
			mw.msg( 'echo-mark-all-as-read' );
	};

	/**
	 * Extend the pushPending method to disable the mark all read button
	 */
	mw.echo.ui.SpecialHelpMenuWidget.prototype.pushPending = function () {
		this.markAllReadButton.setDisabled( true );

		// Mixin method
		OO.ui.mixin.PendingElement.prototype.pushPending.call( this );
	};

	/**
	 * Extend the popPending method to enable the mark all read button
	 */
	mw.echo.ui.SpecialHelpMenuWidget.prototype.popPending = function () {
		this.markAllReadButton.setDisabled( false );

		// Mixin method
		OO.ui.mixin.PendingElement.prototype.popPending.call( this );
	};
}( jQuery, mediaWiki ) );
