( function ( mw ) {
	/* global moment:false */
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
		},
		calendar: {
			// Brackets must surround this output, otherwise moment thinks
			// this is a format string, and replaces all 'm' with minutes,
			// 's' with seconds, 'd' with days, etc, which is very amusing,
			// but entirely unhelpful
			sameDay: '[' + mw.msg( 'notification-timestamp-today' ) + ']',
			lastDay: '[' + mw.msg( 'notification-timestamp-yesterday' ) + ']',
			lastWeek: function () {
				return '[' + mw.msg(
					[
						'sunday',
						'monday',
						'tuesday',
						'wednesday',
						'thursday',
						'friday',
						'saturday'
					][ this.day() ] ) + ']';
			}
		}
	} );
	// Reset back to original locale
	moment.locale( momentOrigLocale );
}( mediaWiki ) );
