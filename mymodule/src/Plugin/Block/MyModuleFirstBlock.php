<?php

namespace Drupal\mymodule\Plugin\Block;

use Drupal\Core\block\BlockBase;
use Drupal\Component\Annotation\Plugin;
use Drupal\Core\Annotation\Translation;
use Drupal\Core\Session\AccountInterface;

/**
 * Creating first custom block.
 *
 * @Block(
 *   id = "mymodule_first_block",
 *   admin_label = @Translation("My Module - first block")
 * )
 */
class MyModuleFirstBlock extends BlockBase {
  /**
   * Implements \Drupal\block\BlockBase::blockBuild().
   */
  public function build() {
    return array(
      '#type' => 'markup',
      '#markup' => t('This is my first block'),
    );
  }
}
