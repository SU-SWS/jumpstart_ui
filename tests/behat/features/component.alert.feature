@api
Feature: Alert Component
  In order to verify that Alert Component is working
  As an Admin User
  I should be able to see the component and fields in the /patterns library

  Scenario: Validate Alert Component.
    Given I am logged in as a user with the "administrator" role
    And I am on "/patterns/alert"

    # Fields
    Then I should see "alert_header" in the "content" region
    Then I should see "alert_text" in the "content" region

    # Variants
    Then I should see 1 ".su-alert--error" element in the "content" region
    Then I should see 1 ".su-alert--success" element in the "content" region
    Then I should see 1 ".su-alert--warning" element in the "content" region
    Then I should see 1 ".su-alert--info" element in the "content" region
