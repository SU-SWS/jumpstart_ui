@api
Feature: Local Footer Component
  In order to verify that Local Footer Component is working
  As an Admin User
  I should be able to see the component and fields in the /patterns library

  Scenario: Validate Local Footer Component.
    Given I am logged in as a user with the "administrator" role
    And I am on "/patterns/localfooter"

    # Fields
    Then I should see "lockup_title" in the "content" region
    Then I should see "headercontent" in the "content" region
    Then I should see "cell1" in the "content" region
    Then I should see "cell2" in the "content" region
    Then I should see "cell3" in the "content" region
    Then I should see "address" in the "content" region
    Then I should see "action_links" in the "content" region
    Then I should see "social_links" in the "content" region
    Then I should see "primary_links_header" in the "content" region
    Then I should see "primary_links" in the "content" region
    Then I should see "secondary_links_header" in the "content" region
    Then I should see "secondary_links" in the "content" region
    Then I should see "signup_form_content" in the "content" region
    Then I should see "signup_form_action" in the "content" region
    Then I should see "signup_form_method" in the "content" region
    Then I should see "signup_form_field_email" in the "content" region
    Then I should see "signup_form_field_email_placeholder" in the "content" region
    Then I should see "signup_form_field_submit" in the "content" region
    Then I should see "signup_form_field_submit_value" in the "content" region
    Then I should see "signup_form_fields" in the "content" region
    Then I should see "weblogin_url" in the "content" region
    Then I should see "weblogin_text" in the "content" region
