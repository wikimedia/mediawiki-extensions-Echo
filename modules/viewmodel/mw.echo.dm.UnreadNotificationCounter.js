( function ( mw ) {
	/**
	 * Echo notification UnreadNotificationCounter model
	 *
	 * @class
	 * @mixins OO.EventEmitter
	 *
	 * @constructor
	 * @param {Object} api An instance of EchoAPI.
	 * @param {string} type The notification type 'message', 'alert', or 'all'.
	 * @param {number} max Maximum number supported. Above this number there is no precision, we only know it is 'more than max'.
	 */
	mw.echo.dm.UnreadNotificationCounter = function mwEchoDmUnreadNotificationCounter( api, type, max ) {
		// Mixin constructor
		OO.EventEmitter.call( this );

		this.api = api;
		this.type = type;
		this.max = max;

		this.count = 0;
		this.source = 'local';
	};

	/* Inheritance */

	OO.mixinClass( mw.echo.dm.UnreadNotificationCounter, OO.EventEmitter );

	/* Events */

	/**
	 * @event countChange
	 * @param {number} count Notification count
	 *
	 * The number of unread notification represented by this counter has changed.
	 */

	/* Methods */

	/**
	 * Get the current count
	 *
	 * @return {number} current count
	 */
	mw.echo.dm.UnreadNotificationCounter.prototype.getCount = function () {
		return this.count;
	};

	/**
	 * Set the current count
	 *
	 * @param {number} count
	 * @param {boolean} isEstimation Whether this number is estimated or accurate
	 */
	mw.echo.dm.UnreadNotificationCounter.prototype.setCount = function ( count, isEstimation ) {
		if ( isEstimation ) {
			if ( this.count > this.max ) {
				// this prevents toggling between 90-ish and 99+
				return;
			}
			if ( count < 0 ) {
				// wrong estimation?
				return;
			}
		}

		if ( count !== this.count ) {
			this.count = count;
			this.emit( 'countChange', this.count );
		}
	};

	/**
	 * Report an estimated change to this counter
	 *
	 * @param {number} delta
	 */
	mw.echo.dm.UnreadNotificationCounter.prototype.estimateChange = function ( delta ) {
		this.setCount( this.count + delta, true );
	};

	/**
	 * Request that this counter update itself from the API
	 */
	mw.echo.dm.UnreadNotificationCounter.prototype.update = function () {
		var model = this;
		this.api.fetchUnreadCount( this.source, this.type ).then( function ( actualCount ) {
			model.setCount( actualCount, false );
		} );
	};

}( mediaWiki ) );
