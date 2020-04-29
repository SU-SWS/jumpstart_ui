<?php

namespace Drupal\jumpstart_ui\Plugin\Block;

use Drupal\Component\Utility\Html;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a block that outputs an h1 tag.
 *
 * @Block(
 *   id = "jumpstart_ui_page_title",
 *   admin_label = @Translation("Custom Page Title"),
 * )
 */
class PageTitleBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();

    $form['page_title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('The page'),
      '#description' => $this->t('Plain text only in this field as it will be wrapped with an h1 tag.'),
      '#default_value' => isset($config['page_title']) ? $config['page_title'] : '',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    parent::blockSubmit($form, $form_state);
    $values = $form_state->getValues();
    $this->configuration['page_title'] = $values['page_title'];
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $id = Html::getUniqueId('page-title');
    $config = $this->getConfiguration();
    return [
      'pagetitle' => [
        '#title' => $this->t('Page Title'),
        '#markup' => $config['page_title'] ?? $this->t("No page title provided"),
        '#prefix' => "<h1>",
        '#suffix' => "</h1>",
        '#attributes' => [
          'id' => $id,
          'class' => ['page-title'],
        ],
      ],
    ];
  }

}
