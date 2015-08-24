Feature: Membership
  In order to give registered members access to exclusive content
  As an Administrator
  Authentication and registration for users

  Scenario: Registration
    When I register "John Doe" "john@example.com"
    Then I should have an account

  Scenario: Successful Authentication
    Given I have an account "John Doe" "john@example.com"
    When I sign in
    Then I should be logged in

  Scenario: Failed Authentication
    When I sign in with invalid credentials
    Then I should not be logged in
