require 'bundler/setup'

require 'rubocop/rake_task'
RuboCop::RakeTask.new(:rubocop) do |task|
  # if you use mediawiki-vagrant, rubocop will by default use it's .rubocop.yml
  # the next line makes it explicit that you want .rubocop.yml from the directory
  # where `bundle exec rake` is executed
  task.options = ['-c', '.rubocop.yml']
end

require 'rspec/core/rake_task'
RSpec::Core::RakeTask.new do |t|
  t.rspec_opts = 'tests/rspec/'
end

task default: [:test]

desc 'Run all build/tests commands (CI entry point)'
task test: [:rubocop, :spec]
