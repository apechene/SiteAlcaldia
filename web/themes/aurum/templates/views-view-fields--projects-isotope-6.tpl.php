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
global $projects_categories;
$categories = array();
if($fields['field_categories']->content) {
  foreach(explode(', ', $fields['field_categories']->content) as $category) {
    $category = strip_tags($category);
  	$category_id = preg_replace('/[^a-zA-Z0-9\']/', '-', $category);
  	$projects_categories[$category_id] = $category;
  	$categories[] = $category_id;
  }
}
$image = _get_node_field($row, 'field_field_images');
$path = isset($image[0]) ? $image[0]['raw']['uri'] : '';
?>
<!-- Portfolio item -->
<div class="<?php print implode(' ', $categories); ?> pi-gallery-item isotope-item">
  <div class="pi-img-w pi-img-shadow pi-img-with-overlay pi-no-margin-bottom">
    <a href="<?php print file_create_url($path); ?>"><?php print $fields['field_images']->content; ?></a>
    <div class="pi-img-overlay pi-overlay-slide">
      <h6 class="pi-weight-700 pi-uppercase pi-letter-spacing pi-margin-top-minus-5 pi-text-shadow">
        <a href="<?php print url('node/' . $fields['nid']->content); ?>" class="pi-link-white"><?php print $fields['title']->content; ?></a>
      </h6>
      
      <p class="pi-margin-top-minus-5 pi-margin-bottom-15"><?php print $fields['body']->content; ?></p>
      
      <?php if(isset($fields['field_categories']) && $fields['field_categories']->content): ?>
      <ul class="pi-caption-links pi-margin-bottom-20">
        <li><i class="icon-tag"></i><?php print $fields['field_categories']->content; ?></li>
      </ul>
      <?php endif; ?>

      <a href="<?php print url('node/' . $fields['nid']->content); ?>" class="btn pi-btn-small pi-btn-base pi-uppercase pi-weight-600 pi-letter-spacing"><?php print t('View project'); ?></a>
    </div>
  </div>
  <div class="pi-img-shadow-gap pi-shadow-effect8"></div>
</div>
<!-- End portfolio item -->