'use strict';

const assert = require( 'assert' ),
	EchoPage = require( '../pageobjects/echo.page' ),
	UserLoginPage = require( 'wdio-mediawiki/LoginPage' );

describe( 'Echo', () => {
	it( 'alerts and notices are visible after logging in @daily', async () => {

		await UserLoginPage.login( browser.config.mwUser, browser.config.mwPwd );

		assert( EchoPage.alerts.isExisting() );
		assert( EchoPage.notices.isExisting() );

	} );

	it( 'flyout for alert appears when clicked @daily', async () => {

		await UserLoginPage.login( browser.config.mwUser, browser.config.mwPwd );
		await EchoPage.alerts.click();
		EchoPage.alertsFlyout.waitForDisplayed();

		assert( EchoPage.alertsFlyout.isExisting() );

	} );

	it( 'flyout for notices appears when clicked @daily', async () => {

		await UserLoginPage.login( browser.config.mwUser, browser.config.mwPwd );
		await EchoPage.notices.click();
		EchoPage.noticesFlyout.waitForDisplayed();

		assert( EchoPage.noticesFlyout.isExisting() );

	} );
} );
