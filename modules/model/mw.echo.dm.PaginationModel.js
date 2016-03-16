( function ( mw ) {
	/**
	 * Pagination model for echo notifications pages.
	 *
	 * @class
	 *
	 * @constructor
	 * @param {Object} config Configuration object
	 * @cfg {string} [pageNext] The continue value of the next page
	 */
	mw.echo.dm.PaginationModel = function MwEchoDmPaginationModel( config ) {
		config = config || {};

		this.pagesContinue = [];

		// Set initial page
		this.currPageIndex = 0;
		this.pagesContinue[ 0 ] = '';

		// If a next page is given, fill it
		if ( config.pageNext ) {
			this.setPageContinue( 1, config.pageNext );
		}
	};

	/* Initialization */

	OO.initClass( mw.echo.dm.PaginationModel );

	/* Methods */

	/**
	 * Set a page index with its 'continue' value, used for API fetching
	 *
	 * @param {number} page Page index
	 * @param {string} continueVal Continue string value
	 */
	mw.echo.dm.PaginationModel.prototype.setPageContinue = function ( page, continueVal ) {
		if ( continueVal ) {
			this.pagesContinue[ page ] = continueVal;
		}
	};

	/**
	 * Get the 'continue' value of a certain page
	 *
	 * @param {number} page Page index
	 * @return {string} Continue string value
	 */
	mw.echo.dm.PaginationModel.prototype.getPageContinue = function ( page ) {
		return this.pagesContinue[ page ];
	};

	/**
	 * Get the current page index
	 *
	 * @return {number} Current page index
	 */
	mw.echo.dm.PaginationModel.prototype.getCurrPageIndex = function () {
		return this.currPageIndex;
	};

	/**
	 * Set the current page index
	 *
	 * @param {number} index Current page index
	 */
	mw.echo.dm.PaginationModel.prototype.setCurrPageIndex = function ( index ) {
		this.currPageIndex = index;
	};

	/**
	 * Move forward to the next page
	 */
	mw.echo.dm.PaginationModel.prototype.forwards = function () {
		if ( this.hasNextPage() ) {
			this.setCurrPageIndex( this.currPageIndex + 1 );
		}
	};

	/**
	 * Move backwards to the previous page
	 */
	mw.echo.dm.PaginationModel.prototype.backwards = function () {
		if ( this.hasPrevPage() ) {
			this.setCurrPageIndex( this.currPageIndex - 1 );
		}
	};

	/**
	 * Get the previous page continue value
	 *
	 * @return {string} Previous page continue value
	 */
	mw.echo.dm.PaginationModel.prototype.getPrevPageContinue = function () {
		return this.pagesContinue[ this.currPageIndex - 1 ];
	};

	/**
	 * Get the current page continue value
	 *
	 * @return {string} Current page continue value
	 */
	mw.echo.dm.PaginationModel.prototype.getCurrPageContinue = function () {
		return this.pagesContinue[ this.currPageIndex ];
	};

	/**
	 * Get the next page continue value
	 *
	 * @return {string} Next page continue value
	 */
	mw.echo.dm.PaginationModel.prototype.getNextPageContinue = function () {
		return this.pagesContinue[ this.currPageIndex + 1 ];
	};

	/**
	 * Set the next page continue value
	 *
	 * @param {string} cont Next page continue value
	 */
	mw.echo.dm.PaginationModel.prototype.setNextPageContinue = function ( cont ) {
		this.pagesContinue[ this.currPageIndex + 1 ] = cont;
	};

	/**
	 * Check whether a previous page exists
	 *
	 * @return {boolean} Previous page exists
	 */
	mw.echo.dm.PaginationModel.prototype.hasPrevPage = function () {
		return this.currPageIndex > 0;
	};

	/**
	 * Check whether a next page exists
	 *
	 * @return {boolean} Next page exists
	 */
	mw.echo.dm.PaginationModel.prototype.hasNextPage = function () {
		return !!this.pagesContinue[ this.currPageIndex + 1 ];
	};
} )( mediaWiki );
