module EchoAPIHelper
  def create_page_with_user(title, text, username)
    as_user(username) do
      api.create_page title, text
    end
  end

  def clear_unread_notifications(username)
    as_user(username) do
      api.action('echomarkread', token_type: 'csrf', all: '1')
    end
  end

  def update_seentime(username, notificationType)
    as_user(username) do
      api.action('echomarkseen', token_type: 'csrf', type: notificationType)
    end
  end

  def watch_page(username, pageTitle)
    as_user(username) do
      api.action('watch', token_type: 'watch', title: pageTitle)
    end
  end
end
