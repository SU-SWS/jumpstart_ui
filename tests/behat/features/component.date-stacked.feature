@api
Feature: Date Stacked Component
  In order to verify that Date Stacked Component is working
  As an Admin User
  I should be able to see the component and fields in the /patterns library

  Scenario: Validate Date Stacked Component.
    Given I am logged in as a user with the "administrator" role
    And I am on "/patterns/date-stacked"

    # Fields
    Then I should see "month_of_year" in the "content" region
    Then I should see "day_of_month" in the "content" region

    # Variants
    Then I should see 1 ".su-date-stacked--no-background" element in the "content" region
