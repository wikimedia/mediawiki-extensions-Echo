( function ( mw, $ ) {
	/**
	 * Network handler for echo notifications. Manages multiple APIHandlers
	 * according to their sources.
	 *
	 * @class
	 *
	 * @constructor
	 */
	mw.echo.api.NetworkHandler = function MwEchoApiNetworkHandler() {
		this.handlers = {};

		// Add initial local handler
		this.addApiHandler( 'local', {} );
	};

	/* Setup */

	OO.initClass( mw.echo.api.NetworkHandler );

	/* Static methods */
	/**
	 * Wait for all promises to finish either with a resolve or reject and
	 * return them to the caller once they do.
	 *
	 * @param {jQuery.Promise[]} promiseArray An array of promises
	 * @return {jQuery.Promise} A promise that resolves when all the promises
	 *  finished with some resolution or rejection.
	 */
	mw.echo.api.NetworkHandler.static.waitForAllPromises = function ( promiseArray ) {
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

		if ( !promiseArray.length ) {
			deferred.resolve();
		}

		for ( i = 0; i < promises.length; i++ ) {
			promises[ i ].always( countPromises );
		}

		return deferred.promise();
	};

	/* Methods */

	/**
	 * Get the API handler that matches the symbolic name
	 *
	 * @param {string} name Symbolic name of the API handler
	 * @return {mw.echo.dm.APIHandler|undefined} API handler, if exists
	 */
	mw.echo.api.NetworkHandler.prototype.getApiHandler = function ( name ) {
		return this.handlers[ name ];
	};

	/**
	 * Add an API handler
	 *
	 * @param {string} name Symbolic name
	 * @param {Object} config Configuration details
	 * @param {boolean} isForeign Is a foreign API
	 * @throws {Error} If no URL was given for a foreign API
	 */
	mw.echo.api.NetworkHandler.prototype.addApiHandler = function ( name, config, isForeign ) {
		// This must be here so that it short-circuits the object construction below
		if ( this.handlers[ name ] ) {
			return;
		}

		if ( isForeign ) {
			if ( !config.url ) {
				throw new Error( 'Foreign APIs must have a valid url.' );
			}
			this.addCustomApiHandler( name, new mw.echo.api.ForeignAPIHandler( config.url, config ) );
		} else {
			this.addCustomApiHandler( name, new mw.echo.api.LocalAPIHandler( config ) );
		}
	};

	/**
	 * Add a custom API handler by passing in an instance of an mw.echo.api.APIHandler subclass directly.
	 *
	 * @param {string} name Symbolic name
	 * @param {mw.echo.api.APIHandler} handler Handler object
	 */
	mw.echo.api.NetworkHandler.prototype.addCustomApiHandler = function ( name, handler ) {
		if ( !this.handlers[ name ] ) {
			this.handlers[ name ] = handler;
		}
	};

} )( mediaWiki, jQuery );
