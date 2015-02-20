def make_page_with_user(title, text, username)
  client = on(APIPage).client
  client.log_in(username, ENV['MEDIAWIKI_PASSWORD'])
  client.create_page(title, text)
end

def clear_notifications(username)
  client = on(APIPage).client
  step 'the user "' + username + '" exists'
  client.log_in(username, ENV['MEDIAWIKI_PASSWORD'])
  client.action('echomarkread', token_type: 'edit', all: '1')
end

def make_page_with_user_b(title, text)
  username = get_session_username_b
  step 'the user "' + username + '" exists'
  make_page_with_user(title, text, username)
end

def make_page_with_user_a(title, text)
  make_page_with_user(title, text, get_session_username)
end

def poll_for_new_notifications(number_of_polls)
  number_of_polls.to_i.times do
    step 'I am on the "Selenium Echo flyout test page" page'
    break if on(ArticlePage).flyout_link_element.class_name =~ /mw-echo-unread-notifications/
  end
end

Given(/^another user has linked to a page I created from another page$/) do
  title = 'Selenium Echo link test ' + @random_string
  make_page_with_user_a(title, 'Selenium test page. Feel free to delete me.')
  title2 = title + ' ' + @random_string
  make_page_with_user_b(title2, 'I am linking to [[' + title + ']].')
end

Given(/^another user writes on my talk page$/) do
  make_page_with_user_b(
    'User talk:' + get_session_username,
    "== Barnstar ==\nHello Selenium, here is a barnstar for all your testing! " +
    @random_string + "~~~~\n")
end

Given(/^another user @s me on "(.*?)"$/) do |title|
  username = get_session_username.sub('_', ' ')
  text = '@' + username + ' Cho cho cho. ~~~~'
  make_page_with_user_b(title, text)
end

Given(/^I reload the page (.*?) times or until a notification shows up$/) do |number_of_polls|
  poll_for_new_notifications(number_of_polls)
end

Given(/^another user mentions me on the wiki$/) do
  title = 'Selenium Echo mention test ' + @random_string
  username = get_session_username.sub('_', ' ')
  text = "== The walrus ==\n[[User:" +  username + "]]: Cho cho cho. ~~~~\n"
  make_page_with_user_b(title, text)
end

Given(/^I am logged in as a new user$/) do
  @username = get_new_username
  step 'I am logged in as the user "' + @username + '"'
end

Given(/^I am logged in as a new user with no notifications$/) do
  @username = get_new_username
  clear_notifications(@username)
  step 'I am logged in as the user "' + @username + '"'
end

Given(/^I am logged in with no notifications$/) do
  # Mark all messages as read
  client = on(APIPage).client
  username = get_session_username
  step 'the user "' + username + '" exists'
  client.log_in(username, ENV['MEDIAWIKI_PASSWORD'])
  client.action('echomarkread', token_type: 'edit', all: '1')

  step 'I am logged in my non-shared account'
  step 'I have no new notifications'
end

Then(/^I have no new notifications$/) do
  expect(on(ArticlePage).flyout_link_element.when_present.class_name).not_to
  match 'mw-echo-unread-notifications'
end

Then(/^I have new notifications$/) do
  expect(on(ArticlePage).flyout_link_element.when_present.class_name).to
  match 'mw-echo-unread-notifications'
end
