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
	mw.echo.api.LocalAPIHandler = function MwEchoApiLocalAPIHandler( config ) {
		config = config || {};

		// Parent constructor
		mw.echo.api.LocalAPIHandler.parent.call( this, config );

		this.api = new mw.Api( { ajax: { cache: false } } );
	};

	/* Setup */

	OO.inheritClass( mw.echo.api.LocalAPIHandler, mw.echo.api.APIHandler );

	/**
	 * @inheritdoc
	 */
	mw.echo.api.LocalAPIHandler.prototype.fetchNotifications = function ( type, isForced ) {
		if ( isForced || this.isFetchingErrorState( type ) ) {
			// Force new promise
			this.createNewFetchNotificationPromise( type );
		}

		return this.getFetchNotificationPromise( type );
	};

	/**
	 * @inheritdoc
	 */
	mw.echo.api.LocalAPIHandler.prototype.updateSeenTime = function ( type ) {
		return this.api.postWithToken( 'edit', {
			action: 'echomarkseen',
			type: this.normalizedType[ type ]
		} )
			.then( function ( data ) {
				return data.query.echomarkseen.timestamp;
			} );
	};

	/**
	 * @inheritdoc
	 */
	mw.echo.api.LocalAPIHandler.prototype.markAllRead = function ( type ) {
		var data = {
				action: 'echomarkread',
				sections: this.normalizedType[ type ]
			};

		return this.api.postWithToken( 'edit', data )
			.then( function ( result ) {
				return OO.getProp( result.query, 'echomarkread', type, 'rawcount' ) || 0;
			} );
	};

	/**
	 * @inheritdoc
	 */
	mw.echo.api.LocalAPIHandler.prototype.markItemsRead = function ( itemIdArray, isRead ) {
		var data = {
				action: 'echomarkread'
			};

		if ( isRead ) {
			data.list = itemIdArray.join( '|' );
		} else {
			data.unreadlist = itemIdArray.join( '|' );
		}

		return this.api.postWithToken( 'edit', data );
	};

	/**
	 * @inheritdoc
	 */
	mw.echo.api.LocalAPIHandler.prototype.fetchUnreadCount = function ( type ) {
		var normalizedType = this.normalizedType[ type ],
			apiData = {
				action: 'query',
				meta: 'notifications',
				notsections: normalizedType,
				notgroupbysection: 1,
				notmessageunreadfirst: 1,
				notlimit: this.limit,
				notprop: 'count',
				notcrosswikisummary: 1,
				uselang: this.userLang
			};

		return this.api.get( apiData )
			.then( function ( result ) {
				if ( type === 'message' || type === 'alert' ) {
					return OO.getProp( result.query, 'notifications', normalizedType, 'rawcount' ) || 0;
				} else {
					return OO.getProp( result.query, 'notifications', 'rawcount' ) || 0;
				}
			} );
	};

	/**
	 * @inheritdoc
	 */
	mw.echo.api.LocalAPIHandler.prototype.getTypeParams = function ( type ) {
		return $.extend( {}, this.typeParams[ type ], {
			notcrosswikisummary: 1
		} );
	};
} )( mediaWiki, jQuery );
