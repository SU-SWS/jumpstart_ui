<?php

namespace Drupal\jumpstart_ui\Plugin\Block;

use Drupal\Component\Utility\Html;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

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
  public function defaultConfiguration() {
    $config = parent::defaultConfiguration();
    $config['page_title'] = "";
    $config['wrapper'] = "h1";
    return $config;
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();

    $form['page_title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('The page title'),
      '#description' => $this->t('Plain text only in this field as it will be wrapped with an h1 tag.'),
      '#default_value' => $config['page_title'] ?? '',
    ];

    $form['wrapper'] = [
      '#type' => 'select',
      '#title' => $this->t('Heading level'),
      '#description' => $this->t('Select the level of heading you wish to render'),
      '#options' => [
        'h1' => $this->t('H1'),
        'h2' => $this->t('H2'),
        'h3' => $this->t('H3'),
        'h4' => $this->t('H4'),
        'h5' => $this->t('H5'),
        'h6' => $this->t('H6'),
      ],
      '#default_value' => $config['wrapper'] ?? "h1",
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
    $this->configuration['wrapper'] = $values['wrapper'];
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
        '#prefix' => "<" . $config['wrapper'] . " id=\"" . $id . "\" class=\"page-title\">",
        '#suffix' => "</" . $config['wrapper'] . ">",
      ],
    ];
  }

}
