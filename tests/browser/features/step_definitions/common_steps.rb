def get_session_username
  return "#{ENV["MEDIAWIKI_USER"]}_#{@browser.name}"
end

def get_session_username_b()
  return "EchoUser"
end

# For use in Firefox browser tests only
Given /^I am using user agent "(.+)"$/ do |user_agent|
  @user_agent = user_agent
  @browser = browser(test_name(@scenario), {user_agent: user_agent})
  $session_id = @browser.driver.instance_variable_get(:@bridge).session_id
end

Then(/^I find myself on the "(.*?)" page$/) do |title|
  on(ArticlePage, :using_params => {:article_name => title})
end

Given(/^I am viewing the basic non-JavaScript site$/) do
  step 'I am using user agent "Mozilla/4.0 (compatible; MSIE 5.00; Windows 98)"'
end

Given(/^I am on the "(.+)" page$/) do |title|
  on(APIPage).create title, "Test is used by Selenium web driver"
  visit(ArticlePage, :using_params => {:article_name => title})
end

Given(/^the user "(.*?)" exists$/) do |username|
  on(APIPage).client.log_in(ENV["MEDIAWIKI_USER"], ENV["MEDIAWIKI_PASSWORD"])
  begin
    on(APIPage).client.create_account(username, ENV["MEDIAWIKI_PASSWORD"])
  rescue MediawikiApi::ApiError
    puts 'Assuming user ' + username + ' already exists since was unable to create.'
  end
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

Given(/^I am logged in as a new user$/) do
  @username = "SeleniumEchoUser" + @random_string
  step 'I am logged in as the user "' + @username + '"'
end
