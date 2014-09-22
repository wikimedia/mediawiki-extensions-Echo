def get_new_username
  "EchoUserNew#{@random_string}"
end

def get_session_username
  "#{ENV["MEDIAWIKI_USER"]}_#{@browser.name}"
end

def get_session_username_b
  "EchoUser"
end

Given(/^I am logged in as the user "(.*?)"$/) do |username|
  step 'the user "' + username +'" exists'
  visit(LoginPage).login_with(username, ENV["MEDIAWIKI_PASSWORD"])
end

# Note Echo redefines this so that the user is unique to the current browser
Given(/^I am logged in my non-shared account$/) do
  username = get_session_username()
  step 'I am logged in as the user "' + username + '"'
end

Given(/^I am on the "(.+)" page$/) do |title|
  on(APIPage).create title, "Test is used by Selenium web driver"
  visit(ArticlePage, :using_params => {:article_name => title})
end

Given(/^I am using user agent "(.+)"$/) do |user_agent|
  @user_agent = user_agent
  @browser = browser(test_name(@scenario), {user_agent: user_agent})
  $session_id = @browser.driver.instance_variable_get(:@bridge).session_id
end

Given(/^my user rights get changed$/) do
  @username = get_new_username()
  client = on(APIPage).client
  client.log_in(ENV["MEDIAWIKI_USER"], ENV["MEDIAWIKI_PASSWORD"])
  resp = client.query(action: "query", list: "users", ususers: @username, ustoken: 'userrights')
  data = resp.data()
  @token = data["users"][0]["userrightstoken"]
  client.action('userrights', token_type: false, token: @token, add: "bot", user: @username)
end

Given(/^the user "(.*?)" exists$/) do |username|
  on(APIPage).client.log_in(ENV["MEDIAWIKI_USER"], ENV["MEDIAWIKI_PASSWORD"])
  begin
    on(APIPage).client.create_account(username, ENV["MEDIAWIKI_PASSWORD"])
    puts "Successfully created user " + username
  rescue MediawikiApi::ApiError
    puts 'Assuming in step that user ' + username + ' already exists since was unable to create.'
  end
end

Then(/^I am on the Special Notifications page$/) do
  expect(@browser.url).to match "Special:Notifications"
end

Then(/^I see the first heading on the page says Notifications$/) do
  expect(on(ArticlePage).first_heading_span).to match "Notifications"
end


