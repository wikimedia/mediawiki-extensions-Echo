@chrome @en.wikipedia.beta.wmflabs.org @firefox @integration @vagrant
Feature: Basic features for no-js functionality

  Background:
    Given I am using user agent "Mozilla/4.0 (compatible; MSIE 5.5b1; Mac_PowerPC)"

  Scenario: Clicking alerts badge goes to Special:Notifications
    Given I am logged in
    When I click the alert badge
    Then I am on Special Notifications page
