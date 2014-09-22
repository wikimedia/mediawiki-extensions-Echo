@custom-browser @en.wikipedia.beta.wmflabs.org @firefox @login @test2.wikipedia.org
Feature: Flyout (nojs)

  Background:
    Given I am using user agent "Mozilla/4.0 (compatible; MSIE 5.00; Windows 98)"
      And I am on the "Selenium Echo flyout test page" page

  Scenario: Flyout button present
    Given I am logged in
    When I click the notification flyout button
    Then I am on the Special Notifications page
      And I see the first heading on the page says Notifications
