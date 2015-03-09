When(/^I click the notification flyout button$/) do
  # Sleep works around Chrome 40 issue that began
  # ~2015-03-04
  sleep 1
  on(ArticlePage).flyout_link_element.when_present.click
end

Then(/^I do not see the notification flyout button$/) do
  expect(on(ArticlePage).flyout_link_container_element).not_to be_visible
end

Then(/^I see the notification flyout$/) do
  expect(on(ArticlePage).flyout_element.when_present).to be_visible
end

Then(/^I see the notification flyout button$/) do
  expect(on(ArticlePage).flyout_link_container_element.when_present).to be_visible
end
