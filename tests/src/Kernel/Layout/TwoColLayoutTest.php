<?php

namespace Drupal\Tests\jumpstart_ui\Kernel\Layout;

use Drupal\KernelTests\KernelTestBase;
use Drupal\Core\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Drupal\Core\Template\Attribute;

/**
 * Class TwoColLayoutTest.
 *
 * @group jumpstart_ui
 */
class TwoColLayoutTest extends KernelTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = ['system'];

  
  /**
   * {@inheritdoc}
   */
  public function register(ContainerBuilder $container) {
    parent::register($container);

    $container->setDefinition('twig_loader__file_system', new Definition('Twig_Loader_Filesystem', [[dirname(__FILE__, 5) . '/templates/layouts/']]))
      ->addTag('twig.loader');
  }

  /**
   * Layout should render when values are passed..
   */
  public function testTwoColLayoutFullProps() {
    // Boot twig environment.
    $twig =  \Drupal::service('twig');
    $template = drupal_get_path('module', 'jumpstart_ui') . '/templates/layouts/two-column.html.twig';
    $props = $this->getProps();
    $this->setRawContent((string) twig_render_template($template, $props));
    $this->assertText("Somebody once told me php unit is gonna rule me");
    $this->assertContains("boy-is-this-a-neat-class", $this->getRawContent());
    $this->assertContains("flex-12-of-12", $this->getRawContent());
    $this->assertContains('jumpstart-ui--two-column', $this->getRawContent());
  }

  /**
   * Layout should render when values are passed..
   */
  public function testTwoColLayoutNoProps() {
    // Boot twig environment.
    $twig =  \Drupal::service('twig');
    $template = drupal_get_path('module', 'jumpstart_ui') . '/templates/layouts/two-column.html.twig';
    $this->setRawContent((string) twig_render_template($template, []));
    $this->assertNotEmpty($this->getRawContent());
    $this->assertNotContains("boy-is-this-a-neat-class", $this->getRawContent());
    $this->assertNotContains("flex-12-of-12", $this->getRawContent());
    $this->assertNotContains('jumpstart-ui--two-column', $this->getRawContent());
  }

  /**
   * Layout should render when values are passed..
   */
  public function testTwoColLayoutBadProps() {
    // Boot twig environment.
    $twig =  \Drupal::service('twig');
    $template = drupal_get_path('module', 'jumpstart_ui') . '/templates/layouts/two-column.html.twig';
    $props = $this->getProps();
    unset($props['region_attributes']);
    $this->setRawContent((string) twig_render_template($template, $props));
    $this->assertText("Somebody once told me php unit is gonna rule me");
    $this->assertContains("boy-is-this-a-neat-class", $this->getRawContent());
    $this->assertNotContains("flex-12-of-12", $this->getRawContent());
    $this->assertContains('jumpstart-ui--two-column', $this->getRawContent());
  }

  /**
   * @return array
   */
  protected function getProps() {
    return [
      'content' => ['main' => "Somebody once told me php unit is gonna rule me"],
      'region_attributes' => [
        'main' =>  new Attribute(['class' => 'main-region-attribute']),
      ],
      'settings' => [
        'extra_classes' => "boy-is-this-a-neat-class",
        'centered' => 'centered-container',
      ],
      'attributes' => new Attribute(['class' => 'wrapper-test']),
    ];
  }

}