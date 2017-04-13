class ArticlePage
  include PageObject

  li(:alerts, css: '#pt-notifications-alert')
  li(:notices, css: '#pt-notifications-notice')
  page_section(:alerts, Notifications, css: '#pt-notifications-alert')
  page_section(:notices, Notifications, css: '#pt-notifications-notice')
end
