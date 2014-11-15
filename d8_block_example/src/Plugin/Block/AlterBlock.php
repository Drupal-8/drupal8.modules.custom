<?php

/**
 * @file
 * Contains \Drupal\d8_block_example\Plugin\Block\AlterBlock.
 */

namespace Drupal\d8_block_example\Plugin\Block;

use Drupal\Core\block\BlockBase;

/**
 * Provides a 'Drupal 8 - Block Example : alter block' block.
 *
 * @Block(
 *   id = "d8_block_example_alter_block",
 *   admin_label = @Translation("Drupal 8 - Block Example : alter block")
 * )
 */
class AlterBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return array(
      '#type' => 'markup',
      '#markup' => t("This is an example of alter block example."),
    );
  }

}
