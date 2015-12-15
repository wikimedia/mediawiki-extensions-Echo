( function ( mw, $ ) {
	/**
	 * Network handler for echo notifications. Manages multiple APIHandlers
	 * according to their sources.
	 *
	 * @class
	 * @mixins OO.EventEmitter
	 *
	 * @constructor
	 * @param {Object} [config] Configuration object
	 * @cfg {string} [type="alert"] Notification type
	 * @cfg {Object} [baseParams] The base params to send to the
	 *  APIs with every fetch notifications process.
	 */
	mw.echo.dm.NetworkHandler = function MwEchoDmNetworkHandler( config ) {
		config = config || {};

		// Mixin constructor
		OO.EventEmitter.call( this );

		this.type = config.type || 'alert';
		this.baseParams = config.baseParams || {};
		this.handlers = {};

		// Add initial local handler
		this.addApiHandler( 'local', {} );
	};

	/* Setup */

	OO.initClass( mw.echo.dm.NetworkHandler );
	OO.mixinClass( mw.echo.dm.NetworkHandler, OO.EventEmitter );

	/* Static methods */
	/**
	 * Wait for all promises to finish either with a resolve or reject and
	 * return them to the caller once they do.
	 *
	 * @param {jQuery.Promise[]} promiseArray An array of promises
	 * @return {jQuery.Promise} A promise that resolves when all the promises
	 *  finished with some resolution or rejection.
	 */
	mw.echo.dm.NetworkHandler.static.waitForAllPromises = function ( promiseArray ) {
		var i,
			promises = promiseArray.slice( 0 ),
			counter = 0,
			deferred = $.Deferred(),
			countPromises = function () {
				counter++;
				if ( counter === promises.length ) {
					deferred.resolve( promises );
				}
			};

		for ( i = 0; i < promises.length; i++ ) {
			promises[ i ].always( countPromises );
		}

		return deferred.promise();
	};

	/* Methods */

	/**
	 * Fetch notifications from several sources
	 *
	 * @param {string[]} sourceArray Sources
	 * @return {jQuery.Promise} A promise that resolves with an array of promises for
	 *  fetchNotifications per each given source in the source array.
	 */
	mw.echo.dm.NetworkHandler.prototype.fetchNotificationGroups = function ( sourceArray ) {
		var i, promise,
			promises = [];

		for ( i = 0; i < sourceArray.length; i++ ) {
			promise = this.getApiHandler( sourceArray[ i ] ).fetchNotifications();
			promises.push( promise );
		}

		return this.constructor.static.waitForAllPromises( promises );
	};

	/**
	 * Get the API handler that matches the symbolic name
	 *
	 * @param {string} name Symbolic name of the API handler
	 * @return {mw.echo.dm.APIHandler|undefined} API handler, if exists
	 */
	mw.echo.dm.NetworkHandler.prototype.getApiHandler = function ( name ) {
		return this.handlers[ name ];
	};

	/**
	 * Add an API handler
	 *
	 * @param {string} name Symbolic name
	 * @param {Object} config Configuration details
	 * @param {boolean} isExternal Is an external API
	 * @throws {Error} If no URL was given for a foreign API
	 */
	mw.echo.dm.NetworkHandler.prototype.addApiHandler = function ( name, config, isExternal ) {
		var apiConfig;

		if ( !this.handlers[ name ] ) {
			apiConfig = $.extend( true, {}, { baseParams: this.baseParams, type: this.getType() }, config );

			if ( isExternal ) {
				if ( !config.url ) {
					throw new Error( 'External APIs must have a valid url.' );
				}
				this.addCustomApiHandler( name, new mw.echo.dm.ForeignAPIHandler( config.url, apiConfig ) );
			} else {
				this.addCustomApiHandler( name, new mw.echo.dm.LocalAPIHandler( apiConfig ) );
			}
		}
	};

	/**
	 * Add a custom API handler by passing in an instance of an mw.echo.dm.APIHandler subclass directly.
	 *
	 * @param {string} name Symbolic name
	 * @param {mw.echo.dm.APIHandler} handler Handler object
	 */
	mw.echo.dm.NetworkHandler.prototype.addCustomApiHandler = function ( name, handler ) {
		if ( !this.handlers[ name ] ) {
			this.handlers[ name ] = handler;
		}
	};

	/**
	 * Get the type of notifications this network handler is associated with
	 *
	 * @return {string} Notification type
	 */
	mw.echo.dm.NetworkHandler.prototype.getType = function () {
		return this.type;
	};

} )( mediaWiki, jQuery );
