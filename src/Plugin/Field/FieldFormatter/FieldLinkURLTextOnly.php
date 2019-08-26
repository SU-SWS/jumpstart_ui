<?php

namespace Drupal\jumpstart_ui\Plugin\Field\FieldFormatter;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Url;

/**
 * Provides the field link formatter.
 *
 * @FieldFormatter(
 *   id = "field_link_url_text_only",
 *   label = @Translation("URL only as text"),
 *   field_types = {
 *     "link"
 *   },
 * )
 */
class FieldLinkURLTextOnly extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    $summary[] = $this->t('Renders the URL as plain text.');
    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];
    foreach ($items as $delta => $item) {
      $urlObj = $item->getUrl();

      if (!is_object($urlObj)) {
        continue;
      }

      // Render each element as plain_text.
      $url = $urlObj->toString();
      $element[$delta] = ['#plain_text' => $url];
    }

    return $element;
  }

}
