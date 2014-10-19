<?php

namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class MymoduleController extends ControllerBase {

  public static function create(ContainerInterface $container) {
    return new static($container->get('module_handler'));
  }

  public function myPage1() {
    $build = array(
      '#type' => 'markup',
      '#markup' => t('Hello world !!!'),
    );
    return $build;
  }

  public function myPage2() {
    $build = array(
      '#type' => 'markup',
      '#markup' => t('If you are seeing this page then you have permission to access this page.'),
    );
    return $build;
  }

  public function myPage3($arg1, $arg2) {
    $list[] = t('Argument 1 = @arg1', array('@arg1' => $arg1));
    $list[] = t('Argument 2 = @argument2', array('@argument2' => $arg2));
    $build['mymodule.page3'] = array(
      '#theme' => 'item_list',
      '#items' => $list,
      '#list_type' => 'ol',
      '#title' => t('Example of page containing arguments.'),
    );
    return $build;
  }
}
