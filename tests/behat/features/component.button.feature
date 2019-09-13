@api
Feature: Button Component
  In order to verify that Button Component is working
  As an Admin User
  I should be able to see the component and fields in the /patterns library

  Scenario: Validate Button Component.
    Given I am logged in as a user with the "administrator" role
    And I am on "/patterns/button"

    # Fields
    Then I should see "button_label" in the "content" region
    Then I should see "button_value" in the "content" region
    Then I should see "button_name" in the "content" region
    Then I should see "button_type" in the "content" region

    # Variants
    Then I should see 1 ".su-button--secondary" element in the "content" region
    Then I should see 1 ".su-button--big" element in the "content" region
    Then I should see 1 ".su-button--unstyled" element in the "content" region
