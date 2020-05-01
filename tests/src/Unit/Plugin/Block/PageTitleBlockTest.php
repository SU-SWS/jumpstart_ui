<?php

namespace Drupal\Tests\jumpstart_ui\Unit\Plugin\Block;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\Session\AccountInterface;
use Drupal\Tests\UnitTestCase;
use Drupal\jumpstart_ui\Plugin\Block\PageTitleBlock;
use Drupal\Core\Form\FormState;

/**
 * Class PageTitleBlockTest
 *
 * @package Drupal\Tests\jumpstart_ui\Unit\Plugin\Block
 * @covers \Drupal\jumpstart_ui\Plugin\Block\PageTitleBlock
 */
class PageTitleBlockTest extends UnitTestCase {

  /**
   * The block plugin.
   *
   * @var \Drupal\jumpstart_ui\Plugin\Block\PageTitleBlock
   */
  protected $block;

  /**
   * The mocked path validator.
   *
   * @var \Drupal\Core\Path\PathValidatorInterface|\PHPUnit_Framework_MockObject_MockObject
   */
  protected $pathValidator;

  /**
   * The mocked path cache_contexts_manager.
   *
   * @var \Drupal\Core\Cache\Context\CacheContextsManager|\PHPUnit_Framework_MockObject_MockObject
   */
  protected $cacheContextsManager;

  /**
   * The mocked account
   *
   * @var \Drupal\Core\Session\AccountInterface||\Prophecy\Prophet
   */
  protected $account;

  /**
   * {@inheritDoc}
   */
  protected function setUp() {
    parent::setUp();

    $container = new ContainerBuilder();
    $container->set('string_translation', $this->getStringTranslationStub());

    $this->pathValidator = $this->createMock('Drupal\\Core\\Path\\PathValidatorInterface');
    $container->set('path.validator', $this->pathValidator);

    $this->cacheContextsManager = $this
      ->getMockBuilder('Drupal\\Core\\Cache\\Context\\CacheContextsManager')
      ->disableOriginalConstructor()
      ->getMock();
    $container->set('cache_contexts_manager', $this->cacheContextsManager);

    $this->account = $this->prophesize(AccountInterface::class);

    $this->block = new PageTitleBlock([], 'jumpstart_ui_page_title', ['provider' => 'jumpstart_ui']);
    \Drupal::setContainer($container);
  }

  /**
   * Test access to the block. All types with access_content should see it.
   */
  public function testAccess() {
    $this->cacheContextsManager->method('assertValidTokens')->willReturn(TRUE);
    $this->assertTrue($this->block->access($this->account->reveal()));
  }

  /**
   * Test configuration and form methods.
   */
  public function testBlock() {

    // Test form.
    $form_state = new FormState();
    $form = $this->block->blockForm([], $form_state);
    $title_text = $this->getRandomGenerator()->string();
    $form_state->setValue('page_title', $title_text);
    $form_state->setValue('wrapper', 'h2');
    $this->block->blockSubmit($form, $form_state);
    $new_config = $this->block->getConfiguration();
    $this->assertEquals($title_text, $new_config['page_title']);
    $this->assertEquals('h2', $new_config['wrapper']);

    // Test build.
    $build = $this->block->build();
    $this->assertCount(1, $build);
    $this->assertArrayHasKey('pagetitle', $build);
    $this->assertTrue($build['pagetitle']['#title'] == 'Page Title');
    $this->assertStringContainsString("<h2", $build['pagetitle']['#prefix']);
    $this->assertStringContainsString("page-title", $build['pagetitle']['#prefix']);
    $this->assertEquals("</h2>", $build['pagetitle']['#suffix']);
    $this->assertEquals($build['pagetitle']['#markup'], $title_text);
  }

}
