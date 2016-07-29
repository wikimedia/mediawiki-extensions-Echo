# Steps related to clicking and interacting with the badge
# Work in both nojs and js version

Given(/^I click the alert badge$/) do
  on(ArticlePage).alerts.badge_element.when_present.click
end

Given(/^I click the notice badge$/) do
  on(ArticlePage).notices.badge_element.when_present.click
end
