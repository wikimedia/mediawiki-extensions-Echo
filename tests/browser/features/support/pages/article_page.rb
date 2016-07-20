class ArticlePage
  include PageObject

  page_section(:alerts, Notifications, css: '#pt-notifications-alert')
  page_section(:notices, Notifications, css: '#pt-notifications-notice')
end
