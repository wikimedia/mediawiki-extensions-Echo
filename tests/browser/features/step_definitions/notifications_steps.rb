Then(/^I have new notifications$/) do
  on(ArticlePage).flyout_link_element.when_present.class_name.should match 'mw-echo-unread-notifications'
end
