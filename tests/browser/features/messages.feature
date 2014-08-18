@chrome @en.wikipedia.beta.wmflabs.org @firefox @login @test2.wikipedia.org
Feature: Notification types

  # Scenarios which trigger notifications
  Scenario: Mark all as unread
    Given I am logged in with no notifications
      And I have a Flow message
      And another user mentions me on the wiki
      And I am on the "Selenium Echo flyout test page" page
      And I click the notification flyout button
      And I see the notification flyout
      And I have unread alert notifications
    When I click the mark all as read button
      And I am on the "Selenium Echo flyout test page" page
    Then I have new notifications
