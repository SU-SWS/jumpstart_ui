<?php

namespace Drupal\Tests\jumpstart_ui\Unit\Plugin\TwigPlugin;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\Session\AccountInterface;
use Drupal\Tests\UnitTestCase;
use Drupal\jumpstart_ui\Plugin\TwigPlugin\JumpstartUITwig;

/**
 * Class JumpstartUITwigTest
 *
 * @package Drupal\Tests\jumpstart_ui\Unit\Plugin\TwigPlugin
 * @covers \Drupal\jumpstart_ui\Plugin\TwigPlugin\JumpstartUITwig
 */
class JumpstartUITwigTest extends UnitTestCase {

  /**
   * Twig extension plugin instance.
   *
   * @var \Drupal\jumpstart_ui\Plugin\TwigPlugin\JumpstartUITwig
   */
  protected $twiggery;

  /**
   * {@inheritDoc}
   */
  protected function setUp() {
    parent::setUp();
    $container = new ContainerBuilder();
    $container->set('string_translation', $this->getStringTranslationStub());

    $this->twiggery = new JumpstartUITwig();

    \Drupal::setContainer($container);
  }

  /**
   * Test getUniqueId generation.
   */
  public function testgetUniqueId() {
    $key = "test";
    $this->assertEquals('test', $this->twiggery->getUniqueId($key));
    $this->assertEquals('test--2', $this->twiggery->getUniqueId($key));
    $this->assertEquals('test--3', $this->twiggery->getUniqueId($key));

    $def1 = $this->twiggery->getUniqueId();
    $def2 = $this->twiggery->getUniqueId();
    $this->assertContains('jumpstart-ui-', $def1);
    $this->assertContains('jumpstart-ui-', $def2);
    $this->assertNotEquals($def1, $def2);
  }

  /**
   * Ensure we packed all our bags.
   */
  public function testGetFunctions() {
    $functs = $this->twiggery->getFunctions();
    $this->assertInstanceOf(\Twig_SimpleFunction::class, $functs[0]);
    $this->assertEquals('getUniqueId', $functs[0]->getName());
  }

}
