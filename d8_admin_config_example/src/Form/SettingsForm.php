<?php

/**
 * @file
 * Contains \Drupal\d8_admin_config_example\Form\SettingsForm.
 */

namespace Drupal\d8_admin_config_example\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'd8_admin_config_example_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // MODULE_NAME/config/install/d8_admin_config_example.settings.yml
    // Instantiate a Config object by calling the function config() with the
    // filename minus the extension.
    $config = $this->config('d8_admin_config_example.settings');

    $form['d8_admin_config_example_textfield'] = array(
      '#type' => 'textfield',
      '#title' => t('Textfield example'),
      '#description' => t('Textfield description here.'),
      '#default_value' => $config->get('textfield_example'),
    );

    $form['d8_admin_config_example_textarea'] = array(
      '#type' => 'textarea',
      '#title' => t('Textarea example'),
      '#description' => t('Textarea description here.'),
      '#default_value' => $config->get('textarea_example'),
    );

    $form['d8_admin_config_example_full_name'] = array(
      '#type' => 'fieldset',
      '#title' => t('Full name'),
    );

    $form['d8_admin_config_example_full_name']['d8_admin_config_example_first_name'] = array(
      '#type' => 'textfield',
      '#title' => t('First name'),
      '#description' => t('Enter your first name.'),
      '#default_value' => $config->get('full_name.first_name'),
    );

    $form['d8_admin_config_example_full_name']['d8_admin_config_example_last_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Last name'),
      '#description' => t('Enter your last name.'),
      '#default_value' => $config->get('full_name.last_name'),
    );

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

    // Validate empty textfield.
    if ($form_state->isValueEmpty('d8_admin_config_example_textfield')) {
      // $form_state->setError($form['d8_admin_config_example_textfield'], t('Textfield example field should not be left empty.'));
      $form_state->setErrorByName('d8_admin_config_example_textfield', $this->t('Textfield example field should not be left empty.'));
    }

    return parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('d8_admin_config_example.settings');

    // Set the configuration data into a config object and save it.
    $config
      ->set('textfield_example', $form_state->getValue('d8_admin_config_example_textfield'))
      ->set('textarea_example', $form_state->getValue('d8_admin_config_example_textarea'))
      ->set('full_name.first_name', $form_state->getValue('d8_admin_config_example_first_name'))
      ->set('full_name.last_name', $form_state->getValue('d8_admin_config_example_last_name'))
      ->save();

    parent::submitForm($form, $form_state);
  }
}
