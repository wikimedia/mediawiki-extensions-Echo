# Allow running of bundle exec cucumber --dry-run -f stepdefs
require 'mediawiki_selenium'
require 'page-object'
require_relative 'echo_api_helper'
require_relative 'echo_pageobject_extension'
require_relative 'data_manager'

World(EchoAPIHelper)

Before { @data_manager = DataManager.new }
