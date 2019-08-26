<?php

namespace Drupal\jumpstart_ui\Plugin\Field\FieldFormatter;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Provides the field link formatter.
 *
 * @FieldFormatter(
 *   id = "field_link_label_text_only",
 *   label = @Translation("Label only as text"),
 *   field_types = {
 *     "link"
 *   },
 * )
 */
class FieldLinkLabelTextOnly extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    $summary[] = $this->t('Renders the Label as plain text.');
    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];
    foreach ($items as $delta => $item) {
      $vals = $item->getValue();
      $title = $vals['title'] ?? "";
      // Render each element as plain_text.
      $element[$delta] = ['#plain_text' => $title];
    }
    return $element;
  }

}
