<?php

/**
 * @file
 * Contains \Drupal\d8_block_example\Plugin\Block\StaticBlock.
 */

namespace Drupal\d8_block_example\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Drupal 8 - Block Example : static block' block.
 *
 * @Block(
 *   id = "d8_block_example_static_block",
 *   admin_label = @Translation("Drupal 8 - Block Example : static block")
 * )
 */
class StaticBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return array(
      '#type' => 'markup',
      '#markup' => t("This is an example of static block content."),
    );
  }

}
