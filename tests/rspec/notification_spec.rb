require 'mediawiki_api'

describe 'Echo' do
  before(:all) do
    if ENV['JENKINS_HOME']
      # jenkins
      @mediawiki_api = "#{ENV['MW_SERVER']}#{ENV['MW_SCRIPT_PATH']}/api.php"
      @admin_username = 'WikiAdmin'
      @admin_password = 'testpass'
    else
      # mediawiki-vagrant
      @mediawiki_api = 'http://127.0.0.1:8080/w/api.php'
      @admin_username = 'Admin'
      @admin_password = 'vagrant'
    end

    @client = MediawikiApi::Client.new @mediawiki_api
  end

  before(:each) do
    @client.log_in @admin_username, @admin_password

    require 'securerandom'
    @random_username = "U#{SecureRandom.hex(5)}"
    @random_password = SecureRandom.hex(5)
  end

  it 'should notify a new user with welcome message' do
    @client.create_account(@random_username, @random_password)

    @client.log_in @random_username, @random_password
    notifications = @client.query(meta: 'notifications').data['notifications']['list']

    welcome_notification = notifications.first
    expect(welcome_notification['type']).to eq 'welcome'
    expect(welcome_notification['agent']['name']).to eq @random_username
    expect(welcome_notification['timestamp']['date']).to eq 'Today'
  end

  it 'should notify user about mention on wikitext page' do
    @client.create_account(@random_username, @random_password)

    page = SecureRandom.hex(5).capitalize
    @client.edit(title: page, text: "[[User:#{@random_username}]] ~~~~")

    @client.log_in @random_username, @random_password
    notifications = @client.query(meta: 'notifications').data['notifications']['list']

    mention_notification = notifications.last
    expect(mention_notification['type']).to eq 'mention'
    expect(mention_notification['agent']['name']).to eq @admin_username
    expect(mention_notification['title']['full']).to eq page
  end

end
