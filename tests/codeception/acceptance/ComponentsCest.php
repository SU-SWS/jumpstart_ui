<?php

/**
 * Class ComponentsCest.
 *
 * @group jumpstart_ui
 */
class ComponentsCest {

  /**
   * Log in as admin before each step.
   */
  public function _before(AcceptanceTester $I) {
    $I->logInWithRole('administrator');
    $I->amOnPage('/patterns');
  }

  /**
   * Alert Component.
   */
  public function testAlert(AcceptanceTester $I) {
    $I->click('View Alert as stand-alone');

    $I->canSee('alert_icon', '#content');
    $I->canSee('alert_label', '#content');
    $I->canSee('alert_header', '#content');
    $I->canSee('alert_text', '#content');
    $I->canSee('alert_dismiss', '#content');
    $I->canSee('alert_footer', '#content');

    $I->canSeeNumberOfElements('#content .su-alert--error', 1);
    $I->canSeeNumberOfElements('#content .su-alert--success', 1);
    $I->canSeeNumberOfElements('#content .su-alert--warning', 1);
    $I->canSeeNumberOfElements('#content .su-alert--info', 1);
  }

  /**
   * Brand Bar Component.
   */
  public function testBrandBar(AcceptanceTester $I) {
    $I->click('View Brand Bar as stand-alone');

    $I->canSeeNumberOfElements('#content .su-brand-bar--bright', 1);
    $I->canSeeNumberOfElements('#content .su-brand-bar--dark', 1);
    $I->canSeeNumberOfElements('#content .su-brand-bar--white', 1);
  }

  /**
   * Button Component.
   */
  public function testButton(AcceptanceTester $I) {
    $I->click('View Button as stand-alone');

    $I->canSee('button_label', '#content');
    $I->canSee('button_value', '#content');
    $I->canSee('button_name', '#content');
    $I->canSee('button_type', '#content');

    $I->canSeeNumberOfElements('#content .su-button--secondary', 1);
    $I->canSeeNumberOfElements('#content .su-button--big', 1);
    $I->canSeeNumberOfElements('#content .su-button--unstyled', 1);
  }

  /**
   * Card Component.
   */
  public function testCard(AcceptanceTester $I) {
    $I->click('View Card as stand-alone');

    $I->canSee('card_image', '#content');
    $I->canSee('card_super_headline', '#content');
    $I->canSee('card_headline', '#content');
    $I->canSee('card_body', '#content');
    $I->canSee('card_link', '#content');
    $I->canSee('card_cta_attributes', '#content');
    $I->canSee('card_cta_label', '#content');
    $I->canSee('card_button_label', '#content');
    $I->canSee('card_media_wrapper_modifier_class', '#content');
    $I->canSee('card_media_image_src', '#content');
    $I->canSee('card_media_icon_image_src', '#content');
    $I->canSee('card_media_video_src', '#content');
    $I->canSee('card_media_content_attributes', '#content');
    $I->canSee('card_media_custom', '#content');
    $I->canSee('card_allow_media_link', '#content');
    $I->canSee('card_icon_font_class', '#content');

    $I->canSeeNumberOfElements('#content .su-card--link', 1);
    $I->canSeeNumberOfElements('#content .su-card--horizontal', 1);
    $I->canSeeNumberOfElements('#content .su-card--minimal', 1);
    $I->canSeeNumberOfElements('#content .su-card--icon', 1);
    $I->canSeeNumberOfElements('#content .su-card--video', 1);
    $I->canSeeNumberOfElements('#content .su-card--embed', 1);

    $href = $I->grabAttributeFrom('.su-card__link', 'href');
    $I->assertEquals($href, "https://stanford.edu/?a=b&c=d");
  }

  /**
   * CTA Component.
   */
  public function testCta(AcceptanceTester $I) {
    $I->click('View CTA as stand-alone');

    $I->canSee('image_src', '#content');
    $I->canSee('image_alt', '#content');
    $I->canSee('button_text', '#content');
    $I->canSee('link', '#content');
    $I->canSee('icon_src', '#content');
    $I->canSee('icon_alt', '#content');

    $I->canSeeNumberOfElements('#content .su-cta--button-bottom', 1);
    $I->canSeeNumberOfElements('#content .su-cta--button-bottom-icon', 1);
    $I->canSeeNumberOfElements('#content .su-cta--button-center', 1);
  }

  /**
   * Date Stacked Component.
   */
  public function testDateStacked(AcceptanceTester $I) {
    $I->click('View Date Stacked as stand-alone');

    $I->canSee('month_of_year', '#content');
    $I->canSee('day_of_month', '#content');

    $I->canSeeNumberOfElements('#content .su-date-stacked--no-background', 1);
  }

  /**
   * Global Footer Component.
   */
  public function testGlobalFooter(AcceptanceTester $I) {
    $I->click('View Global Footer as stand-alone');
    $I->canSeeNumberOfElements('.su-global-footer a', 11);
  }

  /**
   * Hero Component.
   */
  public function testHero(AcceptanceTester $I) {
    $I->click('View Hero as stand-alone');

    $I->canSee('hero_image', '#content');
    $I->canSee('hero_media', '#content');
    $I->canSee('hero_super_headline', '#content');
    $I->canSee('hero_headline', '#content');
    $I->canSee('hero_cta_link', '#content');
    $I->canSee('hero_cta_attributes', '#content');
    $I->canSee('hero_cta_label', '#content');
    $I->canSee('hero_button_link', '#content');
    $I->canSee('hero_button_label', '#content');

    $I->canSeeNumberOfElements('#content .su-hero--youtube', 1);
  }

  /**
   * Link Component.
   */
  public function testLink(AcceptanceTester $I) {
    $I->click('View Card as stand-alone');

    $I->canSee('card_image', '#content');
    $I->canSee('card_super_headline', '#content');
    $I->canSee('card_headline', '#content');
    $I->canSee('card_body', '#content');
    $I->canSee('card_link', '#content');
    $I->canSee('card_cta_attributes', '#content');
    $I->canSee('card_cta_label', '#content');
    $I->canSee('card_button_label', '#content');

    $I->canSeeNumberOfElements('#content .su-card--link', 1);
    $I->canSeeNumberOfElements('#content .su-card--horizontal', 1);
  }

  /**
   * Local Footer Component.
   */
  public function testLocalFooter(AcceptanceTester $I) {
    $I->click('View Local Footer as stand-alone');

    $I->canSee('lockup_title', '#content');
    $I->canSee('headercontent', '#content');
    $I->canSee('cell1', '#content');
    $I->canSee('cell2', '#content');
    $I->canSee('cell3', '#content');
    $I->canSee('address', '#content');
    $I->canSee('action_links', '#content');
    $I->canSee('social_links', '#content');
    $I->canSee('primary_links_header', '#content');
    $I->canSee('primary_links', '#content');
    $I->canSee('secondary_links_header', '#content');
    $I->canSee('secondary_links', '#content');
    $I->canSee('signup_form_content', '#content');
    $I->canSee('signup_form_action', '#content');
    $I->canSee('signup_form_method', '#content');
    $I->canSee('signup_form_field_email', '#content');
    $I->canSee('signup_form_field_email_placeholder', '#content');
    $I->canSee('signup_form_field_submit', '#content');
    $I->canSee('signup_form_field_submit_value', '#content');
    $I->canSee('signup_form_fields', '#content');
    $I->canSee('weblogin_url', '#content');
    $I->canSee('weblogin_text', '#content');
  }

  /**
   * Lockup Component.
   */
  public function testLockup(AcceptanceTester $I) {
    $I->click('View Lockup as stand-alone');

    $I->canSee('link', '#content');
    $I->canSee('line1', '#content');
    $I->canSee('line2', '#content');
    $I->canSee('line3', '#content');
    $I->canSee('line4', '#content');
    $I->canSee('line5', '#content');

    $I->canSeeNumberOfElements('#content .su-lockup--option-a', 1);
    $I->canSeeNumberOfElements('#content .su-lockup--option-b', 1);
    $I->canSeeNumberOfElements('#content .su-lockup--option-c', 1);
    $I->canSeeNumberOfElements('#content .su-lockup--option-d', 1);
    $I->canSeeNumberOfElements('#content .su-lockup--option-e', 1);
    $I->canSeeNumberOfElements('#content .su-lockup--option-f', 1);
    $I->canSeeNumberOfElements('#content .su-lockup--option-g', 1);
    $I->canSeeNumberOfElements('#content .su-lockup--option-h', 1);
    $I->canSeeNumberOfElements('#content .su-lockup--option-i', 1);
    $I->canSeeNumberOfElements('#content .su-lockup--option-j', 1);
    $I->canSeeNumberOfElements('#content .su-lockup--option-k', 1);
    $I->canSeeNumberOfElements('#content .su-lockup--option-l', 1);
    $I->canSeeNumberOfElements('#content .su-lockup--option-m', 1);
    $I->canSeeNumberOfElements('#content .su-lockup--option-n', 1);
    $I->canSeeNumberOfElements('#content .su-lockup--option-o', 1);
    $I->canSeeNumberOfElements('#content .su-lockup--option-p', 1);
    $I->canSeeNumberOfElements('#content .su-lockup--option-q', 1);
    $I->canSeeNumberOfElements('#content .su-lockup--option-r', 1);
    $I->canSeeNumberOfElements('#content .su-lockup--option-s', 1);
    $I->canSeeNumberOfElements('#content .su-lockup--option-t', 1);
  }

  /**
   * Logo Component.
   */
  public function testLogo(AcceptanceTester $I) {
    $I->click('View Logo as stand-alone');

    $I->canSee('href', '#content');
    $I->canSee('logo_text', '#content');
  }

  /**
   * Media Component.
   */
  public function testMedia(AcceptanceTester $I) {
    $I->click('View Media as stand-alone');

    $I->canSee('media_caption', '#content');
    $I->canSee('media_image_src', '#content');
    $I->canSee('media_link', '#content');
    $I->canSee('media_link_attributes', '#content');
    $I->canSee('media_video_src', '#content');
    $I->canSee('media_audio_src', '#content');
    $I->canSee('media_content_attributes', '#content');
    $I->canSee('media_custom', '#content');

    $I->canSeeNumberOfElements('#content .su-media--image', 1);
    $I->canSeeNumberOfElements('#content .su-media--video', 1);
    $I->canSeeNumberOfElements('#content .su-media--audio', 1);
  }

  /**
   * Quote Component.
   */
  public function testQuote(AcceptanceTester $I) {
    $I->click('View Quote as stand-alone');

    $I->canSee('text', '#content');
    $I->canSee('bio', '#content');
    $I->canSee('name', '#content');
    $I->canSee('src', '#content');
    $I->canSee('alt', '#content');
  }

  /**
   * Skiplink Component.
   */
  public function testSkiplink(AcceptanceTester $I) {
    $I->click('Skip to main content');

    $I->canSee('href', '#main-content');

    $I->canSeeNumberOfElements('#main-content .visually-hidden .focusable', 1);
  }

}
