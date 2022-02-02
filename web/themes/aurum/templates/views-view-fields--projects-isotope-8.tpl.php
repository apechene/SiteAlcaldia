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
  <div class="pi-shadow-effect2">
    <div class="pi-img-w pi-img-hover-zoom pi-img-shadow">
      <a href="<?php print url('node/' . $fields['nid']->content); ?>">
        <?php print $fields['field_images']->content; ?>
        <div class="pi-img-overlay pi-img-overlay-darker-hovered pi-caption-opened">
          <div class="pi-caption-centered pi-text-center">
            <div>
              <h3 class="h4 pi-weight-600 pi-uppercase pi-letter-spacing pi-has-border pi-has-tall-border pi-has-short-border pi-text-shadow"><?php print $fields['title']->content; ?></h3>
              <p class="pi-uppercase pi-letter-spacing pi-small-text pi-no-margin-bottom">
                <?php print $fields['body']->content; ?>
              </p>
            </div>
          </div>
        </div>  
      </a>
    </div>
  </div>
</div>
<!-- End portfolio item -->