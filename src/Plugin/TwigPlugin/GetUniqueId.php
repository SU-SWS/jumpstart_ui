<?php

namespace Drupal\jumpstart_ui\Plugin\TwigPlugin;

use Drupal\twig_extender\Plugin\Twig\TwigPluginBase;
use Drupal\Component\Utility\Html;

/**
 * Pass through function for Drupal's Html::getUniqueId.
 *
 * @TwigPlugin(
 *   id = "jumpstart_ui_getuniqueid",
 *   label = @Translation("Get A Unique Id"),
 *   type = "function",
 *   name = "getUniqueId",
 *   function = "uuid"
 * )
 */
class GetUniqueId extends TwigPluginBase {

  /**
   * Implement getUniqueId function.
   */
  public function uuid($id) {
    if (is_null($id)) {
      $id = uniqid('jumpstart-ui-');
    }
    return Html::getUniqueId($id);
  }

}
