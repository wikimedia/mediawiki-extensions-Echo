( function ( mw ) {
	/*global moment:false */
	'use strict';

	var momentOrigLocale = moment.locale();
	// Set up new 'short relative time' locale strings for momentjs
	moment.defineLocale( 'echo-shortRelativeTime', {
		relativeTime: function ( number, withoutSuffix, key ) {
			var keymap = {
				s: 'seconds',
				m: 'minutes',
				mm: 'minutes',
				h: 'hours',
				hh: 'hours',
				d: 'days',
				dd: 'days',
				M: 'months',
				MM: 'months',
				y: 'years',
				yy: 'years'
			};
			return mw.msg( 'notification-timestamp-ago-' + keymap[ key ], mw.language.convertNumber( number ) );
		} } );
	// Reset back to original locale
	moment.locale( momentOrigLocale );
} )( mediaWiki );
