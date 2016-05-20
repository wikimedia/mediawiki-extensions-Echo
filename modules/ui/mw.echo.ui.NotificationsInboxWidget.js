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

		// Notifications list
		this.datedListWidget = new mw.echo.ui.DatedNotificationsWidget(
			this.controller,
			this.manager,
			{
				$overlay: this.$overlay
			}
		);

		// Pagination
		// TODO: Separate the pagination controls and labels to
		// its own widget
		// Top
		this.topPaginationLabel = new OO.ui.LabelWidget();
		this.topPaginationStart = new OO.ui.ButtonWidget( {
			label: mw.msg( 'notification-timestamp-today' ),
			data: 'start'
		} );
		this.topPaginationButtons = this.createPaginationButtons();

		// Bottom
		this.bottomPaginationLabel = new OO.ui.LabelWidget();
		this.bottomPaginationStart = new OO.ui.ButtonWidget( {
			label: mw.msg( 'notification-timestamp-today' ),
			data: 'start'
		} );
		this.bottomPaginationButtons = this.createPaginationButtons();

		// Filter by read state
		this.readStateSelectWidget = new mw.echo.ui.ReadStateButtonSelectWidget();

		// Events
		this.topPaginationButtons.connect( this, { choose: 'onPaginationChoose' } );
		this.bottomPaginationButtons.connect( this, { choose: 'onPaginationChoose' } );
		this.topPaginationStart.connect( this, { click: 'onPaginationStart' } );
		this.bottomPaginationStart.connect( this, { click: 'onPaginationStart' } );
		this.readStateSelectWidget.connect( this, { filter: 'onReadStateFilter' } );
		this.manager.connect( this, { update: 'updatePaginationLabel' } );
		this.manager.getFiltersModel().connect( this, { update: 'updateReadStateSelectWidget' } );

		this.disablePagination();
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
									.append( this.readStateSelectWidget.$element ),
								$( '<div>' )
									.addClass( 'mw-echo-ui-notificationsInboxWidget-toolbar-top-placeholder' ),
								$( '<div>' )
									.addClass( 'mw-echo-ui-notificationsInboxWidget-toolbar-pagination-label' )
									.append( this.topPaginationLabel.$element ),
								$( '<div>' )
									.addClass( 'mw-echo-ui-notificationsInboxWidget-toolbar-pagination-start' )
									.append( this.topPaginationStart.$element ),
								$( '<div>' )
									.addClass( 'mw-echo-ui-notificationsInboxWidget-toolbar-pagination-buttons' )
									.append( this.topPaginationButtons.$element )
							)
					),
				this.datedListWidget.$element,
				$( '<div>' )
					.addClass( 'mw-echo-ui-notificationsInboxWidget-toolbar-bottom' )
					.append(
						$( '<div>' )
							.addClass( 'mw-echo-ui-notificationsInboxWidget-toolbar-row' )
							.append(
								$( '<div>' )
									.addClass( 'mw-echo-ui-notificationsInboxWidget-toolbar-pagination-label' )
									.append( this.bottomPaginationLabel.$element ),
								$( '<div>' )
									.addClass( 'mw-echo-ui-notificationsInboxWidget-toolbar-pagination-start' )
									.append( this.bottomPaginationStart.$element ),
								$( '<div>' )
									.addClass( 'mw-echo-ui-notificationsInboxWidget-toolbar-pagination-buttons' )
									.append( this.bottomPaginationButtons.$element )
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
	 * Respond to pagination start button click event
	 */
	mw.echo.ui.NotificationsInboxWidget.prototype.onPaginationStart = function () {
		this.populateNotifications( 'start' );
	};

	/**
	 * Respond to pagination choose event
	 *
	 * @param {OO.ui.ButtonOptionWidget} item Chosen item
	 */
	mw.echo.ui.NotificationsInboxWidget.prototype.onPaginationChoose = function ( item ) {
		var direction = item && item.getData();

		if ( direction ) {
			this.populateNotifications( direction );
			item.setSelected( false );
		}
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
	 * Create a set of pagination buttons
	 *
	 * @return {OO.ui.ButtonSelectWidget} Pagination button select widget
	 */
	mw.echo.ui.NotificationsInboxWidget.prototype.createPaginationButtons = function () {
		return new OO.ui.ButtonSelectWidget( {
			classes: [ 'mw-echo-ui-notificationsInboxWidget-pagination' ],
			items: [
				new OO.ui.ButtonOptionWidget( {
					icon: 'previous',
					data: 'prev'
				} ),
				new OO.ui.ButtonOptionWidget( {
					icon: 'next',
					data: 'next'
				} )
			]
		} );
	};

	/**
	 * Toggle the pagination. If false, the pagination buttons will be
	 * enabled depending on whether they are a valid action.
	 *
	 * @param {boolean} [isDisabled=true] Pagination is disabled
	 */
	mw.echo.ui.NotificationsInboxWidget.prototype.disablePagination = function ( isDisabled ) {
		var pagination = this.manager.getPaginationModel();
		isDisabled = isDisabled === undefined ? true : isDisabled;

		this.topPaginationButtons.getItemFromData( 'prev' ).setDisabled( isDisabled || !pagination.hasPrevPage() );
		this.topPaginationButtons.getItemFromData( 'next' ).setDisabled( isDisabled || !pagination.hasNextPage() );
		this.bottomPaginationButtons.getItemFromData( 'prev' ).setDisabled( isDisabled || !pagination.hasPrevPage() );
		this.bottomPaginationButtons.getItemFromData( 'next' ).setDisabled( isDisabled || !pagination.hasNextPage() );

		this.topPaginationStart.toggle( !isDisabled && pagination.getCurrPageIndex() >= 2 );
		this.bottomPaginationStart.toggle( !isDisabled && pagination.getCurrPageIndex() >= 2 );

		this.topPaginationLabel.toggle( !isDisabled );
		this.bottomPaginationLabel.toggle( !isDisabled );

		this.readStateSelectWidget.setDisabled( isDisabled );
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
		this.disablePagination();
		return fetchPromise
			// Re-enable pagination
			.then( this.disablePagination.bind( this, false ) )
			// Pop pending
			.always( this.popPending.bind( this ) );
	};

	/**
	 * Update the pagination label according to the page number, the amount of notifications
	 * per page, and the amount of notifications on the current page.
	 */
	mw.echo.ui.NotificationsInboxWidget.prototype.updatePaginationLabel = function () {
		var firstNotifNum = ( this.manager.getPaginationModel().getCurrPageIndex() * this.limit ),
			lastNotifNum = firstNotifNum + this.datedListWidget.getAllNotificationCount(),
			label = ( firstNotifNum + 1 ) + ' - ' + lastNotifNum;

		// Display the range
		this.topPaginationLabel.setLabel( label );
		this.bottomPaginationLabel.setLabel( label );
	};
} )( jQuery, mediaWiki );
