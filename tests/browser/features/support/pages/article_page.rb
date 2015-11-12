class ArticlePage
  include PageObject

  page_section(:alerts, Notifications, css: '#pt-notifications-alert')
  page_section(:messages, Notifications, css: '#pt-notifications-message')
end
