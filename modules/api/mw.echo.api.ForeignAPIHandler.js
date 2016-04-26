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

		this.api = new mw.ForeignApi( apiUrl );
	};

	/* Setup */

	OO.inheritClass( mw.echo.api.ForeignAPIHandler, mw.echo.api.LocalAPIHandler );

	/**
	 * @inheritdoc
	 */
	mw.echo.api.ForeignAPIHandler.prototype.getTypeParams = function ( type ) {
		return $.extend( {}, this.typeParams[ type ], {
			notfilter: '!read',
			// Backwards compatibility
			notnoforn: 1
		} );
	};
} )( mediaWiki, jQuery );
