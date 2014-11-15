<?php

/**
 * @file
 * Contains \Drupal\d8_block_example\Plugin\Block\DynamicBlock.
 */

namespace Drupal\d8_block_example\Plugin\Block;

use Drupal\Core\block\BlockBase;

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
      'label' => t('Default block label'),
      'd8_block_example_overridden_label' => t('Overridden block label'),
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
  public function build() {

    dpm($this->configuration);
    return array(
      '#type' => 'markup',
      '#markup' => $this->configuration['d8_block_example_default_markup'],
    );
  }

}
