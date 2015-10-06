( function ( mw, $ ) {
	/**
	 * Notification badge button widget for echo popup.
	 *
	 * @class
	 * @extends OO.ui.ButtonWidget
	 *
	 * @constructor
	 * @param {Object} [config] Configuration object
	 * @cfg {string} [type='alert'] Notification type 'alert' or 'message'
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
	 */
	mw.echo.ui.NotificationBadgeWidget = function MwEchoUiNotificationBadgeButtonPopupWidget( config ) {
		var buttonFlags, allNotificationsButton, preferencesButton, footerButtonGroupWidget, $footer;

		config = config || {};
		config.links = config.links || {};

		// Parent constructor
		mw.echo.ui.NotificationBadgeWidget.parent.call( this, config );

		// Mixin constructors
		OO.ui.mixin.PendingElement.call( this, config );

		this.type = config.type || 'alert';
		this.numItems = config.numItems || 0;
		this.markReadWhenSeen = !!config.markReadWhenSeen;
		this.badgeIcon = config.badgeIcon || {};
		this.hasRunFirstTime = false;
		this.currentUnreadCountInBadge = 0;

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

		// View model
		this.notificationsModel = new mw.echo.dm.NotificationsModel( {
			type: this.type,
			limit: 25,
			userLang: mw.config.get( 'wgUserLanguage' ),
			apiData: mw.echo.apiCallParams
		} );

		// Notifications widget
		this.notificationsWidget = new mw.echo.ui.NotificationsWidget(
			this.notificationsModel,
			{
				type: this.type,
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
			items: [ allNotificationsButton, preferencesButton ]
		} );
		$footer = $( '<div>' )
			.addClass( 'mw-echo-ui-notificationBadgeButtonPopupWidget-footer' )
			.append( footerButtonGroupWidget.$element );

		this.popup = new OO.ui.PopupWidget( {
			$content: this.notificationsWidget.$element,
			$footer: $footer,
			width: config.popupWidth || 450,
			autoClose: true,
			$autoCloseIgnore: this.$element,
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
			add: 'updateBadge',
			unseenChange: 'updateBadge',
			unreadChange: 'updateBadge'
		} );
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

	/* Methods */

	/**
	 * Respond to badge button click
	 */
	mw.echo.ui.NotificationBadgeWidget.prototype.onBadgeButtonClick = function () {
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

	/**
	 * Update the badge state and label based on changes to the model
	 */
	mw.echo.ui.NotificationBadgeWidget.prototype.updateBadge = function () {
		var unseenCount = this.notificationsModel.getUnseenCount(),
			unreadCount = this.notificationsModel.getUnreadCount();

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
		if ( !this.markReadWhenSeen || !this.popup.isVisible() || unreadCount < this.currentUnreadCountInBadge ) {
			this.badgeButton.setLabel( mw.language.convertNumber( unreadCount ) );
		}

		// Check if we need to display the 'mark all unread' button
		this.markAllReadButton.toggle( !this.markReadWhenSeen && !!unreadCount );
		this.currentUnreadCountInBadge = unreadCount;
	};

	/**
	 * Respond to 'mark all as read' button click
	 */
	mw.echo.ui.NotificationBadgeWidget.prototype.onMarkAllReadButtonClick = function () {
		this.notificationsModel.markAllRead();
	};

	/**
	 * Populate notifications from the API.
	 *
	 * @param {jQuery.Promise} [fetchingApiRequest] An existing promise for fetching
	 *  notifications from the API. This allows us to start fetching notifications
	 *  externally.
	 * @return {jQuery.Promise} Promise that is resolved when the notifications populate
	 */
	mw.echo.ui.NotificationBadgeWidget.prototype.populateNotifications = function ( fetchingApiRequest ) {
		var widget = this;

		// The model retrieves the ongoing promise or returns the existing one that it
		// has. When the promise is completed successfuly, it nullifies itself so we can
		// request for it to be rebuilt and the request to the API resent.
		// However, in the case of an API failure, the promise does not nullify itself.
		// In that case we also want the model to rebuild the request, so in this condition
		// we must check both cases.
		if ( !this.notificationsModel.isFetchingNotifications() || this.notificationsModel.isFetchingErrorState() ) {
			this.pushPending();
			this.markAllReadButton.toggle( false );
			return this.notificationsModel.fetchNotifications( fetchingApiRequest )
				.then( function ( idArray ) {
					// Clip again
					widget.popup.clip();

					// Log impressions
					mw.echo.logger.logNotificationImpressions( this.type, idArray, mw.echo.Logger.static.context.popup );
				} )
				.then(
					// Success
					function () {
						// Display the message only if there are no notifications
						if ( widget.notificationsModel.isEmpty() ) {
							widget.notificationsWidget.resetLoadingOption( mw.msg( 'echo-notification-placeholder' ) );
						}
					},
					// Fail
					function ( errCode ) {
						// Display the message only if there are no notifications
						if ( widget.notificationsModel.isEmpty() ) {
							widget.notificationsWidget.resetLoadingOption( mw.msg( 'echo-api-failure', errCode ) );
						}
					}
				)
				.always( function () {
					// Pop pending
					widget.popPending();
					// Nullify the promise; let the user fetch again
					widget.fetchNotificationsPromise = null;
				} );
		} else {
			return this.notificationsModel.getFetchNotificationPromise();
		}
	};

	/**
	 * Extend the response to button click so we can also update the notification list.
	 */
	mw.echo.ui.NotificationBadgeWidget.prototype.onPopupToggle = function ( isVisible ) {
		var widget = this;

		if ( !isVisible ) {
			// If the popup is closing, remove "initiallyUnseen" and leave
			this.notificationsWidget.resetNotificationItems();
			return;
		}

		// Log the click event
		mw.echo.logger.logInteraction(
			'ui-badge-link-click',
			mw.echo.Logger.static.context,
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
		// Always populate on popup open. The model and widget should handle
		// the case where the promise is already underway.
		this.populateNotifications()
			.then( function () {
				var i,
					items = widget.notificationsWidget.getItems();

				if ( widget.popup.isVisible() ) {
					// Update seen time
					widget.notificationsModel.updateSeenTime();
					// Mark notifications as 'read' if markReadWhenSeen is set to true
					if ( widget.markReadWhenSeen ) {
						widget.notificationsModel.markAllRead();
					}

					// Log impressions
					for ( i = 0; i < items.length; i++ ) {
						mw.echo.logger.logInteraction(
							mw.echo.Logger.static.actions.notificationImpression,
							'flyout',
							widget.getModel().getId(),
							items[ i ].getModel().getCategory()
						);
					}
				}
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
