( function ( mw, $ ) {
	/**
	 * Footer notice widget.
	 *
	 * @class
	 * @extends OO.ui.Widget
	 *
	 * @constructor
	 * @param {Object} [config] Configuration object
	 * @cfg {string} [iconUrl] The source URL of the feedback icon
	 * @cfg {string} [url] The URL for the survey
	 */
	mw.echo.ui.FooterNoticeWidget = function MwEchoUiFooterNoticeWidget( config ) {
		var $icon, label, dismissButton,
			$row = $( '<div>' )
				.addClass( 'mw-echo-ui-footerNoticeWidget-row' );

		config = config || {};

		// Parent constructor
		mw.echo.ui.FooterNoticeWidget.parent.call( this, config );

		if ( config.iconUrl ) {
			$icon = $( '<div>' )
				.addClass( 'mw-echo-ui-footerNoticeWidget-icon' )
				.append( $( '<img>' ).attr( { src: config.iconUrl, width: 30, height: 30 } ) );

			$row.append( $icon );
		}

		label = new OO.ui.LabelWidget( {
			label: $( '<span>' ).append(
				mw.message( 'echo-popup-footer-beta-invitation',
					// Text
					mw.msg( 'echo-popup-footer-beta-invitation-link' ),
					// Link
					config.url
				).parse()
			).contents(),
			classes: [ 'mw-echo-ui-footerNoticeWidget-label' ]
		} );

		dismissButton = new OO.ui.ButtonWidget( {
			icon: 'close',
			framed: false,
			classes: [ 'mw-echo-ui-footerNoticeWidget-dismiss' ]
		} );

		// Events
		dismissButton.connect( this, { click: 'onDismissButtonClick' } );

		this.$element
			.addClass( 'mw-echo-ui-footerNoticeWidget' )
			.append(
				$row
					.append(
						label.$element,
						dismissButton.$element
					)
			);
	};

	/* Initialization */

	OO.inheritClass( mw.echo.ui.FooterNoticeWidget, OO.ui.Widget );

	/* Events */

	/**
	 * The notice was dismissed.
	 *
	 * @event dismiss
	 */

	/* Methods */

	/**
	 * Respond to dismiss button click.
	 *
	 * @fires dismiss
	 */
	mw.echo.ui.FooterNoticeWidget.prototype.onDismissButtonClick = function () {
		this.toggle( false );
		this.emit( 'dismiss' );
	};
} )( mediaWiki, jQuery );
