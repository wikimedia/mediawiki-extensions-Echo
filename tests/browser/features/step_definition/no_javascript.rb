# This test has no javascript
# Therefore this test has no AJAX
# Therefore it should run without any "when_present" clauses
# If you need a "when_present" to make the test run, that is a bug

Given(/^I am using user agent "(.+)"$/) do |user_agent|
  browser_factory.override(browser_user_agent: user_agent)
end

Given(/^I am on Special Notifications page$/) do
  expect(on(SpecialNotificationsPage).firstHeading).to match('Notifications')
end
