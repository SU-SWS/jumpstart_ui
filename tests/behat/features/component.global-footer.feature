@api
Feature: Global Footer Component
  In order to verify that Global Footer Component is working
  As an Admin User
  I should be able to see the component and fields in the /patterns library

  Scenario: Validate Global Footer Component.
    Given I am logged in as a user with the "administrator" role
    And I am on "/patterns/global-footer"
