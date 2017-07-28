'use strict';

var assert = require( 'assert' ),
	EchoPage = require( '../pageobjects/echo.page' ),
	UserLoginPage = require( '../../../../../tests/selenium/pageobjects/userlogin.page' );

describe( 'Echo', function () {

	it( 'alerts and notices are visible after logging in', function () {

		UserLoginPage.login( browser.options.username, browser.options.password );

		assert( EchoPage.alerts.isExisting() );
		assert( EchoPage.notices.isExisting() );

	} );

} );
