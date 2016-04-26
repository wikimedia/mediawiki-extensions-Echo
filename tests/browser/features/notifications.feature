@chrome @en.wikipedia.beta.wmflabs.org @firefox @integration @vagrant
Feature: Testing notification types

  Background:
    Given I am logged in
    And all my notifications are read

  Scenario: Someone mentions me
    Given another user mentions me
    When I refresh the page
    Then the alert badge is showing unseen notifications
    And the alert badge value is "1"

  @skip
  Scenario: Someone writes on my talk page
    Given another user writes on my talk page
    When I refresh the page
    Then the message badge is showing unseen notifications
    And the message badge value is "1"
    When I click the message badge
    And I see the message popup
    Then there are "1" unread notifications in the message popup
