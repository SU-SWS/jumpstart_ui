<?php

namespace Drupal\Tests\jumpstart_ui\Kernel\Layout;

use Drupal\KernelTests\KernelTestBase;
use Drupal\Core\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

/**
 * Class LayoutsTest.
 *
 * @group jumpstart_ui
 */
class LayoutsTest extends KernelTestBase {

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
   * The form class should save the values appropriately.
   */
  public function testLayout() {
    /** @var \Drupal\Core\Template\TwigEnvironment $environment */
    $environment = \Drupal::service('twig');

    $this->assertNotEmpty($environment->load("one-column.html.twig")->render());
    $this->assertNotEmpty($environment->load("one-column.html.twig")->render(['settings']));
    $this->assertNotEmpty($environment->load("one-column.html.twig")->render(['settings' => ['centered']]));
    $this->assertNotEmpty($environment->load("one-column.html.twig")->render(['region_attributes' => [], 'settings' => ['centered' => 'centered-container']]));

    $this->assertNotEmpty($environment->load("two-column.html.twig")->render());
    $this->assertNotEmpty($environment->load("two-column.html.twig")->render(['settings']));
    $this->assertNotEmpty($environment->load("two-column.html.twig")->render(['settings' => ['centered']]));
    $this->assertNotEmpty($environment->load("two-column.html.twig")->render(['region_attributes' => [], 'settings' => ['centered' => 'centered-container']]));

    $this->assertNotEmpty($environment->load("three-column.html.twig")->render());
    $this->assertNotEmpty($environment->load("three-column.html.twig")->render(['settings']));
    $this->assertNotEmpty($environment->load("three-column.html.twig")->render(['settings' => ['centered']]));
    $this->assertNotEmpty($environment->load("three-column.html.twig")->render(['region_attributes' => [], 'settings' => ['centered' => 'centered-container']]));
  }

}
