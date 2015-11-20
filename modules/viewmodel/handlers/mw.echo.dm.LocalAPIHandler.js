( function ( mw, $ ) {
	/**
	 * Notification API handler
	 *
	 * @class
	 * @extends mw.echo.dm.APIHandler
	 *
	 * @constructor
	 * @param {Object} [config] Configuration object
	 */
	mw.echo.dm.LocalAPIHandler = function MwEchoDmLocalAPIHandler( config ) {
		config = config || {};

		// Parent constructor
		mw.echo.dm.LocalAPIHandler.parent.call( this, config );

		this.api = new mw.Api( { ajax: { cache: false } } );
	};

	/* Setup */

	OO.inheritClass( mw.echo.dm.LocalAPIHandler, mw.echo.dm.APIHandler );

	/**
	 * @inheritdoc
	 */
	mw.echo.dm.LocalAPIHandler.prototype.fetchNotifications = function ( apiPromise ) {
		var helper = this,
			params = $.extend( { notsections: this.type }, this.getBaseParams() );

		if ( !this.fetchNotificationsPromise || this.isFetchingErrorState() ) {
			this.apiErrorState = false;
			this.fetchNotificationsPromise = ( apiPromise || this.api.get( params ) )
				.fail( function () {
					// Mark API error state
					helper.apiErrorState = true;
				} )
				.always( function () {
					helper.fetchNotificationsPromise = null;
				} );
		}

		return this.fetchNotificationsPromise;
	};

	/**
	 * @inheritdoc
	 */
	mw.echo.dm.LocalAPIHandler.prototype.updateSeenTime = function ( type ) {
		type = type || this.type;

		return this.api.postWithToken( 'edit', {
			action: 'echomarkseen',
			// TODO: The API should also work with piped types like
			// getting notification lists
			type: $.isArray( type ) ? 'all' : type
		} )
			.then( function ( data ) {
				return data.query.echomarkseen.timestamp;
			} );
	};

	/**
	 * @inheritdoc
	 */
	mw.echo.dm.LocalAPIHandler.prototype.markAllRead = function () {
		var model = this,
			data = {
				action: 'echomarkread',
				uselang: this.userLang,
				sections: $.isArray( this.type ) ? this.type.join( '|' ) : this.type
			};

		return this.api.postWithToken( 'edit', data )
			.then( function ( result ) {
				return OO.getProp( result.query, 'echomarkread', model.type, 'rawcount' ) || 0;
			} );
	};

	/**
	 * @inheritdoc
	 */
	mw.echo.dm.LocalAPIHandler.prototype.markItemRead = function ( itemId ) {
		var model = this,
			data = {
				action: 'echomarkread',
				uselang: this.userLang,
				list: itemId
			};

		return this.api.postWithToken( 'edit', data )
			.then( function ( result ) {
				return OO.getProp( result.query, 'echomarkread', model.type, 'rawcount' ) || 0;
			} );
	};

	/**
	 * @inheritdoc
	 */
	mw.echo.dm.LocalAPIHandler.prototype.fetchUnreadCount = function () {
		var apiData = {
				action: 'query',
				meta: 'notifications',
				notsections: $.isArray( this.type ) ? this.type.join( '|' ) : this.type,
				notmessageunreadfirst: 1,
				notlimit: this.limit,
				notprop: 'index|count',
				uselang: this.userLang
			};

		return this.api.get( apiData )
			.then( function ( result ) {
				return OO.getProp( result.query, 'notifications', 'rawcount' ) || 0;
			} );
	};
} )( mediaWiki, jQuery );
