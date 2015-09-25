# Allow running of bundle exec cucumber --dry-run -f stepdefs
require 'mediawiki_selenium'
require 'page-object'
require_relative 'data_manager'

Before { @data_manager = DataManager.new }
