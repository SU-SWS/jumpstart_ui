<?php

namespace Drupal\Tests\jumpstart_ui\Kernel\Pattern;

use Drupal\KernelTests\KernelTestBase;
use Drupal\Core\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Drupal\Core\Template\Attribute;

/**
 * Class PatternMediaTest.
 *
 * @group jumpstart_ui
 */
class PatternMediaTest extends KernelTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = [
    'system',
    'jumpstart_ui',
    'components',
    'file',
    'ui_patterns',
    'ui_patterns_ds',
    'node',
    'user'
  ];

  public function setup() {
    parent::setup();
    // $this->installSchema('components', 'settings');
  }

  /**
   * {@inheritdoc}
   */
  public function register(ContainerBuilder $container) {
    parent::register($container);

    $container->setDefinition('twig_loader__file_system', new Definition('Twig_Loader_Filesystem',
      [
        [
          dirname(__FILE__, 5) . '/templates/components/',
          dirname(__FILE__, 5) . '/dist/templates/'
        ]
      ]
    ))
      ->addTag('twig.loader');
  }

  /**
   * Pattern should not produce duplicate ids.
   */
  public function testMediaPatternIds() {
    // Boot twig environment.
    $twig =  \Drupal::service('twig');
    $template = drupal_get_path('module', 'jumpstart_ui') . '/templates/components/media/media.html.twig';
    $props = [
      'media_caption' => ["Well, hello there. I am a caption."],
      'media_custom' => ['<div class="media">Nothing to see here, please move along.</div>'],
      'attributes' => new Attribute(['class' => 'su-media', 'id' => 'su-media']),
    ];
    $this->setRawContent((string) twig_render_template($template, $props));
    $this->assertText("Well, hello there. I am a caption.");
    $this->assertContains("https://placeimg.com/2000/1333/any", $this->getRawContent());
    $this->assertContains("id=\"su-media\"", $this->getRawContent());

    $this->setRawContent((string) twig_render_template($template, $props));
    $this->assertText("Well, hello there. I am a caption.");
    $this->assertContains("https://placeimg.com/2000/1333/any", $this->getRawContent());
    $this->assertContains("id=\"su-media--2\"", $this->getRawContent());

    $this->setRawContent((string) twig_render_template($template, $props));
    $this->assertText("Well, hello there. I am a caption.");
    $this->assertContains("https://placeimg.com/2000/1333/any", $this->getRawContent());
    $this->assertContains("id=\"su-media--2\"", $this->getRawContent());
  }

}
