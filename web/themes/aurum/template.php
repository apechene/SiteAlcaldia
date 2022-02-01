<?php

function _count_comments($val) {
  return isset($val['#comment']);
}

function _get_node_field($node, $field, $lang = 'en') {
  global $language;
  $var = FALSE;
  if(!empty($node->{$field}[$lang])) {
      $var = $node->{$field}[$lang];
  } elseif(!empty($node->{$field}[$language->language])) {
      $var = $node->{$field}[$language->language];
  } elseif(!empty($node->{$field}['und'])) {
      $var = $node->{$field}['und'];
  } elseif(!empty($node->{$field})) {
      $var = $node->{$field};
  }
  return $var;
}

function aurum_image_style($variables) {
  //$variables['alt'] = empty($variables['alt']) ? 'Alt' : '';
  return theme_image_style($variables);
}

function aurum_image($variables) {
  //$variables['alt'] = empty($variables['alt']) ? 'Alt' : '';
  return theme_image($variables);
}


/**
 * Implementation of hook_preprocess_html().
 */
function aurum_preprocess_html(&$variables) {
  //drupal_add_css(drupal_get_path('theme', 'aurum_sub') . '/css/custom.css', array('group' => CSS_THEME));
  $css = array('global', 'portfolio', 'social', 'typo', 'page-nav', 'boxes', 'comments', 'testimonials', 'accordion', 'counters', 'tabs', 'shadows', 'pricing-tables', 'tooltips', 'slider', 'animations', 'timeline');
  foreach ($css as $filename) {
    drupal_add_css(drupal_get_path('theme', 'aurum') . '/css/' . theme_get_setting('skin') . '/' . $filename . '.css', array('group' => CSS_THEME, 'weight' => -5, 'every_page' => TRUE));
  }
  if(theme_get_setting('retina')) {
    drupal_add_js(drupal_get_path('theme', 'aurum') . '/js/jquery.retina.js');
  }
  $variables['classes_array'][] = theme_get_setting('boxed') ? 'pi-fixed' : 'pi-full';
  if(theme_get_setting('boxed') && $file = file_load(theme_get_setting('bg_fid'))) {
    $variables['attributes_array']['style'] = 'background: url(' . file_create_url($file->uri) . ') #ffffff;';
  }
  drupal_add_js(array(
    'aurum' => array(
      'sticky' => theme_get_setting('sticky')
    ),
  ), 'setting');
}

/**
 * Overrides theme_menu_tree().
 */
function aurum_menu_tree(&$variables) {
  return $variables['tree'];
}

/**
 * Overrides theme_menu_tree().
 */
function aurum_menu_tree__main_menu(&$variables) {
  return $variables['tree'];
}

function aurum_menu_link(array $variables) {

  $element = $variables['element'];
  $sub_menu = '';

  if (!(strpos($element['#href'], "_anchor_") === false)) {
    $element['#localized_options']['attributes']['data-scroll-to'] = str_replace("http://_anchor_", '#', $element['#href']);
    $element['#href'] = str_replace("http://_anchor_", '//' . $_SERVER['HTTP_HOST'] . request_uri() . '#', $element['#href']);
  }

  if ($element['#below']) {
    $element['#attributes']['class'][] = 'pi-has-dropdown';
    unset($element['#below']['#theme_wrappers']);
    $sub_menu = '<ul class = "pi-submenu pi-has-border pi-items-have-borders pi-has-shadow pi-submenu-dark">' . drupal_render($element['#below']) . '</ul>';
  }
  $element['#localized_options']['html'] = TRUE;
  $output = l('<span>' . $element['#title'] . '</span>', $element['#href'], $element['#localized_options']);
  if (($element['#href'] == $_GET['q'] || ($element['#href'] == '<front>' && drupal_is_front_page())) && (empty($element['#localized_options']['language']))) {
    $element['#attributes']['class'][] = 'active';
  }

  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

function aurum_mobile_menu($tree) {
  $output = '';
  foreach($tree as $item) {
    if($item['link']['hidden'] <> 1) {
      $class = $item['link']['link_path'] == $_GET['q'] || ($item['link']['link_path'] == '<front>' && drupal_is_front_page() && !isset($item['link']['options']['fragments'])) ? ' class = "active"' : '';
      $output .= '<li ' . $class . '>';
      $href = strpos($item['link']['href'], "_anchor_") !== false ? str_replace("http://_anchor_", '#', $item['link']['href']) : url($item['link']['href'], $item['link']['options']);

      $output .= '<a href = "'. $href .'"><span>' . t($item['link']['title']) . '</span></a>';
      if(!empty($item['below']) && _aurum_mobile_menu_check_below($item['below']) === TRUE) {
        $output .= '<ul>' . aurum_mobile_menu($item['below']) . '</ul>';
      }
      $output .= '</li>';
    }
  }
  return $output;
}

function _aurum_mobile_menu_check_below($below) {
  foreach($below as $item) {
    if ($item['link']['hidden'] != '1') {
      return TRUE;
    }
  }
  return FALSE;
}

/**
 * Update status messages
*/
function aurum_status_messages($variables) {
  $display = $variables['display'];
  $output = '';

  $status_heading = array(
    'status' => t('Status message'),
    'error' => t('Error message'),
    'warning' => t('Warning message'),
  );
  $types = array(
    'status' => 'success',
    'error' => 'danger',
    'warning' => 'warning',
  );
  foreach (drupal_get_messages($display) as $type => $messages) {
    $output .= "<div class=\"pi-alert-with-icon pi-padding-bottom-20 fade in pi-alert-" . $types[$type] . "\">\n<button type='button' class='pi-close' data-dismiss='alert'><i class='icon-cancel'></i></button>";
    if (!empty($status_heading[$type])) {
      $output .= '<h2 class="element-invisible">' . $status_heading[$type] . "</h2>\n";
    }
    if (count($messages) > 1) {
      $output .= " <ul>\n";
      foreach ($messages as $message) {
        $output .= '  <li>' . $message . "</li>\n";
      }
      $output .= " </ul>\n";
    }
    else {
      $output .= $messages[0];
    }
    $output .= "</div>\n";
  }
  return $output;
}

/**
 * Implementation of hook_css_alter().
 */
function aurum_css_alter(&$css) {
  // Disable standart css from ubercart
  unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
  //unset($css[drupal_get_path('module', 'system') . '/system.base.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);
  unset($css[drupal_get_path('module', 'search') . '/search.css']);
}

/**
 *  Implements theme_textfield().
 */
function aurum_textfield($variables) {
  $element = $variables['element'];
  $element['#attributes']['type'] = 'text';
  element_set_attributes($element, array(
    'id',
    'name',
    'value',
    'size',
    'maxlength',
  ));
  $output = '<input' . drupal_attributes($element['#attributes']) . ' />';
  $extra = '';
  if ($element['#autocomplete_path'] && drupal_valid_path($element['#autocomplete_path'])) {
    drupal_add_library('system', 'drupal.autocomplete');
    $element['#attributes']['class'][] = 'form-autocomplete';
    $attributes = array();
    $attributes['type'] = 'hidden';
    $attributes['id'] = $element['#attributes']['id'] . '-autocomplete';
    $attributes['value'] = url($element['#autocomplete_path'], array('absolute' => TRUE));
    $attributes['disabled'] = 'disabled';
    $attributes['class'][] = 'autocomplete';
    $output = '<div class="input-group">' . $output . '<span class="input-group-addon"><i class = "fa fa-refresh"></i></span></div>';
    $extra = '<input' . drupal_attributes($attributes) . ' />';
  }
  $output .= $extra; 
  if(isset($element['#nd_icon'])) {
    $size_class = in_array('input-lg', $element['#attributes']['class']) ? ' pi-input-with-icon-lg' : '';
    $size_class .= in_array('input-sm', $element['#attributes']['class']) ? ' pi-input-with-icon-sm' : '';
    $output = '<div class="pi-input-with-icon' . $size_class .'"><div class="pi-input-icon"><i class="' . $element['#nd_icon'] . '"></i></div>' . $output .  '</div>';
  }
  $output = '<div class = "form-group">' . $output . '</div>';
  return $output;
}

/**
 *  Implements theme_textarea().
 */
function aurum_textarea($variables) {
  $element = $variables['element'];
  element_set_attributes($element, array('id', 'name', 'cols', 'rows'));
  _form_set_class($element, array('form-textarea', 'form-control'));

  $wrapper_attributes = array(
    'class' => array('form-textarea-wrapper', 'form-group'),
  );

  // Add resizable behavior.
  if (!empty($element['#resizable'])) {
    drupal_add_library('system', 'drupal.textarea');
    $wrapper_attributes['class'][] = 'resizable';
  }

  $icon = '';
  if(isset($element['#nd_icon'])) {
    $wrapper_attributes['class'][] = 'pi-input-with-icon';
    $size_class = in_array('input-lg', $element['#attributes']['class']) ? ' pi-input-with-icon-lg' : '';
    $wrapper_attributes['class'][] = $size_class;
    $size_class .= in_array('input-sm', $element['#attributes']['class']) ? ' pi-input-with-icon-sm' : '';
    $wrapper_attributes['class'][] = $size_class;
    $icon = '<div class="pi-input-icon"><i class="' . $element['#nd_icon'] . '"></i></div>';
  }

  $output = '<div' . drupal_attributes($wrapper_attributes) . '>';
  $output .= $icon . '<textarea' . drupal_attributes($element['#attributes']) . '>' . check_plain($element['#value']) . '</textarea>';
  $output .= '</div>';
  return $output;
}

/**
 *  Implements theme_select().
 */
function aurum_select($variables) {
  $element = $variables['element'];
  element_set_attributes($element, array('id', 'name', 'size'));
  if($element['#title_display'] == 'none') {
    $element['#options'][''] = $element['#title'];
  }
  _form_set_class($element, array('form-select'));

  $output = '<select' . drupal_attributes($element['#attributes']) . '>' . form_select_options($element) . '</select>';
  if(isset($element['#nd_icon'])) {
    $size_class = in_array('input-lg', $element['#attributes']['class']) ? ' pi-input-with-icon-lg' : '';
    $size_class .= in_array('input-sm', $element['#attributes']['class']) ? ' pi-input-with-icon-sm' : '';
    $output = '<div class="pi-input-with-icon' . $size_class .'"><div class="pi-input-icon"><i class="' . $element['#nd_icon'] . '"></i></div>' . $output .  '</div>';
  }
  $output = '<div class = "form-group">' . $output . '</div>';
  return $output;
}

/**
 * Theme function to render an email component.
 */
function aurum_webform_email($variables) {
  $element = $variables['element'];

  // This IF statement is mostly in place to allow our tests to set type="text"
  // because SimpleTest does not support type="email".
  if (!isset($element['#attributes']['type'])) {
    $element['#attributes']['type'] = 'email';
  }

  // Convert properties to attributes on the element if set.
  foreach (array('id', 'name', 'value', 'size') as $property) {
    if (isset($element['#' . $property]) && $element['#' . $property] !== '') {
      $element['#attributes'][$property] = $element['#' . $property];
    }
  }
  _form_set_class($element, array('form-text', 'form-email', 'form-control'));
  
  $output = '<input' . drupal_attributes($element['#attributes']) . ' />';

  if(isset($element['#nd_icon'])) {
    $size_class = in_array('input-lg', $element['#attributes']['class']) ? ' pi-input-with-icon-lg' : '';
    $size_class .= in_array('input-sm', $element['#attributes']['class']) ? ' pi-input-with-icon-sm' : '';
    $output = '<div class="pi-input-with-icon' . $size_class .'"><div class="pi-input-icon"><i class="' . $element['#nd_icon'] . '"></i></div>' . $output .  '</div>';
  }

  return $output;
}


/**
 *  Implements theme_password().
 */
function aurum_password($variables) {
 $element = $variables['element'];
  $element['#attributes']['type'] = 'password';
  element_set_attributes($element, array('id', 'name', 'size', 'maxlength'));
  _form_set_class($element, array('form-text'));

  $output = '<input' . drupal_attributes($element['#attributes']) . ' />';

  if(isset($element['#nd_icon'])) {
    $size_class = in_array('input-lg', $element['#attributes']['class']) ? ' pi-input-with-icon-lg' : '';
    $size_class .= in_array('input-sm', $element['#attributes']['class']) ? ' pi-input-with-icon-sm' : '';
    $output = '<div class="pi-input-with-icon' . $size_class .'"><div class="pi-input-icon"><i class="' . $element['#nd_icon'] . '"></i></div>' . $output .  '</div>';
  }
  $output = '<div class = "form-group">' . $output . '</div>';
  return $output;
}

/**
 * Implements hook_preprocess_button().
 */
function aurum_preprocess_button(&$vars) {
  $vars['element']['#attributes']['class'][] = 'btn pi-btn pi-btn-base';
  if ($vars['element']['#value'] == '<none>') {
    $vars['element']['#attributes']['class'][] = 'hidden';
  }
}

/**
 * Update breadcrumbs
*/
function aurum_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {

    if (!drupal_is_front_page() && !empty($breadcrumb)) {
      $node_title = filter_xss(menu_get_active_title(), array());
      $breadcrumb[] = t($node_title);
    }
    if (count($breadcrumb) > 1) {
      $output = '<div class="pi-breadcrumb"><span>' . t('You are here:') .'</span><ul>';
      foreach($breadcrumb as $item) {
        $output .= '<li>' . $item . '</li>';
      }
      $output .= '</ul></div>';
      return $output;
    }
  }
}

/**
 * Implements hook_element_info_alter().
 */
function aurum_element_info_alter(&$elements) {
  foreach ($elements as &$element) {
    if (!empty($element['#input'])) {
      $element['#process'][] = '_aurum_process_input';
    }
  }
}

function _aurum_process_input(&$element, &$form_state) {
  $types = array(
    'textarea',
    'textfield',
    'webform_email',
    'webform_number',
    'select',
    'password',
    'password_confirm',
  );
  if($element['#type'] != 'textfield') {
    $element['#wrapper_attributes']['class'][] = 'form-group';
  }
  if (!empty($element['#type']) && (in_array($element['#type'], $types) || ($element['#type'] === 'file' && empty($element['#managed_file'])))) {
    if(isset($element['#attributes']['class']) && is_array($element['#attributes']['class'])) {
      foreach($element['#attributes']['class'] as $key => $class) {
        if(strpos($class, 'icon-') === 0) {
          $element['#nd_icon'] = $class;
          unset($element['#attributes']['class'][$key]);
        }
      }
    }
    $element['#attributes']['class'][] = 'form-control';
  }
  return $element;
}

/**
 * Implements theme_field()
 *
 * Make field items a comma separated unordered list
 */
function aurum_field($variables) {
  $output = '';
  $output .= $variables['element']['#label_display'] == 'above' ? ('<div class = "field-label-above"><b>' . $variables['label'] . '<span class = "colon">:</span> </b></div>') : '';
  $output .= $variables['element']['#label_display'] == 'inline' ? ('<b>' . $variables['label'] . '<span class = "colon">:</span> </b>') : '';
  $field_output = array();
  // Render the items as a comma separated inline list
  for ($i = 0; $i < count($variables['items']); $i++) {
    if(!isset($variables['items'][$i]['#printed']) || (isset($variables['items'][$i]['#printed']) && !$variables['items'][$i]['#printed'])) {
      $field_output[] = drupal_render($variables['items'][$i]);
    }
  }
  $output .= implode(', ', $field_output);
  // Render the top-level DIV.
  $output = '<div class="' . $variables ['classes'] . '"' . $variables ['attributes'] . '>' . $output . '</div>';
  return $output;
}

/**
 * Implements theme_field()
 *
 * Make field items a comma separated unordered list
 */
function aurum_field__taxonomy_term_reference($variables) {
  $output = '';
  $output .= $variables['element']['#label_display'] == 'above' ? ('<div class = "field-label-above"><b>' . $variables['label'] . '<span class = "colon">:</span> </b></div>') : '';
  $output .= $variables['element']['#label_display'] == 'inline' ? ('<b>' . $variables['label'] . '<span class = "colon">:</span> </b>') : '';
  // Render the items as a comma separated inline list
  for ($i = 0; $i < count($variables['items']); $i++) {
    if(!isset($variables['items'][$i]['#printed']) || (isset($variables['items'][$i]['#printed']) && !$variables['items'][$i]['#printed'])) {
      $variables['items'][$i]['#attributes']['class'] = array('pi-link-no-style');
      $output .= drupal_render($variables['items'][$i]) . (($i == count($variables['items']) - 1) ? '' : ', ');
    }
  }
  return $output;
}

/**
 * Implements theme_field()
 */
function aurum_field__field_social_links($variables) {
  $output = '';
  if(count($variables['items'])) {
    $output .= '<ul class="pi-social-icons pi-colored-bg pi-jump pi-small pi-round-corners pi-clearfix">';
    for ($i = 0; $i < count($variables['items']); $i++) {
      $output .= '<li><a href="' . $variables['items'][$i]['#element']['url'] . '" class="pi-social-' . $variables['items'][$i]['#element']['title'] . '"><i class="' . $variables['items'][$i]['#element']['title'] . '"></i></a></li>';
    }
    $output .= '</ul>';
  }
  return $output;
}

function aurum_url_outbound_alter(&$path, &$options, $original_path) {
  $alias = drupal_get_path_alias($original_path);
  $url = parse_url($alias);
  if (isset($url['fragment'])){
    //set path without the fragment
    $path = isset($url['path']) ? $url['path'] : '';
    //prevent URL from re-aliasing
    $options['alias'] = TRUE;
    //set fragment
    $options['fragment'] = $url['fragment'];
  }
}


// function aurum_pager($variables) {
//   $tags = $variables['tags'];
//   $element = $variables['element'];
//   $parameters = $variables['parameters'];
//   $quantity = $variables['quantity'];
//   global $pager_page_array, $pager_total;

//   // Calculate various markers within this pager piece:
//   // Middle is used to "center" pages around the current page.
//   $pager_middle = ceil($quantity / 2);
//   // current is the page we are currently paged to
//   $pager_current = $pager_page_array[$element] + 1;
//   // first is the first page listed by this pager piece (re quantity)
//   $pager_first = $pager_current - $pager_middle + 1;
//   // last is the last page listed by this pager piece (re quantity)
//   $pager_last = $pager_current + $quantity - $pager_middle;
//   // max is the maximum page number
//   $pager_max = $pager_total[$element];
//   // End of marker calculations.

//   // Prepare for generation loop.
//   $i = $pager_first;
//   if ($pager_last > $pager_max) {
//     // Adjust "center" if at end of query.
//     $i = $i + ($pager_max - $pager_last);
//     $pager_last = $pager_max;
//   }
//   if ($i <= 0) {
//     // Adjust "center" if at start of query.
//     $pager_last = $pager_last + (1 - $i);
//     $i = 1;
//   }
//   // End of generation loop preparation.

//   $li_first = theme('pager_first', array('text' => (isset($tags[0]) ? $tags[0] : t('« first')), 'element' => $element, 'parameters' => $parameters));
//   $li_previous = theme('pager_previous', array('text' => (isset($tags[1]) ? $tags[1] : t('‹ previous')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
//   $li_next = theme('pager_next', array('text' => (isset($tags[3]) ? $tags[3] : t('next ›')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
//   $li_last = theme('pager_last', array('text' => (isset($tags[4]) ? $tags[4] : t('last »')), 'element' => $element, 'parameters' => $parameters));

//   if ($pager_total[$element] > 1) {
//     if ($li_first) {
//       $items[] = array(
//         'class' => array('pager-first'),
//         'data' => $li_first,
//       );
//     }
//     if ($li_previous) {
//       $items[] = array(
//         'class' => array('pager-previous'),
//         'data' => $li_previous,
//       );
//     }

//     // When there is more than one page, create the pager list.
//     if ($i != $pager_max) {
//       if ($i > 1) {
//         $items[] = array(
//           'class' => array('pager-ellipsis'),
//           'data' => '…',
//         );
//       }
//       // Now generate the actual pager piece.
//       for (; $i <= $pager_last && $i <= $pager_max; $i++) {
//         if ($i < $pager_current) {
//           $items[] = array(
//             'class' => array('pager-item'),
//             'data' => theme('pager_previous', array('text' => $i, 'element' => $element, 'interval' => ($pager_current - $i), 'parameters' => $parameters)),
//           );
//         }
//         if ($i == $pager_current) {
//           $items[] = array(
//             'class' => array('pager-current'),
//             'data' => '<a href = "#" class = "pi-active">' . $i . '</a>',
//           );
//         }
//         if ($i > $pager_current) {
//           $items[] = array(
//             'class' => array('pager-item'),
//             'data' => theme('pager_next', array('text' => $i, 'element' => $element, 'interval' => ($i - $pager_current), 'parameters' => $parameters)),
//           );
//         }
//       }
//       if ($i < $pager_max) {
//         $items[] = array(
//           'class' => array('pager-ellipsis'),
//           'data' => '…',
//         );
//       }
//     }
//     // End generation.
//     if ($li_next) {
//       $items[] = array(
//         'class' => array('pager-next'),
//         'data' => $li_next,
//       );
//     }
//     if ($li_last) {
//       $items[] = array(
//         'class' => array('pager-last'),
//         'data' => $li_last,
//       );
//     }
//     $output = '<div class = "pi-pagenav pi-text-center pi-padding-bottom-30">';
//     foreach($items as $item) {
//       $output .= $item['data'] . ' ';
//     }
//     $output .= '</div>';
//     return $output;
//   }
// }

