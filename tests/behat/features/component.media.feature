@api
Feature: Media Component
  In order to verify that Media Component is working
  As an Admin User
  I should be able to see the component and fields in the /patterns library

  Scenario: Validate Media Component.
    Given I am logged in as a user with the "administrator" role
    And I am on "/patterns/media"

    # Fields
    Then I should see "media_caption" in the "content" region
    Then I should see "media_image_src" in the "content" region
    Then I should see "media_link" in the "content" region
    Then I should see "media_link_attributes" in the "content" region
    Then I should see "media_video_src" in the "content" region
    Then I should see "media_audio_src" in the "content" region
    Then I should see "media_content_attributes" in the "content" region
    Then I should see "media_custom" in the "content" region

    # Variants
    Then I should see 1 ".su-media--image" element in the "content" region
    Then I should see 1 ".su-media--video" element in the "content" region
    Then I should see 1 ".su-media--audio" element in the "content" region
