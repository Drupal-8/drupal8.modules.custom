<?php

namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Drupal\Core\Url;

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

    // Drupal\Core\Url example.
    // fromRoute
    $route_name = 'mymodule.page3';
    $route_parameters = array('arg1' => 100, 'arg2' => 'test');
    $options = array(
      'query' => array('a' => 'one', 'b' => 'two'),
      'fragment' => 'testFragment',
      'absolute' => TRUE,
    );
    $fromroute_url = Url::fromRoute($route_name, $route_parameters, $options);
    $mymodule_mylink = \Drupal::l(t('Link from route'), $fromroute_url);
    $list[] = t('Link with ! = !mylink', array('!mylink' => $mymodule_mylink));
    $list[] = t('Link with @ = @mylink', array('@mylink' => $mymodule_mylink));
    $list[] = t('Url object to Uri (fromRoute) = @mylink', array('@mylink' => $fromroute_url->toString()));

    // Drupal\Core\Url example.
    // fromRoute
    $uri = 'base://page/index.php';
    $options = array(
      'query' => array('a' => 'one', 'b' => 'two'),
      'fragment' => 'testFragment',
      'absolute' => 'http://pachabhaiya.com',
    );
    $fromurl_url = Url::fromUri($uri, $options);
    $list[] = t('Url object to Uri (fromUri) = @mylink', array('@mylink' => $fromurl_url->toString()));

    $build['mymodule.page3'] = array(
      '#theme' => 'item_list',
      '#items' => $list,
      '#list_type' => 'ol',
      '#title' => t('Example of page containing arguments.'),
    );
    return $build;
  }
}
