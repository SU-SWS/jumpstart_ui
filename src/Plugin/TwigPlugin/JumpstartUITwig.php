<?php

namespace Drupal\jumpstart_ui\Plugin\TwigPlugin;

use Drupal\Component\Render\MarkupInterface;
use Drupal\Component\Utility\Html;
use Drupal\Core\Render\Markup;
use Drupal\Core\Render\RendererInterface;

/**
 * Extend Drupal's Twig_Extension class.
 */
class JumpstartUITwig extends \Twig_Extension {

  /**
   * @var \Drupal\Core\Render\RendererInterface
   *
   * Renderer service.
   */
  protected $renderer;

  /**
   * JumpstartUITwig constructor.
   *
   * @param \Drupal\Core\Render\RendererInterface $renderer
   *   Renderer service.
   */
  public function __construct(RendererInterface $renderer = NULL) {
    $this->renderer = $renderer;
  }

  /**
   * {@inheritdoc}
   */
  public function getFunctions(): array {
    return [
      new \Twig_SimpleFunction('getUniqueId', [$this, 'getUniqueId']),
    ];
  }

  /**
   * {@inheritDoc}
   */
  public function getFilters(): array {
    return [
      new \Twig_SimpleFilter('render_clean', [$this, 'renderClean']),
    ];
  }

  /**
   * Generate a unique ID that won't be duplicated during this page render.
   *
   * @param string|null $id
   *   A CSS valid id string.
   *
   * @return string
   *   An Id that is unique to this page load.
   */
  public function getUniqueId(?string $id = NULL): string {
    if (is_null($id)) {
      $id = uniqid('jumpstart-ui-');
    }
    return Html::getUniqueId($id);
  }

  /**
   * Render the elements and strip all tags except those passed in.
   *
   * @param mixed $elements
   *   Should be a render array.
   * @param string $tags
   *   Optionally which tags to keep.
   *
   * @return array|null
   *   Markup render array.
   */
  public function renderClean($elements, $tags = '<drupal-render-placeholder>') {
    if ($elements instanceof Markup) {
      $elements = ['#markup' => (string) $elements];
    }

    $rendered = $this->renderer->render($elements);
    if (strpos($tags, '<drupal-render-placeholder>') === FALSE) {
      $tags .= '<drupal-render-placeholder>';
    }
    // Use a markup to flag it as "safe"
    $result = trim(strip_tags($rendered, $tags));
    return $result ? ['#markup' => $result] : NULL;
  }

}
