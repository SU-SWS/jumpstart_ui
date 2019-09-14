@api
Feature: Brand Bar Component
  In order to verify that Brand Bar Component is working
  As an Admin User
  I should be able to see the component and fields in the /patterns library

  Scenario: Validate Brand Bar Component.
    Given I am logged in as a user with the "administrator" role
    And I am on "/patterns/brandbar"

    # Variants
    Then I should see 1 ".su-brand-bar--bright" element in the "content" region
    Then I should see 1 ".su-brand-bar--dark" element in the "content" region
    Then I should see 1 ".su-brand-bar--white" element in the "content" region
