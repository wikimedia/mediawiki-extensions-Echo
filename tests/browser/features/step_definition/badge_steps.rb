# Steps related to clicking and interacting with the badge
# Work in both nojs and js version

Given(/^I click the alert badge$/) do
  on(ArticlePage).notifications_badge_alert
end
