@chrome @en.wikipedia.beta.wmflabs.org @firefox @login @test2.wikipedia.org
Feature: Notification types

  # Scenarios which trigger notifications
  Scenario: Mark all as unread
    Given I am logged in with no notifications
      # Trigger a message notification...
      And I have a Flow message
      # ... and an alert notification.
      And another user mentions me on the wiki
      And I am on the "Selenium Echo flyout test page" page
      And I have new notifications
      And I click the notification flyout button
      And I see the notification flyout
    When I click the mark all as read button
      And I am on the "Selenium Echo flyout test page" page
    # I still have an alert notification.
    Then I have new notifications
