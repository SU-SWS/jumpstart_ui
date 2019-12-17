@api
Feature: Card Component
  In order to verify that Card Component is working
  As an Admin User
  I should be able to see the component and fields in the /patterns library

  Scenario: Validate Card Component.
    Given I am logged in as a user with the "administrator" role
    And I am on "/patterns/card"

    # Fields
    Then I should see "card_image" in the "content" region
    Then I should see "card_super_headline" in the "content" region
    Then I should see "card_headline" in the "content" region
    Then I should see "card_body" in the "content" region
    Then I should see "card_link" in the "content" region
    Then I should see "card_cta_attributes" in the "content" region
    Then I should see "card_cta_label" in the "content" region
    Then I should see "card_button_label" in the "content" region
    Then I should see "card_media_wrapper_modifier_class" in the "content" region
    Then I should see "card_media_image_src" in the "content" region
    Then I should see "card_media_icon_image_src" in the "content" region
    Then I should see "card_media_video_src" in the "content" region
    Then I should see "card_media_content_attributes" in the "content" region
    Then I should see "card_media_custom" in the "content" region
    Then I should see "card_allow_media_link" in the "content" region
    Then I should see "card_icon_font_class" in the "content" region

    # Variants
    Then I should see 1 ".su-card--link" element in the "content" region
    Then I should see 1 ".su-card--horizontal" element in the "content" region
    Then I should see 1 ".su-card--minimal" element in the "content" region
    Then I should see 1 ".su-card--icon" element in the "content" region
    Then I should see 1 ".su-card--video" element in the "content" region
    Then I should see 1 ".su-card--embed" element in the "content" region
