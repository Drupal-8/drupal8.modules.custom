<?php

namespace Drupal\d8_block\Plugin\Block;

use Drupal\Core\block\BlockBase;
use Drupal\Component\Annotation\Plugin;
use Drupal\Core\Annotation\Translation;

/**
 * Provides a 'Drupal 8 - Block Example : Empty Block' block.
 *
 * @Block(
 *   id = "block_example_empty_block",
 *   admin_label = @Translation("Drupal 8 - Block Example : Empty Block")
 * )
 */
class BlockExampleEmptyBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return array();
  }

  // public function access() {
    
  // }
}
