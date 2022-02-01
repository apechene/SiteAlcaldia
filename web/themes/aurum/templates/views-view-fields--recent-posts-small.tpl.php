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
global $recent_posts_small_counter;
$recent_posts_small_counter = isset($recent_posts_small_counter) ? $recent_posts_small_counter + 1 : 1;
?>
      
<!-- Post item -->
<div class="pi-img-w pi-img-round-corners pi-img-left pi-img-shadow" style="width: 75px;">
  <a href="<?php print $fields['path']->content; ?>">
  <?php print $fields['field_images']->content; ?>
  <span class="pi-img-overlay pi-img-overlay-white">
  </span>
  </a>
</div>

<h2 class="h6 pi-weight-600 pi-margin-top-minus-5 pi-margin-bottom-5">
  <a href="<?php print $fields['path']->content; ?>" class="pi-link-dark"><?php print $fields['title']->content; ?></a>
</h2>
<ul class="pi-meta pi-margin-bottom-10">
  <li><i class="icon-clock"></i><?php print $fields['created']->content; ?></li>
</ul>
<p><?php print $fields['body']->content; ?> <a href="<?php print $fields['path']->content; ?>" class="pi-italic"><?php print t('...'); ?></a></p>
<!-- End post item -->

<?php if($recent_posts_small_counter != count($view->result)): ?>
  <hr class="pi-divider pi-divider-dashed">
<?php else: $recent_posts_small_counter = 0; endif;?>