( function ( $, mw ) {
	mw.echo = mw.echo || {};

	/**
	 * Echo logger
	 *
	 * @class
	 *
	 * @constructor
	 * @param {Object} [config] Configuration object
	 * @cfg {boolean} [clickThroughEnabled] Whether logging is enabled
	 */
	mw.echo.Logger = function MwEchoUiLogger( config ) {
		config = config || {};

		this.clickThroughEnabled = config.clickThroughEnabled || this.constructor.static.clickThroughEnabled;
		this.notificationsIdCache = [];
		if ( this.clickThroughEnabled ) {
			// This should usually already be loaded, but not always
			this.deferred = mw.loader.using( 'ext.eventLogging', function () {
				mw.eventLog.setDefaults( 'EchoInteraction', {
					version: mw.config.get( 'wgEchoConfig' ).version,
					userId: +mw.config.get( 'wgUserId' ),
					editCount: +mw.config.get( 'wgUserEditCount' )
				} );
			} );
		} else {
			this.deferred = $.Deferred().resolve();
		}
	};

	OO.initClass( mw.echo.Logger );

	/* Static methods */

	/**
	 * Default behavior in MediaWiki for whether logging Echo interactions
	 * is enabled
	 *
	 * @static
	 * @property {[type]}
	 */
	mw.echo.Logger.static.clickThroughEnabled = OO.getProp(
		mw.config.get( 'wgEchoConfig' ),
		'eventlogging',
		'EchoInteraction',
		'enabled'
	);

	/**
	 * Context definitions.
	 *
	 * 'flyout': Interactions from the popup content
	 * 'archive': Interactions from the Special:Notifications page
	 * 'badge': Interactions from the badge button
	 *
	 * @static
	 * @property {Object}
	 */
	mw.echo.Logger.static.context = {
		popup: 'flyout',
		archive: 'archive',
		badge: undefined
	};

	/**
	 * Logging action names for consistency.
	 *
	 * 'notificationClick': Click interaction
	 * 'notificationImpression': Impression interaction
	 *
	 * @static
	 * @property {Object}
	 */
	mw.echo.Logger.static.actions = {
		notificationClick: 'notification-link-click',
		notificationImpression: 'notification-impression'
	};

	/* Methods */

	/**
	 * Log all Echo interaction related events
	 *
	 * @param {string} action The interaction
	 * @param {string} [context] 'flyout'/'archive' or undefined for the badge
	 * @param {int} [eventId] Notification event id
	 * @param {string} [eventType] notification type
	 * @param {boolean} [mobile] True if interaction was on a mobile device
	 * @param {string} [notifWiki] Wiki the notification came from
	 */
	mw.echo.Logger.prototype.logInteraction = function ( action, context, eventId, eventType, mobile, notifWiki ) {
		if ( !this.constructor.static.clickThroughEnabled ) {
			return;
		}

		var myEvt = {
			action: action
		};

		// All the fields below are optional
		if ( context ) {
			myEvt.context = context;
		}
		if ( eventId ) {
			myEvt.eventId = Number( eventId );
		}
		if ( eventType ) {
			myEvt.notificationType = eventType;
		}
		if ( mobile ) {
			myEvt.mobile = mobile;
		}

		if ( notifWiki && notifWiki !== mw.config.get( 'wgDBname' ) ) {
			myEvt.notifWiki = notifWiki;
		}

		this.deferred.done( function () {
			mw.eventLog.logEvent( 'EchoInteraction', myEvt );
		} );
	};

	/**
	 * Log the impression of notifications. This will log each notification exactly once.
	 *
	 * @param {string} type Notification type; 'alert' or 'message'
	 * @param {number[]} notificationIds Array of notification ids
	 * @param {string} context 'flyout'/'archive' or undefined for the badge
	 * @param {boolean} [mobile] True if interaction was on a mobile device
	 */
	mw.echo.Logger.prototype.logNotificationImpressions = function ( type, notificationIds, context, mobile ) {
		var i, len;

		for ( i = 0, len = notificationIds.length; i < len; i++ ) {
			if ( !this.notificationsIdCache[ notificationIds[ i ] ] ) {
				// Log notification impression
				this.logInteraction( 'notification-impression', context, notificationIds[ i ], type, mobile );
				// Cache
				this.notificationsIdCache[ notificationIds[ i ] ] = true;
			}
		}
	};

	mw.echo.logger = new mw.echo.Logger();
} )( jQuery, mediaWiki );
