# Special:Notifications page
class SpecialNotificationsPage
  include PageObject

  page_url 'Special:Notifications'

  h1(:firstHeading, css: '.firstHeading')
end
