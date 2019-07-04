'use strict';

var assert = require( 'assert' ),
	EchoPage = require( '../pageobjects/echo.page' ),
	UserLoginPage = require( 'wdio-mediawiki/LoginPage' ),
	Util = require( 'wdio-mediawiki/Util' ),
	Api = require( 'wdio-mediawiki/Api' );

describe( 'Echo', function () {

	it( 'alerts and notices are visible after logging in @daily', function () {

		UserLoginPage.login( browser.options.username, browser.options.password );

		assert( EchoPage.alerts.isExisting() );
		assert( EchoPage.notices.isExisting() );

	} );

	it( 'flyout for alert appears when clicked @daily', function () {

		UserLoginPage.login( browser.options.username, browser.options.password );
		EchoPage.alerts.click();
		EchoPage.flyout.waitForVisible();

		assert( EchoPage.flyout.isExisting() );

	} );

	it( 'flyout for notices appears when clicked @daily', function () {

		UserLoginPage.login( browser.options.username, browser.options.password );
		EchoPage.notices.click();
		EchoPage.flyout.waitForVisible();

		assert( EchoPage.flyout.isExisting() );

	} );

	it( 'checks for welcome message after signup', function () {

		var username = Util.getTestString( 'NewUser-' );
		var password = Util.getTestString();
		browser.call( function () {
			return Api.createAccount( username, password );
		} );
		UserLoginPage.login( username, password );

		EchoPage.notices.click();

		EchoPage.alertMessage.waitForVisible();
		let regexp = /Welcome to .*, .*‬! We're glad you're here./;
		assert( regexp.test( EchoPage.alertMessage.getText() ) );

	} );

} );
