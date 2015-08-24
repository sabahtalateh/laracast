Feature: Single Purchases
  In order to avoid subscription
  As a viewer
  I want to purchase stand-alone videos

#  @javascript
  Scenario: Purchasing a video when i'm logged out
    Given I am not logged in
    And there is a "Example lesson" lesson
    When I go to this lesson page
    Then I should be asked to sign up

    @javascript
  Scenario: Purchasing a video when i'm logged in
    Given I'm logged in without a subscription
    And there is a "Example lesson" lesson
    When I go to this lesson page
    And I purchase the video
    Then I should be able to download it
