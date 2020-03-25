<?php

namespace Drupal\jumpstart_ui\Layouts;

use Drupal\Core\Form\FormStateInterface;

/**
 * Configurable options for the two column layout.
 *
 * @package Drupal\jumpstart_ui\Layouts
 */
class JumpstartUiTwoColumnLayout extends JumpstartUiLayouts {

  const EQUAL = 'equal';

  const LEFT = 'left';

  const RIGHT = 'right';

  public function defaultConfiguration() {
    $config = parent::defaultConfiguration();
    $config['orientation'] = self::RIGHT;
    return $config;
  }

  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildConfigurationForm($form, $form_state);
    $form['orientation'] = [
      '#type' => 'select',
      '#title' => $this->t('Orientation'),
      '#default_value' => $this->getConfiguration()['orientation'],
      '#options' => [
        self::RIGHT => $this->t('Larger Right Column'),
        self::EQUAL => $this->t('Equal Columns'),
        self::LEFT => $this->t('Larger Left Column'),
      ],
    ];
    return $form;
  }

  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    parent::submitConfigurationForm($form, $form_state);
    $this->configuration['orientation'] = $form_state->getValue('orientation');
  }

}
