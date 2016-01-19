require 'mediawiki_selenium/cucumber'
require 'mediawiki_selenium/pages'
require 'mediawiki_selenium/step_definitions'

def env_or_default(key, default)
  ENV[key].nil? ? default : ENV[key].to_i
end

PageObject.default_page_wait = env_or_default 'PAGE_WAIT_TIMEOUT', 60
PageObject.default_element_wait = env_or_default 'ELEMENT_WAIT_TIMEOUT', 60
