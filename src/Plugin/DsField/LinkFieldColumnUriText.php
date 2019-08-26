<?php
namespace Drupal\jumpstart_ui\Plugin\DsField;

use Drupal\ds\Plugin\DsField\DsFieldBase;
use Drupal\Core\Url;

/**
 * Plugin that renders the link as plain text.
 *
 * @DsField(
 *   id = "jumpstart_ui_link_field_column_uri",
 *   deriver = "Drupal\jumpstart_ui\Plugin\Derivative\LinkFieldDeriver"
 * )
 */
class LinkFieldColumnUriText extends DsFieldBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $entity = $this->entity();
    $config = $this->getConfiguration();
    $field_name = $config['field']['field_name'];
    $delta = $config['field']['delta'] ?? 0;

    if ($entity->get($field_name)->count()) {
      $delta_values = $entity->get($field_name)->get($delta);
      $uri = $delta_values ? $delta_values->getValue()['uri'] : "internal:/";
    }

    return [
      "#plain_text" => Url::fromUri($uri)->toString(),
    ];
  }

}
