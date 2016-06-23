( function ( mw ) {
	/**
	 * Source pages model for notification filtering
	 *
	 * @class
	 * @mixins OO.EventEmitter
	 *
	 * @constructor
	 * @param {Object} config Configuration object
	 * @cfg {string} [currentSource] The selected source for the model.
	 *  Defaults to the current wiki.
	 */
	mw.echo.dm.SourcePagesModel = function MwEchoDmSourcePagesModel( config ) {
		config = config || {};

		// Mixin constructor
		OO.EventEmitter.call( this );

		this.sources = {};

		this.currentSource = config.currentSource || mw.config.get( 'wgDBname' );
		this.currentPage = null;
	};

	/* Initialization */
	OO.initClass( mw.echo.dm.SourcePagesModel );
	OO.mixinClass( mw.echo.dm.SourcePagesModel, OO.EventEmitter );

	/* Events */

	/**
	 * @event update
	 *
	 * The state of the source page model has changed
	 */

	/* Methds */

	/**
	 * Set the current source and page.
	 *
	 * @param {string} source New source
	 * @param {string} page New page
	 * @fires update
	 */
	mw.echo.dm.SourcePagesModel.prototype.setCurrentSourcePage = function ( source, page ) {
		if (
			this.currentSource !== source ||
			this.currentPage !== page
		) {
			this.currentSource = source;
			this.currentPage = page;
			this.emit( 'update' );
		}
	};

	/**
	 * Get the current source
	 *
	 * @return {string} Current source
	 */
	mw.echo.dm.SourcePagesModel.prototype.getCurrentSource = function () {
		return this.currentSource;
	};

	/**
	 * Get the current page or pages' id.
	 * Returns null if no page is selected.
	 *
	 * @return {number|number[]} Current page id
	 */
	mw.echo.dm.SourcePagesModel.prototype.getCurrentPage = function () {
		return this.currentPage;
	};
	/**
	 * Get the current source
	 *
	 * @return {string} Current source
	 */
	mw.echo.dm.SourcePagesModel.prototype.getCurrentSource = function () {
		return this.currentSource;
	};

	/**
	 * Get the title of the currently selected page
	 *
	 * @return {string} Page title
	 */
	mw.echo.dm.SourcePagesModel.prototype.getCurrentPageTitle = function () {
		return this.getPageTitle(
			this.getCurrentSource(),
			this.getCurrentPage()
		);
	};

	/**
	 * Set all sources and pages. This will also reset and override any
	 * previously set information.
	 *
	 * @param {Object} sourceData A detailed object about sources and pages
	 */
	mw.echo.dm.SourcePagesModel.prototype.setAllSources = function ( sourceData ) {
		var source;

		this.reset();
		for ( source in sourceData ) {
			if ( sourceData.hasOwnProperty( source ) ) {
				this.setSourcePagesDetails( source, sourceData[ source ] );
			}
		}
		this.emit( 'update' );
	};

	/**
	 * Get an array of all source names
	 *
	 * @return {string[]} Array of source names
	 */
	mw.echo.dm.SourcePagesModel.prototype.getSourcesArray = function () {
		return Object.keys( this.sources );
	};

	/**
	 * Get the title of a source
	 *
	 * @param {string} source Symbolic name of the source
	 * @return {string} Source title
	 */
	mw.echo.dm.SourcePagesModel.prototype.getSourceTitle = function ( source ) {
		return this.sources[ source ] && this.sources[ source ].title;
	};

	/**
	 * Get the total count of a source
	 *
	 * @param {string} source Symbolic name of the source
	 * @return {number} Total count
	 */
	mw.echo.dm.SourcePagesModel.prototype.getSourceTotalCount = function ( source ) {
		return ( this.sources[ source ] && this.sources[ source ].totalCount ) || 0;
	};

	/**
	 * Get all pages in a source
	 *
	 * @param {string} source Symbolic name of the source
	 * @return {Object} Page definitions in this source
	 */
	mw.echo.dm.SourcePagesModel.prototype.getSourcePages = function ( source ) {
		return this.sources[ source ] && this.sources[ source ].pages;
	};

	/**
	 * Get a specific page's title
	 *
	 * @param {string} source Symbolic name for source
	 * @param {number} pageId Page ID
	 * @return {string} Page title
	 */
	mw.echo.dm.SourcePagesModel.prototype.getPageTitle = function ( source, pageId ) {
		return this.getPageTitleById( source, pageId );
	};

	/**
	 * Get page title by the source and page ID
	 *
	 * @param {string} source Symbolic name of the source
	 * @param {number} pageId Page ID
	 * @return {string} Page title
	 */
	mw.echo.dm.SourcePagesModel.prototype.getPageTitleById = function ( source, pageId ) {
		return this.sources[ source ] &&
			this.sources[ source ].pages[ pageId ] &&
			this.sources[ source ].pages[ pageId ].title;
	};

	/**
	 * Reset the data
	 */
	mw.echo.dm.SourcePagesModel.prototype.reset = function () {
		this.sources = {};
	};

	/**
	 * Set the details of a source and its page definitions
	 *
	 * @private
	 * @param {string} source Source symbolic name
	 * @param {Object} details Details object
	 */
	mw.echo.dm.SourcePagesModel.prototype.setSourcePagesDetails = function ( source, details ) {
		var id, pageDetails;

		// Source information
		this.sources[ source ] = {
			title: details.source.title,
			base: details.source.base,
			totalCount: details.totalCount,
			pages: {}
		};

		// Fill in pages
		for ( id in details.pages ) {
			pageDetails = details.pages[ id ];
			this.sources[ source ].pages[ id ] = {
				title: pageDetails.title,
				count: pageDetails.count,
				id: id
			};
		}
	};
} )( mediaWiki );
