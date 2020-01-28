<?php

namespace Drupal\jumpstart_ui\Plugin\TwigPlugin;

use Drupal\Component\Utility\Html;

/**
 * Extend Drupal's Twig_Extension class.
 */
class JumpstartUITwig extends \Twig_Extension {

  /**
   * {@inheritdoc}
   */
  public function getFunctions() {
    return [
      new \Twig_SimpleFunction('getUniqueId', [$this, 'getUniqueId']),
    ];
  }

  /**
   * Generate a unique ID that won't be duplicated during this page render.
   *
   * @param string $id
   *   A CSS valid id string.
   *
   * @return string
   *   An Id that is unique to this page load.
   */
  public function getUniqueId($id = NULL) {
    if (is_null($id)) {
      $id = uniqid('jumpstart-ui-');
    }
    return Html::getUniqueId($id);
  }

}
