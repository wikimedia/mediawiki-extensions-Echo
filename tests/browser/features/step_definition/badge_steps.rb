# Steps related to clicking and interacting with the badge
# Work in both nojs and js version

Given(/^I click the alert badge$/) do
  on(ArticlePage).alerts.badge
end

Given(/^I click the message badge$/) do
  on(ArticlePage).messages.badge
end
