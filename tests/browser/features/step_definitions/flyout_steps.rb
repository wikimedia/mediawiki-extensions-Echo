When(/^I click the notification flyout button$/) do
  on(ArticlePage).flyout_link_element.when_present.click
end

Then(/^I do not see the notification flyout button$/) do
  on(ArticlePage).flyout_link_container_element.when_not_present
end

Then(/^I see the notification flyout$/) do
  on(ArticlePage).flyout_element.when_present
end

Then(/^I see the notification flyout button$/) do
  on(ArticlePage).flyout_link_container_element.when_present
end