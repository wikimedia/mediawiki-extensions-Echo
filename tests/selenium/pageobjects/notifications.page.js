const Page = require( 'wdio-mediawiki/Page' );

class NotificationsPage extends Page {

	get notificationHeading() { return browser.element( '#firstHeading' ); }
	open() {
		super.openTitle( 'Special:Notifications', { uselang: 'en' } );
	}
}

module.exports = new NotificationsPage();
