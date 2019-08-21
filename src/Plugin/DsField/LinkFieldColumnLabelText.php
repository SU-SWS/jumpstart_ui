<?php
namespace Drupal\jumpstart_ui\Plugin\DsField;

use Drupal\ds\Plugin\DsField\DsFieldBase;

/**
 * Plugin that renders the link as plain text.
 *
 * @DsField(
 *   id = "jumpstart_ui_link_field_column_label",
 *   deriver = "Drupal\jumpstart_ui\Plugin\Derivative\LinkFieldDeriver"
 * )
 */
class LinkFieldColumnLabelText extends DsFieldBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $entity = $this->entity();
    $config = $this->getConfiguration();
    $field_name = $config['field']['field_name'];
    $delta = $config['field']['delta'] ?? 0;

    $values = $entity->get($field_name)->get($delta)->getValue();
    $label = $values['title'] ?? "";

    return [
      "#plain_text" => $label,
    ];
  }

}
