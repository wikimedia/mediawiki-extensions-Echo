( function ( mw, $ ) {
	/**
	 * Notification badge button widget for echo popup.
	 *
	 * @class
	 * @extends OO.ui.ButtonWidget
	 *
	 * @constructor
	 * @param {mw.echo.dm.NotificationsModel} model Notifications view model
	 * @param {mw.echo.dm.UnreadNotificationCounter} unreadCounter Counter of unread notifications
 	 * @param {Object} [config] Configuration object
	 * @cfg {number} [numItems=0] How many items are in the button display
	 * @cfg {boolean} [hasUnseen=false] Whether there are unseen items
	 * @cfg {boolean} [markReadWhenSeen=false] Mark all notifications as read on open
	 * @cfg {number} [popupWidth=450] The width of the popup
	 * @cfg {string|Object} [badgeIcon] The icons to use for this button.
	 *  If this is a string, it will be used as the icon regardless of the state.
	 *  If it is an object, it must include
	 *  the properties 'unseen' and 'seen' with icons attached to both. For example:
	 *  { badgeIcon: {
	 *    unseen: 'bellOn',
	 *    seen: 'bell'
	 *  } }
	 * @cfg {string} [href] URL the badge links to
	 * @cfg {jQuery} [$overlay] A jQuery element functioning as an overlay
	 *  for popups.
	 */
	mw.echo.ui.NotificationBadgeWidget = function MwEchoUiNotificationBadgeButtonPopupWidget( model, unreadCounter, config ) {
		var buttonFlags, allNotificationsButton, preferencesButton, footerButtonGroupWidget, $footer,
			initialNotifCount, notice;

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

		// View model
		this.notificationsModel = model;
		this.unreadCounter = unreadCounter;
		this.type = this.notificationsModel.getType();

		this.maxNotificationCount = mw.config.get( 'wgEchoMaxNotificationCount' );
		this.numItems = config.numItems || 0;
		this.markReadWhenSeen = !!config.markReadWhenSeen;
		this.badgeIcon = config.badgeIcon || {};
		this.hasRunFirstTime = false;

		buttonFlags = [ 'primary' ];
		if ( !!config.hasUnseen ) {
			buttonFlags.push( 'unseen' );
		}

		this.badgeButton = new mw.echo.ui.BadgeLinkWidget( {
			label: this.numItems,
			flags: buttonFlags,
			badgeIcon: config.badgeIcon,
			// The following messages can be used here:
			// tooltip-pt-notifications-alert
			// tooltip-pt-notifications-message
			title: mw.msg( 'tooltip-pt-notifications-' + this.type ),
			href: config.href
		} );

		// Notifications widget
		this.notificationsWidget = new mw.echo.ui.NotificationsWidget(
			this.notificationsModel,
			{
				type: this.type,
				$overlay: this.$menuOverlay,
				markReadWhenSeen: this.markReadWhenSeen
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
		initialNotifCount = mw.config.get( 'wgEchoInitialNotifCount' );
		initialNotifCount = this.type === 'all' ? ( initialNotifCount.alert + initialNotifCount.message ) : initialNotifCount[ this.type ];
		if (
			mw.config.get( 'wgEchoShowBetaInvitation' ) &&
			!mw.user.options.get( 'echo-dismiss-beta-invitation' )
		) {
			notice = new mw.echo.ui.FooterNoticeWidget( {
				// This is probably not the right way of doing this
				iconUrl: mw.config.get( 'wgExtensionAssetsPath' ) + '/Echo/modules/icons/feedback.svg',
				url: mw.util.getUrl( 'Special:Preferences' ) + '#mw-prefsection-betafeatures'
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
			// Also ignore clicks from the nested action menu items, that
			// actually exist in the overlay
			$autoCloseIgnore: this.$element.add( this.$menuOverlay ),
			head: true,
			// The following messages can be used here:
			// echo-notification-alert-text-only
			// echo-notification-message-text-only
			label: mw.msg( 'echo-notification-' + this.type + '-text-only' ),
			classes: [ 'mw-echo-ui-notificationBadgeButtonPopupWidget-popup' ]
		} );
		// HACK: Add an icon to the popup head label
		this.popupHeadIcon = new OO.ui.IconWidget();
		this.popup.$head.prepend( this.popupHeadIcon.$element );

		this.setPendingElement( this.popup.$head );
		this.updateIcon( !!config.hasUnseen );

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
		this.notificationsModel.connect( this, {
			updateSeenTime: 'updateBadge',
			unseenChange: 'updateBadge'
		} );
		this.unreadCounter.connect( this, { countChange: 'updateBadge' } );
		this.popup.connect( this, { toggle: 'onPopupToggle' } );
		this.badgeButton.connect( this, {
			click: 'onBadgeButtonClick'
		} );

		this.$element
			.prop( 'id', 'pt-notifications-' + this.type )
			// The following classes can be used here:
			// mw-echo-ui-notificationBadgeButtonPopupWidget-alert
			// mw-echo-ui-notificationBadgeButtonPopupWidget-message
			.addClass(
				'mw-echo-ui-notificationBadgeButtonPopupWidget ' +
				'mw-echo-ui-notificationBadgeButtonPopupWidget-' + this.type
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
		new mw.Api().saveOption( 'echo-dismiss-beta-invitation', 1 );
		// Save the preference for this session
		mw.user.options.set( 'echo-dismiss-beta-invitation', 1 );
	};

	/**
	 * Respond to badge button click
	 */
	mw.echo.ui.NotificationBadgeWidget.prototype.onBadgeButtonClick = function () {
		if ( !this.popup.isVisible() ) {
			// Force a new API request for notifications
			this.notificationsModel.fetchNotifications( true );
		}

		this.popup.toggle();
	};

	/**
	 * Update the badge icon with the read/unread versions if they exist.
	 *
	 * @param {boolean} hasUnseen Widget has unseen notifications
	 */
	mw.echo.ui.NotificationBadgeWidget.prototype.updateIcon = function ( hasUnseen ) {
		var icon = typeof this.badgeIcon === 'string' ?
			this.badgeIcon :
			this.badgeIcon[ hasUnseen ? 'unseen' : 'seen' ];

		this.badgeButton.setIcon( icon );
		this.popupHeadIcon.setIcon( icon );
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
	 * Update the badge state and label based on changes to the model
	 */
	mw.echo.ui.NotificationBadgeWidget.prototype.updateBadge = function () {
		var unseenCount = this.notificationsModel.getUnseenCount(),
			unreadCount = this.unreadCounter.getCount(),
			nonBundledUnreadCount = this.notificationsModel.getNonbundledUnreadCount(),
			cappedUnreadCount,
			badgeLabel;

		// Update numbers and seen/unseen state
		// If the popup is open, only allow a "demotion" of the badge
		// to grey; ignore change of color to 'unseen'
		if ( this.popup.isVisible() ) {
			if ( !unseenCount ) {
				this.badgeButton.setFlags( { unseen: false } );
				this.updateIcon( false );
			}
		} else {
			this.badgeButton.setFlags( { unseen: !!unseenCount } );
			this.updateIcon( !!unseenCount );
		}

		// Update badge count
		cappedUnreadCount = this.getCappedNotificationCount( unreadCount );
		cappedUnreadCount = mw.language.convertNumber( cappedUnreadCount );
		badgeLabel = mw.message( 'echo-badge-count', cappedUnreadCount ).text();
		this.badgeButton.setLabel( badgeLabel );

		// Check if we need to display the 'mark all unread' button
		this.markAllReadButton.toggle( !this.markReadWhenSeen && nonBundledUnreadCount > 0 );
	};

	/**
	 * Respond to 'mark all as read' button click
	 */
	mw.echo.ui.NotificationBadgeWidget.prototype.onMarkAllReadButtonClick = function () {
		this.notificationsModel.markAllRead();
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
			// If the popup is closing, remove "initiallyUnseen" and leave
			this.notificationsWidget.resetNotificationItems();
			return;
		}

		// Log the click event
		mw.echo.logger.logInteraction(
			'ui-badge-link-click',
			mw.echo.Logger.static.context.badge,
			null,
			this.type
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
		this.notificationsModel.fetchNotifications()
			.then( function () {
				if ( widget.popup.isVisible() ) {
					widget.popup.clip();

					// Update seen time
					widget.notificationsModel.updateSeenTime();
					// Mark notifications as 'read' if markReadWhenSeen is set to true
					if ( widget.markReadWhenSeen ) {
						widget.notificationsModel.autoMarkAllRead();
					}
				}

				widget.emit( 'finishLoading' );
			} )
			.always( function () {
				// Pop pending
				widget.popPending();
				widget.promiseRunning = false;
			} );
		this.hasRunFirstTime = true;
	};

	/**
	 * Get the notifications model attached to this widget
	 *
	 * @return {mw.echo.dm.NotificationsModel} Notifications model
	 */
	mw.echo.ui.NotificationBadgeWidget.prototype.getModel = function () {
		return this.notificationsModel;
	};

} )( mediaWiki, jQuery );
