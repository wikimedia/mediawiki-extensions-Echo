( function ( mw, $ ) {
	/*global moment:false */
	/**
	 * A sub group widget that displays notifications divided by dates.
	 *
	 * @class
	 * @extends mw.echo.ui.SubGroupListWidget
	 *
	 * @constructor
	 * @param {mw.echo.Controller} controller Notifications controller
	 * @param {mw.echo.dm.SortedList} listModel Notifications list model for this source
	 * @param {Object} [config] Configuration object
	 */
	mw.echo.ui.DatedSubGroupListWidget = function MwEchoUiDatedSubGroupListWidget( controller, listModel, config ) {
		var momentTimestamp, diff, fullDate,
			now = moment(),
			$primaryDate = $( '<span>' )
				.addClass( 'mw-echo-ui-datedSubGroupListWidget-title-primary' ),
			$secondaryDate = $( '<span>' )
				.addClass( 'mw-echo-ui-datedSubGroupListWidget-title-secondary' ),
			$title = $( '<span>' )
				.addClass( 'mw-echo-ui-datedSubGroupListWidget-title' )
				.append( $primaryDate, $secondaryDate );

		config = config || {};

		// Parent constructor
		mw.echo.ui.DatedSubGroupListWidget.parent.call( this, controller, listModel, config );

		momentTimestamp = moment( this.model.getTimestamp(), 'YYYYMMDD' );
		diff = now.diff( momentTimestamp, 'weeks' );
		fullDate = momentTimestamp.format( 'LL' );

		$primaryDate.text( fullDate );
		if ( diff === 0 ) {
			$secondaryDate.text( fullDate );
			momentTimestamp.locale( 'echo-shortRelativeTime' );
			$primaryDate.text( momentTimestamp.calendar() );
		}

		this.title.setLabel( $title );

		this.$element
			.addClass( 'mw-echo-ui-datedSubGroupListWidget' );
	};

	/* Initialization */

	OO.inheritClass( mw.echo.ui.DatedSubGroupListWidget, mw.echo.ui.SubGroupListWidget );
} )( mediaWiki, jQuery );
