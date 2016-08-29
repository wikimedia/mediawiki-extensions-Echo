( function ( mw, $ ) {
	/**
	 * Notification badge button widget for echo popup.
	 *
	 * @class
	 * @extends OO.ui.ButtonWidget
	 *
	 * @constructor
	 * @param {mw.echo.Controller} controller Echo notifications controller
	 * @param {mw.echo.dm.ModelManager} manager Model manager
	 * @param {Object} [config] Configuration object
	 * @cfg {string|string[]} [type='message'] The type or array of types of
	 *  notifications that are in this model. They can be 'alert', 'message' or
	 *  an array of both. Defaults to 'message'
	 * @cfg {number} [numItems=0] The number of items that are in the button display
	 * @cfg {string} [badgeLabel=0] The initial label for the badge. This is the
	 *  formatted version of the number of items in the badge.
	 * @cfg {boolean} [hasUnseen=false] Whether there are unseen items
	 * @cfg {number} [popupWidth=450] The width of the popup
	 * @cfg {string} [badgeIcon] Icon to use for the popup header
	 * @cfg {string} [href] URL the badge links to
	 * @cfg {jQuery} [$overlay] A jQuery element functioning as an overlay
	 *  for popups.
	 */
	mw.echo.ui.NotificationBadgeWidget = function MwEchoUiNotificationBadgeButtonPopupWidget( controller, manager, config ) {
		var buttonFlags, allNotificationsButton, preferencesButton, footerButtonGroupWidget, $footer,
			notice, adjustedTypeString;

		config = config || {};
		config.links = config.links || {};

		// Parent constructor
		mw.echo.ui.NotificationBadgeWidget.parent.call( this, config );

		// Mixin constructors
		OO.ui.mixin.PendingElement.call( this, config );

		this.$overlay = config.$overlay || this.$element;
		// Create a menu overlay
		this.$menuOverlay = $( '<div>' )
			.addClass( 'mw-echo-ui-NotificationBadgeWidget-overlay-menu' );
		this.$overlay.append( this.$menuOverlay );

		// Controller
		this.controller = controller;
		this.manager = manager;

		adjustedTypeString = this.controller.getTypeString() === 'message' ? 'notice' : this.controller.getTypeString();

		// Properties
		this.types = this.manager.getTypes();

		this.maxNotificationCount = mw.config.get( 'wgEchoMaxNotificationCount' );
		this.numItems = config.numItems || 0;
		this.badgeLabel = config.badgeLabel || this.numItems;
		this.hasRunFirstTime = false;

		buttonFlags = [];
		if ( !!config.hasUnseen ) {
			buttonFlags.push( 'unseen' );
		}

		this.badgeButton = new mw.echo.ui.BadgeLinkWidget( {
			label: this.badgeLabel,
			numItems: this.numItems,
			flags: buttonFlags,
			// The following messages can be used here:
			// tooltip-pt-notifications-alert
			// tooltip-pt-notifications-notice
			title: mw.msg( 'tooltip-pt-notifications-' + adjustedTypeString ),
			href: config.href
		} );

		// Notifications list widget
		this.notificationsWidget = new mw.echo.ui.NotificationsListWidget(
			this.controller,
			this.manager,
			{
				type: this.types,
				$overlay: this.$menuOverlay,
				animated: true
			}
		);

		// Footer
		allNotificationsButton = new OO.ui.ButtonWidget( {
			icon: 'next',
			label: mw.msg( 'echo-overlay-link' ),
			href: config.links.notifications,
			classes: [ 'mw-echo-ui-notificationBadgeButtonPopupWidget-footer-allnotifs' ]
		} );

		preferencesButton = new OO.ui.ButtonWidget( {
			icon: 'advanced',
			label: mw.msg( 'mypreferences' ),
			href: config.links.preferences,
			classes: [ 'mw-echo-ui-notificationBadgeButtonPopupWidget-footer-preferences' ]
		} );

		footerButtonGroupWidget = new OO.ui.ButtonGroupWidget( {
			items: [ allNotificationsButton, preferencesButton ],
			classes: [ 'mw-echo-ui-notificationBadgeButtonPopupWidget-footer-buttons' ]
		} );
		$footer = $( '<div>' )
			.addClass( 'mw-echo-ui-notificationBadgeButtonPopupWidget-footer' )
			.append( footerButtonGroupWidget.$element );

		// Footer notice
		if (
			mw.config.get( 'wgEchoShowSpecialPageInvitation' ) &&
			!mw.user.options.get( 'echo-dismiss-special-page-invitation' )
		) {
			notice = new mw.echo.ui.FooterNoticeWidget( {
				// This is probably not the right way of doing this
				iconUrl: mw.config.get( 'wgExtensionAssetsPath' ) + '/Echo/modules/icons/feedback.svg',
				message: mw.message(
					'echo-popup-footer-special-page-invitation',
						// Text
						mw.msg( 'echo-popup-footer-special-page-invitation-link' ),
						// Link
						mw.util.getUrl( 'Special:Notifications' )
					).parse()
			} );
			// Event
			notice.connect( this, { dismiss: 'onFooterNoticeDismiss' } );
			// Prepend to the footer
			$footer.prepend( notice.$element );
		}

		this.popup = new OO.ui.PopupWidget( {
			$content: this.notificationsWidget.$element,
			$footer: $footer,
			width: config.popupWidth || 500,
			autoClose: true,
			containerPadding: 20,
			// Also ignore clicks from the nested action menu items, that
			// actually exist in the overlay
			$autoCloseIgnore: this.$element.add( this.$menuOverlay ),
			head: true,
			// The following messages can be used here:
			// echo-notification-alert-text-only
			// echo-notification-notice-text-only
			label: mw.msg(
				'echo-notification-' + adjustedTypeString +
				'-text-only'
			),
			classes: [ 'mw-echo-ui-notificationBadgeButtonPopupWidget-popup' ]
		} );
		// HACK: Add an icon to the popup head label
		this.popupHeadIcon = new OO.ui.IconWidget( { icon: config.badgeIcon } );
		this.popup.$head.prepend( this.popupHeadIcon.$element );

		this.setPendingElement( this.popup.$head );

		// Mark all as read button
		this.markAllReadButton = new OO.ui.ButtonWidget( {
			framed: false,
			label: mw.msg( 'echo-mark-all-as-read' ),
			classes: [ 'mw-echo-ui-notificationsWidget-markAllReadButton' ]
		} );

		// Hide the close button
		this.popup.closeButton.toggle( false );
		// Add the 'mark all as read' button to the header
		this.popup.$head.append( this.markAllReadButton.$element );
		this.markAllReadButton.toggle( false );

		// Events
		this.markAllReadButton.connect( this, { click: 'onMarkAllReadButtonClick' } );
		this.manager.connect( this, {
			update: 'updateBadge'
		} );
		this.manager.getSeenTimeModel().connect( this, { update: 'onSeenTimeModelUpdate' } );
		this.manager.getUnreadCounter().connect( this, { countChange: 'updateBadge' } );
		this.popup.connect( this, { toggle: 'onPopupToggle' } );
		this.badgeButton.connect( this, {
			click: 'onBadgeButtonClick'
		} );

		this.$element
			.prop( 'id', 'pt-notifications-' + adjustedTypeString )
			// The following classes can be used here:
			// mw-echo-ui-notificationBadgeButtonPopupWidget-alert
			// mw-echo-ui-notificationBadgeButtonPopupWidget-message
			.addClass(
				'mw-echo-ui-notificationBadgeButtonPopupWidget ' +
				'mw-echo-ui-notificationBadgeButtonPopupWidget-' + adjustedTypeString
			)
			.append(
				this.badgeButton.$element,
				this.popup.$element
			);
	};

	/* Initialization */

	OO.inheritClass( mw.echo.ui.NotificationBadgeWidget, OO.ui.Widget );
	OO.mixinClass( mw.echo.ui.NotificationBadgeWidget, OO.ui.mixin.PendingElement );

	/* Static properties */

	mw.echo.ui.NotificationBadgeWidget.static.tagName = 'li';

	/* Events */

	/**
	 * @event allRead
	 * All notifications were marked as read
	 */

	/**
	 * @event finishLoading
	 * Notifications have successfully finished being processed and are fully loaded
	 */

	/* Methods */

	mw.echo.ui.NotificationBadgeWidget.prototype.onFooterNoticeDismiss = function () {
		// Clip again to recalculate height
		this.popup.clip();

		// Save the preference in general
		new mw.Api().saveOption( 'echo-dismiss-special-page-invitation', 1 );
		// Save the preference for this session
		mw.user.options.set( 'echo-dismiss-special-page-invitation', 1 );
	};

	/**
	 * Respond to badge button click
	 */
	mw.echo.ui.NotificationBadgeWidget.prototype.onBadgeButtonClick = function () {
		this.popup.toggle();
	};

	// Client-side version of NotificationController::getCappedNotificationCount.
	/**
	 * Gets the count to use for display
	 *
	 * @param {number} count Count before cap is applied
	 *
	 * @return {number} Count with cap applied
	 */
	mw.echo.ui.NotificationBadgeWidget.prototype.getCappedNotificationCount = function ( count ) {
		if ( count <= this.maxNotificationCount ) {
			return count;
		} else {
			return this.maxNotificationCount + 1;
		}
	};

	/**
	 * Respond to SeenTime model update event
	 */
	mw.echo.ui.NotificationBadgeWidget.prototype.onSeenTimeModelUpdate = function () {
		this.updateBadgeSeenState( this.manager.hasUnseenInSource( 'local' ) );
	};

	/**
	 * Update the badge style to match whether it contains unseen notifications.
	 *
	 * @param {boolean} hasUnseen There are unseen notifications
	 */
	mw.echo.ui.NotificationBadgeWidget.prototype.updateBadgeSeenState = function ( hasUnseen ) {
		hasUnseen = hasUnseen === undefined ? this.manager.hasUnseenInSource( 'local' ) : !!hasUnseen;

		this.badgeButton.setFlags( { unseen: !!hasUnseen } );
	};

	/**
	 * Update the badge state and label based on changes to the model
	 */
	mw.echo.ui.NotificationBadgeWidget.prototype.updateBadge = function () {
		var unreadCount, cappedUnreadCount, badgeLabel;

		unreadCount = this.manager.getUnreadCounter().getCount();
		cappedUnreadCount = this.getCappedNotificationCount( unreadCount );
		cappedUnreadCount = mw.language.convertNumber( cappedUnreadCount );
		badgeLabel = mw.message( 'echo-badge-count', cappedUnreadCount ).text();

		this.badgeButton.setLabel( badgeLabel );
		this.badgeButton.setCount( unreadCount, badgeLabel );
		// Update seen state only if the counter is 0
		// so we don't run into inconsistencies and have an unseen state
		// for the badge with 0 unread notifications
		if ( unreadCount === 0 ) {
			this.updateBadgeSeenState( false );
		}

		// Check if we need to display the 'mark all unread' button
		this.markAllReadButton.toggle( this.manager.hasLocalUnread() );
	};

	/**
	 * Respond to 'mark all as read' button click
	 */
	mw.echo.ui.NotificationBadgeWidget.prototype.onMarkAllReadButtonClick = function () {
		// Log the click action
		mw.echo.logger.logInteraction(
			mw.echo.Logger.static.actions.markAllReadClick,
			mw.echo.Logger.static.context.popup,
			null, // Event id isn't relevant
			this.manager.getTypeString() // The type of the list
		);

		this.controller.markLocalNotificationsRead();
	};

	/**
	 * Extend the response to button click so we can also update the notification list.
	 *
	 * @fires finishLoading
	 */
	mw.echo.ui.NotificationBadgeWidget.prototype.onPopupToggle = function ( isVisible ) {
		var widget = this;

		if ( this.promiseRunning ) {
			return;
		}

		if ( !isVisible ) {
			widget.notificationsWidget.resetInitiallyUnseenItems();
			return;
		}

		// Log the click event
		mw.echo.logger.logInteraction(
			'ui-badge-link-click',
			mw.echo.Logger.static.context.badge,
			null,
			this.controller.getTypeString()
		);

		if ( this.hasRunFirstTime ) {
			// HACK: Clippable doesn't resize the clippable area when
			// it calculates the new size. Since the popup contents changed
			// and the popup is "empty" now, we need to manually set its
			// size to 1px so the clip calculations will resize it properly.
			// See bug report: https://phabricator.wikimedia.org/T110759
			this.popup.$clippable.css( 'height', '1px' );
			this.popup.clip();
		}

		this.pushPending();
		this.markAllReadButton.toggle( false );
		this.promiseRunning = true;

		// Always populate on popup open. The model and widget should handle
		// the case where the promise is already underway.
		this.controller.fetchLocalNotifications( this.hasRunFirstTime )
			.then(
				// Success
				function () {
					if ( widget.popup.isVisible() ) {
						widget.popup.clip();
						// Update seen time
						return widget.controller.updateLocalSeenTime();
					}
				},
				// Failure
				function ( errorObj ) {
					if ( errorObj.errCode === 'notlogin-required' ) {
						// Login required message
						widget.notificationsWidget.resetLoadingOption( mw.msg( 'echo-notification-loginrequired' ) );
					} else {
						// Generic API failure message
						widget.notificationsWidget.resetLoadingOption( mw.msg( 'echo-api-failure' ) );
					}
				}
			)
			.then( this.emit.bind( this, 'finishLoading' ) )
			.always( function () {
				// Pop pending
				widget.popPending();
				widget.promiseRunning = false;
			} );
		this.hasRunFirstTime = true;
	};
} )( mediaWiki, jQuery );
