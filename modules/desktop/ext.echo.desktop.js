( function ( $, mw ) {
	'use strict';

	// Functions that are only available to echo desktop version
	mw.echo.desktop = {
		/**
		 * Append uselang param to API get/post data if applicable
		 * @param apiData {Object}
		 */
		appendUseLang: function ( apiData ) {
			var curUri = new mw.Uri();
			if ( curUri.query.uselang !== undefined ) {
				apiData.uselang = curUri.query.uselang;
			}

			return apiData;
		}
	};

} )( jQuery, mediaWiki );
