import EchoPage from '../pageobjects/echo.page.js';
import UserLoginPage from 'wdio-mediawiki/LoginPage';

describe( 'Echo', () => {

	before( async () => {
		await UserLoginPage.login( browser.options.capabilities[ 'mw:user' ], browser.options.capabilities[ 'mw:pwd' ] );
	} );

	it( 'alerts and notices are visible after logging in @daily', async () => {

		await expect( EchoPage.alerts ).toExist();
		await expect( EchoPage.notices ).toExist();

	} );

	it( 'flyout for alert appears when clicked @daily', async () => {

		await EchoPage.alerts.click();

		await expect( EchoPage.alertsFlyout ).toBeDisplayed();

	} );

	it( 'flyout for notices appears when clicked @daily', async () => {

		await EchoPage.notices.click();

		await expect( EchoPage.noticesFlyout ).toBeDisplayed();

	} );
} );
