<?php

/**
 * @file
 * Contains \Drupal\d8_block_example\Plugin\Block\EmptyBlock.
 */

namespace Drupal\d8_block_example\Plugin\Block;

use Drupal\Core\block\BlockBase;

/**
 * Provides a 'Drupal 8 - Block Example : empty block' block.
 *
 * @Block(
 *   id = "d8_block_example_empty_block",
 *   admin_label = @Translation("Drupal 8 - Block Example : empty block")
 * )
 */
class EmptyBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return array();
  }

}
