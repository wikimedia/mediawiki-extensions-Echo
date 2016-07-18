( function ( mw ) {
	/**
	 * SeenTime model for Echo notifications
	 *
	 * @param {Object} [config] Configuration
	 * @cfg {string|string[]} [types='alert','message'] The types of notifications
	 *  that this model handles
	 */
	mw.echo.dm.SeenTimeModel = function MwEchoSeenTimeModel( config ) {
		config = config || {};

		// Mixin constructor
		OO.EventEmitter.call( this );

		this.types = [ 'alert', 'message' ];
		if ( config.types ) {
			this.types = Array.isArray( config.types ) ? config.types : [ config.types ];
		}

		this.seenTime = {
			local: mw.config.get( 'wgEchoSeenTime' ) || {}
		};
	};

	/* Initialization */

	OO.initClass( mw.echo.dm.SeenTimeModel );
	OO.mixinClass( mw.echo.dm.SeenTimeModel, OO.EventEmitter );

	/* Events */

	/**
	 * @event update
	 * @param {string} source The source that updated its seenTime
	 * @param {number} time Seen time
	 *
	 * Seen time has been updated for the given source
	 */

	/* Methods */

	/**
	 * Get the seenTime value for the source
	 *
	 * @param {string} source Source name
	 * @return {number} Seen time
	 */
	mw.echo.dm.SeenTimeModel.prototype.getSeenTime = function ( source ) {
		source = source || 'local';

		return ( this.seenTime[ source ] && this.seenTime[ source ][ this.getTypes()[ 0 ] ] ) || 0;
	};

	/**
	 * Set the seen time value for the source
	 *
	 * @private
	 * @param {string} [source='local'] Given source
	 * @fires update
	 */
	mw.echo.dm.SeenTimeModel.prototype.setSeenTimeForSource = function ( source, time ) {
		var model = this,
			hasChanged = false;

		source = source || 'local';

		this.seenTime[ source ] = this.seenTime[ source ] || {};

		this.getTypes().forEach( function ( type ) {
			if ( model.seenTime[ source ][ type ] !== time ) {
				model.seenTime[ source ][ type ] = time;
				hasChanged = true;
			}
		} );

		if ( hasChanged ) {
			this.emit( 'update', source, time );
		}
	};

	/**
	 * Get the types associated with this model
	 *
	 * @private
	 * @return {string[]} Types for this model; an array of 'alert', 'message' or both.
	 */
	mw.echo.dm.SeenTimeModel.prototype.getTypes = function () {
		return this.types;
	};

} )( mediaWiki );
