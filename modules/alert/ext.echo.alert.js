( function ( $, mw ) {
	'use strict';
	if ( !mw.config.get( 'echoNewMsgAlertDisplayed' ) ) {
		var alertMessage = mw.html.escape( mw.msg( 'colon-separator' ) + mw.msg( 'echo-new-messages' ) );
		$( '#pt-mytalk a' ).append( alertMessage );
		$( '#pt-mytalk a' ).addClass( 'mw-echo-alert' );
		mw.config.set( 'echoNewMsgAlertDisplayed', true );
	}
} )( jQuery, mediaWiki );
