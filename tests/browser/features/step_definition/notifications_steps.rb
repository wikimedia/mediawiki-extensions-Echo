Given(/^all my notifications are read$/) do
  clear_unread_notifications(@username)
end

Given(/^I refresh the page$/) do
  on(ArticlePage) do |page|
    page.refresh
  end
end

Given(/^another user mentions me$/) do
  message = '===Mention test===\nI am mentioning [[User:' + user(nil) +
    ']] in this page to test Echo notifications. ~~~~'
  as_user(:b) do
    api.create_page(
      @data_manager.get('Echo_test_page'),
      message
    )
  end
end

Given(/^another user writes on my talk page$/) do
  talk_page = "User_talk:#{user}"
  message = '===Talk page test===\n' +
    'I am writing a message in your user page to test Echo notifications. ~~~~'
  as_user(:b) do
    api.create_page(talk_page, message)
  end
end

Given(/^the alert badge is showing unseen notifications$/) do
  on(ArticlePage) do |page|
    page.refresh_until do
      page.alerts.badge_unseen_element.exists?
    end
  end
end

Given(/^the notice badge is showing unseen notifications$/) do
  on(ArticlePage) do |page|
    page.refresh_until do
      page.notices.badge_unseen_element.exists?
    end
  end
end

Given(/^the alert badge value is "(.+)"$/) do |num|
  on(ArticlePage) do |page|
    page.refresh_until do
      # `.text` doesn't work for invisible elements, and Selenium thinks the badge is invisible
      page.alerts.badge_element.attribute('innerText') == num
    end
  end
end

Given(/^the notice badge value is "(.+)"$/) do |num|
  on(ArticlePage) do |page|
    page.refresh_until do
      page.notices.badge_element.attribute('innerText') == num
    end
  end
end

Given(/^there are "(.+)" unread notifications in the notice popup$/) do |num|
  on(ArticlePage) do |page|
    page.notices.when_loaded
    expect(page.notices.num_unread_notifications).to eq(num.to_i)
  end
end

Given(/^there are "(.+)" unread notifications in the alert popup$/) do |num|
  on(ArticlePage) do |page|
    page.alerts.when_loaded
    expect(page.alerts.num_unread_notifications).to eq(num.to_i)
  end
end
