@chrome @en.wikipedia.beta.wmflabs.org @firefox @login @test2.wikipedia.org
Feature: Notification types

  # Scenarios which trigger notifications
  Scenario: Someone links to a page I created
    Given I am logged in with no notifications
      And another user has linked to a page I created from another page
      And I come back from grabbing a cup of coffee
    When I am on the "Selenium Echo flyout test page" page
    Then I have new notifications

  Scenario: Mention message triggers notification
    Given I am logged in with no notifications
      And another user mentions me on the wiki
      And I come back from grabbing a cup of coffee
    When I am on the "Selenium Echo flyout test page" page
    Then I have new notifications

  Scenario: Talk page message triggers talk notification
    Given I am logged in with no notifications
      # And I do not have Flow boards enabled on the user talk namespace
      And another user writes on my talk page
      And I come back from grabbing a cup of coffee
    When I am on the "Selenium Echo flyout test page" page
    Then I have new notifications

  Scenario: New user gets a sign up notification
    Given I am logged in as a new user
       And I am on the "Selenium Echo flyout test page" page
    Then I have new notifications

  Scenario: Page revert
    # Too hard. Will do later.

  # Scenarios which do not trigger notifications (but might be expected to)
  Scenario: The @ message is not a keyword
    Given I am logged in with no notifications
      And another user @s me on "Talk:Echo at test"
    When I am on the "Selenium Echo flyout test page" page
    Then I have no new notifications
