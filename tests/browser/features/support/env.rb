require 'mediawiki_selenium'

if ( ENV['PAGE_WAIT_TIMEOUT'] ) then
	PageObject.default_page_wait = ENV['PAGE_WAIT_TIMEOUT'].to_i
end

if ( ENV['ELEMENT_WAIT_TIMEOUT'] ) then
	PageObject.default_element_wait = ENV['ELEMENT_WAIT_TIMEOUT'].to_i
end
