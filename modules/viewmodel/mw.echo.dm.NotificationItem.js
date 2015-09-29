( function ( mw, $ ) {
	/**
	 * Echo notification NotificationItem model
	 *
	 * @class
	 * @mixins OO.EventEmitter
	 *
	 * @constructor
	 * @param {number} id Notification id,
	 * @param {Object} [config] Configuration object
	 * @cfg {jQuery|string} [content] The html content of this notification
	 * @cfg {string} [category] The category of this notification. The category identifies
	 *  where the notification originates from.
	 * @cfg {string} [type] The notification type 'message' or 'alert'
	 * @cfg {boolean} [read=false] State the read state of the option
	 * @cfg {boolean} [seen=false] State the seen state of the option
	 * @cfg {string} [timestamp] Notification timestamp in Mediawiki timestamp format
	 * @cfg {string} [primaryUrl] Notification primary link in raw url format
	 */
	mw.echo.dm.NotificationItem = function mwFlowDmNotificationItem( id, config ) {
		var date = new Date(),
			normalizeNumber = function ( number ) {
				return ( number < 10 ? '0' : '' ) + String( number );
			},
			fallbackMWDate = date.getUTCFullYear() +
				normalizeNumber( date.getMonth() ) +
				normalizeNumber( date.getUTCDate() ) +
				normalizeNumber( date.getUTCHours() ) +
				normalizeNumber( date.getUTCMinutes() ) +
				normalizeNumber( date.getUTCSeconds() );

		// Mixin constructor
		OO.EventEmitter.call( this );

		this.id = id || null;

		// TODO: We should work on the API to release and work with actual
		// data here, rather than getting a pre-made html content of the
		// notification.
		this.content = config.content || $();

		this.category = config.category || '';
		this.type = config.type || 'alert';

		this.toggleRead( !!config.read );
		this.toggleSeen( !!config.seen );

		this.setTimestamp( config.timestamp || fallbackMWDate );
		this.setPrimaryUrl( config.primaryUrl );
	};

	/* Inheritance */

	OO.mixinClass( mw.echo.dm.NotificationItem, OO.EventEmitter );

	/* Events */

	/**
	 * @event seen
	 * @param {boolean} [seen] Notification is seen
	 *
	 * Seen status of the notification has changed
	 */

	/**
	 * @event read
	 * @param {boolean} [read] Notification is read
	 *
	 * Read status of the notification has changed
	 */

	/* Methods */

	/**
	 * Get NotificationItem id
	 * @return {string} NotificationItem Id
	 */
	mw.echo.dm.NotificationItem.prototype.getId = function () {
		return this.id;
	};

	/**
	 * Get NotificationItem content
	 * @return {jQuery|string} NotificationItem content
	 */
	mw.echo.dm.NotificationItem.prototype.getContent = function () {
		return this.content;
	};

	/**
	 * Get NotificationItem category
	 * @return {string} NotificationItem category
	 */
	mw.echo.dm.NotificationItem.prototype.getCategory = function () {
		return this.category;
	};
	/**
	 * Get NotificationItem type
	 * @return {string} NotificationItem type
	 */
	mw.echo.dm.NotificationItem.prototype.getType = function () {
		return this.type;
	};

	/**
	 * Check whether this notification item is read
	 * @return {boolean} Notification item is read
	 */
	mw.echo.dm.NotificationItem.prototype.isRead = function () {
		return this.read;
	};

	/**
	 * Check whether this notification item is seen
	 * @return {boolean} Notification item is seen
	 */
	mw.echo.dm.NotificationItem.prototype.isSeen = function () {
		return this.seen;
	};

	/**
	 * Toggle the read state of the widget
	 *
	 * @param {boolean} [read] The current read state. If not given, the state will
	 *  become the opposite of its current state.
	 */
	mw.echo.dm.NotificationItem.prototype.toggleRead = function ( read ) {
		read = read !== undefined ? read : !this.read;
		if ( this.read !== read ) {
			this.read = read;
			this.emit( 'read', this.read );
		}
	};

	/**
	 * Toggle the seen state of the widget
	 *
	 * @param {boolean} [seen] The current seen state. If not given, the state will
	 *  become the opposite of its current state.
	 */
	mw.echo.dm.NotificationItem.prototype.toggleSeen = function ( seen ) {
		seen = seen !== undefined ? seen : !this.seen;
		if ( this.seen !== seen ) {
			this.seen = seen;
			this.emit( 'seen', this.seen );
		}
	};

	/**
	 * Set the notification timestamp
	 *
	 * @param {number} timestamp Notification timestamp in Mediawiki timestamp format
	 */
	mw.echo.dm.NotificationItem.prototype.setTimestamp = function ( timestamp ) {
		this.timestamp = Number( timestamp );
	};

	/**
	 * Get the notification timestamp
	 *
	 * @return {number} Notification timestamp in Mediawiki timestamp format
	 */
	mw.echo.dm.NotificationItem.prototype.getTimestamp = function () {
		return this.timestamp;
	};

	/**
	 * Set the notification link
	 *
	 * @param {string} link Notification url
	 */
	mw.echo.dm.NotificationItem.prototype.setPrimaryUrl = function ( link ) {
		this.primaryUrl = link;
	};

	/**
	 * Get the notification link
	 *
	 * @return {string} Notification url
	 */
	mw.echo.dm.NotificationItem.prototype.getPrimaryUrl = function () {
		return this.primaryUrl;
	};

}( mediaWiki, jQuery ) );
