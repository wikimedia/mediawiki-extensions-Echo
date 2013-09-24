( function ( $, mw ) {
	'use strict';
	// TODO: What is this extra echoNewMsgAlertDisplayed check for? This should only run once
	// and that variable isn't used anywhere else in the repository.
	if ( mw.config.get( 'wgUserNewMsgRevisionId' ) && !mw.config.get( 'echoNewMsgAlertDisplayed' ) ) {
		var alertMessage = mw.html.escape( mw.msg( 'colon-separator' ) + mw.msg( 'echo-new-messages' ) );

		$( '#pt-mytalk a' )
			.append( alertMessage )
			.addClass( 'mw-echo-alert' );

		mw.config.set( 'echoNewMsgAlertDisplayed', true );
	}
} )( jQuery, mediaWiki );
