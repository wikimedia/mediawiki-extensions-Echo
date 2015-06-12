@chrome @en.wikipedia.beta.wmflabs.org @firefox @login @test2.wikipedia.org
Feature: Scenarios that trigger notifications

  Scenario: Mark all as read
    Given I am logged in with no notifications
      And I have a Flow message that triggers an alert notification
      And another user mentions me on the wiki
      And I am on the "Selenium Echo flyout test page" page
      And I have new notifications
      And I click the notification flyout button
      And I see the notification flyout
      And I click for the Messages view
    When I click the mark all as read button
      And I am on the "Selenium Echo flyout test page" page
    Then I have no new notifications
