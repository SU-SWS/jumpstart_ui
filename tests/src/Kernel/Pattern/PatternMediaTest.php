<?php

namespace Drupal\Tests\jumpstart_ui\Kernel\Pattern;

use Drupal\KernelTests\KernelTestBase;
use Drupal\Core\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Drupal\Core\Template\Attribute;
use Twig\TemplateWrapper;

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
    'user',
  ];

  /**
   * @var \Drupal\Core\Template\TwigEnvironment
   */
  protected $twig;

  /**
   * Setup.
   */
  protected function setUp() {
    parent::setUp();
    \Drupal::service('theme_installer')->install(['bartik']);
    $this->twig = \Drupal::service('twig');
  }

  /**
   * Checks to see if a value is a twig template.
   */
  public function assertTwigTemplate($value, $message = '', $group = 'Other') {
    $this->assertTrue($value instanceof TemplateWrapper, $message, $group);
  }

  /**
   * Check to see if twig namespaces are working.
   */
  public function testTwigNamespaces() {
    // Tests resolving namespaced templates in modules.
    $this->assertTwigTemplate($this->twig->load('@node/node.html.twig'), 'Found node.html.twig in node module.');

    // Tests resolving namespaced templates in jumpstart_ui.
    $this->assertTwigTemplate($this->twig->load('@jumpstart_ui/components/card/card.html.twig'), 'Found card.html.twig in jumpstart_ui module.');

    // Tests resolving namespaced templates in the Decanter templates.
    $this->assertTwigTemplate($this->twig->load('@decanter/components/card/card.twig'), 'Found card.html.twig in jumpstart_ui module.');
  }

  /**
   * Pattern should not produce duplicate ids.
   */
  public function testMediaPatternIds() {
    $props = [
      'attributes' => new Attribute(['class' => 'su-media', 'id' => 'media']),
      'media_caption' => 'You must do the things you think you cannot do.',
      'media_custom' => 'Nothing to see here. Please move along',
    ];
    $template = drupal_get_path('module', 'jumpstart_ui') . "/templates/components/media/media.html.twig";
    $this->setRawContent((string) twig_render_template($template, $props));

    $this->assertText("You must do the things you think you cannot do");
    $this->assertText("Nothing to see here");
    $this->assertContains("id=\"su-media\"", $this->getRawContent());

    $this->setRawContent((string) twig_render_template($template, $props));
    $this->assertContains("id=\"su-media--2\"", $this->getRawContent());

    $this->setRawContent((string) twig_render_template($template, $props));
    $this->assertContains("id=\"su-media--3\"", $this->getRawContent());
  }

}
