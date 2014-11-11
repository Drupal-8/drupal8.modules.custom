<?php

namespace Drupal\d8_block\Plugin\Block;

use Drupal\Core\block\BlockBase;
use Drupal\Component\Annotation\Plugin;
use Drupal\Core\Annotation\Translation;
use Drupal\Core\Session\AccountInterface;

/**
 * First example of Drupal 8 block.
 *
 * @Block(
 *   id = "first_block_example",
 *   admin_label = @Translation("Drupal 8 - Block : Example1")
 * )
 */
class FirstBlockExample extends BlockBase {
  /**
   * Implements \Drupal\block\BlockBase::blockBuild().
   */
  public function build() {
    return array(
      '#type' => 'markup',
      '#markup' => t('First block example'),
    );
  }
}
