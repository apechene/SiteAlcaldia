<?php

/**
 * @file
 * Default simple view template to display a rows in a grid.
 *
 * - $rows contains a nested array of rows. Each row contains an array of
 *   columns.
 *
 * @ingroup views_templates
 */
$columns = isset($view->style_plugin->options['columns']) ? $view->style_plugin->options['columns'] : 3;
global $projects_categories;
?>
<div class="pi-section-w pi-section-white">
  <div class="pi-section" style = "padding-top: 25px;">

    <!-- Filter -->
    <div class="pi-pagenav pi-big pi-text-center" data-isotope-nav="isotope">
      <ul>
        <li><a href="#" class="pi-active" data-filter="*"><?php print t('All'); ?></a></li>
        <?php  foreach($projects_categories as $id => $category): ?>
          <li><a href="#" data-filter=".<?php print $id; ?>"><?php print $category; ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <!-- End filter -->

  </div>
</div>

<div class="pi-section-w pi-section-white">

  <div id="isotope" class="pi-row <?php print $column_classes[0][0]; ?> pi-padding-bottom-20 isotope" data-isotope-mode="masonry">
      
    <?php foreach ($rows as $row_number => $columns): ?>
      <?php foreach ($columns as $column_number => $item): ?>
        <?php print $item; ?>
      <?php endforeach; ?>
    <?php endforeach; ?>

  </div>
</div>