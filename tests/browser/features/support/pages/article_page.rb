# Page Object describing Headings, Flyouts, and Overlay in Echo
class ArticlePage
  include PageObject

  h1(:first_heading, id: 'firstHeading')

  li(:notifications_alert, css: '#pt-notifications-alert')
  li(:notifications_message, css: '#pt-notifications-message')
  link(:notifications_badge_alert, css: '#pt-notifications-alert a')
  link(:notifications_badge_message, css: '#pt-notifications-message a')
  div(:popup_alert,
      css: '#pt-notifications-alert .mw-echo-ui-notificationBadgeButtonPopupWidget-popup')
  div(:popup_message,
      css: '#pt-notifications-message .mw-echo-ui-notificationBadgeButtonPopupWidget-popup')

  link(:notifications_badge_alert_unseen,
       css: '#pt-notifications-alert a.mw-echo-unseen-notifications')
  link(:notifications_badge_message_unseen,
       css: '#pt-notifications-message a.mw-echo-unseen-notifications')

  # Popup elements
  button(:mark_all_read_button, css: '.mw-echo-ui-notificationsWidget-markAllReadButton')
  def popup_title(popupElement)
    popupElement.when_present.span_element(
      css: '.oo-ui-popupWidget-head > .oo-ui-labelElement-label')
  end

  # Notification elements
  a(:notification_option, css: '.mw-echo-ui-notificationOptionWidget')
  a(:notification_option_unread, css: '.mw-echo-ui-notificationOptionWidget-unread')
  a(:notification_option_markRead, css: '.mw-echo-ui-notificationOptionWidget-markAsReadButton')
  def num_unread_message_notifications
    # Count the number of elements that are unseen notification divs
    # Taken from http://stackoverflow.com/questions/6433084/how-to-get-the-number-of-elements-having-same-attribute-in-html-in-watir
    browser.elements(
      css: '.mw-echo-ui-notificationOptionWidget-unread.mw-echo-ui-notificationOptionWidget-message'
      ).size
  end
end
