<?php
/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
// Match Column numbers to Bootsrap class
$columns_classes = array(1 => 12, 2 => 6, 3 => 4, 4 => 3, 6 => 2, 12 => 1);
$bootsrap_class = isset($columns_classes[$view->style_plugin->options['columns']]) ? $columns_classes[$view->style_plugin->options['columns']] : 3;
$image = _get_node_field($row, 'field_field_images');
$type = _get_node_field($row, 'field_field_blog_type');
$type = $type[0]['raw']['value'];
$path = isset($image[0]['raw']) ? $image[0]['raw']['uri'] : '';
?>

<div class="pi-col-sm-<?php print $bootsrap_class; ?> pi-col-xs-6 isotope-item">

  <?php switch($type): case('Standart'): case('iFrame'): ?>
    <div class="pi-portfolio-item pi-portfolio-description-box pi-portfolio-item-round-corners">
      
      <?php if (!empty($row->field_field_iframe_url)): ?>
      <div class="pi-img-w pi-img-round-corners pi-img-shadow-light pi-no-margin-bottom">
        <iframe width="100%" height="276" scrolling="no" frameborder="no" src="<?php print $fields['field_iframe_url']->content; ?>"></iframe>
      </div>
      <?php else: ?>
        <?php print $fields['field_images']->content; ?>
      <?php endif;?>
      <div class="pi-portfolio-description <?php print empty($row->field_field_images) && empty($row->field_field_iframe_url) ? 'pi-portfolio-description-round-corners-all border-top-1' : 'pi-portfolio-description-round-corners'; ?>">

        <ul class="pi-portfolio-cats">
          <li><i class="icon-clock"></i><?php print $fields['created']->content; ?></li>
          <li><i class="icon-comment"></i><a href="<?php print url('node/' . $fields['nid']->content); ?>"><?php print $fields['comment_count']->content; ?></a></li>
        </ul>

        <h2 class="h4"><a href="<?php print url('node/' . $fields['nid']->content); ?>" class="pi-link-no-style"><?php print $fields['title']->content; ?></a></h2>

        <?php print $fields['body']->content; ?>

      </div>
    </div>
  <?php break; case('Image'): ?>
    <div class="pi-img-w pi-img-round-corners pi-img-with-overlay pi-img-hover-zoom pi-margin-bottom-30">
      <a href="<?php print url('node/' . $fields['nid']->content); ?>">
        <?php print theme('image_style', array('style_name' => 'blog_327xauto', 'path' => $path)); ?>

        <div class="pi-img-overlay pi-overlay-slide pi-show-heading pi-padding-bottom-10">
          <ul class="pi-caption-links">
            <li><i class="icon-clock"></i><?php print $fields['created']->content; ?></li>
            <li><i class="icon-comment"></i><a href="<?php print url('node/' . $fields['nid']->content); ?>"><?php print $fields['comment_count']->content; ?></a></li>
          </ul>
          <h2 class="h4 pi-margin-bottom-10 pi-weight-300">
            <?php print $fields['title']->content; ?>
          </h2>

          <?php print $fields['body']->content; ?>
        </div>
      </a>
    </div>
  <?php break; case('Video'): ?>
    <div class="pi-portfolio-item pi-portfolio-description-box pi-portfolio-item-round-corners">
      <div class="pi-img-w pi-img-round-corners pi-img-shadow-light pi-no-margin-bottom">
        <iframe width="100%" height="220" src="<?php print $fields['field_iframe_url']->content; ?>" frameborder="0" allowfullscreen></iframe>
      </div>
      <div class="pi-portfolio-description pi-portfolio-description-round-corners">

        <ul class="pi-portfolio-cats">
            <li><i class="icon-clock"></i><?php print $fields['created']->content; ?></li>
            <li><i class="icon-comment"></i><a href="<?php print url('node/' . $fields['nid']->content); ?>"><?php print $fields['comment_count']->content; ?></a></li>
        </ul>

        <h2 class="h4"><a href="<?php print url('node/' . $fields['nid']->content); ?>" class="pi-link-no-style"><?php print $fields['title']->content; ?></a>
        </h2>

       <?php print $fields['body']->content; ?>

      </div>
    </div>
  <?php break; endswitch;?>

</div>