<?php

namespace Drupal\Tests\jumpstart_ui\Unit\Plugin\TwigPlugin;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\Render\Renderer;
use Drupal\Core\Render\RendererInterface;
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

    $renderer = $this->createMock(RendererInterface::class);
    $renderer->method('render')->will($this->returnCallback(function($arg){
      return $arg;
    }));
    $this->twiggery = new JumpstartUITwig($renderer);

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

    $filters = $this->twiggery->getFilters();
    $this->assertInstanceOf(\Twig_SimpleFilter::class, $filters[0]);
    $this->assertEquals('render_clean', $filters[0]->getName());
  }

  /**
   * Run the render_clean filter.
   */
  public function testsCleanFilter() {
    $markup = '<div><a><span><article><section>test</section></article></span></a>';
    $this->assertArrayEquals(['#markup' => 'test'], $this->twiggery->renderClean($markup));

    $markup = '<div><a><span><article><section>test</section></article></span></a>';
    $this->assertArrayEquals(['#markup' => '<span>test</span>'], $this->twiggery->renderClean($markup, '<span>'));
  }

}
