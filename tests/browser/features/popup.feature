@firefox
@en.wikipedia.beta.wmflabs.org
Feature: Basic features for no-js functionality

  Background:
    Given I am logged in

  Scenario: Clicking alerts badge loads the alert popup
    When I click the alert badge
    Then I see the alert popup
