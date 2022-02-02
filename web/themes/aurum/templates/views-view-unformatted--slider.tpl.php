<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<!-- Slider -->
<div class="pi-slider-wrapper pi-slider-arrows-inside pi-slider-show-arrow-hover">
  <div class="pi-slider pi-slider-animate-opacity">    
    <!-- Slide -->    
      <?php foreach ($rows as $id => $row): ?>
        <div class="pi-slide <?php if (isset($classes_array[$id]) && $classes_array[$id]) { print ' ' . $classes_array[$id];  } ?>">
          <?php print $row; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>