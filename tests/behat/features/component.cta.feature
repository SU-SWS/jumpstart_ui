@api
Feature: CTA Component
  In order to verify that CTA Component is working
  As an Admin User
  I should be able to see the component and fields in the /patterns library

  Scenario: Validate CTA Component.
    Given I am logged in as a user with the "administrator" role
    And I am on "/patterns/cta"

    # Fields
    Then I should see "image_src" in the "content" region
    Then I should see "image_alt" in the "content" region
    Then I should see "button_text" in the "content" region
    Then I should see "link" in the "content" region
    Then I should see "icon_src" in the "content" region
    Then I should see "icon_alt" in the "content" region

    # Variants
    Then I should see 1 ".su-cta--button-bottom" element in the "content" region
    Then I should see 1 ".su-cta--button-bottom-icon" element in the "content" region
    Then I should see 1 ".su-cta--button-center" element in the "content" region
