@api
Feature: Quote Component
  In order to verify that Quote Component is working
  As an Admin User
  I should be able to see the component and fields in the /patterns library

  Scenario: Validate Quote Component.
    Given I am logged in as a user with the "administrator" role
    And I am on "/patterns/quote"

    # Fields
    Then I should see "text" in the "content" region
    Then I should see "bio" in the "content" region
    Then I should see "name" in the "content" region
    Then I should see "src" in the "content" region
    Then I should see "alt" in the "content" region
