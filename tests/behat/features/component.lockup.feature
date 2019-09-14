@api
Feature: Lockup Component
  In order to verify that Lockup Component is working
  As an Admin User
  I should be able to see the component and fields in the /patterns library

  Scenario: Validate Lockup Component.
    Given I am logged in as a user with the "administrator" role
    And I am on "/patterns/lockup"

    # Fields
    Then I should see "link" in the "content" region
    Then I should see "line1" in the "content" region
    Then I should see "line2" in the "content" region
    Then I should see "line3" in the "content" region
    Then I should see "line4" in the "content" region
    Then I should see "line5" in the "content" region

    # Variants
    Then I should see 1 ".su-lockup--option-a" element in the "content" region
    Then I should see 1 ".su-lockup--option-b" element in the "content" region
    Then I should see 1 ".su-lockup--option-c" element in the "content" region
    Then I should see 1 ".su-lockup--option-d" element in the "content" region
    Then I should see 1 ".su-lockup--option-e" element in the "content" region
    Then I should see 1 ".su-lockup--option-f" element in the "content" region
    Then I should see 1 ".su-lockup--option-g" element in the "content" region
    Then I should see 1 ".su-lockup--option-h" element in the "content" region
    Then I should see 1 ".su-lockup--option-i" element in the "content" region
    Then I should see 1 ".su-lockup--option-j" element in the "content" region
    Then I should see 1 ".su-lockup--option-k" element in the "content" region
    Then I should see 1 ".su-lockup--option-l" element in the "content" region
    Then I should see 1 ".su-lockup--option-m" element in the "content" region
    Then I should see 1 ".su-lockup--option-n" element in the "content" region
    Then I should see 1 ".su-lockup--option-o" element in the "content" region
    Then I should see 1 ".su-lockup--option-p" element in the "content" region
    Then I should see 1 ".su-lockup--option-q" element in the "content" region
    Then I should see 1 ".su-lockup--option-r" element in the "content" region
    Then I should see 1 ".su-lockup--option-s" element in the "content" region
    Then I should see 1 ".su-lockup--option-t" element in the "content" region
