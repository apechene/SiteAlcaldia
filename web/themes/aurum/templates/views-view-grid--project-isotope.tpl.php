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
<?php if(count($view->result) > 4): ?>
  <!-- Filter -->
  <div class="pi-pagenav pi-padding-bottom-20 pi-big pi-text-center" data-isotope-nav="isotope">
    <ul>
      <li><a href="#" class="pi-active" data-filter="*"><?php print t('All'); ?></a></li>
      <?php  foreach($projects_categories as $id => $category): ?>
        <li><a href="#" data-filter=".<?php print $id; ?>"><?php print $category; ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
  <!-- End filter -->
<?php endif; ?>

<!-- Portfolio gallery -->
<div id="isotope" class="pi-row pi-liquid-col-xs-2 pi-liquid-col-sm-<?php print $columns; ?> pi-gallery <?php print $column_classes[0][0]; ?> pi-text-center isotope">
  
  <?php foreach ($rows as $row_number => $columns): ?>
    <?php foreach ($columns as $column_number => $item): ?>
      <?php print $item; ?>
    <?php endforeach; ?>
  <?php endforeach; ?>

  <!-- End portfolio item -->
</div>