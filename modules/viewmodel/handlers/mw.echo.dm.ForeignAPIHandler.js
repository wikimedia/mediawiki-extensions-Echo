( function ( mw ) {
	/**
	 * Foreign notification API handler
	 *
	 * @class
	 * @extends mw.echo.dm.LocalAPIHandler
	 *
	 * @constructor
	 * @param {string} apiUrl A url for the access point of the
	 *  foreign API.
	 * @param {Object} [config] Configuration object
	 */
	mw.echo.dm.ForeignAPIHandler = function MwEchoDmForeignAPIHandler( apiUrl, config ) {
		config = config || {};

		// Parent constructor
		mw.echo.dm.ForeignAPIHandler.parent.call( this, config );

		this.api = new mw.ForeignApi( apiUrl );
	};

	/* Setup */

	OO.inheritClass( mw.echo.dm.ForeignAPIHandler, mw.echo.dm.LocalAPIHandler );
} )( mediaWiki );
