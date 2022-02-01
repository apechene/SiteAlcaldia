<?php
/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @param $form
 *   The form.
 * @param $form_state
 *   The form state.
 */
function aurum_form_system_theme_settings_alter(&$form, &$form_state) {
  drupal_add_css(drupal_get_path('theme', 'aurum') . '/css/theme-settings.css');
  $form['options'] = array(
    '#type' => 'vertical_tabs',
    '#default_tab' => 'main',
    '#weight' => '-10',
    '#title' => t('aurum Theme settings'),
  );

  if(module_exists('nikadevs_cms')) {
    $form['options']['nd_layout_builder'] = nikadevs_cms_layout_builder();
  }
  else {
    drupal_set_message('Enable NikaDevs CMS module to use layout builder.');
  }

  $form['options']['main'] = array(
    '#type' => 'fieldset',
    '#title' => t('Main settings'),
  );
  $skins = array('base', 'blue', 'brown', 'green', 'lime', 'orange', 'purple', 'red');
  $form['options']['main']['skin'] = array(
    '#type' => 'radios',
    '#title' => t('Skin'),
    '#options' => array_combine($skins, $skins),
    '#default_value' => theme_get_setting('skin'),
    '#attributes' => array('class' => array('color-radios')),
  );
  $form['options']['main']['retina'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable Retina Script'),
    '#default_value' => theme_get_setting('retina'),
    '#description'   => t("Only for retina displays and for manually added images. The script will check if the same image with suffix @2x exists and will show it."),
  );
  $form['options']['main']['boxed'] = array(
    '#type' => 'checkbox',
    '#title' => t('Boxed view'),
    '#default_value' => theme_get_setting('boxed'),
  );
  $form['options']['main']['bg_form'] = array(
    '#type' => 'container',
    '#states' => array(
      'visible' => array(
        ':input[name="boxed"]' => array('checked' => TRUE),
      )
    )
  );
  $form['options']['main']['bg_form']['bg_upload'] = array(
    '#type' => 'file',
    '#title' => t('Upload a new bg image'),
  );
  if(theme_get_setting('bg_fid') && $file = file_load(theme_get_setting('bg_fid'))) {
    $form['options']['main']['bg_form']['image_preview'] = array(
      '#markup' => theme('image_style', array('style_name' => 'medium', 'path' => $file->uri)),
    );
    $form['options']['main']['bg_form']['bg_fid'] = array(
      '#type' => 'hidden',
      '#value' => theme_get_setting('bg_fid'),
    );
    $form['options']['main']['bg_form']['image_delete'] = array(
      '#type' => 'checkbox',
      '#title' => t('Delete image'),
      '#default_value' => FALSE,
    );
  }

  $form['options']['main']['sticky'] = array(
    '#type' => 'checkbox',
    '#title' => t('Sticky Header'),
    '#default_value' => theme_get_setting('sticky'),
  );

  $form['options']['gmap'] = array(
    '#type' => 'fieldset',
    '#title' => t('Google Map Settings'),
  );
  $form['options']['gmap']['gmap_key'] = array(
    '#type' => 'textfield',
    '#title' => t('Google Maps API Key'),
    '#default_value' => theme_get_setting('gmap_key') ? theme_get_setting('gmap_key') : '',
    '#description' => 'More information: <a href = "https://developers.google.com/maps/documentation/javascript/get-api-key">https://developers.google.com/maps/documentation/javascript/get-api-key</a>'
  );

  $form['options']['menu'] = array(
    '#type' => 'fieldset',
    '#title' => t('Menu'),
  );
  $menus = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19);
  $form['options']['menu']['menu'] = array(
    '#type' => 'select',
    '#title' => t('Menu version'),
    '#options' => array_combine($menus, $menus),
    '#default_value' => theme_get_setting('menu'),
    '#attributes' => array('class' => array('menu-selector', 'form-control')),
    '#prefix' => '<div class = "row"><div class = "col-sm-6">',
  );
  $menu_color = array(
    'base' => t('Base'),
    'white' => t('Light'),
    'dark' => t('Dark'),
  );
  $form['options']['menu']['menu_color'] = array(
    '#type' => 'select',
    '#title' => t('Menu color'),
    '#options' => $menu_color,
    '#default_value' => theme_get_setting('menu_color'),
    '#attributes' => array('class' => array('form-control')),
    '#prefix' => '</div><div class = "col-sm-6">',
    '#suffix' => '</div></div>'
  );
  $form['options']['menu']['menu_address'] = array(
    '#type' => 'textfield',
    '#title' => t('Address'),
    '#default_value' => theme_get_setting('menu_address'),
    '#attributes' => array('class' => array('form-control')),
    '#states' => array(
      'visible' => array(
        '.menu-selector' => array('!value' => 1),
        '.menu-selector, ab' => array('!value' => 3),
        '.menu-selector, ac' => array('!value' => 4),
        '.menu-selector, ad' => array('!value' => 5),
        '.menu-selector, ae' => array('!value' => 6),
        '.menu-selector, af' => array('!value' => 7),
        '.menu-selector, ag' => array('!value' => 8),
        '.menu-selector, ah' => array('!value' => 9),
        '.menu-selector, aj' => array('!value' => 10),
        '.menu-selector, ak' => array('!value' => 11),
        '.menu-selector, al' => array('!value' => 12),
        '.menu-selector, am' => array('!value' => 13),
        '.menu-selector, an' => array('!value' => 15),
        '.menu-selector, ao' => array('!value' => 16),
        '.menu-selector, ap' => array('!value' => 17),
        '.menu-selector, aq' => array('!value' => 18),
        '.menu-selector, ar' => array('!value' => 19),
      )
    )
  );
  $form['options']['menu']['menu_phone'] = array(
    '#type' => 'textfield',
    '#title' => t('Phone'),
    '#default_value' => theme_get_setting('menu_phone'),
    '#attributes' => array('class' => array('form-control')),
    '#states' => array(
      'visible' => array(
        '.menu-selector' => array('!value' => 6),
        '.menu-selector, ab' => array('!value' => 9),
        '.menu-selector, ac' => array('!value' => 10),
        '.menu-selector, ad' => array('!value' => 11),
        '.menu-selector, ae' => array('!value' => 12),
        '.menu-selector, af' => array('!value' => 18),
      )
    )
  );
  $form['options']['menu']['menu_email'] = array(
    '#type' => 'textfield',
    '#title' => t('Email'),
    '#default_value' => theme_get_setting('menu_email'),
    '#attributes' => array('class' => array('form-control')),
    '#states' => array(
      'visible' => array(
        '.menu-selector' => array('!value' => 2),
        '.menu-selector, ab' => array('!value' => 4),
        '.menu-selector, ac' => array('!value' => 6),
        '.menu-selector, ad' => array('!value' => 8),
        '.menu-selector, ae' => array('!value' => 10),
        '.menu-selector, af' => array('!value' => 11),
        '.menu-selector, ag' => array('!value' => 12),
        '.menu-selector, ah' => array('!value' => 14),
        '.menu-selector, aj' => array('!value' => 16),
        '.menu-selector, ak' => array('!value' => 18),
      )
    )
  );
  $form['options']['menu']['menu_social'] = array(
    '#type' => 'textarea',
    '#title' => t('Social Links'),
    '#default_value' => theme_get_setting('menu_social'),
    '#description' => t('[fontello-icon]|[URL] Separated by new line'),
    '#attributes' => array('class' => array('form-control')),
    '#states' => array(
      'visible' => array(
        '.menu-selector' => array('!value' => 5),
        '.menu-selector, .ab' => array('!value' => 9),
        '.menu-selector, .ac' => array('!value' => 10),
        '.menu-selector, .ad' => array('!value' => 11),
        '.menu-selector, .ae' => array('!value' => 17),        
      )
    ),
  );
  $form['options']['menu']['menu_links'] = array(
    '#type' => 'textarea',
    '#title' => t('Links'),
    '#default_value' => theme_get_setting('menu_links'),
    '#description' => t('[Title]|[URL] Separated by new line'),
    '#attributes' => array('class' => array('form-control')),
    '#states' => array(
      'visible' => array(
        '.menu-selector' => array('value' => 5),
      )
    ),
  );

  $form['options']['404'] = array(
    '#type' => 'fieldset',
    '#title' => t('Page 404 (Not Found)'),
  );
  $form['options']['404']['404_title'] = array(
    '#type' => 'textfield',
    '#title' => t('Title'),
    '#default_value' => theme_get_setting('404_title'),
    '#attributes' => array('class' => array('form-control')),
  );
  $form['options']['404']['404_text'] = array(
    '#type' => 'textarea',
    '#title' => t('Text'),
    '#default_value' => theme_get_setting('404_text'),
    '#attributes' => array('class' => array('form-control')),
  );

  $form['options']['403'] = array(
    '#type' => 'fieldset',
    '#title' => t('Page 403 (Access Denied)'),
  );
  $form['options']['403']['403_title'] = array(
    '#type' => 'textfield',
    '#title' => t('Title'),
    '#default_value' => theme_get_setting('403_title'),
    '#attributes' => array('class' => array('form-control')),
  );
  $form['options']['403']['403_text'] = array(
    '#type' => 'textarea',
    '#title' => t('Text'),
    '#default_value' => theme_get_setting('403_text'),
    '#attributes' => array('class' => array('form-control')),
  );

  $form['#submit'][] = 'aurum_settings_submit';
}

/**
 * Save settings data.
 */
function aurum_settings_submit($form, &$form_state) {
  $settings = array();
  
  if(isset($form_state['input']['bg_fid'])) {
    if ($form_state['input']['image_delete'] && ($file = file_load($form_state['input']['bg_fid']))) {
      file_delete($file);
      $form_state['values']['bg_fid'] = 0;
    }
  }
  if ($file = file_save_upload('bg_upload', array(), 'public://')) {
    $file->status = 1;
    file_save($file);
    variable_set(variable_get('theme_default', 'none') . '_bg_fid', $file->fid);
    $form_state['values']['bg_fid'] = $file->fid;
  }
}