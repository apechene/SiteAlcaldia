<div class="pi-section-w pi-border-bottom pi-section-grey">
  <div class="pi-section pi-titlebar pi-breadcrumb-only">
    <?php print theme('breadcrumb', array('breadcrumb' => drupal_get_breadcrumb()));?>
    <?php

$block = block_load('easy_breadcrumb', 'block');
print drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));

?>
  </div>
</div>