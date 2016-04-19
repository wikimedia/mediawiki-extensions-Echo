# This test has no javascript
# Therefore this test has no AJAX
# Therefore it should run without any "when_present" clauses
# If you need a "when_present" to make the test run, that is a bug

Given(/^I am using a nojs browser$/) do
  # The following user-agent string contains:
  #   SymbianOS: for RL to NOT load the modern experience
  #   SMART-TV-SamsungBrowser: to bypass mobile-frontend and stay on the desktop site
  browser_factory.override(browser_user_agent: 'SymbianOS,SMART-TV-SamsungBrowser')
end

Given(/^I am on Special Notifications page$/) do
  expect(on(SpecialNotificationsPage).firstHeading).to match('Notifications')
end
