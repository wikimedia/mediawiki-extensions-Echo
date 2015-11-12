class Notifications
  include PageObject

  link(:badge)
  link(:badge_unseen, css: '.mw-echo-unseen-notifications')
  link(:mark_all_as_read, css: '.mw-echo-ui-notificationsWidget-markAllReadButton > a')
  div(:popup, css: '.mw-echo-ui-notificationBadgeButtonPopupWidget-popup')
  span(:title, css: '.oo-ui-popupWidget-head > .oo-ui-labelElement-label')
  div(:notifications_container, css: '.mw-echo-ui-notificationsWidget')

  def when_loaded
    title_element.when_present
    notifications_container_element.when_present
  end

  def num_unread_notifications
    div_elements(css: '.mw-echo-ui-notificationItemWidget-unread').size
  end
end
