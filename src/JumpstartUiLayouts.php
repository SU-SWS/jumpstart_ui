<?php

namespace Drupal\jumpstart_ui;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Layout\LayoutDefault;
use Drupal\Core\Plugin\PluginFormInterface;

/**
 * Class JumpstartUiLayouts.
 *
 * @package Drupal\jumpstart_ui
 */
class JumpstartUiLayouts extends LayoutDefault implements PluginFormInterface {

  /**
   * {@inheritDoc}
   */
  public function defaultConfiguration() {
    return ['extra_classes' => NULL, 'centered' => TRUE];
  }

  /**
   * {@inheritDoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = [];
    $form['extra_classes'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Extra Classes'),
      '#description' => $this->t('Add extra classes to the layout container.'),
      '#default_value' => $this->configuration['extra_classes'],
    ];
    $form['centered'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Centered Container'),
      '#default_value' => (bool) $this->configuration['centered'],
    ];
    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    $classes = explode(' ', $form_state->getValue('extra_classes'));
    $classes = array_map([
      '\Drupal\Component\Utility\Html',
      'cleanCssIdentifier',
    ], $classes);
    array_walk($classes, 'trim');
    $this->configuration['extra_classes'] = implode(' ', array_filter($classes));
    $this->configuration['centered'] = $form_state->getValue('centered') ? 'centered-container' : NULL;
  }

}
