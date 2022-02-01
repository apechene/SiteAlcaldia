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
?>
<div class="pi-icon-box-vertical pi-text-center">

  <div class="pi-icon-box-icon pi-icon-box-icon-base">
    <i class="icon-twitter"></i>
  </div>
  
  <p class="lead-28 pi-margin-bottom-10">
    <a href="//twitter.com/<?php print $fields['name']->content; ?>" target="_blank" title="<?php print $fields['name']->content; ?>">@<?php print $fields['name']->content; ?></a>:
    <?php print $fields['text']->content; ?>
  </p>
  
  <p class="pi-italic pi-margin-bottom-30 pi-text-opacity">
    <?php print $fields['created_time']->content; ?>
  </p>
  
  <p>
    <button class="btn pi-btn-base pi-btn-no-border pi-btn-small">
      <?php print $fields['name']->content; ?>
    </button>
  </p>
  
</div>