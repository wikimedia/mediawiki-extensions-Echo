( function ( mw, $ ) {
	/**
	 * Foreign notification API handler
	 *
	 * @class
	 * @extends mw.echo.api.LocalAPIHandler
	 *
	 * @constructor
	 * @param {string} apiUrl A url for the access point of the
	 *  foreign API.
	 * @param {Object} [config] Configuration object
	 */
	mw.echo.api.ForeignAPIHandler = function MwEchoApiForeignAPIHandler( apiUrl, config ) {
		config = config || {};

		// Parent constructor
		mw.echo.api.ForeignAPIHandler.parent.call( this, config );

		// Add 'noforn' setting to foreign APIs
		$.extend( true, this.typeParams, {
			message: {
				notnoforn: 1,
				notfilter: '!read'
			},
			alert: {
				notnoforn: 1,
				notfilter: '!read'
			},
			all: {
				notnoforn: 1,
				notfilter: '!read'
			}
		} );

		this.api = new mw.ForeignApi( apiUrl );
	};

	/* Setup */

	OO.inheritClass( mw.echo.api.ForeignAPIHandler, mw.echo.api.LocalAPIHandler );
} )( mediaWiki, jQuery );
