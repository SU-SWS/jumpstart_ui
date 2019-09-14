@api
Feature: Logo Component
  In order to verify that Logo Component is working
  As an Admin User
  I should be able to see the component and fields in the /patterns library

  Scenario: Validate Logo Component.
    Given I am logged in as a user with the "administrator" role
    And I am on "/patterns/logo"

    # Fields
    Then I should see "href" in the "content" region
    Then I should see "logo_text" in the "content" region
