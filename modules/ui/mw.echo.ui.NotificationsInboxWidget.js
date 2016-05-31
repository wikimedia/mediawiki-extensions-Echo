( function ( $, mw ) {
	/**
	 * An inbox-type widget that encompases a dated notifications list with pagination
	 *
	 * @class
	 * @extends OO.ui.Widget
	 * @mixins OO.ui.mixin.PendingElement
	 *
	 * @constructor
	 * @param {mw.echo.Controller} controller Echo controller
	 * @param {mw.echo.dm.ModelManager} manager Model manager
	 * @param {Object} [config] Configuration object
	 * @cfg {number} [limit=25] Limit the number of notifications per page
	 * @cfg {jQuery} [$overlay] An overlay for the popup menus
	 */
	mw.echo.ui.NotificationsInboxWidget = function MwEchoUiNotificationsInboxWidget( controller, manager, config ) {
		config = config || {};

		// Parent
		mw.echo.ui.NotificationsInboxWidget.parent.call( this, config );
		// Mixin constructors
		OO.ui.mixin.PendingElement.call( this, config );

		this.controller = controller;
		this.manager = manager;

		this.$overlay = config.$overlay || this.$element;
		this.limit = config.limit || 25;

		// A notice or error message widget
		this.noticeMessageWidget = new OO.ui.LabelWidget( {
			classes: [ 'mw-echo-ui-notificationsInboxWidget-notice' ]
		} );

		// Notifications list
		this.datedListWidget = new mw.echo.ui.DatedNotificationsWidget(
			this.controller,
			this.manager,
			{
				$overlay: this.$overlay
			}
		);
		this.setPendingElement( this.datedListWidget.$element );

		// Pagination
		this.topPaginationWidget = new mw.echo.ui.PaginationWidget(
			this.manager.getPaginationModel(),
			{
				itemsPerPage: this.limit
			}
		);
		this.bottomPaginationWidget = new mw.echo.ui.PaginationWidget(
			this.manager.getPaginationModel(),
			{
				itemsPerPage: this.limit
			}
		);

		// Filter by read state
		this.readStateSelectWidget = new mw.echo.ui.ReadStateButtonSelectWidget();

		// Events
		this.readStateSelectWidget.connect( this, { filter: 'onReadStateFilter' } );
		this.manager.getFiltersModel().connect( this, { update: 'updateReadStateSelectWidget' } );
		this.topPaginationWidget.connect( this, { change: 'populateNotifications' } );
		this.bottomPaginationWidget.connect( this, { change: 'populateNotifications' } );

		this.topPaginationWidget.setDisabled( true );
		this.bottomPaginationWidget.setDisabled( true );

		// Initialization
		this.$element
			.addClass( 'mw-echo-ui-notificationsInboxWidget' )
			.append(
				$( '<div>' )
					.addClass( 'mw-echo-ui-notificationsInboxWidget-toolbar-top' )
					.append(
						$( '<div>' )
							.addClass( 'mw-echo-ui-notificationsInboxWidget-toolbar-row' )
							.append(
								$( '<div>' )
									.addClass( 'mw-echo-ui-notificationsInboxWidget-toolbar-readState' )
									.addClass( 'mw-echo-ui-notificationsInboxWidget-toolbar-cell' )
									.append( this.readStateSelectWidget.$element ),
								$( '<div>' )
									.addClass( 'mw-echo-ui-notificationsInboxWidget-toolbar-top-placeholder' ),
								$( '<div>' )
									.addClass( 'mw-echo-ui-notificationsInboxWidget-toolbar-pagination' )
									.addClass( 'mw-echo-ui-notificationsInboxWidget-toolbar-cell' )
									.append( this.topPaginationWidget.$element )
							)
					),
				this.noticeMessageWidget.$element,
				this.datedListWidget.$element,
				$( '<div>' )
					.addClass( 'mw-echo-ui-notificationsInboxWidget-toolbar-bottom' )
					.append(
						$( '<div>' )
							.addClass( 'mw-echo-ui-notificationsInboxWidget-toolbar-row' )
							.append(
								$( '<div>' )
									.addClass( 'mw-echo-ui-notificationsInboxWidget-toolbar-cell' )
									.append(
										this.bottomPaginationWidget.$element
									)
							)
					)
			);

		this.updateReadStateSelectWidget();
		this.populateNotifications();
	};

	/* Initialization */

	OO.inheritClass( mw.echo.ui.NotificationsInboxWidget, OO.ui.Widget );
	OO.mixinClass( mw.echo.ui.NotificationsInboxWidget, OO.ui.mixin.PendingElement );

	/* Methods */

	/**
	 * Respond to filters update
	 */
	mw.echo.ui.NotificationsInboxWidget.prototype.updateReadStateSelectWidget = function () {
		this.readStateSelectWidget
			.getItemFromData( this.manager.getFiltersModel().getReadState() )
			.setSelected( true );
	};

	/**
	 * Respond to read state filter event
	 *
	 * @param {string} readState Read state 'all', 'read' or 'unread'
	 */
	mw.echo.ui.NotificationsInboxWidget.prototype.onReadStateFilter = function ( readState ) {
		this.controller.setFilter( 'readState', readState );
		this.populateNotifications();
	};

	/**
	 * Populate the notifications list
	 *
	 * @param {string} [direction] Direction to fetch from. 'prev' for previous page
	 *  or 'next' for the next page. If not given, the first page of results will be fetched.
	 * @return {jQuery.Promise} A promise that is resolved when the results
	 *  have been fetched.
	 */
	mw.echo.ui.NotificationsInboxWidget.prototype.populateNotifications = function ( direction ) {
		var fetchPromise;

		if ( direction === 'prev' ) {
			fetchPromise = this.controller.fetchPrevPageByDate();
		} else if ( direction === 'next' ) {
			fetchPromise = this.controller.fetchNextPageByDate();
		} else {
			fetchPromise = this.controller.fetchFirstPageByDate();
		}

		this.pushPending();
		return fetchPromise
			// Pop pending
			.always( this.popPending.bind( this ) );
	};

	/**
	 * Extend the pushPending method to disable UI elements
	 */
	mw.echo.ui.NotificationsInboxWidget.prototype.pushPending = function () {
		this.noticeMessageWidget.toggle( false );
		this.readStateSelectWidget.setDisabled( true );
		this.topPaginationWidget.setDisabled( true );
		this.bottomPaginationWidget.setDisabled( true );

		// Mixin method
		OO.ui.mixin.PendingElement.prototype.pushPending.call( this );
	};

	/**
	 * Extend the popPending method to enable UI elements
	 */
	mw.echo.ui.NotificationsInboxWidget.prototype.popPending = function () {
		this.resetMessageLabel();
		this.readStateSelectWidget.setDisabled( false );
		this.topPaginationWidget.setDisabled( false );
		this.bottomPaginationWidget.setDisabled( false );

		// Mixin method
		OO.ui.mixin.PendingElement.prototype.popPending.call( this );
	};

	/**
	 * Reset the the text of the error message that displays in place of the list
	 * in case the list is empty.
	 */
	mw.echo.ui.NotificationsInboxWidget.prototype.resetMessageLabel = function () {
		var label,
			count = this.manager.getAllNotificationCount();

		if ( count === 0 ) {
			label = this.manager.getFiltersModel().getReadState() === 'all' ?
				mw.msg( 'echo-notification-placeholder' ) :
				mw.msg( 'echo-notification-placeholder-filters' );

			this.noticeMessageWidget.setLabel( label );
		}

		this.displayMessage( count === 0 );
	};

	/**
	 * Display the error/notice message instead of the notifications list or vise versa.
	 *
	 * @private
	 * @param {boolean} displayMessage Display error message
	 */
	mw.echo.ui.NotificationsInboxWidget.prototype.displayMessage = function ( displayMessage ) {
		this.noticeMessageWidget.toggle( displayMessage );
		this.datedListWidget.toggle( !displayMessage );
	};
} )( jQuery, mediaWiki );
