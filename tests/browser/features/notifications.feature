@chrome  @firefox @en.m.wikipedia.beta.wmflabs.org
Feature: Notification types

  Scenario: New user gets a sign up notification
    Given I am logged in as a new user
      And I am on the "Selenium Echo flyout test page" page
    Then I have new notifications

