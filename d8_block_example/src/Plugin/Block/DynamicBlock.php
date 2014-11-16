<?php

/**
 * @file
 * Contains \Drupal\d8_block_example\Plugin\Block\DynamicBlock.
 */

namespace Drupal\d8_block_example\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Drupal 8 - Block Example : dynamic block' block.
 *
 * @Block(
 *   id = "d8_block_example_dynamic_block",
 *   admin_label = @Translation("Drupal 8 - Block Example : dynamic block")
 * )
 */
class DynamicBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return array(
      'label' => t('Drupal 8 - Block Example : dynamic block (default label)'),
      'd8_block_example_overridden_label' => t('Drupal 8 - Block Example : dynamic block (overridden label)'),
      'd8_block_example_default_markup' => t('Default block markup.'),
    );
  }

  /**
   * Override block title.
   */
  public function label() {
    return $this->configuration['d8_block_example_overridden_label'];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['d8_block_example_textfield'] = array(
      '#type' => 'textfield',
      '#title' => t('Textfield example'),
      '#description' => t('Textfield description here.'),
      '#default_value' => $this->configuration['d8_block_example_textfield'],
    );
    $form['d8_block_example_textarea'] = array(
      '#type' => 'textarea',
      '#title' => t('Textarea example'),
      '#description' => t('Textarea description here.'),
      '#default_value' => t('Textarea default value here.'),
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['d8_block_example_textfield'] = $form_state->getValue('d8_block_example_textfield');
    $this->configuration['d8_block_example_textarea'] = $form_state->getValue('d8_block_example_textarea');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    return array(
      '#type' => 'markup',
      '#markup' => $this->configuration['d8_block_example_default_markup'] . " <br /> " . $this->configuration['d8_block_example_textfield'],
    );
  }

}
