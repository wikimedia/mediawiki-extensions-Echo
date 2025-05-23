/**
 * Filters model for displaying filtered notification list.
 *
 * @class
 * @mixes OO.EventEmitter
 *
 * @constructor
 * @param {Object} [config={}]
 * @param {string} [config.readState='all'] Notifications read state. Allowed
 *  values are 'all', 'read' or 'unread'.
 * @param {string} [config.selectedSource=''] Currently selected source
 */
mw.echo.dm.FiltersModel = function MwEchoDmFiltersModel( config ) {
	config = config || {};

	// Mixin constructor
	OO.EventEmitter.call( this );

	this.readState = config.readState || 'all';

	this.sourcePagesModel = new mw.echo.dm.SourcePagesModel();
	this.selectedSource = config.selectedSource || '';
	this.selectedSourcePage = null;
};

/* Initialization */

OO.initClass( mw.echo.dm.FiltersModel );
OO.mixinClass( mw.echo.dm.FiltersModel, OO.EventEmitter );

/* Events */

/**
 * The filters have been updated
 *
 * @event mw.echo.dm.FiltersModel#update
 */

/* Methods */

/**
 * Set the read state filter
 *
 * @param {string} readState Notifications read state
 * @fires mw.echo.dm.FiltersModel#update
 */
mw.echo.dm.FiltersModel.prototype.setReadState = function ( readState ) {
	const allowed = [ 'all', 'read', 'unread' ];
	if (
		this.readState !== readState &&
		allowed.includes( readState )
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

/**
 * Set the currently selected source and page.
 * If no page is given, or if page is null, the source title
 * is assumed to be selected.
 *
 * @param {string} source Source name
 * @param {string} [page] Page name
 */
mw.echo.dm.FiltersModel.prototype.setCurrentSourcePage = function ( source, page ) {
	this.sourcePagesModel.setCurrentSourcePage( source, page );
};

/**
 * Get the total count of a source. This sums the count of all
 * sub pages in that source.
 *
 * @param {string} source Symbolic name for source
 * @return {number} Total count
 */
mw.echo.dm.FiltersModel.prototype.getSourceTotalCount = function ( source ) {
	return this.sourcePagesModel.getSourceTotalCount( source );
};

/**
 * Get the source page model
 *
 * @return {mw.echo.dm.SourcePagesModel} Source pages model
 */
mw.echo.dm.FiltersModel.prototype.getSourcePagesModel = function () {
	return this.sourcePagesModel;
};
