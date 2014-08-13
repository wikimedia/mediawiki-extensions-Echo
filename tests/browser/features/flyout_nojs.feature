@chrome @en.wikipedia.beta.wmflabs.org @firefox @login
Feature: Flyout (nojs)

  Background:
    Given I am viewing the basic non-JavaScript site
      And I am on the "Selenium Echo flyout test page" page

  Scenario: Flyout button present
    Given I am logged in
    When I click the notification flyout button
    Then I find myself on the "Special:Notifications" page
