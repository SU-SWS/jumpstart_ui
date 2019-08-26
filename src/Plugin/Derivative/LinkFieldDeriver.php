<?php

namespace Drupal\jumpstart_ui\Plugin\Derivative;

use Drupal\Component\Plugin\Derivative\DeriverBase;
use Drupal\Core\Entity\EntityFieldManagerInterface;
use Drupal\field\Entity\FieldConfig;
use Drupal\Core\Plugin\Discovery\ContainerDeriverInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a derivative for bundle fields.
 */
class LinkFieldDeriver extends DeriverBase implements ContainerDeriverInterface {

  /**
   * The base plugin ID that the derivative is for.
   *
   * @var string
   */
  protected $basePluginId;

  /**
   * The entity field manager service.
   *
   * @var \Drupal\Core\Entity\EntityFieldManagerInterface
   */
  protected $entityFieldManager;

  /**
   * Constructs a DsEntityRow object.
   *
   * @param string $base_plugin_id
   *   The base plugin ID.
   * @param \Drupal\Core\Entity\EntityFieldManagerInterface $entity_field_manager
   *   The entity field manager.
   */
  public function __construct(
    $base_plugin_id,
    EntityFieldManagerInterface $entity_field_manager
  ) {
    $this->basePluginId = $base_plugin_id;
    $this->entityFieldManager = $entity_field_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, $base_plugin_id) {
    return new static(
      $base_plugin_id,
      $container->get('entity_field.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getDerivativeDefinitions($base_plugin_definition) {

    // Get all link fields and loop through them as entity/bundle/field.
    $fields = $this->entityFieldManager->getFieldMapByFieldType('link');
    foreach ($fields as $entity_type => $field) {
      foreach ($field as $field_name => $usage) {
        foreach ($usage['bundles'] as $bundle_name) {

          // Not everything has instance info.
          // Keep going if nothing is available.
          $field_info = FieldConfig::loadByName($entity_type, $bundle_name, $field_name);
          if (is_null($field_info)) {
            continue;
          }

          // OK, define it.
          $id = "jumpstart_ui_" . $entity_type . "_" . $bundle_name . "_" . $field_name;
          $this->derivatives[$id] = $base_plugin_definition;
          $this->derivatives[$id] += [
            'provider' => 'jumpstart_ui',
            'title' => $field_info->label() . $this->getSuffix(),
            'entity_type' => $entity_type,
            'ui_limit' => [$bundle_name . "|*"],
            'field_name' => $field_name,
          ];
        }
      }
    }

    return $this->derivatives;
  }

  /**
   * Returns a string suffix for the derivative label based on the calling
   * plugin.
   *
   * @return string
   *   The suffix string to append to the field name.
   */
  private function getSuffix() {
    $keys = [
      'jumpstart_ui_link_field_column_label' => ': Label',
      'jumpstart_ui_link_field_column_uri' => ': URI',
    ];

    if (array_key_exists($this->basePluginId, $keys)) {
      return $keys[$this->basePluginId];
    }
  }

}
