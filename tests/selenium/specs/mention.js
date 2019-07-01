var assert = require( 'assert' ),
	EchoPage = require( '../pageobjects/echo.page' ),
	UserLoginPage = require( 'wdio-mediawiki/LoginPage' ),
	Util = require( 'wdio-mediawiki/Util' ),
	Api = require( 'wdio-mediawiki/Api' );

describe( 'Mention test for Echo', function () {
	it.skip( 'checks if admin gets alert when mentioned', function () {

		var username = Util.getTestString( 'NewUser-' );
		var password = Util.getTestString();
		browser.call( function () {
			return Api.createAccount( username, password
			).then( function () {
				return Api.edit( `User:${username}`, `Hello [[User:${browser.options.username}]] ~~~~`, username, password );
			} );
		} );
		UserLoginPage.login( browser.options.username, browser.options.password );

		EchoPage.alerts.click();

		EchoPage.alertMessage.waitForVisible();
		let regexp = /‪.*‬ mentioned you on ‪User:.*./;
		assert( regexp.test( EchoPage.alertMessage.getText() ) );
	} );

} );
