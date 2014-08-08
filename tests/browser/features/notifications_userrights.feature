@chrome @firefox @login
Feature: Notification types

  Scenario: Change in user rights
    Given I am logged in as a new user with no notifications
    # This step requires user rights. Selenium user doesn't have sufficient user rights on beta labs.
    When my user rights get changed
      And I come back from grabbing a cup of coffee
      And I am on the "Selenium Echo flyout test page" page
    Then I have new notifications
