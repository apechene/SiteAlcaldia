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
<div class="<?php print implode(' ', $categories); ?> pi-gallery-item pi-padding-bottom-40 isotope-item">
  <div class="pi-img-w pi-img-round-corners pi-img-shadow">
    <a href="<?php print file_create_url($path); ?>" class="pi-colorbox">
      <?php print $fields['field_images']->content; ?>
      <div class="pi-img-overlay pi-no-padding pi-img-overlay-darker">
        <div class="pi-caption-centered">
          <div>
            <span class="pi-caption-icon pi-caption-scale icon-search"></span>
          </div>
        </div>
      </div>
    </a>
  </div>
  <h3 class="h6 pi-weight-700 pi-uppercase pi-letter-spacing pi-margin-bottom-5"><a href="<?php print url('node/' . $fields['nid']->content); ?>" class="pi-link-dark"><?php print $fields['title']->content; ?></a></h3>
  <?php if(isset($fields['field_categories']) && $fields['field_categories']->content): ?>
  <ul class="pi-meta">
    <li><i class="icon-tag"></i><?php print $fields['field_categories']->content; ?></li>
  </ul>
  <?php endif; ?>
</div>