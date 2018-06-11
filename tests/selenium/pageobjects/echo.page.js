'use strict';
const Page = require( 'wdio-mediawiki/Page' );

class EchoPage extends Page {

	get alerts() { return browser.element( '#pt-notifications-alert' ); }
	get notices() { return browser.element( '#pt-notifications-notice' ); }

}
module.exports = new EchoPage();
