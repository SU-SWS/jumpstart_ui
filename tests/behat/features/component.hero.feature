@api
Feature: Hero Component
  In order to verify that Hero Component is working
  As an Admin User
  I should be able to see the component and fields in the /patterns library

  Scenario: Validate Hero Component.
    Given I am logged in as a user with the "administrator" role
    And I am on "/patterns/hero"

    # Fields
    Then I should see "hero_image" in the "content" region
    Then I should see "hero_media" in the "content" region
    Then I should see "hero_super_headline" in the "content" region
    Then I should see "hero_headline" in the "content" region
    Then I should see "hero_cta_link" in the "content" region
    Then I should see "hero_cta_attributes" in the "content" region
    Then I should see "hero_cta_label" in the "content" region
    Then I should see "hero_button_link" in the "content" region
    Then I should see "hero_button_label" in the "content" region

    # Variants
    Then I should see 1 ".su-hero--youtube" element in the "content" region
