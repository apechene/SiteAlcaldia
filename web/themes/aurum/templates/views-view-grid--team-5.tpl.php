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
$column_count = isset($view->style_plugin->options['columns']) ? $view->style_plugin->options['columns'] : 3;
?>
<?php foreach ($rows as $row_number => $columns): ?>
  <div class = "pi-row pi-liquid-col-xs-2 pi-liquid-col-sm-<?php print $column_count; ?> pi-gallery pi-gallery-big-margins pi-text-center">
    <?php foreach ($columns as $column_number => $item): ?>
      <?php print $item; ?>
    <?php endforeach; ?>
  </div>
<?php endforeach; ?>