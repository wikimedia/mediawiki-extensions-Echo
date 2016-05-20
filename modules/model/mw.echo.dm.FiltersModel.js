( function ( mw ) {
	/**
	 * Filters model for displaying filtered notification list.
	 *
	 * @class
	 * @mixins OO.EventEmitter
	 *
	 * @constructor
	 * @param {Object} config Configuration object
	 * @cfg {string} [readState='all'] Notifications read state. Allowed
	 *  values are 'all', 'read' or 'unread'.
	 */
	mw.echo.dm.FiltersModel = function MwEchoDmFiltersModel( config ) {
		config = config || {};

		// Mixin constructor
		OO.EventEmitter.call( this );

		this.readState = 'all';
		if ( config.readState ) {
			this.setReadState( config.readState );
		}
	};

	/* Initialization */

	OO.initClass( mw.echo.dm.FiltersModel );
	OO.mixinClass( mw.echo.dm.FiltersModel, OO.EventEmitter );

	/* Events */

	/**
	 * @event update
	 *
	 * The filters have been updated
	 */

	/* Methods */

	/**
	 * Set the read state filter
	 *
	 * @param {string} readState Notifications read state
	 */
	mw.echo.dm.FiltersModel.prototype.setReadState = function ( readState ) {
		var allowed = [ 'all', 'read', 'unread' ];
		if (
			this.readState !== readState &&
			allowed.indexOf( readState ) > -1
		) {
			this.readState = readState;
			this.emit( 'update' );
		}
	};

	/**
	 * Get the read state filter
	 *
	 * @return {string} Notifications read state
	 */
	mw.echo.dm.FiltersModel.prototype.getReadState = function () {
		return this.readState;
	};
} )( mediaWiki );
