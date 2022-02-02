<div class="pi-section-w pi-section-<?php print $bg_color; ?> pi-shadow-inside-bottom">
  <div class="pi-texture" style="background: url(<?php print base_path() . drupal_get_path('theme', 'aurum'); ?>/img/hexagon.png) repeat;"></div>
  <div class="pi-section pi-section-md pi-titlebar pi-titlebar-breadcrumb-right pi-titlebar-small">
    <h1><?php print $title; ?></h1>

    <?php print theme('breadcrumb', array('breadcrumb' => drupal_get_breadcrumb()));?>
  </div>
</div>