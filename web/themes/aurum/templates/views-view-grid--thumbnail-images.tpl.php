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
$columns_classes = array(1 => 12, 2 => 6, 3 => 4, 4 => 3, 6 => 2, 12 => 1);
?>
<div class="pi-gallery pi-liquid-col-md-<?php print $view->style_plugin->options['columns']; ?> pi-liquid-col-sm-2 pi-liquid-col-xs-6 pi-liquid-col-2xs-3 pi-liquid-col-3xs-2 pi-gallery-small-margins colsWidthFix">
  <?php foreach ($rows as $row_number => $columns): ?>
    <?php foreach ($columns as $column_number => $item): ?>
      <?php print $item; ?>
    <?php endforeach; ?>
  <?php endforeach; ?>
</div>